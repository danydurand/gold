<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');

class Index extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;

    protected $txtLogiUsua;
    protected $txtClavAcce;
    protected $lstCodiSist;
    protected $btnAcceSist;
    protected $chkUltiProg;

    protected function Form_Create() {

        $this->lblTituForm_Create();
        $this->lblMensUsua_Create();

        $this->txtLogiUsua_Create();
        $this->txtClavAcce_Create();
        $this->lstCodiSist_Create();

        $this->btnAcceSist_Create();

        $this->txtLogiUsua->SetFocus();
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
        $this->txtLogiUsua->AddAction(new QFocusEvent(), new QAjaxAction('txtLogiUsua_Focus'));
    }

    protected function txtClavAcce_Create() {
        $this->txtClavAcce = new QTextBox($this);
        $this->txtClavAcce->Name = 'Contraseña';
        $this->txtClavAcce->TextMode = QTextMode::Password;
        $this->txtClavAcce->Required = true;
        $this->txtClavAcce->Width = 100;
        $this->txtClavAcce->AddAction(new QFocusEvent(), new QAjaxAction('txtClaveAcce_Focus'));
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
        $this->btnAcceSist = new QButton($this);
        $this->btnAcceSist->Text = '<i class="fa fa-sign-in fa-fw"></i> Entrar';
        $this->btnAcceSist->CssClass = 'btn btn-success';
        $this->btnAcceSist->HtmlEntities = false;
        $this->btnAcceSist->CausesValidation = true;
        $this->btnAcceSist->PrimaryButton = true;
        $this->btnAcceSist->AddAction(new QClickEvent(), new QServerAction('btnAcceSist_Click'));
    }

    //------------------------------------
    // Acciones referidas a los objetos
    //------------------------------------

    protected function txtLogiUsua_Focus() {
        $this->blanquearMensaje();
    }

    protected function txtClaveAcce_Focus() {
        $this->blanquearMensaje();
    }

    protected function blanquearMensaje() {
        $this->lblMensUsua->Text = '';
    }

    protected function btnAcceSist_Click() {
        $strSituUsua = '';
        $objUsuario  = Usuario::LoadByLogiUsua($this->txtLogiUsua->Text);
        if ($objUsuario) {
            $_SESSION['User'] = serialize($objUsuario);
            if (!is_null($objUsuario->DeleteAt)) {
                //------------------------
                // Log de Transacciones
                //------------------------
                $arrLogxCamb['strNombTabl'] = 'Acceso';
                $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                $arrLogxCamb['strDescCamb'] = 'Usuario eliminado intentó acceder al Sistema';
                LogDeCambios($arrLogxCamb);
                $this->EnviarNotificacion($objUsuario);
                $objUsuario  = null;
                $strSituUsua = 'Eliminado';
            }
            if ($objUsuario) {
                if ($objUsuario->CodiStat == StatusType::INACTIVO) {
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $arrLogxCamb['strNombTabl'] = 'Acceso';
                    $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                    $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                    $arrLogxCamb['strDescCamb'] = 'Usuario inactivo intentó acceder al Sistema';
                    LogDeCambios($arrLogxCamb);
                    $this->EnviarNotificacion($objUsuario);
                    $objUsuario  = null;
                    $strSituUsua = 'Inactivado';
                }
            }
        } else {
            $strSituUsua = 'Desconocido';
        }
        if ($objUsuario) {
            $_SESSION['User'] = serialize($objUsuario);
            if ($objUsuario->PassUsua == md5($this->txtClavAcce->Text)) {
                if (is_null($objUsuario->FechAcce)) {
                    $objUsuario->FechAcce = new QDateTime(QDateTime::Now);
                }
                $_SESSION['country_code']  = 've';
                $_SESSION['language_code'] = 'es';
                $_SESSION['UltiAcce']      = $objUsuario->FechAcce;
                $_SESSION['Sistema']       = $this->lstCodiSist->SelectedValue;
                $_SESSION['NombSist']      = $this->lstCodiSist->SelectedName;
                $_SESSION['NombDire']      = 'yokohama';
                define ('__SIST__', '/app/'.$_SESSION['Sistema']);

                $objUsuario->FechAcce = new QDateTime(QDateTime::Now);
                $objUsuario->CantInte = 0;
                $objUsuario->Save();

                $this->SetupValoresDeSesion($_SESSION['Sistema']);
                //-----------------------------------------------------------------------------
                // Si la clave de acceso ha caducado, el Usuario debera actualizarla
                //-----------------------------------------------------------------------------
                if (is_null($objUsuario->FechClav)) {
                    $objUsuario->FechClav = new QDateTime(QDateTime::Now);
                }
                if (DiasTranscurridos(date('Y-m-d'), $objUsuario->FechClav->__toString("YYYY-MM-DD")) >= 90) {
                    $_SESSION['ClavVenc'] = 1;
                    QApplication::Redirect('app/cambiar_clave.php');
                }

                PilaAcceso::Clean();
                QApplication::Redirect('app/mg.php');
            } else {
                $this->txtClavAcce->Warning = ' Contraseña Errada';
                $this->txtClavAcce->Width   = 100;
                //--------------------------------------
                // Esto se cuenta como intento fallido
                //--------------------------------------
                $objUsuario->CantInte += 1;
                //------------------------
                // Log de Transacciones
                //------------------------
                $arrLogxCamb['strNombTabl'] = 'Acceso';
                $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                $arrLogxCamb['strDescCamb'] = 'Intento fallido nro: '.$objUsuario->CantInte;
                LogDeCambios($arrLogxCamb);

                if ($objUsuario->CantInte >= 5) {
                    $objUsuario->CodiStat = StatusType::INACTIVO;
                    $objUsuario->MotiBloq = 'Exceso de intentos fallidos';
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $arrLogxCamb['strNombTabl'] = 'Acceso';
                    $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                    $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                    $arrLogxCamb['strDescCamb'] = 'Usuario bloqueado por exceso de intento fallidos';
                    LogDeCambios($arrLogxCamb);
                    $this->EnviarNotificacion($objUsuario);
                    $this->txtLogiUsua->Warning = ' Usuario Bloqueado ';
                    $this->txtLogiUsua->Width   = 100;
                }
                $objUsuario->Save();
            }
        } else {
            $this->txtLogiUsua->Warning = ' Usuario '.$strSituUsua;
            $this->txtLogiUsua->Width   = 100;
        }
    }

    protected function EnviarNotificacion(Usuario $objUser) {
        //---------------------------------------------------------
        // Se envia el mensaje por e-mail a los administradores
        //---------------------------------------------------------
        $strEnviMail = BuscarParametro('MailAdmi', 'EnviSino', 'Txt1', 'S');
        $strTextMens = "El Usuario: " . $objUser->LogiUsua .
                       " de la Sucursal (" . $objUser->CodiEsta . ")<br> intento acceder al Sistema pero esta inactivo por: <font color='red'>" .
                       $objUser->MotiBloq . "</font>";
        $strTituRepo = utf8_decode("Acceso Denegado en GoldCoast");
        $to = array('soporte@lufemansoftware.com');
        $mimemail = new MIMEMAIL('HTML');
        $mimemail->senderName = 'GoldCoast';
        $mimemail->senderMail = 'noti@goldsist.com';
        $mimemail->subject = $strTituRepo;
        $mimemail->body = $strTextMens;
        $mimemail->create();
        if ($strEnviMail == 'S') {
            $mimemail->send($to);
        }
    }

    protected function SetupValoresDeSesion($strSistPath) {
        t('===========================================');
        t('Entrando a SetupValoresDeSesion en el Index');
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
Index::Run('Index','index.tpl.php');
?>
