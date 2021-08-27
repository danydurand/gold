<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['ManiIdxx'])) {
    echo "Se requiere el Id del Manifiesto a imprimir...";
    return;
}
$intManiIdxx = $_SESSION['ManiIdxx'];
$strNombEmpr = $_SESSION['NombEmpr'];
$objManiImpr = ManifiestoExp::Load($intManiIdxx);
$strFechDesp = $objManiImpr->FechaDespacho->__toString('DD/MM/YYYY');
$strLimiDere = '340px';
$strNumeBlxx = $objManiImpr->NroBl;
$strNumeBook = $objManiImpr->Booking;

// Se seleccionan las piezas asociadas directamente al Manifiesto
$arrPiezMani = $objManiImpr->GetGuiaPiezasAsPiezaArray();
// Valijas asociadas al Manifiesto
//$arrValiMani = $objManiImpr->GetContainersAsContainerContainerArray();
//foreach ($arrValiMani as $objValiMani) {
//     Piezas dentro la Valija
    //$arrPiezMani[] = $objValiMani->GetGuiaPiezasAsContainerPiezaArray();
//}
$intCantPiez = count($arrPiezMani);
?>
<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table>
            <tr>
                <td style="width: 350px; text-align: right">
                    <table border="1">
                        <tr>
                            <td style="width: 200px; text-align: right"><b>FECHA y HORA</b></td>
                            <td style="width: 120px; text-align: center"><?= $strFechDesp ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><b>BL</b></td>
                            <td style="text-align: center"><?= $strNumeBlxx ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><b>BOOKING</b></td>
                            <td style="text-align: center"><?= $strNumeBook ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!---------------------->
        <!--  Lista de Piezas -->
        <!---------------------->
        <table style="margin-top: 24px;" border="1">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 40px; text-align: center">Nro</td>
                <td style="width: 100px; text-align: center">Pieza</td>
                <td style="width: 60px; text-align: center">Kilos</td>
                <td style="width: 60px; text-align: center">Pies Cub</td>
                <td style="width: 240px;">Contenido</td>
            </tr>
            <?php $intNumeLine = 1 ?>
            <?php foreach ($arrPiezMani as $objPiezMani) { ?>
                <tr>
                    <td style="text-align: center"><?= $intNumeLine ?></td>
                    <td style="text-align: center"><?= $objPiezMani->IdPieza ?></td>
                    <td style="text-align: center"><?= $objPiezMani->Kilos ?></td>
                    <td style="text-align: center"><?= $objPiezMani->PiesCub ?></td>
                    <td style="text-align: left"><?= $objPiezMani->Descripcion ?></td>
                </tr>
                <?php $intNumeLine++ ?>
            <?php } ?>
        </table>
    </page_header>
</page>
