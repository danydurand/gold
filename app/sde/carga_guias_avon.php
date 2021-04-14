<?php
//-----------------------------------------------------------------------------
// Programa       : carga_guias_avon.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 13/10/16 03:07 PM
// Proyecto       : newliberty
// Descripcion    : Este programa es el encargado de cargar guías del cliente
//                  Avon masivamente, a través de un archivo plano.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargaGuiasAvon extends FormularioBaseKaizen {
    //------------------------
    // Parámetros de Objetos
    //------------------------
    protected $objTarifa;
    protected $objCliente;
    protected $objProducto;
    protected $objOperFict;
    protected $objProcEjec;

    //-----------------------
    // Parámetros Regulares
    //-----------------------
    protected $intOperGuia;
    protected $decPorcIvax;
    protected $strMensProc;

    //----------------------------
    // Parámetros de Información
    //----------------------------
    protected $txtCargArch;
    //---- Información sobre importación y procesamiento ----
    protected $lblNumeCarg;
    protected $lblNumePend;
    protected $lblNumeAjus;
    protected $lblNumeProc;
    protected $lblNumeErro;

    //------------------------
    // Parámetros de Botónes
    //------------------------
    protected $btnImpoGuia;
    protected $btnAjusGuia;
    protected $btnErroProc;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Carga de Guías AVON';
        $this->strMensProc = '';

        //---- Información ----

        $this->txtCargArch_Create();

        //---- Importación y procesamiento ----

        $this->lblNumeCarg_Create();
        $this->lblNumeProc_Create();
        $this->lblNumePend_Create();
        $this->lblNumeAjus_Create();
        $this->lblNumeErro_Create();

        // ---- Botones ----

        $this->btnImpoGuia_Create();
        $this->btnErroProc_Create();

        $this->btnSave->Text = TextoIcono('cogs fa-lg','Procesar Guías');
        $this->btnSave->PrimaryButton = false;
        $this->btnSave->CausesValidation = false;

        $this->btnAjusGuia_Create();

        //---- Atributos y funciones ----

        $dteFechDhoy = FechaDeHoy();
        $this->decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA',$dteFechDhoy);

        $this->mensaje();
        //$this->activarProcesamiento();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtCargArch_Create() {
        $this->txtCargArch = new QFileControl($this);
        $this->txtCargArch->Required = true;
        $this->txtCargArch->Width = 300;
        $this->txtCargArch->Name = QApplication::Translate('Archivo a Cargar');
    }

    //------------------------------------------------------
    // ---- Información de Importación y Procesamiento ----
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

    protected function lblNumeErro_Create() {
        $this->lblNumeErro = new QLabel($this);
        $this->lblNumeErro->Name = 'Errores';
        $this->lblNumeErro->Text = 0;
        $this->lblNumeErro->HtmlEntities = false;
    }

    //-------------------
    // ---- Botónes ----
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

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnErroProc_Click() {
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function btnImpoGuia_Click() {
        $strNombArch = $this->txtCargArch->FileName;
        $strPartNomb = explode('.',$strNombArch);
        if ($strPartNomb[1] == 'csv') {
            $file = basename(tempnam(getcwd(),'tmp'));
            //$filetxt = 'tmp/'.$file.'.csv';
            $file = $file.'.csv';
            $filedest = 'tmp/'.$file;
            copy($_FILES['c6']['tmp_name'],$filedest);
            //$this->CargarArchivo($filedest);
        } else {
            $this->mensaje('Archivo no corresponde a un CSV','','d','exclamation-triangle');
        }
    }

    protected function btnAjusGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_cacesa_list.php');
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    //------------------------------
    // Otras Acciones del Programa
    //------------------------------

    protected function activarProcesamiento($blnProcImpo = false) {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Procesada, SinoType::NO);
        $intPendProc   = GuiaCacesa::QueryCount(QQ::AndCondition($objClauWher));

        $intGuiaAjus = 0;
        $intGuiaOkey = 0;

        $blnAjusGuia = false;
        $blnCreaGuia = false;

        if ($intPendProc > 0) {
            $arrGuiaCace = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));

            foreach ($arrGuiaCace as $objGuiaCace) {
                if ($objGuiaCace->Ajustar == true) {
                    $intGuiaAjus++;
                } else {
                    $intGuiaOkey++;
                }
            }
        }

        if ($intGuiaOkey > 0) {
            $blnCreaGuia = true;
            $this->lblNumePend->Text = $intGuiaOkey;
        }

        if ($intGuiaAjus > 0) {
            $blnAjusGuia = true;
            $this->lblNumeAjus->Text = $intGuiaAjus;
        }

        $this->btnSave->Visible = $blnCreaGuia;
        $this->btnAjusGuia->Visible = $blnAjusGuia;

        if (!$blnProcImpo) {
            $strTipoMens = 'i';
            if ($blnAjusGuia) {
                if ($blnCreaGuia) {
                    $this->strMensProc = 'Quedan guías por corregir y por procesar!';
                } else {
                    $this->strMensProc = 'Quedan guías por corregir!';
                }

                $strTipoMens = 'w';
            } else {
                if ($blnCreaGuia) {
                    $this->strMensProc = 'Quedan guías por procesar!';
                }
            }

            if (!is_null($this->strMensProc)) {
                $this->mensaje($this->strMensProc,'',$strTipoMens,'exclamation-triangle');
            }
        }
    }

    protected function verificarDatosMasivos($arrCampClie) {
        $blnTodoOkey = true;
        $blnDestOkey = true;
        $strTextErro = '';
        $strSucuDest = '';
        $arrResuVali = array();
        //--------------------------------------------------------
        // Se verifica la existencia previa de la Guia en la tabla
        //--------------------------------------------------------
        $strGuiaClie = $arrCampClie[0];
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
            $strDireDest = $arrCampClie[2];
            if (strlen($strDireDest) == 0) {
                $strTextErro = "La Direccion de Destino es Requerida";
                $blnTodoOkey = false;
            }
        }

        if ($blnTodoOkey) {
            $strNombDest = $arrCampClie[1];
            if (strlen($strNombDest) == 0) {
                $strTextErro = "El Nombre del Destinatario es Requerido";
                $blnTodoOkey = false;
            }
        }

        if ($blnTodoOkey) {
            //--------------------------------------------------------------------------------
            // Se verifica que el Destino exista. Primero se valida que el mismo coincida con
            // la descripción o nombre de la Sucursal.
            //--------------------------------------------------------------------------------
            $strSucuDest = $arrCampClie[5];
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
            $strTeleDest = $arrCampClie[6];
            if (strlen($strTeleDest) == 0) {
                $strTextErro = "El Tlf. del Destinatario es Requerido";
                $blnTodoOkey = false;
            }
        }

        if ($blnTodoOkey) {
            //------------------------------------------
            // Se verifica la Descripcion del Contenido
            //------------------------------------------
            $strDescCont = $arrCampClie[8];
            if (strlen($strDescCont) == 0) {
                $strTextErro = "El Contenido es Requerido";
                $blnTodoOkey = false;
            }
        }

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
            $intCantPiez = $arrCampClie[10];
            if (!(is_double(doubleval($intCantPiez)) && $intCantPiez > 0)) {
                $strTextErro = "El valor del peso de la guia debe ser un Numero mayor a cero (0.00)";
                $blnTodoOkey = false;
            }
        }

        $arrResuVali['TodoOkey'] = $blnTodoOkey;
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
        $strNombProc = 'Procesando archivo CSV de Guias del Cliente: '.$this->lstClieSele->SelectedName;
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
                throw new Exception('No puede abrirse el archivo CSV');
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
                        throw new Exception('El delimitador de texto del archivo no es valido. Debe usarse un pipe (";")');
                    }
                    //------------------------------------------------------------
                    // Se verifica la existencia de los 15 campos reglamentarios
                    //------------------------------------------------------------
                    $intCantCamp = count($arrCampClie);
                    if ($intCantCamp != 11) {
                        $strMensErro = 'El archivo a cargar no tiene los 11 campos reglamentarios';
                        $blnTodoOkey = false;
                    }
                    if ($blnTodoOkey) {
                        $arrResuVali = $this->verificarDatosMasivos($arrCampClie);
                        $blnTodoOkey = $arrResuVali['TodoOkey'];
                        $blnDestOkey = $arrResuVali['DestOkey'];
                        $strMensObse = $arrResuVali['TextErro'];
                        $strSucuDest = $arrResuVali['SucuDest'];

                        //----------------------------------------------------------------
                        // Se crea un registro en la tabla guia_cacesa para cada registro
                        //----------------------------------------------------------------
                        $objGuiaMasi                 = new GuiaCacesa();
                        $objGuiaMasi->FechCarg       = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->HoraCarg       = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->Procesada      = SinoType::NO;
                        //$objGuiaMasi->NumeGuia       = substr($arrCampClie[0],2);
                        $objGuiaMasi->NumeGuia       = strval(preg_replace('/[^0-9]+/', '', $arrCampClie[0]));
                        $objGuiaMasi->GuiaExte       = $arrCampClie[0];
                        $objGuiaMasi->OrigGuia       = $this->objCliente->CodiEsta;
                        $objGuiaMasi->NombRemi       = $this->objCliente->NombClie;
                        $objGuiaMasi->DireRemi       = '.';
                        $objGuiaMasi->TeleRemi       = '.';
                        $objGuiaMasi->NombDest       = strtoupper($arrCampClie[1]);
                        //$objGuiaMasi->DireDest       = strtoupper($arrCampClie[2]).' - C. Postal: '.strtoupper($arrCampClie[6]);
                        $objGuiaMasi->DireDest       = strtoupper($arrCampClie[2]);
                        $objGuiaMasi->TeleDest       = strtoupper($arrCampClie[6]);
                        $objGuiaMasi->CeluDest       = '.';
                        $objGuiaMasi->DestGuia       = !$blnDestOkey ? '.' : $strSucuDest;
                        $objGuiaMasi->DescCont       = strtoupper($arrCampClie[8]);
                        $objGuiaMasi->CantPiez       = $arrCampClie[9];
                        $objGuiaMasi->PesoGuia       = $arrCampClie[10];
                        $objGuiaMasi->RegistradoPor  = $this->objUsuario->LogiUsua;
                        $objGuiaMasi->ArchInput      = $this->txtCargArch->FileName;
                        $objGuiaMasi->Ajustar        = $blnTodoOkey ? SinoType::NO : SinoType::SI;
                        $objGuiaMasi->OtroDestino    = !$blnDestOkey ? $strSucuDest : null;
                        $objGuiaMasi->Observacion    = $strMensObse;
                        $objGuiaMasi->ClienteId      = $this->objCliente->CodiClie;
                        $objGuiaMasi->TarifaId       = $this->objCliente->Tarifa->Id;
                        $objGuiaMasi->ProcesoId      = $this->objProcEjec->Id;

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
                        $this->mensaje($strMensErro,'m','d','exclamation-triangle');
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

        error_reporting($mixErroOrig);

        $strTextMens = 'El proceso culminó con '.$intCantErro.' error(es)';
        $strTipoMens = 's';
        $strIconMens = 'check';

        if ($intCantRegi > 0) {
            $strTextMens .= ' - Puede proceder a "Procesar y/o Corregir los datos"';
            $this->lblNumeCarg->Text = $intCantRegi;
            $blnProcImpo = true;
            $this->activarProcesamiento($blnProcImpo);
        }

        if ($blnErroProc) {
            $strTipoMens = 'd';
            $strIconMens = 'exclamation-triangle';
            $this->lblNumeErro->Text = $intCantErro;
            $this->btnErroProc->Visible = true;
        }

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
}
CargaGuiasAvon::Run('CargaGuiasAvon');