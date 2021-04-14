<?php
#--------------------------------------------------------------------------------
# Programa      : retorno_if.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 19/06/2018
# Descripcion   : Este programa realiza un test sobre la API del IFis (programa
#                 de facturacion del Expreso Nacional de LibertyExpress
#--------------------------------------------------------------------------------

if ($argc < 8) {
    echo "\nSintaxis: php retorno_if.php Servidor(local/remoto) IdDoc TipoDoc DocuFisc MaquFisc FechImpr HoraImpr\n";
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
$intIdxxDocu = $argv[2];
if (!is_numeric($intIdxxDocu)) {
    echo "\nEl IdDoc debe ser un número \n";
    return;
} else {
    $intIdxxDocu = (int)$intIdxxDocu;
}
$strTipoDocu = $argv[3];
if (!in_array($strTipoDocu,array('F','N'))) {
    echo "\nEl Tipo del Documento debe ser (F)actura o (N)ota De Credito \n";
    return;
}
$strDocuFisc = $argv[4];
$strMaquFisc = $argv[5];
$strFechImpr = $argv[6];
if (strlen($strFechImpr) != 6) {
    echo "\nLa Fecha de Impresion debe tener el formato YYMMDD \n";
    return;
}
$strHoraImpr = $argv[7];
if (strlen($strHoraImpr) != 6) {
    echo "\nLa Hora de Impresion debe tener el formato HHMMSS \n";
    return;
}
$strUrlXBase = "http://".$strNombServ."/liberty/ws/cliente.php?NombRuti=retorno_if";
$strUrlxAdic = "&id=".$intIdxxDocu."&td=".$strTipoDocu."&df=".$strDocuFisc."&mf=".$strMaquFisc."&fi=".$strFechImpr."&hi=".$strHoraImpr;
$strUrlxComp = $strUrlXBase.$strUrlxAdic;
$ch = curl_init($strUrlxComp);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
