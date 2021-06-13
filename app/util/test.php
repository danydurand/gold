<?php
require_once('qcubed.inc.php');


$strNumeGuia = '169841-1/002-002:200';
echo "Entrando: ".$strNumeGuia."<br><br>";
$strNumeGuia = transformar($strNumeGuia);
echo "Transformada: ".$strNumeGuia;


// Sincerar la cantidad de piezas de cada manifiesto así como contar las recibidas
//$arrManiSist = NotaEntrega::LoadAll();
//foreach ($arrManiSist as $objManiSist) {
//    $objManiSist->Piezas = $objManiSist->cantidadDePiezas();
//    $objManiSist->Save();
//    $objManiSist->ContarActualizarRecibidas();
//    echo "Manifiesto: ".$objManiSist->Referencia.' Total Piezas: '.$objManiSist->Piezas.' Recibidas: '.$objManiSist->Recibidas;
//    echo "<br>";
//}

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
