<?php
require_once('qcubed.inc.php');
$intManiIdxx = QApplication::PathInfo(0);
$strTipoRepo = QApplication::PathInfo(1);
if (strlen($intManiIdxx) == 0) {
    echo 'Falta especificar el Id del Manifiesto';
    return;
}
$objManiCarg = Containers::Load($intManiIdxx);
if (!$objManiCarg) {
    echo 'El Manifiesto no existe';
    return;
}
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    if ($strTipoRepo = 'M') {
        $strNombArch = 'MANI_CARG_'.$objManiCarg->Numero.'.pdf';
        $strNombForm = 'manifiesto_de_carga2_html.php';
    } else {
        $strNombArch = 'HOJA_ENTR_'.$objManiCarg->Numero.'.pdf';
        $strNombForm = 'hoja_entrega_html.php';
    }

    $html2pdf = new Html2Pdf('P', 'Letter', 'es', true, 'UTF-8', array("15", "10", "20", "20"));
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
