<?php
require_once('qcubed.inc.php');
$intFactIdxx = $_GET['intIdxxFact'];
$strTipoAcci = 'I';  // Imprimir PDF
if (isset($_SESSION['TipoAcci'])) {
    $strTipoAcci = $_SESSION['TipoAcci'];
}
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
    $html2pdf = new Html2Pdf('P', 'LETTER', 'es', true, 'UTF-8', array("15", "10", "20", "30"));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $_SESSION['FactIdxx'] = $intFactIdxx;

    //-----------------
    // Guias y Piezas
    //-----------------
    $arrGuiaFact = $objFactClie->GetFacturaGuiasAsFacturaArray();
    $arrGuiaProc = [];
    foreach ($arrGuiaFact as $objGuiaFact) {
        $arrGuiaProc[] = $objGuiaFact->GuiaId;
    }
    $arrPiezGuia = Guias::PiezasDeLasGuias($arrGuiaProc);
    $intCantPiez = count($arrPiezGuia);
    $intPiezPagi = $intCantPiez < 30 ? 20 : 35;
    $intCantPagi = $intCantPiez / $intPiezPagi;
    $intPartDeci = $intCantPagi - (int) $intCantPagi;
    if ($intPartDeci > 0) {
        $intCantPagi = (int)$intCantPagi + 1;
    }
    $intNumePagi = 1;
    $_SESSION['CantPagi'] = $intCantPagi;

    ob_start();
    while ($intNumePagi <= $intCantPagi) {
        $intOffxSetx = $intNumePagi > 1 ? (($intNumePagi - 1) * $intPiezPagi) : 0;
        $arrPiezImpr = array_slice($arrPiezGuia, $intOffxSetx, $intPiezPagi);

        $_SESSION['PiezImpr'] = $arrPiezImpr;
        $_SESSION['NumePagi'] = $intNumePagi;

        include dirname(__FILE__) . '/rhtml/factura.php';

        $intNumePagi++;
    }
    //$html2pdf->setModeDebug();

    $content .= ob_get_clean();

    //------------------------------------------------
    // El contenido HTML generado, se exporta a PDF
    //------------------------------------------------
    $html2pdf->writeHTML($content);
    if ($strTipoAcci == 'I') {
        $html2pdf->output($strNombArch);
    } else {
        $html2pdf->output('/tmp/'.$strNombArch, 'F');
    }
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>
