<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');

class IndexMio extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;

    protected $txtLogiUsua;
    protected $txtClavAcce;
    protected $txtSimuUsua;
    protected $lstCodiSist;
    protected $btnAcceSist;
    protected $chkUltiProg;
    protected $objUsuaAdmi;
    protected $blnTodoOkey;

    protected function Form_Create() {

        //$this->lblTituForm_Create();
        $this->lblMensUsua_Create();

        $this->txtLogiUsua_Create();
        $this->txtClavAcce_Create();
        $this->txtSimuUsua_Create();
        $this->lstCodiSist_Create();

        $this->btnAcceSist_Create();

        $this->txtLogiUsua->SetFocus();

        $this->blnTodoOkey = false;

    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'ACCESO';
    }

    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
    }

    protected function txtLogiUsua_Create() {
        $this->txtLogiUsua = new QTextBox($this);
        $this->txtLogiUsua->Name = 'Usuario';
        $this->txtLogiUsua->Required = true;
        $this->txtLogiUsua->Width = 100;
        $this->txtLogiUsua->AddAction(new QBlurEvent(), new QAjaxAction('txtLogiUsua_Blur'));
    }

    protected function txtClavAcce_Create() {
        $this->txtClavAcce = new QTextBox($this);
        $this->txtClavAcce->Name = 'Contraseña';
        $this->txtClavAcce->TextMode = QTextMode::Password;
        $this->txtClavAcce->Required = true;
        $this->txtClavAcce->Width = 100;
        $this->txtClavAcce->AddAction(new QBlurEvent(), new QAjaxAction('txtClavAcce_Blur'));
    }

    protected function txtSimuUsua_Create() {
        $this->txtSimuUsua = new QTextBox($this);
        $this->txtSimuUsua->Name = 'Simulando al Usuario';
        $this->txtSimuUsua->Required = true;
        $this->txtSimuUsua->Width = 100;
        $this->txtSimuUsua->AddAction(new QBlurEvent(), new QAjaxAction('txtSimuUsua_Blur'));
    }

    protected function lstCodiSist_Create() {
        $this->lstCodiSist = new QListBox($this);
        $this->lstCodiSist->Name = 'Sub-Sistema';
        $this->lstCodiSist->Required = true;
        $this->lstCodiSist->Width = 180;
        $this->lstCodiSist->AddItem('SISCO','sde',true);
    }

    protected function btnAcceSist_Create () {
        $this->btnAcceSist = new QButtonS($this);
        $this->btnAcceSist->Text = TextoIcono('sign-in','Entrar','F','lg'); //'<i class="fa fa-sign-in fa-fw"></i> Entrar';
        $this->btnAcceSist->HtmlEntities = false;
        $this->btnAcceSist->CausesValidation = true;
        $this->btnAcceSist->PrimaryButton = true;
        $this->btnAcceSist->AddAction(new QClickEvent(), new QServerAction('btnAcceSist_Click'));
    }

    //------------------------------------
    // Acciones referidas a los objetos
    //------------------------------------

    protected function txtLogiUsua_Blur() {
        if (!in_array($this->txtLogiUsua->Text, array('ddurand', 'ianzola'))) {
            $this->txtLogiUsua->Warning = "Acceso no Autorizado";
            $this->blnTodoOkey = false;
        } else {
            $this->txtLogiUsua->Warning = "";
            $this->blnTodoOkey = true;
            $this->objUsuaAdmi = Usuario::LoadByLogiUsua($this->txtLogiUsua->Text);
        }
    }

    protected function txtClavAcce_Blur($strFormId, $strControlId, $strParameter) {
        if ($this->objUsuaAdmi) {
            if ($this->objUsuaAdmi->PassUsua != md5($this->txtClavAcce->Text)) {
                $this->blnTodoOkey = false;
                $this->txtClavAcce->Warning = "Password Incorrecto";
            } else {
                $this->txtClavAcce->Warning = "";
                $this->blnTodoOkey = $this->blnTodoOkey ? true : false;
            }
        }
    }

    protected function txtSimuUsua_Blur() {
        $objUsuario = Usuario::LoadByLogiUsua($this->txtSimuUsua->Text);
        if (!$objUsuario) {
            $this->blnTodoOkey = false;
            $this->txtSimuUsua->Warning = "No existe este Usuario";
        } else {
            $this->blnTodoOkey = $this->blnTodoOkey ? true : false;
            $this->txtSimuUsua->Warning = "";
        }
    }

    protected function btnAcceSist_Click() {
        $objUsuario = Usuario::LoadByLogiUsua($this->txtSimuUsua->Text);
        if (!$objUsuario) {
            $this->txtLogiUsua->Warning = ' Usuario Desconocido';
            $this->txtLogiUsua->Width   = 100;
            return;
        }
        if (!in_array($this->txtLogiUsua->Text, array('ddurand', 'ianzola'))) {
            $this->txtLogiUsua->Warning = "Acceso no Autorizado";
            return;
        }
        $this->objUsuaAdmi = Usuario::LoadByLogiUsua($this->txtLogiUsua->Text);
        if (!$this->objUsuaAdmi) {
            $this->txtLogiUsua->Warning = "Usuario Desconocido";
            return;
        }
        if ($this->objUsuaAdmi->PassUsua != md5($this->txtClavAcce->Text)) {
            $this->txtClavAcce->Warning = "Password Incorrecto";
            return;
        }
        $_SESSION['User'] = serialize($objUsuario);
        $_SESSION['country_code']  = 've';
        $_SESSION['language_code'] = 'es';
        $_SESSION['UltiAcce']      = $objUsuario->FechAcce;
        $_SESSION['Sistema']       = $this->lstCodiSist->SelectedValue;
        $_SESSION['NombSist']      = $this->lstCodiSist->SelectedName;
        $_SESSION['NombDire']      = 'yokohama';
        define ('__SIST__', '/app/'.$_SESSION['Sistema']);

        $this->SetupValoresDeSesion($_SESSION['Sistema']);

        PilaAcceso::Clean();
        QApplication::Redirect('app/mg.php');
    }

    protected function SetupValoresDeSesion($strSistPath) {
        t('==============================================');
        t('Entrando a SetupValoresDeSesion en el IndexMio');
        $_SESSION['NombEmpr'] = 'GOLD COAST';
        $strEmaiSopo = BuscarParametro('CntaSopo','EmaiSopo','Txt1','soporte@lufemansoftware.com');
        $_SESSION['EmaiSopo'] = serialize($strEmaiSopo);
        //------------------------------
        // Tarifa del Expreso Nacional
        //------------------------------
        $objClieTari = MasterCliente::LoadByCodigoInterno('NAC01');
        $objTariPmnx = $objClieTari->Tarifa;
        $_SESSION['TariPmnx'] = serialize($objTariPmnx);
        //--------------------------------
        // Logines que deben dejar traza
        //--------------------------------
        $strLogiTraz = Parametros::BuscarParametro('LOGITRAZ','PARATRAZ','Txt1','ddurand');
        $arrLogiTraz = explode(',',$strLogiTraz);
        $_SESSION['LogiTraz'] = $arrLogiTraz;

    }
}
IndexMio::Run('IndexMio','indexmio.tpl.php');
?>


