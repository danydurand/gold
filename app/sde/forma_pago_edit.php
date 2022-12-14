<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FormaPagoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the FormaPago class.  It uses the code-generated
 * FormaPagoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a FormaPago columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both forma_pago_edit.php AND
 * forma_pago_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FormaPagoEditForm extends FormaPagoEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the FormaPagoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctFormaPago = FormaPagoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on FormaPago's data fields
		$this->lblId = $this->mctFormaPago->lblId_Create();
		$this->txtDescripcion = $this->mctFormaPago->txtDescripcion_Create();
		$this->lstStatus = $this->mctFormaPago->lstStatus_Create();
		$this->lstRequiereDocumentoObject = $this->mctFormaPago->lstRequiereDocumentoObject_Create();
		$this->txtTextoDocumento = $this->mctFormaPago->txtTextoDocumento_Create();
		$this->lstRequiereCuentaObject = $this->mctFormaPago->lstRequiereCuentaObject_Create();
		$this->txtAbreviado = $this->mctFormaPago->txtAbreviado_Create();
		$this->txtParaPagoEn = $this->mctFormaPago->txtParaPagoEn_Create();
		//$this->lblCreatedAt = $this->mctFormaPago->lblCreatedAt_Create();
		//$this->lblUpdatedAt = $this->mctFormaPago->lblUpdatedAt_Create();
		//$this->lblDeletedAt = $this->mctFormaPago->lblDeletedAt_Create();
		//$this->txtCreatedBy = $this->mctFormaPago->txtCreatedBy_Create();
		//$this->txtUpdatedBy = $this->mctFormaPago->txtUpdatedBy_Create();
		//$this->txtDeletedBy = $this->mctFormaPago->txtDeletedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctFormaPago->FormaPago && !isset($_SESSION['DataFormaPago'])) {
            $_SESSION['DataFormaPago'] = serialize(array($this->mctFormaPago->FormaPago));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataFormaPago']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctFormaPago->FormaPago->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('FormaPago',$this->mctFormaPago->FormaPago->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/forma_pago_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/forma_pago_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/forma_pago_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/forma_pago_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctFormaPago->FormaPago;
		$this->mctFormaPago->SaveFormaPago();
		if ($this->mctFormaPago->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctFormaPago->FormaPago;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'FormaPago';
				$arrLogxCamb['intRefeRegi'] = $this->mctFormaPago->FormaPago->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctFormaPago->FormaPago->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/forma_pago_edit.php/'.$this->mctFormaPago->FormaPago->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacci??n Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'FormaPago';
			$arrLogxCamb['intRefeRegi'] = $this->mctFormaPago->FormaPago->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctFormaPago->FormaPago->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/forma_pago_edit.php/'.$this->mctFormaPago->FormaPago->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacci??n Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctFormaPago->TablasRelacionadasFormaPago();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctFormaPago->DeleteFormaPago();
            $arrLogxCamb['strNombTabl'] = 'FormaPago';
            $arrLogxCamb['intRefeRegi'] = $this->mctFormaPago->FormaPago->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctFormaPago->FormaPago->Descripcion;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// forma_pago_edit.tpl.php as the included HTML template file
FormaPagoEditForm::Run('FormaPagoEditForm');
?>