<?php 
//----------------------------------------------------------------------------------
// Programa      : protected.inc.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 12/03/2015
// Descripcion   : Este programa cumple un par de funciones claves en el Sistema
//                 - Verifica la existencia de la session 
//                 - Deja registro del programa utilizado por el Usuario
//----------------------------------------------------------------------------------
require_once(__CONFIGURATION__.'/prepend.inc.php');
//-----------------------------------------------
// Aqui se verifica la existencia de la session 
//-----------------------------------------------
if (!isset($_SESSION['User'])) {
    QApplication::Redirect('/index.php');
    //QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
}
$objUser = unserialize($_SESSION['User']);
if (!($objUser instanceof Usuario)) {
    QApplication::Redirect('/index.php');
    //QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
}
if (!defined('__SIST__')) {
    //define ('__SIST__', '/gold/app/'.$_SESSION['Sistema']);
    define ('__SIST__', '/app/'.$_SESSION['Sistema']);
}
//---------------------------------------------------------------------------------
// Aqui se deja registro de la base de datos del programa accesado por el Usuario
//---------------------------------------------------------------------------------
PilaAcceso::Push();
?>