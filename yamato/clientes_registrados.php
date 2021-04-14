<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');

$strTituPagi = "Cliente Registrados";

$arrClieList = Cliente::RegistradosLosUltimosDias($intCantDias);

$arrClieList = Cliente::ConfirmadosSinCodigoRoxanne();

$strClieList = '';
$objUsuario  = unserialize($_SESSION['User']);
if ($arrClieList) {
    $strClieList = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Buscar...">
    ';
    foreach ($arrClieList as $objClieList) {
        if ($objClieList->Cliente->Sexo == 'M') {
            $strNombImag = __APP_IMAGE_ASSETS__.'/user1.png';
        } else {
            $strNombImag = __APP_IMAGE_ASSETS__.'/user_female.png';
        }
        $strClieList .= '
            <li>
                <a href="detalle_del_cliente.php?id='.$objClieList->Id.'" data-rel="dialog">
                    <img src="'.$strNombImag.'" width="40px" height="40px" class="user">
                    <p style="font-size:14px">'.$objClieList->Nombre.'</p>
                    <p>Código: '.$objClieList->Codigo.'</p>
                    <p><i class="fa fa-envelope-o"></i> '.$objClieList->Email.'</p>
                    <p><i class="fa fa-2x fa-mobile"></i> '.$objClieList->TelefonoMovil.'</p>
                </a>
                <a href="lista_de_guias.php?o=gc&cid='.$objClieList->Id.'">Guías</a>
            </li>
        ';
    }
    $strClieList .= '</ul>';
} else {
    $strClieList = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">No tiene Clientes VIP</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strClieList; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

