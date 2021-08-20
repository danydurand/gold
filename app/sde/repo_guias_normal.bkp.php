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
    'Ult. Ckpt',
    'Piezas',
    'Kilos',
    'PiesCub',
    'Remitente',
    'Destinatario'
);
//----------------------------------------------------------------------
// El vector de encabezados, se lleva al archivo plano
//----------------------------------------------------------------------
$strCadeAudi = implode($strSepaColu,$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
//-----------------------
// Chunk de registros
//-----------------------
$intCantRegi = Guias::QueryCount(QQ::AndCondition($objCondWher));
$intCantChun = 500;
if ($intCantRegi > $intCantChun) {
    $intCantCicl = round($intCantRegi/$intCantChun,0);
} else {
    $intCantCicl = 1;
}
$intCantRepe = 0;
$objClauLimi = QQ::Clause();
while ($intCantRepe <= $intCantCicl) {
    $objClauLimi = QQ::LimitInfo($intCantChun,$intCantRepe*$intCantChun);
    $arrDatoRepo = Guias::QueryArray(QQ::AndCondition($objCondWher),QQ::Clause($objClauLimi));
    //--------------------------------------------------------------
    // Recorro la lista de registros, armando el vector de datos
    //--------------------------------------------------------------
    foreach ($arrDatoRepo as $objTabla) {
        $strNumeGuia = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->Tracking)));
        $strFechGuia = $objTabla->Fecha->__toString('DD/MM/YYYY');
        $strSucuOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->Origen->Iata)));
        $strSucuDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->Destino->Iata)));
        $strServImpo = $objTabla->ServicioImportacion;
        $strUltiCkpt = $objTabla->ultimoCheckpoint();
        $strCantPiez = nf0($objTabla->Piezas);
        $strKiloGuia = nf($objTabla->Kilos);
        $strPiesGuia = nf($objTabla->PiesCub);
        $strNombRemi = quitaCaracter($strSepaColu,$objTabla->NombreRemitente);
        $strNombDest = quitaCaracter($strSepaColu,$objTabla->NombreDestinatario);

        $arrLineArch = array(
            $strNumeGuia,
            $strFechGuia,
            $strSucuOrig,
            $strSucuDest,
            $strServImpo,
            $strUltiCkpt,
            $strCantPiez,
            $strKiloGuia,
            $strPiesGuia,
            $strNombRemi,
            $strNombDest
        );
        //----------------------------------------------------------------------
        // El vector generado, se lleva al archivo plano
        //----------------------------------------------------------------------
        $strCadeAudi = implode($strSepaColu,$arrLineArch);
        fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
    }
    $intCantRepe ++;
}
if ($intCantRepe > 0) {
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo '<h2>No hay registros que satisfagan las condiciones</h2>';
}