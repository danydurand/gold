<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaPiezasListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the GuiaPiezas class.  It uses the code-generated
 * GuiaPiezasDataGrid control which has meta-methods to help with
 * easily creating/defining GuiaPiezas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_piezas_list.php AND
 * guia_piezas_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiaPiezasListForm extends GuiaPiezasListFormBase {
    protected $btnGrabPodx;
    protected $btnGrabInci;
    protected $colPiezSele;
	protected $btnCancel;
	/* @var $objManiPods Containers */
	protected $objManiPods;

    // Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

    protected function SetupValores() {
        $intManiIdxx = QApplication::PathInfo(0);
        if ($intManiIdxx) {
            $this->objManiPods = Containers::Load($intManiIdxx);
            if (!$this->objManiPods) {
                $this->danger('Manifiesto no Existe');
            } else {
                $strTextMens  = '<b>Manif:</b> '.$this->objManiPods->Numero;
                $strTextMens .= ' | <b>Chofer:</b> '.$this->objManiPods->Chofer->Nombre;
                $strTextMens .= ' | <b>Piezas:</b> '.$this->objManiPods->Piezas;
                $this->info($strTextMens);
            }
        } else {
            $this->danger('Manifiesto sin Referencia');
        }
    }

	protected function Form_Create() {
		parent::Form_Create();

		$this->SetupValores();

		$this->lblTituForm->Text = 'Piezas x Entregar';

		// Instantiate the Meta DataGrid
		$this->dtgGuiaPiezases = new GuiaPiezasDataGrid($this);
		$this->dtgGuiaPiezases->FontSize = 13;
		$this->dtgGuiaPiezases->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgGuiaPiezases->CssClass = 'datagrid';
		$this->dtgGuiaPiezases->AlternateRowStyle->CssClass = 'alternate';

		$arrIdxxPiez = [];
		$arrPiezMani = $this->objManiPods->GetGuiaPiezasAsContainerPiezaArray();
        foreach ($arrPiezMani as $objPiezMani) {
        	if (!$objPiezMani->tieneCheckpoint('OK')) {
                $arrIdxxPiez[] = $objPiezMani->Id;
            }
		}
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::GuiaPiezas()->Id,$arrIdxxPiez);
        $this->dtgGuiaPiezases->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Add Pagination (if desired)
		$this->dtgGuiaPiezases->Paginator = new QPaginator($this->dtgGuiaPiezases);
		$this->dtgGuiaPiezases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgGuiaPiezases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGuiaPiezases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		/*$this->dtgGuiaPiezases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';*/
		//$this->dtgGuiaPiezases->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgGuiaPiezasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guia_piezas's properties, or you
		// can traverse down QQN::guia_piezas() to display fields that are down the hierarchy)
        $this->colPiezSele = new QCheckBoxColumn('', $this->dtgGuiaPiezases);
        $this->colPiezSele->PrimaryKey = 'Id';
        $this->dtgGuiaPiezases->AddColumn($this->colPiezSele);
        $this->dtgGuiaPiezases->AddAction(new QClickEvent(), new QAjaxAction('colPiezSele_Click'));

        //$this->dtgGuiaPiezases->MetaAddColumn('Id');
		$this->dtgGuiaPiezases->MetaAddColumn(QQN::GuiaPiezas()->Guia->Tracking,'Name=Guia Cliente');
		$this->dtgGuiaPiezases->MetaAddColumn('IdPieza');
		/*$colUltiCkpt = new QDataGridColumn('U.Ckpt','<?= $_ITEM->ultimoCheckpoint() ?>');*/
		//$this->dtgGuiaPiezases->AddColumn($colUltiCkpt);
		$colGuiaTran = new QDataGridColumn('G-Tran','<?= $_ITEM->GuiaTransportista() ?>');
		$this->dtgGuiaPiezases->AddColumn($colGuiaTran);
		$this->dtgGuiaPiezases->MetaAddColumn(QQN::GuiaPiezas()->Guia->Destino->Iata,'Name=Dest');
        $this->dtgGuiaPiezases->MetaAddColumn('Descripcion');
        $this->dtgGuiaPiezases->MetaAddColumn('Kilos');
		$this->dtgGuiaPiezases->MetaAddColumn('PiesCub');

        $this->btnExpoExce_Create();
        $this->btnCancel_Create();
        $this->btnGrabPodx_Create();
        $this->btnGrabInci_Create();
        $this->btnNuevRegi->Visible = false;

    }

    protected function btnGrabPodx_Create() {
        $this->btnGrabPodx = new QButtonP($this);
        $this->btnGrabPodx->Text = TextoIcono('check-circle','Grabar POD','F','lg');//'<i class="fa fa-check-circle fa-lg"></i> Grabar POD';
        $this->btnGrabPodx->Visible = false;
        $this->btnGrabPodx->AddAction(new QClickEvent(), new QAjaxAction('btnGrabPodx_Click'));
    }

    protected function btnGrabInci_Create() {
        $this->btnGrabInci = new QButtonL($this);
        $this->btnGrabInci->Text = TextoIcono('cogs','Incidencias','F','lg'); //'<i class="fa fa-cogs fa-lg"></i> Incidencias';
        $this->btnGrabInci->Visible = false;
        $this->btnGrabInci->AddAction(new QClickEvent(), new QAjaxAction('btnGrabInci_Click'));
    }

    protected function colPiezSele_Click() {
        $arrIdxxSele = $this->colPiezSele->GetChangedIds();
        if (count($arrIdxxSele) > 0) {
            $this->btnGrabPodx->Visible = true;
            $this->btnGrabInci->Visible = true;
        } else {
            $this->btnGrabPodx->Visible = false;
            $this->btnGrabInci->Visible = false;
        }
    }

    protected function btnGrabPodx_Click() {
        $arrIdxxSele = $this->colPiezSele->GetChangedIds();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::GuiaPiezas()->Id, array_keys($arrIdxxSele));
        $arrPiezPodx   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
        $intCantGuia   = 0;
        $intCantErro   = 0;
        $objCheckpoint = Checkpoints::LoadByCodigo('OK');
        foreach ($arrPiezPodx as $objPiezPodx) {
			//-------------------------------------------------
			// Se registra un checkpoint para cada pieza
			//-------------------------------------------------
			$arrDatoCkpt             = array();
			$arrDatoCkpt['NumePiez'] = $objPiezPodx->IdPieza;
			$arrDatoCkpt['GuiaAnul'] = false; //$objPiezPodx->Guia->Anulada();
			$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
			$arrDatoCkpt['TextCkpt'] = $objCheckpoint->Descripcion;
			$arrDatoCkpt['CodiRuta'] = ''; //$intCodiRuta;
			$arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
			$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            if ($arrResuGrab['TodoOkey']) {
                $intCantGuia ++;
            } else {
                t($arrResuGrab['MotiNook']);
                $intCantErro ++;
            }
        }
        $this->dtgGuiaPiezases->Refresh();
        UpdateLastCheckpoint();
        $this->objManiPods->ActualizarEstadisticasDeEntrega();
        $this->success("Procesadas exitosamente: $intCantGuia | Con Error: $intCantErro");
	}

    protected function btnGrabInci_Click() {
        $arrIdxxSele = $this->colPiezSele->GetChangedIds();
        $_SESSION['PiezInci'] = array_keys($arrIdxxSele);
        QApplication::Redirect(__SIST__.'/incidencias.php');
	}

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = TextoIcono('mail-reply','Volver','F','lg');
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->CausesValidation = false;
    }

    public function btnCancel_Click() {
		QApplication::Redirect(__SIST__.'/containers_pod_list.php');
	}

	public function dtgGuiaPiezasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("guia_piezas_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_piezas_list.tpl.php as the included HTML template file
GuiaPiezasListForm::Run('GuiaPiezasListForm');
?>
