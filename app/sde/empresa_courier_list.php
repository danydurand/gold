<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/EmpresaCourierListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the EmpresaCourier class.  It uses the code-generated
 * EmpresaCourierDataGrid control which has meta-methods to help with
 * easily creating/defining EmpresaCourier columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both empresa_courier_list.php AND
 * empresa_courier_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class EmpresaCourierListForm extends EmpresaCourierListFormBase {
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
		$this->lblTituForm->Text = 'Empresas Courier';

		// Instantiate the Meta DataGrid
		$this->dtgEmpresaCouriers = new EmpresaCourierDataGrid($this);
		$this->dtgEmpresaCouriers->FontSize = 13;
		$this->dtgEmpresaCouriers->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgEmpresaCouriers->CssClass = 'datagrid';
		$this->dtgEmpresaCouriers->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgEmpresaCouriers->Paginator = new QPaginator($this->dtgEmpresaCouriers);
		$this->dtgEmpresaCouriers->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgEmpresaCouriers->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgEmpresaCouriers->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgEmpresaCouriers->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgEmpresaCouriers->AddRowAction(new QClickEvent(), new QAjaxAction('dtgEmpresaCouriersRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for empresa_courier's properties, or you
		// can traverse down QQN::empresa_courier() to display fields that are down the hierarchy)
		$this->dtgEmpresaCouriers->MetaAddColumn('Id');
		$this->dtgEmpresaCouriers->MetaAddColumn('Nombre');
		$this->dtgEmpresaCouriers->MetaAddColumn('CantidadCaracteres');

        $this->btnExpoExce_Create();
    }

	public function dtgEmpresaCouriersRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("empresa_courier_edit.php/$intId");
	}		
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// empresa_courier_list.tpl.php as the included HTML template file
EmpresaCourierListForm::Run('EmpresaCourierListForm');
?>