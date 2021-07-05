<?php
require_once(dirname(__FILE__).'/../qcubed.inc.php');
$strNombProg = basename($_SERVER['SCRIPT_NAME']);
t('Programa: '.$strNombProg);
if ($strNombProg != 'index.php') {
    define ('__SIST__', __RET__);
    if (!isset($_SESSION['User'])) {
        QApplication::Redirect(__SIST__.'/index.php');
    }
    $arrNeceUbic = [
        'guia_nacional.php',
        'guia_exportacion.php',
        'sacar_a_ruta.php',
        'incidencias.php',
        'inventario_almacen.php',
        'crear_guia_nac.php',
        'crear_guia_exp.php',
        'guias_list.php',
    ];
    if ( ($strNombProg != 'establecer_ubicacion.php') && (in_array($strNombProg,$arrNeceUbic)) ) {
        $_SESSION['PagiBack'] = $strNombProg;
        if (!isset($_SESSION['SucursalId'])) {
            QApplication::Redirect(__SIST__.'/establecer_ubicacion.php');
        }
    }
    PilaAcceso::Push();
}
?>
