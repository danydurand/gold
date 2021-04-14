<?php
//-----------------------------------------------------------------------------
// Programa      : imprimir_manifiestoXls.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 14/08/2017
// Descripcion   : Este programa imprime manifiesto de carga en formato Excel.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');


if (isset($_GET['manifiesto'])) {
    $strNumeMani = $_GET['manifiesto'];
} else {
    $strNumeMani = '';
}
$strNombArch = 'ManifiestoDeCarga';
$arrRegiDato = array();
$objManifiesto = SdeContenedor::Load($strNumeMani);
if ($objManifiesto) {
    $intContRegi = 0;
    $intTotaPiez = 0;
    $dblTotaPeso = 0;
    //--------------------------------------------------------------
    // Se procesan las Valijas incluidas dentro del Contenedor
    //--------------------------------------------------------------
    $arrValiMani = $objManifiesto->GetParentSdeContenedorAsSdeContContArray();
    foreach ($arrValiMani as $objValija) {
        foreach ($objValija->GetGuiaArray() as $objGuia) {
            $intContRegi++;
            $arrRegiDato[] = array(
                $intContRegi,
                $objValija->NumeCont,
                $objGuia->NumeGuia,
                $objGuia->GuiaRetorno,
                $objGuia->FechGuia->__toString("DD/MM/YYYY"),
                substr($objGuia->NombRemi,0,30),
                substr($objGuia->NombDest,0,30),
                substr($objGuia->DescCont,0,50),
                $objGuia->EstaDest,
                $objGuia->CantPiez,
                nf($objGuia->PesoGuia)
            );
            $intTotaPiez += $objGuia->CantPiez;
            $dblTotaPeso += floatval($objGuia->PesoGuia);
        }
    }
    //-------------------------------------------------------
    // Se procesan ahora las Guias asociadas al Contenedor
    //-------------------------------------------------------
    foreach ($objManifiesto->GetGuiaArray() as $objGuia) {
        $intContRegi++;
        $arrRegiDato[] = array(
            $intContRegi,
            nf($objGuia->MontoTotal),
            $objGuia->NumeGuia,
            $objGuia->GuiaRetorno,
            $objGuia->FechGuia->__toString("DD/MM/YYYY"),
            substr($objGuia->NombRemi,0,30),
            substr($objGuia->NombDest,0,30),
            substr($objGuia->DescCont,0,50),
            $objGuia->EstaDest,
            $objGuia->CantPiez,
            nf($objGuia->PesoGuia)
        );
        $intTotaPiez += $objGuia->CantPiez;
        $dblTotaPeso += floatval($objGuia->PesoGuia);
    }
    //--------------------------------------------
    // Se envia una ultima linea con los totales
    //--------------------------------------------
    $arrRegiDato[] = array('','','','','','','','','TOTAL',$intTotaPiez,nf($dblTotaPeso));


    $arrEnca2PDF = array('No','MONTO','GUIA','RETORNO','FECHA','REMITENTE','DESTINATARIO','CONTENIDO','DEST','BULT','PESO');
    $arrJust2PDF = array('C','R','C','C','C','L','L','L','C','C','R');
    $arrAnch2PDF = array(9,20,22,22,18,65,65,65,13,12,12);

    //----------------------------------------------------------------------
    // El vector generado, se lleva al archivo excel
    //----------------------------------------------------------------------
    $_SESSION['Dato'] = serialize($arrRegiDato);
    $_SESSION['Enca'] = serialize($arrEnca2PDF);
    $_SESSION['Anch'] = serialize($arrAnch2PDF);
    $_SESSION['Just'] = serialize($arrJust2PDF);
    QApplication::Redirect('../../../newliberty/includes/app_includes/tabla2xls2.php?nomb_repo='.$strNombArch);
}
?>