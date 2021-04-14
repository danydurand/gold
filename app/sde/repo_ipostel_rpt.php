<?php
//----------------------------------------------------------------------------------
// Programa      : repo_ipostel_rpt.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 28/06/2017
// Descripcion   : Este programa imprime el reporte de Ipostel tomando en cuenta
//                 el desglose de pesos segun los requerimiento del Gobierno
//----------------------------------------------------------------------------------
//------------------------------------------------------------------
// La variable de Sesion llamada 'CritImpr' contiene los valores
// que definen el conjunto de registros que debe salir en el
// Reporte
//------------------------------------------------------------------
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
$intCant0020 = 0;
$intCant0050 = 0;
$intCant0100 = 0;
$intCant0500 = 0;
$intCant1000 = 0;
$intCant1500 = 0;
$intCant2000 = 0;
//--------------------------------------------------------------
// Recorro la lista de registros, armando el vector de datos
// que requiere la rutina PDF
//--------------------------------------------------------------
$blnHayxDato = true;
$dblAcumPeso = 0;
$dblAcumFran = 0;
$dblAcumMont = 0;
$dblAcumSgro = 0;
//$arrRegiSele = Guia::QueryArray(QQ::AndCondition($objCondWher),QQ::Clause(QQ::OrderBy(QQN::Guia()->CodiClieObject->CodigoInterno,QQN::Guia()->FechGuia)));
$objUser = unserialize($_SESSION['User']);
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strNombArch = __DOCROOT__.__SIST__.'/ipostel_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrDato2PDF = array();
$arrLineArch = array('Codigo','Remitente','Destinatario','Guia No.','Fecha','Peso','F.Postal','Monto Bs','Tipo','ORI-DES');
//----------------------------------------------------------------------
// El vector de encabezados, se lleva al archivo plano
//----------------------------------------------------------------------
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");
//--------------------------------------------------------
// Selecciono los registros que satisfagan la condicion
//--------------------------------------------------------
$strCadeSqlx = "select guia.*, master_cliente.*
                  from guia, master_cliente 
                 where guia.codi_clie = master_cliente.codi_clie
                   and guia.fech_guia between '".$dttFechInic."' and '".$dttFechFina."' 
                   and guia.monto_franqueo > 0 
                   and master_cliente.codigo_interno not in ('IMP01','CCS03') ";
if (isset($_SESSION['SucuDest'])) {
    $strCadeSqlx = " guia.esta_dest = '".$_SESSION['SucuDest']."'";
}
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
        substr($mixRegistro['nomb_remi'],0,23),
        $mixRegistro['nume_guia'],
        $mixRegistro['fech_guia'],
        str_replace(".",",",$mixRegistro['peso_guia']),
        str_replace(".",",",$mixRegistro['monto_franqueo']),
        $decMontParc,
        TipoGuiaType::ToStringCorto($mixRegistro['tipo_guia']),
        $mixRegistro['esta_orig']."-".$mixRegistro['esta_dest']);

    $dblAcumPeso = $dblAcumPeso + $mixRegistro['peso_guia'];
    $dblAcumFran = $dblAcumFran + $mixRegistro['monto_franqueo'];
    $dblAcumMont = $dblAcumMont + ($mixRegistro['monto_base']+$mixRegistro['monto_iva']);
    //---------------------------
    // Estadistica por gramos
    //---------------------------
    switch ($mixRegistro['peso_guia']) {
        case ($mixRegistro['peso_guia'] >= 0.001 and $mixRegistro['peso_guia'] <= 0.020):
            $intCant0020 += 1;
            break;
        case ($mixRegistro['peso_guia'] >= 0.021 and $mixRegistro['peso_guia'] <= 0.050):
            $intCant0050 += 1;
            break;
        case ($mixRegistro['peso_guia'] >= 0.051 and $mixRegistro['peso_guia'] <= 0.100):
            $intCant0100 += 1;
            break;
        case ($mixRegistro['peso_guia'] >= 0.101 and $mixRegistro['peso_guia'] <= 0.500):
            $intCant0500 += 1;
            break;
        case ($mixRegistro['peso_guia'] >= 0.501 and $mixRegistro['peso_guia'] <= 1.000):
            $intCant1000 += 1;
            break;
        case ($mixRegistro['peso_guia'] >= 1.001 and $mixRegistro['peso_guia'] <= 1.500):
            $intCant1500 += 1;
            break;
        case ($mixRegistro['peso_guia'] >= 1.501 and $mixRegistro['peso_guia'] <= 2.000):
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

$arrLineArch = array('','','Desglose por Gramos','0.020','0.050','0.100','0.500','1.000','1.500','2.000','');
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");

$arrLineArch = array('','','Cantidades',$intCant0020,$intCant0050,$intCant0100,$intCant0500,$intCant1000,$intCant1500,$intCant2000,'');
$strCadeAudi = implode(';',$arrLineArch);
fputs($mixManeArch,$strCadeAudi.";\n");

if ($intCantRegi > 0) {
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo "<h1>No hay Datos</h1>";
}

/*
if (isset($arrDato2PDF)) {
$arrDato2PDF[] = array('','','','','',round($dblAcumPeso,2),round($dblAcumFran,2),round($dblAcumMont,2),'','','');
$arrDato2PDF[] = array('','','Monto Flete + Franqueo Postal','','','','',round($dblAcumFran+$dblAcumMont,2),'','','','','');
//----------------------------------------------------------------------------------------------------------
// La Planilla de Ipostel debe tener ademas un conteo de piezas por gramos, ya que el Franqueo de Ipostel
// se paga al fisco en funcion de los gramos que pese el envio
//----------------------------------------------------------------------------------------------------------
$arrDato2PDF[] = array('','','','','','','','','','','');
$arrDato2PDF[] = array('','','Desglose por Gramos','0.020','0.050','0.100','0.500','1.000','1.500','2.000','');
$arrDato2PDF[] = array('','','Cantidades',$intCant0020,$intCant0050,$intCant0100,$intCant0500,$intCant1000,$intCant1500,$intCant2000,'');
}

if (isset($arrDato2PDF)) {
$arrAnch2PDF = array(20,60,60,20,20,18,20,25,15,25);
$arrJust2PDF = array('C','L','L','C','C','R','R','R','C','C');
} else {
$blnHayxDato = false;
}
if ($blnHayxDato) {
$_SESSION['Dato'] = serialize($arrDato2PDF);
$_SESSION['Enca'] = serialize($arrEnca2PDF);
$_SESSION['Anch'] = serialize($arrAnch2PDF);
$_SESSION['Just'] = serialize($arrJust2PDF);
QApplication::Redirect('../util/includes/tabla2xls2.php?nomb_repo='.$strTituRepo);
} else {
echo "<h1>No hay Datos</h1>";
}
*/