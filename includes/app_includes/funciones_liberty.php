<?php
//---------------------------------------------------------------------------------
// Programa    : funciones_liberty.php
// Fecha Elab. : 17/04/2007
// Descripcion : Aqui se registran funciones de uso general en cualquier sistema
//---------------------------------------------------------------------------------
include('dateclass.php');
require_once('mimemail.inc.php');


function completar($strNumePiez) {
    return str_pad($strNumePiez, 3, '0', STR_PAD_LEFT);
}

function flotar($strNumeDeci) {
    return str_replace(',','.',$strNumeDeci);
}

/**
 * Esta rutina se utiliza para habilitar objetos en los formularios
 * @param $objControl
 * @return mixed
 */
function enableControl($objControl) {
    if (!is_null($objControl)) {
        $objControl->Enabled = true;
        $objControl->ForeColor = null;
        return $objControl;
    }
}

/**
 * Esta rutina se utiliza para des-habilitar objetos en los formularios
 * @param $objControl
 * @return mixed
 */
function disableControl($objControl) {
    if (!is_null($objControl)) {
        $objControl->Enabled = false;
        $objControl->ForeColor = 'blue';
        return $objControl;
    }
}

function str2num($str)
{
    if (strpos($str, '.') !== FALSE
        && strpos($str,    ',') !== FALSE
        && strpos($str, '.') < strpos($str,','))
    {
        $str = str_replace('.','',$str);
        $str = strtr($str,',','.');
    }
    else
    {
        $str = str_replace(',','.',$str);
    }
    return (float)$str;
}

function GrabarPODEnLaGuia($arrDatoPodx) {
    /**
     * @var $objGuiaPodx Guias
     * @var $objGuiaPodn GuiaPod
     * @var $objChecPodx Checkpoints
     * @var $objUsuaPodx Usuario
     */
    t('P1');
    $objGuiaPodx = $arrDatoPodx['objGuiaPodx'];
    $objChecPodx = $arrDatoPodx['objChecPodx'];
    $calFechPodx = $arrDatoPodx['calFechPodx'];
    $txtHoraPodx = $arrDatoPodx['txtHoraPodx'];
    $objUsuaPodx = $arrDatoPodx['objUsuaPodx'];
    $txtUsuaPodx = $arrDatoPodx['txtUsuaPodx'];
    $txtEntrAqui = $arrDatoPodx['txtEntrAqui'];
    $calFechEntr = $arrDatoPodx['calFechEntr'];
    $txtFechEntr = $arrDatoPodx['txtFechEntr'];
    $txtHoraEntr = $arrDatoPodx['txtHoraEntr'];
    $strMensUsua = '';
    $arrResuPodx = array();
    $arrResuPodx['blnTodoOkey'] = true;
    //------------------------------------------
    // Se verifica que la guia no tenga un OK
    //------------------------------------------
    t($objGuiaPodx->Id);
    if (!is_null($objGuiaPodx->GuiaPod)) {
        t('P2');
        $arrResuPodx['blnTodoOkey'] = false;
        $arrResuPodx['strMensUsua'] = 'La Guia ya tiene POD';
    }
    t('P3');
    if ($arrResuPodx['blnTodoOkey']) {
        //-----------------------------
        // Se graba el checkpoint
        //-----------------------------
        $strDescChec  = $objChecPodx->DescripcionRastreo." A ".$txtEntrAqui." EL ";
        $strDescChec .= $txtFechEntr." ".$txtHoraEntr;
        t('P4: '.$strDescChec);

        //$arrDatoCkpt  = array();
        //$arrDatoCkpt['NumePiez'] = $objGuiaPodx->NumeGuia;
        //$arrDatoCkpt['GuiaAnul'] = SinoType::NO;
        //$arrDatoCkpt['UltiCkpt'] = '';
        //$arrDatoCkpt['CodiCkpt'] = $objChecPodx->CodiCkpt;
        //$arrDatoCkpt['TextCkpt'] = $strDescChec;
        //$arrDatoCkpt['ObjeUsua'] = $objUsuaPodx;
        //$arrDatoCkpt['CodiRuta'] = '';
        //$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);

        $arrResuGrab['TodoOkey'] = true;
        if ($arrResuGrab['TodoOkey']) {
            t('P5');
            //--------------------------------------------------------
            // Se actualizan los campos relativos al POD
            //--------------------------------------------------------
            $objGuiaPodn = new GuiaPod();
            $objGuiaPodn->GuiaId       = $objGuiaPodx->Id;
            $objGuiaPodn->EntregadoA   = $txtEntrAqui;
            $objGuiaPodn->FechaEntrega = new QDateTime($txtFechEntr);
            $objGuiaPodn->HoraEntrega  = $txtHoraEntr;
            $objGuiaPodn->CreatedBy    = $objUsuaPodx->CodiUsua;
            $objGuiaPodn->Save();
            $arrResuPodx['strMensUsua'] = '(OK)';
            t('P6');
            //-------------------------------
            // Se asocia la guia con el pod
            //-------------------------------
            $objGuiaPodx->GuiaPodId = $objGuiaPodn->Id;
            $objGuiaPodx->Save();
            //-------------------------------------
            // Se deja registro de la Transaccion
            //-------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Guias';
            $arrLogxCamb['intRefeRegi'] = $objGuiaPodx->Id;
            $arrLogxCamb['strNombRegi'] = $objGuiaPodx->NombreRemitente;
            $arrLogxCamb['strDescCamb'] = 'Registro de POD';
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/consulta_guia.php/'.$objGuiaPodx->Id;
            LogDeCambios($arrLogxCamb);
        } else {
            $arrResuPodx['strMensUsua'] = $arrResuGrab['MotiNook'];
            $arrResuPodx['blnTodoOkey'] = false;
        }
        t('P6');
    }
    return $arrResuPodx;
}

function GrabarCkptValija($arrDatoCkpt) {
    //------------------------------------------------------------
    // Esta rutina controla todo lo concerniente al ingresos de
    // informacion de la tabla de checkpoints de las Valijas
    //------------------------------------------------------------
    $arrResuGrab = array();
    $arrResuGrab['TodoOkey'] = true;
    $arrResuGrab['MotiNook'] = '';
    $objUsuario = unserialize($_SESSION['User']);

    $objContCkpt = new ValijaCkptCT();
    $objContCkpt->ValijaId = $arrDatoCkpt['NumeVali'];
    $objContCkpt->SucursalId = $objUsuario->CodiEsta;
    $objContCkpt->CheckpointId = $arrDatoCkpt['CodiCkpt'];
    $objContCkpt->Fecha = new QDateTime(QDateTime::Now);
    $objContCkpt->Hora = date('H:i:s');
    $objContCkpt->Observacion = strtoupper($arrDatoCkpt['TextObse']);
    $objContCkpt->UsuarioId = $objUsuario->CodiUsua;
    $objContCkpt->Save();

    return $arrResuGrab;
}

function CkptConfDeUnaGuia($strNumeGuia) {
    $strCkptConf = CkptsDeConfirmacion();
    $strCadeSqlx = "select *
                     from guia_ckpt
                    where nume_guia = '$strNumeGuia'
                      and codi_ckpt in $strCkptConf
                    order by fech_ckpt desc,
                             hora_ckpt desc
                    limit 1";
    $objDataBase = Guia::GetDatabase();
    $objDbResult = $objDataBase->Query($strCadeSqlx);
    $mixRegiResu = $objDbResult->FetchArray();
    if (isset($mixRegiResu['nume_guia'])) {
        return $mixRegiResu;
    } else {
        return null;
    }
}

function CkptsDeConfirmacion($strCodiSucu='', $strTipoReto='S') {
    $objClasula   = QQ::Clause();
    if (strlen($strCodiSucu) > 0) {
        $objClasula[] = QQ::Equal(QQN::CounterCT()->SucursalId, $strCodiSucu);
    }
    $objClasula[] = QQ::Equal(QQN::CounterCT()->EsRuta, SinoTypeCT::NO);
    $arrReceSucu  = CounterCT::QueryArray(QQ::AndCondition($objClasula));
    $intCantRece  = count($arrReceSucu);
    $strCkptConf  = "(";
    $arrCkptConf  = array();
    foreach ($arrReceSucu as $objReceptoria) {
        $strCkptConf .= "'".$objReceptoria->CkptConfirmacion."', ";
        $arrCkptConf[] = $objReceptoria->CkptConfirmacion;
    }
    $strCkptConf  = substr($strCkptConf,0,-2);
    $strCkptConf .= ")";

    if ($strTipoReto == 'S') {
        return $strCkptConf;
    } else {
        return $arrCkptConf;
    }
}

function generarCodigo() {
    //-------------------------------------------------------------------------
    // Para generar el Código se usa la función nativa de PHP "char()"
    // sobre el resultado otorgado por la función nativa de PHP "rand()",
    // en este caso la clave creada se forma con letras minúsculas y números.
    // ***Carácteres ASCII que podemos utilizar són:
    //    - desde el 48 hasta el 57 tenemos los números del 0 al 9.
    //    - del 65 al 90 las letras en mayúsculas.
    //    - del 97 al 122 las letras en minúsculas.
    //-------------------------------------------------------------------------
    $codigo = "";
    $longitud = 8;
    $mitad = $longitud / 2;
    for ($i=1; $i<=$longitud; $i++) {
        if (($i % 2) == 0) {
            $letra = chr(rand(97,122));
        } else {
            // $letra = chr(rand(65,90));
            $letra = chr(rand(48,57));
        }
        $codigo .= $letra;
    }
    return $codigo;
}

/**
 * Esta rutina crea un registro en la tabla "historia_cliente".
 * Recibe como parametro un vector que debe contener los siguienes elementos:
 * CodiClie = Codigo del Cliente
 * TextMens = Texto del Comentario
 * CodiUsua = Codigo del Usuario que esta generando el comentario
 * CodiEsta = Codigo o Siglas IATA de la Sucursal donde se genero el comentario
 * CodiCkpt = Codigo del Checkpoint que se esta grabando en el Historial del Cliente
 * AlerChec = 1/0 valor que determina si el comentario debe marcarse como "Alerta"
 *
 * @param array $arrParaRegi
 */
function crearHistoriaCliente($arrParaRegi) {
    $objHistClie = new HistoriaCliente();
    $objHistClie->ClienteId = $arrParaRegi['CodiClie'];
    $objHistClie->Comentario = strtoupper($arrParaRegi['TextMens']);
    $objHistClie->CodiUsua = $arrParaRegi['CodiUsua'];
    $objHistClie->SucursalId = $arrParaRegi['CodiEsta'];
    $objHistClie->Fecha = new QDateTime(QDateTime::Now);
    $objHistClie->Hora = date("H:i:s");
    $objHistClie->CodiCkpt = $arrParaRegi['CodiCkpt'];
    $objHistClie->AlertaCheck = $arrParaRegi['AlerChec'];
    $objHistClie->Save();
}

/**
 * Esta rutina calcula el monto base de la Tarifa paritiendo del Monto Total
 * de la Tasa del IVA y del Franqueo Postal.  Todos estos parametros entran
 * como elementos del vector $arrParaBase
 *
 * @param array $arrParaBase(MontTari,FactIvax,FranPost)
 * @return decimal (Monto Base de la Tarifa)
 */
function CalcularMontoBaseTarifa($arrParaBase) {
    $decMontTari = $arrParaBase['MontTari'];
    $decFactIvax = $arrParaBase['FactIvax'];
    $decFranPost = $arrParaBase['FranPost'];
    $decMontIvax = $decMontTari - ($decMontTari / $decFactIvax);
    $decMontBase = $decMontTari - $decFranPost - $decMontIvax;
    return $decMontBase;
}

/**
 * Esta rutina calcula el monto del iva que corresponde segun los valores
 * que entran como parametro.  Los parametro entrar como elementos de un
 * arreglo.
 *
 * @param array $arrParaIvax(MontTari,FactIvax,FranPost,PorcIvax)
 * @return decimal (Monto del Iva de la Tarifa)
 */
function CalcularIvaTarifa($arrParaIvax) {
    $arrParaBase = array();
    $arrParaBase['MontTari'] = $arrParaIvax['MontTari'];
    $arrParaBase['FactIvax'] = $arrParaIvax['FactIvax'];
    $arrParaBase['FranPost'] = $arrParaIvax['FranPost'];
    $decMontBase = CalcularMontoBaseTarifa($arrParaBase);
    // return nfp($decMontBase * $arrParaIvax['PorcIvax'] / 100);
    return $decMontBase * $arrParaIvax['PorcIvax'] / 100;
}

function ContarDiasFeriados($dteFechInic,$dteFechFina) {
    return Feriado::QueryCount(QQ::Between(QQN::Feriado()->Fecha,$dteFechInic,$dteFechFina));
}

function miTraza($strTextTraz) {
    $mixManeArch = fopen(__LOG_DIRECTORY__.'/mitraza.log','a');
    $arrLineAudi = array();
    $arrLineAudi[] = date('Y-m-d');
    $arrLineAudi[] = date('H:i:s');
    $arrLineAudi[] = $strTextTraz;

    $strCadeAudi = implode('|',$arrLineAudi);
    fputs($mixManeArch,$strCadeAudi."|\n");
}

function AuditoriaDeProcesos($strNombAcci) {
    $objUsuario = unserialize($_SESSION['User']);
    $mixManeArch = fopen(__LOG_DIRECTORY__.'/procesos.log','a');

    $objProceso = new Proceso();
    $objProceso->Usuario = $objUsuario->LogiUsua;
    $objProceso->Programa = basename($_SESSION['NombProg']);
    $objProceso->Fecha = new QDateTime(QDateTime::Now);
    $objProceso->Hora = date('H:i:s');
    $objProceso->Accion = $strNombAcci;
    $objProceso->Save();
}

