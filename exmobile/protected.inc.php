<?php 
//----------------------------------------------------------------------------------
// Programa      : protected.inc.php
// Realizado por : Juan Duran
// Fecha Elab.   : 12/15/2015
// Descripcion   : Este programa cumple un par de funciones claves en el Sistema
//                 - Verifica la existencia de la session 
//                 - Deja registro del programa utilizado por el Usuario
//----------------------------------------------------------------------------------

//require_once(__CONFIGURATION__.'/prepend.inc.php');

//-----------------------------------------------
// Aqui se verifica la existencia de la session 
//-----------------------------------------------

if (!isset($_SESSION['User'])) {
    QApplication::Redirect(__SUBDIRECTORY__.'/exmobile/index.php');
}

$objUser = unserialize($_SESSION['User']);
if (!($objUser instanceof Cliente)) {
    QApplication::Redirect(__SUBDIRECTORY__.'/exmobile/index.php');
}

$arrLogxCamb['strNombProg'] = basename($_SERVER['SCRIPT_FILENAME']);
$arrLogxCamb['strDescCamb'] = $_SERVER['QUERY_STRING'];
LogDeCambiosMobile($arrLogxCamb);

?>