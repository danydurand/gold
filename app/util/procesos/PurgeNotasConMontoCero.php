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
$mixManeArch = fopen('/tmp/PurgeNotasConMontoCero.log','w');
fputs($mixManeArch,"\nBorrando Notas de Credito con Monto Cero");
fputs($mixManeArch,"\n========================================\n\n");
//-----------------------------------
// Seleccion de Manifiestos Mobile
//-----------------------------------
$objClauWher[] = QQ::Equal(QQN::NotaCreditoCorp()->Monto,0);
$arrNotaCero   = NotaCreditoCorp::QueryArray(QQ::AndCondition($objClauWher));
fputs($mixManeArch,"Hay ".count($arrNotaCero)." Notas de Credito para borrar\n");
$intCantNota = 0;
foreach ($arrNotaCero as $objNotaCero) {
    $strTextMens = "Nota: ".$objNotaCero->Numero." (Id: ".$objNotaCero->Id.") \n";
    fputs($mixManeArch,$strTextMens);
    $objNotaCero->Delete();
    $intCantNota++;
}
$strTextMens = 'Notas en Cero borradas: '.$intCantNota;
fputs($mixManeArch,$strTextMens."\n");
fclose($mixManeArch);
if ($intCantNota > 0) {
    //--------------------------------
    // Envio el reporte por e-mail
    //--------------------------------
    $mail = new PHPMailer();
    try {
        $mail->isHTML(true);
        $mail->setFrom('noti@goldsist.com', 'NDC en Cero Borradas');
        $mail->addAddress('soporte@lufemansoftware.com');
        $mail->Subject = "Sincronizacion y Borrado de Manifiestos Mobile ($intCantNota)";
        $mail->Body = 'Estimado Usuario, sírvase revisar el documento anexo...';
        $mail->addAttachment($mixManeArch);
        $mail->send();
    } catch (Exception $e) {
        echo "Message was not sent.\n";
        echo "Mailer error: " . $mail->ErrorInfo."\n";
    }
}

?>