function CrearRegistroDeTrabajo($arrParaRegi) {
    $objRegiTrab = new RegistroTrabajo();
    $objRegiTrab->GuiaId       = $arrParaRegi['NumeGuia'];
    $objRegiTrab->Comentario   = strtoupper($arrParaRegi['TextMens']);
    $objRegiTrab->UsuarioId    = $arrParaRegi['CodiUsua'];
    $objRegiTrab->Fecha        = new QDateTime(QDateTime::Now);
    $objRegiTrab->Hora         = date("H:i:s");
    $objRegiTrab->SucursalId   = $arrParaRegi['CodiEsta'];
    $objRegiTrab->CheckpointId = $arrParaRegi['CodiCkpt'];
    $objRegiTrab->Save();
}

function CrearProceso($strNombProc,$blnNotiAdmi=false,$blnNotiUsua=false) {
    $objUsuario = unserialize($_SESSION['User']);
    $objProceso = new ProcesoError();
    $objProceso->Nombre           = $strNombProc;
    $objProceso->Usuario          = $objUsuario->LogiUsua;
    $objProceso->Fecha            = new QDateTime(QDateTime::Now);
    $objProceso->HoraInicial      = new QDateTime(QDateTime::Now);
    $objProceso->NotificarAdmin   = $blnNotiAdmi;
    $objProceso->NotificarUsuario = $blnNotiUsua;
    $objProceso->Save();
    return $objProceso;
}

function GrabarError($arrParaErro) {
    $objProcErro = new DetalleError();
    $objProcErro->ProcesoId    = $arrParaErro['ProcIdxx'];
    $objProcErro->Referencia   = $arrParaErro['NumeRefe'];
    $objProcErro->MensajeError = $arrParaErro['MensErro'];
    $objProcErro->Comentario   = $arrParaErro['ComeErro'];
    $objProcErro->Save();
}

function CalcularPesosVolumetricos($arrDatoPeso) {
    //----------------------------------------------------
    // Se obtienen las medidas del vector de entrada
    //----------------------------------------------------
    $decAltoEnvi = $arrDatoPeso['decAltoEnvi'];
    $decAnchEnvi = $arrDatoPeso['decAnchEnvi'];
    $decLargEnvi = $arrDatoPeso['decLargEnvi'];
    //-------------------------------------------------------------------------
    // Se aplican las formulas para obtener los distintos pesos volumetricos
    //-------------------------------------------------------------------------
    $decPesoVolu = $decAltoEnvi * $decAnchEnvi * $decLargEnvi / 166;
    $decPesoVolu = round($decPesoVolu,3);
    $arrPesoVolu['decPesoVolu'] = $decPesoVolu;

    $decMariMetr = $decAltoEnvi * $decAnchEnvi * $decLargEnvi / 1728 / 35.3147;
    $decMariMetr = round($decMariMetr,3);
    $arrPesoVolu['decMariMetr'] = $decMariMetr;

    $decMariPies = $decAltoEnvi * $decAnchEnvi * $decLargEnvi / 1728;
    $decMariPies = round($decMariPies,3);
    $arrPesoVolu['decMariPies'] = $decMariPies;

    //-------------------------------------------------------------
    // Se devuelve un vector con los resultados de los calculos
    //-------------------------------------------------------------
    return $arrPesoVolu;
}

function DeterminarPesoDefinitivo($decPesoEnvi,$decPesoVolu) {
    //-------------------------------------------------------------
    // Se determina el peso con el cual se calculara la Tarifa
    //-------------------------------------------------------------
    if ($decPesoVolu >= $decPesoEnvi) {
        $decPesoDefi = $decPesoVolu;
    } else {
        $decPesoDefi = $decPesoEnvi;
    }
    return $decPesoDefi;
}

function DeterminarPesoDefinitivo_VE($decPesoEnvi,$decPesoVolu) {
    //-------------------------------------------------------------
    // Se determina el peso con el cual se calculara la Tarifa
    //-------------------------------------------------------------
    if ($decPesoVolu >= $decPesoEnvi) {
        $arrPesoDefi['decPesoDefi'] = $decPesoVolu;
        $arrPesoDefi['strPesoDefi'] = "VOL";
    } else {
        $arrPesoDefi['decPesoDefi'] = $decPesoEnvi;
        $arrPesoDefi['strPesoDefi'] = "LIB";
    }
    return $arrPesoDefi;
}

function QuitarAAs($strNumeGuia) {
    if (strlen($strNumeGuia) > 0) {
        $strPrimCara = $strNumeGuia[0];
        $strUltiCara = $strNumeGuia[strlen($strNumeGuia)-1];
        //      echo $strPrimCara."-".$strUltiCara."<br>\n";
        if ($strPrimCara == "A" && $strUltiCara == "A") {
            $strNumeGuia = ExtraerEntreDelimitadores($strNumeGuia,"A","A");
        }
    }
    return $strNumeGuia;
}

/**
 * Esta rutina, calcula la Tarifa Nacional de la guia en entra como parametro
 * Los parametro de entrada son:
 * $objGuia: Las guía cuya tarifa se desea calcular
 */
function CalcularTarifaNacionalDeLaGuia($objGuia) {
    /**
     * @var $objRegiTraz Parametro
     * @var $objUsuario Usuario
     */
    $objUsuario  = unserialize($_SESSION['User']);
    $strLogiUsua = $objUsuario->LogiUsua;
    $objRegiTraz = BuscarParametro('RegiTraz','CalcTari','TODO',null);
    $blnRegiTraz = false;
    if ($objRegiTraz) {
        if (trim($objRegiTraz->ParaTxt2) == trim($strLogiUsua)) {
            $blnRegiTraz = $objRegiTraz->ParaVal1;
        }
    }
    if ($blnRegiTraz) {
        $objRegiTraz->ParaTxt1  = 'Guia Nro: '.$objGuia->NumeGuia."<br>";
        $objRegiTraz->Save();
        t('Guia Nro: '.$objGuia->NumeGuia);
        $objRegiTraz->ParaTxt1 .= "<b>CalcularTarifaNacionalDeLaGuia</b><br>";
        $objRegiTraz->Save();
        t('*** CalcularTarifaNacionalDeLaGuia ***');
    }

    //------------------------------------------------------------------------
    // Se establecen los parametros necesarios para el calculo de la tarifa
    //------------------------------------------------------------------------
    $arrParaTari['dttFechGuia'] = $objGuia->FechGuia->__toString("YYYY-MM-DD");
    $arrParaTari['intCodiTari'] = $objGuia->TarifaId;
    $arrParaTari['intCodiProd'] = $objGuia->CodiProd;
    $arrParaTari['strCodiOrig'] = $objGuia->EstaOrig;
    $arrParaTari['strCodiDest'] = $objGuia->EstaDest;
    $arrParaTari['dblPesoGuia'] = $objGuia->PesoGuia;
    $arrParaTari['dblValoDecl'] = $objGuia->ValorDeclarado;
    $arrParaTari['intChecAseg'] = $objGuia->Asegurado;
    $arrParaTari['decSgroClie'] = $objGuia->CodiClieObject->PorcentajeSeguro;
    $arrParaTari['strModaPago'] = TipoGuiaType::ToStringCorto($objGuia->TipoGuia);

    $arrValoTari = calcularTarifaParcialNew($arrParaTari);

    if ($blnRegiTraz) {
        $objRegiTraz->ParaTxt1 .= "<b>Regrese de calcularTarifaParcialNew</b><br>";
        $objRegiTraz->Save();
        t('Regrese de calcularTarifaParcialNew');
    }

    $blnTodoOkey = $arrValoTari['blnTodoOkey'];
    $strMensUsua = $arrValoTari['strMensUsua'];

    if ($blnTodoOkey) {
        $objGuia->MontoBase        = $arrValoTari['dblMontBase'];
        $objGuia->MontoFranqueo    = $arrValoTari['dblFranPost'];
        $objGuia->PorcentajeSeguro = $arrValoTari['dblPorcSgro'];
        $objGuia->MontoSeguro      = $arrValoTari['dblMontSgro'];
        $objGuia->PorcentajeIva    = $arrValoTari['dblPorcDiva'];
        $objGuia->MontoIva         = $arrValoTari['dblMontDiva'];
        $objGuia->MontoTotal       = $arrValoTari['dblMontTota'];
        $objGuia->MontoOtros       = $arrValoTari['dblMontOtro'];
    }
    if ($blnRegiTraz) {
        $objRegiTraz->ParaTxt1 .= "Valores de retorno:<br>";
        $objRegiTraz->Save();
        t('Valores de retorno:');
        $strTextMens = "MB: ".$objGuia->MontoBase.
                       " FP: ".$objGuia->MontoFranqueo.
                       " %Sgro: ".$objGuia->PorcentajeSeguro.
                       " MSgro: ".$objGuia->MontoSeguro.
                       " %Iva: ".$objGuia->PorcentajeIva.
                       " MIva: ".$objGuia->MontoIva.
                       " Total: ".$objGuia->MontoTotal;
        $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
        $objRegiTraz->Save();
        t($strTextMens);
    }
    $arrCalcTari['blnTodoOkey'] = $blnTodoOkey;
    $arrCalcTari['objGuiaCalc'] = $objGuia;
    $arrCalcTari['strMensUsua'] = $strMensUsua;
    return $arrCalcTari;
}

/**
 * Esta rutina, calcula la Tarifa Nacional de la guia que entra como parametro, hecha en el Expreso Nacional.
 * Los parametro de entrada son:
 * $objGuia: Las guía cuya tarifa se desea calcular
 */
function CalcularTarifaPmnDeLaGuia(Guia $objGuia) {
    $objUsuario = unserialize($_SESSION['User']);
    //------------------------------------------------------------------------
    // Se establecen los parametros necesarios para el calculo de la tarifa
    //------------------------------------------------------------------------
    $arrParaTari['dttFechGuia'] = $objGuia->FechGuia->__toString("YYYY-MM-DD");
    $arrParaTari['strCodiOrig'] = $objGuia->EstaOrig;
    $arrParaTari['strCodiDest'] = $objGuia->EstaDest;
    $arrParaTari['dblPesoGuia'] = $objGuia->PesoGuia;
    $arrParaTari['dblValoDecl'] = $objGuia->ValorDeclarado;
    $arrParaTari['intChecAseg'] = $objGuia->Asegurado;
    $arrParaTari['dblPorcSgro'] = $objGuia->PorcentajeSeguro;
    $arrParaTari['strModaPago'] = TipoGuiaType::ToStringCorto($objGuia->TipoGuia);
    $arrParaTari['strEstaUsua'] = $objUsuario->CodiEsta;
    $arrParaTari['decSgroClie'] = $objGuia->CodiClieObject->PorcentajeSeguro;
    // t('La Tarifa de la Guia es: '.$objGuia->TarifaId);
    $arrParaTari['objTariGuia'] = FacTarifa::Load($objGuia->TarifaId);

    $arrValoTari = calcularTarifaParcialPmn($arrParaTari);

    $blnTodoOkey = $arrValoTari['blnTodoOkey'];
    $strMensUsua = $arrValoTari['strMensUsua'];

    if ($blnTodoOkey) {
        $objGuia->MontoBase        = $arrValoTari['dblMontBase'];
        $objGuia->MontoFranqueo    = $arrValoTari['dblFranPost'];
        $objGuia->PorcentajeIva    = $arrValoTari['dblPorcDiva'];
        $objGuia->MontoIva         = $arrValoTari['dblMontDiva'];
        $objGuia->MontoSeguro      = $arrValoTari['dblMontSgro'];
        $objGuia->MontoTotal       = $arrValoTari['dblMontTota'];
        $objGuia->MontoOtros       = $arrValoTari['dblMontOtro'];
    }
    $arrCalcTari['blnTodoOkey'] = $blnTodoOkey;
    $arrCalcTari['objGuiaCalc'] = $objGuia;
    $arrCalcTari['strMensUsua'] = $strMensUsua;
    return $arrCalcTari;
}

function calcularTarifaNacional($arrDatoTari) {
    $decPesoGuia = $arrDatoTari['PesoGuia'];
    $decValoDecl = $arrDatoTari['ValoDecl'];
    $strOrigGuia = $arrDatoTari['OrigGuia'];
    $strDestGuia = $arrDatoTari['DestGuia'];
    $strModaPago = $arrDatoTari['ModaPago'];
    $intCodiClie = $arrDatoTari['CodiClie'];
    $intEnviAseg = $arrDatoTari['EnviAseg'];
    $decPorcSegu = $arrDatoTari['PorcSegu'];
    $decPorcIvax = $arrDatoTari['PorcIvax'];
    $blnTodoOkey = true;
    $strMensUsua = '';
    //----------------------------------------------------------------------------
    // Inicialmente se verifica la existencia de todos los valores necesarios
    // para realizar el calculo de la Tarifa
    //----------------------------------------------------------------------------
    if (strlen($decPesoGuia) == 0 || strlen($decValoDecl) == 0 || is_null($strOrigGuia) || is_null($strDestGuia) || is_null($intCodiClie)) {
        $blnTodoOkey = false;
    }
    if ($blnTodoOkey) {
        $decMontBase = 0;
        $decFranPost = 0;
        $decMontSegu = 0;
        $decMontIvax = 0;
        $decMontTota = 0;
        $objProducto = DeterminarProducto($strOrigGuia, $strDestGuia);
        $objCliente = MasterCliente::Load($intCodiClie);
        $objTarifa = $objCliente->Tarifa;
        if ($objTarifa) {
            //-----------------------------------------------
            // Se procede ahora al calculo de la Tarifa
            //-----------------------------------------------
            $arrValoTari = calcularTarifaParcial($objTarifa->Id,$objProducto->CodiProd,$decPesoGuia,$decValoDecl,$intEnviAseg,$objTarifa->TopeValorDeclarado,$objTarifa->MontoMinimo,$decPorcSegu,$decPorcIvax,$objCliente->PorcentajeDsctoincr,0);
            //         $blnTodoOkey = $arrValoTari[0];
            //         $decMontBase = $arrValoTari[2];
            //         $decFranPost = $arrValoTari[3];
            //         $decMontSegu = $arrValoTari[5];
            //         $decMontIvax = $arrValoTari[4];
            //         $decMontTota = $arrValoTari[6];
        } else {
            $strMensUsua = QApplication::Translate('No se ha definido la Tarifa Nacional "Por Peso"');
            $arrValoTari = array(false,$strMensUsua);
        }
    } else {
        $strMensUsua = QApplication::Translate('Faltan datos para el Calculo de la Tarifa');
        $arrValoTari = array(false,$strMensUsua);
    }
    return $arrValoTari;
}

