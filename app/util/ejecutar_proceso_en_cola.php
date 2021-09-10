<?php
//------------------------------------------------------------------------------------------------
// Programa      : ejecutar_proceso_en_cola.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 09/09/2021
// Descripcion   : Este programa corre vía cron ejecutando los Jobs pendientes en la cola
//------------------------------------------------------------------------------------------------
$_SERVER['SERVER_NAME'] = 'gold.dev.com';
require_once('qcubed.inc.php');

//-----------------------------------------------------------
// Usuario del Sistema para poder registar la transacciones
//-----------------------------------------------------------
$objUsuaCrea = Usuario::LoadByLogiUsua('gold');
$_SESSION['User'] = serialize($objUsuaCrea);
//--------------------------------------------------
// Se selecciona solo un proceso para su ejecución
//--------------------------------------------------
$objAdicClau[] = QQ::OrderBy(QQN::Cola()->Id);
$objAdicClau[] = QQ::LimitInfo(1);
$objClauWher   = QQ::Equal(QQN::Cola()->Ejecutado,false);
$arrJobsPend   = Cola::QueryArray(QQ::AndCondition($objClauWher),$objAdicClau);
foreach ($arrJobsPend as $objJobsPend) {
    t('Ejecutando: '.$objJobsPend->ProcesoError->Nombre);
    $objJobsPend->FechaInicio = new QDateTime(QDateTime::Now);
    $strResuJobs = '';
    $blnHuboErro = false;
    $blnProcEjec = true;
    $strNombMeto = trim($objJobsPend->Clase).'::'.trim($objJobsPend->Metodo);
    switch ($strNombMeto) {
        case 'NotaEntrega::RecibirPiezas':
            $intIdxxProc = (int) $objJobsPend->Parametros;
            list($strResuJobs,$blnHuboErro) = NotaEntrega::RecibirPiezas($intIdxxProc);
            t('El resultado es: '.$strResuJobs);
            t('Hubo Errores: '.$blnHuboErro);
            break;
        default:
            $blnProcEjec = false;
            $strResuJobs = 'Proceso Batch sin Funcion de ejecucion';
    }
    if ($blnProcEjec) {
        //----------------------------------------------
        // El proceso en cola, se marca como Ejecutado
        //----------------------------------------------
        try {
            $objJobsPend->Resultado = $strResuJobs;
            $objJobsPend->FechaFin  = new QDateTime(QDateTime::Now);
            $objJobsPend->Ejecutado = true;
            $objJobsPend->Save();
            t('Proceso marcado como Ejecutado');
        } catch (Exception $e) {
            t('Error marcando el Job como Ejecutado: '.$e->getMessage());
        }
        //------------------------------------------------
        // El proceso original, se marca como finalizado
        //------------------------------------------------
        try {
            $objJobsPend->ProcesoError->Comentario       = $strResuJobs;
            $objJobsPend->ProcesoError->HoraFinal        = new QDateTime(QDateTime::Now);
            $objJobsPend->ProcesoError->NotificarAdmin   = $blnHuboErro ? true : false;
            $objJobsPend->ProcesoError->NotificarUsuario = true;
            $objJobsPend->ProcesoError->Save();
            t('Proceso original actualizado...');

            if ($objJobsPend->ProcesoError->NotificarUsuario) {
                t('Voy a notificar al Usuario');
                EnviarCorreo($objJobsPend->ProcesoError,'usuario');
                t('Regrese de enviar el correo al Usuario');
            }

            if ($objJobsPend->ProcesoError->NotificarAdmin) {
                t('Voy a notificar al Administrador');
                EnviarCorreo($objJobsPend->ProcesoError,'admin');
                t('Regrese de enviar el correo al Administrador');
            }

        } catch (Exception $e) {
            t('Error actualizando proceso original: '.$e->getMessage());
        }
    }
}

function EnviarCorreo(ProcesoError $objJobsEjec, $strTipoUsua='usuario') {
    $strDireFrom = 'GoldCoast - Jobs Queued <noti@goldsist.com>';
    if ($strTipoUsua == 'usuario') {
        $strEnviAxxx = Usuario::LoadByLogiUsua($objJobsEjec->Usuario)->MailUsua;
    } else {
        $strEnviAxxx = 'soporte@lufemansoftware.com';
    }
    t('El correo sera enviado a: '.$strEnviAxxx);
    $strTextSubj = 'Proceso Batch: ' . $objJobsEjec->Nombre;

    $_SESSION['JobsEjec'] = serialize($objJobsEjec);
    ob_start();
    include dirname(__FILE__) . '/rhtml/resultado_job_html.php';
    $strHtmlFact = ob_get_clean();
    $strHtmlBody = $strHtmlFact;
    t('Ya se genero el HTML');

    $objMessage = new QEmailMessage();
    $objMessage->From     = $strDireFrom;
    $objMessage->To       = $strEnviAxxx;
    $objMessage->Subject  = $strTextSubj;
    $objMessage->HtmlBody = $strHtmlBody;

    try {
        t('Voy a enviar el correo');
        $objMessage->SetHeader('x-application', 'SisCO');
        QEmailServer::Send($objMessage);
        t('Correo enviado');
    } catch (Exception $e) {
        $strNombProc = 'Enviando correo al Admin-SisCO: '.$objJobsEjec->Nombre;
        $objProcEjec = CrearProceso($strNombProc,true);
        $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
        $arrParaErro['NumeRefe'] = $this->LogiUsua;
        $arrParaErro['MensErro'] = $e->getMessage();
        $arrParaErro['ComeErro'] = "Fallo el envio del Correo";
        GrabarError($arrParaErro);
    }
    t('Terminando el envio del correo...');
}
