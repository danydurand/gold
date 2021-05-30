<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ClientesRetailListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the ClientesRetail class.  It uses the code-generated
 * ClientesRetailDataGrid control which has meta-methods to help with
 * easily creating/defining ClientesRetail columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both clientes_retail_list.php AND
 * clientes_retail_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ClientesRetailListForm extends ClientesRetailListFormBase {
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
		$this->dtgClientesRetails = new ClientesRetailDataGrid($this);
		$this->dtgClientesRetails->FontSize = 13;
		$this->dtgClientesRetails->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgClientesRetails->CssClass = 'datagrid';
		$this->dtgClientesRetails->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgClientesRetails->Paginator = new QPaginator($this->dtgClientesRetails);
		$this->dtgClientesRetails->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgClientesRetails->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgClientesRetails->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgClientesRetails->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgClientesRetails->AddRowAction(new QClickEvent(), new QAjaxAction('dtgClientesRetailsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for clientes_retail's properties, or you
		// can traverse down QQN::clientes_retail() to display fields that are down the hierarchy)
		$this->dtgClientesRetails->MetaAddColumn('Id');
		$this->dtgClientesRetails->MetaAddColumn('CedulaRif');
		$this->dtgClientesRetails->MetaAddColumn('Nombre');
		$this->dtgClientesRetails->MetaAddColumn('Sexo');
		$this->dtgClientesRetails->MetaAddColumn(QQN::ClientesRetail()->Sucursal);
		$this->dtgClientesRetails->MetaAddColumn('Email');
		$this->dtgClientesRetails->MetaAddColumn('TelefonoFijo');
		$this->dtgClientesRetails->MetaAddColumn('TelefonoMovil');
		//$this->dtgClientesRetails->MetaAddColumn('Direccion');
		//$this->dtgClientesRetails->MetaAddColumn('Estado');
		//$this->dtgClientesRetails->MetaAddColumn('Ciudad');
		//$this->dtgClientesRetails->MetaAddColumn('CodigoPostal');
		$this->dtgClientesRetails->MetaAddColumn('FechaNacimiento');
		$this->dtgClientesRetails->MetaAddColumn(QQN::ClientesRetail()->Profesion);
		//$this->dtgClientesRetails->MetaAddColumn('CreatedAt');
		//$this->dtgClientesRetails->MetaAddColumn('UpdatedAt');
		//$this->dtgClientesRetails->MetaAddColumn('DeletedAt');
		//$this->dtgClientesRetails->MetaAddColumn('CreatedBy');
		//$this->dtgClientesRetails->MetaAddColumn('UpdatedBy');
		//$this->dtgClientesRetails->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgClientesRetailsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("clientes_retail_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// clientes_retail_list.tpl.php as the included HTML template file
ClientesRetailListForm::Run('ClientesRetailListForm');
?>
