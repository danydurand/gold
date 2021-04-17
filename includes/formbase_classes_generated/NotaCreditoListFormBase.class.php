<?php
/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the NotaCredito class.  It uses the code-generated
 * NotaCreditoDataGrid control which has meta-methods to help with
 * easily creating/defining NotaCredito columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both nota_credito_list.php AND
 * nota_credito_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class NotaCreditoListFormBase extends QForm {
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $lblTituForm;
    protected $btnNuevRegi;
    protected $btnFiltAvan;
    protected $btnExpoExce;

    // Local instance of the Meta DataGrid to list NotaCreditos
    /**
     * @var NotaCreditoDataGrid dtgNotaCreditos
     */
    protected $dtgNotaCreditos;

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
        $this->dtgNotaCreditos = new NotaCreditoDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgNotaCreditos->CssClass = 'datagrid';
        $this->dtgNotaCreditos->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgNotaCreditos->FontSize = 13;
        $this->dtgNotaCreditos->ShowFilter = false;

        // Add Pagination (if desired)
        $this->dtgNotaCreditos->Paginator = new QPaginator($this->dtgNotaCreditos);
        $this->dtgNotaCreditos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgNotaCreditos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgNotaCreditos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgNotaCreditos->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgNotaCreditos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgNotaCreditosRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for nota_credito's properties, or you
        // can traverse down QQN::nota_credito() to display fields that are down the hierarchy)
        $this->dtgNotaCreditos->MetaAddColumn('Id');
        $this->dtgNotaCreditos->MetaAddColumn(QQN::NotaCredito()->Factura);
        $this->dtgNotaCreditos->MetaAddColumn('CedulaRif');
        $this->dtgNotaCreditos->MetaAddColumn('RazonSocial');
        $this->dtgNotaCreditos->MetaAddColumn('DireccionFiscal');
        $this->dtgNotaCreditos->MetaAddColumn('Telefono');
        $this->dtgNotaCreditos->MetaAddColumn('Concepto');
        $this->dtgNotaCreditos->MetaAddColumn('Numero');
        $this->dtgNotaCreditos->MetaAddColumn('MaquinaFiscal');
        $this->dtgNotaCreditos->MetaAddColumn('FechaImpresion');
        $this->dtgNotaCreditos->MetaAddColumn('HoraImpresion');
        $this->dtgNotaCreditos->MetaAddColumn('MontoBase');
        $this->dtgNotaCreditos->MetaAddColumn('MontoFranqueo');
        $this->dtgNotaCreditos->MetaAddColumn('MontoIva');
        $this->dtgNotaCreditos->MetaAddColumn('MontoSeguro');
        $this->dtgNotaCreditos->MetaAddColumn('MontoOtros');
        $this->dtgNotaCreditos->MetaAddColumn('MontoTotal');
        $this->dtgNotaCreditos->MetaAddColumn(QQN::NotaCredito()->Sucursal);
        $this->dtgNotaCreditos->MetaAddColumn(QQN::NotaCredito()->Receptoria);
        $this->dtgNotaCreditos->MetaAddColumn(QQN::NotaCredito()->Caja);
        $this->dtgNotaCreditos->MetaAddColumn(QQN::NotaCredito()->CreadaPorObject);
        $this->dtgNotaCreditos->MetaAddColumn('CreadaEl');
        $this->dtgNotaCreditos->MetaAddColumn('Estatus');
        $this->dtgNotaCreditos->MetaAddTypeColumn('ImpresaId', 'SinoType');
        $this->dtgNotaCreditos->MetaAddColumn('MontoDscto');
        $this->dtgNotaCreditos->MetaAddColumn('CreatedAt');
        $this->dtgNotaCreditos->MetaAddColumn('UpdatedAt');
        $this->dtgNotaCreditos->MetaAddColumn('DeletedAt');
        $this->dtgNotaCreditos->MetaAddColumn('CreatedBy');
        $this->dtgNotaCreditos->MetaAddColumn('UpdatedBy');
        $this->dtgNotaCreditos->MetaAddColumn('DeletedBy');

        $this->btnExpoExce_Create();

    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'NotaCreditos';
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
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgNotaCreditos);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/nota_credito_edit.php');
    }

    protected function btnFiltAvan_Click() {
        $this->dtgNotaCreditos->ShowFilter = !$this->dtgNotaCreditos->ShowFilter;
    }

    public function dtgNotaCreditosRow_Click($strFormId, $strControlId, $strParameter) {
      $intId = intval($strParameter);
      QApplication::Redirect("nota_credito_edit.php/$intId");
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
