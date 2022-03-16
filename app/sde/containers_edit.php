<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ContainersEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Containers class.  It uses the code-generated
 * ContainersMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Containers columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both containers_edit.php AND
 * containers_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ContainersEditForm extends ContainersEditFormBase {
    protected $dtgPiezCont;
    protected $dtgCkptCont;
    protected $btnTranMobi;
    protected $lblResuEntr;

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

		$this->lblTituForm->Text = 'Master';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ContainersMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctContainers = ContainersMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Containers's data fields
		$this->lblId = $this->mctContainers->lblId_Create();
		$this->txtNumero = $this->mctContainers->txtNumero_Create();
		$this->lstOperacion = $this->mctContainers->lstOperacion_Create();
		$this->lstOperacion->Width = 350;
		$this->calFecha = $this->mctContainers->calFecha_Create();
		$this->calFecha->Enabled = false;
		$this->calFecha->ForeColor = 'blue';
		$this->txtHora = $this->mctContainers->txtHora_Create();
		$this->txtHora->Width = 50;
		$this->txtHora->Enabled = false;
		$this->txtHora->ForeColor = 'blue';
		$this->txtEstatus = $this->mctContainers->txtEstatus_Create();
		$this->txtEstatus->Enabled = false;
		$this->txtEstatus->ForeColor = 'blue';
        $this->lstChofer = $this->mctContainers->lstChofer_Create();
        $this->txtVehiculo = $this->mctContainers->txtVehiculo_Create();
        $this->txtPlaca = $this->mctContainers->txtPlaca_Create();
        $this->calFecha = $this->mctContainers->calFecha_Create();
        $this->txtHora = $this->mctContainers->txtHora_Create();
        $this->txtEstatus = $this->mctContainers->txtEstatus_Create();
        $this->txtTipo = $this->mctContainers->txtTipo_Create();
        $this->lstTransportista = $this->mctContainers->lstTransportista_Create();
        $this->lstClienteCorp = $this->mctContainers->lstClienteCorp_Create();
        $this->txtAwb = $this->mctContainers->txtAwb_Create();
        $this->txtPrecintoLateral = $this->mctContainers->txtPrecintoLateral_Create();
        $this->txtPiezas = $this->mctContainers->txtPiezas_Create();
        $this->txtCantidadOk = $this->mctContainers->txtCantidadOk_Create();
        $this->txtDevueltas = $this->mctContainers->txtDevueltas_Create();
        $this->txtSinGestionar = $this->mctContainers->txtSinGestionar_Create();
        $this->txtPendientes = $this->mctContainers->txtPendientes_Create();
        $this->txtPeso = $this->mctContainers->txtPeso_Create();
        $this->txtKilos = $this->mctContainers->txtKilos_Create();
        $this->txtPiesCub = $this->mctContainers->txtPiesCub_Create();

        $this->txtNumero          = disableControl($this->txtNumero);
        $this->calFecha           = disableControl($this->calFecha);
        $this->lstOperacion       = disableControl($this->lstOperacion);
        $this->lstChofer          = disableControl($this->lstChofer);
        $this->txtEstatus         = disableControl($this->txtEstatus);
        $this->txtVehiculo        = disableControl($this->txtVehiculo);
        $this->txtPlaca           = disableControl($this->txtPlaca);
        $this->txtPrecintoLateral = disableControl($this->txtPrecintoLateral);
        $this->txtPiezas          = disableControl($this->txtPiezas);
        $this->txtCantidadOk      = disableControl($this->txtCantidadOk);
        $this->txtDevueltas       = disableControl($this->txtDevueltas);
        $this->txtSinGestionar    = disableControl($this->txtSinGestionar);
        $this->txtPendientes      = disableControl($this->txtPendientes);

        $this->lblResuEntr_Create();
        $this->dtgPiezCont_Create();
        $this->btnTranMobi_Create();

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblResuEntr_Create() {
        $this->lblResuEntr = new QLabel($this);
        $strResuEntr = 'Piezas Manifestadas';
        $strResuEntr .= $this->mctContainers->Containers->__resumenEntrega();
        $this->lblResuEntr->Text = $strResuEntr;
        $this->lblResuEntr->HtmlEntities = false;
    }

    protected function btnTranMobi_Create() {
        $this->btnTranMobi = new QButtonP($this);
        $this->btnTranMobi->Text = TextoIcono('cogs','Tranf-Mobile');
        $this->btnTranMobi->AddAction(new QClickEvent(), new QServerAction('btnTranMobi_Click'));
    }

    protected function btnTranMobi_Click() {
        list($intCantPiez, $intCantErro, $strTextMens) = $this->mctContainers->Containers->TransferirToMobile();
        if (strlen($strTextMens) == 0) {
            $strTextMens = "Piezas Sincronizadas: $intCantPiez | Errores: $intCantErro";
        }
        if ($intCantErro == 0) {
            $this->success($strTextMens);
        } else {
            $this->danger($strTextMens);
        }
    }


    protected function dtgPiezCont_Create() {
        $this->dtgPiezCont = new QDataGrid($this);
        $this->dtgPiezCont->FontSize = 12;
        $this->dtgPiezCont->ShowFilter = false;

        $this->dtgPiezCont->CssClass = 'datagrid';
        $this->dtgPiezCont->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezCont->UseAjax = true;

        $this->dtgPiezCont->SetDataBinder('dtgPiezCont_Bind');

        $this->createDtgPiezContColumns();
    }

    protected function dtgPiezCont_Bind() {
        $this->dtgPiezCont->DataSource = $this->mctContainers->Containers->GetGuiaPiezasAsContainerPiezaArray();
    }

    protected function createDtgPiezContColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('IdPieza');
        $colIdxxPiez->Html = '<?= $_ITEM->IdPieza ?>';
        $colIdxxPiez->Width = 100;
        $this->dtgPiezCont->AddColumn($colIdxxPiez);

        $colManiGuia = new QDataGridColumn($this);
        $colManiGuia->Name = QApplication::Translate('Manif.');
        $colManiGuia->Html = '<?= $_ITEM->Guia->NotaEntrega->Referencia ?>';
        $colManiGuia->Width = 95;
        $this->dtgPiezCont->AddColumn($colManiGuia);

        $colServImpo = new QDataGridColumn($this);
        $colServImpo->Name = QApplication::Translate('S.Impor.');
        $colServImpo->Html = '<?= $_ITEM->Guia->ServicioImportacion ?>';
        $colServImpo->Width = 30;
        $this->dtgPiezCont->AddColumn($colServImpo);

        $colKiloPiez = new QDataGridColumn($this);
        $colKiloPiez->Name = QApplication::Translate('Kg');
        $colKiloPiez->Html = '<?= $_ITEM->Kilos; ?>';
        $colKiloPiez->Width = 60;
        $this->dtgPiezCont->AddColumn($colKiloPiez);

        $colVoluPiez = new QDataGridColumn($this);
        $colVoluPiez->Name = QApplication::Translate('PiesCub');
        $colVoluPiez->Html = '<?= $_ITEM->PiesCub ?>';
        $colVoluPiez->Width = 30;
        $this->dtgPiezCont->AddColumn($colVoluPiez);

        /*
        $colUltiCkpt = new QDataGridColumn($this);
        $colUltiCkpt->Name = QApplication::Translate('U.Ckpt');
        $colUltiCkpt->Html = '<?= $_ITEM->ultimoCheckpoint() ?>';
        $colUltiCkpt->Width = 30;
        $this->dtgPiezCont->AddColumn($colUltiCkpt);
        */
    }

    public function dtgPiezCont_IdxxPiez_Render(GuiaPiezas $objGuiaPiez) {
        $strIdxxPiez = $objGuiaPiez->IdPieza;
        return utf8_encode($strIdxxPiez);
    }

    protected function determinarPosicion() {
        if ($this->mctContainers->Containers && !isset($_SESSION['DataContainers'])) {
            $_SESSION['DataContainers'] = serialize(array($this->mctContainers->Containers));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataContainers']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctContainers->Containers->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Containers',$this->mctContainers->Containers->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/containers_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/containers_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/containers_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/containers_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctContainers->Containers;
		$this->mctContainers->SaveContainers();
		if ($this->mctContainers->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctContainers->Containers;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Containers';
				$arrLogxCamb['intRefeRegi'] = $this->mctContainers->Containers->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctContainers->Containers->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/containers_edit.php/'.$this->mctContainers->Containers->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Containers';
			$arrLogxCamb['intRefeRegi'] = $this->mctContainers->Containers->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctContainers->Containers->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/containers_edit.php/'.$this->mctContainers->Containers->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctContainers->TablasRelacionadasContainers();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            //$this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctContainers->DeleteContainers();
            $arrLogxCamb['strNombTabl'] = 'Containers';
            $arrLogxCamb['intRefeRegi'] = $this->mctContainers->Containers->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctContainers->Containers->Numero;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// containers_edit.tpl.php as the included HTML template file
ContainersEditForm::Run('ContainersEditForm');
?>