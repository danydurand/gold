<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TarifaAgentesZonasEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the TarifaAgentesZonas class.  It uses the code-generated
 * TarifaAgentesZonasMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a TarifaAgentesZonas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_agentes_zonas_edit.php AND
 * tarifa_agentes_zonas_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaAgentesZonasEditForm extends TarifaAgentesZonasEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the TarifaAgentesZonasMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctTarifaAgentesZonas = TarifaAgentesZonasMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on TarifaAgentesZonas's data fields
		$this->lblId = $this->mctTarifaAgentesZonas->lblId_Create();
		$this->lstTarifa = $this->mctTarifaAgentesZonas->lstTarifa_Create();
		$this->txtZona = $this->mctTarifaAgentesZonas->txtZona_Create();
		$this->txtServicio = $this->mctTarifaAgentesZonas->txtServicio_Create();
		$this->txtPrecio = $this->mctTarifaAgentesZonas->txtPrecio_Create();
		$this->lblCreatedAt = $this->mctTarifaAgentesZonas->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctTarifaAgentesZonas->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctTarifaAgentesZonas->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctTarifaAgentesZonas->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctTarifaAgentesZonas->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctTarifaAgentesZonas->txtDeletedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctTarifaAgentesZonas->TarifaAgentesZonas && !isset($_SESSION['DataTarifaAgentesZonas'])) {
            $_SESSION['DataTarifaAgentesZonas'] = serialize(array($this->mctTarifaAgentesZonas->TarifaAgentesZonas));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataTarifaAgentesZonas']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctTarifaAgentesZonas->TarifaAgentesZonas->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('TarifaAgentesZonas',$this->mctTarifaAgentesZonas->TarifaAgentesZonas->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/tarifa_agentes_zonas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/tarifa_agentes_zonas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/tarifa_agentes_zonas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/tarifa_agentes_zonas_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctTarifaAgentesZonas->TarifaAgentesZonas;
		$this->mctTarifaAgentesZonas->SaveTarifaAgentesZonas();
		if ($this->mctTarifaAgentesZonas->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctTarifaAgentesZonas->TarifaAgentesZonas;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'TarifaAgentesZonas';
				$arrLogxCamb['intRefeRegi'] = $this->mctTarifaAgentesZonas->TarifaAgentesZonas->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctTarifaAgentesZonas->TarifaAgentesZonas->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_agentes_zonas_edit.php/'.$this->mctTarifaAgentesZonas->TarifaAgentesZonas->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacci??n Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'TarifaAgentesZonas';
			$arrLogxCamb['intRefeRegi'] = $this->mctTarifaAgentesZonas->TarifaAgentesZonas->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctTarifaAgentesZonas->TarifaAgentesZonas->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_agentes_zonas_edit.php/'.$this->mctTarifaAgentesZonas->TarifaAgentesZonas->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacci??n Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctTarifaAgentesZonas->TablasRelacionadasTarifaAgentesZonas();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctTarifaAgentesZonas->DeleteTarifaAgentesZonas();
            $arrLogxCamb['strNombTabl'] = 'TarifaAgentesZonas';
            $arrLogxCamb['intRefeRegi'] = $this->mctTarifaAgentesZonas->TarifaAgentesZonas->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctTarifaAgentesZonas->TarifaAgentesZonas->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// tarifa_agentes_zonas_edit.tpl.php as the included HTML template file
TarifaAgentesZonasEditForm::Run('TarifaAgentesZonasEditForm');
?>