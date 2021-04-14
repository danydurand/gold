<?php
$strNombSist = "Connect";
$strNombEmpr = 'GOLD COAST';
if (isset($_SESSION['User'])) {
    $objUsuaCone = unserialize($_SESSION['User']);
    $objClieUsua = unserialize($_SESSION['ClieMast']);
    $strNombUsua = $objUsuaCone->__nombreApellido()." (".$objUsuaCone->LogiUsua.")";
    $strDatoUsua = $objUsuaCone->LogiUsua.' ('.$objUsuaCone->Sucursal->Iata.')';
    $strDatoClie = $objClieUsua->NombClie;
    $strLastAcce = "Ultimo Acceso: ".$objUsuaCone->FechaAcceso->__toString("YYYY-MM-DD");
    $strLinkMenu = __YAMAGUCHI__.'/mg.php?m=main';

    $_SESSION['NombProg'] = basename($_SERVER['SCRIPT_FILENAME']);
    $strNombProg = basename($_SERVER['SCRIPT_FILENAME']);
    if (isset($_GET['m'])) {
        $_SESSION['NombProg'] = $_GET['m'];
    }
}
?>
