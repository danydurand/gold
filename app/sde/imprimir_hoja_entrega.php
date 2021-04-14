<?php
//-----------------------------------------------------------------------------
// Programa      : imprimir_hoja_entrega.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 29/07/2017
// Descripcion   : Este programa imprime hoja de entrega.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
// require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
require_once('/appl/lib/my_hoja_entrega_pdf.php');
//--------------------------------------------------------------
// Se verifica si se ha pasado o no el número de un manifiesto.
//--------------------------------------------------------------
if (isset($_GET['manifiesto'])) {
    $strNumeMani = $_GET['manifiesto'];
} else {
    $strNumeMani = '';
}
//------------------------------------------------------------
// Se optiene el manifiesto y se verifica si el mismo existe.
//------------------------------------------------------------
$objManifiesto = SdeContenedor::Load($strNumeMani);
if ($objManifiesto) {
    //--------------------------------------------------------------
    // Se optiene el chofer asociado a la operación del manifiesto.
    //--------------------------------------------------------------
    $objChofer = Chofer::Load($objManifiesto->CodiOperObject->CodiChof);
    $intContRegi = 0;
    //--------------------------------------------------------------
    // Se procesan las Valijas incluidas dentro del Contenedor
    //--------------------------------------------------------------
    $arrValiMani = $objManifiesto->GetParentSdeContenedorAsSdeContContArray();
    foreach ($arrValiMani as $objValija) {
        foreach ($objValija->GetGuiaArray() as $objGuia) {
            $intContRegi++;
            if ($objGuia->TipoGuia == TipoGuiaType::CODCOBROENDESTINO) {
                $strTipoGuia = TipoGuiaType::ToStringCorto($objGuia->TipoGuia)."\n".$objGuia->MontoTotal;
            } else {
                $strTipoGuia = TipoGuiaType::ToStringCorto($objGuia->TipoGuia);
            }
            $arrRegiDato[] = array($intContRegi,$objGuia->NumeGuia,$strTipoGuia,$objGuia->FechGuia->__toString("DD/MM/YYYY"),$objGuia->DireDest,'','');
        }
    }
    //-------------------------------------------------------
    // Se procesan ahora las Guias asociadas al Contenedor
    //-------------------------------------------------------
    foreach ($objManifiesto->GetGuiaArray() as $objGuia) {
        $intContRegi++;
        if ($objGuia->TipoGuia == TipoGuiaType::CODCOBROENDESTINO) {
            $strTipoGuia = TipoGuiaType::ToStringCorto($objGuia->TipoGuia)."\n".$objGuia->MontoTotal;
        } else {
            $strTipoGuia = TipoGuiaType::ToStringCorto($objGuia->TipoGuia);
        }
        if (strlen($objGuia->GuiaExterna) > 0) {
            $strTipoGuia .= "\n".$objGuia->GuiaExterna;
        }
        if ($objGuia->TieneGuiaRetorno == 1) {
            $strNumeGuia = $objGuia->NumeGuia."\n"."GR:".$objGuia->GuiaRetorno;
        } else {
            $strNumeGuia = $objGuia->NumeGuia;
        }
        $strFechCant = $objGuia->FechGuia->__toString("DD/MM/YYYY")."\nPzas: ".$objGuia->CantPiez;
        $strDestDire = $objGuia->NombDest."\n".$objGuia->DireDest."\nTLF.: ".$objGuia->TeleDest;
        $arrRegiDato[] = array($intContRegi,$strNumeGuia,$strTipoGuia,$strFechCant,$strDestDire,'','','');
    }
    //------------------------------------------------------------------------------------
    // Se optienen parámetros para el logo y data fiscal para la hoja de entrega a crear,
    // y se arma la descripción de la ruta.
    //------------------------------------------------------------------------------------
    $objParametro = Parametro::Load('88888','logos');
    $strlogo = '../'.$objParametro->ParaTxt1;
    $strlogo = '';
    $objParametro = Parametro::Load('88888','datfisc');
    $strNombEmpr = $objParametro->ParaTxt1;
    $strDireEmpr = $objParametro->ParaTxt5;
    $strDescRuta  = $objManifiesto->CodiOperObject->CodiRutaObject->DescRuta.' (';
    $strDescRuta .= $objManifiesto->CodiOperObject->CodiChofObject->NombChof.' ';
    $strDescRuta .= $objManifiesto->CodiOperObject->CodiChofObject->ApelChof.')';
    //--------------------------------------------------------------------------------------------
    // Se arma configuración para ajuste de descripción, ubicación y tamaño de campos de la hoja.
    //--------------------------------------------------------------------------------------------
    $arrEncaColu = array('No','GUIA','TIPO','FECHA','DESTINATARIO / DIR. DE ENTREGA','NOMBRE, APELLIDO Y CEDULA','EMPRDTA / FIRMA / OBSERVACION','HORA');
    $arrJustColu = array('L','C','C','C','L','L','L','C');
    $arrAnchColu = array(8,15,30,20,55,55,55,20);
    //--------------------------------------------------
    // Se crea la hoja PDF y un mensaje de declaración.
    //--------------------------------------------------
    $pdf=new PDF('L','mm','Letter');
    $strMensaje  = 'Yo '.$objChofer->NombChof.' '.$objChofer->ApelChof.' Cedula de Identidad Nro '.$objChofer->NumeCedu."  ";
    $strMensaje .= 'He recibido la cantidad de '.count($arrRegiDato).' productos pertenecientes a Clientes de |'.$strNombEmpr.', para ser distribuidas ';
    $strMensaje .= 'en los siguientes destinos: '.implode($objManifiesto->GetDestinos(),", ");
    //-----------------------------------------------
    // Se termina de armar la hoja y luego se emite.
    //-----------------------------------------------
    $pdf->setVariables($arrEncaColu,$arrJustColu,$arrAnchColu,2,$strlogo,$strDescRuta,$objManifiesto->CodiOperObject->CodiRuta,$strNumeMani);
    $pdf->setEmpresa($strNombEmpr,$strDireEmpr,'HOJA DE ENTREGA');
    $pdf->SetTitle('HOJA DE ENTREGA');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->FancyTable($arrEncaColu,$arrRegiDato,$arrAnchColu,$arrJustColu);
    $pdf->Output();
}