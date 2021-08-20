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
$strNombArch = __TEMP__.'/guias_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrEnca2XLS = array(
    'Nro Guia',
    'Fecha',
    'Origen',
    'Destino',
    'S.Import',
    'Pzas',
    'Kilos',
    'PiesCub',
    'Remitente',
    'Destinatario',
    'Id-Pieza',
    'Ult. Ckpt',
);
$strCadeAudi = implode($strSepaColu,$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
$objDatabase = Guias::GetDatabase();
$objDbResult = $objDatabase->Query($strCadeSqlx);
$intCantRegi = 0;
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strNumeGuia = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['tracking'])));
    $strFechGuia = $mixRegistro['fecha_guia'];
    $strSucuOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['origen'])));
    $strSucuDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['destino'])));
    $strServImpo = $mixRegistro['servicio_importacion'];
    $strCantPiez = nf0($mixRegistro['piezas']);
    $strKiloGuia = nf($mixRegistro['kilos']);
    $strPiesGuia = nf($mixRegistro['pies_cub']);
    $strNombRemi = quitaCaracter($strSepaColu,$mixRegistro['remitente']);
    $strNombDest = quitaCaracter($strSepaColu,$mixRegistro['nombre_destinatario']);
    $strIdxxPiez = $mixRegistro['id_pieza'];
    $strUltiCkpt = $mixRegistro['codigo_ckpt'];
    $arrLineArch = array(
        $strNumeGuia,
        $strFechGuia,
        $strSucuOrig,
        $strSucuDest,
        $strServImpo,
        $strCantPiez,
        $strKiloGuia,
        $strPiesGuia,
        $strNombRemi,
        $strNombDest,
        $strIdxxPiez,
        $strUltiCkpt
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