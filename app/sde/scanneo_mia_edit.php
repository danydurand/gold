<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ScanneoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Scanneo class.  It uses the code-generated
 * ScanneoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Scanneo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both scanneo_mia_edit.php AND
 * scanneo_mia_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ScanneoMiaEditForm extends ScanneoEditFormBase {

    protected $txtNumePiez;
    protected $dtgPiezSobr;
    protected $dtgPiezPend;
    protected $txtResuScan;
    protected $objProcEjec;
    protected $btnErroProc;
    protected $btnProcPend;
    protected $intCantPend;
    protected $intCantSobr;
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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ScanneoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctScanneo = ScanneoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Scanneo's data fields
		$this->lblId = $this->mctScanneo->lblId_Create();
		$this->txtDescripcion = $this->mctScanneo->txtDescripcion_Create();
		$this->txtDescripcion->Width = 180;
		$this->txtNumePiez_Create();
		$this->txtResuScan_Create();
		$this->calCreatedAt = $this->mctScanneo->calCreatedAt_Create();
		$this->calCreatedAt->Name = 'F.Creacion';
		$this->calCreatedAt->Width = 120;
		$this->lstCreatedByObject = $this->mctScanneo->lstCreatedByObject_Create();
		$this->lstCreatedByObject->Name = 'Creado Por';
		$this->lstCreatedByObject->Width = 120;
		$this->calUpdatedAt = $this->mctScanneo->calUpdatedAt_Create();
		$this->calUpdatedAt->Name = 'F.Edicion';
		$this->calUpdatedAt->Width = 120;
		$this->lstUpdatedByObject = $this->mctScanneo->lstUpdatedByObject_Create();
		$this->lstUpdatedByObject->Name = 'Editado Por';
		$this->lstUpdatedByObject->Width = 120;

        $this->btnProcPend_Create();
        $this->btnErroProc_Create();
		$this->dtgPiezSobr_Create();
		$this->dtgPiezPend_Create();
        $this->btnExpoExce_Create();

		if (!$this->mctScanneo->EditMode) {
		    $this->calCreatedAt->DateTime = new QDateTime(QDateTime::Now());
		    $this->lstCreatedByObject->RemoveAllItems();
		    $this->lstCreatedByObject->AddItem($this->objUsuario->LogiUsua, $this->objUsuario->CodiUsua, true);
            $this->calUpdatedAt->DateTime = new QDateTime(QDateTime::Now());
            $this->lstUpdatedByObject->RemoveAllItems();
            $this->lstUpdatedByObject->AddItem($this->objUsuario->LogiUsua, $this->objUsuario->CodiUsua, true);
		    $this->txtNumePiez->Visible = false;
		    $this->txtResuScan->Visible = false;
        }

        $this->calCreatedAt = disableControl($this->calCreatedAt);
        $this->lstCreatedByObject = disableControl($this->lstCreatedByObject);
        $this->calUpdatedAt = disableControl($this->calUpdatedAt);
        $this->lstUpdatedByObject = disableControl($this->lstUpdatedByObject);

        $this->btnNuevRegi->Visible = false;
        $this->txtNumePiez->SetFocus();

        if ($this->mctScanneo->EditMode) {
            $this->txtDescripcion = disableControl($this->txtDescripcion);
            $this->intCantPend = ScanneoPiezas::CountPendientesDelScanneo($this->mctScanneo->Scanneo->Id);
            $this->btnProcPend->Visible = $this->intCantPend;
            $this->intCantSobr = ScanneoPiezas::CountSobrantesDelScanneo($this->mctScanneo->Scanneo->Id);
            $this->btnExpoExce->Visible = $this->intCantSobr;
            $this->btnSave->Visible = false;
        }

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Scanneo Miami';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
    }

    protected function btnProcPend_Create() {
        $this->btnProcPend = new QButtonP($this);
        $this->btnProcPend->Text = TextoIcono('cogs','Procesar Pendientes','F','lg');
        $this->btnProcPend->AddAction(new QClickEvent(), new QServerAction('btnProcPend_Click'));
        $this->btnProcPend->Visible = false;
    }

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = TextoIcono('eye','Error(es)','F','lg');
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgPiezSobr);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = TextoIcono('download','XLS','F','lg');
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->ToolTip = 'Exportar Piezas';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnErroProc_Click() {
        unset($_SESSION['PagiBack']);
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function txtNumePiez_Create() {
	    $this->txtNumePiez = new QTextBox($this);
	    $this->txtNumePiez->Name = 'Scannear Pieza';
	    $this->txtNumePiez->Width = 180;
        $this->txtNumePiez->AddAction(new QEnterKeyEvent(), new QAjaxAction('txtNumePiez_EnterKey'));
    }

    protected function txtResuScan_Create() {
	    $this->txtResuScan = new QTextBox($this);
	    $this->txtResuScan->Name = 'Result Scanneo';
	    $this->txtResuScan->Width = 180;
	    $this->txtResuScan->FontBold = true;
	    $this->txtResuScan->Enabled = false;
    }

    protected function txtNumePiez_EnterKey() {
	    $this->mensaje();
        $this->txtResuScan->Text = '';
        $this->txtResuScan->ForeColor = null;
        $strNumePiez = trim($this->txtNumePiez->Text);
        if (strlen($strNumePiez) > 0) {
            try {
                $objScanPiez = new ScanneoPiezas();
                $objScanPiez->ScanneoId = $this->mctScanneo->Scanneo->Id;
                $objScanPiez->IdPieza = $strNumePiez;
                $objScanPiez->IsProcesada = false;
                $objScanPiez->CreatedAt   = new QDateTime(QDateTime::Now());
                $objScanPiez->CreatedBy   = $this->objUsuario->CodiUsua;
                $objScanPiez->UpdatedAt   = new QDateTime(QDateTime::Now());
                $objScanPiez->UpdatedBy   = $this->objUsuario->CodiUsua;
                $objScanPiez->Save();
                $this->txtResuScan->ForeColor = 'green';
                $this->txtResuScan->Text = 'OKEY';
            } catch (Exception $e) {
                $strTextMens = $e->getMessage();
                if (strpos($strTextMens,'Duplicate') != null) {
                    $this->txtResuScan->ForeColor = 'red';
                    $this->txtResuScan->Text = 'REPETIDA';
                } else {
                    $this->danger('Excepcion: '.$e->getMessage());
                }
            } catch (Error $e) {
                $this->danger('Error: '.$e->getMessage());
            }

            $this->txtNumePiez->Text = '';
        }
        $this->dtgPiezSobr->Refresh();
        $this->dtgPiezPend->Refresh();

        $this->btnProcPend->Visible = $this->intCantPend;
        $this->btnExpoExce->Visible = $this->intCantSobr;

        $this->txtNumePiez->SetFocus();
    }

    protected function dtgPiezSobr_Create() {
        $this->dtgPiezSobr = new QDataGrid($this);
        $this->dtgPiezSobr->FontSize = 12;
        $this->dtgPiezSobr->ShowFilter = false;

        $this->dtgPiezSobr->CssClass = 'datagrid';
        $this->dtgPiezSobr->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezSobr->Paginator = new QPaginator($this->dtgPiezSobr);
        $this->dtgPiezSobr->ItemsPerPage = 20;

        $this->dtgPiezSobr->UseAjax = true;

        $this->dtgPiezSobr->SetDataBinder('dtgPiezSobr_Bind');

        $this->dtgPiezSobrColumns();
    }

    protected function dtgPiezSobr_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::ScanneoPiezas()->ScanneoId,$this->mctScanneo->Scanneo->Id);
        $objClauWher[] = QQ::IsNull(QQN::ScanneoPiezas()->GuiaPiezaId);

        $arrPiezSobr = ScanneoPiezas::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgPiezSobr->TotalItemCount = count($arrPiezSobr);

        // Bind the datasource to the datagrid
        $this->dtgPiezSobr->DataSource = ScanneoPiezas::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgPiezSobr->OrderByClause, $this->dtgPiezSobr->LimitClause)
        );
    }

    protected function dtgPiezSobrColumns() {
        $colPiezIdxx = new QDataGridColumn($this);
        $colPiezIdxx->Name = QApplication::Translate('IdPieza');
        $colPiezIdxx->Html = '<?= $_ITEM->IdPieza ?>';
        $colPiezIdxx->Width = 160;
        $this->dtgPiezSobr->AddColumn($colPiezIdxx);
    }

    protected function dtgPiezPend_Create() {
        $this->dtgPiezPend = new QDataGrid($this);
        $this->dtgPiezPend->FontSize = 12;
        $this->dtgPiezPend->ShowFilter = false;

        $this->dtgPiezPend->CssClass = 'datagrid';
        $this->dtgPiezPend->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezPend->Paginator = new QPaginator($this->dtgPiezPend);
        $this->dtgPiezPend->ItemsPerPage = 20;

        $this->dtgPiezPend->UseAjax = true;

        $this->dtgPiezPend->SetDataBinder('dtgPiezPend_Bind');

        $this->dtgPiezPendColumns();
    }

    protected function dtgPiezPend_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::ScanneoPiezas()->ScanneoId,$this->mctScanneo->Scanneo->Id);
        //$objClauWher[] = QQ::IsNotNull(QQN::ScanneoPiezas()->GuiaPiezaId);

        $arrPiezPend = ScanneoPiezas::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgPiezPend->TotalItemCount = count($arrPiezPend);

        $this->btnProcPend->Visible = count($arrPiezPend) > 0 ? true : false;

        // Bind the datasource to the datagrid
        $this->dtgPiezPend->DataSource = ScanneoPiezas::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgPiezPend->OrderByClause, $this->dtgPiezPend->LimitClause)
        );
    }

    protected function dtgPiezPendColumns() {
        $colPiezIdxx = new QDataGridColumn($this);
        $colPiezIdxx->Name = 'IdPieza';
        $colPiezIdxx->Html = '<?= $_ITEM->IdPieza ?>';
        $colPiezIdxx->Width = 160;
        $this->dtgPiezPend->AddColumn($colPiezIdxx);

        //$colEstaProc = new QDataGridColumn($this);
        //$colEstaProc->Name = 'Procesada';
        /*$colEstaProc->Html = '<?= $_ITEM->IsProcesada ? "SI" : "NO" ?>';*/
        //$colEstaProc->Width = 160;
        //$this->dtgPiezPend->AddColumn($colEstaProc);

    }

    protected function determinarPosicion() {
        if ($this->mctScanneo->Scanneo && !isset($_SESSION['DataScanneo'])) {
            $_SESSION['DataScanneo'] = serialize(array($this->mctScanneo->Scanneo));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataScanneo']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctScanneo->Scanneo->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Scanneo',$this->mctScanneo->Scanneo->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/scanneo_mia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/scanneo_mia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/scanneo_mia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/scanneo_mia_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctScanneo->EditMode) {
            t('Salve');
            //--------------------------------------------
            // Se clona el objeto para verificar cambios
            //--------------------------------------------
            $objRegiViej = clone $this->mctScanneo->Scanneo;
            try {
                $this->mctScanneo->SaveScanneo();
            } catch (Exception $e) {
                $this->danger('Excepcion: '.$e->getMessage());
            } catch (Error $e) {
                $this->danger('Error: '.$e->getMessage());
            }
            if ($this->mctScanneo->EditMode) {
                //---------------------------------------------------------------------
                // Si estamos en modo Edicion, entonces se verifican la existencia
                // de algun cambio en algun dato
                //---------------------------------------------------------------------
                $objRegiNuev = $this->mctScanneo->Scanneo;
                $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                    //------------------------------------------
                    // En caso de que el objeto haya cambiado
                    //------------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'Scanneo';
                    $arrLogxCamb['intRefeRegi'] = $this->mctScanneo->Scanneo->Id;
                    $arrLogxCamb['strNombRegi'] = $this->mctScanneo->Scanneo->Descripcion;
                    $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/scanneo_mia_edit.php/'.$this->mctScanneo->Scanneo->Id;
                    LogDeCambios($arrLogxCamb);
                    $this->success('Transacción Exitosa !!!');
                }
            } else {
                $arrLogxCamb['strNombTabl'] = 'Scanneo';
                $arrLogxCamb['intRefeRegi'] = $this->mctScanneo->Scanneo->Id;
                $arrLogxCamb['strNombRegi'] = $this->mctScanneo->Scanneo->Descripcion;
                $arrLogxCamb['strDescCamb'] = "Creado";
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/scanneo_mia_edit.php/'.$this->mctScanneo->Scanneo->Id;
                LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
                //$this->txtNumePiez->Visible = true;
                QApplication::Redirect(__SIST__.'/scanneo_mia_edit.php/'.$this->mctScanneo->Scanneo->Id);
            }
        }
	}

    protected function btnProcPend_Click() {
        $strNombProc = 'Scanneo Individual';
        $this->objProcEjec = CrearProceso($strNombProc);

        $arrNumePiez = ScanneoPiezas::LoadArrayPendientesDelScanneo($this->mctScanneo->Scanneo->Id);
        $objCkptMani = Checkpoints::LoadByCodigo('RA');
        $intContCkpt = 0;
        $intCantErro = 0;
        /* @var $objPiezScan ScanneoPiezas */
        foreach ($arrNumePiez as $objPiezScan) {
            t("Procesando: ".$objPiezScan->IdPieza);
            //----------------------------------------------------------
            // Se registra el checkpoint correspondiente para la pieza
            //----------------------------------------------------------
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumePiez'] = $objPiezScan->IdPieza;
            $arrDatoCkpt['GuiaAnul'] = false;
            $arrDatoCkpt['CodiCkpt'] = $objCkptMani->Id;
            $arrDatoCkpt['TextCkpt'] = $objCkptMani->Descripcion;
            $arrDatoCkpt['CodiRuta'] = '';
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);

            if ($arrResuGrab['TodoOkey']) {
                $objPiezScan->marcarProcesada($this->objUsuario->CodiUsua);
                $intContCkpt++;
            } else {
                $strMensUsua = "Error al registrar Checkpoint a la pieza: " . $objPiezScan->IdPieza;
                $strMensUsua .= " - " . $arrResuGrab['MotiNook'];

                $intCantErro++;
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $objPiezScan->IdPieza;
                $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                $arrParaErro['ComeErro'] = 'Registrando Checkpoint RA a la Pieza';
                GrabarError($arrParaErro);

                t($strMensUsua);
            }
        }

        $this->dtgPiezPend->Refresh();

        //--------------------------------
        // Se actualizan los Manifiestos
        //--------------------------------

        $blnSecuEstr = Parametros::BuscarParametro('SECUESTR','MATCSCAN','Val1',false);
        $arrIdxxMani = [];
        if ($blnSecuEstr) {
            //----------------------------------------------------------------------------------------
            // Los Manifestos a procesar, serán estrictamente aquellos que hayan sido Nacionalizados
            //----------------------------------------------------------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NotaEntregaCkpt()->Checkpoint->Codigo,'CR');
            $objClauSele   = QQ::Select(QQN::NotaEntregaCkpt()->ContainerId);
            $arrManiNaci   = NotaEntregaCkpt::QueryArray(
                QQ::AndCondition($objClauWher),
                QQ::Clause(
                    $objClauSele,
                    QQ::Distinct()
                ));
            $arrIdxxMani   = [];
            foreach ($arrManiNaci as $objManiNaci) {
                $arrIdxxMani[] = $objManiNaci->ContainerId;
            }
        }
        //--------------------------------------------------------------------------------------
        // Adicionalmente, se deben considerar los Manifiestos ya Procesados, con diferencias
        // entre la cantidad de piezas recibidas y la cantidad de piezas total del Manifiesto
        //--------------------------------------------------------------------------------------
        $objClauWher   = QQ::Clause();
        if ($blnSecuEstr) {
            $objClauWher[] = QQ::In(QQN::NotaEntrega()->Id,$arrIdxxMani);
        }
        $objClauWher[] = QQ::NotEqual(QQN::NotaEntrega()->Piezas,QQN::NotaEntrega()->Recibidas);
        $objClauWher[] = QQ::GreaterThan(QQN::NotaEntrega()->Procesadas,0);
        $intCantMani   = 0;
        $intCantErro   = 0;
        $arrManiSist   = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
        foreach ($arrManiSist as $objManiSist) {
            $objManiSist->Piezas = $objManiSist->cantidadDePiezas();
            $objManiSist->Save();
            $objManiSist->ContarActualizarRecibidas();
            //---------------------------------------
            // Se graba el checkpoint al Manifiesto
            //---------------------------------------
            if ($objManiSist->Recibidas > 0) {
                $arrResuGrab = $objManiSist->GrabarCheckpoint($objCkptMani, $this->objProcEjec);
                if (!$arrResuGrab['TodoOkey']) {
                    $strMensUsua = "Error al registrar Checkpoint a la pieza: " . $objManiSist->Referencia;
                    $strMensUsua .= " - " . $arrResuGrab['MotiNook'];

                    $intCantErro++;
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $objManiSist->Referencia;
                    $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                    $arrParaErro['ComeErro'] = 'Registrando Checkpoint RA al Manifiesto';
                    GrabarError($arrParaErro);

                    t($strMensUsua);
                }
            }
            $intCantMani++;
        }
        $strTextMens = "Total Recibidas: $intContCkpt | Manifiestos Actualizados: $intCantMani | Errores: $intCantErro";
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = true;
        $this->objProcEjec->Save();

        if ($intCantErro) {
            $this->btnErroProc->Visible = true;
            $this->warning($strTextMens);
        } else {
            $this->success($strTextMens);
        }


    }

    protected function btnVolvList_Click() {
        QApplication::Redirect(__SIST__.'/scanneo_mia_list.php');
    }

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctScanneo->DeleteScanneo();
            $arrLogxCamb['strNombTabl'] = 'Scanneo';
            $arrLogxCamb['intRefeRegi'] = $this->mctScanneo->Scanneo->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctScanneo->Scanneo->Descripcion;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// scanneo_mia_edit.tpl.php as the included HTML template file
ScanneoMiaEditForm::Run('ScanneoMiaEditForm');
?>