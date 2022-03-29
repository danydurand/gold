<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/AliadoComercialEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the AliadoComercial class.  It uses the code-generated
 * AliadoComercialMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a AliadoComercial columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both aliado_comercial_edit.php AND
 * aliado_comercial_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class AliadoComercialEditForm extends AliadoComercialEditFormBase {
    protected $dtgTariAlia;
    protected $lstTariAlia;
    protected $btnSaveTari;
    protected $btnDeleTari;
    protected $btnAgreTari;

    protected $lblTariAlia;
    protected $lblAcciAlia;
    protected $intTariIdxx;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the AliadoComercialMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctAliadoComercial = AliadoComercialMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on AliadoComercial's data fields
		$this->lblId = $this->mctAliadoComercial->lblId_Create();
		$this->txtRazonSocial = $this->mctAliadoComercial->txtRazonSocial_Create();
		$this->txtRazonSocial->Width = 250;
		$this->txtNroRif = $this->mctAliadoComercial->txtNroRif_Create();
		$this->txtNroRif->Width = 110;
		$this->txtDireccionFiscal = $this->mctAliadoComercial->txtDireccionFiscal_Create();
		$this->txtDireccionFiscal->Width = 250;
		$this->txtDireccionFiscal->TextMode = QTextMode::MultiLine;
		$this->txtDireccionFiscal->Rows = 2;
		$this->txtContacto = $this->mctAliadoComercial->txtContacto_Create();
		$this->txtContacto->Width = 250;
		$this->txtTelefono = $this->mctAliadoComercial->txtTelefono_Create();
		$this->txtEmail = $this->mctAliadoComercial->txtEmail_Create();
		$this->txtEmail->Width = 250;
		$this->chkIsActivo = $this->mctAliadoComercial->chkIsActivo_Create();
		$this->chkIsActivo->Name = 'Activo ?';
		$this->lstSucursal = $this->mctAliadoComercial->lstSucursal_Create();
		
		if ($this->mctAliadoComercial->EditMode) {
            $this->dtgTariAlia_Create();
            $this->lstTariAlia_Create();
            $this->btnAgreTari_Create();
            $this->btnSaveTari_Create();
            $this->btnDeleTari_Create();

            $this->lblTariAlia_Create();
            $this->lblAcciAlia_Create();
        }

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblAcciAlia_Create() {
        $this->lblAcciAlia = new QLabel($this);
        $this->lblAcciAlia->Text = 'Guardar';
    }

    protected function lblTariAlia_Create() {
        $this->lblTariAlia = new QLabel($this);
        $this->lblTariAlia->Text = 'Tarifa EXP';
    }

    protected function btnAgreTari_Create() {
        $this->btnAgreTari = new QButtonP($this);
        $this->btnAgreTari->Text = TextoIcono('plus-circle','','F','lg');
        $this->btnAgreTari->AddAction(new QClickEvent(), new QAjaxAction('btnAgreTari_Click'));
    }

    protected function btnSaveTari_Create() {
        $this->btnSaveTari = new QButtonS($this);
        $this->btnSaveTari->Text = TextoIcono('save','','F','lg');
        $this->btnSaveTari->AddAction(new QClickEvent(), new QAjaxAction('btnSaveTari_Click'));
    }

    protected function btnDeleTari_Create() {
        $this->btnDeleTari = new QButtonD($this);
        $this->btnDeleTari->Text = TextoIcono('trash','','F','lg');
        $this->btnDeleTari->AddAction(new QClickEvent(), new QAjaxAction('btnDeleTari_Click'));
        $this->btnDeleTari->Visible = false;
    }

    protected function lstTariAlia_Create() {
        $this->lstTariAlia = new QListBox($this);
        $this->cargarTarifas();
    }

    protected function cargarTarifas($intTariIdxx=null) {
	    $this->lstTariAlia->RemoveAllItems();
        $this->lstTariAlia->AddItem('- Seleccione -', null);
        $objClauOrde[] = QQ::OrderBy(QQN::TarifaExp()->CreatedAt,false);
        $arrTariExpo = TarifaExp::LoadAll($objClauOrde);
        foreach ($arrTariExpo as $objTariExpo) {
            $blnSeleRegi = $intTariIdxx == $objTariExpo->Id;
            $this->lstTariAlia->AddItem($objTariExpo->__toString(), $objTariExpo->Id, $blnSeleRegi);
        }
        $this->lstTariAlia->Width = 150;
    }

    protected function dtgTariAlia_Create() {

        // Instantiate the Meta DataGrid
        $this->dtgTariAlia = new TarifaAliadosDataGrid($this);
        $this->dtgTariAlia->FontSize = 13;
        $this->dtgTariAlia->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgTariAlia->CssClass = 'datagrid';
        $this->dtgTariAlia->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgTariAlia->Paginator = new QPaginator($this->dtgTariAlia);
        $this->dtgTariAlia->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgTariAlia->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgTariAlia->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $objClauWher[] = QQ::Equal(QQN::TarifaAliados()->AliadoId, $this->mctAliadoComercial->AliadoComercial->Id);
        $this->dtgTariAlia->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgTariAlia->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgTariAlia->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTariAliaRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for tarifa_aliados's properties, or you
        // can traverse down QQN::tarifa_aliados() to display fields that are down the hierarchy)
        $this->dtgTariAlia->MetaAddColumn('Id');
        $this->dtgTariAlia->MetaAddColumn(QQN::TarifaAliados()->TarifaExp);
        $colProdExpo = new QDataGridColumn('PRODUCTO','<?= $_ITEM->TarifaExp->Producto->__toString() ?>');
        $this->dtgTariAlia->AddColumn($colProdExpo);
        $this->dtgTariAlia->MetaAddColumn('CreatedAt','Name=F.Creacion');
        $colUsuaCrea = new QDataGridColumn('CREAD@ POR','<?= $_ITEM->CreatedByObject->__toString() ?>');
        $this->dtgTariAlia->AddColumn($colUsuaCrea);

    }


    protected function determinarPosicion() {
        if ($this->mctAliadoComercial->AliadoComercial && !isset($_SESSION['DataAliadoComercial'])) {
            $_SESSION['DataAliadoComercial'] = serialize(array($this->mctAliadoComercial->AliadoComercial));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataAliadoComercial']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctAliadoComercial->AliadoComercial->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function limpiarCamposTarifa() {
        $this->cargarTarifas();
        $this->intTariIdxx = null;
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('AliadoComercial',$this->mctAliadoComercial->AliadoComercial->Id);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function dtgTariAliaRow_Click($strFormId, $strControlId, $strParameter) {
        $this->intTariIdxx = intval($strParameter);
        $objTariAlia = TarifaAliados::Load($this->intTariIdxx);
        $this->cargarTarifas($objTariAlia->TarifaExp->Id);
        $this->btnDeleTari->Visible = true;
        $this->lblAcciAlia->Text = 'Actualizar';
    }

    protected function btnAgreTari_Click() {
	    $this->intTariIdxx = null;
	    $this->mensaje();
        $this->limpiarCamposTarifa();
        $this->btnDeleTari->Visible = false;
        $this->lblAcciAlia->Text = 'Guardar';
    }

    protected function btnDeleTari_Click() {
        $objTariAlia = TarifaAliados::Load($this->intTariIdxx);
        if (isset($objTariAlia)) {
            $objTariAlia->Delete();
            $this->dtgTariAlia->Refresh();
            $this->btnDeleTari->Visible = false;
            $this->lblAcciAlia->Text = 'Guardar';
            $this->limpiarCamposTarifa();
            $this->mensaje();
        }
    }

    protected function estaRepetido($intProdIdxx) {
        $objClauWher[] = QQ::Equal(QQN::TarifaAliados()->AliadoId, $this->mctAliadoComercial->AliadoComercial->Id);
        $objClauWher[] = QQ::Equal(QQN::TarifaAliados()->ProductoId, $intProdIdxx);
        return TarifaAliados::QueryCount(QQ::AndCondition($objClauWher));
    }

    protected function btnSaveTari_Click() {
	    $this->mensaje();
        $intTariIdxx = $this->lstTariAlia->SelectedValue;
        $objTariExpo = TarifaExp::Load($intTariIdxx);
        if (is_null($this->intTariIdxx)) {
            //------------
            // Insercion
            //------------
            if (!$this->estaRepetido($objTariExpo->ProductoId)) {
                try {
                    $objTariAlia = new TarifaAliados();
                    $objTariAlia->AliadoId    = $this->mctAliadoComercial->AliadoComercial->Id;
                    $objTariAlia->TarifaExpId = $this->lstTariAlia->SelectedValue;
                    $objTariAlia->ProductoId  = $objTariExpo->ProductoId;
                    $objTariAlia->CreatedAt   = new QDateTime(QDateTime::Now);
                    $objTariAlia->CreatedBy   = $this->objUsuario->CodiUsua;
                    $objTariAlia->Save();
                    $this->dtgTariAlia->Refresh();
                } catch (Exception $e) {
                    t('Error: '.$e->getMessage());
                    $this->danger('Error: '.$e->getMessage());
                }
            } else {
                $this->danger('Ya existe una Tarifa para Producto seleccionado');
            }
        } else {
            //---------------
            // Modificacion
            //---------------
            try {
                $objTariAlia = TarifaAliados::Load($this->intTariIdxx);
                $objTariAlia->AliadoId    = $this->mctAliadoComercial->AliadoComercial->Id;
                $objTariAlia->TarifaExpId = $this->lstTariAlia->SelectedValue;
                $objTariAlia->ProductoId  = $objTariExpo->ProductoId;
                $objTariAlia->UpdatedAt   = new QDateTime(QDateTime::Now);
                $objTariAlia->UpdatedBy   = $this->objUsuario->CodiUsua;
                $objTariAlia->Save();
                $this->btnDeleTari->Visible = false;
                $this->dtgTariAlia->Refresh();
            } catch (Exception $e) {
                t('Error: '.$e->getMessage());
                $this->danger('Error: '.$e->getMessage());
            }
        }
        $this->limpiarCamposTarifa();
    }


    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctAliadoComercial->AliadoComercial;
		$this->mctAliadoComercial->SaveAliadoComercial();
		if ($this->mctAliadoComercial->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctAliadoComercial->AliadoComercial;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'AliadoComercial';
				$arrLogxCamb['intRefeRegi'] = $this->mctAliadoComercial->AliadoComercial->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctAliadoComercial->AliadoComercial->RazonSocial;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/aliado_comercial_edit.php/'.$this->mctAliadoComercial->AliadoComercial->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'AliadoComercial';
			$arrLogxCamb['intRefeRegi'] = $this->mctAliadoComercial->AliadoComercial->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctAliadoComercial->AliadoComercial->RazonSocial;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/aliado_comercial_edit.php/'.$this->mctAliadoComercial->AliadoComercial->Id;
			LogDeCambios($arrLogxCamb);
            //$this->success('Transacción Exitosa !!!');
            QApplication::Redirect(__SIST__.'/aliado_comercial_edit.php/'.$this->mctAliadoComercial->AliadoComercial->Id);
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctAliadoComercial->TablasRelacionadasAliadoComercial();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctAliadoComercial->DeleteAliadoComercial();
            $arrLogxCamb['strNombTabl'] = 'AliadoComercial';
            $arrLogxCamb['intRefeRegi'] = $this->mctAliadoComercial->AliadoComercial->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctAliadoComercial->AliadoComercial->RazonSocial;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// aliado_comercial_edit.tpl.php as the included HTML template file
AliadoComercialEditForm::Run('AliadoComercialEditForm');
?>