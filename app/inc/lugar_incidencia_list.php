<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/LugarIncidenciaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the LugarIncidencia class.  It uses the code-generated
 * LugarIncidenciaDataGrid control which has meta-methods to help with
 * easily creating/defining LugarIncidencia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both lugar_incidencia_list.php AND
 * lugar_incidencia_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class LugarIncidenciaListForm extends LugarIncidenciaListFormBase {
    protected $btnCreaRegi;

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

		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

        $this->btnCreaRegi_Create();

		// Instantiate the Meta DataGrid
		$this->dtgLugarIncidencias = new LugarIncidenciaDataGrid($this);
		$this->dtgLugarIncidencias->FontSize = 13;

		// Style the DataGrid (if desired)
		$this->dtgLugarIncidencias->CssClass = 'datagrid';
		$this->dtgLugarIncidencias->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgLugarIncidencias->Paginator = new QPaginator($this->dtgLugarIncidencias);
		$this->dtgLugarIncidencias->ItemsPerPage = 16; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgLugarIncidencias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgLugarIncidencias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgLugarIncidencias->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgLugarIncidencias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgLugarIncidenciasRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for lugar_incidencia's properties, or you
		// can traverse down QQN::lugar_incidencia() to display fields that are down the hierarchy)
		$colCodiLuga = $this->dtgLugarIncidencias->MetaAddColumn('Codigo');
		$colCodiLuga->FilterBoxSize = 4;

		$colNombLuga = $this->dtgLugarIncidencias->MetaAddColumn('Nombre');
		$colNombLuga->FilterBoxSize = 25;

		$this->dtgLugarIncidencias->MetaAddColumn('Activo');
	}

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Lugar Incidencia';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

    protected function btnCreaRegi_Create() {
        $this->btnCreaRegi = new QButton($this);
        $this->btnCreaRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
        $this->btnCreaRegi->CssClass = 'btn btn-primary';
        $this->btnCreaRegi->HtmlEntities = false;
        $this->btnCreaRegi->AddAction(new QClickEvent(), new QServerAction('btnCreaRegi_Click'));
    }

    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------

    public function btnCreaRegi_Click() {
        QApplication::Redirect('lugar_incidencia_edit.php');
    }

public function dtgLugarIncidenciasRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect("lugar_incidencia_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// lugar_incidencia_list.tpl.php as the included HTML template file
LugarIncidenciaListForm::Run('LugarIncidenciaListForm');
?>
