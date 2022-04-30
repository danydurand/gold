<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/DivisasListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Divisas class.  It uses the code-generated
 * DivisasDataGrid control which has meta-methods to help with
 * easily creating/defining Divisas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both divisas_list.php AND
 * divisas_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class DivisasListForm extends DivisasListFormBase {
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

		$this->lblTituForm->Text = 'Divisas';

		// Instantiate the Meta DataGrid
		$this->dtgDivisases = new DivisasDataGrid($this);
		$this->dtgDivisases->FontSize = 13;
		$this->dtgDivisases->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgDivisases->CssClass = 'datagrid';
		$this->dtgDivisases->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgDivisases->Paginator = new QPaginator($this->dtgDivisases);
		$this->dtgDivisases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgDivisases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgDivisases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgDivisases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgDivisases->AddRowAction(new QClickEvent(), new QAjaxAction('dtgDivisasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for divisas's properties, or you
		// can traverse down QQN::divisas() to display fields that are down the hierarchy)
		$this->dtgDivisases->MetaAddColumn('Id');
		$this->dtgDivisases->MetaAddColumn('Codigo');
		$this->dtgDivisases->MetaAddColumn('Nombre');
		$this->dtgDivisases->MetaAddColumn('CreatedAt');
		$this->dtgDivisases->MetaAddColumn('UpdatedAt');
		$this->dtgDivisases->MetaAddColumn('DeletedAt');
		$this->dtgDivisases->MetaAddColumn('CreatedBy');
		$this->dtgDivisases->MetaAddColumn('UpdatedBy');
		$this->dtgDivisases->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgDivisasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("divisas_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// divisas_list.tpl.php as the included HTML template file
DivisasListForm::Run('DivisasListForm');
?>
