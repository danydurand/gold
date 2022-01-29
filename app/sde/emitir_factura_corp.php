<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class EmitirFacturaCorp extends FormularioBaseKaizen {

    protected $chkSeleClie;
    protected $lstCodiClie;
    protected $calFechInic;
    protected $calFechFina;
    protected $chkSeleConc;
    protected $lstConcFact;
    protected $dtgNotaFact;
    protected $arrNotaEntr = [];
    protected $colNotaSele;


    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Emitir Factura Corp');

        $this->chkSeleClie_Create();
        $this->lstCodiClie_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->chkSeleConc_Create();
        $this->lstConcFact_Create();
        $this->dtgNotaFact_Create();

        $this->lstCodiClie = disableControl($this->lstCodiClie);
        $this->lstConcFact = disableControl($this->lstConcFact);
        $this->btnSave->Text = TextoIcono('cogs','Emitir Facturas');

        $this->cargarClientes();
        $this->cargarConceptos();

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function dtgNotaFact_Create() {
        $this->dtgNotaFact = new QDataGrid($this);
        $this->dtgNotaFact->FontSize = 12;
        $this->dtgNotaFact->ShowFilter = false;

        $this->dtgNotaFact->CssClass = 'datagrid';
        $this->dtgNotaFact->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgNotaFact->UseAjax = true;

        $this->dtgNotaFact->SetDataBinder('dtgNotaFact_Bind');

        $this->colNotaSele = new QCheckBoxColumn('', $this->dtgNotaFact);
        $this->colNotaSele->PrimaryKey = 'Id';
        $this->dtgNotaFact->AddColumn($this->colNotaSele);

        $this->dtgNotaFactColumns();
    }

    protected function dtgNotaFact_Bind() {
        $this->dtgNotaFact->DataSource = $this->arrNotaEntr;
    }

    protected function dtgNotaFactColumns() {
        $colNombClie = new QDataGridColumn($this);
        $colNombClie->Name = QApplication::Translate('Cliente');
        $colNombClie->Html = '<?= $_ITEM->ClienteCorp->NombClie ?>';
        $colNombClie->Width = 200;
        $this->dtgNotaFact->AddColumn($colNombClie);

        $colNumeRefe = new QDataGridColumn($this);
        $colNumeRefe->Name = QApplication::Translate('Referencia');
        $colNumeRefe->Html = '<?= $_ITEM->Referencia ?>';
        $colNumeRefe->Width = 200;
        $this->dtgNotaFact->AddColumn($colNumeRefe);

        $colFechNota = new QDataGridColumn($this);
        $colFechNota->Name = QApplication::Translate('Fecha');
        $colFechNota->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>';
        $colFechNota->Width = 80;
        $this->dtgNotaFact->AddColumn($colFechNota);

        $colEstaNota = new QDataGridColumn($this);
        $colEstaNota->Name = QApplication::Translate('Estatus');
        $colEstaNota->Html = '<?= $_ITEM->Estatus ?>';
        $colEstaNota->Width = 75;
        $this->dtgNotaFact->AddColumn($colEstaNota);

        $colServImpo = new QDataGridColumn($this);
        $colServImpo->Name = QApplication::Translate('S.Imp.');
        $colServImpo->Html = '<?= $_ITEM->ServicioImportacion ?>';
        $colServImpo->Width = 55;
        $this->dtgNotaFact->AddColumn($colServImpo);

        $colPiezCarg = new QDataGridColumn($this);
        $colPiezCarg->Name = QApplication::Translate('Crgds');
        $colPiezCarg->Html = '<?= $_ITEM->Cargadas ?>';
        $colPiezCarg->Width = 55;
        $this->dtgNotaFact->AddColumn($colPiezCarg);

        $colPiezReci = new QDataGridColumn($this);
        $colPiezReci->Name = QApplication::Translate('Recib.');
        $colPiezReci->Html = '<?= $_ITEM->Recibidas ?>';
        $colPiezReci->Width = 55;
        $this->dtgNotaFact->AddColumn($colPiezReci);

    }

    protected function chkSeleClie_Create() {
        $this->chkSeleClie = new QCheckBox($this);
        $this->chkSeleClie->Name = 'Selecc Cliente(s) ?';
        $this->chkSeleClie->Checked = false;
        $this->chkSeleClie->AddAction(new QChangeEvent(), new QAjaxAction('chkSeleClie_Change'));
    }

    protected function lstCodiClie_Create() {
        $this->lstCodiClie = new QListBox($this);
        $this->lstCodiClie->Name = QApplication::Translate('Clientes(s) Facturable(s)');
        $this->lstCodiClie->Width = 200;
        $this->lstCodiClie->SelectionMode = QSelectionMode::Multiple;
        $this->lstCodiClie->Rows = 5;
    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Name = 'Fecha Manif. Inicial';
        $this->calFechInic->Width = 100;
        $this->calFechInic->AddAction(new QChangeEvent(), new QAjaxAction('cargarClientes'));
    }

    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Name = 'Fecha Manif. Final';
        $this->calFechFina->Width = 100;
        $this->calFechFina->AddAction(new QChangeEvent(), new QAjaxAction('cargarClientes'));
    }

    protected function chkSeleConc_Create() {
        $this->chkSeleConc = new QCheckBox($this);
        $this->chkSeleConc->Name = 'Selecc Concepto(s) ?';
        $this->chkSeleConc->Checked = false;
        $this->chkSeleConc->AddAction(new QChangeEvent(), new QAjaxAction('chkSeleConc_Change'));
    }

    protected function lstConcFact_Create() {
        $this->lstConcFact = new QListBox($this);
        $this->lstConcFact->Name = QApplication::Translate('Conceptos Facturables');
        $this->lstConcFact->Width = 200;
        $this->lstConcFact->SelectionMode = QSelectionMode::Multiple;
        $this->lstConcFact->Rows = 5;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function cargarConceptos() {
        $this->lstConcFact->RemoveAllItems();
        $arrConcActi = Conceptos::conceptosActivos('IMP');
        foreach ($arrConcActi as $objConcActi) {
            $this->lstConcFact->AddItem($objConcActi->__toString(),$objConcActi->Id,true);
        }
    }

    protected function cargarClientes() {
        $this->lstCodiClie->RemoveAllItems();
        $arrClieFact   = [];
        $objClauWher   = QQ::Clause();
        if (!is_null($this->calFechInic->DateTime)) {
            t('Fecha Inicial');
            $objClauWher[] = QQ::GreaterOrEqual(QQN::NotaEntrega()->Fecha,$this->calFechInic->DateTime->__toString("YYYY-MM-DD"));
        }
        if (!is_null($this->calFechFina->DateTime)) {
            t('Fecha Final');
            $objClauWher[] = QQ::LessOrEqual(QQN::NotaEntrega()->Fecha,$this->calFechFina->DateTime->__toString("YYYY-MM-DD"));
        }
        $this->arrNotaEntr = NotaEntrega::AptasParaFacturar($objClauWher,'array');
        foreach ($this->arrNotaEntr as $objNotaEntr) {
            if (!in_array($objNotaEntr->ClienteCorpId,$arrClieFact)) {
                $arrClieFact[$objNotaEntr->ClienteCorpId] = $objNotaEntr->ClienteCorp->NombClie;
            }
        }
        foreach ($arrClieFact as $key => $value) {
            $this->lstCodiClie->AddItem($value,$key,true);
        }
        $this->dtgNotaFact->Refresh();
        $this->mensaje();
    }

    protected function chkSeleClie_Change() {
        if ($this->chkSeleClie->Checked) {
            $this->lstCodiClie = enableControl($this->lstCodiClie);
            $strTextMens = 'Presione <b>CTRL</b> mientras hace <b>CLICK</b> en los Clientes que desea facturar !!!';
            $this->info($strTextMens);
        } else {
            $this->lstCodiClie = disableControl($this->lstCodiClie);
            $this->mensaje();
        }
    }

    protected function chkSeleConc_Change() {
        if ($this->chkSeleConc->Checked) {
            $this->lstConcFact = enableControl($this->lstConcFact);
            $strTextMens = 'Presione <b>CTRL</b> mientras hace <b>CLICK</b> en los Conceptos que desea facturar !!!';
            $this->info($strTextMens);
        } else {
            $this->lstConcFact = disableControl($this->lstConcFact);
            $this->mensaje();
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        t('*********************************');
        t('Comenzando la Emision de Facturas');
        /* @var $objManiClie NotaEntrega */
        /* @var $objClieSele MasterCliente */
        //----------------------
        // Clientes a Facturar
        //----------------------
        $arrClieIdxx   = $this->lstCodiClie->SelectedValues;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::MasterCliente()->CodiClie,$arrClieIdxx);
        $arrClieSele   = MasterCliente::QueryArray(QQ::AndCondition($objClauWher));
        t('Cantidad de Clientes a procesar: '.count($arrClieSele));
        //------------------------------------------------
        // Conceptos que seran facturados a los Clientes
        //------------------------------------------------
        $arrConcIdxx   = $this->lstConcFact->SelectedValues;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Conceptos()->Id,$arrConcIdxx);
        $arrConcFact   = Conceptos::QueryArray(QQ::AndCondition($objClauWher));
        t('Cantidad de Conceptos a facturar: '.count($arrConcIdxx));
        //----------------------------------------------------------------------------------------
        // El vector arrNotaEntr contiene los Manifiestos de los Clientes, aptos para facturar
        // que adicionalmente coinciden con el rango de fechas especificado por el Usuario
        //----------------------------------------------------------------------------------------
        t('Cantidad de Manifiestos aptos para facturar es: '.count($this->arrNotaEntr));
        $arrIdxxSele = $this->colNotaSele->GetChangedIds();
        $arrManiIdxx = [];
        foreach ($this->arrNotaEntr as $objManiFact) {
            if (in_array($objManiFact->Id, array_keys($arrIdxxSele))) {
                //----------------------------------------------------------------------------------------
                // Estos Ids de Manifiestos se utilizan luego para filtrar los registros de cada Cliente
                // El Cliente pudiera tener más manifiestos facturables, pero solo deben facturase los
                // que aparezcan en este vector.
                //----------------------------------------------------------------------------------------
                $arrManiIdxx[] = $objManiFact->Id;
            }
        }

        $intCantMani = 0;
        $intCantFact = 0;
        $arrServImpo = ['AER','MAR'];

        t('Emitiendo Facturas...');
        foreach ($arrClieSele as $objClieSele) {
            t('Creando factura para el Cliente: '.$objClieSele->NombClie);
            foreach ($arrServImpo as $strServImpo) {
                $intManiServ = NotaEntrega::AptasParaFacturarPorClienteYServicio($objClieSele->CodiClie,$strServImpo,$arrManiIdxx);
                t('Manifiestos aptos para facturar del Servicio '.$strServImpo.': '.$intManiServ);
                if ($intManiServ > 0) {
                    $blnTodoOkey = true;
                    try {
                        $objFactClie = new Facturas();
                        $objFactClie->ClienteCorpId    = $objClieSele->CodiClie;
                        $objFactClie->Fecha            = new QDateTime(QDateTime::Now());
                        $objFactClie->Referencia       = Facturas::proxReferencia();
                        $objFactClie->CedulaRif        = $objClieSele->NumeDrif;
                        $objFactClie->RazonSocial      = $objClieSele->NombClie;
                        $objFactClie->DireccionFiscal  = $objClieSele->DireFisc;
                        $objFactClie->Telefono         = $objClieSele->TeleCona;
                        $objFactClie->SucursalId       = $this->objUsuario->SucursalId;
                        $objFactClie->Estatus          = 'CREADA';
                        $objFactClie->EstatusPago      = 'PENDIENTE';
                        $objFactClie->Tasa             = 1;
                        $objFactClie->Total            = 0;
                        $objFactClie->MontoDscto       = 0;
                        $objFactClie->MontoCobrado     = 0;
                        $objFactClie->MontoPendiente   = 0;
                        $objFactClie->CreatedAt        = new QDateTime(QDateTime::Now());
                        $objFactClie->CreatedBy        = $this->objUsuario->CodiUsua;
                        $objFactClie->Save();
                        t('Se creo la Factura Id: '.$objFactClie->Id);
                    } catch (Exception $e) {
                        $blnTodoOkey = false;
                        $strTextErro = 'Error creando la factura: '.$e->getMessage();
                        t($strTextErro);
                        throw new Exception($strTextErro);
                    }
                    if ($blnTodoOkey) {
                        //---------------------------------------------------------
                        // Se seleccionan y procesan los manifiestos del Cliente
                        //---------------------------------------------------------
                        t('Seleccionando los Manifiestos del Cliente');
                        $objDatabase = Facturas::GetDatabase();
                        $arrManiClie = NotaEntrega::AptasParaFacturarPorClienteYServicio($objClieSele->CodiClie,$strServImpo,$arrManiIdxx,'array');
                        $decSumaNota = 0;
                        $intCantMani = 0;
                        foreach ($arrManiClie as $objManiClie) {
                            $objDatabase->TransactionBegin();

                            $objManiClie->calcularTodoLosConceptos($arrConcFact);
                            $intCantMani ++;

                            t('Asociando el Manifiesto: '.$objManiClie->Id.' con la Factura');
                            $objNotaFact = new FacturaNotas();
                            $objNotaFact->FacturaId     = $objFactClie->Id;
                            $objNotaFact->NotaEntregaId = $objManiClie->Id;
                            $objNotaFact->Total         = $objManiClie->Total;
                            $objNotaFact->Save();
                            t('Manifiesto asociado');
                            $decSumaNota += $objNotaFact->Total;
                            t('El monto total de la factura va por: '.$decSumaNota);
                            $objManiClie->asociandoNotaConFactura($objFactClie->Id);
                            //----------------------------------------------------------------------
                            // Los conceptos del Manifiesto, se transforman en Items de la Factura
                            //----------------------------------------------------------------------
                            t('Transformando conceptos del Manifiesto en items de la factura');
                            $arrNotaConc = NotaConceptos::LoadArrayByNotaEntregaId($objManiClie->Id);
                            foreach($arrNotaConc as $objNotaConc) {
                                t('Procesando el concepto: ' . $objNotaConc->Concepto->Nombre);
                                //------------------------------------------------------------------
                                // Si el concepto existe, se actualiza, en caso contrario, se crea
                                //------------------------------------------------------------------
                                $facturaItem = FacturaItems::LoadByFacturaIdConceptoId($objFactClie->Id,$objNotaConc->ConceptoId);
                                if ($facturaItem) {
                                    t('Ya existia, voy a sumar el monto');
                                    $facturaItem->Monto += $objNotaConc->Monto;
                                } else {
                                    t('No existia, voy a crearlo');
                                    try {
                                        $item = new FacturaItems();
                                        $item->FacturaId   = $objFactClie->Id;
                                        $item->ConceptoId  = $objNotaConc->ConceptoId;
                                        $item->MostrarComo = $objNotaConc->Concepto->MostrarComo;
                                        $item->Monto       = $objNotaConc->Monto;
                                        $item->CreatedAt   = new QDateTime(QDateTime::Now());
                                        $item->Save();
                                    } catch (Exception $e) {
                                        t('Error creando item de la factura: '.$e->getMessage());
                                    }
                                }
                            }
                            t("Se procesaron los conceptos del Manifiesto\n");
                            $objDatabase->TransactionCommit();
                        }
                        //-----------------------------------------------------------------------------------------
                        // Se actualiza el total de la factura con la sumatoria de los totales de sus manifiestos
                        //-----------------------------------------------------------------------------------------
                        $objFactClie->Total          = round($decSumaNota,2);
                        $objFactClie->MontoPendiente = round($decSumaNota,2);
                        $objFactClie->UpdatedAt      = new QDateTime(QDateTime::Now());
                        $objFactClie->UpdatedBy      = $this->objUsuario->CodiUsua;
                        $objFactClie->Save();
                        $intCantFact++;
                        t('Se actualizo el total de la factura con: '.$decSumaNota."\n");
                    }
                }
            }
        }
        $this->cargarClientes();
        $strTextMens = 'Facturacion Exitosa. Manifiestos procesados: '.$intCantMani.' | Facturas emitidas: '.$intCantFact;
        $this->success($strTextMens);
    }
}

EmitirFacturaCorp::Run('EmitirFacturaCorp');
?>