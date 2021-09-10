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
        } catch (Exception $e) {
            t('Error actualizando proceso original: '.$e->getMessage());
        }
    }
}

