<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Cliente VIP";

$strClieVipx = '';
$objUsuario  = unserialize($_SESSION['User']);
$arrClieVipx = $objUsuario->GetClienteVipArray();
if ($arrClieVipx) {
    $strClieVipx = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Buscar...">
    ';
    foreach ($arrClieVipx as $objClieVipx) {
        if ($objClieVipx->Cliente->Sexo == 'M') {
            $strNombImag = __APP_IMAGE_ASSETS__.'/user1.png';
        } else {
            $strNombImag = __APP_IMAGE_ASSETS__.'/user_female.png';
        }
        $strClieVipx .= '
            <li>
                <a href="detalle_del_cliente.php?id='.$objClieVipx->Cliente->Id.'" data-rel="dialog">
                    <img src="'.$strNombImag.'" width="40px" height="40px" class="user">
                    <p style="font-size:14px">'.$objClieVipx->Cliente->Nombre.'</p>
                    <p>Código: VE#'.$objClieVipx->Cliente->Id.'</p>
                    <p><i class="fa fa-envelope-o"></i> '.$objClieVipx->Cliente->Email.'</p>
                    <p><i class="fa fa-2x fa-mobile"></i> '.$objClieVipx->Cliente->TelefonoMovil.'</p>
                </a>
                <a href="lista_de_guias.php?o=gc&cid='.$objClieVipx->Cliente->Id.'">Guías</a>
            </li>
        ';
    }
    $strClieVipx .= '</ul>';
} else {
    $strClieVipx = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">No tiene Clientes VIP</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strClieVipx; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

