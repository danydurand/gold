<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Acerca";
?>

    <div data-role="page" id="acerca">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
        	<div class="" style="text-align: center; padding-top: 0">
	            <h2><span style="color:#666;">Yamato <small>ver 1.0 </span></small><small style="color:crimson">beta!</small></h2>
	            <span>by <a href="http://www.lufeman.com" style="text-decoration:none;">Lufeman</a></span>
	            <!--<hr>
	            <small style="color:#777">
					<b>Daniel Durand:</b> Desarrollador<br>
					<b>Irán Anzola:</b> Desarrollador y Diseñador<br>
					<b>Paula Ibáñez:</b> Desarrollador y Diseñador<br>
				</small>-->
	        </div>
	        <p align="justify">Yamato es una extensión móvil de la aplicación Web de Yokohama, que permite la consulta de la información real alojada en la Base de Datos y el Registro de Clientes, así como visualizar diversos indicadores y estadísticas.</p>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>
