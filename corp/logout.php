<?php
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');

class LogoutForm extends QForm {
   protected $lblTituForm;
   protected $lblMensUsua;
   protected $lblNotiUsua;
   protected $btnLogout;
   protected $btnMenu;

   protected function Form_Create() {
     
      $this->lblTituForm_Create();
      $this->lblMensUsua_Create();
      $this->lblNotiUsua_Create();

      $this->btnLogout_Create();
      $this->btnMenu_Create();

   }

   //------------------------------
   // Aqui se crean los objetos 
   //------------------------------

   protected function lblTituForm_Create() {
      $this->lblTituForm = new QLabel($this);
      $this->lblTituForm->Text = 'Salir del Sistema';
   }

   protected function lblMensUsua_Create() {
      $this->lblMensUsua = new QLabel($this);
   }

   protected function lblNotiUsua_Create() {
      $this->lblNotiUsua = new QLabel($this);
   }

   protected function btnLogout_Create() {
      $this->btnLogout = new QButton($this);
      $this->btnLogout->Text = QApplication::Translate('Si, deseo SALIR de la Aplicacion &nbsp;&nbsp;<i class="fa fa-paper-plane"></i>');
      $this->btnLogout->CssClass = 'btn btn-lg btn-success';
      $this->btnLogout->HtmlEntities = false;
      $this->btnLogout->AddAction(new QClickEvent(), new QServerAction('btnLogout_Click'));
      $this->btnLogout->PrimaryButton = true;      
   }

   protected function btnMenu_Create() {
      $this->btnMenu = new QButton($this);
      $this->btnMenu->Text = QApplication::Translate('No, deseo continuar en la Aplicacion &nbsp;&nbsp;<i class="fa fa-child fa-lg"></i>');
      $this->btnMenu->CssClass = 'btn btn-lg btn-warning';
      $this->btnMenu->HtmlEntities = false;
      $this->btnMenu->AddAction(new QClickEvent(), new QServerAction('btnMenu_Click'));      
   }

   //-----------------------------------
   // Acciones relativas a los objetos
   //-----------------------------------
   
   protected function btnLogout_Click($strFormId, $strControlId, $strParameter) {
     if (isset($_SESSION['User'])) {
         unset($_SESSION['User']);
         session_destroy();
     }
     QApplication::Redirect('index.php');
   }

   protected function btnMenu_Click($strFormId, $strControlId, $strParameter) {
     QApplication::Redirect('mg.php?m=main');
   }

}
LogoutForm::Run('LogoutForm', 'logout.tpl.php');
?>