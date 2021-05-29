<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/BagListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Bag class.  It uses the code-generated
 * BagDataGrid control which has meta-methods to help with
 * easily creating/defining Bag columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both bag_list.php AND
 * bag_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class BagListForm extends BagListFormBase {
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

		$this->lblTituForm->Text = 'Valijas';

		// Instantiate the Meta DataGrid
		$this->dtgBags = new BagDataGrid($this);
		$this->dtgBags->FontSize = 13;
		$this->dtgBags->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgBags->CssClass = 'datagrid';
		$this->dtgBags->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgBags->Paginator = new QPaginator($this->dtgBags);
		$this->dtgBags->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgBags->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgBags->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgBags->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgBags->AddRowAction(new QClickEvent(), new QAjaxAction('dtgBagsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for bag's properties, or you
		// can traverse down QQN::bag() to display fields that are down the hierarchy)
		$this->dtgBags->MetaAddColumn('Id');
		$this->dtgBags->MetaAddColumn('Numero');
		$this->dtgBags->MetaAddColumn(QQN::Bag()->Destino);
		$this->dtgBags->MetaAddColumn('Estatus');
		$this->dtgBags->MetaAddColumn('Piezas');
		$this->dtgBags->MetaAddColumn('Libras');
		$this->dtgBags->MetaAddColumn('Volumen');
		$this->dtgBags->MetaAddColumn('Valor');
		//$this->dtgBags->MetaAddColumn('CreatedAt');
		//$this->dtgBags->MetaAddColumn('UpdatedAt');
		//$this->dtgBags->MetaAddColumn('CreatedBy');
		//$this->dtgBags->MetaAddColumn('UpdatedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgBagsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("bag_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// bag_list.tpl.php as the included HTML template file
BagListForm::Run('BagListForm');
?>
