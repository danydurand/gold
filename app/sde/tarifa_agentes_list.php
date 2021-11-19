<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TarifaAgentesListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the TarifaAgentes class.  It uses the code-generated
 * TarifaAgentesDataGrid control which has meta-methods to help with
 * easily creating/defining TarifaAgentes columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_agentes_list.php AND
 * tarifa_agentes_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaAgentesListForm extends TarifaAgentesListFormBase {
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

        $this->lblTituForm->Text = 'Tarifas Agente';

		// Instantiate the Meta DataGrid
		$this->dtgTarifaAgenteses = new TarifaAgentesDataGrid($this);
		$this->dtgTarifaAgenteses->FontSize = 13;
		$this->dtgTarifaAgenteses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgTarifaAgenteses->CssClass = 'datagrid';
		$this->dtgTarifaAgenteses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgTarifaAgenteses->Paginator = new QPaginator($this->dtgTarifaAgenteses);
		$this->dtgTarifaAgenteses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgTarifaAgenteses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgTarifaAgenteses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgTarifaAgenteses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgTarifaAgenteses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTarifaAgentesesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for tarifa_agentes's properties, or you
		// can traverse down QQN::tarifa_agentes() to display fields that are down the hierarchy)
		$this->dtgTarifaAgenteses->MetaAddColumn('Id');
		$this->dtgTarifaAgenteses->MetaAddColumn('Nombre');
		$this->dtgTarifaAgenteses->MetaAddColumn('EsPublica');
		//$this->dtgTarifaAgenteses->MetaAddColumn('Fecha');

        $colFechTari = new QDataGridColumn('Fecha','<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>');
        $this->dtgTarifaAgenteses->AddColumn($colFechTari);

        //$this->dtgTarifaAgenteses->MetaAddColumn('CreatedAt');
		//$this->dtgTarifaAgenteses->MetaAddColumn('UpdatedAt');
		//$this->dtgTarifaAgenteses->MetaAddColumn('DeletedAt');
		$this->dtgTarifaAgenteses->MetaAddColumn('CreatedBy');
		$this->dtgTarifaAgenteses->MetaAddColumn('UpdatedBy');
		//$this->dtgTarifaAgenteses->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgTarifaAgentesesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("tarifa_agentes_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// tarifa_agentes_list.tpl.php as the included HTML template file
TarifaAgentesListForm::Run('TarifaAgentesListForm');
?>
