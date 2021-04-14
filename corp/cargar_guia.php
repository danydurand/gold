<?php
//------------------------------------------------------------------------------------
// Programa       : cargar_guia.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 14/10/16 10:53 AM
// Proyecto       : newliberty
// Descripcion    : Este programa permite al Usuario Connect crear una guía Nacional.
//------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class CargarGuia extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros de objetos
    //-----------------------
    /* @var $objGuia Guia */
    protected $objGuia;
    /* @var $objCliente MasterCliente */
    protected $objCliente;
    protected $objProducto;
    protected $objSeguGuia;
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $blnEditMode;
    //protected $blnSoloCred;

    protected $arrValoMini;
    protected $arrValoMaxi;
    protected $decValoMini;
    protected $decValoMaxi;

    protected $arrRecoMini;
    protected $arrRecoMaxi;
    protected $decRecoMini;
    protected $decRecoMaxi;

    protected $intCantLimi;
    protected $arrSucuActi;
    protected $arrSucuZcod;
    protected $arrDestFrec;
    protected $decValoDecl;
    protected $strCodiEsta;
    protected $strZonaIncu;
    protected $strPesoGuia;
    protected $strHoraTope;
    //---------------------------
    // Parámetros de información
    //---------------------------
    protected $txtNumeGuia;
    protected $calFechGuia;
    protected $lstSucuOrig;
    protected $calFechReco;
    protected $txtDescCont;
    protected $txtCantPiez;
    protected $chkSeguGuia;
    protected $chkEnviReto;
    protected $txtContReto;
    protected $txtValoDecl;
    protected $lstModaPago;
    // ---- Remitente -----
    protected $txtNombRemi;
    protected $txtTeleRemi;
    protected $txtDireRemi;
    // ---- Destinatario ----
    protected $lstDestFrec;
    protected $lstSucuDest;
    protected $lstReceDest;
    protected $txtNombDest;
    protected $txtTeleDest;
    protected $txtDireDest;
    protected $lblCeduDest;
    protected $lstCeduDest;
    protected $txtCeduDest;
    protected $chkDestFrec;
    //-----------------------
    // Parámetros de Botones
    //-----------------------
    protected $btnCreaNuev;
    protected $btnImprGuia;
    protected $btnBorrGuia;
    // --- ZNC (Zonas No Cubiertas) ----
    protected $lblBotoPopu;
    protected $lblPopuModa;

    protected $arrClieAgen;
    protected $blnClieAgen;

    protected function setupGuia($strNumeGuia=null) {
        if (is_null($strNumeGuia)) {
            $strNumeGuia = QApplication::PathInfo(0);
        }

        if ($strNumeGuia) {
            $this->objGuia = Guia::Load($strNumeGuia);
            if (!$this->objGuia) {
                throw new Exception('Could not find a Guia object with PK arguments: ' . $strNumeGuia);
            }
            $this->blnEditMode = true;
        } else {
            $this->objGuia = new Guia();
            $this->blnEditMode = false;
        }
    }

    protected function setupValues() {
        $this->objCliente = unserialize($_SESSION['ClieMast']);
        //--------------------------------------------------------------------------------------------
        // Si la Guía se encuentra en modo de edición, la misma se queda con su Peso correspondiente.
        //--------------------------------------------------------------------------------------------
        if ($this->blnEditMode) {
            $this->strPesoGuia = $this->objGuia->PesoGuia;
            //-------------------------------------------------------------------------------------
            // Si la guia tiene la tarifa nueva (con reconversion monteria) entonces los valores
            // limites de Valor Declarado, deben estar reconvertidos
            //-------------------------------------------------------------------------------------
            /**
             * @var $objConfReco Parametro
             */
            $objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
            if ($this->objGuia->TarifaId >= (int)$objConfReco->ParaVal3) {
                $this->arrValoMini = unserialize($_SESSION['RecoMin1']);
                $this->arrValoMaxi = unserialize($_SESSION['RecoMax1']);
                $this->decValoMini = unserialize($_SESSION['RecoMini']);
                $this->decValoMaxi = unserialize($_SESSION['RecoMaxi']);
                $this->intCantLimi = count($this->arrValoMaxi)-1;
            } else {
                $this->arrValoMini = unserialize($_SESSION['ValoMin1']);
                $this->arrValoMaxi = unserialize($_SESSION['ValoMax1']);
                $this->decValoMini = unserialize($_SESSION['ValoMini']);
                $this->decValoMaxi = unserialize($_SESSION['ValoMaxi']);
                $this->intCantLimi = count($this->arrValoMaxi)-1;
            }
        } else {
            //--------------------------------------------------------
            // Limites de Valor Declarado para asegurar la mercancia
            //--------------------------------------------------------
            $this->arrValoMini = unserialize($_SESSION['RecoMin1']);
            $this->arrValoMaxi = unserialize($_SESSION['RecoMax1']);
            $this->decValoMini = unserialize($_SESSION['RecoMini']);
            $this->decValoMaxi = unserialize($_SESSION['RecoMaxi']);
            $this->intCantLimi = count($this->arrValoMaxi)-1;
            //------------------------------------------------------------------------------------------------------
            // Si la Tarifa del Cliente es por Valor de la Mercancía, entonces el Peso de la Guía tendrá como valor
            // 2.5 K. En caso contrario, el valor del Peso de la Guía tendrá como valor cero (0).
            //------------------------------------------------------------------------------------------------------
            if ($this->objCliente->Tarifa->TipoTarifa == FacTipoTarifaType::PORVALORDELAMERCANCIA) {
                $this->strPesoGuia = 2.5;
            } else {
                $this->strPesoGuia = 0;
            }
        }
        //-----------------------------------------------------------------------------------------------------
        // Si el Peso de la Guía es Menor o Igual a 2 K., entonces se obtiene Documento Nacional como Producto
        // de la guía. En caso contrario, se obtiene Paquete Nacional como Producto de la guía.
        //-----------------------------------------------------------------------------------------------------
        if ($this->strPesoGuia <= 2) {
            $this->objProducto = FacProducto::LoadBySiglProd('DOC');
        } else {
            $this->objProducto = FacProducto::LoadBySiglProd('APX');
        }
        //----------------------------------------------------------------------
        // Vector con las Sucursales activas de Venezuela, que no sean almacén.
        //----------------------------------------------------------------------
        $this->arrSucuActi = unserialize($_SESSION['SucuActi']);
        $this->arrSucuZcod = unserialize($_SESSION['SucuZcod']);
        //------------------------------------------------------
        // Vector con los Destinatarios Frecuentes del Cliente.
        //------------------------------------------------------
        $this->arrDestFrec = unserialize($_SESSION['DestFrec']);
        $intCantCarg = count($this->arrDestFrec);
        $intCantBase = $this->objCliente->CountDestinatarioFrecuentesAsCliente();
        if ($intCantCarg != $intCantBase) {
            $arrDestTemp = DestinatarioFrecuente::LoadArrayByClienteId(
                $this->objCliente->CodiClie,
                QQ::Clause(QQ::OrderBy(QQN::DestinatarioFrecuente()->Nombre))
            );
            $arrDestFrec = array();
            foreach ($arrDestTemp as $objDestFrec) {
                if (strlen(trim($objDestFrec->Nombre)) > 0) {
                    $arrDestFrec[] = $objDestFrec;
                }
            }
            $_SESSION['DestFrec'] = serialize($this->arrDestFrec);
        }
        //------------------------------------------------------------
        // Se identifica la hora Tope para realizar una Recolecta
        //------------------------------------------------------------
        $this->strHoraTope = BuscarParametro('00009', 'HoraTope', 'Txt1', '14:00');
        $this->arrClieAgen = array(1141,2891,6209);

        $this->blnClieAgen = false;
        $arrSucuAgen = array();
        if (in_array($this->objCliente->CodiClie,$this->arrClieAgen)) {
            $this->blnClieAgen = true;
            $arrSucuRece = Estacion::LoadArrayConCantidadDeReceptorias();
            $intCantSucu = count($arrSucuRece);
            if ($intCantSucu > 0) {
                foreach ($arrSucuRece as $objSucuRece) {
                    if ($objSucuRece->GetVirtualAttribute('cant_rece') > 0) {
                        $arrSucuAgen[] = $objSucuRece;
                    }
                }
            }
            $this->arrSucuActi = $arrSucuAgen;
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->setupGuia();
        $this->setupValues();

        $this->lblTituForm->Text = QApplication::Translate('Guía');

        //------------------------
        // Información de la Guía
        //------------------------
        $this->txtNumeGuia_Create();
        $this->calFechGuia_Create();
        $this->lstSucuOrig_Create();
        $this->calFechReco_Create();
        $this->txtDescCont_Create();
        $this->txtCantPiez_Create();
        $this->txtValoDecl_Create();
        $this->chkSeguGuia_Create();
        $this->chkEnviReto_Create();
        $this->txtContReto_Create();

        //---------------------------
        // Información del Remitente
        //---------------------------
        $this->txtNombRemi_Create();
        $this->txtTeleRemi_Create();
        $this->txtDireRemi_Create();

        $this->lblBotoPopu_Create();

        //------------------------------
        // Información del Destinatario
        //------------------------------
        $this->lstModaPago_Create();
        $this->lstDestFrec_Create();
        $this->lstSucuDest_Create();
        $this->lstReceDest_Create();
        $this->txtNombDest_Create();
        $this->txtTeleDest_Create();
        $this->txtDireDest_Create();
        $this->lblCeduDest_Create();
        $this->lstCeduDest_Create();
        $this->txtCeduDest_Create();
        $this->chkDestFrec_Create();
        $this->lstModaPago_Change();

        //-----------------
        // Botones y otros
        //-----------------
        $this->btnSave->Text = TextoIcono('save fa-lg','Guardar');
        $this->btnImprGuia_Create();
        $this->btnCreaNuev_Create();
        $this->btnBorrGuia_Create();
        $this->lblBotoPopu_Create();
        $this->lblPopuModa_Create();

        //---------------------------------------------------------------------
        // Se valida si al usuario se le permite realizar gestiones en la guía
        //---------------------------------------------------------------------
        $this->permitirCambios();
        //$this->lstSucuDest_Change();
        $this->lstModaPago_Change();

        if (!$this->blnEditMode) {
            $this->btnCancel->Visible = false;
        }

        $strTextMens = 'Evite el uso de caracteres especiales (Ej: \\~°#^*+) en <b>los nombres, la dirección, el contenido, el teléfono y la persona contacto</b>';
        $this->mensaje($strTextMens,'n','i','',__iINFO__);

        /*
        if (in_array($this->objCliente->CodiClie,$this->arrClieAgen)) {
            //$this->txtDireDest->Text = '';
            $this->txtDireDest->Enabled = false;
            $this->txtDireDest->ForeColor = 'blue';
        }
        */

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    public function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate('Nro. de Guía');
        $this->txtNumeGuia->Text = $this->objGuia->NumeGuia;
        $this->txtNumeGuia->Width = 100;
        $this->txtNumeGuia->Enabled = false;
    }

    protected function calFechGuia_Create() {
        $this->calFechGuia = new QCalendar($this);
        $this->calFechGuia->Name = 'Fecha';
        $this->calFechGuia->Width = 100;
        $this->calFechGuia->Enabled = false;
        if ($this->blnEditMode) {
            $this->calFechGuia->DateTime = $this->objGuia->FechGuia;
        } else {
            $this->calFechGuia->DateTime = new QDateTime(QDateTime::Now());
        }
    }

    protected function lstSucuOrig_Create() {
        $this->lstSucuOrig = new QListBox($this);
        if ($this->blnEditMode) {
            $this->cargarOrigen($this->objGuia->EstaOrig);
        } else {
            $this->cargarOrigen();
        }
    }

    protected function calFechReco_Create() {
        $this->calFechReco = new QCalendar($this);
        $this->calFechReco->Name = QApplication::Translate('Fecha de la Recolecta');
        $this->calFechReco->Width = 100;
        $this->calFechReco->DateTime = new QDateTime(QDateTime::Now);
        $this->calFechReco->AddAction(new QChangeEvent(), new QAjaxAction('calFechReco_Change'));
    }

    protected function txtDescCont_Create() {
        $this->txtDescCont = new QTextBox($this);
        $this->txtDescCont->Placeholder = 'Descripción del Contenido';
        $this->txtDescCont->TextMode = QTextMode::MultiLine;
        $this->txtDescCont->MaxLength = Guia::DescContMaxLength;
        $this->txtDescCont->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtDescCont->Width = 225;
        $this->txtDescCont->Height = 70;
        if ($this->blnEditMode) {
            $this->txtDescCont->Text = $this->objGuia->DescCont;
        }
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QTextBox($this);
        $this->txtCantPiez->Name = 'Cant. Piezas';
        $this->txtCantPiez->Width = 80;
        if ($this->blnEditMode) {
            $this->txtCantPiez->Text = $this->objGuia->CantPiez;
        }
    }

    protected function txtValoDecl_Create() {
        $this->txtValoDecl = new QFloatTextBox($this);
        $this->txtValoDecl->Name = 'Valor Decl.';
        $this->txtValoDecl->Width = 80;
        if ($this->blnEditMode) {
            $this->txtValoDecl->Text = $this->objGuia->ValorDeclarado;
        }
    }

    protected function chkSeguGuia_Create() {
        $this->chkSeguGuia = new QCheckBox($this);
        $this->chkSeguGuia->Name = '¿Desea Seguro?';
        if ($this->blnEditMode) {
            $this->chkSeguGuia->Checked = $this->objGuia->Asegurado;
        }
        $this->chkSeguGuia->AddAction(new QChangeEvent(), new QAjaxAction('chkSeguGuia_Change'));
    }

    protected function chkEnviReto_Create() {
        $this->chkEnviReto = new QCheckBox($this);
        $this->chkEnviReto->Name = '¿Envío Retorno?';
        if ($this->objCliente->GuiaRetorno) {
            $this->chkEnviReto->Visible = true;
        } else {
            $this->chkEnviReto->Visible = false;
        }
        if ($this->blnEditMode) {
            $this->chkEnviReto->Checked = $this->objGuia->TieneGuiaRetorno;
        }
        $this->chkEnviReto->AddAction(new QChangeEvent(), new QAjaxAction('chkEnviReto_Change'));
    }

    protected function txtContReto_Create() {
        $this->txtContReto = new QTextBox($this);
        $this->txtContReto->Name = 'Contenido Retorno';
        $this->txtContReto->MaxLength = Guia::ObservacionMaxLength;
        $this->txtContReto->Width = 515;
        $this->txtContReto->Height = 40;
        $this->habilitaRetorno();
        if ($this->objCliente->GuiaRetorno) {
            $this->txtContReto->Visible = true;
        } else {
            $this->txtContReto->Visible = false;
        }
    }

    //-------------------------------------
    // ---- Información del Remitente ----
    //-------------------------------------

    protected function txtNombRemi_Create() {
        $this->txtNombRemi = new QTextBox($this);
        $this->txtNombRemi->Name = 'Nombre/R. Social';
        $this->txtNombRemi->Width = 225;
        $this->txtNombRemi->MaxLength = Guia::NombRemiMaxLength;
        $this->txtNombRemi->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNombRemi->Text = $this->objGuia->NombRemi;
        } else {
            $this->txtNombRemi->Text = $this->objCliente->NombClie;
        }
    }

    protected function txtTeleRemi_Create() {
        $this->txtTeleRemi = new QTextBox($this);
        $this->txtTeleRemi->Name = 'Teléfono (Solo Números)';
        $this->txtTeleRemi->Width = 218;
        if ($this->blnEditMode) {
            $this->txtTeleRemi->Text = $this->objGuia->TeleRemi;
        } else {
            $this->txtTeleRemi->Text = $this->objCliente->TeleCona;
        }
    }

    protected function txtDireRemi_Create() {
        $this->txtDireRemi = new QTextBox($this);
        $this->txtDireRemi->Name = 'Dirección Recolecta';
        $this->txtDireRemi->TextMode = QTextMode::MultiLine;
        $this->txtDireRemi->MaxLength = Guia::DireRemiMaxLength;
        $this->txtDireRemi->Width = 225;
        $this->txtDireRemi->Height = 70;
        $this->txtDireRemi->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtDireRemi->Text = $this->objGuia->DireRemi;
        } else {
            $this->txtDireRemi->Text = substr($this->objUsuario->Direccion,0,200);
        }
    }

    protected function lstDestFrec_Create() {
        $this->lstDestFrec = new QListBox($this);
        $this->lstDestFrec->Name = 'Destinatario Frecuente';
        $this->lstDestFrec->Width = 240;
        $this->cargarDestinatario();
        $this->lstDestFrec->AddAction(new QChangeEvent(), new QAjaxAction('lstDestFrec_Change'));
    }

    protected function lstSucuDest_Create() {
        $this->lstSucuDest = new QListBox($this);
        $this->lstSucuDest->Name = 'Destino';
        if ($this->blnEditMode) {
            $this->cargarDestino($this->objGuia->EstaDest);
        } else {
            $this->cargarDestino();
        }
        $this->lstSucuDest->AddAction(new QChangeEvent(), new QAjaxAction('lstSucuDest_Change'));
    }

    protected function lstReceDest_Create() {
        $this->lstReceDest = new QListBox($this);
        $this->lstReceDest->Name = 'Receptoria';
        $this->lstReceDest->AddItem('- Seleccione Uno - ',null);
        $this->lstReceDest->AddAction(new QChangeEvent(), new QAjaxAction('lstReceDest_Change'));
        if (!$this->blnClieAgen) {
            $this->lstReceDest->Enabled = false;
            $this->lstReceDest->ForeColor = 'blue';
        }
    }

    protected function txtNombDest_Create() {
        $this->txtNombDest = new QTextBox($this);
        $this->txtNombDest->Placeholder = 'Nombre/R. Social';
        $this->txtNombDest->Width = 240;
        $this->txtNombDest->MaxLength = Guia::NombDestMaxLength;
        $this->txtNombDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNombDest->Text = $this->objGuia->NombDest;
        }
    }

    protected function txtTeleDest_Create() {
        $this->txtTeleDest = new QTextBox($this);
        $this->txtTeleDest->Name = 'Teléfono (Solo Números)';
        $this->txtTeleDest->Placeholder = '(Solo Números)';
        $this->txtTeleDest->Width = 218;
        if ($this->blnEditMode) {
            $this->txtTeleDest->Text = $this->objGuia->TeleDest;
        }
    }

    protected function txtDireDest_Create() {
        $this->txtDireDest = new QTextBox($this);
        $this->txtDireDest->Placeholder = 'Dirección Entrega';
        $this->txtDireDest->TextMode = QTextMode::MultiLine;
        $this->txtDireDest->MaxLength = Guia::DireDestMaxLength;
        $this->txtDireDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtDireDest->Width = 240;
        $this->txtDireDest->Rows = 5;
        if ($this->blnEditMode) {
            $this->txtDireDest->Text = $this->objGuia->DireDest;
        }
    }

    protected function lblCeduDest_Create() {
        $this->lblCeduDest = new QLabel($this);
        $this->lblCeduDest->Text = 'Cédula/RIF del Destinatario';
    }

    protected function lstCeduDest_Create() {
        $this->lstCeduDest = new QListBox($this);
        $arrTipoDocu = TipoDocumento::LoadAll();
        foreach ($arrTipoDocu as $objTipoDocu) {
            if (!$this->blnEditMode) {
                $this->lstCeduDest->AddItem($objTipoDocu->Id, $objTipoDocu->Id, $objTipoDocu->Id == "V");
            } else {
                $this->lstCeduDest->AddItem($objTipoDocu->Id, $objTipoDocu->Id, $objTipoDocu->Id == $this->objGuia->TipoDocumentoId);
            }
        }
    }

    protected function txtCeduDest_Create() {
        $this->txtCeduDest = new QTextBox($this);
        $this->txtCeduDest->Width = 160;
        $this->txtCeduDest->Placeholder = 'CED/RIF Destinatario';
        if ($this->blnEditMode) {
            $this->txtCeduDest->Text = $this->objGuia->CedulaRif;
        }
    }

    protected function chkDestFrec_Create() {
        $this->chkDestFrec = new QCheckBox($this);
        $this->chkDestFrec->Name = '¿Destinatario Frecuente?';
    }

    protected function lstModaPago_Create() {
        $this->lstModaPago = new QListBox($this);
        //$this->cargarModalidadPago();
        $this->cargarModalidadesDePago();
        $this->lstModaPago->AddAction(new QChangeEvent(),new QAjaxAction('lstModaPago_Change'));
    }

    protected function btnImprGuia_Create() {
        $this->btnImprGuia = new QButtonI($this);
        $this->btnImprGuia->Text = TextoIcono('print fa-lg','Impr');
        $this->btnImprGuia->AddAction(new QClickEvent(), new QAjaxAction('btnImprGuia_Click'));
        $this->btnImprGuia->Visible = $this->blnEditMode;
    }

    protected function btnCreaNuev_Create() {
        $this->btnCreaNuev = new QButtonP($this);
        $this->btnCreaNuev->Text = TextoIcono('plus-circle fa-lg','Nueva');
        $this->btnCreaNuev->AddAction(new QClickEvent(), new QServerAction('btnCreaNuev_Click'));
        $this->btnCreaNuev->Visible = false;
    }

    protected function btnBorrGuia_Create() {
        $this->btnBorrGuia = new QButtonD($this);
        $this->btnBorrGuia->Text = TextoIcono('trash-o fa-lg','Borr');
        $this->btnBorrGuia->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Guia'))));
        $this->btnBorrGuia->AddAction(new QClickEvent(), new QAjaxAction('btnBorrGuia_Click'));
        $this->btnBorrGuia->Visible = $this->blnEditMode;
    }

    protected function lblBotoPopu_Create() {
        $this->lblBotoPopu = new QLabel($this);
        $this->lblBotoPopu->Text = $this->recrearBotonPopup();
        $this->lblBotoPopu->HtmlEntities = false;
        $this->lblBotoPopu->CssClass = '';
    }

    protected function lblPopuModa_Create() {
        $this->lblPopuModa = new QLabel($this);
        $this->lblPopuModa->Text = $this->recrearPopupModal();
        $this->lblPopuModa->HtmlEntities = false;
        $this->lblPopuModa->CssClass = '';
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------


    protected function recrearBotonPopup() {
        $strTextModa =
            "<button type=\"button\" class=\"btn btn-warning btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\">
                <i class=\"fa fa-".__iINFO__." fa-lg\"></i> ZNC 
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
                <h4 class="modal-title" id="myModalLabel">Zonas No Cubiertas - '.$this->lstSucuDest->SelectedName.'</h4>
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

    protected function lstModaPago_Change() {
        if (!is_null($this->lstModaPago->SelectedValue)) {
            if ($this->lstModaPago->SelectedValue == TipoGuiaType::CODCOBROENDESTINO) {
                $this->cargarDestino('',true);
                $this->lstSucuDest_Change();
                $this->lstDestFrec->SelectedIndex = 0;
                $this->lstDestFrec->Enabled = false;
                $this->lstDestFrec->ForeColor = 'blue';
                $this->txtDireDest->Enabled = false;
                $this->txtDireDest->ForeColor = 'blue';
                $this->chkDestFrec->Enabled = false;
            } else {
                $this->cargarDestino('',false);
                $this->lstDestFrec->Enabled = true;
                $this->lstDestFrec->ForeColor = null;
                $this->txtDireDest->Enabled = true;
                $this->txtDireDest->ForeColor = null;
                $this->chkDestFrec->Enabled = true;
            }
        }
    }

    protected function enviarMensajeDeError($strMensErro) {
        $this->mensaje($strMensErro,'','d','',__iHAND__);
    }

    protected function Form_Validate() {
        $this->mensaje();
        if (strlen($this->txtNombRemi->Text) == 0) {
            $strMensErro = 'Nombre/R.Social del Remitente (Requerido)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtNombRemi->Text = limpiarCadena($this->txtNombRemi->Text);
        }
        if (strlen($this->txtTeleRemi->Text) == 0) {
            $strMensErro = 'Teléfono del Remitente (Requerido)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtTeleRemi->Text = DejarSoloLosNumeros($this->txtTeleRemi->Text);
        }
        if (strlen($this->txtTeleRemi->Text) > 11) {
            $strMensErro = 'Teléfono Remitente (No debe tener más de 11 caracteres numéricos)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtDireRemi->Text) == 0) {
            $strMensErro = 'Dirección de Recolecta (Requerida)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtDireRemi->Text = limpiarCadena($this->txtDireRemi->Text);
        }
        if (strlen($this->txtDireRemi->Text) < 10) {
            $strMensErro = 'Dirección de Remitente (Muy corta)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtDescCont->Text) == 0) {
            $strMensErro = 'Contenido del Envío (Requerido)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtDescCont->Text = limpiarCadena($this->txtDescCont->Text);
        }
        if (strlen($this->txtCantPiez->Text) == 0) {
            $strMensErro = 'Cantidad de Piezas (Requerida)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if ($this->txtCantPiez->Text <= 0) {
            $strMensErro = 'Cantidad de Piezas (Debe ser mayor a cero)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtValoDecl->Text) > 0) {
            if (!is_numeric($this->txtValoDecl->Text)) {
                $strMensErro = 'El Valor Declarado debe ser un Valor Numérico';
                $this->enviarMensajeDeError($strMensErro);
                return false;
            }
        }
        if ($this->chkSeguGuia->Checked) {
            if (strlen($this->txtValoDecl->Text) == 0) {
                $strMensErro = 'Valor Declarado (Requerido)';
                $this->enviarMensajeDeError($strMensErro);
                return false;
            } else {
                if ($this->objSeguGuia) {
                    if ($this->txtValoDecl->Text < $this->decValoMini) {
                        $strMensErro = $this->objSeguGuia->MensSegu;
                        $this->enviarMensajeDeError($strMensErro);
                        return false;
                    }
                    if ($this->txtValoDecl->Text > $this->decValoMaxi) {
                        $strMensErro = $this->objSeguGuia->MensSegu;
                        $this->enviarMensajeDeError($strMensErro);
                        return false;
                    }
                }
            }
        }
        if (is_null($this->lstSucuOrig->SelectedValue)) {
            $strMensErro = 'Origen (Requerido)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (is_null($this->lstSucuDest->SelectedValue)) {
            $strMensErro = 'Destino (Requerido)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtNombDest->Text) == 0) {
            $strMensErro = 'Nombre/Razón Social del Destinatario (Requerido)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtNombDest->Text = limpiarCadena($this->txtNombDest->Text);
        }
        if (strlen($this->txtNombDest->Text) > 100) {
            $strMensErro = 'Nombre/Razón Social del Destinatario (Max. 100 caracteres)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtNombDest->Text = limpiarCadena($this->txtNombDest->Text);
        }
        if (strlen($this->txtTeleDest->Text) == 0) {
            $strMensErro = 'Nro de Teléfono del Destinatario (Requerido)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtTeleDest->Text = DejarSoloLosNumeros($this->txtTeleDest->Text);
        }
        if (strlen($this->txtTeleDest->Text) > 11) {
            $strMensErro = 'El Teléfono del Destinatario (No debe tener más de 11 caracteres numéricos)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtTeleDest->Text = DejarSoloLosNumeros($this->txtTeleDest->Text);
        }
        if (strlen($this->txtDireDest->Text) == 0) {
            $strMensErro = 'Dirección de Entrega (Requerida)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtDireDest->Text = limpiarCadena($this->txtDireDest->Text);
        }
        if (strlen($this->txtDireDest->Text) < 20) {
            $strMensErro = 'Dirección de Entrega (Muy corta)';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtDireDest->Text = limpiarCadena($this->txtDireDest->Text);
        }
        $strModoPago = $this->lstModaPago->SelectedName;
        $intPosiPago = strpos($strModoPago, "-");
        $strNombPago = substr($strModoPago, 0, $intPosiPago);
        if ($strNombPago == 'COD') {
            if (strlen(trim($this->txtCeduDest->Text)) == 0) {
                $strMensErro = 'Cédula/RIF del Destinatario (Requerido)';
                $this->enviarMensajeDeError($strMensErro);
                return false;
            } else {
                $this->txtCeduDest->Text = DejarSoloLosNumeros($this->txtCeduDest->Text);
            }
        }
        return true;
    }

    protected function chkSeguGuia_Change() {
        $this->mensaje();
        if ($this->chkSeguGuia->Checked) {
            //--------------------------------------------------------------------------------------------
            // Se obtienen el Valor declarado, el Valor o Monto mínimo y máximo reglamentario del Seguro.
            //--------------------------------------------------------------------------------------------
            $this->decValoDecl = $this->txtValoDecl->Text;
            //-------------------------------------
            // Se inicializan otros parámetros ...
            //-------------------------------------
            $blnExceMini = false;
            $blnExceMaxi = false;
            $strMensAdve = '';
            //---------------------------------------------------------------------------------------------------
            // Se informa al usuario el rango reglamentario de valores del seguro y otras normativas necesarias.
            //---------------------------------------------------------------------------------------------------
            $strMensUsua  = 'Rango de Valor Declarado permitido <b>[%s - %s]</b> Bs.  ';
            $strMensUsua .= 'Recuerde que <b>no se aseguran líquidos ni artículos de vidrio</b>';
            $strMensUsua  = sprintf($strMensUsua,$this->decValoMini,$this->decValoMaxi);
            $this->mensaje($strMensUsua,'m','w','',__iEXCL__);
            //--------------------------------------------------------------------------------------------
            // Si el V. Declarado es Mayor al Valor Máximo establecido entonces se advierte la situación.
            //--------------------------------------------------------------------------------------------
            if ($this->decValoDecl > $this->decValoMaxi) {
                $blnExceMaxi = true;
                $this->decValoDecl = $this->decValoMaxi;
                $strMensAdve = 'El Monto Máximo asegurable es de Bs. '.$this->decValoMaxi;
                //----------------------------------------------------------------------------
                // Si la tarifa del Cliente es "Por Peso", entonces el valor máximo permitido
                // se convierte en el valor declarado.
                //----------------------------------------------------------------------------
                if ($this->objCliente->Tarifa->TipoTarifa == FacTipoTarifaType::PORPESO) {
                    $this->txtValoDecl->Text = $this->decValoMaxi;
                }
            } elseif ($this->decValoDecl < $this->decValoMini) {
                //-------------------------------------------------------------------------------------------
                // Si el V.Declarado es Menor al Valor Mínimo establecido entonces se advierte la situación
                //-------------------------------------------------------------------------------------------
                $blnExceMini = true;
                $strMensAdve = 'El Monto Mínimo asegurable es de Bs. '.$this->decValoMini;
            }
            //---------------------------------------------------------------------------------------------
            // Se crea un objeto genérico con la intención de almacenar la información del seguro, y poder
            // manipular el mismo en cualquier parte del programa.
            //---------------------------------------------------------------------------------------------
            $this->objSeguGuia = new stdClass();
            $this->objSeguGuia->ExceMini = $blnExceMini;
            $this->objSeguGuia->ExceMaxi = $blnExceMaxi;
            $this->objSeguGuia->MensSegu = $strMensAdve;
        }
    }

    protected function chkEnviReto_Change() {
        $blnEnviReto = false;
        if ($this->chkEnviReto->Checked) {
            //----------------------------------------------------------------------
            // Si el Usuario marca el checkbox, se habilita el campo de descripción
            // de contenido e información del Envío Retorno.
            //----------------------------------------------------------------------
            $blnEnviReto = true;
        }
        $this->txtContReto->Enabled = $blnEnviReto;
    }

    protected function lstDestFrec_Change() {
        /**
         * @var $objDestFrec DestinatarioFrecuente
         */
        if ($this->lstDestFrec->SelectedValue) {
            //--------------------------------------------------------------
            // Se recorre el vector de Destinatarios Frecuentes del Cliente
            //--------------------------------------------------------------
            foreach ($this->arrDestFrec as $objDestFrec) {
                //-----------------------------------------------------------
                // Se localiza al Destinatario Frecuente correspondiente con
                // el Id seleccionado en la lista.
                //-----------------------------------------------------------
                if ($objDestFrec->Id == $this->lstDestFrec->SelectedValue) {
                    //--------------------------------------------------------------------
                    // Se llenan los campos del Destinatario con la información obtenida.
                    //--------------------------------------------------------------------
                    $this->txtNombDest->Text = limpiarCadena($objDestFrec->Nombre);
                    $this->txtDireDest->Text = limpiarCadena($objDestFrec->Direccion);
                    $this->txtTeleDest->Text = limpiarCadena($objDestFrec->Telefono);
                    $this->txtCeduDest->Text = limpiarCadena($objDestFrec->CedulaRif);
                    //------------------------------------------------------------------------------------
                    // Se carga el destino de la guia en funcion del destinatario frecuente seleccionado.
                    //------------------------------------------------------------------------------------
                    $this->lstSucuDest->RemoveAllItems();
                    if ($this->arrSucuActi) {
                        foreach ($this->arrSucuActi as $objSucuDest) {
                            $objListItem = new QListItem($objSucuDest->__toString(),$objSucuDest->CodiEsta);
                            if ($objDestFrec->DestinoId == $objSucuDest->CodiEsta) {
                                $objListItem->Selected = true;
                            }
                            $this->lstSucuDest->AddItem($objListItem);
                        }
                    }
                }
            }
            $this->lstSucuDest_Change();
        }
    }

    protected function lstReceDest_Change() {
        $this->txtDireDest->Text = 'AGENCIA LIBERTY EXPRESS '.
            $this->lstSucuDest->SelectedName.' ('.$this->lstReceDest->SelectedName.')';
    }

    protected function lstSucuDest_Change() {
        //$this->mensaje();
        $blnZonaNocu = false;
        if (!is_null($this->lstSucuDest->SelectedValue)) {
            //----------------------------------------------------------
            // Se inicializa la variable global responsable de imprimir
            // las Zonas No Cubiertas de la Sucursal Seleccionada.
            //----------------------------------------------------------
            $this->strZonaIncu = '';
            //--------------------------------------------------------------
            // Al cambiar el destino, se deben mostrar al usuario las Zonas
            // No cubiertas asociadas a dicho destino
            //--------------------------------------------------------------
            $arrZonaNocu = ZonaNoCubierta::LoadArrayByCodiEsta($this->lstSucuDest->SelectedValue);
            if (count($arrZonaNocu) > 0) {
                //------------------------------------------------
                // Se muestra el label quien recrea al botón ZNC.
                //------------------------------------------------
                $blnZonaNocu = true;
                //---------------------------------------------------------------------------------------------
                // Se itera el vector que contiene laz Zonas No Cubiertas de la Sucursal Destino seleccionada.
                //---------------------------------------------------------------------------------------------
                foreach ($arrZonaNocu as $objZonaNocu) {
                    if (strlen($this->strZonaIncu) > 0) {
                        $this->strZonaIncu .= ", ";
                    }
                    //--------------------------------------------------------------------------------
                    // Se agrega a la variable global responsable de imprimir las Zonas No Cubiertas,
                    // la Zona encontrada.
                    //--------------------------------------------------------------------------------
                    $this->strZonaIncu .= $objZonaNocu->Descripcion;
                }
                //-------------------------------------------------------------------------
                // Las siglas de la Sucursal Destino seleccionada en la lista, se asignan
                // a la variable global del programa, responsable de mostrar las mismas en
                // el botón de ZNC (Zonas No Cubiertas) para su referencia.
                //-------------------------------------------------------------------------
                $this->strCodiEsta = $this->lstSucuDest->SelectedValue;
                //--------------------------------------------------------------------------------------
                // Se invoca las funciones para recrear al botón ZNC y al Modal quien mostrará las ZNC.
                //--------------------------------------------------------------------------------------
                $this->lblBotoPopu->Text = $this->recrearBotonPopup();
                $this->lblPopuModa->Text = $this->recrearPopupModal();
                //----------------------------------------------------------------------------------------
                // Se notifica al usuario que existen Zonas referentes a la Sucursal Destino seleccionada
                // cuya ruta no cubre la agencia.
                //----------------------------------------------------------------------------------------
                $strMensUsua  = "Existen en <strong>".$this->lstSucuDest->SelectedName."</strong>, alguna Zonas que no Cubrimos,";
                $strMensUsua .= " presione el botón <strong>ZNC</strong> para mayores detalles";
                $this->mensaje($strMensUsua,'','w','',__iEXCL__);
            }
            //--------------------------------------------------------
            // Se cargan las receptorias de la Sucursal seleccionada
            //--------------------------------------------------------
            $this->lstReceDest->RemoveAllItems();
            $arrReceSucu = Counter::LoadArrayBySucursalId($this->lstSucuDest->SelectedValue);
            $intCantRece = count($arrReceSucu);
            if ($intCantRece == 1) {
                $objReceSucu = $arrReceSucu[0];
                $this->lstReceDest->AddItem($objReceSucu->__toString(),$objReceSucu->Id,true);
                $this->lstReceDest->Enabled = false;
                $this->lstReceDest->ForeColor = 'blue';
            } else {
                $this->lstReceDest->Enabled = true;
                $this->lstReceDest->ForeColor = null;
                $this->lstReceDest->AddItem('- Seleccione Uno - ('.$intCantRece.')');
                foreach ($arrReceSucu as $objReceSucu) {
                    $this->lstReceDest->AddItem($objReceSucu->__toString(),$objReceSucu->Id);
                }
            }
        }
        $this->lblBotoPopu->Visible = $blnZonaNocu;
        //if ($this->blnClieAgen) {
        if ($this->lstModaPago->SelectedValue == TipoGuiaType::CODCOBROENDESTINO) {
            $this->txtDireDest->Text = 'AGENCIA LIBERTY EXPRESS '.$this->lstSucuDest->SelectedName;
        }
    }

    protected function calFechReco_Change() {
        if (!is_null($this->calFechReco->DateTime)) {
            $this->dteFechReco = DspDespacho::LoadFechaRecolecta2(
                $this->strHoraTope, $this->calFechReco->DateTime->__toString("YYYY-MM-DD")
            );
        }
    }

    protected function btnSave_Click() {
        $this->btnSave->Enabled = false;
        $blnTodoOkey = true;
         t('Salvando la Guia en el CORP');
         t('===========================');
        //------------------------------------
        // Parámetros para Mensaje de Usuario
        //------------------------------------
        $strMensUsua = 'Transacción Exitosa';
        $strTipoMens = 's';
        $strSimbMens = __iCHEC__;
        //----------------------------------------
        // Parámetros para Mensaje de Información
        //----------------------------------------
        $strMensInfo = '';
        $strTipoInfo = 'i';
        $strSimbInfo = __iEXCL__;
        if (!$this->blnEditMode) {
            //--------------------------------------------------------------------------
            // Si se trata de una guia nueva, se asigna el consecutivo correspondiente
            //--------------------------------------------------------------------------
            $this->txtNumeGuia->Text = proxNroDeGuia();
        }
         t('Nro de Guia asignado');
        //---------------------------------------------
        // Se actualizan ahora los campos de la tabla
        //---------------------------------------------
        $this->chkSeguGuia_Change();
        $this->UpdateGuiaFields();
         t('Campos de la Guia, actualizados');
        //----------------------------------------------------------------------------------------
        // Si el Cliente ya posee una operación o ruta de recolecta, ésta se le asigna a la Guía,
        // de lo contrario se le asigna por defecto una ruta u operación genérica.
        //----------------------------------------------------------------------------------------
        $blnGrabReco = true;
        if ($blnGrabReco) {
            if ($this->objCliente->RutaRecolecta) {
                $this->objGuia->OperacionId = $this->objCliente->RutaRecolecta;
            } else {
                $arrOperacion = SdeOperacion::LoadArrayByCodiRuta('R9999');
                $this->objGuia->OperacionId = $arrOperacion[0]->CodiOper;
            }
        }
         t('Operacion asignada');
        //-----------------------------------------------------------------
        // Si la guía no tiene un Cliente asignado, entonces se le asigna.
        //-----------------------------------------------------------------
        if (is_null($this->objGuia->CodiClie)) {
            $this->objGuia->CodiClie = $this->objCliente->CodiClie;
        }
         t('Codigo del Cliente re-asignado');
        //--------------------------------------------------------------
        // Se salva la Guía con la data actualizada hasta los momentos.
        //--------------------------------------------------------------
        $this->objGuia->Save();
         t('Guia salvada');
        //-----------------------------------------------------------------------------------------
        // Si el Usuario marcó el registro como "Destinatario Frecuente", los datos proporcionados
        // deben salvarse en la tabla correspondiente.
        //-----------------------------------------------------------------------------------------
        if (($this->chkDestFrec->Checked) || (!is_null($this->lstDestFrec->SelectedValue))) {
            GrabarDestinatarioFrecuente($this->objGuia, $this->lstDestFrec->SelectedValue);
            $arrDestFrec = DestinatarioFrecuente::LoadArrayByClienteId(
                $this->objCliente->CodiClie,
                QQ::Clause(QQ::OrderBy(QQN::DestinatarioFrecuente()->Nombre))
            );
            $_SESSION['DestFrec'] = serialize($arrDestFrec);
        }
         t('Destinatario Frecuente, gestionado...');
        //--------------------------------------------------------------------
        // Si el Usuario especifico Guia Retorno, entonces se crea dicha Guia
        //--------------------------------------------------------------------
        if ($this->chkEnviReto->Checked && !$this->blnEditMode) {
            if (crearGuiaRetorno($this->objGuia)) {
                $strMensInfo .= 'Guía Retorno creada con éxito';
            } else {
                $strMensInfo .= 'Faltan Datos para crear la Guía Retorno';
                $strTipoInfo = 'd';
            }
        }
         t('Guia Retorno, gestionada...');
        //---------------------------------------------------------------------------------------------------
        // Se procede a buscar una Recolecta existente usando el código del Cliente y la Fecha de Recolecta.
        //---------------------------------------------------------------------------------------------------
        $blnGrabReco = false;
        if ($blnGrabReco) {
            $dteFechReco = DspDespacho::LoadFechaRecolecta($this->strHoraTope);
            $objRecoAnte = DspDespacho::BuscarRecolectaPorCodiClieYFechReco($this->objCliente,$dteFechReco);
            if (!$objRecoAnte) {
                //---------------------------------------------------------------------
                // Si no existe ninguna Guia con Recolecta asociada para el dia de hoy
                // se procede a crear la asociacion Guia-Recolecta
                //---------------------------------------------------------------------
                $objRecoGrab = $this->RegistrarRecolecta($this->objGuia);
                $blnTodoOkey = $objRecoGrab->TodoOkey;
                $dteFechReco = $objRecoGrab->FechReco;
                $intCodiDesp = $objRecoGrab->CodiDesp;
                if ($blnTodoOkey && !is_null($dteFechReco)) {
                    //-----------------------------------------------------
                    // Aqui se asocia la Guia a la Recolecta recien creada
                    //-----------------------------------------------------
                    $this->objGuia->RecolectaId = $intCodiDesp;
                    $this->objGuia->Save();
                } else {
                }
            } else {
                //--------------------------------------------------------------------------------------
                // Si la Recolecta ya existe, se verifica que la cantidad de piezas de la Recolecta,
                // coincida con la cantidad de piezas de la Guia
                //--------------------------------------------------------------------------------------
                $objRecoAnte->PesoEsti = floatval($objRecoAnte->PesoEsti) + floatval($this->objGuia->PesoGuia);
                $objRecoAnte->CantBult = $objRecoAnte->CantBult + $this->objGuia->CantPiez;
                $objRecoAnte->TextObse = $objRecoAnte->TextObse . " / " . $this->objGuia->DescCont;
                $objRecoAnte->Save();
            }
        }
        // t('Recolecta gestionada...');
        //---------------------------------------------------------------------------
        // Luego se graba un Checkpoint para la Guía recien ingresada en el Sistema.
        //---------------------------------------------------------------------------
        if (!$this->objGuia->tieneCheckpoint('NR')) {
            $strCodiRuta = '';
            $objCheckpoint = SdeCheckpoint::Load('NR');  // No Recibido
            $objOperacion = SdeOperacion::Load($this->objGuia->OperacionId);
            if ($objOperacion) {
                $strCodiRuta = $objOperacion->CodiRuta;
            }
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumeGuia'] = $this->objGuia->NumeGuia;
            $arrDatoCkpt['UltiCkpt'] = '';
            $arrDatoCkpt['GuiaAnul'] = SinoType::NO;
            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
            $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt;
            $arrDatoCkpt['CodiRuta'] = $strCodiRuta;
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            if (!$arrResuGrab['TodoOkey']) {
                $blnTodoOkey = false;
                $strMensUsua = 'La Guía ha sido guardada. Sin embargo, '.$arrResuGrab['MotiNook'];
                $strTipoMens = 'i';
                $strSimbMens = __iEXCL__;
            }
        }
        // t('Checkpoint NR, grabado...');
        if ($blnTodoOkey) {
            //----------------------------------------------------------------------------------------------------------
            // Si todos los datos estan en orden, entonces se muestra en pantalla el boton que permite imprimir la Guia.
            //----------------------------------------------------------------------------------------------------------
            $this->btnImprGuia->Visible = true;
            $this->btnBorrGuia->Visible = true;
            //---------------------------------------------------------------------------------------------------
            // Si el Usuario ha requerido el Seguro, y el Valor Decl. está por encima del Rango legal del mismo,
            // se le notifica que el Valor Decl. ha sido ajustado al Monto Máximo del Rango.
            //---------------------------------------------------------------------------------------------------
            /*
            if (($this->objSeguGuia) && ($this->objSeguGuia->ExceMaxi)) {
                $strMensUsua .= '. '.$this->objSeguGuia->MensSegu;
            }
            */
        }
        // t('Botones de impresion, visibles...');
        //-----------------------------------------------------------------------
        // Se muestra al Usuario la información del resultado de la transacción.
        //-----------------------------------------------------------------------
        $this->mensaje($strMensUsua,'',$strTipoMens,'',$strSimbMens);
        //-------------------------------------------------------------------------------------------------------
        // Si existe información adicional para mostrar, se expone a través del mensaje inferior del formulario.
        //-------------------------------------------------------------------------------------------------------
        if (strlen($strMensInfo) > 0) {
            $this->mensaje($strMensInfo,'n',$strTipoInfo,'',$strSimbInfo);
        }
        // t('Mensaje mostrado al Usuario...');
        $this->setupGuia($this->txtNumeGuia->Text);
        $this->setupValues();
        // t('Setups ejecutados...');
        $this->btnCreaNuev->Visible = true;
        $this->btnSave->Enabled = true;
    }

    protected function btnBorrGuia_Click() {
        BorrarGuia($this->txtNumeGuia->Text);
        QApplication::Redirect(__SIST__.'/guia_list_new.php');
    }

    protected function btnImprGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_pdf.php?strNumeGuia=' . $this->txtNumeGuia->Text);
    }

    protected function btnCreaNuev_Click() {
        QApplication::Redirect(__SIST__.'/cargar_guia.php');
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    //----------------------------
    // Otras acciones del Sistema
    //----------------------------


    protected function permitirCambios() {
        $blnGuarGuia = true;
        $strMensUsua = '';
        //--------------------------------------------------------------------------
        // Si el Cliente, el cual el Usuario se encuentra relacionado, se encuentra
        // inactivo, al mismo no se le permite crear guías.
        //--------------------------------------------------------------------------
        if ($this->objCliente->CodiStat == StatusType::INACTIVO) {
            $blnGuarGuia = false;
            $strMensUsua = 'Su Cuenta ha sido inactivada! No puede crear nuevas Guías!';
            $this->mensaje($strMensUsua,'','d','',__iEXCL__);
        }

        $this->btnSave->Visible = $blnGuarGuia;
        //$this->btnCreaNuev->Visible = $blnGuarGuia;

    }

    protected function habilitaRetorno() {
        $blnHabiReto = false;
        if ($this->blnEditMode) {
            $this->txtContReto->Text = $this->objGuia->Observacion;
            if ($this->chkEnviReto->Checked) {
                $blnHabiReto = true;
            }
        }
        $this->txtContReto->Enabled = $blnHabiReto;
    }

    protected function cargarDestinatario() {
        //----------------------------------------------------------------
        // Se cargan los destinatarios frecuentes uno por uno a la lista.
        //----------------------------------------------------------------
        if ($this->arrDestFrec) {
            $intCantRegi = count($this->arrDestFrec);
            $this->lstDestFrec->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantRegi.')'), null);
            foreach ($this->arrDestFrec as $objDestFrec) {
                $this->lstDestFrec->AddItem(limpiarCadena($objDestFrec->Nombre), $objDestFrec->Id);
            }
        }
    }

    protected function cargarOrigen($strCodiOrig = null) {
        $this->lstSucuOrig->RemoveAllItems();
        $this->lstSucuOrig->AddItem(QApplication::Translate('- Select One -'), null);
        if ($this->arrSucuActi) {
            //-----------------------------------------------------------------------------------
            // Se itera cada elemento del vector, y a su vez cada uno se va cargando a la lista.
            //-----------------------------------------------------------------------------------
            foreach ($this->arrSucuActi as $objSucuOrig) {
                $blnSeleItem = false;
                $objListItem = new QListItem($objSucuOrig->__toString(), $objSucuOrig->CodiEsta);
                //-----------------------------------------------------------------------------
                // Si $strCodiDest tiene valor, el programa se encuentra en modo de Edición
                //-----------------------------------------------------------------------------
                if (strlen($strCodiOrig) > 0) {
                    if (($this->objGuia->EstaOrigObject) &&
                        ($this->objGuia->EstaOrigObject->CodiEsta == $objSucuOrig->CodiEsta)) {
                        $blnSeleItem = true;
                    }
                } else {
                    if ($objSucuOrig->CodiEsta == $this->objUsuario->SucursalId) {
                        $blnSeleItem = true;
                    }
                }
                $objListItem->Selected = $blnSeleItem;
                $this->lstSucuOrig->AddItem($objListItem);
            }
        }
    }

    protected function cargarDestino($strCodiDest = null, $blnSucuCodx = false) {
        $this->lstSucuDest->RemoveAllItems();
        $objSinxDato = new stdClass();
        $objSinxDato->DescEsta = '- Seleccione Uno -';
        $objSinxDato->CodiEsta = null;
        $arrSucuProc = array($objSinxDato);
        if ($this->arrSucuActi) {
            t('El vector de sucursales, existe');
            $arrSucuProc = $this->arrSucuActi;
            if ($blnSucuCodx) {
                t('Existe una modalidad de pago seleccionada');
                if ($this->lstModaPago->SelectedValue == TipoGuiaType::CODCOBROENDESTINO) {
                    $arrSucuProc = $this->arrSucuZcod;
                    t('El vector de sucursales recien asignado contiene: '.count($arrSucuProc).' elementos');
                }
            }
        }
        $intCantRegi = count($arrSucuProc);
        $this->lstSucuDest->AddItem('- Seleccione Uno - ('.$intCantRegi.')', null);
        //-----------------------------------------------------------------------------------
        // Se itera cada elemento del vector, y a su vez cada uno se va cargando a la lista.
        //-----------------------------------------------------------------------------------
        foreach ($arrSucuProc as $objSucuDest) {
            $blnSeleItem = false;
            $objListItem = new QListItem($objSucuDest->DescEsta, $objSucuDest->CodiEsta);
            //-----------------------------------------------------------------------------
            // Si $strCodiDest tiene valor, el programa se encuentra en modo de Edición
            //-----------------------------------------------------------------------------
            if ($this->blnEditMode) {
                if ($this->objGuia->EstaDest == $objSucuDest->CodiEsta) {
                    $blnSeleItem = true;
                }
            }
            $objListItem->Selected = $blnSeleItem;
            $this->lstSucuDest->AddItem($objListItem);
        }
    }

    protected function cargarModalidadesDePago() {
        $this->lstModaPago->RemoveAllItems();
        $arrModaPago = TipoGuiaType::$NameArray;
        $intCantModa = $this->objCliente->PagoCrd + $this->objCliente->PagoPpd + $this->objCliente->PagoCod;
        t('El cliente tiene: '.$intCantModa.' modalidades de pago activas');
        foreach ($arrModaPago as $intId => $strValue) {
            if ($this->blnEditMode) {
                t('La guia existe y su tipo es: '.TipoGuiaType::ToString($this->objGuia->TipoGuia));
                $blnSeleRegi = $this->objGuia->TipoGuia == $intId;
            } else {
                $blnSeleRegi = $intCantModa == 1 ? true : false;
            }
            if ($this->objCliente->PagoCrd && ($strValue == 'CRD-CREDITO')) {
                $objListItem = new QListItem($strValue, $intId, $blnSeleRegi);
                $this->lstModaPago->AddItem($objListItem);
            }
            if ($this->objCliente->PagoPpd && ($strValue == 'PPD-PREPAGADA')) {
                $objListItem = new QListItem($strValue, $intId, $blnSeleRegi);
                $this->lstModaPago->AddItem($objListItem);
            }
            if ($this->objCliente->PagoCod && ($strValue == 'COD-COBRO EN DESTINO')) {
                //t('Aja, voy a seleccionar la opcion COD, registro seleccionado: '.$blnSeleRegi);
                $objListItem = new QListItem($strValue, $intId, $blnSeleRegi);
                $this->lstModaPago->AddItem($objListItem);
            }

        }
    }


    protected function UpdateGuiaFields() {
        if (strlen($this->txtValoDecl->Text) == 0) {
            $this->txtValoDecl->Text = 0;
        }
        $this->objGuia->NumeGuia           = $this->txtNumeGuia->Text;
        $this->objGuia->CodiClie           = $this->objCliente->CodiClie;
        $this->objGuia->FechGuia           = $this->calFechGuia->DateTime;
        $this->objGuia->EstaOrig           = $this->lstSucuOrig->SelectedValue;
        $this->objGuia->EstaDest           = $this->lstSucuDest->SelectedValue;
        $this->objGuia->PesoGuia           = $this->strPesoGuia;
        $this->objGuia->NombRemi           = limpiarCadena($this->txtNombRemi->Text);
        $this->objGuia->DireRemi           = substr(limpiarCadena($this->txtDireRemi->Text),0,200);
        $this->objGuia->TeleRemi           = DejarSoloLosNumeros($this->txtTeleRemi->Text);
        $this->objGuia->NombDest           = limpiarCadena($this->txtNombDest->Text);
        $this->objGuia->DireDest           = substr(limpiarCadena($this->txtDireDest->Text),0,200);
        $this->objGuia->CedulaDestinatario = DejarSoloLosNumeros($this->txtCeduDest->Text);
        $this->objGuia->TeleDest           = DejarSoloLosNumeros2($this->txtTeleDest->Text);
        $this->objGuia->CantPiez           = DejarSoloLosNumeros($this->txtCantPiez->Text);
        $this->objGuia->DescCont           = limpiarCadena($this->txtDescCont->Text);
        $this->objGuia->CodiProd           = $this->objProducto->CodiProd;
        $this->objGuia->TipoGuia           = $this->lstModaPago->SelectedValue;
        $this->objGuia->ValorDeclarado     = str_replace(',','.',$this->txtValoDecl->Text);
        $this->objGuia->Asegurado          = $this->chkSeguGuia->Checked;
        $this->objGuia->TieneGuiaRetorno   = $this->chkEnviReto->Checked;
        $this->objGuia->GuiaRetorno        = null;
        $this->objGuia->Observacion        = limpiarCadena($this->txtContReto->Text);
        $this->objGuia->TipoDocumentoId    = $this->lstCeduDest->SelectedValue;
        $this->objGuia->CedulaRif          = limpiarCadena($this->txtCeduDest->Text);
        $this->objGuia->CobroCod           = null;
        $this->objGuia->VendedorId         = $this->objCliente->VendedorId;
        if (!$this->blnEditMode) {
            //------------------------------------------------------------------------
            // En caso de Insercion, se asignan valores por defecto ciertos campos
            //------------------------------------------------------------------------
            $this->objGuia->PorcentajeIva      = 0;
            $this->objGuia->MontoIva           = 0;
            $this->objGuia->PorcentajeSeguro   = 0;
            $this->objGuia->MontoSeguro        = 0;
            $this->objGuia->MontoBase          = 0;
            $this->objGuia->MontoFranqueo      = 0;
            $this->objGuia->MontoOtros         = 0;
            $this->objGuia->MontoTotal         = 0;
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
            $this->objGuia->CierreCaja         = 0;
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
            $this->objGuia->UsuarioCreacion    = $this->objUsuario->LogiUsua;
            $this->objGuia->FechaCreacion      = new QDateTime(QDateTime::Now);
            $this->objGuia->HoraCreacion       = date("H:i");
            $this->objGuia->SistemaId          = 'con';
            $this->objGuia->Anulada            = 0;
            $this->objGuia->EnEfectivo         = 0;
            $this->objGuia->TarifaId           = $this->objCliente->TarifaId;
        }
    }

    protected function CreateAndSaveRecolecta($intCodiOper,$strCodiCkpt,$strContGuia,$intCodiUsua,$strMotiNoco,$dteFechReco) {
        $objDespacho = new DspDespacho();

        $objDespacho->CodiClie = $this->objCliente->CodiClie;
        $objDespacho->CodiOrig = $this->objUsuario->SucursalId;
        $objDespacho->CodiDest = $this->lstSucuDest->SelectedValue;
        $objDespacho->CodiOper = $intCodiOper;
        $objDespacho->NombClie = $this->objCliente->NombClie;
        $objDespacho->DireClie = $this->txtDireRemi->Text;
        $objDespacho->TeleClie = DejarSoloLosNumeros($this->txtTeleRemi->Text);
        $objDespacho->FechRegi = new QDateTime(QDateTime::Now);
        $objDespacho->TipoReco = DspTiporecoType::CONNECT;
        $objDespacho->CodiCkpt = $strCodiCkpt;
        $objDespacho->FechReco = new QDateTime($dteFechReco);
        $objDespacho->HoraList = $this->strHoraTope;
        $objDespacho->HoraDesp = '';
        $objDespacho->HoraEfec = '';
        $objDespacho->HoraCier = '17:00';
        $objDespacho->NombPers = $this->txtNombRemi->Text;
        $objDespacho->TextObse = $strContGuia;
        $objDespacho->FechModi = null;
        $objDespacho->CodiUsua = $intCodiUsua;
        $objDespacho->UsuaModi = null;
        $objDespacho->MotiNoco = $strMotiNoco;
        $objDespacho->PesoEsti = $this->strPesoGuia;
        $objDespacho->CantBult = $this->txtCantPiez->Text;
        $objDespacho->DireMail = $this->objUsuario->Email;
        $objDespacho->NombDest = $this->txtNombDest->Text;
        $objDespacho->TeleDest = DejarSoloLosNumeros2($this->txtTeleDest->Text);
        $objDespacho->DireDest = $this->txtDireDest->Text;
        $objDespacho->ContEnvi = $this->txtDescCont->Text;
        $objDespacho->NotiNoco = 0;

        $objDespacho->Save();

        return $objDespacho;
    }

    protected function RegistrarRecolecta($objGuia) {
        $blnTodoOkey = true;
        $strMensUsua = '';
        $intCodiDesp = 0;
        $dteFechReco = null;
        //------------------------------------------------------------------------
        // Se identifica la Operacion Ficticia asociada a la Sucursal del Usuario
        //------------------------------------------------------------------------
        $objOperSucu = SdeOperacion::OperaciónFictAsociadaASucursalUsuario($this->objUsuario->Sucursal->OperacionId);
        if ($objOperSucu) {
            //--------------------------------------------------------
            // Usuario generico usado para registrar la Recolecta
            //--------------------------------------------------------
            $objUsuaReco = Usuario::LoadByLogiUsua('dispatch');
            //------------------------------------------
            // Checkpoint: Recolecta por Asignar (PA)
            //------------------------------------------
            $objCheckpoint = SdeCheckpoint::LoadByCodiCkpt('PA');
            //-------------------------------------------
            // Motivo de No-Completacion o Realizacion
            //-------------------------------------------
            $objMotivo = DspMotivoNoco::Load('SM');
            //-------------------------------------
            // Se obtiene la fecha de la recolecta
            //-------------------------------------
            $dteFechReco = DspDespacho::LoadFechaRecolecta($this->strHoraTope);
            //---------------------------------------
            // Creo, registro y obtengo la Recolecta
            //---------------------------------------
            $objDespacho = $this->CreateAndSaveRecolecta(
                $objOperSucu->CodiOper,$objCheckpoint->CodiCkpt, $objGuia->DescCont,
                $objUsuaReco->CodiUsua, $objMotivo->MotiNoco, $dteFechReco
            );
            //----------------------------------------
            // Obtengo el código (Id) de la Recolecta
            //----------------------------------------
            $intCodiDesp = $objDespacho->CodiDesp;
        } else {
            $blnTodoOkey = false;
            $strMensUsua = 'No se generó la solicitud de Recolecta para su Envío.';
        }
        //---------------------------------------------------------------------
        // Creo una Clase Genérica para almacenar la información de la rutina.
        //---------------------------------------------------------------------
        $objRecoGuia = new stdClass();
        $objRecoGuia->TodoOkey = $blnTodoOkey;
        $objRecoGuia->MensUsua = $strMensUsua;
        $objRecoGuia->FechReco = $dteFechReco;
        $objRecoGuia->CodiDesp = $intCodiDesp;
        return $objRecoGuia;
    }
}

CargarGuia::Run('CargarGuia');
