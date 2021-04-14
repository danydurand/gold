<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NewOpcionListFormBase.class.php');

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
class NewOpcionListForm extends NewOpcionListFormBase {
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
		$this->dtgNewOpcions = new NewOpcionDataGrid($this);
		$this->dtgNewOpcions->FontSize = 13;

		// Style the DataGrid (if desired)
		$this->dtgNewOpcions->CssClass = 'datagrid';
		$this->dtgNewOpcions->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgNewOpcions->AdditionalConditions = QQ::Equal(QQN::NewOpcion()->SistemaId,'inc');

		// Add Pagination (if desired)
		$this->dtgNewOpcions->Paginator = new QPaginator($this->dtgNewOpcions);
		$this->dtgNewOpcions->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgNewOpcions->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgNewOpcions->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgNewOpcions->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgNewOpcions->AddRowAction(new QClickEvent(), new QAjaxAction('dtgNewOpcionsRow_Click'));

		// if (isset($_SESSION['dtgNewOpcions'])) {
		// 	$viewState = $_SESSION['dtgNewOpcions'];
		// 	unset($_SESSION['dtgNewOpcions']);
		// 	$this->dtgNewOpcions->SetFilters($viewState['FilterInfo']);
		// 	$this->dtgNewOpcions->SortColumnIndex = $viewState['SortColumnIndex'];
		// 	$this->dtgNewOpcions->SortDirection = $viewState['SortDirection'];
		// 	$this->dtgNewOpcions->PageNumber = $viewState['PageNumber'];
		// } 

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for new_opcion's properties, or you
		// can traverse down QQN::new_opcion() to display fields that are down the hierarchy)
		$colOpciIdxx = $this->dtgNewOpcions->MetaAddColumn('Id');
		$colOpciIdxx->FilterType = null;

		$this->dtgNewOpcions->MetaAddColumn('Nombre');
//		$this->dtgNewOpcions->MetaAddColumn(QQN::NewOpcion()->Sistema);
		$this->dtgNewOpcions->MetaAddTypeColumn('TipoId', 'TipoOpciType');
		$this->dtgNewOpcions->MetaAddColumn('Activo');
		$this->dtgNewOpcions->MetaAddColumn('Programa');
		$this->dtgNewOpcions->MetaAddColumn('Directorio');
		$colOpciDepe = $this->dtgNewOpcions->MetaAddColumn(QQN::NewOpcion()->DependenciaObject);
		$colOpciDepe->Name = 'Depende De';
		$this->dtgNewOpcions->MetaAddColumn('Posicion');
		$this->dtgNewOpcions->MetaAddColumn('Imagen');
		$this->dtgNewOpcions->MetaAddColumn('Nivel');
	}

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Opciones';
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
        QApplication::Redirect('new_opcion_edit.php');
    }

public function dtgNewOpcionsRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect("new_opcion_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// new_opcion_list.tpl.php as the included HTML template file
NewOpcionListForm::Run('NewOpcionListForm');
?>
