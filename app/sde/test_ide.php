<?php
require_once('qcubed.inc.php');

/**
*   @var $objGuiaTest Guia
*/
$objGuiaTest = new Guia();

$objGuiaUnax = Guia::Load(1);

$objGuiaUnax->FechGuia->__toString();

$objGuiaTest->NumeGuia = '1';
$objGuiaTest->Save();
?>