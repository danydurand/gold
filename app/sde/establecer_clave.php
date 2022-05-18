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

class EstablecerClave extends FormularioBaseKaizen {
    protected $txtNuevClav;
    protected $txtConfClav;
    protected $objUsuaProc;
    protected $strLogiUsua = 'desconocido';


    protected function SetupValores() {
        $intCodiUsua = QApplication::PathInfo(0);
        $this->objUsuaProc = Usuario::Load($intCodiUsua);
    }


    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->lblTituForm->Text = 'Establecer Clave';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->txtNuevClav_Create();
        $this->txtConfClav_Create();

        if (!$this->objUsuaProc instanceof Usuario) {
            $this->btnSave->Visible = false;
            $this->danger('El Usuario que desea procesar, no existe !!');
        } else {
            $this->strLogiUsua = $this->objUsuaProc->LogiUsua;
        }

    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------


    protected function txtNuevClav_Create() {
        $this->txtNuevClav = new QTextBox($this);
        $this->txtNuevClav->Name = QApplication::Translate('Nueva Clave');
        $this->txtNuevClav->Width = 200;
        $this->txtNuevClav->MaxLength = 50;
        $this->txtNuevClav->TextMode = QTextMode::Password;
        $this->txtNuevClav->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtNuevClav->Required = true;
    }

    protected function txtConfClav_Create() {
        $this->txtConfClav = new QTextBox($this);
        $this->txtConfClav->Name = QApplication::Translate('Confirmar Nueva Clave');
        $this->txtConfClav->Width = 200;
        $this->txtConfClav->MaxLength = 50;
        $this->txtConfClav->TextMode = QTextMode::Password;
        $this->txtConfClav->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtConfClav->Required = true;
    }

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    protected function btnSave_Click() {
        $this->mensaje();
        if (!strlen($this->objUsuaProc->MailUsua)) {
            $strMensUsua = 'El Usuario debe tener un email, para proceder con el reseteo de la Clave!';
            $this->danger($strMensUsua);
            return;
        }
        if (!comprobar_email($this->objUsuaProc->MailUsua)) {
            $strMensUsua = 'Formato de correo inválido!';
            $this->danger($strMensUsua);
            return;
        }
        $strNuevClav = trim($this->txtNuevClav->Text);
        $strConfClav = trim($this->txtConfClav->Text);
        if ($strNuevClav != $strConfClav) {
            $strMensUsua = 'Las Claves deben coincidir!';
            $this->danger($strMensUsua);
            return;
        }
        list($strTipoMens, $strMensUsua) = $this->objUsuario->resetearClave($strNuevClav);
        if ($strTipoMens == 'success') {
            $strMensUsua .= ' | El Usuario recibirá un correo con las nuevas credenciales';
        }
        $this->$strTipoMens($strMensUsua);
    }

}

EstablecerClave::Run('EstablecerClave');
?>
