<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once('inc/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/LineaAereaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the LineaAerea class.  It uses the code-generated
 * LineaAereaDataGrid control which has meta-methods to help with
 * easily creating/defining LineaAerea columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both linea_aerea_list.php AND
 * linea_aerea_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class LineaAereaListForm extends LineaAereaListFormBase {
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
		$this->dtgLineaAereas = new LineaAereaDataGrid($this);
		$this->dtgLineaAereas->FontSize = 13;
		$this->dtgLineaAereas->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgLineaAereas->CssClass = 'datagrid';
		$this->dtgLineaAereas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgLineaAereas->Paginator = new QPaginator($this->dtgLineaAereas);
		$this->dtgLineaAereas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgLineaAereas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgLineaAereas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgLineaAereas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgLineaAereas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgLineaAereasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for linea_aerea's properties, or you
		// can traverse down QQN::linea_aerea() to display fields that are down the hierarchy)
		$this->dtgLineaAereas->MetaAddColumn('Id');
		$this->dtgLineaAereas->MetaAddColumn('Nombre');
		$this->dtgLineaAereas->MetaAddColumn('Activa');
		//$this->dtgLineaAereas->MetaAddColumn('CreatedAt');
		//$this->dtgLineaAereas->MetaAddColumn('UpdatedAt');
		//$this->dtgLineaAereas->MetaAddColumn('DeletedAt');
		//$this->dtgLineaAereas->MetaAddColumn('CreatedBy');
		//$this->dtgLineaAereas->MetaAddColumn('UpdatedBy');
		//$this->dtgLineaAereas->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgLineaAereasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("linea_aerea_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// linea_aerea_list.tpl.php as the included HTML template file
LineaAereaListForm::Run('LineaAereaListForm');
?>
