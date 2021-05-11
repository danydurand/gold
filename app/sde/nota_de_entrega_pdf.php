<?php
require_once('qcubed.inc.php');
$intGuiaIdxx = QApplication::PathInfo(0);
if (strlen($intGuiaIdxx) == 0) {
    echo 'Falta especificar el Id de la Guia';
    return;
}
$objGuiaSele = Guias::Load($intGuiaIdxx);
if (!$objGuiaSele) {
    echo 'La Guia no existe';
    return;
}

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$strNombArch = 'NOTA_ENTR_'.$objGuiaSele->Tracking.'.pdf';
$strNombForm = 'nota_de_entrega_html.php';

try {

    $html2pdf = new Html2Pdf('P', 'Letter', 'es', true, 'UTF-8', array("15", "10", "20", "20"));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $_SESSION['GuiaSele'] = serialize($objGuiaSele);
    ob_start();
    include dirname(__FILE__).'/rhtml/'.$strNombForm;
    $content = ob_get_clean();
    //---------------------------------------------------------------------------
    // El contenido del html de todas Notas de Entrega, se envia al formato PDF
    //---------------------------------------------------------------------------
    $html2pdf->writeHTML($content);
    $html2pdf->output($strNombArch);
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>
