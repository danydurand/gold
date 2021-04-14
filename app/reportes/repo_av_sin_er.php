<?php
require_once('qcubed.inc.php');

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $strNombArch = 'Auditoria_sin_SalidaRuta.pdf';
    $strNombForm = 'reporte_av_sin_er_html.php';
    $strPosiHoja = 'L';

    $html2pdf = new Html2Pdf($strPosiHoja, 'A4', 'es', true, 'UTF-8', array("10", "10", "20", "20"));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    ob_start();
    include dirname(__FILE__).'/rhtml/'.$strNombForm;
    $content = ob_get_clean();

    $html2pdf->writeHTML($content);
    $html2pdf->output($strNombArch);
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>
