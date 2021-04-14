<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');


if ( isset($_POST['codigo']) || isset($_POST['nombre']) ) {
    $_SESSION['codigo'] = $_POST['codigo'];
    $_SESSION['nombre'] = $_POST['nombre'];
}
$intCodiClie = $_SESSION['codigo'];
$strNombClie = $_SESSION['nombre'];

$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::GreaterThan(QQN::Cliente()->Id,0);
if (strlen($intCodiClie) > 0) {
    $objClauWher[] = QQ::Equal(QQN::Cliente()->Id,$intCodiClie);
} else {
    if (strlen($strNombClie) > 0) {
        $strNombClie   = '%'.strtoupper($strNombClie).'%';
        $objClauWher[] = QQ::Like(QQN::Cliente()->Nombre,$strNombClie);
    }
}
$arrClieRegi = Cliente::QueryArray(QQ::AndCondition($objClauWher));
$_SESSION['arrClieRegi'] = serialize($arrClieRegi);
// header('Location: http://www.example.com/');
header('Location: listar_clientes.php');
?>
