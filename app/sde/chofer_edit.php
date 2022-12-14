<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ChoferEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Chofer class.  It uses the code-generated
 * ChoferMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Chofer columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both chofer_edit.php AND
 * chofer_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ChoferEditForm extends ChoferEditFormBase {
    protected $btnLogxChof;

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

        $this->lblTituForm->Text = 'Chofer';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ChoferMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctChofer = ChoferMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Chofer's data fields
		$this->lblCodiChof = $this->mctChofer->lblCodiChof_Create();
		$this->lblCodiChof->Name = 'Código';

		$this->txtNombre = $this->mctChofer->txtNombre_Create();
        $this->txtNombre->AddAction(new QChangeEvent(), new QAjaxAction('crearLogin'));

		$this->txtNumeCedu = $this->mctChofer->txtNumeCedu_Create();
		$this->txtNumeCedu->Name = 'Cédula';

		$this->txtTeleChof = $this->mctChofer->txtTeleChof_Create();
        $this->txtTeleChof->Name = 'Teléfono';
        $this->txtTeleChof->Placeholder = 'Solo Números';

		$this->txtTextObse = $this->mctChofer->txtTextObse_Create();
		$this->txtTextObse->TextMode = QTextMode::MultiLine;

        $this->txtLogin = $this->mctChofer->txtLogin_Create();
        $this->txtLogin->Width = 100;

        $this->txtPassword = $this->mctChofer->txtPassword_Create();
        $this->txtPassword->Width = 100;
        $this->txtPassword->TextMode = QTextMode::Password;

        $this->calAccesoMobile = $this->mctChofer->calAccesoMobile_Create();

        $this->lstSucursal = $this->mctChofer->lstSucursal_Create();
        $this->lstSucursal->Width = 180;

        $this->lstTipoMensObject = $this->mctChofer->lstTipoMensObject_Create();
        $this->lstTipoMensObject->Name = 'Tipo';

        $this->lstCodiDispObject = $this->mctChofer->lstCodiDispObject_Create();
        $this->lstCodiDispObject->Name = 'Disponible?';

        $this->calAccesoMobile = $this->mctChofer->calAccesoMobile_Create();
        $this->calAccesoMobile->Name = 'Acce Ruta-Mobile';

        $this->lstCodiStatObject = $this->mctChofer->lstCodiStatObject_Create();

        if (!$this->mctChofer->EditMode) {
            $this->lstTipoMensObject->SelectedIndex = 1;
            $this->lstCodiDispObject->SelectedIndex = 1;
            $this->lstCodiStatObject->SelectedIndex = 1;
            $intIdxxSucu = 0;
            foreach ($this->lstSucursal->GetAllItems() as $item) {
                if ($item->Value == $this->objUsuario->SucursalId) {
                    $this->lstSucursal->SelectedIndex = $intIdxxSucu;
                    break;
                } else {
                    $intIdxxSucu++;
                }
            }
        }

        $this->btnVolvList->Text = '<i class="fa fa-mail-reply fa-lg"></i>';

        $this->btnLogxChof_Create();
    }

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

    protected function btnLogxChof_Create() {
        $this->btnLogxChof = new QButtonP($this);
        $this->btnLogxChof->Text = TextoIcono('file-text-o','LogMobile');
        $this->btnLogxChof->HtmlEntities = false;
        $this->btnLogxChof->AddAction(new QClickEvent(), new QAjaxAction('btnLogxChof_Click'));
    }

    protected function determinarPosicion() {
        if ($this->mctChofer->Chofer && !isset($_SESSION['DataChofer'])) {
            $_SESSION['DataChofer'] = serialize(array($this->mctChofer->Chofer));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataChofer']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiChof == $this->mctChofer->Chofer->CodiChof) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Chofer',$this->mctChofer->Chofer->CodiChof);
    }

    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function btnLogxChof_Click() {
        $_SESSION['RegiRefe'] = $this->mctChofer->Chofer->CodiChof;
        $_SESSION['TablRefe'] = 'Chofer';
        $_SESSION['RegiReto'] = 'chofer_edit.php/'.$this->mctChofer->Chofer->CodiChof;
        QApplication::Redirect(__SIST__.'/log_mobile_list.php/'.$this->mctChofer->Chofer->Login);
    }

    protected function btnLogxCamb_Click() {
        $_SESSION['RegiRefe'] = $this->mctChofer->Chofer->CodiChof;
        $_SESSION['TablRefe'] = 'Chofer';
        $_SESSION['RegiReto'] = 'chofer_edit.php/'.$this->mctChofer->Chofer->CodiChof;
        QApplication::Redirect(__SIST__.'/log_list.php');
    }

    protected function nombreValido($strNombChof) {
        $arrNombChof = explode(' ',$strNombChof);
        if (count($arrNombChof) != 2) {
            $strTextMens = 'Coloque un Nombre y un Apellido separado por un espacio (Ej: Carlos Garcia)';
            $this->danger($strTextMens);
            return false;
        }
        return true;
    }

    public function crearLogin() {
	    $strNombDigi = trim($this->txtNombre->Text);
	    if (!$this->nombreValido($strNombDigi)) {
            return;
        }
        $arrNombChof = explode(' ',$strNombDigi);
        $strNombChof = $arrNombChof[0];
        $strApelChof = $arrNombChof[1];
        $this->txtLogin->Text = LoginPropuesto($strNombChof,$strApelChof);
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/chofer_edit.php/'.$objRegiTabl->CodiChof);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/chofer_edit.php/'.$objRegiTabl->CodiChof);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/chofer_edit.php/'.$objRegiTabl->CodiChof);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/chofer_edit.php/'.$objRegiTabl->CodiChof);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
	    if (!$this->nombreValido($this->txtNombre->Text)) {
	        return;
        }
        if (strlen(trim($this->txtPassword->Text)) == 0) {
            $this->txtPassword->Text = 'sencillo';
        }
        $this->txtPassword->Text = md5($this->txtPassword->Text);
        //--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctChofer->Chofer;
		$this->mctChofer->SaveChofer();

		if ($this->mctChofer->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctChofer->Chofer;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Chofer';
				$arrLogxCamb['intRefeRegi'] = $this->mctChofer->Chofer->CodiChof;
				$arrLogxCamb['strNombRegi'] = $this->mctChofer->Chofer->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/chofer_edit.php/'.$this->mctChofer->Chofer->CodiChof;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Chofer';
			$arrLogxCamb['intRefeRegi'] = $this->mctChofer->Chofer->CodiChof;
			$arrLogxCamb['strNombRegi'] = $this->mctChofer->Chofer->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/chofer_edit.php/'.$this->mctChofer->Chofer->CodiChof;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctChofer->TablasRelacionadasChofer();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->danger('Existen registros relacionados en '.$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctChofer->DeleteChofer();
            $arrLogxCamb['strNombTabl'] = 'Chofer';
            $arrLogxCamb['intRefeRegi'] = $this->mctChofer->Chofer->CodiChof;
            $arrLogxCamb['strNombRegi'] = $this->mctChofer->Chofer->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// chofer_edit.tpl.php as the included HTML template file
ChoferEditForm::Run('ChoferEditForm');
?>