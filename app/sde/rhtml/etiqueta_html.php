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
    .tabla {
        border: solid .5mm;
        /*width: 100%;*/
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
</style>
<page backtop="10mm" backbottom="10mm" backleft="8mm" backright="8mm">
    <page_header>
        <table style="width: 90%" border="0">
                    <?php include('logo_gold_imp.php') ?>
<!--                    --><?php //include('info_remitente_imp.php') ?>
                    <?php include('info_destinatario_imp.php') ?>
<!--                    --><?php //include('info_destino_imp.php') ?>
<!--                    --><?php //include('dimensiones_y_peso_imp.php') ?>
                    <?php include('barra_y_qr_imp.php') ?>
        </table>
    </page_header>
</page>