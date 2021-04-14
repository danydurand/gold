<?php
//---------------------------------------------------------------------------
// Programa      : recalculo_masivo.php
// Realizad por  : Daniel Durand
// Fecha Elab.   : 10/08/2017
// Descripcion   : Este programa, permite modificar el peso de guias, que ya
//                 fueron entregadas, en forma masiva
//----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RecalculoMasivo extends FormularioBaseKaizen {
    protected $arrGuiaLote;
    protected $txtNumeSeri;

    protected function SetupValores() {
        $this->lblTituForm->Text = QApplication::Translate('Recalculo Masivo de Tarifa');
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();
    	$this->txtNumeSeri_Create();

        $this->btnSave->Visible = false;
        $blnRecaTari = BuscarParametro("RecaTari", $this->objUsuario->LogiUsua, "Val1", 0);
        if ($blnRecaTari) {
            $this->btnSave->Visible = true;
        }
        $strMensUsua = 'Coloque numeros de guias y pesos separados con un pipe ("|"). Cada guia con su peso en lineas diferentes';
        $this->mensaje($strMensUsua,'m','i','l',__iINFO__);

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------
         
    protected function txtNumeSeri_Create() {
    	$this->txtNumeSeri = new QTextBox($this);
    	$this->txtNumeSeri->Name = "Nros de Guías";
    	$this->txtNumeSeri->Required = true;
    	$this->txtNumeSeri->TextMode = QTextMode::MultiLine;
    	$this->txtNumeSeri->Height = 250;
    	$this->txtNumeSeri->Width = 200;
        $this->txtNumeSeri->AddAction(new QFocusEvent(), new QAjaxAction('txtNumeSeri_Focus'));
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function txtNumeSeri_Focus() {
        // $this->lblMensUsua->Text = '';
    }

    protected function btnSave_Click() {
        $this->arrGuiaLote = array();
        $this->RecalcularTarifaMasivamente();
    }

    protected function RecalcularTarifaMasivamente() {
        $arrGuiaPeso = explode(',',nl2br2($this->txtNumeSeri->Text));
        $this->txtNumeSeri->Text = '';
        //---------------------------------------
        // Aquí se eliminan la líneas en blanco
        //---------------------------------------
        $arrGuiaPeso = BorrarLineasEnBlanco($arrGuiaPeso);
        //---------------------------------------------------------------------------
        // Con array_unique se eliminan las guías repetidas en caso de que las haya
        //---------------------------------------------------------------------------
        $arrGuiaPeso = array_unique($arrGuiaPeso,SORT_STRING);
        $intCantGuia = count($arrGuiaPeso);
        //---------------------------------------------------------------
        // Se procesa una a una las Guías proporcionadas por el Usuario
        //---------------------------------------------------------------
        $intContProc = 0;
        foreach ($arrGuiaPeso as $strGuiaPeso) {
            $arrValoGuia = explode('|',$strGuiaPeso);
            $strNumeSeri = $arrValoGuia[0];
            $decNuevPeso = $arrValoGuia[1];
            $blnTodoOkey = true;
            $objGuia = Guia::Load($strNumeSeri);
            if (!$objGuia) {
                $this->txtNumeSeri->Text .= $strGuiaPeso." (No Existe)".chr(13);
                $blnTodoOkey = false;
            }
            if ($blnTodoOkey) {
                if (!is_numeric($decNuevPeso)) {
                   $this->txtNumeSeri->Text .= $strGuiaPeso." (Peso Errado)".chr(13);
                   $blnTodoOkey = false;
                }
            }
            if ($blnTodoOkey) {
                $decPesoInic = $objGuia->PesoGuia;
                //----------------------------------------------
                // Se actualiza el peso y se calcula la tarifa
                //----------------------------------------------
                $objGuia->PesoGuia = $decNuevPeso;
                $objGuia->PorcentajeIva = $this->PorcentajeIVA($objGuia);
                $arrCalcTari = CalcularTarifaNacionalDeLaGuia($objGuia);
                $blnTodoOkey = $arrCalcTari['blnTodoOkey'];
                $objGuia     = $arrCalcTari['objGuiaCalc'];
                if ($blnTodoOkey) {
                    //------------------------------------------------------------
                    // Se actualiza la guia con el nuevo peso y la nueva tarifa 
                    //------------------------------------------------------------
                    $objGuia->Save();
                    //---------------------------------------------------------------------
                    // Se deja evidencia del cambio, en el Registro de Trabajo de la guia 
                    //---------------------------------------------------------------------
                    $strTextMens = "Peso: ".$decPesoInic." --> ".$decNuevPeso;
                    $arrParaRegi['CodiCkpt'] = 'MG';
                    $arrParaRegi['TextMens'] = $strTextMens;
                    $arrParaRegi['NumeGuia'] = $objGuia->NumeGuia;
                    $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                    $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
                    CrearRegistroDeTrabajo($arrParaRegi);
                    if ($blnTodoOkey) {
                        //-----------------------------------
                        // Se cuenta la Guía como Procesada 
                        //-----------------------------------
                        $intContProc++;
                    }
                }
            }
        }
        $strMensUsua = sprintf('Guías a Procesar (%s) / Procesadas (%s)',$intCantGuia,$intContProc);
        $this->mensaje($strMensUsua,'','','',__iCHEC__);
    }


    protected function PorcentajeIVA($objGuia) {
        $decPorcIvax = 12;
        $strCodiOrig = $objGuia->EstaOrig;
        $strCodiDest = $objGuia->EstaDest;
        $arrSucuExen = unserialize($_SESSION['SucuExen']);
        $intModoPago = $objGuia->TipoGuia;
        if ($intModoPago == 1 || $intModoPago == 2) {
            if (in_array($strCodiOrig,$arrSucuExen)) {
                $decPorcIvax = 0;
            }
        }
        if ($intModoPago == 3) {
            if (in_array($strCodiDest,$arrSucuExen)) {
                $decPorcIvax = 0;
            }
        }
        return $decPorcIvax;
    }
}

RecalculoMasivo::Run('RecalculoMasivo');
?>