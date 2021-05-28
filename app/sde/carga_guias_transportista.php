<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : carga_guias_transportista.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 21/11/2017
// Descripcion    : Este programa es el encargado de cargar guías masivamente a un cliente corporativo, a través de
//                  un archivo plano.
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargaGuiasTransportista extends FormularioBaseKaizen {
    /* @var $objTranCarg Transportista */
    protected $objTranCarg;
    /* @var $objUsuario Usuario */
    protected $objUsuario;
    protected $objProcEjec;

    protected $strMensProc;

    protected $lstTranCarg;
    protected $txtCargArch;

    protected $btnImpoInfo;
    protected $btnErroProc;


    protected function Form_Create() {
        parent::Form_Create();

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->lblTituForm->Text = 'Carga Guias Transportista';

        $this->objUsuario  = unserialize($_SESSION['User']);

        $this->lstTranCarg_Create();
        $this->txtCargArch_Create();

        $this->btnImpoInfo_Create();
        $this->btnErroProc_Create();

        $this->btnSave->Text = TextoIcono('cogs fa-lg','Procesar');
        $this->btnSave->PrimaryButton = false;
        $this->btnSave->CausesValidation = false;
        $this->btnSave->Visible = false;

        $this->mensaje();
    }

    //-------------------------
    // Creación de objetos ...
    //-------------------------

    protected function lstTranCarg_Create() {
        $this->lstTranCarg = new QListBox($this);
        $this->lstTranCarg->Required = true;
        $this->lstTranCarg->Width = 180;
        $this->lstTranCarg->Name = QApplication::Translate('Transportista a Cargar');
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Transportista()->Nombre);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Transportista()->Activo,SinoType::SI);
        $objClauWher[] = QQ::Equal(QQN::Transportista()->SecuenciaPropia,SinoType::SI);
        $arrTranCarg   = Transportista::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantTran   = count($arrTranCarg);
        $blnSeleRegi   = $intCantTran == 1 ? true : false;
        $this->lstTranCarg->AddItem('- Seleccione Uno - ('.$intCantTran.')',null);
        foreach ($arrTranCarg as $objTranCarg) {
            $this->lstTranCarg->AddItem($objTranCarg->__toString(), $objTranCarg->Id, $blnSeleRegi);
        }
    }

    protected function txtCargArch_Create() {
        $this->txtCargArch = new QFileControl($this);
        $this->txtCargArch->Required = true;
        $this->txtCargArch->Width = 300;
        $this->txtCargArch->Name = QApplication::Translate('Archivo a Cargar');
    }

    
    protected function btnImpoInfo_Create() {
        $this->btnImpoInfo = new QButton($this);
        $this->btnImpoInfo->Text = TextoIcono('upload', 'Importar', 'F', 'lg');
        $this->btnImpoInfo->AddAction(new QClickEvent(), new QServerAction('btnImpoInfo_Click'));
        $this->btnImpoInfo->HtmlEntities = false;
        $this->btnImpoInfo->CssClass = 'btn btn-primary btn-sm';
        $this->btnImpoInfo->CausesValidation = true;
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
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/guia_transportista_list.php");
    }

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = __SIST__."/guia_transportista_list.php";
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function btnImpoInfo_Click() {
        $strNombArch = $this->txtCargArch->FileName;
        $arrNombArch = explode('.',$strNombArch);
        $strExteArch = $arrNombArch[1];
        $arrExteVali = ['xls','xlsx'];
        if (in_array($strExteArch,$arrExteVali)) {
            $file = basename(tempnam(getcwd(),'tmp'));
            $file = $file.'.'.$strExteArch;
            $filedest = '/tmp/'.$file;
            copy($_FILES['c8']['tmp_name'],$filedest);
            $this->CargarGuiaTran($filedest,$strExteArch);
        } else {
            $strExteVali = implode(',',$arrExteVali);
            $strMensUsua = 'Archivo no corresponde tiene la extensión válida <b>'.$strExteVali.'</b>';
            $this->danger($strMensUsua);
        }
    }

    //-----------------------------
    // Otras acciones del programa
    //-----------------------------

    protected function CargarGuiaTran($strNombArch,$strExteArch) {
        t('');
        t('======================');
        t('Rutina: CargarGuiaTran');
        $this->objTranCarg = Transportista::Load($this->lstTranCarg->SelectedValue);
        $intIdxxTran = $this->objTranCarg->Id;
        $this->strMensProc = '';
        $blnTodoOkey = true;
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Carga Guia-Transportista: '.$this->objTranCarg->Nombre;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //----------------------------
        // Se inician los contadores
        //----------------------------
        $intCantRegi = 0;
        $intCantErro = 0;
        try {
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
            $intNumeLine = 1;
            foreach ($xls->rows() as $arrCampClie) {
                if ( (count($arrCampClie) > 0) && ($intNumeLine > 1) ) {
                    //----------------------------------------------------------
                    // Se verifica la existencia de los campos reglamentarios
                    //----------------------------------------------------------
                    $intCantCamp = count($arrCampClie);
                    if ($intCantCamp < 2) {
                        $strMensErro = "La linea $intNumeLine no tiene los 2 campos requeridos";
                        t($strMensErro);
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = $strNombArch;
                        $arrParaErro['MensErro'] = $strMensErro;
                        $arrParaErro['ComeErro'] = 'Cargando Guia-Transportista ('.$this->objTranCarg->NombClie.')';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $intNumeLine++;
                        continue;
                    }
                    //-----------------------------------------------------------------------
                    // Si to-do sale bien, se procede a verificar los datos de cada registro
                    //-----------------------------------------------------------------------
                    $arrResuVali = $this->verificarDatosMasivos($arrCampClie,$intNumeLine);
                    t('Datos verificados');
                    $blnTodoOkey = $arrResuVali['TodoOkey'];
                    $strTextErro = $arrResuVali['TextErro'];
                    $arrContVali = $arrResuVali['ContVali'];
                    if ($blnTodoOkey) {
                        $intIdxxPiez = $arrContVali['IdxxPiez'];
                        $strGuiaTran = $arrContVali['GuiaTran'];
                        //--------------------------------
                        // Se crea la guia-transportista
                        //--------------------------------
                        try {
                            $objGuiaTran = new GuiaTransportista();
                            $objGuiaTran->TransportistaId = $intIdxxTran;
                            $objGuiaTran->GuiaPiezaId     = $intIdxxPiez;
                            $objGuiaTran->Guia            = $strGuiaTran;
                            $objGuiaTran->ProcesoId       = $this->objProcEjec->Id;
                            $objGuiaTran->Save();
                            $intCantRegi++;
                        } catch (Exception $e) {
                            $strMensErro = 'Error creando guia-transportista: '.$e->getMessage();
                            t($strMensErro);
                            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                            $arrParaErro['NumeRefe'] = $strNombArch;
                            $arrParaErro['MensErro'] = $e->getMessage();
                            $arrParaErro['ComeErro'] = 'Error creando guia-transportista';
                            GrabarError($arrParaErro);
                            $intCantErro ++;
                        }
                    } else {
                        $strMensErro = 'Error de validacion: '.$strTextErro;
                        t($strMensErro);
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = $strNombArch;
                        $arrParaErro['MensErro'] = $strTextErro;
                        $arrParaErro['ComeErro'] = 'Error de validacion';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                    }
                }
                $intNumeLine++;
            }
        } catch (Exception $e) {
            t('Error cargando el archivo: '.$e->getMessage());
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $strNombArch;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falla cargando Guia-Transportista ('.$this->objTranCarg->Nombre.')';
            GrabarError($arrParaErro);
            $intCantErro ++;
        }
        //-------------------------------------
        // Se levantan los errores en pantalla
        //-------------------------------------
        error_reporting($mixErroOrig);
        if ($intCantErro > 0) {
            $strTextMens = "Procesados: $intCantRegi | Errores: $intCantErro";
            $this->danger($strTextMens);
            $this->btnErroProc->Visible = true;
        } else {
            $strTextMens = "Procesados: $intCantRegi";
            $this->success($strTextMens);
        }
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = $intCantErro > 0 ? true : false;
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

    }

    protected function verificarDatosMasivos($arrCampClie,$intNumeLine) {
        t('Verificando datos de la linea: '.$intNumeLine);
        $arrContVali = [];
        $blnTodoOkey = true;
        $strTextErro = '';
        $arrResuVali = array();

        $strGuiaTran = $arrCampClie[0];
        if (strlen($strGuiaTran) > 0) {
            $arrContVali['GuiaTran'] = $strGuiaTran;
        } else {
            $strTextErro = "Linea $intNumeLine | Col 1 | Guia del Transportista vacía";
            $blnTodoOkey = false;
        }

        if ($blnTodoOkey) {
            $strIdxxPiez = transformar($arrCampClie[1]);
            $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strIdxxPiez);
            if ($objGuiaPiez) {
                $arrContVali['IdxxPiez'] = $objGuiaPiez->Id;
                //-----------------------------------------------------------
                // Se elimina cualquier registro previo asociado a la Pieza
                //-----------------------------------------------------------
                $objGuiaTran = GuiaTransportista::LoadByGuiaPiezaId($arrContVali['IdxxPiez']);
                $objGuiaTran->Delete();
            } else {
                $strTextErro = "Linea $intNumeLine | Col 2 | La Pieza # $strIdxxPiez, no existe";
                $blnTodoOkey = false;
            }
        }
        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['TextErro'] = $strTextErro;
        $arrResuVali['ContVali'] = $arrContVali;
        //t('Termine la verificacion.  Errores: '.$strTextErro);
        return $arrResuVali;
    }


}

CargaGuiasTransportista::Run('CargaGuiasTransportista');
