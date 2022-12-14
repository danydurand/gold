<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacturasEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Facturas class.  It uses the code-generated
 * FacturasMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Facturas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both facturas_edit.php AND
 * facturas_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacturasEditForm extends FacturasEditFormBase {
    protected $dtgNotaFact;
    protected $dtgPagoFact;
    protected $dtgNotaCred;
    protected $dtgGuiaFact;
    protected $btnImprFact;
    protected $lstEstaPago;
    protected $btnMasxAcci;
    protected $intCantHist;
    protected $strAcciAdic;


    // Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

    protected function Setup() {
        $this->mctFacturas = FacturasMetaControl::CreateFromPathInfo($this);
        //if (!$this->objMasterCliente) {
        //    throw new Exception('Could not find a MasterCliente object with PK arguments: ' . $intCodiClie);
        //}
        //$this->blnEditMode = true;
        if (strlen(QApplication::PathInfo(1))) {
            $this->strAcciAdic = QApplication::PathInfo(1);
        }
    }

    //	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

		$this->Setup();

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the FacturasMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		//$this->mctFacturas = FacturasMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Facturas's data fields
		$this->lblId = $this->mctFacturas->lblId_Create();
		$this->lstClienteRetail = $this->mctFacturas->lstClienteRetail_Create();

		$this->lstClienteCorp = $this->mctFacturas->lstClienteCorp_Create();
		$this->lstClienteCorp->Width = 192;
		$this->lstClienteCorp = disableControl($this->lstClienteCorp);
		if ($this->mctFacturas->Facturas->ClienteCorp->EsAliado) {
		    $this->lstClienteCorp->Name = 'Aliado';
        }

		$this->txtCedulaRif = $this->mctFacturas->txtCedulaRif_Create();
		$this->txtCedulaRif->Name = 'RIF';
		$this->txtRazonSocial = $this->mctFacturas->txtRazonSocial_Create();
		$this->txtRazonSocial->Width = 192;
		$this->txtDireccionFiscal = $this->mctFacturas->txtDireccionFiscal_Create();
		$this->txtDireccionFiscal->TextMode = QTextMode::MultiLine;
		$this->txtDireccionFiscal->Rows = 2;
		$this->txtDireccionFiscal->Width = 192;
		$this->txtTelefono = $this->mctFacturas->txtTelefono_Create();
		$this->lstSucursal = $this->mctFacturas->lstSucursal_Create();
		$this->lstReceptoria = $this->mctFacturas->lstReceptoria_Create();
		$this->lstCaja = $this->mctFacturas->lstCaja_Create();
		$this->txtEstatus = $this->mctFacturas->txtEstatus_Create();
		$this->txtEstatusPago = $this->mctFacturas->txtEstatusPago_Create();
		$this->lstEstaPago_Create();
		$this->txtTasa = $this->mctFacturas->txtTasa_Create();
		$this->txtTotal = $this->mctFacturas->txtTotal_Create();
		$this->txtMontoDscto = $this->mctFacturas->txtMontoDscto_Create();
		$this->txtMontoCobrado = $this->mctFacturas->txtMontoCobrado_Create();
		$this->txtMontoAbono = $this->mctFacturas->txtMontoAbono_Create();
		$this->txtMontoAbono->Name = 'Ultimo Abono';
		$this->txtMontoPendiente = $this->mctFacturas->txtMontoPendiente_Create();
		$this->txtNumero = $this->mctFacturas->txtNumero_Create();
		$this->txtMaquinaFiscal = $this->mctFacturas->txtMaquinaFiscal_Create();
		$this->txtFechaImpresion = $this->mctFacturas->txtFechaImpresion_Create();
		$this->txtHoraImpresion = $this->mctFacturas->txtHoraImpresion_Create();
		$this->chkTieneRetencion = $this->mctFacturas->chkTieneRetencion_Create();
		$this->txtNotaCreditoId = $this->mctFacturas->txtNotaCreditoId_Create();

        if ($this->mctFacturas->EditMode) {
            if ($this->mctFacturas->Facturas->CountNotaEntregasAsFactura() > 0) {
                $this->dtgNotaFact_Create();
            }
        }
        $this->txtReferencia    = disableControl($this->txtReferencia);
        $this->calFecha         = disableControl($this->calFecha);
        $this->txtEstatus       = disableControl($this->txtEstatus);
        $this->txtTasa          = disableControl($this->txtTasa);
        $this->txtTotal         = disableControl($this->txtTotal);
        $this->txtNotaCreditoId = disableControl($this->txtNotaCreditoId);
        $this->txtEstatusPago   = disableControl($this->txtEstatusPago);
        $this->lstSucursal      = disableControl($this->lstSucursal);

        $this->dtgPagoFact_Create();
        if ($this->mctFacturas->Facturas->ClienteCorp->EsAliado) {
            t('Es un aliado, voy a crear el datagrid de las guias');
            $this->dtgGuiaFact_Create();
        } else {
            $this->dtgNotaCred_Create();
        }
        $this->btnImprFact_Create();

        if ($this->objUsuario->LogiUsua != 'ddurand') {
            $this->lstEstaPago       = disableControl($this->lstEstaPago);
            $this->txtMontoCobrado   = disableControl($this->txtMontoCobrado);
            $this->txtMontoAbono     = disableControl($this->txtMontoAbono);
            $this->txtMontoPendiente = disableControl($this->txtMontoPendiente);
            $this->btnDelete->Visible = false;
        }
        //----------------------------------------------------------------
        // Cantidad de Hist??ricos existentes por Tabla y por Referencia.
        //----------------------------------------------------------------
        $this->intCantHist = Log::CountByTablaRef('Facturas',$this->mctFacturas->Facturas->Id);

        $this->btnMasxAcci_Create();
        //----------------------------------------------------------------------------------
        // Luego de crear todos los elementos del formulario, se ejecuta cualquier acci??n
        // determinada por el segundo parametro de invocacion del programa (cuando exista)
        //----------------------------------------------------------------------------------
        if (strlen($this->strAcciAdic) > 0) {
            switch ($this->strAcciAdic) {
                case 'log':
                    $this->btnLogxCamb_Click();
                    break;
                case 'imprimir':
                    $this->btnImprFact_Click();
                    break;
                case 'anular':
                    $this->anularFactura();
                    break;
                case 'recalculo':
                    $this->recalculo();
                    break;
                default:
                    $this->danger("Accion: ".$this->strAcciAdic." no especificada");
            }
        }
        $this->btnDelete->Visible = false;
    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function recalculo() {
        $this->mctFacturas->Facturas->ActualizarMontos();
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id);
    }

    protected function anularFactura() {
	    $intCantPago = $this->mctFacturas->Facturas->CountFacturaPagosesAsFactura();
	    if ($intCantPago) {
	        $this->warning('Existen pagos relacionados, elim??nelos antes de Anular la Factura');
	        return;
        }
        QApplication::Redirect(__SIST__.'/anular_factura.php/'.$this->mctFacturas->Facturas->Id);
    }


    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';
        $intFactIdxx = $this->mctFacturas->Facturas->Id;

        $strTextBoto   = TextoIcono('cog fa-fw','M??s');
        $arrOpciDrop   = array();

        if ($this->intCantHist > 0) {

            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/facturas_edit.php/'.$intFactIdxx.'/log',
                TextoIcono('file-text','Hist??rico')
            );
        }

        if ($this->mctFacturas->EditMode) {
            if ($this->mctFacturas->Facturas->Estatus != 'ANULADA') {
                $arrOpciDrop[] = OpcionDropDown(
                    __SIST__.'/facturas_edit.php/'.$intFactIdxx.'/imprimir',
                    TextoIcono('print fa-lg','Imprimir')
                );
                $arrOpciDrop[] = OpcionDropDown(
                    __SIST__.'/facturas_edit.php/'.$intFactIdxx.'/anular',
                    TextoIcono('cog','Anular')
                );
                $arrOpciDrop[] = OpcionDropDown(
                    __SIST__.'/facturas_edit.php/'.$intFactIdxx.'/recalculo',
                    TextoIcono('cogs','Recalculo')
                );
            } else {
                $arrOpciDrop[] = OpcionDropDown(
                    __SIST__.'/facturas_edit.php/'.$intFactIdxx.'/anular',
                    TextoIcono('eye','Consultar Anulaci??n')
                );
            }
        }

        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop, 'f');
        $this->btnMasxAcci->Visible  = $this->mctFacturas->EditMode;
    }


    protected function lstEstaPago_Create() {
	    $this->lstEstaPago = new QListBox($this);
	    $this->lstEstaPago->Name = 'Estatus Pago';
	    $arrEstaPago = ['PENDIENTE','PORCONCILIAR','CONCILIADO','PAGOPARCIAL','INCONCILIABLE'];
        foreach ($arrEstaPago as $strEstaPago) {
            $blnSeleRegi = $this->mctFacturas->Facturas->EstatusPago == $strEstaPago;
            $this->lstEstaPago->AddItem($strEstaPago,$strEstaPago,$blnSeleRegi);
	    }
	    $this->lstEstaPago->AddAction(new QChangeEvent(), new QAjaxAction('lstEstaPago_Change'));
    }

    protected function btnVolvList_Click() {
        //$objUltiAcce = PilaAcceso::Pop('D');
        $strPagiReto = __SIST__.'/facturas_list.php';
        QApplication::Redirect($strPagiReto);
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/emitir_factura_corp.php');
    }

    protected function btnImprFact_Create() {
        $this->btnImprFact = new QButtonI($this);
        $this->btnImprFact->Text = TextoIcono('print fa-lg','Imp');
        $this->btnImprFact->AddAction(new QClickEvent(), new QAjaxAction('btnImprFact_Click'));
        if (!$this->mctFacturas->EditMode) {
            $this->btnImprFact->Visible = false;
        }
    }


    protected function dtgNotaFact_Create() {
        $this->dtgNotaFact = new QDataGrid($this);
        $this->dtgNotaFact->FontSize = 12;
        $this->dtgNotaFact->ShowFilter = false;

        $this->dtgNotaFact->CssClass = 'datagrid';
        $this->dtgNotaFact->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgNotaFact->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgNotaFact->AddRowAction(new QClickEvent(), new QAjaxAction('dtgNotaFactRow_Click'));

        $this->dtgNotaFact->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgNotaFact->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgNotaFact->UseAjax = true;

        $this->dtgNotaFact->SetDataBinder('dtgNotaFact_Bind');

        $this->dtgNotaFactColumns();
    }

    protected function dtgNotaFact_Bind() {
        $this->dtgNotaFact->DataSource = $this->mctFacturas->Facturas->GetNotaEntregaAsFacturaArray();
    }

    public function dtgNotaFactRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect(__SIST__."/nota_entrega_edit.php/$intId");
    }

    protected function dtgNotaFactColumns() {
        $colRefeNota = new QDataGridColumn($this);
        $colRefeNota->Name = QApplication::Translate('Manifiesto');
        $colRefeNota->Html = '<?= $_ITEM->Referencia ?>';
        $colRefeNota->Width = 180;
        $this->dtgNotaFact->AddColumn($colRefeNota);

        $colFechMani = new QDataGridColumn($this);
        $colFechMani->Name = QApplication::Translate('Fecha');
        $colFechMani->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>';
        $colFechMani->Width = 100;
        $this->dtgNotaFact->AddColumn($colFechMani);

        $colEstaNota = new QDataGridColumn($this);
        $colEstaNota->Name = QApplication::Translate('Estatus');
        $colEstaNota->Html = '<?= $_ITEM->Estatus ?>';
        $colEstaNota->Width = 100;
        $this->dtgNotaFact->AddColumn($colEstaNota);

        $colServImpo = new QDataGridColumn($this);
        $colServImpo->Name = QApplication::Translate('S.Impor');
        $colServImpo->Html = '<?= $_ITEM->ServicioImportacion ?>';
        $this->dtgNotaFact->AddColumn($colServImpo);

        $colCantPiez = new QDataGridColumn($this);
        $colCantPiez->Name = QApplication::Translate('Guias');
        $colCantPiez->Html = '<?= $_ITEM->Piezas ?>';
        $colCantPiez->Width = 60;
        $this->dtgNotaFact->AddColumn($colCantPiez);

        $colCantLibr = new QDataGridColumn($this);
        $colCantLibr->Name = "Peso";
        $colCantLibr->Html = '<?= $_ITEM->ServicioImportacion == "AER" ? nf($_ITEM->Kilos) : nf($_ITEM->PiesCub) ?>';
        $colCantLibr->Width = 60;
        $colCantLibr->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgNotaFact->AddColumn($colCantLibr);

        $colTotaNota = new QDataGridColumn($this);
        $colTotaNota->Name = QApplication::Translate('Total');
        $colTotaNota->Html = '<?= nf($_ITEM->Total) ?>';
        $colTotaNota->Wrap = true;
        $colTotaNota->Width = 70;
        $colTotaNota->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgNotaFact->AddColumn($colTotaNota);

    }


    protected function dtgPagoFact_Create() {
        $this->dtgPagoFact = new QDataGrid($this);
        $this->dtgPagoFact->FontSize = 12;
        $this->dtgPagoFact->ShowFilter = false;

        $this->dtgPagoFact->CssClass = 'datagrid';
        $this->dtgPagoFact->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPagoFact->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgPagoFact->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPagoFactRow_Click'));

        $this->dtgPagoFact->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgPagoFact->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgPagoFact->UseAjax = true;

        $this->dtgPagoFact->SetDataBinder('dtgPagoFact_Bind');

        $this->dtgPagoFactColumns();
    }

    protected function dtgPagoFact_Bind() {
        $this->dtgPagoFact->DataSource = $this->mctFacturas->Facturas->GetPagosCorpAsFacturaPagoCorpArray();
    }

    public function dtgPagoFactRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect(__SIST__."/pagos_corp_edit.php/$intId");
    }

    protected function dtgPagoFactColumns() {
        $colpagoIdxx = new QDataGridColumn($this);
        $colpagoIdxx->Name = 'Id';
        $colpagoIdxx->Html = '<?= $_ITEM->Id ?>';
        $colpagoIdxx->Width = 40;
        $colpagoIdxx->VerticalAlign = QVerticalAlign::Top;
        $this->dtgPagoFact->AddColumn($colpagoIdxx);

        $colRefePago = new QDataGridColumn($this);
        $colRefePago->Name = QApplication::Translate('Referencia');
        $colRefePago->Html = '<?= substr($_ITEM->Referencia,0,30); ?>';
        $colRefePago->Width = 250;
        $colRefePago->VerticalAlign = QVerticalAlign::Top;
        $this->dtgPagoFact->AddColumn($colRefePago);

        $colFechPago = new QDataGridColumn($this);
        $colFechPago->Name = QApplication::Translate('Fecha');
        $colFechPago->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>';
        $colFechPago->Width = 85;
        $colFechPago->VerticalAlign = QVerticalAlign::Top;
        $this->dtgPagoFact->AddColumn($colFechPago);

        $colEstaPago = new QDataGridColumn($this);
        $colEstaPago->Name = QApplication::Translate('Estatus');
        $colEstaPago->Html = '<?= $_ITEM->Estatus ?>';
        $colEstaPago->Width = 90;
        $colEstaPago->VerticalAlign = QVerticalAlign::Top;
        $this->dtgPagoFact->AddColumn($colEstaPago);

        $colFormPago = new QDataGridColumn($this);
        $colFormPago->Name = QApplication::Translate('F.Pago');
        $colFormPago->Html = '<?= $_ITEM->FormaPago->__toString() ?>';
        $colFormPago->Width = 70;
        $colFormPago->VerticalAlign = QVerticalAlign::Top;
        $this->dtgPagoFact->AddColumn($colFormPago);

        $colMontPago = new QDataGridColumn($this);
        $colMontPago->Name = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto';
        $colMontPago->Html = '<?= nf($_FORM->dtgMontAbon_Render($_ITEM)); ?>';
        $colMontPago->Width = 70;
        $colMontPago->HtmlEntities = false;
        $colMontPago->HorizontalAlign = QHorizontalAlign::Right;
        $colMontPago->VerticalAlign = QVerticalAlign::Top;
        $this->dtgPagoFact->AddColumn($colMontPago);
    }

    public function dtgMontAbon_Render(PagosCorp $objPagoFact) {
        t('Voy a buscar el abono de: '.$objPagoFact->Id.' y '.$this->mctFacturas->Facturas->Id);
        $objPagoDeta = PagosCorpDetail::LoadByPagoCorpIdFacturaId($objPagoFact->Id, $this->mctFacturas->Facturas->Id);
        if ($objPagoDeta) {
            t('Lo encontre');
            return $objPagoDeta->MontoAbonado;
        } else {
            return $objPagoFact->Monto;
        }
    }

    protected function dtgNotaCred_Create() {
        $this->dtgNotaCred = new QDataGrid($this);
        $this->dtgNotaCred->FontSize = 12;
        $this->dtgNotaCred->ShowFilter = false;

        $this->dtgNotaCred->CssClass = 'datagrid';
        $this->dtgNotaCred->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgNotaCred->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgNotaCred->AddRowAction(new QClickEvent(), new QAjaxAction('dtgNotaCredRow_Click'));

        $this->dtgNotaCred->UseAjax = true;

        $this->dtgNotaCred->SetDataBinder('dtgNotaCred_Bind');

        $this->dtgNotaCredColumns();
    }

    protected function dtgNotaCred_Bind() {
        $this->dtgNotaCred->DataSource = $this->mctFacturas->Facturas->GetNotaCreditoCorpAsFacturaArray();
    }

    public function dtgNotaCredRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect(__SIST__."/nota_credito_corp_edit.php/$intId");
    }

    protected function dtgNotaCredColumns() {
        $colRefeNota = new QDataGridColumn($this);
        $colRefeNota->Name = 'Referencia';
        $colRefeNota->Html = '<?= $_ITEM->Referencia ?>';
        $colRefeNota->Width = 150;
        $this->dtgNotaCred->AddColumn($colRefeNota);

        $colFechNota = new QDataGridColumn($this);
        $colFechNota->Name = 'Fecha';
        $colFechNota->Html = '<?= $_ITEM->Fecha ?>';
        $colFechNota->Width = 110;
        $this->dtgNotaCred->AddColumn($colFechNota);

        $colTipoNota = new QDataGridColumn($this);
        $colTipoNota->Name = 'Tipo';
        $colTipoNota->Html = '<?= $_ITEM->Tipo ?>';
        $colTipoNota->Width = 110;
        $this->dtgNotaCred->AddColumn($colTipoNota);

        $colMontNota = new QDataGridColumn($this);
        $colMontNota->Name = 'Monto';
        $colMontNota->Html = '<?= nf($_ITEM->Monto) ?>';
        $this->dtgNotaCred->AddColumn($colMontNota);
    }

    protected function dtgGuiaFact_Create() {
        $this->dtgGuiaFact = new QDataGrid($this);
        $this->dtgGuiaFact->FontSize = 12;
        $this->dtgGuiaFact->ShowFilter = false;

        $this->dtgGuiaFact->CssClass = 'datagrid';
        $this->dtgGuiaFact->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaFact->UseAjax = true;

        $this->dtgGuiaFact->SetDataBinder('dtgGuiaFact_Bind');

        $this->dtgGuiaFactColumns();
    }

    protected function dtgGuiaFact_Bind() {
        $this->dtgGuiaFact->DataSource = $this->mctFacturas->Facturas->GetFacturaGuiasAsFacturaArray();
    }

    protected function dtgGuiaFactColumns() {
        $colNumeGuia = new QDataGridColumn($this);
        $colNumeGuia->Name = 'Referencia';
        $colNumeGuia->Html = '<?= $_ITEM->Guia->Numero ?>';
        $colNumeGuia->Width = 150;
        $this->dtgGuiaFact->AddColumn($colNumeGuia);

        $colFechGuia = new QDataGridColumn($this);
        $colFechGuia->Name = 'Fecha';
        $colFechGuia->Html = '<?= $_ITEM->Guia->Fecha ?>';
        $colFechGuia->Width = 110;
        $this->dtgGuiaFact->AddColumn($colFechGuia);

        $colDestGuia = new QDataGridColumn($this);
        $colDestGuia->Name = 'Dest';
        $colDestGuia->Html = '<?= $_ITEM->Guia->Destino->Iata ?>';
        $colDestGuia->Width = 110;
        $this->dtgGuiaFact->AddColumn($colDestGuia);

        $colPiesCubi = new QDataGridColumn($this);
        $colPiesCubi->Name = 'Pies3';
        $colPiesCubi->Html = '<?= $_ITEM->Guia->PiesCub ?>';
        $colPiesCubi->Width = 110;
        $this->dtgGuiaFact->AddColumn($colPiesCubi);

        $colTotaGuia = new QDataGridColumn($this);
        $colTotaGuia->Name = 'Monto';
        $colTotaGuia->Html = '<?= nf($_ITEM->Guia->Total) ?>';
        $this->dtgGuiaFact->AddColumn($colTotaGuia);
    }

    protected function determinarPosicion() {
        if ($this->mctFacturas->Facturas && !isset($_SESSION['DataFacturas'])) {
            $_SESSION['DataFacturas'] = serialize(array($this->mctFacturas->Facturas));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataFacturas']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctFacturas->Facturas->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Facturas',$this->mctFacturas->Facturas->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function lstEstaPago_Change() {
        if ($this->lstEstaPago->SelectedValue == 'PENDIENTE') {
            $this->txtMontoPendiente->Text = $this->txtTotal->Text;
            $this->txtMontoCobrado->Text   = 0;
        }
    }

    protected function btnImprFact_Click() {
        $this->mctFacturas->Facturas->Estatus = 'IMPRESA';
        $this->mctFacturas->Facturas->Save();
        $arrLogxCamb['strNombTabl'] = 'Facturas';
        $arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
        $arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Referencia;
        $arrLogxCamb['strDescCamb'] = 'Impresa';
        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id;
        LogDeCambios($arrLogxCamb);
        QApplication::Redirect(__SIST__.'/factura_html2pdf.php?intIdxxFact=' . $this->mctFacturas->Facturas->Id);
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
        $objRegiViej = clone $this->mctFacturas->Facturas;
        $this->txtEstatusPago->Text = $this->lstEstaPago->SelectedValue;
        if ($this->mctFacturas->EditMode) {
            $this->txtUpdatedBy->Text = $this->objUsuario->CodiUsua;
        }
		$this->mctFacturas->SaveFacturas();
		if ($this->mctFacturas->EditMode) {
			//-------------------------------------------------------------
			// Se verifican la existencia de algun cambio en algun dato
			//-------------------------------------------------------------
			$objRegiNuev = $this->mctFacturas->Facturas;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Facturas';
				$arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Referencia;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacci??n Exitosa !!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Facturas';
			$arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Referencia;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacci??n Exitosa !!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        //--------------------------------------------------------
        // Las notas de entrega asociadas, deben "des-asociarse"
        //--------------------------------------------------------
        $arrNotaFact = $this->mctFacturas->Facturas->GetNotaEntregaAsFacturaArray();
        foreach ($arrNotaFact as $objNotaFact) {
            $objNotaFact->asociandoNotaConFactura(null);
        }
        $arrPagoFact = $this->mctFacturas->Facturas->GetPagosCorpAsFacturaPagoCorpArray();
        foreach ($arrPagoFact as $objPagoFact) {
            $objPagoFact->invalidarPago($this->mctFacturas->Facturas->Id);
        }
        if ($blnTodoOkey) {
            $this->mctFacturas->DeleteFacturas();
            $arrLogxCamb['strNombTabl'] = 'Facturas';
            $arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Referencia;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// facturas_edit.tpl.php as the included HTML template file
FacturasEditForm::Run('FacturasEditForm');
?>