<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CheckpointsListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Checkpoints class.  It uses the code-generated
 * CheckpointsDataGrid control which has meta-methods to help with
 * easily creating/defining Checkpoints columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both checkpoints_list.php AND
 * checkpoints_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CheckpointsListForm extends CheckpointsListFormBase {
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

		$this->lblTituForm->Text = 'Checkpoints';

		// Instantiate the Meta DataGrid
		$this->dtgCheckpointses = new CheckpointsDataGrid($this);
		$this->dtgCheckpointses->FontSize = 13;
		$this->dtgCheckpointses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgCheckpointses->CssClass = 'datagrid';
		$this->dtgCheckpointses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgCheckpointses->Paginator = new QPaginator($this->dtgCheckpointses);
		$this->dtgCheckpointses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgCheckpointses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgCheckpointses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgCheckpointses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgCheckpointses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgCheckpointsesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for checkpoints's properties, or you
		// can traverse down QQN::checkpoints() to display fields that are down the hierarchy)
		$this->dtgCheckpointses->MetaAddColumn('Id');
		$this->dtgCheckpointses->MetaAddColumn('Codigo');
		$this->dtgCheckpointses->MetaAddColumn('Descripcion');
		$this->dtgCheckpointses->MetaAddColumn('DescripcionRastreo');
		$this->dtgCheckpointses->MetaAddColumn('Terminal');
		$this->dtgCheckpointses->MetaAddColumn('Visibilidad');
		$this->dtgCheckpointses->MetaAddColumn('Tipo');
		$this->dtgCheckpointses->MetaAddColumn('Notificar');
		$this->dtgCheckpointses->MetaAddColumn('Imagen');
		$this->dtgCheckpointses->MetaAddColumn('Color');
		//$this->dtgCheckpointses->MetaAddColumn('Observacion');
		//$this->dtgCheckpointses->MetaAddColumn('CreatedAt');
		//$this->dtgCheckpointses->MetaAddColumn('UpdatedAt');
		//$this->dtgCheckpointses->MetaAddColumn('DeletedAt');
		//$this->dtgCheckpointses->MetaAddColumn('CreatedBy');
		//$this->dtgCheckpointses->MetaAddColumn('UpdatedBy');
		//$this->dtgCheckpointses->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgCheckpointsesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("checkpoints_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// checkpoints_list.tpl.php as the included HTML template file
CheckpointsListForm::Run('CheckpointsListForm');
?>
