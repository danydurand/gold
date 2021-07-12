<?php
//---------------------------------------------------------------------------------------------------
// Programa      : mostrar_errores.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 05/05/2021
//---------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class MostrarErrores extends FormularioBaseKaizen {
    protected $arrListErro;
    protected $dtgListErro;
    
    protected function SetupValores() {
        $this->arrListErro = unserialize($_SESSION['Dato']);
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->lblTituForm->Text = 'Errores del Proceso';

        $this->dtgListErro_Create();
    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------

    protected function dtgListErro_Create() {
        $this->dtgListErro = new QDataGrid($this);
        $this->dtgListErro->FontSize = 12;
        $this->dtgListErro->ShowFilter = false;

        $this->dtgListErro->CssClass = 'datagrid';
        $this->dtgListErro->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgListErro->SetDataBinder('dtgListErro_Bind');

        $this->createDtgListErroColumns();
    }

    protected function dtgListErro_Bind() {
        $this->dtgListErro->DataSource = $this->arrListErro;
    }

    protected function createDtgListErroColumns() {
        $colGuiaPiez = new QDataGridColumn($this);
        $colGuiaPiez->Name = QApplication::Translate('Guia/Pieza');
        $colGuiaPiez->Html = '<?= $_ITEM[0]; ?>';
        $this->dtgListErro->AddColumn($colGuiaPiez);

        $colDescErro = new QDataGridColumn($this);
        $colDescErro->Name = QApplication::Translate('Descripcion del Error');
        $colDescErro->Html = '<?= $_ITEM[1]; ?>';
        $this->dtgListErro->AddColumn($colDescErro);

    }

    
}

MostrarErrores::Run('MostrarErrores');
?>
