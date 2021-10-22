<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/AliadoComercialListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the AliadoComercial class.  It uses the code-generated
 * AliadoComercialDataGrid control which has meta-methods to help with
 * easily creating/defining AliadoComercial columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both aliado_comercial_list.php AND
 * aliado_comercial_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class AliadoComercialListForm extends AliadoComercialListFormBase {
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

		$this->lblTituForm->Text = 'Aliados';

		// Instantiate the Meta DataGrid
		$this->dtgAliadoComercials = new AliadoComercialDataGrid($this);
		$this->dtgAliadoComercials->FontSize = 12.5;
		$this->dtgAliadoComercials->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgAliadoComercials->CssClass = 'datagrid';
		$this->dtgAliadoComercials->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgAliadoComercials->Paginator = new QPaginator($this->dtgAliadoComercials);
		$this->dtgAliadoComercials->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgAliadoComercials->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgAliadoComercials->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgAliadoComercials->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgAliadoComercials->AddRowAction(new QClickEvent(), new QAjaxAction('dtgAliadoComercialsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for aliado_comercial's properties, or you
		// can traverse down QQN::aliado_comercial() to display fields that are down the hierarchy)
		$colIdxxRegi = $this->dtgAliadoComercials->MetaAddColumn('Id');
		$colIdxxRegi->FilterBoxSize = 1;
		$colRazoSoci = $this->dtgAliadoComercials->MetaAddColumn('RazonSocial');
		$colRazoSoci->FilterBoxSize = 15;
		$this->dtgAliadoComercials->MetaAddColumn('NroRif');
		$colDireFisc = $this->dtgAliadoComercials->MetaAddColumn('DireccionFiscal');
		$colDireFisc->FilterBoxSize = 30;
		$colNombCont = $this->dtgAliadoComercials->MetaAddColumn('Contacto');
		$colNombCont->FilterBoxSize = 12;
		//$this->dtgAliadoComercials->MetaAddColumn('Telefono');
		//$this->dtgAliadoComercials->MetaAddColumn('Email');
		$this->dtgAliadoComercials->MetaAddTypeColumn('StatusId', 'StatusType');
		$this->dtgAliadoComercials->MetaAddColumn(QQN::AliadoComercial()->Sucursal);

        $this->btnExpoExce_Create();

    }

	public function dtgAliadoComercialsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("aliado_comercial_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// aliado_comercial_list.tpl.php as the included HTML template file
AliadoComercialListForm::Run('AliadoComercialListForm');
?>
