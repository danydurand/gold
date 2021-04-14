<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacVendedorListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the FacVendedor class.  It uses the code-generated
 * FacVendedorDataGrid control which has meta-methods to help with
 * easily creating/defining FacVendedor columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both fac_vendedor_list.php AND
 * fac_vendedor_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacVendedorListForm extends FacVendedorListFormBase {
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

        $this->lblTituForm->Text = 'Vendedores';

		// Instantiate the Meta DataGrid
		$this->dtgFacVendedors = new FacVendedorDataGrid($this);
		$this->dtgFacVendedors->FontSize = 13;
		$this->dtgFacVendedors->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgFacVendedors->CssClass = 'datagrid';
		$this->dtgFacVendedors->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgFacVendedors->Paginator = new QPaginator($this->dtgFacVendedors);
		$this->dtgFacVendedors->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgFacVendedors->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgFacVendedors->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgFacVendedors->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgFacVendedors->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFacVendedorsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for fac_vendedor's properties, or you
		// can traverse down QQN::fac_vendedor() to display fields that are down the hierarchy)
		$this->dtgFacVendedors->MetaAddColumn('Id');
		$this->dtgFacVendedors->MetaAddColumn('Nombre');

		$colCeduVend = $this->dtgFacVendedors->MetaAddColumn('Cedula');
		$colCeduVend->Name = 'CÉDULA';

		$colDireMail = $this->dtgFacVendedors->MetaAddColumn('DireccionEmail');
		$colDireMail->Name = 'Correo Electrónico';

		$colPorcComi = $this->dtgFacVendedors->MetaAddColumn('PorcentajeComision');
		$colPorcComi->Name = 'COMISIÓN(%)';

		$colFechRegi = $this->dtgFacVendedors->MetaAddColumn('FechaRegistro');
		$colFechRegi->Name = 'FECHA REG.';

		//$colPaisVend = $this->dtgFacVendedors->MetaAddColumn(QQN::FacVendedor()->Pais);
		//$colPaisVend->Name = 'PAÍS';

		$this->dtgFacVendedors->MetaAddTypeColumn('StatusId', 'StatusType');

        $this->btnExpoExce_Create();
    }

	public function dtgFacVendedorsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("fac_vendedor_edit.php/$intId");
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// fac_vendedor_list.tpl.php as the included HTML template file
FacVendedorListForm::Run('FacVendedorListForm');
?>