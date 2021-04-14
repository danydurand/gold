<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the SdeContenedor class.  It uses the code-generated
	 * SdeContenedorDataGrid control which has meta-methods to help with
	 * easily creating/defining SdeContenedor columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both sde_contenedor_list.php AND
	 * sde_contenedor_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class SdeContenedorListFormBase extends QForm {
		protected $lblMensUsua;
		protected $lblNotiUsua;
		protected $lblTituForm;
        protected $btnNuevRegi;
        protected $btnFiltAvan;
        protected $btnExpoExce;

		// Local instance of the Meta DataGrid to list SdeContenedors
		/**
		 * @var SdeContenedorDataGrid dtgSdeContenedors
		 */
		protected $dtgSdeContenedors;

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
			$this->dtgSdeContenedors = new SdeContenedorDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSdeContenedors->CssClass = 'datagrid';
			$this->dtgSdeContenedors->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgSdeContenedors->FontSize = 13;
			$this->dtgSdeContenedors->ShowFilter = false;

			// Add Pagination (if desired)
			$this->dtgSdeContenedors->Paginator = new QPaginator($this->dtgSdeContenedors);
			$this->dtgSdeContenedors->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

			// Higlight the datagrid rows when mousing over them
			$this->dtgSdeContenedors->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
			$this->dtgSdeContenedors->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

			// Add a click handler for the rows.
			// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
			// or $_ITEM->Id to pass the object's id, or any other data grid variable
			$this->dtgSdeContenedors->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
			$this->dtgSdeContenedors->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSdeContenedorsRow_Click'));

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for sde_contenedor's properties, or you
			// can traverse down QQN::sde_contenedor() to display fields that are down the hierarchy)
			$this->dtgSdeContenedors->MetaAddColumn('NumeCont');
			$this->dtgSdeContenedors->MetaAddColumn(QQN::SdeContenedor()->CodiOperObject);
			$this->dtgSdeContenedors->MetaAddColumn('Fecha');
			$this->dtgSdeContenedors->MetaAddColumn('StatCont');
			$this->dtgSdeContenedors->MetaAddColumn('NombreChofer');
			$this->dtgSdeContenedors->MetaAddColumn('CedulaChofer');
			$this->dtgSdeContenedors->MetaAddColumn('PlacaVehiculo');
			$this->dtgSdeContenedors->MetaAddColumn('DescipcionVehiculo');
			$this->dtgSdeContenedors->MetaAddColumn('MontoFlete');
			$this->dtgSdeContenedors->MetaAddColumn('Master');
			$this->dtgSdeContenedors->MetaAddColumn('NumeroValijas');
			$this->dtgSdeContenedors->MetaAddColumn('Valijas');
			$this->dtgSdeContenedors->MetaAddColumn('PaisId');
			$this->dtgSdeContenedors->MetaAddColumn('Hora');

            $this->btnExpoExce_Create();

        }

		protected function lblTituForm_Create() {
			$this->lblTituForm = new QLabel($this);
			$this->lblTituForm->Text = 'SdeContenedors';
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
            $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgSdeContenedors);
            $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
            $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
            $this->btnExpoExce->HtmlEntities = false;
            $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
            $this->btnExpoExce->Visible = false;
        }

        protected function btnNuevRegi_Click() {
            QApplication::Redirect(__SIST__.'/sde_contenedor_edit.php');
        }

        protected function btnFiltAvan_Click() {
            $this->dtgSdeContenedors->ShowFilter = !$this->dtgSdeContenedors->ShowFilter;
        }

		public function dtgSdeContenedorsRow_Click($strFormId, $strControlId, $strParameter) {
		  $intId = intval($strParameter);
		  QApplication::Redirect("sde_contenedor_edit.php/$intId");
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
