<?php
require_once('qcubed.inc.php');

if (!isset($_SESSION['GuiaSele'])) {
    echo "Se requiere la Guia a imprimir...";
    return;
}
/* @var $objGuiaImpr Guias */
$objGuiaImpr = unserialize($_SESSION['GuiaSele']);
$strNombEmpr = $_SESSION['NombEmpr'];
$strLimiDere = '350px';
$strFechDhoy = date("d/m/Y H:i");

$strNumeGuia = $objGuiaImpr->Tracking;
$strNombRemi = $objGuiaImpr->NombreRemitente;
$strNombDest = $objGuiaImpr->NombreDestinatario;
$strDireDest = $objGuiaImpr->DireccionDestinatario;
$strTeleDest = $objGuiaImpr->TelefonoDestinatario;
$strFechGuia = $objGuiaImpr->Fecha->__toString("DD/MM/YYYY");
$intCantPiez = $objGuiaImpr->Piezas;
$strServImpo = $objGuiaImpr->ServicioImportacion;
$strDescCont = $objGuiaImpr->Contenido;
$strPesoEnvi = $objGuiaImpr->ServicioImportacion == 'AER' ? $objGuiaImpr->Kilos : $objGuiaImpr->PiesCub;
$strUnidPeso = $objGuiaImpr->ServicioImportacion == 'AER' ? 'Kgs' : 'Pies3';
$strPiezGuia = '';
$arrPiezGuia = $objGuiaImpr->GetGuiaPiezasAsGuiaArray();
foreach ($arrPiezGuia as $objPiezGuia) {
    $strPiezGuia .= $objPiezGuia->IdPieza."<br>";
}

?>
<style type="text/css">
    .linea1 {
        padding-top: 2em;
    }
    .linea {
        margin-left: 10px;
    }
    .etiqueta {
        font-weight: bold;
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
        <?php include('partials/header_simple.tpl.php'); ?>
        <!---------------------->
        <!--    Encabezado    -->
        <!---------------------->
        <table border="1" style="margin-top: 24px;">
            <tr>
                <td style="width: 675px; text-align: center">
                    <span class="etiqueta">NOTA ENTREGA:</span>  <?= $strNumeGuia ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="etiqueta">REMITENTE:</span> <?= $strNombRemi ?>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <span class="etiqueta">C O N S I G N A T A R I O</span>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="width: 350px">
                                <?= $strNombDest ?><br>
                                <?= $strDireDest ?><br>
                                <?= $strTeleDest ?><br>
                            </td>
                            <td style="text-align: center">
                                Codigo QR
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 315px">
                    <table>
                        <tr>
                            <td colspan="2" style="width: 350px"><span class="etiqueta">DATOS:</span><br></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">
                                <span class="etiqueta linea">Piezas:</span>
                            </td>
                            <td>
                                <?= $intCantPiez ?>
                            </td>
                            <td style="text-align: right">
                                <span class="etiqueta linea">Fecha:</span>
                            </td>
                            <td>
                                <?= $strFechDhoy ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">
                                <span class="etiqueta linea">Peso:</span>
                            </td>
                            <td>
                                <?= $strPesoEnvi ?>&nbsp;<?= $strUnidPeso ?>
                            </td>
                            <td style="text-align: right; vertical-align: top">
                                <span class="etiqueta linea">Piezas:</span>
                            </td>
                            <td>
                                <?= $strPiezGuia ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">
                                <span class="etiqueta linea">Serv. Import.:</span>
                            </td>
                            <td>
                                <?= $strServImpo ?>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">
                                <span class="etiqueta linea">Contenido:</span>
                            </td>
                            <td>
                                <?= $strDescCont ?>&nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="etiqueta">NOTA:</span><br><br>
                    NO SE ACEPTA NINGUN TIPO DE RECLAMO DESPUES DE HABER SIDO RECIBIDO Y FIRMADO CONFORME
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="width: 380px; vertical-align: top">
                                <span class="etiqueta">CARGOS:</span>
                            </td>
                            <td style="text-align: right">
                                <table border="1">
                                    <tr>
                                        <td style="width:150px;"><span class="etiqueta">Total Conceptos:</span></td>
                                        <td style="width:115px;"></td>
                                    </tr>
                                    <tr>
                                        <td><br></td><td></td>
                                    </tr>
                                    <tr>
                                        <td><span class="etiqueta">Base:</span></td><td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="width: 380px;">
                                <table border="0">
                                    <tr>
                                        <td style="width:200px; text-align: center;">
                                            <br>
                                            ----------------------------------
                                            <br>Nombre
                                        </td>
                                        <td style="width:115px; text-align: center">
                                            <br>
                                            ---------------------------
                                            <br>Hora
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:200px; text-align: center">
                                            <br>
                                            ----------------------------------
                                            <br># Cajas Recibidas
                                        </td>
                                        <td style="width:115px; text-align: center;">
                                            <br>
                                            ---------------------------
                                            <br>Fecha
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:200px; text-align: center">
                                            <br>
                                            ----------------------------------
                                            <br>Firma
                                        </td>
                                        <td style="width:115px; text-align: center">
                                            <br>
                                            ---------------------------
                                            <br>C.I.
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="text-align: right">
                                <table border="1">
                                    <tr>
                                        <td style="width:150px;">
                                            <br><span class="etiqueta">Total (PPD):</span><br><br>
                                        </td>
                                        <td style="width:115px;">
                                            <br>PREPAGADO<br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:150px;">
                                            <br><span class="etiqueta">Balance (PPD):</span><br><br>
                                        </td>
                                        <td style="width:115px;">
                                            <br>PREPAGADO<br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:150px;">
                                            <br>
                                            <span class="etiqueta">Referencia (PPD):</span><br><br>
                                        </td>
                                        <td style="width:115px;">
                                            <br>PREPAGADO<br><br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </page_header>

</page>
