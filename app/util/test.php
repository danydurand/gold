<?php
require_once('qcubed.inc.php');


$arrPiezPick = PiezaCheckpoints::CheckpointEnFecha('PU',date('Y-m-d'));
//print_r($arrPiezPick);
/* @var $objPiezCkpt PiezaCheckpoints */
foreach ($arrPiezPick as $objPiezCkpt) {
    echo 'Guia: '.$objPiezCkpt->Pieza->Guia->Tracking."<br>";
    echo 'Pieza: '.$objPiezCkpt->Pieza->IdPieza."<br>";
}