<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SodexoInputEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the SodexoInput class.  It uses the code-generated
 * SodexoInputMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a SodexoInput columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sodexo_input_edit.php AND
 * sodexo_input_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SodexoInputEditForm extends SodexoInputEditFormBase {
	protected $lblCierCicl;

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
        $this->lblTituForm->Text  = ' Guía Sodexo ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the SodexoInputMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctSodexoInput = SodexoInputMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on SodexoInput's data fields
		$this->lblId = $this->mctSodexoInput->lblId_Create();

		$this->txtCodigoTurpial = $this->mctSodexoInput->txtCodigoTurpial_Create();
		$this->txtCodigoTurpial->Name = 'Código Turpial';
		$this->txtCodigoTurpial->Width = 100;

		$this->txtRazonSocial = $this->mctSodexoInput->txtRazonSocial_Create();
		$this->txtRazonSocial->Name = 'Razón Social';
		$this->txtRazonSocial->Width = 300;

		$this->txtGuiaSodexo = $this->mctSodexoInput->txtGuiaSodexo_Create();
		$this->txtGuiaSodexo->Name = 'Guía Sodexo';
		$this->txtGuiaSodexo->Width = 200;

		$this->txtCantidadEnvases = $this->mctSodexoInput->txtCantidadEnvases_Create();
		$this->txtCantidadEnvases->Width = 40;

		$this->txtFechaDespacho = $this->mctSodexoInput->txtFechaDespacho_Create();
		$this->txtFechaDespacho->Width = 100;
		
		$this->txtDireccionEntrega = $this->mctSodexoInput->txtDireccionEntrega_Create();
		$this->txtDireccionEntrega->Name = 'Dirección Entrega';
        $this->txtDireccionEntrega->TextMode = QTextMode::MultiLine;
        $this->txtDireccionEntrega->Required = true;
        $this->txtDireccionEntrega->Width = 300;

		$this->txtCiudad = $this->mctSodexoInput->txtCiudad_Create();
		$this->txtCiudad->Width = 200;

		$this->txtEstado = $this->mctSodexoInput->txtEstado_Create();
		$this->txtEstado->Width = 100;

		$this->txtZonaFiscal = $this->mctSodexoInput->txtZonaFiscal_Create();
		$this->txtZonaFiscal->Width = 100;

		$this->txtTipoCliente = $this->mctSodexoInput->txtTipoCliente_Create();
		$this->txtTipoCliente->Width = 100;

		$this->txtRegistradoPor = $this->mctSodexoInput->txtRegistradoPor_Create();
		$this->txtRegistradoPor->Width = 100;

		$this->calFechaRegistro = $this->mctSodexoInput->calFechaRegistro_Create();
		$this->calFechaRegistro->Width = 100;

		$this->txtHoraRegistro = $this->mctSodexoInput->txtHoraRegistro_Create();

		$this->txtArchivoInput = $this->mctSodexoInput->txtArchivoInput_Create();
		$this->txtArchivoInput->Width = 299;
		
		$this->txtGuiaId = $this->mctSodexoInput->txtGuiaId_Create();
		$this->txtGuiaId->Name = 'Guía Liberty';
		$this->txtGuiaId->Width = 100;

		$this->txtProcesadoPor = $this->mctSodexoInput->txtProcesadoPor_Create();
		$this->txtProcesadoPor->Width = 100;

		$this->calFechaProceso = $this->mctSodexoInput->calFechaProceso_Create();
		$this->calFechaProceso->Width = 100;

		$this->txtHoraProceso = $this->mctSodexoInput->txtHoraProceso_Create();
		$this->txtCodiEsta = $this->mctSodexoInput->txtCodiEsta_Create();
		$this->txtCodiCkpt = $this->mctSodexoInput->txtCodiCkpt_Create();
		$this->calFechCkpt = $this->mctSodexoInput->calFechCkpt_Create();
		$this->txtHoraCkpt = $this->mctSodexoInput->txtHoraCkpt_Create();
		$this->lstCierreCicloObject = $this->mctSodexoInput->lstCierreCicloObject_Create();

		$this->lblCierCicl_Create();
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function lblCierCicl_Create() {
        $this->lblCierCicl = new QLabel($this);
        $this->lblCierCicl->Name = 'Cerró Ciclo ?';
        $this->lblCierCicl->Text = $this->lstCierreCicloObject->SelectedName;
	}

    protected function determinarPosicion() {
        if ($this->mctSodexoInput->SodexoInput && !isset($_SESSION['DataSodexoInput'])) {
            $_SESSION['DataSodexoInput'] = serialize(array($this->mctSodexoInput->SodexoInput));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataSodexoInput']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctSodexoInput->SodexoInput->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('SodexoInput',$this->mctSodexoInput->SodexoInput->Id);
    }

    //-----------------------------------
	// Acciones Relativas a los Objetos
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/sodexo_input_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/sodexo_input_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/sodexo_input_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/sodexo_input_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctSodexoInput->SodexoInput;
		$this->mctSodexoInput->SaveSodexoInput();
		if ($this->mctSodexoInput->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctSodexoInput->SodexoInput;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'SodexoInput';
				$arrLogxCamb['intRefeRegi'] = $this->mctSodexoInput->SodexoInput->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctSodexoInput->SodexoInput->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sodexo_input_edit.php/'.$this->mctSodexoInput->SodexoInput->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'SodexoInput';
			$arrLogxCamb['intRefeRegi'] = $this->mctSodexoInput->SodexoInput->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctSodexoInput->SodexoInput->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sodexo_input_edit.php/'.$this->mctSodexoInput->SodexoInput->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctSodexoInput->TablasRelacionadasSodexoInput();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctSodexoInput->DeleteSodexoInput();
            $arrLogxCamb['strNombTabl'] = 'SodexoInput';
            $arrLogxCamb['intRefeRegi'] = $this->mctSodexoInput->SodexoInput->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctSodexoInput->SodexoInput->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// sodexo_input_edit.tpl.php as the included HTML template file
SodexoInputEditForm::Run('SodexoInputEditForm');
?>