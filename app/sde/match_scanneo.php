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
    protected $intIdxxMani = null;
    protected $btnBuscPiez;
    protected $arrReceQtys;


    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Match Scanneo';
        $_SESSION['ValiRepe'] = Parametros::BuscarParametro('VALIREPE','CKPTREPE','Val1',1);
        $this->txtNumePiez_Create();
        $this->dtgManiPend_Create();
        $this->btnErroProc_Create();
        $this->btnBuscPiez_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function btnBuscPiez_Create() {
        $this->btnBuscPiez = new QButtonP($this);
        $this->btnBuscPiez->Text = TextoIcono('search','Buscar Scanneo MIA','F','lg');
        $this->btnBuscPiez->AddAction(new QClickEvent(), new QServerAction('btnBuscPiez_Click'));
    }

    protected function btnBuscPiez_Click() {
        QApplication::Redirect(__SIST__.'/buscar_pieza_mia.php');
    }


    protected function txtNumePiez_Create() {
        $this->txtNumePiez = new QTextBox($this);
        $this->txtNumePiez->Placeholder = QApplication::Translate('Guias/Piezas');
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

        $this->dtgManiPend->SortColumnIndex = 0;
        $this->dtgManiPend->SortDirection   = 1;

        $this->dtgManiPend->UseAjax = true;

        $this->dtgManiPend->SetDataBinder('dtgManiPend_Bind');

        $this->dtgManiPendColumns();
    }

    public function dtgManiPendRow_Click($strFormId, $strControlId, $strParameter) {
        $this->intIdxxMani = intval($strParameter);
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
        $dttFechLimi = SumaRestaDiasAFecha(date('Y-m-d'),50,'-');
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
        $objClauWher[] = QQ::GreaterThan(QQN::NotaEntrega()->Fecha,$dttFechLimi);

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
        $colServImpo->HorizontalAlign = QHorizontalAlign::Center;
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

        $colUltiCkpt = new QDataGridColumn($this);
        $colUltiCkpt->Name = 'Status';
        $colUltiCkpt->Html = '<?= $_ITEM->ultimoCheckpoint()->Checkpoint->Codigo ?>';
        $colUltiCkpt->Width = 70;
        $colUltiCkpt->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgManiPend->AddColumn($colUltiCkpt);

        $colEstaAdel = new QDataGridColumn($this);
        $colEstaAdel->Name = 'Recibio?';
        $colEstaAdel->Html = '<?= $_FORM->newQty_Render($_ITEM) ?>';
        $colEstaAdel->Width = 70;
        $colEstaAdel->HtmlEntities = false;
        $colEstaAdel->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgManiPend->AddColumn($colEstaAdel);
    }


    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    public function newQty_Render($objManiPend) {
        if (count($this->arrReceQtys) > 0) {
            $intPrevRece = $this->arrReceQtys[$objManiPend->Id];
            if ($intPrevRece < $objManiPend->Recibidas) {
                $strNombImag = __APP_IMAGE_ASSETS__.'/punto_verde.gif';
                return "<img src='$strNombImag'>";
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
    
    
    protected function txtNumePiez_Change() {
        $this->mensaje();
    }

    protected function btnErroProc_Click() {
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

    protected function keepReceivedQtys($intProcIdxx) {
        //-----------------------------------------------------------------------------
        // We save in the database how many received pieces every manifest has
        // This will allows knowing if there are any new received pieces in each one.
        //-----------------------------------------------------------------------------
        $strCadeText = '';
        foreach ($this->arrManiPend as $objManiPend) {
            $intCantReci = $objManiPend->Recibidas ? $objManiPend->Recibidas : 0;
            $strCadeText .= $objManiPend->Id.'|'.$intCantReci.',';
        }
        $strDescPara = 'Qtys received in Match Scanneo: '.$intProcIdxx.
        $objParaQtys = new Parametros();
        $objParaQtys->Indice      = 'ReceQtys';
        $objParaQtys->Codigo      = $intProcIdxx;
        $objParaQtys->Descripcion = $strDescPara;
        $objParaQtys->Texto1      = $strCadeText;
        $objParaQtys->Save();
    }

    protected function getPreviousReceivedQtys($intProcIdxx) {
        //-------------------------------------------------------------
        // We get the previos received quantities from every manifest
        //-------------------------------------------------------------
        $objParaQtys = Parametros::LoadByIndiceCodigo('ReceQtys',$intProcIdxx);
        if ($objParaQtys) {
            $arrPrevRece = explode(',',$objParaQtys->Texto1);
            t($arrPrevRece);
            foreach ($arrPrevRece as $strPrevRece) {
                $arrManiAuxi = explode('|',$strPrevRece);
                if (count($arrManiAuxi) > 1) {
                    list($intManiIdxx, $intPrevRece) = explode('|',$strPrevRece);
                }
                $this->arrReceQtys[$intManiIdxx] = $intPrevRece;
            }
        }
    }
    

    protected function btnSave_Click() {
        $time_start = microtime(true);

        $objDataBase = MatchPieces::GetDatabase();
        $intCodiUsua  = $this->objUsuario->CodiUsua;
        //------------------------------------------------
        // Deleting previous records related to the User
        //------------------------------------------------
        // t('Deleting previous records related to the User...');
        $strCadeSqlx  = "call spu_delete_user_records($intCodiUsua)";
        $objDataBase->NonQuery($strCadeSqlx);

        $blnHayxErro = false;
        $strNombProc = 'Match Scanneo';
        $this->objProcEjec = CrearProceso($strNombProc);
        $intProcIdxx = $this->objProcEjec->Id;

        $this->keepReceivedQtys($intProcIdxx);

        $arrNumePiez = explode(',', nl2br2($this->txtNumePiez->Text));
        $arrNumePiez = array_unique($arrNumePiez);
        $arrNumePiez = array_map('transformar', $arrNumePiez);

        $intCantReci = 0;
        $intCantSobr = 0;
        $intUsuaIdxx = $this->objUsuario->CodiUsua;
        $this->txtNumePiez->Text = '';
        $objCkptMani = Checkpoints::LoadByCodigo('RA');

        //----------------------------------------------------------------
        // Every single piece must be inserted in the match_pieces table
        //----------------------------------------------------------------
        // t('Inserting pieces in match_pieces table...');
        $strCadeSqlx  = "insert ";
        $strCadeSqlx .= "  into match_pieces ";
        $strCadeSqlx .= "       (proceso_error_id, id_pieza, is_leftover, is_cycle_completed, created_at, created_by) ";
        $strCadeSqlx .= "values ";
        foreach ($arrNumePiez as $strPiezArri) {
            if (strlen($strPiezArri) > 0) {
                $strPiezArri = trim($strPiezArri);
                $strCadeSqlx .= "($intProcIdxx, '$strPiezArri', 0, 0, current_date(), $intUsuaIdxx),";
                $intCantReci++;
            }
        }
        $strCadeSqlx = substr($strCadeSqlx,0,strlen($strCadeSqlx)-1);
        $objDataBase->NonQuery($strCadeSqlx);

        // t('Detecting leftover, completed and pieces ids...');
        //------------------------------------------------------------------------
        // Detecting leftover and completed pieces. Counting each of those types 
        //------------------------------------------------------------------------
        $strCadeSqlx  = "call spu_detect_leftover_and_pieces_ids($intProcIdxx, @leftover_qty, @cycle_completed_qty)";
        $objDataBase->NonQuery($strCadeSqlx);
        $strCadeSqlx  = "select @leftover_qty, @cycle_completed_qty";
        $objDbResult  = $objDataBase->Query($strCadeSqlx);
        $mixRegistro  = $objDbResult->FetchArray();
        $intCantSobr  = $mixRegistro['@leftover_qty'];
        $intCantOkey  = $mixRegistro['@cycle_completed_qty'];
        $intCantReci -= ($intCantSobr + $intCantOkey);
        //------------------------------------------------------
        // Inserting received checkpoint to the rest of pieces
        //------------------------------------------------------
        // t('Inserting received checkpoint to the rest of pieces');
        $intCodiCkpt  = $objCkptMani->Id;
        $intCodiSucu  = $this->objUsuario->SucursalId;
        $strTextCkpt  = $objCkptMani->Descripcion;
        try {
            $strCadeSqlx  = "call spu_insert_received_checkpoint($intCodiCkpt, $intCodiSucu, '$strTextCkpt', $intCodiUsua, $intProcIdxx) ";
            $objDataBase->NonQuery($strCadeSqlx);
        } catch (Exception $e) {
            t('Error: '.$e->getMessage());
        }
        $strTextMens = "Total Recibidas: $intCantReci | Cantidad de Sobrantes: $intCantSobr";
        //---------------------------------------------------------------------------------------
        // The leftover pieces must be register in error detail table to be watched by the User
        //---------------------------------------------------------------------------------------
        // t('Inserting leftover and completed pieces in error table');
        $strCadeSqlx  = "call spu_insert_pieces_with_error_in_error_table($intProcIdxx)";
        $objDataBase->NonQuery($strCadeSqlx);
        if ($intCantReci > 0) {
            //-----------------------------------------------
            // Last Checkpoint Update in guia_pieces table 
            //-----------------------------------------------
            // t('Updating last checkpoint...');
            UpdateLastCheckpoint();
            //-------------------------------------------------------------------
            // Ahora, se actualiza la cantidad de Recibidas de cada manifiesto
            //-------------------------------------------------------------------
            // t('Updating received quantities...');
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
            $this->getPreviousReceivedQtys($this->objProcEjec->Id);
            $this->dtgManiPend->Refresh();
        }
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = false;
        $this->objProcEjec->Save();
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $time_end = microtime(true);

        $time = formatPeriod($time_end, $time_start);
        $strTextMens .= " (Tiempo => $time)";

        $arrLogxCamb['strNombTabl'] = 'ProcesoError';
        $arrLogxCamb['intRefeRegi'] = $this->objProcEjec->Id;
        $arrLogxCamb['strNombRegi'] = $this->objProcEjec->Nombre;
        $arrLogxCamb['strDescCamb'] = $strTextMens;
        $arrLogxCamb['strEnlaEnti'] = __SIST__ . '/proceso_error_list.php/' . $this->objProcEjec->Id;
        LogDeCambios($arrLogxCamb);

        $blnHayxErro = $intCantSobr;
        if ($blnHayxErro) {
            $this->btnErroProc->Visible = true;
            $this->warning($strTextMens);
        } else {
            $this->success($strTextMens);
        }
        // t('Process finished: '. date('H:i:s'));
    }


    protected function btnSave_ClickOld() {
        // t('Executing Match Scanneo');
        // t('=======================');

        $time_start = microtime(true);

        t('Begining time: '.date('H:i:s'));

        $objDataBase = MatchPieces::GetDatabase();
        $intCodiUsua  = $this->objUsuario->CodiUsua;   

        //------------------------------------------------
        // Deleting previous records related to the User
        //------------------------------------------------
        // t('Partial time: ' . date('H:i:s'));
        // t('Deleting previous records related to the User...');
        $strCadeSqlx  = "delete ";
        $strCadeSqlx .= "  from match_pieces ";
        $strCadeSqlx .= " where created_by = $intCodiUsua ";
        $objDataBase->NonQuery($strCadeSqlx);

        $blnHayxErro = false;
        $strNombProc = 'Match Scanneo';
        $this->objProcEjec = CrearProceso($strNombProc);
        $intProcIdxx = $this->objProcEjec->Id;

        $this->keepReceivedQtys($intProcIdxx);

        $arrNumePiez = explode(',', nl2br2($this->txtNumePiez->Text));
        $arrNumePiez = array_unique($arrNumePiez);
        $arrNumePiez = array_map('transformar', $arrNumePiez);

        $intCantReci = 0;
        $intCantSobr = 0;
        $this->txtNumePiez->Text = '';
        $objCkptMani = Checkpoints::LoadByCodigo('RA');

        //----------------------------------------------------------------
        // Every single piece must be inserted in the match_pieces table
        //----------------------------------------------------------------
        // t('Partial time: ' . date('H:i:s'));
        // t('Inserting pieces in match_pieces table...');
        foreach ($arrNumePiez as $strPiezArri) {
            if (strlen($strPiezArri) > 0) {
                // t("Processing: " . $strPiezArri);
                $objMatcPice = new MatchPieces();
                $objMatcPice->ProcesoErrorId   = $intProcIdxx;
                $objMatcPice->IdPieza          = $strPiezArri;
                $objMatcPice->IsLeftover       = false;
                $objMatcPice->IsCycleCompleted = false;
                $objMatcPice->CreatedAt        = new QDateTime(QDateTime::Now());
                $objMatcPice->CreatedBy        = $this->objUsuario->CodiUsua;
                $objMatcPice->Save();
                $intCantReci++;
            }
        }
        // t('Partial time: ' . date('H:i:s'));
        // t('Detecting leftover pieces...');
        //----------------------------
        // Detecting leftover pieces
        //----------------------------
        $strCadeSqlx  = "update match_pieces ";
        $strCadeSqlx .= "   set is_leftover = 1 ";
        $strCadeSqlx .= " where proceso_error_id = $intProcIdxx ";
        $strCadeSqlx .= "   and id_pieza not in (select id_pieza ";
        $strCadeSqlx .= "                          from guia_piezas)";
        $objDataBase->NonQuery($strCadeSqlx);
        //---------------------------
        // Counting leftover pieces
        //---------------------------
        // t('Partial time: ' . date('H:i:s'));
        // t('Counting leftover pieces...');
        $strCadeSqlx  = "select count(*) as cant_sobr ";
        $strCadeSqlx .= "  from match_pieces ";
        $strCadeSqlx .= " where is_leftover = 1 ";
        $strCadeSqlx .= "   and proceso_error_id = $intProcIdxx ";
        $objDbResult  = $objDataBase->Query($strCadeSqlx);
        $mixRegistro  = $objDbResult->FetchArray();
        $intCantSobr  = $mixRegistro['cant_sobr'];
        $intCantReci -= $intCantSobr;
        //-----------------------------------
        // Getting the existent pieces' ids
        //-----------------------------------
        // t('Partial time: ' . date('H:i:s'));
        // t('Getting the existent pieces\' ids');
        $strCadeSqlx  = "update match_pieces";
        $strCadeSqlx .= "   set match_pieces.pieza_id = (select guia_piezas.id ";
        $strCadeSqlx .= "                                  from guia_piezas ";
        $strCadeSqlx .= "                                 where guia_piezas.id_pieza = match_pieces.id_pieza), ";
        $strCadeSqlx .= "   set match_pieces.is_cycle_completed = (select guia_piezas.is_cycle_completed ";
        $strCadeSqlx .= "                                            from guia_piezas ";
        $strCadeSqlx .= "                                           where guia_piezas.id_pieza = match_pieces.id_pieza) ";
        $strCadeSqlx .= " where match_pieces.proceso_error_id = $intProcIdxx ";
        $strCadeSqlx .= "   and match_pieces.is_leftover = 0 ";
        $objDataBase->NonQuery($strCadeSqlx);
        //------------------------------------------------------
        // Inserting received checkpoint to the rest of pieces
        //------------------------------------------------------
        // t('Partial time: ' . date('H:i:s'));
        // t('Inserting received checkpoint to the rest of pieces');
        
        $intCodiCkpt  = $objCkptMani->Id;
        $intCodiSucu  = $this->objUsuario->SucursalId;
        $strTextCkpt  = $objCkptMani->Descripcion;

        $strCadeSqlx  = "insert ";
        $strCadeSqlx .= "  into pieza_checkpoints ";
        $strCadeSqlx .= "       (pieza_id, checkpoint_id, sucursal_id, fecha, hora, comentario, created_at, created_by) ";
        $strCadeSqlx .= "select match_pieces.pieza_id, ";
        $strCadeSqlx .= "       $intCodiCkpt, ";
        $strCadeSqlx .= "       $intCodiSucu, ";
        $strCadeSqlx .= "       CURRENT_DATE(), ";
        $strCadeSqlx .= "       SUBSTR(CURTIME(),1,5), ";
        $strCadeSqlx .= "       '$strTextCkpt', ";
        $strCadeSqlx .= "       CURRENT_DATE(), ";
        $strCadeSqlx .= "       $intCodiUsua ";
        $strCadeSqlx .= "  from match_pieces ";
        $strCadeSqlx .= " where match_pieces.proceso_error_id = $intProcIdxx ";
        $strCadeSqlx .= "   and match_pieces.is_leftover = 0 ";
        $strCadeSqlx .= "   and match_pieces.pieza_id is not null ";
        $objDataBase->NonQuery($strCadeSqlx);

        $strTextMens = "Total Recibidas: $intCantReci | Cantidad de Sobrantes: $intCantSobr";
        //---------------------------------------------------------------------------------------
        // The leftover pieces must be register in error detail table to be watched by the User
        //---------------------------------------------------------------------------------------
        $strCadeSqlx  = "insert ";
        $strCadeSqlx .= "  into detalle_error ";
        $strCadeSqlx .= "       (proceso_id, referencia, mensaje_error, comentario) ";
        $strCadeSqlx .= "select $intProcIdxx, ";
        $strCadeSqlx .= "       id_pieza, ";
        $strCadeSqlx .= "       'La Pieza NO Existe - Sobrante', ";
        $strCadeSqlx .= "       'Match Scanneo' ";
        $strCadeSqlx .= "  from match_pieces ";
        $strCadeSqlx .= " where match_pieces.proceso_error_id = $intProcIdxx ";
        $strCadeSqlx .= "   and match_pieces.is_leftover = 1 ";
        $objDataBase->NonQuery($strCadeSqlx);
        //-------------------------------------------------------------------------------------------------------
        // The pieces which cycle is complete, must be register in error detail table to be watched by the User
        //-------------------------------------------------------------------------------------------------------
        t('Partial time: ' . date('H:i:s'));
        t('Inserting cycle completed pieces in error table');
        $strCadeSqlx  = "insert ";
        $strCadeSqlx .= "  into detalle_error ";
        $strCadeSqlx .= "       (proceso_id, referencia, mensaje_error, comentario) ";
        $strCadeSqlx .= "select $intProcIdxx, ";
        $strCadeSqlx .= "       id_pieza, ";
        $strCadeSqlx .= "       'Pieza Entregada - No Admite Incidencias', ";
        $strCadeSqlx .= "       'Match Scanneo' ";
        $strCadeSqlx .= "  from match_pieces ";
        $strCadeSqlx .= " where match_pieces.proceso_error_id = $intProcIdxx ";
        $strCadeSqlx .= "   and match_pieces.is_cycle_completed = 1 ";
        $objDataBase->NonQuery($strCadeSqlx);
        //-----------------------------------------------
        // Last Checkpoint Update in guia_pieces table 
        //-----------------------------------------------
        // t('Partial time: ' . date('H:i:s'));
        // t('Updating last checkpoint...');
        UpdateLastCheckpoint();
        //-------------------------------------------------------------------
        // Ahora, se actualiza la cantidad de Recibidas de cada manifiesto
        //-------------------------------------------------------------------
        // t('Partial time: ' . date('H:i:s'));
        // t('Updating received quantities...');
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
        $this->objProcEjec->NotificarAdmin = false;
        $this->objProcEjec->Save();
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'ProcesoError';
        $arrLogxCamb['intRefeRegi'] = $this->objProcEjec->Id;
        $arrLogxCamb['strNombRegi'] = $this->objProcEjec->Nombre;
        $arrLogxCamb['strDescCamb'] = $strTextMens;
        $arrLogxCamb['strEnlaEnti'] = __SIST__ . '/proceso_error_list.php/' . $this->objProcEjec->Id;
        LogDeCambios($arrLogxCamb);

        $this->getPreviousReceivedQtys($this->objProcEjec->Id);
        $this->dtgManiPend->Refresh();

        $time_end = microtime(true);

        $time = formatPeriod($time_end,$time_start);
        $strTextMens .= " ($time)";

        $blnHayxErro = $intCantSobr;
        if ($blnHayxErro) {
            $this->btnErroProc->Visible = true;
            $this->warning($strTextMens);
        } else {
            $this->success($strTextMens);
        }
        t('Process finished: '. date('H:i:s'));
    }


    protected function btnSave_ClickOld2() {
        $time_start = microtime(true);

        t('Begining time: '.date('H:i:s'));


        $blnHayxErro = false;
        $strNombProc = 'Match Scanneo';
        $this->objProcEjec = CrearProceso($strNombProc);

        $this->keepReceivedQtys($this->objProcEjec->Id);

        $arrNumePiez = explode(',',nl2br2($this->txtNumePiez->Text));
        $arrNumePiez = array_unique($arrNumePiez);
        $arrNumePiez = array_map('transformar',$arrNumePiez);

        $this->txtNumePiez->Text = '';
        $objCkptMani = Checkpoints::LoadByCodigo('RA');
        $intContCkpt = 0;
        $intCantSobr = 0;
        $arrRelaSobr = [];
        foreach ($arrNumePiez as $strPiezArri) {
            if (strlen($strPiezArri) > 0) {
                // t("Procesando: ".$strPiezArri);
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
                    // t('La pieza no existe, es un sobrante');
                    continue;
                }
                //t('La pieza existe en la BD');
                //----------------------------------------------------------
                // Se registra el checkpoint correspondiente para la pieza
                //----------------------------------------------------------
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
                $arrDatoCkpt['GuiaAnul'] = false; //$objGuiaPiez->Guia->Anulada();
                $arrDatoCkpt['CodiCkpt'] = $objCkptMani->Id;
                $arrDatoCkpt['TextCkpt'] = $objCkptMani->Descripcion;
                $arrDatoCkpt['CodiRuta'] = '';
                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);

                if ($arrResuGrab['TodoOkey']) {
                    $intContCkpt++;
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
        //-----------------------------------------------
        // Last Checkpoint Update in guia_pieces table 
        //-----------------------------------------------
        UpdateLastCheckpoint();
        //-------------------------------------------------------------------
        // Ahora, se actualiza la cantidad de Recibidas de cada manifiesto
        //-------------------------------------------------------------------
        /* @var $objManiPend NotaEntrega */
        foreach ($this->arrManiPend as $objManiPend) {
            $objManiPend->ContarActualizarRecibidas();
            //---------------------------------------
            // Se graba el checkpoint al Manifiesto
            //---------------------------------------
            // $strUltiCkpt = $objManiPend->ultimoCheckpoint()->Checkpoint->Codigo;
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


        $this->getPreviousReceivedQtys($this->objProcEjec->Id);
        $this->dtgManiPend->Refresh();

        $time_end = microtime(true);

        // $time = $time_end - $time_start;
        $time = formatPeriod($time_end, $time_start);

        $strTextMens .= " ($time)";

        if ($blnHayxErro) {
            $this->btnErroProc->Visible = true;
            $this->warning($strTextMens);
        } else {
            $this->success($strTextMens);
        }
        t('Process finished: ' . date('H:i:s'));
    }
}

MatchScanneo::Run('MatchScanneo');
?>