/**
 * Esta rutina borra de la base de datos la guia cuyo numero entra como parametro
 *
 * @param string $strNumeGuia
 * @return string
 */
function BorrarGuia($strNumeGuia) {
    // $strTextMens = '';
    $arrTracGuia = SreGuiaCkpt::LoadArrayByNumeGuia($strNumeGuia);
    //echo "BG1\n";
    if ($arrTracGuia) {
        foreach ($arrTracGuia as $objRegistro) {
            $objRegistro->Delete();
        }
    }
    //echo "BG2\n";
    $objRegistro = SreGuia::Load($strNumeGuia);
    if ($objRegistro) {
        $objRegistro->Delete();
    }
    //echo "BG3\n";
    $arrGuiaCkpt = GuiaCkpt::LoadArrayByNumeGuia($strNumeGuia);
    if ($arrGuiaCkpt) {
        foreach ($arrGuiaCkpt as $objRegistro) {
            $objRegistro->Delete();
        }
    }
    //echo "BG4\n";
    $objRegistro = CobroCod::LoadByNumeGuia($strNumeGuia);
    if ($objRegistro) {
        $objRegistro->Delete();
    }
    //echo "BG5\n";
    $arrRegiTrab = RegistroTrabajo::LoadArrayByGuiaId($strNumeGuia);
    if ($arrRegiTrab) {
        foreach ($arrRegiTrab as $objRegistro) {
            $objRegistro->Delete();
        }
    }
    //echo "BG6\n";
    $arrNotiGuia = Notificacion::LoadArrayByGuiaId($strNumeGuia);
    if ($arrNotiGuia) {
        foreach ($arrNotiGuia as $objRegistro) {
            $objRegistro->Delete();
        }
    }
    //echo "BG7\n";
    $objRegistro = GuiaAduana::LoadByGuiaId($strNumeGuia);
    if ($objRegistro) {
        $objRegistro->Delete();
    }
    //echo "BG8\n";
    $arrGuiaPiez = GuiaPieza::LoadArrayByGuiaId($strNumeGuia);
    if ($arrGuiaPiez) {
        foreach ($arrGuiaPiez as $objRegistro) {
            $objRegistro->Delete();
        }
    }
    //echo "BG9\n";
    $arrGuiaChec = GuiaCheckpoints::LoadByGuiaId($strNumeGuia);
    if ($arrGuiaPiez) {
        foreach ($arrGuiaPiez as $objRegistro) {
            $objRegistro->Delete();
        }
    }
    //echo "BG10\n";
    $objRegistro = Guia::Load($strNumeGuia);
    if ($objRegistro) {
        $objRegistro->UnassociateAllSdeContenedors();
        $objRegistro->Delete();
    }
    //echo "BG11\n";
}

function GrabarMedicion($strCodiSucu,$strTipoMedi,$intCantCifr) {
    $objEstadistica = Estadistica::Load($strCodiSucu,date('Y-m-d'),$strTipoMedi);
    if ($objEstadistica) {
        $objEstadistica->Cifra = $intCantCifr;
        $objEstadistica->Save();
    } else {
        $objEstadistica = new Estadistica();
        $objEstadistica->SucursalId = $strCodiSucu;
        $objEstadistica->Fecha = new QDateTime(QDateTime::Now);
        $objEstadistica->Medicion = $strTipoMedi;
        $objEstadistica->Cifra = $intCantCifr;
        $objEstadistica->Save();
    }
}

/**
 * Esta rutina busca clientes cuyo nombre coincida con el parametro de entrada
 * Esta busqueda se realiza tanto en la tabla master_cliente como en la tabla
 * de destinatario_frecuente
 *
 * @param string $strCritBusc (Criterio de Busqueda)
 * @return array (cada elemento contiene 3 sub-elementos: nombre, codigo y tabla de procedencia)
 */
function listadoDeClientes($strCritBusc) {
    $strCadeSqlx  = "select nomb_clie nombre, codi_clie codigo,'C' tabla ";
    $strCadeSqlx .= "  from master_cliente ";
    $strCadeSqlx .= " where nomb_clie like '%".$strCritBusc."%' ";
    $strCadeSqlx .= " union ";
    $strCadeSqlx .= "select nombre nombre, id codigo, 'D' tabla ";
    $strCadeSqlx .= "  from destinatario_frecuente ";
    $strCadeSqlx .= " where nombre like '%".$strCritBusc."%' ";
    $strCadeSqlx .= " order by 1 ";
    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $arrListClie = array();
    while ($mixRegiClie = $objDbResult->FetchArray()) {
        $arrListClie[] = array($mixRegiClie['nombre'],$mixRegiClie['codigo'],$mixRegiClie['tabla']);
    }
    return $arrListClie;
}

/**
 * Esta rutina devuelve un numero que se considera como el "Proximo Nro
 * de Guia" que esta disponible en el Sistema.
 *
 * @return int Numero de Guia
 */
function proxIdVendedor() {
    $objDatabase = VendedorConsecutivo::GetDatabase();
    $objConsecutivo = new VendedorConsecutivo();
    $objConsecutivo->Nada = 'X';
    $objConsecutivo->Save();
    $intProxNume = $objDatabase->InsertId('vendedor_consecutivo', 'id');
    foreach (VendedorConsecutivo::QueryArray(QQ::AndCondition(QQ::LessThan(QQN::VendedorConsecutivo()->Id,$intProxNume))) as $objConsRegi) {
        $objConsRegi->Delete();
    }
    return $intProxNume;
}

/**
 * Esta rutina devuelve un numero que se considera como el "Proximo Nro
 * de Guia" que esta disponible en el Sistema.
 *
 * @return int Numero de Guia
 */
function proxNroNotificacion() {
    $objDatabase = NotiConsecutivo::GetDatabase();
    $objConsecutivo = new NotiConsecutivo();
    $objConsecutivo->Nada = 'X';
    $objConsecutivo->Save();
    $intProxNume = $objDatabase->InsertId('noti_consecutivo', 'id');
    foreach (NotiConsecutivo::QueryArray(QQ::AndCondition(QQ::LessThan(QQN::NotiConsecutivo()->Id,$intProxNume))) as $objConsRegi) {
        $objConsRegi->Delete();
    }
    return $intProxNume;
}

/**
 * Esta rutina devuelve un numero que se considera como el "Proximo Nro
 * de Guia" que esta disponible en el Sistema.
 *
 * @return int Numero de Guia
 */
function proxNroRegiTrab() {
    $objDatabase = RegiTrabConsecutivo::GetDatabase();
    $objConsecutivo = new RegiTrabConsecutivo();
    $objConsecutivo->Nada = 'X';
    $objConsecutivo->Save();
    $intProxNume = $objDatabase->InsertId('regi_trab_consecutivo', 'id');
    foreach (RegiTrabConsecutivo::QueryArray(QQ::AndCondition(QQ::LessThan(QQN::RegiTrabConsecutivo()->Id,$intProxNume))) as $objConsRegi) {
        $objConsRegi->Delete();
    }
    return $intProxNume;
}

/**
 * Esta rutina devuelve un numero que se considera como el "Proximo Nro
 * de Guia" que esta disponible en el Sistema.
 *
 * @return int Numero de Guia
 */
function proxNroDeGuia() {
    $objDatabase = GuiaConsecutivo::GetDatabase();
    $objConsecutivo = new GuiaConsecutivo();
    $objConsecutivo->Nada = 'X';
    $objConsecutivo->Save();
    $intProxNume = $objDatabase->InsertId('guia_consecutivo', 'id');
    return $intProxNume;
}

/**
 * Esta rutina devuelve el valor del monto del seguro y la asignación de porcentaje del mismo, dependiendo de que si se
 * desea o no asegurar el paquete del envío.
 *
 * En caso de no querer asegurar el envío, solamente se le pasa el valor declarado y el valor del monto del seguro
 * queda y se devuelve en cero.
 *
 * @param $decPesoGuia
 * @return int
 */
function asignarPorcFranqueo($decPesoGuia) {
    $decPorcFran = 0;
    //----------------------------------------------------------------------------------
    // Se asigna el porcentaje de franqueo postal de Liberty, dependiendo de los rangos
    // agregados desde el index general del Sistema.
    //----------------------------------------------------------------------------------
    $arrPesoMaxi = unserialize($_SESSION['PesoFra2']);
    $arrPorcFran = unserialize($_SESSION['PorcFran']);
    $intCantLimi = count($arrPesoMaxi)-1;
    for ($i = 0; $i <= $intCantLimi; $i++) {
        if ($decPesoGuia < $arrPesoMaxi[$i] + 1) {
            $decPorcFran = $arrPorcFran[$i];
            break;
        }
    }
    return $decPorcFran;
}

/**
 * Esta rutina devuelve el valor del monto del seguro y la asignación de porcentaje del mismo, dependiendo de que si se
 * desea o no asegurar el paquete del envío.
 *
 * En caso de no querer asegurar el envío, solamente se le pasa el valor declarado y el valor del monto del seguro
 * queda y se devuelve en cero.
 *
 * @param $decValoDecl
 * @param int $intChecAseg
 * @return int
 */
function asignarPorcSeguro($decValoDecl,$intTariGuia,$intChecAseg = 0) {
    /**
     * @var $objConfReco Parametro
     */
    $decPorcSgro = 0;

    t('El Valor Decl. es: '.$decValoDecl);
    if ($intChecAseg) {
        t('El envio esta asegurado...');
        //-------------------------
        // Reconversion Monetaria
        //-------------------------
        $intTariRefe = 65;
        $objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
        if ($objConfReco) {
            $intTariRefe = (int)$objConfReco->ParaVal3;
            t('Reconv. Monet. Activa.  La Tarifa Referencial es: '.$intTariRefe);
        }
        $arrValoMaxi = unserialize($_SESSION['RecoMax1']);
        if ($intTariGuia < $intTariRefe) {
            t('Se trata de un envio con Tarifa vieja');
            //------------------------------------------------------------------------------------------
            // Esta condicion se cumple cuando la guia tiene tarifa vieja (anterior a la reconversion)
            //------------------------------------------------------------------------------------------
            $arrValoMaxi = unserialize($_SESSION['ValoMax1']);
        }
        //------------------------------------------------------------------------------------
        // Se asigna el nuevo valor de seguro de Liberty, dependiendo de los nuevos rangos
        // agregados desde el index general del Sistema.
        //------------------------------------------------------------------------------------
        //$arrValoMaxi = unserialize($_SESSION['ValoMax1']);
        $arrPorcSegu = unserialize($_SESSION['PorcSeg1']);

        t('La cantidad de elementos del vector es: '.count($arrValoMaxi));
        $intCantLimi = count($arrValoMaxi)-1;

        for ($i = 0; $i <= $intCantLimi; $i++) {
            t('Valor del rango: '.$arrValoMaxi[$i]);
            if ($decValoDecl < $arrValoMaxi[$i] + 1) {
                $decPorcSgro = $arrPorcSegu[$i];
                t('El % de seguro es: '.$decPorcSgro);
                break;
            }
        }
    }

    return $decPorcSgro;
}

/**
 * Esta rutina devuelve el valor correspondiente del porcentaje del IVA.
 *
 * @param string $strCodiOrig
 * @param string $strCodiDest
 * @param string $strModaPago
 * @param double $dblMontTari
 * @return int
 */
function asignarPorcIVA($strCodiOrig,$strCodiDest,$strModaPago,$dblMontTari=0) {
    $arrSucuExen = unserialize($_SESSION['SucuExen']);
    t('Existe(n) '.count($arrSucuExen).' Sucursal(es) exenta(s)');
    $decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA',FechaDeHoy());
    //-------------------------------------------------------------------------
    // Si la Modalida de Pago es PPD ó CRD y el Origen es una Sucursal exenta
    // de IVA, entonces el porcetaje de IVA se hace cero (0).
    //-------------------------------------------------------------------------
    t('La modalidad de pago es: '.$strModaPago);
    if ($strModaPago == 'PPD' || $strModaPago == 'CRD') {
        if (in_array($strCodiOrig,$arrSucuExen)) {
            $decPorcIvax = 0;
        }
    }
    //--------------------------------------------------------------------
    // Si la Modalida de Pago es COD y el Destino es una Sucursal exenta
    // de IVA, entonces el porcetaje de IVA se hace cero (0).
    //--------------------------------------------------------------------
    if ($strModaPago == 'COD') {
        if (in_array($strCodiDest,$arrSucuExen)) {
            $decPorcIvax = 0;
        }
    }
    t('El % de IVA asignado es: '.$decPorcIvax);
    return $decPorcIvax;
}

