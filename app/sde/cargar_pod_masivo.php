<?php
//----------------------------------------------------------------------------------
// Programa      : cargar_pod_masivo.php
// Realizado por : Juan Duran
// Fecha Elab.   : 22/03/2017
// Descripcion   : Este programa permite al Usuario leer un archivo plano que 
//                 debe constar de 4 columnas separadas por "punto y coma" y por 
//                 cada registro que lee actualiza la base de datos con la 
//                 informacion del POD.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargarPodMasivo extends FormularioBaseKaizen {
    protected $txtArchivo;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Cargar PODs Masivo');

        $this->txtArchivo_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function Blanquear_Mensajes() {
        $this->lblMensUsua->Text = '';
        $this->lblNotiErro->Text = '';
        $this->lblNotiErro->Visible = false;
    }

    protected function txtArchivo_Create() {
        $this->txtArchivo = new QFileControl($this);
        $this->txtArchivo->Required = true;
        $this->txtArchivo->Width = 300;
        $this->txtArchivo->Name = QApplication::Translate('Archivo a Cargar');
    }

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-upload fa-lg"></i> Cargar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnSave_Click() {
        $this->CargarArchivo($this->txtArchivo->FileName);
    }

    protected function CargarArchivo($strNombArch) {
        //---------------------------------------------------------------------------
        // Los resultados del proceso, seran mostrados al Usuario en una Hoja Excel
        //---------------------------------------------------------------------------
        $strArchResu = __TMP_DIRECTORY__.'/cpm_'.$strNombArch.'.csv';
        $mixManeArch = fopen($strArchResu,'w');
        //-----------------------------------
        // Encabezado del archivo resultado
        //-----------------------------------
        $arrLineArch = array("Linea","Resultado","Contenido");
        $strCadeAudi = implode(';',$arrLineArch);
        fputs($mixManeArch,$strCadeAudi.";\n");
        //--------------------------------------------------
        // Se identifica y valida la extension del archivo
        //--------------------------------------------------
        $blnTodoOkey = true;
        error_reporting(E_ALL ^ E_NOTICE);
        $strPartNomb = explode('.',$strNombArch);
        if ($strPartNomb[1] != 'txt' && $strPartNomb[1] != 'csv') {
            $this->lblMensUsua->Text = QApplication::Translate('Archivo no corresponde a un txt o csv');
            $this->lblMensUsua->ForeColor = 'yellow';
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            $objCheckpoint = SdeCheckpoint::Load('OK');
            $intCodiUsua = $this->objUsuario->CodiUsua;
            $blnTodoOkey = true;
            $blnHuboErro = false;
            //------------------------------------------------------------ 
            // Se procesa el archivo leido y se lleva al directorio tmp
            //------------------------------------------------------------ 
            $file = basename(tempnam(getcwd(),'tmp'));
            $filetxt = 'tmp/'.$file.'.txt';
            $file = $file.'.txt';
            $filedest = 'tmp/'.$file;
            copy($_FILES['c6']['tmp_name'],$filedest);
            //----------------------------------------
            // Se crea un descriptor para el archivo
            //----------------------------------------
            $arcDatoPods = fopen($filedest, 'r');
            //--------------------------------------------------------------------------------
            // Esta lectura, sirve para tomar el encabezado de las columnas y no procesarlas
            //--------------------------------------------------------------------------------
            if (!feof($arcDatoPods)) {
                $strDatoPodx = fgets($arcDatoPods);
            } else {
                $arrLineArch = array(0,'El Archivo esta Vacio','');
                $strCadeAudi = implode(';',$arrLineArch);
                fputs($mixManeArch,$strCadeAudi);
                $blnTodoOkey = false;
            }
            //----------------------------------------------------------
            // Se procesan las lineas una por una las lineas restantes
            //----------------------------------------------------------
            $intNumeLine = 1;
            while (!feof($arcDatoPods)) {
                $blnTodoOkey = true;
                $strDatoPodx = fgets($arcDatoPods);
                if (strlen(trim($strDatoPodx)) > 0) {
                    $arrDatoPodx = explode('|',$strDatoPodx);
                    //---------------------------------
                    // Se valida la cantidad de datos
                    //---------------------------------
                    if (count($arrDatoPodx) != 4) {
                        $arrLineArch = array($intNumeLine,'Datos errados, deben ser 4 campos separados por un pipe',$strDatoPodx);
                        $strCadeAudi = implode(';',$arrLineArch);
                        fputs($mixManeArch,$strCadeAudi);
                        $blnTodoOkey = false;
                    }
                    if ($blnTodoOkey) {
                        //-------------------------------------
                        // Se identifican y validan los datos 
                        //-------------------------------------
                        $strNumeGuia = trim($arrDatoPodx[0]);
                        $strPersReci = trim($arrDatoPodx[1]);
                        $strFechEntr = trim($arrDatoPodx[2]);
                        $strHoraEntr = trim($arrDatoPodx[3]);
                        $arrValiGuia = $this->ValidarDatosPOD($strNumeGuia,$strPersReci,$strFechEntr,$strHoraEntr);
                        $blnTodoOkey = $arrValiGuia['blnTodoOkey'];
                        if ($blnTodoOkey) {
                            //------------------------------------------------------------
                            // Si todos los datos son validos, se intenta grabar el POD 
                            //------------------------------------------------------------
                            $arrDatoPodx['objGuiaPodx'] = $arrValiGuia['objGuiaEntr'];
                            $arrDatoPodx['objChecPodx'] = $objCheckpoint;
                            $arrDatoPodx['calFechPodx'] = new QDateTime(QDateTime::Now);
                            $arrDatoPodx['txtHoraPodx'] = date("H:i");
                            $arrDatoPodx['objUsuaPodx'] = $this->objUsuario;
                            $arrDatoPodx['txtUsuaPodx'] = $this->objUsuario->CodiUsua;
                            $arrDatoPodx['txtEntrAqui'] = $arrValiGuia['strPersReci'];
                            $arrDatoPodx['calFechEntr'] = new QDateTime($arrValiGuia['strFechEntr']);
                            $arrDatoPodx['txtFechEntr'] = $arrValiGuia['strFechEntr'];
                            $arrDatoPodx['txtHoraEntr'] = $arrValiGuia['strHoraEntr'];
                            $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
                            //-----------------------------------------------------------------------
                            // Se deja registro del intento (exitoso o fallido) en el archivo plano 
                            //-----------------------------------------------------------------------
                            $arrLineArch = array($intNumeLine,$arrResuPodx['strMensUsua'],$strDatoPodx);
                            $strCadeAudi = implode(';',$arrLineArch);
                            fputs($mixManeArch,$strCadeAudi);
                        } else {
                            //-----------------------------------------------------------------
                            // Se deja registro de la transaccion fallida en el archivo plano 
                            //-----------------------------------------------------------------
                            $arrLineArch = array($intNumeLine,$arrValiGuia['strMensErro'],$strDatoPodx);
                            $strCadeAudi = implode(';',$arrLineArch);
                            fputs($mixManeArch,$strCadeAudi);
                            $blnHuboErro = true;
                        }
                    }
                }
                $intNumeLine++;
            }
            if (!$blnHuboErro) {
                $this->lblMensUsua->Text = QApplication::Translate('Archivo Procesado');
                $this->lblMensUsua->ForeColor = 'white';
            } else {
                $this->lblMensUsua->Text = QApplication::Translate('Hubo Errores en el proceso');
                $this->lblMensUsua->ForeColor = 'yellow';
            }
            //-----------------------------------------------
            // Finalmente se despliega el archivo resultado 
            //-----------------------------------------------
            QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strArchResu);
        }
    }

    protected function ValidarDatosPOD($strNumeGuia,$strPersReci,$strFechEntr,$strHoraEntr) {
        $blnTodoOkey = true;
        $strMensErro = '';
        //-----------------------
        // La guía debe existir
        //-----------------------
        $objGuia = Guia::Load($strNumeGuia);
        if (!$objGuia) {
            $blnTodoOkey = false;
            $strMensErro = "La Guia $strNumeGuia, no Existe";
        }
        if ($blnTodoOkey) {
            //---------------------------------------
            // La guía no debe haber sido entregada
            //---------------------------------------
            if ($objGuia->CodiCkpt == "OK") {
                $blnTodoOkey = false;
                $strMensErro = "La Guia $strNumeGuia, ya fue Entregada";
            }
        }
        if ($blnTodoOkey) {
            //---------------------------------------
            // No se admiten caracatéres especiales
            //---------------------------------------
            $strPersReci = strtoupper(QuitarCaracteresEspeciales2($strPersReci));
            if (strlen($strPersReci) == 0) {
                $blnTodoOkey = false;
                $strMensErro = "El nombre de la persona que recibio el paquete es requerido";
            }
        }
        if ($blnTodoOkey) {
            //----------------------------------------------------------------
            // Debe ser una fecha "valida". El formato valido es: YYYY-MM-DD
            //----------------------------------------------------------------
            $arrElemFech = explode('-', $strFechEntr);
            if (!comprobar_fecha($arrElemFech[2],$arrElemFech[1],$arrElemFech[0])) {
                $blnTodoOkey = false;
                $strMensErro = "La fecha debe estar en formato YYYY-MM-DD";
            }
        }
        if ($blnTodoOkey) {
            //----------------------------------------------------------------
            // Debe ser una hora "valida".  El formato valido es: HH:MM
            //----------------------------------------------------------------
            if (!horaValida($strHoraEntr)) {
                $blnTodoOkey = false;
                $strMensErro = "La hora debe estar en formato HH:MM (hora militar)";
            }
        }
        $arrValiGuia['blnTodoOkey'] = $blnTodoOkey;
        $arrValiGuia['strMensErro'] = $strMensErro;
        if ($blnTodoOkey) {
            $arrValiGuia['objGuiaEntr'] = $objGuia;
            $arrValiGuia['strPersReci'] = $strPersReci;
            $arrValiGuia['strFechEntr'] = $strFechEntr;
            $arrValiGuia['strHoraEntr'] = $strHoraEntr;
        } else {
            $arrValiGuia['objGuiaEntr'] = null;
            $arrValiGuia['strPersReci'] = null;
            $arrValiGuia['strFechEntr'] = null;
            $arrValiGuia['strHoraEntr'] = null;
        }
        return $arrValiGuia;
    }
}

CargarPodMasivo::Run('CargarPodMasivo');
?>