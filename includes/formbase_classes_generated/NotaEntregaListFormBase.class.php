<?php
/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the NotaEntrega class.  It uses the code-generated
 * NotaEntregaDataGrid control which has meta-methods to help with
 * easily creating/defining NotaEntrega columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both nota_entrega_list.php AND
 * nota_entrega_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class NotaEntregaListFormBase extends QForm {
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $lblTituForm;
    protected $btnNuevRegi;
    protected $btnFiltAvan;
    protected $btnExpoExce;
    protected $lblOtraNoti;

    // Local instance of the Meta DataGrid to list NotaEntregas
    /**
     * @var NotaEntregaDataGrid dtgNotaEntregas
     */
    protected $dtgNotaEntregas;

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
        $this->lblOtraNoti_Create();
        $this->btnNuevRegi_Create();
        $this->btnFiltAvan_Create();

        // Instantiate the Meta DataGrid
        $this->dtgNotaEntregas = new NotaEntregaDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgNotaEntregas->CssClass = 'datagrid';
        $this->dtgNotaEntregas->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgNotaEntregas->FontSize = 13;
        $this->dtgNotaEntregas->ShowFilter = false;

        // Add Pagination (if desired)
        $this->dtgNotaEntregas->Paginator = new QPaginator($this->dtgNotaEntregas);
        $this->dtgNotaEntregas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgNotaEntregas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgNotaEntregas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgNotaEntregas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgNotaEntregas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgNotaEntregasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for nota_entrega's properties, or you
        // can traverse down QQN::nota_entrega() to display fields that are down the hierarchy)
        $this->dtgNotaEntregas->MetaAddColumn('Id');
        $this->dtgNotaEntregas->MetaAddColumn(QQN::NotaEntrega()->ClienteCorp);
        $this->dtgNotaEntregas->MetaAddColumn('Referencia');
        $this->dtgNotaEntregas->MetaAddColumn('NombreArchivo');
        $this->dtgNotaEntregas->MetaAddColumn('Estatus');
        $this->dtgNotaEntregas->MetaAddColumn('ServicioImportacion');
        $this->dtgNotaEntregas->MetaAddColumn('Facturable');
        $this->dtgNotaEntregas->MetaAddColumn('EnKilos');
        $this->dtgNotaEntregas->MetaAddColumn('CargaRecibida');
        $this->dtgNotaEntregas->MetaAddColumn('Cargadas');
        $this->dtgNotaEntregas->MetaAddColumn('PorProcesar');
        $this->dtgNotaEntregas->MetaAddColumn('PorCorregir');
        $this->dtgNotaEntregas->MetaAddColumn('Procesadas');
        $this->dtgNotaEntregas->MetaAddColumn('Recibidas');
        $this->dtgNotaEntregas->MetaAddColumn('Sobrantes');
        $this->dtgNotaEntregas->MetaAddColumn('Libras');
        $this->dtgNotaEntregas->MetaAddColumn('Kilos');
        $this->dtgNotaEntregas->MetaAddColumn('PiesCub');
        $this->dtgNotaEntregas->MetaAddColumn('Volumen');
        $this->dtgNotaEntregas->MetaAddColumn('Piezas');
        $this->dtgNotaEntregas->MetaAddColumn('Fecha');
        $this->dtgNotaEntregas->MetaAddColumn('Hora');
        $this->dtgNotaEntregas->MetaAddColumn(QQN::NotaEntrega()->Usuario);
        $this->dtgNotaEntregas->MetaAddColumn(QQN::NotaEntrega()->Tarifa);
        $this->dtgNotaEntregas->MetaAddColumn(QQN::NotaEntrega()->Factura);
        $this->dtgNotaEntregas->MetaAddColumn('Total');
        $this->dtgNotaEntregas->MetaAddColumn('ValorDeclarado');
        $this->dtgNotaEntregas->MetaAddColumn('Observacion');
        $this->dtgNotaEntregas->MetaAddColumn('RelacionSobrantes');
        $this->dtgNotaEntregas->MetaAddColumn('CreatedAt');
        $this->dtgNotaEntregas->MetaAddColumn('UpdatedAt');
        $this->dtgNotaEntregas->MetaAddColumn('DeletedAt');
        $this->dtgNotaEntregas->MetaAddColumn('CreatedBy');
        $this->dtgNotaEntregas->MetaAddColumn('UpdatedBy');
        $this->dtgNotaEntregas->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'NotaEntregas';
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

    protected function lblOtraNoti_Create() {
        $this->lblOtraNoti = new QLabel($this);
        $this->lblOtraNoti->Text = '';
        $this->lblOtraNoti->HtmlEntities = false;
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
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgNotaEntregas);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/nota_entrega_edit.php');
    }

    protected function btnFiltAvan_Click() {
        $this->dtgNotaEntregas->ShowFilter = !$this->dtgNotaEntregas->ShowFilter;
    }

    public function dtgNotaEntregasRow_Click($strFormId, $strControlId, $strParameter) {
      $intId = intval($strParameter);
      QApplication::Redirect("nota_entrega_edit.php/$intId");
    }


    protected function oinfo($strTextMens) {
        $this->mensaje($strTextMens,'o','i',null,__iINFO__);
    }

    protected function odanger($strTextMens) {
        $this->mensaje($strTextMens,'o','d',null,__iHAND__);
    }

    protected function owarning($strTextMens) {
        $this->mensaje($strTextMens,'o','w',null,__iEXCL__);
    }

    protected function osuccess($strTextMens) {
        $this->mensaje($strTextMens,'o','s',null,__iCHEC__);
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
