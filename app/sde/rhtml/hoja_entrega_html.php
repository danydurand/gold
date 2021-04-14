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
//$intCantPiez = $objManiImpr->CountGuiaPiezasesAsContainerPieza();
$strDescVehi = $objManiImpr->Operacion->CodiVehiObject->DescVehi;
$strNumePlac = $objManiImpr->Operacion->CodiVehiObject->NumePlac;
//$arrPiezMani = $objManiImpr->GetGuiaPiezasAsContainerPiezaArray();
$strFechDhoy = date("d/m/Y H:i");
$strLimiDere = '650px';

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
        <?php include('partials/header.tpl.php'); ?>
        <!---------------------->
        <!--    Encabezado    -->
        <!---------------------->
        <table style="margin-top: 24px; margin-left: -3px;">
            <tr>
                <td style="width: 950px">
                    <?= $strMensaje; ?>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td style="width: 950px; text-align: center">
                    <b>Hoja de Entrega: <?= $objManiImpr->Numero ?></b>
                </td>
            </tr>
        </table>
        <!--------------------------->
        <!-- LISTA DE GUIAS/PIEZAS -->
        <!--------------------------->
        <table style="margin-top: 24px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 160px;"> Guia/Pieza</td>
                <td style="width: 210px; text-align: left"> Remitente</td>
                <td style="width: 210px; text-align: left"> Destinatario</td>
                <td style="width: 60px; text-align: right">Kilos </td>
                <td style="width: 60px; text-align: right">Libras </td>
                <td style="width: 60px; text-align: right">PiesCub </td>
                <td style="width: 180px; text-align: center">Firma y Sello</td>
            </tr>
            <?php foreach ($arrPiezMani as $objPiezMani) { ?>
                <tr style="border: solid .5mm">
                    <td>
                        <?= $objPiezMani->IdPieza ?>
                        <br><br><br><br><br>
                    </td>
                    <td style="vertical-align: top; text-align: left"><?= $objPiezMani->Guia->NombreRemitente ?></td>
                    <td style="vertical-align: top; text-align: left"><?= $objPiezMani->Guia->NombreDestinatario ?></td>
                    <td style="vertical-align: top; text-align: right"><?= $objPiezMani->Kilos ?></td>
                    <td style="vertical-align: top; text-align: right"><?= $objPiezMani->Libras ?></td>
                    <td style="vertical-align: top; text-align: right"><?= $objPiezMani->PiesCub ?></td>
                    <td></td>
                </tr>
            <?php } ?>
        </table>
    </page_header>

    <page_footer>
    </page_footer>
</page>
