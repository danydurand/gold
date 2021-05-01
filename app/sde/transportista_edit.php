<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TransportistaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Transportista class.  It uses the code-generated
 * TransportistaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Transportista columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both transportista_edit.php AND
 * transportista_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TransportistaEditForm extends TransportistaEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the TransportistaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctTransportista = TransportistaMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Transportista's data fields
		$this->lblId = $this->mctTransportista->lblId_Create();
		$this->txtNombre = $this->mctTransportista->txtNombre_Create();
		$this->txtNombre->Width = 250;
		$this->txtRif = $this->mctTransportista->txtRif_Create();
		$this->chkActivo = $this->mctTransportista->chkActivo_Create();
		$this->txtObservacion = $this->mctTransportista->txtObservacion_Create();
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtObservacion->Width = 250;
		$this->txtObservacion->Rows = 2;

		//$this->lblCreatedAt = $this->mctTransportista->lblCreatedAt_Create();
		//$this->lblUpdatedAt = $this->mctTransportista->lblUpdatedAt_Create();
		//$this->lblDeletedAt = $this->mctTransportista->lblDeletedAt_Create();
		//$this->txtCreatedBy = $this->mctTransportista->txtCreatedBy_Create();
		//$this->txtUpdatedBy = $this->mctTransportista->txtUpdatedBy_Create();
		//$this->txtDeletedBy = $this->mctTransportista->txtDeletedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctTransportista->Transportista && !isset($_SESSION['DataTransportista'])) {
            $_SESSION['DataTransportista'] = serialize(array($this->mctTransportista->Transportista));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataTransportista']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctTransportista->Transportista->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Transportista',$this->mctTransportista->Transportista->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/transportista_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/transportista_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/transportista_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/transportista_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctTransportista->Transportista;
		$this->mctTransportista->SaveTransportista();
		if ($this->mctTransportista->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctTransportista->Transportista;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Transportista';
				$arrLogxCamb['intRefeRegi'] = $this->mctTransportista->Transportista->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctTransportista->Transportista->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/transportista_edit.php/'.$this->mctTransportista->Transportista->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Transportista';
			$arrLogxCamb['intRefeRegi'] = $this->mctTransportista->Transportista->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctTransportista->Transportista->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/transportista_edit.php/'.$this->mctTransportista->Transportista->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctTransportista->TablasRelacionadasTransportista();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctTransportista->DeleteTransportista();
            $arrLogxCamb['strNombTabl'] = 'Transportista';
            $arrLogxCamb['intRefeRegi'] = $this->mctTransportista->Transportista->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctTransportista->Transportista->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// transportista_edit.tpl.php as the included HTML template file
TransportistaEditForm::Run('TransportistaEditForm');
?>