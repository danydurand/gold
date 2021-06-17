<?php
//-------------------------------------------------------------------------------------
// Programa      : crear_piezas_y_checkpoints.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 16/06/2021
// Descripcion   : Este programa corre via cron y crea las piezas y checkpoints
//                 correspondientes a los Manifiestos que hayan sido recibidos.
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

error_reporting(E_ALL);
//-------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//-------------------------------------------------------------------
$mixManeArch = fopen('crear_piezas_y_checkpoints.log', 'a');
$objUsuaNoti = Usuario::LoadByLogiUsua('gold');
$_SESSION['User'] = serialize($objUsuaNoti);
ta('===========================================',$mixManeArch);
ta('Creando Piezas y Checkpoints de Manifiestos',$mixManeArch);

if (!isset($_SESSION['ProcBatc'])) {
    ta('Proceso Batch No Existe',$mixManeArch);
    exit(0);
}
$objProcEjec = ProcesoError::Load($_SESSION['ProcBatc']);
if (!isset($_SESSION['ManiBatc'])) {
    ta('No hay Manifiesto para procesar en Batch',$mixManeArch);
    exit(0);
}
$objManiBatc = NotaEntrega::Load($_SESSION['ManiBatc']);
if (!($objManiBatc instanceof NotaEntrega)) {
    ta('El Manifiesto No Existe',$mixManeArch);
    exit(0);
}
$objCkptProc = Checkpoints::LoadByCodigo('MC');
if (!($objCkptProc instanceof Checkpoints)) {
    ta('El Checkpoint No Existe',$mixManeArch);
    exit(0);
}
$arrGuiaMani = $objManiBatc->GetGuiasArray();
foreach ($arrGuiaMani as $objGuiaMani) {
    //-----------------------------------------------------------------------
    // Se crea un objeto para enviar parametros a la creación de las piezas
    //-----------------------------------------------------------------------
    $decKiloProm = round($objGuiaMani->Kilos / $objGuiaMani->Piezas, 2);
    $decPiesProm = round($objGuiaMani->PiesCub / $objGuiaMani->Piezas, 2);
    //---------------------------
    // Aquí se crean las Piezas
    //---------------------------
    $objParaPiez = new stdClass();
    $objParaPiez->ProcEjec = $this->objProcEjec;
    $objParaPiez->CkptProc = $objCkptProc;
    $objParaPiez->KiloProm = $decKiloProm;
    $objParaPiez->PiesProm = $decPiesProm;
    for ($i = 1; $i <= $objGuiaMani->Piezas; $i++) {
        $objParaPiez->IdxxPiez = $i;
        //---------------------------------------------------------
        // La creación de la Piezas, crea tambien los checkpoints
        //---------------------------------------------------------
        $objGuiaMani->crearPieza($objParaPiez);
    }
}

fputs($mixManeArch, "\n======================================================================\n");
fclose($mixManeArch);
?>
