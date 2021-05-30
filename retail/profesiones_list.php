<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ProfesionesListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Profesiones class.  It uses the code-generated
 * ProfesionesDataGrid control which has meta-methods to help with
 * easily creating/defining Profesiones columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both profesiones_list.php AND
 * profesiones_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ProfesionesListForm extends ProfesionesListFormBase {
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
		$this->dtgProfesioneses = new ProfesionesDataGrid($this);
		$this->dtgProfesioneses->FontSize = 13;
		$this->dtgProfesioneses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgProfesioneses->CssClass = 'datagrid';
		$this->dtgProfesioneses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgProfesioneses->Paginator = new QPaginator($this->dtgProfesioneses);
		$this->dtgProfesioneses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgProfesioneses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgProfesioneses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgProfesioneses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgProfesioneses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgProfesionesesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for profesiones's properties, or you
		// can traverse down QQN::profesiones() to display fields that are down the hierarchy)
		$this->dtgProfesioneses->MetaAddColumn('Id');
		$this->dtgProfesioneses->MetaAddColumn('Nombre');
		//$this->dtgProfesioneses->MetaAddColumn('CreatedAt');
		//$this->dtgProfesioneses->MetaAddColumn('UpdatedAt');
		//$this->dtgProfesioneses->MetaAddColumn('DeletedAt');
		//$this->dtgProfesioneses->MetaAddColumn('CreatedBy');
		//$this->dtgProfesioneses->MetaAddColumn('UpdatedBy');
		//$this->dtgProfesioneses->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgProfesionesesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("profesiones_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// profesiones_list.tpl.php as the included HTML template file
ProfesionesListForm::Run('ProfesionesListForm');
?>
