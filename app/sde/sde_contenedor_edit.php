<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SdeContenedorEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the SdeContenedor class.  It uses the code-generated
 * SdeContenedorMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a SdeContenedor columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sde_contenedor_edit.php AND
 * sde_contenedor_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SdeContenedorEditForm extends SdeContenedorEditFormBase {

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

		$this->lblTituForm->Text = 'Valija';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the SdeContenedorMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctSdeContenedor = SdeContenedorMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on SdeContenedor's data fields
		$this->txtNumeCont = $this->mctSdeContenedor->txtNumeCont_Create();
		//$this->lstCodiOperObject = $this->mctSdeContenedor->lstCodiOperObject_Create();
		//$this->calFecha = $this->mctSdeContenedor->calFecha_Create();
		//$this->txtStatCont = $this->mctSdeContenedor->txtStatCont_Create();
		//$this->txtNombreChofer = $this->mctSdeContenedor->txtNombreChofer_Create();
		//$this->txtCedulaChofer = $this->mctSdeContenedor->txtCedulaChofer_Create();
		//$this->txtPlacaVehiculo = $this->mctSdeContenedor->txtPlacaVehiculo_Create();
		//$this->txtDescipcionVehiculo = $this->mctSdeContenedor->txtDescipcionVehiculo_Create();
		//$this->lstProducto = $this->mctSdeContenedor->lstProducto_Create();
		//$this->txtMontoFlete = $this->mctSdeContenedor->txtMontoFlete_Create();
		//$this->txtMaster = $this->mctSdeContenedor->txtMaster_Create();
		//$this->txtNumeroValijas = $this->mctSdeContenedor->txtNumeroValijas_Create();
		//$this->txtValijas = $this->mctSdeContenedor->txtValijas_Create();
		//$this->txtPaisId = $this->mctSdeContenedor->txtPaisId_Create();
		//$this->txtHora = $this->mctSdeContenedor->txtHora_Create();
        //$this->dtgParentSdeContenedorsAsSdeContCont = $this->mctSdeContenedor->dtgParentSdeContenedorsAsSdeContCont_Create();
        //$this->dtgSdeContenedorsAsSdeContCont = $this->mctSdeContenedor->dtgSdeContenedorsAsSdeContCont_Create();
        //$this->dtgGuiaPiezasesAsGuia = $this->mctSdeContenedor->dtgGuiaPiezasesAsGuia_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctSdeContenedor->SdeContenedor && !isset($_SESSION['DataSdeContenedor'])) {
            $_SESSION['DataSdeContenedor'] = serialize(array($this->mctSdeContenedor->SdeContenedor));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataSdeContenedor']);
        print_r($this->arrDataTabl);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiOper == $this->mctSdeContenedor->SdeContenedor->CodiOper) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('SdeContenedor',$this->mctSdeContenedor->SdeContenedor->CodiOper);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/sde_contenedor_edit.php/'.$objRegiTabl->CodiOper);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/sde_contenedor_edit.php/'.$objRegiTabl->CodiOper);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/sde_contenedor_edit.php/'.$objRegiTabl->CodiOper);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/sde_contenedor_edit.php/'.$objRegiTabl->CodiOper);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctSdeContenedor->SdeContenedor;
		$this->mctSdeContenedor->SaveSdeContenedor();
		if ($this->mctSdeContenedor->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctSdeContenedor->SdeContenedor;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'SdeContenedor';
				$arrLogxCamb['intRefeRegi'] = $this->mctSdeContenedor->SdeContenedor->CodiOper;
				$arrLogxCamb['strNombRegi'] = $this->mctSdeContenedor->SdeContenedor->NumeCont;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sde_contenedor_edit.php/'.$this->mctSdeContenedor->SdeContenedor->CodiOper;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'SdeContenedor';
			$arrLogxCamb['intRefeRegi'] = $this->mctSdeContenedor->SdeContenedor->CodiOper;
			$arrLogxCamb['strNombRegi'] = $this->mctSdeContenedor->SdeContenedor->NumeCont;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sde_contenedor_edit.php/'.$this->mctSdeContenedor->SdeContenedor->CodiOper;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctSdeContenedor->TablasRelacionadasSdeContenedor();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctSdeContenedor->DeleteSdeContenedor();
            $arrLogxCamb['strNombTabl'] = 'SdeContenedor';
            $arrLogxCamb['intRefeRegi'] = $this->mctSdeContenedor->SdeContenedor->CodiOper;
            $arrLogxCamb['strNombRegi'] = $this->mctSdeContenedor->SdeContenedor->NumeCont;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// sde_contenedor_edit.tpl.php as the included HTML template file
SdeContenedorEditForm::Run('SdeContenedorEditForm');
?>