<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ClientePmnListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the ClientePmn class.  It uses the code-generated
 * ClientePmnDataGrid control which has meta-methods to help with
 * easily creating/defining ClientePmn columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cliente_pmn_list.php AND
 * cliente_pmn_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ClientePmnListForm extends ClientePmnListFormBase {
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

		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

		// Instantiate the Meta DataGrid
		$this->dtgClientePmns = new ClientePmnDataGrid($this);
		$this->dtgClientePmns->FontSize = 13;
		$this->dtgClientePmns->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgClientePmns->CssClass = 'datagrid';
		$this->dtgClientePmns->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgClientePmns->Paginator = new QPaginator($this->dtgClientePmns);
		$this->dtgClientePmns->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgClientePmns->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgClientePmns->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgClientePmns->RowActionParameterHtml = '<?= $_ITEM->CedulaRif ?>';
		$this->dtgClientePmns->AddRowAction(new QClickEvent(), new QAjaxAction('dtgClientePmnsRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for cliente_pmn's properties, or you
		// can traverse down QQN::cliente_pmn() to display fields that are down the hierarchy)
		$colCeduRifx = $this->dtgClientePmns->MetaAddColumn('CedulaRif');
		$colCeduRifx->Name = 'Cédula/Rif';

		$colNombClie = $this->dtgClientePmns->MetaAddColumn('Nombre');
		$colNombClie->FilterBoxSize = 16;

		$colTeleFijo = $this->dtgClientePmns->MetaAddColumn('TelefonoFijo');
		$colTeleFijo->Name = 'Tlf. Fijo';

		$colTeleMovi = $this->dtgClientePmns->MetaAddColumn('TelefonoMovil');
		$colTeleMovi->Name = 'Tlf. Móvil';

		$colDireClie = $this->dtgClientePmns->MetaAddColumn('Direccion');
		$colDireClie->Name = 'Dirección';
		$colDireClie->FilterBoxSize = 30;

		$this->dtgClientePmns->MetaAddColumn('Email');

		$colSucuClie = $this->dtgClientePmns->MetaAddColumn('SucursalId');
		$colSucuClie->Name = 'Sucursal';
		$colSucuClie->FilterBoxSize = 4;

		$this->dtgClientePmns->MetaAddColumn('RegistradoEl');

		// $colRegiPorx = $this->dtgClientePmns->MetaAddColumn(QQN::ClientePmn()->RegistradoPorObject);
		// $colRegiPorx->Name = 'Registrado Por';

	}

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------
	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Clientes del Expreso Nacional';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------
    public function btnCreaRegi_Click() {
        QApplication::Redirect(__SIST__.'cliente_pmn_edit.php');
    }

	public function dtgClientePmnsRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect("cliente_pmn_edit.php/$intId");
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// cliente_pmn_list.tpl.php as the included HTML template file

ClientePmnListForm::Run('ClientePmnListForm');
?>