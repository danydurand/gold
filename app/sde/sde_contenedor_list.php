<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SdeContenedorListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the SdeContenedor class.  It uses the code-generated
 * SdeContenedorDataGrid control which has meta-methods to help with
 * easily creating/defining SdeContenedor columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sde_contenedor_list.php AND
 * sde_contenedor_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SdeContenedorListForm extends SdeContenedorListFormBase {
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

		$this->lblTituForm->Text = 'Valijas';
		// Instantiate the Meta DataGrid
		$this->dtgSdeContenedors = new SdeContenedorDataGrid($this);
		$this->dtgSdeContenedors->FontSize = 13;
		$this->dtgSdeContenedors->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgSdeContenedors->CssClass = 'datagrid';
		$this->dtgSdeContenedors->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgSdeContenedors->Paginator = new QPaginator($this->dtgSdeContenedors);
		$this->dtgSdeContenedors->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgSdeContenedors->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgSdeContenedors->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgSdeContenedors->RowActionParameterHtml = '<?= $_ITEM->CodiOper ?>';
		$this->dtgSdeContenedors->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSdeContenedorsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for sde_contenedor's properties, or you
		// can traverse down QQN::sde_contenedor() to display fields that are down the hierarchy)
		$this->dtgSdeContenedors->MetaAddColumn('NumeCont','Name=Valija');
        $colCantPiez = new QDataGridColumn('Piezas', '<?= $_FORM->CantPiez_ColumnRender($_ITEM) ?>');
        $colCantPiez->HtmlEntities = false;
        $colCantPiez->Width        = 10;
        $this->dtgSdeContenedors->AddColumn($colCantPiez);
        $this->dtgSdeContenedors->MetaAddColumn(QQN::SdeContenedor()->CodiOperObject,'Name=Operacion');
        $this->dtgSdeContenedors->MetaAddColumn('Fecha');
        $this->dtgSdeContenedors->MetaAddColumn('Hora');
        $this->dtgSdeContenedors->MetaAddColumn('StatCont','Name=Status');
        //$this->dtgSdeContenedors->MetaAddColumn('NombreChofer');
        //$this->dtgSdeContenedors->MetaAddColumn('CedulaChofer');
        //$this->dtgSdeContenedors->MetaAddColumn('PlacaVehiculo');
        //$this->dtgSdeContenedors->MetaAddColumn('DescipcionVehiculo');
        //$this->dtgSdeContenedors->MetaAddColumn(QQN::SdeContenedor()->Producto);
        //$this->dtgSdeContenedors->MetaAddColumn('MontoFlete');
        //$this->dtgSdeContenedors->MetaAddColumn('Master');
        //$this->dtgSdeContenedors->MetaAddColumn('NumeroValijas');
        //$this->dtgSdeContenedors->MetaAddColumn('Valijas');
        //$this->dtgSdeContenedors->MetaAddColumn('PaisId');

        $this->btnExpoExce_Create();
    }

    public function CantPiez_ColumnRender(SdeContenedor $objValija) {
		return $objValija->CountGuiaPiezasesAsGuia();
	}

    public function btnNuevRegi_Click()
    {
        QApplication::Redirect("envalijar.php");
    }

	public function dtgSdeContenedorsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("sde_contenedor_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// sde_contenedor_list.tpl.php as the included HTML template file
SdeContenedorListForm::Run('SdeContenedorListForm','sde_contenedor_list.tpl.php');
?>
