<?php
require_once('qcubed.inc.php');

$_SESSION['User'] = serialize(Usuario::LoadByLogiUsua('ddurand'));

$decMontUnox = (float)'1,0';
$decMontDosx = (float)'0.68';
echo $decMontDosx - $decMontUnox;