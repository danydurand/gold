<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/OrigenDestinoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the OrigenDestino class.  It uses the code-generated
 * OrigenDestinoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a OrigenDestino columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both origen_destino_edit.php AND
 * origen_destino_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class OrigenDestinoEditForm extends OrigenDestinoEditFormBase {

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
        $this->lblTituForm->Text = 'Origen/Destino';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the OrigenDestinoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctOrigenDestino = OrigenDestinoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on OrigenDestino's data fields
		$this->lblId = $this->mctOrigenDestino->lblId_Create();

        $this->lstOrigenObject = $this->mctOrigenDestino->lstOrigenObject_Create();
        $this->lstOrigenObject->Name = 'Origen';

        $this->lstDestinoObject = $this->mctOrigenDestino->lstDestinoObject_Create();
        $this->lstDestinoObject->Name = 'Destino';

        $this->txtCantidadDias = $this->mctOrigenDestino->txtCantidadDias_Create();
		$this->txtCantidadDias->Name = 'Cantidad Días';

		$this->lstStatusObject = $this->mctOrigenDestino->lstStatusObject_Create();
        $this->lstStatusObject->Width = 162;
        $this->lstStatusObject->Name  = 'Estatus';

        $this->txtDistanciaKm = $this->mctOrigenDestino->txtDistanciaKm_Create();
		$this->txtDistanciaKm->Name = 'Distancia en Km';
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctOrigenDestino->OrigenDestino && !isset($_SESSION['DataOrigenDestino'])) {
            $_SESSION['DataOrigenDestino'] = serialize(array($this->mctOrigenDestino->OrigenDestino));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataOrigenDestino']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctOrigenDestino->OrigenDestino->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('OrigenDestino',$this->mctOrigenDestino->OrigenDestino->Id);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/origen_destino_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/origen_destino_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/origen_destino_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/origen_destino_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctOrigenDestino->OrigenDestino;
		$this->mctOrigenDestino->SaveOrigenDestino();
		if ($this->mctOrigenDestino->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctOrigenDestino->OrigenDestino;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'OrigenDestino';
				$arrLogxCamb['intRefeRegi'] = $this->mctOrigenDestino->OrigenDestino->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctOrigenDestino->OrigenDestino->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/origen_destino_edit.php/'.$this->mctOrigenDestino->OrigenDestino->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'OrigenDestino';
			$arrLogxCamb['intRefeRegi'] = $this->mctOrigenDestino->OrigenDestino->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctOrigenDestino->OrigenDestino->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/origen_destino_edit.php/'.$this->mctOrigenDestino->OrigenDestino->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctOrigenDestino->TablasRelacionadasOrigenDestino();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctOrigenDestino->DeleteOrigenDestino();
            $arrLogxCamb['strNombTabl'] = 'OrigenDestino';
            $arrLogxCamb['intRefeRegi'] = $this->mctOrigenDestino->OrigenDestino->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctOrigenDestino->OrigenDestino->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// origen_destino_edit.tpl.php as the included HTML template file
OrigenDestinoEditForm::Run('OrigenDestinoEditForm');
?>