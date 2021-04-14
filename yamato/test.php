<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php'); 

$intCodiClie = $_POST['codigo'];
$strNombClie = $_POST['nombre'];

// echo $intCodiClie."<br>\n";
// echo $strNombClie."<br>\n";

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
foreach ($arrClieRegi as $objCliente) {
    echo $objCliente->Nombre."<br>\n";
}

?>
