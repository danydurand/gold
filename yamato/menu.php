<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "LibertyExpress";

if (isset($_GET['m'])) {
    $_SESSION['menu'] = $_GET['m'];
} else {
    $_SESSION['menu'] = 'h';
}

$dteFechDhoy = date("Y-m-d");
$decIvaxDhoy = FacImpuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);

if (isset($_POST['ruta'])) {
    //--------------------------------------------------------------------------------------------------------------
    // Obtengo el código de operación seleccionado por el Chofer previamente, y lo guardo en una variable de Sesión
    //--------------------------------------------------------------------------------------------------------------
    $_SESSION['CodiOper'] = $_POST['ruta'];
}
?>
    <div data-role="page" id="inicio">
        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content" style="text-align: center; min-height: 200px; padding-top: 10%">
            <!--<img src="images/Logo_Servex.png" alt="" style="opacity:0.5;">-->
            <img src="images/logo_liberty.jpg" alt="" style="opacity:0.5;">
            <hr>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>