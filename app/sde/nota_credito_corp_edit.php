<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NotaCreditoCorpEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the NotaCreditoCorp class.  It uses the code-generated
 * NotaCreditoCorpMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a NotaCreditoCorp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both nota_credito_corp_edit.php AND
 * nota_credito_corp_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class NotaCreditoCorpEditForm extends NotaCreditoCorpEditFormBase {
    protected $objFactSele;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the NotaCreditoCorpMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctNotaCreditoCorp = NotaCreditoCorpMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on NotaCreditoCorp's data fields
		$this->lblId = $this->mctNotaCreditoCorp->lblId_Create();
		$this->txtReferencia = $this->mctNotaCreditoCorp->txtReferencia_Create();
		$this->txtTipo = $this->mctNotaCreditoCorp->txtTipo_Create();
		$this->lstClienteCorp = $this->mctNotaCreditoCorp->lstClienteCorp_Create();
		$this->lstClienteCorp->AddAction(new QChangeEvent(), new QAjaxAction('lstClienteCorp_Change'));
        $this->lstClienteCorp->Name = $this->enlaceCliente();


        //$this->lstPagoCorp = $this->mctNotaCreditoCorp->lstPagoCorp_Create();
        $this->lstPagoCorp = $this->lstPagoCorp_Create();
		$this->lstPagoCorp->Name = 'Ref. Pago';

        $this->lstFactura = $this->lstFactura_Create();

		$this->calFecha = $this->mctNotaCreditoCorp->calFecha_Create();
		$this->txtMonto = $this->mctNotaCreditoCorp->txtMonto_Create();
		$this->txtObservacion = $this->mctNotaCreditoCorp->txtObservacion_Create();
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtObservacion->Rows = 3;
		$this->txtObservacion->Width = 200;
		$this->txtNumero = $this->mctNotaCreditoCorp->txtNumero_Create();
		$this->txtMaquinaFiscal = $this->mctNotaCreditoCorp->txtMaquinaFiscal_Create();
		$this->txtFechaImpresion = $this->mctNotaCreditoCorp->txtFechaImpresion_Create();
		$this->txtHoraImpresion = $this->mctNotaCreditoCorp->txtHoraImpresion_Create();
		$this->lblCreatedAt = $this->mctNotaCreditoCorp->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctNotaCreditoCorp->lblUpdatedAt_Create();
		$this->txtCreatedBy = $this->mctNotaCreditoCorp->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctNotaCreditoCorp->txtUpdatedBy_Create();

		if ($this->txtTipo->Text == 'AUTOMATICA') {
		    //$this->btnDelete->Visible = false;
		    $this->txtReferencia  = disableControl($this->txtReferencia);
		    $this->txtTipo        = disableControl($this->txtTipo);
		    $this->lstClienteCorp = disableControl($this->lstClienteCorp);
		    $this->lstPagoCorp    = disableControl($this->lstPagoCorp);
		    $this->lstFactura     = disableControl($this->lstFactura);
		    $this->calFecha       = disableControl($this->calFecha);
		    $this->txtMonto       = disableControl($this->txtMonto);
		    $this->txtObservacion = disableControl($this->txtObservacion);
		    if (is_null($this->mctNotaCreditoCorp->NotaCreditoCorp->FacturaId)) {
		        $this->lstFactura->Visible = false;
            }
        }

        if (!$this->mctNotaCreditoCorp->EditMode) {
		    $this->txtReferencia->Text = NotaCreditoCorp::proxReferencia();
		    $this->txtTipo->Text = 'MANUAL';
		    $this->calFecha->DateTime = new QDateTime(QDateTime::Now());
		    $this->txtReferencia = disableControl($this->txtReferencia);
		    $this->txtTipo = disableControl($this->txtTipo);
		    $this->calFecha = disableControl($this->calFecha);
		    $this->lstFactura_Change();
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

    protected function lstPagoCorp_Create() {
	    $this->lstPagoCorp = new QListBox($this);
	    $this->lstPagoCorp->Name = 'Ref. Pago';
	    $this->lstPagoCorp->AddItem('- Seleccione Uno -',null);
	    if ($this->mctNotaCreditoCorp->EditMode) {
            if (!is_null($this->mctNotaCreditoCorp->NotaCreditoCorp->PagoCorpId)) {
                $objPagoCorp = $this->mctNotaCreditoCorp->NotaCreditoCorp->PagoCorp;
                $this->lstPagoCorp->AddItem($objPagoCorp->Referencia, $objPagoCorp->Id, true);
            }
        }
        $this->lstPagoCorp->AddAction(new QChangeEvent(), new QAjaxAction('lstPagoCorp_Change'));
        return $this->lstPagoCorp;
    }

    protected function lstFactura_Create() {
	    $this->lstFactura = new QListBox($this);
	    $this->lstFactura->Name = 'Factura';
	    $this->lstFactura->AddItem('- Seleccione Uno -',null);
	    if ($this->mctNotaCreditoCorp->EditMode) {
	        if (!is_null($this->mctNotaCreditoCorp->NotaCreditoCorp->FacturaId)) {
                $objFactRefe = $this->mctNotaCreditoCorp->NotaCreditoCorp->Factura;
                $this->lstFactura->AddItem($objFactRefe->Referencia, $objFactRefe->Id, true);
            }
        }
        $this->lstFactura->AddAction(new QChangeEvent(), new QAjaxAction('lstFactura_Change'));
        return $this->lstFactura;
    }

    protected function determinarPosicion() {
        if ($this->mctNotaCreditoCorp->NotaCreditoCorp && !isset($_SESSION['DataNotaCreditoCorp'])) {
            $_SESSION['DataNotaCreditoCorp'] = serialize(array($this->mctNotaCreditoCorp->NotaCreditoCorp));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataNotaCreditoCorp']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctNotaCreditoCorp->NotaCreditoCorp->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('NotaCreditoCorp',$this->mctNotaCreditoCorp->NotaCreditoCorp->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnVolvList_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        $strPagiReto = __SIST__.'/'.$objUltiAcce->__toString();
        QApplication::Redirect($strPagiReto);
    }

    protected function lstClienteCorp_Change() {
        if (!is_null($this->lstClienteCorp->SelectedValue)) {
            $this->lstPagoCorp->RemoveAllItems();
            $this->lstPagoCorp->AddItem('- Seleccione Uno -',null);
            $objClauOrde = QQ::OrderBy(QQN::PagosCorp()->Id,false);
            $objClauWher = QQ::Equal(QQN::PagosCorp()->ClienteCorpId,$this->lstClienteCorp->SelectedValue);
            $arrPagoClie = PagosCorp::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            foreach ($arrPagoClie as $objPagoClie) {
                $this->lstPagoCorp->AddItem($objPagoClie->Referencia, $objPagoClie->Id);
            }
        }
    }

    protected function lstPagoCorp_Change() {
        if (!is_null($this->lstPagoCorp->SelectedValue)) {
            $this->lstFactura->RemoveAllItems();
            $this->lstFactura->AddItem('- Seleccione Uno -',null);
            $objPagoSele = PagosCorp::Load($this->lstPagoCorp->SelectedValue);
            $arrFactPago = $objPagoSele->GetFacturasAsFacturaPagoCorpArray();
            foreach ($arrFactPago as $objFactPago) {
                $this->lstFactura->AddItem($objFactPago->Referencia, $objFactPago->Id);
            }
        }
    }

    protected function lstFactura_Change() {
	    $this->objFactSele = null;
	    if (!is_null($this->lstFactura->SelectedValue)) {
	        $this->objFactSele = Facturas::Load($this->lstFactura->SelectedValue);
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/nota_credito_corp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/nota_credito_corp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/nota_credito_corp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/nota_credito_corp_edit.php/'.$objRegiTabl->Id);
    }


    protected function Form_Validate()
    {
        if (is_null($this->lstClienteCorp->SelectedValue)) {
            $this->danger('Cliente Requerido');
            return false;
        }
        if (strlen($this->txtMonto->Text) == 0) {
            $this->danger('El monto de la Nota de Crédito es Requerido');
            return false;
        }
        if ($this->txtMonto->Text <= 0) {
            $this->danger('El monto de la Nota de Crédito debe ser mayor a cero');
            return false;
        }
        if (!is_null($this->lstFactura->SelectedValue)) {
            $this->objFactSele = Facturas::Load($this->lstFactura->SelectedValue);
            if ($this->txtMonto->Text > $this->objFactSele->Total) {
                $strTextmens = 'El monto de la Nota de Credito supera el importe de la Factura: <b>'.$this->objFactSele->Total.'</b>';
                $this->danger($strTextmens);
                return false;
            }
        }
        return true;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctNotaCreditoCorp->NotaCreditoCorp;
		$this->mctNotaCreditoCorp->SaveNotaCreditoCorp();
		$this->mctNotaCreditoCorp->NotaCreditoCorp->PagoCorpId = $this->lstPagoCorp->SelectedValue;
		$this->mctNotaCreditoCorp->NotaCreditoCorp->FacturaId  = $this->lstFactura->SelectedValue;
		$this->mctNotaCreditoCorp->NotaCreditoCorp->Save();
		if ($this->mctNotaCreditoCorp->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctNotaCreditoCorp->NotaCreditoCorp;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
                $this->mctNotaCreditoCorp->NotaCreditoCorp->logDeCambios(implode(',',$objResuComp->DifferentFields));
                $this->success('Transacción Exitosa !!!');
			}
		} else {
            $this->mctNotaCreditoCorp->NotaCreditoCorp->logDeCambios("Creado");
            $this->success('Transacción Exitosa !!!');
		}
		$this->mctNotaCreditoCorp->NotaCreditoCorp->ClienteCorp->calcularSaldoExcedente();
		$this->mostrarSaldoCliente($this->mctNotaCreditoCorp->NotaCreditoCorp->ClienteCorp);
	}

    protected function mostrarSaldoCliente(MasterCliente $objCliePago) {
        $decSaldClie = $objCliePago->__saldoExcedente();
        if ($decSaldClie > 0) {
            $this->ninfo('Saldo a favor del Cliente: <b>'.$decSaldClie.'</b>');
        } else {
            $this->nwarning('Deuda del Cliente: <b>'.$decSaldClie.'</b>');
        }
    }


    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctNotaCreditoCorp->TablasRelacionadasNotaCreditoCorp();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctNotaCreditoCorp->DeleteNotaCreditoCorp();
            $arrLogxCamb['strNombTabl'] = 'NotaCreditoCorp';
            $arrLogxCamb['intRefeRegi'] = $this->mctNotaCreditoCorp->NotaCreditoCorp->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctNotaCreditoCorp->NotaCreditoCorp->Referencia;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();

            $this->mctNotaCreditoCorp->NotaCreditoCorp->ClienteCorp->calcularSaldoExcedente();
            $this->mostrarSaldoCliente($this->mctNotaCreditoCorp->NotaCreditoCorp->ClienteCorp);
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// nota_credito_corp_edit.tpl.php as the included HTML template file
NotaCreditoCorpEditForm::Run('NotaCreditoCorpEditForm');
?>