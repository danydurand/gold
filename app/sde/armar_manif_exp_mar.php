<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class ArmarManifExpMar extends FormularioBaseKaizen {
    protected $lstDestMani;  
    protected $lstMastAwbx;
    protected $txtNumeBlxx;
    protected $calFechDesp;
    protected $calFechCrea;
    protected $txtCantPiez;
    protected $txtNumeBook;
    protected $txtCantVolu;
    protected $txtCantPies;
    protected $objProcEjec;

    protected $txtListNume;  // Lista de Seriales/Guias/Valijas
    protected $dtgPiezApta;  // Piezas aptas para el Manifiesto
    protected $dtgPiezMani;  // Piezas del Manifiesto

    protected $arrListNume;  // Arreglo que contiene los numeros de la lista
    protected $objDataBase;
    protected $arrImprReto;  // Arreglo de Guias de Retorno para Impresion
    protected $dlgMensUsua;
    protected $txtDireEntr;
    protected $txtDescCont;

    protected $btnRepoErro;
    protected $btnImprReto;
    protected $btnExpoExce;

    /* @var $objManifies ManifiestoExp */
    protected $objManifies;
    protected $blnEditMode;
    protected $btnRepoMani;
    protected $strDescCont;

    protected $btnBorrMani;
    protected $lblResuEntr;


    protected function SetupValores() {
        $this->blnEditMode = false;
        $intIdxxCont = QApplication::PathInfo(0);
        if ($intIdxxCont) {
            $this->objManifies = ManifiestoExp::Load($intIdxxCont);
            if ($this->objManifies) {
                $this->blnEditMode = true;
            }
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->lblTituForm->Text = 'Manifiesto Exp MAR';

        $this->dlgMensUsua_Create();

        $this->lstDestMani_Create();
        $this->txtNumeBlxx_Create();
        $this->calFechCrea_Create();
        $this->calFechDesp_Create();
        $this->txtCantPiez_Create();
        $this->txtNumeBook_Create();
        $this->txtCantVolu_Create();
        $this->txtCantPies_Create();

        $this->txtListNume_Create();
        $this->dtgPiezApta_Create();
        $this->dtgPiezMani_Create();
        $this->btnRepoMani_Create();

        $this->btnRepoErro_Create();
        $this->btnExpoExce_Create();
        $this->btnBorrMani_Create();

        $this->lblResuEntr_Create();

        $this->calFechCrea = disableControl($this->calFechCrea);
        $this->txtCantPiez = disableControl($this->txtCantPiez);
        $this->txtCantVolu = disableControl($this->txtCantVolu);
        $this->txtCantPies = disableControl($this->txtCantPies);
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function lblResuEntr_Create() {
        $this->lblResuEntr = new QLabel($this);
        $strResuEntr = 'Piezas Manifestadas';
        //if ($this->blnEditMode) {
        //    $strResuEntr .= $this->objManifies->__resumenEntrega();
        //}
        $this->lblResuEntr->Text = $strResuEntr;
        $this->lblResuEntr->HtmlEntities = false;
    }

    protected function btnCancel_Create() {
        $this->btnCancel = new QButtonW($this);
        $this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i>';
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->CausesValidation = false;
    }

    protected function btnBorrMani_Create() {
        $this->btnBorrMani = new QButtonD($this);
        $this->btnBorrMani->Text = TextoIcono('trash-o','Borrar','F','lg');
        $this->btnBorrMani->ToolTip = 'Borrar el Manifiesto';
        $this->btnBorrMani->AddAction(new QClickEvent(), new QConfirmAction('Esta segur@ que desea borrar este Manifiesto?'));
        $this->btnBorrMani->AddAction(new QClickEvent(), new QServerAction('btnBorrMani_Click'));
        if (!$this->blnEditMode) {
            $this->btnBorrMani->Visible = false;
        }
    }

    protected function btnBorrMani_Click() {
        //t('Borrando el Manifiesto');
        $objCkptExpo  = Checkpoints::LoadByCodigo('EX');
        if ($objCkptExpo instanceof Checkpoints) {
            $intCkptExpo  = $objCkptExpo->Id;
            $arrPiezRuta  = $this->objManifies->GetPiezasConCheckpoint('EX','Id');
            $strIdxxRuta  = implode(',',$arrPiezRuta);
            //t('Las piezas exportadas son: '.$strIdxxRuta);
            $objDatabase  = Containers::GetDatabase();
            $strCadeSqlx  = 'delete ';
            $strCadeSqlx .= '  from pieza_checkpoints ';
            $strCadeSqlx .= ' where pieza_id in ('.$strIdxxRuta.')';
            $strCadeSqlx .= '   and checkpoint_id = '.$intCkptExpo;
            //t('SQL: '.$strCadeSqlx);
            try {
                $objDatabase->NonQuery($strCadeSqlx);
                //t('Checkpoints de exportacion eliminado');
                $this->objManifies->Delete();
                $this->objManifies->logDeCambios('Borrado');
                QApplication::Redirect(__SIST__.'/manifiesto_exp_list.php');
            } catch (Exception $e) {
                $this->danger($e->getMessage());
            }
        } else {
            $this->danger('No existe el Checkpoint de Exportacion | Comuniquese con el Administrador del Sistema');
        }
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgPiezMani);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = TextoIcono('download','XLS','F','lg');
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->ToolTip = 'Exportar a Excel las Piezas del Manifiesto';
    }


    protected function btnRepoMani_Create() {
        $this->btnRepoMani = new QLabel($this);
        $this->btnRepoMani->HtmlEntities = false;
        $this->btnRepoMani->CssClass = '';
        $this->btnRepoMani->Visible  = $this->blnEditMode;
        $this->opcionesDeImpresion();
    }

    protected function opcionesDeImpresion() {
        $arrOpciDrop   = array();
        if ($this->blnEditMode) {
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/manifiesto_exportacion_pdf.php/'.$this->objManifies->Id,
                TextoIcono('list','Manfiesto de Carga')
            );
            //$arrOpciDrop[] = OpcionDropDown(
            //    __SIST__.'/nota_de_despacho_pdf.php/'.$this->objManifies->Id,
            //    TextoIcono('bank','Nota de Despacho')
            //);
        }
        $strTextBoto = TextoIcono('print','Impr','F','lg');
        $this->btnRepoMani->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop, 'f');
        return $arrOpciDrop;
    }


    protected function dlgMensUsua_Create() {
        $this->dlgMensUsua = new QDialogBox($this);
        $this->dlgMensUsua->Width = '500px';
        $this->dlgMensUsua->Height = '280px';
        $this->dlgMensUsua->Overflow = QOverflow::Auto;
        $this->dlgMensUsua->Padding = '10px';
        $this->dlgMensUsua->FontSize = '20px';
        $this->dlgMensUsua->FontNames = QFontFamily::Georgia;
        $this->dlgMensUsua->BackColor = '#eeffdd';
        $this->dlgMensUsua->Display = false;
        $this->dlgMensUsua->ForeColor = 'blue';
    }

    protected function lstDestMani_Create() {
        $this->lstDestMani = new QListBox($this);
        $this->lstDestMani->Name = 'Destino';
        $this->lstDestMani->Width = 160;
        $objClauWher = QQ::Equal(QQN::Sucursales()->EsExport,true);
        $objClauOrde = QQ::OrderBy(QQN::Sucursales()->Nombre);
        $arrSucuExpo = Sucursales::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantDest = count($arrSucuExpo);
        $this->lstDestMani->AddItem(QApplication::Translate("- Seleccione Uno - ($intCantDest)"),null);
        foreach ($arrSucuExpo as $objSucuExpo) {
            $blnSeleRegi = false;
            if ($this->blnEditMode) {
                $blnSeleRegi = $this->objManifies->DestinoId == $objSucuExpo->Id;
            } else {
                if ($intCantDest == 1) {
                    $blnSeleRegi = true;
                }
            }
            $this->lstDestMani->AddItem($objSucuExpo->__toString(),$objSucuExpo->Id, $blnSeleRegi);
        }
        $this->lstDestMani->AddAction(new QChangeEvent(), new QAjaxAction('lstDestMani_Change'));
    }


    protected function calFechCrea_Create() {
        $this->calFechCrea = new QCalendar($this);
        if (!$this->blnEditMode) {
            $this->calFechCrea->DateTime = new QDateTime(QDateTime::Now());
        } else {
            $this->calFechCrea->DateTime = $this->objManifies->FechaCreacion;
        }
    }

    protected function calFechDesp_Create() {
        $this->calFechDesp = new QCalendar($this);
        if (!$this->blnEditMode) {
            $dttFechDhoy = date('Y-m-d');
            $dttFechTomo = SumaRestaDiasAFecha($dttFechDhoy,1,'+');
            $this->calFechDesp->DateTime = new QDateTime($dttFechTomo);
        } else {
            $this->calFechDesp->DateTime = $this->objManifies->FechaDespacho;
        }
    }

    protected function txtNumeBlxx_Create() {
        $this->txtNumeBlxx = new QTextBox($this);
        if ($this->blnEditMode) {
            $this->txtNumeBlxx->Text = $this->objManifies->NroBl;
        }
        $this->txtNumeBlxx->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QTextBox($this);
        $this->txtCantPiez->Width = 160;
        if ($this->blnEditMode) {
            $this->txtCantPiez->Text  = $this->objManifies->Piezas;
        }
    }

    protected function txtNumeBook_Create() {
        $this->txtNumeBook = new QTextBox($this);
        $this->txtNumeBook->Width = 160;
        if ($this->blnEditMode) {
            $this->txtNumeBook->Text  = $this->objManifies->Booking;
        }
    }

    protected function txtCantVolu_Create() {
        $this->txtCantVolu = new QTextBox($this);
        $this->txtCantVolu->Width = 160;
        if ($this->blnEditMode) {
            $this->txtCantVolu->Text  = $this->objManifies->Volumen;
        }
    }

    protected function txtCantPies_Create() {
        $this->txtCantPies = new QTextBox($this);
        $this->txtCantPies->Width = 160;
        if ($this->blnEditMode) {
            $this->txtCantPies->Text  = $this->objManifies->PiesCub;
        }
    }

    protected function dtgPiezApta_Create() {
        $this->dtgPiezApta = new QDataGrid($this);
        $this->dtgPiezApta->FontSize = 12;
        $this->dtgPiezApta->ShowFilter = false;

        $this->dtgPiezApta->CssClass = 'datagrid';
        $this->dtgPiezApta->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezApta->Paginator = new QPaginator($this->dtgPiezApta);
        $this->dtgPiezApta->ItemsPerPage = 6;

        $this->dtgPiezApta->RowActionParameterHtml = '<?= $_ITEM->Id ?>|<?= $_ITEM->GuiaId ?>';
        $this->dtgPiezApta->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgPiezAptaRow_Click'));

        $this->dtgPiezApta->UseAjax = true;

        $this->dtgPiezApta->SetDataBinder('dtgPiezApta_Bind');

        $this->dtgPiezAptaColumns();

    }

    protected function dtgPiezAptaRow_Click($strFormId, $strControlId, $strParameter) {
        //t('strParameter:'.$strParameter);
        $intGuiaIdxx = explode('|',$strParameter)[1];
        QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$intGuiaIdxx);
    }

    protected function dtgPiezApta_Bind() {
        $intDestIdxx = $this->lstDestMani->SelectedValue;
        if (!is_null($intDestIdxx)) {
            $strCadeSqlx  = "select pieza_id ";
            $strCadeSqlx .= "  from v_aptas_para_exportar ";
            $strCadeSqlx .= " where destino_id = $intDestIdxx";
            $strCadeSqlx .= "   and codigo_prod = 'EXM' ";
            $objDatabase  = GuiaPiezas::GetDatabase();
            $objDbResult  = $objDatabase->Query($strCadeSqlx);
            $arrIdxxPiez  = [];
            while ($mixRegistro = $objDbResult->FetchArray()) {
                $arrIdxxPiez[] = $mixRegistro['pieza_id'];
            }
            $arrPiezApta = GuiaPiezas::QueryArray(QQ::AndCondition(QQ::In(QQN::GuiaPiezas()->Id,$arrIdxxPiez)));
            $this->dtgPiezApta->TotalItemCount = count($arrPiezApta);
            $this->dtgPiezApta->DataSource     = GuiaPiezas::QueryArray(
                QQ::AndCondition(QQ::In(QQN::GuiaPiezas()->Id,$arrIdxxPiez)),
                QQ::Clause($this->dtgPiezApta->OrderByClause, $this->dtgPiezApta->LimitClause)
            );
        }

    }

    protected function dtgPiezAptaColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('IdPieza');
        $colIdxxPiez->Html = '<?= $_ITEM->IdPieza ?>';
        $colIdxxPiez->Width = 80;
        $this->dtgPiezApta->AddColumn($colIdxxPiez);

        $colManiGuia = new QDataGridColumn($this);
        $colManiGuia->Name = QApplication::Translate('Ubicacion');
        $colManiGuia->Html = '<?= $_ITEM->Ubicacion ?>';
        $colManiGuia->Width = 70;
        $this->dtgPiezApta->AddColumn($colManiGuia);

        $colDestGuia = new QDataGridColumn($this);
        $colDestGuia->Name = QApplication::Translate('Dest');
        $colDestGuia->Html = '<?= $_ITEM->Guia->Destino->Iata ?>';
        $colDestGuia->Width = 50;
        $this->dtgPiezApta->AddColumn($colDestGuia);

        $colPiesCubi = new QDataGridColumn($this);
        $colPiesCubi->Name = QApplication::Translate('PiesCub');
        $colPiesCubi->Html = '<?= $_ITEM->PiesCub ?>';
        $colPiesCubi->Width = 50;
        $this->dtgPiezApta->AddColumn($colPiesCubi);

        $colUltiCkpt = new QDataGridColumn($this);
        $colUltiCkpt->Name = QApplication::Translate('U.Ckpt');
        $colUltiCkpt->Html = '<?= $_ITEM->ultimoCheckpoint() ?>';
        $colUltiCkpt->Width = 30;
        $this->dtgPiezApta->AddColumn($colUltiCkpt);

    }

    protected function dtgPiezMani_Create() {
        $this->dtgPiezMani = new QDataGrid($this);
        $this->dtgPiezMani->FontSize = 12;
        $this->dtgPiezMani->ShowFilter = false;

        $this->dtgPiezMani->CssClass = 'datagrid';
        $this->dtgPiezMani->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezMani->Paginator = new QPaginator($this->dtgPiezMani);
        $this->dtgPiezMani->ItemsPerPage = 5;

        $this->dtgPiezMani->UseAjax = true;

        $this->dtgPiezMani->SetDataBinder('dtgPiezMani_Bind');

        $this->dtgPiezManiColumns();

    }

    protected function dtgPiezMani_Bind() {
        if (!is_null($this->objManifies)) {
            $arrIdxxMani = [];
            $arrPiezMani = $this->objManifies->GetGuiaPiezasAsPiezaArray();
            foreach ($arrPiezMani as $objPiezMani) {
                $arrIdxxMani[] = $objPiezMani->Id;
            }
            $this->dtgPiezMani->TotalItemCount = count($arrPiezMani);
            $this->dtgPiezMani->DataSource     = GuiaPiezas::QueryArray(
                QQ::AndCondition(QQ::In(QQN::GuiaPiezas()->Id,$arrIdxxMani)),
                QQ::Clause($this->dtgPiezMani->OrderByClause, $this->dtgPiezMani->LimitClause)
            );
        }
    }

    protected function dtgPiezManiColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('IdPieza');
        $colIdxxPiez->Html = '<?= $_ITEM->IdPieza ?>';
        $colIdxxPiez->Width = 70;
        $this->dtgPiezMani->AddColumn($colIdxxPiez);

        $colDestGuia = new QDataGridColumn($this);
        $colDestGuia->Name = QApplication::Translate('Dest');
        $colDestGuia->Html = '<?= $_ITEM->Guia->Destino->Iata ?>';
        $colDestGuia->Width = 30;
        $this->dtgPiezMani->AddColumn($colDestGuia);

        $colKiloPiez = new QDataGridColumn($this);
        $colKiloPiez->Name = QApplication::Translate('Kilos');
        $colKiloPiez->Html = '<?= $_ITEM->Kilos ?>';
        $colKiloPiez->Width = 30;
        $this->dtgPiezMani->AddColumn($colKiloPiez);

        $colVoluPiez = new QDataGridColumn($this);
        $colVoluPiez->Name = QApplication::Translate('PiesCub');
        $colVoluPiez->Html = '<?= $_ITEM->PiesCub ?>';
        $colVoluPiez->Width = 30;
        $this->dtgPiezMani->AddColumn($colVoluPiez);

        $colUltiCkpt = new QDataGridColumn($this);
        $colUltiCkpt->Name = QApplication::Translate('U.Ckpt');
        $colUltiCkpt->Html = '<?= $_ITEM->ultimoCheckpoint() ?>';
        $colUltiCkpt->Width = 30;
        $this->dtgPiezMani->AddColumn($colUltiCkpt);

    }

    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->TextMode = QTextMode::MultiLine;
        $this->txtListNume->Width = 185;
        $this->txtListNume->Rows = 11;
    }

    protected function btnRepoErro_Create() {
        $this->btnRepoErro = new QButtonD($this);
        $this->btnRepoErro->Text = TextoIcono('eye','Error(es)','F','fa-lg');
        $this->btnRepoErro->AddAction(new QClickEvent(), new QServerAction('btnRepoErro_Click'));
        $this->btnRepoErro->Visible = false;
    }

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    protected function advertirExistencia() {
        $strMensUsua = '';
        $strCaraConc = '';
        $strNumeMani = trim($this->txtNumeBlxx->Text);
        if (strlen($strNumeMani) > 0) {
            $objExisMani = Containers::LoadByNumero($strNumeMani);
            if ($objExisMani) {
                $strMensUsua  = 'Ya existe el Manifiesto: <b>'.$strNumeMani.'</b>, creado el <b>';
                $strMensUsua .= $objExisMani->Fecha->__toString('DD/MM/YYYY').'</b>.  Las piezas serán agregadas';
            }
        }
        $strPrecLate = trim($this->txtPrecLate->Text);
        if (strlen($strPrecLate) > 0) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Containers()->PrecintoLateral,$strPrecLate);
            $objExisMani   = Containers::QueryCount(QQ::AndCondition($objClauWher));
            if ($objExisMani) {
                if (strlen($strMensUsua) > 0) {
                    $strCaraConc = ' | ';
                }
                $strMensUsua .= $strCaraConc.'Precinto Lateral: <b>'.$strPrecLate.'</b>, usando previamente <b>';
            }
        }
        if (strlen($strMensUsua) > 0) {
            $this->warning($strMensUsua);
        }
    }

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = "/armar_manif_exp_mar.php/";
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }


    protected function lstDestMani_Change() {
        if (!is_null($this->lstDestMani->SelectedValue)) {
            $this->dtgPiezApta->Refresh();
        }
    }


    protected function Form_Validate()
    {
        if (is_null($this->lstDestMani->SelectedValue)) {
            $this->danger('Debe seleccionar un Destino');
            return false;
        }
        if ( (strlen($this->txtNumeBlxx->Text) == 0) && (strlen($this->txtNumeBook->Text) == 0) ) {
            $this->danger('Debe especificar un Nro de BL o al menos un Nro de Booking');
            return false;
        }
        if (is_null($this->calFechDesp)) {
            $this->danger('Debe especificar la Fecha de Despacho');
            return false;
        }
        if (!$this->blnEditMode) {
            if (strlen($this->txtListNume->Text) == 0) {
                $this->danger('Debe especificar al menos una Pieza a Manifestar');
                return false;
            }
        }
        return true;
    }

    //protected function procesarValija($strNumeSeri, $objCheckpoint, $objContenedor) {
    //    //---------------------------------------------------
    //    // Si no es una Pieza, se chequea que sea una Valija
    //    //---------------------------------------------------
    //    $objValija = Containers::LoadByNumero($strNumeSeri);
    //    if ($objValija) {
    //        if (!$objValija->IsContainersAsContainerContainerAssociated($objContenedor)) {
    //            //-----------------------------------------------
    //            // Se establece la relación "contenedor-valija"
    //            //-----------------------------------------------
    //            $objValija->AssociateContainersAsContainerContainer($objContenedor);
    //            //---------------------------------------------
    //            // Se registra un checkpoint para la Valija
    //            //---------------------------------------------
    //            $arrDatoCkpt = array();
    //            $arrDatoCkpt['NumeCont'] = $objContenedor->Id;
    //            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
    //            $arrDatoCkpt['TextObse'] = $objCheckpoint->Descripcion;
    //            $arrResuGrab = GrabarCheckpointContenedorNew($arrDatoCkpt);
    //            if ($arrResuGrab['TodoOkey']) {
    //                $intContVali ++;
    //            } else {
    //                $this->arrGuiaErro[] = array($objValija->Numero,$arrResuGrab['MotiNook']);
    //            }
    //        }
    //        $arrPiezVali = $objValija->GetGuiaPiezasAsContainerPiezaArray();
    //        $strDescCkpt  = $objCheckpoint->Descripcion.' | Precinto: '.$objContenedor->Numero.' | ';
    //        $strDescCkpt .= 'Transpor: '.$objContenedor->Transportista->Nombre.' | ';
    //        $strDescCkpt .= 'Chofer: '.$objContenedor->Chofer->__toString();
    //        foreach ($arrPiezVali as $objPiezVali) {
    //            //----------------------------------------------------------
    //            // Se registra un checkpoint para cada pieza de la Valija
    //            //----------------------------------------------------------
    //            $arrDatoCkpt = array();
    //            $arrDatoCkpt['NumePiez'] = $objPiezVali->Id;
    //            $arrDatoCkpt['GuiaAnul'] = $objPiezVali->Guia->Anulada();
    //            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
    //            $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
    //            $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
    //            $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
    //            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
    //            if ($arrResuGrab['TodoOkey']) {
    //                $intContCkpt ++;
    //            } else {
    //                $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,$arrResuGrab['MotiNook']);
    //            }
    //            $intContGuia ++;
    //        }
    //        $intContVali ++;
    //    } else {
    //        $this->txtListNume->Text .= $strNumeSeri." (E)".chr(13);
    //        $this->arrGuiaErro[] = array($strNumeSeri,$strNumeSeri." (No Existe Guia/Valija)");
    //    }
    //}

    protected function btnSave_Click() {
        t('===============================');
        t('Comenzando Exportacion Maritima');

        $strAcciProg = $this->blnEditMode ? 'Editando' : 'Creando';
        $strNombProc = $strAcciProg.' Manif Exp MAR: '.$this->txtNumeBook->Text;
        $this->objProcEjec = CrearProceso($strNombProc);

        $objCheckpoint = Checkpoints::LoadByCodigo('EX');
        t('El ckpt es: '.$objCheckpoint->Codigo);
        if (!($objCheckpoint instanceof Checkpoints)) {
            $strTextMens = 'El checkpoint de exportacion no existe';
            t($strTextMens);
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'EX';
            $arrParaErro['MensErro'] = 'EL CCKPT NO EXISTE';
            $arrParaErro['ComeErro'] = $strTextMens;
            GrabarError($arrParaErro);
            $this->danger($strTextMens);
            return;
        }

        if (!$this->blnEditMode) {
            t('Creando el manifiesto');
            $strNumeBlxx = trim($this->txtNumeBlxx->Text);
            if (strlen($strNumeBlxx) > 0) {
                t('El Nro de BL existe');
                $objClauWher = QQ::Equal(QQN::ManifiestoExp()->NroBl,$strNumeBlxx);
            } else {
                t('El Booking existe');
                $strNumeBook = trim($this->txtNumeBook->Text);
                $objClauWher = QQ::Equal(QQN::ManifiestoExp()->Booking,$strNumeBook);
            }
            $objContenedor = ManifiestoExp::QuerySingle(QQ::AndCondition($objClauWher));
        } else {
            t('Actualizando el manifiesto');
            $objContenedor = $this->objManifies;
        }

        try {
            if (!$objContenedor) {
                t('Manifiesto nuevo');
                $objContenedor = new ManifiestoExp();
                $objContenedor->DestinoId     = $this->lstDestMani->SelectedValue;
                $objContenedor->FechaCreacion = new QDateTime(QDateTime::Now());
                $objContenedor->CreatedBy     = $this->objUsuario->CodiUsua;
                $objContenedor->Piezas        = 0;
                $objContenedor->Kilos         = 0;
                $objContenedor->Libras        = 0;
                $objContenedor->PiesCub       = 0;
                $objContenedor->Volumen       = 0;
                $objContenedor->Valor         = 0;
            }
            $objContenedor->FechaDespacho = new QDateTime($this->calFechDesp->DateTime);
            $objContenedor->NroBl         = $this->txtNumeBlxx->Text;
            $objContenedor->Booking       = $this->txtNumeBook->Text;
            $objContenedor->Save();
            t('Manifiesto Exp MAR salvado en la BD');
        } catch (Exception $e) {
            t('Error creando Manifiesto Exp MAR: '.$e->getMessage());
            $this->danger($e->getMessage());
            return;
        }

        if (strlen($this->txtListNume->Text) == 0) {
            $this->info('Se actualizo el Manifiesto | No se proceso ninguna Pieza');
            return;
        }

        $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
        //---------------------------------------------------------------------------
        // Con array_unique se eliminan las piezas repetidas en caso de que las haya
        //---------------------------------------------------------------------------
        $this->arrListNume = LimpiarArreglo($this->arrListNume,false);
        $this->arrListNume = array_map('transformar',$this->arrListNume);
        $this->txtListNume->Text = '';

        $intContCkpt = 0;
        $objDatabase = ManifiestoExp::GetDatabase();
        $objDatabase->TransactionBegin();
        //--------------------------------------------
        // Se procesa una a una las Piezas o Valijas
        //--------------------------------------------
        foreach ($this->arrListNume as $strNumeSeri) {
            t('Procesando: '.$strNumeSeri);
            $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strNumeSeri);
            if (!$objGuiaPiez) {
                t('La pieza no existe en la base de datos: '.$strNumeSeri);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = 'LA PIEZA NO EXISTE';
                $arrParaErro['ComeErro'] = 'CHEQUEANDO LA EXISTENCIA DE LA PIEZA';
                GrabarError($arrParaErro);
                continue;
            }
            t('La pieza existe');
            $arrSepuProc = $objGuiaPiez->Guia->SePuedeProcesar();
            if (!$arrSepuProc['TodoOkey']) {
                t('La guia no se puede procesar: '.$arrSepuProc['MensUsua']);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = $arrSepuProc['MensUsua'];
                $arrParaErro['ComeErro'] = 'VERIFICANDO QUE LA GUIA SE PUEDA PROCESAR';
                GrabarError($arrParaErro);
                continue;
            }
            //--------------------------------------------------------------------------------
            // Antes de asociar la Guia al Manifiesto, se debe verificar que el destino
            // de la Guia, coincida con algunos de los Destinos de la Operacion seleccionada
            //---------------------------------------------------------------------------------
            if ($objContenedor->IsGuiaPiezasAsPiezaAssociated($objGuiaPiez)) {
                t('La pieza ya estaba asociada al Manifiesto');
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = 'PREVIAMENTE ASOCIADA AL MANIFIESTO';
                $arrParaErro['ComeErro'] = 'ASOCIANDO LA PIEZA AL MANIFIESTO';
                GrabarError($arrParaErro);
                continue;
            }
            t('La pieza no estaba asociada');
            //---------------------------------------------
            // Se establece la relacion "contenedor-guia"
            //---------------------------------------------
            $objContenedor->AssociateGuiaPiezasAsPieza($objGuiaPiez);
            t('Ya asocie la pieza');
            //---------------------------------------------
            // Se registra el checkpoint correspondiente
            //---------------------------------------------
            $strDescCkpt  = $objCheckpoint->Descripcion.' | BOOKING: '.$objContenedor->Booking;
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
            $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
            $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
            $arrDatoCkpt['CodiRuta'] = null;
            $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            if ($arrResuGrab['TodoOkey']) {
                t('Se grabo el checkpoint a la pieza');
                $intContCkpt ++;
            } else {
                t('Hubo algun error: '.$arrResuGrab['MotiNook']);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                $arrParaErro['ComeErro'] = 'GRABANDO CHECKPOINT DE EXPORTACION';
                GrabarError($arrParaErro);
            }
        }
        $this->dtgPiezMani->Refresh();
        $this->dtgPiezApta->Refresh();
        t('Termine de procesar la piezas');
        $objContenedor->actualizarTotales();
        $this->txtCantPiez->Text = $objContenedor->Piezas;
        $this->txtCantVolu->Text = $objContenedor->Volumen;
        $this->txtCantPies->Text = $objContenedor->PiesCub;
        t('Se actualizaron los totales en el manifiesto');
        $objDatabase->TransactionCommit();
        $intCantErro = DetalleError::CountByProcesoId($this->objProcEjec->Id);
        $strMensUsua = sprintf('Piezas-Checkpoints (%s) | Errores (%s)',
            $intContCkpt,$intCantErro);
        if ($intCantErro == 0) {
            $this->success($strMensUsua);
        } else {
            $this->warning($strMensUsua);
            $this->btnRepoErro->Visible = true;
        }

        $this->objManifies = $objContenedor;
        $this->blnEditMode = true;
        $this->btnRepoMani->Visible = true;
        $this->opcionesDeImpresion();
    }

}
ArmarManifExpMar::Run('ArmarManifExpMar');
?>