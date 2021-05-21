<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SucursalesListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Sucursales class.  It uses the code-generated
 * SucursalesDataGrid control which has meta-methods to help with
 * easily creating/defining Sucursales columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sucursales_list.php AND
 * sucursales_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SucursalesListForm extends SucursalesListFormBase {
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

		$this->lblTituForm->Text = 'Sucursales';

		// Instantiate the Meta DataGrid
		$this->dtgSucursaleses = new SucursalesDataGrid($this);
		$this->dtgSucursaleses->FontSize = 13;
		$this->dtgSucursaleses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgSucursaleses->CssClass = 'datagrid';
		$this->dtgSucursaleses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgSucursaleses->Paginator = new QPaginator($this->dtgSucursaleses);
		$this->dtgSucursaleses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgSucursaleses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgSucursaleses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgSucursaleses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgSucursaleses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSucursalesesRow_Click'));

        $this->dtgSucursaleses->SortColumnIndex = 0;

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for sucursales's properties, or you
		// can traverse down QQN::sucursales() to display fields that are down the hierarchy)
		//$this->dtgSucursaleses->MetaAddColumn('Id');
        $this->dtgSucursaleses->MetaAddColumn('Iata');
        $this->dtgSucursaleses->MetaAddColumn('Nombre');
		//$this->dtgSucursaleses->MetaAddColumn('Telefono');
		$this->dtgSucursaleses->MetaAddColumn(QQN::Sucursales()->Estado);
		$this->dtgSucursaleses->MetaAddColumn('Zona');
		$this->dtgSucursaleses->MetaAddColumn('EsExport');
		$this->dtgSucursaleses->MetaAddColumn('EsExenta');
		$this->dtgSucursaleses->MetaAddColumn('EsPrincipal');
		$this->dtgSucursaleses->MetaAddColumn('EsAreaMetropolitana');
		$this->dtgSucursaleses->MetaAddColumn('EsAlmacen');
		$this->dtgSucursaleses->MetaAddColumn('EsTienda');
		//$this->dtgSucursaleses->MetaAddColumn('EmailPrincipal');
		//$this->dtgSucursaleses->MetaAddColumn('EmailAlmacen');
		//$this->dtgSucursaleses->MetaAddColumn('ZonaNc');
		//$this->dtgSucursaleses->MetaAddColumn('ComisionVenta');
		//$this->dtgSucursaleses->MetaAddColumn('ComisionEntrega');
		//$this->dtgSucursaleses->MetaAddColumn('CreatedAt');
		//$this->dtgSucursaleses->MetaAddColumn('UpdatedAt');
		//$this->dtgSucursaleses->MetaAddColumn('DeletedAt');
		//$this->dtgSucursaleses->MetaAddColumn('CreatedBy');
		//$this->dtgSucursaleses->MetaAddColumn('UpdatedBy');
		//$this->dtgSucursaleses->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgSucursalesesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("sucursales_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// sucursales_list.tpl.php as the included HTML template file
SucursalesListForm::Run('SucursalesListForm');
?>
