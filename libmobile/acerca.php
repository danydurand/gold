<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Acerca";

?>
    <div data-role="page" id="acerca">
        <?php include('layout/page_header.inc.php'); ?>
        <div data-role="content">
        	<div class="" style="text-align: center; padding-top: 0">
	            <h2><span style="color:#666;">Lib Mobile <small>ver 1.0 </span></small><small style="color:crimson">beta!</small></h2>
	            <span>by <a href="http://www.lufeman.com" style="text-decoration:none;">Lufeman Software</a></span>
	            <hr>
	            <small style="color:#777"><b>Daniel Durand:</b> Desarrollador<br><b>Juan Durán:</b> Diseñador</small>
	        </div>
	        <p align="center">Lib Mobile es una aplicación móvil desarrollada para monitorear la actividad de las API desarrolladas para Liberty Express, en ese sentido permite visualizar diversos indicadores y estadísticas.</p>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>