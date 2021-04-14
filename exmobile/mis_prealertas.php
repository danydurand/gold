<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

$objCliente    = unserialize($_SESSION['User']);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Prealerta()->ClienteId, $objCliente->Id);

$strListAler   = '';
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Prealerta()->Fecha, false);
$objClauOrde[] = QQ::LimitInfo(25);
$arrAlerRegi   = Prealerta::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);

$strListAler = '
<center>
    <a href="prealerta.php" data-role="button" data-theme="b"><i class="fa fa-lg fa-plus pull-left"></i>Nueva Pre-Alerta</a>
</center>';
if ($arrAlerRegi) {
    $strListAler .= '
    <ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Buscar...">
    ';
    foreach ($arrAlerRegi as $objPreAlerta) {
        $strListAler .= '
            <li class="ui-li-divider ui-bar-a ui-first-child" role="heading" data-role="list-divider" data-theme="a"><h1>Pre-Alerta #'.$objPreAlerta->Id.'</h1>
            </li>
            <li>
                <h2>Tracking: '.$objPreAlerta->Tracking.'</h2>
                <p>Descripción: '.$objPreAlerta->Descripcion.'</p>
                <p>Valor: '.$objPreAlerta->Precio.'</p>
                <p>Courier: '.$objPreAlerta->Courier->Nombre.'</p>
            </li>
        ';
    }
    $strListAler .= '</ul>';
} else {
    $strListAler .= '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Pre-Alertas</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListAler ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

