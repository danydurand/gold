<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SdeCheckpointEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the SdeCheckpoint class.  It uses the code-generated
 * SdeCheckpointMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a SdeCheckpoint columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sde_checkpoint_edit.php AND
 * sde_checkpoint_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SdeCheckpointEditForm extends SdeCheckpointEditFormBase {

    protected $lstNombImag;
    protected $lstColoImag;
    protected $lblMuesImag;

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

        $this->lblTituForm->Text  = 'Checkpoint';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the SdeCheckpointMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctSdeCheckpoint = SdeCheckpointMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on SdeCheckpoint's data fields
		$this->txtCodiCkpt = $this->mctSdeCheckpoint->txtCodiCkpt_Create();
        $this->txtCodiCkpt->Width = 40;

		$this->txtDescCkpt = $this->mctSdeCheckpoint->txtDescCkpt_Create();
		$this->txtDescCkpt->Name = 'Descripción';
		$this->txtDescCkpt->MaxLength = SdeCheckpoint::DescCkptMaxLength;
		$this->txtDescCkpt->Width = 300;

        $this->txtDescDevo = $this->mctSdeCheckpoint->txtDescDevo_Create();
        $this->txtDescDevo->Name = 'Descripción en Extranet';
        $this->txtDescDevo->MaxLength = SdeCheckpoint::DescDevoMaxLength;
        $this->txtDescDevo->Width = 300;

        $this->txtComentarioIvr = $this->mctSdeCheckpoint->txtComentarioIvr_Create();
        $this->txtComentarioIvr->Name = 'Comentario IVR';
        $this->txtComentarioIvr->MaxLength = SdeCheckpoint::ComentarioIvrMaxLength;
        $this->txtComentarioIvr->TextMode = QTextMode::MultiLine;

        $this->lstTipoTermObject = $this->mctSdeCheckpoint->lstTipoTermObject_Create();
        $this->lstTipoTermObject->Name = 'Termina Ciclo de Envío?';

        $this->lstTipoCkptObject = $this->mctSdeCheckpoint->lstTipoCkptObject_Create();
        $this->lstTipoCkptObject->Name = 'Tipo (Visibilidad)';
        if ($this->lstTipoCkptObject) {
            if ($this->lstTipoCkptObject->SelectedValue == 'PRIVADO') {
                $this->lstTipoCkptObject->HtmlAfter = ' Solo para uso interno';
            } else {
                $this->lstTipoCkptObject->HtmlAfter = ' Visible en CORP';
            }
        }
        $this->lstTipoCkptObject->AddAction(new QChangeEvent(), new QAjaxAction('lstTipoCkptObject_Change'));

        $this->txtTextObse = $this->mctSdeCheckpoint->txtTextObse_Create();
        $this->txtTextObse->Name = 'Sistema';
        $this->txtTextObse->HtmlAfter = ' SDE/CNT/DSP';
        $this->txtTextObse->Width = 40;

        $this->lstCodiStatObject = $this->mctSdeCheckpoint->lstCodiStatObject_Create();

        $this->lstCodiCcatObject = $this->mctSdeCheckpoint->lstCodiCcatObject_Create();
        $this->lstCodiCcatObject->Name = 'Categoría';
        $this->lstCodiCcatObject->Width = 140;

        $this->lstCodiInadObject = $this->mctSdeCheckpoint->lstCodiInadObject_Create();
        $this->lstCodiInadObject->Name = 'Tipo';
        $this->lstCodiInadObject->Width = 140;

        $this->lstNotificarObject = $this->mctSdeCheckpoint->lstNotificarObject_Create();
        $this->lstNotificarObject->Name = 'Notificar al Cliente?';

        $this->txtCodigoSodexo = $this->mctSdeCheckpoint->txtCodigoSodexo_Create();
        $this->txtCodigoSodexo->Name = 'Código Sodexo';
        $this->txtCodigoSodexo->Width = 60;

        $this->txtDescripcionSodexo = $this->mctSdeCheckpoint->txtDescripcionSodexo_Create();
        $this->txtDescripcionSodexo->Name = 'Descripción Sodexo';
        $this->txtDescripcionSodexo->MaxLength = SdeCheckpoint::DescripcionSodexoMaxLength;
        $this->txtDescripcionSodexo->Width = 200;

        $objClauPais   = QQ::Clause();
        $objClauPais[] = QQ::Equal(QQN::Pais()->Id,1);
        $this->lstPais = $this->mctSdeCheckpoint->lstPais_Create(null,QQ::AndCondition($objClauPais));
        $this->lstPais->Enabled = false;
        $this->lstPais->ForeColor = 'blue';
        $this->lstPais->Name = 'País';
        $this->lstPais->Width = 140;

        $this->txtImagen = $this->mctSdeCheckpoint->txtImagen_Create();
        $this->txtImagen->Name = 'Imagen';
        $this->txtImagen->MaxLength = SdeCheckpoint::ImagenMaxLength;
        $this->txtImagen->Width = 200;

        $this->txtColor = $this->mctSdeCheckpoint->txtColor_Create();
        $this->txtColor->Name = 'Color de la Imagen';
        $this->txtColor->MaxLength = SdeCheckpoint::ImagenMaxLength;
        $this->txtColor->Width = 200;

        $this->lstNombImag_Create();
        $this->lstColoImag_Create();
        $this->lblMuesImag_Create();

        //$this->chkNotificacionSms = $this->mctSdeCheckpoint->chkNotificacionSms_Create();
    }

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

    protected function lstNombImag_Create() {
	    $this->lstNombImag = new QListBox($this);
	    $this->lstNombImag->Name = 'Imagen';
	    $objClauWher   = QQ::Clause();
	    $objClauWher[] = QQ::Equal(QQN::Parametro()->IndiPara,'NombImag');
	    $arrNombImag   = Parametro::QueryArray(QQ::AndCondition($objClauWher));
	    $intCantImag   = count($arrNombImag);
	    $this->lstNombImag->AddItem('- Seleccione Uno - ('.$intCantImag.')',null);
        foreach ($arrNombImag as $objNombImag) {
            $blnSeleRegi = trim($this->txtImagen->Text) == trim($objNombImag->ParaTxt1);
            $this->lstNombImag->AddItem($objNombImag->ParaTxt1,$objNombImag->ParaTxt1,$blnSeleRegi);
	    }
    }

    protected function lstColoImag_Create() {
	    $this->lstColoImag = new QListBox($this);
	    $this->lstColoImag->Name = 'Color de la Imagen';
	    $objClauWher   = QQ::Clause();
	    $objClauWher[] = QQ::Equal(QQN::Parametro()->IndiPara,'ColoImag');
	    $arrColoImag   = Parametro::QueryArray(QQ::AndCondition($objClauWher));
	    $intCantImag   = count($arrColoImag);
	    $this->lstColoImag->AddItem('- Seleccione Uno - ('.$intCantImag.')',null);
        foreach ($arrColoImag as $objColoImag) {
            $blnSeleRegi = trim($this->txtColor->Text) == trim($objColoImag->ParaTxt1);
            $this->lstColoImag->AddItem($objColoImag->ParaTxt1,$objColoImag->ParaTxt1,$blnSeleRegi);
	    }
    }
    
    protected function lblMuesImag_Create() {
	    $this->lblMuesImag = new QLabel($this);
	    $this->lblMuesImag->Name = 'Muestra de la Imagen';
	    $this->lblMuesImag->Text = TextoIconoColor($this->mctSdeCheckpoint->SdeCheckpoint->Imagen,
            '','','lg',$this->mctSdeCheckpoint->SdeCheckpoint->Color);
	    $this->lblMuesImag->HtmlEntities = false;
    }

    protected function btnDelete_Create() {
        $this->btnDelete = new QButton($this);
        $this->btnDelete->Text = '<i class="fa fa-trash-o fa-lg"></i> Borrar';
        $this->btnDelete->CssClass = 'btn btn-danger btn-sm';
        $this->btnDelete->HtmlEntities = false;
        $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Checkpoint'))));
        $this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnDelete->Visible = $this->mctSdeCheckpoint->EditMode;
    }

    protected function determinarPosicion() {
        if ($this->mctSdeCheckpoint->SdeCheckpoint && !isset($_SESSION['DataSdeCheckpoint'])) {
            $_SESSION['DataSdeCheckpoint'] = serialize(array($this->mctSdeCheckpoint->SdeCheckpoint));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataSdeCheckpoint']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiCkpt == $this->mctSdeCheckpoint->SdeCheckpoint->CodiCkpt) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('SdeCheckpoint',$this->mctSdeCheckpoint->SdeCheckpoint->CodiCkpt);
    }

    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function lstTipoCkptObject_Change() {
        if ($this->lstTipoCkptObject->SelectedValue) {
            if ($this->lstTipoCkptObject->SelectedName == 'PRIVADO') {
                $this->lstTipoCkptObject->HtmlAfter = ' Solo para uso interno';
            } else {
                $this->lstTipoCkptObject->HtmlAfter = ' Visible en CORP';
            }
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/sde_checkpoint_edit.php/'.$objRegiTabl->CodiCkpt);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/sde_checkpoint_edit.php/'.$objRegiTabl->CodiCkpt);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/sde_checkpoint_edit.php/'.$objRegiTabl->CodiCkpt);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/sde_checkpoint_edit.php/'.$objRegiTabl->CodiCkpt);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
	    if ($this->lstTipoCkptObject->SelectedValue == SdeTipoCkptType::PUBLICO) {
	        if (is_null($this->lstNombImag->SelectedValue)) {
	            $this->mensaje('Debe seleccionar una Imagen','','d',__iHAND__);
	            return;
            }
	        if (is_null($this->lstColoImag->SelectedValue)) {
	            $this->mensaje('Debe seleccionar un Color para la Imagen','','d',__iHAND__);
	            return;
            }
        }
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
        $this->txtTextObse->Text = 'SDE';  // Este es el Sistema HardCode
        if (!is_null($this->lstNombImag->SelectedValue)) {
            $this->txtImagen->Text = $this->lstNombImag->SelectedValue;
        }
        if (!is_null($this->lstColoImag->SelectedValue)) {
            $this->txtColor->Text = $this->lstColoImag->SelectedValue;
        }


		$objRegiViej = clone $this->mctSdeCheckpoint->SdeCheckpoint;
		$this->mctSdeCheckpoint->SaveSdeCheckpoint();
		if ($this->mctSdeCheckpoint->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctSdeCheckpoint->SdeCheckpoint;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'SdeCheckpoint';
				$arrLogxCamb['intRefeRegi'] = $this->mctSdeCheckpoint->SdeCheckpoint->CodiCkpt;
				$arrLogxCamb['strNombRegi'] = $this->mctSdeCheckpoint->SdeCheckpoint->DescCkpt;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sde_checkpoint_edit.php/'.$this->mctSdeCheckpoint->SdeCheckpoint->CodiCkpt;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'SdeCheckpoint';
			$arrLogxCamb['intRefeRegi'] = $this->mctSdeCheckpoint->SdeCheckpoint->CodiCkpt;
			$arrLogxCamb['strNombRegi'] = $this->mctSdeCheckpoint->SdeCheckpoint->DescCkpt;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sde_checkpoint_edit.php/'.$this->mctSdeCheckpoint->SdeCheckpoint->CodiCkpt;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
        $this->lblMuesImag->Text = TextoIconoColor($this->mctSdeCheckpoint->SdeCheckpoint->Imagen,
            '','','lg',$this->mctSdeCheckpoint->SdeCheckpoint->Color);
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // SoftDelete del Registro
        //----------------------------------------
        $this->mctSdeCheckpoint->SdeCheckpoint->DeleteAt = new QDateTime(QDateTime::Now);
        $this->mctSdeCheckpoint->SdeCheckpoint->Save();
        //------------------------
        // Log de Transacciones
        //------------------------
        $arrLogxCamb['strNombTabl'] = 'Checkpoint';
        $arrLogxCamb['intRefeRegi'] = $this->mctSdeCheckpoint->SdeCheckpoint->CodiCkpt;
        $arrLogxCamb['strNombRegi'] = $this->mctSdeCheckpoint->SdeCheckpoint->DescCkpt;
        $arrLogxCamb['strDescCamb'] = 'Borrado (Soft)';
        LogDeCambios($arrLogxCamb);
        $this->RedirectToListPage();

    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// sde_checkpoint_edit.tpl.php as the included HTML template file
SdeCheckpointEditForm::Run('SdeCheckpointEditForm');
?>