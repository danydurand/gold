<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Lista de Gastos"; 


$strListGast   = '';
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::GastosManifiesto()->Id, false);
$objClauOrde[] = QQ::LimitInfo(25);
$arrGastMani   = GastosManifiesto::LoadAll($objClauOrde);
if ($arrGastMani) {
    $strListGast = '
    <ul data-role="listview" data-inset="true" data-split-icon="gear" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Buscar...">
    ';
    foreach ($arrGastMani as $objGastMani) {
        $strListGast .= '
            <li>
                <a href="detalle_del_gasto.php?id='.$objGastMani->Id.'" data-rel="dialog">
                    <img src="images/manifest2.png" class="mani">
                    <h6>'.$objGastMani->Master.' ( '.$objGastMani->FormaPago.')</h6>
                    <p>'.$objGastMani->Fecha.'</p>
                </a>
            </li>
        ';
    }
    $strListGast .= '</ul>';
} else {
    $strListGast = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Gastos</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListGast; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

