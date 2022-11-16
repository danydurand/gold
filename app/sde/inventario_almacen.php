<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class InventarioAlmacen extends FormularioBaseKaizen {
	protected $txtUbicAlma;  // Ubicación dentro del Almacén
	protected $strCadeSqlx;
	protected $objDataBase;
	protected $txtNumeSeri;
	protected $lstIdenAlma;
	protected $intContRegi;
	protected $lstElimPodx;

	protected function Form_Create() {
		parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Inventario de Almacén');

		//$this->lstIdenAlma_Create();
		$this->txtUbicAlma_Create();
		$this->lstElimPodx_Create();
		$this->txtNumeSeri_Create();

		$this->intContRegi = 0;
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function lstIdenAlma_Create() {
		$this->lstIdenAlma = new QListBox($this);
		$this->lstIdenAlma->Name = QApplication::Translate('Almacén');
		$this->lstIdenAlma->Width = 180;
		$this->lstIdenAlma->Required = true;
		$this->lstIdenAlma->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$objClausula   = QQ::Clause();
		$objClausula[] = QQ::Equal(QQN::Parametro()->IndiPara,'Almacen');
		$objClausula[] = QQ::Equal(QQN::Parametro()->ParaTxt5,$this->objUsuario->SucursalId);
		$arrListAlma   = Parametro::QueryArray(QQ::AndCondition($objClausula));
		foreach ($arrListAlma as $objAlmacen) {
			$this->lstIdenAlma->AddItem($objAlmacen->DescPara,$objAlmacen->ParaTxt3);
		}
	}

	protected function txtUbicAlma_Create() {
		$this->txtUbicAlma = new QTextBox($this);
		$this->txtUbicAlma->Name = QApplication::Translate('Ubicación dentro del Almacén');
		$this->txtUbicAlma->Width = 180;
		$this->txtUbicAlma->MaxLength = 20;
		$this->txtUbicAlma->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
		$this->txtUbicAlma->Required = true;
	}

	protected function lstElimPodx_Create() {
		$this->lstElimPodx = new QListBox($this);
		$this->lstElimPodx->Name = QApplication::Translate('Si la Guía tiene POD, desea eliminarlo ?');
		$this->lstElimPodx->Width = 180;
		$this->lstElimPodx->Required = true;
		$this->lstElimPodx->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$this->lstElimPodx->AddItem("SI","S");
		$this->lstElimPodx->AddItem("NO","N");
	}

	protected function txtNumeSeri_Create() {
		$this->txtNumeSeri = new QTextBox($this);
		$this->txtNumeSeri->Name = QApplication::Translate('Números de Guía');
		$this->txtNumeSeri->Required = true;
		$this->txtNumeSeri->TextMode = QTextMode::MultiLine;
		$this->txtNumeSeri->Height = 200;
		$this->txtNumeSeri->Width = 300;
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	protected function btnSave_Click() {
		$objDataBase = QApplication::$Database[1];

		$arrGuiaOkey = explode(',',nl2br2($this->txtNumeSeri->Text));
        $arrGuiaOkey = LimpiarArreglo($arrGuiaOkey,false);
        $arrGuiaOkey = array_map('transformar',$arrGuiaOkey);

        $this->txtNumeSeri->Text = '';

		$objCheckpoint = Checkpoints::LoadByCodigo('IA');
		if (!$objCheckpoint) {
            $this->danger('No se ha definido el Checkpoint "Inventario de Almacen"');
			return;
		}
		$intContGuia = 0;
		$intContCkpt = 0;
		$objCkptModi = Checkpoints::LoadByCodigo('MG');
		$objUsuario  = unserialize($_SESSION['User']);

		foreach ($arrGuiaOkey as $strNumeSeri) {
			//-----------------------------------------------------------------
			// Se procesa una a una las piezas proporcionadas por el Usuario
			//-----------------------------------------------------------------
			$intContGuia++;
			$objGuiaPiez = GuiaPiezas::LoadByIdPieza($strNumeSeri);
			if (!$objGuiaPiez) {
				$this->txtNumeSeri->Text .= $strNumeSeri." (Esta Pieza No Existe)".chr(13);
				continue;
			} else {
				if ($objGuiaPiez->LastCkptCode == 'OK') {
					if ($this->lstElimPodx->SelectedValue == 'S') {
						if (!is_null($objGuiaPiez->Guia->GuiaPodId)) {
							$objGuiaPiez->Guia->GuiaPod->Delete();
						}
						//----------------------------------------------------------------------------
						// Este movimiento debe quedar grabado en el Registro de Trabajo de la Guia
						//----------------------------------------------------------------------------
						if ($objCkptModi && $objUsuario) {
							$arrParaRegi['NumeGuia'] = $objGuiaPiez->GuiaId;
							$arrParaRegi['CodiCkpt'] = $objCkptModi->Id;
							$arrParaRegi['TextMens'] = 'Se elimino POD de la Guia por Inventario de Almacen';
							$arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
							$arrParaRegi['CodiEsta'] = $this->objUsuario->SucursalId;
							CrearRegistroDeTrabajo($arrParaRegi);
						}
					}
				}
			}
			//-------------------------------------------------------------
			// La Ubicacion Fisica de la Pieza debe actualizarse
			//-------------------------------------------------------------
			$objGuiaPiez->Ubicacion = $this->txtUbicAlma->Text;
			if (is_null($objGuiaPiez->FirstInventory)) {
				$objGuiaPiez->FirstInventory = new QDateTime(QDateTime::Now());
			}
			$objGuiaPiez->Save();
			//---------------------------------------------
			// Se graba el checkpoint correspondiente
			//---------------------------------------------
			$arrDatoCkpt = array();
			$arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
			$arrDatoCkpt['GuiaAnul'] = false; //$objGuiaPiez->Guia->Anulada();
			$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
			$arrDatoCkpt['TextCkpt'] = $objCheckpoint->Descripcion." (".$this->txtUbicAlma->Text.")";
			$arrDatoCkpt['CodiRuta'] = '';
			$arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
			$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
			if ($arrResuGrab['TodoOkey']) {
				$intContCkpt ++;
			} else {
				$this->txtNumeSeri->Text .= $strNumeSeri." ".$arrResuGrab['MotiNook'].chr(13);
				continue;
			}
		}
		//------------------------------------------
		// Updating last checkpoint on every piece
		//------------------------------------------
		$strStorProc = "call sp_update_last_checkpoint()";
		$objDataBase->NonQuery($strStorProc);

		if ($intContGuia == $intContCkpt) {
			$strMensUsua = "El Proceso culmino Exitosamente. Piezas procesadas ($intContGuia) | Checkpoints ($intContCkpt)";
			$this->success($strMensUsua);
		} else {
			$strMensUsua = "Hubo Errores en la Transaccion. Guias procesadas ($intContGuia) | Checkpoints ($intContCkpt)";
			$this->danger($strMensUsua);
		}
	}

}

InventarioAlmacen::Run('InventarioAlmacen');
?>