<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ConceptoRangosEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the ConceptoRangos class.  It uses the code-generated
 * ConceptoRangosMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a ConceptoRangos columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both concepto_rangos_edit.php AND
 * concepto_rangos_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ConceptoRangosEditForm extends ConceptoRangosEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ConceptoRangosMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctConceptoRangos = ConceptoRangosMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on ConceptoRangos's data fields
		$this->lblId = $this->mctConceptoRangos->lblId_Create();
		$this->lstConcepto = $this->mctConceptoRangos->lstConcepto_Create();
		$this->txtRangoInicial = $this->mctConceptoRangos->txtRangoInicial_Create();
		$this->txtRangoFinal = $this->mctConceptoRangos->txtRangoFinal_Create();
		$this->txtValor = $this->mctConceptoRangos->txtValor_Create();
		$this->lblCreatedAt = $this->mctConceptoRangos->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctConceptoRangos->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctConceptoRangos->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctConceptoRangos->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctConceptoRangos->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctConceptoRangos->txtDeletedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctConceptoRangos->ConceptoRangos && !isset($_SESSION['DataConceptoRangos'])) {
            $_SESSION['DataConceptoRangos'] = serialize(array($this->mctConceptoRangos->ConceptoRangos));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataConceptoRangos']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctConceptoRangos->ConceptoRangos->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('ConceptoRangos',$this->mctConceptoRangos->ConceptoRangos->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/concepto_rangos_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/concepto_rangos_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/concepto_rangos_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/concepto_rangos_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctConceptoRangos->ConceptoRangos;
		$this->mctConceptoRangos->SaveConceptoRangos();
		if ($this->mctConceptoRangos->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctConceptoRangos->ConceptoRangos;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'ConceptoRangos';
				$arrLogxCamb['intRefeRegi'] = $this->mctConceptoRangos->ConceptoRangos->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctConceptoRangos->ConceptoRangos->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/concepto_rangos_edit.php/'.$this->mctConceptoRangos->ConceptoRangos->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacci??n Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'ConceptoRangos';
			$arrLogxCamb['intRefeRegi'] = $this->mctConceptoRangos->ConceptoRangos->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctConceptoRangos->ConceptoRangos->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/concepto_rangos_edit.php/'.$this->mctConceptoRangos->ConceptoRangos->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacci??n Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctConceptoRangos->TablasRelacionadasConceptoRangos();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctConceptoRangos->DeleteConceptoRangos();
            $arrLogxCamb['strNombTabl'] = 'ConceptoRangos';
            $arrLogxCamb['intRefeRegi'] = $this->mctConceptoRangos->ConceptoRangos->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctConceptoRangos->ConceptoRangos->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// concepto_rangos_edit.tpl.php as the included HTML template file
ConceptoRangosEditForm::Run('ConceptoRangosEditForm');
?>