/**
 * Esta rutina devuelve los montos asociados a la Tarifa de un Envio en funcion de los valores
 * que entran como parametro
 *
 * @param array $arrParaTari
 * @return array $arrValoTari
 */
function calcularTarifaParcialPmn($arrParaTari) {
    //t('===================================');
    //t('Entrando a CalcularTarifaParcialPmn');
    $dttFechGuia = $arrParaTari['dttFechGuia'];
    $strCodiOrig = $arrParaTari['strCodiOrig'];
    $strCodiDest = $arrParaTari['strCodiDest'];
    $decPesoGuia = $arrParaTari['dblPesoGuia'];
    $dblValoDecl = $arrParaTari['dblValoDecl'];
    $intChecAseg = $arrParaTari['intChecAseg'];
    $dblPorcSgro = $arrParaTari['dblPorcSgro'];
    $strModaPago = $arrParaTari['strModaPago'];
    $strEstaUsua = $arrParaTari['strEstaUsua'];
    $dblMontOtro = isset($arrParaTari['dblMontOtro']) ? $arrParaTari['dblMontOtro'] : 0;
    $decSgroClie = isset($arrParaTari['decSgroClie']) ? $arrParaTari['decSgroClie'] : 0;
    $decPorcDcto = isset($arrParaTari['decPorcDcto']) ? $arrParaTari['decPorcDcto'] : 0;
    $objTariGuia = isset($arrParaTari['objTariGuia']) ? $arrParaTari['objTariGuia'] : null;
    //-------------------------------------------------------------------------------------
    // Si el Cliente tiene algun porcentaje de Seguro definido (especifico y particular)
    // entonces ese valor es el que se debe usar para realizar los calculos
    //-------------------------------------------------------------------------------------
    if ($decSgroClie > 0) {
        $dblPorcSgro = $decSgroClie;
    }

    $intDispTari = trim($strCodiOrig) == trim($strCodiDest) ? TipoTarifaType::URB : TipoTarifaType::NAC;
    if ($objTariGuia) {
        $_SESSION['TariPmnx'] = serialize($objTariGuia);
    }
    //t('Voy a buscarMontoBaseTarifaPmn');
    $arrParaTari = buscarMontoBaseTarifaPmn($intDispTari,$decPesoGuia,$strModaPago,$strCodiDest,$strEstaUsua,$dttFechGuia);
    //t('Regresé de buscarMontoBaseTarifaPmn');

    $blnTodoOkey = $arrParaTari[0];
    //t('La variable TodoOk tiene: '.$blnTodoOkey);
    $dblPorcDiva = $blnTodoOkey ? $arrParaTari[6] : 0;

    if ($blnTodoOkey) {
        //t('Como todo esta bien, sigo mi camino');
        $decMontBase = str_replace(',','',$arrParaTari[2]);
        //t('Monto Base: '.$decMontBase);
        $decMontDcto = $decMontBase * $decPorcDcto / 100;
        //t('Monto Descuento: '.$decMontDcto);
        $dblMontBase = $decMontBase - $decMontDcto;
        //t('Monto Base menos Dscto: '.$decMontBase);

        if ($dttFechGuia <= '2016-04-30') {
            //t('Se trata de una guia con fecha <= 2016-04-30');
            $dblFranPost = $arrParaTari[3];
        } else {
            $decPorcFran = $arrParaTari[3];
            //t('El % franqueo postal es: '.$decPorcFran);
            //t('El monto base es: '.$dblMontBase);
            $dblFranPost = $dblMontBase * $decPorcFran / 100;
            //t('El monto de franqueo postal es: '.$dblFranPost);
        }

        if ($intChecAseg) {
            $dblMontSgro = $dblValoDecl * $dblPorcSgro / 100;
        } else {
            $dblMontSgro = 0;
        }

        $dblMontDiva = round(($dblMontBase * $dblPorcDiva / 100),2);
        $dblMontTota = $dblMontBase + $dblMontSgro + $dblMontDiva + $dblFranPost + $dblMontOtro;
        $dblMontTota = round($dblMontTota,2);
        $strMensUsua = '';
    } else {
        $strMensUsua = $arrParaTari[1];
        $dblMontBase = 0;
        $decMontDcto = 0;
        $dblFranPost = 0;
        $dblMontDiva = 0;
        $dblMontSgro = 0;
        $dblMontTota = 0;
        $dblMontOtro = 0;
    }

    $arrValoTari['blnTodoOkey'] = $blnTodoOkey;
    $arrValoTari['strMensUsua'] = $strMensUsua;
    $arrValoTari['dblMontBase'] = $dblMontBase;
    $arrValoTari['dblFranPost'] = $dblFranPost;
    $arrValoTari['dblPorcDiva'] = $dblPorcDiva;
    $arrValoTari['dblMontDiva'] = $dblMontDiva;
    $arrValoTari['dblMontSgro'] = $dblMontSgro;
    $arrValoTari['dblMontTota'] = $dblMontTota;
    $arrValoTari['dblMontOtro'] = $dblMontOtro;
    $arrValoTari['decMontDcto'] = $decMontDcto;

    return $arrValoTari;
}

/*
function porcentajeIVA(Guia $objGuia, $decPorcIvax){
    $strCodiOrig = $objGuia->EstaOrig;
    $strCodiDest = $objGuia->EstaDest;
    $arrSucuExen = unserialize($_SESSION['SucuExen']);

    $strModoPago = TipoGuiaType::ToString($objGuia->TipoGuia);
    $intPosiPago = strpos($strModoPago, "-");
    $strNombPago = substr($strModoPago, 0, $intPosiPago);
    //----------------------------------------------------------------------------------------
    // Si la guia es PPD ó CRD y el Origen es una Sucursal Exenta, entonces el %IVA es cero
    //----------------------------------------------------------------------------------------
    if ($strNombPago == 'PPD' || $strNombPago == 'CRD') {
        if (in_array($strCodiOrig,$arrSucuExen)) {
            $decPorcIvax = 0;
        }
    }
    //---------------------------------------------------------------------------------------
    // Si la guia es COD y el Destino es una Sucursal Exenta, entonces el %IVA se hace cero
    //---------------------------------------------------------------------------------------
    if ($strNombPago == 'COD') {
        if (in_array($strCodiDest,$arrSucuExen)) {
            $decPorcIvax = 0;
        }
    }
    return $decPorcIvax;
}
*/


/**
 * Esta rutina devuelve los montos asociados a la Tarifa de un Envio en funcion de los valores
 * que entran como parametro
 *
 * @param array $arrParaTari
 * @return array $arrValoTari
 */
function calcularTarifaParcialNew($arrParaTari) {
    /**
     * @var $objRegiTraz Parametro
     * @var $objUsuario Usuario
     */
    $objUsuario  = unserialize($_SESSION['User']);
    $strLogiUsua = $objUsuario->LogiUsua;
    $objRegiTraz = BuscarParametro('RegiTraz','CalcTari','TODO',null);
    $blnRegiTraz = false;
    if ($objRegiTraz) {
        if (trim($objRegiTraz->ParaTxt2) == trim($strLogiUsua)) {
            $blnRegiTraz = $objRegiTraz->ParaVal1;
        }
    }
    if ($blnRegiTraz) {
        $objRegiTraz->ParaTxt1 .= "<b>CalcularTarifaParcialNew</b><br>";
        $objRegiTraz->Save();
        t('*** CalcularTarifaParcialNew ***');
    }

    $dttFechGuia = $arrParaTari['dttFechGuia'];
    $intCodiTari = $arrParaTari['intCodiTari'];
    $intCodiProd = $arrParaTari['intCodiProd'];
    $strCodiOrig = $arrParaTari['strCodiOrig'];
    $strCodiDest = $arrParaTari['strCodiDest'];
    $dblPesoGuia = $arrParaTari['dblPesoGuia'];
    $dblValoDecl = $arrParaTari['dblValoDecl'];
    $intChecAseg = $arrParaTari['intChecAseg'];
    $strModaPago = $arrParaTari['strModaPago'];
    $dblMontOtro = isset($arrParaTari['dblMontOtro']) ? $arrParaTari['dblMontOtro'] : 0;
    $decSgroClie = isset($arrParaTari['decSgroClie']) ? $arrParaTari['decSgroClie'] : 0;
    $decPorcDcto = isset($arrParaTari['decPorcDcto']) ? $arrParaTari['decPorcDcto'] : 0;

    //-------------------------------------------------------------------------------------
    // Si el Cliente tiene algun porcentaje de Seguro definido (especifico y particular)
    // entonces ese valor es el que se debe usar para realizar los calculos
    //-------------------------------------------------------------------------------------
    if ($decSgroClie > 0) {
        $dblPorcSgro = $decSgroClie;
    } else {
        //-----------------------------------------------------------------
        // Se asigna porcentaje de Seguro según los protocolos actuales
        //-----------------------------------------------------------------
        $dblPorcSgro = asignarPorcSeguro($dblValoDecl,$intCodiTari,$intChecAseg);
    }

    $arrParaTari = buscarMontoBaseTarifa($intCodiTari,$intCodiProd,$strCodiOrig,$strCodiDest,$strModaPago,$dblPesoGuia,$dblValoDecl,$dttFechGuia);
    if ($blnRegiTraz) {
        $strTextMens = "Regrese de buscarMontoBaseTarifa";
        t($strTextMens);
        $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
        $objRegiTraz->Save();
    }
    $blnTodoOkey = $arrParaTari[0];
    $dblPorcDiva = $blnTodoOkey ? $arrParaTari[6] : 0;
    $decMontDcto = 0;
    if ($blnTodoOkey) {
        $dblMontBase = str_replace(',','',$arrParaTari[2]);

        if ($decPorcDcto > 0) {
            t('Monto Base para Dscto: '.$dblMontBase);
            $decMontDcto = $dblMontBase * $decPorcDcto / 100;
            if ($blnRegiTraz) {
                $strTextMens = "Porcentaje de Dscto: $decPorcDcto";
                t($strTextMens);
                $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                $objRegiTraz->Save();
            }
        }
        //$dblMontBase = $dblMontBase - $decMontDcto;

        if ($blnRegiTraz) {
            $strTextMens = "Monto Base: $dblMontBase";
            t($strTextMens);
            $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
            $objRegiTraz->Save();
            $strTextMens = "Monto Dscto: $decMontDcto";
            t($strTextMens);
            $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
            $objRegiTraz->Save();
        }
        if ($dttFechGuia <= '2016-04-30') {
            $dblFranPost = $arrParaTari[3];
        } else {
            $decPorcFran = $arrParaTari[3];
            $dblFranPost = $dblMontBase * $decPorcFran / 100;
        }
        if ($blnRegiTraz) {
            $strTextMens = "Franqueo Postal: $dblFranPost";
            t($strTextMens);
            $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
            $objRegiTraz->Save();
        }
        if ($intChecAseg) {
            $dblMontSgro = $dblValoDecl * $dblPorcSgro / 100;
        } else {
            $dblMontSgro = 0;
        }
        if ($blnRegiTraz) {
            $strTextMens = "Monto Seguro: $dblMontSgro";
            t($strTextMens);
            $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
            $objRegiTraz->Save();
        }
        $dblBaseImpo = $dblMontBase - $decMontDcto + $dblMontSgro;
        if ($blnRegiTraz) {
            $strTextMens = "Base Imponible: $dblBaseImpo";
            t($strTextMens);
            $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
            $objRegiTraz->Save();
        }
        $dblMontDiva = round((($dblMontBase - $decMontDcto) * $dblPorcDiva / 100),2);
        if ($blnRegiTraz) {
            $strTextMens = "Monto del Iva: $dblMontDiva";
            t($strTextMens);
            $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
            $objRegiTraz->Save();
        }
        $dblMontTota = $dblBaseImpo + $dblMontDiva + $dblFranPost + $dblMontOtro;
        $dblMontTota = round($dblMontTota,2);
        if ($blnRegiTraz) {
            $strTextMens = "Monto Total: $dblMontTota";
            t($strTextMens);
            $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
            $objRegiTraz->Save();
        }
        $strMensUsua = '';
    } else {
        $strMensUsua = $arrParaTari[1];
        $dblMontBase = 0;
        $dblFranPost = 0;
        $dblMontDiva = 0;
        $dblMontSgro = 0;
        $dblMontTota = 0;
        $dblMontOtro = 0;
    }
    $arrValoTari['blnTodoOkey'] = $blnTodoOkey;
    $arrValoTari['strMensUsua'] = $strMensUsua;
    $arrValoTari['dblMontBase'] = $dblMontBase;
    $arrValoTari['decMontDcto'] = $decMontDcto;
    $arrValoTari['dblFranPost'] = $dblFranPost;
    $arrValoTari['dblPorcDiva'] = $dblPorcDiva;
    $arrValoTari['dblMontDiva'] = $dblMontDiva;
    $arrValoTari['dblMontSgro'] = $dblMontSgro;
    $arrValoTari['dblPorcSgro'] = $dblPorcSgro;
    $arrValoTari['dblMontTota'] = $dblMontTota;
    $arrValoTari['dblMontOtro'] = $dblMontOtro;

    return $arrValoTari;
}

/**
 * Esta rutina devuelve los montos asociados a la Tarifa de un Envio en funcion de los valores
 * que entran como parametro
 *
 * @param int $intCodiTari
 * @param int $intCodiProd
 * @param string $strCodiOrig
 * @param string $strCodiDest
 * @param string $strModaPago
 * @param float $dblPesoGuia
 * @param float $dblValoDecl
 * @param int $intChecAseg
 * @param float $dblPorcSgro
 * @param float $dblPorcDiva
 * @param float $dblMontOtro
 * @return array($blnTodoOkey,$dblMontBase,$dblFranPost,$dblMontDiva,$dblMontSgro,$dblMontTota,$dblMontOtro,$dblPorcDIva)
 */
