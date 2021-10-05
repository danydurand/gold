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
$strLimiDere = '350px';
$intFactIdxx = $_SESSION['FactIdxx'];
$objFactImpr = Facturas::Load($intFactIdxx);
$arrGuiaFact = $objFactImpr->GetFacturaGuiasAsFacturaArray();
$objClauOrde = QQ::OrderBy(QQN::FacturaItems()->Concepto->Orden);
$arrItemFact = $objFactImpr->GetFacturaItemsAsFacturaArray($objClauOrde);
$arrPagoFact = $objFactImpr->GetFacturaPagosAsFacturaArray();
?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <!---------------------->
        <!--     RECUADROS    -->
        <!---------------------->
        <table style="margin-top: 100px; margin-left: -3px;">
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
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">FACTURA:</td>
                            <td style="width: 100px; text-align: right"><?= $objFactImpr->Referencia ?></td>
                        </tr>
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">FECHA:</td>
                            <td style="width: 100px; text-align: right"><?= $objFactImpr->Fecha->__toString("DD/MM/YYYY") ?></td>
                        </tr>
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">CED/RIF:</td>
                            <td style="width: 100px; text-align: right"><?= $objFactImpr->CedulaRif ?></td>
                        </tr>
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">TELEFONO:</td>
                            <td style="width: 100px; text-align: right"><?= $objFactImpr->Telefono ?></td>
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
                            <td style="width: 60px; text-align: center">GUIA</td>
                            <td style="width: 200px; text-align: left">CONTENIDO</td>
                            <td style="width: 60px; text-align: center">DEST</td>
                            <td style="width: 60px; text-align: right">MONTO</td>
                        </tr>
                        <?php foreach ($arrGuiaFact as $objGuiaFact) { ?>
                        <tr>
                            <td style="width: 60px; text-align: center"><?= $objGuiaFact->Guia->Numero ?></td>
                            <td style="width: 180px; text-align: left"><?= $objGuiaFact->Guia->Contenido ?></td>
                            <td style="width: 60px; text-align: center"><?= $objGuiaFact->Guia->Destino->Iata ?></td>
                            <td style="width: 80px; text-align: right"><?= nf($objGuiaFact->Guia->Total) ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
                <td style="width: 35%; text-align: right; vertical-align: top">
                    <!------------------>
                    <!--   IMPORTES   -->
                    <!------------------>
                    <table style="width: 100%; border: solid .5mm;">
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 100px; text-align: center">RUBRO</td>
                            <td style="width: 100px; text-align: right">MONTO</td>
                        </tr>
                        <?php foreach ($arrItemFact as $objItemFact) { ?>
                            <tr>
                                <td style="width: 135px; text-align: left"><?= $objItemFact->Concepto->MostrarComo ?></td>
                                <td style="width: 100px; text-align: right"><?= nf($objItemFact->Monto) ?></td>
                            </tr>
                        <?php } ?>
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
                <td style="width: 100px; text-align: right">MTO EN BS</td>
            </tr>
            <?php foreach ($arrPagoFact as $objPagoFact) { ?>
                <?php $strNombBanc = !is_null($objPagoFact->BancoId) ? $objPagoFact->Banco->Descripcion : null ?>
                <tr>
                    <td style="width: 120px; text-align: left"><?= $objPagoFact->FormaPago->Descripcion ?></td>
                    <td style="width: 60px; text-align: center"><?= $objPagoFact->Divisa->Codigo ?></td>
                    <td style="width: 80px; text-align: center"><?= $objPagoFact->Referencia ?></td>
                    <td style="width: 110px; text-align: left"><?= $strNombBanc ?></td>
                    <td style="width: 100px; text-align: right"><?= nf($objPagoFact->MontoDivisa) ?></td>
                    <td style="width: 80px; text-align: right"><?= nf($objPagoFact->MontoUsd) ?></td>
                    <td style="width: 100px; text-align: right"><?= nf($objPagoFact->MontoBs) ?></td>
                </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </page_header>

</page>
