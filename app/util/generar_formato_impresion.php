<?php
//-------------------------------------------------------------------------------------------------------
// Programa      : generar_formato_impresion.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 29/09/2021
// Descripcion   : Este programa corre en 2do plano, generando el formato de impresion de la guia
//-------------------------------------------------------------------------------------------------------
$strNombHost = gethostname();
if ($strNombHost == 'umar') {
    $_SERVER['SERVER_NAME'] = 'goldsist.com';
} else {
    $_SERVER['SERVER_NAME'] = 'gold.dev.com';
}
require_once('qcubed.inc.php');

$strFechHora = date('Y-m-d H:i');
echo "\n===============================================\n";
echo "Corriendo la generacion de formatos: $strFechHora\n";

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

//---------------------------------------------------------------------------------
// En la tabla guia_imprimir residen las guías cuyo formatos deben ser generados
//---------------------------------------------------------------------------------
$objClauWher = QQ::Equal(QQN::GuiaImprimir()->IsImpresa,0);
$arrGuiaImpr = GuiaImprimir::QueryArray(QQ::AndCondition($objClauWher));
echo "Hay: ".count($arrGuiaImpr)." guias por procesar...\n";
foreach ($arrGuiaImpr as $objGuiaImpr) {
    $strArchGuia = $objGuiaImpr->Guia->__printName();
    echo "Procesando los formatos de la Guia: $strArchGuia\n";

    $intIdxxProc = getmypid();
    $objPiezPara = new Parametros();
    $objPiezPara->Indice = 'PiezPara';
    $objPiezPara->Codigo = $intIdxxProc;
    $objPiezPara->Descripcion = 'Pieza a Imprimir';
    $objPiezPara->Save();

    echo "Chequear Parametro: PiezPara-$intIdxxProc\n";

    $arrArchGene = [];
    $arrPiezGuia = $objGuiaImpr->Guia->GetGuiaPiezasAsGuiaArray();
    foreach ($arrPiezGuia as $objPiezGuia) {
        echo "Procesando: ".$objPiezGuia->IdPieza."\n";

        $objPiezPara->Valor1 = $objPiezGuia->Id;
        $objPiezPara->Save();

        $arrArchGene[] = ImprimirUna($objPiezGuia);

    }

    $objPiezPara->Delete();

    $strComaUnix = 'convert '.implode(' ',$arrArchGene)." $strArchGuia";
    //echo "Unix: $strComaUnix";
    exec($strComaUnix,$output,$retval);
    //echo "Return value: ".$retval;
    //----------------------------------
    // La guia se marca como procesada
    //----------------------------------
    try {
        $objGuiaImpr->IsImpresa = 1;
        $objGuiaImpr->UpdatedAt = new QDateTime(QDateTime::Now());
        $objGuiaImpr->Save();
    } catch (Error $e) {
        echo "Error: ".$e->getMessage()."\n";
    } catch (Exception $e) {
        echo "Excepcion: ".$e->getMessage()."\n";
    }
}
echo "\nLa generacion de formatos ha culminado...\n";


function ImprimirUna(GuiaPiezas $objPiezGuia)
{
    $html2pdf = new Html2Pdf('L', 'LETTER', 'es', true, 'UTF-8', array("10", "10", "10", "10"));
    try {

        echo "Imprimiendo la pieza: $objPiezGuia->IdPieza\n";

        ob_start();
        include '/var/www/html/gold/retail/rhtml/guia_exportacion_una.php';
        $content = ob_get_contents();
        echo "Contenido: $content\n\n";
        ob_get_clean();

        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $strNombArch = $objPiezGuia->__printName();
        $html2pdf->output($strNombArch,'F');
        return $strNombArch;
    } catch (Html2PdfException $e) {
        $html2pdf->clean();

        $formatter = new ExceptionFormatter($e);
        echo "Error: ".$formatter->getHtmlMessage()."\n\n";
    }
    return null;
}

/*
function ImprimirUna(GuiaPiezas $objPiezGuia)
{
    $html2pdf = new Html2Pdf('L', 'LETTER', 'es', true, 'UTF-8', array("10", "10", "10", "10"));
    try {
        t('Imprimiendo: '.$objPiezGuia->IdPieza);
        $_SESSION['PiezGuia'] = serialize($objPiezGuia);

        ob_start();
        include dirname(__FILE__) . '../../retail/rhtml/guia_exportacion_una.php';
        $content = ob_get_clean();

        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $strNombArch = $objPiezGuia->__printName();
        $html2pdf->output($strNombArch,'F');
    } catch (Html2PdfException $e) {
        $html2pdf->clean();

        $formatter = new ExceptionFormatter($e);
        echo $formatter->getHtmlMessage();
    }
}
*/