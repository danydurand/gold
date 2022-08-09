<?php 
//----------------------------------------------------------------------------------
// Programa      : protected.inc.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 19/06/2022
// Descripcion   : Este programa cumple un par de funciones claves en el Sistema
//                 - Verifica la existencia de la session 
//                 - Deja registro del programa utilizado por el Usuario
//----------------------------------------------------------------------------------
require_once(__CONFIGURATION__.'/prepend.inc.php');
//-----------------------------------------------
// Aqui se verifica la existencia de la session 
//-----------------------------------------------
if (!defined('__SIST__')) {
    define ('__SIST__', '/common');
//    define ('__SIST__', '/'.$_SESSION['NombDire']);
}
//$objUser = unserialize($_SESSION['User']);
//if (!($objUser instanceof Usuario)) {
//    QApplication::Redirect(__SIST__.'/index.php');
//}
//---------------------------------------------------------------------------------
// Aqui se deja registro de la base de datos del programa accesado por el Usuario
//---------------------------------------------------------------------------------
PilaAcceso::Push();
?>