<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TarifaAgentesZonasListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the TarifaAgentesZonas class.  It uses the code-generated
 * TarifaAgentesZonasDataGrid control which has meta-methods to help with
 * easily creating/defining TarifaAgentesZonas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_agentes_zonas_list.php AND
 * tarifa_agentes_zonas_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaAgentesZonasListForm extends TarifaAgentesZonasListFormBase {
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
		$this->dtgTarifaAgentesZonases = new TarifaAgentesZonasDataGrid($this);
		$this->dtgTarifaAgentesZonases->FontSize = 13;
		$this->dtgTarifaAgentesZonases->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgTarifaAgentesZonases->CssClass = 'datagrid';
		$this->dtgTarifaAgentesZonases->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgTarifaAgentesZonases->Paginator = new QPaginator($this->dtgTarifaAgentesZonases);
		$this->dtgTarifaAgentesZonases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgTarifaAgentesZonases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgTarifaAgentesZonases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgTarifaAgentesZonases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgTarifaAgentesZonases->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTarifaAgentesZonasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for tarifa_agentes_zonas's properties, or you
		// can traverse down QQN::tarifa_agentes_zonas() to display fields that are down the hierarchy)
		$this->dtgTarifaAgentesZonases->MetaAddColumn('Id');
		$this->dtgTarifaAgentesZonases->MetaAddColumn(QQN::TarifaAgentesZonas()->Tarifa);
		$this->dtgTarifaAgentesZonases->MetaAddColumn('Zona');
		$this->dtgTarifaAgentesZonases->MetaAddColumn('Servicio');
		$this->dtgTarifaAgentesZonases->MetaAddColumn('Precio');
		$this->dtgTarifaAgentesZonases->MetaAddColumn('CreatedAt');
		$this->dtgTarifaAgentesZonases->MetaAddColumn('UpdatedAt');
		$this->dtgTarifaAgentesZonases->MetaAddColumn('DeletedAt');
		$this->dtgTarifaAgentesZonases->MetaAddColumn('CreatedBy');
		$this->dtgTarifaAgentesZonases->MetaAddColumn('UpdatedBy');
		$this->dtgTarifaAgentesZonases->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgTarifaAgentesZonasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("tarifa_agentes_zonas_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// tarifa_agentes_zonas_list.tpl.php as the included HTML template file
TarifaAgentesZonasListForm::Run('TarifaAgentesZonasListForm');
?>
