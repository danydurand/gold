<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ManifiestoExpListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the ManifiestoExp class.  It uses the code-generated
 * ManifiestoExpDataGrid control which has meta-methods to help with
 * easily creating/defining ManifiestoExp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both manifiesto_exp_list.php AND
 * manifiesto_exp_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ManifiestoExpListForm extends ManifiestoExpListFormBase {
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
		$this->dtgManifiestoExps = new ManifiestoExpDataGrid($this);
		$this->dtgManifiestoExps->FontSize = 13;
		$this->dtgManifiestoExps->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgManifiestoExps->CssClass = 'datagrid';
		$this->dtgManifiestoExps->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgManifiestoExps->Paginator = new QPaginator($this->dtgManifiestoExps);
		$this->dtgManifiestoExps->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgManifiestoExps->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgManifiestoExps->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgManifiestoExps->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgManifiestoExps->AddRowAction(new QClickEvent(), new QAjaxAction('dtgManifiestoExpsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for manifiesto_exp's properties, or you
		// can traverse down QQN::manifiesto_exp() to display fields that are down the hierarchy)
		$this->dtgManifiestoExps->MetaAddColumn('Id');
		$this->dtgManifiestoExps->MetaAddColumn(QQN::ManifiestoExp()->Destino);
		$this->dtgManifiestoExps->MetaAddColumn(QQN::ManifiestoExp()->LineaAerea);
		$this->dtgManifiestoExps->MetaAddColumn(QQN::ManifiestoExp()->MasterAwb);
		$this->dtgManifiestoExps->MetaAddColumn('FechaCreacion');
		$this->dtgManifiestoExps->MetaAddColumn('FechaDespacho');
		$this->dtgManifiestoExps->MetaAddColumn('Vuelo');
		$this->dtgManifiestoExps->MetaAddColumn('Piezas');
		$this->dtgManifiestoExps->MetaAddColumn('Libras');
		$this->dtgManifiestoExps->MetaAddColumn('Volumen');
		$this->dtgManifiestoExps->MetaAddColumn('Valor');
		//$this->dtgManifiestoExps->MetaAddColumn('CreatedAt');
		//$this->dtgManifiestoExps->MetaAddColumn('UpdatedAt');
		//$this->dtgManifiestoExps->MetaAddColumn('CreatedBy');
		//$this->dtgManifiestoExps->MetaAddColumn('UpdatedBy');

        $this->btnExpoExce_Create();

    }

	public function dtgManifiestoExpsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("manifiesto_exp_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// manifiesto_exp_list.tpl.php as the included HTML template file
ManifiestoExpListForm::Run('ManifiestoExpListForm');
?>
