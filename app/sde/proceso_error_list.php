<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ProcesoErrorListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the ProcesoError class.  It uses the code-generated
 * ProcesoErrorDataGrid control which has meta-methods to help with
 * easily creating/defining ProcesoError columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both proceso_error_list.php AND
 * proceso_error_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ProcesoErrorListForm extends ProcesoErrorListFormBase {
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

		t('Entrando a la lista de procesos...');

		// Instantiate the Meta DataGrid
		$this->dtgProcesoErrors = new ProcesoErrorDataGrid($this);
		$this->dtgProcesoErrors->FontSize = 13;
		$this->dtgProcesoErrors->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgProcesoErrors->CssClass = 'datagrid';
		$this->dtgProcesoErrors->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgProcesoErrors->Paginator = new QPaginator($this->dtgProcesoErrors);
		$this->dtgProcesoErrors->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgProcesoErrors->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgProcesoErrors->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgProcesoErrors->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgProcesoErrors->AddRowAction(new QClickEvent(), new QAjaxAction('dtgProcesoErrorsRow_Click'));

		$this->dtgProcesoErrors->SortColumnIndex = 0;
		$this->dtgProcesoErrors->SortDirection = 1;
        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for proceso_error's properties, or you
		// can traverse down QQN::proceso_error() to display fields that are down the hierarchy)
		$this->dtgProcesoErrors->MetaAddColumn('Id');
		$this->dtgProcesoErrors->MetaAddColumn('Nombre');
		$this->dtgProcesoErrors->MetaAddColumn('Usuario');
		$this->dtgProcesoErrors->MetaAddColumn('Fecha');
		//$this->dtgProcesoErrors->MetaAddColumn('HoraInicial');
		//$this->dtgProcesoErrors->MetaAddColumn('HoraFinal');
		$this->dtgProcesoErrors->MetaAddColumn('Comentario');
		//$this->dtgProcesoErrors->MetaAddColumn('NotificarAdmin');
		//$this->dtgProcesoErrors->MetaAddColumn('NotificarUsuario');

        $this->btnExpoExce_Create();

        t('Aqui estoy...');

    }

	public function dtgProcesoErrorsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        //QApplication::Redirect("proceso_error_edit.php/$intId");
        $_SESSION['PagiBack'] = __SIST__."/proceso_error_list.php";
        QApplication::Redirect("detalle_error_list.php/$intId");
	}

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// proceso_error_list.tpl.php as the included HTML template file
ProcesoErrorListForm::Run('ProcesoErrorListForm');
?>
