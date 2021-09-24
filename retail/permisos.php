<?php
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();


class Permisos extends FormularioBaseKaizen {
    protected $lstCodiGrup;
    protected $btnCopiPerm;
    protected $lstOpciSist;
    protected $arrOpciSist;
    protected $dtgUsuaGrup;
    protected $txtLogiUsua;
    protected $btnAgreUsua;

    protected function Form_Create() {

        parent::Form_Create();
        $this->lblTituForm->Text = 'Permisos';

        $this->btnCopiPerm_Create();

        $this->lstCodiGrup_Create();
        $this->lstOpciSist_Create();
        $this->dtgUsuaGrup_Create();
        $this->txtLogiUsua_Create();
        $this->btnAgreUsua_Create();

    }

    //------------------------------
    // Aqui se crean los objetos
    //------------------------------

    protected function dtgUsuaGrup_Create() {

        $this->dtgUsuaGrup = new UsuarioDataGrid($this);
        $this->dtgUsuaGrup->FontSize = 13;
        $this->dtgUsuaGrup->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgUsuaGrup->CssClass = 'datagrid';
        $this->dtgUsuaGrup->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgUsuaGrup->Paginator = new QPaginator($this->dtgUsuaGrup);
        $this->dtgUsuaGrup->ItemsPerPage = 10; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgUsuaGrup->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgUsuaGrup->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgUsuaGrup->MetaAddColumn('LogiUsua');
        $this->dtgUsuaGrup->MetaAddColumn('NombUsua');
        $this->dtgUsuaGrup->MetaAddColumn('ApelUsua');
        $this->dtgUsuaGrup->MetaAddColumn(QQN::Usuario()->Sucursal->Iata,'Name=Suc');
        $this->dtgUsuaGrup->MetaAddColumn('FechAcce');
        $this->dtgUsuaGrup->SetDataBinder('dtgUsuaGrup_Binder');

    }

