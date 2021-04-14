<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/RutaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Ruta class.  It uses the code-generated
 * RutaDataGrid control which has meta-methods to help with
 * easily creating/defining Ruta columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both ruta_list.php AND
 * ruta_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class RutaListForm extends RutaListFormBase {
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
		$this->dtgRutas = new RutaDataGrid($this);
		$this->dtgRutas->FontSize = 13;
		$this->dtgRutas->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgRutas->CssClass = 'datagrid';
		$this->dtgRutas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgRutas->Paginator = new QPaginator($this->dtgRutas);
		$this->dtgRutas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgRutas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgRutas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Las Rutas que hayan sido borradas, quedan excluidas de la seleccion
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::IsNull(QQN::Ruta()->DeletedAt);
        $this->dtgRutas->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgRutas->RowActionParameterHtml = '<?= $_ITEM->CodiRuta ?>';
		$this->dtgRutas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgRutasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for ruta's properties, or you
		// can traverse down QQN::ruta() to display fields that are down the hierarchy)
		$this->dtgRutas->MetaAddColumn('CodiRuta');
		$this->dtgRutas->MetaAddColumn('DescRuta');
		$this->dtgRutas->MetaAddColumn('TextObse');
		$colCodiSucu = $this->dtgRutas->MetaAddColumn(QQN::Ruta()->Sucursal->Iata);
		$colCodiSucu->Name = 'Suc';

		$colTipoRuta = $this->dtgRutas->MetaAddTypeColumn('TipoRuta', 'TipoRutaType');
		$colTipoRuta->Name = 'Tipo';

		$this->dtgRutas->MetaAddTypeColumn('CodiStat', 'StatusType');
		//$this->dtgRutas->MetaAddColumn('PorcMedi');

        $this->btnExpoExce_Create();

    }

	public function dtgRutasRow_Click($strFormId, $strControlId, $strParameter) {
        $strCodiRuta = strval($strParameter);
        QApplication::Redirect(__SIST__."/ruta_edit.php/$strCodiRuta");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// ruta_list.tpl.php as the included HTML template file
RutaListForm::Run('RutaListForm');
?>
