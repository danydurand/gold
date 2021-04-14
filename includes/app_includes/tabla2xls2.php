<?php
//---------------------------------------------------------------------
// Programa      : tabla2xls2.php
// Elaborado por : Irán Anzola
// Fecha Elab.   : 05/07/2017
// Descripcion   : Este programa exporta los datos a formato Excel
//---------------------------------------------------------------------
session_start();
//-----------------------------------------------------
// Se especifica el tipo de archivo que sera generado
//-----------------------------------------------------
header("Content-type: application/octet-stream");
$nomb_repo = $_GET['nomb_repo'];
header("Content-Disposition: attachment; filename=".$nomb_repo.".xls");
header("Pragma: no-cache");
header("Expires: 0");
//----------------------------------------------------
// Se obtienen los datos de las variables de session
//----------------------------------------------------
$head = unserialize($_SESSION['Enca']);
//$just = unserialize($_SESSION['Just']);
//$anch = unserialize($_SESSION['Anch']);
$dato = unserialize($_SESSION['Dato']);
//------------------------------------------
// Se imprimen los titulos de las columnas
//------------------------------------------
echo "<body>";
echo "<table border='1'>";
echo "<tr>";
$intPosiColu = 0;
for ($intIndiVect = 0; $intIndiVect < count($head); $intIndiVect++) {
    echo '<th>';
    echo $head[$intIndiVect];
    echo "</th>";
}
echo "</tr>";
//-----------------------------------------------
// Se imprimen la lineas de detalle del reporte
//-----------------------------------------------
$nume_fila = 1;
for ($intIndiRegi = 0; $intIndiRegi < count($dato); $intIndiRegi++) {
    echo "<tr>";
    for ($intIndiVect = 0; $intIndiVect < count($head); $intIndiVect++) {
        echo "<td>";
        echo $dato[$intIndiRegi][$intIndiVect];
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</body>";
echo "</html>";