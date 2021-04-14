<?php
//----------------------------------------------------------------------------------
// Programa      : repo_ar_sin_ok_48_rpt.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 24/10/2017
// Descripcion   : Este programa genera una lista de las guías que llegaron a su
//                 destino y que no han sido entregadas en un periodo de 48 horas.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/mimemail.inc.php');
require_once(__APP_INCLUDES__.'/mygrafclasspdf.php');
require_once(__APP_INCLUDES__.'/colores.php');

echo 1;
// require_once('../util/includes/config.php');
// require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
// require_once('../util/includes/mimemail.inc.php');
// require_once('../util/includes/funciones.php');
// require_once('/appl/lib/repo_factura_pdf.php');
//-------------------------------------------------------
// Identifico los logos y el nombre de la Empresa
//-------------------------------------------------------
$objParametro = Parametro::Load('88888','logos');
$strLogoComp = '';
$objParametro = Parametro::Load('88888','datfisc');
$strNombEmpr = $objParametro->ParaTxt1;
$strDireEmpr = $objParametro->ParaTxt5;
echo 2;
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
	$arrSucuSele = Estacion::LoadSucursalesActivasToClients(); //LoadArrayByCodiStat(1);
	$strModoEjec = 'CRON';
}
echo 3;
//-------------------------------
// String de Sucursales activas
//-------------------------------
$strSucuActi = Estacion::StringDeSucursalesActivasToClients();
//--------------------------------------------------------------
// Codigos de Clientes que deben ser excluidos de los reportes
//--------------------------------------------------------------
$strCodiExcl = MasterCliente::CodigosInternosParaExcluir();
echo 4;
foreach ($arrSucuSele as $objSucursal) {
    if ($objSucursal->CodiEsta != 'TODOS') {
        echo 'Procesando: '.$objSucursal->CodiEsta."\n";
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
        $strCadeSqlx .= "   and k.fech_ckpt >= date_sub( now( ), INTERVAL 62 DAY ) ";
        $strCadeSqlx .= "   and k.fech_ckpt < date_sub( now( ), INTERVAL 2 DAY ) ";
		$strCadeSqlx .= "   and g.esta_dest = '".$objSucursal->CodiEsta."'";
		$strCadeSqlx .= "   and k.codi_esta = g.esta_dest ";
		$strCadeSqlx .= "   and g.esta_ckpt = g.esta_dest ";
		$strCadeSqlx .= "   and g.esta_dest in (".$strSucuActi.") ";
		$strCadeSqlx .= "   and m.codigo_interno not in (".$strCodiExcl.")";
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
        $strCadeSqlx .= "   and k.fech_ckpt >= date_sub( now( ), INTERVAL 62 DAY ) ";
        $strCadeSqlx .= "   and k.fech_ckpt < date_sub( now( ), INTERVAL 2 DAY ) ";
		$strCadeSqlx .= "   and g.esta_dest = '".$objSucursal->CodiEsta."'";
		$strCadeSqlx .= "   and k.codi_esta = g.esta_dest ";
		$strCadeSqlx .= "   and g.esta_ckpt = g.esta_dest ";
		$strCadeSqlx .= "   and g.esta_dest in (".$strSucuActi.") ";
		$strCadeSqlx .= "   and m.codigo_interno not in (".$strCodiExcl.")";
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
		// if (in_array($objSucursal->CodiEsta,array('CCS','BLA','MAR','PZO'))) {
		// if (in_array($objSucursal->CodiEsta,array('PZO'))) {
         //    echo $strCadeSqlx."\n";
        // }
		$objDatabase = Guia::GetDatabase();
		$objDbResult  = $objDatabase->Query($strCadeSqlx);
		//------------------------------------------
		// Proceso los Documentos seleccionados
		//------------------------------------------
		$arrDatoRepo = array();
		while ($mixRegi = $objDbResult->FetchArray()) {
		    echo "Procesando Guia Nro: ".$mixRegi['nume_guia']."\n";
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
		    echo "Voy a enviar el reporte...\n";
			//------------------------------------------------------------------
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
				$arrDestCorr = array();
				$arrDireMail = explode(',',$objSucursal->DireMail);
				foreach ($arrDireMail as $strDireMail) {
					array_push($arrDestCorr,$strDireMail);
				}
				$to = $arrDestCorr;
				$to = 'danydurand@gmail.com';

				$attach = $strNombArch;
				$mimemail = new MIMEMAIL('plain/text');
				$mimemail->senderName = 'LibertyExpress';
				$mimemail->senderMail = 'localhost@app-libertyexpress.com';
				$mimemail->subject = $strTituRepo;
				$mimemail->body = '';
				$mimemail->attachments[] = $attach;
				$mimemail->create();
				if ($strEnviMail == 'S') {
					$mimemail->send($to);
					echo "Reporte enviado...\n";
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
}
echo "Termine.\n";
?>