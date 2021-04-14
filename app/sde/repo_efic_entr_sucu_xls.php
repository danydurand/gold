<?php
//------------------------------------------------
// Programa      : repo_efic_entr_sucu_xls.php
// Realizado por : Iran Anzola
// Fecha Elab.   : 08/05/2017
//------------------------------------------------
require_once('qcubed.inc.php');

$objUser = unserialize($_SESSION['User']);
$strSepaColu = ';';
$strNombArch = __TEMP__.'/ees_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');

$arrEncaDato = array('Guia','Ori-Des','Remitente','Destinatario','F.Pick-Up','F. Arribo','F.Entrega','Fecha POD','Dias Entr', 'Dias POD', 'Dias Arr.');
$strCadeAudi = implode($strSepaColu,$arrEncaDato);
fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");

$dttFechDhoy = FechaDeHoy();
$dttFechInic = unserialize($_SESSION['FechInic']);
$dttFechFina = unserialize($_SESSION['FechFina']);
if (isset($_SESSION['SucuSele'])) {
    $arrSucuSele[] = Estacion::LoadByCodiEsta(unserialize($_SESSION['SucuSele']));
} else {
    $arrSucuSele = Estacion::LoadArrayByCodiStat(1);
}
//-----------------------------------------
// Se Procesan una por una las Sucursales
//-----------------------------------------
foreach ($arrSucuSele as $objSucursal) {
    if (!in_array($objSucursal->CodiEsta,array('TODOS','EXP','MIA'))) {
        //-----------------------------------------------------------
        // Se seleccionan los registros que satisfagan la condición
        //-----------------------------------------------------------
        $arrDatoRepo = array();
        $objDatabase = Guia::GetDatabase();
        //-----------------------------------------------------------------------------------------------------
        // Se arma el query para obtener la información del reporte, guía, estación, fecha entrega, fecha pod
        //-----------------------------------------------------------------------------------------------------
        $strCadeSqlx  = "select g.nume_guia, g.esta_orig, g.esta_dest, g.nomb_remi, g.nomb_dest, k.fech_ckpt, ";
        $strCadeSqlx .= "       g.fecha_pod, g.fecha_entrega, g.fech_guia ";
        $strCadeSqlx .= "  from guia g inner join guia_ckpt k";
        $strCadeSqlx .= "    on g.nume_guia = k.nume_guia ";
        $strCadeSqlx .= " where g.fecha_entrega between '$dttFechInic' and '$dttFechFina'";
        $strCadeSqlx .= "   and k.codi_ckpt = 'OK' ";
        $strCadeSqlx .= "   and g.anulada   = 0";
        $strCadeSqlx .= "   and esta_dest   = '".$objSucursal->CodiEsta."'";
        $objDbResult  = $objDatabase->Query($strCadeSqlx);
        while ($mixRegistro = $objDbResult->FetchArray()) {
            $objGuia     = Guia::Load($mixRegistro['nume_guia']);
            $strFechPick = $objGuia->FechaCreacion->__toString('YYYY-MM-DD');
            $strFechArri = 'N/D';
            if ($objGuia) {
                /**
                 * @var $objCkptPick GuiaCkpt
                 */
                $objCkptPick = $objGuia->checkpoint('PU');
                if ($objCkptPick) {
                    $strFechPick = $objCkptPick->FechCkpt->__toString('YYYY-MM-DD');
                }
                $objEstaGuia = $objGuia->GetEstadisticaDeGuias();
                if (strlen($objEstaGuia->FechaArribo) > 0) {
                    $strFechArri = $objEstaGuia->FechaArribo->__toString('YYYY-MM-DD');
                }
            }
            $intDiasHabi  = diasHabilesTranscurridos($mixRegistro['fecha_entrega'],$strFechPick);
            if ($intDiasHabi < 0) {
                $intDiasHabi = 0;
            }
            $intDiasHabi2 = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistro['fecha_entrega']);
            if ($intDiasHabi2 < 0) {
                $intDiasHabi2 = 0;
            }
            $intDiasEfi3 = 'N/D';
            if ($strFechArri != 'N/D') {
                $intDiasEfi3 = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$strFechArri);
            }
            $arrDatoRepo[] = array(
                $mixRegistro['nume_guia'],
                $mixRegistro['esta_orig']."-".$mixRegistro['esta_dest'],
                substr($mixRegistro['nomb_remi'],0,20),
                substr($mixRegistro['nomb_dest'],0,20),
                $strFechPick,
                $strFechArri,
                $mixRegistro['fecha_entrega'],
                $mixRegistro['fecha_pod'],
                $intDiasHabi,
                $intDiasHabi2,
                $intDiasEfi3
            );

        }
        //t('El vector de datos tiene: '.count($arrDatoRepo).' elementos');
        $arrDatoRepo = ordenar_array($arrDatoRepo,'8',SORT_DESC);

        foreach ($arrDatoRepo as $arrLineArch) {
            $strCadeAudi = implode($strSepaColu,$arrLineArch);
            fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
        }

        QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);

        //$objValoRepo = new stdClass();
        //$objValoRepo->arrEncaDato = $arrEncaDato;
        //$objValoRepo->arrDatoExpo = $arrDatoRepo;
        //$objValoRepo->strTituRepo = 'efic_en_entr_por_sucu_'.$objSucursal->CodiEsta;
        //$objValoRepo->blnConxBord = true;
        //
        //$objExpoDato = new ExportarDatos($objValoRepo);
        //$objExpoDato->Exportar();
    }
}