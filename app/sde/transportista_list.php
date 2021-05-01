<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TransportistaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Transportista class.  It uses the code-generated
 * TransportistaDataGrid control which has meta-methods to help with
 * easily creating/defining Transportista columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both transportista_list.php AND
 * transportista_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TransportistaListForm extends TransportistaListFormBase {
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
		$this->dtgTransportistas = new TransportistaDataGrid($this);
		$this->dtgTransportistas->FontSize = 13;
		$this->dtgTransportistas->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgTransportistas->CssClass = 'datagrid';
		$this->dtgTransportistas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgTransportistas->Paginator = new QPaginator($this->dtgTransportistas);
		$this->dtgTransportistas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgTransportistas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgTransportistas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgTransportistas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgTransportistas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTransportistasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for transportista's properties, or you
		// can traverse down QQN::transportista() to display fields that are down the hierarchy)
		$this->dtgTransportistas->MetaAddColumn('Id');
		$this->dtgTransportistas->MetaAddColumn('Nombre');
		$this->dtgTransportistas->MetaAddColumn('Rif');
		$this->dtgTransportistas->MetaAddColumn('Activo');
		//$this->dtgTransportistas->MetaAddColumn('Observacion');
		//$this->dtgTransportistas->MetaAddColumn('CreatedAt');
		//$this->dtgTransportistas->MetaAddColumn('UpdatedAt');
		//$this->dtgTransportistas->MetaAddColumn('DeletedAt');
		//$this->dtgTransportistas->MetaAddColumn('CreatedBy');
		//$this->dtgTransportistas->MetaAddColumn('UpdatedBy');
		//$this->dtgTransportistas->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgTransportistasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("transportista_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// transportista_list.tpl.php as the included HTML template file
TransportistaListForm::Run('TransportistaListForm');
?>
