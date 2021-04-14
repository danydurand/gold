<?php
//--------------------------------------------------------------------------------
// Programa      : repo_entregas.php
// Realizado por : Juan Duran
// Fecha Elab.   : 24/04/2017
// Descripcion   : Este programa ofrece un formulario de criterios de búsqueda
//				   para generar un Reporte de Entregas Realizadas.
//--------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RepoEntregas extends FormularioBaseKaizen {

	protected $rdbTipoBusc;
	protected $dttFechInic;
	protected $dttFechFina;
	protected $lstCodiEsta;
	protected $strFechRang;

	protected $btnExpoPdfx;

	protected function Form_Create() {
        parent::Form_Create();

		$this->lblTituForm->Text = 'Entregas Realizadas';

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

    protected function Form_Validate() {
        $strMensUsua = '';
		$blnTodoOkey = true;
		$blnHayxCrit = false;
		$blnBuscFech = false;

		if (is_null($this->lstCodiEsta->SelectedValue)) {
			$blnTodoOkey = false;
			$strMensUsua = 'Debe escoger al menos una Sucursal.';
		}
		//-----------------------
		// Validación de Fechas
		//-----------------------
		if ($this->rdbTipoBusc->SelectedValue = 'F') {
			$blnHayxCrit = true;
			$blnBuscFech = true;
		} else {
			if ($this->dttFechInic->DateTime && $this->dttFechFina->DateTime) {
				if ($this->dttFechFina->DateTime < $this->dttFechInic->DateTime) {
					$blnTodoOkey = false;
		            if (strlen($strMensUsua) > 0) {
		                $strMensUsua .= ' ';
		            	$strMensUsua .= 'La Fecha Final no puede ser Menor a la Fecha Inicial.';
		            } else {
		            	$strMensUsua = 'La Fecha Final no puede ser Menor a la Fecha Inicial.';
		            }
				} else {
					$blnHayxCrit = true;
				}
			}
		}
        if (!$blnTodoOkey) {
        	$this->mensaje($strMensUsua,'','d','','hand-stop-o');
        }
        return $blnTodoOkey;
    }

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
        $strMensUsua = '';
		$blnTodoOkey = true;
		$blnHayxCrit = false;
		$blnBuscFech = false;
		//-----------------------
		// Validación de Fechas
		//-----------------------
		if ($blnTodoOkey) {
			if ($this->rdbTipoBusc->SelectedValue = 'F') {
				$blnHayxCrit = true;
				$blnBuscFech = true;
			} else {
				if ($this->dttFechInic->DateTime && $this->dttFechFina->DateTime) {
					if ($this->dttFechFina->DateTime < $this->dttFechInic->DateTime) {
						$blnTodoOkey = false;
						$strMensUsua = 'La Fecha Final no puede ser Menor a la Fecha Inicial';
					} else {
						$blnHayxCrit = true;
						$blnBuscFech = false;
					}
				}
			}
		}
        if ($blnTodoOkey) {
			//----------------------------------------------------------------------------
			// Una vez hechas todas las validaciones se procede a la emisión del reporte
			//----------------------------------------------------------------------------
			if ($blnHayxCrit) {
				if ($blnBuscFech == true) {
					$dttFechInic = $this->dttFechInic->DateTime->__toString('DD/MM/YYYY');
					$_SESSION['FechInic'] = serialize($this->dttFechInic->DateTime->__toString('YYYY-MM-DD'));
					$_SESSION['FechFina'] = serialize($this->dttFechInic->DateTime->__toString('YYYY-MM-DD'));
				} else {
					$dttFechInic = $this->dttFechInic->DateTime->__toString('DD/MM/YYYY');
					$dttFechFina = $this->dttFechFina->DateTime->__toString('DD/MM/YYYY');
					$_SESSION['FechInic'] = serialize($this->dttFechInic->DateTime->__toString('YYYY-MM-DD'));
					$_SESSION['FechFina'] = serialize($this->dttFechFina->DateTime->__toString('YYYY-MM-DD'));
				}
				$objClausula = QQ::Clause();

				if (!is_null($this->lstCodiEsta->SelectedValue)) {
					$strEstaSele = $this->lstCodiEsta->SelectedValue;
					$_SESSION['SucuSele'] = serialize($strEstaSele);
				} else {
					unset($_SESSION['SucuSele']);
				}
				QApplication::Redirect('repo_entregas.pdf.php');
			} else {
				$srtMensUsua = 'Debe especificar algún Criterio';
				$this->mensaje($srtMensUsua,'','w','','exclamation-triangle');
			}
        }
	}
}

RepoEntregas::Run('RepoEntregas');
?>