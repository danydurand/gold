<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/OpcionEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Opcion class.  It uses the code-generated
 * OpcionMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Opcion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both opcion_edit.php AND
 * opcion_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class OpcionEditForm extends OpcionEditFormBase {
	protected $btnLogxCamb;
	protected $btnProxRegi;
	protected $btnRegiAnte;
	protected $btnPrimRegi;
	protected $btnUltiRegi;
	protected $intPosiRegi;
	protected $arrDataTabl;
	protected $intCantRegi;

    protected $lstNumeDepe;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

//	protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

		$this->arrDataTabl = unserialize($_SESSION['DataTabl']);
		$this->intCantRegi = count($this->arrDataTabl);
		//-------------------------------------------------------------------------------
		// Se determina la posicion del registro actual, dentro del vector de registros 
		//-------------------------------------------------------------------------------
		$intContRegi = 0;
		foreach ($this->arrDataTabl as $objTable) {
			if ($objTable->CodiOpci == $this->mctOpcion->Opcion->CodiOpci) {
				$this->intPosiRegi = $intContRegi;
				break;
			} else {
				$intContRegi++;
			}
		}
		// Use the CreateFromPathInfo shortcut (this can also be done manually using the OpcionMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctOpcion = OpcionMetaControl::CreateFromPathInfo($this);
		$this->lblMensUsua_Create();
		$this->lblNotiUsua_Create();
		$this->lblTituForm_Create();

		$this->btnProxRegi_Create();
		$this->btnRegiAnte_Create();
		$this->btnPrimRegi_Create();
		$this->btnUltiRegi_Create();

		$this->verificarNavegacion();

		// Call MetaControl's methods to create qcontrols based on Opcion's data fields
		$this->lblCodiOpci = $this->mctOpcion->lblCodiOpci_Create();
		$this->lblCodiOpci->CssClass = 'form-label';

		$this->txtDescOpci = $this->mctOpcion->txtDescOpci_Create();

		$this->lstCodiSistObject = $this->mctOpcion->lstCodiSistObject_Create();
		$this->lstCodiSistObject->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiSistObject_Change'));
		if ($this->lstCodiSistObject->ItemCount == 2 && !$this->mctOpcion->EditMode) {
			$this->lstCodiSistObject->SelectedIndex = 1;
		}

		$this->lstCodiTipoObject = $this->mctOpcion->lstCodiTipoObject_Create();
		if ($this->lstCodiTipoObject->ItemCount == 3 && !$this->mctOpcion->EditMode) {
			$this->lstCodiTipoObject->SelectedIndex = 2;
		}

		$this->chkCodiStat = $this->mctOpcion->chkCodiStat_Create();
//		$this->chkCodiStat->Name = 'Artivo ?';

		$this->txtNombProg = $this->mctOpcion->txtNombProg_Create();
		$this->txtNombProg->AddAction(new QBlurEvent(), new QAjaxAction('txtNombProg_Change'));

		$this->txtPathOpci = $this->mctOpcion->txtPathOpci_Create();
		$this->txtPathOpci->Width = 90;
		if (!$this->mctOpcion->EditMode) {
			$this->txtPathOpci->Text = strtolower($this->lstCodiSistObject->SelectedName);
		}

		$this->txtPosiOpci = $this->mctOpcion->txtPosiOpci_Create();
		$this->txtPosiOpci->Width = 40;

        $this->lstNumeDepe_Create();

		$this->txtNumeDepe = $this->mctOpcion->txtNumeDepe_Create();
		$this->txtNumeDepe->Name = 'Depende De';
//		$this->txtNumeDepe->AddAction(new QChangeEvent(), new QAjaxAction('txtNumeDepe_Change'));

		$this->txtImagOpci = $this->mctOpcion->txtImagOpci_Create();
		$this->txtNivel = $this->mctOpcion->txtNivel_Create();
		$this->txtNivel->Width = 30;

		// Create Buttons and Actions on this Form
		$this->btnSave_Create();
		$this->btnLogxCamb_Create();
		$this->btnCancel_Create();
		$this->btnDelete_Create();
	}

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Crear/Editar Opcion';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
		$this->lblMensUsua->HtmlEntities = false;
	}

	protected function lblNotiUsua_Create() {
		$this->lblNotiUsua = new QLabel($this);
		$this->lblNotiUsua->Text = '';
		$this->lblNotiUsua->HtmlEntities = false;
	}

    protected function lstNumeDepe_Create() {
        $this->lstNumeDepe = new QListBox($this);
        $this->lstNumeDepe->Name = 'Depende de ?';
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Opcion()->DescOpci);
        $arrOpciSist   = Opcion::LoadArrayByCodiSist($_SESSION['Sistema'],$objClauOrde);
        $intCantOpci   = count($arrOpciSist);
        $this->lstNumeDepe->RemoveAllItems();
        $this->lstNumeDepe->AddItem('- Seleccione Uno - ('.$intCantOpci.')',null);
        foreach ($arrOpciSist as $objOpciSist) {
            $blnSeleRegi = false;
            if ($this->mctOpcion->EditMode) {
                if ($this->mctOpcion->Opcion->NumeDepe == $objOpciSist->CodiOpci) {
                    $blnSeleRegi = true;
                }
            }
            $this->lstNumeDepe->AddItem($objOpciSist->__toString(), $objOpciSist->CodiOpci, $blnSeleRegi);
        }
        $this->lstNumeDepe->AddAction(new QChangeEvent(), new QAjaxAction('lstNumeDepe_Change'));
    }

	protected function btnProxRegi_Create() {
		$this->btnProxRegi = new QButton($this);
		$this->btnProxRegi->Text = '<i class="fa fa-angle-right"></i>';
		$this->btnProxRegi->CssClass = 'btn btn-primary';
		$this->btnProxRegi->HtmlEntities = false;
		$this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
	}

	protected function btnRegiAnte_Create() {
		$this->btnRegiAnte = new QButton($this);
		$this->btnRegiAnte->Text = '<i class="fa fa-angle-left"></i>';
		$this->btnRegiAnte->CssClass = 'btn btn-primary';
		$this->btnRegiAnte->HtmlEntities = false;
		$this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
	}
	
	protected function btnPrimRegi_Create() {
		$this->btnPrimRegi = new QButton($this);
		$this->btnPrimRegi->Text = '<i class="fa fa-angle-double-left"></i>';
		$this->btnPrimRegi->CssClass = 'btn btn-primary';
		$this->btnPrimRegi->HtmlEntities = false;
		$this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
	}

	protected function btnUltiRegi_Create() {
		$this->btnUltiRegi = new QButton($this);
		$this->btnUltiRegi->Text = '<i class="fa fa-angle-double-right"></i>';
		$this->btnUltiRegi->CssClass = 'btn btn-primary';
		$this->btnUltiRegi->HtmlEntities = false;
		$this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
	}

	protected function btnSave_Create() {
		// Create Buttons and Actions on this Form
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = QApplication::Translate('<i class="fa fa-floppy-o fa-lg"></i> Guardar');
		$this->btnSave->CssClass = 'btn btn-success';
		$this->btnSave->HtmlEntities = false;
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		$this->btnSave->CausesValidation = true;
	}

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = QApplication::Translate('<i class="fa fa-ban fa-lg"></i> Cancelar');
		$this->btnCancel->CssClass = 'btn btn-warning';
		$this->btnCancel->HtmlEntities = false;
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
	}

	protected function btnDelete_Create() {
		$this->btnDelete = new QButton($this);
		$this->btnDelete->Text = QApplication::Translate('<i class="fa fa-trash-o fa-lg"></i> Borrar');
		$this->btnDelete->CssClass = 'btn btn-danger';
		$this->btnDelete->HtmlEntities = false;
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Opcion'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctOpcion->EditMode;
	}

	protected function btnLogxCamb_Create() {
		$this->btnLogxCamb = new QButton($this);
		$this->btnLogxCamb->Text = QApplication::Translate('<i class="fa fa-file-text-o fa-lg"></i> Log Cambios');
		$this->btnLogxCamb->CssClass = 'btn btn-default';
		$this->btnLogxCamb->HtmlEntities = false;
		$this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
		$this->btnLogxCamb->Visible = Log::CountByTablaRef('Opcion',$this->mctOpcion->Opcion->CodiOpci);
	}

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function lstCodiSistObject_Change() {
        if (!is_null($this->lstCodiSistObject->SelectedValue)) {
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Opcion()->NombProg);
            $arrOpciSist   = Opcion::LoadArrayByCodiSist($this->lstCodiSistObject->SelectedValue,$objClauOrde);
            $intCantOpci   = count($arrOpciSist);
            $this->lstNumeDepe->RemoveAllItems();
            $this->lstNumeDepe->AddItem('- Seleccione Uno - ('.$intCantOpci.')',null);
            foreach ($arrOpciSist as $objOpciSist) {
                $this->lstNumeDepe->AddItem($objOpciSist->__toString(), $objOpciSist->CodiOpci);
            }
        }
    }

	protected function btnLogxCamb_Click() {
		$_SESSION['RegiRefe'] = $this->mctOpcion->Opcion->CodiOpci;
		$_SESSION['TablRefe'] = 'Opcion';
		$_SESSION['RegiReto'] = 'opcion_edit.php/'.$this->mctOpcion->Opcion->CodiOpci;
		QApplication::Redirect(__OKI__.'/log_list.php');
	}

	protected function btnProxRegi_Click() {
		$objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
		QApplication::Redirect(__OKI__.'/opcion_edit.php/'.$objRegiTabl->CodiOpci);
	}
	
	protected function btnRegiAnte_Click() {
		$objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
		QApplication::Redirect(__OKI__.'/opcion_edit.php/'.$objRegiTabl->CodiOpci);
	}
	
	protected function btnPrimRegi_Click() {
		$objRegiTabl = $this->arrDataTabl[0];
		QApplication::Redirect(__OKI__.'/opcion_edit.php/'.$objRegiTabl->CodiOpci);
	}
	
	protected function btnUltiRegi_Click() {
		$objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
		QApplication::Redirect(__OKI__.'/opcion_edit.php/'.$objRegiTabl->CodiOpci);
	}

	protected function verificarNavegacion() {
		$this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
		$this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
		$this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
		$this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
	}

	protected function txtNombProg_Change() {
		if (!$this->mctOpcion->EditMode) {
			$strNombProg = $this->txtNombProg->Text;
			if (strpos($strNombProg, '_list.php')) {
				$this->chkCodiStat->Checked = true;
			} else {
				$this->chkCodiStat->Checked = false;
			}
		}
	}
	
	protected function lstNumeDepe_Change() {
		if (!is_null($this->lstNumeDepe->SelectedValue)) {
			$objDepeSele = Opcion::Load($this->lstNumeDepe->SelectedValue);
			if ($objDepeSele->CodiTipo == TipoOpciType::MENU) {
				$this->txtPosiOpci->Text = $objDepeSele->CountDependencia() + 1;
				$this->txtNivel->Text    = $objDepeSele->Nivel + 1;
			} else {
				$this->txtNivel->Text    = $objDepeSele->Nivel;
			}
		}
	}

	protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
		//----------------------------------------
		// Se verifica la integridad referencial
		//----------------------------------------
		$blnTodoOkey = true;
		$arrTablRela = $this->mctOpcion->TablasRelacionadasOpcion();
		if (count($arrTablRela)) {
			$strTablRela = implode(',',$arrTablRela);
				
			$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
			$blnTodoOkey = false;
		}
		if ($blnTodoOkey) {
			// Delegate "Delete" processing to the OpcionMetaControl
			$this->mctOpcion->DeleteOpcion();
			$arrLogxCamb['strNombTabl'] = 'Opcion';
			$arrLogxCamb['intRefeRegi'] = $this->mctOpcion->Opcion->CodiOpci;
			$arrLogxCamb['strNombRegi'] = $this->mctOpcion->Opcion->DescOpci;
			$arrLogxCamb['strDescCamb'] = 'Borrado';
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();
		}
	}

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
        $_SERVER['GrabarTraza'] = 'SI';
        t('Grabando la Opcion');
        t('==================');
		$objRegiViej = clone $this->mctOpcion->Opcion;
        $this->txtNumeDepe->Text = $this->lstNumeDepe->SelectedValue;
		$this->mctOpcion->SaveOpcion();
        t('Ya guarde en la BD');
		if (!is_null($this->lstNumeDepe->SelectedValue)) {
            t('Hay una dependencia');
			//----------------------------------------------------------------------------------
			// Si la posicion se que esta asignando a esta Opcion, esta previamente asignada
			// a otra, entonces se procede a desplazar los numeros hacia adelante, para
			// darle cabida a la Opcion que se esta guardando.
			//----------------------------------------------------------------------------------
			$objClauOrde   = QQ::Clause();
			$objClauOrde[] = QQ::OrderBy(QQN::Opcion()->PosiOpci);
			$arrOpciMenu   = Opcion::LoadArrayByNumeDepe($this->lstNumeDepe->SelectedValue,$objClauOrde);
			$intCantOpci   = count($arrOpciMenu);
			$intIndiVect   = 0;
			$intPosiRefe   = $this->txtPosiOpci->Text;
            t('Voy a recorrer el ciclo de la opciones');
			while ($intIndiVect < $intCantOpci) {
				$objOpcion   = $arrOpciMenu[$intIndiVect];
				if (($objOpcion->PosiOpci == $intPosiRefe) && ($objOpcion->CodiOpci != $this->mctOpcion->Opcion->CodiOpci)) {
					$objOpcion->PosiOpci += 1;
					$intPosiRefe += 1;
					$objOpcion->Save();
				}
				$intIndiVect ++;
			}
		}
        t('Voy a verificar los cambios y guardar el Log');
		if ($this->mctOpcion->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctOpcion->Opcion;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
            t('Acabo de comprar los objetos: '.$objResuComp->FriendlyComparisonStatus);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Opcion';
				$arrLogxCamb['intRefeRegi'] = $this->mctOpcion->Opcion->CodiOpci;
				$arrLogxCamb['strNombRegi'] = $this->mctOpcion->Opcion->DescOpci;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
                t('Guarde los cambios');
			}
            $this->mensaje('Transaccion Exitosa','m','s','check');
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
            t('Voy por aqui');
			$arrLogxCamb['strNombTabl'] = 'Opcion';
			$arrLogxCamb['intRefeRegi'] = $this->mctOpcion->Opcion->CodiOpci;
			$arrLogxCamb['strNombRegi'] = $this->mctOpcion->Opcion->DescOpci;
			$arrLogxCamb['strDescCamb'] = 'Creado';
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();
		}
        t('Termine');
	}

    protected function RedirectToListPage() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__PMN__."/".$objUltiAcce->__toString());
    }

}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// opcion_edit.tpl.php as the included HTML template file
OpcionEditForm::Run('OpcionEditForm');
?>
