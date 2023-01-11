<?php
//--------------------------------------------------------------------------------------------------
// Programa      : actualizar_ready_to_go.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 08/01/2023
//--------------------------------------------------------------------------------------------------
$strNombHost = gethostname();
if ($strNombHost == 'goldsist.com') {
    define('SERVER_INSTANCE', 'prod');
} else {
    define('SERVER_INSTANCE', 'dev');
}
require_once('qcubed.inc.php');

$objUsuario = Usuario::LoadByLogiUsua('gold');
$_SESSION['User'] = serialize($objUsuario);
error_reporting(E_ALL);
//-------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//-------------------------------------------------------------------
$mixManeArch = fopen('/tmp/actualizar_ready_to_go.txt','w');
fputs($mixManeArch,"\nActualizando Ready To Go");
fputs($mixManeArch,"\n========================\n\n");

//-------------------------------------------------------------------------------------------------
// Se llena la tabla de actualizacion con guias que han tenido movimientos en los ultimos 60 dias
//-------------------------------------------------------------------------------------------------
$intCantRegi = 0;
$objCkptRtgx = Checkpoints::LoadByCodigo('RG');
$arrCkptProc = PiezaCheckpoints::LoadArrayByCheckpointId($objCkptRtgx->Id);
foreach ($arrCkptProc as $objCkptProc) {
    if (is_null($objCkptProc->Pieza->Guia->IsReadyToGo)) {
        //-----------------------
        // Se actualiza la guia
        //-----------------------
        $strLineText = "Guia a actualizar: " . $objCkptProc->Pieza->Guia->Tracking . "\n";
        fputs($mixManeArch, $strLineText);
        // $strLineText = "Fecha del Ckpt: " . $objCkptProc->Fecha . "\n";
        // fputs($mixManeArch, $strLineText);
        $objCkptProc->Pieza->Guia->IsReadyToGo = 1;
        $objCkptProc->Pieza->Guia->ReadyToGoDate = new QDateTime($objCkptProc->Fecha->qFormat('YYYY-MM-DD'));
        $objCkptProc->Pieza->Guia->ReadyToGoUserId = $objCkptProc->CreatedBy;
        $objCkptProc->Pieza->Guia->Save();
    }
    if (is_null($objCkptProc->Pieza->IsReadyToGo)) {
        //------------------------
        // Se actualiza la pieza
        //------------------------
        $strLineText = "Pieza a actualizar: " . $objCkptProc->Pieza->IdPieza . "\n";
        fputs($mixManeArch, $strLineText);
        // $strLineText = "Fecha del Ckpt: " . $objCkptProc->Fecha . "\n";
        // fputs($mixManeArch, $strLineText);
        $objCkptProc->Pieza->IsReadyToGo = 1;
        $objCkptProc->Pieza->ReadyToGoDate = new QDateTime($objCkptProc->Fecha->qFormat('YYYY-MM-DD'));
        $objCkptProc->Pieza->ReadyToGoUserId = $objCkptProc->CreatedBy;
        $objCkptProc->Pieza->Save();
    }
    $intCantRegi++;
    $strLineText = "Registros: " . $intCantRegi . "\n";
    fputs($mixManeArch, $strLineText);
}
fclose($mixManeArch);
?>
