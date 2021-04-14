<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : carga_masiva_clientes.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 11/10/16 10:45 AM
// Proyecto       : newliberty
// Descripcion    : Este programa es el encargado de cargar subclientes masivamente asociados a un cliente particular,
//                  a través de un archivo plano.
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargaMasivaClientes extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros de objetos
    //-----------------------
    /* @var $objMastClie MasterCliente */
    protected $objMastClie;
    /* @var $objClieTmpx ClienteTmp */
    protected $objClieTmpx;
    /* @var $objProcEjec ProcesoError */
    protected $objProcEjec;
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $strMensProc;
    //---------------------------
    // Parámetros de información
    //---------------------------
    protected $lblRegiCarg;
    protected $lblRegiProc;
    protected $lblNumePend;
    protected $lblNumeAjus;
    protected $lblNumeErro;
    protected $txtArchCarg;
    //---------
    // Botones
    //---------
    protected $btnImpoClie;
    protected $btnAjusClie;
    protected $btnErroProc;

    protected function SetupValues() {
        $intCodiMast = QApplication::PathInfo(0);
        $this->objMastClie = MasterCliente::Load($intCodiMast);
    }

    protected function Form_Create() {
        parent::Form_Create();
        // ---- Carga de Parámetros y Valores ----
        $this->SetupValues();
        // ---- Encabezado ----
        $this->lblTituForm->Text = 'Carga Masiva de Sub-Cuentas';
        // ---- Información ----
        $this->txtArchCarg_Create();
        // ---- Importación y procesamiento ----
        $this->lblRegiCarg_Create();
        $this->lblNumePend_Create();
        $this->lblNumeAjus_Create();
        $this->lblRegiProc_Create();
        $this->lblNumeErro_Create();
        // ---- Botones ----
        $this->btnImpoClie_Create();
        $this->btnSave->Text = TextoIcono('cogs fa-lg','Procesar Sub-Cuentas');
        $this->btnSave->PrimaryButton = false;
        $this->btnSave->CausesValidation = false;
        $this->btnAjusClie_Create();
        $this->btnErroProc_Create();
        // ---- Acciones ----
        $this->mensaje();
        $this->activarProcesamiento();
    }

    //---------------------
    // Creación de objetos
    //---------------------
    protected function txtArchCarg_Create() {
        $this->txtArchCarg = new QFileControl($this);
        $this->txtArchCarg->Required = true;
        $this->txtArchCarg->Width = 300;
        $this->txtArchCarg->Name = QApplication::Translate('Archivo a cargar');
    }

    //-----------------------------------------------------
    // ---- Información de importación y procesamiento ----
    //-----------------------------------------------------

    protected function lblRegiCarg_Create() {
        $this->lblRegiCarg = new QLabel($this);
        $this->lblRegiCarg->Name = 'Registros cargados/actualizados';
        $this->lblRegiCarg->Text = 0;
        $this->lblRegiCarg->HtmlEntities = false;
    }

    protected function lblNumePend_Create() {
        $this->lblNumePend = new QLabel($this);
        $this->lblNumePend->Name = 'Sub-Cuentas pendientes por procesar';
        $this->lblNumePend->Text = 0;
        $this->lblNumePend->HtmlEntities = false;
    }

    protected function lblNumeAjus_Create() {
        $this->lblNumeAjus = new QLabel($this);
        $this->lblNumeAjus->Name = 'Sub-Cuentas pendientes por corregir';
        $this->lblNumeAjus->Text = 0;
        $this->lblNumeAjus->HtmlEntities = false;
    }

    protected function lblRegiProc_Create() {
        $this->lblRegiProc = new QLabel($this);
        $this->lblRegiProc->Name = 'Sub-Cuentas procesadas (Nuevas/Actualizadas)';
        $this->lblRegiProc->Text = '0 / 0';
        $this->lblRegiProc->HtmlEntities = false;
    }

    protected function lblNumeErro_Create() {
        $this->lblNumeErro = new QLabel($this);
        $this->lblNumeErro->Name = 'Errores';
        $this->lblNumeErro->Text = 0;
        $this->lblNumeErro->HtmlEntities = false;
    }

    //------------------
    // ---- Botones ----
    //------------------

    protected function btnImpoClie_Create() {
        $this->btnImpoClie = new QButtonP($this);
        $this->btnImpoClie->Text = TextoIcono('download','Importar Sub-Cuentas','F','lg');
        $this->btnImpoClie->CausesValidation = true;
        $this->btnImpoClie->AddAction(new QClickEvent(), new QServerAction('btnImpoClie_Click'));
    }

    protected function btnAjusClie_Create() {
        $this->btnAjusClie = new QButtonI($this);
        $this->btnAjusClie->Text = TextoIcono('pencil-square-o','Corregir Sub-Cuentas');
        $this->btnAjusClie->Visible = false;
        $this->btnAjusClie->AddAction(new QClickEvent(), new QServerAction('btnAjusClie_Click'));
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
    protected function btnImpoClie_Click() {
        $strNombArch = $this->txtArchCarg->FileName;
        $strPartNomb = explode('.',$strNombArch);
        $arrExteVali = array('csv','txt','dat');
        if(in_array($strPartNomb[1],$arrExteVali)) {
            $file = basename(tempnam(getcwd(),'tmp'));
            $file = $file.'.'.$strPartNomb[1];
            $filedest = 'tmp/'.$file;
            copy($_FILES['c6']['tmp_name'],$filedest);
            $this->CargarArchivo($filedest);
        } else {
            $this->mensaje('Archivo no corresponde a una extensión válida (CSV, TXT o DAT)','','d','exclamation-triangle');
        }
    }

    protected function btnSave_Click() {
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Migrando Sub-Cuentas correspondientes al Cliente: '.$this->objMastClie->NombClie;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //supress_error_start();
        //--------------------------------------------
        // Se identifican y/o inicializan valores ...
        //--------------------------------------------
        $this->mensaje();
        $intNuevClie = 0;
        $intClieActu = 0;
        $intCantErro = 0;
        $blnTodoOkey = true;
        $blnProcImpo = true;
        $intCantPend = ClienteTmp::CountByMasterId($this->objMastClie->CodiClie);
        if ($intCantPend) {
            //--------------------------------------------------------------------------------------------------
            // Si existe una o mas sub-cuentas posibles para ser procesadas, se guardan las mismas en un vector
            //--------------------------------------------------------------------------------------------------
            $arrClieTmpx = ClienteTmp::LoadArrayByMasterId($this->objMastClie->CodiClie);
            foreach ($arrClieTmpx as $objClieTmpx) {
                //-------------------------------------------------------------------------------
                // Se verifica registro por registro cuáles pueden ser procesados o actualizados
                //-------------------------------------------------------------------------------
                if (!$objClieTmpx->Ajustar) {
                    //----------------------------------------------------
                    // Si el registro no está pendiente por ser ajustado,
                    // quiere decir que el mismo ya puede procesarse.
                    //----------------------------------------------------
                    $objInfoClie = $this->GestionarClientes($objClieTmpx);
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
                                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/carga_masiva_clientes.php/'.$objMastClie->CodiClie;
                                LogDeCambios($arrLogxCamb);
                            }
                            //----------------------------------------------------
                            // Se incrementa el contador de clientes actualizados
                            //----------------------------------------------------
                            $intClieActu++;
                        }
                        //---------------------------------------------------------
                        // La Sub-Cuenta procesada se elimina de la tabla temporal
                        //---------------------------------------------------------
                        $objClieTmpx->Delete();
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
            }
        }
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        //------------------------------------------------------
        // Se inicializan los parámetros del mensaje al usuario
        //------------------------------------------------------
        $strTipoMens = 's';
        $strIconMens = 'check';
        $strTextMens = 'El proceso culminó con '.$intCantErro.' error(es)';
        //----------------------------------------------------------------
        // Se indica cuántas sub-cuentas han sido migradas o actualizadas
        //----------------------------------------------------------------
        $this->lblRegiProc->Text = $intNuevClie.' / '.$intClieActu;
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

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = __SIST__."/carga_masiva_clientes.php/".$this->objMastClie->CodiClie;
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function btnAjusClie_Click() {
        $_SESSION['CodiMast'] = $this->objMastClie->CodiClie;
        QApplication::Redirect(__SIST__.'/cliente_tmp_list.php');
    }

    //-----------------------------
    // Otras acciones del programa
    //-----------------------------
    protected function activarProcesamiento($blnProcImpo = false, $intRegiActu = 0) {
        //---------------------------
        // Se inicializan parámetros
        //---------------------------
        $blnProcClie = false;
        $blnAjusClie = false;
        $intClieAjus = 0;
        $intClieOkey = 0;
        $intCantProc = ClienteTmp::CountByMasterId($this->objMastClie->CodiClie);
        if ($intCantProc > 0) {
            //----------------------------------------------------------------------------------------------------
            // Si existe una o varias sub-cuentas a procesar y/o por corregir, se guardan las mismas en un vector
            //----------------------------------------------------------------------------------------------------
            $arrClieTemp = ClienteTmp::LoadArrayByMasterId($this->objMastClie->CodiClie);
            foreach ($arrClieTemp as $objClieTemp) {
                //------------------------------------------------------------------
                // Se verifica cuántas sub-cuentas deben ser ajustadas o procesadas
                //------------------------------------------------------------------
                if ($objClieTemp->Ajustar == true) {
                    $intClieAjus++;
                } else {
                    $intClieOkey++;
                }
            }
        }
        if ($intClieOkey > 0) {
            //-----------------------------------------------------------------------------------
            // Si existe una o más sub-cuentas listas para ser procesadas, se indica cuántas hay
            //-----------------------------------------------------------------------------------
            $blnProcClie = true;
            $this->lblNumePend->Text = $intClieOkey;
        }
        if ($intClieAjus > 0) {
            //--------------------------------------------------------------------
            // Si existe una o más sub-cuentas por ajustar, se indica cuántas hay
            //--------------------------------------------------------------------
            $blnAjusClie = true;
            $this->lblNumeAjus->Text = $intClieAjus;
        }
        //-----------------------------------------------------------------------------------
        // Se indica cuántos registros cargados y/o actualizados en la base de datos existen
        //-----------------------------------------------------------------------------------
        $this->lblRegiCarg->Text = $intCantProc.' / '.$intRegiActu;
        //----------------------------------------------------------------------------------
        // Se ordena visualizar o no los botones para procesar y/o para corregir registros.
        //----------------------------------------------------------------------------------
        $this->btnSave->Visible = $blnProcClie;
        $this->btnAjusClie->Visible = $blnAjusClie;
        if (!$blnProcImpo) {
            //-------------------------------------------------------------
            // Se asume que no se ha importado ni procesado registros ...
            // Por defecto, el mensaje a mostrar al usuario es informativo
            //-------------------------------------------------------------
            $strTipoMens = 'i';
            $strIconMens = 'info-circle';
            if ($blnAjusClie) {
                //---------------------------------------------------------------------------------------------------
                // Existen registros por ajustar y a su vez también puede haber la posibilidad de procesar registros
                //---------------------------------------------------------------------------------------------------
                if ($blnProcClie) {
                    $this->strMensProc = 'Quedan Sub-Cuentas por corregir y por procesar!';
                } else {
                    $this->strMensProc = 'Quedan Sub-Cuentas por corregir!';
                }
                //-----------------------------------------
                // El mensaje a mostrar es una advertencia
                //-----------------------------------------
                $strTipoMens = 'w';
                $strIconMens = 'exclamation-triangle';
            } else {
                if ($blnProcClie) {
                    //------------------------------------------------------------
                    // Solamente existen registros pendientes para ser procesados
                    //------------------------------------------------------------
                    $this->strMensProc = 'Quedan Sub-Cuentas por procesar!';
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
        $blnSucuOkey = true;
        $objClieTmpx = null;
        $strTextErro = '';
        $strSucuClie = '';
        $arrResuVali = array();
        //------------------------------------------
        // Se valida el número o código de contrato
        //------------------------------------------
        $strNumeCont = $arrCampClie[0];
        if (strlen($strNumeCont) > 0) {
            //--------------------------------------------------
            // Se verifica que el Cliente a registrar no exista
            //--------------------------------------------------
            /*$objClieMast = MasterCliente::LoadByCodigoInterno($strNumeCont);
            if ($objClieMast) {
                $strTextErro = "El Cliente ($strNumeCont) ya existe en el Sistema!";
                $blnTodoOkey = false;
            } else {
                $objClieTmpx = ClienteTmp::LoadByCodigoContrato($strNumeCont);
                if ($objClieTmpx) {
                    $strTextErro = "El Cliente ($strNumeCont) ya está cargado y listo para procesarse como Cliente Liberty!";
                    $blnTodoOkey = false;
                }
            }*/
            //------------------------------------------------------------------------------------
            // Se ajusta el código de contrato de la sub-cuenta al formato oficial de liberty,
            // concatenando el código interno del cliente máster y el código de contrato original
            // de la sub-cuenta con un guión.
            //------------------------------------------------------------------------------------
            $strNumeCont = $this->objMastClie->CodigoInterno.'-'.$strNumeCont;
            //---------------------------------------------------------------------------------------
            // Luego se verifica si la sub-cuenta existe en la tabla temporal de sub-cuentas, usando
            // su código de contrato ajustado.
            //---------------------------------------------------------------------------------------
            $objClieEnco = ClienteTmp::LoadByCodigoContrato($strNumeCont);
            if ($objClieEnco) {
                $objClieTmpx = $objClieEnco;
            }
        } else {
            $strTextErro = "Debe agregar el número o código de contrato del Cliente";
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            //-----------------------------------
            // Se verifica el nombre del cliente
            //-----------------------------------
            $strNombClie = $arrCampClie[3];
            if (strlen($strNombClie) == 0) {
                $strTextErro = "El Nombre del Cliente es Requerido!";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //-------------------------------------
            // Se verifica el apellido del cliente
            //-------------------------------------
            $strNombClie = $arrCampClie[4];
            if (strlen($strNombClie) == 0) {
                $strTextErro = "El Apellido del Cliente es Requerido!";
                $blnTodoOkey = false;
            }
        }
        if($blnTodoOkey) {
            //-------------------------------------
            // Se verifica la Sucursal del cliente
            //-------------------------------------
            $strSucuClie = $arrCampClie[11];
            if (strlen($strSucuClie) == 0) {
                $strTextErro = "La Sucursal del Cliente es Requerida!";
                $blnTodoOkey = false;
            } else {
                //----------------------------------------------------------------------------
                // Se verifica que la Sucursal o Lugar exista. Primero se valida que el mismo
                // coincida con la descripción o nombre de la Sucursal.
                //----------------------------------------------------------------------------
                $objSucuClie = Estacion::LoadByDescEsta($strSucuClie);
                if (!$objSucuClie) {
                    //-----------------------------------------------------------------------------
                    // Si el Lugar no coincide con la descripción o nombre de la Sucursal, se
                    // busca por cada Sucursal una localidad relacionada que coincida con el mismo
                    //-----------------------------------------------------------------------------
                    $arrSucuDest = Estacion::LoadAll();
                    $blnEncoSucu = false;
                    foreach ($arrSucuDest as $objSucuDest) {
                        $arrPalaRela = explode(',',$objSucuDest->PalabraRelacionada);
                        if (in_array($strSucuClie,$arrPalaRela)) {
                            $strSucuClie = $objSucuDest->CodiEsta;
                            $blnEncoSucu = true;
                            break;
                        }
                    }
                    if (!$blnEncoSucu) {
                        $strTextErro = "La población ".$strSucuClie." es desconocida. Debe relacionarla con una Sucursal existente";
                        $blnSucuOkey = false;
                        $blnTodoOkey = false;
                        miTraza($strTextErro);
                    }
                } else {
                    $strSucuClie = $objSucuClie->CodiEsta;
                }
            }
        }
        if ($blnTodoOkey) {
            //--------------------------------------
            // Se verifica la Dirección del cliente
            //--------------------------------------
            $strDireClie = $arrCampClie[5];
            if (strlen($strDireClie) == 0) {
                $strTextErro = "La Dirección del Cliente es Requerida!";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //---------------------------------------
            // Se verifica la Cédula/Rif del cliente
            //---------------------------------------
            $strCeduClie = $arrCampClie[2];
            if (strlen($strCeduClie) == 0) {
                $strTextErro = "La Cédula/Rif del Cliente es Requerida!";
                $blnTodoOkey = false;
            }
        }

        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['SucuOkey'] = $blnSucuOkey;
        $arrResuVali['ClieTmpx'] = $objClieTmpx;
        $arrResuVali['SucuClie'] = $strSucuClie;
        $arrResuVali['TextErro'] = $strTextErro;
        return $arrResuVali;
    }

    protected function CargarArchivo($strNombArch) {
        $this->strMensProc = '';
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Procesando archivo plano de Sub-Cuentas del Cliente: '.$this->objMastClie->NombClie;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //supress_error_start();

        //-----------------------------------------------------------
        // Se inician los contadores y otras propiedades del archivo
        //-----------------------------------------------------------
        $intCantRegi = 0;
        $intCantActu = 0;
        $intNumeLine = 1;
        $intCantErro = 0;
        $strMensErro = '';
        $blnErroProc = false;
        $blnProcImpo = true;
        try {
            //-------------------------------
            // Se abre el archivo a procesar
            //-------------------------------
            $mixArchAgen = fopen($strNombArch,'r');
            if (!$mixArchAgen) {
                throw new Exception('No puede abrirse el archivo plano');
            }
            //-----------------------------------
            // Se lee el archivo línea por línea
            //-----------------------------------
            $strLineArch = fgets($mixArchAgen);
            while (!feof($mixArchAgen)) {
                $blnTodoOkey = true;
                //-------------------------------------------------------------------------------------------
                // Se verifica que en el archivo exista una o más líneas con registros, y que la(s) misma(s)
                // no corresponda(n) al encabezado o nombre de los campos de la tabla de regitsros.
                //-------------------------------------------------------------------------------------------
                if (strlen(trim($strLineArch)) > 0 && $intNumeLine > 1) {
                    $arrCampClie = explode(';', $strLineArch);
                    if ($arrCampClie === false) {
                        throw new Exception('El delimitador de texto del archivo no es valido. Debe usarse un punto y coma (";")');
                    }
                    //----------------------------------------------------------
                    // Se verifica la existencia de los 13 campos reglamentarios
                    //----------------------------------------------------------
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
                        $blnSucuOkey = $arrResuVali['SucuOkey'];
                        $strMensObse = $arrResuVali['TextErro'];
                        $strSucuClie = $arrResuVali['SucuClie'];
                        $blnNuevRegi = false;
                        //---------------------------------------------------------------------------------------
                        // Por cada registro, se procede a actualizar la ficha de sus datos en la tabla temporal
                        //---------------------------------------------------------------------------------------
                        $objClieTmpx = $arrResuVali['ClieTmpx'];
                        if (is_null($objClieTmpx)) {
                            //---------------------------------------------------------------------------------------
                            // Si la sub-cuenta a registrar no existe en la base de datos, se crea un nuevo registro.
                            //---------------------------------------------------------------------------------------
                            $objClieTmpx                    = new ClienteTmp();
                            //$objClieTmpx->CodigoContrato    = $arrCampClie[0];
                            $objClieTmpx->CodigoContrato    = $this->objMastClie->CodigoInterno.'-'.$arrCampClie[0];
                            $objClieTmpx->DirEntregaFactura = $this->objMastClie->DirEntregaFactura;
                            $objClieTmpx->PersCona          = $this->objMastClie->PersCona;
                            $objClieTmpx->TeleCona          = $this->objMastClie->TeleCona;
                            $objClieTmpx->MasterId          = $this->objMastClie->CodiClie;
                            $objClieTmpx->FechCarg          = new QDateTime(QDateTime::Now);
                            $objClieTmpx->HoraCarg          = new QDateTime(QDateTime::Now);
                            $blnNuevRegi = true;
                        }
                        $objClieTmpx->Nombre            = strtoupper($arrCampClie[3]).' '.strtoupper($arrCampClie[4]);
                        $objClieTmpx->Rif               = strtoupper($arrCampClie[2]);
                        $objClieTmpx->Direccion         = strtoupper($arrCampClie[5]);
                        $objClieTmpx->Sucursal          = !$blnSucuOkey ? '.' : $strSucuClie;
                        $objClieTmpx->OtraSucursal      = !$blnSucuOkey ? $strSucuClie : null;
                        $objClieTmpx->Observacion       = $strMensObse;
                        $objClieTmpx->Ajustar           = $blnTodoOkey ? SinoType::NO : SinoType::SI;
                        try {
                            //--------------------------------------------------------------------
                            // La Sub-Cuenta antes de ser guardada en la base de datos, se clona.
                            //--------------------------------------------------------------------
                            $objRegiViej = clone $objClieTmpx;
                            //----------------------------------------------
                            // Se guarda la Sub-Cuenta en la base de datos.
                            //----------------------------------------------
                            $objClieTmpx->Save();
                            if ($blnNuevRegi) {
                                //------------------------------------------------------------------------------------
                                // Si la Sub-Cuenta fue creada por primera vez, se registra el evento correspondiente
                                // en el log de actividades.
                                //------------------------------------------------------------------------------------
                                $arrLogxCamb['strNombTabl'] = 'ClienteTmp';
                                $arrLogxCamb['intRefeRegi'] = $objClieTmpx->Id;
                                $arrLogxCamb['strNombRegi'] = '('.$objClieTmpx->CodigoContrato .') - '. $objClieTmpx->Nombre;
                                $arrLogxCamb['strDescCamb'] = 'Creado';
                                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/carga_masiva_clientes.php/'.$this->objMastClie->CodiClie;
                                LogDeCambios($arrLogxCamb);
                                //--------------------------------------------
                                // se incrementa el contador correspondiente.
                                //--------------------------------------------
                                $intCantRegi++;
                            } else {
                                //------------------------------------------------------------------------------
                                // Si se trata de una actualización de la Sub-Cuenta, se verifica la existencia
                                // de algún cambio en algún dato.
                                //------------------------------------------------------------------------------
                                $objRegiNuev = $objClieTmpx;
                                $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                                    //------------------------------------------
                                    // En caso de que el objeto haya cambiado
                                    //------------------------------------------
                                    $arrLogxCamb['strNombTabl'] = 'ClienteTmp';
                                    $arrLogxCamb['intRefeRegi'] = $objClieTmpx->Id;
                                    $arrLogxCamb['strNombRegi'] = '('.$objClieTmpx->CodigoContrato .') - '. $objClieTmpx->Nombre;
                                    $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/carga_masiva_clientes.php/'.$this->objMastClie->CodiClie;
                                    LogDeCambios($arrLogxCamb);
                                }
                                //------------------------------------------
                                // Se incrementa el contador correpondiente
                                //------------------------------------------
                                $intCantActu++;
                            }
                        } catch (Exception $e) {
                            $strPrefAcci = 'actualización';
                            if ($blnNuevRegi) {
                                $strPrefAcci = 'creación';
                            }
                            $arrParaErro['ProcIdxx']  = $this->objProcEjec->Id;
                            $arrParaErro['NumeRefe']  = 'Sub-Cuenta: '.$objClieTmpx->CodigoContrato;
                            $arrParaErro['MensErro']  = $e->getMessage();
                            $arrParaErro['ComeErro']  = 'Falló la '.$strPrefAcci.' de la Sub-Cuenta del Cliente ';
                            $arrParaErro['ComeErro'] .= '('.$this->objMastClie->CodigoInterno.') durante importación masiva';
                            GrabarError($arrParaErro);
                            $intCantErro ++;
                            $blnErroProc = true;
                        }
                    } else {
                        $this->mensaje($strMensErro,'','d','hand-stop-o');
                    }
                }
                $intNumeLine++;
                $strLineArch = fgets($mixArchAgen);
            }
        } catch (Exception $e) {
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $strNombArch;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falla al procesar el archivo de Sub-Cuentas del cliente '.$this->objMastClie->NombClie;
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
        if ($intCantRegi > 0 || $intCantActu > 0) {
            //-------------------------------------------------------------------------------------------------
            // Si se ha importado uno o más registros, se manifiesta al usuario la posibilidad de procesar y/o
            // corregir datos, se indica la cantidad de registros cargados y se activan los procesamientos de
            // validación para determinar el estatus de actividad y/o registro.
            //-------------------------------------------------------------------------------------------------
            $strTextMens .= ' - Puede proceder a "Procesar y/o Corregir los datos"';
            $this->activarProcesamiento($blnProcImpo,$intCantActu);
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

    protected function GestionarClientes(ClienteTmp $objClieTmpx) {
        $blnNuevRegi = false;
        //--------------------------------------------------------------------------------------------------------------
        // Primero se verifica en la base de datos si la sub-cuenta ya existe, de ser así, se actualiza el registro del
        // mismo; de lo contrario, se crea un nuevo registro.
        //--------------------------------------------------------------------------------------------------------------
        $objMastClie = MasterCliente::LoadByCodigoInterno($objClieTmpx->CodigoContrato);
        if (!$objMastClie) {
            //-------------------------------------------------------------------------------
            // Si la sub-cuenta no existe en la base de datos, se le crea un nuevo registro,
            // y a su vez, se le asignan los datos por defecto.
            //-------------------------------------------------------------------------------
            $blnNuevRegi = true;
            $objMastClie                          = new MasterCliente();
            $objMastClie->VendedorId              = $this->objMastClie->VendedorId;
            $objMastClie->TarifaId                = $this->objMastClie->TarifaId;
            $objMastClie->CicloId                 = $this->objMastClie->CicloId;
            $objMastClie->CodiStat                = StatusType::ACTIVO;
            $objMastClie->CodiSino                = SinoType::NO;
            $objMastClie->TipoCliente             = TipoClienteType::CREDITO;
            $objMastClie->PorcentajeDsctoincr     = $this->objMastClie->PorcentajeDsctoincr;
            $objMastClie->StatusCreditoId         = StatusCreditoType::ABIERTO;
            $objMastClie->DsctoPorVolumen         = $this->objMastClie->DsctoPorVolumen;
            $objMastClie->DsctoPorPeso            = $this->objMastClie->DsctoPorPeso;
            $objMastClie->PorcentajeSeguro        = $this->objMastClie->PorcentajeSeguro;
            $objMastClie->MostrarGuiaExterna      = $this->objMastClie->MostrarGuiaExterna;
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
        $objMastClie->CodiDepe                = $objClieTmpx->MasterId;
        $objMastClie->NombClie                = $objClieTmpx->Nombre;
        $objMastClie->CodiEsta                = $objClieTmpx->Sucursal;
        $objMastClie->DireFisc                = $objClieTmpx->Direccion;
        $objMastClie->NumeDrif                = $objClieTmpx->Rif;
        $objMastClie->PersCona                = $objClieTmpx->PersCona;
        $objMastClie->TeleCona                = $objClieTmpx->TeleCona;
        $objMastClie->DireMail                = $objClieTmpx->Email ? $objClieTmpx->Email : null;
        $objMastClie->DireReco                = $objClieTmpx->Direccion;
        $objMastClie->CodigoInterno           = $objClieTmpx->CodigoContrato;
        $objMastClie->DirEntregaFactura       = $objClieTmpx->DirEntregaFactura;
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
}

CargaMasivaClientes::Run('CargaMasivaClientes');