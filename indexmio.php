<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');

class IndexMio extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;

    protected $txtLogiUsua;
    protected $txtClavAcce;
    protected $txtSimuUsua;
    protected $lstCodiSist;
    protected $btnAcceSist;
    protected $chkUltiProg;
    protected $objUsuaAdmi;
    protected $blnTodoOkey;

    protected function Form_Create() {

        $this->lblTituForm_Create();
        $this->lblMensUsua_Create();

        $this->txtLogiUsua_Create();
        $this->txtClavAcce_Create();
        $this->txtSimuUsua_Create();
        $this->lstCodiSist_Create();

        $this->btnAcceSist_Create();

        $this->txtLogiUsua->SetFocus();

        $this->btnAcceSist->Visible = false;
        $this->blnTodoOkey = false;

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
        $this->txtLogiUsua->AddAction(new QBlurEvent(), new QAjaxAction('txtLogiUsua_Blur'));
    }

    protected function txtClavAcce_Create() {
        $this->txtClavAcce = new QTextBox($this);
        $this->txtClavAcce->Name = 'Contraseña';
        $this->txtClavAcce->TextMode = QTextMode::Password;
        $this->txtClavAcce->Required = true;
        $this->txtClavAcce->Width = 100;
        $this->txtClavAcce->AddAction(new QBlurEvent(), new QAjaxAction('txtClavAcce_Blur'));
    }

    protected function txtSimuUsua_Create() {
        $this->txtSimuUsua = new QTextBox($this);
        $this->txtSimuUsua->Name = 'Simulando al Usuario';
        $this->txtSimuUsua->Required = true;
        $this->txtSimuUsua->Width = 100;
        $this->txtSimuUsua->AddAction(new QBlurEvent(), new QAjaxAction('txtSimuUsua_Blur'));
    }

    protected function lstCodiSist_Create() {
        $this->lstCodiSist = new QListBox($this);
        $this->lstCodiSist->Name = 'Sub-Sistema';
        $this->lstCodiSist->Required = true;
        $this->lstCodiSist->Width = 180;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Sistema()->CodiSist,array('pmn','sde'));
        $arrSistDisp   = Sistema::QueryArray(QQ::AndCondition($objClauWher));
        $this->lstCodiSist->AddItem('- Seleccione Uno -',null);
        foreach ($arrSistDisp as $objSistDisp) {
            $strNombSist = $objSistDisp->__toString();
            if ($objSistDisp->CodiSist == 'sde') {
                $strNombSist = 'SISCO';
            }
            $this->lstCodiSist->AddItem($strNombSist,$objSistDisp->CodiSist);
        }
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

    protected function txtLogiUsua_Blur() {
        if (!in_array($this->txtLogiUsua->Text, array('ddurand', 'ianzola'))) {
            $this->txtLogiUsua->Warning = "Acceso no Autorizado";
            $this->blnTodoOkey = false;
        } else {
            $this->txtLogiUsua->Warning = "";
            $this->blnTodoOkey = true;
            $this->objUsuaAdmi = Usuario::LoadByLogiUsua($this->txtLogiUsua->Text);
        }
    }

    protected function txtClavAcce_Blur($strFormId, $strControlId, $strParameter) {
        if ($this->objUsuaAdmi) {
            if ($this->objUsuaAdmi->PassUsua != md5($this->txtClavAcce->Text)) {
                $this->blnTodoOkey = false;
                $this->txtClavAcce->Warning = "Password Incorrecto";
            } else {
                $this->txtClavAcce->Warning = "";
                $this->blnTodoOkey = $this->blnTodoOkey ? true : false;
            }
        }
    }

    protected function txtSimuUsua_Blur() {
        $objUsuario = Usuario::LoadByLogiUsua($this->txtSimuUsua->Text);
        if (!$objUsuario) {
            $this->blnTodoOkey = false;
            $this->txtSimuUsua->Warning = "No existe este Usuario";
        } else {
            $this->blnTodoOkey = $this->blnTodoOkey ? true : false;
            $this->txtSimuUsua->Warning = "";
        }
        $this->btnAcceSist->Visible = $this->blnTodoOkey;
    }

    protected function btnAcceSist_Click() {
        $objUsuario = Usuario::LoadByLogiUsua($this->txtSimuUsua->Text);
        if ($objUsuario) {
            $_SESSION['User'] = serialize($objUsuario);
            // if ($objUsuario->PassUsua == md5($this->txtClavAcce->Text)) {
                if (is_null($objUsuario->FechAcce)) {
                    $objUsuario->FechAcce = new QDateTime(QDateTime::Now);
                }
                $_SESSION['country_code']  = 've';
                $_SESSION['language_code'] = 'es';
                $_SESSION['UltiAcce']      = $objUsuario->FechAcce;
                $_SESSION['Sistema']       = $this->lstCodiSist->SelectedValue;
                $_SESSION['NombSist']      = $this->lstCodiSist->SelectedName;
                $_SESSION['NombDire']      = 'yokohama';
                //define ('__SIST__', '/newliberty/app/'.$_SESSION['Sistema']);
                define ('__SIST__', '/app/'.$_SESSION['Sistema']);

                // $objUsuario->FechAcce = new QDateTime(QDateTime::Now);
                // $objUsuario->CantInte = 0;
                // $objUsuario->Save();

                $this->SetupValoresDeSesion($_SESSION['Sistema']);
                //-----------------------------------------------------------------------------
                // Si la clave de acceso ha caducado, el Usuario debera actualizarla
                //-----------------------------------------------------------------------------
                // if (is_null($objUsuario->FechClav)) {
                //     $objUsuario->FechClav = new QDateTime(QDateTime::Now);
                // }
                // if (DiasTranscurridos(date('Y-m-d'), $objUsuario->FechClav->__toString("YYYY-MM-DD")) >= 90) {
                //     $_SESSION['ClavVenc'] = 1;
                //     QApplication::Redirect('app/cambiar_clave.php');
                // }

                PilaAcceso::Clean();
                QApplication::Redirect('app/mg.php');
            // } else {
                // $this->txtClavAcce->Warning = ' Contraseña Errada';
                // $this->txtClavAcce->Width   = 100;
                // //--------------------------------------
                // // Esto se cuenta como intento fallido
                // //--------------------------------------
                // $objUsuario->CantInte += 1;
                // $objUsuario->Save();
            // }
        } else {
            $this->txtLogiUsua->Warning = ' Usuario Desconocido';
            $this->txtLogiUsua->Width   = 100;
        }
    }

    protected function SetupValoresDeSesion($strSistPath) {
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
            $arrReceAuxi = Parametro::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            $arrValoMini = array();
            $arrValoMaxi = array();
            $arrValoPorc = array();
            foreach ($arrReceAuxi as $objParaSegu) {
                $arrValoMini[] = $objParaSegu->ParaVal1;
                $arrValoMaxi[] = $objParaSegu->ParaVal2;
                $arrValoPorc[] = $objParaSegu->ParaVal3;
            }

            // Hasta aquí lo de la nueva configuración para el seguro del Expeso Nacional

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
        } elseif ($strSistPath = 'sde') {
            //----------------------------------------------------------------------------------
            // Se establecen algunos valores de interés para el cálculo de la tarifa en el SDE.
            //----------------------------------------------------------------------------------
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
}
IndexMio::Run('IndexMio','indexmio.tpl.php');
?>


