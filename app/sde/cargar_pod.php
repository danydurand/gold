<?php
//-------------------------------------------------
// Programa       : cargar_pod.php
// Realizado por  : Daniel Durand
// Fecha Elab.    : 21/11/2017
//-------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargarPod extends FormularioBaseKaizen {
    // protected $lblTituForm;
    // protected $lblMensUsua;
	protected $btnNuevGuia;
	protected $btnProxRegi;
	protected $btnRegiAnte;
	protected $arrGuiaCons;
	protected $intIndiGuia;
	protected $intCantRegi;
	protected $lblContRegi;
	protected $txtOtraGuia;
	protected $btnOtraGuia;
	protected $chkVariGuia;
	protected $txtVariGuia;

	protected $objGuia;
	protected $txtNumeGuia;
	protected $txtFechGuia;
	protected $txtNombRemi;
	protected $txtNombDest;
	protected $chkEntrEfec;
	protected $txtEntrAqui;
	protected $calFechEntr;
	protected $txtHoraEntr;
	protected $txtNombClie;
	protected $lstListCkpt;
	protected $txtObseCkpt;
	protected $objUsuario;
	protected $dlgMensUsua;

	// protected $btnSave;
	// protected $btnCancel;
	protected $btnEliminar;

	protected function Form_Create() {
        parent::Form_Create();

		$this->objGuia = Guia::Load($_REQUEST['strNumeGuia']);
		$this->objUsuario = unserialize($_SESSION['User']);
		$this->arrGuiaCons = unserialize($_SESSION['Dato']);
		//-----------------------------------------------------
		// Se determina la posicion de la guia en el Vector
		//-----------------------------------------------------
		$this->intIndiGuia = 0;
		$this->intCantRegi = count($this->arrGuiaCons);
		$blnContCicl = true;
		while (($this->intIndiGuia < $this->intCantRegi) && $blnContCicl) {
			if ($this->arrGuiaCons[$this->intIndiGuia][0] != $this->objGuia->NumeGuia) {
				$this->intIndiGuia ++;
			} else {
				$blnContCicl = false;
			}
		}

		$this->lblContRegi = new QLabel($this);
		$this->lblContRegi->Text = "(".($this->intIndiGuia+1)."/".$this->intCantRegi.")";

		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';

		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = QApplication::Translate('Cargar POD/Incidencia');

		$this->dlgMensUsua_Create();

		$this->txtNumeGuia_Create();
		$this->txtFechGuia_Create();
		$this->txtNombRemi_Create();
		$this->txtNombDest_Create();
		$this->chkEntrEfec_Create();
		$this->txtEntrAqui_Create();
		$this->calFechEntr_Create();
		$this->txtHoraEntr_Create();
		$this->lstListCkpt_Create();
		$this->txtObseCkpt_Create();
		$this->txtOtraGuia_Create();
		$this->btnOtraGuia_Create();
		$this->chkVariGuia_Create();
		$this->txtVariGuia_Create();

		$this->btnRegiAnte_Create();
		$this->btnProxRegi_Create();

		// $this->btnSave_Create();
		// $this->btnCancel_Create();
		$this->btnEliminar_Create();

		$this->btnCancel->Text = QApplication::Translate('Regresar');

		if (strlen($this->objGuia->GuiaRetorno) > 0) {
			$this->VerificarGestionDeGuiaRetorno();
		}

	}

	//---------------------------------------
	// Se crean los objetos del Formulario
	//---------------------------------------

	protected function txtNumeGuia_Create() {
		$this->txtNumeGuia = new QTextBox($this);
		$this->txtNumeGuia->Name = QApplication::Translate('Numero de Guia');
		$this->txtNumeGuia->Width = 80;
		$this->txtNumeGuia->Enabled = false;
		$this->txtNumeGuia->ForeColor = 'blue';
		$this->txtNumeGuia->Text = $this->objGuia->NumeGuia;
	}

	protected function txtFechGuia_Create() {
		$this->txtFechGuia = new QTextBox($this);
		$this->txtFechGuia->Name = QApplication::Translate('Fecha de la Guia');
		$this->txtFechGuia->Text = $this->objGuia->FechGuia->__toString("DD/MM/YYYY");
		$this->txtFechGuia->Enabled = false;
		$this->txtFechGuia->ForeColor = 'blue';
	}

	protected function txtNombRemi_Create() {
		$this->txtNombRemi = new QTextBox($this);
		$this->txtNombRemi->Name = QApplication::Translate('Nombre del Remitente');
		$this->txtNombRemi->Text = $this->objGuia->NombRemi;
		$this->txtNombRemi->Enabled = false;
		$this->txtNombRemi->ForeColor = 'blue';
	}

	protected function txtNombDest_Create() {
		$this->txtNombDest = new QTextBox($this);
		$this->txtNombDest->Name = QApplication::Translate('Nombre del Destinatario');
		$this->txtNombDest->Text = $this->objGuia->NombDest;
		$this->txtNombDest->Enabled = false;
		$this->txtNombDest->ForeColor = 'blue';
	}

	protected function chkEntrEfec_Create() {
		$this->chkEntrEfec = new QCheckBox($this);
		$this->chkEntrEfec->Name = QApplication::Translate('Entrega Efectiva ?');
		$this->chkEntrEfec->Checked = true;
		$this->chkEntrEfec->AddAction(new QChangeEvent(), new QAjaxAction('chkEntrEfec_Change'));
	}

	protected function txtEntrAqui_Create() {
		$this->txtEntrAqui = new QTextBox($this);
		$this->txtEntrAqui->Name = QApplication::Translate('Entregada A');
		$this->txtEntrAqui->Width = 200;
		$this->txtEntrAqui->Required = true;
		$this->txtEntrAqui->Text = $this->objGuia->EntregadoA;
		$this->txtEntrAqui->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
	}

	protected function calFechEntr_Create() {
		$this->calFechEntr = new QCalendar($this);
		$this->calFechEntr->Name = QApplication::Translate('Fecha Entrega');
		$this->calFechEntr->DateTime = $this->objGuia->FechaEntrega;
		$this->calFechEntr->CalendarType = QCalendarType::DateOnly;
		$this->calFechEntr->Required = true;
	}

	protected function txtHoraEntr_Create() {
		$this->txtHoraEntr = new QTextBox($this);
		$this->txtHoraEntr->Name = QApplication::Translate('Hora Entrega');
		$this->txtHoraEntr->Width = 40;
		$this->txtHoraEntr->Required = true;
		$this->txtHoraEntr->Text = $this->objGuia->HoraEntrega;
	}


	protected function lstListCkpt_Create() {
		$this->lstListCkpt = new QListBox($this);
		$this->lstListCkpt->Name = QApplication::Translate('Checkpoint/Incidencia');
		$this->lstListCkpt->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		foreach (SdeCheckpoint::LoadArrayByCodiStat(1) as $objCkpt) {
			if ($objCkpt->TextObse == 'SDE') {
				if (!in_array($objCkpt->CodiCkpt,array('OK','TR','AR','ER','PU','BG'))) {
					$this->lstListCkpt->AddItem($objCkpt->__toString(),$objCkpt->CodiCkpt);
				}
			}
		}
		$this->lstListCkpt->Required = true;
		$this->lstListCkpt->Visible = false;
	}

	protected function txtObseCkpt_Create() {
		$this->txtObseCkpt = new QTextBox($this);
		$this->txtObseCkpt->Name = QApplication::Translate('Observacion');
		$this->txtObseCkpt->Width = 300;
		$this->txtObseCkpt->Visible = false;
		$this->txtObseCkpt->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
	}

	protected function chkVariGuia_Create() {
		$this->chkVariGuia = new QCheckBox($this);
		$this->chkVariGuia->Name = QApplication::Translate('Desea registrar la misma transaccion para varias Guias ?');
		$this->chkVariGuia->AddAction(new QChangeEvent(), new QAjaxAction('chkVariGuia_Change'));
	}

	protected function txtVariGuia_Create() {
		$this->txtVariGuia = new QTextBox($this);
		$this->txtVariGuia->Name = QApplication::Translate('Especifique las Guias');
		$this->txtVariGuia->Width = 400;
		$this->txtVariGuia->Height = 100;
		$this->txtVariGuia->Required = true;
		$this->txtVariGuia->TextMode = QTextMode::MultiLine;
		$this->txtVariGuia->Visible = false;
	}

	// Setup btnRegiAnte
	protected function btnRegiAnte_Create() {
		$this->btnRegiAnte = new QButton($this);
		$this->btnRegiAnte->Text = QApplication::Translate('Anterior');
		$this->btnRegiAnte->AddAction(new QClickEvent(), new QAjaxAction('btnRegiAnte_Click'));
		if ($this->intIndiGuia == 0) {
			$this->BloquearBotonAnterior();
		} else {
			$this->btnRegiAnte->Enabled = true;
			$this->btnRegiAnte->ForeColor = 'white';
		}
	}

	// Setup btnProxRegi
	protected function btnProxRegi_Create() {
		$this->btnProxRegi = new QButton($this);
		$this->btnProxRegi->Text = QApplication::Translate('Proximo');
		$this->btnProxRegi->AddAction(new QClickEvent(), new QAjaxAction('btnProxRegi_Click'));
		if ($this->intIndiGuia == $this->intCantRegi - 1) {
			$this->BloquearBotonProximo();
		} else {
			$this->btnProxRegi->Enabled = true;
			$this->btnProxRegi->ForeColor = 'white';
		}
	}

	protected function btnOtraGuia_Create() {
		$this->btnOtraGuia = new QButton($this);
		$this->btnOtraGuia->Text = 'Otra Guia';
		$this->btnOtraGuia->Visible = false;
		$this->btnOtraGuia->AddAction(new QClickEvent(), new QAjaxAction('btnOtraGuia_Click'));
	}

	protected function txtOtraGuia_Create() {
		$this->txtOtraGuia = new QTextBox($this);
		$this->txtOtraGuia->Name = QApplication::Translate('Ingrese otra Guia para rebajar el POD');
		$this->txtOtraGuia->Width = 90;
		$this->txtOtraGuia->Visible = false;
	}

	// protected function btnSave_Create() {
	// 	$this->btnSave = new QButton($this);
	// 	$this->btnSave->Text = QApplication::Translate('Save');
	// 	$this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
	// 	$this->btnSave->PrimaryButton = true;
	// 	$this->btnSave->CausesValidation = true;
	// }

	// Setup btnCancel
	// protected function btnCancel_Create() {
	// 	$this->btnCancel = new QButton($this);
	// 	$this->btnCancel->Text = QApplication::Translate('Cancel');
	// 	$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
	// 	$this->btnCancel->CausesValidation = false;
	// }

	protected function btnEliminar_Create() {
		$this->btnEliminar = new QButton($this);
		$this->btnEliminar->Text = QApplication::Translate('Eliminar');
		$this->btnEliminar->AddAction(new QClickEvent(), new QServerAction('btnEliminar_Click'));
		$this->btnEliminar->CausesValidation = false;
		$blnElimPodx = BuscarParametro('ElimPodx',$this->objUsuario->LogiUsua,'Val1',0);
		if ($blnElimPodx) {
			if (strlen($this->txtHoraEntr->Text) > 0) {
				$this->btnEliminar->Visible = true;
			} else {
				$this->btnEliminar->Visible = false;
			}
		} else {
			$this->btnEliminar->Visible = false;
		}
	}

	protected function dlgMensUsua_Create() {
		$this->dlgMensUsua = new QDialogBox($this);
		$this->dlgMensUsua->Width = '500px';
		$this->dlgMensUsua->Height = '300px';
		$this->dlgMensUsua->Overflow = QOverflow::Auto;
		$this->dlgMensUsua->Padding = '10px';
		$this->dlgMensUsua->FontSize = '24px';
		$this->dlgMensUsua->FontNames = QFontFamily::Georgia;
		$this->dlgMensUsua->BackColor = '#eeffdd';
		$this->dlgMensUsua->Display = false;
		$this->dlgMensUsua->ForeColor = 'blue';
	}

	//---------------------------------------
	// Acciones asociadas a los Objetos
	//---------------------------------------

	protected function chkVariGuia_Change() {
		if ($this->chkVariGuia->Checked == true) {
			$this->txtVariGuia->Visible = true;
		} else {
			$this->txtVariGuia->Visible = false;
		}
	}

	protected function VerificarGestionDeGuiaRetorno() {
		if (!$this->objGuia->GuiaRetornoGestionada()) {
			$this->dlgMensUsua->Text  = "<center><i>La Guia: <font color='red'>".$this->objGuia->GuiaRetorno."</font> es la Guia Retorno de esta Guia ";
			$this->dlgMensUsua->Text .= "que Usted esta consultado.<br><br><u>Dicha Guia Retorno, debe ser gestionada y enviada al Origen</u><br><br>";
			$this->dlgMensUsua->Text .= "(Haga click fuera del recuadro para ocultar este mensaje)<br/><br></center>";
			$this->dlgMensUsua->ShowDialogBox();
		}
	}


	protected function btnEliminar_Click() {
		//--------------------------------------------------------
		// Se blanquean los cambpos relativos al POD
		//--------------------------------------------------------
		$this->objGuia->EntregadoA = '';
		$this->objGuia->FechaEntrega = null;
		$this->objGuia->HoraEntrega = '';
		$this->objGuia->FechaPod = null;
		$this->objGuia->HoraPod = '';
		$this->objGuia->UsuarioPod = null;
		$this->objGuia->Save();
		//------------------------------------------------------
		// Se elimina el checkpoint "OK" relacionado a la Guia
		//------------------------------------------------------
		$objDataBase = Guia::GetDatabase();
		$strCadeSqlx  = " delete ";
		$strCadeSqlx .= "   from guia_ckpt ";
		$strCadeSqlx .= "  where nume_guia = '".$this->objGuia->NumeGuia."'";
		$strCadeSqlx .= "    and codi_ckpt = 'OK'";
		$objDataBase->NonQuery($strCadeSqlx);
		//----------------------------------------------------------------------------
		// Este movimiento debe quedar grabado en el Registro de Trabajo de la Guia
		//----------------------------------------------------------------------------
		$objCheckpoint = SdeCheckpoint::Load('MG');
		$objUsuario = unserialize($_SESSION['User']);
		if ($objCheckpoint && $objUsuario) {
			$arrParaRegi['CodiCkpt'] = 'MG';
			$arrParaRegi['TextMens'] = QApplication::Translate('Se elimino el POD de la Guia');
			$arrParaRegi['NumeGuia'] = $this->objGuia->NumeGuia;
			$arrParaRegi['CodiUsua'] = $objUsuario->CodiUsua;
			$arrParaRegi['CodiEsta'] = $objUsuario->CodiEsta;
			CrearRegistroDeTrabajo($arrParaRegi);
		}
		//-------------------------------------------------------------------
		// Finalmente, se carga nuevamente el programa, con la misma guia
		//-------------------------------------------------------------------
		QApplication::Redirect('cargar_pod.php?strNumeGuia='.$this->objGuia->NumeGuia);
	}

	protected function btnOtraGuia_Click() {
		if (strlen($this->txtOtraGuia->Text) > 0) {
			$strNumeGuia = DejarSoloLosNumeros($this->txtOtraGuia->Text);
			//---------------------------------------
			// Se valida la existencia de la Guia
			//---------------------------------------
			$objGuia = Guia::Load($strNumeGuia);
			if ($objGuia) {
				QApplication::Redirect('cargar_pod.php?strNumeGuia='.$strNumeGuia);
			} else {
				$this->txtOtraGuia->Warning = QApplication::Translate('La Guia indicada no Existe');
				$this->txtOtraGuia->SetFocus();
			}
		}
	}

	protected function chkEntrEfec_Change() {
		if ($this->chkEntrEfec->Checked) {
			$this->txtEntrAqui->Visible = true;
			$this->calFechEntr->Visible = true;
			$this->txtHoraEntr->Visible = true;

			$this->lstListCkpt->Visible = false;
			$this->txtObseCkpt->Visible = false;
		} else {
			$this->txtEntrAqui->Visible = false;
			$this->calFechEntr->Visible = false;
			$this->txtHoraEntr->Visible = false;

			$this->lstListCkpt->Visible = true;
			$this->txtObseCkpt->Visible = true;

		}
	}

	protected function BloquearBotonAnterior() {
		$this->btnRegiAnte->Enabled = false;
		$this->btnRegiAnte->ForeColor = 'grey';
	}

	protected function BloquearBotonProximo() {
		$this->btnProxRegi->Enabled = false;
		$this->btnProxRegi->ForeColor = 'grey';
	}

	protected function btnRegiAnte_Click($strFormId, $strControlId, $strParameter) {
		$this->intIndiGuia -= 1;
		$this->lblContRegi->Text = "(".($this->intIndiGuia+1)."/".$this->intCantRegi.")";
		if ($this->intIndiGuia == 0) {
			$this->btnRegiAnte->Enabled = false;
		}
		QApplication::Redirect(sprintf("cargar_pod.php?strNumeGuia=%s",$this->arrGuiaCons[$this->intIndiGuia][0]));
	}

	protected function btnProxRegi_Click($strFormId, $strControlId, $strParameter) {
		$this->intIndiGuia += 1;
		$this->lblContRegi->Text = "(".($this->intIndiGuia+1)."/".$this->intCantRegi.")";
		if ($this->intIndiGuia == count($this->arrGuiaCons)) {
			$this->btnProxRegi->Enabled = false;
		}
		QApplication::Redirect(sprintf("cargar_pod.php?strNumeGuia=%s",$this->arrGuiaCons[$this->intIndiGuia][0]));
	}


	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$blnTodoOkey = true;
		//-------------------------------------------------------------------------------
		// Si la Entrega es Efectiva se validan los campos y se graba la informacion
		// correspondiente al POD
		//-------------------------------------------------------------------------------
		if ($this->chkEntrEfec->Checked) {
			//--------------------------------------
			// Se valida el formato de las horas
			//--------------------------------------
			if (!horaValida($this->txtHoraEntr->Text)) {
				$blnTodoOkey = false;
				$this->txtHoraEntr->Warning = QApplication::Translate('Formato de Hora Incorrecto. Utilice hora militar HH:MM');
				$this->txtHoraEntr->SetFocus();
			}
			if ($blnTodoOkey) {
				$objUsuario = unserialize($_SESSION['User']);
				$objCheckpoint = SdeCheckpoint::Load('OK');
				//------------------------------------------------------------------------------
				// Los campos concernientes al POD, toman valor antes de salvar la informacion
				//------------------------------------------------------------------------------
				$calFechaPod = new QDateTime(QDateTime::Now);
				$txtHoraPod = date("H:i");
				$txtUsuarioPod = $objUsuario->CodiUsua;
				//------------------------------------------------------
				// Vector de parametros para Grabar el POD en la Guia
				//------------------------------------------------------
				$arrDatoPodx['objGuiaPodx'] = $this->objGuia;
				$arrDatoPodx['objChecPodx'] = $objCheckpoint;
				$arrDatoPodx['calFechPodx'] = $calFechaPod;
				$arrDatoPodx['txtHoraPodx'] = $txtHoraPod;
				$arrDatoPodx['txtUsuaPodx'] = $txtUsuarioPod;
				$arrDatoPodx['txtEntrAqui'] = $this->txtEntrAqui->Text;
				$arrDatoPodx['calFechEntr'] = $this->calFechEntr->DateTime;
				$arrDatoPodx['txtFechEntr'] = $this->calFechEntr->DateTime->__toString("DD/MM/YYYY");
				$arrDatoPodx['txtHoraEntr'] = $this->txtHoraEntr->Text;
				// $this->lblMensUsua->Text = $this->objGuia->NumeGuia." ".$this->GrabarPODEnLaGuia($arrDatoPodx);
				$arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
				$this->lblMensUsua->Text = $this->objGuia->NumeGuia." ".$arrResuPodx['strMensUsua'];
				if ($arrResuPodx['blnTodoOkey'] == false) {
					$this->lblMensUsua->ForeColor = 'yellow';
				}
				//----------------------------------------------------------------
				// Si se especificaron Guias adicionales, aqui se procesan todas
				//----------------------------------------------------------------
				if (strlen($this->txtVariGuia->Text) > 0) {
					$arrVariGuia = explode(',',nl2br2($this->txtVariGuia->Text));
					$this->txtVariGuia->Text = '';
					//-------------------------------------------------------------------------------------
					// Con la funcion DejarSoloLosNumeros1 se eliminan los caracteres especiales y letras
					//-------------------------------------------------------------------------------------
					array_walk($arrVariGuia,'DejarSoloLosNumeros1');
					//---------------------------------------------------------------------------
					// Con array_unique se eliminan las guias repetidas en caso de que las haya
					//---------------------------------------------------------------------------
					$arrVariGuia = array_unique($arrVariGuia,SORT_STRING);
					//---------------------------------------------------------------------
					// Una vez que hemos "limipiado" la lista, se procesa guia por guia
					//---------------------------------------------------------------------
					foreach ($arrVariGuia as $strNumeGuia) {
						if (strlen($strNumeGuia) > 0) {
							$objGuia = Guia::Load($strNumeGuia);
							if ($objGuia) {
								$arrDatoPodx['objGuiaPodx'] = $objGuia;
								// $this->txtVariGuia->Text .= $strNumeGuia." ".$this->GrabarPODEnLaGuia($arrDatoPodx).chr(13);
								$arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
								$this->txtVariGuia->Text .= $strNumeGuia." ".$arrResuPodx['strMensUsua'].chr(13);
								if ($arrResuPodx['blnTodoOkey'] == false) {
									$this->lblMensUsua->ForeColor = 'yellow';
								}
							} else {
								$this->txtVariGuia->Text .= $strNumeGuia." (NO EXISTE)".chr(13);
							}
						}
					}
				}
				$this->btnOtraGuia->Visible = true;
				$this->txtOtraGuia->Visible = true;				
			}
		} else {
			//-----------------------------------------------------------------------
			// Si no fue una Entrega Efectiva, entonces se trata de una Incidencia
			// en cuyo caso, se registra o graba el checkpoint correspondiente
			//-----------------------------------------------------------------------
			$objCheckpoint = SdeCheckpoint::Load($this->lstListCkpt->SelectedValue);

			$arrDatoCkpt = array();
			$arrDatoCkpt['NumeGuia'] = $this->objGuia->NumeGuia;
			$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
			if (strlen($this->txtObseCkpt->Text) > 0) {
				$arrDatoCkpt['TextObse'] = $this->txtObseCkpt->Text;
			} else {
				$arrDatoCkpt['TextObse'] = $objCheckpoint->DescCkpt;
			}
			$arrDatoCkpt['CodiRuta'] = ''; //$strCodiRuta;
			$arrResuGrab = GrabarCheckpoint($arrDatoCkpt);
			if ($arrResuGrab['TodoOkey']) {
				//				$intContCkpt ++;
				$this->lblMensUsua->Text = QApplication::Translate('Transaccion Exitosa');
				$this->lblMensUsua->ForeColor = 'white';
				$this->btnOtraGuia->Visible = true;
				$this->txtOtraGuia->Visible = true;
				//----------------------------------------------------------------
				// Si se especificaron Guias adicionales, aqui se procesan todas
				//----------------------------------------------------------------
				if (strlen($this->txtVariGuia->Text) > 0) {
					$arrVariGuia = explode(',',nl2br2($this->txtVariGuia->Text));
					$this->txtVariGuia->Text = '';
					//-------------------------------------------------------------------------------------
					// Con la funcion DejarSoloLosNumeros1 se eliminan los caracteres especiales y letras
					//-------------------------------------------------------------------------------------
					array_walk($arrVariGuia,'DejarSoloLosNumeros1');
					//---------------------------------------------------------------------------
					// Con array_unique se eliminan las guias repetidas en caso de que las haya
					//---------------------------------------------------------------------------
					$arrVariGuia = array_unique($arrVariGuia,SORT_STRING);
					//---------------------------------------------------------------------
					// Una vez que hemos "limipiado" la lista, se procesa guia por guia
					//---------------------------------------------------------------------
					foreach ($arrVariGuia as $strNumeGuia) {
						if (strlen($strNumeGuia) > 0) {
							$objGuia = Guia::Load($strNumeGuia);
							if ($objGuia) {
								$arrDatoCkpt = array();
								$arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
								$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
								if (strlen($this->txtObseCkpt->Text) > 0) {
									$arrDatoCkpt['TextObse'] = $this->txtObseCkpt->Text;
								} else {
									$arrDatoCkpt['TextObse'] = $objCheckpoint->DescCkpt;
								}
								$arrDatoCkpt['CodiRuta'] = ''; //$strCodiRuta;
								$arrResuGrab = GrabarCheckpoint($arrDatoCkpt);
								if ($arrResuGrab['TodoOkey']) {
									$this->txtVariGuia->Text .= $objGuia->NumeGuia." (OK)".chr(13);
								} else {
									$this->txtVariGuia->Text .= $objGuia->NumeGuia." (".$arrResuGrab['TodoOkey'].")".chr(13);
								}
							} else {
								$this->txtVariGuia->Text .= $strNumeGuia." (NO EXISTE)".chr(13);
							}
						}
					}
				}
			}
		}
	}

}

CargarPod::Run('CargarPod');?>
