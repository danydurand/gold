<?php
//-----------------------------------------------------------------------------
// Programa      : recepcion_carga.php
// Realizado por : Juan Duran
// Fecha Elab.   : 24/02/2017
// Descripcion   : Este programa muestra un formulario con los campos 
//                 requeridos para registrar la carga recibida.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CambiarEstatusManifiesto extends FormularioBaseKaizen {
    protected $txtNumeCont;
    protected $objProcEjec;
    protected $btnErroProc;
    /* @var $objManiProc NotaEntrega */
    protected $objManiProc;
    protected $lstCkptMani;
    protected $txtComeCkpt;
    protected $dtgCkptMani;
    protected $blnEditMode = true;


    protected function SetupValores() {
        $intIdxxMani = QApplication::PathInfo(0);
        $strOpciAdic = QApplication::PathInfo(1);
        $this->objManiProc = NotaEntrega::Load($intIdxxMani);
        if (!$this->objManiProc) {
            $this->danger('No Existe el Manifiesto');
            $this->blnTodoOkey = false;
        }
        $_SESSION['ValiRepe'] = Parametros::BuscarParametro('VALIREPE','CKPTREPE','Val1',1);
        $this->blnEditMode = (!is_null($strOpciAdic) && $strOpciAdic == 'sc') ? false : true;
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Cambiar Estatus Manifiesto';

        $this->SetupValores();

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->txtNumeCont_Create();
        $this->lstCkptMani_Create();
        $this->txtComeCkpt_Create();
        $this->dtgCkptMani_Create();
        $this->btnErroProc_Create();

        $this->txtNumeCont = disableControl($this->txtNumeCont);
        if (!$this->blnEditMode) {
            $this->lblTituForm->Text = 'Consulta Estatus Manifiesto';
            $this->lstCkptMani->Visible = false;
            $this->txtComeCkpt->Visible = false;
            $this->btnSave->Visible     = false;
        }
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtNumeCont_Create() {
        $this->txtNumeCont = new QTextBox($this);
        $this->txtNumeCont->Name = QApplication::Translate('Manifiesto');
        $this->txtNumeCont->Width = 200;
        $this->txtNumeCont->Required = true;
        if ($this->blnTodoOkey) {
            $this->txtNumeCont->Text = $this->objManiProc->Referencia;
        }
    }

    protected function lstCkptMani_Create() {
        $this->lstCkptMani = new QListBox($this);
        $this->lstCkptMani->Name = 'Estatus';
        $this->lstCkptMani->Required = true;
        $this->lstCkptMani->AddItem('- Seleccione Uno -',null);
        //--------------------------------------------------------------------------
        // Aqui se controla la gestion de los Checkpoints, en funcion del estatus
        // del Manifiesto
        //--------------------------------------------------------------------------
        if ($this->blnTodoOkey) {
            $this->cargarCheckpints();
        }
    }

    protected function cargarCheckpints() {
        $objUltiCkpt = $this->objManiProc->ultimoCheckpoint();
        $arrProxVali = ['TI','TD'];
        if ($objUltiCkpt instanceof NotaEntregaCkpt) {
            $strUltiCkpt = $objUltiCkpt->Checkpoint->Codigo;
            if ($strUltiCkpt == 'MC') {
                $arrProxVali = ['TI','TD'];
            }
            if ($strUltiCkpt == 'TI') {
                $arrProxVali = ['TD','IC'];
            }
            if ($strUltiCkpt == 'IC') {
                $arrProxVali = ['CR'];
            }
            if ($strUltiCkpt == 'CR') {
                $arrProxVali = [];
            }
            if ($strUltiCkpt == 'RA') {
                $arrProxVali = ['OK'];
            }
        }
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Checkpoints()->Codigo,$arrProxVali);
        $arrCkptVali   = Checkpoints::QueryArray(QQ::AndCondition($objClauWher));
        foreach ($arrCkptVali as $objCkptVali) {
            $this->lstCkptMani->AddItem($objCkptVali->__toString(), $objCkptVali->Id);
        }
    }

    protected function txtComeCkpt_Create() {
        $this->txtComeCkpt = new QTextBox($this);
        $this->txtComeCkpt->Name = QApplication::Translate('Comentario');
        $this->txtComeCkpt->Width = 300;
        $this->txtComeCkpt->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = TextoIcono('eye','Error(es)','F','lg');
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
    }

    protected function dtgCkptMani_Create() {

        $this->dtgCkptMani = new NotaEntregaCkptDataGrid($this);
        $this->dtgCkptMani->FontSize = 13;
        $this->dtgCkptMani->ShowFilter = false;

        $this->dtgCkptMani->CssClass = 'datagrid';
        $this->dtgCkptMani->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgCkptMani->Paginator = new QPaginator($this->dtgCkptMani);
        $this->dtgCkptMani->ItemsPerPage = 12; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $this->dtgCkptMani->SortColumnIndex = 0;
        $this->dtgCkptMani->SortDirection   = 1;

        $this->dtgCkptMani->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgCkptMani->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgCkptMani->MetaAddColumn('Id');
        $this->dtgCkptMani->MetaAddColumn(QQN::NotaEntregaCkpt()->Checkpoint);
        $this->dtgCkptMani->MetaAddColumn(QQN::NotaEntregaCkpt()->Sucursal->Iata,'Name=Suc');
        $colFechCkpt = new QDataGridColumn('Fecha','<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>');
        $this->dtgCkptMani->AddColumn($colFechCkpt);
        $this->dtgCkptMani->MetaAddColumn('Hora');
        $this->dtgCkptMani->MetaAddColumn('Observacion');
        $this->dtgCkptMani->MetaAddColumn('Usuario');

        $this->dtgCkptMani->SetDataBinder('dtgCkptMani_Binder');
    }


    protected function dtgCkptMani_Binder(){
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::NotaEntregaCkpt()->ContainerId,$this->objManiProc->Id);
        $arrCkptMani   = NotaEntregaCkpt::QueryArray(QQ::AndCondition($objClauWher));
        $intCantRegi   = count($arrCkptMani);
        if ($intCantRegi > 10){
            $this->dtgCkptMani->TotalItemCount = count($arrCkptMani);
        }
        // Bind the datasource to the datagrid
        $this->dtgCkptMani->DataSource = NotaEntregaCkpt::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgCkptMani->OrderByClause, $this->dtgCkptMani->LimitClause)
        );

    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnErroProc_Click() {
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function btnCancel_Click() {
        if ($_SESSION['PagiBack']) {
            $strPagiReto = $_SESSION['PagiBack'];
        } else {
            $objUltiAcce = PilaAcceso::Pop('D');
            $strPagiReto = $objUltiAcce->__toString();
        }
        QApplication::Redirect(__SIST__."/".$strPagiReto);
    }


    protected function btnSave_Click() {
        $strNombProc = 'Cambiando estatus del Manifiesto: '.$this->objManiProc->Referencia;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        $this->mensaje();

        $intCodiRuta = '';
        $intContMani = 0;
        $intContCkpt = 0;
        $intCantErro = 0;
        $strRefeMani = $this->objManiProc->Referencia;
        $strComeCkpt = trim($this->txtComeCkpt->Text);
        $objCkptMani = Checkpoints::Load($this->lstCkptMani->SelectedValue);
        t('Procesando piezas del Manifiesto');
        //---------------------------------------------------------------------------
        // Ahora se procesan las piezas asociadas al Precinto en forma individual
        // es decir, aquellas que no estan asociadas a una Valija
        //---------------------------------------------------------------------------
        $arrIdsxGuia   = $this->objManiProc->IdsDeLasGuias();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::GuiaPiezas()->GuiaId,$arrIdsxGuia);
        $arrPiezMani   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
        if ($arrPiezMani) {
            t('La master tiene: '.count($arrPiezMani).' piezas');
            foreach ($arrPiezMani as $objPiezMani) {
                //--------------------------------------------
                // Se registra un checkpoint para cada pieza
                //--------------------------------------------
                try {
                    t('Procesando la pieza: '.$objPiezMani->IdPieza);
                    if (strlen($strComeCkpt) > 0) {
                        $strDescCkpt = $objCkptMani->Descripcion . " (" .$strComeCkpt. ")";
                    } else {
                        $strDescCkpt = $objCkptMani->Descripcion;
                    }
                    $arrDatoCkpt = array();
                    $arrDatoCkpt['NumePiez'] = $objPiezMani->IdPieza;
                    $arrDatoCkpt['GuiaAnul'] = $objPiezMani->Guia->Anulada();
                    $arrDatoCkpt['CodiCkpt'] = $objCkptMani->Id;
                    $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
                    $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                    $arrDatoCkpt['NotiCkpt'] = $objCkptMani->Notificar;
                    $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                    if ($arrResuGrab['TodoOkey']) {
                        $intContCkpt++;
                        t('Contador: '.$intContCkpt);
                    } else {
                        throw new Exception($arrResuGrab['MotiNook']);
                    }
                } catch (Exception $e) {
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = 'Pieza: '.$objPiezMani->IdPieza;
                    $arrParaErro['MensErro'] = $e->getMessage();
                    $arrParaErro['ComeErro'] = 'Grabando Ckpt a la Pieza';
                    GrabarError($arrParaErro);
                    $intCantErro ++;
                    t('Error grabando checkpoint a la pieza: '.$e->getMessage());
                }
            }
        }
        //---------------------------------------
        // Se graba el checkpoint al Manifiesto
        //---------------------------------------
        if ($intContCkpt > 0) {
            $arrResuGrab = $this->objManiProc->GrabarCheckpoint($objCkptMani, $this->objProcEjec, $strComeCkpt);
            if (!$arrResuGrab['TodoOkey']) {
                $intCantErro++;
            }
        }
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        $strTextMens = 'El proceso culmino con '.$intCantErro.' error(es).';
        if ($intCantErro > 0) {
            $strTextMens .= ' Presione el boton de errores para mas detalles.';
            $this->btnErroProc->Visible = true;
        }
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal      = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario     = $strTextMens;
        $this->objProcEjec->NotificarAdmin = false;
        $this->objProcEjec->Save();

        if ($intCantErro == 0) {
            $this->success($strTextMens);
        } else {
            $this->danger($strTextMens);
        }
    }



}

CambiarEstatusManifiesto::Run('CambiarEstatusManifiesto');
?>