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

    protected $lstClieCarg;
    protected $txtCargArch;
    protected $lstServImpo;
    protected $txtNumeRefe;
    protected $txtNombArch;

    protected $lblNumeCarg;
    protected $lblNumePend;
    protected $lblNumeAjus;
    protected $lblNumeProc;
    protected $lblNumeErro;

    protected $lblCantReci;
    protected $lblRelaSobr;
    protected $lblTotaLibr;
    protected $lblTotaPies;
    protected $lblTotaVolu;
    protected $lblFechNota;
    protected $lblHoraNota;
    protected $lblUsuaNota;
    protected $lblEstaNota;

    protected $btnImpoGuia;
    protected $btnAjusGuia;
    protected $btnErroProc;
    protected $btnMostSucu;
    protected $btnBorrNota;
    protected $btnImprDesp;

    protected $arrGuiaErro;
    /* @var $objGuiaProc Guias */
    protected $objGuiaProc;
    protected $blnEditMode;
    protected $dtgPiezNota;


    protected function Form_Create() {
        parent::Form_Create();

        $this->strMensProc = '';

        $this->blnEditMode = false;
        if (strlen(QApplication::PathInfo(0)) > 0) {
            $this->objNotaEntr = NotaEntrega::Load(QApplication::PathInfo(0));
            $this->blnEditMode = true;
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

        //---- Importación y procesamiento ----

        $this->lblNumeCarg_Create();
        $this->lblNumeProc_Create();
        $this->lblNumePend_Create();
        $this->lblNumeAjus_Create();
        $this->lblNumeErro_Create();

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
                $this->dtgPiezNota_Create();
            }
            $this->txtNombArch->Visible = true;
        }

        if ((strlen($this->lblEstaNota->Text) > 0) and ($this->lblEstaNota->Text != 'CREAD@')) {
            $this->txtCargArch->Visible = false;
            $this->btnImpoGuia->Visible = false;
            $this->btnBorrNota->Visible = false;
        }
    }

    //-------------------------
    // Creación de objetos ...
    //-------------------------

    protected function dtgPiezNota_Create() {
        $this->dtgPiezNota = new QDataGrid($this);
        $this->dtgPiezNota->FontSize = 12;
        $this->dtgPiezNota->ShowFilter = false;

        $this->dtgPiezNota->CssClass = 'datagrid';
        $this->dtgPiezNota->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezNota->UseAjax = true;

        $this->dtgPiezNota->SetDataBinder('dtgPiezNota_Bind');

        $this->createDtgPiezNotaColumns();
    }

    protected function dtgPiezNota_Bind() {
        $this->dtgPiezNota->DataSource = $this->objNotaEntr->GetGuiasArray();
    }

    protected function createDtgPiezNotaColumns() {
        $colNumeTrac = new QDataGridColumn($this);
        $colNumeTrac->Name = QApplication::Translate('Nro Guia');
        $colNumeTrac->Html = '<?= $_ITEM->Tracking ?>';
        $this->dtgPiezNota->AddColumn($colNumeTrac);

        $colNombDest = new QDataGridColumn($this);
        $colNombDest->Name = QApplication::Translate('Destinatario');
        $colNombDest->Html = '<?= $_ITEM->NombreDestinatario ?>';
        $this->dtgPiezNota->AddColumn($colNombDest);

        $colDescCont = new QDataGridColumn($this);
        $colDescCont->Name = QApplication::Translate('Contenido');
        $colDescCont->Html = '<?= $_ITEM->Contenido ?>';
        $this->dtgPiezNota->AddColumn($colDescCont);

        if ($this->objNotaEntr->ServicioImportacion == 'AER') {
            $colKiloPiez = new QDataGridColumn($this);
            $colKiloPiez->Name = QApplication::Translate('Kilos');
            $colKiloPiez->Html = '<?= $_ITEM->Kilos; ?>';
            $this->dtgPiezNota->AddColumn($colKiloPiez);
        } else {
            $colKiloPiez = new QDataGridColumn($this);
            $colKiloPiez->Name = QApplication::Translate('PiesCub');
            $colKiloPiez->Html = '<?= $_ITEM->PiesCub; ?>';
            $this->dtgPiezNota->AddColumn($colKiloPiez);
        }

        $colAltoGuia = new QDataGridColumn($this);
        $colAltoGuia->Name = QApplication::Translate('Alto');
        $colAltoGuia->Html = '<?= $_ITEM->Alto; ?>';
        $this->dtgPiezNota->AddColumn($colAltoGuia);

        $colAnchGuia = new QDataGridColumn($this);
        $colAnchGuia->Name = QApplication::Translate('Ancho');
        $colAnchGuia->Html = '<?= $_ITEM->Ancho; ?>';
        $this->dtgPiezNota->AddColumn($colAnchGuia);

        $colLargGuia = new QDataGridColumn($this);
        $colLargGuia->Name = QApplication::Translate('Largo');
        $colLargGuia->Html = '<?= $_ITEM->Largo; ?>';
        $this->dtgPiezNota->AddColumn($colLargGuia);

        $colCantPiez = new QDataGridColumn($this);
        $colCantPiez->Name = QApplication::Translate('Piezas');
        $colCantPiez->Html = '<?= $_ITEM->Piezas; ?>';
        $this->dtgPiezNota->AddColumn($colCantPiez);

        //$colDescPiez = new QDataGridColumn($this);
        //$colDescPiez->Name = QApplication::Translate('Comentario');
        /*$colDescPiez->Html = '<?= $_ITEM->Descripcion; ?>';*/
        //$colDescPiez->Width = 350;
        //$this->dtgPiezNota->AddColumn($colDescPiez);
    }

    //public function dtgPiezNota_IdxxPiez_Render(GuiaPiezas $objGuiaPiez) {
    //    $strIdxxPiez = explode('-',$objGuiaPiez->IdPieza)[1];
    //    return utf8_encode($strIdxxPiez);
    //}


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
            $this->lstClieCarg->AddItem($objClieCarg->__toString(), $objClieCarg->CodiClie);
        }
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
        $this->txtNombArch->Name = 'Nombre del Archivo';
        $this->txtNombArch->ToolTip = 'Nombre del archivo cargado...';
        if ($this->blnEditMode) {
            $this->txtNombArch->Text = $this->objNotaEntr->NombreArchivo;
        }
        $this->txtNombArch = disableControl($this->txtNombArch);
        $this->txtNombArch->Visible = false;
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
        $this->lblNumeProc->Name = 'Procesadas';
        $this->lblNumeProc->Text = 0;
        $this->lblNumeProc->HtmlEntities = false;
        if ($this->blnEditMode) {
            $this->lblNumeProc->Text = $this->objNotaEntr->Procesadas;
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


    protected function lstServImpo_Change() {
        if ($this->lstServImpo->SelectedValue == 'AER') {
            if ($this->lblTotaPies->Text != 0) {
                $this->lblTotaLibr->Text  = $this->lblTotaPies->Text;
                $this->lblTotaPies->Text = 0;
            }
        }
        if ($this->lstServImpo->SelectedValue == 'MAR') {
            if ($this->lblTotaLibr->Text != 0) {
                $this->lblTotaPies->Text = $this->lblTotaLibr->Text;
                $this->lblTotaLibr->Text  = 0;
            }
        }
    }

    protected function btnBorrNota_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        if ($this->objNotaEntr->Estatus == 'RECIBID@') {
            $this->mensaje('La NDE ya fue RECIBID@. No se puede borrar');
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            $this->objNotaEntr->Delete();
            $arrLogxCamb['strNombTabl'] = 'NotaEntrega';
            $arrLogxCamb['intRefeRegi'] = $this->objNotaEntr->Id;
            $arrLogxCamb['strNombRegi'] = $this->objNotaEntr->Referencia;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            QApplication::Redirect(__SIST__.'/nota_entrega_list.php');
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
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Creando Guias Gold del Cliente: '.$this->objCliente->NombClie;
        $this->objProcEjec = CrearProceso($strNombProc);
        t('Proceso iniciado...');
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        $this->mensaje();
        t('Errores apagados');
        //-----------------------------------
        // Se identifican valores de trabajo
        //-----------------------------------
        $intCantErro = 0;
        $blnTodoOkey = true;
        $blnProcImpo = true;
        $objCkptMasi = Checkpoints::LoadByCodigo('NR');
        if (!$objCkptMasi) {
            $this->danger('No existe el Checkpoint NR !!!');
            return;
        }
        t('Checkpoint NR, leido de la BD');
        //----------------------------------------------------------
        // Se identifican las Guias Masivas pendientes por procesar
        //----------------------------------------------------------
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
                t('Procesando la guia: '.$objGuiaMasi->GuiaExte);
                //------------------------------------------------------------
                // Se crea una Guia Interna correspondiente a la Guia Masiva
                //------------------------------------------------------------
                $this->crearGuiaMasiva($objGuiaMasi, $objCkptMasi);
                //------------------------------------------------
                // Se incrementa el contador de guías procesadas.
                //------------------------------------------------
                $intCantGuia++;
            }
        }
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        //------------------------------------------------------
        // Se inicializan los parámetros del mensaje al usuario
        //------------------------------------------------------
        $strTextMens = 'El proceso culmino con '.$intCantErro.' error(es)';
        $strTipoMens = 's';
        $strIconMens = __iCHEC__;
        //---------------------------------------------
        // Se indica cuántas guías han sido procesadas
        //---------------------------------------------
        $this->lblNumeProc->Text = $intCantGuia;
        $this->lblNumePend->Text = (int) $this->lblNumePend->Text - $intCantGuia;
        $this->objNotaEntr->Procesadas  = $intCantGuia;
        $this->objNotaEntr->PorProcesar = $this->lblNumePend->Text;
        $this->objNotaEntr->Save();
        if (!$blnTodoOkey) {
            //---------------------------------------------------------------------------------------------------
            // Si no ha salido to-do bien, se coloca el mensaje construido como un alerta, se indica la cantidad
            // de errores existentes y se visualiza el botón para acceder a los detalles de los mismos.
            //---------------------------------------------------------------------------------------------------
            $strTipoMens = 'd';
            $strIconMens = __iHAND__;
            $this->lblNumeErro->Text = $intCantErro;
            $this->btnErroProc->Visible = true;
        }
        //-----------------------------------------
        // Se construye el mensaje correspondiente
        //-----------------------------------------
        $this->mensaje($strTextMens,'m',$strTipoMens,'i',$strIconMens);
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = !$blnTodoOkey ? true : false;
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

        QApplication::Redirect(__SIST__.'/carga_masiva_guias.php/'.$this->objNotaEntr->Id);
    }

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = __SIST__."/carga_masiva_guias.php";
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function btnImpoGuia_Click() {
        $strNombArch = $this->txtCargArch->FileName;
        $strPartNomb = explode('.',$strNombArch);
        $arrExteVali = array('csv','txt','dat');
        if (in_array($strPartNomb[1],$arrExteVali)) {
            $file = basename(tempnam(getcwd(),'tmp'));
            $file = $file.'.'.$strPartNomb[1];
            $filedest = '/tmp/'.$file;
            copy($_FILES['c7']['tmp_name'],$filedest);
            $this->CargarArchivo($filedest);
        } else {
            $strMensUsua = 'Archivo no corresponde a una extensión válida (.csv, .txt o .dat)';
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
            if ($this->objNotaEntr->Estatus == 'RECIBID@') {
                $this->btnBorrNota->Visible = false;
            }
        }
    }

    protected function verificarDatosMasivos($arrCampClie) {
        $blnTodoOkey = true;
        $blnDestOkey = true;
        $strTextErro = '';
        $strSucuDest = '';
        $arrResuVali = array();
        //--------------------------------------------------------
        // Se verifica la existencia previa de la Guia en la tabla
        //--------------------------------------------------------
        $strGuiaClie = $arrCampClie[0];
        $strIdxxPiez = $arrCampClie[1];
        if (strlen($strGuiaClie) > 0) {
            //-------------------------------------------------------------------
            // Primero se verifica si existe una Guía con el Tracking indicado
            //-------------------------------------------------------------------
            $objGuiaMasi = Guias::LoadByTracking($strGuiaClie);
            if ($objGuiaMasi) {
                $strTextErro = "El Tracking #$strGuiaClie ya existe";
                $blnTodoOkey = false;
            } else {
                //-----------------------------------------------------------------------
                // Luego se verifica si la misma ya existe esperando por ser procesada.
                //-----------------------------------------------------------------------
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->GuiaExte,$strGuiaClie);
                $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->IdPieza,$strIdxxPiez);
                $objGuiaMasi   = GuiaCacesa::QuerySingle(QQ::AndCondition($objClauWher));
                if ($objGuiaMasi) {
                    $strTextErro = "El Tracking #$strGuiaClie-$strIdxxPiez ya existe. Esperando por ser Procesada";
                    $blnTodoOkey = false;
                }
            }
        }
        if ($blnTodoOkey) {
            $strIdxxPiez = $arrCampClie[1];
            if (strlen($strIdxxPiez) != 3 || !(is_numeric($strIdxxPiez))) {
                $strTextErro = "La pieza debe tener 3 digitos Ej: 001, 002 (col 2)";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $strCeduDest = $arrCampClie[2];
            if ( (strlen($strCeduDest) == 0) && ($strIdxxPiez == '001') ) {
                $strTextErro = "La Cedula del Destinatario es Requerido (col 3)";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $strNombDest = $arrCampClie[3];
            if ( (strlen($strNombDest) == 0) && ($strIdxxPiez == '001') ) {
                $strTextErro = "El Nombre del Destinatario es Requerido (col 4)";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $strTeleDest = $arrCampClie[4];
            if ( (strlen($strTeleDest) == 0) && ($strIdxxPiez == '001') ) {
                $strTextErro = "El Telefono del Destinatario es Requerido (col 5)";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $strDireDest = $arrCampClie[5];
            if ( (strlen($strDireDest) == 0) && ($strIdxxPiez == '001') ) {
                $strTextErro = "La Direccion de Entrega es Requerida (col 6)";
                $blnTodoOkey = false;
            }
        }
        $blnValiSucu = false;
        if ($blnTodoOkey) {
            $strSucuDest = strtoupper($arrCampClie[6]);
            if (strlen($strSucuDest) == 0) {
                if ($strIdxxPiez == '001')  {
                    $strTextErro = "La Sucursal Destino es Requerida (col 6)";
                    $blnTodoOkey = false;
                }
            } else {
                $blnValiSucu = true;
            }
        }
        if ($blnTodoOkey && $blnValiSucu) {
            //-------------------------------------
            // Se verifica que el Destino exista
            //-------------------------------------
            $strSucuDest = strtoupper($arrCampClie[6]);
            t('Voy a verificar la sucursal: '.$strSucuDest);
            $objSucuDest = Sucursales::LoadByIata($strSucuDest);
            if (!$objSucuDest) {
                $strTextErro = "La Sucursal Destino ".$strSucuDest." (col 7) no existe";
                $blnDestOkey = false;
                $blnTodoOkey = false;
            } else {
                $strSucuDest = $objSucuDest->Iata;
            }
        }
        if ($blnTodoOkey) {
            $strDescCont = $arrCampClie[8];
            if (strlen($strDescCont) == 0) {
                $strTextErro = "La Descripcion de Contenido es requerida (col 9)";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $intPesoEnvi = $arrCampClie[10];
            if (!(is_numeric($intPesoEnvi) && $intPesoEnvi > 0)) {
                $strTextErro = "Peso debe ser mayor mayor a cero(0).  Libras si es AEREO o PiesCub si es MARITIMO (col 10)";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $intAltoEnvi = $arrCampClie[11];
            if (!(is_numeric($intAltoEnvi) && $intAltoEnvi > 0)) {
                $strTextErro = "Alto debe ser mayor mayor a cero(0).  Expresado en cms";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $intAnchEnvi = $arrCampClie[12];
            if (!(is_numeric($intAnchEnvi) && $intAnchEnvi > 0)) {
                $strTextErro = "Ancho debe ser mayor mayor a cero(0).  Expresado en cms";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $intLargEnvi = $arrCampClie[12];
            if (!(is_numeric($intLargEnvi) && $intLargEnvi > 0)) {
                $strTextErro = "Largo debe ser mayor mayor a cero(0).  Expresado en cms";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $decValoDecl = $arrCampClie[13];
            if ( (strlen($decValoDecl) > 0) && (is_numeric($decValoDecl)) ) {
                $strTextErro = "Valor Declarado debe ser mayor mayor a cero(0).  Expresado en USD";
                $blnTodoOkey = false;
            }
        }
        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['DestOkey'] = $blnDestOkey;
        $arrResuVali['SucuDest'] = $strSucuDest;
        $arrResuVali['TextErro'] = $strTextErro;
        return $arrResuVali;
    }

    protected function CargarArchivo($strNombArch) {
        t('=====================');
        t('Rutina: CargarArchivo');
        $this->objCliente = MasterCliente::Load($this->lstClieCarg->SelectedValue);
        $this->strMensProc = '';
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
            t('No habia Nro de Referencia, se creo: '.$strNumeRefe);
        }
        $intCodiClie = $this->objCliente->CodiClie;
        t('El Cliente es: '.$intCodiClie);
        $this->objNotaEntr = NotaEntrega::LoadByClienteCorpIdReferencia($intCodiClie,$strNumeRefe);
        if (!$this->objNotaEntr) {
            t('Es una Nota de Entrega nueva...');
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
                $this->objNotaEntr->Cargadas            = 0;
                $this->objNotaEntr->PorProcesar         = 0;
                $this->objNotaEntr->PorCorregir         = 0;
                $this->objNotaEntr->Procesadas          = 0;
                $this->objNotaEntr->Recibidas           = 0;
                $this->objNotaEntr->Sobrantes           = 0;
                $this->objNotaEntr->Libras              = 0;
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
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNombArch;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Falla al crear la NDE ('.$this->objCliente->CodigoInterno.')';
                GrabarError($arrParaErro);
            }
        } else {
            $this->lblNumeCarg->Text = $this->objNotaEntr->Cargadas;
            $this->lblNumePend->Text = $this->objNotaEntr->PorProcesar;
            $this->lblNumeAjus->Text = $this->objNotaEntr->PorCorregir;
            $this->lblNumeProc->Text = $this->objNotaEntr->Procesadas;
        }
        if ($this->objNotaEntr->Estatus == 'RECIBID@') {
            $this->mensaje('Nota de Entrega RECIBID@ en Gold Coast.  No admite cambios','m','d',__iHAND__);
            return;
        }
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //-------------------------
        // Acumuladores de la NDE
        //-------------------------
        $decSumaLibr = 0;
        $decSumaPies = 0;
        $decSumaVolu = 0;
        $intCantAjus = 0;
        //-----------------------------------------------------------
        // Se inician los contadores y otras propiedades del archivo
        //-----------------------------------------------------------
        $intCantRegi = 0;
        $intNumeLine = 1;
        $intCantErro = 0;
        $strMensErro = '';
        $blnErroProc = false;
        try {
            //-------------------------------
            // Se abre el archivo a procesar
            //-------------------------------
            $mixArchAgen = fopen($strNombArch,'r');
            if (!$mixArchAgen) {
                throw new Exception('No puede abrirse el archivo plano');
            }
            //----------------------------------
            // Se lee el archivo linea a linea
            //----------------------------------
            $strLineArch = fgets($mixArchAgen);
            while (!feof($mixArchAgen)) {
                $blnTodoOkey = true;
                if (strlen(trim($strLineArch)) > 0 && $intNumeLine > 1) {
                    $arrCampClie = explode(';', $strLineArch);
                    if ($arrCampClie === false) {
                        throw new Exception('Delimitador de columnas invalido. Utilice punto y coma (";")');
                    }
                    //----------------------------------------------------------
                    // Se verifica la existencia de los campos reglamentarios
                    //----------------------------------------------------------
                    t('Nro Linea: '.$intNumeLine);
                    $intCantCamp = count($arrCampClie);
                    t('Cantidad de campos: '.$intCantCamp);
                    if ($intCantCamp != 14) {
                        $strMensErro = "La linea $intNumeLine no tiene los 14 campos reglamentarios";
                        $blnTodoOkey = false;
                    }
                    //-----------------------------------------------------------------------
                    // Si to-do sale bien, se procede a verificar los datos de cada registro
                    //-----------------------------------------------------------------------
                    if ($blnTodoOkey) {
                        $arrResuVali = $this->verificarDatosMasivos($arrCampClie);
                        $blnTodoOkey = $arrResuVali['TodoOkey'];
                        $blnDestOkey = $arrResuVali['DestOkey'];
                        $strMensObse = $arrResuVali['TextErro'];
                        $strSucuDest = $arrResuVali['SucuDest'];
                        //-----------------------------------------------
                        // Variables contenidas en la linea del archivo
                        //-----------------------------------------------
                        $strNumeGuia = $arrCampClie[0];
                        $strIdxxPiez = $arrCampClie[1];
                        $strCeduDest = $arrCampClie[2];
                        $strNombDest = $arrCampClie[3];
                        $strTeleDest = $arrCampClie[4];
                        $strDireEntr = $arrCampClie[5];
                        $strSucuDest = $arrCampClie[6];
                        $strCiudDest = $arrCampClie[7];
                        $strDescCont = $arrCampClie[8];
                        $strPesoEnvi = $arrCampClie[9];
                        $strAltoEnvi = $arrCampClie[10];
                        $strAnchEnvi = $arrCampClie[11];
                        $strLargEnvi = $arrCampClie[12];
                        $strValoDecl = $arrCampClie[13];
                        //----------------------------------------------------------------
                        // Se crea un registro en la tabla guia_cacesa para cada registro
                        //----------------------------------------------------------------
                        $objGuiaMasi                      = new GuiaCacesa();
                        $objGuiaMasi->FechCarg            = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->HoraCarg            = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->Procesada           = SinoType::NO;
                        $objGuiaMasi->NumeGuia            = $strNumeGuia;
                        $objGuiaMasi->GuiaExte            = $strNumeGuia;
                        $objGuiaMasi->IdPieza             = $strIdxxPiez;
                        $objGuiaMasi->OrigGuia            = $this->objCliente->Sucursal->Iata;
                        $objGuiaMasi->NombRemi            = $this->objCliente->NombClie;
                        $objGuiaMasi->DireRemi            = $this->objCliente->DirEntregaFactura;
                        $objGuiaMasi->TeleRemi            = $this->objCliente->TeleCona;
                        $objGuiaMasi->NombDest            = utf8_decode(strtoupper($strNombDest));
                        $objGuiaMasi->DireDest            = utf8_decode(strtoupper($strDireEntr).'.'.strtoupper($strCiudDest));
                        $objGuiaMasi->TeleDest            = $strTeleDest;
                        $objGuiaMasi->CeluDest            = !is_null($strCeduDest) ? strtoupper($strCeduDest) : '.';
                        $objGuiaMasi->DestGuia            = !$blnDestOkey ? '.' : $strSucuDest;
                        $objGuiaMasi->DescCont            = utf8_decode(strtoupper($strDescCont));
                        $objGuiaMasi->CantPiez            = 0;
                        $objGuiaMasi->PesoGuia            = (float)$strPesoEnvi;
                        $objGuiaMasi->Alto                = (float)$strAltoEnvi;
                        $objGuiaMasi->Ancho               = (float)$strAnchEnvi;
                        $objGuiaMasi->Largo               = (float)$strLargEnvi;
                        $objGuiaMasi->Volumen             = ($objGuiaMasi->Alto * $objGuiaMasi->Ancho * $objGuiaMasi->Largo) / 166;
                        $objGuiaMasi->ServicioEntrega     = 'DOM';
                        $objGuiaMasi->ServicioImportacion = $this->objNotaEntr->ServicioImportacion;
                        $objGuiaMasi->RegistradoPor       = $this->objUsuario->LogiUsua;
                        $objGuiaMasi->Ajustar             = $blnTodoOkey ? SinoType::NO : SinoType::SI;
                        $objGuiaMasi->OtroDestino         = !$blnDestOkey ? $strSucuDest : null;
                        $objGuiaMasi->Observacion         = utf8_decode(strtoupper($strMensObse));
                        $objGuiaMasi->ClienteId           = $this->objCliente->CodiClie;
                        $objGuiaMasi->TarifaId            = $this->objCliente->Tarifa->Id;
                        $objGuiaMasi->ProcesoId           = $this->objProcEjec->Id;
                        $objGuiaMasi->ValorDeclarado      = strlen($strValoDecl) > 0 ? (float)$strValoDecl : 0;
                        $objGuiaMasi->NotaEntregaId       = $this->objNotaEntr->Id;
                        try {
                            $objGuiaMasi->Save();
                            //-------------------------
                            // Acumuladores de la NDE
                            //-------------------------
                            if ($this->objNotaEntr->ServicioImportacion == 'AER') {
                                $decSumaLibr += $objGuiaMasi->PesoGuia;
                            } else {
                                $decSumaPies += $objGuiaMasi->PesoGuia;
                            }
                            $decSumaVolu += $objGuiaMasi->Volumen;
                            if ($objGuiaMasi->Ajustar == SinoType::SI) {
                                $intCantAjus += 1;
                            }
                            $intCantRegi++;
                        } catch (Exception $e) {
                            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                            $arrParaErro['NumeRefe'] = 'Guia: '.$objGuiaMasi->GuiaExte.'| NDE: '.$this->objNotaEntr->Referencia;
                            $arrParaErro['MensErro'] = $e->getMessage();
                            $arrParaErro['ComeErro'] = 'Falló la Guia del Cliente ('.$this->objCliente->CodigoInterno.') durante Carga Masiva';
                            GrabarError($arrParaErro);
                            $intCantErro ++;
                            $blnErroProc = true;
                        }
                    } else {
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = 'Linea Nro: '.$intNumeLine.'| NDE: '.$this->objNotaEntr->Referencia;
                        $arrParaErro['MensErro'] = $strMensErro;
                        $arrParaErro['ComeErro'] = 'Fallo la importacion de los datos ';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $blnErroProc = true;
                    }
                }
                $intNumeLine++;
                $strLineArch = fgets($mixArchAgen);
            }
        } catch (Exception $e) {
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $strNombArch;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falla al procesar el archivo de Guias del Cliente ('.$this->objCliente->CodigoInterno.')';
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
        //--------------------------------------
        // Se actualiza la NDE con los totales
        //--------------------------------------
        $this->objNotaEntr->Libras      = $decSumaLibr;
        $this->objNotaEntr->PiesCub     = $decSumaPies;
        $this->objNotaEntr->Volumen     = $decSumaVolu;
        $this->objNotaEntr->Cargadas    = $intCantRegi;
        $this->objNotaEntr->PorCorregir = $intCantAjus;
        $this->objNotaEntr->PorProcesar = $intCantRegi - $intCantAjus;
        $this->objNotaEntr->Piezas      = $intCantRegi;
        $this->objNotaEntr->Save();
        if ($intCantRegi > 0) {
            //-------------------------------------------------------------------------------------------------
            // Si se ha importado uno o más registros, se manifiesta al usuario la posibilidad de procesar y/o
            // corregir datos, se indica la cantidad de registros cargados y se activan los procesamientos de
            // validación para determinar el estatus de actividad y/o registro.
            //-------------------------------------------------------------------------------------------------
            $strTextMens .= ' - Puede proceder a <strong>Corregir y/ Procesar los Datos</strong>';
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

        QApplication::Redirect(__SIST__.'/carga_masiva_guias.php/'.$this->objNotaEntr->Id);
    }


    protected function crearGuiaMasiva(GuiaCacesa $objGuiaMasi, $objCkptProc) {
        t('Rutina: crearGuiaMasiva');
        t('=======================');
        t('Procesando el Tracking Nro: '.$objGuiaMasi->GuiaExte);
        $objSucuDest = Sucursales::LoadByIata($objGuiaMasi->DestGuia);
        if ($objGuiaMasi->IdPieza == '001') {
            t('Procesando la guia y 1era pieza');
            //-------------------------------------------------------------
            // Se trata de la primera pieza, por lo tanto se crea la Guia
            //-------------------------------------------------------------
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
            $objGuia->Piezas                = 1;
            $objGuia->ValorDeclarado        = $objGuiaMasi->ValorDeclarado;
            $objGuia->Asegurado             = 0;
            $objGuia->Total                 = 0;
            $objGuia->CreatedBy             = $this->objUsuario->CodiUsua;
            $objGuia->VendedorId            = $this->objCliente->VendedorId;
            $objGuia->TarifaId              = $objGuiaMasi->TarifaId;
            $objGuia->Alto                  = $objGuiaMasi->Alto;
            $objGuia->Ancho                 = $objGuiaMasi->Ancho;
            $objGuia->Largo                 = $objGuiaMasi->Largo;
            $objGuia->Volumen               = $objGuiaMasi->Volumen;
            if ($objGuiaMasi->ServicioImportacion == 'AER') {
                $objGuia->Libras            = $objGuiaMasi->PesoGuia;
            } else {
                $objGuia->PiesCub           = $objGuiaMasi->PesoGuia;
            }
            $objGuia->Kilos                 = $objGuia->Libras * 0.45359237;
            $objGuia->NotaEntregaId         = $objGuiaMasi->NotaEntregaId;
            try {
                t('Voy a guardar la guia en la BD');
                $objGuia->Save();
                t('Guia creada '.$objGuia->Numero.'en la BD');
                //---------------------------------------------------
                // Una vez creada la guia, se crea la primera pieza
                //---------------------------------------------------
                $objGuia->crearPieza($objGuiaMasi, $this->objProcEjec, $objCkptProc);
                //------------------------------------------------------------------------------
                // Una vez creadas y registradas la Guía y la Pieza, se elimina la Guía Masiva
                //------------------------------------------------------------------------------
                $objGuiaMasi->Delete();
                t('Pieza creada y guia masiva borrada');
                $this->objGuiaProc = $objGuia;
                //----------------------------------
                // Se actualiza la Nota de Entrega
                //----------------------------------
                $objGuia->NotaEntrega->Procesadas  += 1;
                $objGuia->NotaEntrega->PorProcesar -= 1;
                $objGuia->NotaEntrega->Save();
            } catch (Exception $e) {
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = 'Guia: '.$objGuia->Numero;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Fallo la creacion de la Guia y su Checkpoint';
                GrabarError($arrParaErro);
                $this->arrGuiaErro[] = $objGuia->Tracking;
            }
        } else {
            //--------------------------------------------------------------------------------------
            // Si la guia en cuestion no presento errores, aquí se procesan el resto de las piezas
            //--------------------------------------------------------------------------------------
            t('Procesando la pieza: '.$objGuiaMasi->IdPieza.' del Tracking: '.$objGuiaMasi->GuiaExte);
            if (!(in_array($objGuiaMasi->GuiaExte,$this->arrGuiaErro))) {
                $this->objGuiaProc->crearPieza($objGuiaMasi, $this->objProcEjec, $objCkptProc);
                //----------------------------------
                // Se actualiza la Nota de Entrega
                //----------------------------------
                $this->objGuiaProc->NotaEntrega->Procesadas  += 1;
                $this->objGuiaProc->NotaEntrega->PorProcesar -= 1;
                $this->objGuiaProc->NotaEntrega->Save();
                //------------------------------------------------------------------------------
                // Una vez creadas y registradas la Guía y la Pieza, se elimina la Guía Masiva
                //------------------------------------------------------------------------------
                $objGuiaMasi->Delete();
            }
        }
    }
}

CargaMasivaGuias::Run('CargaMasivaGuias');
