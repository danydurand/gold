<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ContainerMobileEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the ContainerMobile class.  It uses the code-generated
 * ContainerMobileMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a ContainerMobile columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both container_mobile_edit.php AND
 * container_mobile_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ContainerMobileEditForm extends ContainerMobileEditFormBase {
    protected $txtPorxSync;
    protected $dtgPiezMobi;
    protected $btnSyncCont;
    protected $btnActiMobi;


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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ContainerMobileMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctContainerMobile = ContainerMobileMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on ContainerMobile's data fields
		$this->lblId = $this->mctContainerMobile->lblId_Create();
		$this->lstChofer = $this->mctContainerMobile->lstChofer_Create();
		$this->lstContainer = $this->mctContainerMobile->lstContainer_Create();
		$this->chkAbierto = $this->mctContainerMobile->chkAbierto_Create();
		$this->txtCantPiezas = $this->mctContainerMobile->txtCantPiezas_Create();
		$this->txtCantPiezas->Width = 50;
		$this->txtCantPiezas->Name = 'Pzas';
		$this->txtPendientes = $this->mctContainerMobile->txtPendientes_Create();
		$this->txtPendientes->Width = 50;
		$this->txtPendientes->Name = 'Pend';
		$this->txtEntregadas = $this->mctContainerMobile->txtEntregadas_Create();
		$this->txtEntregadas->Width = 50;
		$this->txtEntregadas->Name = 'OKs';
		$this->txtDevueltas = $this->mctContainerMobile->txtDevueltas_Create();
		$this->txtDevueltas->Width = 50;
		$this->txtDevueltas->Name = 'DVs';
		$this->txtSinGestionar = $this->mctContainerMobile->txtSinGestionar_Create();
		$this->txtSinGestionar->Width = 50;
		$this->txtSinGestionar->Name = 'S.Ges';
		$this->calCreatedAt = $this->mctContainerMobile->calCreatedAt_Create();
		$this->calCreatedAt->Name = 'F.Creacion';
		$this->calCreatedAt->Width = 90;
		$this->calUpdatedAt = $this->mctContainerMobile->calUpdatedAt_Create();
		$this->calUpdatedAt->Name = 'F.Actualiz';
		$this->calUpdatedAt->Width = 90;
		$this->lstCreatedByObject = $this->mctContainerMobile->lstCreatedByObject_Create();
		$this->lstCreatedByObject->Name = 'Creado Por';
		$this->lstUpdatedByObject = $this->mctContainerMobile->lstUpdatedByObject_Create();
		$this->lstUpdatedByObject->Name = 'Actuliz Por';
		$this->txtPorxSync_Create();
		$this->btnSyncCont_Create();
		$this->dtgPiezMobi_Create();
        $this->btnActiMobi_Create();


        $this->lstChofer          = disableControl($this->lstChofer);
		$this->lstContainer       = disableControl($this->lstContainer);
		$this->chkAbierto         = disableControl($this->chkAbierto);
		$this->txtCantPiezas      = disableControl($this->txtCantPiezas);
		$this->txtPendientes      = disableControl($this->txtPendientes);
		$this->txtEntregadas      = disableControl($this->txtEntregadas);
		$this->txtDevueltas       = disableControl($this->txtDevueltas);
		$this->txtSinGestionar    = disableControl($this->txtSinGestionar);
		$this->txtPorxSync        = disableControl($this->txtPorxSync);
		$this->calCreatedAt       = disableControl($this->calCreatedAt);
		$this->calUpdatedAt       = disableControl($this->calUpdatedAt);
		$this->lstCreatedByObject = disableControl($this->lstCreatedByObject);
		$this->lstUpdatedByObject = disableControl($this->lstUpdatedByObject);

        $this->txtSinGestionar->ForeColor = 'red';
        $this->txtSinGestionar->FontBold = true;

        $this->btnNuevRegi->Visible = false;
		$this->btnNuevSmal->Visible = false;
		$this->btnSave->Visible     = false;
		$this->btnGuarSmal->Visible = false;
		if ($this->objUsuario != 'ddurand') {
            $this->btnDelete->Visible   = false;
        }
		$this->btnBorrSmal->Visible = false;

		if ($this->txtPorxSync->Text == 0) {
		    $this->btnSyncCont->Visible = false;
        }

		$this->MensajeDeActividadMobile();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    public function MensajeDeActividadMobile() {
        $strActiMobi = $this->mctContainerMobile->ContainerMobile->Chofer->activoMobileHoy();
        if ($strActiMobi == 'NO') {
            $this->warning('Este Chofer NO tiene Actividad Mobile el día de Hoy');
        } else {
            $this->mensaje();
        }
    }


    public function btnActiMobi_Create() {
        $this->btnActiMobi = new QButtonP($this);
        $this->btnActiMobi->Text = TextoIcono('eye','Acti-Mobile-Chofer');
        $this->btnActiMobi->HtmlEntities = false;
        $this->btnActiMobi->AddAction(new QClickEvent(), new QServerAction('btnActiMobi_Click'));
    }

    public function btnActiMobi_Click() {
	    $strLogiChof = $this->mctContainerMobile->ContainerMobile->Chofer->Login;
        QApplication::Redirect(__SIST__.'/log_mobile_list.php/'.$strLogiChof);
    }

    protected function txtPorxSync_Create() {
        $this->txtPorxSync = new QTextBox($this);
        $this->txtPorxSync->Name = 'xSinc';
        $this->txtPorxSync->Width = 50;
        $this->txtPorxSync->Text = $this->mctContainerMobile->ContainerMobile->_Pzas_x_Sync();
        if ($this->txtPorxSync->Text > 0) {
            $this->txtPorxSync->ForeColor = 'blue';
            $this->txtPorxSync->FontBold = true;
        }
    }

    protected function btnSyncCont_Create() {
        $this->btnSyncCont = new QButtonP($this);
        $this->btnSyncCont->Text = TextoIcono('cogs','Sincro');
        $this->btnSyncCont->AddAction(new QClickEvent(), new QServerAction('btnSyncCont_Click'));
    }

    protected function btnSyncCont_Click() {
        list($intCantPiez, $intCantErro, $strTextMens) = $this->mctContainerMobile->ContainerMobile->Container->TransferirFromMobile();
        if (strlen($strTextMens) == 0) {
            $strTextMens = "Piezas Sincronizadas: $intCantPiez | Errores: $intCantErro";
        }
        if ($intCantErro == 0) {
            $this->success($strTextMens);
        } else {
            $this->danger($strTextMens);
        }
        $this->dtgPiezMobi->Refresh();
        $this->txtPorxSync->Text = $this->mctContainerMobile->ContainerMobile->_Pzas_x_Sync();
    }


    protected function dtgPiezMobi_Create() {
        $this->dtgPiezMobi = new ContainerPiezaMobileDataGrid($this);
        $this->dtgPiezMobi->FontSize = 11.5;
        $this->dtgPiezMobi->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgPiezMobi->CssClass = 'datagrid';
        $this->dtgPiezMobi->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgPiezMobi->Paginator = new QPaginator($this->dtgPiezMobi);
        $this->dtgPiezMobi->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $objClauWher[] = QQ::Equal(QQN::ContainerPiezaMobile()->ContainerMobileId,$this->mctContainerMobile->ContainerMobile->Id);
        $this->dtgPiezMobi->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Higlight the datagrid rows when mousing over them
        $this->dtgPiezMobi->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgPiezMobi->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        /*$this->dtgPiezMobi->RowActionParameterHtml = '<?= $_ITEM->Id ?>';*/
        //$this->dtgPiezMobi->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPiezMobiRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for container_pieza_mobile's properties, or you
        // can traverse down QQN::container_pieza_mobile() to display fields that are down the hierarchy)
        //$this->dtgPiezMobi->MetaAddColumn('Id');
        //$this->dtgPiezMobi->MetaAddColumn(QQN::ContainerPiezaMobile()->ContainerMobile);
        $this->dtgPiezMobi->MetaAddColumn('IdPieza','Width=160');

        $colCodiCkpt = new QDataGridColumn('CKPT','<?= $_FORM->colCodiCkpt_Render($_ITEM) ?>');
        $colCodiCkpt->HtmlEntities = false;
        $this->dtgPiezMobi->AddColumn($colCodiCkpt);

        //$this->dtgPiezMobi->MetaAddColumn('Checkpoint','Name=CKPT');

        $colFechCkpt = new QDataGridColumn('FECHA','<?= $_FORM->colFechCkpt_Render($_ITEM) ?>');
        $colFechCkpt->HtmlEntities = false;
        $this->dtgPiezMobi->AddColumn($colFechCkpt);

        //$this->dtgPiezMobi->MetaAddColumn('Fecha');

        $colHoraCkpt = new QDataGridColumn('HORA','<?= $_FORM->colHoraCkpt_Render($_ITEM) ?>');
        $colHoraCkpt->HtmlEntities = false;
        $this->dtgPiezMobi->AddColumn($colHoraCkpt);

        //$this->dtgPiezMobi->MetaAddColumn('Hora');

        $colComeCkpt = new QDataGridColumn('COMENTARIO','<?= $_FORM->colComeCkpt_Render($_ITEM) ?>');
        $colComeCkpt->HtmlEntities = false;
        $this->dtgPiezMobi->AddColumn($colComeCkpt);

        //$this->dtgPiezMobi->MetaAddColumn('Comentario');

        //$this->dtgPiezMobi->MetaAddColumn('EntregadoA');
        //$this->dtgPiezMobi->MetaAddColumn('Cedula');
        //$this->dtgPiezMobi->MetaAddColumn('FechaPod');
        //$this->dtgPiezMobi->MetaAddColumn('HoraPod');
        //$this->dtgPiezMobi->MetaAddColumn('CreatedAt');

        $colFechActu = new QDataGridColumn('F.ACTU','<?= $_FORM->colFechActu_Render($_ITEM) ?>');
        $colFechActu->HtmlEntities = false;
        $this->dtgPiezMobi->AddColumn($colFechActu);

        //$this->dtgPiezMobi->MetaAddColumn('UpdatedAt','Name=F.Actu');

        $this->dtgPiezMobi->MetaAddColumn('IsSync','Name=SINC?');

    }

    public function colCodiCkpt_Render(ContainerPiezaMobile $objPiezMobi) {
	    return $objPiezMobi->Checkpoint != 'TR'
            ? $objPiezMobi->Checkpoint
            : '';
    }

    public function colFechCkpt_Render(ContainerPiezaMobile $objPiezMobi) {
	    return $objPiezMobi->Checkpoint != 'TR'
            ? $objPiezMobi->Fecha
            : '';
    }

    public function colHoraCkpt_Render(ContainerPiezaMobile $objPiezMobi) {
	    return $objPiezMobi->Checkpoint != 'TR'
            ? $objPiezMobi->Hora
            : '';
    }

    public function colComeCkpt_Render(ContainerPiezaMobile $objPiezMobi) {
        return $objPiezMobi->Checkpoint != 'TR'
            ? substr($objPiezMobi->Comentario,0,45)
            : '';
    }

    public function colFechActu_Render(ContainerPiezaMobile $objPiezMobi) {
        return $objPiezMobi->Checkpoint != 'TR'
            ? $objPiezMobi->UpdatedAt
            : '';
    }


    protected function determinarPosicion() {
        if ($this->mctContainerMobile->ContainerMobile && !isset($_SESSION['DataContainerMobile'])) {
            $_SESSION['DataContainerMobile'] = serialize(array($this->mctContainerMobile->ContainerMobile));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataContainerMobile']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctContainerMobile->ContainerMobile->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('ContainerMobile',$this->mctContainerMobile->ContainerMobile->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/container_mobile_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/container_mobile_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/container_mobile_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/container_mobile_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctContainerMobile->ContainerMobile;
		$this->mctContainerMobile->SaveContainerMobile();
		if ($this->mctContainerMobile->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctContainerMobile->ContainerMobile;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'ContainerMobile';
				$arrLogxCamb['intRefeRegi'] = $this->mctContainerMobile->ContainerMobile->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctContainerMobile->ContainerMobile->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/container_mobile_edit.php/'.$this->mctContainerMobile->ContainerMobile->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'ContainerMobile';
			$arrLogxCamb['intRefeRegi'] = $this->mctContainerMobile->ContainerMobile->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctContainerMobile->ContainerMobile->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/container_mobile_edit.php/'.$this->mctContainerMobile->ContainerMobile->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //------------------------------------------------------
        // Antes de eliminar el ContainerMobile, se Sincroniza
        //------------------------------------------------------
        list($intCantPiez, $intCantErro, $strTextMens) = $this->mctContainerMobile->ContainerMobile->Container->TransferirFromMobile();
        if ($intCantErro == 0) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctContainerMobile->DeleteContainerMobile();
            $arrLogxCamb['strNombTabl'] = 'ContainerMobile';
            $arrLogxCamb['intRefeRegi'] = $this->mctContainerMobile->ContainerMobile->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctContainerMobile->ContainerMobile->Container->Numero;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// container_mobile_edit.tpl.php as the included HTML template file
ContainerMobileEditForm::Run('ContainerMobileEditForm');
?>