<?php
//---------------------------------------------------------------------------------------------------
// Programa       : index.php
// Realizado por  : Daniel Durand
// Fecha Elab.    : 17/04/2018
// Descripcion    : Este programa permite hacer rastreo de guias
//---------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class Index extends FormularioBaseKaizen {
    protected $txtListGuia;
    protected $lblGuiaCons;
    protected $dtgGuiaCons;
    protected $lblCkptGuia;
    protected $dtgCkptGuia;
    protected $strNumeGuia;
    protected $intCantGuia;

    protected function Form_Create() {
        $objUsuario = Usuario::LoadByLogiUsua('liberty');
        $_SESSION['User'] = serialize($objUsuario);

        parent::Form_Create();

        $this->lblTituForm->Text = 'Rastreo de Guías';
        $this->btnSave->Text     = TextoIcono('cogs','Buscar','F','lg');
        $this->btnCancel->Text   = TextoIcono('reply','Limpiar','F','lg');

        $this->txtListGuia_Create();

        $this->lblGuiaCons_Create();
        $this->dtgGuiaCons_Create();

        $this->lblCkptGuia_Create();
        $this->dtgCkptGuia_Create();
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function txtListGuia_Create() {
        $this->txtListGuia = new QTextBox($this);
        $this->txtListGuia->Name = 'Lista de Guías';
        $this->txtListGuia->Placeholder = 'Nros de Guías';
        $this->txtListGuia->TextMode = QTextMode::MultiLine;
        $this->txtListGuia->Rows = 15;
        $this->txtListGuia->Width = 150;
    }

    public function lblGuiaCons_Create() {
        $this->lblGuiaCons = new QLabel($this);
        $this->lblGuiaCons->Text = 'Guías Consultadas';
        $this->lblGuiaCons->CssClass = 'titulo';
        $this->lblGuiaCons->Visible = false;
    }

    public function dtgGuiaCons_Create() {
        $this->dtgGuiaCons = new GuiaDataGrid($this);
        $this->dtgGuiaCons->FontSize = 12;
        $this->dtgGuiaCons->ShowFilter = false;

        $this->dtgGuiaCons->CssClass = 'datagrid';
        $this->dtgGuiaCons->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaCons->Paginator = new QPaginator($this->dtgGuiaCons);
        $this->dtgGuiaCons->ItemsPerPage = 10; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $this->dtgGuiaCons->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuiaCons->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgGuiaCons->RowActionParameterHtml = '<?= $_ITEM->NumeGuia ?>';
        $this->dtgGuiaCons->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiaConsRow_Click'));

        $colNumeGuia = $this->dtgGuiaCons->MetaAddColumn('NumeGuia');
        $colNumeGuia->Name = 'Guía';

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->FechGuia->__toString("DD/MM/YYYY") ?>');
        $this->dtgGuiaCons->AddColumn($colFechGuia);

        $colSucuOrig = $this->dtgGuiaCons->MetaAddColumn(QQN::Guia()->EstaOrigObject);
        $colSucuOrig->Name = 'Origen';

        $colSucuDest = $this->dtgGuiaCons->MetaAddColumn(QQN::Guia()->EstaDestObject);
        $colSucuDest->Name = 'Destino';

        $colNombRemi = new QDataGridColumn('Remitente','<?= substr($_ITEM->NombRemi,0,10) ?>');
        $this->dtgGuiaCons->AddColumn($colNombRemi);

        $colNombDest = new QDataGridColumn('Destinatario','<?= substr($_ITEM->NombDest,0,10) ?>');
        $this->dtgGuiaCons->AddColumn($colNombDest);

        $this->dtgGuiaCons->SetDataBinder('dtgGuiaCons_Binder');

        $this->dtgGuiaCons->Visible = false;

    }


    protected function dtgGuiaCons_Binder(){
        $arrNumeGuia   = explode(',',nl2br2($this->txtListGuia->Text));
        $arrNumeGuia   = LimpiarArreglo($arrNumeGuia);

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Guia()->NumeGuia);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Guia()->NumeGuia,$arrNumeGuia);
        $objClauWher[] = QQ::Equal(QQN::Guia()->Anulada,SinoType::NO);

        $arrGuiaCons       = Guia::QueryArray(QQ::AndCondition($objClauWher));
        $this->intCantGuia = count($arrGuiaCons);
        $this->dtgGuiaCons->TotalItemCount = count($arrGuiaCons);

        // Bind the datasource to the datagrid
        $this->dtgGuiaCons->DataSource = Guia::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgGuiaCons->OrderByClause, $this->dtgGuiaCons->LimitClause)
        );
    }

    public function lblCkptGuia_Create() {
        $this->lblCkptGuia = new QLabel($this);
        $this->lblCkptGuia->Text = 'Detalle de la Guía';
        $this->lblCkptGuia->CssClass = 'titulo';
        $this->lblCkptGuia->Visible = false;
    }

    public function dtgCkptGuia_Create() {
        $this->dtgCkptGuia = new GuiaCkptDataGrid($this);
        $this->dtgCkptGuia->FontSize = 12;
        $this->dtgCkptGuia->ShowFilter = false;

        $this->dtgCkptGuia->CssClass = 'datagrid';
        $this->dtgCkptGuia->AlternateRowStyle->CssClass = 'alternate';

        $colObseCkpt = new QDataGridColumn('Estatus','<?= $_FORM->dtgGuiaCkpt_TextObse_Render($_ITEM) ?>');;
        $colObseCkpt->Name = 'Estatus';
        $this->dtgCkptGuia->AddColumn($colObseCkpt);

        $colEstaCkpt = $this->dtgCkptGuia->MetaAddColumn(QQN::GuiaCkpt()->CodiEstaObject);
        $colEstaCkpt->Name = 'Sucursal';

        $colFechCkpt = new QDataGridColumn('Fecha','<?= $_ITEM->FechCkpt->__toString("DD/MM/YYYY") ?>');
        $this->dtgCkptGuia->AddColumn($colFechCkpt);

        $colSucuDest = $this->dtgCkptGuia->MetaAddColumn('HoraCkpt');
        $colSucuDest->Name = 'Hora';

        $this->dtgCkptGuia->SetDataBinder('dtgCkptGuia_Binder');

        $this->dtgCkptGuia->Visible = false;

    }

    public function dtgGuiaCkpt_TextObse_Render(GuiaCkpt $objGuiaCkpt) {
        if ($objGuiaCkpt) {
            return substr($objGuiaCkpt->CodiCkptObject->DescDevo,0,45);
        } else {
            return null;
        }
    }

    protected function dtgCkptGuia_Binder(){

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt,false,QQN::GuiaCkpt()->HoraCkpt,false);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia,$this->strNumeGuia);
        $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->CodiCkptObject->TipoCkpt,SdeTipoCkptType::PUBLICO);

        $this->dtgCkptGuia->DataSource = GuiaCkpt::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
    }

    //------------------------------------
    // Acciones referidas a los objetos
    //------------------------------------

    protected function btnSave_Click() {
        $arrNumeGuia   = explode(',',nl2br2($this->txtListGuia->Text));
        $arrNumeGuia   = LimpiarArreglo($arrNumeGuia);

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Guia()->NumeGuia,$arrNumeGuia);
        $objClauWher[] = QQ::Equal(QQN::Guia()->Anulada,SinoType::NO);

        $arrGuiaCons   = Guia::QueryArray(QQ::AndCondition($objClauWher));
        $intCantGuia   = count($arrGuiaCons);

		$this->strNumeGuia = '';
		$this->lblCkptGuia->Text = 'Detalle de la Guia';
        $this->dtgGuiaCons->Refresh();
        $this->dtgCkptGuia->Refresh();
        $this->mensaje();
		if ($intCantGuia > 0) {
			$strTextMens = 'Haga <b>Click</b> sobre cualquier Guía, para obtener mas detalles sobre el envío';
			$this->mensaje($strTextMens,'','i','',__iINFO__);
            $this->dtgGuiaCons->Visible = true;
            $this->lblGuiaCons->Visible = true;
		} else {
			$strTextMens = 'No hay registros que satisfagan la condición de búsqueda';
			$this->mensaje($strTextMens,'','d','',__iHAND__);
            $this->lblGuiaCons->Visible = false;
            $this->dtgGuiaCons->Visible = false;
		}
        $this->lblCkptGuia->Visible = false;
        $this->dtgCkptGuia->Visible = false;
    }

    protected function dtgGuiaConsRow_Click($strFormId, $strControlId, $strParameter) {
        $this->strNumeGuia = $strParameter;
        $this->dtgCkptGuia->Refresh();
        $this->dtgCkptGuia->Visible = true;
        $this->lblCkptGuia->Text = 'Detalle de la Guía: '.$strParameter;
        $this->lblCkptGuia->Visible = true;
    }

    protected function btnCancel_Click() {
        $this->mensaje();
        $this->strNumeGuia          = '';
        $this->txtListGuia->Text    = '';
        $this->lblGuiaCons->Visible = false;
        $this->dtgGuiaCons->Visible = false;
        $this->lblCkptGuia->Visible = false;
        $this->dtgCkptGuia->Visible = false;
    }

}

Index::Run('Index','index.tpl.php');
