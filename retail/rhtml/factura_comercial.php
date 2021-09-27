<?php
require_once('qcubed.inc.php');

/* @var $objGuiaImpr Guias */
$objGuiaImpr  = unserialize($_SESSION['GuiaImpr']);
$intAnchPagi  = "680px";
$intMediPagi  = "340px";
$strLimiDere  = '350px';
$strTituRepo  = "PROFORME INVOICE";
$strFechDhoy  = date('d/m/Y');
$strFechGuia  = $objGuiaImpr->Fecha->__toString('DD/MM/YYYY');
$strNumeGuia  = $objGuiaImpr->Numero;
$strDireRemi  = $objGuiaImpr->DireccionRemitente;
$strDireDest  = $objGuiaImpr->DireccionDestinatario;
$strNombRemi  = substr($objGuiaImpr->NombreRemitente,0,30);
$strSucuPais  = '. VENEZUELA';
$strTeleRemi  = $objGuiaImpr->TelefonoMovilRemitente;
if (strlen($objGuiaImpr->TelefonoRemitente)) {
    $strTeleRemi .= ' | '.$objGuiaImpr->TelefonoRemitente;
}
$strCeduRifx  = $objGuiaImpr->ClienteRetail->CedulaRif;
$intCantPiez  = $objGuiaImpr->Piezas;
$strNombDest  = substr($objGuiaImpr->NombreDestinatario,0,30);
$strTeleDest  = $objGuiaImpr->TelefonoMovilDestinatario;
if (strlen($objGuiaImpr->TelefonoDestinatario)) {
    $strTeleDest .= ' | '.$objGuiaImpr->TelefonoDestinatario;
}
$strDescCont  = $objGuiaImpr->Contenido;
$strSucuDest  = $objGuiaImpr->Destino->Nombre.' - USA';
?>
<style type="text/css">
    <!--
    .titulo {
        background-color: #CCC;
        font-weight: bold;
        font-size: 25px;
        text-align: center;
    }
    .etiqueta {
        font-weight: bold;
        vertical-align: top;
    }
    .parrafo {
        /*width: */<?//= $intAnchPagi ?>/*;*/
        width: 100%;
        text-align: justify;
        font-size: 15px;
        line-height: 20px;
        word-wrap: normal;
    }
    .medio_parrafo {
        width: <?= $intMediPagi ?>;
        /* text-align: justify; */
        font-size: 15px;
        line-height: 20px;
    }
    .recuadro {
        border: solid 1px;
    }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table style="margin-top: 36px; width: 100%;">
            <tr>
                <td class="titulo" style="width: 100%">
                    <?= $strTituRepo ?>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%; margin-top: 12px">
            <tr>
                <td style="width: 50%" class="recuadro">
                    <span class="etiqueta">Shipper / Remitente:</span> <?= $strNombRemi ?>
                    <br><br>
                </td>
                <td style="width: 25%" class="recuadro">
                    <span class="etiqueta">Date / Fecha:</span> <?= $strFechDhoy ?>
                    <br><br>
                </td>
                <td style="width: 25%" class="recuadro">
                    <span class="etiqueta">AWB Number:</span> <?= $strNumeGuia ?>
                    <br><br>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%">
            <tr>
                <td class="recuadro etiqueta" style="width: 60%">
                    City / Zip code / Country <br>
                    Ciudad / Codigo Postal / Pais</td>
                <td class="recuadro etiqueta" style="width: 40%">
                    Phone <br>
                    Teléfono
                </td>
            </tr>
            <tr>
                <td class="recuadro" style="width: 60%">
                    <?= $strDireRemi.'  '.$strSucuPais ?>
                    <br><br>
                </td>
                <td class="recuadro" style="width: 40%">
                    <?= $strTeleRemi ?>
                    <br><br>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%">
            <tr>
                <td style="width: 60%" class="recuadro">
                    <span class="etiqueta">Consignee / Destinatario:</span> <?= $strNombDest ?>
                    <br><br>
                </td>
                <td style="width: 40%" class="recuadro">
                    <span class="etiqueta">Export Reference:</span> <?= $objGuiaImpr->ReferenciaExp ?>
                    <br><br>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%">
            <tr>
                <td class="recuadro etiqueta" style="width: 40%">
                    City / Zip code / Country <br>
                    Ciudad / Codigo Postal / Pais
                </td>
                <td class="recuadro etiqueta" style="width: 20%">
                    Phone <br>
                    Teléfono
                </td>
                <td class="recuadro etiqueta" style="width: 40%">
                    Export reasons <br>
                    Razones para exportar
                </td>
            </tr>
            <tr>
                <td class="recuadro" style="width: 40%">
                    <?= $strDireDest.' '.$strSucuDest ?>
                    <br><br>
                </td>
                <td class="recuadro" style="width: 20%">
                    <?= $strTeleDest ?>
                    <br><br>
                </td>
                <td class="recuadro" style="width: 40%">
                    <?= $objGuiaImpr->RazonesExp ?>
                    <br><br>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%">
            <tr>
                <td class="recuadro etiqueta" style="width: 8%">
                    # of Pkg<br>
                    # of Paq
                </td>
                <td class="recuadro etiqueta" style="width: 9%">
                    Type Pkg<br>
                    Tipo Paq
                </td>
                <td class="recuadro etiqueta" style="width: 36%">
                    Detailed Description of Goods<br>
                    Descripción detallada mercancía
                </td>
                <td class="recuadro etiqueta" style="width: 17%; text-align: center">
                    Country Manufact<br>
                    País de Origen
                </td>
                <td class="recuadro etiqueta" style="width: 6%; text-align: center">
                    Qty<br>
                    Cant
                </td>
                <td class="recuadro etiqueta" style="width: 10%; text-align: right">
                    Unit Value<br>
                    Valor Unit.
                </td>
                <td class="recuadro etiqueta" style="width: 14%; text-align: right">
                    Sub-Total<br>
                    Sub-Total
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%">
            <tr>
                <td class="recuadro etiqueta" style="width: 8%; text-align: center">
                    <?= $objGuiaImpr->Piezas ?>
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 9%; text-align: center">
                    BOX
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 36%">
                    <?= $objGuiaImpr->Contenido ?>
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 17%; text-align: center">
                    VENEZUELA
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 6%; text-align: center">
                    <?= $objGuiaImpr->Piezas ?>
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 10%; text-align: right">
                    <?= $objGuiaImpr->ValorDeclarado ?>
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 14%; text-align: right">
                    <?= number_format($objGuiaImpr->Total,2) ?>
                    <br><br>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%">
            <tr>
                <td class="recuadro etiqueta" style="width: 15%">
                    Total Pcs<br>
                    Total Pzas
                </td>
                <td class="recuadro etiqueta" style="width: 15%">
                    Total Weight<br>
                    Peso Total
                </td>
                <td class="recuadro etiqueta" style="width: 40%">
                    All currency in USD<br>
                    Todos los valores en USD
                </td>
                <td class="recuadro etiqueta" style="width: 30%; text-align: right">
                    Declared Value<br>
                    Valor Declarado
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%">
            <tr>
                <td class="recuadro etiqueta" style="width: 15%">
                    <?= $objGuiaImpr->Piezas ?>
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 15%">
                    <?= $objGuiaImpr->PiesCub ?>
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 40%">
                    <br><br>
                </td>
                <td class="recuadro etiqueta" style="width: 30%; text-align: right">
                    <?= number_format(($objGuiaImpr->Total / $objGuiaImpr->Tasa),2) ?>
                    <br><br>
                </td>
            </tr>
        </table>
        <table style="width: 100%; margin-top: 24px">
            <tr>
                <td>
                    Signatura / Firma:&nbsp;&nbsp;__________________________________
                </td>
                <td>
                    Title / Cargo:&nbsp;&nbsp;___________________________________
                </td>
            </tr>
        </table>
    </page_header>
</page>