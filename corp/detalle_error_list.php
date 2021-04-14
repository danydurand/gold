<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/DetalleErrorListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the DetalleError class.  It uses the code-generated
 * DetalleErrorDataGrid control which has meta-methods to help with
 * easily creating/defining DetalleError columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both detalle_error_list.php AND
 * detalle_error_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class DetalleErrorListForm extends DetalleErrorListFormBase {
    protected $mctProcErro;

    protected $calFechEjec;
    protected $calHoraInic;
    protected $calHoraFina;

    protected $lblNombProc;
    protected $lblLogiUsua;
    protected $lblFechEjec;
    protected $lblHoraInic;
    protected $lblHoraFina;
    protected $lblComeProc;

    protected $btnCancel;
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

        $this->lblTituForm->Text = 'Errores del Proceso';
        $this->btnNuevRegi->Visible = false;

		// Instantiate the Meta DataGrid
		$this->dtgDetalleErrors = new DetalleErrorDataGrid($this);
		$this->dtgDetalleErrors->FontSize = 13;
		$this->dtgDetalleErrors->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgDetalleErrors->CssClass = 'datagrid';
		$this->dtgDetalleErrors->AlternateRowStyle->CssClass = 'alternate';

        $this->mctProcErro = ProcesoErrorMetaControl::CreateFromPathInfo($this);
        //-----------------------------------------------------------------------------
        // Los registros de la lista, corresponde al Proceso que entra como parametro
        //-----------------------------------------------------------------------------
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::DetalleError()->ProcesoId,$this->mctProcErro->ProcesoError->Id);
        $this->dtgDetalleErrors->AdditionalConditions = QQ::AndCondition($objClauWher);
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::DetalleError()->Id);
        $this->dtgDetalleErrors->AdditionalClauses = $objClauOrde;

        //------------------------
        // Campos de la cabezera
        //------------------------
        $this->lblNombProc = $this->mctProcErro->lblNombre_Create();
        $this->lblNombProc->Width = 250;
        $this->lblLogiUsua = $this->mctProcErro->lblUsuario_Create();

        $this->calFechEjec = $this->mctProcErro->calFecha_Create();
        $this->calHoraInic = $this->mctProcErro->calHoraInicial_Create();
        $this->calHoraFina = $this->mctProcErro->calHoraFinal_Create();

        $this->lblFechEjec_Create();
        $this->lblHoraInic_Create();
        $this->lblHoraFina_Create();

        $this->lblComeProc = $this->mctProcErro->lblComentario_Create();
        $this->lblComeProc->Width = 250;

		// Add Pagination (if desired)
		$this->dtgDetalleErrors->Paginator = new QPaginator($this->dtgDetalleErrors);
		$this->dtgDetalleErrors->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for detalle_error's properties, or you
		// can traverse down QQN::detalle_error() to display fields that are down the hierarchy)
        $this->dtgDetalleErrors->MetaAddColumn('Referencia');
        $this->dtgDetalleErrors->MetaAddColumn('MensajeError');
        $this->dtgDetalleErrors->MetaAddColumn('Comentario');

        $this->btnCancel_Create();
        $this->btnExpoExce_Create();
        $this->btnExpoExce->Visible = true;
    }

    protected function lblFechEjec_Create() {
        $this->lblFechEjec = new QLabel($this);
        $this->lblFechEjec->Name = QApplication::Translate('Fecha');
        $this->lblFechEjec->Text = $this->calFechEjec->DateTime->__toString("DD/MM/YYYY");
        $this->lblFechEjec->Required = true;
    }

    protected function lblHoraInic_Create() {
        $this->lblHoraInic = new QLabel($this);
        $this->lblHoraInic->Name = QApplication::Translate('H.Inicial');
        $this->lblHoraInic->Text = $this->calFechEjec->DateTime->__toString("hh:MM");
        $this->lblHoraInic->Required = true;
    }

    protected function lblHoraFina_Create() {
        $this->lblHoraFina = new QLabel($this);
        $this->lblHoraFina->Name = QApplication::Translate('H.Final');
        $this->lblHoraFina->Text = $this->calFechEjec->DateTime->__toString('hh:MM');
        $this->lblHoraFina->Required = true;
    }

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = TextoIcono('mail-reply','Volver','F','lg');
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->CausesValidation = false;
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltiAcce->__toString());
    }

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// detalle_error_list.tpl.php as the included HTML template file
DetalleErrorListForm::Run('DetalleErrorListForm');
?>
