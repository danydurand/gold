<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/AliadoComercialEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the AliadoComercial class.  It uses the code-generated
 * AliadoComercialMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a AliadoComercial columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both aliado_comercial_edit.php AND
 * aliado_comercial_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class AliadoComercialEditForm extends AliadoComercialEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the AliadoComercialMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctAliadoComercial = AliadoComercialMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on AliadoComercial's data fields
		$this->lblId = $this->mctAliadoComercial->lblId_Create();
		$this->txtRazonSocial = $this->mctAliadoComercial->txtRazonSocial_Create();
		$this->txtRazonSocial->Width = 250;
		$this->txtNroRif = $this->mctAliadoComercial->txtNroRif_Create();
		$this->txtNroRif->Width = 110;
		$this->txtDireccionFiscal = $this->mctAliadoComercial->txtDireccionFiscal_Create();
		$this->txtDireccionFiscal->Width = 250;
		$this->txtDireccionFiscal->TextMode = QTextMode::MultiLine;
		$this->txtDireccionFiscal->Rows = 2;
		$this->txtContacto = $this->mctAliadoComercial->txtContacto_Create();
		$this->txtContacto->Width = 250;
		$this->txtTelefono = $this->mctAliadoComercial->txtTelefono_Create();
		$this->txtEmail = $this->mctAliadoComercial->txtEmail_Create();
		$this->txtEmail->Width = 250;
		$this->lstStatus = $this->mctAliadoComercial->lstStatus_Create();
		$this->lstSucursal = $this->mctAliadoComercial->lstSucursal_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctAliadoComercial->AliadoComercial && !isset($_SESSION['DataAliadoComercial'])) {
            $_SESSION['DataAliadoComercial'] = serialize(array($this->mctAliadoComercial->AliadoComercial));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataAliadoComercial']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctAliadoComercial->AliadoComercial->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('AliadoComercial',$this->mctAliadoComercial->AliadoComercial->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctAliadoComercial->AliadoComercial;
		$this->mctAliadoComercial->SaveAliadoComercial();
		if ($this->mctAliadoComercial->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctAliadoComercial->AliadoComercial;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'AliadoComercial';
				$arrLogxCamb['intRefeRegi'] = $this->mctAliadoComercial->AliadoComercial->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctAliadoComercial->AliadoComercial->RazonSocial;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/aliado_comercial_edit.php/'.$this->mctAliadoComercial->AliadoComercial->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'AliadoComercial';
			$arrLogxCamb['intRefeRegi'] = $this->mctAliadoComercial->AliadoComercial->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctAliadoComercial->AliadoComercial->RazonSocial;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/aliado_comercial_edit.php/'.$this->mctAliadoComercial->AliadoComercial->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctAliadoComercial->TablasRelacionadasAliadoComercial();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctAliadoComercial->DeleteAliadoComercial();
            $arrLogxCamb['strNombTabl'] = 'AliadoComercial';
            $arrLogxCamb['intRefeRegi'] = $this->mctAliadoComercial->AliadoComercial->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctAliadoComercial->AliadoComercial->RazonSocial;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// aliado_comercial_edit.tpl.php as the included HTML template file
AliadoComercialEditForm::Run('AliadoComercialEditForm');
?>