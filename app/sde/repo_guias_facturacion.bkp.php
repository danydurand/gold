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
$objUser = unserialize($_SESSION['User']);
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
        $strNombClie = quitaCaracter($strSepaColu,$objTabla->NombreCliente('reporte'));
        $strNumeGuia = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->Tracking)));
        $strServImpo = $objTabla->ServicioImportacion;
        $strFechGuia = $objTabla->Fecha->__toString('DD/MM/YYYY');
        $strEstaDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->Destino->Iata)));
        $objZonaFact = Parametros::LoadByIndiceCodigo('ZONA',$objTabla->Destino->Zona);
        $strNombZona = $objZonaFact ? $objZonaFact->Descripcion : 'N/A';
        $strKiloGuia = nf($objTabla->Kilos);
        $strPiesGuia = nf($objTabla->PiesCub);
        $strCantPiez = nf0($objTabla->Piezas);
        $strRefeMani = (!is_null($objTabla->NotaEntregaId)) ? $objTabla->NotaEntrega->Referencia : null;
        $strFactGuia = $objTabla->NroFactura();
        $strMontTota = nf($objTabla->Total);

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
    }
    $intCantRepe ++;
}
if ($intCantRepe > 0) {
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo '<h2>No hay registros que satisfagan las condiciones</h2>';
}