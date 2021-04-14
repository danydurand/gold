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
$strNombArch = __TEMP__.'/guias_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrEnca2XLS = array(
    'Guia Gold',
    'Guia Ext',
    'Prod',
    'S.Import',
    'Cliente',
    'Fecha',
    'Suc.Orig',
    'Recep.Orig',
    'Suc.Dest',
    'Recep.Dest',
    'F. Pago',
    'Remitente',
    'Destinatario',
    'Tarifa',
    'Kilos',
    'Libras',
    'PiesCub',
    'Tarifa Vol',
    'Piezas',
    'NotaEntrega',
    'V.Decl',
    'Factura',
    'Entregado A',
    'F. Entrega',
    'H. Entrega',
    'Fecha POD',
    'Contenido'
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
        $strReceOrig = (!is_null($objTabla->ReceptoriaOrigenId)) ? $objTabla->ReceptoriaOrigen->Siglas : null;
        $strReceDest = (!is_null($objTabla->ReceptoriaDestinoId)) ? $objTabla->ReceptoriaDestino->Siglas : null;
        $strNotaEntr = (!is_null($objTabla->NotaEntregaId)) ? $objTabla->NotaEntrega->Referencia : null;
        $strFactGuia = $objTabla->NroFactura();
        //if (!is_null($objTabla->FacturaId)) {
        //    $objFactGuia = Facturas::Load($objTabla->FacturaId);
        //    if ($objFactGuia) {
        //        if (!is_null($objTabla->ClienteCorpId)) {
        //            $strFactGuia = $objFactGuia->Referencia;
        //        } else {
        //            $strFactGuia = $objFactGuia->Id;
        //        }
        //    }
        //}

        $strCodiProd = $objTabla->Producto->Codigo;
        $strServImpo = $objTabla->ServicioImportacion;
        $strDescTari = quitaCaracter($strSepaColu,$objTabla->NombreTarifa('reporte'));
        $strNumeGuia = " ".quitaCaracter($strSepaColu,$objTabla->Numero);
        $strNumeTrac = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->Tracking)));
        $strNombClie = quitaCaracter($strSepaColu,$objTabla->NombreCliente('reporte'));
        $strFechGuia = $objTabla->Fecha->__toString('DD/MM/YYYY');
        $strEstaOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->Origen->Iata)));
        $strReceOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$strReceOrig)));
        $strEstaDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->Destino->Iata)));
        $strReceDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$strReceDest)));
        $strFormPago = $objTabla->FormaPago;
        $strNombRemi = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->NombreRemitente)));
        $strNombDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->NombreDestinatario)));
        $strKiloGuia = nf($objTabla->Kilos);
        $strLibrGuia = nf($objTabla->Libras);
        $strPiesGuia = nf($objTabla->PiesCub);
        $strPesoVolu = nf($objTabla->Volumen);
        $strCantPiez = nf0($objTabla->Piezas);
        $strNotaEntr = utf8_decode($strNotaEntr);
        $strValoDecl = nf($objTabla->ValorDeclarado);
        $strFactGuia = utf8_decode($strFactGuia);
        $strEntrAxxx = quitaCaracter($strSepaColu,$objTabla->EntregadoA('reporte'));
        $strFechEntr = $objTabla->FechaEntrega();
        $strHoraEntr = quitaCaracter($strSepaColu,$objTabla->HoraEntrega('reporte'));
        $strFechPodx = $objTabla->FechaRegistroPod('reporte');
        $strMontTota = nf($objTabla->Total);

        $arrLineArch = array(
            $strNumeGuia,
            $strNumeTrac,
            $strCodiProd,
            $strServImpo,
            $strNombClie,
            $strFechGuia,
            $strEstaOrig,
            $strReceOrig,
            $strEstaDest,
            $strReceDest,
            $strFormPago,
            $strNombRemi,
            $strNombDest,
            $strDescTari,
            $strKiloGuia,
            $strLibrGuia,
            $strPiesGuia,
            $strPesoVolu,
            $strCantPiez,
            $strNotaEntr,
            $strValoDecl,
            $strFactGuia,
            $strEntrAxxx,
            $strFechEntr,
            $strHoraEntr,
            $strFechPodx,
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