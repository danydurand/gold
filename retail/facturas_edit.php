<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the FacturasMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctFacturas = FacturasMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Facturas's data fields
		$this->lblId = $this->mctFacturas->lblId_Create();
		$this->lstClienteRetail = $this->mctFacturas->lstClienteRetail_Create();
		$this->lstClienteCorp = $this->mctFacturas->lstClienteCorp_Create();
		$this->calFecha = $this->mctFacturas->calFecha_Create();
		$this->txtCedulaRif = $this->mctFacturas->txtCedulaRif_Create();
		$this->txtRazonSocial = $this->mctFacturas->txtRazonSocial_Create();
		$this->txtDireccionFiscal = $this->mctFacturas->txtDireccionFiscal_Create();
		$this->txtTelefono = $this->mctFacturas->txtTelefono_Create();
		$this->lstSucursal = $this->mctFacturas->lstSucursal_Create();
		$this->lstReceptoria = $this->mctFacturas->lstReceptoria_Create();
		$this->lstCaja = $this->mctFacturas->lstCaja_Create();
		$this->txtEstatus = $this->mctFacturas->txtEstatus_Create();
		$this->txtTasa = $this->mctFacturas->txtTasa_Create();
		$this->txtTotal = $this->mctFacturas->txtTotal_Create();
		$this->txtMontoDscto = $this->mctFacturas->txtMontoDscto_Create();
		$this->txtMontoCobrado = $this->mctFacturas->txtMontoCobrado_Create();
		$this->txtMontoPendiente = $this->mctFacturas->txtMontoPendiente_Create();
		$this->txtEstatusPago = $this->mctFacturas->txtEstatusPago_Create();
		$this->txtReferencia = $this->mctFacturas->txtReferencia_Create();
		$this->txtNumero = $this->mctFacturas->txtNumero_Create();
		$this->txtMaquinaFiscal = $this->mctFacturas->txtMaquinaFiscal_Create();
		$this->txtFechaImpresion = $this->mctFacturas->txtFechaImpresion_Create();
		$this->txtHoraImpresion = $this->mctFacturas->txtHoraImpresion_Create();
		$this->chkTieneRetencion = $this->mctFacturas->chkTieneRetencion_Create();
		$this->txtNotaCreditoId = $this->mctFacturas->txtNotaCreditoId_Create();
		$this->lblCreatedAt = $this->mctFacturas->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctFacturas->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctFacturas->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctFacturas->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctFacturas->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctFacturas->txtDeletedBy_Create();
			$this->dtgPagosCorpsAsFacturaPagoCorp = $this->mctFacturas->dtgPagosCorpsAsFacturaPagoCorp_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

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
		$this->mctFacturas->SaveFacturas();
		if ($this->mctFacturas->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctFacturas->Facturas;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Facturas';
				$arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Facturas';
			$arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctFacturas->TablasRelacionadasFacturas();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctFacturas->DeleteFacturas();
            $arrLogxCamb['strNombTabl'] = 'Facturas';
            $arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Nombre;
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