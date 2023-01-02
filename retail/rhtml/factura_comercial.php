<?php
require_once('qcubed.inc.php');

/* @var $objGuiaImpr Guias */
$objGuiaImpr  = unserialize($_SESSION['GuiaImpr']);
$intAnchPagi  = "680px";
$intMediPagi  = "340px";
$strLimiDere  = '350px';
$strTituRepo  = "INVOICE / FACTURA COMERCIAL";
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
$arrPiezGuia  = $objGuiaImpr->GetGuiaPiezasAsGuiaArray();
$intIdxxItem  = 1;
$intRegiPpag  = 28;
$intCantPagi  = (int)($objGuiaImpr->Piezas / $intRegiPpag);
$intRestDivi  = $objGuiaImpr->Piezas % $intRegiPpag;
if ($intRestDivi > 0) {
    $intCantPagi++;
}
$arrRangRegi = [];
$intLimiInic = 1;
for ($i = 0; $i < $intCantPagi; $i++) {
    $arrRangRegi[$i] = range($intLimiInic,($i+1)*$intRegiPpag);
    $intLimiInic = ($intRegiPpag*($i+1))+1;
}
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
    .recuadro {
        border: solid 1px;
    }
    .contenido {
        font-size: small;
    }
    -->
</style>
<?php for($i = 0; $i < $intCantPagi; $i++) { ?>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table style="margin-top: 36px; width: 100%;">
            <tr>
                <td class="titulo" style="width: 100%">
                    <?= $strTituRepo.' (Pag.'.($i+1).')' ?>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%; margin-top: 12px">
            <tr>
                <td style="width: 50%" class="recuadro">
                    <span class="etiqueta">Shipper / Remitente:</span> <?= $strNombRemi ?>
                </td>
                <td style="width: 25%" class="recuadro">
                    <span class="etiqueta">Date / Fecha:</span> <?= $strFechDhoy ?>
                </td>
                <td style="width: 25%" class="recuadro">
                    <span class="etiqueta">AWB Number:</span> <?= $strNumeGuia ?>
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
                </td>
                <td class="recuadro" style="width: 40%">
                    <?= $strTeleRemi ?>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%">
            <tr>
                <td style="width: 60%" class="recuadro">
                    <span class="etiqueta">Consignee / Destinatario:</span> <?= $strNombDest ?>
                </td>
                <td style="width: 40%" class="recuadro">
                    <span class="etiqueta">Export Reference:</span> <?= $objGuiaImpr->ReferenciaExp ?>
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
                </td>
                <td class="recuadro" style="width: 20%">
                    <?= $strTeleDest ?>
                </td>
                <td class="recuadro" style="width: 40%">
                    <?= $objGuiaImpr->RazonesExp ?>
                </td>
            </tr>
        </table>
        <table style="border: solid; width: 100%;">
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
            <?php /* @var $objPiezGuia GuiaPiezas */ ?>
            <?php foreach ($arrPiezGuia as $objPiezGuia) { ?>
                <?php if (in_array($objPiezGuia->__ordinal(),$arrRangRegi[$i])) { ?>
                    <tr>
                        <td class="recuadro contenido" style="width: 8%; text-align: center">
                            <?= $intIdxxItem ?>
                        </td>
                        <td class="recuadro contenido" style="width: 9%; text-align: center">
                            <?= $objPiezGuia->Empaque ? $objPiezGuia->Empaque->Siglas : 'BOX' ?>
                        </td>
                        <td class="recuadro contenido" style="width: 36%">
                            <?= trim(substr($objPiezGuia->Descripcion,0,37)) ?>
                        </td>
                        <td class="recuadro contenido" style="width: 17%; text-align: center">
                            VENEZUELA
                        </td>
                        <td class="recuadro contenido" style="width: 6%; text-align: center">
                            <?= 1 ?>
                        </td>
                        <td class="recuadro contenido" style="width: 10%; text-align: right">
                            <?= number_format($objPiezGuia->ValorDeclarado,2) ?>
                        </td>
                        <td class="recuadro contenido" style="width: 14%; text-align: right">
                            <?= number_format($objPiezGuia->ValorDeclarado,2) ?>
                        </td>
                    </tr>
                    <?php $intIdxxItem++ ?>
                <?php } ?>
            <?php } ?>
        </table>
        <?php if ($i == $intCantPagi-1) { ?>
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
                <td class="recuadro contenido" style="width: 15%; text-align: right">
                    <?= $objGuiaImpr->Piezas ?>
                </td>
                <td class="recuadro contenido" style="width: 15%; text-align: right">
                    <?= $objGuiaImpr->PiesCub ?>
                </td>
                <td class="recuadro contenido" style="width: 40%">
                </td>
                <td class="recuadro contenido" style="width: 30%; text-align: right">
                    <?= $objGuiaImpr->ValorDeclarado ?>
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
        <?php } ?>
    </page_header>
</page>
<?php } ?>