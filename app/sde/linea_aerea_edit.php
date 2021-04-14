<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/LineaAereaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the LineaAerea class.  It uses the code-generated
 * LineaAereaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a LineaAerea columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both linea_aerea_edit.php AND
 * linea_aerea_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class LineaAereaEditForm extends LineaAereaEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the LineaAereaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctLineaAerea = LineaAereaMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on LineaAerea's data fields
		$this->lblId = $this->mctLineaAerea->lblId_Create();
		$this->txtNombre = $this->mctLineaAerea->txtNombre_Create();
		$this->chkActiva = $this->mctLineaAerea->chkActiva_Create();
		$this->lblCreatedAt = $this->mctLineaAerea->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctLineaAerea->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctLineaAerea->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctLineaAerea->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctLineaAerea->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctLineaAerea->txtDeletedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctLineaAerea->LineaAerea && !isset($_SESSION['DataLineaAerea'])) {
            $_SESSION['DataLineaAerea'] = serialize(array($this->mctLineaAerea->LineaAerea));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataLineaAerea']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctLineaAerea->LineaAerea->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('LineaAerea',$this->mctLineaAerea->LineaAerea->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/linea_aerea_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/linea_aerea_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/linea_aerea_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/linea_aerea_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctLineaAerea->LineaAerea;
		$this->mctLineaAerea->SaveLineaAerea();
		if ($this->mctLineaAerea->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctLineaAerea->LineaAerea;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'LineaAerea';
				$arrLogxCamb['intRefeRegi'] = $this->mctLineaAerea->LineaAerea->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctLineaAerea->LineaAerea->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/linea_aerea_edit.php/'.$this->mctLineaAerea->LineaAerea->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'LineaAerea';
			$arrLogxCamb['intRefeRegi'] = $this->mctLineaAerea->LineaAerea->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctLineaAerea->LineaAerea->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/linea_aerea_edit.php/'.$this->mctLineaAerea->LineaAerea->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctLineaAerea->TablasRelacionadasLineaAerea();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctLineaAerea->DeleteLineaAerea();
            $arrLogxCamb['strNombTabl'] = 'LineaAerea';
            $arrLogxCamb['intRefeRegi'] = $this->mctLineaAerea->LineaAerea->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctLineaAerea->LineaAerea->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// linea_aerea_edit.tpl.php as the included HTML template file
LineaAereaEditForm::Run('LineaAereaEditForm');
?>