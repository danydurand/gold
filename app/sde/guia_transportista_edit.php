<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaTransportistaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the GuiaTransportista class.  It uses the code-generated
 * GuiaTransportistaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a GuiaTransportista columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_transportista_edit.php AND
 * guia_transportista_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiaTransportistaEditForm extends GuiaTransportistaEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the GuiaTransportistaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctGuiaTransportista = GuiaTransportistaMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on GuiaTransportista's data fields
		$this->lblId = $this->mctGuiaTransportista->lblId_Create();
		$this->lstTransportista = $this->mctGuiaTransportista->lstTransportista_Create();
		$this->lstGuiaPieza = $this->mctGuiaTransportista->lstGuiaPieza_Create();
		$this->txtGuia = $this->mctGuiaTransportista->txtGuia_Create();
		$this->txtProcesoId = $this->mctGuiaTransportista->txtProcesoId_Create();
		$this->calCreatedAt = $this->mctGuiaTransportista->calCreatedAt_Create();
		$this->calUpdatedAt = $this->mctGuiaTransportista->calUpdatedAt_Create();
		$this->txtCreatedBy = $this->mctGuiaTransportista->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctGuiaTransportista->txtUpdatedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctGuiaTransportista->GuiaTransportista && !isset($_SESSION['DataGuiaTransportista'])) {
            $_SESSION['DataGuiaTransportista'] = serialize(array($this->mctGuiaTransportista->GuiaTransportista));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataGuiaTransportista']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctGuiaTransportista->GuiaTransportista->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('GuiaTransportista',$this->mctGuiaTransportista->GuiaTransportista->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/guia_transportista_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/guia_transportista_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/guia_transportista_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/guia_transportista_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctGuiaTransportista->GuiaTransportista;
		$this->mctGuiaTransportista->SaveGuiaTransportista();
		if ($this->mctGuiaTransportista->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctGuiaTransportista->GuiaTransportista;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'GuiaTransportista';
				$arrLogxCamb['intRefeRegi'] = $this->mctGuiaTransportista->GuiaTransportista->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctGuiaTransportista->GuiaTransportista->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/guia_transportista_edit.php/'.$this->mctGuiaTransportista->GuiaTransportista->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'GuiaTransportista';
			$arrLogxCamb['intRefeRegi'] = $this->mctGuiaTransportista->GuiaTransportista->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctGuiaTransportista->GuiaTransportista->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/guia_transportista_edit.php/'.$this->mctGuiaTransportista->GuiaTransportista->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctGuiaTransportista->TablasRelacionadasGuiaTransportista();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctGuiaTransportista->DeleteGuiaTransportista();
            $arrLogxCamb['strNombTabl'] = 'GuiaTransportista';
            $arrLogxCamb['intRefeRegi'] = $this->mctGuiaTransportista->GuiaTransportista->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctGuiaTransportista->GuiaTransportista->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// guia_transportista_edit.tpl.php as the included HTML template file
GuiaTransportistaEditForm::Run('GuiaTransportistaEditForm');
?>