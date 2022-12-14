<?php 
require_once('qcubed.inc.php');

/* @var $objPiezMani GuiaPiezas */

tc('============================');
tc('Entrando a la Lista de Guias');
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
tc('Voy por aqui');
/* @var $objChofCone Chofer */
$objChofCone = unserialize($_SESSION['User']);
$objChofCone->grabarLogMobile('Entrando a la Lista de Guias tipo: '.$strTipoGuia);

$intRegiMost = Parametros::BuscarParametro('RUTAMOBI','GUIAPAGI','Val1',20);
$intOffxSetx = ($intGrupGuia-1)*$intRegiMost;

$objManiSele = ContainerMobile::Load($intIdxxMani);

$objManiSele->ResumeDeEntrega();

$intCantPiez = $objManiSele->CantPiezas;
$intCantOkey = $objManiSele->Entregadas;
$intCantPend = $objManiSele->Pendientes;
$intCantDevu = $objManiSele->Devueltas;
$intCantSing = $objManiSele->SinGestionar;

$decPorcOkey  = nf0($intCantOkey * 100 / $intCantPiez);
$decPorcPend  = nf0($intCantPend * 100 / $intCantPiez);
$decPorcDevu  = nf0($intCantDevu * 100 / $intCantPiez);
$decPorcSing  = nf0($intCantSing * 100 / $intCantPiez);

$blnSecuProp = $objManiSele->Container->Transportista->SecuenciaPropia;
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
tc('Voy a buscar las guias por tipo');
$arrPiezMani = $objManiSele->GetGuiaPiezasDelContainerPorTipo($strTipoGuia,$intRegiMost,$intOffxSetx);
$blnMostProx = ($intCantPiez > ($intGrupGuia * $intRegiMost));
$strLinkProx = "lista_de_guias.php?id=$intIdxxMani&tg=$strTipoGuia&gg=".$intProxGrup;
$strLinkAnte = "lista_de_guias.php?id=$intIdxxMani&tg=$strTipoGuia&gg=".$intGrupAntr;
$strHtmlAnte = '';
tc('Voy a armar el HTML');
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
        Pr??x Pag.&nbsp;&nbsp;<i class="fa fa-mail-forward fa-lg"></i>
    </a>
    ';
}
$strListGuia = '';
if ($arrPiezMani) {
    $strListGuia = '
    <form action="guias_agrupadas.php?id='.$intIdxxMani.'" method="post">
        <input type="submit" value="Volver al Manifiesto">
    </form>
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="eye" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Filtrar...">
    '.$strHtmlAnte.'
    '.$strHtmlProx.'
    ';
    /* @var $objPiezMani ContainerPiezaMobile */
    /* @var $objGuiaPiez GuiaPiezas */
    foreach ($arrPiezMani as $objPiezMani) {
        $strUltiCome = $objPiezMani['comentario'];
        $objGuiaPiez = GuiaPiezas::LoadByIdPieza($objPiezMani['id_pieza']);
        $strPiezMani = $objGuiaPiez->GuiaTransportista();

        $strListGuia .= '
        <li>
            <a href="detalle_de_pieza.php?id='.$objGuiaPiez->Id.'&mid='.$objManiSele->Id.'&tg='.$strTipoGuia.'&gg='.$intGrupGuia.'" data-rel="dialog">
                <img src="images/list.png" class="extra">
                <h6>'.$strPiezMani.'</h6>
                <p><b>Destinatario:</b> '.$objGuiaPiez->Guia->NombreDestinatario.'</p>
                <p><b>Destino:</b> '.$objGuiaPiez->Guia->Destino->Iata.'</p>
                <p><b>Status:</b> '.$strUltiCome.'</p>
            </a>
        </li>
        ';
    }
    $strListGuia .= '</ul>';
} else {
    $strListGuia = '
    <center>
        <a href="guias_agrupadas.php?id='.$intIdxxMani.'" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Guias</a>
    </center>
    ';
}
$objChofCone->grabarLogMobile('Las Guias han sido cargadas');

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

