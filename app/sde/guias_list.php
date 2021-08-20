<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiasListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Guias class.  It uses the code-generated
 * GuiasDataGrid control which has meta-methods to help with
 * easily creating/defining Guias columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guias_list.php AND
 * guias_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiasListForm extends GuiasListFormBase {
    /* @var $objUsuario Usuario */
    protected $objUsuario;
    protected $objClauWher;
    protected $blnHayxCond;
    protected $arrGuiaLote;

    protected $txtNumeGuia;
    protected $txtBuscCodi;
    protected $txtBuscNomb;
    protected $lstClieGuia;
    protected $calFechInic;
    protected $calFechFina;
    protected $txtNumePrec;

    protected $lstTipoPago;
    protected $lstCodiOrig;
    protected $lstCodiDest;
    protected $lstTienPodx;
    protected $lstCodiCkpt;
    protected $chkGuiaAnul;

    protected $btnBuscRegi;

    protected $btnImprLote;
    protected $btnCancel;

	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

//		protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

        $this->lblTituForm->Text = 'Guias';

		// Instantiate the Meta DataGrid
		$this->dtgGuiases = new GuiasDataGrid($this);
		$this->dtgGuiases->FontSize = 13;
		$this->dtgGuiases->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgGuiases->CssClass = 'datagrid';
		$this->dtgGuiases->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgGuiases->Paginator = new QPaginator($this->dtgGuiases);
		$this->dtgGuiases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $this->dtgGuiases->SortColumnIndex = 0;
        $this->dtgGuiases->SortDirection = 1;

        // Higlight the datagrid rows when mousing over them
		$this->dtgGuiases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGuiases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgGuiases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgGuiases->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guias's properties, or you
		// can traverse down QQN::guias() to display fields that are down the hierarchy)
		$this->dtgGuiases->MetaAddColumn('Id');
		$this->dtgGuiases->MetaAddColumn('Tracking','Name=Guia-Cliente');

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guias()->Fecha, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guias()->Fecha);
        $this->dtgGuiases->AddColumn($colFechGuia);

        $colOrigGuia = $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Origen->Iata,'Name=Orig');
        $colOrigGuia->FilterType = QFilterType::TextFilter;
        $colOrigGuia->Filter = QQ::Like(QQN::Guias()->Origen->Iata,null);

        $colDestGuia = $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Destino->Iata, 'Name=Dest');
        $colDestGuia->FilterType = QFilterType::TextFilter;
        $colDestGuia->Filter = QQ::Like(QQN::Guias()->Destino->Iata,null);

        $this->dtgGuiases->MetaAddColumn('ServicioImportacion','Name=S.Impor');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Piezas, 'Name=Pzas');
        $colUltiCkpt = new QDataGridColumn('U.Ckpt','<?= $_ITEM->ultimoCheckpoint(); ?>');
        $this->dtgGuiases->AddColumn($colUltiCkpt);
        $this->dtgGuiases->MetaAddColumn('NombreRemitente', 'Name=Remitente');
        $this->dtgGuiases->MetaAddColumn('NombreDestinatario','Name=Destinatario');
        $this->dtgGuiases->MetaAddColumn('Total');

        $this->dtgGuiases->SetDataBinder('dtgGuias_Bind');

        $this->btnExpoExce_Create();
        $this->btnExpoExce->Visible = true;

    }

    protected function dtgGuias_Bind() {
        if (isset($_SESSION['CritCons'])) {
            $this->objClauWher = unserialize($_SESSION['CritCons']);
        } else {
            if (!$this->blnHayxCond) {
                $this->objClauWher[] = QQ::All();
            }
        }

        $this->dtgGuiases->TotalItemCount = Guias::QueryCount(QQ::AndCondition($this->objClauWher));

        $arrGuiaNaci = Guias::QueryArray(
            QQ::AndCondition($this->objClauWher),
            QQ::Clause(
                $this->dtgGuiases->OrderByClause,
                $this->dtgGuiases->LimitClause
            )
        );

        $this->dtgGuiases->DataSource = $arrGuiaNaci;
        $_SESSION['DataGuia'] = serialize($arrGuiaNaci);

        //------------------------------------------------------------------------
        // Query que obtiene todas las guías de la lista sin límite de paginación
        //------------------------------------------------------------------------

        $arrGuiaLote = Guias::QueryArray(
            QQ::AndCondition($this->objClauWher),
            QQ::Clause($this->dtgGuiases->OrderByClause)
        );

        $this->arrGuiaLote = array();

        foreach($arrGuiaLote as $objGuiaLote) {
            $this->arrGuiaLote[] = $objGuiaLote->Id;
        }
    }


    public function dtgGuiasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        //QApplication::Redirect("guias_edit.php/$intId");
        QApplication::Redirect(__SIST__."/consulta_guia_new.php/$intId");
	}

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guias_list.tpl.php as the included HTML template file
GuiasListForm::Run('GuiasListForm');
?>
