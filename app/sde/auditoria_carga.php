<?php
//-----------------------------------------------------------------------------
// Programa      : auditoria_carga.php
// Realizado por : Juan Duran
// Fecha Elab.   : 25/02/2017
// Descripcion   : Este programa muestra un formulario con los campos 
//                 requeridos para auditar la carga recibida.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class AuditoriaCarga extends FormularioBaseKaizen {
    protected $objDataBase;

    protected $lstOperSist;  // Combo de Operaciones Abiertas
    protected $lstNumeCont;  // Lista de Contenedores
    protected $txtListNume;  // Lista de Guías

    protected $arrListNume;  // Arreglo que contiene los números de la lista
    protected $arrColuQury;
    protected $arrValoQury;
    protected $arrGuiaSina;
    protected $dtgPiezMani;

    protected $strCadeSqlx;
    protected $lstTipoOper;
    protected $blnExisCont;
    protected $btnRepoDisc;
    /* @var $objContaine Containers */
    protected $objContaine;
    protected $btnErroProc;
    protected $objProcEjec;


    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Auditoría de Carga');

        $_SESSION['ValiRepe'] = Parametros::BuscarParametro('VALIREPE','CKPTREPE','Val1',1);
        if ($_SESSION['ValiRepe']) {
            t('Voy a validar Ckpt repetidos');
        }

        $this->lstOperSist_Create();
        $this->lstNumeCont_Create();
        $this->txtListNume_Create();
        $this->dtgPiezMani_Create();
        $this->btnErroProc_Create();

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = TextoIcono('eye','Error(es)','F','lg');
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
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

        if (!is_null($this->objContaine)) {
            $arrPiezMani = $this->objContaine->GetPiezasConCheckpoint('TR','Id');
            foreach ($arrPiezMani as $objPiezMani) {
                t($objPiezMani);
            }
            $this->dtgPiezMani->TotalItemCount = count($arrPiezMani);
            $this->dtgPiezMani->DataSource     = GuiaPiezas::QueryArray(
                QQ::AndCondition(QQ::In(QQN::GuiaPiezas()->Id,$arrPiezMani)),
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

        $colServImpo = new QDataGridColumn($this);
        $colServImpo->Name = QApplication::Translate('Prod');
        $colServImpo->Html = '<?= $_ITEM->Guia->Producto->Codigo ?>';
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

    protected function lstOperSist_Create() {
        $this->lstOperSist = new QListBox($this);
        $this->lstOperSist->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstOperSist->Name = QApplication::Translate('Operación/Ruta');
        $this->lstOperSist->Width = 280;
        $this->lstOperSist->AddAction(new QChangeEvent(), new QAjaxAction('lstOperSist_Change'));
        $objClausula   = QQ::Clause();
        $objClausula[] = QQ::OrderBy(QQN::SdeOperacion()->RutaId);
        foreach (SdeOperacion::LoadArrayByCodiTipo(1,$objClausula) as $objOperacion) {
            $this->lstOperSist->AddItem($objOperacion->__toString(),$objOperacion->CodiOper);
        }
    }

    protected function lstNumeCont_Create() {
        $this->lstNumeCont = new QListBox($this);
        $this->lstNumeCont->Name = QApplication::Translate('Precinto/Contenedor');
        $this->lstNumeCont->Width = 280;
        $this->lstNumeCont->AddAction(new QChangeEvent(), new QAjaxAction('lstNumeCont_Change'));
    }

    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->Name = QApplication::Translate('Piezas');
        $this->txtListNume->TextMode = QTextMode::MultiLine;
        $this->txtListNume->Rows = 20;
        $this->txtListNume->Width = 280;
        $this->txtListNume->Height = 240;
    }


    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = "/auditoria_carga.php/";
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }


    protected function lstOperSist_Change() {
        $this->lstNumeCont->RemoveAllItems();
        $arrContPend = Containers::LoadArrayByOperacionIdEstatusTipo(
            $this->lstOperSist->SelectedValue,
            'RECIBID@',
            'MANIF',
            QQ::Clause(QQ::OrderBy(QQN::Containers()->Id,false),
            QQ::LimitInfo(50))
        );
        $intContPend = count($arrContPend);
        $this->lstNumeCont->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intContPend.')'),null);
        foreach ($arrContPend as $objContenedor) {
            $this->lstNumeCont->AddItem($objContenedor->Numero,$objContenedor->Id);
        }
        $this->lstNumeCont->Width = 280;
    }

    protected function lstNumeCont_Change() {
        $intIdxxMani = $this->lstNumeCont->SelectedValue;
        $this->objContaine = !is_null($intIdxxMani)
            ? Containers::Load($intIdxxMani)
            : null;
        $this->dtgPiezMani->Refresh();
    }

    protected function Form_Validate() {
        $strTextMens = 'Los siguientes campos son requeridos: <b>';
        $strMensErro = '';
        $blnTodoOkey = true;
        $this->mensaje();
        //------------------------------------
        // Validando campo de Operación/Ruta.
        //------------------------------------
        if (is_null($this->lstOperSist->SelectedValue)){
            $blnTodoOkey = false;
            $strMensErro .= 'Operación/Ruta';
        }
        //-----------------------------------------
        // Validando campo de Precinto/Contenedor.
        //-----------------------------------------
        if (is_null($this->lstNumeCont->SelectedValue)) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Precinto/Contenedor';
        }
        //---------------------------
        // Validando campo de Guías.
        //---------------------------
        if (strlen($this->txtListNume->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Guías';
        }
        //-------------------------------------------------------------------------------------------
        // Si hay uno o más errores, se notifica al usuario y no se permite la gestión de auditoría.
        //-------------------------------------------------------------------------------------------
        if (!$blnTodoOkey) {
            $strTextMens .= $strMensErro;
            $strTextMens .= '</b>.';
            $this->mensaje($strTextMens,'','d','i','hand-stop-o');
        }
        return $blnTodoOkey;
    }

    protected function btnSave_Click() {
        $blnHayxErro = false;
        $strNombProc = 'Auditoria del Manif: '.$this->lstNumeCont->SelectedName;
        $this->objProcEjec = CrearProceso($strNombProc);

        t('===========================');
        t('Proceso: Auditoria de Carga');
        $objContenedor = Containers::Load($this->lstNumeCont->SelectedValue);
        $intCodiRuta = $objContenedor->Operacion->RutaId;
        $intContGuia = 0;
        $intContCkpt = 0;
        $intContSobr = 0;
        $intContFalt = 0;
        $arrPiezAudi = [];

        $strCkptAudi = 'AV';  // Auditoria de Valija
        $strCkptRece = 'AR';  // LLegada a la Sucursal
        //----------------------------------------------------------------------------------
        // Se registra un checkpoint de Auditoria para cada pieza digitada en la pantalla.
        //----------------------------------------------------------------------------------
        $this->arrListNume = array();
        $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
        //--------------------------------------------
        // Se eliminan lineas repetidas y en blanco
        //--------------------------------------------
        $this->arrListNume = LimpiarArreglo($this->arrListNume,false);
        $this->arrGuiaSina = array();
        $this->txtListNume->Text = '';
        t('Voy a grabar el checkpoint '.$strCkptAudi.' para cada pieza ');
        $objCkptAudi = Checkpoints::LoadByCodigo($strCkptAudi);
        foreach ($this->arrListNume as $strPiezArri) {
            t("Procesando: ".$strPiezArri);
            $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strPiezArri);
            if (!$objGuiaPiez) {
                t('La pieza no existe en la base de datos: '.$strPiezArri);
                $blnHayxErro = true;
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strPiezArri;
                $arrParaErro['MensErro'] = 'LA PIEZA NO EXISTE';
                $arrParaErro['ComeErro'] = 'GRABANDO CHECKPOINT AV';
                GrabarError($arrParaErro);
                continue;
            }
            //----------------------------------------------------------
            // Se registra el checkpoint correspondiente para la pieza
            //----------------------------------------------------------
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
            $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
            $arrDatoCkpt['CodiCkpt'] = $objCkptAudi->Id;
            $arrDatoCkpt['TextCkpt'] = $objCkptAudi->Descripcion." (".$objContenedor->Numero.")";
            $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            if ($arrResuGrab['TodoOkey']) {
                $intContCkpt ++;
                $arrPiezAudi[] = $objGuiaPiez->IdPieza;
                t("Ya grabe el checkpoint para la pieza. Van: ".$intContCkpt." checkpoints grabados");
            } else {
                t("Error al registrar checkpoint a la pieza: ".$objGuiaPiez->IdPieza." ".$arrResuGrab['MotiNook']);
                $blnHayxErro = true;
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $objGuiaPiez->IdPieza;
                $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                $arrParaErro['ComeErro'] = 'GRABANDO CHECKPOINT AV';
                GrabarError($arrParaErro);
            }
            $intContGuia++;
        }
        sleep(1);
        //---------------------------------------------------------------------------------------------------
        // Se procede a cargar en un vector las piezas del contenedor que hayan sido recibidas y auditadas.
        //---------------------------------------------------------------------------------------------------
        $arrPiezReci = $objContenedor->GetPiezasConCheckpoint($strCkptRece);

        t('Piezas Recibidas:');
        foreach ($arrPiezReci as $strIdxxPiez) {
            t($strIdxxPiez);
        }

        //$arrPiezAudi = $this->arrListNume;
        t('Piezas Auditadas:');
        foreach ($arrPiezAudi as $strIdxxPiez) {
            t($strIdxxPiez);
        }

        //-------------------------
        // Detección de Sobrantes
        //-------------------------
        t('Deteccion de Sobrantes');
        $objCkptRece = Checkpoints::LoadByCodigo($strCkptRece);
        foreach ($arrPiezAudi as $strPiezAudi) {
            //---------------------------------------------------
            // Se Chequean las piezas recibidas vs las auditadas
            //---------------------------------------------------
            t("Voy a verificar si la pieza ".$strPiezAudi." llego a la Sucursal/Almacen");
            if (!in_array($strPiezAudi,$arrPiezReci)) {
                $objPiezDisc = GuiaPiezas::LoadByIdPieza($strPiezAudi);
                if (!$objPiezDisc) {
                    t('La Pieza no Existe');
                    $intContSobr++;

                    $blnHayxErro = true;
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $strPiezAudi;
                    $arrParaErro['MensErro'] = 'SOBRANTE';
                    $arrParaErro['ComeErro'] = 'LA PIEZA NO EXISTE';
                    GrabarError($arrParaErro);
                    continue;
                }
                t("La guia ".$strPiezAudi." no aparece como Recibida, por lo tanto se considera un Sobrante");
                $intContSobr++;

                $blnHayxErro = true;
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strPiezAudi;
                $arrParaErro['MensErro'] = 'SOBRANTE';
                $arrParaErro['ComeErro'] = 'LA PIEZA NO APARECE COMO RECIBIDA';
                GrabarError($arrParaErro);

                //---------------------------------------------------------------
                // Se Registra el Checkpoint de Recepción para la Guía Sobrante
                //---------------------------------------------------------------
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumePiez'] = $strPiezAudi;
                $arrDatoCkpt['GuiaAnul'] = $objPiezDisc->Guia->Anulada();
                $arrDatoCkpt['CodiCkpt'] = $objCkptRece->Id;
                $arrDatoCkpt['TextCkpt'] = $objCkptRece->Descripcion." (".$objContenedor->Numero.")";
                $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                sleep(1);
                //------------------------------------------------------------------
                // Se Registra el Checkpoint de Confirmación para la Guía Sobrante
                //------------------------------------------------------------------
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumePiez'] = $strPiezAudi;
                $arrDatoCkpt['GuiaAnul'] = $objPiezDisc->Guia->Anulada();
                $arrDatoCkpt['CodiCkpt'] = $objCkptAudi->Id;
                $arrDatoCkpt['TextCkpt'] = $objCkptAudi->Descripcion." (".$objContenedor->Numero.")";
                $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                //----------------------------------
                // Se Asocia la Guia al Contenedor
                //----------------------------------
                $objContenedor->AssociateGuiaPiezasAsContainerPieza($objPiezDisc);
                t('Pieza ha sido asociada al contenedor');
            }
        }

        //-------------------------
        // Detección de Faltantes
        //-------------------------
        t('Deteccion de Faltantes');
        foreach ($arrPiezReci as $strPiezReci) {
            //------------------------------------------------
            // Piezas manifestadas vs las piezas scanneadas
            //------------------------------------------------
            t("Voy a verificar si la pieza ".$strPiezReci." fue Auditada");
            if (!in_array($strPiezReci,$arrPiezAudi)) {
                $objPiezDisc = GuiaPiezas::LoadByIdPieza($strPiezReci);
                if (!$objPiezDisc) {
                    $blnHayxErro = true;
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $strPiezReci;
                    $arrParaErro['MensErro'] = 'NO EXISTE';
                    $arrParaErro['ComeErro'] = 'LA PIEZA NO EXISTE';
                    GrabarError($arrParaErro);
                    continue;
                }
                if (!$objPiezDisc->tieneCheckpointEnSucursal('AV',$this->objUsuario->SucursalId)) {
                    t("La pieza ".$strPiezReci." esta manifestada pero no se confirmo su Recepcion, se trata de un Faltante");
                    $blnHayxErro = true;
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $strPiezReci;
                    $arrParaErro['MensErro'] = 'FALTANTE';
                    $arrParaErro['ComeErro'] = 'PIEZA MANIFESTADA SIN CONFIRMACION DE RECEPCION';
                    GrabarError($arrParaErro);

                    $intContFalt++;
                }
            }
        }
        $strTextMens = "Recibidas: $intContCkpt | Sobrantes: $intContSobr | Faltantes: $intContFalt";
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
        //-------------------------------------
        // Se cambia el estatus al Manifiesto
        //-------------------------------------
        $objContenedor->Estatus = 'AUDITAD@';
        $objContenedor->Save();
        $objContenedor->logDeCambios('AUDITADO: '.$strTextMens);


        if ($blnHayxErro) {
            $this->btnErroProc->Visible = true;
            $this->warning($strTextMens);
        } else {
            $this->success($strTextMens);
        }
    }
}

AuditoriaCarga::Run('AuditoriaCarga');
?>