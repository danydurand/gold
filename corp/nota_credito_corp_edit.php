<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
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
		$this->lstPagoCorp = $this->mctNotaCreditoCorp->lstPagoCorp_Create();
		$this->lstFactura = $this->mctNotaCreditoCorp->lstFactura_Create();
		$this->calFecha = $this->mctNotaCreditoCorp->calFecha_Create();
		$this->txtMonto = $this->mctNotaCreditoCorp->txtMonto_Create();
		$this->txtObservacion = $this->mctNotaCreditoCorp->txtObservacion_Create();
		$this->txtObservacion->Width = 200;
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtNumero = $this->mctNotaCreditoCorp->txtNumero_Create();
		$this->txtMaquinaFiscal = $this->mctNotaCreditoCorp->txtMaquinaFiscal_Create();
		$this->txtFechaImpresion = $this->mctNotaCreditoCorp->txtFechaImpresion_Create();
		$this->txtHoraImpresion = $this->mctNotaCreditoCorp->txtHoraImpresion_Create();
		$this->calCreatedAt = $this->mctNotaCreditoCorp->calCreatedAt_Create();
		$this->calUpdatedAt = $this->mctNotaCreditoCorp->calUpdatedAt_Create();
		$this->txtCreatedBy = $this->mctNotaCreditoCorp->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctNotaCreditoCorp->txtUpdatedBy_Create();

        $this->btnNuevRegi->Visible = false;
        $this->btnSave->Visible = false;
        $this->btnDelete->Visible = false;
        $this->btnLogxCamb->Visible = false;

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

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

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



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctNotaCreditoCorp->NotaCreditoCorp;
		$this->mctNotaCreditoCorp->SaveNotaCreditoCorp();
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
				$arrLogxCamb['strNombTabl'] = 'NotaCreditoCorp';
				$arrLogxCamb['intRefeRegi'] = $this->mctNotaCreditoCorp->NotaCreditoCorp->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctNotaCreditoCorp->NotaCreditoCorp->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/nota_credito_corp_edit.php/'.$this->mctNotaCreditoCorp->NotaCreditoCorp->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'NotaCreditoCorp';
			$arrLogxCamb['intRefeRegi'] = $this->mctNotaCreditoCorp->NotaCreditoCorp->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctNotaCreditoCorp->NotaCreditoCorp->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/nota_credito_corp_edit.php/'.$this->mctNotaCreditoCorp->NotaCreditoCorp->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
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
            $arrLogxCamb['strNombRegi'] = $this->mctNotaCreditoCorp->NotaCreditoCorp->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// nota_credito_corp_edit.tpl.php as the included HTML template file
NotaCreditoCorpEditForm::Run('NotaCreditoCorpEditForm');
?>