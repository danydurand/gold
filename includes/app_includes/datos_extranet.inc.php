<?php
$strNombSist = "EXTRANET";
$strNombEmpr = 'SERVI EXPRESS';
if (isset($_SESSION['User'])) {
    $objUsuaCone = unserialize($_SESSION['User']);
    $strNombUsua = $objUsuaCone->Nombre;
    $strDatoUsua = 'Login'; //$objUsuaCone->Login;
    $strDatoGrup = $objUsuaCone->Nombre." (VE#".$objUsuaCone->Id.")";
    $strLastAcce = "Ultimo Acceso: ".$objUsuaCone->FechaAccesoWeb->__toString("YYYY-MM-DD");
    $strLinkMenu = __EXT__.'/mg.php?m=main';

    $_SESSION['NombProg'] = basename($_SERVER['SCRIPT_FILENAME']);
    $strNombProg = basename($_SERVER['SCRIPT_FILENAME']);
    if (isset($_GET['m'])) {
        $_SESSION['NombProg'] = $_GET['m'];
    }
    $objDependen = Opcion::DeQuienDepende($_SESSION['NombProg'],$_SESSION['Sistema']);
    if ($objDependen->TipoId == TipoOpciType::MENU) {
        $strTextOpci = 'mg.php?m='.trim($objDependen->Programa); 
    } else {
        $strTextOpci = trim($objDependen->Directorio).'/'.trim($objDependen->Programa);
    }
    $_SESSION['PagiBack'] = __EXT__.'/'.$strTextOpci;
//    $_SESSION['PagiBack'] = './'.$strTextOpci;

    if (isset($_SESSION['ProgReto'])) {
        $_SESSION['PagiBack'] = $_SESSION['ProgReto'];
        unset($_SESSION['ProgReto']); 
    }
} 
?>
