<?php
//-----------------------------------------------------------------------------
// Programa      : resetear_clave.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 10/04/2016
// Descripcion   : Este programa, permite "re-setear" la clave de acceso al
//                 Sistema para cada uno de los Usuarios, cuyos logines sean
//                 proporcionados.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ResetearClave extends FormularioBaseKaizen {
	protected $txtLogiUsua;
	protected $txtNuevClav;

	protected $btnSave;
	protected $btnCancel;

	protected function Form_Create() {

        parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Re-setear Clave de Acceso');

		$this->txtLogiUsua_Create();
		$this->txtNuevClav_Create();

		$this->btnSave_Create();
		$this->btnCancel_Create();

	}

	//-------------------------------
	// Aqui se crean los objetos
	//-------------------------------

	protected function txtLogiUsua_Create() {
		$this->txtLogiUsua = new QTextBox($this);
		$this->txtLogiUsua->Name = QApplication::Translate('Login(es)');
		$this->txtLogiUsua->TextMode = QTextMode::MultiLine;
		$this->txtLogiUsua->Rows = 10;
		$this->txtLogiUsua->Required = true;
		$this->txtLogiUsua->Width = 150;
	}

	protected function txtNuevClav_Create() {
		$this->txtNuevClav = new QTextBox($this);
		$this->txtNuevClav->Name = QApplication::Translate('Nueva Clave de Acceso');
		$this->txtNuevClav->Required = true;
		$this->txtNuevClav->TextMode = QTextMode::Password;
		$this->txtNuevClav->Width = 150;
	}

	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-floppy-o fa-lg"></i> Guardar';
		$this->btnSave->CssClass = 'btn btn-success';
		$this->btnSave->HtmlEntities = false;
		$this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
		$this->btnSave->PrimaryButton = true;
		$this->btnSave->CausesValidation = true;
		//-------------------------------------------------------------------------
		// Unicamente se permite la ejecucion de esta opcion a ciertos usuarios
		//-------------------------------------------------------------------------
		$blnMostSave = BuscarParametro('ReseUsua',$this->objUsuario->LogiUsua,"Val1",0);
		$this->btnSave->Visible = $blnMostSave;
	}

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
        $this->btnCancel->CssClass = 'btn btn-warning';
        $this->btnCancel->HtmlEntities = false;
		$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
		$this->btnCancel->CausesValidation = false;
	}

	//------------------------------------
	// Acciones relativas a los objetos
	//------------------------------------

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$blnTodoOkey = true;
		$arrListLogi = explode(',',nl2br2($this->txtLogiUsua->Text));
		//-----------------------------------------------------------------------------
		// Con array_unique se eliminan los logines repetidos en caso de que los haya
		//-----------------------------------------------------------------------------
		$arrListLogi = array_unique($arrListLogi,SORT_STRING);
		$this->txtLogiUsua->Text = '';
		//--------------------------------------------------------
		// Se procesan uno a uno los logines proporcionados
		//--------------------------------------------------------
		$intCantRegi = 0;
		$intUsuaProc = 0;
		foreach ($arrListLogi as $strLogiUsua) {
			if (!in_array($strLogiUsua,array('cliente','liberty'))) {
				$objUsuario = Usuario::LoadByLogiUsua($strLogiUsua);
				if ($objUsuario) {
					//-----------------------------------------------------------------------------------
					// Solo algunos usuarios podran resetear las claves de cualquier otro usuarios
					// independientemente de la Sucursal, de resto, solo podrá resetear la clave de
					// usuarios que pertenezcan a su Sucursal
					//-----------------------------------------------------------------------------------
					if ($objUsuario->CodiEsta != $this->objUsuario->CodiEsta) {
						$blnOtraSucu = buscarParametro("ReseClav",$this->objUsuario->LogiUsua,"Val1",0);
						if ($blnOtraSucu) {
							$this->resetearUsuario($objUsuario);
							$intUsuaProc++;
						} else {
							$this->txtLogiUsua->Text = $strLogiUsua." (PERTENECE A OTRA SUCURSAL)".chr(13);
						}
					} else {
						$this->resetearUsuario($objUsuario);
						$intUsuaProc++;
					}
				} else {
					$this->txtLogiUsua->Text = $strLogiUsua." (NO EXISTE)".chr(13);
				}
				$intCantRegi++;
			} else {
				AuditoriaDeProcesos("Intento Resetear al Usuario: ".$strLogiUsua);
				$this->txtLogiUsua->Text = $strLogiUsua." (NO ADMITE RESETEO DE CLAVE)".chr(13);
			}
		}
        $this->txtNuevClav->Text = '';
		$strTextMens = '<i class="fa fa-check fa-lg"></i> Registros procesados: '.$intUsuaProc."/".$intCantRegi;
		$this->mensaje($strTextMens);
	}

	protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__PMN__."/".$objUltiAcce->__toString());
	}

	protected function resetearUsuario($objUsuario) {
		AuditoriaDeProcesos("Reseteando Usuario: ".$objUsuario->LogiUsua);
		$objUsuario->PassUsua = md5($this->txtNuevClav->Text);
		$objUsuario->FechClav = new QDateTime("2010-01-01");
		$objUsuario->CantInte = 0;
		$objUsuario->CodiStat = 1;
		$objUsuario->MotiBloq = '';
		$objUsuario->Save();
	}

}
ResetearClave::Run('ResetearClave');
?>
