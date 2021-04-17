<?php
require_once('qcubed.inc.php');

t('Reporte PU sin TR');
$dttFechDhoy = date("Y-m-d");
$dttFechRepo = SumaRestaDiasAFecha($dttFechDhoy,1,'-');
$strLimiDere = '650px';
$strCkptUnox = 'PU';
$strCkptDosx = 'TR';
$arrSinxTras = [];
$arrPiezPick = PiezaCheckpoints::CheckpointEnFecha($strCkptUnox,$dttFechRepo);

/* @var $objPiezPick PiezaCheckpoints */
foreach ($arrPiezPick as $objPiezPick) {
    if (!$objPiezPick->tieneCheckpoint($strCkptDosx)) {
        $arrSinxTras[] = $objPiezPick;
    }
}
$strTextMens = "Piezas con Pick-Up sin Traslado +24Hrs";
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
        <table style="margin-top: 24px;">
            <tr>
                <td style="width: 1000px; text-align: center">
                    <?= $strTextMens; ?>
                </td>
            </tr>
        </table>
        <!--------------------------->
        <!-- LISTA DE GUIAS/PIEZAS -->
        <!--------------------------->
        <table style="margin-top: 24px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 150px;"> Guia/Pieza</td>
                <td style="width: 230px; text-align: left"> Remitente</td>
                <td style="width: 230px; text-align: left"> Destinatario</td>
                <td style="width: 70px; text-align: center">PickUp</td>
                <td style="width: 70px; text-align: center">Suc</td>
                <td style="width: 70px; text-align: center">Usuario</td>
                <td style="width: 80px; text-align: center">Ubicacion</td>
            </tr>
            <?php foreach ($arrSinxTras as $objPiezPick) { ?>
                <?php
                    $strLogiUsua = 'N/A';
                    if (!is_null($objPiezPick->CreatedBy)) {
                        $objUsuaRepo = Usuario::Load($objPiezPick->CreatedBy);
                        $strLogiUsua = $objUsuaRepo->LogiUsua;
                    }
                ?>
                <tr>
                    <td><?= $objPiezPick->Pieza->IdPieza ?></td>
                    <td style="text-align: left"><?= $objPiezPick->Pieza->Guia->NombreRemitente ?></td>
                    <td style="text-align: left"><?= $objPiezPick->Pieza->Guia->NombreDestinatario ?></td>
                    <td style="text-align: center"><?= $objPiezPick->Fecha->__toString("DD/MM/YYYY").' '.$objPiezPick->Hora ?></td>
                    <td style="text-align: center"><?= $objPiezPick->Sucursal->Iata ?></td>
                    <td style="text-align: center"><?= $strLogiUsua ?></td>
                    <td style="text-align: center"><?= $objPiezPick->Pieza->Ubicacion ?></td>
                </tr>
                <?php t('Pieza: '.$objPiezPick->Pieza->IdPieza); ?>
            <?php } ?>
        </table>
    </page_header>

    <page_footer>
    </page_footer>
</page>
