<?php
//-----------------------------------------------------------------------------------
// Programa       : cargar_guia.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 21/04/16 04:06 PM
// Proyecto       : newliberty
// Descripcion    : Este programa permite al Usuario crear una guía de Paq. Mas. Nac
//-----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class CrearGuiaExp extends FormularioBaseKaizen {
    protected $objGuia;
    protected $objCliePmnx;
    protected $objDestPmnx;
    protected $objProducto;
    protected $objGuiaOrig;
    /**
     * @var $objClieTari MasterCliente
     */
    protected $objClieTari;

    protected $blnEditMode;
    protected $blnEditClie;
    protected $blnEditDest;
    protected $blnEditSupe;
    protected $blnEstaFact;
    protected $blnEstaPref;
    protected $blnSeguSino;
    protected $blnGuiaFact;
    protected $blnUnaxRece;
    protected $blnEnviSmsx;

    protected $decPorcIvax;
    protected $decPorcSegu;
    protected $decValoMini;
    protected $decValoMaxi;
    protected $decLimiKilo;
    protected $decMiniSegu;
    protected $decMaxiSegu;
    protected $decValoDecl;

    protected $intOperGene;
    protected $intCantLimi;

    protected $arrReceLimi;
    protected $arrDomiOrig;
    protected $arrDomiDest;
    protected $arrNotiSmsx;
    protected $arrValoMini;
    protected $arrValoMaxi;
    protected $arrPorcSegu;

    protected $strSucuOrig;
    protected $strReceOrig;
    protected $strCodiEsta;
    protected $strZonaIncu;

    protected $calFechGuia;

    protected $lstSucuDest;
    protected $lstReceDest;

    protected $rdbReceDomi;
    protected $rdbModaPago;

    protected $txtNumeGuia;
    protected $txtNumeCedu;
    protected $txtNombClie;
    protected $txtTeleFijo;
    protected $txtTeleMovi;
    protected $txtDireClie;
    protected $txtNombDest;
    protected $txtCeduDest;
    protected $txtTeleDest;
    protected $txtDireDest;
    protected $txtCantPiez;
    protected $txtPesoGuia;
    protected $txtDescCont;
    protected $txtValoDecl;
    protected $txtPorcDcto;
    protected $chkConsDcto;

    protected $lblMontBase;
    protected $lblMontDcto;
    protected $lblMontIvax;
    protected $lblMontFran;
    protected $lblMontSegu;
    protected $lblMontTota;

    protected $btnErroProc;
    protected $btnCalcTari;
    protected $btnImprGuia;
    protected $btnOtraGuia;
    protected $btnConsGuia;
    protected $btnEnviSmsx;
    protected $btnMasxAcci;
    protected $lblBotoPopu;
    protected $lblPopuModa;

    protected $objApliReco;

    protected function SetupGuia() {
        $strNumeGuia = QApplication::PathInfo(0);

        if ($strNumeGuia) {
            $this->objGuia = Guia::Load($strNumeGuia);
            if (!$this->objGuia) {
                throw new Exception('Could not find a Guia object with PK arguments: ' . $strNumeGuia);
            }

            $this->blnEditMode = true;
            $this->objCliePmnx = ClientePmn::Load($this->objGuia->CedulaRif);
            $this->objDestPmnx = ClientePmn::Load($this->objGuia->CedulaDestinatario);

            if ($this->objCliePmnx) {
                $this->blnEditClie = true;
            }

            if ($this->objDestPmnx) {
                $this->blnEditDest = true;
            }

        } else {
            $this->objGuia = new Guia();
            $this->blnEditMode = false;
        }
    }

    protected function SetupValores() {
        $this->blnEstaFact = false;
        $this->blnEstaPref = false;

        $this->arrValoMini = unserialize($_SESSION['ValoMin1']);
        $this->arrValoMaxi = unserialize($_SESSION['ValoMax1']);
        $this->arrPorcSegu = unserialize($_SESSION['PorcSeg1']);

        $this->intCantLimi = count($this->arrValoMaxi)-1;
        $this->decMiniSegu = $this->arrValoMini[0];
        $this->decMaxiSegu = $this->arrValoMaxi[$this->intCantLimi];

        if (!isset($_SESSION['SucuOrig'])) {
            QApplication::Redirect('../mg.php');
        } elseif (!isset($_SESSION['ReceOrig'])) {
            QApplication::Redirect('../mg.php');
        } else {
            if (!$this->blnEditMode) {
                //---------------------------
                // Insertando una Guia nueva
                //---------------------------
                $this->objProducto = unserialize($_SESSION['ProdGuia']);
                $this->decPorcIvax = unserialize($_SESSION['IvaxDhoy']);
                $this->decPorcSegu = unserialize($_SESSION['PorcSegu']);
                //-------------------------------------------
                // Limites de Valor Declarado reconvertivos
                //-------------------------------------------
                $this->arrValoMini = unserialize($_SESSION['RecoMin1']);
                $this->arrValoMaxi = unserialize($_SESSION['RecoMax1']);
                $this->arrPorcSegu = unserialize($_SESSION['PorcSeg1']);

                $this->intCantLimi = count($this->arrValoMaxi)-1;
                $this->decMiniSegu = $this->arrValoMini[0];
                $this->decMaxiSegu = $this->arrValoMaxi[$this->intCantLimi];
            } else {
                //-------------------------------------------------------------------------------------
                // Si la Guia que se esta editando, tiene la tarifa nueva (con reconversion monteria)
                // entonces los valores limites de Valor Declarado, deben esta reconvertidos
                //-------------------------------------------------------------------------------------
                $objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
                if ($this->objGuia->TarifaId >= (int)$objConfReco->ParaVal3) {
                    $this->arrValoMini = unserialize($_SESSION['RecoMin1']);
                    $this->arrValoMaxi = unserialize($_SESSION['RecoMax1']);
                    $this->arrPorcSegu = unserialize($_SESSION['PorcSeg1']);

                    $this->intCantLimi = count($this->arrValoMaxi)-1;
                    $this->decMiniSegu = $this->arrValoMini[0];
                    $this->decMaxiSegu = $this->arrValoMaxi[$this->intCantLimi];
                }
                //-------------------------------------------------------------------------------
                // Se crea un objeto paralelo que permita comparar las modificaciones realizadas
                //-------------------------------------------------------------------------------
                $this->objGuiaOrig = clone $this->objGuia;
                $dteFechDhoy = $this->objGuia->FechGuia->__toString("YYYY-MM-DD");
                $this->objProducto = FacProducto::Load($this->objGuia->CodiProd);
                $this->decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);
                $this->decPorcSegu = $this->objGuia->PorcentajeSeguro;
                //--------------------------------------------------------------------
                // Si la Guia esta Facturada, se establece la variable global en true
                //--------------------------------------------------------------------
                if ($this->objGuia->EstaFacturada()) {
                    $this->blnEstaFact = true;
                }
                //------------------------------------------------------------------------
                // Si la Guia esta Pre-Facturada, se establece la variable global en true
                //------------------------------------------------------------------------
                if ($this->objGuia->EstaPreFacturada()) {
                    $this->blnEstaPref = true;
                }
                //-------------------------------------------------------------------
                // Si la Guia es notificable por sms se establece la variable global
                // correspondiente en true. De lo contrario, se establece en false.
                //-------------------------------------------------------------------
                $this->arrNotiSmsx = $this->objGuia->NotificableSMS();
                $this->blnEnviSmsx = $this->arrNotiSmsx['NotiSmsx'];
            }

            $this->objClieTari = unserialize($_SESSION['ClieTari']);
            $this->intOperGene = unserialize($_SESSION['OperGene']);
            $this->blnSeguSino = unserialize($_SESSION['SeguSino']);
            $this->decValoMini = unserialize($_SESSION['ValoMini']);
            $this->decValoMaxi = unserialize($_SESSION['ValoMaxi']);
            $this->strSucuOrig = unserialize($_SESSION['SucuOrig']);
            $this->strReceOrig = unserialize($_SESSION['ReceOrig']);
            $this->decLimiKilo = unserialize($_SESSION['LimiKilo']);
            //----------------------------------------------------------
            // Vector que almacena las Receptorias con Limite de Kilos
            //----------------------------------------------------------
            $this->arrReceLimi = unserialize($_SESSION['ReceLimi']);
            //-----------------------------------------------------------------------------
            // Se valida si existe un bug con respecto a la Receptoría Destino de la Guía.
            // Esto solamente en modo de edición y si la guía no ha sido facturada aún.
            //-----------------------------------------------------------------------------
            /*
            if ($this->blnEditMode && !$this->blnEstaFact) {
                $strSucuDest = $this->objGuia->EstaDest;
                $strReceDest = $this->objGuia->ReceptoriaDestino;
                //-----------------------------------------------------------------------------------------------------
                // Se verifica si la Sucursal Destino de la Guía coincide con la de ubicación del Usuario del Sistema.
                //-----------------------------------------------------------------------------------------------------
                if ($this->strSucuOrig == $strSucuDest) {
                    //------------------------------------------------------------------------------------
                    // Se verifica si la Receptoría Destino corresponde a la Sucursal Destino de la Guía.
                    //------------------------------------------------------------------------------------
                    $objReceDest = Counter::LoadBySiglas($strReceDest);
                    if ($objReceDest) {
                        if ($objReceDest->SucursalId != $strSucuDest) {
                            //---------------------------------------------------------------------------------------------
                            // Se graba como Receptoría Destino aquella que pertenece a la ubicación del Usuario operador.
                            //---------------------------------------------------------------------------------------------
                            $this->objGuia->ReceptoriaDestino = $this->strReceOrig;
                            $this->objGuia->Save();
                        }
                    }
                }
            }
            */
            //----------------------------------------------
            // Aqui se determina si la guia es Facturable
            //----------------------------------------------
            $this->blnGuiaFact = false;
            if ($this->blnEditMode) {
                if ($this->objGuia->TipoGuia == TipoGuiaType::CODCOBROENDESTINO) {
                    //--------------------------------------------------------------------
                    // La Guia es COD y el Destino coincide con la localidad del Usuario
                    //--------------------------------------------------------------------
                    if (trim($this->objGuia->ReceptoriaDestino) == trim($this->strReceOrig)) {
                        $this->blnGuiaFact = true;
                    }
                    //--------------------------------------------------------------------
                    // La Guia es COD con entrega a DOMICILIO, tambien se puede facturar
                    //--------------------------------------------------------------------
                    if (trim($this->objGuia->ReceptoriaDestino) == trim($this->strSucuOrig)) {
                        $this->blnGuiaFact = true;
                    }
                    if (!$this->blnGuiaFact) {
                        //-----------------------------------------------------------------------------
                        // Otra posibilidad para que una guia sea Facturable, es que la Sucursal en la
                        // que se encuentra el Usuario, se el "Centro de Facturacion" del Destino de
                        // la guia.
                        //-----------------------------------------------------------------------------
                        if (strlen($this->objGuia->EstaDestObject->SeFacturaEn) > 0) {
                            if (trim($this->objGuia->EstaDestObject->SeFacturaEnObject->Siglas) == trim($this->strSucuOrig))
                            {
                                $this->blnGuiaFact = true;
                            }
                        }
                    }
                } else {
                    //-------------------------
                    // La Guia es PrePagada
                    //-------------------------
                    $this->blnGuiaFact = true;
                }
            }
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupGuia();
        $this->SetupValores();

        $this->lblTituForm->Text = QApplication::Translate('Guia Expreso Nacional');

        //---------------------
        // Datos del Remitente
        //---------------------
        $this->txtNumeGuia_Create();
        $this->calFechGuia_Create();
        $this->txtNombClie_Create();
        $this->txtNumeCedu_Create();
        $this->txtTeleFijo_Create();
        $this->txtTeleMovi_Create();
        $this->txtDireClie_Create();
        //------------------------
        // Datos del Destinatario
        //------------------------
        $this->lstSucuDest_Create();
        $this->rdbReceDomi_Create();
        $this->lstReceDest_Create();
        $this->txtNombDest_Create();
        $this->txtCeduDest_Create();
        $this->txtDireDest_Create();
        $this->txtTeleDest_Create();
        //-----------------
        // Datos del Envío
        //-----------------
        $this->txtCantPiez_Create();
        $this->txtPesoGuia_Create();
        $this->txtDescCont_Create();
        $this->txtValoDecl_Create();
        $this->rdbModaPago_Create();
        $this->txtPorcDcto_Create();
        $this->chkConsDcto_Create();
        //---------------------
        // Costos del Servicio
        //---------------------
        $this->lblMontBase_Create();
        $this->lblMontDcto_Create();
        $this->lblMontIvax_Create();
        $this->lblMontFran_Create();
        $this->lblMontSegu_Create();
        $this->lblMontTota_Create();
        //-----------------
        // Botones y otros
        //-----------------
        $this->btnSave->Text = TextoIcono('cogs fa-lg','Guardar');
        $this->btnCalcTari_Create();
        $this->lblBotoPopu_Create();
        $this->btnMasxAcci_Create();
        $this->btnErroProc_Create();
        $this->lblPopuModa_Create();
        //---------
        // Eventos
        //---------
        $this->controlDeBotones();
        $this->lstSucuDest_Change();

        $strTextMens = 'Evite el uso de caracteres especiales (Ej: \\~°#^*+) en <b>los nombres, las direcciones, el contenido y los teléfonos</b>';
        $this->mensaje($strTextMens,'m','i','',__iINFO__);

        //-----------
        // Permisos
        //-----------
        $this->permisosDeDescuentos();

    }

    protected function permisosDeDescuentos() {
        //------------------------------------------------------------------------------
        // Unicamente los Usuario autorizados tendran acceso a los campos de descuento
        //------------------------------------------------------------------------------
        $this->txtPorcDcto->Enabled   = false;
        $this->txtPorcDcto->ForeColor = 'blue';
        $this->chkConsDcto->Enabled   = false;
        $this->chkConsDcto->ForeColor = 'blue';
        $blnUsuaAuto = BuscarParametro("DctoClie", $this->objUsuario->LogiUsua, "Val1", 0);
        if ($blnUsuaAuto) {
            $this->txtPorcDcto->Enabled   = true;
            $this->txtPorcDcto->ForeColor = null;
            $this->chkConsDcto->Enabled   = true;
            $this->chkConsDcto->ForeColor = null;
        }
    }

    //-------------------------
    // Creando los objetos ...
    //-------------------------

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QLabel($this);
        $this->txtNumeGuia->Name = 'Nro de Guia';
        $this->txtNumeGuia->Required = true;
        $this->txtNumeGuia->Width = 150;
        $this->txtNumeGuia->Enabled = false;
        $this->txtNumeGuia->ForeColor = 'blue';
        if ($this->blnEditMode) {
            $this->txtNumeGuia->Text = $this->objGuia->NumeGuia;
        }
    }

    protected function calFechGuia_Create() {
        $this->calFechGuia = new QLabel($this);
        $this->calFechGuia->Name = 'Fecha';
        $this->calFechGuia->Width = 150;
        $this->calFechGuia->Required = true;
        $this->calFechGuia->Enabled = false;
        $this->calFechGuia->ForeColor = 'blue';
        if ($this->blnEditMode) {
            $this->calFechGuia->Text = $this->objGuia->FechGuia->__toString("YYYY-MM-DD");
        } else {
            $this->calFechGuia->Text = date('Y-m-d');
        }

    }

    protected function txtNumeCedu_Create() {
        $this->txtNumeCedu = new QTextBox($this);
        $this->txtNumeCedu->Name = 'Cedula/RIF';
        $this->txtNumeCedu->Width = 100;
        $this->txtNumeCedu->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNumeCedu->Text = $this->objGuia->CedulaRif;
        }
        $this->txtNumeCedu->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeCedu_Blur'));
    }

    protected function txtNombClie_Create() {
        $this->txtNombClie = new QTextBox($this);
        $this->txtNombClie->Name = 'Nombre';
        $this->txtNombClie->Width = 250;
        $this->txtNombClie->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNombClie->Text = $this->objGuia->NombRemi;
        }
    }

    protected function txtTeleFijo_Create() {
        $this->txtTeleFijo = new QTextBox($this);
        $this->txtTeleFijo->Name = 'Tlf. Fijo';
        $this->txtTeleFijo->Width = 120;
        if ($this->blnEditMode) {
            $this->txtTeleFijo->Text = $this->objGuia->TeleRemi;
        }
    }

    protected function txtTeleMovi_Create() {
        $this->txtTeleMovi = new QTextBox($this);
        $this->txtTeleMovi->Name = 'Tlf. Movil';
        $this->txtTeleMovi->Width = 120;
        if ($this->blnEditMode && $this->objCliePmnx) {
            $this->txtTeleMovi->Text = $this->objCliePmnx->TelefonoMovil;
        }
    }

    protected function txtDireClie_Create() {
        $this->txtDireClie = new QTextBox($this);
        $this->txtDireClie->Name = 'Direccion';
        $this->txtDireClie->Width = 250;
        $this->txtDireClie->Height = 40;
        $this->txtDireClie->TextMode = QTextMode::MultiLine;
        $this->txtDireClie->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDireClie->Text = $this->objGuia->DireRemi;
        }
    }

    protected function lstSucuDest_Create() {
        $this->lstSucuDest = new QListBox($this);
        $this->lstSucuDest->Name = 'Sucursal';
        $this->lstSucuDest->Width = 200;
        if ($this->blnEditMode) {
            $this->cargarDestinos($this->objGuia->EstaDest);
        } else {
            $this->cargarDestinos();
        }
        $this->lstSucuDest->AddAction(new QChangeEvent(), new QAjaxAction('lstSucuDest_Change'));
    }

    protected function rdbReceDomi_Create() {
        $this->rdbReceDomi = new QRadioButtonList($this);
        $this->rdbReceDomi->Name = 'Servicio';
        $this->rdbReceDomi->HtmlEntities = false;
        if (!$this->blnEditMode) {
            $this->rdbReceDomi->AddItem('&nbsp;RECEPTORIA&nbsp;','R');
            $this->rdbReceDomi->AddItem('&nbsp;DOMICILIO','D');
        }
        $this->rdbReceDomi->RepeatColumns = 2;
        $this->rdbReceDomi->AddAction(new QClickEvent(), new QAjaxAction('rdbReceDomi_Click'));
    }

    protected function lstReceDest_Create() {
        $this->lstReceDest = new QListBox($this);
        $this->lstReceDest->Name = 'Receptoria';
        $this->lstReceDest->Width = 200;
        if ($this->blnEditMode) {
            //t('En el create del listbox, la receptoria destino es: '.$this->objGuia->ReceptoriaDestino);
            $this->cargarReceptorias($this->objGuia->EstaDest,$this->objGuia->ReceptoriaDestino);
        }
        $this->lstReceDest->AddAction(new QChangeEvent(), new QAjaxAction('lstReceDest_Change'));
    }

    protected function txtNombDest_Create() {
        $this->txtNombDest = new QTextBox($this);
        $this->txtNombDest->Name = 'Nombre';
        $this->txtNombDest->Width = 250;
        $this->txtNombDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNombDest->Text = $this->objGuia->NombDest;
        }
    }

    protected function txtCeduDest_Create() {
        $this->txtCeduDest = new QTextBox($this);
        $this->txtCeduDest->Name = 'Cedula/RIF';
        $this->txtCeduDest->Width = 100;
        $this->txtCeduDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtCeduDest->Text = $this->objGuia->CedulaDestinatario;
        }
        $this->txtCeduDest->AddAction(new QBlurEvent(), new QAjaxAction('txtCeduDest_Blur'));
    }

    protected function txtTeleDest_Create() {
        $this->txtTeleDest = new QTextBox($this);
        $this->txtTeleDest->Name = 'Tlf. Movil';
        $this->txtTeleDest->Width = 120;
        if ($this->blnEditMode) {
            $this->txtTeleDest->Text = $this->objGuia->TeleDest;
        }
    }

    protected function txtDireDest_Create() {
        $this->txtDireDest = new QTextBox($this);
        $this->txtDireDest->Name = 'Direccion';
        $this->txtDireDest->Width = 250;
        $this->txtDireDest->Height = 40;
        $this->txtDireDest->TextMode = QTextMode::MultiLine;
        $this->txtDireDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDireDest->Text = $this->objGuia->DireDest;
        }
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QIntegerTextBox($this);
        $this->txtCantPiez->Name = 'Piezas';
        $this->txtCantPiez->Width = 50;
        if ($this->blnEditMode) {
            $this->txtCantPiez->Text = $this->objGuia->CantPiez;
        }
    }

    protected function txtPesoGuia_Create() {
        $this->txtPesoGuia = new QFloatTextBox($this);
        $this->txtPesoGuia->Name = 'Peso';
        $this->txtPesoGuia->Width = 50;
        if ($this->blnEditMode) {
            $this->txtPesoGuia->Text = $this->objGuia->PesoGuia;
        }
    }

    protected function txtDescCont_Create() {
        $this->txtDescCont = new QTextBox($this);
        $this->txtDescCont->Name = 'Contenido';
        $this->txtDescCont->Width = 300;
        $this->txtDescCont->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDescCont->Text = $this->objGuia->DescCont;
        }
    }

    protected function txtValoDecl_Create() {
        $this->txtValoDecl = new QFloatTextBox($this);
        $this->txtValoDecl->Name = 'Valor Decl.';
        $this->txtValoDecl->Width = 120;
        $this->txtValoDecl->HtmlAfter = " (".$this->decMiniSegu."-".$this->decMaxiSegu.")";
        $this->txtValoDecl->ToolTip = 'Un monto mayor a cero, implica que el envío se asegura';
        if ($this->blnEditMode) {
            $this->txtValoDecl->Text = $this->objGuia->ValorDeclarado;
        } else {
            $this->txtValoDecl->Text = '';
        }
    }

    protected function rdbModaPago_Create() {
        $this->rdbModaPago = new QRadioButtonList($this);
        $this->rdbModaPago->Name = 'F. Pago';
        $this->rdbModaPago->HtmlEntities = false;
        if (!$this->blnEditMode) {
            $this->cargarModalidadesDePago();
        } else {
            $this->cargarModalidadesDePago($this->objGuia->TipoGuia);
        }
        $this->rdbModaPago->RepeatColumns = 2;
    }

    protected function txtPorcDcto_Create() {
        $this->txtPorcDcto = new QFloatTextBox($this);
        $this->txtPorcDcto->Name = 'Dscto';
        $this->txtPorcDcto->Width = 50;
        $this->txtPorcDcto->HtmlAfter = ' %';
        $this->txtPorcDcto->ToolTip = 'Porcentaje de Descuento a otorgar';
        if ($this->blnEditMode) {
            $this->txtPorcDcto->Text = $this->objGuia->PorcentajeDscto;
        } else {
            $this->txtPorcDcto->Text = '';
        }
    }

    protected function chkConsDcto_Create() {
        $this->chkConsDcto = new QCheckBox($this);
        $this->chkConsDcto->Name = 'Cons. Dscto?';
        $this->chkConsDcto->ToolTip = '¿Considerar este Descuento en las estadísticas mensuales del Cliente?';
        $this->chkConsDcto->HtmlAfter = ' ¿Considerar en las estadísticas mensuales?';
        if ($this->blnEditMode) {
            $this->chkConsDcto->Checked = $this->objGuia->ConsiderarDscto;
        }
    }

    protected function lblMontBase_Create() {
        $this->lblMontBase = new QLabel($this);
        $this->lblMontBase->Name = 'Base';
        $this->lblMontBase->Width = 120;
        if ($this->blnEditMode) {
            $this->lblMontBase->Text = nf($this->objGuia->MontoBase);
        }
    }

    protected function lblMontDcto_Create() {
        $this->lblMontDcto = new QLabel($this);
        $this->lblMontDcto->Name = 'Dscto';
        $this->lblMontDcto->Width = 120;
        if ($this->blnEditMode) {
            $this->lblMontDcto->Name = 'Dscto('.$this->objGuia->PorcentajeDscto.'%)';
            $this->lblMontDcto->Text = nf($this->objGuia->MontoDscto);
        }
    }

    protected function lblMontIvax_Create() {
        $this->lblMontIvax = new QLabel($this);
        $this->lblMontIvax->Name = 'I.V.A.';
        $this->lblMontIvax->Width = 80;
        if ($this->blnEditMode) {
            $this->lblMontIvax->Name = 'IVA('.$this->objGuia->PorcentajeIva.'%)';
            $this->lblMontIvax->Text = nf($this->objGuia->MontoIva);
        }
    }

    protected function lblMontFran_Create() {
        $this->lblMontFran = new QLabel($this);
        $this->lblMontFran->Name = 'Franqueo';
        $this->lblMontFran->Width = 80;
        if ($this->blnEditMode) {
            $this->lblMontFran->Text = nf($this->objGuia->MontoFranqueo);
        }
    }

    protected function lblMontSegu_Create() {
        $this->lblMontSegu = new QLabel($this);
        $this->lblMontSegu->Name = 'Seguro';
        $this->lblMontSegu->Width = 80;
        if ($this->blnEditMode) {
            $this->lblMontSegu->Text = nf($this->objGuia->MontoSeguro);
        }
    }

    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Name = 'Mto. Total';
        $this->lblMontTota->Width = 80;
        if ($this->blnEditMode) {
            $this->lblMontTota->Text = nf($this->objGuia->MontoTotal);
        }
    }

    protected function lblBotoPopu_Create() {
        $this->lblBotoPopu = new QLabel($this);
        $this->lblBotoPopu->Text = $this->recrearBotonPopup();
        $this->lblBotoPopu->HtmlEntities = false;
        $this->lblBotoPopu->CssClass = '';
    }

    protected function btnCalcTari_Create() {
        $this->btnCalcTari = new QButtonP($this);
        $this->btnCalcTari->Text = TextoIcono('eye fa-lg','Cotizar');
        $this->btnCalcTari->AddAction(new QClickEvent(), new QServerAction('btnCalcTari_Click'));
        if ($this->blnEditMode) {
            $this->btnCalcTari->Visible = false;
        }
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $strTextBoto   = TextoIcono('plus','Acciones');
        $arrOpciDrop   = array();
        $arrOpciDrop[] = OpcionDropDown(__SIST__.'/guia_pdf.php?strNumeGuia='.$this->txtNumeGuia->Text,TextoIcono('print','Imprimir'));

        if ($this->blnGuiaFact) {
            if (!is_null($this->objGuia->FacturaId)) {
                $mixParaFact = 'intNumeFact='.$this->objGuia->FacturaId;
            } else {
                $mixParaFact = 'strNumeGuia='.$this->txtNumeGuia->Text;
            }

            $arrOpciDrop[] = OpcionDropDown(__SIST__.'/crear_factura.php?'.$mixParaFact,TextoIcono('credit-card','Facturar'));
        }

        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);

        $this->btnMasxAcci->Visible = $this->blnEditMode;
    }

    protected function lblPopuModa_Create() {
        $this->lblPopuModa = new QLabel($this);
        $this->lblPopuModa->Text = $this->recrearPopupModal();
        $this->lblPopuModa->HtmlEntities = false;
        $this->lblPopuModa->CssClass = '';
    }

    protected function recrearBotonPopup() {
        $strTextModa =
            "<button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\">
                 <i class=\"fa fa-".__iINFO__." fa-lg\"></i> ZNC - ". $this->strCodiEsta ."
            </button>";
        return $strTextModa;
    }

    protected function recrearPopupModal() {
        $strTextModa = '
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Zonas No Cubiertas</h4>
              </div>
              <div class="modal-body">';
        $strTextModa .= $this->strZonaIncu;
        $strTextModa .= '</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>';
        return $strTextModa;
    }

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = '<i class="fa fa-eye fa-lg"></i> Errores';
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
    }

    //--------------------------------------------------------------------------------------------------------------
    // Función que busca y muestra los datos de un cliente remitente existente a través de su cédula. En caso de no
    // existir, se declara al mismo como nuevo cliente.
    //--------------------------------------------------------------------------------------------------------------
    protected function txtNumeCedu_Blur() {
        if (!$this->blnEditMode) {
            $strNumeCedu = DejarNumerosVJGuion($this->txtNumeCedu->Text);
            if (strlen($strNumeCedu) > 0) {
                $this->objCliePmnx = ClientePmn::Load($strNumeCedu);
                if ($this->objCliePmnx) {
                    $this->blnEditClie = true;
                    $this->txtNumeCedu->HtmlAfter = '';
                    $this->txtNombClie->Text = $this->objCliePmnx->Nombre;
                    $this->txtTeleFijo->Text = $this->objCliePmnx->TelefonoFijo;
                    $this->txtTeleMovi->Text = $this->objCliePmnx->TelefonoMovil;
                    $this->txtDireClie->Text = $this->objCliePmnx->Direccion;
                    $this->lstSucuDest->SetFocus();
                } else {
                    $this->blnEditClie = false;
                    $this->objCliePmnx = new ClientePmn();
                    $this->objCliePmnx->CedulaRif = $strNumeCedu;
                    $this->txtNumeCedu->HtmlAfter = ' (Nuevo Cliente)';
                    $this->txtNombClie->Text = '';
                    $this->txtTeleFijo->Text = '';
                    $this->txtTeleMovi->Text = '';
                    $this->txtDireClie->Text = '';
                    $this->txtNombClie->SetFocus();
                }
            }
        }
    }

    //--------------------------------------------------------------------------------------------------------------
    // Función que busca y muestra los datos de un cliente destinatario existente a través de su Cédula. en caso de
    // no existir, se declara al mismo como nuevo cliente.
    //--------------------------------------------------------------------------------------------------------------
    protected function txtCeduDest_Blur() {
        if (!$this->blnEditMode) {
            $strNumeCedu = DejarNumerosVJGuion($this->txtCeduDest->Text);
            if (strlen($strNumeCedu) > 0) {
                $this->objDestPmnx = ClientePmn::Load($strNumeCedu);
                if ($this->objDestPmnx) {
                    $this->blnEditDest = true;
                    $this->txtNumeCedu->HtmlAfter = '';
                    $this->txtNombDest->Text = $this->objDestPmnx->Nombre;
                    $this->txtTeleDest->Text = $this->objDestPmnx->TelefonoMovil;
                    if ($this->rdbReceDomi->SelectedValue == 'D') {
                        $this->txtDireDest->Text = $this->objDestPmnx->Direccion;
                    }
                } else {
                    $this->blnEditDest = false;
                    $this->objDestPmnx = new ClientePmn();
                    $this->objDestPmnx->CedulaRif = $strNumeCedu;
                    $this->txtCeduDest->HtmlAfter = ' (Nuevo Cliente)';
                    $this->txtNombDest->Text = '';
                    $this->txtTeleDest->Text = '';
                    if (is_null($this->lstReceDest->SelectedValue)) {
                        $this->txtDireDest->Text = '';
                    }
                    $this->txtNombDest->SetFocus();
                }
            }
        }
    }

    //---------------------------------------------------------------------------
    // Función que carga las sucursales en el QListBox de las sucursales destino
    //---------------------------------------------------------------------------
    protected function cargarDestinos($strCodiEsta=null) {
        $this->lstSucuDest->RemoveAllItems();
        $this->lstSucuDest->Width = 200;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
        //-----------------------------------------------------------
        // Se cargan unicamente las Sucursales que tenga receptorias
        //-----------------------------------------------------------
        $arrCodiEsta   = Estacion::LoadArrayConCantidadDeReceptorias();
        $intCantDest   = count($arrCodiEsta);
        $this->lstSucuDest->AddItem('- Seleccione Uno - ('.$intCantDest.')', null);
        if ($arrCodiEsta) {
            foreach ($arrCodiEsta as $objSucuDest) {
                $blnSeleRegi = false;
                if (strlen($strCodiEsta) > 0) {
                    if (trim($objSucuDest->CodiEsta) == trim($strCodiEsta)) {
                        $blnSeleRegi = true;
                        $this->strCodiEsta = $strCodiEsta;
                    }
                }
                $strEstaAuxi = trim($objSucuDest->CodiEsta).'|'.$objSucuDest->GetVirtualAttribute('cant_rece');
                $this->lstSucuDest->AddItem($objSucuDest->__toStringConTiempoDeEntrega(), $strEstaAuxi, $blnSeleRegi);
            }
        }
    }

    //-------------------------------------------------------------------------------------
    // Función que define el evento click del QRadioButtonList de los tipos de receptorías
    //-------------------------------------------------------------------------------------
    public function rdbReceDomi_Click() {
        if ($this->rdbReceDomi->SelectedValue == 'D') {
            $this->lstReceDest->RemoveAllItems();
            $this->lstReceDest->Enabled = false;
            $this->lstReceDest->ForeColor = 'blue';
            $this->lstReceDest->SelectedIndex = null;
            if (!$this->blnEditMode) {
                $this->txtDireDest->Text = '';
            }
            $this->txtDireDest->Enabled = true;
            $this->txtDireDest->ForeColor = null;
        } else {
            if ($this->blnUnaxRece) {
                //--------------------------------------
                // Cuando existe mas de una Receptoria
                //--------------------------------------
                $this->cargarReceptorias($this->strCodiEsta,$this->objGuia->ReceptoriaDestino);
                $this->lstReceDest->Enabled = true;
                $this->lstReceDest->ForeColor = null;
            } else {
                //--------------------------------------
                // Cuando solo existe una Receptoria
                //--------------------------------------
                //$this->lstReceDest->RemoveAllItems();
                $this->cargarReceptorias($this->strCodiEsta,$this->objGuia->ReceptoriaDestino);
                $this->lstReceDest->Enabled = false;
                $this->lstReceDest->ForeColor = 'blue';
                $this->txtDireDest->Text = 'OFICINA LIBERTY ('.$this->strCodiEsta.')';
                $this->txtDireDest->Enabled = false;
                $this->txtDireDest->ForeColor = 'blue';
            }
        }

    }

    //------------------------------------------------------------------------------------------------------------
    // Función que carga las receptorías en el QListBox de las receptorías del destino, asociadas al código de la
    // sucursal destino seleccionada previamente.
    //------------------------------------------------------------------------------------------------------------
    protected function cargarReceptorias($strCodiSucu, $strSiglRece=null) {
        $this->lstReceDest->RemoveAllItems();
        $this->lstReceDest->Width = 200;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Counter()->Descripcion);
        $objClauWher   = QQ::Clause();
        if (!$this->blnEditMode) {
            $objClauWher[] = QQ::Equal(QQN::Counter()->StatusId, StatusType::ACTIVO);
        }
        $objClauWher[] = QQ::Equal(QQN::Counter()->SucursalId,$strCodiSucu);
        if (!$this->blnEditMode) {
            //-----------------------------------------------------------------------------
            // Si se trata de una Guia nueva, la Receptoria del Usuario no debe cargarse
            //-----------------------------------------------------------------------------
            $objClauWher[] = QQ::NotEqual(QQN::Counter()->Siglas,$this->strReceOrig);
        }
        $arrReceDest = Counter::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantRece = count($arrReceDest);
        if ($intCantRece > 1) {
            $this->lstReceDest->AddItem('- Seleccione Uno - ('.$intCantRece.')', null);
        }
        foreach ($arrReceDest as $objReceDest) {
            $blnSeleRegi = false;
            if (strlen($strSiglRece) > 0 || $intCantRece == 1) {
                if (trim($objReceDest->Siglas) == trim($strSiglRece) || $intCantRece == 1) {
                    $blnSeleRegi = true;
                }
            }
            $this->lstReceDest->AddItem($objReceDest->__toString(), $objReceDest->Siglas, $blnSeleRegi);
        }
    }

    //-----------------------------------------------------------------------------
    // Función que define el evento change del QListBox de las receptorías destino
    //-----------------------------------------------------------------------------
    protected function lstReceDest_Change() {
        if (!is_null($this->lstReceDest->SelectedValue)) {
            $this->txtDireDest->Text = 'OFICINA LIBERTY ('.$this->lstReceDest->SelectedName.')';
            $this->txtDireDest->Enabled = false;
            $this->txtDireDest->ForeColor = 'blue';
        }
    }


    public function lstSucuDest_Change() {
        if (!is_null($this->lstSucuDest->SelectedValue)) {
            $arrCodiSele = explode('|',$this->lstSucuDest->SelectedValue);
            $this->strCodiEsta = $arrCodiSele[0];
            $intCantRece = $arrCodiSele[1];
            $this->lstReceDest->Enabled = false;
            $this->lstReceDest->ForeColor = 'blue';

            $this->rdbReceDomi->RemoveAllItems();
            $this->lstReceDest->RemoveAllItems();

            if ($this->blnEditMode) {
                $this->txtDireDest->Text = $this->objGuia->DireDest;
            } else {
                $this->txtDireDest->Text = '';
            }

            $this->blnUnaxRece = false;
            $blnSeleRegi = false;

            if ($intCantRece > 0) {
                //----------------------------------------------------------------------------------------------
                // Cuando existe al menos una receptoria, se agrega la lista de los RadioButtons "RECEPTORIA" y
                // "DOMICILIO". Si la guia se encuentra en modo de edicion, se marca por defecto el RadioButton
                // correspondiente con el apoyo del parametro booleano "$blnSeleRegi" ya seteado
                //----------------------------------------------------------------------------------------------
                if ($this->blnEditMode) {

                    if (substr_count($this->txtDireDest->Text, 'OFICINA LIBERTY')) {
                        $blnSeleRegi = true;
                    }

                    $this->rdbReceDomi->AddItem('&nbsp;RECEPTORIA&nbsp;','R',$blnSeleRegi);
                    $this->rdbReceDomi->AddItem('&nbsp;DOMICILIO','D',!$blnSeleRegi);

                } else {
                    $this->rdbReceDomi->AddItem('&nbsp;RECEPTORIA&nbsp;','R');
                    $this->rdbReceDomi->AddItem('&nbsp;DOMICILIO','D');
                }

                if ($intCantRece > 1) {
                    //-------------------------------------
                    // Cuando existe más de una Receptoria
                    //-------------------------------------
                    $this->blnUnaxRece = true;

                    //-------------------------------------------------------------------------------------------------
                    // Si la guia se encuentra en modo de edicion, y el RaioButton seleccionado es "RECEPTORIA", se
                    // carga y selecciona por defecto la receptoria del destino de la guia en la lista de receptorias.
                    //-------------------------------------------------------------------------------------------------
                    if ($this->blnEditMode && $this->rdbReceDomi->SelectedValue = 'R') {
                        $this->cargarReceptorias($this->strCodiEsta,$this->objGuia->ReceptoriaDestino);
                        $this->lstReceDest->Enabled = true;
                        $this->lstReceDest->ForeColor = null;
                    } else {
                        $this->lstReceDest->RemoveAllItems();
                        $this->lstReceDest->Enabled = false;
                        $this->lstReceDest->ForeColor = 'blue';
                        $this->txtDireDest->Enabled = true;
                        $this->txtDireDest->ForeColor = null;
                    }
                } else {
                    //--------------------------------------
                    // Cuando solo existe una Receptoria
                    //--------------------------------------
                    $this->lstReceDest->RemoveAllItems();

                    //-------------------------------------------------------------------------------------------------
                    // Si la guia se encuentra en modo de edicion, y el RadioButton seleccionado es "RECEPTORIA", se
                    // carga y selecciona por defecto la receptoria del destino de la guia en la lista de receptorias,
                    // y la misma se bloquea al igual que el campo de direccion del destino.
                    //-------------------------------------------------------------------------------------------------
                    if ($this->blnEditMode && $this->rdbReceDomi->SelectedValue = 'R') {
                        $this->cargarReceptorias($this->strCodiEsta,$this->objGuia->ReceptoriaDestino);
                        $this->lstReceDest->Enabled = false;
                        $this->lstReceDest->ForeColor = 'blue';
                        $this->txtDireDest->Enabled = false;
                        $this->txtDireDest->ForeColor = 'blue';
                        if (substr_count($this->txtDireDest->Text, 'OFICINA LIBERTY')) {
                            $this->txtDireDest->Text = 'OFICINA LIBERTY (' . $this->strCodiEsta . ')';
                        }
                    } else {
                        $this->lstReceDest->RemoveAllItems();
                        $this->lstReceDest->Enabled = false;
                        $this->lstReceDest->ForeColor = 'blue';
                        $this->txtDireDest->Enabled = true;
                        $this->txtDireDest->ForeColor = null;
                    }
                }
            } else {
                //---------------------------------------------------------------------------------------------------
                // Cuando no existen receptorías, se agrega solamente el RadioButton "DOMICILIO" y se selecciona por
                // defecto.
                //---------------------------------------------------------------------------------------------------
                $this->rdbReceDomi->AddItem('&nbsp;DOMICILIO','D',true);
                $this->lstReceDest->RemoveAllItems();
                $this->lstReceDest->Enabled = false;
                $this->lstReceDest->ForeColor = 'blue';
                $this->txtDireDest->Enabled = true;
                $this->txtDireDest->ForeColor = null;
            }
            //-----------------------------------------------------------------------------------------------
            // Se cargan las Zonas Cubiertas de la Sucursal y se activa el boton que permite visualizarlas.
            //-----------------------------------------------------------------------------------------------
            $objEstaDest = Estacion::Load($this->strCodiEsta);
            $this->strZonaIncu = $objEstaDest->ZonasNc;
            $this->lblBotoPopu->Visible = true;
            $this->lblBotoPopu->Text = $this->recrearBotonPopup();
            $this->lblPopuModa->Text = $this->recrearPopupModal();
        } else {
            $this->lblBotoPopu->Visible = false;
        }
    }

    //------------------------------------------------------------------------------------------
    // función que carga las modalidades de pago en el QRadioButtonList de la modalidad de pago
    //------------------------------------------------------------------------------------------
    protected function cargarModalidadesDePago($intSeleEsta=null) {
        $this->rdbModaPago->RemoveAllItems();
        if (is_null($intSeleEsta)) {
            $this->rdbModaPago->AddItem('&nbsp;PPD&nbsp;',TipoGuiaType::PPDPREPAGADA);
            //$this->rdbModaPago->AddItem('&nbsp;COD',TipoGuiaType::CODCOBROENDESTINO);
        } else {
            $this->rdbModaPago->AddItem('&nbsp;PPD&nbsp;',TipoGuiaType::PPDPREPAGADA,
                TipoGuiaType::PPDPREPAGADA==$intSeleEsta);

            //$this->rdbModaPago->AddItem('&nbsp;COD',TipoGuiaType::CODCOBROENDESTINO,
            //    TipoGuiaType::CODCOBROENDESTINO==$intSeleEsta);
        }
    }

    //------------------------------------------------------------
    // Función que define el evento click del QButton de Facturar
    //------------------------------------------------------------

    protected function btnFactGuia_Click() {
        //--------------------------------------------------------------------------------------------------
        // Si la factura o prefactura ya existe, se invoca al programa de facturación con el ID de la misma,
        // de lo contrario, se hace la invocación con el número de la guía.
        //--------------------------------------------------------------------------------------------------
        if (!is_null($this->objGuia->FacturaId)) {
            $mixParaFact = $this->objGuia->FacturaId;
        } else {
            $mixParaFact = $this->txtNumeGuia->Text;
        }

        QApplication::Redirect("crear_factura.php/$mixParaFact");

        //------------------------------------------------
        // Códigos referentes al Sistema Expreso Nacional
        //------------------------------------------------
        $arrSistGuia = array('pmn','cnt');
        //-------------------------------------------------------------------------------------------------
        // Si la guia ha sido elaborada en el Expreso Nacional, se invoca al programa "crear_factura.php",
        // de lo contrario, se invoca al programa "crear_factura_sde.php"
        //-------------------------------------------------------------------------------------------------
        if (in_array($this->objGuia->SistemaId,$arrSistGuia)) {
            QApplication::Redirect("crear_factura.php/$mixParaFact");
        } else {
            QApplication::Redirect("crear_factura_sde.php/$mixParaFact");
        }
    }

    //-------------------------------------------------------
    // Función que define el evento click del QButton de POD
    //-------------------------------------------------------
    protected function btnGrabPodx_Click() {
        $this->mensaje('Evento en construccion!','','w','exclamation-triangle');
        //QApplication::Redirect('cargar_pod.php/'.$this->objGuia->NumeGuia);
    }

    //-----------------------------------------------------
    // Funcion que define el evento del QButton de Cotizar
    //-----------------------------------------------------
    protected function btnCalcTari_Click() {
        if ($this->verificarDatos()) {
            $this->calcularTarifa();
        }
    }

    //-----------------------------------------------------
    // funcion que define el evento del QButton de Guardar
    //-----------------------------------------------------
    protected function btnSave_Click() {
        $blnTodoOkey = true;
        //------------------------------------------------------------------------------------------------
        // Si los datos del Remitente no existen, se almacenan en la base de datos, para futuros envios.
        // En caso de que exista, se actualizan sus datos.
        //------------------------------------------------------------------------------------------------
        $this->objCliePmnx->Nombre        = substr(limpiarCadena($this->txtNombClie->Text),0,100);
        $this->objCliePmnx->CedulaRif     = DejarNumerosVJGuion($this->txtNumeCedu->Text);
        $this->objCliePmnx->TelefonoFijo  = DejarSoloLosNumeros($this->txtTeleFijo->Text);
        $this->objCliePmnx->TelefonoMovil = DejarSoloLosNumeros($this->txtTeleMovi->Text);
        $this->objCliePmnx->Direccion     = substr(limpiarCadena($this->txtDireClie->Text),0,200);
        //----------------------------------------------------------------------------------
        // Si el Cliente Remitente no existe aún, se graba Usuario y la fecha de creación.
        //----------------------------------------------------------------------------------
        if (!$this->blnEditClie) {
            $this->objCliePmnx->SucursalId    = $this->objUsuario->CodiEsta;
            $this->objCliePmnx->RegistradoPor = $this->objUsuario->CodiUsua;
            $this->objCliePmnx->RegistradoEl  = new QDateTime(QDateTime::Now);
        }
        //------------------------------
        // Se salva la data del Cliente
        //------------------------------
        $this->objCliePmnx->Save();
        //---------------------------------------------------------------------------------------------------
        // Si los datos del Destinatario no existen, se almacenan en la base de datos, para futuros envios.
        //  En caso de que exista, se actualizan sus datos.
        //---------------------------------------------------------------------------------------------------
        if (!$this->objDestPmnx) {
            $this->objDestPmnx = new ClientePmn();
            $this->objDestPmnx->CedulaRif = DejarNumerosVJGuion($this->txtCeduDest->Text);
        }
        $this->objDestPmnx->Nombre        = substr(limpiarCadena($this->txtNombDest->Text),0,100);
        $this->objDestPmnx->TelefonoMovil = DejarSoloLosNumeros($this->txtTeleDest->Text);
        $this->objDestPmnx->Direccion     = substr(limpiarCadena($this->txtDireDest->Text),0,200);
        if (!$this->blnEditDest) {
            $this->objDestPmnx->TelefonoFijo  = 'N/A';
            $this->objDestPmnx->SucursalId    = $this->objUsuario->CodiEsta;
            $this->objDestPmnx->RegistradoPor = $this->objUsuario->CodiUsua;
            $this->objDestPmnx->RegistradoEl  = new QDateTime(QDateTime::Now);
        }
        $this->objDestPmnx->Save();
        //---------------------------------------------------
        // Se calcula la tarifa y se guarda la guia en la BD
        //---------------------------------------------------
        if ($this->verificarDatos()) {
            if ($this->calcularTarifa()) {
                $strNombProc = 'Creando/Editando Guía desde el Exp. Nac. del Cliente: '.$this->txtNombClie->Text;
                $objProcEjec = CrearProceso($strNombProc);
                //-------------------------------------
                // Se suprimen los errores en pantalla
                //-------------------------------------
                $mixErroOrig = error_reporting();
                error_reporting(0);
                $strTextMens = 'Transaccion Exitosa';
                $strTipoMens = 's';
                $strIconMens = __iCHEC__; //'check';
                $strMotiNook = '';
                //------------------------------------------------------------------------------------
                // Si se guarda por primera vez la guía, a la misma se le genera un número o Id nuevo
                //------------------------------------------------------------------------------------
                if (!$this->blnEditMode) {
                    $this->txtNumeGuia->Text = proxNroDeGuia();
                }
                $this->UpdateGuiaFields();
                try {
                    $this->objGuia->Save();
                    //--------------------------------
                    // Se graba el checkpoint Pick-Up
                    //--------------------------------
                    if (!$this->blnEditMode) {
                        $blnGrabPick = true;
                    } else {
                        if (!$this->objGuia->tieneCheckpoint('PU')) {
                            $blnGrabPick = true;
                        } else {
                            $blnGrabPick = false;
                        }
                    }
                    if ($blnGrabPick) {
                        //-----------------------------------------------------
                        // Vector de datos del checkpoint que se desea grabar
                        //-----------------------------------------------------
                        $objCheckpoint = unserialize($_SESSION['ChecPick']);
                        $arrDatoCkpt = array();
                        $arrDatoCkpt['NumeGuia'] = $this->objGuia->NumeGuia;
                        $arrDatoCkpt['UltiCkpt'] = '';
                        $arrDatoCkpt['GuiaAnul'] = SinoType::NO;
                        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                        $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt;
                        $arrDatoCkpt['CodiRuta'] = $this->strReceOrig;
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                        if (!$arrResuGrab['TodoOkey']) {
                            $strMotiNook = $arrResuGrab['MotiNook'];
                            $blnTodoOkey = false;
                        }
                    }
                    if ($blnTodoOkey) {
                        QApplication::Redirect(__PMN__.'/consulta_guia.php/'.$this->objGuia->NumeGuia);
                    }
                } catch (Exception $e) {
                    $strPrefAcci = 'actualizacion';
                    if (!$this->blnEditMode) {
                        $strPrefAcci = 'creacion';
                    }
                    $strMensErro = $e->getMessage();
                    $strComeErro = "Fallo la $strPrefAcci de la Guia";
                    $strTextMens = "$strComeErro: $strMensErro";
                    $strTipoMens = 'd';
                    $strIconMens = __iHAND__; //'hand-stop-o';
                    $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = 'Guia: '.$this->objGuia->NumeGuia;
                    $arrParaErro['MensErro'] = $strMensErro;
                    $arrParaErro['ComeErro'] = $strComeErro;
                    GrabarError($arrParaErro);
                    $blnTodoOkey = false;
                }
                //------------------------------------------------
                // Se levantan nuevamente los errores en pantalla
                //------------------------------------------------
                error_reporting($mixErroOrig);
                if (strlen($strMotiNook) > 0) {
                    $strTipoMens = 'w';
                    $strIconMens = __iEXCL__; //'exclamation-triangle';
                    $strTextMens  = 'La Guía se ha creado con excepcion(es) - <b>';
                    $strTextMens .= $strMotiNook;
                    $strTextMens .= '</b>.';
                }
                //-----------------------------------------
                // Se construye el mensaje correspondiente
                //-----------------------------------------
                $this->mensaje($strTextMens,'m',$strTipoMens,null,$strIconMens);
                if ($blnTodoOkey) {
                    $this->SetupGuia();
                    $this->SetupValores();
                    $this->controlDeBotones();
                    $this->btnMasxAcci->Visible = true;
                }
                //--------------------------------------
                // Se almacena el resultado del proceso
                //--------------------------------------
                $objProcEjec->HoraFinal      = new QDateTime(QDateTime::Now);
                $objProcEjec->Comentario     = $strTextMens;
                $objProcEjec->NotificarAdmin = !$blnTodoOkey ? true : false;
                $objProcEjec->Save();
                //----------------------------------------------
                // Se deja registro de la transacción realizada
                //----------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'ProcesoError';
                $arrLogxCamb['intRefeRegi'] = $objProcEjec->Id;
                $arrLogxCamb['strNombRegi'] = $objProcEjec->Nombre;
                $arrLogxCamb['strDescCamb'] = 'Ejecutado';
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_list.php/'.$objProcEjec->Id;
                LogDeCambios($arrLogxCamb);
            }
        }
    }

    //---------------------------------------------------------------------
    // Función que define el evento click del QButton de Volver o Cancelar
    //---------------------------------------------------------------------
    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    //---------------------------------------------------------------------
    // Se asigna el porcentaje correspondiente al valor del seguro según el
    // rango establecido en el Sistema de Paq. Mas. Nac.
    //---------------------------------------------------------------------
    protected function AsigPorcSeguro($decValoDecl) {
        $decPorcSegu = 0;

        for ($i = 0; $i <= $this->intCantLimi; $i++) {
            if ($decValoDecl < $this->arrValoMaxi[$i] + 1) {
                $decPorcSegu = $this->arrPorcSegu[$i];
                break;
            }
        }

        return $decPorcSegu;
    }

    protected function aplicaReconversion(Guia $objGuiaReco) {
        $objApliReco = new stdClass();
        $objApliReco->blnApliReco = false;
        $objApliReco->decFactReco = 1;
        //-------------------------------------------------------------------
        // Aqui se identifica si la Reconversion Monetaria esta activa o no
        //-------------------------------------------------------------------
        $objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
        if ($objConfReco) {
            $objApliReco->blnApliReco = (boolean)$objConfReco->ParaVal1;
            $objApliReco->decFactReco = (float)$objConfReco->ParaVal2;
            $intTariRefe = (int)$objConfReco->ParaVal3;
            //---------------------------------------------------------------
            // Aqui se determina si la reconversion debe ser aplicada o no
            //---------------------------------------------------------------
            if ($objApliReco->blnApliReco) {
                $objApliReco->blnApliReco = false;
                if ($objGuiaReco->TarifaId < $intTariRefe) {
                    $objApliReco->blnApliReco = true;
                }
            }
        }
        return $objApliReco;
    }

    //-------------------------------------------------------------------
    // Función responsable del cálculo de la Tarifa del Expreso Nacional
    //-------------------------------------------------------------------
    protected function calcularTarifa() {
        $blnTodoOkey = false;

        if (!$this->blnEditMode) {
            $objTarifa = unserialize($_SESSION['TariPmnx']);
        } else {
            $objTarifa = FacTarifa::Load($this->objGuia->TarifaId);
        }
        $objApliReco = $this->aplicaReconversion($this->objGuia);

        if ($objTarifa) {
            $arrSucuDest = explode('|',$this->lstSucuDest->SelectedValue);
            $strCodiDest = $arrSucuDest[0];
            //------------------------------------------
            // Se procede ahora al calculo de la Tarifa
            //------------------------------------------
            $arrParaTari['dttFechGuia'] = $this->calFechGuia->Text;
            $arrParaTari['strCodiOrig'] = $this->strSucuOrig;
            $arrParaTari['strCodiDest'] = $strCodiDest;
            $arrParaTari['dblPesoGuia'] = $this->txtPesoGuia->Text;
            $arrParaTari['dblValoDecl'] = $this->txtValoDecl->Text;
            $arrParaTari['intChecAseg'] = strlen($this->txtValoDecl->Text);
            $arrParaTari['dblPorcSgro'] = $this->AsigPorcSeguro($this->decValoDecl);
            $arrParaTari['strModaPago'] = TipoGuiaType::ToStringCorto($this->rdbModaPago->SelectedValue);
            $arrParaTari['strEstaUsua'] = $this->objUsuario->CodiEsta;
            $arrParaTari['decSgroClie'] = $this->objClieTari->PorcentajeSeguro;
            $arrParaTari['objTariGuia'] = $objTarifa;
            $arrParaTari['decPorcDcto'] = strlen($this->txtPorcDcto->Text) > 0 ? $this->txtPorcDcto->Text : 0 ;

            $arrValoTari = calcularTarifaParcialPmn($arrParaTari);

            $blnTodoOkey = $arrValoTari['blnTodoOkey'];
            $strMensUsua = $arrValoTari['strMensUsua'];
            $dblMontBase = $arrValoTari['dblMontBase'];
            $decMontDcto = $arrValoTari['decMontDcto'];
            $dblFranPost = $arrValoTari['dblFranPost'];
            $dblMontDiva = $arrValoTari['dblMontDiva'];
            $dblMontSgro = $arrValoTari['dblMontSgro'];
            $dblMontTota = $arrValoTari['dblMontTota'];
            $dblMontOtro = $arrValoTari['dblMontOtro'];
            
            $this->decPorcIvax = $arrValoTari['dblPorcDiva'];

            $this->lblMontBase->Text = nfp($dblMontBase);
            $this->lblMontDcto->Text = nfp($decMontDcto);
            $this->lblMontFran->Text = nfp($dblFranPost);
            $this->lblMontSegu->Text = nfp($dblMontSgro);
            $this->lblMontIvax->Text = nfp($dblMontDiva);
            $this->lblMontTota->Text = nfp($dblMontTota);

            if ($blnTodoOkey) {
                $this->mensaje();
            } else {
                $this->mensaje('No hay Tarifa! '.$strMensUsua.'!','','d','',__iEXCL__);
            }
        } else {
            $this->mensaje('Tarifa Nacional No Definida!','','d','',__iEXCL__);
        }

        return $blnTodoOkey;
    }

    //--------------------------------------------------------------------------------
    // Función que suministra datos a la guía, bien sea por primera vez o actualizados
    //--------------------------------------------------------------------------------
    protected function UpdateGuiaFields() {
        $this->objGuia->NumeGuia = $this->txtNumeGuia->Text;
        $this->objGuia->CodiClie = $this->objClieTari->CodiClie;
        $this->objGuia->FechGuia = new QDateTime($this->calFechGuia->Text);

        if (!$this->blnEditSupe || !$this->blnEditMode) {
            $this->objGuia->EstaOrig = $this->strSucuOrig;
            $this->objGuia->ReceptoriaOrigen = $this->strReceOrig;
        }
        //-----------------------------------------------------------------------------------------
        // Si el Valor Declarado es mayor a cero, entonces se entiende que la Guia esta asegurada
        //-----------------------------------------------------------------------------------------
        $blnEnviAseg = false;
        if (strlen($this->txtValoDecl->Text) > 0) {
            if ($this->txtValoDecl->Text > 0) {
                $blnEnviAseg = true;
            }
        }
        $this->objGuia->EstaDest           = $this->strCodiEsta;
        $this->objGuia->PesoGuia           = $this->txtPesoGuia->Text;
        $this->objGuia->NombRemi           = $this->txtNombClie->Text;
        $this->objGuia->DireRemi           = $this->txtDireClie->Text;
        $this->objGuia->TeleRemi           = DejarSoloLosNumeros($this->txtTeleMovi->Text);
        $this->objGuia->NombDest           = $this->txtNombDest->Text;
        $this->objGuia->DireDest           = $this->txtDireDest->Text;
        $this->objGuia->CedulaDestinatario = DejarNumerosVJGuion($this->txtCeduDest->Text);
        $this->objGuia->TeleDest           = DejarSoloLosNumeros($this->txtTeleDest->Text);
        $this->objGuia->CantPiez           = $this->txtCantPiez->Text;
        $this->objGuia->DescCont           = $this->txtDescCont->Text;
        $this->objGuia->CodiProd           = $this->objProducto->CodiProd;
        $this->objGuia->TipoGuia           = $this->rdbModaPago->SelectedValue;
        $this->objGuia->ValorDeclarado     = str_replace(",", '', $this->txtValoDecl->Text);
        $this->objGuia->PorcentajeIva      = str_replace(",", '', $this->decPorcIvax);
        $this->objGuia->MontoIva           = str_replace(",", '', $this->lblMontIvax->Text);
        $this->objGuia->Asegurado          = $blnEnviAseg;
        $this->objGuia->PorcentajeSeguro   = $this->AsigPorcSeguro($this->decValoDecl);
        $this->objGuia->MontoSeguro        = str_replace(",", '', $this->lblMontSegu->Text);
        $this->objGuia->MontoBase          = str_replace(",", '', $this->lblMontBase->Text);
        $this->objGuia->MontoFranqueo      = str_replace(",", '', $this->lblMontFran->Text);
        $this->objGuia->MontoOtros         = 0;
        $this->objGuia->MontoTotal         = str_replace(",", '', $this->lblMontTota->Text);
        $this->objGuia->TieneGuiaRetorno   = 0;
        $this->objGuia->GuiaRetorno        = null;
        $this->objGuia->Observacion        = '';
        $this->objGuia->TipoDocumentoId    = "V";
        $this->objGuia->CedulaRif          = DejarNumerosVJGuion($this->txtNumeCedu->Text);
        $this->objGuia->PorcentajeDscto    = $this->txtPorcDcto->Text;
        $this->objGuia->MontoDscto         = str_replace(",", '', $this->lblMontDcto->Text);
        $this->objGuia->ConsiderarDscto    = (int)$this->chkConsDcto->Checked;

        if (!$this->objGuia->CobroCod) {
            $this->objGuia->CobroCod = null;
        }

        $this->objGuia->VendedorId = $this->objClieTari->VendedorId;
        $this->objGuia->OperacionId = $this->intOperGene;

        if ($this->lstReceDest->SelectedValue) {
            $strReceDest = $this->lstReceDest->SelectedValue;
        } else {
            $arrSucuDest = explode('|',$this->lstSucuDest->SelectedValue);
            $strReceDest = $arrSucuDest[0];
        }
        $this->objGuia->ReceptoriaDestino = $strReceDest;

        if (!$this->blnEditMode) {
            //------------------------------------------------------------------------
            // En caso de Insercion, se asignan valores por defecto ciertos campos
            //------------------------------------------------------------------------
            $this->objGuia->ClienteId          = null;
            $this->objGuia->EntregadoA         = null;
            $this->objGuia->FechaEntrega       = null;
            $this->objGuia->HoraEntrega        = null;
            $this->objGuia->CodiCkpt           = null;
            $this->objGuia->EstaCkpt           = null;
            $this->objGuia->FechCkpt           = null;
            $this->objGuia->HoraCkpt           = null;
            $this->objGuia->ObseCkpt           = null;
            $this->objGuia->UsuaCkpt           = null;
            $this->objGuia->FechaPod           = null;
            $this->objGuia->HoraPod            = null;
            $this->objGuia->UsuarioPod         = null;
            $this->objGuia->CantAyudantes      = 0;
            $this->objGuia->ParadasAdicionales = 0;
            $this->objGuia->GuiaExterna        = null;
            $this->objGuia->CajaId             = null;
            $this->objGuia->ProductoId         = null;
            $this->objGuia->TasaDolar          = null;
            $this->objGuia->VolMaritimoPies    = null;
            $this->objGuia->VolMaritimoMts     = null;
            $this->objGuia->DescripcionGral    = null;
            $this->objGuia->Alto               = null;
            $this->objGuia->Ancho              = null;
            $this->objGuia->Largo              = null;
            $this->objGuia->MontoBaseInt       = 0;
            $this->objGuia->PorcentajeSgroInt  = 0;
            $this->objGuia->MontoSgroInt       = 0;
            $this->objGuia->MontoTotalInt      = 0;
            $this->objGuia->TotalIntLocal      = 0;
            $this->objGuia->PesoVolumetrico    = 0;
            $this->objGuia->PesoLibras         = 0;
            $this->objGuia->HojaEntrega        = null;
            $this->objGuia->RecolectaId        = null;
            $this->objGuia->FleteDirecto       = 0;
            $this->objGuia->TransFac           = 0;
            $this->objGuia->CourierId          = 1;
            $this->objGuia->CierreCaja         = 0;
            $this->objGuia->UsuarioCreacion    = $this->objUsuario->LogiUsua;
            $this->objGuia->FechaCreacion      = new QDateTime(QDateTime::Now);
            $this->objGuia->HoraCreacion       = date("H:i");
            $this->objGuia->SistemaId          = 'cnt';
            $this->objGuia->Anulada            = 0;
            $this->objGuia->EnEfectivo         = 0;
            $this->objGuia->TarifaId           = $this->objClieTari->TarifaId;
        }

        //------------------------------------------------------------------------------------------------
        // Se compara el objeto que se esta guardando con el objeto original, en caso de estar la guía en
        // modo de edición.
        //------------------------------------------------------------------------------------------------
        if ($this->blnEditMode) {
            $this->RegistroDeCambios($this->objGuiaOrig,$this->objGuia);
        } else {
            $arrLogxCamb['strNombTabl'] = 'Guia';
            $arrLogxCamb['intRefeRegi'] = $this->objGuia->NumeGuia;
            $arrLogxCamb['strNombRegi'] = $this->objGuia->NombRemi;
            $arrLogxCamb['strDescCamb'] = "Creada (PMN)";
            LogDeCambios($arrLogxCamb);
        }
    }


    protected function RegistroDeCambios($objGuiaOrig, $objNuevGuia) {
        $strTextMens = '';
        $strCodiCkpt = 'MG';  // Modifico la Guia
        //-----------------------
        // Receptoria Destino
        //-----------------------
        if ($objGuiaOrig->ReceptoriaDestino != $this->objGuia->ReceptoriaDestino) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Recep. Destino: ".$objGuiaOrig->ReceptoriaDestino.
                            " --> ".$objNuevGuia->ReceptoriaDestino;
        }
        //-----------------------
        // Cantidad de Piezas
        //-----------------------
        if ($objGuiaOrig->CantPiez != $objNuevGuia->CantPiez) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Piezas: ".$objGuiaOrig->CantPiez." --> ".$objNuevGuia->CantPiez;
        }
        //-----------------------
        // Peso
        //-----------------------
        if ($objGuiaOrig->PesoGuia != $objNuevGuia->PesoGuia) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Peso: ".$objGuiaOrig->PesoGuia." --> ".$objNuevGuia->PesoGuia;
            // $this->controlDeCambioDePeso($objGuiaOrig,$objNuevGuia);
        }
        //-----------------------
        // Valor Declarado
        //-----------------------
        if ($objGuiaOrig->ValorDeclarado != $objNuevGuia->ValorDeclarado) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."V.Declarado: ".$objGuiaOrig->ValorDeclarado.
                            " --> ".$objNuevGuia->ValorDeclarado;
        }
        //-----------------------
        // Modalidad de Pago
        //-----------------------
        if ($objGuiaOrig->TipoGuia != $objNuevGuia->TipoGuia) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."M.Pago: ".TipoGuiaType::ToStringCorto($objGuiaOrig->TipoGuia).
                            " --> ".TipoGuiaType::ToStringCorto($objNuevGuia->TipoGuia);
        }
        if (strlen($strTextMens) > 0) {
            //----------------------------------------------------------------------------------------
            // En el Registro de Trabajo, debe quedar constancia de los cambios ocurridos a la Guia,
            // igualmente en el Log de Cambios
            //----------------------------------------------------------------------------------------
            $arrParaRegi['CodiCkpt'] = $strCodiCkpt;
            $arrParaRegi['TextMens'] = $strTextMens;
            $arrParaRegi['NumeGuia'] = $objGuiaOrig->NumeGuia;
            $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
            $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
            CrearRegistroDeTrabajo($arrParaRegi);

            $arrLogxCamb['strNombTabl'] = 'Guia';
            $arrLogxCamb['intRefeRegi'] = $this->objGuia->NumeGuia;
            $arrLogxCamb['strNombRegi'] = $this->objGuia->NombRemi;
            $arrLogxCamb['strDescCamb'] = $strTextMens;
            LogDeCambios($arrLogxCamb);
        }
    }

    //------------------------------------------------------------------------------------
    // Función responsable de los distintos comportamientos de los botones del formulario
    //------------------------------------------------------------------------------------
    protected function controlDeBotones() {
        $this->blnEditSupe = true;

        if ($this->blnEditMode) {
            //-----------------------------------------------------------
            // Unicamente el Usuario que creo la Guia, podra modificarla
            //-----------------------------------------------------------
            if (trim($this->objGuia->UsuarioCreacion) != trim($this->objUsuario->LogiUsua)) {
                $this->btnSave->Visible = false;
                $this->mensaje('Guia creada por otro Usuario.  No admite cambios','',
                    'w','',__iEXCL__);
            }
            //--------------------------------------------------------------------------
            // Si la guia tiene un status diferente al Pick-Up, ya no podra modificarse
            //--------------------------------------------------------------------------
            if ($this->objGuia->CodiCkpt != 'PU') {
                $this->btnSave->Visible = false;
                $this->mensaje('Guía en Gestión de Entrega. No admite cambios','',
                              'w','',__iEXCL__);
            }
            //------------------------------------------------------------------------
            // Si se trata de un Super-Usuario, se podrá modificar la guia únicamente
            // bajo la condicion de que la misma no haya sido entregada
            //------------------------------------------------------------------------
            if ($this->objUsuario->CodiGrup == 1) {
                if ($this->objGuia->CodiCkpt != 'OK') {
                    $this->blnEditSupe = true;
                    $this->mensaje();
                    $this->btnSave->Visible = true;
                }
            }
        }

        //---------------------------------------------------
        //Si la guía está facturada, ya no podrá modificarse
        //---------------------------------------------------
        if ($this->blnEstaFact) {
            $this->btnSave->Visible = false;
            $this->mensaje('Guía Facturada. No admite cambios','','w',
                           '',__iEXCL__);
        }
    }


    protected function enviarMensajeDeError($strTextMens) {
        $this->mensaje($strTextMens,'','d', '', __iHAND__);
    }


    protected function verificarDatos() {
        if (strlen($this->txtPesoGuia->Text) == 0) {
            $strMensUsua = 'Debe especificar el Peso!';
            $this->mensaje($strMensUsua,'','d', '',__iHAND__);
            return false;
        } else {
            if ($this->txtPesoGuia->Text <= 0) {
                $strMensUsua = 'El Peso <b>debe ser Mayor a cero!</b>';
                $this->mensaje($strMensUsua,'', 'd','',__iHAND__);
                return false;
            }
        }

        if (is_null($this->lstSucuDest->SelectedValue)) {
            $strMensUsua = 'Debe especificar el Destino del Envío!';
            $this->mensaje($strMensUsua,'', 'd','',__iHAND__);
            return false;
        }

        //--------------------------------------------------------------------------
        // Se verifica que la Receptoría Destino corresponda a la Sucursal Destino
        //--------------------------------------------------------------------------
        if (!is_null($this->lstReceDest->SelectedValue)) {
            $strReceDest = $this->lstReceDest->SelectedValue;
            $objReceDest = Counter::LoadBySiglas($strReceDest);
            if ($objReceDest->SucursalId != $this->strCodiEsta) {
                $strMensUsua = 'La Receptoría Destino <b>'.$strReceDest.
                               '</b> no corresponde a la Sucursal Destino <b>'.$this->strCodiEsta.'</b>!';
                $this->mensaje($strMensUsua,'','d','i',__iHAND__);
                return false;
            }
        }

        $this->decValoDecl = $this->txtValoDecl->Text;
        if (strlen($this->txtValoDecl->Text) > 0) {
            $this->txtValoDecl->Text = DejarSoloLosNumeros($this->txtValoDecl->Text);
            //----------------------------------------------------------------------------------------------------
            // Si el valor declarado es mayor a cero, y a su vez, es menor al rango reglamentario, se notifica al
            // usuario que dicho valor tiene que ser mayor o igual al valor mínimo reglamentario.
            //----------------------------------------------------------------------------------------------------
            if ($this->txtValoDecl->Text > 0 && $this->txtValoDecl->Text < $this->decMiniSegu) {
                $strMensUsua ='El Valor Declarado <b>mínimo aceptable es: '.$this->decMiniSegu.'!</b>';
                $this->mensaje($strMensUsua, '','d','',__iHAND__);
                return false;
            }
            //---------------------------------------------------------------------------------------------------
            // Si el valor declarado es mayor a cero, y a su vez, es mayor al rango reglamentario, se notifica al
            // usuario que dicho valor tiene que ser menor o igual al valor máximo reglamentario.
            //---------------------------------------------------------------------------------------------------
            if ($this->txtValoDecl->Text > 0 && $this->txtValoDecl->Text > $this->decMaxiSegu) {
                $this->txtValoDecl->Text = $this->decMaxiSegu;
                $this->decValoDecl = $this->decMaxiSegu;
                $strMensUsua ='El Valor Declarado <b>se ajustó al máximo permitido (Bs.'. $this->decMaxiSegu.')</b>';
                $this->mensaje($strMensUsua, '', 'w', '', __iEXCL__);
                return false;
            }
        }

        if (is_null($this->rdbModaPago->SelectedValue)) {
            $strMensUsua ='Debe especificar la Forma de Pago!';
            $this->mensaje($strMensUsua,'', 'd','',__iHAND__);
            return false;
        }

        if (strlen($this->txtCantPiez->Text) == 0) {
            $strMensUsua = 'Debe especificar la cantidad de piezas!';
            $this->mensaje($strMensUsua,'m', 'd','',__iHAND__);
            return false;
        } else {
            if ($this->txtCantPiez->Text <= 0) {
                $strMensUsua ='La Cantidad de Piezas <b>debe ser mayor a Cero(0)!</b>';
                $this->mensaje($strMensUsua,'m', 'd','',__iHAND__);
                return false;
            }
        }

        //-------------------------------------------------------------------------
        // Se verifica el Limite de Kilos en funcion del Origen/Destino de la guia
        //-------------------------------------------------------------------------
        $decPesoGuia = $this->txtPesoGuia->Text;
        $intCantPiez = $this->txtCantPiez->Text;
        $decPromPeso = $decPesoGuia / $intCantPiez;

        foreach ($this->arrReceLimi as $key => $value) {
            //--------------------------------------------------------------------
            // Si el Origen o el Destino estan en la lista de las Receptorias con
            // limite de peso, entonces se notifica al Usuario
            //--------------------------------------------------------------------
            if ($this->strReceOrig == $key || $this->lstReceDest->SelectedValue == $key) {
                if ($decPromPeso > $value) {
                    $strMensUsua ='El Peso <b>no puede exceder '.$value.' Kg (Origen/Destino con Limite de Kilos)</b>';
                    $this->mensaje($strMensUsua, '','d','',__iHAND__);
                    return false;
                }
            }
        }

        $this->mensaje();
        return true;
    }

    protected function Form_Validate() {
        $this->mensaje();
        if (strlen($this->txtNumeCedu->Text) == 0) {
            $strTextMens = 'Cédula/RIF del Remitente <b>Requerida</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtNumeCedu->Text = DejarNumerosVJGuion($this->txtNumeCedu->Text);
        }
        if (strlen($this->txtNombClie->Text) == 0) {
            $strTextMens = 'Nombre del Remitente <b>Requerido</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtNombClie->Text = limpiarCadena($this->txtNombClie->Text);
        }
        if (strlen($this->txtTeleFijo->Text) == 0) {
            $strTextMens = 'Teléfono Fijo del Remitente <b>Requerido</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtTeleFijo->Text = DejarSoloLosNumeros($this->txtTeleFijo->Text);
        }
        if (strlen($this->txtTeleFijo->Text) > 11) {
            $strTextMens = 'Teléfono Fijo del Remitente <b>No debe tener más de 11 caracteres numéricos</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtTeleFijo->Text = DejarSoloLosNumeros($this->txtTeleFijo->Text);
        }
        if (strlen($this->txtTeleMovi->Text) == 0) {
            $strTextMens = 'Teléfono Movil del Remitente <b>Requerido</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtTeleMovi->Text = DejarSoloLosNumeros($this->txtTeleMovi->Text);
        }
        if (strlen($this->txtTeleMovi->Text) > 11) {
            $strTextMens = 'Teléfono Movil del Remitente <b>No debe tener más de 11 caracteres numéricos</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtTeleMovi->Text = DejarSoloLosNumeros($this->txtTeleMovi->Text);
        }
        if (strlen($this->txtDireClie->Text) == 0) {
            $strTextMens = 'Dirección del Remitente <b>Requerida</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtDireClie->Text = limpiarCadena($this->txtDireClie->Text);
        }
        if (is_null($this->lstSucuDest->SelectedValue)) {
            $strTextMens = 'Sucursal Destino <b>Requerida</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        }
        if (strlen($this->txtCeduDest->Text) == 0) {
            $strTextMens = 'Cédula del Destinario <b>Requerida</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtCeduDest->Text = DejarNumerosVJGuion($this->txtCeduDest->Text);
        }
        if (strlen($this->txtNombDest->Text) == 0) {
            $strTextMens = 'Nombre del Destinario <b>Requerido</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtNombDest->Text = limpiarCadena($this->txtNombDest->Text);
        }
        if (strlen($this->txtTeleDest->Text) == 0) {
            $strTextMens = 'Teléfono Movil del Destinario <b>Requerido</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtTeleDest->Text = DejarSoloLosNumeros($this->txtTeleDest->Text);
        }
        if (strlen($this->txtTeleDest->Text) > 11) {
            $strTextMens = 'Teléfono Movil del Destinatario <b>No debe tener más de 11 caracteres numéricos</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtTeleDest->Text = DejarSoloLosNumeros($this->txtTeleDest->Text);
        }
        if (strlen($this->txtDireDest->Text) == 0) {
            $strTextMens = 'Dirección del Destinatario <b>Requerida</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtDireDest->Text = limpiarCadena($this->txtDireDest->Text);
        }
        if (strlen($this->txtCantPiez->Text) == 0) {
            $strTextMens = 'Cantidad de Piezas <b>Requerida</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        }
        if ($this->txtCantPiez->Text <= 0) {
            $strTextMens = 'Cantidad de Piezas <b>Debe ser Mayor a Cero (0)</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        }
        if (strlen($this->txtPesoGuia->Text) == 0) {
            $strTextMens = 'Peso <b>Requerido</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        }
        if ($this->txtPesoGuia->Text <= 0) {
            $strTextMens = 'Peso <b>Debe ser Mayor a Cero (0)</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        }
        if (strlen($this->txtDescCont->Text) == 0) {
            $strTextMens = 'Descripción del Contenido <b>Requerida</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        } else {
            $this->txtDescCont->Text = limpiarCadena($this->txtDescCont->Text);
        }
        if (strlen($this->txtValoDecl->Text) == 0) {
            $this->txtValoDecl->Text = 0;
        }
        if (is_null($this->rdbModaPago->SelectedValue)) {
            $strTextMens = 'Modalidad de Pago <b>Requerida</b>';
            $this->enviarMensajeDeError($strTextMens);
            return false;
        }
        if ($this->rdbReceDomi->SelectedValue == 'R') {
            $strSiglRece = $this->lstReceDest->SelectedValue;
            if (strlen($strSiglRece) == 0) {
                $strTextMens = 'Receptoría Destino <b>Requerida</b>';
                $this->enviarMensajeDeError($strTextMens);
                return false;
            }
            $objReceDest = Counter::LoadBySiglas($strSiglRece);
            if (!$objReceDest) {
                $strTextMens = 'Receptoría Destino <b>Requerida</b>';
                $this->enviarMensajeDeError($strTextMens);
                return false;
            }
            $arrSucuDest = explode('|',$this->lstSucuDest->SelectedValue);
            $strSucuDest = $arrSucuDest[0];
            if ($objReceDest->SucursalId != $strSucuDest) {
                $strTextMens = 'La Receptoría <b>No pertenece a la Sucursal '.$strSucuDest.'</b>';
                $this->enviarMensajeDeError($strTextMens);
                return false;
            }
        }
        if (strlen($this->txtPorcDcto->Text) > 0) {
            if ($this->txtPorcDcto->Text > 100) {
                $strMensErro = 'Porcentaje de Descuento <b>No puede ser mayor a 100</b>';
                $this->enviarMensajeDeError($strMensErro);
                return false;
            }
        }
        return true;
    }

}

// Go ahead and run this form object to render the page and its event handlers, using
// generated/fac_tari_masi_edit.tpl.php as the included HTML template file

CrearGuiaExp::Run('CrearGuiaExp');