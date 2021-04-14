<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');
?>

    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <form action="lista_de_guias.php?o=bg" method="post">
                <div class="ui-field-contain">
                    <label for="tracking">Buscar por Tracking:</label>
                    <input type="text" name="tracking" id="tracking" placeholder="Nro de Tracking">
                </div>                
                <div class="ui-field-contain">
                    <label for="guia">Buscar por Guia:</label>
                    <input type="number" name="guia" id="guia" placeholder="Nro de Guia">
                </div>                
                <div class="ui-field-contain">
                    <label for="codigo">Buscar por Código:</label>
                    <input type="text" name="codigo" id="codigo" placeholder="Codigo de cliente">
                </div>                
                <div class="ui-field-contain">
                    <input type="submit" value="Buscar" data-theme="b" data-icon="search" data-iconpos="top">
                    <input type="reset" value="Limpiar" data-theme="b" data-icon="search" data-iconpos="top">
                </div>                
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
