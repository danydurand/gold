<?php
//--------------------------------------------------------------------------------
// Programa      : cambio_sucu_rece_guia.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 30/08/2017
// Descripcion   : Este programa permite al usuario autorizado del Sistema,
//                 cambiar una Sucursal o Receptoría Destino de una Guía, siempre
//                 y cuando la misma no haya sido facturada y haya sido creada en
//                 el Expreso Nacional.
//--------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CambioSucuReceGuia extends FormularioBaseKaizen {
    /* @var $objGuiaAjus Guia */
    protected $objGuiaAjus;
    protected $objGuiaOrig;
    protected $objProdGuia;
    protected $objClieTari;
    protected $decPorcIvax;
    protected $decPorcSegu;
    protected $strSucuOrig;
    protected $txtNumeGuia;
    protected $lstSucuDest;
    protected $lstReceDest;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Cambio de Receptoría de Guía';

        $this->txtNumeGuia_Create();
        $this->lstSucuDest_Create();
        $this->lstReceDest_Create();

        $this->btnSave->Visible = false;
        $blnUsuaAuto = BuscarParametro("SucuRece", $this->objUsuario->LogiUsua, "Val1", 0);
        if ($blnUsuaAuto) {
            $this->btnSave->Visible = true;
        }

        if ($_SESSION['GuiaCamb']) {
            $this->txtNumeGuia->Text = $_SESSION['GuiaCamb'];
            $this->txtNumeGuia_Blur();
            unset($_SESSION['GuiaCamb']);
        }
    }

    //---------------------------
    // Aquí se crean los objetos
    //---------------------------

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = 'Nro. de Guía a Procesar';
        $this->txtNumeGuia->Width = 100;
        $this->txtNumeGuia->Required = true;
        $this->txtNumeGuia->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeGuia_Blur'));
        $this->txtNumeGuia->Enabled = false;
        $this->txtNumeGuia->ForeColor = 'blue';
    }

    protected function lstSucuDest_Create() {
        $this->lstSucuDest = new QListBox($this);
        $this->lstSucuDest->Name = 'Sucursal';
        $this->lstSucuDest->Width = 200;
        $this->lstSucuDest->Required = true;
        $this->lstSucuDest->AddAction(new QChangeEvent(), new QAjaxAction('lstSucuDest_Change'));
        $this->lstSucuDest->Enabled = false;
        $this->lstSucuDest->ForeColor = 'blue';
    }

    protected function lstReceDest_Create() {
        $this->lstReceDest = new QListBox($this);
        $this->lstReceDest->Name = 'Receptoría(s)';
        $this->lstReceDest->Width = 200;
        $this->lstReceDest->Required = true;
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function txtNumeGuia_Blur() {
        $this->mensaje();
        if (strlen($this->txtNumeGuia->Text) > 0) {
            $strNumeGuia = $this->txtNumeGuia->Text;
            $this->objGuiaAjus = Guia::Load($strNumeGuia);
            if ($this->objGuiaAjus) {
                $arrSistPmnx = array('cnt','pmn');
                if (in_array($this->objGuiaAjus->SistemaId,$arrSistPmnx)) {
                    if (!$this->objGuiaAjus->EstaFacturada()) {
                        $this->objGuiaOrig = clone $this->objGuiaAjus;
                        $dteFechGuia       = $this->objGuiaAjus->FechGuia->__toString("YYYY-MM-DD");
                        $this->objProdGuia = FacProducto::Load($this->objGuiaAjus->CodiProd);
                        $this->decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA', $dteFechGuia);
                        $this->decPorcSegu = $this->objGuiaAjus->PorcentajeSeguro;
                        $this->cargarDestinos($this->objGuiaAjus->EstaDest);
                    } else {
                        $strMensUsua = "La Guía Nro. <b>$strNumeGuia</b> ya ha sido Facturada!";
                        $this->mensaje($strMensUsua,'','d','i','hand-stop-o');
                    }
                } else {
                    $strMensUsua = "La Guía Nro. <b>$strNumeGuia</b> no pertenece al Expreso Nacional!";
                    $this->mensaje($strMensUsua,'','d','i','hand-stop-o');
                }
            } else {
                $strMensUsua = "La Guía Nro. <b>$strNumeGuia</b> no existe!";
                $this->mensaje($strMensUsua,'','d','i','hand-stop-o');
            }
        }
    }

    protected function lstSucuDest_Change() {
        if (!is_null($this->lstSucuDest->SelectedValue)) {
            $arrCodiSele = explode('|',$this->lstSucuDest->SelectedValue);
            $strCodiEsta = $arrCodiSele[0];
            $intCantRece = $arrCodiSele[1];
            if ($intCantRece > 0 && $this->objGuiaAjus) {
                $this->cargarReceptorias($strCodiEsta,$this->objGuiaAjus->ReceptoriaDestino);
            }
        }
    }

    protected function cargarDestinos($strCodiEsta=null) {
        $this->lstSucuDest->RemoveAllItems();
        $this->lstSucuDest->Width = 200;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
        //-----------------------------------------------------------
        // Se cargan unicamente las Sucursales que tenga receptorias
        //-----------------------------------------------------------
        $arrCodiEsta = Estacion::LoadArrayConCantidadDeReceptorias();
        $intCantDest = count($arrCodiEsta);
        $this->lstSucuDest->AddItem('- Seleccione Uno - ('.$intCantDest.')', null);
        if ($arrCodiEsta) {
            foreach ($arrCodiEsta as $objSucuDest) {
                $blnSeleRegi = false;
                if (strlen($strCodiEsta) > 0) {
                    if (trim($objSucuDest->CodiEsta) == trim($strCodiEsta)) {
                        $blnSeleRegi = true;
                    }
                }
                $strEstaAuxi = trim($objSucuDest->CodiEsta).'|'.$objSucuDest->GetVirtualAttribute('cant_rece');
                $this->lstSucuDest->AddItem($objSucuDest->__toStringConTiempoDeEntrega(), $strEstaAuxi, $blnSeleRegi);
            }
            $this->lstSucuDest_Change();
        }
    }

    protected function cargarReceptorias($strCodiSucu, $strSiglRece=null) {
        $this->lstReceDest->RemoveAllItems();
        $this->lstReceDest->Width = 200;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Counter()->Descripcion);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Counter()->StatusId,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Counter()->SucursalId,$strCodiSucu);
        $arrReceDest = Counter::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantRece = count($arrReceDest);
        if ($intCantRece > 1) {
            $this->lstReceDest->AddItem('- Seleccione Uno - ('.$intCantRece.')', null);
        }
        foreach ($arrReceDest as $objReceDest) {
            $blnSeleRegi = false;
            if (strlen($strSiglRece) > 0 || $intCantRece == 1) {
                if (trim($objReceDest->Siglas) == trim($strSiglRece) || $intCantRece == 1) {
                    $blnSeleRegi = true;
                }
            }
            $this->lstReceDest->AddItem($objReceDest->__toString(), $objReceDest->Siglas, $blnSeleRegi);
        }
    }


    protected function btnSave_Click() {
        $arrSucuSele = explode('|',$this->lstSucuDest->SelectedValue);
        $strSucuDest = $arrSucuSele[0];
        $strReceDest = $this->lstReceDest->SelectedValue;
        if ($strSucuDest == $this->objGuiaAjus->EstaDest) {
            if ($strReceDest == $this->objGuiaAjus->ReceptoriaDestino) {
                $this->mensaje('No hay cambio que realizar !!!','','w','',__iEXCL__);
                return;
            } else {
                // Solo cambio la receptoria, no se requiere calcular la tarifa nuevamente
                $this->objGuiaAjus->ReceptoriaDestino = $strReceDest;
                $this->objGuiaAjus->Save();
                $this->RegistroDeCambios($this->objGuiaOrig,$this->objGuiaAjus);
                $this->mensaje('Transacción Exitosa !','','s','',__iCHEC__);
                return;
            }
        }
        //-----------------------------------------------------------------------------------------
        // Si el cambio ocurre a nivel de la Sucursal Destino, es necesario recalcular la Tarifa
        //-----------------------------------------------------------------------------------------
        $objTarifa = unserialize($_SESSION['TariPmnx']);
        if ($objTarifa) {
            $arrSucuExen = unserialize($_SESSION['SucuExen']);
            //------------------------------------------------------------------------------------
            // Si la Modalida de Pago es PPD y el Origen es una Sucursal exenta de IVA, entonces
            // el porcentaje de IVA se hace cero (0).
            //------------------------------------------------------------------------------------
            if ($this->objGuiaAjus->TipoGuia == TipoGuiaType::PPDPREPAGADA) {
                if (in_array($this->objUsuario->CodiEsta,$arrSucuExen)) {
                    $this->decPorcIvax = 0;
                }
            }
            //-------------------------------------------------------------------
            // Si la Modalida de Pago es COD y el Destino es una Sucursal exenta
            // de IVA, entonces el porcetaje de IVA se hace cero (0).
            //-------------------------------------------------------------------
            if ($this->objGuiaAjus->TipoGuia == TipoGuiaType::CODCOBROENDESTINO) {
                if (in_array($strSucuDest,$arrSucuExen)) {
                    $this->decPorcIvax = 0;
                }
            }
            //-----------------------------------------------------------------------------------------------
            // Si la Sucursal Destino actualizada, difiere de la original, entonces se re-calcula la tarifa
            //-----------------------------------------------------------------------------------------------
            $arrParaTari['dttFechGuia'] = $this->objGuiaAjus->FechGuia->__toString("YYYY-MM-DD");
            $arrParaTari['strCodiOrig'] = $this->objGuiaAjus->EstaOrig;
            $arrParaTari['strCodiDest'] = $strSucuDest;
            $arrParaTari['dblPesoGuia'] = $this->objGuiaAjus->PesoGuia;
            $arrParaTari['dblValoDecl'] = $this->objGuiaAjus->ValorDeclarado;
            $arrParaTari['intChecAseg'] = intval($this->objGuiaAjus->Asegurado);
            $arrParaTari['dblPorcSgro'] = $this->decPorcSegu;
            $arrParaTari['dblPorcDiva'] = $this->decPorcIvax;
            $arrParaTari['strModaPago'] = TipoGuiaType::ToStringCorto($this->objGuiaAjus->TipoGuia);
            $arrParaTari['strEstaUsua'] = $this->objUsuario->CodiEsta;
            $arrParaTari['decSgroClie'] = $this->objGuiaAjus->CodiClieObject->PorcentajeSeguro;
            $arrParaTari['objTariGuia'] = FacTarifa::Load($this->objGuiaAjus->TarifaId);

            $arrValoTari = calcularTarifaParcialPmn($arrParaTari);

            $blnTodoOkey = $arrValoTari['blnTodoOkey'];
            $strMensUsua = $arrValoTari['strMensUsua'];
            $dblMontBase = nfp($arrValoTari['dblMontBase']);
            $dblFranPost = nfp($arrValoTari['dblFranPost']);
            $dblMontDiva = nfp($arrValoTari['dblMontDiva']);
            $dblMontSgro = nfp($arrValoTari['dblMontSgro']);
            $dblMontTota = nfp($arrValoTari['dblMontTota']);

            if ($blnTodoOkey) {
                //----------------------
                // Se actualiza la Guía
                //----------------------
                $this->objGuiaAjus->EstaDest          = $strSucuDest;
                $this->objGuiaAjus->ReceptoriaDestino = $strReceDest;
                $this->objGuiaAjus->PorcentajeIva     = str_replace(",", '', $this->decPorcIvax);
                $this->objGuiaAjus->MontoIva          = str_replace(",", '', $dblMontDiva);
                $this->objGuiaAjus->MontoSeguro       = str_replace(",", '', $dblMontSgro);
                $this->objGuiaAjus->MontoBase         = str_replace(",", '', $dblMontBase);
                $this->objGuiaAjus->MontoFranqueo     = str_replace(",", '', $dblFranPost);
                $this->objGuiaAjus->MontoOtros        = 0;
                $this->objGuiaAjus->MontoTotal        = str_replace(",", '', $dblMontTota);
                //----------------------------------
                // Si existen cambios, se registran
                //----------------------------------
                $this->RegistroDeCambios($this->objGuiaOrig,$this->objGuiaAjus);
                //-------------------
                // Se guarda la Guía
                //-------------------
                $this->objGuiaAjus->Save();
                $this->mensaje('Transacción Exitosa !','','','',__iCHEC__);
            } else {
                $this->mensaje('No hay Tarifa ! '.$strMensUsua.'!','','d','',__iHAND__);
            }
        } else {
            $this->mensaje('Tarifa Nacional No Definida !','','d','',__iHAND__);
        }
    }

    protected function RegistroDeCambios(Guia $objGuiaOrig, Guia $objNuevGuia) {
        $strTextMens = '';
        $strCodiCkpt = 'MG';  // Modifico la Guia
        //------------------
        // Sucursal Destino
        //------------------
        if ($objGuiaOrig->EstaDest != $this->objGuiaAjus->EstaDest) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Sucursal Destino: ".$objGuiaOrig->EstaDest.
                            " --> ".$objNuevGuia->EstaDest;
        }
        //--------------------
        // Receptoria Destino
        //--------------------
        if ($objGuiaOrig->ReceptoriaDestino != $this->objGuiaAjus->ReceptoriaDestino) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Recep. Destino: ".$objGuiaOrig->ReceptoriaDestino.
                            " --> ".$objNuevGuia->ReceptoriaDestino;
        }
        if (strlen($strTextMens) > 0) {
            //----------------------------------------------------------------------------------------
            // En el Registro de Trabajo, debe quedar constancia de los cambios ocurridos a la Guia,
            // igualmente en el Log de Cambios
            //----------------------------------------------------------------------------------------
            $arrParaRegi['CodiCkpt'] = $strCodiCkpt;
            $arrParaRegi['TextMens'] = $strTextMens;
            $arrParaRegi['NumeGuia'] = $objGuiaOrig->NumeGuia;
            $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
            $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
            CrearRegistroDeTrabajo($arrParaRegi);

            $arrLogxCamb['strNombTabl'] = 'Guia';
            $arrLogxCamb['intRefeRegi'] = $this->objGuiaAjus->NumeGuia;
            $arrLogxCamb['strNombRegi'] = $this->objGuiaAjus->NombRemi;
            $arrLogxCamb['strDescCamb'] = $strTextMens;
            LogDeCambios($arrLogxCamb);
        }
    }
}

CambioSucuReceGuia::Run('CambioSucuReceGuia');