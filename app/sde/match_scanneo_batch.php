<?php
//-----------------------------------------------------------------------------
// Programa      : match_scanneo.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 30/05/2021
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class MatchScanneoBatch extends FormularioBaseKaizen {

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
        $colNumeRefe->Name = 'Ref. Manif.';
        $colNumeRefe->Html = '<?= $_ITEM->Referencia ?>';
        $colNumeRefe->Width = 160;
        $this->dtgManiPend->AddColumn($colNumeRefe);

        $colClieMani = new QDataGridColumn($this);
        $colClieMani->Name = 'Cliente';
        $colClieMani->Html = '<?= $_ITEM->ClienteCorp->NombClie ?>';
        $colClieMani->Width = 180;
        $this->dtgManiPend->AddColumn($colClieMani);

        $colServImpo = new QDataGridColumn($this);
        $colServImpo->Name = QApplication::Translate('S.Impor');
        $colServImpo->Html = '<?= $_ITEM->ServicioImportacion ?>';
        $colServImpo->Width = 70;
        $this->dtgManiPend->AddColumn($colServImpo);

        $colCantCarg = new QDataGridColumn($this);
        $colCantCarg->Name = 'xRecibir';
        $colCantCarg->Html = '<?= $_ITEM->Piezas ?>';
        $colCantCarg->Width = 70;
        $this->dtgManiPend->AddColumn($colCantCarg);

        $colCantReci = new QDataGridColumn($this);
        $colCantReci->Name = 'Recbdas';
        $colCantReci->Html = '<?= $_ITEM->Recibidas ?>';
        $colCantReci->Width = 70;
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
        //$_SESSION['PagiBack'] = __SIST__."/match_scanneo.php";
        //$_SESSION['PagiBack'] = "match_scanneo.php";
        unset($_SESSION['PagiBack']);
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

        $strNombProc = 'Scanneo: '.date('Y-m-d h:i');
        $this->objProcEjec = CrearProceso($strNombProc);

        //----------------------------------
        // Se crear el proceso en la Cola
        //----------------------------------
        try {
            $objColaJobs = new Cola();
            $objColaJobs->ProcesoErrorId = $this->objProcEjec->Id;
            $objColaJobs->Clase          = 'NotaEntrega';
            $objColaJobs->Metodo         = 'RecibirPiezas';
            $objColaJobs->Parametros     = $this->objProcEjec->Id;
            $objColaJobs->Ejecutado      = false;
            $objColaJobs->Save();
        } catch (Exception $e) {
            $this->danger($e->getMessage());
            return;
        }

        //----------------------------------------------------
        // Se limpia y transforman los numeros de las piezas
        //----------------------------------------------------
        $arrNumePiez = explode(',',nl2br2($this->txtNumePiez->Text));
        $arrNumePiez = LimpiarArreglo($arrNumePiez, false);
        $arrNumePiez = array_map('transformar',$arrNumePiez);
        $this->txtNumePiez->Text = '';

        //-----------------------------------
        // Se procesan una a una las piezas
        //-----------------------------------
        $intCantPiez = 0;
        $intCantErro = 0;
        foreach ($arrNumePiez as $strPiezArri) {
            t("Procesando: ".$strPiezArri);
            try {
                $objPiezReci = new PiezaRecibida();
                $objPiezReci->ProcesoErrorId = $this->objProcEjec->Id;
                $objPiezReci->IdPieza        = $strPiezArri;
                $objPiezReci->IsRecibida     = false;
                $objPiezReci->Save();
                $intCantPiez ++;
            } catch (Exception $e) {
                $intCantErro++;
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strPiezArri;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Grabando la pieza en la tabla piezas_recibida';
                GrabarError($arrParaErro);
                t('Error grabando en pieza_recibida: '.$e->getMessage());
            }
        }
        $strTextMens = "Total Recibidas: $intCantPiez | Errores: $intCantErro";

        if ($intCantErro) {
            $this->btnErroProc->Visible = true;
            $this->warning($strTextMens);
        } else {
            $this->success($strTextMens);
        }
    }

}

MatchScanneoBatch::Run('MatchScanneoBatch');
?>