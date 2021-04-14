<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/barcodelib.php');
//require_once('/appl/lib/fpdf153/fpdf.php');

$intIdxxFact = null;
if (isset($_GET['intIdxxFact'])) {
	$intIdxxFact = $_GET['intIdxxFact'];
} else {
	echo "No se especifico la Factura<br>\n";
	return;
}

function Bloque($pdf, Facturas $objFactura, MasterCliente $objCliente, $objUsuario) {

    //-----------------------------
    // Limite Izquierdo y Derecho
	//-----------------------------
	$li = 10;
	$ld = 205;

    //---------------------------------
    // Logo y Direccion de la Empresa
	//---------------------------------

	//$pdf->Image(__DOCROOT__.__IMAGE_ASSETS__."/LogoEmpresa.jpg",$intX,$intY,40,22);

	$x = 165;
	$y = 10;
    $pdf->SetFont('Times','B',9);
	$pdf->SetXY($x,$y);
    $pdf->Cell(30,5,'1335 NW 98TH CT UNIT 2',0);
    $pdf->SetXY($x+12,$y+4);
    $pdf->Cell(30,5,'DORAL, FL 33172',0);
    $pdf->SetXY($x+20,$y+8);
    $pdf->Cell(30,5,'768 452 9090',0);

    //----------------------------------------//
    // *** Recuadros de la parte superior *** //
	//----------------------------------------//
    $x = $li;
    $y = 27;
    //----------------------------------
    // Se dibuja el recuadro izquierdo
    //----------------------------------
    $pdf->Line($x,$y,$x+80,$y);
    $pdf->Line($x,$y+5,$x+80,$y+5);
    $pdf->Line($x,$y+10,$x+80,$y+10);
    $pdf->Line($x,$y+25,$x+80,$y+25);

    $pdf->Line($x,$y,$x,$y+25);
    $pdf->Line($x+80,$y,$x+80,$y+25);
    //-------------------------------
    // Texto del recuadro izquierdo
	//-------------------------------
    $pdf->SetFont('Times','B',9);
    $pdf->SetXY($x,$y);
    $pdf->Cell(30,5,'Bill To:',0);
    $pdf->SetXY($x,$y+5);
    $pdf->Cell(30,5,$objFactura->ClienteCorp->NombClie,0);
    $pdf->SetXY($x,$y+10);
    $strDireCli1 = substr($objFactura->DireccionFiscal,0,40);
    $pdf->Cell(30,5,$strDireCli1,0);
    $pdf->SetXY($x,$y+14);
    $strDireCli2 = substr($objFactura->DireccionFiscal,40,40);
    $pdf->Cell(30,5,$strDireCli2,0);
    $pdf->SetXY($x,$y+18);
    $strDireCli3 = substr($objFactura->DireccionFiscal,80,40);
    $pdf->Cell(30,5,$strDireCli3,0);

    //----------------------------------
    // Se dibuja el recuadro derecho
    //----------------------------------
	$x = 110;
    $pdf->Line($x,$y,$ld,$y);
    $pdf->Line($x,$y+5,$ld,$y+5);
    $pdf->Line($x,$y+10,$ld,$y+10);

    $pdf->Line($x,$y,$x,$y+10);
    $pdf->Line($ld,$y,$ld,$y+10);
    //-------------------------------
    // Texto del recuadro derecho
    //-------------------------------

    $pdf->SetFont('Times','B',9);
    $pdf->SetXY($x,$y);
    $pdf->Cell(30,5,'INVOICE:',0);
    $pdf->SetXY($ld-18,$y);
    $pdf->Cell(30,5,$objFactura->Referencia,0);
    $pdf->SetXY($x,$y+5);
    $pdf->Cell(30,5,'Invoice Date:',0);
    $strFechFact = substr($objFactura->Fecha->__toString('DD/MM/YYYY'),0,40);
    $pdf->SetXY($ld-17,$y+5);
    $pdf->Cell(30,5,$strFechFact,0);

    //-----------------------------------------
    // Encabezado y lista de Notas de Entrega
	//-----------------------------------------
    $x = $li;
    $y = 60;
    //----------------------------------
    // Se dibuja el encabezado
    //----------------------------------
    $pdf->Line($x,$y,$ld,$y);
    $pdf->Line($x,$y+5,$ld,$y+5);

    $pdf->Line($x,$y,$x,$y+5);
    $pdf->Line($x+80,$y,$x+80,$y+5);
    $pdf->Line($x+105,$y,$x+105,$y+5);
    $pdf->Line($x+130,$y,$x+130,$y+5);
    $pdf->Line($ld,$y,$ld,$y+5);

    //-------------------------------
    // Lista de las nota de entrega
    //-------------------------------
    $salto = 5;
    foreach ($objFactura->GetNotaEntregaAsFacturaArray() as $objNotaEntr) {
        $pdf->SetXY($x,$y+$salto);
        $pdf->Cell(30,5,$objNotaEntr->Referencia,0);
        $salto += 5;
    }

    //--------------------
    // Pie de la Factura
	//--------------------

    //$pdf->Line();
	//$pdf->SetFont('Times','B',12);
	//$pdf->SetXY($intX+90,$intY+7);
	//$pdf->Cell(30,5,'Documento OFICIAL',0);
    //
	//$pdf->SetFont('Times','B',16);
	//$pdf->SetXY($intX+90,$intY+13);
	//$pdf->Cell(30,5,'N A C I O N A L',0);
    //
	//$intY += 26;
	//$pdf->SetFont('Times','',10);
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Remitente: '.$objFactura->NombRemi,0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	////		$pdf->Cell(30,5,'CI/RIF: '.$objCliente->NumeDrif,0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Direccion: '.substr($objFactura->DireRemi,0,20),0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,substr($objFactura->DireRemi,20,30),0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,substr($objFactura->DireRemi,50,30),0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Telefonos: '.$objFactura->TeleRemi,0);
    //
	//$intX += 90;
	//$intY -= 20;
    //
	//$pdf->SetFont('Times','',10);
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Origen: '.$objFactura->EstaOrig.'  Destino: '.$objFactura->EstaDest,0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Fecha: '.$objFactura->FechGuia->__toString("DD/MM/YYYY"),0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Piezas: '.$objFactura->CantPiez,0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Peso Kgs: '.$objFactura->PesoGuia,0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	////		$pdf->Cell(30,5,'Volumen: '.$objFactura->PesoVolumetrico,0);
    //
	//$intX -= 90;
	//$intY += 12;
    //
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Destinatario: ',0);
    //
	//$pdf->SetFont('Times','B',11);
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,$objFactura->NombDest,0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,"CI/RIF: ".$objFactura->CedulaRif,0);
    //
	//$pdf->SetFont('Times','',10);
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,substr($objFactura->DireDest,0,60),0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,substr($objFactura->DireDest,60,60),0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,substr($objFactura->DireDest,120,60),0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,substr($objFactura->DireDest,180,60),0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Telefonos: '.$objFactura->TeleDest,0);
    //
	//$pdf->SetFont('Times','B',10);
	//$intY += 4;
	//$pdf->SetXY($intX+45,$intY);
	//$pdf->Cell(30,5,'Guia #'.$objFactura->NumeGuia.' '.$objFactura->EstaOrig.' - '.$objFactura->EstaDest,0);
    //
	//$pdf->SetFont('Times','',9);
	//$intY += 4;
	//$intTamaText = strlen($objFactura->DescCont);
	//$intPosiCont = ((135 - $intTamaText)/2) - 5;
	//$pdf->SetXY($intX+$intPosiCont,$intY);
	//$pdf->Cell(30,5,$objFactura->DescCont,0);
    //
	//$pdf->SetFont('Times','',7);
	//$intY += 4;
	//$pdf->SetXY($intX+8,$intY);
	//$pdf->Cell(30,5,'Documento generado por el agente autorizado LIBERTY EXPRESS. Impreso por '.$objUsuario->__toString().' ['.date("Y-m-d h:i:s").']',0);
    //
	//$pdf->SetFont('Times','',9);
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Remitente',0);
    //
	//$intY += 8;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Firma:',0);
    //
	//$intY += 8;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Nombre:',0);
    //
	//$intY += 8;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Fecha/Hora:',0);
    //
	//$intX += 75;
	//$intY -= 24;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Destinatario',0);
    //
	//$intY += 8;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Firma:',0);
    //
	//$intY += 8;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Nombre:',0);
    //
	//$intY += 8;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Fecha/Hora:',0);
    //
	//$intX -= 75;
	//$intY += 8;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Servicio',0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Requiere envio de retorno:',0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Servicio Expreso:',0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Valor Declarado: '.$objFactura->ValorDeclarado,0);
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Precio del Servicio: ',0);
    //
	//$pdf->SetFont('Times','B',10);
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	////		$pdf->Cell(30,5,'Aereo Importacion US',0);
    //
	//$pdf->SetFont('Times','',9);
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Transporte Nacional',0);
	//$pdf->SetXY($intX+50,$intY);
	//$pdf->Cell(30,5,'Bs: ',0);
	//$pdf->SetXY($intX+58,$intY);
	//$pdf->Cell(12,5,$objFactura->MontoBase,0,0,'R');
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Monto del Seguro',0);
	//$pdf->SetXY($intX+50,$intY);
	//$pdf->Cell(30,5,'Bs: ',0);
	//$pdf->SetXY($intX+58,$intY);
	//$pdf->Cell(12,5,$objFactura->MontoSeguro,0,0,'R');
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Monto I.V.A.',0);
	//$pdf->SetXY($intX+50,$intY);
	//$pdf->Cell(30,5,'Bs: ',0);
	//$pdf->SetXY($intX+58,$intY);
	//$pdf->Cell(12,5,$objFactura->MontoIva,0,0,'R');
    //
	//$intY += 4;
	//$pdf->SetXY($intX,$intY);
	//$pdf->Cell(30,5,'Monto Total a Cancelar',0);
	//$pdf->SetXY($intX+50,$intY);
	//$pdf->Cell(30,5,'Bs: ',0);
	//$pdf->SetXY($intX+58,$intY);
	//$pdf->Cell(12,5,$objFactura->MontoTotal,0,0,'R');

	//$intY += 20;
	//
	//$pdf->Codabar($intX+25,$intY+8,$objFactura->NumeGuia,'A','A',1,10);
    //
	//$pdf->SetFont('Times','B',38);
	//$intY -= 40;
	//$pdf->SetXY($intX+90,$intY);
	//$pdf->Cell(30,5,TipoGuiaType::ToStringCorto($objFactura->TipoGuia),0);
    //
	//$pdf->SetFont('Times','B',42);
	//$intY +=16;
	//$pdf->SetXY($intX+90,$intY);
	//$pdf->Cell(30,5,$objFactura->EstaDest,0);
    //
	//if ($objFactura->EsRetornoDeOtraGuia()) {
	//	$pdf->SetFont('Times','B',42);
	//	$intY +=16;
	//	$pdf->SetXY($intX+90,$intY);
	//	$pdf->Cell(30,5,"RTR",0);
	//}
	

}

