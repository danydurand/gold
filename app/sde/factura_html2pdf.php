<?php
require_once('qcubed.inc.php');
$intFactIdxx = $_GET['intIdxxFact'];
$objFactClie = Facturas::Load($intFactIdxx);

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $strNombArch = 'FACT_'.$objFactClie->Referencia.'.pdf';
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array("15", "10", "20", "20"));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $_SESSION['FactIdxx'] = $intFactIdxx;
    ob_start();
    include dirname(__FILE__).'/rhtml/factura.php';
    $content = ob_get_clean();

    $html2pdf->writeHTML($content);
    $html2pdf->output($strNombArch);
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>
