<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/DivisasEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Divisas class.  It uses the code-generated
 * DivisasMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Divisas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both divisas_edit.php AND
 * divisas_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class DivisasEditForm extends DivisasEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the DivisasMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctDivisas = DivisasMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Divisas's data fields
		$this->lblId = $this->mctDivisas->lblId_Create();
		$this->txtCodigo = $this->mctDivisas->txtCodigo_Create();
		$this->txtNombre = $this->mctDivisas->txtNombre_Create();
		$this->lblCreatedAt = $this->mctDivisas->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctDivisas->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctDivisas->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctDivisas->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctDivisas->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctDivisas->txtDeletedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctDivisas->Divisas && !isset($_SESSION['DataDivisas'])) {
            $_SESSION['DataDivisas'] = serialize(array($this->mctDivisas->Divisas));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataDivisas']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctDivisas->Divisas->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Divisas',$this->mctDivisas->Divisas->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/divisas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/divisas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/divisas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/divisas_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctDivisas->Divisas;
		$this->mctDivisas->SaveDivisas();
		if ($this->mctDivisas->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctDivisas->Divisas;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Divisas';
				$arrLogxCamb['intRefeRegi'] = $this->mctDivisas->Divisas->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctDivisas->Divisas->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/divisas_edit.php/'.$this->mctDivisas->Divisas->Id;
				LogDeCambios($arrLogxCamb);

                $_SESSION['FlashMessage'] = ['success','Registro Actualizado Exitosamente !!'];
                QApplication::Redirect(__SIST__.'/divisas_edit.php/'.$this->mctDivisas->Divisas->Id);

                //$this->success('Transacción Exitosa !!!');
			} else {
                $_SESSION['FlashMessage'] = ['warning','No se realizaron cambios al registro !!'];
                QApplication::Redirect(__SIST__.'/divisas_edit.php/'.$this->mctDivisas->Divisas->Id);
            }
		} else {
			$arrLogxCamb['strNombTabl'] = 'Divisas';
			$arrLogxCamb['intRefeRegi'] = $this->mctDivisas->Divisas->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctDivisas->Divisas->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/divisas_edit.php/'.$this->mctDivisas->Divisas->Id;
			LogDeCambios($arrLogxCamb);

            $_SESSION['FlashMessage'] = ['success','Registro Ingresado Exitosamente !!'];
            QApplication::Redirect(__SIST__.'/divisas_edit.php/'.$this->mctDivisas->Divisas->Id);

            //$this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctDivisas->TablasRelacionadasDivisas();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctDivisas->DeleteDivisas();
            $arrLogxCamb['strNombTabl'] = 'Divisas';
            $arrLogxCamb['intRefeRegi'] = $this->mctDivisas->Divisas->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctDivisas->Divisas->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// divisas_edit.tpl.php as the included HTML template file
DivisasEditForm::Run('DivisasEditForm');
?>