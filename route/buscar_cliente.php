<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Buscar Cliente";
?>

    <div data-role="page" id="buscar_cliente">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <form action="lista_de_clientes.php?o=bc" method="post">
                <div class="ui-field-contain">
                    <label for="codigo">Buscar por Código:</label>
                    <input type="text" name="codigo" id="codigo" placeholder="Codigo del Cliente">
                </div>                
                <div class="ui-field-contain">
                    <label for="nombre">Buscar por Nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre del Cliente">
                </div>                
                <div class="ui-field-contain">
                    <input type="submit" value="<i class='fa fa-search pull-left'></i>Buscar" data-theme="b">
                    <input type="reset" value="<i class='fa fa-lg fa-eraser pull-left'></i>Limpiar" data-theme="b">
                </div>                
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
