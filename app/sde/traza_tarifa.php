<?php
//-------------------------------------------------------------------------------------
// Programa       : traza_tarifa.php
// Realizado por  : Daniel Durand
// Fecha Elab.    : 23/04/2018
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');

/**
 * @var $objTrazTari Parametro
 */
$objTrazTari = BuscarParametro('RegiTraz','CalcTari','TODO',null);
if ($objTrazTari) {
    echo $objTrazTari->ParaTxt1;
} else {
    echo "No hay Traza de Tarifa disponible<br>";
}
