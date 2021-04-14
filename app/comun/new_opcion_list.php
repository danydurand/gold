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

        $this->lblMensUsua_Create();
		$this->lblTituForm_Create();

		// Instantiate the Meta DataGrid
		$this->dtgNewOpcions = new NewOpcionDataGrid($this);
		$this->dtgNewOpcions->FontSize = 13;
		$this->dtgNewOpcions->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgNewOpcions->CssClass = 'datagrid';
		$this->dtgNewOpcions->AlternateRowStyle->CssClass = 'alternate';

        // Se incluye una condición para mostrar las opciones del Sistema SDE y del Sistema Yamaguchi
        $arrOpciSist = array($_SESSION['Sistema'],'con');
        $this->dtgNewOpcions->AdditionalConditions = QQ::In(QQN::NewOpcion()->SistemaId,$arrOpciSist);
        // Se incluye una cláusula para ordenar por Sistema y por Posición
        $objClauOrde = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->SistemaId,false);
        $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
        $this->dtgNewOpcions->AdditionalClauses = $objClauOrde;

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

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for new_opcion's properties, or you
		// can traverse down QQN::new_opcion() to display fields that are down the hierarchy)
		// $colOpciIdxx = $this->dtgNewOpcions->MetaAddColumn('Id');
		// $colOpciIdxx->FilterType = null;

		$colNombOpci = $this->dtgNewOpcions->MetaAddColumn('Nombre');
		$colNombOpci->Width = 150;

		$colTipoOpci = $this->dtgNewOpcions->MetaAddColumn('EsMenu');
		$colTipoOpci->Name  = 'Menu?';
		$colTipoOpci->Width = 100;

		$colActiOpci = $this->dtgNewOpcions->MetaAddColumn('Activo');
		$colActiOpci->Width = 80;

        $colProgOpci = $this->dtgNewOpcions->MetaAddColumn('Programa');
		$colProgOpci->Width = 80;

        $colDireOpci = $this->dtgNewOpcions->MetaAddColumn('Directorio');
		$colDireOpci->FilterBoxSize = 7;
		$colDireOpci->Width = 80;

        $colOpciDepe = $this->dtgNewOpcions->MetaAddColumn(QQN::NewOpcion()->DependenciaObject);
		$colOpciDepe->Name = 'Depende De';
		$colOpciDepe->Width = 120;

        $colPosiOpci = $this->dtgNewOpcions->MetaAddColumn('Posicion');
		$colPosiOpci->Name = 'Posición';
		$colPosiOpci->FilterBoxSize = 2;

		// $colImagOpci = $this->dtgNewOpcions->MetaAddColumn('Imagen');
		// $colImagOpci->FilterBoxSize = 3;

        $colNiveOpci = $this->dtgNewOpcions->MetaAddColumn('Nivel');
        $colNiveOpci->FilterBoxSize = 2;
	}

    //-----------------------------
    // Aquí se crean los objetos
    //-----------------------------
	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Opciones';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------

    public function btnNuevRegi_Click() {
        QApplication::Redirect(__COM__.'/new_opcion_edit.php');
    }

    public function dtgNewOpcionsRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect(__COM__."/new_opcion_edit.php/$intId");
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// new_opcion_list.tpl.php as the included HTML template file
NewOpcionListForm::Run('NewOpcionListForm');
?>