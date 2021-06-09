<?php
$objGuiaImpr = unserialize($_SESSION['GuiaImpr']);
$intAnchPagi = "680px";
$intMediPagi = "340px";
$strTextMens = "Guia Aerea";
$strFechDhoy = date('d/m/Y');
$strNumeGuia = $objGuiaImpr->numero;
$strNombRemi = $objGuiaImpr->nombre_remitente;
$strCeduRifx = $objGuiaImpr->cliente->cedula_rif;
$intCantPiez = $objGuiaImpr->piezas;
$strNombDest = $objGuiaImpr->destino->nombre;
?>
<style type="text/css">
    <!--
    .titulo {
        background-color: #CCC;
        font-weight: bold
    }

    .parrafo {
        width: <?= $intAnchPagi ?>;
        text-align: justify;
        font-size: 16px;
        line-height: 20px;
    }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table style="margin-top: 48px;">
            <tr>
                <td style="width: <?= $intMediPagi ?>;">
                    <?php include('guia_tabla1.php') ?>
                </td>
                <td style="width: <?= $intMediPagi ?>;">
                    <?php include('guia_tabla2.php') ?>
                </td>
            </tr>
        </table>
    </page_header>
</page>