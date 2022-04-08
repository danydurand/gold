<?php
//-----------------------------------------------------------------------------------
// Programa       : crear_guia_nac.php
// Realizado por  : Daniel Durand
// Fecha Elab.    : 03/06/2021
// Descripcion    : Este programa permite al Usuario Crear una Guía Nacional
//-----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class CrearGuiaExp extends FormularioBaseKaizen {
    /* @var $objGuia Guias */
    protected $objGuia;

    /* @var $objClieReta ClientesRetail */
    protected $objClieReta;

    /* @var $objProdExpo Productos */
    protected $objProdExpo;

    /* @var $objDestPmnx ClientesRetail */
    protected $objDestPmnx;
    protected $objProducto;
    protected $objGuiaOrig;
    /**
     * @var $objClieNaci MasterCliente
     */
    protected $objClieNaci;

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

    protected $lblNewxProf;
    protected $lblNuevProf;
    protected $txtNuevProf;
    protected $btnSaveProf;

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

    protected $intSucuOrig;
    protected $intReceOrig;
    protected $strCodiEsta;
    protected $strZonaIncu;

    protected $calFechGuia;

    protected $lstServExpo;
    protected $lstFormPago;
    protected $lstModoValo;
    protected $lstAliaCome;
    protected $lstClieCorp;

    protected $txtNumeGuia;

    protected $txtNumeCedu;
    protected $txtNombClie;
    protected $txtTeleFijo;
    protected $txtTeleMovi;
    protected $txtDireClie;
    protected $txtEmaiRemi;
    protected $calFechNaci;
    protected $lstProfClie;
    protected $lstSexoClie;

    protected $lstSucuOrig;
    protected $lstSucuDest;
    protected $lstReceDest;

    protected $txtCeduDest;
    protected $txtNombDest;
    protected $lstSexoDest;
    protected $txtTlfdFijo;
    protected $txtTlfdMovi;
    protected $txtEmaiDest;
    protected $txtDireDest;
    protected $txtEstaDest;
    protected $txtCiudDest;
    protected $txtPostDest;

    protected $txtCantPiez;
    protected $txtDescCont;
    protected $txtValoDecl;
    protected $lstEnviSgro;

    protected $dtgPiezTemp;

    protected $dtgConcGuia;
    protected $objProcEjec;

    protected $txtTasaDola;
    protected $txtTotaGuia;
    protected $txtIdxxPref;

    protected $txtPorcDcto;

    protected $lblMontBase;
    protected $lblMontDcto;
    protected $lblMontIvax;
    protected $lblMontFran;
    protected $lblMontSegu;
    protected $lblMontTota;

    protected $btnErroProc;
    protected $btnImprGuia;
    protected $btnOtraGuia;
    protected $btnConsGuia;
    protected $btnEnviSmsx;
    protected $btnMasxAcci;
    protected $lblBotoPopu;
    protected $lblPopuModa;

    protected $objApliReco;
    protected $blnVerpUnox = true;
    protected $btnNextPage;
    protected $btnPrevPage;

    protected $btnSavePiez;
    protected $btnCancPiez;
    protected $btnDelePiez;

    protected $lblTituPiez;
    protected $blnAgrePiez = true;
    protected $txtContPiez;

    protected $txtKiloEnvi;
    protected $txtAltoEnvi;
    protected $txtAnchEnvi;
    protected $txtLargEnvi;
    protected $txtVoluEnvi;
    protected $txtPiesEnvi;

    protected $txtKiloPiez;
    protected $lstEmpaPiez;
    protected $txtAltoPiez;
    protected $txtAnchPiez;
    protected $txtLargPiez;
    protected $txtVoluPiez;
    protected $txtValoPiez;
    protected $txtPiesPiez;
    protected $blnEditPiez = false;
    protected $intEditPiez;

    protected $lblContPiez;
    protected $lblEmpaPiez;
    protected $lblAltoPiez;
    protected $lblAnchPiez;
    protected $lblLargPiez;
    protected $lblVoluPiez;
    protected $lblValoPiez;
    protected $lblPiesPiez;
    protected $lblKiloPiez;

    protected $decTasaDola;
    protected $decTasaEuro;
    protected $blnCambPiez;

    protected $lblRepePiez;
    protected $txtRepePiez;
    protected $lstUnidMedi;
    protected $lblUnidMedi;

    protected $txtRefeExpo;
    protected $txtRazoExpo;

    protected $arrDatoFact;
    protected $dtgDatoFact;
    protected $blnAliaCome = false;
    protected $blnPrimInte = true;

    protected $dtgConcOpci;
    protected $colConcSele;
    protected $arrOpciToma = [];
    protected $objProcOpci;

    
    protected function SetupGuia() {
        $intIdxxGuia = QApplication::PathInfo(0);

        //----------------------------------------------------------
        // En caso de que sea necesario el manejo de multi-piezas
        //----------------------------------------------------------
        $strNombProc = 'Piezas Temporales: '.$this->objUsuario->LogiUsua.' '.date('Y-m-d');
        $this->objProcEjec = CrearProceso($strNombProc);
        //---------------------------------
        // Manejo de Conceptos Opcionales
        //---------------------------------
        $strTextInde = !is_null($intIdxxGuia) ? $intIdxxGuia : date('Y-m-d');
        $strNombProc = 'Conceptos Opcionales: '.$this->objUsuario->LogiUsua.' (GuiaId: '.$strTextInde.')';
        $this->objProcOpci = CrearProceso($strNombProc);

        if ($intIdxxGuia) {
            $this->objGuia = Guias::Load($intIdxxGuia);
            if (!$this->objGuia) {
                throw new Exception('Could not find a Guia object with PK arguments: ' . $intIdxxGuia);
            }

            $this->blnEditMode = true;
            $this->objClieReta = ClientesRetail::Load($this->objGuia->ClienteRetailId);
            $this->objDestPmnx = ClientesRetail::LoadByCedulaRif($this->objGuia->CedulaDestinatario);

            if ($this->objClieReta) {
                $this->blnEditClie = true;
            }

            if ($this->objDestPmnx) {
                $this->blnEditDest = true;
            }

            //--------------------------------------------------------
            // Las piezas de la guia, se graban en la tabla temporal
            //--------------------------------------------------------
            t('Buscando piezas...');
            $arrPiezGuia = $this->objGuia->GetGuiaPiezasAsGuiaArray();
            foreach ($arrPiezGuia as $objPiezGuia) {
                t('Pieza: '.$objPiezGuia->IdPieza);
                $objPiezTemp = new PiezasTemp();
                $objPiezTemp->ProcesoErrorId = $this->objProcEjec->Id;
                $objPiezTemp->PiezaId        = $objPiezGuia->Id;
                $objPiezTemp->EmpaqueId      = $objPiezGuia->EmpaqueId;
                $objPiezTemp->Descripcion    = substr(trim($objPiezGuia->Descripcion),0,50);
                $objPiezTemp->Kilos          = $objPiezGuia->Kilos;
                $objPiezTemp->Alto           = $objPiezGuia->Alto;
                $objPiezTemp->Ancho          = $objPiezGuia->Ancho;
                $objPiezTemp->Largo          = $objPiezGuia->Largo;
                $objPiezTemp->Volumen        = $objPiezGuia->Volumen;
                $objPiezTemp->ValorDeclarado = $objPiezGuia->ValorDeclarado;
                $objPiezTemp->PiesCub        = $objPiezGuia->PiesCub;
                $objPiezTemp->CreatedBy      = $this->objUsuario->CodiUsua;
                $objPiezTemp->Save();
            }

        } else {
            $this->objGuia = new Guias();
            $this->blnEditMode = false;
            PiezasTemp::EliminarDelUsuario($this->objUsuario->CodiUsua);
            GcoTemp::EliminarDelUsuario($this->objUsuario->CodiUsua);
            t('Se trata de una Guia nueva, así que elimine todas las piezas temporales del Usuario');
        }

        $this->cargarConceptosOpcionales($this->objGuia);

        $this->intSucuOrig = $_SESSION['SucursalId'];
        $this->intReceOrig = $_SESSION['ReceptoriaId'];
        $this->objClieNaci = unserialize($_SESSION['ClieNaci']);
        $this->objProdExpo = unserialize($_SESSION['ProdExpo']);
        $this->decTasaDola = $_SESSION['TasaDola'];
        $this->decTasaEuro = $_SESSION['TasaEuro'];
    }

    protected function cargarConceptosOpcionales(Guias $objGuiaProc) {
        /* @var $objConcOpci Conceptos */
        //---------------------------------------------------------------------
        // Los Concepto Opcionales de la guia, se graban en la tabla temporal
        //---------------------------------------------------------------------
        t('Buscando conceptos opcionales asociados a la guia...');
        $arrConcOpci = Conceptos::OpcionalesTomadosPorLaGuia($objGuiaProc->Id);
        t('La guia tiene: '.count($arrConcOpci).' conceptos opcionales asociados');
        foreach ($arrConcOpci as $objConcOpci) {
            t('Concepto: '.$objConcOpci->Nombre);
            $objConcTemp = new GcoTemp();
            $objConcTemp->ProcesoErrorId = $this->objProcOpci->Id;
            $objConcTemp->ConceptoId     = $objConcOpci->Id;
            $objConcTemp->CreatedBy      = $this->objUsuario->CodiUsua;
            $objConcTemp->CreatedAt      = new QDateTime(QDateTime::Now);
            $objConcTemp->Save();
        }
        //---------------------------------------------------------------------
        // Ahora se cargan los Concepto Opcionales, no asociados a la guia
        //---------------------------------------------------------------------
        t('Buscando conceptos opcionales...');
        $arrConcOpci   = Conceptos::OpcionalesActivos();
        foreach ($arrConcOpci as $objConcOpci) {
            t('Cargando Concepto: '.$objConcOpci->Nombre);
            try {
                $objConcTemp = new GcoTemp();
                $objConcTemp->ProcesoErrorId = $this->objProcOpci->Id;
                $objConcTemp->ConceptoId     = $objConcOpci->Id;
                $objConcTemp->CreatedBy      = $this->objUsuario->CodiUsua;
                $objConcTemp->CreatedAt      = new QDateTime(QDateTime::Now);
                $objConcTemp->Save();
                t('Concepto cargado');
            } catch (Exception $e) {
                t('Concepto: '.$objConcOpci->Nombre.' posiblemente ya estaba cargado');
                t('Excepcion: '.$e->getMessage());
            } catch (Error $e) {
                t('Error: '.$e->getMessage());
            }
        }

    }


    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupGuia();

        $this->lblTituForm->Text = QApplication::Translate('Guia Exportación');

        //---------------------
        // Datos del Remitente
        //---------------------
        $this->txtNumeGuia_Create();
        $this->calFechGuia_Create();
        $this->txtNumeCedu_Create();
        $this->txtNombClie_Create();
        $this->txtTeleFijo_Create();
        $this->txtTeleMovi_Create();
        $this->txtDireClie_Create();
        $this->txtEmaiRemi_Create();
        $this->calFechNaci_Create();

        //t('k1');
        $this->lstProfClie_Create();
        $this->lstSexoClie_Create();


        $this->lblNewxProf_Create();
        $this->lblNuevProf_Create();
        $this->txtNuevProf_Create();
        $this->btnSaveProf_Create();

        //t('k2');
        //------------------------
        // Servicio
        //------------------------
        $this->lstSucuOrig_Create();
        $this->lstSucuDest_Create();
        $this->lstServExpo_Create();
        $this->lstReceDest_Create();

        //t('k3');
        //------------------------
        // Datos del Destinatario
        //------------------------
        $this->txtCeduDest_Create();
        $this->txtNombDest_Create();
        $this->lstSexoDest_Create();
        $this->txtDireDest_Create();
        $this->txtTlfdFijo_Create();
        $this->txtTlfdMovi_Create();
        $this->txtEmaiDest_Create();
        $this->txtEstaDest_Create();
        $this->txtCiudDest_Create();
        $this->txtPostDest_Create();

        //t('k5');
        //-----------------
        // Datos del Envío
        //-----------------
        $this->txtDescCont_Create();
        $this->txtValoDecl_Create();
        $this->lstEnviSgro_Create();
        $this->lstFormPago_Create();
        $this->lstModoValo_Create();
        $this->lblUnidMedi_Create();
        $this->lstUnidMedi_Create();
        $this->lstAliaCome_Create();
        $this->lstClieCorp_Create();
        $this->txtCantPiez_Create();

        $this->txtDescCont = disableControl($this->txtDescCont);
        $this->txtCantPiez = disableControl($this->txtCantPiez);

        //t('k6');
        //---------------------
        // Costos del Servicio
        //---------------------
        $this->dtgConcGuia_Create();
        $this->txtRefeExpo_Create();
        $this->txtRazoExpo_Create();

        //----------------
        // Facturacion
        //----------------
        $this->txtTasaDola_Create();
        $this->txtTasaDola = disableControl($this->txtTasaDola);
        $this->txtTotaGuia_Create();
        $this->txtTotaGuia = disableControl($this->txtTotaGuia);
        $this->txtIdxxPref_Create();
        $this->txtIdxxPref = disableControl($this->txtIdxxPref);

        $this->dtgPiezTemp_Create();

        //t('k7');
        //-----------------
        // Botones y otros
        //-----------------
        $this->btnSave->Text = TextoIcono('cogs fa-lg','Guardar');
        $this->btnNextPage_Create();
        $this->btnPrevPage_Create();

        $this->lblTituPiez_Create();
        $this->lblContPiez_Create();
        $this->lblEmpaPiez_Create();
        $this->lblAltoPiez_Create();
        $this->lblAnchPiez_Create();
        $this->lblLargPiez_Create();
        $this->lblVoluPiez_Create();
        $this->lblValoPiez_Create();
        $this->lblRepePiez_Create();
        $this->lblPiesPiez_Create();
        $this->lblKiloPiez_Create();

        $this->txtContPiez_Create();
        $this->txtKiloEnvi_Create();
        $this->txtAltoEnvi_Create();
        $this->txtAnchEnvi_Create();
        $this->txtLargEnvi_Create();
        $this->txtVoluEnvi_Create();
        $this->txtPiesEnvi_Create();

        $this->txtKiloEnvi = disableControl($this->txtKiloEnvi);
        $this->txtAltoEnvi = disableControl($this->txtAltoEnvi);
        $this->txtAnchEnvi = disableControl($this->txtAnchEnvi);
        $this->txtLargEnvi = disableControl($this->txtLargEnvi);
        $this->txtVoluEnvi = disableControl($this->txtVoluEnvi);
        $this->txtPiesEnvi = disableControl($this->txtPiesEnvi);

        $this->lstEmpaPiez_Create();
        $this->txtAltoPiez_Create();
        $this->txtAnchPiez_Create();
        $this->txtLargPiez_Create();
        $this->txtVoluPiez_Create();
        $this->txtValoPiez_Create();
        $this->txtRepePiez_Create();
        $this->txtPiesPiez_Create();
        $this->txtKiloPiez_Create();
        $this->btnSavePiez_Create();
        $this->btnCancPiez_Create();
        $this->btnDelePiez_Create();

        if ($this->blnEditMode) {
            if (!is_null($this->objGuia->FacturaId)) {
                $this->warning('La Guia esta Facturada | No se admiten cambios');
                $this->btnSave->Visible = false;
            } else {
                $this->txtNumeCedu->SetFocus();
            }
            $this->arrOpciToma = Conceptos::OpcionalesTomadosPorLaGuia($this->objGuia->Id);
            t('En modo edicion.  La guia tiene: '.count($this->arrOpciToma).' concepto opcionales');
        } else {
            $this->txtNumeCedu->SetFocus();
        }

        $this->dtgConcOpci_Create();
        $this->lstModoValo_Change();

        $objSucuUsua = Counter::Load($_SESSION['ReceptoriaId']);
        if (!is_null($objSucuUsua->AliadoComercialId)) {
            $this->blnAliaCome = true;
            $this->cargarAliados($objSucuUsua->AliadoComercialId);
            $this->lstAliaCome = disableControl($this->lstAliaCome);
            $this->lstClieCorp->Visible = false;
        }
    }


    //-------------------------
    // Creando los objetos ...
    //-------------------------

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = 'Nro Guia';
        $this->txtNumeGuia->Width = 150;
        $this->txtNumeGuia->Enabled = false;
        $this->txtNumeGuia->ForeColor = 'blue';
        if ($this->blnEditMode) {
            $this->txtNumeGuia->Text = $this->objGuia->Numero;
        }
    }

    protected function calFechGuia_Create() {
        $this->calFechGuia = new QTextBox($this);
        $this->calFechGuia->Name = 'Fecha';
        $this->calFechGuia->Width = 150;
        $this->calFechGuia->Enabled = false;
        $this->calFechGuia->ForeColor = 'blue';
        if ($this->blnEditMode) {
            $this->calFechGuia->Text = $this->objGuia->Fecha->__toString("DD/MM/YYYY");
        } else {
            $this->calFechGuia->Text = date('d/m/Y');
        }

    }

    protected function txtNumeCedu_Create() {
        $this->txtNumeCedu = new QTextBox($this);
        $this->txtNumeCedu->Name = 'Cedula/RIF';
        $this->txtNumeCedu->Width = 120;
        $this->txtNumeCedu->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNumeCedu->Text = $this->objGuia->ClienteRetail->CedulaRif;
        }
        $this->txtNumeCedu->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeCedu_Blur'));
    }

    protected function txtNombClie_Create() {
        $this->txtNombClie = new QTextBox($this);
        $this->txtNombClie->Placeholder = 'Nombre del Remitente';
        $this->txtNombClie->Width = 260;
        $this->txtNombClie->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNombClie->Text = $this->objGuia->NombreRemitente;
        }
    }

    protected function txtTeleFijo_Create() {
        $this->txtTeleFijo = new QTextBox($this);
        $this->txtTeleFijo->Placeholder = 'Ej: 02123782514';
        $this->txtTeleFijo->Width = 120;
        if ($this->blnEditMode) {
            $this->txtTeleFijo->Text = $this->objGuia->TelefonoRemitente;
        }
    }

    protected function txtTeleMovi_Create() {
        $this->txtTeleMovi = new QTextBox($this);
        $this->txtTeleMovi->Placeholder = 'Ej: 04241238715';
        $this->txtTeleMovi->Width = 120;
        if ($this->blnEditMode) {
            t('Tlf Movil Remi: '.$this->objGuia->TelefonoMovilRemitente);
            $this->txtTeleMovi->Text = $this->objGuia->TelefonoMovilRemitente;
        }
    }

    protected function txtDireClie_Create() {
        $this->txtDireClie = new QTextBox($this);
        $this->txtDireClie->Placeholder = 'Direccion del Remitente';
        $this->txtDireClie->Width = 408;
        $this->txtDireClie->Rows = 4;
        $this->txtDireClie->TextMode = QTextMode::MultiLine;
        $this->txtDireClie->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDireClie->Text = $this->objGuia->DireccionRemitente;
        }
    }

    protected function calFechNaci_Create() {
        $this->calFechNaci = new QTextBox($this);
        $this->calFechNaci->Width = 120;
        if ($this->blnEditMode && (strlen($this->objGuia->ClienteRetail->FechaNacimiento) > 0)) {
            //t('Aqui estoy. La fecha es: '.$this->objGuia->ClienteRetail->FechaNacimiento);
            $this->calFechNaci->Text = $this->objGuia->ClienteRetail->FechaNacimiento->__toString("DD/MM/YYYY");
        }
    }

    protected function txtEmaiRemi_Create() {
        $this->txtEmaiRemi = new QTextBox($this);
        $this->txtEmaiRemi->Placeholder = 'correo@remitente.com';
        $this->txtEmaiRemi->Width = 260;
        $this->txtEmaiRemi->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
        if ($this->blnEditMode) {
            $this->txtEmaiRemi->Text = $this->objGuia->EmailRemitente;
        }
    }

    protected function lstProfClie_Create() {
        $this->lstProfClie = new QListBox($this);
        $this->lstProfClie->Width = 260;
        if ($this->blnEditMode) {
            $this->cargarProfesiones($this->objGuia->ClienteRetail->ProfesionId);
        } else {
            $this->cargarProfesiones();
        }
    }

    protected function lstSexoClie_Create() {
        $this->lstSexoClie = new QListBox($this);
        $this->lstSexoClie->Width = 120;
        $blnSeleMasc = false;
        $blnSeleFeme = false;
        if ($this->blnEditMode) {
            $blnSeleMasc = $this->objGuia->ClienteRetail->Sexo == 'M' ? true : false;
            $blnSeleFeme = $this->objGuia->ClienteRetail->Sexo == 'F' ? true : false;
        }
        $this->lstSexoClie->AddItem('- Selec -',null);
        $this->lstSexoClie->AddItem('MASCULINO','M', $blnSeleMasc);
        $this->lstSexoClie->AddItem('FEMENINO','F', $blnSeleFeme);
    }

    protected function lblNewxProf_Create() {
        $this->lblNewxProf = new QLabel($this);
        $this->lblNewxProf->Text = 'Profesión <i class="fa fa-plus"></i>';
        $this->lblNewxProf->HtmlEntities = false;
        $this->lblNewxProf->AddAction(new QClickEvent(), new QAjaxAction('lblNewxProf_Click'));
    }

    protected function lblNewxProf_Click() {
        $this->lblNuevProf->Visible = !$this->lblNuevProf->Visible;
        $this->txtNuevProf->Visible = !$this->txtNuevProf->Visible;
        $this->btnSaveProf->Visible = !$this->btnSaveProf->Visible;
    }

    protected function lblNuevProf_Create() {
        $this->lblNuevProf = new QLabel($this);
        $this->lblNuevProf->Text = 'Nueva Profesion';
        $this->lblNuevProf->Visible = false;
    }

    protected function txtNuevProf_Create() {
        $this->txtNuevProf = new QTextBox($this);
        $this->txtNuevProf->Placeholder = 'Nombre de la Profesion';
        $this->txtNuevProf->Width = 300;
        $this->txtNuevProf->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtNuevProf->Visible = false;
    }

    protected function btnSaveProf_Create() {
        $this->btnSaveProf = new QButtonS($this);
        $this->btnSaveProf->Text = TextoIcono('check','Guardar Profesión','F','lg');
        $this->btnSaveProf->Visible = false;
        $this->btnSaveProf->AddAction(new QClickEvent(), new QServerAction('btnSaveProf_Click'));
    }



    protected function lstSucuOrig_Create() {
        $this->lstSucuOrig = new QListBox($this);
        $this->lstSucuOrig->Width = 150;
        if ($this->blnEditMode) {
            $this->cargarOrigenes($this->objGuia->OrigenId);
        } else {
            $this->cargarOrigenes();
        }
        if ($this->blnAliaCome) {
            $this->lstSucuOrig->Enabled = false;
        }
    }

    protected function lstSucuDest_Create() {
        $this->lstSucuDest = new QListBox($this);
        $this->lstSucuDest->Width = 150;
        if ($this->blnEditMode) {
            $this->cargarDestinos($this->objGuia->DestinoId);
        } else {
            $this->cargarDestinos();
        }
    }

    protected function lstServExpo_Create() {
        $this->lstServExpo = new QListBox($this);
        $this->lstServExpo->Name = 'Servicio';
        $this->lstServExpo->Width = 150;
        $blnSeleAere = false;
        $blnSeleMari = false;
        if (!$this->blnEditMode) {
            $blnSeleMari = true;
        } else {
            $blnSeleAere = $this->objGuia->ServicioImportacion == 'AER';
            $blnSeleMari = $this->objGuia->ServicioImportacion == 'MAR';
        }
        $this->lstServExpo->AddItem('MARITIMO','MAR', $blnSeleMari);
        $this->lstServExpo->AddItem('AEREO','AER', $blnSeleAere);
    }

    protected function lstReceDest_Create() {
        $this->lstReceDest = new QListBox($this);
        $this->lstReceDest->Name = 'Receptoria';
        $this->lstReceDest->Width = 150;
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

    protected function txtNombDest_Create() {
        $this->txtNombDest = new QTextBox($this);
        $this->txtNombDest->Placeholder = 'Nombre del Destinatario';
        $this->txtNombDest->Width = 280;
        $this->txtNombDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNombDest->Text = $this->objGuia->NombreDestinatario;
        }
    }

    protected function lstSexoDest_Create() {
        $this->lstSexoDest = new QListBox($this);
        $blnSeleMasc = false;
        $blnSeleFeme = false;
        if ($this->blnEditMode) {
            $blnSeleMasc = $this->objGuia->SexoDestinatario == 'M' ? true : false;
            $blnSeleFeme = $this->objGuia->SexoDestinatario == 'F' ? true : false;
        }
        $this->lstSexoDest->AddItem('- Selec -',null);
        $this->lstSexoDest->AddItem('MASCULINO','M', $blnSeleMasc);
        $this->lstSexoDest->AddItem('FEMENINO','F', $blnSeleFeme);
    }

    protected function cargarSexos($strNombCtrl,$strSexoClie=null) {
        $strNombCtrl->AddItem('- Selec -',null);
        $strNombCtrl->AddItem('MASCULINO','M', 'M' == $strSexoClie);
        $strNombCtrl->AddItem('FEMENINO','F', 'F' == $strSexoClie);
    }

    protected function txtTlfdFijo_Create() {
        $this->txtTlfdFijo = new QTextBox($this);
        $this->txtTlfdFijo->Placeholder = 'Ej: 02125261498';
        $this->txtTlfdFijo->Width = 120;
        if ($this->blnEditMode) {
            $this->txtTlfdFijo->Text = $this->objGuia->TelefonoDestinatario;
        }
    }

    protected function txtTlfdMovi_Create() {
        $this->txtTlfdMovi = new QTextBox($this);
        $this->txtTlfdMovi->Placeholder = 'Ej: 04162513678';
        $this->txtTlfdMovi->Width = 120;
        if ($this->blnEditMode) {
            $this->txtTlfdMovi->Text = $this->objGuia->TelefonoMovilDestinatario;
        }
    }

    protected function txtEmaiDest_Create() {
        $this->txtEmaiDest = new QTextBox($this);
        $this->txtEmaiDest->Placeholder = 'correo@destinatario.com';
        $this->txtEmaiDest->Width = 260;
        $this->txtEmaiDest->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
        if ($this->blnEditMode) {
            $this->txtEmaiDest->Text = $this->objGuia->EmailDestinatario;
        }
    }


    protected function txtDireDest_Create() {
        $this->txtDireDest = new QTextBox($this);
        $this->txtDireDest->Placeholder = 'Direccion de entrega (incluya puntos de referencia)';
        $this->txtDireDest->Width = 545;
        $this->txtDireDest->Rows = 3;
        $this->txtDireDest->TextMode = QTextMode::MultiLine;
        $this->txtDireDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDireDest->Text = $this->objGuia->DireccionDestinatario;
        }
    }

    protected function txtEstaDest_Create() {
        $this->txtEstaDest = new QTextBox($this);
        $this->txtEstaDest->Placeholder = 'Estado';
        $this->txtEstaDest->Width = 180;
        $this->txtEstaDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtEstaDest->Text = $this->objGuia->Estado;
        }
    }

    protected function txtCiudDest_Create() {
        $this->txtCiudDest = new QTextBox($this);
        $this->txtCiudDest->Placeholder = 'Ciudad';
        $this->txtCiudDest->Width = 180;
        $this->txtCiudDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtCiudDest->Text = $this->objGuia->Ciudad;
        }
    }

    protected function txtPostDest_Create() {
        $this->txtPostDest = new QTextBox($this);
        $this->txtPostDest->Placeholder = 'C. Postal';
        $this->txtPostDest->Width = 120;
        $this->txtPostDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtPostDest->Text = $this->objGuia->CodigoPostal;
        }
    }


    protected function lstEnviSgro_Create() {
        $this->lstEnviSgro = new QListBox($this);
        $this->lstEnviSgro->Width = 80;
        if ($this->blnEditMode) {
            $this->cargarModalidadesDeSgro($this->objGuia->Asegurado);
        } else {
            $this->cargarModalidadesDeSgro();
        }
    }

    protected function txtValoDecl_Create() {
        $this->txtValoDecl = new QFloatTextBox($this);
        $this->txtValoDecl->Name = 'Valor Decl.';
        $this->txtValoDecl->Width = 60;
        $this->txtValoDecl->ToolTip = 'Un monto mayor a cero, implica que el envío se asegura';
        if ($this->blnEditMode) {
            $this->txtValoDecl->Text = $this->objGuia->ValorDeclarado;
        } else {
            $this->txtValoDecl->Text = '';
        }
    }

    protected function lstFormPago_Create() {
        $this->lstFormPago = new QListBox($this);
        $this->lstFormPago->Name = 'F. Pago';
        if (!$this->blnEditMode) {
            $this->cargarModalidadesDePago();
        } else {
            $this->cargarModalidadesDePago($this->objGuia->FormaPago);
        }
    }

    protected function lstModoValo_Create() {
        $this->lstModoValo = new QListBox($this);
        $this->lstModoValo->Name = 'Modo V.D.';
        $this->lstModoValo->Width = 160;
        if (!$this->blnEditMode) {
            $this->cargarModosValor('PG');
        } else {
            $this->cargarModosValor($this->objGuia->ModoValor ? $this->objGuia->ModoValor : 'PG' );
        }
        $this->lstModoValo->AddAction(new QChangeEvent(), new QAjaxAction('lstModoValo_Change'));
    }

    protected function lstModoValo_Change() {
        if ($this->lstModoValo->SelectedValue == 'PG') {
            $this->txtValoDecl = enableControl($this->txtValoDecl);
            $this->txtValoPiez = disableControl($this->txtValoPiez);
        } else {
            $this->txtValoDecl = disableControl($this->txtValoDecl);
            $this->txtValoPiez = enableControl($this->txtValoPiez);
        }
    }

    protected function lblUnidMedi_Create() {
        $this->lblUnidMedi = new QLabel($this);
        $this->lblUnidMedi->Text = 'Unid.';
        $this->lblUnidMedi->Visible = false;
    }

    protected function lstUnidMedi_Create() {
        $this->lstUnidMedi = new QListBox($this);
        $this->lstUnidMedi->Name = 'Unid. Medida';
        $this->lstUnidMedi->AddItem('cm','cm');
        $this->lstUnidMedi->AddItem('pl','pl');
        $this->lstUnidMedi->Visible = false;
        $this->lstUnidMedi->AddAction(new QChangeEvent(), new QAjaxAction('lstUnidMedi_Change'));
    }

    protected function lstAliaCome_Create() {
        $this->lstAliaCome = new QListBox($this);
        $this->lstAliaCome->Name = 'Aliado';
        $this->lstAliaCome->Width = 210;
        if (!$this->blnEditMode) {
            $this->cargarAliados();
        } else {
            $this->cargarAliados($this->objGuia->AliadoId);
        }
    }

    protected function lstClieCorp_Create() {
        $this->lstClieCorp = new QListBox($this);
        $this->lstClieCorp->Name = 'C. CORP';
        $this->lstClieCorp->Width = 210;
        if (!$this->blnEditMode) {
            $this->cargarClientesCorp();
        } else {
            $this->cargarClientesCorp($this->objGuia->ClienteCorpId);
        }
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QIntegerTextBox($this);
        $this->txtCantPiez->Width = 60;
        if ($this->blnEditMode) {
            $this->txtCantPiez->Text = $this->objGuia->Piezas;
        }
        $this->txtCantPiez->AddAction(new QChangeEvent(), new QServerAction('txtCantPiez_Change'));
    }

    protected function txtCantPiez_Change() {
        $intCantPiez = (int)$this->txtCantPiez->Text;
        if ( ($intCantPiez > 1) && (!$this->blnEditMode)) {
            $arrPiezActu = PiezasTemp::LoadArrayByProcesoErrorId($this->objProcEjec->Id);
            $intPiezActu = count($arrPiezActu);
            $intCantProc = $intCantPiez - $intPiezActu;
            //---------------
            // Multi-Piezas
            //---------------
            for ($i = 0; $i < $intCantProc; $i++) {
                $objPiezTemp = new PiezasTemp();
                $objPiezTemp->ProcesoErrorId = $this->objProcEjec->Id;
                $objPiezTemp->EmpaqueId      = null;
                $objPiezTemp->Descripcion    = '';
                $objPiezTemp->Alto           = 0;
                $objPiezTemp->Ancho          = 0;
                $objPiezTemp->Largo          = 0;
                $objPiezTemp->Volumen        = 0;
                $objPiezTemp->Kilos          = 0;
                $objPiezTemp->CreatedBy      = $this->objUsuario->CodiUsua;
                $objPiezTemp->Save();
            }
            $this->dtgPiezTemp->Visible = true;
            $this->dtgPiezTemp->Refresh();
        }
    }

    protected function txtKiloEnvi_Create() {
        $this->txtKiloEnvi = new QFloatTextBox($this);
        $this->txtKiloEnvi->Width = 60;
        if ($this->blnEditMode) {
            $this->txtKiloEnvi->Text = $this->objGuia->Kilos;
        }
    }

    protected function txtDescCont_Create() {
        $this->txtDescCont = new QTextBox($this);
        $this->txtDescCont->Placeholder = 'Descripcion del Contenido';
        $this->txtDescCont->Width = 350;
        $this->txtDescCont->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDescCont->Text = $this->objGuia->Contenido;
        }
    }

    protected function txtRefeExpo_Create() {
        $this->txtRefeExpo = new QTextBox($this);
        $this->txtRefeExpo->Width = 250;
        $this->txtRefeExpo->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtRefeExpo->Text = $this->objGuia->ReferenciaExp;
        }
    }

    protected function txtRazoExpo_Create() {
        $this->txtRazoExpo = new QTextBox($this);
        $this->txtRazoExpo->Width = 250;
        $this->txtRazoExpo->TextMode = QTextMode::MultiLine;
        $this->txtRazoExpo->Rows = 3;
        $this->txtRazoExpo->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtRazoExpo->Text = $this->objGuia->RazonesExp;
        }
    }

    protected function txtTasaDola_Create() {
        $this->txtTasaDola = new QFloatTextBox($this);
        $this->txtTasaDola->Width = 100;
        if ($this->blnEditMode) {
            $this->txtTasaDola->Text = nf($this->objGuia->Tasa);
        } else {
            $this->txtTasaDola->Text = nf($this->decTasaDola);
        }
    }

    protected function txtTotaGuia_Create() {
        $this->txtTotaGuia = new QFloatTextBox($this);
        $this->txtTotaGuia->Width = 100;
        if ($this->blnEditMode) {
            $this->txtTotaGuia->Text = $this->objGuia->Total;
        }
    }

    protected function txtIdxxPref_Create() {
        $this->txtIdxxPref = new QTextBox($this);
        $this->txtIdxxPref->Width = 100;
        if ($this->blnEditMode) {
            $this->txtIdxxPref->Text = $this->objGuia->FacturaId;
        }
    }

    protected function lblTituPiez_Create() {
        $this->lblTituPiez = new QLabel($this);
        $this->lblTituPiez->Text = 'Piezas <i class="fa fa-plus-circle fa-lg"></i>';
        $this->lblTituPiez->HtmlEntities = false;
        $this->lblTituPiez->CssClass = 'titulo';
        $this->lblTituPiez->AddAction(new QClickEvent(), new QAjaxAction('lblTituPiez_Click'));
    }

    public function lblTituPiez_Click() {
        $this->mostrarCampos('add');
    }

    protected function lblContPiez_Create() {
        $this->lblContPiez = new QLabel($this);
        $this->lblContPiez->Text = 'Contenido (max 50 caracteres)';
        $this->lblContPiez->Visible = false;
    }

    protected function lblEmpaPiez_Create() {
        $this->lblEmpaPiez = new QLabel($this);
        $this->lblEmpaPiez->Text = 'Empaque';
        $this->lblEmpaPiez->Visible = false;
    }

    protected function lblAltoPiez_Create() {
        $this->lblAltoPiez = new QLabel($this);
        $this->lblAltoPiez->Text = 'Alto';
        $this->lblAltoPiez->Visible = false;
    }

    protected function lblAnchPiez_Create() {
        $this->lblAnchPiez = new QLabel($this);
        $this->lblAnchPiez->Text = 'Ancho';
        $this->lblAnchPiez->Visible = false;
    }

    protected function lblLargPiez_Create() {
        $this->lblLargPiez = new QLabel($this);
        $this->lblLargPiez->Text = 'Largo';
        $this->lblLargPiez->Visible = false;
    }

    protected function lblVoluPiez_Create() {
        $this->lblVoluPiez = new QLabel($this);
        $this->lblVoluPiez->Text = 'Volumen';
        $this->lblVoluPiez->Visible = false;
    }

    protected function lblValoPiez_Create() {
        $this->lblValoPiez = new QLabel($this);
        $this->lblValoPiez->Text = 'ValDec($)';
        $this->lblValoPiez->Visible = false;
    }

    protected function lblRepePiez_Create() {
        $this->lblRepePiez = new QLabel($this);
        $this->lblRepePiez->Text = 'Repetir';
        $this->lblRepePiez->Visible = false;
    }

    protected function lblPiesPiez_Create() {
        $this->lblPiesPiez = new QLabel($this);
        $this->lblPiesPiez->Text = 'PiesCub';
        $this->lblPiesPiez->Visible = false;
    }

    protected function lblKiloPiez_Create() {
        $this->lblKiloPiez = new QLabel($this);
        $this->lblKiloPiez->Text = 'Kgs';
        $this->lblKiloPiez->Width = 45;
        $this->lblKiloPiez->Visible = false;
    }

    protected function txtContPiez_Create() {
        $this->txtContPiez = new QTextBox($this);
        $this->txtContPiez->Placeholder = 'Desc. del Contenido de la Pieza';
        $this->txtContPiez->Width = 350;
        $this->txtContPiez->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtContPiez->Visible = false;
    }

    protected function lstEmpaPiez_Create() {
        $this->lstEmpaPiez = new QListBox($this);
        $this->lstEmpaPiez->Width = 130;
        $this->lstEmpaPiez->Visible = false;
        $this->cargarEmpaques();
    }

    protected function cargarEmpaques($intEmpaIdxx=null) {
        $this->lstEmpaPiez->RemoveAllItems();
        $objClauOrde = QQ::OrderBy(QQN::Empaque()->Siglas);
        $arrEmpaActi = Empaque::LoadArrayByIsActivo(true,$objClauOrde);
        $this->lstEmpaPiez->AddItem('- Seleccione -',null);
        foreach ($arrEmpaActi as $objEmpaActi) {
            $blnSeleRegi = false;
            if (!is_null($intEmpaIdxx)) {
                $blnSeleRegi = $intEmpaIdxx == $objEmpaActi->Id;
            }
            $this->lstEmpaPiez->AddItem($objEmpaActi->__toString(), $objEmpaActi->Id, $blnSeleRegi);
        }
    }

    protected function txtAltoPiez_Create() {
        $this->txtAltoPiez = new QTextBox($this);
        $this->txtAltoPiez->Width = 45;
        $this->txtAltoPiez->Placeholder = 'cm';
        $this->txtAltoPiez->Visible = false;
        //$this->txtAltoPiez->AddAction(new QChangeEvent(), new QAjaxAction('calcularVolumenPies'));
    }

    protected function txtAnchPiez_Create() {
        $this->txtAnchPiez = new QTextBox($this);
        $this->txtAnchPiez->Width = 45;
        $this->txtAnchPiez->Placeholder = 'cm';
        $this->txtAnchPiez->Visible = false;
        //$this->txtAnchPiez->AddAction(new QChangeEvent(), new QAjaxAction('calcularVolumenPies'));
    }

    protected function txtLargPiez_Create() {
        $this->txtLargPiez = new QTextBox($this);
        $this->txtLargPiez->Width = 45;
        $this->txtLargPiez->Placeholder = 'cm';
        $this->txtLargPiez->Visible = false;
        //$this->txtLargPiez->AddAction(new QChangeEvent(), new QAjaxAction('calcularVolumenPies'));
    }

    protected function txtVoluPiez_Create() {
        $this->txtVoluPiez = new QTextBox($this);
        $this->txtVoluPiez->Width = 60;
        $this->txtVoluPiez->Visible = false;
        $this->txtVoluPiez->Enabled = false;
        $this->txtVoluPiez->ForeColor = 'blue';
    }

    protected function txtValoPiez_Create() {
        $this->txtValoPiez = new QTextBox($this);
        $this->txtValoPiez->Width = 60;
        $this->txtValoPiez->Visible = false;
    }

    protected function txtRepePiez_Create() {
        $this->txtRepePiez = new QTextBox($this);
        $this->txtRepePiez->Width = 60;
        $this->txtRepePiez->ToolTip = 'Cantidad de piezas que se repiten con las mismas medidas';
        $this->txtRepePiez->Text = 1;
        $this->txtRepePiez->Visible = false;
    }

    protected function txtPiesPiez_Create() {
        $this->txtPiesPiez = new QTextBox($this);
        $this->txtPiesPiez->Width = 60;
        $this->txtPiesPiez->Visible = false;
        $this->txtPiesPiez->Enabled = false;
        $this->txtPiesPiez->ForeColor = 'blue';
    }

    protected function txtAltoEnvi_Create() {
        $this->txtAltoEnvi = new QTextBox($this);
        $this->txtAltoEnvi->Width = 60;
        if ($this->blnEditMode) {
            $this->txtAltoEnvi->Text = $this->objGuia->Alto;
        }
    }

    protected function txtAnchEnvi_Create() {
        $this->txtAnchEnvi = new QTextBox($this);
        $this->txtAnchEnvi->Width = 60;
        if ($this->blnEditMode) {
            $this->txtAnchEnvi->Text = $this->objGuia->Ancho;
        }
    }

    protected function txtLargEnvi_Create() {
        $this->txtLargEnvi = new QTextBox($this);
        $this->txtLargEnvi->Width = 60;
        if ($this->blnEditMode) {
            $this->txtLargEnvi->Text = $this->objGuia->Largo;
        }
    }

    protected function txtVoluEnvi_Create() {
        $this->txtVoluEnvi = new QTextBox($this);
        $this->txtVoluEnvi->Width = 60;
        if ($this->blnEditMode) {
            $this->txtVoluEnvi->Text = $this->objGuia->Volumen;
        }
    }

    protected function txtPiesEnvi_Create() {
        $this->txtPiesEnvi = new QTextBox($this);
        $this->txtPiesEnvi->Width = 60;
        if ($this->blnEditMode) {
            $this->txtPiesEnvi->Text = $this->objGuia->PiesCub;
        }
    }

    protected function txtKiloPiez_Create() {
        $this->txtKiloPiez = new QTextBox($this);
        $this->txtKiloPiez->Placeholder = 'Kg';
        $this->txtKiloPiez->Width = 40;
        $this->txtKiloPiez->Visible = false;
    }

    protected function btnSavePiez_Create() {
        $this->btnSavePiez = new QButtonP($this);
        $this->btnSavePiez->Text = '<i class="fa fa-floppy-o fa-lg"></i>';
        $this->btnSavePiez->Visible = false;
        $this->btnSavePiez->AddAction(new QClickEvent(), new QServerAction('btnSavePiez_Click'));
    }

    protected function btnCancPiez_Create() {
        $this->btnCancPiez = new QButtonW($this);
        $this->btnCancPiez->Text = '<i class="fa fa-times-circle fa-lg"></i>';
        $this->btnCancPiez->Visible = false;
        $this->btnCancPiez->AddAction(new QClickEvent(), new QServerAction('btnCancPiez_Click'));
    }

    protected function btnDelePiez_Create() {
        $this->btnDelePiez = new QButtonD($this);
        $this->btnDelePiez->Text = '<i class="fa fa-trash fa-lg"></i>';
        $this->btnDelePiez->Visible = false;
        $this->btnDelePiez->AddAction(new QClickEvent(), new QConfirmAction('Seguro que desea borrar esta Pieza'));
        $this->btnDelePiez->AddAction(new QClickEvent(), new QServerAction('btnDelePiez_Click'));
    }

    protected function calcularVolumenPies() {
        $decAltoPiez = strlen($this->txtAltoPiez->Text) ? (float)$this->txtAltoPiez->Text : null;
        $decAnchPiez = strlen($this->txtAnchPiez->Text) ? (float)$this->txtAnchPiez->Text : null;
        $decLargPiez = strlen($this->txtLargPiez->Text) ? (float)$this->txtLargPiez->Text : null;
        $decVoluPiez = 0;
        $decPiesPiez = 0;

        if (!is_null($decAltoPiez) && !is_null($decAnchPiez) && !is_null($decLargPiez)) {
            if ($this->lstUnidMedi->SelectedValue == 'pl') {
                //-------------------------------
                // Las pulgadas se llevan a cms
                //-------------------------------
                $decAltoPiez *= 2.54;
                $decAnchPiez *= 2.54;
                $decLargPiez *= 2.54;
                // Los valores re-expresados en cms se actualizan en la pantalla
            }
            $decVoluPiez = ($decAltoPiez * $decAnchPiez * $decLargPiez) / 5000;
            $decPiesPiez = (($decAltoPiez * $decAnchPiez * $decLargPiez) / 1000000) * 35.315;
        }
        $this->txtVoluPiez->Text = round($decVoluPiez,4);
        $this->txtPiesPiez->Text = round($decPiesPiez,3);
    }

    public function dtgPiezTempRow_Click($strFormId, $strControlId, $strParameter) {
        $id = (int)$strParameter;
        $this->intEditPiez = $id;
        $objPiezGuia = PiezasTemp::Load($id);
        if (!is_null($objPiezGuia->PiezaId)) {
            t('El Id de la pieza es: '.$objPiezGuia->PiezaId);
            $objPiezOrig = GuiaPiezas::Load($objPiezGuia->PiezaId);

            $strCodiCkpt = $objPiezOrig->ultimoCheckpoint();
            t('El Ultimo Ckpt es: '.$strCodiCkpt);
            if ($strCodiCkpt != 'PU') {
                t('No se puede cambiar');
                $this->danger('Pieza no disponible para ser modificada');
                return;
            }
            t('Si admite cambios');
        }
        $this->mostrarCampos('edit');

        $this->txtContPiez->Text = $objPiezGuia->Descripcion;
        $this->txtKiloPiez->Text = $objPiezGuia->Kilos;
        $this->cargarEmpaques($objPiezGuia->EmpaqueId);
        $this->txtAltoPiez->Text = $objPiezGuia->Alto;
        $this->txtAnchPiez->Text = $objPiezGuia->Ancho;
        $this->txtLargPiez->Text = $objPiezGuia->Largo;
        $this->txtVoluPiez->Text = $objPiezGuia->Volumen;
        $this->txtValoPiez->Text = $objPiezGuia->ValorDeclarado;
        $this->txtPiesPiez->Text = $objPiezGuia->PiesCub;
        $this->blnEditPiez       = true;
    }

    protected function btnSaveProf_Click() {
        $strNombProf = trim($this->txtNuevProf->Text);
        $objProfExis = Profesiones::LoadByNombre($strNombProf);
        if ($objProfExis instanceof Profesiones) {
            $this->danger('La Profesión ya Existe');
            $this->cargarProfesiones($objProfExis->Id);
            return;
        }
        try {
            $objNuevProf = new Profesiones();
            $objNuevProf->Nombre    = $this->txtNuevProf->Text;
            $objNuevProf->CreatedBy = $this->objUsuario->CodiUsua;
            $objNuevProf->Save();
            $objNuevProf->logDeCambios('Creada');
            $this->success('Profesión creada !!!');
            $this->cargarProfesiones($objNuevProf->Id);
            $this->lblNuevProf->Visible = false;
            $this->txtNuevProf->Visible = false;
            $this->btnSaveProf->Visible = false;
        } catch (Exception $e) {
            t('Error creado la profesion: '.$e->getMessage());
            $this->danger($e->getMessage());
        }
    }

    protected function btnSavePiez_Click() {
        $intCantRepe = strlen($this->txtRepePiez->Text) ? (int)$this->txtRepePiez->Text : 1;
        if ($this->lstModoValo->SelectedValue == 'PP') {
            //-------------------------------------
            // Valor Declarado definido por Pieza
            //-------------------------------------
            $decValoPiez = (float)$this->txtValoPiez->Text;
            $decValoDecl = $decValoPiez / $intCantRepe;
        } else {
            //-------------------------------------
            // Valor Declarado definido por Guia
            //-------------------------------------
            $intCantPiez = (int)$this->txtCantPiez->Text;
            $decValoPiez = (float)$this->txtValoDecl->Text;
            if (!$this->blnEditPiez) {
                $intCantPiez += $intCantRepe;
            }
            $decValoDecl = $decValoPiez / $intCantPiez;
        }
        for ($i = 0; $i < $intCantRepe; $i++) {
            if (!$this->blnEditPiez) {
                t('Estoy en modo insercion');
                $objPiezGuia = new PiezasTemp();
                $objPiezGuia->ProcesoErrorId = $this->objProcEjec->Id;
                $objPiezGuia->CreatedBy      = $this->objUsuario->CodiUsua;
            } else {
                t('Estoy en modo edicion');
                $objPiezGuia = PiezasTemp::Load($this->intEditPiez);
            }
            try {
                $decAltoPiez = strlen($this->txtAltoPiez->Text) ? (float)$this->txtAltoPiez->Text : null;
                $decAnchPiez = strlen($this->txtAnchPiez->Text) ? (float)$this->txtAnchPiez->Text : null;
                $decLargPiez = strlen($this->txtLargPiez->Text) ? (float)$this->txtLargPiez->Text : null;

                if ($this->lstUnidMedi->SelectedValue == 'pl') {
                    //-------------------------------
                    // Las pulgadas se llevan a cms
                    //-------------------------------
                    $decAltoPiez *= 2.54;
                    $decAnchPiez *= 2.54;
                    $decLargPiez *= 2.54;
                }

                $decVoluPiez = ($decAltoPiez * $decAnchPiez * $decLargPiez) / 5000;
                $decPiesPiez = (($decAltoPiez * $decAnchPiez * $decLargPiez) / 1000000) * 35.315;

                $objPiezGuia->EmpaqueId      = $this->lstEmpaPiez->SelectedValue;
                $objPiezGuia->Descripcion    = substr(strtoupper(limpiarCadena($this->txtContPiez->Text)),0,50);
                $objPiezGuia->Kilos          = (float)$this->txtKiloPiez->Text;
                $objPiezGuia->Alto           = $decAltoPiez;
                $objPiezGuia->Ancho          = $decAnchPiez;
                $objPiezGuia->Largo          = $decLargPiez;
                $objPiezGuia->Volumen        = (float)$decVoluPiez;
                //$objPiezGuia->Volumen        = (float)$this->txtVoluPiez->Text;
                $objPiezGuia->ValorDeclarado = $decValoDecl;
                $objPiezGuia->PiesCub        = (float)$decPiesPiez;
                //$objPiezGuia->PiesCub        = (float)$this->txtPiesPiez->Text;
                $objPiezGuia->Save();
                t('Salve en PiezasTemp');
                if ($this->lstModoValo->SelectedValue == 'PG') {
                    $this->sumaPiezas($decValoDecl);
                } else {
                    $this->sumaPiezas();
                }
                $this->blnCambPiez = true;
            } catch (Exception $e) {
                t('Error: '.$e->getMessage());
                break;
            }
        }

        $this->dtgPiezTemp->Refresh();

        $this->txtContPiez->Text = '';
        $this->txtKiloPiez->Text = '';
        $this->cargarEmpaques();
        $this->txtAltoPiez->Text = '';
        $this->txtAnchPiez->Text = '';
        $this->txtLargPiez->Text = '';
        $this->txtVoluPiez->Text = '';
        $this->txtValoPiez->Text = '';
        $this->txtRepePiez->Text = 1;
        $this->txtPiesPiez->Text = '';

        $this->success('Transaccion Exitosa.  Pieza guardada !!!');
    }

    protected function btnDelePiez_Click() {

        if ($this->lstModoValo->SelectedValue == 'PP') {
            //-------------------------------------
            // Valor Declarado definido por Pieza
            //-------------------------------------
            $decValoPiez = (float)$this->txtValoPiez->Text;
        } else {
            //-------------------------------------
            // Valor Declarado definido por Guia
            //-------------------------------------
            $decValoPiez = (float)$this->txtValoDecl->Text;
        }


        $this->blnCambPiez = true;
        //t('Borrando pieza');
        $objPiezGuia = PiezasTemp::Load($this->intEditPiez);

        $objPiezGuia->Delete();

        $intCantPiez = (int)$this->txtCantPiez->Text;
        if ($intCantPiez > 1) {
            $decValoDecl = $decValoPiez / ($intCantPiez - 1);
        } else {
            $decValoDecl = (float)$this->txtValoDecl->Text;
        }

        //t('Pieza borrada');

        if ($this->lstModoValo->SelectedValue == 'PG') {
            $this->sumaPiezas($decValoDecl);
        } else {
            $this->sumaPiezas();
        }

        if ($this->txtCantPiez->Text == 0) {
            // Ya no quedan piezas, por lo tanto se establece el modo insercion
            $this->blnEditPiez = false;
        }
        $this->btnDelePiez->Visible = false;


        $this->dtgPiezTemp->Refresh();

        $this->txtContPiez->Text = '';
        $this->txtKiloPiez->Text = '';
        $this->cargarEmpaques();
        $this->txtAltoPiez->Text = '';
        $this->txtAnchPiez->Text = '';
        $this->txtLargPiez->Text = '';
        $this->txtVoluPiez->Text = '';
        $this->txtValoPiez->Text = '';
        $this->txtRepePiez->Text = 1;
        $this->txtPiesPiez->Text = '';
        //t('Listo el borrado');
        $this->mostrarCampos('add');
        $this->success('Transaccion Exitosa.  Pieza borrada !!!');
    }


    protected function btnCancPiez_Click() {
        $this->mostrarCampos('add');
    }

    protected function mostrarCampos($strAction='add') {
        $this->mensaje();
        if ($strAction == 'add') {
            $this->blnEditPiez = false;

            $this->lblContPiez->Visible = !$this->lblContPiez->Visible;
            $this->lblKiloPiez->Visible = !$this->lblKiloPiez->Visible;
            $this->lblEmpaPiez->Visible = !$this->lblEmpaPiez->Visible;
            $this->lblAltoPiez->Visible = !$this->lblAltoPiez->Visible;
            $this->lblAnchPiez->Visible = !$this->lblAnchPiez->Visible;
            $this->lblLargPiez->Visible = !$this->lblLargPiez->Visible;
            $this->lblVoluPiez->Visible = !$this->lblVoluPiez->Visible;
            $this->lblValoPiez->Visible = !$this->lblValoPiez->Visible;
            $this->lblPiesPiez->Visible = !$this->lblPiesPiez->Visible;

            $this->txtContPiez->Visible = !$this->txtContPiez->Visible;
            $this->txtKiloPiez->Visible = !$this->txtKiloPiez->Visible;
            $this->lstEmpaPiez->Visible = !$this->lstEmpaPiez->Visible;
            $this->txtAltoPiez->Visible = !$this->txtAltoPiez->Visible;
            $this->txtAnchPiez->Visible = !$this->txtAnchPiez->Visible;
            $this->txtLargPiez->Visible = !$this->txtLargPiez->Visible;
            $this->txtVoluPiez->Visible = !$this->txtVoluPiez->Visible;
            $this->txtValoPiez->Visible = !$this->txtValoPiez->Visible;
            $this->txtPiesPiez->Visible = !$this->txtPiesPiez->Visible;
            $this->lblUnidMedi->Visible = !$this->lblUnidMedi->Visible;
            $this->lstUnidMedi->Visible = !$this->lstUnidMedi->Visible;
            $this->btnSavePiez->Visible = !$this->btnSavePiez->Visible;
            $this->btnCancPiez->Visible = !$this->btnCancPiez->Visible;
            $this->btnDelePiez->Visible = false;

            $this->txtContPiez->Text = '';
            $this->txtKiloPiez->Text = '';
            $this->txtAnchPiez->Text = '';
            $this->cargarEmpaques();
            $this->txtAltoPiez->Text = '';
            $this->txtLargPiez->Text = '';
            $this->txtVoluPiez->Text = '';
            $this->txtValoPiez->Text = '';
            $this->txtRepePiez->Text = 1;
            $this->txtPiesPiez->Text = '';

        }
        if ($strAction == 'edit') {
            $this->blnEditPiez = true;

            $this->lblContPiez->Visible = true;
            $this->lblKiloPiez->Visible = true;
            $this->lblAnchPiez->Visible = true;
            $this->lblEmpaPiez->Visible = true;
            $this->lblAltoPiez->Visible = true;
            $this->lblLargPiez->Visible = true;
            $this->lblVoluPiez->Visible = true;
            $this->lblValoPiez->Visible = true;
            $this->lblPiesPiez->Visible = true;

            $this->txtContPiez->Visible = true;
            $this->txtKiloPiez->Visible = true;
            $this->txtAnchPiez->Visible = true;
            $this->lstEmpaPiez->Visible = true;
            $this->txtAltoPiez->Visible = true;
            $this->txtLargPiez->Visible = true;
            $this->txtVoluPiez->Visible = true;
            $this->txtValoPiez->Visible = true;
            $this->txtPiesPiez->Visible = true;

            $this->lblUnidMedi->Visible = true;
            $this->lstUnidMedi->Visible = true;
            $this->btnSavePiez->Visible = true;
            $this->btnCancPiez->Visible = true;
            $this->btnDelePiez->Visible = true;

        }

        if ($this->blnEditPiez) {
            t('Editando...');
        } else {
            t('Agregando...');
        }
        $this->lblRepePiez->Visible = $this->lblValoPiez->Visible;
        $this->txtRepePiez->Visible = $this->txtValoPiez->Visible;
    }

    protected function lstUnidMedi_Change() {
        $this->txtAltoPiez->Placeholder = $this->lstUnidMedi->SelectedValue;
        $this->txtAnchPiez->Placeholder = $this->lstUnidMedi->SelectedValue;
        $this->txtLargPiez->Placeholder = $this->lstUnidMedi->SelectedValue;
        $this->calcularVolumenPies();
    }

    protected function btnCancel_Click() {
        if ($this->blnCambPiez && $this->blnPrimInte) {
            $strTextMens = 'Cambios en las piezas <b>NO Guardados</b> | Presione <b>Volver para Cancelar</b> los Cambios | Presione <b>Guardar para Aplicar</b> los cambios !!!';
            $this->warning($strTextMens);
            $this->blnPrimInte = false;
            return;
        }
        PiezasTemp::EliminarDelUsuario($this->objUsuario->CodiUsua);
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltiAcce->__toString());
    }


    protected function lblBotoPopu_Create() {
        $this->lblBotoPopu = new QLabel($this);
        $this->lblBotoPopu->Text = $this->recrearBotonPopup();
        $this->lblBotoPopu->HtmlEntities = false;
        $this->lblBotoPopu->CssClass = '';
    }

    protected function btnNextPage_Create() {
        $this->btnNextPage = new QButtonP($this);
        $this->btnNextPage->Text = TextoIcono('chevron-right fa-lg','Siguiente','L');
        $this->btnNextPage->AddAction(new QClickEvent(), new QServerAction('btnNextPage_Click'));
        $this->btnNextPage->ToolTip = 'Ir a la Siguiente Pantalla';
    }

    protected function btnNextPage_Click() {
        $this->blnVerpUnox = !$this->blnVerpUnox;
        $this->btnPrevPage->Visible = !$this->btnPrevPage->Visible;
        $this->btnNextPage->Visible = !$this->btnNextPage->Visible;
    }

    protected function btnPrevPage_Create() {
        $this->btnPrevPage = new QButtonP($this);
        $this->btnPrevPage->Text = TextoIcono('chevron-left fa-lg','Anterior');
        $this->btnPrevPage->AddAction(new QClickEvent(), new QServerAction('btnPrevPage_Click'));
        $this->btnPrevPage->ToolTip = 'Ir a la Pantalla Anterior';
        $this->btnPrevPage->Visible = false;
    }

    protected function btnPrevPage_Click() {
        $this->blnVerpUnox = !$this->blnVerpUnox;
        $this->btnPrevPage->Visible = !$this->btnPrevPage->Visible;
        $this->btnNextPage->Visible = !$this->btnNextPage->Visible;
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $strTextBoto   = TextoIcono('plus','Acciones');
        $arrOpciDrop   = array();
        $arrOpciDrop[] = OpcionDropDown(
            __SIST__.'/guia_pdf.php?strNumeGuia='.$this->txtNumeGuia->Text,
            TextoIcono('print','Imprimir')
        );

        if ($this->blnGuiaFact) {
            if (!is_null($this->objGuia->FacturaId)) {
                $mixParaFact = 'intNumeFact='.$this->objGuia->FacturaId;
            } else {
                $mixParaFact = 'strNumeGuia='.$this->txtNumeGuia->Text;
            }

            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/crear_factura.php?'.$mixParaFact,
                TextoIcono('credit-card','Facturar')
            );
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

    protected function dtgConcGuia_Create() {
        $this->dtgConcGuia = new QDataGrid($this);
        $this->dtgConcGuia->FontSize = 12;
        $this->dtgConcGuia->ShowFilter = false;

        $this->dtgConcGuia->SetDataBinder('dtgConcGuia_Bind');

        $this->createDtgConcGuiaColumns();
    }

    protected function dtgConcGuia_Bind() {
        $objCondicion   = QQ::Clause();
        $objCondicion[] = QQ::Equal(QQN::GuiaConceptos()->GuiaId, $this->objGuia->Id);
        $this->dtgConcGuia->DataSource = GuiaConceptos::QueryArray(
            QQ::AndCondition($objCondicion),
            QQ::Clause(QQ::OrderBy(
                QQN::GuiaConceptos()->Concepto->Orden)
            )
        );
    }


    protected function createDtgConcGuiaColumns() {
        $colMostComo = new QDataGridColumn($this);
        $colMostComo->Name = 'CONCEPTO';
        $colMostComo->Html = '<?= $_ITEM->MostrarComo; ?>';
        $colMostComo->Width = 180;
        $colMostComo->HorizontalAlign = QHorizontalAlign::Left;
        $this->dtgConcGuia->AddColumn($colMostComo);

        $colMontUsdx = new QDataGridColumn($this);
        $colMontUsdx->Name = 'MTO $';
        $colMontUsdx->Html = '<?= nf($_ITEM->Monto/$_ITEM->Guia->Tasa); ?>';
        $colMontUsdx->Width = 100;
        $colMontUsdx->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgConcGuia->AddColumn($colMontUsdx);

        $colMontConc = new QDataGridColumn($this);
        $colMontConc->Name = 'MTO BS';
        $colMontConc->Html = '<?= nf($_ITEM->Monto); ?>';
        $colMontConc->Width = 100;
        $colMontConc->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgConcGuia->AddColumn($colMontConc);

    }

    protected function dtgDatoFact_Create() {
        $this->dtgDatoFact = new QDataGrid($this);
        $this->dtgDatoFact->FontSize = 12;
        $this->dtgDatoFact->ShowFilter = false;

        $this->dtgDatoFact->SetDataBinder('dtgDatoFact_Bind');

        $this->createDtgDatoFactColumns();
    }

    protected function dtgDatoFact_Bind() {
        $this->dtgConcGuia->DataSource = $this->arrDatoFact;
    }


    protected function createDtgDatoFactColumns() {
        $colMostComo = new QDataGridColumn($this);
        $colMostComo->Name = 'DATO';
        $colMostComo->Html = '<?= $_ITEM["Dato"]; ?>';
        $colMostComo->Width = 180;
        $colMostComo->HorizontalAlign = QHorizontalAlign::Left;
        $this->dtgConcGuia->AddColumn($colMostComo);

        $colMontConc = new QDataGridColumn($this);
        $colMontConc->Name = 'VALOR';
        $colMontConc->Html = '<?= nf($_ITEM["Valor"]); ?>';
        $colMontConc->Width = 100;
        $colMontConc->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgConcGuia->AddColumn($colMontConc);

    }

    protected function dtgPiezTemp_Create() {
        $this->dtgPiezTemp = new QDataGrid($this);
        $this->dtgPiezTemp->FontSize = 12;
        $this->dtgPiezTemp->ShowFilter = false;

        $this->dtgPiezTemp->CssClass = 'datagrid';
        $this->dtgPiezTemp->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezTemp->UseAjax = true;

        $this->dtgPiezTemp->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgPiezTemp->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPiezTempRow_Click'));

        $this->dtgPiezTemp->SetDataBinder('dtgPiezTemp_Bind');

        $this->createDtgPiezTempColumns();
    }

    protected function dtgPiezTemp_Bind() {
        $objCondicion   = QQ::Clause();
        $objCondicion[] = QQ::Equal(QQN::PiezasTemp()->ProcesoErrorId, $this->objProcEjec->Id);
        $this->dtgPiezTemp->DataSource = PiezasTemp::QueryArray(
            QQ::AndCondition($objCondicion),
            QQ::Clause(QQ::OrderBy(
                QQN::PiezasTemp()->Id)
            )
        );
    }


    protected function createdtgPiezTempColumns() {
        $colDescPiez = new QDataGridColumn($this);
        $colDescPiez->Name = 'EMPQ';
        $colDescPiez->Html = '<?= $_ITEM->Empaque ? $_ITEM->Empaque->Siglas : null; ?>';
        $colDescPiez->Width = 50;
        $colDescPiez->HorizontalAlign = QHorizontalAlign::Left;
        $this->dtgPiezTemp->AddColumn($colDescPiez);

        $colDescPiez = new QDataGridColumn($this);
        $colDescPiez->Name = 'DESCRIPCION';
        $colDescPiez->Html = '<?= $_ITEM->Descripcion; ?>';
        $colDescPiez->Width = 180;
        $colDescPiez->HorizontalAlign = QHorizontalAlign::Left;
        $this->dtgPiezTemp->AddColumn($colDescPiez);

        $colValoPiez = new QDataGridColumn($this);
        $colValoPiez->Name = 'VAL';
        $colValoPiez->Html = '<?= nf($_ITEM->ValorDeclarado); ?>';
        $colValoPiez->Width = 30;
        $colValoPiez->HorizontalAlign = QHorizontalAlign::Left;
        $this->dtgPiezTemp->AddColumn($colValoPiez);

        $colMediPiez = new QDataGridColumn($this);
        $colMediPiez->Name = 'MEDIDAS';
        $colMediPiez->Html = '<?= $_ITEM->__medidas(); ?>';
        $colMediPiez->Width = 110;
        $colMediPiez->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgPiezTemp->AddColumn($colMediPiez);

        $colKiloPiez = new QDataGridColumn($this);
        $colKiloPiez->Name = 'KG';
        $colKiloPiez->Html = '<?= nf($_ITEM->Kilos); ?>';
        $colKiloPiez->Width = 30;
        $colKiloPiez->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgPiezTemp->AddColumn($colKiloPiez);

        $colPiesPiez = new QDataGridColumn($this);
        $colPiesPiez->Name = 'P.CUB';
        $colPiesPiez->Html = '<?= nf3($_ITEM->PiesCub); ?>';
        $colPiesPiez->Width = 30;
        $colPiesPiez->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgPiezTemp->AddColumn($colPiesPiez);

    }

    protected function dtgConcOpci_Create() {
        $this->dtgConcOpci = new QDataGrid($this);
        $this->dtgConcOpci->FontSize = 12;
        $this->dtgConcOpci->ShowFilter = false;

        $this->dtgConcOpci->CssClass = 'datagrid';
        $this->dtgConcOpci->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgConcOpci->UseAjax = true;

        $this->colConcSele = new QCheckBoxColumn('', $this->dtgConcOpci);
        $this->colConcSele->PrimaryKey = 'ConceptoId';
        $this->colConcSele->Width = 30;
        $this->colConcSele->SetCheckboxCallback($this,'colMarcarSeleccion');
        $this->dtgConcOpci->AddColumn($this->colConcSele);
        //$this->dtgConcOpci->AddAction(new QClickEvent(), new QAjaxAction('colConcSele_Click'));

        $this->dtgConcOpci->SetDataBinder('dtgConcOpci_Bind');

        $this->createDtgConcOpciColumns();
    }


    public function colMarcarSeleccion(GcoTemp $objConcTemp, QCheckBox $ctl) {
        /* @var $objConcOpci Conceptos */
        t('Voy a evaluar si '.$objConcTemp->Concepto->Nombre.' ('.$objConcTemp->ConceptoId.') esta en el vector');
        foreach ($this->arrOpciToma as $objConcOpci) {
            t('Comparando con: '.$objConcOpci->Id);
            if ($objConcOpci->Id == $objConcTemp->ConceptoId) {
                $ctl->Checked = true;
                break;
            }
        }
    }


    protected function dtgConcOpci_Bind() {
        $this->dtgConcOpci->DataSource = GcoTemp::LoadArrayByProcesoErrorId($this->objProcOpci->Id);
    }


    protected function createdtgConcOpciColumns() {
        $colNombConc = new QDataGridColumn($this);
        $colNombConc->Name = 'CONCEPTOS OPCIONALES';
        $colNombConc->Html = '<?= $_ITEM->Id ? $_ITEM->Concepto->MostrarComo : null; ?>';
        $colNombConc->Width = 150;
        $colNombConc->HorizontalAlign = QHorizontalAlign::Left;
        $this->dtgConcOpci->AddColumn($colNombConc);

    }



    protected function txtNumeCedu_Blur() {
        if (!$this->blnEditMode) {
            $strNumeCedu = DejarNumerosVJGuion($this->txtNumeCedu->Text);
            if (strlen($strNumeCedu) > 0) {
                $this->objClieReta = ClientesRetail::LoadByCedulaRif($strNumeCedu);
                if ($this->objClieReta) {
                    $strFechNaci = null;
                    if (!is_null($this->objClieReta->FechaNacimiento)) {
                        $strFechNaci = $this->objClieReta->FechaNacimiento->__toString("DD/MM/YYYY");
                    }
                    $this->blnEditClie = true;
                    $this->txtNombClie->Text = $this->objClieReta->Nombre;
                    $this->txtTeleFijo->Text = $this->objClieReta->TelefonoFijo;
                    $this->txtTeleMovi->Text = $this->objClieReta->TelefonoMovil;
                    $this->txtDireClie->Text = $this->objClieReta->Direccion;
                    $this->txtEmaiRemi->Text = $this->objClieReta->Email;
                    $this->calFechNaci->Text = $strFechNaci;
                    $this->lstSexoClie->SelectedIndex = $this->objClieReta->Sexo == 'M' ? 1 : 2;
                    $this->lstSucuOrig->SetFocus();
                } else {
                    $this->blnEditClie = false;
                    $this->objClieReta = new ClientesRetail();
                    $this->objClieReta->CedulaRif = $strNumeCedu;
                    $this->txtNombClie->Text = '';
                    $this->txtTeleFijo->Text = '';
                    $this->txtTeleMovi->Text = '';
                    $this->txtDireClie->Text = '';
                    $this->txtEmaiRemi->Text = '';
                    $this->calFechNaci->Text = '';
                    $this->lstSexoClie->SelectedIndex = 0;
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
                $this->objDestPmnx = ClientesRetail::LoadByCedulaRif($strNumeCedu);
                if ($this->objDestPmnx) {
                    $this->blnEditDest = true;
                    $this->txtNombDest->Text = $this->objDestPmnx->Nombre;
                    $this->txtTlfdFijo->Text = $this->objDestPmnx->TelefonoFijo;
                    $this->txtTlfdMovi->Text = $this->objDestPmnx->TelefonoMovil;
                    $this->txtEmaiDest->Text = $this->objDestPmnx->Email;
                    $this->txtDireDest->Text = $this->objDestPmnx->Direccion;
                    $this->txtEstaDest->Text = $this->objDestPmnx->Estado;
                    $this->txtCiudDest->Text = $this->objDestPmnx->Ciudad;
                    $this->txtPostDest->Text = $this->objDestPmnx->CodigoPostal;
                    $this->lstSexoDest->SelectedIndex = $this->objDestPmnx->Sexo == 'M' ? 1 : 2;
                } else {
                    $this->blnEditDest = false;
                    $this->objDestPmnx = new ClientesRetail();
                    $this->objDestPmnx->CedulaRif = $strNumeCedu;
                    $this->txtNombDest->Text = '';
                    $this->txtTlfdFijo->Text = '';
                    $this->txtTlfdMovi->Text = '';
                    $this->txtDireDest->Text = '';
                    $this->txtEstaDest->Text = '';
                    $this->txtCiudDest->Text = '';
                    $this->txtPostDest->Text = '';
                    $this->lstSexoDest->SelectedIndex = 0;
                    $this->txtNombDest->SetFocus();
                }
            }
        }
    }

    protected function cargarProfesiones($strCodiProf=null) {
        $this->lstProfClie->RemoveAllItems();
        $this->lstProfClie->Width = 260;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Profesiones()->Nombre);
        $arrProfClie   = Profesiones::LoadAll($objClauOrde);
        $intCantProf   = count($arrProfClie);
        $this->lstProfClie->AddItem('- Seleccione Uno - ('.$intCantProf.')', null);
        if ($arrProfClie) {
            foreach ($arrProfClie as $objProfClie) {
                $blnSeleRegi = false;
                if (strlen($strCodiProf) > 0) {
                    if (trim($objProfClie->Id) == trim($strCodiProf)) {
                        $blnSeleRegi = true;
                    }
                }
                $this->lstProfClie->AddItem($objProfClie->__toString(), $objProfClie->Id, $blnSeleRegi);
            }
        }
    }

    protected function cargarOrigenes($strCodiOrig=null) {
        $this->lstSucuOrig->RemoveAllItems();
        $this->lstSucuOrig->Width = 180;
        $arrCodiOrig = Sucursales::LoadSucursalesActivas('Nombre','nac');
        $intCantOrig = count($arrCodiOrig);
        $this->lstSucuOrig->AddItem('- Seleccione Uno - ('.$intCantOrig.')', null);
        if ($arrCodiOrig) {
            foreach ($arrCodiOrig as $objSucuOrig) {
                if ($this->blnEditMode) {
                    $blnSeleRegi = $this->objGuia->OrigenId == $objSucuOrig->Id ? true : false;
                } else {
                    $blnSeleRegi = $this->objUsuario->SucursalId == $objSucuOrig->Id ? true : false;
                }
                $this->lstSucuOrig->AddItem($objSucuOrig->__toString(), $objSucuOrig->Id, $blnSeleRegi);
            }
        }
    }

    protected function cargarDestinos($strCodiDest=null) {
        $this->lstSucuDest->RemoveAllItems();
        $this->lstSucuDest->Width = 180;
        $arrCodiDest = Sucursales::LoadSucursalesActivas('Nombre','exp');
        $intCantDest = count($arrCodiDest);
        $this->lstSucuDest->AddItem('- Seleccione Uno - ('.$intCantDest.')', null);
        if ($arrCodiDest) {
            foreach ($arrCodiDest as $objSucuDest) {
                $blnSeleRegi = false;
                if ($this->blnEditMode) {
                    $blnSeleRegi = $this->objGuia->DestinoId == $objSucuDest->Id ? true : false;
                } else {
                    if ($intCantDest == 1) {
                        $blnSeleRegi = true;
                    }
                }
                $this->lstSucuDest->AddItem($objSucuDest->__toString(), $objSucuDest->Id, $blnSeleRegi);
            }
        }
    }

    //-------------------------------------------------------------------------------------
    // Función que define el evento click del QRadioButtonList de los tipos de receptorías
    //-------------------------------------------------------------------------------------
    public function lstServExpo_Click() {
        if ($this->lstServExpo->SelectedValue == 'DOM') {
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
                $this->cargarReceptorias($this->strCodiDest,$this->objGuia->ReceptoriaDestino);
                $this->lstReceDest->Enabled = true;
                $this->lstReceDest->ForeColor = null;
            } else {
                //--------------------------------------
                // Cuando solo existe una Receptoria
                //--------------------------------------
                $this->cargarReceptorias($this->strCodiEsta,$this->objGuia->ReceptoriaDestino);
                $this->lstReceDest->Enabled = false;
                $this->lstReceDest->ForeColor = 'blue';
                $this->txtDireDest->Text = 'TIENDA GOLD COAST ('.$this->strCodiEsta.')';
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
            $objClauWher[] = QQ::NotEqual(QQN::Counter()->Siglas,$this->intReceOrig);
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
            $this->txtDireDest->Text = 'TIENDA GOLD COAST ('.$this->lstReceDest->SelectedName.')';
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

            $this->lstServExpo->RemoveAllItems();
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

                    if (substr_count($this->txtDireDest->Text, 'OFICINA GOLD')) {
                        $blnSeleRegi = true;
                    }

                    $this->lstServExpo->AddItem('&nbsp;RECEPTORIA&nbsp;','R',$blnSeleRegi);
                    $this->lstServExpo->AddItem('&nbsp;DOMICILIO','D',!$blnSeleRegi);

                } else {
                    $this->lstServExpo->AddItem('&nbsp;RECEPTORIA&nbsp;','R');
                    $this->lstServExpo->AddItem('&nbsp;DOMICILIO','D');
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
                    if ($this->blnEditMode && $this->lstServExpo->SelectedValue = 'R') {
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
                    if ($this->blnEditMode && $this->lstServExpo->SelectedValue = 'R') {
                        $this->cargarReceptorias($this->strCodiEsta,$this->objGuia->ReceptoriaDestino);
                        $this->lstReceDest->Enabled = false;
                        $this->lstReceDest->ForeColor = 'blue';
                        $this->txtDireDest->Enabled = false;
                        $this->txtDireDest->ForeColor = 'blue';
                        if (substr_count($this->txtDireDest->Text, 'OFICINA GOLD')) {
                            $this->txtDireDest->Text = 'OFICINA GOLD (' . $this->strCodiEsta . ')';
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
                $this->lstServExpo->AddItem('&nbsp;DOMICILIO','D',true);
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

    protected function cargarModalidadesDePago($strFormPago=null) {
        $this->lstFormPago->RemoveAllItems();
        $this->lstFormPago->AddItem('PRE-PAGADA','PPD',$strFormPago=='PPD');
        $this->lstFormPago->AddItem('CREDITO','CRD',$strFormPago=='CRD');
    }

    protected function cargarModosValor($strModoValo=null) {
        $this->lstModoValo->RemoveAllItems();
        $this->lstModoValo->AddItem('Por GUIA','PG',$strModoValo=='PG');
        $this->lstModoValo->AddItem('Por PIEZA','PP',$strModoValo=='PP');
    }

    protected function cargarAliados($intAliaIdxx=null) {
        $this->lstAliaCome->RemoveAllItems();
        $objClauOrde = QQ::OrderBy(QQN::AliadoComercial()->RazonSocial);
        $arrAliaCome = AliadoComercial::LoadAll($objClauOrde);
        $intCantAlia = count($arrAliaCome);
        $this->lstAliaCome->AddItem('- Seleccione - ('.$intCantAlia.')', null);
        foreach ($arrAliaCome as $objAliaCome) {
            $blnSeleRegi = $objAliaCome->Id == $intAliaIdxx;
            $this->lstAliaCome->AddItem($objAliaCome->__toString(), $objAliaCome->Id, $blnSeleRegi);
        }
        $this->lstAliaCome->Width = 210;
    }

    protected function cargarClientesCorp($intCodiClie=null) {
        if (is_null($intCodiClie)) {
            $intCodiClie = $this->objClieNaci->CodiClie;
        }
        $this->lstClieCorp->RemoveAllItems();
        $objClauOrde = QQ::OrderBy(QQN::MasterCliente()->NombClie);
        $arrClieCorp = MasterCliente::LoadArrayByCodiStat(1,$objClauOrde);
        foreach ($arrClieCorp as $objClieCorp) {
            $blnSeleRegi = $objClieCorp->CodiClie == $intCodiClie;
            $this->lstClieCorp->AddItem($objClieCorp->__toString(), $objClieCorp->CodiClie, $blnSeleRegi);
        }
        $this->lstClieCorp->Width = 210;
    }

    protected function cargarModalidadesDeSgro($intEnviSgro=null) {
        $this->lstEnviSgro->RemoveAllItems();
        $this->lstEnviSgro->AddItem('SI',1,$intEnviSgro==1);
        $this->lstEnviSgro->AddItem('NO',0,$intEnviSgro==0);
        $this->lstEnviSgro->Width = 80;
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

    protected function GestionarClientes() {
        //------------------------------------------------------------------------------------------------
        // Si los datos del Remitente no existen, se almacenan en la base de datos, para futuros envios.
        // En caso de que exista, se actualizan sus datos.
        //------------------------------------------------------------------------------------------------
        try {
            $this->objClieReta->Nombre          = substr(limpiarCadena($this->txtNombClie->Text),0,100);
            $this->objClieReta->CedulaRif       = DejarNumerosVJGuion($this->txtNumeCedu->Text);
            $this->objClieReta->TelefonoFijo    = DejarSoloLosNumeros($this->txtTeleFijo->Text);
            $this->objClieReta->TelefonoMovil   = DejarSoloLosNumeros($this->txtTeleMovi->Text);
            $this->objClieReta->Direccion       = substr(limpiarCadena($this->txtDireClie->Text),0,250);
            $this->objClieReta->Email           = substr(strtolower($this->txtEmaiRemi->Text),0,191);
            $this->objClieReta->Sexo            = $this->lstSexoClie->SelectedValue;
            $this->objClieReta->FechaNacimiento = strlen($this->calFechNaci->Text)
                ? new QDateTime($this->calFechNaci->Text)
                : null;
            $this->objClieReta->ProfesionId     = $this->lstProfClie->SelectedValue;
            //----------------------------------------------------------------------------------
            // Si el Cliente Remitente no existe aún, se graba Usuario y la fecha de creación.
            //----------------------------------------------------------------------------------
            if (!$this->blnEditClie) {
                $this->objClieReta->SucursalId = $this->objUsuario->SucursalId;
                $this->objClieReta->CreatedBy  = $this->objUsuario->CodiUsua;
            }
            $this->objClieReta->Save();
        } catch (Exception $e) {
            t('Error guardando Remitente: '.$e->getMessage());
            $this->danger($e->getMessage());
            return;
        }
        t('Remitente almacenado');
        //---------------------------------------------------------------------------------------------------
        // Si los datos del Destinatario no existen, se almacenan en la base de datos, para futuros envios.
        //  En caso de que exista, se actualizan sus datos.
        //---------------------------------------------------------------------------------------------------
        if (strlen(trim($this->txtCeduDest->Text))) {
            try {
                if (!$this->objDestPmnx) {
                    $this->objDestPmnx = new ClientesRetail();
                    $this->objDestPmnx->CedulaRif = DejarNumerosVJGuion($this->txtCeduDest->Text);
                }
                $this->objDestPmnx->Nombre        = substr(limpiarCadena($this->txtNombDest->Text),0,100);
                $this->objDestPmnx->TelefonoFijo  = DejarSoloLosNumeros($this->txtTlfdFijo->Text);
                $this->objDestPmnx->TelefonoMovil = DejarSoloLosNumeros($this->txtTlfdMovi->Text);
                $this->objDestPmnx->Sexo          = $this->lstSexoDest->SelectedValue;
                $this->objDestPmnx->Email         = substr(strtolower($this->txtEmaiDest->Text),0,100);
                $this->objDestPmnx->Sexo          = $this->lstSexoDest->SelectedValue;
                $this->objDestPmnx->Direccion     = substr(limpiarCadena($this->txtDireDest->Text),0,250);
                $this->objDestPmnx->Estado        = $this->txtEstaDest->Text;
                $this->objDestPmnx->Ciudad        = $this->txtCiudDest->Text;
                $this->objDestPmnx->CodigoPostal  = $this->txtPostDest->Text;
                if (!$this->blnEditDest) {
                    $this->objDestPmnx->SucursalId   = $this->objUsuario->SucursalId;
                    $this->objDestPmnx->CreatedBy    = $this->objUsuario->CodiUsua;
                }
                $this->objDestPmnx->Save();
            } catch (Exception $e) {
                t('Error guardando Destinatario: '.$e->getMessage());
                $this->danger($e->getMessage());
                return;
            }
            t('Destinatario almacenado');
        }

    }

    protected function btnSave_Click() {
        t('=================');
        t('Guardando la Guia');
        $this->GestionarClientes();
        //---------------------------------------------------
        // Se guarda la guia en la base de datos
        //---------------------------------------------------
        if (!$this->blnEditMode) {
            $this->txtNumeGuia->Text = Guias::proxNroDeGuia();
        }
        $arrResuUpda = $this->UpdateGuiaFields();
        t('Campos de la guia actualizados');
        $blnTodoOkey = $arrResuUpda['TodoOkey'];
        t('TodoOkey: '.$blnTodoOkey);
        if ($blnTodoOkey) {
            try {
                $this->objGuia->Save();
                t('Guia Guardada');
            } catch (Exception $e) {
                t('Error grabando la guia: '.$e->getMessage());
                $this->danger($e->getMessage());
                $blnTodoOkey = false;
            }
        } else {
            t($arrResuUpda['MensErro']);
            $this->danger($arrResuUpda['MensErro']);
        }
        //---------------------------------------
        // Se crean las piezas correspondientes
        //---------------------------------------
        if ($blnTodoOkey) {
            t('Voy a procesar las piezas');
            $this->procesamientoDePiezas();
            t('Voy a procesar los conceptos');
            $this->procesamientoDeConceptosOpcionales();
            t('Regresando a la invocacion de la rutina');
            try {
                $this->txtDescCont->Text = $this->objGuia->Contenido;
                $this->txtCantPiez->Text = $this->objGuia->Piezas;
                $this->txtAltoEnvi->Text = $this->objGuia->Alto;
                $this->txtAnchEnvi->Text = $this->objGuia->Ancho;
                $this->txtLargEnvi->Text = $this->objGuia->Largo;
                $this->txtVoluEnvi->Text = $this->objGuia->Volumen;
                $this->txtPiesEnvi->Text = $this->objGuia->PiesCub;
                $this->txtKiloEnvi->Text = $this->objGuia->Kilos;
            } catch (Exception $e) {
                t('Excepcion: '.$e->getMessage());
            }
            t('Regrese el procesamiento de las piezas');
            $this->blnCambPiez = false;
        }
        //---------------------------------------
        // Se calculan los Importes y Conceptos
        //---------------------------------------
        if ($blnTodoOkey) {
            $arrConcActi = Conceptos::conceptosActivos($this->objGuia->Producto->Codigo);
            t('Conceptos Fijos a calcular: '.count($arrConcActi));
            //----------------------------------------------------------
            // Se agregan los Conceptos Opcionales asociados a la guia
            //----------------------------------------------------------
            $arrConcOpci = $this->objGuia->GetGuiaConceptosOpcionalesAsGuiaArray();
            t('Conceptos Opcionales a calcular: '.count($arrConcOpci));
            foreach ($arrConcOpci as $objConcOpci) {
                $arrConcActi[] = $objConcOpci->Concepto;
            }
            //----------------------------------------------------------------------------
            // Los conceptos deben "calcularse en orden", de tal manera que los impuesto
            // aplique correctamente sobre aquellos que forma parte de su base imponible
            //----------------------------------------------------------------------------
            usort($arrConcActi, function(Conceptos $a, Conceptos $b) {return strcmp($a->Orden, $b->Orden);});
            $this->objGuia->calcularTodoLosConceptos($arrConcActi);
            $this->txtTotaGuia->Text = round($this->objGuia->Total,2);
            //-------------------------------------
            // Se graga el Pick-Up de cada piezas
            //-------------------------------------
            $intContCkpt = $this->grabarPickUp();
        }
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal      = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario     = !$blnTodoOkey ? 'Guia creada exitosamente' : 'No se pudo crear la guia';
        $this->objProcEjec->NotificarAdmin = !$blnTodoOkey ? true : false;
        $this->objProcEjec->Save();
        t('Proceso actualizado');

        //-------------------------------------------------------------------
        // Se graba la guia en la tabla de impresion de formatos de la guia
        //-------------------------------------------------------------------
        $objGuiaImpr = GuiaImprimir::LoadByGuiaId($this->objGuia->Id);
        if (!($objGuiaImpr instanceof GuiaImprimir)) {
            try {
                $objGuiaImpr = new GuiaImprimir();
                $objGuiaImpr->GuiaId    = $this->objGuia->Id;
                $objGuiaImpr->IsImpresa = 0;
                $objGuiaImpr->CreatedAt = new QDateTime(QDateTime::Now());
                $objGuiaImpr->UpdatedAt = $objGuiaImpr->CreatedAt;
                $objGuiaImpr->Save();
            } catch (Error $e) {
                t('Error: '.$e->getMessage());
                $this->danger('Error: '.$e->getMessage());
            } catch (Exception $e) {
                t('Excepcion: '.$e->getMessage());
                $this->danger('Excepcion: '.$e->getMessage());
            }
        } else {
            if ($this->blnEditMode) {
                try {
                    $objGuiaImpr->IsImpresa = 0;
                    $objGuiaImpr->UpdatedAt = new QDateTime(QDateTime::Now());
                    $objGuiaImpr->Save();
                } catch (Error $e) {
                    t('Error: '.$e->getMessage());
                    $this->danger('Error: '.$e->getMessage());
                } catch (Exception $e) {
                    t('Excepcion: '.$e->getMessage());
                    $this->danger('Excepcion: '.$e->getMessage());
                }
            }
        }
        t('Guia guardada en formatos de impresion');

        if ($blnTodoOkey) {
            PiezasTemp::EliminarDelUsuario($this->objUsuario->CodiUsua);
            QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$this->objGuia->Id);
        }
    }

    protected function grabarPickUp() {
        $objSucuUsua = Sucursales::Load($_SESSION['SucursalId']);
        $objReceUsua = Counter::Load($_SESSION['ReceptoriaId']);
        $objCkptPick = Checkpoints::LoadByCodigo('PU');
        if (!$objCkptPick) {
            $this->danger('No existe el Checkpoint <b>Pick-Up</b>. Notifique al Administrador del Sistema');
            return;
        }
        $strTextCkpt = trim($objCkptPick->Descripcion).' | SUC: '.$objSucuUsua->Iata.' | RECEP: '.$objReceUsua->Siglas;
        $_SESSION['ValiRepe'] = Parametros::BuscarParametro('VALIREPE','CKPTREPE','Val1',1);
        //---------------------------------------------------
        // Se registra el PickUp para cada pieza de la guia
        //---------------------------------------------------
        $intContCkpt = 0;
        $arrPiezGuia = $this->objGuia->GetGuiaPiezasAsGuiaArray();
        foreach ($arrPiezGuia as $objGuiaPiez) {
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
            $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
            $arrDatoCkpt['CodiCkpt'] = $objCkptPick->Id;
            $arrDatoCkpt['TextCkpt'] = $strTextCkpt;
            $arrDatoCkpt['NotiCkpt'] = $objCkptPick->Notificar;
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            if ($arrResuGrab['TodoOkey']) {
                t('Se grabo el checkpoint a la pieza');
                $intContCkpt ++;
            } else {
                t('Error grabando PickUp a la pieza: '.$arrResuGrab['MotiNook']);
                //$this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,$arrResuGrab['MotiNook']);
            }

        }
        return $intContCkpt;
    }

    protected function procesamientoDePiezas() {
        t('=============================');
        t('Rutina: Procesando las Piezas');
        $intCantPiez = 0;
        $decSumaKilo = 0;
        $decSumaAlto = 0;
        $decSumaAnch = 0;
        $decSumaLarg = 0;
        $decSumaVolu = 0;
        $decSumaValo = 0;
        $decSumaPies = 0;
        $strDescCont = '';
        $this->objGuia->borrarPiezas();
        $arrPiezTemp = PiezasTemp::LoadArrayByProcesoErrorId($this->objProcEjec->Id);
        $strDescAnte = '';
        //t('Hay '.count($arrPiezTemp).' piezas en la tabla temporal');
        foreach ($arrPiezTemp as $objPiezTemp) {
            if ($objPiezTemp->Alto > 0) {
                //t('Procesando pieza: '.$intCantPiez);
                try {
                    $objGuiaPiez = new GuiaPiezas();
                    $objGuiaPiez->GuiaId         = $this->objGuia->Id;
                    $objGuiaPiez->IdPieza        = $this->objGuia->proximoIdPieza();
                    $objGuiaPiez->EmpaqueId      = $objPiezTemp->EmpaqueId;
                    $objGuiaPiez->Descripcion    = substr($objPiezTemp->Descripcion,0,50);
                    $objGuiaPiez->Kilos          = $objPiezTemp->Kilos;
                    $objGuiaPiez->Alto           = $objPiezTemp->Alto;
                    $objGuiaPiez->Ancho          = $objPiezTemp->Ancho;
                    $objGuiaPiez->Largo          = $objPiezTemp->Largo;
                    $objGuiaPiez->Volumen        = $objPiezTemp->Volumen;
                    $objGuiaPiez->ValorDeclarado = $objPiezTemp->ValorDeclarado;
                    $objGuiaPiez->PiesCub        = $objPiezTemp->PiesCub;
                    $objGuiaPiez->Save();
                    //t('Pieza guardada');
                    if (trim($strDescAnte) != trim($objGuiaPiez->Descripcion)) {
                        //t('Desc Anterio: '.$strDescAnte.' Descripcion de la Pieza: '.$objGuiaPiez->Descripcion);
                        $strSepaPiez = '';
                        if (strlen($strDescCont) > 0) {
                            $strSepaPiez = ' | ';
                        }
                        $strDescCont .= $strSepaPiez.$objGuiaPiez->Descripcion;
                        $strDescAnte  = $objGuiaPiez->Descripcion;
                    }
                    $decSumaKilo += $objGuiaPiez->Kilos;
                    $decSumaAlto += $objGuiaPiez->Alto;
                    $decSumaAnch += $objGuiaPiez->Ancho;
                    $decSumaLarg += $objGuiaPiez->Largo;
                    $decSumaVolu += $objGuiaPiez->Volumen;
                    $decSumaValo += $objGuiaPiez->ValorDeclarado;
                    $decSumaPies += $objGuiaPiez->PiesCub;
                    $intCantPiez++;
                    t('acumulando...');
                } catch (Exception $e) {
                    t('Error grabando pieza: '.$e->getMessage());
                }
            }
        }
        //t('Termine la piezas, voy a actualizar la guia');
        //-------------------------------------------------------------------
        // Se actualiza la descripcion del contenido y los kilos de la Guia
        //-------------------------------------------------------------------
        try {
            $this->objGuia->Contenido      = substr($strDescCont,0,100);
            $this->objGuia->Piezas         = $intCantPiez;
            $this->objGuia->Kilos          = $decSumaKilo;
            $this->objGuia->Alto           = $decSumaAlto;
            $this->objGuia->Ancho          = $decSumaAnch;
            $this->objGuia->Largo          = $decSumaLarg;
            $this->objGuia->Volumen        = $decSumaVolu;
            $this->objGuia->ValorDeclarado = $decSumaValo;
            $this->objGuia->PiesCub        = $decSumaPies;
            $this->objGuia->Save();
            t('Guia actualizada');
        } catch (Exception $e) {
            t('Excepcion: '.$e->getMessage());
        }
        //t('Saliendo del procesamiento de las piezas');
    }


    protected function procesamientoDeConceptosOpcionales() {
        t('===========================================');
        t('Rutina: Procesando los Conceptos Opcionales');
        $this->objGuia->borrarConceptosOpcionales();
        $arrIdxxSele = $this->colConcSele->GetChangedIds(true);
        $arrIdxxSele = $this->colConcSele->GetSelectedIds();

        if (count($arrIdxxSele) > 0) {
            t('Hay seleccion de conceptos opcionales, los voy a asociar');
            foreach (array_keys($arrIdxxSele) as $intConcOpci) {
                t('Procesando Concepto con el Id: '.$intConcOpci);
                $strTextMens = $this->objGuia->AsociarConceptoOpcional($intConcOpci, $this->objUsuario->CodiUsua);
                t('El mensaje de regreso es: '.$strTextMens);
                if ($strTextMens != 'OK') {
                    t('Error asociando concepto opcional: '.$strTextMens);
                }
            }
        }
        t('Saliendo del procesamiento de los Conceptos Opcionales');
    }


    protected function sumaPiezas($decValoDecl=null) {
        $intCantPiez = 0;
        $decSumaKilo = 0;
        $decSumaAlto = 0;
        $decSumaAnch = 0;
        $decSumaLarg = 0;
        $decSumaVolu = 0;
        $decSumaValo = 0;
        $decSumaPies = 0;
        $strDescCont = '';
        $arrPiezTemp = PiezasTemp::LoadArrayByProcesoErrorId($this->objProcEjec->Id);
        $arrDescAnte = [];
        //t('Hay '.count($arrPiezTemp).' pieza(s)');
        foreach ($arrPiezTemp as $objPiezTemp) {
            if ($objPiezTemp->Alto > 0) {
                //t('Procesando pieza: '.$intCantPiez);
                if (!in_array($objPiezTemp->Descripcion,$arrDescAnte)) {
                    //t('Desc Ante: '.$strDescAnte.' Desc de la Pieza: '.$objPiezTemp->Descripcion);
                    $strSepaPiez = '';
                    if (strlen($strDescCont) > 0) {
                        //t('Hay algo en la descripcion del contenido: '.$strDescCont);
                        $strSepaPiez = ' | ';
                    }
                    $strDescCont   .= $strSepaPiez.$objPiezTemp->Descripcion;
                    $arrDescAnte[]  = $objPiezTemp->Descripcion;
                }
                if (!is_null($decValoDecl)) {
                    $objPiezTemp->ValorDeclarado = $decValoDecl;
                    $objPiezTemp->Save();
                }
                $decSumaKilo += $objPiezTemp->Kilos;
                $decSumaAlto += $objPiezTemp->Alto;
                $decSumaAnch += $objPiezTemp->Ancho;
                $decSumaLarg += $objPiezTemp->Largo;
                $decSumaVolu += $objPiezTemp->Volumen;
                $decSumaValo += $objPiezTemp->ValorDeclarado;
                $decSumaPies += $objPiezTemp->PiesCub;
                $intCantPiez++;
                //t('acumulando...');
            }
        }
        //t('Termine la piezas, voy a actualizar la guia');
        //-------------------------------------------------------------------
        // Se actualiza la descripcion del contenido y los kilos de la Guia
        //-------------------------------------------------------------------
        $this->txtDescCont->Text = $strDescCont;
        $this->txtKiloEnvi->Text = $decSumaKilo;
        $this->txtCantPiez->Text = $intCantPiez;
        $this->txtAltoEnvi->Text = $decSumaAlto;
        $this->txtAnchEnvi->Text = $decSumaAnch;
        $this->txtLargEnvi->Text = $decSumaLarg;
        $this->txtVoluEnvi->Text = $decSumaVolu;
        $this->txtValoDecl->Text = round($decSumaValo,2);
        $this->txtPiesEnvi->Text = $decSumaPies;
    }


    //-------------------------------------------------------------------
    // Función responsable del cálculo de la Tarifa del Expreso Nacional
    //-------------------------------------------------------------------

    protected function UpdateGuiaFields() {
        $arrResuUpda['TodoOkey'] = true;
        $arrResuUpda['MensErro'] = '';
        //-------------------------------------
        // El servicio determina el producto
        //-------------------------------------
        $strServExpo = $this->lstServExpo->SelectedValue;
        $strCodiExpo = $strServExpo == 'AER' ? 'EXA' : 'EXM';
        $objProdExpo = Productos::LoadByCodigo($strCodiExpo);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        //$mixErroOrig = error_reporting();
        //error_reporting(0);

        try {
            $this->objGuia->ClienteRetailId = $this->objClieReta->Id;

            if (!$this->blnEditSupe || !$this->blnEditMode) {
                //$this->objGuia->OrigenId           = $this->intSucuOrig;
                $this->objGuia->OrigenId           = $this->lstSucuOrig->SelectedValue;
                $this->objGuia->ReceptoriaOrigenId = $this->intReceOrig;
            }
            $this->objGuia->ServicioEntrega           = 'DOM';
            $this->objGuia->DestinoId                 = $this->lstSucuDest->SelectedValue;
            $this->objGuia->ReceptoriaDestinoId       = !is_null($this->lstReceDest->SelectedValue) ? $this->lstReceDest->SelectedValue : null;
            $this->objGuia->NombreRemitente           = $this->txtNombClie->Text;
            $this->objGuia->DireccionRemitente        = $this->txtDireClie->Text;
            $this->objGuia->TelefonoRemitente         = DejarSoloLosNumeros($this->txtTeleFijo->Text);
            $this->objGuia->TelefonoMovilRemitente    = DejarSoloLosNumeros($this->txtTeleMovi->Text);
            $this->objGuia->EmailRemitente            = strtolower($this->txtEmaiRemi->Text);
            $this->objGuia->CedulaDestinatario        = DejarNumerosVJGuion($this->txtCeduDest->Text);
            $this->objGuia->NombreDestinatario        = $this->txtNombDest->Text;
            $this->objGuia->DireccionDestinatario     = $this->txtDireDest->Text;
            $this->objGuia->TelefonoDestinatario      = DejarSoloLosNumeros($this->txtTlfdFijo->Text);
            $this->objGuia->TelefonoMovilDestinatario = DejarSoloLosNumeros($this->txtTlfdMovi->Text);
            $this->objGuia->EmailDestinatario         = strtolower($this->txtEmaiDest->Text);
            $this->objGuia->SexoDestinatario          = $this->lstSexoDest->SelectedValue;
            $this->objGuia->Piezas                    = $this->txtCantPiez->Text;
            $this->objGuia->FormaPago                 = $this->lstFormPago->SelectedValue;
            $this->objGuia->ValorDeclarado            = str_replace(",", '', $this->txtValoDecl->Text);
            $this->objGuia->Asegurado                 = $this->lstEnviSgro->SelectedValue;
            $this->objGuia->Observacion               = '';
            $this->objGuia->VendedorId                = $this->objClieNaci->VendedorId;
            $this->objGuia->Contenido                 = '';
            $this->objGuia->Kilos                     = 0;
            $this->objGuia->Estado                    = $this->txtEstaDest->Text;
            $this->objGuia->Ciudad                    = $this->txtCiudDest->Text;
            $this->objGuia->CodigoPostal              = $this->txtPostDest->Text;
            $this->objGuia->TipoExport                = 'COURIER';
            $this->objGuia->ProductoId                = $objProdExpo->Id;
            $this->objGuia->AliadoId                  = $this->lstAliaCome->SelectedValue;
            $this->objGuia->ClienteCorpId             = $this->lstClieCorp->SelectedValue;
            $this->objGuia->ReferenciaExp             = $this->txtRefeExpo->Text;
            $this->objGuia->RazonesExp                = $this->txtRazoExpo->Text;
            $this->objGuia->ModoValor                 = $this->lstModoValo->SelectedValue;

            if (!$this->blnEditMode) {
                //------------------------------------------------------------------------
                // En caso de Insercion, se asignan valores por defecto ciertos campos
                //------------------------------------------------------------------------
                $this->objGuia->Numero    = $this->txtNumeGuia->Text;
                $this->objGuia->Tracking  = $this->txtNumeGuia->Text;
                $this->objGuia->Fecha     = new QDateTime(QDateTime::Now());
                $this->objGuia->Tasa      = $this->decTasaDola;
                $this->objGuia->Alto      = 0;
                $this->objGuia->Ancho     = 0;
                $this->objGuia->Largo     = 0;
                $this->objGuia->Volumen   = 0;
                $this->objGuia->PiesCub   = 0;
                $this->objGuia->Total     = 0;
                $this->objGuia->CreatedBy = $this->objUsuario->CodiUsua;
                $this->objGuia->TarifaId  = $this->objClieNaci->TarifaId;
            }

        } catch (Exception $e) {
            t('Error actualizando campos de la guia: '.$e->getMessage());
            $arrResuUpda['TodoOkey'] = false;
            $arrResuUpda['MensErro'] = $e->getMessage();
        }

        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        //error_reporting($mixErroOrig);

        return $arrResuUpda;
    }


    protected function danger($strTextMens) {
        $this->mensaje($strTextMens.' !','','d', '', __iHAND__);
    }


    protected function Form_Validate() {
        $this->mensaje();
        //t('1');
        $this->txtNumeCedu->Text = DejarNumerosVJGuion($this->txtNumeCedu->Text);
        if (strlen($this->txtNumeCedu->Text) == 0) {
            $strTextMens = 'Cédula/RIF del Remitente <b>Requerida</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('2');
        $this->txtNombClie->Text = limpiarCadena($this->txtNombClie->Text);
        if (strlen($this->txtNombClie->Text) == 0) {
            $strTextMens = 'Nombre del Remitente <b>Requerido</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('3');
        //$this->txtTeleFijo->Text = DejarSoloLosNumeros($this->txtTeleFijo->Text);
        //if (strlen($this->txtTeleFijo->Text) == 0) {
        //    $strTextMens = 'Teléfono Fijo del Remitente <b>Requerido</b>';
        //    $this->danger($strTextMens);
        //    return false;
        //}
        //t('4');
        if (strlen($this->txtTeleFijo->Text) > 12) {
            $strTextMens = 'Teléfono Fijo del Remitente <b>No debe tener más de 12 caracteres numéricos</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('5');
        $this->txtTeleMovi->Text = DejarSoloLosNumeros($this->txtTeleMovi->Text);
        if (strlen($this->txtTeleMovi->Text) == 0) {
            $strTextMens = 'Teléfono Movil del Remitente <b>Requerido</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('6');
        if (strlen($this->txtTeleMovi->Text) > 12) {
            $strTextMens = 'Teléfono Movil del Remitente <b>No debe tener más de 12 caracteres numéricos</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('7');
        $this->txtDireClie->Text = limpiarCadena($this->txtDireClie->Text);
        if (strlen($this->txtDireClie->Text) == 0) {
            $strTextMens = 'Dirección del Remitente <b>Requerida</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('8');
        if (strlen($this->txtDireClie->Text) > 250) {
            $strTextMens = 'Dirección del Remitente <b>No debe exceder los 250 caracteres</b>';
            $this->danger($strTextMens);
            return false;
        }
        if (is_null($this->lstSexoClie->SelectedValue)) {
            $this->danger('El Sexo del Remitente, es requerido');
            return false;
        }
        if (strlen($this->calFechNaci->Text) > 0) {
            if (!validateDate($this->calFechNaci->Text,'d/m/Y')) {
                $strTextMens = 'Fecha de Nacimiento <b>Inválida</b>';
                $this->danger($strTextMens);
                return false;
            }
        }
        //t('9');
        if (is_null($this->lstSucuDest->SelectedValue)) {
            $strTextMens = 'Sucursal Destino <b>Requerida</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('10');
        $this->txtCeduDest->Text = DejarNumerosVJGuion($this->txtCeduDest->Text);
        //if (strlen($this->txtCeduDest->Text) == 0) {
        //    $strTextMens = 'Cédula del Destinario <b>Requerida</b>';
        //    $this->danger($strTextMens);
        //    return false;
        //}
        //t('11');
        $this->txtNombDest->Text = limpiarCadena($this->txtNombDest->Text);
        if (strlen($this->txtNombDest->Text) == 0) {
            $strTextMens = 'Nombre del Destinario <b>Requerido</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('12');
        //$this->txtTlfdFijo->Text = DejarSoloLosNumeros($this->txtTlfdFijo->Text);
        //if (strlen($this->txtTlfdFijo->Text) == 0) {
        //    $strTextMens = 'Teléfono Fijo del Destinario <b>Requerido</b>';
        //    $this->danger($strTextMens);
        //    return false;
        //}
        //t('13');
        if (strlen($this->txtTlfdFijo->Text) > 12) {
            $strTextMens = 'Teléfono Movil del Destinatario <b>No debe tener más de 12 caracteres numéricos</b>';
            $this->danger($strTextMens);
            return false;
        }
        if (is_null($this->lstSexoDest->SelectedValue)) {
            $this->danger('El Sexo del Destinatario, es requerido');
            return false;
        }
        //t('14');
        $this->txtTlfdMovi->Text = DejarSoloLosNumeros($this->txtTlfdMovi->Text);
        if (strlen($this->txtTlfdMovi->Text) == 0) {
            $strTextMens = 'Teléfono Movil del Destinario <b>Requerido</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('15');
        if (strlen($this->txtTlfdMovi->Text) > 12) {
            $strTextMens = 'Teléfono Movil del Destinatario <b>No debe tener más de 12 caracteres numéricos</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('16');
        $this->txtDireDest->Text = limpiarCadena($this->txtDireDest->Text);
        if (strlen($this->txtDireDest->Text) == 0) {
            $strTextMens = 'Dirección del Destinatario <b>Requerida</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('17');
        if (strlen($this->txtDireDest->Text) > 250) {
            $strTextMens = 'Dirección del Destinatario <b>No debe exceder los 250 caracteres</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('18');
        if (is_null($this->lstFormPago->SelectedValue)) {
            $strTextMens = 'Modalidad de Pago <b>Requerida</b>';
            $this->danger($strTextMens);
            return false;
        }
        if (strlen($this->txtCantPiez->Text) == 0) {
            $strTextMens = 'Cantidad de Piezas <b>Requerida</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('19');
        if ($this->txtCantPiez->Text <= 0) {
            $strTextMens = 'Cantidad de Piezas <b>Debe ser Mayor a Cero (0)</b>';
            $this->danger($strTextMens);
            return false;
        }
        if (strlen($this->txtKiloEnvi->Text) == 0) {
            $strTextMens = 'Peso <b>Requerido</b>';
            $this->danger($strTextMens);
            return false;
        }
        if (strlen($this->txtValoDecl->Text) == 0) {
            $this->txtValoDecl->Text = 0;
        }
        //t('21');
        return true;
    }

}

// Go ahead and run this form object to render the page and its event handlers, using
// generated/fac_tari_masi_edit.tpl.php as the included HTML template file

CrearGuiaExp::Run('CrearGuiaExp');