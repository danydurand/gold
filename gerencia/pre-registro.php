<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php'); 

$strListEsta  = '<select name="esta" id="esta" data-native-menu="false">';
$strListEsta .= '<option value="-1" selected>- Seleccione Uno -</option>';
$arrEstaDispo = Estado::LoadAll();
foreach ($arrEstaDispo as $objEstado) {
    $strListEsta .= '<option value="'.$objEstado->Id.'">'.$objEstado->Nombre.'</option>';
}
$strListEsta .= '</select>';

?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <p style="text-align:center;color:crimson;">Seleccione un Estado</p>
            <form action="registro.php" method="post">
                <div class="ui-field-contain">
                    <label for="esta">Estado:</label><br>
                    <?= $strListEsta ?>
                </div>        
                <div class="ui-field-contain">
                    <input type="submit" value="Continuar<i class='fa fa-arrow-right pull-right'></i>" data-theme="b" data-role="button">
                </div>
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
