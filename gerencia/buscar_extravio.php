<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');

if (isset($_SESSION['nume_trac'])) {
    $_SESSION['nume_trac'] = '';
}
if (isset($_SESSION['fech_extr'])) { 
    $_SESSION['fech_extr'] = ''; 
}
if (isset($_SESSION['extr_paga'])) {
    $_SESSION['extr_paga'] = '';
}
if (isset($_SESSION['stat_extr'])) {
    $_SESSION['stat_extr'] = '';
}
$strTituPagi = "Buscar Extravio";
?>

    <div data-role="page" id="buscar_extravio">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <form action="lista_de_extravios.php" method="post">
                <div class="ui-field-contain">
                    <label for="nume_trac">Número de Tracking:</label>
                    <input type="text" name="nume_trac" id="nume_trac" placeholder="Tracking del Extravío">
                </div>
                <div class="ui-field-contain">
                    <label for="fech_extr">Fecha:</label>
                    <input type="date" name="fech_extr" id="fech_extr" placeholder="Fecha del Extravío">
                </div>
                <div class="ui-field-contain">
                    <label for="nombre">¿Está pagado?</label>
                    <fieldset data-role="controlgroup">
                        <label for="sipa">Si</label>
                        <input type="radio" name="extr_paga" id="sipa" value="S">
                        <label for="nopa">No</label>
                        <input type="radio" name="extr_paga" id="nopa" value="N">
                    </fieldset>
                </div>
                <div class="ui-field-contain">
                    <label for="estatus">Estatus</label>
                    <fieldset data-role="controlgroup">
                        <label for="cerrado">Cerrado</label>
                        <input type="radio" name="stat_extr" id="cerrado" value="C">
                        <label for="pendiente">Pendiente</label>
                        <input type="radio" name="stat_extr" id="pendiente" value="P">
                    </fieldset>
                </div>
                <input type="hidden" name="form_busc" id="form_busc" value="busc_extr">
                <div class="ui-field-contain">
                    <input class="ui-nodisc-icon" type="submit" value="<i class='fa fa-search pull-left'></i>Buscar" data-theme="b">
                    <input class="ui-nodisc-icon" type="reset" value="<i class='fa fa-eraser pull-left'></i>Limpiar" data-theme="b">
                </div>
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>
    </div>

<?php include('layout/footer.inc.php'); ?>
