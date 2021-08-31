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
    protected $arrFactIdxx = [];
    protected $objClieSele;
    protected $lstNotaCred;
    protected $arrNotaClie = [];


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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the PagosCorpMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctPagosCorp = PagosCorpMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on PagosCorp's data fields
		$this->lblId = $this->mctPagosCorp->lblId_Create();

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Like(QQN::FormaPago()->ParaPagoEn,'%CONNECT%');
        $objClauWher[] = QQ::Like(QQN::FormaPago()->StatusId,SinoType::SI);
		$this->lstFormaPago = $this->mctPagosCorp->lstFormaPago_Create(null,QQ::AndCondition($objClauWher));
		$this->lstFormaPago->Width = 180;
        $this->lstFormaPago->AddAction(new QChangeEvent(), new QAjaxAction('lstFormaPago_Change'));

		$this->lstClienteCorp = $this->mctPagosCorp->lstClienteCorp_Create();
		$this->lstClienteCorp->AddAction(new QChangeEvent(), new QAjaxAction('lstClienteCorp_Change'));

		$this->txtReferencia = $this->mctPagosCorp->txtReferencia_Create();
		$this->txtReferencia->Placeholder = 'Nro de Documento';

		$this->calFecha = $this->mctPagosCorp->calFecha_Create();
		$this->txtMonto = $this->mctPagosCorp->txtMonto_Create();
		$this->txtMonto->Placeholder = 'Separe con punto';

		$this->txtEstatus = $this->mctPagosCorp->txtEstatus_Create();
		$this->txtObservacion = $this->mctPagosCorp->txtObservacion_Create();
		$this->lblCreatedAt = $this->mctPagosCorp->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctPagosCorp->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctPagosCorp->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctPagosCorp->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctPagosCorp->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctPagosCorp->txtDeletedBy_Create();

        $this->lstNotaCred_Create();
        $this->dtgFactClie_Create();
        $this->dtgFactPaga_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

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
                $this->txtMonto = disableControl($this->txtMonto);
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
                t('Registro seleccinado por defecto');
                $this->txtReferencia->Text = $objNotaCred->Referencia;
                t('Referencia: '.$this->txtReferencia->Text);
                $this->txtMonto->Text = $objNotaCred->__Monto();
                $this->txtMonto = disableControl($this->txtMonto);
                $this->txtReferencia = disableControl($this->txtReferencia);
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
                //$this->txtMonto->Text = '';
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
        $this->arrFactIdxx[] = (int)$strParameter;
        //t('El vector de IDs tiene: '.count($this->arrFactIdxx));
        $this->dtgFactPaga->Refresh();
	    $this->dtgFactClie->Refresh();
        sleep(1);
        //t('Ya espere un segundo');
	    $decTotaPaga = 0;
	    $arrFactPaga = Facturas::QueryArray(QQ::AndCondition(QQ::In(QQN::Facturas()->Id,$this->arrFactIdxx)));
	    //t('El vector de facturas tiene: '.count($arrFactPaga));
        foreach ($arrFactPaga as $objFactPaga) {
            $decTotaPaga += $objFactPaga->MontoPendiente > 0
                ? $objFactPaga->MontoPendiente
                : $objFactPaga->Total;
	    }
	    //$decTotaPaga = str_replace(',','.',nf($decTotaPaga));
	    $decTotaPaga = str_replace(',','.',$decTotaPaga);
	    //t('Ya calcule el monto a pagar: '.$decTotaPaga);
        $this->info('Monto a Pagar: '.$decTotaPaga);
        $this->txtMonto->Text = $decTotaPaga;
    }

    public function dtgFactPagaRow_Click($strFormId, $strControlId, $strParameter) {
        $intCancIdxx = (int)$strParameter;
        for ($i = 0; $i < count($this->arrFactIdxx); $i++) {
	        if ($this->arrFactIdxx[$i] == $intCancIdxx) {
                unset($this->arrFactIdxx[$i]);
            }
        }
	    $this->dtgFactPaga->Refresh();
	    $this->dtgFactClie->Refresh();
        sleep(1);
	    $decTotaPaga = 0;
	    $arrFactPaga = Facturas::QueryArray(QQ::AndCondition(QQ::In(QQN::Facturas()->Id,$this->arrFactIdxx)));
        foreach ($arrFactPaga as $objFactPaga) {
            $decTotaPaga += $objFactPaga->MontoPendiente > 0
                ? $objFactPaga->MontoPendiente
                : $objFactPaga->Total;
	    }
        $decTotaPaga = str_replace(',','.',nf($decTotaPaga));
        //t('Ya calcule el monto a pagar: '.$decTotaPaga);
        $this->info('Monto a Pagar: '.$decTotaPaga);
        $this->txtMonto->Text = $decTotaPaga;
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
        $this->dtgFactPaga->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFactPagaRow_Click'));

        $this->dtgFactPaga->UseAjax = true;

        $this->dtgFactPaga->SetDataBinder('dtgFactPaga_Bind');

        $this->dtgFactPagaColumns();
    }

    protected function dtgFactPaga_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Facturas()->Id,$this->arrFactIdxx);
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
	    $this->arrFactPend = [];
	    if (!is_null($this->lstClienteCorp->SelectedValue)) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Facturas()->ClienteCorpId,$this->lstClienteCorp->SelectedValue);
            $objClauWher[] = QQ::In(QQN::Facturas()->EstatusPago,array('PENDIENTE','PAGOPARCIAL'));
            $objClauWher[] = QQ::NotIn(QQN::Facturas()->Id,$this->arrFactIdxx);
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



    protected function Form_Validate()
    {
        $blnTodoOkey = parent::Form_Validate();
        if ($blnTodoOkey) {
            if (count($this->arrFactIdxx) == 0) {
                $strTextMens = 'No ha seleccionado la(s) Factura(s) que desea pagar. Para ello click sobre el(los) registro(s) de la lista superior derecha';
                $this->danger($strTextMens);
                return false;
            }
        }
        return $blnTodoOkey;
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
        } else {
            $this->txtUpdatedBy->Text = $this->objUsuario->CodiUsua;
        }
        t('k1');
		$this->mctPagosCorp->SavePagosCorp();
		t('k2');
		if ($this->mctPagosCorp->EditMode) {
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
                $this->mctPagosCorp->PagosCorp->UnassociateAllFacturasesAsFacturaPagoCorp();
                foreach ($this->arrFactPaga as $objFactPaga) {
                    $this->mctPagosCorp->PagosCorp->AssociateFacturasAsFacturaPagoCorp($objFactPaga);
                    $objFactPaga->EstatusPago = 'CONCILIADO';
                    $objFactPaga->Save();
                    $arrLogxCamb['strNombTabl'] = 'Facturas';
                    $arrLogxCamb['intRefeRegi'] = $objFactPaga->Id;
                    $arrLogxCamb['strNombRegi'] = $objFactPaga->Referencia;
                    $arrLogxCamb['strDescCamb'] = 'Pago '.$this->txtReferencia->Text.' registrado';
                    LogDeCambios($arrLogxCamb);

                    $this->mctPagosCorp->PagosCorp->conciliarPago();

                }
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
		    t('k3');
            //-----------------------------------
            // Se asocian las facturas, al pago
            //-----------------------------------
            foreach ($this->arrFactPaga as $objFactPaga) {
                t('k4');
                $this->mctPagosCorp->PagosCorp->AssociateFacturasAsFacturaPagoCorp($objFactPaga);
                $objFactPaga->EstatusPago = 'CONCILIADO';
                $objFactPaga->Save();
                $arrLogxCamb['strNombTabl'] = 'Facturas';
                $arrLogxCamb['intRefeRegi'] = $objFactPaga->Id;
                $arrLogxCamb['strNombRegi'] = $objFactPaga->Referencia;
                $arrLogxCamb['strDescCamb'] = 'Pago '.$this->txtReferencia->Text.' registrado';
                LogDeCambios($arrLogxCamb);
                t('k5');
                $this->mctPagosCorp->PagosCorp->conciliarPago();
            }
            t('k6');
			$arrLogxCamb['strNombTabl'] = 'PagosCorp';
			$arrLogxCamb['intRefeRegi'] = $this->mctPagosCorp->PagosCorp->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctPagosCorp->PagosCorp->Referencia;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$this->mctPagosCorp->PagosCorp->Id;
			LogDeCambios($arrLogxCamb);
			t('k7');
            $this->success('Transacción Exitosa !!');
		}
        //--------------------------------------------------------------------------------
        // Si la forma de pago fue una Nota de Crédito, se cambia el estatus de la misma
        //--------------------------------------------------------------------------------
        $intFormPago = $this->lstFormaPago->SelectedValue;
        $objFormPago = FormaPago::Load($intFormPago);
        if ($objFormPago->Abreviado == 'NDC') {
            $objNotaCred = NotaCreditoCorp::Load($this->lstNotaCred->SelectedValue);
            if ($objNotaCred instanceof NotaCreditoCorp) {
                $objNotaCred->Estatus = 'APLICADA';
                $objNotaCred->AplicadaEnPagoId = $this->mctPagosCorp->PagosCorp->Id;
                $objNotaCred->Save();
                $strTextMens = 'APLICADA EN PAGO ID: '.$this->mctPagosCorp->PagosCorp->Id;
                $objNotaCred->logDeCambios($strTextMens);
            }
        }

		$decSaldClie = $this->objClieSele->calcularSaldoExcedente();
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