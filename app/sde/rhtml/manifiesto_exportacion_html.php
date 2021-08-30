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

t('Son: '.count($arrGuiaMani).' guias');

// Valijas asociadas al Manifiesto
//$arrValiMani = $objManiImpr->GetContainersAsContainerContainerArray();
//foreach ($arrValiMani as $objValiMani) {
//     Piezas dentro la Valija
//$arrPiezMani[] = $objValiMani->GetGuiaPiezasAsContainerPiezaArray();
//}
//$intCantPiez = count($arrPiezMani);
/* @var $objGuiaMani Guias */
?>
<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    .etiqueta { font-weight: bold }
    .contenido { text-align: left }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table style="width: 100%; margin-top: 12px" border="0">
            <tr>
                <td style="width: 100%; text-align: center; font-weight: bold">Manifiesto de Exportacion Marítima</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 200px; text-align: right">
                    <table border="0">
                        <tr>
                            <td class="etiqueta">Manifiesto Nro:</td>
                            <td class="contenido"><?= $objManiImpr->Numero ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Cliente:</td>
                            <td class="contenido">GOLD COAST</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Origen:</td>
                            <td class="contenido"><?= $objManiImpr->Origen->Nombre ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Transporte:</td>
                            <td class="contenido"><?= $objManiImpr->Transporte ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Guia Madre:</td>
                            <td class="contenido"><?= $objManiImpr->Master ?></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 580px; text-align: center">
                    <br>
                </td>
                <td style="width: 200px; text-align: right">
                    <table border="0">
                        <tr>
                            <td class="etiqueta">Fecha Despacho:</td>
                            <td class="contenido"><?= $objManiImpr->FechaDespacho->__toString("DD/MM/YYYY") ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Destino:</td>
                            <td class="contenido"><?= $objManiImpr->Destino->Nombre ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Valor:</td>
                            <td class="contenido"><?= nf($objManiImpr->Valor) ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Booking:</td>
                            <td class="contenido"><?= $objManiImpr->Booking ?></td>
                        </tr>
                        <tr>
                            <td><br></td>
                            <td><br></td>
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
                <td style="width: 080px; text-align: center">Nro Guia</td>
                <td style="width: 200px; text-align: left">Remitente</td>
                <td style="width: 200px; text-align: left">Destinatario</td>
                <td style="width: 200px; text-align: left">Descripcion</td>
                <td style="width: 080px; text-align: center">Piezas</td>
                <td style="width: 080px; text-align: center">PiesCub</td>
                <td style="width: 080px; text-align: center">Valor $</td>
            </tr>
            <?php foreach ($arrGuiaMani as $objGuiaMani) { ?>
                <tr style="font-size: small">
                    <td style="text-align: center"><?= $objGuiaMani->Numero ?></td>
                    <td style="text-align: left"><?= substr($objGuiaMani->NombreRemitente,0,25) ?></td>
                    <td style="text-align: left"><?= substr($objGuiaMani->NombreDestinatario,0,25) ?></td>
                    <td style="text-align: left"><?= substr($objGuiaMani->Contenido,0,25) ?></td>
                    <td style="text-align: center"><?= $objGuiaMani->Piezas ?></td>
                    <td style="text-align: right"><?= $objGuiaMani->PiesCub ?></td>
                    <td style="text-align: right"><?= $objGuiaMani->ValorDeclarado ?></td>
                </tr>
            <?php } ?>
        </table>
    </page_header>
</page>
