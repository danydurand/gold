<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NotaCreditoCorpListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the NotaCreditoCorp class.  It uses the code-generated
 * NotaCreditoCorpDataGrid control which has meta-methods to help with
 * easily creating/defining NotaCreditoCorp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both nota_credito_corp_list.php AND
 * nota_credito_corp_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class NotaCreditoCorpListForm extends NotaCreditoCorpListFormBase {
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

		$this->lblTituForm->Text = 'Notas de Crédito';

		// Instantiate the Meta DataGrid
		$this->dtgNotaCreditoCorps = new NotaCreditoCorpDataGrid($this);
		$this->dtgNotaCreditoCorps->FontSize = 12;
		$this->dtgNotaCreditoCorps->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgNotaCreditoCorps->CssClass = 'datagrid';
		$this->dtgNotaCreditoCorps->AlternateRowStyle->CssClass = 'alternate';

		$this->dtgNotaCreditoCorps->SortColumnIndex = 0;
		$this->dtgNotaCreditoCorps->SortDirection = 1;

		// Add Pagination (if desired)
		$this->dtgNotaCreditoCorps->Paginator = new QPaginator($this->dtgNotaCreditoCorps);
		$this->dtgNotaCreditoCorps->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgNotaCreditoCorps->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgNotaCreditoCorps->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgNotaCreditoCorps->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgNotaCreditoCorps->AddRowAction(new QClickEvent(), new QAjaxAction('dtgNotaCreditoCorpsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for nota_credito_corp's properties, or you
		// can traverse down QQN::nota_credito_corp() to display fields that are down the hierarchy)
		$this->dtgNotaCreditoCorps->MetaAddColumn('Id','Width=35');
		$this->dtgNotaCreditoCorps->MetaAddColumn('Referencia', 'Width=60');
		$this->dtgNotaCreditoCorps->MetaAddColumn('Tipo', 'Width=70');

		$colNombClie = new QDataGridColumn('CLIENTE','<?= $_FORM->NombClie_Render($_ITEM); ?>');
		$colNombClie->Width = 130;
		$this->dtgNotaCreditoCorps->AddColumn($colNombClie);

		$colPagoCorp = new QDataGridColumn('PAGO','<?= $_FORM->PagoCorp_Render($_ITEM); ?>');
		$colPagoCorp->Width = 160;
		$this->dtgNotaCreditoCorps->AddColumn($colPagoCorp);

		$this->dtgNotaCreditoCorps->MetaAddColumn(QQN::NotaCreditoCorp()->Factura, 'Width=70');
        $colFechNota = new QDataGridColumn('FECHA','<?= $_ITEM->Fecha->__toString("DD/MM/YYYY"); ?>');
        $colFechNota->Width = 80;
        $this->dtgNotaCreditoCorps->AddColumn($colFechNota);

        $colMontNota = new QDataGridColumn('MONTO','<?= nf($_ITEM->Monto); ?>');
        $colMontNota->Width = 50;
        $this->dtgNotaCreditoCorps->AddColumn($colMontNota);

        $colEstaNota = new QDataGridColumn('ESTATUS','<?= $_FORM->EstaNota_Render($_ITEM); ?>');
        $colEstaNota->Width = 50;
        $colEstaNota->HtmlEntities = false;
        $this->dtgNotaCreditoCorps->AddColumn($colEstaNota);

		$colObseNota = new QDataGridColumn('OBSERVACION','<?= $_FORM->ObseNota_Render($_ITEM); ?>');
		$colObseNota->Width = 90;
		$this->dtgNotaCreditoCorps->AddColumn($colObseNota);

        $this->btnExpoExce_Create();

    }

    public function NombClie_Render(NotaCreditoCorp $objNotaCred) {
		return $objNotaCred->ClienteCorp->__toStringCorto();
	}

    public function PagoCorp_Render(NotaCreditoCorp $objNotaCred) {
		return $objNotaCred->PagoCorp->__toStringCorto();
	}

    public function EstaNota_Render(NotaCreditoCorp $objNotaCred) {
		$strColoEtiq = $objNotaCred->Estatus == 'DISPONIBLE' ? 'green' : 'blue';
		return "<span style='color: $strColoEtiq'>$objNotaCred->Estatus</span>";
	}

    public function ObseNota_Render(NotaCreditoCorp $objNotaCred) {
		return substr($objNotaCred->Observacion,0,15);
	}

	public function dtgNotaCreditoCorpsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("nota_credito_corp_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// nota_credito_corp_list.tpl.php as the included HTML template file
NotaCreditoCorpListForm::Run('NotaCreditoCorpListForm');
?>
