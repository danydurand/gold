<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php'); 

if (isset($_GET['m'])) {
   $_SESSION['menu'] = $_GET['m'];
} else {
   $_SESSION['menu'] = 'h';
}

$objDolaSica = BuscarParametro('TasaCamb','DolaSica','TODO',null);
$objDolaSima = BuscarParametro('TasaCamb','DolaSima','TODO',null);
$decPorcAran = BuscarParametro('PorcAran','AranPred','Value1',20);
$dteFechDhoy = date("Y-m-d");
$decIvaxDhoy = Impuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);
//---------------------------------------------------------------------
// Se arma un arreglo asociativo con los checkpoints y los colores 
// que los representan.  Esto aplica en la lista de guias del Cliente
//---------------------------------------------------------------------
$arrCkptSist = Checkpoint::LoadAll();
$arrColoCkpt = array();
foreach ($arrCkptSist as $objCkptSist) {
    if (strlen($objCkptSist->TemaMobile) > 0) {
        $arrColoCkpt[$objCkptSist->Id] = $objCkptSist->TemaMobile;
    }  
}

$_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
$_SESSION['DolaSica'] = serialize($objDolaSica);
$_SESSION['DolaSima'] = serialize($objDolaSima);
$_SESSION['PorcAran'] = serialize($decPorcAran);
$_SESSION['ColoCkpt'] = serialize($arrColoCkpt);
?>

    <div data-role="page" id="inicio">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content" style="text-align: center; min-height: 200px; padding-top: 10%">
            <img src="images/Logo_Servex.png" alt="" style="opacity:0.5;">
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
