<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class Permisos extends FormularioBaseKaizen {
    protected $lstCodiGrup;
    protected $btnCopiPerm;
    protected $lstOpciSist;
    protected $arrOpciSist;
    protected $strSistGrup;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Permisos';

        $this->strSistGrup = $_SESSION['Sistema'];

        $this->btnCopiPerm_Create();

        $this->lstCodiGrup_Create();
        $this->lstOpciSist_Create();
    }

    //------------------------------
    // Aqui se crean los objetos
    //------------------------------

    protected function lstCodiGrup_Create() {
        $this->lstCodiGrup = new QListBox($this);
        $this->lstCodiGrup->Name = QApplication::Translate('Grupo');
        $arrNewxGrup = NewGrupo::LoadArrayBySistemaId($this->strSistGrup);
        $intCanrGrup = count($arrNewxGrup);
        $this->lstCodiGrup->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCanrGrup.')'),null);
        foreach ($arrNewxGrup as $objGrupo) {
            $this->lstCodiGrup->AddItem($objGrupo->__toStringConCantUsuarios(),$objGrupo->Id);
        }
        $this->lstCodiGrup->AddAction(new QChangeEvent(), new QServerAction('actualizarOpciones'));
    }

    protected function lstOpciSist_Create() {
        $this->lstOpciSist = new QListBox($this);
        $this->lstOpciSist->Name = QApplication::Translate('Opciones del Sistema');
        $this->lstOpciSist->Width = 320;
        $this->lstOpciSist->SelectionMode = QSelectionMode::Multiple;
        $this->lstOpciSist->Rows = 14;
        $this->lstOpciSist->AddAction(new QClickEvent(), new QAjaxAction('lstOpciSist_Click'));
    }

    //-------------------------
    // Botónes del Formulario
    //-------------------------

    protected function btnCopiPerm_Create() {
        $this->btnCopiPerm = new QImageButton($this);
        $this->btnCopiPerm->ImageUrl = '../util/imagenes/copy_f2.png';
        $this->btnCopiPerm->AddAction(new QClickEvent(), new QServerAction('btnCopiPerm_Click'));
        $this->btnCopiPerm->PrimaryButton = true;
        $this->btnCopiPerm->ToolTip = QApplication::Translate('Copiar Permisos');
    }

    //-----------------------------------
    // Acciones Relativas a los Objetos
    //-----------------------------------

    protected function lstOpciSist_Click() {
        $this->lblMensUsua->Text = '';
    }

    protected function btnCopiPerm_Click() {
        QApplication::Redirect('copiar_permisos.php');
    }

    protected function actualizarOpciones() {
        $this->mensaje('Presione la tecla <strong>CTRL</strong>, mientras hace <strong>CLICK</strong> en las Opciones','m','i','',__iINFO__);
        $this->lstOpciSist->RemoveAllItems();
        if (!is_null($this->lstCodiGrup->SelectedValue)) {
            //--------------------------------------------------
            // Se identifican las opciones asignadas al Grupo
            //--------------------------------------------------
            $intCodiGrup = $this->lstCodiGrup->SelectedValue;
            $arrPermGrup = Permiso::LoadArrayByGrupoId($intCodiGrup);
            $intCantGrup = count($arrPermGrup);
            $arrCodiGrup = array();
            if ($intCantGrup) {
                foreach ($arrPermGrup as $objPermGrup) {
                    //----------------------------------------------------------------
                    // Se carga un vector con los codigos de las opciones del Grupo
                    //----------------------------------------------------------------
                    $arrCodiGrup[] = $objPermGrup->OpcionId;
                }
            }
            //----------------------------------------
            // Se identifican los Menus del Sistema
            //----------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Nombre,'Menu Principal');
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
            $objMenuPpal   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
            if ($objMenuPpal) {
                $objClauOrde   = QQ::Clause();
                $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Dependencia);
                $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->EsMenu,false);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuPpal->Id);
                $arrMenuSist   = NewOpcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                //----------------------------------
                // Se procesan uno a uno los Menus
                //----------------------------------
                foreach ($arrMenuSist as $objMenuSist) {
                    $blnSeleRegi = false;
                    if (in_array($objMenuSist->Id, $arrCodiGrup)) {
                        //--------------------------------------------------------------------------
                        // Si el Menu, esta en el grupo de opciones asignada al grupo
                        // se marca como seleccionado dentro del ListBox
                        //--------------------------------------------------------------------------
                        $blnSeleRegi = true;
                    }
                    $this->lstOpciSist->AddItem($objMenuSist->__toString(), $objMenuSist->Id, $blnSeleRegi);
                }
            }
            //----------------------------------------
            // Se identifican los Menus del Sistema
            //----------------------------------------
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Dependencia);
            $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->EsMenu,true);
            $objClauWher[] = QQ::NotLike(QQN::NewOpcion()->Nombre,'%Principal%');
            $arrMenuSist   = NewOpcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            //----------------------------------
            // Se procesan uno a uno los Menus
            //----------------------------------
            foreach ($arrMenuSist as $objMenuSist) {
                $blnSeleRegi = false;
                if (in_array($objMenuSist->Id,$arrCodiGrup)) {
                    //--------------------------------------------------------------------------
                    // Si el Menu, esta en el grupo de opciones asignada al grupo
                    // se marca como seleccionado dentro del ListBox
                    //--------------------------------------------------------------------------
                    $blnSeleRegi = true;
                }
                $this->lstOpciSist->AddItem($objMenuSist->__toStringComoMenu(),$objMenuSist->Id,$blnSeleRegi);
                //------------------------------------------------------------
                // Por cada menu se identifican la opciones correspondientes
                //------------------------------------------------------------
                $objClauOrde   = QQ::Clause();
                $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuSist->Id);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
                // $objClauWher[] = QQ::Equal(QQN::NewOpcion()->EsMenu,false);
                $arrOpciMenu   = NewOpcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                foreach ($arrOpciMenu as $objOpciMenu) {
                    $blnSeleRegi = false;
                    if (in_array($objOpciMenu->Id,$arrCodiGrup)) {
                        //--------------------------------------------------------------------------
                        // Si la opcion del menu, esta en el grupo de opciones asignada al grupo
                        // se marca como seleccionada dentro del ListBox
                        //--------------------------------------------------------------------------
                        $blnSeleRegi = true;
                    }
                    $this->lstOpciSist->AddItem($objOpciMenu->__toStringComoMenu(),$objOpciMenu->Id,$blnSeleRegi);
                }
            }
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $objDatabase = QApplication::$Database[1];
        $intGrupSele = $this->lstCodiGrup->SelectedValue;
        //-----------------------------------------------------
        // Antes que nada, se eliminan los permisos del Grupo
        //-----------------------------------------------------
        $strCadeSqlx  = "delete ";
        $strCadeSqlx .= "  from permiso ";
        $strCadeSqlx .= " where grupo_id = $intGrupSele";
        $strCadeSqlx .= "   and opcion_id in (select id";
        $strCadeSqlx .= "                       from new_opcion ";
        $strCadeSqlx .= "                      where sistema_id = '".$this->strSistGrup."')";
        $objDbResult = $objDatabase->NonQuery($strCadeSqlx);
        //--------------------------------------------------------------
        // Ahora se graban en la base de datos los permisos otorgados
        //--------------------------------------------------------------
        $arrOpciSele = $this->lstOpciSist->SelectedValues;
        foreach ($arrOpciSele as $intOpciSele) {
            $strCadeSqlx  = "insert ";
            $strCadeSqlx .= "  into permiso ";
            $strCadeSqlx .= "values (default,$intGrupSele,$intOpciSele)";
            $objDbResult  = $objDatabase->NonQuery($strCadeSqlx);
        }
        $this->mensaje('Transaccion Exitosa','m','s','check');
    }

    protected function btnCancel_Click() {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
    }
}

Permisos::Run('Permisos');