<?php
//--------------------------------------------------------------------------------------
// Programa      : borrar_guia_no_recibidas_72Hrs.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 20/02/2018
// Descripcion   : Este programa realiza las siguientes tareas:
//                 1.- Inserta un checkpoint "RP" (Recolecta Pendiente) a todas las 
//                 guias/recolectas en status "NR" (No Recibidas en la Empresa)
//                 2.- Elimina de la base de datos, las guias/recolectas con mas de
//                 tres (3) dias en estatus "RP" (SoftDelete)
//                 3.- Elimina de la base de datos, las guías/recolectas con mas de
//                 3 días en status "VR" (Visitado sin Recolecta) (SoftDelete)
//--------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
//------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//------------------------------------------------------------------
$mixManeArch = fopen('borrar_guias_no_recibidas_72Hrs.txt','w');
fputs($mixManeArch,"\nBorrar Guias No Recibidas_72Hrs\n");
fputs($mixManeArch,"=============================\n");
fputs($mixManeArch,date("Y-m-d h:i")."\n\n");
$objUsuario = Usuario::LoadByLogiUsua('liberty');
$_SESSION['User'] = serialize($objUsuario);
//----------------------------------------------------------------
// Las guias NO RECIBIDAS, toman el status "RECOLECTA PENDIENTE"
//----------------------------------------------------------------
$dttLimiDefe   = SumaRestaDiasAFecha(FechaDeHoy(),1,'-');
$objCondWher   = QQ::Clause();
$objCondWher[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$dttLimiDefe);
$objCondWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,'NR');
$objCondWher[] = QQ::Equal(QQN::Guia()->SistemaId,'con');
$arrGuiaNore   = Guia::QueryArray(QQ::AndCondition($objCondWher));
$intCantGuia   = count($arrGuiaNore);
$strMensUsua   = "Se encontraron $intCantGuia guia(s) No Recibidas\n";
$strMensUsua  .= "--------------------------------------\n";
fputs($mixManeArch,$strMensUsua);
$objCheckpoint = SdeCheckpoint::Load('RP');
$intCantReco   = 0;
if ($objCheckpoint) {
	foreach ($arrGuiaNore as $objGuia) {
		$arrDatoCkpt = array();
		$arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
		$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
		$arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt;
		$arrDatoCkpt['CodiSucu'] = $objGuia->EstaOrig;
		$arrDatoCkpt['CodiRuta'] = '';
		$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
		$intCantReco ++;
	}
	$strMensUsua  = "Guias No Recibidas convertidas a Recolectas Pendientes: $intCantReco\n";
	$strMensUsua .= "------------------------------------------------------\n\n";
	fputs($mixManeArch,$strMensUsua);
} else {
	$strMensUsua  = "No existe el checkpoint 'RP' (Recolecta Pendiente)\n";
	$strMensUsua .= "--------------------------------------------------\n\n";
	fputs($mixManeArch,$strMensUsua);
}
//-------------------------------------------------------------------
// Las guías que conservan el status "RECOLECTA PENDIENTE" por mas de
// 3 días, seran eliminadas de la base de datos
//-------------------------------------------------------------------
$objCondWher   = QQ::Clause();
$objCondWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,'RP');
$objCondWher[] = QQ::Equal(QQN::Guia()->SistemaId,'con');
$objCondWher[] = QQ::Equal(QQN::Guia()->Anulada,0);
$arrRecoPend   = Guia::QueryArray(QQ::AndCondition($objCondWher));
//--------------------------------------
// Se procesan las Guias una por una
//--------------------------------------
$intRecoPend = 0;
foreach ($arrRecoPend as $objGuia) {
	$dttFechGuia = $objGuia->FechGuia->__toString("YYYY-MM-DD");
	//--------------------------------------------------------------
	// Se define por defecto la cantidad límite de días de vigencia
	//--------------------------------------------------------------
	$intDiasLimi = 10;
	//--------------------------------------------------------------------------------------------
	// Se obtiene la cantidad de días transcurridos entre la fecha actual, y la fecha de la guía,
	// excluyendo los Sabados, Domingos y Feriados.
	//--------------------------------------------------------------------------------------------
	$intDiasHabi = diasHabilesTranscurridos(FechaDeHoy(),$dttFechGuia);
	//------------------------------------------------------------------------------
	// Algunos Clientes tienen excepciones con respecto a la caducidad de las guías
	//------------------------------------------------------------------------------
	if (strlen($objGuia->CodiClieObject->CaducidadDeGuias) > 0 && $objGuia->CodiClieObject->CaducidadDeGuias > 0) {
		$intDiasLimi = $objGuia->CodiClieObject->CaducidadDeGuias;
	}
	if ($intDiasHabi > $intDiasLimi) {
		$strMensUsua = "Guia Nro: ".$objGuia->NumeGuia." Emitida el: ".$objGuia->FechGuia->__toString("DD/MM/YYYY")." del Cliente: ".$objGuia->CodiClieObject->NombClie."\n";
		fputs($mixManeArch,$strMensUsua);
		$objGuia->Borrar();
		$intRecoPend ++;
	}
}
if ($intRecoPend > 0) {
	$strMensUsua  = "\nCantidad de Recolectas Pendientes borradas: $intRecoPend\n";
	$strMensUsua .= "-------------------------------------------\n\n";
	fputs($mixManeArch,$strMensUsua);
} else {
	$strMensUsua  = "\nNo se encontraron Recolectas Pendientes para Borrar\n";
	$strMensUsua .= "--------------------------------------------------\n\n";
	fputs($mixManeArch,$strMensUsua);
}
//-------------------------------------------------------------------
// Las guías que conservan el status "VISITA SIN RECOLECTA" por mas 
// 6 días, serán eliminadas de la base de datos
//-------------------------------------------------------------------
$objCondWher   = QQ::Clause();
$objCondWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,'VR');
$objCondWher[] = QQ::Equal(QQN::Guia()->SistemaId,'con');
$arrVisiReco   = Guia::QueryArray(QQ::AndCondition($objCondWher));
//--------------------------------------
// Se procesan las Guias una por una
//--------------------------------------
$intVisiReco = 0;
foreach ($arrVisiReco as $objGuia) {
	$dttFechGuia = $objGuia->FechGuia->__toString("YYYY-MM-DD");
	//--------------------------------------------------------------------------------------------
	// Se obtiene la cantidad de días transcurridos entre la fecha actual, y la fecha de la guía,
	// excluyendo los Sabados, Domingos y Feriados.
	//--------------------------------------------------------------------------------------------
	$intDiasHabi = diasHabilesTranscurridos(FechaDeHoy(),$dttFechGuia);
	if ($intDiasHabi > 6) {
		$strMensUsua = "Guia Nro: ".$objGuia->NumeGuia." Emitida el: ".$objGuia->FechGuia->__toString("DD/MM/YYYY")." del Cliente: ".$objGuia->CodiClieObject->NombClie."\n";
		fputs($mixManeArch,$strMensUsua);
		BorrarGuia($objGuia->NumeGuia);
		$intVisiReco ++;
	}
}
if ($intVisiReco > 0) {
	$strMensUsua  = "\nVisitados sin Recolecta borradas: $intVisiReco\n";
	$strMensUsua .= "--------------------------------\n\n";
	fputs($mixManeArch,$strMensUsua);
} else {
	$strMensUsua  = "\nNo se encontraron Visitados sin Recolecta para Borrar\n";
	$strMensUsua .= "----------------------------------------------------\n\n";
	fputs($mixManeArch,$strMensUsua);
}
$intCantProc = $intRecoPend + $intVisiReco;
$strMensUsua = "\nTotal Guías borradas: $intCantProc\n";
fputs($mixManeArch,$strMensUsua);
if ($intCantProc > 0) {
	$strEnviMail = BuscarParametro('EnviMail','MailSino',"Txt1","S");
	//--------------------------------
	// Envio el reporte por e-mail
	//--------------------------------
	$to = array('aalvarado@libertyexpress.com','incidencias@libertyexpress.com','danydurand@gmail.com');
	$attach = 'borrar_guias_no_recibidas_72Hrs.txt';
	$strBodyMail = redactarCorreoCliente($intCantProc);
	$mimemail = new MIMEMAIL('HTML');
	$mimemail->senderName = 'Liberty Express';
	$mimemail->senderMail = 'notificaciones@app-libertyexpress.com';
	$mimemail->subject = 'Control de Guias NR/RP/VR';
	$mimemail->body = $strBodyMail;
	$mimemail->attachments[] = $attach;
	$mimemail->create();
	if ($strEnviMail == 'S') {
		$mimemail->send($to);
	} else {
		$strLineText = sprintf("\nEl Correo no esta habilitado, no se envio el mensaje\n");
		fputs($mixManeArch,$strLineText);
	}
}
fclose($mixManeArch);
/**
 * Función para armar cuerpo del correo electrónico a mandar a los administradores del Sistema,
 * con la finalidad de notificar la eliminación de Recolectas Pendientes por más de 72 Hrs.
 *
 * @param $intCantProc
 * @return string
 */
