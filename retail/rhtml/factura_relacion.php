<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    -->
</style>

<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['FactIdxx'])) {
    echo "Se requiere un Nro de Factura para Imprimir...";
    return;
}
$objFactImpr = Facturas::Load($intFactIdxx);
$arrZonaFact = Parametros::LoadArrayByIndice('ZONA');
$arrManiFact = $objFactImpr->GetNotaEntregaAsFacturaArray();
$arrGuiaZona = [];
foreach ($arrManiFact as $objManiFact) {
    $arrGuiaMani = $objManiFact->GetGuiasArray();
    foreach ($arrGuiaMani as $objGuiaMani) {
        $arrGuiaZona[$objGuiaMani->Destino->Zona][] = $objGuiaMani->Tracking;
    }
}

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
                    <br>
                    <br>
                </td>
                <td style="width: 315px; text-align: right">
                    1335 NW 98TH CT UNIT 2<br>
                    DORAL, FL 33172<br>
                    786 452 9090
                </td>
            </tr>
        </table>
        <!---------------------->
        <!--     RECUADROS    -->
        <!---------------------->
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
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 300px">FISCAL ADDRESS:</td>
                        </tr>
                        <tr>
                            <td style="width: 300px"><?= $objFactImpr->DireccionFiscal ?></td>
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
        <!-------------------->
        <!-- LISTA DE GUIAS -->
        <!-------------------->
        <table style="margin-top: 24px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 295px;">Description</td>
                <td style="width: 100px; text-align: center">Date</td>
                <td style="width: 100px; text-align: center">Import Serv.</td>
                <td style="width: 55px; text-align: right">Pieces</td>
                <td style="width: 100px; text-align: right">Amount</td>
            </tr>
            <?php $intCantPiez = 0 ?>
            <?php foreach ($objFactImpr->GetNotaEntregaAsFacturaArray() as $objNotaEntr) { ?>
                <tr>
                    <td>Entregas NAC Ref: <?= $objNotaEntr->Referencia ?></td>
                    <td style="text-align: center"><?= $objNotaEntr->Fecha->__toString("DD/MM/YYYY") ?></td>
                    <td style="text-align: center"><?= $objNotaEntr->ServicioImportacion ?></td>
                    <td style="text-align: right"><?= $objNotaEntr->Piezas ?></td>
                    <td style="text-align: right"><?= nf($objNotaEntr->Total) ?></td>
                </tr>
                <?php $intCantPiez += $objNotaEntr->Piezas ?>
            <?php } ?>
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 295px;">Totals</td>
                <td style="width: 100px; text-align: center"></td>
                <td style="width: 100px; text-align: center"></td>
                <td style="width: 55px; text-align: right"><?= $intCantPiez ?></td>
                <td style="width: 100px; text-align: right"><?= nf($objFactImpr->Total) ?></td>
            </tr>
        </table>
    </page_header>

    <page_footer>
        <table style="border: solid .5mm; font-size: 10px;">
            <tr>
                <td class="titulo" style="width: 150px;">PLEASE MAKE CHECK TO:</td>
                <td style="text-align: left">GOLD COAST CUSTOM EXPRESS CORP.</td>
            </tr>
        </table>
        <br>
        <span style="font-size: 10px;">OR IF YOU PREFER TRANSFER...</span>
        <br>
        <br>
        <table style="border: solid .5mm; font-size: 10px;">
            <tr>
                <td class="titulo" style="width: 150px;">BANCO:</td>
                <td style="text-align: left">BANK OF AMERICA</td>
            </tr>
            <tr>
                <td class="titulo" style="width: 150px;">A NOMBRE DE:</td>
                <td style="text-align: left">GOLD COAST CUSTOM AND TRADING CORP.</td>
            </tr>
            <tr>
                <td class="titulo" style="width: 150px;">TIPO DE CUENTA:</td>
                <td style="text-align: left">BUSINESS FUNDAMENTAL CHK</td>
            </tr>
            <tr>
                <td class="titulo" style="width: 150px;">NRO DE CUENTA:</td>
                <td style="text-align: left">898111123004</td>
            </tr>
            <tr>
                <td class="titulo" style="width: 150px;">SWIFT:</td>
                <td style="text-align: left">026009593</td>
            </tr>
            <tr>
                <td class="titulo" style="width: 150px;">ABA:</td>
                <td style="text-align: left">063100277</td>
            </tr>
            <tr>
                <td class="titulo" style="width: 150px;">ZELLE:</td>
                <td style="text-align: left">administracion@goldcoastus.com</td>
            </tr>
        </table>

    </page_footer>
</page>
