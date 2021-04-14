<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');

class Index extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;

    protected $txtLogiUsua;
    protected $txtClavAcce;
    protected $lstCodiSist;
    protected $btnAcceSist;
    protected $chkUltiProg;

    protected function Form_Create() {

        $this->lblTituForm_Create();
        $this->lblMensUsua_Create();

        $this->txtLogiUsua_Create();
        $this->txtClavAcce_Create();
        $this->lstCodiSist_Create();

        $this->btnAcceSist_Create();

        $this->txtLogiUsua->SetFocus();
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'ACCESO YOKOHAMA';
    }

    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
    }

    protected function txtLogiUsua_Create() {
        $this->txtLogiUsua = new QTextBox($this);
        $this->txtLogiUsua->Name = 'Usuario';
        $this->txtLogiUsua->Required = true;
        $this->txtLogiUsua->Width = 100;
        $this->txtLogiUsua->AddAction(new QFocusEvent(), new QAjaxAction('txtLogiUsua_Focus'));
    }

    protected function txtClavAcce_Create() {
        $this->txtClavAcce = new QTextBox($this);
        $this->txtClavAcce->Name = 'Contraseña';
        $this->txtClavAcce->TextMode = QTextMode::Password;
        $this->txtClavAcce->Required = true;
        $this->txtClavAcce->Width = 100;
        $this->txtClavAcce->AddAction(new QFocusEvent(), new QAjaxAction('txtClaveAcce_Focus'));
    }

    protected function lstCodiSist_Create() {
        $this->lstCodiSist = new QListBox($this);
        $this->lstCodiSist->Name = 'Sub-Sistema';
        $this->lstCodiSist->Required = true;
        $this->lstCodiSist->Width = 180;
        //$objClauWher   = QQ::Clause();
        //$objClauWher[] = QQ::In(QQN::Sistema()->CodiSist,array('pmn','sde'));
        //$arrSistDisp   = Sistema::QueryArray(QQ::AndCondition($objClauWher));
        //$this->lstCodiSist->AddItem('- Seleccione Uno -',null);
        //foreach ($arrSistDisp as $objSistDisp) {
        //    $strNombSist = $objSistDisp->__toString();
        //    if ($objSistDisp->CodiSist == 'sde') {
        //        $strNombSist = 'SISCO';
        //    }
        //    $this->lstCodiSist->AddItem($strNombSist,$objSistDisp->CodiSist);
        //}
        $this->lstCodiSist->AddItem('SISCO','sde',true);
    }

    protected function btnAcceSist_Create () {
        $this->btnAcceSist = new QButton($this);
        $this->btnAcceSist->Text = '<i class="fa fa-sign-in fa-fw"></i> Entrar';
        $this->btnAcceSist->CssClass = 'btn btn-success';
        $this->btnAcceSist->HtmlEntities = false;
        $this->btnAcceSist->CausesValidation = true;
        $this->btnAcceSist->PrimaryButton = true;
        $this->btnAcceSist->AddAction(new QClickEvent(), new QServerAction('btnAcceSist_Click'));
    }

    //------------------------------------
    // Acciones referidas a los objetos
    //------------------------------------

    protected function txtLogiUsua_Focus() {
        $this->blanquearMensaje();
    }

    protected function txtClaveAcce_Focus() {
        $this->blanquearMensaje();
    }

    protected function blanquearMensaje() {
        $this->lblMensUsua->Text = '';
    }

    protected function btnAcceSist_Click() {
        $strSituUsua = '';
        $objUsuario  = Usuario::LoadByLogiUsua($this->txtLogiUsua->Text);
        if ($objUsuario) {
            $_SESSION['User'] = serialize($objUsuario);
            if (!is_null($objUsuario->DeleteAt)) {
                //------------------------
                // Log de Transacciones
                //------------------------
                $arrLogxCamb['strNombTabl'] = 'Acceso';
                $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                $arrLogxCamb['strDescCamb'] = 'Usuario eliminado intentó acceder al Sistema';
                LogDeCambios($arrLogxCamb);
                $this->EnviarNotificacion($objUsuario);
                $objUsuario  = null;
                $strSituUsua = 'Eliminado';
            }
            if ($objUsuario) {
                if ($objUsuario->CodiStat == StatusType::INACTIVO) {
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $arrLogxCamb['strNombTabl'] = 'Acceso';
                    $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                    $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                    $arrLogxCamb['strDescCamb'] = 'Usuario inactivo intentó acceder al Sistema';
                    LogDeCambios($arrLogxCamb);
                    $this->EnviarNotificacion($objUsuario);
                    $objUsuario  = null;
                    $strSituUsua = 'Inactivado';
                }
            }
        } else {
            $strSituUsua = 'Desconocido';
        }
        if ($objUsuario) {
            $_SESSION['User'] = serialize($objUsuario);
            if ($objUsuario->PassUsua == md5($this->txtClavAcce->Text)) {
                if (is_null($objUsuario->FechAcce)) {
                    $objUsuario->FechAcce = new QDateTime(QDateTime::Now);
                }
                $_SESSION['country_code']  = 've';
                $_SESSION['language_code'] = 'es';
                $_SESSION['UltiAcce']      = $objUsuario->FechAcce;
                $_SESSION['Sistema']       = $this->lstCodiSist->SelectedValue;
                $_SESSION['NombSist']      = $this->lstCodiSist->SelectedName;
                $_SESSION['NombDire']      = 'yokohama';
                //define ('__SIST__', '/gold/app/'.$_SESSION['Sistema']);
                define ('__SIST__', '/app/'.$_SESSION['Sistema']);

                $objUsuario->FechAcce = new QDateTime(QDateTime::Now);
                $objUsuario->CantInte = 0;
                $objUsuario->Save();

                $this->SetupValoresDeSesion($_SESSION['Sistema']);
                //-----------------------------------------------------------------------------
                // Si la clave de acceso ha caducado, el Usuario debera actualizarla
                //-----------------------------------------------------------------------------
                if (is_null($objUsuario->FechClav)) {
                    $objUsuario->FechClav = new QDateTime(QDateTime::Now);
                }
                if (DiasTranscurridos(date('Y-m-d'), $objUsuario->FechClav->__toString("YYYY-MM-DD")) >= 90) {
                    $_SESSION['ClavVenc'] = 1;
                    QApplication::Redirect('app/cambiar_clave.php');
                }

                PilaAcceso::Clean();
                QApplication::Redirect('app/mg.php');
            } else {
                $this->txtClavAcce->Warning = ' Contraseña Errada';
                $this->txtClavAcce->Width   = 100;
                //--------------------------------------
                // Esto se cuenta como intento fallido
                //--------------------------------------
                $objUsuario->CantInte += 1;
                //------------------------
                // Log de Transacciones
                //------------------------
                $arrLogxCamb['strNombTabl'] = 'Acceso';
                $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                $arrLogxCamb['strDescCamb'] = 'Intento fallido nro: '.$objUsuario->CantInte;
                LogDeCambios($arrLogxCamb);

                if ($objUsuario->CantInte >= 5) {
                    $objUsuario->CodiStat = StatusType::INACTIVO;
                    $objUsuario->MotiBloq = 'Exceso de intentos fallidos';
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $arrLogxCamb['strNombTabl'] = 'Acceso';
                    $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                    $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                    $arrLogxCamb['strDescCamb'] = 'Usuario bloqueado por exceso de intento fallidos';
                    LogDeCambios($arrLogxCamb);
                    $this->EnviarNotificacion($objUsuario);
                    $this->txtLogiUsua->Warning = ' Usuario Bloqueado ';
                    $this->txtLogiUsua->Width   = 100;
                }
                $objUsuario->Save();
            }
        } else {
            $this->txtLogiUsua->Warning = ' Usuario '.$strSituUsua;
            $this->txtLogiUsua->Width   = 100;
        }
    }

    protected function EnviarNotificacion(Usuario $objUser) {
        //---------------------------------------------------------
        // Se envia el mensaje por e-mail a los administradores
        //---------------------------------------------------------
        $strEnviMail = BuscarParametro('MailAdmi', 'EnviSino', 'Txt1', 'S');
        $strTextMens = "El Usuario: " . $objUser->LogiUsua .
                       " de la Sucursal (" . $objUser->CodiEsta . ")<br> intento acceder al Sistema pero esta inactivo por: <font color='red'>" .
                       $objUser->MotiBloq . "</font>";
        $strTituRepo = utf8_decode("Acceso Denegado en Liberty");
        $to = array('soportelufeman@gmail.com, incidencias@libertyexpress.com');
        $mimemail = new MIMEMAIL('HTML');
        $mimemail->senderName = 'LibertyExpress';
        $mimemail->senderMail = 'notificaciones@app-libertyexpress.com';
        $mimemail->subject = $strTituRepo;
        $mimemail->body = $strTextMens;
        $mimemail->create();
        if ($strEnviMail == 'S') {
            $mimemail->send($to);
        }
    }

    protected function SetupValoresDeSesion($strSistPath) {
        t('===========================================');
        t('Entrando a SetupValoresDeSesion en el Index');
        $_SESSION['NombEmpr'] = 'GOLD COAST';
        $strEmaiSopo = BuscarParametro('CntaSopo','EmaiSopo','Txt1','soporte@lufemansoftware.com');
        $_SESSION['EmaiSopo'] = serialize($strEmaiSopo);
        //---------------------------------------------------------------------------------------------------------
        // Se establecen algunos valores de interés para el cálculo de la tarifa en todos los Sistemas en general.
        //---------------------------------------------------------------------------------------------------------
        $objChecPick = SdeCheckpoint::Load('PU');
        $dteFechDhoy = FechaDeHoy();
        $decIvaxDhoy = FacImpuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);
        $objProducto = FacProducto::LoadBySiglProd('DOC');
        $arrOperGene = SdeOperacion::LoadArrayByRutaId(1);
        $intOperGene = $arrOperGene[0]->CodiOper;
        //---------------------------------------
        // Vector de Sucursales exentas de Iva
        //---------------------------------------
        $objSeleColu   = QQ::Select(QQN::Estacion()->CodiEsta);
        $arrSucuAuxi   = Estacion::LoadArrayByExentaDeIvaId(SinoType::SI,QQ::Clause($objSeleColu));
        $arrSucuExen   = array();
        foreach ($arrSucuAuxi as $objSucuExen) {
            $arrSucuExen[] = $objSucuExen->CodiEsta;
        }
        $_SESSION['SucuExen'] = serialize($arrSucuExen);
        //------------------------------
        // Tarifa del Expreso Nacional
        //------------------------------
        $objClieTari = MasterCliente::LoadByCodigoInterno('NAC01');
        $objTariPmnx = $objClieTari->Tarifa;
        $_SESSION['TariPmnx'] = serialize($objTariPmnx);
        //-------------------------
        // Reconversion Monetaria
        //-------------------------
        $decFactReco = 100000;
        $objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
        if ($objConfReco) {
            $decFactReco = (float)$objConfReco->ParaVal2;
        }

        if ($strSistPath == 'pmn') {
            t('Sistema: Expreso Nacional');
            //------------------------------------------------
            // Checkpoints de uso general en las receptorias
            //------------------------------------------------
            $objCkptAlma = SdeCheckpoint::Load('EA');
            $objCkptReci = SdeCheckpoint::Load('AR');
            $objCkptAudi = SdeCheckpoint::Load('AV');
            //-------------------------------------------------------------------
            // Valores de interes para el calculo de la tarifa en el Exp. Nac
            //-------------------------------------------------------------------
            /**
             * @var $objSeguPmnx Parametro
             */
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
            //--------------------------------
            // Valor Max y Min Reconvertidos
            //--------------------------------
            $decRecoMini = $decValoMini / $decFactReco;
            $decRecoMaxi = $decValoMaxi / $decFactReco;
            //---------------------------------------------
            // Nueva configuracion del Seguro del Exp Nac
            //---------------------------------------------
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Parametro()->ParaVal1);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Parametro()->IndiPara, 'SeguYama');
            $objClauWher[] = QQ::IsNotNull(QQN::Parametro()->ParaVal1);
            $arrReceAuxi   = Parametro::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            $arrRecoMini   = array();
            $arrRecoMaxi   = array();
            $arrValoMini   = array();
            $arrValoMaxi   = array();
            $arrValoPorc   = array();
            foreach ($arrReceAuxi as $objParaSegu) {
                $arrValoMini[] = $objParaSegu->ParaVal1;
                $arrValoMaxi[] = $objParaSegu->ParaVal2;
                $arrValoPorc[] = $objParaSegu->ParaVal3;

                $arrRecoMini[] = $objParaSegu->ParaVal1 / $decFactReco;
                $arrRecoMaxi[] = $objParaSegu->ParaVal2 / $decFactReco;
            }
            //--------------------------------
            // Valor Min y Max
            //--------------------------------
            $intCantElem = count($arrValoMini)-1;
            $decValoMini = $arrValoMini[0];
            $decValoMaxi = $arrValoMaxi[$intCantElem];
            t('Valor Minimo: '.$decValoMini);
            t('Valor Maximo: '.$decValoMaxi);
            //--------------------------------
            // Valor Min y Max Reconvertidos
            //--------------------------------
            $decRecoMini = $decValoMini / $decFactReco;
            $decRecoMaxi = $decValoMaxi / $decFactReco;
            t('Valor Minimo Reconv: '.$decRecoMini);
            t('Valor Maximo Reconv: '.$decRecoMaxi);
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
            //-----------------------------------------------------------------------------
            // Otra rutina paralela para obtención de Ckpt con notificación SMS habilitada.
            //-----------------------------------------------------------------------------
            $objSeleColu   = QQ::Select(QQN::SdeCheckpoint()->CodiCkpt, QQN::SdeCheckpoint()->NotificacionSms);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::IsNotNull(QQN::SdeCheckpoint()->NotificacionSms);
            $arrReceAuxi   = SdeCheckpoint::QueryArray(QQ::AndCondition($objClauWher), QQ::Clause($objSeleColu));
            $arrCkptSmsy   = array();
            foreach ($arrReceAuxi as $objCkptSmsy) {
                if ($objCkptSmsy->NotificacionSms) {
                    $arrCkptSmsy[] = $objCkptSmsy->CodiCkpt;
                }
            }
            $arrCkptSmsx = $arrCkptSmsy;
            //-------------------------------------------------------------
            // Variables de Session que se usan a lo largo del Sistema PMN
            //-------------------------------------------------------------
            $_SESSION['CkptAlma'] = serialize($objCkptAlma);
            $_SESSION['CkptReci'] = serialize($objCkptReci);
            $_SESSION['CkptAudi'] = serialize($objCkptAudi);
            $_SESSION['ClieTari'] = serialize($objClieTari);
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

            $_SESSION['RecoMini'] = serialize($decRecoMini);
            $_SESSION['RecoMaxi'] = serialize($decRecoMaxi);
            $_SESSION['RecoMin1'] = serialize($arrRecoMini);
            $_SESSION['RecoMax1'] = serialize($arrRecoMaxi);

            $_SESSION['FechDhoy'] = serialize($dteFechDhoy);
            $_SESSION['LimiNaci'] = serialize($objLimiNaci);
            $_SESSION['LimiUrba'] = serialize($objLimiUrba);
            $_SESSION['RutaMaxi'] = serialize($decRutaMaxi);
            if ($arrCkptTerm) {
                $_SESSION['CkptTerm'] = serialize($arrCkptTerm);
            }
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
            $objClauWher[] = QQ::Equal(QQN::Parametro()->IndiPara, 'SeguYama');
            $objClauWher[] = QQ::IsNotNull(QQN::Parametro()->ParaVal1);
            $arrReceAuxi = Parametro::QueryArray(QQ::AndCondition($objClauWher),$objClaoOrde);
            $arrValoMini = array();
            $arrValoMaxi = array();
            $arrRecoMini = array();
            $arrRecoMaxi = array();
            $arrValoPorc = array();
            foreach ($arrReceAuxi as $objParaSegu) {
                $arrValoMini[] = $objParaSegu->ParaVal1;
                $arrValoMaxi[] = $objParaSegu->ParaVal2;
                $arrValoPorc[] = $objParaSegu->ParaVal3;

                $arrRecoMini[] = $objParaSegu->ParaVal1 / $decFactReco;
                $arrRecoMaxi[] = $objParaSegu->ParaVal2 / $decFactReco;
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
            //-------------------------------------------------------------
            // Variables de Session que se usan a lo largo del Sistema SDE
            //-------------------------------------------------------------
            $_SESSION['ChecPick'] = serialize($objChecPick);
            $_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
            $_SESSION['ProdGuia'] = serialize($objProducto);
            $_SESSION['OperGene'] = serialize($intOperGene);
            $_SESSION['ValoMin1'] = serialize($arrValoMini);
            $_SESSION['ValoMax1'] = serialize($arrValoMaxi);
            $_SESSION['RecoMin1'] = serialize($arrRecoMini);
            $_SESSION['RecoMax1'] = serialize($arrRecoMaxi);
            $_SESSION['PorcSeg1'] = serialize($arrValoPorc);
            $_SESSION['PesoFra1'] = serialize($arrPesoFra1);
            $_SESSION['PesoFra2'] = serialize($arrPesoFra2);
            $_SESSION['PorcFran'] = serialize($arrPorcFran);
        }
    }
}
Index::Run('Index','index.tpl.php');
?>
