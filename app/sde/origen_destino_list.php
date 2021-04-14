<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/OrigenDestinoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the OrigenDestino class.  It uses the code-generated
 * OrigenDestinoDataGrid control which has meta-methods to help with
 * easily creating/defining OrigenDestino columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both origen_destino_list.php AND
 * origen_destino_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class OrigenDestinoListForm extends OrigenDestinoListFormBase {
	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

	//	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();
		$this->lblTituForm->Text = 'Origen/Destino';

		// Instantiate the Meta DataGrid
		$this->dtgOrigenDestinos = new OrigenDestinoDataGrid($this);
		$this->dtgOrigenDestinos->FontSize = 13;
		$this->dtgOrigenDestinos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgOrigenDestinos->CssClass = 'datagrid';
		$this->dtgOrigenDestinos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgOrigenDestinos->Paginator = new QPaginator($this->dtgOrigenDestinos);
		$this->dtgOrigenDestinos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgOrigenDestinos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgOrigenDestinos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgOrigenDestinos->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgOrigenDestinos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgOrigenDestinosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for origen_destino's properties, or you
		// can traverse down QQN::origen_destino() to display fields that are down the hierarchy)
		$this->dtgOrigenDestinos->MetaAddColumn('Id');
		$this->dtgOrigenDestinos->MetaAddColumn('Origen');
		$this->dtgOrigenDestinos->MetaAddColumn('Destino');
		$this->dtgOrigenDestinos->MetaAddColumn('CantidadDias');
		$this->dtgOrigenDestinos->MetaAddTypeColumn('Status', 'StatusType');
		$this->dtgOrigenDestinos->MetaAddColumn('DistanciaKm');

        $this->btnExpoExce_Create();
    }

	public function dtgOrigenDestinosRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("origen_destino_edit.php/$intId");
	}		
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// origen_destino_list.tpl.php as the included HTML template file
OrigenDestinoListForm::Run('OrigenDestinoListForm');
?>