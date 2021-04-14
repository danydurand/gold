<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RebajaMasivaCod extends FormularioBaseKaizen {
	protected $txtNombPers;  // Persona que Recibio el Pago
	protected $lstFormPago;  // Forma de Pago
	protected $txtNumeDocu;  // Nro del Documento (cheque o deposito)
	protected $calFechPago;  // Fecha de Pago

	protected $txtNumeSeri;
	protected $strCadeSqlx;
	protected $objDataBase;
	protected $intContRegi;
	protected $chkPagoProc;  // Permite especificar si se debe grabar o no el Pago Procesado de las guias
	protected $dlgMensUsua;

	protected function Form_Create() {
		parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Rebaja Masiva de COD');

		$this->txtNombPers_Create();
		$this->lstFormPago_Create();
		$this->txtNumeDocu_Create();
		$this->calFechPago_Create();
		$this->txtNumeSeri_Create();
		$this->chkPagoProc_Create();

		$this->dlgMensUsua_Create();

		$this->intContRegi = 0;
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function txtNombPers_Create() {
		$this->txtNombPers = new QTextBox($this);
		$this->txtNombPers->Name = QApplication::Translate('Persona que Recibió el Pago');
		$this->txtNombPers->Width = 180;
		$this->txtNombPers->MaxLength = 20;
		$this->txtNombPers->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
		$this->txtNombPers->Required = true;
	}

	protected function lstFormPago_Create() {
		$this->lstFormPago = new QListBox($this);
		$this->lstFormPago->Name = QApplication::Translate('Forma de Pago');
		$this->lstFormPago->Width = 180;
		$this->lstFormPago->Required = true;
		$this->lstFormPago->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		foreach (TipoDocumentoType::$NameArray as $intId => $strValue) {
			$this->lstFormPago->AddItem($strValue, $intId);
		}
		$this->lstFormPago->AddAction(new QChangeEvent(), new QAjaxAction('lstFormPago_Change'));
	}

	protected function txtNumeDocu_Create() {
		$this->txtNumeDocu = new QTextBox($this);
		$this->txtNumeDocu->Name = QApplication::Translate('Número de Documento');
		$this->txtNumeDocu->Width = 180;
		$this->txtNumeDocu->MaxLength = 20;
		$this->txtNumeDocu->Required = true;
		$this->txtNumeDocu->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeDocu_Blur'));
	}

	protected function calFechPago_Create() {
		$this->calFechPago = new QCalendar($this);
		$this->calFechPago->Name = QApplication::Translate('Fecha de Pago');
		$this->calFechPago->Width = 100;
		$this->calFechPago->DateTime = new QDateTime(QDateTime::Now);
	}

	protected function txtNumeSeri_Create() {
		$this->txtNumeSeri = new QTextBox($this);
		$this->txtNumeSeri->Name = QApplication::Translate('Números de Guía');
		$this->txtNumeSeri->Required = true;
		$this->txtNumeSeri->TextMode = QTextMode::MultiLine;
		$this->txtNumeSeri->Height = 220;
		$this->txtNumeSeri->Width = 180;
	}

	protected function chkPagoProc_Create() {
		$this->chkPagoProc = new QCheckBox($this);
		$this->chkPagoProc->Name = QApplication::Translate('Marcar Pago Procesado ?');
	}

	protected function dlgMensUsua_Create() {
		$this->dlgMensUsua = new QDialogBox($this);
		$this->dlgMensUsua->Width = '600px';
		$this->dlgMensUsua->Height = '500px';
		$this->dlgMensUsua->Overflow = QOverflow::Auto;
		$this->dlgMensUsua->Padding = '10px';
		$this->dlgMensUsua->FontSize = '24px';
		$this->dlgMensUsua->FontNames = QFontFamily::Georgia;
		$this->dlgMensUsua->BackColor = '#eeffdd';
		$this->dlgMensUsua->Display = false;
		$this->dlgMensUsua->ForeColor = 'blue';
	}

	protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-cogs fa-lg"></i> Procesar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	protected function txtNumeDocu_Blur() {
		if (strlen($this->txtNumeDocu->Text) > 0) {
			$this->txtNumeDocu->Text = strtoupper($this->txtNumeDocu->Text);
			//-----------------------------------------------------
			// Se valida la existencia previa del mismo documento
			//-----------------------------------------------------
			$objClausula   = QQ::Clause();
			$objClausula[] = QQ::Equal(QQN::CobroCod()->NumeroDocumento,$this->txtNumeDocu->Text);
			$arrPagoAnte   = CobroCod::QueryArray(QQ::AndCondition($objClausula));
			$decAcumMont   = 0;
			$strRelaGuia   = "<center><font size='2'>";
			$strRelaGuia  .= "<table>";
			$strRelaGuia  .= "<th align='center'><font size='2'><i>Guia</i></font></th><th align='right'><font size='2'><i>Monto</i></font></th>";
			foreach ($arrPagoAnte as $objCobroCod) {
				$strRelaGuia .= "<tr>";
				$strRelaGuia .= "<td width='120' align='center'><font size='2'><i>".$objCobroCod->NumeGuia."</i></font></td>";
				$strRelaGuia .= "<td align='right'><font size='2'><i>".nf($objCobroCod->MontoCancelado)."</i></font></td>";
				$strRelaGuia .= "</tr>";
				$decAcumMont += $objCobroCod->MontoCancelado;
			}
			$strRelaGuia .= "<tr>";
			$strRelaGuia .= "<td align='center'><font size='2'><i>Total Cancelado</i></font></td>";
			$strRelaGuia .= "<td align='right'><font size='2'><i>".nf($decAcumMont)."</i></font></td>";
			$strRelaGuia .= "</tr>";
			$strRelaGuia .= "</table>";
			$strRelaGuia .= "</font></center>";
			if ($decAcumMont > 0) {
				$objCobrCodx = $arrPagoAnte[0];

				$this->dlgMensUsua->Text =
				'<i>El Nro de Documento proporcionado, ya esta registrado en la base de datos<br><br>'.
				'Persona que recibio el Pago:'.$objCobroCod->RecibioElPago.'<br>'.
				'Tipo de Documento:'.TipoDocumentoType::ToString($objCobroCod->TipoDocumento).'<br>'.
				'Nro del Documento:'.$objCobroCod->NumeroDocumento.'<br>'.
				'Fecha del Pago:'.$objCobroCod->FechaPago->__toString("DD/MM/YYYY").'<br><br>'.
				'Relacion de Envios Cancelados<br>'.$strRelaGuia."<br><br>".
				'(Haga click fuera del recuadro blanco para ocultar este mensaje)<br/><br>'.
				$this->dlgMensUsua->ShowDialogBox();
			}
		}
	}

	protected function lstFormPago_Change() {
		if ($this->lstFormPago->SelectedName == 'EFECTIVO') {
			$this->txtNumeDocu->Enabled = false;
			$this->txtNumeDocu->Required = false;
			$this->txtNumeDocu->Name = QApplication::Translate('NO REQUIERE NÚMERO DE DOCUMENTO');
		} else {
			$this->txtNumeDocu->Enabled = true;
			$this->txtNumeDocu->Required = true;
			$this->txtNumeDocu->Name = QApplication::Translate('NÚMERO DE '.$this->lstFormPago->SelectedName);
			$this->txtNumeDocu->SetFocus();
		}
	}

	protected function btnSave_Click() {
		$this->objDataBase = QApplication::$Database[1];
		$this->objUsuario = unserialize($_SESSION['User']);

		$arrGuiaOkey = explode(',',nl2br2($this->txtNumeSeri->Text));
		$intCantGuia = count($arrGuiaOkey);
		$this->txtNumeSeri->Text = '';

		$blnTodoOkey = true;
		$objCheckpoint = SdeCheckpoint::Load('PP');
		if (!$objCheckpoint && $this->chkPagoProc->Checked) {
			$this->lblMensUsua->Text = QApplication::Translate('No se ha definido el Checkpoint "Pago Procesado"');
			$this->lblMensUsua->ForeColor = 'yellow';
			$blnTodoOkey = false;
		}

		if ($blnTodoOkey) {
			$intContGuia = 0;
			$intContErro = 0;
			$intContCkpt = 0;
			foreach ($arrGuiaOkey as $strNumeGuia) {
				$strNumeGuia = DejarSoloLosNumeros($strNumeGuia);
				if (strlen($strNumeGuia) > 0) {
					$objGuia = Guia::Load($strNumeGuia);
					if ($objGuia) {
						$objCobroCod = CobroCod::Load($strNumeGuia);
						if (!$objCobroCod) {
							$objCobroCod = new CobroCod();
						}
						$objCobroCod->NumeGuia = $strNumeGuia;
						$objCobroCod->MontoCancelado = $objGuia->MontoTotal;
						$objCobroCod->RecibioElPago = $this->txtNombPers->Text;
						$objCobroCod->TipoDocumento = $this->lstFormPago->SelectedValue;
						$objCobroCod->NumeroDocumento = $this->txtNumeDocu->Text;
						$objCobroCod->FechaPago = $this->calFechPago->DateTime;
						$objCobroCod->Save();
						$intContGuia++;
						//-------------------------------------------------------------------------------
						// Si el Usuario solicita marcar la Guia con "Pago Procesado", aqui se procede
						// a realizar esta accion
						//-------------------------------------------------------------------------------
						if ($this->chkPagoProc->Checked) {
							$blnTodoOkey = true;
							if ($objGuia->CodiCkpt == 'OK') {
								$this->txtNumeSeri->Text .= $strNumeGuia." (La Guía ya cerró su ciclo, no admite mas incidencias)".chr(13);
								$blnTodoOkey = false;
							}
							if ($blnTodoOkey) {
								//-------------------------------------------------------------
								// La modalidad de Pago de la Guia debe ser cambiada a PPD
								//-------------------------------------------------------------
								$objGuia->TipoGuia = TipoGuiaType::PPDPREPAGADA;
								$objGuia->Save();
								//----------------------------------------------------------------------------------------
								// En el Registro de Trabajo, debe quedar constancia del cambio ocurrido a la Guia
								//----------------------------------------------------------------------------------------
								$arrParaRegi['CodiCkpt'] = 'MG';
								$arrParaRegi['TextMens'] = "Se cambio la M.Pago a: ".TipoGuiaType::ToStringCorto($objGuia->TipoGuia)." por Pago Procesado";
								$arrParaRegi['NumeGuia'] = $objGuia->NumeGuia;
								$arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
								$arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
								CrearRegistroDeTrabajo($arrParaRegi);
								//---------------------------------------------
								// Se graba el checkpoint correspondiente
								//---------------------------------------------
								$arrDatoCkpt = array();
								$arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
								$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
								$arrDatoCkpt['TextObse'] = $objCheckpoint->DescCkpt;
								$arrDatoCkpt['CodiRuta'] = '';
								$arrResuGrab = GrabarCheckpoint($arrDatoCkpt);
								if ($arrResuGrab['TodoOkey']) {
									$intContCkpt ++;
								} else {
									$this->txtNumeSeri->Text .= $strNumeGuia." (No se pudo grabar el checkpoint)".chr(13);
									$intContErro++;
								}
							}
						}
					} else {
						$this->txtNumeSeri->Text .= $strNumeGuia." (Esta Guía No Existe)".chr(13);
						$intContErro++;
					}
				}
				if ($intContErro == 0) {
					$strMensUsua = sprintf('El Proceso culminó Exitosamente. Guías Procesadas (%s)',$intContGuia);
					$this->lblMensUsua->Text = $strMensUsua;
					$this->lblMensUsua->ForeColor = 'white';
				} else {
					$strMensUsua = sprintf('Hubo Errores en la Transacción. Guías Procesadas (%s), Guías con Error (%s)',$intContGuia,$intContErro);
					$this->lblMensUsua->Text = $strMensUsua;
					$this->lblMensUsua->ForeColor = 'yellow';
				}
			}
		}
	}
}

RebajaMasivaCod::Run('RebajaMasivaCod');
?>