<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CajaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the NewOpcion class.  It uses the code-generated
 * NewOpcionDataGrid control which has meta-methods to help with
 * easily creating/defining NewOpcion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both new_opcion_list.php AND
 * new_opcion_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CajaListForm extends CajaListFormBase {
    protected $btnCreaRegi;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

	protected function Form_Create() {
		parent::Form_Create();

		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

        $this->btnCreaRegi_Create();

		// Instantiate the Meta DataGrid
		$this->dtgCajas = new CajaDataGrid($this);

		// Style the DataGrid (if desired)
		$this->dtgCajas->CssClass = 'datagrid';
		$this->dtgCajas->AlternateRowStyle->CssClass = 'alternate';
		$this->dtgCajas->FontSize = 13;

		// Add Pagination (if desired)
		$this->dtgCajas->Paginator = new QPaginator($this->dtgCajas);
		$this->dtgCajas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgCajas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgCajas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgCajas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgCajas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgCajasRow_Click'));

		//-------------------------------------------------
		// Defino las columnas que aparecerán en mi lista
		//-------------------------------------------------
		$colCajaIdxx = $this->dtgCajas->MetaAddColumn('Id');
		$colCajaIdxx->FilterType = null;

		$this->dtgCajas->MetaAddColumn('Descripcion');

		$colReceCaja = $this->dtgCajas->MetaAddColumn(QQN::Caja()->Counter->Descripcion);
		$colReceCaja->Name = 'Receptoria';
		$colReceCaja->Filter = QQ::Like(QQN::Caja()->Counter->Descripcion,null);
		$colReceCaja->FilterType = QFilterType::TextFilter;



		//$this->dtgCajas->MetaAddColumn('ControlSeniat');
		$this->dtgCajas->MetaAddTypeColumn('TipoId', 'TipoCajaType');
		$this->dtgCajas->MetaAddColumn('ImpresoraId');

		$colCajaSeri = $this->dtgCajas->MetaAddColumn('Serie');
		$colCajaSeri->FilterType = null;
		//$this->dtgCajas->MetaAddColumn('ConseFactura');
	}
	//-----------------------------------------
	// Se construyen los objetos de la página
	//-----------------------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Cajas List';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

	protected function lblNotiUsua_Create() {
		$this->lblNotiUsua = new QLabel($this);
		$this->lblNotiUsua->Text = '';
	}

    protected function btnCreaRegi_Create() {
        $this->btnCreaRegi = new QButton($this);
        $this->btnCreaRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
        $this->btnCreaRegi->CssClass = 'btn btn-primary';
        $this->btnCreaRegi->HtmlEntities = false;
        $this->btnCreaRegi->AddAction(new QClickEvent(), new QServerAction('btnCreaRegi_Click'));
    }

	//--------------------------------------
	// Acciones relacionadas a los objetos
	//--------------------------------------

    public function btnCreaRegi_Click() {
        QApplication::Redirect('caja_edit.php');
    }

	public function dtgCajasRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect("caja_edit.php/$intId");
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// new_opcion_list.tpl.php as the included HTML template file
CajaListForm::Run('CajaListForm');
?>
