<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CambioTarifaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the CambioTarifa class.  It uses the code-generated
 * CambioTarifaDataGrid control which has meta-methods to help with
 * easily creating/defining CambioTarifa columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cambio_tarifa_list.php AND
 * cambio_tarifa_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CambioTarifaListForm extends CambioTarifaListFormBase {
    protected $btnVolvList;

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
        $this->lblTituForm->Text = 'Cambios de Tarifa';

		// Instantiate the Meta DataGrid
		$this->dtgCambioTarifas = new CambioTarifaDataGrid($this);
		$this->dtgCambioTarifas->FontSize = 13;
		$this->dtgCambioTarifas->ShowFilter = false;

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::CambioTarifa()->Id,false);
        $this->dtgCambioTarifas->AdditionalClauses = $objClauOrde;

		// Style the DataGrid (if desired)
		$this->dtgCambioTarifas->CssClass = 'datagrid';
		$this->dtgCambioTarifas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgCambioTarifas->Paginator = new QPaginator($this->dtgCambioTarifas);
		$this->dtgCambioTarifas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgCambioTarifas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgCambioTarifas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgCambioTarifas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgCambioTarifas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgCambioTarifasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for cambio_tarifa's properties, or you
		// can traverse down QQN::cambio_tarifa() to display fields that are down the hierarchy)
		//$this->dtgCambioTarifas->MetaAddColumn('Id');
		$this->dtgCambioTarifas->MetaAddColumn(QQN::CambioTarifa()->TarifaOrigen);
		$this->dtgCambioTarifas->MetaAddColumn(QQN::CambioTarifa()->TarifaDestino);
		//$this->dtgCambioTarifas->MetaAddColumn('Excluir');
		$this->dtgCambioTarifas->MetaAddColumn('EjecutarEl');
		$this->dtgCambioTarifas->MetaAddColumn('RegistradoEl');
		$this->dtgCambioTarifas->MetaAddColumn('RegistradoPor');
		$this->dtgCambioTarifas->MetaAddColumn('EjecutadoEl');
		//$this->dtgCambioTarifas->MetaAddColumn('HoraEjecucion');
		//$colComeCamb = $this->dtgCambioTarifas->MetaAddColumn('Comentario');
		//$colComeCamb->Width = 380;
		//$colComeCamb->HtmlEntities = false;

        $this->btnExpoExce_Create();
        $this->btnVolvList_Create();

    }

    //----------------------------
    // Aqui se crean los objetos
    //----------------------------

    protected function btnVolvList_Create() {
        $this->btnVolvList = new QButtonW($this);
        $this->btnVolvList->Text = TextoIcono('mail-reply','Volver','F','lg');
        $this->btnVolvList->AddAction(new QClickEvent(), new QServerAction('btnVolvList_Click'));
    }

	public function dtgCambioTarifasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("cambio_tarifa_edit.php/$intId");
	}

    //------------------------------------
    // Acciones relativas a los objetos
    //------------------------------------

    public function btnVolvList_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltiAcce->__toString());
    }
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// cambio_tarifa_list.tpl.php as the included HTML template file
CambioTarifaListForm::Run('CambioTarifaListForm');
?>
