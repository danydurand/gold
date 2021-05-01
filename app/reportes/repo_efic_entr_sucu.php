<?php
//--------------------------------------------------------------------------------
// Programa      : repo_efic_entr_sucu.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 02/04/2018
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
$strLogoComp = '';
$objParametro = Parametro::Load('88888','datfisc');
$strNombEmpr = $objParametro->ParaTxt1;
$strDireEmpr = $objParametro->ParaTxt5;
//------------------------------------------------------------------
// Criterios de seleccion de registros
//------------------------------------------------------------------
$dttFechDhoy = FechaDeHoy();
if ($_SESSION['FechInic']) {
    $dttFechInic = unserialize($_SESSION['FechInic']);
    $dttFechFina = unserialize($_SESSION['FechFina']);
    if (isset($_SESSION['SucuSele'])) {
        $arrSucuSele[] = Estacion::LoadByCodiEsta(unserialize($_SESSION['SucuSele']));
    } else {
        $arrSucuSele = Estacion::LoadSucursalesActivasSinAlmacenes();
    }
    $strModoEjec   = 'MENU';
}  else {
    //----------------------------------------------------------------
    // El reporte se esta invocando desde cron (ejecucion en batch)
    //----------------------------------------------------------------
    $dttFechDhoy = date('Y-m-d');
    $dttFechInic = SumaRestaDiasAFecha($dttFechDhoy,30,'-');
    $dttFechFina = SumaRestaDiasAFecha($dttFechDhoy,13,'-');
    $arrSucuSele = Estacion::LoadSucursalesActivasToClients();
    $strModoEjec = 'CRON';
}

