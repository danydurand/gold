<?php
//---------------------------------------------------------------------------------------------------
// Programa       : cargar_guia.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 07/10/16 10:15 AM
// Proyecto       : newliberty
// Descripcion    : Programa principal que permite al Usuario Connect ingresar al Sistema CORP.
//---------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once('protected.inc.php');

class Index extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;

    protected $txtLogiUsua;
    protected $txtClavAcce;
    protected $btnAcceSist;

    protected function Form_Create() {

        $this->lblTituForm_Create();
        $this->lblMensUsua_Create();

        $this->txtLogiUsua_Create();
        $this->txtClavAcce_Create();

        $this->btnAcceSist_Create();

        $this->txtLogiUsua->SetFocus();
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'ACCESO CONNECT';
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
        $objUsuario = UsuarioConnect::LoadByLogiUsua($this->txtLogiUsua->Text);
        if ($objUsuario) {
            if (!is_null($objUsuario->DeletedAt)) {
                $objUsuario = null;
            }
        }
        if ($objUsuario) {
            if ($objUsuario->StatusId == StatusType::ACTIVO) {
                if ($objUsuario->ClaveAcceso == $this->txtClavAcce->Text) {
                    if (is_null($objUsuario->FechaAcceso)) {
                        $objUsuario->FechaAcceso = new QDateTime(QDateTime::Now);
                    }
                    $_SESSION['country_code']  = 've';
                    $_SESSION['language_code'] = 'es';
                    $_SESSION['UltiAcce']      = $objUsuario->FechaAcceso;
                    $_SESSION['Sistema']       = 'con';
                    $_SESSION['NombSist']      = 'CORP';
                    $_SESSION['NombDire']      = 'corp';
                    $_SESSION['Empresa']       = 'gold';
                    //define ('__SIST__', '/newliberty/'.$_SESSION['NombDire']);
                    //define ('__SIST__', '/'.$_SESSION['NombDire']);
                    define ('__SIST__', '/');

                    $objCliente = MasterCliente::Load($objUsuario->ClienteId);
                    $_SESSION['ClieMast'] = serialize($objCliente);

                    $objUsuario->FechaAcceso = new QDateTime(QDateTime::Now);
                    $objUsuario->CantidadIntentos = 0;
                    $objUsuario->Save();

                    $_SESSION['User'] = serialize($objUsuario);

                    $this->SetupValoresDeSesion($objUsuario);

                    //-------------------------------------------------------------------
                    // Si la clave de acceso ha caducado, el Usuario debera actualizarla
                    //-------------------------------------------------------------------
                    if (is_null($objUsuario->FechaRegistro)) {
                        $objUsuario->FechaRegistro = new QDateTime(QDateTime::Now);
                    }
                    if (DiasTranscurridos(date('Y-m-d'), $objUsuario->FechaRegistro->__toString("YYYY-MM-DD")) >= 90) {
                        $_SESSION['ClavVenc'] = 1;
                        //QApplication::Redirect('cambiar_clave.php');
                    }

                    PilaAcceso::Clean();
                    QApplication::Redirect('mg.php');
                } else {
                    $this->txtClavAcce->Warning = ' Contraseña Errada';
                    $this->txtClavAcce->Width   = 100;
                    //--------------------------------------
                    // Esto se cuenta como intento fallido
                    //--------------------------------------
                    $objUsuario->CantidadIntentos += 1;

                    if ($objUsuario->CantidadIntentos >= 5) {
                        $objUsuario->StatusId       = StatusType::INACTIVO;
                        $objUsuario->MotivoBloqueo  = 'Excedio la cantidad de intentos fallidos permitidos';
                        $this->txtLogiUsua->Warning = ' Usuario Bloqueado';
                        $this->txtLogiUsua->Width   = 100;
                    }

                    $objUsuario->Save();
                }
            } else {
                $this->txtLogiUsua->Warning = ' Usuario Inactivo';
                $this->txtLogiUsua->Width   = 100;
            }
        } else {
            $this->txtLogiUsua->Warning = ' Usuario Desconocido';
            $this->txtLogiUsua->Width   = 100;
        }
    }

    protected function SetupValoresDeSesion($objUsuaConn) {
        $strEmaiSopo = BuscarParametro('CntaSopo','EmaiSopo','Txt1','soportelufeman@gmail.com');
        $_SESSION['EmaiSopo'] = serialize($strEmaiSopo);
        //---------------------------------------------------------------------------------------------------------
        // Se establecen algunos valores de interés para el cálculo de la tarifa en todos los Sistemas en general.
        //---------------------------------------------------------------------------------------------------------
        $dteFechDhoy = FechaDeHoy();
        $decIvaxDhoy = FacImpuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);
        $objProducto = FacProducto::LoadBySiglProd('DOC');
        $arrOperGene = SdeOperacion::LoadArrayByRutaId('R9999');
        $intOperGene = 1; //$arrOperGene[0]->CodiOper;
        //-------------------------
        // Reconversion Monetaria
        //-------------------------
        $decFactReco = 100000;
        $objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
        if ($objConfReco) {
            $decFactReco = (float)$objConfReco->ParaVal2;
        }
        //--------------------------------------------
        // Obteniendo valores de rango del seguro ...
        //--------------------------------------------
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
        foreach ($arrReceAuxi as $objParaSegu) {
            $arrValoMini[] = $objParaSegu->ParaVal1;
            $arrValoMaxi[] = $objParaSegu->ParaVal2;

            $arrRecoMini[] = $objParaSegu->ParaVal1 / $decFactReco;
            $arrRecoMaxi[] = $objParaSegu->ParaVal2 / $decFactReco;
        }
        //------------------
        // Minimo y Maximo
        //------------------
        $intCantElem = count($arrValoMini)-1;
        $decValoMini = $arrValoMini[0];
        $decValoMaxi = $arrValoMaxi[$intCantElem];
        //-------------------------------
        // Minimo y Maximo Reconvertido
        //-------------------------------
        $decRecoMini = $arrRecoMini[0];
        $decRecoMaxi = $arrRecoMaxi[$intCantElem];
        //------------------------------------------------------------------
        // Obteniendo Sucursales de Venezuela activas y que no son almacén.
        //------------------------------------------------------------------
        $arrSucuActi = Estacion::LoadSucursalesActivasToClients();
        $arrSucuZcod = Estacion::LoadSucursalesActivasCodToClients();
        //---------------------------------------------------------------------------
        // Obteniendo los destinatarios frecuentes del Cliente ordenados por Nombre.
        //---------------------------------------------------------------------------
        $arrDestTemp = DestinatarioFrecuente::LoadArrayByClienteId(
            $objUsuaConn->ClienteId,
            QQ::Clause(QQ::OrderBy(QQN::DestinatarioFrecuente()->Nombre))
        );
        $arrDestFrec = array();
        foreach ($arrDestTemp as $objDestFrec) {
            if (strlen(trim($objDestFrec->Nombre)) > 0) {
                $arrDestFrec[] = $objDestFrec;
            }
        }
        $objCkptNore = SdeCheckpoint::Load('NR');
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
        //----------------------------------------------------------
        // Variables de Session que se usan a lo largo del Sistema.
        //----------------------------------------------------------
        $_SESSION['CkptNore'] = serialize($objCkptNore);
        $_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
        $_SESSION['ProdGuia'] = serialize($objProducto);
        $_SESSION['OperGene'] = serialize($intOperGene);

        $_SESSION['ValoMini'] = serialize($decValoMini);
        $_SESSION['ValoMaxi'] = serialize($decValoMaxi);
        $_SESSION['ValoMin1'] = serialize($arrValoMini);
        $_SESSION['ValoMax1'] = serialize($arrValoMaxi);

        $_SESSION['RecoMini'] = serialize($decRecoMini);
        $_SESSION['RecoMaxi'] = serialize($decRecoMaxi);
        $_SESSION['RecoMin1'] = serialize($arrRecoMini);
        $_SESSION['RecoMax1'] = serialize($arrRecoMaxi);

        $_SESSION['SucuActi'] = serialize($arrSucuActi);
        $_SESSION['SucuZcod'] = serialize($arrSucuZcod);
        $_SESSION['DestFrec'] = serialize($arrDestFrec);
        $_SESSION['NombEmpr'] = 'Gold Coast';
    }
}

Index::Run('Index','index.tpl.php');