<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

$strListCour  = '<select name="coin" id="coin">';
$strListCour .= '<option value="-1" selected>- Seleccione Uno -</option>';
$arrCourDispo = CourierI::LoadAll();
foreach ($arrCourDispo as $objCourier) {
    $strListCour .= '<option value="'.$objCourier->Id.'">'.$objCourier->Nombre.'</option>';
}
$strListCour .= '</select>';

?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <form action="registrar_prealerta.php" method="post">
                <div class="ui-field-contain">
                    <label for="nume">Nro. del Tracking:</label>
                    <input type="text" name="nume" id="nume" placeholder="Nro. del Tracking" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="desc">Descripción del Artículo</label>
                    <input type="text" name="desc" id="desc" placeholder="Descripción del Artículo" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="valo">Valor (USD)</label>
                    <input type="text" name="valo" id="valo" placeholder="Valor (USD)" required>
                </div>
                <div class="ui-field-contain">
                    <label for="coin">Courier Internacional:</label><br>
                    <?= $strListCour ?>
                </div>
                <div class="ui-field-contain">
                    <label for="coin">Desea reterlo en Miami?</label><br>
                    <select name="flip" id="flip" data-role="slider">
                        <option value="false">No</option>
                        <option value="true">Si</option>
                    </select> 
                </div>
                <div class="ui-field-contain">
                    <input type="submit" value="<i class='fa fa-check pull-left'></i>Guardar" data-theme="b">
                </div>
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
