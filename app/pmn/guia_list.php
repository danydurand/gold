<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Guia class.  It uses the code-generated
 * GuiaDataGrid control which has meta-methods to help with
 * easily creating/defining Guia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_list.php AND
 * guia_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiaListForm extends GuiaListFormBase {
    protected $objUsuario;
    protected $objClauWher;
    protected $blnHayxCond;

    //----------------------------------------------------------------------
    // Parámetros de información (criterios para filtrar búsqueda de guías)
    //----------------------------------------------------------------------

    // ---- Lado Izquierdo ----
    protected $txtNumeGuia;
    protected $txtCeduRemi;
    protected $txtNombRemi;
    protected $txtCeduDest;
    protected $txtNombDest;
    protected $calFechInic;
    protected $calFechFina;
    protected $txtNumePrec;
    // ---- Lado Derecho ----
    protected $lstTipoPago;
    protected $lstCodiOrig;
    protected $lstReceOrig;
    protected $lstCodiDest;
    protected $lstReceDest;
    protected $lstTienPodx;
    protected $lstCodiCkpt;
    protected $chkGuiaAnul;

    //--------------------------------------------------------
    // Botones vinculados al formulario de filtro de búsqueda
    //--------------------------------------------------------
    protected $btnBuscRegi;

    // Override Form Event Handlers as Needed
    protected function Form_Run() {
        parent::Form_Run();

        // Security check for ALLOW_REMOTE_ADMIN
        // To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
        QApplication::CheckRemoteAdmin();
    }

    //		protected function Form_Load() {}

    protected function Form_Create() {
        parent::Form_Create();

        $this->objUsuario = unserialize($_SESSION['User']);

        //-----------------------
        // Criterios de búsqueda
        //-----------------------

        //---- Lado Izquierdo ----

        $this->txtNumeGuia_Create();
        $this->txtCeduRemi_Create();
        $this->txtNombRemi_Create();
        $this->txtCeduDest_Create();
        $this->txtNombDest_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->txtNumePrec_Create();

        //---- Lado Derecho ----

        $this->lstTipoPago_Create();
        $this->lstCodiOrig_Create();
        $this->lstReceOrig_Create();
        $this->lstCodiDest_Create();
        $this->lstReceDest_Create();
        $this->lstTienPodx_Create();
        $this->lstCodiCkpt_Create();
        $this->chkGuiaAnul_Create();

        //--------------------
        // Botones del filtro
        //--------------------
        $this->btnBuscRegi_Create();

        // Instantiate the Meta DataGrid
        $this->dtgGuias = new GuiaDataGrid($this);
        $this->dtgGuias->FontSize = 13;
        $this->dtgGuias->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgGuias->CssClass = 'datagrid';
        $this->dtgGuias->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgGuias->Paginator = new QPaginator($this->dtgGuias);
        $this->dtgGuias->ItemsPerPage = 20;

        $this->dtgGuias->SortColumnIndex = 1;
        $this->dtgGuias->SortDirection = 0;

        // Higlight the datagrid rows when mousing over them
        $this->dtgGuias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgGuias->RowActionParameterHtml = '<?= $_ITEM->NumeGuia ?>';
        $this->dtgGuias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for guia's properties, or you
        // can traverse down QQN::guia() to display fields that are down the hierarchy)
        $colNumeGuia = $this->dtgGuias->MetaAddColumn('NumeGuia');
        $colNumeGuia->Name = 'Guia';

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->FechGuia->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia);
        $this->dtgGuias->AddColumn($colFechGuia);

        $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaOrigObject);

        $colReceOrig = $this->dtgGuias->MetaAddColumn('ReceptoriaOrigen');
        $colReceOrig->Name = 'R. ORIG';

        $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaDestObject);

        $colReceDest = $this->dtgGuias->MetaAddColumn('ReceptoriaDestino');
        $colReceDest->Name = 'R. DEST';

        $this->dtgGuias->MetaAddColumn('NombRemi');

        //$this->dtgGuias->MetaAddTypeColumn('TipoGuia', 'TipoGuiaType');
        $colTipoGuia = new QDataGridColumn('M. Pago', '<?= TipoGuiaType::ToStringCorto($_ITEM->TipoGuia) ?>');
        $colTipoGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->TipoGuia);
        $colTipoGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->TipoGuia,false);
        $colTipoGuia->FilterType = QFilterType::ListFilter;
        $colTipoGuia->FilterAddListItem('COD',QQ::Equal(QQN::Guia()->TipoGuia,3));
        $colTipoGuia->FilterAddListItem('PPD',QQ::Equal(QQN::Guia()->TipoGuia,1));
        $this->dtgGuias->AddColumn($colTipoGuia);

        $colCodiCkpt = $this->dtgGuias->MetaAddColumn('CodiCkpt');
        $colCodiCkpt->Name = 'CKPT';

        $this->dtgGuias->MetaAddColumn(QQN::Guia()->Sistema);

        $colPrexFact = new QDataGridColumn('Fact.', '<?= $_FORM->PrexFact_Render($_ITEM) ?>');
        $colPrexFact->Width = 60;
        $this->dtgGuias->AddColumn($colPrexFact);

        $this->dtgGuias->SetDataBinder('dtgGuias_Bind');

        $this->btnExpoExce_Create();

    }

    //---------------------
    // Creación de objetos
    //---------------------

    //--------------------------------
    // ... criterios de búsqueda
    //--------------------------------

    // ---- Lado Izquierdo del Formulario ----

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = 'Nro. Guía';
        $this->txtNumeGuia->Width = 100;
        $this->txtNumeGuia->Visible = false;
    }

    protected function txtCeduRemi_Create() {
        $this->txtCeduRemi = new QTextBox($this);
        $this->txtCeduRemi->Name = QApplication::Translate('Cedula Remitente');
        $this->txtCeduRemi->Width = 100;
        $this->txtCeduRemi->Visible = false;
    }

    protected function txtNombRemi_Create() {
        $this->txtNombRemi = new QTextBox($this);
        $this->txtNombRemi->Name = QApplication::Translate('Nombre Remitente');
        $this->txtNombRemi->Visible = false;
    }

    protected function txtCeduDest_Create() {
        $this->txtCeduDest = new QTextBox($this);
        $this->txtCeduDest->Name = QApplication::Translate('Cedula Dest.');
        $this->txtCeduDest->Visible = false;
    }

    protected function txtNombDest_Create() {
        $this->txtNombDest = new QTextBox($this);
        $this->txtNombDest->Name = QApplication::Translate('Nombre Dest.');
        $this->txtNombDest->Visible = false;
    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Name = QApplication::Translate('Fecha Inicial');
        $this->calFechInic->Width = 100;
        $this->calFechInic->Visible = false;
    }

    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Name = QApplication::Translate('Fecha Final');
        $this->calFechFina->Width = 100;
        $this->calFechFina->Visible = false;
    }

    protected function txtNumePrec_Create() {
        $this->txtNumePrec = new QTextBox($this);
        $this->txtNumePrec->Name = QApplication::Translate('Numero Precinto');
        $this->txtNumePrec->Visible = false;
    }

    // ---- Lado Derecho del Formulario ----

    protected function lstTipoPago_Create() {
        $this->lstTipoPago = new QListBox($this);
        $this->lstTipoPago->Name = QApplication::Translate('Tipo de Pago');
        $this->lstTipoPago->Width = 200;
        $this->lstTipoPago->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstTipoPago->AddItem(QApplication::Translate('PPD'), 1);
        $this->lstTipoPago->AddItem(QApplication::Translate('COD'), 3);
        $this->lstTipoPago->Visible = false;
    }

    protected function lstCodiOrig_Create() {
        $this->lstCodiOrig = new QListBox($this);
        $this->lstCodiOrig->Name = QApplication::Translate('Sucursal Origen');
        $this->lstCodiOrig->Width = 200;
        $this->lstCodiOrig->Visible = false;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
        $arrCodiOrig   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantOrig   = count($arrCodiOrig);
        $this->lstCodiOrig->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantOrig.')'),null);
        foreach ($arrCodiOrig as $objSucursal) {
            $this->lstCodiOrig->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
        }
        $this->lstCodiOrig->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiOrig_Change'));
    }

    protected function lstReceOrig_Create() {
        $this->lstReceOrig = new QListBox($this);
        $this->lstReceOrig->Name = QApplication::Translate('Receptoria Origen');
        $this->lstReceOrig->Width = 200;
        $this->lstReceOrig->AddItem('- Seleccione Uno -',null);
        $this->lstReceOrig->Visible = false;
    }

    protected function lstCodiDest_Create() {
        $this->lstCodiDest = new QListBox($this);
        $this->lstCodiDest->Name = QApplication::Translate('Sucursal Destino');
        $this->lstCodiDest->Width = 200;
        $this->lstCodiDest->Visible = false;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
        $arrCodiDest   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantDest   = count($arrCodiDest);
        $this->lstCodiDest->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantDest.')'),null);
        foreach ($arrCodiDest as $objSucursal) {
            $this->lstCodiDest->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
        }
        $this->lstCodiDest->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiDest_Change'));
    }

    protected function lstReceDest_Create() {
        $this->lstReceDest = new QListBox($this);
        $this->lstReceDest->Name = QApplication::Translate('Receptoria Destino');
        $this->lstReceDest->Width = 200;
        $this->lstReceDest->AddItem('- Seleccione Uno -',null);
        $this->lstReceDest->Visible = false;
    }

    protected function lstTienPodx_Create() {
        $this->lstTienPodx = new QListBox($this);
        $this->lstTienPodx->Name = QApplication::Translate('Tiene POD ?');
        $this->lstTienPodx->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstTienPodx->AddItem(QApplication::Translate('SI'),'SI');
        $this->lstTienPodx->AddItem(QApplication::Translate('NO'),'NO');
        $this->lstTienPodx->Visible = false;
    }

    protected function lstCodiCkpt_Create() {
        $this->lstCodiCkpt = new QListBox($this);
        $this->lstCodiCkpt->Name = QApplication::Translate('Status');
        $this->lstCodiCkpt->Width = 200;
        $this->lstCodiCkpt->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        foreach (SdeCheckpoint::LoadAll() as $objStatus) {
            if (in_array(trim($objStatus->TextObse),array('SDE'))) {
                if ($objStatus->CodiInad == SinoType::SI || in_array($objStatus->CodiCkpt,array('AR','AV','TR'))) {
                    $this->lstCodiCkpt->AddItem($objStatus->__toString(),$objStatus->CodiCkpt);
                }
            }
        }
        $this->lstCodiCkpt->Visible = false;
    }

    protected function chkGuiaAnul_Create() {
        $this->chkGuiaAnul = new QCheckBox($this);
        $this->chkGuiaAnul->Name = QApplication::Translate('Excluir Guias Anuladas?');
        $this->chkGuiaAnul->Checked = true;
        $this->chkGuiaAnul->Visible = false;
    }

    //---------------------------------------------
    // ... botones asociados al filtro de búsqueda
    //---------------------------------------------

    protected function btnBuscRegi_Create() {
        $this->btnBuscRegi = new QButton($this);
        $this->btnBuscRegi->Text = TextoIcono('cogs','Buscar','F','lg');
        $this->btnBuscRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnBuscRegi->HtmlEntities = false;
        $this->btnBuscRegi->Visible = false;
        $this->btnBuscRegi->PrimaryButton = true;
        $this->btnBuscRegi->AddAction(new QClickEvent(), new QAjaxAction('btnBuscRegi_Click'));
    }

    //----------------------------
    // Otros eventos del programa
    //----------------------------

    public function PrexFact_Render(Guia $objGuia) {
        if ($objGuia->EstaFacturada()) {
            return 'F';
        } else {
            if ($objGuia->EstaPreFacturada()) {
                return 'P';
            } else {
                return '';
            }
        }
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/cargar_guia.php');
    }

    public function dtgGuiasRow_Click($strFormId, $strControlId, $strParameter) {
        $strNumeGuia = trim($strParameter);
        QApplication::Redirect("consulta_guia.php/$strNumeGuia");
    }

    protected function btnFiltAvan_Click() {
        $this->txtNumeGuia->Visible = !$this->txtNumeGuia->Visible;
        $this->txtCeduRemi->Visible = !$this->txtCeduRemi->Visible;
        $this->txtNombRemi->Visible = !$this->txtNombRemi->Visible;
        $this->txtCeduDest->Visible = !$this->txtCeduDest->Visible;
        $this->txtNombDest->Visible = !$this->txtNombDest->Visible;
        $this->calFechInic->Visible = !$this->calFechInic->Visible;
        $this->calFechFina->Visible = !$this->calFechFina->Visible;
        $this->txtNumePrec->Visible = !$this->txtNumePrec->Visible;

        $this->lstTipoPago->Visible = !$this->lstTipoPago->Visible;
        $this->lstCodiOrig->Visible = !$this->lstCodiOrig->Visible;
        $this->lstReceOrig->Visible = !$this->lstReceOrig->Visible;
        $this->lstCodiDest->Visible = !$this->lstCodiDest->Visible;
        $this->lstReceDest->Visible = !$this->lstReceDest->Visible;
        $this->lstTienPodx->Visible = !$this->lstTienPodx->Visible;
        $this->lstCodiCkpt->Visible = !$this->lstCodiCkpt->Visible;
        $this->chkGuiaAnul->Visible = !$this->chkGuiaAnul->Visible;

        $this->btnBuscRegi->Visible = !$this->btnBuscRegi->Visible;
    }

    protected function lstCodiOrig_Change() {
        if (!is_null($this->lstCodiOrig->SelectedValue)) {
            $this->lstReceOrig->RemoveAllItems();
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Counter()->Descripcion);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Counter()->StatusId,StatusType::ACTIVO);
            $objClauWher[] = QQ::Equal(QQN::Counter()->SucursalId,$this->lstCodiOrig->SelectedValue);
            $arrReceOrig   = Counter::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            $intCantOrig   = count($arrReceOrig);
            $this->lstReceOrig->AddItem('- Seleccione Uno - ('.$intCantOrig.')',null);
            foreach ($arrReceOrig as $objReceOrig) {
                $this->lstReceOrig->AddItem($objReceOrig->__toString(),$objReceOrig->Siglas);
            }
        }
    }

    protected function lstCodiDest_Change() {
        if (!is_null($this->lstCodiDest->SelectedValue)) {
            $this->lstReceDest->RemoveAllItems();
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Counter()->Descripcion);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Counter()->StatusId,StatusType::ACTIVO);
            $objClauWher[] = QQ::Equal(QQN::Counter()->SucursalId,$this->lstCodiDest->SelectedValue);
            $arrReceDest   = Counter::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            $intCantDest   = count($arrReceDest);
            $this->lstReceDest->AddItem('- Seleccione Uno - ('.$intCantDest.')',null);
            foreach ($arrReceDest as $objReceDest) {
                $this->lstReceDest->AddItem($objReceDest->__toString(),$objReceDest->Siglas);
            }
        }
    }

    protected function btnBuscRegi_Click() {
        $this->objClauWher = QQ::Clause();
        $this->blnHayxCond = false;

        if (strlen($this->txtNumeGuia->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,DejarSoloLosNumeros($this->txtNumeGuia->Text));
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtCeduRemi->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->CedulaRif,DejarSoloLosNumeros($this->txtCeduRemi->Text));
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtNombRemi->Text)) {
            $this->objClauWher[] = QQ::Like(QQN::Guia()->NombRemi,trim($this->txtNombRemi->Text).'%');
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtCeduDest->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->CedulaDestinatario,DejarSoloLosNumeros($this->txtCeduDest->Text));
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtNombDest->Text)) {
            $this->objClauWher[] = QQ::Like(QQN::Guia()->NombDest,trim($this->txtNombDest->Text).'%');
            $this->blnHayxCond = true;
        }

        if (!is_null($this->calFechInic->DateTime)) {
            $this->objClauWher[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$this->calFechInic->DateTime);
            $this->blnHayxCond = true;
        }

        if (!is_null($this->calFechFina->DateTime)) {
            $this->objClauWher[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$this->calFechFina->DateTime);
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtNumePrec->Text) > 0) {
            $objManiSelec = SdeContenedor::Load($this->txtNumePrec->Text);
            if ($objManiSelec) {
                $arrGuiaPrec = $objManiSelec->GetGuiaArray();
                if ($arrGuiaPrec) {
                    $arrNumeGuia = array();
                    foreach ($arrGuiaPrec as $objManiSelec) {
                        $arrNumeGuia[] = $objManiSelec->NumeGuia;
                    }
                    $this->objClauWher[] = QQ::In(QQN::Guia()->NumeGuia,$arrNumeGuia);
                } else {
                    $this->objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,0);
                }
            } else {
                $this->objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,0);
            }
            $this->blnHayxCond = true;
        }

        if (!is_null($this->lstTipoPago->SelectedValue)) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->TipoGuia, $this->lstTipoPago->SelectedValue);
            $this->blnHayxCond = true;
        }

        if (!is_null($this->lstCodiOrig->SelectedValue)) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->EstaOrig,$this->lstCodiOrig->SelectedValue);
            $this->blnHayxCond = true;
        }

        if (!is_null($this->lstReceOrig->SelectedValue)) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->ReceptoriaOrigen,$this->lstReceOrig->SelectedValue);
            $this->blnHayxCond = true;
        }

        if (!is_null($this->lstCodiDest->SelectedValue)) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->EstaDest,$this->lstCodiDest->SelectedValue);
            $this->blnHayxCond = true;
        }

        if (!is_null($this->lstReceDest->SelectedValue)) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->ReceptoriaDestino,$this->lstReceDest->SelectedValue);
            $this->blnHayxCond = true;
        }

        if ($this->lstTienPodx->SelectedValue) {
            if ($this->lstTienPodx->SelectedValue == 'SI') {
                $this->objClauWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,'OK');
            } else {
                $this->objClauWher[] = QQ::NotEqual(QQN::Guia()->CodiCkpt,'OK');
            }
            $this->blnHayxCond = true;
        }

        if (!is_null($this->lstCodiCkpt->SelectedValue)) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,$this->lstCodiCkpt->SelectedValue);
            $this->blnHayxCond = true;
        }

        if ($this->chkGuiaAnul->Checked) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->Anulada,0);
            $this->blnHayxCond = true;
        }

        $this->dtgGuias->Refresh();

        if ($this->blnHayxCond) {
            $intCantRegi = Guia::QueryCount(QQ::AndCondition($this->objClauWher));

            if (!$intCantRegi > 0) {
                //$this->mensaje('No se han encontrado registros','','d','exclamation-triangle');
                $this->mensaje('No se han encontrado registros','','d');
            }
        } else {
            //$this->mensaje('Showing last 50 WHRs','','i','eyes');
            $this->mensaje('Mostrando las últimas 20 guías','','i');
        }

        $this->btnFiltAvan_Click();
    }

    protected function dtgGuias_Bind() {
        if (isset($_SESSION['CritCons'])) {
            $this->objClauWher   = unserialize($_SESSION['CritCons']);
        } else {
            if (!$this->blnHayxCond) {
                $this->objClauWher[] = QQ::Equal(QQN::Guia()->FechGuia,date("Y-m-d"));
                $this->objClauWher[] = QQ::Equal(QQN::Guia()->UsuarioCreacion,$this->objUsuario->LogiUsua);
            }
        }

        $this->dtgGuias->TotalItemCount = Guia::QueryCount(QQ::AndCondition($this->objClauWher));

        $this->dtgGuias->DataSource = Guia::QueryArray(
            QQ::AndCondition($this->objClauWher),
            QQ::Clause($this->dtgGuias->OrderByClause, $this->dtgGuias->LimitClause)
        );
        $_SESSION['DataGuia'] = serialize($this->dtgGuias->DataSource);
    }
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_list.tpl.php as the included HTML template file
GuiaListForm::Run('GuiaListForm');
?>
