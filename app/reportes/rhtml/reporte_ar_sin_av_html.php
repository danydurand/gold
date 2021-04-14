<?php
require_once('qcubed.inc.php');

$dttFechDhoy = date("Y-m-d");
$dttFechRepo = SumaRestaDiasAFecha($dttFechDhoy,1,'-');
$strLimiDere = '650px';

$strCkptUnox = 'AR';
$strCkptDosx = 'AV';
$arrSinxDosx = [];
$arrPiezUnox = PiezaCheckpoints::CheckpointEnFecha($strCkptUnox,$dttFechRepo);

/* @var $objPiezUnox PiezaCheckpoints */
foreach ($arrPiezUnox as $objPiezUnox) {
    if (!$objPiezUnox->tieneCheckpoint($strCkptDosx)) {
        $arrSinxDosx[] = $objPiezUnox;
    }
}
$strTextMens = "Piezas con Arribo sin Auditoria +24Hrs";
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
                <td style="width: 70px; text-align: center">Arribo</td>
                <td style="width: 70px; text-align: center">Suc</td>
                <td style="width: 70px; text-align: center">Usuario</td>
                <td style="width: 80px; text-align: center">Ubicacion</td>
            </tr>
            <?php foreach ($arrSinxDosx as $objPiezUnox) { ?>
                <?php $strLogiUsua = Usuario::Load($objPiezUnox->CreatedBy)->LogiUsua; ?>
                <tr>
                    <td><?= $objPiezUnox->Pieza->IdPieza ?></td>
                    <td style="text-align: left"><?= $objPiezUnox->Pieza->Guia->NombreRemitente ?></td>
                    <td style="text-align: left"><?= $objPiezUnox->Pieza->Guia->NombreDestinatario ?></td>
                    <td style="text-align: center"><?= $objPiezUnox->Fecha->__toString("DD/MM/YYYY").' '.$objPiezUnox->Hora ?></td>
                    <td style="text-align: center"><?= $objPiezUnox->Sucursal->Iata ?></td>
                    <td style="text-align: center"><?= $strLogiUsua ?></td>
                    <td style="text-align: center"><?= $objPiezUnox->Pieza->Ubicacion ?></td>
                </tr>
            <?php } ?>
        </table>
    </page_header>

    <page_footer>
    </page_footer>
</page>
