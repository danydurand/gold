<?php
//----------------------------------------------------------------------------------
// Programa      : actualizar_guias_sin_ckpt.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 03/04/2018
// Descripcion   : Este programa asigna un checkpoint NR a cualquier guia, creada
//                 en el Sistema CORP, que se haya quedado sin ese checkpoint.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

$_SESSION['User'] = serialize(Usuario::LoadByLogiUsua('liberty'));
$objDatabase      = Guia::GetDatabase();
$objCheckpoint    = SdeCheckpoint::Load('NR');
//------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//------------------------------------------------------------------
$mixManeArch = fopen('guias_sin_ckpt.txt','w');
fputs($mixManeArch,"\nGuias sin Checkpoint");
fputs($mixManeArch,"\n====================\n\n");
//---------------------------------------
// Criterios de seleccion de registros
//---------------------------------------
$strCadeSqlx  = "select nume_guia, fech_guia, codi_ckpt, anulada as guia_anul ";
$strCadeSqlx .= "   from guia ";
$strCadeSqlx .= "  where fech_guia >= '2018-04-01' ";
$strCadeSqlx .= "    and (length(codi_ckpt) = 0 or isnull(codi_ckpt)) ";
$strCadeSqlx .= "    and sistema_id = 'con'";
$objResuChec  = $objDatabase->Query($strCadeSqlx);
$intContBuen  = 0;
$intContMalo  = 0;
while ($mixRegistro = $objResuChec->FetchArray()) {
    $arrDatoCkpt = array();
    $arrDatoCkpt['NumeGuia'] = $mixRegistro['nume_guia'];
    $arrDatoCkpt['UltiCkpt'] = $mixRegistro['codi_ckpt'];
    $arrDatoCkpt['GuiaAnul'] = $mixRegistro['guia_anul'];
    $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
    $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt;
    $arrDatoCkpt['CodiRuta'] = '';
    $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
    if ($arrResuGrab['TodoOkey']) {
        $strLineText  = sprintf("Se proceso la Guia: %s del %s\n", $mixRegistro['nume_guia'], $mixRegistro['fech_guia']);
        fputs($mixManeArch,$strLineText);
        $intContBuen++;
    } else {
        $strLineText  = sprintf("Error al procesar la Guia: %s del %s (%s)\n", $mixRegistro['nume_guia'], $mixRegistro['fech_guia'],$arrResuGrab['MotiNook']);
        fputs($mixManeArch,$strLineText);
        $intContMalo++;
    }
}
fclose($mixManeArch);
//---------------------------------
// Se envia el reporte por e-mail
//---------------------------------
if ($intContBuen > 0 || $intContMalo > 0) {
    $mail = new PHPMailer();
    $mail->setFrom('SisCO@goldsist.com', 'Control de Fallas');
    $mail->addAddress('soportelufeman@gmail.com');
    $mail->Subject  = "Guias sin Checkpoint";
    $mail->Body     = 'Estimado Usuario, sírvase revisar el documento anexo...';
    $mail->addAttachment($mixManeArch);
    if(!$mail->send()) {
        echo "Message was not sent.\n";
        echo "Mailer error: " . $mail->ErrorInfo."\n";
    }
}
?>
