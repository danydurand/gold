<?php
//--------------------------------------------------------------------------------
// Programa      : repo_guias_borradas.php
// Realizado por : Juan Duran
// Fecha Elab.   : 24/04/2017
// Descripcion   : Este programa ofrece un formulario de criterios de búsqueda
//				   para generar un Reporte de Guías Borradas.
//--------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RepoBorradas extends FormularioBaseKaizen {

	protected $rdbTipoBusc;
	protected $dttFechInic;
	protected $dttFechFina;
	protected $lstCodiEsta;
	protected $strFechRang;

	protected $btnExpoPdfx;

	protected function Form_Create() {
        parent::Form_Create();

		$this->lblTituForm->Text = 'Guías Borradas';

		$this->rdbTipoBusc_Create();
		$this->dttFechInic_Create();
		$this->dttFechFina_Create();
		$this->lstCodiEsta_Create();
		$this->btnExpoPdfx_Create();

        $objDataBase = QApplication::$Database[1];
		$intNumeDmes = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),6,2);
		$intNumeDmes = QType::Cast($intNumeDmes,QType::Integer);
		$intNumeAnio = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),1,4);
		if (strlen($intNumeDmes) == 1) {
		    $intNumeDmes = '0'.$intNumeDmes;
		}
		$arrRangFech = RangoDeFechas($intNumeAnio,$intNumeDmes);
		//-------------------------------------------------
		// Se le asignan valores por defecto a las Fechas
		//-------------------------------------------------
		$this->dttFechInic->DateTime = new QDateTime($arrRangFech[0]);
		$this->strFechRang = $this->dttFechInic->DateTime;
		$this->dttFechInic->DateTime = new QDateTime(QDateTime::Now);
		$this->dttFechFina->DateTime = new QDateTime($arrRangFech[1]);
		//------------------------------
		// Mensaje Informativo Inicial
		//------------------------------
		$this->mensaje('','','','','');
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function rdbTipoBusc_Create() {
		$this->rdbTipoBusc = new QRadioButtonList($this);
        $this->rdbTipoBusc->Name = 'Tipo de Búsqueda:';
        $this->rdbTipoBusc->Required = true;
        $this->rdbTipoBusc->RepeatColumns = 2;
        $this->rdbTipoBusc->AddItem('&nbsp;Fecha Actual &nbsp;&nbsp;','F', true);
        $this->rdbTipoBusc->AddItem('&nbsp;Rango de Fechas','R');
        $this->rdbTipoBusc->HtmlEntities = false;
        $this->rdbTipoBusc->AddAction(new QChangeEvent(), new QAjaxAction('rdbTipoBusc_Change'));
	}

	protected function dttFechInic_Create() {
		$this->dttFechInic = new QCalendar($this);
		$this->dttFechInic->Name = 'Fecha';
		$this->dttFechInic->Width = 100;
		$this->dttFechInic->Required = true;
	}

	protected function dttFechFina_Create() {
		$this->dttFechFina = new QCalendar($this);
		$this->dttFechFina->Name = QApplication::Translate('Fecha Final');
		$this->dttFechFina->Width = 100;
		$this->dttFechFina->Visible = false;
		$this->dttFechFina->Required = false;
	}

	protected function lstCodiEsta_Create(){
		$this->lstCodiEsta = new QListBox($this);
		$this->lstCodiEsta->Name = QApplication::Translate('Sucursal');
		$this->lstCodiEsta->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		foreach (Estacion::LoadArrayByCodiStat(1) as $objEstacion) {
			$this->lstCodiEsta->AddItem($objEstacion->DescEsta,$objEstacion->CodiEsta);
		}
	}

    protected function btnExpoPdfx_Create() {
        $this->btnExpoPdfx = new QButtonI($this);
        $this->btnExpoPdfx->Text = '<i class="fa fa-file-pdf-o fa-lg"></i> Exportar PDF';
        $this->btnExpoPdfx->ActionParameter = 'PDF';
        $this->btnExpoPdfx->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnExpoPdfx->PrimaryButton = true;
    }

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function rdbTipoBusc_Change() {
        if ($this->rdbTipoBusc->SelectedValue == 'R') {
            $this->dttFechInic->Name = 'Fecha Inicial';
            $this->dttFechFina->Visible = true;
			$this->dttFechFina->Required = true;
            $this->dttFechInic->DateTime = $this->strFechRang;
        } else {
            $this->dttFechFina->Visible = false;
			$this->dttFechFina->Required = false;
            $this->dttFechInic->DateTime = new QDateTime(QDateTime::Now);
            $this->dttFechInic->Name = 'Fecha';
        }
    }

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$blnTodoOkey = true;
		$blnHayxCrit = false;
		//-----------------------
		// Validación de Fechas
		//-----------------------
		if ($blnTodoOkey) {
			if ($this->dttFechInic->DateTime && $this->dttFechFina->DateTime) {
				if ($this->dttFechFina->DateTime < $this->dttFechInic->DateTime) {
					$this->dttFechFina->Warning = QApplication::Translate('La Fecha Final no puede ser Menor a la Fecha Inicial');
					$blnTodoOkey = false;
				} else {
					$blnHayxCrit = true;
				}
			}
		}
		//----------------------------------------------------------------------------
		// Una vez hechas todas las validaciones se procede a la emisión del reporte
		//----------------------------------------------------------------------------
		if ($blnTodoOkey && $blnHayxCrit) {
			$dttFechInic = $this->dttFechInic->DateTime->__toString('DD/MM/YYYY');
			$dttFechFina = $this->dttFechFina->DateTime->__toString('DD/MM/YYYY');
			$objClausula = QQ::Clause();

			if (!is_null($this->lstCodiEsta->SelectedValue)) {
				$strEstaSele = $this->lstCodiEsta->SelectedValue;
				$_SESSION['SucuSele'] = serialize($strEstaSele);
			} else {
				unset($_SESSION['SucuSele']);
			}

			//---------------------------------------------------------------------------
			// Se verifica la existencia de registros según las condiciones del Usuario
			//---------------------------------------------------------------------------
			$_SESSION['FechInic'] = serialize($this->dttFechInic->DateTime->__toString('YYYY-MM-DD'));
			$_SESSION['FechFina'] = serialize($this->dttFechFina->DateTime->__toString('YYYY-MM-DD'));
			QApplication::Redirect('repo_guias_borradas.pdf.php');
		} else {
			$this->mensaje('Debe especificar algún Criterio','','w','','exclamation-triangle');
		}
	}
}

RepoBorradas::Run('RepoBorradas');
?>