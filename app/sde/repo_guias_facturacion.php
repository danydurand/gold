<?php
#------------------------------------------------------------
# Programa      : repo_guias_xls_sql.php
# Realizado por : Irán Anzola
# Fecha Elab.   : 27/06/2017
# Descripcion   : Reporte de Guias en Excel con criterio SQL
#------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

$strSepaColu = ';';
if (isset($_SESSION['SepaColu'])) {
    $strSepaColu = $_SESSION['SepaColu'];
}
$objCondWher = unserialize($_SESSION['CondWher']);
$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
$objUser     = unserialize($_SESSION['User']);
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strNombArch = __TEMP__.'/guias_facturacion_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrEnca2XLS = array(
    'Cliente',
    'Guia-Cliente',
    'S.Import',
    'Fecha',
    'Destino',
    'Zona',
    'Kilos',
    'PiesCub',
    'Piezas',
    'Manifiesto',
    'Factura',
    'Total'
);
//----------------------------------------------------------------------
// El vector de encabezados, se lleva al archivo plano
//----------------------------------------------------------------------
$strCadeAudi = implode($strSepaColu,$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
$objDatabase = Guias::GetDatabase();
$objDbResult = $objDatabase->Query($strCadeSqlx);
$intCantRegi = 0;
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strNombClie = quitaCaracter($strSepaColu,$mixRegistro['cliente_corp']);
    $strNumeGuia = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['tracking'])));
    $strServImpo = $mixRegistro['servicio_importacion'];
    $strFechGuia = $mixRegistro['fecha_guia'];
    $strEstaDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['destino'])));
    $objZonaFact = Parametros::LoadByIndiceCodigo('ZONA',$mixRegistro['zona']);
    $strNombZona = $objZonaFact ? $objZonaFact->Descripcion : 'N/A';
    $strKiloGuia = nf($mixRegistro['kilos']);
    $strPiesGuia = nf($mixRegistro['pies_cub']);
    $strCantPiez = nf0($mixRegistro['piezas']);
    $strRefeMani = $mixRegistro['referencia'];
    $strFactGuia = $mixRegistro['factura'];
    $strMontTota = nf($mixRegistro['total']);

    $arrLineArch = array(
        $strNombClie,
        $strNumeGuia,
        $strServImpo,
        $strFechGuia,
        $strEstaDest,
        $strNombZona,
        $strKiloGuia,
        $strPiesGuia,
        $strCantPiez,
        $strRefeMani,
        $strFactGuia,
        $strMontTota,
    );
    //----------------------------------------------------------------------
    // El vector generado, se lleva al archivo plano
    //----------------------------------------------------------------------
    $strCadeAudi = implode($strSepaColu,$arrLineArch);
    fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
    $intCantRegi ++;
}
if ($intCantRegi > 0) {
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo '<h2>No hay registros que satisfagan las condiciones</h2>';
}