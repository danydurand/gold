<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacturaPmnListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the FacturaPmn class.  It uses the code-generated
 * FacturaPmnDataGrid control which has meta-methods to help with
 * easily creating/defining FacturaPmn columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both factura_pmn_list.php AND
 * factura_pmn_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacturaPmnListForm extends FacturaPmnListFormBase {
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

		$this->lblTituForm->Text = 'Facturas';

		// Instantiate the Meta DataGrid
		$this->dtgFacturaPmns = new FacturaPmnDataGrid($this);
		$this->dtgFacturaPmns->FontSize = 13;
		$this->dtgFacturaPmns->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgFacturaPmns->CssClass = 'datagrid';
		$this->dtgFacturaPmns->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgFacturaPmns->Paginator = new QPaginator($this->dtgFacturaPmns);
		$this->dtgFacturaPmns->ItemsPerPage = 20;

		// Higlight the datagrid rows when mousing over them
		$this->dtgFacturaPmns->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgFacturaPmns->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgFacturaPmns->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgFacturaPmns->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFacturaPmnsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for factura_pmn's properties, or you
		// can traverse down QQN::factura_pmn() to display fields that are down the hierarchy)
		$colIdxxFact = $this->dtgFacturaPmns->MetaAddColumn('Id');
		$colIdxxFact->FilterType = '';

		$colNumeCedu = $this->dtgFacturaPmns->MetaAddColumn('CedulaRif');
		$colNumeCedu->FilterBoxSize = 4;

		$this->dtgFacturaPmns->MetaAddColumn('RazonSocial');

		$colNumeFact = $this->dtgFacturaPmns->MetaAddColumn('Numero');
		$colNumeFact->FilterBoxSize = 3;

		$colMontTota = $this->dtgFacturaPmns->MetaAddColumn('MontoTotal');
		$colMontTota->FilterType = '';

		$colCreaPorx = $this->dtgFacturaPmns->MetaAddColumn(QQN::FacturaPmn()->CreadaPorObject);
		$colCreaPorx->Name = "Crda Por";
		$colCreaPorx->FilterType = '';

		$colFechCrea = $this->dtgFacturaPmns->MetaAddColumn('CreadaEl');
		$colFechCrea->FilterType = '';

		$colEstaFact = $this->dtgFacturaPmns->MetaAddColumn('Estatus');
		$colEstaFact->FilterBoxSize = 1;

		$this->dtgFacturaPmns->MetaAddTypeColumn('ImpresaId', 'SinoType');

        $this->btnExpoExce_Create();

		$this->btnNuevRegi->Visible = false;
    }

	public function dtgFacturaPmnsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("crear_factura.php?intNumeFact=$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// factura_pmn_list.tpl.php as the included HTML template file
FacturaPmnListForm::Run('FacturaPmnListForm');
?>
