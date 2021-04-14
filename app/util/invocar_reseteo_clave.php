<?php
//-------------------------------------------------------------------------------------
// Programa      : invocar_reseteo_clave.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 09/07/17 08:34 PM
// Proyecto      : newliberty
// Descripcion   : Este programa por medio de GET obtiene el Id del usuario a quien se
//                 le reseteará la clave, luego se crea una variable de sesión
//                 'ReseClav', y finalmente se redirecciona al programa de edición y/o
//                 creación de la ficha del usuario, pasándole el Id del mismo.
//--------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');

$intIdxxUsua = QApplication::PathInfo(0);

// $intIdxxUsua = $_GET['codi_usua'];
$_SESSION['ReseClav'] = 1;
QApplication::Redirect(__SIST__."/usuario_edit.php/$intIdxxUsua");