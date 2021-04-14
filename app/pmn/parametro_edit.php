<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ParametroEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Parametro class.  It uses the code-generated
 * ParametroMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Parametro columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both parametro_edit.php AND
 * parametro_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ParametroEditForm extends ParametroEditFormBase {
	protected $btnLogxCamb;

    // Controles de navegacion
	protected $btnProxRegi;
	protected $btnRegiAnte;
	protected $btnPrimRegi;
	protected $btnUltiRegi;
    protected $intPosiRegi;
    protected $arrDataTabl;
    protected $intCantRegi;

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

        $this->arrDataTabl = unserialize($_SESSION['DataParametro']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->IndiPara == $this->mctParametro->Parametro->IndiPara &&
				$objTable->CodiPara == $this->mctParametro->Parametro->CodiPara) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }

        // Use the CreateFromPathInfo shortcut (this can also be done manually using the ParametroMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctParametro = ParametroMetaControl::CreateFromPathInfo($this);
		$this->lblMensUsua_Create();
		$this->lblNotiUsua_Create();
		$this->lblTituForm_Create();

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->verificarNavegacion();

        // Call MetaControl's methods to create qcontrols based on Parametro's data fields
		$this->txtIndiPara = $this->mctParametro->txtIndiPara_Create();
		$this->txtIndiPara->Width = 100;
		$this->txtCodiPara = $this->mctParametro->txtCodiPara_Create();
		$this->txtCodiPara->Width = 100;
		$this->txtDescPara = $this->mctParametro->txtDescPara_Create();
		$this->txtDescPara->Width = 250;
		$this->txtDescPara->Height = 50;
		$this->txtDescPara->TextMode = QTextMode::MultiLine;
		$this->txtParaTxt1 = $this->mctParametro->txtParaTxt1_Create();
		$this->txtParaTxt1->Width = 250;
		$this->txtParaTxt1->Height = 50;
		$this->txtParaTxt1->TextMode = QTextMode::MultiLine;
		$this->txtParaTxt2 = $this->mctParametro->txtParaTxt2_Create();
		$this->txtParaTxt2->Width = 250;
		$this->txtParaTxt2->Height = 50;
		$this->txtParaTxt2->TextMode = QTextMode::MultiLine;
		$this->txtParaTxt3 = $this->mctParametro->txtParaTxt3_Create();
		$this->txtParaTxt3->Width = 250;
		$this->txtParaTxt3->Height = 50;
		$this->txtParaTxt3->TextMode = QTextMode::MultiLine;
		$this->txtParaTxt4 = $this->mctParametro->txtParaTxt4_Create();
		$this->txtParaTxt4->Width = 250;
		$this->txtParaTxt4->Height = 50;
		$this->txtParaTxt4->TextMode = QTextMode::MultiLine;
		$this->txtParaTxt5 = $this->mctParametro->txtParaTxt5_Create();
		$this->txtParaTxt5->Width = 250;
		$this->txtParaTxt5->Height = 50;
		$this->txtParaTxt5->TextMode = QTextMode::MultiLine;
		$this->txtParaVal1 = $this->mctParametro->txtParaVal1_Create();
		$this->txtParaVal2 = $this->mctParametro->txtParaVal2_Create();
		$this->txtParaVal3 = $this->mctParametro->txtParaVal3_Create();
		$this->txtParaVal4 = $this->mctParametro->txtParaVal4_Create();
		$this->txtParaVal5 = $this->mctParametro->txtParaVal5_Create();

		if (!$this->mctParametro->EditMode) {
		}

		// Create Buttons and Actions on this Form
		$this->btnSave_Create();
		$this->btnLogxCamb_Create();
		$this->btnCancel_Create();
		$this->btnDelete_Create();
	}

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text  = 'Crear/Editar Parámetro';
		if ($this->mctParametro->EditMode) {
            $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
        }
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
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Parametro'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctParametro->EditMode;
	}

	protected function btnLogxCamb_Create() {
		$this->btnLogxCamb = new QButton($this);
		$this->btnLogxCamb->Text = QApplication::Translate('<i class="fa fa-file-text-o fa-lg"></i> Log Cambios');
		$this->btnLogxCamb->CssClass = 'btn btn-default';
		$this->btnLogxCamb->HtmlEntities = false;
		$this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
		$this->btnLogxCamb->Visible = Log::CountByTablaRef('Parametro',$this->mctParametro->Parametro->IndiPara);
	}

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

	protected function btnLogxCamb_Click() {
		$_SESSION['RegiRefe'] = $this->mctParametro->Parametro->IndiPara;
		$_SESSION['TablRefe'] = 'Parametro';
		$_SESSION['RegiReto'] = 'parametro_edit.php/'.$this->mctParametro->Parametro->IndiPara;
		QApplication::Redirect(__APP__.'/okinawa/log_list.php');
	}

    protected function verificarNavegacion() {
		if ($this->mctParametro->EditMode) {
			$this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
			$this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
			$this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
			$this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
		} else {
			$this->btnRegiAnte->Enabled = false;
			$this->btnPrimRegi->Enabled = false;
			$this->btnProxRegi->Enabled = false;
			$this->btnUltiRegi->Enabled = false;
		}
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__PMN__.'/parametro_edit.php/'.$objRegiTabl->IndiPara.'/'.$objRegiTabl->CodiPara);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__PMN__.'/parametro_edit.php/'.$objRegiTabl->IndiPara.'/'.$objRegiTabl->CodiPara);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__PMN__.'/parametro_edit.php/'.$objRegiTabl->IndiPara.'/'.$objRegiTabl->CodiPara);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__PMN__.'/parametro_edit.php/'.$objRegiTabl->IndiPara.'/'.$objRegiTabl->CodiPara);
    }

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
		//----------------------------------------
		// Se verifica la integridad referencial
		//----------------------------------------
		$blnTodoOkey = true;
		$arrTablRela = $this->mctParametro->TablasRelacionadasParametro();
		if (count($arrTablRela)) {
			$strTablRela = implode(',',$arrTablRela);
				
			$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
			$blnTodoOkey = false;
		}
		if ($blnTodoOkey) {
			// Delegate "Delete" processing to the ParametroMetaControl
			$this->mctParametro->DeleteParametro();
			$arrLogxCamb['strNombTabl'] = 'Parametro';
			$arrLogxCamb['intRefeRegi'] = $this->mctParametro->Parametro->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctParametro->Parametro->Indice."-".$this->mctParametro->Parametro->Codigo;
			$arrLogxCamb['strDescCamb'] = 'Borrado';
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();
		}
	}

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctParametro->Parametro;
		$this->mctParametro->SaveParametro();
		if ($this->mctParametro->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctParametro->Parametro;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Parametro';
				$arrLogxCamb['intRefeRegi'] = $this->mctParametro->Parametro->IndiPara."-".$this->mctParametro->Parametro->CodiPara;
				$arrLogxCamb['strNombRegi'] = $this->mctParametro->Parametro->IndiPara."-".$this->mctParametro->Parametro->CodiPara;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);

				$this->mctParametro->SaveParametro();
			}
			$this->lblMensUsua->CssClass = 'alert alert-success';
			$this->lblMensUsua->Text = '<i class="fa fa-check fa-lg"></i> Transaccion Exitosa';
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'Parametro';
            $arrLogxCamb['intRefeRegi'] = $this->mctParametro->Parametro->IndiPara."-".$this->mctParametro->Parametro->CodiPara;
            $arrLogxCamb['strNombRegi'] = $this->mctParametro->Parametro->IndiPara."-".$this->mctParametro->Parametro->CodiPara;
			$arrLogxCamb['strDescCamb'] = 'Creado';
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();
		}
	}

    protected function RedirectToListPage() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__PMN__."/".$objUltiAcce->__toString());
    }


}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// parametro_edit.tpl.php as the included HTML template file
ParametroEditForm::Run('ParametroEditForm');
?>
