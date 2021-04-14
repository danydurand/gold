<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/MotivoEliminacionEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the MotivoEliminacion class.  It uses the code-generated
 * MotivoEliminacionMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a MotivoEliminacion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both motivo_eliminacion_edit.php AND
 * motivo_eliminacion_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class MotivoEliminacionEditForm extends MotivoEliminacionEditFormBase {

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

		$this->lblTituForm->Text = 'Motivo Eliminacion de Cliente';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the MotivoEliminacionMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctMotivoEliminacion = MotivoEliminacionMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on MotivoEliminacion's data fields
		$this->lblId = $this->mctMotivoEliminacion->lblId_Create();
		$this->txtDescription = $this->mctMotivoEliminacion->txtDescription_Create();
		$this->txtDescription->Name = 'Descripción';
		$this->txtDescription->Width = 350;
		$this->calCreatedAt = $this->mctMotivoEliminacion->calCreatedAt_Create();
		$this->calCreatedAt->Name = 'Creada El';
		$this->calCreatedAt->Enabled = false;
		$this->calCreatedAt->ForeColor = 'blue';
		if (!$this->mctMotivoEliminacion->EditMode) {
		    $this->calCreatedAt->DateTime = new QDateTime(QDateTime::Now());
        }
		$this->lstUser = $this->mctMotivoEliminacion->lstUser_Create();
		$this->lstUser->Name = 'Creada Por';
		$this->calDeletedAt = $this->mctMotivoEliminacion->calDeletedAt_Create();

		$this->lstUser->RemoveAllItems();
        if (!$this->mctMotivoEliminacion->EditMode) {
            $this->lstUser->AddItem($this->objUsuario->LogiUsua,$this->objUsuario->CodiUsua,true);
        } else {
            $objUsuaCrea = $this->mctMotivoEliminacion->MotivoEliminacion->User;
            $this->lstUser->AddItem($objUsuaCrea->LogiUsua,$objUsuaCrea->CodiUsua,true);
        }
        $this->lstUser->Enabled = false;
        $this->lstUser->ForeColor = 'blue';
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctMotivoEliminacion->MotivoEliminacion && !isset($_SESSION['DataMotivoEliminacion'])) {
            $_SESSION['DataMotivoEliminacion'] = serialize(array($this->mctMotivoEliminacion->MotivoEliminacion));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataMotivoEliminacion']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctMotivoEliminacion->MotivoEliminacion->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('MotivoEliminacion',$this->mctMotivoEliminacion->MotivoEliminacion->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/motivo_eliminacion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/motivo_eliminacion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/motivo_eliminacion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/motivo_eliminacion_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
        $this->mctMotivoEliminacion->MotivoEliminacion->UserId = $this->lstUser->SelectedValue;
		$objRegiViej = clone $this->mctMotivoEliminacion->MotivoEliminacion;
		t('B1');
		t('El valor del Usuario es: '.$this->lstUser->SelectedValue);
		$this->mctMotivoEliminacion->SaveMotivoEliminacion();
		t('B2');
		if ($this->mctMotivoEliminacion->EditMode) {
		    t('B3');
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
            $objRegiNuev = $this->mctMotivoEliminacion->MotivoEliminacion;
            t('B4');
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
			    t('B5');
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'MotivoEliminacion';
				$arrLogxCamb['intRefeRegi'] = $this->mctMotivoEliminacion->MotivoEliminacion->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctMotivoEliminacion->MotivoEliminacion->Description;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/motivo_eliminacion_edit.php/'.$this->mctMotivoEliminacion->MotivoEliminacion->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','',__iCHEC__);
                t('B6');
			}
		} else {
		    t('B7');
			$arrLogxCamb['strNombTabl'] = 'MotivoEliminacion';
			$arrLogxCamb['intRefeRegi'] = $this->mctMotivoEliminacion->MotivoEliminacion->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctMotivoEliminacion->MotivoEliminacion->Description;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/motivo_eliminacion_edit.php/'.$this->mctMotivoEliminacion->MotivoEliminacion->Id;
			LogDeCambios($arrLogxCamb);
            t('B8');
		}
        $this->mensaje('Transacción Exitosa','','',__iCHEC__);
		t('B9');
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        /*
        $arrTablRela = $this->mctMotivoEliminacion->TablasRelacionadasMotivoEliminacion();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        */
        $this->mctMotivoEliminacion->MotivoEliminacion->DeletedAt = new QDateTime(QDateTime::Now);
        $this->mctMotivoEliminacion->MotivoEliminacion->Save();
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            //$this->mctMotivoEliminacion->DeleteMotivoEliminacion();
            $arrLogxCamb['strNombTabl'] = 'MotivoEliminacion';
            $arrLogxCamb['intRefeRegi'] = $this->mctMotivoEliminacion->MotivoEliminacion->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctMotivoEliminacion->MotivoEliminacion->Description;
            $arrLogxCamb['strDescCamb'] = "Eliminado (SoftDelete)";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// motivo_eliminacion_edit.tpl.php as the included HTML template file
MotivoEliminacionEditForm::Run('MotivoEliminacionEditForm');
?>