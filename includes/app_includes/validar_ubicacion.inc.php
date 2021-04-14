<?php 
//--------------------------------------------------------------------------------------
// Programa      : validar_ubicacion.inc.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 12/04/2018
// Descripcion   : Este programa verifica que el Usuario haya configurado su Ubicacion
//--------------------------------------------------------------------------------------
require_once(__CONFIGURATION__.'/prepend.inc.php');
if (!isset($_SESSION['SucuOrig'])) {
    QApplication::Redirect(__SIST__.'/../mg.php');
}
?>