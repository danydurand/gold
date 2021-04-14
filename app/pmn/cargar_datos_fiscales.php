<?php
//-----------------------------------------------------------------------------
// Programa      : cargar_datos_fiscales.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 30/07/2015
// Descripcion   : Este programa permite al Usuario cargar los datos fiscales
//                 de una Factura
//-----------------------------------------------------------------------------
require_once('../../qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargarDatosFiscales extends FormularioBaseKaizen {
	protected $objFactura;
	protected $objNotaCred;
	protected $txtNumeFact;
	protected $txtNumeDocu;
	protected $txtMaquFisc;
	protected $txtFechImpr;
	protected $txtHoraImpr;
	protected $txtFactImpr;
	protected $blnTodoOkey;

	protected $btnSave;
	protected $btnCancel;

	protected function Form_Create() {

        parent::Form_Create();
        $this->lblTituForm->Text = 'Cargar Datos Fiscales';

		$this->txtNumeFact_Create();
		$this->txtNumeDocu_Create();
		$this->txtMaquFisc_Create();
		$this->txtFechImpr_Create();
		$this->txtHoraImpr_Create();
		$this->txtFactImpr_Create();

		$this->btnSave_Create();
		$this->btnCancel_Create();
	
	}

	//------------------------------
	// Aqui se crean los objetos 
	//------------------------------

	protected function txtNumeFact_Create() {
		$this->txtNumeFact = new QTextBox($this);
		$this->txtNumeFact->Name = 'Id de Factura';
		$this->txtNumeFact->Width = 60;
		$this->txtNumeFact->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeFact_Blur'));
	}

	protected function txtNumeDocu_Create() {
		$this->txtNumeDocu = new QTextBox($this);
		$this->txtNumeDocu->Name = 'Nro de Documento';
		$this->txtNumeDocu->Width = 80;
		$this->txtNumeDocu->Required = true;
	}
	
	protected function txtMaquFisc_Create() {
		$this->txtMaquFisc = new QTextBox($this);
		$this->txtMaquFisc->Name = 'Nro Maquina Fiscal';
		$this->txtMaquFisc->Width = 100;
		$this->txtMaquFisc->Required = true;
	}
	
	protected function txtFechImpr_Create() {
		$this->txtFechImpr = new QTextBox($this);
		$this->txtFechImpr->Name = 'Fecha Impresion';
		$this->txtFechImpr->ToolTip = 'Coloque en que se imprimió la Factura en formato YYMMDD';
		$this->txtFechImpr->Width = 60;
		$this->txtFechImpr->Required = true;
		$this->txtFechImpr->HtmlAfter = ' (YYMMDD) Ej: 190218';
	}
	
	protected function txtHoraImpr_Create() {
		$this->txtHoraImpr = new QTextBox($this);
		$this->txtHoraImpr->Name = 'Hora Impresion';
		$this->txtHoraImpr->Width = 60;
		$this->txtHoraImpr->Required = true;
		$this->txtHoraImpr->HtmlAfter = ' (HHMMSS) Ej: 141215';
	}
	
	protected function txtFactImpr_Create() {
		$this->txtFactImpr = new QTextBox($this);
		$this->txtFactImpr->Name = 'Impresa ?';
		$this->txtFactImpr->Width = 25;
		$this->txtFactImpr->ForeColor = 'blue';
		$this->txtFactImpr->Enabled = false;
	}
	
	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-floppy-o fa-lg"></i> Guardar';
        $this->btnSave->CssClass = 'btn btn-success';
        $this->btnSave->HtmlEntities = false;
		$this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
		$this->btnSave->PrimaryButton = true;
		$this->btnSave->CausesValidation = true;
	}

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
        $this->btnCancel->CssClass = 'btn btn-warning';
        $this->btnCancel->HtmlEntities = false;
		$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
		$this->btnCancel->CausesValidation = false;
	}

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

	protected function txtNumeFact_Blur() {
		if (strlen($this->txtNumeFact->Text) > 0) {
			$intNumeFact = $this->txtNumeFact->Text;
			$this->objFactura  = FacturaPmn::Load($intNumeFact);
			if ($this->objFactura) {
				$this->lblMensUsua->Text = '';
				$this->txtNumeDocu->Text = $this->objFactura->Numero;
				$this->txtMaquFisc->Text = $this->objFactura->MaquinaFiscal;
				$this->txtFechImpr->Text = $this->objFactura->FechaImpresion;
				$this->txtHoraImpr->Text = $this->objFactura->HoraImpresion;
				$this->txtFactImpr->Text = SinoType::ToString($this->objFactura->ImpresaId);
				$this->btnSave->Enabled = true;
				$this->btnSave->ForeColor = null;
				$this->txtNumeDocu->SetFocus();
			} else {
				$this->lblMensUsua->Text = 'La Factura con el Id indicado, no existe';
				$this->lblMensUsua->ForeColor = 'yellow';
				$this->txtNumeDocu->Text = '';
				$this->txtMaquFisc->Text = '';
				$this->txtFechImpr->Text = '';
				$this->txtHoraImpr->Text = '';
				$this->txtFactImpr->Text = '';
				$this->btnSave->Enabled = false;
				$this->btnSave->ForeColor = 'blue';
			}
		}
	}
	
	protected function btnSave_Click() {
		$blnNCxxOkxx = false;
		if ($this->objFactura->ImpresaId) {
			$this->objNotaCred = NotaCredito::LoadByFacturaId($this->txtNumeFact->Text);
			if ($this->objNotaCred) {
				$this->objNotaCred->Numero = $this->txtNumeDocu->Text;
	   			$this->objNotaCred->MaquinaFiscal = $this->txtMaquFisc->Text;
	   			$this->objNotaCred->FechaImpresion = $this->txtFechImpr->Text;
	   			$this->objNotaCred->HoraImpresion = $this->txtHoraImpr->Text;
	   			$this->objNotaCred->ImpresaId = SinoType::SI;
	   			$this->objNotaCred->Save();

	   			//-----------------------
                // Se Anula la Factura
                //-----------------------
                $arrParaAnul['MotiAnul'] = $this->objNotaCred->Concepto;
                $arrParaAnul['UsuaAnul'] = $this->objUsuario->CodiUsua;
                $this->objFactura->AnularFactura($arrParaAnul);
                $blnNCxxOkxx = true;
			}
		}

		$this->objFactura->Numero = $this->txtNumeDocu->Text;
		$this->objFactura->MaquinaFiscal = $this->txtMaquFisc->Text;
		$this->objFactura->FechaImpresion = $this->txtFechImpr->Text;
		$this->objFactura->HoraImpresion = $this->txtHoraImpr->Text;
		$this->objFactura->ImpresaId = SinoType::SI;
		$this->objFactura->Save();
		$this->lblMensUsua->Text = 'Transaccion Exitosa';
		//-----------------------------------------------------------------------------------
		// El sistema deja registro de la transaccion realizada en la tabla de auditoria
		// de procesos 
		//-----------------------------------------------------------------------------------
		$strTextAudi  = 'Fac Id: '.$this->objFactura->Id.' | ';
		$strTextAudi .= 'Doc Fiscal: '.$this->objFactura->Numero.' | ';
		$strTextAudi .= 'Maq Fiscal: '.$this->objFactura->MaquinaFiscal.' | ';
		$strTextAudi .= 'Fec Impres: '.$this->objFactura->FechaImpresion.' | ';
		$strTextAudi .= 'Hor Impres: '.$this->objFactura->HoraImpresion;
		if ($blnNCxxOkxx) {
			$strTextAudi  = ' | NC Id: '.$this->objNotaCred->Id.' | ';
			$strTextAudi .= 'NC Doc Fiscal: '.$this->objNotaCred->Numero.' | ';
			$strTextAudi .= 'NC Maq Fiscal: '.$this->objNotaCred->MaquinaFiscal.' | ';
			$strTextAudi .= 'NC Fec Impres: '.$this->objNotaCred->FechaImpresion.' | ';
			$strTextAudi .= 'NC Hor Impres: '.$this->objNotaCred->HoraImpresion;
		}
		AuditoriaDeProcesos($strTextAudi);
	}

    protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__PMN__."/".$objUltiAcce->__toString());
    }

}
CargarDatosFiscales::Run('CargarDatosFiscales');
?>
