<?php
//----------------------------------------------------------------------------------
// Programa      : recalcular_tarifa.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 18/04/2018
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');

error_reporting(E_ALL);
SetupValoresDeSesion('sde');
$_SESSION['User'] = serialize(Usuario::LoadByLogiUsua('liberty'));

$blnActuGuia = false;
//---------------------------------------
// Criterios de seleccion de registros
//---------------------------------------
$objDatabase  = Guia::GetDatabase();
$strCadeSqlx  = " select nume_guia ";
$strCadeSqlx .= "   from guia ";
$strCadeSqlx .= "  where fech_guia >= '2018-04-01' ";
$strCadeSqlx .= "    and fech_guia <= '2018-04-15' ";
$strCadeSqlx .= "    and tarifa_id is not null ";
$objResuChec  = $objDatabase->Query($strCadeSqlx);

$intCantRegi = 0;
echo "\nRecalculanto Tarifas...\n\n";
while ($mixRegistro = $objResuChec->FetchArray()) {
    $objGuiaProc = Guia::Load($mixRegistro['nume_guia']);
    if ($objGuiaProc->PesoGuia > 0) {
        $arrCalcTari = CalcularTarifaNacionalDeLaGuia($objGuiaProc);
        $blnTodoOkey = $arrCalcTari['blnTodoOkey'];
        $objGuiaReca = $arrCalcTari['objGuiaCalc'];
        if (($blnTodoOkey) && ($objGuiaProc->MontoTotal != $objGuiaReca->MontoTotal)) {
            if ($blnActuGuia) {
                $objGuiaReca->Save();
            }
            echo "La Guia: ".$objGuiaProc->NumeGuia.
                " de Fecha: ".$objGuiaProc->FechGuia->__toString('YYYY-MM-DD').
                " tenia un monto de: ".$objGuiaProc->MontoTotal.
                " y luego del recalculo tiene: ".$objGuiaReca->MontoTotal."\n";
        }
    }
}
echo "\nFueron $intCantRegi registros...";


