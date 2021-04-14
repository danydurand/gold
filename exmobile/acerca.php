
<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');
?>

    <div data-role="page" id="acerca">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
        	<div class="" style="text-align: center; padding-top: 0">
	            <h2><span style="color:#666;">Oki Mobile <small>ver 1.0 </span></small><small style="color:crimson">beta!</small></h2>
	            <span>by <a href="http://www.lufeman.com" style="text-decoration:none;">Kaizen Software</a></span>
	            <hr>
	            <small style="color:#777"><b>Daniel Durand:</b> Desarrollador<br><b>Juan Durán:</b> Diseñador</small>
	        </div>
	        <p align="justify">Oki Mobile es una extensión móvil de la Extranet, que le permite <b>Consultar Tarifas</b>, generar y visualizar un listado de <b>Pre-Alertas</b>, ver un listado de sus <b>Guías</b> con acceso a información detallada de las mismas, así como <b>Registrar un Pago</b> realizado, así como editar sus datos personales.</p>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>
