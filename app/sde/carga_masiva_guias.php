<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : carga_masiva_guias.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 21/11/2017
// Descripcion    : Este programa es el encargado de cargar guías masivamente a un cliente corporativo, a través de
//                  un archivo plano.
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargaMasivaGuias extends FormularioBaseKaizen {
    protected $objTarifa;
    /* @var $objCliente MasterCliente */
    protected $objCliente;
    /* @var $objUsuario Usuario */
    protected $objUsuario;
    /* @var $objProducto Productos */
    protected $objProducto;
    protected $objProcEjec;
    /* @var $objProducto NotaEntrega */
    protected $objNotaEntr;

    protected $intOperGuia;
    protected $strMensProc;
    protected $arrCliePPDx;
    protected $blnAvisReci = false;

    protected $lstClieCarg;
    protected $txtCargArch;
    protected $lstServImpo;
    protected $txtNumeRefe;
    protected $txtNombArch;
    protected $chkEnxxKilo;
    protected $chkManiFact;

    protected $lblNumeCarg;
    protected $lblNumePend;
    protected $lblNumeAjus;
    protected $lblNumeProc;
    protected $lblNumeErro;

    protected $lblCantPiez;
    protected $lblCantReci;
    protected $lblRelaSobr;
    protected $lblTotaLibr;
    protected $lblTotaPies;
    protected $lblTotaVolu;
    protected $lblFechNota;
    protected $lblHoraNota;
    protected $lblUsuaNota;
    protected $lblEstaNota;

    protected $btnExpoGuia;
    protected $btnExpoPiez;
    protected $btnImpoGuia;
    protected $btnAjusGuia;
    protected $btnErroProc;
    protected $btnMostSucu;
    protected $btnBorrNota;
    protected $btnImprDesp;

    protected $arrGuiaErro = [];
    /* @var $objGuiaProc Guias */
    protected $objGuiaProc;
    protected $blnEditMode;
    protected $dtgPiezMani;
    protected $dtgGuiaMani;
    protected $intProcAnte;
    protected $objProcAnte;
    protected $intErroAnte;

    protected $btnMasxAcci;


    protected function Form_Create() {
        parent::Form_Create();

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->strMensProc = '';

        $this->blnEditMode = false;
        if (strlen(QApplication::PathInfo(0)) > 0) {
            $this->objNotaEntr = NotaEntrega::Load(QApplication::PathInfo(0));
            $this->blnEditMode = true;
            if (isset($_SESSION['CantErro'])) {
                $this->intErroAnte = $_SESSION['CantErro'];
                t('Entrando al programa, la cantidad de errores anteriores es: '.$this->intErroAnte);
                if ($this->intErroAnte > 0) {
                    t('Como habia errores, voy a buscar el proceso anterior..');
                    $this->intProcAnte = $_SESSION['ProcAnte'];
                    $this->objProcAnte = ProcesoError::Load($this->intProcAnte);
                    if ($this->objProcAnte) {
                        t('Encontre el procesos y estoy en modo edicion');
                    }
                }
            }
        }
        if ($this->blnEditMode) {
            $this->lblTituForm->Text = 'Consulta de Manifiesto';
        } else {
            $this->lblTituForm->Text = 'Carga de Manifiesto';
        }

        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->objProducto = Productos::LoadByCodigo('IMP');

        //---- Información ----

        $this->lstClieCarg_Create();
        $this->txtCargArch_Create();
        $this->lstServImpo_Create();
        $this->txtNumeRefe_Create();
        $this->txtNombArch_Create();
        $this->chkEnxxKilo_Create();
        $this->chkManiFact_Create();

        //---- Importación y procesamiento ----

        $this->lblNumeCarg_Create();
        $this->lblNumeProc_Create();
        $this->lblNumePend_Create();
        $this->lblNumeAjus_Create();
        $this->lblNumeErro_Create();

        $this->lblCantPiez_Create();
        $this->lblCantReci_Create();
        $this->lblRelaSobr_Create();
        $this->lblTotaLibr_Create();
        $this->lblTotaPies_Create();
        $this->lblTotaVolu_Create();
        $this->lblFechNota_Create();
        $this->lblHoraNota_Create();
        $this->lblUsuaNota_Create();
        $this->lblEstaNota_Create();

        // ---- Botones ----

        $this->btnImpoGuia_Create();
        $this->btnErroProc_Create();
        $this->btnMostSucu_Create();
        $this->btnBorrNota_Create();
        $this->btnImprDesp_Create();

        $this->btnSave->Text = TextoIcono('cogs fa-lg','Procesar');
        $this->btnSave->PrimaryButton = false;
        $this->btnSave->CausesValidation = false;
        $this->btnSave->Visible = false;

        $this->btnAjusGuia_Create();

        //---- Atributos y funciones ----

        $this->mensaje();
        $this->activarProcesamiento();

        if ($this->blnEditMode) {
            if ($this->objNotaEntr->Procesadas > 0) {
                $this->dtgGuiaMani_Create();
                $this->dtgPiezMani_Create();
                $this->btnExpoGuia_Create();
                $this->btnExpoPiez_Create();
            }
            $this->txtNombArch->Visible = true;
        }

        if ((strlen($this->lblEstaNota->Text) > 0) && ($this->lblEstaNota->Text != 'CREAD@')) {
            $this->txtCargArch->Visible = false;
            $this->btnImpoGuia->Visible = false;
            //$this->btnBorrNota->Visible = false;
        }
        $this->lstServImpo_Change();

        if ($this->blnEditMode) {
            $this->chkManiFact = disableControl($this->chkManiFact);
        }

        $this->btnMasxAcci_Create();


    }

    //-------------------------
    // Creación de objetos ...
    //-------------------------


    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $strTextBoto   = TextoIcono('plus','Acciones');
        $arrOpciDrop   = array();
        $arrOpciDrop[] = OpcionDropDown(
            __SIST__.'/sucursales_list.php',
            TextoIcono(__iOJOS__,'Sucursales')
        );
        if ($this->blnEditMode) {
            $_SESSION['PagiBack'] = 'carga_masiva_guias.php/'.$this->objNotaEntr->Id;
            $blnCambStat = false;
            if ($this->objUsuario->Sucursal->Iata == 'MIA') {
                if ( ($this->objNotaEntr->Procesadas > 0) && ($this->objNotaEntr->Recibidas == 0) ) {
                    $blnCambStat = true;
                }
            }
            $strUltiCkpt = '';
            if ($this->objUsuario->Sucursal->Iata != 'MIA') {
                $objUltiCkpt = $this->objNotaEntr->ultimoCheckpoint();
                if ($objUltiCkpt instanceof NotaEntregaCkpt) {
                    $strUltiCkpt = $objUltiCkpt->Checkpoint->Codigo;
                }
                if ( ($this->objNotaEntr->Recibidas == 0) && (in_array($strUltiCkpt,['TI','IC']) ) ) {
                    $blnCambStat = true;
                }
                if ( ($this->objNotaEntr->Recibidas > 0) && (in_array($strUltiCkpt,['RA']) ) ) {
                    $blnCambStat = true;
                }
            }
            if ($blnCambStat) {
                $arrOpciDrop[] = OpcionDropDown(
                    __SIST__.'/cambiar_estatus_manifiesto.php/'.$this->objNotaEntr->Id,
                    TextoIcono(__iEDIT__,'Camb. Estatus')
                );
            } else {
                $arrOpciDrop[] = OpcionDropDown(
                    __SIST__.'/cambiar_estatus_manifiesto.php/'.$this->objNotaEntr->Id.'/sc',
                    TextoIcono('list','Hist. Estatus')
                );
            }
            //if ( ($strUltiCkpt == 'OK') && ($this->objNotaEntr->Facturable == SinoType::NO) ) {
            if ( ($this->objNotaEntr->Facturable == SinoType::NO) ) {
                $arrOpciDrop[] = OpcionDropDown(
                    __SIST__.'/transferir_historico.php/'.$this->objNotaEntr->Id,
                    TextoIcono('folder-o','Trans. a Histórico')
                );
            }
        }

        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);

    }

    protected function dtgGuiaMani_Create() {
        $this->dtgGuiaMani = new QDataGrid($this);
        $this->dtgGuiaMani->FontSize = 12;
        $this->dtgGuiaMani->ShowFilter = false;

        $this->dtgGuiaMani->CssClass = 'datagrid';
        $this->dtgGuiaMani->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaMani->Paginator = new QPaginator($this->dtgGuiaMani);
        $this->dtgGuiaMani->ItemsPerPage = 20;

        $this->dtgGuiaMani->UseAjax = true;

        $this->dtgGuiaMani->SetDataBinder('dtgGuiaMani_Bind');

        $this->createdtgGuiaManiColumns();
    }

    protected function dtgGuiaMani_Bind() {
        $arrGuiaMani   = Guias::LoadArrayByNotaEntregaId($this->objNotaEntr->Id);
        $this->dtgGuiaMani->TotalItemCount = count($arrGuiaMani);

        // Bind the datasource to the datagrid
        $this->dtgGuiaMani->DataSource = Guias::LoadArrayByNotaEntregaId(
            $this->objNotaEntr->Id,
            QQ::Clause($this->dtgGuiaMani->OrderByClause, $this->dtgGuiaMani->LimitClause)
        );
    }

    //protected function dtgGuiaMani_Bind() {
    //    $objClauWher   = QQ::Clause();
    //    $objClauWher[] = QQ::In(QQN::Guias()->Id,$this->objNotaEntr->IdsDeLasGuias());
    //    $arrGuiaMani   = Guias::QueryArray(QQ::AndCondition($objClauWher));
    //    $this->dtgGuiaMani->TotalItemCount = count($arrGuiaMani);
    //
    //    // Bind the datasource to the datagrid
    //    $this->dtgGuiaMani->DataSource = Guias::QueryArray(
    //        QQ::AndCondition($objClauWher),
    //        QQ::Clause($this->dtgGuiaMani->OrderByClause, $this->dtgGuiaMani->LimitClause)
    //    );
    //}

    protected function createdtgGuiaManiColumns() {
        $colNumeTrac = new QDataGridColumn($this);
        $colNumeTrac->Name = QApplication::Translate('Nro Guia');
        $colNumeTrac->Html = '<?= $_ITEM->Tracking ?>';
        $colNumeTrac->Width = 135;
        $this->dtgGuiaMani->AddColumn($colNumeTrac);

        $colSucuDest = new QDataGridColumn($this);
        $colSucuDest->Name = QApplication::Translate('Dest');
        $colSucuDest->Html = '<?= $_ITEM->Destino->Iata ?>';
        $this->dtgGuiaMani->AddColumn($colSucuDest);

        //$colUltiCkpt = new QDataGridColumn($this);
        //$colUltiCkpt->Name = 'U.Ckpt';
        /*$colUltiCkpt->Html = '<?= $_ITEM->ultimoCheckpoint(); ?>';*/
        //$this->dtgGuiaMani->AddColumn($colUltiCkpt);

        $colCantPiez = new QDataGridColumn($this);
        $colCantPiez->Name = QApplication::Translate('Pzas');
        $colCantPiez->Html = '<?= $_ITEM->Piezas; ?>';
        $this->dtgGuiaMani->AddColumn($colCantPiez);
        
        $colNombDest = new QDataGridColumn($this);
        $colNombDest->Name = QApplication::Translate('Nombre del Destinatario');
        $colNombDest->Html = '<?= substr($_ITEM->NombreDestinatario,0,40) ?>';
        $this->dtgGuiaMani->AddColumn($colNombDest);

        if ($this->objNotaEntr->ServicioImportacion == 'AER') {
            $colKiloPiez = new QDataGridColumn($this);
            $colKiloPiez->Name = QApplication::Translate('Kilos');
            $colKiloPiez->Html = '<?= $_ITEM->Kilos; ?>';
            $this->dtgGuiaMani->AddColumn($colKiloPiez);
        } else {
            $colKiloPiez = new QDataGridColumn($this);
            $colKiloPiez->Name = QApplication::Translate('PiesCub');
            $colKiloPiez->Html = '<?= $_ITEM->PiesCub; ?>';
            $this->dtgGuiaMani->AddColumn($colKiloPiez);
        }

    }

    protected function dtgPiezMani_Create() {
        $this->dtgPiezMani = new QDataGrid($this);
        $this->dtgPiezMani->FontSize = 12;
        $this->dtgPiezMani->ShowFilter = false;

        $this->dtgPiezMani->CssClass = 'datagrid';
        $this->dtgPiezMani->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezMani->Paginator = new QPaginator($this->dtgPiezMani);
        $this->dtgPiezMani->ItemsPerPage = 20;

        $this->dtgPiezMani->UseAjax = true;

        $this->dtgPiezMani->SetDataBinder('dtgPiezMani_Bind');

        $this->createdtgPiezManiColumns();
    }

    protected function dtgPiezMani_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::GuiaPiezas()->GuiaId,$this->objNotaEntr->IdsDeLasGuias());
        $arrGuiaMani   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgPiezMani->TotalItemCount = count($arrGuiaMani);
        // Bind the datasource to the datagrid
        $this->dtgPiezMani->DataSource = GuiaPiezas::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgPiezMani->OrderByClause, $this->dtgPiezMani->LimitClause)
        );
    }

    protected function createdtgPiezManiColumns() {
        $colPiezIdxx = new QDataGridColumn($this);
        $colPiezIdxx->Name = QApplication::Translate('Id');
        $colPiezIdxx->Html = '<?= $_ITEM->Id ?>';
        $colPiezIdxx->Width = 60;
        $this->dtgPiezMani->AddColumn($colPiezIdxx);

        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('IdPieza');
        $colIdxxPiez->Html = '<?= $_ITEM->IdPieza ?>';
        $colIdxxPiez->Width = 140;
        $this->dtgPiezMani->AddColumn($colIdxxPiez);

        $colUbicPiez = new QDataGridColumn($this);
        $colUbicPiez->Name = QApplication::Translate('Ubicacion');
        $colUbicPiez->Html = '<?= $_ITEM->Ubicacion ?>';
        $colUbicPiez->Width = 160;
        $this->dtgPiezMani->AddColumn($colUbicPiez);

        $colSucuDest = new QDataGridColumn($this);
        $colSucuDest->Name = QApplication::Translate('Dest');
        $colSucuDest->Html = '<?= $_ITEM->Guia->Destino->Iata ?>';
        $this->dtgPiezMani->AddColumn($colSucuDest);

        $colUltiCkpt = new QDataGridColumn($this);
        $colUltiCkpt->Name = QApplication::Translate('U.Ckpt');
        $colUltiCkpt->Html = '<?= $_ITEM->ultimoCheckpoint() ?>';
        $this->dtgPiezMani->AddColumn($colUltiCkpt);

        if ($this->objNotaEntr->ServicioImportacion == 'AER') {
            $colKiloPiez = new QDataGridColumn($this);
            $colKiloPiez->Name = QApplication::Translate('Kilos');
            $colKiloPiez->Html = '<?= $_ITEM->Kilos; ?>';
            $this->dtgPiezMani->AddColumn($colKiloPiez);
        } else {
            $colKiloPiez = new QDataGridColumn($this);
            $colKiloPiez->Name = QApplication::Translate('PiesCub');
            $colKiloPiez->Html = '<?= $_ITEM->PiesCub; ?>';
            $this->dtgPiezMani->AddColumn($colKiloPiez);
        }

    }

    //protected function btnExpoGuia_Create() {
    //    $this->btnExpoGuia = new QDataGridExporterButton($this, $this->dtgGuiaMani);
    //    $this->btnExpoGuia->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
    //    $this->btnExpoGuia->Text = '<i class="fa fa-download fa-lg"></i> XLS';
    //    $this->btnExpoGuia->HtmlEntities = false;
    //    $this->btnExpoGuia->CssClass = 'btn btn-outline-danger btn-sm';
    //}

    protected function btnExpoGuia_Create() {
        $this->btnExpoGuia = new QButtonOD($this);
        $this->btnExpoGuia->Text = TextoIcono('download','XLS','F','lg');
        $this->btnExpoGuia->HtmlEntities = false;
        $this->btnExpoGuia->AddAction(new QClickEvent(), new QServerAction('btnExpoGuia_Click'));
    }

    protected function btnExpoGuia_Click() {
        QApplication::Redirect(__SIST__.'/guias_del_manifiesto_xls.php?id='.$this->objNotaEntr->Id);
    }

    protected function btnExpoPiez_Create() {
        $this->btnExpoPiez = new QButtonOD($this);
        $this->btnExpoPiez->Text = TextoIcono('download','XLS','F','lg');
        $this->btnExpoPiez->HtmlEntities = false;
        $this->btnExpoPiez->AddAction(new QClickEvent(), new QServerAction('btnExpoPiez_Click'));
    }

    protected function btnExpoPiez_Click() {
        QApplication::Redirect(__SIST__.'/piezas_del_manifiesto_xls.php?id='.$this->objNotaEntr->Id);
    }


    protected function lstClieCarg_Create() {
        $this->lstClieCarg = new QListBox($this);
        $this->lstClieCarg->Required = true;
        $this->lstClieCarg->Width = 180;
        $this->lstClieCarg->Name = QApplication::Translate('Cliente a Cargar');
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::MasterCliente()->NombClie);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->CargaMasiva,SinoType::SI);
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->CodiStat,SinoType::SI);
        $arrClieCarg   = MasterCliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantClie   = count($arrClieCarg);
        $this->lstClieCarg->AddItem('- Seleccione Uno - ('.$intCantClie.')',null);
        foreach ($arrClieCarg as $objClieCarg) {
            $blnSeleRegi = false;
            if ($this->blnEditMode) {
                $blnSeleRegi = $this->objNotaEntr->ClienteCorpId == $objClieCarg->CodiClie;
            }
            $this->lstClieCarg->AddItem($objClieCarg->__toString(), $objClieCarg->CodiClie, $blnSeleRegi);
        }
        $this->lstClieCarg->AddAction(new QChangeEvent(), new QAjaxAction('lstClieCarg_Change'));
    }

    protected function txtCargArch_Create() {
        $this->txtCargArch = new QFileControl($this);
        $this->txtCargArch->Required = true;
        $this->txtCargArch->Width = 300;
        $this->txtCargArch->Name = QApplication::Translate('Archivo a Cargar');
    }

    protected function lstServImpo_Create() {
        $this->lstServImpo = new QListBox($this);
        $this->lstServImpo->Required = true;
        $this->lstServImpo->Width = 180;
        $this->lstServImpo->Name = QApplication::Translate('Servicio Importacion');
        $this->lstServImpo->AddItem('- Seleccione -',null);
        if (!$this->blnEditMode) {
            $this->lstServImpo->AddItem('AEREO','AER');
            $this->lstServImpo->AddItem('MARITIMO','MAR');
        } else {
            $this->lstServImpo->AddItem('AEREO','AER',$this->objNotaEntr->ServicioImportacion == 'AER');
            $this->lstServImpo->AddItem('MARITIMO','MAR',$this->objNotaEntr->ServicioImportacion == 'MAR');
        }
        $this->lstServImpo->AddAction(new QChangeEvent(), new QAjaxAction('lstServImpo_Change'));

    }

    protected function txtNumeRefe_Create() {
        $this->txtNumeRefe = new QTextBox($this);
        $this->txtNumeRefe->Name = 'Ref. del Manifiesto';
        $this->txtNumeRefe->ToolTip = 'Nro de Manifiesto o Contenedor';
        if ($this->blnEditMode) {
            $this->txtNumeRefe->Text = $this->objNotaEntr->Referencia;
        }
        $this->txtNumeRefe->AddAction(new QChangeEvent(), new QAjaxAction('activarProcesamiento'));
    }

    protected function txtNombArch_Create() {
        $this->txtNombArch = new QTextBox($this);
        $this->txtNombArch->Name = 'Archivo';
        $this->txtNombArch->ToolTip = 'Nombre del archivo cargado...';
        if ($this->blnEditMode) {
            $this->txtNombArch->Text = $this->objNotaEntr->NombreArchivo;
        }
        $this->txtNombArch = disableControl($this->txtNombArch);
        $this->txtNombArch->Visible = false;
    }

    protected function chkEnxxKilo_Create() {
        $this->chkEnxxKilo = new QCheckBox($this);
        $this->chkEnxxKilo->Name = 'En Kilos ?';
        if ($this->blnEditMode) {
            $this->chkEnxxKilo->Checked = $this->objNotaEntr->EnKilos;
        }
    }

    protected function chkManiFact_Create() {
        $this->chkManiFact = new QCheckBox($this);
        $this->chkManiFact->Name = 'Facturable ?';
        if ($this->blnEditMode) {
            $this->chkManiFact->Checked = $this->objNotaEntr->Facturable;
        }
    }

    protected function lblNumeCarg_Create() {
        $this->lblNumeCarg = new QLabel($this);
        $this->lblNumeCarg->Name = 'Cargados';
        $this->lblNumeCarg->Text = 0;
        $this->lblNumeCarg->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblNumeCarg->Text = $this->objNotaEntr->Cargadas;
        }
    }

    protected function lblNumePend_Create() {
        $this->lblNumePend = new QLabel($this);
        $this->lblNumePend->Name = 'Por procesar';
        $this->lblNumePend->Text = 0;
        $this->lblNumePend->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblNumePend->Text = $this->objNotaEntr->PorProcesar;
        }
    }

    protected function lblNumeAjus_Create() {
        $this->lblNumeAjus = new QLabel($this);
        $this->lblNumeAjus->Name = 'Por corregir';
        $this->lblNumeAjus->Text = 0;
        $this->lblNumeAjus->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblNumeAjus->Text = $this->objNotaEntr->PorCorregir;
        }

    }

    protected function lblNumeProc_Create() {
        $this->lblNumeProc = new QLabel($this);
        $this->lblNumeProc->Name = 'Procsds';
        $this->lblNumeProc->Text = 0;
        $this->lblNumeProc->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblNumeProc->Text = $this->objNotaEntr->Procesadas;
        }
    }

    protected function lblCantPiez_Create() {
        $this->lblCantPiez = new QLabel($this);
        $this->lblCantPiez->Name = 'Piezas';
        $this->lblCantPiez->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblCantPiez->Text = $this->objNotaEntr->Piezas;
        }
    }

    protected function lblCantReci_Create() {
        $this->lblCantReci = new QLabel($this);
        $this->lblCantReci->Name = 'Recibidas';
        $this->lblCantReci->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblCantReci->Text = $this->objNotaEntr->Recibidas;
        }
    }

    protected function lblRelaSobr_Create() {
        $this->lblRelaSobr = new QLabel($this);
        $this->lblRelaSobr->Name = 'Sobrantes';
        $this->lblRelaSobr->HtmlEntities = false;
        $this->lblRelaSobr->ForeColor = 'red';
        $this->lblRelaSobr->Width = 900;
        if ($this->blnEditMode) {
            $this->lblRelaSobr->Text = $this->objNotaEntr->RelacionSobrantes;
            if (strlen($this->objNotaEntr->RelacionSobrantes) == 0) {
                $this->lblRelaSobr->Visible = false;
            }
        }
    }

    protected function lblTotaLibr_Create() {
        $this->lblTotaLibr = new QLabel($this);
        $this->lblTotaLibr->Name = 'T.Libras';
        $this->lblTotaLibr->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblTotaLibr->Text = $this->objNotaEntr->Libras;
        }
    }

    protected function lblTotaPies_Create() {
        $this->lblTotaPies = new QLabel($this);
        $this->lblTotaPies->Name = 'T.PiesCub';
        $this->lblTotaPies->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblTotaPies->Text = $this->objNotaEntr->PiesCub;
        }
    }

    protected function lblTotaVolu_Create() {
        $this->lblTotaVolu = new QLabel($this);
        $this->lblTotaVolu->Name = 'T.Volumen';
        $this->lblTotaVolu->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblTotaVolu->Text = $this->objNotaEntr->Volumen;
        }
    }

    protected function lblFechNota_Create() {
        $this->lblFechNota = new QLabel($this);
        $this->lblFechNota->Name = 'Fecha';
        $this->lblFechNota->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblFechNota->Text = $this->objNotaEntr->Fecha->__toString("DD/MM/YYYY");
        }
    }

    protected function lblHoraNota_Create() {
        $this->lblHoraNota = new QLabel($this);
        $this->lblHoraNota->Name = 'Hora';
        $this->lblHoraNota->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblHoraNota->Text = $this->objNotaEntr->Hora;
        }
    }

    protected function lblUsuaNota_Create() {
        $this->lblUsuaNota = new QLabel($this);
        $this->lblUsuaNota->Name = 'Crda Por';
        $this->lblUsuaNota->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblUsuaNota->Text = $this->objNotaEntr->Usuario->LogiUsua;
        }
    }

    protected function lblEstaNota_Create() {
        $this->lblEstaNota = new QLabel($this);
        $this->lblEstaNota->Name = 'Estatus';
        $this->lblEstaNota->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblEstaNota->Text = $this->objNotaEntr->Estatus;
        }
    }

    protected function lblNumeErro_Create() {
        $this->lblNumeErro = new QLabel($this);
        $this->lblNumeErro->Name = 'Errores';
        $this->lblNumeErro->Text = 0;
        $this->lblNumeErro->HtmlEntities = false;
    }

    protected function btnAjusGuia_Create() {
        $this->btnAjusGuia = new QButtonI($this);
        $this->btnAjusGuia->Text = TextoIcono('pencil-square-o', 'Corregir');
        $this->btnAjusGuia->Visible = false;
        $this->btnAjusGuia->AddAction(new QClickEvent(), new QServerAction('btnAjusGuia_Click'));
    }

    protected function btnImpoGuia_Create() {
        $this->btnImpoGuia = new QButton($this);
        $this->btnImpoGuia->Text = TextoIcono('upload', 'Importar', 'F', 'lg');
        $this->btnImpoGuia->AddAction(new QClickEvent(), new QServerAction('btnImpoGuia_Click'));
        $this->btnImpoGuia->HtmlEntities = false;
        $this->btnImpoGuia->CssClass = 'btn btn-primary btn-sm';
        $this->btnImpoGuia->CausesValidation = true;
    }

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = TextoIcono('eye','Error(es)','F','lg');
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
        if ($this->blnEditMode) {
            t('Creando el boton, en modo edicion');
            if (!is_null($this->objProcAnte)) {
                t('El proceso existe, por lo tanto, había errores');
                $this->btnErroProc->Visible = true;
            }
        }
    }

    protected function btnMostSucu_Create() {
        $this->btnMostSucu = new QButtonI($this);
        $this->btnMostSucu->Text = TextoIcono('eye','Sucu.','F','lg');
        $this->btnMostSucu->ToolTip = 'Vea la lista de Sucursales disponibles';
        $this->btnMostSucu->AddAction(new QClickEvent(), new QServerAction('btnMostSucu_Click'));
    }

    protected function btnBorrNota_Create() {
        $this->btnBorrNota = new QButtonD($this);
        $this->btnBorrNota->Text = TextoIcono('trash','Borrar','F','lg');
        $this->btnBorrNota->AddAction(new QClickEvent(), new QServerAction('btnBorrNota_Click'));
        $this->btnBorrNota->Visible = $this->blnEditMode;
    }

    protected function btnImprDesp_Create() {
        $this->btnImprDesp = new QButtonS($this);
        $this->btnImprDesp->Text = TextoIcono('print fa-lg','Impr');
        $this->btnImprDesp->ToolTip = 'Nota de Despacho x Guia';
        $this->btnImprDesp->AddAction(new QClickEvent(), new QAjaxAction('$btnImprDesp_Click'));
        if ($this->lblNumeCarg->Text == 0) {
            $this->btnImprDesp->Visible = false;
        }
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function lstClieCarg_Change() {
        if (!is_null($this->lstClieCarg->SelectedValue) && (!$this->blnEditMode) ) {
            $objClieCarg = MasterCliente::Load($this->lstClieCarg->SelectedValue);
            $this->chkManiFact->Checked = $objClieCarg->Facturable;
        }
    }

    protected function lstServImpo_Change() {
        if ($this->lstServImpo->SelectedValue == 'AER') {
            if ($this->lblTotaPies->Text != 0) {
                $this->lblTotaLibr->Text  = $this->lblTotaPies->Text;
                $this->lblTotaPies->Text = 0;
            }
            enableControl($this->chkEnxxKilo);
        } else {
            if ($this->lblTotaLibr->Text != 0) {
                $this->lblTotaPies->Text = $this->lblTotaLibr->Text;
                $this->lblTotaLibr->Text  = 0;
            }
            $this->chkEnxxKilo->Checked = false;
            disableControl($this->chkEnxxKilo);
        }
    }

    protected function btnBorrNota_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        if ( ($this->objNotaEntr->Estatus == 'RECIBID@') && (!$this->blnAvisReci) ) {
            $this->warning('Manifiesto RECIBID@. No se puede borrar !!!');
            $blnTodoOkey = false;
            $this->blnAvisReci = true;
        }
        if ($blnTodoOkey) {
            $this->objNotaEntr->Delete();
            $arrLogxCamb['strNombTabl'] = 'NotaEntrega';
            $arrLogxCamb['intRefeRegi'] = $this->objNotaEntr->Id;
            $arrLogxCamb['strNombRegi'] = $this->objNotaEntr->Referencia;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            QApplication::Redirect(__SIST__.'/manifiestos_list.php');
        }
    }

    protected function btnMostSucu_Click() {
        QApplication::Redirect(__SIST__."/sucursales_list.php");
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/manifiestos_list.php");
    }

    protected function btnSave_Click() {
        t('==============================');
        t('Creando Guias Gold en el SisCO');
        $this->objCliente = MasterCliente::Load($this->lstClieCarg->SelectedValue);

        $strNombProc = 'Creando Guias Gold del Cliente: '.$this->objCliente->NombClie;
        $this->objProcEjec = CrearProceso($strNombProc);
        t('Proceso iniciado...');

        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        $this->mensaje();

        $intCantErro = 0;
        $blnTodoOkey = true;
        if ($this->objNotaEntr->CargaRecibida) {
            $strCodiCkpt = 'RA';
        } else {
            $strCodiCkpt = 'MC';
        }
        $objCkptMani = Checkpoints::LoadByCodigo($strCodiCkpt);
        if (!$objCkptMani) {
            $this->danger("No existe el Checkpoint $strCodiCkpt");
            return;
        }
        //-----------------------------------------------------------
        // Se identifican las Guias Masivas pendientes por procesar
        //-----------------------------------------------------------
        $intCantGuia   = 0;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Procesada, SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Ajustar, SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->ClienteId, $this->objCliente->CodiClie);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->NotaEntregaId, $this->objNotaEntr->Id);
        $arrGuiaPend   = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));
        $intCantPend   = count($arrGuiaPend);
        t('Guias pendientes para procesar: '.$intCantPend);
        if ($intCantPend > 0) {
            foreach ($arrGuiaPend as $objGuiaMasi) {
                //------------------------------------------------------------
                // Se crea una Guia Interna correspondiente a la Guia Masiva
                //------------------------------------------------------------
                $blnTodoOkey = $this->crearGuiaMasiva($objGuiaMasi, $objCkptMani);
                if ($blnTodoOkey) {
                    // Se incrementa el contador de guías procesadas.
                    $intCantGuia++;
                    t('Procesando la guia: '.$objGuiaMasi->GuiaExte.' | Contador: '.$intCantGuia);
                } else {
                    $intCantErro++;
                }
            }
        }
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        $strTextMens = 'El proceso culmino con '.$intCantErro.' error(es)';
        //---------------------------------------------
        // Se indica cuántas guías han sido procesadas
        //---------------------------------------------
        $this->lblNumeProc->Text = $intCantGuia;
        $this->lblNumePend->Text = (int) $this->lblNumePend->Text - $intCantGuia;
        $this->objNotaEntr->Procesadas  = $intCantGuia;
        $this->objNotaEntr->PorProcesar = $this->lblNumePend->Text;
        $this->objNotaEntr->Piezas      = $this->objNotaEntr->cantidadDePiezas();
        t('Terminando de procesar el Manifiesto.  Por corregir: '.$this->objNotaEntr->PorCorregir);
        $this->objNotaEntr->Save();
        t('Manifiesto actualizado...');

        //-----------------------------------------------
        // Se graba el checkpoint al Manifiesto
        //-----------------------------------------------
        if ($intCantGuia > 0) {
            $arrResuGrab = $this->objNotaEntr->GrabarCheckpoint($objCkptMani, $this->objProcEjec);
            if (!$arrResuGrab['TodoOkey']) {
                $intCantErro++;
            }
        }
        //if ($intCantGuia > 0) {
            //try {
            //    $strDescCkpt = $objCkptMani->Descripcion;
            //    $arrDatoCkpt = array();
            //    $arrDatoCkpt['NumeCont'] = $this->objNotaEntr->Id;
            //    $arrDatoCkpt['CodiCkpt'] = $objCkptMani->Id;
            //    $arrDatoCkpt['TextObse'] = $strDescCkpt;
            //    $arrResuGrab = GrabarCheckpointManifiesto($arrDatoCkpt);
            //    if (!$arrResuGrab['TodoOkey']) {
            //        throw new Exception($arrResuGrab['MotiNook']);
            //    }
            //} catch (Exception $e) {
            //    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            //    $arrParaErro['NumeRefe'] = 'Referencia: '.$this->objNotaEntr->Referencia;
            //    $arrParaErro['MensErro'] = $e->getMessage();
            //    $arrParaErro['ComeErro'] = 'Grabando Ckpt al Manifiesto';
            //    GrabarError($arrParaErro);
            //    $intCantErro++;
            //    $blnTodoOkey = false;
            //}
        //}
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal      = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario     = $strTextMens;
        $this->objProcEjec->NotificarAdmin = !$blnTodoOkey ? true : false;
        $this->objProcEjec->Save();
        t('Proceso actualizado');
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'ProcesoError';
        $arrLogxCamb['intRefeRegi'] = $this->objProcEjec->Id;
        $arrLogxCamb['strNombRegi'] = $this->objProcEjec->Nombre;
        $arrLogxCamb['strDescCamb'] = 'Ejecutado';
        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_list.php/'.$this->objProcEjec->Id;
        LogDeCambios($arrLogxCamb);

        $_SESSION['ProcAnte'] = $this->objProcEjec->Id;
        $_SESSION['CantErro'] = $intCantErro;

        QApplication::Redirect(__SIST__.'/carga_masiva_guias.php/'.$this->objNotaEntr->Id);
    }

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = __SIST__."/carga_masiva_guias.php/".$this->objNotaEntr->Id;
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcAnte->Id);
    }

    protected function btnImpoGuia_Click() {
        $strNombArch = $this->txtCargArch->FileName;
        $arrNombArch = explode('.',$strNombArch);
        $strExteArch = $arrNombArch[1];
        $arrExteVali = ['xls','xlsx'];
        if (in_array($strExteArch,$arrExteVali)) {
            $file = basename(tempnam(getcwd(),'tmp'));
            $file = $file.'.'.$strExteArch;
            $filedest = '/tmp/'.$file;
            copy($_FILES['c9']['tmp_name'],$filedest);
            $this->CargarArchivo($filedest,$strExteArch);
        } else {
            $strExteVali = implode(',',$arrExteVali);
            $strMensUsua = 'Archivo no corresponde a una extensión válida <b>'.$strExteVali.'</b>';
            $this->mensaje($strMensUsua,'','d','i',__iHAND__);
        }
    }

    protected function btnAjusGuia_Click() {
        $_SESSION['ManiAjus'] = $this->objNotaEntr->Id;
        QApplication::Redirect(__SIST__.'/guia_cacesa_list.php');
    }

    //-----------------------------
    // Otras acciones del programa
    //-----------------------------

    protected function activarProcesamiento($blnProcImpo = false) {
        $intPorxCorr = 0;
        $intCantCarg = 0;
        $intCantProc = 0;
        if ($this->blnEditMode) {
            $intPorxCorr = $this->objNotaEntr->PorCorregir;
            $intCantCarg = $this->objNotaEntr->Cargadas;
            $intCantProc = $this->objNotaEntr->Procesadas;
        }
        $this->btnAjusGuia->Visible = $intPorxCorr;
        $this->btnSave->Visible     = ($intCantCarg != $intCantProc) && ($intPorxCorr == 0);

        if ($this->blnEditMode) {
            if ($this->objNotaEntr->Procesadas > 0) {
                $this->lstServImpo = disableControl($this->lstServImpo);
                $this->txtNumeRefe = disableControl($this->txtNumeRefe);
            }
        }
    }

    protected function quitarPuntoYPieza($strNumeGuia) {
        $intLongCade = strlen($strNumeGuia);
        $intCantPnto = 0;
        for ($i=0; $i < $intLongCade; $i++) {
            if ($strNumeGuia[$i] == '.') {
                $intCantPnto++;
            }
        }
        if ($intCantPnto > 0) {
            $intPosiPnto = strpos($strNumeGuia,'.');
            $strNumeGuia = substr($strNumeGuia,0,$intPosiPnto);
        }
        return $strNumeGuia;
    }

    protected function verificarDatosMasivos($arrCampClie,$intNumeLine) {
        t('Verificando datos de la linea: '.$intNumeLine);
        $arrContVali = [];
        $blnTodoOkey = true;
        $blnDestOkey = true;
        $strTextErro = '';
        $strSucuDest = '';
        $arrResuVali = array();
        //--------------------------------------------------------
        // Se verifica la existencia previa de la Guia en la tabla
        //--------------------------------------------------------
        $strGuiaClie = $arrCampClie[0];

        //--------------------------------------------------------------
        // Caso Stephy de ATC.  Viene con un punto y luego la ordinal
        // de la pieza, lo cual debe eliminarse
        //--------------------------------------------------------------
        //$strGuiaClie = $this->quitarPuntoYPieza($strGuiaClie);

        if (strlen($strGuiaClie) > 0) {
            //-------------------------------------------------------------------
            // Primero se verifica si existe una Guía con el Tracking indicado
            //-------------------------------------------------------------------
            $objGuiaMasi = Guias::LoadByTracking($strGuiaClie);
            if ($objGuiaMasi) {
                $strTextErro = "La Guia #$strGuiaClie ya existe";
                $blnTodoOkey = false;
            } else {
                //-----------------------------------------------------------------------
                // Luego se verifica si la misma ya existe esperando por ser procesada.
                //-----------------------------------------------------------------------
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->GuiaExte,$strGuiaClie);
                $objGuiaMasi   = GuiaCacesa::QuerySingle(QQ::AndCondition($objClauWher));
                if ($objGuiaMasi) {
                    $strTextErro = "Guia #$strGuiaClie previamente cargada. Esperando por ser Procesada";
                    $blnTodoOkey = false;
                }
            }
        } else {
            //---------------------------------------------------------------------------
            // El nro de guia esta vacío, por lo tanto se asigna el consecutivo interno
            //---------------------------------------------------------------------------
            $strGuiaClie = Guias::proxNroDeGuia();
        }
        $arrContVali['GuiaClie'] = $strGuiaClie;

        $intCantPiez = (int)$arrCampClie[1];
        $arrContVali['CantPiez'] = $intCantPiez;
        if ($blnTodoOkey) {
            if ($intCantPiez <= 0) {
                $strTextErro = "Linea $intNumeLine | Col 2 | Cantidad de Piezas debe ser un Número mayor a Cero";
                $blnTodoOkey = false;
            }
        }
        $strNombDest = trim(limpiarCadena($arrCampClie[2],';'));
        $arrContVali['NombDest'] = $strNombDest;
        if ($blnTodoOkey) {
            if (strlen($strNombDest) == 0) {
                $strTextErro = "Linea $intNumeLine | Col 3 | El Nombre del Destinatario es Requerido";
                $blnTodoOkey = false;
            }
        }
        $strTeleDest = quitaCaracter(';',$arrCampClie[3]);
        $arrContVali['TeleDest'] = $strTeleDest;
        if ($blnTodoOkey) {
            if (strlen($strTeleDest) == 0) {
                $strTextErro = "Linea $intNumeLine | Col 4 | El Telefono del Destinatario es Requerido";
                $blnTodoOkey = false;
            }
        }
        $strDireEntr = trim(limpiarCadena($arrCampClie[4],';'));
        $arrContVali['DireEntr'] = $strDireEntr;
        if ($blnTodoOkey) {
            if (strlen($strDireEntr) == 0) {
                $strTextErro = "Linea $intNumeLine | Col 5 | La Direccion de Entrega es Requerida";
                $blnTodoOkey = false;
            }
        }
        $strSucuDest = strtoupper($arrCampClie[5]);
        $arrContVali['SucuDest'] = $strSucuDest;
        if ($blnTodoOkey) {
            if (strlen($strSucuDest) == 0) {
                $strTextErro = "Linea $intNumeLine | Col 6 | La Sucursal Destino es Requerida";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //-------------------------------------
            // Se verifica que el Destino exista
            //-------------------------------------
            $objSucuDest = Sucursales::LoadByIata($strSucuDest);
            if (!$objSucuDest) {
                $strTextErro = "Linea $intNumeLine | Col 6 | La Sucursal Destino ".$strSucuDest." no existe";
                $blnDestOkey = false;
                $blnTodoOkey = false;
            } else {
                $strSucuDest = $objSucuDest->Iata;
            }
            $arrContVali['SucuDest'] = $strSucuDest;
        }
        $decPesoEnvi = flotar($arrCampClie[6]);
        //$decPesoEnvi = str_replace('.',',',$arrCampClie[6]);
        $arrContVali['PesoEnvi'] = $decPesoEnvi;
        if ($blnTodoOkey) {
            if ($decPesoEnvi < 0) {
                $strTextErro = "Linea $intNumeLine | Col 7 | Peso debe ser mayor mayor a cero.  Libras si es AEREO o PiesCub si es MARITIMO";
                $blnTodoOkey = false;
            }
        }
        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['DestOkey'] = $blnDestOkey;
        $arrResuVali['SucuDest'] = $strSucuDest;
        $arrResuVali['TextErro'] = $strTextErro;
        $arrResuVali['ContVali'] = $arrContVali;
        //t('Termine la verificacion.  Errores: '.$strTextErro);
        return $arrResuVali;
    }

    protected function CargarArchivo($strNombArch,$strExteArch) {
        t('');
        t('=====================');
        t('Rutina: CargarArchivo');
        $this->objCliente = MasterCliente::Load($this->lstClieCarg->SelectedValue);
        $this->strMensProc = '';
        $blnTodoOkey = true;
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Carga Masiva SisCO: '.$this->objCliente->NombClie;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-----------------------------------------------
        // Si no se especifico la Referencia, se asigna
        //-----------------------------------------------
        $strNumeRefe = $this->txtNumeRefe->Text;
        t('Nro de Referencia: '.$strNumeRefe);
        if (strlen($strNumeRefe) == 0) {
            $strNumeRefe = trim($this->objCliente->CodigoInterno).'-'.date('YmdHi');
            $this->txtNumeRefe->Text = $strNumeRefe;
            t('No se especifico Nro de Referencia, se creo: '.$strNumeRefe);
        }
        $intCodiClie = $this->objCliente->CodiClie;
        $this->objNotaEntr = NotaEntrega::LoadByClienteCorpIdReferencia($intCodiClie,$strNumeRefe);
        if (!$this->objNotaEntr) {
            t('Es un Manifieto nuevo...');
            try {
                //-----------------------------
                // Se crea la Nota de Entrega
                //-----------------------------
                $this->objNotaEntr = new NotaEntrega();
                $this->objNotaEntr->ClienteCorpId       = $this->objCliente->CodiClie;
                $this->objNotaEntr->Referencia          = $this->txtNumeRefe->Text;
                $this->objNotaEntr->NombreArchivo       = utf8_decode($this->txtCargArch->FileName);
                $this->objNotaEntr->Estatus             = 'CREAD@';
                $this->objNotaEntr->ServicioImportacion = $this->lstServImpo->SelectedValue;
                $this->objNotaEntr->Facturable          = $this->chkManiFact->Checked;
                $this->objNotaEntr->EnKilos             = $this->chkEnxxKilo->Checked;
                $this->objNotaEntr->CargaRecibida       = false;
                $this->objNotaEntr->Cargadas            = 0;
                $this->objNotaEntr->PorProcesar         = 0;
                $this->objNotaEntr->PorCorregir         = 0;
                $this->objNotaEntr->Procesadas          = 0;
                $this->objNotaEntr->Recibidas           = 0;
                $this->objNotaEntr->Sobrantes           = 0;
                $this->objNotaEntr->Libras              = 0;
                $this->objNotaEntr->Kilos               = 0;
                $this->objNotaEntr->PiesCub             = 0;
                $this->objNotaEntr->Volumen             = 0;
                $this->objNotaEntr->Piezas              = 0;
                $this->objNotaEntr->Fecha               = new QDateTime(QDateTime::Now);
                $this->objNotaEntr->Hora                = date('H:i');
                $this->objNotaEntr->UsuarioId           = $this->objUsuario->CodiUsua;
                $this->objNotaEntr->CreatedBy           = $this->objUsuario->CodiUsua;
                $this->objNotaEntr->Save();
                t('Id del Manifiesto creado: '.$this->objNotaEntr->Id);
                //-----------------------
                // Log de Transacciones
                //-----------------------
                $this->objNotaEntr->logDeCambios("Creado");
            } catch (Exception $e) {
                $blnTodoOkey = false;
                t('Error creando el Manifiesto: '.$e->getMessage());
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNombArch;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Falla al crear el Manifiesto ('.$this->objCliente->NombClie.')';
                GrabarError($arrParaErro);
                $this->danger($e->getMessage());
            }
        } else {
            $this->lblNumeCarg->Text = $this->objNotaEntr->Cargadas;
            $this->lblNumePend->Text = $this->objNotaEntr->PorProcesar;
            $this->lblNumeAjus->Text = $this->objNotaEntr->PorCorregir;
            $this->lblNumeProc->Text = $this->objNotaEntr->Procesadas;
        }
        if ($this->objNotaEntr->Estatus == 'RECIBID@') {
            $this->success('Manfiesto RECIBID@.  No admite cambios');
            return;
        }
        if (!$blnTodoOkey) {
            return;
        }
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //------------------------------
        // Acumuladores del Manifiesto
        //------------------------------
        $decSumaLibr = 0;
        $decSumaKilo = 0;
        $decSumaPies = 0;
        $intCantAjus = 0;
        //-----------------------------------------------------------
        // Se inician los contadores y otras propiedades del archivo
        //-----------------------------------------------------------
        $intCantRegi = 0;
        $intCantErro = 0;
        $blnErroProc = false;
        try {
            //-------------------------------
            // Se abre el archivo a procesar
            //-------------------------------
            $strLibrExce = $strExteArch == 'xls' ? 'SimpleXLS' : 'SimpleXLSX';
            if ( $xls = $strLibrExce::parseFile($strNombArch) ) {

            } else {
                $strMensErro = $strLibrExce::parseError();
                t('Error leyendo el archivo: '.$strMensErro);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNombArch;
                $arrParaErro['MensErro'] = $strMensErro;
                $arrParaErro['ComeErro'] = 'Error leyendo archivo excel: '.$strMensErro;
                GrabarError($arrParaErro);
                $this->danger($strMensErro);
                return;
            }
            //----------------------------------
            // Se lee el archivo linea a linea
            //----------------------------------
            $intNumeLine = 1;
            foreach ($xls->rows() as $arrCampClie) {
                if ( (count($arrCampClie) > 0) && ($intNumeLine > 1) ) {
                    //----------------------------------------------------------
                    // Se verifica la existencia de los campos reglamentarios
                    //----------------------------------------------------------
                    $intCantCamp = count($arrCampClie);
                    if ($intCantCamp != 7) {
                        $strMensErro = "La linea $intNumeLine no tiene los 7 campos requeridos";
                        t($strMensErro);
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = $strNombArch;
                        $arrParaErro['MensErro'] = $strMensErro;
                        $arrParaErro['ComeErro'] = 'Cargando Manifiesto del Cliente ('.$this->objCliente->NombClie.')';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $blnErroProc = true;
                        $intNumeLine++;
                        continue;
                    }
                    //-----------------------------------------------------------------------
                    // Si to-do sale bien, se procede a verificar los datos de cada registro
                    //-----------------------------------------------------------------------
                    $arrResuVali = $this->verificarDatosMasivos($arrCampClie,$intNumeLine);
                    t('Datos verificados');
                    $blnTodoOkey = $arrResuVali['TodoOkey'];
                    $blnDestOkey = $arrResuVali['DestOkey'];
                    $strMensObse = $arrResuVali['TextErro'];
                    $strSucuDest = $arrResuVali['SucuDest'];
                    $arrContVali = $arrResuVali['ContVali'];
                    //-----------------------------------------------
                    // Variables contenidas en la linea del archivo
                    //-----------------------------------------------
                    $strNumeGuia = $arrContVali['GuiaClie'];
                    $intCantPiez = $arrContVali['CantPiez'];
                    $strNombDest = $arrContVali['NombDest'];
                    $strTeleDest = $arrContVali['TeleDest'];
                    $strDireEntr = $arrContVali['DireEntr'];
                    $strSucuDest = $arrContVali['SucuDest'];
                    $decPesoEnvi = $arrContVali['PesoEnvi'];
                    //----------------------------------------------------------------
                    // Se crea un registro en la tabla guia_cacesa para cada registro
                    //----------------------------------------------------------------
                    try {
                        $objGuiaMasi                      = new GuiaCacesa();
                        $objGuiaMasi->FechCarg            = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->HoraCarg            = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->Procesada           = SinoType::NO;
                        $objGuiaMasi->NumeGuia            = $strNumeGuia;
                        $objGuiaMasi->GuiaExte            = $strNumeGuia;
                        $objGuiaMasi->IdPieza             = $intCantPiez;
                        $objGuiaMasi->OrigGuia            = $this->objUsuario->Sucursal->Iata;
                        $objGuiaMasi->NombRemi            = $this->objCliente->NombClie;
                        $objGuiaMasi->DireRemi            = $this->objCliente->DireFisc;
                        $objGuiaMasi->TeleRemi            = $this->objCliente->TeleCona;
                        $objGuiaMasi->NombDest            = utf8_decode(strtoupper($strNombDest));
                        $objGuiaMasi->DireDest            = utf8_decode(strtoupper($strDireEntr));
                        $objGuiaMasi->TeleDest            = $strTeleDest;
                        $objGuiaMasi->CeluDest            = 'N/A';
                        $objGuiaMasi->DestGuia            = !$blnDestOkey ? '.' : $strSucuDest;
                        $objGuiaMasi->DescCont            = 'N/A';
                        $objGuiaMasi->CantPiez            = $intCantPiez;
                        $objGuiaMasi->PesoGuia            = 0;
                        $objGuiaMasi->Alto                = 0;
                        $objGuiaMasi->Ancho               = 0;
                        $objGuiaMasi->Largo               = 0;
                        $objGuiaMasi->Volumen             = 0;
                        $objGuiaMasi->ServicioEntrega     = 'DOM';
                        $objGuiaMasi->ServicioImportacion = $this->objNotaEntr->ServicioImportacion;
                        $objGuiaMasi->RegistradoPor       = $this->objUsuario->LogiUsua;
                        $objGuiaMasi->Ajustar             = $blnTodoOkey ? SinoType::NO : SinoType::SI;
                        $objGuiaMasi->OtroDestino         = !$blnDestOkey ? $strSucuDest : null;
                        $objGuiaMasi->Observacion         = utf8_decode(strtoupper($strMensObse));
                        $objGuiaMasi->ClienteId           = $this->objCliente->CodiClie;
                        $objGuiaMasi->TarifaId            = $this->objCliente->TarifaAgenteId;
                        $objGuiaMasi->ProcesoId           = $this->objProcEjec->Id;
                        $objGuiaMasi->ValorDeclarado      = 0;
                        $objGuiaMasi->NotaEntregaId       = $this->objNotaEntr->Id;
                        $objGuiaMasi->Kilos               = 0;
                        $objGuiaMasi->PiesCub             = 0;
                        if ($this->objNotaEntr->ServicioImportacion == 'AER') {
                            if ($this->objNotaEntr->EnKilos) {
                                $objGuiaMasi->Kilos = (float)$decPesoEnvi;
                            } else {
                                $objGuiaMasi->Kilos = (float)($decPesoEnvi * 0.45359237);
                            }
                            $objGuiaMasi->PesoGuia = $objGuiaMasi->Kilos;
                        } else {
                            $objGuiaMasi->PiesCub = (float)$decPesoEnvi;
                            $objGuiaMasi->PesoGuia = $objGuiaMasi->PiesCub;
                        }
                        $decSumaKilo += $objGuiaMasi->Kilos;
                        $decSumaPies += $objGuiaMasi->PiesCub;
                        $objGuiaMasi->Save();
                        //------------------------------
                        // Acumuladores del Manifiesto
                        //------------------------------
                        if ($objGuiaMasi->Ajustar == SinoType::SI) {
                            $intCantAjus += 1;
                        }
                        $intCantRegi++;
                    } catch (Exception $e) {
                        t('Error cargando el archivo: '.$e->getMessage());
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = $strNombArch;
                        $arrParaErro['MensErro'] = $e->getMessage();
                        $arrParaErro['ComeErro'] = 'Creando Guia Masiva ('.$strNumeGuia.')';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $blnErroProc = true;
                    }
                }
                $intNumeLine++;
            }
        } catch (Exception $e) {
            t('Error cargando el archivo: '.$e->getMessage());
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $strNombArch;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falla cargando Manifiesto del Cliente ('.$this->objCliente->NombClie.')';
            GrabarError($arrParaErro);
            $intCantErro ++;
            $blnErroProc = true;
        }
        //-------------------------------------
        // Se levantan los errores en pantalla
        //-------------------------------------
        error_reporting($mixErroOrig);
        //-----------------------------------------------------------------
        // Se inicializan los parámetros del mensaje a mostrar al usuario.
        //-----------------------------------------------------------------
        $strTextMens = 'El proceso culmino con '.$intCantErro.' error(es)';
        $strTipoMens = 's';
        $strIconMens = 'check';
        //---------------------------------------------
        // Se actualiza el Manifiesto con los totales
        //---------------------------------------------
        try {
            $this->objNotaEntr->Libras      = $decSumaLibr;
            $this->objNotaEntr->Kilos       = $decSumaKilo;
            $this->objNotaEntr->PiesCub     = $decSumaPies;
            $this->objNotaEntr->Cargadas    = $intCantRegi;
            $this->objNotaEntr->PorCorregir = $intCantAjus;
            $this->objNotaEntr->PorProcesar = $intCantRegi - $intCantAjus;
            $this->objNotaEntr->Save();
        } catch (Exception $e) {
            t('Error actualizando el manifiesto: '.$e->getMessage());
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $strNombArch;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Error actualizando el manifiesto ('.$this->objNotaEntr->Referencia.')';
            GrabarError($arrParaErro);
            $intCantErro ++;
            $blnErroProc = true;
        }
        if ($intCantRegi > 0) {
            //-------------------------------------------------------------------------------------------------
            // Si se ha importado uno o más registros, se manifiesta al usuario la posibilidad de procesar y/o
            // corregir datos, se indica la cantidad de registros cargados y se activan los procesamientos de
            // validación para determinar el estatus de actividad y/o registro.
            //-------------------------------------------------------------------------------------------------
            $strTextMens .= ' - Puede proceder a Corregir y/ Procesar los Datos';
            $this->lblNumeCarg->Text = $intCantRegi;
        }
        if ($blnErroProc) {
            //----------------------------------------------------------------------------------------------------
            // Si hay uno o varios errores, se coloca el mensaje como un alerta, se indica la cantidad de errores
            // existentes y se visualiza el botón para acceder a los detalles de los mismos.
            //----------------------------------------------------------------------------------------------------
            $strTipoMens = 'd';
            $strIconMens = __iHAND__;
            $this->lblNumeErro->Text = $intCantErro;
            $this->btnErroProc->Visible = true;
        }
        //------------------------------------
        // Se crea el mensaje correspondiente
        //------------------------------------
        $this->mensaje($strTextMens,'m',$strTipoMens,'i',$strIconMens);
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = $blnErroProc ? true : false;
        $this->objProcEjec->Save();
        //TODO: Ver posibilidad de enviar notificación de error(es) a administradores del Sistema por correo.
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'ProcesoError';
        $arrLogxCamb['intRefeRegi'] = $this->objProcEjec->Id;
        $arrLogxCamb['strNombRegi'] = $this->objProcEjec->Nombre;
        $arrLogxCamb['strDescCamb'] = 'Ejecutado';
        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_list.php/'.$this->objProcEjec->Id;
        LogDeCambios($arrLogxCamb);

        t('El Id del Proceso es: '.$this->objProcEjec->Id);
        t('La cantidad de errores: '.$intCantErro);
        $_SESSION['ProcAnte'] = $this->objProcEjec->Id;
        $_SESSION['CantErro'] = $intCantErro;
        QApplication::Redirect(__SIST__.'/carga_masiva_guias.php/'.$this->objNotaEntr->Id);
    }


    protected function crearGuiaMasiva(GuiaCacesa $objGuiaMasi, $objCkptProc) {
        $blnTodoOkey = true;

        t('Procesando la Guia-Cliente Nro: '.$objGuiaMasi->GuiaExte);
        $objSucuDest = Sucursales::LoadByIata($objGuiaMasi->DestGuia);
        try {
            $objGuia                        = new Guias();
            $objGuia->Numero                = Guias::proxNroDeGuia();
            $objGuia->Tracking              = $objGuiaMasi->GuiaExte;
            $objGuia->Fecha                 = new QDateTime(QDateTime::Now());
            $objGuia->ClienteCorpId         = $objGuiaMasi->ClienteId;
            $objGuia->OrigenId              = $objGuiaMasi->Cliente->SucursalId;
            $objGuia->DestinoId             = $objSucuDest->Id;
            $objGuia->ServicioEntrega       = $objGuiaMasi->ServicioEntrega;
            $objGuia->ServicioImportacion   = $objGuiaMasi->ServicioImportacion;
            $objGuia->ProductoId            = $this->objProducto->Id;
            $objGuia->FormaPago             = 'CRD';
            $objGuia->NombreRemitente       = $objGuiaMasi->NombRemi;
            $objGuia->DireccionRemitente    = $objGuiaMasi->DireRemi;
            $objGuia->TelefonoRemitente     = $objGuiaMasi->TeleRemi;
            $objGuia->NombreDestinatario    = $objGuiaMasi->NombDest;
            $objGuia->DireccionDestinatario = $objGuiaMasi->DireDest;
            $objGuia->TelefonoDestinatario  = $objGuiaMasi->TeleDest;
            $objGuia->Contenido             = $objGuiaMasi->DescCont;
            $objGuia->Piezas                = $objGuiaMasi->CantPiez;
            $objGuia->ValorDeclarado        = $objGuiaMasi->ValorDeclarado;
            $objGuia->Asegurado             = 0;
            $objGuia->Total                 = 0;
            $objGuia->CreatedBy             = $this->objUsuario->CodiUsua;
            $objGuia->VendedorId            = $this->objCliente->VendedorId;
            $objGuia->TarifaAgenteId        = $objGuiaMasi->TarifaId;
            $objGuia->Alto                  = $objGuiaMasi->Alto;
            $objGuia->Ancho                 = $objGuiaMasi->Ancho;
            $objGuia->Largo                 = $objGuiaMasi->Largo;
            $objGuia->Volumen               = $objGuiaMasi->Volumen;
            $objGuia->Kilos                 = $objGuiaMasi->Kilos;
            $objGuia->PiesCub               = $objGuiaMasi->PiesCub;
            $objGuia->NotaEntregaId         = $objGuiaMasi->NotaEntregaId;
            $objGuia->Save();
            //t('Guia: '.$objGuia->Numero.' creada en la BD');
            //------------------------------------------------------------------
            // Una vez creada la guia, se crean las piezas con pesos promedios
            //------------------------------------------------------------------
            $decKiloProm = round($objGuia->Kilos / $objGuia->Piezas, 2);
            $decPiesProm = round($objGuia->PiesCub / $objGuia->Piezas, 2);
            //-----------------------------------------------------------------------
            // Se crea un objeto para enviar parametros a la creación de las piezas
            //-----------------------------------------------------------------------
            $objParaPiez = new stdClass();
            $objParaPiez->ProcEjec = $this->objProcEjec;
            $objParaPiez->CkptProc = $objCkptProc;
            $objParaPiez->KiloProm = $decKiloProm;
            $objParaPiez->PiesProm = $decPiesProm;
            for ($i = 1; $i <= $objGuia->Piezas; $i++) {
                $objParaPiez->IdxxPiez = $i;
                $objGuia->crearPieza($objParaPiez);
            }
            //------------------------------------------------------------------------------
            // Una vez creadas y registradas la Guía y la Pieza, se elimina la Guía Masiva
            //------------------------------------------------------------------------------
            $objGuiaMasi->Delete();
            t('Piezas creada y guia masiva borrada');
            //----------------------------------
            // Se actualiza la Nota de Entrega
            //----------------------------------
            $objGuia->NotaEntrega->Procesadas  += 1;
            $objGuia->NotaEntrega->PorProcesar -= 1;
            $objGuia->NotaEntrega->Save();
            //$objDatabase->TransactionCommit();
        } catch (Exception $e) {
            $blnTodoOkey = false;
            t('Error creando la guia: '.$e->getMessage());
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'Guia: '.$objGuiaMasi->NumeGuia;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Fallo la creacion de la Guia y su Checkpoint';
            GrabarError($arrParaErro);
            //$objDatabase->TransactionRollBack();
        }
        return $blnTodoOkey;
    }
}

CargaMasivaGuias::Run('CargaMasivaGuias');
