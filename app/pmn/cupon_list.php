<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CuponListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Cupon class.  It uses the code-generated
 * CuponDataGrid control which has meta-methods to help with
 * easily creating/defining Cupon columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cupon_list.php AND
 * cupon_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CuponListForm extends CuponListFormBase {

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

		$this->lblTituForm->Text = 'Lista de Cupones';

		// Instantiate the Meta DataGrid
		$this->dtgCupons = new CuponDataGrid($this);
		$this->dtgCupons->FontSize = 13;
		$this->dtgCupons->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgCupons->CssClass = 'datagrid';
		$this->dtgCupons->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgCupons->Paginator = new QPaginator($this->dtgCupons);
		$this->dtgCupons->ItemsPerPage = 20;

		// Higlight the datagrid rows when mousing over them
		$this->dtgCupons->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgCupons->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgCupons->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgCupons->AddRowAction(new QClickEvent(), new QAjaxAction('dtgCuponsRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for cupon's properties, or you
		// can traverse down QQN::cupon() to display fields that are down the hierarchy)
		$colNumeCupo = $this->dtgCupons->MetaAddColumn('Numero');
		$colNumeCupo->FilterBoxSize = 3;

		$colPorcDesc = $this->dtgCupons->MetaAddColumn('PorcentajeDescuento');
		$colPorcDesc->Name = '% Descuento';
		$colPorcDesc->FilterBoxSize = 2;

		$colUsuaCarg = $this->dtgCupons->MetaAddColumn('CargadoPor');
		$colUsuaCarg->Name = 'Cargado por';
		$colUsuaCarg->FilterBoxSize = 8;

		$colFechCarg = new QDataGridColumn('FECHA DE CARGA','<?= $_ITEM->CargadoEl->__toString("DD/MM/YYYY") ?>');
		$colFechCarg->OrderByClause = QQ::OrderBy(QQN::Cupon()->CargadoEl, false);
		$colFechCarg->ReverseOrderByClause = QQ::OrderBy(QQN::Cupon()->CargadoEl);
		$colFechCarg->FilterBoxSize = 10;
		$this->dtgCupons->AddColumn($colFechCarg);
	}

    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/cargar_cupon.php');
    }

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// cupon_list.tpl.php as the included HTML template file
CuponListForm::Run('CuponListForm');
?>
