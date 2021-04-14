<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Incidencia class.  It uses the code-generated
	 * IncidenciaDataGrid control which has meta-methods to help with
	 * easily creating/defining Incidencia columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both incidencia_list.php AND
	 * incidencia_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class IncidenciaListFormBase extends QForm {
		protected $lblMensUsua;
		protected $lblNotiUsua;
		protected $lblTituForm;
        protected $btnNuevRegi;
        protected $btnFiltAvan;
        protected $btnExpoExce;

		// Local instance of the Meta DataGrid to list Incidencias
		/**
		 * @var IncidenciaDataGrid dtgIncidencias
		 */
		protected $dtgIncidencias;

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
			$this->dtgIncidencias = new IncidenciaDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgIncidencias->CssClass = 'datagrid';
			$this->dtgIncidencias->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgIncidencias->FontSize = 13;
			$this->dtgIncidencias->ShowFilter = false;

			// Add Pagination (if desired)
			$this->dtgIncidencias->Paginator = new QPaginator($this->dtgIncidencias);
			$this->dtgIncidencias->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

			// Higlight the datagrid rows when mousing over them
			$this->dtgIncidencias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
			$this->dtgIncidencias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

			// Add a click handler for the rows.
			// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
			// or $_ITEM->Id to pass the object's id, or any other data grid variable
			$this->dtgIncidencias->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
			$this->dtgIncidencias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgIncidenciasRow_Click'));

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for incidencia's properties, or you
			// can traverse down QQN::incidencia() to display fields that are down the hierarchy)
			$this->dtgIncidencias->MetaAddColumn('Id');
			$this->dtgIncidencias->MetaAddColumn('Codigo');
			$this->dtgIncidencias->MetaAddColumn('Numero');
			$this->dtgIncidencias->MetaAddColumn('FechaRegistro');
			$this->dtgIncidencias->MetaAddColumn('FechaIncidencia');
			$this->dtgIncidencias->MetaAddColumn('ClienteId');
			$this->dtgIncidencias->MetaAddColumn('Guia');
			$this->dtgIncidencias->MetaAddColumn('Tracking');
			$this->dtgIncidencias->MetaAddColumn(QQN::Incidencia()->Motivo);
			$this->dtgIncidencias->MetaAddColumn(QQN::Incidencia()->Lugar);
			$this->dtgIncidencias->MetaAddColumn(QQN::Incidencia()->Sucursal);
			$this->dtgIncidencias->MetaAddColumn(QQN::Incidencia()->TipoReembolso);
			$this->dtgIncidencias->MetaAddColumn('Estatus');
			$this->dtgIncidencias->MetaAddColumn('ContenidoEntregado');
			$this->dtgIncidencias->MetaAddColumn('ContenidoEsperado');
			$this->dtgIncidencias->MetaAddColumn('MontoPagado');
			$this->dtgIncidencias->MetaAddColumn('NroFactura');
			$this->dtgIncidencias->MetaAddColumn('NombreTitular');
			$this->dtgIncidencias->MetaAddColumn('Cedula');
			$this->dtgIncidencias->MetaAddColumn('Email');
			$this->dtgIncidencias->MetaAddColumn('TipoCuenta');
			$this->dtgIncidencias->MetaAddColumn('NroCuenta');
			$this->dtgIncidencias->MetaAddColumn('Banco');
			$this->dtgIncidencias->MetaAddColumn('FechaPago');
			$this->dtgIncidencias->MetaAddColumn('FormaPago');
			$this->dtgIncidencias->MetaAddColumn('NroReferencia');

            $this->btnExpoExce_Create();

        }

		protected function lblTituForm_Create() {
			$this->lblTituForm = new QLabel($this);
			$this->lblTituForm->Text = 'Incidencias';
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
            $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgIncidencias);
            $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
            $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
            $this->btnExpoExce->HtmlEntities = false;
            $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
            $this->btnExpoExce->Visible = false;
        }

        protected function btnNuevRegi_Click() {
            QApplication::Redirect(__SIST__.'/incidencia_edit.php');
        }

        protected function btnFiltAvan_Click() {
            $this->dtgIncidencias->ShowFilter = !$this->dtgIncidencias->ShowFilter;
        }

		public function dtgIncidenciasRow_Click($strFormId, $strControlId, $strParameter) {
		  $intId = intval($strParameter);
		  QApplication::Redirect("incidencia_edit.php/$intId");
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