$objFactura = Facturas::Load($intIdxxFact);
$objCliente = $objFactura->ClienteCorp;
$objUsuario = unserialize($_SESSION['User']);

/* @var $objLogoEmpr Parametro */
/* @var $objDatoEmpr Parametro */
$objLogoEmpr = BuscarParametro('88888','logos','TODO',-1);
$objDatoEmpr = BuscarParametro('88888','datfisc','TODO',-1);
$strLogoEmpr = $objLogoEmpr->ParaTxt1;
$strNombEmpr = $objDatoEmpr->ParaTxt1;
$strDireEmpr = $objDatoEmpr->ParaTxt2;
$strTeleEmpr = $objDatoEmpr->ParaTxt4;
$strHabiPost = $objLogoEmpr->ParaTxt5;

$pdf = new PDF_Codabar('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
//-------------------------------------------
// Se imprimen los bloques de informacion
//-------------------------------------------
Bloque($pdf,$objFactura,$objCliente,$objUsuario);
//Bloque($pdf,142,4,$objFactura,$objCliente,$objUsuario);
//------------------------------------------------
// Se imprimen las lineas divisorias del formato
//------------------------------------------------
//$pdf->Line(140,4,140,210);
//$pdf->Line(5,132,270,132);
//$pdf->Line(5,197,270,197);
//$pdf->Line(80,102,80,197);
//$pdf->Line(217,102,217,197);
$pdf->Output();
?>
