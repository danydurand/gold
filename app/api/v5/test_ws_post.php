<?php
require_once('../qcubed.inc.php');

$intAgenIdxx = 1;
$strApixKeyx = '1234564';

$objClieNuev = Cliente::Load(3);

// var_dump($objClieNuev);
// echo "<br>\n<hr>";

$arrDataClie = array(
  "AgencyId"    => $intAgenIdxx,
  "ApiKey"      => $strApixKeyx,
  "Code"        => 'VE'.$objClieNuev->Id,
  "Name"        => $objClieNuev->Nombre,
  "Lock"        => $objClieNuev->Bloqueado,
  "LockReason"  => $objClieNuev->RazonDeBloqueo,
  "CreatedAt"   => date("Y-m-d"),
  "CreatedHour" => date("H:i")
);

$strDireUrlx = "http://localhost/oeg/app/api/v6/rest.php/customer_api/";
$strVariCurl = curl_init($strDireUrlx);
curl_setopt($strVariCurl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($strVariCurl, CURLOPT_POST,1); 
curl_setopt($strVariCurl, CURLOPT_POSTFIELDS, $arrDataClie);

$objClieRegi = curl_exec($strVariCurl);
var_dump($objClieRegi);


/*
    $data_inse   = array(
        "Name" => $_POST['coun_name'],
        "Iata" => $_POST['coun_iata'],
        "LimitHv" => $_POST['coun_limi']
    );

    $dire_urlx = "http://localhost/oeg/app/api/v6/rest.php/country/";
    
    $clie_rest = curl_init($dire_urlx);
    
    curl_setopt($clie_rest, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($clie_rest, CURLOPT_POST,1); 
    curl_setopt($clie_rest, CURLOPT_POSTFIELDS, $data_inse);
    
    $resp_serv = curl_exec($clie_rest);
    var_dump($resp_serv);
*/