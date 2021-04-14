<?php
//--------------------------------------------------------------------------------------
// Programa      : cargar_archivo_sodexo.php
// Realizado por : Juan Duran
// Fecha Elab.   : 09/03/2017
// Descripcion   : Este programa toma el archivo plano proporcionado por Sodex Pass 
//                 y genera guías Liberty a partir de dicha informacion.
//--------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargarArchivoSodexo extends FormularioBaseKaizen {
    protected $objTarifa;
    protected $objCliente;
    protected $objOperFict;
    protected $objProducto;

    protected $decPorcIvax;
    protected $decPorcSegu;
    protected $dteFechDhoy;
    protected $intOperGuia;
    protected $arrDestLibe;

    protected $txtArchivo;
    protected $btnCreaGuia;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Archivo Sodexo');

        $this->txtArchivo_Create();
        $this->btnCreaGuia_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtArchivo_Create() {
        $this->txtArchivo = new QFileControl($this);
        $this->txtArchivo->Name = QApplication::Translate('Archivo a Cargar');
        $this->txtArchivo->Width = 300;
        $this->txtArchivo->Required = true;
        $this->txtArchivo->AddAction(new QClickEvent(), new QAjaxAction('txtArchivo_Click'));
    }

    protected function btnCreaGuia_Create() {
        $this->btnCreaGuia = new QButton($this);
        $this->btnCreaGuia->Text = QApplication::Translate('Crear Guías');
        $this->btnCreaGuia->AddAction(new QClickEvent(), new QServerAction('btnCreaGuia_Click'));
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    /*protected function activarProcesamiento() {
        //---------------------------------------------------------------------------------
        // El botón estará visible solo cuando hayan guías Sodexo pendientes por procesar
        //---------------------------------------------------------------------------------
        $intPendProc = SodexoInput::CountByPendientePorProcesar();
        $this->btnCreaGuia->Visible = $intPendProc;
        if ($intPendProc) {
            $this->lblMensUsua->Text = 'Existe(n) '.$intPendProc.' guia(s) Pendientes x Procesar';
            $this->lblMensUsua->ForeColor = 'yellow';
        }
    }*/

    protected function CargarArchivo($strNombArch) {
        $mixArchSode = fopen($strNombArch,'r');
        //--------------------------------------------------------------------------
        // Los errores del proceso (en el caso de haberlos), quedaran registrados
        // en un archivo plano que sera mostrado al Usuario al terminar el proceso
        //--------------------------------------------------------------------------
        $strNombArch = $this->txtArchivo->FileName;
        $strPartNomb = explode('.',$strNombArch);
        $strArchErro = __SDE_DIRECTORY__.'/error_sodexo_input_'.$strPartNomb[0].'.csv';
        $mixManeArch = fopen($strArchErro,'w');
        $arrLineArch = array("Linea","Tipo de Error","Contenido de la linea");
        $strCadeAudi = implode(';',$arrLineArch);
        fputs($mixManeArch,$strCadeAudi.";\n");
        //----------------------------------
        // Se lee el archivo línea a línea
        //----------------------------------
        $blnHuboErro = false;
        $intCantRegi = 0;
        while (!feof($mixArchSode)) {
            $blnTodoOkey = true;
            $strLineArch = fgets($mixArchSode);
            if (strlen(trim($strLineArch)) > 0) {
                $arrCampSode = explode('|', $strLineArch);
                //-----------------------------------------------------------
                // Se verifica la existencia de los 8 campos Reglamentarios
                //-----------------------------------------------------------
                $intCantCamp = count($arrCampSode);
                if ($intCantCamp != 8 && $intCantCamp != 10) {
                    $arrLineArch = array($intCantRegi+1,"No tiene los 8 o 10 campos reglamentarios",$strLineArch);
                    $strCadeAudi = implode(';',$arrLineArch);
                    fputs($mixManeArch,$strCadeAudi.";\n");
                    $blnTodoOkey = false;
                    $blnHuboErro = true;
                } 
                if ($blnTodoOkey) {
                    //-----------------------------------------------------------------
                    // Se verifica la existencia previa de la Guía Sodexo en la Tabla
                    //-----------------------------------------------------------------
                    $strGuiaSode = $arrCampSode[2];
                    $objSodexo = SodexoInput::LoadByGuiaSodexo($strGuiaSode);
                    if ($objSodexo) {
                        $arrLineArch = array($intCantRegi+1,"Guia Sodexo Repetida",$strLineArch);
                        $strCadeAudi = implode(';',$arrLineArch);
                        fputs($mixManeArch,$strCadeAudi.";\n");
                        $blnTodoOkey = false;
                        $blnHuboErro = true;
                    }
                }
                if ($blnTodoOkey) {
                    if ($intCantCamp == 8) {
                        $strNombCiud = 'CARACAS';
                        $strNombEsta = 'DISTRITO CAPITAL';
                        $strZonaFisc = $arrCampSode[6];
                        $strTipoClie = $arrCampSode[7];
                    } else {
                        $strNombCiud = $arrCampSode[6];
                        $strNombEsta = $arrCampSode[7];
                        $strZonaFisc = $arrCampSode[8];
                        $strTipoClie = $arrCampSode[9];
                    }
                    //------------------------------------------------------------------
                    // Se crea un registro en la tabla sodexo_input para cada registro
                    //------------------------------------------------------------------
                    $objSodexo = new SodexoInput();
                    $objSodexo->CodigoTurpial = $arrCampSode[0];
                    $objSodexo->RazonSocial = $arrCampSode[1];
                    $objSodexo->GuiaSodexo = $arrCampSode[2];
                    $objSodexo->CantidadEnvases = $arrCampSode[3];
                    $objSodexo->FechaDespacho = $arrCampSode[4];
                    $objSodexo->DireccionEntrega = $arrCampSode[5];
                    $objSodexo->Ciudad = $strNombCiud;
                    $objSodexo->Estado = $strNombEsta;
                    $objSodexo->ZonaFiscal = $strZonaFisc;
                    $objSodexo->TipoCliente = $strTipoClie;
                    $objSodexo->RegistradoPor = $this->objUsuario->LogiUsua;
                    $objSodexo->FechaRegistro = new QDateTime(QDateTime::Now);
                    $objSodexo->HoraRegistro = date('H:i');
                    $objSodexo->ArchivoInput = $this->txtArchivo->FileName;
                    $objSodexo->CierreCiclo = SinoTypeCT::NO;
                    $objSodexo->Save();
                    $intCantRegi++;
                }
            }
        }
        if ($intCantRegi > 0) {
            $this->lblMensUsua->Text = 'Cantidad de Registro Procesados: '.$intCantRegi;
            $this->activarProcesamiento();
        }
        if ($blnHuboErro) {
            QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strArchErro);
        }
    }

    protected function btnCreaGuia_Click() {
        $this->lblMensUsua->Text = '';
        //---------------------------------------------------------------------------------------
        // Los errores del proceso (en el caso de haberlos), quedaran registrados en un archivo
        // archivo plano que sera mostrado al Usuario al terminar el proceso 
        //---------------------------------------------------------------------------------------
        $strArchErro = __SDE_DIRECTORY__.'/error_creando_guias_sodexo.csv';
        $mixManeArch = fopen($strArchErro,'w');
        $arrLineArch = array("Guia Sodexo","Error");
        $strCadeAudi = implode(';',$arrLineArch);
        fputs($mixManeArch,$strCadeAudi.";\n");
        //-----------------------------------------
        // Se identifican valores de trabajo
        //-----------------------------------------
        $arrOperFict       = SdeOperacion::LoadArrayByCodiRuta('R9999',QQ::Clause(QQ::LimitInfo(1)));
        $this->objOperFict = $arrOperFict[0];
        $this->dteFechDhoy = FechaDeHoy();
        $this->decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA',$this->dteFechDhoy);
        $this->decPorcSegu = FacImpuesto::LoadImpuestoVigente('SGRO',$this->dteFechDhoy);
        $this->objCliente  = MasterCliente::LoadByCodigoInterno('CR830');
        $objCkptSode       = SdeCheckpoint::Load('PX');
        $this->objProducto = FacProducto::LoadBySiglProd('DOC');
        $this->objTarifa   = $this->objCliente->Tarifa;
        if (strlen($this->objCliente->RutaRecolecta) > 0) {
            $this->intOperGuia = $this->objCliente->RutaRecolecta;
        } else {
            $this->intOperGuia = $this->objOperFict->CodiOper;
        }
        //------------------------------------------
        // Vector de Destinos y Estados de Liberty
        //------------------------------------------
        $strCadeSqlx = "select * 
                        from estados_liberty ";
        $objDatabase = Estacion::GetDatabase();
        $objDbResult = $objDatabase->Query($strCadeSqlx);
        $this->arrDestLibe = array();
        while ($mixRegistro = $objDbResult->FetchArray()) {
            $this->arrDestLibe[$mixRegistro['estado']] = $mixRegistro['sucursal'];
        }      
        //-------------------------------------------------------------
        // Se identifican las guias Sodexo, pendientes por procesar
        //-------------------------------------------------------------
        $intCantGuia   = 0;
        $blnHuboErro   = false;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNull(QQN::SodexoInput()->GuiaId);
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::SodexoInput()->Estado);
        $arrSodePend   = SodexoInput::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantPend   = count($arrSodePend);
        if ($intCantPend > 0) {
            foreach ($arrSodePend as $objGuiaSode) {
                $blnTodoOkey = true;
                if (!array_key_exists($objGuiaSode->Estado, $this->arrDestLibe)) {
                   $arrLineArch = array($objGuiaSode->GuiaSodexo,"EL DESTINO: ".$objGuiaSode->Estado.", NO ESTA CODIFICADO");
                   $strCadeAudi = implode(';',$arrLineArch);
                   fputs($mixManeArch,$strCadeAudi.";\n");
                   $blnTodoOkey = false;
                   $blnHuboErro = true;
                }
                if ($blnTodoOkey) {
                    //------------------------------------------------------------
                    // Se valida la existencia previa de la Guia Sodexo en la BD 
                    //------------------------------------------------------------
                    $objClauCoun   = QQ::Clause();
                    $objClauCoun[] = QQ::Equal(QQN::Guia()->GuiaExterna,$objGuiaSode->GuiaSodexo); 
                    $intGuiaRepe   = Guia::QueryCount(QQ::AndCondition($objClauCoun));
                    if ($intGuiaRepe == 0) { 
                        //------------------------------------------------------------
                        // Se crea una Guia Liberty correspondiente a la Guia Sodexo
                        //------------------------------------------------------------
                        $objGuia = $this->crearGuiaSodexo($objGuiaSode);
                        $objGuia = $this->calcularTarifaNacional($objGuia);
                        $objGuia->Save();
                        //---------------------------------------------
                        // Se actualizan los campos de la Guia Sodexo 
                        //---------------------------------------------
                        $objGuiaSode->GuiaId = $objGuia->NumeGuia;
                        $objGuiaSode->ProcesadoPor = $this->objUsuario->LogiUsua;
                        $objGuiaSode->FechaProceso = new QDateTime(QDateTime::Now);
                        $objGuiaSode->HoraProceso = date('h:i');
                        $objGuiaSode->FechCkpt = new QDateTime(QDateTime::Now);
                        $objGuiaSode->Save();
                        //----------------------------------------------------------------
                        // Se crea un checkpoint (Pendiente Sodexo) "PX" para cada Guia 
                        //----------------------------------------------------------------
                        $arrDatoCkpt = array();
                        $arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                        $arrDatoCkpt['CodiCkpt'] = $objCkptSode->CodiCkpt;
                        $arrDatoCkpt['TextObse'] = $objCkptSode->DescCkpt;
                        $arrDatoCkpt['CodiRuta'] = '';
                        $arrResuGrab = GrabarCheckpoint($arrDatoCkpt);
                        if (!$arrResuGrab['TodoOkey']) {
                            $arrLineArch = array($objGuiaSode->GuiaSodexo,$arrResuGrab['MotiNook']);
                            $strCadeAudi = implode(';',$arrLineArch);
                            fputs($mixManeArch,$strCadeAudi.";\n");
                            $blnHuboErro = true;
                        } else {
                            $intCantGuia++;
                        }
                    }
                }
            }
            $this->lblMensUsua->Text = 'Cantidad de Guias Creadas: '.$intCantGuia;
            $this->activarProcesamiento();
            if ($blnHuboErro) {
                QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strArchErro);
            }
        }
    }

    protected function crearGuiaSodexo($objGuiaSode) {
        $objGuia = new Guia();
        $objGuia->NumeGuia = proxNroDeGuia();
        $objGuia->CodiClie = $this->objCliente->CodiClie;
        $objGuia->FechGuia = new QDateTime(QDateTime::Now);
        $objGuia->EstaOrig = "CCS";
        $objGuia->EstaDest = $this->arrDestLibe[$objGuiaSode->Estado];
        $objGuia->PesoGuia = 0.4;
        $objGuia->NombRemi = $this->objCliente->NombClie;
        $objGuia->DireRemi = $this->objCliente->DireFisc;
        $objGuia->TeleRemi = $this->objCliente->TeleCona;
        $objGuia->NombDest = $objGuiaSode->RazonSocial;
        $objGuia->DireDest = $objGuiaSode->DireccionEntrega;
        $objGuia->TeleDest = 'N/A';
        $objGuia->CantPiez = $objGuiaSode->CantidadEnvases;
        $objGuia->DescCont = 'SOBRE';
        $objGuia->CodiProd = 14; 
        $objGuia->TipoGuia = 2;
        $objGuia->ValorDeclarado = 0;
        $objGuia->PorcentajeIva = $this->decPorcIvax;
        $objGuia->MontoIva = 0;
        $objGuia->Asegurado = 0;
        $objGuia->PorcentajeSeguro = $this->decPorcSegu;
        $objGuia->MontoSeguro = 0;
        $objGuia->MontoBase = 0;
        $objGuia->MontoFranqueo = 0;
        $objGuia->MontoTotal = 0;
        $objGuia->CantAyudantes = 0;
        $objGuia->ParadasAdicionales = 0;
        $objGuia->CourierId = 1;
        $objGuia->GuiaExterna = $objGuiaSode->GuiaSodexo;
        $objGuia->FleteDirecto = 0;
        $objGuia->TieneGuiaRetorno = 0;
        $objGuia->GuiaRetorno = null;
        $objGuia->Observacion = '';
        $objGuia->OperacionId = $this->intOperGuia;
        $objGuia->PorcentajeSgroInt = 0;
        $objGuia->MontoSgroInt = 0;
        $objGuia->UsuarioCreacion = $this->objUsuario->LogiUsua;
        $objGuia->FechaCreacion = new QDateTime(QDateTime::Now);
        $objGuia->HoraCreacion = date('H:i');
        $objGuia->CobroCod = CobroCod::Load($objGuia->NumeGuia);
        $objGuia->VendedorId = $this->objCliente->VendedorId;
        $objGuia->Alto = '';
        $objGuia->Ancho = '';
        $objGuia->Largo = '';
        $objGuia->RecolectaId = '';
        $objGuia->TipoDocumentoId = 'J';
        $objGuia->CedulaRif = '';
        $objGuia->CierreCaja = '';
        $objGuia->CajaId = '';
        $objGuia->MontoTotalInt = 0;
        $objGuia->PesoVolumetrico = '';
        $objGuia->PesoLibras = '';
        $objGuia->HojaEntrega = '';
        $objGuia->MontoOtros = 0;
        $objGuia->EntregadoA = '';
        $objGuia->FechaEntrega = null;
        $objGuia->HoraEntrega = '';
        $objGuia->CodiCkpt = '';
        $objGuia->EstaCkpt = '';
        $objGuia->FechCkpt = null;
        $objGuia->HoraCkpt = '';
        $objGuia->ObseCkpt = '';
        $objGuia->UsuaCkpt = '';
        $objGuia->FechaPod = null;
        $objGuia->HoraPod = '';
        $objGuia->UsuarioPod = '';
        $objGuia->TransFac = 0;
        $objGuia->SistemaId = 'sde';
        $objGuia->Anulada = 0;
        //$objGuia->Documento = null;
        return $objGuia;
    }

    protected function calcularTarifaNacional($objGuia) {
        //-----------------------------------------------
        // Se procede ahora al calculo de la Tarifa
        //-----------------------------------------------
        $arrParaTari['dttFechGuia'] = $objGuia->FechGuia->__toString("YYYY-MM-DD");
        $arrParaTari['intCodiTari'] = $this->objTarifa->Id;
        $arrParaTari['intCodiProd'] = $this->objProducto->CodiProd;
        $arrParaTari['strCodiOrig'] = $objGuia->EstaOrig;
        $arrParaTari['strCodiDest'] = $objGuia->EstaDest;
        $arrParaTari['dblPesoGuia'] = $objGuia->PesoGuia;
        $arrParaTari['dblValoDecl'] = $objGuia->ValorDeclarado;
        $arrParaTari['intChecAseg'] = 0;
        $arrParaTari['dblPorcSgro'] = $this->decPorcSegu;
        $arrParaTari['dblPorcDiva'] = $this->decPorcIvax;
        $arrParaTari['decSgroClie'] = $this->objCliente->PorcentajeSeguro;

        $arrValoTari = calcularTarifaParcialNew($arrParaTari);

        $objGuia->MontoBase = $arrValoTari['dblMontBase'];
        $objGuia->MontoFranqueo = $arrValoTari['dblFranPost'];
        $objGuia->MontoIva = $arrValoTari['dblMontDiva'];
        $objGuia->MontoSeguro = $arrValoTari['dblMontSgro'];
        $objGuia->MontoTotal = $arrValoTari['dblMontTota'];
        $objGuia->MontoOtros = $arrValoTari['dblMontOtro'];
        return $objGuia;
    }

    protected function btnSave_Click() {
        $strNombArch = $this->txtArchivo->FileName;
        $strPartNomb = explode('.',$strNombArch);
        if ($strPartNomb[1] == 'txt') {
            $file = basename(tempnam(getcwd(),'tmp'));
            $filetxt = 'tmp/'.$file.'.txt';
            $file = $file.'.txt';
            $filedest = 'tmp/'.$file;
            copy($_FILES['c4']['tmp_name'],$filedest);
            $this->CargarArchivo($filedest);
        } else {
            $this->lblMensUsua->Text = QApplication::Translate('Archivo no corresponde a un TXT');
            $this->lblMensUsua->ForeColor = 'yellow';
        }
    }
}

CargarArchivoSodexo::Run('CargarArchivoSodexo');
?>