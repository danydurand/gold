<?php
//--------------------------------------------------------------------------------------
// Programa      : purge_de_guias_sodexo.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 03/04/2018
// Descripcion   : Este programa elimina de la base de datos las Guias Sodexo cuyo 
//                 ciclo este cerrado desde hace mas de 30 dias.
//--------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

error_reporting(E_ALL);
//------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//------------------------------------------------------------------
$strNombArch = 'purge_de_guias_sodexo.txt';
$mixManeArch = fopen($strNombArch,'w');
fputs($mixManeArch,"Purge de Guias Sodexo\n");
fputs($mixManeArch,"=====================\n");
fputs($mixManeArch,date("Y-m-d h:i")."\n\n");
$objUsuario = Usuario::LoadByLogiUsua('liberty');
$_SESSION['User'] = serialize($objUsuario);
//-------------------------------------------------------------------------------------------------------------
// Bajo la clave "GuiaSode-CaduInfo" se encuentra establecida la cada de dias de caducidad de la informacion.
//-------------------------------------------------------------------------------------------------------------
$intCantDias = BuscarParametro('GuiaSode','CaduInfo','Val1',30);
$dteFechDhoy = FechaDeHoy();
$dteFechCadu = SumaRestaDiasAFecha($dteFechDhoy,$intCantDias,'-');
//---------------------------------------
// Se cuentan los registros existentes
//---------------------------------------
$strCadeSqlx  = "select count(*) as cant_exis";
$strCadeSqlx .= "  from sodexo_input";
$objDatabase  = SodexoInput::GetDatabase();
$objResuQuer  = $objDatabase->Query($strCadeSqlx);
$mixRegistro  = $objResuQuer->FetchArray();
$intCantExis  = $mixRegistro['cant_exis'];
//----------------------------------
// Se borran los registros viejos
//----------------------------------
$strCadeSqlx  = "delete";
$strCadeSqlx .= "  from sodexo_input ";
$strCadeSqlx .= " where cierre_ciclo = ".SinoType::SI;
$strCadeSqlx .= "   and fech_ckpt <= '".$dteFechCadu."'";
$objDatabase = SodexoInput::GetDatabase();
$objResuQuer = $objDatabase->NonQuery($strCadeSqlx);
//----------------------------------------
// Se cuentan los registros que quedaron
//----------------------------------------
$strCadeSqlx  = "select count(*) as cant_qued";
$strCadeSqlx .= "  from sodexo_input";
$objDatabase  = SodexoInput::GetDatabase();
$objResuQuer  = $objDatabase->Query($strCadeSqlx);
$mixRegistro  = $objResuQuer->FetchArray();
$intCantQued  = $mixRegistro['cant_qued'];
//--------------------------------------
// Se calcula y notifica la diferencia 
//--------------------------------------
$intDifeRegi = $intCantExis - $intCantQued;
if ($intDifeRegi > 0) {
  $strMensUsua = "Cantidad de Guia Sodexo Borradas del día $dteFechDhoy es de: $intDifeRegi\n";
  fputs($mixManeArch,$strMensUsua);
}
fclose($mixManeArch);
//--------------------------------
// Envio el reporte por e-mail
//--------------------------------
if ($intDifeRegi > 0) {
    $mail = new PHPMailer();
    $mail->setFrom('SisCO@libertyexpress.com', 'Control de Operaciones');
    $mail->addAddress('soportelufeman@gmail.com');
    $mail->Subject  = "Purge de Guias Sodexo";
    $mail->Body     = 'Estimado Usuario, sírvase revisar el documento anexo...';
    $mail->addAttachment($strNombArch);
    if(!$mail->send()) {
        echo "Message was not sent.\n";
        echo "Mailer error: " . $mail->ErrorInfo."\n";
    }
}
?>
