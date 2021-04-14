<?php
//-----------------------------------------------------------------------------
// Programa      : imprimir_hoja_entregaXls.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 14/08/2017
// Descripcion   : Este programa imprime hoja de entrega en Excel.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
require_once('/appl/lib/my_hoja_entrega_pdf.php');

$objUser = unserialize($_SESSION['User']);

if (isset($_GET['manifiesto'])) {
    $strNumeMani = $_GET['manifiesto'];
} else {
    $strNumeMani = '';
}
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strNombArch = 'HojadeEntrega';
//----------------
// Encabezados
//----------------
$arrEnca2PDF = array('No','GUIA','TIPO','FECHA','DESTINATARIO / DIR. DE ENTREGA','NOMBRE, APELLIDO Y CEDULA','EMPRDTA / FIRMA / OBSERVACION','HORA');
$arrJust2PDF = array('L','C','C','C','L','L','L','C');
$arrAnch2PDF = array(8,15,15,20,60,60,60,20);

$objManifiesto = SdeContenedor::Load($strNumeMani);
if ($objManifiesto) {
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
        if ($objGuia->TieneGuiaRetorno == 1) {
            $strNumeGuia = $objGuia->NumeGuia."\n"."GR:".$objGuia->GuiaRetorno;
        } else {
            $strNumeGuia = $objGuia->NumeGuia;
        }
        $strFechCant = $objGuia->FechGuia->__toString("DD/MM/YYYY")."\nPzas: ".$objGuia->CantPiez;
        $strDestDire = $objGuia->NombDest."\n".$objGuia->DireDest."\nTLF.: ".$objGuia->TeleDest;
        $arrRegiDato[] = array($intContRegi,$strNumeGuia,$strTipoGuia,$strFechCant,$strDestDire,'','','');
    }
    //----------------------------------------------------------------------
    // El vector generado, se lleva al archivo plano
    //----------------------------------------------------------------------
    $_SESSION['Dato'] = serialize($arrRegiDato);
    $_SESSION['Enca'] = serialize($arrEnca2PDF);
    $_SESSION['Anch'] = serialize($arrAnch2PDF);
    $_SESSION['Just'] = serialize($arrJust2PDF);
    QApplication::Redirect('../../../newliberty/includes/app_includes/tabla2xls2.php?nomb_repo='.$strNombArch);
}
?>