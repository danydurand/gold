<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NewGrupoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the NewGrupo class.  It uses the code-generated
 * NewGrupoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a NewGrupo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both new_grupo_edit.php AND
 * new_grupo_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class NewGrupoEditForm extends NewGrupoEditFormBase {

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

        $this->lblTituForm->Text = 'Grupo';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the NewGrupoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctNewGrupo = NewGrupoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on NewGrupo's data fields
		$this->lblId = $this->mctNewGrupo->lblId_Create();
		$this->txtNombre = $this->mctNewGrupo->txtNombre_Create();
		$this->chkActivo = $this->mctNewGrupo->chkActivo_Create();
		$this->lstSistema = $this->mctNewGrupo->lstSistema_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctNewGrupo->NewGrupo && !isset($_SESSION['DataNewGrupo'])) {
            $_SESSION['DataNewGrupo'] = serialize(array($this->mctNewGrupo->NewGrupo));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataNewGrupo']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctNewGrupo->NewGrupo->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('NewGrupo',$this->mctNewGrupo->NewGrupo->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/new_grupo_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/new_grupo_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/new_grupo_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/new_grupo_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctNewGrupo->NewGrupo;
		$this->mctNewGrupo->SaveNewGrupo();
		if ($this->mctNewGrupo->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctNewGrupo->NewGrupo;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'NewGrupo';
				$arrLogxCamb['intRefeRegi'] = $this->mctNewGrupo->NewGrupo->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctNewGrupo->NewGrupo->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/new_grupo_edit.php/'.$this->mctNewGrupo->NewGrupo->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'NewGrupo';
			$arrLogxCamb['intRefeRegi'] = $this->mctNewGrupo->NewGrupo->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctNewGrupo->NewGrupo->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/new_grupo_edit.php/'.$this->mctNewGrupo->NewGrupo->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctNewGrupo->TablasRelacionadasNewGrupo();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->mensaje(
                sprintf('Existen registros relacionados en %s',$strTablRela),
                '',
                'w',
                'exclamation-triangle');
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctNewGrupo->DeleteNewGrupo();
            $arrLogxCamb['strNombTabl'] = 'NewGrupo';
            $arrLogxCamb['intRefeRegi'] = $this->mctNewGrupo->NewGrupo->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctNewGrupo->NewGrupo->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// new_grupo_edit.tpl.php as the included HTML template file
NewGrupoEditForm::Run('NewGrupoEditForm');
?>