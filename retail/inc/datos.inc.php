<?php
$strNombSist = "Retail";
$strNombEmpr = 'GOLD COAST';
if (isset($_SESSION['User'])) {
    /* @var $objUsuaCone Usuario */
    $objUsuaCone = unserialize($_SESSION['User']);
    //$objClieUsua = unserialize($_SESSION['ClieMast']);
    $strNombUsua = $objUsuaCone->__nombreApellido()." (".$objUsuaCone->LogiUsua.")";
    $strDatoUsua = $objUsuaCone->LogiUsua.' ('.$objUsuaCone->Sucursal->Iata.')';
    //$strDatoClie = $objClieUsua->NombClie;
    $strLastAcce = "Ultimo Acceso: ".$objUsuaCone->FechAcce->__toString("YYYY-MM-DD");
    $strLinkMenu = __RET__.'/mg.php?m=main';

    $_SESSION['NombProg'] = basename($_SERVER['SCRIPT_FILENAME']);
    $strNombProg = basename($_SERVER['SCRIPT_FILENAME']);
    if (isset($_GET['m'])) {
        $_SESSION['NombProg'] = $_GET['m'];
    }
}
?>
