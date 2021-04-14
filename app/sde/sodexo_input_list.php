<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SodexoInputListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the SodexoInput class.  It uses the code-generated
 * SodexoInputDataGrid control which has meta-methods to help with
 * easily creating/defining SodexoInput columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sodexo_input_list.php AND
 * sodexo_input_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SodexoInputListForm extends SodexoInputListFormBase {
    // Campos del Filtro
    protected $txtCodiTurp;
    protected $txtGuiaSode;
    protected $calFechDesp;
    protected $txtEstaSode;
    protected $txtRegiPorx;
    protected $calFechRegi;
    protected $txtGuiaIdxx;
    protected $calFechProc;
    protected $txtProcPorx;
    protected $rdbCierCicl;

    protected $btnFiltAvan;
    protected $btnBuscRegi;

    protected $blnHayxCond;
    protected $objClauWher;

    // Override Form Event Handlers as Needed
    protected function Form_Run() {
        parent::Form_Run();

        // Security check for ALLOW_REMOTE_ADMIN
        // To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
        QApplication::CheckRemoteAdmin();           
    }

    //  protected function Form_Load() {}
    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Guías Sodexo';

        $this->txtCodiTurp_Create();
        $this->txtGuiaSode_Create();
        $this->calFechDesp_Create();
        $this->txtEstaSode_Create();
        $this->txtRegiPorx_Create();
        $this->calFechRegi_Create();
        $this->txtGuiaIdxx_Create();
        $this->calFechProc_Create();
        $this->txtProcPorx_Create();
        $this->rdbCierCicl_Create();

        $this->btnFiltAvan_Create();
        $this->btnBuscRegi_Create();

        // Instantiate the Meta DataGrid
        $this->dtgSodexoInputs = new SodexoInputDataGrid($this);
        $this->dtgSodexoInputs->FontSize = 13;
        $this->dtgSodexoInputs->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgSodexoInputs->CssClass = 'datagrid';
        $this->dtgSodexoInputs->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgSodexoInputs->Paginator = new QPaginator($this->dtgSodexoInputs);
        $this->dtgSodexoInputs->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgSodexoInputs->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgSodexoInputs->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgSodexoInputs->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgSodexoInputs->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSodexoInputsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid
        // Create the Other Columns (note that you can use strings for sodexo_input's properties, or you
        // can traverse down QQN::sodexo_input() to display fields that are down the hierarchy)
        $colCodiTurp = $this->dtgSodexoInputs->MetaAddColumn('CodigoTurpial');
        $colCodiTurp->Name = 'Código Turpial';

        $colGuiaSode = $this->dtgSodexoInputs->MetaAddColumn('GuiaSodexo');
        $colGuiaSode->Name = 'Guía Sodexo';

        $colFechDesp = $this->dtgSodexoInputs->MetaAddColumn('FechaDespacho');
        $colFechDesp->Name = 'Fecha Despacho';

        $this->dtgSodexoInputs->MetaAddColumn('Ciudad');
        $this->dtgSodexoInputs->MetaAddColumn('RegistradoPor');

        $colFechRegi = new QDataGridColumn($this);
        $colFechRegi->Name = QApplication::Translate('Fecha Registro');
        $colFechRegi->Html = '<?= $_FORM->dtgSodexoInput_FechaRegistro_Render($_ITEM); ?>';
        $colFechRegi->OrderByClause = QQ::OrderBy(QQN::SodexoInput()->FechaRegistro);
        $colFechRegi->ReverseOrderByClause = QQ::OrderBy(QQN::SodexoInput()->FechaRegistro, false);
        $this->dtgSodexoInputs->AddColumn($colFechRegi);

        $colGuiaLibe = $this->dtgSodexoInputs->MetaAddColumn('GuiaId');
        $colGuiaLibe->Name = 'Guía Lib';

        $colCierCicl = new QDataGridColumn($this);
        $colCierCicl->Name = QApplication::Translate('C.Cerrado ?');
        $colCierCicl->Html = '<?= $_FORM->dtgSodexoInput_CierreCiclo_Render($_ITEM); ?>';
        $colCierCicl->OrderByClause = QQ::OrderBy(QQN::SodexoInput()->CierreCiclo);
        $colCierCicl->ReverseOrderByClause = QQ::OrderBy(QQN::SodexoInput()->CierreCiclo, false);
        $this->dtgSodexoInputs->AddColumn($colCierCicl);

        $this->dtgSodexoInputs->SetDataBinder('dtgSodexoInput_Bind');
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtCodiTurp_Create() {
        $this->txtCodiTurp = new QTextBox($this);
        $this->txtCodiTurp->Name = 'Código Turpial';
        $this->txtCodiTurp->Width = 100;
        $this->txtCodiTurp->Visible = false;
    }

    protected function txtGuiaSode_Create() {
        $this->txtGuiaSode = new QTextBox($this);
        $this->txtGuiaSode->Name = "Guía Sodexo";
        $this->txtGuiaSode->Width = 100;
        $this->txtGuiaSode->Visible = false;
    }

    protected function calFechDesp_Create() {
        $this->calFechDesp = new QCalendar($this);
        $this->calFechDesp->Name = QApplication::Translate('Fecha Despacho');
        $this->calFechDesp->Width = 100;
        $this->calFechDesp->Visible = false;
    }

    protected function txtEstaSode_Create() {
        $this->txtEstaSode = new QTextBox($this);
        $this->txtEstaSode->Name = 'Estado Destino';
        $this->txtEstaSode->Width = 140;
        $this->txtEstaSode->Visible = false;
    }

    protected function txtRegiPorx_Create() {
        $this->txtRegiPorx = new QTextBox($this);
        $this->txtRegiPorx->Name = 'Registrado Por';
        $this->txtRegiPorx->Width = 140;
        $this->txtRegiPorx->Visible = false;
    }

    protected function calFechRegi_Create() {
        $this->calFechRegi = new QCalendar($this);
        $this->calFechRegi->Name = 'Fecha Registro';
        $this->calFechRegi->Width = 100;
        $this->calFechRegi->Visible = false;
    }

    protected function txtGuiaIdxx_Create() {
        $this->txtGuiaIdxx = new QTextBox($this);
        $this->txtGuiaIdxx->Name = 'Guía Liberty';
        $this->txtGuiaIdxx->Width = 100;
        $this->txtGuiaIdxx->Visible = false;
    }

    protected function txtProcPorx_Create() {
        $this->txtProcPorx = new QTextBox($this);
        $this->txtProcPorx->Name = 'Procesado Por';
        $this->txtProcPorx->Width = 140;
        $this->txtProcPorx->Visible = false;
    }

    protected function calFechProc_Create() {
        $this->calFechProc = new QCalendar($this);
        $this->calFechProc->Name = QApplication::Translate('Fecha Proceso');
        $this->calFechProc->Width = 100;
        $this->calFechProc->Visible = false;
    }

    protected function rdbCierCicl_Create() {
        $this->rdbCierCicl = new QRadioButtonList($this);
        $this->rdbCierCicl->Name = 'Ciclo Cerrado ?';
        foreach (SinoType::$NameArray as $intId => $strValue)
            $this->rdbCierCicl->AddItem(new QListItem("&nbsp;$strValue&nbsp;&nbsp;", $intId));
        $this->rdbCierCicl->RepeatColumns = 3;
        $this->rdbCierCicl->HtmlEntities = false;
        $this->rdbCierCicl->Visible = false;
    }

    //----------------------------
    // Aquí se crean los Botónes
    //----------------------------

    protected function btnFiltAvan_Create() {
        $this->btnFiltAvan = new QButton($this);
        $this->btnFiltAvan->Text = '<i class="fa fa-search fa-lg"></i> Filtros';
        $this->btnFiltAvan->CssClass = 'btn btn-success btn-sm';
        $this->btnFiltAvan->HtmlEntities = false;
        $this->btnFiltAvan->AddAction(new QClickEvent(), new QAjaxAction('btnFiltAvan_Click'));
    }

    protected function btnBuscRegi_Create() {
        $this->btnBuscRegi = new QButton($this);
        $this->btnBuscRegi->Text = '<i class="fa fa-cogs fa-lg"></i> Buscar';
        $this->btnBuscRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnBuscRegi->Visible = false;
        $this->btnBuscRegi->HtmlEntities = false;
        $this->btnBuscRegi->PrimaryButton = true;
        $this->btnBuscRegi->AddAction(new QClickEvent(), new QAjaxAction('btnBuscRegi_Click'));
    }

    //-----------------------------------
    // Acciones asociadas a los Objetos
    //-----------------------------------

    public function dtgSodexoInput_FechaRegistro_Render(SodexoInput $objSodexoInput) {
        if (!is_null($objSodexoInput->FechaRegistro))
            return $objSodexoInput->FechaRegistro->__toString(QDateTime::FormatDisplayDate);
        else
            return null;
    }

    public function dtgSodexoInput_CierreCiclo_Render(SodexoInput $objSodexoInput) {
        if (!is_null($objSodexoInput->CierreCiclo))
            return SinoType::ToString($objSodexoInput->CierreCiclo);
        else
            return null;
    }

    protected function dtgSodexoInput_Bind() {
        if (isset($_SESSION['CritCons'])) {
            $this->objClauWher = unserialize($_SESSION['CritCons']);
        } else {
            if (!$this->blnHayxCond) {
                $this->objClauWher[] = QQ::All();
            }
        }
        $this->dtgSodexoInputs->TotalItemCount = SodexoInput::QueryCount(QQ::AndCondition($this->objClauWher));

        $arrGuiaSode = SodexoInput::QueryArray(
            QQ::AndCondition($this->objClauWher),
            QQ::Clause($this->dtgSodexoInputs->OrderByClause, $this->dtgSodexoInputs->LimitClause)
        );

        $this->dtgSodexoInputs->DataSource = $arrGuiaSode;
    }

    protected function btnFiltAvan_Click() {
        $this->txtCodiTurp->Visible = !$this->txtCodiTurp->Visible;
        $this->txtGuiaSode->Visible = !$this->txtGuiaSode->Visible;
        $this->calFechDesp->Visible = !$this->calFechDesp->Visible;
        $this->txtEstaSode->Visible = !$this->txtEstaSode->Visible;
        $this->txtRegiPorx->Visible = !$this->txtRegiPorx->Visible;
        $this->calFechRegi->Visible = !$this->calFechRegi->Visible;
        $this->txtGuiaIdxx->Visible = !$this->txtGuiaIdxx->Visible;
        $this->calFechProc->Visible = !$this->calFechProc->Visible;
        $this->txtProcPorx->Visible = !$this->txtProcPorx->Visible;
        $this->rdbCierCicl->Visible = !$this->rdbCierCicl->Visible;
        $this->btnBuscRegi->Visible = !$this->btnBuscRegi->Visible;
        //$this->mensaje();
    }

    protected function btnBuscRegi_Click() {
        $this->objClauWher = QQ::Clause();
        $this->blnHayxCond = false;
        $this->mensaje();

        if (strlen($this->txtCodiTurp->Text)) {
            $this->objClauWher[] = QQ::Like(QQN::SodexoInput()->CodigoTurpial,trim($this->txtCodiTurp->Text).'%');
            $this->blnHayxCond = true;
        }
        if (strlen($this->txtGuiaSode->Text)) {
            $this->objClauWher[] = QQ::Like(QQN::SodexoInput()->GuiaSodexo,trim($this->txtGuiaSode->Text).'%');
            $this->blnHayxCond = true;
        }
        if (strlen($this->calFechDesp->Text)) {
            $this->objClauWher[] = QQ::Like(QQN::SodexoInput()->FechaDespacho,trim($this->calFechDesp->Text).'%');
            $this->blnHayxCond = true;
        }
        if (strlen($this->txtEstaSode->Text)) {
            $this->objClauWher[] = QQ::Like(QQN::SodexoInput()->Estado,trim($this->txtEstaSode->Text).'%');
            $this->blnHayxCond = true;
        }
        if (strlen($this->txtRegiPorx->Text)) {
            $this->objClauWher[] = QQ::Like(QQN::SodexoInput()->RegistradoPor,trim($this->txtRegiPorx->Text).'%');
            $this->blnHayxCond = true;
        }
        if (!is_null($this->calFechRegi->DateTime)) {
            $this->objClauWher[] = QQ::Equal(QQN::SodexoInput()->FechaRegistro,$this->calFechRegi->DateTime);
            $this->blnHayxCond = true;
        }
        if (strlen($this->txtGuiaIdxx->Text)) {
            $objGuiaSode = Guia::LoadByNumeGuia($this->txtGuiaIdxx->Text);
            if ($objGuiaSode && $objGuiaSode->Anulada == 0) {
                $this->objClauWher[] = QQ::Like(QQN::SodexoInput()->GuiaId,trim($this->txtGuiaIdxx->Text).'%');
                $this->blnHayxCond = true;
            }
        }
        if (strlen($this->txtProcPorx->Text)) {
            $this->objClauWher[] = QQ::Like(QQN::SodexoInput()->ProcesadoPor,trim($this->txtProcPorx->Text).'%');
            $this->blnHayxCond = true;
        }
        if (!is_null($this->calFechProc->DateTime)) {
            $this->objClauWher[] = QQ::Equal(QQN::SodexoInput()->FechaProceso,$this->calFechProc->DateTime);
            $this->blnHayxCond = true;
        }
        if (!is_null($this->rdbCierCicl->SelectedValue)) {
            $this->objClauWher[] = QQ::Equal(QQN::SodexoInput()->CierreCiclo,$this->rdbCierCicl->SelectedValue);
            $this->blnHayxCond = true;
        }

        $this->dtgSodexoInputs->Refresh();

        if ($this->blnHayxCond) {
            $intCantRegi = SodexoInput::QueryCount(QQ::AndCondition($this->objClauWher));
            if (!$intCantRegi > 0) {
                $this->mensaje('No se han encontrado registros!','','d','hand-stop-o');
            }
        } else {
            $this->mensaje('Mostrando las Últimas <b>20 Guías</b>!','','i','eye');
        }

        $this->btnFiltAvan_Click();
    }

    public function dtgSodexoInputsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("sodexo_input_edit.php/$intId");
    }       
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// sodexo_input_list.tpl.php as the included HTML template file
SodexoInputListForm::Run('SodexoInputListForm');
?>