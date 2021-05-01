<?php
//----------------------------------------------------------------------------------
// Programa      : repo_guias_cmail.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 03/04/2018
// Descripcion   : Este programa genera una lista de las guías de correspondencia
//                 interna de la Empresa por Sucursal.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once('/appl/lib/repo_factura_pdf.php');
use PHPMailer\PHPMailer\PHPMailer;

//--------------------------------------
// Identifico el nombre de la Empresa
//--------------------------------------
$objParaData = Parametro::Load('88888','datfisc');
$strNombEmpr = $objParaData->ParaTxt1;
$strDireEmpr = $objParaData->ParaTxt5;
//---------------------------------------
// Criterios de seleccion de registros
//---------------------------------------
$dttFechDhoy = date('Y-m-d');
$arrSucuSele = Estacion::LoadSucursalesActivasSinAlmacenes();
//---------------------------------------
// Se procesan una a una las Sucursales
//---------------------------------------
foreach ($arrSucuSele as $objSucursal) {
    if (!in_array($objSucursal->CodiEsta, array('CCS','VLN','MAR'))) {
        continue;
    }
    $strNombArch = 'guias_cmail_'.$objSucursal->CodiEsta.'.pdf';
    $strTituRepo = 'Guias CMAIL con Origen '.$objSucursal->CodiEsta;
    //--------------------------------------------------------
    // Selecciono los registros que satisfagan la condicion
    //--------------------------------------------------------
    $strCadeSqlx  = "select distinct g.*, k.fech_ckpt FechTras";
    $strCadeSqlx .= "  from guia g, guia_ckpt k";
    $strCadeSqlx .= " where g.nume_guia = k.nume_guia";
    $strCadeSqlx .= "   and g.codi_clie = 948";   // Codigo del Cliente C-Mail
    $strCadeSqlx .= "   and k.codi_ckpt = 'TR'";
    $strCadeSqlx .= "   and k.fech_ckpt >= date_sub( now( ), INTERVAL 60 DAY ) ";
    $strCadeSqlx .= "   and g.esta_orig = '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "   and k.codi_esta = g.esta_orig ";
    $strCadeSqlx .= "   and g.esta_ckpt = g.esta_orig ";
    $strCadeSqlx .= "   and g.anulada   = 0 ";
    $strCadeSqlx .= "   and not exists (select *";
    $strCadeSqlx .= "                     from sde_checkpoint";
    $strCadeSqlx .= "                    where sde_checkpoint.codi_ckpt = g.codi_ckpt ";
    $strCadeSqlx .= "                      and sde_checkpoint.tipo_term = 1)";
    $objDatabase = Guia::GetDatabase();
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    //------------------------------------------
    // Proceso los registros seleccionados
    //------------------------------------------
    $arrDatoRepo = array();
    while ($mixRegi = $objDbResult->FetchArray()) {
        $arrDatoRepo[] = array(
        $mixRegi['nume_guia'],
        $mixRegi['esta_orig'].'-'.$mixRegi['esta_dest'],
        $mixRegi['fech_guia'],
        substr($mixRegi['nomb_remi'],0,22),
        substr($mixRegi['nomb_dest'],0,22),
        substr($mixRegi['obse_ckpt'],0,28),
        $mixRegi['fech_ckpt'],
        $mixRegi['hora_ckpt'],
        $mixRegi['esta_ckpt']
        );
    }
    $intCantRepo = count($arrDatoRepo);
    if ($intCantRepo > 0) {
        GrabarMedicion($objSucursal->CodiEsta,"CMAIL",$intCantRepo);
        //---------------------------------------------------------
        // Armo los otros vectores que requiere la rutina PDF
        //---------------------------------------------------------
        $arrEncaReco = array('Guia','Ori-Des','Fecha','Remitente','Destinatario','Ult Ckpt','Fec Ckpt','Hora Ckpt','SUC');
        $arrJustColu = array('C','C','C','L','L','L','C','C','C');
        $arrAnchColu = array(15,18,18,48,48,58,20,15,12);
        //-------------------------------
        // Genero el reporte solicitado
        //-------------------------------
        $pdf=new PDF('L','mm','Letter');
        $pdf->setVariables($arrEncaReco,$arrJustColu,$arrAnchColu,02,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->SetTitle('Guias CMAIL');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaReco,$arrDatoRepo,$arrAnchColu,$arrJustColu);
        if ($strModoEjec == 'MENU') {
            $pdf->Output();
        } else {
            $pdf->Output($strNombArch);
            //-------------------------------------------------------------------------------------
            // La maquina del laboratorio no tiene habilitado el Sendmail por lo tanto se creo un
            // parametro que le dice al programa si debe o no enviar el e-mail
            //-------------------------------------------------------------------------------------
            $strEnviMail = BuscarParametro('EnviMail','MailSino',"Txt1","S");
            //--------------------------------
            // Envio el reporte por e-mail
            //--------------------------------
//				$to = array('rortega@goldsist.com','pmelendez@goldsist.com');

            $arrDestCorr = array();
            $arrDireMail = explode(',',$objSucursal->DireMail);
            foreach ($arrDireMail as $strDireMail) {
                array_push($arrDestCorr,$strDireMail);
            }
            $strDireMail = $arrDestCorr;

            $mail = new PHPMailer();
            $mail->setFrom('SisCO@goldsist.com', 'Medicion y Control');
            //$mail->addAddress('soporte@lufemansoftware.com');
            $mail->Subject  = $strTituRepo;
            $mail->Body     = 'Estimado Usuario, sírvase revisar el documento anexo...';
            $mail->addAttachment($strNombArch);
            if(!$mail->send()) {
                echo "Message was not sent.\n";
                echo "Mailer error: " . $mail->ErrorInfo."\n";
            }
        }
    } else {
        GrabarMedicion($objSucursal->CodiEsta,"CMAIL",0);
    }
}
?>
