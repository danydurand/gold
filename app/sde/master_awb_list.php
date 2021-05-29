<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/MasterAwbListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the MasterAwb class.  It uses the code-generated
 * MasterAwbDataGrid control which has meta-methods to help with
 * easily creating/defining MasterAwb columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both master_awb_list.php AND
 * master_awb_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class MasterAwbListForm extends MasterAwbListFormBase {
	protected $btnCargMasi;

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

        $this->lblTituForm->Text = 'MasterAwbs';

        // Instantiate the Meta DataGrid
		$this->dtgMasterAwbs = new MasterAwbDataGrid($this);
		$this->dtgMasterAwbs->FontSize = 13;
		$this->dtgMasterAwbs->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgMasterAwbs->CssClass = 'datagrid';
		$this->dtgMasterAwbs->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgMasterAwbs->Paginator = new QPaginator($this->dtgMasterAwbs);
		$this->dtgMasterAwbs->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgMasterAwbs->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgMasterAwbs->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgMasterAwbs->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgMasterAwbs->AddRowAction(new QClickEvent(), new QAjaxAction('dtgMasterAwbsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for master_awb's properties, or you
		// can traverse down QQN::master_awb() to display fields that are down the hierarchy)
		$this->dtgMasterAwbs->MetaAddColumn('Id');
		$this->dtgMasterAwbs->MetaAddColumn(QQN::MasterAwb()->LineaAerea);
		$this->dtgMasterAwbs->MetaAddColumn('Numero');
		$this->dtgMasterAwbs->MetaAddColumn('Usada');
		$this->dtgMasterAwbs->MetaAddColumn('ProcesoId');
		//$this->dtgMasterAwbs->MetaAddColumn('CreatedAt');
		//$this->dtgMasterAwbs->MetaAddColumn('UpdatedAt');
		$this->dtgMasterAwbs->MetaAddColumn('CreatedBy');
		$this->dtgMasterAwbs->MetaAddColumn('UpdatedBy');

        $this->btnExpoExce_Create();
        $this->btnCargMasi_Create();

    }

    protected function btnCargMasi_Create() {
        $this->btnCargMasi = new QButtonP($this);
        $this->btnCargMasi->Text = TextoIcono('upload', 'Carga Masiva', 'F', 'lg');
        $this->btnCargMasi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnCargMasi->AddAction(new QClickEvent(), new QAjaxAction('btnCargMasi_Click'));
    }

    protected function btnCargMasi_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__SIST__."/carga_masiva_master_awb.php");
	}

    public function dtgMasterAwbsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("master_awb_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// master_awb_list.tpl.php as the included HTML template file
MasterAwbListForm::Run('MasterAwbListForm');
?>
