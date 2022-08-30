<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/PagosCorpEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the PagosCorp class.  It uses the code-generated
 * PagosCorpMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a PagosCorp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both pagos_corp_edit.php AND
 * pagos_corp_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class RegistrarPago extends PagosCorpEditFormBase {
    /* @var $objUsuaConn UsuarioConnect */
    protected $dtgFactClie;
    protected $dtgFactPaga;
    protected $objUsuaConn;
    protected $arrFactPend = [];
    protected $arrFactPaga;
    protected $objClieSele;
    protected $lstNotaCred;
    protected $arrNotaClie = [];

    protected $objFactEdit;
    protected $txtNumeRefe;
    protected $txtMontAbon;
    protected $decMontPend;
    protected $btnSaveAbon;
    protected $btnCancAbon;

    protected $colFactSele;
    protected $btnExclFact;
    protected $objProcEjec;
    protected $lblInfoUsua;



    // Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

    //	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

		//$this->objUsuaConn = unserialize($_SESSION['User']);
		$this->lblTituForm->Text = 'Registrar Pago';

		$strNombProc = 'Registrar Pago';
		$this->objProcEjec = CrearProceso($strNombProc);

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the PagosCorpMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctPagosCorp = PagosCorpMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on PagosCorp's data fields
		$this->lblId = $this->mctPagosCorp->lblId_Create();

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Like(QQN::FormaPago()->ParaPagoEn,'%CONNECT%');
        $objClauWher[] = QQ::Like(QQN::FormaPago()->StatusId,SinoType::SI);
		$this->lstFormaPago = $this->mctPagosCorp->lstFormaPago_Create(null,QQ::AndCondition($objClauWher));
		$this->lstFormaPago->Width = 210;
        $this->lstFormaPago->AddAction(new QChangeEvent(), new QAjaxAction('lstFormaPago_Change'));

        $objClauOrde = QQ::OrderBy(QQN::MasterCliente()->NombClie);
		$this->lstClienteCorp = $this->mctPagosCorp->lstClienteCorp_Create(null,null,$objClauOrde);
		$this->lstClienteCorp->Width = 210;
		$this->lstClienteCorp->AddAction(new QChangeEvent(), new QAjaxAction('lstClienteCorp_Change'));

		$this->txtReferencia = $this->mctPagosCorp->txtReferencia_Create();
		$this->txtReferencia->Placeholder = 'Nro de Documento';
		$this->txtReferencia->Width = 210;

		$this->calFecha = $this->mctPagosCorp->calFecha_Create();
		$this->txtMonto = $this->mctPagosCorp->txtMonto_Create();
		$this->txtMonto->Width = 210;
		$this->txtMonto = disableControl($this->txtMonto);

		$this->txtEstatus = $this->mctPagosCorp->txtEstatus_Create();
		$this->txtObservacion = $this->mctPagosCorp->txtObservacion_Create();
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtObservacion->Rows = 10;
		$this->txtObservacion->Width = 450;
		$this->calCreatedAt = $this->mctPagosCorp->calCreatedAt_Create();
		$this->calUpdatedAt = $this->mctPagosCorp->calUpdatedAt_Create();
		$this->calDeletedAt = $this->mctPagosCorp->calDeletedAt_Create();
		$this->txtCreatedBy = $this->mctPagosCorp->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctPagosCorp->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctPagosCorp->txtDeletedBy_Create();

        $this->lstNotaCred_Create();
        $this->dtgFactClie_Create();
        $this->dtgFactPaga_Create();

        $this->txtNumeRefe_Create();
        $this->txtMontAbon_Create();
        $this->btnSaveAbon_Create();
        $this->btnCancAbon_Create();

        $this->btnExclFact_Create();

        $this->aceptarValores(false);
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblInfoUsua_Create() {
	    $this->lblInfoUsua = new QLabel($this);
	    $this->lblInfoUsua->Text = '';
    }

    protected function txtNumeRefe_Create() {
	    $this->txtNumeRefe = new QTextBox($this);
	    $this->txtNumeRefe->Name = 'Referencia';
	    $this->txtNumeRefe->Width = 100;
	    $this->txtNumeRefe->Visible = false;
	    $this->txtNumeRefe->ForeColor = 'blue';
	    $this->txtNumeRefe->Enabled = false;
    }

    protected function txtMontAbon_Create() {
	    $this->txtMontAbon = new QTextBox($this);
	    $this->txtMontAbon->Name = 'Abono';
	    $this->txtMontAbon->Width = 100;
	    $this->txtMontAbon->Visible = false;
    }

    protected function btnSaveAbon_Create() {
	    $this->btnSaveAbon = new QButtonS($this);
	    $this->btnSaveAbon->Text = TextoIcono('check','','F','lg');
	    $this->btnSaveAbon->Visible = false;
        $this->btnSaveAbon->AddAction(new QClickEvent(), new QAjaxAction('btnSaveAbon_Click'));
    }

    protected function btnCancAbon_Create() {
        $this->btnCancAbon = new QButtonW($this);
        $this->btnCancAbon->Text = TextoIcono('times-circle','','F','lg');
        $this->btnCancAbon->Visible = false;
        $this->btnCancAbon->AddAction(new QClickEvent(), new QAjaxAction('btnCancAbon_Click'));
    }

    protected function btnExclFact_Create() {
        $this->btnExclFact = new QButtonP($this);
        $this->btnExclFact->Text = TextoIcono('times-circle','Excluir-Fact','F','lg');
        $this->btnExclFact->AddAction(new QClickEvent(), new QAjaxAction('btnExclFact_Click'));
    }

    protected function btnCancAbon_Click() {
        $this->editarAbono();
    }

    protected function aceptarValores($blnAcepValo=true) {
        if ($blnAcepValo) {
            $this->lstFormaPago    = enableControl($this->lstFormaPago);
            $this->calFecha        = enableControl($this->calFecha);
            $this->txtMontAbon     = enableControl($this->txtMontAbon);
            $this->lstNotaCred     = enableControl($this->lstNotaCred);
            $this->txtReferencia   = enableControl($this->txtReferencia);
            $this->txtObservacion  = enableControl($this->txtObservacion);
        } else {
            $this->lstFormaPago    = disableControl($this->lstFormaPago);
            $this->calFecha        = disableControl($this->calFecha);
            $this->txtMontAbon     = disableControl($this->txtMontAbon);
            $this->lstNotaCred     = disableControl($this->lstNotaCred);
            $this->txtReferencia   = disableControl($this->txtReferencia);
            $this->txtObservacion  = disableControl($this->txtObservacion);
        }
    }

    protected function btnSaveAbon_Click() {
        $decMontAbon = $this->txtMontAbon->Text;
        if (is_numeric($decMontAbon) && ($decMontAbon > 0)) {
            $this->objFactEdit->MontoAbono = $this->txtMontAbon->Text;
            $this->objFactEdit->Save();
            $this->dtgFactPaga->Refresh();
            $this->actualizarMontoDelPago();
        } else {
            $this->danger('El Abono debe ser un numero positivo');
        }
        if ($decMontAbon > $this->objFactEdit->MontoPendiente) {
            $this->info('El Abono supera el Monto Pendiente.  Se creará una NDC');
        }
        $this->editarAbono(false);
    }

    protected function lstNotaCred_Create() {
        $this->lstNotaCred = new QListBox($this);
        $this->lstNotaCred->Name = 'Nota de Crédito';
        $this->lstNotaCred->Visible = false;
        $this->lstNotaCred->AddItem('- Seleccione Uno -',null);
        $this->lstNotaCred->AddAction(new QChangeEvent(), new QAjaxAction('lstNotaCred_Change'));
    }

    protected function lstNotaCred_Change() {
        t('Se disparo el change de la NDC');
        $intIdxxNota = $this->lstNotaCred->SelectedValue;
        if (!is_null($intIdxxNota)) {
            t('Hay una ndc');
            $objNotaCred = NotaCreditoCorp::Load($intIdxxNota);
            if ($objNotaCred instanceof NotaCreditoCorp) {
                $this->txtReferencia->Text = $objNotaCred->Referencia;
                $this->txtMonto->Text      = $objNotaCred->Monto;
                $this->txtMonto            = disableControl($this->txtMonto);
//                $this->info('Monto a Pagar: '.$objNotaCred->Monto);
                //-------------------------------------------------------------
                // El monto de la nota de credito sera el monto abonado a la
                // de la 1era factura que haya seleccionado el Usuario
                //-------------------------------------------------------------
                $this->establecerMontoPrimerPago($objNotaCred->Monto);
            } else {
                t('La ndc no existe');
                $this->danger('No existe la Nota de Crédito');
                $this->txtReferencia->Text = '';
                $this->txtMonto->Text      = '';
                $this->txtMonto = enableControl($this->txtMonto);
            }
        } else {
            t('No hay ndc seleccionada');
            $this->txtReferencia->Text = '';
            $this->txtMonto->Text      = '';
        }
    }

    protected function cargarNotasDeCredito() {
        /* @var $objNotaCred NotaCreditoCorp */
        $this->lstNotaCred->RemoveAllItems();
        $blnSeleRegi = count($this->arrNotaClie) == 1;
        $this->lstNotaCred->AddItem('- Seleccione Uno - ', null);
        foreach ($this->arrNotaClie as $objNotaCred) {
            $this->lstNotaCred->AddItem($objNotaCred->__toStringConMonto(), $objNotaCred->Id, $blnSeleRegi);
            if ($blnSeleRegi) {
                t('Registro seleccionado por defecto');
                $this->txtReferencia->Text = $objNotaCred->Referencia;
                t('Referencia: '.$this->txtReferencia->Text);
                $this->txtMonto->Text = $objNotaCred->__Monto();
                $this->txtMonto = disableControl($this->txtMonto);
                $this->txtReferencia = disableControl($this->txtReferencia);
                $this->lstNotaCred_Change();
            }
        }
        $this->lstNotaCred->Visible = true;
    }

    protected function lstFormaPago_Change() {
        $intFormPago = $this->lstFormaPago->SelectedValue;
        if (!is_null($intFormPago)) {
            $objFormPago = FormaPago::Load($intFormPago);
            if ($objFormPago->Abreviado == 'NDC') {
                $this->cargarNotasDeCredito();
            } else {
                $this->txtReferencia = enableControl($this->txtReferencia);
                $this->lstNotaCred->Visible = false;
            }
            if ($objFormPago->RequiereDocumento) {
                $this->txtReferencia = enableControl($this->txtReferencia);
                $this->txtReferencia->Placeholder = $objFormPago->TextoDocumento;
            } else {
                $this->txtReferencia = disableControl($this->txtReferencia);
                $this->txtReferencia->Placeholder = 'Sin Referencia';
            }
        }
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/registrar_pago.php');
    }


    public function lstClienteCorp_Change() {
        if (!is_null($this->lstClienteCorp->SelectedValue)) {
            $this->dtgFactClie->Refresh();
            $this->dtgFactPaga->Refresh();
            $this->objClieSele = MasterCliente::Load($this->lstClienteCorp->SelectedValue);
            $decSaldClie = $this->objClieSele->calcularSaldoExcedente();
            $this->mostrarSaldoCliente($this->objClieSele);
            //----------------------------------------
            // Se re-crea la lista de formas de pago
            //----------------------------------------
            $this->lstFormaPago->RemoveAllItems();
            $objClauWher[] = QQ::Like(QQN::FormaPago()->ParaPagoEn,'%CONNECT%');
            $objClauWher[] = QQ::Like(QQN::FormaPago()->StatusId,SinoType::SI);
            $arrFormPago   = FormaPago::QueryArray(QQ::AndCondition($objClauWher));
            $this->lstFormaPago->AddItem('- Seleccione Uno -',null);
            foreach ($arrFormPago as $objFormPago) {
                $this->lstFormaPago->AddItem($objFormPago->Descripcion,$objFormPago->Id);
            }
            //------------------------------------------------------------------------------------------
            // Si el Cliente tiene NDCs a su favor, se agrega una opción a la lista de formas de pago
            //------------------------------------------------------------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NotaCreditoCorp()->ClienteCorpId,$this->objClieSele->CodiClie);
            $objClauWher[] = QQ::Equal(QQN::NotaCreditoCorp()->Estatus,'DISPONIBLE');
            $this->arrNotaClie = NotaCreditoCorp::QueryArray(QQ::AndCondition($objClauWher));
            if (count($this->arrNotaClie) > 0) {
                $objClauWher = QQ::Equal(QQN::FormaPago()->Abreviado,'NDC');
                $objFormPago = FormaPago::QuerySingle(QQ::AndCondition($objClauWher));
                if ($objFormPago instanceof FormaPago) {
                    $this->lstFormaPago->AddItem($objFormPago->Descripcion,$objFormPago->Id);
                }
            }
        }
    }

    public function dtgFactClieRow_Click($strFormId, $strControlId, $strParameter) {
        $intFactIdxx = (int)$strParameter;

        $objPagoTemp = new FactPagoTemp();
        try {

            $objPagoTemp->ProcesoId = $this->objProcEjec->Id;
            $objPagoTemp->FacturaId = $intFactIdxx;
            $objPagoTemp->Save();

            $objFactClie = Facturas::Load($intFactIdxx);
            $objFactClie->MontoAbono = $objFactClie->MontoPendiente;
            $objFactClie->Save();

        } catch (Exception $e) {
            t('Excepcion: '.$e->getMessage());
        }

        $this->dtgFactPaga->Refresh();
	    $this->dtgFactClie->Refresh();

	    sleep(1);

        $this->actualizarMontoDelPago();
        if ($this->contarFacturasSeleccionadas() > 0) {
            $this->aceptarValores(true);
        }
    }

    protected function establecerMontoPrimerPago($decMontPago) {
	    t('voy a establecer el monto del 1er pago igual al monto de la ndc');
        $objClauWher[] = QQ::Equal(QQN::FactPagoTemp()->ProcesoId,$this->objProcEjec->Id);
        $arrPagoTemp   = FactPagoTemp::QueryArray(QQ::AndCondition($objClauWher));
        if ($arrPagoTemp) {
            t('tengo el vecto de facturas que seran pagadas');
            t('La primera factura es: '.$arrPagoTemp[0]->Factura->Referencia);
            $arrPagoTemp[0]->establecerMontoAbono($decMontPago);
        }
        t('Voy a actualizar el monto del pago');
        $this->actualizarMontoDelPago();
        $this->dtgFactPaga->Refresh();
    }

    protected function actualizarMontoDelPago() {
        $objClauWher[] = QQ::Equal(QQN::FactPagoTemp()->ProcesoId,$this->objProcEjec->Id);
        $arrPagoTemp   = FactPagoTemp::QueryArray(QQ::AndCondition($objClauWher));
        $arrFactTemp   = [];
        foreach ($arrPagoTemp as $objPagoTemp) {
            $arrFactTemp[] = $objPagoTemp->FacturaId;
        }

        $decTotaPaga = 0;
        $arrFactPaga = Facturas::QueryArray(QQ::AndCondition(QQ::In(QQN::Facturas()->Id,$arrFactTemp)));
        foreach ($arrFactPaga as $objFactPaga) {
            $decTotaPaga += $objFactPaga->MontoAbono > 0
                ? $objFactPaga->MontoAbono
                : $objFactPaga->Total;
        }
        $decTotaPaga = str_replace(',','.',$decTotaPaga);
        $this->info('Monto a Pagar: '.$decTotaPaga);
        $this->txtMonto->Text = $decTotaPaga;
    }

    public function dtgFactPagaRow_DoubleClick($strFormId, $strControlId, $strParameter) {
	    $this->objFactEdit = Facturas::Load($strParameter);
        if ($this->objFactEdit instanceof Facturas) {
            $this->txtNumeRefe->Text = $this->objFactEdit->Referencia;
            $this->txtMontAbon->Text = $this->objFactEdit->MontoAbono;
            $this->decMontPend       = $this->objFactEdit->MontoPendiente;

            $this->editarAbono(true);
        }
    }

    protected function editarAbono($blnMostCamp=false) {
        $this->txtNumeRefe->Visible = $blnMostCamp;
        $this->txtMontAbon->Visible = $blnMostCamp;
        $this->btnSaveAbon->Visible = $blnMostCamp;
        $this->btnCancAbon->Visible = $blnMostCamp;
    }


    protected function mostrarSaldoCliente(MasterCliente $objCliePago) {
        $decSaldClie = $objCliePago->__saldoExcedente();
        if ($decSaldClie > 0) {
            $this->ninfo('Saldo a favor del Cliente: <b>'.$decSaldClie.'</b>');
        } else {
            $this->nwarning('Deuda del Cliente: <b>'.$decSaldClie.'</b>');
        }
    }

    protected function dtgFactPaga_Create() {
        $this->dtgFactPaga = new QDataGrid($this);
        $this->dtgFactPaga->FontSize = 12;
        $this->dtgFactPaga->ShowFilter = false;

        $this->dtgFactPaga->CssClass = 'datagrid';
        $this->dtgFactPaga->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgFactPaga->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgFactPaga->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgFactPagaRow_DoubleClick'));

        $this->dtgFactPaga->UseAjax = true;

        $this->dtgFactPaga->SetDataBinder('dtgFactPaga_Bind');

        $this->colFactSele = new QCheckBoxColumn('', $this->dtgFactPaga);
        $this->colFactSele->PrimaryKey = 'Id';
        $this->colFactSele->Width = 10;
        $this->dtgFactPaga->AddColumn($this->colFactSele);

        $this->dtgFactPagaColumns();
    }

    protected function dtgFactPaga_Bind() {
	    $arrPagoTemp = FactPagoTemp::LoadArrayByProcesoId($this->objProcEjec->Id);
	    $arrFactTemp = [];
        foreach ($arrPagoTemp as $objFactTemp) {
            $arrFactTemp[] = $objFactTemp->FacturaId;
	    }

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Facturas()->Id,$arrFactTemp);
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Facturas()->Fecha,false);
        $this->arrFactPaga = Facturas::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgFactPaga->DataSource = $this->arrFactPaga;
    }

    protected function dtgFactPagaColumns() {
        $colNumeRefe = new QDataGridColumn($this);
        $colNumeRefe->Name = QApplication::Translate('Referencia');
        $colNumeRefe->Html = '<?= $_ITEM->Referencia ?>';
        $colNumeRefe->Width = 100;
        $this->dtgFactPaga->AddColumn($colNumeRefe);

        $colFechFact = new QDataGridColumn($this);
        $colFechFact->Name = QApplication::Translate('Fecha');
        $colFechFact->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>';
        $colFechFact->Width = 80;
        $this->dtgFactPaga->AddColumn($colFechFact);

        $colEstaPago = new QDataGridColumn($this);
        $colEstaPago->Name = QApplication::Translate('Estatus');
        $colEstaPago->Html = '<?= $_ITEM->EstatusPago ?>';
        $colEstaPago->Width = 80;
        $this->dtgFactPaga->AddColumn($colEstaPago);

        $colTotaFact = new QDataGridColumn($this);
        $colTotaFact->Name = QApplication::Translate('Total');
        $colTotaFact->Html = '<?= nf($_ITEM->Total) ?>';
        $colTotaFact->Width = 70;
        $this->dtgFactPaga->AddColumn($colTotaFact);

        $colMontAbon = new QDataGridColumn($this);
        $colMontAbon->Name = 'Abono';
        $colMontAbon->Html = '<?= nf($_ITEM->MontoAbono) ?>';
        $colMontAbon->Width = 70;
        $this->dtgFactPaga->AddColumn($colMontAbon);

        $colMontCobr = new QDataGridColumn($this);
        $colMontCobr->Name = QApplication::Translate('Pagado');
        $colMontCobr->Html = '<?= nf($_ITEM->MontoCobrado) ?>';
        $colMontCobr->Width = 70;
        $this->dtgFactPaga->AddColumn($colMontCobr);

        $colMontPend = new QDataGridColumn($this);
        $colMontPend->Name = QApplication::Translate('Pendiente');
        $colMontPend->Html = '<?= nf($_ITEM->MontoPendiente) ?>';
        $colMontPend->Width = 70;
        $this->dtgFactPaga->AddColumn($colMontPend);

    }

    protected function btnExclFact_Click() {
        $this->mensaje();
        $arrIdxxSele = $this->colFactSele->GetChangedIds();
        if (count($arrIdxxSele)) {

            $arrFactExcl   = array_keys($arrIdxxSele);
            $objClauWher[] = QQ::Equal(QQN::FactPagoTemp()->ProcesoId,$this->objProcEjec->Id);
            $objClauWher[] = QQ::In(QQN::FactPagoTemp()->FacturaId,$arrFactExcl);
            $arrFactTemp   = FactPagoTemp::QueryArray(QQ::AndCondition($objClauWher));
            foreach ($arrFactTemp as $objFactTemp) {
                $objFactTemp->Delete();
            }
            $this->dtgFactPaga->Refresh();
            $this->dtgFactClie->Refresh();
            sleep(1);
            $arrFactTemp = FactPagoTemp::QueryArray(QQ::AndCondition($objClauWher));
            $decTotaPaga = 0;
            $arrFactPaga = Facturas::QueryArray(QQ::AndCondition(QQ::In(QQN::Facturas()->Id,$arrFactTemp)));
            foreach ($arrFactPaga as $objFactPaga) {
                $decTotaPaga += $objFactPaga->MontoAbono;
            }
            $decTotaPaga = str_replace(',','.',nf($decTotaPaga));
            $this->info('Monto a Pagar: '.$decTotaPaga);
            $this->txtMonto->Text = $decTotaPaga;
            if ($this->contarFacturasSeleccionadas() == 0) {
                $this->aceptarValores(false);
            }
        } else {
            $this->warning('Seleccione Facturas p/excluir del Pago');
        }
    }

    protected function contarFacturasSeleccionadas() {
        $objClauWher[] = QQ::Equal(QQN::FactPagoTemp()->ProcesoId,$this->objProcEjec->Id);
        return FactPagoTemp::QueryCount(QQ::AndCondition($objClauWher));
    }

    protected function dtgFactClie_Create() {
        $this->dtgFactClie = new QDataGrid($this);
        $this->dtgFactClie->FontSize = 12;
        $this->dtgFactClie->ShowFilter = false;

        $this->dtgFactClie->CssClass = 'datagrid';
        $this->dtgFactClie->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgFactClie->UseAjax = true;

        $this->dtgFactClie->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgFactClie->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFactClieRow_Click'));

        $this->dtgFactClie->SetDataBinder('dtgFactClie_Bind');

        $this->dtgFactClieColumns();
    }

    protected function dtgFactClie_Bind() {
        $objClauWher[] = QQ::Equal(QQN::FactPagoTemp()->ProcesoId,$this->objProcEjec->Id);
        $arrPagoTemp   = FactPagoTemp::QueryArray(QQ::AndCondition($objClauWher));
        $arrFactTemp   = [];
        foreach ($arrPagoTemp as $objPagoTemp) {
            $arrFactTemp[] = $objPagoTemp->FacturaId;
        }

        $this->arrFactPend = [];
	    if (!is_null($this->lstClienteCorp->SelectedValue)) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Facturas()->ClienteCorpId,$this->lstClienteCorp->SelectedValue);
            $objClauWher[] = QQ::In(QQN::Facturas()->EstatusPago,array('PENDIENTE','PAGOPARCIAL'));
            $objClauWher[] = QQ::NotEqual(QQN::Facturas()->Estatus,'ANULADA');
            $objClauWher[] = QQ::NotIn(QQN::Facturas()->Id,$arrFactTemp);
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Facturas()->Fecha,false);
            $this->arrFactPend = Facturas::QueryArray(QQ::AndCondition($objClauWher));
        }
        $this->dtgFactClie->DataSource = $this->arrFactPend;
    }

    protected function dtgFactClieColumns() {
        $colNumeRefe = new QDataGridColumn($this);
        $colNumeRefe->Name = QApplication::Translate('Referencia');
        $colNumeRefe->Html = '<?= $_ITEM->Referencia ?>';
        $colNumeRefe->Width = 100;
        $this->dtgFactClie->AddColumn($colNumeRefe);

        $colFechFact = new QDataGridColumn($this);
        $colFechFact->Name = QApplication::Translate('Fecha');
        $colFechFact->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>';
        $colFechFact->Width = 80;
        $this->dtgFactClie->AddColumn($colFechFact);

        $colEstaPago = new QDataGridColumn($this);
        $colEstaPago->Name = QApplication::Translate('Estatus');
        $colEstaPago->Html = '<?= $_ITEM->EstatusPago ?>';
        $colEstaPago->Width = 80;
        $this->dtgFactClie->AddColumn($colEstaPago);

        $colTotaFact = new QDataGridColumn($this);
        $colTotaFact->Name = QApplication::Translate('Total');
        $colTotaFact->Html = '<?= nf($_ITEM->Total) ?>';
        $colTotaFact->Width = 70;
        $this->dtgFactClie->AddColumn($colTotaFact);

        $colMontCobr = new QDataGridColumn($this);
        $colMontCobr->Name = QApplication::Translate('Pagado');
        $colMontCobr->Html = '<?= nf($_ITEM->MontoCobrado) ?>';
        $colMontCobr->Width = 70;
        $this->dtgFactClie->AddColumn($colMontCobr);

        $colMontPend = new QDataGridColumn($this);
        $colMontPend->Name = QApplication::Translate('Pendiente');
        $colMontPend->Html = '<?= nf($_ITEM->MontoPendiente) ?>';
        $colMontPend->Width = 70;
        $this->dtgFactClie->AddColumn($colMontPend);

    }

    protected function determinarPosicion() {
        if ($this->mctPagosCorp->PagosCorp && !isset($_SESSION['DataPagosCorp'])) {
            $_SESSION['DataPagosCorp'] = serialize(array($this->mctPagosCorp->PagosCorp));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataPagosCorp']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctPagosCorp->PagosCorp->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('PagosCorp',$this->mctPagosCorp->PagosCorp->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/pagos_corp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/pagos_corp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/pagos_corp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/pagos_corp_edit.php/'.$objRegiTabl->Id);
    }



    protected function Form_Validate() {
        $objClauWher[] = QQ::Equal(QQN::FactPagoTemp()->ProcesoId,$this->objProcEjec->Id);
        $intFactTemp   = FactPagoTemp::QueryCount(QQ::AndCondition($objClauWher));
        if ($intFactTemp == 0) {
            $strTextMens = 'No ha seleccionado la(s) Factura(s) que desea pagar. Para ello click sobre el(los) registro(s) de la lista superior derecha';
            $this->danger($strTextMens);
            return false;
        }
        if (is_null($this->lstFormaPago->SelectedValue)) {
            $this->danger('La Forma de Pago es requerida');
            return false;
        }
        if ($this->txtReferencia->Enabled) {
            if (strlen($this->txtReferencia->Text) == 0) {
                $this->danger('La Referencia es requerida');
                return false;
            }
        }
        if (is_null($this->calFecha->DateTime)) {
            $this->danger('La Fecha del Pago es requerida');
            return false;
        }
        if (strlen($this->txtObservacion->Text) == 0) {
            $this->danger('La Observación es requerida');
            return false;
        }
        return true;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        t('Salvando el pago de la BD');
        /* @var $objFactPaga Facturas */
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctPagosCorp->PagosCorp;
		if (!$this->mctPagosCorp->EditMode) {
            $this->txtEstatus->Text = 'CONCILIADO';
            $this->txtCreatedBy->Text = $this->objUsuario->CodiUsua;
            $this->mctPagosCorp->PagosCorp->CreatedAt = new QDateTime(QDateTime::Now());
        } else {
            $this->txtUpdatedBy->Text = $this->objUsuario->CodiUsua;
            $this->mctPagosCorp->PagosCorp->UpdatedAt = new QDateTime(QDateTime::Now());
        }
		$this->mctPagosCorp->SavePagosCorp();
        if ($this->mctPagosCorp->EditMode) {
            t('En modo edicion del pago');
            //---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctPagosCorp->PagosCorp;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
                //-----------------------------------
                // Se asocian las facturas, al pago
                //-----------------------------------
                $this->mctPagosCorp->PagosCorp->DeleteAllPagosCorpDetailsAsPagoCorp();
                $this->mctPagosCorp->PagosCorp->UnassociateAllFacturasesAsFacturaPagoCorp();
                foreach ($this->arrFactPaga as $objFactPaga) {

                    $this->mctPagosCorp->PagosCorp->AssociateFacturasAsFacturaPagoCorp($objFactPaga);

                    $objPagoDeta = new PagosCorpDetail();
                    $objPagoDeta->PagoCorpId   = $this->mctPagosCorp->PagosCorp->Id;
                    $objPagoDeta->FacturaId    = $objFactPaga->Id;
                    $objPagoDeta->MontoAbonado = $objFactPaga->MontoAbono;
                    $objPagoDeta->Save();

                    $objFactPaga->EstatusPago = 'CONCILIADO';
                    $objFactPaga->Save();
                    $arrLogxCamb['strNombTabl'] = 'Facturas';
                    $arrLogxCamb['intRefeRegi'] = $objFactPaga->Id;
                    $arrLogxCamb['strNombRegi'] = $objFactPaga->Referencia;
                    $arrLogxCamb['strDescCamb'] = 'Pago '.$this->txtReferencia->Text.' registrado';
                    LogDeCambios($arrLogxCamb);
                }
                list($intCantFact,$decMontPago) = $this->mctPagosCorp->PagosCorp->conciliarPago();
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'PagosCorp';
				$arrLogxCamb['intRefeRegi'] = $this->mctPagosCorp->PagosCorp->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctPagosCorp->PagosCorp->Referencia;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$this->mctPagosCorp->PagosCorp->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa');
			}
		} else {
            t('En modo insercion del pago');
            //-----------------------------------
            // Se asocian las facturas, al pago
            //-----------------------------------
            $decMontPago = 0;
            foreach ($this->arrFactPaga as $objFactPaga) {
                t('Asociando la factura: '.$objFactPaga->Referencia.' al pago');
                $this->mctPagosCorp->PagosCorp->AssociateFacturasAsFacturaPagoCorp($objFactPaga);

                $objPagoDeta = new PagosCorpDetail();
                $objPagoDeta->PagoCorpId   = $this->mctPagosCorp->PagosCorp->Id;
                $objPagoDeta->FacturaId    = $objFactPaga->Id;
                $objPagoDeta->MontoAbonado = $objFactPaga->MontoAbono;
                $objPagoDeta->Save();
                t('Detalle del pago creado con abono de: '. $objPagoDeta->MontoAbonado);

                $objFactPaga->EstatusPago = 'CONCILIADO';
                $objFactPaga->Save();
                $arrLogxCamb['strNombTabl'] = 'Facturas';
                $arrLogxCamb['intRefeRegi'] = $objFactPaga->Id;
                $arrLogxCamb['strNombRegi'] = $objFactPaga->Referencia;
                $arrLogxCamb['strDescCamb'] = 'Pago '.$this->txtReferencia->Text.' registrado';
                LogDeCambios($arrLogxCamb);
            }
            t('Factura(s) asociada(s), voy a conciliar el pago');
            list($intCantFact,$decMontPago) = $this->mctPagosCorp->PagosCorp->conciliarPago();
            t('Guardando log de transacciones del pago');
			$arrLogxCamb['strNombTabl'] = 'PagosCorp';
			$arrLogxCamb['intRefeRegi'] = $this->mctPagosCorp->PagosCorp->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctPagosCorp->PagosCorp->Referencia;
			$arrLogxCamb['strDescCamb'] = "Creado con $intCantFact asociadas";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$this->mctPagosCorp->PagosCorp->Id;
			LogDeCambios($arrLogxCamb);
            //-------------------------------------------------------------------------
            // Un saldo positivo en este punto significa que ya se cubrió el importe
            // de todas las facturas y sobró, por lo tanto, se genera una NDC
            //-------------------------------------------------------------------------
            if ($decMontPago > 0) {
                t('El saldo del pago es positivo ('.$decMontPago.'), eso implica crear una NDC');
                $strMensTran = 'Saldo excedente por el Pago Referencia: '.$this->mctPagosCorp->PagosCorp->Referencia;
                try {
                    $objNotaCorp = new NotaCreditoCorp();
                    $objNotaCorp->Referencia    = NotaCreditoCorp::proxReferencia();
                    $objNotaCorp->Tipo          = 'AUTOMATICA';
                    $objNotaCorp->ClienteCorpId = $this->mctPagosCorp->PagosCorp->ClienteCorpId;
                    $objNotaCorp->PagoCorpId    = $this->mctPagosCorp->PagosCorp->Id;
                    $objNotaCorp->Fecha         = new QDateTime(QDateTime::Now());
                    $objNotaCorp->Monto         = $decMontPago;
                    $objNotaCorp->Estatus       = 'DISPONIBLE';
                    $objNotaCorp->Observacion   = strtoupper($strMensTran);
                    $objNotaCorp->CreatedBy     = $this->objUsuario->CodiUsua;
                    $objNotaCorp->CreatedAt     = new QDateTime(QDateTime::Now());
                    $objNotaCorp->Save();
                    t('Se creo una NDC por un monto de: '.$decMontPago);
                    $objNotaCorp->logDeCambios($strMensTran);
                } catch (Exception $e) {
                    t('Error: '.$e->getMessage());
                    $this->mctPagosCorp->PagosCorp->logDeCambios($e->getMessage());
                }
            }

            t('Transaccion Exitosa !!!');
            $this->success('Transacción Exitosa !!');
		}
        //--------------------------------------------------------------------------------
        // Si la forma de pago fue una Nota de Crédito, se cambia el estatus de la misma
        //--------------------------------------------------------------------------------
        $intFormPago = $this->lstFormaPago->SelectedValue;
        $objFormPago = FormaPago::Load($intFormPago);
        if ($objFormPago->Abreviado == 'NDC') {
            t('El pago se hizo con una NDC');
            $objNotaCred = NotaCreditoCorp::Load($this->lstNotaCred->SelectedValue);
            if ($objNotaCred instanceof NotaCreditoCorp) {
                t('Encontre la NDC y la voy a aplicar');
                $objNotaCred->Estatus          = 'APLICADA';
                $objNotaCred->AplicadaEnPagoId = $this->mctPagosCorp->PagosCorp->Id;
                $objNotaCred->UpdatedAt        = new QDateTime(QDateTime::Now());
                $objNotaCred->UpdatedBy        = $this->objUsuario->CodiUsua;
                $objNotaCred->Save();
                $strTextMens = 'APLICADA EN PAGO ID: '.$this->mctPagosCorp->PagosCorp->Id;
                $objNotaCred->logDeCambios($strTextMens);
                t('NDC aplicada');
            }
        }
        t('Voy a actualizar el saldo de los Clientes');
		// $decSaldClie = $this->objClieSele->calcularSaldoExcedente();
        UpdateCustomersBalance();
		t('Voy a mostrar el saldo del Cliente en la pantalla');
        $this->objClieSele = MasterCliente::Load($this->objClieSele->CodiClie);
		$this->mostrarSaldoCliente($this->objClieSele);

		$this->dtgFactPaga->Refresh();
		$this->btnNuevRegi->Visible = true;
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        if ($blnTodoOkey) {
            //-----------------------------------------------------------------------
            // Cuando se borra el registro, se desasocian las Facturas relacionadas
            // esto se hace de manera automatica, sin embargo, es necesario cambiar
            // el estatus de pago de las Facturas
            //-----------------------------------------------------------------------
            $arrFactIncl = $this->mctPagosCorp->PagosCorp->GetFacturasAsFacturaPagoCorpArray();
            foreach ($arrFactIncl as $objFactIncl) {
                $objFactIncl->EstatusPago = 'PENDIENTE';
                $objFactIncl->Save();
                //-----------------------------------
                // Se deja rastro de la transaccion
                //-----------------------------------
                $arrLogxCamb['strNombTabl'] = 'Facturas';
                $arrLogxCamb['intRefeRegi'] = $objFactIncl->Id;
                $arrLogxCamb['strNombRegi'] = $objFactIncl->Referencia;
                $arrLogxCamb['strDescCamb'] = "Se borro el Pago: ".$this->mctPagosCorp->PagosCorp->Referencia;
                LogDeCambios($arrLogxCamb);

                $this->mctPagosCorp->PagosCorp->conciliarPago();

            }
            $this->mctPagosCorp->DeletePagosCorp();
            $arrLogxCamb['strNombTabl'] = 'PagosCorp';
            $arrLogxCamb['intRefeRegi'] = $this->mctPagosCorp->PagosCorp->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctPagosCorp->PagosCorp->Referencia;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);

            $this->objClieSele->calcularSaldoExcedente();

            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// pagos_corp_edit.tpl.php as the included HTML template file
RegistrarPago::Run('RegistrarPago');
?>