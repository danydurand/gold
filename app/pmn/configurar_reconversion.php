<?php
//------------------------------------------------------------------------------------------------
// Programa      : configurar_reconversion.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 28/05/2018
// Descripcion   : Este programa permite configurar los parametros de la reconversion monetaria
//------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__APP_INCLUDES__ . '/FormularioBaseKaizen.class.php');

class ConfigurarReconversion extends FormularioBaseKaizen {
    protected $objConfReco;
    protected $chkApliReco;
    protected $calFechReco;

    protected function Form_Run() {
        $this->objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
        if (!$this->objConfReco) {
            $this->objConfReco = new Parametro();
            $this->objConfReco->IndiPara = 'ConfReco';
            $this->objConfReco->CodiPara = 'RecoMone';
            $this->objConfReco->DescPara = 'RECONVERSION MONETARIA';
            $this->objConfReco->ParaVal1 = 1;
            $this->objConfReco->ParaTxt1 = '2018-06-04';
            $this->objConfReco->Save();
        }
    }


    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Configurar Reconversión';

        $this->chkApliReco_Create();
        $this->calFechReco_Create();

    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function chkApliReco_Create() {
        $this->chkApliReco = new QCheckBox($this);
        $this->chkApliReco->Name    = 'Aplicar Reconversión Monetaria ?';
        $this->chkApliReco->Checked = $this->objConfReco->ParaVal1;
    }

    protected function calFechReco_Create() {
        $this->calFechReco = new QCalendar($this);
        $this->calFechReco->Name     = 'Fecha de la Reconversión';
        $this->calFechReco->DateTime = new QDateTime($this->objConfReco->ParaTxt1);
    }

    //----------------------------------------
    // Acciones relacionadas a los objetos
    //----------------------------------------

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {

        $this->objConfReco->ParaVal1 = (int)$this->chkApliReco->Checked;
        $this->objConfReco->ParaTxt1 = $this->calFechReco->DateTime->__toString('YYYY-MM-DD');
        $this->objConfReco->Save();

        $this->mensaje('Transacción Exitosa !','','','',__iCHEC__);
    }

}

ConfigurarReconversion::Run('ConfigurarReconversion');
?>