function redactarCorreoCliente($intCantProc) {
	$strDireSist = 'http://200.74.218.243/liberty/';
	$strMensGuia = '
	<!DOCTYPE html>
        <html lang="es">
            <head>
                <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                <meta charset="utf-8">
                <title>LibertyExpress</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user‐scalable=no">
            </head>
            <body style="font-family:Trebuchet MS">
				<div style="padding-top:2em;text-align:center;">
					<img src="'.$strDireSist.'generador/assets/images/LogoEmpresa.jpg" alt="LibertyExpress Logo" />
				</div>
				<h2 style="color:#B0110D; text-align:center;">Estimado(s) Administrador(es) y/u Operador(es) del Sistema</h2>
				<p>Se le(s) informa que se ha(n) eliminado '.$intCantProc.' Guía(s) No Recibida(s) con más de 72 Hrs.</p>
				<p>Por favor, revise(n) el archivo plano adjunto para más información.</p>
				<br><hr>
				<span style="font-style: italic; color:#555; margin-top: 2em;">
					: : : Lufeman Software, C.A. : : :
				</span><br>
                <span style="font-style: italic; color:#555;">
                     Por favor, no responda a este mensaje, fue enviado desde una dirección
                     de correo electrónico no monitorizada. 
                     Para información general o para solicitar ayuda, por favor contáctenos enviando un correo
                     a soportelufeman@gmail.com.
                </span><br><br>
                <span style="font-style: italic; color:#555;">Copyright©
                    2017 Lufeman Software, C.A.©, Todos los Derechos Reservados.
                </span>
            </body>
        </html>
	';
	return utf8_decode($strMensGuia);
}
?>
