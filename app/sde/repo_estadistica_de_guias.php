<?php
#------------------------------------------------------------
# Programa      : repo_estadistica_de_guias.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 26/02/2018
# Descripcion   : Reporte Estadistico de Guias
#------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
//-----------------------------------------------------------------------------------------------------
// La variable de Sesion llamada 'CritImpr' contiene los valores que definen el conjunto de registros
// que debe salir en el Reporte
//-----------------------------------------------------------------------------------------------------
$strSepaColu = ';';
if (isset($_SESSION['SepaColu'])) {
    $strSepaColu = $_SESSION['SepaColu'];
}
$objCondWher = unserialize($_SESSION['CondWher']);
$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
$objUser = unserialize($_SESSION['User']);
// echo "2<br>";
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strNombArch = __TEMP__.'/guias_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
// echo "3<br>";
//----------------
// Encabezados
//----------------
$arrEnca2XLS = array(
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
// echo "4<br>";
//----------------------------------------------------------------------
// El vector de encabezados, se lleva al archivo plano
//----------------------------------------------------------------------
$strCadeAudi = implode($strSepaColu,$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
//-----------------------
// Chunk de registros
//-----------------------
$intCantRegi = Guia::QueryCount(QQ::AndCondition($objCondWher));
$intCantChun = 500;
if ($intCantRegi > $intCantChun) {
    $intCantCicl = round($intCantRegi/$intCantChun,0);
} else {
    $intCantCicl = 1;
}
// echo "5<br>";
$intCantRepe = 0;
$objClauLimi = QQ::Clause();
while ($intCantRepe <= $intCantCicl) {
    $objClauLimi = QQ::LimitInfo($intCantChun,$intCantRepe*$intCantChun);
    $arrDatoRepo = Guia::QueryArray(QQ::AndCondition($objCondWher),QQ::Clause($objClauLimi));
    // echo "6<br>";
    //--------------------------------------------------------------
    // Recorro la lista de registros, armando el vector de datos
    //--------------------------------------------------------------
    foreach ($arrDatoRepo as $objTabla) {
        // echo"Guia: ".$objTabla->NumeGuia."<br>";
        $strNumeGuia = " ".quitaCaracter($strSepaColu,$objTabla->NumeGuia);
        $strNumeTrac = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->GuiaExterna)));
        $strCodiClie = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->CodiClieObject->CodigoInterno)));
        $strFechGuia = $objTabla->FechGuia->__toString("YYYY-MM-DD");
        // echo1;
        $strEstaOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->EstaOrig)));
        $strReceOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->ReceptoriaOrigen)));
        $strEstaDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->EstaDest)));
        $strReceDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->ReceptoriaDestino)));
        $strModaPago = TipoGuiaType::ToStringCorto($objTabla->TipoGuia);
        $strNombRemi = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->NombRemi)));
        $strNombDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->NombDest)));
        $strPesoGuia = nf($objTabla->PesoGuia);
        $strPesoVolu = SinoType::ToString($objTabla->CantAyudantes);
        $strCantPiez = nf0($objTabla->CantPiez);
        $strValoDecl = nf($objTabla->ValorDeclarado);
        // echo2;
        $strEntrAxxx = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->EntregadoA)));
        // echo3;
        $strFechEntr = $objTabla->FechaEntrega ? $objTabla->FechaEntrega->__toString("YYYY-MM-DD") : '';
        // echo4;
        $strHoraEntr = $objTabla->HoraEntrega;
        // echo5;
        $strCodiCkpt = $objTabla->CodiCkpt;
        // echo"6<br>";
        $strEstaCkpt = $objTabla->EstaCkpt;
        $strFechCkpt = $objTabla->FechCkpt ? $objTabla->FechCkpt->__toString("YYYY-MM-DD") : '';
        $strHoraCkpt = $objTabla->HoraCkpt;
        $objUsuaCkpt = Usuario::Load($objTabla->UsuaCkpt);
        $strUsuaCkpt = $objUsuaCkpt ? $objUsuaCkpt->LogiUsua : '';
        $strCodiRuta = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->UltimaRuta())));
        $strFletDire = $objTabla->FleteDirecto;
        $strGuiaReto = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->GuiaRetorno)));
        $strGuiaOrig = '';
        $intPosiCade = strpos(quitaCaracter($strSepaColu,$objTabla->Observacion),'RETORNO DE LA GUIA: ');
        if ($intPosiCade !== false) {
            $strGuiaOrig = QuitarCaracteresEspeciales2(utf8_decode(substr($objTabla->Observacion, 20)));
        }
        $strPorcIvax = nf($objTabla->PorcentajeIva);
        $strMontIvax = nf($objTabla->MontoIva);
        $strPorcSgro = nf($objTabla->PorcentajeSeguro);
        $strMontSgro = nf($objTabla->MontoSeguro);
        $strMontBase = nf($objTabla->MontoBase);
        $strMontFran = nf($objTabla->MontoFranqueo);
        $strMontTota = nf($objTabla->MontoTotal);
        // echo4;
        //---------------------------
        // Datos del Pago Realizado
        //---------------------------
        $objCobrCodx = CobroCod::Load($objTabla->NumeGuia);
        if ($objCobrCodx) {
            $strMontCanc = nf($objCobrCodx->MontoCancelado);
            $strReciPago = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objCobrCodx->RecibioElPago)));
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
            $strNumeDocu = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objCobrCodx->NumeroDocumento)));
        } else {
            $strMontCanc = 0;
            $strReciPago = 0;
            $strFechPago = 0;
            $strTipoDocu = 0;
            $strNumeDocu = 0;
        }
        $strDescCont = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->DescCont)));

        // echo5;
        $arrLineArch = array(
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
        // echo6;
        //----------------------------------------------------------------------
        // El vector generado, se lleva al archivo plano
        //----------------------------------------------------------------------
        $strCadeAudi = implode($strSepaColu,$arrLineArch);
        fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
        // echo "<br>";
    }
    // echo"Salió<br>";
    $intCantRepe ++;
}
if ($intCantRepe > 0) {
    // echo"Descarga<br>";
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo '<h2>No hay registros que satisfagan las condiciones</h2>';
}