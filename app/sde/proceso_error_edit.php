<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ProcesoErrorEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the ProcesoError class.  It uses the code-generated
 * ProcesoErrorMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a ProcesoError columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both proceso_error_edit.php AND
 * proceso_error_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ProcesoErrorEditForm extends ProcesoErrorEditFormBase {
    protected $dtgDetaErro;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ProcesoErrorMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctProcesoError = ProcesoErrorMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on ProcesoError's data fields
		$this->lblId = $this->mctProcesoError->lblId_Create();
		$this->txtNombre = $this->mctProcesoError->txtNombre_Create();
		$this->txtNombre->Width = 280;
		$this->txtUsuario = $this->mctProcesoError->txtUsuario_Create();
		$this->calFecha = $this->mctProcesoError->calFecha_Create();
		$this->calHoraInicial = $this->mctProcesoError->calHoraInicial_Create();
		$this->calHoraFinal = $this->mctProcesoError->calHoraFinal_Create();
		$this->txtComentario = $this->mctProcesoError->txtComentario_Create();
		$this->txtComentario->Width = 280;
		$this->txtComentario->TextMode = QTextMode::MultiLine;
		$this->txtComentario->Rows = 3;
		$this->chkNotificarAdmin = $this->mctProcesoError->chkNotificarAdmin_Create();
		$this->chkNotificarUsuario = $this->mctProcesoError->chkNotificarUsuario_Create();

		$this->txtNombre           = disableControl($this->txtNombre);
		$this->txtUsuario          = disableControl($this->txtUsuario);
		$this->calFecha            = disableControl($this->calFecha);
		$this->calHoraInicial      = disableControl($this->calHoraInicial);
		$this->calHoraFinal        = disableControl($this->calHoraFinal);
		$this->txtComentario       = disableControl($this->txtComentario);
		$this->chkNotificarAdmin   = disableControl($this->chkNotificarAdmin);
		$this->chkNotificarUsuario = disableControl($this->chkNotificarUsuario);

		$this->dtgDetaErro_Create();
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function dtgDetaErro_Create() {
        $this->dtgDetaErro = new QDataGrid($this);
        $this->dtgDetaErro->FontSize = 12;
        $this->dtgDetaErro->ShowFilter = false;

        $this->dtgDetaErro->CssClass = 'datagrid';
        $this->dtgDetaErro->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgDetaErro->Paginator = new QPaginator($this->dtgDetaErro);
        $this->dtgDetaErro->ItemsPerPage = 10;

        $this->dtgDetaErro->UseAjax = true;

        $this->dtgDetaErro->SetDataBinder('dtgDetaErro_Bind');

        $this->create_dtgDetaErroColumns();
    }

    protected function dtgDetaErro_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::DetalleError()->ProcesoId,$this->mctProcesoError->ProcesoError->Id);
        $arrDetaErro   = DetalleError::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgDetaErro->TotalItemCount = count($arrDetaErro);

        // Bind the datasource to the datagrid
        $this->dtgDetaErro->DataSource = DetalleError::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgDetaErro->OrderByClause, $this->dtgDetaErro->LimitClause)
        );
    }

    protected function create_dtgDetaErroColumns() {

        $colRefeRegi = new QDataGridColumn($this);
        $colRefeRegi->Name = 'Referencia';
        $colRefeRegi->Html = '<?= $_ITEM->Referencia ?>';
        $colRefeRegi->Width = 160;
        $this->dtgDetaErro->AddColumn($colRefeRegi);

        //$colMensErro = new QDataGridColumn($this);
        //$colMensErro->Name = QApplication::Translate('MensajeError');
        /*$colMensErro->Html = '<?= $_ITEM->MensajeError ?>';*/
        //$colMensErro->Width = 160;
        //$this->dtgDetaErro->AddColumn($colMensErro);
        //
        //$colComeErro = new QDataGridColumn($this);
        //$colComeErro->Name = QApplication::Translate('Comentario');
        /*$colComeErro->Html = '<?= $_ITEM->Comentario ?>';*/
        //$this->dtgDetaErro->AddColumn($colComeErro);

    }

    protected function determinarPosicion() {
        if ($this->mctProcesoError->ProcesoError && !isset($_SESSION['DataProcesoError'])) {
            $_SESSION['DataProcesoError'] = serialize(array($this->mctProcesoError->ProcesoError));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataProcesoError']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctProcesoError->ProcesoError->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('ProcesoError',$this->mctProcesoError->ProcesoError->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/proceso_error_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/proceso_error_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/proceso_error_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/proceso_error_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctProcesoError->ProcesoError;
		$this->mctProcesoError->SaveProcesoError();
		if ($this->mctProcesoError->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctProcesoError->ProcesoError;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'ProcesoError';
				$arrLogxCamb['intRefeRegi'] = $this->mctProcesoError->ProcesoError->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctProcesoError->ProcesoError->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_edit.php/'.$this->mctProcesoError->ProcesoError->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'ProcesoError';
			$arrLogxCamb['intRefeRegi'] = $this->mctProcesoError->ProcesoError->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctProcesoError->ProcesoError->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_edit.php/'.$this->mctProcesoError->ProcesoError->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctProcesoError->TablasRelacionadasProcesoError();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctProcesoError->DeleteProcesoError();
            $arrLogxCamb['strNombTabl'] = 'ProcesoError';
            $arrLogxCamb['intRefeRegi'] = $this->mctProcesoError->ProcesoError->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctProcesoError->ProcesoError->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// proceso_error_edit.tpl.php as the included HTML template file
ProcesoErrorEditForm::Run('ProcesoErrorEditForm');
?>