<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/AsistenteListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Asistente class.  It uses the code-generated
 * AsistenteDataGrid control which has meta-methods to help with
 * easily creating/defining Asistente columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both asistente_list.php AND
 * asistente_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class AsistenteListForm extends AsistenteListFormBase {
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

		$this->lblTituForm->Text = 'Asistentes';

		// Instantiate the Meta DataGrid
		$this->dtgAsistentes = new AsistenteDataGrid($this);
		$this->dtgAsistentes->FontSize = 13;
		$this->dtgAsistentes->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgAsistentes->CssClass = 'datagrid';
		$this->dtgAsistentes->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgAsistentes->Paginator = new QPaginator($this->dtgAsistentes);
		$this->dtgAsistentes->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgAsistentes->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgAsistentes->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgAsistentes->RowActionParameterHtml = '<?= $_ITEM->CodiAsis ?>';
		$this->dtgAsistentes->AddRowAction(new QClickEvent(), new QAjaxAction('dtgAsistentesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for asistente's properties, or you
		// can traverse down QQN::asistente() to display fields that are down the hierarchy)
		$colCodiAsis = $this->dtgAsistentes->MetaAddColumn('CodiAsis');
		$colCodiAsis->Name = 'Asistente';

		$coNombAsis = $this->dtgAsistentes->MetaAddColumn('NombAsis');
		$coNombAsis->Name = 'Nombres';

		$colApelAsis = $this->dtgAsistentes->MetaAddColumn('ApelAsis');
		$colApelAsis->Name = 'Apellidos';

		$colNumeCedu = $this->dtgAsistentes->MetaAddColumn('NumeCedu');
		$colNumeCedu->Name = 'Cédula';

		$colNumeTele = $this->dtgAsistentes->MetaAddColumn('NumeTele');
		$colNumeTele->Name = 'Teléfono';

		$this->dtgAsistentes->MetaAddColumn('TextObse');
		$this->dtgAsistentes->MetaAddColumn(QQN::Asistente()->CodiEstaObject);

		$colCodiDisp = $this->dtgAsistentes->MetaAddTypeColumn('CodiDisp', 'DisponibleType');
		$colCodiDisp->Name = 'Disponible?';

		$this->dtgAsistentes->MetaAddTypeColumn('CodiStat', 'StatusType');

        $this->btnExpoExce_Create();

    }

	public function dtgAsistentesRow_Click($strFormId, $strControlId, $strParameter) {
        $intCodiAsis = intval($strParameter);
        QApplication::Redirect("asistente_edit.php/$intCodiAsis");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// asistente_list.tpl.php as the included HTML template file
AsistenteListForm::Run('AsistenteListForm');
?>
