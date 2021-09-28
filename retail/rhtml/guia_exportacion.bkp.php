<?php
require_once('qcubed.inc.php');

/* @var $objGuiaImpr Guias */
/* @var $objPiezGuia GuiaPiezas */
$objGuiaImpr = unserialize($_SESSION['GuiaImpr']);
$arrImpoGuia = unserialize($_SESSION['ImpoGuia']);
$objPiezGuia = unserialize($_SESSION['PiezGuia']);
$intAnchPagi = "660px";
$intMediPagi = "320px";
$intAnchEtiq = "50px";
$strTextMens = "Guia Aerea";
$strFechDhoy = date('d/m/Y');
$strNumeGuia = $objGuiaImpr->Numero;
$strFechGuia = $objGuiaImpr->Fecha->__toString("DD/MM/YYYY");
$strNombRemi = $objGuiaImpr->NombreRemitente;
$strCeduRifx = $objGuiaImpr->ClienteRetail->CedulaRif;

$intMaxiTama = 46;
$strDireRemi = $objGuiaImpr->DireccionRemitente;
$strDireRem1 = $objGuiaImpr->DireccionRemitente;
$strDireRem2 = '';
$intTamaRemi = strlen($strDireRemi);
if ($intTamaRemi > $intMaxiTama) {
    $strDireRem1 = substr($strDireRemi,0,$intMaxiTama);
    $strDireRem2 = substr($strDireRemi,$intMaxiTama,$intMaxiTama);
}

$strTeleRemi = $objGuiaImpr->TelefonoMovilRemitente;
if (strlen($objGuiaImpr->TelefonoRemitente)) {
    $strTeleRemi .= ' | '.$objGuiaImpr->TelefonoRemitente;
}
$strEmaiRemi = $objGuiaImpr->ClienteRetail->Email;
$intCantPiez = $objGuiaImpr->Piezas;
$strSucuOrig = $objGuiaImpr->Origen->Iata;
$strNombDest = $objGuiaImpr->NombreDestinatario;

$intMaxiTama = 46;
$strDireDest = $objGuiaImpr->DireccionDestinatario;
t('La direccion de destino es: '.$strDireDest);
$strDireDes1 = $objGuiaImpr->DireccionDestinatario;
$strDireDes2 = '';
$strTamaDest = strlen($strDireDest);
if ($strTamaDest > $intMaxiTama) {
    t('Es mas grande que el maximo');
    $strDireDes1 = substr($strDireDest,0,$intMaxiTama);
    t('1era parte: '.$strDireDes1);
    $strDireDes2 = substr($strDireDest,$intMaxiTama,$intMaxiTama);
    t('2da parte; '.$strDireDes2);
}

$strTeleDest = $objGuiaImpr->TelefonoMovilDestinatario;
if (strlen($objGuiaImpr->TelefonoDestinatario)) {
    $strTeleDest .= ' | '.$objGuiaImpr->TelefonoDestinatario;
}
$strCeduDest = $objGuiaImpr->CedulaDestinatario;
$strSucuDest = $objGuiaImpr->Destino->Iata;
$strServEntr = $objGuiaImpr->ServicioEntrega;
$strCodiProd = $objGuiaImpr->Producto->Codigo;
$decKiloGuia = $objPiezGuia->Kilos;
$decAltoGuia = $objPiezGuia->Alto;
$decAnchGuia = $objPiezGuia->Ancho;
$decLargGuia = $objPiezGuia->Largo;
$decVoluGuia = $objPiezGuia->Volumen;
$strDescCont = $objGuiaImpr->Contenido;
$strTotaGuia = $objGuiaImpr->Total;
$strFormPago = $objGuiaImpr->FormaPago;
$strNombEsta = $objGuiaImpr->Estado;
$strNombCiud = $objGuiaImpr->Ciudad;
$strCodiPost = $objGuiaImpr->CodigoPostal;
$strPiezGuia = $objPiezGuia->IdPieza;
$intNumePiez = (int)explode('-',$strPiezGuia)[1];
$strCantPiez = $intNumePiez.' / '.$objGuiaImpr->Piezas;
$strTamaLetr = '6px';
?>
<style type="text/css">
    .titulo {
        background-color: #CCC;
        font-weight: bold;
        width: 100%;
        text-align: center;
    }
    .destacado {
        background-color: #CCC;
        font-weight: bold;
        font-size: 28px;
    }
    .etiqueta {
        font-weight: bold;
        width: 12%;
    }
    .contenido {
        font-size: 12px;
        width: 70%;
    }
    .parrafo {
        width: <?= $intAnchPagi ?>;
        text-align: justify;
        font-size: 10px;
        line-height: 20px;
    }
</style>
<page backtop="10mm" backbottom="10mm" backleft="8mm" backright="8mm">
    <page_header>
        <table style="margin-top: 12px; width: 100%" border="0">
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    <?php include('logo_gold_exp.php') ?>
                    <?php include('info_remitente_exp.php') ?>
                    <?php include('info_destinatario_exp.php') ?>
                    <?php include('info_destino_exp.php') ?>
                    <?php include('dimensiones_y_peso_exp.php') ?>
                    <?php include('barra_y_qr_exp.php') ?>
                </td>
                <td style="width: 50%; vertical-align: top;">
                    <?php include('terminos_y_condiciones_exp.php') ?>
                </td>
            </tr>
        </table>
    </page_header>
</page>