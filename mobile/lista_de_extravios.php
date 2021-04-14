<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Lista de Extravíos";

if (isset($_POST['form_busc'])) {
    if (isset($_POST['nume_trac'])) {
        $strNumeTrac = $_POST['nume_trac'];
    }
    if (isset($_POST['fech_extr'])) {
        $strFechExtr = $_POST['fech_extr'];
    }
    if (isset($_POST['extr_paga'])) {
        $strSepaGoxx = $_POST['extr_paga'];
    } else {
        $strSepaGoxx = '';
    }
    if (isset($_POST['stat_extr'])) {
        $strEstaExtr = $_POST['stat_extr'];
    } else {
        $strEstaExtr = '';
    }
} else {
    $strNumeTrac = isset($_SESSION['nume_trac']) ? $_SESSION['nume_trac'] : '';
    $strFechExtr = isset($_SESSION['fech_extr']) ? $_SESSION['fech_extr'] : '';
    $strSepaGoxx = isset($_SESSION['extr_paga']) ? $_SESSION['extr_paga'] : '';
    $strEstaExtr = isset($_SESSION['stat_extr']) ? $_SESSION['stat_extr'] : '';
}
$_SESSION['nume_trac'] = $strNumeTrac;
$_SESSION['fech_extr'] = $strFechExtr;
$_SESSION['extr_paga'] = $strSepaGoxx;
$_SESSION['stat_extr'] = $strEstaExtr;

$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::GreaterOrEqual(QQN::Extravio()->Id,1);
if (strlen($strNumeTrac) > 0) {
    $objClauWher[] = QQ::Like(QQN::Extravio()->Tracking,"%".$strNumeTrac."%");
} 
if (strlen($strFechExtr) > 0) {
    $objClauWher[] = QQ::Equal(QQN::Extravio()->Fecha,$strFechExtr);
}
if ($strSepaGoxx == 'S') {
    $objClauWher[] = QQ::Equal(QQN::Extravio()->SePago,true);
}
if ($strSepaGoxx == 'N') {
    $objClauWher[] = QQ::Equal(QQN::Extravio()->SePago,false);
}
if ($strEstaExtr == 'C') {
    $objClauWher[] = QQ::Equal(QQN::Extravio()->Cerrado,true);
}
if ($strEstaExtr == 'P') {
    $objClauWher[] = QQ::Equal(QQN::Extravio()->Cerrado,false);
}

$strListExtr   = '';
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Extravio()->Id, false);
$objClauOrde[] = QQ::LimitInfo(25);
$arrEnviExtr   = Extravio::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
if ($arrEnviExtr) {
    $strListExtr = '
    <ul data-role="listview" data-inset="true" data-split-icon="gear" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Buscar...">
    ';
    foreach ($arrEnviExtr as $objEnviExtr) {
        $strSepaGoxx  = $objEnviExtr->SePago == 1 ? "SI" : "NO";
        $strEstaExtr  = $objEnviExtr->Cerrado == 1 ? "CERRADO" : "PENDIENTE";
        $strListExtr .= '
            <li>
                <a href="detalle_del_extravio.php?id='.$objEnviExtr->Id.'" data-rel="dialog">
                    <img src="images/box.png" class="extra">
                    <h6>'.$objEnviExtr->Tracking.'</h6>
                    <p>Se Pagó? : '.$strSepaGoxx.'</p>
                    <p>Estatus : '.$strEstaExtr.'</p>
                    <p>Fecha : '.$objEnviExtr->Fecha.'</p>
                </a>
            </li>
        ';
    }
    $strListExtr .= '</ul>';
} else {
    $strListExtr = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Extravíos</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListExtr; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