<?php

// class MiLoginForm extends QForm {
//
//    // protected $txtUsername;
//    // protected $txtPassword;
//    // protected $lblMensErro;
//    // protected $btnLogin;
//    // protected $imgLogin;
//    // protected $objParametro;
//    // protected $lstCodiSistObject;
//    // protected $sistema;
//    // protected $lblLogin;
//    // protected $lblClave;
//    // protected $txtMiLogin;
//    // protected $txtMiPassword;
//    // protected $objUsuaAdmi;
//
//    protected function Form_Create() {
//       // $this->lblMensErro = new QLabel($this);
//       // $this->lblMensErro->Text = '';
//       // $this->lblMensErro->Width = 220;
//       // $this->lblMensErro->HorizontalAlign = 'center';
//
//       // $this->imgLogin = new QImageButton($this);
//       // $this->imgLogin->ImageUrl = 'util/imagenes/apply_f2.png';
//       // $this->imgLogin->AddAction(new QClickEvent(), new QServerAction('btnLogin_Click'));
//       // $this->imgLogin->PrimaryButton = true;
//       // $this->imgLogin->CausesValidation = true;
//
//       // $this->txtMiLogin = new QTextBox($this);
//       // $this->txtMiLogin->Width = 80;
//       // $this->txtMiLogin->Required = true;
//       // $this->txtMiLogin->SetFocus();
//       // $this->txtMiLogin->AddAction(new QBlurEvent(), new QAjaxAction('txtMiLogin_Blur'));
//
//       // $this->txtMiPassword = new QTextBox($this);
//       // $this->txtMiPassword->TextMode = QTextMode::Password;
//       // $this->txtMiPassword->Width = 80;
//       // $this->txtMiPassword->Required = true;
//       // $this->txtMiPassword->AddAction(new QBlurEvent(), new QAjaxAction('txtMiPassword_Blur'));
//       //
//       // $this->lstCodiSistObject_Create();
//       //
//       // $this->txtUsername = new QTextBox($this);
//       // $this->txtUsername->Width = 80;
//       // $this->txtUsername->Required = true;
//
//       // $this->txtPassword = new QTextBox($this);
//       // $this->txtPassword->Name = QApplication::Translate('Clave');
//       // $this->txtPassword->TextMode = QTextMode::Password;
//       // $this->txtPassword->Width = 80;
//       // $this->txtPassword->Required = true;
//
//       // $this->objParametro = Parametro::Load('88888', 'logos');
//    }
//
//    //------------------------------------
//    // Acciones referidas a los objetos
//    //------------------------------------
//
//    // protected function txtMiLogin_Blur($strFormId, $strControlId, $strParameter) {
//    //    if (!in_array($this->txtMiLogin->Text, array('ddurand', 'lufeman'))) {
//    //       $this->imgLogin->Visible = false;
//    //       $this->txtMiLogin->Warning = "Acceso no Autorizado";
//    //    } else {
//    //       $this->imgLogin->Visible = true;
//    //       $this->txtMiLogin->Warning = "";
//    //       $this->objUsuaAdmi = Usuario::LoadByLogiUsua($this->txtMiLogin->Text);
//    //    }
//    // }
//
//    // protected function txtMiPassword_Blur($strFormId, $strControlId, $strParameter) {
//    //    if (in_array($this->txtMiLogin->Text, array('ddurand', 'lufeman'))) {
//    //       if ($this->objUsuaAdmi->PassUsua != md5($this->txtMiPassword->Text)) {
//    //          $this->txtMiPassword->Warning = "Password Incorrecto";
//    //          $this->imgLogin->Visible = FALSE;
//    //       } else {
//    //          $this->txtMiPassword->Warning = "";
//    //          $this->imgLogin->Visible = true;
//    //       }
//    //    }
//    // }
//
//    // protected function txtUsername_Blur($strFormId, $strControlId, $strParameter) {
//    //    if (in_array($this->txtUsername->Text, array('ddurand', 'lufeman'))) {
//    //       $objSistInfo = Sistema::Load('sig');
//    //       if ($objSistInfo) {
//    //          $this->lstCodiSistObject->AddItem($objSistInfo->DescSist, $objSistInfo->CodiSist);
//    //       }
//    //    } else {
//    //       $this->lstCodiSistObject->RemoveAllItems();
//    //       $this->lstCodiSistObject->Width = 200;
//    //       $objCodiSistObjectArray = Sistema::LoadAll();
//    //       $this->lstCodiSistObject->AddItem(QApplication::Translate('- Select One -'), null);
//    //       if ($objCodiSistObjectArray) {
//    //          foreach ($objCodiSistObjectArray as $objCodiSistObject) {
//    //             if (in_array($objCodiSistObject, array('dsp', 'sde', 'fac', 'cnt', 'int'))) {
//    //                $objListItem = new QListItem($objCodiSistObject->DescSist, $objCodiSistObject->CodiSist);
//    //                $this->lstCodiSistObject->AddItem($objListItem);
//    //             }
//    //          }
//    //       }
//    //       //-------------------------------------------------------
//    //       // Se verifica la existencia del login proporcionado
//    //       //-------------------------------------------------------
//    //       $objUsuario = Usuario::LoadByLogiUsua($this->txtUsername->Text);
//    //       if (!$objUsuario) {
//    //          $this->txtUsername->Warning = "No existe este Usuario";
//    //       } else {
//    //          $this->txtUsername->Warning = "";
//    //       }
//    //    }
//    // }
//
//    // protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
//    //    $blnTodoOkey = true;
//    //    $_SESSION['PagiReto'] = '';
//    //    $objUser = Usuario::LoadByLogiUsua($this->txtUsername->Text);
//    //    $_SESSION['UltiAcce'] = $objUser->FechAcce->__toString("DD/MM/YYYY hh:mm:ss");
//    //    $_SESSION['User'] = serialize($objUser);
//    //    $_SESSION['Sistema'] = $this->lstCodiSistObject->SelectedValue;
//    //    $_SESSION['Empresa'] = 'liberty';
//    //    QApplication::Redirect(sprintf('util/includes/ctrlmenu.php?NombMenu=%s', 'menuppal.php'));
//    // }
//
//    // protected function lstCodiSistObject_Create() {
//    //    $this->lstCodiSistObject = new QListBox($this);
//    //    $this->lstCodiSistObject->Name = QApplication::Translate('Sistema');
//    //    $this->lstCodiSistObject->Required = true;
//    //    $this->lstCodiSistObject->Width = 200;
//    //    $objCodiSistObjectArray = Sistema::LoadAll();
//    //    $this->lstCodiSistObject->AddItem(QApplication::Translate('- Select One -'), null);
//    //    if ($objCodiSistObjectArray)
//    //       foreach ($objCodiSistObjectArray as $objCodiSistObject) {
//    //          if (in_array($objCodiSistObject, array('dsp', 'sde', 'fac', 'cnt', 'int'))) {
//    //             $objListItem = new QListItem($objCodiSistObject->DescSist, $objCodiSistObject->CodiSist);
//    //             $this->lstCodiSistObject->AddItem($objListItem);
//    //          }
//    //       }
//    // }
//
//    // protected function lstChange_Click() {
//    //    $this->sistema = $this->lstCodiSistObject->SelectedValue;
//    // }
//
//    // protected function EnviarNotificacion($objUser) {
//    //    //---------------------------------------------------------
//    //    // Se envia el mensaje por e-mail a los administradores
//    //    //---------------------------------------------------------
//    //    $strEnviMail = BuscarParametro('MailAdmi', 'EnviSino', 'Txt1', 'S');
//    //    $strTextMens = "El Usuario " . $objUser->NombApel() . " (" . $objUser->LogiUsua . ") de la Sucursal (" . $objUser->CodiEsta . ")<br> intento acceder al Sistema pero esta inactivo por: <font color='red'>" . $objUser->MotiBloq . "</font>";
//    //    $strTituRepo = utf8_decode("Acceso Denegado en Liberty");
//    //    $to = array('danydurand@gmail.com', 'lufeman@gmail.com');
//    //    $mimemail = new MIMEMAIL('HTML');
//    //    $mimemail->senderName = 'LibertyExpress';
//    //    $mimemail->senderMail = 'localhost@app-libertyexpress.com';
//    //    $mimemail->subject = $strTituRepo;
//    //    $mimemail->body = $strTextMens;
//    //    $mimemail->create();
//    //    if ($strEnviMail == 'S') {
//    //       $mimemail->send($to);
//    //    }
//    // }
//
// }
//
// MiLoginForm::Run('MiLoginForm', 'indexmio.tpl.php');
?>
