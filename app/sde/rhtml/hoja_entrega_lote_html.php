<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['LoteActu'])) {
    echo "Se requiere el lote de piezas a imprimir...";
    return;
}
$arrLotePiez = unserialize($_SESSION['LoteActu']);
$strFechDhoy = date("d/m/Y H:i");
$strLimiDere = '650px';

?>
<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <?php include('partials/header.tpl.php'); ?>
        <!--------------------------->
        <!-- LISTA DE GUIAS/PIEZAS -->
        <!--------------------------->
        <table style="margin-top: 24px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 160px;"> Guia/Pieza</td>
                <td style="width: 210px; text-align: left"> Remitente</td>
                <td style="width: 210px; text-align: left"> Destinatario</td>
                <td style="width: 60px; text-align: right">Pieza </td>
                <td style="width: 60px; text-align: right">Peso </td>
                <td style="width: 180px; text-align: center">Firma y Sello</td>
            </tr>
            <?php foreach ($arrLotePiez as $objPiezGuia) { ?>
                <tr style="border: solid .5mm">
                    <td>
                        <?= $objPiezGuia->IdPieza ?>
                        <br><br><br><br><br>
                    </td>
                    <td style="vertical-align: top; text-align: left"><?= $objPiezGuia->Guia->NombreRemitente ?></td>
                    <td style="vertical-align: top; text-align: left"><?= $objPiezGuia->Guia->NombreDestinatario ?></td>
                    <td style="vertical-align: top; text-align: right"><?= $objPiezGuia->IdPieza ?></td>
                    <td style="vertical-align: top; text-align: right"><?= $objPiezGuia->pesoTarifa() ?></td>
                    <td></td>
                </tr>
            <?php } ?>
        </table>
    </page_header>

    <page_footer>
    </page_footer>
</page>
