<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CheckpointsEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Checkpoints class.  It uses the code-generated
 * CheckpointsMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Checkpoints columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both checkpoints_edit.php AND
 * checkpoints_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CheckpointsEditForm extends CheckpointsEditFormBase {
    protected $lstVisibilidad;
    protected $lstTipo;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the CheckpointsMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctCheckpoints = CheckpointsMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Checkpoints's data fields
		$this->lblId = $this->mctCheckpoints->lblId_Create();
		$this->txtCodigo = $this->mctCheckpoints->txtCodigo_Create();
		$this->txtCodigo->Width = 50;
		$this->txtDescripcion = $this->mctCheckpoints->txtDescripcion_Create();
		$this->txtDescripcion->Width = 400;
		$this->txtDescripcion->AddAction(new QFocusOutEvent(), new QAjaxAction('txtDescripcion_FocusOut'));
		$this->txtDescripcionRastreo = $this->mctCheckpoints->txtDescripcionRastreo_Create();
		$this->txtDescripcionRastreo->Width = 400;
		$this->chkTerminal = $this->mctCheckpoints->chkTerminal_Create();
        $this->txtVisibilidad = $this->mctCheckpoints->txtVisibilidad_Create();
        $this->lstVisibilidad = $this->lstVisibilidad_Create($this->txtVisibilidad->Text);
        $this->txtTipo = $this->mctCheckpoints->txtTipo_Create();
        $this->lstTipo = $this->lstTipo_Create($this->txtTipo->Text);
        $this->chkNotificar = $this->mctCheckpoints->chkNotificar_Create();
		$this->txtImagen = $this->mctCheckpoints->txtImagen_Create();
		$this->txtColor = $this->mctCheckpoints->txtColor_Create();
		$this->txtObservacion = $this->mctCheckpoints->txtObservacion_Create();
		$this->txtObservacion->Width = 500;
		$this->lblCreatedAt = $this->mctCheckpoints->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctCheckpoints->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctCheckpoints->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctCheckpoints->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctCheckpoints->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctCheckpoints->txtDeletedBy_Create();

		$this->lstVisibility_Change();

        //if (!$this->mctCheckpoints->EditMode) {
		 //   $this->chkNotificar->Visible = false;
		 //   $this->txtImagen->Visible = false;
		 //   $this->txtColor->Visible = false;
        //}
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lstVisibilidad_Create($strVisibilidad) {
	    $this->lstVisibilidad = new QListBox($this);
	    $this->lstVisibilidad->Name = 'Visiblidad';
        $this->lstVisibilidad->AddItem('- Seleccione -',null);
        $this->lstVisibilidad->AddItem('PUBLICO','PUBLICO','PUBLICO'==$strVisibilidad);
        $this->lstVisibilidad->AddItem('PRIVADO','PRIVADO','PRIVADO'==$strVisibilidad);
        $this->lstVisibilidad->AddAction(new QChangeEvent(), new QAjaxAction('lstVisibility_Change'));
        return $this->lstVisibilidad;
    }

    protected function lstTipo_Create($strTipo) {
	    $this->lstTipo = new QListBox($this);
	    $this->lstTipo->Name = 'Tipo';
        $this->lstTipo->AddItem('- Seleccione -',null);
        $this->lstTipo->AddItem('GESTION','GESTION','GESTION'==$strTipo);
        $this->lstTipo->AddItem('INCIDENCIA','INCIDENCIA','INCIDENCIA'==$strTipo);
        $this->lstTipo->AddItem('PROCESO','PROCESO','PROCESO'==$strTipo);
        return $this->lstTipo;
    }

    protected function lstVisibility_Change() {
	    if ($this->lstVisibilidad->SelectedValue == 'PUBLICO') {
	        $this->chkNotificar->Enabled = true;
	        $this->txtImagen->Enabled    = true;
	        $this->txtColor->Enabled     = true;
        } else {
            $this->chkNotificar->Enabled = false;
            $this->txtImagen->Enabled    = false;
            $this->txtColor->Enabled     = false;
        }
    }

    protected function txtDescripcion_FocusOut() {
	    if (strlen($this->txtDescripcionRastreo->Text) == 0) {
	        $this->txtDescripcionRastreo->Text = strtoupper($this->txtDescripcion->Text);
        }
    }

    protected function determinarPosicion() {
        if ($this->mctCheckpoints->Checkpoints && !isset($_SESSION['DataCheckpoints'])) {
            $_SESSION['DataCheckpoints'] = serialize(array($this->mctCheckpoints->Checkpoints));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataCheckpoints']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctCheckpoints->Checkpoints->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Checkpoints',$this->mctCheckpoints->Checkpoints->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/checkpoints_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/checkpoints_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/checkpoints_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/checkpoints_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctCheckpoints->Checkpoints;
		$this->txtVisibilidad->Text = $this->lstVisibilidad->SelectedValue;
        $this->txtTipo->Text = $this->lstTipo->SelectedValue;
        $this->mctCheckpoints->SaveCheckpoints();
		if ($this->mctCheckpoints->EditMode) {
            //-----------------------
            // Campos de auditoria
            //-----------------------
            //$this->mctCheckpoints->Checkpoints->UpdatedAt = date('YmdHis');
            $this->mctCheckpoints->Checkpoints->UpdatedBy = $this->objUsuario->CodiUsua;
            $this->mctCheckpoints->Checkpoints->Save();
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctCheckpoints->Checkpoints;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			t('Comparacion: '.$objResuComp->FriendlyComparisonStatus);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Checkpoints';
				$arrLogxCamb['intRefeRegi'] = $this->mctCheckpoints->Checkpoints->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctCheckpoints->Checkpoints->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/checkpoints_edit.php/'.$this->mctCheckpoints->Checkpoints->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
            //-----------------------
            // Campos de auditoria
            //-----------------------
            //$this->mctCheckpoints->Checkpoints->CreatedAt = date('YmdHis');
            $this->mctCheckpoints->Checkpoints->CreatedBy = $this->objUsuario->CodiUsua;
            $this->mctCheckpoints->Checkpoints->Save();
			$arrLogxCamb['strNombTabl'] = 'Checkpoints';
			$arrLogxCamb['intRefeRegi'] = $this->mctCheckpoints->Checkpoints->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctCheckpoints->Checkpoints->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/checkpoints_edit.php/'.$this->mctCheckpoints->Checkpoints->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctCheckpoints->TablasRelacionadasCheckpoints();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctCheckpoints->DeleteCheckpoints();
            $arrLogxCamb['strNombTabl'] = 'Checkpoints';
            $arrLogxCamb['intRefeRegi'] = $this->mctCheckpoints->Checkpoints->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctCheckpoints->Checkpoints->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// checkpoints_edit.tpl.php as the included HTML template file
CheckpointsEditForm::Run('CheckpointsEditForm');
?>