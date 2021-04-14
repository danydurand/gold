<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SdeOperacionListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the SdeOperacion class.  It uses the code-generated
 * SdeOperacionDataGrid control which has meta-methods to help with
 * easily creating/defining SdeOperacion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sde_operacion_list.php AND
 * sde_operacion_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SdeOperacionListForm extends SdeOperacionListFormBase {
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
        $this->lblTituForm->Text  = 'Operaciones';

		// Instantiate the Meta DataGrid
		$this->dtgSdeOperacions = new SdeOperacionDataGrid($this);
		$this->dtgSdeOperacions->FontSize = 13;
		$this->dtgSdeOperacions->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgSdeOperacions->CssClass = 'datagrid';
		$this->dtgSdeOperacions->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgSdeOperacions->Paginator = new QPaginator($this->dtgSdeOperacions);
		$this->dtgSdeOperacions->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgSdeOperacions->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgSdeOperacions->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Las operaciones que hayan sido eliminadas (soft-delete) se excluyen de la lista
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNull(QQN::SdeOperacion()->DeletedAt);
        $this->dtgSdeOperacions->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgSdeOperacions->RowActionParameterHtml = '<?= $_ITEM->CodiOper ?>';
		$this->dtgSdeOperacions->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSdeOperacionsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for sde_operacion's properties, or you
		// can traverse down QQN::sde_operacion() to display fields that are down the hierarchy)
		// $colCodiOper = $this->dtgSdeOperacions->MetaAddColumn('CodiOper');
		// $colCodiOper->Name = 'Id';

		$colCodiRuta = $this->dtgSdeOperacions->MetaAddColumn(QQN::SdeOperacion()->Ruta);
		//$colCodiRuta->Name = 'Ruta';

		$colCodiChof = $this->dtgSdeOperacions->MetaAddColumn(QQN::SdeOperacion()->CodiChofObject);
		$colCodiChof->Name = 'Chofer';

		$colCodiVehi = $this->dtgSdeOperacions->MetaAddColumn(QQN::SdeOperacion()->CodiVehiObject->DescVehi);
		$colCodiVehi->Name = 'Vehiculo';

		$colCodiEsta = $this->dtgSdeOperacions->MetaAddColumn(QQN::SdeOperacion()->Sucursal);
		$colCodiEsta->Name = 'Estación';

		$colCodiTipo = $this->dtgSdeOperacions->MetaAddColumn(QQN::SdeOperacion()->CodiTipoObject->DescTipo);
		$colCodiTipo->Name = 'Tipo';

		$colExprSino = $this->dtgSdeOperacions->MetaAddTypeColumn('ExpresoNacional', 'SinoType');
		$colExprSino->Name = 'Retail';

        $this->btnExpoExce_Create();
    }

	public function dtgSdeOperacionsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("sde_operacion_edit.php/$intId");
	}		
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// sde_operacion_list.tpl.php as the included HTML template file
SdeOperacionListForm::Run('SdeOperacionListForm');
?>