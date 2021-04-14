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

class RecepcionCarga extends FormularioBaseKaizen {
    protected $lstOperAbie;
    protected $lstNumeCont;
    protected $arrListNume;
    protected $arrMotiDisc;
    protected $lstTipoOper;
    protected $lstNombAlma;
    protected $strCadeSqlx;
    protected $strNumeVali;
    protected $objProcEjec;
    protected $btnErroProc;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Recepción de Carga';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->lstOperAbier_Create();
        $this->lstNumeCont_Create();
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

    protected function lstOperAbier_Create() {
        $this->lstOperAbie = new QListBox($this);
        $this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'), null);
        $this->lstOperAbie->Name = QApplication::Translate('Operación/Ruta');
        $this->lstOperAbie->Required = true;
        $this->lstOperAbie->Width = 260;
        $this->lstOperAbie->AddAction(new QChangeEvent(), new QAjaxAction('lstOperAbie_Change'));
        foreach (SdeOperacion::LoadArrayByCodiTipo(1, QQ::Clause(QQ::OrderBy(QQN::SdeOperacion()->RutaId))) as $objOperacion) {
            $this->lstOperAbie->AddItem($objOperacion->__toString(), $objOperacion->CodiOper);
        }
    }

    protected function lstNumeCont_Create() {
        $this->lstNumeCont = new QListBox($this);
        $this->lstNumeCont->Name = QApplication::Translate('Precinto/Contenedor');
        $this->lstNumeCont->Width = 200;
        $this->lstNumeCont->Required = true;
    }

    // protected function btnGeneRepo_Create() {
    //     $this->btnGeneRepo = new QButton($this);
    //     $this->btnGeneRepo->Text = '<i class="fa fa-wpforms fa-lg"></i> Ver Discrepancia';
    //     $this->btnGeneRepo->AddAction(new QClickEvent(), new QServerAction('btnGeneRepo_Click'));
    //     $this->btnGeneRepo->CssClass = 'btn btn-info btn-sm';
    //     $this->btnGeneRepo->CausesValidation = false;
    //     $this->btnGeneRepo->Visible = false;
    // }

