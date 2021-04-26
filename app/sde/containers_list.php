<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ContainersListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Containers class.  It uses the code-generated
 * ContainersDataGrid control which has meta-methods to help with
 * easily creating/defining Containers columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both containers_list.php AND
 * containers_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ContainersListForm extends ContainersListFormBase {
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

		$this->lblTituForm->Text = 'Masters';

		// Instantiate the Meta DataGrid
		$this->dtgContainerses = new ContainersDataGrid($this);
		$this->dtgContainerses->FontSize = 13;
		$this->dtgContainerses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgContainerses->CssClass = 'datagrid';
		$this->dtgContainerses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgContainerses->Paginator = new QPaginator($this->dtgContainerses);
		$this->dtgContainerses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Containers()->Tipo,'MASTER');
		$this->dtgContainerses->AdditionalConditions = QQ::AndCondition($objClauWher);
		// Higlight the datagrid rows when mousing over them
		$this->dtgContainerses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgContainerses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgContainerses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgContainerses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgContainersesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for containers's properties, or you
		// can traverse down QQN::containers() to display fields that are down the hierarchy)
		$this->dtgContainerses->MetaAddColumn('Id');
		$this->dtgContainerses->MetaAddColumn('Numero');
        $colCantPiez = new QDataGridColumn('Piezas', '<?= $_FORM->CantPiez_ColumnRender($_ITEM) ?>');
        $colCantPiez->HtmlEntities = false;
        $colCantPiez->Width        = 10;
        $this->dtgContainerses->AddColumn($colCantPiez);

        $this->dtgContainerses->MetaAddColumn(QQN::Containers()->Operacion);
		$this->dtgContainerses->MetaAddColumn('Fecha');
		$this->dtgContainerses->MetaAddColumn('Hora');
		$this->dtgContainerses->MetaAddColumn('Estatus');
		//$this->dtgContainerses->MetaAddColumn('CreatedAt');
		//$this->dtgContainerses->MetaAddColumn('UpdatedAt');
		//$this->dtgContainerses->MetaAddColumn('DeletedAt');
		//$this->dtgContainerses->MetaAddColumn('CreatedBy');
		//$this->dtgContainerses->MetaAddColumn('UpdatedBy');
		//$this->dtgContainerses->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

    public function btnNuevRegi_Click() {
        QApplication::Redirect("sacar_a_ruta.php");
    }

    public function CantPiez_ColumnRender(Containers $objValija) {
        return $objValija->CountGuiaPiezasesAsContainerPieza();
    }

    public function dtgContainersesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("sacar_a_ruta.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// containers_list.tpl.php as the included HTML template file
ContainersListForm::Run('ContainersListForm');
?>
