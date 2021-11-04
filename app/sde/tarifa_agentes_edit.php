<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TarifaAgentesEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the TarifaAgentes class.  It uses the code-generated
 * TarifaAgentesMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a TarifaAgentes columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_agentes_edit.php AND
 * tarifa_agentes_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaAgentesEditForm extends TarifaAgentesEditFormBase {
    protected $dtgTariZona;

    protected $lblTituTari;
    protected $lblZonaTari;
    protected $lblServTari;
    protected $lblPrecTari;
    protected $lblMiniFact;
    protected $lblAcciTari;

    protected $blnAgreTari = true;
    protected $txtZonaTari;
    protected $lstServTari;
    protected $txtPrecTari;
    protected $txtMiniFact;
    protected $btnSaveTari;
    protected $btnCancTari;
    protected $btnDeleTari;
    protected $blnEditTari = false;
    protected $intEditTari;

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

		$this->lblTituForm->Text = 'Tarifa Agente';
		$this->objUsuario = unserialize($_SESSION['User']);

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the TarifaAgentesMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctTarifaAgentes = TarifaAgentesMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on TarifaAgentes's data fields
		$this->lblId = $this->mctTarifaAgentes->lblId_Create();
		$this->txtNombre = $this->mctTarifaAgentes->txtNombre_Create();
		$this->calFecha = $this->mctTarifaAgentes->calFecha_Create();
		$this->lblCreatedAt = $this->mctTarifaAgentes->lblCreatedAt_Create();
		$this->lblUpdatedAt = $this->mctTarifaAgentes->lblUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctTarifaAgentes->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctTarifaAgentes->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctTarifaAgentes->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctTarifaAgentes->txtDeletedBy_Create();

		$this->txtCreatedBy = disableControl($this->txtCreatedBy);
		$this->txtUpdatedBy = disableControl($this->txtUpdatedBy);

		$this->dtgTariZona_Create();

		$this->lblTituTari_Create();
		$this->lblZonaTari_Create();
		$this->lblServTari_Create();
		$this->lblPrecTari_Create();
		$this->lblMiniFact_Create();
		$this->lblAcciTari_Create();

        $this->txtZonaTari_Create();
        $this->lstServTari_Create();
        $this->txtPrecTari_Create();
        $this->txtMiniFact_Create();

        $this->btnSaveTari_Create();
        $this->btnCancTari_Create();
        $this->btnDeleTari_Create();


	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblTituTari_Create() {
        $this->lblTituTari = new QLabel($this);
        $this->lblTituTari->Text = 'Tarifas por Zona <i class="fa fa-plus-circle fa-lg"></i>';
        $this->lblTituTari->HtmlEntities = false;
        $this->lblTituTari->CssClass = 'titulo';
        $this->lblTituTari->AddAction(new QClickEvent(), new QAjaxAction('lblTituTari_Click'));
    }

    protected function lblZonaTari_Create() {
	    $this->lblZonaTari = new QLabel($this);
	    $this->lblZonaTari->Text = 'Zona';
	    $this->lblZonaTari->Visible = false;
    }

    protected function lblServTari_Create() {
	    $this->lblServTari = new QLabel($this);
	    $this->lblServTari->Text = 'Servicio';
	    $this->lblServTari->Visible = false;
    }

    protected function lblPrecTari_Create() {
	    $this->lblPrecTari = new QLabel($this);
	    $this->lblPrecTari->Text = 'Precio';
	    $this->lblPrecTari->Visible = false;
    }

    protected function lblMiniFact_Create() {
	    $this->lblMiniFact = new QLabel($this);
	    $this->lblMiniFact->Text = 'Min.Fact';
	    $this->lblMiniFact->Visible = false;
    }

    protected function lblAcciTari_Create() {
	    $this->lblAcciTari = new QLabel($this);
	    $this->lblAcciTari->Text = 'Acción';
	    $this->lblAcciTari->Visible = false;
    }

    protected function txtZonaTari_Create() {
	    $this->txtZonaTari = new QTextBox($this);
        $this->txtZonaTari->Width = 70;
        $this->txtZonaTari->Required = true;
        $this->txtZonaTari->Visible = false;
    }

    protected function lstServTari_Create() {
        $this->lstServTari = new QListBox($this);
        $this->lstServTari->Width = 95;
        $this->lstServTari->Required = true;
        $this->lstServTari->Visible = false;
        $this->lstServTari->AddItem('- Selecc -',null);
        $this->lstServTari->AddItem('AEREO','AEREO');
        $this->lstServTari->AddItem('MARITIMO','MARITIMO');
    }

    protected function txtPrecTari_Create() {
        $this->txtPrecTari = new QTextBox($this);
        $this->txtPrecTari->Width = 70;
        $this->txtPrecTari->Required = true;
        $this->txtPrecTari->Visible = false;
    }

    protected function txtMiniFact_Create() {
        $this->txtMiniFact = new QTextBox($this);
        $this->txtMiniFact->Width = 70;
        $this->txtMiniFact->Required = true;
        $this->txtMiniFact->Visible = false;
    }

    protected function btnSaveTari_Create() {
        $this->btnSaveTari = new QButton($this);
        $this->btnSaveTari->Text = '<i class="fa fa-floppy-o fa-lg"></i>';
        $this->btnSaveTari->CssClass = 'btn btn-primary btn-sm';
        $this->btnSaveTari->HtmlEntities = false;
        $this->btnSaveTari->Visible = false;
        $this->btnSaveTari->AddAction(new QClickEvent(), new QServerAction('btnSaveTari_Click'));
    }

    protected function btnCancTari_Create() {
        $this->btnCancTari = new QButton($this);
        $this->btnCancTari->Text = '<i class="fa fa-times-circle fa-lg"></i>';
        $this->btnCancTari->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancTari->HtmlEntities = false;
        $this->btnCancTari->Visible = false;
        $this->btnCancTari->AddAction(new QClickEvent(), new QServerAction('btnCancTari_Click'));
    }

    protected function btnDeleTari_Create() {
        $this->btnDeleTari = new QButton($this);
        $this->btnDeleTari->Text = '<i class="fa fa-trash fa-lg"></i>';
        $this->btnDeleTari->CssClass = 'btn btn-danger btn-sm';
        $this->btnDeleTari->HtmlEntities = false;
        $this->btnDeleTari->Visible = false;
        $this->btnDeleTari->AddAction(new QClickEvent(), new QConfirmAction('Seguro que desea borrar esta Tarifa'));
        $this->btnDeleTari->AddAction(new QClickEvent(), new QServerAction('btnDeleTari_Click'));
    }

    protected function dtgTariZona_Create() {
        $this->dtgTariZona = new QDataGrid($this);
        $this->dtgTariZona->FontSize = 12;
        $this->dtgTariZona->ShowFilter = false;

        $this->dtgTariZona->CssClass = 'datagrid';
        $this->dtgTariZona->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgTariZona->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgTariZona->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTariZonaRow_Click'));

        $this->dtgTariZona->UseAjax = true;

        $this->dtgTariZona->SetDataBinder('dtgTariZona_Bind');

        $this->dtgTariZonaColumns();
    }

    protected function dtgTariZona_Bind() {
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::TarifaAgentesZonas()->Servicio,true);
        $objClauOrde[] = QQ::OrderBy(QQN::TarifaAgentesZonas()->Zona,true);
        $this->dtgTariZona->DataSource = $this->mctTarifaAgentes->TarifaAgentes->GetTarifaAgentesZonasAsTarifaArray($objClauOrde);
    }
    
    protected function dtgTariZonaColumns() {
        $colZonaTari = new QDataGridColumn($this);
        $colZonaTari->Name = QApplication::Translate('Zona');
        /*$colZonaTari->Html = '<?= $_ITEM->Zona ?>';*/
        $colZonaTari->Html = '<?= $_FORM->dtgZona_Render($_ITEM); ?>';
        $colZonaTari->Width = 180;
        $this->dtgTariZona->AddColumn($colZonaTari);

        $colServTari = new QDataGridColumn($this);
        $colServTari->Name = QApplication::Translate('Servicio');
        $colServTari->Html = '<?= $_ITEM->Servicio ?>';
        $colServTari->Width = 120;
        $this->dtgTariZona->AddColumn($colServTari);

        $colPrecTari = new QDataGridColumn($this);
        $colPrecTari->Name = QApplication::Translate('Precio');
        $colPrecTari->Html = '<?= $_ITEM->Precio ?>';
        $colPrecTari->Width = 100;
        $this->dtgTariZona->AddColumn($colPrecTari);

        $colMiniFact = new QDataGridColumn($this);
        $colMiniFact->Name = 'Min. Fact';
        $colMiniFact->Html = '<?= $_ITEM->MinimoFacturable ?>';
        $colMiniFact->Width = 100;
        $this->dtgTariZona->AddColumn($colMiniFact);

        $colUsuaCrea = new QDataGridColumn($this);
        $colUsuaCrea->Name = QApplication::Translate('Creada Por');
        $colUsuaCrea->Html = '<?= $_FORM->dtgUsuaCrea_Render($_ITEM) ?>';
        $colUsuaCrea->Width = 100;
        $this->dtgTariZona->AddColumn($colUsuaCrea);

        $colUsuaModi = new QDataGridColumn($this);
        $colUsuaModi->Name = QApplication::Translate('Modif. Por');
        $colUsuaModi->Html = '<?= $_FORM->dtgUsuaModi_Render($_ITEM) ?>';
        $colUsuaModi->Width = 100;
        $this->dtgTariZona->AddColumn($colUsuaModi);
    }

    public function dtgZona_Render(TarifaAgentesZonas $objTariZona) {
	    $strIdxxNomb = $objTariZona->Zona;
        $objParaZona = Parametros::LoadByIndiceCodigo('ZONA',$objTariZona->Zona);
        if ($objParaZona) {
            $strIdxxNomb .= ' - '.$objParaZona->Descripcion;
        }
	    return $strIdxxNomb;
    }

    public function dtgUsuaCrea_Render(TarifaAgentesZonas $objTariZona) {
	    $strUsuaCrea = 'N/A';
        $objUsuaCrea = Usuario::Load($objTariZona->CreatedBy);
        if ($objUsuaCrea) {
            $strUsuaCrea = $objUsuaCrea->LogiUsua;
        }
	    return $strUsuaCrea;
    }

    public function dtgUsuaModi_Render(TarifaAgentesZonas $objTariZona) {
	    $strUsuaModi = 'N/A';
        $objUsuaModi = Usuario::Load($objTariZona->UpdatedBy);
        if ($objUsuaModi) {
            $strUsuaModi = $objUsuaModi->LogiUsua;
        }
	    return $strUsuaModi;
    }

    protected function determinarPosicion() {
        if ($this->mctTarifaAgentes->TarifaAgentes && !isset($_SESSION['DataTarifaAgentes'])) {
            $_SESSION['DataTarifaAgentes'] = serialize(array($this->mctTarifaAgentes->TarifaAgentes));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataTarifaAgentes']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctTarifaAgentes->TarifaAgentes->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('TarifaAgentes',$this->mctTarifaAgentes->TarifaAgentes->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    public function dtgTariZonaRow_Click($strFormId, $strControlId, $strParameter) {
        $id = (int)$strParameter;
        $this->intEditTari = $id;
        $this->mostrarCampos('edit');
        $objTariZona = TarifaAgentesZonas::Load($id);

        $this->txtZonaTari->Text = $objTariZona->Zona;
        $this->lstServTari->SelectedIndex = $objTariZona->Servicio == 'AEREO' ? 1 : 2;
        $this->txtPrecTari->Text = $objTariZona->Precio;
        $this->txtMiniFact->Text = $objTariZona->MinimoFacturable;
        $this->blnEditTari       = true;
    }

    protected function btnSaveTari_Click() {
        if (!$this->blnEditTari) {
            $objTariZona = new TarifaAgentesZonas();
            $objTariZona->TarifaId  = $this->mctTarifaAgentes->TarifaAgentes->Id;
            $objTariZona->CreatedBy = $this->objUsuario->CodiUsua;
        } else {
            $objTariZona = TarifaAgentesZonas::Load($this->intEditTari);
            $objTariZona->UpdatedBy = $this->objUsuario->CodiUsua;
        }
        $objRegiViej = clone $objTariZona;
        $objTariZona->Zona     = (int)$this->txtZonaTari->Text;
        $objTariZona->Servicio = $this->lstServTari->SelectedValue;
        $objTariZona->Precio   = (float)$this->txtPrecTari->Text;
        $objTariZona->MinimoFacturable = (float)$this->txtMiniFact->Text;

        $objTariZona->Save();
        $strMensTran = 'N/A';
        if ($this->blnEditTari) {
            //---------------------------------------------------------------------
            // Si estamos en modo Edicion, entonces se verifican la existencia
            // de algun cambio en algun dato
            //---------------------------------------------------------------------
            $objRegiNuev = $objTariZona;
            $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
            if ($objResuComp->FriendlyComparisonStatus == 'different') {
                $strMensTran = implode(',',$objResuComp->DifferentFields);
            }
        } else {
            $strMensTran = "Creado";
        }
        $objTariZona->logDeCambios($strMensTran);

        $this->dtgTariZona->Refresh();

        $this->txtZonaTari->Text = '';
        $this->lstServTari->SelectedIndex = 0;
        $this->txtPrecTari->Text = '';
        $this->txtMiniFact->Text = '';

        // Se notifica al Usuario el exito de la transaccion
        $this->success('Transaccion Exitosa.  Tarifa guardada !!!');
    }

    protected function btnDeleTari_Click() {
        $objTariZona = TarifaAgentesZonas::Load($this->intEditTari);
        $objTariZona->Delete();
        $objTariZona->logDeCambios('Borrado');

        $this->dtgTariZona->Refresh();

        $this->txtZonaTari->Text = '';
        $this->lstServTari->SelectedIndex = 0;
        $this->txtPrecTari->Text = '';
        $this->txtMiniFact->Text = '';

        // Se notifica al Usuario el exito de la transaccion
        $this->success('Transaccion Exitosa.  Tarifa borrada !!!');
    }


    protected function btnCancTari_Click() {
        $this->mostrarCampos('add');
    }

    public function lblTituTari_Click() {
        $this->mostrarCampos('add');
    }

    protected function mostrarCampos($strAction='add') {
	    $this->mensaje();
        if ($strAction == 'add') {
            $this->blnEditTari = false;
            $this->txtZonaTari->Visible = !$this->txtZonaTari->Visible;
            $this->lstServTari->Visible = !$this->lstServTari->Visible;
            $this->txtPrecTari->Visible = !$this->txtPrecTari->Visible;
            $this->txtMiniFact->Visible = !$this->txtMiniFact->Visible;
            $this->btnSaveTari->Visible = !$this->btnSaveTari->Visible;
            $this->btnCancTari->Visible = !$this->btnCancTari->Visible;
            $this->btnDeleTari->Visible = false;

            $this->txtZonaTari->Text = '';
            $this->lstServTari->SelectedIndex = 0;
            $this->txtPrecTari->Text = '';
            $this->txtMiniFact->Text = '';

            $this->lblZonaTari->Visible = !$this->lblZonaTari->Visible;
            $this->lblServTari->Visible = !$this->lblServTari->Visible;
            $this->lblPrecTari->Visible = !$this->lblPrecTari->Visible;
            $this->lblMiniFact->Visible = !$this->lblMiniFact->Visible;
            $this->lblAcciTari->Visible = !$this->lblAcciTari->Visible;
        }
        if ($strAction == 'edit') {
            $this->blnEditTari = true;
            $this->txtZonaTari->Visible = true;
            $this->lstServTari->Visible = true;
            $this->txtPrecTari->Visible = true;
            $this->txtMiniFact->Visible = true;
            $this->btnSaveTari->Visible = true;
            $this->btnCancTari->Visible = true;
            $this->btnDeleTari->Visible = true;

            $this->lblZonaTari->Visible = true;
            $this->lblServTari->Visible = true;
            $this->lblPrecTari->Visible = true;
            $this->lblMiniFact->Visible = true;
            $this->lblAcciTari->Visible = true;
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/tarifa_agentes_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/tarifa_agentes_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/tarifa_agentes_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/tarifa_agentes_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctTarifaAgentes->TarifaAgentes;
		$this->mctTarifaAgentes->SaveTarifaAgentes();
		if ($this->mctTarifaAgentes->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctTarifaAgentes->TarifaAgentes;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'TarifaAgentes';
				$arrLogxCamb['intRefeRegi'] = $this->mctTarifaAgentes->TarifaAgentes->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctTarifaAgentes->TarifaAgentes->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_agentes_edit.php/'.$this->mctTarifaAgentes->TarifaAgentes->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'TarifaAgentes';
			$arrLogxCamb['intRefeRegi'] = $this->mctTarifaAgentes->TarifaAgentes->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctTarifaAgentes->TarifaAgentes->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_agentes_edit.php/'.$this->mctTarifaAgentes->TarifaAgentes->Id;
			LogDeCambios($arrLogxCamb);
            QApplication::Redirect('tarifa_agentes_edit.php/'.$this->mctTarifaAgentes->TarifaAgentes->Id);
            $this->success('Transacción Exitosa !!!');
        }
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctTarifaAgentes->TablasRelacionadasTarifaAgentes();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->warning('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctTarifaAgentes->DeleteTarifaAgentes();
            $arrLogxCamb['strNombTabl'] = 'TarifaAgentes';
            $arrLogxCamb['intRefeRegi'] = $this->mctTarifaAgentes->TarifaAgentes->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctTarifaAgentes->TarifaAgentes->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// tarifa_agentes_edit.tpl.php as the included HTML template file
TarifaAgentesEditForm::Run('TarifaAgentesEditForm');
?>