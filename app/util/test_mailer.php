<?php
//--------------------------------------------------------------------------------
// Programa      : test_mailer.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 08/03/2018
//--------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->setFrom('SisCO@goldsist.com', 'Medicion y Control');
$mail->addAddress('danydurand@gmail.com', 'Daniel');
$mail->Subject  = 'First PHPMailer Message';
$mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
$mail->addAttachment('borrar_guias_no_recibidas_72Hrs.txt');
if(!$mail->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

?>
