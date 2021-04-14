<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

class Mobile extends QForm {
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
      // $this->lstCodiSist_Create();

      $this->btnAcceSist_Create();

      $this->txtLogiUsua->SetFocus();
   }

   //-----------------------------
   // Aqui se crean los objetos 
   //-----------------------------

   protected function lblTituForm_Create() {
      $this->lblTituForm = new QLabel($this);
      $this->lblTituForm->Text = 'OKINAWA MOBILE';
   }

   protected function lblMensUsua_Create() {
      $this->lblMensUsua = new QLabel($this);
   }

   protected function txtLogiUsua_Create() {
      $this->txtLogiUsua = new QTextBox($this);
      $this->txtLogiUsua->Name = 'Usuario';
      $this->txtLogiUsua->Required = true;
      $this->txtLogiUsua->Width = 180;
      $this->txtLogiUsua->AddAction(new QFocusEvent(), new QAjaxAction('txtLogiUsua_Focus'));
   }

   protected function txtClavAcce_Create() {
      $this->txtClavAcce = new QTextBox($this);
      $this->txtClavAcce->Name = 'Contraseña';
      $this->txtClavAcce->TextMode = QTextMode::Password;
      $this->txtClavAcce->Required = true;
      $this->txtClavAcce->Width = 180;
      $this->txtClavAcce->AddAction(new QFocusEvent(), new QAjaxAction('txtClaveAcce_Focus'));
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
      $objUsuario = Usuario::LoadByLogin($this->txtLogiUsua->Text);
      if ($objUsuario) {
         $_SESSION['User'] = serialize($objUsuario);
         if ($objUsuario->Password == md5($this->txtClavAcce->Text)) {
            if (is_null($objUsuario->UltimoAcceso)) {
               $objUsuario->UltimoAcceso = new QDateTime(QDateTime::Now);
            }
            $_SESSION['country_code']  = 've';
            $_SESSION['language_code'] = 'es';
            $_SESSION['UltiAcce']      = $objUsuario->UltimoAcceso;
            // $_SESSION['Sistema']       = $this->lstCodiSist->SelectedValue;
            // $_SESSION['NombSist']      = $this->lstCodiSist->SelectedName;
            $_SESSION['NombDire']      = 'servex';

            $objUsuario->UltimoAcceso = new QDateTime(QDateTime::Now);
            $objUsuario->Intentos = 0;
            $objUsuario->Save();
            //-----------------------------------------------------------------------------
            // Si la clave de acceso ha caducado, el Usuario debera actualizarla
            //-----------------------------------------------------------------------------
            if (is_null($objUsuario->FechaClave)) {
               $objUsuario->FechaClave = new QDateTime(QDateTime::Now);
            }
            // if (DiasTranscurridos(date('Y-m-d'), $objUsuario->FechaClave->__toString("YYYY-MM-DD")) >= 90) {
            //    $_SESSION['ClavVenc'] = 1;
            //    QApplication::Redirect('app/cambiar_clave.php');
            // }

            $this->SetupValoresDeSesion();

            QApplication::Redirect('app/mm.php');
         } else {
            $this->txtClavAcce->Warning = 'Contraseña Errada';
            //--------------------------------------
            // Esto se cuenta como intento fallido 
            //--------------------------------------
            $objUsuario->Intentos += 1;
            $objUsuario->Save();
         }
      } else {
         $this->txtLogiUsua->Warning = 'Usuario Desconocido';
      }
   }

   protected function SetupValoresDeSesion() {
      $strMailSopo = BuscarParametro('CtasMail','MailSopo','Txt1','sopokaizen@gmail.com');
      $objDolaSica = BuscarParametro('TasaCamb','DolaSica','TODO',null);
      $objDolaSima = BuscarParametro('TasaCamb','DolaSima','TODO',null);
      $decPorcAran = BuscarParametro('PorcAran','AranPred','Value1',20);
      $dteFechDhoy = date("Y-m-d");
      $decTasaDola = Impuesto::LoadImpuestoVigente('USD', $dteFechDhoy);
      $decIvaxDhoy = Impuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);

      $_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
      $_SESSION['TasaDola'] = serialize($decTasaDola);
      $_SESSION['DolaSica'] = serialize($objDolaSica);
      $_SESSION['DolaSima'] = serialize($objDolaSima);
      $_SESSION['EmaiSopo'] = serialize($strMailSopo);
      $_SESSION['PorcAran'] = serialize($decPorcAran);
   }
   
}
Mobile::Run('Mobile','mobile.tpl.php');
?>
