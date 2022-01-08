<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/UsuarioListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Usuario class.  It uses the code-generated
 * UsuarioDataGrid control which has meta-methods to help with
 * easily creating/defining Usuario columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both usuario_list.php AND
 * usuario_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class UsuarioListForm extends UsuarioListFormBase {
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
		$this->dtgUsuarios = new UsuarioDataGrid($this);
		$this->dtgUsuarios->FontSize = 13;
		$this->dtgUsuarios->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgUsuarios->CssClass = 'datagrid';
		$this->dtgUsuarios->AlternateRowStyle->CssClass = 'alternate';

		// Los registros "Borrados" no deben mostrarse
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::IsNull(QQN::Usuario()->DeleteAt);
        $this->dtgUsuarios->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Add Pagination (if desired)
		$this->dtgUsuarios->Paginator = new QPaginator($this->dtgUsuarios);
		$this->dtgUsuarios->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgUsuarios->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgUsuarios->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgUsuarios->RowActionParameterHtml = '<?= $_ITEM->CodiUsua ?>';
		$this->dtgUsuarios->AddRowAction(new QClickEvent(), new QAjaxAction('dtgUsuariosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for usuario's properties, or you
		// can traverse down QQN::usuario() to display fields that are down the hierarchy)
		$this->dtgUsuarios->MetaAddColumn('CodiUsua');
        $this->dtgUsuarios->MetaAddColumn('LogiUsua');
        $this->dtgUsuarios->MetaAddColumn('NombUsua');
        $this->dtgUsuarios->MetaAddColumn('ApelUsua');
        $this->dtgUsuarios->MetaAddColumn('MailUsua');
        $this->dtgUsuarios->MetaAddColumn(QQN::Usuario()->Grupo);
        $this->dtgUsuarios->MetaAddTypeColumn('CodiStat', 'StatusType');
		$colSucuUsua = $this->dtgUsuarios->MetaAddColumn(QQN::Usuario()->Sucursal->Iata);
		$colSucuUsua->Name = 'Suc.';
		$colTipoUsua = $this->dtgUsuarios->MetaAddTypeColumn('TipoUsua', 'TipoUsuaType');
        $colTipoUsua->Name = 'Tipo';
        $this->dtgUsuarios->MetaAddColumn('FechAcce');

        $this->btnExpoExce_Create();
        $this->btnExpoExce->Visible = true;

    }

	public function dtgUsuariosRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("usuario_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// usuario_list.tpl.php as the included HTML template file
UsuarioListForm::Run('UsuarioListForm');
?>
