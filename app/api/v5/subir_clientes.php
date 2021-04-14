<?php
//------------------------------------------------------------------------
// Programa      : subir_clientes.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 01/12/2015
// Descripcion   : Este programa se encarga de transferir datos de los
//                 los Clientes a traves del API de OEG Int.
//------------------------------------------------------------------------
require_once '../qcubed.inc.php';

error_reporting(E_ALL);
//-------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//-------------------------------------------------------------------
$mixManeArch = fopen('subir_clientes.txt', 'a');
fputs($mixManeArch, "\n\n");
fputs($mixManeArch, "Subiendo Clientes\n");
fputs($mixManeArch, "=================\n");
fputs($mixManeArch, "Fecha: " . date("Y-m-d") . "  Hora: " . date("H:i") . "\n\n");
//---------------------------------------------------
// Variables necesarias para la ejecucion del Api
//---------------------------------------------------
$strDireUrlx = "http://localhost/oeg/app/api/v6/rest.php/customer_api/";

$strVariCurl = curl_init($strDireUrlx);

curl_setopt($strVariCurl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($strVariCurl, CURLOPT_POST, 1); 

$strApixKeyx = '1234564';
$intAgenIdxx = '1';
//-------------------------------------------------------------------------------
// Inicialmente se leen de la base de datos los Clientes creados cuyo
// api_regi_id sea igual a -1 y cuyo resultado de registro (resultado_regi) sea
// null (lo cual indica que no ha sido enviado a OEG).
//-------------------------------------------------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Cliente()->Id, 1);
$objClauWher[] = QQ::Equal(QQN::Cliente()->ApiRegiId, -1);
$objClauWher[] = QQ::IsNull(QQN::Cliente()->ResultadoRegi);
$objClauWher[] = QQ::IsNull(QQN::Cliente()->ResultadoModi);
$arrClieNuev   = Cliente::QueryArray(QQ::AndCondition($objClauWher));
$intCantNuev   = count($arrClieNuev);
$strTextMens   = 'Existe(n) '.$intCantNuev.' Cliente(s) nuevo(s) que debe(n) ser ';
                 'procesado(s)';
fputs($mixManeArch, $strTextMens. "\n\n");
foreach ($arrClieNuev as $objClieNuev) {
    $strTextMens = "Voy a procesar al Cliente: ".$objClieNuev->Nombre.
                   " (".$objClieNuev->Id.")";
    fputs($mixManeArch, $strTextMens. "\n");
    $arrDataInse = array(
        "AgencyId"   => $intAgenIdxx,
        "ApiKey"     => $strApixKeyx,
        "Code"       => 'VE'.$objClieNuev->Id,
        "Name"       => $objClieNuev->Nombre,
        "Lock"       => $objClieNuev->Bloqueado,
        "LockReason" => $objClieNuev->RazonDeBloqueo
    );
    curl_setopt($strVariCurl, CURLOPT_POSTFIELDS, $arrDataInse);
    
    $objClieRegi = curl_exec($strVariCurl);
    if ($objClieRegi) {
        $objClieNuev->ApiRegiId = $objClieRegi->Id;
        $objClieNuev->Save();
        $strTextMens = 'Id asignado por la interfaz: '.$objClieNuev->ApiRegiId;
        fputs($mixManeArch, $strTextMens. "\n");
    } else {
        $strTextMens = 'Ocurrio algun error con el Cliente ';
        fputs($mixManeArch, $strTextMens. "\n");
    }
}
$strTextMens = "\n\n**** El proceso ha culminado ****";
fputs($mixManeArch, $strTextMens. "\n");
