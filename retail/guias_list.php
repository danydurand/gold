<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
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
    protected $btnGuiaExpo;

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
    protected $objProdNaci;
    protected $objProdExpa;
    protected $objProdExpm;
    protected $arrCodiProd;

    protected $btnFactGuia;
    protected $colRegiSele;

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
        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->objProdNaci = unserialize($_SESSION['ProdNaci']);
        $this->objProdExpa = unserialize($_SESSION['ProdExpa']);
        $this->objProdExpm = unserialize($_SESSION['ProdExpm']);
        $this->arrCodiProd = [$this->objProdNaci->Id, $this->objProdExpa->Id, $this->objProdExpm->Id];

		// Instantiate the Meta DataGrid
		$this->dtgGuiases = new GuiasDataGrid($this);
		$this->dtgGuiases->FontSize = 12;
		$this->dtgGuiases->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgGuiases->CssClass = 'datagrid';
		$this->dtgGuiases->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgGuiases->Paginator = new QPaginator($this->dtgGuiases);
		$this->dtgGuiases->ItemsPerPage = 13;

        $this->dtgGuiases->SortColumnIndex = 1;
        $this->dtgGuiases->SortDirection = 1;

        // Higlight the datagrid rows when mousing over them
		$this->dtgGuiases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGuiases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgGuiases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgGuiases->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgGuiasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guias's properties, or you
		// can traverse down QQN::guias() to display fields that are down the hierarchy)
		//$this->dtgGuiases->MetaAddColumn('Id');

        $this->colRegiSele = new QCheckBoxColumn('', $this->dtgGuiases);
        $this->colRegiSele->PrimaryKey = 'Id';
        $this->dtgGuiases->AddColumn($this->colRegiSele);
        $this->dtgGuiases->AddAction(new QClickEvent(), new QAjaxAction('colRegiSele_Click'));

        $this->dtgGuiases->MetaAddColumn('Numero','Name=Guia');

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guias()->Fecha, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guias()->Fecha);
        $this->dtgGuiases->AddColumn($colFechGuia);

        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Producto->Codigo,'Name=Prod');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Origen->Iata,'Name=Orig');
        //$this->dtgGuiases->MetaAddColumn(QQN::Guias()->ReceptoriaOrigen->Siglas,'Name=R.Orig');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Destino->Iata, 'Name=Dest');
        //$this->dtgGuiases->MetaAddColumn(QQN::Guias()->ReceptoriaDestino->Siglas, 'Name=R.Dest');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->FormaPago,'Name=F.Pag');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->ClienteCorp->NombClie,'Name=Cliente');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Piezas, 'Name=Pzas');
        /*$colUltiCkpt = new QDataGridColumn('U.Ckpt','<?= $_ITEM->ultimoCheckpoint(); ?>');*/
        //$this->dtgGuiases->AddColumn($colUltiCkpt);
        $this->dtgGuiases->MetaAddColumn('NombreRemitente', 'Name=Remitente');
        $this->dtgGuiases->MetaAddColumn('NombreDestinatario','Name=Destinatario');
        //$this->dtgGuiases->MetaAddColumn('Total');
        $colTotaGuia = new QDataGridColumn('Total','<?= $_FORM->dtgGuiases_Total_Render($_ITEM); ?>');
        $this->dtgGuiases->AddColumn($colTotaGuia);
        $this->dtgGuiases->MetaAddColumn('FacturaId','Name=PreFact');

        $this->dtgGuiases->SetDataBinder('dtgGuias_Bind');

        $this->btnExpoExce_Create();
        $this->btnExpoExce->Visible = true;

        $this->btnGuiaExpo_Create();
        $this->btnFactGuia_Create();

    }

    protected function dtgGuias_Bind() {
        if (isset($_SESSION['CritCons'])) {
            t('Hay un criterio..');
            $this->objClauWher = unserialize($_SESSION['CritCons']);
            unset($_SESSION['CritCons']);
        } else {
            if (!$this->blnHayxCond) {
                $dttFechDhoy = new QDateTime(QDateTime::Now);
                t('Fecha de Hoy: ' . $dttFechDhoy->__toString("YYYY-MM-DD"));

                $this->objClauWher   = QQ::Clause();
                $this->objClauWher[] = QQ::In(QQN::Guias()->ProductoId, $this->arrCodiProd);
                $this->objClauWher[] = QQ::Equal(QQN::Guias()->CreatedBy, $this->objUsuario->CodiUsua);
                //$this->objClauWher[] = QQ::Equal(QQN::Guias()->Fecha,$dttFechDhoy->__toString("YYYY-MM-DD"));
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

        foreach ($arrGuiaLote as $objGuiaLote) {
            $this->arrGuiaLote[] = $objGuiaLote->Id;
        }
    }



    protected function btnNuevRegi_Create() {
        $this->btnNuevRegi = new QButtonP($this);
        $this->btnNuevRegi->Text = TextoIcono('plus-circle','<b>NAC</b>','F','lg');
        $this->btnNuevRegi->HtmlEntities = false;
        $this->btnNuevRegi->AddAction(new QClickEvent(), new QServerAction('btnNuevRegi_Click'));
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/crear_guia_nac.php');
    }

    protected function btnGuiaExpo_Create() {
        $this->btnGuiaExpo = new QButtonP($this);
        $this->btnGuiaExpo->Text = TextoIcono('plus-circle','<b>EXP</b>','F','lg');
        $this->btnGuiaExpo->HtmlEntities = false;
        $this->btnGuiaExpo->AddAction(new QClickEvent(), new QServerAction('btnGuiaExpo_Click'));
    }

    protected function btnFactGuia_Create() {
        $this->btnFactGuia = new QButtonOP($this);
        $this->btnFactGuia->Text = TextoIcono('gg','FACT','F','lg');
        $this->btnFactGuia->HtmlEntities = false;
        $this->btnFactGuia->Visible = false;
        $this->btnFactGuia->AddAction(new QClickEvent(), new QServerAction('btnFactGuia_Click'));
    }

    protected function colRegiSele_Click() {
        $this->mensaje();
        $arrIdxxSele = $this->colRegiSele->GetChangedIds();
        $intCantSele = count($arrIdxxSele);
        if ($intCantSele > 0) {
            $arrIdxxSele   = array_keys($arrIdxxSele);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::Guias()->Id,$arrIdxxSele);
            $objClauWher[] = QQ::Equal(QQN::Guias()->FormaPago,'PPD');
            $objClauWher[] = QQ::IsNull(QQN::Guias()->FacturaId);
            $intCantGuia   = Guias::QueryCount(QQ::AndCondition($objClauWher));
            if ($intCantSele != $intCantGuia) {
                $strTextMens  = 'Solo las Guías <b>PPD sin Factura</b>, podrán Facturarse | ';
                $strTextMens .= 'Seleccionadas: '.$intCantSele.' | Aptas para Facturar: '.$intCantGuia;
                $this->danger($strTextMens);
            }
            $this->btnFactGuia->Visible = true;
        } else {
            $this->btnFactGuia->Visible = false;
        }
    }

    protected function btnFactGuia_Click() {
        $arrIdxxSele = $this->colRegiSele->GetChangedIds();
        $intCantSele = count($arrIdxxSele);
        if ($intCantSele > 0) {
            t('Buscando guias a facturar...');
            //--------------------------------
            // Seleccion de Guias a Facturar
            //--------------------------------
            $arrIdxxSele = array_keys($arrIdxxSele);
            $objClauWher = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::Guias()->Id, $arrIdxxSele);
            $objClauWher[] = QQ::Equal(QQN::Guias()->FormaPago, 'PPD');
            $objClauWher[] = QQ::IsNull(QQN::Guias()->FacturaId);
            $arrGuiaFact   = Guias::QueryArray(QQ::AndCondition($objClauWher));
            t('Voy a crear la factura');
            $mixResuFact = Facturas::crearFactura($arrGuiaFact,$this->objUsuario->CodiUsua);
            t('Regrese de la creacion de la factura');
            if ($mixResuFact instanceof Facturas) {
                QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$mixResuFact->Id);
            } else {
                $this->danger($mixResuFact);
            }
        }
    }

    protected function btnGuiaExpo_Click() {
        QApplication::Redirect(__SIST__.'/crear_guia_exp.php');
    }

    public function dtgGuiases_Total_Render(Guias $objGuia) {
        return !is_null($objGuia) ? nf($objGuia->Total) : null;
    }

    public function dtgGuiasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect(__SIST__."/consulta_guia_new.php/$intId");
	}

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guias_list.tpl.php as the included HTML template file
GuiasListForm::Run('GuiasListForm');
?>
