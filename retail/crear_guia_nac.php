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

class CrearGuiaNac extends FormularioBaseKaizen {
    /* @var $objGuia Guias */
    protected $objGuia;

    /* @var $objClieReta ClientesRetail */
    protected $objClieReta;

    /* @var $objProdNaci Productos */
    protected $objProdNaci;

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


    protected $lstReceDomi;
    protected $lstFormPago;

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

    protected $lstSucuDest;
    protected $lstReceDest;

    protected $txtCeduDest;
    protected $txtNombDest;
    protected $lstSexoDest;
    protected $txtTlfdFijo;
    protected $txtTlfdMovi;
    protected $txtEmaiDest;
    protected $txtDireDest;
    protected $txtCantPiez;
    protected $txtCantKilo;
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

    protected $lblNewxProf;
    protected $lblNuevProf;
    protected $txtNuevProf;
    protected $btnSaveProf;

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
    protected $txtKiloPiez;
    protected $blnEditPiez = false;
    protected $intEditPiez;
    protected $lblContPiez;
    protected $lblKiloPiez;

    protected $decTasaDola;
    protected $decTasaEuro;


    protected function SetupGuia() {
        $intIdxxGuia = QApplication::PathInfo(0);

        //----------------------------------------------------------
        // En caso de que sea necesario el manejo de multi-piezas
        //----------------------------------------------------------
        $strNombProc = 'Piezas Temporales: '.$this->objUsuario->LogiUsua.' '.date('Y-m-d');
        $this->objProcEjec = CrearProceso($strNombProc);

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
            //t('Buscando piezas...');
            $arrPiezGuia = $this->objGuia->GetGuiaPiezasAsGuiaArray();
            foreach ($arrPiezGuia as $objPiezGuia) {
                //t('Pieza: '.$objPiezGuia->IdPieza);
                $objPiezTemp = new PiezasTemp();
                $objPiezTemp->ProcesoErrorId = $this->objProcEjec->Id;
                $objPiezTemp->Descripcion    = $objPiezGuia->Descripcion;
                $objPiezTemp->Kilos          = $objPiezGuia->Kilos;
                $objPiezTemp->CreatedBy      = $this->objUsuario->CodiUsua;
                $objPiezTemp->Save();
            }

        } else {
            $this->objGuia = new Guias();
            $this->blnEditMode = false;
            PiezasTemp::EliminarDelUsuario($this->objUsuario->CodiUsua);
            t('Elimine todas las piezas temporales del Usuario');
        }
        $this->intSucuOrig = $_SESSION['SucursalId'];
        $this->intReceOrig = $_SESSION['ReceptoriaId'];
        $this->objClieNaci = unserialize($_SESSION['ClieNaci']);
        $this->objProdNaci = unserialize($_SESSION['ProdNaci']);
        $this->decTasaDola = $_SESSION['TasaDola'];
        $this->decTasaEuro = $_SESSION['TasaEuro'];

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

