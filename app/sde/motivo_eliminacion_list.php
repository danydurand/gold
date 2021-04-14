<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/MotivoEliminacionListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the MotivoEliminacion class.  It uses the code-generated
 * MotivoEliminacionDataGrid control which has meta-methods to help with
 * easily creating/defining MotivoEliminacion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both motivo_eliminacion_list.php AND
 * motivo_eliminacion_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class MotivoEliminacionListForm extends MotivoEliminacionListFormBase {
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

        $this->lblTituForm->Text = 'Motivos Eliminacion de Cliente';


        // Instantiate the Meta DataGrid
		$this->dtgMotivoEliminacions = new MotivoEliminacionDataGrid($this);
		$this->dtgMotivoEliminacions->FontSize = 13;
		$this->dtgMotivoEliminacions->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgMotivoEliminacions->CssClass = 'datagrid';
		$this->dtgMotivoEliminacions->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgMotivoEliminacions->Paginator = new QPaginator($this->dtgMotivoEliminacions);
		$this->dtgMotivoEliminacions->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgMotivoEliminacions->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgMotivoEliminacions->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgMotivoEliminacions->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgMotivoEliminacions->AddRowAction(new QClickEvent(), new QAjaxAction('dtgMotivoEliminacionsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for motivo_eliminacion's properties, or you
		// can traverse down QQN::motivo_eliminacion() to display fields that are down the hierarchy)
		$this->dtgMotivoEliminacions->MetaAddColumn('Id');
		$colDescMoti = $this->dtgMotivoEliminacions->MetaAddColumn('Description');
		$colDescMoti->Name = 'Descripcion';
		$colCreaProx = $this->dtgMotivoEliminacions->MetaAddColumn('CreatedAt');
		$colCreaProx->Name = 'Creada El';
		$colUsuaCrea = $this->dtgMotivoEliminacions->MetaAddColumn(QQN::MotivoEliminacion()->User);
		$colUsuaCrea->Name = 'Creada Por';
		//$this->dtgMotivoEliminacions->MetaAddColumn('DeletedAt');

        $this->btnExpoExce_Create();

    }

	public function dtgMotivoEliminacionsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("motivo_eliminacion_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// motivo_eliminacion_list.tpl.php as the included HTML template file
MotivoEliminacionListForm::Run('MotivoEliminacionListForm');
?>
