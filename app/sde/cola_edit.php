<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ColaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Cola class.  It uses the code-generated
 * ColaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Cola columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cola_edit.php AND
 * cola_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ColaEditForm extends ColaEditFormBase {
    protected $txtNombProc;
    protected $dtgErroProc;
    protected $btnExpoExce;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ColaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctCola = ColaMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Cola's data fields
		$this->lblId = $this->mctCola->lblId_Create();
		$this->txtNombProc_Create();
		//$this->lstProcesoError = $this->mctCola->lstProcesoError_Create();
		$this->lstProcesoError->Width = 240;
		$this->calFechaInicio = $this->mctCola->calFechaInicio_Create();
		$this->calFechaFin = $this->mctCola->calFechaFin_Create();
		//$this->txtClase = $this->mctCola->txtClase_Create();
		//$this->txtMetodo = $this->mctCola->txtMetodo_Create();
		//$this->txtParametros = $this->mctCola->txtParametros_Create();
		$this->chkEjecutado = $this->mctCola->chkEjecutado_Create();
		$this->txtResultado = $this->mctCola->txtResultado_Create();
		$this->txtResultado->TextMode = QTextMode::MultiLine;
		$this->txtResultado->Rows     = 2;
		$this->txtResultado->Width    = 290;

		$this->calCreatedAt = $this->mctCola->calCreatedAt_Create();
		$this->calCreatedAt->Name = 'Creado El';
		$this->calUpdatedAt = $this->mctCola->calUpdatedAt_Create();
		$this->calUpdatedAt->Name = 'Modif. El';
		$this->lstCreatedByObject = $this->mctCola->lstCreatedByObject_Create();
		$this->lstCreatedByObject->Name = 'Creado Por';
		$this->lstUpdatedByObject = $this->mctCola->lstUpdatedByObject_Create();
		$this->lstUpdatedByObject->Name = 'Modif. Por';
		
		$this->dtgErroProc_Create() ;
        $this->btnExpoExce_Create();

		$this->btnNuevRegi->Visible = false;
		$this->btnDelete->Visible   = false;
		$this->btnSave->Visible     = false;

		$this->txtNombProc          = disableControl($this->txtNombProc);
		$this->calFechaInicio       = disableControl($this->calFechaInicio);
		$this->calFechaFin          = disableControl($this->calFechaFin);
		$this->chkEjecutado         = disableControl($this->chkEjecutado);
		$this->txtResultado         = disableControl($this->txtResultado);
		$this->txtResultado         = disableControl($this->txtResultado);
		$this->calCreatedAt         = disableControl($this->calCreatedAt);
		$this->calUpdatedAt         = disableControl($this->calUpdatedAt);
		$this->lstCreatedByObject   = disableControl($this->lstCreatedByObject);
		$this->lstUpdatedByObject   = disableControl($this->lstUpdatedByObject);


	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function dtgErroProc_Create() {
        $this->dtgErroProc = new QDataGrid($this);
        $this->dtgErroProc->FontSize = 12;
        $this->dtgErroProc->ShowFilter = false;

        $this->dtgErroProc->CssClass = 'datagrid';
        $this->dtgErroProc->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgErroProc->Paginator = new QPaginator($this->dtgErroProc);
        $this->dtgErroProc->ItemsPerPage = 20;

        $this->dtgErroProc->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgErroProc->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgErroProc->UseAjax = true;

        $this->dtgErroProc->SetDataBinder('dtgErroProc_Bind');

        $this->dtgErroProcColumns();
    }

    protected function dtgErroProc_Bind() {

	    $objClauWher = QQ::Equal(QQN::DetalleError()->ProcesoId,$this->mctCola->Cola->ProcesoErrorId);
        $arrErroProc = DetalleError::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgErroProc->TotalItemCount = count($arrErroProc);

        // Bind the datasource to the datagrid
        $this->dtgErroProc->DataSource = DetalleError::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgErroProc->OrderByClause, $this->dtgErroProc->LimitClause)
        );
    }

    protected function dtgErroProcColumns() {
        $colRefeErro = new QDataGridColumn($this);
        $colRefeErro->Name = 'Referencia';
        $colRefeErro->Html = '<?= $_ITEM->Referencia ?>';
        $colRefeErro->Width = 60;
        $this->dtgErroProc->AddColumn($colRefeErro);

        $colMensErro = new QDataGridColumn($this);
        $colMensErro->Name = 'Mensaje';
        $colMensErro->Html = '<?= $_ITEM->MensajeError ?>';
        $colMensErro->Width = 160;
        $this->dtgErroProc->AddColumn($colMensErro);

        $colComeErro = new QDataGridColumn($this);
        $colComeErro->Name = 'Comentario';
        $colComeErro->Html = '<?= $_ITEM->Comentario ?>';
        $colComeErro->Width = 180;
        $this->dtgErroProc->AddColumn($colComeErro);

    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgErroProc);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = TextoIcono('download','XLS','F','lg');
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->ToolTip = 'Exportar los Errores del Proceso';
    }

    protected function txtNombProc_Create() {
        $objProcBatch      = ProcesoError::Load($this->mctCola->Cola->ProcesoErrorId);
        $this->txtNombProc = new QTextBox($this);
	    $this->txtNombProc->Name  = 'Proceso';
	    $this->txtNombProc->Width = 240;
	    $this->txtNombProc->Text  = $objProcBatch->Nombre;
    }

    protected function determinarPosicion() {
        if ($this->mctCola->Cola && !isset($_SESSION['DataCola'])) {
            $_SESSION['DataCola'] = serialize(array($this->mctCola->Cola));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataCola']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctCola->Cola->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Cola',$this->mctCola->Cola->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/cola_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/cola_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/cola_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/cola_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctCola->Cola;
		$this->mctCola->SaveCola();
		if ($this->mctCola->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctCola->Cola;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Cola';
				$arrLogxCamb['intRefeRegi'] = $this->mctCola->Cola->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctCola->Cola->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/cola_edit.php/'.$this->mctCola->Cola->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Cola';
			$arrLogxCamb['intRefeRegi'] = $this->mctCola->Cola->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctCola->Cola->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/cola_edit.php/'.$this->mctCola->Cola->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctCola->TablasRelacionadasCola();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctCola->DeleteCola();
            $arrLogxCamb['strNombTabl'] = 'Cola';
            $arrLogxCamb['intRefeRegi'] = $this->mctCola->Cola->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctCola->Cola->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// cola_edit.tpl.php as the included HTML template file
ColaEditForm::Run('ColaEditForm');
?>