<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class BorrarGuias extends FormularioBaseKaizen {
	protected $txtNumeGuia;
	protected $objUsuario;

	protected $btnSave;
	protected $btnCancel;

	protected function Form_Create() {

        parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Borrar Guia(s)');

		$this->txtNumeGuia_Create();

		$this->btnSave_Create();
		$this->btnCancel_Create();
	}

	//-------------------------------
	// Aqui se crean los Objetos
	//-------------------------------
	protected function txtNumeGuia_Create() {
		$this->txtNumeGuia = new QTextBox($this);
		$this->txtNumeGuia->Name = QApplication::Translate('Guias a Borrar');
		$this->txtNumeGuia->Height = 100;
		$this->txtNumeGuia->Width = 250;
		$this->txtNumeGuia->TextMode = QTextMode::MultiLine;
		$this->txtNumeGuia->Required = true;
	}

	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-trash fa-lg"></i> Borrar';
        $this->btnSave->CssClass = 'btn btn-success';
        $this->btnSave->HtmlEntities = false;
		$this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
		$this->btnSave->PrimaryButton = true;
		$this->btnSave->CausesValidation = true;
		//----------------------------------------------------------------------------
		// En la tabla Parametro, bajo la Clave "BorrNaci" se especifican
		// cuales son los Usuarios que pueden modificar una Guia
		//----------------------------------------------------------------------------
		$blnBorrGuia = BuscarParametro("BorrNaci",$this->objUsuario->LogiUsua,"Val1",0);
		if ($blnBorrGuia) {
			$this->btnSave->Visible = true;
		} else {
			$this->btnSave->Visible = false;
		}
	}

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
        $this->btnCancel->CssClass = 'btn btn-warning';
        $this->btnCancel->HtmlEntities = false;
		$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
		$this->btnCancel->CausesValidation = false;
	}

	//----------------------------------------
	// Acciones asociadas a los Objetos
	//----------------------------------------

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$objDatabase = Guia::GetDatabase();
		$arrNumeGuia = explode(',',nl2br2($this->txtNumeGuia->Text));
		$this->txtNumeGuia->Text = '';
		$this->lblMensUsua->Text = '';
		$intCantRegi = 0;
		$objDatabase->TransactionBegin();
		foreach ($arrNumeGuia as $strNumeGuia) {
			if (strlen($strNumeGuia) > 0) {
				$strNumeGuia = DejarSoloLosNumeros($strNumeGuia);
				$objGuia = Guia::Load($strNumeGuia);
				if ($objGuia) {
					// AuditoriaDeProcesos('Se pretendio borrar la Guia Nro '.$strNumeGuia);
					//--------------------------------------------------
					// Si la Guia ya fue entregada, no se puede borrar
					//--------------------------------------------------
					if ($objGuia->CodiCkpt != 'OK') {
						//---------------------------------------------
						// Solo se podran borrar Guias Nacionales 
						//---------------------------------------------
						if ($objGuia->SistemaId != 'int') {
							//--------------------------------------------------------------
							// Si la Guia esta Facturada o Pre-Facturada no podra borrarse
							//--------------------------------------------------------------
							if ($objGuia->EstaFacturada() || $objGuia->EstaPreFacturada()) {
								$strTextMens = $strNumeGuia." (Pre-Facturada o Facturada)";
								$this->txtNumeGuia->Text .= $strTextMens.chr(13);
							} else {
								$this->txtNumeGuia->Text .= BorrarGuia($strNumeGuia).chr(13);
								// AuditoriaDeProcesos('Se borro la Guia Nro '.$strNumeGuia);
								$intCantRegi++;
							}
						} else {
							$strTextMens = $strNumeGuia." (No es una Guia Nacional)";
							$this->txtNumeGuia->Text .= $strTextMens.chr(13);
						}
					} else {
						$strTextMens = $strNumeGuia." (Esta Guia ya fue Entregada)";
						$this->txtNumeGuia->Text .= $strTextMens.chr(13);
					}
				} else {
					$strTextMens = $strNumeGuia." (No Existe)";
					$this->txtNumeGuia->Text .= $strTextMens.chr(13);
				}
			}
		}
		$objDatabase->TransactionCommit();
		$this->mensaje('<i class="fa fa-check fa-lg"></i> Registros procesados: '.$intCantRegi);
	}

	protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__PMN__."/".$objUltiAcce->__toString());
	}

}

// Go ahead and run this form object to render the page and its event handlers, using
// generated/fac_tari_masi_edit.tpl.php as the included HTML template file

BorrarGuias::Run('BorrarGuias');
?>
