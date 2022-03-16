<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ContainerMobileListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the ContainerMobile class.  It uses the code-generated
 * ContainerMobileDataGrid control which has meta-methods to help with
 * easily creating/defining ContainerMobile columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both container_mobile_list.php AND
 * container_mobile_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ContainerMobileListForm extends ContainerMobileListFormBase {
	protected $btnActiMobi;

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

		$this->lblTituForm->Text = 'Ruta-Mobile';

		// Instantiate the Meta DataGrid
		$this->dtgContainerMobiles = new ContainerMobileDataGrid($this);
		$this->dtgContainerMobiles->FontSize = 13;
		$this->dtgContainerMobiles->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgContainerMobiles->CssClass = 'datagrid';
		$this->dtgContainerMobiles->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgContainerMobiles->Paginator = new QPaginator($this->dtgContainerMobiles);
		$this->dtgContainerMobiles->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgContainerMobiles->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgContainerMobiles->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgContainerMobiles->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgContainerMobiles->AddRowAction(new QClickEvent(), new QAjaxAction('dtgContainerMobilesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for container_mobile's properties, or you
		// can traverse down QQN::container_mobile() to display fields that are down the hierarchy)
		$this->dtgContainerMobiles->MetaAddColumn('Id');
		$this->dtgContainerMobiles->MetaAddColumn(QQN::ContainerMobile()->Chofer);
		$colActiMobi = new QDataGridColumn('ACTI-MOB','<?= $_FORM->colActiMobi_Render($_ITEM) ?>');
		$colActiMobi->HtmlEntities = false;
		$colActiMobi->Width = 80;
		$this->dtgContainerMobiles->AddColumn($colActiMobi);
		$this->dtgContainerMobiles->MetaAddColumn(QQN::ContainerMobile()->Container,'Name=Master');
		$this->dtgContainerMobiles->MetaAddColumn('Abierto','Name=Abierto ?');
		$this->dtgContainerMobiles->MetaAddColumn('CantPiezas','Name=Pzas');
		$colPzasSync = new QDataGridColumn('xSINC','<?= $_FORM->colPzasSync_Render($_ITEM) ?>');
		$colPzasSync->HtmlEntities = false;
		$this->dtgContainerMobiles->AddColumn($colPzasSync);
		$colPzasSing = new QDataGridColumn('S.Gest','<?= $_FORM->colPzasSing_Render($_ITEM) ?>');
		$colPzasSing->HtmlEntities = false;
		$this->dtgContainerMobiles->AddColumn($colPzasSing);
		$this->dtgContainerMobiles->MetaAddColumn('Pendientes','Name=Pend');
		$this->dtgContainerMobiles->MetaAddColumn('Entregadas','Name=OKs');
		$this->dtgContainerMobiles->MetaAddColumn('Devueltas','Name=DVs');
		$this->dtgContainerMobiles->MetaAddColumn('CreatedAt','Name=F.Creadion');
		$this->dtgContainerMobiles->MetaAddColumn('UpdatedAt','Name=F.Actu');

        $this->btnExpoExce_Create();
		$this->btnNuevRegi->Visible = false;
		$this->btnActiMobi_Create();
	}



	public function btnActiMobi_Create() {
		$this->btnActiMobi = new QButtonP($this);
		$this->btnActiMobi->Text = TextoIcono('eye','Acti-Mobile');
		$this->btnActiMobi->HtmlEntities = false;
		$this->btnActiMobi->AddAction(new QClickEvent(), new QServerAction('btnActiMobi_Click'));
	}

	public function btnActiMobi_Click() {
		QApplication::Redirect(__SIST__.'/log_mobile_list.php');
	}

	public function colActiMobi_Render(ContainerMobile $objContMobi) {
		$strActiMobi = $objContMobi->Chofer->activoMobileHoy();
		$strColoLetr = $strActiMobi == 'SI' ? 'blue' : 'red';
		return '<span style="color: '.$strColoLetr.'; font-weight: bold">'.$strActiMobi.'</span>';
    }

	public function colPzasSync_Render(ContainerMobile $objContMobi) {
		return $objContMobi->_Pzas_x_Sync_toString();
    }

	public function colPzasSing_Render(ContainerMobile $objContMobi) {
		$intPzasSing = $objContMobi->SinGestionar;
		return '<span style="color: red; font-weight: bold">'.$intPzasSing.'</span>';
    }

	public function dtgContainerMobilesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("container_mobile_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// container_mobile_list.tpl.php as the included HTML template file
ContainerMobileListForm::Run('ContainerMobileListForm');
?>
