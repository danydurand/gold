<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ParametrosEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Parametros class.  It uses the code-generated
 * ParametrosMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Parametros columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both parametros_edit.php AND
 * parametros_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ParametrosEditForm extends ParametrosEditFormBase {
    protected $lblCreatedBy;
    protected $lblUpdatedBy;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ParametrosMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctParametros = ParametrosMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Parametros's data fields
		$this->lblId = $this->mctParametros->lblId_Create();
		$this->txtIndice = $this->mctParametros->txtIndice_Create();
		$this->txtIndice->Width = 90;
		$this->txtCodigo = $this->mctParametros->txtCodigo_Create();
		$this->txtCodigo->Width = 90;
		$this->txtDescripcion = $this->mctParametros->txtDescripcion_Create();
		$this->txtDescripcion->Width = 280;
		$this->txtTexto1 = $this->mctParametros->txtTexto1_Create();
        $this->txtTexto1->Width = 280;
        $this->txtTexto1->Rows = 5;
        $this->txtTexto2 = $this->mctParametros->txtTexto2_Create();
        $this->txtTexto2->Width = 200;
        $this->txtTexto2->Rows = 2;
        $this->txtTexto3 = $this->mctParametros->txtTexto3_Create();
        $this->txtTexto3->Width = 200;
        $this->txtTexto3->Rows = 2;
		$this->txtTexto4 = $this->mctParametros->txtTexto4_Create();
        $this->txtTexto4->Width = 200;
        $this->txtTexto4->Rows = 2;
        $this->txtTexto5 = $this->mctParametros->txtTexto5_Create();
        $this->txtTexto5->Width = 200;
        $this->txtTexto5->Rows = 2;

        $this->txtValor1 = $this->mctParametros->txtValor1_Create();
		$this->txtValor2 = $this->mctParametros->txtValor2_Create();
		$this->txtValor3 = $this->mctParametros->txtValor3_Create();
		$this->txtValor4 = $this->mctParametros->txtValor4_Create();
		$this->txtValor5 = $this->mctParametros->txtValor5_Create();

		$this->lblCreatedAt = $this->mctParametros->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctParametros->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctParametros->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctParametros->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctParametros->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctParametros->txtDeletedBy_Create();

		$this->lblCreatedBy_Create();
		$this->lblUpdatedBy_Create();

        if (!in_array($this->objUsuario->LogiUsua,['ddurand','mperez'])) {
            $this->btnNuevRegi->Visible = false;
            $this->btnSave->Visible = false;
            $this->btnDelete->Visible = false;
        }

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblCreatedBy_Create() {
	    $this->lblCreatedBy = new QLabel($this);
        $this->lblCreatedBy->Name = 'Creado Por';
        $this->lblCreatedBy->Text = $this->mctParametros->Parametros->_creator();
    }

    protected function lblUpdatedBy_Create() {
	    $this->lblUpdatedBy = new QLabel($this);
	    $this->lblUpdatedBy->Name = 'Modificado Por';
        $this->lblUpdatedBy->Text = $this->mctParametros->Parametros->_updater();
    }

    protected function determinarPosicion() {
        if ($this->mctParametros->Parametros && !isset($_SESSION['DataParametros'])) {
            $_SESSION['DataParametros'] = serialize(array($this->mctParametros->Parametros));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataParametros']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctParametros->Parametros->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Parametros',$this->mctParametros->Parametros->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/parametros_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/parametros_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/parametros_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/parametros_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctParametros->Parametros;
        if ($this->mctParametros->EditMode) {
            $this->txtUpdatedBy->Text = $this->objUsuario->CodiUsua;
        } else {
            $this->txtCreatedBy->Text = $this->objUsuario->CodiUsua;
        }
		$this->mctParametros->SaveParametros();
		if ($this->mctParametros->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctParametros->Parametros;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Parametros';
				$arrLogxCamb['intRefeRegi'] = $this->mctParametros->Parametros->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctParametros->Parametros->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/parametros_edit.php/'.$this->mctParametros->Parametros->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Parametros';
			$arrLogxCamb['intRefeRegi'] = $this->mctParametros->Parametros->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctParametros->Parametros->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/parametros_edit.php/'.$this->mctParametros->Parametros->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
		$this->btnNuevRegi->Visible = true;
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctParametros->TablasRelacionadasParametros();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctParametros->DeleteParametros();
            $arrLogxCamb['strNombTabl'] = 'Parametros';
            $arrLogxCamb['intRefeRegi'] = $this->mctParametros->Parametros->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctParametros->Parametros->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// parametros_edit.tpl.php as the included HTML template file
ParametrosEditForm::Run('ParametrosEditForm');
?>