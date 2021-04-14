<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CuponEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Cupon class.  It uses the code-generated
 * CuponMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Cupon columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cupon_edit.php AND
 * cupon_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CuponEditForm extends CuponEditFormBase {
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

		$this->lblTituForm->Text = 'Consulta de Cupón';

		// Call MetaControl's methods to create qcontrols based on Cupon's data fields
        $this->txtNumero->Width = 80;

        $this->txtPorcentajeDescuento->Width = 50;
        $this->txtPorcentajeDescuento->Name = '% Descuento';

        $this->txtMontoDescuento = $this->mctCupon->lblMontoDescuento_Create();
        $this->txtMontoDescuento->Name = 'Mto. Descuento';

        $this->txtReceptoria->Width = 50;
        $this->txtTipo->Width = 40;

		$this->txtCargadoPor = $this->mctCupon->lblCargadoPor_Create();
		$this->calCargadoEl = $this->mctCupon->lblCargadoEl_Create();
		$this->txtUsadoPor = $this->mctCupon->lblUsadoPor_Create();
		$this->calUsadoEl = $this->mctCupon->lblUsadoEl_Create();
		$this->txtGuiaId = $this->mctCupon->lblGuiaId_Create();

		// Create Buttons and Actions on this Form
        $this->btnSave->Text = TextoIcono('save fa-lg','Guardar');

		$this->btnNuevRegi->Visible = false;
	}

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

	/*protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctCupon->Cupon;
		$this->mctCupon->SaveCupon();
		if ($this->mctCupon->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctCupon->Cupon;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Cupon';
				$arrLogxCamb['intRefeRegi'] = $this->mctCupon->Cupon->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctCupon->Cupon->Numero;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
			}
            $this->mensaje('Transaccion Exitosa','','','check');
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'Cupon';
			$arrLogxCamb['intRefeRegi'] = $this->mctCupon->Cupon->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctCupon->Cupon->Numero;
			$arrLogxCamb['strDescCamb'] = "Creado";
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();			
		}
	}*/
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// cupon_edit.tpl.php as the included HTML template file
CuponEditForm::Run('CuponEditForm');
?>
