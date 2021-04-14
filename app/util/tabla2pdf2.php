<?php
//---------------------------------------------------------------------
// Programa      : tabla2pdf.php
// Elaborado por : Irán Anzola
// Fecha Elab.   : 23/08/2017
// Descripcion   : Este programa exporta los datos a formato
//                 PDF
//---------------------------------------------------------------------
session_start();
//----------------------
// Cargo las Librerias
//----------------------
$dbhost   = 'localhost';
$dbuser   = 'root';
$dbpasswd = 'hiroshima71';
$dbname   = 'liberty';
require_once('/appl/lib/db.php');
require_once('/appl/lib/repo_totales_pdflib.php');
//require_once('/appl/lib/funciones.php');
require_once('/appl/lib/perf_sql.php');
//echo 2;
//-----------------------------------------------------------
// En la invocacion al programa, se pasa por parametro
// el nombre o titulo del reporte
//-----------------------------------------------------------
$nomb_repo = $_GET['nomb_repo'];
if (isset($_GET['nomb_empr'])) {
    $nomb_repo .= " (".$_GET['nomb_empr'].")";
}
//-------------------------------------------
// Busco valores relativos a la Empresa
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
//$nomb_imag = '';
//echo 3;
//------------------------------------------------------------
// Obtengo los datos a imprimir de las variables de Sesion
//------------------------------------------------------------
$header = unserialize($_SESSION['Enca']);
$just = unserialize($_SESSION['Just']);
$ancho = unserialize($_SESSION['Anch']);
$dato = unserialize($_SESSION['Dato']);
//echo 4;
//-------------------------------------
// Determino la posicion de la tabla
//-------------------------------------
$suma_anch = 0;
foreach ($ancho as $anch_colu) {
    $suma_anch += $anch_colu;
}
//echo 5;
//echo 'En total son: '.count($ancho).'<br>';
//echo 'La suma de los anchos es: '.$suma_anch.'<br>';
$posi_vert = (200 - $suma_anch)/2;
$posi_vert = $posi_vert > 0 ? $posi_vert : 1;
$orie_pagi = $posi_vert <= 30 ? 'L' : 'P';
//echo 'La posicion vertical es: '.$posi_vert.'<br>';
//-------------------------
// Creo el reporte
//-------------------------
//echo 6;
$pdf=new PDF($orie_pagi,'mm','Letter');
$pdf->setVariables($header,$just,$ancho,$posi_vert,$suma_anch,$nomb_imag);
$pdf->setEmpresa($nomb_empr,$dire_fisc,$nomb_repo);
$pdf->SetTitle($nomb_repo);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->FancyTable($header,$dato,$ancho,$just);
//echo 7;
$pdf->Output();
?>
