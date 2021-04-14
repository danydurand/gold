<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CambiarFechaGuia extends FormularioBaseKaizen {
    protected $calFechGuia;
    protected $txtListNume;
    protected $arrListNume;
    protected $blnModiGuia;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Cambio de Fecha de la Guía');

        $this->calFechGuia_Create();
        $this->txtListNume_Create();

        $this->blnModiGuia = BuscarParametro("CambFech",$this->objUsuario->LogiUsua,"Val1", 0);
        if ($this->blnModiGuia == true) {
            $this->btnSave->Visible = true;
        }else {
            $this->btnSave->Visible = false;
        }
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    // Create and Setup calFechGuia
    protected function calFechGuia_Create() {
        $this->calFechGuia = new QCalendar($this);
        $this->calFechGuia->Name = QApplication::Translate('Que fecha desea colocarle a la(s) Guía(s) ?');
        $this->calFechGuia->Width = 200;
        $this->calFechGuia->Required = true;
    }

    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->Name = QApplication::Translate('Guías (deben ser # de guías nacionales)');
        $this->txtListNume->TextMode = QTextMode::MultiLine;
        $this->txtListNume->Required = true;
        $this->txtListNume->Rows = 12;
        $this->txtListNume->Width = 300;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnSave_Click() {
        $this->arrListNume = null;
        $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
        //-------------------------------------------------------------------------------------
        // Con la funcion DejarSoloLosNumeros1 se eliminan los caracteres espciales y letras
        //-------------------------------------------------------------------------------------
        array_walk($this->arrListNume,'DejarSoloLosNumeros1');
        //---------------------------------------------------------------------------
        // Con array_unique se eliminan las guias repetidas en caso de que las haya
        //---------------------------------------------------------------------------
        $this->arrListNume = array_unique($this->arrListNume);
        $this->txtListNume->Text = '';
        $intContGuia = 0;
        $intContErro = 0;
        foreach ($this->arrListNume as $strGuiaArri) {
            if (strlen($strGuiaArri) > 0) {
                $objGuia = Guia::Load($strGuiaArri);
                if ($objGuia) {
                    $blnTodoOkey = true;
                    $strFechActu = $objGuia->FechGuia->__toString("YYYY-MM-DD");
                    $strFechNuev = $this->calFechGuia->DateTime->__toString("YYYY-MM-DD");
                    if (!$objGuia->tieneCheckpoint("OK") && $objGuia->SistemaId != "int") {
                        //------------------------------------------
                        // Se modifica la nueva fecha para la Guía
                        //------------------------------------------
                        $objGuia->FechGuia = $this->calFechGuia->DateTime;
                        $objGuia->Save();
                        //---------------------------------------------------------------
                        // Se graba la transacción en el registro de trabajo de la Guía
                        //---------------------------------------------------------------
                        $arrParaRegi = array();
                        $arrParaRegi['CodiCkpt'] = 'MG';
                        $arrParaRegi['TextMens'] = 'SE MODIFICO LA FECHA DE LA GUIA ('.$strFechActu."-->".$strFechNuev.')';
                        $arrParaRegi['NumeGuia'] = $objGuia->NumeGuia;
                        $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                        $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
                        CrearRegistroDeTrabajo($arrParaRegi);
                        $intContGuia++;
                    } else {
                        $blnTodoOkey = false;
                        $this->txtListNume->Text .=  $objGuia->NumeGuia." Ha sido entregada o es Internacional".chr(13);
                        $intContErro++;
                    }
                } else {
                    $blnTodoOkey = false;
                    $this->txtListNume->Text .=  $objGuia->NumeGuia." No Existe".chr(13);
                    $intContErro++;
                }
                if ($intContErro > 0) {
                    $this->lblMensUsua->Text = QApplication::Translate("Procesada(s) con Exito: ".$intContGuia." / No Procesadas: ".$intContErro);
                } else {
                    $this->lblMensUsua->Text = QApplication::Translate("Procesada(s) con Exito: ".$intContGuia);
                }
                $this->lblMensUsua->ForeColor = "yellow";
            }
        }
    }
}

CambiarFechaGuia::Run('CambiarFechaGuia');
?>