<?php
//----------------------------------------------------------------------------------------------------------------
// Programa      : actualizar_znc.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 05/04/2018
// Descripcion   : Este programa actualiza el campo zona_no_cubierta de cada Sucursal, en base a los registros
//                 existentes en la tabla zona_no_cubierta.
//----------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

$arrSucuDisp = Estacion::LoadAll();
foreach ($arrSucuDisp as $objSucuDisp) {
    $arrZncxSucu = ZonaNoCubierta::LoadArrayByCodiEsta($objSucuDisp->CodiEsta);
    if (count($arrZncxSucu) > 0) {
        $strZncxSucu = '';
        foreach ($arrZncxSucu as $objZncxSucu) {
            if (strlen($strZncxSucu) > 0) {
                $strZncxSucu .= ', ';
            }
            $strZncxSucu .= $objZncxSucu->Descripcion;
        }
        $objSucuDisp->ZonasNc = $strZncxSucu;
        $objSucuDisp->Save();
        echo $objSucuDisp->DescEsta." actualizada...\n";
    } else {
        echo $objSucuDisp->DescEsta." sin Zonas No Cubiertas\n";
    }
}