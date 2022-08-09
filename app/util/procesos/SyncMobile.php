<?php
#-----------------------------------------------------------------------------------
# Programa      : SyncMobile.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 10/02/2022
# Descripcion   : Este programa sincroniza los Manifietos Mobile con las tablas
#                 originales del Sistema y adicionalmente borra aquellos que esten
#                 con estatus CERRAD@
#-----------------------------------------------------------------------------------
$strNombHost = gethostname();
if ($strNombHost == 'mike') {
    $_SERVER['SERVER_NAME'] = 'goldsist.com';
} else {
    $_SERVER['SERVER_NAME'] = 'gold.dev.com';
}

require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

error_reporting(E_ALL);
//-------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//-------------------------------------------------------------------
$mixManeArch = fopen('/tmp/SyncMobile.log','w');
fputs($mixManeArch,"\nIniciando la Sincronizacion de Manifiestos Mobile");
fputs($mixManeArch,"\n=================================================\n\n");
//-----------------------------------
// Seleccion de Manifiestos Mobile
//-----------------------------------
$arrManiMobi = ContainerMobile::LoadAll();
fputs($mixManeArch,"Hay ".count($arrManiMobi)." Manifiestos Mobile para examinar\n");
$intCantMani = 0;
foreach ($arrManiMobi as $objManiMobi) {
    $intPiezSync = ContainerPiezaMobile::CountByContainerMobileIdIsSync($objManiMobi->Id, false);
    $strTextMens = "Manif: ".$objManiMobi->Container->Numero." (Id: ".$objManiMobi->Id.") tiene: ".$intPiezSync." por sincronizar\n";
    fputs($mixManeArch,$strTextMens);
    if ($intPiezSync) {
        $objUsuario = Chofer::Load($objManiMobi->ChoferId);
        $_SESSION['User'] = serialize($objUsuario);
        $objContOrig = Containers::Load($objManiMobi->ContainerId);
        $strTextMens = 'Procesando Manif: '.$objManiMobi->Container->Numero;
        fputs($mixManeArch,$strTextMens."\n");
        list($intCantPiez, $intCantErro, $strTextMens) = $objContOrig->TransferirFromMobile();
        if (strlen($strTextMens) > 0) {
            fputs($mixManeArch,"Error: ".$strTextMens."\n");
        } else {
            $strTextMens = "Piezas Sincronizadas: $intCantPiez";
            fputs($mixManeArch,$strTextMens."\n");
        }
        $intCantMani++;
    }
}
$strTextMens = 'Manifiestos Mobile sincronizados: '.$intCantMani;
fputs($mixManeArch,$strTextMens."\n");

//-------------------------------------------
// Los Manifiestos Cerrados, seran borrados
//-------------------------------------------
$objClauWher[] = QQ::Equal(QQN::ContainerMobile()->Abierto,false);
$arrManiCerr   = ContainerMobile::QueryArray(QQ::AndCondition($objClauWher));
fputs($mixManeArch,"Hay ".count($arrManiMobi)." Manifiestos Mobile cerrados que serán borrados\n");
$intCantCerr = 0;
foreach ($arrManiCerr as $objManiCerr) {
    $strTextMens = 'Borrando Manif: '.$objManiCerr->Container->Numero.' (Mobile:'.$objManiCerr->Id.')';
    fputs($mixManeArch,$strTextMens."\n");
    $objManiCerr->Delete();
    $intCantCerr++;
}
$strTextMens = 'Manifiestos Mobile borrados: '.$intCantCerr;
fputs($mixManeArch,$strTextMens."\n");


fclose($mixManeArch);
if ($intCantMani > 0) {
    //--------------------------------
    // Envio el reporte por e-mail
    //--------------------------------
    $mail = new PHPMailer();
    try {
        $mail->isHTML(true);
        $mail->setFrom('noti@goldsist.com', 'Sincronizacion Mobile');
        $mail->addAddress('soporte@lufemansoftware.com');
        $mail->Subject = "Sincronizacion y Borrado de Manifiestos Mobile ($intCantMani | $intCantCerr)";
        $mail->Body = 'Estimado Usuario, sírvase revisar el documento anexo...';
        $mail->addAttachment($mixManeArch);
        $mail->send();
    } catch (Exception $e) {
        echo "Message was not sent.\n";
        echo "Mailer error: " . $mail->ErrorInfo."\n";
    }
}

?>

