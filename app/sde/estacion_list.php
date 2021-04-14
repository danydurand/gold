<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/EstacionListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Estacion class.  It uses the code-generated
 * EstacionDataGrid control which has meta-methods to help with
 * easily creating/defining Estacion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both estacion_list.php AND
 * estacion_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class EstacionListForm extends EstacionListFormBase {
	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

	//	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

		$this->lblTituForm->Text = 'Sucursales';

		// Instantiate the Meta DataGrid
		$this->dtgEstacions = new EstacionDataGrid($this);
		$this->dtgEstacions->FontSize = 13;
		$this->dtgEstacions->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgEstacions->CssClass = 'datagrid';
		$this->dtgEstacions->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgEstacions->Paginator = new QPaginator($this->dtgEstacions);
		$this->dtgEstacions->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgEstacions->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgEstacions->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgEstacions->RowActionParameterHtml = '<?= $_ITEM->CodiEsta ?>';
		$this->dtgEstacions->AddRowAction(new QClickEvent(), new QAjaxAction('dtgEstacionsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for estacion's properties, or you
		// can traverse down QQN::estacion() to display fields that are down the hierarchy)

		$colCodiEsta = $this->dtgEstacions->MetaAddColumn('CodiEsta');
		$colCodiEsta->Name = 'SUC';
		$colCodiEsta->FilterBoxSize = 4;

		$this->dtgEstacions->MetaAddTypeColumn('CodiStat', 'StatusType');

		$colDescEsta = $this->dtgEstacions->MetaAddColumn('DescEsta');
		$colDescEsta->Name = 'Descripción';

		$colNombCont = $this->dtgEstacions->MetaAddColumn('NombCont');
		$colNombCont->Name = 'Contacto';

		$colCantRece = new QDataGridColumn('RECEPTORIAS','<?= $_FORM->dtgCantRece_Render($_ITEM); ?>');
		$this->dtgEstacions->AddColumn($colCantRece);

		$colDireMail = $this->dtgEstacions->MetaAddColumn('DireMailPrincipal');
		$colDireMail->Name = 'Correo Electrónico';
		$colDireMail->Width = 200;

		$colEstaSucu = new QDataGridColumn('ESTADO','<?= $_FORM->dtgEstado_Render($_ITEM); ?>');
        $this->dtgEstacions->AddColumn($colEstaSucu);

		$colZonaFact = $this->dtgEstacions->MetaAddColumn(QQN::Estacion()->SeFacturaEnObject);
		$colZonaFact->Name = 'Se factura en';

        $this->btnExpoExce_Create();
    }

    public function dtgCantRece_Render(Estacion $objEstacion) {
	    if ($objEstacion) {
	        return $objEstacion->CountCountersAsSucursal();
        } else {
	        null;
        }
    }

    public function dtgEstado_Render(Estacion $objEstacion) {
	    if ($objEstacion->Estado) {
	        return str_replace('ESTADO','',$objEstacion->Estado->Nombre);
        } else {
	        null;
        }
    }

	public function dtgEstacionsRow_Click($strFormId, $strControlId, $strParameter) {
        $strCodiEsta = trim($strParameter);
        QApplication::Redirect("estacion_edit.php/$strCodiEsta");
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// estacion_list.tpl.php as the included HTML template file
EstacionListForm::Run('EstacionListForm');
?>