function SetupValoresDeSesion($strSistPath) {
    $strEmaiSopo = BuscarParametro('CntaSopo','EmaiSopo','Txt1','soportelufeman@gmail.com');
    $_SESSION['EmaiSopo'] = serialize($strEmaiSopo);
    //---------------------------------------------------------------------------------------------------------
    // Se establecen algunos valores de interés para el cálculo de la tarifa en todos los Sistemas en general.
    //---------------------------------------------------------------------------------------------------------
    $objChecPick = SdeCheckpoint::Load('PU');
    $dteFechDhoy = FechaDeHoy();
    $decIvaxDhoy = FacImpuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);
    $objProducto = FacProducto::LoadBySiglProd('DOC');
    $arrOperGene = SdeOperacion::LoadArrayByCodiRuta('R9999');
    $intOperGene = $arrOperGene[0]->CodiOper;

    if ($strSistPath == 'pmn') {
        //------------------------------------------------
        // Checkpoints de uso general en las receptorias
        //------------------------------------------------
        $objCkptAlma = SdeCheckpoint::Load('EA');
        $objCkptReci = SdeCheckpoint::Load('AR');
        $objCkptAudi = SdeCheckpoint::Load('AV');
        //------------------------------------------------------------------------------
        // Aqui se establecen algunos valores de interes para el calculo de la tarifa
        // en el Sistema Counter.  Estos valores son referenciados en el programa
        // "cargar_guia_pmn.prod.php"
        //------------------------------------------------------------------------------
        $objSeguPmnx = BuscarParametro('SeguPmnx','ValoSegu','TODO',null);

        // Este es para la configuracion antigua de seguro de Expreso Nacional
        if ($objSeguPmnx) {
            $blnSeguSino = $objSeguPmnx->ParaVal1;
            $decValoMini = $objSeguPmnx->ParaVal2;
            $decPorcSegu = $objSeguPmnx->ParaVal3;
            $decRutaMaxi = $objSeguPmnx->ParaVal4 ? $objSeguPmnx->ParaVal4 : 2000;
            $decValoMaxi = $objSeguPmnx->ParaVal5 ? $objSeguPmnx->ParaVal5 : 200000;
        } else {
            $blnSeguSino = SinoType::SI;
            $decValoMini = 50000;
            $decValoMaxi = 200000;
            $decPorcSegu = 10;
            $decRutaMaxi = 2000;
        }
        /*
         * A continuación, lo demás pertenece a la nueva configuración para el seguro
         * del Expreso Nacional
         */
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Parametro()->ParaVal1);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Parametro()->IndiPara, 'SeguPmns');
        $arrReceAuxi   = Parametro::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $arrValoMini   = array();
        $arrValoMaxi   = array();
        $arrValoPorc   = array();
        foreach ($arrReceAuxi as $objParaSegu) {
            $arrValoMini[] = $objParaSegu->ParaVal1;
            $arrValoMaxi[] = $objParaSegu->ParaVal2;
            $arrValoPorc[] = $objParaSegu->ParaVal3;
        }
        //-----------------------------------------------------------------------------
        // Hasta aquí lo de la nueva configuración para el seguro del Expeso Nacional
        //-----------------------------------------------------------------------------
        $objClieTari = MasterCliente::LoadByCodigoInterno('PMN01');
        $objTariPmnx = $objClieTari->Tarifa;
        //-----------------------------------------------
        // Checkpoints de Cierre del Ciclo de un envio
        //-----------------------------------------------
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::SdeCheckpoint()->TipoTerm,SdeTerminalCkptType::SI);
        $arrCkptTerm   = SdeCheckpoint::QueryArray(QQ::AndCondition($objClauWher));
        //------------------------------------------------------------
        // Tarifa limite por Peso para Dispersion Nacional
        //------------------------------------------------------------
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::TarifaPeso()->PesoFinal,false);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TarifaId,$objTariPmnx->Id);
        $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TipoId,TipoTarifaType::NAC);
        $objLimiNaci   = TarifaPeso::QuerySingle(QQ::AndCondition($objClauWher),$objClauOrde);
        //------------------------------------------------------------
        // Tarifa limite por Peso para Dispersion Urbana
        //------------------------------------------------------------
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::TarifaPeso()->PesoFinal,false);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TarifaId,$objTariPmnx->Id);
        $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TipoId,TipoTarifaType::URB);
        $objLimiUrba   = TarifaPeso::QuerySingle(QQ::AndCondition($objClauWher),$objClauOrde);
        //---------------------------------------
        // Vector de Sucursales exentas de Iva
        //---------------------------------------
        $objSeleColu   = QQ::Select(QQN::Estacion()->CodiEsta);
        $arrSucuAuxi   = Estacion::LoadArrayByExentaDeIvaId(SinoType::SI,QQ::Clause($objSeleColu));
        $arrSucuExen   = array();
        foreach ($arrSucuAuxi as $objSucuExen) {
            $arrSucuExen[] = $objSucuExen->CodiEsta;
        }
        //--------------------------------------------
        // Vector de Receptorias con limite de peso
        //--------------------------------------------
        $objSeleColu   = QQ::Select(QQN::Counter()->Siglas,QQN::Counter()->LimiteKilos);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNotNull(QQN::Counter()->LimiteKilos);
        $arrReceAuxi   = Counter::QueryArray(QQ::AndCondition($objClauWher),QQ::Clause($objSeleColu));
        $arrReceLimi   = array();
        foreach ($arrReceAuxi as $objReceLimi) {
            $arrReceLimi[$objReceLimi->Siglas] = $objReceLimi->LimiteKilos;
        }
        //-----------------------------------------------------------
        // Vector de Checkpoints con notificacion por SMS habilitada.
        //-----------------------------------------------------------
        $objSeleColu   = QQ::Select(QQN::Notificacion()->CheckpointId,QQN::Notificacion()->NotificadoSms);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNotNull(QQN::Notificacion()->NotificadoSms);
        $arrReceAuxi   = Notificacion::QueryArray(QQ::OrCondition($objClauWher),QQ::Clause($objSeleColu));
        $arrCkptSmsx   = array();
        foreach ($arrReceAuxi as $objCkptSmsx) {
            if ($objCkptSmsx->NotificadoSms) {
                $arrCkptSmsx[] = $objCkptSmsx->CheckpointId;
            }
        }
        //-----------------------------------------------------------------------------
        // Otra rutina paralela para obtención de Ckpt con notificación SMS habilitada.
        //-----------------------------------------------------------------------------
        $objSeleColu = QQ::Select(QQN::SdeCheckpoint()->CodiCkpt, QQN::SdeCheckpoint()->NotificacionSms);
        $objClauWher = QQ::Clause();
        $objClauWher[] = QQ::IsNotNull(QQN::SdeCheckpoint()->NotificacionSms);
        $arrReceAuxi = SdeCheckpoint::QueryArray(QQ::AndCondition($objClauWher), QQ::Clause($objSeleColu));
        $arrCkptSmsy = array();
        foreach ($arrReceAuxi as $objCkptSmsy) {
            if ($objCkptSmsy->NotificacionSms) {
                $arrCkptSmsy[] = $objCkptSmsy->CodiCkpt;
            }
        }
        //-------------------------------------------------------------
        // Variables de Session que se usan a lo largo del Sistema PMN
        //-------------------------------------------------------------
        $_SESSION['CkptAlma'] = serialize($objCkptAlma);
        $_SESSION['CkptReci'] = serialize($objCkptReci);
        $_SESSION['CkptAudi'] = serialize($objCkptAudi);
        $_SESSION['ClieTari'] = serialize($objClieTari);
        $_SESSION['TariPmnx'] = serialize($objTariPmnx);
        $_SESSION['ChecPick'] = serialize($objChecPick);
        $_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
        $_SESSION['ProdGuia'] = serialize($objProducto);
        $_SESSION['OperGene'] = serialize($intOperGene);
        $_SESSION['SeguSino'] = serialize($blnSeguSino);

        $_SESSION['ValoMini'] = serialize($decValoMini);
        $_SESSION['ValoMaxi'] = serialize($decValoMaxi);
        $_SESSION['PorcSegu'] = serialize($decPorcSegu);

        $_SESSION['ValoMin1'] = serialize($arrValoMini);
        $_SESSION['ValoMax1'] = serialize($arrValoMaxi);
        $_SESSION['PorcSeg1'] = serialize($arrValoPorc);

        $_SESSION['FechDhoy'] = serialize($dteFechDhoy);
        $_SESSION['LimiNaci'] = serialize($objLimiNaci);
        $_SESSION['LimiUrba'] = serialize($objLimiUrba);
        $_SESSION['RutaMaxi'] = serialize($decRutaMaxi);
        if ($arrCkptTerm) {
            $_SESSION['CkptTerm'] = serialize($arrCkptTerm);
        }
        $_SESSION['SucuExen'] = serialize($arrSucuExen);
        $_SESSION['ReceLimi'] = serialize($arrReceLimi);
        $_SESSION['CkptSmsx'] = serialize($arrCkptSmsx);
        $_SESSION['CkptSmsy'] = serialize($arrCkptSmsy);
    } elseif ($strSistPath == 'sde') {
        //---------------------------------------------------------
        // Obteniendo valores de rango y porcentaje del seguro ...
        //---------------------------------------------------------
        $objClaoOrde   = QQ::Clause();
        $objClaoOrde[] = QQ::OrderBy(QQN::Parametro()->ParaVal1);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Parametro()->IndiPara, 'SeguPmns');
        $arrReceAuxi = Parametro::QueryArray(QQ::AndCondition($objClauWher),$objClaoOrde);
        $arrValoMini = array();
        $arrValoMaxi = array();
        $arrValoPorc = array();
        foreach ($arrReceAuxi as $objParaSegu) {
            $arrValoMini[] = $objParaSegu->ParaVal1;
            $arrValoMaxi[] = $objParaSegu->ParaVal2;
            $arrValoPorc[] = $objParaSegu->ParaVal3;
        }
        //----------------------------------------------------------------------------
        // Obteniendo valores de rango de peso y porcentaje para el  Franqueo Postal.
        //----------------------------------------------------------------------------
        $objClauOrfr   = QQ::Clause();
        $objClauOrfr[] = QQ::OrderBy(QQN::Parametro()->ParaVal4);
        $objClauFran   = QQ::Clause();
        $objClauFran[] = QQ::Equal(QQN::Parametro()->IndiPara, 'PorcFranq');
        $arrReceAuxi = Parametro::QueryArray(QQ::AndCondition($objClauFran),$objClauOrfr);
        $arrPesoFra1 = array();
        $arrPesoFra2 = array();
        $arrPorcFran = array();
        foreach ($arrReceAuxi as $objRangPorc) {
            $arrPesoFra1[] = $objRangPorc->ParaVal4;
            $arrPesoFra2[] = $objRangPorc->ParaVal5;
            $arrPorcFran[] = $objRangPorc->ParaVal3;
        }
        //---------------------------------------
        // Vector de Sucursales exentas de Iva
        //---------------------------------------
        $arrSucuAuxi   = Estacion::LoadArrayByExentaDeIvaId(SinoType::SI);
        $arrSucuExen   = array();
        foreach ($arrSucuAuxi as $objSucuExen) {
            $arrSucuExen[] = $objSucuExen->CodiEsta;
        }
        //-------------------------------------------------------------
        // Variables de Session que se usan a lo largo del Sistema SDE
        //-------------------------------------------------------------
        $_SESSION['ChecPick'] = serialize($objChecPick);
        $_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
        $_SESSION['ProdGuia'] = serialize($objProducto);
        $_SESSION['OperGene'] = serialize($intOperGene);
        $_SESSION['ValoMin1'] = serialize($arrValoMini);
        $_SESSION['ValoMax1'] = serialize($arrValoMaxi);
        $_SESSION['PorcSeg1'] = serialize($arrValoPorc);
        $_SESSION['PesoFra1'] = serialize($arrPesoFra1);
        $_SESSION['PesoFra2'] = serialize($arrPesoFra2);
        $_SESSION['PorcFran'] = serialize($arrPorcFran);
        $_SESSION['SucuExen'] = serialize($arrSucuExen);
    }
}


