<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__ . '/FormularioBaseKaizen.class.php');

class GuiaListNew extends FormularioBaseKaizen {
    /**
     * @var $objUsuario UsuarioConnect
     */
    protected $objUsuario;
    protected $dtgGuiaClie;

    protected $btnMostFilt;
    protected $btnFiltDhoy;
    protected $btnFiltPend;
    protected $btnFiltTran;
    protected $btnFiltEntr;
    protected $btnFiltToda;

    protected $btnMostImpr;
    protected $btnImprMani;
    protected $btnImprLote;
    protected $btnExpoExce;

    protected $objWaitIcon;

    protected $btnFiltAvan;
    protected $btnApliFilt;
    protected $txtNumeGuia;
    protected $calFechInic;
    protected $calFechFina;
    protected $lstCodiOrig;
    protected $lstCodiDest;

    protected function Form_Create() {
        parent::Form_Create();

        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->objWaitIcon = new QWaitIcon($this);

        $this->lblTituForm->Text = 'Lista de Guias';

        if (!isset($_SESSION['FiltGuia'])) {
            $_SESSION['FiltGuia'] = '';
        }

        $this->btnMostFilt_Create();
        $this->btnFiltDhoy_Create();
        $this->btnFiltPend_Create();
        $this->btnFiltTran_Create();
        $this->btnFiltEntr_Create();
        $this->btnFiltToda_Create();

        $this->btnMostImpr_Create();
        $this->btnImprMani_Create();
        $this->btnImprLote_Create();
        $this->btnExpoExce_Create();

        $this->btnFiltAvan_Create();
        $this->btnApliFilt_Create();
        $this->txtNumeGuia_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->lstCodiOrig_Create();
        $this->lstCodiDest_Create();

        $this->dtgGuiaClie_Create();

        $this->btnCancel->Visible = false;

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function btnFiltAvan_Create() {
        $this->btnFiltAvan = new QButtonD($this);
        $this->btnFiltAvan->Text = TextoIcono('filter','Opciones de Filtro Avanzado');
        $this->btnFiltAvan->AddAction(new QClickEvent(), new QServerAction('btnFiltAvan_Click'));
        $this->btnFiltAvan->HtmlEntities = 'false';
        $this->btnFiltAvan->Visible = true;
        $this->btnFiltAvan->CausesValidation = false;
    }

    protected function btnApliFilt_Create() {
        $this->btnApliFilt = new QButton($this);
        $this->btnApliFilt->Text = TextoIcono('cogs','Buscar');
        $this->btnApliFilt->AddAction(new QClickEvent(), new QServerAction('btnApliFilt_Click'));
        $this->btnApliFilt->HtmlEntities = 'false';
        $this->btnApliFilt->CssClass = 'btn btn-primary btn-sm';
        $this->btnApliFilt->Visible = false;
        $this->btnApliFilt->CausesValidation = false;
        $this->btnApliFilt->PrimaryButton = true;
    }

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = 'Nro de Guía';
        $this->txtNumeGuia->Width = 100;
        $this->txtNumeGuia->Visible = false;
        $this->txtNumeGuia->Placeholder = 'Nro de Guía';
    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Name = QApplication::Translate('Fecha Inicial');
        $this->calFechInic->Width = 120;
        $this->calFechInic->Visible = false;
        $this->calFechInic->Placeholder = 'Fecha Inicial';
    }

    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Name = QApplication::Translate('Fecha Final');
        $this->calFechFina->Width = 120;
        $this->calFechFina->Visible = false;
        $this->calFechFina->Placeholder = 'Fecha Final';
    }

    protected function lstCodiOrig_Create() {
        $this->lstCodiOrig = new QListBox($this);
        $this->lstCodiOrig->Name = 'Origen';
        $this->lstCodiOrig->Width = 120;
        $this->lstCodiOrig->Visible = false;
        $arrCodiOrig = Sucursales::LoadSucursalesActivas();
        $this->lstCodiOrig->AddItem('Origen',null);
        foreach ($arrCodiOrig as $objSucursal) {
            $this->lstCodiOrig->AddItem($objSucursal->__toString(),$objSucursal->Id);
        }
    }

    protected function lstCodiDest_Create() {
        $this->lstCodiDest = new QListBox($this);
        $this->lstCodiDest->Name = 'Destino';
        $this->lstCodiDest->Width = 120;
        $this->lstCodiDest->Visible = false;
        $arrCodiDest   = Sucursales::LoadSucursalesActivas();
        $this->lstCodiDest->AddItem('Destino',null);
        foreach ($arrCodiDest as $objSucursal) {
            $this->lstCodiDest->AddItem($objSucursal->__toString(),$objSucursal->Id);
        }
    }

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i>';
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->Visible = true;
        $this->btnCancel->CausesValidation = false;
    }

    protected function btnMostFilt_Create() {
        $this->btnMostFilt = new QButtonS($this);
        $this->btnMostFilt->Text = TextoIcono('filter fa-lg','Filtros Predeterminados','F','lg');
        $this->btnMostFilt->AddAction(new QClickEvent(), new QAjaxAction('btnMostFilt_Click'));
    }

    protected function btnFiltDhoy_Create() {
        $this->btnFiltDhoy = new QButtonS($this);
        $this->btnFiltDhoy->Text = TextoIcono('sun-o','De Hoy','F','lg');
        $this->btnFiltDhoy->ActionParameter = 'H';
        $this->btnFiltDhoy->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltDhoy->Visible = false;
    }

    protected function btnFiltPend_Create() {
        $this->btnFiltPend = new QButtonD($this);
        $this->btnFiltPend->Text = TextoIcono('dot-circle-o','Por Recolectar','F','lg');
        $this->btnFiltPend->ActionParameter = 'P';
        $this->btnFiltPend->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltPend->Visible = false;
    }

    protected function btnFiltTran_Create() {
        $this->btnFiltTran = new QButtonP($this);
        $this->btnFiltTran->Text = TextoIcono('truck','En Tránsito','F','lg');
        $this->btnFiltTran->ActionParameter = 'T';
        $this->btnFiltTran->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltTran->Visible = false;
    }

    protected function btnFiltEntr_Create() {
        $this->btnFiltEntr = new QButtonW($this);
        $this->btnFiltEntr->Text = TextoIcono('check','Entregadas','F','lg');
        $this->btnFiltEntr->ActionParameter = 'E';
        $this->btnFiltEntr->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltEntr->Visible = false;
    }

    protected function btnFiltToda_Create() {
        $this->btnFiltToda = new QButtonI($this);
        $this->btnFiltToda->Text = TextoIcono('align-justify','Todas','F','lg');
        $this->btnFiltToda->ActionParameter = 'A';
        $this->btnFiltToda->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltToda->Visible = false;
    }

    protected function btnMostImpr_Create() {
        $this->btnMostImpr = new QButtonI($this);
        $this->btnMostImpr->Text = TextoIcono('print fa-lg','Opciones de Impresion');
        $this->btnMostImpr->AddAction(new QClickEvent(), new QServerAction('btnMostImpr_Click'));
        $this->btnMostImpr->Visible = true;
    }

    protected function btnImprMani_Create() {
        $this->btnImprMani = new QButtonS($this);
        $this->btnImprMani->Text = TextoIcono('file fa-lg','Formato Manifiesto');
        $this->btnImprMani->AddAction(new QClickEvent(), new QServerAction('btnImprMani_Click'));
        $this->btnImprMani->Visible = false;
    }

    protected function btnImprLote_Create() {
        $this->btnImprLote = new QButtonP($this);
        $this->btnImprLote->Text = TextoIcono('clone fa-lg','Guías Individuales');
        $this->btnImprLote->AddAction(new QClickEvent(), new QServerAction('btnImprLote_Click'));
        $this->btnImprLote->Visible = false;
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QButtonP($this);
        $this->btnExpoExce->Text = TextoIcono('download fa-lg','Exportar XLS');
        $this->btnExpoExce->AddAction(new QClickEvent(), new QServerAction('btnExpoExce_Click'));
        $this->btnExpoExce->Visible = true;
    }

    protected function dtgGuiaClie_Create() {
        $this->dtgGuiaClie = new GuiasDataGrid($this);
        $this->dtgGuiaClie->FontSize = 12;
        $this->dtgGuiaClie->ShowFilter = false;
        $this->dtgGuiaClie->SortColumnIndex = 1;
        $this->dtgGuiaClie->SortDirection = 1;

        $this->dtgGuiaClie->CssClass = 'datagrid';
        $this->dtgGuiaClie->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaClie->Paginator = new QPaginator($this->dtgGuiaClie);
        $this->dtgGuiaClie->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        //$objClauOrde   = QQ::Clause();
        //$objClauOrde[] = QQ::OrderBy(QQN::Guias()->Id,false);
        //$this->dtgGuiaClie->AdditionalClauses = $objClauOrde;

        $this->dtgGuiaClie->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuiaClie->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgGuiaClie->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgGuiaClie->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiaRowx_Click'));

        $this->dtgGuiaClie->MetaAddColumn('Tracking','Name=Nro Guia');

        $colFechGuia = new QDataGridColumn('F. Guia','<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guias()->Fecha, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guias()->Fecha);
        $this->dtgGuiaClie->AddColumn($colFechGuia);

        $this->dtgGuiaClie->MetaAddColumn(QQN::Guias()->Origen->Iata,'Name=Orig');

        $this->dtgGuiaClie->MetaAddColumn(QQN::Guias()->Destino->Iata,'Name=Dest');

        $colNombDest = new QDataGridColumn('DESTINATARIO','<?= $_FORM->dtgNombDest_Render($_ITEM) ?>');
        $this->dtgGuiaClie->AddColumn($colNombDest);

        $this->dtgGuiaClie->MetaAddColumn(QQN::Guias()->Piezas);

        $colStatGuia = new QDataGridColumn('ULT. ESTATUS','<?= $_ITEM->ultimoCheckpoint("CodigoCkpt",true) ?>');
        $colStatGuia->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgGuiaClie->AddColumn($colStatGuia);

        $colSucuCkpt = new QDataGridColumn('SUC','<?= $_ITEM->ultimoCheckpoint("Iata",true); ?>');
        $colSucuCkpt->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgGuiaClie->AddColumn($colSucuCkpt);

        $colFechGuia = new QDataGridColumn('FECHA','<?= $_ITEM->ultimoCheckpoint("Fecha",true); ?>');
        $this->dtgGuiaClie->AddColumn($colFechGuia);

        $colHoraCkpt = new QDataGridColumn('HORA','<?= $_ITEM->ultimoCheckpoint("Hora",true); ?>');
        $this->dtgGuiaClie->AddColumn($colHoraCkpt);

        $this->dtgGuiaClie->MetaAddColumn(QQN::Guias()->NotaEntrega->Referencia,'Name=Manif.');

        $this->dtgGuiaClie->SetDataBinder('dtgGuiaClie_Bind');
    }

    protected function dtgGuiaClie_Bind() {
        $dttFechLimi   = SumaRestaDiasAFecha(FechaDeHoy(),180,'-');
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Guias()->ClienteCorpId,$this->objUsuario->Cliente->CodiClie);
        $objClauWher[] = QQ::IsNull(QQN::Guias()->DeletedBy);
        $objClauWher[] = QQ::GreaterThan(QQN::Guias()->Fecha,$dttFechLimi);

        $this->lblTituForm->Text = 'Guías';
        $strTituFilt = '';
        if (isset($_SESSION['FiltGuia'])) {
            switch ($_SESSION['FiltGuia']) {
                case 'H':   // De Hoy
                    $objClauWher[] = QQ::Equal(QQN::Guias()->Fecha,date("Y-m-d"));
                    $strTituFilt = ' (DE HOY)';
                    $this->limpiarFiltroAvanzado();
                    break;
                case 'P':   // Pendientes por Recolectar
                    $arrCodiCkpt = array('NR');
                    $objClauWher[] = QQ::In(QQN::Guias()->GuiaPiezasAsGuia->PiezaCheckpointsAsPieza->Checkpoint->Codigo,$arrCodiCkpt);
                    $strTituFilt = ' (POR RECOLECTAR)';
                    $this->limpiarFiltroAvanzado();
                    break;
                case 'T':   // Guias En Transito
                    $arrCodiCkpt   = array('NR','OK');
                    $objClauWher[] = QQ::NotIn(QQN::Guias()->GuiaPiezasAsGuia->PiezaCheckpointsAsPieza->Checkpoint->Codigo,$arrCodiCkpt);
                    $strTituFilt = ' (EN TRÁNSITO)';
                    $this->limpiarFiltroAvanzado();
                    break;
                case 'E':   // Entregadas
                    $objClauWher[] = QQ::Equal(QQN::Guias()->GuiaPiezasAsGuia->PiezaCheckpointsAsPieza->Checkpoint->Codigo,'OK');
                    $strTituFilt = ' (ENTREGADAS)';
                    $this->limpiarFiltroAvanzado();
                    break;
                case 'Z':   // Filtro Avanzado
                    $strTituFilt = ' (AVANZADO)';
                    if (strlen($this->txtNumeGuia->Text) > 0) {
                        $objClauWher[] = QQ::Equal(QQN::Guias()->Tracking,$this->txtNumeGuia->Text);
                    }
                    if (!is_null($this->calFechInic->DateTime)) {
                        $objClauWher[] = QQ::GreaterOrEqual(QQN::Guias()->Fecha,$this->calFechInic->DateTime);
                    }
                    if (!is_null($this->calFechFina->DateTime)) {
                        $objClauWher[] = QQ::LessOrEqual(QQN::Guias()->Fecha,$this->calFechFina->DateTime);
                    }
                    if (!is_null($this->lstCodiOrig->SelectedValue)) {
                        $objClauWher[] = QQ::Equal(QQN::Guias()->OrigenId,$this->lstCodiOrig->SelectedValue);
                    }
                    if (!is_null($this->lstCodiDest->SelectedValue)) {
                        $objClauWher[] = QQ::Equal(QQN::Guias()->DestinoId,$this->lstCodiDest->SelectedValue);
                    }
                    break;
                default:   // Todas las Guias
                    $strTituFilt = ' (TODAS)';
                    $this->limpiarFiltroAvanzado();
            }
        }
        $this->lblTituForm->Text .= $strTituFilt;

        $this->dtgGuiaClie->TotalItemCount = Guias::QueryCount(QQ::AndCondition($objClauWher));
        $arrGuiaNaci = Guias::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgGuiaClie->OrderByClause, $this->dtgGuiaClie->LimitClause)
        );
        $this->dtgGuiaClie->DataSource = $arrGuiaNaci;
        $_SESSION['DataTabl'] = serialize($arrGuiaNaci);

        //-------------------------------------------------------------------
        // Este vector de nros de guias, se utiliza en la impresion en lote
        //-------------------------------------------------------------------
        $objSeleColu = QQ::Select(QQN::Guias()->Id);
        $arrDataGuia = Guias::QueryArray(QQ::AndCondition($objClauWher),QQ::Clause($objSeleColu));
        $arrSoloGuia = array();
        foreach ($arrDataGuia as $objSoloGuia) {
            $arrSoloGuia[] = $objSoloGuia->Id;
        }
        $_SESSION['NrosGuia'] = $arrSoloGuia;

    }

    public function dtgNombDest_Render(Guias $objGuiaList) {
        if ($objGuiaList) {
            return substr(limpiarCadena($objGuiaList->NombreDestinatario),0,40).'...';
        } else {
            return null;
        }
    }

    //--------------------------
    // Acciones de los objetos
    //--------------------------

    protected function btnApliFilt_Click() {
        $_SESSION['FiltGuia'] = 'Z';
        $this->btnFiltAvan_Click('','','');
        $this->dtgGuiaClie->Refresh();
    }

    protected function btnFiltAvan_Click($strFormId, $strControlId, $strParameter) {
        $this->mostrarFiltroAvanzado(!$this->txtNumeGuia->Visible);
    }

    protected function limpiarFiltroAvanzado() {
        $this->txtNumeGuia->Text          = '';
        $this->calFechInic->DateTime      = null;
        $this->calFechFina->DateTime      = null;
        $this->lstCodiOrig->SelectedIndex = 0;
        $this->lstCodiDest->SelectedIndex = 0;
    }

    protected function mostrarFiltroAvanzado($blnMostFilt) {
        $this->txtNumeGuia->Visible = $blnMostFilt;
        $this->calFechInic->Visible = $blnMostFilt;
        $this->calFechFina->Visible = $blnMostFilt;
        $this->lstCodiOrig->Visible = $blnMostFilt;
        $this->lstCodiDest->Visible = $blnMostFilt;
        $this->btnApliFilt->Visible = $blnMostFilt;
    }


    protected function dtgGuiaRowx_Click($strFormId, $strControlId, $strParameter) {
        $strNumeGuia = strval($strParameter);
        QApplication::Redirect(__SIST__."/consulta_guia.php/$strNumeGuia");
    }

    protected function btnExpoExce_Click() {
        QApplication::Redirect(__SIST__."/exportar_guias_nros.php");
    }

    protected function btnMostImpr_Click() {
        $this->mostrarFiltros(false);
        $this->mostrarFiltroAvanzado(false);
        $this->mostrarOpcionesDeImpresion(true);
    }

    protected function btnCancel_Click() {
        $this->mostrarFiltros(false);
        $this->mostrarFiltroAvanzado(false);
        $this->mostrarOpcionesDeImpresion(false);
        $this->btnExpoExce->Visible = true;
        $this->btnFiltAvan->Visible = true;
    }

    protected function btnMostFilt_Click() {
        $this->mostrarFiltros(true);
        $this->mostrarFiltroAvanzado(false);
        $this->mostrarOpcionesDeImpresion(false);
    }

    protected function mostrarFiltros($blnMostFilt) {
        $this->btnCancel->Visible   = !$this->btnCancel->Visible;
        $this->btnMostFilt->Visible = !$this->btnMostFilt->Visible;
        $this->btnExpoExce->Visible = false;
        $this->btnFiltAvan->Visible = false;
        $this->btnFiltDhoy->Visible = $blnMostFilt;
        $this->btnFiltPend->Visible = $blnMostFilt;
        $this->btnFiltTran->Visible = $blnMostFilt;
        $this->btnFiltEntr->Visible = $blnMostFilt;
        $this->btnFiltToda->Visible = $blnMostFilt;
    }

    protected function btnFiltGuia_Click($strFormId, $strControlId, $strParameter) {
        $_SESSION['FiltGuia'] = $strParameter;
        $this->dtgGuiaClie->Refresh();
    }

    protected function mostrarOpcionesDeImpresion($blnMostImpr) {
        $this->btnMostImpr->Visible = !$this->btnMostImpr->Visible;
        $this->btnExpoExce->Visible = false;
        $this->btnFiltAvan->Visible = false;
        $this->btnImprMani->Visible = $blnMostImpr;
        $this->btnImprLote->Visible = $blnMostImpr;
    }

    protected function btnImprLote_Click() {
        $strUrlxLote = __SIST__.'/guia_pdf_lote_new.php';
        QApplication::Redirect($strUrlxLote);
    }

    protected function btnImprMani_Click() {
        $arrDatoMani = $_SESSION['NrosGuia'];
        $arrImprMani = array();

        foreach ($arrDatoMani as $strNumeGuia) {
            $objDatoMani = Guias::Load($strNumeGuia);
            $arrImprMani[] = array(
                $objDatoMani->Numero,
                $objDatoMani->Fecha->__toString("DD/MM/YYYY"),
                substr($objDatoMani->NombreRemitente,0,30),
                substr($objDatoMani->NombreDestinatario,0,30),
                $objDatoMani->Libras,
                $objDatoMani->Piezas,
                $objDatoMani->FormaPago,
                $objDatoMani->Origen->Iata."-".$objDatoMani->Destino->Iata
            );
        }

        if (count($arrImprMani)) {
            $arrEnca2PDF = array('Guia Nro.','Fecha','Remitente','Destinatario','Peso','Cant Piez','Tipo','ORI-DES');
            $arrAnch2PDF = array(20,20,60,60,20,16,16,20);
            $arrJust2PDF = array('C','C','L','L','R','R','C','C');

            $_SESSION['Dato'] = serialize($arrImprMani);
            $_SESSION['Enca'] = serialize($arrEnca2PDF);
            $_SESSION['Anch'] = serialize($arrAnch2PDF);
            $_SESSION['Just'] = serialize($arrJust2PDF);
            QApplication::Redirect(__UTIL__.'/tabla_pdf.php?nomb_repo=Manifiesto_Diario&nomb_empr='.$this->objUsuario->Cliente->NombClie);
        }

    }
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_list.tpl.php as the included HTML template file
GuiaListNew::Run('GuiaListNew');
?>