function calcularTarifaParcial($intCodiTari,$intCodiProd,$strCodiOrig,$strCodiDest,$strModaPago,$dblPesoGuia,$dblValoDecl,$intChecAseg,$dblPorcSgro,$dblPorcDiva,$dblMontOtro=0,$strMensPant='N') {
    $arrParaTari = buscarMontoBaseTarifa($intCodiTari,$intCodiProd,$strCodiOrig,$strCodiDest,$strModaPago,$dblPesoGuia,$dblValoDecl,$strMensPant);
    $blnTodoOkey = $arrParaTari[0];
    $dblPorcDiva = $blnTodoOkey ? $arrParaTari[6] : 0;
    if ($blnTodoOkey) {
        $dblMontBase = $arrParaTari[2];
        $dblFranPost = $arrParaTari[3];
        if ($intChecAseg) {
            $dblMontSgro = $dblValoDecl * $dblPorcSgro / 100;
        } else {
            $dblMontSgro = 0;
        }
        $dblMontDiva = round(($dblMontBase * $dblPorcDiva / 100),2);
        $dblMontTota = $dblMontBase + $dblMontDiva + $dblFranPost + $dblMontSgro + $dblMontOtro;
        $dblMontTota = round($dblMontTota,2);
        $strMensUsua = '';
    } else {
        $strMensUsua = $arrParaTari[1];
        $dblMontBase = 0;
        $dblFranPost = 0;
        $dblMontDiva = 0;
        $dblMontSgro = 0;
        $dblMontTota = 0;
        $dblMontOtro = 0;
    }
    return array($blnTodoOkey,$strMensUsua,$dblMontBase,$dblFranPost,$dblMontDiva,$dblMontSgro,$dblMontTota,$dblMontOtro,$dblPorcDiva);
}

function crearGuiaRetorno(Guia $objGuia) {
    $objUsuario = unserialize($_SESSION['User']);
    //-----------------------------------------------------------------------
    // En la tabla "parametro" del Sistema, se especifica si se debe crear
    // o no la Guia de Retorno en forma automatica
    //-----------------------------------------------------------------------
    $strGrabGuia = BuscarParametro('RetoAuto','GrabGuia','Txt1','S');
    if ($strGrabGuia == 'S') {
        $objGuiaReto = Guia::Load($objGuia->GuiaRetorno);
        if (!$objGuiaReto) {
            //-----------------------------------------
            // Si la Guia no existe se crea una nueva
            //-----------------------------------------
            $objGuiaReto = new Guia();
            if ($objGuia->SistemaId == 'sde') {
                //----------------------------------------------------------------------
                // Si la Guia fue registrada a traves del SDE, entonces ya el Usuario
                // especifico el Nro de la Guia Retorno en la pantalla
                //----------------------------------------------------------------------
                $objGuiaReto->NumeGuia = $objGuia->GuiaRetorno;
            } else {
                //---------------------------------------------------------------------------
                // Se la Guia fue registrada a traves del Connect o el Counter, entonces es
                // el Sistema el que debe asignar el Nro de la Guia
                //---------------------------------------------------------------------------
                $objGuiaReto->NumeGuia = proxNroDeGuia();
            }
        }
        $objGuiaReto->CodiClie = $objGuia->CodiClie;
        $objGuiaReto->FechGuia = $objGuia->FechGuia;
        $objGuiaReto->EstaOrig = $objGuia->EstaDest;
        $objGuiaReto->EstaDest = $objGuia->EstaOrig;
        $objGuiaReto->PesoGuia = 0;
        $objGuiaReto->NombRemi = $objGuia->NombDest;
        $objGuiaReto->DireRemi = $objGuia->DireDest;
        $objGuiaReto->TeleRemi = $objGuia->TeleDest;
        $objGuiaReto->NombDest = $objGuia->NombRemi;
        $objGuiaReto->DireDest = $objGuia->DireRemi;
        $objGuiaReto->TeleDest = $objGuia->TeleRemi;
        $objGuiaReto->CantPiez = 1;
        $objGuiaReto->DescCont = $objGuia->DescCont;
        $objGuiaReto->CodiProd = $objGuia->CodiProd;
        $objGuiaReto->TipoGuia = $objGuia->TipoGuia;
        $objGuiaReto->ValorDeclarado = 0;
        //------------------------------------------------------
        // Para la Guia Retorno se calcula la Tarifa de un
        // sobre o documento de medio kilo.
        //------------------------------------------------------
        $intCodiTari = $objGuia->CodiClieObject->TarifaId;
        $objProducto = FacProducto::LoadBySiglProd('DOC');
        $intCodiProd = $objProducto->CodiProd;
        $strCodiOrig = $objGuiaReto->EstaOrig;
        $strCodiDest = $objGuiaReto->EstaDest;
        $dblPesoGuia = $objGuiaReto->PesoGuia;
        $dblValoDecl = $objGuiaReto->ValorDeclarado;
        $strModaPago = TipoGuiaType::ToStringCorto($objGuiaReto->TipoGuia);
        $intChecAseg = 0;  // La Guia Retorno, por defecto no contempla el Seguro
        $dblPorcSgro = $objGuia->PorcentajeSeguro;
        $dblPorcDiva = $objGuia->PorcentajeIva;
        $arrValoTari = calcularTarifaParcial($intCodiTari,$intCodiProd,$strCodiOrig,$strCodiDest,$strModaPago,$dblPesoGuia,$dblValoDecl,$intChecAseg,$dblPorcSgro,$dblPorcDiva);
        //---------------------------------------------------------
        // Los valores obtenidos, se asignan a la Guia de Retorno
        //---------------------------------------------------------
        $dblMontBase = $arrValoTari[2];
        $dblFranPost = $arrValoTari[3];
        $dblMontDiva = $arrValoTari[4];
        $dblMontSgro = $arrValoTari[5];
        $dblMontTota = $arrValoTari[6];
        $dblPorcDiva = $arrValoTari[8];

        $arrOperacion = SdeOperacion::LoadArrayByCodiRuta('R9999',QQ::Clause(QQ::LimitInfo(1)));
        $objGuiaReto->PorcentajeIva      = $dblPorcDiva;
        $objGuiaReto->MontoIva           = $dblMontDiva;
        $objGuiaReto->Asegurado          = 0; //$objGuia->Asegurado;
        $objGuiaReto->PorcentajeSeguro   = $objGuia->PorcentajeSeguro;
        $objGuiaReto->MontoSeguro        = $dblMontSgro;
        $objGuiaReto->MontoBase          = $dblMontBase;
        $objGuiaReto->MontoFranqueo      = $dblFranPost;
        $objGuiaReto->MontoTotal         = $dblMontTota;
        $objGuiaReto->EntregadoA         = '';
        $objGuiaReto->FechaEntrega       = null;
        $objGuiaReto->HoraEntrega        = '';
        $objGuiaReto->CodiCkpt           = '';
        $objGuiaReto->EstaCkpt           = '';
        $objGuiaReto->FechCkpt           = null;
        $objGuiaReto->HoraCkpt           = '';
        $objGuiaReto->ObseCkpt           = '';
        $objGuiaReto->UsuaCkpt           = '';
        $objGuiaReto->FechaPod           = null;
        $objGuiaReto->HoraPod            = '';
        $objGuiaReto->UsuarioPod         = '';
        $objGuiaReto->CantAyudantes      = 0;
        $objGuiaReto->ParadasAdicionales = 0;
        $objGuiaReto->CourierId          = $objGuia->CourierId;
        $objGuiaReto->GuiaExterna        = null;
        $objGuiaReto->FleteDirecto       = '';
        $objGuiaReto->TieneGuiaRetorno   = '';
        $objGuiaReto->GuiaRetorno        = '';
        $objGuiaReto->Observacion        = QApplication::Translate('RETORNO DE LA GUIA: ').$objGuia->NumeGuia;
        $objGuiaReto->Alto               = 0;
        $objGuiaReto->Ancho              = 0;
        $objGuiaReto->Largo              = 0;
        $objGuiaReto->OperacionId        = $arrOperacion[0]->CodiOper;
        $objGuiaReto->PorcentajeSgroInt  = 0;
        $objGuiaReto->MontoSgroInt       = 0;
        $objGuiaReto->MontoTotalInt      = 0;
        $objGuiaReto->PesoVolumetrico    = 0;
        $objGuiaReto->PesoLibras         = 0;
        $objGuiaReto->TransFac           = SinoType::NO;
        $objGuiaReto->HojaEntrega        = '';
        $objGuiaReto->UsuarioCreacion    = $objUsuario->LogiUsua;
        $objGuiaReto->FechaCreacion      = new QDateTime(QDateTime::Now);
        $objGuiaReto->HoraCreacion       = date("H:i");
        $objGuiaReto->SistemaId          = $objGuia->SistemaId;
        $objGuiaReto->Anulada            = 0;
        $objGuiaReto->EnEfectivo         = 0;
        $objGuiaReto->TarifaId           = $objGuia->TarifaId;
        $objGuiaReto->Save();
        //------------------------------------------------------------------
        // Una vez creada la Guia Retorno, se debe establecer la relacion
        // entre la Guia original y la Guia Retorno recien creada
        //------------------------------------------------------------------
        if (in_array($objGuia->SistemaId,array('con','cnt'))) {
            $objGuia->GuiaRetorno = $objGuiaReto->NumeGuia;
            $objGuia->Save();
        }
        //----------------------------------------------------------------------------------
        // Un vez creada o actualizada la Guia, se procede a grabar el primer checkpoint;
        // sin embargo, si se trata de una guia registrada a traves del software "connect"
        // no debe grabarse un "Pick-Up", sino un "No-Recibido"
        //----------------------------------------------------------------------------------
        if ($objGuia->SistemaId != 'con') {
            $strCodiCkpt = 'PU';
        } else {
            $strCodiCkpt = 'RT';
        }
        $blnTodoOkey = true;
        if (!$objGuiaReto->tieneCheckpoint($strCodiCkpt)) {
            $objCheckpoint = SdeCheckpoint::Load($strCodiCkpt);
            if ($objCheckpoint) {
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumeGuia'] = $objGuiaReto->NumeGuia;
                $arrDatoCkpt['UltiCkpt'] = '';
                $arrDatoCkpt['GuiaAnul'] = SinoType::NO;
                $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescDevo;
                $arrDatoCkpt['CodiRuta'] = $arrOperacion[0]->CodiRuta; //$this->lstOperRuta->SelectedValue;
                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                if (!$arrResuGrab['TodoOkey']) {
                    $blnTodoOkey = false;
                }
            } else {
                $blnTodoOkey = false;
            }
        }
        return $blnTodoOkey;
    }
}

/**
 * Esta rutina valida que la cadena de caracteres que entra como parametro
 * tenga un formato de Telefono Valido
 *
 * @param string $strNumeTele
 * @return boolean $blnTodoOkey
 */
function telefonoValido($strNumeTele) {
    $blnTodoOkey = true;
    if (strlen($strNumeTele) != 12) {
        $blnTodoOkey = false;
    }
    if ($blnTodoOkey) {
        $strPrimPart = substr($strNumeTele,0,4);
        if (!is_numeric($strPrimPart)) {
            $blnTodoOkey = false;
        }
    }
    if ($blnTodoOkey) {
        $strDosxPunt = $strNumeTele[4];
        if ($strDosxPunt != '-') {
            $blnTodoOkey = false;
        }
    }
    if ($blnTodoOkey) {
        $strSeguPart = substr($strNumeTele,5,strlen($strNumeTele));
        if (!is_numeric($strSeguPart)) {
            $blnTodoOkey = false;
        }
    }
    return $blnTodoOkey;
}

/**
 * Esta funcion devuelve un vector con varios elementos dentro de los cuales figura, el monto
 * base de la tarifa y el monto del franqueo postal.  Estos valores sirven para calcular el
 * monto total de la Tarifa de un Envio. Se recibe como parametro el Id de la Tarifa, el Producto,
 * el Origen, el Destino y el Peso del Envio.  Adicionalmente se recibe el Valor Declarado de la
 * mercancia, para los casos en que la tarifa sea un porcentaje de dicho valor
 *
 */
