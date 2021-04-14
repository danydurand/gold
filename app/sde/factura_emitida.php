<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class FacturaEmitida extends FormularioBaseKaizen {
	
	protected $objDataBase;
	protected $strCadeSqlx;
	
	protected $lstListCkpt;  // ListBox de checkpoints
	protected $txtNumeSeri;
	protected $intContRegi;
	protected $rdbTipoFact;

	protected $arrGuiaProc;
	protected $arrNumeCont;

	protected function Form_Create() {
		parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Factura Emitida');

		$this->txtNumeSeri_Create();
		$this->rdbTipoFact_Create();

		$this->intContRegi = 0;
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function txtNumeSeri_Create() {
		$this->txtNumeSeri = new QTextBox($this);
		$this->txtNumeSeri->Name = QApplication::Translate('Números de Guía');
		$this->txtNumeSeri->Required = true;
		$this->txtNumeSeri->TextMode = QTextMode::MultiLine;
		$this->txtNumeSeri->Height = 280;
		$this->txtNumeSeri->Width = 200;
	}

	protected function rdbTipoFact_Create() {
		$this->rdbTipoFact = new QRadioButtonList($this);
		$this->rdbTipoFact->Name = QApplication::Translate('Tipo de Factura');
		$this->rdbTipoFact->RepeatColumns = 2;
		$this->rdbTipoFact->Required = true;
		$objClausula   = QQ::Clause();
		$objClausula[] = QQ::In(QQN::SdeCheckpoint()->CodiCkpt,array('FE','FK'));
		$arrCodiCkpt   = SdeCheckpoint::QueryArray(QQ::AndCondition($objClausula));
		foreach ($arrCodiCkpt as $objCheckpoint) {
			$this->rdbTipoFact->AddItem('&nbsp;'.$objCheckpoint->DescCkpt.'&nbsp;&nbsp;',$objCheckpoint->CodiCkpt);
		}
		$this->rdbTipoFact->HtmlEntities = false;
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	protected function btnSave_Click() {
		$this->objDataBase = QApplication::$Database[1];
		$this->objUsuario = unserialize($_SESSION['User']);
		
		$arrGuiaOkey = explode(',',nl2br2($this->txtNumeSeri->Text));
		//-------------------------------------------------------------------------------------
		// Con la funcion DejarSoloLosNumeros1 se eliminan los caracteres espciales y letras
		//-------------------------------------------------------------------------------------
		array_walk($arrGuiaOkey,'DejarSoloLosNumeros1');
		//---------------------------------------------------------------------------
		// Con array_unique se eliminan las guias repetidas en caso de que las haya
		//---------------------------------------------------------------------------
		$arrGuiaOkey = array_unique($arrGuiaOkey,SORT_STRING);

		$this->txtNumeSeri->Text = '';

		$blnTodoOkey = true;
		$objCheckpoint = SdeCheckpoint::Load($this->rdbTipoFact->SelectedValue);
		if (!$objCheckpoint) {
			$this->lblMensUsua->Text = QApplication::Translate('No se ha definido el Checkpoint');
			$this->lblMensUsua->ForeColor = 'yellow';
			$blnTodoOkey = false;
		}
		if ($blnTodoOkey) {
			$intContGuia = 0;
			$intContCkpt = 0;
			foreach ($arrGuiaOkey as $strNumeSeri) {
				if (strlen($strNumeSeri)) {
					$blnTodoOkey = true;
					//-----------------------------------------------------------------------
					// Se procesa una a una las Guias proporcionadas por el Usuario
					//-----------------------------------------------------------------------
					$objGuia = Guia::Load($strNumeSeri);
					if (!$objGuia) {
						$this->txtNumeSeri->Text .= $strNumeSeri." (No Existe Guia)".chr(13);
						$blnTodoOkey = false;
					} else {
						if ($objGuia->CodiCkpt == 'OK') {
							$this->txtNumeSeri->Text .= $strNumeSeri." (La Guia ya cerro su ciclo, no admite mas incidencias)".chr(13);
							$blnTodoOkey = false;
						}
					}
					if ($blnTodoOkey) {
						//-------------------------------------------------------------
						// La Guia debe marcarse como Facturada
						//-------------------------------------------------------------
						//                  $objGuia->TransFac = 1;
						//                  $objGuia->Save();
						$intContGuia ++;
						//---------------------------------------------
						// Se graba el checkpoint correspondiente
						//---------------------------------------------
						$arrDatoCkpt = array();
						$arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
						$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
						$arrDatoCkpt['TextObse'] = $objCheckpoint->DescCkpt;
						$arrDatoCkpt['CodiRuta'] = ''; //$strCodiRuta;
						$arrResuGrab = GrabarCheckpoint($arrDatoCkpt);
						if ($arrResuGrab['TodoOkey']) {
							$intContCkpt ++;
						} else {
							$blnTodoOkey = false;
						}
						//-------------------------------------------------------------------
						// En el registro de Trabajo, se deja constancia del Pago Procesado
						//-------------------------------------------------------------------
						//						$arrParaRegi['CodiCkpt'] = $objCheckpoint->CodiCkpt;
						//						$arrParaRegi['TextMens'] = QApplication::Translate('Factura Emitida');
						//						$arrParaRegi['NumeGuia'] = $objGuia->NumeGuia;
						//						$arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
						//						$arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
						//						CrearRegistroDeTrabajo($arrParaRegi);
						//						$intContCkpt ++;
					}
				}
			}
			if ($blnTodoOkey && ($intContGuia == $intContCkpt)) {
				$strMensUsua = sprintf('El Proceso culmino Exitosamente. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
				$this->lblMensUsua->Text = $strMensUsua;
				$this->lblMensUsua->ForeColor = 'white';
			} else {
				$strMensUsua = sprintf('Hubo Errores en la Transaccion. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
				$this->lblMensUsua->Text = $strMensUsua;
				$this->lblMensUsua->ForeColor = 'yellow';
			}
		}
	}
}

FacturaEmitida::Run('FacturaEmitida');
?>