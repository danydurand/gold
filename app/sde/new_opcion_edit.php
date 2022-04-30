<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NewOpcionEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the NewOpcion class.  It uses the code-generated
 * NewOpcionMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a NewOpcion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both new_opcion_edit.php AND
 * new_opcion_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class NewOpcionEditForm extends NewOpcionEditFormBase {

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

    protected function FlashMessage() {
        if (isset($_SESSION['FlashMessage'])) {
            list($strTipoMens, $strTextMens) = $_SESSION['FlashMessage'];
            $this->$strTipoMens($strTextMens);
            unset($_SESSION['FlashMessage']);
        }
    }

    //	protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

        $this->FlashMessage();

        // Use the CreateFromPathInfo shortcut (this can also be done manually using the NewOpcionMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctNewOpcion = NewOpcionMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on NewOpcion's data fields
		$this->lblId = $this->mctNewOpcion->lblId_Create();
		$this->lblId->CssClass = 'form-label';

		$this->txtNombre = $this->mctNewOpcion->txtNombre_Create();

        $arrSistOper = array($_SESSION['Sistema'],'con');

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Sistema()->CodiSist,$arrSistOper);
        $this->lstSistema = $this->mctNewOpcion->lstSistema_Create('',QQ::AndCondition($objClauWher));
        $this->lstSistema->AddAction(new QChangeEvent(), new QAjaxAction('lstSistema_Change'));
        if ($this->lstSistema->ItemCount == 2 && !$this->mctNewOpcion->EditMode) {
            $this->lstSistema->SelectedIndex = 1;
        }

		$this->chkEsMenu = $this->mctNewOpcion->chkEsMenu_Create();
		$this->chkEsMenu->AddAction(new QClickEvent(), new QAjaxAction('chkEsMenu_Click'));

        $this->chkActivo = $this->mctNewOpcion->chkActivo_Create();

		$this->txtPrograma = $this->mctNewOpcion->txtPrograma_Create();
        $this->txtPrograma->AddAction(new QChangeEvent(), new QAjaxAction('txtPrograma_Change'));

        $this->txtDirectorio = $this->mctNewOpcion->txtDirectorio_Create();
		$this->txtDirectorio->Width = 100;
        if (!$this->mctNewOpcion->EditMode) {
            $this->txtDirectorio->Text = strtolower($this->lstSistema->SelectedValue);
        }

        $objClauOrde = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Nombre);

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Sistema->CodiSist,$this->lstSistema->SelectedValue);
        $objClauWher[] = QQ::Equal(QQN::NewOpcion()->EsMenu,true);
        $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);

		$this->lstDependenciaObject = $this->mctNewOpcion->lstDependenciaObject_Create('',QQ::AndCondition($objClauWher),$objClauOrde);
		$this->lstDependenciaObject->Name = 'Depende De ?';

        $this->lstDependenciaObject->AddAction(new QChangeEvent(), new QAjaxAction('lstDependenciaObject_Change'));

		$this->txtPosicion = $this->mctNewOpcion->txtPosicion_Create();
		$this->txtPosicion->Width = 35;

		$this->txtImagen = $this->mctNewOpcion->txtImagen_Create();
		$this->txtImagen->Width = 90;

		$this->txtNivel = $this->mctNewOpcion->txtNivel_Create();
		$this->txtNivel->Width = 35;

        $this->chkUsoGeneral = $this->mctNewOpcion->chkUsoGeneral_Create();
        $this->chkUsoGeneral->Name = 'De Uso General ?';
        $this->chkUsoGeneral->ToolTip = 'Las opciones de Uso General, se asignan a todos los Grupos activos';

        $this->chkEsMenu_Click();
	}

	//----------------------------
	// Aquí se crean los objetos
	//----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Opción';
        if ($this->mctNewOpcion->EditMode) {
            $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
        }
    }

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function chkEsMenu_Click() {
        $this->txtImagen->Visible = $this->chkEsMenu->Checked;
    }

    protected function lstSistema_Change() {
        if (!is_null($this->lstSistema->SelectedValue)) {
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Nombre);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Sistema->CodiSist,$this->lstSistema->SelectedValue);
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->EsMenu,true);
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
            $arrOpciSist   = NewOpcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            // $arrOpciSist   = NewOpcion::LoadArrayBySistemaId($this->lstSistema->SelectedValue,$objClauOrde);
            $intCantOpci   = count($arrOpciSist);
            $this->lstDependenciaObject->RemoveAllItems();
            $this->lstDependenciaObject->AddItem('- Seleccione Uno - ('.$intCantOpci.')',null);
            foreach ($arrOpciSist as $objOpciSist) {
                $this->lstDependenciaObject->AddItem($objOpciSist->__toString(), $objOpciSist->Id);
            }
        }
    }

    protected function txtPrograma_Change() {
        if (!$this->mctNewOpcion->EditMode) {
            $strNombProg = $this->txtPrograma->Text;
            if (strpos($strNombProg, '_list.php')) {
                $this->chkActivo->Checked = true;
            } else {
                $this->chkActivo->Checked = false;
            }
        }
    }

    protected function lstDependenciaObject_Change() {
        if (!is_null($this->lstDependenciaObject->SelectedValue)) {
            $objDepeSele = NewOpcion::Load($this->lstDependenciaObject->SelectedValue);
            if ($objDepeSele->EsMenu) {
                $this->txtPosicion->Text = $objDepeSele->CountDependencia() + 1;
                $this->txtNivel->Text    = $objDepeSele->Nivel + 1;
            } else {
                $this->txtNivel->Text    = $objDepeSele->Nivel;
            }
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/new_opcion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/new_opcion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/new_opcion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/new_opcion_edit.php/'.$objRegiTabl->Id);
    }

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctNewOpcion->NewOpcion;
		$this->mctNewOpcion->SaveNewOpcion();
        if (!is_null($this->lstDependenciaObject->SelectedValue)) {
            //----------------------------------------------------------------------------------
            // Si la posicion se que esta asignando a esta Opcion, esta previamente asignada
            // a otra, entonces se procede a desplazar los numeros hacia adelante, para
            // darle cabida a la Opcion que se esta guardando.
            //----------------------------------------------------------------------------------
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
            $arrOpciMenu   = NewOpcion::LoadArrayByDependencia($this->lstDependenciaObject->SelectedValue,$objClauOrde);
            $intCantOpci   = count($arrOpciMenu);
            $intIndiVect   = 0;
            $intPosiRefe   = $this->txtPosicion->Text;
            while ($intIndiVect < $intCantOpci) {
                $objOpcion   = $arrOpciMenu[$intIndiVect];
                if (($objOpcion->Posicion == $intPosiRefe) && ($objOpcion->Id != $this->mctNewOpcion->NewOpcion->Id)) {
                    $objOpcion->Posicion += 1;
                    $intPosiRefe += 1;
                    $objOpcion->Save();
                }
                $intIndiVect ++;
            }
        }
		if ($this->mctNewOpcion->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctNewOpcion->NewOpcion;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'NewOpcion';
				$arrLogxCamb['intRefeRegi'] = $this->mctNewOpcion->NewOpcion->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctNewOpcion->NewOpcion->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
                $_SESSION['FlashMessage'] = ['success','Registro Actualizado Exitosamente !!'];
                QApplication::Redirect(__SIST__.'/new_opcion_edit.php/'.$this->mctNewOpcion->NewOpcion->Id);
            } else {
                $_SESSION['FlashMessage'] = ['warning','No se realizaron cambios al registro !!'];
                QApplication::Redirect(__SIST__.'/new_opcion_edit.php/'.$this->mctNewOpcion->NewOpcion->Id);
            }
		} else {
			$arrLogxCamb['strNombTabl'] = 'NewOpcion';
			$arrLogxCamb['intRefeRegi'] = $this->mctNewOpcion->NewOpcion->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctNewOpcion->NewOpcion->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
			LogDeCambios($arrLogxCamb);
            $_SESSION['FlashMessage'] = ['success','Registro Ingresado Exitosamente !!'];
            QApplication::Redirect(__SIST__.'/new_opcion_edit.php/'.$this->mctNewOpcion->NewOpcion->Id);
            $this->btnNuevRegi->Visible = true;
		}
        /*
		if ($this->mctNewOpcion->NewOpcion->UsoGeneral) {
            $intCantGrup = $this->agregarATodosLosGrupos();
            if ($intCantGrup > 0) {
                $strTextMens = 'Transacción Exitosa. <strong>La opción fue asignada a los '.$intCantGrup.' Grupos activos en el Sistema (que no la tenían)</strong>';
            } else {
                $strTextMens = 'Transacción Exitosa';
            }
        } else {
            $strTextMens = 'Transacción Exitosa';
        }
        $this->success($strTextMens);
        */
    }

    public function agregarATodosLosGrupos() {
        //---------------------------------------------------------------------------
        // Si la opción de marcó como "De uso General", entonces debe incluirse en
        // todos los grupos en los cuales no esté previamente incluida
        //---------------------------------------------------------------------------
        $objDatabase = NewOpcion::GetDatabase();
        $intOpciSele = $this->mctNewOpcion->NewOpcion->Id;
        $arrGrupSist = Grupo::LoadArrayByCodiStat(StatusType::ACTIVO);
        $intCantGrup = 0;
        foreach ($arrGrupSist as $objGrupSist) {
            $intGrupSele = $objGrupSist->CodiGrup;
            //------------------------------------------------------------------
            // Se verifica la existencia previa de la combinación grupo-opcion
            //------------------------------------------------------------------
            $objOpciGrup = Permiso::LoadByGrupoIdOpcionId($intGrupSele,$intOpciSele);
            if (!$objOpciGrup) {
                $strCadeSqlx  = "insert ";
                $strCadeSqlx .= "  into permiso ";
                $strCadeSqlx .= "values (default,$intGrupSele,$intOpciSele)";
                $objDatabase->NonQuery($strCadeSqlx);
                $intCantGrup++;
            }
        }
        return $intCantGrup;
    }

    public function quitarATodosLosGrupos() {
        $intCantGrup = 0;
        return $intCantGrup;
    }

    protected function RedirectToListPage() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function btnVolvList_Click() {
        QApplication::Redirect(__SIST__.'/new_opcion_list.php');
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// new_opcion_edit.tpl.php as the included HTML template file
NewOpcionEditForm::Run('NewOpcionEditForm');
?>