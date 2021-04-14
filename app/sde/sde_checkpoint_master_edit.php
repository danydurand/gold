<?php
//-----------------------------------------------------------------------------
// Programa      : sde_checkpoint_master_edit.php
// Realizado por : Juan Duran
// Fecha Elab.   : 03/03/2017
// Descripcion   : Este programa muestra un formulario para la edición de los
//                 Checkpoints del Manifiesto que se seleccione de la lista.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
  
class SdeCheckpointMasterEdit extends FormularioBaseKaizen {
    protected $blnTienPerm;
    protected $btnSave;
    protected $lstChecBoxs;
    protected $txtNumeCont;
    protected $txtNumeGuia;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Eliminar Checkpoint');
        
        $this->blnTienPerm = BuscarParametro("ElimCkpt", $this->objUsuario->LogiUsua, "Val1", 0);
        
        $this->txtNumeCont_Create();
        $this->txtNumeCont->Text = "lby12-743lvccs11"; 
        //$this->txtNumeCont->Text = unserialize($_SESSION['NumeCont']); 
        
        $this->lstChecBoxs_Create();
        $this->btnSave_Create();
    }

    //----------------------------
    // Aquí se crean los Objetos
    //----------------------------

    protected function txtNumeCont_Create() {
        $this->txtNumeCont = new QTextBox($this);
        $this->txtNumeCont->Name = QApplication::Translate('Número de Contendor');
        $this->txtNumeCont->Width = 120;
        $this->txtNumeCont->Required = true;
        $this->txtNumeCont->Enabled = true;
        $this->txtNumeCont->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeCont_Blur'));
    }
   
    protected function lstChecBoxs_Create(){
        $this->lstChecBoxs = new QListBox($this);
        $this->lstChecBoxs->Name = QApplication::Translate('Lista de Checkpoints');
        $this->lstChecBoxs->SelectionMode = QSelectionMode::Multiple;
        $this->lstChecBoxs->Rows = 10;
        $this->lstChecBoxs->Required = true;
        $this->lstChecBoxs->Width = 300;
    }
   
    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-trash fa-lg"></i> Eliminar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-danger btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;

        if ($this->blnTienPerm == 1) {
            $this->btnSave->Visible = true;
        } else {
            $this->btnSave->Visible = false;
        }
    }

    //-----------------------------------
    // Acciones asociadas a los Objetos
    //-----------------------------------
   
    protected function txtNumeCont_Blur() {
        // if (strlen("lby12-743lvccs11")) {
        $this->lstChecBoxs->RemoveAllItems();
        $this->lstChecBoxs->Width = 500;
        //   $blnTodoPais = BuscarParametro("TodoPais", $this->objUsuario->LogiUsua, "Val1", 0);
        $objCondicion = QQ::Clause();
        $objCondicion[] = QQ::like(QQN::ContendorCkpt()->Valija, "lby12-743lvccs11");
        // if (!$blnTodoPais) {
        //  $objCondicion[] = QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $this->objUsuario->CodiEsta);
        // }
        foreach (ContendorCkpt::QueryArray(QQ::AndCondition($objCondicion)) as $arrCodiCkptNG) {
            $strPartVisi = $arrCodiCkptNG->Checkpoint.' - '.$arrCodiCkptNG->Fecha->__toString('YYYY-MM-DD').' - '.substr($arrCodiCkptNG->Observacion,0,36);
            $strPartInvi = $arrCodiCkptNG->Checkpoint.','.$arrCodiCkptNG->Fecha->__toString('YYYY-MM-DD').','.substr($arrCodiCkptNG->Observacion,0,36);
            $this->lstChecBoxs->AddItem($strPartVisi, $strPartInvi);
        }
        // }
    }
}

SdeCheckpointMasterEdit::Run('SdeCheckpointMasterEdit');
?>