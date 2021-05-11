<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/VehiculoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Vehiculo class.  It uses the code-generated
 * VehiculoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Vehiculo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both vehiculo_edit.php AND
 * vehiculo_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class VehiculoEditForm extends VehiculoEditFormBase {

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

        $this->lblTituForm->Text = 'Vehículo';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the VehiculoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctVehiculo = VehiculoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Vehiculo's data fields
		$this->lblCodiVehi = $this->mctVehiculo->lblCodiVehi_Create();
		$this->lblCodiVehi->Name = 'Código';

        $this->txtDescVehi = $this->mctVehiculo->txtDescVehi_Create();
        $this->txtDescVehi->Name = 'Descripción';

		$this->txtNumePlac = $this->mctVehiculo->txtNumePlac_Create();
		$this->txtNumePlac->Name = 'Placa';
		$this->txtNumePlac->Width = 100;

		$this->txtTextObse = $this->mctVehiculo->txtTextObse_Create();
		$this->txtTextObse->TextMode = QTextMode::MultiLine;

		$this->lstSucursal = $this->mctVehiculo->lstSucursal_Create();

		$this->lstTipoVehiObject = $this->mctVehiculo->lstTipoVehiObject_Create();
		$this->lstTipoVehiObject->Name = 'Tipo';

		$this->lstCodiDispObject = $this->mctVehiculo->lstCodiDispObject_Create();
		$this->lstCodiDispObject->Name = 'Disponible?';

		$this->lstCodiStatObject = $this->mctVehiculo->lstCodiStatObject_Create();

        if (!$this->mctVehiculo->EditMode) {
            $this->lstCodiDispObject->SelectedIndex = 1;
            $this->lstCodiStatObject->SelectedIndex = 1;
            $intIdxxSucu = 0;
            foreach ($this->lstSucursal->GetAllItems() as $item) {
                if ($item->Value == $this->objUsuario->SucursalId) {
                    $this->lstSucursal->SelectedIndex = $intIdxxSucu;
                    break;
                } else {
                    $intIdxxSucu++;
                }
            }
        }

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctVehiculo->Vehiculo && !isset($_SESSION['DataVehiculo'])) {
            $_SESSION['DataVehiculo'] = serialize(array($this->mctVehiculo->Vehiculo));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataVehiculo']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiVehi == $this->mctVehiculo->Vehiculo->CodiVehi) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Vehiculo',$this->mctVehiculo->Vehiculo->CodiVehi);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/vehiculo_edit.php/'.$objRegiTabl->CodiVehi);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/vehiculo_edit.php/'.$objRegiTabl->CodiVehi);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/vehiculo_edit.php/'.$objRegiTabl->CodiVehi);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/vehiculo_edit.php/'.$objRegiTabl->CodiVehi);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctVehiculo->Vehiculo;
		$this->mctVehiculo->SaveVehiculo();
		if ($this->mctVehiculo->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctVehiculo->Vehiculo;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Vehiculo';
				$arrLogxCamb['intRefeRegi'] = $this->mctVehiculo->Vehiculo->CodiVehi;
				$arrLogxCamb['strNombRegi'] = $this->mctVehiculo->Vehiculo->DescVehi;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/vehiculo_edit.php/'.$this->mctVehiculo->Vehiculo->CodiVehi;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Vehiculo';
			$arrLogxCamb['intRefeRegi'] = $this->mctVehiculo->Vehiculo->CodiVehi;
			$arrLogxCamb['strNombRegi'] = $this->mctVehiculo->Vehiculo->DescVehi;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/vehiculo_edit.php/'.$this->mctVehiculo->Vehiculo->CodiVehi;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctVehiculo->TablasRelacionadasVehiculo();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $strTextMens = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->danger($strTextMens);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            $this->mctVehiculo->DeleteVehiculo();
            $arrLogxCamb['strNombTabl'] = 'Vehiculo';
            $arrLogxCamb['intRefeRegi'] = $this->mctVehiculo->Vehiculo->CodiVehi;
            $arrLogxCamb['strNombRegi'] = $this->mctVehiculo->Vehiculo->DescVehi;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// vehiculo_edit.tpl.php as the included HTML template file
VehiculoEditForm::Run('VehiculoEditForm');
?>