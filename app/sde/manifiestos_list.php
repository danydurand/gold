<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NotaEntregaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the NotaEntrega class.  It uses the code-generated
 * NotaEntregaDataGrid control which has meta-methods to help with
 * easily creating/defining NotaEntrega columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both nota_entrega_list.php AND
 * nota_entrega_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ManifiestosList extends NotaEntregaListFormBase {
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

		$this->lblTituForm->Text = 'Manifiestos';

		// Instantiate the Meta DataGrid
		$this->dtgNotaEntregas = new NotaEntregaDataGrid($this);
		$this->dtgNotaEntregas->FontSize = 13;
		$this->dtgNotaEntregas->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgNotaEntregas->CssClass = 'datagrid';
		$this->dtgNotaEntregas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgNotaEntregas->Paginator = new QPaginator($this->dtgNotaEntregas);
		$this->dtgNotaEntregas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::NotaEntrega()->Id,false);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::NotEqual(QQN::NotaEntrega()->Estatus,'FACTURAD@');
        $this->dtgNotaEntregas->AdditionalClauses = $objClauOrde;
        $this->dtgNotaEntregas->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Higlight the datagrid rows when mousing over them
		$this->dtgNotaEntregas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgNotaEntregas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgNotaEntregas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgNotaEntregas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgNotaEntregasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for nota_entrega's properties, or you
		// can traverse down QQN::nota_entrega() to display fields that are down the hierarchy)
		$this->dtgNotaEntregas->MetaAddColumn('Id');
		$this->dtgNotaEntregas->MetaAddColumn(QQN::NotaEntrega()->ClienteCorp,'Name=Cliente');
		$this->dtgNotaEntregas->MetaAddColumn('Referencia');
        $colFechMani = new QDataGridColumn('FECHA','<?= $_FORM->FechMani($_ITEM) ?>');
        $this->dtgNotaEntregas->AddColumn($colFechMani);
        $this->dtgNotaEntregas->MetaAddColumn('Estatus');
        $this->dtgNotaEntregas->MetaAddColumn('ServicioImportacion','Name=S.Impor');
        $this->dtgNotaEntregas->MetaAddColumn('Cargadas');
        $this->dtgNotaEntregas->MetaAddColumn('PorProcesar','Name=xProc');
        $this->dtgNotaEntregas->MetaAddColumn('PorCorregir','Name=xCorr');
        $this->dtgNotaEntregas->MetaAddColumn('Procesadas','Name=Proc');
        $this->dtgNotaEntregas->MetaAddColumn('Kilos');
        $this->dtgNotaEntregas->MetaAddColumn('PiesCub','Name=Pies3');
        //$this->dtgNotaEntregas->MetaAddColumn('Volumen','Name=Vol.');
        $this->dtgNotaEntregas->MetaAddColumn('Total');
        $this->dtgNotaEntregas->MetaAddColumn('FacturaId','Name=Fact');

        $this->btnExpoExce_Create();

    }

    public function btnNuevRegi_Click()
    {
        QApplication::Redirect("carga_masiva_guias.php");
    }

    public function FechMani(NotaEntrega $objManiClie) {
        return $objManiClie->Fecha->__toString("DD/MM/YYYY");
    }

    public function dtgNotaEntregasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("carga_masiva_guias.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// nota_entrega_list.tpl.php as the included HTML template file
ManifiestosList::Run('ManifiestosList');
?>
