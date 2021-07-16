<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['FactPend'])) {
    echo "Se requiere las Facturas Pendientes...";
    return;
}
$arrFactPend = unserialize($_SESSION['FactPend']);
$decSaldExce = $arrFactPend[0]->ClienteCorp->SaldoExcedente;

/* @var $objFactPend Facturas */
?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <!---------------------->
        <!-- LOGO y DIRECCION -->
        <!---------------------->
        <table>
            <tr>
                <td style="width: 350px">
                    <img src=<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/LogoGold.png" ?> alt="LogoGold" width="310px" height="100px">
                    <br>
                </td>
                <td style="width: 315px; text-align: right">
                </td>
            </tr>
        </table>

        <table style="margin-top: 24px;">
            <tr>
                <td colspan="2">Estimado Cliente,<br><br></td>
            </tr>
            <tr>
                <td colspan="2">Anexo le hacemos llegar su Estado de Cuenta actualizado a la fecha, por Servicio de Entregas Nacionales.</td>
            </tr>
            <tr>
                <td colspan="2">Por favor revisar y enviar soporte de pago.<br><br></td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: bold">Datos Bancarios:<br><br></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Banco:</td>
                <td>BANK OF AMERICA</td>
            </tr>
            <tr>
                <td style="font-weight: bold">Beneficiario o Titular de la Cuenta:</td>
                <td>GOLD COAST CUSTOM EXPRESS CORP</td>
            </tr>
            <tr>
                <td style="font-weight: bold">Tipo de Cuenta:</td>
                <td>Business Fundamentals Chk</td>
            </tr>
            <tr>
                <td style="font-weight: bold">Número de Cuenta:</td>
                <td>898111123004</td>
            </tr>
            <tr>
                <td style="font-weight: bold">SWIFT:</td>
                <td>026009593</td>
            </tr>
            <tr>
                <td style="font-weight: bold">ABA:</td>
                <td>063100277</td>
            </tr>
            <tr>
                <td style="font-weight: bold"><br><br>ZELLE:</td>
                <td><br><br>administracion@goldcoastus.com</td>
            </tr>
        </table>
        <table style="margin-top: 24px;">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="border: solid 1px black; width: 120px; text-align: center"">Referencia</td>
                <td style="border: solid 1px black; width: 120px; text-align: center">Fecha</td>
                <td style="border: solid 1px black; width: 150px; text-align: center">Estatus de Pago</td>
                <td style="border: solid 1px black; width: 120px; text-align: center">Cant. Manif</td>
                <td style="border: solid 1px black; width: 120px; text-align: right">Total</td>
            </tr>
            <?php $decSumaFact = 0 ?>
            <?php foreach ($arrFactPend as $objFactPend) { ?>
                <tr>
                    <td style="border: solid 1px black; text-align: center"><?= $objFactPend->Referencia ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $objFactPend->Fecha->__toString("DD/MM/YYYY") ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $objFactPend->EstatusPago ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $objFactPend->CountNotaEntregasAsFactura() ?></td>
                    <td style="border: solid 1px black; text-align: right"><?= nf($objFactPend->Total) ?></td>
                </tr>
                <?php $decSumaFact += $objFactPend->Total ?>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: solid 1px black; text-align: center">Total</td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSumaFact) ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: solid 1px black; text-align: center">Saldo a Favor</td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSaldExce) ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: solid 1px black; text-align: center; font-weight: bold">Tota a Pagar</td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSumaFact-$decSaldExce) ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table>
            <tr>
                <td style="width: 100%">
                    <img src=<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/banner_mtovar.jpg" ?> alt="Banner" width="615px" height="166px">
                </td>
            </tr>
        </table>
    </page_footer>
</page>
