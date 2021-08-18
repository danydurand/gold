<?php
require_once('qcubed.inc.php');

if (!isset($_SESSION['FactIdxx'])) {
    echo "Se requiere el Nro de Factura cuya relación de Manifiestos se desea imprimir...";
    return;
}
/* @var $objFactOrig Facturas */
/* @var $objFactImpr NotaEntrega */
$objFactOrig  = unserialize($_SESSION['FactMani']);
$arrTariAgen  = TarifaAgentes::Load($objFactOrig->ClienteCorp->TarifaAgenteId);
$strCadeSqlx  = "select * ";
$strCadeSqlx .= "  from v_factura_zona ";
$strCadeSqlx .= " where factura_id = ".$objFactOrig->Id;
$strCadeSqlx .= " order by zona";
$objDatabase  = Facturas::GetDatabase();
$objDbResult  = $objDatabase->Query($strCadeSqlx);
$arrFactImpr  = [];
//$decTotaFact  = 0;
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strServComp   = $mixRegistro['servicio_importacion'] == 'AER' ? 'AEREO' : 'MARITIMO';
    $decPesoPiez   = $strServComp == 'AEREO' ? $mixRegistro['kilos'] : $mixRegistro['pies_cub'];
    $objClauWher   = QQ::Clause();
    $objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->TarifaId,$mixRegistro['tarifa_agente_id']);
    $objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->Zona,$mixRegistro['zona_id']);
    $objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->Servicio,$strServComp);
    $arrTariServ   = TarifaAgentesZonas::QueryArray(QQ::AndCondition($objClauWher));
    $objTariServ   = $arrTariServ[0];
    $mixRegistro['tarifa'] = $objTariServ->Precio;
    $mixRegistro['total']  = nf($objTariServ->Precio * $decPesoPiez);
    //$decTotaFact  += $mixRegistro['total'];
    $arrFactImpr[] = $mixRegistro;
}

$strLimiDere = '350px';
?>

<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    -->
</style>
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
                            <td style="width: 300px"><?= $objFactOrig->RazonSocial ?></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 115px">
                </td>
                <td style="width: 230px; vertical-align: top">
                    <table style=" border: solid .5mm">
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">INVOICE:</td>
                            <td style="width: 100px; text-align: right"><?= $objFactOrig->Referencia ?></td>
                        </tr>
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">DATE:</td>
                            <td style="width: 100px; text-align: right"><?= $objFactOrig->Fecha->__toString("DD/MM/YYYY") ?></td>
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
                    <b>MANIFESTS LIST By ZONE</b>
                </td>
            </tr>
        </table>
        <table style="margin-top: 12px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 175px;">Zona</td>
                <td style="width: 175px;">Manif/Reference</td>
                <td style="width: 55px; text-align: center">Pieces</td>
                <td style="width: 55px; text-align: right">Kgs</td>
                <td style="width: 60px; text-align: right">Ft3</td>
                <td style="width: 50px; text-align: right">Price</td>
                <td style="width: 65px; text-align: right">Total</td>
            </tr>
            <?php foreach ($arrFactImpr as $objFactImpr) { ?>
                <tr>
                    <td><?= $objFactImpr['zona'] ?></td>
                    <td><?= $objFactImpr['manifiesto'] ?></td>
                    <td style="text-align: center"><?= $objFactImpr['piezas'] ?></td>
                    <td style="text-align: right"><?= nf($objFactImpr['kilos']) ?></td>
                    <td style="text-align: right"><?= nf3($objFactImpr['pies_cub']) ?></td>
                    <td style="text-align: right"><?= nf($objFactImpr['tarifa']) ?></td>
                    <td style="text-align: right"><?= nf($objFactImpr['total']) ?></td>
                </tr>
            <?php } ?>
            <tr style="background-color: #CCC; font-weight: bold">
                <td>Totals</td>
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
                <td style="text-align: right"><?= nf($objFactOrig->Total) ?></td>
            </tr>
        </table>
    </page_header>

</page>
