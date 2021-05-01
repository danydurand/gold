<?php
//--------------------------------------------------------------------------------
// Programa      : repo_tiem_tran.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 01/04/2018
// Descripcion   : Este programa emite un listado que muestra el promedio de dias
//                 que transcurren las piezas en cada etapa del proceso, desde
//                 que se recibe hasta que se entrega
//--------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once('/appl/lib/fecha.php');
require_once(__APP_INCLUDES__.'/lib/mygrafclasspdf.php');
require_once(__APP_INCLUDES__.'/lib/colores.php');
use PHPMailer\PHPMailer\PHPMailer;

//-------------------------------------------------------
// Identifico los logos y el nombre de la Empresa
//-------------------------------------------------------
$objParametro = Parametro::Load('88888','logos');
$strLogoComp = '../'.$objParametro->ParaTxt1;
$objParametro = Parametro::Load('88888','datfisc');
$strNombEmpr = $objParametro->ParaTxt1;
$strDireEmpr = $objParametro->ParaTxt5;
//------------------------------------------------------------------
// Criterios de seleccion de registros
//------------------------------------------------------------------
if ($_SESSION['FechInic']) {
	//-----------------------------------------------
	// El reporte se esta invocando desde una opcion
	// del Menu del Sistema
	//-----------------------------------------------
	$dttFechInic   = unserialize($_SESSION['FechInic']);
	$dttFechFina   = unserialize($_SESSION['FechFina']);
	$arrSucuEmpr[] = Estacion::LoadByCodiEsta(unserialize($_SESSION['CodiEsta']));
	if (isset($_SESSION['NumeGuia'])) {
		$strNumeGuia = unserialize($_SESSION['NumeGuia']);
	}
	$strModoEjec   = 'MENU';
} else {
	//----------------------------------------------------------------
	// El reporte se esta invocando desde cron (ejecucion en batch)
	//----------------------------------------------------------------
	$dttFechDhoy = date('Y-m-d');
	$dttFechInic = SumaRestaDiasAFecha($dttFechDhoy,30,'-');
	$dttFechFina = SumaRestaDiasAFecha($dttFechDhoy,1,'-');
    $arrSucuSele = Estacion::LoadSucursalesActivasSinAlmacenes();
	$strModoEjec = 'CRON';
}
//------------------------------------------
// Proceso una por una las Sucursales
//------------------------------------------
foreach ($arrSucuEmpr as $objSucursal) {
	$intDocuSucu = 0;
	//----------------------------------------------------------
	// Inicializo el vector de tiempos de transito de Sucursal
	//----------------------------------------------------------
	$arrTiemSucu['P1'] = 0;
	$arrTiemSucu['P2'] = 0;
	$arrTiemSucu['P3'] = 0;
	$arrTiemSucu['P4'] = 0;
	$arrTiemSucu['P5'] = 0;
	//-------------------------------------------------------
	// Busco las guias que esten en el rango especificado
	// que pertenezcan a la Sucursal que se esta procesando
	//-------------------------------------------------------
	$arrDatoRepo   = array();
	$objClausula   = QQ::Clause();
	$objClausula[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$dttFechInic);
	$objClausula[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$dttFechFina);
	$objClausula[] = QQ::Equal(QQN::Guia()->EstaDest,$objSucursal->CodiEsta);
	$objClausula[] = QQ::NotIn(QQN::Guia()->EstaDest,array('TODOS','EXP'));
	$objClausula[] = QQ::Equal(QQN::Guia()->CodiCkpt,'OK');
	$objClausula[] = QQ::Equal(QQN::Guia()->Anulada,0);
	if (isset($_SESSION['NumeGuia'])) {
		$objClausula[] = QQ::Equal(QQN::Guia()->NumeGuia,$strNumeGuia);
	}
	$arrDocuSucu = Guia::QueryArray(QQ::AndCondition($objClausula),QQ::Clause(QQ::OrderBy(QQN::Guia()->FechGuia,false)));
	//	echo "Sucursal: ".$objSucursal->CodiEsta."  Cantidad: ".count($arrDocuSucu)."\n";
	if ($arrDocuSucu) {
		foreach ($arrDocuSucu as $objGuia) {
			//-----------------------------------------------------------------------
			// Calculo el tiempo de transito de cada etapa del proceso
			//-----------------------------------------------------------------------
			$strUltiCkpt = $objGuia->CodiCkpt;
			if (strlen($strUltiCkpt) > 0) {
				$arrTiemSucu['P1'] += TiempoTransito($objGuia,'PU','TR');
				$arrTiemSucu['P2'] += TiempoTransito($objGuia,'TR','AR');
				$arrTiemSucu['P3'] += TiempoTransito($objGuia,'AR','AV');
				$arrTiemSucu['P4'] += TiempoTransito($objGuia,'AV','ER');
				$arrTiemSucu['P5'] += TiempoTransito($objGuia,'ER','OK');
			}
			$intDocuSucu++;
		}
		if ($intDocuSucu > 0) {
			//----------------------------------------------------------------------
			// Hasta este punto, los vectores estan cargados con la sumatoria
			// de los dias, de cada etapa, de cada pieza procesada.
			// Sin embargo, lo que se desea es representar el promedio de dichos
			// tiempos; por lo tanto, esos numeros deben divirse entre la cantidad
			// de guias procesadas
			//----------------------------------------------------------------------
			$arrTiemSucu['P1'] /= $intDocuSucu;
			$arrTiemSucu['P2'] /= $intDocuSucu;
			$arrTiemSucu['P3'] /= $intDocuSucu;
			$arrTiemSucu['P4'] /= $intDocuSucu;
			$arrTiemSucu['P5'] /= $intDocuSucu;
		}
		//-------------------------------------------
		// Armo el vector que ira a la rutina PDF
		//-------------------------------------------
		$arrDatoReco = array();
		$arrDatoReco[] = array('Sucursal',$objSucursal->__toString());
		$arrDatoReco[] = array('Guias Entregadas',$intDocuSucu);
		$arrDatoReco[] = array('(P1) PickUp - Traslado',nf($arrTiemSucu['P1']));
		$arrDatoReco[] = array('(P2) Traslado - Arribo',nf($arrTiemSucu['P2']));
		$arrDatoReco[] = array('(P3) Arribo - Auditoria',nf($arrTiemSucu['P3']));
		$arrDatoReco[] = array('(P4) Auditoria - En Ruta',nf($arrTiemSucu['P4']));
		$arrDatoReco[] = array('(P5) En Ruta - Entregada',nf($arrTiemSucu['P5']));
		$intSumaTota = array_sum($arrTiemSucu);
		$arrDatoReco[] = array('Tiempo Promedio Total (en dias)',nf($intSumaTota));

		if ($strModoEjec == 'CRON') {
			GrabarMedicion($objSucursal->CodiEsta,"PU_TR",$arrTiemSucu['P1']);
			GrabarMedicion($objSucursal->CodiEsta,"TR_AR",$arrTiemSucu['P2']);
			GrabarMedicion($objSucursal->CodiEsta,"AR_AV",$arrTiemSucu['P3']);
			GrabarMedicion($objSucursal->CodiEsta,"AV_ER",$arrTiemSucu['P4']);
			GrabarMedicion($objSucursal->CodiEsta,"ER_OK",$arrTiemSucu['P5']);
		}

		//-----------------------------
		// Armo el vector de colores
		//-----------------------------
		for ($intIndiColo = 0; $intIndiColo <= 4; $intIndiColo++) {
			$arrColoMoti[] = $colores[$intIndiColo];
		}

		//------------------------------------------------------
		// Armo los otros vectores que requiere la rutina PDF
		//------------------------------------------------------
		$arrEncaReco = array('Item','Descripcion/Valor');
		$arrJustColu = array('L','C');
		$arrAnchColu = array('60','50');
		//-------------------------------------------------------
		// Identifico los logos y el nombre de la Empresa
		//-------------------------------------------------------
		$objParametro = Parametro::Load('88888','logos');
		$strLogoComp = '../'.$objParametro->ParaTxt1;
		$objParametro = Parametro::Load('88888','datfisc');
		$strempresa = $objParametro->ParaTxt1;
		$strdireccion = $objParametro->ParaTxt5;
		$strNombArch = 'TT_'.$objSucursal->CodiEsta.'_del_'.$dttFechInic.'_al_'.$dttFechFina.'.pdf';
		$strTituRepo = 'TT_'.$objSucursal->CodiEsta.'_del_'.$dttFechInic.'_al_'.$dttFechFina;
		//----------------------------------------------------------------------
		// Finalmente invoco la Rutina PDF con todos los parametros necesarios
		//----------------------------------------------------------------------
		$pdf=new mygraf('L','mm','Letter');
		$pdf->setVariables($arrEncaReco,$arrJustColu,$arrAnchColu,5,$strLogoComp);
		$pdf->setEmpresa($strempresa,$strdireccion,sprintf('Tiempos de Transito (del %s al %s)',$dttFechInic,$dttFechFina));
		$pdf->SetTitle(sprintf('Tiempos de Transito (del %s al %s)',$dttFechInic,$dttFechFina));
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->FancyTable($arrEncaReco,$arrDatoReco,$arrAnchColu,$arrJustColu);
		$pdf->setXY(135,40);
		$pdf->PieChart(150,40,$arrTiemSucu,'%l (%p)',$arrColoMoti);
		if ($strModoEjec == 'MENU') {
			$pdf->Output();
		} else {
			$pdf->Output($strNombArch);
			//------------------------------------------------------------------------------------------------
			// La maquina del laboratorio no tiene habilitado el Sendmail por lo tanto se creo un parametro
			// que le dice al programa si debe o no enviar el e-mail
			//------------------------------------------------------------------------------------------------
			$strEnviMail = BuscarParametro('EnviMail','MailSino',"Txt1","S");
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
	}
}



function TiempoTransito($objGuia,$strPrimCkpt,$strSeguCkpt) {
	//---------------------------------------------------------------------
	// Esta rutina devulve al punto de su invocacion, la cantidad
	// de dias que pasaron entre un checkpoint y otro de una pieza dada
	//---------------------------------------------------------------------
	$objPrimCkpt = $objGuia->UltimoCheckpointEspecifico($strPrimCkpt);
	$objSeguCkpt = $objGuia->UltimoCheckpointEspecifico($strSeguCkpt);
	if ($objPrimCkpt && $objSeguCkpt) {
		return diasHabilesTranscurridos($objSeguCkpt->FechCkpt->__toString("YYYY-MM-DD"),$objPrimCkpt->FechCkpt->__toString("YYYY-MM-DD"));
	} else {
		return 1;
	}
}

?>
