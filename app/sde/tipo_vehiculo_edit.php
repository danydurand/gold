<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TipoVehiculoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the TipoVehiculo class.  It uses the code-generated
 * TipoVehiculoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a TipoVehiculo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tipo_vehiculo_edit.php AND
 * tipo_vehiculo_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TipoVehiculoEditForm extends TipoVehiculoEditFormBase {

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
        $this->lblTituForm->Text  = 'Tipo de Vehículo';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the TipoVehiculoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctTipoVehiculo = TipoVehiculoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on TipoVehiculo's data fields
        $this->txtTipoVehi = $this->mctTipoVehiculo->txtTipoVehi_Create();
		$this->txtTipoVehi->Name = 'Tipo de Vehículo';

        $this->txtDescTipo = $this->mctTipoVehiculo->txtDescTipo_Create();
		$this->txtDescTipo->Name = 'Descripción';

		$this->txtCapacidadMaxima = $this->mctTipoVehiculo->txtCapacidadMaxima_Create();
		$this->txtCostoKm = $this->mctTipoVehiculo->txtCostoKm_Create();
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctTipoVehiculo->TipoVehiculo && !isset($_SESSION['DataTipoVehiculo'])) {
            $_SESSION['DataTipoVehiculo'] = serialize(array($this->mctTipoVehiculo->TipoVehiculo));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataTipoVehiculo']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->TipoVehi == $this->mctTipoVehiculo->TipoVehiculo->TipoVehi) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('TipoVehiculo',$this->mctTipoVehiculo->TipoVehiculo->TipoVehi);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/tipo_vehiculo_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/tipo_vehiculo_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/tipo_vehiculo_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/tipo_vehiculo_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctTipoVehiculo->TipoVehiculo;
		$this->mctTipoVehiculo->SaveTipoVehiculo();
		if ($this->mctTipoVehiculo->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctTipoVehiculo->TipoVehiculo;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'TipoVehiculo';
				$arrLogxCamb['intRefeRegi'] = $this->mctTipoVehiculo->TipoVehiculo->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctTipoVehiculo->TipoVehiculo->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tipo_vehiculo_edit.php/'.$this->mctTipoVehiculo->TipoVehiculo->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'TipoVehiculo';
			$arrLogxCamb['intRefeRegi'] = $this->mctTipoVehiculo->TipoVehiculo->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctTipoVehiculo->TipoVehiculo->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tipo_vehiculo_edit.php/'.$this->mctTipoVehiculo->TipoVehiculo->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctTipoVehiculo->TablasRelacionadasTipoVehiculo();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctTipoVehiculo->DeleteTipoVehiculo();
            $arrLogxCamb['strNombTabl'] = 'TipoVehiculo';
            $arrLogxCamb['intRefeRegi'] = $this->mctTipoVehiculo->TipoVehiculo->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctTipoVehiculo->TipoVehiculo->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// tipo_vehiculo_edit.tpl.php as the included HTML template file
TipoVehiculoEditForm::Run('TipoVehiculoEditForm');
?>