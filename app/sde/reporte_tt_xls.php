<?php
#------------------------------------------------------------
# Programa      : reporte_tt_xls.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 16/12/2017
# Descripcion   : Reporte de Guias en Excel con criterio SQL
#------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');

$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
$strTituRepo = 'TiemposDeTransito_'.date('Y-m-d-h-i');
//-------------------------
// Encabezado del Reporte
//-------------------------
$arrEncaDato = array(
    'Guia Gold',
    'Guia Cliente',
    'Cliente',
    'Origen',
    'Deestino',
    'Producto',
    'Manif. Recepcion',
    'Pieza',
    'F.Guia',
    'F.PickUp',
    'F.Manif.Carga',
    'F.Recep.Almacen',
    'F.Traslado',
    'F.Arribo',
    'F.Auditoria',
    'F. Entrega',
    'TT'
);
//--------------------------------------------------------
// Selecciono los registros que satisfagan la condicion
//--------------------------------------------------------
$arrDatoRepo = array();
$intCantRepe = 0;
$objDatabase = Guia::GetDatabase();
$objResulSet = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objResulSet->FetchArray()) {
    $strNumeGuia = ' '.$mixRegistro['numero'];
    $strNumeTrac = $mixRegistro['tracking'];
    $strNombClie = $mixRegistro['cliente'];
    $strSucuOrig = $mixRegistro['origen'];
    $strSucuDest = $mixRegistro['destino'];
    $strCodiProd = $mixRegistro['producto'];
    $strManiRece = $mixRegistro['referencia'];
    $strIdxxPiez = $mixRegistro['id_pieza'];
    $strFechGuia = $mixRegistro['fecha_guia'];
    $strFechPick = $mixRegistro['fecha_pu'];
    $strFechMani = $mixRegistro['fecha_mc'];
    $strFechRece = $mixRegistro['fecha_ra'];
    $strFechTras = $mixRegistro['fecha_tr'];
    $strFechArri = $mixRegistro['fecha_ar'];
    $strFechAudi = $mixRegistro['fecha_av'];
    $strFechEntr = $mixRegistro['fecha_ok'];
    $intTiemTran = $mixRegistro['tt'];

    $arrDatoRepo[] = array(
        $strNumeGuia,
        $strNumeTrac,
        $strNombClie,
        $strSucuOrig,
        $strSucuDest,
        $strCodiProd,
        $strManiRece,
        $strIdxxPiez,
        $strFechGuia,
        $strFechPick,
        $strFechMani,
        $strFechRece,
        $strFechTras,
        $strFechArri,
        $strFechAudi,
        $strFechEntr,
        $intTiemTran
    );
    $intCantRepe ++;
}
if ($intCantRepe > 0) {
    $objValoRepo = new stdClass();
    $objValoRepo->arrEncaDato = $arrEncaDato;
    $objValoRepo->arrDatoExpo = $arrDatoRepo;
    $objValoRepo->strTituRepo = $strTituRepo;
    $objValoRepo->blnConxBord = true;
    $objExpoDato = new ExportarDatos($objValoRepo);
    echo $objExpoDato->Exportar();
} else {
    echo '<h3>No hay registros que satisfagan las condiciones</h3>';
}