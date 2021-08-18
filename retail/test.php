<?php
require_once('qcubed.inc.php');

$_SESSION['User'] = serialize(Usuario::LoadByLogiUsua('ddurand'));

// Validando fechas

$calFechTest = new QDateTime('12/05/2021');
echo $calFechTest->__toString("DD/MM/YYYY");
echo "<br>";
echo $calFechTest->__toString("YYYY-MM-DD");

