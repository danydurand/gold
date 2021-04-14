<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/AsistenteEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Asistente class.  It uses the code-generated
 * AsistenteMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Asistente columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both asistente_edit.php AND
 * asistente_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class AsistenteEditForm extends AsistenteEditFormBase {

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

        $this->lblTituForm->Text = 'Asistente';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the AsistenteMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctAsistente = AsistenteMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Asistente's data fields
		$this->lblCodiAsis = $this->mctAsistente->lblCodiAsis_Create();
		$this->lblCodiAsis->Name = 'Asistente';

		$this->txtNombAsis = $this->mctAsistente->txtNombAsis_Create();
		$this->txtNombAsis->Name = 'Nombres';

		$this->txtApelAsis = $this->mctAsistente->txtApelAsis_Create();
		$this->txtApelAsis->Name = 'Apellidos';

		$this->txtNumeCedu = $this->mctAsistente->txtNumeCedu_Create();
		$this->txtNumeCedu->Name = 'Cédula';

		$this->txtNumeTele = $this->mctAsistente->txtNumeTele_Create();
		$this->txtNumeTele->Name = 'Teléfono';

		$this->txtTextObse = $this->mctAsistente->txtTextObse_Create();
		$this->txtTextObse->TextMode = QTextMode::MultiLine;

		$this->lstCodiEstaObject = $this->mctAsistente->lstCodiEstaObject_Create();

		$this->lstCodiDispObject = $this->mctAsistente->lstCodiDispObject_Create();
		$this->lstCodiDispObject->Name = 'Disponible?';

		$this->lstCodiStatObject = $this->mctAsistente->lstCodiStatObject_Create();
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctAsistente->Asistente && !isset($_SESSION['DataAsistente'])) {
            $_SESSION['DataAsistente'] = serialize(array($this->mctAsistente->Asistente));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataAsistente']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiAsis == $this->mctAsistente->Asistente->CodiAsis) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Asistente',$this->mctAsistente->Asistente->CodiAsis);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/asistente_edit.php/'.$objRegiTabl->CodiAsis);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/asistente_edit.php/'.$objRegiTabl->CodiAsis);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/asistente_edit.php/'.$objRegiTabl->CodiAsis);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/asistente_edit.php/'.$objRegiTabl->CodiAsis);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctAsistente->Asistente;
		$this->mctAsistente->SaveAsistente();
		if ($this->mctAsistente->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctAsistente->Asistente;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Asistente';
				$arrLogxCamb['intRefeRegi'] = $this->mctAsistente->Asistente->CodiAsis;
				$arrLogxCamb['strNombRegi'] = $this->mctAsistente->Asistente->NombAsis . ' ' . $this->mctAsistente->Asistente->ApelAsis;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/asistente_edit.php/'.$this->mctAsistente->Asistente->CodiAsis;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Asistente';
			$arrLogxCamb['intRefeRegi'] = $this->mctAsistente->Asistente->CodiAsis;
			$arrLogxCamb['strNombRegi'] = $this->mctAsistente->Asistente->NombAsis . ' ' . $this->mctAsistente->Asistente->ApelAsis;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/asistente_edit.php/'.$this->mctAsistente->Asistente->CodiAsis;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctAsistente->TablasRelacionadasAsistente();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctAsistente->DeleteAsistente();
            $arrLogxCamb['strNombTabl'] = 'Asistente';
            $arrLogxCamb['intRefeRegi'] = $this->mctAsistente->Asistente->CodiAsis;
            $arrLogxCamb['strNombRegi'] = $this->mctAsistente->Asistente->NombAsis . ' ' . $this->mctAsistente->Asistente->ApelAsis;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// asistente_edit.tpl.php as the included HTML template file
AsistenteEditForm::Run('AsistenteEditForm');
?>