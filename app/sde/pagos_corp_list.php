<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/PagosCorpListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the PagosCorp class.  It uses the code-generated
 * PagosCorpDataGrid control which has meta-methods to help with
 * easily creating/defining PagosCorp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both pagos_corp_list.php AND
 * pagos_corp_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class PagosCorpListForm extends PagosCorpListFormBase {
	protected $colPagoSele;
	protected $btnConcPago;
	protected $btnIncoPago;
	protected $btnPagoPend;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

		$this->lblTituForm->Text = 'Pagos Corp';

		// Instantiate the Meta DataGrid
		$this->dtgPagosCorps = new PagosCorpDataGrid($this);
		$this->dtgPagosCorps->FontSize = 12;
		$this->dtgPagosCorps->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgPagosCorps->CssClass = 'datagrid';
		$this->dtgPagosCorps->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgPagosCorps->Paginator = new QPaginator($this->dtgPagosCorps);
		$this->dtgPagosCorps->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::PagosCorp()->Id,false);
        $this->dtgPagosCorps->AdditionalClauses = $objClauOrde;

        // Higlight the datagrid rows when mousing over them
		$this->dtgPagosCorps->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgPagosCorps->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgPagosCorps->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgPagosCorps->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgPagosCorpsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for pagos_corp's properties, or you
		// can traverse down QQN::pagos_corp() to display fields that are down the hierarchy)

        $this->colPagoSele = new QCheckBoxColumn('', $this->dtgPagosCorps);
        $this->colPagoSele->PrimaryKey = 'Id';
        $this->colPagoSele->Width = 10;
        //$this->colPagoSele->SetCheckboxCallback($this, 'dtgPagosCorps_Selected');
        $this->dtgPagosCorps->AddColumn($this->colPagoSele);

        $colIdxxPago = $this->dtgPagosCorps->MetaAddColumn('Id');
        $colIdxxPago->Width = 8;
        $colIdxxPago->FilterBoxSize = 3;

		$colCliePago = $this->dtgPagosCorps->MetaAddColumn(QQN::PagosCorp()->ClienteCorp->NombClie,'Name=Cliente');
        $colCliePago->OrderByClause = QQ::OrderBy(QQN::PagosCorp()->ClienteCorp->NombClie);
        $colCliePago->ReverseOrderByClause = QQ::OrderBy(QQN::PagosCorp()->ClienteCorp->NombClie, false);
		$colCliePago->Width = 145;
        $colCliePago->FilterBoxSize = 15;
        $colCliePago->Filter = QQ::Like(QQN::PagosCorp()->ClienteCorp->NombClie, null);
        $colCliePago->FilterType = QFilterType::TextFilter;
        
        $colRefePago = $this->dtgPagosCorps->MetaAddColumn('Referencia');
        $colRefePago->Width = 160;
        $colRefePago->FilterBoxSize = 20;
        
        $colCantFact = new QDataGridColumn('C.FACT','<?= $_ITEM->CountFacturasesAsFacturaPagoCorp(); ?>');
        $colCantFact->Width = 40;
        $this->dtgPagosCorps->AddColumn($colCantFact);
        
        $colFormPago = $this->dtgPagosCorps->MetaAddColumn(QQN::PagosCorp()->FormaPago->Descripcion,'Name=Forma Pago');
        $colFormPago->Width = 100;
        $colFormPago->OrderByClause = QQ::OrderBy(QQN::PagosCorp()->FormaPago->Descripcion);
        $colFormPago->ReverseOrderByClause = QQ::OrderBy(QQN::PagosCorp()->FormaPago->Descripcion, false);
        $colFormPago->FilterBoxSize = 12;
        $colFormPago->Filter = QQ::Like(QQN::PagosCorp()->FormaPago->Descripcion, null);
        $colFormPago->FilterType = QFilterType::TextFilter;
        
        $colFechPago = new QDataGridColumn('FECHA','<?= $_FORM->FechPago_Render($_ITEM) ?>');
        $colFechPago->Width = 80;
        $this->dtgPagosCorps->AddColumn($colFechPago);
        
        $colMontPago = new QDataGridColumn('MONTO','<?= nf($_ITEM->Monto) ?>');
        $colMontPago->Width = 75;
        $this->dtgPagosCorps->AddColumn($colMontPago);
		
        $colEstapago = $this->dtgPagosCorps->MetaAddColumn('Estatus');
		$colEstapago->Width = 90;
		
        $colObsePago = $this->dtgPagosCorps->MetaAddColumn('Observacion');
		$colObsePago->Width = 250;
        $colObsePago->FilterBoxSize = 25;
 
        $this->btnExpoExce_Create();
        $this->btnConcPago_Create();
        $this->btnIncoPago_Create();
        $this->btnPagoPend_Create();

        $this->btnNuevRegi->Text = TextoIcono('plus-circle','Registrar','F','lg');

        $this->info('Utlice Doble-Click para acceder al detalle del Pago');
    }

    protected function btnConcPago_Create() {
        $this->btnConcPago = new QButton($this);
        $this->btnConcPago->Text = '<i class="fa fa-file-text-o fa-lg"></i> Conciliar';
        $this->btnConcPago->CssClass = 'btn btn-primary btn-sm';
        $this->btnConcPago->HtmlEntities = false;
        $this->btnConcPago->AddAction(new QClickEvent(), new QAjaxAction('btnConcPago_Click'));
    }

    protected function btnIncoPago_Create() {
        $this->btnIncoPago = new QButton($this);
        $this->btnIncoPago->Text = '<i class="fa fa-file-text-o fa-lg"></i> In-Conciliable';
        $this->btnIncoPago->CssClass = 'btn btn-warning btn-sm';
        $this->btnIncoPago->HtmlEntities = false;
        $this->btnIncoPago->AddAction(new QClickEvent(), new QAjaxAction('btnIncoPago_Click'));
    }

    protected function btnPagoPend_Create() {
        $this->btnPagoPend = new QButton($this);
        $this->btnPagoPend->Text = '<i class="fa fa-file-text-o fa-lg"></i> Pendiente';
        $this->btnPagoPend->CssClass = 'btn btn-default btn-sm';
        $this->btnPagoPend->HtmlEntities = false;
        $this->btnPagoPend->AddAction(new QClickEvent(), new QAjaxAction('btnPagoPend_Click'));
    }


    public function FechPago_Render(PagosCorp $objPagoCorp) {
        if (!is_null($objPagoCorp->Fecha)) {
            return $objPagoCorp->Fecha->__toString("DD/MM/YYYY");
        } else {
            return null;
        }
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/registrar_pago.php');
    }



    protected function btnConcPago_Click() {
		$this->mensaje();
        $arrIdxxSele = $this->colPagoSele->GetChangedIds();
        if (count($arrIdxxSele)) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::PagosCorp()->Id, array_keys($arrIdxxSele));
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::PagosCorp()->Id,true);
            $arrPasoSele   = PagosCorp::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
            $intConcPago   = 0;
            $intCantFact   = 0;
            foreach ($arrPasoSele as $objPagoSele) {
                if (in_array($objPagoSele->Estatus,['INCONCILIABLE','PENDIENTE'])) {
					$objPagoSele->Estatus = 'CONCILIADO';
					$objPagoSele->Save();

					$arrLogxCamb['strNombTabl'] = 'PagosCorp';
					$arrLogxCamb['intRefeRegi'] = $objPagoSele->Id;
					$arrLogxCamb['strNombRegi'] = $objPagoSele->Referencia;
					$arrLogxCamb['strDescCamb'] = 'Pago CONCILIADO';
					$arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$objPagoSele->Id;
					LogDeCambios($arrLogxCamb);

					$intCantFact += $objPagoSele->conciliarPago();

					$this->colPagoSele->SetCheckbox($objPagoSele->Id,false);
					$intConcPago ++;
				}
            }
            if ($intConcPago > 0) {
                $this->dtgPagosCorps->Refresh();
                $strTextMens = "Transaccion Exitosa | <b>$intCantFact Facturas Procesadas | $intConcPago Pago(s) Conciliado(s)</b> !!!";
                $this->success($strTextMens);
            } else {
                $strTextMens = "Ningún Pago fue procesado !!!";
                $this->info($strTextMens);
            }
        } else {
        	$strTextMens = 'Debe seleccionar al menos un Pago en estatus PENDIENTE ó INCONCILIABLE';
            $this->warning($strTextMens);
        }
    }

    protected function btnIncoPago_Click() {
		$this->mensaje();
        $arrIdxxSele = $this->colPagoSele->GetChangedIds();
        if (count($arrIdxxSele)) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::PagosCorp()->Id, array_keys($arrIdxxSele));
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::PagosCorp()->Id,true);
            $arrPasoSele   = PagosCorp::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
            $intIncoPago   = 0;
            $intCantFact   = 0;
            foreach ($arrPasoSele as $objPagoSele) {
            	if (in_array($objPagoSele->Estatus,['CONCILIADO','PENDIENTE'])) {
                    $objPagoSele->Estatus = 'INCONCILIABLE';
                    $objPagoSele->Save();

                    $arrLogxCamb['strNombTabl'] = 'PagosCorp';
                    $arrLogxCamb['intRefeRegi'] = $objPagoSele->Id;
                    $arrLogxCamb['strNombRegi'] = $objPagoSele->Referencia;
                    $arrLogxCamb['strDescCamb'] = 'Pago INCONCILIABLE';
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$objPagoSele->Id;
                    LogDeCambios($arrLogxCamb);

                    $intCantFact += $objPagoSele->replicarEstatusPago($objPagoSele->Estatus);

                    $this->colPagoSele->SetCheckbox($objPagoSele->Id,false);
                    $intIncoPago ++;
                }
            }
            if ($intIncoPago > 0) {
                $this->dtgPagosCorps->Refresh();
                $strTextMens = "Transaccion Exitosa | <b>$intCantFact Facturas Procesadas | $intIncoPago Pago(s) marcado(s) como 'Inconciliable(s)'</b>";
                $this->success($strTextMens);
            } else {
                $strTextMens = "Ningún Pago fue procesado !!!";
                $this->info($strTextMens);
            }
        } else {
        	$strTextMens = 'Debe seleccionar al menos un Pago en estatus PENDIENTE ó CONCILIADO';
            $this->warning($strTextMens);
        }
    }

    protected function btnPagoPend_Click() {
        t('===================');
        t('Pagos por Conciliar');

        $this->mensaje();
        $arrIdxxSele = $this->colPagoSele->GetChangedIds();
        if (count($arrIdxxSele)) {
            t('Hay '.count($arrIdxxSele).' tanto registros marcados...');
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::PagosCorp()->Id, array_keys($arrIdxxSele));
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::PagosCorp()->Id,true);
            $arrPasoSele   = PagosCorp::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
            $intPagoPend   = 0;
            $intCantFact   = 0;
            foreach ($arrPasoSele as $objPagoSele) {
                t('Procesando pago: '.$objPagoSele->Referencia.' en estatus: '.$objPagoSele->Estatus);
            	if (in_array($objPagoSele->Estatus,['CONCILIADO','INCONCILIABLE'])) {
                    $objPagoSele->Estatus = 'PENDIENTE';
                    $objPagoSele->Save();

                    $arrLogxCamb['strNombTabl'] = 'PagosCorp';
                    $arrLogxCamb['intRefeRegi'] = $objPagoSele->Id;
                    $arrLogxCamb['strNombRegi'] = $objPagoSele->Referencia;
                    $arrLogxCamb['strDescCamb'] = 'Pago PORCONCILIAR';
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$objPagoSele->Id;
                    LogDeCambios($arrLogxCamb);

                    $intCantFact += $objPagoSele->replicarEstatusPago('PORCONCILIAR');

                    $this->colPagoSele->SetCheckbox($objPagoSele->Id,false);
                    $intPagoPend ++;
                }
            }
            if ($intPagoPend > 0) {
                $this->dtgPagosCorps->Refresh();
                $strTextMens = "Transaccion Exitosa | <b>$intCantFact Facturas Procesadas | $intPagoPend Pago(s) marcado(s) como 'Pendientes'</b>";
                $this->success($strTextMens);
            } else {
                $strTextMens = "Ningún Pago fue procesado !!!";
                $this->info($strTextMens);
            }
        } else {
        	$strTextMens = 'Debe seleccionar al menos un Pago en estatus INCONCILIABLE ó CONCILIADO';
            $this->warning($strTextMens);
        }
    }


    public function dtgPagosCorpsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("pagos_corp_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// pagos_corp_list.tpl.php as the included HTML template file
PagosCorpListForm::Run('PagosCorpListForm');
?>
