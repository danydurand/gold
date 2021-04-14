<?php
//-------------------------------------------------------------------------------------
// Programa       : crear_nota_credito.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 27/07/16 04:34 PM
// Proyecto       : newliberty
// Descripcion    : Programa que permite la creación de la nota de crédito de una guía
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CrearNotaCredito extends FormularioBaseKaizen {
    //----------------------
    // Parámetros de clases
    //----------------------
    protected $objCliePmnx;
    protected $objFactPmnx;
    protected $objNotaCred;
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $intNumeFact;
    protected $intNumeNota;
    protected $intEditNota = null;
    protected $blnEditMode;
    protected $arrItemSele = array();
    //---------------------------
    // Parámetros de información
    //---------------------------
    //---- Pre-Nota y Datos Fiscales ----
    protected $lblNumeNota;
    protected $lblCeduRifx;
    protected $lblRazoSoci;
    protected $lblDireFisc;
    protected $lblNumeTele;
    //---- Nota de Crédito ----
    protected $calFechNota;
    protected $lblFechNota;
    protected $lblCreaPorx;
    protected $lblDocuFisc;
    protected $lblNotaImpr;
    protected $txtConcNota;
    //---- Montos ----
    protected $lblMontBase;
    protected $lblMontDcto;
    protected $lblMontFran;
    protected $lblMontSgro;
    protected $lblMontMiva;
    protected $lblMontTota;
    //---- Items ----
    protected $dtgItemNdcx;

    //---------
    // Botones
    //---------
    
    //---- Regulares ----
    protected $btnImprNota;

    protected function SetupValores() {

        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->intNumeFact = QApplication::QueryString('intFactNdcx');
        if (strlen($this->intNumeFact)) {
            //------------------------------------------------------------------------
            // En el formulario de la factura, se define esta variable, indicando
            // el Nro de la Factura para la cual se desea crear una Nota de Credito
            //------------------------------------------------------------------------
            $this->objFactPmnx = FacturaPmn::Load($this->intNumeFact);
            $this->objNotaCred = NotaCredito::LoadByFacturaId($this->intNumeFact);
            if ($this->objNotaCred) {
                $this->blnEditMode = true;
            } else {
                $this->blnEditMode = false;
                $this->objNotaCred = new NotaCredito();
            }
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->lblTituForm->Text = 'Crear Nota de Crédito';

        //-------------
        // Información
        //-------------
        
        //---- Pre-Nota y Datos Fiscales ----
        $this->lblNumeNota_Create();
        $this->lblCeduRifx_Create();
        $this->lblRazoSoci_Create();
        $this->lblDireFisc_Create();
        $this->lblNumeTele_Create();
        //---- Nota de Crédito ----
        $this->calFechNota_Create();
        $this->lblFechNota_Create();
        $this->lblCreaPorx_Create();        
        $this->lblDocuFisc_Create();
        $this->lblNotaImpr_Create();
        $this->txtConcNota_Create();        
        //---- Monto ----
        $this->lblMontBase_Create();
        $this->lblMontDcto_Create();
        $this->lblMontFran_Create();
        $this->lblMontSgro_Create();
        $this->lblMontMiva_Create();
        $this->lblMontTota_Create();

        //---------
        // Botones
        //---------
        $this->btnSave->Text = TextoIcono('save','Guardar','F','lg');

        $this->btnImprNota_Create();

        if (!$this->blnEditMode) {
            //----------------------------------------
            // Se crean y salvan los datos de la Nota
            //----------------------------------------
            $this->CrearNuevaNota();
        } else {
            $this->CargarDatosDeLaNota();
        }

        $this->controlDeStatus();
    }

    //---------------------
    // Creando objetos ...
    //---------------------

    //------------------------------
    //---- ... para Información ----
    //------------------------------

    //---- Pre-Factura y Datos Fiscales ----
    
    protected function lblNumeNota_Create() {
        $this->lblNumeNota = new QLabel($this);
        $this->lblNumeNota->Name = 'Id';
        $this->lblNumeNota->ForeColor = 'red';
        if ($this->blnEditMode) {
            $this->lblNumeNota->Text = $this->objNotaCred->Id;
        }
    }

    protected function lblCeduRifx_Create() {
        $this->lblCeduRifx = new QLabel($this);
        $this->lblCeduRifx->Name = 'Cedula/RIF';
        $this->lblCeduRifx->Width = 80;
        $this->lblCeduRifx->Required = true;
        if (!$this->blnEditMode) {
            $this->lblCeduRifx->Text = $this->objFactPmnx->CedulaRif;
        } else {
            $this->lblCeduRifx->Text = $this->objNotaCred->CedulaRif;
        }
        $this->lblCeduRifx->ForeColor = 'blue';
    }

    protected function lblRazoSoci_Create() {
        $this->lblRazoSoci = new QLabel($this);
        $this->lblRazoSoci->Name = 'Razon Social';
        $this->lblRazoSoci->Width = 200;
        $this->lblRazoSoci->Required = true;
      $this->lblRazoSoci->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            $this->lblRazoSoci->Text = $this->objFactPmnx->RazonSocial;
        } else {
            $this->lblRazoSoci->Text = $this->objNotaCred->RazonSocial;
        }
        $this->lblRazoSoci->ForeColor = 'blue';
    }

    protected function lblDireFisc_Create() {
        $this->lblDireFisc = new QLabel($this);
        $this->lblDireFisc->Name = 'Direccion Fiscal';
        $this->lblDireFisc->Width = 220;
        $this->lblDireFisc->Required = true;
      $this->lblDireFisc->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            $this->lblDireFisc->Text = $this->objFactPmnx->DireccionFiscal;
        } else {
            $this->lblDireFisc->Text = $this->objNotaCred->DireccionFiscal;
        }
        $this->lblDireFisc->ForeColor = 'blue';
    }

    protected function lblNumeTele_Create() {
        $this->lblNumeTele = new QLabel($this);
        $this->lblNumeTele->Name = 'Telefono';
        $this->lblNumeTele->Width = 120;
        $this->lblNumeTele->Required = true;
        if (!$this->blnEditMode) {
            $this->lblNumeTele->Text = $this->objFactPmnx->Telefono;
        } else {
            $this->lblNumeTele->Text = $this->objNotaCred->Telefono;
        }
        $this->lblNumeTele->ForeColor = 'blue';
    }

    //---- Nota de Crédito ----
    
    protected function calFechNota_Create() {
        $this->calFechNota = new QCalendar($this);
        $this->calFechNota->Name = 'Creada El';
        $this->calFechNota->Width = 90;
        if (!$this->blnEditMode) {
            $this->calFechNota->DateTime = new QDateTime(QDateTime::Now);
        } else {
            $this->calFechNota->DateTime = $this->objNotaCred->CreadaEl;
        }
        $this->calFechNota->ForeColor = 'blue';
    }

    protected function lblFechNota_Create() {
        $this->lblFechNota = new QLabel($this);
        $this->lblFechNota->Name = 'Creada El';
        $this->lblFechNota->Width = 90;
        $calFechDHoy = new QDateTime(QDateTime::Now);
        if (!$this->blnEditMode) {
            $this->lblFechNota->Text = $calFechDHoy->__toString("DD/MM/YYYY");
        } else {
            $this->lblFechNota->Text = $this->objNotaCred->CreadaEl->__toString("DD/MM/YYYY");
        }
        $this->lblFechNota->ForeColor = 'blue';
    }

    protected function lblCreaPorx_Create() {
        $this->lblCreaPorx = new QLabel($this);
        $this->lblCreaPorx->Name = 'Creada Por';
        $this->lblCreaPorx->Width = 60;
        if (!$this->blnEditMode) {
            $this->lblCreaPorx->Text = $this->objUsuario->__toString();
        } else {
            $this->lblCreaPorx->Text = $this->objNotaCred->CreadaPorObject->LogiUsua;
        }
        $this->lblCreaPorx->ForeColor = 'blue';
    }

    protected function lblDocuFisc_Create() {
        $this->lblDocuFisc = new QLabel($this);
        $this->lblDocuFisc->Name = 'Número Fiscal';
        $this->lblDocuFisc->Width = 80;
        if (!$this->blnEditMode) {
            $this->lblDocuFisc->Text = '';
        } else {
            $this->lblDocuFisc->Text = $this->objNotaCred->Numero;
        }
        $this->lblDocuFisc->ForeColor = 'blue';
    }

    protected function lblNotaImpr_Create() {
        $this->lblNotaImpr = new QLabel($this);
        $this->lblNotaImpr->Name = 'Impresa ?';
        $this->lblNotaImpr->Width = 25;
        if (!$this->blnEditMode) {
            $this->lblNotaImpr->Text = '';
        } else {
            $this->lblNotaImpr->Text = SinoType::ToString($this->objNotaCred->ImpresaId);
        }
        $this->lblNotaImpr->ForeColor = 'blue';
    }

    protected function txtConcNota_Create() {
        $this->txtConcNota = new QTextBox($this);
        $this->txtConcNota->Name = 'Concepto';
        $this->txtConcNota->Width = 200;
        $this->txtConcNota->TextMode = QTextMode::MultiLine;
        $this->txtConcNota->Required = true;
        $this->txtConcNota->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            $this->txtConcNota->Text = '';
        } else {
            $this->txtConcNota->Text = $this->objNotaCred->Concepto;
        }
    }

    //---- Items ----
    
    protected function dtgItemNdcx_Create() {
        $this->dtgItemNdcx = new QDataGrid($this);
        $this->dtgItemNdcx->CellPadding = 5;
        $this->dtgItemNdcx->CellSpacing = 0;

        $colCodiItem = new QDataGridColumn('ID', '<?= $_ITEM->Id ?>');
        $colCodiItem->Width = 100;
        $colCodiItem->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colCodiItem);

        $colItemGuia = new QDataGridColumn('Guia', '<?= $_ITEM->GuiaId ?>');
        $colItemGuia->Width = 150;
        $colItemGuia->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colItemGuia);

        $colItemBase = new QDataGridColumn('Mto Base', '<?= $_ITEM->MontoBase ?>');
        $colItemBase->Width = 150;
        $colItemBase->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colItemBase);
       
        $colItemPdes = new QDataGridColumn('% Dscto', '<?= $_ITEM->PorcentajeDscto ?>');
        $colItemPdes->Width = 150;
        $colItemPdes->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colItemPdes);
       
        $colItemMdes = new QDataGridColumn('Dscto', '<?= $_ITEM->MontoDscto ?>');
        $colItemMdes->Width = 150;
        $colItemMdes->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colItemMdes);
       
        $colItemFran = new QDataGridColumn('F.Post', '<?= $_ITEM->MontoFranqueo ?>');
        $colItemFran->Width = 150;
        $colItemFran->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colItemFran);

        $colItemPiva = new QDataGridColumn('% IVA', '<?= $_ITEM->PorcentajeIva ?>');
        $colItemPiva->Width = 150;
        $colItemPiva->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colItemPiva);

        $colItemMiva = new QDataGridColumn('I.V.A.', '<?= $_ITEM->MontoIva ?>');
        $colItemMiva->Width = 150;
        $colItemMiva->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colItemMiva);

        $colItemSgro = new QDataGridColumn('Sgro', '<?= $_ITEM->MontoSeguro ?>');
        $colItemSgro->Width = 150;
        $colItemSgro->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colItemSgro);

        $colitemTota = new QDataGridColumn('Total', '<?= $_ITEM->MontoTotal ?>');
        $colitemTota->Width = 150;
        $colitemTota->HtmlEntities = false;
        $this->dtgItemNdcx->AddColumn($colitemTota);
       
        // Let's pre-default the sorting by id (column index #0) and use AJAX
        $this->dtgItemNdcx->SortColumnIndex = 0;
        $this->dtgItemNdcx->UseAjax = true;

        // Specify the DataBinder method for the DataGrid
        $this->dtgItemNdcx->SetDataBinder('dtgItemNdcx_Bind');
    }

    //---- Monto ----
    
    protected function lblMontBase_Create() {
        $this->lblMontBase = new QLabel($this);
        $this->lblMontBase->Name = 'Base';
        if (!$this->blnEditMode) {
            $this->lblMontBase->Text = 0;
        } else {
            $this->lblMontBase->Text = $this->objNotaCred->MontoBase;
        }
    }

    protected function lblMontDcto_Create() {
        $this->lblMontDcto = new QLabel($this);
        $this->lblMontDcto->Name = 'Descuento';
        if (!$this->blnEditMode) {
            $this->lblMontDcto->Text = 0;
        } else {
            $this->lblMontDcto->Text = $this->objNotaCred->MontoDscto;
        }
    }

    protected function lblMontFran_Create() {
        $this->lblMontFran = new QLabel($this);
        $this->lblMontFran->Name = 'Franqueo';
        if (!$this->blnEditMode) {
            $this->lblMontFran->Text = 0;
        } else {
            $this->lblMontFran->Text = $this->objNotaCred->MontoFranqueo;
        }
    }

    protected function lblMontSgro_Create() {
        $this->lblMontSgro = new QLabel($this);
        $this->lblMontSgro->Name = 'Seguro';
        if (!$this->blnEditMode) {
            $this->lblMontSgro->Text = 0;
        } else {
            $this->lblMontSgro->Text = $this->objNotaCred->MontoSeguro;
        }
    }

    protected function lblMontMiva_Create() {
        $this->lblMontMiva = new QLabel($this);
        $this->lblMontMiva->Name = 'I.V.A.';
        if (!$this->blnEditMode) {
            $this->lblMontMiva->Text = 0;
        } else {
            $this->lblMontMiva->Text = $this->objNotaCred->MontoIva;
        }
    }

    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Name = 'Total';
        if (!$this->blnEditMode) {
            $this->lblMontTota->Text = 0;
        } else {
            $this->lblMontTota->Text = $this->objNotaCred->MontoTotal;
        }
    }

    //---------------------------
    //---- .... para botones ----
    //---------------------------
    
    protected function btnImprNota_Create() {
        $this->btnImprNota = new QButtonP($this);
        $this->btnImprNota->Text = TextoIcono('print','C.D.I.','F','lg');
        $this->btnImprNota->AddAction(new QClickEvent(), new QAjaxAction('btnImprNota_Click'));
    }

    //-----------------------------------
    // Funciones asociadas a los objetos
    //-----------------------------------
    
    protected function controlDeStatus() {
        if ($this->lblNotaImpr->Text == 'SI') {
            $this->btnSave->Visible = false;
            $this->btnImprNota->Visible = false;
            $this->txtConcNota->Enabled = false;
            $this->txtConcNota->ForeColor = 'blue';
        }
        if ($this->objFactPmnx) {
            if ($this->objFactPmnx->Estatus == 'A') {
                // echo "La Factura esta anulada";
                $this->btnSave->Visible = false;
            }
        }
    }

    protected function btnImprNota_Click() {
        //------------------------------------------------------
        // Se leen los datos fiscales y se muestra en pantalla
        //------------------------------------------------------
        $this->objNotaCred = NotaCredito::Load($this->lblNumeNota->Text);
        $this->lblDocuFisc->Text = $this->objNotaCred->Numero;
        $this->lblNotaImpr->Text = SinoType::ToString($this->objNotaCred->ImpresaId);
        $this->controlDeStatus();
        //-----------------------
        // Se Anula la Factura
        //-----------------------
        $arrParaAnul['MotiAnul'] = $this->txtConcNota->Text;
        $arrParaAnul['UsuaAnul'] = $this->objUsuario->CodiUsua;
        $this->objFactPmnx->AnularFactura($arrParaAnul);
    }

    protected function btnSave_Click() {
        //----------------------------------------------
        // Se guardan los datos de la Nota de Credito 
        //----------------------------------------------
        $this->objNotaCred->FacturaId       = $this->objFactPmnx->Id;
        $this->objNotaCred->CedulaRif       = $this->lblCeduRifx->Text;
        $this->objNotaCred->RazonSocial     = $this->lblRazoSoci->Text;
        $this->objNotaCred->DireccionFiscal = $this->lblDireFisc->Text;
        $this->objNotaCred->Telefono        = $this->lblNumeTele->Text;
        $this->objNotaCred->Concepto        = limpiarCadena($this->txtConcNota->Text);
        $this->objNotaCred->Save();

        $this->lblNumeNota->Text = $this->objNotaCred->Id;
        $this->mensaje('Nota de Crédito Registrada','','s','',__iCHEC__);
        $this->btnImprNota->Visible = true;
    }

    protected function btnCancel_Click() {
        QApplication::Redirect(__SIST__.'/crear_factura.php?intNumeFact='.$this->objNotaCred->FacturaId);
    }

    protected function dtgItemNdcx_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::ItemNotaCredito()->NotaCreditoId,$this->lblNumeNota->Text); 
        $arrItemNota   = ItemNotaCredito::QueryArray(QQ::AndCondition($objClauWher));

        // Bind the datasource to the datagrid
        $this->dtgItemNdcx->DataSource = $arrItemNota;
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------
    
    protected function CrearNuevaNota() {
        //---------------------------------------------
        // Se crea un registro en la tabla factura 
        //---------------------------------------------
        $this->UpdateFieldsNota();
        $this->objNotaCred->Save();
        $this->lblNumeNota->Text = $this->objNotaCred->Id;
        //---------------------------------------------------------------------
        // Los Items de la Factura, se crean como Items de la Nota de Credito
        //---------------------------------------------------------------------
        $this->AgregarItemsNotaCredito();
        $this->dtgItemNdcx_Create();
        //-----------------------------------------------------
        // Se actualizan y muestran los montos de la factura
        //-----------------------------------------------------
        $this->objNotaCred->ActualizarMontos();
        $this->MostrarMontoNDC();
    }

    protected function CargarDatosDeLaNota() {
        $this->dtgItemNdcx_Create();
        $this->objNotaCred->ActualizarMontos();
        $this->MostrarMontoNDC();
    }
    
    protected function UpdateFieldsNota() {
        $this->objNotaCred->FacturaId       = $this->objFactPmnx->Id;
        $this->objNotaCred->CedulaRif       = $this->lblCeduRifx->Text;
        $this->objNotaCred->RazonSocial     = $this->lblRazoSoci->Text;
        $this->objNotaCred->DireccionFiscal = $this->lblDireFisc->Text;
        $this->objNotaCred->Telefono        = $this->lblNumeTele->Text;
        $this->objNotaCred->Concepto        = '';
        $this->objNotaCred->Numero          = null;
        $this->objNotaCred->MaquinaFiscal   = null;
        $this->objNotaCred->FechaImpresion  = null;
        $this->objNotaCred->HoraImpresion   = null;
        $this->objNotaCred->MontoBase       = 0;
        $this->objNotaCred->MontoFranqueo   = 0;
        $this->objNotaCred->MontoIva        = 0;
        $this->objNotaCred->MontoSeguro     = 0;
        $this->objNotaCred->MontoOtros      = 0;
        $this->objNotaCred->MontoTotal      = 0;
        $this->objNotaCred->SucursalId      = $this->objUsuario->CodiEsta;
        $this->objNotaCred->ReceptoriaId    = unserialize($_SESSION['CodiRece']);
        $this->objNotaCred->CajaId          = 1;
        $this->objNotaCred->CreadaPor       = $this->objUsuario->CodiUsua;
        $this->objNotaCred->CreadaEl        = $this->calFechNota->DateTime;
        $this->objNotaCred->Estatus         = 'P';
        $this->objNotaCred->ImpresaId       = SinoType::NO;
        $this->objNotaCred->MontoDscto      = 0;
    }

    protected function AgregarItemsNotaCredito() {
        $arrItemFact = $this->objFactPmnx->GetItemFacturaPmnAsFacturaArray();
        foreach ($arrItemFact as $objItemFact) {
            $objItemNota = new ItemNotaCredito();
            $objItemNota->NotaCreditoId   = $this->objNotaCred->Id;
            $objItemNota->GuiaId          = $objItemFact->GuiaId;
            $objItemNota->MontoBase       = $objItemFact->MontoBase;
            $objItemNota->PorcentajeDscto = $objItemFact->PorcentajeDscto;
            $objItemNota->MontoDscto      = $objItemFact->MontoDscto;
            $objItemNota->MontoFranqueo   = $objItemFact->MontoFranqueo;
            $objItemNota->PorcentajeIva   = $objItemFact->PorcentajeIva;
            $objItemNota->MontoIva        = $objItemFact->MontoIva;
            $objItemNota->MontoSeguro     = $objItemFact->MontoSeguro;
            $objItemNota->MontoOtros      = $objItemFact->MontoOtros;
            $objItemNota->MontoTotal      = $objItemFact->MontoTotal;
            $objItemNota->Save();
        }
    }

    protected function MostrarMontoNDC() {
        $this->lblMontBase->Text = $this->objNotaCred->MontoBase;
        $this->lblMontFran->Text = $this->objNotaCred->MontoFranqueo;
        $this->lblMontSgro->Text = $this->objNotaCred->MontoSeguro;
        $this->lblMontMiva->Text = $this->objNotaCred->MontoIva;
        $this->lblMontTota->Text = $this->objNotaCred->MontoTotal;
    }
}

CrearNotaCredito::Run('CrearNotaCredito');