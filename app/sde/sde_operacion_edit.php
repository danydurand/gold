<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SdeOperacionEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the SdeOperacion class.  It uses the code-generated
 * SdeOperacionMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a SdeOperacion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sde_operacion_edit.php AND
 * sde_operacion_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SdeOperacionEditForm extends SdeOperacionEditFormBase {

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
        
        $this->lblTituForm->Text  = 'Operación';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the SdeOperacionMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctSdeOperacion = SdeOperacionMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on SdeOperacion's data fields
        $this->lblCodiOper = $this->mctSdeOperacion->lblCodiOper_Create();
		$this->lblCodiOper->Name = 'Id';

        $this->lstCodiTipoObject = $this->mctSdeOperacion->lstCodiTipoObject_Create();
        $this->lstCodiTipoObject->Width = 160;
        $this->lstCodiTipoObject->Name = 'Tipo de Ruta';
        $this->lstCodiTipoObject->AddAction(new QChangeEvent(), new QAjaxAction('lstTipoRuta_Change'));

        $objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::IsNull(QQN::Rutas()->DeletedAt);
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Rutas()->Codigo);
        $this->lstRuta = $this->mctSdeOperacion->lstRuta_Create(null,QQ::AndCondition($objClauWher),$objClauOrde);
        $this->lstRuta->Width = 200;

        $this->lstCodiChofObject = $this->mctSdeOperacion->lstCodiChofObject_Create();
        $this->lstCodiChofObject->Width = 200;
		$this->lstCodiChofObject->Name = 'Chofer';

        $this->lstCodiVehiObject = $this->mctSdeOperacion->lstCodiVehiObject_Create();
        $this->lstCodiVehiObject->Width = 200;
		$this->lstCodiVehiObject->Name = 'Vehículo';

        $this->lstSucursal = $this->mctSdeOperacion->lstSucursal_Create();
        $this->lstSucursal->Name = 'Sucursal';
        $this->lstSucursal->Width = 200;

        $this->lstExpresoNacionalObject = $this->mctSdeOperacion->lstExpresoNacionalObject_Create();
        $this->lstExpresoNacionalObject->Width = 160;
		$this->lstExpresoNacionalObject->Name = 'Retail';

		$intCantSucu = Sucursales::CountSucursalesActivas();
        $this->dtgSucursalesesAsOperacionDestino = $this->mctSdeOperacion->dtgSucursalesesAsOperacionDestino_Create();
        $this->dtgSucursalesesAsOperacionDestino->Name = 'Sucursales';
		$this->dtgSucursalesesAsOperacionDestino->ItemsPerPage = $intCantSucu + 1;

		if ($this->mctSdeOperacion->EditMode) {
            $this->lstTipoRuta_Change();
        }
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctSdeOperacion->SdeOperacion && !isset($_SESSION['DataSdeOperacion'])) {
            $_SESSION['DataSdeOperacion'] = serialize(array($this->mctSdeOperacion->SdeOperacion));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataSdeOperacion']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiOper == $this->mctSdeOperacion->SdeOperacion->CodiOper) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = TextoIcono('file-text-o','Hist','','fa-lg');
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('SdeOperacion',$this->mctSdeOperacion->SdeOperacion->CodiOper);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function lstTipoRuta_Change() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNull(QQN::Rutas()->DeletedAt);
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Rutas()->Codigo);
        if ($this->lstCodiTipoObject->SelectedName == 'EXTRA-URBANA') {
            $this->dtgSucursalesesAsOperacionDestino->Visible = true;
            //----------------------------------------------------------
            // Si es Extra-Urbana, se muestran solo las Rutas Foraneas
            //----------------------------------------------------------
            $objClauWher[] = QQ::Equal(QQN::Rutas()->TipoId,TipoRutaType::FORANEA);
        } else {
            //----------------------------------------------------------
            // Si es Urbana, se muestran solo las Rutas Locales
            //----------------------------------------------------------
            $objClauWher[] = QQ::Equal(QQN::Rutas()->TipoId,TipoRutaType::LOCAL);
            $this->dtgSucursalesesAsOperacionDestino->Visible = false;
        }
        $this->lstRuta->RemoveAllItems();
        $arrRutaTipo = Rutas::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantRuta = count($arrRutaTipo);
        $this->lstRuta->AddItem('- Seleccione -('.$intCantRuta.')');
        foreach ($arrRutaTipo as $objRutaTipo) {
            $blnSeleRegi = false;
            if ($this->mctSdeOperacion->EditMode) {
                if ($objRutaTipo->Id == $this->mctSdeOperacion->SdeOperacion->RutaId) {
                    $blnSeleRegi = true;
                }
            }
            $this->lstRuta->AddItem($objRutaTipo->__toString(), $objRutaTipo->Id, $blnSeleRegi);
        }
    }

    protected function btnLogxCamb_Click() {
        $_SESSION['RegiRefe'] = $this->mctSdeOperacion->SdeOperacion->CodiOper;
        $_SESSION['TablRefe'] = 'SdeOperacion';
        $_SESSION['RegiReto'] = 'sde_operacion_edit.php/'.$this->mctSdeOperacion->SdeOperacion->CodiOper;
        QApplication::Redirect(__SIST__.'/log_list.php');
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/sde_operacion_edit.php/'.$objRegiTabl->CodiOper);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/sde_operacion_edit.php/'.$objRegiTabl->CodiOper);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/sde_operacion_edit.php/'.$objRegiTabl->CodiOper);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/sde_operacion_edit.php/'.$objRegiTabl->CodiOper);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctSdeOperacion->SdeOperacion;
		$this->mctSdeOperacion->SaveSdeOperacion();
        $strDescOper  = $this->mctSdeOperacion->SdeOperacion->Ruta->Codigo.' | ';
        $strDescOper .= $this->mctSdeOperacion->SdeOperacion->CodiTipoObject->DescTipo;
		if ($this->mctSdeOperacion->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctSdeOperacion->SdeOperacion;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'SdeOperacion';
				$arrLogxCamb['intRefeRegi'] = $this->mctSdeOperacion->SdeOperacion->CodiOper;
				$arrLogxCamb['strNombRegi'] = $strDescOper;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sde_operacion_edit.php/'.$this->mctSdeOperacion->SdeOperacion->CodiOper;
				LogDeCambios($arrLogxCamb);
            }
            $this->success('Transacción Exitosa !!!');
        } else {
			$arrLogxCamb['strNombTabl'] = 'SdeOperacion';
			$arrLogxCamb['intRefeRegi'] = $this->mctSdeOperacion->SdeOperacion->CodiOper;
			$arrLogxCamb['strNombRegi'] = $strDescOper;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/sde_operacion_edit.php/'.$this->mctSdeOperacion->SdeOperacion->CodiOper;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        /*
        $arrTablRela = $this->mctSdeOperacion->TablasRelacionadasSdeOperacion();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $strMensUsua = sprintf('Existen registros relacionados en %s',$strTablRela);

            $this->mensaje($strMensUsua,'','w','exclamation-triangle');
            $blnTodoOkey = false;
        }
        */
        if ($blnTodoOkey) {
            //$this->mctSdeOperacion->DeleteSdeOperacion();

            $this->mctSdeOperacion->SdeOperacion->DeletedAt = new QDateTime(QDateTime::Now);
            $this->mctSdeOperacion->SdeOperacion->Save();
            $strDescOper  = $this->mctSdeOperacion->SdeOperacion->Ruta->Codigo.' | ';
            $strDescOper .= $this->mctSdeOperacion->SdeOperacion->CodiTipoObject->DescTipo;
            $arrLogxCamb['strNombTabl'] = 'Operacion';
            $arrLogxCamb['intRefeRegi'] = $this->mctSdeOperacion->SdeOperacion->CodiOper;
            $arrLogxCamb['strNombRegi'] = $strDescOper;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// sde_operacion_edit.tpl.php as the included HTML template file
SdeOperacionEditForm::Run('SdeOperacionEditForm');
?>