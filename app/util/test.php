<?php
require_once('qcubed.inc.php');

/* @var $objOtraPiez GuiaPiezas */

$objPiezSele = GuiaPiezas::LoadByIdPieza('WWW8370113729-001');
$objManiSele = Containers::LoadByNumero('PT222');
$arrOtraProc = [];
$arrOtraPiez = $objPiezSele->OtrasPiezasDeLaMismaGuia();
foreach ($arrOtraPiez as $objOtraPiez) {
    echo $objOtraPiez->IdPieza."<br>";
    //--------------------------------------------------------------------------------------------
    // Si existen mas piezas de la misma guia, asociadas al Manifiesto y no han sido entregadas
    //--------------------------------------------------------------------------------------------
    if ($objManiSele->IsGuiaPiezasAsContainerPiezaAssociated($objOtraPiez)) {
        echo "Esta pieza esta dentro del manifiesto: ".$objOtraPiez->IdPieza."<br>";
        if ($objOtraPiez->ultimoCheckpoint() != 'OK') {
            echo "La pieza no ha sido entregada, la voy a considerar<br>";
            $arrOtraProc[] = $objOtraPiez;
        }
    }
}
echo "<hr>";
foreach ($arrOtraProc as $objOtraProc) {
    echo $objOtraProc->IdPieza."<br>";

}

//-------------------
// Buscar Parametro
//-------------------
//$intProxRefe = Parametros::BuscarParametro('RefeFact','ProxRefe','Val1',1);
//echo $intProxRefe;


//---------------------------------
// Ultimo Checkpoint de una pieza
//---------------------------------
//$objPiezSele = GuiaPiezas::Load(385);
//print_r($objPiezSele->ultimoCheckpointTodo());

//----------------------
// Limpiar cadena
//----------------------
//$strNombChof = "Diego+] Torres/*-";
//echo "Antes: $strNombChof<br>";
//$strNombChof = limpiarCadena($strNombChof);
//echo "Despues: $strNombChof<br>";


//----------------------------------------------
// Transformar la guia scanneada en guia SisCO
//----------------------------------------------

//$strNumeGuia = 'ANA9570174415-p2-001';
//echo "Entrando: ".$strNumeGuia."<br><br>";
//$strNumeGuia = transformar($strNumeGuia);
//echo "Transformada: ".$strNumeGuia;



//$intFactIdxx = 27;
//$objFactImpr = Facturas::Load($intFactIdxx);
//$arrZonaFact = Parametros::LoadArrayByIndice('ZONA');
//$arrManiFact = $objFactImpr->GetNotaEntregaAsFacturaArray();
//$arrGuiaZona = [];
//foreach ($arrManiFact as $objManiFact) {
//    $arrGuiaMani = $objManiFact->GetGuiasArray();
//    foreach ($arrGuiaMani as $objGuiaMani) {
//        $arrGuiaZona[$objGuiaMani->Destino->Zona][] = $objGuiaMani->Tracking;
//    }
//}
//foreach ($arrZonaFact as $objZonaFact) {
//    if (isset($arrGuiaZona[$objZonaFact->Codigo])) {
//        echo "Zona: $objZonaFact->Codigo - $objZonaFact->Descripcion<br>";
//        $intCantGuia = 1;
//        $strGuiaZona = '';
//        foreach ($arrGuiaZona[$objZonaFact->Codigo] as $strNumeGuia) {
//            if (strlen($strGuiaZona) > 0) {
//                $strGuiaZona .= ', ';
//            }
//            $strGuiaZona .= $strNumeGuia;
//        }
//        echo $strGuiaZona."<br><br>";
//    }
//}
