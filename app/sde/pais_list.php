<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/PaisListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Pais class.  It uses the code-generated
 * PaisDataGrid control which has meta-methods to help with
 * easily creating/defining Pais columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both pais_list.php AND
 * pais_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class PaisListForm extends PaisListFormBase {
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
		$this->dtgPaises = new PaisDataGrid($this);
		$this->dtgPaises->FontSize = 13;
		$this->dtgPaises->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgPaises->CssClass = 'datagrid';
		$this->dtgPaises->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgPaises->Paginator = new QPaginator($this->dtgPaises);
		$this->dtgPaises->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgPaises->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgPaises->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgPaises->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgPaises->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPaisesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for pais's properties, or you
		// can traverse down QQN::pais() to display fields that are down the hierarchy)
		$this->dtgPaises->MetaAddColumn('Id', 'Width=50');
		$this->dtgPaises->MetaAddColumn('Nombre','Width=200');
		$this->dtgPaises->MetaAddColumn(QQN::Pais()->Divisa, 'Width=120');
		$this->dtgPaises->MetaAddColumn('Siglas', 'Width=120');
		$this->dtgPaises->MetaAddColumn('EsPrincipal');

        $this->btnExpoExce_Create();

    }

	public function dtgPaisesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("pais_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// pais_list.tpl.php as the included HTML template file
PaisListForm::Run('PaisListForm');
?>
