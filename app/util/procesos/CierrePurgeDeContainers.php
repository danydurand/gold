<?php
#-----------------------------------------------------------------------------------
# Programa      : PurgeContainersCerrados.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 10/02/2022
# Descripcion   : Este programa elimina de la base de datos cualquier manifiesto
#                 de salida a ruta que este cerrado y cuya antiguedad sea superior
#                 a tres meses.
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
$mixManeArch = fopen('/tmp/CierrePurgeDeContainers.log','w');
$intCantCier = 0;
$intCantPurg = 0;

fputs($mixManeArch,"\nCerrando los Contenedores Abiertos Viejos");
fputs($mixManeArch,"\n=========================================\n");
$intCantCier += Containers::CierreForzado($mixManeArch,90);
$strTextMens = 'Manifiestos ABIERT@ cambiados a CERRAD@: '.$intCantCier;
fputs($mixManeArch,$strTextMens."\n");

fputs($mixManeArch,"\nIniciando limpieza de Containers Cerrados");
fputs($mixManeArch,"\n=========================================\n");
$intCantPurg += Containers::Purge($mixManeArch, 90);
$strTextMens = 'Manifiestos Cerrados Eliminados: '.$intCantPurg;
fputs($mixManeArch,$strTextMens."\n");
fclose($mixManeArch);

if ( ($intCantCier > 0) || ($intCantPurg > 0) ){
    //--------------------------------
    // Envio el reporte por e-mail
    //--------------------------------
    $mail = new PHPMailer();
    try {
        $mail->isHTML(true);
        $mail->setFrom('noti@goldsist.com', 'Cerrado y Borrado de Containers');
        $mail->addAddress('soporte@lufemansoftware.com');
        $mail->Subject = "Containers Cerrados: $intCantCier | Containers Borrados: $intCantPurg";
        $mail->Body = 'Estimado Usuario, sírvase revisar el documento anexo...';
        $mail->addAttachment($mixManeArch);
        $mail->send();
    } catch (Exception $e) {
        echo "Message was not sent.\n";
        echo "Mailer error: " . $mail->ErrorInfo."\n";
    }
}

?>

