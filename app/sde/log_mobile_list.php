<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/LogMobileListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the LogMobile class.  It uses the code-generated
 * LogMobileDataGrid control which has meta-methods to help with
 * easily creating/defining LogMobile columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both log_mobile_list.php AND
 * log_mobile_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class LogMobileListForm extends LogMobileListFormBase {
	protected $strLogiChof;
	protected $btnVolvList;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

	protected function Setup() {
		if (QApplication::PathInfo(0)) {
			$this->strLogiChof = QApplication::PathInfo(0);
			$objChofList = Chofer::LoadByLogin($this->strLogiChof);
			if (!$objChofList) {
				$this->strLogiChof = null;
			}
		}
	}

	protected function Form_Create() {
		parent::Form_Create();

		$this->lblTituForm->Text = 'Actividad Mobile';

		$this->Setup();

		// Instantiate the Meta DataGrid
		$this->dtgLogMobiles = new LogMobileDataGrid($this);
		$this->dtgLogMobiles->FontSize = 13;
		$this->dtgLogMobiles->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgLogMobiles->CssClass = 'datagrid';
		$this->dtgLogMobiles->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgLogMobiles->Paginator = new QPaginator($this->dtgLogMobiles);
		$this->dtgLogMobiles->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		if (!is_null($this->strLogiChof)) {
			$objClauWher   = QQ::Clause();
			$objClauWher[] = QQ::Equal(QQN::LogMobile()->Chofer,$this->strLogiChof);
			$this->dtgLogMobiles->AdditionalConditions = QQ::AndCondition($objClauWher);
		}

		// Higlight the datagrid rows when mousing over them
		$this->dtgLogMobiles->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgLogMobiles->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		/*
		$this->dtgLogMobiles->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgLogMobiles->AddRowAction(new QClickEvent(), new QAjaxAction('dtgLogMobilesRow_Click'));
		*/

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		$this->dtgLogMobiles->SortColumnIndex = 0;
		$this->dtgLogMobiles->SortDirection = 1;

		// Create the Other Columns (note that you can use strings for log_mobile's properties, or you
		// can traverse down QQN::log_mobile() to display fields that are down the hierarchy)
		$this->dtgLogMobiles->MetaAddColumn('Id');
		$this->dtgLogMobiles->MetaAddColumn('Chofer');
		//$this->dtgLogMobiles->MetaAddColumn('Fecha');

		$colFechActi = new QDataGridColumn('FECHA','<?= $_FORM->dtgFecha_Render($_ITEM) ?>');
		$this->dtgLogMobiles->AddColumn($colFechActi);

		$this->dtgLogMobiles->MetaAddColumn('Descripcion');

        $this->btnExpoExce_Create();
        $this->btnVolvList_Create();

    }

	public function dtgFecha_Render(LogMobile $objLogxMobi) {
		return $objLogxMobi->Fecha->__toString('DD/MM/YYYY hhh:mm:ss');
    }


	protected function btnVolvList_Create() {
		$this->btnVolvList = new QButton($this);
		$this->btnVolvList->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		$this->btnVolvList->CssClass = 'btn btn-warning btn-sm';
		$this->btnVolvList->HtmlEntities = false;
		$this->btnVolvList->AddAction(new QClickEvent(), new QServerAction('btnVolvList_Click'));
	}

	protected function btnVolvList_Click() {
		$objUltiAcce = PilaAcceso::Pop('D');
		QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
	}

	public function dtgLogMobilesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("log_mobile_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// log_mobile_list.tpl.php as the included HTML template file
LogMobileListForm::Run('LogMobileListForm');
?>
