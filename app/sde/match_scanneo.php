<?php
//-----------------------------------------------------------------------------
// Programa      : match_scanneo.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 30/05/2021
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class MatchScanneo extends FormularioBaseKaizen {

    protected $objDataBase;
    protected $txtNumePiez;  // Piezas Recibidas
    protected $dtgManiPend;  // Manifiestos con Piezas Pendientes
    protected $dtgPiezPend;  // Piezas Pendientes de un Manifiesto
    protected $objProcEjec;
    protected $btnErroProc;
    protected $intCantPiez;
    protected $arrManiPend;
    protected $intIdxxMani = null;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Match Scanneo';
        $_SESSION['ValiRepe'] = Parametros::BuscarParametro('VALIREPE','CKPTREPE','Val1',1);
        if ($_SESSION['ValiRepe']) {
            t('Voy a validar Ckpt repetidos');
        }
        $this->txtNumePiez_Create();
        $this->dtgManiPend_Create();
        $this->dtgPiezPend_Create();
        $this->btnErroProc_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------


    protected function txtNumePiez_Create() {
        $this->txtNumePiez = new QTextBox($this);
        $this->txtNumePiez->Name = QApplication::Translate('Guias/Piezas');
        $this->txtNumePiez->TextMode = QTextMode::MultiLine;
        $this->txtNumePiez->Rows = 20;
        $this->txtNumePiez->Width = 230;
        $this->txtNumePiez->AddAction(new QChangeEvent(), new QAjaxAction('txtNumePiez_Change'));
    }

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = TextoIcono('eye','Error(es)','F','lg');
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
    }


    protected function dtgManiPend_Create() {
        $this->dtgManiPend = new QDataGrid($this);
        $this->dtgManiPend->FontSize = 12;
        $this->dtgManiPend->ShowFilter = false;

        $this->dtgManiPend->CssClass = 'datagrid';
        $this->dtgManiPend->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgManiPend->Paginator = new QPaginator($this->dtgManiPend);
        $this->dtgManiPend->ItemsPerPage = 20;

        $this->dtgManiPend->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgManiPend->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        /*$this->dtgManiPend->RowActionParameterHtml = '<?= $_ITEM->Id ?>';*/
        //$this->dtgManiPend->AddRowAction(new QClickEvent(), new QAjaxAction('dtgManiPendRow_Click'));

        $this->dtgManiPend->SortColumnIndex = 0;
        $this->dtgManiPend->SortDirection   = 1;

        $this->dtgManiPend->UseAjax = true;

        $this->dtgManiPend->SetDataBinder('dtgManiPend_Bind');

        $this->dtgManiPendColumns();
    }

    public function dtgManiPendRow_Click($strFormId, $strControlId, $strParameter) {
        $this->intIdxxMani = intval($strParameter);
        $this->dtgPiezPend->Refresh();
    }

    protected function dtgManiPend_Bind() {
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

        $this->arrManiPend = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgManiPend->TotalItemCount = count($this->arrManiPend);

        // Bind the datasource to the datagrid
        $this->dtgManiPend->DataSource = NotaEntrega::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgManiPend->OrderByClause, $this->dtgManiPend->LimitClause)
        );
    }

    protected function dtgManiPendColumns() {
        $colIdxxMani = new QDataGridColumn($this);
        $colIdxxMani->Name = QApplication::Translate('Id');
        $colIdxxMani->Html = '<?= $_ITEM->Id ?>';
        $colIdxxMani->Width = 60;
        $colIdxxMani->OrderByClause = QQ::OrderBy(QQN::NotaEntrega()->Id);
        $colIdxxMani->ReverseOrderByClause = QQ::OrderBy(QQN::NotaEntrega()->Id,false);
        $this->dtgManiPend->AddColumn($colIdxxMani);

        $colNumeRefe = new QDataGridColumn($this);
        $colNumeRefe->Name = QApplication::Translate('Referencia');
        $colNumeRefe->Html = '<?= $_ITEM->Referencia ?>';
        $colNumeRefe->Width = 160;
        $this->dtgManiPend->AddColumn($colNumeRefe);

        $colClieMani = new QDataGridColumn($this);
        $colClieMani->Name = QApplication::Translate('Cliente');
        $colClieMani->Html = '<?= $_ITEM->ClienteCorp->NombClie ?>';
        $colClieMani->Width = 160;
        $this->dtgManiPend->AddColumn($colClieMani);

        $colServImpo = new QDataGridColumn($this);
        $colServImpo->Name = QApplication::Translate('S.Impor');
        $colServImpo->Html = '<?= $_ITEM->ServicioImportacion ?>';
        $colServImpo->Width = 80;
        $this->dtgManiPend->AddColumn($colServImpo);

        $colCantCarg = new QDataGridColumn($this);
        $colCantCarg->Name = QApplication::Translate('PorRecibir');
        $colCantCarg->Html = '<?= $_ITEM->Piezas ?>';
        $colCantCarg->Width = 80;
        $this->dtgManiPend->AddColumn($colCantCarg);

        $colCantReci = new QDataGridColumn($this);
        $colCantReci->Name = QApplication::Translate('Recibidas');
        $colCantReci->Html = '<?= $_ITEM->Recibidas ?>';
        $colCantReci->Width = 80;
        $this->dtgManiPend->AddColumn($colCantReci);

    }

    protected function dtgPiezPend_Create() {
        $this->dtgPiezPend = new QDataGrid($this);
        $this->dtgPiezPend->FontSize = 12;
        $this->dtgPiezPend->ShowFilter = false;

        $this->dtgPiezPend->CssClass = 'datagrid';
        $this->dtgPiezPend->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezPend->Paginator = new QPaginator($this->dtgPiezPend);
        $this->dtgPiezPend->ItemsPerPage = 5;

        $this->dtgPiezPend->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgPiezPend->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgPiezPend->SortColumnIndex = 0;
        $this->dtgPiezPend->SortDirection   = 1;

        $this->dtgPiezPend->UseAjax = true;

        $this->dtgPiezPend->SetDataBinder('dtgPiezPend_Bind');

        $this->dtgPiezPendColumns();
    }

    protected function dtgPiezPend_Bind() {
        /* @var $objPiezMani GuiaPiezas */
        if (!is_null($this->intIdxxMani)) {
            $objManiPend = NotaEntrega::Load($this->intIdxxMani);
            $arrPiezMani = $objManiPend->piezasDeLaNota();
            $arrIdxxPend = [];
            $intCantPiez = 0;
            $intPiezPend = 0;
            foreach ($arrPiezMani as $objPiezMani) {
                if (!$objPiezMani->tieneCheckpoint('RA')) {
                    $arrIdxxPend[] = $objPiezMani->Id;
                    $intPiezPend++;
                }
                $intCantPiez++;
            }

            t('Se examinaron: '.$intCantPiez.' piezas');

            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::PiezaCheckpoints()->Id,$arrIdxxPend);

            $arrPiezPend   = PiezaCheckpoints::QueryArray(QQ::AndCondition($objClauWher));
            $this->dtgPiezPend->TotalItemCount = count($arrPiezPend);

            t('Hay: '.count($arrPiezPend).' piezas pendientes');

            // Bind the datasource to the datagrid
            $this->dtgPiezPend->DataSource = PiezaCheckpoints::QueryArray(
                QQ::AndCondition($objClauWher),
                QQ::Clause($this->dtgPiezPend->OrderByClause, $this->dtgPiezPend->LimitClause)
            );
        }
    }

    protected function dtgPiezPendColumns() {
        $colPiezIdxx = new QDataGridColumn($this);
        $colPiezIdxx->Name = QApplication::Translate('IdPieza');
        $colPiezIdxx->Html = '<?= $_ITEM->Pieza->IdPieza ?>';
        $colPiezIdxx->Width = 160;
        $this->dtgPiezPend->AddColumn($colPiezIdxx);

        $colCodiCkpt = new QDataGridColumn($this);
        $colCodiCkpt->Name = QApplication::Translate('Ckpt');
        $colCodiCkpt->Html = '<?= $_ITEM->Checkpoint->Codigo ?>';
        $colCodiCkpt->Width = 160;
        $this->dtgPiezPend->AddColumn($colCodiCkpt);

        $colFechCkpt = new QDataGridColumn($this);
        $colFechCkpt->Name = QApplication::Translate('Fecha');
        $colFechCkpt->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>';
        $colFechCkpt->Width = 80;
        $this->dtgPiezPend->AddColumn($colFechCkpt);

        $colHoraCkpt = new QDataGridColumn($this);
        $colHoraCkpt->Name = QApplication::Translate('Hora');
        $colHoraCkpt->Html = '<?= $_ITEM->Hora ?>';
        $colHoraCkpt->Width = 80;
        $this->dtgPiezPend->AddColumn($colHoraCkpt);
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function txtNumePiez_Change() {
        $this->mensaje();
    }

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = __SIST__."/match_scanneo.php/";
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function Form_Validate() {
        $this->mensaje();
        if (strlen($this->txtNumePiez->Text) == 0) {
            $this->danger('Debe especificar las Guias/Piezas que esta Recibiendo');
            return false;
        }
        return true;
    }

    protected function btnSave_Click() {
        $blnHayxErro = false;
        $strNombProc = 'Match de Scanneo';
        $this->objProcEjec = CrearProceso($strNombProc);

        $arrNumePiez = explode(',',nl2br2($this->txtNumePiez->Text));
        $arrNumePiez = array_unique($arrNumePiez);
        $arrNumePiez = array_map('transformar',$arrNumePiez);

        $this->txtNumePiez->Text = '';
        $objCkptMani = Checkpoints::LoadByCodigo('RA');
        //$objCkptAlma = Checkpoints::LoadByCodigo('IA');
        $intContCkpt = 0;
        $intCantSobr = 0;
        $arrRelaSobr = [];
        foreach ($arrNumePiez as $strPiezArri) {
            t("Procesando: ".$strPiezArri);
            if (strlen($strPiezArri) > 0) {
                $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strPiezArri);
                if (!$objGuiaPiez) {
                    $blnHayxErro = true;
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $strPiezArri;
                    $arrParaErro['MensErro'] = 'La Pieza NO Existe - Sobrante';
                    $arrParaErro['ComeErro'] = 'Chequeando la existencia de la Pieza';
                    GrabarError($arrParaErro);

                    $intCantSobr ++;
                    $arrRelaSobr[] = $strPiezArri;
                    //$this->txtNumePiez->Text = $strPiezArri.' (SOB)'. chr(13);
                    t('La pieza no existe, es un sobrante');
                    continue;
                }
                //t('La pieza existe en la BD');
                //----------------------------------------------------------
                // Se registra el checkpoint correspondiente para la pieza
                //----------------------------------------------------------
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
                $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
                $arrDatoCkpt['CodiCkpt'] = $objCkptMani->Id;
                $arrDatoCkpt['TextCkpt'] = $objCkptMani->Descripcion;
                $arrDatoCkpt['CodiRuta'] = '';
                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);

                if ($arrResuGrab['TodoOkey']) {
                    $intContCkpt++;
                    //-------------------------------------------------------
                    // Se registra tambien el Checkpoint IA para cada pieza
                    //-------------------------------------------------------
                    //$arrDatoCkpt = array();
                    //$arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
                    //$arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
                    //$arrDatoCkpt['CodiCkpt'] = $objCkptAlma->Id;
                    //$arrDatoCkpt['TextCkpt'] = $objCkptMani->Descripcion;
                    //$arrDatoCkpt['CodiRuta'] = '';
                    //$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                } else {
                    $strMensUsua = "Error al registrar Checkpoint a la pieza: " . $objGuiaPiez->IdPieza;
                    $strMensUsua .= " - " . $arrResuGrab['MotiNook'];

                    $blnHayxErro = true;
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $objGuiaPiez->IdPieza;
                    $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                    $arrParaErro['ComeErro'] = 'Registrando Checkpoint RA a la Pieza';
                    GrabarError($arrParaErro);

                    t($strMensUsua);
                }
            }
        }
        $strTextMens = "Total Recibidas: $intContCkpt | Cantidad de Sobrantes: $intCantSobr";
        //-------------------------------------------------------------------
        // Ahora, se actualiza la cantidad de Recibidas de cada manifiesto
        //-------------------------------------------------------------------
        //$objCkptMani = Checkpoints::LoadByCodigo('RA');
        /* @var $objManiPend NotaEntrega */
        foreach ($this->arrManiPend as $objManiPend) {
            $objManiPend->ContarActualizarRecibidas();
            //---------------------------------------
            // Se graba el checkpoint al Manifiesto
            //---------------------------------------
            if ($objManiPend->Recibidas > 0) {
                $arrResuGrab = $objManiPend->GrabarCheckpoint($objCkptMani, $this->objProcEjec);
                if (!$arrResuGrab['TodoOkey']) {
                    $blnHayxErro = true;
                }
            }
        }
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = true;
        $this->objProcEjec->Save();
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'ProcesoError';
        $arrLogxCamb['intRefeRegi'] = $this->objProcEjec->Id;
        $arrLogxCamb['strNombRegi'] = $this->objProcEjec->Nombre;
        $arrLogxCamb['strDescCamb'] = 'Ejecutado';
        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_list.php/'.$this->objProcEjec->Id;
        LogDeCambios($arrLogxCamb);

        if ($blnHayxErro) {
            $this->btnErroProc->Visible = true;
            $this->warning($strTextMens);
        } else {
            $this->success($strTextMens);
        }
        $this->dtgManiPend->Refresh();
    }
}

MatchScanneo::Run('MatchScanneo');
?>