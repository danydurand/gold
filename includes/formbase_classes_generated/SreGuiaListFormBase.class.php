<?php
/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the SreGuia class.  It uses the code-generated
 * SreGuiaDataGrid control which has meta-methods to help with
 * easily creating/defining SreGuia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sre_guia_list.php AND
 * sre_guia_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class SreGuiaListFormBase extends QForm {
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $lblTituForm;
    protected $btnNuevRegi;
    protected $btnFiltAvan;
    protected $btnExpoExce;

    // Local instance of the Meta DataGrid to list SreGuias
    /**
     * @var SreGuiaDataGrid dtgSreGuias
     */
    protected $dtgSreGuias;

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
        $this->dtgSreGuias = new SreGuiaDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgSreGuias->CssClass = 'datagrid';
        $this->dtgSreGuias->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgSreGuias->FontSize = 13;
        $this->dtgSreGuias->ShowFilter = false;

        // Add Pagination (if desired)
        $this->dtgSreGuias->Paginator = new QPaginator($this->dtgSreGuias);
        $this->dtgSreGuias->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgSreGuias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgSreGuias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgSreGuias->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgSreGuias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSreGuiasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for sre_guia's properties, or you
        // can traverse down QQN::sre_guia() to display fields that are down the hierarchy)
        $this->dtgSreGuias->MetaAddColumn('NumeGuia');
        $this->dtgSreGuias->MetaAddColumn('CodiClie');
        $this->dtgSreGuias->MetaAddColumn('ClienteId');
        $this->dtgSreGuias->MetaAddColumn('FechGuia');
        $this->dtgSreGuias->MetaAddColumn(QQN::SreGuia()->EstaOrigObject);
        $this->dtgSreGuias->MetaAddColumn(QQN::SreGuia()->EstaDestObject);
        $this->dtgSreGuias->MetaAddColumn('PesoGuia');
        $this->dtgSreGuias->MetaAddColumn('NombRemi');
        $this->dtgSreGuias->MetaAddColumn('DireRemi');
        $this->dtgSreGuias->MetaAddColumn('TeleRemi');
        $this->dtgSreGuias->MetaAddColumn('NombDest');
        $this->dtgSreGuias->MetaAddColumn('DireDest');
        $this->dtgSreGuias->MetaAddColumn('TeleDest');
        $this->dtgSreGuias->MetaAddColumn('CantPiez');
        $this->dtgSreGuias->MetaAddColumn('DescCont');
        $this->dtgSreGuias->MetaAddColumn(QQN::SreGuia()->CodiProdObject);
        $this->dtgSreGuias->MetaAddTypeColumn('TipoGuia', 'TipoGuiaType');
        $this->dtgSreGuias->MetaAddColumn('ValorDeclarado');
        $this->dtgSreGuias->MetaAddColumn('PorcentajeIva');
        $this->dtgSreGuias->MetaAddColumn('MontoIva');
        $this->dtgSreGuias->MetaAddColumn('PorcentajeGas');
        $this->dtgSreGuias->MetaAddColumn('MontoGas');
        $this->dtgSreGuias->MetaAddColumn('Asegurado');
        $this->dtgSreGuias->MetaAddColumn('PorcentajeSeguro');
        $this->dtgSreGuias->MetaAddColumn('MontoSeguro');
        $this->dtgSreGuias->MetaAddColumn('MontoBase');
        $this->dtgSreGuias->MetaAddColumn('MontoFranqueo');
        $this->dtgSreGuias->MetaAddColumn('MontoOtros');
        $this->dtgSreGuias->MetaAddColumn('MontoTotal');
        $this->dtgSreGuias->MetaAddColumn('EntregadoA');
        $this->dtgSreGuias->MetaAddColumn('FechaEntrega');
        $this->dtgSreGuias->MetaAddColumn('HoraEntrega');
        $this->dtgSreGuias->MetaAddColumn('CodiCkpt');
        $this->dtgSreGuias->MetaAddColumn('EstaCkpt');
        $this->dtgSreGuias->MetaAddColumn('FechCkpt');
        $this->dtgSreGuias->MetaAddColumn('HoraCkpt');
        $this->dtgSreGuias->MetaAddColumn('ObseCkpt');
        $this->dtgSreGuias->MetaAddColumn('UsuaCkpt');
        $this->dtgSreGuias->MetaAddColumn('FechaPod');
        $this->dtgSreGuias->MetaAddColumn('HoraPod');
        $this->dtgSreGuias->MetaAddColumn('UsuarioPod');
        $this->dtgSreGuias->MetaAddColumn('CantAyudantes');
        $this->dtgSreGuias->MetaAddColumn('ParadasAdicionales');
        $this->dtgSreGuias->MetaAddColumn(QQN::SreGuia()->Courier);
        $this->dtgSreGuias->MetaAddColumn('GuiaExterna');
        $this->dtgSreGuias->MetaAddColumn('FleteDirecto');
        $this->dtgSreGuias->MetaAddColumn('TieneGuiaRetorno');
        $this->dtgSreGuias->MetaAddColumn('GuiaRetorno');
        $this->dtgSreGuias->MetaAddColumn('Observacion');
        $this->dtgSreGuias->MetaAddColumn('Alto');
        $this->dtgSreGuias->MetaAddColumn('Ancho');
        $this->dtgSreGuias->MetaAddColumn('Largo');
        $this->dtgSreGuias->MetaAddColumn(QQN::SreGuia()->Operacion);
        $this->dtgSreGuias->MetaAddColumn('MontoBaseInt');
        $this->dtgSreGuias->MetaAddColumn('PorcentajeSgroInt');
        $this->dtgSreGuias->MetaAddColumn('MontoSgroInt');
        $this->dtgSreGuias->MetaAddColumn('MontoTotalInt');
        $this->dtgSreGuias->MetaAddColumn('TotalIntLocal');
        $this->dtgSreGuias->MetaAddColumn('PesoVolumetrico');
        $this->dtgSreGuias->MetaAddColumn('PesoLibras');
        $this->dtgSreGuias->MetaAddTypeColumn('TransFac', 'SinoType');
        $this->dtgSreGuias->MetaAddColumn('HojaEntrega');
        $this->dtgSreGuias->MetaAddColumn('UsuarioCreacion');
        $this->dtgSreGuias->MetaAddColumn('FechaCreacion');
        $this->dtgSreGuias->MetaAddColumn('HoraCreacion');
        $this->dtgSreGuias->MetaAddColumn('SistemaId');
        $this->dtgSreGuias->MetaAddColumn('RecolectaId');
        $this->dtgSreGuias->MetaAddColumn('TipoDocumentoId');
        $this->dtgSreGuias->MetaAddColumn('CedulaRif');
        $this->dtgSreGuias->MetaAddColumn('CierreCaja');
        $this->dtgSreGuias->MetaAddColumn('CajaId');
        $this->dtgSreGuias->MetaAddColumn('Anulada');
        $this->dtgSreGuias->MetaAddColumn('ProductoId');
        $this->dtgSreGuias->MetaAddColumn('TasaDolar');
        $this->dtgSreGuias->MetaAddColumn('VolMaritimoPies');
        $this->dtgSreGuias->MetaAddColumn('VolMaritimoMts');
        $this->dtgSreGuias->MetaAddColumn('DescripcionGral');
        $this->dtgSreGuias->MetaAddColumn('Ubicacion');
        $this->dtgSreGuias->MetaAddColumn('PromocionId');

        $this->btnExpoExce_Create();

    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'SreGuias';
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
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgSreGuias);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/sre_guia_edit.php');
    }

    protected function btnFiltAvan_Click() {
        $this->dtgSreGuias->ShowFilter = !$this->dtgSreGuias->ShowFilter;
    }

    public function dtgSreGuiasRow_Click($strFormId, $strControlId, $strParameter) {
      $intId = intval($strParameter);
      QApplication::Redirect("sre_guia_edit.php/$intId");
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
