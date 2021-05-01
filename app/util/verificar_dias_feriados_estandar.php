<?php
//----------------------------------------------------------------------------------------------------
// Programa      : verificar_dias_feriados_estandar.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 03/04/2017
// Descripcion   : Este programa corre vía cron todos los días del mes de enero de cada año, contando
//                 la cantidad de Días Feriados del año en curso.
//----------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
//------------------------------------------------------------------------------------------
// Se obtiene la ficha del Usuario Genérico del Sistema para poder registar la transacción.
//------------------------------------------------------------------------------------------
$objUsuaCrea = Usuario::LoadByLogiUsua('liberty');
$_SESSION['User'] = serialize($objUsuaCrea);
//-----------------------------------------------------------------------
// Se determina la cantidad de Feriados Estándar definidos en Parámetros
//-----------------------------------------------------------------------
$intFeriEsta = Parametro::CountByIndiPara('FeriEsta');
//-----------------------------
// Se obtiene el año en curso.
//-----------------------------
$calFechDhoy = new QDateTime(QDateTime::Now);
$strAñoxCurs = $calFechDhoy->format('Y');
//---------------------------------------------------------------------------------
// Se arma un Query para determinar la cantidad de Días Feriados del año en curso.
//---------------------------------------------------------------------------------
$strCadeSqlx = "select * from feriado where year(fecha) = '".$strAñoxCurs."'";
$objDataBase = Feriado::GetDatabase();
$objResuSetx = $objDataBase->Query($strCadeSqlx);
$intDiasFeri = $objResuSetx->CountRows();
//---------------------------------------------------------------------------------------------------------------------
// Si la cantidad de Días Feriados del año en curso, es igual a la cantidad de Feriados Estándar definidos en la tabla
// "parametro", significa que el Administrador o Administradores no ha(n) cargado los días de Carnaval, Semana Santa,
// y ningún otro. Por eso, se emite un correo al Administrador o Administradores para advertir dicha situación.
//---------------------------------------------------------------------------------------------------------------------
if ($intFeriEsta == $intDiasFeri) {
    //------------------------------------------
    // Se arma el cuerpo del mensaje de correo.
    //------------------------------------------
    $strTituRepo = utf8_decode("Días Feriados Pendientes por Cargar");
    $strBodyMail = redactarCorreoAdministrador();
    $objAdmiYoko = Parametro::Load('UsuaAdmi','SistYoko');
    $arrDireMail = explode(',',$objAdmiYoko->ParaTxt1);
    //---------------------------------------------------------------------------------------
    // Se procede a crear y enviar el correo al Administrador o Administradores del Sistema.
    //---------------------------------------------------------------------------------------
    $mimemail = new MIMEMAIL('HTML');
    $mimemail->senderName = 'Sistema Yokohama';
    $mimemail->senderMail = 'localhost@goldsist.com';
    $mimemail->subject = $strTituRepo;
    $mimemail->body = $strBodyMail;
    $mimemail->create();
    $mimemail->send($arrDireMail);
}

/**
 * Función para armar cuerpo del correo electrónico a mandar al Administrador del Sistema,
 * con el fin de notificarle que están pendientes Días Feriados por cargar.
 *
 * @return string : Cuerpo armado del mensaje de correo a enviar.
 */
function redactarCorreoAdministrador() {
    $strDireSist = 'http://200.74.218.246/newliberty/';
    $strMensAdmi = '
    <!DOCTYPE html>
        <html>
            <head>
                <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                <meta charset="utf-8">
                <title>GoldCoast</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user‐scalable=no">
            </head>
            <body style="font-family:Trebuchet MS">
                <div style="padding-top:2em;text-align:center;">
					<img src="'.$strDireSist.'assets/images/LogoEmpresa.jpg" alt="GoldCoast Logo" />
				</div>
				<h2 style="color:#B0110D; text-align:center;">Estimado(s) Administrador(es) y/u Operador(es) del Sistema</h2>
				<p>Se le(s) informa que tiene(n) pendiente por cargar en el Sistema, fechas no estándares del año en curso
				 (Carnavales, Semana Santa, etc.), por lo que se les aconseja ir cargando las mismas con el fin de que el
				 Sistema pueda incluirlas dentro de los registros de días hábiles, garantizando que las operaciones que
				 lleva a cabo automáticamente puedan realizarse de manera más óptima y eficaz.</p>
				<br><hr>
				<span style="font-style: italic; color:#555; margin-top: 2em;">
					: : : El Equipo de GoldCoast : : :
				</span><br><br>
                <span style="font-style: italic; color:#555;">
                     Por favor, no responda a este mensaje, fue enviado desde una dirección
                     de correo electrónico no monitorizada. Este mensaje es un servicio de
                     correo electrónico relacionado con su cuenta en GoldCoast.
                     Para información general o para solicitar ayuda con su
                     cuenta de GoldCoast, por favor contacte a nuestro departamento de
                     Servicio al Cliente.
                </span><br><br>
                <span style="font-style: italic; color:#555;">Copyright©
                    2017 GoldCoast©, Todos los Derechos Reservados.
                </span>
            </body>
        </html>
    ';
    return utf8_decode($strMensAdmi);
}
