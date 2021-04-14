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

class RepoResumenGuiasKilos extends FormularioBaseKaizen {

	protected $btnExpoPdfx;

	protected function Form_Create() {
        parent::Form_Create();

		$this->lblTituForm->Text = 'Resumen Guías/Kilos';

		$this->btnExpoPdfx_Create();

		//------------------------------
		// Mensaje Informativo Inicial
		//------------------------------
		$this->mensaje('','','','','');
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

    protected function btnExpoPdfx_Create() {
        $this->btnExpoPdfx = new QButtonI($this);
        $this->btnExpoPdfx->Text = '<i class="fa fa-file-pdf-o fa-lg"></i> Exportar XLS';
        $this->btnExpoPdfx->ActionParameter = 'PDF';
        $this->btnExpoPdfx->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnExpoPdfx->PrimaryButton = true;
    }

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function Form_Validate() {
    }

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $strMensUsua = '';
		$blnTodoOkey = true;
	}
}

RepoResumenGuiasKilos::Run('RepoResumenGuiasKilos');
?>