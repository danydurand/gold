<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__ . '/FormularioBaseKaizen.class.php');

class GuiaListAlt extends FormularioBaseKaizen {
    /**
     * @var $objUsuario UsuarioConnect
     */
    protected $dtgGuias;

    protected function SetupValues() {
        $this->objUsuario = unserialize($_SESSION['User']);
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Lista de Guías';

        $this->SetupValues();

        $this->dtgGuias_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function dtgGuias_Create()
    {
        $this->dtgGuias = new GuiaDataGrid($this);
        $this->dtgGuias->FontSize = 12;
        $this->dtgGuias->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgGuias->CssClass = 'datagrid';
        $this->dtgGuias->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgGuias->Paginator = new QPaginator($this->dtgGuias);
        $this->dtgGuias->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgGuias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgGuias->RowActionParameterHtml = '<?= $_ITEM->NumeGuia ?>';
        $this->dtgGuias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasRow_Click'));

        //-------------------------------------------------------------
        // Cláusula adicional para ordenar por Fecha y Número de Guía.
        //-------------------------------------------------------------
        $objClauOrde[] = QQ::OrderBy(QQN::Guia()->FechGuia, false, QQN::Guia()->NumeGuia, false);
        /*
        //-----------------------
        // Evaluando filtros ...
        //-----------------------
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie, $this->objSubxClie->intCodiClie);
        $objClauWher[] = QQ::Equal(QQN::Guia()->Anulada, 0);
        if (isset($_GET['f'])) {
            $strFiltComu = $_GET['f'];
            switch ($strFiltComu) {
                case 'hoy':
                    $objClauWher[] = QQ::Equal(QQN::Guia()->FechGuia,date("Y-m-d"));
                    break;
                case 'gnr':
                    $arrCodiCkpt = array('NR','RP');
                    $objClauWher[] = QQ::In(QQN::Guia()->CodiCkpt,$arrCodiCkpt);
                    break;
                case 'get':
                    $arrCodiCkpt = array('NR','RP','OK');
                    $objClauWher[] = QQ::NotIn(QQN::Guia()->CodiCkpt,$arrCodiCkpt);
                    break;
                case 'ge':
                    $objClauWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,'OK');
                    break;
                default:
                    //$this->dtgGuias->ShowFilter = true;
                    $this->btnFiltAvan_Click();
                    break;
            }
        } elseif (isset($_GET['i'])) {
            $strImprMani = $_GET['i'];
            switch ($strImprMani) {
                case 'dia':
                    $this->btnManiDiar_Click();
                    break;
                default:
                    //$this->dtgGuias->ShowFilter = true;
                    $this->btnFiltAvan_Click();
                    break;
            }
        }

        $this->dtgGuias->AdditionalConditions = QQ::AndCondition($objClauWher);
        $this->dtgGuias->AdditionalClauses = $objClauOrde;
        */

        $colStatGuia = new QDataGridColumn('ST', '<?= $_FORM->StatusColumnRender($_ITEM) ?>');
        $colStatGuia->HtmlEntities         = false;
        $colStatGuia->Width                = 10;
        $this->dtgGuias->AddColumn($colStatGuia);

        $colNumeGuia = $this->dtgGuias->MetaAddColumn('NumeGuia');
        $colNumeGuia->FilterBoxSize = 6;
        $colNumeGuia->Name = 'Guía';

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->FechGuia->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia);
        $colFechGuia->Filter = QQ::Equal(QQN::Guia()->FechGuia,null);
        $colFechGuia->FilterBoxSize = 9;
        $this->dtgGuias->AddColumn($colFechGuia);

        $colOrigGuia = $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaOrig);
        $colOrigGuia->FilterBoxSize = 2;
        $colOrigGuia->Name = 'Orig';

        $colDestGuia = $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaDest);
        $colDestGuia->FilterBoxSize = 2;
        $colDestGuia->Name = 'Dest';

        $colNombDest = new QDataGridColumn('DESTINATARIO','<?= $_FORM->dtgNombDest_Render($_ITEM) ?>');
        $colNombDest->Filter = QQ::Equal(QQN::Guia()->NombDest, null);
        $colNombDest->FilterType = QFilterType::TextFilter;
        $colNombDest->FilterBoxSize = 16;
        $this->dtgGuias->AddColumn($colNombDest);

        $colStatGuia = new QDataGridColumn('ESTATUS','<?= $_FORM->dtgDescStat_Render($_ITEM) ?>');
        $colStatGuia->Filter = QQ::Equal(QQN::Guia()->ObseCkpt, null);
        $colStatGuia->FilterType = QFilterType::TextFilter;
        $colStatGuia->FilterBoxSize = 46;
        $this->dtgGuias->AddColumn($colStatGuia);

        $colSucCkpt = $this->dtgGuias->MetaAddColumn('EstaCkpt');
        $colSucCkpt->FilterBoxSize = 2;
        $colSucCkpt->Name = 'SUC';

        $colFechGuia = new QDataGridColumn('FECHA ESTATUS','<?= $_ITEM->FechCkpt->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt);
        $this->dtgGuias->AddColumn($colFechGuia);

        $colHoraCkpt = $this->dtgGuias->MetaAddColumn('HoraCkpt');
        $colHoraCkpt->FilterType = null;
        $colHoraCkpt->Name = 'HORA ESTATUS';

        $colUsuaCrea = $this->dtgGuias->MetaAddColumn('UsuarioCreacion');
        $colUsuaCrea->FilterBoxSize = 5;
        $colUsuaCrea->Name = 'USUARIO';

        $this->dtgGuias->SetDataBinder('dtgGuias_Bind');
    }

    public function StatusColumnRender(Guia $objGuia) {
        if (!is_null($objGuia->CodiCkpt)) {
            $objCkptGuia = SdeCheckpoint::Load($objGuia->CodiCkpt);
            if (strlen($objCkptGuia->Imagen) > 0) {
                return TextoIconoColor($objCkptGuia->Imagen,'','','lg',$objCkptGuia->Color);
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function dtgNombDest_Render(Guia $objGuiaList) {
        if ($objGuiaList) {
            return substr(limpiarCadena($objGuiaList->NombDest),0,40).'...';
        } else {
            return null;
        }
    }

    public function dtgDescStat_Render(Guia $objGuiaList) {
        if ($objGuiaList) {
            return substr($objGuiaList->ObseCkpt,0,40).'...';
        } else {
            return null;
        }
    }

    protected function dtgGuias_Bind()
    {

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie,$this->objUsuario->Cliente->CodiClie);
        $this->dtgGuias->TotalItemCount = Guia::QueryCount(QQ::AndCondition($objClauWher));

        $arrGuiaNaci = Guia::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgGuias->OrderByClause, $this->dtgGuias->LimitClause)
        );

        $this->dtgGuias->DataSource = $arrGuiaNaci;

    }

}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_list.tpl.php as the included HTML template file
GuiaListAlt::Run('GuiaListAlt');
?>