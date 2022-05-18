<?php
require_once('qcubed.inc.php');

define ('__SIST__', '/app/'.$_SESSION['Sistema']);

$_SESSION['User'] = serialize(Usuario::LoadByLogiUsua('ddurand'));

//---------------------------------------------------
// Transformando fechas de mm/dd/yyyy a yyyy-mm-dd
//---------------------------------------------------
$strFechOrig = '05/07/2022';
m("Fecha Original: $strFechOrig");
m("Fecha Transformada: ".transformaFecha($strFechOrig));

//--------------------------------------
// Actualizando montos de las Facturas
//--------------------------------------

//m("Iniciando actualización de las facturas");
//m("=======================================",2);
//$objClauWher   = QQ::Clause();
//$objClauWher[] = QQ::NotEqual(QQN::Facturas()->Estatus,"ANULADA");
//$objClauWher[] = QQ::IsNull(QQN::Facturas()->ClienteRetailId);
//$objClauWher[] = QQ::NotEqual(QQN::Facturas()->ClienteCorpId, 1702);
//$objClauWher[] = QQ::GreaterOrEqual(QQN::Facturas()->Fecha, '2022-01-01');
//$objClauOrde   = QQ::OrderBy(QQN::Facturas()->Id,false);
//$arrFactSist   = Facturas::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
//$intCantFact   = count($arrFactSist);
//$intFactProc   = 0;
//$intFactCamb   = 0;
//m("Se van a procesar $intCantFact facturas",2);
//foreach ($arrFactSist as $objFactSist) {
//    $intFactProc++;
//    $objFactAnte = clone $objFactSist;
//    $objFactSist->ActualizarMontos();
//    $objResuComp = QObjectDiff::Compare($objFactAnte, $objFactSist);
//    if ($objResuComp->FriendlyComparisonStatus == 'different') {
//        m("Factura: $objFactSist->Referencia (Id: $objFactSist->Id)");
//        $intFactCamb++;
//        m(implode(', ',$objResuComp->DifferentFields),2);
//        //break;
//    }
//}
//m("Procesadas: $intFactProc, con Cambios: $intFactCamb");

//-------------------------
// Validando datos Mobile
//-------------------------

//$objChofer = Chofer::LoadByLogin('jcastill');
//echo "El chofer es: ".$objChofer->Nombre;
//echo "<br>";
//
//echo "Fecha de hoy: ".FechaDeHoy();
//echo "<br>";
//
//echo "Tiene actividad mobile: ? ".$objChofer->activoMobileHoy();

//--------------------------------
// Convirtiendo texto a fechas
//--------------------------------

//$strFechEntr = '2021-08-30';
//$strFechGuia = '2021-08-20';
//echo 'strtotime: '.strtotime($strFechEntr);
//echo "<br>";
//$dttFechEntr = date('Y-m-d H:i',strtotime($strFechEntr));
//echo "date: ".$dttFechEntr;
//
//$dttFechGuia = strtotime($strFechGuia);
//$intTiemTran = date_diff($dttFechEntr,$dttFechGuia);


// Buscando Tarifas Vigentes de Exportacion

//$objExpoMari = Productos::LoadByCodigo('EXM');
//$strFechGuia = date('Y-m-d');
//
//echo 'Producto: '.$objExpoMari->Codigo;
//echo "<br>";
//echo 'Fecha: '.$strFechGuia;
//echo "<br>";
//echo "<br>";
//
//$arrTariProd = TarifaExp::TarifaVigente($$objExpoMari->Id,$strFechGuia);
//$decMontTari = $arrTariProd['monto'];
//$decPesoMini = $arrTariProd['minimo'];
//
//echo "El monto de la tarifa es: ".$decMontTari;
//echo "<br>";
//echo "El minimo es: ".$decPesoMini;

// Validando fechas

//var_dump(validateDate('2012-02-28','d/m/Y'));
//var_dump(validateDate('28/02/2012','d/m/Y'));


//----------------------------------------------
// Rellenar el campo nombre en la tabla Chofer
//----------------------------------------------

//echo "Actualizando nombres de los Choferes<br>";
//echo "====================================<br><br>";
//$arrChofSist = Chofer::LoadAll();
//foreach ($arrChofSist as $objChofSist) {
//    $objChofSist->Nombre = trim($objChofSist->NombChof).' '.trim($objChofSist->ApelChof);
//    $objChofSist->Save();
//    echo $objChofSist->Nombre.'<br>';
//}

//------------------------------------------------------------------
// Actualizacion de Estadísticas de Entrega de Manfiestos ABIERT@S
//------------------------------------------------------------------

