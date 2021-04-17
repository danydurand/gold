<?php
//---------------------------------------------------------------------------------
// Programa      : dar_permisos.php
// Elaborado por : Juan Duran
// Fecha Elab.   : 16/02/2017
// Descripcion   : Este programa, permite otorgar/denegar permisos a los Usuarios
//                 sobre ciertas opciones del Sistema que no estan controladas
//                 por el modulo de permisologia original del Sistema
//---------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class DarPermisos extends FormularioBaseKaizen {
    protected $lstPermProc;
    protected $txtTextExpl;
    protected $txtLogiUsua;
    protected $lblUsuaPerm;
    protected $dtgUsuaPerm;
    protected $strIndiPara;

    protected $blnDarxQuit;
    protected $btnQuitar;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Dar/Quitar Permisos');

        $this->lstPermProc_Create();
        $this->txtTextExpl_Create();
        $this->txtLogiUsua_Create();

        $arrUsuaAuto = array();
        $arrUsuaAuto[] = "ddurand";
        $arrUsuaAuto[] = "mtovar";

        $this->blnDarxQuit = true;
        if (!in_array($this->objUsuario->LogiUsua,$arrUsuaAuto)) {
            $this->blnDarxQuit = false;
        }

        $this->lblUsuaPerm_Create();
        $this->dtgUsuaPerm_Create();

        $this->btnSave_Create();
        $this->btnQuitar_Create();
    }

    //-------------------------------
    // Aqui se crean los objetos
    //-------------------------------

    protected function lblUsuaPerm_Create() {
        $this->lblUsuaPerm = new QLabel($this);
        $this->lblUsuaPerm->Text = 'Usuarios con este Permiso';
    }

    protected function dtgUsuaPerm_Create() {
        $this->dtgUsuaPerm = new ParametroDataGrid($this);
        $this->dtgUsuaPerm->FontSize = 13;
        $this->dtgUsuaPerm->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgUsuaPerm->CssClass = 'datagrid';
        $this->dtgUsuaPerm->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgUsuaPerm->Paginator = new QPaginator($this->dtgUsuaPerm);
        $this->dtgUsuaPerm->ItemsPerPage = 8; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgUsuaPerm->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgUsuaPerm->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgUsuaPerm->RowActionParameterHtml = '<?= $_ITEM->CodiPara ?>';
        $this->dtgUsuaPerm->AddRowAction(new QClickEvent(), new QAjaxAction('dtgUsuaPermRow_Click'));

        $colLogiUsua = $this->dtgUsuaPerm->MetaAddColumn('CodiPara');
        $colLogiUsua->Name = 'Login';
        $colNombUsua = $this->dtgUsuaPerm->MetaAddColumn('DescPara');
        $colNombUsua->Name = 'Nombre';
        $colSucuUsua = new QDataGridColumn('SUC','<?= $_FORM->dtgSucuUsua_Render($_ITEM); ?>');
        $colSucuUsua->Width = 75;
        $this->dtgUsuaPerm->AddColumn($colSucuUsua);

        $this->dtgUsuaPerm->SetDataBinder('dtgUsuaPerm_Bind');
    }

    protected function dtgUsuaPerm_Bind() {
        t('Cargando el DataGrid de Usuarios...');
        t('Voy a buscar IndiPara: '.trim($this->strIndiPara));
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Parametro()->IndiPara,trim($this->strIndiPara));
        $objClauWher[] = QQ::Equal(QQN::Parametro()->ParaVal1,SinoType::SI);
        $arrUsuaPerm   = Parametro::QueryArray(QQ::AndCondition($objClauWher));
        t('Encontré: '.count($arrUsuaPerm).' usuarios con ese permiso');
        $this->dtgUsuaPerm->TotalItemCount = count($arrUsuaPerm);
        // Bind the datasource to the datagrid
        $this->dtgUsuaPerm->DataSource = Parametro::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgUsuaPerm->OrderByClause, $this->dtgUsuaPerm->LimitClause)
        );

    }

    public function dtgUsuaPermRow_Click($strFormId, $strControlId, $strParameter) {
        $this->txtLogiUsua->Text .= $strParameter.chr(13);
    }

    public function dtgCodiUsua_Render(Parametro $objParaUsua) {
        $strCodiUsua = '';
        if ($objParaUsua) {
            if (strlen($objParaUsua->CodiPara) > 0) {
                $objUsuaReal = Usuario::LoadByLogiUsua($objParaUsua->CodiPara);
                if ($objUsuaReal) {
                    $strCodiUsua = $objUsuaReal->CodiUsua;
                }
            }
        }
        return $strCodiUsua;
    }

    public function dtgSucuUsua_Render(Parametro $objParaUsua) {
        $strSucuUsua = '';
        if ($objParaUsua) {
            if (strlen($objParaUsua->CodiPara) > 0) {
                $objUsuaReal = Usuario::LoadByLogiUsua($objParaUsua->CodiPara);
                if ($objUsuaReal) {
                    $strSucuUsua = $objUsuaReal->Sucursal->Iata;
                }
            }
        }
        return $strSucuUsua;
    }

    protected function lstPermProc_Create() {
        $this->lstPermProc = new QListBox($this);
        $this->lstPermProc->Name = QApplication::Translate("Permiso");
        $this->lstPermProc->Required = true;
        $this->lstPermProc->Width = 310;
        $this->lstPermProc->AddItem("- Seleccione Uno -",null);
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Parametro()->DescPara);
        $arrListPerm   = Parametro::LoadArrayByIndiPara('VariPerm', $objClauOrde);
        foreach ($arrListPerm as $objPermiso) {
            $this->lstPermProc->AddItem(trim($objPermiso->DescPara)." (".$objPermiso->CodiPara.")",$objPermiso->IndiPara.'|'.$objPermiso->CodiPara);
        }
        $this->lstPermProc->AddAction(new QChangeEvent(), new QAjaxAction("lstPermProc_Change"));
    }

    protected function txtTextExpl_Create() {
        $this->txtTextExpl = new QTextBox($this);
        $this->txtTextExpl->Name = QApplication::Translate('Mas Información');
        $this->txtTextExpl->TextMode = QTextMode::MultiLine;
        $this->txtTextExpl->Rows = 3;
        $this->txtTextExpl->Width = 300;
        $this->txtTextExpl->ForeColor = "blue";
        $this->txtTextExpl->Enabled = false;
    }

    protected function txtLogiUsua_Create() {
        $this->txtLogiUsua = new QTextBox($this);
        $this->txtLogiUsua->Name = QApplication::Translate('Login(es)');
        $this->txtLogiUsua->TextMode = QTextMode::MultiLine;
        $this->txtLogiUsua->Rows = 3;
        $this->txtLogiUsua->Required = true;
    }

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-thumbs-o-up fa-lg"></i> Dar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
        $this->btnSave->Visible = $this->blnDarxQuit;
    }

    protected function btnQuitar_Create() {
        $this->btnQuitar = new QButton($this);
        $this->btnQuitar->Text = '<i class="fa fa-thumbs-o-down fa-lg"></i> Quitar';
        $this->btnQuitar->AddAction(new QClickEvent(), new QServerAction('btnQuitar_Click'));
        $this->btnQuitar->CssClass = 'btn btn-danger btn-sm';
        $this->btnQuitar->PrimaryButton = true;
        $this->btnQuitar->CausesValidation = true;
        $this->btnQuitar->Visible = $this->blnDarxQuit;
    }

    //------------------------------------
    // Acciones relativas a los objetos
    //------------------------------------

    protected function lstPermProc_Change($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        $this->txtLogiUsua->Text = '';
        $this->txtTextExpl->Text = '';
        $this->strIndiPara       = '';
        t('Parametro seleccionado: '.$this->lstPermProc->SelectedValue);
        if (!is_null($this->lstPermProc->SelectedValue)) {
            list($strIndiPara, $strCodiPara) = explode('|',$this->lstPermProc->SelectedValue);
            t('Indi: '.$strIndiPara);
            t('Codi: '.$strCodiPara);
            $objParaSele = Parametro::LoadByIndiParaCodiPara($strIndiPara, $strCodiPara);
            if ($objParaSele) {
                t('Encontre el parametro...');
                t('Explicacion: '.$objParaSele->ParaTxt1);
                t('CodiPara: '.$objParaSele->CodiPara);
                $this->txtTextExpl->Text = $objParaSele->ParaTxt1;
                $this->strIndiPara       = $objParaSele->CodiPara;
                $this->dtgUsuaPerm->Refresh();
            }
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        $arrListLogi = explode(',',nl2br2($this->txtLogiUsua->Text));
        //-----------------------------------------------------------------------------
        // Con array_unique se eliminan los logines repetidos en caso de que los haya
        //-----------------------------------------------------------------------------
        $arrListLogi = LimpiarArreglo($arrListLogi,false);
        $this->txtLogiUsua->Text = '';
        $strPermProc = $this->lstPermProc->SelectedValue->CodiPara;
        $strNombBase = $this->lstPermProc->SelectedValue->ParaTxt2;
        //--------------------------------------------------------
        // Se procesan uno a uno los logines proporcionados
        //--------------------------------------------------------
        $intCantRegi = 0;
        $intUsuaProc = 0;
        foreach ($arrListLogi as $strLogiUsua) {
            $strLogiUsua = strtolower($strLogiUsua);
            if (!in_array($strLogiUsua,array('cliente','liberty'))) {
                $objUsuario = Usuario::LoadByLogiUsua($strLogiUsua);
                if ($objUsuario) {
                    $objPermProc = Parametro::Load($strPermProc, $strLogiUsua);
                    if ($objPermProc) {
                        //---------------------------------------------------------------------------
                        // Si el registro existe, se otorga el permiso cambiando el campo para_val1
                        //---------------------------------------------------------------------------
                        $objPermProc->ParaVal1 = 1;
                    } else {
                        //------------------------------------------------------
                        // Si el registro no existe, se crea el registro nuevo
                        //------------------------------------------------------
                        $objPermProc = new Parametro();
                        $objPermProc->IndiPara = $strPermProc;
                        $objPermProc->CodiPara = $strLogiUsua;
                        $objPermProc->DescPara = trim($objUsuario->NombUsua." ".$objUsuario->ApelUsua);
                        $objPermProc->ParaTxt1 = ".";
                        $objPermProc->ParaVal1 = 1;
                    }
                    $objPermProc->Save();
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $strTextCamb = 'Se otorgo permiso para: '.$this->lstPermProc->SelectedName;
                    $arrLogxCamb['strNombTabl'] = 'Permisos';
                    $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                    $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                    $arrLogxCamb['strDescCamb'] = $strTextCamb;
                    LogDeCambios($arrLogxCamb);
                    $intUsuaProc++;
                } else {
                    $this->txtLogiUsua->Text = $strLogiUsua." (NO EXISTE)".chr(13);
                }
                $intCantRegi++;
            } else {
                $this->txtLogiUsua->Text = $strLogiUsua." (NO PUEDE SER PROCESADO)".chr(13);
            }
        }
        $this->mensaje('Registros procesados: '.$intUsuaProc."/".$intCantRegi,'','','',__iCHEC__);
    }

    protected function btnQuitar_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        $arrListLogi = explode(',',nl2br2($this->txtLogiUsua->Text));
        //-----------------------------------------------------------------------------
        // Con array_unique se eliminan los logines repetidos en caso de que los haya
        //-----------------------------------------------------------------------------
        $arrListLogi = LimpiarArreglo($arrListLogi,false);
        $this->txtLogiUsua->Text = '';
        $strPermProc = $this->lstPermProc->SelectedValue->CodiPara;
        //--------------------------------------------------------
        // Se procesan uno a uno los logines proporcionados
        //--------------------------------------------------------
        $intCantRegi = 0;
        $intUsuaProc = 0;
        foreach ($arrListLogi as $strLogiUsua) {
            if (!in_array($strLogiUsua,array('cliente','liberty'))) {
                $objUsuario = Usuario::LoadByLogiUsua($strLogiUsua);
                if ($objUsuario) {
                    $objPermProc = Parametro::Load($strPermProc, $strLogiUsua);
                    if ($objPermProc) {
                        //-------------------------------------------------------------------------------------
                        // Si el registro existe, se elimina, con lo cual automaticamente se niega el permiso
                        //-------------------------------------------------------------------------------------
                        $objPermProc->Delete();
                    }
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $strTextCamb = 'Se quito permiso para: '.$this->lstPermProc->SelectedName;
                    $arrLogxCamb['strNombTabl'] = 'Permisos';
                    $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                    $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                    $arrLogxCamb['strDescCamb'] = $strTextCamb;
                    LogDeCambios($arrLogxCamb);
                    $intUsuaProc++;
                } else {
                    $this->txtLogiUsua->Text = $strLogiUsua." (NO EXISTE)".chr(13);
                }
                $intCantRegi++;
            } else {
                $this->txtLogiUsua->Text = $strLogiUsua." (NO PUEDE SER PROCESADO)".chr(13);
            }
        }
        $this->mensaje('Registros procesados: '.$intUsuaProc."/".$intCantRegi,'','','',__iCHEC__);
    }
}

DarPermisos::Run('DarPermisos', 'dar_permisos.tpl.php');
?>