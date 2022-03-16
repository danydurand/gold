<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacturasListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Facturas class.  It uses the code-generated
 * FacturasDataGrid control which has meta-methods to help with
 * easily creating/defining Facturas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both facturas_list.php AND
 * facturas_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacturasListForm extends FacturasListFormBase {
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

		$this->lblTituForm->Text = 'Facturas Corp';

		// Instantiate the Meta DataGrid
		$this->dtgFacturases = new FacturasDataGrid($this);
		$this->dtgFacturases->FontSize = 13;
		$this->dtgFacturases->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgFacturases->CssClass = 'datagrid';
		$this->dtgFacturases->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgFacturases->Paginator = new QPaginator($this->dtgFacturases);
		$this->dtgFacturases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNotNull(QQN::Facturas()->ClienteCorpId);
        $this->dtgFacturases->AdditionalConditions = QQ::AndCondition($objClauWher);

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Facturas()->Id,false);
        $this->dtgFacturases->AdditionalClauses = $objClauOrde;

		// Higlight the datagrid rows when mousing over them
		$this->dtgFacturases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgFacturases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgFacturases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgFacturases->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFacturasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for facturas's properties, or you
		// can traverse down QQN::facturas() to display fields that are down the hierarchy)
		$this->dtgFacturases->MetaAddColumn('Id');
		$this->dtgFacturases->MetaAddColumn('Referencia');

		$colNombClie = $this->dtgFacturases->MetaAddColumn(QQN::Facturas()->ClienteCorp->NombClie,'Name=CLIENTE');
        $colNombClie->OrderByClause = QQ::OrderBy(QQN::Facturas()->ClienteCorp->NombClie);
        $colNombClie->ReverseOrderByClause = QQ::OrderBy(QQN::Facturas()->ClienteCorp->NombClie,false);
        $colNombClie->Filter = QQ::Like(QQN::Facturas()->ClienteCorp->NombClie,null);
        $colNombClie->FilterType = QFilterType::TextFilter;

		$this->dtgFacturases->MetaAddColumn('Fecha');
		$this->dtgFacturases->MetaAddColumn('Estatus');

        $colCantMani = new QDataGridColumn('Cant. Manif','<?= $_FORM->CantMani($_ITEM) ?>');
        $colCantMani->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgFacturases->AddColumn($colCantMani);

        $colTotaFact = new QDataGridColumn('TOTAL','<?= nf($_ITEM->Total) ?>');
        $this->dtgFacturases->AddColumn($colTotaFact);

        $colCantMani = new QDataGridColumn('Cant. Pagos','<?= $_FORM->CantPago($_ITEM) ?>');
        $colCantMani->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgFacturases->AddColumn($colCantMani);

        $colMontCobr = $this->dtgFacturases->MetaAddColumn('MontoCobrado','Name=MTO COBRADO');
        $colMontCobr->HorizontalAlign = QHorizontalAlign::Right;
        $colMontCobr->Width = 100;

        $colMontPend = $this->dtgFacturases->MetaAddColumn('MontoPendiente','Name=MONTO PEND');
        $colMontPend->HorizontalAlign = QHorizontalAlign::Right;
        $colMontPend->Width = 100;

        $colEstaPago = $this->dtgFacturases->MetaAddColumn('EstatusPago');
        $colEstaPago->HorizontalAlign = QHorizontalAlign::Center;
        $colEstaPago->Width = 120;

        $this->btnExpoExce_Create();
        $this->btnExpoExce->Visible = true;

    }

    public function CantMani(Facturas $objFactClie) {
		return $objFactClie->CountNotaEntregasAsFactura();
	}

    public function CantPago(Facturas $objFactClie) {
		return $objFactClie->CountPagosCorpsAsFacturaPagoCorp();
	}

    public function btnNuevRegi_Click()
    {
        QApplication::Redirect("emitir_factura_corp.php");
    }

    public function dtgFacturasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("facturas_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// facturas_list.tpl.php as the included HTML template file
FacturasListForm::Run('FacturasListForm');
?>
