<?php
//---------------------------------------------------------------------------------------
// Programa       : crear_factura.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 22/07/16 12:12 PM
// Proyecto       : newliberty
// Descripcion    : Programa que permite la gestión y control de facturación de una guía
//---------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CrearFactura extends FormularioBaseKaizen {
    /**
     * @var $objGuia Guia
     */
    protected $objGuia;
    protected $objCliePmnx;
    /**
     * @var $objFactPmnx FacturaPmn
     */
    protected $objFactPmnx;
    protected $blnEditMode;
    protected $strNumeGuia;
    protected $strModaPago;
    protected $strTipoServ;
    protected $intNumeFact;

    //---- Pre-Factura y Datos Fiscales ----
    protected $lblNumeFact;
    protected $txtCeduRifx;
    protected $txtRazoSoci;
    protected $txtDireFisc;
    protected $txtNumeTele;
    //---- Factura ----
    protected $chkTienRete;
    protected $lblFechFact;
    protected $calFechFact;
    protected $lblCreaPorx;
    protected $lblDocuFisc;
    protected $lblFactImpr;
    protected $lblMotiAnul;
    //---- Ret. ISLR ----
    protected $txtCoreIslr;
    protected $txtPorcIslr;

    protected $lblCoreIslr;
    protected $calCoreIslr;
    protected $lblPorcIslr;
    //---- Servicios ----
    protected $lblMontBase;
    protected $lblMontDcto;
    protected $lblMontFran;
    //---- Ret. IVA ----
    protected $txtCompRete;
    protected $txtPorcRete;

    protected $lblCompRete;
    protected $calCompRete;
    protected $lblPorcRete;
    //---- Otros Montos ----
    protected $lblMontSgro;
    protected $lblMontMiva;
    protected $lblMontTota;
    //---- Cobro ----
    protected $lblMontAcob;
    protected $lblMontCobr;
    protected $lblMontRest;
    //---- Items ----
    protected $dtgItemFact;

    protected $btnAnulFact;
    protected $btnCobrFact;
    protected $btnImprFact;
    protected $btnMostDxml;

    protected function SetupFactura() {
        $this->strNumeGuia = QApplication::QueryString('strNumeGuia');

        if (strlen($this->strNumeGuia)) {
            //--------------------------------------------------------------------
            // Cuando el programa se accesa con un numero de guia como parametro
            //--------------------------------------------------------------------
            $this->objGuia = Guia::Load($this->strNumeGuia);
            $this->objCliePmnx = ClientePmn::Load($this->objGuia->CedulaRif);
            if (!is_null($this->objGuia->FacturaId)) {
                //---------------------------------------------------------------------------
                // Si la guia ya esta asociada a una Factura, se lee dicha Factura en la BD
                //---------------------------------------------------------------------------
                $this->objFactPmnx = FacturaPmn::Load($this->objGuia->FacturaId);
                $this->blnEditMode = true;
            } else {
                //-----------------------------------------------------------------------------------
                // Si la guia no esta previamente asociada a una Factura, se crea un nuevo registro
                //-----------------------------------------------------------------------------------
                $this->blnEditMode = false;
                $this->objFactPmnx = new FacturaPmn();
            }
            //------------------------------------------------
            // Se determina la Modalidad de pago de la Guia
            //------------------------------------------------
            if (TipoGuiaType::ToStringCorto($this->objGuia->TipoGuia) == 'PPD') {
                $this->strModaPago = 'PPD';
            } else {
                $this->strModaPago = 'COD';
            }
            $objReceDest = Counter::LoadBySiglas($this->objGuia->ReceptoriaDestino);
            if ($objReceDest) {
                $this->strTipoServ = $objReceDest->EsRuta == SinoType::SI ? 'DOM' : 'REC';
            } else {
                $this->strTipoServ = 'REC';   // Receptoria
            }
        } else {
            //-------------------------------------------------------------------
            // Cuando el programa se accesa con un Nro de Factura como parametro
            //-------------------------------------------------------------------
            $this->intNumeFact = QApplication::QueryString('intNumeFact');
            $this->objFactPmnx = FacturaPmn::Load($this->intNumeFact);
            $this->objCliePmnx = ClientePmn::Load($this->objFactPmnx->CedulaRif);
            $this->blnEditMode = true;
            $this->objGuia     = $this->objFactPmnx->GetItemFacturaPmnAsFacturaArray()[0]->Guia;
        }
    }

    protected function Form_Create() {

        $this->SetupFactura();

        parent::Form_Create();


        $this->lblTituForm->Text = 'Crear una Factura';

        //---- Pre-Factura y Datos Fiscales ----
        $this->lblNumeFact_Create();
        $this->txtCeduRifx_Create();
        $this->txtRazoSoci_Create();
        $this->txtDireFisc_Create();
        $this->txtNumeTele_Create();
        //---- Factura ----
        $this->chkTienRete_Create();
        $this->lblFechFact_Create();
        $this->calFechFact_Create();
        $this->lblCreaPorx_Create();
        $this->lblDocuFisc_Create();
        $this->lblFactImpr_Create();
        $this->lblMotiAnul_Create();
        //---- Ret. ISLR ----
        $this->txtCoreIslr_Create();
        $this->txtPorcIslr_Create();
        $this->lblCoreIslr_Create();
        $this->calCoreIslr_Create();
        $this->lblPorcIslr_Create();
        //---- Servicios ----
        $this->lblMontBase_Create();
        $this->lblMontDcto_Create();
        $this->lblMontFran_Create();
        //---- Ret. IVA ----
        $this->txtCompRete_Create();
        $this->txtPorcRete_Create();
        $this->lblCompRete_Create();
        $this->calCompRete_Create();
        $this->lblPorcRete_Create();
        //---- Otros montos ----
        $this->lblMontSgro_Create();
        $this->lblMontMiva_Create();
        $this->lblMontTota_Create();
        //---- Cobro ----
        $this->lblMontACob_Create();
        $this->lblMontCobr_Create();
        $this->lblMontRest_Create();

        //---------
        // Botones
        //---------
        $this->btnSave->Text = TextoIcono('save','Guardar','F','lg');

        $this->btnAnulFact_Create();
        $this->btnCobrFact_Create();
        $this->btnImprFact_Create();
        $this->btnMostDxml_Create();

        if (!$this->blnEditMode) {
            //-------------------------------------------
            // Se crean y salvan los datos de la Factura
            //-------------------------------------------
            $this->CrearNuevaFactura();
        } else {
            $this->CargarDatosDeLaFactura();
            $this->btnImprFact->Visible = $this->FacturaValidaParaImprimir();
        }

        $this->controlDeStatus();
        $this->controlDeBotones();


        $strTextMens = '';
        if (($this->lblMontRest->Text != 0) && ($this->objFactPmnx->ImpresaId == SinoType::NO)) {
            $strTextMens = 'Esta pantalla permite <b>Confirmar/Cambiar los Datos Fiscales</b> ';
            $strTextMens .= 'que serán impresos en la factura.  Presione <b>Guardar</b> únicamente ';
            $strTextMens .= 'si va a facturar la guia';
        }
        if (($this->lblMontRest->Text == 0) && ($this->objFactPmnx->ImpresaId == SinoType::NO)) {
            $strTextMens  = 'Pre-Factura cobrada; utilice el <b>IFis</b> para emitir la Factura y luego ';
            $strTextMens .= 'presione el boton <b>C.D.F.</b> para obtener los datos de la impresora fiscal';
        }
        $this->mensaje($strTextMens,'','i','',__iEXCL__);
    }

    //---------------------
    // Creando objetos ...
    //---------------------

    protected function lblNumeFact_Create() {
        $this->lblNumeFact = new QLabel($this);
        $this->lblNumeFact->Name = 'Id';
        if (!$this->blnEditMode) {
            $this->lblNumeFact->Text = '';
        } else {
            $this->lblNumeFact->Text = $this->objFactPmnx->Id;
        }
        $this->lblNumeFact->ForeColor = 'red';
    }

    protected function txtCeduRifx_Create() {
        $this->txtCeduRifx = new QTextBox($this);
        $this->txtCeduRifx->Name = 'Cedula/RIF';
        $this->txtCeduRifx->Width = 90;
        $this->txtCeduRifx->Required = true;
        $this->txtCeduRifx->SetCustomAttribute('onblur', "this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            if ($this->strModaPago == 'PPD') {
                $this->txtCeduRifx->Text = $this->objCliePmnx->CedulaRif;
            } else {
                $this->txtCeduRifx->Text = $this->objGuia->CedulaDestinatario;
            }
        } else {
            $this->txtCeduRifx->Text = $this->objFactPmnx->CedulaRif;
        }
    }

    protected function txtRazoSoci_Create() {
        $this->txtRazoSoci = new QTextBox($this);
        $this->txtRazoSoci->Name = 'Razón Social';
        $this->txtRazoSoci->Width = 180;
        $this->txtRazoSoci->Required = true;
        $this->txtRazoSoci->Placeholder = 'Razón Social';
        $this->txtRazoSoci->SetCustomAttribute('onblur', "this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            if ($this->strModaPago == 'PPD') {
                $this->txtRazoSoci->Text = $this->objCliePmnx->__toString();
            } else {
                $this->txtRazoSoci->Text = $this->objGuia->NombDest;
            }
        } else {
            $this->txtRazoSoci->Text = $this->objFactPmnx->RazonSocial;
        }
    }

    protected function txtDireFisc_Create() {
        $this->txtDireFisc = new QTextBox($this);
        $this->txtDireFisc->Name = 'Direccion Fisc.';
        $this->txtDireFisc->Width = 250;
        $this->txtDireFisc->Required = true;
        $this->txtDireFisc->Placeholder = 'Dirección Fiscal';
        $this->txtDireFisc->SetCustomAttribute('onblur', "this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            if ($this->strModaPago == 'PPD') {
                $this->txtDireFisc->Text = $this->objCliePmnx->Direccion;
            } else {
                $this->txtDireFisc->Text = $this->objGuia->DireDest;
            }
        } else {
            $this->txtDireFisc->Text = $this->objFactPmnx->DireccionFiscal;
        }
    }

    protected function txtNumeTele_Create() {
        $this->txtNumeTele = new QTextBox($this);
        $this->txtNumeTele->Name = 'Telefono';
        $this->txtNumeTele->Width = 100;
        $this->txtNumeTele->Required = true;
        $this->txtNumeTele->Placeholder = 'Solo números';
        if (!$this->blnEditMode) {
            if ($this->strModaPago == 'PPD') {
                $this->txtNumeTele->Text = $this->objCliePmnx->TelefonoMovil;
            } else {
                $this->txtNumeTele->Text = $this->objGuia->TeleDest;
            }
        } else {
            $this->txtNumeTele->Text = $this->objFactPmnx->Telefono;
        }
    }

    //---- Factura ----

    protected function chkTienRete_Create() {
        $this->chkTienRete = new QCheckBox($this);
        $this->chkTienRete->Name = 'Tiene Ret.';
        if ($this->blnEditMode) {
            $this->chkTienRete->Checked = $this->objFactPmnx->TieneRetencion ? true : false;
        }
        $this->chkTienRete->AddAction(new QChangeEvent(), new QAjaxAction('chkTienRete_Change'));
    }

    protected function lblFechFact_Create() {
        $this->lblFechFact = new QLabel($this);
        $this->lblFechFact->Name = 'Creada El';
        $this->lblFechFact->Width = 90;
        $calFechDHoy = new QDateTime(QDateTime::Now);
        if (!$this->blnEditMode) {
            $this->lblFechFact->Text = $calFechDHoy->__toString("DD/MM/YYYY");
        } else {
            $this->lblFechFact->Text = $this->objFactPmnx->CreadaEl->__toString("DD/MM/YYYY");
        }
        $this->lblFechFact->ForeColor = 'blue';
    }

    protected function calFechFact_Create() {
        $this->calFechFact = new QCalendar($this);
        $this->calFechFact->Name = 'Creada El';
        $this->calFechFact->Width = 90;
        $calFechDHoy = new QDateTime(QDateTime::Now);
        if (!$this->blnEditMode) {
            $this->calFechFact->DateTime = $calFechDHoy;
        } else {
            $this->calFechFact->DateTime = $this->objFactPmnx->CreadaEl;
        }
        $this->calFechFact->ForeColor = 'blue';
    }

    protected function lblCreaPorx_Create() {
        $this->lblCreaPorx = new QLabel($this);
        $this->lblCreaPorx->Name = 'Creada Por';
        $this->lblCreaPorx->Width = 60;
        if (!$this->blnEditMode) {
            $this->lblCreaPorx->Text = $this->objUsuario->__toString();
        } else {
            $this->lblCreaPorx->Text = $this->objFactPmnx->CreadaPorObject->LogiUsua;
        }
        $this->lblCreaPorx->Enabled = false;
        $this->lblCreaPorx->ForeColor = 'blue';
    }

    protected function lblDocuFisc_Create() {
        $this->lblDocuFisc = new QLabel($this);
        $this->lblDocuFisc->Name = 'Numero';
        $this->lblDocuFisc->Width = 80;
        if (!$this->blnEditMode) {
            $this->lblDocuFisc->Text = '';
        } else {
            $this->lblDocuFisc->Text = $this->objFactPmnx->Numero;
        }
        $this->lblDocuFisc->Enabled = false;
        $this->lblDocuFisc->ForeColor = 'blue';
    }

    protected function lblFactImpr_Create() {
        $this->lblFactImpr = new QLabel($this);
        $this->lblFactImpr->Name = 'Impresa ?';
        $this->lblFactImpr->Width = 30;
        if (!$this->blnEditMode) {
            $this->lblFactImpr->Text = '';
        } else {
            $this->lblFactImpr->Text = SinoType::ToString($this->objFactPmnx->ImpresaId);
        }
        $this->lblFactImpr->Enabled = false;
        $this->lblFactImpr->ForeColor = 'blue';
    }

    protected function lblMotiAnul_Create() {
        $this->lblMotiAnul = new QLabel($this);
        $this->lblMotiAnul->Name = 'Anulada Por';
        $this->lblMotiAnul->Width = 190;
        if (!$this->blnEditMode) {
            $this->lblMotiAnul->Text = '';
        } else {
            $this->lblMotiAnul->Text = $this->objFactPmnx->MotivoAnulacion;
        }
        $this->lblMotiAnul->Enabled = false;
        $this->lblMotiAnul->ForeColor = 'blue';
    }

    //---- Ret. ISLR ----

    protected function txtCoreIslr_Create() {
        $this->txtCoreIslr = new QTextBox($this);
        $this->txtCoreIslr->Name = 'Comp. Ret.';
        $this->txtCoreIslr->Width = 100;
        if (!$this->blnEditMode) {
            $this->txtCoreIslr->Text = '';
        } else {
            $this->txtCoreIslr->Text = $this->objFactPmnx->ComprobanteRetencionIslr;
        }
    }

    protected function txtPorcIslr_Create() {
        $this->txtPorcIslr = new QFloatTextBox($this);
        $this->txtPorcIslr->Name = '% Ret.';
        $this->txtPorcIslr->Width = 25;
        $this->txtPorcIslr->AddAction(new QKeyPressEvent(500), new QAjaxAction('txtPorcIslr_Change'));
        $this->txtPorcIslr->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $this->txtPorcIslr->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        if (!$this->blnEditMode) {
            $this->txtPorcIslr->Text = 0;
        } else {
            $this->txtPorcIslr->Text = $this->objFactPmnx->PorcentajeReteIslr;
        }
    }

    protected function lblCoreIslr_Create() {
        $this->lblCoreIslr = new QLabel($this);
        $this->lblCoreIslr->Name = 'Comp. Ret.';
        $this->lblCoreIslr->Width = 100;
        if (!$this->blnEditMode) {
            $this->lblCoreIslr->Text = '';
        } else {
            $this->lblCoreIslr->Text = $this->objFactPmnx->ComprobanteRetencionIslr;
        }
    }

    protected function calCoreIslr_Create() {
        $this->calCoreIslr = new QCalendar($this);
        $this->calCoreIslr->Name = 'Fec. Comp.';
        $this->calCoreIslr->Width = 90;
        if (!$this->blnEditMode) {
            $this->calCoreIslr->DateTime = null;
        } else {
            $this->calCoreIslr->DateTime = $this->objFactPmnx->FechaComprobanteIslr;
        }
    }

    protected function lblPorcIslr_Create() {
        $this->lblPorcIslr = new QLabel($this);
        $this->lblPorcIslr->Name = '% Ret.';
        $this->lblPorcIslr->Width = 25;
        $this->lblPorcIslr->AddAction(new QKeyPressEvent(500), new QAjaxAction('lblPorcIslr_Change'));
        $this->lblPorcIslr->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $this->lblPorcIslr->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        if (!$this->blnEditMode) {
            $this->lblPorcIslr->Text = 0;
        } else {
            $this->lblPorcIslr->Text = $this->objFactPmnx->PorcentajeReteIslr;
        }
    }

    //---- Servicios ----

    protected function lblMontBase_Create() {
        $this->lblMontBase = new QLabel($this);
        $this->lblMontBase->Name = 'Base';
        if (!$this->blnEditMode) {
            $this->lblMontBase->Text = 0;
        } else {
            $this->lblMontBase->Text = $this->objFactPmnx->MontoBase;
        }
    }

    protected function lblMontDcto_Create() {
        $this->lblMontDcto = new QLabel($this);
        $this->lblMontDcto->Name = 'Dscto.';
        if (!$this->blnEditMode) {
            $this->lblMontDcto->Text = 0;
        } else {
            $this->lblMontDcto->Text = $this->objFactPmnx->MontoDscto;
        }
    }

    protected function lblMontFran_Create() {
        $this->lblMontFran = new QLabel($this);
        $this->lblMontFran->Name = 'Franq.';
        if (!$this->blnEditMode) {
            $this->lblMontFran->Text = 0;
        } else {
            $this->lblMontFran->Text = $this->objFactPmnx->MontoFranqueo;
        }
    }

    //---- Ret. IVA ----

    protected function txtCompRete_Create() {
        $this->txtCompRete = new QTextBox($this);
        $this->txtCompRete->Name = 'Comp. Ret.';
        $this->txtCompRete->Width = 100;
        if (!$this->blnEditMode) {
            $this->txtCompRete->Text = '';
        } else {
            $this->txtCompRete->Text = $this->objFactPmnx->ComprobanteRetencion;
        }
    }

    protected function calCompRete_Create() {
        $this->calCompRete = new QCalendar($this);
        $this->calCompRete->Name = 'Fec. Comp.';
        $this->calCompRete->Width = 90;
        if (!$this->blnEditMode) {
            $this->calCompRete->DateTime = null;
        } else {
            $this->calCompRete->DateTime = $this->objFactPmnx->FechaComprobante;
        }
    }

    protected function txtPorcRete_Create() {
        $this->txtPorcRete = new QFloatTextBox($this);
        $this->txtPorcRete->Name = '% Ret.';
        $this->txtPorcRete->Width = 25;
        $this->txtPorcRete->AddAction(new QKeyPressEvent(500), new QAjaxAction('txtPorcRete_Change'));
        $this->txtPorcRete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $this->txtPorcRete->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        if (!$this->blnEditMode) {
            $this->txtPorcRete->Text = 0;
        } else {
            $this->txtPorcRete->Text = $this->objFactPmnx->PorcentajeReteIva;
        }
    }

    protected function lblCompRete_Create() {
        $this->lblCompRete = new QLabel($this);
        $this->lblCompRete->Name = 'Comp. Ret.';
        $this->lblCompRete->Width = 100;
        if (!$this->blnEditMode) {
            $this->lblCompRete->Text = '';
        } else {
            $this->lblCompRete->Text = $this->objFactPmnx->ComprobanteRetencion;
        }
    }

    protected function lblPorcRete_Create() {
        $this->lblPorcRete = new QLabel($this);
        $this->lblPorcRete->Name = '% Ret.';
        $this->lblPorcRete->Width = 25;
        $this->lblPorcRete->AddAction(new QKeyPressEvent(500), new QAjaxAction('lblPorcRete_Change'));
        $this->lblPorcRete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $this->lblPorcRete->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        if (!$this->blnEditMode) {
            $this->lblPorcRete->Text = 0;
        } else {
            $this->lblPorcRete->Text = $this->objFactPmnx->PorcentajeReteIva;
        }
    }

    //---- Otros montos ----

    protected function lblMontSgro_Create() {
        $this->lblMontSgro = new QLabel($this);
        $this->lblMontSgro->Name = 'Seguro';
        if (!$this->blnEditMode) {
            $this->lblMontSgro->Text = 0;
        } else {
            $this->lblMontSgro->Text = $this->objFactPmnx->MontoSeguro;
        }
    }

    protected function lblMontMiva_Create() {
        $this->lblMontMiva = new QLabel($this);
        $this->lblMontMiva->Name = 'I.V.A.';
        if (!$this->blnEditMode) {
            $this->lblMontMiva->Text = 0;
        } else {
            $this->lblMontMiva->Text = $this->objFactPmnx->MontoIva;
        }
    }

    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Name = 'Total';
        if (!$this->blnEditMode) {
            $this->lblMontTota->Text = 0;
        } else {
            $this->lblMontTota->Text = $this->objFactPmnx->MontoTotal;
        }
    }

    //---- Cobro ----

    protected function lblMontAcob_Create() {
        $this->lblMontAcob = new QLabel($this);
        $this->lblMontAcob->Name = 'Monto';
        if (!$this->blnEditMode) {
            $this->lblMontAcob->Text = 0;
        } else {
            $this->lblMontAcob->Text = $this->objFactPmnx->MontoTotal;
        }
    }

    protected function lblMontCobr_Create() {
        $this->lblMontCobr = new QLabel($this);
        $this->lblMontCobr->Name = 'Cobrado';
        if (!$this->blnEditMode) {
            $this->lblMontCobr->Text = 0;
        } else {
            $this->lblMontCobr->Text = $this->objFactPmnx->MontoCobrado;
        }
    }

    protected function lblMontRest_Create() {
        $this->lblMontRest = new QLabel($this);
        $this->lblMontRest->Name = 'Deuda';
        if (!$this->blnEditMode) {
            $this->lblMontRest->Text = 0;
        } else {
            $decMontRest = $this->objFactPmnx->MontoTotal - $this->objFactPmnx->MontoCobrado;
            $this->lblMontRest->Text = (string) $decMontRest;
        }
    }

    //---- Items ----

    protected function dtgItemFact_Create() {
        $this->dtgItemFact = new QDataGrid($this);
        $this->dtgItemFact->CellPadding = 0;
        $this->dtgItemFact->CellSpacing = 0;
        $this->dtgItemFact->FontSize    = 12;

        $colCodiItem = new QDataGridColumn('ID', '<?= $_ITEM->Id ?>');
        $colCodiItem->Width = 100;
        $colCodiItem->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colCodiItem);

        $colItemGuia = new QDataGridColumn('Guia', '<?= $_ITEM->GuiaId ?>');
        $colItemGuia->Width = 150;
        $colItemGuia->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemGuia);

        $colItemBase = new QDataGridColumn('Monto Base', '<?= $_ITEM->MontoBase ?>');
        $colItemBase->Width = 150;
        $colItemBase->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemBase);

        $colItemPdes = new QDataGridColumn('% Dscto', '<?= $_ITEM->PorcentajeDscto ?>');
        $colItemPdes->Width = 150;
        $colItemPdes->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemPdes);

        $colItemMdes = new QDataGridColumn('Dscto', '<?= $_ITEM->MontoDscto ?>');
        $colItemMdes->Width = 150;
        $colItemMdes->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemMdes);

        $colItemFran = new QDataGridColumn('Franq Post', '<?= $_ITEM->MontoFranqueo ?>');
        $colItemFran->Width = 150;
        $colItemFran->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemFran);

        $colItemPiva = new QDataGridColumn('% IVA', '<?= $_ITEM->PorcentajeIva ?>');
        $colItemPiva->Width = 150;
        $colItemPiva->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemPiva);

        $colItemMiva = new QDataGridColumn('I.V.A.', '<?= $_ITEM->MontoIva ?>');
        $colItemMiva->Width = 150;
        $colItemMiva->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemMiva);

        $colItemSgro = new QDataGridColumn('Seguro', '<?= $_ITEM->MontoSeguro ?>');
        $colItemSgro->Width = 150;
        $colItemSgro->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemSgro);

        $colitemTota = new QDataGridColumn('Monto Total', '<?= $_ITEM->MontoTotal ?>');
        $colitemTota->Width = 150;
        $colitemTota->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colitemTota);

        // Let's pre-default the sorting by id (column index #0) and use AJAX
        $this->dtgItemFact->SortColumnIndex = 0;
        $this->dtgItemFact->UseAjax = true;

        // Specify the DataBinder method for the DataGrid
        $this->dtgItemFact->SetDataBinder('dtgItemFact_Bind');
    }

    protected function btnAnulFact_Create() {
        $this->btnAnulFact = new QButtonD($this);
        if ($this->objFactPmnx->ImpresaId == SinoType::NO) {
            $this->btnAnulFact->Text = TextoIcono('ban','Anular','F','lg');
        } else {
            $this->btnAnulFact->Text = TextoIcono('exclamation-circle','NDC','F','lg');
        }
        $this->btnAnulFact->Width = 85;
        $this->btnAnulFact->AddAction(new QClickEvent(), new QAjaxAction('btnAnulFact_Click'));
    }

    protected function btnCobrFact_Create() {
        $this->btnCobrFact = new QButtonI($this);
        $this->btnCobrFact->Text = TextoIcono('paypal','Cobrar','F','lg');
        $this->btnCobrFact->Width = 85;
        $this->btnCobrFact->AddAction(new QClickEvent(), new QAjaxAction('btnCobrFact_Click'));
        $this->btnCobrFact->CausesValidation = false;
    }

    protected function btnImprFact_Create() {
        $this->btnImprFact = new QButtonP($this);
        $this->btnImprFact->Text = TextoIcono('print','C.D.F.','F','lg');
        $this->btnImprFact->AddAction(new QClickEvent(), new QAjaxAction('btnImprFact_Click'));
    }

    protected function btnMostDxml_Create() {
        $this->btnMostDxml = new QButtonW($this);
        $this->btnMostDxml->Text = TextoIcono('eye','XML','F','lg');
        $this->btnMostDxml->AddAction(new QClickEvent(), new QAjaxAction('btnMostDxml_Click'));
        $this->btnMostDxml->Visible = false;
        if (in_array($this->objUsuario->LogiUsua,array('ddurand'))) {
            $this->btnMostDxml->Visible = true;
        }
    }

    //-----------------------------------
    // Funciones asociadas a los objetos
    //-----------------------------------

    protected function controlDeBotones() {
        if (!$this->blnEditMode) {
            $this->btnAnulFact->Visible = false;
            $this->btnCobrFact->Visible = false;
        } else {
            $this->btnAnulFact->Visible = true;
            $this->btnCobrFact->Visible = true;
        }
    }

    protected function btnMostDxml_Click() {
        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $strDurlDxml = 'http://localhost/liberty/ws/cliente.php?NombRuti=factura&id='.$this->lblNumeFact->Text;
            QApplication::Redirect($strDurlDxml);
        } else {
            //$this->mensaje($_SERVER['SERVER_NAME']);
            $strDurlDxml = 'http://www.app-goldsist.com/liberty/ws/cliente.php?NombRuti=factura&id='.$this->lblNumeFact->Text;
            QApplication::Redirect($strDurlDxml);
        }
    }

    protected function chkTienRete_Change() {
        if ($this->chkTienRete->Checked) {
            $this->btnImprFact->Visible = true;
        } else {
            if ($this->lblMontRest->Text > 0) {
                $this->btnImprFact->Visible = false;
            } else {
                if (strlen($this->lblDocuFisc->Text) == 0) {
                    $this->btnImprFact->Visible = false;
                }
            }
        }
    }

    protected function txtPorcIslr_Change() {
        if (is_numeric($this->txtPorcIslr->Text) || strlen($this->txtPorcIslr->Text) == 0) {
            $decPorcIslr = $this->txtPorcIslr->Text;
            $decMontRete = $decPorcIslr * $this->objFactPmnx->MontoBase / 100;
            $this->lblMontBase->Text = round($this->objFactPmnx->MontoBase - $decMontRete,2);
            //--------------------------------------
            // Se actualiza la Factura en la BD
            //--------------------------------------
            $this->objFactPmnx->ComprobanteRetencionIslr = $this->txtCoreIslr->Text;
            $this->objFactPmnx->FechaComprobanteIslr = new QDateTime($this->calCoreIslr->DateTime);
            $this->objFactPmnx->PorcentajeReteIslr = $decPorcIslr;
            $this->objFactPmnx->ActualizarMontos();
            $this->MostrarMontos();
        }
    }

    protected function txtPorcRete_Change() {
        if (is_numeric($this->txtPorcRete->Text) || strlen($this->txtPorcRete->Text) == 0) {
            $decPorcRete = $this->txtPorcRete->Text;
            $decMontRete = $decPorcRete * $this->objFactPmnx->MontoIva / 100;
            $this->lblMontMiva->Text = round($this->objFactPmnx->MontoIva - $decMontRete,2);
            //--------------------------------------
            // Se actualiza la Factura en la BD
            //--------------------------------------
            $this->objFactPmnx->ComprobanteRetencion = $this->txtCompRete->Text;
            $this->objFactPmnx->FechaComprobante = new QDateTime($this->calCompRete->DateTime);
            $this->objFactPmnx->PorcentajeReteIva = $decPorcRete;
            $this->objFactPmnx->ActualizarMontos();
            $this->MostrarMontos();
        }
    }

    protected function btnSave_Click() {
        t('========================');
        t('En el Save de la Factura');
        $strCeduRifx = DejarNumerosVJGuion($this->txtCeduRifx->Text);
        $strRazoSoci = limpiarCadena($this->txtRazoSoci->Text);
        $strDireFisc = limpiarCadena($this->txtDireFisc->Text);
        $strNumeTele = DejarSoloLosNumeros($this->txtNumeTele->Text);
        $blnHuboErro = false;
        $strMensErro = '';

        t('Creando proceso de errores');
        $strNombProc = 'Creando Factura Exp Nac. Guia Nro: '.$this->objGuia->NumeGuia;
        $objProcEjec = CrearProceso($strNombProc);
        $mixErroOrig = error_reporting();
        error_reporting(0);
        try {
            $this->objFactPmnx->CedulaRif        = $strCeduRifx;
            $this->objFactPmnx->RazonSocial      = $strRazoSoci;
            $this->objFactPmnx->DireccionFiscal  = $strDireFisc;
            $this->objFactPmnx->Telefono         = $strNumeTele;
            $this->objFactPmnx->TieneRetencion   = $this->chkTienRete->Checked ? 1 : 0;
            $this->objFactPmnx->Save();
        } catch (Exception $e) {
            $this->mensaje($e->getMessage(),'m','d','',__iHAND__);
            $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'Factura Exp Nac: '.$this->lblNumeFact->Text;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falló la creación de la Factura';
            GrabarError($arrParaErro);
            return;
        }
        //------------------------------------------------------------------------------------------------
        // La razon social de la factura, puede ser diferente al remitente y al destinatario de la guia,
        // por ese motivo, se revisa la existencia en la base de datos y en caso de no existir, se crea
        //------------------------------------------------------------------------------------------------
        t('Verificando el Cliente');
        $objCliePmnx = ClientePmn::Load($this->txtCeduRifx->Text);
        try {
            if (!$objCliePmnx) {
                $objCliePmnx = new ClientePmn();
                $objCliePmnx->SucursalId    = $this->objUsuario->CodiEsta;
                $objCliePmnx->RegistradoPor = $this->objUsuario->CodiUsua;
                $objCliePmnx->RegistradoEl  = new QDateTime(QDateTime::Now);
            }
            $objCliePmnx->CedulaRif     = $strCeduRifx;
            $objCliePmnx->Nombre        = $strRazoSoci;
            $objCliePmnx->TelefonoFijo  = $strNumeTele;
            $objCliePmnx->TelefonoMovil = $strNumeTele;
            $objCliePmnx->Direccion     = $strDireFisc;
            $objCliePmnx->Save();
        } catch (Exception $e) {
            $strMensErro .= $e->getMessage();
            $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'Cliente Exp Nac: '.$this->txtCeduRifx->Text;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falló el Save del Cliente Exp Nac';
            GrabarError($arrParaErro);
            $blnHuboErro = true;
        }
        //---------------------------------------------------------------
        // Se actualiza la guia asociandola con el Id de la Pre-Factura
        //---------------------------------------------------------------
        if (!$this->blnEditMode) {
            $this->objGuia->FacturaId = $this->objFactPmnx->Id;
            $this->objGuia->Save();
            /*
            t('La guia es: '.TipoGuiaType::ToStringCorto($this->objGuia->TipoGuia));
            if (TipoGuiaType::ToStringCorto($this->objGuia->TipoGuia) == 'COD') {
                t('La guia: '.$this->objGuia->NumeGuia.' es COD, asi que voy a grabar el POD');
                //-----------------------------------------
                // La guia facturada, se da por entregada
                //-----------------------------------------
                try {
                    t('Entrando al try');
                    $objCkptOkey = SdeCheckpoint::Load('OK');
                    $calFechEntr = new QDateTime(QDateTime::Now);
                    $arrDatoPodx['objGuiaPodx'] = $this->objGuia;
                    $arrDatoPodx['objChecPodx'] = $objCkptOkey;
                    $arrDatoPodx['calFechPodx'] = $calFechEntr;
                    $arrDatoPodx['txtHoraPodx'] = date('H:i');
                    $arrDatoPodx['txtUsuaPodx'] = $this->objUsuario->CodiUsua;
                    $arrDatoPodx['txtEntrAqui'] = $strRazoSoci;
                    $arrDatoPodx['calFechEntr'] = $calFechEntr;
                    $arrDatoPodx['txtFechEntr'] = date('d/m/Y');
                    $arrDatoPodx['txtHoraEntr'] = date('H:i');
                    $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
                    t('POD grabado');
                    if (!$arrResuPodx['blnTodoOkey']) {
                        throw new Exception($arrResuPodx['strMensUsua']);
                    }
                } catch (Exception $e) {
                    //$this->mensaje($e->getMessage(),'m','d','',__iHAND__);
                    $strMensErro .= $e->getMessage();
                    $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $this->objGuia->NumeGuia;
                    $arrParaErro['MensErro'] = $e->getMessage();
                    $arrParaErro['ComeErro'] = 'Falló el POD automático en la Facturación';
                    GrabarError($arrParaErro);
                    t('Hubo algun error');
                    $blnHuboErro = true;
                }
            }
            */
        }
        //----------------------------------------------------------------
        // Se activan los botones que permiten operar con la Pre-Factura
        //----------------------------------------------------------------
        $this->btnAnulFact->Visible = true;
        $this->btnCobrFact->Visible = true;
        //-----------------------------------------------------------
        // Se activa el boton que permite agregar nuevos Items
        //-----------------------------------------------------------
        $this->blnEditMode = true;
        error_reporting($mixErroOrig);
        if (!$blnHuboErro) {
            $strTextMens = 'Los datos fiscales han sido guardados, proceda al cobro de la pre-factura !';
            //$this->mensaje('Transacción Exitosa !','','','',__iCHEC__);
            $this->mensaje($strTextMens,'','','',__iCHEC__);
        } else {
            $this->mensaje($strMensErro,'','w','',__iEXCL__);
        }
        $this->controlDeBotones();
    }

    protected function btnAnulFact_Click($strFormId, $strControlId, $strParameter) {
        //--------------------------------------------------------------------------
        // Si el registro no esta "Impreso", se trata realmente de una pre-factura
        //--------------------------------------------------------------------------
        t('Factura Impresa: '.$this->objFactPmnx->ImpresaId);
        if ($this->objFactPmnx->ImpresaId == SinoType::NO) {
            t('Voy al Cancel_Click');
            $this->btnCancel_Click();
            t('Regresé del Cancel_Click');
        } else {
            //--------------------------------------------------------------------------
            // Si el registro esta "Impreso", se debe emitir una Nota de Credito
            //--------------------------------------------------------------------------
            QApplication::Redirect(__SIST__.'/crear_nota_credito.php?intFactNdcx='.$this->objFactPmnx->Id);            
        }
   }

    protected function btnCancel_Click() {
        if (($this->objFactPmnx->ImpresaId == SinoType::NO) && ($this->lblMontRest->Text == 0)) {
            $strTextMens = 'Cobro registrado, si realmente desea Anular la Factura, elimine dicho Cobro manualmente';
            $this->mensaje($strTextMens,'','d','',__iHAND__);
            return;
        }
        //t('Voy a Borrar la Factura');
        $this->objFactPmnx->BorrarFactura();
        //t('Regrese de Borrar la Factura');

        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/consulta_guia.php/".$this->objGuia->NumeGuia);
    }

    protected function btnCobrFact_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__SIST__.'/registrar_pago.php/'.$this->objFactPmnx->Id);
    }

    protected function btnImprFact_Click() {
        //------------------------------------------
        // Se muestran los campos en la pantalla
        //------------------------------------------
        $this->objFactPmnx       = FacturaPmn::Load($this->lblNumeFact->Text);
        $this->lblDocuFisc->Text = $this->objFactPmnx->Numero;
        $this->lblFactImpr->Text = SinoType::ToString($this->objFactPmnx->ImpresaId);
        if ($this->lblFactImpr->Text == SinoType::SI) {
            $this->controlDeStatus();
            $this->dtgItemFact->Refresh();
        } else {
            QApplication::Redirect(__SIST__.'/simular_impresion.php/F/'.$this->objFactPmnx->Id);
        }
    }

    protected function dtgItemFact_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::ItemFacturaPmn()->FacturaId, $this->lblNumeFact->Text);
        $arrItemFact   = ItemFacturaPmn::QueryArray(QQ::AndCondition($objClauWher));

        // Bind the datasource to the datagrid
        $this->dtgItemFact->DataSource = $arrItemFact;
    }

    protected function controlDeStatus() {
        if ($this->lblFactImpr->Text == 'SI') {
            //----------------------------------------------------------------------
            // Si la Factura esta Impresa, no se podran alterar los datos fiscales
            //----------------------------------------------------------------------
            $this->txtCeduRifx->Enabled = false;
            $this->txtCeduRifx->ForeColor = 'blue';
            $this->txtRazoSoci->Enabled = false;
            $this->txtRazoSoci->ForeColor = 'blue';
            $this->txtDireFisc->Enabled = false;
            $this->txtDireFisc->ForeColor = 'blue';
            $this->txtNumeTele->Enabled = false;
            $this->txtNumeTele->ForeColor = 'blue';
            $this->chkTienRete->Enabled = false;
            $this->chkTienRete->ForeColor = 'blue';

            $this->txtCoreIslr->Enabled = false;
            $this->txtCoreIslr->ForeColor = 'blue';
            $this->calCoreIslr->Enabled = false;
            $this->calCoreIslr->ForeColor = 'blue';
            $this->txtPorcIslr->Enabled = false;
            $this->txtPorcIslr->ForeColor = 'blue';

            $this->txtCompRete->Enabled = false;
            $this->txtCompRete->ForeColor = 'blue';
            $this->calCompRete->Enabled = false;
            $this->calCompRete->ForeColor = 'blue';
            $this->txtPorcRete->Enabled = false;
            $this->txtPorcRete->ForeColor = 'blue';

            $this->btnSave->Visible = false;
            $this->btnAnulFact->Text = TextoIcono('exclamation-circle','NDC','F','lg');
        }
        if (strlen($this->lblMotiAnul->Text) > 0) {
            //----------------------------------------------------------------------
            // Si la Factura esta Anulada, no se podran alterar los datos fiscales
            //----------------------------------------------------------------------
            $this->txtCeduRifx->Enabled = false;
            $this->txtCeduRifx->ForeColor = 'blue';
            $this->txtRazoSoci->Enabled = false;
            $this->txtRazoSoci->ForeColor = 'blue';
            $this->txtDireFisc->Enabled = false;
            $this->txtDireFisc->ForeColor = 'blue';
            $this->txtNumeTele->Enabled = false;
            $this->txtNumeTele->ForeColor = 'blue';
            //------------------------------------------------------
            // Tampoco se podra Guardar, Anular, Imprimir o Cobrar
            //------------------------------------------------------
            $this->btnSave->Visible = false;
            $this->btnImprFact->Visible = false;
            $this->btnCobrFact->Visible = false;
            //-------------------------------------------------------
            // Tampoco se podran digitar datos de las Retenciones
            //-------------------------------------------------------
            $this->txtCoreIslr->Enabled = false;
            $this->txtCoreIslr->ForeColor = 'blue';
            $this->calCoreIslr->Enabled = false;
            $this->calCoreIslr->ForeColor = 'blue';
            $this->txtPorcIslr->Enabled = false;
            $this->txtPorcIslr->ForeColor = 'blue';
            $this->txtCompRete->Enabled = false;
            $this->txtCompRete->ForeColor = 'blue';
            $this->calCompRete->Enabled = false;
            $this->calCompRete->ForeColor = 'blue';
            $this->txtPorcRete->Enabled = false;
            $this->txtPorcRete->ForeColor = 'blue';
            //---------------------------------------------------
            // Tampoco se podran editar los Items de la Factura
            //---------------------------------------------------
            $this->chkTienRete->Enabled = false;
            $this->chkTienRete->ForeColor = 'blue';
        }
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------

    protected function CrearNuevaFactura() {
        //t('======================================');
        //t('Creando Factura en el Expreso Nacional');
        //t('Los montos de la Guia son:');
        //t('El % de IVA   :'.$this->objGuia->PorcentajeIva);
        //t('Monto Base    :'.$this->objGuia->MontoBase);
        //t('Monto Franqueo:'.$this->objGuia->MontoFranqueo);
        //t('Monto Iva     :'.$this->objGuia->MontoIva);
        //t('Monto Seguro  :'.$this->objGuia->MontoSeguro);
        //t('Monto Otros   :'.$this->objGuia->MontoOtros);
        //t('Monto Total   :'.$this->objGuia->MontoTotal);
        //---------------------------------------------------------------------------------
        // A partir del 1ero de Septiembre, la Tasa de IVA que se debe aplicar es del 16%
        //---------------------------------------------------------------------------------
        $dttFechDhoy = FechaDeHoy();
        $decTasaVige = FacImpuesto::LoadImpuestoVigente('IVA',$dttFechDhoy);
        if ($this->objGuia->PorcentajeIva != $decTasaVige) {
            t('*** La guia necesita recalculo ***');
            //-----------------------------------------------------------------------
            // Si el IVA de la Guia difiere del IVA Vigente, se recalcula la tarifa
            //-----------------------------------------------------------------------
            //$this->objGuia->PorcentajeIva = $decTasaVige;
            $this->objGuia->PorcentajeIva = asignarPorcIVA($this->objGuia->EstaOrig, $this->objGuia->EstaDest,
                TipoGuiaType::ToStringCorto($this->objGuia->TipoGuia));
            $arrCalcTari   = CalcularTarifaNacionalDeLaGuia($this->objGuia);
            $blnTodoOkey   = $arrCalcTari['blnTodoOkey'];
            $this->objGuia = $arrCalcTari['objGuiaCalc'];
            //t('Los montos de la Guia despues del recalculo:');
            //t('El % de IVA   :'.$this->objGuia->PorcentajeIva);
            //t('Monto Base    :'.$this->objGuia->MontoBase);
            //t('Monto Franqueo:'.$this->objGuia->MontoFranqueo);
            //t('Monto Iva     :'.$this->objGuia->MontoIva);
            //t('Monto Seguro  :'.$this->objGuia->MontoSeguro);
            //t('Monto Otros   :'.$this->objGuia->MontoOtros);
            //t('Monto Total   :'.$this->objGuia->MontoTotal);
        }
        //---------------------------------------------
        // Se crea un registro en la tabla factura
        //---------------------------------------------
        $this->UpdateFieldsFactura();
        $this->objFactPmnx->Save();
        //t('Los montos de la Factura son:');
        //t('Monto Base    :'.$this->objFactPmnx->MontoBase);
        //t('Monto Franqueo:'.$this->objFactPmnx->MontoFranqueo);
        //t('Monto Iva     :'.$this->objFactPmnx->MontoIva);
        //t('Monto Seguro  :'.$this->objFactPmnx->MontoSeguro);
        //t('Monto Otros   :'.$this->objFactPmnx->MontoOtros);
        //t('Monto Total   :'.$this->objFactPmnx->MontoTotal);
        $this->lblNumeFact->Text = $this->objFactPmnx->Id;
        //-----------------------------------------------------------------------------
        // La guia que entra como parametro, se agrega como primer item de la factura
        //-----------------------------------------------------------------------------
        $this->AgregarPrimerItemFactura();
        $this->dtgItemFact_Create();
        //---------------------------------------------------------------
        // Se actualiza la guia asociandola con el Id de la Pre-Factura
        //---------------------------------------------------------------
        $this->objGuia->FacturaId = $this->objFactPmnx->Id;
        $this->objGuia->Save();
        //-----------------------------------------------------
        // Se actualizan y muestran los montos de la factura
        //-----------------------------------------------------
        $this->objFactPmnx->ActualizarMontos();
//        t('Los montos de la Factura son: (M2)');
//        t('Monto Base    :'.$this->objFactPmnx->MontoBase);
//        t('Monto Franqueo:'.$this->objFactPmnx->MontoFranqueo);
//        t('Monto Iva     :'.$this->objFactPmnx->MontoIva);
//        t('Monto Seguro  :'.$this->objFactPmnx->MontoSeguro);
//        t('Monto Otros   :'.$this->objFactPmnx->MontoOtros);
//        t('Monto Total   :'.$this->objFactPmnx->MontoTotal);
        $this->MostrarMontos();
    }

    protected function CargarDatosDeLaFactura() {
        $this->dtgItemFact_Create();
        $this->objFactPmnx->ActualizarMontos();
        $this->MostrarMontos();
    }

    protected function UpdateFieldsFactura() {
        $strCeduRifx = DejarNumerosVJGuion($this->txtCeduRifx->Text);
        $strRazoSoci = limpiarCadena($this->txtRazoSoci->Text);
        $strDireFisc = limpiarCadena($this->txtDireFisc->Text);
        $strNumeTele = DejarSoloLosNumeros($this->txtNumeTele->Text);

        $this->objFactPmnx->CedulaRif          = $strCeduRifx;
        $this->objFactPmnx->RazonSocial        = substr($strRazoSoci,0,100);
        $this->objFactPmnx->DireccionFiscal    = substr($strDireFisc,0,300);
        $this->objFactPmnx->Telefono           = $strNumeTele;
        $this->objFactPmnx->Numero             = null;
        $this->objFactPmnx->MaquinaFiscal      = null;
        $this->objFactPmnx->FechaImpresion     = null;
        $this->objFactPmnx->HoraImpresion      = null;
        $this->objFactPmnx->MontoBase          = 0;
        $this->objFactPmnx->MontoFranqueo      = 0;
        $this->objFactPmnx->MontoIva           = 0;
        $this->objFactPmnx->MontoSeguro        = 0;
        $this->objFactPmnx->MontoOtros         = 0;
        $this->objFactPmnx->MontoTotal         = 0;
        $this->objFactPmnx->SucursalId         = $this->objUsuario->CodiEsta;
        $this->objFactPmnx->ReceptoriaId       = unserialize($_SESSION['CodiRece']);
        $this->objFactPmnx->CajaId             = 1;
        $this->objFactPmnx->CreadaPor          = $this->objUsuario->CodiUsua;
        $this->objFactPmnx->CreadaEl           = $this->calFechFact->DateTime;
        $this->objFactPmnx->Estatus            = 'P';
        $this->objFactPmnx->ImpresaId          = SinoType::NO;
        $this->objFactPmnx->AnuladaPor         = '';
        $this->objFactPmnx->AnuladaEl          = null;
        $this->objFactPmnx->MotivoAnulacion    = '';
        $this->objFactPmnx->PorcentajeReteIva  = 0;
        $this->objFactPmnx->MontoReteIva       = 0;
        $this->objFactPmnx->PorcentajeReteIslr = 0;
        $this->objFactPmnx->MontoReteIslr      = 0;
        $this->objFactPmnx->MontoDscto         = 0;
    }

    protected function AgregarPrimerItemFactura() {
        $objItemFact = new ItemFacturaPmn();
        $objItemFact->FacturaId       = $this->objFactPmnx->Id;
        $objItemFact->GuiaId          = $this->objGuia->NumeGuia;
        $objItemFact->MontoBase       = $this->objGuia->MontoBase;
        $objItemFact->PorcentajeDscto = 0;
        $objItemFact->MontoDscto      = 0;
        $objItemFact->MontoFranqueo   = $this->objGuia->MontoFranqueo;
        $objItemFact->PorcentajeIva   = $this->objGuia->PorcentajeIva;
        $objItemFact->MontoIva        = $this->objGuia->MontoIva;
        $objItemFact->MontoSeguro     = $this->objGuia->MontoSeguro;
        $objItemFact->MontoOtros      = $this->objGuia->MontoOtros;
        $objItemFact->MontoTotal      = $this->objGuia->MontoTotal;
        $objItemFact->Save();
    }

    protected function MostrarMontos() {
        $this->lblMontBase->Text = (string) $this->objFactPmnx->MontoBase;
        $this->lblMontFran->Text = (string) $this->objFactPmnx->MontoFranqueo;
        $this->lblMontSgro->Text = (string) $this->objFactPmnx->MontoSeguro;
        $this->lblMontMiva->Text = (string) $this->objFactPmnx->MontoIva;
        $this->lblMontTota->Text = (string) $this->objFactPmnx->MontoTotal;
        $this->lblMontAcob->Text = (string) $this->objFactPmnx->MontoTotal;
        $this->lblMontCobr->Text = (string) $this->objFactPmnx->MontoCobrado;
        $decMontRest             = $this->objFactPmnx->MontoTotal - $this->objFactPmnx->MontoCobrado;
        $this->lblMontRest->Text = (string) $decMontRest;

        if ($this->lblMontRest->Text == 0 && $this->objFactPmnx->ImpresaId == SinoType::NO) {
            $this->btnImprFact->Visible = true;
        } else {
            $this->btnImprFact->Visible = false;
        }

    }

    protected function FacturaValidaParaImprimir() {
        $blnImprFact = true;
        $decRutaMaxi = unserialize($_SESSION['RutaMaxi']);
        if (strlen($this->objFactPmnx->Numero) == 0) {
            if ($this->objFactPmnx->MontoTotal <= $decRutaMaxi) {
                if ($this->strModaPago == 'COD') {
                    if ($this->strTipoServ == 'DOM') {
                        $blnImprFact = true;
                    }
                } else {
                    $blnImprFact = true;
                }
            }
        } else {
            $blnImprFact = false;
        }
        return $blnImprFact;
    }
}

CrearFactura::Run('CrearFactura');