<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['ManiIdxx'])) {
    echo "Se requiere el Id del Manifiesto a imprimir...";
    return;
}
$intManiIdxx = $_SESSION['ManiIdxx'];
$strNombEmpr = $_SESSION['NombEmpr'];
$objManiImpr = Containers::Load($intManiIdxx);
$strNombChof = $objManiImpr->Chofer->__toString();
$strCeduChof = $objManiImpr->Chofer->NumeCedu;
$strDescVehi = $objManiImpr->Vehiculo;
$strNumePlac = $objManiImpr->Placa;
$strFechDesp = $objManiImpr->Fecha->__toString('DD/MM/YYYY');
$strLimiDere = '340px';
$strNumeCont = $objManiImpr->Numero;
$strPrecLate = $objManiImpr->PrecintoLateral;
$strEmprTran = !is_null($objManiImpr->Transportista) ? $objManiImpr->Transportista->Nombre : 'N/A';

// Se seleccionan las piezas asociadas directamente al Manifiesto
$arrPiezMani = $objManiImpr->GetGuiaPiezasAsContainerPiezaArray();
// Valijas asociadas al Manifiesto
$arrValiMani = $objManiImpr->GetContainersAsContainerContainerArray();
foreach ($arrValiMani as $objValiMani) {
    // Piezas dentro la Valija
    $arrPiezMani[] = $objValiMani->GetGuiaPiezasAsContainerPiezaArray();
}
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
                <td style="width: <?= $strLimiDere; ?>">
                    <img src="<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/LogoGold.png" ?>" alt="LogoGold" width="130px" height="50px">
                </td>
                <td style="width: 335px; text-align: right">
                    <table border="1">
                        <tr>
                            <td style="width: 185px; text-align: right"><b>FECHA y HORA:</b></td>
                            <td style="width: 120px; text-align: left"><?= $strFechDesp ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><b>CONDUCTOR:</b></td>
                            <td style="text-align: left"><?= $strNombChof ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><b>PLACA DEL VEHICULO:</b></td>
                            <td style="text-align: left"><?= $strNumePlac ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><b>TRANSPORTISTA:</b></td>
                            <td style="text-align: left"><?= $strEmprTran ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><b>PRECINTO DE SALIDA:</b></td>
                            <td style="text-align: left"><?= $strNumeCont ?></td>
                        </tr>
                        <?php if (strlen($strPrecLate) > 0) { ?>
                        <tr>
                            <td style="text-align: right"><b>PRECINTO LATERAL:</b></td>
                            <td style="text-align: left"><?= $strPrecLate ?></td>
                        </tr>
                        <?php } ?>
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
                <td style="width: 180px; text-align: left">Guias</td>
                <td style="width: 60px; text-align: center">Piezas</td>
                <td style="width: 120px; text-align: center">Aliados</td>
                <td style="width: 240px;">Observaciones</td>
            </tr>
            <?php $intNumeLine = 1 ?>
            <?php foreach ($arrPiezMani as $objPiezMani) { ?>
                <tr>
                    <td style="text-align: center"><?= $intNumeLine ?></td>
                    <td><?= $objPiezMani->IdPieza ?></td>
                    <td style="text-align: center">1</td>
                    <td style="text-align: left"></td>
                    <td style="text-align: center"></td>
                </tr>
                <?php $intNumeLine++ ?>
            <?php } ?>
        </table>
    </page_header>
</page>
