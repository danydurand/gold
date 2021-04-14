<?php
//--------------------------------------------------------------------------------------------------
// Programa      : actualizar_ultickpt.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 03/04/2018
// Descripcion   : Este programa graba en la tabla "guia" los datos relativos al ultimo checkpoint
//--------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

$objUsuario = Usuario::LoadByLogiUsua('liberty');
$_SESSION['User'] = serialize($objUsuario);
error_reporting(E_ALL);
//-------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//-------------------------------------------------------------------
$mixManeArch = fopen('/tmp/actualizar_ultickpt.txt','w');
fputs($mixManeArch,"\nUltimo Checkpoint");
fputs($mixManeArch,"\n=================\n\n");
//-----------------------------------------------------------
// Se eliminan los registros de la tabla de actualizacion
//-----------------------------------------------------------
$objDatabase = Guia::GetDatabase();
$strCadeSqlx  = "delete ";
$strCadeSqlx .= "  from guia_actualizar ";
$strCadeSqlx .= " where 1";
$objDatabase->NonQuery($strCadeSqlx);
//-------------------------------------------------------------------------------------------------
// Se llena la tabla de actualizacion con guias que han tenido movimientos en los ultimos 60 dias
//-------------------------------------------------------------------------------------------------
$strCadeSqlx  = "insert ";
$strCadeSqlx .= "  into guia_actualizar ";
$strCadeSqlx .= "select distinct nume_guia ";
$strCadeSqlx .= "  from guia_ckpt ";
$strCadeSqlx .= " where fech_ckpt >= date_sub(curdate(), interval 60 day) ";
$objDatabase->NonQuery($strCadeSqlx);
//----------------------------------------------------------------------------------
// Se seleccionan las guias creadas de los ultimos 60 dias, cuyo ultimo checkpoint
// declarado en la tabla guia difiera del ultimo checkpoint en guia_ckpt
//----------------------------------------------------------------------------------
$strCadeSqlx  = "select NumeGuia, CodiCkpt, UltiCkpt";
$strCadeSqlx .= "  from (select nume_guia NumeGuia,";
$strCadeSqlx .= "               codi_ckpt CodiCkpt,";
$strCadeSqlx .= "               (select guia_ckpt.codi_ckpt";
$strCadeSqlx .= "                  from guia_ckpt";
$strCadeSqlx .= "                 where guia_ckpt.nume_guia = guia.nume_guia";
$strCadeSqlx .= "                 order by fech_ckpt desc,";
$strCadeSqlx .= "                          hora_ckpt desc";
$strCadeSqlx .= "                 limit 1) UltiCkpt";
$strCadeSqlx .= "          from guia";
$strCadeSqlx .= "         where nume_guia in (select nume_guia";
$strCadeSqlx .= "                               from guia_actualizar)";
$strCadeSqlx .= "       ) x";
$strCadeSqlx .= " where CodiCkpt != UltiCkpt";
$objResuQuer = $objDatabase->Query($strCadeSqlx);
$intContFech = 0;
while ($mixRegistro = $objResuQuer->FetchArray()) {
	$objGuia = Guia::Load($mixRegistro['NumeGuia']);
	$objUltiCkpt = $objGuia->UltiCkptObj();
	if ($objUltiCkpt) {
		$objGuia->EstaCkpt = $objUltiCkpt->CodiEsta;
		$objGuia->CodiCkpt = $objUltiCkpt->CodiCkpt;
		$objGuia->FechCkpt = $objUltiCkpt->FechCkpt;
		$objGuia->HoraCkpt = $objUltiCkpt->HoraCkpt;
		$objGuia->ObseCkpt = $objUltiCkpt->TextObse;
		$objGuia->Save();
		$strLineText   = sprintf("La Guia: %s, de fecha %s, tenia %s y se actualizo con: %s\n",
		$objGuia->NumeGuia,$objGuia->FechGuia->__toString("DD/MM/YYYY"),$mixRegistro['CodiCkpt'],$objGuia->CodiCkpt);
		fputs($mixManeArch,$strLineText);
		$intContFech++;
	}
}
if ($intContFech > 0) {
	$strLineText   = sprintf("\n\nCantidad de registros actualizados: (%s)\n\n",$intContFech);
	fputs($mixManeArch,$strLineText);
    fclose($mixManeArch);
    //--------------------------------
    // Envio el reporte por e-mail
    //--------------------------------
	$mail = new PHPMailer();
	try {
		$mail->isHTML(true);
		$mail->setFrom('SisCO@libertyexpress.com', 'Control de Fallas');
		$mail->addAddress('soportelufeman@gmail.com');
		$mail->Subject = "Guias con actualizacion de Ultimo Checkpoint";
		$mail->Body = 'Estimado Usuario, sírvase revisar el documento anexo...';
		$mail->addAttachment($mixManeArch);
		$mail->send();
	} catch (Exception $e) {
		echo "Message was not sent.\n";
		echo "Mailer error: " . $mail->ErrorInfo."\n";
	}
}
?>
