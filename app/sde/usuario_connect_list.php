<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/UsuarioConnectListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the UsuarioConnect class.  It uses the code-generated
 * UsuarioConnectDataGrid control which has meta-methods to help with
 * easily creating/defining UsuarioConnect columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both usuario_connect_list.php AND
 * usuario_connect_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class UsuarioConnectListForm extends UsuarioConnectListFormBase {
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

        $this->lblTituForm->Text = 'Usuarios Connect';

        // Instantiate the Meta DataGrid
		$this->dtgUsuarioConnects = new UsuarioConnectDataGrid($this);
		$this->dtgUsuarioConnects->FontSize = 13;
		$this->dtgUsuarioConnects->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgUsuarioConnects->CssClass = 'datagrid';
		$this->dtgUsuarioConnects->AlternateRowStyle->CssClass = 'alternate';

        // Los registros "Borrados" no deben mostrarse
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNull(QQN::UsuarioConnect()->DeletedAt);
        $this->dtgUsuarioConnects->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Add Pagination (if desired)
		$this->dtgUsuarioConnects->Paginator = new QPaginator($this->dtgUsuarioConnects);
		$this->dtgUsuarioConnects->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgUsuarioConnects->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgUsuarioConnects->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgUsuarioConnects->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgUsuarioConnects->AddRowAction(new QClickEvent(), new QAjaxAction('dtgUsuarioConnectsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for usuario_connect's properties, or you
		// can traverse down QQN::usuario_connect() to display fields that are down the hierarchy)
		//$this->dtgUsuarioConnects->MetaAddColumn('Id');

		$colCodiClie = $this->dtgUsuarioConnects->MetaAddColumn(QQN::UsuarioConnect()->Cliente->CodigoInterno);
		$colCodiClie->Name = 'Codigo';

		$colNombClie = $this->dtgUsuarioConnects->MetaAddColumn(QQN::UsuarioConnect()->Cliente);
		$colNombClie->Width = 300;

		$this->dtgUsuarioConnects->MetaAddColumn('LogiUsua');

        $this->dtgUsuarioConnects->MetaAddColumn('Nombre');

        $colTeleUsua = $this->dtgUsuarioConnects->MetaAddColumn('Telefono');
		$colTeleUsua->Name = 'Teléfono';

		$this->dtgUsuarioConnects->MetaAddColumn(QQN::UsuarioConnect()->Sucursal);

		$this->dtgUsuarioConnects->MetaAddColumn(QQN::UsuarioConnect()->FechaAcceso);

        $this->btnExpoExce_Create();
    }

	public function dtgUsuarioConnectsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("usuario_connect_edit.php/$intId");
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// usuario_connect_list.tpl.php as the included HTML template file
UsuarioConnectListForm::Run('UsuarioConnectListForm');
?>