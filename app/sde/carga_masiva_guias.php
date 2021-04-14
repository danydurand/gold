<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : carga_masiva_guias.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 15/08/16 02:58 PM
// Proyecto       : newliberty
// Descripcion    : Este programa es el encargado de cargar guías masivamente a un cliente particular, a través de un
//                  archivo plano.
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargaMasivaGuias extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros de objetos
    //-----------------------
    protected $objTarifa;
    /* @var $objCliente MasterCliente */
    protected $objCliente;
    /* @var $objProducto FacProducto */
    protected $objProducto;
    protected $objProcEjec;

    //----------------------
    // Parámetros regulares
    //----------------------
    protected $intOperGuia;
    protected $decPorcIvax;
    protected $strMensProc;
    protected $arrCliePPDx;
    protected $intTipoGuia;

    //---------------------------
    // Parámetros de información
    //---------------------------
    /* @var $lstClieSele QListBox */
    protected $lstClieSele;
    protected $txtCargArch;
    //---- Información sobre importación y procesamiento ----
    protected $lblNumeCarg;
    protected $lblNumePend;
    protected $lblNumeAjus;
    protected $lblNumeProc;
    protected $lblNumeClie;
    protected $lblNumeErro;

    //-----------------------
    // Parámetros de Botones
    //-----------------------
    protected $btnImpoGuia;
    protected $btnAjusGuia;
    protected $btnErroProc;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Carga Masiva de Guías';
        $this->strMensProc = '';

        //---------------------------------------------
        // Clientes Modalidad de Pago PPD - Pre-Pagada
        //---------------------------------------------
        $this->arrCliePPDx = array('CUES','ECU');
        //-------------------------------------------
        // Modalidad de Pago de la Guía por defecto.
        //-------------------------------------------
        $this->intTipoGuia = TipoGuiaType::CRDCREDITO;

        //---- Información ----

        $this->lstClieSele_Create();
        $this->txtCargArch_Create();

        //---- Importación y procesamiento ----

        $this->lblNumeCarg_Create();
        $this->lblNumeProc_Create();
        $this->lblNumePend_Create();
        $this->lblNumeAjus_Create();
        $this->lblNumeClie_Create();
        $this->lblNumeErro_Create();

        // ---- Botones ----

        $this->btnImpoGuia_Create();
        $this->btnErroProc_Create();

        $this->btnSave->Text = TextoIcono('cogs fa-lg','Procesar Guías');
        $this->btnSave->PrimaryButton = false;
        $this->btnSave->CausesValidation = false;
        $this->btnSave->Visible = false;

        $this->btnAjusGuia_Create();

        //---- Atributos y funciones ----

        $dteFechDhoy = FechaDeHoy();
        $this->decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA',$dteFechDhoy);

        $this->mensaje();
        //$this->activarProcesamiento();
    }

    //-------------------------
    // Creación de objetos ...
    //-------------------------

    protected function lstClieSele_Create() {
        $this->lstClieSele = new QListBox($this);
        $this->lstClieSele->Name = 'Cliente';
        $this->lstClieSele->Width = 300;
        $this->lstClieSele->AddItem(QApplication::Translate('- Select One -'), null);
        $this->cargarListaClientes();
        $this->lstClieSele->AddAction(new QChangeEvent(), new QAjaxAction('lstClieSele_Change'));
    }

    protected function txtCargArch_Create() {
        $this->txtCargArch = new QFileControl($this);
        $this->txtCargArch->Required = true;
        $this->txtCargArch->Width = 300;
        $this->txtCargArch->Name = QApplication::Translate('Archivo a Cargar');
    }


    //------------------------------------------------------
    // ---- Información de importación y procesamiento ----
    //------------------------------------------------------

    protected function lblNumeCarg_Create() {
        $this->lblNumeCarg = new QLabel($this);
        $this->lblNumeCarg->Name = 'Registros Cargados';
        $this->lblNumeCarg->Text = 0;
        $this->lblNumeCarg->HtmlEntities = false;
    }

    protected function lblNumePend_Create() {
        $this->lblNumePend = new QLabel($this);
        $this->lblNumePend->Name = 'Guías pendientes por procesar';
        $this->lblNumePend->Text = 0;
        $this->lblNumePend->HtmlEntities = false;
    }

    protected function lblNumeAjus_Create() {
        $this->lblNumeAjus = new QLabel($this);
        $this->lblNumeAjus->Name = 'Guías pendientes por corregir';
        $this->lblNumeAjus->Text = 0;
        $this->lblNumeAjus->HtmlEntities = false;
    }

    protected function lblNumeProc_Create() {
        $this->lblNumeProc = new QLabel($this);
        $this->lblNumeProc->Name = 'Guías procesadas';
        $this->lblNumeProc->Text = 0;
        $this->lblNumeProc->HtmlEntities = false;
    }

    protected function lblNumeClie_Create() {
        $this->lblNumeClie = new QLabel($this);
        $this->lblNumeClie->Name = 'Sub-Cuentas procesadas (Nuevas/Actualizadas)';
        $this->lblNumeClie->Text = '0 / 0';
        $this->lblNumeClie->HtmlEntities = false;
    }

    protected function lblNumeErro_Create() {
        $this->lblNumeErro = new QLabel($this);
        $this->lblNumeErro->Name = 'Errores';
        $this->lblNumeErro->Text = 0;
        $this->lblNumeErro->HtmlEntities = false;
    }

    //-------------------
    // ---- Botones ----
    //-------------------

    protected function btnAjusGuia_Create() {
        $this->btnAjusGuia = new QButtonI($this);
        $this->btnAjusGuia->Text = TextoIcono('pencil-square-o','Corregir Guías');
        $this->btnAjusGuia->Visible = false;
        $this->btnAjusGuia->AddAction(new QClickEvent(), new QServerAction('btnAjusGuia_Click'));
    }

    protected function btnImpoGuia_Create() {
        $this->btnImpoGuia = new QButton($this);
        $this->btnImpoGuia->Text = TextoIcono('download','Importar Guías','F','lg');
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

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function cargarListaClientes() {
        $objClauOrde = QQ::OrderBy(QQN::MasterCliente()->NombClie);

        $objClauWher = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->CargaMasiva,true);

        $arrClieCarg = MasterCliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);

        foreach ($arrClieCarg as $objClieCarg) {
            $this->lstClieSele->AddItem($objClieCarg->__toStringConCodigoInterno(), $objClieCarg->CodiClie);
        }
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
            $filedest = 'tmp/'.$file;
            copy($_FILES['c7']['tmp_name'],$filedest);
            $this->CargarArchivo($filedest);
        } else {
            $this->mensaje('Archivo no corresponde a una extensión válida (CSV, TXT o DAT)','','d','hand-stop-o');
        }
    }

    protected function btnAjusGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_cacesa_list.php');
    }

    protected function btnSave_Click() {
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Creando Guias Liberty correspondientes a Guias del Cliente: '.$this->lstClieSele->SelectedName;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //supress_error_start();
        $this->mensaje();
        //-----------------------------------
        // Se identifican valores de trabajo
        //-----------------------------------
        $intNuevClie = 0;
        $intClieActu = 0;
        $intCantErro = 0;
        $blnTodoOkey = true;
        $blnProcImpo = true;
        $arrOperFict       = SdeOperacion::LoadArrayByCodiRuta('R9999',QQ::Clause(QQ::LimitInfo(1)));
        $objOperFict       = $arrOperFict[0];
        $objCkptMasi       = SdeCheckpoint::Load('GG');
        $this->objProducto = FacProducto::LoadBySiglProd('DOC');
        if (strlen($this->objCliente->RutaRecolecta) > 0) {
            $this->intOperGuia = $this->objCliente->RutaRecolecta;
        } else {
            $this->intOperGuia = $objOperFict->CodiOper;
        }
        //--------------------------------------------------------------
        // Se obtiene el cliente seleccionado anteriormente en la lista
        //--------------------------------------------------------------
        $this->objCliente = MasterCliente::Load($this->lstClieSele->SelectedValue);
        //----------------------------------------------------------
        // Se identifican las Guias Masivas pendientes por procesar
        //----------------------------------------------------------
        $intCantGuia   = 0;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Procesada, SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Ajustar, SinoType::NO);
        $arrGuiaPend   = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));
        $intCantPend   = count($arrGuiaPend);
        if ($intCantPend > 0) {
            foreach ($arrGuiaPend as $objGuiaMasi) {
                //-----------------------------------------------------------------------------
                // Se verifica si la sub-cuenta destinatario debe crearse en la base de datos.
                //-----------------------------------------------------------------------------
                if (!is_null($objGuiaMasi->CodigoContrato)) {
                    //-----------------------
                    // Se crea la Sub-cuenta
                    //-----------------------
                    $objInfoClie = $this->GestionarCliente($objGuiaMasi);
                    $objMastClie = $objInfoClie->objMastClie;
                    $blnNuevRegi = $objInfoClie->blnNuevRegi;
                    try {
                        //----------------------------------------------------------------
                        // Antes de salvar la Sub-Cuenta, se clona para verificar cambios
                        //----------------------------------------------------------------
                        $objRegiViej = $objMastClie;
                        //-------------------------
                        // Se guarda la Sub-cuenta
                        //-------------------------
                        $objMastClie->Save();
                        if ($blnNuevRegi) {
                            //--------------------------------------------
                            // Se registra la acción en el log de cambios
                            //--------------------------------------------
                            $arrLogxCamb['strNombTabl'] = 'MasterCliente';
                            $arrLogxCamb['intRefeRegi'] = $objMastClie->CodiClie;
                            $arrLogxCamb['strNombRegi'] = '('.$objMastClie->CodigoInterno .') - '. $objMastClie->NombClie;
                            $arrLogxCamb['strDescCamb'] = "Creado";
                            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/carga_masiva_clientes.php/'.$objMastClie->CodiClie;
                            LogDeCambios($arrLogxCamb);
                            //----------------------------------------------
                            // Se incrementa el contador de nuevos clientes
                            //----------------------------------------------
                            $intNuevClie++;
                        } else {
                            //---------------------------------------------------------
                            // Se verifica la existencia de algún cambio en algún dato
                            //---------------------------------------------------------
                            $objRegiNuev = $objMastClie;
                            $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                            if ($objResuComp->FriendlyComparisonStatus == 'different') {
                                //------------------------------------------
                                // En caso de que el objeto haya cambiado
                                //------------------------------------------
                                $arrLogxCamb['strNombTabl'] = 'MasterCliente';
                                $arrLogxCamb['intRefeRegi'] = $objMastClie->CodiClie;
                                $arrLogxCamb['strNombRegi'] = '('.$objMastClie->CodigoInterno .') - '. $objMastClie->NombClie;
                                $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/carga_masiva_guias.php/'.$objGuiaMasi->NumeGuia;
                                LogDeCambios($arrLogxCamb);
                            }
                        }
                    } catch (Exception $e) {
                        $strPrefAcci = 'actualización';
                        if ($blnNuevRegi) {
                            $strPrefAcci = 'creación';
                        }
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = 'Sub-Cuenta: '.$objMastClie->CodiClie;
                        $arrParaErro['MensErro'] = $e->getMessage();
                        $arrParaErro['ComeErro'] = "Fallo la $strPrefAcci de la Sub-Cuenta";
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $blnTodoOkey = false;
                    }
                }
                //--------------------------------------------------------------------------------------------------
                // Por defecto, la Guía Liberty a crear será CRD (Crédito). Sin embargo, pueden existir Clientes
                // exigiendo PPD (Pre-Pagada) para sus Guías, y en caso de ser así, se debe cumplir con lo exigido.
                //--------------------------------------------------------------------------------------------------
                if (in_array($objGuiaMasi->Cliente->CodigoInterno,$this->arrCliePPDx)) {
                    $this->intTipoGuia = TipoGuiaType::PPDPREPAGADA;
                }
                //------------------------------------------------------------
                // Se crea una Guia Liberty correspondiente a la Guia Masiva
                //------------------------------------------------------------
                $objGuia = $this->crearGuiaMasiva($objGuiaMasi);
                //-------------------------------------------------------------------
                // Se le calcula a la guía Liberty la Tarifa Nacional corresondiente
                //-------------------------------------------------------------------
                $objGuia = $this->calcularTarifaNacional($objGuia);
                try {
                    //-------------------
                    // Se guarda la guía
                    //-------------------
                    $objGuia->Save();
                    //------------------------------------------------------------------------
                    // Una vez creada y registrada la Guía Liberty, se elimina la Guía Cacesa
                    //------------------------------------------------------------------------
                    $objGuiaMasi->Delete();
                    //------------------------------------------------
                    // Se incrementa el contador de guías procesadas.
                    //------------------------------------------------
                    $intCantGuia++;
                    //---------------------------------------------------------
                    // Se crea un checkpoint (Guía Generada) "GG" para la Guia
                    //---------------------------------------------------------
                    $arrDatoCkpt = array();
                    $arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                    $arrDatoCkpt['UltiCkpt'] = '';
                    $arrDatoCkpt['GuiaAnul'] = SinoType::NO;
                    $arrDatoCkpt['CodiCkpt'] = $objCkptMasi->CodiCkpt;
                    $arrDatoCkpt['TextCkpt'] = $objCkptMasi->DescCkpt;
                    $arrDatoCkpt['CodiRuta'] = $objGuia->EstaOrig;
                    GrabarCheckpointOptimizado($arrDatoCkpt);
                } catch (Exception $e) {
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = 'Guia: '.$objGuia->NumeGuia;
                    $arrParaErro['MensErro'] = $e->getMessage();
                    $arrParaErro['ComeErro'] = 'Fallo la creacion de la Guia Liberty';
                    GrabarError($arrParaErro);
                    $intCantErro ++;
                    $blnTodoOkey = false;
                }
            }
        }
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        //------------------------------------------------------
        // Se inicializan los parámetros del mensaje al usuario
        //------------------------------------------------------
        $strTextMens = 'El proceso culminó con '.$intCantErro.' error(es)';
        $strTipoMens = 's';
        $strIconMens = 'check';
        //---------------------------------------------
        // Se indica cuántas guías han sido procesadas
        //---------------------------------------------
        $this->lblNumeProc->Text = $intCantGuia;
        //---------------------------------------------------------------
        // Se indica cuántas sub-cuentas han sido creadas o actualizadas
        //---------------------------------------------------------------
        $this->lblNumeClie->Text = $intNuevClie.' / '.$intClieActu;
        if (!$blnTodoOkey) {
            //---------------------------------------------------------------------------------------------------
            // Si no ha salido to-do bien, se coloca el mensaje construido como un alerta, se indica la cantidad
            // de errores existentes y se visualiza el botón para acceder a los detalles de los mismos.
            //---------------------------------------------------------------------------------------------------
            $strTipoMens = 'd';
            $strIconMens = 'hand-stop-o';
            $this->lblNumeErro->Text = $intCantErro;
            $this->btnErroProc->Visible = true;
        }
        //-----------------------------------------
        // Se construye el mensaje correspondiente
        //-----------------------------------------
        $this->mensaje($strTextMens,'m',$strTipoMens,$strIconMens);
        //-----------------------------------------------------------------------------------------------------------
        // Se activan los procesamientos de validación para determinar el estatus de actividad de carga y registros.
        //-----------------------------------------------------------------------------------------------------------
        $this->activarProcesamiento($blnProcImpo);
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
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function lstClieSele_Change() {
        if (!is_null($this->lstClieSele->SelectedValue)) {
            $this->activarProcesamiento();
        }
    }

    //-----------------------------
    // Otras acciones del programa
    //-----------------------------

    protected function activarProcesamiento($blnProcImpo = false) {
        //---------------------------
        // Se inicializan parámetros
        //---------------------------
        $intGuiaAjus = 0;
        $intGuiaOkey = 0;
        $blnAjusGuia = false;
        $blnCreaGuia = false;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Procesada, SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->ClienteId, $this->lstClieSele->SelectedValue);
        $intPendProc   = GuiaCacesa::QueryCount(QQ::AndCondition($objClauWher));
        if ($intPendProc > 0) {
            //----------------------------------------------------------------------------------------------
            // Si existe una o varias guías a procesar y/o por corregir, se guardan las mismas en un vector
            //----------------------------------------------------------------------------------------------
            $arrGuiaCace = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));
            foreach ($arrGuiaCace as $objGuiaCace) {
                //------------------------------------------------------------
                // Se verifica cuántas guías deben ser ajustadas o procesadas
                //------------------------------------------------------------
                if ($objGuiaCace->Ajustar == true) {
                    $intGuiaAjus++;
                } else {
                    $intGuiaOkey++;
                }
            }
        }
        if ($intGuiaOkey > 0) {
            //-----------------------------------------------------------------------------
            // Si existe una o más guías listas para ser procesadas, se indica cuántas hay
            //-----------------------------------------------------------------------------
            $blnCreaGuia = true;
            $this->lblNumePend->Text = $intGuiaOkey;
        }
        if ($intGuiaAjus > 0) {
            //--------------------------------------------------------------
            // Si existe una o más guías por ajustar, se indica cuántas hay
            //--------------------------------------------------------------
            $blnAjusGuia = true;
            $this->lblNumeAjus->Text = $intGuiaAjus;
        }
        //----------------------------------------------------------------------------------
        // Se ordena visualizar o no los botones para procesar y/o para corregir registros.
        //----------------------------------------------------------------------------------
        $this->btnSave->Visible = $blnCreaGuia;
        $this->btnAjusGuia->Visible = $blnAjusGuia;
        if (!$blnProcImpo) {
            //-------------------------------------------------------------
            // Se asume que no se ha importado ni procesado registros ...
            // Por defecto, el mensaje a mostrar al usuario es informativo
            //-------------------------------------------------------------
            $strTipoMens = 'i';
            $strIconMens = 'info-circle';
            if ($blnAjusGuia) {
                //---------------------------------------------------------------------------------------------------
                // Existen registros por ajustar y a su vez también puede haber la posibilidad de procesar registros
                //---------------------------------------------------------------------------------------------------
                if ($blnCreaGuia) {
                    $this->strMensProc = 'Quedan guías por corregir y por procesar!';
                } else {
                    $this->strMensProc = 'Quedan guías por corregir!';
                }
                //-----------------------------------------
                // El mensaje a mostrar es una advertencia
                //-----------------------------------------
                $strTipoMens = 'w';
                $strIconMens = 'exclamation-triangle';
            } else {
                if ($blnCreaGuia) {
                    //------------------------------------------------------------
                    // Solamente existen registros pendientes para ser procesados
                    //------------------------------------------------------------
                    $this->strMensProc = 'Quedan guías por procesar!';
                } else {
                    $this->strMensProc = 'Este Cliente No tiene guía(s) pendiente(s) por procesar ni por corregir!';
                }
            }
            if (!is_null($this->strMensProc)) {
                //--------------------------------------------------------------------------------------
                // Si se quiere manifestar un mensaje para el usuario, se crea el mismo correspondiente
                //--------------------------------------------------------------------------------------
                $this->mensaje($this->strMensProc,'',$strTipoMens,$strIconMens);
            }
        }
    }

    protected function verificarDatosMasivos($arrCampClie) {
        $blnTodoOkey = true;
        $blnDestOkey = true;
        $strNuevCont = null;
        $strTextErro = '';
        $strSucuDest = '';
        $arrResuVali = array();
        //--------------------------------------------------------
        // Se verifica la existencia previa de la Guia en la tabla
        //--------------------------------------------------------
        $strGuiaClie = $arrCampClie[1];
        if (strlen($strGuiaClie) > 0) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->GuiaExte,$strGuiaClie);
            $objGuiaMasi   = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));
            if ($objGuiaMasi) {
                $strTextErro = "Guia Repetida";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //--------------------------------------------------------
            // Se verifica la data del número de contrato del Cliente
            //--------------------------------------------------------
            $strCodiInte = $arrCampClie[0];
            if (strlen($strCodiInte) == 0) {
                $strTextErro = "El Número de Contrato del Cliente es Requerido";
                $blnTodoOkey = false;
            } else {
                //----------------------------------------------
                // Se verifica la existencia previa del Cliente
                //----------------------------------------------
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Like(QQN::MasterCliente()->CodigoInterno,'%-'.$strCodiInte.'%');
                $objMastClie   = MasterCliente::QueryArray(QQ::AndCondition($objClauWher));
                if (!$objMastClie) {
                    //----------------------------------------------------------------------------------
                    // El Cliente no existe, por lo que el Sistema debe registrarlo en la base de datos
                    //----------------------------------------------------------------------------------
                    //$strTextErro = "El Cliente de la Guía Nro. $strGuiaClie no existe!";
                    //$blnTodoOkey = false;
                    $strNuevCont = $this->objCliente->CodigoInterno.'-'.$strCodiInte;
                    //----------------------------------
                    // Antes, se verifica su cédula/RIF
                    //----------------------------------
                    $strCeduClie = $arrCampClie[2];
                    if (strlen($strCeduClie) == 0) {
                        $strTextErro = "La Cédula/Rif del Destinatario es Requerida!";
                        $blnTodoOkey = false;
                    }
                }
            }
        }
        if ($blnTodoOkey) {
            $strNombDest = $arrCampClie[3];
            if (strlen($strNombDest) == 0) {
                $strTextErro = "El Nombre del Destinatario es Requerido";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $strApelDest = $arrCampClie[4];
            if (strlen($strApelDest) == 0) {
                $strTextErro = "El Apellido del Destinatario es Requerido";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $strDireDest = $arrCampClie[5];
            if (strlen($strDireDest) == 0) {
                $strTextErro = "La Direccion de Destino es Requerida";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //--------------------------------------------------------------------------------
            // Se verifica que el Destino exista. Primero se valida que el mismo coincida con
            // la descripción o nombre de la Sucursal.
            //--------------------------------------------------------------------------------
            $strSucuDest = $arrCampClie[11];
            $objSucuDest = Estacion::LoadByDescEsta($strSucuDest);
            if (!$objSucuDest) {
                //-----------------------------------------------------------------------------
                // Si el Destino no coincide con la descripción o nombre de la Sucursal, se
                // busca por cada Sucursal una localidad relacionada que coincida con el mismo
                //-----------------------------------------------------------------------------
                $arrSucuDest = Estacion::LoadAll();
                $blnSucuOkey = false;
                foreach ($arrSucuDest as $objSucuDest) {
                    $arrPalaRela = explode(',',$objSucuDest->PalabraRelacionada);
                    if (in_array($strSucuDest,$arrPalaRela)) {
                        $strSucuDest = $objSucuDest->CodiEsta;
                        $blnSucuOkey = true;
                        break;
                    }
                }
                if (!$blnSucuOkey) {
                    $strTextErro = "El destino ".$strSucuDest." es desconocido. Debe relacionarlo con una Sucursal existente";
                    $blnDestOkey = false;
                    $blnTodoOkey = false;
                }
            } else {
                $strSucuDest = $objSucuDest->CodiEsta;
            }
        }
        if ($blnTodoOkey) {
            //-----------------------------------------------
            // Se verifica el ó los números del Destinatario
            //-----------------------------------------------
            $strTeleDest1 = $arrCampClie[6];
            $strTeleDest2 = $arrCampClie[7];
            if (strlen($strTeleDest1) == 0) {
                //-------------------------------------------------------------
                // Se verifica si el Destinatario posee otro número telefónico
                //-------------------------------------------------------------
                if (strlen($strTeleDest2) == 0) {
                    $strTextErro = "Se requiere al menos un teléfono del destinarario.";
                    $blnTodoOkey = false;
                }
            }
        }
        /*if ($blnTodoOkey) {
            //------------------------------------------
            // Se verifica la Descripcion del Contenido
            //------------------------------------------
            $strDescCont = $arrCampClie[8];
            if (strlen($strDescCont) == 0) {
                $strTextErro = "El Contenido es Requerido";
                $blnTodoOkey = false;
            }
        }*/
        if ($blnTodoOkey) {
            //------------------------------------------
            // Se verifica que el formato correspondiente
            // a la cantidad de piezas sea entero.
            //------------------------------------------
            $intCantPiez = $arrCampClie[9];
            if (!(is_int(intval($intCantPiez)) && $intCantPiez > 0)) {
                $strTextErro = "El valor de la cantidad de piezas debe ser un Entero mayor a cero(0)";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //-------------------------------------------
            // Se verifica que el formato correspondiente
            // al peso de la guía sea double.
            //-------------------------------------------
            $dblPesoGuia = $arrCampClie[12];
            if (!(is_double(doubleval($dblPesoGuia))) && $dblPesoGuia > 0) {
                $strTextErro = "El valor del peso de la guia debe ser un Numero mayor a cero (0.00)";
                $blnTodoOkey = false;
            }
        }
        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['NuevCont'] = $strNuevCont;
        $arrResuVali['DestOkey'] = $blnDestOkey;
        $arrResuVali['SucuDest'] = $strSucuDest;
        $arrResuVali['TextErro'] = $strTextErro;
        return $arrResuVali;
    }

    protected function CargarArchivo($strNombArch) {
        $this->strMensProc = '';
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Procesando archivo plano de Guias del Cliente: '.$this->lstClieSele->SelectedName;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //supress_error_start();
        //--------------------------------------------------------------
        // Se obtiene el cliente seleccionado anteriormente en la lista
        //--------------------------------------------------------------
        $this->objCliente = MasterCliente::Load($this->lstClieSele->SelectedValue);
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
                        throw new Exception('El delimitador de texto del archivo no es valido. Debe usarse un punto y coma (";")');
                    }
                    //------------------------------------------------------------
                    // Se verifica la existencia de los 13 campos reglamentarios
                    //------------------------------------------------------------
                    $intCantCamp = count($arrCampClie);
                    if ($intCantCamp != 13) {
                        $strMensErro = 'El archivo a cargar no tiene los 13 campos reglamentarios';
                        $blnTodoOkey = false;
                    }
                    //-----------------------------------------------------------------------
                    // Si to-do sale bien, se procede a verificar los datos de cada registro
                    //-----------------------------------------------------------------------
                    if ($blnTodoOkey) {
                        $arrResuVali = $this->verificarDatosMasivos($arrCampClie);
                        $blnTodoOkey = $arrResuVali['TodoOkey'];
                        $strNuevCont = $arrResuVali['NuevCont'];
                        $blnDestOkey = $arrResuVali['DestOkey'];
                        $strMensObse = $arrResuVali['TextErro'];
                        $strSucuDest = $arrResuVali['SucuDest'];
                        //-------------------------------------------------------------------------------------
                        // Se asegura si el peso de la guía tiene como separador decimal una coma, si se trata
                        // de esa situación, la misma se sustituye por un punto.
                        //-------------------------------------------------------------------------------------
                        $strPesoGuia = $arrCampClie[12];
                        $blnPostStrx = strpos($strPesoGuia,',');
                        if ($blnPostStrx) {
                            $strPesoGuia = str_replace(',','.',$strPesoGuia);
                        }
                        //-----------------------------------------------------------
                        // Se verifica si el destinatario posee uno o varios números
                        //-----------------------------------------------------------
                        $strTeleDest1 = DejarSoloLosNumeros($arrCampClie[6]);
                        $strTeleDest2 = DejarSoloLosNumeros($arrCampClie[7]);
                        if (strlen($strTeleDest1) > 0 && strlen($strTeleDest2) > 0) {
                            $strTeleDest = $strTeleDest1.'/'.$strTeleDest2;
                        } elseif (strlen($strTeleDest1) > 0 && strlen($strTeleDest2) == 0) {
                            $strTeleDest = $strTeleDest1;
                        } else {
                            $strTeleDest = $strTeleDest2;
                        }
                        //----------------------------------------------------------------
                        // Se crea un registro en la tabla guia_cacesa para cada registro
                        //----------------------------------------------------------------
                        $objGuiaMasi                      = new GuiaCacesa();
                        $objGuiaMasi->FechCarg            = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->HoraCarg            = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->Procesada           = SinoType::NO;
                        //$objGuiaMasi->NumeGuia            = substr($arrCampClie[0],2);
                        //$objGuiaMasi->NumeGuia            = strval(preg_replace('/[^0-9]+/', '', $arrCampClie[0]));
                        $objGuiaMasi->NumeGuia            = $arrCampClie[1];
                        $objGuiaMasi->GuiaExte            = $arrCampClie[1];
                        $objGuiaMasi->OrigGuia            = $this->objCliente->CodiEsta;
                        $objGuiaMasi->NombRemi            = $this->objCliente->NombClie;
                        $objGuiaMasi->DireRemi            = $this->objCliente->DirEntregaFactura;
                        $objGuiaMasi->TeleRemi            = $this->objCliente->TeleCona;
                        $objGuiaMasi->NombDest            = utf8_decode(strtoupper($arrCampClie[3])).' '.utf8_decode(strtoupper($arrCampClie[4]));
                        $objGuiaMasi->DireDest            = utf8_decode(strtoupper($arrCampClie[5]));
                        //$objGuiaMasi->TeleDest            = strtoupper($arrCampClie[6]);
                        $objGuiaMasi->TeleDest            = $strTeleDest;
                        $objGuiaMasi->CeluDest            = !is_null($arrCampClie[7]) ? strtoupper($arrCampClie[7]) : '.';
                        $objGuiaMasi->DestGuia            = !$blnDestOkey ? '.' : $strSucuDest;
                        $objGuiaMasi->DescCont            = is_null($arrCampClie[8]) ? strtoupper($arrCampClie[8]) : '.';
                        $objGuiaMasi->CantPiez            = $arrCampClie[9];
                        $objGuiaMasi->PesoGuia            = doubleval($strPesoGuia);
                        $objGuiaMasi->RegistradoPor       = $this->objUsuario->LogiUsua;
                        $objGuiaMasi->ArchInput           = utf8_decode($this->txtCargArch->FileName);
                        $objGuiaMasi->Ajustar             = $blnTodoOkey ? SinoType::NO : SinoType::SI;
                        $objGuiaMasi->OtroDestino         = !$blnDestOkey ? $strSucuDest : null;
                        $objGuiaMasi->Observacion         = utf8_decode($strMensObse);
                        $objGuiaMasi->ClienteId           = $this->objCliente->CodiClie;
                        $objGuiaMasi->TarifaId            = $this->objCliente->Tarifa->Id;
                        $objGuiaMasi->ProcesoId           = $this->objProcEjec->Id;
                        $objGuiaMasi->CodigoContrato      = !is_null($strNuevCont) ? $strNuevCont : null;
                        try {
                            $objGuiaMasi->Save();

                            $intCantRegi++;
                        } catch (Exception $e) {
                            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                            $arrParaErro['NumeRefe'] = 'Guia: '.$objGuiaMasi->GuiaExte;
                            $arrParaErro['MensErro'] = $e->getMessage();
                            $arrParaErro['ComeErro'] = 'Falló la creación de la Guia del cliente ('.$this->objCliente->CodigoInterno.') durante importación masiva';
                            GrabarError($arrParaErro);
                            $intCantErro ++;
                            $blnErroProc = true;
                        }
                    } else {
                        $this->mensaje($strMensErro,'m','d','hand-stop-o');
                    }
                }
                $intNumeLine++;
                $strLineArch = fgets($mixArchAgen);
            }
        } catch (Exception $e) {
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $strNombArch;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falla al procesar el archivo de Guias del cliente ('.$this->objCliente->CodigoInterno.')';
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
        $strTextMens = 'El proceso culminó con '.$intCantErro.' error(es)';
        $strTipoMens = 's';
        $strIconMens = 'check';
        if ($intCantRegi > 0) {
            //-------------------------------------------------------------------------------------------------
            // Si se ha importado uno o más registros, se manifiesta al usuario la posibilidad de procesar y/o
            // corregir datos, se indica la cantidad de registros cargados y se activan los procesamientos de
            // validación para determinar el estatus de actividad y/o registro.
            //-------------------------------------------------------------------------------------------------
            $strTextMens .= ' - Puede proceder a "Procesar y/o Corregir los datos"';
            $this->lblNumeCarg->Text = $intCantRegi;
            $blnProcImpo = true;
            $this->activarProcesamiento($blnProcImpo);
        }
        if ($blnErroProc) {
            //----------------------------------------------------------------------------------------------------
            // Si hay uno o varios errores, se coloca el mensaje como un alerta, se indica la cantidad de errores
            // existentes y se visualiza el botón para acceder a los detalles de los mismos.
            //----------------------------------------------------------------------------------------------------
            $strTipoMens = 'd';
            $strIconMens = 'hand-stop-o';
            $this->lblNumeErro->Text = $intCantErro;
            $this->btnErroProc->Visible = true;
        }
        //------------------------------------
        // Se crea el mensaje correspondiente
        //------------------------------------
        $this->mensaje($strTextMens,'m',$strTipoMens,$strIconMens);
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
    }

    protected function GestionarCliente(GuiaCacesa $objGuiaMasi) {
        $blnNuevRegi = false;
        //--------------------------------------------------------------------------------------------------------------
        // Primero se verifica en la base de datos si la sub-cuenta ya existe, de ser así, se actualiza el registro del
        // mismo; de lo contrario, se crea un nuevo registro.
        //--------------------------------------------------------------------------------------------------------------
        $objMastClie = MasterCliente::LoadByCodigoInterno($objGuiaMasi->CodigoContrato);
        if (!$objMastClie) {
            //-------------------------------------------------------------------------------
            // Si la sub-cuenta no existe en la base de datos, se le crea un nuevo registro,
            // y a su vez, se le asignan los datos por defecto.
            //-------------------------------------------------------------------------------
            $blnNuevRegi = true;
            $objMastClie                          = new MasterCliente();
            $objMastClie->CodiDepe                = $objGuiaMasi->ClienteId;
            $objMastClie->VendedorId              = $this->objCliente->VendedorId;
            $objMastClie->TarifaId                = $this->objCliente->TarifaId;
            $objMastClie->CicloId                 = $this->objCliente->CicloId;
            $objMastClie->CodiStat                = StatusType::ACTIVO;
            $objMastClie->CodiSino                = SinoType::NO;
            $objMastClie->TipoCliente             = TipoClienteType::CREDITO;
            $objMastClie->PorcentajeDsctoincr     = $this->objCliente->PorcentajeDsctoincr;
            $objMastClie->StatusCreditoId         = StatusCreditoType::ABIERTO;
            $objMastClie->DsctoPorVolumen         = $this->objCliente->DsctoPorVolumen;
            $objMastClie->DsctoPorPeso            = $this->objCliente->DsctoPorPeso;
            $objMastClie->PorcentajeSeguro        = $this->objCliente->PorcentajeSeguro;
            $objMastClie->MostrarGuiaExterna      = $this->objCliente->MostrarGuiaExterna;
            $objMastClie->CargaMasiva             = false;
            $objMastClie->CmGuiasYamaguchi        = false;
            $objMastClie->CmDestinatarioFrecuente = false;
            $objMastClie->PagoCod                 = true;
            $objMastClie->PagoCrd                 = true;
            $objMastClie->PagoPpd                 = true;
        }
        //---------------------------------------------------------
        // Se termina de asignar al registro los valores restantes
        //---------------------------------------------------------
        $objMastClie->NombClie                = $objGuiaMasi->NombDest;
        $objMastClie->CodiEsta                = $objGuiaMasi->DestGuia;
        $objMastClie->DireFisc                = $objGuiaMasi->DireDest;
        $objMastClie->NumeDrif                = $objGuiaMasi->CeluDest;
        $objMastClie->PersCona                = $this->objCliente->PersCona;
        $objMastClie->TeleCona                = $this->objCliente->TeleCona;
        $objMastClie->DireMail                = null;
        $objMastClie->DireReco                = $objGuiaMasi->DireDest;
        $objMastClie->CodigoInterno           = $objGuiaMasi->CodigoContrato;
        $objMastClie->DirEntregaFactura       = $this->objCliente->DirEntregaFactura;
        //-------------------------------------------------------------------------------------
        // Se crea un objeto nativo para asignarle la información de la sub-cuenta gestionada.
        //-------------------------------------------------------------------------------------
        $objInfoClie = new stdClass();
        $objInfoClie->objMastClie = $objMastClie;
        $objInfoClie->blnNuevRegi = $blnNuevRegi;
        //-------------------------------------
        // Se retorna el objeto naitvo creado.
        //-------------------------------------
        return $objInfoClie;
    }

    protected function crearGuiaMasiva(GuiaCacesa $objGuiaMasi) {
        $objGuia                     = new Guia();
        $objGuia->NumeGuia           = $objGuiaMasi->NumeGuia;
        $objGuia->CodiClie           = $objGuiaMasi->ClienteId;
        $objGuia->FechGuia           = new QDateTime(QDateTime::Now);
        $objGuia->EstaOrig           = $objGuiaMasi->OrigGuia;
        $objGuia->EstaDest           = $objGuiaMasi->DestGuia;
        $objGuia->PesoGuia           = $objGuiaMasi->PesoGuia;
        $objGuia->NombRemi           = $objGuiaMasi->NombRemi;
        $objGuia->DireRemi           = $objGuiaMasi->DireRemi;
        $objGuia->TeleRemi           = $objGuiaMasi->TeleRemi;
        $objGuia->NombDest           = utf8_encode($objGuiaMasi->NombDest);
        $objGuia->DireDest           = utf8_encode($objGuiaMasi->DireDest);
        $objGuia->TeleDest           = $objGuiaMasi->TeleDest;
        $objGuia->CantPiez           = $objGuiaMasi->CantPiez;
        $objGuia->DescCont           = utf8_encode($objGuiaMasi->DescCont);
        $objGuia->CodiProd           = 14;
        $objGuia->TipoGuia           = $this->intTipoGuia;
        $objGuia->ValorDeclarado     = 0;
        $objGuia->PorcentajeIva      = $this->porcentajeIVA($objGuia);
        $objGuia->MontoIva           = 0;
        $objGuia->Asegurado          = 0;
        $objGuia->PorcentajeSeguro   = 0;
        $objGuia->MontoSeguro        = 0;
        $objGuia->MontoBase          = 0;
        $objGuia->MontoFranqueo      = 0;
        $objGuia->MontoTotal         = 0;
        $objGuia->CantAyudantes      = 0;
        $objGuia->ParadasAdicionales = 0;
        $objGuia->CourierId          = 1;
        $objGuia->GuiaExterna        = $objGuiaMasi->GuiaExte;
        $objGuia->FleteDirecto       = 0;
        $objGuia->TieneGuiaRetorno   = 0;
        $objGuia->GuiaRetorno        = null;
        $objGuia->Observacion        = '';
        $objGuia->OperacionId        = $this->intOperGuia;
        $objGuia->PorcentajeSgroInt  = 0;
        $objGuia->MontoSgroInt       = 0;
        $objGuia->UsuarioCreacion    = $this->objUsuario->LogiUsua;
        $objGuia->FechaCreacion      = new QDateTime(QDateTime::Now);
        $objGuia->HoraCreacion       = date('H:i');
        $objGuia->CobroCod           = CobroCod::Load($objGuia->NumeGuia);
        $objGuia->VendedorId         = $this->objCliente->VendedorId;
        $objGuia->Alto               = '';
        $objGuia->Ancho              = '';
        $objGuia->Largo              = '';
        $objGuia->RecolectaId        = '';
        $objGuia->TipoDocumentoId    = 'J';
        $objGuia->CedulaRif          = '';
        $objGuia->CierreCaja         = '';
        $objGuia->CajaId             = '';
        $objGuia->MontoTotalInt      = 0;
        $objGuia->PesoVolumetrico    = '';
        $objGuia->PesoLibras         = '';
        $objGuia->HojaEntrega        = '';
        $objGuia->MontoOtros         = 0;
        $objGuia->EntregadoA         = '';
        $objGuia->FechaEntrega       = null;
        $objGuia->HoraEntrega        = '';
        $objGuia->CodiCkpt           = '';
        $objGuia->EstaCkpt           = '';
        $objGuia->FechCkpt           = null;
        $objGuia->HoraCkpt           = '';
        $objGuia->ObseCkpt           = '';
        $objGuia->UsuaCkpt           = '';
        $objGuia->FechaPod           = null;
        $objGuia->HoraPod            = '';
        $objGuia->UsuarioPod         = '';
        $objGuia->TransFac           = 0;
        $objGuia->SistemaId          = 'sde';
        $objGuia->Anulada            = 0;
        $objGuia->TarifaId           = $objGuiaMasi->TarifaId;
        $objGuia->EnEfectivo         = 0;
        return $objGuia;
    }

    protected function porcentajeIVA($objGuia){
        $decPorcIvax = $this->decPorcIvax;
        $strCodiOrig = $objGuia->EstaOrig;
        $strCodiDest = $objGuia->EstaDest;
        $arrSucuExen = unserialize($_SESSION['SucuExen']);

        $strModoPago = TipoGuiaType::ToString($objGuia->TipoGuia);
        $intPosiPago = strpos($strModoPago, "-");
        $strNombPago = substr($strModoPago, 0, $intPosiPago);

        //--------------------------------------------------------------------
        // Si la Modalida de Pago es PPD ó CRD y el Origen es una Sucursal exenta
        // de IVA, entonces el porcetaje de IVA se hace cero (0).
        //--------------------------------------------------------------------
        if ($strNombPago == 'PPD' || $strNombPago == 'CRD') {
            if (in_array($strCodiOrig,$arrSucuExen)) {
                $decPorcIvax = 0;
            }
        }
        //--------------------------------------------------------------------
        // Si la Modalida de Pago es COD y el Destino es una Sucursal exenta
        // de IVA, entonces el porcetaje de IVA se hace cero (0).
        //--------------------------------------------------------------------
        if ($strNombPago == 'COD') {
            if (in_array($strCodiDest,$arrSucuExen)) {
                $decPorcIvax = 0;
            }
        }

        return $decPorcIvax;
    }

    protected function calcularTarifaNacional($objGuia) {
        //-----------------------------------------------
        // Se procede ahora al calculo de la Tarifa
        //-----------------------------------------------
        $arrParaTari['dttFechGuia'] = $objGuia->FechGuia->__toString("YYYY-MM-DD");
        $arrParaTari['intCodiTari'] = $objGuia->TarifaId;
        $arrParaTari['intCodiProd'] = $this->objProducto->CodiProd;
        $arrParaTari['strCodiOrig'] = $objGuia->EstaOrig;
        $arrParaTari['strCodiDest'] = $objGuia->EstaDest;
        $arrParaTari['dblPesoGuia'] = $objGuia->PesoGuia;
        $arrParaTari['dblValoDecl'] = $objGuia->ValorDeclarado;
        $arrParaTari['intChecAseg'] = 0;
        $arrParaTari['dblPorcDiva'] = $objGuia->PorcentajeIva;
        $arrParaTari['decSgroClie'] = $this->objCliente->PorcentajeSeguro;

        $arrValoTari = calcularTarifaParcialNew($arrParaTari);

        $objGuia->MontoBase        = $arrValoTari['dblMontBase'];
        $objGuia->MontoFranqueo    = $arrValoTari['dblFranPost'];
        $objGuia->MontoIva         = $arrValoTari['dblMontDiva'];
        $objGuia->MontoSeguro      = $arrValoTari['dblMontSgro'];
        $objGuia->PorcentajeSeguro = $arrValoTari['dblPorcSgro'];
        $objGuia->MontoTotal       = $arrValoTari['dblMontTota'];
        $objGuia->MontoOtros       = $arrValoTari['dblMontOtro'];

        return $objGuia;
    }
}

CargaMasivaGuias::Run('CargaMasivaGuias');