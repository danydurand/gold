<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['ManiIdxx'])) {
    echo "Se requiere el Id del Manifiesto a imprimir...";
    return;
}
$intManiIdxx = $_SESSION['ManiIdxx'];
$strNombEmpr = $_SESSION['NombEmpr'];
$objManiImpr = Containers::Load($intManiIdxx);
$strDestOper = implode($objManiImpr->GetDestinos('Nombre'),", ");
$strNombChof = $objManiImpr->Operacion->CodiChofObject->NombChof;
$strCeduChof = $objManiImpr->Operacion->CodiChofObject->NumeCedu;
$strDescVehi = $objManiImpr->Operacion->CodiVehiObject->DescVehi;
$strNumePlac = $objManiImpr->Operacion->CodiVehiObject->NumePlac;
$strFechDhoy = date("d/m/Y H:i");
$strLimiDere = '350px';

// Se seleccionan las piezas asociadas directamente al Manifiesto
$arrPiezMani = $objManiImpr->GetGuiaPiezasAsContainerPiezaArray();
// Valijas asociadas al Manifiesto
$arrValiMani = $objManiImpr->GetContainersAsContainerContainerArray();
foreach ($arrValiMani as $objValiMani) {
    // Piezas dentro la Valija
    $arrPiezMani[] = $objValiMani->GetGuiaPiezasAsContainerPiezaArray();
}
$intCantPiez = count($arrPiezMani);

$strMensaje  = "Yo $strNombChof, C.I. Nro $strCeduChof, he recibido la cantidad de $intCantPiez bulto(s) pertenecientes ";
$strMensaje .= "a Clientes de $strNombEmpr, para ser distribuidas en un(a) $strDescVehi de placa: $strNumePlac ";
$strMensaje .= "en los siguientes destinos: $strDestOper";
?>
<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <?php include('partials/header_simple.tpl.php'); ?>
        <!---------------------->
        <!--    Encabezado    -->
        <!---------------------->
        <table style="margin-top: 24px; margin-left: -3px;">
            <tr>
                <td style="width: 680px">
                    <?= $strMensaje; ?>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td style="width: 680px; text-align: center">
                    <b>Manifiesto: <?= $objManiImpr->Numero ?></b>
                </td>
            </tr>
        </table>
        <!------------------------------->
        <!-- LISTA DE NOTAS DE ENTREGA -->
        <!------------------------------->
        <table style="margin-top: 24px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 100px;">Guia/Pieza</td>
                <td style="width: 170px; text-align: left">Remitente</td>
                <td style="width: 170px; text-align: left">Destinatario</td>
                <td style="width: 60px; text-align: center">Destino</td>
                <td style="width: 50px; text-align: right">Kilos</td>
                <td style="width: 50px; text-align: right">Libras</td>
                <td style="width: 50px; text-align: right">PiesCub</td>
            </tr>
            <?php $decSumaKilo = 0; ?>
            <?php $decSumaLibr = 0; ?>
            <?php $decSumaPies = 0; ?>
            <?php foreach ($arrPiezMani as $objPiezMani) { ?>
                <tr>
                    <td><?= $objPiezMani->IdPieza ?></td>
                    <td style="text-align: left"><?= $objPiezMani->Guia->NombreRemitente ?></td>
                    <td style="text-align: left"><?= $objPiezMani->Guia->NombreDestinatario ?></td>
                    <td style="text-align: center"><?= $objPiezMani->Guia->Destino->Iata ?></td>
                    <td style="text-align: right"><?= $objPiezMani->Kilos ?></td>
                    <td style="text-align: right"><?= $objPiezMani->Libras ?></td>
                    <td style="text-align: right"><?= $objPiezMani->PiesCub ?></td>
                </tr>
                <?php $decSumaKilo += $objPiezMani->Kilos; ?>
                <?php $decSumaLibr += $objPiezMani->Libras; ?>
                <?php $decSumaPies += $objPiezMani->PiesCub; ?>
            <?php } ?>
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="text-align: left" colspan="4">Totales</td>
                <td style="text-align: right"><?= $decSumaKilo ?></td>
                <td style="text-align: right"><?= $decSumaLibr ?></td>
                <td style="text-align: right"><?= $decSumaPies ?></td>
            </tr>
        </table>
    </page_header>

    <page_footer>
        <table style="border: solid .5mm;">
            <tr>
                <td style=" width: 100px;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>Recibí Conforme: </td>
                <td style="text-align: center">________________________</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center"><?= $strNombChof ?></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center"><?= $strCeduChof ?></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center"><?= $strFechDhoy; ?></td>
            </tr>
        </table>
    </page_footer>
</page>
