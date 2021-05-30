<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacturasListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Facturas class.  It uses the code-generated
 * FacturasDataGrid control which has meta-methods to help with
 * easily creating/defining Facturas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both facturas_list.php AND
 * facturas_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacturasListForm extends FacturasListFormBase {

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

	protected function Form_Create() {
        /* @var $objUsuario Usuario */

		parent::Form_Create();

		$this->lblTituForm->Text = 'Facturas';
		$objUsuario = unserialize($_SESSION['User']);

		// Instantiate the Meta DataGrid
		$this->dtgFacturases = new FacturasDataGrid($this);
		$this->dtgFacturases->FontSize = 13;
		$this->dtgFacturases->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgFacturases->CssClass = 'datagrid';
		$this->dtgFacturases->AlternateRowStyle->CssClass = 'alternate';

		// Solo Facturas Retail creada por el Usuario
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::IsNotNull(QQN::Facturas()->ClienteRetailId);
		$objClauWher[] = QQ::Equal(QQN::Facturas()->CreatedBy,$objUsuario->CodiUsua);
		$this->dtgFacturases->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Ordenadas de manera descendente
		$this->dtgFacturases->SortColumnIndex = 0;
		$this->dtgFacturases->SortDirection = 1;

		// Add Pagination (if desired)
		$this->dtgFacturases->Paginator = new QPaginator($this->dtgFacturases);
		$this->dtgFacturases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgFacturases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgFacturases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgFacturases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgFacturases->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFacturasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for facturas's properties, or you
		// can traverse down QQN::facturas() to display fields that are down the hierarchy)
		$this->dtgFacturases->MetaAddColumn('Id');
		$this->dtgFacturases->MetaAddColumn(QQN::Facturas()->ClienteRetail);
		//$this->dtgFacturases->MetaAddColumn(QQN::Facturas()->ClienteCorp);
		$this->dtgFacturases->MetaAddColumn('Fecha');
		$this->dtgFacturases->MetaAddColumn('CedulaRif');
		$this->dtgFacturases->MetaAddColumn('RazonSocial');
		//$this->dtgFacturases->MetaAddColumn('DireccionFiscal');
		//$this->dtgFacturases->MetaAddColumn('Telefono');
		$this->dtgFacturases->MetaAddColumn(QQN::Facturas()->Sucursal);
		$this->dtgFacturases->MetaAddColumn(QQN::Facturas()->Receptoria);
		//$this->dtgFacturases->MetaAddColumn(QQN::Facturas()->Caja);
		$this->dtgFacturases->MetaAddColumn('Estatus');
		//$this->dtgFacturases->MetaAddColumn('Tasa');
		$this->dtgFacturases->MetaAddColumn('Total');
		//$this->dtgFacturases->MetaAddColumn('MontoDscto');
		//$this->dtgFacturases->MetaAddColumn('MontoCobrado');
		//$this->dtgFacturases->MetaAddColumn('MontoPendiente');
		$this->dtgFacturases->MetaAddColumn('EstatusPago');
		$this->dtgFacturases->MetaAddColumn('Referencia');
		//$this->dtgFacturases->MetaAddColumn('Numero');
		//$this->dtgFacturases->MetaAddColumn('MaquinaFiscal');
		//$this->dtgFacturases->MetaAddColumn('FechaImpresion');
		//$this->dtgFacturases->MetaAddColumn('HoraImpresion');
		//$this->dtgFacturases->MetaAddColumn('TieneRetencion');
		//$this->dtgFacturases->MetaAddColumn('NotaCreditoId');
		//$this->dtgFacturases->MetaAddColumn('CreatedAt');
		//$this->dtgFacturases->MetaAddColumn('UpdatedAt');
		//$this->dtgFacturases->MetaAddColumn('DeletedAt');
		//$this->dtgFacturases->MetaAddColumn('CreatedBy');
		//$this->dtgFacturases->MetaAddColumn('UpdatedBy');
		//$this->dtgFacturases->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();
        $this->btnExpoExce->Visible = true;

    }

	public function dtgFacturasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("facturas_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// facturas_list.tpl.php as the included HTML template file
FacturasListForm::Run('FacturasListForm');
?>
