<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class AnularFactura extends FormularioBaseKaizen {

    /* @var $objFactAnul Facturas */

    protected $objFactAnul;
    protected $txtMotiAnul;
    protected $txtNombClie;
    protected $txtRefeFact;
    protected $txtMontFact;
    protected $txtAnulPorx;
    protected $calFechAnul;


    protected function Setup() {
        $intFactIdxx = QApplication::PathInfo(0);
        $this->objFactAnul = Facturas::Load($intFactIdxx);
        if (!$this->objFactAnul) {
            $this->danger('La Factura que se pretende Anular, no Existe');
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->Setup();

        $this->lblTituForm->Text = QApplication::Translate('Anular Factura');

        $this->txtMotiAnul_Create();
        $this->txtNombClie_Create();
        $this->txtRefeFact_Create();
        $this->txtMontFact_Create();
        $this->txtAnulPorx_Create();
        $this->calFechAnul_Create();

        $this->txtNombClie = disableControl($this->txtNombClie);
        $this->txtRefeFact = disableControl($this->txtRefeFact);
        $this->txtMontFact = disableControl($this->txtMontFact);
        $this->txtAnulPorx = disableControl($this->txtAnulPorx);
        $this->calFechAnul = disableControl($this->calFechAnul);

        if ($this->objFactAnul->Estatus == 'ANULADA') {
            $this->mostrarCamposDeAnulacion();
        }

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function mostrarCamposDeAnulacion($blnRecaDato=false) {
        if ($blnRecaDato) {
            //-----------------
            // Recargar datos
            //-----------------
            $this->txtAnulPorx->Text = $this->objFactAnul->AnuladaPorObject
                ? $this->objFactAnul->MotivoAnulacion
                : '';
            $this->txtAnulPorx->Text = $this->objFactAnul->AnuladaPorObject
                ? $this->objFactAnul->AnuladaPorObject->LogiUsua
                : '';
            $this->calFechAnul->Text = $this->objFactAnul->FechaHoraAnulacion
                ? $this->objFactAnul->FechaHoraAnulacion->__toString('YYYY-MM-DD hhh:mm:ss')
                : '';
        }
        $this->btnSave->Visible = false;
        $this->txtAnulPorx->Visible = true;
        $this->calFechAnul->Visible = true;
        $this->txtMotiAnul = disableControl($this->txtMotiAnul);
    }

    protected function btnCancel_Click() {
        $strPagiReto = __SIST__.'/facturas_edit.php/'.$this->objFactAnul->Id;
        QApplication::Redirect($strPagiReto);
    }

    protected function txtMotiAnul_Create() {
        $this->txtMotiAnul = new QTextBox($this);
        $this->txtMotiAnul->Name = 'Motivo de Anulacion';
        $this->txtMotiAnul->TextMode = QTextMode::MultiLine;
        $this->txtMotiAnul->Rows = 3;
        $this->txtMotiAnul->Width = 300;
        $this->txtMotiAnul->Required = true;
        $this->txtMotiAnul->MaxLength = 250;
        $this->txtMotiAnul->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtMotiAnul->Text = $this->objFactAnul->AnuladaPorObject
            ? $this->objFactAnul->MotivoAnulacion
            : '';
    }

    protected function txtNombClie_Create() {
        $this->txtNombClie = new QTextBox($this);
        $this->txtNombClie->Name = 'Cliente';
        $this->txtNombClie->Text = $this->objFactAnul->ClienteCorp->NombClie;
        $this->txtNombClie->Width = 300;
    }

    protected function txtRefeFact_Create() {
        $this->txtRefeFact = new QTextBox($this);
        $this->txtRefeFact->Name = 'Factura';
        $this->txtRefeFact->Text = $this->objFactAnul->Referencia;
    }

    protected function txtMontFact_Create() {
        $this->txtMontFact = new QTextBox($this);
        $this->txtMontFact->Name = 'Monto';
        $this->txtMontFact->Text = $this->objFactAnul->Total;
    }

    protected function txtAnulPorx_Create() {
        $this->txtAnulPorx = new QTextBox($this);
        $this->txtAnulPorx->Name = 'Anulada Por';
        $this->txtAnulPorx->Visible = false;
        $this->txtAnulPorx->Text = $this->objFactAnul->AnuladaPorObject
            ? $this->objFactAnul->AnuladaPorObject->LogiUsua
            : '';
    }

    protected function calFechAnul_Create() {
        $this->calFechAnul = new QTextBox($this);
        $this->calFechAnul->Name = 'Fecha-Hora Anulación';
        $this->calFechAnul->Visible = false;
        $this->calFechAnul->Text = $this->objFactAnul->FechaHoraAnulacion
            ? $this->objFactAnul->FechaHoraAnulacion->__toString('YYYY-MM-DD hhh:mm:ss')
            : '';
    }


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        t('****************');
        t('Anulando Factura');
        t('Hora Inicio: '.date('H:i:s'));
        $objDataBase = Facturas::GetDatabase();
        $objDataBase->TransactionBegin();
        $strTextNdcx = '';
        $strMotiAnul = strtoupper(trim($this->txtMotiAnul->Text));
        //-------------------------------------------------
        // Se desligan las Notas de Entrega de la Factura
        //-------------------------------------------------
        $intCantMani = 0;
        $arrNotaFact = $this->objFactAnul->GetNotaEntregaAsFacturaArray();
        foreach ($arrNotaFact as $objNotaFact) {
            $objNotaFact->desAsociandoNotaConFactura();
            $strTextMens = 'Desligada de la Fact: '.$this->objFactAnul->Referencia.', por Anulacion';
            $objNotaFact->logDeCambios($strTextMens);
            $intCantMani++;
        }
        $strTextMani = "Manifiestos desasociados: $intCantMani";
        // t($strTextMani);
        //-----------------------------------------------------------------------------
        // Se crear la Nota de Credito correspondiente, cuando haya pagos registrados
        //-----------------------------------------------------------------------------
        $decMontAbon = $this->objFactAnul->MontoAbono;
        if ($decMontAbon > 0) {
            // t('La factura tiene pagos, voy a crear la NDC');
            try {
                $objNotaCorp = new NotaCreditoCorp();
                $objNotaCorp->Referencia    = NotaCreditoCorp::proxReferencia();
                $objNotaCorp->Tipo          = 'AUTOMATICA';
                $objNotaCorp->ClienteCorpId = $this->objFactAnul->ClienteCorp->CodiClie;
                $objNotaCorp->PagoCorpId    = null;
                $objNotaCorp->FacturaId     = $this->objFactAnul->Id;
                $objNotaCorp->Fecha         = new QDateTime(QDateTime::Now());
                $objNotaCorp->Monto         = $decMontAbon;
                $objNotaCorp->Estatus       = 'DISPONIBLE';
                $objNotaCorp->Observacion   = $strMotiAnul;
                $objNotaCorp->CreatedBy     = $this->objUsuario->CodiUsua;
                $objNotaCorp->CreatedAt     = new QDateTime(QDateTime::Now());
                $objNotaCorp->Save();
                $strTextLogx = 'Se creo NDC por Anulacion de Factura. Monto: '.$objNotaCorp->Monto;
                // t($strTextLogx);
                $objNotaCorp->logDeCambios($strTextLogx);
                $strTextNdcx = "NDC creada por: $decMontAbon";
            } catch (Exception $e) {
                t('Error: '.$e->getMessage());
                $this->danger('Error: '.$e->getMessage());
                $this->objFactAnul->logDeCambios($e->getMessage());
                $objDataBase->TransactionRollBack();
                return;
            }
            // t('Anulando los pagos asociados');
            $arrPagoFact = $this->objFactAnul->GetPagosCorpAsFacturaPagoCorpArray();
            // t('Hay: '.count($arrPagoFact).' pagos asociados...');
            t($arrPagoFact);
            foreach ($arrPagoFact as $objPagoFact) {
                // t('Procesando pago: '.$objPagoFact->Id.' de la Factura: '. $this->objFactAnul->Id);
                $objPagoFact->invalidarPago($this->objFactAnul->Id);
            }
        }
        // t('Voy a anular la factura');
        //-----------------------------------
        // Datos de Anulacion de la Factura
        //-----------------------------------
        try {
            $this->objFactAnul->NotaCreditoId = isset($objNotaCorp) ? $objNotaCorp->Id : null;
            $this->objFactAnul->Estatus = 'ANULADA';
            $this->objFactAnul->MotivoAnulacion = $strMotiAnul;
            $this->objFactAnul->Total = 0;
            $this->objFactAnul->MontoAbono = 0;
            $this->objFactAnul->MontoCobrado = 0;
            $this->objFactAnul->MontoPendiente = 0;
            $this->objFactAnul->AnuladaPor = $this->objUsuario->CodiUsua;
            $this->objFactAnul->FechaHoraAnulacion = new QDateTime(QDateTime::Now);
            $this->objFactAnul->Save();
            $this->objFactAnul->logDeCambios('Anulada por '.$this->objUsuario->LogiUsua);
            $objDataBase->TransactionCommit();
        } catch (Exception $e) {
            t('Error: '.$e->getMessage());
            $this->danger('Error: '.$e->getMessage());
            $objDataBase->TransactionRollBack();
            return;
        }
        //----------------------------------------------------
        // Se muestra en pantalla los datos de la anulacion
        //----------------------------------------------------
        $this->mostrarCamposDeAnulacion(true);
        // t('Actualizando Saldo del Cliente...');
        // $this->objFactAnul->ClienteCorp->calcularSaldoExcedente();
        UpdateCustomersBalance();
        t('Hora Final: ' . date('H:i:s'));
        $strTextMens = "Factura Anulada Exitosamente | ".$strTextMani." | ".$strTextNdcx;
        $this->success($strTextMens);
        // t('Proceso de anulacion culminado !!!');
    }
}

AnularFactura::Run('AnularFactura');
?>