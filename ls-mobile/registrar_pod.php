
<?php 
require_once('qcubed.inc.php');

include('layout/header.inc.php');

$strTituPagi = "Registrar POD";
$intPiezIdxx = null;
if (isset($_GET['id'])) {
    $intPiezIdxx = $_GET['id'];
}

?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">

            <form action="grabar_pod.php" method="post">
                <input type="hidden" name="idxx" value="<?= $intPiezIdxx ?>">
                <div class="ui-field-contain">
                    <label for="nomb">Recibió?:</label>
                    <input type="text" name="nomb" id="nomb" placeholder="<?= $intPiezIdxx ?>" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="cedu">Cédula/RIF:</label>
                    <input type="text" name="cedu" id="cedu" placeholder="Cedula ó RIF" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="fnac">Fecha Entrega:</label>
                    <input type="text" name="fent" id="fent" placeholder="YYYY-MM-DD" required>
                </div>
                <div class="ui-field-contain">
                    <label for="cedu">Hora:</label>
                    <input type="time" name="hora" id="hora" placeholder="HH:MM" required>
                </div>
                <div class="ui-field-contain">
                    <input type="submit" value="<i class='fa fa-check pull-left'></i>Guardar" data-theme="b">
                </div>
                <a href="lista_de_guias.php" data-role="button" data-theme="b">
                    <i class="fa fa-lg fa-mail-reply pull-left"></i>Volver
                </a>

            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
