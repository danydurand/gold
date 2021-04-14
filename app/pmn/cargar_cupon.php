<?php
//----------------------------------------------------------
// Programa       : cargar_cupon.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 04/05/16 12:09 PM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargarCupon extends FormularioBaseKaizen {
    protected $intCantCupo;
    
    protected $txtCargArch;

    protected $lblCantCupo;
    protected $lblUsuaCarg;
    protected $lblFechCarg;

    protected $btnCreaGuia;

    protected function SetupCupon() {
        $this->intCantCupo = 0;
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupCupon();

        $this->lblTituForm->Text = QApplication::Translate('Registro masivo de cupones');

        $this->txtCargArch_Create();
        $this->lblCantCupo_Create();
        $this->lblUsuaCarg_Create();
        $this->lblFechCarg_Create();

        $this->btnSave->Text = TextoIcono('cogs fa-lg','Procesar cupones');
    }

    //-------------------------
    // Construcción de objetos
    //-------------------------

    protected function txtCargArch_Create() {
        $this->txtCargArch = new QFileControl($this);
        $this->txtCargArch->Name = QApplication::Translate('Archivo a Cargar');
        $this->txtCargArch->Required = true;
        $this->txtCargArch->Width = 300;
        $this->txtCargArch->AddAction(new QClickEvent(), new QAjaxAction('txtCargArch_Click'));
    }

    protected function lblCantCupo_Create() {
        $this->lblCantCupo = new QLabel($this);
        $this->lblCantCupo->Name = 'Cupones procesados: ';
        $this->lblCantCupo->Visible = false;
    }

    protected function lblUsuaCarg_Create() {
        $this->lblUsuaCarg = new QLabel($this);
        $this->lblUsuaCarg->Name = 'Cargado por: ';
        $this->lblUsuaCarg->Visible = false;
    }

    protected function lblFechCarg_Create() {
        $this->lblFechCarg = new QLabel($this);
        $this->lblFechCarg->Name = 'Fecha de carga: ';
        $this->lblFechCarg->Visible = false;
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------
    
    protected function btnSave_Click() {
        $strNombArch = $this->txtCargArch->FileName;
        $strPartNomb = explode('.',$strNombArch);

        if ($strPartNomb[1] == 'csv') {
            $file = basename(tempnam(getcwd(),'tmp'));
            $filetxt = 'tmp/'.$file.'.csv';
            $file = $file.'.csv';
            $filedest = 'tmp/'.$file;
            copy($_FILES['c6']['tmp_name'],$filedest);
            $this->CargarArchivo($filedest);
        } else {
            $this->mensaje('Archivo no corresponde a un CSV','','d','exclamation-triangle');
        }
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }
    
    //------------------------------
    // Otras funciones del programa
    //------------------------------
    
    protected function CargarArchivo($strNombArch) {
        $mixArchAgen = fopen($strNombArch,'r');

        $strMensErro = '';

        //----------------------------------
        // Se lee el archivo linea a linea
        //----------------------------------
        $blnHuboErro = false;
        $intCantRegi = 0;
        $intNumeLine = 1;
        $strLineArch = fgets($mixArchAgen);
        $arrCampClie = array();

        while (!feof($mixArchAgen)) {
            $blnTodoOkey = true;

            if (strlen(trim($strLineArch)) > 0 && $intNumeLine > 1) {
                $arrCampClie = explode(';', $strLineArch);

                //----------------------------------------------------------
                // Se verifica la existencia de los 4 campos reglamentarios
                //----------------------------------------------------------
                $intCantCamp = count($arrCampClie);

                if ($intCantCamp != 4) {
                    $strMensErro = 'El archivo no contiene los 4 campos reglamentarios!';
                    $blnTodoOkey = false;
                    $blnHuboErro = true;
                }

                if ($blnTodoOkey) {
                    $arrResuVali = $this->verificarDatosMasivos($arrCampClie);

                    if (!$arrResuVali['TodoOkey']) {
                        $strMensErro = $arrResuVali['TextErro'];
                        $blnTodoOkey = false;
                        $blnHuboErro = true;
                    }
                }
            }

            if ($blnTodoOkey && $intNumeLine > 1) {
                //----------------------------------------------------------
                // Se crea un registro en la tabla cupon para cada registro
                //----------------------------------------------------------
                $objCupon = new Cupon();
                $objCupon->Numero = $arrCampClie[0];
                $objCupon->PorcentajeDescuento = floatval($arrCampClie[1]);
                $objCupon->CargadoPor = $this->objUsuario->LogiUsua;
                $objCupon->CargadoEl = new QDateTime(QDateTime::Now);
                $objCupon->Receptoria = strtoupper($arrCampClie[2]);
                $objCupon->Tipo = $arrCampClie[3];
                $objCupon->Save();

                $intCantRegi++;
            }

            $intNumeLine++;
            $strLineArch = fgets($mixArchAgen);
        }

        if ($intCantRegi > 0) {
            $this->mensaje('Operación de carga exitosa!','','s','check');

            $this->lblCantCupo->Visible = true;
            $this->lblCantCupo->Text = $intCantRegi;

            $this->lblUsuaCarg->Visible = true;
            $this->lblUsuaCarg->Text = $this->objUsuario->LogiUsua;

            $this->lblFechCarg->Visible = true;
            $this->lblFechCarg->Text = (string) new QDateTime(QDateTime::Now);
        }

        if ($blnHuboErro) {
            $this->mensaje($strMensErro,'','d','exclamation-triangle');

            $this->lblCantCupo->Visible = false;
            $this->lblUsuaCarg->Visible = false;
            $this->lblFechCarg->Visible = false;
        }
    }
    
    protected function verificarDatosMasivos($arrCampClie) {
        $blnTodoOkey = true;
        $strTextErro = '';
        $arrResuVali = array();

        //------------------------------------------------------------------------------------------------
        // Se verifica la existencia previa del cupón en la tabla, pero antes se valida de que sea entero
        //------------------------------------------------------------------------------------------------
        $intNumeCupo = $arrCampClie[0];

        if (!(is_int(intval($intNumeCupo)) && intval($intNumeCupo) > 0)) {
            $strTextErro = "El número del cupón debe ser un Entero mayor a cero(0)";
            $blnTodoOkey = false;
        } else {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Cupon()->Numero,$intNumeCupo);
            $objGuiaMasi   = Cupon::QueryArray(QQ::AndCondition($objClauWher));
            if ($objGuiaMasi) {
                $strTextErro = "El Cupón N° $intNumeCupo ya existe en la base de datos";
                $blnTodoOkey = false;
            }
        }

        if ($blnTodoOkey) {
            //-----------------------------------------------------------------------------------
            // Se verifica que el formato correspondiente al porcentaje de descuento sea double.
            //-----------------------------------------------------------------------------------
            $dblPorcDesc = $arrCampClie[1];
            if (!(is_double(doubleval($dblPorcDesc)) && doubleval($dblPorcDesc) > 0)) {
                $strTextErro = "El porcentaje de descuento del Cupón N° $intNumeCupo debe ser un Numero mayor a 0.00";
                $blnTodoOkey = false;
            }
        }

        if ($blnTodoOkey) {
            $strSucuCupo = $arrCampClie[2];
            if (strlen($strSucuCupo) == 0) {
                $strTextErro = "La Receptoría del Cupón es Requerida";
                $blnTodoOkey = false;
            }
        }

        if ($blnTodoOkey) {
            $strTipoCupo = $arrCampClie[3];
            if (strlen($strTipoCupo) == 0) {
                $strTextErro = "El Tipo de Cupón es Requerido (N: Normal | P: Promoción)";
                $blnTodoOkey = false;
            }
        }

        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['TextErro'] = $strTextErro;

        return $arrResuVali;
    }
}

CargarCupon::Run('CargarCupon');