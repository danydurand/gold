<?php
require_once('qcubed.inc.php');

/* @var $objGuiaImpr Guias */
$objGuiaImpr  = unserialize($_SESSION['GuiaImpr']);
$intAnchPagi  = "680px";
$intMediPagi  = "340px";
$strLimiDere  = '350px';
$strTextMens  = "ACUERDO DE LIBERACION DE RESPONSABILIDAD";
$strFechDhoy  = date('d/m/Y');
$strNumeGuia  = $objGuiaImpr->Numero;
$strNombRemi  = $objGuiaImpr->NombreRemitente;
$strCeduRifx  = $objGuiaImpr->ClienteRetail->CedulaRif;
$intCantPiez  = $objGuiaImpr->Piezas;
$strNombDest  = $objGuiaImpr->Destino->Nombre;
$strDescCont  = $objGuiaImpr->Contenido;
$strNombEmpr  = 'Gold Coast Custom Express';
$strNombCort  = 'Gold Coast';
$strDireEmpr  = 'Calle Angulo Sur Oeste de la manzana "E", Edificio Gold Coast Custom Express, C.A.';
$strDireEmpr .= 'Piso S/N, local S/N, sector Pariata. Maiquetia. Edo Vargas';
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
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <?php include('partials/header_logolocal.tpl.php'); ?>
        <table style="margin-top: 12px;">
            <tr>
                <td class="parrafo" style="text-align: center;">
                    <?= $strTextMens ?>
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    Entre <?= $strNombRemi ?>, remitente de <?= $strDescCont ?> y <?= $strNombEmpr ?>, 
                    ubicado en <?= $strDireEmpr ?>.
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    A través de la firma de este acuerdo, nosotros, el remitente nombrado en la guía aerea
                    abajo indicada, autorizo a <?= $strNombEmpr ?> a transportar todos los items entregados
                    por nosotros.
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    Este acuerdo es adicional a los términos y condiciones de la guía aérea, los cuales entendemos
                    y aceptamos. Nosotros acordamos que el transporte de tales items son aceptados solo bajo la
                    premisa de este acuerdo y tales términos y condiciones aplican.
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    Se entiende que <?= $strNombEmpr ?> no se hará responsable de reconocer algún seguro
                    de tales items en contra de cualquier riesgo, y nosotros confirmamos que contrataremos 
                    un seguro por la suma y contra el riesgo que sea apropiado bajo nuestra responsabilidad. 
                    Nosotros garantizamos que contendrá una liberación de responsabilidad a favor de <?= $strNombEmpr ?>.
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    <?= $strNombEmpr ?> no tendrá responsabilidad alguna por pérdida o daño que surja
                    sobre cualquier item en relación al cual nosotros no hayamos contratado el seguro
                    ofrecido por <?= $strNombEmpr ?>.
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    <?= $strNombEmpr ?> no tendrá responsabilidad alguna surgido de cualquier circunstancia.
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    Nosotros liberamos a <?= $strNombEmpr ?> de cualquier responsabilidad hacia cualquier 
                    persona que pueda tener interés en el envío mencionado, y nosotros liberamos a <?= $strNombEmpr ?>
                    de cualquier responsabilidad de cualquier persona, en excedente del monto que surja de 
                    circunstancias exógenas a aquellas por las cuales <?= $strNombEmpr ?> aceptar responsabilidad 
                    bajo sus términos y condiciones y bajo los de esta carta.
                    <br><br><br>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="medio_parrafo">
                    Por <?= $strNombCort ?> ________________________
                </td>
                <td class="medio_parrafo">
                    Por el Remitente ________________________
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td class="medio_parrafo">
                    Cargo _______________________________
                </td>
                <td class="medio_parrafo">
                    Cargo _________________________________
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td class="medio_parrafo">
                    Fecha: <?= $strFechDhoy ?>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td class="medio_parrafo">
                    Número de Guía: <?= $strNumeGuia ?>
                </td>
            </tr>
        </table>
    </page_header>
</page>