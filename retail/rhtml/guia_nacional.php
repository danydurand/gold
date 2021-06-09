<?php
require_once('qcubed.inc.php');

/* @var $objGuiaImpr Guias */
$objGuiaImpr = unserialize($_SESSION['GuiaImpr']);
$arrImpoGuia = unserialize($_SESSION['ImpoGuia']);
$intAnchPagi = "660px";
$intMediPagi = "320px";
$intAnchEtiq = "50px";
$strTextMens = "Guia Aerea";
$strFechDhoy = date('d/m/Y');
$strNumeGuia = $objGuiaImpr->Numero;
$strFechGuia = $objGuiaImpr->Fecha->__toString("DD/MM/YYYY");
$strNombRemi = $objGuiaImpr->NombreRemitente;
$strCeduRifx = $objGuiaImpr->ClienteRetail->CedulaRif;
$strDireRemi = $objGuiaImpr->DireccionRemitente;
$strTeleRemi = $objGuiaImpr->TelefonoRemitente;
$strEmaiRemi = $objGuiaImpr->ClienteRetail->Email;
$intCantPiez = $objGuiaImpr->Piezas;
$strSucuOrig = $objGuiaImpr->Origen->Iata;
$strNombDest = $objGuiaImpr->NombreDestinatario;
$strDireDest = $objGuiaImpr->DireccionDestinatario;
$strTeleDest = $objGuiaImpr->TelefonoDestinatario;
$strCeduDest = $objGuiaImpr->CedulaDestinatario;
$strSucuDest = $objGuiaImpr->Destino->Iata;
$strServEntr = $objGuiaImpr->ServicioEntrega;
$strCodiProd = $objGuiaImpr->Producto->Codigo;
$strKiloGuia = $objGuiaImpr->Kilos;
$strDescCont = $objGuiaImpr->Contenido;
$strTotaGuia = $objGuiaImpr->Total;
$strFormPago = $objGuiaImpr->FormaPago;
?>
<style type="text/css">
    <!--
    .titulo {
        background-color: #CCC;
        font-weight: bold
    }

    .destacado {
        background-color: #CCC;
        font-weight: bold;
        font-size: 20px;
    }

    .etiqueta {
        font-weight: bold;
    }

    .parrafo {
        width: <?= $intAnchPagi ?>;
        text-align: justify;
        font-size: 10px;
        line-height: 20px;
    }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="8mm" backright="8mm">
    <page_header>
        <table style="margin-top: 24px;">
            <tr>
                <td style="width: <?= $intMediPagi ?>; vertical-align: top;">
                    <?php //include('guia_nac_tabla1.php') ?>
                    <table style="border: solid .5mm;">
                        <tr>
                            <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
                                REMITENTE
                            </td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Nombre:</td>
                            <td colspan="3"><?= $strNombRemi ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Dirección:</td>
                            <td colspan="3"><?= $strDireRemi ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">E-mail:</td>
                            <td colspan="3"><?= $strEmaiRemi ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Telefono:</td>
                            <td><?= $strTeleRemi ?></td>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>; text-align: right">Origen:</td>
                            <td class="destacado" style="text-align: center;"><?= $strSucuOrig ?></td>
                        </tr>
                        <tr>
                            <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
                                DESTINATARIO
                            </td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Nombre:</td>
                            <td><?= $strNombDest ?></td>
                            <td class="etiqueta" style="text-align: right">Cédula:</td>
                            <td><?= $strCeduDest ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Dirección:</td>
                            <td colspan="3"><?= $strDireDest ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Telefono:</td>
                            <td><?= $strTeleDest ?></td>
                            <td class="etiqueta" style="width: <?= $intAnchEtiq ?>; text-align: right">Destino:</td>
                            <td class="destacado" style="text-align: center;"><?= $strSucuDest ?></td>
                        </tr>
                        <tr>
                            <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
                                FIRMA
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: 70px; vertical-align: top;">Declaración:</td>
                            <td colspan="3">
                                &nbsp;&nbsp;El Remitente declara que no envía, dinero en <br>
                                &nbsp;efectivo, objetos de valor ni objetos prohíbidos.
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: <?= $intMediPagi ?>; vertical-align: top;">
                    <?php //include('guia_nac_tabla2.php') ?>
                    <table style="border: solid .5mm;">
                        <tr>
                            <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
                                DATOS DEL ENVIO
                            </td>
                        </tr>
                        <tr style="vertical-align: middle;">
                            <td class="etiqueta" style="width: 70px;">Nro Guía:</td>
                            <td class="destacado" style="text-align: right"><?= $strNumeGuia ?>-001</td>
                        </tr>
                        <tr style="vertical-align: middle;">
                            <td class="etiqueta" style="width: 70px;">Fecha:</td>
                            <td><?= $strFechGuia ?></td>
                            <td class="etiqueta" style="width: 70px; text-align: right">F. Pago:</td>
                            <td><?= $strFormPago ?></td>
                        </tr>
                        <tr style="vertical-align: middle;">
                            <td class="etiqueta" style="width: 70px;">Serv. Entr:</td>
                            <td><?= $strServEntr ?></td>
                            <td class="etiqueta" style="width: 70px; text-align: right">Producto:</td>
                            <td><?= $strCodiProd ?></td>
                        </tr>
                        <tr style="vertical-align: middle;">
                            <td class="etiqueta" style="width: 70px;">Peso:</td>
                            <td><?= $strKiloGuia ?> kgs</td>
                            <td class="etiqueta" style="width: 70px; text-align: right">Piezas:</td>
                            <td><?= $intCantPiez ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta" style="width: 70px;">Contenido:</td>
                            <td colspan="3"><?= $strDescCont ?></td>
                        </tr>
                        <tr>
                            <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
                                IMPORTES
                            </td>
                        </tr>
                        <?php foreach ($arrImpoGuia as $objImpoGuia) { ?>
                            <tr>
                                <td class="etiqueta" style="width: 180px;" colspan="2"><?= $objImpoGuia->MostrarComo ?></td>
                                <td style="text-align: right;" colspan="2"><?= $objImpoGuia->Monto ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="etiqueta" style="width: 180px;" colspan="2">TOTAL</td>
                            <td style="text-align: right;" colspan="2"><?= $strTotaGuia ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </page_header>
</page>