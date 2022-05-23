<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : carga_masiva_piezas.php
// Realizado por  : Daniel Durand
// Fecha Elab.    : 20/05/2022
// Descripcion    : Este programa permite la carga masiva de piezas asociadas a una guia
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargaMasivaPiezas extends FormularioBaseKaizen {

    protected $objProcEjec;

    protected $strMensProc;
    protected $txtCargArch;
    protected $txtNombArch;
    protected $chkEnxxKilo;

    protected $btnErroProc;

    protected $arrGuiaErro = [];
    protected $objGuiaProc;
    protected $blnEditMode;

    protected $lblNumeGuia;
    protected $lblNombRemi;
    protected $lblDestGuia;
    protected $lblNombDest;
    protected $objProcIdxx;
    protected $lstUnidMedi;


    protected function Form_Create() {
        parent::Form_Create();

        $this->objDefaultWaitIcon = new QWaitIcon($this);
        $this->lblTituForm->Text = 'Carga Masiva de Piezas';

        $this->strMensProc = '';

        $this->txtCargArch_Create();
        $this->txtNombArch_Create();
        $this->btnErroProc_Create();
        $this->lstUnidMedi_Create();


        $this->btnSave->Text = TextoIcono('upload fa-lg','Importar');
        $this->btnSave->PrimaryButton = false;
        $this->btnSave->CausesValidation = false;

        $this->mensaje();

        $this->lblNumeGuia_Create();
        $this->lblNombRemi_Create();
        $this->lblDestGuia_Create();
        $this->lblNombDest_Create();

        if (isset($_SESSION['PiezMasi']))  {

            $arrPiezMasi = unserialize($_SESSION['PiezMasi']);

            $this->lblNumeGuia->Text = $arrPiezMasi['NumeGuia'];
            $this->lblNombRemi->Text = $arrPiezMasi['NombRemi'];
            $this->lblDestGuia->Text = $arrPiezMasi['DestGuia'];
            $this->lblNombDest->Text = $arrPiezMasi['NombDest'];
            $this->objProcEjec       = $arrPiezMasi['ProcEjec'];
        }

    }

    //-------------------------
    // Creación de objetos ...
    //-------------------------

    protected function lstUnidMedi_Create() {
        $this->lstUnidMedi = new QListBox($this);
        $this->lstUnidMedi->Name = 'Las Medidas están expresadas en';
        $this->lstUnidMedi->AddItem('cm','cm');
        $this->lstUnidMedi->AddItem('pl','pl');
    }


    protected function lblNumeGuia_Create() {
        $this->lblNumeGuia = new QLabel($this);
        $this->lblNumeGuia->Name = 'Nro de Guia';
    }

    protected function lblNombRemi_Create() {
        $this->lblNombRemi = new QLabel($this);
        $this->lblNombRemi->Name = 'Remitente';
    }

    protected function lblDestGuia_Create() {
        $this->lblDestGuia = new QLabel($this);
        $this->lblDestGuia->Name = 'Destino';
    }

    protected function lblNombDest_Create() {
        $this->lblNombDest = new QLabel($this);
        $this->lblNombDest->Name = 'Destinatario';
    }

    protected function txtCargArch_Create() {
        $this->txtCargArch = new QFileControl($this);
        $this->txtCargArch->Required = true;
        $this->txtCargArch->Width = 300;
        $this->txtCargArch->Name = QApplication::Translate('Archivo a Cargar');
    }


    protected function txtNombArch_Create() {
        $this->txtNombArch = new QTextBox($this);
        $this->txtNombArch->Name = 'Archivo';
        $this->txtNombArch->ToolTip = 'Nombre del archivo cargado...';
        $this->txtNombArch = disableControl($this->txtNombArch);
        $this->txtNombArch->Visible = false;
    }

    protected function chkEnxxKilo_Create() {
        $this->chkEnxxKilo = new QCheckBox($this);
        $this->chkEnxxKilo->Name = 'En Kilos ?';
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


    protected function btnCancel_Click() {
        $_SESSION['RegrMasi'] = true;

        $intCantRegi = PiezasTemp::CountByProcesoErrorId($this->objProcEjec->Id);
        t('Antes de regresarme, la cantidad de registros es: '.$intCantRegi);

        parent::btnCancel_Click();
    }

    protected function btnSave_Click() {
        $strNombArch = $this->txtCargArch->FileName;
        $arrNombArch = explode('.',$strNombArch);
        $strExteArch = $arrNombArch[1];
        $arrExteVali = ['xls','xlsx'];
        if (in_array($strExteArch,$arrExteVali)) {
            $file = basename(tempnam(getcwd(),'tmp'));
            $file = $file.'.'.$strExteArch;
            $filedest = '/tmp/'.$file;
            copy($_FILES['c8']['tmp_name'],$filedest);
            $this->CargarPiezas($filedest,$strExteArch);
        } else {
            $strExteVali = implode(',',$arrExteVali);
            $strMensUsua = 'Archivo no corresponde a una extensión válida <b>'.$strExteVali.'</b>';
            $this->danger($strMensUsua);
        }
    }

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = "carga_masiva_piezas.php/";
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }


    protected function verificarDatosMasivos($arrCampPiez,$intNumeLine) {
        t('Verificando datos de la linea: '.$intNumeLine);
        $arrContVali = [];
        $blnTodoOkey = true;
        $strTextErro = '';
        $arrResuVali = array();
        
        $strEmpaPiez = $arrCampPiez[0];
        if (strlen($strEmpaPiez) == 0) {
            $strTextErro = "Linea $intNumeLine | Col 1 | El Empaque, es Requerido (BOLSA, CAJA, PALETA, etc)";
            $blnTodoOkey = false;
        }
        $strDescCont = $arrCampPiez[1];
        if (strlen($strDescCont) == 0) {
            $strTextErro = "Linea $intNumeLine | Col 2 | La Descripcion del Contenido de la Pieza, es Requerido";
            $blnTodoOkey = false;
        }
        $decAltoPiez = (float)$arrCampPiez[2];
        $arrContVali['AltoPiez'] = $decAltoPiez;
        if ($blnTodoOkey) {
            if ($decAltoPiez == 0) {
                $strTextErro = "Linea $intNumeLine | Col 3 | Alto de la Piezas debe ser un Número mayor a Cero";
                $blnTodoOkey = false;
            }
        }
        $decAnchPiez = (float)$arrCampPiez[3];
        $arrContVali['AnchPiez'] = $decAnchPiez;
        if ($blnTodoOkey) {
            if ($decAnchPiez == 0) {
                $strTextErro = "Linea $intNumeLine | Col 4 | Ancho de la Piezas debe ser un Número mayor a Cero";
                $blnTodoOkey = false;
            }
        }
        $decLargPiez = (float)$arrCampPiez[4];
        $arrContVali['LargPiez'] = $decLargPiez;
        if ($blnTodoOkey) {
            if ($decLargPiez == 0) {
                $strTextErro = "Linea $intNumeLine | Col 5 | Largo de la Piezas debe ser un Número mayor a Cero";
                $blnTodoOkey = false;
            }
        }
        $decKiloPiez = (float)$arrCampPiez[5];
        $arrContVali['KiloPiez'] = $decKiloPiez;
        if ($blnTodoOkey) {
            if (strlen($decKiloPiez) > 0) {
                if (!is_numeric($decKiloPiez)) {
                    $strTextErro = "Linea $intNumeLine | Col 6 | Los kilos de la debe ser un Número";
                    $blnTodoOkey = false;
                }
            }
        }
        $decValoDecl = (float)$arrCampPiez[6];
        $arrContVali['ValoDecl'] = $decValoDecl;
        if ($blnTodoOkey) {
            if (strlen($decValoDecl) > 0) {
                if (!is_numeric($decValoDecl)) {
                    $strTextErro = "Linea $intNumeLine | Col 7 | El Valor Declarado debe ser un Número";
                    $blnTodoOkey = false;
                }
            }
        }
        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['TextErro'] = $strTextErro;
        $arrResuVali['ContVali'] = $arrContVali;
        t('Termine la verificacion.  Errores: '.$strTextErro);
        return $arrResuVali;
    }

    protected function CargarPiezas($strNombArch,$strExteArch) {
        t('');
        t('=====================');
        t('Rutina: CargarPiezas');

        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //-----------------------------------------------------------
        // Se inician los contadores y otras propiedades
        //-----------------------------------------------------------
        $intCantRegi = 0;
        $intCantErro = 0;
        $blnErroProc = false;
        try {
            //-------------------------------
            // Se abre el archivo a procesar
            //-------------------------------
            $strLibrExce = $strExteArch == 'xls' ? 'SimpleXLS' : 'SimpleXLSX';
            if ( $xls = $strLibrExce::parseFile($strNombArch) ) {

            } else {
                $strMensErro = $strLibrExce::parseError();
                t('Error leyendo el archivo: '.$strMensErro);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNombArch;
                $arrParaErro['MensErro'] = $strMensErro;
                $arrParaErro['ComeErro'] = 'Error leyendo archivo excel: '.$strMensErro;
                GrabarError($arrParaErro);
                $this->danger($strMensErro);
                return;
            }
            //----------------------------------
            // Se lee el archivo linea a linea
            //----------------------------------
            $objEmpqBols = Empaque::LoadByNombre('BOLSA');
            $intNumeLine = 1;
            foreach ($xls->rows() as $arrCampPiez) {
                if ( (count($arrCampPiez) > 0) && ($intNumeLine > 1) ) {
                    //----------------------------------------------------------
                    // Se verifica la existencia de los campos reglamentarios
                    //----------------------------------------------------------
                    $intCantCamp = count($arrCampPiez);
                    if ($intCantCamp != 7) {
                        $strMensErro = "La linea $intNumeLine no tiene los 7 campos requeridos. Tiene: $intCantCamp";
                        t($strMensErro);
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = $strNombArch;
                        $arrParaErro['MensErro'] = $strMensErro;
                        $arrParaErro['ComeErro'] = 'Cargando Manifiesto del Cliente ('.$this->objCliente->NombClie.')';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $blnErroProc = true;
                        $intNumeLine++;
                        continue;
                    }
                    //-----------------------------------------------------------------------
                    // Si to-do sale bien, se procede a verificar los datos de cada registro
                    //-----------------------------------------------------------------------
                    $arrResuVali = $this->verificarDatosMasivos($arrCampPiez,$intNumeLine);
                    t('Datos verificados');
                    $blnTodoOkey = $arrResuVali['TodoOkey'];
                    $strMensObse = $arrResuVali['TextErro'];
                    $arrContVali = $arrResuVali['ContVali'];
                    //-----------------------------------------------
                    // Variables contenidas en la linea del archivo
                    //-----------------------------------------------
                    $strEmpaPiez = $arrContVali['EmpaPiez'];
                    $strDescCont = $arrContVali['DescCont'];
                    $decAltoPiez = $arrContVali['AltoPiez'];
                    $decAnchPiez = $arrContVali['AnchPiez'];
                    $decLargPiez = $arrContVali['LargPiez'];
                    $decKiloPiez = $arrContVali['KiloPiez'];
                    $decValoDecl = $arrContVali['ValoDecl'];
                    //-----------------------------------------------------------------------
                    // Se crea un registro en la tabla piezas_temp para c/linea del archivo
                    //-----------------------------------------------------------------------
                    try {

                        if ($this->lstUnidMedi->SelectedValue == 'pl') {
                            t('transformando plg a cms');
                            //-------------------------------
                            // Las pulgadas se llevan a cms
                            //-------------------------------
                            $decAltoPiez *= 2.54;
                            $decAnchPiez *= 2.54;
                            $decLargPiez *= 2.54;
                        }

                        t('voy a calcular el volumen de la pieza');
                        $decVoluPiez = ($decAltoPiez * $decAnchPiez * $decLargPiez) / 5000;
                        $decPiesPiez = (($decAltoPiez * $decAnchPiez * $decLargPiez) / 1000000) * 35.315;

                        $objEmpqPiez = Empaque::LoadByNombre($strEmpaPiez);
                        if ($objEmpqPiez instanceof Empaque) {
                            $intEmpaPiez = $objEmpqPiez->Id;
                        } else {
                            $intEmpaPiez = $objEmpqBols->Id;
                        }

                        t('voy a asignar valores de la tabla');
                        $objPiezGuia = new PiezasTemp();
                        $objPiezGuia->ProcesoErrorId = $this->objProcEjec->Id;
                        $objPiezGuia->CreatedBy      = $this->objUsuario->CodiUsua;
                        $objPiezGuia->EmpaqueId      = $intEmpaPiez;
                        $objPiezGuia->Descripcion    = substr(strtoupper(limpiarCadena($strDescCont)),0,50);
                        $objPiezGuia->Kilos          = (float)$decKiloPiez;
                        $objPiezGuia->Alto           = $decAltoPiez;
                        $objPiezGuia->Ancho          = $decAnchPiez;
                        $objPiezGuia->Largo          = $decLargPiez;
                        $objPiezGuia->Volumen        = (float)$decVoluPiez;
                        $objPiezGuia->ValorDeclarado = $decValoDecl;
                        $objPiezGuia->PiesCub        = (float)$decPiesPiez;
                        $objPiezGuia->Save();
                        t('Salve en PiezasTemp');

                    } catch (Exception $e) {
                        t('Error: '.$e->getMessage());
                        break;
                    }
                }
                $intNumeLine++;
            }
        } catch (Exception $e) {
            t('Error cargando el archivo: '.$e->getMessage());
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $strNombArch;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falla cargando Piezas Masivas ('.$this->objGuiaProc->NumeGuia.')';
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
        $strTextMens = 'El proceso culmino con '.$intCantErro.' error(es)';
        if ($blnErroProc) {
            //----------------------------------------------------------------------------------------------------
            // Si hay uno o varios errores, se coloca el mensaje como un alerta, se indica la cantidad de errores
            // existentes y se visualiza el botón para acceder a los detalles de los mismos.
            //----------------------------------------------------------------------------------------------------
            $this->btnErroProc->Visible = true;
            $strTipoMens = 'danger';
        } else {
            $strTipoMens = 'success';
        }
        //------------------------------------
        // Se crea el mensaje correspondiente
        //------------------------------------
        $this->$strTipoMens($strTextMens);
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = $blnErroProc ? true : false;
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

        t('El Id del Proceso es: '.$this->objProcEjec->Id);
        t('La cantidad de errores: '.$intCantErro);
        $_SESSION['ProcAnte'] = $this->objProcEjec->Id;
        $_SESSION['CantErro'] = $intCantErro;
    }


}

CargaMasivaPiezas::Run('CargaMasivaPiezas');
