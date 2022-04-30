<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/PaisEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Pais class.  It uses the code-generated
 * PaisMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Pais columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both pais_edit.php AND
 * pais_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class PaisEditForm extends PaisEditFormBase {

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

    protected function FlashMessage() {
        if (isset($_SESSION['FlashMessage'])) {
            list($strTipoMens, $strTextMens) = $_SESSION['FlashMessage'];
            $this->$strTipoMens($strTextMens);
            unset($_SESSION['FlashMessage']);
        }
    }

//	protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

        $this->FlashMessage();

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the PaisMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctPais = PaisMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Pais's data fields
		$this->lblId = $this->mctPais->lblId_Create();
		$this->txtNombre = $this->mctPais->txtNombre_Create();
		$this->lstDivisa = $this->mctPais->lstDivisa_Create();
		$this->txtSiglas = $this->mctPais->txtSiglas_Create();
        $this->chkEsPrincipal = $this->mctPais->chkEsPrincipal_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctPais->Pais && !isset($_SESSION['DataPais'])) {
            $_SESSION['DataPais'] = serialize(array($this->mctPais->Pais));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataPais']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctPais->Pais->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Pais',$this->mctPais->Pais->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/pais_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/pais_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/pais_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/pais_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctPais->Pais;
		$this->mctPais->SavePais();
		if ($this->mctPais->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctPais->Pais;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Pais';
				$arrLogxCamb['intRefeRegi'] = $this->mctPais->Pais->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctPais->Pais->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pais_edit.php/'.$this->mctPais->Pais->Id;
				LogDeCambios($arrLogxCamb);

                $_SESSION['FlashMessage'] = ['success','Registro Actualizado Exitosamente !!'];
                QApplication::Redirect(__SIST__.'/pais_edit.php/'.$this->mctPais->Pais->Id);

                //$this->success('Transacción Exitosa !!!');
			} else {
                $_SESSION['FlashMessage'] = ['warning','No se realizaron cambios al registro !!'];
                QApplication::Redirect(__SIST__.'/pais_edit.php/'.$this->mctPais->Pais->Id);
            }
		} else {
			$arrLogxCamb['strNombTabl'] = 'Pais';
			$arrLogxCamb['intRefeRegi'] = $this->mctPais->Pais->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctPais->Pais->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pais_edit.php/'.$this->mctPais->Pais->Id;
			LogDeCambios($arrLogxCamb);

            $_SESSION['FlashMessage'] = ['success','Registro Ingresado Exitosamente !!'];
            QApplication::Redirect(__SIST__.'/pais_edit.php/'.$this->mctPais->Pais->Id);

            //$this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctPais->TablasRelacionadasPais();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctPais->DeletePais();
            $arrLogxCamb['strNombTabl'] = 'Pais';
            $arrLogxCamb['intRefeRegi'] = $this->mctPais->Pais->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctPais->Pais->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// pais_edit.tpl.php as the included HTML template file
PaisEditForm::Run('PaisEditForm');
?>