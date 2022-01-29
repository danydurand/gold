<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    -->
</style>

<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['NotaCred'])) {
    echo "Se requiere una Nota de Credito para para Imprimir...";
    return;
}
$strLimiDere = '350px';
/* @var objNotaCred NotaCreditoCorp */
$objNotaCred = unserialize($_SESSION['NotaCred']);
// $objNotaCred = Facturas::Load($intFactIdxx);
// $strNombBanc = Parametros::BP('DATOBANC','NOMBBANC','Txt1','BANK OF AMERICA');
// $strNombBene = Parametros::BP('DATOBANC','NOMBBENE','Txt1','GOLD COAST CUSTOM EXPRESS CORP');
// $strTipoCnta = Parametros::BP('DATOBANC','TIPOCNTA','Txt1','Business Fundamentals Chk');
// $strNrodCnta = Parametros::BP('DATOBANC','NRODCNTA','Txt1','8981 1112 7602');
// $strNrodSwif = Parametros::BP('DATOBANC','NRODSWIF','Txt1','026009593');
// $strNrodAbax = Parametros::BP('DATOBANC','NRODABAX','Txt1','063000047');
// $strCntaZell = Parametros::BP('DATOBANC','CNTAZELL','Txt1','administracion@goldcoastus.com');

?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <?php include('partials/header_local.tpl.php'); ?>
        <!---------------------->
        <!--     RECUADROS    -->
        <!---------------------->
        <table style="margin-top: 24px; margin-left: -3px;">
            <tr>
                <td style="width: 300px">
                    <table style=" border: solid .5mm">
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 300px">CUSTOMER:</td>
                        </tr>
                        <tr>
                            <td style="width: 300px"><?= $objNotaCred->ClienteCorp->NombClie ?></td>
                        </tr>
                        <tr style="background-color: #CCC; font-weight: bold">
                            <td style="width: 300px">ADDRESS:</td>
                        </tr>
                        <tr>
                            <td style="width: 300px"><?= $objNotaCred->ClienteCorp->DireccionFiscal ?></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 115px">
                </td>
                <td style="width: 230px; vertical-align: top">
                    <table style=" border: solid .5mm">
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">REFERENCE:</td>
                            <td style="width: 100px; text-align: right"><?= $objNotaCred->Referencia ?></td>
                        </tr>
                        <tr>
                            <td style="width: 130px; background-color: #CCC; font-weight: bold">DATE:</td>
                            <td style="width: 100px; text-align: right"><?= $objNotaCred->Fecha->__toString("DD/MM/YYYY") ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!------------------------------->
        <!-- LISTA DE NOTAS DE ENTREGA -->
        <!------------------------------->
        <table style="margin-top: 24px; border: solid .5mm">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style=" width: 420px;">Description</td>
                <td style="width: 120px; text-align: center">Date</td>
                <td style="width: 120px; text-align: right">Amount</td>
            </tr>
            <tr>
                <td><?= $objNotaEntr->Referencia ?></td>
                <td style="text-align: center"><?= $objNotaEntr->Fecha->__toString("DD/MM/YYYY") ?></td>
                <td style="text-align: right"><?= nf($objNotaEntr->Monto) ?></td>
            </tr>
        </table>
    </page_header>

    <page_footer>
    </page_footer>
</page>
