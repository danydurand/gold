<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/IncidenciaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Incidencia class.  It uses the code-generated
 * IncidenciaDataGrid control which has meta-methods to help with
 * easily creating/defining Incidencia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both incidencia_list.php AND
 * incidencia_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class IncidenciaListForm extends IncidenciaListFormBase {
    protected $btnCreaRegi;

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

        $this->btnCreaRegi_Create();

		// Instantiate the Meta DataGrid
		$this->dtgIncidencias = new IncidenciaDataGrid($this);
		$this->dtgIncidencias->FontSize = 13;

		// Style the DataGrid (if desired)
		$this->dtgIncidencias->CssClass = 'datagrid';
		$this->dtgIncidencias->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgIncidencias->Paginator = new QPaginator($this->dtgIncidencias);
		$this->dtgIncidencias->ItemsPerPage = 16; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgIncidencias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgIncidencias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgIncidencias->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgIncidencias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgIncidenciasRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for incidencia's properties, or you
		// can traverse down QQN::incidencia() to display fields that are down the hierarchy)
		$colNumeInci = $this->dtgIncidencias->MetaAddColumn('Numero');
		$colNumeInci->FilterBoxSize = 5;

		$colFechIndi = $this->dtgIncidencias->MetaAddColumn('FechaIncidencia');
		$colFechIndi->Name = 'Fecha Incidencia';
		$colFechIndi->FilterBoxSize = 13;

		$colClieIdxx = $this->dtgIncidencias->MetaAddColumn('ClienteId');
		$colClieIdxx->Name = 'Código Lib';
		$colClieIdxx->FilterBoxSize = 7;

		$colNumeGuia = $this->dtgIncidencias->MetaAddColumn('Guia');
		$colNumeGuia->Name = 'N° Guía';
		$colNumeGuia->FilterBoxSize = 8;

		$colNumeTrak = $this->dtgIncidencias->MetaAddColumn('Tracking');
		$colNumeTrak->Name = 'N° Tracking';
		$colNumeTrak->FilterBoxSize = 10;

		$colSucuInci = $this->dtgIncidencias->MetaAddColumn(QQN::Incidencia()->Sucursal->DescEsta);
		$colSucuInci->Name = 'Sucursal';
		$colSucuInci->FilterBoxSize = 6;

		$colMotiInci = $this->dtgIncidencias->MetaAddColumn(QQN::Incidencia()->Motivo);
		$colMotiInci->FilterBoxSize = 23;

		$colLugaInci = $this->dtgIncidencias->MetaAddColumn(QQN::Incidencia()->Lugar);
		$colLugaInci->FilterBoxSize = 13;
	}

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Incidencias';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

    protected function btnCreaRegi_Create() {
        $this->btnCreaRegi = new QButton($this);
        $this->btnCreaRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
        $this->btnCreaRegi->CssClass = 'btn btn-primary';
        $this->btnCreaRegi->HtmlEntities = false;
        $this->btnCreaRegi->AddAction(new QClickEvent(), new QServerAction('btnCreaRegi_Click'));
    }

    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------

    public function btnCreaRegi_Click() {
        QApplication::Redirect('incidencia_edit.php');
    }

public function dtgIncidenciasRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect("incidencia_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// incidencia_list.tpl.php as the included HTML template file
IncidenciaListForm::Run('IncidenciaListForm');
?>
