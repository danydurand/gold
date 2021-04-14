<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CounterListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Counter class.  It uses the code-generated
 * CounterDataGrid control which has meta-methods to help with
 * easily creating/defining Counter columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both counter_list.php AND
 * counter_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CounterListForm extends CounterListFormBase {
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
		$this->dtgCounters = new CounterDataGrid($this);
		$this->dtgCounters->FontSize = 13;
		$this->dtgCounters->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgCounters->CssClass = 'datagrid';
		$this->dtgCounters->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgCounters->Paginator = new QPaginator($this->dtgCounters);
		$this->dtgCounters->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgCounters->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgCounters->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgCounters->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgCounters->AddRowAction(new QClickEvent(), new QAjaxAction('dtgCountersRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for counter's properties, or you
		// can traverse down QQN::counter() to display fields that are down the hierarchy)
		$this->dtgCounters->MetaAddColumn('Id');
		$this->dtgCounters->MetaAddColumn('Descripcion');
		$this->dtgCounters->MetaAddColumn(QQN::Counter()->Sucursal->Iata,'Name=Suc');
		$this->dtgCounters->MetaAddColumn(QQN::Counter()->Ruta);
		//$this->dtgCounters->MetaAddTypeColumn('EntregaInmediata', 'SinoType');
		$this->dtgCounters->MetaAddColumn('Siglas');
		//$this->dtgCounters->MetaAddColumn('LimiteDePaquetes');
		//$this->dtgCounters->MetaAddColumn('CantidadDePaquetes');
		//$this->dtgCounters->MetaAddColumn('CkptRecepcion');
		//$this->dtgCounters->MetaAddColumn('CkptConfirmacion');
		//$this->dtgCounters->MetaAddColumn('CkptAlmacen');
		//$this->dtgCounters->MetaAddColumn('PaisId');
		$this->dtgCounters->MetaAddColumn('StatusId');
		//$this->dtgCounters->MetaAddColumn('Direccion');
		//$this->dtgCounters->MetaAddTypeColumn('ElegirServicio', 'SinoType');
		//$this->dtgCounters->MetaAddTypeColumn('EsRuta', 'SinoType');
		//$this->dtgCounters->MetaAddTypeColumn('SeFactura', 'SinoType');
		//$this->dtgCounters->MetaAddTypeColumn('PermitePago', 'SinoType');
		//$this->dtgCounters->MetaAddColumn('EmailJefeAlmacen');
		//$this->dtgCounters->MetaAddColumn('CkptAntiguedad1');
		//$this->dtgCounters->MetaAddColumn('CkptAntiguedad2');
		//$this->dtgCounters->MetaAddColumn('CkptAntiguedad0');
		//$this->dtgCounters->MetaAddColumn(QQN::Counter()->AliadoComercial);
		//$this->dtgCounters->MetaAddColumn('LimiteKilos');
		//$this->dtgCounters->MetaAddColumn('DependeDe');
		//$this->dtgCounters->MetaAddColumn('DomOrigen');
		//$this->dtgCounters->MetaAddColumn('DomDestino');

        $this->btnExpoExce_Create();

    }

	public function dtgCountersRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("counter_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// counter_list.tpl.php as the included HTML template file
CounterListForm::Run('CounterListForm');
?>
