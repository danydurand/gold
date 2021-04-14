<?php
//-------------------------------------------------------------------------------------
// Programa      : chequear_inventario.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 03/04/2018
// Descripcion   : Este programa corre via cron y registra las notificaciones de sms
//                 pendientes por enviar a los clientes de Liberty en Expreso Nacional.
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

error_reporting(E_ALL);
$blnTodoOkey = true;
//-------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//-------------------------------------------------------------------
$mixManeArch = fopen('chequear_inventario.txt', 'a');
fputs($mixManeArch, "\n\n");
fputs($mixManeArch, "Chequeando Inventario Exp Nac\n");
fputs($mixManeArch, "=============================\n");
fputs($mixManeArch, "Fecha: " . date("Y-m-d") . "  Hora: " . date("H:i") . "\n\n");

$objUsuaNoti = Usuario::LoadByLogiUsua('liberty');
$_SESSION['User'] = serialize($objUsuaNoti);
if (!$objUsuaNoti) {
   echo "No se ha definido el Usuario de Notificacion: liberty";
   $blnTodoOkey = false;
}

if ($blnTodoOkey) {
    $dttFechHoyx = date("Y-m-d");
    //------------------------------------------------------------------------------
    // Se seleccionan las guías que hayan sido confirmadas en la sucursal de destino
    //------------------------------------------------------------------------------
    $strCadeSqlx = "select g.nume_guia, g.fech_guia, g.dire_dest, k.codi_ckpt, k.fech_ckpt";
    $strCadeSqlx .= "  from guia g inner join guia_ckpt k";
    $strCadeSqlx .= "    on g.nume_guia = k.nume_guia";
    $strCadeSqlx .= " where k.codi_ckpt in ('AV','DT')";
    $strCadeSqlx .= "   and k.codi_esta = g.esta_dest";
    $strCadeSqlx .= "   and g.sistema_id = 'cnt'";
    $strCadeSqlx .= "   and g.codi_ckpt not in ('OK','ER','RM','PU','TR')";
    $objDatabase = Guia::GetDatabase();
    $objResulSet = $objDatabase->Query($strCadeSqlx);
    while ($mixRegistro = $objResulSet->FetchArray()) {

        $intDiasCkpt = (strtotime($mixRegistro['fech_ckpt'])-strtotime($dttFechHoyx))/86400;
        $intDiasCkpt = abs($intDiasCkpt);

        if ($intDiasCkpt == 0) {
            if (!substr_count($mixRegistro['dire_dest'], 'OFICINA LIBERTY')) {
                /* Se asume que se trata de servicio a domicilio */
                $strTipoNoti = "CDDO";
            } else {
                $strTipoNoti = "CDRC";
            }
            //$strTipoNoti = $strNoti;
        } elseif ($intDiasCkpt >= 5 && $intDiasCkpt < 10) {
            $strTipoNoti = 'CD5D';
        } elseif ($intDiasCkpt >= 10) {
            $strTipoNoti = 'CD10';
        }

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Notificacion()->GuiaId, $mixRegistro['nume_guia']);
        $objClauWher[] = QQ::Equal(QQN::Notificacion()->TipoSms, $strTipoNoti);
        $intContSmsx   = Notificacion::QueryCount(QQ::AndCondition($objClauWher));

        if ($intContSmsx == 0) {
            $objNotificacion = new Notificacion();
            $objNotificacion->Id            = proxNroNotificacion();
            $objNotificacion->GuiaId        = $mixRegistro['nume_guia'];
            $objNotificacion->CheckpointId  = $mixRegistro['codi_ckpt'];
            $objNotificacion->Notificado    = SinoType::NO;
            $objNotificacion->NotificadoSms = SinoType::NO;
            $objNotificacion->TipoSms       = $strTipoNoti;
            $objNotificacion->Save();
        }
        $strTextMens = "Guia: " . $objNotificacion->GuiaId . "  Status: " . $objNotificacion->Checkpoint->DescCkpt . "  Notificado SMS: " . $objNotificacion->NotificadoSms . "  Tipo SMS: " . $objNotificacion->TipoSms;
        fputs($mixManeArch, $strTextMens . "\n");
    }
}
fputs($mixManeArch, "\n======================================================================\n");
fclose($mixManeArch);
?>
