<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ChoferListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Chofer class.  It uses the code-generated
 * ChoferDataGrid control which has meta-methods to help with
 * easily creating/defining Chofer columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both chofer_list.php AND
 * chofer_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ChoferListForm extends ChoferListFormBase {
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

		$this->lblTituForm->Text = 'Choferes';

		// Instantiate the Meta DataGrid
		$this->dtgChofers = new ChoferDataGrid($this);
		$this->dtgChofers->FontSize = 13;
		$this->dtgChofers->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgChofers->CssClass = 'datagrid';
		$this->dtgChofers->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgChofers->Paginator = new QPaginator($this->dtgChofers);
		$this->dtgChofers->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgChofers->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgChofers->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgChofers->RowActionParameterHtml = '<?= $_ITEM->CodiChof ?>';
		$this->dtgChofers->AddRowAction(new QClickEvent(), new QAjaxAction('dtgChofersRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for chofer's properties, or you
		// can traverse down QQN::chofer() to display fields that are down the hierarchy)
		$colCodiChof = $this->dtgChofers->MetaAddColumn('CodiChof');
		$colCodiChof->Name = 'Chofer';

        $this->dtgChofers->MetaAddColumn('Nombre');

		$colNumeCedu = $this->dtgChofers->MetaAddColumn('NumeCedu');
		$colNumeCedu->Name = 'Cédula';

		$this->dtgChofers->MetaAddColumn('Login');

		$this->dtgChofers->MetaAddTypeColumn('TipoMens', 'MasTipoMensType');
		$this->dtgChofers->MetaAddColumn(QQN::Chofer()->Sucursal->Iata,'Name=Suc');
		$this->dtgChofers->MetaAddColumn(QQN::Chofer()->AccesoMobile,'Name=Acce Ruta-Mob');
		$this->dtgChofers->MetaAddTypeColumn('CodiStat', 'StatusType');

		$colCodiDisp = $this->dtgChofers->MetaAddTypeColumn('CodiDisp', 'DisponibleType');
		$colCodiDisp->Name = 'Disponible?';

		$this->btnExpoExce_Create();

    }

	public function dtgChofersRow_Click($strFormId, $strControlId, $strParameter) {
        $intCodiChof = intval($strParameter);
        QApplication::Redirect("chofer_edit.php/$intCodiChof");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// chofer_list.tpl.php as the included HTML template file
ChoferListForm::Run('ChoferListForm');
?>
