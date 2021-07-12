<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['FactPend'])) {
    echo "Se requiere las Facturas Pendientes...";
    return;
}
$arrFactPend = unserialize($_SESSION['FactPend']);
/* @var $objFactPend Facturas */
?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table style="margin-top: 24px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 120px; text-align: center"">Referencia</td>
                <td style="width: 120px; text-align: center">Fecha</td>
                <td style="width: 150px; text-align: center">Estatus de Pago</td>
                <td style="width: 120px; text-align: center">Cant. Manif</td>
                <td style="width: 120px; text-align: right">Total</td>
            </tr>
            <?php $decSumaFact = 0 ?>
            <?php foreach ($arrFactPend as $objFactPend) { ?>
                <tr>
                    <td style="text-align: center"><?= $objFactPend->Referencia ?></td>
                    <td style="text-align: center"><?= $objFactPend->Fecha->__toString("DD/MM/YYYY") ?></td>
                    <td style="text-align: center"><?= $objFactPend->EstatusPago ?></td>
                    <td style="text-align: center"><?= $objFactPend->Id ?></td>
                    <td style="text-align: right"><?= nf($objFactPend->Total) ?></td>
                </tr>
                <?php $decSumaFact += $objFactPend->Total ?>
            <?php } ?>
            <tr style="background-color: #CCC; font-weight: bold">
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center">Total</td>
                <td style="text-align: right"><?= nf($decSumaFact) ?></td>
            </tr>
        </table>
    </page_header>
</page>
