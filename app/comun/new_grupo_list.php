<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NewGrupoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the NewGrupo class.  It uses the code-generated
 * NewGrupoDataGrid control which has meta-methods to help with
 * easily creating/defining NewGrupo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both new_grupo_list.php AND
 * new_grupo_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class NewGrupoListForm extends NewGrupoListFormBase {
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
        $this->lblTituForm->Text = 'Grupos';


		// Instantiate the Meta DataGrid
		$this->dtgNewGrupos = new NewGrupoDataGrid($this);
		$this->dtgNewGrupos->FontSize = 13;
		$this->dtgNewGrupos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgNewGrupos->CssClass = 'datagrid';
		$this->dtgNewGrupos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgNewGrupos->Paginator = new QPaginator($this->dtgNewGrupos);
		$this->dtgNewGrupos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgNewGrupos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgNewGrupos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgNewGrupos->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgNewGrupos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgNewGruposRow_Click'));

        $objClauGrup   = QQ::Clause();
        $objClauGrup[] = QQ::Equal(QQN::NewGrupo()->SistemaId,$_SESSION['Sistema']);

        $this->dtgNewGrupos->AdditionalConditions = QQ::AndCondition($objClauGrup);

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for new_grupo's properties, or you
		// can traverse down QQN::new_grupo() to display fields that are down the hierarchy)
		$this->dtgNewGrupos->MetaAddColumn('Id');
		$this->dtgNewGrupos->MetaAddColumn('Nombre');
        $colCantUsua = new QDataGridColumn('CNT USUA','<?= $_FORM->dtgCantUsua_Render($_ITEM); ?>');
        $colCantUsua->Width = 75;
        $this->dtgNewGrupos->AddColumn($colCantUsua);
		$this->dtgNewGrupos->MetaAddColumn('Activo');
		$this->dtgNewGrupos->MetaAddColumn(QQN::NewGrupo()->Sistema);

        $this->btnExpoExce_Create();

    }

    public function dtgCantUsua_Render(NewGrupo $objNewxGrup) {
        if ($objNewxGrup) {
            return $objNewxGrup->CountUsuariosAsGrupo();
        } else {
            return null;
        }
    }

    public function dtgNewGruposRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect(__COM__."/new_grupo_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// new_grupo_list.tpl.php as the included HTML template file
NewGrupoListForm::Run('NewGrupoListForm');
?>
