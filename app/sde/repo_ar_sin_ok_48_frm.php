<?php

require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/proteger.php');
require_once('../util/includes/funciones.php');

class RepoArSinOk48Frm extends QForm {

	protected $lblTituForm;
	protected $lblMensUsua;
	protected $dttFechDhoy;
	protected $lstCodiEsta;

	protected $btnExpoPdfx;
	protected $btnCancel;

	/* -------------
	|| builder ||
	------------- */

	protected function Form_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = QApplication::Translate('Criterios para Guias con AR sin OK con +48 Hrs');

		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';

		$this->dttFechDhoy_Create();
		$this->lstCodiEsta_Create();

		$this->btnExpoPdfx_Create();
		$this->btnCancel_Create();

		$objDataBase = QApplication::$Database[1];
		$intNumeDmes = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),6,2);
		$intNumeDmes = QType::Cast($intNumeDmes,QType::Integer);
		$intNumeAnio = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),1,4);
		if (strlen($intNumeDmes) == 1) {
			$intNumeDmes = '0'.$intNumeDmes;
		}
		//		$arrRangFech = $this->RangoDeFechas($intNumeAnio,$intNumeDmes);
		$arrRangFech = RangoDeFechas($intNumeAnio,$intNumeDmes);
		//-------------------------------------------
		// Asigno valores por defecto a las Fechas
		//-------------------------------------------
		$this->dttFechDhoy->DateTime = new QDateTime($arrRangFech[1]);
	}

	/* ------------------------
	|| Object's Instances ||
	------------------------ */

	protected function dttFechDhoy_Create() {
		$this->dttFechDhoy = new QCalendar($this);
		$this->dttFechDhoy->Name = QApplication::Translate('Fecha de Hoy');
		$this->dttFechDhoy->CalendarType = QCalendarType::DateOnly;
	}

	protected function lstCodiEsta_Create(){
		$this->lstCodiEsta = new QListBox($this);
		$this->lstCodiEsta->Name = QApplication::Translate('Sucursal');
		$this->lstCodiEsta->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		foreach (Estacion::LoadArrayByCodiStat(1) as $objEstacion) {
			$this->lstCodiEsta->AddItem($objEstacion->DescEsta,$objEstacion->CodiEsta);
		}
		$this->lstCodiEsta->Required = true;
	}

	protected function btnExpoPdfx_Create() {
		$this->btnExpoPdfx = new QButton($this);
		$this->btnExpoPdfx->Text = QApplication::Translate('Exportar PDF');
		$this->btnExpoPdfx->ActionParameter = 'PDF';
		$this->btnExpoPdfx->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
		$this->btnExpoPdfx->PrimaryButton = true;
		$this->btnExpoPdfx->CausesValidation = true;
	}

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = QApplication::Translate('Cancel');
		$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
		$this->btnCancel->CausesValidation = false;
	}

	/* -----------------------------------
	|| actions associated to objects ||
	----------------------------------- */

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$this->lblMensUsua->Text = '';
		$this->lblMensUsua->ForeColor = 'white';
		$blnTodoOkey = true;
		$blnHayxCrit = true;
		//-----------------------------------------------------
		// Se procede a la emision del reporte
		//-----------------------------------------------------
		if ($blnTodoOkey && $blnHayxCrit) {
			$dttFechDhoy = $this->dttFechDhoy->DateTime->__toString('DD/MM/YYYY');
			$objClausula = QQ::Clause();

			if (!is_null($this->lstCodiEsta->SelectedValue)) {
				$strEstaSele = $this->lstCodiEsta->SelectedValue;
				//$strNombRepo .= '-'.$this->lstCodiEsta->SelectedValue;
				$_SESSION['SucuSele'] = serialize($strEstaSele);
			} else {
				unset($_SESSION['SucuSele']);
			}

			//----------------------------------------------------------------------
			// Verifico la existencia de registros que satisfagan las condiciones
			// propuestas por el Usuario
			//----------------------------------------------------------------------
			$_SESSION['FechDhoy'] = serialize($this->dttFechDhoy->DateTime->__toString('YYYY-MM-DD'));
			QApplication::Redirect('repo_ar_sin_ok_48_rpt.php');
		} else {
			$this->lblMensUsua->Text = QApplication::Translate('Debe especificar algun Criterio de seleccion de registros !!!');
			$this->lblMensUsua->ForeColor = 'yellow';
		}

	}

	protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->RedirectToListPage();
	}

	protected function RedirectToListPage() {
		QApplication::Redirect('repo_ar_sin_ok_48_frm.php');
	}

}

RepoArSinOk48Frm::Run('RepoArSinOk48Frm','repo_ar_sin_ok_48_frm.tpl.php');

?>