<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TarifaExpListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the TarifaExp class.  It uses the code-generated
 * TarifaExpDataGrid control which has meta-methods to help with
 * easily creating/defining TarifaExp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_exp_list.php AND
 * tarifa_exp_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaExpListForm extends TarifaExpListFormBase {
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

		$this->lblTituForm->Text = 'Tarifa Exportacion';

		// Instantiate the Meta DataGrid
		$this->dtgTarifaExps = new TarifaExpDataGrid($this);
		$this->dtgTarifaExps->FontSize = 13;
		$this->dtgTarifaExps->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgTarifaExps->CssClass = 'datagrid';
		$this->dtgTarifaExps->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgTarifaExps->Paginator = new QPaginator($this->dtgTarifaExps);
		$this->dtgTarifaExps->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgTarifaExps->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgTarifaExps->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgTarifaExps->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgTarifaExps->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTarifaExpsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for tarifa_exp's properties, or you
		// can traverse down QQN::tarifa_exp() to display fields that are down the hierarchy)
		$this->dtgTarifaExps->MetaAddColumn('Id');
		$this->dtgTarifaExps->MetaAddColumn('Nombre');
		$this->dtgTarifaExps->MetaAddColumn(QQN::TarifaExp()->Producto);
		$this->dtgTarifaExps->MetaAddColumn('IsPublica', 'Name=Publica ?');
		$this->dtgTarifaExps->MetaAddColumn('Fecha');
//		$this->dtgTarifaExps->MetaAddColumn('Monto');
//		$this->dtgTarifaExps->MetaAddColumn('Minimo');
		$this->dtgTarifaExps->MetaAddColumn('CreatedAt', 'Name=F.Creacion');
		$this->dtgTarifaExps->MetaAddColumn('UpdatedAt', 'Name=F.Modif');

		$colCreaPorx = new QDataGridColumn('CREAD@ POR', '<?= $_ITEM->CreatedByObject->__toString() ?>');
		$this->dtgTarifaExps->AddColumn($colCreaPorx);
		/*$colUpdaPorx = new QDataGridColumn('MODIF. POR', '<?= $_ITEM->UpdatedByObject->__toString() ?>');*/
		//$this->dtgTarifaExps->AddColumn($colUpdaPorx);

        $this->btnExpoExce_Create();

    }

	public function dtgTarifaExpsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("tarifa_exp_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// tarifa_exp_list.tpl.php as the included HTML template file
TarifaExpListForm::Run('TarifaExpListForm');
?>
