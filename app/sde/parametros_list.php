<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ParametrosListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Parametros class.  It uses the code-generated
 * ParametrosDataGrid control which has meta-methods to help with
 * easily creating/defining Parametros columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both parametros_list.php AND
 * parametros_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ParametrosListForm extends ParametrosListFormBase {
	protected $objUsuario;

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

		$this->lblTituForm->Text = 'Parámetros';
		$this->objUsuario = unserialize($_SESSION['User']);
		t('Usuario: '.$this->objUsuario->LogiUsua);


		// Instantiate the Meta DataGrid
		$this->dtgParametroses = new ParametrosDataGrid($this);
		$this->dtgParametroses->FontSize = 13;
		$this->dtgParametroses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgParametroses->CssClass = 'datagrid';
		$this->dtgParametroses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgParametroses->Paginator = new QPaginator($this->dtgParametroses);
		$this->dtgParametroses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgParametroses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgParametroses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgParametroses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgParametroses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgParametrosesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for parametros's properties, or you
		// can traverse down QQN::parametros() to display fields that are down the hierarchy)
		$this->dtgParametroses->MetaAddColumn('Id');
		$this->dtgParametroses->MetaAddColumn('Indice');
		$this->dtgParametroses->MetaAddColumn('Codigo');
		$this->dtgParametroses->MetaAddColumn('Descripcion');
		$this->dtgParametroses->MetaAddColumn('Texto1');
		//$this->dtgParametroses->MetaAddColumn('Texto2');
		//$this->dtgParametroses->MetaAddColumn('Texto3');
		//$this->dtgParametroses->MetaAddColumn('Texto4');
		//$this->dtgParametroses->MetaAddColumn('Texto5');
		$this->dtgParametroses->MetaAddColumn('Valor1');
		//$this->dtgParametroses->MetaAddColumn('Valor2');
		//$this->dtgParametroses->MetaAddColumn('Valor3');
		//$this->dtgParametroses->MetaAddColumn('Valor4');
		//$this->dtgParametroses->MetaAddColumn('Valor5');
		//$this->dtgParametroses->MetaAddColumn('CreatedAt');
		//$this->dtgParametroses->MetaAddColumn('UpdatedAt');
		//$this->dtgParametroses->MetaAddColumn('DeletedAt');
		$this->dtgParametroses->MetaAddColumn('CreatedBy');
		$this->dtgParametroses->MetaAddColumn('UpdatedBy');
		//$this->dtgParametroses->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

        if (!in_array($this->objUsuario->LogiUsua,['ddurand','mperez'])) {
        	$this->btnNuevRegi->Visible = false;
		}

    }

	public function dtgParametrosesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("parametros_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// parametros_list.tpl.php as the included HTML template file
ParametrosListForm::Run('ParametrosListForm');
?>
