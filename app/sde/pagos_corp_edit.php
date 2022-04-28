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
class PagosCorpEditForm extends PagosCorpEditFormBase {
    protected $dtgFactClie;
    protected $lstEstatus;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the PagosCorpMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctPagosCorp = PagosCorpMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on PagosCorp's data fields
		$this->lblId = $this->mctPagosCorp->lblId_Create();
		$this->lstClienteCorp = $this->mctPagosCorp->lstClienteCorp_Create();
		$this->lstClienteCorp->Name = $this->enlaceCliente();
		$this->lstClienteCorp->Width = 200;
		$this->lstFormaPago = $this->mctPagosCorp->lstFormaPago_Create();
		$this->lstFormaPago->AddAction(new QChangeEvent(), new QAjaxAction('lstFormaPago_Change'));
		$this->txtReferencia = $this->mctPagosCorp->txtReferencia_Create();
		$this->calFecha = $this->mctPagosCorp->calFecha_Create();
		$this->txtMonto = $this->mctPagosCorp->txtMonto_Create();
		$this->txtEstatus = $this->mctPagosCorp->txtEstatus_Create();
		$this->lstEstatus = $this->lstEstatus_Create();
		$this->txtObservacion = $this->mctPagosCorp->txtObservacion_Create();
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtObservacion->Rows = 9;
		$this->txtObservacion->Width = 450;
		$this->calCreatedAt = $this->mctPagosCorp->calCreatedAt_Create();
		$this->calUpdatedAt = $this->mctPagosCorp->calUpdatedAt_Create();
		$this->calDeletedAt = $this->mctPagosCorp->calDeletedAt_Create();
		$this->txtCreatedBy = $this->mctPagosCorp->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctPagosCorp->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctPagosCorp->txtDeletedBy_Create();
        //$this->dtgFacturasesAsFacturaPagoCorp = $this->mctPagosCorp->dtgFacturasesAsFacturaPagoCorp_Create();

        $this->dtgFactClie_Create();

        $this->btnNuevRegi->Visible = false;
        $this->lstClienteCorp = disableControl($this->lstClienteCorp);
        $this->lstFormaPago   = disableControl($this->lstFormaPago);
        $this->txtReferencia  = disableControl($this->txtReferencia);
        $this->calFecha       = disableControl($this->calFecha);
        $this->txtMonto       = disableControl($this->txtMonto);

        $this->mostrarSaldoCliente($this->mctPagosCorp->PagosCorp->ClienteCorp);