function buscarMontoBaseTarifaPmn($intDispTari,$decPesoGuia,$strModaPago,$strCodiDest,$strEstaUsua,$dttFechGuia) {
    /**
     * @var $objLimiNaci TarifaPeso
     */
    t('===================================');
    t('Entrando a buscarMontoBaseTarifaPmn');
    //------------------------
    // Parametros de Sesion
    //------------------------
    $objTarifa   = unserialize($_SESSION['TariPmnx']);
    t('La tarifa es: '.$objTarifa->Id);
    //$decPorcIvax = unserialize($_SESSION['IvaxDhoy']);
    $objLimiNaci = unserialize($_SESSION['LimiNaci']);
    $objLimiUrba = unserialize($_SESSION['LimiUrba']);

    $blnTodoOkey = true;
    $strMensUsua = '';

    //-----------------------------------------------------------------------------------------
    // Se evalua si el peso del envio, excede el limite de los rangos de peso, en cuyo caso
    // se aplican los valores referidos en la tarifa misma
    //-----------------------------------------------------------------------------------------
    if ($intDispTari == TipoTarifaType::NAC) {
        t("Nacional");
        $decPesoComp = $objTarifa->PesoInicial;
        $dblPesoMaxi = $objLimiNaci->PesoFinal;
        $dblTariMaxi = $objLimiNaci->MontoBase;
        $decValoIncr = $objTarifa->ValorIncremento;
    } else {
        t("Urbana");
        $decPesoComp = $objTarifa->PesoInicialUrbano;
        $dblPesoMaxi = $objLimiUrba->PesoFinal;
        $dblTariMaxi = $objLimiUrba->MontoTarifa;
        $decValoIncr = $objTarifa->IncrementoUrbano;
    }
    if ($decPesoGuia > $decPesoComp) {
        //$decFactIvax = 1 + ($decPorcIvax / 100);
        //-------------------------------------
        // Se calcula el excedente de kilos
        //-------------------------------------
        $decPesoGuia = $decPesoGuia - $dblPesoMaxi;
        $decPesoGuia = round($decPesoGuia);
        t("Peso Excendente: ".$decPesoGuia);
        //--------------------------------------
        // Se aplica la medida de incremento
        //--------------------------------------
        if ($objTarifa->MedidaIncremento == FacMedidaType::MEDIOKILO) {
            $decPesoGuia = $decPesoGuia / 0.5;
        }
        t("Luego de aplicar el tipo de medida el peso es: ".$decPesoGuia);
        $dblMontIncr = $decPesoGuia * $decValoIncr;
        t("Monto Incremento (Peso Excendente * Incremento): ".$dblMontIncr);
        //----------------------------------------------------------------------------------
        // El Valor del Incremento, debe ser sumado al valor maximo de la Tarifa por Peso
        //----------------------------------------------------------------------------------
        $dblMontTari = $dblMontIncr + $dblTariMaxi;
        t(sprintf("Monto de la Tarifa es: Monto Incremento (%s) + Monto Maximo Tarifa (%s) = %s",$dblMontIncr,$dblTariMaxi,$dblMontTari));
        $dblFranPost = 0;
        //----------------------------------
        // Se obtiene el porcentaje de IVA
        //----------------------------------
        $decPorcIvax = asignarPorcIVA($strEstaUsua,$strCodiDest,$strModaPago,$dblMontTari);
        $decFactIvax = 1 + ($decPorcIvax / 100);

        $arrTariBase = array();
        $arrTariBase['MontTari'] = $dblMontTari;
        $arrTariBase['FactIvax'] = $decFactIvax;
        $arrTariBase['FranPost'] = $dblFranPost;
        t('Voy a CalcularMontoBaseTarifa');
        //$dblMontBase = CalcularMontoBaseTarifa($arrTariBase);
        $dblMontBase = $dblMontTari;


        t("Monto Base: ".$dblMontBase);
    } else {
        $dblMontBase = 0;
        $dblFranPost = 0;
        $decPorcIvax = 0;
        //-----------------------------------------------------------------------------------
        // Si el peso del envio esta en el rango de pesos de la Tarifa, entonces se busca
        // el monto base correspondiente
        //-----------------------------------------------------------------------------------
        // Traza("Voy a buscar la Tarifa en funcion al peso: ".$decPesoGuia);
        // Traza("El id de la Tarifa es: ".$objTarifa->Id." La dispersion es: ".$intDispTari." y el peso es: ".$decPesoGuia);
        $objTarifaPeso = TarifaPeso::BuscarTarifaPeso($objTarifa->Id,$intDispTari,$decPesoGuia);
        // Traza('La clave del registro es: '.$objTarifa->Id);
        if ($objTarifaPeso) {
            // Traza("Encontre los datos");
            $dblMontTari = $objTarifaPeso->MontoTarifa;
            //----------------------------------
            // Se obtiene el porcentaje de IVA
            //----------------------------------
            $decPorcIvax = asignarPorcIVA($strEstaUsua,$strCodiDest,$strModaPago,$dblMontTari);

            if ($dttFechGuia <= '2016-04-30') {
                $dblFranPost = $objTarifaPeso->FranqueoPostal;
            } else {
                $dblFranPost = $objTarifaPeso->PorcentajeFp;
                $dblMontBase = $objTarifaPeso->MontoBase;
            }

            // Traza("Monto Base: ".$dblMontBase);
        } else {
            $blnTodoOkey = false;
            $strMensUsua = "No existe Tarifa para este Producto, Origen, Destino y Peso";
        }
    }
    t("Los valores que retorna la rutina son:");
    t("blnTodoOkey: ".$blnTodoOkey);
    t("strMensUsua: ".$strMensUsua);
    t("dblMontBase: ".$dblMontBase);
    t("dblFranPost: ".$dblFranPost);
    t("Tipo Tarifa: ".$objTarifa->TipoTarifa);
    return array($blnTodoOkey,$strMensUsua,$dblMontBase,$dblFranPost,$objTarifa->TipoTarifa,$intDispTari,$decPorcIvax);
}


/**
 * Esta rutina valida que la cadena de caracteres que entra como parametro
 * tenga un formato de Hora Valida
 *
 * @param string $strHoraVali
 * @return boolean $blnTodoOkey
 */
function horaValida($strHoraVali) {
    $blnTodoOkey = true;
    if (strlen($strHoraVali) != 5) {
        $blnTodoOkey = false;
    }
    if ($blnTodoOkey) {
        $strPrimPart = $strHoraVali[0].$strHoraVali[1];
        if (!is_numeric($strPrimPart) || (convert2Entero($strPrimPart) < 0) || (convert2Entero($strPrimPart) > 23)) {
            $blnTodoOkey = false;
        }
    }
    if ($blnTodoOkey) {
        $strDosxPunt = $strHoraVali[2];
        if ($strDosxPunt != ':') {
            $blnTodoOkey = false;
        }
    }
    if ($blnTodoOkey) {
        $strSeguPart = $strHoraVali[3].$strHoraVali[4];
        if (!is_numeric($strSeguPart) || (convert2Entero($strSeguPart) < 0) || (convert2Entero($strSeguPart) > 59)) {
            $blnTodoOkey = false;
        }
    }
    return $blnTodoOkey;
}

/**
 * Esta funcion devuelve un vector con varios elementos dentro de los cuales figura, el monto
 * base de la tarifa y el monto del franqueo postal.  Estos valores sirven para calcular el
 * monto total de la Tarifa de un Envio. Se recibe como parametro el Id de la Tarifa, el Producto,
 * el Origen, el Destino y el Peso del Envio.  Adicionalmente se recibe el Valor Declarado de la
 * mercancia, para los casos en que la tarifa sea un porcentaje de dicho valor
 *
 * @param int $intTarifaId
 * @param int $intCodiProd
 * @param string $strOrigen
 * @param string $strDestino
 * @param string $strModaPago
 * @param float $dblPeso
 * @param float $dblValorDeclarado
 * @return array($blnTodoOkey,$strMensUsua,$dblMontBase,$dblFranPost,$objTarifa->TipoTarifa)
 */
