<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the FacturaPmn class.  It uses the code-generated
	 * FacturaPmnDataGrid control which has meta-methods to help with
	 * easily creating/defining FacturaPmn columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both factura_pmn_list.php AND
	 * factura_pmn_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class FacturaPmnListFormBase extends QForm {
		protected $lblMensUsua;
		protected $lblNotiUsua;
		protected $lblTituForm;
        protected $btnNuevRegi;
        protected $btnFiltAvan;
        protected $btnExpoExce;

		// Local instance of the Meta DataGrid to list FacturaPmns
		/**
		 * @var FacturaPmnDataGrid dtgFacturaPmns
		 */
		protected $dtgFacturaPmns;

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
			$this->dtgFacturaPmns = new FacturaPmnDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgFacturaPmns->CssClass = 'datagrid';
			$this->dtgFacturaPmns->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgFacturaPmns->FontSize = 13;
			$this->dtgFacturaPmns->ShowFilter = false;

			// Add Pagination (if desired)
			$this->dtgFacturaPmns->Paginator = new QPaginator($this->dtgFacturaPmns);
			$this->dtgFacturaPmns->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

			// Higlight the datagrid rows when mousing over them
			$this->dtgFacturaPmns->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
			$this->dtgFacturaPmns->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

			// Add a click handler for the rows.
			// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
			// or $_ITEM->Id to pass the object's id, or any other data grid variable
			$this->dtgFacturaPmns->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
			$this->dtgFacturaPmns->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFacturaPmnsRow_Click'));

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for factura_pmn's properties, or you
			// can traverse down QQN::factura_pmn() to display fields that are down the hierarchy)
			$this->dtgFacturaPmns->MetaAddColumn('Id');
			$this->dtgFacturaPmns->MetaAddColumn('CedulaRif');
			$this->dtgFacturaPmns->MetaAddColumn('RazonSocial');
			$this->dtgFacturaPmns->MetaAddColumn('DireccionFiscal');
			$this->dtgFacturaPmns->MetaAddColumn('Telefono');
			$this->dtgFacturaPmns->MetaAddColumn('Numero');
			$this->dtgFacturaPmns->MetaAddColumn('MaquinaFiscal');
			$this->dtgFacturaPmns->MetaAddColumn('FechaImpresion');
			$this->dtgFacturaPmns->MetaAddColumn('HoraImpresion');
			$this->dtgFacturaPmns->MetaAddColumn('MontoBase');
			$this->dtgFacturaPmns->MetaAddColumn('MontoFranqueo');
			$this->dtgFacturaPmns->MetaAddColumn('MontoIva');
			$this->dtgFacturaPmns->MetaAddColumn('MontoSeguro');
			$this->dtgFacturaPmns->MetaAddColumn('MontoOtros');
			$this->dtgFacturaPmns->MetaAddColumn('MontoTotal');
			$this->dtgFacturaPmns->MetaAddColumn(QQN::FacturaPmn()->Sucursal);
			$this->dtgFacturaPmns->MetaAddColumn('ReceptoriaId');
			$this->dtgFacturaPmns->MetaAddColumn(QQN::FacturaPmn()->Caja);
			$this->dtgFacturaPmns->MetaAddColumn(QQN::FacturaPmn()->CreadaPorObject);
			$this->dtgFacturaPmns->MetaAddColumn('CreadaEl');
			$this->dtgFacturaPmns->MetaAddColumn('Estatus');
			$this->dtgFacturaPmns->MetaAddTypeColumn('ImpresaId', 'SinoType');
			$this->dtgFacturaPmns->MetaAddColumn(QQN::FacturaPmn()->AnuladaPorObject);
			$this->dtgFacturaPmns->MetaAddColumn('AnuladaEl');
			$this->dtgFacturaPmns->MetaAddColumn('MotivoAnulacion');
			$this->dtgFacturaPmns->MetaAddColumn('PorcentajeReteIva');
			$this->dtgFacturaPmns->MetaAddColumn('MontoReteIva');
			$this->dtgFacturaPmns->MetaAddColumn('PorcentajeReteIslr');
			$this->dtgFacturaPmns->MetaAddColumn('MontoReteIslr');
			$this->dtgFacturaPmns->MetaAddColumn('MontoDscto');
			$this->dtgFacturaPmns->MetaAddColumn('MontoCobrado');
			$this->dtgFacturaPmns->MetaAddColumn('ComprobanteRetencion');
			$this->dtgFacturaPmns->MetaAddColumn('FechaComprobante');
			$this->dtgFacturaPmns->MetaAddColumn('ComprobanteRetencionIslr');
			$this->dtgFacturaPmns->MetaAddColumn('FechaComprobanteIslr');
			$this->dtgFacturaPmns->MetaAddColumn('TieneRetencion');
			$this->dtgFacturaPmns->MetaAddColumn('FormaPagoId');
			$this->dtgFacturaPmns->MetaAddColumn(QQN::FacturaPmn()->NotaCreditoAsFactura);

            $this->btnExpoExce_Create();

        }

		protected function lblTituForm_Create() {
			$this->lblTituForm = new QLabel($this);
			$this->lblTituForm->Text = 'FacturaPmns';
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
            $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgFacturaPmns);
            $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
            $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
            $this->btnExpoExce->HtmlEntities = false;
            $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
            $this->btnExpoExce->Visible = false;
        }

        protected function btnNuevRegi_Click() {
            QApplication::Redirect(__SIST__.'/factura_pmn_edit.php');
        }

        protected function btnFiltAvan_Click() {
            $this->dtgFacturaPmns->ShowFilter = !$this->dtgFacturaPmns->ShowFilter;
        }

		public function dtgFacturaPmnsRow_Click($strFormId, $strControlId, $strParameter) {
		  $intId = intval($strParameter);
		  QApplication::Redirect("factura_pmn_edit.php/$intId");
		}


        protected function mensaje($strTextNoti='', $strTipoMens='m', $strClasMens='s', $strNombIcon='') {
            if (strlen($strTextNoti) == 0) {
                $this->lblMensUsua->Text = '';
                $this->lblMensUsua->CssClass = '';
                $this->lblNotiUsua->Text = '';
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
?>
