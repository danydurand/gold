<?php
//---------------------------------------------------------------------------------------------------
// Programa       : index.php
// Realizado por  : Daniel Durand
// Fecha Elab.    : 10/06/2021
// Descripcion    : Este programa permite hacer rastreo de guias
//---------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class Index extends FormularioBaseKaizen {
    protected $txtListGuia;
    protected $lblGuiaCons;
    protected $dtgGuiaCons;
    protected $lblGuiaCkpt;
    protected $dtgGuiaCkpt;
    protected $strNumeGuia;
    protected $intCantGuia;
    protected $lblPiezGuia;
    protected $dtgPiezGuia;
    protected $strTipoBusc;

    protected function Form_Create() {
        $objUsuario = Usuario::LoadByLogiUsua('ddurand');
        $_SESSION['User'] = serialize($objUsuario);
        $this->strTipoBusc = Parametros::BP('TipoBusc','RastGuia','Txt1','E');

        parent::Form_Create();

        $this->lblTituForm->Text = 'Nro de Guía';
        $this->btnSave->Text     = TextoIcono('search','','F','lg');
        $this->btnCancel->Text   = TextoIcono('eraser','','F','lg');

        $this->txtListGuia_Create();
        $this->lblGuiaCons_Create();
        $this->dtgGuiaCons_Create();

        $this->lblPiezGuia_Create();
        $this->dtgPiezGuia_Create();

        $this->lblGuiaCkpt_Create();
        $this->dtgGuiaCkpt_Create();
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function txtListGuia_Create() {
        $this->txtListGuia = new QTextBox($this);
        $this->txtListGuia->Width = 180;
        $this->txtListGuia->Placeholder = 'Nro de Guia';
    }

    public function lblGuiaCons_Create() {
        $this->lblGuiaCons = new QLabel($this);
        $this->lblGuiaCons->Text = 'Informacion de la Guía';
        $this->lblGuiaCons->CssClass = 'titulo';
        $this->lblGuiaCons->Visible = false;
    }

    public function lblPiezGuia_Create() {
        $this->lblPiezGuia = new QLabel($this);
        $this->lblPiezGuia->Text = 'Piezas de la Guía';
        $this->lblPiezGuia->CssClass = 'titulo';
        $this->lblPiezGuia->Visible = false;
    }

    public function lblGuiaCkpt_Create() {
        $this->lblGuiaCkpt = new QLabel($this);
        $this->lblGuiaCkpt->Text = 'Status de las Piezas';
        $this->lblGuiaCkpt->CssClass = 'titulo';
        $this->lblGuiaCkpt->Visible = false;
    }

    public function dtgGuiaCons_Create() {
        $this->dtgGuiaCons = new GuiasDataGrid($this);
        $this->dtgGuiaCons->FontSize = 12;
        $this->dtgGuiaCons->ShowFilter = false;

        $this->dtgGuiaCons->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuiaCons->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgGuiaCons->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgGuiaCons->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiaConsRow_Click'));

        $colNumeGuia = $this->dtgGuiaCons->MetaAddColumn('Tracking');
        $colNumeGuia->Name = 'GUIA';

        $colFechGuia = new QDataGridColumn('FECHA','<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>');
        $this->dtgGuiaCons->AddColumn($colFechGuia);

        $colSucuOrig = $this->dtgGuiaCons->MetaAddColumn(QQN::Guias()->Origen->Nombre);
        $colSucuOrig->Name = 'ORIGEN';

        $colSucuDest = $this->dtgGuiaCons->MetaAddColumn(QQN::Guias()->Destino->Nombre);
        $colSucuDest->Name = 'DESTINO';

        $colNombRemi = new QDataGridColumn('REMITENTE','<?= substr($_ITEM->NombreRemitente,0,10) ?>');
        $this->dtgGuiaCons->AddColumn($colNombRemi);

        $colNombDest = new QDataGridColumn('DESTINATARIO','<?= substr($_ITEM->NombreDestinatario,0,10) ?>');
        $this->dtgGuiaCons->AddColumn($colNombDest);

        $this->dtgGuiaCons->SetDataBinder('dtgGuiaCons_Binder');

        $this->dtgGuiaCons->Visible = false;

    }


    protected function dtgGuiaCons_Binder(){
        $strNumeGuia   = trim($this->txtListGuia->Text);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Guias()->Numero,$strNumeGuia);
        if ($this->strTipoBusc == 'E') {
            //------------------
            // Busqueda Exacta
            //------------------
            $objClauWher[] = QQ::Equal(QQN::Guias()->Tracking,$strNumeGuia);
        } else {
            //----------------------------
            // Busqueda por Aproximacion
            //----------------------------
            $objClauWher[] = QQ::Like(QQN::Guias()->Tracking,'%'.$strNumeGuia.'%');
        }

        // Bind the datasource to the datagrid
        $this->dtgGuiaCons->DataSource = Guias::QueryArray(QQ::OrCondition($objClauWher));
    }

    protected function dtgPiezGuia_Create() {
        $this->dtgPiezGuia = new QDataGrid($this);
        $this->dtgPiezGuia->FontSize = 12;
        $this->dtgPiezGuia->ShowFilter = false;

        $this->dtgPiezGuia->CssClass = 'datagrid';
        $this->dtgPiezGuia->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezGuia->UseAjax = true;

        $this->dtgPiezGuia->SetDataBinder('dtgPiezGuia_Bind');

        $this->createDtgPiezGuiaColumns();

        $this->dtgPiezGuia->Visible = false;

    }

    protected function dtgPiezGuia_Bind() {
        if (strlen($this->strNumeGuia)) {
            $objGuia = Guias::Load($this->strNumeGuia);
            $this->dtgPiezGuia->DataSource = $objGuia->GetGuiaPiezasAsGuiaArray();
        }
    }

    protected function createDtgPiezGuiaColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('Pieza');
        $colIdxxPiez->Html = '<?= $_FORM->dtgPiezGuia_IdxxPiez_Render($_ITEM); ?>';
        $this->dtgPiezGuia->AddColumn($colIdxxPiez);

        $colDescPiez = new QDataGridColumn($this);
        $colDescPiez->Name = QApplication::Translate('Contenido');
        $colDescPiez->Html = '<?= $_ITEM->Descripcion; ?>';
        $colDescPiez->Width = 200;
        $this->dtgPiezGuia->AddColumn($colDescPiez);

        $colKiloPiez = new QDataGridColumn($this);
        $colKiloPiez->Name = QApplication::Translate('Kilos');
        $colKiloPiez->Html = '<?= $_ITEM->Kilos; ?>';
        $this->dtgPiezGuia->AddColumn($colKiloPiez);

        $colLibrPiez = new QDataGridColumn($this);
        $colLibrPiez->Name = QApplication::Translate('Libras');
        $colLibrPiez->Html = '<?= $_ITEM->Libras; ?>';
        $this->dtgPiezGuia->AddColumn($colLibrPiez);

        $colPiesPiez = new QDataGridColumn($this);
        $colPiesPiez->Name = QApplication::Translate('PiesCub');
        $colPiesPiez->Html = '<?= $_ITEM->PiesCub; ?>';
        $this->dtgPiezGuia->AddColumn($colPiesPiez);

        $colVoluPiez = new QDataGridColumn($this);
        $colVoluPiez->Name = QApplication::Translate('Volumen');
        $colVoluPiez->Html = '<?= $_ITEM->Volumen; ?>';
        $this->dtgPiezGuia->AddColumn($colVoluPiez);

    }

    public function dtgPiezGuia_IdxxPiez_Render(GuiaPiezas $objGuiaPiez) {
        $strIdxxPiez = explode('-',$objGuiaPiez->IdPieza)[1];
        return utf8_encode($strIdxxPiez);
    }

    protected function dtgGuiaCkpt_Create() {
        $this->dtgGuiaCkpt = new QDataGrid($this);
        $this->dtgGuiaCkpt->FontSize = 12;
        $this->dtgGuiaCkpt->ShowFilter = false;

        $this->dtgGuiaCkpt->CssClass = 'datagrid';
        $this->dtgGuiaCkpt->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaCkpt->UseAjax = true;

        $this->dtgGuiaCkpt->SetDataBinder('dtgGuiaCkpt_Bind');

        $this->createDtgGuiaCkptColumns();

        $this->dtgGuiaCkpt->Visible = false;
    }

    protected function dtgGuiaCkpt_Bind() {
        if (strlen($this->strNumeGuia)) {
            $objCondicion = QQ::Clause();
            $objCondicion[] = QQ::Equal(QQN::PiezaCheckpoints()->Pieza->GuiaId,$this->strNumeGuia);
            $objClauses = array();
            if ($objClause = $this->dtgGuiaCkpt->OrderByClause)
                array_push($objClauses, $objClause);
            if ($objClause = $this->dtgGuiaCkpt->LimitClause)
                array_push($objClauses, $objClause);
            $this->dtgGuiaCkpt->DataSource = PiezaCheckpoints::QueryArray(
                QQ::AndCondition($objCondicion),
                QQ::Clause(
                    QQ::OrderBy(
                        QQN::PiezaCheckpoints()->Id,false
                    )
                )
            );
        }
    }

    protected function createDtgGuiaCkptColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('Pza');
        $colIdxxPiez->Html = '<?= $_FORM->dtgGuiaCkpt_IdxxPiez_Render($_ITEM) ?>';
        $this->dtgGuiaCkpt->AddColumn($colIdxxPiez);

        $colCodiSucu = new QDataGridColumn($this);
        $colCodiSucu->Name = QApplication::Translate('SUC');
        $colCodiSucu->Html = '<?= $_ITEM->Sucursal->Iata; ?>';
        $this->dtgGuiaCkpt->AddColumn($colCodiSucu);

        $colTextObse = new QDataGridColumn($this);
        $colTextObse->Name = QApplication::Translate('Comentario');
        $colTextObse->Html = '<?= $_FORM->dtgGuiaCkpt_TextObse_Render($_ITEM); ?>';
        $colTextObse->Width = 400;
        $this->dtgGuiaCkpt->AddColumn($colTextObse);

        $colFechCkpt = new QDataGridColumn($this);
        $colFechCkpt->Name = QApplication::Translate('Fecha/Hora');
        $colFechCkpt->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY"); ?>';
        $this->dtgGuiaCkpt->AddColumn($colFechCkpt);

        $colUsuaCkpt = new QDataGridColumn($this);
        $colUsuaCkpt->Name = QApplication::Translate('Usuario');
        $colUsuaCkpt->Html = '<?= $_FORM->dtgGuiaCkpt_CodiUsua_Render($_ITEM); ?>';
        $colUsuaCkpt->Width = 15;
        $this->dtgGuiaCkpt->AddColumn($colUsuaCkpt);

    }

    public function dtgGuiaCkpt_IdxxPiez_Render(PiezaCheckpoints $objPiezCkpt) {
        $strIdxxPiez = explode('-',$objPiezCkpt->Pieza->IdPieza)[1];
        return utf8_encode($strIdxxPiez);
    }

    public function dtgGuiaCkpt_TextObse_Render(PiezaCheckpoints $objPiezCkpt) {
        $strCodiCkpt = $objPiezCkpt->Checkpoint->Codigo;
        $strTextObse = $objPiezCkpt->Comentario;
        if (strlen($strTextObse) > 0) {
            $strTextObse = '('.$strCodiCkpt.') '.limpiarCadena($strTextObse);
        }
        return utf8_encode($strTextObse);
    }

    public function dtgGuiaCkpt_CodiUsua_Render(PiezaCheckpoints $objPiezCkpt) {
        if (!is_null($objPiezCkpt->CreatedBy)) {
            $objUsuaCkpt = Usuario::Load($objPiezCkpt->CreatedBy);
            if ($objUsuaCkpt) {
                return $objUsuaCkpt->__toString();
            } else {
                //------------------------
                // Se trata de un Chofer
                //------------------------
                $objUsuaCkpt = Chofer::Load($objPiezCkpt->CreatedBy);
                return $objUsuaCkpt->Login;
            }
        } else {
            return null;
        }
    }

    public function dtgGuiaCkpt_CodiRuta_Render(PiezaCheckpoints $objPiezCkpt) {
        if (!is_null($objPiezCkpt->RutaId)) {
            return $objPiezCkpt->Ruta->Codigo;
        } else {
            return null;
        }
    }


    //------------------------------------
    // Acciones referidas a los objetos
    //------------------------------------

    protected function btnSave_Click() {
        $strNumeGuia   = trim($this->txtListGuia->Text);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Guias()->Numero,$strNumeGuia);
        if ($this->strTipoBusc == 'E') {
            //------------------
            // Busqueda Exacta
            //------------------
            $objClauWher[] = QQ::Equal(QQN::Guias()->Tracking,$strNumeGuia);
        } else {
            //----------------------------
            // Busqueda por Aproximacion
            //----------------------------
            $objClauWher[] = QQ::Like(QQN::Guias()->Tracking,'%'.$strNumeGuia.'%');
        }
        $intCantGuia   = Guias::QueryCount(QQ::OrCondition($objClauWher));

		$this->strNumeGuia = '';
        $this->dtgGuiaCons->Refresh();
        $this->dtgPiezGuia->Refresh();
        $this->dtgGuiaCkpt->Refresh();
        $this->mensaje();
		if ($intCantGuia > 0) {
			$strTextMens = 'Haga <b>Click</b> sobre la Guía, para obtener mas detalles';
			$this->info($strTextMens);
            $this->dtgGuiaCons->Visible = true;
            $this->lblGuiaCons->Visible = true;
            $this->dtgPiezGuia->Visible = true;
            $this->lblPiezGuia->Visible = true;
            $this->lblGuiaCkpt->Visible = true;
        } else {
			$strTextMens = 'No hay registros que satisfagan la condición de búsqueda';
			$this->danger($strTextMens);
            $this->lblGuiaCons->Visible = false;
            $this->dtgGuiaCons->Visible = false;
            $this->dtgPiezGuia->Visible = false;
            $this->lblPiezGuia->Visible = false;
            $this->lblGuiaCkpt->Visible = false;
		}

    }

    protected function dtgGuiaConsRow_Click($strFormId, $strControlId, $strParameter) {
        $this->strNumeGuia = $strParameter;
        $this->dtgPiezGuia->Refresh();
        $this->dtgPiezGuia->Visible = true;
        $this->dtgGuiaCkpt->Refresh();
        $this->dtgGuiaCkpt->Visible = true;
        $this->lblGuiaCkpt->Text = 'Detalle del Tránsito de cada pieza de la Guía';
        $this->lblGuiaCkpt->Visible = true;
    }

    protected function btnCancel_Click() {
        $this->mensaje();
        $this->strNumeGuia          = '';
        $this->txtListGuia->Text    = '';
        $this->lblGuiaCons->Visible = false;
        $this->dtgGuiaCons->Visible = false;
        $this->lblPiezGuia->Visible = false;
        $this->dtgPiezGuia->Visible = false;
        $this->lblGuiaCkpt->Visible = false;
        $this->dtgGuiaCkpt->Visible = false;
    }

}

Index::Run('Index','index.tpl.php');
