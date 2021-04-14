<?php
#------------------------------------------------------------
# Programa      : repo_guias_newxls_sql.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 16/12/2017
# Descripcion   : Reporte de Guias en Excel con criterio SQL
#------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
//-------------------------------------------------------------------------------------------
// La variable de sesion llamada 'CritSqlx' contiene los criterios de seleccion de regitros
//-------------------------------------------------------------------------------------------
$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strTituRepo = 'Guias_'.date('Y-m-d-h-i');
//-------------------------
// Encabezado del Reporte
//-------------------------
$arrEncaDato = array(
    'Guia Lib',
    'Guia Ext',
    'Cliente',
    'Fecha',
    'Suc.Orig',
    'Recep.Orig',
    'Suc.Dest',
    'Recep.Dest',
    'Mod Pago',
    'Remitente',
    'Destinatario',
    'Peso',
    'Tarifa Vol',
    'Piezas',
    'V.Decl',
    'Entregado A',
    'F. Entrega',
    'H. Entrega',
    'Ult.Ckpt',
    'Suc.Ult.Ckpt',
    'F.Ult.Ckpt',
    'H.Ult.Ckpt',
    'Usuario',
    'Ult. Ruta',
    'FD',
    'Guia Retorno',
    'Guia Original',
    '% Iva',
    'Mto Iva',
    '% Sgro',
    'Mto Sgro',
    'Mto Base',
    'Franqueo',
    'Mto Total',
    'Monto Cancelado',
    'Recibio el Pago',
    'F.Pago',
    'T. Documento',
    'Nro Documento',
    'Contenido');
//--------------------------------------------------------
// Selecciono los registros que satisfagan la condicion
//--------------------------------------------------------
$arrDatoRepo = array();
$intCantRepe = 0;
$objDatabase = Guia::GetDatabase();
$objResulSet = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objResulSet->FetchArray()) {
    $strNumeGuia = " ".$mixRegistro['nume_guia'];
    $strNumeTrac = $mixRegistro['guia_externa'];
    $strCodiClie = $mixRegistro['codigo_interno'];
    $strFechGuia = $mixRegistro['fech_guia'];
    $strEstaOrig = $mixRegistro['esta_orig'];
    $strReceOrig = $mixRegistro['receptoria_origen'];
    $strEstaDest = $mixRegistro['esta_dest'];
    $strReceDest = $mixRegistro['receptoria_destino'];
    $strModaPago = $mixRegistro['modalidad_pago'];
    $strNombRemi = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['remitente']));
    $strNombDest = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['nomb_dest']));
    $strPesoGuia = nf($mixRegistro['peso_guia']);
    $strPesoVolu = SinoType::ToString($mixRegistro['peso_volum']);
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
    $strCodiRuta = $mixRegistro['codi_ruta'];
    $strFletDire = $mixRegistro['flete_directo'];
    $strGuiaReto = $mixRegistro['guia_retorno'];
    $strGuiaOrig = '';
    $intPosiCade = strpos($mixRegistro['observacion'],'RETORNO DE LA GUIA: ');
    if ($intPosiCade !== false) {
        $strGuiaOrig = substr($mixRegistro['observacion'], 20);
    }
    $strPorcIvax = nf($mixRegistro['porcentaje_iva']);
    $strMontIvax = nf($mixRegistro['monto_iva']);
    $strPorcSgro = nf($mixRegistro['porcentaje_seguro']);
    $strMontSgro = nf($mixRegistro['monto_seguro']);
    $strMontBase = nf($mixRegistro['monto_base']);
    $strMontFran = nf($mixRegistro['monto_franqueo']);
    $strMontTota = nf($mixRegistro['monto_total']);
    //---------------------------
    // Datos del Pago Realizado
    //---------------------------
    $objCobrCodx = CobroCod::Load($mixRegistro['nume_guia']);
    if ($objCobrCodx) {
        $strMontCanc = nf($objCobrCodx->MontoCancelado);
        $strReciPago = $objCobrCodx->RecibioElPago;
        if ($objCobrCodx->FechaPago) {
            $strFechPago = $objCobrCodx->FechaPago->__toString("DD/MM/YYYY");
        } else {
            $strFechPago = "N/A";
        }
        if ($objCobrCodx->TipoDocumento) {
            $strTipoDocu = TipoDocumento($objCobrCodx->TipoDocumento);
        } else {
            $strTipoDocu = "N/A";
        }
        $strNumeDocu = $objCobrCodx->NumeroDocumento;
    } else {
        $strMontCanc = 0;
        $strReciPago = 0;
        $strFechPago = 0;
        $strTipoDocu = 0;
        $strNumeDocu = 0;
    }
    $strDescCont = $mixRegistro['desc_cont'];

    $arrDatoRepo[] = array(
        $strNumeGuia,
        $strNumeTrac,
        $strCodiClie,
        $strFechGuia,
        $strEstaOrig,
        $strReceOrig,
        $strEstaDest,
        $strReceDest,
        $strModaPago,
        $strNombRemi,
        $strNombDest,
        $strPesoGuia,
        $strPesoVolu,
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
        $strCodiRuta,
        $strFletDire,
        $strGuiaReto,
        $strGuiaOrig,
        $strPorcIvax,
        $strMontIvax,
        $strPorcSgro,
        $strMontSgro,
        $strMontBase,
        $strMontFran,
        $strMontTota,
        $strMontCanc,
        $strReciPago,
        $strFechPago,
        $strTipoDocu,
        $strNumeDocu,
        $strDescCont
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