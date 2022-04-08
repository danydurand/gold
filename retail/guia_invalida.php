<?php
//-------------------------------------------------------------------------------------
// Programa       : guia_invalida.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 12/09/2017
// Proyecto       : newliberty
// Descripcion    : Este programa muestra mensaje al usuario sobre una incosistencia
//                  referente a una guía (Eliminada, inválida, etc.)
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class GuiaInvalida extends FormularioBaseKaizen {
    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Estatus Guía';

        $strStatGuia = $_SESSION['StatGuia'];
        $this->mensaje($strStatGuia,'','d','i','hand-stop-o');
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }
}

GuiaInvalida::Run('GuiaInvalida');
?>