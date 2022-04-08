<style type="text/css">
    <!--
    .titulo {
        background-color: #CCC;
        font-weight: bold
    }
    .renglon {
        background-color: #CCC;
        font-weight: bold;
        text-align: right;
        width: 130px;
    }
    .valor {
        text-align: left;
        width: 100px;
    }
    .concepto {
        text-align: right;
        width: 135px;
    }
    -->
</style>

<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['FactIdxx'])) {
    echo "Se requiere un Nro de Factura para Imprimir...";
    return;
}
$strLimiDere = '350px';
$intFactIdxx = $_SESSION['FactIdxx'];
$objFactImpr = Facturas::Load($intFactIdxx);
try {
    $arrGuiaFact = $objFactImpr->GetFacturaGuiasAsFacturaArray();
    $objClauOrde = QQ::OrderBy(QQN::FacturaItems()->Concepto->Orden);
    $arrItemFact = $objFactImpr->GetFacturaItemsAsFacturaArray($objClauOrde);
    $arrPagoFact = $objFactImpr->GetFacturaPagosAsFacturaArray();
} catch (Exception $e) {
    t("Error en impresion de Factura (Id: $intFactIdxx): ".$e->getMessage());
}
?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <!---------------------->
        <!--     RECUADROS    -->
        <!---------------------->
        <table style="margin-top: 200px; margin-left: -3px;">
            <tr>
                <td style="width: 300px">
                    <table style=" border: solid .5mm">
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 300px">RAZON SOCIAL:</td>
                        </tr>
                        <tr>
                            <td style="width: 300px"><?= $objFactImpr->RazonSocial ?></td>
                        </tr>
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 300px">DIRECCION:</td>
                        </tr>
                        <tr>
                            <td style="width: 300px"><?= $objFactImpr->DireccionFiscal ?></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 130px">
                </td>
                <td style="width: 230px; vertical-align: top">
                    <table style=" border: solid .5mm">
                        <tr>
                            <td class="renglon">FACTURA:</td>
                            <td class="valor"><?= $objFactImpr->Referencia ?></td>
                        </tr>
                        <tr>
                            <td class="renglon">FECHA:</td>
                            <td class="valor"><?= $objFactImpr->Fecha->__toString("DD/MM/YYYY") ?></td>
                        </tr>
                        <tr>
                            <td class="renglon">CED/RIF:</td>
                            <td class="valor"><?= $objFactImpr->CedulaRif ?></td>
                        </tr>
                        <tr>
                            <td class="renglon">TELEFONO:</td>
                            <td class="valor"><?= $objFactImpr->Telefono ?></td>
                        </tr>
                        <tr>
                            <td class="renglon">CONDICION PAGO:</td>
                            <td class="valor">5 DIAS</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table style="margin-top: 24px; width: 100%; font-size: small">
            <tr>
                <td style="width: 65%; text-align: center; vertical-align: top">
                    <!------------------>
                    <!--     GUIAS    -->
                    <!------------------>
                    <table style="width: 100%; border: solid .5mm;">
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 55px; text-align: center">GUIA</td>
                            <td style="width: 270px; text-align: left">CONTENIDO</td>
                            <td style="width: 40px; text-align: center">DEST</td>
                            <td style="width: 38px; text-align: center">PRD</td>
                            <td style="width: 35px; text-align: center">KG</td>
                            <td style="width: 35px; text-align: center">PZAS</td>
                            <td style="width: 70px; text-align: center">A x A x L</td>
                            <td style="width: 32px; text-align: center">PIES3</td>
                            <td style="width: 60px; text-align: right">MONTO</td>
                        </tr>
                        <?php foreach ($arrGuiaFact as $objGuiaFact) { ?>
                        <tr>
                            <td style="width: 55px; text-align: center"><?= $objGuiaFact->Guia->Numero ?></td>
                            <td style="width: 270px; text-align: left"><?= $objGuiaFact->Guia->Contenido ?></td>
                            <td style="width: 40px; text-align: center"><?= $objGuiaFact->Guia->Destino->Iata ?></td>
                            <td style="width: 38px; text-align: center"><?= $objGuiaFact->Guia->Producto->Codigo ?></td>
                            <td style="width: 35px; text-align: center"><?= $objGuiaFact->Guia->Kilos ?></td>
                            <td style="width: 35px; text-align: center"><?= $objGuiaFact->Guia->Piezas ?></td>
                            <td style="width: 70px; text-align: center"><?= $objGuiaFact->Guia->__medidas() ?></td>
                            <td style="width: 32px; text-align: center"><?= $objGuiaFact->Guia->PiesCub ?></td>
                            <td style="width: 60px; text-align: right"><?= nf($objGuiaFact->Guia->Total) ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        </table>
        <table style="margin-left:377px; font-size: small">
            <tr>
                <td style="width: 35%; text-align: right; vertical-align: top">
                    <!------------------>
                    <!--   IMPORTES   -->
                    <!------------------>
                    <table style="width: 100%; border: solid .5mm;">
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 100px; text-align: center">CONCEPTO</td>
                            <td style="width: 80px; text-align: right">MONTO USD</td>
                            <td style="width: 80px; text-align: right">MONTO Bs</td>
                        </tr>
                        <?php foreach ($arrItemFact as $objItemFact) { ?>
                            <tr>
                                <td class="concepto"><?= $objItemFact->Concepto->MostrarComo ?>:</td>
                                <td style="text-align: right"><?= $objItemFact->MontoEnUSD() ?></td>
                                <td style="text-align: right"><?= nf($objItemFact->Monto) ?></td>
                            </tr>
                        <?php } ?>
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="text-align: center">TOTAL</td>
                            <td style="text-align: right"><?= $objFactImpr->TotaDola() ?></td>
                            <td style="text-align: right"><?= nf($objFactImpr->Total) ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <?php if (count($arrPagoFact)) { ?>
        <table style="margin-top: 24px; width: 100%; border: solid .5mm; font-size: small">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 120px; text-align: left">FORMA PAGO</td>
                <td style="width: 60px; text-align: center">MONEDA</td>
                <td style="width: 80px; text-align: center">REF</td>
                <td style="width: 110px; text-align: left">BANCO</td>
                <td style="width: 100px; text-align: right">MTO PAGO</td>
                <td style="width: 80px; text-align: right">MTO USD</td>
                <td style="width: 100px; text-align: right">MTO EN BSD</td>
            </tr>
            <?php $decAcumBoli = 0 ?>
            <?php $decAcumDola = 0 ?>
            <?php foreach ($arrPagoFact as $objPagoFact) { ?>
                <?php $strNombBanc = !is_null($objPagoFact->BancoId) ? $objPagoFact->Banco->Descripcion : null ?>
                <tr>
                    <td style="width: 115px; text-align: left"><?= $objPagoFact->FormaPago->Descripcion ?></td>
                    <td style="width: 60px; text-align: center"><?= $objPagoFact->Divisa->Codigo ?></td>
                    <td style="width: 80px; text-align: center"><?= $objPagoFact->Referencia ?></td>
                    <td style="width: 110px; text-align: left"><?= $strNombBanc ?></td>
                    <td style="width: 90px; text-align: right"><?= nf($objPagoFact->MontoDivisa) ?></td>
                    <td style="width: 70px; text-align: right"><?= nf($objPagoFact->MontoUsd) ?></td>
                    <td style="width: 100px; text-align: right"><?= nf($objPagoFact->MontoBs) ?></td>
                </tr>
                <?php $decAcumBoli += $objPagoFact->MontoBs ?>
                <?php $decAcumDola += $objPagoFact->MontoUsd ?>
            <?php } ?>
            <tr>
                <td style="width: 115px; text-align: left"></td>
                <td style="width: 60px; text-align: center"></td>
                <td style="width: 80px; text-align: center"></td>
                <td style="width: 110px; text-align: left"></td>
                <td style="width: 90px; text-align: right; font-weight: bold">TOTALES</td>
                <td style="width: 70px; text-align: right"><?= nf($decAcumDola) ?></td>
                <td style="width: 100px; text-align: right"><?= nf($decAcumBoli) ?></td>
            </tr>
        </table>
        <?php } ?>
    </page_header>

</page>