function buscarMontoBaseTarifa($intTarifaId,$intCodiProd,$strOrigen,$strDestino,$strModaPago,$dblPeso,$dblValorDeclarado,$dttFechGuia,$strMensPant='N'){
    /**
     * @var $objRegiTraz Parametro
     * @var $objUsuario Usuario
     */
    $objUsuario  = unserialize($_SESSION['User']);
    $strLogiUsua = $objUsuario->LogiUsua;
    $objRegiTraz = BuscarParametro('RegiTraz','CalcTari','TODO',null);
    $blnRegiTraz = false;
    if ($objRegiTraz) {
        if (trim($objRegiTraz->ParaTxt2) == trim($strLogiUsua)) {
            $blnRegiTraz = $objRegiTraz->ParaVal1;
        }
    }
    if ($blnRegiTraz) {
        $objRegiTraz->ParaTxt1 .= "<b>Rutina: buscarMontoBaseTarifa</b><br>";
        $objRegiTraz->Save();
        t('*** buscarMontoBaseTarifa ***');
    }

    $blnTodoOkey = true;
    $strMensUsua = '';
    //----------------------------------------------------------------------------------------------------
    // En base a esta comparacion de Origen y Destino, se determina la "dispersion" (Nacional o Urbana)
    // de la Tarifa que se debe utilizar
    //----------------------------------------------------------------------------------------------------
    $intDispTari = abs(strcmp($strOrigen,$strDestino));
    if ($intDispTari > 1) {
        $intDispTari = 1;
    }
    $objTarifa = FacTarifa::Load($intTarifaId);
    if ($blnRegiTraz) {
        $strTextMens = "Tarifa asociada a la Guia: ".$objTarifa->Descripcion;
        t($strTextMens);
        $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
        $objRegiTraz->Save();
    }
    //$decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA',FechaDeHoy());
    $decPorcIvax = asignarPorcIVA($strOrigen,$strDestino,$strModaPago);

    if ($objTarifa->TipoTarifa == FacTipoTarifaType::PORPESO) {
        //-----------------------------------------------------------------------------------------
        // Se evalua si el peso del envio, excede el limite de los rangos de peso, en cuyo caso
        // se aplican los valores referidos en la tarifa misma
        //-----------------------------------------------------------------------------------------
        if ($intDispTari == TipoTarifaType::NAC) {
            $decPesoComp = $objTarifa->PesoInicial;
            $strTextMens = "Tarifa Nacional";
        } else {
            $decPesoComp = $objTarifa->PesoInicialUrbano;
            $strTextMens = "Tarifa Urbana";
        }
        if ($blnRegiTraz) {
            t($strTextMens);
            $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
            $objRegiTraz->Save();
        }
        if ($dblPeso > $decPesoComp) {
            if ($blnRegiTraz) {
                $strTextMens = "El peso de la guia, excede el limite de la Tarifa";
                t($strTextMens);
                $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                $objRegiTraz->Save();
            }
            //--------------------------------------------------------------------------
            // Se determina en primer lugar el peso maximo contemplado en la tarifa
            //--------------------------------------------------------------------------
            $objClausula = QQ::OrderBy(QQN::TarifaPeso()->PesoInicial);
            $arrTariPeso = TarifaPeso::LoadArrayByTarifaIdTipoId($intTarifaId,$intDispTari,QQ::Clause($objClausula));
            if ($arrTariPeso) {
                $objPesoMaxi = $arrTariPeso[count($arrTariPeso)-1];
                $dblPesoMaxi = $objPesoMaxi->PesoFinal;
                $decBaseMaxi = $objPesoMaxi->MontoBase;
                $dblTariMaxi = $objPesoMaxi->MontoTarifa;
                if ($blnRegiTraz) {
                    $strTextMens = "Peso Final: $dblPesoMaxi, Mto Base: $decBaseMaxi, Tarifa: $dblTariMaxi";
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
            } else {
                $blnTodoOkey = false;
                $strMensUsua = "No existe Tarifa para este Origen, Destino y Peso";
                $dblMontBase = 0;
                if ($blnRegiTraz) {
                    $strTextMens = $strMensUsua;
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
            }
            $dblFranPost = 0;
            if ($blnTodoOkey) {
                //-------------------------------------
                // Se calcula el excedente de kilos
                //-------------------------------------
                $dblPeso = round($dblPeso - $dblPesoMaxi);
                //--------------------------------------
                // Se aplica la medida de incremento
                //--------------------------------------
                if ($objTarifa->MedidaIncremento == FacMedidaType::MEDIOKILO) {
                    $dblPeso = $dblPeso / 0.5;
                }
                if ($blnRegiTraz) {
                    $strTextMens = "Peso excedente: $dblPeso";
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
                //------------------------------------------------------------------------
                // Se calcula el monto de los kilos excedente en funcion del Incremento
                // declarado en la definicion de la Tarifa,
                //------------------------------------------------------------------------
                if ($intDispTari == TipoTarifaType::NAC) {
                    $decValoIncr = $objTarifa->ValorIncremento;
                } else {
                    $decValoIncr = $objTarifa->IncrementoUrbano;
                }
                $dblMontIncr = $dblPeso * $decValoIncr;
                if ($blnRegiTraz) {
                    $strTextMens = "Incremento: $dblPeso * $decValoIncr = $dblMontIncr";
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
                //----------------------------------------------------------------------------------
                // El Valor del Incremento, debe ser sumado al valor maximo de la Tarifa por Peso
                //----------------------------------------------------------------------------------
                // $dblMontTari = $dblTariMaxi;
                $dblFranPost = 0;
                //-------------------------------------------------
                // Se Asigna el porcentaje correspondiente de IVA
                //-------------------------------------------------
                $dblMontBase = $decBaseMaxi;
                if ($blnRegiTraz) {
                    $strTextMens = "Monto Base: $dblMontBase";
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
                $dblMontBase += $dblMontIncr;
                if ($blnRegiTraz) {
                    $strTextMens = "Monto Base + Incremento: $dblMontBase";
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
            }
        } else {
            //-----------------------------------------------------------------------------------
            // Si el peso del envio esta en el rango de pesos de la Tarifa, entonces se busca
            // el monto base correspondiente
            //-----------------------------------------------------------------------------------
            if ($blnRegiTraz) {
                $strTextMens = "El peso de la guia (".$dblPeso.") esta en el rango de la definicion de la tarifa";
                t($strTextMens);
                $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                $objRegiTraz->Save();
            }
            $objTarifaPeso = TarifaPeso::BuscarTarifaPeso($objTarifa->Id,$intDispTari,$dblPeso);
            if ($objTarifaPeso) {
                $dblMontTari = $objTarifaPeso->MontoTarifa;
                if ($blnRegiTraz) {
                    $strTextMens = "El monto de la tarifa es: ".$dblMontTari;
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
                //-------------------------------------------------
                // Se Asigna el porcentaje correspondiente de IVA
                //-------------------------------------------------
                $decPorcIvax = asignarPorcIVA($strOrigen,$strDestino,$strModaPago,$dblMontTari);
                if ($blnRegiTraz) {
                    $strTextMens = "El % de Iva es: ".$decPorcIvax;
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }

                if ($dttFechGuia <= '2016-04-30') {
                    $dblFranPost = $objTarifaPeso->FranqueoPostal;
                } else {
                    $dblFranPost = $objTarifaPeso->PorcentajeFp;
                }
                if ($blnRegiTraz) {
                    $strTextMens = "El franqueo postal es: ".$dblFranPost;
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
                $dblMontBase = $objTarifaPeso->MontoBase;
                if ($blnRegiTraz) {
                    $strTextMens = "El monto base es: ".$dblMontBase;
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }
            } else {
                $blnTodoOkey = false;
                $strMensUsua = "No existe Tarifa para este Producto, Origen, Destino y Peso";
                $dblMontBase = 0;
                $dblFranPost = 0;
                if ($blnRegiTraz) {
                    $strTextMens = "No existe Tarifa para este Producto, Origen, Destino y Peso";
                    t($strTextMens);
                    $objRegiTraz->ParaTxt1 .= $strTextMens."<br>";
                    $objRegiTraz->Save();
                }

            }
        }
    } else {
        if ($objTarifa->TipoTarifa == FacTipoTarifaType::PORVALORDELAMERCANCIA) {
            //----------------------------------------------------------------------
            // Inicialmente se verifica si el monto del Valor Declarado sobrepasa
            // el monto inicial establecido en la Tarifa. De no ser así, se aplica
            // el monto minimo
            //----------------------------------------------------------------------
            if ($dblValorDeclarado < $objTarifa->PesoInicial) {
                $blnTodoOkey = true;
                $strMensUsua = '';
                $dblMontBase = $objTarifa->MontoMinimo;
                $dblFranPost = 0;
            } else {
                //-------------------------------------------------------------------
                // Se aplica entonces el porcentaje correspondiente
                //-------------------------------------------------------------------
                $dblFranPost = 0;
                if ($objTarifa->PorcentajeSobreValor > 0) {
                    $dblMontBase = $dblValorDeclarado * $objTarifa->PorcentajeSobreValor / 100;
                } else {
                    $blnTodoOkey = false;
                    $strMensUsua = "Tarifa con % sobre el Valor Declarado, No Definida";
                    $dblMontBase = 0;
                }
            }
            //-------------------------------------------------
            // Se Asigna el porcentaje correspondiente de IVA
            //-------------------------------------------------
            $decPorcIvax = asignarPorcIVA($strOrigen,$strDestino,$strModaPago,$dblMontBase);
        } else {
            $blnTodoOkey = false;
            $strMensUsua = QApplication::Translate('Tarifa Indefinida');
            $dblMontBase = 0;
            $dblFranPost = 0;
        }
    }
    return array($blnTodoOkey,$strMensUsua,$dblMontBase,$dblFranPost,$objTarifa->TipoTarifa,$intDispTari,$decPorcIvax);
}

/**
 * Convierte a Entero, el valor que entra como parametro
 *
 * @param string $strNumber
 * @return int
 */
function convert2Entero($strNumber) {
    settype($strNumber, "int");
    return $strNumber;
}

/**
 * Esta rutina devuelve el nombre del dia en castellano y solo las primeras 4
 * letras.  Por ej: lunes = lune, martes = mart, miercoles = mier)
 *
 * @return string (las primeras 4 letras del nombre del dia en castellano)
 */
function nombreDelDia() {
    $strCadeSqlx  = "select case ";
    $strCadeSqlx .= "          when date_format(now(),'%a') = 'Sun' then 'domi' ";
    $strCadeSqlx .= "          when date_format(now(),'%a') = 'Mon' then 'lune' ";
    $strCadeSqlx .= "          when date_format(now(),'%a') = 'Tue' then 'mart' ";
    $strCadeSqlx .= "          when date_format(now(),'%a') = 'Wed' then 'mier' ";
    $strCadeSqlx .= "          when date_format(now(),'%a') = 'Thu' then 'juev' ";
    $strCadeSqlx .= "          when date_format(now(),'%a') = 'Fri' then 'vier' ";
    $strCadeSqlx .= "          when date_format(now(),'%a') = 'Sat' then 'saba' ";
    $strCadeSqlx .= "       end NombDiax";
    $strCadeSqlx .= "  from t1";
    //--------------------------------------------------------
    // Se ejecuta el query para determinar el nombre del dia
    //--------------------------------------------------------
    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $mixRegiFech = $objDbResult->FetchArray();
    return $mixRegiFech['NombDiax'];
}

function contarFeriadosSabadosDomingos($dttFechMayo,$dttFechMeno) {
    $strCadeSqlx  = "select (fn_cantsados('$dttFechMeno','$dttFechMayo') ";
    $strCadeSqlx .= "       + fn_cantferiados('$dttFechMeno','$dttFechMayo')) as  feri_sado";
    $strCadeSqlx .= "  from t1 ";
    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $mixRegiFech = $objDbResult->FetchArray();
    return $mixRegiFech['feri_sado'];
}

function diasHabilesTranscurridos($dttFechMayo,$dttFechMeno) {
    return diasTranscurridos($dttFechMayo,$dttFechMeno) - contarFeriadosSabadosDomingos($dttFechMayo,$dttFechMeno);
}

/*
function diasHabilesTranscurridos($dttFechMayo,$dttFechMeno) {
    //-------------------------------------------------------------
    // Se cuentan los dias, excluyendo los sabados y los domingos
    //-------------------------------------------------------------
    $strCadeSqlx  = "select sum(case ";
    $strCadeSqlx .= "              when date_format(date_add(fech_meno,interval t500.id-1 day),'%a') ";
    $strCadeSqlx .= "              in ('Sat','Sun') then 0 else 1 ";
    $strCadeSqlx .= "           end) as DiasTran ";
    $strCadeSqlx .= "  from (select '".$dttFechMeno."' fech_meno, '".$dttFechMayo."' fech_mayo ";
    $strCadeSqlx .= "          from t1) x, ";
    $strCadeSqlx .= "       t500 ";
    $strCadeSqlx .= " where t500.id <= datediff(fech_mayo,fech_meno)+1 ";
    //      echo $strCadeSqlx."<br>\n";
    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $mixRegiFech = $objDbResult->FetchArray();
    //-------------------------------------------------------------------------
    // A la cantidad de dias habiles obtenida, se le restan los dias Feriados
    //-------------------------------------------------------------------------
    $intDiasHabi = $mixRegiFech['DiasTran'];
    $intDiasFeri = ContarDiasFeriados($dttFechMeno,$dttFechMayo);
    $intDifeDias = $intDiasHabi - $intDiasFeri;
    if ($intDifeDias > 0) {
        $intDifeDias = $intDifeDias - 1;
    }
    return $intDifeDias;
}
*/

/**
 * Esta rutina devuelve el registro cuya clave coincida con los 2 primeros valores
 * que entran como parametro/ Si el 3er parametro tiene el valor 'TODO' se devuelve
 * el registro completo como un objeto/  Otros valores posibles son 'Txt1'...'Txt5' ó
 * 'Val1'..'Val5', en cuyos casos, solo devuelve el valor de ese campo del registro.
 * El 4to parametro es el valor por defecto que devolvera la funcion en caso de no
 * encontrar ningun registro coincidente con la clave especificada.
 * Ej: $intCantDias = BuscarParametro('DiasActi','RepoAtra','Val1',60)
 * Busca un registro con la clave "DiasActi-RepoAtra' y devuelve el valor del campo "ParaVal1"
 * si no encuentra dicho registro, devuelve 60 por defecto.
 *
 * @param String $strIndiPara (Indice)
 * @param String $strCodiPara (Codigo)
 * @param String $strTipoDato (TODO/Txt1/Txt2/Txt3../Val1/Val2/Val3..)
 * @param unknown_type $strValoDefe (Valor por defecto de tipo no definido)
 * @return Objeto/String/Decimal (Dependiendo del campo que se solicite en $strTipoDato)
 */
function BuscarParametro($strIndiPara,$strCodiPara,$strTipoDato,$strValoDefe=-1) {
    $objParametro = Parametro::Load($strIndiPara,$strCodiPara);
    if ($objParametro) {
        if ($strTipoDato == 'TODO') {
            $strValoReto = $objParametro;
        } else {
            switch ($strTipoDato) {
                case 'Desc':
                    $strValoReto = $objParametro->DescPara;
                    break;
                case 'Txt1':
                    $strValoReto = $objParametro->ParaTxt1;
                    break;
                case 'Txt2':
                    $strValoReto = $objParametro->ParaTxt2;
                    break;
                case 'Txt3':
                    $strValoReto = $objParametro->ParaTxt3;
                    break;
                case 'Txt4':
                    $strValoReto = $objParametro->ParaTxt4;
                    break;
                case 'Txt5':
                    $strValoReto = $objParametro->ParaTxt5;
                    break;
                case 'Val1':
                    $strValoReto = $objParametro->ParaVal1;
                    break;
                case 'Val2':
                    $strValoReto = $objParametro->ParaVal2;
                    break;
                case 'Val3':
                    $strValoReto = $objParametro->ParaVal3;
                    break;
                case 'Val4':
                    $strValoReto = $objParametro->ParaVal4;
                    break;
                case 'Val5':
                    $strValoReto = $objParametro->ParaVal5;
                    break;
                default:
                    $strValoReto = $strValoDefe;
                    break;
            }
            if (strlen($strValoReto) == 0) {
                $strValoReto = $strValoDefe;
            }
        }
    } else {
        $strValoReto = $strValoDefe;
    }
    return $strValoReto;
}

function SumaRestaDiasAFecha($dttFechInic,$intCantDias,$strOperFech) {
    //---------------------------------------------------------------
    // Esta rutina Suma o Resta una cantidad X de dias a una fecha
    //---------------------------------------------------------------
    if ($strOperFech == '-') {
        $strCadeSqlx = 'select date_sub("'.$dttFechInic.'", interval '.$intCantDias.' day) as FechResu';
    } else {
        $strCadeSqlx = 'select date_add("'.$dttFechInic.'", interval '.$intCantDias.' day) as FechResu';
    }
    $strCadeSqlx .= '  from sistema ';
    $strCadeSqlx .= ' where 1 ';
    $strCadeSqlx .= ' limit 1 ';
    //   echo $strCadeSqlx;
    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $mixRegiFech = $objDbResult->FetchArray();
    $dttFechResu = $mixRegiFech['FechResu'];

    return $dttFechResu;
}

function DiasTranscurridos($dttFechFina,$dttFechInci) {
    $strCadeSqlx  = 'select datediff("'.$dttFechFina.'","'.$dttFechInci.'") as DiasTran';
    $strCadeSqlx .= '  from t1 ';
    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $mixRegiFech = $objDbResult->FetchArray();
    return $mixRegiFech['DiasTran'];
}

function DeterminarUsuario() {
    $_SERVER['ProcesoTraza'] = "AUDITORIA";
    t("==========================");
    t("Rutina: Determinar Usuario");
    //-------------------------------------------------------------------------
    // Esta rutina determina cual es el tipo de Usuario que esta conectado
    // y devuelve al punto de su invocacion datos de dicho Usuario
    //-------------------------------------------------------------------------
    $objUsuario = isset($_SESSION['User']) ? unserialize($_SESSION['User']) : unserialize($_SESSION['UserExt']);
    if ($objUsuario instanceof UsuarioConnect) {
        t("Es un Usuario Connect");
        //-------------------------------
        // Usuario del Sistema Connect
        //-------------------------------
        $objUsuaGene = Usuario::LoadByLogiUsua('connect');
        if ($objUsuaGene) {
            $intCodiUsua = $objUsuaGene->CodiUsua;
        } else {
            $intCodiUsua = 1;
        }
        $strLogiUsua = $objUsuario->LogiUsua;
    } else {
        if ($objUsuario instanceof Usuario) {
            t("Es un Usuario Interno del Sistema");
            //----------------------------------
            // Usuario Interno de la Empresa
            //----------------------------------
            $intCodiUsua = $objUsuario->CodiUsua;
            $strLogiUsua = $objUsuario->LogiUsua;
        } else {
            //----------------------------------
            // Se trata de un Chofer
            //----------------------------------
            $intCodiUsua = $objUsuario->CodiChof;
            $strLogiUsua = $objUsuario->Login;
        }
    }
    $intCodiSucu = $objUsuario->SucursalId;
    //   Traza('El Usuario es: '.$strLogiUsua.' asociado a la Sucursal: '.$strCodiEsta.' y el codigo de este usuario es: '.$intCodiUsua);
    //   unset($_SERVER['ProcesoTraza']);
    $arrDatoUsua = array();
    $arrDatoUsua['LogiUsua'] = $strLogiUsua;
    $arrDatoUsua['CodiUsua'] = $intCodiUsua;
    $arrDatoUsua['CodiEsta'] = $intCodiSucu;
    return $arrDatoUsua;
}


function GrabarCheckpointOptimizado($arrDatoCkpt) {
    t('=====================================');
    t('Entrando a GrabarCheckpointOptimizado');
    //---------------------------------------------------------------------------------------------
    // Esta rutina controla lo concerniente al ingresos de informacion de la tabla de checkpoints
    //---------------------------------------------------------------------------------------------
    $strNumePiez = $arrDatoCkpt['NumePiez'];
    $blnGuiaAnul = $arrDatoCkpt['GuiaAnul'];
    $intCodiCkpt = $arrDatoCkpt['CodiCkpt'];
    $strTextCkpt = $arrDatoCkpt['TextCkpt'];
    $intCodiRuta = isset($arrDatoCkpt['CodiRuta']) ? $arrDatoCkpt['CodiRuta'] : null;
    $intParaSucu = isset($arrDatoCkpt['CodiSucu']) ? $arrDatoCkpt['CodiSucu'] : '';
    $intNotiCkpt = isset($arrDatoCkpt['NotiCkpt']) ? $arrDatoCkpt['NotiCkpt'] : null;

    t('Voy a grabar un checkpoint en la pieza: '.$strNumePiez);

    $arrResuGrab = array();
    $arrResuGrab['TodoOkey'] = true;
    $arrResuGrab['MotiNook'] = '';
    //---------------------------
    // Validando tipo de Usuario
    //---------------------------
    $arrDatoUsua = DeterminarUsuario();
    $intCodiSucu = $arrDatoUsua['CodiEsta'];
    $intCodiUsua = $arrDatoUsua['CodiUsua'];
    t('El Usuario es: '.$intCodiUsua.' y esta en la Sucursal: '.$intCodiSucu);
    //------------------------------------------------------------------------------------------------------
    // Si en los parametros se especifica una Sucursal, esta se antepone a la Sucursal asociada al Usuario
    //------------------------------------------------------------------------------------------------------
    if (strlen($intParaSucu) > 0) {
        $intCodiSucu = $intParaSucu;
    }

    $objPiezProc = GuiaPiezas::LoadByIdPieza($strNumePiez);
    if ($objPiezProc) {
        t('Encontre la pieza');
        if ($blnGuiaAnul) {
            t('La guia asociada al pieza fue eliminada...');
            $arrResuGrab['MotiNook'] = "Guia Eliminada. No Adtmite Incidencias";
            $arrResuGrab['TodoOkey'] = false;
            return $arrResuGrab;
        }
        if ($objPiezProc->tieneCheckpointDeCierre()) {
            t('La pieza tiene checkpoint de cierre');
            $arrResuGrab['MotiNook'] = "La Pieza ya cerro su ciclo. No Adtmite Incidencias";
            $arrResuGrab['TodoOkey'] = false;
            return $arrResuGrab;
        }
        $dttFechDhoy = new QDateTime(QDateTime::Now());
        $dttFechDhoy = $dttFechDhoy->__toString("YYYY-MM-DD");
        if (isset($_SESSION['ValiRepe'])) {
            $blnValiRepe = $_SESSION['ValiRepe'];
            if ($blnValiRepe) {
                //t('Validando checkpoint repetido');
                $arrUltiCkpt = $objPiezProc->ultimoCheckpointTodo();
                $intUltiCkpt = $arrUltiCkpt['checkpoint_id'];
                $intUltiSucu = $arrUltiCkpt['sucursal_id'];
                $dttUltiFech = $arrUltiCkpt['fecha'];
                if (($intUltiCkpt == $intCodiCkpt) &&
                    ($intUltiSucu == $intCodiSucu) &&
                    ($dttUltiFech == $dttFechDhoy)) {
                    t('Checkpoint repetido');
                    $arrResuGrab['MotiNook'] = "Ckpt Repetido";
                    $arrResuGrab['TodoOkey'] = false;
                    return $arrResuGrab;
                }
            }
        }
        t('El checkpoint se puede procesar');
        $objPiezCkpt = new PiezaCheckpoints();
        try {
            $objPiezCkpt->PiezaId      = $objPiezProc->Id;
            $objPiezCkpt->CheckpointId = $intCodiCkpt;
            $objPiezCkpt->SucursalId   = $intCodiSucu;
            $objPiezCkpt->Fecha        = new QDateTime(QDateTime::Now());
            $objPiezCkpt->Hora         = date('H:i');
            $objPiezCkpt->Comentario   = strtoupper($strTextCkpt);
            $objPiezCkpt->RutaId       = !is_null($intCodiRuta) ? $intCodiRuta : null;
            $objPiezCkpt->CreatedBy    = $intCodiUsua;
            $objPiezCkpt->Save();
        } catch (Exception $e) {
            t('Error grabando checkpoint a la pieza: '.$objPiezProc->Id.': '.$e->getMessage());
        }

        t('Ckpt grabado en la Pieza, el Id es: '.$objPiezCkpt->Id);

        if ($intNotiCkpt) {
            t('El checkpoint requiere ser notificado');
            $objNotificacion = new Notificacion();
            $objNotificacion->GuiaId        = $objPiezProc->GuiaId;
            $objNotificacion->CheckpointId  = $intCodiCkpt;
            $objNotificacion->Notificado    = SinoType::NO;
            $objNotificacion->Save();
            t('Notificacion creada');
        }
    } else {
        $arrResuGrab['TodoOkey'] = false;
        $arrResuGrab['MotiNook'] = 'La pieza '.$strNumePiez.', no existe';
        t('La pieza '.$strNumePiez.' no existe en la base de datos');
    }

    return $arrResuGrab;
}

function GrabarCheckpointContenedorNew($arrDatoCkpt) {
    /**
     * @var $objUsuario Usuario
     */
    //--------------------------------------------------------
    // Esta rutina controla lo concerniente al ingresos de
    // informacion de la tabla de checkpoints del contenedor
    //--------------------------------------------------------
    $arrResuGrab = array();
    $arrResuGrab['TodoOkey'] = true;
    $arrResuGrab['MotiNook'] = '';
    $objUsuario = unserialize($_SESSION['User']);

    $objContCkpt               = new ContainerCkpt();
    $objContCkpt->ContainerId  = $arrDatoCkpt['NumeCont'];
    $objContCkpt->SucursalId   = $objUsuario->SucursalId;
    $objContCkpt->CheckpointId = $arrDatoCkpt['CodiCkpt'];
    $objContCkpt->Fecha        = new QDateTime(QDateTime::Now);
    $objContCkpt->Hora         = date('H:i');
    $objContCkpt->Observacion  = strtoupper($arrDatoCkpt['TextObse']);
    $objContCkpt->UsuarioId    = $objUsuario->CodiUsua;
    $objContCkpt->Save();

    return $arrResuGrab;
}

function GrabarCheckpointManifiesto($arrDatoCkpt) {
    /**
     * @var $objUsuario Usuario
     */
    //--------------------------------------------------------
    // Esta rutina controla lo concerniente al ingresos de
    // informacion de la tabla de checkpoints del contenedor
    //--------------------------------------------------------
    $arrResuGrab = array();
    $arrResuGrab['TodoOkey'] = true;
    $arrResuGrab['MotiNook'] = '';
    $arrResuGrab['CkptManu'] = null;
    $objUsuario = unserialize($_SESSION['User']);

    /*
    $dttFechDhoy = new QDateTime(QDateTime::Now());
    $dttFechDhoy = $dttFechDhoy->__toString("YYYY-MM-DD");
    if (isset($_SESSION['ValiRepe'])) {
        $blnValiRepe = $_SESSION['ValiRepe'];
        if ($blnValiRepe) {
            t('Validando checkpoint repetido en el Manifiesto');
            $intCodiCkpt = $arrDatoCkpt['CodiCkpt'];
            $intCodiSucu = $objUsuario->SucursalId;
            $objManiCkpt = NotaEntrega::Load($arrDatoCkpt['NumeCont']);
            $objUltiCkpt = $objManiCkpt->ultimoCheckpoint();
            if ($objUltiCkpt instanceof NotaEntregaCkpt) {
                $intUltiCkpt = $objUltiCkpt->CheckpointId;
                $intUltiSucu = $objUltiCkpt->SucursalId;
                $dttUltiFech = $objUltiCkpt->Fecha;
                if (($intUltiCkpt == $intCodiCkpt) &&
                    ($intUltiSucu == $intCodiSucu) &&
                    ($dttUltiFech == $dttFechDhoy)) {
                    t('Checkpoint de Manifiesto repetido');
                    $arrResuGrab['MotiNook'] = "Ckpt Repetido";
                    $arrResuGrab['TodoOkey'] = false;
                    return $arrResuGrab;
                }
            }
        }
    }
    */

    try {
        $objContCkpt               = new NotaEntregaCkpt();
        $objContCkpt->ContainerId  = $arrDatoCkpt['NumeCont'];
        $objContCkpt->SucursalId   = $objUsuario->SucursalId;
        $objContCkpt->CheckpointId = $arrDatoCkpt['CodiCkpt'];
        $objContCkpt->Fecha        = new QDateTime(QDateTime::Now);
        $objContCkpt->Hora         = date('H:i');
        $objContCkpt->Observacion  = strtoupper($arrDatoCkpt['TextObse']);
        $objContCkpt->UsuarioId    = $objUsuario->CodiUsua;
        $objContCkpt->Save();
        $arrResuGrab['CkptMani']   = $objContCkpt;
    } catch (Exception $e) {
        $arrResuGrab['TodoOkey'] = false;
        $arrResuGrab['MotiNook'] = $e->getMessage();
    }

    return $arrResuGrab;
}

function GrabarCheckpointContenedor($arrDatoCkpt) {
    /**
     * @var $objUsuario Usuario
     */
    //--------------------------------------------------------
    // Esta rutina controla lo concerniente al ingresos de
    // informacion de la tabla de checkpoints del contenedor
    //--------------------------------------------------------
    $arrResuGrab = array();
    $arrResuGrab['TodoOkey'] = true;
    $arrResuGrab['MotiNook'] = '';
    $objUsuario = unserialize($_SESSION['User']);

    $objContCkpt              = new ContenedorCkpt();
    $objContCkpt->Valija      = $arrDatoCkpt['NumeCont'];
    $objContCkpt->Sucursal    = $objUsuario->SucursalId;
    $objContCkpt->Checkpoint  = $arrDatoCkpt['CodiCkpt'];
    $objContCkpt->Fecha       = new QDateTime(QDateTime::Now);
    $objContCkpt->Hora        = date('H:i:s');
    $objContCkpt->Observacion = strtoupper($arrDatoCkpt['TextObse']);
    $objContCkpt->Usuario     = $objUsuario->CodiUsua;
    $objContCkpt->Save();

    return $arrResuGrab;
}

/**
 * Esta rutina valida y graba en la base de datos la informacion del Destinatario
 * Frecuente asociado a un Cliente
 *
 * @param Guia $objGuia
 * @param integer $intCodiFrec
 */
function GrabarDestinatarioFrecuente($objGuia,$intCodiFrec) {
    //-----------------------------------------------------------------
    // Si el Usuario escogio un Destinatario Frecuente, se actualiza
    // la informacion de dicho registro
    //-----------------------------------------------------------------
    if ($intCodiFrec) {
        $objDestFrec = DestinatarioFrecuente::Load($intCodiFrec);
    } else {
        //-------------------------------------------------------------------------------
        // Si no hay un Destinatario Frecuente ya elegido, se procede a verificar la
        // existencia de algun Destinatario con el mismo nombre.
        //-------------------------------------------------------------------------------
        $objClausula   = QQ::Clause();
        $objClausula[] = QQ::Equal(QQN::DestinatarioFrecuente()->Nombre,$objGuia->NombDest);
        $objClausula[] = QQ::Equal(QQN::DestinatarioFrecuente()->ClienteId,$objGuia->CodiClie);
        $arrDestFrec = DestinatarioFrecuente::QueryArray(QQ::AndCondition($objClausula));
        if (count($arrDestFrec) > 0) {
            //--------------------------------------------------
            // Si existe alguno, actualizo el primero de ellos
            //--------------------------------------------------
            $objDestFrec = $arrDestFrec[0];
        } else {
            //-------------------------------------------------------------------
            // Si no existe ninguno, creo un registro nuevo en la base de datos
            //-------------------------------------------------------------------
            $objDestFrec = new DestinatarioFrecuente();
        }
    }
    $objDestFrec->ClienteId = $objGuia->CodiClie;
    $objDestFrec->Nombre    = $objGuia->NombDest;
    $objDestFrec->Direccion = $objGuia->DireDest;
    $objDestFrec->Telefono  = $objGuia->TeleDest;
    $objDestFrec->DestinoId = $objGuia->EstaDest;
    $objDestFrec->CedulaRif = $objGuia->CedulaRif;
    $objDestFrec->Save();
}

function EnviarSMS($arrDatoSmsx) {

    $baseurl = 'http://smsgw.totaltexto.net.ve:1401/send';

    $params = '?username=liberty01';
    $params.= '&password=YDAH94XT';
    $params.= '&to='.urlencode(str_replace(substr($arrDatoSmsx['TlfnClie'], 0,1), "58", $arrDatoSmsx['TlfnClie']));
    $params.= '&content='.urlencode($arrDatoSmsx['TextSmsx']);

    $response = file_get_contents($baseurl.$params);

    echo "Respuesta: ".$response;

}

function comprobar_email($email){
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 2) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
        if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
            //miro si tiene caracter .
            if (substr_count($email,".")>= 1){
                //obtengo la terminacion del dominio
                $term_dom = substr(strrchr ($email, '.'),1);
                //compruebo que la terminación del dominio sea correcta
                if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                    //compruebo que lo de antes del dominio sea correcto
                    $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                    $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                    if ($caracter_ult != "@" && $caracter_ult != "."){
                        $mail_correcto = 1;
                    }
                }
            }
        }
    }
    if ($mail_correcto)
        return 1;
    else
        return 0;
}

function TipoDocumento($intTipoDocu) {
    switch ($intTipoDocu) {
        case 1: return 'EFECTIVO';
        case 2: return 'CHEQUE';
        case 3: return 'DEPOSITO';
        case 4: return 'PUNTO DE VENTA';
        default:
            throw new QCallerException(sprintf('Invalid intTipoDocumentoTypeId: %s', $intTipoDocu));
    }
}
?>