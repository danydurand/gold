<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
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

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Like(QQN::FormaPago()->ParaPagoEn,'%CONNECT%');
        $objClauWher[] = QQ::Like(QQN::FormaPago()->StatusId,SinoType::SI);
        $this->lstFormaPago = $this->mctPagosCorp->lstFormaPago_Create(null,QQ::AndCondition($objClauWher));
        $this->lstFormaPago->Width = 180;

		$this->txtReferencia = $this->mctPagosCorp->txtReferencia_Create();
		$this->calFecha = $this->mctPagosCorp->calFecha_Create();
		$this->txtMonto = $this->mctPagosCorp->txtMonto_Create();
		$this->txtEstatus = $this->mctPagosCorp->txtEstatus_Create();
		$this->txtObservacion = $this->mctPagosCorp->txtObservacion_Create();
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtObservacion->Rows = 3;
		$this->txtObservacion->Width = 180;
		$this->lblCreatedAt = $this->mctPagosCorp->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctPagosCorp->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctPagosCorp->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctPagosCorp->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctPagosCorp->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctPagosCorp->txtDeletedBy_Create();
        $this->dtgFacturasesAsFacturaPagoCorp = $this->mctPagosCorp->dtgFacturasesAsFacturaPagoCorp_Create();

        $this->txtEstatus = disableControl($this->txtEstatus);

        $this->dtgFactClie_Create();
        if ($this->mctPagosCorp->PagosCorp->Estatus != 'PENDIENTE') {
            $this->btnDelete->Visible = false;
        }

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

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

        $colMontCobr = new QDataGridColumn($this);
        $colMontCobr->Name = QApplication::Translate('Pagado');
        $colMontCobr->Html = '<?= nf($_ITEM->MontoCobrado) ?>';
        $colMontCobr->Width = 70;
        $this->dtgFactClie->AddColumn($colMontCobr);

    }

    public function btnNuevRegi_Click()
    {
        QApplication::Redirect(__SIST__.'/registrar_pago.php');
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


    protected function controlSaldoExcedente() {
        //------------------------------
        // Control de Saldo Excedente
        //------------------------------
        $arrTodoFact = $this->mctPagosCorp->PagosCorp->ClienteCorp->GetFacturasAsClienteCorpArray();
        $decDeudTota = 0;
        foreach ($arrTodoFact as $objFactClie) {
            $decDeudTota += $objFactClie->Total;
        }
        $arrTodoPago = $this->mctPagosCorp->PagosCorp->ClienteCorp->GetPagosCorpAsClienteCorpArray();
        $decPagoTota = 0;
        foreach ($arrTodoPago as $objPagoClie) {
            $decPagoTota += $objPagoClie->Monto;
        }
        $decSaldExce = $decPagoTota - $decDeudTota;
        //------------------------------------
        // Se actualiza el saldo del Cliente
        //------------------------------------
        $this->mctPagosCorp->PagosCorp->ClienteCorp->SaldoExcedente = $decSaldExce;
        $this->mctPagosCorp->PagosCorp->ClienteCorp->Save();
        $arrLogxCamb['strNombTabl'] = 'MasterCliente';
        $arrLogxCamb['intRefeRegi'] = $this->mctPagosCorp->PagosCorp->ClienteCorp->CodiClie;
        $arrLogxCamb['strNombRegi'] = $this->mctPagosCorp->PagosCorp->ClienteCorp->NombClie;
        $arrLogxCamb['strDescCamb'] = "Se actualiza el Saldo Excedente a: ".$decSaldExce;
        LogDeCambios($arrLogxCamb);
        //-------------------------------------------------------
        // Se comunica al Usuario el Saldo Excedente o la Deuda
        //-------------------------------------------------------
        if ($decSaldExce > 0) {
            $this->ninfo('Saldo a su favor: '.nf($decSaldExce));
        } else {
            $this->nwarning('Monto de la Deuda: '.nf($decSaldExce*-1));
        }
    }


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctPagosCorp->PagosCorp;
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
				$arrLogxCamb['strNombTabl'] = 'PagosCorp';
				$arrLogxCamb['intRefeRegi'] = $this->mctPagosCorp->PagosCorp->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctPagosCorp->PagosCorp->Referencia;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$this->mctPagosCorp->PagosCorp->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'PagosCorp';
			$arrLogxCamb['intRefeRegi'] = $this->mctPagosCorp->PagosCorp->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctPagosCorp->PagosCorp->Referencia;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$this->mctPagosCorp->PagosCorp->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa');
		}
		$this->controlSaldoExcedente();
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
            }
            $this->mctPagosCorp->DeletePagosCorp();
            $arrLogxCamb['strNombTabl'] = 'PagosCorp';
            $arrLogxCamb['intRefeRegi'] = $this->mctPagosCorp->PagosCorp->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctPagosCorp->PagosCorp->Referencia;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->controlSaldoExcedente();
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// pagos_corp_edit.tpl.php as the included HTML template file
PagosCorpEditForm::Run('PagosCorpEditForm');
?>