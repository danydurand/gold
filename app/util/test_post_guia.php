<?php
/**
 * Created by PhpStorm.
 * User: ianzola
 * Date: 16/09/16
 * Time: 09:31 AM
 */
require_once ('qcubed.inc.php');

function array_envia($array) {

    $tmp = $array;
//    $tmp = urlencode($tmp);

    return $tmp;
}

$array=array(1,2,3);
$array=array_envia($array);

// Usando un formulario y campo hidden.
//echo <<<HTML
//<form action="test_post_guia.php" method="POST">
//   <input name="array" type="hidden" value="$array">
//   <input name="enviar" type="submit" value=" Enviar ">
//</form>
//HTML;

// Usando un link (URL).
//echo "<a href=\"recibir_array.php?array=$array\">pasar array</a>";
echo "test_getx_guia.php?array=$array";