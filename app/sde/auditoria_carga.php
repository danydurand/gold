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

    protected $lstOperAbie;  // Combo de Operaciones Abiertas
    protected $lstNumeCont;  // Lista de Contenedores
    protected $txtListNume;  // Lista de Guías

    protected $arrListNume;  // Arreglo que contiene los números de la lista
    protected $arrColuQury;
    protected $arrValoQury;
    protected $arrGuiaDisc;
    protected $arrGuiaSina;

    protected $strCadeSqlx;
    protected $lstTipoOper;
    protected $blnExisCont;
    protected $btnRepoDisc;

    protected function Form_Create() {
        parent::Form_Create();
        //$this->validarCampos();
        $this->lblTituForm->Text = QApplication::Translate('Auditoría de Carga');

        $this->lstOperAbier_Create();
        $this->lstNumeCont_Create();
        $this->txtListNume_Create();

        $this->btnRepoDisc_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    // Operaciones //
    protected function lstOperAbier_Create() {
        $this->lstOperAbie = new QListBox($this);
        $this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstOperAbie->Name = QApplication::Translate('Operación/Ruta');
        $this->lstOperAbie->Width = 300;
        $this->lstOperAbie->AddAction(new QChangeEvent(), new QAjaxAction('lstOperAbie_Change'));
        $objClausula   = QQ::Clause();
        $objClausula[] = QQ::OrderBy(QQN::SdeOperacion()->RutaId);
        foreach (SdeOperacion::LoadArrayByCodiTipo(1,$objClausula) as $objOperacion) {
            $this->lstOperAbie->AddItem($objOperacion->__toString(),$objOperacion->CodiOper);
        }
    }

    // Nro de Contenedor //
    protected function lstNumeCont_Create() {
        $this->lstNumeCont = new QListBox($this);
        $this->lstNumeCont->Name = QApplication::Translate('Precinto/Contenedor');
        $this->lstNumeCont->Width = 300;
    }

    // Lista de Seriales o Items asociados a una Guía //
    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->Name = QApplication::Translate('Guías');
        $this->txtListNume->TextMode = QTextMode::MultiLine;
        $this->txtListNume->Rows = 20;
        $this->txtListNume->Width = 300;
        $this->txtListNume->Height = 240;
    }

    protected function btnRepoDisc_Create() {
        $this->btnRepoDisc = new QButtonI($this);
        $this->btnRepoDisc->Text = TextoIcono('wpforms','Ver Discrepancia','F','fa-lg');
        $this->btnRepoDisc->AddAction(new QClickEvent(), new QServerAction('reporteDeDiscrepancias'));
        $this->btnRepoDisc->Enabled = false;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function lstOperAbie_Change() {
        $this->lstNumeCont->RemoveAllItems();
        //$arrContPend = SdeContenedor::LoadArrayByCodiOperStatCont($this->lstOperAbie->SelectedValue,'R',QQ::Clause(QQ::OrderBy(QQN::SdeContenedor()->Fecha,false),QQ::LimitInfo(1000)));
        $arrContPend = Containers::LoadArrayByOperacionIdEstatus($this->lstOperAbie->SelectedValue,'RECIBID@',QQ::Clause(QQ::OrderBy(QQN::Containers()->Id,false),QQ::LimitInfo(50)));
        $intContPend = count($arrContPend);
        $this->lstNumeCont->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intContPend.')'),null);
        foreach ($arrContPend as $objContenedor) {
            $this->lstNumeCont->AddItem($objContenedor->Numero,$objContenedor->Id);
        }
        $this->lstNumeCont->Width = 300;
    }


    protected function Form_Validate() {
        $strTextMens = 'Los siguientes campos son requeridos: <b>';
        $strMensErro = '';
        $blnTodoOkey = true;
        $this->mensaje();
        //------------------------------------
        // Validando campo de Operación/Ruta.
        //------------------------------------
        if (is_null($this->lstOperAbie->SelectedValue)){
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


    protected function reporteDeDiscrepancias() {
        $arrEnca2PDF = array('Nro de Guia','Destinatario','Origen','Destino','Peso','Piezas','Discrepancia');
        $arrAnch2PDF = array(25,90,20,20,15,15,20);
        $arrJust2PDF = array('C','L','C','C','R','R','C');
        $_SESSION['Dato'] = serialize($this->arrGuiaDisc);
        $_SESSION['Enca'] = serialize($arrEnca2PDF);
        $_SESSION['Anch'] = serialize($arrAnch2PDF);
        $_SESSION['Just'] = serialize($arrJust2PDF);
        QApplication::Redirect('../util/tabla2pdf2.php?nomb_repo=Discrepancias');
    }

    protected function btnSave_Click() {
        $this->objDataBase = QApplication::$Database[1];
        t('Proceso: Auditoria de Carga');
        t('===========================');
        $objContenedor = Containers::Load($this->lstNumeCont->SelectedValue);
        $intCodiRuta = $objContenedor->Operacion->RutaId;
        $intContGuia = 0;
        $intContCkpt = 0;
        $intContSobr = 0;
        $intContFalt = 0;

        $strCkptAudi = 'AV';  // Auditoria de Valija
        $strCkptRece = 'AR';  // LLegada a la Sucursal
        t('Checkpoints establecidos');
        //---------------------------------------------------------------------------------------------------------
        // Se registra un checkpoint "Uno" para cada Guía digitada en la pantalla. Esto se hace siempre y cuando
        // no tenga dicho checkpoint previamente registrado en la Sucursal
        //---------------------------------------------------------------------------------------------------------
        $this->arrListNume = array();
        $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
        //---------------------------------------------------------------------------------------
        // Con la función "DejarSoloLosNumeros1" se eliminan los caractéres especiales y letras
        //---------------------------------------------------------------------------------------
        //array_walk($this->arrListNume,'DejarSoloLosNumeros1');
        //-----------------------------------------------------------------------------
        // Con "array_unique" se eliminan las guías repetidas en caso de que las haya
        //-----------------------------------------------------------------------------
        $this->arrListNume = array_unique($this->arrListNume);
        $this->arrGuiaSina = array();
        $this->txtListNume->Text = '';
        t('Voy a grabar el checkpoint '.$strCkptAudi.' para cada pieza ');
        $objCkptAudi = Checkpoints::LoadByCodigo($strCkptAudi);
        foreach ($this->arrListNume as $strPiezArri) {
            t("Procesando: ".$strPiezArri);
            if (strlen($strPiezArri) > 0) {
                $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strPiezArri);
                if ($objGuiaPiez) {
                    t("Voy a evaluar la pieza: ".$objGuiaPiez->IdPieza);
                    if ($objGuiaPiez->ultimoCheckpointEnSucursal($this->objUsuario->SucursalId) != $strCkptAudi) {
                        t("Esa pieza no tiene ".$strCkptAudi." en ".$this->objUsuario->Sucursal->Iata);
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
                            t("Ya grabe el checkpoint para la pieza. Van: ".$intContCkpt." checkpoints grabados");
                        } else {
                            $blnTodoOkey = false;
                            t("Error al registrar checkpoint a la pieza: ".$objGuiaPiez->IdPieza." ".$arrResuGrab['MotiNook']);
                            $strMensUsua  = QApplication::Translate("Error al registrar checkpoint a la pieza: ".$objGuiaPiez->IdPieza);
                            $strMensUsua .= " - ".$arrResuGrab['MotiNook'];
                            $this->mensaje($strMensUsua,'','d','i','hand-stop-o');
                            $this->btnSave->Enabled = false;
                        }
                    }
                    $intContGuia++;
                }
            }
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


        $arrPiezAudi = $this->arrListNume;
        t('Piezas Auditadas:');
        foreach ($arrPiezAudi as $strIdxxPiez) {
            t($strIdxxPiez);
        }

        $this->arrGuiaDisc = array();  // Arreglo de Discrepancias
        //-------------------------
        // Detección de Sobrantes
        //-------------------------
        t('Deteccion de Sobrantes');
        $objCkptRece = Checkpoints::LoadByCodigo($strCkptRece);
        foreach ($arrPiezAudi as $strPiezAudi) {
            if (strlen($strPiezAudi) > 0) {
                //---------------------------------------------------
                // Se Chequean las piezas recibidas vs las auditadas
                //---------------------------------------------------
                t("Voy a verificar si la guia ".$strPiezAudi." llego a la Sucursal/Almacen");
                if (!in_array($strPiezAudi,$arrPiezReci)) {
                    $objPiezDisc = GuiaPiezas::LoadByIdPieza($strPiezAudi);
                    if ($objPiezDisc) {
                        t("Verificando que la Guia ".$objPiezDisc->Guia->Numero." este Anulada/Borrada ");
                        if ($objPiezDisc->Guia->Anulada()) {
                            //------------------------
                            // La guía está eliminada
                            //------------------------
                            t('Guia Eliminada');
                            $this->arrGuiaDisc[] = array($strPiezAudi,QApplication::Translate('La Guia fue Eliminada'),'','','','','FUE ELIMINADA');
                            $this->txtListNume->Text .= $strPiezAudi." (ELIMINADA)".chr(13);
                        } else {
                            t("La guia ".$strPiezAudi." no aparece como Recibida, por lo tanto se considera un Sobrante");
                            $this->arrGuiaDisc[] = array(
                                $strPiezAudi,
                                $objPiezDisc->Guia->NombreDestinatario,
                                $objPiezDisc->Guia->Origen->Iata,
                                $objPiezDisc->Guia->Destino->Iata,
                                $objPiezDisc->Kilos,
                                $objPiezDisc->Guia->Piezas,
                                'SOBRANTE'
                            );
                            t('Pieza Sobrante: '.$strPiezAudi);
                            $this->txtListNume->Text .= $strPiezAudi." (SOBRANTE)".chr(13);
                            $intContSobr++;

                            if ($strPiezAudi) {
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
                            } else {
                                t('La pieza no existe');
                                $this->txtListNume->Text .= $strPiezAudi." (NO EXISTE)".chr(13);
                            }
                        }
                    } else {
                        t('La Pieza no Existe');
                        $intContSobr++;
                        $this->arrGuiaDisc[] = array($strPiezAudi,QApplication::Translate('La Pieza NO EXISTE'),'','','','','NO EXISTE');
                        $this->txtListNume->Text .= $strPiezAudi." (NO EXISTE)".chr(13);
                    }
                }
            }
        }
        //-------------------------
        // Detección de Faltantes
        //-------------------------
        t('Deteccion de Faltantes');
        $objCkptFalt = Checkpoints::LoadByCodigo('MF');
        foreach ($arrPiezReci as $strPiezReci) {
            //------------------------------------------------
            // Piezas manifestadas vs las piezas scanneadas
            //------------------------------------------------
            t("Voy a verificar si la pieza ".$strPiezReci." fue Auditada");
            if (!in_array($strPiezReci,$arrPiezAudi)) {
                $objPiezDisc = GuiaPiezas::LoadByIdPieza($strPiezReci);
                if ($objPiezDisc) {
                    if ($objPiezDisc->Guia->Anulada()) {
                        t('La guia de la pieza: '.$strPiezReci.' fue eliminada');
                        $this->arrGuiaDisc[] = array($strPiezReci,QApplication::Translate('La Guia FUE ELIMINADA'),'','','','','FUE ELIMINADA');
                        $this->txtListNume->Text .= $strPiezReci." (ELIMINADA)".chr(13);
                    } else {
                        t("La pieza ".$strPiezReci." esta manifestada pero no se confirmo su Recepcion, se trata de un Faltante");
                        $this->arrGuiaDisc[] = array(
                            $strPiezReci,
                            $objPiezDisc->Guia->NombreDestinatario,
                            $objPiezDisc->Guia->Origen->Iata,
                            $objPiezDisc->Guia->Destino->Iata,
                            $objPiezDisc->Kilos,
                            $objPiezDisc->Guia->Piezas,
                            'FALTANTE'
                        );
                        $this->txtListNume->Text .= $strPiezReci." (FALTANTE)".chr(13);
                        $intContFalt++;
                        //------------------------------------------------------
                        // Se Registra un checkpoint para cada pieza Faltante
                        //------------------------------------------------------
                        $arrDatoCkpt = array();
                        $arrDatoCkpt['NumePiez'] = $strPiezReci;
                        $arrDatoCkpt['GuiaAnul'] = $objPiezDisc->Guia->Anulada();
                        $arrDatoCkpt['CodiCkpt'] = $objCkptFalt->Id;
                        $arrDatoCkpt['TextCkpt'] = $objCkptFalt->Descripcion." (".$objContenedor->Numero.")";
                        $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                    }
                } else {
                    $this->arrGuiaDisc[] = array($strPiezReci,QApplication::Translate('La Guia NO EXISTE'),'','','','','NO EXISTE');
                    $this->txtListNume->Text .= $strPiezReci." (NO EXISTE)".chr(13);
                }
            }
        }
        if (count($this->arrGuiaDisc) == 0) {
            $strMensUsua = QApplication::Translate(sprintf("Transaccion Exitosa. Se validaron (%s) Guias",$intContGuia));
            $this->mensaje($strMensUsua,'','','i','check');
        } else {
            $strMensUsua = QApplication::Translate(sprintf("Hubo Discrepancias. Faltantes (%s) / Sobrantes ".$intContSobr,$intContFalt,$intContSobr));
            $this->mensaje($strMensUsua,'','d','i','hand-stop-o');
            $this->btnRepoDisc->Enabled = true;
        }
    }
}

AuditoriaCarga::Run('AuditoriaCarga');
?>