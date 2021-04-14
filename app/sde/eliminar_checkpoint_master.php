<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class EliminarCheckpointMaster extends FormularioBaseKaizen {
	protected $blnTienPerm;
	protected $txtBuscMani;
	protected $lstManiCkpt;
	protected $lstChecMani;

	protected function Form_Create() {
	   	parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Eliminar Checkpoint Master');
		$this->blnTienPerm = BuscarParametro("ElimCkma", $this->objUsuario->LogiUsua, "Val1", 0);

		$this->txtBuscMani_Create();
		$this->lstManiCkpt_Create();
		$this->lstChecMani_Create();
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function txtBuscMani_Create() {
		$this->txtBuscMani = new QTextBox($this);
		$this->txtBuscMani->Name = QApplication::Translate('Buscar por Siglas del Manifiesto');
		$this->txtBuscMani->Width = 200;
		$this->txtBuscMani->Required = true;
		$this->txtBuscMani->AddAction(new QBlurEvent(), new QAjaxAction('txtBuscMani_Blur'));
	}

	protected function lstManiCkpt_Create() {
		$this->lstManiCkpt = new QListBox($this);
		$this->lstManiCkpt->Name = "Seleccione el Manifiesto para ver sus Checkpoints";
		$this->lstManiCkpt->Width = 200;
		$this->lstManiCkpt->Required = true;
		$this->lstManiCkpt->AddAction(new QChangeEvent(), new QAjaxAction('lstManiCkpt_Change'));
	}

	protected function lstChecMani_Create(){
		$this->lstChecMani = new QListBox($this);
		$this->lstChecMani->Name = QApplication::Translate('Lista de Checkpoints');
		$this->lstChecMani->SelectionMode = QSelectionMode::Multiple;
		$this->lstChecMani->Rows = 10;
		$this->lstChecMani->Required = true;
		$this->lstChecMani->Width = 300;
	}

	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = '<i class="fa fa-cogs fa-lg"></i> Eliminar';
		$this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
		$this->btnSave->CssClass = 'btn btn-success btn-sm';
		$this->btnSave->PrimaryButton = true;
		$this->btnSave->CausesValidation = true;
		if ($this->blnTienPerm) {
			$this->btnSave->Visible = true;
		} else {
			$this->btnSave->Visible = false;
		}
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	protected function txtBuscMani_Blur() {
		if (strlen($this->txtBuscMani->Text) > 0) {
			$this->lstManiCkpt->RemoveAllItems();
			$objClausula   = QQ::Clause();
			$objClausula[] = QQ::Like(QQN::SdeContenedor()->NumeCont,$this->txtBuscMani->Text."%");
			$objClauOrde   = QQ::Clause();
			$objClauOrde[] = QQ::OrderBy(QQN::SdeContenedor()->Fecha,False);
			$objClauOrde[] = QQ::OrderBy(QQN::SdeContenedor()->NumeCont);
			//-------------------------------------------------------------------------------------
			// Se muestran los Manifiestos coincidentes ordenados en forma decreciente por Fecha
			// y luego ordenados por las siglas de Manifiesto como tal
			//-------------------------------------------------------------------------------------
			$arrManiDesc = SdeContenedor::QueryArray(QQ::AndCondition($objClausula), $objClauOrde);
			$intCantMani = count($arrManiDesc);
			if ($arrManiDesc) {
				$this->lstManiCkpt->AddItem("- Seleccione Uno - ($intCantMani)",null);
				foreach ($arrManiDesc as $objManifiesto) {
					$intCantGuia = $objManifiesto->CountGuias();
					if ($intCantGuia > 0) {
						$this->lstManiCkpt->AddItem($objManifiesto->__toString()." (".$intCantGuia.")", $objManifiesto->NumeCont);
					}
				}
			} else {
				$this->txtBuscMani->Warning = "No hay Manifiestos coincidentes";
			}
		}
	}

	protected function lstManiCkpt_Change() {
		if (!is_null($this->lstManiCkpt->SelectedValue)) {
			$this->lstChecMani->RemoveAllItems();
			$this->lstChecMani->Width = 500;
			$objCondicion   = QQ::Clause();
			$objCondicion[] = QQ::Equal(QQN::ContenedorCkpt()->Valija, $this->lstManiCkpt->SelectedValue);
			$arrCkptMast    = ContenedorCkpt::QueryArray(QQ::AndCondition($objCondicion), QQ::Clause(QQ::OrderBy(QQN::ContenedorCkpt()->Fecha,false))); 
			foreach ($arrCkptMast as $objCkptMani) {
				$strPartVisi = substr($objCkptMani->Observacion,0,50);
				$this->lstChecMani->AddItem($strPartVisi, $objCkptMani);
			}
		}
	}

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$arrCkptMani = $this->lstChecMani->SelectedValues;
		$objDatabase = Guia::GetDatabase();
		$intContElem = count($arrCkptMani);

		foreach ($arrCkptMani as $objCkptMani) {
			//--------------------------------------------------------------------
			// Se elimina el checkpoint indicado de todas las guías de la master
			//--------------------------------------------------------------------
			$strCadeSqlx = 'delete 
			               from guia_ckpt
			              where codi_ckpt = "'.$objCkptMani->Checkpoint.'"
			                and fech_ckpt = "'.$objCkptMani->Fecha->__toString("YYYY-MM-DD").'
			                and nume_guia in (select nume_guia
			                                    from sde_contenedor_guia_assn
			                                   where nume_cont = "'.$objCkptMani->Valija.'") ';
			$objDatabase->NonQuery($strCadeSqlx);
			//------------------------------------------------------------------
			// Se elimina el checkpoint indicado en la tabla "contenedor_ckpt"
			//------------------------------------------------------------------
			$objCkptMani->Delete();
			//------------------------------------------
			// Se identifican las Guías del Manifiesto
			//------------------------------------------
			//----------------------------------------------------
			// En el Registro de Trabajo, debe quedar constancia
			// de los cambios ocurridos a la(s) Guía(s).
			//----------------------------------------------------
			$arrGuiaMani = 1;
			$strRegiTrab = $strNumeGuia.' | '.$strCodiEsta.' | '.$strCodiCkpt.' | '.$strFechCkpt.' | '.$strHoraCkpt.' | '.$strTextObse.' | '.$strCodiRuta.' | '.$strCodiUsua;
			$arrParaRegi['CodiCkpt'] = 'EC';
			$arrParaRegi['TextMens'] = 'ELIMINO CHECKPOINT: '.$strRegiTrab;
			$arrParaRegi['NumeGuia'] = $strNumeMast;
			$arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
			$arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
			CrearRegistroDeTrabajo($arrParaRegi);
		}
		$this->txtBuscMani_Blur();
	}

	protected function GuiasDelManifiesto($strManiDesc) {
		//-------------------------------------------------
		// Se Arma un Vector con las Guías del Manifiesto 
		//-------------------------------------------------
		$strCadeSqlx = "select nume_guia 
		                from sde_contenedor_guia_assn 
		               where nume_cont = '$strManiDesc'";
		$objDatabase = SdeContenedor::GetDatabase();
		$objResulSet = $objDatabase->Query($strCadeSqlx);
		$arrGuiaMani = array();
		while ($mixRegistro = $objResulSet->FetchArray()) {
			$arrGuiaMani[] = $mixRegistro['nume_guia'];
		}
		return $arrGuiaMani;
	}
}

EliminarCheckpointMaster::Run('EliminarCheckpointMaster','eliminar_checkpoint_master.tpl.php');
?>