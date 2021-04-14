<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');
//--------------------------------------------------------------------
// En la session se encuenta un vector que indica en que color debe 
// representarse cada checkpoint
//--------------------------------------------------------------------
$objCliente    = unserialize($_SESSION['User']);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Pago()->ClienteId, $objCliente->Id);

$strListPago   = '';
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Pago()->Id, false);
$objClauOrde[] = QQ::LimitInfo(25);
$arrListPago   = Pago::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
$strListPago   = '<a href="nuevo_pago.php" class="ui-nodisc-icon" data-role="button" data-theme="b" data-ajax="false"><i class="fa fa-lg fa-plus pull-left"></i>Registrar Nuevo Pago</a>';
if ($arrListPago) {
    $strListPago .= '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d">
    ';
    foreach ($arrListPago as $objListPago) {
        $strPagoConf  = $objListPago->Confirmado == 1 ? "SI" : "NO";
        $strListPago .= '
            <li data-theme="">
                <a href="">
                    <h6>Guía(s) Nro. '.$objListPago->Guias.'</h6>
                    <p>Monto: <i>'.$objListPago->Monto.'</i></p>
                    <p>Nro. Documento: <i>'.$objListPago->Documento.'</i></p>
                    <p>Fecha: <i>'.$objListPago->Fecha.'</i></p>
                    <p>Confirmado? <i>'.$strPagoConf.'</i></p>
                </a>
                <a href="mis_guias.php?o=gp&ids='.$objListPago->Guias.'">
                    Ver Guias
                </a>
            </li>
        ';
    }
        // exit;
    $strListPago .= '</ul>';
} else {
    $strListPago .= '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i></i>No hay Pagos</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListPago; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

