<?php
require_once('qcubed.inc.php');

$arrGuiaIdxx = isset($_SESSION['GuiaEtiq']) ? $_SESSION['GuiaEtiq'] : [];
if (count($arrGuiaIdxx) == 0) {
    echo 'No se especificaron las guias a imprimir';
    return;
}
$objClauWher = QQ::In(QQN::Guias()->Id, $arrGuiaIdxx);
$objClauOrde = QQ::OrderBy(QQN::Guias()->Id);
$arrGuiaSele = Guias::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
if (count($arrGuiaSele) == 0) {
    echo 'Las Guias no existen';
    return;
}

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

//$strNombArch = 'ETIQUETA_'.$objGuiaSele->Tracking.'.pdf';
$strNombArch = 'ETIQUETA.pdf';

try {

    $html2pdf = new Html2Pdf('P', 'A6', 'es', true, 'UTF-8', array("8.5", "5", "5", "5"));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    ob_start();
    foreach ($arrGuiaSele as $objGuiaSele) {
        //--------------------
        // Piezas de la Guia
        //--------------------
        try {
            $arrPiezGuia = GuiaPiezas::LoadArrayByGuiaId($objGuiaSele->Id);
            foreach ($arrPiezGuia as $objPiezGuia) {
                $_SESSION['GuiaEtiqImpr'] = serialize($objGuiaSele);
                $_SESSION['PiezEtiqImpr'] = serialize($objPiezGuia);
                include dirname(__FILE__).'/rhtml/etiqueta_html.php';
            }
        } catch (Exception $e) {
            t('Error: '.$e->getMessage());
        }
    }
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
