<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class ArmarManifExp extends FormularioBaseKaizen {
    protected $lstDestMani;  
    protected $lstLineAere;
    protected $lstMastAwbx;
    protected $txtNumeVuel;
    protected $calFechDesp;
    protected $calFechCrea;
    protected $txtCantPiez;
    protected $txtCantKilo;
    protected $txtCantVolu;
    protected $txtCantPies;

    protected $txtListNume;  // Lista de Seriales/Guias/Valijas
    protected $txtNumeAwbx;  // Guia Aerea
    protected $dtgPiezApta;  // Piezas aptas para el Manifiesto
    protected $dtgPiezMani;  // Piezas del Manifiesto

    protected $arrListNume;  // Arreglo que contiene los numeros de la lista
    protected $objDataBase;
    protected $arrGuiaErro;  // Arreglo de errores surgidos durante el proceso
    protected $arrGuiaReto;  // Arreglo de Guias de Retorno
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

        $this->lblTituForm->Text = 'Armar Manifiesto Exp';

        $this->dlgMensUsua_Create();

        $this->lstDestMani_Create();
        $this->lstLineAere_Create();
        $this->lstMastAwbx_Create();

        $this->txtNumeAwbx_Create();
        $this->txtNumeVuel_Create();
        $this->calFechCrea_Create();
        $this->calFechDesp_Create();
        $this->txtCantPiez_Create();
        $this->txtCantKilo_Create();
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
        $this->txtCantKilo = disableControl($this->txtCantKilo);
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
        $objCkptRuta  = Checkpoints::LoadByCodigo('TR');
        if ($objCkptRuta instanceof Checkpoints) {
            $intCkptRuta  = $objCkptRuta->Id;
            $arrPiezRuta  = $this->objManifies->GetPiezasConCheckpoint('TR','Id');
            $strIdxxRuta  = implode(',',$arrPiezRuta);
            //t('Las piezas de la ruta son: '.$strIdxxRuta);
            $objDatabase  = Containers::GetDatabase();
            $strCadeSqlx  = 'delete ';
            $strCadeSqlx .= '  from pieza_checkpoints ';
            $strCadeSqlx .= ' where pieza_id in ('.$strIdxxRuta.')';
            $strCadeSqlx .= '   and checkpoint_id = '.$intCkptRuta;
            //t('SQL: '.$strCadeSqlx);
            try {
                $objDatabase->NonQuery($strCadeSqlx);
                //t('Checkpoints de Ruta eliminado');
                $this->objManifies->Delete();
                $this->objManifies->logDeCambios('Borrado');
                QApplication::Redirect(__SIST__.'/containers_list.php');
            } catch (Exception $e) {
                $this->danger($e->getMessage());
            }
        } else {
            $this->danger('No existe el Checkpoint de Ruta | Comuniquese con el Administrador del Sistema');
        }
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgPiezMani);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = TextoIcono('download','XLS','F','lg');
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->ToolTip = 'Exportar las Piezas del Manifiesto';
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
                __SIST__.'/manifiesto_de_carga_pdf.php/'.$this->objManifies->Id,
                TextoIcono('list','Manfiesto de Carga')
            );
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/nota_de_despacho_pdf.php/'.$this->objManifies->Id,
                TextoIcono('bank','Nota de Despacho')
            );
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
        $this->lstDestMani->Required = true;
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
        //$this->lstDestMani->AddAction(new QChangeEvent(), new QAjaxAction('lstDestMani_Change'));
    }


    protected function lstLineAere_Create() {
        $this->lstLineAere = new QListBox($this);
        $this->lstLineAere->Required = true;
        $this->lstLineAere->Width = 160;
        $objClauWher = QQ::Equal(QQN::LineaAerea()->Activa,SinoType::SI);
        $objClauOrde = QQ::OrderBy(QQN::LineaAerea()->Nombre);
        $arrLineAere = LineaAerea::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantLine = count($arrLineAere);
        $this->lstLineAere->AddItem("- Seleccione Una - ($intCantLine.)",null);
        foreach ($arrLineAere as $objLineAere) {
            $blnSeleRegi = false;
            if ($this->blnEditMode) {
                $blnSeleRegi = $this->objManifies->LineaAereaId == $objLineAere->Id;
            } else {
                if ($intCantLine == 1) {
                    $blnSeleRegi = true;
                }
            }
            $this->lstLineAere->AddItem($objLineAere->__toString(),$objLineAere->Id, $blnSeleRegi);
        }
    }

    protected function lstMastAwbx_Create() {
        $this->lstMastAwbx = new QListBox($this);
        $this->lstMastAwbx->Required = true;
        $this->lstMastAwbx->Width = 160;
        $objClauWher = QQ::Equal(QQN::MasterAwb()->Usada,SinoType::NO);
        $objClauOrde = QQ::OrderBy(QQN::MasterAwb()->Numero);
        $arrMastAwbx = MasterAwb::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantLine = count($arrMastAwbx);
        $this->lstMastAwbx->AddItem('- Seleccione Una - ('.$intCantLine.')',null);
        foreach ($arrMastAwbx as $objMastAwbx) {
            $blnSeleRegi = false;
            if ($this->blnEditMode) {
                $blnSeleRegi = $this->objManifies->MasterAwbId == $objMastAwbx->Id;
            }
            $this->lstMastAwbx->AddItem($objMastAwbx->__toString(),$objMastAwbx->Id, $blnSeleRegi);
        }
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
            $this->calFechDesp->DateTime = $this->objManifies->Fecha;
        }
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QTextBox($this);
        $this->txtCantPiez->Width = 160;
        if ($this->blnEditMode) {
            $this->txtCantPiez->Text  = $this->objManifies->Piezas;
        }
    }

    protected function txtCantKilo_Create() {
        $this->txtCantKilo = new QTextBox($this);
        $this->txtCantKilo->Width = 160;
        if ($this->blnEditMode) {
            $this->txtCantKilo->Text  = $this->objManifies->Kilos;
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
            $strCadeSqlx  = "select id ";
            $strCadeSqlx .= "  from v_aptas_para_exportar ";
            $strCadeSqlx .= " where destino_id = $intDestIdxx";
            $strCadeSqlx .= "   and tipo_export = $intDestIdxx";
            $objDatabase  = GuiaPiezas::GetDatabase();
            $objDbResult  = $objDatabase->Query($strCadeSqlx);
            $arrIdxxPiez  = [];
            while ($mixRegistro = $objDbResult->FetchArray()) {
                $arrIdxxPiez[] = $mixRegistro['id'];
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

        $colManiGuia = new QDataGridColumn($this);
        $colManiGuia->Name = QApplication::Translate('Manif.');
        $colManiGuia->Html = '<?= $_ITEM->Guia->NotaEntrega->Referencia ?>';
        $colManiGuia->Width = 95;
        $this->dtgPiezApta->AddColumn($colManiGuia);

        $colDestGuia = new QDataGridColumn($this);
        $colDestGuia->Name = QApplication::Translate('Dest');
        $colDestGuia->Html = '<?= $_ITEM->Guia->Destino->Iata ?>';
        $colDestGuia->Width = 50;
        $this->dtgPiezApta->AddColumn($colDestGuia);

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
            $arrPiezMani = $this->objManifies->GetGuiaPiezasAsContainerPiezaArray();
            foreach ($arrPiezMani as $objPiezMani) {
                $arrIdxxMani[] = $objPiezMani->Id;
            }
            $this->dtgPiezMani->TotalItemCount = $this->objManifies->CountGuiaPiezasesAsContainerPieza();
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

        $colManiGuia = new QDataGridColumn($this);
        $colManiGuia->Name = QApplication::Translate('Manif.');
        $colManiGuia->Html = '<?= $_ITEM->Guia->NotaEntrega->Referencia ?>';
        $colManiGuia->Width = 95;
        $this->dtgPiezMani->AddColumn($colManiGuia);

        $colServImpo = new QDataGridColumn($this);
        $colServImpo->Name = QApplication::Translate('S.Impor.');
        $colServImpo->Html = '<?= $_ITEM->Guia->ServicioImportacion ?>';
        $colServImpo->Width = 30;
        $this->dtgPiezMani->AddColumn($colServImpo);

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


    protected function txtNumeAwbx_Create() {
        $this->txtNumeAwbx = new QTextBox($this);
        $this->txtNumeAwbx->Required = true;
        $this->txtNumeAwbx->Width = 160;
        if ($this->blnEditMode) {
            $this->txtNumeAwbx->Text = $this->objManifies->Awb;
        }
        $this->txtNumeAwbx->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");

    }

    protected function txtNumeVuel_Create() {
        $this->txtNumeVuel = new QTextBox($this);
        $this->txtNumeVuel->Required = true;
        if ($this->blnEditMode) {
            $this->txtNumeVuel->Text = $this->objManifies->Vuelo;
        }
        $this->txtNumeVuel->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->TextMode = QTextMode::MultiLine;
        $this->txtListNume->Required = true;
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

    protected function mostrarDatos() {
        if (!is_null($this->lstDestMani->SelectedValue)) {
            $intOperSele = $this->lstDestMani->SelectedValue;
            $objOperSele = SdeOperacion::Load($intOperSele);
            if ($objOperSele) {
                //---------------------------------------------------------------------------
                // Se muestran en pantalla, el Chofer y el Vehiculo asociado a la Operacion
                //---------------------------------------------------------------------------
                $this->intChofSele       = $objOperSele->CodiChof;
                $this->txtNombChof->Text = $objOperSele->CodiChofObject->__toString();
                $this->txtCeduChof->Text = $objOperSele->CodiChofObject->NumeCedu;

                $this->intVehiSele       = $objOperSele->CodiVehi;
                $this->txtDescVehi->Text = $objOperSele->CodiVehiObject->DescVehi;
                $this->txtPlacVehi->Text = $objOperSele->CodiVehiObject->NumePlac;
            }
        }

    }

    protected function advertirExistencia() {
        $strMensUsua = '';
        $strCaraConc = '';
        $strNumeMani = trim($this->txtNumeVuel->Text);
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

    protected function btnRegiVehi_Click(){
        //------------------------
        // Se validan los datos
        //------------------------
        $this->mensaje();
        $intNuevTipo = $this->lstNuevTipo->SelectedValue;
        $strNuevPlac = trim(limpiarCadena($this->txtNuevPlac->Text));
        $strNuevDesc = trim(limpiarCadena($this->txtNuevDesc->Text));
        if (is_null($intNuevTipo)) {
            $this->danger('El Tipo de Vehiculo, es requerido');
            return;
        }
        if (strlen($strNuevPlac) <= 5) {
            $this->danger('La Placa debe tener al menos 6 caracteres');
            return;
        }
        if (strlen($strNuevDesc) <= 5) {
            $this->danger('La Descripción del Vehiculo es muy corta');
            return;
        }
        //------------------------------------------------
        // Se verifica la existencia previa del vehiculo
        //------------------------------------------------
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Vehiculo()->NumePlac,$strNuevPlac);
        $objNuevVehi   = Vehiculo::QuerySingle(QQ::AndCondition($objClauWher));
        if (!$objNuevVehi) {
            //----------------------------------------------
            // Se crea el nuevo chofer en la base de datos
            //----------------------------------------------
            $objNuevVehi             = new Vehiculo();
            $objNuevVehi->DescVehi   = $strNuevDesc;
            $objNuevVehi->NumePlac   = $strNuevPlac;
            $objNuevVehi->TipoVehi   = $intNuevTipo;
            $objNuevVehi->SucursalId = $this->objUsuario->SucursalId;
            $objNuevVehi->CodiDisp   = SinoType::SI;
            $objNuevVehi->CodiStat   = StatusType::ACTIVO;
            $objNuevVehi->Save();
            //---------------------------------------------
            // Se deja rastro de la transaccion realizada
            //---------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Vehiculo';
            $arrLogxCamb['intRefeRegi'] = $objNuevVehi->CodiVehi;
            $arrLogxCamb['strNombRegi'] = $objNuevVehi->DescVehi;
            $arrLogxCamb['strDescCamb'] = 'Creado dinamicamente, desde Sacar a Ruta';
            LogDeCambios($arrLogxCamb);
            $this->success('Vehículo creado Exitosamente !');
            $this->lstNuevTipo->SelectedIndex = 0;
            $this->txtNuevPlac->Text = '';
            $this->txtNuevDesc->Text = '';
        } else {
            //----------------------------------------------------------------------------------------
            // Si el Vehiculo ya existe y esta inactivo o no disponible, se cambian esas condiciones
            //----------------------------------------------------------------------------------------
            $objNuevVehi->CodiStat = StatusType::ACTIVO;
            $objNuevVehi->CodiDisp = SinoType::SI;
            $objNuevVehi->Save();
            $this->warning('El Vehículo ya Existía !!!');
        }
        //----------------------------------------------------
        // El vehiculo recién creado se asigna la Manifiesto
        //----------------------------------------------------
        $this->txtDescVehi->Text = $objNuevVehi->TipoVehiObject->DescTipo;
        $this->txtPlacVehi->Text = $strNuevPlac;
        //------------------------------------
        // Se actualiza la lista de Vehiculos
        //------------------------------------
        $this->dtgVehiSucu->Refresh();
    }

    protected function btnRegiChof_Click(){
        //------------------------
        // Se validan los datos
        //------------------------
        $this->mensaje();
        $strNuevChof = trim(limpiarCadena($this->txtNuevChof->Text));
        $arrNombApel = explode(' ',$strNuevChof);
        if ( (count($arrNombApel) != 2) || (strlen($strNuevChof) <= 4)) {
            $this->danger('Especifique 1er Nombre y 1er Apellido del Chofer');
            return;
        }
        $strNombChof = $arrNombApel[0];
        $strApelChof = $arrNombApel[1];
        $strNuevCedu = trim(DejarSoloLosNumeros($this->txtNuevCedu->Text));
        if (strlen($strNuevCedu) <= 6) {
            $this->danger('La Cédula del nuevo Chofer, es muy corta');
            return;
        }
        //----------------------------------------------
        // Se verifica la existencia previa del chofer
        //----------------------------------------------
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Chofer()->NumeCedu,$strNuevCedu);
        $objCeduExis   = Chofer::QuerySingle(QQ::AndCondition($objClauWher));
        if (!$objCeduExis) {
            //----------------------------------------------
            // Se crea el nuevo chofer en la base de datos
            //----------------------------------------------

            $objNuevChof             = new Chofer();
            $objNuevChof->Nombre     = $strNuevChof;
            $objNuevChof->NumeCedu   = $strNuevCedu;
            $objNuevChof->SucursalId = $this->objUsuario->SucursalId;
            $objNuevChof->CodiDisp   = SinoType::SI;
            $objNuevChof->CodiStat   = StatusType::ACTIVO;
            $objNuevChof->TipoMens   = MasTipoMensType::FIJO;
            $objNuevChof->TipoMens   = MasTipoMensType::FIJO;
            $objNuevChof->Login      = Chofer::LoginPropuesto($strNombChof, $strApelChof);
            $objNuevChof->Password   = md5('muyfacil');
            $objNuevChof->Save();
            $this->intChofSele       = $objNuevChof->CodiChof;
            //---------------------------------------------
            // Se deja rastro de la transaccion realizada
            //---------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Chofer';
            $arrLogxCamb['intRefeRegi'] = $objNuevChof->CodiChof;
            $arrLogxCamb['strNombRegi'] = $objNuevChof->Nombre;
            $arrLogxCamb['strDescCamb'] = 'Creado dinamicamente, desde Sacar a Ruta';
            LogDeCambios($arrLogxCamb);
            $this->success('Chofer creado Exitosamente !!! | Login Mobile: <b>'.$objNuevChof->Login.'</b> | Clave: <b>muyfacil</b>');
        } else {
            //--------------------------------------------------------------------------------
            // Si Chofer existe y esta inactivo o no disponible, se cambian esas condiciones
            //--------------------------------------------------------------------------------
            $objCeduExis->CodiStat = StatusType::ACTIVO;
            $objCeduExis->CodiDisp = SinoType::SI;
            $objCeduExis->Save();
            $this->intChofSele     = $objCeduExis->CodiChof;
            $this->warning('El Chofer ya Existía !!!');
        }
        $this->txtNuevChof->Text = '';
        $this->txtNuevCedu->Text = '';
        //---------------------------------------------------
        // El chofer recién creado se asigna la Manifiesto
        //---------------------------------------------------
        $this->txtNombChof->Text = $strNuevChof;
        $this->txtCeduChof->Text = $strNuevCedu;
        //------------------------------------
        // Se actualiza la lista de Choferes
        //------------------------------------
        $this->dtgChofSucu->Refresh();
    }


    protected function btnRepoErro_Click($strFormId, $strControlId, $strParameter) {
        //--------------------------------------------------
        // Datos necesarios para imprimir reporte PDF
        //--------------------------------------------------
        $_SESSION['Dato'] = serialize($this->arrGuiaErro);
        QApplication::Redirect(__SIST__.'/mostrar_errores.php');
    }


    protected function lstDestMani_Change() {
        $this->lstDestMani->RemoveAllItems();
        if (!is_null($this->lstDestMani->SelectedValue)) {
            $intCodiSucu   = $this->objUsuario->SucursalId;
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::OrderBy(QQN::SdeOperacion()->RutaId);
            $intCodiTipo   = $this->lstDestMani->SelectedValue;
            $arrSdexOper   = SdeOperacion::LoadArrayByCodiTipoSucursalId($intCodiTipo,$intCodiSucu,$objClausula);
            $intCantOper   = count($arrSdexOper);
            $this->lstDestMani->AddItem('- Seleccione Uno - ('.$intCantOper.')',null);
            foreach ($arrSdexOper as $objOperacion) {
                $blnSeleRegi = false;
                if ($this->blnEditMode) {
                    $blnSeleRegi = $this->objManifies->OperacionId == $objOperacion->CodiOper;
                }
                $this->lstDestMani->AddItem(substr($objOperacion->__toString(),0,50),$objOperacion->CodiOper, $blnSeleRegi);
                if ($blnSeleRegi) {
                    $this->mostrarDatos();
                }
            }
        }
        if ($this->lstDestMani->SelectedValue == 0) {
            //-----------------------------------
            // Ruta Urbana
            //-----------------------------------
            $this->txtNumeVuel->Enabled = false;
            $this->txtNumeVuel->ForeColor = 'blue';
        } else {
            //-----------------------------------
            // Ruta Extra-Urbana
            //-----------------------------------
            $this->txtNumeVuel->Enabled = true;
            $this->txtNumeVuel->ForeColor = 'black';
        }
    }


    protected function mensajeInicial() {
        $strTextMens  = 'Los <b>Choferes</b> están ordenados alfebéticamente y los <b>Vehículos</b> por placa. ';
        $strTextMens .= 'Utilice "<b>Anterior</b>" o "<b>Siguiente</b>", hasta encontrar lo deseado ';
        $this->mensaje($strTextMens,'','i','',__iINFO__);
    }

    protected function inicializarPantalla() {
        $this->lstDestMani->SelectedIndex = 0;
        $this->txtNumeVuel->Text = '';
        $this->txtListNume->Text = '';
        $this->deshabilitarBotonSalvar();
    }

    protected function deshabilitarBotonSalvar() {
        $this->btnSave->Enabled = false;
        $this->btnSave->ForeColor = 'gray';
    }

    protected function habilitarBotonSalvar() {
        $this->btnSave->Enabled = true;
        $this->btnSave->ForeColor = 'white';
    }

    protected function validarChoferVehiculo() {
        //---------------------------------------------
        // Se validan los nuevos datos del Chofer
        //---------------------------------------------
        $this->mensaje();
        if (strlen(trim($this->txtNombChof->Text)) == 0) {
            $this->danger('Debe seleccionar un Chofer de la lista');
            return false;
        }
        if (strlen(trim($this->txtCeduChof->Text)) == 0) {
            $this->danger('La cédula del Chofer es requerida');
            return false;
        }
        if (strlen(trim($this->txtDescVehi->Text)) == 0) {
            $this->danger('Debe seleccionar un Vehículo de la lista');
            return false;
        }
        if (strlen(trim($this->txtPlacVehi->Text)) == 0) {
            $this->danger('La Placa del Vehículo es requerida');
            return false;
        }
        //----------------------------------------------------------------------------------------
        // Si la cedula del chofer o la placa del vehículo, fueron editados, se guardan en la BD
        //----------------------------------------------------------------------------------------
        if ($this->txtCeduChof->Enabled) {
            $objChofSele = Chofer::Load($this->intChofSele);
            if ($objChofSele) {
                $objChofSele->NumeCedu = $this->txtCeduChof->Text;
                $objChofSele->Save();
                //---------------------------------------------
                // Se deja rastro de la transaccion realizada
                //---------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Chofer';
                $arrLogxCamb['intRefeRegi'] = $objChofSele->CodiChof;
                $arrLogxCamb['strNombRegi'] = $objChofSele->Nombre;
                $arrLogxCamb['strDescCamb'] = 'Nueva Cedula: '.$this->txtCeduChof->Text;
                LogDeCambios($arrLogxCamb);
                $this->txtCeduChof->Enabled = false;
                $this->dtgChofSucu->Refresh();
            }
        }
        if ($this->txtPlacVehi->Enabled) {
            $objVehiSele = Vehiculo::Load($this->intVehiSele);
            if ($objVehiSele) {
                $objVehiSele->NumePlac = $this->txtPlacVehi->Text;
                $objVehiSele->Save();
                //---------------------------------------------
                // Se deja rastro de la transaccion realizada
                //---------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Vehiculo';
                $arrLogxCamb['intRefeRegi'] = $objVehiSele->CodiVehi;
                $arrLogxCamb['strNombRegi'] = $objVehiSele->DescVehi;
                $arrLogxCamb['strDescCamb'] = 'Nueva Placa: '.$this->txtPlacVehi->Text;
                LogDeCambios($arrLogxCamb);
                $this->txtPlacVehi->Enabled = false;
                $this->dtgVehiSucu->Refresh();
            }
        }
        return true;
    }

    protected function Form_Validate()
    {
        if (is_null($this->lstDestMani->SelectedValue)) {
            $this->danger('Debe seleccionar un Tipo de Ruta/Operacion');
            return false;
        }
        if (strlen($this->txtNumeAwbx->Text) == 0) {
            $this->danger('Debe especificar un Nro de BL o AWB');
            return false;
        }
        if (is_null($this->lstDestMani->SelectedValue)) {
            $this->danger('Debe especificar una Operacion');
            return false;
        }
        if (is_null($this->lstLineAere->SelectedValue)) {
            $this->danger('Debe seleccionar un Transportista');
            return false;
        }
        if (strlen($this->txtNumeVuel->Text) == 0) {
            $this->danger('Debe especificar el Precinto Trasero');
            return false;
        }
        if (strlen($this->txtDireEntr->Text) == 0) {
            $this->danger('Debe especificar la Direccion de Entrega');
            return false;
        }
        if (strlen($this->txtDescCont->Text) == 0) {
            $this->danger('Debe especificar la Descripción del Contenido');
            return false;
        }
        if (!$this->blnEditMode) {
            if (strlen($this->txtListNume->Text) == 0) {
                $this->danger('Debe especificar al menos una Guia/Pieza a Manifestar');
                return false;
            }
        }
        return true;
    }

    protected function btnSave_Click() {
        t('==========================');
        t('Comenzando el Sacar a Ruta');
        $this->objDataBase = QApplication::$Database[1];
        $strTipoRuta = $this->lstDestMani->SelectedValue == 0 ? "URBANA" : "EXTRA-URBANA";
        //------------------------------------------------------
        // Se graba o actualiza el contenedor en la tabla guia
        //------------------------------------------------------
        if ($strTipoRuta == "URBANA") {
            //---------------------------------------------------------------
            // Si la Ruta es "Urbana" y no se ha especificado un Contenedor
            // o Número de Valija el Sistema debe asignar un número.
            //---------------------------------------------------------------
            $this->txtNumeVuel->Text = date('YmdHis');
        }
        if (!$this->blnEditMode) {
            $objContenedor = Containers::LoadByNumero($this->txtNumeVuel->Text);
        } else {
            $objContenedor = $this->objManifies;
        }
        try {
            if (!$objContenedor) {
                $objContenedor = new Containers();
                $objContenedor->Hora         = date("H:i");
                $objContenedor->CreatedBy    = $this->objUsuario->CodiUsua;
                $objContenedor->Estatus      = 'ABIERT@';
                $objContenedor->Tipo         = 'MASTER';
                $objContenedor->Kilos        = 0;
                $objContenedor->PiesCub      = 0;
                $objContenedor->Peso         = 0;
                $objContenedor->Devueltas    = 0;
                $objContenedor->SinGestionar = 0;
            }
            $objContenedor->Fecha           = new QDateTime($this->calFechDesp->DateTime);
            $objContenedor->Numero          = $this->txtNumeVuel->Text;
            $objContenedor->PrecintoLateral = $this->txtPrecLate->Text;
            $objContenedor->Awb             = $this->txtNumeAwbx->Text;
            $objContenedor->OperacionId     = $this->lstDestMani->SelectedValue;
            $objContenedor->ChoferId        = $this->intChofSele;
            $objContenedor->Vehiculo        = $this->txtDescVehi->Text;
            $objContenedor->Placa           = $this->txtPlacVehi->Text;
            $objContenedor->TransportistaId = $this->lstLineAere->SelectedValue;
            $objContenedor->Contenido       = $this->txtDescCont->Text;
            $objContenedor->Direccion       = $this->txtDireEntr->Text;
            $objContenedor->Save();
            t('Contenedor salvado en la BD');
        } catch (Exception $e) {
            t('Error creando Container: '.$e->getMessage());
            $this->danger($e->getMessage());
            return;
        }

        if (strlen($this->txtListNume->Text) > 0) {
            if ($strTipoRuta == "URBANA") {
                $objCheckpoint = Checkpoints::LoadByCodigo('ER');
            } else {
                $objCheckpoint = Checkpoints::LoadByCodigo('TR');
            }
            t('El ckpt es: '.$objCheckpoint->Codigo);
            $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
            //---------------------------------------------------------------------------
            // Con array_unique se eliminan las guias repetidas en caso de que las haya
            //---------------------------------------------------------------------------
            $this->arrListNume = array_unique($this->arrListNume,SORT_STRING);
            $this->arrListNume = array_map('transformar',$this->arrListNume);
            $this->txtListNume->Text = '';

            $arrDestinos = $objContenedor->GetDestinos();
            t('El contenedor tiene: '.count($arrDestinos).' destinos');
            $intCodiRuta = $objContenedor->Operacion->RutaId;
            $intContVali = 0;
            $intContGuia = 0;
            $intContCkpt = 0;
            $this->arrGuiaErro = array();
            $this->arrGuiaReto = array();
            $objDatabase = Containers::GetDatabase();
            $objDatabase->TransactionBegin();
            foreach ($this->arrListNume as $strNumeSeri) {
                if (strlen(trim($strNumeSeri))) {
                    t('Procesando: '.$strNumeSeri);
                    //-----------------------------------------------------------------------
                    // Se procesa una a una las Guias/Valijas proporcionadas por el Usuario
                    //-----------------------------------------------------------------------
                    $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strNumeSeri);
                    if ($objGuiaPiez) {
                        t('La pieza existe');
                        $arrSepuProc = $objGuiaPiez->Guia->SePuedeProcesar();
                        if ($arrSepuProc['TodoOkey']) {
                            t('La guia se puede procesar');
                            if ($strTipoRuta == 'EXTRA-URBANA') {
                                $blnTienPeso = true;
                                //----------------------------------------------------------------
                                // A solicitud de Jhoan Martinez se quita del sistema la
                                // validacion del peso.  Caso expresado por la mercancia que
                                // transporta ATC que no se le debe cobrar
                                // (ddurand 11/08/2021)
                                //----------------------------------------------------------------
                                //if ($objGuiaPiez->Guia->ServicioImportacion == 'MAR') {
                                //    if ($objGuiaPiez->PiesCub == 0) {
                                //        $blnTienPeso = false;
                                //    }
                                //} else {
                                //    if ($objGuiaPiez->Kilos == 0) {
                                //        $blnTienPeso = false;
                                //    }
                                //}
                                if ($blnTienPeso) {
                                    t('La pieza tiene peso');
                                    //--------------------------------------------------------------------------------
                                    // Antes de asociar la Guia al Contenedor, se debe verificar que el destino
                                    // de la Guia, coincida con algunos de los Destinos de la Operacion seleccionada
                                    //---------------------------------------------------------------------------------
                                    if (in_array($objGuiaPiez->Guia->DestinoId,$arrDestinos)) {
                                        t('Los destinos coinciden');
                                        if (!$objContenedor->IsGuiaPiezasAsContainerPiezaAssociated($objGuiaPiez)) {
                                            t('La pieza no estaba asociada');
                                            //---------------------------------------------
                                            // Se establece la relacion "contenedor-guia"
                                            //---------------------------------------------
                                            $objContenedor->AssociateGuiaPiezasAsContainerPieza($objGuiaPiez);
                                            t('Ya asocie la pieza');
                                            //---------------------------------------------
                                            // Se registra el checkpoint correspondiente
                                            //---------------------------------------------
                                            $strDescCkpt  = $objCheckpoint->Descripcion.' | Precinto: '.$objContenedor->Numero.' | ';
                                            $strDescCkpt .= 'Transpor: '.$objContenedor->Transportista->Nombre.' | ';
                                            $strDescCkpt .= 'Chofer: '.$objContenedor->Chofer->__toString();
                                            $arrDatoCkpt = array();
                                            $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
                                            $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
                                            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
                                            $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
                                            $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                                            $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
                                            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                                            if ($arrResuGrab['TodoOkey']) {
                                                t('Se grabo el checkpoint a la pieza');
                                                $intContCkpt ++;
                                            } else {
                                                t('Hubo algun error: '.$arrResuGrab['MotiNook']);
                                                $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,$arrResuGrab['MotiNook']);
                                            }
                                        } else {
                                            t('La pieza ya estaba asociada al Manifiesto');
                                            $this->txtListNume->Text .= $strNumeSeri." (E)".chr(13);
                                            $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,'Pieza previamente incluida en el Manifiesto');
                                        }
                                    } else {
                                        t('El destino no coincide');
                                        $this->txtListNume->Text .= $strNumeSeri." (E)".chr(13);
                                        $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,'DESTINO ('.$objGuiaPiez->Guia->Destino->Iata.') NO COINCIDE');
                                    }
                                } else {
                                    t('La pieza no tiene peso');
                                    $this->txtListNume->Text .= $strNumeSeri." (E)".chr(13);
                                    $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,'SIN PESO');
                                }
                            } else {
                                //--------------
                                // Ruta Urbana
                                //--------------
                                if ($objGuiaPiez->Guia->DestinoId != $this->objUsuario->SucursalId) {
                                    $this->txtListNume->Text .= $strNumeSeri." (E)".chr(13);
                                    $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,'Esta Guia no tiene como Destino '.$this->objUsuario->Sucursal->Iata);
                                } else {
                                    $objContenedor->AssociateGuiaPiezasAsContainerPieza($objGuiaPiez);
                                    $objGuiaPiez->HojaEntrega = $objContenedor->Numero;
                                    $objGuiaPiez->Save();
                                }
                                //-----------------------------------------------------------
                                // Se registra en "guia_ckpt" el checkpoint correspondiente
                                //-----------------------------------------------------------
                                $strDescCkpt  = $objCheckpoint->Descripcion.' | Precinto: '.$objContenedor->Numero.' | ';
                                $strDescCkpt .= 'Transpor: '.$objContenedor->Transportista->Nombre.' | ';
                                $strDescCkpt .= 'Chofer: '.$objContenedor->Chofer->__toString();
                                $arrDatoCkpt = array();
                                $arrDatoCkpt['NumeGuia'] = $objGuiaPiez->Id;
                                $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
                                $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
                                $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
                                $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                                $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
                                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                                if ($arrResuGrab['TodoOkey']) {
                                    $intContCkpt ++;
                                } else {
                                    $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,$arrResuGrab['MotiNook']);
                                    $this->txtListNume->Text .= $strNumeSeri." (E)".chr(13);
                                }
                            }
                            $intContGuia ++;
                        } else {
                            $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,$arrSepuProc['MensUsua']);
                            $this->txtListNume->Text .= $strNumeSeri." (E)".chr(13);
                        }
                    } else {
                        //---------------------------------------------------
                        // Si no es una Guia, se chequea que sea una Valija
                        //---------------------------------------------------
                        $objValija = Containers::LoadByNumero($strNumeSeri);
                        if ($objValija) {
                            if (!$objValija->IsContainersAsContainerContainerAssociated($objContenedor)) {
                                //-----------------------------------------------
                                // Se establece la relación "contenedor-valija"
                                //-----------------------------------------------
                                $objValija->AssociateContainersAsContainerContainer($objContenedor);
                                //---------------------------------------------
                                // Se registra un checkpoint para la Valija
                                //---------------------------------------------
                                $arrDatoCkpt = array();
                                $arrDatoCkpt['NumeCont'] = $objContenedor->Id;
                                $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
                                $arrDatoCkpt['TextObse'] = $objCheckpoint->Descripcion;
                                $arrResuGrab = GrabarCheckpointContenedorNew($arrDatoCkpt);
                                if ($arrResuGrab['TodoOkey']) {
                                    $intContVali ++;
                                } else {
                                    $this->arrGuiaErro[] = array($objValija->Numero,$arrResuGrab['MotiNook']);
                                }
                            }
                            $arrPiezVali = $objValija->GetGuiaPiezasAsContainerPiezaArray();
                            $strDescCkpt  = $objCheckpoint->Descripcion.' | Precinto: '.$objContenedor->Numero.' | ';
                            $strDescCkpt .= 'Transpor: '.$objContenedor->Transportista->Nombre.' | ';
                            $strDescCkpt .= 'Chofer: '.$objContenedor->Chofer->__toString();
                            foreach ($arrPiezVali as $objPiezVali) {
                                //----------------------------------------------------------
                                // Se registra un checkpoint para cada pieza de la Valija
                                //----------------------------------------------------------
                                $arrDatoCkpt = array();
                                $arrDatoCkpt['NumePiez'] = $objPiezVali->Id;
                                $arrDatoCkpt['GuiaAnul'] = $objPiezVali->Guia->Anulada();
                                $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
                                $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
                                $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                                $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
                                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                                if ($arrResuGrab['TodoOkey']) {
                                    $intContCkpt ++;
                                } else {
                                    $this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,$arrResuGrab['MotiNook']);
                                }
                                $intContGuia ++;
                            }
                            $intContVali ++;
                        } else {
                            $this->txtListNume->Text .= $strNumeSeri." (E)".chr(13);
                            $this->arrGuiaErro[] = array($strNumeSeri,$strNumeSeri." (No Existe Guia/Valija)");
                        }
                    }
                }
            }
            $this->dtgPiezMani->Refresh();
            $this->dtgPiezApta->Refresh();
            t('Termine de procesar la piezas');
            $objContenedor->actualizarTotales();
            t('Se actualizaron los totales en el container');
            $objDatabase->TransactionCommit();
            $intCantErro = count($this->arrGuiaErro);
            $strMensUsua = sprintf('Guias Procesadas (%s) | Checkpoints (%s) | Errores (%s)',
                $intContGuia,$intContCkpt,$intCantErro);
            if ($intCantErro == 0) {
                $this->success($strMensUsua);
            } else {
                $this->warning($strMensUsua);
                $this->btnRepoErro->Visible = true;
            }
            t('Voy a actualizar la operacion con el chofer y el vehiculo');
            $this->actualizarOperacion($objContenedor);
            t('Operacion actualizada.. TERMINE');

            $this->objManifies = $objContenedor;
            $this->blnEditMode = true;
            $this->btnRepoMani->Visible = true;
            $this->opcionesDeImpresion();

        } else {
            $this->info('Se actualizo el Manifiesto | No se proceso ninguna Guia/Pieza');
        }
    }

    protected function actualizarOperacion(Containers $objContenedor) {
        if ($objContenedor) {
            $objOperAsoc = $objContenedor->Operacion;
            if ($objOperAsoc->CodiChof != $this->intChofSele || $objOperAsoc->CodiVehi = $this->intVehiSele) {
                //-----------------------------------------------------------------------------------------
                // El Chofer y el Vehiculo seleccionado, se asocian a la Operacion para futuras ocasiones
                //-----------------------------------------------------------------------------------------
                try {
                    $objOperAsoc->CodiChof = $this->intChofSele;
                    $objOperAsoc->CodiVehi = $this->intVehiSele;
                    $objOperAsoc->Save();
                    //---------------------------------------------
                    // Se deja rastro de la transaccion realizada
                    //---------------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'SdeOperacion';
                    $arrLogxCamb['intRefeRegi'] = $objOperAsoc->CodiOper;
                    $arrLogxCamb['strNombRegi'] = $objOperAsoc->RutaId;
                    $arrLogxCamb['strDescCamb'] = 'Modificado dinamicamente, desde Sacar a Ruta';
                    LogDeCambios($arrLogxCamb);
                } catch (Exception $e) {
                    t('Error actualizando la Operacion: '.$e->getMessage());
                }
            }
        }
    }
}
ArmarManifExp::Run('ArmarManifExp');
?>