<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacVendedorEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the FacVendedor class.  It uses the code-generated
 * FacVendedorMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a FacVendedor columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both fac_vendedor_edit.php AND
 * fac_vendedor_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacVendedorEditForm extends FacVendedorEditFormBase {

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
        
        $this->lblTituForm->Text = 'Vendedor';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the FacVendedorMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctFacVendedor = FacVendedorMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on FacVendedor's data fields
        $this->txtId = $this->mctFacVendedor->txtId_Create();
        $this->txtId->Enabled = false;
        $this->txtId->ForeColor = 'blue';
		$this->txtId->Width = 30;

		$this->txtNombre = $this->mctFacVendedor->txtNombre_Create();
		$this->txtNombre->Width = 200;

        $this->txtCedula = $this->mctFacVendedor->txtCedula_Create();
		$this->txtCedula->Name = 'Cédula';
		$this->txtCedula->Width = 90;

        $this->txtDireccionEmail = $this->mctFacVendedor->txtDireccionEmail_Create();
        $this->txtDireccionEmail->Name = 'Correo Electrónico';
		$this->txtDireccionEmail->Width = 250;

        $this->txtPorcentajeComision = $this->mctFacVendedor->txtPorcentajeComision_Create();
        $this->txtPorcentajeComision->Name = 'Porcentaje Comisión';
        $this->txtPorcentajeComision->HtmlAfter = ' %';
        $this->txtPorcentajeComision->Width = 40;

        $this->calFechaRegistro = $this->mctFacVendedor->calFechaRegistro_Create();
        if (!$this->mctFacVendedor->EditMode) {
            $this->calFechaRegistro->DateTime = new QDateTime(QDateTime::Now);
        }
        $this->calFechaRegistro->Enabled = false;
        $this->calFechaRegistro->ForeColor = 'blue';
		$this->calFechaRegistro->Width = 120;

		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Pais()->Id,1);
		$this->lstPais = $this->mctFacVendedor->lstPais_Create(null,QQ::AndCondition($objClauWher));

		$this->lstStatus = $this->mctFacVendedor->lstStatus_Create();
        if (!$this->mctFacVendedor->EditMode) {
            $this->lstStatus->SelectedIndex = 2;
        }
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctFacVendedor->FacVendedor && !isset($_SESSION['DataFacVendedor'])) {
            $_SESSION['DataFacVendedor'] = serialize(array($this->mctFacVendedor->FacVendedor));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataFacVendedor']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctFacVendedor->FacVendedor->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('FacVendedor',$this->mctFacVendedor->FacVendedor->Id);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/fac_vendedor_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/fac_vendedor_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/fac_vendedor_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/fac_vendedor_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctFacVendedor->FacVendedor;
		if (!$this->mctFacVendedor->EditMode) {
		    $this->txtId->Text = proxIdVendedor();
        }
		$this->mctFacVendedor->SaveFacVendedor();
		if ($this->mctFacVendedor->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctFacVendedor->FacVendedor;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'FacVendedor';
				$arrLogxCamb['intRefeRegi'] = $this->mctFacVendedor->FacVendedor->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctFacVendedor->FacVendedor->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/fac_vendedor_edit.php/'.$this->mctFacVendedor->FacVendedor->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'FacVendedor';
			$arrLogxCamb['intRefeRegi'] = $this->mctFacVendedor->FacVendedor->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctFacVendedor->FacVendedor->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/fac_vendedor_edit.php/'.$this->mctFacVendedor->FacVendedor->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctFacVendedor->TablasRelacionadasFacVendedor();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctFacVendedor->DeleteFacVendedor();
            $arrLogxCamb['strNombTabl'] = 'FacVendedor';
            $arrLogxCamb['intRefeRegi'] = $this->mctFacVendedor->FacVendedor->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctFacVendedor->FacVendedor->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// fac_vendedor_edit.tpl.php as the included HTML template file
FacVendedorEditForm::Run('FacVendedorEditForm');
?>