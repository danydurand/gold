<?php
#---------------------------------------------------------------------
# Programa      : repo_guias_nrrp_sql.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 30/11/2017
# Descripcion   : Reporte de Guias NR y RP en Excel con criterio SQL
#---------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
//------------------------------------------------------------------
// La variable de Sesion llamada 'CritImpr' contiene los valores
// que definen el conjunto de registros que debe salir en el
// Reporte
//------------------------------------------------------------------
$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
$objUser = unserialize($_SESSION['User']);
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strNombArch = '/tmp/guias_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrEnca2XLS = array(
    'GuiaLib',
    'Tracking',
    'Fecha',
    'Origen',
    'Destino',
    'ModPago',
    'Remitente',
    'Destinatario',
    'Peso',
    'Piezas',
    'V.Decl',
    'EntregadoA',
    'F.Entrega',
    'H. Entrega',
    'Ult.Ckpt',
    'Suc.Ult.Ckpt',
    'F.Ult.Ckpt',
    'H.Ult.Ckpt',
    'Usuario',
    'FleteDir',
    'Guia Retorno',
    'Contenido'
);
//----------------------------------------------------------------------
// El vector de encabezados, se lleva al archivo plano
//----------------------------------------------------------------------
$strCadeAudi = implode(';',$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.";\n");
//--------------------------------------------------------
// Selecciono los registros que satisfagan la condicion
//--------------------------------------------------------
$intCantRepe = 0;
$objDatabase = Guia::GetDatabase();
$objResulSet = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objResulSet->FetchArray()) {
    $strNumeGuia = " ".$mixRegistro['nume_guia'];
    $strNumeTrac = " ".$mixRegistro['guia_externa'];
    $strFechGuia = $mixRegistro['fech_guia'];
    $strEstaOrig = $mixRegistro['esta_orig'];
    $strEstaDest = $mixRegistro['esta_dest'];
    $strModaPago = $mixRegistro['modalidad_pago'];
    $strNombRemi = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['remitente']));
    $strNombDest = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['nomb_dest']));
    $strPesoGuia = nf($mixRegistro['peso_guia']);
    $strCantPiez = nf0($mixRegistro['cant_piez']);
    $strValoDecl = nf($mixRegistro['valor_declarado']);
    $strEntrAxxx = $mixRegistro['entregado_a'];
    $strFechEntr = $mixRegistro['fecha_entrega'];
    $strHoraEntr = $mixRegistro['hora_entrega'];
    $strCodiCkpt = $mixRegistro['codi_ckpt'];
    $strEstaCkpt = $mixRegistro['esta_ckpt'];
    $strFechCkpt = $mixRegistro['fech_ckpt'];
    $strHoraCkpt = $mixRegistro['hora_ckpt'];
    $strUsuaCkpt = $mixRegistro['usua_ckpt'];
    $strFletDire = $mixRegistro['flete_directo'];
    $strGuiaReto = $mixRegistro['guia_retorno'];
    $strDescCont = $mixRegistro['desc_cont'];

    //  $strEsunReto = $mixRegistro['retorno'];

    $arrLineArch = array(
        $strNumeGuia,
        $strNumeTrac,
        $strFechGuia,
        $strEstaOrig,
        $strEstaDest,
        $strModaPago,
        $strNombRemi,
        $strNombDest,
        $strPesoGuia,
        $strCantPiez,
        $strValoDecl,
        $strEntrAxxx,
        $strFechEntr,
        $strHoraEntr,
        $strCodiCkpt,
        $strEstaCkpt,
        $strFechCkpt,
        $strHoraCkpt,
        $strUsuaCkpt,
        $strFletDire,
        $strGuiaReto,
        $strDescCont
    );
    //----------------------------------------------------------------------
    // El vector generado, se lleva al archivo plano
    //----------------------------------------------------------------------

    $strCadeAudi = implode(';',$arrLineArch);
    fputs($mixManeArch,$strCadeAudi.";\n");
    $intCantRepe ++;
}
if ($intCantRepe > 0) {
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo '<h2>No hay registros que satisfagan las condiciones</h2>';
}