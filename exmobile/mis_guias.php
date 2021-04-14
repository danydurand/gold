<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

//--------------------------------------------------------------------
// En la session se encuenta un vector que indica en que color debe 
// representarse cada checkpoint
//--------------------------------------------------------------------
$arrColoCkpt = unserialize($_SESSION['ColoCkpt']);
// print_r($arrColoCkpt);
// echo "<br>\n";
$objCliente    = unserialize($_SESSION['User']);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Guia()->ClienteId, $objCliente->Id);
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
        $strColoCkpt = '';
        $objUltiCkpt = $objGuiaSele->GetUltiCkptPub();
        // echo "Guia: ".$objGuiaSele->Id."<br>\n";
        if ($objUltiCkpt) {
            // echo "Ulti Ckpt: ".$objUltiCkpt->CheckpointId."<br>\n";
            $intUltiCkpt = $objUltiCkpt->CheckpointId;
            $strUltiCkpt = $objUltiCkpt->Observacion;
            if (array_key_exists($intUltiCkpt, $arrColoCkpt)) {
                $strColoCkpt = $arrColoCkpt[$intUltiCkpt];
            }
        } else {
            $strUltiCkpt = '';
        }
        // echo "Texto: ".$strUltiCkpt."<br>\n";
        // echo "El color es: ".$strColoCkpt."<br>\n";
        $strListGuia .= '
            <li data-theme="'.$strColoCkpt.'">
                <a href="detalle_de_guia.php?id='.$objGuiaSele->Id.'" data-rel="dialog" title="Detalle de la Guía">
                    <h6>Guía Nro. '.$objGuiaSele->Id.'</h6>
                    <p>Tracking: <i>'.$objGuiaSele->Tracking.'</i></p>
                    <p>Articulo: <i>'.$objGuiaSele->Contenido.'</i></p>
                    <p>Fecha: <i>'.$objGuiaSele->Fecha.'</i></p>
                    <p>Status: <i>'.$strUltiCkpt.'</i></p>
                </a>
                <a href="estatus_de_guia.php?id='.$objGuiaSele->Id.'" data-rel="dialog">
                    Ver Estatus
                </a>
            </li>
        ';
    }
        // exit;
    $strListGuia .= '</ul>';
} else {
    $strListGuia = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">No hay Guias</a>
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

