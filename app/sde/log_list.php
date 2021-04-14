<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/LogListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Log class.  It uses the code-generated
 * LogDataGrid control which has meta-methods to help with
 * easily creating/defining Log columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both log_list.php AND
 * log_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class LogListForm extends LogListFormBase {
	protected $btnLogxReto;
    protected $colEnlaEnti;

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

        $this->btnLogxReto_Create();

		// Instantiate the Meta DataGrid
		$this->dtgLogs = new LogDataGrid($this);
		$this->dtgLogs->FontSize = 13;
		$this->dtgLogs->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgLogs->CssClass = 'datagrid';
		$this->dtgLogs->AlternateRowStyle->CssClass = 'alternate';

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Log()->Id, false);
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Log()->Tabla,$_SESSION['TablRefe']);
		$objClauWher[] = QQ::Equal(QQN::Log()->Ref,$_SESSION['RegiRefe']);
		$this->dtgLogs->AdditionalConditions = QQ::AndCondition($objClauWher);
        $this->dtgLogs->AdditionalClauses = $objClauOrde;

		// Add Pagination (if desired)
		$this->dtgLogs->Paginator = new QPaginator($this->dtgLogs);
		$this->dtgLogs->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgLogs->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgLogs->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable

		/*
		$this->dtgLogs->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgLogs->AddRowAction(new QClickEvent(), new QAjaxAction('dtgLogsRow_Click'));
		*/

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for log's properties, or you
		// can traverse down QQN::log() to display fields that are down the hierarchy)
//		$colLogxIdxx = $this->dtgLogs->MetaAddColumn('Id');
//		$colLogxIdxx->Width = 40;

		$colFechCamb = $this->dtgLogs->MetaAddColumn('Fecha');
		$colFechCamb->Width = 85;

		$colHoraCamb = $this->dtgLogs->MetaAddColumn('Hora');
		$colHoraCamb->Width = 85;

		$colUsuaCamb = $this->dtgLogs->MetaAddColumn('Usuario');
		$colUsuaCamb->Width = 65;
		
		$colTablCamb = $this->dtgLogs->MetaAddColumn('Tabla');
		$colTablCamb->Width = 90;
		
		$colRefeCamb = $this->dtgLogs->MetaAddColumn('Ref');
		$colRefeCamb->Width = 40;
		
		$colNombCamb = $this->dtgLogs->MetaAddColumn('Nombre');
		$colNombCamb->Width = 150;

		$this->dtgLogs->MetaAddColumn('Delicado');

		$colDescCamb = $this->dtgLogs->MetaAddColumn('Descripcion');
		$colDescCamb->FilterBoxSize = 10;

		$this->dtgLogs->MetaAddColumn('Sistema');

		$this->dtgLogs->MetaAddColumn('Ip');

        /*
        $this->colEnlaEnti = new QDataGridColumn('Enlace','<?= $_FORM->dtgLogs_Enlace_Render($_ITEM); ?>');
        $this->colEnlaEnti->HtmlEntities = false;
        $this->dtgLogs->AddColumn($this->colEnlaEnti);
        */
	}

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Histórico de Cambios';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

    protected function btnLogxReto_Create() {
        $this->btnLogxReto = new QButton($this);
        $this->btnLogxReto->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
        $this->btnLogxReto->CssClass = 'btn btn-warning btn-sm';
        $this->btnLogxReto->HtmlEntities = false;
        $this->btnLogxReto->AddAction(new QClickEvent(), new QServerAction('btnLogxReto_Click'));
    }

    //public function dtgLogs_Enlace_Render(Log $objLog) {
    //    if (strlen($objLog->Enlace) > 0) {
    //        return $objLog->__toStringEnlace();
    //    } else {
    //        return null;
    //    }
    //}

    //-----------------------------------
    // Acciones relativa a los Objetos
    //-----------------------------------

	public function dtgLogsRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect("log_edit.php/$intId");
	}

    public function btnLogxReto_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// log_list.tpl.php as the included HTML template file
LogListForm::Run('LogListForm');
?>
