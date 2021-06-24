<?php 
require_once('qcubed.inc.php');
$strTituPagi = "Piezas de la Guia";

/* @var $objGuiaSele Guias */
/* @var $objPiezGuia GuiaPiezas */

$objGuiaSele = unserialize($_SESSION['GuiaSele']);
$arrPiezGuia = $objGuiaSele->GetGuiaPiezasAsGuiaArray();
$strListPiez = '';
if ($arrPiezGuia) {
    $strListPiez = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="eye" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Filtrar...">
    <a href="detalle_de_guia.php" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
    ';
    foreach ($arrPiezGuia as $objPiezGuia) {
        $blnMostGuia = false;
        $blnTienOkey = $objPiezGuia->tieneCheckpoint('OK');
        $strUltiCome = '';
        $arrUltiCkpt = $objPiezGuia->ultimoCheckpointTodo();
        if (isset($arrUltiCkpt)) {
            $strUltiCome = $arrUltiCkpt['comentario'];
        }

        $strListPiez .= '
        <li>
            <a href="detalle_de_pieza.php?id='.$objPiezGuia->Id.'" data-rel="dialog">
                <img src="images/list.png" class="extra">
                <h6>'.$strPiezGuia.'</h6>
                <p><b>Status:</b> '.$strUltiCome.'</p>
            </a>
        </li>
    ';
    }
    $strListPiez .= '</ul>';
} else {
    $strListPiez = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Piezas</a>
    </center>
    ';
}
?>
<?php include('layout/header.inc.php'); ?>

    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListPiez; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

