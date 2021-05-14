<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');

$strTituPagi = "GoldCoast";

if (isset($_GET['m'])) {
   $_SESSION['menu'] = $_GET['m'];
} else {
   $_SESSION['menu'] = 'h';
}
?>

    <div data-role="page" id="inicio">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content" style="text-align: center; min-height: 200px; padding-top: 10%">
            <img src="images/LogoGold_MED.png" alt="" style="opacity:0.5;">
        </div>

        <div data-role="content">
            <div class="" style="text-align: center; padding-top: 0">
                <h2><span style="color:#666;">Ruta Mobile <small>ver 1.0 </span></small></h2>
                <hr>
            </div>
            <p align="justify">Ruta Mobile es una extensión móvil de la plataforma SISPAQ,
                que facilita las labores del Transportista que presta servicio a GoldCoast.
                Usted podrá:
                <ul>
                    <li>Visualizar sus Manifiestos.</li>
                    <li>Registrar los Datos de Entrega.</li>
                    <li>Reportar Incidencias.</li>
                </ul>


            </p>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
