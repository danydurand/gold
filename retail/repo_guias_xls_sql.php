<?php
#------------------------------------------------------------
# Programa      : repo_guias_xls_sql.php
# Realizado por : Irán Anzola
# Fecha Elab.   : 27/06/2017
# Descripcion   : Reporte de Guias en Excel con criterio SQL
#------------------------------------------------------------
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

$strSepaColu = ';';
if (isset($_SESSION['SepaColu'])) {
    $strSepaColu = $_SESSION['SepaColu'];
}
$objCondWher = unserialize($_SESSION['CondWher']);
$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
t('SQL: '.$strCadeSqlx);
$objUser     = unserialize($_SESSION['User']);
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strNombArch = __TEMP__.'/guias_retail_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrEnca2XLS = array(
    'Guia',
    'Cliente',
    'Fecha',
    'Suc.Orig',
    'Recep.Orig',
    'Suc.Dest',
    'Recep.Dest',
    'Prod',
    'F. Pago',
    'Remitente',
    'Destinatario',
    'Tarifa',
    'Kilos',
    'PiesCub',
    'Volumen',
    'Piezas',
    'V.Decl',
    'Factura',
    'Total',
);
$strCadeAudi = implode($strSepaColu,$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
$objDatabase = Guias::GetDatabase();
$objDbResult = $objDatabase->Query($strCadeSqlx);
$intCantRegi = 0;
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strReceOrig = $mixRegistro['receptoria_origen'];
    $strReceDest = $mixRegistro['receptoria_destino'];
    $strFactGuia = $mixRegistro['factura'];

    $strNumeGuia = " ".quitaCaracter($strSepaColu,$mixRegistro['numero']);
    $strNombClie = quitaCaracter($strSepaColu,$mixRegistro['remitente']);
    $strFechGuia = $mixRegistro['fecha_guia'];
    $strEstaOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['origen'])));
    $strReceOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$strReceOrig)));
    $strEstaDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['destino'])));
    $strReceDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$strReceDest)));
    $strCodiProd = $mixRegistro['codigo'];
    $strFormPago = $mixRegistro['forma_pago'];
    $strNombRemi = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['remitente'])));
    $strNombDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$mixRegistro['nombre_destinatario'])));
    $strDescTari = $mixRegistro['tarifa'];
    $strKiloGuia = nf($mixRegistro['kilos']);
    $strPiesGuia = nf($mixRegistro['pies_cub']);
    $strPesoVolu = nf($mixRegistro['volumen']);
    $strCantPiez = nf0($mixRegistro['piezas']);
    $strValoDecl = nf($mixRegistro['valor_declarado']);
    $strFactGuia = utf8_decode($strFactGuia);
    $strMontTota = nf($mixRegistro['total']);

    $arrLineArch = array(
        $strNumeGuia,
        $strNombClie,
        $strFechGuia,
        $strEstaOrig,
        $strReceOrig,
        $strEstaDest,
        $strReceDest,
        $strCodiProd,
        $strFormPago,
        $strNombRemi,
        $strNombDest,
        $strDescTari,
        $strKiloGuia,
        $strPiesGuia,
        $strPesoVolu,
        $strCantPiez,
        $strValoDecl,
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