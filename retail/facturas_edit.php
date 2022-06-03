<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacturasEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Facturas class.  It uses the code-generated
 * FacturasMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Facturas columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both facturas_edit.php AND
 * facturas_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacturasEditForm extends FacturasEditFormBase {
    protected $lblTituPago;
    protected $blnMostCamp = false;
    protected $intEditPago;
    protected $blnEditPago;
    protected $dtgCampPago;
    protected $lstFormPago;
    protected $lstDiviPago;
    protected $txtRefePago;
    protected $lstBancPago;
    protected $txtMontDivi;
    protected $txtMontDola;
    protected $txtMontBoli;

    protected $btnSavePago;
    protected $btnCancPago;
    protected $btnBorrPago;

    protected $dtgPagoFact;
    protected $intIdxxFact;
    protected $strOpciAdic;

    protected $btnMasxAcci;
    protected $btnVerxPago;
    protected $blnVerxPago;

    protected $dtgGuiaFact;
    protected $dtgImpoFact;

    protected $txtTotaDola;
    protected $txtCobrDola;
    protected $txtPendDola;
    protected $decTasaDola;
    protected $decTasaEuro;

    protected $txtCambDola;
    protected $txtCambBoli;
    protected $decMontPago;
    protected $strMonePago;

    protected function SetupParametros() {
        $this->intIdxxFact = QApplication::PathInfo(0);
        $this->strOpciAdic = strtoupper(QApplication::PathInfo(1));
        if (strlen($this->strOpciAdic) == 0) {
            $this->strOpciAdic = 'O';
        }
        $this->decTasaDola = $_SESSION['TasaDola'];
        $this->decTasaEuro = $_SESSION['TasaEuro'];
    }

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

    //	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

		$this->SetupParametros();

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the FacturasMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctFacturas = FacturasMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Facturas's data fields
		$this->lblId = $this->mctFacturas->lblId_Create();
		$this->lstClienteRetail = $this->mctFacturas->lstClienteRetail_Create();
		$this->lstClienteCorp = $this->mctFacturas->lstClienteCorp_Create();
		$this->calFecha = $this->mctFacturas->calFecha_Create();
		$this->calFecha->Width = 170;
		$this->calFecha = disableControl($this->calFecha);
		$this->txtCedulaRif = $this->mctFacturas->txtCedulaRif_Create();
		$this->txtCedulaRif->Width = 130;
		$this->txtRazonSocial = $this->mctFacturas->txtRazonSocial_Create();
		$this->txtRazonSocial->Width = 310;
		$this->txtRazonSocial->Placeholder = 'Razon Social';
		$this->txtDireccionFiscal = $this->mctFacturas->txtDireccionFiscal_Create();
		$this->txtDireccionFiscal->Width = 310;
		$this->txtDireccionFiscal->Placeholder = 'Dirección Fiscal';
		$this->txtTelefono = $this->mctFacturas->txtTelefono_Create();
		$this->txtTelefono->Width = 130;

		$this->lstSucursal = $this->mctFacturas->lstSucursal_Create();
		$this->lstSucursal->Width = 130;
		$this->lstReceptoria = $this->mctFacturas->lstReceptoria_Create();
		$this->lstReceptoria->Width = 170;
		$this->lstCaja = $this->mctFacturas->lstCaja_Create();
		$this->txtEstatus = $this->mctFacturas->txtEstatus_Create();
		$this->txtEstatus->Width = 130;
		$this->txtTasa = $this->mctFacturas->txtTasa_Create();
		$this->txtTasa->Width = 170;
		$this->txtTotal = $this->mctFacturas->txtTotal_Create();
		$this->txtTotal->Width = 120;
		$this->txtTotal->Text = $this->mctFacturas->Facturas->Total;
		$this->txtMontoDscto = $this->mctFacturas->txtMontoDscto_Create();
		$this->txtMontoCobrado = $this->mctFacturas->txtMontoCobrado_Create();
		$this->txtMontoCobrado->Width = 120;
		$this->txtMontoPendiente = $this->mctFacturas->txtMontoPendiente_Create();
		$this->txtMontoPendiente->Width = 120;
		$this->txtEstatusPago = $this->mctFacturas->txtEstatusPago_Create();
		$this->txtReferencia = $this->mctFacturas->txtReferencia_Create();
		$this->txtReferencia->Width = 130;
		$this->txtNumero = $this->mctFacturas->txtNumero_Create();
		$this->txtNumero->Width = 130;
		$this->txtMaquinaFiscal = $this->mctFacturas->txtMaquinaFiscal_Create();
		$this->txtFechaImpresion = $this->mctFacturas->txtFechaImpresion_Create();
		$this->txtFechaImpresion->Width = 90;
		$this->txtHoraImpresion = $this->mctFacturas->txtHoraImpresion_Create();
		$this->txtHoraImpresion->Width = 75;
		$this->chkTieneRetencion = $this->mctFacturas->chkTieneRetencion_Create();
		$this->txtNotaCreditoId = $this->mctFacturas->txtNotaCreditoId_Create();

        $this->lstSucursal       = disableControl($this->lstSucursal);
        $this->lstReceptoria     = disableControl($this->lstReceptoria);
        $this->txtNumero         = disableControl($this->txtNumero);
        $this->txtReferencia     = disableControl($this->txtReferencia);
        $this->txtFechaImpresion = disableControl($this->txtFechaImpresion);
        $this->txtHoraImpresion  = disableControl($this->txtHoraImpresion);
        $this->txtTotal          = disableControl($this->txtTotal);
        $this->txtMontoCobrado   = disableControl($this->txtMontoCobrado);
        $this->txtMontoPendiente = disableControl($this->txtMontoPendiente);
        $this->txtEstatus        = disableControl($this->txtEstatus);
        $this->txtTasa           = disableControl($this->txtTasa);

        $this->txtTotaDola_Create();
        $this->txtTotaDola = disableControl($this->txtTotaDola);
        $this->txtCobrDola_Create();
        $this->txtCobrDola = disableControl($this->txtCobrDola);
        $this->txtPendDola_Create();
        $this->txtPendDola = disableControl($this->txtPendDola);

        $this->txtCambDola_Create();
        $this->txtCambDola = disableControl($this->txtCambDola);
        $this->txtCambBoli_Create();
        $this->txtCambBoli = disableControl($this->txtCambBoli);

        $this->dtgGuiaFact_Create();
        $this->dtgImpoFact_Create();
        $this->btnMasxAcci_Create();
        $this->dtgPagoFact_Create();

        $this->lblTituPago_Create();
        $this->lstFormPago_Create();
        $this->lstDiviPago_Create();
        $this->txtRefePago_Create();
        $this->lstBancPago_Create();
        $this->txtMontDivi_Create();
        $this->txtMontDola_Create();
        $this->txtMontBoli_Create();
        
        $this->btnSavePago_Create();
        $this->btnCancPago_Create();
        $this->btnBorrPago_Create();

        $this->txtMontDola = disableControl($this->txtMontDola);
        $this->txtMontBoli = disableControl($this->txtMontBoli);


        if (strlen($this->strOpciAdic) > 0) {
            switch ($this->strOpciAdic) {
                case 'I':
                    $this->btnImprFact_Click();
                    break;
                case 'P':
                    // Ver la seccion de pagos
                    $this->pagos();
                    break;
                case 'O':
                    // Ocultar la seccion de pagos
                    $this->blnVerxPago = false;
                    break;
                default:
                    $this->danger('Opcion no considerada');
            }
        }

        $this->ActualizarCamposEnPantalla();

        //----------------------------------------------------
        // Una factura impresa, no podra eliminarse de la BD
        //----------------------------------------------------
        if ($this->mctFacturas->Facturas->Estatus == 'IMPRESA') {
            $this->btnDelete->Visible = false;
        }
        $blnBorrFact = BuscarParametro('BorrFact',$this->objUsuario->LogiUsua,'Val1',0);
        if ($blnBorrFact || ($this->objUsuario->LogiUsua == 'ddurand')) {
            $this->btnDelete->Visible = true;
        } else {
            $this->btnDelete->Visible = false;
        }
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------


    protected function lblTituPago_Create() {
        $this->lblTituPago = new QLabel($this);
        $this->lblTituPago->Text = 'Pagos <i class="fa fa-plus-circle fa-lg"></i>';
        $this->lblTituPago->HtmlEntities = false;
        $this->lblTituPago->CssClass = 'titulo';
        $this->lblTituPago->AddAction(new QClickEvent(), new QServerAction('lblTituPago_Click'));
    }

    protected function lstFormPago_Create() {
        $this->lstFormPago = new QListBox($this);
        $this->lstFormPago->Required = true;
        $this->lstFormPago->AddItem('- Selecc -',null);
        $this->lstFormPago->AddAction(new QChangeEvent(), new QAjaxAction('lstFormPago_Change'));
        $this->cargarFormasDePago();
    }

    protected function lstFormPago_Change() {
        $intIdxxForm = $this->lstFormPago->SelectedValue;
        if (!is_null($intIdxxForm)) {
            $objFormPago = FormaPago::Load($intIdxxForm);
            if ($objFormPago->RequiereDocumento) {
                $this->txtRefePago = enableControl($this->txtRefePago);
                $this->lstBancPago = enableControl($this->lstBancPago);
            } else {
                $this->txtRefePago = disableControl($this->txtRefePago);
                $this->lstBancPago = disableControl($this->lstBancPago);
            }
        }
    }

    protected function lstDiviPago_Create() {
        $this->lstDiviPago = new QListBox($this);
        $this->lstDiviPago->Required = true;
        $this->lstDiviPago->AddItem('- Sel -',null);
        $this->cargarDivisasDePago();
    }

    protected function txtRefePago_Create() {
        $this->txtRefePago = new QTextBox($this);
        $this->txtRefePago->Width = 100;
    }

    protected function lstBancPago_Create() {
        $this->lstBancPago = new QListBox($this);
        $this->lstBancPago->AddItem('- Selecc -',null);
        $this->lstBancPago->Width = 120;
        $this->cargarBancosDePago();
    }

    protected function txtMontDivi_Create() {
        $this->txtMontDivi = new QTextBox($this);
        $this->txtMontDivi->Width = 120;
        $this->txtMontDivi->Required = true;
    }

    protected function txtMontDola_Create() {
        $this->txtMontDola = new QTextBox($this);
        $this->txtMontDola->Width = 90;
    }

    protected function txtMontBoli_Create() {
        $this->txtMontBoli = new QTextBox($this);
        $this->txtMontBoli->Width = 120;
    }

    protected function cargarFormasDePago($intIdxxForm=null) {
        $this->lstFormPago->RemoveAllItems();
        $arrFormPago = FormaPago::LoadArrayByStatusId(true);
        $this->lstFormPago->AddItem('- Selecc -',null);
        foreach ($arrFormPago as $objFormPago) {
            $blnSeleRegi = $intIdxxForm == $objFormPago->Id;
            $this->lstFormPago->AddItem($objFormPago->__toString(), $objFormPago->Id, $blnSeleRegi);
        }
    }

    protected function cargarDivisasDePago($intIdxxDivi=null) {
        $this->lstDiviPago->RemoveAllItems();
        $arrDiviPago = Divisas::LoadAll();
        $this->lstDiviPago->AddItem('- Sel -',null);
        foreach ($arrDiviPago as $objDiviPago) {
            $blnSeleRegi = $intIdxxDivi == $objDiviPago->Id;
            $this->lstDiviPago->AddItem($objDiviPago->__toString(), $objDiviPago->Id, $blnSeleRegi);
        }
    }

    protected function cargarBancosDePago($intIdxxBanc=null) {
        $this->lstBancPago->RemoveAllItems();
        $arrBancPago = Banco::LoadArrayByStatusId(true);
        $this->lstBancPago->AddItem('- Selecc -',null);
        foreach ($arrBancPago as $objBancPago) {
            $blnSeleRegi = $intIdxxBanc == $objBancPago->Id;
            $this->lstBancPago->AddItem($objBancPago->__toString(), $objBancPago->Id, $blnSeleRegi);
        }
    }

    protected function btnSavePago_Create() {
        $this->btnSavePago = new QButtonP($this);
        $this->btnSavePago->Text = TextoIcono('check','','F','lg');
        $this->btnSavePago->HtmlEntities = false;
        $this->btnSavePago->AddAction(new QClickEvent(), new QServerAction('btnSavePago_Click'));
    }

    protected function btnCancPago_Create() {
        $this->btnCancPago = new QButtonW($this);
        $this->btnCancPago->Text = TextoIcono('times-circle','','F','lg');
        $this->btnCancPago->HtmlEntities = false;
        $this->btnCancPago->AddAction(new QClickEvent(), new QServerAction('btnCancPago_Click'));
    }

    protected function btnBorrPago_Create() {
        $this->btnBorrPago = new QButtonD($this);
        $this->btnBorrPago->Text = TextoIcono('trash','','F','lg');
        $this->btnBorrPago->HtmlEntities = false;
        $this->btnBorrPago->AddAction(new QClickEvent(), new QConfirmAction('Seguro que desea borrar el Pago ?'));
        $this->btnBorrPago->AddAction(new QClickEvent(), new QServerAction('btnBorrPago_Click'));
    }

    protected function btnCancPago_Click() {
        $this->mostrarCampos('add');
    }

    public function lblTituPago_Click() {
        $this->mostrarCampos('add');
    }


    protected function btnSavePago_Click() {
        if ($this->ValidarCampos()) {
            $objPagoFact = null;
            $objRegiViej = null;

            $this->decMontPago = $this->txtMontDivi->Text;
            $this->strMonePago = $this->lstDiviPago->SelectedName;
            try {
                if (!$this->blnEditPago) {
                    $objPagoFact = new FacturaPagos();
                    $objPagoFact->FacturaId = $this->mctFacturas->Facturas->Id;
                    $objPagoFact->CajaId    = $_SESSION['CajaId'];
                    $objPagoFact->CreatedBy = $this->objUsuario->CodiUsua;
                } else {
                    $objPagoFact = FacturaPagos::Load($this->intEditPago);
                    $objPagoFact->UpdatedBy = $this->objUsuario->CodiUsua;
                }
                $objRegiViej = clone $objPagoFact;
                $objPagoFact->FormaPagoId = $this->lstFormPago->SelectedValue;
                $objPagoFact->DivisaId    = $this->lstDiviPago->SelectedValue;
                $objPagoFact->Referencia  = strtoupper($this->txtRefePago->Text);
                if (!is_null($this->lstBancPago->SelectedValue)) {
                    $objPagoFact->BancoId = $this->lstBancPago->SelectedValue;
                }
                $objPagoFact->MontoDivisa = (float)$this->decMontPago;
                if ($this->strMonePago == 'USD') {
                    $objPagoFact->MontoUsd = (float)$objPagoFact->MontoDivisa;
                    $objPagoFact->MontoBs  = (float)($objPagoFact->MontoDivisa * $this->decTasaDola);
                } else {
                    $objPagoFact->MontoUsd = (float)($objPagoFact->MontoDivisa / $this->decTasaDola) ;
                    $objPagoFact->MontoBs  = (float)$objPagoFact->MontoDivisa;
                }
                $objPagoFact->Save();
            } catch (Exception $e) {
                t('Excepcion: '.$e->getMessage());
                $this->danger($e->getMessage());
                return;
            } catch (Error $e) {
                t('Error: '.$e->getMessage());
                $this->danger($e->getMessage());
                return;
            }

            $strMensTran = 'N/A';
            if ($this->blnEditPago) {
                //----------------------------------------------------------------------------------
                // Si estamos en modo Edicion, entonces se verifican la existencia de algun cambio
                //----------------------------------------------------------------------------------
                $objRegiNuev = $objPagoFact;
                $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                    $strMensTran = implode(',',$objResuComp->DifferentFields);
                }
            } else {
                $strMensTran = "Creado";
            }
            $objPagoFact->logDeCambios($strMensTran);

            $this->mctFacturas->Facturas->ActualizarMontosRetail();

            $this->ActualizarCamposEnPantalla();

            $this->resetearCamposDelPago();

            $this->dtgPagoFact->Refresh();

        }

    }

    protected function ValidarCampos() {
        if (is_null($this->lstFormPago->SelectedValue)) {
            $this->danger('Forma de Pago requerida');
            return false;
        }
        if (is_null($this->lstDiviPago->SelectedValue)) {
            $this->danger('Divisa o Moneda requerida');
            return false;
        }
        if (strlen(trim($this->txtMontDivi->Text)) == 0) {
            $this->danger('Monto del Pago requerido');
            return false;
        }
        return true;
    }

    protected function resetearCamposDelPago() {
        $this->lstFormPago->SelectedIndex = 0;
        $this->lstDiviPago->SelectedIndex = 0;
        $this->txtRefePago->Text = '';
        $this->lstBancPago->SelectedIndex = 0;
        $this->txtMontDivi->Text = '';
        $this->txtMontDola->Text = '';
        $this->txtMontBoli->Text = '';

        $this->btnBorrPago->Visible = false;
    }
    
    protected function btnBorrPago_Click() {
        $objPagoFact = FacturaPagos::Load($this->intEditPago);
        $objPagoFact->Delete();
        $objPagoFact->logDeCambios('Borrado');
        $this->blnEditPago = false;

        $this->resetearCamposDelPago();

        $this->mctFacturas->Facturas->ActualizarMontosRetail();

        $this->ActualizarCamposEnPantalla();

        $this->dtgPagoFact->Refresh();

    }

    protected function ActualizarCamposEnPantalla() {
        t('Actualizando campos en la pantalla');
        $this->txtCobrDola->Text       = round($this->mctFacturas->Facturas->MontoCobrado / $this->decTasaDola,2);
        $this->txtPendDola->Text       = round($this->mctFacturas->Facturas->MontoPendiente / $this->decTasaDola,2);
        $this->txtMontoCobrado->Text   = round($this->mctFacturas->Facturas->MontoCobrado,2);
        $this->txtMontoPendiente->Text = round($this->mctFacturas->Facturas->MontoPendiente,2);
        t('aja');
        if ($this->txtMontoPendiente->Text == 0) {
            $this->btnSavePago->Visible = false;
            $this->btnCancPago_Click();
        } else {
            $this->btnSavePago->Visible = true;
        }
        t('voy');
        if ($this->mctFacturas->Facturas->MontoCobrado == 0) {
            t('No se ha cobrado nada,... tampoco hay cambio ni vuelto que dar');
            $this->txtCambDola->Text = 0;
            $this->txtCambBoli->Text = 0;
        } else {
            if ($this->strMonePago == 'USD') {
                t('Pago en USD');
                $decDeudDola = $this->txtTotaDola->Text;
                if ($this->decMontPago > $decDeudDola) {
                    t('Pago en USD.  El monto del pago fue: '.$this->decMontPago);
                    $decCambDola = $this->decMontPago - ($this->mctFacturas->Facturas->MontoCobrado/$this->decTasaDola);
                    $this->txtCambDola->Text = nf($decCambDola);
                    t('El vuelto en USD: '.$this->txtCambDola->Text);
                    $decCambBoli = $decCambDola * $this->decTasaDola;
                    $this->txtCambBoli->Text = nf($decCambBoli);
                    t('El vuelto en VEB: '.$decCambBoli);
                } else {
                    $this->txtCambDola->Text = nf(0);
                    $this->txtCambBoli->Text = nf(0);
                }
            }
            if ($this->strMonePago == 'VEB') {
                t('Pago en BS');
                $decDeudBoli = $this->txtTotal->Text;
                if ($this->decMontPago > $decDeudBoli) {
                    $decCambBoli = $this->decMontPago - $this->mctFacturas->Facturas->MontoCobrado;
                    $decCambDola = $decCambBoli / $this->decTasaDola;
                    $this->txtCambBoli->Text = nf($decCambBoli);
                    $this->txtCambDola->Text = nf($decCambDola);
                } else {
                    $this->txtCambDola->Text = nf(0);
                    $this->txtCambBoli->Text = nf(0);
                }
            }
            t('pasando por aqui');
        }
        $this->cargarMasAcciones();
    }

    protected function btnCancTari_Click() {
        $this->mostrarCampos('add');
    }

    protected function mostrarCampos($strAction='add') {
        $this->mensaje();
        if ($strAction == 'add') {
            $this->intEditPago = null;
            $this->blnMostCamp = !$this->blnMostCamp;
            $this->btnBorrPago->Visible = false;
            $this->resetearCamposDelPago();
        }
        if ($strAction == 'edit') {
            //$this->intEditPago = true;
            $this->blnMostCamp = true;
            $this->btnBorrPago->Visible = true;
        }
    }

    //----------------------------------------------
    // DataGrid de Pagos realizados a la Factura
    //----------------------------------------------

    protected function dtgPagoFact_Create() {
        $this->dtgPagoFact = new QDataGrid($this);
        $this->dtgPagoFact->FontSize = 12;
        $this->dtgPagoFact->ShowFilter = false;

        $this->dtgPagoFact->CssClass = 'datagrid';
        $this->dtgPagoFact->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPagoFact->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgPagoFact->AddRowAction(new QClickEvent(), new QServerAction('dtgPagoFactRow_Click'));

        $this->dtgPagoFact->UseAjax = true;

        $this->dtgPagoFact->SetDataBinder('dtgPagoFact_Bind');

        $this->dtgPagoFactColumns();

    }

    public function dtgPagoFactRow_Click($strFormId, $strControlId, $strParameter) {
        $id = (int)$strParameter;
        $this->intEditPago = $id;
        $this->mostrarCampos('edit');
        $objFactPago = FacturaPagos::Load($id);

        $this->cargarFormasDePago($objFactPago->FormaPagoId);
        $this->cargarDivisasDePago($objFactPago->DivisaId);
        $this->txtRefePago->Text = $objFactPago->Referencia;
        $this->cargarBancosDePago($objFactPago->BancoId);
        $this->txtMontDivi->Text = nf($objFactPago->MontoDivisa);
        $this->txtMontDola->Text = nf($objFactPago->MontoUsd);
        $this->txtMontBoli->Text = nf($objFactPago->MontoBs);
        $this->blnEditPago       = true;
    }

    protected function dtgPagoFact_Bind() {
        $this->dtgPagoFact->DataSource = $this->mctFacturas->Facturas->GetFacturaPagosAsFacturaArray();
    }

    protected function dtgPagoFactColumns() {
        $colFormPago = new QDataGridColumn($this);
        $colFormPago->Name = 'Forma de Pago';
        $colFormPago->Html = '<?= $_ITEM->FormaPago->Descripcion ?>';
        $colFormPago->Width = 90;
        $this->dtgPagoFact->AddColumn($colFormPago);

        $colDiviPago = new QDataGridColumn($this);
        $colDiviPago->Name = 'Divisa';
        $colDiviPago->Html = '<?= $_ITEM->Divisa->Codigo ?>';
        $colDiviPago->Width = 50;
        $this->dtgPagoFact->AddColumn($colDiviPago);

        $colNumeRefe = new QDataGridColumn($this);
        $colNumeRefe->Name = 'Referencia';
        $colNumeRefe->Html = '<?= $_ITEM->Referencia ?>';
        $colNumeRefe->Width = 80;
        $this->dtgPagoFact->AddColumn($colNumeRefe);

        $colBancPago = new QDataGridColumn($this);
        $colBancPago->Name = 'Banco';
        $colBancPago->Html = '<?= $_ITEM->BancoId ? $_ITEM->Banco->Descripcion : null ?>';
        $colBancPago->Width = 130;
        $this->dtgPagoFact->AddColumn($colBancPago);

        $colMontPago = new QDataGridColumn($this);
        $colMontPago->Name = 'Monto del Pago';
        $colMontPago->Html = '<?= nf($_ITEM->MontoDivisa) ?>';
        $colMontPago->Width = 40;
        $this->dtgPagoFact->AddColumn($colMontPago);

        $colMontDola = new QDataGridColumn($this);
        $colMontDola->Name = 'Monto USD';
        $colMontDola->Html = '<?= nf($_ITEM->MontoUsd) ?>';
        $colMontDola->Width = 40;
        $this->dtgPagoFact->AddColumn($colMontDola);

        $colMontBoli = new QDataGridColumn($this);
        $colMontBoli->Name = 'Monto BS';
        $colMontBoli->Html = '<?= nf($_ITEM->MontoBs) ?>';
        $colMontBoli->Width = 40;
        $this->dtgPagoFact->AddColumn($colMontBoli);

    }

    protected function pagos() {
        $this->blnVerxPago = !$this->blnVerxPago;
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $this->cargarMasAcciones();

    }

    protected function cargarMasAcciones() {
        $arrOpciDrop = array();
        if ($this->strOpciAdic == 'O') {
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id.'/P',
                TextoIcono('paypal','COBRAR')
            );
        } else {
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id.'/O',
                TextoIcono('eye-slash','OCULTAR PAGOS')
            );
        }
        //if ($this->mctFacturas->Facturas->MontoPendiente == 0) {
        if ($this->mctFacturas->Facturas->_Imprimible()) {
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id.'/I',
                TextoIcono('print','Imprimir')
            );
        }
        $strTextBoto = TextoIcono('plus','Acciones','F','lg');
        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);
    }

    protected function txtTotaDola_Create() {
	    $this->txtTotaDola = new QFloatTextBox($this);
        $this->txtTotaDola->Width = 70;
        $decTasaDola = $_SESSION['TasaDola'];
        //$this->txtTotaDola->Text = nf($this->mctFacturas->Facturas->Total / $decTasaDola);
        $this->txtTotaDola->Text = $this->mctFacturas->Facturas->TotaDola();
    }

    protected function txtCobrDola_Create() {
	    $this->txtCobrDola = new QFloatTextBox($this);
        $this->txtCobrDola->Width = 70;
        $decTasaDola = $_SESSION['TasaDola'];
        //$this->txtCobrDola->Text = nf($this->txtMontoCobrado->Text / $decTasaDola,2);
        $this->txtCobrDola->Text = $this->mctFacturas->Facturas->CobrDola();
    }

    protected function txtPendDola_Create() {
	    $this->txtPendDola = new QFloatTextBox($this);
        $this->txtPendDola->Width = 70;
        $decTasaDola = $_SESSION['TasaDola'];
        //$this->txtPendDola->Text = nf($this->txtMontoPendiente->Text / $decTasaDola,2);
        $this->txtPendDola->Text = $this->mctFacturas->Facturas->PendDola();
    }

    protected function txtCambDola_Create() {
        $this->txtCambDola = new QTextBox($this);
        $this->txtCambDola->Width = 70;
    }

    protected function txtCambBoli_Create() {
        $this->txtCambBoli = new QTextBox($this);
        $this->txtCambBoli->Width = 120;
    }


    protected function dtgImpoFact_Create() {
        $this->dtgImpoFact = new QDataGrid($this);
        $this->dtgImpoFact->FontSize = 12;
        $this->dtgImpoFact->ShowFilter = false;

        $this->dtgImpoFact->CssClass = 'datagrid';
        //$this->dtgImpoFact->AlternateRowStyle->CssClass = 'alternate';

        /*$this->dtgImpoFact->RowActionParameterHtml = '<?= $_ITEM->Id ?>';*/
        //$this->dtgImpoFact->AddRowAction(new QClickEvent(), new QAjaxAction('dtgImpoFactRow_Click'));

        $this->dtgImpoFact->UseAjax = true;

        $this->dtgImpoFact->SetDataBinder('dtgImpoFact_Bind');

        $this->dtgImpoFactColumns();
    }

    protected function dtgImpoFact_Bind() {
        $objClauOrde = QQ::OrderBy(QQN::FacturaItems()->Concepto->Orden);
        $this->dtgImpoFact->DataSource = $this->mctFacturas->Facturas->GetFacturaItemsAsFacturaArray($objClauOrde);
    }

    protected function dtgImpoFactColumns() {
        $colMostComo = new QDataGridColumn($this);
        $colMostComo->Name = QApplication::Translate('Concepto');
        $colMostComo->Html = '<?= $_ITEM->MostrarComo ?>';
        $colMostComo->Width = 100;
        $this->dtgImpoFact->AddColumn($colMostComo);

        $colMontConc = new QDataGridColumn($this);
        $colMontConc->Name = QApplication::Translate('Monto Bs');
        $colMontConc->Html = '<?= nf($_ITEM->Monto,2) ?>';
        $colMontConc->Width = 80;
        $colMontConc->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgImpoFact->AddColumn($colMontConc);
    }

    protected function dtgGuiaFact_Create() {
        $this->dtgGuiaFact = new QDataGrid($this);
        $this->dtgGuiaFact->FontSize = 12;
        $this->dtgGuiaFact->ShowFilter = false;

        $this->dtgGuiaFact->CssClass = 'datagrid';
        $this->dtgGuiaFact->AlternateRowStyle->CssClass = 'alternate';

        /*$this->dtgGuiaFact->RowActionParameterHtml = '<?= $_ITEM->Id ?>';*/
        //$this->dtgGuiaFact->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiaFactRow_Click'));

        $this->dtgGuiaFact->UseAjax = true;

        $this->dtgGuiaFact->SetDataBinder('dtgGuiaFact_Bind');

        $this->dtgGuiaFactColumns();
    }

    protected function dtgGuiaFact_Bind() {
        $this->dtgGuiaFact->DataSource = $this->mctFacturas->Facturas->GetFacturaGuiasAsFacturaArray();
    }

    //public function dtgGuiaFactRow_Click($strFormId, $strControlId, $strParameter) {
    //    $intId = intval($strParameter);
    //    QApplication::Redirect(__SIST__."/nota_entrega_edit.php/$intId");
    //}

    protected function dtgGuiaFactColumns() {
        $colNumeGuia = new QDataGridColumn($this);
        $colNumeGuia->Name = QApplication::Translate('Nro Guia');
        $colNumeGuia->Html = '<?= $_ITEM->Guia->Numero ?>';
        $colNumeGuia->Width = 80;
        $this->dtgGuiaFact->AddColumn($colNumeGuia);

        $colDescCont = new QDataGridColumn($this);
        $colDescCont->Name = QApplication::Translate('Contenido');
        $colDescCont->Html = '<?= substr($_ITEM->Guia->Contenido,0,35) ?>';
        $colDescCont->Width = 200;
        $this->dtgGuiaFact->AddColumn($colDescCont);

        $colDestGuia = new QDataGridColumn($this);
        $colDestGuia->Name = QApplication::Translate('Dest');
        $colDestGuia->Html = '<?= $_ITEM->Guia->Destino->Iata ?>';
        $colDestGuia->Width = 60;
        $this->dtgGuiaFact->AddColumn($colDestGuia);

        $colTotaGuia = new QDataGridColumn($this);
        $colTotaGuia->Name = QApplication::Translate('Total Bs');
        $colTotaGuia->Html = '<?= nf($_ITEM->Guia->Total,2) ?>';
        $colTotaGuia->Width = 50;
        //$colTotaGuia->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgGuiaFact->AddColumn($colTotaGuia);

    }

    protected function determinarPosicion() {
        if ($this->mctFacturas->Facturas && !isset($_SESSION['DataFacturas'])) {
            $_SESSION['DataFacturas'] = serialize(array($this->mctFacturas->Facturas));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataFacturas']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctFacturas->Facturas->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Facturas',$this->mctFacturas->Facturas->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    public function btnImprFact_Click() {
        $this->mctFacturas->Facturas->Estatus = 'IMPRESA';
        $this->mctFacturas->Facturas->Save();
        $this->btnDelete->Visible = false;
        QApplication::Redirect(__SIST__.'/factura_html2pdf.php?intIdxxFact=' . $this->mctFacturas->Facturas->Id);
    }

    protected function btnVolvList_Click() {
        if ($this->mctFacturas->Facturas->CountFacturaGuiasesAsFactura() == 1) {
            $objGuiaFact = $this->mctFacturas->Facturas->GetFacturaGuiasAsFacturaArray()[0];
            $strPagiReto = 'consulta_guia_new.php/'.$objGuiaFact->GuiaId;
        } else {
            $strPagiReto = 'guias_list.php';
        }
        QApplication::Redirect(__SIST__.'/'.$strPagiReto);
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/facturas_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctFacturas->Facturas;
		$this->mctFacturas->SaveFacturas();
		if ($this->mctFacturas->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctFacturas->Facturas;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Facturas';
				$arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Referencia;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Facturas';
			$arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Referencia;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$this->mctFacturas->Facturas->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        if ($blnTodoOkey) {
            $arrGuiaFact = $this->mctFacturas->Facturas->GetFacturaGuiasAsFacturaArray();
            $intGuiaFact = $arrGuiaFact[0]->Guia->Id;
            Guias::RomperRelacionConFactura($this->mctFacturas->Facturas->Id);
            $this->mctFacturas->DeleteFacturas();
            $arrLogxCamb['strNombTabl'] = 'Facturas';
            $arrLogxCamb['intRefeRegi'] = $this->mctFacturas->Facturas->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctFacturas->Facturas->Referencia;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$intGuiaFact);
            //$this->RedirectToListPage();
        }
    }

}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// facturas_edit.tpl.php as the included HTML template file
FacturasEditForm::Run('FacturasEditForm');
?>