//------------------------------------------
// Proceso una por una las Sucursales
//------------------------------------------
foreach ($arrSucuSele as $objSucursal) {
    $strNombArch = 'efic_en_entr_por_sucu_'.$objSucursal->CodiEsta.'.pdf';
    $strTituRepo = 'Eficiencia en Entrega por sucursal '.$objSucursal->CodiEsta;
    //--------------------------------------------------------
    // Selecciono los registros que satisfagan la condicion
    //--------------------------------------------------------
    $objDatabase = Guia::GetDatabase();

    $strCadeSql3  = "select fecha_pod, count(*) ";
    $strCadeSql3 .= "  from guia g, guia_ckpt k";
    $strCadeSql3 .= " where g.nume_guia = k.nume_guia ";
    $strCadeSql3 .= "   and g.fecha_pod between '$dttFechInic' and '$dttFechFina'";
    $strCadeSql3 .= "   and g.codi_ckpt = 'OK' ";
    $strCadeSql3 .= "   and g.anulada   = 0";
    $strCadeSql3 .= "   and esta_dest   = '".$objSucursal->CodiEsta."'";
    $strCadeSql3 .= " group by 1 ";

    $objDbResult3  = $objDatabase->Query($strCadeSql3);

    while ($mixRegistro3 = $objDbResult3->FetchArray()) {
        $arrDatoRep3[] = array(''.$mixRegistro3[0],''.$mixRegistro3[1]);
    }
    // ----------------------------------------------------------------------------------------------------
    // strCadeSqlx es el query que devolvera la informacion del reporte, guia, estacion, fecha entrega, fecha pod
    // ----------------------------------------------------------------------------------------------------
    $strCadeSqlx  = "select g.nume_guia, g.esta_orig, g.esta_dest, g.nomb_remi, g.nomb_dest, k.fech_ckpt, g.fecha_pod, g.fecha_entrega, g.fech_guia ";
    $strCadeSqlx .= "  from guia g, guia_ckpt k";
    $strCadeSqlx .= " where g.nume_guia = k.nume_guia ";
    $strCadeSqlx .= "   and g.fecha_pod between '$dttFechInic' and '$dttFechFina'";
    $strCadeSqlx .= "   and g.codi_ckpt = 'OK' ";
    $strCadeSqlx .= "   and g.anulada   = 0 ";
    $strCadeSqlx .= "   and esta_dest   = '".$objSucursal->CodiEsta."'";

    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    //------------------------------------------
    // Se inicializan los contadores
    //------------------------------------------
    $intGuiaEntr = 0;
    $intDent24hr = 0;
    $intDent48hr = 0;
    $intDent72hr = 0;
    $intMasd72hr = 0;

    $intGuiaEntr2 = 0;
    $intDent24hr2 = 0;
    $intDent48hr2 = 0;
    $intDent72hr2 = 0;
    $intMasd72hr2 = 0;

    //------------------------------------------
    // Proceso los Documentos seleccionados
    //------------------------------------------
    $arrDatoRepo = array();
    $arrDatoRep1 = array();

    while ($mixRegistro = $objDbResult->FetchArray()) {

        // ----------------------------------------------------------------------------------------------------
        // los siguientes if determinan si las variables que se utilizaran para obtener la efeciciencia contienen datos o no
        // ----------------------------------------------------------------------------------------------------
        if (strlen($mixRegistro['fech_ckpt']) > 0) {
            $intDiasHabi = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistro['fech_ckpt']);
            $blnHabiPick = true;
        } else {
            $intDiasHabi = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistro['fech_guia']);
            $blnHabiPick = false;
        }

        if (strlen($mixRegistro['fecha_entrega']) > 0) {
            $intDiasHabi2 = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistro['fecha_entrega']);
        } else {
            $strCadeSql2  = "select fech_ckpt ";
            $strCadeSql2 .= "  from guia_ckpt ";
            $strCadeSql2 .= "  where nume_guia = '".$mixRegistro['nume_guia']."'";
            $strCadeSql2 .= "    and codi_ckpt = 'OK' ";
            $strCadeSql2 .= "  order by fech_ckpt desc, ";
            $strCadeSql2 .= "           hora_ckpt desc ";
            $strCadeSql2 .= "  limit 1";

            $objDbResulx  = $objDatabase->Query($strCadeSqlx2);
            $mixRegistr1 = $objDbResult->FetchArray();

            $intDiasHabi2 = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistr1['fech_ckpt']);
        }

        // ----------------------------------------------------------------------------------------------------
        // los siguientes switchs modifican los contadores de acuerdo al caso
        // ----------------------------------------------------------------------------------------------------

        switch ($intDiasHabi) {
            case 0:
            case 1:
                ++$intDent24hr;
                break;
            case 2:
                ++$intDent48hr;
                break;
            case 3:
                ++$intDent72hr;
                break;
            default:
                ++$intMasd72hr;
                break;
        }

        switch ($intDiasHabi2) {
            case 0:
            case 1:
                ++$intDent24hr2;
                break;
            case 2:
                ++$intDent48hr2;
                break;
            case 3:
                ++$intDent72hr2;
                break;
            default:
                ++$intMasd72hr2;
                break;
        }

        //-----------------------------------
        // Vector de datos para el reporte
        //-----------------------------------

        if ($blnHabiPick) {
            $strHabiPick = '';
        } else {
            $strHabiPick = '*';
        }

        $objMensPago = BuscarParametro('MensUsua','FormPago',"TODO",0);
        if ($objMensPago == 0) {
            $strMensUnox = '';
        }

        $arrDatoRepo[] = array(
            $mixRegistro['nume_guia'].$strHabiPick,
            $mixRegistro['esta_orig']."-".$mixRegistro['esta_dest'],
            substr($mixRegistro['nomb_remi'],0,20),
            substr($mixRegistro['nomb_dest'],0,20),
            $mixRegistro['fech_ckpt'],
            $mixRegistro['fecha_pod'],
            $intDiasHabi,
            $intDiasHabi2
        );
        ++$intGuiaEntr;
    }

    $arrDatoRepo = ordenar_array($arrDatoRepo,'6',SORT_DESC);

    // ----------------------------------------------------------------------------------------------------
    // si algun contador quedo en cero este pasa a ser uno ya que la libreria no admite ceros en el grafico de torta
    // ----------------------------------------------------------------------------------------------------

    if ($intDent24hr == 0) {
        $intDent24hr = 1;
    }
    if ($intDent48hr == 0) {
        $intDent48hr = 1;
    }
    if ($intDent72hr == 0) {
        $intDent72hr = 1;
    }
    if ($intMasd72hr == 0) {
        $intMasd72hr = 1;
    }

    if ($intDent24hr2 == 0) {
        $intDent24hr2 = 1;
    }
    if ($intDent48hr2 == 0) {
        $intDent48hr2 = 1;
    }
    if ($intDent72hr2 == 0) {
        $intDent72hr2 = 1;
    }
    if ($intMasd72hr2 == 0) {
        $intMasd72hr2 = 1;
    }

    //-----------------------------------------------
    // Datos que van al reporte (tabla resumida)
    //-----------------------------------------------
    $arrDatoRep1[] = array('SUCURSAL',$objSucursal->CodiEsta);
    $arrDatoRep1[] = array('EFICIENCIA 1','PU Vs POD');
    $arrDatoRep1[] = array('EN 24 HRS O MENOS',$intDent24hr);
    $arrDatoRep1[] = array('EN 48 HRS',$intDent48hr);
    $arrDatoRep1[] = array('EN 72 HRS',$intDent72hr);
    $arrDatoRep1[] = array('EN 4 DIAS O MAS',$intMasd72hr);
    $arrDatoRep1[] = array('TOTAL ENTREGAS REALIZADAS',$intGuiaEntr);

    $arrDatoRep1[] = array('','');
    $arrDatoRep1[] = array('EFICIENCIA 2','Fecha Entrega Vs POD');
    $arrDatoRep1[] = array('EN 24 HRS O MENOS',$intDent24hr2);
    $arrDatoRep1[] = array('EN 48 HRS',$intDent48hr2);
    $arrDatoRep1[] = array('EN 72 HRS',$intDent72hr2);
    $arrDatoRep1[] = array('EN 4 DIAS O MAS',$intMasd72hr);
    $arrDatoRep1[] = array('TOTAL ENTREGAS REALIZADAS',$intGuiaEntr);

    //-----------------------------------------------
    // Datos que van al reporte (grafico de torta)
    //-----------------------------------------------
    $arrDatoTort['24hrs'] = $intDent24hr;
    $arrDatoTort['48hrs'] = $intDent48hr;
    $arrDatoTort['72hrs'] = $intDent72hr;
    $arrDatoTort['4d+']   = $intMasd72hr;

    $arrDatoTor1['24hrs_ENT'] = $intDent24hr2;
    $arrDatoTor1['48hrs_ENT'] = $intDent48hr2;
    $arrDatoTor1['72hrs_ENT'] = $intDent72hr2;
    $arrDatoTor1['4d+_ENT']   = $intMasd72hr2;

    if ($strModoEjec == 'CRON') {
        GrabarMedicion($objSucursal->CodiEsta,"OK_24HRS",$intDent24hr);
        GrabarMedicion($objSucursal->CodiEsta,"OK_48HRS",$intDent48hr);
        GrabarMedicion($objSucursal->CodiEsta,"OK_72HRS",$intDent72hr);
        GrabarMedicion($objSucursal->CodiEsta,"OK_4D+",$intMasd72hr);
    }

    //------------------------------------------------
    // Vector de colores para el grafico de torta
    //------------------------------------------------
    for ($intIndiColo = 0; $intIndiColo <= 3; $intIndiColo++) {
        $arrColoMoti[] = $colores[$intIndiColo];
    }
    //------------------------------------------------------
    // Armo los vectores de la lista de Guias
    //------------------------------------------------------
    $arrEncaColu = array('Guia','Ori-Des','Remitente','Destinatario','F.Pick-Up','Fecha POD','Dias', 'Dias Entr');
    $arrJustColu = array('C','C','L','L','C','C','C', ' C');
    $arrAnchColu = array(17,18,48,48,20,20,10,15);
    //----------------------
    // Inicio el reporte
    //----------------------
    $pdf=new mygraf('L','mm','Letter');
    $pdf->setVariables($arrEncaColu,$arrJustColu,$arrAnchColu,40,$strLogoComp);
    $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
    $pdf->SetTitle('Eficiencia en Entrega por Sucursal');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->FancyTable($arrEncaColu,$arrDatoRepo,$arrAnchColu,$arrJustColu);
    //---------------------------------------------------------
    // Armo los otros vectores que requiere la rutina PDF
    //---------------------------------------------------------
    $arrEncaColu = array('ITEM','VALOR');
    $arrJustColu = array('L','C');
    $arrAnchColu = array(60,50);
    //-----------------------------
    // Genero el reporte solicitado
    //-----------------------------
    $pdf->AddPage();
    $pdf->setVariables($arrEncaColu,$arrJustColu,$arrAnchColu,02,$strLogoComp);
    $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
    $pdf->SetTitle('Resumen de la Eficiciencia en la Entrega');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->FancyTable($arrEncaColu,$arrDatoRep1,$arrAnchColu,$arrJustColu);
    $pdf->setXY(135,40);
    $pdf->PieChart(150,40,$arrDatoTort,'%l (%p)',$arrColoMoti);
    $pdf->setXY(135,90);
    $pdf->PieChart(150,40,$arrDatoTor1,'%l (%p)',$arrColoMoti);

    // ----------------------------------------------------------------------------------------------------
    // armo el arreglo que mostrara la cantidad de guias entregadas cada dia dentro del rango de fechas dado
    // ----------------------------------------------------------------------------------------------------
    $arrEncaColu = array('Fecha','Guias Entregadas');
    $arrJustColu = array('C','C');
    $arrAnchColu = array(60,50);
    //-----------------------------
    // Genero el reporte solicitado
    //-----------------------------
    $pdf->AddPage();
    $pdf->setVariables($arrEncaColu,$arrJustColu,$arrAnchColu,02,$strLogoComp);
    $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->FancyTable($arrEncaColu,$arrDatoRep3,$arrAnchColu,$arrJustColu);

    if ($strModoEjec == 'MENU') {
        $pdf->Output();
    } else {
        $pdf->Output($strNombArch);
        //--------------------------------
        // Envio el reporte por e-mail
        //--------------------------------
        $mail = new PHPMailer();
        $mail->setFrom('SisCO@goldsist.com', 'Medicion y Control');
        //if ($objSucursal->CodiEsta == 'CCS') {
        //    $mail->addAddress('soporte@lufemansoftware.com');
        //}
        $mail->addAddress('aalvarado@goldsist.com');
        $mail->addAddress('emontilla@goldsist.com');
        $mail->Subject  = $strTituRepo;
        $mail->Body     = 'Estimado Usuario, sirvase revisar el documento anexo...';
        $mail->addAttachment($strNombArch);
        if(!$mail->send()) {
            echo "Message was not sent.\n";
            echo "Mailer error: " . $mail->ErrorInfo."\n";
        }
    }
}
?>
