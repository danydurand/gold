<?php
require_once(dirname(__FILE__).'/../qcubed.inc.php');
if ($_SERVER['SCRIPT_NAME'] != '/route/index.php') {
    if (!isset($_SESSION['User'])) {
        QApplication::Redirect('/route/index.php');
    }
}

?>
