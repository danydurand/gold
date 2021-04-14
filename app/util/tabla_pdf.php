<?php
//----------------------------------------------------------------
// Programa       : tabla_pdf.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 07/12/16 06:48 PM
// Proyecto       : newliberty
// Descripcion    : Este programa exporta los datos a formato PDF
//----------------------------------------------------------------
session_start();
//--------------------------
// Se Cargan las Librerias
//--------------------------
$dbhost = 'srvlufemandb';
$dbuser = 'root';
$dbpasswd = 'hiroshima71';
$dbname ='liberty';
require_once('/appl/lib/db.php');
require_once('/appl/lib/repo_totales_pdflib.php');
require_once('/appl/lib/perf_sql.php');
//----------------------------------------------------------
// En la invocación al programa, se pasa por un Parámetro,
// el Nombre o Titulo del Reporte que se quiere a Generar.
//----------------------------------------------------------
$nomb_repo = $_GET['nomb_repo'];
if (isset($_GET['nomb_empr'])) {
    $nomb_repo .= " (".$_GET['nomb_empr'].")";
}
//-------------------------------------------
// Se Buscan Valores Asociados a la Empresa
//-------------------------------------------
$clau_sele = get_select('parametro','*','indi_para = "88888" and codi_para = "datfisc"');
$db->sql_query($clau_sele);
$regi_dato = $db->sql_fetchrow();
$nomb_empr = $regi_dato['para_txt1'];
$dire_fisc = $regi_dato['para_txt5'];
$clau_sele = get_select('parametro','*','indi_para = "88888" and codi_para = "logos"');
$db->sql_query($clau_sele);
$regi_dato = $db->sql_fetchrow();
$nomb_imag = "../../assets/images/LogoEmpresa.jpg";
//----------------------------------------------------------
// Obtengo los datos a imprimir de las variables de Sesión
//----------------------------------------------------------
$header = unserialize($_SESSION['Enca']);
$just = unserialize($_SESSION['Just']);
$ancho = unserialize($_SESSION['Anch']);
$dato = unserialize($_SESSION['Dato']);
//------------------------------------
// Determino la Posición de la Tabla
//------------------------------------
$suma_anch = 0;
foreach ($ancho as $anch_colu) {
    $suma_anch += $anch_colu;
}
$posi_vert = (200 - $suma_anch)/2;
$posi_vert = $posi_vert > 0 ? $posi_vert : 1;
$orie_pagi = $posi_vert <= 30 ? 'L' : 'P';
//echo 'La posicion vertical es: '.$posi_vert.'<br>';
//---------------------
// Se Crea el Reporte
//---------------------
$pdf=new PDF($orie_pagi,'mm','Letter');
$pdf->setVariables($header,$just,$ancho,$posi_vert,$suma_anch,$nomb_imag);
$pdf->setEmpresa($nomb_empr,$dire_fisc,$nomb_repo);
$pdf->SetTitle($nomb_repo);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->FancyTable($header,$dato,$ancho,$just);
$pdf->Output();
