<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the ClienteI class.  It uses the code-generated
	 * ClienteIDataGrid control which has meta-methods to help with
	 * easily creating/defining ClienteI columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both cliente_i_list.php AND
	 * cliente_i_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class ClienteIListFormBase extends QForm {
		protected $lblMensUsua;
		protected $lblNotiUsua;
		protected $lblTituForm;
        protected $btnNuevRegi;
        protected $btnFiltAvan;
        protected $btnExpoExce;

		// Local instance of the Meta DataGrid to list ClienteIs
		/**
		 * @var ClienteIDataGrid dtgClienteIs
		 */
		protected $dtgClienteIs;

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
			$this->dtgClienteIs = new ClienteIDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgClienteIs->CssClass = 'datagrid';
			$this->dtgClienteIs->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgClienteIs->FontSize = 13;
			$this->dtgClienteIs->ShowFilter = false;

			// Add Pagination (if desired)
			$this->dtgClienteIs->Paginator = new QPaginator($this->dtgClienteIs);
			$this->dtgClienteIs->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

			// Higlight the datagrid rows when mousing over them
			$this->dtgClienteIs->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
			$this->dtgClienteIs->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

			// Add a click handler for the rows.
			// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
			// or $_ITEM->Id to pass the object's id, or any other data grid variable
			$this->dtgClienteIs->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
			$this->dtgClienteIs->AddRowAction(new QClickEvent(), new QAjaxAction('dtgClienteIsRow_Click'));

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for cliente_i's properties, or you
			// can traverse down QQN::cliente_i() to display fields that are down the hierarchy)
			$this->dtgClienteIs->MetaAddColumn('Id');
			$this->dtgClienteIs->MetaAddColumn('CedulaRif');
			$this->dtgClienteIs->MetaAddColumn('RazonSocial');
			$this->dtgClienteIs->MetaAddColumn('NombreContacto');
			$this->dtgClienteIs->MetaAddColumn('FechaRegistro');
			$this->dtgClienteIs->MetaAddColumn('Email');
			$this->dtgClienteIs->MetaAddColumn('Telefono');
			$this->dtgClienteIs->MetaAddColumn('Telefono2');
			$this->dtgClienteIs->MetaAddColumn('AvenidaCalle');
			$this->dtgClienteIs->MetaAddColumn('SectorResidencia');
			$this->dtgClienteIs->MetaAddColumn('EdificioCasa');
			$this->dtgClienteIs->MetaAddColumn('PisoApto');
			$this->dtgClienteIs->MetaAddColumn('Referencia');
			$this->dtgClienteIs->MetaAddColumn('DireccionCompleta');
			$this->dtgClienteIs->MetaAddColumn(QQN::ClienteI()->Pais);
			$this->dtgClienteIs->MetaAddColumn(QQN::ClienteI()->Sucursal);
			$this->dtgClienteIs->MetaAddColumn('ClaveAcceso');
			$this->dtgClienteIs->MetaAddColumn('UltimoAcceso');
			$this->dtgClienteIs->MetaAddTypeColumn('StatusId', 'StatusType');
			$this->dtgClienteIs->MetaAddTypeColumn('BloqueadoId', 'SinoType');
			$this->dtgClienteIs->MetaAddColumn('MotivoBloqueo');
			$this->dtgClienteIs->MetaAddColumn(QQN::ClienteI()->Ciudad);
			$this->dtgClienteIs->MetaAddColumn('ZonaResidenciaId');
			$this->dtgClienteIs->MetaAddColumn(QQN::ClienteI()->Empresa);
			$this->dtgClienteIs->MetaAddColumn('FechaModificacion');
			$this->dtgClienteIs->MetaAddColumn('ReceptoriaId');
			$this->dtgClienteIs->MetaAddColumn('AutorizacionTsa');
			$this->dtgClienteIs->MetaAddColumn('PrimerNombre');
			$this->dtgClienteIs->MetaAddColumn('SegundoNombre');
			$this->dtgClienteIs->MetaAddColumn('PrimerApellido');
			$this->dtgClienteIs->MetaAddColumn('SegundoApellido');
			$this->dtgClienteIs->MetaAddColumn('FechaNacimiento');
			$this->dtgClienteIs->MetaAddColumn('Sexo');
			$this->dtgClienteIs->MetaAddColumn('EstadoCivil');
			$this->dtgClienteIs->MetaAddColumn('Fax');
			$this->dtgClienteIs->MetaAddColumn('EstadoId');
			$this->dtgClienteIs->MetaAddColumn('MunicipioId');
			$this->dtgClienteIs->MetaAddColumn('ParroquiaId');
			$this->dtgClienteIs->MetaAddColumn('SecurbarId');
			$this->dtgClienteIs->MetaAddColumn('ReceptoriaHgvId');
			$this->dtgClienteIs->MetaAddColumn('FechaModificacionIpostel');
			$this->dtgClienteIs->MetaAddColumn('DireccionIp');
			$this->dtgClienteIs->MetaAddColumn('FechaAceptacion');
			$this->dtgClienteIs->MetaAddColumn('AceptaTerminosId');

            $this->btnExpoExce_Create();

        }

		protected function lblTituForm_Create() {
			$this->lblTituForm = new QLabel($this);
			$this->lblTituForm->Text = 'ClienteIs';
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
            $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgClienteIs);
            $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
            $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
            $this->btnExpoExce->HtmlEntities = false;
            $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
            $this->btnExpoExce->Visible = false;
        }

        protected function btnNuevRegi_Click() {
            QApplication::Redirect(__SIST__.'/cliente_i_edit.php');
        }

        protected function btnFiltAvan_Click() {
            $this->dtgClienteIs->ShowFilter = !$this->dtgClienteIs->ShowFilter;
        }

		public function dtgClienteIsRow_Click($strFormId, $strControlId, $strParameter) {
		  $intId = intval($strParameter);
		  QApplication::Redirect("cliente_i_edit.php/$intId");
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
