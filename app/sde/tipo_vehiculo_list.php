<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TipoVehiculoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the TipoVehiculo class.  It uses the code-generated
 * TipoVehiculoDataGrid control which has meta-methods to help with
 * easily creating/defining TipoVehiculo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tipo_vehiculo_list.php AND
 * tipo_vehiculo_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TipoVehiculoListForm extends TipoVehiculoListFormBase {
	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

	//	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();
		$this->lblTituForm->Text = 'Tipos de Vehículos';

		// Instantiate the Meta DataGrid
		$this->dtgTipoVehiculos = new TipoVehiculoDataGrid($this);
		$this->dtgTipoVehiculos->FontSize = 13;
		$this->dtgTipoVehiculos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgTipoVehiculos->CssClass = 'datagrid';
		$this->dtgTipoVehiculos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgTipoVehiculos->Paginator = new QPaginator($this->dtgTipoVehiculos);
		$this->dtgTipoVehiculos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgTipoVehiculos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgTipoVehiculos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgTipoVehiculos->RowActionParameterHtml = '<?= $_ITEM->TipoVehi ?>';
		$this->dtgTipoVehiculos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTipoVehiculosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for tipo_vehiculo's properties, or you
		// can traverse down QQN::tipo_vehiculo() to display fields that are down the hierarchy)
		$colTipoVehi = $this->dtgTipoVehiculos->MetaAddColumn('TipoVehi');
		$colTipoVehi->Name = 'Tipo Vehículo';

		$colDescTipo = $this->dtgTipoVehiculos->MetaAddColumn('DescTipo');
		$colDescTipo->Name = 'Descripción';

		$colCapaMaxi = $this->dtgTipoVehiculos->MetaAddColumn('CapacidadMaxima');
		$colCapaMaxi->Name = 'Capacidad';

		$colCostKmxx = $this->dtgTipoVehiculos->MetaAddColumn('CostoKm');
		$colCostKmxx->Name = 'Costo Km';
        $this->btnExpoExce_Create();
    }

	public function dtgTipoVehiculosRow_Click($strFormId, $strControlId, $strParameter) {
        $strTipoVehi = strval($strParameter);
        QApplication::Redirect("tipo_vehiculo_edit.php/$strTipoVehi");
	}		
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// tipo_vehiculo_list.tpl.php as the included HTML template file
TipoVehiculoListForm::Run('TipoVehiculoListForm');
?>