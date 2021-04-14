<?php
#---------------------------------------------------------------
# Programa      : repo_clientes_xls_sql.php
# Realizado por : Daniel Durand
# Fecha Elab.   : 12/08/2017
# Descripcion   : Reporte de Cliente en Excel con criterio SQL
#---------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');

$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
$arrEnca2XLS = array(
    'Codigo',
    'Razon Social',
    'Sucursal',
    'Vendedor',
    'Direccion Fiscal',
    'Nro de RIF',
    'Persona Contacto',
    'Telefono',
    'Direccion de Recolecta',
    'Estatus',
    'Email',
    'Tarifa',
    'Mod. Pago',
    'F. 1era Guia',
    'F. Ult. Guia',
    'Tiempo en la Empresa',
    'Cnt. Tot Guias',
    'Peso Tot',
    'Venta Tot',
);
$objUserRepo = unserialize($_SESSION['User']);
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strNombArch = __TEMP__.'/clientes_'.$objUserRepo->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------------------------------------------------------------
// El vector de encabezados, se lleva al archivo plano
//----------------------------------------------------------------------
$strCadeAudi = implode(';',$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.";\n");
//--------------------------------------------------------
// Selecciono los registros que satisfagan la condicion
//--------------------------------------------------------
$intCantRepe = 0;
$objDatabase = MasterCliente::GetDatabase();
$objResulSet = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objResulSet->FetchArray()) {
    $strCodiClie  = $mixRegistro['codigo_interno'];
    $strRazoSoci  = str_replace(';',',',QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['nomb_clie'])));
    $strCodiSucu  = $mixRegistro['codi_esta'];
    $strNombVend  = str_replace(';',',',QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['vendedor'])));
    $strDireFisc  = str_replace(';',',',QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['dire_fisc'])));
    $strNumeDrif  = $mixRegistro['nume_drif'];
    $strPersCont  = str_replace(';',',',QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['pers_cona'])));
    $strTeleCont  = str_replace(';',',',utf8_decode($mixRegistro['tele_cona']));
    $strDireReco  = str_replace(';',',',QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['dire_reco'])));
    $strEstaClie  = $mixRegistro['codi_stat'] ? 'ACTIVO' : 'INACTIVO';
    $strDireMail  = $mixRegistro['dire_mail'];
    $strCodiTari  = str_replace(';',',',QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['descripcion'])));
    $strModaPago  = TipoClienteType::ToString($mixRegistro['tipo_cliente']);
    $strPrimGuia  = $mixRegistro['fecha_primera_guia'];
    $strUltiGuia  = $mixRegistro['fecha_ultima_guia'];
    $dtePrimFech  = date_create($strPrimGuia);
    $dteUltiFech  = date_create($strUltiGuia);
    $strTiemEmpr  = date_diff($dteUltiFech,$dtePrimFech)->format('%y Año(s) %m Mese(s) %d Día(s)');
    $strCantGuia  = nf($mixRegistro['cantidad_guias']);
    $strPesoTota  = nf($mixRegistro['peso_total']);
    $strVentTota  = nf($mixRegistro['venta_total']);
    $arrLineArch = array(
        $strCodiClie,
        $strRazoSoci,
        $strCodiSucu,
        $strNombVend,
        $strDireFisc,
        $strNumeDrif,
        $strPersCont,
        $strTeleCont,
        $strDireReco,
        $strEstaClie,
        $strDireMail,
        $strCodiTari,
        $strModaPago,
        $strPrimGuia,
        $strUltiGuia,
        $strTiemEmpr,
        $strCantGuia,
        $strPesoTota,
        $strVentTota
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