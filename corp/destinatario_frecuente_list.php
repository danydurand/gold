<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/DestinatarioFrecuenteListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the DestinatarioFrecuente class.  It uses the code-generated
 * DestinatarioFrecuenteDataGrid control which has meta-methods to help with
 * easily creating/defining DestinatarioFrecuente columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both destinatario_frecuente_list.php AND
 * destinatario_frecuente_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class DestinatarioFrecuenteListForm extends DestinatarioFrecuenteListFormBase {
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
		$this->lblTituForm->Text = 'Destinatario(s) Frecuente(s)';

		// Instantiate the Meta DataGrid
		$this->dtgDestinatarioFrecuentes = new DestinatarioFrecuenteDataGrid($this);
		$this->dtgDestinatarioFrecuentes->FontSize = 13;
		$this->dtgDestinatarioFrecuentes->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgDestinatarioFrecuentes->CssClass = 'datagrid';
		$this->dtgDestinatarioFrecuentes->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgDestinatarioFrecuentes->Paginator = new QPaginator($this->dtgDestinatarioFrecuentes);
		$this->dtgDestinatarioFrecuentes->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgDestinatarioFrecuentes->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgDestinatarioFrecuentes->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgDestinatarioFrecuentes->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgDestinatarioFrecuentes->AddRowAction(new QClickEvent(), new QAjaxAction('dtgDestinatarioFrecuentesRow_Click'));

		$this->dtgDestinatarioFrecuentes->AdditionalConditions = QQ::Equal(QQN::DestinatarioFrecuente()->ClienteId, $this->objUsuario->ClienteId);

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for destinatario_frecuente's properties, or you
		// can traverse down QQN::destinatario_frecuente() to display fields that are down the hierarchy)

        $colNombDest = new QDataGridColumn('Nombre','<?= $_FORM->dtgDestFrec_NombreRender($_ITEM); ?>');
        $colNombDest->Width = 300;
        $this->dtgDestinatarioFrecuentes->AddColumn($colNombDest);

		$colDireDest = new QDataGridColumn('Direccion','<?= $_FORM->dtgDestFrec_DireccionRender($_ITEM); ?>');
		$colDireDest->Width = 500;
        $this->dtgDestinatarioFrecuentes->AddColumn($colDireDest);

		$colNumeTele = $this->dtgDestinatarioFrecuentes->MetaAddColumn('Telefono');
		$colNumeTele->Width = 200;

		$colDestClie = $this->dtgDestinatarioFrecuentes->MetaAddColumn(QQN::DestinatarioFrecuente()->Destino);
		$colDestClie->Width = 250;

        $this->btnExpoExce_Create();

    }

    public function dtgDestFrec_NombreRender(DestinatarioFrecuente $objDescFrec) {
		if ($objDescFrec) {
			return limpiarCadena($objDescFrec->Nombre);
		}
	}

    public function dtgDestFrec_DireccionRender(DestinatarioFrecuente $objDescFrec) {
		if ($objDescFrec) {
			return limpiarCadena($objDescFrec->Direccion);
		}
	}

	public function dtgDestinatarioFrecuentesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("destinatario_frecuente_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// destinatario_frecuente_list.tpl.php as the included HTML template file
DestinatarioFrecuenteListForm::Run('DestinatarioFrecuenteListForm');
?>
