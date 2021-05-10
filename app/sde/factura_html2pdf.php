<?php
require_once('qcubed.inc.php');
$intFactIdxx = $_GET['intIdxxFact'];
$objFactClie = Facturas::Load($intFactIdxx);

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $strNombArch = 'FACT_'.$objFactClie->Referencia.'.pdf';

    $content = '';
    //-------------------
    // Factura como tal
    //-------------------
    $html2pdf = new Html2Pdf('P', 'Letter', 'es', true, 'UTF-8', array("15", "10", "20", "20"));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $_SESSION['FactIdxx'] = $intFactIdxx;
    ob_start();
    include dirname(__FILE__).'/rhtml/factura.php';
    $content .= ob_get_clean();
    //-----------------------------------------
    // Relación de Manifiestos de la Factura
    //-----------------------------------------
    $html2pdf = new Html2Pdf('P', 'Letter', 'es', true, 'UTF-8', array("15", "10", "20", "20"));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $_SESSION['FactMani'] = serialize($objFactClie);
    ob_start();
    include dirname(__FILE__).'/rhtml/relacion_de_manifiestos_html.php';
    $content .= ob_get_clean();

    //------------------------------------------------
    // El contenido HTML generado, se exporta a PDF
    //------------------------------------------------
    $html2pdf->writeHTML($content);
    $html2pdf->output($strNombArch);
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>
