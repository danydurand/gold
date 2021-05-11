<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/RutasEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Rutas class.  It uses the code-generated
 * RutasMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Rutas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both rutas_edit.php AND
 * rutas_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class RutasEditForm extends RutasEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the RutasMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctRutas = RutasMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Rutas's data fields
		$this->lblId = $this->mctRutas->lblId_Create();
		$this->txtCodigo = $this->mctRutas->txtCodigo_Create();
		$this->txtDescripcion = $this->mctRutas->txtDescripcion_Create();
		$this->txtDescripcion->Width = 300;
		$this->lstSucursal = $this->mctRutas->lstSucursal_Create();
		$this->lstTipo = $this->mctRutas->lstTipo_Create();
		$this->txtObservacion = $this->mctRutas->txtObservacion_Create();
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtObservacion->Width = 300;
		$this->txtObservacion->Rows = 2;
		$this->lblCreatedAt = $this->mctRutas->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctRutas->lblUpdatedAt_Create();
		//$this->lblDeletedAt = $this->mctRutas->lblDeletedAt_Create();
		//$this->txtCreatedBy = $this->mctRutas->txtCreatedBy_Create();
		//$this->txtUpdatedBy = $this->mctRutas->txtUpdatedBy_Create();
		//$this->txtDeletedBy = $this->mctRutas->txtDeletedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctRutas->Rutas && !isset($_SESSION['DataRutas'])) {
            $_SESSION['DataRutas'] = serialize(array($this->mctRutas->Rutas));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataRutas']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctRutas->Rutas->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Rutas',$this->mctRutas->Rutas->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/rutas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/rutas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/rutas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/rutas_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctRutas->Rutas;
		$this->mctRutas->SaveRutas();
		if ($this->mctRutas->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctRutas->Rutas;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Rutas';
				$arrLogxCamb['intRefeRegi'] = $this->mctRutas->Rutas->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctRutas->Rutas->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/rutas_edit.php/'.$this->mctRutas->Rutas->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Rutas';
			$arrLogxCamb['intRefeRegi'] = $this->mctRutas->Rutas->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctRutas->Rutas->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/rutas_edit.php/'.$this->mctRutas->Rutas->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctRutas->TablasRelacionadasRutas();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $strTextMens = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->danger($strTextMens);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctRutas->DeleteRutas();
            $arrLogxCamb['strNombTabl'] = 'Rutas';
            $arrLogxCamb['intRefeRegi'] = $this->mctRutas->Rutas->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctRutas->Rutas->Descripcion;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// rutas_edit.tpl.php as the included HTML template file
RutasEditForm::Run('RutasEditForm');
?>