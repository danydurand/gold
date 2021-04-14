<?php
$strNombSist = "OKINAWA<br>MOBILE";
$strNombEmpr = 'SERVI EXPRESS';
if (isset($_SESSION['User'])) {
    $objUsuaCone = unserialize($_SESSION['User']);
    $strNombUsua = $objUsuaCone->Nombre." (".$objUsuaCone->Login.")";
    $strDatoUsua = $objUsuaCone->Login;
    $strDatoGrup = $objUsuaCone->Login." (".$objUsuaCone->Grupo->Nombre.")";
    $strLastAcce = "Ultimo Acceso: ".$objUsuaCone->UltimoAcceso->__toString("YYYY-MM-DD");
    $strLinkMenu = __APP__.'/mg.php?m=main';

    $_SESSION['NombProg'] = basename($_SERVER['SCRIPT_FILENAME']);
    $strNombProg = basename($_SERVER['SCRIPT_FILENAME']);
    // if (isset($_GET['m'])) {
    //     $_SESSION['NombProg'] = $_GET['m'];
    // }
    // $objDependen = Opcion::DeQuienDepende($_SESSION['NombProg'],$_SESSION['Sistema']);
    // if ($objDependen->TipoId == TipoOpciType::MENU) {
    //     $strTextOpci = 'mg.php?m='.trim($objDependen->Programa); 
    // } else {
    //     $strTextOpci = trim($objDependen->Directorio).'/'.trim($objDependen->Programa);
    // }
    // $_SESSION['PagiBack'] = __APP__.'/'.$strTextOpci;

    if (isset($_SESSION['ProgReto'])) {
        $_SESSION['PagiBack'] = $_SESSION['ProgReto'];
        unset($_SESSION['ProgReto']); 
    }
} 
?>
