<?php
/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the MasterCliente class.  It uses the code-generated
 * MasterClienteDataGrid control which has meta-methods to help with
 * easily creating/defining MasterCliente columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both master_cliente_list.php AND
 * master_cliente_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class MasterClienteListFormBase extends QForm {
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $lblTituForm;
    protected $btnNuevRegi;
    protected $btnFiltAvan;
    protected $btnExpoExce;
    protected $lblOtraNoti;

    // Local instance of the Meta DataGrid to list MasterClientes
    /**
     * @var MasterClienteDataGrid dtgMasterClientes
     */
    protected $dtgMasterClientes;

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
        $this->dtgMasterClientes = new MasterClienteDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgMasterClientes->CssClass = 'datagrid';
        $this->dtgMasterClientes->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgMasterClientes->FontSize = 13;
        $this->dtgMasterClientes->ShowFilter = false;

        // Add Pagination (if desired)
        $this->dtgMasterClientes->Paginator = new QPaginator($this->dtgMasterClientes);
        $this->dtgMasterClientes->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgMasterClientes->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgMasterClientes->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgMasterClientes->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgMasterClientes->AddRowAction(new QClickEvent(), new QAjaxAction('dtgMasterClientesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for master_cliente's properties, or you
        // can traverse down QQN::master_cliente() to display fields that are down the hierarchy)
        $this->dtgMasterClientes->MetaAddColumn('CodiClie');
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->CodiDepeObject);
        $this->dtgMasterClientes->MetaAddColumn('NombClie');
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->Sucursal);
        $this->dtgMasterClientes->MetaAddColumn('EsAliado');
        $this->dtgMasterClientes->MetaAddColumn('CodiEsta');
        $this->dtgMasterClientes->MetaAddColumn('DireFisc');
        $this->dtgMasterClientes->MetaAddColumn('NumeDrif');
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->Vendedor);
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->Tarifa);
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->TarifaAgente);
        $this->dtgMasterClientes->MetaAddColumn('Facturable');
        $this->dtgMasterClientes->MetaAddTypeColumn('CicloId', 'CicloFactType');
        $this->dtgMasterClientes->MetaAddColumn('NumeDnit');
        $this->dtgMasterClientes->MetaAddColumn('PersCona');
        $this->dtgMasterClientes->MetaAddColumn('TeleCona');
        $this->dtgMasterClientes->MetaAddColumn('PersConb');
        $this->dtgMasterClientes->MetaAddColumn('TeleConb');
        $this->dtgMasterClientes->MetaAddColumn('DireMail');
        $this->dtgMasterClientes->MetaAddColumn('DireReco');
        $this->dtgMasterClientes->MetaAddTypeColumn('CodiStat', 'StatusType');
        $this->dtgMasterClientes->MetaAddTypeColumn('CodiSino', 'SinoType');
        $this->dtgMasterClientes->MetaAddColumn('TextObse');
        $this->dtgMasterClientes->MetaAddColumn('NumeDfax');
        $this->dtgMasterClientes->MetaAddColumn('CodigoInterno');
        $this->dtgMasterClientes->MetaAddTypeColumn('TipoCliente', 'TipoClienteType');
        $this->dtgMasterClientes->MetaAddColumn('SaldoExcedente');
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->RutaRecolectaObject);
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->RutaEntregaObject);
        $this->dtgMasterClientes->MetaAddColumn('PorcentajeDsctoincr');
        $this->dtgMasterClientes->MetaAddColumn('HoraCierre');
        $this->dtgMasterClientes->MetaAddTypeColumn('StatusCreditoId', 'StatusCreditoType');
        $this->dtgMasterClientes->MetaAddColumn('DsctoPorVolumen');
        $this->dtgMasterClientes->MetaAddColumn('VolumenParaDscto');
        $this->dtgMasterClientes->MetaAddColumn('DsctoPorPeso');
        $this->dtgMasterClientes->MetaAddColumn('PesoParaDscto');
        $this->dtgMasterClientes->MetaAddColumn('DescuentoCaducaEl');
        $this->dtgMasterClientes->MetaAddColumn('PorcentajeSeguro');
        $this->dtgMasterClientes->MetaAddColumn('DirEntregaFactura');
        $this->dtgMasterClientes->MetaAddColumn('ClaveServiciosWeb');
        $this->dtgMasterClientes->MetaAddColumn('CaducidadDeGuias');
        $this->dtgMasterClientes->MetaAddTypeColumn('MostrarGuiaExterna', 'SinoType');
        $this->dtgMasterClientes->MetaAddColumn('CargaMasiva');
        $this->dtgMasterClientes->MetaAddColumn('CmGuiasYamaguchi');
        $this->dtgMasterClientes->MetaAddColumn('GuiasYamaguchiPorCarga');
        $this->dtgMasterClientes->MetaAddColumn('GuiasYamaguchiPorDia');
        $this->dtgMasterClientes->MetaAddColumn('PagoPpd');
        $this->dtgMasterClientes->MetaAddColumn('PagoCrd');
        $this->dtgMasterClientes->MetaAddColumn('PagoCod');
        $this->dtgMasterClientes->MetaAddColumn('CmDestinatarioFrecuente');
        $this->dtgMasterClientes->MetaAddColumn('ClientesPorCarga');
        $this->dtgMasterClientes->MetaAddColumn('ClientesPorDia');
        $this->dtgMasterClientes->MetaAddColumn('UsuarioApi');
        $this->dtgMasterClientes->MetaAddColumn('PasswordApi');
        $this->dtgMasterClientes->MetaAddColumn('ManejaApi');
        $this->dtgMasterClientes->MetaAddColumn('TokenApi');
        $this->dtgMasterClientes->MetaAddColumn('GuiaRetorno');
        $this->dtgMasterClientes->MetaAddColumn('ProcesoApi');
        $this->dtgMasterClientes->MetaAddColumn('DeletedAt');
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->MotivoEliminacion);
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->EstadisticaDeClientes);
        $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->FechaUltimaGuiaAsCliente);

        $this->btnExpoExce_Create();

    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'MasterClientes';
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
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgMasterClientes);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/master_cliente_edit.php');
    }

    protected function btnFiltAvan_Click() {
        $this->dtgMasterClientes->ShowFilter = !$this->dtgMasterClientes->ShowFilter;
    }

    public function dtgMasterClientesRow_Click($strFormId, $strControlId, $strParameter) {
      $intId = intval($strParameter);
      QApplication::Redirect("master_cliente_edit.php/$intId");
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
