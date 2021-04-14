<?php
/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the EmpresaAfiliada class.  It uses the code-generated
 * EmpresaAfiliadaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a EmpresaAfiliada columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both empresa_afiliada_edit.php AND
 * empresa_afiliada_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class EmpresaAfiliadaEditFormBase extends QForm {
	// Local instance of the EmpresaAfiliadaMetaControl
	/**
	 * @var EmpresaAfiliadaMetaControlGen mctEmpresaAfiliada
	 */
	protected $mctEmpresaAfiliada;
	protected $lblMensUsua;
	protected $lblNotiUsua;
	protected $lblTituForm;

	// Controls for EmpresaAfiliada's Data Fields
	protected $lblId;
	protected $txtNombre;
	protected $txtPorcentajeDscto;
	protected $chkActivo;
	protected $calCreadoEl;
	protected $txtCreadoPor;
	protected $calModificadoEl;
	protected $txtModificadoPor;

	// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

	// Other Controls
	/**
	 * @var QButton Save
	 */
	protected $btnSave;
	/**
	 * @var QButton Delete
	 */
	protected $btnDelete;
	/**
	 * @var QButton Cancel
	 */
	protected $btnCancel;

	// Create QForm Event Handlers as Needed

//	protected function Form_Exit() {}
//	protected function Form_Load() {}
//	protected function Form_PreRender() {}

	protected function Form_Run() {
		parent::Form_Run();
	}

	protected function Form_Create() {
		parent::Form_Create();

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the EmpresaAfiliadaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctEmpresaAfiliada = EmpresaAfiliadaMetaControl::CreateFromPathInfo($this);
		$this->lblMensUsua_Create();
		$this->lblNotiUsua_Create();
		$this->lblTituForm_Create();

		// Call MetaControl's methods to create qcontrols based on EmpresaAfiliada's data fields
		$this->lblId = $this->mctEmpresaAfiliada->lblId_Create();
		$this->txtNombre = $this->mctEmpresaAfiliada->txtNombre_Create();
		$this->txtPorcentajeDscto = $this->mctEmpresaAfiliada->txtPorcentajeDscto_Create();
		$this->chkActivo = $this->mctEmpresaAfiliada->chkActivo_Create();
		$this->calCreadoEl = $this->mctEmpresaAfiliada->calCreadoEl_Create();
		$this->txtCreadoPor = $this->mctEmpresaAfiliada->txtCreadoPor_Create();
		$this->calModificadoEl = $this->mctEmpresaAfiliada->calModificadoEl_Create();
		$this->txtModificadoPor = $this->mctEmpresaAfiliada->txtModificadoPor_Create();

		$this->btnSave_Create();
		$this->btnCancel_Create();
		$this->btnDelete_Create();

	}

	//-----------------------------
	// Aqui se crean los Objetos 
	//-----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Create/Edit EmpresaAfiliada';
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

	protected function btnSave_Create() {
		// Create Buttons and Actions on this Form
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = QApplication::Translate('Save');
		$this->btnSave->CssClass = 'btn btn-success';
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		$this->btnSave->CausesValidation = true;
	}

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = QApplication::Translate('Cancel');
		$this->btnCancel->CssClass = 'btn btn-warning';
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
	}

	protected function btnDelete_Create() {
		$this->btnDelete = new QButton($this);
		$this->btnDelete->Text = QApplication::Translate('Delete');
		$this->btnDelete->CssClass = 'btn btn-danger';
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('EmpresaAfiliada'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctEmpresaAfiliada->EditMode;
	}

	
	/**
	 * This Form_Validate event handler allows you to specify any custom Form Validation rules.
	 * It will also Blink() on all invalid controls, as well as Focus() on the top-most invalid control.
	 */
	protected function Form_Validate() {
		// By default, we report the result of validation from the parent
		$blnToReturn = parent::Form_Validate();

		// Custom Validation Rules
		// TODO: Be sure to set $blnToReturn to false if any custom validation fails!
		
		$blnFocused = false;
		foreach ($this->GetErrorControls() as $objControl) {
			// Set Focus to the top-most invalid control
			if (!$blnFocused) {
				$objControl->Focus();
				$blnFocused = true;
			}

			// Blink on ALL invalid controls
			$objControl->Blink();
		}

		return $blnToReturn;
	}

		// Button Event Handlers

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		// Delegate "Save" processing to the EmpresaAfiliadaMetaControl
		$this->mctEmpresaAfiliada->SaveEmpresaAfiliada();
		$this->RedirectToListPage();
	}

	protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
		//----------------------------------------
		// Se verifica la integridad referencial
		//----------------------------------------
		$blnTodoOkey = true;
		$arrTablRela = $this->mctEmpresaAfiliada->TablasRelacionadasEmpresaAfiliada();
		if (count($arrTablRela)) {
			$strTablRela = implode(',',$arrTablRela);
				
			$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
			$blnTodoOkey = false;
		}
		if ($blnTodoOkey) {
			// Delegate "Delete" processing to the EmpresaAfiliadaMetaControl
			$this->mctEmpresaAfiliada->DeleteEmpresaAfiliada();
			$this->RedirectToListPage();
		}
	}

	protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->RedirectToListPage();
	}

	// Other Methods

	protected function RedirectToListPage() {
		QApplication::Redirect($_SESSION['PagiBack']);
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