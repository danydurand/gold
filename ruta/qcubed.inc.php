<?php
require_once(dirname(__FILE__).'/../qcubed.inc.php');
if ($_SERVER['SCRIPT_NAME'] != '/ruta/index.php') {
    if (!isset($_SESSION['User'])) {
        QApplication::Redirect(__RUTA_MOBILE__.'/index.php');
    }
}

?>
