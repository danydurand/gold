<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class BorrarGuias extends FormularioBaseKaizen {
    protected $txtNumeGuia;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Borrar Guías';

        $this->txtNumeGuia_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------
    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate('Guias a Borrar');
        $this->txtNumeGuia->Required = true;
        $this->txtNumeGuia->Height = 100;
        $this->txtNumeGuia->Width = 300;
        $this->txtNumeGuia->TextMode = QTextMode::MultiLine;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        t('H1');

        $this->mensaje('');
        $arrNumeGuia = explode(',',nl2br2($this->txtNumeGuia->Text));
        $arrNumeGuia = LimpiarArreglo($arrNumeGuia);
        $this->txtNumeGuia->Text = '';
        $intCantRegi = 0;
        t('H2');

        foreach ($arrNumeGuia as $strNumeGuia) {
            t('H3: '.$strNumeGuia);

            $objGuia = Guias::LoadByNumero($strNumeGuia);
            if ($objGuia) {
                t('H4 Encontre la guia');

                $arrSepuBorr = $objGuia->sePuedeBorrar();
                if ($arrSepuBorr['TodoOkey']) {
                    t('H5 Se puede borrar');
                    $objGuia->Borrar();
                    $intCantRegi++;
                } else {
                    $this->txtNumeGuia->Text .= $strNumeGuia.' '.$arrSepuBorr['TextMens'].chr(13);
                }
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

BorrarGuias::Run('BorrarGuias');
?>