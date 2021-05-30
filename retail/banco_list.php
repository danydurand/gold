<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/BancoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Banco class.  It uses the code-generated
 * BancoDataGrid control which has meta-methods to help with
 * easily creating/defining Banco columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both banco_list.php AND
 * banco_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class BancoListForm extends BancoListFormBase {
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
		$this->dtgBancos = new BancoDataGrid($this);
		$this->dtgBancos->FontSize = 13;
		$this->dtgBancos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgBancos->CssClass = 'datagrid';
		$this->dtgBancos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgBancos->Paginator = new QPaginator($this->dtgBancos);
		$this->dtgBancos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgBancos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgBancos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgBancos->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgBancos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgBancosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for banco's properties, or you
		// can traverse down QQN::banco() to display fields that are down the hierarchy)
		$this->dtgBancos->MetaAddColumn('Id');
		$this->dtgBancos->MetaAddColumn('Descripcion');
		$this->dtgBancos->MetaAddTypeColumn('StatusId', 'StatusType');
		$this->dtgBancos->MetaAddColumn('Abreviado');
		//$this->dtgBancos->MetaAddColumn('CreatedAt');
		//$this->dtgBancos->MetaAddColumn('UpdatedAt');
		//$this->dtgBancos->MetaAddColumn('DeletedAt');
		//$this->dtgBancos->MetaAddColumn('CreatedBy');
		//$this->dtgBancos->MetaAddColumn('UpdatedBy');
		//$this->dtgBancos->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgBancosRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("banco_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// banco_list.tpl.php as the included HTML template file
BancoListForm::Run('BancoListForm');
?>
