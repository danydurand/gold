<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FormaPagoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the FormaPago class.  It uses the code-generated
 * FormaPagoDataGrid control which has meta-methods to help with
 * easily creating/defining FormaPago columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both forma_pago_list.php AND
 * forma_pago_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FormaPagoListForm extends FormaPagoListFormBase {
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
		$this->dtgFormaPagos = new FormaPagoDataGrid($this);
		$this->dtgFormaPagos->FontSize = 13;
		$this->dtgFormaPagos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgFormaPagos->CssClass = 'datagrid';
		$this->dtgFormaPagos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgFormaPagos->Paginator = new QPaginator($this->dtgFormaPagos);
		$this->dtgFormaPagos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgFormaPagos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgFormaPagos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgFormaPagos->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgFormaPagos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFormaPagosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for forma_pago's properties, or you
		// can traverse down QQN::forma_pago() to display fields that are down the hierarchy)
		$this->dtgFormaPagos->MetaAddColumn('Id');
		$this->dtgFormaPagos->MetaAddColumn('Descripcion');
		$this->dtgFormaPagos->MetaAddTypeColumn('StatusId', 'StatusType');
		$this->dtgFormaPagos->MetaAddTypeColumn('RequiereDocumento', 'SinoType');
		$this->dtgFormaPagos->MetaAddColumn('TextoDocumento');
		$this->dtgFormaPagos->MetaAddTypeColumn('RequiereCuenta', 'SinoType');
		$this->dtgFormaPagos->MetaAddColumn('Abreviado');
		$this->dtgFormaPagos->MetaAddColumn('ParaPagoEn');
		//$this->dtgFormaPagos->MetaAddColumn('CreatedAt');
		//$this->dtgFormaPagos->MetaAddColumn('UpdatedAt');
		//$this->dtgFormaPagos->MetaAddColumn('DeletedAt');
		//$this->dtgFormaPagos->MetaAddColumn('CreatedBy');
		//$this->dtgFormaPagos->MetaAddColumn('UpdatedBy');
		//$this->dtgFormaPagos->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgFormaPagosRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("forma_pago_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// forma_pago_list.tpl.php as the included HTML template file
FormaPagoListForm::Run('FormaPagoListForm');
?>
