<?php 
require_once('qcubed.inc.php');

include('layout/header.inc.php');

$strTituPagi = "Manifiestos";
$strManiChof = '';
/* @var $objUsuario Chofer */
$objUsuario  = unserialize($_SESSION['User']);
$arrManiChof = $objUsuario->GetContainersArray();
//print_r($arrManiChof);
if ($arrManiChof) {
    $strManiChof = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Buscar...">
    ';
    $strNombImag = __RUTA_IMAGE__.'/manifest2.png';
    foreach ($arrManiChof as $objManiChof) {
        $strManiChof .= '
            <li>
                <a href="detalle_del_manifiesto.php?id='.$objManiChof->Id.'" data-rel="dialog">
                    <img src="'.$strNombImag.'" width="40px" height="40px" style="margin-top: 1em; margin-left: 1em">
                    <p style="font-size:14px">'.$objManiChof->Numero.'</p>
                </a>
                <a href="guias_del_manifiesto.php?id='.$objManiChof->Id.'">Guías</a>
            </li>
        ';
    }
    $strManiChof .= '</ul>';
} else {
    $strManiChof = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">No tiene Manifiestos</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strManiChof; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

