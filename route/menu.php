<?php 
require_once('qcubed.inc.php');

/* @var $objChofCone Chofer */
$objChofCone = unserialize($_SESSION['User']);
$objChofCone->grabarLogMobile('Entrando al Menu Ppal');

$strTituPagi = "GoldCoast Mobile";

if (isset($_GET['m'])) {
   $_SESSION['menu'] = $_GET['m'];
} else {
   $_SESSION['menu'] = 'h';
}
?>

<?php include('layout/header.inc.php'); ?>

    <div data-role="page" id="inicio">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content" style="text-align: center; min-height: 80px; padding-top: 10%">
            <img src="images/LogoGold_MED.png" alt="" style="opacity:0.5;">
        </div>

        <div data-role="content">
            <div class="" style="text-align: center; padding-top: 0">
                <h3><span style="color:#666;">Bienvenido a Ruta-Mobile</span></h3>
                <hr>
            </div>
            <p align="justify">Ruta-Mobile es una extensión móvil de la plataforma SISPAQ,
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