            $this->intOperGene = unserialize($_SESSION['OperGene']);
            $this->blnSeguSino = unserialize($_SESSION['SeguSino']);
            $this->decValoMini = unserialize($_SESSION['ValoMini']);
            $this->decValoMaxi = unserialize($_SESSION['ValoMaxi']);
            $this->decLimiKilo = unserialize($_SESSION['LimiKilo']);
            //----------------------------------------------------------
            // Vector que almacena las Receptorias con Limite de Kilos
            //----------------------------------------------------------
            $this->arrReceLimi = unserialize($_SESSION['ReceLimi']);
            //----------------------------------------------
            // Aqui se determina si la guia es Facturable
            //----------------------------------------------
            $this->blnGuiaFact = false;
            if ($this->blnEditMode) {
                if ($this->objGuia->TipoGuia == TipoGuiaType::CODCOBROENDESTINO) {
                    //--------------------------------------------------------------------
                    // La Guia es COD y el Destino coincide con la localidad del Usuario
                    //--------------------------------------------------------------------
                    if (trim($this->objGuia->ReceptoriaDestino) == trim($this->intReceOrig)) {
                        $this->blnGuiaFact = true;
                    }
                    //--------------------------------------------------------------------
                    // La Guia es COD con entrega a DOMICILIO, tambien se puede facturar
                    //--------------------------------------------------------------------
                    if (trim($this->objGuia->ReceptoriaDestino) == trim($this->intSucuOrig)) {
                        $this->blnGuiaFact = true;
                    }
                    if (!$this->blnGuiaFact) {
                        //-----------------------------------------------------------------------------
                        // Otra posibilidad para que una guia sea Facturable, es que la Sucursal en la
                        // que se encuentra el Usuario, se el "Centro de Facturacion" del Destino de
                        // la guia.
                        //-----------------------------------------------------------------------------
                        if (strlen($this->objGuia->EstaDestObject->SeFacturaEn) > 0) {
                            if (trim($this->objGuia->EstaDestObject->SeFacturaEnObject->Siglas) == trim($this->intSucuOrig))
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

        t('Entrando a la guia');
        $this->SetupGuia();
        t('Setup de la guia');
        //$this->SetupValores();

        $this->lblTituForm->Text = QApplication::Translate('Guia Nacional');

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
        $this->lstProfClie_Create();
        $this->lstSexoClie_Create();

        $this->lblNewxProf_Create();
        $this->lblNuevProf_Create();
        $this->txtNuevProf_Create();
        $this->btnSaveProf_Create();

        t('Voy por aqui 1');
        //------------------------
        // Servicio
        //------------------------
        $this->lstSucuDest_Create();
        $this->lstReceDomi_Create();
        $this->lstReceDest_Create();

        t('Voy por aqui 2');
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

        t('Voy por aqui 3');

        //-----------------
        // Datos del Envío
        //-----------------
        $this->txtDescCont_Create();
        $this->txtValoDecl_Create();
        $this->lstEnviSgro_Create();
        $this->lstFormPago_Create();
        $this->txtCantPiez_Create();
        $this->txtCantKilo_Create();

        $this->txtDescCont = disableControl($this->txtDescCont);
        $this->txtCantPiez = disableControl($this->txtCantPiez);
        $this->txtCantKilo = disableControl($this->txtCantKilo);

        t('Voy por aqui 4');

        //---------------------
        // Costos del Servicio
        //---------------------
        $this->dtgConcGuia_Create();

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

        t('Voy por aqui 5');

        //-----------------
        // Botones y otros
        //-----------------
        $this->btnSave->Text = TextoIcono('cogs fa-lg','Guardar');
        $this->btnNextPage_Create();
        $this->btnPrevPage_Create();

        $this->lblTituPiez_Create();
        $this->lblContPiez_Create();
        $this->lblKiloPiez_Create();
        $this->txtContPiez_Create();
        $this->txtKiloPiez_Create();
        $this->btnSavePiez_Create();
        $this->btnCancPiez_Create();
        $this->btnDelePiez_Create();

        //$this->lblBotoPopu_Create();
        //$this->btnMasxAcci_Create();
        //$this->btnErroProc_Create();
        //$this->lblPopuModa_Create();
        //---------
        // Eventos
        //---------
        $this->lstReceDomi_Change();

        //$strTextMens = 'Evite el uso de caracteres especiales (Ej: \\~°#^*+) en <b>los nombres, las direcciones, el contenido y los teléfonos</b>';
        //$this->mensaje($strTextMens,'m','i','',__iINFO__);

        t('Voy por aqui 6');

        if ($this->blnEditMode) {
            if (!is_null($this->objGuia->FacturaId)) {
                $this->warning('La Guia esta Facturada | No se admiten cambios');
                $this->btnSave->Visible = false;
            } else {
                $this->txtNumeCedu->SetFocus();
            }
        } else {
            $this->txtNumeCedu->SetFocus();
        }
        t('Voy por aqui 7');
    }


    //-------------------------
    // Creando los objetos ...
    //-------------------------

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = 'Nro Guia';
        //$this->txtNumeGuia->Required = true;
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
        //$this->calFechGuia->Required = true;
        $this->calFechGuia->Enabled = false;
        $this->calFechGuia->ForeColor = 'blue';
        if ($this->blnEditMode) {
            $this->calFechGuia->Text = $this->objGuia->Fecha->__toString("DD/MM/YYYY");
        } else {
            $this->calFechGuia->Text = date('Y-m-d');
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
        if ($this->blnEditMode && $this->objClieReta) {
            $this->txtTeleMovi->Text = $this->objClieReta->TelefonoMovil;
        }
    }

    protected function txtDireClie_Create() {
        $this->txtDireClie = new QTextBox($this);
        $this->txtDireClie->Placeholder = 'Direccion del Remitente';
        $this->txtDireClie->Width = 408;
        $this->txtDireClie->Rows = 6;
        $this->txtDireClie->TextMode = QTextMode::MultiLine;
        $this->txtDireClie->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDireClie->Text = $this->objGuia->DireccionRemitente;
        }
    }

    protected function calFechNaci_Create() {
        $this->calFechNaci = new QCalendar($this);
        $this->calFechNaci->Width = 120;
        if ($this->blnEditMode) {
            $this->calFechNaci->DateTime = new QDateTime($this->objGuia->ClienteRetail->FechaNacimiento);
        }
    }

    protected function txtEmaiRemi_Create() {
        $this->txtEmaiRemi = new QTextBox($this);
        $this->txtEmaiRemi->Placeholder = 'correo@remitente.com';
        $this->txtEmaiRemi->Width = 260;
        $this->txtEmaiRemi->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
        if ($this->blnEditMode) {
            $this->txtEmaiRemi->Text = $this->objGuia->ClienteRetail->Email;
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

    protected function lstSucuDest_Create() {
        $this->lstSucuDest = new QListBox($this);
        $this->lstSucuDest->Width = 200;
        if ($this->blnEditMode) {
            $this->cargarDestinos($this->objGuia->DestinoId);
        } else {
            $this->cargarDestinos();
        }
        //$this->lstSucuDest->AddAction(new QChangeEvent(), new QAjaxAction('lstSucuDest_Change'));
    }

    protected function lstReceDomi_Create() {
        $this->lstReceDomi = new QListBox($this);
        $this->lstReceDomi->Name = 'Servicio';
        $blnSeleRece = false;
        if (!$this->blnEditMode) {
            $blnSeleDomi = true;
        } else {
            $blnSeleDomi = $this->objGuia->ServicioEntrega == 'DOM';
            $blnSeleRece = $this->objGuia->ServicioEntrega == 'REC';
        }
        $this->lstReceDomi->AddItem('DOMICILIO','DOM', $blnSeleDomi);
        $this->lstReceDomi->AddItem('RECEPTORIA','REC', $blnSeleRece);
        $this->lstReceDomi->AddAction(new QChangeEvent(), new QAjaxAction('lstReceDomi_Change'));
    }

    protected function lstReceDest_Create() {
        $this->lstReceDest = new QListBox($this);
        $this->lstReceDest->Name = 'Receptoria';
        $this->lstReceDest->Width = 150;
        $this->lstReceDest->AddItem('- Seleccione -',null);
        //if ($this->blnEditMode) {
        //    //t('En el create del listbox, la receptoria destino es: '.$this->objGuia->ReceptoriaDestino);
        //    $this->cargarReceptorias($this->objGuia->EstaDest,$this->objGuia->ReceptoriaDestino);
        //}
        //$this->lstReceDest->AddAction(new QChangeEvent(), new QAjaxAction('lstReceDest_Change'));
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
        //if ($this->blnEditMode) {
        //    $this->cargarSexos($this->lstSexoDest,$this->objGuia->ClienteRetail->Sexo);
        //} else {
        //    $this->cargarSexos($this->lstSexoDest);
        //}
        $blnSeleMasc = false;
        $blnSeleFeme = false;
        if ($this->blnEditMode) {
            $blnSeleMasc = $this->objGuia->ClienteRetail->Sexo == 'M' ? true : false;
            $blnSeleFeme = $this->objGuia->ClienteRetail->Sexo == 'F' ? true : false;
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
            $this->txtTlfdMovi->Text = $this->objGuia->ClienteRetail->TelefonoMovil;
        }
    }

    protected function txtEmaiDest_Create() {
        $this->txtEmaiDest = new QTextBox($this);
        $this->txtEmaiDest->Placeholder = 'correo@destinatario.com';
        $this->txtEmaiDest->Width = 260;
        $this->txtEmaiDest->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
        if ($this->blnEditMode) {
            $this->txtEmaiDest->Text = $this->objGuia->ClienteRetail->Email;
        }
    }


    protected function txtDireDest_Create() {
        $this->txtDireDest = new QTextBox($this);
        $this->txtDireDest->Placeholder = 'Direccion de entrega (incluya puntos de referencia)';
        $this->txtDireDest->Width = 545;
        $this->txtDireDest->Rows = 5;
        $this->txtDireDest->TextMode = QTextMode::MultiLine;
        $this->txtDireDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDireDest->Text = $this->objGuia->DireccionDestinatario;
        }
    }

    protected function lstEnviSgro_Create() {
        $this->lstEnviSgro = new QListBox($this);
        $this->lstEnviSgro->Width = 100;
        if ($this->blnEditMode) {
            $this->cargarModalidadesDeSgro($this->objGuia->Asegurado);
        } else {
            $this->cargarModalidadesDeSgro();
        }
    }

    protected function cargarModalidadesDeSgro($intEnviSgro=null) {
        $this->lstEnviSgro->RemoveAllItems();
        $this->lstEnviSgro->AddItem('SI',1,$intEnviSgro==1);
        $this->lstEnviSgro->AddItem('NO',0,$intEnviSgro==0);
    }

    protected function txtValoDecl_Create() {
        $this->txtValoDecl = new QFloatTextBox($this);
        $this->txtValoDecl->Name = 'Valor Decl.';
        $this->txtValoDecl->Width = 120;
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

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QIntegerTextBox($this);
        $this->txtCantPiez->Width = 50;
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
                $objPiezTemp->Descripcion    = '';
                $objPiezTemp->Kilos          = 0;
                $objPiezTemp->CreatedBy      = $this->objUsuario->CodiUsua;
                $objPiezTemp->Save();
            }
            $this->dtgPiezTemp->Visible = true;
            $this->dtgPiezTemp->Refresh();
        }
    }

    protected function txtCantKilo_Create() {
        $this->txtCantKilo = new QFloatTextBox($this);
        $this->txtCantKilo->Width = 50;
        if ($this->blnEditMode) {
            $this->txtCantKilo->Text = $this->objGuia->Kilos;
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

    protected function txtTasaDola_Create() {
        $this->txtTasaDola = new QFloatTextBox($this);
        $this->txtTasaDola->Width = 110;
        if ($this->blnEditMode) {
            $this->txtTasaDola->Text = nf($this->objGuia->Tasa);
        } else {
            $this->txtTasaDola->Text = nf($this->decTasaDola);
        }
    }

    protected function txtTotaGuia_Create() {
        $this->txtTotaGuia = new QFloatTextBox($this);
        $this->txtTotaGuia->Width = 110;
        if ($this->blnEditMode) {
            $this->txtTotaGuia->Text = nf($this->objGuia->Total);
        }
    }

    protected function txtIdxxPref_Create() {
        $this->txtIdxxPref = new QTextBox($this);
        $this->txtIdxxPref->Width = 110;
        if ($this->blnEditMode) {
            $this->txtIdxxPref->Text = $this->objGuia->FacturaId;
        }
    }

    protected function lblTituPiez_Create() {
        $this->lblTituPiez = new QLabel($this);
        $this->lblTituPiez->Text = 'Piezas de la Guia <i class="fa fa-plus-circle fa-lg"></i>';
        $this->lblTituPiez->HtmlEntities = false;
        $this->lblTituPiez->CssClass = 'titulo';
        $this->lblTituPiez->AddAction(new QClickEvent(), new QAjaxAction('lblTituPiez_Click'));
    }

    public function lblTituPiez_Click() {
        $this->mostrarCampos('add');
    }

    protected function lblContPiez_Create() {
        $this->lblContPiez = new QLabel($this);
        $this->lblContPiez->Text = 'Contenido';
        $this->lblContPiez->Visible = false;
    }

    protected function lblKiloPiez_Create() {
        $this->lblKiloPiez = new QLabel($this);
        $this->lblKiloPiez->Text = 'Kilos';
        $this->lblKiloPiez->HorizontalAlign = QHorizontalAlign::Right;
        $this->lblKiloPiez->Visible = false;
    }

    protected function txtContPiez_Create() {
        $this->txtContPiez = new QTextBox($this);
        $this->txtContPiez->Placeholder = 'Descripcion del Contenido de la Pieza';
        $this->txtContPiez->Width = 300;
        $this->txtContPiez->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        //$this->txtContPiez->Required = true;
        $this->txtContPiez->Visible = false;
    }

    protected function txtKiloPiez_Create() {
        $this->txtKiloPiez = new QTextBox($this);
        $this->txtKiloPiez->Placeholder = 'Kg';
        $this->txtKiloPiez->Width = 50;
        //$this->txtKiloPiez->Required = true;
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


    public function dtgPiezTempRow_Click($strFormId, $strControlId, $strParameter) {
        $id = (int)$strParameter;
        $this->intEditPiez = $id;
        $this->mostrarCampos('edit');
        $objPiezGuia = PiezasTemp::Load($id);

        $this->txtContPiez->Text = $objPiezGuia->Descripcion;
        $this->txtKiloPiez->Text = $objPiezGuia->Kilos;
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
            $objPiezGuia->Descripcion = strtoupper(limpiarCadena($this->txtContPiez->Text));
            $objPiezGuia->Kilos       = (float)$this->txtKiloPiez->Text;
            $objPiezGuia->Save();
            t('Salve en PiezasTemp');
            $this->sumaPiezas();
        } catch (Exception $e) {
            t('Error: '.$e->getMessage());
        }

        $this->dtgPiezTemp->Refresh();

        $this->txtContPiez->Text = '';
        $this->txtKiloPiez->Text = '';

        //$this->success('Transaccion Exitosa.  Pieza guardada !!!');
    }

    protected function sumaPiezas() {
        $intCantPiez = 0;
        $decSumaKilo = 0;
        $strDescCont = '';
        $arrPiezTemp = PiezasTemp::LoadArrayByProcesoErrorId($this->objProcEjec->Id);
        t('Hay '.count($arrPiezTemp).' piezas');
        foreach ($arrPiezTemp as $objPiezTemp) {
            if ($objPiezTemp->Kilos > 0) {
                t('Procesando pieza: '.$intCantPiez);
                $strSepaPiez = '';
                if ($intCantPiez > 0) {
                    $strSepaPiez = ' | ';
                }
                $strDescCont .= $strSepaPiez.$objPiezTemp->Descripcion;
                $decSumaKilo += $objPiezTemp->Kilos;
                $intCantPiez++;
                t('acumulando...');
            }
        }
        t('Termine la piezas, voy a actualizar la guia');
        //-------------------------------------------------------------------
        // Se actualiza la descripcion del contenido y los kilos de la Guia
        //-------------------------------------------------------------------
        $this->txtDescCont->Text = $strDescCont;
        $this->txtCantKilo->Text = $decSumaKilo;
        $this->txtCantPiez->Text = $intCantPiez;
    }

    protected function btnDelePiez_Click() {
        t('Borrando pieza');
        $objPiezGuia = PiezasTemp::Load($this->intEditPiez);

        $objPiezGuia->Delete();
        //t('Pieza borrada');
        $this->sumaPiezas();

        $this->dtgPiezTemp->Refresh();

        $this->txtContPiez->Text = '';
        $this->txtKiloPiez->Text = '';
        //t('Listo el borrado');
        //$this->success('Transaccion Exitosa.  Pieza borrada !!!');
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
            $this->txtContPiez->Visible = !$this->txtContPiez->Visible;
            $this->txtKiloPiez->Visible = !$this->txtKiloPiez->Visible;
            $this->btnSavePiez->Visible = !$this->btnSavePiez->Visible;
            $this->btnCancPiez->Visible = !$this->btnCancPiez->Visible;
            $this->btnDelePiez->Visible = false;

            $this->txtContPiez->Text = '';
            $this->txtKiloPiez->Text = '';

        }
        if ($strAction == 'edit') {
            $this->blnEditPiez = true;
            $this->lblContPiez->Visible = true;
            $this->lblKiloPiez->Visible = true;
            $this->txtContPiez->Visible = true;
            $this->txtKiloPiez->Visible = true;
            $this->btnSavePiez->Visible = true;
            $this->btnCancPiez->Visible = true;
            $this->btnDelePiez->Visible = true;

        }
    }

    protected function btnCancel_Click() {
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

        $this->dtgConcGuia->CssClass = 'datagrid';
        $this->dtgConcGuia->AlternateRowStyle->CssClass = 'alternate';

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

        $colMontConc = new QDataGridColumn($this);
        $colMontConc->Name = 'MONTO';
        $colMontConc->Html = '<?= nf($_ITEM->Monto); ?>';
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
        //$intPiezTemp = PiezasTemp::QueryCount(QQ::AndCondition($objCondicion));
        //t('Hay '.$intPiezTemp.' piezas');
    }


    protected function createdtgPiezTempColumns() {
        $colDescPiez = new QDataGridColumn($this);
        $colDescPiez->Name = 'DESCRIPCION';
        $colDescPiez->Html = '<?= $_ITEM->Descripcion; ?>';
        $colDescPiez->Width = 220;
        $colDescPiez->HorizontalAlign = QHorizontalAlign::Left;
        $this->dtgPiezTemp->AddColumn($colDescPiez);

        $colKiloPiez = new QDataGridColumn($this);
        $colKiloPiez->Name = 'KILOS';
        $colKiloPiez->Html = '<?= nf($_ITEM->Kilos); ?>';
        $colKiloPiez->Width = 50;
        $colKiloPiez->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgPiezTemp->AddColumn($colKiloPiez);

    }

    //--------------------------------------------------------------------------------------------------------------
    // Función que busca y muestra los datos de un cliente remitente existente a través de su cédula. En caso de no
    // existir, se declara al mismo como nuevo cliente.
    //--------------------------------------------------------------------------------------------------------------
    protected function txtNumeCedu_Blur() {
        if (!$this->blnEditMode) {
            $strNumeCedu = DejarNumerosVJGuion($this->txtNumeCedu->Text);
            if (strlen($strNumeCedu) > 0) {
                $this->objClieReta = ClientesRetail::LoadByCedulaRif($strNumeCedu);
                if ($this->objClieReta) {
                    $this->blnEditClie = true;
                    //$this->txtNumeCedu->HtmlAfter = '';
                    $this->txtNombClie->Text = $this->objClieReta->Nombre;
                    $this->txtTeleFijo->Text = $this->objClieReta->TelefonoFijo;
                    $this->txtTeleMovi->Text = $this->objClieReta->TelefonoMovil;
                    $this->txtDireClie->Text = $this->objClieReta->Direccion;
                    $this->txtEmaiRemi->Text = $this->objClieReta->Email;
                    $this->calFechNaci->DateTime = new QDateTime($this->objClieReta->FechaNacimiento);
                    $this->lstSexoClie->SelectedIndex = $this->objClieReta->Sexo == 'M' ? 1 : 2;
                    $this->lstSucuDest->SetFocus();
                } else {
                    $this->blnEditClie = false;
                    $this->objClieReta = new ClientesRetail();
                    $this->objClieReta->CedulaRif = $strNumeCedu;
                    //$this->txtNumeCedu->HtmlAfter = ' (Nuevo Cliente)';
                    $this->txtNombClie->Text = '';
                    $this->txtTeleFijo->Text = '';
                    $this->txtTeleMovi->Text = '';
                    $this->txtDireClie->Text = '';
                    $this->txtEmaiRemi->Text = '';
                    $this->calFechNaci->DateTime = null;
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
                    //$this->txtCeduDest->HtmlAfter = '';
                    $this->txtNombDest->Text          = $this->objDestPmnx->Nombre;
                    $this->txtTlfdFijo->Text          = $this->objDestPmnx->TelefonoFijo;
                    $this->txtTlfdMovi->Text          = $this->objDestPmnx->TelefonoMovil;
                    $this->txtEmaiDest->Text          = $this->objDestPmnx->Email;
                    $this->lstSexoDest->SelectedIndex = $this->objDestPmnx->Sexo == 'M' ? 1 : 2;
                    if ($this->lstReceDomi->SelectedValue == 'DOM') {
                        $this->txtDireDest->Text = $this->objDestPmnx->Direccion;
                    }
                } else {
                    $this->blnEditDest = false;
                    $this->objDestPmnx = new ClientesRetail();
                    $this->objDestPmnx->CedulaRif     = $strNumeCedu;
                    //$this->txtCeduDest->HtmlAfter     = ' (Nuevo Cliente)';
                    $this->txtNombDest->Text          = '';
                    $this->txtTlfdFijo->Text          = '';
                    $this->txtTlfdMovi->Text          = '';
                    $this->lstSexoDest->SelectedIndex = 0;
                    if (is_null($this->lstReceDest->SelectedValue)) {
                        $this->txtDireDest->Text = '';
                    }
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

    protected function cargarDestinos($strCodiDest=null) {
        $this->lstSucuDest->RemoveAllItems();
        $this->lstSucuDest->Width = 200;
        $arrCodiDest = Sucursales::LoadSucursalesActivas('Nombre','nac');
        $intCantDest = count($arrCodiDest);
        $this->lstSucuDest->AddItem('- Seleccione Uno - ('.$intCantDest.')', null);
        if ($arrCodiDest) {
            foreach ($arrCodiDest as $objSucuDest) {
                $blnSeleRegi = false;
                if ($this->blnEditMode) {
                    $blnSeleRegi = $this->objGuia->DestinoId == $objSucuDest->Id ? true : false;
                }
                $this->lstSucuDest->AddItem($objSucuDest->__toString(), $objSucuDest->Id, $blnSeleRegi);
            }
        }
    }

    public function lstReceDomi_Change() {
        if ($this->lstReceDomi->SelectedValue == 'DOM') {
            //$this->lstReceDest->RemoveAllItems();
            //$this->lstReceDest->Enabled = false;
            //$this->lstReceDest->ForeColor = 'blue';
            $this->lstReceDest->SelectedIndex = 0;
            $this->lstReceDest = disableControl($this->lstReceDest);
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
                $this->lstReceDest = enableControl($this->lstReceDest);
                //$this->lstReceDest->Enabled = true;
                //$this->lstReceDest->ForeColor = null;
            } else {
                //--------------------------------------
                // Cuando solo existe una Receptoria
                //--------------------------------------
                $this->cargarReceptorias($this->strCodiEsta,$this->objGuia->ReceptoriaDestino);
                //$this->lstReceDest->Enabled = false;
                //$this->lstReceDest->ForeColor = 'blue';
                $this->lstReceDest = enableControl($this->lstReceDest);
                $this->txtDireDest->Text = 'TIENDA GOLD COAST ('.$this->strCodiEsta.')';
                //$this->txtDireDest->Enabled = false;
                //$this->txtDireDest->ForeColor = 'blue';
                $this->txtDireDest = enableControl($this->txtDireDest);
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

            $this->lstReceDomi->RemoveAllItems();
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

                    $this->lstReceDomi->AddItem('&nbsp;RECEPTORIA&nbsp;','R',$blnSeleRegi);
                    $this->lstReceDomi->AddItem('&nbsp;DOMICILIO','D',!$blnSeleRegi);

                } else {
                    $this->lstReceDomi->AddItem('&nbsp;RECEPTORIA&nbsp;','R');
                    $this->lstReceDomi->AddItem('&nbsp;DOMICILIO','D');
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
                    if ($this->blnEditMode && $this->lstReceDomi->SelectedValue = 'R') {
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
                    if ($this->blnEditMode && $this->lstReceDomi->SelectedValue = 'R') {
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
                $this->lstReceDomi->AddItem('&nbsp;DOMICILIO','D',true);
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
        $this->lstFormPago->AddItem('COBRO DESTINO','COD',$strFormPago=='COD');
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

    protected function btnSave_Click() {
        t('=================');
        t('Guardando la Guia');
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
            $this->objClieReta->FechaNacimiento = new QDateTime($this->calFechNaci->DateTime);
            if (!is_null($this->lstProfClie->SelectedValue)) {
                $this->objClieReta->ProfesionId = $this->lstProfClie->SelectedValue;
            }
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
        try {
            if (!$this->objDestPmnx) {
                $this->objDestPmnx = new ClientesRetail();
                $this->objDestPmnx->CedulaRif = DejarNumerosVJGuion($this->txtCeduDest->Text);
            }
            $this->objDestPmnx->Nombre        = substr(limpiarCadena($this->txtNombDest->Text),0,100);
            $this->objDestPmnx->TelefonoFijo  = DejarSoloLosNumeros($this->txtTlfdFijo->Text);
            $this->objDestPmnx->TelefonoMovil = DejarSoloLosNumeros($this->txtTlfdMovi->Text);
            $this->objDestPmnx->Sexo          = $this->lstSexoDest->SelectedValue;
            $this->objDestPmnx->Email         = substr(strtolower($this->txtEmaiDest->Text),0,191);
            $this->objDestPmnx->Direccion     = substr(limpiarCadena($this->txtDireDest->Text),0,250);
            if (!$this->blnEditDest) {
                $this->objDestPmnx->SucursalId = $this->objUsuario->SucursalId;
                $this->objDestPmnx->CreatedBy  = $this->objUsuario->CodiUsua;
            }
            $this->objDestPmnx->Save();
        } catch (Exception $e) {
            t('Error guardando Destinatario: '.$e->getMessage());
            $this->danger($e->getMessage());
            return;
        }
        t('Destinatario almacenado');
        //---------------------------------------------------
        // Se guarda la guia en la base de datos
        //---------------------------------------------------
        if (!$this->blnEditMode) {
            $this->txtNumeGuia->Text = Guias::proxNroDeGuia();
        }
        $arrResuUpda = $this->UpdateGuiaFields();
        $blnTodoOkey = $arrResuUpda['TodoOkey'];
        t('Todo Okey: '.$blnTodoOkey);
        if ($blnTodoOkey) {
            try {
                t('Alla voy...');
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
            $this->procesamientoDePiezas();
            $this->txtDescCont->Text = $this->objGuia->Contenido;
            $this->txtCantPiez->Text = $this->objGuia->Piezas;
            $this->txtCantKilo->Text = $this->objGuia->Kilos;
        }
        //---------------------------------------
        // Se calculan los Importes y Conceptos
        //---------------------------------------
        if ($blnTodoOkey) {
            $arrConcActi = Conceptos::conceptosActivos($this->objGuia->Producto->Codigo);
            $this->objGuia->calcularTodoLosConceptos($arrConcActi);
            $this->txtTotaGuia->Text = nf($this->objGuia->Total);
            //-------------------------------------
            // Se graga el Pick-Up de cada piezas
            //-------------------------------------
            $intContCkpt = $this->grabarPickUp();
            t('Conceptos calculados');
        }
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal      = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario     = !$blnTodoOkey ? 'Guia creada exitosamente' : 'No se pudo crear la guia';
        $this->objProcEjec->NotificarAdmin = !$blnTodoOkey ? true : false;
        $this->objProcEjec->Save();
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'ProcesoError';
        $arrLogxCamb['intRefeRegi'] = $this->objProcEjec->Id;
        $arrLogxCamb['strNombRegi'] = $this->objProcEjec->Nombre;
        $arrLogxCamb['strDescCamb'] = 'Ejecutado';
        LogDeCambios($arrLogxCamb);
        if ($blnTodoOkey) {
            $this->success('Transaccion Exitosa !!!');
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
        $strTextCkpt = trim($objCkptPick->Descripcion).' | SUCURSAL: '.$objSucuUsua->Iata.' | RECEPTORIA: '.$objReceUsua->Siglas;
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
                t('Hubo algun error: '.$arrResuGrab['MotiNook']);
                //$this->arrGuiaErro[] = array($objGuiaPiez->IdPieza,$arrResuGrab['MotiNook']);
            }

        }
        return $intContCkpt;
    }

    protected function procesamientoDePiezas() {
        $intCantPiez = 0;
        $decSumaKilo = 0;
        $strDescCont = '';
        $this->objGuia->borrarPiezas();
        $arrPiezTemp = PiezasTemp::LoadArrayByProcesoErrorId($this->objProcEjec->Id);
        t('Hay '.count($arrPiezTemp).' piezas');
        foreach ($arrPiezTemp as $objPiezTemp) {
            if ($objPiezTemp->Kilos > 0) {
                t('Procesando pieza: '.$intCantPiez);
                try {
                    $objGuiaPiez = new GuiaPiezas();
                    $objGuiaPiez->GuiaId         = $this->objGuia->Id;
                    $objGuiaPiez->IdPieza        = $this->objGuia->proximoIdPieza();
                    $objGuiaPiez->Descripcion    = $objPiezTemp->Descripcion;
                    $objGuiaPiez->Kilos          = $objPiezTemp->Kilos;
                    $objGuiaPiez->Save();
                    t('Pieza guardada');
                    $strSepaPiez = '';
                    if ($intCantPiez > 0) {
                        $strSepaPiez = ' | ';
                    }
                    $strDescCont .= $strSepaPiez.$objGuiaPiez->Descripcion;
                    $decSumaKilo += $objGuiaPiez->Kilos;
                    $intCantPiez++;
                    t('acumulando...');
                } catch (Exception $e) {
                    t('Error grabando pieza: '.$e->getMessage());
                }
            }
        }
        t('Termine la piezas, voy a actualizar la guia');
        //-------------------------------------------------------------------
        // Se actualiza la descripcion del contenido y los kilos de la Guia
        //-------------------------------------------------------------------
        $this->objGuia->Contenido = $strDescCont;
        $this->objGuia->Piezas    = $intCantPiez;
        $this->objGuia->Kilos     = $decSumaKilo;
        $this->objGuia->Save();
        t('Guia actualizada');
        //QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$this->objGuia->Id);
    }


    //-------------------------------------------------------------------
    // Función responsable del cálculo de la Tarifa del Expreso Nacional
    //-------------------------------------------------------------------

    protected function UpdateGuiaFields() {
        $arrResuUpda['TodoOkey'] = true;
        $arrResuUpda['MensErro'] = '';
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        //$mixErroOrig = error_reporting();
        //error_reporting(0);

        try {
            $this->objGuia->Numero          = $this->txtNumeGuia->Text;
            $this->objGuia->Tracking        = $this->txtNumeGuia->Text;
            $this->objGuia->ClienteRetailId = $this->objClieReta->Id;
            $this->objGuia->Fecha           = new QDateTime($this->calFechGuia->Text);

            if (!$this->blnEditSupe || !$this->blnEditMode) {
                $this->objGuia->OrigenId           = $this->intSucuOrig;
                $this->objGuia->ReceptoriaOrigenId = $this->intReceOrig;
            }
            //-----------------------------------------------------------------------------------------
            // Si el Valor Declarado es mayor a cero, entonces se entiende que la Guia esta asegurada
            //-----------------------------------------------------------------------------------------
            //$blnEnviAseg = false;
            //if (strlen($this->txtValoDecl->Text) > 0) {
            //    if ($this->txtValoDecl->Text > 0) {
            //        $blnEnviAseg = true;
            //    }
            //}
            $this->objGuia->ServicioEntrega       = $this->lstReceDomi->SelectedValue;
            $this->objGuia->DestinoId             = $this->lstSucuDest->SelectedValue;
            $this->objGuia->ReceptoriaDestinoId   = !is_null($this->lstReceDest->SelectedValue) ? $this->lstReceDest->SelectedValue : null;
            $this->objGuia->NombreRemitente       = $this->txtNombClie->Text;
            $this->objGuia->DireccionRemitente    = $this->txtDireClie->Text;
            $this->objGuia->TelefonoRemitente     = DejarSoloLosNumeros($this->txtTeleMovi->Text);
            $this->objGuia->NombreDestinatario    = $this->txtNombDest->Text;
            $this->objGuia->DireccionDestinatario = $this->txtDireDest->Text;
            $this->objGuia->CedulaDestinatario    = DejarNumerosVJGuion($this->txtCeduDest->Text);
            $this->objGuia->TelefonoDestinatario  = DejarSoloLosNumeros($this->txtTlfdMovi->Text);
            $this->objGuia->Piezas                = $this->txtCantPiez->Text;
            $this->objGuia->FormaPago             = $this->lstFormPago->SelectedValue;
            $this->objGuia->ValorDeclarado        = str_replace(",", '', $this->txtValoDecl->Text);
            $this->objGuia->Asegurado             = $this->lstEnviSgro->SelectedValue;
            $this->objGuia->Observacion           = '';
            $this->objGuia->VendedorId            = $this->objClieNaci->VendedorId;
            $this->objGuia->Contenido             = ''; //$this->txtDescCont->Text;
            $this->objGuia->Kilos                 = 0; //$this->txtCantKilo->Text;

            if (!$this->blnEditMode) {
                //------------------------------------------------------------------------
                // En caso de Insercion, se asignan valores por defecto ciertos campos
                //------------------------------------------------------------------------
                $this->objGuia->Numero        = $this->txtNumeGuia->Text;
                $this->objGuia->Tracking      = $this->txtNumeGuia->Text;
                $this->objGuia->Fecha         = new QDateTime(QDateTime::Now());
                $this->objGuia->ClienteCorpId = $this->objClieNaci->CodiClie;
                $this->objGuia->ProductoId    = $this->objProdNaci->Id;
                $this->objGuia->Tasa          = $this->decTasaDola;
                $this->objGuia->Alto          = null;
                $this->objGuia->Ancho         = null;
                $this->objGuia->Largo         = null;
                $this->objGuia->Total         = 0;
                $this->objGuia->CreatedBy     = $this->objUsuario->CodiUsua;
                $this->objGuia->TarifaId      = $this->objClieNaci->TarifaId;
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
        t('1');
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
        $this->txtTeleFijo->Text = DejarSoloLosNumeros($this->txtTeleFijo->Text);
        if (strlen($this->txtTeleFijo->Text) == 0) {
            $strTextMens = 'Teléfono Fijo del Remitente <b>Requerido</b>';
            $this->danger($strTextMens);
            return false;
        }
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
        //t('9');
        if (is_null($this->lstSucuDest->SelectedValue)) {
            $strTextMens = 'Sucursal Destino <b>Requerida</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('10');
        $this->txtCeduDest->Text = DejarNumerosVJGuion($this->txtCeduDest->Text);
        if (strlen($this->txtCeduDest->Text) == 0) {
            $strTextMens = 'Cédula del Destinario <b>Requerida</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('11');
        $this->txtNombDest->Text = limpiarCadena($this->txtNombDest->Text);
        if (strlen($this->txtNombDest->Text) == 0) {
            $strTextMens = 'Nombre del Destinario <b>Requerido</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('12');
        $this->txtTlfdFijo->Text = DejarSoloLosNumeros($this->txtTlfdFijo->Text);
        if (strlen($this->txtTlfdFijo->Text) == 0) {
            $strTextMens = 'Teléfono Fijo del Destinario <b>Requerido</b>';
            $this->danger($strTextMens);
            return false;
        }
        //t('13');
        if (strlen($this->txtTlfdFijo->Text) > 12) {
            $strTextMens = 'Teléfono Movil del Destinatario <b>No debe tener más de 12 caracteres numéricos</b>';
            $this->danger($strTextMens);
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
        if (strlen($this->txtCantKilo->Text) == 0) {
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

CrearGuiaNac::Run('CrearGuiaNac');