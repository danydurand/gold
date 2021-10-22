<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ScanneoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Scanneo class.  It uses the code-generated
 * ScanneoDataGrid control which has meta-methods to help with
 * easily creating/defining Scanneo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both scanneo_list.php AND
 * scanneo_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ScanneoListForm extends ScanneoListFormBase {
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
		$this->dtgScanneos = new ScanneoDataGrid($this);
		$this->dtgScanneos->FontSize = 13;
		$this->dtgScanneos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgScanneos->CssClass = 'datagrid';
		$this->dtgScanneos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgScanneos->Paginator = new QPaginator($this->dtgScanneos);
		$this->dtgScanneos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgScanneos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgScanneos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgScanneos->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgScanneos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgScanneosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for scanneo's properties, or you
		// can traverse down QQN::scanneo() to display fields that are down the hierarchy)
		$this->dtgScanneos->MetaAddColumn('Id');
		$this->dtgScanneos->MetaAddColumn('Descripcion');
		$colCantSobr = new QDataGridColumn('SOBRANTES','<?= $_FORM->Sobrantes($_ITEM) ?>');
		$this->dtgScanneos->AddColumn($colCantSobr);
		$this->dtgScanneos->MetaAddColumn('CreatedAt','Name=F.Creacion');
		$this->dtgScanneos->MetaAddColumn(QQN::Scanneo()->CreatedByObject,'Name=Creado Por');
		$this->dtgScanneos->MetaAddColumn('UpdatedAt','Name=F.Edicion');
		$this->dtgScanneos->MetaAddColumn(QQN::Scanneo()->UpdatedByObject,'Name=Editado Por');

        $this->btnExpoExce_Create();

    }

    public function Sobrantes(Scanneo $objScaneo) {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::ScanneoPiezas()->ScanneoId,$objScaneo->Id);
        $objClauWher[] = QQ::IsNull(QQN::ScanneoPiezas()->GuiaPiezaId);

        return ScanneoPiezas::QueryCount(QQ::AndCondition($objClauWher));

    }

	public function dtgScanneosRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("scanneo_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// scanneo_list.tpl.php as the included HTML template file
ScanneoListForm::Run('ScanneoListForm');
?>
