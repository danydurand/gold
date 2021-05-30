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
    protected $objProcEjec;
    protected $btnErroProc;
    protected $intCantPiez;
    protected $arrManiPend;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Match Scanneo';
        $_SESSION['ValiRepe'] = Parametros::BuscarParametro('VALIREPE','CKPTREPE','Val1',1);
        if ($_SESSION['ValiRepe']) {
            t('Voy a validar Ckpt repetidos');
        }
        $this->txtNumePiez_Create();
        $this->dtgManiPend_Create();
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

        $this->dtgManiPend->UseAjax = true;

        $this->dtgManiPend->SetDataBinder('dtgManiPend_Bind');

        $this->dtgManiPendColumns();
    }

    protected function dtgManiPend_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::NotEqual(QQN::NotaEntrega()->Recibidas,QQN::NotaEntrega()->Cargadas);
        $this->arrManiPend = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgManiPend->TotalItemCount = count($this->arrManiPend);

        // Bind the datasource to the datagrid
        $this->dtgManiPend->DataSource = NotaEntrega::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgManiPend->OrderByClause, $this->dtgManiPend->LimitClause)
        );
    }

    protected function dtgManiPendColumns() {
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
        $colCantCarg->Name = QApplication::Translate('Cargadas');
        $colCantCarg->Html = '<?= $_ITEM->Cargadas ?>';
        $colCantCarg->Width = 80;
        $this->dtgManiPend->AddColumn($colCantCarg);

        $colCantReci = new QDataGridColumn($this);
        $colCantReci->Name = QApplication::Translate('Recibidas');
        $colCantReci->Html = '<?= $_ITEM->Recibidas ?>';
        $colCantReci->Width = 80;
        $this->dtgManiPend->AddColumn($colCantReci);

    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

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
        $objCkptRece = Checkpoints::LoadByCodigo('RA');
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
                $arrDatoCkpt['CodiCkpt'] = $objCkptRece->Id;
                $arrDatoCkpt['TextCkpt'] = $objCkptRece->Descripcion;
                $arrDatoCkpt['CodiRuta'] = '';
                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);

                if ($arrResuGrab['TodoOkey']) {
                    $intContCkpt++;
                    //t("Ya grabe el checkpoint para la pieza. Van: " . $intContCkpt . " checkpoints grabados");
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
        /* @var $objManiPend NotaEntrega */
        foreach ($this->arrManiPend as $objManiPend) {
            $objManiPend->ContarActualizarRecibidas();
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