<?php
require_once('qcubed.inc.php');

/* @var $objCliente MasterCliente */

$objCliente = MasterCliente::Load(1684);
echo "Saldo: $objCliente->SaldoExcedente";
echo "<br>";
echo "Saldo: ".$objCliente->__saldoExcedente();