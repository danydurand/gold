<?php
//----------------------------------------------------------------------------------------------------
// Programa      : crear_dias_feriados_estandar.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 02/04/2017
// Descripcion   : Este programa corre vía cron el primero (01) de enero de cada año, y crea los días
//                 feriados estándar en la base de datos.
//----------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
//------------------------------------------------------------------------------------------
// Se obtiene la ficha del Usuario Genérico del Sistema para poder registar la transacción.
//------------------------------------------------------------------------------------------
$objUsuaCrea = Usuario::LoadByLogiUsua('liberty');
$_SESSION['User'] = serialize($objUsuaCrea);
//-------------------------------------------------
// Se obtiene el año en curso y se castea a String
//-------------------------------------------------
$dttYearNowx = new QDateTime(QDateTime::Now);
$strYearNowx = $dttYearNowx->format('Y');
//----------------------------------------------------------------------------------------------
// Se optienen los parámetros que representan los días feriados estándar a crear, y se cuentan.
//----------------------------------------------------------------------------------------------
$arrFeriEsta = Parametro::LoadArrayByIndiPara('FeriEsta');
$intFeriEsta = count($arrFeriEsta);
if ($intFeriEsta > 0) {
    //----------------------------------------------------------------------------------------------
    // Si existe al menos un parámetro de Días Feriados Estándar, se recorre el vector contenedor y
    // se crean uno por uno.
    //----------------------------------------------------------------------------------------------
    foreach ($arrFeriEsta as $objFeriEsta) {
        //---------------------------------------------------------------------------------------
        // Se concatena el año en curso a la fecha registrada en el parámetro, representada como
        // el código del mismo.
        //---------------------------------------------------------------------------------------
        $strFechOpte = $objFeriEsta->CodiPara.$strYearNowx;
        //--------------------------------------------------------------------------------------
        // Se arma nuevamente la cadena de la fecha, separando día, mes y año con un guión (-).
        // Luego, con la nueva cadena se crea un nuevo QDateTime de la fecha para poder
        // registrarse en la base de datos.
        //--------------------------------------------------------------------------------------
        $strFechOpte = substr($strFechOpte,0,2).'-'.substr($strFechOpte,2,2).'-'.substr($strFechOpte,4,8);
        $dttFechOpte = new QDateTime($strFechOpte);
        //-----------------------------------------------------------------------------------------
        // Ahora se crea un nuevo registro de la tabla "feriado" para la fecha estándar a guardar.
        // Antes, se valida la existencia previa de la fecha a registrar.
        //-----------------------------------------------------------------------------------------
        $objFeriado = Feriado::LoadByFecha($dttFechOpte);
        if (!$objFeriado) {
            $objFeriado = new Feriado();
            $objFeriado->Fecha = $dttFechOpte;
            $objFeriado->Save();
            //-----------------------------
            // Se registra la transacción.
            //-----------------------------
            $arrLogxCamb['strNombTabl'] = 'Feriado';
            $arrLogxCamb['intRefeRegi'] = $objFeriado->Id;
            $arrLogxCamb['strNombRegi'] = $objFeriado->Fecha.' - Estandar';
            $arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __UTIL__.'/crear_dias_feriados_estandar.php';
            LogDeCambios($arrLogxCamb);
        }
    }
}