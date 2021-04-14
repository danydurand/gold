<?php
//-----------------------------------------------------------------------------
// Programa       : cargar_guia.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 02/03/17 11:39 AM
// Proyecto       : newliberty
// Descripcion    : Este programa permite al Usuario crear una guía Nacional
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class CargarGuia extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros Regulares
    //-----------------------
    protected $objGuia;
    protected $objCliente;
    protected $objProducto;
    protected $objGuiaSode;
    protected $objGuiaOrig;
    protected $objOperFict;
    protected $blnEditMode;
    protected $blnGuiaSode;
    protected $blnComaAlow;
    protected $blnPesoNook;
    protected $decPesoInic;
    protected $decValoDecl;
    protected $decValoMini;
    protected $decValoMaxi;
    protected $decPorcIvax;
    protected $decPorcSegu;
    protected $intCantLimi;
    protected $dteFechDhoy;
    protected $arrValoMini;
    protected $arrValoMaxi;
    protected $strIdenTabl;
    //-----------------------------------
    // Campos izquierdos del Formulario
    //-----------------------------------
    protected $txtNumeGuia;
    protected $lblFechGuia;
    protected $txtCodiInte;
    protected $txtNombBusc;
    protected $lstCodiClie;
    protected $txtNombRemi;
    protected $txtTeleRemi;
    protected $txtDireRemi;
    protected $lstCodiOrig;
    protected $lstCodiDest;
    protected $txtCantPiez;
    protected $txtPesoGuia;
    protected $txtValoDecl;
    protected $chkEnviSegu;
    protected $chkEnviReto;
    protected $txtGuiaReto;
    protected $chkGuiaInte;
    protected $txtGuiaInte;
    protected $chkPesoVolu;
    protected $lblUsuaCrea;
    protected $lblFechCrea;
    protected $lblHoraCrea;
    //---------------------------------
    // Campos derechos del Formulario
    //---------------------------------
    protected $txtDescCont;
    protected $txtCodiInt2;
    protected $txtNombBus2;
    protected $lstDestFrec;
    protected $txtNombDest;
    protected $txtTeleDest;
    protected $txtDireDest;
    protected $txtTextObse;
    protected $chkDestFrec;
    protected $chkConsDcto;
    protected $txtMontBase;
    protected $txtPorcDcto;
    protected $txtMontDcto;
    protected $txtMontIvax;
    protected $txtMontFran;
    protected $txtMontSegu;
    protected $chkFletDire;
    protected $lstModaPago;
    protected $txtMontTota;
    protected $intCantPara;
    protected $lstVehiSuge;
    //-------------------------
    // Botones del Formulario
    //-------------------------
    protected $btnCalcTari;
    protected $btnIntercam;
    protected $btnImprGuia;
    protected $btnNuevRegi;

    protected $btnImprPodx;
    protected $btnImprEtiq;

    protected function SetupGuia() {
        $this->txtNumeGuia->SetFocus();
        $this->blnEditMode = false;
        $strNumeGuia = QApplication::PathInfo(0);
        if ($strNumeGuia) {
            $this->txtNumeGuia->Text = $strNumeGuia;
            $this->txtNumeGuia_Blur();
        }
    }

    protected function SetupValues() {
        //-----------------------------------------
        // Se identifica la Operacion Ficticia
        //-----------------------------------------
        $arrOperFict = SdeOperacion::LoadArrayByCodiRuta('R9999',QQ::Clause(QQ::LimitInfo(1)));
        $this->objOperFict = $arrOperFict[0];

        $this->dteFechDhoy = FechaDeHoy();
        $this->decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA',$this->dteFechDhoy);
        //$this->decPorcSegu = FacImpuesto::LoadImpuestoVigente('SGRO',$this->dteFechDhoy);

        if ($this->blnEditMode) {
            //-------------------------------------------------------------------------------------
            // Si la Guia que se esta editando, tiene la tarifa nueva (con reconversion monteria)
            // entonces los valores limites de Valor Declarado, deben esta reconvertidos
            //-------------------------------------------------------------------------------------
            /**
             * @var $objConfReco Parametro
             */
            $objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
            if ($this->objGuia->TarifaId >= (int)$objConfReco->ParaVal3) {
                $this->arrValoMini = unserialize($_SESSION['RecoMin1']);
                $this->arrValoMaxi = unserialize($_SESSION['RecoMax1']);
                $this->intCantLimi = count($this->arrValoMaxi)-1;
                $this->decValoMini = $this->arrValoMini[0];
                $this->decValoMaxi = $this->arrValoMaxi[$this->intCantLimi];
            } else {
                $this->arrValoMini = unserialize($_SESSION['ValoMin1']);
                $this->arrValoMaxi = unserialize($_SESSION['ValoMax1']);
                $this->intCantLimi = count($this->arrValoMaxi)-1;
                $this->decValoMini = $this->arrValoMini[0];
                $this->decValoMaxi = $this->arrValoMaxi[$this->intCantLimi];
            }
        } else {
            $this->arrValoMini = unserialize($_SESSION['RecoMin1']);
            $this->arrValoMaxi = unserialize($_SESSION['RecoMax1']);
            $this->intCantLimi = count($this->arrValoMaxi)-1;
            $this->decValoMini = $this->arrValoMini[0];
            $this->decValoMaxi = $this->arrValoMaxi[$this->intCantLimi];
        }

        if ($this->txtPesoGuia->Text <= 2) {
            $this->objProducto = FacProducto::LoadBySiglProd('DOC');
        } else {
            $this->objProducto = FacProducto::LoadBySiglProd('APX');
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Cargar Guía');
        $this->objDefaultWaitIcon = new QWaitIcon($this);

        //-----------------------------------
        // Campos izquierdos del Formulario
        //-----------------------------------
        $this->txtNumeGuia_Create();
        $this->lblFechGuia_Create();
        $this->txtCodiInte_Create();
        $this->txtNombBusc_Create();
        $this->lstCodiClie_Create();
        $this->txtNombRemi_Create();
        $this->txtTeleRemi_Create();
        $this->txtDireRemi_Create();
        $this->lstCodiOrig_Create();
        $this->lstCodiDest_Create();
        $this->txtCantPiez_Create();
        $this->txtPesoGuia_Create();
        $this->txtValoDecl_Create();
        $this->chkEnviSegu_Create();
        $this->chkEnviReto_Create();
        $this->txtGuiaReto_Create();
        $this->chkGuiaInte_Create();
        $this->txtGuiaInte_Create();
        $this->chkPesoVolu_Create();
        $this->lblUsuaCrea_Create();
        $this->lblFechCrea_Create();
        $this->lblHoraCrea_Create();
        //---------------------------------
        // Campos derechos del Formulario
        //---------------------------------
        $this->txtDescCont_Create();
        $this->txtCodiInt2_Create();
        $this->txtNombBus2_Create();
        $this->lstDestFrec_Create();
        $this->txtNombDest_Create();
        $this->txtTeleDest_Create();
        $this->txtDireDest_Create();
        $this->txtTextObse_Create();
        $this->chkDestFrec_Create();
        $this->chkConsDcto_Create();
        $this->txtMontBase_Create();
        $this->txtPorcDcto_Create();
        $this->txtMontDcto_Create();
        $this->txtMontIvax_Create();
        $this->txtMontFran_Create();
        $this->txtMontSegu_Create();
        $this->chkFletDire_Create();
        $this->lstModaPago_Create();
        $this->txtMontTota_Create();
        $this->lstVehiSuge_Create();
        //------------------
        // Botónes y otros
        //------------------
        $this->btnSave->Text = TextoIcono('cogs fa-lg','Guardar');
        $this->btnCalcTari_Create();
        $this->btnImprGuia_Create();
        $this->btnIntercam_Create();
        $this->btnNuevRegi_Create();
        $this->btnImprPodx_Create();
        $this->btnImprEtiq_Create();
        //---------------------
        // Acciones regulares
        //---------------------
        $this->SetupGuia();
        $this->SetupValues();

        $strTextMens = 'Evite el uso de caracteres especiales (Ej: \\~°#^*+) en <b>los nombres, las direcciones, el contenido, los teléfono y la observación</b>';
        $this->mensaje($strTextMens,'m','w','',__iINFO__);

        //-----------
        // Permisos
        //-----------
        $this->permisosDeDescuentos();

    }

    protected function permisosDeDescuentos() {
        //------------------------------------------------------------------------------
        // Unicamente los Usuario autorizados tendran acceso a los campos de descuento
        //------------------------------------------------------------------------------
        $this->txtPorcDcto->Enabled = false;
        $this->chkConsDcto->Enabled = false;
        $this->txtPorcDcto->ForeColor = 'blue';
        $this->chkConsDcto->ForeColor = 'blue';
        $blnUsuaAuto = BuscarParametro("DctoClie", $this->objUsuario->LogiUsua, "Val1", 0);
        if ($blnUsuaAuto) {
            $this->txtPorcDcto->Enabled = true;
            $this->chkConsDcto->Enabled = true;
            $this->txtPorcDcto->ForeColor = null;
            $this->chkConsDcto->ForeColor = null;
        }
    }

    //----------------------------
    // Aquí se crean los objetos
    //----------------------------

    // --- Lado Izquierdo del Formulario ---

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Width = 160;
        $this->txtNumeGuia->AddAction(new QBlurEvent(), new QServerAction('txtNumeGuia_Blur'));
    }

    protected function lblFechGuia_Create() {
        $this->lblFechGuia = new QLabel($this);
        $this->lblFechGuia->Width = 120;
        $this->lblFechGuia->Enabled = false;
    }

    protected function txtCodiInte_Create() {
        $this->txtCodiInte = new QTextBox($this);
        $this->txtCodiInte->Width = 110;
        $this->txtCodiInte->AddAction(new QBlurEvent(), new QServerAction('txtCodiInte_Blur'));
    }

    protected function txtNombBusc_Create() {
        $this->txtNombBusc = new QTextBox($this);
        $this->txtNombBusc->Width = 110;
        $this->txtNombBusc->AddAction(new QBlurEvent(), new QAjaxAction('txtNombBusc_Blur'));
    }

    protected function lstCodiClie_Create() {
        $this->lstCodiClie = new QListBox($this);
        $this->lstCodiClie->Width = 200;
        $this->lstCodiClie->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiClie_Change'));
    }

    protected function txtNombRemi_Create() {
        $this->txtNombRemi = new QTextBox($this);
        $this->txtNombRemi->Width = 250;
        $this->txtNombRemi->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtTeleRemi_Create() {
        $this->txtTeleRemi = new QTextBox($this);
        $this->txtTeleRemi->Width = 200;
    }

    protected function txtDireRemi_Create() {
        $this->txtDireRemi = new QTextBox($this);
        $this->txtDireRemi->Width = 485;
        $this->txtDireRemi->TextMode = QTextMode::MultiLine;
        $this->txtDireRemi->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function lstCodiOrig_Create() {
        $this->lstCodiOrig = new QListBox($this);
        $this->lstCodiOrig->Width = 200;
        $this->CargarOrigenes();
    }

    protected function lstCodiDest_Create() {
        $this->lstCodiDest = new QListBox($this);
        $this->lstCodiDest->Width = 200;
        $this->lstCodiDest->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->CargarDestinos();
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QIntegerTextBox($this);
        $this->txtCantPiez->Width = 50;
    }

    protected function txtPesoGuia_Create() {
        $this->txtPesoGuia = new QFloatTextBox($this);
        $this->txtPesoGuia->Width = 60;
        $this->txtPesoGuia->Enabled = true;
        $this->txtPesoGuia->HtmlAfter = ' Kg';
    }

    protected function txtValoDecl_Create() {
        $this->txtValoDecl = new QTextBox($this);
        $this->txtValoDecl->Width = 80;
        $this->txtValoDecl->Text = 0;
        $this->txtValoDecl->HtmlAfter = ' Bs';
    }

    protected function chkEnviSegu_Create() {
        $this->chkEnviSegu = new QCheckBox($this);
        $this->chkEnviSegu->ActionParameter = "SEGURO";
        $this->chkEnviSegu->AddAction(new QChangeEvent(), new QAjaxAction('chkEnviSegu_Change'));
    }

    protected function chkEnviReto_Create() {
        $this->chkEnviReto = new QCheckBox($this);
        $this->chkEnviReto->AddAction(new QChangeEvent(), new QAjaxAction('chkEnviReto_Change'));
    }

    protected function txtGuiaReto_Create() {
        $this->txtGuiaReto = new QTextBox($this);
        $this->txtGuiaReto->Width = 90;
        $this->txtGuiaReto->Enabled = false;
        $this->txtGuiaReto->ForeColor = 'blue';
    }

    protected function chkGuiaInte_Create() {
        $this->chkGuiaInte = new QCheckBox($this);
        $this->chkGuiaInte->AddAction(new QChangeEvent(), new QAjaxAction('chkGuiaInte_Change'));
    }

    protected function txtGuiaInte_Create() {
        $this->txtGuiaInte = new QTextBox($this);
        $this->txtGuiaInte->Width = 180;
        $this->txtGuiaInte->Enabled = false;
        $this->txtGuiaInte->ForeColor = 'blue';
    }

    protected function chkPesoVolu_Create() {
        $this->chkPesoVolu = new QCheckBox($this);
        $this->chkPesoVolu->AddAction(new QChangeEvent(), new QAjaxAction('chkPesoVolu_Change'));
    }

    protected function lblUsuaCrea_Create() {
        $this->lblUsuaCrea = new QLabel($this);
        $this->lblUsuaCrea->Text = $this->objUsuario->LogiUsua;
        $this->lblUsuaCrea->Width = 90;
        $this->lblUsuaCrea->Enabled = false;
    }

    protected function lblFechCrea_Create() {
        $this->lblFechCrea = new QLabel($this);
        $this->lblFechCrea->Width = 100;
        $this->lblFechCrea->Text = date('Y-m-d');
        $this->lblFechCrea->Enabled = false;
    }

    protected function lblHoraCrea_Create() {
        $this->lblHoraCrea = new QLabel($this);
        $this->lblHoraCrea->Width = 50;
        $this->lblHoraCrea->Text = date('H:i');
        $this->lblHoraCrea->Enabled = false;
    }

    // --- Lado Derecho del Formulario ---

    protected function txtDescCont_Create() {
        $this->txtDescCont = new QTextBox($this);
        $this->txtDescCont->Width = 530;
        $this->txtDescCont->TextMode = QTextMode::MultiLine;
        $this->txtDescCont->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtCodiInt2_Create() {
        $this->txtCodiInt2 = new QTextBox($this);
        $this->txtCodiInt2->Width = 110;
        $this->txtCodiInt2->AddAction(new QBlurEvent(), new QAjaxAction('txtCodiInt2_Blur'));
    }

    protected function txtNombBus2_Create() {
        $this->txtNombBus2 = new QTextBox($this);
        $this->txtNombBus2->Name = QApplication::Translate('Buscar por Nombre');
        $this->txtNombBus2->Width = 110;
        $this->txtNombBus2->AddAction(new QBlurEvent(), new QAjaxAction('txtNombBus2_Blur'));
    }

    protected function lstDestFrec_Create() {
        $this->lstDestFrec = new QListBox($this);
        $this->lstDestFrec->Name = QApplication::Translate('Destinatarios Frecuentes');
        $this->lstDestFrec->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstDestFrec->AddAction(new QChangeEvent(), new QAjaxAction('lstDestFrec_Change'));
        $this->lstDestFrec->Width = 245;
    }

    protected function txtNombDest_Create() {
        $this->txtNombDest = new QTextBox($this);
        $this->txtNombDest->Width = 300;
        $this->txtNombDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtTeleDest_Create() {
        $this->txtTeleDest = new QTextBox($this);
        $this->txtTeleDest->Width = 200;
    }

    protected function txtDireDest_Create() {
        $this->txtDireDest = new QTextBox($this);
        $this->txtDireDest->Width = 530;
        $this->txtDireDest->TextMode = QTextMode::MultiLine;
        $this->txtDireDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtTextObse_Create() {
        $this->txtTextObse = new QTextBox($this);
        $this->txtTextObse->Width = 350;
        $this->txtTextObse->TextMode = QTextMode::MultiLine;
        $this->txtTextObse->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function chkDestFrec_Create() {
        $this->chkDestFrec = new QCheckBox($this);
    }

    protected function chkConsDcto_Create() {
        $this->chkConsDcto = new QCheckBox($this);
        $this->chkConsDcto->ToolTip = '¿Considerar este Dscto en la estadísticas mensuales del Cliente?';
    }

    protected function txtMontBase_Create() {
        $this->txtMontBase = new QTextBox($this);
        $this->txtMontBase->Width = 90;
        $this->txtMontBase->Enabled = false;
        $this->txtMontBase->ForeColor = 'blue';
    }

    protected function txtPorcDcto_Create() {
        $this->txtPorcDcto = new QFloatTextBox($this);
        $this->txtPorcDcto->Width = 50;
    }

    protected function txtMontDcto_Create() {
        $this->txtMontDcto = new QTextBox($this);
        $this->txtMontDcto->Width = 80;
        $this->txtMontDcto->Enabled = false;
        $this->txtMontDcto->ForeColor = 'blue';
    }

    protected function txtMontIvax_Create() {
        $this->txtMontIvax = new QTextBox($this);
        $this->txtMontIvax->Width = 80;
        $this->txtMontIvax->Enabled = false;
        $this->txtMontIvax->ForeColor = 'blue';
    }

    protected function txtMontFran_Create() {
        $this->txtMontFran = new QTextBox($this);
        $this->txtMontFran->Width = 70;
        $this->txtMontFran->Enabled = false;
        $this->txtMontFran->ForeColor = 'blue';
    }

    protected function txtMontSegu_Create() {
        $this->txtMontSegu = new QTextBox($this);
        $this->txtMontSegu->Width = 60;
        $this->txtMontSegu->Enabled = false;
        $this->txtMontSegu->ForeColor = 'blue';
    }

    protected function chkFletDire_Create() {
        $this->chkFletDire = new QCheckBox($this);
        $this->chkFletDire->AddAction(new QChangeEvent(), new QAjaxAction('chkFletDire_Change'));
    }

    protected function lstModaPago_Create() {
        $this->lstModaPago = new QListBox($this);
        $this->CargarModalidadesDePago();
    }

    protected function txtMontTota_Create() {
        $this->txtMontTota = new QTextBox($this);
        $this->txtMontTota->Width = 70;
        $this->txtMontTota->Enabled = false;
        $this->txtMontTota->ForeColor = 'blue';
        $this->txtMontTota->AddAction(new QBlurEvent(), new QAjaxAction('txtMontTota_Blur'));
    }

    protected function lstVehiSuge_Create() {
        $this->lstVehiSuge = new QListBox($this);
        $this->CargarVehiculos();
        $this->lstVehiSuge->Enabled = false;
        $this->lstVehiSuge->ForeColor = 'blue';
        $this->lstVehiSuge->Width = 125;
        $this->lstVehiSuge->AddAction(new QChangeEvent(), new QAjaxAction('lstVehiSuge_Change'));
    }

    //--- Botones ---

    protected function btnCalcTari_Create() {
        $this->btnCalcTari = new QButtonP($this);
        $this->btnCalcTari->Text = TextoIcono('eye fa-lg','Cotizar');
        $this->btnCalcTari->AddAction(new QClickEvent(), new QAjaxAction('btnCalcTari_Click'));
    }

    protected function btnImprPodx_Create() {
        $this->btnImprPodx = new QButtonI($this);
        $this->btnImprPodx->Text = TextoIcono('print fa-fw','Guia');
        $this->btnImprPodx->AddAction(new QClickEvent(), new QServerAction('btnImprPodx_Click'));
        $this->btnImprPodx->Visible = $this->blnEditMode;
    }

    protected function btnImprEtiq_Create() {
        $this->btnImprEtiq = new QButtonI($this);
        $this->btnImprEtiq->Text = TextoIcono('print fa-fw','Etiq.');
        $this->btnImprEtiq->AddAction(new QClickEvent(), new QServerAction('btnImprEtiq_Click'));
        $this->btnImprEtiq->Visible = $this->blnEditMode;
    }

    protected function btnImprPodx_Click() {
        $_SESSION['Dato'] = serialize(array($this->objGuia->NumeGuia));
        QApplication::Redirect(__SIST__.'/guia_pdf_lote.php');
    }

    protected function btnImprEtiq_Click() {
        QApplication::Redirect(__SIST__.'/etiqueta_pdf.php?strNumeGuia='.$this->txtNumeGuia->Text);
    }

    protected function btnImprGuia_Create() {
        $this->btnImprGuia = new QLabel($this);
        $this->btnImprGuia->HtmlEntities = false;
        $this->btnImprGuia->CssClass = '';

        $strUrlxGuia = '/guia_pdf.php?strNumeGuia='.$this->txtNumeGuia->Text;

        if ($this->blnEditMode && $this->objGuia->SistemaId == 'int') {
            $_SESSION['Dato'] = serialize(array($this->objGuia->NumeGuia));
            $strUrlxGuia = '/guia_pdf_lote.php';
        }

        $strUrlxEtiq = $this->blnEditMode && $this->objGuia->SistemaId == 'int' ? '/etiqueta_int_pdf.php?strNumeGuia='.$this->txtNumeGuia->Text : '/etiqueta_pdf.php?strNumeGuia='.$this->txtNumeGuia->Text;

        $strTextBoto   = TextoIcono('print fa-fw','Imprimir');
        $arrOpciDrop   = array();
        $arrOpciDrop[] = OpcionDropDown(__SIST__.$strUrlxGuia,TextoIcono('file-text','Guia'));
        $arrOpciDrop[] = OpcionDropDown(__SIST__.$strUrlxEtiq,TextoIcono('tag','Etiqueta'));

        $this->btnImprGuia->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop,'i');

        $this->btnImprGuia->Visible = $this->blnEditMode;
    }

    protected function btnIntercam_Create() {
        $this->btnIntercam = new QButtonL($this);
        $this->btnIntercam->Text = TextoIcono('exchange fa-lg','Intercam.');
        $this->btnIntercam->ToolTip = 'Intercambiar Remitente y Destinatario';
        $this->btnIntercam->AddAction(new QClickEvent(), new QAjaxAction('btnIntercam_Click'));
    }

    protected function btnNuevRegi_Create() {
        $this->btnNuevRegi = new QButtonP($this);
        $this->btnNuevRegi->Text = TextoIcono('plus fa-lg','Crear');
        $this->btnNuevRegi->ToolTip = 'Crear una Nueva Guia';
        $this->btnNuevRegi->AddAction(new QClickEvent(), new QServerAction('btnNuevRegi_Click'));
        $this->btnNuevRegi->Visible = false;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnIntercam_Click() {
        $strNombAuxi = $this->txtNombDest->Text;
        $strDireAuxi = $this->txtDireDest->Text;
        $strTeleAuxi = $this->txtTeleDest->Text;

        $this->txtNombDest->Text = $this->txtNombRemi->Text;
        $this->txtDireDest->Text = $this->txtDireRemi->Text;
        $this->txtTeleDest->Text = $this->txtTeleRemi->Text;

        $this->txtNombRemi->Text = $strNombAuxi;
        $this->txtDireRemi->Text = $strDireAuxi;
        $this->txtTeleRemi->Text = $strTeleAuxi;
    }

    protected function CargarOrigenes() {
        foreach (Estacion::LoadArrayByCodiStat(1) as $objSucursal) {
            if (!$this->blnEditMode) {
                $this->lstCodiOrig->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta,$objSucursal->CodiEsta == $this->objUsuario->CodiEsta);
            } else {
                $this->lstCodiOrig->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta,$objSucursal->CodiEsta == $this->objGuia->EstaOrig);
            }
        }
    }

    protected function CargarDestinos() {
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
        foreach (Estacion::LoadArrayByCodiStat(1,$objClauOrde) as $objSucursal) {
            if ($objSucursal->EsUnAlmacen == SinoType::NO) {
                if (!$this->blnEditMode) {
                    $this->lstCodiDest->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
                } else {
                    $this->lstCodiDest->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta,$objSucursal->CodiEsta == $this->objGuia->EstaDest);
                }
            }
        }
    }

    protected function CargarVehiculos() {
        $this->lstVehiSuge->RemoveAllItems();
        $this->lstVehiSuge->AddItem(QApplication::Translate('- Selec. Uno -'),null);
        foreach (TipoVehiculo::LoadAll() as $objTipoVehi) {
            if (!$this->blnEditMode) {
                $this->lstVehiSuge->AddItem($objTipoVehi->__toString(), $objTipoVehi);
            } else {
                $this->lstVehiSuge->AddItem($objTipoVehi->__toString(), $objTipoVehi);
            }
        }
    }

    protected function MostrarDatosCliente() {
        if ($this->objCliente) {
            $this->txtNombRemi->Text = limpiarCadena($this->objCliente->NombClie);
            $this->txtDireRemi->Text = limpiarCadena($this->objCliente->DireReco);
            $this->txtTeleRemi->Text = limpiarCadena($this->objCliente->TeleCona);
            //------------------------------------------------------------------------
            // La modalidad de pago del envio debe ser acorde con el tipo de Cliente
            //------------------------------------------------------------------------
            $this->CargarModalidadesDePago();
        }
    }

    protected function BlanquearCamposCliente() {
        $this->txtNombRemi->Text = '';
        $this->txtDireRemi->Text = '';
        $this->txtTeleRemi->Text = '';
    }

    protected function BlanquearCamposDestinatario() {
        $this->txtNombDest->Text = '';
        $this->txtDireDest->Text = '';
        $this->txtTeleDest->Text = '';
    }

    protected function CargarModalidadesDePago() {
        $this->lstModaPago->RemoveAllItems();
        $this->lstModaPago->ForeColor = 'black';
        $blnTodoOkey = true;
        //-------------------------------------------------------------------------------------------------------------
        // Se obtienen los nombres de las modalidades de Pago con su Id correspondiente, y se van iterando uno por uno
        //-------------------------------------------------------------------------------------------------------------
        $arrModaPago = TipoGuiaType::$NameArrayCorto;
        foreach ($arrModaPago as $intId => $strValue) {
            $objListItem = null;
            if ($this->blnEditMode) {
                //-----------------------------------------------------------------------------------------------
                // Si la guía se encuentra en modo de edición, entonces se carga la Modalidad y se selecciona de
                // manera automática si corresponde a la que contiene asignada la Guía.
                //-----------------------------------------------------------------------------------------------
                $objListItem = new QListItem($strValue, $intId, $this->objGuia->TipoGuia == $intId);
                $this->lstModaPago->AddItem($objListItem);
            } else {
                if ($this->objCliente) {
                    if ($this->objCliente->PagoCrd && (!$this->objCliente->PagoPpd && !$this->objCliente->PagoCod )) {
                        //-----------------------------------------------------------------
                        // El Cliente actual, solamente tiene autorizado CRD como modo
                        // de pago, se le habilita únicamente dicho modo.
                        //-----------------------------------------------------------------
                        if ($intId == 2) {
                            $objListItem = new QListItem($strValue, $intId, true);
                            $this->lstModaPago->AddItem($objListItem);
                        }
                    } elseif ($this->objCliente->PagoPpd && (!$this->objCliente->PagoCrd && !$this->objCliente->PagoCod )) {
                        //---------------------------------------------------------------
                        // El Cliente actual el cual solamente tiene autorizado
                        // PPD como modo de pago, se le habilita únicamente dicho modo.
                        //---------------------------------------------------------------
                        if ($intId == 1) {
                            $objListItem = new QListItem($strValue, $intId, true);
                            $this->lstModaPago->AddItem($objListItem);
                        }
                    } elseif ($this->objCliente->PagoCod && (!$this->objCliente->PagoPpd && !$this->objCliente->PagoCrd )) {
                        //--------------------------------------------------------------
                        // El Cliente actual el cual solamente tiene autorizado
                        // COD como modo de pago, se le habilita únicamente dicho modo.
                        //--------------------------------------------------------------
                        if ($intId == 3) {
                            $objListItem = new QListItem($strValue, $intId, true);
                            $this->lstModaPago->AddItem($objListItem);
                        }
                    } elseif (($this->objCliente->PagoPpd && $this->objCliente->PagoCrd ) && !$this->objCliente->PagoCod) {
                        //--------------------------------------------------------------------
                        // Se carga la Modalidad en la lista menos el de COD,
                        // y se selecciona de manera automática si corresponde a CRD-CREDITO.
                        //--------------------------------------------------------------------
                        if ($intId != 3) {
                            $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::CRDCREDITO);
                            $this->lstModaPago->AddItem($objListItem);
                        }
                    } elseif (($this->objCliente->PagoCod && $this->objCliente->PagoCrd ) && !$this->objCliente->PagoPpd) {
                        //--------------------------------------------------------------------
                        // Se carga la Modalidad en la lista menos el de PPD,
                        // y se selecciona de manera automática si corresponde a CRD-CREDITO.
                        //--------------------------------------------------------------------
                        if ($intId != 1) {
                            $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::CRDCREDITO);
                            $this->lstModaPago->AddItem($objListItem);
                        }
                    } elseif (($this->objCliente->PagoPpd && $this->objCliente->PagoCod ) && !$this->objCliente->PagoCrd) {
                        //--------------------------------------------------------------------
                        // Se carga la Modalidad en la lista menos el de CRD,
                        // y se selecciona de manera automática si corresponde a PPD-PREPAGADA.
                        //--------------------------------------------------------------------
                        if ($intId != 2) {
                            $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::PPDPREPAGADA);
                            $this->lstModaPago->AddItem($objListItem);
                        }
                    } elseif ((!$this->objCliente->PagoPpd && !$this->objCliente->PagoCod ) && !$this->objCliente->PagoCrd) {
                        $blnTodoOkey = false;
                    } else {
                        if ($this->objCliente->CodigoInterno == 'CUES') {
                            //------------------------------------------------------------------------------------------
                            // Se carga la Modalidad en la lista, y se selecciona de manera automática si corresponde a
                            // PPD-PREPAGADA (Solamente si se trata de Cuentas Especiales).
                            //------------------------------------------------------------------------------------------
                            $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::PPDPREPAGADA);
                        } else {
                            //------------------------------------------------------------------------------------------
                            // Se carga la Modalidad en la lista, y se selecciona de manera automática si corresponde a
                            // CRD-CREDITO.
                            //------------------------------------------------------------------------------------------
                            $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::CRDCREDITO);
                        }
                        $this->lstModaPago->AddItem($objListItem);
                    }
                } else {
                    $blnTodoOkey = false;
                }
            }
        }
        if (!$blnTodoOkey) {
            $objListItem = new QListItem('- N/A -', null);
            $this->lstModaPago->AddItem($objListItem);
            $this->lstModaPago->Enabled = false;
            $this->lstModaPago->ForeColor = 'blue';
        } else {
            //            if ($this->blnEditMode) {
            $blnModaGuia = BuscarParametro("ModaGuia", $this->objUsuario->LogiUsua, "Val1", 0);
            if ($blnModaGuia) {
                $this->lstModaPago->Enabled = true;
            } else {
                $this->lstModaPago->Enabled = false;
                $this->lstModaPago->ForeColor = 'blue';
            }
            //            }
        }
    }

    protected function calcularTarifaNacional() {
        /**
         * @var $objRegiTraz Parametro
         * @var $objUsuario Usuario
         */
        $objUsuario  = unserialize($_SESSION['User']);
        $strLogiUsua = $objUsuario->LogiUsua;
        $objRegiTraz = BuscarParametro('RegiTraz','CalcTari','TODO',null);
        $blnRegiTraz = false;
        if ($objRegiTraz) {
            if (trim($objRegiTraz->ParaTxt2) == trim($strLogiUsua)) {
                $blnRegiTraz = $objRegiTraz->ParaVal1;
            }
        }
        if ($blnRegiTraz) {
            $objRegiTraz->ParaTxt1  = 'Guia Nro: '.$this->objGuia->NumeGuia."<br>";
            $objRegiTraz->Save();
            $objRegiTraz->ParaTxt1 .= "Rutina: calcularTarifaNacional (en /sde/cargar_guia.php)<br>";
            $objRegiTraz->Save();
        }

        $blnCalcOkey = true;

        $arrEnviSegu = $this->chkEnviSegu_Change();

        $blnSeguOkey = $arrEnviSegu['TodoOkey'];
        $blnSeguMini = $arrEnviSegu['ErroMini'];
        $blnSeguMaxi = $arrEnviSegu['ValoMaxi'];
        $strSeguMens = $arrEnviSegu['MensUsua'];
        //--------------------------------------------------------------------------
        // El peso del envio determina cual es la Tarifa que se debe aplicar
        //--------------------------------------------------------------------------
        if ($blnSeguOkey && !$blnSeguMini) {
            //--------------------------------------------------------------------------------------------------
            // Al estar en modo de inserción, a la guía se le asignará la tarifa correspondiente del cliente, y
            // la misma se usará para calcular la tarifa.
            //--------------------------------------------------------------------------------------------------
            if (!$this->blnEditMode) {
                $this->objGuia->TarifaId = $this->objCliente->Tarifa->Id;
            }

            $objTarifa = FacTarifa::LoadById($this->objGuia->TarifaId);

            if ($objTarifa) {
                if ($blnRegiTraz) {
                    $objRegiTraz->ParaTxt1 .= "Tarifa: ".$objTarifa->Descripcion."<br>";
                    $objRegiTraz->Save();
                }
                $strModaPago = TipoGuiaType::ToStringCorto($this->lstModaPago->SelectedValue);
                //-----------------------------------------------
                // Se procede ahora al calculo de la Tarifa
                //-----------------------------------------------
                $arrParaTari['dttFechGuia'] = $this->lblFechGuia->Text;
                $arrParaTari['intCodiTari'] = $objTarifa->Id;
                $arrParaTari['intCodiProd'] = $this->objProducto->CodiProd;
                $arrParaTari['strCodiOrig'] = $this->lstCodiOrig->SelectedValue;
                $arrParaTari['strCodiDest'] = $this->lstCodiDest->SelectedValue;
                $arrParaTari['dblPesoGuia'] = (float)$this->txtPesoGuia->Text;
                $arrParaTari['dblValoDecl'] = (float)$this->decValoDecl;
                $arrParaTari['intChecAseg'] = $this->chkEnviSegu->Checked;
                $arrParaTari['decSgroClie'] = $this->objCliente->PorcentajeSeguro;
                $arrParaTari['strModaPago'] = $strModaPago;
                $arrParaTari['decPorcDcto'] = $this->txtPorcDcto->Text;

                $arrValoTari = calcularTarifaParcialNew($arrParaTari);

                $blnTodoOkey = $arrValoTari['blnTodoOkey'];
                $strMensUsua = $arrValoTari['strMensUsua'];
                $dblMontBase = $arrValoTari['dblMontBase'];
                $decMontDcto = $arrValoTari['decMontDcto'];
                $dblFranPost = $arrValoTari['dblFranPost'];
                $dblMontDiva = $arrValoTari['dblMontDiva'];
                $dblMontSgro = $arrValoTari['dblMontSgro'];
                $dblMontTota = $arrValoTari['dblMontTota'];
                $dblPorcSegu = $arrValoTari['dblPorcSgro'];
                $decPorcIvax = $arrValoTari['dblPorcDiva'];

                $this->decPorcSegu = $dblPorcSegu;

                $this->decPorcIvax = $decPorcIvax;

                $this->txtMontBase->Text = nf($dblMontBase);
                $this->txtMontDcto->Text = nf($decMontDcto);
                $this->txtMontFran->Text = nf($dblFranPost);
                $this->txtMontSegu->Text = nf($dblMontSgro);
                $this->txtMontIvax->Text = nf($dblMontDiva);
                $this->txtMontTota->Text = nf($dblMontTota);

                if ($blnTodoOkey) {
                    if ($blnSeguMaxi) {
                        $this->mensaje($strSeguMens,'','d','i',__iHAND__);
                    } else {
                        $this->mensaje();
                    }
                } else {
                    $this->mensaje($strMensUsua,'','d','i',__iHAND__);
                    $blnCalcOkey = false;
                }
            } else {
                $this->mensaje('No se ha definido la Tarifa Nacional "Por Peso"','','d','',__iHAND__);
                $blnCalcOkey = false;
            }
        } else {
            $this->mensaje($strSeguMens,'','d','',__iHAND__);
            $blnCalcOkey = false;
        }

        return $blnCalcOkey;
    }

    protected function PorcentajeIVA() {
        $decPorcIvax = $this->decPorcIvax;
        $arrSucuOrig = explode('|',$this->lstCodiOrig->SelectedValue);
        $arrSucuDest = explode('|',$this->lstCodiDest->SelectedValue);
        $strCodiOrig = $arrSucuOrig[0];
        $strCodiDest = $arrSucuDest[0];
        $arrSucuExen = unserialize($_SESSION['SucuExen']);

        $strModoPago = $this->lstModaPago->SelectedName;
        $intPosiPago = strpos($strModoPago, "-");
        $strNombPago = substr($strModoPago, 0, $intPosiPago);

        //--------------------------------------------------------------------
        // Si la Modalida de Pago es PPD ó CRD y el Origen es una Sucursal exenta
        // de IVA, entonces el porcetaje de IVA se hace cero (0).
        //--------------------------------------------------------------------
        if ($strNombPago == 'PPD' || $strNombPago == 'CRD') {
            if (in_array($strCodiOrig,$arrSucuExen)) {
                $decPorcIvax = 0;
            }
        }
        //--------------------------------------------------------------------
        // Si la Modalida de Pago es COD y el Destino es una Sucursal exenta
        // de IVA, entonces el porcetaje de IVA se hace cero (0).
        //--------------------------------------------------------------------
        if ($strNombPago == 'COD') {
            if (in_array($strCodiDest,$arrSucuExen)) {
                $decPorcIvax = 0;
            }
        }
        return $decPorcIvax;
    }

    protected function controlDeCambioDePeso(Guia $objGuiaOrig,Guia $objNuevGuia) {
        //--------------------------------------------------------------------------------------------
        // Si el cambio en el peso ocurrio posterior el traslado de la guia, se deja registro en la
        // tabla "proceso" y se envia informacion de este cambio a las personas involucradas.
        //--------------------------------------------------------------------------------------------
        if ($objGuiaOrig->tieneCheckpoint('TR')) {
            $strTextAudi = sprintf('Cambio el Peso|%s --> %s|%s|%s',
                $objGuiaOrig->PesoGuia,
                $objNuevGuia->PesoGuia,
                $objGuiaOrig->NumeGuia,
                $objGuiaOrig->CodiClieObject->NombClie);
            AuditoriaDeProcesos($strTextAudi);
        }
    }

    protected function RegistroDeCambios(Guia $objGuiaOrig, Guia $objNuevGuia) {
        $strTextMens = '';
        $strCodiCkpt = 'MG';  // Modifico la Guia
        //---------------------
        // Cantidad de Piezas
        //---------------------
        if ($objGuiaOrig->CantPiez != $objNuevGuia->CantPiez) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Piezas: ".$objGuiaOrig->CantPiez." --> ".$objNuevGuia->CantPiez;
        }
        //--------------
        // Peso Libras
        //--------------
        if ($objGuiaOrig->PesoGuia != $objNuevGuia->PesoGuia) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Peso: ".$objGuiaOrig->PesoGuia." --> ".$objNuevGuia->PesoGuia;
            $this->controlDeCambioDePeso($objGuiaOrig,$objNuevGuia);
        }
        //------------------
        // Valor Declarado
        //------------------
        if ($objGuiaOrig->ValorDeclarado != $objNuevGuia->ValorDeclarado) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."V.Declarado: ".$objGuiaOrig->ValorDeclarado." --> ".$objNuevGuia->ValorDeclarado;
        }
        //------------
        // Contenido
        //------------
        if ($objGuiaOrig->DescCont != $objNuevGuia->DescCont) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Contenido: ".trim($objGuiaOrig->DescCont)." --> ".trim($objNuevGuia->DescCont);
        }
        //--------------------
        // Modalidad de Pago
        //--------------------
        if ($objGuiaOrig->TipoGuia != $objNuevGuia->TipoGuia) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."M.Pago: ".TipoGuiaType::ToStringCorto($objGuiaOrig->TipoGuia)." --> ".TipoGuiaType::ToStringCorto($objNuevGuia->TipoGuia);
        }
        //----------
        // Cliente
        //----------
        if ($objGuiaOrig->CodiClie != $objNuevGuia->CodiClie) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Cliente: ".$objGuiaOrig->CodiClieObject->CodigoInterno." --> ".$objNuevGuia->CodiClieObject->CodigoInterno;
        }
        //----------
        // Destino
        //----------
        if ($objGuiaOrig->EstaDest != $objNuevGuia->EstaDest) {
            if (strlen($strTextMens) > 0) {
                $strCaraSepa = ' / ';
            } else {
                $strCaraSepa = '';
            }
            $strTextMens .= $strCaraSepa."Destino: ".$objGuiaOrig->EstaDest." --> ".$objNuevGuia->EstaDest;
        }
        if (strlen($strTextMens) > 0) {
            //---------------------------------------------------------------------------------------
            // En el Registro de Trabajo, debe quedar constancia de los cambios ocurridos a la Guia
            //---------------------------------------------------------------------------------------
            $arrParaRegi['CodiCkpt'] = $strCodiCkpt;
            $arrParaRegi['TextMens'] = $strTextMens;
            $arrParaRegi['NumeGuia'] = $objGuiaOrig->NumeGuia;
            $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
            $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
            CrearRegistroDeTrabajo($arrParaRegi);
        }
    }

    protected function UpdateGuiaFields() {
        if (strlen($this->objCliente->RutaRecolecta) > 0) {
            $intOperGuia = $this->objCliente->RutaRecolecta;
        } else {
            $intOperGuia = $this->objOperFict->CodiOper;
        }
        $this->objGuia->NumeGuia           = $this->txtNumeGuia->Text;
        $this->objGuia->CodiClie           = $this->lstCodiClie->SelectedValue;
        $this->objGuia->FechGuia           = new QDateTime($this->lblFechGuia->Text);
        $this->objGuia->EstaOrig           = $this->lstCodiOrig->SelectedValue;
        $this->objGuia->EstaDest           = $this->lstCodiDest->SelectedValue;
        $this->objGuia->PesoGuia           = (float)$this->txtPesoGuia->Text;
        $this->objGuia->NombRemi           = $this->txtNombRemi->Text;
        $this->objGuia->DireRemi           = $this->txtDireRemi->Text;
        $this->objGuia->TeleRemi           = $this->txtTeleRemi->Text;
        $this->objGuia->NombDest           = $this->txtNombDest->Text;
        $this->objGuia->DireDest           = $this->txtDireDest->Text;
        $this->objGuia->TeleDest           = $this->txtTeleDest->Text;
        $this->objGuia->CantPiez           = $this->txtCantPiez->Text;
        $this->objGuia->DescCont           = $this->txtDescCont->Text;
        $this->objGuia->CodiProd           = $this->objProducto->CodiProd;
        $this->objGuia->TipoGuia           = $this->lstModaPago->SelectedValue;
        $this->objGuia->ValorDeclarado     = $this->txtValoDecl->Text;
        $this->objGuia->PorcentajeIva      = str2num($this->decPorcIvax);
        $this->objGuia->MontoIva           = str2num($this->txtMontIvax->Text);
        $this->objGuia->Asegurado          = str2num($this->chkEnviSegu->Checked);
        $this->objGuia->PorcentajeSeguro   = str2num($this->decPorcSegu);
        $this->objGuia->MontoSeguro        = str2num($this->txtMontSegu->Text);
        $this->objGuia->MontoBase          = str2num($this->txtMontBase->Text);
        $this->objGuia->MontoFranqueo      = str2num($this->txtMontFran->Text);
        $this->objGuia->MontoTotal         = str2num($this->txtMontTota->Text);
        $this->objGuia->CantAyudantes      = (int)$this->chkPesoVolu->Checked;
        $this->objGuia->ParadasAdicionales = $this->intCantPara;
        $this->objGuia->CourierId          = 1;
        $this->objGuia->GuiaExterna        = $this->txtGuiaInte->Text;
        $this->objGuia->FleteDirecto       = $this->chkFletDire->Checked;
        $this->objGuia->TieneGuiaRetorno   = $this->chkEnviReto->Checked;
        $this->objGuia->GuiaRetorno        = $this->txtGuiaReto->Text;
        $this->objGuia->Observacion        = $this->txtTextObse->Text;
        $this->objGuia->OperacionId        = $intOperGuia;
        $this->objGuia->PorcentajeSgroInt  = $this->decPorcSegu;
        $this->objGuia->MontoSgroInt       = str2num($this->txtMontSegu->Text);
        $this->objGuia->UsuarioCreacion    = $this->lblUsuaCrea->Text;
        $this->objGuia->FechaCreacion      = new QDateTime($this->lblFechCrea->Text);
        $this->objGuia->HoraCreacion       = $this->lblHoraCrea->Text;
        $this->objGuia->CobroCod           = CobroCod::Load($this->txtNumeGuia->Text);
        $this->objGuia->VendedorId         = $this->objCliente->VendedorId;
        $this->objGuia->PorcentajeDscto    = str2num($this->txtPorcDcto->Text);
        $this->objGuia->MontoDscto         = str2num($this->txtMontDcto->Text);
        $this->objGuia->ConsiderarDscto    = (int)$this->chkConsDcto->Checked;

        if (!$this->blnEditMode) {
            //------------------------------------------------------------------------
            // En caso de Insercion, se asignan valores por defecto a ciertos campos
            //------------------------------------------------------------------------
            $this->objGuia->Alto            = '';
            $this->objGuia->Ancho           = '';
            $this->objGuia->Largo           = '';
            $this->objGuia->RecolectaId     = '';
            $this->objGuia->TipoDocumentoId = 'J';
            $this->objGuia->CedulaRif       = '';
            $this->objGuia->CierreCaja      = '';
            $this->objGuia->CajaId          = '';
            $this->objGuia->MontoTotalInt   = 0;
            $this->objGuia->PesoVolumetrico = '';
            $this->objGuia->PesoLibras      = '';
            $this->objGuia->HojaEntrega     = '';
            $this->objGuia->MontoOtros      = 0;
            $this->objGuia->EntregadoA      = '';
            $this->objGuia->FechaEntrega    = null;
            $this->objGuia->HoraEntrega     = '';
            $this->objGuia->CodiCkpt        = '';
            $this->objGuia->EstaCkpt        = '';
            $this->objGuia->FechCkpt        = null;
            $this->objGuia->HoraCkpt        = '';
            $this->objGuia->ObseCkpt        = '';
            $this->objGuia->UsuaCkpt        = '';
            $this->objGuia->FechaPod        = null;
            $this->objGuia->HoraPod         = '';
            $this->objGuia->UsuarioPod      = '';
            $this->objGuia->TransFac        = 0;
            $this->objGuia->CourierId       = 1;
            $this->objGuia->UsuarioCreacion = $this->objUsuario->LogiUsua;
            $this->objGuia->FechaCreacion   = new QDateTime(QDateTime::Now);
            $this->objGuia->HoraCreacion    = date("H:i");
            $this->objGuia->SistemaId       = 'sde';
            $this->objGuia->Anulada         = 0;
            $this->objGuia->EnEfectivo      = 0;
            $this->objGuia->TarifaId        = $this->objCliente->TarifaId;
        }
        //--------------------------------------------------------------------
        // Se compara el objeto que se esta guardando con el objeto original
        //--------------------------------------------------------------------
        if ($this->blnEditMode) {
            $this->RegistroDeCambios($this->objGuiaOrig,$this->objGuia);
        }
    }


    protected function enviarMensajeDeError($strMensErro) {
        $this->mensaje($strMensErro,'','d','',__iHAND__);
    }

    protected function Form_Validate() {
        $this->mensaje();
        if (strlen($this->txtNumeGuia->Text) == 0) {
            $strMensErro = 'Número Guía <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtNumeGuia->Text = limpiarCadena($this->txtNumeGuia->Text);
        }
        if (is_null($this->lstCodiClie->SelectedValue)) {
            $strMensErro = 'Cliente A Facturar <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtNombRemi->Text) == 0) {
            $strMensErro = 'Nombre del Remitente <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtNombRemi->Text = limpiarCadena($this->txtNombRemi->Text);
        }
        if (strlen($this->txtTeleRemi->Text) == 0) {
            $strMensErro = 'Teléfono del Remitente <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtTeleRemi->Text = DejarSoloLosNumeros($this->txtTeleRemi->Text);
        }
        if (strlen($this->txtDireRemi->Text) == 0) {
            $strMensErro = 'Dirección de Recolecta <b>Requerida</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtDireRemi->Text = limpiarCadena($this->txtDireRemi->Text);
        }
        if (is_null($this->lstCodiOrig->SelectedValue)) {
            $strMensErro = 'Origen <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (is_null($this->lstCodiDest->SelectedValue)) {
            $strMensErro = 'Destino <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtCantPiez->Text) == 0 || ($this->txtCantPiez->Text == 0)) {
            $strMensErro = 'La Cantidad de Piezas <b>Requerida y Mayor a Cero (0)</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if ((strlen($this->txtPesoGuia->Text) == 0) || ($this->txtPesoGuia->Text == 0)) {
            $strMensErro = 'Peso <b>Requerido y Mayor a Cero (0)</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtValoDecl->Text) == 0) {
            $strMensErro = 'Valor Declarado <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if ($this->chkGuiaInte->Checked && strlen($this->txtGuiaInte->Text) == 0) {
            $strMensErro = 'Guía Externa <b>Requerida</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtDescCont->Text) == 0) {
            $strMensErro = 'Contenido del Envío <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtDescCont->Text = limpiarCadena($this->txtDescCont->Text);
        }
        if (strlen($this->txtNombDest->Text) == 0) {
            $strMensErro = 'Nombre del Destinatario <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtNombDest->Text = limpiarCadena($this->txtNombDest->Text);
        }
        if (strlen($this->txtTeleDest->Text) == 0) {
            $strMensErro = 'Teléfono del Destinatario <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtTeleDest->Text = DejarSoloLosNumeros($this->txtTeleDest->Text);
        }
        if (strlen($this->txtDireDest->Text) == 0) {
            $strMensErro = 'Dirección de Entrega <b>Requerida</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        } else {
            $this->txtDireDest->Text = limpiarCadena($this->txtDireDest->Text);
        }
        if ($this->chkFletDire->Checked && is_null($this->lstVehiSuge->SelectedValue)) {
            $strMensErro = 'Tipo Vehículo <b>Requerido</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (is_null($this->lstModaPago->SelectedValue)) {
            $strMensErro = 'Forma de Pago <b>Requerida</b>';
            $this->enviarMensajeDeError($strMensErro);
            return false;
        }
        if (strlen($this->txtPorcDcto->Text) > 0) {
            if ($this->txtPorcDcto->Text > 100) {
                $strMensErro = 'Porcentaje de Descuento <b>No puede ser mayor a 100</b>';
                $this->enviarMensajeDeError($strMensErro);
                return false;
            }
        }
        if ($this->chkConsDcto->Checked) {
            if (strlen($this->txtPorcDcto->Text) == 0) {
                $strMensErro = 'Debe especificar un Porcentaje de Descuento';
                $this->enviarMensajeDeError($strMensErro);
                return false;
            }
        }
        return true;
    }

    protected function txtNumeGuia_Blur() {
        //-----------------------------------------------
        // Se verifica la existencia previa de la Guia
        //-----------------------------------------------
        if (strlen($this->txtNumeGuia->Text) > 0) {
            $this->chkPesoVolu->Enabled = true;
            $this->chkFletDire->Enabled = true;
            $this->lstModaPago->Enabled = true;
            $this->txtCantPiez->Enabled = true;
            $this->txtValoDecl->Enabled = true;
            $this->chkEnviSegu->Enabled = true;

            $this->txtCantPiez->ForeColor = 'black';
            $this->txtValoDecl->ForeColor = 'black';
            $this->lstModaPago->ForeColor = 'black';

            //----------------------------------------------------------
            // Aqui se incorpora el procesamiento de las Guias Sodexo
            //----------------------------------------------------------
            $this->blnGuiaSode = false;
            if (strlen($this->txtNumeGuia->Text) == 15) {
                $this->objGuiaSode = SodexoInput::LoadByGuiaSodexo($this->txtNumeGuia->Text);
                if ($this->objGuiaSode) {
                    if (strlen($this->objGuiaSode->GuiaId) > 0) {
                        $this->txtNumeGuia->Text = $this->objGuiaSode->GuiaId;
                        $this->objGuia = Guia::Load($this->txtNumeGuia->Text);
                    } else {
                        $this->objGuia = Guia::Load($this->txtNumeGuia->Text);
                    }
                } else {
                    $this->objGuia = Guia::Load($this->txtNumeGuia->Text);
                }
            } else {
                $this->objGuia = Guia::Load($this->txtNumeGuia->Text);
            }
            if ($this->objGuia) {
                //---------------------------------------------
                // Si la Guia, ya existe, se cargan sus datos
                //---------------------------------------------
                $this->blnEditMode = true;
                // t('Evaluando permisos del Usuario: '.$this->objUsuario->LogiUsua);

                $blnModaGuia = BuscarParametro("ModaGuia", $this->objUsuario->LogiUsua, "Val1", 0);
                // t('Permiso para modificar la guia (ModaGuia): '.$blnModaGuia);
                // t('Enabled del Peso: '.$this->txtPesoGuia->Enabled);
                if ($blnModaGuia) {
                    $this->lstModaPago->Enabled = true;
                } else {
                    $this->lstModaPago->Enabled = false;
                    $this->lstModaPago->ForeColor = 'blue';
                }
                // t('Enabled del Peso: '.$this->txtPesoGuia->Enabled);

                $blnModiPeso = BuscarParametro("ModiPeso", $this->objUsuario->LogiUsua, "Val1", 0);
                // t('Permiso para modificar el peso (ModaPeso): '.$blnModiPeso);
                if ($blnModiPeso) {
                    if ($this->objGuia->tieneCheckpoint('TR')) {
                        $this->txtPesoGuia->Enabled = false;
                        $this->txtPesoGuia->ForeColor = 'blue';
                    } else {
                        $this->txtPesoGuia->Enabled = true;
                    }
                } else {
                    $this->txtPesoGuia->Enabled = false;
                    $this->txtPesoGuia->ForeColor = 'blue';
                }
                // t('Enabled del Peso: '.$this->txtPesoGuia->Enabled);
                //------------------------------------------------------------------------------------
                // Este parametro permite al Usuario modificar el peso, bajo la unica condicion de
                // que la guia no este entregada.
                //------------------------------------------------------------------------------------
                $this->blnPesoNook = BuscarParametro("PesoNook", $this->objUsuario->LogiUsua, "Val1", 0);
                // t('Permiso para modificar el peso antes del OK (PesoNook): '.$this->blnPesoNook);
                if ($this->blnPesoNook) {
                    if ($this->objGuia->tieneCheckpoint('OK')) {
                        $this->txtPesoGuia->Enabled = false;
                        $this->txtPesoGuia->ForeColor = 'blue';
                    } else {
                        $this->txtPesoGuia->Enabled = true;
                    }
                }
                // t('Enabled del Peso: '.$this->txtPesoGuia->Enabled);

                $blnModiPiez = BuscarParametro("ModiPiez", $this->objUsuario->LogiUsua, "Val1", 0);
                // t('Permiso para modificar las piezas (ModaPiez): '.$blnModiPiez);
                if ($blnModiPiez) {
                    $this->txtCantPiez->Enabled = true;
                } else {
                    $this->txtCantPiez->Enabled = false;
                    $this->txtCantPiez->ForeColor = 'blue';
                }

                $blnMontGuia = BuscarParametro("MontGuia", $this->objUsuario->LogiUsua, "Val1", 0);
                // t('Permiso para modificar los montos (MontGuia): '.$blnMontGuia);
                if ($blnMontGuia) {
                    $this->txtMontBase->Enabled = true;
                    $this->txtMontFran->Enabled = true;
                    $this->txtMontIvax->Enabled = true;
                    $this->txtMontSegu->Enabled = true;
                    $this->txtMontTota->Enabled = true;
                } else {
                    $this->txtMontBase->Enabled = false;
                    $this->txtMontBase->ForeColor = 'blue';
                    $this->txtMontFran->Enabled = false;
                    $this->txtMontFran->ForeColor = 'blue';
                    $this->txtMontIvax->Enabled = false;
                    $this->txtMontIvax->ForeColor = 'blue';
                    $this->txtMontSegu->Enabled = false;
                    $this->txtMontSegu->ForeColor = 'blue';
                    $this->txtMontTota->Enabled = false;
                    $this->txtMontTota->ForeColor = 'blue';
                }

                $blnModiGuia = BuscarParametro("ModiGuia", $this->objUsuario->LogiUsua, "Val1", 0);
                // t('Permiso para modificar otros campos de la guia (ModiGuia): '.$blnModiGuia);
                if ($blnModiGuia) {
                    $this->chkPesoVolu->Enabled = true;
                    $this->chkFletDire->Enabled = true;
                    $this->txtValoDecl->Enabled = true;
                    $this->chkEnviSegu->Enabled = true;
                    $this->lstCodiOrig->Enabled = true;
                } else {
                    $this->chkPesoVolu->Enabled = false;
                    $this->chkPesoVolu->ForeColor = 'blue';
                    $this->chkFletDire->Enabled = false;
                    $this->chkFletDire->ForeColor = 'blue';
                    $this->txtValoDecl->Enabled = false;
                    $this->txtValoDecl->ForeColor = 'blue';
                    $this->chkEnviSegu->Enabled = false;
                    $this->chkEnviSegu->ForeColor = 'blue';
                    $this->lstCodiOrig->Enabled = false;
                    $this->lstCodiOrig->ForeColor = 'blue';
                }
                $this->lblFechGuia->Text = $this->objGuia->FechGuia->__toString("YYYY-MM-DD");
                $this->txtNombRemi->Text = limpiarCadena($this->objGuia->NombRemi);
                $this->txtTeleRemi->Text = $this->objGuia->TeleRemi;
                $this->txtDireRemi->Text = limpiarCadena($this->objGuia->DireRemi);
                $this->lstCodiClie->RemoveAllItems();
                $this->lstCodiClie->AddItem($this->objGuia->CodiClieObject->__toString(),$this->objGuia->CodiClie,true);
                $this->CargarOrigenes();
                $this->lstCodiDest->RemoveAllItems();
                $this->CargarDestinos();
                $this->txtCantPiez->Text    = $this->objGuia->CantPiez;
                $this->txtPesoGuia->Text    = $this->objGuia->PesoGuia;
                $this->decPesoInic          = $this->objGuia->PesoGuia; //Variable que almacena el peso inicial de la guia
                $this->txtValoDecl->Text    = $this->objGuia->ValorDeclarado;
                $this->chkEnviSegu->Checked = $this->objGuia->Asegurado;
                $this->chkGuiaInte->Checked = strlen($this->objGuia->GuiaExterna) ? true : false;
                $this->txtGuiaInte->Text    = $this->objGuia->GuiaExterna;
                $this->chkGuiaInte_Change();
                $this->lblUsuaCrea->Text    = $this->objGuia->UsuarioCreacion;
                $this->lblFechCrea->Text    = $this->objGuia->FechaCreacion->__toString("YYYY-MM-DD");
                $this->lblHoraCrea->Text    = $this->objGuia->HoraCreacion;
                $this->txtDescCont->Text    = $this->objGuia->DescCont;
                $this->txtNombDest->Text    = limpiarCadena($this->objGuia->NombDest);
                $this->txtTeleDest->Text    = $this->objGuia->TeleDest;
                $this->txtDireDest->Text    = limpiarCadena($this->objGuia->DireDest);
                $this->txtMontBase->Text    = $this->objGuia->MontoBase;
                $this->txtMontIvax->Text    = $this->objGuia->MontoIva;
                $this->txtMontFran->Text    = $this->objGuia->MontoFranqueo;
                $this->txtMontSegu->Text    = $this->objGuia->MontoSeguro;
                $this->chkFletDire->Checked = $this->objGuia->FleteDirecto;
                $this->txtTextObse->Text    = limpiarCadena($this->objGuia->Observacion);
                $this->lstModaPago->RemoveAllItems();
                $this->CargarModalidadesDePago();
                $this->txtMontTota->Text    = $this->objGuia->MontoTotal;
                $this->chkPesoVolu->Checked = $this->objGuia->CantAyudantes;
                $this->intCantPara          = $this->objGuia->ParadasAdicionales;
                $this->lstVehiSuge->RemoveAllItems();
                $this->CargarVehiculos();
                $this->objProducto          = FacProducto::Load($this->objGuia->CodiProd);
                $this->objCliente           = MasterCliente::Load($this->objGuia->CodiClie);
                $this->chkEnviReto->Checked = $this->objGuia->TieneGuiaRetorno;
                $this->txtGuiaReto->Text    = $this->objGuia->GuiaRetorno;

                $this->btnImprGuia_Create();
                $this->btnImprGuia->Visible = true;
                $this->btnImprPodx->Visible = true;
                $this->btnImprEtiq->Visible = true;

                if ($this->objGuia->SistemaId == 'int') {
                    $this->btnSave->Visible = false;
                } else {
                    $this->btnSave->Visible = true;
                }
                //------------------------------------------------------------------------------
                // Si se trata de una Guia Sodexo, el Nro de la Guia Internacional, no podra
                // sufrir ningun cambio.
                //------------------------------------------------------------------------------
                if ($this->blnGuiaSode) {
                    $this->chkGuiaInte->Enabled   = false;
                    $this->chkGuiaInte->ForeColor = 'blue';
                    $this->txtGuiaInte->Enabled   = false;
                    $this->txtGuiaInte->ForeColor = 'blue';
                }
                //------------------------------------------------------------------------------------
                // Se crea un objeto paralelo que permita comparar las modificaciones realizadas
                //------------------------------------------------------------------------------------
                $this->objGuiaOrig = clone $this->objGuia;
            } else {
                //-----------------------------------------------------
                // Si la Guia NO existe, se cargan datos por defecto
                //-----------------------------------------------------
                $this->objGuia = new Guia();
                $this->blnEditMode = false;
                $dttFechGuia = new DateTime();
                $this->lblFechGuia->Text = $dttFechGuia->format('Y-m-d');
                if (strlen($this->txtNombRemi->Text) > 0) {
                    $this->txtCodiInte->Text    = '';
                    $this->txtNombBusc->Text    = '';
                    $this->txtNombRemi->Text    = '';
                    $this->txtTeleRemi->Text    = '';
                    $this->txtDireRemi->Text    = '';
                    $this->lstCodiClie->RemoveAllItems();
                    $this->lstCodiOrig->RemoveAllItems();
                    $this->CargarOrigenes();
                    $this->lstCodiDest->RemoveAllItems();
                    $this->CargarDestinos();
                    $this->txtCantPiez->Text    = '';
                    $this->txtPesoGuia->Text    = '';
                    $this->txtValoDecl->Text    = '';
                    $this->chkEnviSegu->Checked = false;
                    $this->chkGuiaInte->Checked = false;
                    $this->txtGuiaInte->Text    = '';
                    $this->chkGuiaInte_Change();
                    $this->lblUsuaCrea->Text    = $this->objUsuario->LogiUsua;
                    $this->lblFechCrea->Text    = date('Y-m-d');
                    $this->lblHoraCrea->Text    = date('H:i');
                    $this->txtCodiInt2->Text    = '';
                    $this->txtNombBus2->Text    = '';
                    $this->txtDescCont->Text    = '';
                    $this->txtNombDest->Text    = '';
                    $this->txtTeleDest->Text    = '';
                    $this->txtDireDest->Text    = '';
                    $this->txtMontBase->Text    = '';
                    $this->txtMontIvax->Text    = '';
                    $this->txtMontFran->Text    = '';
                    $this->txtMontSegu->Text    = '';
                    $this->chkFletDire->Checked = false;
                    $this->chkPesoVolu->Checked = false;
                    $this->txtTextObse->Text    = '';
                    $this->lstModaPago->RemoveAllItems();
                    $this->CargarModalidadesDePago();
                    $this->txtMontTota->Text    = '';
                    $this->intCantPara          = '';
                    $this->lstVehiSuge->RemoveAllItems();
                    $this->CargarVehiculos();
                }
                $this->btnImprGuia->Visible = false;
                $this->btnImprPodx->Visible = false;
                $this->btnImprEtiq->Visible = false;
            }
            $this->txtCodiInte->SetFocus();
        } else {
            //-----------------------------------------------------------
            // Si no se especifico un numero de guia, se busca y asigna
            // el proximo correlativo disponible
            //-----------------------------------------------------------
            $this->objGuia = new Guia();
            $this->blnEditMode = false;
            $this->txtNumeGuia->Text = proxNroDeGuia();
            $dttFechGuia = new DateTime();
            $this->lblFechGuia->Text = $dttFechGuia->format('Y-m-d');
            if (strlen($this->txtNombRemi->Text) > 0) {
                $this->txtCodiInte->Text = '';
                $this->txtNombBusc->Text = '';
                $this->txtNombRemi->Text = '';
                $this->txtTeleRemi->Text = '';
                $this->txtDireRemi->Text = '';
                $this->lstCodiClie->RemoveAllItems();
                $this->lstCodiOrig->RemoveAllItems();
                $this->CargarOrigenes();
                $this->lstCodiDest->RemoveAllItems();
                $this->CargarDestinos();
                $this->txtCantPiez->Text = '';
                $this->txtPesoGuia->Text = '';
                $this->txtValoDecl->Text = '';
                $this->chkEnviSegu->Checked = false;
                $this->chkGuiaInte->Checked = false;
                $this->txtGuiaInte->Text = '';
                $this->chkGuiaInte_Change();
                $this->lblUsuaCrea->Text = $this->objUsuario->LogiUsua;
                $this->lblFechCrea->Text = date('Y-m-d');
                $this->lblHoraCrea->Text = date('H:i');
                $this->txtCodiInt2->Text = '';
                $this->txtNombBus2->Text = '';
                $this->txtDescCont->Text = '';
                $this->txtNombDest->Text = '';
                $this->txtTeleDest->Text = '';
                $this->txtDireDest->Text = '';
                $this->txtMontBase->Text = '';
                $this->txtMontIvax->Text = '';
                $this->txtMontFran->Text = '';
                $this->txtMontSegu->Text = '';
                $this->chkFletDire->Checked = false;
                $this->chkPesoVolu->Checked = false;
                $this->txtTextObse->Text = '';
                $this->lstModaPago->RemoveAllItems();
                $this->CargarModalidadesDePago();
                $this->txtMontTota->Text = '';
                $this->intCantPara = '';
                $this->lstVehiSuge->RemoveAllItems();
                $this->CargarVehiculos();
            }
            $this->btnImprGuia->Visible = false;
            $this->btnImprPodx->Visible = false;
            $this->btnImprEtiq->Visible = false;
        }
        if ($this->blnEditMode) {
            $this->lblTituForm->Text = 'Cargar Guia (Editar)';
        } else {
            $this->lblTituForm->Text = 'Cargar Guia (Crear)';
        }

    }

    protected function txtCodiInte_Blur() {
        $blnBuscDato = false;
        if (strlen($this->txtCodiInte->Text) > 0) {
            if (!$this->blnEditMode) {
                $blnBuscDato = true;
            } else {
                if ($this->txtCodiInte->Text != $this->objGuia->CodiClie) {
                    $blnBuscDato = true;
                }
            }
        }
        if ($blnBuscDato) {
            $this->txtNombBusc->Text = '';
            $this->txtCodiInte->Text = strtoupper($this->txtCodiInte->Text);
            $this->lstCodiClie->RemoveAllItems();
            //-------------------------------------------------------------------------------------
            // Se busca el Cliente cuyo Codigo Interno coincida con el valor dado por el Usuario
            //-------------------------------------------------------------------------------------
            $this->objCliente = MasterCliente::LoadByCodigoInterno($this->txtCodiInte->Text);
            if ($this->objCliente) {
                $this->mensaje();
                //-----------------------------------------------------------------------------------------
                // Si la cuenta del Cliente figura como una Cuenta Comail (Correo Interno de la Empresa)
                // el peso de la guia debe ser 2.5.  Esto se hace para evitar el pago de Franqueo Postal
                // (ddurand 13/03/2013 por Solicitud de Fernando Rodiguez)
                //-----------------------------------------------------------------------------------------
                $blnCntaComa = BuscarParametro("CntaComa",$this->objCliente->CodigoInterno,"Val1",0);
                //------------------------------------------------------------------------
                // Se verifica si el Usuario esta autorizado a utilizar la cuenta Comail
                // (ddurand 28/09/2015 por solicitud de Josue Rojas)
                //------------------------------------------------------------------------
                $blnTodoOkey = true;
                $this->blnComaAlow = BuscarParametro("ComaAlow",$this->objUsuario->LogiUsua,"Val1",0);
                if ($blnCntaComa && !$this->blnComaAlow) {
                    $this->mensaje('Usted no esta autorizado para usar la cuenta Co-Mail','','d','i','hand-stop-o');
                    // $this->txtCodiInte->SetFocus();
                    $blnTodoOkey = false;
                }
                if ($blnTodoOkey) {
                    if ($blnCntaComa) {
                        // $this->txtPesoGuia->Text = 2.5;
                        // $this->txtPesoGuia->ForeColor = "blue";
                        // $this->txtPesoGuia->Enabled = false;
                        $this->txtNombBusc->SetFocus();
                    } else {
                        $this->txtPesoGuia->ForeColor = '';
                        $this->txtPesoGuia->Enabled = true;
                    }
                    if ($this->objCliente->CodiStat != StatusType::INACTIVO) {
                        $this->lstCodiClie->AddItem($this->objCliente->__toStringConCodigoInterno(), $this->objCliente->CodiClie,true);
                        $this->MostrarDatosCliente();
                        $this->lstCodiClie->Width = 200;
                        // $this->txtNombBusc->SetFocus();
                    } else {
                        $this->mensaje('Cliente Inactivo','','d','i','hand-stop-o');
                        $this->BlanquearCamposCliente();
                    }
                }
            } else {
                $this->mensaje('No Existe Cliente con este Codigo','','d','i','hand-stop-o');
                $this->BlanquearCamposCliente();
            }
        } else {
            $this->txtNombBusc->SetFocus();
        }
    }

    protected function txtNombBusc_Blur() {
        $blnBuscDato = false;
        if (strlen($this->txtNombBusc->Text)) {
            $blnBuscDato = true;
        }
        if ($blnBuscDato) {
            $this->txtCodiInte->Text = '';
            $this->txtNombBusc->Text = strtoupper($this->txtNombBusc->Text);
            $this->lstCodiClie->RemoveAllItems();
            $objCondicion= QQ::Clause();
            $objCondicion[] = QQ::Like(QQN::MasterCliente()->NombClie,'%'.trim($this->txtNombBusc->Text).'%');
            //------------------------------------------------------------------------------
            // Se buscan Clientes cuyo nombre coincida con el criterio dado por el Usuario
            //------------------------------------------------------------------------------
            $arrClieMost = MasterCliente::QueryArray(QQ::AndCondition($objCondicion),QQ::Clause(QQ::OrderBy(QQN::MasterCliente()->NombClie)));
            if (count($arrClieMost)) {
                $this->mensaje();
                if (count($arrClieMost) > 1) {
                    //-----------------------------------------------
                    // Si hay mas de uno, se lo advierto al Usuario
                    //-----------------------------------------------
                    $this->lstCodiClie->AddItem(QApplication::Translate('- Seleccione Uno - ')."(".count($arrClieMost).")",null);
                    $this->BlanquearCamposCliente();
                }
                foreach ($arrClieMost as $this->objCliente) {
                    $this->lstCodiClie->AddItem($this->objCliente->__toStringConCodigoInterno(), $this->objCliente->CodiClie);
                }
                if ($this->lstCodiClie->ItemCount == 1) {
                    //---------------------------------------------------------------------
                    // Si solo existe un Cliente, se carga la informacion automaticamente
                    //---------------------------------------------------------------------
                    $this->lstCodiClie->SelectedIndex = 0;
                    $this->MostrarDatosCliente();
                }
            } else {
                $this->mensaje('No existen Clientes que satisfagan la condicion','','d','i','hand-stop-o');
                $this->BlanquearCamposCliente();
            }
        }
        $this->lstCodiClie->Width = 200;
    }

    protected function txtCodiInt2_Blur() {
        if (strlen($this->txtCodiInt2->Text)) {
            $this->mensaje();
            $this->txtNombBus2->Text = '';
            $this->txtCodiInt2->Text = strtoupper($this->txtCodiInt2->Text);
            $this->lstDestFrec->RemoveAllItems();
            //-------------------------------------------------------------------------------------
            // Se busca el Cliente cuyo Codigo Interno coincida con el valor dado por el Usuario
            //-------------------------------------------------------------------------------------
            $objClient2 = MasterCliente::LoadByCodigoInterno($this->txtCodiInt2->Text);
            if ($objClient2) {
                $this->lstDestFrec->AddItem($objClient2->__toStringConCodigoInterno(), $objClient2->CodiClie."-C",true);
                $this->lstDestFrec_Change();
            } else {
                $this->mensaje('No Existe Cliente con este Codigo','','d','i','hand-stop-o');
                $this->BlanquearCamposDestinatario();
            }
        }
        $this->lstDestFrec->Width =200;
    }

    protected function txtNombBus2_Blur() {
        if (strlen($this->txtNombBus2->Text) > 0) {
            $this->mensaje();
            $this->txtCodiInt2->Text = '';
            $this->txtNombBus2->Text = strtoupper($this->txtNombBus2->Text);
            $this->lstDestFrec->RemoveAllItems();
            //------------------------------------------------------------------------------
            // Se Buscan Clientes cuyo nombre coincida con el criterio dado por el Usuario
            //------------------------------------------------------------------------------
            $arrClieMost = listadoDeClientes($this->txtNombBus2->Text);
            if (count($arrClieMost)) {
                if (count($arrClieMost) > 1) {
                    //-----------------------------------------------
                    // Si hay mas de uno, se lo advierto al Usuario
                    //-----------------------------------------------
                    $this->lstDestFrec->AddItem(QApplication::Translate('- Seleccione Uno - ')."(".count($arrClieMost).")",null);
                    $this->BlanquearCamposDestinatario();
                }
                foreach ($arrClieMost as $mixCliente) {
                    $this->lstDestFrec->AddItem($mixCliente[2].'-'.$mixCliente[0],$mixCliente[1].'-'.$mixCliente[2]);
                }
                if ($this->lstDestFrec->ItemCount == 1) {
                    //-------------------------------------------------------------------------
                    // Si solo existe un Destinatario, se carga la informacion automaticamente
                    //-------------------------------------------------------------------------
                    $this->lstDestFrec->SelectedIndex = 0;
                    $this->lstDestFrec_Change();
                } else {
                    if ($this->lstDestFrec->ItemCount == 0) {
                        $this->mensaje('No existen Destinatarios Frecuentes que satisfagan la condicion','','d','i','hand-stop-o');
                        $this->BlanquearCamposDestinatario();
                    } else {
                        $this->lstDestFrec->SetFocus();
                    }
                }
            } else {
                $this->mensaje('No existen Destinatarios Frecuentes, ni Clientes que satisfagan la condicion','','d','i','hand-stop-o');
                $this->BlanquearCamposDestinatario();
            }
        }
        $this->lstDestFrec->Width =200;
    }

    protected function txtMontTota_Blur() {
        //----------------------------------------------------------------------------------
        // Esta rutina calcula los montos de la Guia en funcion del valor total de la Guia
        // Esto ocurre cuando se trata de un Flete Directo o de un Peso Volumétrico
        //----------------------------------------------------------------------------------
        if ($this->chkFletDire->Checked) {
            //-------------------------------------------------------------------
            // Si y solo si se trata de Flete Directo, se asigna al peso 2.5 Kg.
            //-------------------------------------------------------------------
            $this->txtPesoGuia->Text = 2.5;
        }
        $this->txtMontFran->Text = 0;
        $this->txtMontSegu->Text = 0;
        $this->decPorcSegu = 0;
        $decBaseImpo = $this->txtMontTota->Text - $this->txtMontSegu->Text;
        $decPorcIvay = $this->PorcentajeIVA();
        //t('Calculando montos de la Guía al tratarse de un Flete Directo');
        //t('Peso Guía: '.$this->txtPesoGuia->Text);
        //t('Franqueo: '.$this->txtMontFran->Text);
        //t('Seguro: '.$this->txtMontSegu->Text);
        //t('Porcentaje Seguro: '.$this->decPorcSegu);
        //t('Base Imponible: '.$decBaseImpo);
        //t('Porcentaje IVA Prev.: '.$decPorcIvay);
        if ($decPorcIvay == 0) {
            $this->txtMontIvax->Text = 0;
        } else {
            /*
            //-----------------------------------------------------------------------------------
            // Si el monto de la tarifa, es superior a los 2.000.000,00, el IVA se reduce a 5%.
            // De lo contrario, se reduce a un 3%.
            //-----------------------------------------------------------------------------------
            $dblMontTope = 2000000;
            if ($this->txtMontTota->Text > $dblMontTope) {
                $this->decPorcIvax = 7;
            } else {
                $this->decPorcIvax = 9;
            }
            */
            $decPorcIvax = 1 + ($this->decPorcIvax / 100);
            $this->txtMontIvax->Text = str_replace('.','',nf0($this->txtMontTota->Text - ($decBaseImpo / $decPorcIvax)));
            //t('Porcentaje IVA: '.$decPorcIvax);
        }
        $this->txtMontBase->Text = str_replace(',','',nfp($this->txtMontTota->Text - $this->txtMontSegu->Text - $this->txtMontIvax->Text));
        //t('Monto IVA: '.$this->txtMontIvax->Text);
        //t('Monto Base: '.$this->txtMontBase->Text);
    }

    protected function lstCodiClie_Change() {
        if ($this->lstCodiClie->SelectedValue) {
            $this->objCliente = MasterCliente::Load($this->lstCodiClie->SelectedValue);
            $this->MostrarDatosCliente();
        }
    }

    protected function lstDestFrec_Change() {
        if ($strValoSele = $this->lstDestFrec->SelectedValue) {
            //---------------------------------------------------------------------------------------------
            // Aqui se determina en cual tabla se debe buscar el Cliente, ya que el registro seleccionado
            // podria esta en la tabla "master_cliente" o "destinatario_frecuente"
            //---------------------------------------------------------------------------------------------
            $intPosiSepa = strpos($strValoSele,'-');
            $strCodiRegi = substr($strValoSele,0,$intPosiSepa);
            $this->strIdenTabl = substr($strValoSele,$intPosiSepa+1);
            if ($this->strIdenTabl == 'D') {
                $objDestFrec = DestinatarioFrecuente::Load($strCodiRegi);
                if ($objDestFrec) {
                    $this->txtNombDest->Text = limpiarCadena($objDestFrec->Nombre);
                    $this->txtDireDest->Text = limpiarCadena($objDestFrec->Direccion);
                    $this->txtTeleDest->Text = limpiarCadena($objDestFrec->Telefono);
                }
                $this->chkDestFrec->Enabled = true;
            } else {
                $objCliente = MasterCliente::Load($strCodiRegi);
                if ($objCliente) {
                    $this->txtNombDest->Text = limpiarCadena($objCliente->NombClie);
                    $this->txtDireDest->Text = limpiarCadena($objCliente->DireReco);
                    $this->txtTeleDest->Text = limpiarCadena($objCliente->TeleCona);
                }
                $this->chkDestFrec->Enabled = false;
            }
        }
    }

    protected function lstVehiSuge_Change() {
        if (!is_null($this->lstVehiSuge->SelectedValue)) {
            $objVehiculo = $this->lstVehiSuge->SelectedValue;
            $this->txtPesoGuia->Text = $objVehiculo->CapacidadMaxima;
        }
    }

    protected function chkEnviReto_Change() {
        if ($this->chkEnviReto->Checked) {
            $this->txtGuiaReto->Enabled = true;
            $this->txtGuiaReto->ForeColor = 'black';
        } else {
            $this->txtGuiaReto->Text = '';
            $this->txtGuiaReto->Enabled = false;
            $this->txtGuiaReto->ForeColor = 'blue';
        }
    }

    protected function chkGuiaInte_Change() {
        if ($this->chkGuiaInte->Checked) {
            $this->txtGuiaInte->Enabled = true;
            $this->txtGuiaInte->ForeColor = 'black';
        } else {
            $this->txtGuiaInte->Enabled = false;
            $this->txtGuiaInte->Text = '';
        }
    }

    protected function chkEnviSegu_Change() {
        $this->mensaje();
        $blnTodoOkey = true;
        $blnErroMini = false;
        $blnValoMaxi = false;
        $strMensUsua = "";
        $strTipoMens = "w";
        $strIconMens = __iEXCL__;
        $this->decValoDecl = $this->txtValoDecl->Text;
        if ($this->chkEnviSegu->Checked) {
            if ($this->txtValoDecl->Text < $this->decValoMini) {
                $strMensUsua = "El Monto Minimo Asegurable es de Bs: $this->decValoMini";
                $strTipoMens = "d";
                $strIconMens = __iHAND__;
                $blnTodoOkey = false;
                $blnErroMini = true;
                $this->txtValoDecl->Text = '';
                $this->txtValoDecl->SetFocus();
            } elseif ($this->txtValoDecl->Text > $this->decValoMaxi) {
                //------------------------------------------------------------------------------
                // Si la tarifa del Cliente es "Por Peso", entonces el valor maximo permitido
                // se convierte en el valor declarado
                //------------------------------------------------------------------------------
                if ($this->objCliente->Tarifa->TipoTarifa == FacTipoTarifaType::PORPESO) {
                    $this->txtValoDecl->Text = $this->decValoMaxi;
                    // Traza('La tarifa es por peso');
                    $strMensUsua = "ADVERTENCIA: El Valor Declarado ha sido ajustado al equivalente maximo reglamentario (Bs. $this->decValoMaxi)";
                    $strTipoMens = "w";
                    $strIconMens = __iEXCL__;
                } else {
                    $strMensUsua = "ADVERTENCIA: El Monto Maximo Asegurable es de Bs: $this->decValoMaxi";
                    $strTipoMens = "d";
                    $strIconMens = __iHAND__;
                }
                $this->decValoDecl = $this->decValoMaxi;
                $this->txtValoDecl->SetFocus();
                $blnValoMaxi = true;
            }
        }

        if (strlen($strMensUsua) > 0) {
            $this->mensaje($strMensUsua,'',$strTipoMens,'i',$strIconMens);
        }

        // Traza('Valor declarado final: '.$this->decValoDecl);
        $arrResuSegu['TodoOkey'] = $blnTodoOkey;
        $arrResuSegu['ErroMini'] = $blnErroMini;
        $arrResuSegu['ValoMaxi'] = $blnValoMaxi;
        $arrResuSegu['MensUsua'] = $strMensUsua;

        return $arrResuSegu;
    }

    protected function chkFletDire_Change() {
        if ($this->chkFletDire->Checked) {
            $this->chkEnviSegu->Enabled = false;
            $this->txtMontTota->Enabled = true;
            $this->txtMontTota->ForeColor = 'black';
            $this->lstVehiSuge->Enabled = true;
            $this->lstVehiSuge->ForeColor = null;
            $this->btnCalcTari->Visible = false;
        } else {
            $this->chkEnviSegu->Enabled = true;
            $this->txtMontTota->Enabled = false;
            $this->txtMontTota->ForeColor = 'blue';
            $this->lstVehiSuge->Enabled = false;
            $this->lstVehiSuge->ForeColor = 'blue';
            $this->btnCalcTari->Visible = true;
        }
    }

    protected function chkPesoVolu_Change() {
        if ($this->chkPesoVolu->Checked) {
            $this->chkEnviSegu->Enabled = false;
            $this->txtMontTota->Enabled = true;
            $this->txtMontTota->ForeColor = 'black';
            $this->btnCalcTari->Visible = false;
        } else {
            $this->chkEnviSegu->Enabled = true;
            $this->txtMontTota->Enabled = false;
            $this->txtMontTota->ForeColor = 'blue';
            $this->btnCalcTari->Visible = true;
        }
    }

    protected function validarDatosParaCotizar() {
        $strTextMens = 'Para Cotizar: <b>';
        $strMensErro = '';
        $this->mensaje();
        $blnTodoOkey = true;
        //-------------------------------
        // Validando el campo de Origen
        //-------------------------------
        if (is_null($this->lstCodiOrig->SelectedValue)) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Origen <b>Requerido</b>';
        }
        //--------------------------------
        // Validando el campo de Destino
        //--------------------------------
        if (is_null($this->lstCodiDest->SelectedValue)) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Destino <b>Requerido</b>';
        }
        //-----------------------------------------------------
        // Si hay uno o más errores, se notifican al usuario
        //-----------------------------------------------------
        if (!$blnTodoOkey) {
            $strTextMens .= $strMensErro;
            $strTextMens .= '</b>.';
            $this->mensaje($strTextMens,'','d','',__iHAND__);
        }
        return $blnTodoOkey;
    }

    protected function btnCalcTari_Click() {
        if ($this->Form_Validate()) {
            $this->calcularTarifaNacional();
        }
    }

    protected function btnSave_Click() {
        //--------------------------------------------------------------------
        // Se verifica si la Guía tiene asignada una Guía Externa (Tracking)
        //--------------------------------------------------------------------
        if (!$this->chkGuiaInte->Checked) {
            $this->txtGuiaInte->Text = null;
        }
        //---------------------------------------------
        // Se verifica si la Guía tiene Flete Directo
        //---------------------------------------------
        $blnCalcTari = true;
        $blnTodoOkey = true;
        if ($this->chkFletDire->Checked || $this->chkPesoVolu->Checked) {
            $blnTodoOkey = true;
        } else {
            //--------------------------------------------------------------------------------------------
            // Si la guia fue "Devuelta al Remitente", entonces no se debe hacer re-calculo de la Tarifa
            //--------------------------------------------------------------------------------------------
            if ($this->blnEditMode) {
                if ($this->objGuia->tieneCheckpoint('DR')) {
                    $blnCalcTari = false;
                    $blnTodoOkey = true;
                }
            }
            if ($blnCalcTari) {
                $blnTodoOkey = $this->calcularTarifaNacional();
            }
        }
        //--------------------------------------------------------------------------------------------------
        // Si se superan todas las validaciones anteriores, se procede con la siguiente fase de la gestión
        //--------------------------------------------------------------------------------------------------
        if ($blnTodoOkey) {
            //--------------------------------------------------------------
            // Se inicializan parámetros para mensaje a mostrar al usuario
            //--------------------------------------------------------------
            $strTipoMens = '';
            $strIconMens = 'check';
            $strMensUsua = 'Transacción Exitosa';
            $strMensErro = '';
            //------------------------------------------------------------------------
            // Antes de actualizar la Guía a guardar, se clona el objeto de la misma
            //------------------------------------------------------------------------
            $objGuiaViej = $this->objGuia;
            $this->decPesoInic = $objGuiaViej->PesoGuia;
            //--------------------------------------------------------
            // Se procede a actualizar la ficha de la Guía a Guardar
            //--------------------------------------------------------
            $this->UpdateGuiaFields();
            //--------------------
            // Se guarda la Guía
            //--------------------
            $this->objGuia->Save();
            //---------------------------------------------------------
            // Se verifica si la Guía se encuentra en modo de edición
            //---------------------------------------------------------
            if ($this->blnEditMode) {
                //---------------------------------------------------------------------------------------
                // Si estamos en Modo Edición, se verificará la existencia de algun cambio en los datos.
                //---------------------------------------------------------------------------------------
                $objRegiNuev = $this->objGuia;
                $objResuComp = QObjectDiff::Compare($this->objGuiaOrig, $objRegiNuev);
                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                    //-----------------------------------------
                    // En caso de que el objeto haya cambiado
                    //-----------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'Guia';
                    $arrLogxCamb['intRefeRegi'] = $this->objGuia->NumeGuia;
                    $arrLogxCamb['strNombRegi'] = $this->objGuia->CodiClieObject->NombClie;
                    $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                    if (buscarCadenas($arrLogxCamb['strDescCamb'],'Guia')) {
                        $arrLogxCamb['blnCambDeli'] = true;
                    }
                    LogDeCambios($arrLogxCamb);
                }
                //-----------------------------------------------
                // Peso final obtenido luego de guardar la Guía
                //-----------------------------------------------
                $decPesoFina = $this->objGuia->PesoGuia;
                //--------------------------------------------------------------
                // Se busca posible registro previo de modificación de la Guía
                //--------------------------------------------------------------
                $objBorrGuia = GuiaModificada::Load($this->objGuia->NumeGuia);
                //-------------------------------------------------------------------------------------------
                // Se verifica si el peso inicial de la Guía es distinto al peso final obtenido de la misma
                //-------------------------------------------------------------------------------------------
                if ($this->decPesoInic != $decPesoFina) {
                    //--------------------------------------------------------------------------------
                    // Si se ha encontrado un registro previo de modificación de la Guía, se elimina
                    //--------------------------------------------------------------------------------
                    if ($objBorrGuia) {
                        $objBorrGuia->Delete();
                    }
                    //-------------------------------------------------------
                    // Se crea un nuevo registro de modificación de la Guía
                    //-------------------------------------------------------
                    $objGuiaModi = new GuiaModificada();
                    $objGuiaModi->GuiaId = $this->objGuia->NumeGuia;
                    $objGuiaModi->Fecha = new QDateTime(QDateTime::Now);
                    $objGuiaModi->PesoOriginal = $this->decPesoInic;
                    $objGuiaModi->PesoNuevo = $decPesoFina;
                    $objGuiaModi->UsuarioId = $this->objUsuario->CodiUsua;
                    $objGuiaModi->CodiEsta = $this->objUsuario->CodiEsta;
                    $objGuiaModi->Save();
                }
            }
            //--------------------------------------------------------------------------------------------------
            // Si se trata de una Guia COD, se crea un registro en la tabla en la cual se registrara el cobro.
            //--------------------------------------------------------------------------------------------------
            if ($this->objGuia->TipoGuia == TipoGuiaType::CODCOBROENDESTINO) {
                $objCobrCodx = CobroCod::Load($this->objGuia);
                if (!$objCobrCodx) {
                    $objCobrCodx = new CobroCod();
                    $objCobrCodx->NumeGuia = $this->txtNumeGuia->Text;
                    $objCobrCodx->Save();
                }
            }
            //------------------------------------------------------------------------
            // Se graba un Checkpoint PU para la Guia recién ingresada en el Sistema.
            // Para ello, primero se valida que la Guía no tenga el Checkpoint.
            //------------------------------------------------------------------------
            $intCantCkpt = $this->objGuia->CountGuiaCkptsAsNume();
            if (!$this->objGuia->tieneCheckpoint('PU') && $intCantCkpt <= 2) {
                //------------------------------
                // Se obtiene el Checkpoint PU
                //------------------------------
                $objCheckpoint = SdeCheckpoint::Load('PU');
                if ($objCheckpoint) {
                    //-------------------------------------------
                    // Se busca la operación asignada a la Guía
                    //-------------------------------------------
                    $objOperacion = SdeOperacion::Load($this->objGuia->OperacionId);
                    if ($objOperacion) {
                        $strCodiRuta = $objOperacion->CodiRuta;
                    } else {
                        $strCodiRuta = '';
                    }
                    //----------------------------------------------
                    // Se arma el vector para grabar el Checkpoint
                    //----------------------------------------------
                    $arrDatoCkpt = array();
                    $arrDatoCkpt['NumeGuia'] = $this->objGuia->NumeGuia;
                    $arrDatoCkpt['UltiCkpt'] = '';
                    $arrDatoCkpt['GuiaAnul'] = $this->objGuia->Anulada;
                    $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                    $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt;
                    $arrDatoCkpt['CodiRuta'] = $strCodiRuta;
                    //-----------------------------------------------------------------------------------
                    // Con el vector armado, se invoca a la rutina para grabar el checkpoint de la Guía
                    //-----------------------------------------------------------------------------------
                    $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                    //-----------------------------------------------------------------
                    // Se valida si la grabación del Checkpoint ha resultado exitosa.
                    //-----------------------------------------------------------------
                    if (!$arrResuGrab['TodoOkey']) {
                        //-------------------------------------------------------------------------------
                        // Se informa al usuario que no se ha podido grabar el Checkpoint, y su motivo.
                        //-------------------------------------------------------------------------------
                        $blnTodoOkey = false;
                        $strMensErro = 'No se grabó Checkpoint Pick-Up: '.$arrResuGrab['MotiNook'].'!';
                    }
                } else {
                    //-------------------------------------------------------
                    // Se informa al usuario que el Checkpoint PU no existe
                    //-------------------------------------------------------
                    $blnTodoOkey = false;
                    $strMensErro = 'No se grabó Checkpoint Pick-Up: No existe!';
                }
            }
            //------------------------------------------------------------------------------------------
            // Si el Usuario marco el registro como "Destinatario Frecuente", los datos proporcionados
            // deben salvarse en la tabla correspondiente
            //------------------------------------------------------------------------------------------
            if ($this->chkDestFrec->Checked) {
                $blnActuDato = true;
                $objDestFrec = null;
                if (!$this->lstDestFrec->SelectedValue) {
                    //-------------------------------------------------------------------------------
                    // Si no hay un Destinatario Frecuente ya elegido, se procede a verificar la
                    // existencia de algun Destinatario con el mismo nombre.
                    //-------------------------------------------------------------------------------
                    $objClausula   = QQ::Clause();
                    $objClausula[] = QQ::Equal(QQN::DestinatarioFrecuente()->Nombre,$this->objGuia->NombDest);
                    $objClausula[] = QQ::Equal(QQN::DestinatarioFrecuente()->ClienteId,$this->objGuia->CodiClie);
                    $arrDestFrec = DestinatarioFrecuente::QueryArray(QQ::AndCondition($objClausula));
                    if ($arrDestFrec) {
                        //--------------------------------------------------
                        // Si existe alguno, actualizo el primero de ellos
                        //--------------------------------------------------
                        $objDestFrec = $arrDestFrec[0];
                    } else {
                        //-------------------------------------------------------------------
                        // Si no existe ninguno, creo un registro nuevo en la base de datos
                        //-------------------------------------------------------------------
                        $objDestFrec = new DestinatarioFrecuente();
                    }
                } else {
                    if ($this->strIdenTabl == 'D') {
                        $objDestFrec = DestinatarioFrecuente::Load($this->lstDestFrec->SelectedValue);
                    } else {
                        $blnActuDato = false;
                    }
                }
                if ($blnActuDato) {
                    $objDestFrec->ClienteId = $this->objGuia->CodiClie;
                    $objDestFrec->Nombre    = $this->objGuia->NombDest;
                    $objDestFrec->Direccion = $this->objGuia->DireDest;
                    $objDestFrec->Telefono  = $this->objGuia->TeleDest;
                    $objDestFrec->DestinoId = $this->objGuia->EstaDest;
                    $objDestFrec->Save();
                }
            }
            //---------------------------------------------------------------------
            // Si la Guia tiene a su vez una Guia Retorno relacionada, se procede
            // a crear esa Guia con datos por defecto
            //---------------------------------------------------------------------
            if (strlen($this->objGuia->GuiaRetorno)) {
                $blnGuiaReto = crearGuiaRetorno($this->objGuia);
                if (!$blnGuiaReto) {
                    if (strlen($strMensErro) > 0) {
                        $strMensErro .= ' | No se pudo crear la Guía Retorno!';
                    } else {
                        $strMensErro = 'No se pudo crear la Guía Retorno!';
                    }
                }
            }
            //---------------------------------------------------------------------------------------------
            // Si ha surgido algún error durante las últimas gestiones elaboradas luego de crear la Guía,
            // se construye el mensaje correspondiente informando la situación.
            //---------------------------------------------------------------------------------------------
            if (strlen($strMensErro) > 0) {
                $strTipoMens = 'w';
                $strIconMens = 'exclamation-triangle';
                $strMensUsua  = 'La Guía se ha creado con excepcion(es) - <b>';
                $strMensUsua .= $strMensErro;
                $strMensUsua .= '</b>.';
            }
            //---------------------------------------------------------------
            // Se muestra al usuario el mensaje obtenido durante la gestión
            //---------------------------------------------------------------
            $this->mensaje($strMensUsua,'',$strTipoMens,'i',$strIconMens);
            //--------------------------------------------------------------------------------------
            // Si la gestión de la Guía ha resultado completamente exitosa, se refrescan e inician
            // nuevamente valores de campos y criterios del programa.
            //--------------------------------------------------------------------------------------
            if ($blnTodoOkey) {
                $this->SetupGuia();
                $this->SetupValues();
                $this->btnImprGuia->Visible = true;
                $this->btnImprPodx->Visible = true;
                $this->btnImprEtiq->Visible = true;
                $this->btnNuevRegi->Visible = true;
            }
        }
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__."/cargar_guia.php");
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }
}

CargarGuia::Run('CargarGuia');
?>