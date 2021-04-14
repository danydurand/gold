<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FeriadoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Feriado class.  It uses the code-generated
 * FeriadoDataGrid control which has meta-methods to help with
 * easily creating/defining Feriado columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both feriado_list.php AND
 * feriado_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FeriadoListForm extends FeriadoListFormBase {
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

		// Instantiate the Meta DataGrid
		$this->dtgFeriados = new FeriadoDataGrid($this);
		$this->dtgFeriados->FontSize = 13;
		$this->dtgFeriados->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgFeriados->CssClass = 'datagrid';
		$this->dtgFeriados->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgFeriados->Paginator = new QPaginator($this->dtgFeriados);
		$this->dtgFeriados->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgFeriados->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgFeriados->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgFeriados->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgFeriados->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFeriadosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for feriado's properties, or you
		// can traverse down QQN::feriado() to display fields that are down the hierarchy)
		$this->dtgFeriados->MetaAddColumn('Id');
		$this->dtgFeriados->MetaAddColumn('Fecha');

        $this->btnExpoExce_Create();
    }

	public function dtgFeriadosRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("feriado_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// feriado_list.tpl.php as the included HTML template file
FeriadoListForm::Run('FeriadoListForm');
?>
