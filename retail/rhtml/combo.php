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
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table style="margin-top: 48px;">
            <tr>
                <td style="width: <?= $intAnchPagi ?>; text-align: right">
                    FECHA: <?= $strFechDhoy ?>
                </td>
            </tr>
        </table>
        <br>
        <table style="margin-top: 12px;">
            <tr>
                <td class="parrafo">
                    Señores<br><br>
                    GUARDIA NACIONAL BOLIVARIANA COMANDO DE OPERACIONES, COMANDO ANTIDROGA,
                    UNIDAD ESPECIAL ANTIDROGAS DE MAIQUETIA<br>
                    Cc: RESGUARDO NACIONAL.
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    <br><br>Su Despacho<br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    Por medio de la presente, Yo: <?= $strNombRemi ?>, C.I. / R.I.F. Nro <?= $strCeduRifx ?> hacemos constar
                    que se esta exportando <?= $intCantPiez ?> bulto(s) que serán embarcados con el Nro de Guía Aérea
                    <?= $strNumeGuia ?>, con destino a <?= $strNombDest ?> en el vuelo de ________________.
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    <b>BAJO FE DE JURAMENTO</b>, declaro que en el embarque en referencia no se transporta ningún tipo de
                    substancia estupefaciente o psicotrópica de las señaladas o especificadas en la <b>LEY ORGANICA DE DROGA</b>,
                    asumiendo toda responsabilidad y rigor que pueda derivarse de la tramitación y agenciamiento de la mercancía,
                    bienes y los útiles contenidos en este embarque.
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    Sin otro particular a que hacer referencia, me despido de Usted, dando fe de lo expuesto, firmando conforme,
                    <br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    Atentamente,
                    <br><br><br>
                </td>
            </tr>
            <tr>
                <td class="parrafo">
                    Nombre de la Compañía <br>
                    _____________________________________________________________________________<br>
                    Nombre y Apellido <br>
                    _____________________________________________________________________________<br>
                    Cargo: (solo para personas Jurídicas) <br>
                    _____________________________________________________________________________<br>
                    Teléfono: <br>
                    _____________________________________________________________________________<br>
                    Firma y C.I.: <br>
                    _____________________________________________________________________________<br>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table>
            <tr>
                <td style="vertical-align: middle; width: 490px;">
                    Nota: Las huellas deben ser colocadas de manera adecuada y visible</td>
                <td>
                    <table>
                        <tr>
                            <td style="text-align: center;">
                                Huellas Dactilares:<br>
                                (pulgares izquierdo y derecho)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td style="border: solid .5mm; width: 80px;">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                        <td style="border: solid .5mm; width: 80px;">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </page_footer>
</page>