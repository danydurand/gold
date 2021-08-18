<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ClientesRetailEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the ClientesRetail class.  It uses the code-generated
 * ClientesRetailMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a ClientesRetail columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both clientes_retail_edit.php AND
 * clientes_retail_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ClientesRetailEditForm extends ClientesRetailEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ClientesRetailMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctClientesRetail = ClientesRetailMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on ClientesRetail's data fields
		$this->lblId = $this->mctClientesRetail->lblId_Create();
		$this->txtCedulaRif = $this->mctClientesRetail->txtCedulaRif_Create();
		$this->txtNombre = $this->mctClientesRetail->txtNombre_Create();
		$this->txtSexo = $this->mctClientesRetail->txtSexo_Create();
		$this->lstSucursal = $this->mctClientesRetail->lstSucursal_Create();
		$this->txtEmail = $this->mctClientesRetail->txtEmail_Create();
		$this->txtTelefonoFijo = $this->mctClientesRetail->txtTelefonoFijo_Create();
		$this->txtTelefonoMovil = $this->mctClientesRetail->txtTelefonoMovil_Create();
		$this->txtDireccion = $this->mctClientesRetail->txtDireccion_Create();
		$this->txtEstado = $this->mctClientesRetail->txtEstado_Create();
		$this->txtCiudad = $this->mctClientesRetail->txtCiudad_Create();
		$this->txtCodigoPostal = $this->mctClientesRetail->txtCodigoPostal_Create();
		$this->calFechaNacimiento = $this->mctClientesRetail->calFechaNacimiento_Create();
		$objClauOrde = QQ::OrderBy(QQN::Profesiones()->Nombre);
		$this->lstProfesion = $this->mctClientesRetail->lstProfesion_Create(null,null,$objClauOrde);
		//$this->lblCreatedAt = $this->mctClientesRetail->lblCreatedAt_Create();
		//$this->lblUpdatedAt = $this->mctClientesRetail->lblUpdatedAt_Create();
		//$this->lblDeletedAt = $this->mctClientesRetail->lblDeletedAt_Create();
		//$this->txtCreatedBy = $this->mctClientesRetail->txtCreatedBy_Create();
		//$this->txtUpdatedBy = $this->mctClientesRetail->txtUpdatedBy_Create();
		//$this->txtDeletedBy = $this->mctClientesRetail->txtDeletedBy_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctClientesRetail->ClientesRetail && !isset($_SESSION['DataClientesRetail'])) {
            $_SESSION['DataClientesRetail'] = serialize(array($this->mctClientesRetail->ClientesRetail));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataClientesRetail']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctClientesRetail->ClientesRetail->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('ClientesRetail',$this->mctClientesRetail->ClientesRetail->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/clientes_retail_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/clientes_retail_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/clientes_retail_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/clientes_retail_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctClientesRetail->ClientesRetail;
		$this->mctClientesRetail->SaveClientesRetail();
		if ($this->mctClientesRetail->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctClientesRetail->ClientesRetail;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'ClientesRetail';
				$arrLogxCamb['intRefeRegi'] = $this->mctClientesRetail->ClientesRetail->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctClientesRetail->ClientesRetail->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/clientes_retail_edit.php/'.$this->mctClientesRetail->ClientesRetail->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'ClientesRetail';
			$arrLogxCamb['intRefeRegi'] = $this->mctClientesRetail->ClientesRetail->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctClientesRetail->ClientesRetail->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/clientes_retail_edit.php/'.$this->mctClientesRetail->ClientesRetail->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctClientesRetail->TablasRelacionadasClientesRetail();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctClientesRetail->DeleteClientesRetail();
            $arrLogxCamb['strNombTabl'] = 'ClientesRetail';
            $arrLogxCamb['intRefeRegi'] = $this->mctClientesRetail->ClientesRetail->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctClientesRetail->ClientesRetail->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// clientes_retail_edit.tpl.php as the included HTML template file
ClientesRetailEditForm::Run('ClientesRetailEditForm');
?>