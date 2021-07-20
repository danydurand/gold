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
        $this->lblTituForm->Text = 'ACCESO YOKOHAMA';
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
        //$objClauWher   = QQ::Clause();
        //$objClauWher[] = QQ::In(QQN::Sistema()->CodiSist,array('pmn','sde'));
        //$arrSistDisp   = Sistema::QueryArray(QQ::AndCondition($objClauWher));
        //$this->lstCodiSist->AddItem('- Seleccione Uno -',null);
        //foreach ($arrSistDisp as $objSistDisp) {
        //    $strNombSist = $objSistDisp->__toString();
        //    if ($objSistDisp->CodiSist == 'sde') {
        //        $strNombSist = 'SISCO';
        //    }
        //    $this->lstCodiSist->AddItem($strNombSist,$objSistDisp->CodiSist);
        //}
        $this->lstCodiSist->AddItem('SISCO','sde',true);
    }

    protected function btnAcceSist_Create () {
        $this->btnAcceSist = new QButtonS($this);
        $this->btnAcceSist->Text = TextoIcono('sign-in','Entrar','F','lg'); //'<i class="fa fa-sign-in fa-fw"></i> Entrar';
        //$this->btnAcceSist->CssClass = 'btn btn-success';
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


<?php

// class MiLoginForm extends QForm {
//
//    // protected $txtUsername;
//    // protected $txtPassword;
//    // protected $lblMensErro;
//    // protected $btnLogin;
//    // protected $imgLogin;
//    // protected $objParametro;
//    // protected $lstCodiSistObject;
//    // protected $sistema;
//    // protected $lblLogin;
//    // protected $lblClave;
//    // protected $txtMiLogin;
//    // protected $txtMiPassword;
//    // protected $objUsuaAdmi;
//
//    protected function Form_Create() {
//       // $this->lblMensErro = new QLabel($this);
//       // $this->lblMensErro->Text = '';
//       // $this->lblMensErro->Width = 220;
//       // $this->lblMensErro->HorizontalAlign = 'center';
//
//       // $this->imgLogin = new QImageButton($this);
//       // $this->imgLogin->ImageUrl = 'util/imagenes/apply_f2.png';
//       // $this->imgLogin->AddAction(new QClickEvent(), new QServerAction('btnLogin_Click'));
//       // $this->imgLogin->PrimaryButton = true;
//       // $this->imgLogin->CausesValidation = true;
//
//       // $this->txtMiLogin = new QTextBox($this);
//       // $this->txtMiLogin->Width = 80;
//       // $this->txtMiLogin->Required = true;
//       // $this->txtMiLogin->SetFocus();
//       // $this->txtMiLogin->AddAction(new QBlurEvent(), new QAjaxAction('txtMiLogin_Blur'));
//
//       // $this->txtMiPassword = new QTextBox($this);
//       // $this->txtMiPassword->TextMode = QTextMode::Password;
//       // $this->txtMiPassword->Width = 80;
//       // $this->txtMiPassword->Required = true;
//       // $this->txtMiPassword->AddAction(new QBlurEvent(), new QAjaxAction('txtMiPassword_Blur'));
//       //
//       // $this->lstCodiSistObject_Create();
//       //
//       // $this->txtUsername = new QTextBox($this);
//       // $this->txtUsername->Width = 80;
//       // $this->txtUsername->Required = true;
//
//       // $this->txtPassword = new QTextBox($this);
//       // $this->txtPassword->Name = QApplication::Translate('Clave');
//       // $this->txtPassword->TextMode = QTextMode::Password;
//       // $this->txtPassword->Width = 80;
//       // $this->txtPassword->Required = true;
//
//       // $this->objParametro = Parametro::Load('88888', 'logos');
//    }
//
//    //------------------------------------
//    // Acciones referidas a los objetos
//    //------------------------------------
//
//    // protected function txtMiLogin_Blur($strFormId, $strControlId, $strParameter) {
//    //    if (!in_array($this->txtMiLogin->Text, array('ddurand', 'lufeman'))) {
//    //       $this->imgLogin->Visible = false;
//    //       $this->txtMiLogin->Warning = "Acceso no Autorizado";
//    //    } else {
//    //       $this->imgLogin->Visible = true;
//    //       $this->txtMiLogin->Warning = "";
//    //       $this->objUsuaAdmi = Usuario::LoadByLogiUsua($this->txtMiLogin->Text);
//    //    }
//    // }
//
//    // protected function txtMiPassword_Blur($strFormId, $strControlId, $strParameter) {
//    //    if (in_array($this->txtMiLogin->Text, array('ddurand', 'lufeman'))) {
//    //       if ($this->objUsuaAdmi->PassUsua != md5($this->txtMiPassword->Text)) {
//    //          $this->txtMiPassword->Warning = "Password Incorrecto";
//    //          $this->imgLogin->Visible = FALSE;
//    //       } else {
//    //          $this->txtMiPassword->Warning = "";
//    //          $this->imgLogin->Visible = true;
//    //       }
//    //    }
//    // }
//
//    // protected function txtUsername_Blur($strFormId, $strControlId, $strParameter) {
//    //    if (in_array($this->txtUsername->Text, array('ddurand', 'lufeman'))) {
//    //       $objSistInfo = Sistema::Load('sig');
//    //       if ($objSistInfo) {
//    //          $this->lstCodiSistObject->AddItem($objSistInfo->DescSist, $objSistInfo->CodiSist);
//    //       }
//    //    } else {
//    //       $this->lstCodiSistObject->RemoveAllItems();
//    //       $this->lstCodiSistObject->Width = 200;
//    //       $objCodiSistObjectArray = Sistema::LoadAll();
//    //       $this->lstCodiSistObject->AddItem(QApplication::Translate('- Select One -'), null);
//    //       if ($objCodiSistObjectArray) {
//    //          foreach ($objCodiSistObjectArray as $objCodiSistObject) {
//    //             if (in_array($objCodiSistObject, array('dsp', 'sde', 'fac', 'cnt', 'int'))) {
//    //                $objListItem = new QListItem($objCodiSistObject->DescSist, $objCodiSistObject->CodiSist);
//    //                $this->lstCodiSistObject->AddItem($objListItem);
//    //             }
//    //          }
//    //       }
//    //       //-------------------------------------------------------
//    //       // Se verifica la existencia del login proporcionado
//    //       //-------------------------------------------------------
//    //       $objUsuario = Usuario::LoadByLogiUsua($this->txtUsername->Text);
//    //       if (!$objUsuario) {
//    //          $this->txtUsername->Warning = "No existe este Usuario";
//    //       } else {
//    //          $this->txtUsername->Warning = "";
//    //       }
//    //    }
//    // }
//
//    // protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
//    //    $blnTodoOkey = true;
//    //    $_SESSION['PagiReto'] = '';
//    //    $objUser = Usuario::LoadByLogiUsua($this->txtUsername->Text);
//    //    $_SESSION['UltiAcce'] = $objUser->FechAcce->__toString("DD/MM/YYYY hh:mm:ss");
//    //    $_SESSION['User'] = serialize($objUser);
//    //    $_SESSION['Sistema'] = $this->lstCodiSistObject->SelectedValue;
//    //    $_SESSION['Empresa'] = 'liberty';
//    //    QApplication::Redirect(sprintf('util/includes/ctrlmenu.php?NombMenu=%s', 'menuppal.php'));
//    // }
//
//    // protected function lstCodiSistObject_Create() {
//    //    $this->lstCodiSistObject = new QListBox($this);
//    //    $this->lstCodiSistObject->Name = QApplication::Translate('Sistema');
//    //    $this->lstCodiSistObject->Required = true;
//    //    $this->lstCodiSistObject->Width = 200;
//    //    $objCodiSistObjectArray = Sistema::LoadAll();
//    //    $this->lstCodiSistObject->AddItem(QApplication::Translate('- Select One -'), null);
//    //    if ($objCodiSistObjectArray)
//    //       foreach ($objCodiSistObjectArray as $objCodiSistObject) {
//    //          if (in_array($objCodiSistObject, array('dsp', 'sde', 'fac', 'cnt', 'int'))) {
//    //             $objListItem = new QListItem($objCodiSistObject->DescSist, $objCodiSistObject->CodiSist);
//    //             $this->lstCodiSistObject->AddItem($objListItem);
//    //          }
//    //       }
//    // }
//
//    // protected function lstChange_Click() {
//    //    $this->sistema = $this->lstCodiSistObject->SelectedValue;
//    // }
//
//    // protected function EnviarNotificacion($objUser) {
//    //    //---------------------------------------------------------
//    //    // Se envia el mensaje por e-mail a los administradores
//    //    //---------------------------------------------------------
//    //    $strEnviMail = BuscarParametro('MailAdmi', 'EnviSino', 'Txt1', 'S');
//    //    $strTextMens = "El Usuario " . $objUser->NombApel() . " (" . $objUser->LogiUsua . ") de la Sucursal (" . $objUser->CodiEsta . ")<br> intento acceder al Sistema pero esta inactivo por: <font color='red'>" . $objUser->MotiBloq . "</font>";
//    //    $strTituRepo = utf8_decode("Acceso Denegado en Liberty");
//    //    $to = array('danydurand@gmail.com', 'lufeman@gmail.com');
//    //    $mimemail = new MIMEMAIL('HTML');
//    //    $mimemail->senderName = 'LibertyExpress';
//    //    $mimemail->senderMail = 'localhost@app-libertyexpress.com';
//    //    $mimemail->subject = $strTituRepo;
//    //    $mimemail->body = $strTextMens;
//    //    $mimemail->create();
//    //    if ($strEnviMail == 'S') {
//    //       $mimemail->send($to);
//    //    }
//    // }
//
// }
//
// MiLoginForm::Run('MiLoginForm', 'indexmio.tpl.php');
?>