    protected function dtgUsuaGrup_Binder(){
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Usuario()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::IsNull(QQN::Usuario()->DeleteAt);
        $objClauWher[] = QQ::Equal(QQN::Usuario()->GrupoId,$this->lstCodiGrup->SelectedValue);

        $arrUsuaGrup = Usuario::QueryArray(QQ::AndCondition($objClauWher));

        $this->dtgUsuaGrup->TotalItemCount = count($arrUsuaGrup);
        // Bind the datasource to the datagrid
        $this->dtgUsuaGrup->DataSource = Usuario::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgUsuaGrup->OrderByClause, $this->dtgUsuaGrup->LimitClause)
        );

    }

    protected function lstCodiGrup_Create() {
        $this->lstCodiGrup = new QListBox($this);
        $this->lstCodiGrup->Name = QApplication::Translate('Grupo');
        $this->lstCodiGrup->Width = 320;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::NewGrupo()->Nombre);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::NewGrupo()->SistemaId,'ret');
        $objClauWher[] = QQ::Equal(QQN::NewGrupo()->Activo,SinoType::SI);
        $objClauWher[] = QQ::IsNull(QQN::NewGrupo()->DeletedAt);
        $arrNewxGrup   = NewGrupo::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCanrGrup = count($arrNewxGrup);
        $this->lstCodiGrup->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCanrGrup.')'),null);
        foreach ($arrNewxGrup as $objGrupo) {
            if ($objGrupo->Activo == SinoType::SI) {
                $this->lstCodiGrup->AddItem($objGrupo->__toStringConCantUsuarios(),$objGrupo->Id);
            }
        }
        $this->lstCodiGrup->AddAction(new QChangeEvent(), new QServerAction('actualizarOpciones'));
    }

    protected function lstOpciSist_Create() {
        $this->lstOpciSist = new QListBox($this);
        $this->lstOpciSist->Name = QApplication::Translate('Opciones del Sistema');
        $this->lstOpciSist->Width = 320;
        $this->lstOpciSist->SelectionMode = QSelectionMode::Multiple;
        $this->lstOpciSist->Rows = 18;
        $this->lstOpciSist->AddAction(new QClickEvent(), new QAjaxAction('lstOpciSist_Click'));
    }

    protected function txtLogiUsua_Create() {
        $this->txtLogiUsua = new QTextBox($this);
        $this->txtLogiUsua->Name = 'Usuario';
        $this->txtLogiUsua->Placeholder = 'Login';
        $this->txtLogiUsua->Width = 120;
        $this->txtLogiUsua->Enabled = false;
        $this->txtLogiUsua->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
    }

    protected function btnAgreUsua_Create(){
        $this->btnAgreUsua = new QButtonP($this);
        $this->btnAgreUsua->Text = 'Agregar Usuario al Grupo';
        $this->btnAgreUsua->Enabled = false;
        $this->btnAgreUsua->AddAction(new QClickEvent(), new QServerAction('btnAgreUsua_Click'));
    }

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
        $this->mensaje();
    }

    protected function btnCopiPerm_Click() {
        QApplication::Redirect('copiar_permisos.php');
    }

    protected function btnAgreUsua_Click() {
        $strLogiUsua = trim($this->txtLogiUsua->Text);
        if (strlen($strLogiUsua) == 0) {
            $this->danger('Debe especificar un Login de Usuario');
            return;
        }
        $objUsuaAgre = Usuario::LoadByLogiUsua($strLogiUsua);
        if (!$objUsuaAgre) {
            $this->danger('El Usuario indicado, no existe');
            return;
        }
        if (!is_null($objUsuaAgre->DeleteAt)) {
            $this->danger('El Usuario indicado, no existe');
            return;
        }
        try {
            $objUsuaAgre->GrupoId = $this->lstCodiGrup->SelectedValue;
            $objUsuaAgre->Save();
        } catch (Exception $e) {
            $this->mensaje($e->getMessage());
        }
        //----------------------------------------------
        // Se deja rastro de la transaccion realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'Usuario';
        $arrLogxCamb['intRefeRegi'] = $objUsuaAgre->CodiUsua;
        $arrLogxCamb['strNombRegi'] = $objUsuaAgre->LogiUsua;
        $arrLogxCamb['strDescCamb'] = 'Cambiado al Grupo: '.$this->lstCodiGrup->SelectedName;
        LogDeCambios($arrLogxCamb);
        $this->success('Usuario Cambiado Exitosamente !');
        $this->txtLogiUsua->Text = '';
        $this->dtgUsuaGrup->Refresh();
        //-------------------------------------------------------------------------------
        // Se actualiza el listado de Grupos, para mostrar la cantidad real de Usuarios
        //-------------------------------------------------------------------------------
        $intIndiActu = $this->lstCodiGrup->SelectedIndex;
        $this->lstCodiGrup->RemoveAllItems();
        $arrNewxGrup = NewGrupo::LoadArrayBySistemaId('sde');
        $intCanrGrup = count($arrNewxGrup);
        $this->lstCodiGrup->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCanrGrup.')'),null);
        foreach ($arrNewxGrup as $objGrupo) {
            $this->lstCodiGrup->AddItem($objGrupo->__toStringConCantUsuarios(),$objGrupo->Id);
        }
        $this->lstCodiGrup->SelectedIndex = $intIndiActu;
    }

    protected function actualizarOpciones() {
        $this->info('Presione la tecla <strong>CTRL</strong>, mientras hace <strong>CLICK</strong> en las Opciones');
        $this->dtgUsuaGrup->Refresh();
        $this->txtLogiUsua->Enabled = false;
        $this->btnAgreUsua->Enabled = false;
        $this->lstOpciSist->RemoveAllItems();
        if (!is_null($this->lstCodiGrup->SelectedValue)) {
            $this->txtLogiUsua->Enabled = true;
            $this->btnAgreUsua->Enabled = true;
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

        $objGrupSele = NewGrupo::Load($intGrupSele);
        $intCantPerm = $objGrupSele->CountPermisosAsGrupo();
        $arrPermAnte = $objGrupSele->GetPermisoAsGrupoArray();
        $strTextCamb = 'El Grupo tenia <b>('.$intCantPerm.')</b> permisos ';
        //-----------------------------------------------------
        // Antes que nada, se eliminan los permisos del Grupo
        //-----------------------------------------------------
        $strCadeSqlx  = "delete ";
        $strCadeSqlx .= "  from permiso ";
        $strCadeSqlx .= " where grupo_id = $intGrupSele";
        $strCadeSqlx .= "   and opcion_id in (select id";
        $strCadeSqlx .= "                       from new_opcion ";
        $strCadeSqlx .= "                      where sistema_id = '".$_SESSION['Sistema']."')";
        $objDatabase->NonQuery($strCadeSqlx);
        //--------------------------------------------------------------
        // Ahora se graban en la base de datos los permisos otorgados
        //--------------------------------------------------------------
        $strNuevOpci = '';
        $arrOpciSele = array_unique($this->lstOpciSist->SelectedValues,SORT_NUMERIC);
        foreach ($arrOpciSele as $intOpciSele) {
            $strCadeSqlx  = "insert ";
            $strCadeSqlx .= "  into permiso ";
            $strCadeSqlx .= "values (default,$intGrupSele,$intOpciSele)";
            $objDbResult  = $objDatabase->NonQuery($strCadeSqlx);
            $objOpciSele  = NewOpcion::Load($intOpciSele);
            $strNuevOpci .= $objOpciSele->Nombre.', ';
        }
        $strNuevOpci  = substr($strNuevOpci,0,strlen(trim($strNuevOpci))-1);
        $intCantPerm  = $objGrupSele->CountPermisosAsGrupo();
        $strTextCamb .= '. <br>Ahora tiene <b>('.$intCantPerm.')</b> permisos: '.$strNuevOpci;
        $arrLogxCamb['strNombTabl'] = 'Permiso';
        $arrLogxCamb['intRefeRegi'] = $intGrupSele;
        $arrLogxCamb['strNombRegi'] = $this->lstCodiGrup->SelectedName;
        $arrLogxCamb['strDescCamb'] = $strTextCamb;
        LogDeCambios($arrLogxCamb);
        $this->success('Transaccion Exitosa !');
    }

    protected function btnCancel_Click() {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
    }
}

Permisos::Run('Permisos');
?>