<?php 
require_once('qcubed.inc.php');

/* @var $objPiezMani GuiaPiezas */

$intIdxxMani = $_GET['id'];
$strTipoGuia = $_GET['tg'];
$intGrupGuia = 1;
if (isset($_GET['gg'])) {
    $intGrupGuia = $_GET['gg'];
}
$intProxGrup = $intGrupGuia + 1;
$intGrupAntr = $intGrupGuia - 1;
if ($intGrupAntr <= 0) {
    $intGrupAntr = 1;
}
$intRegiMost = Parametros::BuscarParametro('RUTAMOBI','GUIAPAGI','Val1',10);
$intOffxSetx = ($intGrupGuia-1)*$intRegiMost;

$objManiSele = Containers::Load($intIdxxMani);
$objResuMani = $objManiSele->ResumeDeEntrega();
$intCantOkey = $objResuMani->CantOkey;
$intCantPend = $objResuMani->CantPend;
$intCantDevu = $objResuMani->CantDevu;
$intCantSing = $objResuMani->CantSing;
$decPorcOkey = $objResuMani->PorcOkey;
$decPorcPend = $objResuMani->PorcPend;
$decPorcDevu = $objResuMani->PorcDevu;
$decPorcSing = $objResuMani->PorcSing;

$blnSecuProp = $objManiSele->Transportista->SecuenciaPropia;
$intCantPiez = $intCantPend;
$strTituGuia = 'PENDIENTES';
switch ($strTipoGuia) {
    case 'PE':
        $intCantPiez = $intCantPend;
        $strTituGuia = 'PENDIENTES';
        break;
    case 'OK':
        $intCantPiez = $intCantOkey;
        $strTituGuia = 'ENTREGADAS';
        break;
    case 'DV':
        $intCantPiez = $intCantDevu;
        $strTituGuia = 'DEVUELTAS';
        break;
    case 'SG':
        $intCantPiez = $intCantSing;
        $strTituGuia = 'SIN GESTIONAR';
        break;
}
$strTituPagi = "Pag. ".$intGrupGuia.'<br>('.$strTituGuia.')';
$objClauAdic = QQ::LimitInfo($intRegiMost,$intOffxSetx);
if ($intCantPiez <= $intRegiMost) {
    $objClauAdic = null;
}
$arrPiezMani = $objManiSele->GetGuiaPiezasDelContainerPorTipo($strTipoGuia,$intRegiMost,$intOffxSetx);
$blnMostProx = ($intCantPiez > ($intGrupGuia * $intRegiMost));
$strLinkProx = "lista_de_guias.php?id=$intIdxxMani&tg=$strTipoGuia&gg=".$intProxGrup;
$strLinkAnte = "lista_de_guias.php?id=$intIdxxMani&tg=$strTipoGuia&gg=".$intGrupAntr;
$strHtmlAnte = '';
if ($intGrupGuia > 1) {
    $strHtmlAnte = '
    <a href="'.$strLinkAnte.'" data-role="button" data-theme="c">
        <i class="fa fa-mail-reply fa-lg"></i>&nbsp;&nbsp;Pag. Ante. 
    </a>
    ';
}
$strHtmlProx = '';
if ($blnMostProx) {
    $strHtmlProx = '
    <a href="'.$strLinkProx.'" data-role="button" data-theme="c">
        Próx Pag.&nbsp;&nbsp;<i class="fa fa-mail-forward fa-lg"></i>
    </a>
    ';
}

$strListGuia = '';
if ($arrPiezMani) {
    $strListGuia = '
    <a href="guias_agrupadas.php?id='.$intIdxxMani.'" data-role="button" data-theme="b">
        <i class="fa fa-mail-reply fa-lg pull-left"></i>Volver al Manifiesto 
    </a>
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="eye" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Filtrar...">
    '.$strHtmlAnte.'
    '.$strHtmlProx.'
    ';
    foreach ($arrPiezMani as $objPiezMani) {
        $strUltiCome = '';
        $arrUltiCkpt = $objPiezMani->ultimoCheckpointTodo();
        if (isset($arrUltiCkpt)) {
            $strUltiCome = $arrUltiCkpt['comentario'];
        }
        $strPiezMani = $objPiezMani->GuiaTransportista();

        $strListGuia .= '
        <li>
            <a href="detalle_de_pieza.php?id='.$objPiezMani->Id.'&mid='.$objManiSele->Id.'&tg='.$strTipoGuia.'&gg='.$intGrupGuia.'" data-rel="dialog">
                <img src="images/list.png" class="extra">
                <h6>'.$strPiezMani.'</h6>
                <p><b>Destinatario:</b> '.$objPiezMani->Guia->NombreDestinatario.'</p>
                <p><b>Destino:</b> '.$objPiezMani->Guia->Destino->Iata.'</p>
                <p><b>Status:</b> '.$strUltiCome.'</p>
            </a>
        </li>
        ';
    }
    $strListGuia .= '</ul>';
} else {
    $strListGuia = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Guias</a>
    </center>
    ';
}
?>
<?php include('layout/header.inc.php'); ?>

    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListGuia; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

