<?php
/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Guias class.  It uses the code-generated
 * GuiasDataGrid control which has meta-methods to help with
 * easily creating/defining Guias columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guias_list.php AND
 * guias_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class GuiasListFormBase extends QForm {
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $lblTituForm;
    protected $btnNuevRegi;
    protected $btnFiltAvan;
    protected $btnExpoExce;

    // Local instance of the Meta DataGrid to list Guiases
    /**
     * @var GuiasDataGrid dtgGuiases
     */
    protected $dtgGuiases;

    // Create QForm Event Handlers as Needed

    //		protected function Form_Exit() {}
    //		protected function Form_Load() {}
    //		protected function Form_PreRender() {}
    //		protected function Form_Validate() {}

    protected function Form_Run() {
        parent::Form_Run();
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblMensUsua_Create();
        $this->lblNotiUsua_Create();
        $this->lblTituForm_Create();
        $this->btnNuevRegi_Create();
        $this->btnFiltAvan_Create();

        // Instantiate the Meta DataGrid
        $this->dtgGuiases = new GuiasDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgGuiases->CssClass = 'datagrid';
        $this->dtgGuiases->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgGuiases->FontSize = 13;
        $this->dtgGuiases->ShowFilter = false;

        // Add Pagination (if desired)
        $this->dtgGuiases->Paginator = new QPaginator($this->dtgGuiases);
        $this->dtgGuiases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgGuiases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuiases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgGuiases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgGuiases->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for guias's properties, or you
        // can traverse down QQN::guias() to display fields that are down the hierarchy)
        $this->dtgGuiases->MetaAddColumn('Id');
        $this->dtgGuiases->MetaAddColumn('Numero');
        $this->dtgGuiases->MetaAddColumn('Tracking');
        $this->dtgGuiases->MetaAddColumn('Fecha');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->ClienteRetail);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->ClienteCorp);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->ClienteInt);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Origen);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Destino);
        $this->dtgGuiases->MetaAddColumn('ServicioEntrega');
        $this->dtgGuiases->MetaAddColumn('ServicioImportacion');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Producto);
        $this->dtgGuiases->MetaAddColumn('FormaPago');
        $this->dtgGuiases->MetaAddColumn('NombreRemitente');
        $this->dtgGuiases->MetaAddColumn('DireccionRemitente');
        $this->dtgGuiases->MetaAddColumn('TelefonoRemitente');
        $this->dtgGuiases->MetaAddColumn('NombreDestinatario');
        $this->dtgGuiases->MetaAddColumn('DireccionDestinatario');
        $this->dtgGuiases->MetaAddColumn('TelefonoDestinatario');
        $this->dtgGuiases->MetaAddColumn('Contenido');
        $this->dtgGuiases->MetaAddColumn('Piezas');
        $this->dtgGuiases->MetaAddColumn('ValorDeclarado');
        $this->dtgGuiases->MetaAddColumn('TipoExport');
        $this->dtgGuiases->MetaAddColumn('Asegurado');
        $this->dtgGuiases->MetaAddColumn('Total');
        $this->dtgGuiases->MetaAddColumn('Estado');
        $this->dtgGuiases->MetaAddColumn('Ciudad');
        $this->dtgGuiases->MetaAddColumn('CodigoPostal');
        $this->dtgGuiases->MetaAddColumn('Tasa');
        $this->dtgGuiases->MetaAddColumn('Ubicacion');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Vendedor);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Tarifa);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->TarifaAgente);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->ReceptoriaOrigen);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->ReceptoriaDestino);
        $this->dtgGuiases->MetaAddColumn('Kilos');
        $this->dtgGuiases->MetaAddColumn('Libras');
        $this->dtgGuiases->MetaAddColumn('Largo');
        $this->dtgGuiases->MetaAddColumn('Ancho');
        $this->dtgGuiases->MetaAddColumn('Alto');
        $this->dtgGuiases->MetaAddColumn('Volumen');
        $this->dtgGuiases->MetaAddColumn('PiesCub');
        $this->dtgGuiases->MetaAddColumn('MetrosCub');
        $this->dtgGuiases->MetaAddColumn('CedulaDestinatario');
        $this->dtgGuiases->MetaAddColumn('FacturaId');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->GuiaPod);
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->NotaEntrega);
        $this->dtgGuiases->MetaAddColumn('Observacion');
        $this->dtgGuiases->MetaAddColumn('CreatedAt');
        $this->dtgGuiases->MetaAddColumn('UpdatedAt');
        $this->dtgGuiases->MetaAddColumn('DeletedAt');
        $this->dtgGuiases->MetaAddColumn('CreatedBy');
        $this->dtgGuiases->MetaAddColumn('UpdatedBy');
        $this->dtgGuiases->MetaAddColumn('DeletedBy');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->EstadisticaDeGuias);

        $this->btnExpoExce_Create();

    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Guiases';
    }

    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
        $this->lblMensUsua->Text = '';
        $this->lblMensUsua->HtmlEntities = false;
    }

    protected function lblNotiUsua_Create() {
        $this->lblNotiUsua = new QLabel($this);
        $this->lblNotiUsua->Text = '';
        $this->lblNotiUsua->HtmlEntities = false;
    }

    protected function btnNuevRegi_Create() {
        $this->btnNuevRegi = new QButton($this);
        $this->btnNuevRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
        $this->btnNuevRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnNuevRegi->HtmlEntities = false;
        $this->btnNuevRegi->AddAction(new QClickEvent(), new QServerAction('btnNuevRegi_Click'));
    }

    protected function btnFiltAvan_Create() {
        $this->btnFiltAvan = new QButton($this);
        $this->btnFiltAvan->Text = '<i class="fa fa-filter fa-lg"></i> Filtro';
        $this->btnFiltAvan->CssClass = 'btn btn-success btn-sm';
        $this->btnFiltAvan->HtmlEntities = false;
        $this->btnFiltAvan->AddAction(new QClickEvent(), new QServerAction('btnFiltAvan_Click'));
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgGuiases);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/guias_edit.php');
    }

    protected function btnFiltAvan_Click() {
        $this->dtgGuiases->ShowFilter = !$this->dtgGuiases->ShowFilter;
    }

    public function dtgGuiasesRow_Click($strFormId, $strControlId, $strParameter) {
      $intId = intval($strParameter);
      QApplication::Redirect("guias_edit.php/$intId");
    }


    protected function ninfo($strTextMens) {
        $this->mensaje($strTextMens,'n','i',null,__iINFO__);
    }

    protected function ndanger($strTextMens) {
        $this->mensaje($strTextMens,'n','d',null,__iHAND__);
    }

    protected function nwarning($strTextMens) {
        $this->mensaje($strTextMens,'n','w',null,__iEXCL__);
    }

    protected function nsuccess($strTextMens) {
        $this->mensaje($strTextMens,'n','s',null,__iCHEC__);
    }


    protected function info($strTextMens) {
        $this->mensaje($strTextMens,'m','i',null,__iINFO__);
    }

    protected function danger($strTextMens) {
        $this->mensaje($strTextMens,'m','d',null,__iHAND__);
    }

    protected function warning($strTextMens) {
        $this->mensaje($strTextMens,'m','w',null,__iEXCL__);
    }

    protected function success($strTextMens) {
        $this->mensaje($strTextMens,'m','s',null,__iCHEC__);
    }


    protected function mensaje($strTextNoti='', $strTipoMens='m', $strClasMens='s', $strPosiIcon='l', $strNombIcon='') {
        if (strlen($strTextNoti) == 0) {
            $this->lblMensUsua->Text = '';
            $this->lblMensUsua->HtmlEntities = false;
            $this->lblMensUsua->CssClass = '';
            $this->lblNotiUsua->Text = '';
            $this->lblNotiUsua->HtmlEntities = false;
            $this->lblNotiUsua->CssClass = '';
        } else {
            //------------------------------------------
            // Aqui se determina el estilo del mensaje
            //------------------------------------------
            $strClasAsig = 'alert alert-';
            switch (strtolower($strClasMens)) {
                case 'i':
                    $strClasAsig .= 'info';
                    break;
                case 's':
                    $strClasAsig .= 'success';
                    break;
                case 'w':
                    $strClasAsig .= 'warning';
                    break;
                case 'd':
                    $strClasAsig .= 'danger';
                    break;
                default:
                    $strClasAsig .= 'success';
            }
            if (strlen($strNombIcon) > 0) {
                $strNombIcon = '<i class="fa fa-'.$strNombIcon.' fa-lg"></i> ';
            }
            if ($strPosiIcon == 'i') {
                //---------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //---------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            } elseif ($strPosiIcon == 'r') {
                //---------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //---------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            } else {
                //-----------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //-----------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            }
        }
    }
}
?>
