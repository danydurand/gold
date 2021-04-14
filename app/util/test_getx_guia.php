<?php
/**
 * Created by PhpStorm.
 * User: ianzola
 * Date: 16/09/16
 * Time: 09:08 AM
 */
require_once ('qcubed.inc.php');

if (isset($_GET['id'])) {
    $strNGuiaIdxx = $_GET['id'];
    echo "El Nro. de Guia Obtenido es: $strNGuiaIdxx";
} else {
    echo 'Debe agregar un Nro. de Guia!';
}