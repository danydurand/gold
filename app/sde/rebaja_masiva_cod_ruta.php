<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RebajaMasivaCodRuta extends FormularioBaseKaizen {
    protected $lstNumeGuia;
    protected $lstFormPago;  // Forma de Pago

    protected $calFechPago;  // Fecha de Pago
    protected $txtNombPers;  // Persona que Recibio el Pago
    protected $txtNumeDocu;  // Nro del Documento (cheque o deposito)
    protected $txtNumeMani;
    protected $txtTotaCobr;

    protected $strCadeSqlx;
    protected $objDataBase;
    protected $intContRegi;
    protected $dlgMensUsua;
    protected $decTotaCobr;
    protected $arrGuiaCobr;
    protected $arrGuiaErro;
    protected $arrGuiaProc;

    protected $btnRepoErro;
    protected $btnRepoCobr;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('COD de la Ruta');

        $this->dlgMensUsua_Create();

        $this->txtNombPers_Create();
        $this->txtNumeDocu_Create();
        $this->txtNumeMani_Create();
        $this->txtTotaCobr_Create();

        $this->lstFormPago_Create();
        $this->lstNumeGuia_Create();
        $this->calFechPago_Create();

        $this->btnRepoErro_Create();
        $this->btnRepoCobr_Create();

        $this->intContRegi = 0;
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtNombPers_Create() {
        $this->txtNombPers = new QTextBox($this);
        $this->txtNombPers->Name = QApplication::Translate('Persona que Recibió el Pago');
        $this->txtNombPers->Width = 180;
        $this->txtNombPers->MaxLength = 20;
        $this->txtNombPers->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtNombPers->Required = true;
    }

    protected function lstFormPago_Create() {
        $this->lstFormPago = new QListBox($this);
        $this->lstFormPago->Name = QApplication::Translate('Forma de Pago');
        $this->lstFormPago->Width = 180;
        $this->lstFormPago->Required = true;
        $this->lstFormPago->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        foreach (TipoDocumentoType::$NameArray as $intId => $strValue) {
            $this->lstFormPago->AddItem($strValue, $intId);
        }
        $this->lstFormPago->AddAction(new QChangeEvent(), new QAjaxAction('lstFormPago_Change'));
    }

    protected function txtNumeDocu_Create() {
        $this->txtNumeDocu = new QTextBox($this);
        $this->txtNumeDocu->Name = QApplication::Translate('Documento #');
        $this->txtNumeDocu->Width = 180;
        $this->txtNumeDocu->MaxLength = 20;
        $this->txtNumeDocu->Required = true;
        $this->txtNumeDocu->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeDocu_Blur'));
    }

    protected function calFechPago_Create() {
        $this->calFechPago = new QCalendar($this);
        $this->calFechPago->Name = QApplication::Translate('Fecha Pago');
        $this->calFechPago->Width = 100;
        $this->calFechPago->DateTime = new QDateTime(QDateTime::Now);
    }

    protected function txtNumeMani_Create() {
        $this->txtNumeMani = new QTextBox($this);
        $this->txtNumeMani->Name = QApplication::Translate('Hoja de Ruta #');
        $this->txtNumeMani->Width = 180;
        $this->txtNumeMani->Required = true;
        $this->txtNumeMani->MaxLength = 100;
        $this->txtNumeMani->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeMani_Blur'));
    }

    protected function lstNumeGuia_Create() {
        $this->lstNumeGuia = new QListBox($this);
        $this->lstNumeGuia->Name = QApplication::Translate('Números de Guía');
        $this->lstNumeGuia->Required = true;
        $this->lstNumeGuia->SelectionMode = QSelectionMode::Multiple;
        $this->lstNumeGuia->Rows = 10;
        $this->lstNumeGuia->Width = 180;
        $this->lstNumeGuia->AddAction(new QClickEvent(), new QAjaxAction('CalcularTotalACobrar'));
    }

    protected function txtTotaCobr_Create() {
        $this->txtTotaCobr = new QTextBox($this);
        $this->txtTotaCobr->Name = QApplication::Translate('Total a Cobrar');
        $this->txtTotaCobr->MaxLength = 40;
        $this->txtTotaCobr->Width = 180;
        $this->txtTotaCobr->Required = true;
        $this->txtTotaCobr->Enabled = false;
        $this->txtTotaCobr->ForeColor = 'blue';
    }

    protected function dlgMensUsua_Create() {
        $this->dlgMensUsua = new QDialogBox($this);
        $this->dlgMensUsua->Width = '600px';
        $this->dlgMensUsua->Height = '500px';
        $this->dlgMensUsua->Overflow = QOverflow::Auto;
        $this->dlgMensUsua->Padding = '10px';
        $this->dlgMensUsua->FontSize = '24px';
        $this->dlgMensUsua->FontNames = QFontFamily::Georgia;
        $this->dlgMensUsua->BackColor = '#eeffdd';
        $this->dlgMensUsua->Display = false;
        $this->dlgMensUsua->ForeColor = 'blue';
    }

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-cogs fa-lg"></i> Procesar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
    }

    protected function btnRepoErro_Create() {
        $this->btnRepoErro = new QButton($this);
        $this->btnRepoErro->Text = QApplication::Translate('Errores');
        $this->btnRepoErro->AddAction(new QClickEvent(), new QServerAction('btnRepoErro_Click'));
        $this->btnRepoErro->CausesValidation = false;
        $this->btnRepoErro->Visible = false;
    }

    protected function btnRepoCobr_Create() {
        $this->btnRepoCobr = new QButton($this);
        $this->btnRepoCobr->Text = QApplication::Translate('Cobrado');
        $this->btnRepoCobr->AddAction(new QClickEvent(), new QServerAction('btnRepoCobr_Click'));
        $this->btnRepoCobr->CausesValidation = false;
        $this->btnRepoCobr->Visible = false;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function txtNumeMani_Blur() {
        if (strlen($this->txtNumeMani->Text) > 0) {
            $objManifiesto = SdeContenedor::Load($this->txtNumeMani->Text);
            if ($objManifiesto) {
                $arrGuiaMani = $objManifiesto->GetGuiaArray();
                if ($arrGuiaMani) {
                    $this->lstNumeGuia->RemoveAllItems();
                    foreach ($arrGuiaMani as $objGuia) {
                        $strNombDest = substr($objGuia->NombDest,0,15);
                        $strGuiaMani = $objGuia->NumeGuia." | ".$strNombDest." | ".$objGuia->MontoTotal;
                        $strValoMani = $objGuia->NumeGuia."|".$objGuia->MontoTotal;
                        $this->lstNumeGuia->AddItem($strGuiaMani,$strValoMani,true);
                    }
                    $this->mensaje('Números de Guía ('.$this->lstNumeGuia->ItemCount.')','','','');
                    //$this->lstNumeGuia->Name = QApplication::Translate("Nros de Guia (".$this->lstNumeGuia->ItemCount.")");
                    //$this->lstNumeGuia->Width = 350;
                    $this->CalcularTotalACobrar();
                    $this->btnSave->Enabled = true;
                    $this->btnSave->ForeColor = "white";
                } else {
                    $this->btnSave->Enabled = false;
                    $this->btnSave->ForeColor = "grey";
                }
            } else {
                $this->mensaje('No existe ninguna Hoja de Ruta con este número','w','','');
                //$this->txtNumeMani->Warning = QApplication::Translate('No existe ninguna Hoja de Ruta con este numero');
                $this->btnSave->Enabled = false;
                $this->btnSave->ForeColor = "grey";
            }
        }
    }

    protected function CalcularTotalACobrar() {
        //-----------------------------------------------------------
        // En funcion de la seleccion realizada se calcula el monto
        //-----------------------------------------------------------
        $decMontCobr = 0;
        $this->arrGuiaCobr = array();
        foreach ($this->lstNumeGuia->SelectedValues as $strGuiaMont) {
            $arrValoGuia = explode('|',$strGuiaMont);
            $strNumeGuia = $arrValoGuia[0];
            $decMontFlet = $arrValoGuia[1];
            $decMontCobr += $decMontFlet;
            $this->arrGuiaCobr[] = $strNumeGuia;
        }
        $this->txtTotaCobr->Text = $decMontCobr;
        $strNombCobr = "Total a Cobrar de la(s) (".count($this->arrGuiaCobr).") seleccionadas";
        $this->txtTotaCobr->Name = QApplication::Translate($strNombCobr);
    }

    protected function txtNumeDocu_Blur() {
        if (strlen($this->txtNumeDocu->Text) > 0) {
            $this->txtNumeDocu->Text = strtoupper($this->txtNumeDocu->Text);
            //-----------------------------------------------------
            // Se valida la existencia previa del mismo documento
            //-----------------------------------------------------
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::Equal(QQN::CobroCod()->NumeroDocumento,$this->txtNumeDocu->Text);
            $arrPagoAnte   = CobroCod::QueryArray(QQ::AndCondition($objClausula));
            $decAcumMont   = 0;
            $strRelaGuia   = "<center><font size='2'>";
            $strRelaGuia  .= "<table>";
            $strRelaGuia  .= "<th align='center'><font size='2'><i>Guia</i></font></th><th align='right'><font size='2'><i>Monto</i></font></th>";
            foreach ($arrPagoAnte as $objCobroCod) {
                $strRelaGuia .= "<tr>";
                $strRelaGuia .= "<td width='120' align='center'><font size='2'><i>".$objCobroCod->NumeGuia."</i></font></td>";
                $strRelaGuia .= "<td align='right'><font size='2'><i>".nf($objCobroCod->MontoCancelado)."</i></font></td>";
                $strRelaGuia .= "</tr>";
                $decAcumMont += $objCobroCod->MontoCancelado;
            }
            $strRelaGuia .= "<tr>";
            $strRelaGuia .= "<td align='center'><font size='2'><i>Total Cancelado</i></font></td>";
            $strRelaGuia .= "<td align='right'><font size='2'><i>".nf($decAcumMont)."</i></font></td>";
            $strRelaGuia .= "</tr>";
            $strRelaGuia .= "</table>";
            $strRelaGuia .= "</font></center>";
            if ($decAcumMont > 0) {
                $objCobrCodx = $arrPagoAnte[0];

                $this->dlgMensUsua->Text =
                '<i>El Nro de Documento proporcionado, ya esta registrado en la base de datos<br><br>'.
                'Persona que recibio el Pago:'.$objCobroCod->RecibioElPago.'<br>'.
                'Tipo de Documento:'.TipoDocumentoType::ToString($objCobroCod->TipoDocumento).'<br>'.
                'Nro del Documento:'.$objCobroCod->NumeroDocumento.'<br>'.
                'Fecha del Pago:'.$objCobroCod->FechaPago->__toString("DD/MM/YYYY").'<br><br>'.
                'Relacion de Envios Cancelados<br>'.$strRelaGuia."<br><br>".
                '(Haga click fuera del recuadro blanco para ocultar este mensaje)<br/><br>'.
                $this->dlgMensUsua->ShowDialogBox();
            }
        }
    }

    protected function lstFormPago_Change() {
        if ($this->lstFormPago->SelectedName == 'EFECTIVO') {
            $this->txtNumeDocu->Enabled = false;
            $this->txtNumeDocu->Required = false;
            $this->txtNumeDocu->Name = QApplication::Translate('NO REQUIERE NRO DE DOCUMENTO');
        } else {
            $this->txtNumeDocu->Enabled = true;
            $this->txtNumeDocu->Required = true;
            $this->txtNumeDocu->Name = QApplication::Translate('NUMERO DE '.$this->lstFormPago->SelectedName);
            $this->txtNumeDocu->SetFocus();
        }
    }

    protected function btnRepoErro_Click() {
        //-------------------------------------------------------
        // Identifico los logos y el nombre de la Empresa
        //-------------------------------------------------------
        $objParametro = Parametro::Load('88888','logos');
        $strLogoComp = '../'.$objParametro->ParaTxt1;
        $strLogoComp = '';
        $objParametro = Parametro::Load('88888','datfisc');
        $strNombEmpr = $objParametro->ParaTxt1;
        $strDireEmpr = $objParametro->ParaTxt5;
        //--------------------------------------
        // Encabezados y datos para el reporte
        //--------------------------------------
        $arrEncaRepo = array('Nro de Guia','Observacion');
        $arrAnchColu = array(20,80);
        $arrJustColu = array('C','L');
        $strTituRepo = "Guias del ".$this->txtNumeMani->Text." con Error";
        $pdf=new PDF('L','mm','Letter');
        $pdf->setVariables($arrEncaRepo,$arrJustColu,$arrAnchColu,75,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->SetTitle($strTituRepo);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaRepo,$this->arrGuiaErro,$arrAnchColu,$arrJustColu);
        $pdf->Output();
    }

    protected function btnRepoCobr_Click() {
        //-------------------------------------------------------
        // Identifico los logos y el nombre de la Empresa
        //-------------------------------------------------------
        $objParametro = Parametro::Load('88888','logos');
        $strLogoComp = '../'.$objParametro->ParaTxt1;
        $strLogoComp = '';
        $objParametro = Parametro::Load('88888','datfisc');
        $strNombEmpr = $objParametro->ParaTxt1;
        $strDireEmpr = $objParametro->ParaTxt5;
        //--------------------------------------
        // Encabezados y datos para el reporte
        //--------------------------------------
        $this->arrGuiaProc[] = array('','TOTAL COBRADO',$this->decTotaCobr,'','','','','');
        $arrEncaRepo = array('Nro Guia','Destinatario','Mto de la Guia','Mto Cancelado','Fecha Pago','Ckpt','Entregado A','Usuario POD');
        $arrAnchColu = array(20,65,25,25,18,10,45,25);
        $arrJustColu = array('C','L','R','R','C','C','L','C');
        $strTituRepo = "Guias Cobradas de la Hoja de Ruta ".$this->txtNumeMani->Text;
        $pdf=new PDF('L','mm','Letter');
        $pdf->setVariables($arrEncaRepo,$arrJustColu,$arrAnchColu,15,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->SetTitle($strTituRepo);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaRepo,$this->arrGuiaProc,$arrAnchColu,$arrJustColu);
        $pdf->Output();
    }

    protected function btnSave_Click() {
        $this->objDataBase = QApplication::$Database[1];
        $this->objUsuario = unserialize($_SESSION['User']);
        $this->arrGuiaErro = array();
        $this->arrGuiaProc = array();

        $intCantGuia = count($this->arrGuiaCobr);
        //---------------------------------------------------
        // Se determina la existencia de Guías a procesar
        //---------------------------------------------------
        if ($intCantGuia > 0) {
            $intContCobr = 0;
            $intContCkpt = 0;
            $intContErro = 0;
            $blnTodoOkey = true;
            //------------------------------------------------
            // Se Verifica la existencia del Checkpoint "OK"
            //------------------------------------------------
            $objCheckpoint = SdeCheckpoint::Load('OK');
            if (!$objCheckpoint) {
            $this->mensaje('No se ha definido el Checkpoint "OK"','d','','hand-stop-o');
            $blnTodoOkey = false;
            }
            if ($blnTodoOkey) {
                $this->decTotaCobr = 0;
                foreach ($this->arrGuiaCobr as $strNumeGuia) {
                    $objGuia = Guia::Load($strNumeGuia);
                    if ($objGuia) {
                        //-----------------------------------
                        // Se registra el cobro de la Guia
                        //-----------------------------------
                        $objCobroCod = CobroCod::Load($strNumeGuia);
                        if (!$objCobroCod) {
                            $objCobroCod = new CobroCod();
                        }
                        $objCobroCod->NumeGuia = $strNumeGuia;
                        $objCobroCod->MontoCancelado = $objGuia->MontoTotal;
                        $objCobroCod->RecibioElPago = $this->txtNombPers->Text;
                        $objCobroCod->TipoDocumento = $this->lstFormPago->SelectedValue;
                        $objCobroCod->NumeroDocumento = $this->txtNumeDocu->Text;
                        $objCobroCod->FechaPago = $this->calFechPago->DateTime;
                        $objCobroCod->Save();
                        $this->decTotaCobr += $objGuia->MontoTotal;
                        $intContCobr++;
                        //----------------------------------------------
                        // Se verifica que la guia pueda ser procesada
                        //----------------------------------------------
                        $blnTodoOkey = true;
                        $arrSepuProc = $objGuia->SePuedeProcesar();
                        if (!$arrSepuProc['TodoOkey']) {
                            //----------------------------------------------------------
                            // Si la guia no se puede procesar, se graba en un vector
                            //----------------------------------------------------------
                            $this->arrGuiaErro[] = array($strNumeGuia,$arrSepuProc['MensUsua']);
                            $intContErro++;
                            $blnTodoOkey = false;
                        }
                        if ($blnTodoOkey) {
                            $calFechPods = new QDateTime(QDateTime::Now);
                            //-----------------------------------------
                            // Se graba el checkpoint correspondiente
                            //-----------------------------------------
                            $strMensUsua = QApplication::Translate('Entregado en la Ruta');
                            $arrDatoCkpt = array();
                            $arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                            $arrDatoCkpt['TextObse'] = strtoupper($strMensUsua);
                            $arrDatoCkpt['CodiRuta'] = '';
                            $arrResuGrab = GrabarCheckpoint($arrDatoCkpt);
                            if ($arrResuGrab['TodoOkey']) {
                                //-----------------------------------------
                                // Los Datos del POD se graban en la Guía
                                //-----------------------------------------
                                $objGuia->EntregadoA = strtoupper($strMensUsua);
                                //$objGuia->FechaEntrega = $calFechPods;
                                $objGuia->FechaEntrega = $this->calFechPago->DateTime;
                                $objGuia->HoraEntrega = date("H:i");
                                $objGuia->FechaPod = $calFechPods;
                                $objGuia->HoraPod = date("H:i");
                                $objGuia->UsuarioPod = $this->objUsuario->CodiUsua;
                                $objGuia->Save();
                                //-------------------------------------------------
                                // Aquí se llena el vector de datos cuyos valores
                                // serán impresos y que serviran como constancia
                                // de todas las acciones realizadas.
                                //-------------------------------------------------
                                $objUltiCkpt = $objGuia->UltiCkptObj();
                                $this->arrGuiaProc[] = array(
                                   $strNumeGuia,
                                   $objGuia->NombDest,
                                   $objGuia->MontoTotal,
                                   $objCobroCod->MontoCancelado,
                                   $objCobroCod->FechaPago->__toString("DD/MM/YYYY"),
                                   $objUltiCkpt->CodiCkpt,
                                   $objGuia->EntregadoA,
                                   $objGuia->UsuarioPod
                                );
                                $intContCkpt ++;
                            } else {
                                //------------------------------------------------
                                // La guias con error, se graban en un vector
                                //------------------------------------------------
                                $intContErro++;
                                $this->arrGuiaErro[] = array($strNumeGuia,$arrResuGrab['MotiNook']);
                            }
                        }
                    }
                }
            }
            if ($intContCobr > 0) {
                $strMensUsua = sprintf('Cobros Registrados (%s), Guias con OK (%s), Guias con Error (%s)',$intContCobr,$intContCkpt,$intContErro);
                $this->mensaje("$strMensUsua",'','','check');
                $this->btnRepoCobr->Visible = true;
            }
            if ($intContErro > 0) {
                $this->btnRepoErro->Visible = true;
            }
        }
    }
}

RebajaMasivaCodRuta::Run('RebajaMasivaCodRuta');
?>