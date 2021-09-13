<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ColaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Cola class.  It uses the code-generated
 * ColaDataGrid control which has meta-methods to help with
 * easily creating/defining Cola columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cola_list.php AND
 * cola_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ColaListForm extends ColaListFormBase {
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

		$this->lblTituForm->Text = 'Procesos Batch';

		// Instantiate the Meta DataGrid
		$this->dtgColas = new ColaDataGrid($this);
		$this->dtgColas->FontSize = 13;
		$this->dtgColas->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgColas->CssClass = 'datagrid';
		$this->dtgColas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgColas->Paginator = new QPaginator($this->dtgColas);
		$this->dtgColas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		$this->dtgColas->SortColumnIndex = 0;
		$this->dtgColas->SortDirection   = 1;

		// Higlight the datagrid rows when mousing over them
		$this->dtgColas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgColas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgColas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgColas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgColasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for cola's properties, or you
		// can traverse down QQN::cola() to display fields that are down the hierarchy)
		$this->dtgColas->MetaAddColumn('Id');
		$this->dtgColas->MetaAddColumn(QQN::Cola()->ProcesoError,'Name=Proceso');
		$this->dtgColas->MetaAddColumn('FechaInicio','Name=F.Inicio');
		$this->dtgColas->MetaAddColumn('FechaFin','Name=F.Fin');
		//$this->dtgColas->MetaAddColumn('Clase');
		//$this->dtgColas->MetaAddColumn('Metodo');
		//$this->dtgColas->MetaAddColumn('Parametros');
		$this->dtgColas->MetaAddColumn('Ejecutado');
		$this->dtgColas->MetaAddColumn('Resultado');
		$this->dtgColas->MetaAddColumn('CreatedAt','Name=Crdo El');
		$this->dtgColas->MetaAddColumn('UpdatedAt','Name=Modif El');
		$this->dtgColas->MetaAddColumn(QQN::Cola()->CreatedByObject,'Name=Crdo Por');
		$this->dtgColas->MetaAddColumn(QQN::Cola()->UpdatedByObject,'Name=Modif Por');

        $this->btnExpoExce_Create();

    }

	public function dtgColasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("cola_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// cola_list.tpl.php as the included HTML template file
ColaListForm::Run('ColaListForm');
?>
