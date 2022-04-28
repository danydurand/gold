<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TarifaExpEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the TarifaExp class.  It uses the code-generated
 * TarifaExpMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a TarifaExp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_exp_edit.php AND
 * tarifa_exp_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaExpEditForm extends TarifaExpEditFormBase {

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the TarifaExpMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctTarifaExp = TarifaExpMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on TarifaExp's data fields
		$this->lblId        = $this->mctTarifaExp->lblId_Create();
		$this->txtNombre    = $this->mctTarifaExp->txtNombre_Create();
		$this->lstProducto  = $this->mctTarifaExp->lstProducto_Create();
		$this->chkIsPublica = $this->mctTarifaExp->chkIsPublica_Create();
		$this->chkIsPublica->Name = 'Publica ?';
		$this->calFecha     = $this->mctTarifaExp->calFecha_Create();
		$this->txtMonto     = $this->mctTarifaExp->txtMonto_Create();
		$this->txtMinimo    = $this->mctTarifaExp->txtMinimo_Create();
		$this->txtMinimo->Name = 'Peso Mínimo';
		//$this->lblCreatedAt = $this->mctTarifaExp->lblCreatedAt_Create();
		//$this->lblUpdatedAt = $this->mctTarifaExp->lblUpdatedAt_Create();
		//$this->txtCreatedBy = $this->mctTarifaExp->txtCreatedBy_Create();
		//$this->txtCreatedBy = disableControl($this->txtCreatedBy);
        //$this->txtUpdatedBy = $this->mctTarifaExp->txtUpdatedBy_Create();
        //$this->txtUpdatedBy = disableControl($this->txtUpdatedBy);

        //if (!$this->mctTarifaExp->EditMode) {
		//    $this->txtCreatedBy->Text = $this->objUsuario->CodiUsua;
        //} else {
        //    $this->txtUpdatedBy->Text = $this->objUsuario->CodiUsua;
        //}

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctTarifaExp->TarifaExp && !isset($_SESSION['DataTarifaExp'])) {
            $_SESSION['DataTarifaExp'] = serialize(array($this->mctTarifaExp->TarifaExp));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataTarifaExp']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctTarifaExp->TarifaExp->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('TarifaExp',$this->mctTarifaExp->TarifaExp->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/tarifa_exp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/tarifa_exp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/tarifa_exp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/tarifa_exp_edit.php/'.$objRegiTabl->Id);
    }


    protected function ExisteOtraTarifaPublica() {
        $blnMarcPubl = $this->chkIsPublica->Checked;
        if ($blnMarcPubl == true) {
            $intProdIdxx   = $this->lstProducto->SelectedValue;
            $objClauWher[] = QQ::Equal(QQN::TarifaExp()->ProductoId, $intProdIdxx);
            $objClauWher[] = QQ::Equal(QQN::TarifaExp()->IsPublica, true);
            $objClauWher[] = QQ::NotEqual(QQN::TarifaExp()->Id, $this->mctTarifaExp->TarifaExp->Id);
            return TarifaExp::QueryCount(QQ::AndCondition($objClauWher));
        }
        return false;
    }

    protected function Form_Validate() {
	    $this->mensaje();
        if (strlen(trim($this->txtNombre->Text)) == 0) {
            $this->danger('El nombre de la Tarifa es requerido');
            return false;
        }
        if (is_null($this->lstProducto->SelectedValue)) {
            $this->danger('El Producto es requerido');
            return false;
        }
        if (is_null($this->lstProducto->SelectedValue)) {
            $this->danger('El Producto es requerido');
            return false;
        }
        if ($this->ExisteOtraTarifaPublica()) {
            $this->danger('Ya existe una Tarifa Pública para este Producto.  Solo puede haber una !!');
            return false;
        }
        if (is_null($this->calFecha->DateTime)) {
            $this->danger('La Fecha de Vigencia es requerida');
            return false;
        }
        if (strlen(trim($this->txtMonto->Text)) == 0) {
            $this->danger('El Monto de la Tarifa es requerido');
            return false;
        }
        if (strlen(trim($this->txtMinimo->Text)) == 0) {
            $this->danger('El Peso Mínimo es requerido');
            return false;
        }
        t('Sali por el true');
        return true;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if ($this->mctTarifaExp->EditMode) {
            $this->mctTarifaExp->TarifaExp->UpdatedAt = new QDateTime(QDateTime::Now);
            $this->mctTarifaExp->TarifaExp->UpdatedBy = $this->objUsuario->CodiUsua;
        } else {
            $this->mctTarifaExp->TarifaExp->CreatedAt = new QDateTime(QDateTime::Now);
            $this->mctTarifaExp->TarifaExp->CreatedBy = $this->objUsuario->CodiUsua;
        }
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctTarifaExp->TarifaExp;
        try {
            $this->mctTarifaExp->SaveTarifaExp();
        } catch (Exception $e) {
            t('Error: '.$e->getMessage());
            $this->danger('Error: '.$e->getMessage());
        }
        if ($this->mctTarifaExp->EditMode) {
            //---------------------------------------------------------------------
            // Si estamos en modo Edicion, entonces se verifican la existencia
            // de algun cambio en algun dato
            //---------------------------------------------------------------------
            $objRegiNuev = $this->mctTarifaExp->TarifaExp;
            $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
            if ($objResuComp->FriendlyComparisonStatus == 'different') {
                //------------------------------------------
                // En caso de que el objeto haya cambiado
                //------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'TarifaExp';
                $arrLogxCamb['intRefeRegi'] = $this->mctTarifaExp->TarifaExp->Id;
                $arrLogxCamb['strNombRegi'] = $this->mctTarifaExp->TarifaExp->Nombre;
                $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_exp_edit.php/'.$this->mctTarifaExp->TarifaExp->Id;
                LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
            } else {
                $this->warning('No hay cambios !!!');
            }
        } else {
            $arrLogxCamb['strNombTabl'] = 'TarifaExp';
            $arrLogxCamb['intRefeRegi'] = $this->mctTarifaExp->TarifaExp->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctTarifaExp->TarifaExp->Nombre;
            $arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_exp_edit.php/'.$this->mctTarifaExp->TarifaExp->Id;
            LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
        }
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctTarifaExp->TablasRelacionadasTarifaExp();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en '.$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctTarifaExp->DeleteTarifaExp();
            $arrLogxCamb['strNombTabl'] = 'TarifaExp';
            $arrLogxCamb['intRefeRegi'] = $this->mctTarifaExp->TarifaExp->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctTarifaExp->TarifaExp->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// tarifa_exp_edit.tpl.php as the included HTML template file
TarifaExpEditForm::Run('TarifaExpEditForm');
?>