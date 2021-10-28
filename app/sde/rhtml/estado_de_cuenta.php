<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['FactPend'])) {
    echo "Se requiere las Facturas Pendientes...";
    return;
}
$arrFactPend = unserialize($_SESSION['FactPend']);
$decSaldExce = $arrFactPend[0]->ClienteCorp->SaldoExcedente > 0 ? $arrFactPend[0]->ClienteCorp->SaldoExcedente : 0;
$strNombClie = $arrFactPend[0]->ClienteCorp->NombClie;
//$strDireCorr = 'auxiliaradm@goldcoastus.com';
$strNombBanc = Parametros::BP('DATOBANC','NOMBBANC','Txt1','BANK OF AMERICA');
$strNombBene = Parametros::BP('DATOBANC','NOMBBENE','Txt1','GOLD COAST CUSTOM EXPRESS CORP');
$strTipoCnta = Parametros::BP('DATOBANC','TIPOCNTA','Txt1','Business Fundamentals Chk');
$strNrodCnta = Parametros::BP('DATOBANC','NRODCNTA','Txt1','8981 1112 7602');
$strNrodSwif = Parametros::BP('DATOBANC','NRODSWIF','Txt1','026009593');
$strNrodAbax = Parametros::BP('DATOBANC','NRODABAX','Txt1','063000047');
$strCntaZell = Parametros::BP('DATOBANC','CNTAZELL','Txt1','administracion@goldcoastus.com');
$strEmaiAdmi = Parametros::BP('DATOBANC','EMAIADMI','Txt1','auxiliaradm@goldcoastus.com');

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
                    <img src="<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/LogoGold.png" ?>" alt="LogoGold" width="310px" height="100px">
                    <br>
                </td>
                <td style="width: 315px; text-align: right">
                </td>
            </tr>
        </table>

        <table style="margin-top: 24px;">
            <tr>
                <td colspan="2">Sres., <?= $strNombClie ?><br><br></td>
            </tr>
            <tr>
                <td colspan="2">Anexo le hacemos llegar su Estado de Cuenta actualizado a la fecha, por Servicio de Entregas Nacionales.</td>
            </tr>
            <tr>
                <td colspan="2">Por favor revisar y enviar soporte de pago.<br><br></td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-weight: bold; color: #0A246A">IMPORTANTE: Este mensaje se envia desde una
                        cuenta de correo no monitoreada.  Para cualquier comunicación adicional, por favor
                        escríbanos directamente a:<a href="mailto:<?= $strEmaiAdmi ?>"><?= $strEmaiAdmi ?></a>.
                        <br><br>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-weight: bold; color: #0A246A;">
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: bold">Datos Bancarios:<br><br></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Banco:</td>
                <td><?= $strNombBanc ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Beneficiario o Titular de la Cuenta:</td>
                <td><?= $strNombBene ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Tipo de Cuenta:</td>
                <td><?= $strTipoCnta ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Número de Cuenta:</td>
                <td><?= $strNrodCnta ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">SWIFT:</td>
                <td><?= $strNrodSwif ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">ABA:</td>
                <td><?= $strNrodAbax ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold"><br><br>ZELLE:</td>
                <td><br><br><?= $strCntaZell ?></td>
            </tr>
        </table>
        <table style="margin-top: 24px;">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="border: solid 1px black; width: 95px; text-align: center">Referencia</td>
                <td style="border: solid 1px black; width: 95px; text-align: center">Fecha</td>
                <td style="border: solid 1px black; width: 135px; text-align: center">Estatus de Pago</td>
                <td style="border: solid 1px black; width: 90px; text-align: center">Cant. Manif</td>
                <td style="border: solid 1px black; width: 75px; text-align: right">Total</td>
                <td style="border: solid 1px black; width: 80px; text-align: right">Abonado</td>
                <td style="border: solid 1px black; width: 75px; text-align: right">Balance</td>
            </tr>
            <?php $decSumaTota = 0 ?>
            <?php $decSumaCobr = 0 ?>
            <?php $decSumaPend = 0 ?>
            <?php foreach ($arrFactPend as $objFactPend) { ?>
                <tr>
                    <td style="border: solid 1px black; text-align: center"><?= $objFactPend->Referencia ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $objFactPend->Fecha->__toString("DD/MM/YYYY") ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $objFactPend->EstatusPago ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $objFactPend->CountNotaEntregasAsFactura() ?></td>
                    <td style="border: solid 1px black; text-align: right"><?= nf($objFactPend->Total) ?></td>
                    <td style="border: solid 1px black; text-align: right"><?= nf($objFactPend->MontoCobrado) ?></td>
                    <td style="border: solid 1px black; text-align: right"><?= nf($objFactPend->MontoPendiente) ?></td>
                </tr>
                <?php $decSumaTota += $objFactPend->Total ?>
                <?php $decSumaCobr += $objFactPend->MontoCobrado ?>
                <?php $decSumaPend += $objFactPend->MontoPendiente ?>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: solid 1px black; text-align: center; font-weight: bold">Totales</td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSumaTota) ?></td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSumaCobr) ?></td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSumaPend) ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: solid 1px black; text-align: center; font-weight: bold">Saldo a Favor</td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSaldExce) ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: solid 1px black; text-align: center; font-weight: bold">Tota a Pagar</td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSumaPend-$decSaldExce) ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table>
            <tr>
                <td style="width: 100%">
                    <img src="<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/banner_mtovar.jpg" ?>" alt="Banner" width="615px" height="166px">
                </td>
            </tr>
        </table>
    </page_footer>
</page>
