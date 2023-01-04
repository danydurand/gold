<?php
//-----------------------------------------------------------------------------
// Programa      : incidencias.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 15/08/2017
// Descripcion   : Este programa, permite asignar una incidencia o checkpoint
//                 a una o varias guías.
//------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class Incidencias extends FormularioBaseKaizen {
    protected $lstListCkpt;  // ListBox de checkpoints
    protected $strCadeSqlx;
    protected $arrColuQury;
    protected $arrValoQury;
    protected $objDataBase;
    protected $intOperSele;
    protected $arrNumeCont;
    protected $objOperSele;
    protected $txtNumeSeri;
    protected $lstCodiEsta;
    protected $objUsuario;
    protected $intContRegi;
    protected $txtTextObse;
    protected $arrGuiaSina;
    protected $rdbTipoInci;
    protected $arrPiezInci;


    protected function SetupValores() {
        if (isset($_SESSION['PiezInci'])) {
            $this->arrPiezInci = $_SESSION['PiezInci'];
            unset($_SESSION['PiezInci']);
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->lblTituForm->Text = 'Incidencias';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->rdbTipoInci_Create();
        $this->lstListCkpt_Create();
        $this->txtNumeSeri_Create();
        $this->txtTextObse_Create();

        $this->intContRegi = 0;
    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------

    protected function rdbTipoInci_Create() {
        $this->rdbTipoInci = new QRadioButtonList($this);
        $this->rdbTipoInci->Name = QApplication::Translate('Tipo de Incidencia');
        $this->rdbTipoInci->AddItem('&nbsp;OPERATIVA','INCIDENCIA');
        $this->rdbTipoInci->AddItem('&nbsp;GESTION INTERNA','GESTION');
        $this->rdbTipoInci->Required = true;
        $this->rdbTipoInci->Width = 250;
        $this->rdbTipoInci->SelectedIndex = 0;
        $this->rdbTipoInci->RepeatColumns = 2;
        $this->rdbTipoInci->HtmlEntities = false;
        $this->rdbTipoInci->AddAction(new QChangeEvent(), new QAjaxAction('rdbTipoInci_Change'));
    }

    protected function lstListCkpt_Create() {
        $this->lstListCkpt = new QListBox($this);
        $this->lstListCkpt->Name = QApplication::Translate("Checkpoint");
        $this->lstListCkpt->Width = 250;
        $arrCkptTipo = Checkpoints::LoadArrayByTipo('INCIDENCIA', 
            QQ::Clause(QQ::OrderBy(QQN::Checkpoints()->Descripcion))
        );
        $intCantCkpt = count($arrCkptTipo);
        $this->lstListCkpt->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantCkpt.')'),null);
        foreach ($arrCkptTipo as $objCkpt) {
            $this->lstListCkpt->AddItem($objCkpt->__toString(), $objCkpt->Id);
        }
        $this->lstListCkpt->Width = 250;
        $this->lstListCkpt->Required = true;
        $this->lstListCkpt->AddAction(new QChangeEvent(), new QAjaxAction('lstListCkpt_Change'));
    }

    protected function lstListCkpt_Change() {
        if (!is_null($this->lstListCkpt->SelectedValue)) {
            $this->txtTextObse->Text = $this->lstListCkpt->SelectedName;
        }
    }

    protected function txtNumeSeri_Create() {
        $this->txtNumeSeri = new QTextBox($this);
        $this->txtNumeSeri->Name = QApplication::Translate("Scanneo/Piezas");
        $this->txtNumeSeri->Required = true;
        $this->txtNumeSeri->TextMode = QTextMode::MultiLine;
        $this->txtNumeSeri->Height = 250;
        $this->txtNumeSeri->Width = 250;
        if (count($this->arrPiezInci) > 0) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::GuiaPiezas()->Id,$this->arrPiezInci);
            $arrPiezInci   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
            foreach ($arrPiezInci as $objPiezMani) {
                $this->txtNumeSeri->Text .= $objPiezMani->IdPieza.chr(13);
            }
        }
    }

    protected function txtTextObse_Create() {
        $this->txtTextObse = new QTextBox($this);
        $this->txtTextObse->Name = QApplication::Translate('Observacion');
        $this->txtTextObse->Width = 250;
        $this->txtTextObse->MaxLength = 100;
        $this->txtTextObse->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtTextObse->Required = true;
    }

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    protected function rdbTipoInci_Change() {
        if ($this->rdbTipoInci->SelectedValue == "GESTION") {
            $this->lstListCkpt->Visible = false;
            $this->txtTextObse->Name = QApplication::Translate("Comentario Interno");
            $this->txtTextObse->MaxLength = 250;
            $this->txtTextObse->TextMode = QTextMode::MultiLine;
            $this->txtTextObse->Height = 60;
            $this->lblMensUsua->Text = "";
            //--------------------------------------------------------------
            // Se verifica la existencia del checkpoint de gestion interna
            //--------------------------------------------------------------
            $objGestInte = Checkpoints::LoadByCodigo('GI');
            if (is_null($objGestInte)) {
                $strMensUsua = 'No existe el checkpoint de Gestion Interna (GI)';
                $this->mensaje($strMensUsua,'i','d','l',__iHAND__);
                $this->btnSave->Visible = false;
            }
        } else {
            $this->lstListCkpt->Visible = true;
            $this->txtTextObse->Name = QApplication::Translate("Observacion");
            $this->txtTextObse->MaxLength = 100;
            $this->txtTextObse->TextMode = QTextMode::SingleLine;
            $this->txtTextObse->Height = 30;
            $this->btnSave->Visible = true;
            $this->lblMensUsua->Text = "";
            $this->mensaje();
        }
    }


    protected function btnSave_Click() {
        $mixInitTime = microtime(true);

        $this->objDataBase = QApplication::$Database[1];
        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->arrGuiaSina = array();

        $strTipoInci = $this->rdbTipoInci->SelectedValue;

        $arrNumePiez = explode(',',nl2br2($this->txtNumeSeri->Text));
        $arrNumePiez = array_unique($arrNumePiez);
        if (count($this->arrPiezInci) == 0) {
            $arrGuiaOkey = array_map('transformar',$arrNumePiez);
        } else {
            $arrGuiaOkey = $arrNumePiez;
        }

        $this->txtNumeSeri->Text = '';

        $intCodiCkpt = null;
        if ($strTipoInci == "INCIDENCIA") {   // Incidencia Operativa
            $intCodiCkpt = $this->lstListCkpt->SelectedValue;
            $objCkptProc = Checkpoints::Load($intCodiCkpt);
        } else {
            $objCkptProc = Checkpoints::LoadByCodigo('GI');  // Gestion Interna
            $intCodiCkpt = $objCkptProc->Id;
        }

        $intContGuia = 0;
        $intContCkpt = 0;
        //-----------------------------------------------------------------------
        // Se procesan una a una las Guias proporcionadas por el Usuario
        //-----------------------------------------------------------------------
        foreach ($arrGuiaOkey as $strNumeSeri) {
            if (strlen($strNumeSeri) == 0) {
                continue;
            }
            $intContGuia++;
            $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strNumeSeri);
            if (!$objGuiaPiez) {
                $this->txtNumeSeri->Text .= $strNumeSeri." (No Existe)".chr(13);
                continue;
            } else {
                $arrSepuProc = $objGuiaPiez->Guia->SePuedeProcesar();
                if (!$arrSepuProc['TodoOkey']) {
                    $strTextVali = $arrSepuProc['MensUsua'];
                    $this->txtNumeSeri->Text .= $strNumeSeri . ' ' . $strTextVali . chr(13);
                    continue;
                }
            }
            if ($strTipoInci == 'GESTION') {
                //------------------------------------
                // Incidencia de Gestion Interna
                //------------------------------------
                $arrParaRegi['CodiCkpt'] = $intCodiCkpt;
                $arrParaRegi['TextMens'] = strtoupper($this->txtTextObse->Text).' ('.$strNumeSeri.')';
                $arrParaRegi['NumeGuia'] = $objGuiaPiez->GuiaId;
                $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                $arrParaRegi['CodiEsta'] = $this->objUsuario->SucursalId;
                CrearRegistroDeTrabajo($arrParaRegi);
                $intContCkpt ++;
            } else {
                //-------------------------
                // Incidencia Operativa
                //-------------------------
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
                $arrDatoCkpt['GuiaAnul'] = false; //$objGuiaPiez->Guia->Anulada();
                $arrDatoCkpt['CodiCkpt'] = $intCodiCkpt;
                $arrDatoCkpt['TextCkpt'] = $this->txtTextObse->Text;
                $arrDatoCkpt['CodiRuta'] = '';
                $arrDatoCkpt['NotiCkpt'] = $objCkptProc->Notificar;

                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                if ($arrResuGrab['TodoOkey']) {
                    $intContCkpt ++;
                } else {
                    $this->txtNumeSeri->Text .= $strNumeSeri." (".$arrResuGrab['MotiNook'].")".chr(13);
                }
            }
        }
        //------------------------------------------
        // Updating last checkpoint on every piece
        //------------------------------------------
        $objDataBase = QApplication::$Database[1];
        $strStorProc = "call sp_update_last_checkpoint()";
        $objDataBase->NonQuery($strStorProc);

        $mixFiniTime = microtime(true);
        $mixTotaTime = formatPeriod($mixFiniTime, $mixInitTime);

        if ($intContGuia == $intContCkpt) {
            $strMensUsua = sprintf('Registros procesados (%s) | Tiempo => (%s)', $intContGuia, $mixTotaTime);
            $this->success($strMensUsua);
        } else {
            $strMensUsua = sprintf('Registros procesados (%s) | Checkpoints procesados (%s) | Tiempo => (%s)', $intContGuia, $intContCkpt, $mixTotaTime);
            $this->danger($strMensUsua);
        }

    }

    protected function btnSaveOld_Click() {
        $mixInitTime = microtime(true);

        $this->objDataBase = QApplication::$Database[1];
        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->arrGuiaSina = array();

        $strTipoInci = $this->rdbTipoInci->SelectedValue;

        $arrNumePiez = explode(',',nl2br2($this->txtNumeSeri->Text));
        $arrNumePiez = array_unique($arrNumePiez);
        $arrGuiaOkey = array_map('transformar',$arrNumePiez);

        $this->txtNumeSeri->Text = '';

        $intCodiCkpt = null;
        if ($strTipoInci == "INCIDENCIA") {   // Incidencia Operativa
            $intCodiCkpt = $this->lstListCkpt->SelectedValue;
            $objCkptProc = Checkpoints::Load($intCodiCkpt);
        } else {
            $objCkptProc = Checkpoints::LoadByCodigo('GI');  // Gestion Interna
            $intCodiCkpt = $objCkptProc->Id;
        }

        $intContGuia = 0;
        $intContCkpt = 0;
        //-----------------------------------------------------------------------
        // Se procesan una a una las Guias proporcionadas por el Usuario
        //-----------------------------------------------------------------------
        foreach ($arrGuiaOkey as $strNumeSeri) {
            if (strlen($strNumeSeri) == 0) {
                continue;
            }
            $intContGuia++;
            $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strNumeSeri);
            if (!$objGuiaPiez) {
                $this->txtNumeSeri->Text .= $strNumeSeri." (No Existe)".chr(13);
                continue;
            } else {
                $arrSepuProc = $objGuiaPiez->Guia->SePuedeProcesar();
                if (!$arrSepuProc['TodoOkey']) {
                    $strTextVali = $arrSepuProc['MensUsua'];
                    $this->txtNumeSeri->Text .= $strNumeSeri . ' ' . $strTextVali . chr(13);
                    continue;
                }
            }
            if ($strTipoInci == 'GESTION') {
                //------------------------------------
                // Incidencia de Gestion Interna
                //------------------------------------
                $arrParaRegi['CodiCkpt'] = $intCodiCkpt;
                $arrParaRegi['TextMens'] = strtoupper($this->txtTextObse->Text).' ('.$strNumeSeri.')';
                $arrParaRegi['NumeGuia'] = $objGuiaPiez->GuiaId;
                $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                $arrParaRegi['CodiEsta'] = $this->objUsuario->SucursalId;
                CrearRegistroDeTrabajo($arrParaRegi);
                $intContCkpt ++;
            } else {
                //-------------------------
                // Incidencia Operativa
                //-------------------------
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
                $arrDatoCkpt['GuiaAnul'] = false; //$objGuiaPiez->Guia->Anulada();
                $arrDatoCkpt['CodiCkpt'] = $intCodiCkpt;
                $arrDatoCkpt['TextCkpt'] = $this->txtTextObse->Text;
                $arrDatoCkpt['CodiRuta'] = '';
                $arrDatoCkpt['NotiCkpt'] = $objCkptProc->Notificar;

                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                if ($arrResuGrab['TodoOkey']) {
                    $intContCkpt ++;
                } else {
                    $this->txtNumeSeri->Text .= $strNumeSeri." (".$arrResuGrab['MotiNook'].")".chr(13);
                }
            }
        }
        //------------------------------------------
        // Updating last checkpoint on every piece
        //------------------------------------------
        $objDataBase = QApplication::$Database[1];
        $strStorProc = "call sp_update_last_checkpoint()";
        $objDataBase->NonQuery($strStorProc);

        $mixFiniTime = microtime(true);
        $mixTotaTime = formatPeriod($mixFiniTime, $mixInitTime);

        if ($intContGuia == $intContCkpt) {
            $strMensUsua = sprintf('Registros procesados (%s) | Tiempo => (%s)',$intContGuia, $mixTotaTime);
            $this->success($strMensUsua);
        } else {
            $strMensUsua = sprintf('Registros procesados (%s) | Checkpoints procesados (%s) | Tiempo => (%s)',$intContGuia, $intContCkpt, $mixTotaTime);
            $this->danger($strMensUsua);
        }

    }

}

Incidencias::Run('Incidencias');
?>
