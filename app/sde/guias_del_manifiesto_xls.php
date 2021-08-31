<?php
#------------------------------------------------------------
# Programa      : reporte_tt_xls.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 16/12/2017
# Descripcion   : Reporte de Guias en Excel con criterio SQL
#------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');

$intManiIdxx = $_GET['id'];
$objNotaEntr = NotaEntrega::Load($intManiIdxx);
$strTituRepo = 'GuiasDelManifiesto-'.$objNotaEntr->Referencia;

if ($objNotaEntr->ServicioImportacion == 'MAR') {
    $strTituPeso = 'PiesCub';
    $strNombColu = 'pies_cub';
} else {
    $strTituPeso = 'Kilos';
    $strNombColu = 'kilos';
}
//-------------------------
// Encabezado del Reporte
//-------------------------
$arrEncaDato = [
    'Guia',
    'Destino',
    'Piezas',
    'Destinatario',
    $strTituPeso
];
//---------
// Query
//---------
$strCadeSqlx  = "select tracking, destino, piezas, nombre_destinatario, $strNombColu ";
$strCadeSqlx .= "  from v_info_guia_y_piezas ";
$strCadeSqlx .= " where nota_entrega_id = ".$objNotaEntr->Id;
$objDatabase  = Guias::GetDatabase();
$objResulSet  = $objDatabase->Query($strCadeSqlx);
$intCantRegi  = 0;
//---------------------
// Se llena el vector
//---------------------
$arrDatoRepo = [];
while ($mixRegistro = $objResulSet->FetchArray()) {
    $strNumeGuia = $mixRegistro['tracking'];
    $strIataDest = $mixRegistro['destino'];
    $intCantPiez = $mixRegistro['piezas'];
    $strnombDest = $mixRegistro['nombre_destinatario'];
    $decPesoPiez = $mixRegistro[$strNombColu];

    $arrDatoRepo[] = array(
        $strNumeGuia,
        $strIataDest,
        $intCantPiez,
        $strnombDest,
        $decPesoPiez
    );
    $intCantRegi ++;
}
//---------------------------
// Se emite el archivo XLS
//---------------------------
if ($intCantRegi > 0) {
    $objValoRepo = new stdClass();
    $objValoRepo->arrEncaDato = $arrEncaDato;
    $objValoRepo->arrDatoExpo = $arrDatoRepo;
    $objValoRepo->strTituRepo = $strTituRepo;
    $objValoRepo->blnConxBord = true;
    $objValoRepo->blnConxBord = 0;
    $objExpoDato = new ExportarDatos($objValoRepo);
    echo $objExpoDato->Exportar();
} else {
    echo "<h1>No hay registros</h1>";
}
