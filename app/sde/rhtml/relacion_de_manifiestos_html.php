<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    -->
</style>

<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['FactIdxx'])) {
    echo "Se requiere el Nro de Factura cuya relación de Manifiestos se desea imprimir...";
    return;
}
/* @var $objFactImpr Facturas */
/* @var $objManiFact NotaEntrega */
$objFactImpr = unserialize($_SESSION['FactMani']);
$arrManiFact = $objFactImpr->GetNotaEntregaAsFacturaArray();
$strLimiDere = '350px';

?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <?php include('partials/header_local.tpl.php'); ?>
        <table style="margin-top: 24px; margin-left: -3px;">
            <tr>
                <td style="width: 300px">
                    <table style=" border: solid .5mm">
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 300px">BILL TO:</td>
                        </tr>
                        <tr>
                            <td style="width: 300px"><?= $objFactImpr->RazonSocial ?></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 115px">
                </td>
                <td style="width: 230px; vertical-align: top">
                    <table style=" border: solid .5mm">
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">INVOICE:</td>
                            <td style="width: 100px; text-align: right"><?= $objFactImpr->Referencia ?></td>
                        </tr>
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">DATE:</td>
                            <td style="width: 100px; text-align: right"><?= $objFactImpr->Fecha->__toString("DD/MM/YYYY") ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!-------------------------->
        <!-- LISTA DE MANIFIESTOS -->
        <!-------------------------->
        <table style="margin-top: 24px;">
            <tr>
                <td style="width: 680px; text-align: center">
                    <b>MANIFESTS LIST</b>
                </td>
            </tr>
        </table>
        <table style="margin-top: 12px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 220px;">Number/Reference</td>
                <td style="width: 90px; text-align: center">Date</td>
                <td style="width: 100px; text-align: center">Import Serv.</td>
                <td style="width: 55px; text-align: right">Pieces</td>
                <td style="width: 50px; text-align: right">Kgs</td>
                <td style="width: 60px; text-align: right">PiesCub</td>
                <td style="width: 60px; text-align: right">Total</td>
            </tr>
            <?php $intCantPiez = 0 ?>
            <?php foreach ($arrManiFact as $objManiFact) { ?>
                <tr>
                    <td><?= $objManiFact->Referencia ?></td>
                    <td style="text-align: center"><?= $objManiFact->Fecha->__toString("DD/MM/YYYY") ?></td>
                    <td style="text-align: center"><?= $objManiFact->ServicioImportacion ?></td>
                    <td style="text-align: right"><?= $objManiFact->Piezas ?></td>
                    <td style="text-align: right"><?= nf($objManiFact->Kilos) ?></td>
                    <td style="text-align: right"><?= nf3($objManiFact->PiesCub) ?></td>
                    <td style="text-align: right"><?= nf($objManiFact->Total) ?></td>
                </tr>
                <?php $intCantPiez += $objManiFact->Piezas ?>
            <?php } ?>
            <tr style="background-color: #CCC; font-weight: bold">
                <td>Totals</td>
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
                <td style="text-align: right"><?= $intCantPiez ?></td>
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
                <td style="text-align: right"><?= nf($objFactImpr->Total) ?></td>
            </tr>
        </table>
    </page_header>

</page>
