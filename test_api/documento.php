<?php
#--------------------------------------------------------------------------------
# Programa      : documento.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 18/06/2018
# Descripcion   : Este programa realiza un test sobre la API del IFis (programa
#                 de facturacion del Expreso Nacional de LibertyExpress
#--------------------------------------------------------------------------------

if ($argc < 4) {
    echo "\nSintaxis: php dpcumento.php Servidor(local/remoto) NombreDeDocumento(factura/ndc) IdDelDocumento\n";
    return;
}
$strNombServ = $argv[1];
if (!in_array($strNombServ,array('local','remoto'))) {
    echo "\nEl nombre del servidor debe ser 'local' o 'remoto' \n";
    return;
} else {
    if ($strNombServ == 'local') {
        $strNombServ = 'localhost';
    } else {
       $strNombServ = '200.74.218.244';
    }
}
$strNombRuti = $argv[2];
if (!in_array($strNombRuti,array('factura','ndc'))) {
    echo "\nEl nombre del documento debe ser 'factura' o 'ndc' \n";
    return;
}
$intNumeFact = $argv[3];
$url = "http://".$strNombServ."/liberty/ws/cliente.php?NombRuti=".$strNombRuti."&id=".$intNumeFact;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
