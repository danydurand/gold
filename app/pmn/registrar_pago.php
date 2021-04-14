<?php
//---------------------------------------------------------------
// Programa       : registrar_pago.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 25/07/16 05:18 PM
// Proyecto       : newliberty
// Descripcion    : Programa que registra el pago de una factura.
//---------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RegistrarPago extends FormularioBaseKaizen {
    /**
     * @var $objFactPmnx FacturaPmn
     */
    protected $objFactPmnx;
    protected $intNumeFact;
    protected $blnPermEfec;
    protected $intEditPago = null;

    //---- Factura ----
    protected $lblNumeFact;
    protected $lblCeduRifx;
    protected $lblRazoSoci;
    protected $lblDireFisc;
    protected $lblNumeTele;
    protected $lblFechFact;
    protected $lblCreaPorx;

    //---- Pago ----
    protected $dtgPagoFact;
    protected $lstFormPago;
    protected $txtNumeDocu;
    protected $lstBancDocu;
    protected $txtMontPago;

    //---- Monto ----
    protected $lblMontCobr;
    protected $lblMontAcob;
    protected $lblMontRest;

    protected $btnSavePipe;
    protected $btnCancPipe;
    protected $btnDelePipe;
    protected $btnNew;

    protected $blnSepuPaga;

    protected function SetupValores() {
        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->intNumeFact = QApplication::PathInfo(0);
        $this->objFactPmnx = FacturaPmn::Load($this->intNumeFact);
        //--------------------------------------------------------------------------------
        // Si al menos una Guia, perteneciente a la Factura tiene modalidad de pago COD
        // y se entrega a Domicilio, entonces se permitira el "EFECTIVO" como forma de
        // pago.
        //--------------------------------------------------------------------------------
        $this->blnPermEfec = false;
        $arrItemFact = $this->objFactPmnx->GetItemFacturaPmnAsFacturaArray();
        foreach ($arrItemFact as $objItemFact) {
            if ($objItemFact->Guia->TipoGuia == TipoGuiaType::CODCOBROENDESTINO) {
                if ($objItemFact->Guia->ReceptoriaDestino == 'DOM') {
                    $this->blnPermEfec = true;
                }
            }
        }
        //---------------------------------------------------------------------------------------------
        // Si la factura tiene retenciones, entonces se puede registrar el pago, aun cuando ya haya
        // sido impresa, en caso contrario, si la factura ya fue impresa, no se pueden modificar los
        // pagos ni agregar nuevos
        //---------------------------------------------------------------------------------------------
        $this->blnSepuPaga = true;
        if ($this->objFactPmnx->ImpresaId == SinoType::SI) {
            $this->blnSepuPaga = false;
        }
        if ($this->objFactPmnx->TieneRetencion == SinoType::SI) {
            $this->blnSepuPaga = true;
        }

    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Registrar Pago';

        $this->btnCancel->Text = TextoIcono('mail-reply','Factura','F','lg');

        $this->SetupValores();

        //---- Factura ----
        $this->lblNumeFact_Create();
        $this->lblCeduRifx_Create();
        $this->lblRazoSoci_Create();
        $this->lblDireFisc_Create();
        $this->lblNumeTele_Create();
        $this->lblFechFact_Create();
        $this->lblCreaPorx_Create();

        //---- Pago ----
        $this->dtgPagoFact_Create();

        //---- Monto ----
        $this->lblMontCobr_Create();
        $this->lblMontAcob_Create();
        $this->lblMontRest_Create();

        //---- Otras funciones
        $this->MostrarMontoCobrado();
    }

    //---------------------
    // Creando objetos ...
    //---------------------

    protected function lblNumeFact_Create() {
        $this->lblNumeFact = new QLabel($this);
        $this->lblNumeFact->Name = 'Id';
        $this->lblNumeFact->Text = $this->objFactPmnx->Id;
    }

    protected function lblCeduRifx_Create() {
        $this->lblCeduRifx = new QLabel($this);
        $this->lblCeduRifx->Name = 'Cedula/Rif';
        $this->lblCeduRifx->Width = 80;
        $this->lblCeduRifx->Text = $this->objFactPmnx->CedulaRif;
    }

    protected function lblRazoSoci_Create() {
        $this->lblRazoSoci = new QLabel($this);
        $this->lblRazoSoci->Name = 'Razón Social';
        $this->lblRazoSoci->Width = 180;
        $this->lblRazoSoci->Text = $this->objFactPmnx->RazonSocial;
    }

    protected function lblDireFisc_Create() {
        $this->lblDireFisc = new QLabel($this);
        $this->lblDireFisc->Width = 200;
        $this->lblDireFisc->Name = 'Dirección';
        $this->lblDireFisc->Text = $this->objFactPmnx->DireccionFiscal;
    }

    protected function lblNumeTele_Create() {
        $this->lblNumeTele = new QLabel($this);
        $this->lblNumeTele->Width = 100;
        $this->lblNumeTele->Name = 'Teléfono';
        $this->lblNumeTele->Text = $this->objFactPmnx->Telefono;
    }

    protected function lblFechFact_Create() {
        $this->lblFechFact = new QLabel($this);
        $this->lblFechFact->Name = 'Creada el';
        $this->lblFechFact->Width = 90;
        $this->lblFechFact->Text = $this->objFactPmnx->CreadaEl->__toString("DD/MM/YYYY");
    }

    protected function lblCreaPorx_Create() {
        $this->lblCreaPorx = new QLabel($this);
        $this->lblCreaPorx->Name = 'Creada por';
        $this->lblCreaPorx->Width = 90;
        $this->lblCreaPorx->Text = $this->objFactPmnx->CreadaPorObject->LogiUsua;
    }

    //---- Monto ----

    protected function lblMontCobr_Create() {
        $this->lblMontCobr = new QLabel($this);
        $this->lblMontCobr->Name = 'Monto Cobrado';
        $this->lblMontCobr->Text = $this->objFactPmnx->MontoCobrado;
    }

    protected function lblMontAcob_Create() {
        $this->lblMontAcob = new QLabel($this);
        $this->lblMontAcob->Name = 'Monto a Cobrar';
        $this->lblMontAcob->Text = $this->objFactPmnx->MontoTotal;
    }

    protected function lblMontRest_Create() {
        $this->lblMontRest = new QLabel($this);
        $this->lblMontRest->Name = 'Mto. Restante';
        $decMontRest = $this->objFactPmnx->MontoTotal - $this->objFactPmnx->MontoCobrado;
        $this->lblMontRest->Text = (string) $decMontRest;
    }

    //---- Pago ----

    protected function dtgPagoFact_Create() {
        $this->dtgPagoFact = new QDataGrid($this);
        $this->dtgPagoFact->CellPadding = 0;
        $this->dtgPagoFact->CellSpacing = 0;
        $this->dtgPagoFact->FontSize    = 13;

        $colCodiItem = new QDataGridColumn('ID', '<?= $_ITEM->Id ?>');
        $colCodiItem->Width = 100;
        $colCodiItem->HtmlEntities = false;
        $this->dtgPagoFact->AddColumn($colCodiItem);

        $colItemGuia = new QDataGridColumn('Forma Pago', '<?= $_FORM->FormaPagoColumn_Render($_ITEM) ?>');
        $colItemGuia->Width = 150;
        $colItemGuia->HtmlEntities = false;
        $this->dtgPagoFact->AddColumn($colItemGuia);

        $colNumeDocu = new QDataGridColumn('Documento', '<?= $_FORM->DocumentoColumn_Render($_ITEM) ?>');
        $colNumeDocu->Width = 150;
        $colNumeDocu->HtmlEntities = false;
        $this->dtgPagoFact->AddColumn($colNumeDocu);

        $colBancDocu = new QDataGridColumn('Banco', '<?= $_FORM->BancoColumn_Render($_ITEM) ?>');
        $colBancDocu->Width = 150;
        $colBancDocu->HtmlEntities = false;
        $this->dtgPagoFact->AddColumn($colBancDocu);

        $colMontPago = new QDataGridColumn('Monto Pago', '<?= $_FORM->MontoColumn_Render($_ITEM) ?>');
        $colMontPago->Width = 100;
        $colMontPago->HtmlEntities = false;
        $this->dtgPagoFact->AddColumn($colMontPago);

        //if ($this->objFactPmnx->ImpresaId == SinoType::NO) {
        if ($this->blnSepuPaga) {
            $colEditColu = new QDataGridColumn('Editar', '<?= $_FORM->EditColumn_Render($_ITEM) ?>');
            $colEditColu->Width = 120;
            $colEditColu->HtmlEntities = false;
            $this->dtgPagoFact->AddColumn($colEditColu);
        }

        // Let's pre-default the sorting by id (column index #0) and use AJAX
        $this->dtgPagoFact->SortColumnIndex = 0;
        $this->dtgPagoFact->UseAjax = true;

        // Specify the DataBinder method for the DataGrid
        $this->dtgPagoFact->SetDataBinder('dtgPagoFact_Bind');

        // Style the DataGrid (if desired)
        $this->dtgPagoFact->CssClass = 'datagrid';
        $this->dtgPagoFact->AlternateRowStyle->CssClass = '';

        // Create the other textboxes and buttons -- make sure we specify
        // the datagrid as the parent.  If they hit the escape key, let's perform a Cancel.
        // Note that we need to terminate the action on the escape key event, too, b/c
        // many browsers will perform additional processing that we won't not want.
        $this->lstFormPago = new QListBox($this->dtgPagoFact);
        $this->lstFormPago->Required = true;
        $this->lstFormPago->Width = 200;
        $this->lstFormPago->AddAction(new QChangeEvent(), new QAjaxAction('lstFormPago_Change'));
        $this->lstFormPago->AddAction(new QEscapeKeyEvent(), new QAjaxAction('btnCancPipe_Click'));
        $this->lstFormPago->AddAction(new QEscapeKeyEvent(), new QTerminateAction());

        $this->txtNumeDocu = new QTextBox($this->dtgPagoFact);
        $this->txtNumeDocu->Required = true;
        $this->txtNumeDocu->MaxLength = 150;
        $this->txtNumeDocu->Width = 150;
        $this->txtNumeDocu->AddAction(new QEscapeKeyEvent(), new QAjaxAction('btnCancPipe_Click'));
        $this->txtNumeDocu->AddAction(new QEscapeKeyEvent(), new QTerminateAction());

        $this->lstBancDocu = new QListBox($this->dtgPagoFact);
        $this->lstBancDocu->Required = true;
        $this->lstBancDocu->Width = 200;
        $this->lstBancDocu->AddAction(new QEscapeKeyEvent(), new QAjaxAction('btnCancPipe_Click'));
        $this->lstBancDocu->AddAction(new QEscapeKeyEvent(), new QTerminateAction());

        $this->txtMontPago = new QFloatTextBox($this->dtgPagoFact);
        $this->txtMontPago->Required = true;
        $this->txtMontPago->MaxLength = 100;
        $this->txtMontPago->Width = 100;
        $this->txtMontPago->AddAction(new QEscapeKeyEvent(), new QAjaxAction('btnCancPipe_Click'));
        $this->txtMontPago->AddAction(new QEscapeKeyEvent(), new QTerminateAction());

        // We want the Save button to be Primary, so that the save will perform if the
        // user hits the enter key in either of the textboxes.

        $this->btnSavePipe = new QButton($this->dtgPagoFact);
        $this->btnSavePipe->Text = TextoIcono('check','','','lg');
        $this->btnSavePipe->CssClass = 'btn btn-xs btn-success';
        $this->btnSavePipe->HtmlEntities = false;
        $this->btnSavePipe->ToolTip = 'Save';
        $this->btnSavePipe->AddAction(new QClickEvent(), new QAjaxAction('btnSavePipe_Click'));
        $this->btnSavePipe->PrimaryButton = true;
        $this->btnSavePipe->CausesValidation = true;

        // // Make sure we turn off validation on the Cancel button
        $this->btnCancPipe = new QButton($this->dtgPagoFact);
        $this->btnCancPipe->Text = TextoIcono('ban','','','lg');
        $this->btnCancPipe->CssClass = 'btn btn-xs btn-warning';
        $this->btnCancPipe->HtmlEntities = false;
        $this->btnCancPipe->ToolTip = 'Cancel';
        $this->btnCancPipe->AddAction(new QClickEvent(), new QAjaxAction('btnCancPipe_Click'));
        $this->btnCancPipe->CausesValidation = false;

        // // Make sure we turn off validation on the Cancel button
        $this->btnDelePipe = new QButton($this->dtgPagoFact);
        $this->btnDelePipe->Text = TextoIcono('times','','','lg');
        $this->btnDelePipe->CssClass = 'btn btn-xs btn-danger';
        $this->btnDelePipe->HtmlEntities = false;
        $this->btnDelePipe->ToolTip = 'Delete';
        $this->btnDelePipe->AddAction(new QClickEvent(), new QAjaxAction('btnDelePipe_Click'));
        $this->btnDelePipe->CausesValidation = false;

        // // Finally, let's add a "New" button
        $this->btnNew = new QButton($this);
        $this->btnNew->Text = TextoIcono('plus-circle','','','lg');
        $this->btnNew->CssClass = 'btn btn-sm btn-primary';
        $this->btnNew->HtmlEntities = false;
        $this->btnNew->AddAction(new QClickEvent(), new QAjaxAction('btnNew_Click'));
        $this->btnNew->CausesValidation = false;
        $this->btnNew->ToolTip = QApplication::Translate('Nuevo Pago');

        //----------------------------------------------------------------------------------------------------
        // Si la factura ya fue impresa, no se permite la edicion del pago, no registra nuevos pagos tampoco
        //----------------------------------------------------------------------------------------------------
        //if ($this->objFactPmnx->ImpresaId == SinoType::SI) {
        if (!$this->blnSepuPaga) {
            $this->btnNew->Visible = false;
            $this->mensaje('Factura Impresa.  No se admiten cambios en el Cobro','','d','',__iHAND__);
        }
    }

    //-----------------------------------
    // Funciones asociadas a los objetos
    //-----------------------------------

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function dtgPagoFact_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::PagoFacturaPmn()->FacturaId,$this->lblNumeFact->Text);
        $arrPagoFact   = PagoFacturaPmn::QueryArray(QQ::AndCondition($objClauWher));

        // If we are editing someone new, we need to add a new (blank) person to the data source
        if ($this->intEditPago == -1) {
            array_push($arrPagoFact, new PagoFacturaPmn());
        }

        // Bind the datasource to the datagrid
        $this->dtgPagoFact->DataSource = $arrPagoFact;
    }

    //---- Despliegue de las columnas del DataGrid ----

    public function FormaPagoColumn_Render(PagoFacturaPmn $objPagoFact) {
        if (($objPagoFact->Id == $this->intEditPago) ||
            (($this->intEditPago == -1) && (!$objPagoFact->Id)))
            return $this->lstFormPago->RenderWithError(false);
        else
            return QApplication::HtmlEntities($objPagoFact->FormaPago->__toString());
    }

    public function DocumentoColumn_Render(PagoFacturaPmn $objPagoFact) {
        if (($objPagoFact->Id == $this->intEditPago) ||
            (($this->intEditPago == -1) && (!$objPagoFact->Id)))
            return $this->txtNumeDocu->RenderWithError(false);
        else
            return QApplication::HtmlEntities($objPagoFact->NumeroDocumento);
    }

    public function BancoColumn_Render(PagoFacturaPmn $objPagoFact) {
        if (($objPagoFact->Id == $this->intEditPago) ||
            (($this->intEditPago == -1) && (!$objPagoFact->Id)))
            return $this->lstBancDocu->RenderWithError(false);
        else
            return QApplication::HtmlEntities($objPagoFact->Banco->__toString());
    }

    public function MontoColumn_Render(PagoFacturaPmn $objPagoFact) {
        if (($objPagoFact->Id == $this->intEditPago) ||
            (($this->intEditPago == -1) && (!$objPagoFact->Id)))
            return $this->txtMontPago->RenderWithError(false);
        else
            return QApplication::HtmlEntities($objPagoFact->MontoPago);
    }

    public function EditColumn_Render(PagoFacturaPmn $objPagoFact) {
        if (($objPagoFact->Id == $this->intEditPago) ||
            (($this->intEditPago == -1) && (!$objPagoFact->Id)))
            return $this->btnSavePipe->Render(false) . '&nbsp;' . $this->btnCancPipe->Render(false). '&nbsp;' . $this->btnDelePipe->Render(false);
        else {
            // Get the Edit button for this row (we will create it if it doesn't yet exist)
            $strControlId = 'btnEdit' . $objPagoFact->Id;
            $btnEdit = $this->GetControl($strControlId);
            if (!$btnEdit) {
                // Create the Edit button for this row in the DataGrid
                // Use ActionParameter to specify the ID of the person
                $btnEdit = new QButton($this->dtgPagoFact, $strControlId);
                $btnEdit->Text = TextoIcono('pencil-square-o','','','lg');
                $btnEdit->ToolTip = 'Edit';
                $btnEdit->CssClass = 'btn btn-xs btn-info';
                $btnEdit->HtmlEntities = false;
                $btnEdit->ActionParameter = $objPagoFact->Id;
                $btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
                $btnEdit->CausesValidation = false;
            }

            // If we are currently editing a person, then set this Edit button to be disabled
            if ($this->intEditPago)
                $btnEdit->Enabled = false;
            else
                $btnEdit->Enabled = true;

            // Return the rendered Edit button
            return $btnEdit->Render(false);
        }
    }

    //---- Eventos de los botones del DataGrid ----

    public function btnEdit_Click($strFormId, $strControlId, $strParameter) {
        $this->lblMensUsua->Text = '';
        $this->intEditPago = $strParameter;
        $objPagoFact = PagoFacturaPmn::Load($strParameter);
        //------------------------------------------------------------------------------
        // A nivel de los montos, se hace una simulacion, como si el pago en cuestion
        // no hubiese sido realizado
        //------------------------------------------------------------------------------
        $decMontCobr = floatval($this->lblMontCobr->Text);
        $decMontCobr = $decMontCobr - $objPagoFact->MontoPago;
        $decMontAcob = floatval($this->lblMontAcob->Text);
        $decMontRest = $decMontAcob - $decMontCobr;
        $this->lblMontCobr->Text = (string)$decMontCobr;
        $this->lblMontRest->Text = (string)$decMontRest;

        $this->lstFormPago->RemoveAllItems();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::FormaPago()->StatusId,StatusType::ACTIVO);
        $arrFormPago   = FormaPago::QueryArray(QQ::AndCondition($objClauWher));
        $this->lstFormPago->AddItem('- Seleccione Uno - ',null);
        foreach ($arrFormPago as $objFormPago) {
            $blnCargRegi = true;
            if (trim($objFormPago->Descripcion) == "EFECTIVO" && !$this->blnPermEfec) {
                $blnCargRegi = false;
            }
            if ($blnCargRegi) {
                $this->lstFormPago->AddItem($objFormPago->__toString(),$objFormPago,$objFormPago->Id==$objPagoFact->FormaPagoId);
            }
        }

        $this->txtNumeDocu->Text = $objPagoFact->NumeroDocumento;
        $this->lstBancDocu->RemoveAllItems();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Banco()->StatusId,StatusType::ACTIVO);
        $arrBancActi   = Banco::QueryArray(QQ::AndCondition($objClauWher));
        $this->lstBancDocu->AddItem('- Seleccione Uno - ',null);
        foreach ($arrBancActi as $objBanco) {
            $this->lstBancDocu->AddItem($objBanco->__toString(),$objBanco->Id,$objBanco->Id==$objPagoFact->BancoId);
        }

        $this->txtMontPago->Text = $objPagoFact->MontoPago;

        // Let's put the focus on the FirstName Textbox
        QApplication::ExecuteJavaScript(sprintf('qcubed.getControl("%s").focus()', $this->lstFormPago->ControlId));
    }

    protected function btnNew_Click($strFormId, $strControlId, $strParameter) {
        $this->lblMensUsua->Text = '';

        $this->intEditPago = -1;

        $this->lstFormPago->RemoveAllItems();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::FormaPago()->StatusId,StatusType::ACTIVO);
        $arrFormPago   = FormaPago::QueryArray(QQ::AndCondition($objClauWher));
        $this->lstFormPago->AddItem('- Seleccione Uno - ',null);
        foreach ($arrFormPago as $objFormPago) {
            $blnCargRegi = true;
            if (trim($objFormPago->Descripcion) == "EFECTIVO" && !$this->blnPermEfec) {
                $blnCargRegi = false;
            }
            if ($blnCargRegi) {
                $this->lstFormPago->AddItem($objFormPago->__toString(),$objFormPago);
            }
        }
        $this->txtNumeDocu->Text = '';
        $this->lstBancDocu->RemoveAllItems();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Banco()->StatusId,StatusType::ACTIVO);
        $arrBancActi   = Banco::QueryArray(QQ::AndCondition($objClauWher));
        $this->lstBancDocu->AddItem('- Seleccione Uno - ',null);
        foreach ($arrBancActi as $objBanco) {
            $this->lstBancDocu->AddItem($objBanco->__toString(),$objBanco->Id);
        }
        $this->txtMontPago->Text = $this->lblMontRest->Text;

        // Let's put the focus on the FirstName Textbox
        QApplication::ExecuteJavaScript(sprintf('qcubed.getControl("%s").focus()', $this->lstFormPago->ControlId));
    }

    protected function btnSavePipe_Click($strFormId, $strControlId, $strParameter) {
        $this->lblMensUsua->Text = '';
        if ($this->intEditPago == -1) {
            $objPagoFact = new PagoFacturaPmn();
        } else {
            $objPagoFact = PagoFacturaPmn::Load($this->intEditPago);
        }

        $blnTodoOkey = true;
        $decMontPago = floatval($this->txtMontPago->Text);
        if ($decMontPago <= 0) {
            $this->txtMontPago->Warning = 'Debe ser Mayor a 0';
            $this->txtMontPago->SetFocus();
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            $decMontRest = floatval($this->lblMontRest->Text);
            if ($decMontPago > $decMontRest) {
                $this->lblMensUsua->Text = 'El Monto del Pago, debe ser Menor o Igual al Restante';
                $this->lblMensUsua->ForeColor = 'yellow';
                $this->txtMontPago->Warning = 'Error';
                $this->txtMontPago->SetFocus();
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PagoFacturaPmn()->FacturaId,$this->objFactPmnx->Id);
            $objClauWher[] = QQ::Equal(QQN::PagoFacturaPmn()->FormaPagoId,$this->lstFormPago->SelectedValue->Id);
            $objClauWher[] = QQ::Equal(QQN::PagoFacturaPmn()->NumeroDocumento,$this->txtNumeDocu->Text);
            $arrPagoReal   = PagoFacturaPmn::QueryArray(QQ::AndCondition($objClauWher));
            if (count($arrPagoReal) > 0) {
                $this->lblMensUsua->Text = 'Ya se registro esa Forma de Pago y ese Nro de Documento';
                $this->lblMensUsua->ForeColor = 'yellow';
                $this->txtNumeDocu->Warning = 'Error';
                $this->txtNumeDocu->SetFocus();
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $objPagoFact->FacturaId = $this->objFactPmnx->Id;
            $objPagoFact->FormaPagoId = $this->lstFormPago->SelectedValue->Id;
            $objPagoFact->NumeroDocumento = $this->txtNumeDocu->Text;
            $objPagoFact->BancoId = $this->lstBancDocu->SelectedValue;
            $objPagoFact->MontoPago = $this->txtMontPago->Text;
            $objPagoFact->CreadoEl = new QDateTime(QDateTime::Now());
            $objPagoFact->CreadoPor = $this->objUsuario->CodiUsua;
            $objPagoFact->Save();

            $this->intEditPago = null;
            //-----------------------------------------------------
            // Se actualiza y muestra el monto cobrado
            //-----------------------------------------------------
            $this->objFactPmnx->ActualizaCobro();
            $this->MostrarMontoCobrado();
            $this->btnNew->Visible = true;
        }
    }

    protected function btnDelePipe_Click($strFormId, $strControlId, $strParameter) {
        if ($this->intEditPago != -1) {
            $objPagoFact = PagoFacturaPmn::Load($this->intEditPago);
            $objPagoFact->Delete();
            $this->intEditPago = null;
            //-----------------------------------------------------
            // Se actualizan y muestran los montos de la factura
            //-----------------------------------------------------
            $this->objFactPmnx->ActualizaCobro();
            $this->MostrarMontoCobrado();
        }
    }

    // Handle the action for the Cancel button being clicked.
    protected function btnCancPipe_Click($strFormId, $strControlId, $strParameter) {
        $this->lblMensUsua->Text = '';
        $this->intEditPago = null;
        $this->MostrarMontoCobrado();
    }

    //---- Eventos de los objetos del DataGrid ----

    protected function lstFormPago_Change() {
        if ($this->lstFormPago->SelectedValue) {
            $objFormPago = $this->lstFormPago->SelectedValue;
            if ($objFormPago->RequiereDocumento == SinoType::NO) {
                $this->txtNumeDocu->Text = $objFormPago->Descripcion;
                $this->txtNumeDocu->Enabled = false;
                $this->txtNumeDocu->ForeColor = 'blue';
                $this->lstBancDocu->Enabled = false;
                $this->lstBancDocu->ForeColor = 'blue';
                $this->txtMontPago->SetFocus();
            } else {
                $this->txtNumeDocu->Enabled = true;
                $this->txtNumeDocu->ForeColor = null;
                $this->lstBancDocu->Enabled = true;
                $this->lstBancDocu->ForeColor = null;
                $this->txtNumeDocu->SetFocus();
            }
        }
    }

    // When we Render, we need to see if we are currently editing someone
    protected function Form_PreRender() {
        $this->dtgPagoFact->Refresh();

        if ($this->intEditPago)
            $this->btnNew->Enabled = false;
        else
            $this->btnNew->Enabled = true;

        if (floatval($this->lblMontRest->Text) == 0) {
            $this->btnNew->Visible = false;
        } else {
            $this->btnNew->Visible = true;
        }
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------

    protected function MostrarMontoCobrado() {
        $this->lblMontCobr->Text = $this->objFactPmnx->MontoCobrado;
        $decMontRest = $this->objFactPmnx->MontoTotal - $this->objFactPmnx->MontoCobrado;
        $objGuiaFact = $this->objFactPmnx->GetItemFacturaPmnAsFacturaArray()[0]->Guia;
        if (($decMontRest == 0) && ($objGuiaFact->TipoGuia == TipoGuiaType::CODCOBROENDESTINO)) {
            $strNombProc = 'Grabando POD Guia: '.$objGuiaFact->NumeGuia.' desde el Exp Nac';
            $objProcEjec = CrearProceso($strNombProc);
            $mixErroOrig = error_reporting();
            error_reporting(0);
            //------------------------------------------------------------------------------
            // Cuando la pre-factura se cobra en su totalidad, la guía se da por entregada
            //------------------------------------------------------------------------------
            if (!$objGuiaFact->tieneCheckpoint('OK')) {
                try {
                    $objCkptOkey = SdeCheckpoint::Load('OK');
                    $calFechEntr = new QDateTime(QDateTime::Now);
                    $arrDatoPodx['objGuiaPodx'] = $objGuiaFact;
                    $arrDatoPodx['objChecPodx'] = $objCkptOkey;
                    $arrDatoPodx['calFechPodx'] = $calFechEntr;
                    $arrDatoPodx['txtHoraPodx'] = date('H:i');
                    $arrDatoPodx['txtUsuaPodx'] = $this->objUsuario->CodiUsua;
                    $arrDatoPodx['txtEntrAqui'] = $this->objFactPmnx->RazonSocial;
                    $arrDatoPodx['calFechEntr'] = $calFechEntr;
                    $arrDatoPodx['txtFechEntr'] = date('d/m/Y');
                    $arrDatoPodx['txtHoraEntr'] = date('H:i');
                    $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
                    if (!$arrResuPodx['blnTodoOkey']) {
                        throw new Exception($arrResuPodx['strMensUsua']);
                    }
                } catch (Exception $e) {
                    $strMensErro = $e->getMessage();
                    $this->mensaje($strMensErro,'m','d','',__iHAND__);
                    $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $objGuiaFact->NumeGuia;
                    $arrParaErro['MensErro'] = $strMensErro;
                    $arrParaErro['ComeErro'] = 'Fallo el POD automatico en cobro de la pre-factura';
                    GrabarError($arrParaErro);
                }
            }
            error_reporting($mixErroOrig);
        }
        $this->lblMontRest->Text = (string) $decMontRest;
    }
}

RegistrarPago::Run('RegistrarPago');