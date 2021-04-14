<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ClientePmnEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the ClientePmn class.  It uses the code-generated
 * ClientePmnMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a ClientePmn columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cliente_pmn_edit.php AND
 * cliente_pmn_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ClientePmnEditForm extends ClientePmnEditFormBase {
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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ClientePmnMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctClientePmn = ClientePmnMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on ClientePmn's data fields
		$this->txtCedulaRif = $this->mctClientePmn->txtCedulaRif_Create();
		$this->txtNombre = $this->mctClientePmn->txtNombre_Create();
		$this->txtTelefonoFijo = $this->mctClientePmn->txtTelefonoFijo_Create();
		$this->txtTelefonoMovil = $this->mctClientePmn->txtTelefonoMovil_Create();

		$this->txtDireccion = $this->mctClientePmn->txtDireccion_Create();
		$this->txtDireccion->TextMode = QTextMode::MultiLine;

		$this->txtSucursalId = $this->mctClientePmn->txtSucursalId_Create();
		$this->calRegistradoEl = $this->mctClientePmn->calRegistradoEl_Create();
		$this->lstRegistradoPorObject = $this->mctClientePmn->lstRegistradoPorObject_Create();
		$this->txtEmail = $this->mctClientePmn->txtEmail_Create();
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------
	protected function determinarPosicion() {
		if ($this->mctClientePmn->ClientePmn && !isset($_SESSION['DataClientePmn'])) {
			$_SESSION['DataClientePmn'] = serialize(array($this->mctClientePmn->ClientePmn));
		}
		$this->arrDataTabl = unserialize($_SESSION['DataClientePmn']);
		$this->intCantRegi = count($this->arrDataTabl);
		//-------------------------------------------------------------------------------
		// Se determina la posición del registro actual, dentro del vector de registros
		//-------------------------------------------------------------------------------
		$intContRegi = 0;
		foreach ($this->arrDataTabl as $objTable) {
			if ($objTable->CedulaRif == $this->mctClientePmn->ClientePmn->CedulaRif) {
				$this->intPosiRegi = $intContRegi;
				break;
			} else {
				$intContRegi++;
			}
		}
	}

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Cliente PMN';
        if ($this->mctClientePmn->EditMode) {
            $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
        }
    }

	protected function btnLogxCamb_Create() {
		$this->btnLogxCamb = new QButton($this);
		$this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
		$this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
		$this->btnLogxCamb->HtmlEntities = false;
		$this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
		$this->btnLogxCamb->Visible = Log::CountByTablaRef('ClientePmn',$this->mctClientePmn->ClientePmn->CedulaRif);
	}

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------
    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/cliente_pmn_edit.php/'.$objRegiTabl->CedulaRif);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/cliente_pmn_edit.php/'.$objRegiTabl->CedulaRif);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/cliente_pmn_edit.php/'.$objRegiTabl->CedulaRif);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/cliente_pmn_edit.php/'.$objRegiTabl->CedulaRif);
    }

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctClientePmn->ClientePmn;
		$this->mctClientePmn->SaveClientePmn();
		if ($this->mctClientePmn->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctClientePmn->ClientePmn;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'ClientePmn';
				$arrLogxCamb['intRefeRegi'] = $this->mctClientePmn->ClientePmn->CedulaRif;
				$arrLogxCamb['strNombRegi'] = $this->mctClientePmn->ClientePmn->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
			}
            $this->mensaje('Transaccion Exitosa','','','check');
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'ClientePmn';
			$arrLogxCamb['intRefeRegi'] = $this->mctClientePmn->ClientePmn->CedulaRif;
			$arrLogxCamb['strNombRegi'] = $this->mctClientePmn->ClientePmn->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();			
		}
	}

	protected function btnLogxCamb_Click() {
		$_SESSION['RegiRefe'] = $this->mctClientePmn->ClientePmn->CedulaRif;
		$_SESSION['TablRefe'] = 'ClientePmn';
		$_SESSION['RegiReto'] = 'cliente_pmn_edit.php/'.$this->mctClientePmn->ClientePmn->CedulaRif;
		QApplication::Redirect(__SIST__.'/log_list.php');
	}

    protected function RedirectToListPage() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

	protected function btnVolvList_Click() {
		QApplication::Redirect(__SIST__.'/cliente_pmn_list.php');
	}
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// cliente_pmn_edit.tpl.php as the included HTML template file
ClientePmnEditForm::Run('ClientePmnEditForm');
?>