    // protected function btnSave_Create() {
    //     $this->btnSave = new QButton($this);
    //     $this->btnSave->Text = '<i class="fa fa-cogs fa-lg"></i> Procesar';
    //     $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
    //     $this->btnSave->CssClass = 'btn btn-success btn-sm';
    //     $this->btnSave->PrimaryButton = true;
    //     $this->btnSave->CausesValidation = true;
    //     $this->btnSave->Enabled = false;
    // }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnErroProc_Click() {
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }


    protected function lstOperAbie_Change() {
        $this->lstNumeCont->RemoveAllItems();
        //$arrContPend = SdeContenedor::LoadArrayByCodiOperStatCont($this->lstOperAbie->SelectedValue, 'P', QQ::Clause(QQ::OrderBy(QQN::SdeContenedor()->Fecha, false),QQ::LimitInfo(200)));
        $arrContPend = Containers::LoadArrayByOperacionIdEstatus($this->lstOperAbie->SelectedValue, 'ABIERT@', QQ::Clause(QQ::OrderBy(QQN::Containers()->Id, false),QQ::LimitInfo(50)));
        $intContPend = count($arrContPend);
        $this->lstNumeCont->AddItem(QApplication::Translate('- Seleccione Uno - (' . $intContPend . ')'), null);
        foreach ($arrContPend as $objContenedor) {
            $intCantPiez = $objContenedor->CountGuiaPiezasesAsContainerPieza();
            $this->lstNumeCont->AddItem($objContenedor->Numero.' ('.$intCantPiez.')', $objContenedor->Id);
            //$this->lstNumeCont->AddItem($objContenedor->Numero, $objContenedor->Id);
        }
        $this->lstNumeCont->Width = 200;
    }

    protected function obtenerGuiasDeLaMaster($strNumeVali){
        $strCadeSqlx  = "select nume_guia ";
        $strCadeSqlx .= "  from sde_contenedor_guia_assn ";
        $strCadeSqlx .= " where nume_cont = '".$strNumeVali."'";
        $objDatabase  = SdeContenedor::GetDatabase();
        $objDbResult  = $objDatabase->Query($strCadeSqlx);
        $arrGuiaMast  = array();
        while ($mixRegistro = $objDbResult->FetchArray()) {
            $arrGuiaMast[] = $mixRegistro['nume_guia'];
        }
        return $arrGuiaMast;
    }

    protected function inicializarPantalla() {
        $this->lstOperAbie->SelectedIndex = 0;
        $this->lstNumeCont->SelectedIndex = 0;
    }


    protected function btnSave_Click() {
        $objContenedor = Containers::Load($this->lstNumeCont->SelectedValue);
        $strNombProc = 'Recepcion de Carga: '.$objContenedor->Numero;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        $this->mensaje();

        $blnTodoOkey = true;
        $intCodiRuta = $objContenedor->Operacion->RutaId;
        $intContVali = 0;
        $intContGuia = 0;
        $intContCkpt = 0;
        $intCantErro = 0;
        $objCkptRece = Checkpoints::LoadByCodigo('AR');
        //------------------------------------------------------------
        // Inicialmente se procesan la Valijas asociadas al Precinto
        //------------------------------------------------------------
        $arrValiCont = $objContenedor->GetContainersAsContainerContainerArray();
        $strNumeVali = $this->lstNumeCont->SelectedValue;
        if ($arrValiCont) {
            foreach ($arrValiCont as $objValija) {
                t('Procesando la Valija: '.$objValija->Numero);
                //--------------------------------------------------------------
                // Se identifican y procesan las piezas asociadas a la Valija
                //--------------------------------------------------------------
                $blnTodoOkey = true;
                t('Buscando las piezas de la Valija');
                $arrPiezVali = $objValija->GetGuiaPiezasAsContainerPiezaArray();
                t('Tiene: '.count($arrPiezVali).' piezas');
                $strDescCkpt = $objCkptRece->Descripcion . " (" . $objValija->Numero . ")";
                if ($arrPiezVali) {
                    foreach ($arrPiezVali as $objPiezVali) {
                        try {
                            t('Procesando la pieza: '.$objPiezVali->IdPieza);
                            //---------------------------------------------
                            // Se registra un checkpoint para cada guia
                            //---------------------------------------------
                            $arrDatoCkpt = array();
                            $arrDatoCkpt['NumePiez'] = $objPiezVali->IdPieza;
                            $arrDatoCkpt['GuiaAnul'] = $objPiezVali->Guia->Anulada();
                            $arrDatoCkpt['CodiCkpt'] = $objCkptRece->Id;
                            $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
                            $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                            $arrDatoCkpt['NotiCkpt'] = $objCkptRece->Notificar;

                            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                            if ($arrResuGrab['TodoOkey']) {
                                $intContCkpt++;
                            } else {
                                throw new Exception($arrResuGrab['MotiNook']);
                            }
                        } catch (Exception $e) {
                            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                            $arrParaErro['NumeRefe'] = $objPiezVali->IdPieza;
                            $arrParaErro['MensErro'] = $e->getMessage();
                            $arrParaErro['ComeErro'] = 'Fallo la recepcion de la pieza';
                            GrabarError($arrParaErro);
                            $intCantErro ++;
                            $blnTodoOkey = false;
                        }
                        $intContGuia++;
                    }
                }
                //-----------------------------------------------
                // Se graba un checkpoint para la Valija misma
                //-----------------------------------------------
                try {
                    t('Voy grabar un checkpoint en la Valija');
                    $arrDatoCkpt             = array();
                    $arrDatoCkpt['NumeCont'] = $strNumeVali;
                    $arrDatoCkpt['CodiCkpt'] = $objCkptRece->Id;
                    $arrDatoCkpt['TextObse'] = $strDescCkpt;
                    $arrResuGrab = GrabarCheckpointContenedorNew($arrDatoCkpt);
                    if ($arrResuGrab['TodoOkey']) {
                        t('Checkpoint grabado');
                        $intContVali++;
                    } else {
                        t('Hubo algun error: '.$arrResuGrab['MotiNook']);
                        throw new Exception($arrResuGrab['MotiNook']);
                    }
                } catch (Exception $e) {
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = 'Valija: '.$strNumeVali;
                    $arrParaErro['MensErro'] = $e->getMessage();
                    $arrParaErro['ComeErro'] = 'Fallo la Recepcion de la Valija';
                    GrabarError($arrParaErro);
                    $intCantErro ++;
                    $blnTodoOkey = false;
                }
            }
        }
        if ($blnTodoOkey) {
            t('Procesando piezas individuales no asociadas a ninguna valija');
            //---------------------------------------------------------------------------
            // Ahora se procesan las piezas asociadas al Precinto en forma individual
            // es decir, aquellas que no estan asociadas a una Valija
            //---------------------------------------------------------------------------
            //$arrGuiaVali = $this->obtenerGuiasDeLaMaster($this->lstNumeCont->SelectedValue);
            $arrPiezVali = $objContenedor->GetGuiaPiezasAsContainerPiezaArray();
            if ($arrPiezVali) {
                t('La master tiene: '.count($arrPiezVali).' piezas individuales');
                foreach ($arrPiezVali as $objPiezVali) {
                    //--------------------------------------------
                    // Se registra un checkpoint para cada guia
                    //--------------------------------------------
                    try {
                        t('Procesando la pieza: '.$objPiezVali->IdPieza);
                        $strDescCkpt = $objCkptRece->Descripcion . " (" .$strNumeVali. ")";
                        $arrDatoCkpt = array();
                        $arrDatoCkpt['NumePiez'] = $objPiezVali->IdPieza;
                        $arrDatoCkpt['GuiaAnul'] = $objPiezVali->Guia->Anulada();
                        $arrDatoCkpt['CodiCkpt'] = $objCkptRece->Id;
                        $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
                        $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                        $arrDatoCkpt['NotiCkpt'] = $objCkptRece->Notificar;
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                        if ($arrResuGrab['TodoOkey']) {
                            $intContCkpt++;
                        } else {
                            throw new Exception($arrResuGrab['MotiNook']);
                        }
                    } catch (Exception $e) {
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = 'Pieza: '.$objPiezVali->IdPieza;
                        $arrParaErro['MensErro'] = $e->getMessage();
                        $arrParaErro['ComeErro'] = 'Fallo la Recepcion de la Pieza';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $blnTodoOkey = false;
                    }
                    $intContGuia++;
                }
            }
        }
        try {
            //-----------------------------------------------
            // Se graba un checkpoint para la Valija misma
            //-----------------------------------------------
            $strDescCkpt = $objCkptRece->Descripcion . " (" .$strNumeVali. ")";
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumeCont'] = $objContenedor->Id;
            $arrDatoCkpt['CodiCkpt'] = $objCkptRece->Id;
            $arrDatoCkpt['TextObse'] = $strDescCkpt;
            $arrResuGrab = GrabarCheckpointContenedorNew($arrDatoCkpt);
            if ($arrResuGrab['TodoOkey']) {
                $intContVali++;
            } else {
                throw new Exception($arrResuGrab['MotiNook']);
            }
        } catch (Exception $e) {
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'Valija: '.$strNumeVali;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Fallo la Recepcion de la Valija';
            GrabarError($arrParaErro);
            $intCantErro ++;
            $blnTodoOkey = false;
        }
        //------------------------------------------------------------------------------
        // Se actualiza el Contenedor especificando que ha sido p(R)ocesado
        //------------------------------------------------------------------------------
        $objContenedor->Estatus = 'RECIBID@';
        $objContenedor->Save();
        //-------------------------------------------------------------------------
        // Finalmente se actualiza la lista de seleccion de Contenedores
        // para que el Precinto no pueda ser procesado en mas de una oportunidad
        //-------------------------------------------------------------------------
        $this->lstOperAbie_Change();
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        $strTextMens = 'El proceso culmino con '.$intCantErro.' error(es).';
        $strTipoMens = 's';
        $strIconMens = __iCHEC__;
        if (!$blnTodoOkey) {
            //---------------------------------------------------------------------------------------------------
            // Si no ha salido to-do bien, se coloca el mensaje construido como un alerta, se indica la cantidad
            // de errores existentes y se visualiza el botón para acceder a los detalles de los mismos.
            //---------------------------------------------------------------------------------------------------
            $strTipoMens  = 'd';
            $strIconMens  = __iHAND__;
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
        //-----------------------------------------
        // Se construye el mensaje correspondiente
        //-----------------------------------------
        $this->mensaje($strTextMens,'m',$strTipoMens,'',$strIconMens);
    }

}

RecepcionCarga::Run('RecepcionCarga');
?>