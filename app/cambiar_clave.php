<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CambiarClave extends FormularioBaseKaizen {

    protected $txtClavActu;
    protected $txtClavNue1;
    protected $txtClavNue2;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Cambiar Clave';

        $this->txtClavActu_Create();
        $this->txtClavNue1_Create();
        $this->txtClavNue2_Create();      
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtClavActu_Create() {
        $this->txtClavActu = new QTextBox($this);
        $this->txtClavActu->Name = 'Clave Actual';
        $this->txtClavActu->TextMode = QTextMode::Password;
        $this->txtClavActu->Required = true;
        $this->txtClavActu->Width = 100;
    }
    
    protected function txtClavNue1_Create() {
        $this->txtClavNue1 = new QTextBox($this);
        $this->txtClavNue1->Name = 'Nueva Clave';
        $this->txtClavNue1->TextMode = QTextMode::Password;
        $this->txtClavNue1->Required = true;
        $this->txtClavNue1->Width = 100;
    }
    
    protected function txtClavNue2_Create() {
        $this->txtClavNue2 = new QTextBox($this);
        $this->txtClavNue2->Name = 'Repita la Nueva Clave';
        $this->txtClavNue2->TextMode = QTextMode::Password;
        $this->txtClavNue2->Required = true;
        $this->txtClavNue2->Width = 100;
    }
        
    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function Form_Validate() {
        $blnTodoOkey = true;
        $strMensUsua = '';
        if ($this->objUsuario->PassUsua != md5($this->txtClavActu->Text)) {
            $strMensUsua = 'La Clave Actual No Coincide!';
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            if ($this->txtClavNue1->Text != $this->txtClavNue2->Text) {
                $strMensUsua = 'La Clave Nueva No Coincide!';
                $blnTodoOkey = false;
            }
        }
        $this->mensaje($strMensUsua,'m','d','','hand-stop-o');
        return $blnTodoOkey;
    }

    protected function btnSave_Click() {
        list($strTipoMens, $strMensUsua) = $this->objUsuario->resetearClave(trim($this->txtClavNue1->Text));
        $this->$strTipoMens($strMensUsua);
    }
    
    protected function btnCancel_Click() {
        QApplication::Redirect('mg.php?m=main');
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// aliado_edit.tpl.php as the included HTML template file
CambiarClave::Run('CambiarClave');
?>