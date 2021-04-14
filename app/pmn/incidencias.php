<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : incidencias.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 29/08/17
// Proyecto       : newliberty
// Descripcion    : Este programa permite asignar incidencias a una o varias guías.
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class Incidencias extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros de objetos
    //-----------------------
    protected $objDataBase;
    protected $objOperSele;
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $strCadeSqlx;
    protected $intOperSele;
    protected $intContRegi;
    protected $arrColuQury;
    protected $arrNumeCont;
    protected $arrValoQury;
    protected $arrGuiaSina;
    //--------------------------------------
    // Parámetros de gestión del formulario
    //--------------------------------------
    protected $txtNumeSeri;
    protected $txtTextObse;
    protected $lstListCkpt;
    protected $lstCodiEsta;
    protected $rdbTipoInci;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Incidencias';

        $this->rdbTipoInci_Create();
        $this->lstListCkpt_Create();
        $this->txtNumeSeri_Create();
        $this->txtTextObse_Create();

        $this->intContRegi = 0;
    }

    //---------------------------
    // Aquí se crean los objetos
    //---------------------------

    protected function rdbTipoInci_Create() {
        $this->rdbTipoInci = new QRadioButtonList($this);
        $this->rdbTipoInci->Name = QApplication::Translate('Tipo de Incidencia');
        $this->rdbTipoInci->AddItem('&nbsp;REGISTRO DE TRABAJO &nbsp;&nbsp;','R');
        $this->rdbTipoInci->AddItem('&nbsp;OPERATIVA','O');
        $this->rdbTipoInci->HtmlEntities = false;
        $this->rdbTipoInci->Required = true;
        $this->rdbTipoInci->SelectedIndex = 1;
        $this->rdbTipoInci->RepeatColumns = 2;
        $this->rdbTipoInci->AddAction(new QChangeEvent(), new QAjaxAction('rdbTipoInci_Change'));
    }

    protected function txtTextObse_Create() {
        $this->txtTextObse = new QTextBox($this);
        $this->txtTextObse->Name = QApplication::Translate('Observacion');
        $this->txtTextObse->Width = 400;
        $this->txtTextObse->MaxLength = 100;
        $this->txtTextObse->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtTextObse->Required = true;
    }

    protected function lstListCkpt_Create() {
        $this->lstListCkpt = new QListBox($this);
        $this->lstListCkpt->Name = QApplication::Translate("Checkpoint");
        $this->lstListCkpt->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstListCkpt->Width = 310;
        //----------------------------------------------------------------------------------
        // No todos los checkpoints pueden ser utilizados en esta pantalla de Incidencias.
        // Esto se controla en la tabla Parametro. Inicialmente se arma un vector con los
        // checkpoints que nadie puede usar en este formulario.
        //----------------------------------------------------------------------------------
        $strCkptNadi = BuscarParametro("CtrlCkpt","Nadie","Txt1","'OK','TR','AR','ER','PU','BG'");
        $arrCkptNadi = explode(",",$strCkptNadi);
        //-------------------------------------------------------------------------------
        // Existen otros checkpoints que solo pueden ser usados por "algunos" Usuarios.
        //-------------------------------------------------------------------------------
        $strCkptAlgu = BuscarParametro("CtrlCkpt","Algunos","Txt1","'PP'");
        $arrCkptAlgu = explode(",",$strCkptAlgu);
        foreach (SdeCheckpoint::LoadArrayByCodiStat(1) as $objCkpt) {
            if ($objCkpt->TextObse == 'SDE' && $objCkpt->CodiInad == MasInciCkptType::INCIDENCIA) {
                if (!in_array($objCkpt->CodiCkpt,$arrCkptNadi)) {
                    if (in_array($objCkpt->CodiCkpt,$arrCkptAlgu)) {
                        //------------------------------------------------------------------
                        // Si el checkpoint solo puede ser usado por algunos Usuarios, se
                        // verifica si el Usuario actual es uno de esos
                        //------------------------------------------------------------------
                        $strUsuaCkpt = BuscarParametro("CtrlCkpt",$objCkpt->CodiCkpt,"Txt1","ddurand");
                        $arrUsuaCkpt = explode(",",$strUsuaCkpt);
                        if (in_array($this->objUsuario->LogiUsua,$arrUsuaCkpt)) {
                            //-----------------------------------------------------------------------------
                            // Si el Usuario esta autorizado a usarlo, el checkpoint se agrega al ListBox
                            //-----------------------------------------------------------------------------
                            $this->lstListCkpt->AddItem($objCkpt->__toString(),$objCkpt->CodiCkpt);
                        }
                    } else {
                        //--------------------------------------------------------------------------------
                        // El checkpoint no tiene restricciones de uso y se agrega libremente al ListBox
                        //--------------------------------------------------------------------------------
                        $this->lstListCkpt->AddItem($objCkpt->__toString(),$objCkpt->CodiCkpt);
                    }
                }
            }
        }
        $this->lstListCkpt->Required = true;
        $this->lstListCkpt->Width = 310;
    }

    protected function txtNumeSeri_Create() {
        $this->txtNumeSeri = new QTextBox($this);
        $this->txtNumeSeri->Name = QApplication::Translate("Nro de Guias");
        $this->txtNumeSeri->Required = true;
        $this->txtNumeSeri->TextMode = QTextMode::MultiLine;
        $this->txtNumeSeri->Height = 200;
        $this->txtNumeSeri->Width = 400;
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function rdbTipoInci_Change() {
        if ($this->rdbTipoInci->SelectedValue == "R") {
            $this->lstListCkpt->Visible = false;
            $this->txtTextObse->Name = QApplication::Translate("Comentario Interno");
            $this->txtTextObse->MaxLength = 250;
            $this->txtTextObse->TextMode = QTextMode::MultiLine;
        } else {
            $this->lstListCkpt->Visible = true;
            $this->txtTextObse->Name = QApplication::Translate("Observacion");
            $this->txtTextObse->MaxLength = 100;
            $this->txtTextObse->TextMode = QTextMode::SingleLine;
        }
        $this->mensaje();
    }

    protected function btnSave_Click() {
        $this->objDataBase = QApplication::$Database[1];
        $this->objUsuario = unserialize($_SESSION['User']);
        $this->arrGuiaSina = array();
        $strMensUsua = '';
        $strTipoMens = '';
        $strIconMens = 'check';

        $arrGuiaOkey = explode(',',nl2br2($this->txtNumeSeri->Text));
        $strCodiCkpt = $this->lstListCkpt->SelectedValue;
        $this->txtNumeSeri->Text = '';
        //---------------------------------------------------------------------------------------------
        // La rutina "GrabarCheckpoint" que sera invocada mas adelante en este mismo codigo, hace uso
        // de una variable llamada $_SERVER['CkptConf'] la cual debe contener un arreglo con los
        // checkpoints de confirmacion; por lo tanto, aqui se genera y almacena dicho vector
        //---------------------------------------------------------------------------------------------
        $arrVectRece = Counter::LoadArrayByStatusId(1);
        $arrCkptConf = array();
        foreach ($arrVectRece as $objReceptoria) {
            $arrCkptConf[] = $objReceptoria->CkptConfirmacion;
        }
        $_SERVER['CkptConf'] = $arrCkptConf;

        if ($this->rdbTipoInci->SelectedValue == "O") {
            $strCodiCkpt = $this->lstListCkpt->SelectedValue;
        } else {
            $strCodiCkpt = "CG";
        }
        $intContVali = 0;
        $intContGuia = 0;
        $intContCkpt = 0;
        $blnTodoOkey = false;
        foreach ($arrGuiaOkey as $strNumeSeri) {
            if (strlen($strNumeSeri)) {
                $blnTodoOkey = true;
                //-----------------------------------------------------------------------
                // Se procesa una a una las Guias proporcionadas por el Usuario
                //-----------------------------------------------------------------------
                $objGuia = Guia::Load($strNumeSeri);
                if (!$objGuia) {
                    $this->txtNumeSeri->Text .= $strNumeSeri." (No Existe Guia)".chr(13);
                    $blnTodoOkey = false;
                } else {
                    $intContGuia++;
                }
                if ($blnTodoOkey) {
                    if ($this->rdbTipoInci->SelectedValue == 'R') {
                        //------------------------------------
                        // Incidencia de Registro de Trabajo
                        //------------------------------------
                        $arrParaRegi['CodiCkpt'] = $strCodiCkpt;
                        $arrParaRegi['TextMens'] = "INCIDENCIAS: ".strtoupper($this->txtTextObse->Text);
                        $arrParaRegi['NumeGuia'] = $strNumeSeri;
                        $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                        $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
                        CrearRegistroDeTrabajo($arrParaRegi);
                        $intContCkpt ++;
                    } else {
                        //-------------------------
                        // Incidencia Operativa
                        //-------------------------
                        $arrDatoCkpt = array();
                        $arrDatoCkpt['NumeGuia'] = $strNumeSeri;
                        $arrDatoCkpt['UltiCkpt'] = '';
                        $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
                        $arrDatoCkpt['CodiCkpt'] = $strCodiCkpt;
                        $arrDatoCkpt['TextCkpt'] = $this->txtTextObse->Text; //$objCheckpoint->DescCkpt;
                        $arrDatoCkpt['CodiRuta'] = ''; //$strCodiRuta;
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                        if ($arrResuGrab['TodoOkey']) {
                            $intContCkpt ++;
                        } else {
                            if ($arrResuGrab['MotiNook'] == "Alto Valor sin Monto de Aduana") {
                                $this->arrGuiaSina[] = array($strNumeSeri);
                            }
                            $blnTodoOkey = false;
                            $this->txtNumeSeri->Text .= $strNumeSeri." (".$arrResuGrab['MotiNook'].")".chr(13);
                        }
                    }
                }
            }
        }
        if ($blnTodoOkey && ($intContGuia == $intContCkpt)) {
            if ($this->rdbTipoInci->SelectedValue == 'R') {
                $strMensUsua = sprintf('El Proceso culmino Exitosamente. Guias procesadas (%s)',$intContGuia);
            } else {
                $strMensUsua = sprintf('El Proceso culmino Exitosamente. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
            }
        } else {
            $strMensUsua = sprintf('Hubo Errores en la Transaccion. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
            $strTipoMens = 'd';
            $strIconMens = 'hand-stop-o';
        }
        $this->mensaje($strMensUsua,'',$strTipoMens,'i',$strIconMens);
    }
}

Incidencias::Run('Incidencias');