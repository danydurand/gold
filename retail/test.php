<?php
require_once('qcubed.inc.php');

$_SESSION['User'] = serialize(Usuario::LoadByLogiUsua('ddurand'));



use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();


// Buscando Tarifas Vigentes de Exportacion

//$objExpoMari = Productos::LoadByCodigo('EXA');
//$strFechGuia = date('Y-m-d');
//
//echo 'Producto: '.$objExpoMari->Codigo;
//echo "<br>";
//echo 'Fecha: '.$strFechGuia;
//echo "<br>";
//echo "<br>";
//
//$arrTariProd = TarifaExp::TarifaVigente($objExpoMari->Id,$strFechGuia);
//$decMontTari = $arrTariProd['monto'];
//$decPesoMini = $arrTariProd['minimo'];
//
//echo "El monto de la tarifa es: ".$decMontTari;
//echo "<br>";
//echo "El minimo es: ".$decPesoMini;


// Validando fechas

//$calFechTest = new QDateTime('12/05/2021');
//echo $calFechTest->__toString("DD/MM/YYYY");
//echo "<br>";
//echo $calFechTest->__toString("YYYY-MM-DD");

