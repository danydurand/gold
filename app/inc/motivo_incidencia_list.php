<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/MotivoIncidenciaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the MotivoIncidencia class.  It uses the code-generated
 * MotivoIncidenciaDataGrid control which has meta-methods to help with
 * easily creating/defining MotivoIncidencia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both motivo_incidencia_list.php AND
 * motivo_incidencia_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class MotivoIncidenciaListForm extends MotivoIncidenciaListFormBase {
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
		$this->dtgMotivoIncidencias = new MotivoIncidenciaDataGrid($this);
		$this->dtgMotivoIncidencias->FontSize = 13;

		// Style the DataGrid (if desired)
		$this->dtgMotivoIncidencias->CssClass = 'datagrid';
		$this->dtgMotivoIncidencias->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgMotivoIncidencias->Paginator = new QPaginator($this->dtgMotivoIncidencias);
		$this->dtgMotivoIncidencias->ItemsPerPage = 16; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgMotivoIncidencias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgMotivoIncidencias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgMotivoIncidencias->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgMotivoIncidencias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgMotivoIncidenciasRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for motivo_incidencia's properties, or you
		// can traverse down QQN::motivo_incidencia() to display fields that are down the hierarchy)
		$colCodiMoti = $this->dtgMotivoIncidencias->MetaAddColumn('Codigo');
		$colCodiMoti->FilterBoxSize = 4;

		$colNombMoti = $this->dtgMotivoIncidencias->MetaAddColumn('Nombre');
		$colNombMoti->FilterBoxSize = 25;

		$this->dtgMotivoIncidencias->MetaAddColumn('Activo');
	}

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Motivo Incidencia';
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
        QApplication::Redirect('motivo_incidencia_edit.php');
    }

public function dtgMotivoIncidenciasRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect("motivo_incidencia_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// motivo_incidencia_list.tpl.php as the included HTML template file
MotivoIncidenciaListForm::Run('MotivoIncidenciaListForm');
?>
