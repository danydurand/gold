<?php
//----------------------------------------------------------------------------------
// Programa      : actualizar_guias_sin_tarifa.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 18/04/2018
// Descripcion   : Este programa asigna el codigo de tarifa adecuado a cada guia
//                 que no lo tenga.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');

error_reporting(E_ALL);
$_SESSION['User'] = serialize(Usuario::LoadByLogiUsua('liberty'));
$blnActuGuia = false;
//---------------------------------------
// Criterios de seleccion de registros
//---------------------------------------
$objDatabase  = Guia::GetDatabase();
$strCadeSqlx  = " select nume_guia ";
$strCadeSqlx .= "   from guia ";
$strCadeSqlx .= "  where fech_guia >= '2018-03-01' ";
$strCadeSqlx .= "    and fech_guia <  current_date() ";
$objResuChec  = $objDatabase->Query($strCadeSqlx);

/*
62	JETES ABRIL 2018
61	ABRIL 2018
60	JETES FEBRERO 2018 FP
59	FEBRERO 2018 FP
*/
$intCantRegi = 0;
echo "Procesando guías sin tarifa...<br><br>";
while ($mixRegistro = $objResuChec->FetchArray()) {
    $objGuiaProc = Guia::Load($mixRegistro['nume_guia']);
    if ($objGuiaProc->CodiClieObject->TarifaId == 62) {
        $objGuiaProc->TarifaId = 60;
        echo "La guia: ".$objGuiaProc->NumeGuia." de fecha: ".$objGuiaProc->FechGuia->__toString('YYYY-MM-DD')." no tenía tarifa y le puse: 60<br>";
    } else {
        if ($objGuiaProc->CodiClieObject->TarifaId == 61) {
            $objGuiaProc->TarifaId = 59;
            echo "La guia: ".$objGuiaProc->NumeGuia." de fecha: ".$objGuiaProc->FechGuia->__toString('YYYY-MM-DD')." no tenía tarifa y le puse: 59<br>";
        }
    }
    if ($blnActuGuia) {
        $objGuiaProc->Save();
    }
    $intCantRegi++;
}
echo "<br>Fueron $intCantRegi registros...<br><br>";


//---------------------------------------
// Criterios de seleccion de registros
//---------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,'2018-03-01');
$objClauWher[] = QQ::LessThan(QQN::Guia()->FechGuia,'2018-04-16');
$objClauWher[] = QQ::In(QQN::Guia()->TarifaId,array(61,62));
$arrGuiaProc   = Guia::QueryArray(QQ::AndCondition($objClauWher));
/*
62	JETES ABRIL 2018
61	ABRIL 2018
60	JETES FEBRERO 2018 FP
59	FEBRERO 2018 FP
*/
$intCantRegi = 0;
echo "Procesando guías sin tarifa errada...<br><br>";
foreach ($arrGuiaProc as $objGuiaProc) {
    if ($objGuiaProc->TarifaId == 62) {
        $objGuiaProc->TarifaId = 60;
        echo "La guia: ".$objGuiaProc->NumeGuia." de fecha: ".$objGuiaProc->FechGuia->__toString('YYYY-MM-DD')." tenía 62 y le puse: 60<br>";
    } else {
        if ($objGuiaProc->TarifaId == 61) {
            $objGuiaProc->TarifaId = 59;
            echo "La guia: ".$objGuiaProc->NumeGuia." de fecha: ".$objGuiaProc->FechGuia->__toString('YYYY-MM-DD')." tenía 61 y le puse: 59<br>";
        }
    }
    if ($blnActuGuia) {
        $objGuiaProc->Save();
    }
    $intCantRegi++;
}
echo "<br>Fueron $intCantRegi registros...<br><br>";
?>
