<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__ . '/protected.inc.php');
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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ContainersMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctContainers = ContainersMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Containers's data fields
		$this->lblId = $this->mctContainers->lblId_Create();
		$this->txtNumero = $this->mctContainers->txtNumero_Create();
		$this->lstOperacion = $this->mctContainers->lstOperacion_Create();
		$this->lstOperacion->Width = 550;
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
		//$this->lblCreatedAt = $this->mctContainers->lblCreatedAt_Create();
		//$this->lblUpdatedAt = $this->mctContainers->lblUpdatedAt_Create();
		//$this->lblDeletedAt = $this->mctContainers->lblDeletedAt_Create();
		//$this->txtCreatedBy = $this->mctContainers->txtCreatedBy_Create();
		//$this->txtUpdatedBy = $this->mctContainers->txtUpdatedBy_Create();
		//$this->txtDeletedBy = $this->mctContainers->txtDeletedBy_Create();
        //$this->dtgParentContainersesAsContainerContainer = $this->mctContainers->dtgParentContainersesAsContainerContainer_Create();
        //$this->dtgContainersesAsContainerContainer = $this->mctContainers->dtgContainersesAsContainerContainer_Create();
        //$this->dtgGuiaPiezasesAsContainerPieza = $this->mctContainers->dtgGuiaPiezasesAsContainerPieza_Create();

        $this->dtgPiezCont_Create();
        $this->dtgCkptCont_Create();

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function dtgCkptCont_Create() {
        $this->dtgCkptCont = new QDataGrid($this);
        $this->dtgCkptCont->FontSize = 12;
        $this->dtgCkptCont->ShowFilter = false;

        $this->dtgCkptCont->CssClass = 'datagrid';
        $this->dtgCkptCont->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgCkptCont->UseAjax = true;

        $this->dtgCkptCont->SetDataBinder('dtgCkptCont_Bind');

        $this->createDtgCkptContColumns();
    }

    protected function dtgCkptCont_Bind() {
        $this->dtgCkptCont->DataSource = $this->mctContainers->Containers->GetContainerCkptAsContainerArray();
    }

    protected function createDtgCkptContColumns() {
        $colSucuCkpt = new QDataGridColumn($this);
        $colSucuCkpt->Name = QApplication::Translate('Suc');
        $colSucuCkpt->Html = '<?= $_ITEM->Sucursal->Iata ?>';
        $this->dtgCkptCont->AddColumn($colSucuCkpt);

        $colObseCkpt = new QDataGridColumn($this);
        $colObseCkpt->Name = QApplication::Translate('Comentario');
        $colObseCkpt->Html = '<?= $_ITEM->Observacion; ?>';
        $colObseCkpt->Width = 300;
        $this->dtgCkptCont->AddColumn($colObseCkpt);

        $colFechHora = new QDataGridColumn($this);
        $colFechHora->Name = QApplication::Translate('Fecha/Hora');
        $colFechHora->Html = '<?= $_FORM->dtgCkptCont_FechHora_Render($_ITEM); ?>';
        $this->dtgCkptCont->AddColumn($colFechHora);

        $colUsuaCkpt = new QDataGridColumn($this);
        $colUsuaCkpt->Name = QApplication::Translate('Usuario');
        $colUsuaCkpt->Html = '<?= $_ITEM->Usuario->LogiUsua; ?>';
        $this->dtgCkptCont->AddColumn($colUsuaCkpt);
    }

    public function dtgCkptCont_FechHora_Render(ContainerCkpt $objContCkpt) {
        $strFechHora = $objContCkpt->Fecha->__toString("DD/MM/YYYY").' '.$objContCkpt->Hora;
        return $strFechHora;
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
        $colIdxxPiez->Name = QApplication::Translate('Pieza');
        $colIdxxPiez->Html = '<?= $_ITEM->IdPieza ?>';
        $colIdxxPiez->Width = 100;
        $this->dtgPiezCont->AddColumn($colIdxxPiez);

        $colKiloPiez = new QDataGridColumn($this);
        $colKiloPiez->Name = QApplication::Translate('Kg');
        $colKiloPiez->Html = '<?= $_ITEM->Kilos; ?>';
        $colKiloPiez->Width = 60;
        $this->dtgPiezCont->AddColumn($colKiloPiez);

        $colUbicFisi = new QDataGridColumn($this);
        $colUbicFisi->Name = QApplication::Translate('Ubicacion');
        $colUbicFisi->Html = '<?= $_ITEM->Ubicacion; ?>';
        $colUbicFisi->Width = 100;
        $this->dtgPiezCont->AddColumn($colUbicFisi);

        $colDescPiez = new QDataGridColumn($this);
        $colDescPiez->Name = QApplication::Translate('Comentario');
        $colDescPiez->Html = '<?= $_ITEM->Descripcion; ?>';
        $colDescPiez->Width = 350;
        $this->dtgPiezCont->AddColumn($colDescPiez);
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
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctContainers->DeleteContainers();
            $arrLogxCamb['strNombTabl'] = 'Containers';
            $arrLogxCamb['intRefeRegi'] = $this->mctContainers->Containers->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctContainers->Containers->Nombre;
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