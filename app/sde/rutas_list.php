<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/RutasListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Rutas class.  It uses the code-generated
 * RutasDataGrid control which has meta-methods to help with
 * easily creating/defining Rutas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both rutas_list.php AND
 * rutas_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class RutasListForm extends RutasListFormBase {
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
		$this->dtgRutases = new RutasDataGrid($this);
		$this->dtgRutases->FontSize = 13;
		$this->dtgRutases->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgRutases->CssClass = 'datagrid';
		$this->dtgRutases->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgRutases->Paginator = new QPaginator($this->dtgRutases);
		$this->dtgRutases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgRutases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgRutases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgRutases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgRutases->AddRowAction(new QClickEvent(), new QAjaxAction('dtgRutasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for rutas's properties, or you
		// can traverse down QQN::rutas() to display fields that are down the hierarchy)
		$this->dtgRutases->MetaAddColumn('Id');
		$this->dtgRutases->MetaAddColumn('Codigo');
		$this->dtgRutases->MetaAddColumn('Descripcion');
		$this->dtgRutases->MetaAddColumn(QQN::Rutas()->Sucursal);
		$this->dtgRutases->MetaAddTypeColumn('TipoId', 'TipoRutaType');
		$this->dtgRutases->MetaAddColumn('Observacion');
		$this->dtgRutases->MetaAddColumn('CreatedAt');
		$this->dtgRutases->MetaAddColumn('UpdatedAt');

        $this->btnExpoExce_Create();

    }

	public function dtgRutasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("rutas_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// rutas_list.tpl.php as the included HTML template file
RutasListForm::Run('RutasListForm');
?>
