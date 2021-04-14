<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CajaEditFormBase.class.php');

//error_reporting(E_ALL);

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Caja class.  It uses the code-generated
 * CajaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Caja columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both new_opcion_edit.php AND
 * new_opcion_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CajaEditForm extends CajaEditFormBase {
	protected $btnLogxCamb;

	protected $btnProxRegi;
	protected $btnRegiAnte;
	protected $btnPrimRegi;
	protected $btnUltiRegi;
	protected $intPosiRegi;
	protected $arrDataTabl;
	protected $intCantRegi;

	protected $lblCajaIdxx;
	protected $txtCajaDesc;
	protected $lstCajaRece;
	protected $txtContSeni;
	protected $lstTipoCaja;
	protected $txtImprIdxx;
	protected $txtImprSeri;

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

        $this->arrDataTabl = unserialize($_SESSION['DataCaja']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctCaja->Caja->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the CajaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctCaja = CajaMetaControl::CreateFromPathInfo($this);
		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->verificarNavegacion();

		// Call MetaControl's methods to create qcontrols based on Caja's data fields
		$this->lblCajaIdxx = $this->mctCaja->lblId_Create();

		$this->txtCajaDesc = $this->mctCaja->txtDescripcion_Create();

		$this->lstCajaRece = $this->mctCaja->lstCounter_Create();
        if (isset($_SESSION['CodiRece'])) {
            $this->lstCajaRece->RemoveAllItems();
            $objReceSele = Counter::Load($_SESSION['CodiRece']);
            if ($objReceSele) {
                $this->lstCajaRece->AddItem($objReceSele->__toString(),$objReceSele->Id,true);
            }
            $this->lstCajaRece->Enabled = false;
            $this->lstCajaRece->ForeColor = 'blue';
            unset($_SESSION['CodiSucu']);
        }


        //$this->txtContSeni = $this->mctCaja->txtControlSeniat_Create();

		//$this->lstTipoCaja = $this->mctCaja->lstTipo_Create();

		$this->txtImprIdxx = $this->mctCaja->txtImpresoraId_Create();

		$this->txtImprSeri = $this->mctCaja->txtSerie_Create();

		$this->btnLogxCamb_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

	/*
	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Crear/Editar Cajas';
        if ($this->mctCaja->EditMode) {
            $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
        }
    }

	*/

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctCaja->Caja;
		$this->mctCaja->SaveCaja();
		if ($this->mctCaja->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctCaja->Caja;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Caja';
				$arrLogxCamb['intRefeRegi'] = $this->mctCaja->Caja->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctCaja->Caja->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
			}
            $this->mensaje('Transacción Exitosa','','','check');
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'Caja';
			$arrLogxCamb['intRefeRegi'] = $this->mctCaja->Caja->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctCaja->Caja->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();			
		}
	}

    protected function btnVolvList_Click() {
        $this->RedirectToListPage();
    }

    protected function RedirectToListPage() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }


}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// new_opcion_edit.tpl.php as the included HTML template file
CajaEditForm::Run('CajaEditForm');
?>
