<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
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

		$this->lblTituForm->Text = 'Pagos';

		// Instantiate the Meta DataGrid
		$this->dtgPagosCorps = new PagosCorpDataGrid($this);
		$this->dtgPagosCorps->FontSize = 13;
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
		$this->dtgPagosCorps->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPagosCorpsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for pagos_corp's properties, or you
		// can traverse down QQN::pagos_corp() to display fields that are down the hierarchy)
		$this->dtgPagosCorps->MetaAddColumn('Id');
        $this->dtgPagosCorps->MetaAddColumn('Referencia');
        //$this->dtgPagosCorps->MetaAddColumn(QQN::PagosCorp()->ClienteCorp);
        $this->dtgPagosCorps->MetaAddColumn(QQN::PagosCorp()->FormaPago);
        $colFechPago = new QDataGridColumn('FECHA','<?= $_FORM->FechPago_Render($_ITEM) ?>');
        $this->dtgPagosCorps->AddColumn($colFechPago);
		//$this->dtgPagosCorps->MetaAddColumn('Fecha');
		$this->dtgPagosCorps->MetaAddColumn('Monto');
		$this->dtgPagosCorps->MetaAddColumn('Estatus');
		//$this->dtgPagosCorps->MetaAddColumn('Observacion');
		//$this->dtgPagosCorps->MetaAddColumn('CreatedAt');
		//$this->dtgPagosCorps->MetaAddColumn('UpdatedAt');
		//$this->dtgPagosCorps->MetaAddColumn('DeletedAt');
		//$this->dtgPagosCorps->MetaAddColumn('CreatedBy');
		//$this->dtgPagosCorps->MetaAddColumn('UpdatedBy');
		//$this->dtgPagosCorps->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

    public function btnNuevRegi_Click()
    {
        QApplication::Redirect(__SIST__.'/registrar_pago.php');
    }

    public function FechPago_Render(PagosCorp $objPagoCorp) {
		if (!is_null($objPagoCorp->Fecha)) {
            return $objPagoCorp->Fecha->__toString("DD/MM/YYYY");
        } else {
            return null;
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
