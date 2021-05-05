<?php
require_once('qcubed.inc.php');


$strNumeGuia = 'ANA9570174415-p2-001';
echo "Entrando: ".$strNumeGuia."<br><br>";
$strNumeGuia = transformar($strNumeGuia);
echo "Transformada: ".$strNumeGuia;



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
