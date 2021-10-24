<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/EmpaqueListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Empaque class.  It uses the code-generated
 * EmpaqueDataGrid control which has meta-methods to help with
 * easily creating/defining Empaque columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both empaque_list.php AND
 * empaque_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class EmpaqueListForm extends EmpaqueListFormBase {
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

		// Instantiate the Meta DataGrid
		$this->dtgEmpaques = new EmpaqueDataGrid($this);
		$this->dtgEmpaques->FontSize = 13;
		$this->dtgEmpaques->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgEmpaques->CssClass = 'datagrid';
		$this->dtgEmpaques->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgEmpaques->Paginator = new QPaginator($this->dtgEmpaques);
		$this->dtgEmpaques->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgEmpaques->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgEmpaques->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgEmpaques->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgEmpaques->AddRowAction(new QClickEvent(), new QAjaxAction('dtgEmpaquesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for empaque's properties, or you
		// can traverse down QQN::empaque() to display fields that are down the hierarchy)
		$this->dtgEmpaques->MetaAddColumn('Id');
		$this->dtgEmpaques->MetaAddColumn('Nombre');
		$this->dtgEmpaques->MetaAddColumn('Siglas');
		$this->dtgEmpaques->MetaAddColumn('IsActivo');
		$this->dtgEmpaques->MetaAddColumn('CreatedAt','Name=F.Creacion');
		$this->dtgEmpaques->MetaAddColumn('UpdatedAt','Name=F.Edicion');
		$this->dtgEmpaques->MetaAddColumn(QQN::Empaque()->CreatedByObject,'Name=Creado Por');
		$this->dtgEmpaques->MetaAddColumn(QQN::Empaque()->UpdatedByObject,'Name=Editado Por');

        $this->btnExpoExce_Create();

    }

	public function dtgEmpaquesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("empaque_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// empaque_list.tpl.php as the included HTML template file
EmpaqueListForm::Run('EmpaqueListForm');
?>