        if ($this->objUsuario->LogiUsua != 'ddurand') {
            $this->lstEstatus = disableControl($this->lstEstatus);
        }
    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function enlaceCliente() {
	    $strLinkClie = '<a href='.__SIST__.'/master_cliente_edit.php/'.$this->lstClienteCorp->SelectedValue.' 
                style="color: #0d6aad; text-decoration: none" ><i class="fa fa-link"></i> Cliente Corp </a>';
	    return $strLinkClie;
    }

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = false;
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
    }


    protected function lstEstatus_Create() {
	    $this->lstEstatus = new QListBox($this);
	    $this->lstEstatus->Name = 'Estatus';
	    $this->lstEstatus->AddItem('PENDIENTE','PENDIENTE',$this->txtEstatus->Text=='PENDIENTE');
	    $this->lstEstatus->AddItem('CONCILIADO','CONCILIADO',$this->txtEstatus->Text=='CONCILIADO');
	    $this->lstEstatus->AddItem('INCONCILIABLE','INCONCILIABLE',$this->txtEstatus->Text=='INCONCILIABLE');
	    return $this->lstEstatus;
    }

    protected function dtgFactClie_Create() {
        $this->dtgFactClie = new QDataGrid($this);
        $this->dtgFactClie->FontSize = 12;
        $this->dtgFactClie->ShowFilter = false;

        $this->dtgFactClie->CssClass = 'datagrid';
        $this->dtgFactClie->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgFactClie->UseAjax = true;

        $this->dtgFactClie->SetDataBinder('dtgFactClie_Bind');

        $this->dtgFactClieColumns();
    }

    protected function dtgFactClie_Bind() {
        $this->dtgFactClie->DataSource = $this->mctPagosCorp->PagosCorp->GetFacturasAsFacturaPagoCorpArray();
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
        $colEstaPago->Name = QApplication::Translate('Estatus del Pago');
        $colEstaPago->Html = '<?= $_ITEM->EstatusPago ?>';
        $colEstaPago->Width = 80;
        $this->dtgFactClie->AddColumn($colEstaPago);

        $colTotaFact = new QDataGridColumn($this);
        $colTotaFact->Name = QApplication::Translate('Total');
        $colTotaFact->Html = '<?= nf($_ITEM->Total) ?>';
        $colTotaFact->Width = 70;
        $this->dtgFactClie->AddColumn($colTotaFact);

        $colMontAbon = new QDataGridColumn($this);
        $colMontAbon->Name = 'Abono';
        $colMontAbon->Html = '<?= nf($_ITEM->MontoAbono) ?>';
        $colMontAbon->Width = 70;
        $this->dtgFactClie->AddColumn($colMontAbon);

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

    protected function lstFormaPago_Change() {
        $intFormPago = $this->lstFormaPago->SelectedValue;
        if (!is_null($intFormPago)) {
            $objFormPago = FormaPago::Load($intFormPago);
            if ($objFormPago->RequiereDocumento) {
                $this->txtReferencia = enableControl($this->txtReferencia);
                $this->txtReferencia->Required = true;
            } else {
                $this->txtReferencia = disableControl($this->txtReferencia);
                $this->txtReferencia->Required = false;
            }
        }
    }

    protected function mostrarSaldoCliente(MasterCliente $objCliePago) {
        $decSaldClie = $objCliePago->__saldoExcedente();
        if ($decSaldClie > 0) {
            $this->ninfo('Saldo a favor del Cliente: <b>'.$decSaldClie.'</b>');
        } else {
            $this->nwarning('Deuda del Cliente: <b>'.$decSaldClie.'</b>');
        }
    }

    protected function actualizarEstatusDelPago($strEstaPago) {
        $strTipoMens = 'success';
        switch ($strEstaPago) {
            case 'CONCILIADO':
                $intCantFact = $this->mctPagosCorp->PagosCorp->conciliarPago();
                $strMensTran = "Pago CONCILIADO | $intCantFact Facturas Procesadas";
                $this->mctPagosCorp->PagosCorp->logDeCambios($strMensTran);
                $strTextMens = "Transaccion Exitosa | <b>$intCantFact Facturas Procesadas | Pago Conciliado !!!</b>";
                break;
            case 'PENDIENTE':
                $intCantFact = $this->mctPagosCorp->PagosCorp->replicarEstatusPago('PORCONCILIAR');
                $strMensTran = "Pago marcado como PENDIENTE | $intCantFact Facturas marcadas como 'PORCONCILIAR'";
                $this->mctPagosCorp->PagosCorp->logDeCambios($strMensTran);
                $strTextMens = "Transaccion Exitosa | <b>$intCantFact Facturas Procesadas | Pago marcado como 'Pendiente'</b>";
                break;
            case 'INCONCILIABLE':
                $intCantFact = $this->mctPagosCorp->PagosCorp->replicarEstatusPago('INCONCILIABLE');
                $strMensTran = "Pago marcado como INCONCILIABLE | $intCantFact Facturas Procesadas'";
                $this->mctPagosCorp->PagosCorp->logDeCambios($strMensTran);
                $strTextMens = "Transaccion Exitosa | <b>$intCantFact Facturas Procesadas | Pago marcado como 'Pendiente'</b>";
                break;
            default:
                $strTextMens = 'Estatus del Pago no Procesable !!!';
                $strTipoMens = 'danger';
                break;
        }
        return [$strTextMens, $strTipoMens];
    }

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



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
        $strTipoMens = 'success';
		$objRegiViej = clone $this->mctPagosCorp->PagosCorp;
		$this->txtEstatus->Text = $this->lstEstatus->SelectedValue;
		$this->mctPagosCorp->SavePagosCorp();
		if ($this->mctPagosCorp->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctPagosCorp->PagosCorp;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
                $this->mctPagosCorp->PagosCorp->logDeCambios(implode(',',$objResuComp->DifferentFields));
                $this->dtgFactClie->Refresh();
                $strTextMens = 'Transaccion Exitosa !!!';
                if ($objRegiViej->Estatus != $objRegiNuev->Estatus) {
                    //-----------------------------------------------------------------------------
                    // El Estatus del pago, debe replicarse en el estatus de pago de las facturas
                    //-----------------------------------------------------------------------------
                    list($strTextMens,$strTipoMens) = $this->actualizarEstatusDelPago($objRegiNuev->Estatus);
                }
                if ($strTipoMens == 'danger') {
                    $this->danger($strTextMens);
                } else {
                    $this->success($strTextMens);
                }
                $this->mostrarSaldoCliente($this->mctPagosCorp->PagosCorp->ClienteCorp);
			}
		} else {
            $this->mctPagosCorp->PagosCorp->logDeCambios("Creado");
        }
        $this->mctPagosCorp->PagosCorp->ActualizarMontosDeLasFacturas();
        $this->success('Transacción Exitosa');
	}


    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //--------------------------------------------
        // Se obtiene las Facturas asociadas al Pago
        //--------------------------------------------
        //$arrFactAsoc = $this->mctPagosCorp->PagosCorp->GetFacturasAsFacturaPagoCorpArray();
        //------------------------------------------------------
        // Se borra cualquier nota de credito asociada al pago
        //------------------------------------------------------
        $arrNotaCred = $this->mctPagosCorp->PagosCorp->GetNotaCreditoCorpAsPagoCorpArray();
        foreach ($arrNotaCred as $objNotaCred) {
            $objNotaCred->Delete();
        }
        //---------------------
        // Se elimina el Pago
        //---------------------
        $this->mctPagosCorp->DeletePagosCorp();
        $this->mctPagosCorp->PagosCorp->logDeCambios("Borrado");
        //---------------------------------------------------------------------
        // Se actualiza el monto cobrado de la facturas asociadas
        //---------------------------------------------------------------------
        $this->mctPagosCorp->PagosCorp->ActualizarMontosDeLasFacturas();
        //foreach ($arrFactAsoc as $objFactAsoc) {
        //    $objFactAsoc->ActualizarMontos();
        //}
        //-----------------------------------------
        // Se actaliza ahora el saldo del Cliente
        //-----------------------------------------
        $objClieFact = MasterCliente::Load($this->lstClienteCorp->SelectedValue);
        $objClieFact->calcularSaldoExcedente();
        $this->RedirectToListPage();
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// pagos_corp_edit.tpl.php as the included HTML template file
PagosCorpEditForm::Run('PagosCorpEditForm');
