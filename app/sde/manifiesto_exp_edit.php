<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ManifiestoExpEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the ManifiestoExp class.  It uses the code-generated
 * ManifiestoExpMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a ManifiestoExp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both manifiesto_exp_edit.php AND
 * manifiesto_exp_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ManifiestoExpEditForm extends ManifiestoExpEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ManifiestoExpMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctManifiestoExp = ManifiestoExpMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on ManifiestoExp's data fields
		$this->lblId = $this->mctManifiestoExp->lblId_Create();
		$this->lstDestino = $this->mctManifiestoExp->lstDestino_Create();
		$this->lstLineaAerea = $this->mctManifiestoExp->lstLineaAerea_Create();
		$this->lstMasterAwb = $this->mctManifiestoExp->lstMasterAwb_Create();
		$this->calFechaCreacion = $this->mctManifiestoExp->calFechaCreacion_Create();
		$this->calFechaDespacho = $this->mctManifiestoExp->calFechaDespacho_Create();
		$this->txtVuelo = $this->mctManifiestoExp->txtVuelo_Create();
		$this->txtPiezas = $this->mctManifiestoExp->txtPiezas_Create();
		$this->txtLibras = $this->mctManifiestoExp->txtLibras_Create();
		$this->txtVolumen = $this->mctManifiestoExp->txtVolumen_Create();
		$this->txtValor = $this->mctManifiestoExp->txtValor_Create();
		//$this->lblCreatedAt = $this->mctManifiestoExp->lblCreatedAt_Create();
		//$this->lblUpdatedAt = $this->mctManifiestoExp->lblUpdatedAt_Create();
		//$this->txtCreatedBy = $this->mctManifiestoExp->txtCreatedBy_Create();
		//$this->txtUpdatedBy = $this->mctManifiestoExp->txtUpdatedBy_Create();
		//	$this->dtgBags = $this->mctManifiestoExp->dtgBags_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctManifiestoExp->ManifiestoExp && !isset($_SESSION['DataManifiestoExp'])) {
            $_SESSION['DataManifiestoExp'] = serialize(array($this->mctManifiestoExp->ManifiestoExp));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataManifiestoExp']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctManifiestoExp->ManifiestoExp->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('ManifiestoExp',$this->mctManifiestoExp->ManifiestoExp->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/manifiesto_exp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/manifiesto_exp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/manifiesto_exp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/manifiesto_exp_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctManifiestoExp->ManifiestoExp;
		$this->mctManifiestoExp->SaveManifiestoExp();
		if ($this->mctManifiestoExp->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctManifiestoExp->ManifiestoExp;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'ManifiestoExp';
				$arrLogxCamb['intRefeRegi'] = $this->mctManifiestoExp->ManifiestoExp->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctManifiestoExp->ManifiestoExp->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/manifiesto_exp_edit.php/'.$this->mctManifiestoExp->ManifiestoExp->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'ManifiestoExp';
			$arrLogxCamb['intRefeRegi'] = $this->mctManifiestoExp->ManifiestoExp->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctManifiestoExp->ManifiestoExp->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/manifiesto_exp_edit.php/'.$this->mctManifiestoExp->ManifiestoExp->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctManifiestoExp->TablasRelacionadasManifiestoExp();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctManifiestoExp->DeleteManifiestoExp();
            $arrLogxCamb['strNombTabl'] = 'ManifiestoExp';
            $arrLogxCamb['intRefeRegi'] = $this->mctManifiestoExp->ManifiestoExp->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctManifiestoExp->ManifiestoExp->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// manifiesto_exp_edit.tpl.php as the included HTML template file
ManifiestoExpEditForm::Run('ManifiestoExpEditForm');
?>