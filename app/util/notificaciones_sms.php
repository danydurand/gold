<?php
//-------------------------------------------------------------------------------------
// Programa      : notificaciones_sms.php
// Realizado por : Iran Anzola
// Fecha Elab.   : 30/11/2015
// Descripcion   : Este programa corre via cron y envia notificaciones de sms a los 
//                 Clientes del Sistema Internacional de Liberty Express.
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

error_reporting(E_ALL);
$blnTodoOkey = true;
$_SERVER['TablAudi'] = serialize(array());
//-------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//-------------------------------------------------------------------
$mixManeArch = fopen('notificaciones_sms.txt', 'a');
fputs($mixManeArch, "\n\n");
fputs($mixManeArch, "Notificaciones SMS\n");
fputs($mixManeArch, "==================\n");
fputs($mixManeArch, "Fecha: " . date("Y-m-d") . "  Hora: " . date("H:i") . "\n\n");

$objUsuaNoti = Usuario::LoadByLogiUsua('liberty');
if (!$objUsuaNoti) {
   echo "No se ha definido el Usuario de Notificacion: liberty";
   $blnTodoOkey = false;
}
$_SESSION['User'] = serialize($objUsuaNoti);

if ($blnTodoOkey) {
   //-------------------------------------------------------
   // Se seleccionan las Notificaciones aun no realizadas
   //-------------------------------------------------------
   $strCadeSqlx  = "select n.*, ";
   $strCadeSqlx .= "       g.esta_orig, ";
   $strCadeSqlx .= "       g.esta_dest, ";
   $strCadeSqlx .= "       g.dire_dest, ";
   $strCadeSqlx .= "       g.nomb_remi, ";
   $strCadeSqlx .= "       g.tele_remi, ";
   $strCadeSqlx .= "       g.nomb_dest, ";
   $strCadeSqlx .= "       g.tele_dest, ";
   $strCadeSqlx .= "       g.receptoria_destino ";
   $strCadeSqlx .= "  from notificacion n inner join guia g ";
   $strCadeSqlx .= "    on n.guia_id = g.nume_guia ";
   $strCadeSqlx .= " where n.notificado_sms = 0 ";
   $strCadeSqlx .= "   and n.tipo_sms is not null ";
   $strCadeSqlx .= "   and g.codi_ckpt not in ('OK','ER','RM','PU','TR')";

   $objDatabase = Notificacion::GetDatabase();
   $objResulSet = $objDatabase->Query($strCadeSqlx);
   while ($mixRegistro = $objResulSet->FetchArray()) {
      //----------------------
      // Vector de Parametros
      //----------------------
      $arrParaNoti['NombRemi'] = $mixRegistro['nomb_remi'];
      $arrParaNoti['NombDest'] = $mixRegistro['nomb_dest'];
      $arrParaNoti['NumeGuia'] = $mixRegistro['guia_id'];
      $arrParaNoti['EstaDest'] = $mixRegistro['receptoria_destino'];
      $arrParaNoti['TlfnClie'] = DejarSoloLosNumeros($mixRegistro['tele_dest']);
      $arrParaNoti['TipoSmsx'] = $mixRegistro['tipo_sms'];

      //Armo el mensaje SMS a enviar
      $arrParaNoti['TextSmsx'] = RedactarSMS($arrParaNoti);

      // Invocar funcion de SMS
      EnviarSMS($arrParaNoti);
      sleep(1);

      //----------------------------------------------------------------------------------------
      // Se modifica el registro de la notificacion, especificando la fecha y hora del proceso
      //----------------------------------------------------------------------------------------
      $objNotificacion = Notificacion::Load($mixRegistro['id']);
      $objNotificacion->NotificadoSms = SinoType::SI;
      $objNotificacion->Fecha = new QDateTime(QDateTime::Now);
      $objNotificacion->Hora = date("H:i");
      $objNotificacion->Save();
      $strTextMens = "Guia: " . $objNotificacion->GuiaId . "  Tipo SMS: " . $arrParaNoti['TipoSmsx'] . "  Telefono: " . $arrParaNoti['TlfnClie'];
      fputs($mixManeArch, $strTextMens . "\n");
      //--------------------------------------------------------------------
      // Se deja constancia de la Notificacion, en el Registro de Trabajo
      //--------------------------------------------------------------------
      $arrDatoRegi['NumeGuia'] = $objNotificacion->GuiaId;
      $arrDatoRegi['TextMens'] = "NOTIFICACION SMS: " . $objNotificacion->Checkpoint->DescCkpt;
      $arrDatoRegi['CodiUsua'] = $objUsuaNoti->CodiUsua;
      $arrDatoRegi['CodiEsta'] = $objUsuaNoti->CodiEsta;
      $arrDatoRegi['CodiCkpt'] = "NC";  // Notificacion al Cliente
      CrearRegistroDeTrabajo($arrDatoRegi);
   }
}

fputs($mixManeArch, "\n======================================================================\n");
fclose($mixManeArch);

function RedactarSMS($arrParaNoti) {
   // $strEstaOrig = $arrParaNoti['estaOrig'];
   $strNombRemi = $arrParaNoti['NombRemi'];
   $strNombDest = $arrParaNoti['NombDest'];
   $strNumeGuia = $arrParaNoti['NumeGuia'];
   $strEstaDest = $arrParaNoti['EstaDest'];
   $strTipoSmsx = $arrParaNoti['TipoSmsx'];

   $blnServDomi = false;

   if ($strTipoSmsx == 'CDRC') {
      $strTextSmsx = BuscarParametro("TextSmsx","ConfDest","Txt1",0);
   } elseif ($strTipoSmsx == 'CDDO') { //Servicio a Domicilio
      $strTextSmsx = BuscarParametro("TextSmsx","ConfDomi","Txt1",0);
      $blnServDomi = true;
   } elseif ($strTipoSmsx == 'CD5D') {
      $strTextSmsx = BuscarParametro("TextSmsx","Dest5dia","Txt1",0);
   } elseif ($strTipoSmsx == 'CD10') {
      $strTextSmsx = BuscarParametro("TextSmsx","Dest10di","Txt1",0);
   } elseif ($strTipoSmsx == 'CORC') {
      $strTextSmsx = BuscarParametro("TextSmsx","ConfOrig","Txt1",0);
   } elseif ($strTipoSmsx == 'CO5D') {
      $strTextSmsx = BuscarParametro("TextSmsx","Orig5dia","Txt1",0);
   } elseif ($strTipoSmsx == 'CO10') {
      $strTextSmsx = BuscarParametro("TextSmsx","Orig10di","Txt1",0);
   }

   $strTextSmsx = str_replace("(NOMB_DEST)", $strNombDest, $strTextSmsx);
   $strTextSmsx = str_replace("(NOMB_REMI)", $strNombRemi, $strTextSmsx);
   $strTextSmsx = str_replace("(NUME_GUIA)", $strNumeGuia, $strTextSmsx);
   if (!$blnServDomi) {
      $strTextSmsx = str_replace("(NOMB_RECE)", $strEstaDest, $strTextSmsx);
   }
   // $strTextSmsx = str_replace("(NOMB_SUCU)", $strEstaDest, $strTextSmsx);

   return $strTextSmsx;
}

?>
