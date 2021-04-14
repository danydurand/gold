<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/BancoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Banco class.  It uses the code-generated
 * BancoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Banco columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both banco_edit.php AND
 * banco_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class BancoEditForm extends BancoEditFormBase {
	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

//  protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the BancoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctBanco = BancoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Banco's data fields
		$this->lblId = $this->mctBanco->lblId_Create();
		$this->lblId->CssClass = 'form-label';

		$this->txtDescripcion = $this->mctBanco->txtDescripcion_Create();
		$this->txtDescripcion->Width = 150;

		$this->lstStatus = $this->mctBanco->lstStatus_Create();
		$this->lstStatus->Width = 100;

		$this->txtAbreviado = $this->mctBanco->txtAbreviado_Create();
		$this->txtAbreviado->Width = 100;

	}

	//----------------------------
	// Aquí se crean los objetos 
	//----------------------------
	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Banco';
        if ($this->mctBanco->EditMode) {
            $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
        }
    }

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------
    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/banco_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/banco_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/banco_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/banco_edit.php/'.$objRegiTabl->Id);
    }

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctBanco->Banco;
		$this->mctBanco->SaveBanco();
		if ($this->mctBanco->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctBanco->Banco;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Banco';
				$arrLogxCamb['intRefeRegi'] = $this->mctBanco->Banco->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctBanco->Banco->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
			}
            $this->mensaje('Transaccion Exitosa','','','check');
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'Banco';
			$arrLogxCamb['intRefeRegi'] = $this->mctBanco->Banco->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctBanco->Banco->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();			
		}
	}

    protected function RedirectToListPage() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

	protected function btnVolvList_Click() {
		QApplication::Redirect(__SIST__.'/banco_list.php');
	}
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// banco_edit.tpl.php as the included HTML template file
BancoEditForm::Run('BancoEditForm');
?>