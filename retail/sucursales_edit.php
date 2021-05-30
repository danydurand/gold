<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SucursalesEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Sucursales class.  It uses the code-generated
 * SucursalesMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Sucursales columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sucursales_edit.php AND
 * sucursales_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SucursalesEditForm extends SucursalesEditFormBase {

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
		// Use the CreateFromPathInfo shortcut (this can also be done manually using the SucursalesMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctSucursales = SucursalesMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Sucursales's data fields
		$this->lblId = $this->mctSucursales->lblId_Create();
		$this->txtNombre = $this->mctSucursales->txtNombre_Create();
		$this->txtIata = $this->mctSucursales->txtIata_Create();
		$this->txtIata->Width = 50;
		$this->txtTelefono = $this->mctSucursales->txtTelefono_Create();
		$this->lstEstado = $this->mctSucursales->lstEstado_Create();
		$this->txtZona = $this->mctSucursales->txtZona_Create();
		$this->txtZona->Width = 40;
		$this->chkEsExport = $this->mctSucursales->chkEsExport_Create();
		$this->chkEsExenta = $this->mctSucursales->chkEsExenta_Create();
		$this->chkEsPrincipal = $this->mctSucursales->chkEsPrincipal_Create();
		$this->chkEsAreaMetropolitana = $this->mctSucursales->chkEsAreaMetropolitana_Create();
		$this->chkEsAlmacen = $this->mctSucursales->chkEsAlmacen_Create();
		$this->chkEsTienda = $this->mctSucursales->chkEsTienda_Create();
		$this->txtEmailPrincipal = $this->mctSucursales->txtEmailPrincipal_Create();
		$this->txtEmailPrincipal->Width = 400;
		$this->txtEmailAlmacen = $this->mctSucursales->txtEmailAlmacen_Create();
		$this->txtEmailAlmacen->Width = 400;
		$this->txtZonaNc = $this->mctSucursales->txtZonaNc_Create();
		$this->txtZonaNc->Width = 400;
		$this->txtComisionVenta = $this->mctSucursales->txtComisionVenta_Create();
		$this->txtComisionVenta->Width = 50;
		$this->txtComisionEntrega = $this->mctSucursales->txtComisionEntrega_Create();
		$this->txtComisionEntrega->Width = 50;
		//$this->lblCreatedAt = $this->mctSucursales->lblCreatedAt_Create();
		//$this->lblUpdatedAt = $this->mctSucursales->lblUpdatedAt_Create();
		//$this->lblDeletedAt = $this->mctSucursales->lblDeletedAt_Create();
		//$this->txtCreatedBy = $this->mctSucursales->txtCreatedBy_Create();
		//$this->txtUpdatedBy = $this->mctSucursales->txtUpdatedBy_Create();
		//$this->txtDeletedBy = $this->mctSucursales->txtDeletedBy_Create();
        //$this->dtgSdeOperacionsAsOperacionDestino = $this->mctSucursales->dtgSdeOperacionsAsOperacionDestino_Create();

        if (!$this->mctSucursales->EditMode) {
            $this->chkEsTienda->Checked = true;
            $this->chkEsAlmacen->Checked = true;
            $this->txtTelefono->Text = '5555555';
        }

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctSucursales->Sucursales && !isset($_SESSION['DataSucursales'])) {
            $_SESSION['DataSucursales'] = serialize(array($this->mctSucursales->Sucursales));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataSucursales']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctSucursales->Sucursales->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Sucursales',$this->mctSucursales->Sucursales->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/sucursales_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/sucursales_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/sucursales_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/sucursales_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctSucursales->Sucursales;
		$this->mctSucursales->SaveSucursales();
		if ($this->mctSucursales->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctSucursales->Sucursales;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Sucursales';
				$arrLogxCamb['intRefeRegi'] = $this->mctSucursales->Sucursales->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctSucursales->Sucursales->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sucursales_edit.php/'.$this->mctSucursales->Sucursales->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Sucursales';
			$arrLogxCamb['intRefeRegi'] = $this->mctSucursales->Sucursales->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctSucursales->Sucursales->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sucursales_edit.php/'.$this->mctSucursales->Sucursales->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctSucursales->TablasRelacionadasSucursales();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctSucursales->DeleteSucursales();
            $arrLogxCamb['strNombTabl'] = 'Sucursales';
            $arrLogxCamb['intRefeRegi'] = $this->mctSucursales->Sucursales->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctSucursales->Sucursales->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// sucursales_edit.tpl.php as the included HTML template file
SucursalesEditForm::Run('SucursalesEditForm');
?>