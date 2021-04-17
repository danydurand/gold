<?php
/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Factura class.  It uses the code-generated
 * FacturaDataGrid control which has meta-methods to help with
 * easily creating/defining Factura columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both factura_list.php AND
 * factura_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class FacturaListFormBase extends QForm {
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $lblTituForm;
    protected $btnNuevRegi;
    protected $btnFiltAvan;
    protected $btnExpoExce;

    // Local instance of the Meta DataGrid to list Facturas
    /**
     * @var FacturaDataGrid dtgFacturas
     */
    protected $dtgFacturas;

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
        $this->dtgFacturas = new FacturaDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgFacturas->CssClass = 'datagrid';
        $this->dtgFacturas->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgFacturas->FontSize = 13;
        $this->dtgFacturas->ShowFilter = false;

        // Add Pagination (if desired)
        $this->dtgFacturas->Paginator = new QPaginator($this->dtgFacturas);
        $this->dtgFacturas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgFacturas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgFacturas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgFacturas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgFacturas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFacturasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for factura's properties, or you
        // can traverse down QQN::factura() to display fields that are down the hierarchy)
        $this->dtgFacturas->MetaAddColumn('Id');
        $this->dtgFacturas->MetaAddColumn(QQN::Factura()->CodiClieObject);
        $this->dtgFacturas->MetaAddColumn(QQN::Factura()->Cliente);
        $this->dtgFacturas->MetaAddColumn('RazonSocial');
        $this->dtgFacturas->MetaAddColumn('Direccion');
        $this->dtgFacturas->MetaAddColumn('Telefono');
        $this->dtgFacturas->MetaAddColumn('Fecha');
        $this->dtgFacturas->MetaAddColumn('Serie');
        $this->dtgFacturas->MetaAddColumn('ControlSeniat');
        $this->dtgFacturas->MetaAddColumn('MontoBase');
        $this->dtgFacturas->MetaAddColumn('MontoFranqueo');
        $this->dtgFacturas->MetaAddColumn('PorcentajeIva');
        $this->dtgFacturas->MetaAddColumn('MontoIva');
        $this->dtgFacturas->MetaAddColumn('MontoSeguro');
        $this->dtgFacturas->MetaAddColumn('MontoOtros');
        $this->dtgFacturas->MetaAddColumn('MontoAduana');
        $this->dtgFacturas->MetaAddColumn('MontoTotal');
        $this->dtgFacturas->MetaAddColumn(QQN::Factura()->Caja);
        $this->dtgFacturas->MetaAddColumn(QQN::Factura()->Sucursal);
        $this->dtgFacturas->MetaAddColumn(QQN::Factura()->UsuarioCreacionObject);
        $this->dtgFacturas->MetaAddTypeColumn('StatusId', 'StatusFactType');
        $this->dtgFacturas->MetaAddColumn('ControlId');
        $this->dtgFacturas->MetaAddColumn(QQN::Factura()->UsuarioAnulacionObject);
        $this->dtgFacturas->MetaAddColumn('MotivoAnulacion');
        $this->dtgFacturas->MetaAddColumn('FechaAnulacion');
        $this->dtgFacturas->MetaAddColumn('FechaTrans');
        $this->dtgFacturas->MetaAddColumn('HoraTrans');
        $this->dtgFacturas->MetaAddColumn(QQN::Factura()->TipoDocumento);
        $this->dtgFacturas->MetaAddColumn('CedulaRif');
        $this->dtgFacturas->MetaAddColumn('Numero');
        $this->dtgFacturas->MetaAddColumn('NumeroDeGuias');
        $this->dtgFacturas->MetaAddColumn('DsctoPorVolumen');
        $this->dtgFacturas->MetaAddColumn('MontoDsctoVolumen');
        $this->dtgFacturas->MetaAddColumn('PesoTotal');
        $this->dtgFacturas->MetaAddColumn('DsctoPorPeso');
        $this->dtgFacturas->MetaAddColumn('MontoDsctoPeso');
        $this->dtgFacturas->MetaAddColumn('TicketFiscal');
        $this->dtgFacturas->MetaAddColumn('PersonaAutorizada');
        $this->dtgFacturas->MetaAddTypeColumn('Impresa', 'SinoType');
        $this->dtgFacturas->MetaAddColumn(QQN::Factura()->Sistema);
        $this->dtgFacturas->MetaAddColumn('DireccionEntrega');
        $this->dtgFacturas->MetaAddColumn('TipoImpresora');

        $this->btnExpoExce_Create();

    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Facturas';
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
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgFacturas);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/factura_edit.php');
    }

    protected function btnFiltAvan_Click() {
        $this->dtgFacturas->ShowFilter = !$this->dtgFacturas->ShowFilter;
    }

    public function dtgFacturasRow_Click($strFormId, $strControlId, $strParameter) {
      $intId = intval($strParameter);
      QApplication::Redirect("factura_edit.php/$intId");
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
