<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Lista de Guías";


$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::GreaterThan(QQN::Guia()->Id,0);
if (isset($_GET['o'])) {
    $strOpciRepo = $_GET['o'];
    switch ($strOpciRepo) {
        case 'bg':
            //-------------------
            // Buscar Guia
            //-------------------
            if (isset($_POST['tracking'])) {
                $_SESSION['tracking'] = $_POST['tracking'];
            }
            if (isset($_POST['guia'])) {
                $_SESSION['guia'] = $_POST['guia'];
            }
            if (isset($_POST['codigo'])) {
                $_SESSION['codigo'] = $_POST['codigo'];
            }
            $strNumeTrac   = $_SESSION['tracking'];
            $strNumeGuia   = $_SESSION['guia'];
            $strCodiClie   = $_SESSION['codigo'];

            if (strlen($strNumeTrac) > 0) {
                $objClauWher[] = QQ::Like(QQN::Guia()->Tracking,"%".$strNumeTrac."%");
            }
            if (strlen($strNumeGuia) > 0) {
                $objClauWher[] = QQ::Equal(QQN::Guia()->Id,$strNumeGuia);
            }
            if (strlen($strCodiClie) > 0) {
                $objClauWher[] = QQ::Equal(QQN::Guia()->ClienteId,$strCodiClie);
            }
            break;
        case 'gc':
            //----------------------
            // Guias de un Cliente
            //----------------------
            if (isset($_GET['cid'])) {
                $_SESSION['cid'] = $_GET['cid'];
            }
            $strClieGuia = $_SESSION['cid'];
            if (strlen($strClieGuia) > 0) {
                $objClauWher[] = QQ::Equal(QQN::Guia()->ClienteId,$strClieGuia);
            }
            break;
        default:
            # code...
            break;
    }
}
$strListGuia   = '';
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Guia()->Id, false);
$objClauOrde[] = QQ::LimitInfo(25);
$arrGuiaSele   = Guia::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
if ($arrGuiaSele) {
    $strListGuia = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="eye" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Filtrar...">
    ';
    foreach ($arrGuiaSele as $objGuiaSele) {
        $strListGuia .= '
            <li>
                <a href="detalle_de_guia.php?id='.$objGuiaSele->Id.'" data-rel="dialog">
                    <img src="images/list.png" class="extra">
                    <h6>'.$objGuiaSele->Tracking.'</h6>
                    <p>Guia : '.$objGuiaSele->Id.'</p>
                    <p>Fecha : '.$objGuiaSele->Fecha.'</p>
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
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListGuia; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

