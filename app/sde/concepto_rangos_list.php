<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ConceptoRangosListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the ConceptoRangos class.  It uses the code-generated
 * ConceptoRangosDataGrid control which has meta-methods to help with
 * easily creating/defining ConceptoRangos columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both concepto_rangos_list.php AND
 * concepto_rangos_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ConceptoRangosListForm extends ConceptoRangosListFormBase {
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
		$this->dtgConceptoRangoses = new ConceptoRangosDataGrid($this);
		$this->dtgConceptoRangoses->FontSize = 13;
		$this->dtgConceptoRangoses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgConceptoRangoses->CssClass = 'datagrid';
		$this->dtgConceptoRangoses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgConceptoRangoses->Paginator = new QPaginator($this->dtgConceptoRangoses);
		$this->dtgConceptoRangoses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgConceptoRangoses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgConceptoRangoses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgConceptoRangoses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgConceptoRangoses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgConceptoRangosesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for concepto_rangos's properties, or you
		// can traverse down QQN::concepto_rangos() to display fields that are down the hierarchy)
		$this->dtgConceptoRangoses->MetaAddColumn('Id');
		$this->dtgConceptoRangoses->MetaAddColumn(QQN::ConceptoRangos()->Concepto);
		$this->dtgConceptoRangoses->MetaAddColumn('RangoInicial');
		$this->dtgConceptoRangoses->MetaAddColumn('RangoFinal');
		$this->dtgConceptoRangoses->MetaAddColumn('Valor');
		$this->dtgConceptoRangoses->MetaAddColumn('CreatedAt');
		$this->dtgConceptoRangoses->MetaAddColumn('UpdatedAt');
		$this->dtgConceptoRangoses->MetaAddColumn('DeletedAt');
		$this->dtgConceptoRangoses->MetaAddColumn('CreatedBy');
		$this->dtgConceptoRangoses->MetaAddColumn('UpdatedBy');
		$this->dtgConceptoRangoses->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgConceptoRangosesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("concepto_rangos_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// concepto_rangos_list.tpl.php as the included HTML template file
ConceptoRangosListForm::Run('ConceptoRangosListForm');
?>
