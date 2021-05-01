<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['ManiIdxx'])) {
    echo "Se requiere el Id del Manifiesto a imprimir...";
    return;
}
$intManiIdxx = $_SESSION['ManiIdxx'];
$strNombEmpr = $_SESSION['NombEmpr'];
$objManiImpr = Containers::Load($intManiIdxx);
$strDestOper = implode($objManiImpr->GetDestinos('Nombre'),", ");
$strNombChof = $objManiImpr->Operacion->CodiChofObject->NombChof;
$strCeduChof = $objManiImpr->Operacion->CodiChofObject->NumeCedu;
$strDescVehi = $objManiImpr->Operacion->CodiVehiObject->DescVehi;
$strNumePlac = $objManiImpr->Operacion->CodiVehiObject->NumePlac;
$strFechDhoy = date("d/m/Y H:i");
$strLimiDere = '350px';
$strDireEntr = $objManiImpr->Direccion;
$strNombClie = $objManiImpr->ClienteCorp->NombClie;
$strNumeCont = $objManiImpr->Numero;
$strPrecLate = $objManiImpr->PrecintoLateral;
$strNumeAwbx = $objManiImpr->Awb;
$intCantPiez = $objManiImpr->Piezas;
$decPesoTota = $objManiImpr->Peso;
$strDescCont = $objManiImpr->Contenido;
$strEmprTran = $objManiImpr->Transportista->Nombre;

?>
<style type="text/css">
    .linea1 {
        padding-top: 2em;
    }
    .linea {
        margin-left: 10px;
    }
    tr {
        font-size: 16px;
    }
    li {
        font-size: 16px;
        padding-bottom: 12px;
    }
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <?php include('partials/header_local.tpl.php'); ?>
        <!---------------------->
        <!--    Encabezado    -->
        <!---------------------->
        <table style="margin-top: 24px; margin-left: -3px;">
            <tr>
                <td style="text-align: right"><?= $strFechDhoy; ?><br><br></td>
            </tr>
            <tr>
                <td style="width: 680px; text-align: center">
                    NOTA DE DESPACHO <br><br>
                </td>
            </tr>
        </table>
        <table style="margin-top: 24px; margin-left: -3px;">
            <tr>
                <td style="width: 680px;">
                    <b>CLIENTE:</b> <?= $strNombEmpr ?>
                </td>
            </tr>
            <tr>
                <td style="width: 680px;">
                    <b>DIRECCION:</b> <?= $strDireEntr ?>
                </td>
            </tr>
            <tr>
                <td style="width: 680px;">
                    Estamos haciendo entrega de un envío con las siguientes características:<br><br>
                </td>
            </tr>
        </table>
        <ul>
            <li><span class="linea"><b>PRECINTO TRASERO:</b> <?= $strNumeCont ?></span></li>
            <li><span class="linea"><b>PRECINTO LATERAL:</b> <?= $strPrecLate ?></span></li>
            <li><span class="linea"><b>BL o AWB:</b> <?= $strNumeAwbx ?></span></li>
            <li><span class="linea"><b>BULTOS:</b> <?= $intCantPiez ?> PIEZAS</span></li>
            <li><span class="linea"><b>PESO:</b> <?= $decPesoTota ?> KILOS</span></li>
            <li><span class="linea"><b>EMPRESA TRANSPORTE:</b> <?= $strEmprTran ?></span></li>
            <li><span class="linea"><b>CONTENIDO:</b> <?= $strDescCont ?></span></li>
            <li><span class="linea"><b>CHOFER:</b> <?= $strNombChof ?></span></li>
            <li><span class="linea"><b>PLACA:</b> <?= $strNumePlac ?></span></li>
            <li><span class="linea"><b>CEDULA:</b> <?= $strCeduChof ?></span></li>
        </ul>
    </page_header>

    <page_footer>
        <table>
            <tr class="linea1">
                <td>RECIBI CONFORME: </td>
                <td style="text-align: left">________________________</td>
            </tr>
            <tr class="linea1">
                <td>FIRMA Y SELLO: </td>
                <td style="text-align: left">________________________</td>
            </tr>
            <tr>
                <td>C.I: </td>
                <td style="text-align: left">________________________</td>
            </tr>
            <tr>
                <td>FECHA: </td>
                <td style="text-align: left">________________________</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>HORA DE LLEGADA: </td>
                <td style="text-align: left">______</td>
                <td>HORA DE SALIDA: </td>
                <td style="text-align: left">______</td>
            </tr>
            <tr>
                <td colspan="2">CANT DE BULTOS/PIEZAS RECIBIDOS: </td>
                <td colspan="2" style="text-align: left">________</td>
            </tr>
        </table>
        <br><br>
        <table>
            <tr>
                <td style="width: 680px; text-align: center"><b><u>NOTA: POR FAVOR FIRMAR CON LETRA LEGIBLE</u></b></td>
            </tr>
        </table>
        <br><br>
        <table>
            <tr>
                <td><b><u>NOTA:</u></b></td>
            </tr>
            <tr>
                <td>1) Hacer conteo y chequeo de la mercancía en el momento de la descarga.</td>
            </tr>
            <tr>
                <td>2) La firma de esta nota de entrega se considera la aceptación de su contenido.</td>
            </tr>
        </table>
    </page_footer>
</page>
