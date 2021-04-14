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
    protected $objMastClie;
    protected $objClieTmpx;
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $strMensProc;
    //---------------------------
    // Parámetros de información
    //---------------------------
    protected $lblRegiCarg;
    protected $lblRegiProc;
    protected $txtArchCarg;
    //---------
    // Botones
    //---------
    protected $btnImpoClie;

    protected function SetupValues() {
        $this->objMastClie = unserialize($_SESSION['MastClie']);
    }

    protected function Form_Create() {
        parent::Form_Create();
        // ---- Carga de Parámetros y Valores ----
        $this->SetupValues();
        // ---- Encabezado ----
        $this->lblTituForm->Text = 'Carga Masiva de Subclientes';
        // ---- Información ----
        $this->txtArchCarg_Create();
        // ---- Importación y procesamiento ----
        $this->lblRegiCarg_Create();
        $this->lblRegiProc_Create();
        // ---- Botones ----
        $this->btnImpoClie_Create();
        $this->btnSave->Text = TextoIcono('cogs fa-lg','Procesar Subclientes');
        $this->btnSave->PrimaryButton = false;
        $this->btnSave->CausesValidation = false;
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
        $this->lblRegiCarg->Name = 'Registros cargados y listos para procesar';
        $this->lblRegiCarg->Text = 0;
        $this->lblRegiCarg->HtmlEntities = false;
    }

    protected function lblRegiProc_Create() {
        $this->lblRegiProc = new QLabel($this);
        $this->lblRegiProc->Name = 'Registros procesados';
        $this->lblRegiProc->Text = 0;
        $this->lblRegiProc->HtmlEntities = false;
    }

    //------------------
    // ---- Botones ----
    //------------------

    protected function btnImpoClie_Create() {
        $this->btnImpoClie = new QButtonP($this);
        $this->btnImpoClie->Text = TextoIcono('download','Importar Subclientes','F','lg');
        $this->btnImpoClie->CausesValidation = true;
        $this->btnImpoClie->AddAction(new QClickEvent(), new QServerAction('btnImpoClie_Click'));
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------
    protected function btnImpoClie_Click() {
        $strNombArch = $this->txtArchCarg->FileName;
        $strPartNomb = explode('.',$strNombArch);
        if($strPartNomb[1] = 'csv') {
            $file = basename(tempnam(getcwd(),'tmp'));
            $file = $file.'.csv';
            $filedest = 'tmp/'.$file;
            copy($_FILES['c6']['tmp_name'],$filedest);
            $this->CargarArchivo($filedest);
        } else {
            $this->mensaje('Archivo no corresponde a un CSV','','d','exclamation-triangle');
        }
    }

    protected function btnSave_Click() {
        //---------------------------------------------------------------------------------------
        // Los errores del proceso (en el caso de haberlos), quedaran registrados en un archivo
        // archivo plano que sera mostrado al Usuario al terminar el proceso
        //---------------------------------------------------------------------------------------
        $strArchErro = '/tmp/error_creando_subclientes_del_cliente_('.$this->objMastClie->CodigoInterno.').csv';
        $mixManeArch = fopen($strArchErro,'w');
        $arrLineArch = array("Subcliente","Error");
        $strCadeAudi = implode(';',$arrLineArch);
        fputs($mixManeArch,$strCadeAudi.";\n");
        //--------------------------------------------
        // Se identifican y/o inicializan valores ...
        //--------------------------------------------
        $this->mensaje();
        $intCantClie = 0;
        $blnHuboErro = false;
        $intCantPend = ClienteTmp::LoadArrayByMasterId($this->objMastClie->CodiClie);
        if ($intCantPend) {
            $arrClieTmpx = ClienteTmp::LoadArrayByMasterId($this->objMastClie->CodiClie);
            foreach ($arrClieTmpx as $objClieTmpx) {
                //----------------------------------------------------------------------
                // Se crea un Subcliente Liberty dependiente del Cliente Master Liberty
                //----------------------------------------------------------------------
                $objMastClie = $this->crearClientes($objClieTmpx);
                $objMastClie->Save();
                $intCantClie++;
                //------------------------------------------------------------------
                // El Subcliente creado se elimina de la tabla temporal cliente_tmp
                //------------------------------------------------------------------
                $objClieTmpx->Delete();
            }
        }
        $this->mensaje('Se ha(n) creado '.$intCantClie.' Subcliente(s)!','m','s','check');
        $this->activarProcesamiento();
        if ($blnHuboErro) {
            QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strArchErro);
        }
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    //-----------------------------
    // Otras acciones del programa
    //-----------------------------
    protected function activarProcesamiento() {
        $intCantProc = ClienteTmp::CountByMasterId($this->objMastClie->CodiClie);
        $blnProcClie = false;

        if ($intCantProc > 0) {
            $blnProcClie = true;
        }

        $this->lblRegiCarg->Text = $intCantProc;
        $this->btnSave->Visible = $blnProcClie;
    }

    protected function verificarDatosMasivos($arrCampClie) {
        $arrResuVali = array();
        $blnTodoOkey = true;
        $strTextErro = '';
        //------------------------------------------
        // Se valida el número o código de contrato
        //------------------------------------------
        $strNumeCont = $arrCampClie[0];
        if (strlen($strNumeCont) > 0) {
            //--------------------------------------------------
            // Se verifica que el Cliente a registrar no exista
            //--------------------------------------------------
            $objClieMast = MasterCliente::LoadByCodigoInterno($strNumeCont);
            if ($objClieMast) {
                $strTextErro = "El Cliente ($strNumeCont) ya existe en el Sistema!";
                $blnTodoOkey = false;
            } else {
                $objClieTmpx = ClienteTmp::LoadByCodigoContrato($strNumeCont);
                if ($objClieTmpx) {
                    $strTextErro = "El Cliente ($strNumeCont) ya está cargado y listo para procesarse como Cliente Liberty!";
                    $blnTodoOkey = false;
                }
            }
        } else {
            $strTextErro = "Debe agregar el número o código de contrato del Cliente";
            $blnTodoOkey = false;
        }
        //-----------------------------------
        // Se verifica el nombre del cliente
        //-----------------------------------
        $strNombClie = $arrCampClie[1];
        if (strlen($strNombClie) == 0) {
            $strTextErro = "El Nombre del Cliente es Requerido!";
            $blnTodoOkey = false;
        }
        //-------------------------------------
        // Se verifica la Sucursal del cliente
        //-------------------------------------
        $strSucuClie = $arrCampClie[2];
        if (strlen($strSucuClie) == 0) {
            $strTextErro = "La Sucursal del Cliente es Requerida!";
            $blnTodoOkey = false;
        }
        //--------------------------------------
        // Se verifica la Dirección del cliente
        //--------------------------------------
        $strDireClie = $arrCampClie[3];
        if (strlen($strDireClie) == 0) {
            $strTextErro = "La Dirección del Cliente es Requerida!";
            $blnTodoOkey = false;
        }
        //---------------------------------------
        // Se verifica la Cédula/Rif del cliente
        //---------------------------------------
        $strCeduClie = $arrCampClie[4];
        if (strlen($strCeduClie) == 0) {
            $strTextErro = "La Cédula/Rif del Cliente es Requerida!";
            $blnTodoOkey = false;
        }
        //---------------------------------------------
        // Se verifica la Persona contacto del cliente
        //---------------------------------------------
        $strPersCont = $arrCampClie[6];
        if (strlen($strPersCont) == 0) {
            $strTextErro = "La Persona Contacto del Cliente es Requerida!";
            $blnTodoOkey = false;
        }
        //----------------------------------------------
        // Se verifica el Teléfono contacto del cliente
        //----------------------------------------------
        $strTeleCont = $arrCampClie[7];
        if (strlen($strTeleCont) == 0) {
            $strTextErro = "El Teléfono Contacto del Cliente es Requerido!";
            $blnTodoOkey = false;
        }
        //-------------------------------------------------------------------------------
        // Se valida el formato del email del Cliente en caso de agregarse en el archivo
        //-------------------------------------------------------------------------------
        $strEmaiClie = $arrCampClie[8];
        if (strlen($strEmaiClie) > 0) {
            $blnEmaiOkey = comprobar_email($strEmaiClie);
            if (!$blnEmaiOkey) {
                $strTextErro = "El formato del Email del Cliente es inválido!";
                $blnTodoOkey = false;
            }
        }

        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['TextErro'] = $strTextErro;
        return $arrResuVali;
    }

    protected function CargarArchivo($strNombArch) {
        //-------------------------------
        // Se abre el archivo a procesar
        //-------------------------------
        $mixArchAgen = fopen($strNombArch,'r');
        //---------------------------------------------------------------------------------------
        // Los errores del proceso (en el caso de haberlos), quedaran registrados en un archivo
        // plano que sera mostrado al Usuario al terminar el proceso
        //---------------------------------------------------------------------------------------
        $strNombArch = $this->txtArchCarg->FileName;
        $strPartNomb = explode('.',$strNombArch);
        //------------------------------------------------------
        // Archivo generado para reportar error de carga masiva
        //------------------------------------------------------
        $strArchErro = '/tmp/error_carga_masiva_'.$strPartNomb[0].'.csv';
        $mixManeArch = fopen($strArchErro,'w');
        $arrLineArch = array("Linea","Tipo de Error","Contenido de la linea");
        $strCadeAudi = implode(';',$arrLineArch);
        fputs($mixManeArch,$strCadeAudi.";\n");
        //-----------------------------------------------------------
        // Se inician los contadores y otras propiedades del archivo
        //-----------------------------------------------------------
        $blnHuboErro = false;
        $intCantRegi = 0;
        $intNumeLine = 1;
        //-----------------------------------
        // Se lee el archivo línea por línea
        //-----------------------------------
        $strLineArch = fgets($mixArchAgen);
        while (!feof($mixArchAgen)) {
            $arrCampClie = array();
            $blnTodoOkey = true;
            //-------------------------------------------------------------------------------------------
            // Se verifica que en el archivo exista una o más líneas con registros, y que la(s) misma(s)
            // no corresponda(n) al encabezado o nombre de los campos de la tabla de regitsros.
            //-------------------------------------------------------------------------------------------
            if (strlen(trim($strLineArch)) > 0 && $intNumeLine > 1) {
                $arrCampClie = explode(';', $strLineArch);
                //----------------------------------------------------------
                // Se verifica la existencia de los 9 campos reglamentarios
                //----------------------------------------------------------
                $intCantCamp = count($arrCampClie);
                if ($intCantCamp != 9) {
                    $arrLineArch = array($intNumeLine+1,"No tiene los 9 campos reglamentarios",$strLineArch);
                    $strCadeAudi = implode(';',$arrLineArch);
                    fputs($mixManeArch,$strCadeAudi.";\n");
                    $blnTodoOkey = false;
                    $blnHuboErro = true;
                }
                //-----------------------------------------------------------------------
                // Si to-do sale bien, se procede a verificar los datos de cada registro
                //-----------------------------------------------------------------------
                if ($blnTodoOkey) {
                    $arrResuVali = $this->verificarDatosMasivos($arrCampClie);
                    //--------------------------------------------------------------------------------------------
                    // Si la validación arroja un error, éste se guarda en el archivo plano de gestión de errores
                    //--------------------------------------------------------------------------------------------
                    if (!$arrResuVali['TodoOkey']) {
                        $arrLineArch = array($intNumeLine + 1,$arrResuVali['TextErro'],$strLineArch);
                        $strCadeAudi = implode(';',$arrLineArch);
                        fputs($mixManeArch,$strCadeAudi.";\n");
                        $blnTodoOkey = false;
                        $blnHuboErro = true;
                    }
                }
            }
            //-------------------------------------------------------------------------------------------------
            // Si se ha superado todas las validaciones, y dentro del archivo el cursor o puntero se encuentra
            // en una línea que no sea el encabezado o donde no estén los campos, entonces se procede a crear
            // un registro en la tabla cliente_tmp para cada registro.
            //-------------------------------------------------------------------------------------------------
            if ($blnTodoOkey && $intNumeLine > 1) {
                $objClieTmpx                    = new ClienteTmp();
                $objClieTmpx->CodigoContrato    = strtoupper($arrCampClie[0]);
                $objClieTmpx->Nombre            = strtoupper($arrCampClie[1]);
                $objClieTmpx->Rif               = strtoupper($arrCampClie[4]);
                $objClieTmpx->Direccion         = strtoupper($arrCampClie[3]);
                $objClieTmpx->DirEntregaFactura = strlen($arrCampClie[5]) > 0 ? strtoupper($arrCampClie[5]) : null;
                $objClieTmpx->Sucursal          = strtoupper($arrCampClie[2]);
                $objClieTmpx->PersCona          = strtoupper($arrCampClie[6]);
                $objClieTmpx->TeleCona          = strtoupper($arrCampClie[7]);
                $objClieTmpx->Email             = strlen($arrCampClie[8]) > 0 ? strtoupper($arrCampClie[8]) : null;
                $objClieTmpx->MasterId          = $this->objMastClie->CodiClie;
                $objClieTmpx->FechCarg          = new QDateTime(QDateTime::Now);
                $objClieTmpx->HoraCarg          = new QDateTime(QDateTime::Now);
                $objClieTmpx->Save();
                $intCantRegi++;
            }
            $intNumeLine++;
            $strLineArch = fgets($mixArchAgen);
        }
        if ($intCantRegi > 0) {
            $this->mensaje('Se ha(n) cargado '.$intCantRegi.' registro(s)!','m','s','check');
            $this->activarProcesamiento();
        }
        if ($blnHuboErro) {
            QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strArchErro);
        }
    }

    protected function crearClientes($objClieTmpx) {
        $objMastClie                      = new MasterCliente();
        $objMastClie->CodiDepe            = $objClieTmpx->MasterId;
        $objMastClie->NombClie            = $objClieTmpx->Nombre;
        $objMastClie->CodiEsta            = $objClieTmpx->Sucursal;
        $objMastClie->DireFisc            = $objClieTmpx->Direccion;
        $objMastClie->NumeDrif            = $objClieTmpx->Rif;
        $objMastClie->VendedorId          = $this->objMastClie->VendedorId;
        $objMastClie->TarifaId            = $this->objMastClie->TarifaId;
        $objMastClie->CicloId             = $this->objMastClie->CicloId;
        $objMastClie->PersCona            = $objClieTmpx->PersCona;
        $objMastClie->TeleCona            = $objClieTmpx->TeleCona;
        $objMastClie->DireMail            = $objClieTmpx->Email ? $objClieTmpx->Email : null;
        $objMastClie->DireReco            = $objClieTmpx->Direccion;
        $objMastClie->CodiStat            = StatusType::ACTIVO;
        $objMastClie->CodiSino            = SinoType::NO;
        $objMastClie->CodigoInterno       = $objClieTmpx->CodigoContrato;
        $objMastClie->TipoCliente         = TipoClienteType::CREDITO;
        $objMastClie->PorcentajeDsctoincr = $this->objMastClie->PorcentajeDsctoincr;
        $objMastClie->StatusCreditoId     = StatusCreditoType::ABIERTO;
        $objMastClie->DsctoPorVolumen     = $this->objMastClie->DsctoPorVolumen;
        $objMastClie->DsctoPorPeso        = $this->objMastClie->DsctoPorPeso;
        $objMastClie->PorcentajeSeguro    = $this->objMastClie->PorcentajeSeguro;
        $objMastClie->DirEntregaFactura   = $objClieTmpx->DirEntregaFactura;
        $objMastClie->MostrarGuiaExterna  = $this->objMastClie->MostrarGuiaExterna;
        $objMastClie->CargaMasiva         = $this->objMastClie->CargaMasiva;
        return $objMastClie;
    }
}

CargaMasivaClientes::Run('CargaMasivaClientes');