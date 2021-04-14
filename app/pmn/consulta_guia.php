<?php
//-------------------------------------------------------------------------------------
// Programa       : consulta_guia.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 07/07/16 12:44 PM
// Proyecto       : newliberty
// Descripcion    : Este programa muestra información detallada de una guía al Usuario
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/validar_ubicacion.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ConsultaGuia extends FormularioBaseKaizen {

    protected $objGuia;
    protected $objCliePmnx;
    protected $objFactPmnx;
    protected $objMastClie;

    protected $mctGuia;
    protected $dtgGuiaCkpt;
    protected $dtgRegiTrab;

    // Información del Remitente
    protected $lblNumeGuia;
    protected $lblFechGuia;
    protected $lblNumeCedu;
    protected $lblNombClie;
    protected $lblTeleFijo;
    protected $lblTeleMovi;
    protected $lblDireClie;

    // Información del Destinatario
    protected $lblSucuDest;
    protected $lblReceDomi;
    protected $lblReceDest;
    protected $lblNombDest;
    protected $lblCeduDest;
    protected $lblTeleDest;
    protected $lblDireDest;

    // Informacion del Envio
    protected $lblCantPiez;
    protected $lblPesoGuia;
    protected $lblDescCont;
    protected $lblValoDecl;
    protected $lblModaPago;
    protected $lblUbicFisi;

    protected $lblMontBase;
    protected $lblMontIvax;
    protected $lblMontFran;
    protected $lblMontSegu;
    protected $lblMontTota;

    protected $lblTickFisc;
    protected $lblCeduRifx;
    protected $lblRazoSoci;

    // Informacion del POD
    protected $lblPersEntr;
    protected $lblUsuaPodx;
    protected $lblFechEntr;

    protected $blnGuiaFact;
    protected $blnEstaFact;
    protected $blnConsCupo;
    protected $intIdxxCupo;
    protected $strSucuOrig;
    protected $strReceOrig;

    protected $arrDataTabl;
    protected $intCantRegi;
    protected $intPosiRegi;

    // Botones de navegacion
    protected $btnPrimRegi;
    protected $btnRegiAnte;
    protected $btnProxRegi;
    protected $btnUltiRegi;

    protected $btnPrimSmal;
    protected $btnAnteSmal;
    protected $btnProxSmal;
    protected $btnUltiSmal;

    // Botones corrientes
    protected $btnEditGuia;
    protected $btnMasxAcci;
    protected $btnDescAmpl;

    protected $lblDescAmpl;
    protected $txtDescAmpl;
    protected $btnSaveDesc;

    protected function SetupValores() {
        //------------------------------------------
        // Obteniendo el Nro de la guía a consultar
        //------------------------------------------
        $strNumeGuia = QApplication::PathInfo(0);

        if ($strNumeGuia) {
            $this->objGuia = Guia::Load($strNumeGuia);

            if (!$this->objGuia) {
                throw new Exception('Could not find a Guia object with PK arguments: ' . $strNumeGuia);
            }
        } else {
            $this->mensaje('Debe especificar un Número de Guía para Consultar','m','d','hand-stop-o');
        }

        $this->objCliePmnx = ClientePmn::Load($this->objGuia->CedulaRif);

        //------------------------------------------------------------------------------------------------------------
        // Si el cliente de la guía no se localiza en el registro de clientes del Expreso Nacional, entonces el mismo
        // es un cliente del Sistema CORP, por lo que la Guía es un COD Nacional (originada desde el SicCO o desde
        // CORP)
        //------------------------------------------------------------------------------------------------------------
        if (!$this->objCliePmnx) {
            t('No es un Cliente Exp Nac');
            $this->objMastClie = MasterCliente::Load($this->objGuia->CodiClie);
        }

        //--------------------------------
        // Valores obtenidos de la sesión
        //--------------------------------
        $this->strSucuOrig = unserialize($_SESSION['SucuOrig']);
        $this->strReceOrig = unserialize($_SESSION['ReceOrig']);

        //------------------------------------------------------
        // Si la guia esta facturada, aqui se lee la factura
        //------------------------------------------------------
        $this->blnEstaFact = false;
        if ($this->objGuia->EstaFacturada()) {
            $this->blnEstaFact = true;
            $this->objFactPmnx = FacturaPmn::Load($this->objGuia->FacturaId);
        }

        //--------------------------------------
        // Se verifica si la guia es Facturable
        //--------------------------------------
        $this->blnGuiaFact = false;
        t('=======================================================');
        t('Evaluando si la Guia Nro: '.$this->objGuia->NumeGuia.' es Facturable');
        if ($this->objGuia->TipoGuia == TipoGuiaType::CODCOBROENDESTINO) {
	        t('La Mod. de Pago es COD');
            //--------------------------------------------------------------------
            // La Guia es COD y el Destino coincide con la localidad del Usuario
            //--------------------------------------------------------------------
            t('Receptoria Destino de la Guia: '.$this->objGuia->ReceptoriaDestino);
            t('Receptoria del Usuario: '.$this->strReceOrig);
            if (trim($this->objGuia->ReceptoriaDestino) == trim($this->strReceOrig)) {
                t('Las Receptorias coinciden, la guia se puede facturar');
                $this->blnGuiaFact = true;
            } elseif ($this->objGuia->SistemaId == 'sde') {
                t('La guia fue hecho en el SisCO');
                //------------------------------------
                // Se trata de una Guía SDE o CORP
                //------------------------------------
                t('El Destino de la Guia es: '.$this->objGuia->EstaDest);
                t('La Sucursal del Usuario: '.$this->strSucuOrig);
                if (trim($this->objGuia->EstaDest) == trim($this->strSucuOrig)) {
                    t('El Usuario esta en la Sucursal Destino, la guia se puede facturar');
                    $this->blnGuiaFact = true;
                }
            }
            //--------------------------------------------------------------------
            // La Guia es COD con entrega a DOMICILIO, tambien se puede facturar
            //--------------------------------------------------------------------
            if (trim($this->objGuia->ReceptoriaDestino) == trim($this->strSucuOrig)) {
                $this->blnGuiaFact = true;
            }
            t('El Destino de la Guia es: '.$this->objGuia->EstaDest);
            t('La Sucursal del Usuario: '.$this->strSucuOrig);
            if ((trim($this->objGuia->EstaDest) == trim($this->strSucuOrig)) &&
                (strlen(trim($this->objGuia->ReceptoriaDestino)) == 0)) {
                t('El Usuario esta en la Sucursal Destino y no hay Receptoria Destino, la guia se puede facturar');
                $this->blnGuiaFact = true;
            }

            if (!$this->blnGuiaFact) {
                //-----------------------------------------------------------------------------------------------
                // Otra posibilidad para que una guia sea Facturable, es que la Sucursal en la que se encuentra
                // el Usuario, se el "Centro de Facturacion" del Destino de la guia.
                //-----------------------------------------------------------------------------------------------
                t('La Sucursal Destino de la guia se factura en: '.$this->objGuia->EstaDestObject->SeFacturaEn);
                if (strlen($this->objGuia->EstaDestObject->SeFacturaEn) > 0) {
                    if (trim($this->objGuia->EstaDestObject->SeFacturaEnObject->Siglas) == trim($this->strSucuOrig)) {
                        t('El Usuario esta en la Sucursal en la cual se factura la guia, la guia se puede facturar');
                        $this->blnGuiaFact = true;
                    } elseif ($this->objMastClie) {
                        t('Se trata de una guia SisCO o CORP');
                        //------------------------------------
                        // Se trata de una Guía SDE o CORP
                        //------------------------------------
                        if (trim($this->objGuia->EstaDestObject->SeFacturaEnObject->Siglas) == trim($this->strReceOrig)) {
                            t('El Usuario esta en la Sucursal en la cual se factura la guia, la guia se puede facturar');
                            $this->blnGuiaFact = true;
                        }
                    }
                }
            }
        } else {
            if (!$this->objMastClie) {
                t('Se trata de una guia PPD creada en el Exp Nac, la guia se puede factura');
                //-----------------------------------------------------------
                // La Guia es PrePagada y fue creada en el Expreso Nacional
                //-----------------------------------------------------------
                $this->blnGuiaFact = true;
            }
        }
        t('La Variable tiene: '.$this->blnGuiaFact);
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();
        $this->determinarPosicion();

        if ($this->objMastClie) {
            $this->lblTituForm->Text = 'Guía COD Nacional';
        } else {
            $this->lblTituForm->Text = 'Guía Expreso Nacional';
        }
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

        $this->mctGuia = GuiaMetaControl::CreateFromPathInfo($this);

        //---- Remitente ----
        $this->lblNumeGuia_Create();
        $this->lblFechGuia_Create();
        $this->lblNumeCedu_Create();
        $this->lblNombClie_Create();
        $this->lblTeleFijo_Create();
        $this->lblTeleMovi_Create();
        $this->lblDireClie_Create();

        //---- Destinatario ----
        $this->lblSucuDest_Create();
        $this->lblReceDomi_Create();
        $this->lblReceDest_Create();
        $this->lblNombDest_Create();
        $this->lblCeduDest_Create();
        $this->lblTeleDest_Create();
        $this->lblDireDest_Create();

        //---- Envío ----
        $this->lblCantPiez_Create();
        $this->lblPesoGuia_Create();
        $this->lblDescCont_Create();
        $this->lblValoDecl_Create();
        $this->lblModaPago_Create();
        $this->lblUbicFisi_Create();

        //---- Costos del Servicio ----
        $this->lblMontBase_Create();
        $this->lblMontIvax_Create();
        $this->lblMontFran_Create();
        $this->lblMontSegu_Create();
        $this->lblMontTota_Create();

        //---- Factura ----
        $this->lblTickFisc_Create();
        $this->lblCeduRifx_Create();
        $this->lblRazoSoci_Create();

        //---- POD ----
        $this->lblPersEntr_Create();
        $this->lblFechEntr_Create();
        $this->lblUsuaPodx_Create();

        //---- Checkpoints ----
        $this->dtgGuiaCkpt_Create();

        //---- Registro de trabajo (Histórico) ----
        $this->dtgRegiTrab_Create();

        //-------------------
        // Botones regulares
        //-------------------
        $this->btnSave->Text = TextoIcono('save','Guardar','F','lg');

        //----------------------------------------------------------------------------------------------------------
        // El boton Guardar se muestra si y solo si la guia es SDE o Connect, y si la guia aun no ha sido facturada
        //----------------------------------------------------------------------------------------------------------
        if ($this->objMastClie && !$this->blnEstaFact) {
            $this->btnSave->Visible = true;
        } else {
            $this->btnSave->Visible = false;
        }

        $this->btnEditGuia_Create();
        $this->btnMasxAcci_Create();
        $this->btnDescAmpl_Create();

        $this->lblDescAmpl_Create();
        $this->txtDescAmpl_Create();
        $this->btnSaveDesc_Create();
        //------------------------
        // Botones de Navegacion
        //------------------------

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->btnPrimSmal_Create();
        $this->btnAnteSmal_Create();
        $this->btnProxSmal_Create();
        $this->btnUltiSmal_Create();

        $this->verificarNavegacion();

        if (TipoGuiaType::ToStringCorto($this->objGuia->TipoGuia) == 'COD') {
            $this->corregirReceptoriaDestino();
        }
    }

    //---------------------
    // Creando objetos ...
    //---------------------

    protected function lblNumeGuia_Create() {
        $this->lblNumeGuia = new QLabel($this);
        $this->lblNumeGuia->Name = 'Guia #';
        $this->lblNumeGuia->Text = $this->objGuia->NumeGuia;
    }

    protected function lblFechGuia_Create() {
        $this->lblFechGuia = new QLabel($this);
        $this->lblFechGuia->Name = 'Fecha';
        $this->lblFechGuia->Text = $this->objGuia->FechGuia->__toString("DD/MM/YYYY");
    }

    protected function lblNumeCedu_Create() {
        $this->lblNumeCedu = new QLabel($this);
        $this->lblNumeCedu->Name = 'Cedula/RIF';
        $this->lblNumeCedu->Text = $this->objGuia->CedulaRif;
    }

    protected function lblNombClie_Create() {
        $this->lblNombClie = new QLabel($this);
        $this->lblNombClie->Name = 'Nombre';
        $this->lblNombClie->Text = $this->objGuia->NombRemi;
    }

    protected function lblTeleFijo_Create() {
        $this->lblTeleFijo = new QLabel($this);
        $this->lblTeleFijo->Name = 'Tlf. Fijo';
        $this->lblTeleFijo->Text = $this->objGuia->TeleRemi;
    }

    protected function lblTeleMovi_Create() {
        $this->lblTeleMovi = new QLabel($this);
        $this->lblTeleMovi->Name = 'Tlf. Cel';
        $this->lblTeleMovi->Text = $this->objCliePmnx ? $this->objCliePmnx->TelefonoMovil : $this->objMastClie->TeleCona;
    }

    protected function lblDireClie_Create() {
        $this->lblDireClie = new QLabel($this);
        $this->lblDireClie->Name = 'Direccion';
        $this->lblDireClie->Text = $this->objGuia->DireRemi;
    }

    //-------- Información del Destinatario --------

    protected function lblSucuDest_Create() {
        $this->lblSucuDest = new QLabel($this);
        $this->lblSucuDest->Name = 'Destino';
        $this->lblSucuDest->Text = $this->objGuia->EstaDest;
    }

    protected function lblReceDomi_Create() {
        $this->lblReceDomi = new QLabel($this);
        $this->lblReceDomi->Name = 'Servicio';
        $objReceDest = Counter::LoadBySiglas($this->objGuia->ReceptoriaDestino);
        if ($objReceDest) {
            if ($objReceDest->EsRuta == SinoType::SI) {
                $strTipoServ = 'DOMICILIO';
            } else {
                $strTipoServ = 'RECEPTORIA';
            }
        } else {
            $strTipoServ = 'DOMICILIO';
        }
        $this->lblReceDomi->Text = $strTipoServ;
    }

    protected function lblReceDest_Create() {
        $this->lblReceDest = new QLabel($this);
        $this->lblReceDest->Name = 'Recept. ?';
        $objReceDest = Counter::LoadBySiglas($this->objGuia->ReceptoriaDestino);
        if ($objReceDest) {
            if ($objReceDest->EsRuta == SinoType::SI) {
                $strReceDest = 'DOM';
            } else {
                $strReceDest = $this->objGuia->ReceptoriaDestino;
            }
        } else {
            $strReceDest = 'DOM';
        }
        $this->lblReceDest->Text = $strReceDest;
    }

    protected function lblNombDest_Create() {
        $this->lblNombDest = new QLabel($this);
        $this->lblNombDest->Name = 'Nombre';
        $this->lblNombDest->Text = $this->objGuia->NombDest;
    }

    protected function lblCeduDest_Create() {
        if ($this->objMastClie && !$this->blnEstaFact) {
            $this->lblCeduDest = new QTextBox($this);
        } else {
            $this->lblCeduDest = new QLabel($this);
        }
        $this->lblCeduDest->Name = 'Cedula/RIF';
        $this->lblCeduDest->Text = $this->objGuia->CedulaDestinatario;
    }

    protected function lblTeleDest_Create() {
        $this->lblTeleDest = new QLabel($this);
        $this->lblTeleDest->Name = 'Telefono';
        $this->lblTeleDest->Text = $this->objGuia->TeleDest;
    }

    protected function lblDireDest_Create() {
        $this->lblDireDest = new QLabel($this);
        $this->lblDireDest->Name = 'Direccion';
        $this->lblDireDest->Text = substr($this->objGuia->DireDest,0,60);
        $this->lblDireDest->ToolTip = $this->objGuia->DireDest;
    }

    //-------- Información del Envío --------

    protected function lblCantPiez_Create() {
        $this->lblCantPiez = new QLabel($this);
        $this->lblCantPiez->Name = 'Pzas/Peso';
        $this->lblCantPiez->Text = $this->objGuia->CantPiez.' / '.$this->objGuia->PesoGuia." Kg";
    }

    protected function lblPesoGuia_Create() {
        $this->lblPesoGuia = new QLabel($this);
        $this->lblPesoGuia->Name = 'Peso';
        $this->lblPesoGuia->Text = $this->objGuia->PesoGuia." (Kg)";
    }

    protected function lblDescCont_Create() {
        $this->lblDescCont = new QLabel($this);
        $this->lblDescCont->Name = 'Contenido';
        $this->lblDescCont->Text = substr($this->objGuia->DescCont,0,15);
        $this->lblDescCont->ToolTip = $this->objGuia->DescCont;
    }

    protected function lblValoDecl_Create() {
        $this->lblValoDecl = new QLabel($this);
        $this->lblValoDecl->Name = 'V. Decl';
        $this->lblValoDecl->Text = $this->objGuia->ValorDeclarado." Bs";
    }

    protected function lblModaPago_Create() {
        $this->lblModaPago = new QLabel($this);
        $this->lblModaPago->Name = 'M. Pago';
        $this->lblModaPago->Text = TipoGuiaType::ToStringCorto($this->objGuia->TipoGuia);
    }

    protected function lblUbicFisi_Create() {
        $this->lblUbicFisi = new QLabel($this);
        $this->lblUbicFisi->Name = 'Ubicacion';
        $this->lblUbicFisi->Text = substr($this->objGuia->Ubicacion,0,15);
        $this->lblUbicFisi->ToolTip = $this->objGuia->Ubicacion;
    }

    //-------- Información de los Costos de los Servicios --------

    protected function lblMontBase_Create() {
        $this->lblMontBase = new QLabel($this);
        $this->lblMontBase->Name = 'Mto Base';
        $this->lblMontBase->Text = $this->objGuia->MontoBase;
        //$this->lblMontBase->Width = 20;
    }

    protected function lblMontIvax_Create() {
        $this->lblMontIvax = new QLabel($this);
        $this->lblMontIvax->Name = 'I.V.A. ('.$this->objGuia->PorcentajeIva.'%)';
        $this->lblMontIvax->Text = $this->objGuia->MontoIva;
    }

    protected function lblMontFran_Create() {
        $this->lblMontFran = new QLabel($this);
        $this->lblMontFran->Name = 'Franqueo';
        $this->lblMontFran->Text = $this->objGuia->MontoFranqueo;
    }

    protected function lblMontSegu_Create() {
        $this->lblMontSegu = new QLabel($this);
        $this->lblMontSegu->Name = 'Seguro';
        $this->lblMontSegu->Text = $this->objGuia->MontoSeguro;
    }

    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Name = 'Mto. Total';
        $this->lblMontTota->Text = $this->objGuia->MontoTotal;
        $this->lblMontTota->HtmlEntities = false;
    }

    //-------- Información de la Factura --------

    protected function lblTickFisc_Create() {
        $this->lblTickFisc = new QLabel($this);
        $this->lblTickFisc->Name = 'Doc. Fisc';
        if ($this->blnEstaFact) {
            $this->lblTickFisc->Text = $this->objFactPmnx->Numero.' / '.
                                       $this->objFactPmnx->FechaImpresion.' / '.
                                       $this->objFactPmnx->HoraImpresion;
        } else {
            $this->lblTickFisc->Text = '';
        }
    }

    protected function lblCeduRifx_Create() {
        $this->lblCeduRifx = new QLabel($this);
        $this->lblCeduRifx->Name = 'Ced/RIF';
        if ($this->blnEstaFact) {
            $this->lblCeduRifx->Text = $this->objFactPmnx->CedulaRif;
        } else {
            $this->lblCeduRifx->Text = '';
        }
    }

    protected function lblRazoSoci_Create() {
        $this->lblRazoSoci = new QLabel($this);
        $this->lblRazoSoci->Name = 'R. Social';
        if ($this->blnEstaFact) {
            $this->lblRazoSoci->Text = substr($this->objFactPmnx->RazonSocial,0,17);
            $this->lblRazoSoci->ToolTip = $this->objFactPmnx->RazonSocial;
        } else {
            $this->lblRazoSoci->Text = '';
            $this->lblRazoSoci->ToolTip = '';
        }
    }

    //-------- Información del POD --------

    protected function lblPersEntr_Create() {
        $this->lblPersEntr = new QLabel($this);
        $this->lblPersEntr->Name = 'Entr. A';
        $this->lblPersEntr->Text = substr($this->objGuia->EntregadoA,0,14);
        $this->lblPersEntr->ToolTip = $this->objGuia->EntregadoA;
    }

    protected function lblUsuaPodx_Create() {
        $this->lblUsuaPodx = new QLabel($this);
        $this->lblUsuaPodx->Name = 'Usua/Fecha';
        if ($this->objGuia->UsuarioPod) {
            $objUsuaPodx = Usuario::Load($this->objGuia->UsuarioPod);
            $strUsuaPodx = trim($objUsuaPodx->LogiUsua);
            $strFechPodx = $this->objGuia->FechaPod->__toString("DD/MM/YYYY");
            $this->lblUsuaPodx->Text = $strUsuaPodx.' ('.$strFechPodx.')';
        } else {
            $this->lblUsuaPodx->Text = null;
        }
    }

    protected function lblFechEntr_Create() {
        $this->lblFechEntr = new QLabel($this);
        $this->lblFechEntr->Name = 'Entr. el';
        if ($this->objGuia->FechaEntrega) {
            $this->lblFechEntr->Text = $this->objGuia->FechaEntrega->__toString("DD/MM/YYYY");
        } else {
            $this->lblFechEntr->Text = null;
        }
    }

    //-------- Información de Checkpoints de la Guía --------

    protected function dtgGuiaCkpt_Create() {
        $this->dtgGuiaCkpt = new QDataGrid($this);
        $this->dtgGuiaCkpt->CellPadding = 0;
        $this->dtgGuiaCkpt->CellSpacing = 0;
        $this->dtgGuiaCkpt->FontSize    = 12;

        $colSiglCkpt = new QDataGridColumn('Sucursal', '<?= $_ITEM->CodiEstaObject->CodiEsta ?>');
        $colSiglCkpt->Width = 15;
        $colSiglCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colSiglCkpt);

        $colDescCkpt = new QDataGridColumn('Observacion', '<?= $_FORM->dtgGuiaCkpt_TextObse_Render($_ITEM); ?>');
        $colDescCkpt->Width = 150;
        $colDescCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colDescCkpt);

        $colFechCkpt = new QDataGridColumn('Fecha', '<?= $_ITEM->FechCkpt->__toString("DD/MM/YYYY") ?>');
        $colFechCkpt->Width = 45;
        $colFechCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colFechCkpt);

        $colHoraCkpt = new QDataGridColumn('Hora', '<?= $_ITEM->HoraCkpt ?>');
        $colHoraCkpt->Width = 40;
        $colHoraCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colHoraCkpt);

        $colUsuaCkpt = new QDataGridColumn('Usuario', '<?= $_ITEM->CodiUsuaObject->LogiUsua ?>');
        $colUsuaCkpt->CssClass = 'campo';
        $colUsuaCkpt->Width = 35;
        $colUsuaCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colUsuaCkpt);

        // Let's pre-default the sorting by id (column index #0) and use AJAX
        $this->dtgGuiaCkpt->SortColumnIndex = 0;
        $this->dtgGuiaCkpt->UseAjax = true;

        // Specify the DataBinder method for the DataGrid
        $this->dtgGuiaCkpt->SetDataBinder('dtgGuiaCkpt_Bind');
    }

    public function dtgGuiaCkpt_TextObse_Render(GuiaCkpt $objGuiaCkpt) {
        $strCodiCkpt = $objGuiaCkpt->CodiCkpt;
        $strTextObse = $objGuiaCkpt->TextObse;
        if (strlen($strTextObse) > 0) {
            $strTextObse = '('.$strCodiCkpt.') '.limpiarCadena($strTextObse);
        }
        return utf8_encode($strTextObse);
    }

    //-------- Información de Registro de Trabajo (Histórico) --------

    protected function dtgRegiTrab_Create() {
        $this->dtgRegiTrab = new QDataGrid($this);
        $this->dtgRegiTrab->CellPadding = 0;
        $this->dtgRegiTrab->CellSpacing = 0;
        $this->dtgRegiTrab->FontSize    = 12;

        $colSiglCkpt = new QDataGridColumn('Sucursal', '<?= $_ITEM->Sucursal->CodiEsta ?>');
        $colSiglCkpt->Width = 15;
        $colSiglCkpt->HtmlEntities = false;
        $this->dtgRegiTrab->AddColumn($colSiglCkpt);

        $colUsuaCkpt = new QDataGridColumn('Comentario', '<?= $_ITEM->Comentario ?>');
        $colUsuaCkpt->Width = 260;
        $colUsuaCkpt->HtmlEntities = false;
        $this->dtgRegiTrab->AddColumn($colUsuaCkpt);

        $colDescCkpt = new QDataGridColumn('Fecha', '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>');
        $colDescCkpt->Width = 60;
        $colDescCkpt->HtmlEntities = false;
        $this->dtgRegiTrab->AddColumn($colDescCkpt);

        $colFechCkpt = new QDataGridColumn('Hora', '<?= $_ITEM->Hora ?>');
        $colFechCkpt->Width = 18;
        $colFechCkpt->HtmlEntities = false;
        $this->dtgRegiTrab->AddColumn($colFechCkpt);

        $colHoraCkpt = new QDataGridColumn('Usuario', '<?= $_ITEM->Usuario->LogiUsua ?>');
        $colHoraCkpt->Width = 25;
        $colHoraCkpt->HtmlEntities = false;
        $this->dtgRegiTrab->AddColumn($colHoraCkpt);

        // Let's pre-default the sorting by id (column index #0) and use AJAX
        $this->dtgRegiTrab->SortColumnIndex = 0;
        $this->dtgRegiTrab->UseAjax = true;

        // Specify the DataBinder method for the DataGrid
        $this->dtgRegiTrab->SetDataBinder('dtgRegiTrab_Bind');
    }


    protected function btnEditGuia_Create() {
        $this->btnEditGuia = new QButtonI($this);
        $this->btnEditGuia->Text = TextoIcono('pencil-square-o','Editar');
        $this->btnEditGuia->AddAction(new QClickEvent(), new QAjaxAction('btnEditGuia_Click'));
        $this->btnEditGuia->Visible = !$this->objMastClie;
    }

    protected function btnDescAmpl_Create() {
        $this->btnDescAmpl = new QButtonD($this);
        $this->btnDescAmpl->Text = TextoIcono('clone','Desc.Ampl.');
        $this->btnDescAmpl->AddAction(new QClickEvent(), new QAjaxAction('btnDescAmpl_Click'));
        $this->btnDescAmpl->Visible = !$this->objMastClie;
    }

    protected function lblDescAmpl_Create() {
        $this->lblDescAmpl = new QLabel($this);
        $this->lblDescAmpl->Text = 'Descripcion Ampliada <b>(No utilice caractres especiales)</b>';
        $this->lblDescAmpl->HtmlEntities = false;
        $this->lblDescAmpl->Visible = false;
    }

    protected function btnSaveDesc_Create() {
        $this->btnSaveDesc = new QButtonS($this);
        $this->btnSaveDesc->Text = TextoIcono('floppy-o','Guardar Descripcion Ampliada');
        $this->btnSaveDesc->AddAction(new QClickEvent(), new QAjaxAction('btnSaveDesc_Click'));
        $this->btnSaveDesc->CausesValidation = true;
        $this->btnSaveDesc->Visible = false;
    }

    protected function txtDescAmpl_Create(){
        $this->txtDescAmpl = new QTextBox($this);
        $this->txtDescAmpl->Name = 'Descripción de Contenido Ampliada';
        $this->txtDescAmpl->Text = $this->objGuia->DescCont;
        $this->txtDescAmpl->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtDescAmpl->TextMode = QTextMode::MultiLine;
        $this->txtDescAmpl->Required = true;
        $this->txtDescAmpl->Rows = 8;
        $this->txtDescAmpl->Columns = 100;
        $this->txtDescAmpl->Visible = false;
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $strTextBoto   = TextoIcono('plus','Acciones');
        $arrOpciDrop   = array();
        $arrOpciDrop[] = OpcionDropDown(__SIST__.'/guia_pdf.php?strNumeGuia='.$this->objGuia->NumeGuia,TextoIcono('print','Imprimir'));

        if ($this->blnGuiaFact) {
            if (!is_null($this->objGuia->FacturaId)) {
                $mixParaFact = 'intNumeFact='.$this->objGuia->FacturaId;
            } else {
                $mixParaFact = 'strNumeGuia='.$this->objGuia->NumeGuia;
            }
            $arrOpciDrop[] = OpcionDropDown(__SIST__.'/crear_factura.php?'.$mixParaFact,TextoIcono('credit-card','Facturar'));
        }

        /*
        if ($this->habilitarBotonCupon()) {
            $arrOpciDrop[] = OpcionDropDown(__SIST__.'/asignar_cupon.php/'.$this->objGuia->NumeGuia,TextoIcono('ticket','Asignar Cupón'));
        }
        if ($this->blnConsCupo) {
            $arrOpciDrop[] = OpcionDropDown(__SIST__.'/cupon_guia_edit.php/'.$this->intIdxxCupo,TextoIcono('ticket','Consultar Cupón'));
        }
        */

        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);
    }


    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
        $this->btnProxRegi->Text = TextoIcono('angle-right fa-lg','Proximo','P');
        $this->btnProxRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        $this->btnRegiAnte->Text = TextoIcono('angle-left fa-lg','Anterior');
        $this->btnRegiAnte->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        $this->btnPrimRegi->Text = TextoIcono('angle-double-left fa-lg','Primero');
        $this->btnPrimRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        $this->btnUltiRegi->Text = TextoIcono('angle-double-right fa-lg','Ultimo','P');
        $this->btnUltiRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    //-------- Botones de posición pequeños --------
    protected function btnPrimSmal_Create() {
        $this->btnPrimSmal = new QButton($this);
        $this->btnPrimSmal->Text = TextoIcono('angle-double-left fa-lg','');
        $this->btnPrimSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimSmal->HtmlEntities = false;
        $this->btnPrimSmal->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnAnteSmal_Create() {
        $this->btnAnteSmal = new QButton($this);
        $this->btnAnteSmal->Text = TextoIcono('angle-left fa-lg','');
        $this->btnAnteSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnAnteSmal->HtmlEntities = false;
        $this->btnAnteSmal->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnProxSmal_Create() {
        $this->btnProxSmal = new QButton($this);
        $this->btnProxSmal->Text = TextoIcono('angle-right fa-lg','');
        $this->btnProxSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxSmal->HtmlEntities = false;
        $this->btnProxSmal->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnUltiSmal_Create() {
        $this->btnUltiSmal = new QButton($this);
        $this->btnUltiSmal->Text = TextoIcono('angle-double-right fa-lg','');
        $this->btnUltiSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiSmal->HtmlEntities = false;
        $this->btnUltiSmal->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    //-----------------------------------
    // Funciones asociadas a los objetos
    //-----------------------------------

    protected function btnSaveDesc_Click() {
        $this->txtDescAmpl->Text = limpiarCadena($this->txtDescAmpl->Text);
        $this->objGuia->DescCont = $this->txtDescAmpl->Text;
        $this->objGuia->Save();
        $this->lblDescCont->ToolTip = $this->objGuia->DescCont;
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'Guia';
        $arrLogxCamb['intRefeRegi'] = $this->objGuia->NumeGuia;
        $arrLogxCamb['strNombRegi'] = $this->objGuia->NombRemi;
        $arrLogxCamb['strDescCamb'] = 'Descripcion Ampliada: '.$this->objGuia->DescCont;
        LogDeCambios($arrLogxCamb);

        $this->mensaje('Transaccion Exitosa !!!','','','',__iCHEC__);
        $this->btnDescAmpl_Click();
    }

    protected function dtgGuiaCkpt_Bind() {
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt,false,QQN::GuiaCkpt()->HoraCkpt,false);

        $arrAwbxCkpt = GuiaCkpt::LoadArrayByNumeGuia($this->mctGuia->Guia->NumeGuia, $objClauOrde);
        $this->dtgGuiaCkpt->DataSource = $arrAwbxCkpt;
    }

    protected function dtgRegiTrab_Bind() {
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::RegistroTrabajo()->Fecha, false, QQN::RegistroTrabajo()->Hora, false);
        $arrRegiTrab   = RegistroTrabajo::LoadArrayByGuiaId($this->mctGuia->Guia->NumeGuia, $objClauOrde);
        $this->dtgRegiTrab->DataSource = $arrRegiTrab;
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function btnEditGuia_Click() {
        QApplication::Redirect(__SIST__.'/cargar_guia.php/'.$this->mctGuia->Guia->NumeGuia);
    }

    protected function btnSave_Click() {
        if ($this->lblMontTota->Text > 0) {
            $this->objGuia->CedulaDestinatario = DejarNumerosVJGuion($this->lblCeduDest->Text);
            $this->objGuia->Save();
            $this->mensaje('Transaccion Exitosa','','s','check');
        }
    }

    protected function btnDescAmpl_Click(){
        $this->dtgGuiaCkpt->Visible = !$this->dtgGuiaCkpt->Visible;
        $this->dtgRegiTrab->Visible = !$this->dtgRegiTrab->Visible;
        $this->lblDescAmpl->Visible = !$this->lblDescAmpl->Visible;
        $this->txtDescAmpl->Visible = !$this->txtDescAmpl->Visible;
        $this->btnSaveDesc->Visible = !$this->btnSaveDesc->Visible;
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------

    protected function corregirReceptoriaDestino() {
        /**
         * @var $objReceDest Counter
         */
        $strSucuDest = $this->objGuia->EstaDest;
        $strReceDest = $this->lblReceDest->Text;
        $objReceDest = Counter::LoadBySiglas($strReceDest);
        if ($objReceDest) {
            if ($strSucuDest != $objReceDest->SucursalId) {
                $arrReceDest = Counter::LoadArrayBySucursalId($strSucuDest);
                $intReceDest = count($arrReceDest);
                if ($intReceDest == 1) {
                    $objReceDest = $arrReceDest[0];
                    $this->objGuia->ReceptoriaDestino = $objReceDest->Siglas;
                    $this->objGuia->Save();
                    //----------------------------------------------
                    // Se deja registro de la transacción realizada
                    //----------------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'Guia';
                    $arrLogxCamb['intRefeRegi'] = $this->objGuia->NumeGuia;
                    $arrLogxCamb['strNombRegi'] = $this->objGuia->NombDest;
                    $arrLogxCamb['strDescCamb'] = 'Correccion Receptoria Destino '.$strReceDest.' --> '.$objReceDest->Siglas;
                    LogDeCambios($arrLogxCamb);
                    //------------------------------------
                    // Se cambia el valor en la pantalla
                    //------------------------------------
                    $this->lblReceDest->Text = $objReceDest->Siglas;
                }
            }
        }
    }

    protected function verificarNavegacion() {
        $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
        $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
        $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
    }

    protected function determinarPosicion() {
        if (isset($_SESSION['DataGuia'])) {
            $this->arrDataTabl = unserialize($_SESSION['DataGuia']);
            $this->intCantRegi = count($this->arrDataTabl);
            //-------------------------------------------------------------------------------
            // Se determina la posicion del registro actual, dentro del vector de registros
            //-------------------------------------------------------------------------------
            $intContRegi = 0;
            foreach ($this->arrDataTabl as $objTable) {
                if ($objTable->NumeGuia == $this->objGuia->NumeGuia) {
                    $this->intPosiRegi = $intContRegi;
                    break;
                } else {
                    $intContRegi++;
                }
            }
        }
    }

    protected function controlDeBotones() {
        //---------------------------------------------------
        //Si la guía está facturada, ya no podrá modificarse
        //---------------------------------------------------
        if ($this->blnEstaFact) {
            $this->btnEditGuia->Visible = false;
            $this->mensaje('Esta guia ya esta Facturada. No admite cambios','','w','exclamation-triangle');
        }
    }

    protected function habilitarBotonCupon() {
        $blnTodoOkey = $this->blnGuiaFact;
        $objCupoGuia = Cupon::LoadByGuiaId($this->objGuia->NumeGuia);

        if ($objCupoGuia) {
            $this->intIdxxCupo = $objCupoGuia->Id;
            $this->blnConsCupo = true;

            $blnTodoOkey = false;
        }

        return $blnTodoOkey;
    }
}

ConsultaGuia::Run('ConsultaGuia');
