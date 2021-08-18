<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ConceptosListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Conceptos class.  It uses the code-generated
 * ConceptosDataGrid control which has meta-methods to help with
 * easily creating/defining Conceptos columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both conceptos_list.php AND
 * conceptos_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ConceptosListForm extends ConceptosListFormBase {
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

		$this->lblTituForm->Text = 'Conceptos';

		// Instantiate the Meta DataGrid
		$this->dtgConceptoses = new ConceptosDataGrid($this);
		$this->dtgConceptoses->FontSize = 13;
		$this->dtgConceptoses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgConceptoses->CssClass = 'datagrid';
		$this->dtgConceptoses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgConceptoses->Paginator = new QPaginator($this->dtgConceptoses);
		$this->dtgConceptoses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgConceptoses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgConceptoses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgConceptoses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgConceptoses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgConceptosesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for conceptos's properties, or you
		// can traverse down QQN::conceptos() to display fields that are down the hierarchy)
		$colIdxxConc = $this->dtgConceptoses->MetaAddColumn('Id');
		$colIdxxConc->FilterBoxSize = 1;
		$this->dtgConceptoses->MetaAddColumn('Nombre');
		$colOrdeConc = $this->dtgConceptoses->MetaAddColumn('Orden');
		$colOrdeConc->FilterBoxSize = 1;
		$colProdConc = $this->dtgConceptoses->MetaAddColumn('Productos');
		$colProdConc->FilterBoxSize = 4;
		$colMostComo = $this->dtgConceptoses->MetaAddColumn('MostrarComo');
		$colMostComo->FilterBoxSize = 4;
		$this->dtgConceptoses->MetaAddColumn('Activo');
		$this->dtgConceptoses->MetaAddColumn('FechaInicial','Name=F.Inic');
		$this->dtgConceptoses->MetaAddColumn('FechaFinal','Name=F.Final');
		$colOperConc = $this->dtgConceptoses->MetaAddColumn('Operacion');
		$colOperConc->FilterBoxSize = 4;
		$colApliComo = $this->dtgConceptoses->MetaAddColumn('AplicaComo');
		$colApliComo->FilterBoxSize = 4;
		$this->dtgConceptoses->MetaAddColumn('Tipo');
		$this->dtgConceptoses->MetaAddColumn('ActuaSobre');
		$this->dtgConceptoses->MetaAddColumn('Valor');
		$this->dtgConceptoses->MetaAddColumn('BaseImponible','Name=B.Imp');
		$this->dtgConceptoses->MetaAddColumn('Metodo');

        $this->btnExpoExce_Create();

    }

	public function dtgConceptosesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("conceptos_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// conceptos_list.tpl.php as the included HTML template file
ConceptosListForm::Run('ConceptosListForm');
?>
