<?php
//--------------------------------------------------------------------------------------
// Programa      : ready_to_go.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 06/01/2022
// Descripcion   : This form allows marking the piece's of awbs like "Ready To Go"
//                 which means: the customer already pays the shipments and as a result
//                 the pieces are ready to go out, to be nationwide distributed.
//--------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ReadyToGo extends FormularioBaseKaizen {
    protected $strCadeSqlx;
    protected $objDataBase;
    protected $txtAwbsNumb;
    protected $intContRegi;
    protected $txtTextObse;
    protected $arrPiecRead;
    protected $objProcEjec;


    protected function SetupValores() {
        if (isset($_SESSION['PiecRead'])) {
            $this->arrPiecRead = $_SESSION['PiecRead'];
            unset($_SESSION['PiecRead']);
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->lblTituForm->Text = 'Ready To Go';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->txtAwbsNumb_Create();

        $this->intContRegi = 0;
    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------

    protected function txtAwbsNumb_Create() {
        $this->txtAwbsNumb = new QTextBox($this);
        $this->txtAwbsNumb->Name = QApplication::Translate("Nros de Guias");
        $this->txtAwbsNumb->Required = true;
        $this->txtAwbsNumb->TextMode = QTextMode::MultiLine;
        $this->txtAwbsNumb->Height = 250;
        $this->txtAwbsNumb->Width = 250;
        if (count($this->arrPiecRead) > 0) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::GuiaPiezas()->Id,$this->arrPiecRead);
            $arrPiecRead   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
            foreach ($arrPiecRead as $objPiezMani) {
                $this->txtAwbsNumb->Text .= $objPiezMani->IdPieza.chr(13);
            }
        }
    }

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    //----------------------------------------------------------------------------------------
    // Plan de Accion:
    // 1.- Se borran la guias anteriores del Usuario de la tabla process_awbs
    //     spu_delete_records_from_process_awbs($intCodiUsua)
    // 2.- Se borran la piezas anteriores del Usuario de la tabla process_pieces
    //     spu_delete_records_from_process_pieces($intCodiUsua)
    // 3.- Los trackings propocionados por el Usuario se graban en la tabla process_awbs
    // 4.- Ejecutar stored procedure spu_marking_awbs_as_ready_to_go($intIdxxProc)
    //     - Se identifican los ids de las guias cuyos tracking coincidan con lo que esta
    //       grabado en la tabla process_awbs (en el campo tracking)
    //     - Los registros que si tienen lleno el campo guia_id corresponden a guías existentes
    //       en la base de datos y deben marcarse como ready to go.
    //     - Los registros que no tengan lleno el campo guia_id deben marcarse con:
    //       - IsProcessed = false y ErrorMessage = 'La guia no existe'
    //     - Los registros con error, debe copiarse en la tabla detalle_error
    //     - Las piezas asociadas a las guías existentes, deben grabase en la tabla process_pieces
    //     - Las piezas registradas en process_pieces que tengan como ultimo checkpoint OK deben marcarse con
    //       - IsProcessed = false y ErrorMessage = 'Pieza entregada"
    //     - Las piezas registradas en process_pieces que tengan como ultimo checkpoint RG deben marcarse con
    //       - IsProcessed = false y ErrorMessage = 'Previamente marcada como Ready to Go"
    //     - Las piezas registradas en process_pieces que tengan IsProcessed = null, podrán marcase como 
    //       ready to go.
    //     - Los registros con error, debe copiarse en la tabla detalle_error
    //-------------------------------------------------------------------------------------------
    protected function btnSave_Click() {
        $mixInitTime = microtime(true);

        $objDataBase = QApplication::$Database[1];
        $objUsuario  = unserialize($_SESSION['User']);
        $intUserIdxx = $objUsuario->CodiUsua;

        $strNombProc = 'Marking Awbs as Ready to Go';
        $objProcEjec = CrearProceso($strNombProc);
        $intProcIdxx = $objProcEjec->Id;

        $arrAwbsNumb = explode(',', nl2br2($this->txtAwbsNumb->Text));
        $arrAwbsNumb = array_unique($arrAwbsNumb);

        $this->txtAwbsNumb->Text = '';
        $intCantAwbs = 0;
        //------------------------------------------------
        // Deleting previous awbs related to the User
        //------------------------------------------------
        t('Deleting previous awbs related to the User...');
        try {
            $strCadeSqlx  = "call spu_delete_records_from_process_awbs($intUserIdxx)";
            $objDataBase->NonQuery($strCadeSqlx);
        } catch (Exception $e) {
            t('Error deleting previous awbs from the User: ' . $e->getMessage());
            $this->danger('Deleting awbs: ' . $e->getMessage());
            return;
        }
        //------------------------------------------------
        // Deleting previous pieces related to the User
        //------------------------------------------------
        t('Deleting previous pieces related to the User...');
        try {
            $strCadeSqlx  = "call spu_delete_user_records($intUserIdxx)";
            $objDataBase->NonQuery($strCadeSqlx);
        } catch (Exception $e) {
            t('Error deleting previous pieces from the User: ' . $e->getMessage());
            $this->danger('Deleting pieces: ' . $e->getMessage());
            return;
        }

        $objDataBase->TransactionBegin();
        //----------------------------------------------------------------
        // Every single awb must be inserted in the process_awbs table
        //----------------------------------------------------------------
        t('Inserting awbs in process_awbs table...');
        $strCadeSqlx  = "insert ";
        $strCadeSqlx .= "  into process_awbs ";
        $strCadeSqlx .= "       (proceso_error_id, tracking, created_at, created_by) ";
        $strCadeSqlx .= "values ";
        foreach ($arrAwbsNumb as $strAwbsNumb) {
            if (strlen($strAwbsNumb) > 0) {
                $strAwbsNumb = trim($strAwbsNumb);
                $strCadeSqlx .= "($intProcIdxx, '$strAwbsNumb', current_date(), $intUserIdxx),";
                $intCantAwbs++;
            }
        }
        $strCadeSqlx = substr($strCadeSqlx, 0, strlen($strCadeSqlx) - 1);
        try {
            $objDataBase->NonQuery($strCadeSqlx);
        } catch (Exception $e) {
            t('Error inserting awbs in process_awbs table: ' . $e->getMessage());
            $this->danger('Inserting awbs: ' . $e->getMessage());
            $objDataBase->TransactionRollBack();
            return;
        }
        //-------------------------------------------------
        // Marking Awbs (and their pieces) as Ready to Go
        //-------------------------------------------------
        t('Processing Awbs and their pieces...');
        try {
            $strCadeSqlx  = "call spu_marking_awbs_as_ready_to_go($intProcIdxx, $intUserIdxx, @errors_qty)";
            $objDataBase->NonQuery($strCadeSqlx);
            $strCadeSqlx  = "select @errors_qty";
            $objDbResult  = $objDataBase->Query($strCadeSqlx);
            $mixRegistro  = $objDbResult->FetchArray();
            $intCantErro  = $mixRegistro['@errors_qty'];
        } catch (Exception $e) {
            t('Error marking Awbs as Ready to Go: ' . $e->getMessage());
            $this->danger('Marking Awbs as Ready to Go: ' . $e->getMessage());
            $objDataBase->TransactionRollBack();
            return;
        }
        $objDataBase->TransactionCommit();

        $mixFiniTime = microtime(true);
        $mixTotaTime = formatPeriod($mixFiniTime, $mixInitTime);

        if ($intCantErro == 0) {
            $strMensUsua = sprintf('Guias procesadas (%s) | Tiempo => (%s)', $intCantAwbs, $mixTotaTime);
            $this->success($strMensUsua);
        } else {
            $this->objProcEjec = $objProcEjec;
            $this->btnShowErro->Visible = true;
            $strMensUsua = sprintf('Errores (%s) | Tiempo => (%s)', $intCantErro, $mixTotaTime);
            $this->danger($strMensUsua);
        }
        t('Finished...');
    }

    protected function btnShowErro_Click() {
        unset($_SESSION['PagiBack']);
        QApplication::Redirect(__SIST__ . '/detalle_error_list.php/' . $this->objProcEjec->Id);
    }
    
    

}

ReadyToGo::Run('ReadyToGo');
?>
