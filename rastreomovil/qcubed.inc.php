<?php
require_once(dirname(__FILE__).'/../qcubed.inc.php');
if ($_SERVER['SCRIPT_NAME'] != '/rastreomovil/index.php') {
    if (!isset($_SESSION['GuiaSele'])) {
        QApplication::Redirect(__RUTA_MOBILE__.'/index.php');
    }
}
?>
