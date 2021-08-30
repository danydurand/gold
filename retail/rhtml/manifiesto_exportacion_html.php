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

// Se seleccionan las piezas asociadas directamente al Manifiesto
$arrGuiaMani = Guias::LoadArrayByManifiestoExp($intManiIdxx);

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
                            <td style="width: 200px; text-align: right"><b>FECHA y HORA:</b></td>
                            <td style="width: 120px; text-align: center"><?= $strFechDesp ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><b>BL:</b></td>
                            <td style="text-align: center"><?= $strNumeBlxx ?></td>
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
                <td style="width: 040px; text-align: center">Nro Guia</td>
                <td style="width: 180px; text-align: left">Remitente</td>
                <td style="width: 180px; text-align: left">Destinatario</td>
                <td style="width: 040px; text-align: center">Piezas</td>
                <td style="width: 040px; text-align: center">PiesCub</td>
                <td style="width: 040px; text-align: center">Valor $</td>
            </tr>
            <?php foreach ($arrGuiaMani as $objGuiaMani) { ?>
            <tr>
                <td style="text-align: center"><?= $objGuiaMani->Numero ?></td>
                <td style="text-align: left"><?= $objGuiaMani->NombreRemiente ?></td>
                <td style="text-align: left"><?= $objGuiaMani->NombreDestinatario ?></td>
                <td style="text-align: left"><?= $objGuiaMani->Contenido ?></td>
                <td style="text-align: center"><?= $objGuiaMani->Piezas ?></td>
                <td style="text-align: left"><?= $objGuiaMani->PiesCub ?></td>
                <td style="text-align: center"><?= $objGuiaMani->ValorDeclarado ?></td>
            </tr>
            <?php } ?>
        </table>
    </page_header>
</page>
