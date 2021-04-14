<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class LiquidacionMasivaPods extends FormularioBaseKaizen {
    //protected $lstListCkpt;  // ListBox de Checkpoints
    protected $strCadeSqlx;
    protected $arrColuQury;
    protected $arrValoQury;
    protected $objDataBase;
    protected $intOperSele;
    protected $arrNumeCont;
    protected $objOperSele;
    protected $txtNumeSeri;
    protected $lstCodiEsta;

    protected $txtTextObse;
    protected $rdbTipoEntr;
    protected $lstCualRece;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Liquidación Masiva de PODs');

        $this->rdbTipoEntr_Create();
        $this->lstCualRece_Create();
        $this->txtNumeSeri_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function rdbTipoEntr_Create() {
        $this->rdbTipoEntr = new QRadioButtonList($this);
        $this->rdbTipoEntr->Name = QApplication::Translate('Entregada Por');
        $this->rdbTipoEntr->RepeatColumns = 2;
        $this->rdbTipoEntr->AddItem('&nbsp;POR TAQUILLA&nbsp;&nbsp;&nbsp;','T');
        $this->rdbTipoEntr->AddItem('&nbsp;EN LA RUTA','R');
        $this->rdbTipoEntr->AddAction(new QClickEvent(), new QAjaxAction('rdbTipoEntr_Click'));
        $this->rdbTipoEntr->HtmlEntities = false;
    }

    protected function lstCualRece_Create() {
        $this->lstCualRece = new QListBox($this);
        $this->lstCualRece->Name = QApplication::Translate('¿En Cuál Receptoría se Encuentra?');
        $this->lstCualRece->AddItem("- Seleccione Uno -",null);
        $arrReceSucu = Counter::LoadArrayBySucursalId($this->objUsuario->CodiEsta);
        $intCantRece = count($arrReceSucu);
        foreach ($arrReceSucu as $objReceptoria) {
            if ($objReceptoria->StatusId == StatusType::ACTIVO && $objReceptoria->EsRuta == SinoType::NO) {
                $this->lstCualRece->AddItem($objReceptoria->__toString(),$objReceptoria);
            }
            if ($objReceptoria->Siglas == "ALT") {
                $this->lstCualRece->AddItem($objReceptoria->__toString(),$objReceptoria);
            }
            if ($objReceptoria->Siglas == "UBR") {
                $this->lstCualRece->AddItem($objReceptoria->__toString(),$objReceptoria);
            }
        }
        if ($intCantRece == 1) {
            $this->lstCualRece->Enabled = false;
            $this->lstCualRece->ForeColor = 'blue';
            $this->lstCualRece->SelectedIndex = 1;
        }
        $this->lstCualRece->Visible = false;
    }

    // Guias "Hijas"
    protected function txtNumeSeri_Create() {
        $this->txtNumeSeri = new QTextBox($this);
        $this->txtNumeSeri->Name = QApplication::Translate('Números de Guía');
        $this->txtNumeSeri->TextMode = QTextMode::MultiLine;
        $this->txtNumeSeri->Height = 220;
        $this->txtNumeSeri->Width = 200;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function Form_Validate() {
        $strTextMens = 'Los siguientes campos son requeridos: <b>';
        $strMensErro = '';
        $blnTodoOkey = true;
        $this->mensaje();
        //-------------------------------------------------------
        // Se valida el campo de selección del lugar de entrega.
        //-------------------------------------------------------
        if (is_null($this->rdbTipoEntr->SelectedValue)) {
            $blnTodoOkey = false;
            $strMensErro .= 'Entregada Por';
        }
        //----------------------------------------
        // Se valida el campo de Números de Guía.
        //----------------------------------------
        if (strlen($this->txtNumeSeri->Text) == 0) {
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Números de Guía';
        }
        //----------------------------------------------------------------------------------------------------
        // Si hay uno o más errores, se notifica al usuario y no se permite la gestión masiva de liquidación.
        //----------------------------------------------------------------------------------------------------
        if (!$blnTodoOkey) {
            $strTextMens .= $strMensErro;
            $strTextMens .= '</b>.';
            $this->mensaje($strTextMens,'','d','i','hand-stop-o');
        }
        return $blnTodoOkey;
    }

    protected function rdbTipoEntr_Click() {
        if ($this->rdbTipoEntr->SelectedValue == "T") {
            if ($this->lstCualRece->ItemCount > 1) {
                //---------------------------------------------------------------------
                // Esta validación se realiza, porque puede ser que no exista ninguna
                // receptoría asociada a la Sucursal a la cual pertenece el Usuario
                //---------------------------------------------------------------------
                $this->lstCualRece->Visible = true;
            }
        } else {
            $this->lstCualRece->Visible = false;
        }
    }

    protected function btnSave_Click() {
        $blnTodoOkey = true;
        $blnErroCkpt = false;
        $strMensOper = '';
        $strMensUsua = '';
        $strTipoMens = 's';
        $strIconMens = 'check';
        $intContCkpt = 0;
        $arrTodaRece = array();
        $arrCkptRece = array();
        $objReceEntr = null;
        $arrGuiaOkey = explode(',',nl2br2($this->txtNumeSeri->Text));
        $arrGuiaOkey = LimpiarArreglo($arrGuiaOkey);
        $intContGuia = count($arrGuiaOkey);
        $this->txtNumeSeri->Text = '';
        $objCheckpoint = SdeCheckpoint::Load('OK');
        if (!$objCheckpoint) {
            $strMensUsua = QApplication::Translate('No se ha definido el Checkpoint "OK"');
            $strTipoMens = 'd';
            $strIconMens = 'hand-stop-o';
            $blnTodoOkey = false;
            $blnErroCkpt = true;
        }
        if ($blnTodoOkey) {
            if (!is_null($this->lstCualRece->SelectedValue)) {
                //-----------------------------------------------------------------------------------------
                // Se construye un arreglo con los checkpoints de confirmacion y almacen de la receptoria
                //-----------------------------------------------------------------------------------------
                $objReceEntr = $this->lstCualRece->SelectedValue;
                // miTraza("La receptoria seleccionada es: ".$objReceEntr->Siglas);
                $arrCkptRece = array($objReceEntr->CkptConfirmacion,$objReceEntr->CkptAlmacen);
                // miTraza("El vector de checkpoint de esa receptoria contiene: ".$arrCkptRece[0]." - ".$arrCkptRece[1]);
                //------------------------------------------------------------------------------------------------------
                // Se construye un vector con todos los checkpoints de confirmacion y almacen de todas las receptorias
                //------------------------------------------------------------------------------------------------------
                $arrRecePais = Counter::LoadArrayBySucursalId($this->objUsuario->CodiEsta);
                foreach ($arrRecePais as $objRecePais) {
                    if ($objRecePais->StatusId == StatusType::ACTIVO) {
                        $arrTodaRece[] = $objRecePais->CkptConfirmacion;
                        $arrTodaRece[] = $objRecePais->CkptAlmacen;
                    }
                }

                $objSucuUrb = Counter::Load(33);  // Receptoria Urbina
                if ($objSucuUrb) {
                    $arrTodaRece[] = $objSucuUrb->CkptConfirmacion;
                    $arrTodaRece[] = $objSucuUrb->CkptAlmacen;
                }

                $objSucuAlta = Counter::Load(3);  // Receptoria Altamira
                if ($objSucuAlta) {
                    $arrTodaRece[] = $objSucuAlta->CkptConfirmacion;
                    $arrTodaRece[] = $objSucuAlta->CkptAlmacen;
                }
            }
            foreach ($arrGuiaOkey as $strNumeSeri) {
                $blnTodoOkey = true;
                //-----------------------------------------------------------------------
                // Se procesa una a una las Guias proporcionadas por el Usuario
                //-----------------------------------------------------------------------
                $objGuia = Guia::Load($strNumeSeri);
                if (!$objGuia) {
                    $this->txtNumeSeri->Text .= $strNumeSeri." (No Existe Guia)".chr(13);
                    $blnTodoOkey = false;
                } else {
                    $arrSepuProc = $objGuia->SePuedeProcesar();
                    if (!$arrSepuProc['TodoOkey']) {
                        $this->txtNumeSeri->Text .= $strNumeSeri." ".$arrSepuProc['MensUsua'].chr(13);
                        $blnTodoOkey = false;
                    }
                }
                if ($blnTodoOkey) {
                    $calFechaPods = new QDateTime(QDateTime::Now);
                    //-------------------------------------------------------------
                    // Los Datos del POD se graban en la Guia
                    //-------------------------------------------------------------
                    if ($this->rdbTipoEntr->SelectedValue == "T") {
                        if (!is_null($this->lstCualRece->SelectedValue)) {
                            $strTextCkpt = "Entregado por Taquilla (".$objReceEntr->Siglas.")";
                            //miTraza("El texto del checkpoint sera: ".$strTextCkpt);
                            $strMensOper = QApplication::Translate($strTextCkpt);
                            //------------------------------------------------------------------------------------------------
                            // El checkpoint de confirmacion sirve para verificar que la pieza haya sido recibida de manera
                            // efectiva en la Receptoria indicada
                            //------------------------------------------------------------------------------------------------
                            $strUltiCkpt = $objGuia->ultimoCheckpointDeConfirmacion_o_Almacen($arrTodaRece);
                            //miTraza("El ultimo checkpoint de confirmacion de la guia es: ".$strUltiCkpt);
                            if (!in_array($strUltiCkpt,$arrCkptRece)) {
                                //miTraza("El ultimo checkpoint de confirmacion, no corresponde a la Receptoria seleccionada");
                                $this->txtNumeSeri->Text .= $strNumeSeri." (No Confirmada en: ".$objReceEntr->Siglas.")".chr(13);
                                $blnTodoOkey = false;
                            } else {
                                //miTraza("El ultimo checkpoint de confirmacion pertenece a la receptoria seleccionada");
                            }
                        } else {
                            $strTextCkpt = "Entregado por Taquilla ";
                            $strMensOper = $strTextCkpt;
                            //miTraza("No se selecciono ninguna receptoria");
                        }
                    } else {
                        $strMensOper = QApplication::Translate('Entregado en la Ruta');
                    }
                    if ($blnTodoOkey) {
                        $arrDatoPodx['objGuiaPodx'] = $objGuia;
                        $arrDatoPodx['objChecPodx'] = $objCheckpoint;
                        $arrDatoPodx['calFechPodx'] = $calFechaPods;
                        $arrDatoPodx['txtHoraPodx'] = date("H:i");
                        $arrDatoPodx['objUsuaPodx'] = $this->objUsuario;
                        $arrDatoPodx['txtUsuaPodx'] = $this->objUsuario->CodiUsua;
                        $arrDatoPodx['txtEntrAqui'] = strtoupper($strMensOper);
                        $arrDatoPodx['calFechEntr'] = $calFechaPods;
                        $arrDatoPodx['txtFechEntr'] = $calFechaPods->__toString("DD/MM/YYYY");
                        $arrDatoPodx['txtHoraEntr'] = date("H:i");
                        $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
                        if ($arrResuPodx['blnTodoOkey']) {
                            $intContCkpt ++;
                        } else {
                            $this->txtNumeSeri->Text .= $objGuia->NumeGuia." ".$arrResuPodx['strMensUsua'].chr(13);
                        }
                    }
                }
            }
        }
        if ($blnTodoOkey && ($intContGuia == $intContCkpt)) {
            $strMensUsua = sprintf(
                'El Proceso culmino Exitosamente. Guias procesadas (%s)  Checkpoints procesados (%s)',
                $intContGuia,
                $intContCkpt
            );
        } else {
            if (!$blnErroCkpt) {
                $strMensUsua = sprintf(
                    'Hubo Errores en la Transaccion. Guias procesadas (%s)  Checkpoints procesados (%s)',
                    $intContGuia,
                    $intContCkpt
                );
                $strTipoMens = 'd';
                $strIconMens = 'hand-stop-o';
                $this->txtNumeSeri->Width = 280;
            }
        }
        if (strlen($strMensUsua) > 0) {
            $this->mensaje($strMensUsua,'',$strTipoMens,'i',$strIconMens);
        }
    }
}

LiquidacionMasivaPods::Run('LiquidacionMasivaPods');
?>