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
    protected $dtgSucuAsoc;
    protected $colSucuSele;
    protected $arrSucuSele;
    
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

		$this->cargarSucursalesSeleccionadas();

		$this->dtgSucuAsoc_Create();

		/*
        $this->dtgSucuAsoc = $this->mctSdeOperacion->dtgSucuAsoc_Create();
        $this->dtgSucuAsoc->Name = 'Sucursales';
		$this->dtgSucuAsoc->ItemsPerPage = $intCantSucu;
		*/

		if ($this->mctSdeOperacion->EditMode) {
            $this->lstTipoRuta_Change();
        }
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function cargarSucursalesSeleccionadas() {
        $this->arrSucuSele = $this->mctSdeOperacion->SdeOperacion->GetSucursalesAsOperacionDestinoArray();
    }

    protected function dtgSucuAsoc_Create() {
        $this->dtgSucuAsoc = new SucursalesDataGrid($this);
        $this->dtgSucuAsoc->FontSize = 13;
        $this->dtgSucuAsoc->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgSucuAsoc->CssClass = 'datagrid';
        $this->dtgSucuAsoc->AlternateRowStyle->CssClass = 'alternate';

        
        // Add Pagination (if desired)
        $objClauWher[] = QQ::Equal(QQN::Sucursales()->EsExport,false);
        $objClauWher[] = QQ::IsNull(QQN::Sucursales()->DeletedAt);
        //$intCantSucu   = Sucursales::QueryCount(QQ::AndCondition($objClauWher));

        $this->dtgSucuAsoc->Paginator = new QPaginator($this->dtgSucuAsoc);
        $this->dtgSucuAsoc->ItemsPerPage = 50;

        $this->dtgSucuAsoc->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Higlight the datagrid rows when mousing over them
        //$this->dtgSucuAsoc->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        //$this->dtgSucuAsoc->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        /*$this->dtgSucuAsoc->RowActionParameterHtml = '<?= $_ITEM->Id ?>';*/
        //$this->dtgSucuAsoc->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSucuAsocRow_Click'));

        $this->dtgSucuAsoc->SortColumnIndex = 1;

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        $this->colSucuSele = new QCheckBoxColumn('', $this->dtgSucuAsoc);
        $this->colSucuSele->PrimaryKey = 'Id';
        $this->colSucuSele->Width = 60;
        $this->colSucuSele->SetCheckboxCallback($this,'colMarcarSeleccion');
        $this->dtgSucuAsoc->AddColumn($this->colSucuSele);

        // Create the Other Columns (note that you can use strings for sucursales's properties, or you
        // can traverse down QQN::sucursales() to display fields that are down the hierarchy)
        $this->dtgSucuAsoc->MetaAddColumn('Id');
        //$this->dtgSucuAsoc->MetaAddColumn('Iata');
        $this->dtgSucuAsoc->MetaAddColumn('Nombre');

    }

    public function colMarcarSeleccion(Sucursales $objSucursal, QCheckBox $ctl) {
        /* @var $objConcOpci Conceptos */
        t('Voy a evaluar si '.$objSucursal->Nombre.' ('.$objSucursal->Id.') esta en el vector');
        foreach ($this->arrSucuSele as $objSucuSele) {
            t('Comparando con: '.$objSucuSele->Id);
            if ($objSucuSele->Id == $objSucursal->Id) {
                $ctl->Checked = true;
                break;
            }
        }
    }


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
            $this->dtgSucuAsoc->Visible = true;
            //----------------------------------------------------------
            // Si es Extra-Urbana, se muestran solo las Rutas Foraneas
            //----------------------------------------------------------
            $objClauWher[] = QQ::Equal(QQN::Rutas()->TipoId,TipoRutaType::FORANEA);
        } else {
            //----------------------------------------------------------
            // Si es Urbana, se muestran solo las Rutas Locales
            //----------------------------------------------------------
            $objClauWher[] = QQ::Equal(QQN::Rutas()->TipoId,TipoRutaType::LOCAL);
            $this->dtgSucuAsoc->Visible = false;
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
		try {
            $this->mctSdeOperacion->SaveSdeOperacion();
            //---------------------------------------------
            // Se guardan también la Sucursales asociadas
            //---------------------------------------------
            $this->mctSdeOperacion->SdeOperacion->UnassociateAllSucursalesesAsOperacionDestino();
            $arrIdxxSele = $this->colSucuSele->GetChangedIds(true);
            $arrIdxxSele = $this->colSucuSele->GetSelectedIds();
            $arrSucuSele = Sucursales::QueryArray(QQ::In(QQN::Sucursales()->Id, array_keys($arrIdxxSele)));
            foreach ($arrSucuSele as $objSucuSele) {
                $this->mctSdeOperacion->SdeOperacion->AssociateSucursalesAsOperacionDestino($objSucuSele);
            }
		} catch (Exception $e) {
		    $this->danger('Error: '.$e->getMessage());
		    return;
		}
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