<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
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
    protected $btnCalcConc;
    protected $dtgNotaConc;
    protected $dtgGuiaNota;
    protected $lblObseNota;

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

        $this->lblTituForm->Text = 'Manifiesto';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';;

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the NotaEntregaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctNotaEntrega = NotaEntregaMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on NotaEntrega's data fields
		$this->lblId = $this->mctNotaEntrega->lblId_Create();
		$this->lstClienteCorp = $this->mctNotaEntrega->lstClienteCorp_Create();
		$this->txtReferencia = $this->mctNotaEntrega->txtReferencia_Create();
		$this->txtNombreArchivo = $this->mctNotaEntrega->txtNombreArchivo_Create();
		$this->txtEstatus = $this->mctNotaEntrega->txtEstatus_Create();
		$this->txtServicioImportacion = $this->mctNotaEntrega->txtServicioImportacion_Create();
		$this->txtCargadas = $this->mctNotaEntrega->txtCargadas_Create();
		$this->txtCargadas->Width = 70;
		$this->txtPorProcesar = $this->mctNotaEntrega->txtPorProcesar_Create();
		$this->txtPorProcesar->Width = 70;
		$this->txtPorCorregir = $this->mctNotaEntrega->txtPorCorregir_Create();
		$this->txtPorCorregir->Width = 70;
		$this->txtProcesadas = $this->mctNotaEntrega->txtProcesadas_Create();
		$this->txtProcesadas->Width = 70;
		$this->txtRecibidas = $this->mctNotaEntrega->txtRecibidas_Create();
		$this->txtRecibidas->Width = 70;
		$this->txtLibras = $this->mctNotaEntrega->txtLibras_Create();
		$this->txtLibras->Width = 70;
		$this->txtPiesCub = $this->mctNotaEntrega->txtPiesCub_Create();
		$this->txtPiesCub->Width = 70;
		$this->txtVolumen = $this->mctNotaEntrega->txtVolumen_Create();
		$this->txtVolumen->Width = 100;
		$this->txtPiezas = $this->mctNotaEntrega->txtPiezas_Create();
		$this->txtPiezas->Width = 100;
		$this->calFecha = $this->mctNotaEntrega->calFecha_Create();
		$this->calFecha->Width = 100;
		$this->txtHora = $this->mctNotaEntrega->txtHora_Create();
		$this->txtHora->Width = 100;
		$this->lstUsuario = $this->mctNotaEntrega->lstUsuario_Create();
		$this->txtValorDeclarado = $this->mctNotaEntrega->txtValorDeclarado_Create();
		$this->txtValorDeclarado->Width = 100;
		$this->txtObservacion = $this->mctNotaEntrega->txtObservacion_Create();
		$this->txtObservacion->TextMode = QTextMode::MultiLine;
		$this->txtObservacion->Rows = 1;
		$this->txtObservacion->Width = 700;
		$this->lblCreatedAt = $this->mctNotaEntrega->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctNotaEntrega->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctNotaEntrega->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctNotaEntrega->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctNotaEntrega->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctNotaEntrega->txtDeletedBy_Create();

		$this->lblObseNota_Create();

		$this->btnCalcConc_Create();

		$this->btnNuevRegi->Visible = false;
		$this->btnSave->Visible = false;
		$this->btnDelete->Visible = false;

        $this->lstClienteCorp         = disableControl($this->lstClienteCorp);
        $this->txtReferencia          = disableControl($this->txtReferencia);
        $this->txtNombreArchivo       = disableControl($this->txtNombreArchivo);
        $this->txtEstatus             = disableControl($this->txtEstatus);
        $this->txtServicioImportacion = disableControl($this->txtServicioImportacion);
        $this->txtCargadas            = disableControl($this->txtCargadas);
        $this->txtPorProcesar         = disableControl($this->txtPorProcesar);
        $this->txtPorCorregir         = disableControl($this->txtPorCorregir);
        $this->txtProcesadas          = disableControl($this->txtProcesadas);
        $this->txtRecibidas           = disableControl($this->txtRecibidas);
        $this->txtLibras              = disableControl($this->txtLibras);
        $this->txtPiesCub             = disableControl($this->txtPiesCub);
        $this->txtVolumen             = disableControl($this->txtVolumen);
        $this->txtPiezas              = disableControl($this->txtPiezas);
        $this->calFecha               = disableControl($this->calFecha);
        $this->txtHora                = disableControl($this->txtHora);
        $this->lstUsuario             = disableControl($this->lstUsuario);
        $this->txtValorDeclarado      = disableControl($this->txtValorDeclarado);
        $this->txtObservacion         = disableControl($this->txtObservacion);

        if ($this->mctNotaEntrega->EditMode) {
            if ($this->mctNotaEntrega->NotaEntrega->CountNotaConceptoses() > 0) {
                $this->dtgNotaConc_Create();
            }
            if ($this->mctNotaEntrega->NotaEntrega->CountGuiases() > 0) {
                $this->dtgGuiaNota_Create();
            }
        }

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblObseNota_Create() {
	    $this->lblObseNota = new QLabel($this);
	    $this->lblObseNota->Name = 'Observacion';
	    $this->lblObseNota->Text = $this->mctNotaEntrega->NotaEntrega->Observacion;
	    $this->lblObseNota->Width = 1095;
	    $this->lblObseNota->ForeColor = 'blue';
    }

    protected function dtgGuiaNota_Create() {
        $this->dtgGuiaNota = new QDataGrid($this);
        $this->dtgGuiaNota->FontSize = 12;
        $this->dtgGuiaNota->ShowFilter = false;

        $this->dtgGuiaNota->CssClass = 'datagrid';
        $this->dtgGuiaNota->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaNota->UseAjax = true;

        $this->dtgGuiaNota->SetDataBinder('dtgGuiaNota_Bind');

        $this->dtgGuiaNotaColumns();
    }

    protected function dtgGuiaNota_Bind() {
        $this->dtgGuiaNota->DataSource = $this->mctNotaEntrega->NotaEntrega->GetGuiasArray();
    }

    protected function dtgGuiaNotaColumns() {
        $colTracGuia = new QDataGridColumn($this);
        $colTracGuia->Name = QApplication::Translate('Tracking');
        $colTracGuia->Html = '<?= $_ITEM->Tracking ?>';
        $colTracGuia->Width = 110;
        $this->dtgGuiaNota->AddColumn($colTracGuia);

        $colOrigGuia = new QDataGridColumn($this);
        $colOrigGuia->Name = QApplication::Translate('Orig');
        $colOrigGuia->Html = '<?= $_ITEM->Origen->Iata ?>';
        $colOrigGuia->Width = 80;
        $this->dtgGuiaNota->AddColumn($colOrigGuia);

        $colDestGuia = new QDataGridColumn($this);
        $colDestGuia->Name = QApplication::Translate('Dest');
        $colDestGuia->Html = '<?= $_ITEM->Destino->Iata ?>';
        $colDestGuia->Width = 80;
        $this->dtgGuiaNota->AddColumn($colDestGuia);

        $colPiezGuia = new QDataGridColumn($this);
        $colPiezGuia->Name = QApplication::Translate('Piezas');
        $colPiezGuia->Html = '<?= $_ITEM->Piezas ?>';
        $colPiezGuia->Width = 60;
        $this->dtgGuiaNota->AddColumn($colPiezGuia);

        if ($this->mctNotaEntrega->NotaEntrega->ServicioImportacion == 'AER') {
            $colLibrGuia = new QDataGridColumn($this);
            $colLibrGuia->Name = QApplication::Translate('Libras');
            $colLibrGuia->Html = '<?= $_ITEM->Libras ?>';
            $colLibrGuia->Width = 80;
            $this->dtgGuiaNota->AddColumn($colLibrGuia);
        } else {
            $colPiesGuia = new QDataGridColumn($this);
            $colPiesGuia->Name = QApplication::Translate('PiesCub');
            $colPiesGuia->Html = '<?= $_ITEM->PiesCub ?>';
            $colPiesGuia->Width = 80;
            $this->dtgGuiaNota->AddColumn($colPiesGuia);
        }

        $colVoluGuia = new QDataGridColumn($this);
        $colVoluGuia->Name = QApplication::Translate('Volumen');
        $colVoluGuia->Html = '<?= $_ITEM->Volumen ?>';
        $colVoluGuia->Wrap = true;
        $this->dtgGuiaNota->AddColumn($colVoluGuia);

    }


    protected function dtgNotaConc_Create() {
        $this->dtgNotaConc = new QDataGrid($this);
        $this->dtgNotaConc->FontSize = 12;
        $this->dtgNotaConc->ShowFilter = false;

        $this->dtgNotaConc->CssClass = 'datagrid';
        $this->dtgNotaConc->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgNotaConc->UseAjax = true;

        $this->dtgNotaConc->SetDataBinder('dtgNotaConc_Bind');

        $this->dtgNotaConcColumns();
    }

    protected function dtgNotaConc_Bind() {
        $this->dtgNotaConc->DataSource = $this->mctNotaEntrega->NotaEntrega->GetNotaConceptosArray();
    }

    protected function dtgNotaConcColumns() {
        $colConcNota = new QDataGridColumn($this);
        $colConcNota->Name = QApplication::Translate('Concepto');
        $colConcNota->Html = '<?= $_ITEM->Concepto->Nombre ?>';
        $colConcNota->Width = 150;
        $this->dtgNotaConc->AddColumn($colConcNota);

        $colMostComo = new QDataGridColumn($this);
        $colMostComo->Name = QApplication::Translate('Concepto');
        $colMostComo->Html = '<?= $_ITEM->MostrarComo ?>';
        $colMostComo->Width = 150;
        $this->dtgNotaConc->AddColumn($colMostComo);

        $colTipoConc = new QDataGridColumn($this);
        $colTipoConc->Name = QApplication::Translate('Tipo');
        $colTipoConc->Html = '<?= $_ITEM->Tipo ?>';
        $this->dtgNotaConc->AddColumn($colTipoConc);

        $colValoConc = new QDataGridColumn($this);
        $colValoConc->Name = QApplication::Translate('Valor');
        $colValoConc->Html = '<?= $_ITEM->Valor ?>';
        $colValoConc->Width = 60;
        $this->dtgNotaConc->AddColumn($colValoConc);

        $colMontConc = new QDataGridColumn($this);
        $colMontConc->Name = QApplication::Translate('Monto');
        $colMontConc->Html = '<?= $_ITEM->Monto ?>';
        $colMontConc->Width = 80;
        $this->dtgNotaConc->AddColumn($colMontConc);

        //$colExplConc = new QDataGridColumn($this);
        //$colExplConc->Name = QApplication::Translate('Cómo se calculó ?');
        /*$colExplConc->Html = '<?= $_ITEM->Explicacion ?>';*/
        //$colExplConc->Wrap = true;
        //$this->dtgNotaConc->AddColumn($colExplConc);

    }

    //public function dtgNotaConc_IdxxPiez_Render(GuiaPiezas $objGuiaPiez) {
    //    $strIdxxPiez = explode('-',$objGuiaPiez->IdPieza)[1];
    //    return utf8_encode($strIdxxPiez);
    //}

    protected function btnCalcConc_Create() {
        $this->btnCalcConc = new QButtonP($this);
        $this->btnCalcConc->Text = '<i class="fa fa-cogs fa-lg"></i> Calc. Conceptos';
        $this->btnCalcConc->AddAction(new QClickEvent(), new QServerAction('btnCalcConc_Click'));
        $this->btnCalcConc->HtmlEntities = false;
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

    protected function btnCalcConc_Click() {
        $arrConcActi = Conceptos::conceptosActivos('NAC');
        $this->mctNotaEntrega->NotaEntrega->calcularTodoLosConceptos($arrConcActi);
        QApplication::Redirect(__SIST__.'/nota_entrega_edit.php/'.$this->mctNotaEntrega->NotaEntrega->Id);
    }

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



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctNotaEntrega->NotaEntrega;
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
				$arrLogxCamb['strNombRegi'] = $this->mctNotaEntrega->NotaEntrega->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/nota_entrega_edit.php/'.$this->mctNotaEntrega->NotaEntrega->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'NotaEntrega';
			$arrLogxCamb['intRefeRegi'] = $this->mctNotaEntrega->NotaEntrega->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctNotaEntrega->NotaEntrega->Nombre;
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
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctNotaEntrega->DeleteNotaEntrega();
            $arrLogxCamb['strNombTabl'] = 'NotaEntrega';
            $arrLogxCamb['intRefeRegi'] = $this->mctNotaEntrega->NotaEntrega->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctNotaEntrega->NotaEntrega->Nombre;
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