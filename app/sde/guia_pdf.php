<?php
//----------------------------------------------------------
// Programa       : guia_pdf.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 27/07/16 10:18 AM
// Proyecto       : newliberty
// Descripcion    : Programa que imprime en PDF una Guía
//----------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/barcodelib.php');

$blnTodoOkey = true;
if (isset($_GET['strNumeGuia'])) {
    $strNumeGuia = $_GET['strNumeGuia'];
} else {
    $blnTodoOkey = false;
    echo "No se especifico la Guia<br>\n";
}

if ($blnTodoOkey) {

    function Bloque($pdf,$intX,$intY,Guia $objGuia,$objCliente,$objUsuario) {

        $pdf->Image(__DOCROOT__.__SUBDIRECTORY__.__APP_IMAGE_ASSETS__."/LogoEmpresa.jpg",$intX,$intY,40,22);

        $pdf->SetFont('Times','B',16);
        $pdf->SetXY($intX+90,$intY+7);
        $pdf->Cell(30,5,'E X P R E S O',0);

        $pdf->SetFont('Times','B',16);
        $pdf->SetXY($intX+90,$intY+13);
        $pdf->Cell(30,5,'N A C I O N A L',0);

        $strNombRemi = $objGuia->NombRemi;

        $intY += 26;
        $pdf->SetFont('Times','B',10);
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Remitente: '.substr($strNombRemi,0,30),0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,substr($strNombRemi,30,40),0);

        $strDireRemi = $objGuia->DireRemi;

        $pdf->SetFont('Times','',10);
        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Direccion: '.substr($strDireRemi,0,30),0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,substr($objGuia->DireRemi,30,40),0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,substr($objGuia->DireRemi,70,40),0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Telefonos: '.$objGuia->TeleRemi,0);

        $intX += 90;
        $intY -= 20;

        $pdf->SetFont('Times','',10);
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Origen: '.$objGuia->EstaOrig.'  Destino: '.$objGuia->EstaDest,0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Fecha: '.$objGuia->FechGuia->__toString("DD/MM/YYYY"),0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Piezas: '.$objGuia->CantPiez,0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Peso Kgs: '.$objGuia->PesoGuia,0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);

        $intX -= 90;
        $intY += 12;

        $pdf->SetFont('Times','B',10);
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Destinatario: '.trim($objGuia->NombDest).' ('.$objGuia->CedulaDestinatario.')',0);

        $pdf->SetFont('Times','',10);
        $intY += 12;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,substr($objGuia->DireDest,0,65),0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,substr($objGuia->DireDest,65,65),0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,substr($objGuia->DireDest,130,65),0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Telefonos: '.$objGuia->TeleDest,0);

        $pdf->SetFont('Times','B',10);
        $intY += 8;
        $pdf->SetXY($intX+45,$intY);
        $pdf->Cell(30,5,'Guia #'.$objGuia->NumeGuia.' '.$objGuia->EstaOrig.' - '.$objGuia->EstaDest,0);

        $pdf->SetFont('Times','',8);
        $intY += 4;
        $intTamaText = strlen(substr($objGuia->DescCont,0,80));
        $intPosiCont = ((90 - $intTamaText)/2) - 5;
        $pdf->SetXY($intX+$intPosiCont,$intY);
        $pdf->Cell(30,5,substr($objGuia->DescCont,0,80),0);

        $pdf->SetFont('Times','',7);
        $intY += 4;
        $pdf->SetXY($intX+8,$intY);
        $pdf->Cell(30,5,'Documento generado por el agente autorizado LIBERTY EXPRESS. Impreso por '.$objUsuario->__toString().' ['.date("Y-m-d h:i:s").']',0);

        $pdf->SetFont('Times','',9);
        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Remitente',0);

        $intY += 8;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Firma:',0);

        $intY += 8;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Nombre:',0);

        $intY += 8;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Fecha/Hora:',0);

        $intX += 75;
        $intY -= 24;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Destinatario',0);

        $intY += 8;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Firma:',0);

        $intY += 8;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Nombre:',0);

        $intY += 8;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Fecha/Hora:',0);

        $intX -= 75;
        $intY += 8;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Servicio',0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Requiere envio de retorno:',0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Servicio Expreso:',0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Valor Declarado: '.$objGuia->ValorDeclarado,0);

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Precio del Servicio: ',0);

        $pdf->SetFont('Times','B',10);
        $intY += 4;
        $pdf->SetXY($intX,$intY);

        $pdf->SetFont('Times','',9);
        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Transporte Nacional: ',0);
        $pdf->SetXY($intX+50,$intY);
        $pdf->Cell(30,5,'Bs: ',0);
        $pdf->SetXY($intX+58,$intY);
        $pdf->Cell(12,5,$objGuia->MontoBase,0,0,'R');

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Descuento: ',0);
        $pdf->SetXY($intX+50,$intY);
        $pdf->Cell(30,5,'Bs: ',0);
        $pdf->SetXY($intX+58,$intY);
        $pdf->Cell(12,5,$objGuia->MontoDscto,0,0,'R');

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Seguro :',0);
        $pdf->SetXY($intX+50,$intY);
        $pdf->Cell(30,5,'Bs: ',0);
        $pdf->SetXY($intX+58,$intY);
        $pdf->Cell(12,5,$objGuia->MontoSeguro,0,0,'R');

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'I.V.A. :',0);
        $pdf->SetXY($intX+50,$intY);
        $pdf->Cell(30,5,'Bs: ',0);
        $pdf->SetXY($intX+58,$intY);
        $pdf->Cell(12,5,$objGuia->MontoIva,0,0,'R');

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Franqueo Postal :',0);
        $pdf->SetXY($intX+50,$intY);
        $pdf->Cell(30,5,'Bs: ',0);
        $pdf->SetXY($intX+58,$intY);
        $pdf->Cell(12,5,$objGuia->MontoFranqueo,0,0,'R');

        $intY += 4;
        $pdf->SetXY($intX,$intY);
        $pdf->Cell(30,5,'Total a Pagar :',0);
        $pdf->SetXY($intX+50,$intY);
        $pdf->Cell(30,5,'Bs: ',0);
        $pdf->SetXY($intX+58,$intY);
        $pdf->Cell(12,5,$objGuia->MontoTotal,0,0,'R');

        $pdf->Codabar($intX+25,$intY+25,$objGuia->NumeGuia,'A','A',0.5,11);

        $pdf->SetFont('Times','B',40);
        $intY -= 25;
        $pdf->SetXY($intX+90,$intY);
        $pdf->Cell(30,5,TipoGuiaType::ToStringCorto($objGuia->TipoGuia),0);

        $pdf->SetFont('Times','B',40);
        $intY +=16;
        $pdf->SetXY($intX+90,$intY);
        $pdf->Cell(30,5,$objGuia->EstaDest,0);

        $pdf->SetFont('Times','B',40);
        $intY +=16;
        $pdf->SetXY($intX+90,$intY);
        $pdf->Cell(30,5,$objGuia->ReceptoriaDestino,0);
    }


    $objGuia = Guia::Load($strNumeGuia);
    $objCliente = MasterCliente::Load($objGuia->CodiClie);
    $objUsuario = unserialize($_SESSION['User']);

    $objLogoEmpr = BuscarParametro('88888','logos','TODO',-1);
    $objDatoEmpr = BuscarParametro('88888','datfisc','TODO',-1);
    $strLogoEmpr = $objLogoEmpr->ParaTxt1;
    $strNombEmpr = $objDatoEmpr->ParaTxt1;
    $strDireEmpr = $objDatoEmpr->ParaTxt2;
    $strTeleEmpr = $objDatoEmpr->ParaTxt4;
    $strHabiPost = $objLogoEmpr->ParaTxt5;

    $pdf = new PDF_Codabar('L','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    //-------------------------------------------
    // Se imprimen los bloques de informacion
    //-------------------------------------------
    Bloque($pdf,5,4,$objGuia,$objCliente,$objUsuario);
    Bloque($pdf,142,4,$objGuia,$objCliente,$objUsuario);
    //------------------------------------------------
    // Se imprimen las lineas divisorias del formato
    //------------------------------------------------
    $pdf->Line(140,4,140,210);
    $pdf->Line(5,132,270,132);
    $pdf->Line(5,197,270,197);
    $pdf->Line(80,102,80,197);
    $pdf->Line(217,102,217,197);
    $pdf->Output();

}