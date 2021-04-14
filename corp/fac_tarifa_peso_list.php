<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacTarifaPesoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the FacTarifaPeso class.  It uses the code-generated
 * FacTarifaPesoDataGrid control which has meta-methods to help with
 * easily creating/defining FacTarifaPeso columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both fac_tarifa_peso_list.php AND
 * fac_tarifa_peso_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacTarifaPesoListForm extends FacTarifaPesoListFormBase {
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
		$this->objUsuario = unserialize($_SESSION['User']);
		$this->lblTituForm->Text = 'Tarifa';

		// Instantiate the Meta DataGrid
		$this->dtgFacTarifaPesos = new FacTarifaPesoDataGrid($this);
		$this->dtgFacTarifaPesos->FontSize = 13;
		$this->dtgFacTarifaPesos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgFacTarifaPesos->CssClass = 'datagrid';
		$this->dtgFacTarifaPesos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgFacTarifaPesos->Paginator = new QPaginator($this->dtgFacTarifaPesos);
		$this->dtgFacTarifaPesos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgFacTarifaPesos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgFacTarifaPesos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgFacTarifaPesos->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgFacTarifaPesos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFacTarifaPesosRow_Click'));

		$this->dtgFacTarifaPesos->AdditionalConditions = QQ::Equal(QQN::FacTarifaPeso()->Tarifa->Id,$this->objUsuario->Cliente->TarifaId);

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for fac_tarifa_peso's properties, or you
		// can traverse down QQN::fac_tarifa_peso() to display fields that are down the hierarchy)
		$this->dtgFacTarifaPesos->MetaAddColumn('Id');
		$this->dtgFacTarifaPesos->MetaAddColumn(QQN::FacTarifaPeso()->Tarifa);
		$this->dtgFacTarifaPesos->MetaAddColumn(QQN::FacTarifaPeso()->CodiProdObject);
		$this->dtgFacTarifaPesos->MetaAddColumn(QQN::FacTarifaPeso()->OrigenObject);
		$this->dtgFacTarifaPesos->MetaAddColumn(QQN::FacTarifaPeso()->DestinoObject);
		$this->dtgFacTarifaPesos->MetaAddColumn('PesoInicial');
		$this->dtgFacTarifaPesos->MetaAddColumn('PesoFinal');
		$this->dtgFacTarifaPesos->MetaAddColumn('MontoTarifa');
		$this->dtgFacTarifaPesos->MetaAddColumn('FranqueoPostal');

        $this->btnExpoExce_Create();

    }

	public function dtgFacTarifaPesosRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("fac_tarifa_peso_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// fac_tarifa_peso_list.tpl.php as the included HTML template file
FacTarifaPesoListForm::Run('FacTarifaPesoListForm');
?>
