<?php 
require_once('qcubed.inc.php');
$strTituPagi = "Acerca";
?>

<?php include('layout/header.inc.php'); ?>

    <div data-role="page" id="acerca">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
        	<div class="" style="text-align: center; padding-top: 0">
	            <h2><span style="color:#666;">Gerencia-Mobile </h2>
	            <span>by <a href="http://www.lufemansoftware.com" style="text-decoration:none;">Lufeman Software</a></span>
	            <hr>
	        </div>
	        <p align="justify">Gerencia-Mobile es una extensión móvil de la Plaforma SISPAQ, que permite
                la consulta de la información real alojada en la Base de Datos,
                así como visualizar diversos indicadores y estadísticas.</p>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>
