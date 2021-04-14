<?php
//----------------------------------------------------------------------------------
// Programa      : repo_ipostel_new.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 28/06/2017
// Descripcion   : Este programa imprime el reporte de Ipostel tomando en cuenta
//                 el nuevo desglose de pesos segun los requerimiento del Gobierno
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
//-----------------------------------------------------------------------------------------------------
// La variable de Sesion llamada 'Criterio' contiene los valores que definen el conjunto de registros
// que debe salir en el Reporte
//-----------------------------------------------------------------------------------------------------
$objCondWher = unserialize($_SESSION['Criterio']);
$strTituRepo = 'Ipostel';
if (isset($_SESSION['FechInic']) && isset($_SESSION['FechFina'])) {
    $strTituRepo .= '_'.$_SESSION['FechInic'].'_'.$_SESSION['FechFina'];
    $dttFechInic = $_SESSION['InicForm'];
    $dttFechFina = $_SESSION['FinaForm'];
}
//------------------------------------------
// Variables acumuladoras para los gramos
//------------------------------------------
$intCant0500 = 0;
$intCant1000 = 0;
$intCant2000 = 0;
//---------------------------------------------------------------------------------------
// Recorro la lista de registros, armando el vector de datos que requiere la rutina PDF
//---------------------------------------------------------------------------------------
$blnHayxDato = true;
$dblAcumPeso = 0;
$dblAcumFran = 0;
$dblAcumMont = 0;
$dblAcumSgro = 0;
$objUser = unserialize($_SESSION['User']);
//--------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//--------------------------------------------------------
$strNombArch = __TEMP__.'/ipostel_new_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrDato2PDF = array();
$arrLineArch = array('Codigo','Remitente','Destinatario','Guia No.','Fecha','Peso','F.Postal','Monto Bs','Tipo','ORI-DES');
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");
//--------------------------------------------------------
// Selecciono los registros que satisfagan la condicion
//--------------------------------------------------------
$strCadeSqlx  = "select guia.*, master_cliente.* ";
$strCadeSqlx .= "  from guia inner join master_cliente ";
$strCadeSqlx .= "    on guia.codi_clie = master_cliente.codi_clie ";
$strCadeSqlx .= " where guia.fech_guia between '".$dttFechInic."' and '".$dttFechFina."' ";
$strCadeSqlx .= "   and guia.monto_franqueo > 0 ";
$strCadeSqlx .= "   and master_cliente.codigo_interno not in ('IMP01','CCS03') ";
if (isset($_SESSION['SucuDest'])) {
    $strCadeSqlx .= " guia.esta_dest = '".$_SESSION['SucuDest']."'";
}
$strCadeSqlx .= " order by guia.nume_guia ";
$objDatabase = Guia::GetDatabase();
$objDbResult = $objDatabase->Query($strCadeSqlx);
$intCantRegi = 0;
while ($mixRegistro = $objDbResult->FetchArray()) {
    $decMontParc = round($mixRegistro['monto_base'] + $mixRegistro['monto_franqueo'] + $mixRegistro['monto_iva'],2);
    $decMontParc = str_replace(",","",$decMontParc);
    $decMontParc = str_replace(".",",",$decMontParc);
    $arrLineArch = array(
        $mixRegistro['codigo_interno'],
        substr($mixRegistro['nomb_remi'],0,23),
        substr($mixRegistro['nomb_dest'],0,23),
        $mixRegistro['nume_guia'],
        $mixRegistro['fech_guia'],
        str_replace(".",",",$mixRegistro['peso_guia']),
        str_replace(".",",",$mixRegistro['monto_franqueo']),
        $decMontParc,
        TipoGuiaType::ToStringCorto($mixRegistro['tipo_guia']),
        $mixRegistro['esta_orig']."-".$mixRegistro['esta_dest']
    );
    $dblAcumPeso = $dblAcumPeso + $mixRegistro['peso_guia'];
    $dblAcumFran = $dblAcumFran + $mixRegistro['monto_franqueo'];
    $dblAcumMont = $dblAcumMont + ($mixRegistro['monto_base']+$mixRegistro['monto_iva']);
    //---------------------------
    // Estadistica por gramos
    //---------------------------
    switch ($mixRegistro['peso_guia']) {
        case ($mixRegistro['peso_guia'] >= 0.001 and $mixRegistro['peso_guia'] <= 0.500):
            $intCant0500 += 1;
            break;
        case ($mixRegistro['peso_guia'] >= 0.501 and $mixRegistro['peso_guia'] <= 1.000):
            $intCant1000 += 1;
            break;
        case ($mixRegistro['peso_guia'] >= 1.001 and $mixRegistro['peso_guia'] <= 2.000):
            $intCant2000 += 1;
            break;
        default:
            break;
    }
    $intCantRegi ++;
    //----------------------------------------------------------------------
    // El vector generado, se lleva al archivo plano
    //----------------------------------------------------------------------
    $strCadeAudi = implode(';',$arrLineArch);
    fputs($mixManeArch,$strCadeAudi.";\n");
}
//-----------------------------------
// Redondeo y Formateo de totales
//-----------------------------------
$dblAcumPeso = round($dblAcumPeso,2);
$dblAcumPeso = str_replace(",","",$dblAcumPeso);
$dblAcumPeso = str_replace(".",",",$dblAcumPeso);

$dblAcumFran = round($dblAcumFran,2);
$dblAcumFran = str_replace(",","",$dblAcumFran);
$dblAcumFran = str_replace(".",",",$dblAcumFran);

$dblAcumMont = round($dblAcumMont,2);
$dblAcumMont = str_replace(",","",$dblAcumMont);
$dblAcumMont = str_replace(".",",",$dblAcumMont);

$decFletFran = round($dblAcumFran+$dblAcumMont,2);
$decFletFran = str_replace(",","",$decFletFran);
$decFletFran = str_replace(".",",",$decFletFran);

$arrLineArch = array('','','','','',$dblAcumPeso,$dblAcumFran,$dblAcumMont,'','','');
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");

$arrLineArch = array('','','Monto Flete + Franqueo Postal','','','','',$decFletFran,'','','','','');
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");

$arrLineArch = array('','','','','','','','','','','');
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");

// $arrLineArch = array('','','Desglose por Gramos','0.020','0.050','0.100','0.500','1.000','1.500','2.000','');
$arrLineArch = array('','','Desglose por Gramos','','','','0.500','1.000','','2.000','');
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");

$arrLineArch = array('','','Cantidades','','','',$intCant0500,$intCant1000,'',$intCant2000,'');
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");

if ($intCantRegi > 0) {
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo "<h1>No hay Datos</h1>";
}