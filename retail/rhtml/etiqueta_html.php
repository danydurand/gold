<?php
require_once('qcubed.inc.php');

/* @var $objGuiaImpr Guias */
/* @var $objPiezGuia GuiaPiezas */
$objGuiaImpr = unserialize($_SESSION['GuiaEtiqImpr']);
$objPiezGuia = unserialize($_SESSION['PiezEtiqImpr']);
$intAnchPagi = "3000px";
$intMediPagi = "160px";
$intAnchEtiq = "25px";
$intMaxiTama = 20;
$strTextMens = "Guia Aerea";
$strFechDhoy = date('d/m/Y');

$strNumeGuia = $objGuiaImpr->Numero;
$strFechGuia = $objGuiaImpr->Fecha->__toString("DD/MM/YYYY");
$strNombRemi = $objGuiaImpr->NombreRemitente;
$strCeduRifx = 'N/A';

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
$strEmaiRemi = 'N/A';
$intCantPiez = $objGuiaImpr->Piezas;
$strSucuOrig = $objGuiaImpr->Origen->Iata;
$strNombDest = $objGuiaImpr->NombreDestinatario;

$strDireDest = $objGuiaImpr->DireccionDestinatario;
$strDireDes1 = $objGuiaImpr->DireccionDestinatario;
$strDireDes2 = '';
$strTamaDest = strlen($strDireDest);
if ($strTamaDest > $intMaxiTama) {
    $strDireDes1 = substr($strDireDest,0,$intMaxiTama);
    $strDireDes2 = substr($strDireDest,$intMaxiTama,$intMaxiTama);
}

$strTeleDest = $objGuiaImpr->TelefonoMovilDestinatario;
if (strlen($objGuiaImpr->TelefonoDestinatario)) {
    $strTeleDest .= ' | '.$objGuiaImpr->TelefonoDestinatario;
}
$strCeduDest = $objGuiaImpr->CedulaDestinatario;
$strSucuDest = $objGuiaImpr->Destino->Iata;
$strServEntr = $objGuiaImpr->ServicioImportacion;
$strCodiProd = $objGuiaImpr->Producto->Codigo;
$decKiloGuia = $objPiezGuia->Kilos;
$decAltoGuia = $objPiezGuia->Alto;
$decAnchGuia = $objPiezGuia->Ancho;
$decLargGuia = $objPiezGuia->Largo;
$decPiesCubi = $objPiezGuia->PiesCub;
$decVoluPiez = $objPiezGuia->Volumen;
$strDescCont = $objGuiaImpr->Contenido;
$strTotaGuia = $objGuiaImpr->Total;
$strFormPago = $objGuiaImpr->FormaPago;
$strNombEsta = $objGuiaImpr->Estado;
$strNombCiud = $objGuiaImpr->Ciudad;
$strCodiPost = $objGuiaImpr->CodigoPostal;
$strPiezGuia = $objPiezGuia->IdPieza;
$intNumePiez = (int)explode('-',$strPiezGuia)[1];
$strCantPiez = $objGuiaImpr->Piezas;
$strTamaLetr = '6px';
$strNumeDest = $strPiezGuia.' - '.$strSucuDest;
$strNombEsta = $objGuiaImpr->Destino->Nombre;
$strNombClie = $objGuiaImpr->ClienteCorp->NombClie;
?>
<style type="text/css">
    .tabla {
        border-bottom: solid;
        width: 20px;
        text-align: center;
    }
    .titulo {
        background-color: #CCC;
        font-weight: bold;
        /*width: 100%;*/
        text-align: center;
    }
    .destacado {
        background-color: #CCC;
        font-weight: bold;
        font-size: 24px;
    }
    .etiqueta {
        font-weight: bold;
        /*width: 15%;*/
    }
    .contenido {
        font-size: 12px;
        word-wrap: normal;
        /*width: 70%;*/
    }
    .parrafo {
        width: <?= $intAnchPagi ?>;
        text-align: justify;
        font-size: 10px;
        line-height: 20px;
    }
    table.page_header {
        width: 100%;
    }
</style>
<page backtop="10mm" backbottom="10mm" backleft="8mm" backright="8mm">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="border-bottom: solid; text-align: center" colspan="3">
                    <img src="<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/LogoGold.png" ?>"
                         alt="LogoGold"
                         width="100px"
                         height="45px">
                </td>
            </tr>
            <tr>
                <td style="border-bottom: solid; font-size: 30px; padding: 10px; font-weight: bold; text-align: center" colspan="3">
                    <?= $strNumeDest ?>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px; font-size: 14px; font-weight: bold; text-align: center">Alto</td>
                <td style="padding-top: 10px; font-size: 14px; font-weight: bold; text-align: center">Ancho</td>
                <td style="padding-top: 10px; font-size: 14px; font-weight: bold; text-align: center">Largo</td>
            </tr>
            <tr>
                <td style="padding-bottom: 5px; font-size: 12px; text-align: center"><?= $decAltoGuia ?></td>
                <td style="padding-bottom: 5px; font-size: 12px; text-align: center"><?= $decAnchGuia ?></td>
                <td style="padding-bottom: 5px; font-size: 12px; text-align: center"><?= $decLargGuia ?></td>
            </tr>
            <tr>
                <td style="font-size: 14px; font-weight: bold; text-align: center">Peso</td>
                <td style="font-size: 14px; font-weight: bold; text-align: center">PiesCub</td>
                <td style="font-size: 14px; font-weight: bold; text-align: center">Volumen</td>
            </tr>
            <tr>
                <td style="padding-bottom: 5px; font-size: 12px; text-align: center"><?= $decKiloGuia ?></td>
                <td style="padding-bottom: 5px; font-size: 12px; text-align: center"><?= $decPiesCubi ?></td>
                <td style="padding-bottom: 5px; font-size: 12px; text-align: center"><?= $decVoluPiez ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; text-align: center" colspan="2">
                    Pieza
                </td>
                <td style="font-weight: bold; text-align: left">
                    Total Piezas
                </td>
            </tr>
            <tr>
                <td style="text-align: center" colspan="2">
                    <?= $intNumePiez ?>
                </td>
                <td style="text-align: left;">
                    <span style="margin-left: 30px"><?= $strCantPiez ?></span>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: solid; font-size: 20px; padding: 5px; font-weight: bold; text-align: center" colspan="3">
                    <?= $strNombDest ?>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: solid; text-align: center; padding: 10px" colspan="3">
                    <qrcode value="<?= $strPiezGuia; ?>" style="width: 30mm;"></qrcode>
                </td>
            </tr>
            <tr>
                <td style="font-size: 16px; padding: 5px; font-weight: bold; text-align: center" colspan="3">
                    <?= $strNombEsta ?>
                </td>
            </tr>

        </table>
    </page_header>
</page>