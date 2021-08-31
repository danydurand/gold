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
t('Manif: '.$intManiIdxx);
$objNotaEntr = NotaEntrega::Load($intManiIdxx);
t('Cargado el manif');
$strTituRepo = 'PiezasDelManifiesto-'.$objNotaEntr->Referencia;
t('Titulo');
//-------------------------
// Encabezado del Reporte
//-------------------------
if ($objNotaEntr->ServicioImportacion == 'MAR') {
    $strTituPeso = 'PiesCub';
    $strNombColu = 'pieza_pies_cub';
} else {
    $strTituPeso = 'Kilos';
    $strNombColu = 'pieza_kilos';
}
t('listo1');
$arrEncaDato = [
    'Pieza',
    'Destino',
    'Ult Ckpt',
    $strTituPeso
];
t('listo2');
//---------
// Query
//---------
$strCadeSqlx  = "select id_pieza, destino, codigo_ckpt, $strNombColu ";
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
    $strIdxxPiez = $mixRegistro['id_pieza'];
    $strIataDest = $mixRegistro['destino'];
    $strUltiCkpt = $mixRegistro['codigo_ckpt'];
    $decPesoPiez = $mixRegistro[$strNombColu];

    $arrDatoRepo[] = array(
        $strIdxxPiez,
        $strIataDest,
        $strUltiCkpt,
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
