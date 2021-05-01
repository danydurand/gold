<?php
//--------------------------------------------------------------------------------
// Programa      : repo_ar_sin_ok_48.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 01/04/2018
// Descripcion   : Este programa genera un documento PDF de un reporte, el cual
//                 muestra un listado de todas las guias o piezas, los cuales
//                 contienen seguimiento de los estados de los procesos auditados
//                 a partir de "AR" en adelante menos "OK" en las ultimas 48 Horas.
//--------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once('/appl/lib/repo_factura_pdf.php');
use PHPMailer\PHPMailer\PHPMailer;

//-------------------------------------------------------
// Identifico los logos y el nombre de la Empresa
//-------------------------------------------------------
$objParametro = Parametro::Load('88888','logos');
$strLogoComp = '';
$objParametro = Parametro::Load('88888','datfisc');
$strNombEmpr = $objParametro->ParaTxt1;
$strDireEmpr = $objParametro->ParaTxt5;
//------------------------------------------------------------------
// Criterios de seleccion de registros
//------------------------------------------------------------------

if (isset($_SESSION['SucuSele'])) {
	$arrSucuSele[] = Estacion::LoadByCodiEsta(unserialize($_SESSION['SucuSele']));
	$strModoEjec   = 'MENU';
}  else {
	//----------------------------------------------------------------
	// El reporte se esta invocando desde cron (ejecucion en batch)
	//----------------------------------------------------------------
	$dttFechDhoy = date('Y-m-d');
    $arrSucuSele = Estacion::LoadSucursalesActivasSinAlmacenes();
	$strModoEjec = 'CRON';
}
foreach ($arrSucuSele as $objSucursal) {
    /**
     * @var $objSucursal Estacion
     */
    $strNombArch = 'guias_ar_sin_ok_48_'.$objSucursal->CodiEsta.'.pdf';
    $strTituRepo = 'Guias con AR sin Ok +48 Hrs '.$objSucursal->CodiEsta;
    //--------------------------------------------------------
    // Selecciono los registros que satisfagan la condicion
    //--------------------------------------------------------
    $strCadeSqlx  = "select distinct g.*, k.fech_ckpt FechArri";
    $strCadeSqlx .= "  from guia g, guia_ckpt k, master_cliente m";
    $strCadeSqlx .= " where g.nume_guia = k.nume_guia";
    $strCadeSqlx .= "   and g.codi_clie = m.codi_clie";
    $strCadeSqlx .= "   and k.codi_ckpt = 'AR'";
    $strCadeSqlx .= "   and k.fech_ckpt < date_sub( now( ), INTERVAL 2 DAY ) ";
    $strCadeSqlx .= "   and k.fech_ckpt >= date_sub( now( ), INTERVAL 62 DAY ) ";
    $strCadeSqlx .= "   and g.esta_dest = '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "   and k.codi_esta = g.esta_dest ";
    $strCadeSqlx .= "   and g.esta_ckpt = g.esta_dest ";
    $strCadeSqlx .= "   and g.esta_dest not in ('TODOS','EXP') ";
    $strCadeSqlx .= "   and g.anulada   = 0 ";
    $strCadeSqlx .= "   and not exists (select *";
    $strCadeSqlx .= "                     from sde_checkpoint";
    $strCadeSqlx .= "                    where sde_checkpoint.codi_ckpt = g.codi_ckpt ";
    $strCadeSqlx .= "                      and sde_checkpoint.tipo_term = 1)";
    $strCadeSqlx .= "union ";
    $strCadeSqlx .= "select distinct g.*, k.fech_ckpt FechArri";
    $strCadeSqlx .= "  from guia g, guia_ckpt k, master_cliente m";
    $strCadeSqlx .= " where g.nume_guia = k.nume_guia";
    $strCadeSqlx .= "   and g.codi_clie = m.codi_clie";
    $strCadeSqlx .= "   and k.codi_ckpt = 'AR'";
    $strCadeSqlx .= "   and k.fech_ckpt < date_sub( now( ), INTERVAL 2 DAY ) ";
    $strCadeSqlx .= "   and k.fech_ckpt >= date_sub( now( ), INTERVAL 62 DAY ) ";
    $strCadeSqlx .= "   and g.esta_dest = '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "   and k.codi_esta = g.esta_dest ";
    $strCadeSqlx .= "   and g.esta_ckpt = g.esta_dest ";
    $strCadeSqlx .= "   and g.esta_dest not in ('TODOS','EXP') ";
    $strCadeSqlx .= "   and g.anulada   = 0 ";
    $strCadeSqlx .= "   and not exists (select *";
    $strCadeSqlx .= "                     from sde_checkpoint";
    $strCadeSqlx .= "                    where sde_checkpoint.codi_ckpt = g.codi_ckpt ";
    $strCadeSqlx .= "                      and sde_checkpoint.tipo_term = 1)";
    $strCadeSqlx .= "   and exists (select *";
    $strCadeSqlx .= "                 from guia_ckpt k ";
    $strCadeSqlx .= "                where k.nume_guia = g.nume_guia ";
    $strCadeSqlx .= "                  and k.codi_ckpt = 'TR')";
    $strCadeSqlx .= "   and exists (select *";
    $strCadeSqlx .= "                 from guia_ckpt k ";
    $strCadeSqlx .= "                where k.nume_guia = g.nume_guia ";
    $strCadeSqlx .= "                  and k.codi_ckpt = 'PP')";

    $objDatabase = Guia::GetDatabase();
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    //------------------------------------------
    // Proceso los Documentos seleccionados
    //------------------------------------------
    $arrDatoRepo = array();
    while ($mixRegi = $objDbResult->FetchArray()) {
        //-----------------------------------------------------
        // Se excluyen los Sabados, Domingos y Feriados
        //-----------------------------------------------------
        $intDiasHabi = diasHabilesTranscurridos(FechaDeHoy(),$mixRegi['FechArri']);
        if ($intDiasHabi > 2) {
            //-----------------------------
            // Datos que van al reporte
            //-----------------------------
            $arrDatoRepo[] = array(
            $mixRegi['nume_guia'],
            $mixRegi['esta_orig'].'-'.$mixRegi['esta_dest'],
            $mixRegi['fech_guia'],
            substr($mixRegi['nomb_remi'],0,22),
            substr($mixRegi['nomb_dest'],0,22),
            substr($mixRegi['obse_ckpt'],0,28),
            $mixRegi['fech_ckpt'],
            $mixRegi['hora_ckpt'],
            $mixRegi['esta_ckpt'],
            $intDiasHabi);
        }
    }
    if (count($arrDatoRepo)) {
        $intCantRepo = count($arrDatoRepo);
        if ($strModoEjec == 'CRON') {
            GrabarMedicion($objSucursal->CodiEsta,"AR_SIN_OK_48",$intCantRepo);
        }
        //---------------------------------------------------------
        // Armo los otros vectores que requiere la rutina PDF
        //---------------------------------------------------------
        $arrEncaReco = array('Guia','Ori-Des','Fecha','Remitente','Destinatario','Ult Ckpt','Fec Ckpt','Hora Ckpt','SUC','Dias');
        $arrJustColu = array('C','C','C','L','L','L','C','C','C','C');
        $arrAnchColu = array(15,18,18,48,48,58,20,15,12,10);
        //---------------------------------------------------------
        // Genero el tipo de reporte solicitado por el Usuario
        //---------------------------------------------------------
        $arrDatoRepo = ordenar_array($arrDatoRepo,'9',SORT_DESC);
        //-----------------------------
        // Genero el reporte solicitado
        //-----------------------------
        $pdf=new PDF('L','mm','Letter');
        $pdf->setVariables($arrEncaReco,$arrJustColu,$arrAnchColu,02,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->SetTitle('Guias con AR sin Ok +48 Hrs');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaReco,$arrDatoRepo,$arrAnchColu,$arrJustColu);
        if ($strModoEjec == 'MENU') {
            $pdf->Output();
        } else {
            $pdf->Output($strNombArch);
            //----------------------------------------------------------------
            // La maquina del laboratorio no tiene habilitado el Sendmail
            // por lo tanto se creo un parametro que le dice al programa
            // si debe o no enviar el e-mail
            //----------------------------------------------------------------
            $strEnviMail = BuscarParametro('EnviMail','MailSino',"Txt1","S");
            //--------------------------------
            // Envio el reporte por e-mail
            //--------------------------------
            $mail = new PHPMailer();
            $mail->setFrom('SisCO@goldsist.com', 'Medicion y Control');
            $arrDireMail = explode(',',$objSucursal->DireMail);
            foreach ($arrDireMail as $strDireMail) {
                $mail->addAddress($strDireMail);
            }
            $arrDirePpal = explode(',',$objSucursal->DireMailPrincipal);
            foreach ($arrDireMail as $strDireMail) {
                $mail->addAddress($strDireMail);
            }
            $mail->addAddress('aalvarado@goldsist.com');
            $mail->addAddress('emontilla@goldsist.com');
            $mail->addAddress('incidencias@goldsist.com');
            $mail->addAddress('calidadyservicio@goldsist.com');
            $mail->Subject  = $strTituRepo;
            $mail->Body     = 'Estimado Usuario, sirvase revisar el documento anexo...';
            $mail->addAttachment($strNombArch);
            if(!$mail->send()) {
                echo "Message was not sent.\n";
                echo "Mailer error: " . $mail->ErrorInfo."\n";
            }
        }
    } else {
        if ($strModoEjec == 'MENU') {
            echo "<h1> No existen Datos para la Sucursal: ".$objSucursal->CodiEsta."</h1>";
        } else {
            GrabarMedicion($objSucursal->CodiEsta,"AR_SIN_OK_48",0);
        }
    }
}

?>