//$objClauWher   = [];
//$objClauWher[] = QQ::Equal(QQN::Containers()->Estatus,'ABIERT@');
//$objClauWher[] = QQ::GreaterOrEqual(QQN::Containers()->Fecha,'2021-12-01');
//$objClauWher[] = QQ::LessOrEqual(QQN::Containers()->Fecha,'2021-12-31');
//$arrManiOpen   = Containers::QueryArray(QQ::AndCondition($objClauWher));
//echo "Hay ".count($arrManiOpen).' manifiestos por actualizar<br><br>';
//foreach ($arrManiOpen as $objManiOpen) {
//    echo "Procesando: $objManiOpen->Numero<br>";
//    $objManiOpen->ActualizarEstadisticasDeEntrega();
//}
//$objClauWher   = [];
//$objClauWher[] = QQ::Equal(QQN::Containers()->Estatus,'CERRAD@');
//$intCantClos   = Containers::QueryCount(QQ::AndCondition($objClauWher));
//echo "Total Cerrados $intCantClos<br>";

//-------------------------------------------------------
// Actualizacion de Estadísticas de Entrega por Chofer
//-------------------------------------------------------

//$objChofSele = Chofer::LoadByLogin('scuevas');
//$arrManiChof = Containers::LoadArrayByChoferId($objChofSele->CodiChof);
//foreach ($arrManiChof as $objManiChof) {
//    echo "Procesando: $objManiChof->Numero<br>";
//    $objManiChof->ActualizarEstadisticasDeEntrega();
//}

//----------------------------
// Paginacion en Ruta-Mobile
//----------------------------

//$objManiSele = Containers::Load(10);
//$intGrupGuia = 0;
//$objClauAdic = QQ::LimitInfo(5,$intGrupGuia*5);
//$arrPiezMani = $objManiSele->GetGuiaPiezasAsContainerPiezaArray(null,$objClauAdic);
//echo "Gupo Nro: $intGrupGuia<br><br>";
//foreach ($arrPiezMani as $objPiezMani) {
//    echo $objPiezMani->IdPieza."<br>";
//}
//$intGrupGuia = 1;
//$objClauAdic = QQ::LimitInfo(5,$intGrupGuia*5);
//$arrPiezMani = $objManiSele->GetGuiaPiezasAsContainerPiezaArray(null,$objClauAdic);
//echo "Gupo Nro: $intGrupGuia<br><br>";
//foreach ($arrPiezMani as $objPiezMani) {
//    echo $objPiezMani->IdPieza."<br>";
//}

//-------------------
// Interpretaciones
//-------------------

//$strNumeGuia = '9170122-001';
//echo 'Guia Original: '.$strNumeGuia."<br>";
//echo 'Se interpreta así: '.transformar($strNumeGuia);
//echo "<br><br>";
//
//$strNumeGuia = '';
//echo 'Guia Original: '.$strNumeGuia."<br>";
//echo 'Se interpreta así: '.transformar($strNumeGuia);
//echo "<br><br>";
//
//$strNumeGuia = '';
//echo 'Guia Original: '.$strNumeGuia."<br>";
//echo 'Se interpreta así: '.transformar($strNumeGuia);
//echo "<br><br>";
//
//$strNumeGuia = '';
//echo 'Guia Original: '.$strNumeGuia."<br>";
//echo 'Se interpreta así: '.transformar($strNumeGuia);
//echo "<br><br>";

//-----------------------------
// Ultima Tasa de Cambio USD
//-----------------------------

//$objTasaDola = Tasas::UltimaTasa('USD');
//echo 'Tasa Dolar: '.$objTasaDola->Tasa;
//echo 'Fecha Dolar: '.$objTasaDola->Fecha;
//echo "<br>";
//$objTasaEuro = Tasas::UltimaTasa('EUR');
//echo 'Tasa Euro: '.$objTasaEuro->Tasa;
//echo 'Fecha Euro: '.$objTasaEuro->Fecha;

// Caso Scanneo Eurolatino
//$strCopiPiez = 'CIU5000114092-p9';
//echo transformar($strCopiPiez);


//-----------------------------------------------------------------
// Resumen de pieza entregadas de un manifiesto de Salida a Ruta
//-----------------------------------------------------------------

//$objClauWher = QQ::Equal(QQN::Containers()->Estatus,'ABIERT@');
//$arrManiRuta = Containers::QueryArray(QQ::AndCondition($objClauWher));
//foreach ($arrManiRuta as $objManiRuta) {
//    echo "Estatus Antes: ".$objManiRuta->Estatus."<br>";
//    $objManiRuta->ActualizarEstadisticasDeEntrega();
//    echo "Manifiesto: ".$objManiRuta->Numero."<br>";
//    echo "Piezas: ".$objManiRuta->Piezas."<br>";
//    echo "Entregadas: ".$objManiRuta->CantidadOk."<br>";
//    echo "Estatus Despues: ".$objManiRuta->Estatus."<br><br>";
//
//}


