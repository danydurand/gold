<?php
require_once('qcubed.inc.php');

/* @var $objGuiaImpr Guias */
$objGuiaImpr = unserialize($_SESSION['GuiaImpr']);
$intAnchPagi = "680px";
$intMediPagi = "340px";
$strTextMens = "Guia Aerea";
$strFechDhoy = date('d/m/Y');
$strNumeGuia = $objGuiaImpr->Numero;
$strNombRemi = $objGuiaImpr->NombreRemitente;
$strCeduRifx = $objGuiaImpr->ClienteRetail->CedulaRif;
$intCantPiez = $objGuiaImpr->Piezas;
$strNombDest = $objGuiaImpr->Destino->Nombre;
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
                    <?php //include('guia_exp_tabla1.php') ?>
                    <table style="border: solid .5mm;">
                        <tr>
                            <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
                                REMITENTE / SENDER
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px;">Nombre:<br>Name:</td>
                            <td colspan="3"><?= $strNombRemi ?></td>
                        </tr>
                        <tr>
                            <td style="width: 100px;">Nombre:<br>Name:</td>
                            <td colspan="3"><?= $strNombRemi ?></td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </td>
                <td style="width: <?= $intMediPagi ?>;">
                    <?php //include('guia_exp_tabla2.php') ?>
                    Tabla de la Derecha
                </td>
            </tr>
        </table>
    </page_header>
</page>