<?php
//------------------------------------------------------------------------------
// Programa       : liquidacion_masiva_facturas.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 04/08/16 01:18 PM
// Proyecto       : newliberty
// Descripcion    : Este programa ofrece la posibilidad de Liquidar Masivamente
//                  un conjunto de Facturas
//------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class LiquidacionMasivaFacturas extends FormularioBaseKaizen {
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $decTotaFact;

    //---------------------------
    // Parámetros de información
    //---------------------------
    protected $lstFormPago;
    protected $txtNumeDocu;
    protected $lstCodiBanc;
    protected $txtMontPago;
    protected $txtNumeFact;
    protected $txtMontFact;

    //---------
    // Botones
    //---------
    protected $btnVerificar;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Liquidación Masiva de Facturas';

        $this->lstFormPago_Create();
        $this->txtNumeDocu_Create();
        $this->lstCodiBanc_Create();
        $this->txtMontPago_Create();
        $this->txtNumeFact_Create();
        $this->txtMontFact_Create();

        $this->btnVerificar_Create();

        $this->btnSave->Text = TextoIcono('cogs','Procesar','F','lg');
    }

    //-----------------------------
    // Construcción de los objetos
    //-----------------------------

    protected function txtNumeDocu_Create() {
        $this->txtNumeDocu = new QTextBox($this);
        $this->txtNumeDocu->Name = 'Nro del Documento';
        $this->txtNumeDocu->Required = true;
        $this->txtNumeDocu->Width = 200;
    }

    protected function lstCodiBanc_Create() {
        $this->lstCodiBanc = new QListbox($this);
        $this->lstCodiBanc->Name = 'Banco';
        $this->lstCodiBanc->Width = 205;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Banco()->Descripcion);
        $arrCodiBanc   = Banco::LoadArrayByStatusId(StatusType::ACTIVO,$objClauOrde);
        $intCantBanc   = count($arrCodiBanc);
        $this->lstCodiBanc->AddItem('- Seleccione Uno - ('.$intCantBanc.')',null);
        foreach ($arrCodiBanc as $objBanco) {
            $this->lstCodiBanc->AddItem($objBanco->__toString(), $objBanco->Id);
        }
    }

    protected function txtMontPago_Create() {
        $this->txtMontPago = new QFloatTextBox($this);
        $this->txtMontPago->Name = 'Monto del Pago';
        $this->txtMontPago->Required = true;
        $this->txtMontPago->Width = 200;
    }

    protected function lstFormPago_Create() {
        $this->lstFormPago = new QListbox($this);
        $this->lstFormPago->Name = 'Forma de Pago';
        $this->lstFormPago->Required = true;
        $this->lstFormPago->Width = 205;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::NotEqual(QQN::FormaPago()->Descripcion,'EFECTIVO');
        $objClauWher[] = QQ::Equal(QQN::FormaPago()->StatusId,StatusType::ACTIVO);
        $arrFormPago   = FormaPago::QueryArray(QQ::AndCondition($objClauWher));
        $intCantForm   = count($arrFormPago);
        $this->lstFormPago->AddItem('- Seleccione Uno - ('.$intCantForm.')',null);
        foreach ($arrFormPago as $objFormPago) {
            $this->lstFormPago->AddItem($objFormPago->__toString(),$objFormPago);
        }
        $this->lstFormPago->AddAction(new QChangeEvent(), new QAjaxAction('lstFormPago_Change'));
    }

    protected function txtNumeFact_Create() {
        $this->txtNumeFact = new QTextBox($this);
        $this->txtNumeFact->Name = QApplication::Translate("Nros de Facturas");
        $this->txtNumeFact->Required = true;
        $this->txtNumeFact->TextMode = QTextMode::MultiLine;
        $this->txtNumeFact->Height = 150;
        $this->txtNumeFact->Width = 200;
    }

    protected function txtMontFact_Create() {
        $this->txtMontFact = new QFloatTextBox($this);
        $this->txtMontFact->Name = 'Total Facturado';
        $this->txtMontFact->Enabled = false;
        $this->txtMontFact->ForeColor = 'blue';
        $this->txtMontFact->Width = 200;
    }

    protected function btnVerificar_Create() {
        $this->btnVerificar = new QButton($this);
        $this->btnVerificar->Text = TextoIcono('eye','Verificar','F','lg');
        $this->btnVerificar->CssClass = 'btn btn-primary btn-sm';
        $this->btnVerificar->AddAction(new QClickEvent(), new QServerAction('btnVerificar_Click'));
        $this->btnVerificar->PrimaryButton = true;
        $this->btnVerificar->CausesValidation = true;
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function lstFormPago_Change() {
        $objFormPago = $this->lstFormPago->SelectedValue;
        if ($objFormPago) {
            if ($objFormPago->RequiereDocumento == SinoType::SI) {
                $this->txtNumeDocu->Name = $objFormPago->TextoDocumento;
                $this->txtNumeDocu->Width = 200;
            }
        }
    }

    protected function verificarFacturas() {
        $this->mensaje();
        //---------------------------------------------------------------------
        // Las facturas deben existir y no deben estar previamente canceladas
        //---------------------------------------------------------------------
        $arrNumeFact = explode(',',nl2br2($this->txtNumeFact->Text));
        $this->txtNumeFact->Text = '';
        $arrNumeFact = LimpiarArreglo($arrNumeFact);
        $this->decTotaFact = 0;
        $blnTodoOkey = true;
        foreach ($arrNumeFact as $intNumeFact) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::FacturaPmn()->Numero,$intNumeFact);
            $objFactura    = FacturaPmn::QuerySingle(QQ::AndCondition($objClauWher));
            if ($objFactura) {
                if (strlen($objFactura->MontoCobrado) == 0) {
                    $this->txtNumeFact->Text .= $intNumeFact.' (OK)'.chr(13);
                    $this->decTotaFact += $objFactura->MontoTotal;
                } else {
                    $this->txtNumeFact->Text .= $intNumeFact.' (Prev. Cancelada)'.chr(13);
                    $blnTodoOkey = false;
                }
            } else {
                $this->txtNumeFact->Text .= $intNumeFact.' (No Existe)'.chr(13);
                $blnTodoOkey = false;
            }
        }
        $this->txtMontFact->Text = (string) $this->decTotaFact;
        if ($blnTodoOkey) {
            $decMontPago = floatval($this->txtMontPago->Text);
            $decTotaFact = floatval($this->decTotaFact);
            $decDifeMont = $decMontPago - $decTotaFact;
            if ($decDifeMont > 1) {
                $strTextMens = 'La Diferencia entre el Total Facturado y el Monto del Pago,\n no debe ser mayor a Bs 1';
                $blnTodoOkey = false;
                QApplication::ExecuteJavaScript("alert('".$strTextMens."')");
            } else {
                $this->mensaje('Transacción Exitosa','','s','check');
            }
        } else {
            $this->mensaje('Alguna(s) factura(s) no existe(n) o ya esta(n) cancelada(s)','','w','exclamation-triangle');
        }
        return $blnTodoOkey;
    }

    protected function btnVerificar_Click() {
        $this->verificarFacturas();
    }

    protected function btnSave_Click() {
        if ($this->verificarFacturas()) {
            $intFactProc = 0;
            $arrNumeFact = explode(',',nl2br2($this->txtNumeFact->Text));
            $arrNumeFact = LimpiarArreglo($arrNumeFact);
            $intCantPago = count($arrNumeFact);
            foreach ($arrNumeFact as $intNumeFact) {
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::FacturaPmn()->Numero,$intNumeFact);
                $objFactura    = FacturaPmn::QuerySingle(QQ::AndCondition($objClauWher));
                if ($objFactura) {
                    $objPagoFact = new PagoFacturaPmn();
                    $objPagoFact->FacturaId = $objFactura->Id;
                    $objPagoFact->FormaPagoId = $this->lstFormPago->SelectedValue->Id;
                    $objPagoFact->NumeroDocumento = $this->txtNumeDocu->Text;
                    $objPagoFact->BancoId = $this->lstCodiBanc->SelectedValue;
                    $objPagoFact->MontoPago = $objFactura->MontoTotal;
                    $objPagoFact->CreadoEl = new QDateTime(QDateTime::Now());
                    $objPagoFact->CreadoPor = $this->objUsuario->CodiUsua;
                    $objPagoFact->Save();
                    $intFactProc ++;
                    // Se actualiza el monto cobrado en la Factura
                    $objFactura->MontoCobrado = $objFactura->MontoTotal;
                    $objFactura->Save();
                }
            }
        }
        $strTextMens = sprintf('Facturas a Procesar (%s), Facturas Procesadas (%s)',$intCantPago,$intFactProc);
        $this->lblMensUsua->Text = $strTextMens;
        if ($intCantPago == $intFactProc) {
            $strTipoMens = 's';
            $strIconMens = 'check';
        } else {
            $strTipoMens = 'd';
            $strIconMens = 'exclamation-triangle';
        }
        $this->mensaje($strTextMens,'',$strTipoMens,$strIconMens);
    }
}

LiquidacionMasivaFacturas::Run('LiquidacionMasivaFacturas');
