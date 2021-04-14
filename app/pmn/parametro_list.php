<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ParametroListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Parametro class.  It uses the code-generated
 * ParametroDataGrid control which has meta-methods to help with
 * easily creating/defining Parametro columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both parametro_list.php AND
 * parametro_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ParametroListForm extends ParametroListFormBase {
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

		// Instantiate the Meta DataGrid
		$this->dtgParametros = new ParametroDataGrid($this);
		$this->dtgParametros->FontSize = 13;

		// Style the DataGrid (if desired)
		$this->dtgParametros->CssClass = 'datagrid';
		$this->dtgParametros->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgParametros->Paginator = new QPaginator($this->dtgParametros);
		$this->dtgParametros->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgParametros->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgParametros->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgParametros->RowActionParameterHtml = '<?= $_ITEM->IndiPara ?>'."/".'<?= $_ITEM->CodiPara ?>';
		$this->dtgParametros->AddRowAction(new QClickEvent(), new QAjaxAction('dtgParametrosRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for parametro's properties, or you
		// can traverse down QQN::parametro() to display fields that are down the hierarchy)

		$colIndiPara = $this->dtgParametros->MetaAddColumn('IndiPara');
		$colIndiPara->FilterBoxSize = 7;

		$colCodiPara = $this->dtgParametros->MetaAddColumn('CodiPara');
		$colCodiPara->FilterBoxSize = 7;

		$colDescPara = $this->dtgParametros->MetaAddColumn('DescPara');
		$colDescPara->FilterBoxSize = 25;

		$colTxt1Para = $this->dtgParametros->MetaAddColumn('ParaTxt1');
		$colTxt1Para->FilterBoxSize = 25;

		$this->dtgParametros->MetaAddColumn('ParaVal1');

//        $this->dtgParametros->MetaDataBinder();

	}

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Parametros';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

	public function dtgParametrosRow_Click($strFormId, $strControlId, $strParameter) {
		$intId = $strParameter;
		QApplication::Redirect("parametro_edit.php/$intId");
	}		

}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// parametro_list.tpl.php as the included HTML template file
ParametroListForm::Run('ParametroListForm');
?>
