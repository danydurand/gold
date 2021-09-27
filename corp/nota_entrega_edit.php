<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NotaEntregaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the NotaEntrega class.  It uses the code-generated
 * NotaEntregaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a NotaEntrega columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both nota_entrega_edit.php AND
 * nota_entrega_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class NotaEntregaEditForm extends NotaEntregaEditFormBase {
    protected $lstServImpo;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the NotaEntregaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctNotaEntrega = NotaEntregaMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on NotaEntrega's data fields
		$this->lblId = $this->mctNotaEntrega->lblId_Create();
		$this->lstClienteCorp = $this->mctNotaEntrega->lstClienteCorp_Create();
		$this->txtReferencia  = $this->mctNotaEntrega->txtReferencia_Create();
        $this->txtReferencia->ToolTip = 'Nro de Nota de Entrega, Manifiesto o Contenedor';
		$this->txtEstatus = $this->mctNotaEntrega->txtEstatus_Create();
		$this->txtEstatus = disableControl($this->txtEstatus);
		$this->txtServicioImportacion = $this->mctNotaEntrega->txtServicioImportacion_Create();
		$this->lstServImpo = $this->lstServImpo_Create();
		$this->txtCargadas = $this->mctNotaEntrega->txtCargadas_Create();
		$this->txtCargadas = disableControl($this->txtCargadas);
		$this->txtPorProcesar = $this->mctNotaEntrega->txtPorProcesar_Create();
		$this->txtPorProcesar = disableControl($this->txtPorProcesar);
		$this->txtPorCorregir = $this->mctNotaEntrega->txtPorCorregir_Create();
		$this->txtPorCorregir = disableControl($this->txtPorCorregir);
		$this->txtProcesadas = $this->mctNotaEntrega->txtProcesadas_Create();
		$this->txtProcesadas = disableControl($this->txtProcesadas);
		$this->txtLibras = $this->mctNotaEntrega->txtLibras_Create();
		$this->txtLibras = disableControl($this->txtLibras);
		$this->txtPiesCub = $this->mctNotaEntrega->txtPiesCub_Create();
		$this->txtPiesCub = disableControl($this->txtPiesCub);
		$this->txtVolumen = $this->mctNotaEntrega->txtVolumen_Create();
		$this->txtVolumen = disableControl($this->txtVolumen);
		$this->txtPiezas = $this->mctNotaEntrega->txtPiezas_Create();
		$this->txtPiezas = disableControl($this->txtPiezas);
		$this->calFecha = $this->mctNotaEntrega->calFecha_Create();
		$this->calFecha = disableControl($this->calFecha);
		$this->txtHora = $this->mctNotaEntrega->txtHora_Create();
		$this->txtHora = disableControl($this->txtHora);
		$this->lstUsuario = $this->mctNotaEntrega->lstUsuario_Create();
		$this->lstUsuario = disableControl($this->lstUsuario);
		$this->txtValorDeclarado = $this->mctNotaEntrega->txtValorDeclarado_Create();
		$this->txtValorDeclarado = disableControl($this->txtValorDeclarado);
		$this->txtObservacion = $this->mctNotaEntrega->txtObservacion_Create();
		$this->txtObservacion->Width = 500;
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtObservacion->Rows = 3;

		$this->calCreatedAt = $this->mctNotaEntrega->calCreatedAt_Create();
		$this->calUpdatedAt = $this->mctNotaEntrega->calUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctNotaEntrega->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctNotaEntrega->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctNotaEntrega->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctNotaEntrega->txtDeletedBy_Create();

		if ($this->mctNotaEntrega->EditMode) {
		    if ($this->txtEstatus->Text != 'CREAD@') {
		        $this->btnDelete->Visible = false;
            }
        }

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lstServImpo_Create() {
	    $this->lstServImpo = new QListBox($this);
	    $this->lstServImpo->Name = 'Servicio de Importacion';
	    $this->lstServImpo->Required = true;
	    $this->lstServImpo->AddItem('AEREO','AER',$this->txtServicioImportacion->Text == 'AER');
	    $this->lstServImpo->AddItem('MARITIMO','MAR',$this->txtServicioImportacion->Text == 'MAR');
	    $this->lstServImpo->AddAction(new QChangeEvent(), new QAjaxAction('lstServImpo_Change'));
	    return $this->lstServImpo;
    }

    protected function determinarPosicion() {
        if ($this->mctNotaEntrega->NotaEntrega && !isset($_SESSION['DataNotaEntrega'])) {
            $_SESSION['DataNotaEntrega'] = serialize(array($this->mctNotaEntrega->NotaEntrega));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataNotaEntrega']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctNotaEntrega->NotaEntrega->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('NotaEntrega',$this->mctNotaEntrega->NotaEntrega->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/nota_entrega_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/nota_entrega_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/nota_entrega_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/nota_entrega_edit.php/'.$objRegiTabl->Id);
    }


    protected function lstServImpo_Change() {
	    if ($this->lstServImpo->SelectedValue == 'AER') {
	        if ($this->txtPiesCub->Text != 0) {
	            $this->txtLibras->Text  = $this->txtPiesCub->Text;
	            $this->txtPiesCub->Text = 0;
            }
        }
        if ($this->lstServImpo->SelectedValue == 'MAR') {
            if ($this->txtLibras->Text != 0) {
                $this->txtPiesCub->Text = $this->txtLibras->Text;
                $this->txtLibras->Text  = 0;
            }
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctNotaEntrega->NotaEntrega;
		$this->txtServicioImportacion->Text = $this->lstServImpo->SelectedValue;
		$this->mctNotaEntrega->SaveNotaEntrega();
		if ($this->mctNotaEntrega->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctNotaEntrega->NotaEntrega;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'NotaEntrega';
				$arrLogxCamb['intRefeRegi'] = $this->mctNotaEntrega->NotaEntrega->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctNotaEntrega->NotaEntrega->Referencia;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/nota_entrega_edit.php/'.$this->mctNotaEntrega->NotaEntrega->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'NotaEntrega';
			$arrLogxCamb['intRefeRegi'] = $this->mctNotaEntrega->NotaEntrega->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctNotaEntrega->NotaEntrega->Referencia;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/nota_entrega_edit.php/'.$this->mctNotaEntrega->NotaEntrega->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctNotaEntrega->TablasRelacionadasNotaEntrega();
        if ($this->mctNotaEntrega->NotaEntrega->Estatus == 'RECIBID@') {
            $this->mensaje('La NDE ya fue RECIBID@. No se puede borrar');
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctNotaEntrega->DeleteNotaEntrega();
            $arrLogxCamb['strNombTabl'] = 'NotaEntrega';
            $arrLogxCamb['intRefeRegi'] = $this->mctNotaEntrega->NotaEntrega->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctNotaEntrega->NotaEntrega->Referencia;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// nota_entrega_edit.tpl.php as the included HTML template file
NotaEntregaEditForm::Run('NotaEntregaEditForm');
?>