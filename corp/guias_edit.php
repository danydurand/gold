<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiasEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Guias class.  It uses the code-generated
 * GuiasMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Guias columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guias_edit.php AND
 * guias_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiasEditForm extends GuiasEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the GuiasMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctGuias = GuiasMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Guias's data fields
		$this->lblId = $this->mctGuias->lblId_Create();
		$this->txtNumero = $this->mctGuias->txtNumero_Create();
		$this->txtNumero->Name = 'Guia Gold';
		$this->txtTracking = $this->mctGuias->txtTracking_Create();
		$this->txtTracking->Name = 'Nro de Guia';
		$this->calFecha = $this->mctGuias->calFecha_Create();
		$this->lstClienteRetail = $this->mctGuias->lstClienteRetail_Create();
		$this->lstClienteCorp = $this->mctGuias->lstClienteCorp_Create();
		$this->lstClienteInt = $this->mctGuias->lstClienteInt_Create();
		$this->lstDestino = $this->mctGuias->lstDestino_Create();
		$this->txtServicioEntrega = $this->mctGuias->txtServicioEntrega_Create();
		$this->txtServicioImportacion = $this->mctGuias->txtServicioImportacion_Create();
		$this->txtNombreRemitente = $this->mctGuias->txtNombreRemitente_Create();
		$this->txtDireccionRemitente = $this->mctGuias->txtDireccionRemitente_Create();
		$this->txtTelefonoRemitente = $this->mctGuias->txtTelefonoRemitente_Create();
		$this->txtNombreDestinatario = $this->mctGuias->txtNombreDestinatario_Create();
		$this->txtNombreDestinatario->Width = 280;
		$this->txtDireccionDestinatario = $this->mctGuias->txtDireccionDestinatario_Create();
		$this->txtDireccionDestinatario->TextMode = QTextMode::MultiLine;
		$this->txtDireccionDestinatario->Rows = 3;
		$this->txtDireccionDestinatario->Width = 280;
		$this->txtTelefonoDestinatario = $this->mctGuias->txtTelefonoDestinatario_Create();
		$this->txtContenido = $this->mctGuias->txtContenido_Create();
		$this->txtContenido->Width = 280;
		$this->txtCedulaDestinatario = $this->mctGuias->txtCedulaDestinatario_Create();
		$this->txtCedulaDestinatario->Name = 'Cedula Destinatario';

        $this->btnNuevRegi->Visible = false;
        $this->btnDelete->Visible = false;

        $this->txtTracking            = disableControl($this->txtTracking);
        $this->calFecha               = disableControl($this->calFecha);
        $this->txtServicioEntrega     = disableControl($this->txtServicioEntrega);
        $this->txtServicioImportacion = disableControl($this->txtServicioImportacion);

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function btnVolvList_Click() {
        QApplication::Redirect(__SIST__."/consulta_guia.php/".$this->mctGuias->Guias->Id);
    }

    //protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
	 //   t('Hice cancel...');
    //}

    //protected function RedirectToListPage() {
    //    QApplication::Redirect(__SIST__."/consulta_guia.php/".$this->mctGuias->Guias->Id);
    //}

    protected function determinarPosicion() {
        if ($this->mctGuias->Guias && !isset($_SESSION['DataGuias'])) {
            $_SESSION['DataGuias'] = serialize(array($this->mctGuias->Guias));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataGuias']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctGuias->Guias->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Guias',$this->mctGuias->Guias->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/guias_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/guias_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/guias_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/guias_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctGuias->Guias;
		$this->mctGuias->SaveGuias();
		if ($this->mctGuias->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctGuias->Guias;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Guias';
				$arrLogxCamb['intRefeRegi'] = $this->mctGuias->Guias->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctGuias->Guias->Numero;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/guias_edit.php/'.$this->mctGuias->Guias->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Guias';
			$arrLogxCamb['intRefeRegi'] = $this->mctGuias->Guias->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctGuias->Guias->Numero;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/guias_edit.php/'.$this->mctGuias->Guias->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctGuias->TablasRelacionadasGuias();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctGuias->DeleteGuias();
            $arrLogxCamb['strNombTabl'] = 'Guias';
            $arrLogxCamb['intRefeRegi'] = $this->mctGuias->Guias->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctGuias->Guias->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// guias_edit.tpl.php as the included HTML template file
GuiasEditForm::Run('GuiasEditForm');
?>