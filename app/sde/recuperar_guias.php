<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RecuperarGuias extends FormularioBaseKaizen {
    protected $txtNumeGuia;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Recuperar Guías';

        $this->txtNumeGuia_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------
    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate('Guias a Recuperar');
        $this->txtNumeGuia->Required = true;
        $this->txtNumeGuia->Height = 100;
        $this->txtNumeGuia->Width = 300;
        $this->txtNumeGuia->TextMode = QTextMode::MultiLine;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje('');
        $arrNumeGuia = explode(',',nl2br2($this->txtNumeGuia->Text));
        $arrNumeGuia = LimpiarArreglo($arrNumeGuia);
        $this->txtNumeGuia->Text = '';
        $intCantRegi = 0;
        foreach ($arrNumeGuia as $strNumeGuia) {
            $objGuia = Guias::LoadByNumero($strNumeGuia);
            if ($objGuia) {
                $objGuia->Recuperar();
                $intCantRegi++;
            } else {
                $strTextMens = $strNumeGuia." (No Existe)";
                $this->txtNumeGuia->Text .= $strTextMens.chr(13);
            }
        }
        $strTextMens = 'Registros procesados: '.$intCantRegi;
        $this->mensaje($strTextMens,'m','s','',__iCHEC__);
    }

    protected function btnCancel_Click() {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
    }
}

RecuperarGuias::Run('RecuperarGuias');
?>