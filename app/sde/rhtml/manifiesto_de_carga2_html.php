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
$strLimiDere = '340px';
$strNumeCont = $objManiImpr->Numero;
$strPrecLate = $objManiImpr->PrecintoLateral;

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
        <table>
            <tr>
                <td style="width: <?= $strLimiDere; ?>">
                    <img src="<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/LogoGold.png" ?>" alt="LogoGold" width="130px" height="50px">
                </td>
                <td style="width: 350px; text-align: right">
                    <table border="1">
                        <tr>
                            <td style="width: 200px; text-align: right">FECHA y HORA:</td>
                            <td style="width: 120px; text-align: center"><?= $strFechDhoy ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">CONDUCTOR:</td>
                            <td style="text-align: center"><?= $strNombChof ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">PLACA DEL VEHICULO:</td>
                            <td style="text-align: center"><?= $strNumePlac ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">EMPRESA DE TRANSPORTE:</td>
                            <td style="text-align: center"><?= $strNombEmpr ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">PRECINTO DE SALIDA:</td>
                            <td style="text-align: center"><?= $strNumeCont ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">PRECINTO LATERAL:</td>
                            <td style="text-align: center"><?= $strPrecLate ?></td>
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
