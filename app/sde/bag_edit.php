<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/BagEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Bag class.  It uses the code-generated
 * BagMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Bag columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both bag_edit.php AND
 * bag_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class BagEditForm extends BagEditFormBase {

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


		// Use the CreateFromPathInfo shortcut (this can also be done manually using the BagMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctBag = BagMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Bag's data fields
		$this->lblId = $this->mctBag->lblId_Create();
		$this->txtNumero = $this->mctBag->txtNumero_Create();
		$this->lstDestino = $this->mctBag->lstDestino_Create();
		$this->txtEstatus = $this->mctBag->txtEstatus_Create();
		$this->txtPiezas = $this->mctBag->txtPiezas_Create();
		$this->txtLibras = $this->mctBag->txtLibras_Create();
		$this->txtVolumen = $this->mctBag->txtVolumen_Create();
		$this->txtValor = $this->mctBag->txtValor_Create();
		//$this->lblCreatedAt = $this->mctBag->lblCreatedAt_Create();
		//$this->lblUpdatedAt = $this->mctBag->lblUpdatedAt_Create();
		//$this->txtCreatedBy = $this->mctBag->txtCreatedBy_Create();
		//$this->txtUpdatedBy = $this->mctBag->txtUpdatedBy_Create();
        //$this->dtgGuiaPiezasesAsPieza = $this->mctBag->dtgGuiaPiezasesAsPieza_Create();
        //$this->dtgManifiestoExps = $this->mctBag->dtgManifiestoExps_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctBag->Bag && !isset($_SESSION['DataBag'])) {
            $_SESSION['DataBag'] = serialize(array($this->mctBag->Bag));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataBag']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctBag->Bag->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Bag',$this->mctBag->Bag->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/bag_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/bag_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/bag_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/bag_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctBag->Bag;
		$this->mctBag->SaveBag();
		if ($this->mctBag->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctBag->Bag;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Bag';
				$arrLogxCamb['intRefeRegi'] = $this->mctBag->Bag->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctBag->Bag->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/bag_edit.php/'.$this->mctBag->Bag->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Bag';
			$arrLogxCamb['intRefeRegi'] = $this->mctBag->Bag->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctBag->Bag->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/bag_edit.php/'.$this->mctBag->Bag->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctBag->TablasRelacionadasBag();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctBag->DeleteBag();
            $arrLogxCamb['strNombTabl'] = 'Bag';
            $arrLogxCamb['intRefeRegi'] = $this->mctBag->Bag->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctBag->Bag->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// bag_edit.tpl.php as the included HTML template file
BagEditForm::Run('BagEditForm');
?>