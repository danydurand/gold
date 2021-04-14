<?php
//--------------------------------------------------------------------------
// Programa      : cambiar_peso_masivo.php 
// Realizad por  : Juan Duran
// Fecha Elab.   : 24/03/2017 
// Descripcion   : Este programa, permite modificar el peso de las guias 
//                 en forma masiva 
//--------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CambiarPesoMasivo extends FormularioBaseKaizen {

    protected $objCkptPick;
    protected $arrGuiaLote;
    protected $intLimiPiez;
    protected $arrExceLimi;

    protected $rdbTipoCamb;
    protected $txtNumeSeri;
    protected $txtPesoMasi;

    protected $btnImprEtiq;

    protected function SetupValores() {
        $this->objCkptPick = SdeCheckpoint::Load('PU');
        $this->lblTituForm->Text = QApplication::Translate('Cambiar Peso Masivamente');
        $this->intLimiPiez = BuscarParametro('LimiPiez','ImprEtiq','Val1',20);
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();
        $this->rdbTipoCamb_Create();
    	$this->txtNumeSeri_Create();
    	$this->txtPesoMasi_Create();

        $this->btnSave->Visible = false;
        $blnPesoNook = BuscarParametro("PesoNook", $this->objUsuario->LogiUsua, "Val1", 0);
        if ($blnPesoNook) {
            $this->btnSave->Visible = true;
        }
    	$this->btnImprEtiq_Create();

        if ($this->objUsuario->LogiUsua == 'ddurand') {
            $this->mensaje('Parametro(s) PesoNook','n','i',null,__iINFO__);
        }

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------
         
    protected function rdbTipoCamb_Create() {
        $this->rdbTipoCamb = new QRadioButtonList($this);
        $this->rdbTipoCamb->Name = 'Tipo Cambio';
        $this->rdbTipoCamb->Required = true;
        $this->rdbTipoCamb->AddItem('&nbsp;Un solo peso para Todas','U',true);
        $this->rdbTipoCamb->AddItem('&nbsp;Cada Guía con su Peso','C');
        $this->rdbTipoCamb->HtmlEntities = false;
        $this->rdbTipoCamb->AddAction(new QChangeEvent(), new QAjaxAction('rdbTipoCamb_Change'));
    }

    protected function txtNumeSeri_Create() {
    	$this->txtNumeSeri = new QTextBox($this);
    	$this->txtNumeSeri->Name = "Nros de Guías";
    	$this->txtNumeSeri->Required = true;
    	$this->txtNumeSeri->TextMode = QTextMode::MultiLine;
    	$this->txtNumeSeri->Height = 250;
    	$this->txtNumeSeri->Width = 200;
        $this->txtNumeSeri->AddAction(new QFocusEvent(), new QAjaxAction('txtNumeSeri_Focus'));
    }

    protected function txtPesoMasi_Create() {
        $this->txtPesoMasi = new QFloatTextBox($this);
        $this->txtPesoMasi->Name = 'Nuevo Peso';
        $this->txtPesoMasi->Required = true;
        $this->txtPesoMasi->Width = 200;
    }

    protected function btnImprEtiq_Create() {
        $this->btnImprEtiq = new QButton($this);
        $this->btnImprEtiq->Text = QApplication::Translate('Etiqueta');
        $this->btnImprEtiq->AddAction(new QClickEvent(), new QAjaxAction('btnImprEtiq_Click'));
        $this->btnImprEtiq->Visible = false;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function rdbTipoCamb_Change() {
        if ($this->rdbTipoCamb->SelectedValue == 'U') {
            $this->txtPesoMasi->Visible = true;
            $this->txtNumeSeri->Name = "Nros de Guías";
        } else {
            $this->txtPesoMasi->Visible = false;
            $this->txtNumeSeri->Name = "Nros de Guías<br>(Guía | Peso)";
        }
        $this->lblMensUsua->Text = '';
        $this->btnImprEtiq->Visible = false;
    }

    protected function txtNumeSeri_Focus() {
        $this->lblMensUsua->Text = '';
        $this->btnImprEtiq->Visible = false;
    }

    protected function btnSave_Click() {
        $this->arrGuiaLote = array();
        $this->arrExceLimi = array();
        if ($this->rdbTipoCamb->SelectedValue == 'U') {
            $this->UnSoloPesoParaTodas();
        } else {
            $this->CadaGuiaConSuPeso();
        }
        if (count($this->arrGuiaLote) > 0) {
            $this->btnImprEtiq->Visible = true;
        }
    }

    protected function btnImprEtiq_Click() {
        // $this->txtNumeSeri->Text = '';
        foreach ($this->arrExceLimi as $strNumeGuia) {
            $this->txtNumeSeri->Text .= $strNumeGuia." (+".$this->intLimiPiez." Pzas)".chr(13); 
        }
        $_SESSION['arrGuiaLote'] = serialize($this->arrGuiaLote);
        QApplication::Redirect('etiqueta_pdf.php');
    }

    protected function CadaGuiaConSuPeso() {
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
                if ($objGuia->CodiCkpt == 'OK') {
                   $this->txtNumeSeri->Text .= $strGuiaPeso." (Entregada)".chr(13);
                   $blnTodoOkey = false;
                }
            }
            if ($blnTodoOkey) {
                if (!is_numeric($decNuevPeso)) {
                   $this->txtNumeSeri->Text .= $strGuiaPeso." (Peso Errado)".chr(13);
                   $blnTodoOkey = false;
                }
            }
            if ($blnTodoOkey) {
                if ($objGuia->PesoGuia == $decNuevPeso) {
                   $this->txtNumeSeri->Text .= $strGuiaPeso." (Mismo Peso)".chr(13);
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
                    //----------------------------------------------------------------
                    // Si la cantidad de piezas de la guia no supera el limite 
                    // la guia se guarda en un arreglo que permitira luego generar
                    // las etiquetas en lote, de dichas guias 
                    //----------------------------------------------------------------
                    if ($objGuia->CantPiez <= $this->intLimiPiez) {
                        $this->arrGuiaLote[] = $objGuia->NumeGuia;
                    } else {
                        $this->arrExceLimi[] = $objGuia->NumeGuia;
                    }
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
                    //---------------------------------------------------------
                    // Finalmente, se graba un checkpoint "PU" para cada Guía
                    //---------------------------------------------------------
                    if (!$objGuia->tieneCheckpoint('PU')) {
                        $arrDatoCkpt = array();
                        $arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                        $arrDatoCkpt['UltiCkpt'] = '';
                        $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
                        $arrDatoCkpt['CodiCkpt'] = $this->objCkptPick->CodiCkpt;
                        $arrDatoCkpt['TextCkpt'] = $this->objCkptPick->DescCkpt;
                        $arrDatoCkpt['CodiRuta'] = ''; 
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                        if (!$arrResuGrab['TodoOkey']) {
                            $this->txtNumeSeri->Text .= $strNumeSeri." (No Pick-Up)".chr(13);
                            $blnTodoOkey = false;
                        }
                    } else {
                        if ($objGuia->tieneCheckpoint('TR')) {
                            //----------------------------------------------------------
                            // Se deja evidencia del cambio realizado en la tabla
                            // "guia_modificada" de la cual se genera luego un Reporte
                            // de Pesos Cambiados.
                            //----------------------------------------------------------
                            $objBorrGuia = GuiaModificada::Load($objGuia->NumeGuia);
                            if ($objBorrGuia) {
                                $objBorrGuia->Delete();
                            }
                            $objGuiaModi = new GuiaModificada();
                            $objGuiaModi->GuiaId = $objGuia->NumeGuia;
                            $objGuiaModi->Fecha = new QDateTime(QDateTime::Now);
                            $objGuiaModi->PesoOriginal = $decPesoInic;
                            $objGuiaModi->PesoNuevo = $decNuevPeso;
                            $objGuiaModi->UsuarioId = $this->objUsuario->CodiUsua;
                            $objGuiaModi->CodiEsta = $this->objUsuario->CodiEsta;
                            $objGuiaModi->Save();
                        }
                    }     
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
        $this->mensaje($strMensUsua,'','','check');
    }

    protected function UnSoloPesoParaTodas() {
    	$arrGuiaPeso = explode(',',nl2br2($this->txtNumeSeri->Text));
    	$this->txtNumeSeri->Text = '';
        //---------------------------------------
        // Aquí se eliminan la lineas en blanco
        //---------------------------------------
        $arrGuiaPeso = BorrarLineasEnBlanco($arrGuiaPeso); 
        //-------------------------------------------------
        // Se eliminan los caractéres especiales y letras
        //-------------------------------------------------
        array_walk($arrGuiaPeso,'DejarSoloLosNumeros1');
        //---------------------------------------------------------------------------
        // Con array_unique se eliminan las guias repetidas en caso de que las haya
        //---------------------------------------------------------------------------
        $arrGuiaPeso = array_unique($arrGuiaPeso,SORT_STRING);
        $intCantGuia = count($arrGuiaPeso);
        //---------------------------------------------------------------
        // Se procesa una a una las Guías proporcionadas por el Usuario
        //---------------------------------------------------------------
    	$intContProc = 0;
    	foreach ($arrGuiaPeso as $strNumeSeri) {
    		if (strlen($strNumeSeri)) {
    			$blnTodoOkey = true;
    			$objGuia = Guia::Load($strNumeSeri);
    			if (!$objGuia) {
    				$this->txtNumeSeri->Text .= $strNumeSeri." (No Existe)".chr(13);
    				$blnTodoOkey = false;
    			} 
                if ($blnTodoOkey) {
                    if ($objGuia->CodiCkpt == 'OK') {
                        $this->txtNumeSeri->Text .= $strNumeSeri." (Entregada)".chr(13);
                        $blnTodoOkey = false;
                    }
                }
                if ($blnTodoOkey) {
                    if ($objGuia->PesoGuia == $this->txtPesoMasi->Text) {
                        $this->txtNumeSeri->Text .= $strNumeSeri." (Mismo Peso)".chr(13);
                        $blnTodoOkey = false;
                    }
                }
                if ($blnTodoOkey) {
                    $decPesoInic = $objGuia->PesoGuia;
                    //----------------------------------------------
                    // Se actualiza el peso y se calcula la tarifa
                    //----------------------------------------------
                    $objGuia->PesoGuia = $decNuevPeso = $this->txtPesoMasi->Text;
                    $objGuia->PorcentajeIva = $this->PorcentajeIVA($objGuia);
                    $arrCalcTari = CalcularTarifaNacionalDeLaGuia($objGuia);
                    $blnTodoOkey = $arrCalcTari['blnTodoOkey'];
                    $objGuia     = $arrCalcTari['objGuiaCalc'];
                    if ($blnTodoOkey) {
                        //-----------------------------------------------------------
                        // Se actualiza la guía con el nuevo peso y la nueva tarifa
                        //-----------------------------------------------------------
                        $objGuia->Save();
                        //-----------------------------------------------------------
                        // Si la cantidad de piezas de la Guía no supera el límite,
                        // dicha Guía se guardará en un arreglo que luego generará
                        // las etiquetas en lote para tales Guías.
                        //-----------------------------------------------------------
                        if ($objGuia->CantPiez <= $this->intLimiPiez) {
                            $this->arrGuiaLote[] = $objGuia->NumeGuia;
                        } else {
                            $this->arrExceLimi[] = $objGuia->NumeGuia;
                        }
                        //-----------------------------------------------------
                        // Se deja evidencia del cambio, en el LOG de la Guía
                        //-----------------------------------------------------
                        $strTextMens = "Peso: ".$decPesoInic." --> ".$decNuevPeso;
                        $arrParaRegi['CodiCkpt'] = 'MG';
                        $arrParaRegi['TextMens'] = $strTextMens;
                        $arrParaRegi['NumeGuia'] = $objGuia->NumeGuia;
                        $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                        $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
                        CrearRegistroDeTrabajo($arrParaRegi);
                        //-----------------------------------------
                        // Se deja evidencia del cambio realizado
                        //-----------------------------------------
                        $objBorrGuia = GuiaModificada::Load($objGuia->NumeGuia);
                        if ($objBorrGuia) {
                            $objBorrGuia->Delete();
                        }
                        $objGuiaModi = new GuiaModificada();
                        $objGuiaModi->GuiaId = $objGuia->NumeGuia;
                        $objGuiaModi->Fecha = new QDateTime(QDateTime::Now);
                        $objGuiaModi->PesoOriginal = $decPesoInic;
                        $objGuiaModi->PesoNuevo = $this->txtPesoMasi->Text;
                        $objGuiaModi->UsuarioId = $this->objUsuario->CodiUsua;
                        $objGuiaModi->CodiEsta = $this->objUsuario->CodiEsta;
                        $objGuiaModi->Save();
                        //---------------------------------------------------------
                        // Finalmente, se graba un checkpoint "PU" para cada Guía
                        //---------------------------------------------------------
                        if (!$objGuia->tieneCheckpoint('PU')) {
                            $arrDatoCkpt = array();
                            $arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                            $arrDatoCkpt['UltiCkpt'] = '';
                            $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
                            $arrDatoCkpt['CodiCkpt'] = $this->objCkptPick->CodiCkpt;
                            $arrDatoCkpt['TextCkpt'] = $this->objCkptPick->DescCkpt;
                            $arrDatoCkpt['CodiRuta'] = '';
                            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                            if (!$arrResuGrab['TodoOkey']) {
                                $this->txtNumeSeri->Text .= $strNumeSeri." (No Pick-Up)".chr(13);
                                $blnTodoOkey = false;
                            }
                        } else {
                            if ($objGuia->tieneCheckpoint('TR')) {
                                //-----------------------------------------------------
                                // Se deja evidencia del cambio realizado en la tabla
                                // "guia_modificada" de la cual se genera un reporte
                                // de los Pesos Cambiados.
                                //-----------------------------------------------------
                                $objBorrGuia = GuiaModificada::Load($objGuia->NumeGuia);
                                if ($objBorrGuia) {
                                    $objBorrGuia->Delete();
                                }
                                $objGuiaModi = new GuiaModificada();
                                $objGuiaModi->GuiaId = $objGuia->NumeGuia;
                                $objGuiaModi->Fecha = new QDateTime(QDateTime::Now);
                                $objGuiaModi->PesoOriginal = $decPesoInic;
                                $objGuiaModi->PesoNuevo = $decNuevPeso;
                                $objGuiaModi->UsuarioId = $this->objUsuario->CodiUsua;
                                $objGuiaModi->CodiEsta = $this->objUsuario->CodiEsta;
                                $objGuiaModi->Save();
                            }
                        }
                        if ($blnTodoOkey) {
                            //-----------------------------------
                            // Se cuenta la Guía como Procesada
                            //-----------------------------------
                            $intContProc++;
                        }
        			}
        		}
            }
    	}
    	$strMensUsua = sprintf('Guias a Procesar (%s) / Procesadas (%s)',$intCantGuia,$intContProc);
        $this->mensaje($strMensUsua,'','','check');
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

CambiarPesoMasivo::Run('CambiarPesoMasivo');
?>