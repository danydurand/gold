<?php
//----------------------------------------------------------------------------------------
// Programa      : repo_cambios_de_peso.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 03/04/2018
// Descripcion   : Este programa genera y envia por correo un archivo plano que refleja
//                 los cambios de peso que se han hecho, sobre guías que ya tenían 
//                 Traslado.
//----------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

error_reporting(E_ALL);
$dttFechDhoy = date('Y-m-d');
$strNombArch = 'repo_cambios_de_peso.txt';
$mixManeArch = fopen($strNombArch,'w');
fputs($mixManeArch,"Cambios de Peso de los Ultimos 7 días\n");
fputs($mixManeArch,"=====================================\n");
fputs($mixManeArch,"Fecha: ".date("Y-m-d")."  Hora: ".date("H:i")."\n\n");
//-------------------------
// Seleccion de Registros
//-------------------------
$strCadeSqlx = "select * ";
$strCadeSqlx .= "  from proceso";
$strCadeSqlx .= " where fecha >= date_sub(now(), INTERVAL 7 DAY)";
$strCadeSqlx .= "   and fecha <= now()";
$strCadeSqlx .= "   and accion like 'Cambio el Peso%'";
$strCadeSqlx .= " order by fecha desc, hora desc";
$objDatabase = Proceso::GetDatabase();
$objDbResult = $objDatabase->Query($strCadeSqlx);
fputs($mixManeArch,"Usuario\t\tFecha\t\tCambio\t\tGuia\t\tCliente\n");
fputs($mixManeArch,str_repeat('-',90)."\n");
$intCantRegi = 0;
while ($regDatoSele = $objDbResult->FetchArray()) {
   $arrDatoCamb = explode('|',$regDatoSele['accion']);
   $strLogiUsua = $regDatoSele['usuario'];
   $strFechCamb = $regDatoSele['fecha'];
   $strCambPeso = $arrDatoCamb[1];
   $strNumeGuia = $arrDatoCamb[2];
   $strNombClie = $arrDatoCamb[3];
   $strLineText = sprintf("%s\t\t%s\t%s\t%s\t%s",$strLogiUsua,$strFechCamb,$strCambPeso,$strNumeGuia,$strNombClie);
   fputs($mixManeArch,$strLineText."\n");
   $intCantRegi ++;
}
fclose($mixManeArch);
if ($intCantRegi) {
    $strUsuaNoti = BuscarParametro('UsuaNoti','CambPeso','Txt1','danydurand@gmail.com');
    $arrDireMail = explode(',',$strUsuaNoti);

    $mail = new PHPMailer();
    $mail->setFrom('SisCO@libertyexpress.com', 'Control de Operaciones');
    //$mail->addAddress('soporte@lufemansoftware.com');
    $mail->Subject  = "Guias con cambio de peso despues del TR";
    $mail->Body     = 'Estimado Usuario, sírvase revisar el documento anexo...';
    $mail->addAttachment($strNombArch);
    if(!$mail->send()) {
        echo "Message was not sent.\n";
        echo "Mailer error: " . $mail->ErrorInfo."\n";
    }
}
?>
