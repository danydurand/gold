<?php
/**
 * Created by PhpStorm.
 * User: ianzola
 * Date: 28/09/16
 * Time: 09:37 AM
 */
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Seleccionar Ruta";
$strMensErro = 'Disculpe! Usted no tiene una ruta asignada! No puede acceder al Sistema!';
//-------------------------
// Ficha o Data del Chofer
//-------------------------
$objChofer = unserialize($_SESSION['User']);
//---------------------------------------------------------------------------------
// Parámetro booleano para determinar si el chofer tiene una o más rutas asignadas
//---------------------------------------------------------------------------------
$blnRutaAsig = true;
//----------------------------------------------------------------
// Lista de operaciones a las cuales el Chofer le corresponde ...
//----------------------------------------------------------------
$arrOperChof = SdeOperacion::LoadArrayByCodiChof($objChofer->CodiChof);
//---------------------------------------------------------------------------------------------------------------------
// Si el Chofer no tiene al menos una ruta asignada, el programa advierte al mismo la situación y no lo deja continuar
// al programa o menu principal. De lo contrario, muestra el formulario con la lista de rutas asignadas disponibles y
// el botón para acceder al programa o menú principal.
//---------------------------------------------------------------------------------------------------------------------
if (count($arrOperChof) == 0) {
    $blnRutaAsig = false;
} else {
    $strListEsta  = '<select name="ruta" id="ruta" data-native-menu="false">';
    $strListEsta .= '<option value="-1" selected>- Seleccione Uno -</option>';
    foreach ($arrOperChof as $objOperChof) {
        $strListEsta .= '<option value="'.$objOperChof->CodiOper.'">'.utf8_encode($objOperChof->CodiRutaObject->DescRuta).'</option>';
    }
    $strListEsta .= '</select>';
}
?>
<div data-role="page">
    <?php include('layout/header_simple.inc.php'); ?>
    <?php if ($blnRutaAsig) { ?>
        <div data-role="content">
            <p style="text-align:center;color:crimson;">Seleccione una Ruta</p>
            <form action="menu.php" method="post">
                <div class="ui-field-contain">
                    <label for="ruta">Ruta:</label><br>
                    <?= $strListEsta ?>
                </div>
                <div class="ui-field-contain">
                    <input type="submit" value="<i class='fa fa-arrow-right pull-right'></i>Continuar" data-theme="b" data-role="button">
                </div>
            </form>
        </div>
    <?php } else { ?>
        <div data-role="content" style="text-align: center">
            <div class="ui-field-contain">
                <?= $strMensErro ?>
            </div>
            <a href="index.php" data-role="button" data-theme="b"><i class='fa fa-mail-reply pull-left'></i>Volver</a>
        </div>
    <?php } ?>
    <?php include('layout/page_footer.inc.php'); ?>
</div>
<?php include('layout/footer.inc.php'); ?>