//$strNumeGuia = '169695.1';
//echo quitarPuntoYPieza($strNumeGuia);
//function quitarPuntoYPieza($strNumeGuia) {
//    $intLongCade = strlen($strNumeGuia);
//    $intCantPnto = 0;
//    for ($i=0; $i < $intLongCade; $i++) {
//        if ($strNumeGuia[$i] == '.') {
//            $intCantPnto++;
//        }
//    }
//    if ($intCantPnto > 0) {
//        $intPosiPnto = strpos($strNumeGuia,'.');
//        $strNumeGuia = substr($strNumeGuia,0,$intPosiPnto);
//    }
//    return $strNumeGuia;
//}

//$objClauWher   = QQ::Clause();
//$objClauWher[] = QQ::Equal(QQN::NotaEntregaCkpt()->Checkpoint->Codigo,'CR');
//$objClauSele   = QQ::Select(QQN::NotaEntregaCkpt()->ContainerId);
//$arrManiNaci   = NotaEntregaCkpt::QueryArray(
//    QQ::AndCondition($objClauWher),
//    QQ::Clause(
//        $objClauSele,
//        QQ::Distinct()
//    ));
//$arrIdxxMani   = [];
//foreach ($arrManiNaci as $objManiNaci) {
//    $arrIdxxMani[] = $objManiNaci->ContainerId;
//}
//echo 'IDs de los Manifiestos Nacionalizados: ';
//print_r($arrIdxxMani);


//----------------------------------------------------------------------------------
// Sincerar la cantidad de piezas de cada manifiesto así como contar las recibidas
//----------------------------------------------------------------------------------

//$strNombProc = 'Match de Scanneo Manual';
//$objProcEjec = CrearProceso($strNombProc);
//$objCkptMani = Checkpoints::LoadByCodigo('RA');
//
//$objClauWher[] = QQ::NotEqual(QQN::NotaEntrega()->Piezas,QQN::NotaEntrega()->Recibidas);
//$objClauWher[] = QQ::GreaterThan(QQN::NotaEntrega()->Procesadas,0);
//
//$arrManiSist = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
//foreach ($arrManiSist as $objManiSist) {
//    $objManiSist->Piezas = $objManiSist->cantidadDePiezas();
//    $objManiSist->Save();
//    $objManiSist->ContarActualizarRecibidas();
//    //---------------------------------------
//    // Se graba el checkpoint al Manifiesto
//    //---------------------------------------
//    if ($objManiSist->Recibidas > 0) {
//        $arrResuGrab = $objManiSist->GrabarCheckpoint($objCkptMani, $objProcEjec);
//        if (!$arrResuGrab['TodoOkey']) {
//            echo "Error: ".$arrResuGrab['TodoOkey']."<br>";
//        }
//    }
//
//    echo "Manifiesto: ".$objManiSist->Referencia.' Total Piezas: '.$objManiSist->Piezas.' Recibidas: '.$objManiSist->Recibidas;
//    echo "<br>";
//}

//-------------------
// Buscar Parametro
//-------------------
//$intProxRefe = Parametros::BuscarParametro('RefeFact','ProxRefe','Val1',1);
//echo $intProxRefe;


//---------------------------------
// Ultimo Checkpoint de una pieza
//---------------------------------
//$objPiezSele = GuiaPiezas::Load(385);
//print_r($objPiezSele->ultimoCheckpointTodo());

//----------------------
// Limpiar cadena
//----------------------
//$strNombChof = "Diego+] Torres/*-";
//echo "Antes: $strNombChof<br>";
//$strNombChof = limpiarCadena($strNombChof);
//echo "Despues: $strNombChof<br>";


//----------------------------------------------
// Transformar la guia scanneada en guia SisCO
//----------------------------------------------

//$strNumeGuia = 'ANA9570174415-p2-001';
//echo "Entrando: ".$strNumeGuia."<br><br>";
//$strNumeGuia = transformar($strNumeGuia);
//echo "Transformada: ".$strNumeGuia;



//$intFactIdxx = 27;
//$objFactImpr = Facturas::Load($intFactIdxx);
//$arrZonaFact = Parametros::LoadArrayByIndice('ZONA');
//$arrManiFact = $objFactImpr->GetNotaEntregaAsFacturaArray();
//$arrGuiaZona = [];
//foreach ($arrManiFact as $objManiFact) {
//    $arrGuiaMani = $objManiFact->GetGuiasArray();
//    foreach ($arrGuiaMani as $objGuiaMani) {
//        $arrGuiaZona[$objGuiaMani->Destino->Zona][] = $objGuiaMani->Tracking;
//    }
//}
//foreach ($arrZonaFact as $objZonaFact) {
//    if (isset($arrGuiaZona[$objZonaFact->Codigo])) {
//        echo "Zona: $objZonaFact->Codigo - $objZonaFact->Descripcion<br>";
//        $intCantGuia = 1;
//        $strGuiaZona = '';
//        foreach ($arrGuiaZona[$objZonaFact->Codigo] as $strNumeGuia) {
//            if (strlen($strGuiaZona) > 0) {
//                $strGuiaZona .= ', ';
//            }
//            $strGuiaZona .= $strNumeGuia;
//        }
//        echo $strGuiaZona."<br><br>";
//    }
//}
