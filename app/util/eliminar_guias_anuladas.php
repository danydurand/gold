<?php
//----------------------------------------------------------------------------------------------------
// Programa      : eliminar_guias_anuladas.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 20/02/2018
// Descripcion   : Este programa corre vía cron, y busca las guías que han sido anuladas con un lapso
//                 de tiempo de anulación superior a 90 días.
//----------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('/tmp/eliminar_guias_anuladas.log', Logger::DEBUG));

$objUsuaDele = Usuario::LoadByLogiUsua('liberty');
$_SESSION['User'] = serialize($objUsuaDele);
$strNombProc = 'Eliminando Guias Anuladas +90 dias';
$objProcEjec = CrearProceso($strNombProc);
$mixErroOrig = error_reporting();
error_reporting(0);
$log->addInfo('Iniciando Proceso');
$log->addInfo('=================');
//---------------------------------------------------------------------------------------------
// Se crea y se abre un archivo plano .txt para registrar la información de la transacción.
// EL mismo, se envía a los contactos administradores, ejecutivos y/o responsables por E-Mail.
//---------------------------------------------------------------------------------------------
$mixManeArch  = fopen('eliminar_guias_anuladas.txt','w');
$strMensUsua  = "\nEliminar Guias Anuladas\n";
$strMensUsua .= "=======================\n";
$strMensUsua .= date("Y-m-d h:i")."\n\n";
fputs($mixManeArch,$strMensUsua);
$intDiasLimi  = BuscarParametro('DiasLimi','SoftDele','Val1',15);
$dteFechLimi  = SumaRestaDiasAFecha(FechaDeHoy(),$intDiasLimi,'-');
$log->addInfo('Fecha Limite para SoftDeletes: '.$dteFechLimi);
//---------------------------------------------------------------------
// Se busca(n) la(s) guía(s) que ha(n) sido eliminadas con SoftDelete
//---------------------------------------------------------------------
$objClauAnul   = QQ::Clause();
$objClauAnul[] = QQ::Equal(QQN::RegistroTrabajo()->CheckpointId,'GE');
$objClauAnul[] = QQ::LessOrEqual(QQN::RegistroTrabajo()->Fecha,$dteFechLimi);
$objClauAnul[] = QQ::Equal(QQN::RegistroTrabajo()->Guia->Anulada,1);
$arrGuiaAnul   = RegistroTrabajo::QueryArray(QQ::AndCondition($objClauAnul));
$intGuiaAnul   = count($arrGuiaAnul);
$log->addInfo('Registros con SoftDelete aptos para ser borrados: '.$intGuiaAnul);
$strTextMens   = '';
if ($intGuiaAnul > 0) {
    $strMensUsua  = "Se encontraron $intGuiaAnul guia(s) con SoftDelete\n";
    fputs($mixManeArch, $strMensUsua);
    $strTextMens .= ProcesarGuia($arrGuiaAnul,$mixManeArch,$objProcEjec,'Soft',$strTextMens,$log);
}
//---------------------------------------------------------------------
// Se busca(n) la(s) guía(s) que ha(n) sido eliminadas con HardDelete
//---------------------------------------------------------------------
$objClauAnul   = QQ::Clause();
$objClauAnul[] = QQ::Equal(QQN::RegistroTrabajo()->CheckpointId,'HD');
$objClauAnul[] = QQ::Equal(QQN::RegistroTrabajo()->Guia->Anulada,1);
$arrGuiaAnul   = RegistroTrabajo::QueryArray(QQ::AndCondition($objClauAnul));
$intGuiaAnul   = count($arrGuiaAnul);
$log->addInfo('Registros con HardDelete aptos para ser borrados: '.$intGuiaAnul);
if ($intGuiaAnul > 0) {
    $strMensUsua  = "Se encontraron $intGuiaAnul guia(s) con HardDelete\n";
    fputs($mixManeArch, $strMensUsua);
    $strTextMens .= ProcesarGuia($arrGuiaAnul,$mixManeArch,$objProcEjec,'Hard',$strTextMens,$log);
}
fclose($mixManeArch);
error_reporting($mixErroOrig);
$log->addInfo('Terminando el proceso...');
//--------------------------------------
// Se almacena el resultado del proceso
//--------------------------------------
$objProcEjec->HoraFinal      = new QDateTime(QDateTime::Now);
$objProcEjec->Comentario     = $strTextMens;
$objProcEjec->NotificarAdmin = true;
$objProcEjec->Save();
$log->addInfo('Conclusion del proceso, grabada');
//----------------------------------------------
// Se deja registro de la transacción realizada
//----------------------------------------------
$arrLogxCamb['strNombTabl'] = 'ProcesoError';
$arrLogxCamb['intRefeRegi'] = $objProcEjec->Id;
$arrLogxCamb['strNombRegi'] = $objProcEjec->Nombre;
$arrLogxCamb['strDescCamb'] = 'Ejecutado';
$arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_list.php/'.$objProcEjec->Id;
LogDeCambios($arrLogxCamb);
$log->addInfo('Log de cambios, registrado');

function ProcesarGuia($arrGuiaAnul,$mixManeArch,$objProcEjec,$strTipoDele,$strTextMens,Logger $log) {
    /**
     * @var $objGuiaAnul RegistroTrabajo
     */
    $intGuiaDele = 0;
    $intCantErro = 0;
    $log->addInfo('Tipo de borrado: '.$strTipoDele);
    foreach ($arrGuiaAnul as $objGuiaAnul) {
        try {
            $strMensUsua  = "Guia Nro: ".$objGuiaAnul->GuiaId;
            $strMensUsua .= " Emitida el: ".$objGuiaAnul->Guia->FechGuia->__toString("DD/MM/YYYY");
            $strMensUsua .= " del Cliente: ".$objGuiaAnul->Guia->CodiClieObject->NombClie;
            $strMensUsua .= " Eliminada el: ".$objGuiaAnul->Fecha->__toString('DD/MM/YYYY')."\n";
            fputs($mixManeArch,$strMensUsua);
            //---------------------
            // Se elimina la Guía.
            //---------------------
            $log->addInfo('Voy a borrar la guia: '.$objGuiaAnul->GuiaId);
            $objGuiaAnul->Guia->Borrar(false);
            // BorrarGuia($objGuiaAnul->GuiaId);
            $intGuiaDele++;
        } catch(Exception $e) {
            //----------------------------
            // Se graba el error ocurrido
            //----------------------------
            $log->addInfo('Hubo un error con la guia: '.$objGuiaAnul->GuiaId);
            $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'Guia: '.$objGuiaAnul->GuiaId;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Fallo la Eliminacion de la Guia Anulada';
            GrabarError($arrParaErro);
            $intCantErro++;
        }
    }
    $strMensUsua = "\nCantidad de Guias Eliminadas $strTipoDele: $intGuiaDele\n";
    fputs($mixManeArch,$strMensUsua);
    $strTextMens .= "El proceso culmino con $intGuiaDele Guia(s) $strTipoDele eliminada(s), ";
    $strTextMens .= "y $intCantErro Error(es)";
    $log->addInfo('Saliendo del Proceso '.$strTipoDele);
    return $strTextMens;
}
?>