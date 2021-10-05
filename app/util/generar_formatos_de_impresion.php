<?php
//-------------------------------------------------------------------------------------------------------
// Programa      : generar_formato_de_impresion.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 28/09/2021
// Descripcion   : Este programa corre vía cron (cada minuto) y detecta guías cuyo formato de impresion
//                 debe ser generado
//-------------------------------------------------------------------------------------------------------
$strNombHost = gethostname();
if ($strNombHost == 'umar') {
    $_SERVER['SERVER_NAME'] = 'goldsist.com';
} else {
    $_SERVER['SERVER_NAME'] = 'gold.dev.com';
}
require_once('qcubed.inc.php');

echo 1;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

echo 2;
//---------------------------------------------------------------------------------
// En la tabla guias_imprimir residen las guías cuyo formatos deben ser generados
//---------------------------------------------------------------------------------
$objClauWher = QQ::Equal(QQN::GuiaImprimir()->IsImpresa,0);
$arrGuiaImpr = GuiaImprimir::QueryArray(QQ::AndCondition($objClauWher));
echo "Hay: ".count($arrGuiaImpr)." guias por procesar...\n";
foreach ($arrGuiaImpr as $objGuiaImpr) {
    echo "Procesando los formatos de la Guia: ".$objGuiaImpr->Guia->Numero."\n";
    $arrPiezGuia = $objGuiaImpr->Guia->GetGuiaPiezasAsGuiaArray();
    foreach ($arrPiezGuia as $objPiezGuia) {
        echo "Procesando pieza: ".$objPiezGuia->IdPieza."\n";
        $this->ImprimirUna($objPiezGuia);
    }
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
echo "La generacion de formatos ha culminado...\n";


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
