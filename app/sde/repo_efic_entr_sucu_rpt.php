<?php
//------------------------------------------------
// Programa      : repo_efic_entr_sucu_rpt.php
// Realizado por : Iran Anzola
// Fecha Elab.   : 08/05/2017
//------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/mimemail.inc.php');
require_once(__APP_INCLUDES__.'/mygrafclasspdf.php');
require_once(__APP_INCLUDES__.'/colores.php');

t('==============================================');
t('Entrando al reporte de Eficiencia por Sucursal');
//-----------------------------------------------------
// Se identifican los logos y el nombre de la Empresa
//-----------------------------------------------------
$strLogoComp = '/var/www/html/newliberty/assets/images/LogoEmpresa.jpg';
$objParametro = Parametro::Load('88888','datfisc');
$strNombEmpr = $objParametro->ParaTxt1;
$strDireEmpr = $objParametro->ParaTxt5;
//--------------------------------------
// Criterios de Selección de Registros
//--------------------------------------
$dttFechDhoy = FechaDeHoy();
//------------------------------------------------
// Se Valida desde dónde es Invocando el Reporte
//------------------------------------------------
if ($_SESSION['FechInic']) {
    //------------------------------------------------
    // El Reporte se está Invocando desde el Sistema
    //------------------------------------------------
    $dttFechInic = unserialize($_SESSION['FechInic']);
    $dttFechFina = unserialize($_SESSION['FechFina']);
    if (isset($_SESSION['SucuSele'])) {
        $arrSucuSele[] = Estacion::LoadByCodiEsta(unserialize($_SESSION['SucuSele']));
    } else {
        $arrSucuSele = Estacion::LoadArrayByCodiStat(1);
    }
    $strModoEjec   = 'MENU';
} else {
    //---------------------------------------------------------------
    // El reporte se esta invocando desde CRON (ejecución en batch)
    //---------------------------------------------------------------
    $dttFechDhoy = date('Y-m-d');
    $dttFechInic = SumaRestaDiasAFecha($dttFechDhoy,30,'-');
    $dttFechFina = SumaRestaDiasAFecha($dttFechDhoy,13,'-');
    $arrSucuSele = Estacion::LoadArrayByCodiStat(1);
    $strModoEjec = 'CRON';
}
//-----------------------------------------
// Se Procesan una por una las Sucursales
//-----------------------------------------
foreach ($arrSucuSele as $objSucursal) {
    if (!in_array($objSucursal->CodiEsta,array('TODOS','EXP','MIA'))) {
        $strNombArch = 'efic_en_entr_por_sucu_'.$objSucursal->CodiEsta.'.pdf';
        $strTituRepo = 'Eficiencia en Entrega por Sucursal '.$objSucursal->CodiEsta;
        //-----------------------------------------------------------
        // Se seleccionan los registros que satisfagan la condición
        //-----------------------------------------------------------
        $objDatabase = Guia::GetDatabase();
        //---------------------------------------------------------------------------------------------------------
        // Se arma el query para obtener la cantidad de Guías entregadas cada día dentro del rango de fechas dado
        //---------------------------------------------------------------------------------------------------------
        $strCadeSql3  = "select fecha_pod, count(*) ";
        $strCadeSql3 .= "  from guia g inner join guia_ckpt k";
        $strCadeSql3 .= "    on g.nume_guia = k.nume_guia ";
        $strCadeSql3 .= " where g.fecha_entrega between '$dttFechInic' and '$dttFechFina'";
        $strCadeSql3 .= "   and k.codi_ckpt = 'OK' ";
        $strCadeSql3 .= "   and g.anulada   = 0";
        $strCadeSql3 .= "   and esta_dest   = '".$objSucursal->CodiEsta."'";
        $strCadeSql3 .= " group by 1 ";
        $objDbResult3  = $objDatabase->Query($strCadeSql3);
        while ($mixRegistro3 = $objDbResult3->FetchArray()) {
            $arrDatoRep3[] = array(''.$mixRegistro3[0],''.$mixRegistro3[1]);
        }
        //--------------------------------------------------------------------------------------------------------
        // Se arma el query para obtener la información de la Guía, la Estación, la Fecha Entrega y la Fecha POD.
        //---------------------------------------------------------------------------------------------------------
        $strCadeSqlx  = "select g.nume_guia, g.esta_orig, g.esta_dest, g.nomb_remi, g.nomb_dest, k.fech_ckpt, ";
        $strCadeSqlx .= "       g.fecha_pod, g.fecha_entrega, g.fech_guia ";
        $strCadeSqlx .= "  from guia g inner join guia_ckpt k";
        $strCadeSqlx .= "    on g.nume_guia = k.nume_guia ";
        $strCadeSqlx .= " where g.fecha_entrega between '$dttFechInic' and '$dttFechFina'";
        $strCadeSqlx .= "   and k.codi_ckpt = 'OK' ";
        $strCadeSqlx .= "   and g.anulada   = 0";
        $strCadeSqlx .= "   and esta_dest   = '".$objSucursal->CodiEsta."'";
        $objDbResult  = $objDatabase->Query($strCadeSqlx);
        //--------------------------------
        // Se inicializan los Contadores
        //--------------------------------
        $intGuiaEntr  = 0;
        $intEntrArri  = 0;

        $intDent24hr  = 0;
        $intDent48hr  = 0;
        $intDent72hr  = 0;
        $intMasd72hr  = 0;

        $intGuiaEntr2 = 0;
        $intDent24hr2 = 0;
        $intDent48hr2 = 0;
        $intDent72hr2 = 0;
        $intMasd72hr2 = 0;

        $intGuiaEntr3 = 0;
        $intDent24hr3 = 0;
        $intDent48hr3 = 0;
        $intDent72hr3 = 0;
        $intMasd72hr3 = 0;
        //-------------------------------------------
        // Se Procesan los Documentos Seleccionados
        //-------------------------------------------
        $arrDatoRepo = array();
        $arrDatoRep1 = array();
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
                if ($objEstaGuia) {
                    if (strlen($objEstaGuia->FechaArribo) > 0) {
                        $strFechArri = $objEstaGuia->FechaArribo->__toString('YYYY-MM-DD');
                    }
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
            //----------------------------------------------------
            // Se Validan y Ajustan los Contadores Según el Caso
            //----------------------------------------------------
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
            if ($strFechArri != 'N/D') {
                switch ($intDiasEfi3) {
                    case 0:
                    case 1:
                        ++$intDent24hr3;
                        break;
                    case 2:
                        ++$intDent48hr3;
                        break;
                    case 3:
                        ++$intDent72hr3;
                        break;
                    default:
                        ++$intMasd72hr3;
                        break;
                }
                ++$intEntrArri;
            }
            //----------------------------------
            // Vector de Datos para el Reporte
            //----------------------------------
            $objMensPago = BuscarParametro('MensUsua','FormPago',"TODO",0);
            if ($objMensPago == 0) {
                $strMensUnox = '';
            }
            $arrDatoRepo[] = array(
                $mixRegistro['nume_guia'],
                $mixRegistro['esta_orig']."-".$mixRegistro['esta_dest'],
                substr($mixRegistro['nomb_remi'],0,15),
                substr($mixRegistro['nomb_dest'],0,15),
                $strFechPick,
                $strFechArri,
                $mixRegistro['fecha_entrega'],
                $mixRegistro['fecha_pod'],
                $intDiasHabi,
                $intDiasHabi2,
                $intDiasEfi3
            );
            ++$intGuiaEntr;
        }
        $arrDatoRepo = ordenar_array($arrDatoRepo,'8',SORT_DESC);
        $decPorcArri = 0;
        if ($intEntrArri > 0) {
            $decPorcArri = round(($intEntrArri * 100 / $intGuiaEntr),2);
        }
        //--------------------------------------------
        // Datos que van al Reporte (Tabla Resumida)
        //--------------------------------------------
        $arrDatoRep1[] = array('SUCURSAL',$objSucursal->CodiEsta);
        $arrDatoRep1[] = array('EFICIENCIA 1','PickUp Vs F.Entrega');
        $arrDatoRep1[] = array('EN 24 HRS O MENOS',$intDent24hr);
        $arrDatoRep1[] = array('EN 48 HRS',$intDent48hr);
        $arrDatoRep1[] = array('EN 72 HRS',$intDent72hr);
        $arrDatoRep1[] = array('EN 4 DIAS O MAS',$intMasd72hr);
        $arrDatoRep1[] = array('TOTAL ENTREGAS REALIZADAS',$intGuiaEntr);
        $arrDatoRep1[] = array('','');
        $arrDatoRep1[] = array('EFICIENCIA 2','F.Entrega Vs POD');
        $arrDatoRep1[] = array('EN 24 HRS O MENOS',$intDent24hr2);
        $arrDatoRep1[] = array('EN 48 HRS',$intDent48hr2);
        $arrDatoRep1[] = array('EN 72 HRS',$intDent72hr2);
        $arrDatoRep1[] = array('EN 4 DIAS O MAS',$intMasd72hr2);
        $arrDatoRep1[] = array('TOTAL ENTREGAS REALIZADAS',$intGuiaEntr);
        $arrDatoRep1[] = array('','');
        $arrDatoRep1[] = array('EFICIENCIA 3','F.Arribo Vs POD');
        $arrDatoRep1[] = array('EN 24 HRS O MENOS',$intDent24hr3);
        $arrDatoRep1[] = array('EN 48 HRS',$intDent48hr3);
        $arrDatoRep1[] = array('EN 72 HRS',$intDent72hr3);
        $arrDatoRep1[] = array('EN 4 DIAS O MAS',$intMasd72hr3);
        $arrDatoRep1[] = array('ENTREGAS CON ARRIBO ('.$decPorcArri.'%)',$intEntrArri);

        if ($strModoEjec == 'CRON') {
            GrabarMedicion($objSucursal->CodiEsta,"OK_24HRS",$intDent24hr);
            GrabarMedicion($objSucursal->CodiEsta,"OK_48HRS",$intDent48hr);
            GrabarMedicion($objSucursal->CodiEsta,"OK_72HRS",$intDent72hr);
            GrabarMedicion($objSucursal->CodiEsta,"OK_4D+",$intMasd72hr);
        }
        //--------------------------------------------------------------------------------------------------------------
        // Si algún contador quedó en cero, este pasa a ser uno, ya que la librería no admite 0 en el gráfico de torta
        //--------------------------------------------------------------------------------------------------------------
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

        if ($intDent24hr3 == 0) {
            $intDent24hr3 = 1;
        }
        if ($intDent48hr3 == 0) {
            $intDent48hr3 = 1;
        }
        if ($intDent72hr3 == 0) {
            $intDent72hr3 = 1;
        }
        if ($intMasd72hr3 == 0) {
            $intMasd72hr3 = 1;
        }
        //----------------------------------------------
        // Datos que van al Reporte (Gráfico de Torta)
        //----------------------------------------------
        $arrDatoTort['24hrs']     = $intDent24hr;
        $arrDatoTort['48hrs']     = $intDent48hr;
        $arrDatoTort['72hrs']     = $intDent72hr;
        $arrDatoTort['4d+']       = $intMasd72hr;

        $arrDatoTor1['24hrs_ENT'] = $intDent24hr2;
        $arrDatoTor1['48hrs_ENT'] = $intDent48hr2;
        $arrDatoTor1['72hrs_ENT'] = $intDent72hr2;
        $arrDatoTor1['4d+_ENT']   = $intMasd72hr2;

        $arrDatoTor2['24hrs_ARR'] = $intDent24hr3;
        $arrDatoTor2['48hrs_ARR'] = $intDent48hr3;
        $arrDatoTor2['72hrs_ARR'] = $intDent72hr3;
        $arrDatoTor2['4d+_ARR']   = $intMasd72hr3;
        //---------------------------------------------
        // Vector de Colores para el Gráfico de Torta
        //---------------------------------------------
        for ($intIndiColo = 0; $intIndiColo <= 3; $intIndiColo++) {
            $arrColoMoti[] = $colores[$intIndiColo];
        }
        //---------------------------------------------
        // Se Arman los Vectores de la Lista de Guías
        //---------------------------------------------
        $arrEncaColu = array('Guia','Ori-Des','Remitente','Destinatario','F.Pick-Up','F.Arribo','F.Entrega','Fecha POD','Dias Entr', 'Dias POD','Dias Arr');
        $arrJustColu = array('C','C','L','L','C','C','C','C','C','C','C');
        $arrAnchColu = array(23,18,40,40,20,20,20,20,18,18,18);
        //-----------------------
        // Se Inicia el Reporte
        //-----------------------
        $pdf=new mygraf('L','mm','Letter');
        $pdf->setVariables($arrEncaColu,$arrJustColu,$arrAnchColu,05,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->SetTitle('Eficiencia en Entrega por Sucursal');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaColu,$arrDatoRepo,$arrAnchColu,$arrJustColu);
        //---------------------------------------------------------
        // Se Arman los otros Vectores que Requiere la Rutina PDF
        //---------------------------------------------------------
        $arrEncaColu = array('ITEM','VALOR');
        $arrJustColu = array('L','C');
        $arrAnchColu = array(60,50);
        //-------------------------------------
        // Se Construye el Reporte Solicitado
        //-------------------------------------
        $pdf->AddPage();
        $pdf->setVariables($arrEncaColu,$arrJustColu,$arrAnchColu,02,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->SetTitle('Resumen de la Eficiciencia en la Entrega');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaColu,$arrDatoRep1,$arrAnchColu,$arrJustColu);
        $pdf->setXY(135,40);
        $pdf->PieChart(150,40,$arrDatoTort,'%l (%p)',$arrColoMoti);
        $pdf->setXY(135,88);
        $pdf->PieChart(150,40,$arrDatoTor1,'%l (%p)',$arrColoMoti);
        $pdf->setXY(135,135);
        $pdf->PieChart(150,40,$arrDatoTor2,'%l (%p)',$arrColoMoti);
        //-----------------------------------------------------------------------------------------------------------
        // Se arma el arreglo que mostrará la Cantidad de Guías Entregadas cada día dentro del rango de fechas dado
        //-----------------------------------------------------------------------------------------------------------
        $arrEncaColu = array('Fecha','Guias Entregadas');
        $arrJustColu = array('C','C');
        $arrAnchColu = array(60,50);
        //----------------------------------
        // Se Genera el Reporte Solicitado
        //----------------------------------
        $pdf->AddPage();
        $pdf->setVariables($arrEncaColu,$arrJustColu,$arrAnchColu,02,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaColu,$arrDatoRep3,$arrAnchColu,$arrJustColu);
        //----------------------------------------------------------------------
        //----------------------------------------------------------------------
        if ($strModoEjec == 'MENU') {
            $pdf->Output();
        } else {
            $pdf->Output($strNombArch);
            //--------------------------------------------------------------------------------
            // A través de un parámetro se le dice al programa si debe o no enviar el E-mail
            //--------------------------------------------------------------------------------
            $strEnviMail = BuscarParametro('EnviMail','MailSino',"Txt1","S");
            //---------------------------------
            // Se Envía el Reporte por E-mail
            //---------------------------------
            $to = array($objSucursal->DireMail);
            $attach = $strNombArch;
            $mimemail = new MIMEMAIL('plain/text');
            $mimemail->senderName = 'GoldCoast';
            $mimemail->senderMail = 'localhost@app-goldsist.com';
            $mimemail->subject = $strTituRepo;
            $mimemail->body = '';
            $mimemail->attachments[] = $attach;
            $mimemail->create();
            if ($strEnviMail == 'S') {
                $mimemail->send($to);
            }
        }
    }
}
?>