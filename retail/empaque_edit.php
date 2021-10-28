<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/EmpaqueEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Empaque class.  It uses the code-generated
 * EmpaqueMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Empaque columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both empaque_edit.php AND
 * empaque_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class EmpaqueEditForm extends EmpaqueEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the EmpaqueMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctEmpaque = EmpaqueMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Empaque's data fields
		$this->lblId = $this->mctEmpaque->lblId_Create();
		$this->txtNombre = $this->mctEmpaque->txtNombre_Create();
		$this->txtSiglas = $this->mctEmpaque->txtSiglas_Create();
		$this->txtSiglas->Width = 40;
		$this->txtSiglas->MaxLength = 3;
		$this->chkIsActivo = $this->mctEmpaque->chkIsActivo_Create();
		$this->calCreatedAt = $this->mctEmpaque->calCreatedAt_Create();
		$this->calCreatedAt->Name = 'F.Creacion';
		$this->calUpdatedAt = $this->mctEmpaque->calUpdatedAt_Create();
		$this->calUpdatedAt->Name = 'F.Edición';
		$this->lstCreatedByObject = $this->mctEmpaque->lstCreatedByObject_Create();
		$this->lstCreatedByObject->Name = 'Creado Por';
		$this->lstUpdatedByObject = $this->mctEmpaque->lstUpdatedByObject_Create();
		$this->lstUpdatedByObject->Name = 'Editado Por';

        if (!$this->mctEmpaque->EditMode) {
            $this->calCreatedAt->DateTime = new QDateTime(QDateTime::Now());
            $this->lstCreatedByObject->RemoveAllItems();
            $this->lstCreatedByObject->AddItem($this->objUsuario->LogiUsua, $this->objUsuario->CodiUsua, true);
            $this->calUpdatedAt->DateTime = new QDateTime(QDateTime::Now());
            $this->lstUpdatedByObject->RemoveAllItems();
            $this->lstUpdatedByObject->AddItem($this->objUsuario->LogiUsua, $this->objUsuario->CodiUsua, true);
        }
        $this->calCreatedAt = disableControl($this->calCreatedAt);
        $this->lstCreatedByObject = disableControl($this->lstCreatedByObject);
        $this->calUpdatedAt = disableControl($this->calUpdatedAt);
        $this->lstUpdatedByObject = disableControl($this->lstUpdatedByObject);

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctEmpaque->Empaque && !isset($_SESSION['DataEmpaque'])) {
            $_SESSION['DataEmpaque'] = serialize(array($this->mctEmpaque->Empaque));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataEmpaque']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctEmpaque->Empaque->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Empaque',$this->mctEmpaque->Empaque->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/empaque_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/empaque_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/empaque_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/empaque_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if ($this->mctEmpaque->EditMode) {
            $this->calUpdatedAt->DateTime = new QDateTime(QDateTime::Now());
            $this->lstUpdatedByObject->RemoveAllItems();
            $this->lstUpdatedByObject->AddItem($this->objUsuario->LogiUsua, $this->objUsuario->CodiUsua, true);
        }
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctEmpaque->Empaque;
		$this->mctEmpaque->SaveEmpaque();
		if ($this->mctEmpaque->EditMode) {
            //---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctEmpaque->Empaque;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Empaque';
				$arrLogxCamb['intRefeRegi'] = $this->mctEmpaque->Empaque->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctEmpaque->Empaque->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/empaque_edit.php/'.$this->mctEmpaque->Empaque->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Empaque';
			$arrLogxCamb['intRefeRegi'] = $this->mctEmpaque->Empaque->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctEmpaque->Empaque->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/empaque_edit.php/'.$this->mctEmpaque->Empaque->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
		$this->btnNuevRegi->Visible = true;
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctEmpaque->TablasRelacionadasEmpaque();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctEmpaque->DeleteEmpaque();
            $arrLogxCamb['strNombTabl'] = 'Empaque';
            $arrLogxCamb['intRefeRegi'] = $this->mctEmpaque->Empaque->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctEmpaque->Empaque->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// empaque_edit.tpl.php as the included HTML template file
EmpaqueEditForm::Run('EmpaqueEditForm');
?>