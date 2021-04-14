<?php
//-----------------------------------------------------------------------------------------------
// Programa      : repo_er_sin_ok.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 10/03/2018
// Descripcion   : Este programa muestra las guias que debieron entregarse y no la han sido.
//-----------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

$dttFechDhoy = date('Y-m-d');
$arrSucuSele = Estacion::LoadSucursalesActivasSinAlmacenes();
foreach ($arrSucuSele as $objSucursal) {
    /**
     * @var $objSucursal Estacion
     */
    //--------------------------------------------------------
    // Selecciono los registros que satisfagan la condicion
    //--------------------------------------------------------
    $strCadeSqlx  = "select g.nume_guia, ";
    $strCadeSqlx .= "       g.fech_guia, ";
    $strCadeSqlx .= "       g.esta_orig, ";
    $strCadeSqlx .= "       g.esta_dest, ";
    $strCadeSqlx .= "       g.nomb_remi, ";
    $strCadeSqlx .= "       g.codi_ckpt, ";
    $strCadeSqlx .= "       g.fech_ckpt, ";
    $strCadeSqlx .= "       g.hora_ckpt, ";
    $strCadeSqlx .= "       g.esta_ckpt, ";
    $strCadeSqlx .= "       (fn_diastrans(e.fecha_ruta, now()) - (fn_cantsados(e.fecha_ruta, now()) + fn_cantferiados(e.fecha_ruta, now()))) as dias_tran ";
    $strCadeSqlx .= "  from guia g inner join estadistica_de_guias e";
    $strCadeSqlx .= "    on g.nume_guia = e.guia_id";
    $strCadeSqlx .= " where (fn_diastrans(e.fecha_ruta, now()) - (fn_cantsados(e.fecha_ruta, now()) + fn_cantferiados(e.fecha_ruta, now()))) > 1  ";
    $strCadeSqlx .= "   and g.esta_dest = '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "   and g.anulada   = 0";
    $strCadeSqlx .= "   and e.fecha_ruta >= date_sub(now(), INTERVAL 30 DAY) ";
    $strCadeSqlx .= "   and e.fecha_ruta IS NOT NULL";
    $strCadeSqlx .= "   and e.fecha_entrega IS NULL";
    $strCadeSqlx .= "   and exists (select NULL ";
    $strCadeSqlx .= "                 from guia_ckpt k ";
    $strCadeSqlx .= "                where k.nume_guia = g.nume_guia ";
    $strCadeSqlx .= "                  and k.codi_esta = '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "                  and k.codi_ckpt = 'ER')";
    $strCadeSqlx .= " order by e.fecha_ruta desc ";

    $objDatabase  = Guia::GetDatabase();
    $objDbResult = $objDatabase->Query($strCadeSqlx);

    $arrDatoRepo = array();
    while ($mixRegiProc = $objDbResult->FetchArray()) {
        $arrDatoRepo[] = array(
            $mixRegiProc['nume_guia'],
            $mixRegiProc['fech_guia'],
            $mixRegiProc['esta_orig'].'-'.$mixRegiProc['esta_dest'],
            substr($mixRegiProc['nomb_remi'],0,22),
            $mixRegiProc['codi_ckpt'],
            $mixRegiProc['fech_ckpt'],
            $mixRegiProc['hora_ckpt'],
            $mixRegiProc['esta_ckpt'],
            $mixRegiProc['dias_tran']
        );
    }

    $intCantRepo = count($arrDatoRepo);
    if ($intCantRepo) {
        $arrDatoRepo = ordenar_array($arrDatoRepo,'8',SORT_DESC);
        $strNombArch = 'guias_er_sin_ok_'.$objSucursal->CodiEsta.'.xls';
        $mixManeArch = fopen($strNombArch,'w');
        $strTituRepo = 'Guias con ER sin OK +24hrs ('.$objSucursal->CodiEsta.')';
        $arrEncaDato = array(
            'Nro Guia',
            'Fecha',
            'Orig-Dest',
            'Remitente',
            'Ult. Ckpt',
            'F. Ckpt',
            'H. Ckpt',
            'S. Ckpt',
            'D. Tran'
        );

        $objValoRepo = new stdClass();
        $objValoRepo->arrEncaDato = $arrEncaDato;
        $objValoRepo->arrDatoExpo = $arrDatoRepo;
        $objValoRepo->strTituRepo = $strTituRepo;
        $objValoRepo->blnConxBord = false;
        $objValoRepo->strFormExpo = 'XLS';
        $objExpoDato = new ExportarDatos($objValoRepo);
        $strTextMens = $objExpoDato->Exportar();

        fputs($mixManeArch,$strTextMens);
        fclose($mixManeArch);
        //--------------------------------
        // Envio el reporte por e-mail
        //--------------------------------
        $mail = new PHPMailer();
        $mail->setFrom('SisCO@libertyexpress.com', 'Medicion y Control');
        $arrDireMail = explode(',',$objSucursal->DireMail);
        foreach ($arrDireMail as $strDireMail) {
            $mail->addAddress($strDireMail);
        }
        $arrDirePpal = explode(',',$objSucursal->DireMailPrincipal);
        foreach ($arrDireMail as $strDireMail) {
            $mail->addAddress($strDireMail);
        }
        $mail->addAddress('aalvarado@libertyexpress.com');
        $mail->addAddress('emontilla@libertyexpress.com');
        $mail->addAddress('incidencias@libertyexpress.com');
        $mail->addAddress('calidadyservicio@libertyexpress.com');
        $mail->Subject  = $strTituRepo;
        $mail->Body     = 'Estimado Usuario, sirvase revisar el documento anexo...';
        $mail->addAttachment($strNombArch);
        if(!$mail->send()) {
            echo "Message was not sent.\n";
            echo "Mailer error: " . $mail->ErrorInfo."\n";
        }
    }
    GrabarMedicion($objSucursal->CodiEsta,"ER_SIN_OK_24",$intCantRepo);
}
?>