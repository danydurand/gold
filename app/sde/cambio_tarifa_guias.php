<?php
//---------------------------------------------------------------------------
// Programa      : cambio_tarifa_guia.php
// Realizad por  : Daniel Durand
// Fecha Elab.   : 17/08/2017
// Descripcion   : Este programa, permite asignar una tarifa a una o varias
//                 guias
//----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CambioTarifaGuias extends FormularioBaseKaizen {
    protected $arrGuiaLote;
    protected $txtNumeSeri;
    protected $lstCodiTari;

    protected function SetupValores() {
        $this->lblTituForm->Text = QApplication::Translate('Cambio de Tarifa de Guias');
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

    	$this->lstCodiTari_Create();
    	$this->txtNumeSeri_Create();

        $this->btnSave->Visible = false;
        $blnRecaTari = BuscarParametro("CambTagu", $this->objUsuario->LogiUsua, "Val1", 0);
        if ($blnRecaTari) {
            $this->btnSave->Visible = true;
        }

        $this->lstCodiTari->SetFocus();
        if ($this->objUsuario->LogiUsua == 'ddurand') {
            $this->mensaje('Parametro(s): CambTagu','n','i','',__iINFO__);
        }
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------
         
    protected function lstCodiTari_Create() {
        $this->lstCodiTari = new QListBox($this);
        $this->lstCodiTari->Name = 'Tarifa a Asignar';
        $this->lstCodiTari->Required = true;
        $this->lstCodiTari->Width = 250;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::FacTarifa()->Id, false);
        $arrTariActi   = FacTarifa::LoadAll($objClauOrde);
        $intCantRegi   = count($arrTariActi);
        $this->lstCodiTari->AddItem('- Seleccione Una - ('.$intCantRegi.')',null);
        foreach ($arrTariActi as $objTariActi) {
            $this->lstCodiTari->AddItem($objTariActi->__toString(),$objTariActi->Id);
        }
    }

    protected function txtNumeSeri_Create() {
    	$this->txtNumeSeri = new QTextBox($this);
    	$this->txtNumeSeri->Name = "Nros de Guías";
    	$this->txtNumeSeri->Required = true;
    	$this->txtNumeSeri->TextMode = QTextMode::MultiLine;
    	$this->txtNumeSeri->Height = 250;
    	$this->txtNumeSeri->Width = 250;
        // $this->txtNumeSeri->AddAction(new QFocusEvent(), new QAjaxAction('txtNumeSeri_Focus'));
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnSave_Click() {
        $arrGuiaProc = explode(',',nl2br2($this->txtNumeSeri->Text));
        $this->txtNumeSeri->Text = '';
        //--------------------------------------------------------
        // Se eliminan la líneas en blanco y registros repetidos
        //--------------------------------------------------------
        $arrGuiaProc = LimpiarArreglo($arrGuiaProc);
        $intCantGuia = count($arrGuiaProc);
        //---------------------------------------------------------------
        // Se procesa una a una las Guías proporcionadas por el Usuario
        //---------------------------------------------------------------
        $intContProc = 0;
        foreach ($arrGuiaProc as $strGuiaProc) {
            $blnTodoOkey = true;
            $objGuiaProc = Guia::Load($strGuiaProc);
            if (!$objGuiaProc) {
                $this->txtNumeSeri->Text .= $strGuiaProc." (No Existe)".chr(13);
                $blnTodoOkey = false;
            }
            if ($blnTodoOkey) {
                $objTariAnte = FacTarifa::Load($objGuiaProc->TarifaId);
                $strTariAnte = '';
                if ($objTariAnte) {
                    $strTariAnte = $objTariAnte->Descripcion;
                }
                $strTariDesp = $this->lstCodiTari->SelectedName;
                //----------------------------------------------------
                // Se actualiza la tarifa y se recalculan los montos
                //----------------------------------------------------
                $objGuiaProc->TarifaId = $this->lstCodiTari->SelectedValue;
                //$objGuiaProc->PorcentajeIva = $this->PorcentajeIVA($objGuiaProc);
                $objGuiaProc->PorcentajeIva = asignarPorcIVA(
                    $objGuiaProc->EstaOrig,
                    $objGuiaProc->EstaDest,
                    TipoGuiaType::ToStringCorto($objGuiaProc->TipoGuia));
                $objGuiaProc->Save();
                $arrCalcTari = CalcularTarifaNacionalDeLaGuia($objGuiaProc);
                $blnTodoOkey = $arrCalcTari['blnTodoOkey'];
                $objGuiaProc = $arrCalcTari['objGuiaCalc'];
                if ($blnTodoOkey) {
                    //------------------------------------------------------------
                    // Se actualiza la guia con su nueva tarifa y nuevo monto
                    //------------------------------------------------------------
                    $objGuiaProc->Save();
                    //---------------------------------------------------------------------
                    // Se deja evidencia del cambio, en el Registro de Trabajo de la guia 
                    //---------------------------------------------------------------------
                    if (strlen($strTariAnte)) {
                        $strTextMens = "Tarifa: ".$strTariAnte." --> ".$strTariDesp;
                    } else {
                        $strTextMens = "Nueva Tarifa: ".$strTariDesp;
                    }
                    $arrParaRegi['CodiCkpt'] = 'MG';
                    $arrParaRegi['TextMens'] = $strTextMens;
                    $arrParaRegi['NumeGuia'] = $objGuiaProc->NumeGuia;
                    $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                    $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
                    CrearRegistroDeTrabajo($arrParaRegi);
                    if ($blnTodoOkey) {
                        //-----------------------------------
                        // Se cuenta la Guía como Procesada 
                        //-----------------------------------
                        $intContProc++;
                    }
                } else {
                    $strMensUsua = substr($arrCalcTari['strMensUsua'],0,28);
                    t('Hubo algun problema: '.$strMensUsua);
                    $this->txtNumeSeri->Text .= $strGuiaProc." (".$strMensUsua.")".chr(13);
                }
            }
        }
        $strMensUsua = sprintf('Guías a Procesar (%s) / Procesadas (%s)',$intCantGuia,$intContProc);
        if ($intCantGuia == $intContProc) {
            $this->mensaje($strMensUsua,'','','',__iCHEC__);
        } else {
            $this->mensaje($strMensUsua,'','w','',__iEXCL__);
        }
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

CambioTarifaGuias::Run('CambioTarifaGuias');
?>