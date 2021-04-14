<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ClienteTmpListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the ClienteTmp class.  It uses the code-generated
 * ClienteTmpDataGrid control which has meta-methods to help with
 * easily creating/defining ClienteTmp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cliente_tmp_list.php AND
 * cliente_tmp_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ClienteTmpListForm extends ClienteTmpListFormBase {
	protected $intCodiMast;
	protected $btnCancel;

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

		$this->intCodiMast = $_SESSION['CodiMast'];

		$this->lblTituForm->Text = 'Sub-Clientes por corregir';
		$this->btnNuevRegi->Visible = false;

		$this->btnCancel_Create();

		// Instantiate the Meta DataGrid
		$this->dtgClienteTmps = new ClienteTmpDataGrid($this);
		$this->dtgClienteTmps->FontSize = 13;
		$this->dtgClienteTmps->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgClienteTmps->CssClass = 'datagrid';
		$this->dtgClienteTmps->AlternateRowStyle->CssClass = 'alternate';

		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::ClienteTmp()->Id,false);

		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::ClienteTmp()->MasterId,$this->intCodiMast);
		$objClauWher[] = QQ::Equal(QQN::ClienteTmp()->Ajustar,true);

		$this->dtgClienteTmps->AdditionalConditions = QQ::AndCondition($objClauWher);
		$this->dtgClienteTmps->AdditionalClauses = $objClauOrde;

		// Add Pagination (if desired)
		$this->dtgClienteTmps->Paginator = new QPaginator($this->dtgClienteTmps);
		$this->dtgClienteTmps->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgClienteTmps->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgClienteTmps->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgClienteTmps->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgClienteTmps->AddRowAction(new QClickEvent(), new QAjaxAction('dtgClienteTmpsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for cliente_tmp's properties, or you
		// can traverse down QQN::cliente_tmp() to display fields that are down the hierarchy)
		$colNumeCont = $this->dtgClienteTmps->MetaAddColumn('CodigoContrato');
		$colNumeCont->Name = 'Contrato';

		$this->dtgClienteTmps->MetaAddColumn('Nombre');

		$colCeduRifx = $this->dtgClienteTmps->MetaAddColumn('Rif');
		$colCeduRifx->Name = 'Cédula/RIF';

		$this->dtgClienteTmps->MetaAddColumn('Sucursal');

		$colFechCarg = $this->dtgClienteTmps->MetaAddColumn('FechCarg');
		$colFechCarg->Name = 'Fecha';

        $this->btnExpoExce_Create();
    }

    //----------------------------------------
	// Creando los objetos del formulario ...
	//----------------------------------------

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = TextoIcono('mail-reply','Volver','','lg');
		$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
		$this->btnCancel->CssClass = 'btn btn-warning btn-sm';
		$this->btnCancel->HtmlEntities = 'false';
		$this->btnCancel->CausesValidation = false;
	}

	protected function btnExpoExce_Create() {
		$this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgClienteTmps);
		$this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
		$this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
		$this->btnExpoExce->HtmlEntities = false;
		$this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
		$this->btnExpoExce->Visible = true;
	}

	//----------------------------------
	// Acciones asociadas a los objetos
	//----------------------------------

	public function dtgClienteTmpsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("cliente_tmp_edit.php/$intId");
	}

	protected function btnCancel_Click() {
		$intId = $this->intCodiMast;
		QApplication::Redirect(__SIST__."/carga_masiva_clientes.php/$intId");
	}
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// cliente_tmp_list.tpl.php as the included HTML template file
ClienteTmpListForm::Run('ClienteTmpListForm');
?>
