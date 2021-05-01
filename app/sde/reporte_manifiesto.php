<?php
//-----------------------------------------------------------------------------
// Programa      : imprimir_manifiesto.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 14/08/2017
// Descripcion   : Este programa imprime manifiesto de carga.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
require_once('/appl/lib/mylistapdf.php');
//require_once(__APP_INCLUDES__.'/manifiesto_nuevo.php');


if (isset($_GET['manifiesto'])) {
    $strNumeMani = $_GET['manifiesto'];
} else {
    $strNumeMani = '';
}
$arrRegiDato = array();
$objManifiesto = SdeContenedor::Load($strNumeMani);
if ($objManifiesto) {
    $objChofer = Chofer::Load($objManifiesto->CodiOperObject->CodiChof);
    $intContRegi = 0;
    $intTotaPiez = 0;
    $decPesoTota = 0;
    //--------------------------------------------------------------
    // Se procesan las Valijas incluidas dentro del Contenedor
    //--------------------------------------------------------------
    $arrValiMani = $objManifiesto->GetParentSdeContenedorAsSdeContContArray();
    foreach ($arrValiMani as $objValija) {
        $intContRegi++;
        $intCantPiez = $objValija->CountGuias();
        $decSumaPeso = $objValija->SumaPesos();
        $decSumaMont = $objValija->SumaMontos();
        $arrRegiDato[] = array(
            $intContRegi,
            $objValija->NumeCont,
            $decSumaMont,
            'Valija',
            $objValija->Fecha->__toString("DD/MM/YYYY"),
            'GoldCoast',
            'GoldCoast',
            '',
            $intCantPiez,
            $decSumaPeso
        );
        $intTotaPiez += $intCantPiez;
        $decPesoTota += $decSumaPeso;
        //foreach ($objValija->GetGuiaArray() as $objGuia) {
        //    $strSistGuia = '';
        //    if ($objGuia->SistemaId == 'cnt') {
        //        $strSistGuia = "EXPR";
        //    }
        //    $intContRegi++;
        //    $arrRegiDato[] = array(
        //        $intContRegi,
        //        $objGuia->NumeGuia,
        //        nfp($objGuia->MontoTotal),
        //        $strSistGuia,
        //        $objGuia->FechGuia->__toString("DD/MM/YYYY"),
        //        substr($objGuia->NombRemi,0,30),
        //        substr($objGuia->NombDest,0,30),
        //        $objGuia->EstaDest,
        //        $objGuia->CantPiez,
        //        $objGuia->PesoGuia
        //    );
        //    $intTotaPiez += $objGuia->CantPiez;
        //    $decPesoTota += floatval($objGuia->PesoGuia);
        //}
    }
    //-------------------------------------------------------
    // Se procesan ahora las Guias asociadas al Contenedor
    //-------------------------------------------------------
    foreach ($objManifiesto->GetGuiaArray() as $objGuia) {
        $strSistGuia = '';
        if ($objGuia->SistemaId == 'cnt') {
            $strSistGuia = "EXPR";
        }
        $intContRegi++;
        $arrRegiDato[] = array(
            $intContRegi,
            $objGuia->NumeGuia,
            nfp($objGuia->MontoTotal),
            $strSistGuia,
            $objGuia->FechGuia->__toString("DD/MM/YYYY"),
            substr($objGuia->NombRemi,0,30),
            substr($objGuia->NombDest,0,30),
            $objGuia->EstaDest,
            $objGuia->CantPiez,
            $objGuia->PesoGuia
        );
        $intTotaPiez += $objGuia->CantPiez;
        $decPesoTota += floatval($objGuia->PesoGuia);
    }
    //--------------------------------------------
    // Se envia una ultima linea con los totales
    //--------------------------------------------
    $arrRegiDato[] = array('','','','','','','','TOTAL',$intTotaPiez,nfp($decPesoTota));

    $objParametro = Parametro::Load('88888','logos');
    $strlogo = '../'.$objParametro->ParaTxt1;
    $strlogo = '';
    $objParametro = Parametro::Load('88888','datfisc');
    $strNombEmpr = $objParametro->ParaTxt1;
    $strDireEmpr = $objParametro->ParaTxt5;
    $arrEncaColu = array('Nro','GUIA','MONTO','SIST','FECHA','REMITENTE','DESTINATARIO','DEST','BLT','PESO');
    $arrJustColu = array('R','C','R','C','C','L','L','C','R','R');
    $arrAnchColu = array(9,17,22,20,18,65,65,13,10,18);

    $pdf=new PDF('L','mm','Letter');
    $strDestOper = implode($objManifiesto->GetDestinos(),", ");
    $strDestOper = substr($strDestOper, 0 ,80);
    $strMensaje  = 'Yo '.$objManifiesto->NombreChofer.', C.I. Nro '.$objManifiesto->CedulaChofer.", ";
    $strMensaje .= 'he recibido la cantidad de '.$intTotaPiez.' bultos pertenecientes a Clientes de '.$strNombEmpr.', para ser distribuidas ';
    $strMensaje .= 'en un(a) '.$objManifiesto->DescipcionVehiculo.' de placa: '.$objManifiesto->PlacaVehiculo.',|';
    $strMensaje .= 'en los siguientes destinos: '.substr(implode($objManifiesto->GetDestinos(),", "),0,120);
    $pdf->setVariables($arrEncaColu,$arrJustColu,$arrAnchColu,1,$objManifiesto->NumeCont.' ('.$objManifiesto->CodiOperObject->CodiRuta.')',$objManifiesto->Fecha->__toString('DD/MM/YYYY'),$strMensaje,20);
    $pdf->setEmpresa($strNombEmpr,$strDireEmpr,'MANIFIESTO');
    $pdf->SetTitle('MANIFIESTO');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->FancyTable($arrEncaColu,$arrRegiDato,$arrAnchColu,$arrJustColu);
    $pdf->Output();
}
?>