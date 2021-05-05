<?php
require_once('qcubed.inc.php');
require(__APP_INCLUDES__ . '/header.inc.php');
$strPageTitle = 'Errores';

if (!isset($_SESSION['Dato'])) {
    echo "No hay errores para listar...";
    return;
}
$arrListErro = unserialize($_SESSION['Dato']);

?>

<h1>Hola</h1>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
