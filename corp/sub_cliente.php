<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/MasterClienteListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the MasterCliente class.  It uses the code-generated
 * MasterClienteDataGrid control which has meta-methods to help with
 * easily creating/defining MasterCliente columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both master_cliente_list.php AND
 * master_cliente_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SubClienteForm extends MasterClienteListFormBase {
	/**
	 * @var $objUsuario UsuarioConnect
	 */
	protected $objUsuario;

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

		$this->objUsuario = unserialize($_SESSION['User']);

		$this->lblTituForm->Text = 'SubCuentas';

		// Instantiate the Meta DataGrid
		$this->dtgMasterClientes = new MasterClienteDataGrid($this);
		$this->dtgMasterClientes->FontSize = 13;
		$this->dtgMasterClientes->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgMasterClientes->CssClass = 'datagrid';
		$this->dtgMasterClientes->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgMasterClientes->Paginator = new QPaginator($this->dtgMasterClientes);
		$this->dtgMasterClientes->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgMasterClientes->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgMasterClientes->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgMasterClientes->RowActionParameterHtml = '<?= $_ITEM->CodiClie ?>';
		$this->dtgMasterClientes->AddRowAction(new QClickEvent(), new QAjaxAction('dtgMasterClientesRow_Click'));

		// Se arma condición adicional para mostrar exclusivamente
		// a los sub-clientes que pertenezcan al usuario conectado.
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::MasterCliente()->CodiDepe,$this->objUsuario->Cliente->CodiClie);
		$this->dtgMasterClientes->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Se arma clausula adicional para ordenar los registros por nombre de sub-cliente
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::MasterCliente()->NombClie);
		$this->dtgMasterClientes->AdditionalClauses = $objClauOrde;

		$arrRegiSubc = MasterCliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
		$_SESSION['DataTabl'] = serialize($arrRegiSubc);

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for master_cliente's properties, or you
		// can traverse down QQN::master_cliente() to display fields that are down the hierarchy)
		$colCodiClie = $this->dtgMasterClientes->MetaAddColumn('CodigoInterno');
		$colCodiClie->Name = 'Codigo';
		$colCodiClie->Width = 85;

		$colNombClie = $this->dtgMasterClientes->MetaAddColumn('NombClie');
		$colNombClie->Name = 'Nombre del Cliente';
		$colNombClie->Width = 400;

		$colSucuClie = $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->CodiEsta);
		$colSucuClie->Name = 'Suc';
		$colSucuClie->Width = 50;

		$colPersCona = $this->dtgMasterClientes->MetaAddColumn('PersCona');
		$colPersCona->Name = 'Persona Contacto';
		$colPersCona->Width = 280;

		$colTeleCona = $this->dtgMasterClientes->MetaAddColumn('TeleCona');
		$colTeleCona->Name = 'Teléfono Contacto';
		$colTeleCona->Width = 200;

		$this->dtgMasterClientes->MetaAddTypeColumn('CodiStat', 'StatusType');

        $this->btnExpoExce_Create();
        $this->btnNuevRegi->Visible = false;

    }

	public function dtgMasterClientesRow_Click($strFormId, $strControlId, $strParameter) {
        $intCodiClie = intval($strParameter);
		// $_SESSION['SubxClie'] = $intCodiClie;
		QApplication::Redirect("guia_list_sc.php/".$intCodiClie);
	}

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// master_cliente_list.tpl.php as the included HTML template file
SubClienteForm::Run('SubClienteForm');
?>
