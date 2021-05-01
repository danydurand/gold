<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NewGrupoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the NewGrupo class.  It uses the code-generated
 * NewGrupoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a NewGrupo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both new_grupo_edit.php AND
 * new_grupo_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class NewGrupoEditForm extends NewGrupoEditFormBase {
    protected $dtgUsuaGrup;
    protected $lblUsuaGrup;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the NewGrupoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctNewGrupo = NewGrupoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on NewGrupo's data fields
		$this->lblId = $this->mctNewGrupo->lblId_Create();
		$this->txtNombre = $this->mctNewGrupo->txtNombre_Create();
		$this->chkActivo = $this->mctNewGrupo->chkActivo_Create();
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Sistema()->CodiStat,StatusType::ACTIVO);
		$this->lstSistema = $this->mctNewGrupo->lstSistema_Create(null,QQ::AndCondition($objClauWher));

		$this->lblUsuaGrup_Create();
		$this->dtgUsuaGrup_Create();

		if (!$this->mctNewGrupo->EditMode) {
		    $this->lblUsuaGrup->Visible = false;
		    $this->dtgUsuaGrup->Visible = false;
        }
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Grupo';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
    }

    protected function lblUsuaGrup_Create() {
        $this->lblUsuaGrup = new QLabel($this);
        $this->lblUsuaGrup->Text = 'Usuario(s) de este Grupo';
    }

    protected function dtgUsuaGrup_Create() {

        $this->dtgUsuaGrup = new UsuarioDataGrid($this);
        $this->dtgUsuaGrup->FontSize = 13;
        $this->dtgUsuaGrup->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgUsuaGrup->CssClass = 'datagrid';
        $this->dtgUsuaGrup->AlternateRowStyle->CssClass = 'alternate';

        // Los registros "Borrados" no deben mostrarse
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNull(QQN::Usuario()->DeleteAt);
        $objClauWher[] = QQ::Equal(QQN::Usuario()->GrupoId,$this->mctNewGrupo->NewGrupo->Id);
        $this->dtgUsuaGrup->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Add Pagination (if desired)
        $this->dtgUsuaGrup->Paginator = new QPaginator($this->dtgUsuaGrup);
        $this->dtgUsuaGrup->ItemsPerPage = 10; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgUsuaGrup->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgUsuaGrup->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgUsuaGrup->RowActionParameterHtml = '<?= $_ITEM->CodiUsua ?>';
        $this->dtgUsuaGrup->AddRowAction(new QClickEvent(), new QAjaxAction('dtgUsuaGrupRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for usuario's properties, or you
        // can traverse down QQN::usuario() to display fields that are down the hierarchy)
        $this->dtgUsuaGrup->MetaAddColumn('CodiUsua');
        $this->dtgUsuaGrup->MetaAddColumn('LogiUsua');
        $this->dtgUsuaGrup->MetaAddColumn('NombUsua');
        $this->dtgUsuaGrup->MetaAddColumn('ApelUsua');
        $this->dtgUsuaGrup->MetaAddTypeColumn('CodiStat', 'StatusType');
        $colSucuUsua = $this->dtgUsuaGrup->MetaAddColumn(QQN::Usuario()->Sucursal->Iata);
        $colSucuUsua->Name = 'Suc.';
        $this->dtgUsuaGrup->MetaAddColumn('FechAcce');

    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    public function dtgUsuaGrupRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect(__SIST__."/usuario_edit.php/$intId");
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctNewGrupo->NewGrupo;
		$this->mctNewGrupo->SaveNewGrupo();
		if ($this->mctNewGrupo->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctNewGrupo->NewGrupo;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'NewGrupo';
				$arrLogxCamb['intRefeRegi'] = $this->mctNewGrupo->NewGrupo->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctNewGrupo->NewGrupo->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/new_grupo_edit.php/'.$this->mctNewGrupo->NewGrupo->Id;
				LogDeCambios($arrLogxCamb);
                //-------------------------------------------------------------------------
                // Si el Grupo fue inactivado, los Usuarios también deben ser inactivados
                //-------------------------------------------------------------------------
                if ($this->mctNewGrupo->NewGrupo->Activo == StatusType::INACTIVO) {
                    $arrUsuaGrup = $this->mctNewGrupo->NewGrupo->GetUsuarioAsGrupoArray();
                    foreach ($arrUsuaGrup as $objUsuaGrup) {
                        $objUsuaGrup->CodiStat = StatusType::INACTIVO;
                        $objUsuaGrup->Save();
                        //----------------------------------------------
                        // Se deja registro en el Log de Transacciones
                        //----------------------------------------------
                        $arrLogxCamb['strNombTabl'] = 'Usuario';
                        $arrLogxCamb['intRefeRegi'] = $objUsuaGrup->CodiUsua;
                        $arrLogxCamb['strNombRegi'] = $objUsuaGrup->NombUsua;
                        $arrLogxCamb['strDescCamb'] = "Inactivado por la Inactivacion del Grupo";
                        LogDeCambios($arrLogxCamb);
                    }
                }
                $this->success('Transacción Exitosa');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'NewGrupo';
			$arrLogxCamb['intRefeRegi'] = $this->mctNewGrupo->NewGrupo->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctNewGrupo->NewGrupo->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/new_grupo_edit.php/'.$this->mctNewGrupo->NewGrupo->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa');
		}
		$this->dtgUsuaGrup->Refresh();
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------------
        // Se eliminan los Usuarios asociados al Grupo
        //----------------------------------------------
        $arrUsuaGrup = $this->mctNewGrupo->NewGrupo->GetUsuarioAsGrupoArray();
        foreach ($arrUsuaGrup as $objUsuaGrup) {
            $objUsuaGrup->DeleteAt = new QDateTime(QDateTime::Now());
            $objUsuaGrup->Save();
            //----------------------------------------------
            // Se deja registro en el Log de Transacciones
            //----------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Usuario';
            $arrLogxCamb['intRefeRegi'] = $objUsuaGrup->CodiUsua;
            $arrLogxCamb['strNombRegi'] = $objUsuaGrup->NombUsua;
            $arrLogxCamb['strDescCamb'] = "Eliminado (SoftDelete) por la Eliminacion del Grupo";
            LogDeCambios($arrLogxCamb);
        }
        //------------------------------------
        // Se elimina el grupo (SoftDelete)
        //------------------------------------
	    $this->mctNewGrupo->NewGrupo->DeletedAt = new QDateTime(QDateTime::Now());
	    $this->mctNewGrupo->NewGrupo->Save();
        //----------------------------------------------
        // Se deja registro en el Log de Transacciones
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'NewGrupo';
        $arrLogxCamb['intRefeRegi'] = $this->mctNewGrupo->NewGrupo->Id;
        $arrLogxCamb['strNombRegi'] = $this->mctNewGrupo->NewGrupo->Nombre;
        $arrLogxCamb['strDescCamb'] = "Eliminado (SoftDelete)";
        LogDeCambios($arrLogxCamb);
        $this->RedirectToListPage();

        /*
        $blnTodoOkey = true;
        $arrTablRela = $this->mctNewGrupo->TablasRelacionadasNewGrupo();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctNewGrupo->DeleteNewGrupo();
            $arrLogxCamb['strNombTabl'] = 'NewGrupo';
            $arrLogxCamb['intRefeRegi'] = $this->mctNewGrupo->NewGrupo->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctNewGrupo->NewGrupo->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
        */
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// new_grupo_edit.tpl.php as the included HTML template file
NewGrupoEditForm::Run('NewGrupoEditForm');
?>