<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the EmpresaAfiliada class.  It uses the code-generated
	 * EmpresaAfiliadaDataGrid control which has meta-methods to help with
	 * easily creating/defining EmpresaAfiliada columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both empresa_afiliada_list.php AND
	 * empresa_afiliada_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class EmpresaAfiliadaListFormBase extends QForm {
		protected $lblMensUsua;
		protected $lblNotiUsua;
		protected $lblTituForm;
		// Local instance of the Meta DataGrid to list EmpresaAfiliadas
		/**
		 * @var EmpresaAfiliadaDataGrid dtgEmpresaAfiliadas
		 */
		protected $dtgEmpresaAfiliadas;

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

			// Instantiate the Meta DataGrid
			$this->dtgEmpresaAfiliadas = new EmpresaAfiliadaDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgEmpresaAfiliadas->CssClass = 'datagrid';
			$this->dtgEmpresaAfiliadas->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgEmpresaAfiliadas->FontSize = 13;

			// Add Pagination (if desired)
			$this->dtgEmpresaAfiliadas->Paginator = new QPaginator($this->dtgEmpresaAfiliadas);
			$this->dtgEmpresaAfiliadas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

			// Higlight the datagrid rows when mousing over them
			$this->dtgEmpresaAfiliadas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
			$this->dtgEmpresaAfiliadas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

			// Add a click handler for the rows.
			// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
			// or $_ITEM->Id to pass the object's id, or any other data grid variable
			$this->dtgEmpresaAfiliadas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
			$this->dtgEmpresaAfiliadas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgEmpresaAfiliadasRow_Click'));

			// if (isset($_SESSION['dtgEmpresaAfiliadas'])) {
			// 	$viewState = $_SESSION['dtgEmpresaAfiliadas'];
			// 	unset($_SESSION['dtgEmpresaAfiliadas']);
			// 	$this->dtgEmpresaAfiliadas->SetFilters($viewState['FilterInfo']);
			// 	$this->dtgEmpresaAfiliadas->SortColumnIndex = $viewState['SortColumnIndex'];
			// 	$this->dtgEmpresaAfiliadas->SortDirection = $viewState['SortDirection'];
			// 	$this->dtgEmpresaAfiliadas->PageNumber = $viewState['PageNumber'];
			// } 

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for empresa_afiliada's properties, or you
			// can traverse down QQN::empresa_afiliada() to display fields that are down the hierarchy)
			$this->dtgEmpresaAfiliadas->MetaAddColumn('Id');
			$this->dtgEmpresaAfiliadas->MetaAddColumn('Nombre');
			$this->dtgEmpresaAfiliadas->MetaAddColumn('PorcentajeDscto');
			$this->dtgEmpresaAfiliadas->MetaAddColumn('Activo');
			$this->dtgEmpresaAfiliadas->MetaAddColumn('CreadoEl');
			$this->dtgEmpresaAfiliadas->MetaAddColumn('CreadoPor');
			$this->dtgEmpresaAfiliadas->MetaAddColumn('ModificadoEl');
			$this->dtgEmpresaAfiliadas->MetaAddColumn('ModificadoPor');
		}

		protected function lblTituForm_Create() {
			$this->lblTituForm = new QLabel($this);
			$this->lblTituForm->Text = 'EmpresaAfiliadas List';
		}

		protected function lblMensUsua_Create() {
			$this->lblMensUsua = new QLabel($this);
			$this->lblMensUsua->Text = '';
		}

		protected function lblNotiUsua_Create() {
			$this->lblNotiUsua = new QLabel($this);
			$this->lblNotiUsua->Text = '';
		}

		protected function Form_PreRender() {
			// $_SESSION['dtgEmpresaAfiliadas'] = array(
			//   "PageNumber" => $this->dtgEmpresaAfiliadas->PageNumber,
			//   "SortDirection" => $this->dtgEmpresaAfiliadas->SortDirection,
			//   "SortColumnIndex" => $this->dtgEmpresaAfiliadas->SortColumnIndex,
			//   "FilterInfo" => $this->dtgEmpresaAfiliadas->GetFilters()
			// );				
		}


		public function dtgEmpresaAfiliadasRow_Click($strFormId, $strControlId, $strParameter) {
		  $intId = intval($strParameter);
		  QApplication::Redirect("empresa_afiliada_edit.php/$intId");
		}		

	}
?>
