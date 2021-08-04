<?php 
//----------------------------------------------------------------------------------
// Programa      : protected.inc.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 07/10/2016
// Descripcion   : Este programa cumple un par de funciones claves en el Sistema
//                 - Verifica la existencia de la session 
//                 - Deja registro del programa utilizado por el Usuario
//----------------------------------------------------------------------------------
require_once(__CONFIGURATION__.'/prepend.inc.php');
//-----------------------------------------------
// Aqui se verifica la existencia de la session 
//-----------------------------------------------
if (!isset($_SESSION['User'])) {
    QApplication::Redirect(__CORP__.'/index.php');
}
$objUser = unserialize($_SESSION['User']);
if (!($objUser instanceof UsuarioConnect)) {
    QApplication::Redirect(__CORP__.'/index.php');
}
if (!defined('__SIST__')) {
    define ('__SIST__', '/'.$_SESSION['NombDire']);
}
//---------------------------------------------------------------------------------
// Aqui se deja registro de la base de datos del programa accesado por el Usuario
//---------------------------------------------------------------------------------
PilaAcceso::Push();
?>