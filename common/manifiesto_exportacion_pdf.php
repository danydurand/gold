<?php
require_once('qcubed.inc.php');
$intManiIdxx = QApplication::PathInfo(0);
if (strlen($intManiIdxx) == 0) {
    echo 'Falta especificar el Id del Manifiesto';
    return;
}
$objManiCarg = ManifiestoExp::Load($intManiIdxx);
if (!$objManiCarg) {
    echo 'El Manifiesto no existe';
    return;
}
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $strNombArch = 'MANI_EXPO_'.$objManiCarg->Booking.'.pdf';
    $strNombForm = 'manifiesto_exportacion_html.php';

    $html2pdf = new Html2Pdf('L', 'Letter', 'es', true, 'UTF-8', array("10", "10", "10", "10"));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $_SESSION['ManiIdxx'] = $intManiIdxx;
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
