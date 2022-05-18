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
    protected $dtgTariDest;
    protected $lstTariDest;
    protected $txtMontTari;
    protected $txtMontMini;
    protected $calFechVige;
    protected $btnSaveTari;
    protected $btnDeleTari;
    protected $btnAgreTari;

    protected $lblTariDest;
    protected $lblMontTari;
    protected $lblMontMini;
    protected $lblFechVige;
    protected $lblAcciTari;
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
	
        if ($this->mctTarifaExp->EditMode) {
            $this->lblTariDest_Create();
            $this->lblMontTari_Create();
            $this->lblMontMini_Create();
            $this->lblFechVige_Create();
            $this->lblAcciTari_Create();

            $this->dtgTariDest_Create();
            $this->lstTariDest_Create();
            $this->txtMontTari_Create();
            $this->txtMontMini_Create();
            $this->calFechVige_Create();
            $this->btnSaveTari_Create();
            $this->btnDeleTari_Create();
        }


    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function dtgTariDest_Create() {

        // Instantiate the Meta DataGrid
        $this->dtgTariDest = new TarifaExpDestinoDataGrid($this);
        $this->dtgTariDest->FontSize = 13;
        $this->dtgTariDest->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgTariDest->CssClass = 'datagrid';
        $this->dtgTariDest->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgTariDest->Paginator = new QPaginator($this->dtgTariDest);
        $this->dtgTariDest->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgTariDest->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgTariDest->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $objClauWher[] = QQ::Equal(QQN::TarifaExpDestino()->TarifaId, $this->mctTarifaExp->TarifaExp->Id);
        $this->dtgTariDest->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgTariDest->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgTariDest->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTariDestRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for tarifa_aliados's properties, or you
        // can traverse down QQN::tarifa_aliados() to display fields that are down the hierarchy)
        $this->dtgTariDest->MetaAddColumn('Id');
        $this->dtgTariDest->MetaAddColumn(QQN::TarifaExpDestino()->Destino);
        $this->dtgTariDest->MetaAddColumn('Monto');
        $this->dtgTariDest->MetaAddColumn('Minimo');
        $this->dtgTariDest->MetaAddColumn('FechaVigencia');
        $this->dtgTariDest->MetaAddColumn('CreatedAt','Name=F.Creacion');
        $colUsuaCrea = new QDataGridColumn('CREAD@ POR','<?= $_ITEM->CreatedByObject->__toString() ?>');
        $this->dtgTariDest->AddColumn($colUsuaCrea);

    }

    protected function lblTariDest_Create() {
        $this->lblTariDest = new QLabel($this);
        $this->lblTariDest->Text = 'Destino';
    }

    protected function lblMontTari_Create() {
        $this->lblMontTari = new QLabel($this);
        $this->lblMontTari->Text = 'Monto';
    }

    protected function lblMontMini_Create() {
        $this->lblMontMini = new QLabel($this);
        $this->lblMontMini->Text = 'P.Minimo';
    }

    protected function lblFechVige_Create() {
        $this->lblFechVige = new QLabel($this);
        $this->lblFechVige->Text = 'F.Vigencia';
    }

    protected function lblAcciTari_Create() {
        $this->lblAcciTari = new QLabel($this);
        $this->lblAcciTari->Text = 'Guardar';
    }

    protected function lstTariDest_Create() {
        $this->lstTariDest = new QListBox($this);
        $this->cargarDestinos();
    }

    protected function txtMontTari_Create() {
        $this->txtMontTari = new QTextBox($this);
        $this->txtMontTari->Width = 80;
    }

    protected function txtMontMini_Create() {
        $this->txtMontMini = new QTextBox($this);
        $this->txtMontMini->Width = 80;
    }

    protected function calFechVige_Create() {
        $this->calFechVige = new QTextBox($this);
        $this->calFechVige->Width = 80;
    }

    protected function cargarDestinos($intDestIdxx=null) {
        $this->lstTariDest->RemoveAllItems();
        $this->lstTariDest->AddItem('- Seleccione -', null);
        $objClauOrde[] = QQ::OrderBy(QQN::Sucursales()->Nombre);
        $arrDestExpo   = Sucursales::LoadSucursalesActivas('Nombre','exp');
        foreach ($arrDestExpo as $objDestExpo) {
            $blnSeleRegi = $intDestIdxx == $objDestExpo->Id;
            $this->lstTariDest->AddItem($objDestExpo->__toString(), $objDestExpo->Id, $blnSeleRegi);
        }
        $this->lstTariDest->Width = 120;
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

    protected function dtgTariDestRow_Click($strFormId, $strControlId, $strParameter) {
        $this->intTariIdxx = intval($strParameter);
        $objTariDest = TarifaExpDestino::Load($this->intTariIdxx);
        $this->cargarDestinos($objTariDest->DestinoId);
        $this->txtMontTari->Text     = $objTariDest->Monto;
        $this->txtMontMini->Text     = $objTariDest->Minimo;
        $this->calFechVige->Text     = $objTariDest->FechaVigencia->__toString("DD/MM/YYYY");
        $this->btnDeleTari->Visible  = true;
        $this->lblAcciTari->Text     = 'Actualizar';
    }

    protected function btnDeleTari_Click() {
        $objTariDest = TarifaExpDestino::Load($this->intTariIdxx);
        if (isset($objTariDest)) {
            $objTariDest->Delete();
            $this->dtgTariDest->Refresh();
            $this->btnDeleTari->Visible = false;
            $this->lblAcciTari->Text = 'Guardar';
            $this->limpiarCamposTarifa();
            $this->mensaje();
        }
    }

    protected function estaRepetido($intDestIdxx) {
        $objClauWher[] = QQ::Equal(QQN::TarifaExpDestino()->TarifaId, $this->mctTarifaExp->TarifaExp->Id);
        $objClauWher[] = QQ::Equal(QQN::TarifaExpDestino()->DestinoId, $intDestIdxx);
        return TarifaExpDestino::QueryCount(QQ::AndCondition($objClauWher));
    }


    protected function btnSaveTari_Click() {
        $this->mensaje();
        $intDestIdxx = $this->lstTariDest->SelectedValue;
        if (is_null($this->intTariIdxx)) {
            //------------
            // Insercion
            //------------
            if (!$this->estaRepetido($intDestIdxx)) {
                try {
                    $objTariDest = new TarifaExpDestino();
                    $objTariDest->TarifaId      = $this->mctTarifaExp->TarifaExp->Id;
                    $objTariDest->DestinoId     = $this->lstTariDest->SelectedValue;
                    $objTariDest->Monto         = (float)$this->txtMontTari->Text;
                    $objTariDest->Minimo        = (float)$this->txtMontMini->Text;
                    $objTariDest->FechaVigencia = new QDateTime(transformaFecha($this->calFechVige->Text));
                    $objTariDest->CreatedAt     = new QDateTime(QDateTime::Now);
                    $objTariDest->CreatedBy     = $this->objUsuario->CodiUsua;
                    $objTariDest->Save();
                    $this->dtgTariDest->Refresh();
                } catch (Exception $e) {
                    t('Error: '.$e->getMessage());
                    $this->danger('Error: '.$e->getMessage());
                }
            } else {
                $this->danger('Ya existe una Tarifa para el Destino seleccionado');
            }
        } else {
            //---------------
            // Modificacion
            //---------------
            try {
                $objTariDest = TarifaExpDestino::Load($this->intTariIdxx);
                $objTariDest->TarifaId      = $this->mctTarifaExp->TarifaExp->Id;
                $objTariDest->DestinoId     = $this->lstTariDest->SelectedValue;
                $objTariDest->Monto         = (float)$this->txtMontTari->Text;
                $objTariDest->Minimo        = (float)$this->txtMontMini->Text;
                $objTariDest->FechaVigencia = new QDateTime(transformaFecha($this->calFechVige->Text));
                $objTariDest->UpdatedAt     = new QDateTime(QDateTime::Now);
                $objTariDest->UpdatedBy     = $this->objUsuario->CodiUsua;
                $objTariDest->Save();
                $this->btnDeleTari->Visible = false;
                $this->dtgTariDest->Refresh();
            } catch (Exception $e) {
                t('Error: '.$e->getMessage());
                $this->danger('Error: '.$e->getMessage());
            }
        }
        $this->limpiarCamposTarifa();
    }

    protected function limpiarCamposTarifa() {
        $this->cargarDestinos();
        $this->txtMontTari->Text     = null;
        $this->txtMontMini->Text     = null;
        $this->calFechVige->Text = null;
        $this->intTariIdxx           = null;
    }

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
//        if (strlen(trim($this->txtMonto->Text)) == 0) {
//            $this->danger('El Monto de la Tarifa es requerido');
//            return false;
//        }
//        if (strlen(trim($this->txtMinimo->Text)) == 0) {
//            $this->danger('El Peso Mínimo es requerido');
//            return false;
//        }
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