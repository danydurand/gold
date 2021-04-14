<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RepoIpostelFrm extends FormularioBaseKaizen {
	protected $txtCodiInte;
	protected $txtNombBusc;
	protected $lstTienPodx;

	protected $calFechInic;
	protected $calFechFina;
	protected $lstSucuDest;

	protected function Form_Create() {
		parent::Form_Create();

		$this->lblTituForm->Text = 'Criterios para Reporte Ipostel';
        $this->btnSave->Text = TextoIcono('cogs fa-lg','Generar');

		$this->calFechInic_Create();
		$this->calFechFina_Create();
		$this->lstSucuDest_Create();
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function calFechInic_Create() {
		$this->calFechInic = new QCalendar($this);
		$this->calFechInic->Required = true;
		$this->calFechInic->Name = QApplication::Translate('Fecha Guía Inicial');
	}

	protected function calFechFina_Create() {
		$this->calFechFina = new QCalendar($this);
		$this->calFechFina->Required = true;
		$this->calFechFina->Name = QApplication::Translate('Fecha Guía Final');
	}

	protected function lstSucuDest_Create() {
		$this->lstSucuDest = new QListBox($this);
		$this->lstSucuDest->Name = QApplication::Translate('Sucursal Destino');
		$this->lstSucuDest->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$arrSucuDest = Estacion::LoadArrayByPaisId(1);
		foreach ($arrSucuDest as $objDestino) {
			$this->lstSucuDest->AddItem($objDestino->__toString(),$objDestino->CodiEsta);
		}
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $strMensMost = '';
		//-----------------------------------------------
		// Se arma el SQL para la búsqueda de Registros
		//-----------------------------------------------
		$objClausula = QQ::Clause();
		$objClausula[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$this->calFechInic->DateTime);
		$objClausula[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$this->calFechFina->DateTime);
		if (!is_null($this->lstSucuDest->SelectedValue)) {
			$objClausula[]= QQ::Equal(QQN::Guia()->EstaDest,$this->lstSucuDest->SelectedValue);
		}
		//----------------------------------------------------------------------
		// El Reporte excluirá al Cliente Genérico IMP01 y a la cuenta "CCS03"
		//----------------------------------------------------------------------
		$objClausula[] = QQ::NotIn(QQN::Guia()->CodiClieObject->CodigoInterno,array('IMP01','CCS03'));
		$objClausula[] = QQ::GreaterThan(QQN::Guia()->MontoFranqueo,0);

		if (count($objClausula)){
			$intHayxRegi = Guia::QueryCount(QQ::AndCondition($objClausula));
			if ($intHayxRegi > 0) {
				$_SESSION['InicForm'] = $this->calFechInic->DateTime->__toString("YYYY-MM-DD");
				$_SESSION['FinaForm'] = $this->calFechFina->DateTime->__toString("YYYY-MM-DD");
				$_SESSION['FechInic'] = $this->calFechInic->DateTime->__toString("DD/MM/YYYY");
				$_SESSION['FechFina'] = $this->calFechFina->DateTime->__toString("DD/MM/YYYY");
				$_SESSION['Criterio'] = serialize($objClausula);
				$_SESSION['TablCrit'] = 'Guia';
				$_SESSION['ProgEspe'] = basename($_SERVER['SCRIPT_FILENAME']);
				if ($_SESSION['InicForm'] >= "2014-12-01") {
					QApplication::Redirect('repo_ipostel_new.php');
				} else {
					QApplication::Redirect('repo_ipostel_rpt.php');
				}
			} else {
				unset($_SESSION['Criterio']);
				$strMensMost = 'No existen registros que satisfagan las condiciones!';
			}
		} else {
			unset($_SESSION['Criterio']);
			$strMensMost = 'Debe proporcionar al menos un Criterio para el Reporte!';
		}
        $this->mensaje($strMensMost,'','d','i','hand-stop-o');
	}
}

// Go ahead and run this form object to render the page and its event handlers, using
// generated/guia_edit.tpl.php as the included HTML template file
RepoIpostelFrm::Run('RepoIpostelFrm');
?>