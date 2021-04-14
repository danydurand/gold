<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/VehiculoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Vehiculo class.  It uses the code-generated
 * VehiculoDataGrid control which has meta-methods to help with
 * easily creating/defining Vehiculo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both vehiculo_list.php AND
 * vehiculo_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class VehiculoListForm extends VehiculoListFormBase {
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

		$this->lblTituForm->Text = 'Vehículos';

		// Instantiate the Meta DataGrid
		$this->dtgVehiculos = new VehiculoDataGrid($this);
		$this->dtgVehiculos->FontSize = 13;
		$this->dtgVehiculos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgVehiculos->CssClass = 'datagrid';
		$this->dtgVehiculos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgVehiculos->Paginator = new QPaginator($this->dtgVehiculos);
		$this->dtgVehiculos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgVehiculos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgVehiculos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgVehiculos->RowActionParameterHtml = '<?= $_ITEM->CodiVehi ?>';
		$this->dtgVehiculos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgVehiculosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for vehiculo's properties, or you
		// can traverse down QQN::vehiculo() to display fields that are down the hierarchy)
		$colCodiVehi = $this->dtgVehiculos->MetaAddColumn('CodiVehi');
		$colCodiVehi->Name = 'Vehículo';

		$colDescVehi = $this->dtgVehiculos->MetaAddColumn('DescVehi');
		$colDescVehi->Name = 'Descripción';

		$colNumePlac = $this->dtgVehiculos->MetaAddColumn('NumePlac');
		$colNumePlac->Name = 'Placa';

		$this->dtgVehiculos->MetaAddColumn('TextObse');
		$colCodiSucu = $this->dtgVehiculos->MetaAddColumn(QQN::Vehiculo()->Sucursal->Iata);
		$colCodiSucu->Name = 'Suc';

		$colTipoVehi = $this->dtgVehiculos->MetaAddColumn(QQN::Vehiculo()->TipoVehiObject);
		$colTipoVehi->Name = 'Tipo';

		$colCodidisp = $this->dtgVehiculos->MetaAddTypeColumn('CodiDisp', 'DisponibleType');
		$colCodidisp->Name = 'Disponible?';

		$this->dtgVehiculos->MetaAddTypeColumn('CodiStat', 'StatusType');

        $this->btnExpoExce_Create();

    }

	public function dtgVehiculosRow_Click($strFormId, $strControlId, $strParameter) {
        $intCodiVehi = intval($strParameter);
        QApplication::Redirect("vehiculo_edit.php/$intCodiVehi");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// vehiculo_list.tpl.php as the included HTML template file
VehiculoListForm::Run('VehiculoListForm');
?>
