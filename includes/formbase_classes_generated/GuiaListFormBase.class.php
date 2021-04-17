<?php
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
 * @subpackage FormBaseObjects
 */
abstract class GuiaListFormBase extends QForm {
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $lblTituForm;
    protected $btnNuevRegi;
    protected $btnFiltAvan;
    protected $btnExpoExce;

    // Local instance of the Meta DataGrid to list Guias
    /**
     * @var GuiaDataGrid dtgGuias
     */
    protected $dtgGuias;

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
        $this->dtgGuias = new GuiaDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgGuias->CssClass = 'datagrid';
        $this->dtgGuias->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgGuias->FontSize = 13;
        $this->dtgGuias->ShowFilter = false;

        // Add Pagination (if desired)
        $this->dtgGuias->Paginator = new QPaginator($this->dtgGuias);
        $this->dtgGuias->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgGuias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgGuias->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgGuias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for guia's properties, or you
        // can traverse down QQN::guia() to display fields that are down the hierarchy)
        $this->dtgGuias->MetaAddColumn('NumeGuia');
        $this->dtgGuias->MetaAddColumn('CodiClie');
        $this->dtgGuias->MetaAddColumn('ClienteId');
        $this->dtgGuias->MetaAddColumn('FechGuia');
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaOrigObject);
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaDestObject);
        $this->dtgGuias->MetaAddColumn('PesoGuia');
        $this->dtgGuias->MetaAddColumn('NombRemi');
        $this->dtgGuias->MetaAddColumn('DireRemi');
        $this->dtgGuias->MetaAddColumn('TeleRemi');
        $this->dtgGuias->MetaAddColumn('NombDest');
        $this->dtgGuias->MetaAddColumn('DireDest');
        $this->dtgGuias->MetaAddColumn('TeleDest');
        $this->dtgGuias->MetaAddColumn('CantPiez');
        $this->dtgGuias->MetaAddColumn('DescCont');
        $this->dtgGuias->MetaAddColumn('CodiProd');
        $this->dtgGuias->MetaAddTypeColumn('TipoGuia', 'TipoGuiaType');
        $this->dtgGuias->MetaAddColumn('ValorDeclarado');
        $this->dtgGuias->MetaAddColumn('PorcentajeIva');
        $this->dtgGuias->MetaAddColumn('MontoIva');
        $this->dtgGuias->MetaAddColumn('PorcentajeGas');
        $this->dtgGuias->MetaAddColumn('MontoGas');
        $this->dtgGuias->MetaAddColumn('Asegurado');
        $this->dtgGuias->MetaAddColumn('PorcentajeSeguro');
        $this->dtgGuias->MetaAddColumn('PorcentajeDscto');
        $this->dtgGuias->MetaAddColumn('MontoSeguro');
        $this->dtgGuias->MetaAddColumn('MontoBase');
        $this->dtgGuias->MetaAddColumn('MontoFranqueo');
        $this->dtgGuias->MetaAddColumn('MontoDscto');
        $this->dtgGuias->MetaAddColumn('MontoOtros');
        $this->dtgGuias->MetaAddColumn('MontoTotal');
        $this->dtgGuias->MetaAddColumn('ConsiderarDscto');
        $this->dtgGuias->MetaAddColumn('EntregadoA');
        $this->dtgGuias->MetaAddColumn('FechaEntrega');
        $this->dtgGuias->MetaAddColumn('HoraEntrega');
        $this->dtgGuias->MetaAddColumn('CodiCkpt');
        $this->dtgGuias->MetaAddColumn('EstaCkpt');
        $this->dtgGuias->MetaAddColumn('FechCkpt');
        $this->dtgGuias->MetaAddColumn('HoraCkpt');
        $this->dtgGuias->MetaAddColumn('ObseCkpt');
        $this->dtgGuias->MetaAddColumn('UsuaCkpt');
        $this->dtgGuias->MetaAddColumn('FechaPod');
        $this->dtgGuias->MetaAddColumn('HoraPod');
        $this->dtgGuias->MetaAddColumn('UsuarioPod');
        $this->dtgGuias->MetaAddColumn('CantAyudantes');
        $this->dtgGuias->MetaAddColumn('ParadasAdicionales');
        $this->dtgGuias->MetaAddColumn('CourierId');
        $this->dtgGuias->MetaAddColumn('GuiaExterna');
        $this->dtgGuias->MetaAddColumn('FleteDirecto');
        $this->dtgGuias->MetaAddColumn('TieneGuiaRetorno');
        $this->dtgGuias->MetaAddColumn('GuiaRetorno');
        $this->dtgGuias->MetaAddColumn('Observacion');
        $this->dtgGuias->MetaAddColumn('Alto');
        $this->dtgGuias->MetaAddColumn('Ancho');
        $this->dtgGuias->MetaAddColumn('Largo');
        $this->dtgGuias->MetaAddColumn('OperacionId');
        $this->dtgGuias->MetaAddColumn('MontoBaseInt');
        $this->dtgGuias->MetaAddColumn('PorcentajeSgroInt');
        $this->dtgGuias->MetaAddColumn('MontoSgroInt');
        $this->dtgGuias->MetaAddColumn('MontoTotalInt');
        $this->dtgGuias->MetaAddColumn('TotalIntLocal');
        $this->dtgGuias->MetaAddColumn('PesoVolumetrico');
        $this->dtgGuias->MetaAddColumn('PesoLibras');
        $this->dtgGuias->MetaAddTypeColumn('TransFac', 'SinoType');
        $this->dtgGuias->MetaAddColumn('HojaEntrega');
        $this->dtgGuias->MetaAddColumn('UsuarioCreacion');
        $this->dtgGuias->MetaAddColumn('FechaCreacion');
        $this->dtgGuias->MetaAddColumn('HoraCreacion');
        $this->dtgGuias->MetaAddColumn('SistemaId');
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->Recolecta);
        $this->dtgGuias->MetaAddColumn('TipoDocumentoId');
        $this->dtgGuias->MetaAddColumn('CedulaRif');
        $this->dtgGuias->MetaAddColumn('CierreCaja');
        $this->dtgGuias->MetaAddColumn('CajaId');
        $this->dtgGuias->MetaAddColumn('Anulada');
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->Producto);
        $this->dtgGuias->MetaAddColumn('TasaDolar');
        $this->dtgGuias->MetaAddColumn('VolMaritimoPies');
        $this->dtgGuias->MetaAddColumn('VolMaritimoMts');
        $this->dtgGuias->MetaAddColumn('DescripcionGral');
        $this->dtgGuias->MetaAddColumn('Ubicacion');
        $this->dtgGuias->MetaAddColumn('PromocionId');
        $this->dtgGuias->MetaAddTypeColumn('ExcepcionImpuesto', 'SinoType');
        $this->dtgGuias->MetaAddColumn('AirportImportFee');
        $this->dtgGuias->MetaAddColumn('ServiciosDga');
        $this->dtgGuias->MetaAddColumn('ProveedorId');
        $this->dtgGuias->MetaAddColumn('VendedorId');
        $this->dtgGuias->MetaAddColumn('EstadoId');
        $this->dtgGuias->MetaAddColumn('MunicipioId');
        $this->dtgGuias->MetaAddColumn('ParroquiaId');
        $this->dtgGuias->MetaAddColumn('SecurbarId');
        $this->dtgGuias->MetaAddColumn('ReceptoriaOrigen');
        $this->dtgGuias->MetaAddColumn('ReceptoriaDestino');
        $this->dtgGuias->MetaAddColumn('FacturaId');
        $this->dtgGuias->MetaAddColumn('CedulaDestinatario');
        $this->dtgGuias->MetaAddColumn('TarifaId');
        $this->dtgGuias->MetaAddColumn('EnEfectivo');
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->Aduana);
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->CobroCod);
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->GuiaAduana);
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->GuiaCalculos);
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->GuiaCheckpoints);
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->GuiaModificada);
        $this->dtgGuias->MetaAddColumn(QQN::Guia()->WitecConf);

        $this->btnExpoExce_Create();

    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Guias';
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
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgGuias);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/guia_edit.php');
    }

    protected function btnFiltAvan_Click() {
        $this->dtgGuias->ShowFilter = !$this->dtgGuias->ShowFilter;
    }

    public function dtgGuiasRow_Click($strFormId, $strControlId, $strParameter) {
      $intId = intval($strParameter);
      QApplication::Redirect("guia_edit.php/$intId");
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
