<?php
require_once('qcubed.inc.php');

/* @var $objGuiaImpr Guias */
$objGuiaImpr = unserialize($_SESSION['GuiaImpr']);
$intAnchPagi = "680px";
$strTextMens = "CARTA ANTI-DROGA";
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
                    asumiendo toda responsabilidad y rigor que pueda derivarse de la tramitación y egenciamiento de la mercancía,
                    biene y los útiles contenidos en este embarque.
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