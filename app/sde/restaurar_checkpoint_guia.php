<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class RestaurarCkptGuia extends FormularioBaseKaizen {

    protected $txtNumeGuia;
    protected $lstChecBoxs;
    protected $objListGuia = array();
    protected $intNumeRegi;
    protected $blnTienPerm;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Restaurar Checkpoint');

        $this->blnTienPerm = BuscarParametro("RestGuia", $this->objUsuario->LogiUsua, "Val1", 0);

        $this->txtNumeGuia_Create();
        $this->lstChecBoxs_Create();

        if ($this->blnTienPerm == 1) {
            $this->btnSave->Visible = true;
        } else {
            $this->btnSave->Visible = false;
        }
    }

    //-----------------------
    // Creamos los objetos
    //-----------------------


    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate('Numero de Guia');
        $this->txtNumeGuia->Required = true;
        $this->txtNumeGuia->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeGuia_Blur'));
    }

    protected function lstChecBoxs_Create(){
        $this->lstChecBoxs = new QListBox($this);
        $this->lstChecBoxs->Name = QApplication::Translate('Lista de Checkpoints');
        $this->lstChecBoxs->SelectionMode = QSelectionMode::Multiple;
        $this->lstChecBoxs->Rows = 10;
        $this->lstChecBoxs->Required = true;
        $this->lstChecBoxs->Width = 500;
    }


    protected function txtNumeGuia_Blur() {
        if (strlen($this->txtNumeGuia->Text)) {
            $this->lstChecBoxs->RemoveAllItems();
            $this->lstChecBoxs->Width = 550;

            $objCondicion   = QQ::Clause();
            $objCondicion[] = QQ::Equal(QQN::RegistroTrabajo()->GuiaId, $this->txtNumeGuia->Text);
            $objCondicion[] = QQ::Equal(QQN::RegistroTrabajo()->CheckpointId, 'EC');
            $objCondicion[] = QQ::Equal(QQN::RegistroTrabajo()->UsuarioId, $this->objUsuario->CodiUsua);

            $arrCkptGuia = RegistroTrabajo::QueryArray(QQ::AndCondition($objCondicion), QQ::Clause(QQ::OrderBy(QQN::RegistroTrabajo()->Fecha)));
            if (count($arrCkptGuia) > 0) {
                foreach ($arrCkptGuia as $this->objListGuia) {
                    $arrListCkpt = explode('|',$this->objListGuia->Comentario);
                    $strCodiSucu = $arrListCkpt[1];
                    $strCodiCkpt = $arrListCkpt[2];
                    $strFechCkpt = $arrListCkpt[3];
                    $strHoraCkpt = $arrListCkpt[4];
                    $strTextObse = substr($arrListCkpt[5],0,36);
                    $strCodiRuta = $arrListCkpt[6];
                    $strCodiUsua = $arrListCkpt[7];
                    $this->intNumeRegi = $this->objListGuia->Id;

                    $strPartVisi = $strCodiCkpt.' - '.$strCodiSucu.' - '.$strFechCkpt.' - '.$strHoraCkpt.' - '.$strTextObse;
                    $strPartInvi = $this->objListGuia->GuiaId.','.$strCodiCkpt.','.$strCodiSucu.','.$strFechCkpt.','.$strHoraCkpt.','.$arrListCkpt[5].','.$strCodiRuta.','.$strCodiUsua.','.$this->intNumeRegi;
                    $this->lstChecBoxs->AddItem($strPartVisi, $strPartInvi);
                }
            } else {
                $this->mensaje('La Guia no dispone de Checkpoint(s) para Restaurar','m','d','info-circle');
            }

        }
    }


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $arrClavRegi = $this->lstChecBoxs->SelectedValues;
        $objDatabase = Guia::GetDatabase();
        $intContElem = count($arrClavRegi);

        foreach ($arrClavRegi as $strCkptDelt) {

            $arrCkptDelt = explode(',',$strCkptDelt);

            $strNumeGuia = $arrCkptDelt[0];
            $strCodiCkpt = $arrCkptDelt[1];
            $strCodiEsta = $arrCkptDelt[2];
            $strFechCkpt = $arrCkptDelt[3];
            $strHoraCkpt = $arrCkptDelt[4];
            $strTextObse = $arrCkptDelt[5];
            $strCodiRuta = $arrCkptDelt[6];
            $strCodiUsua = $arrCkptDelt[7];
            $intNumeRegi = $arrCkptDelt[8];

            $strNumeGuia = trim($strNumeGuia);
            $strCodiCkpt = trim($strCodiCkpt);
            $strCodiEsta = trim($strCodiEsta);
            $strFechCkpt = trim($strFechCkpt);
            $strHoraCkpt = trim($strHoraCkpt);
            $strTextObse = trim($strTextObse);
            $strCodiRuta = trim($strCodiRuta);
            $strCodiUsua = trim($strCodiUsua);

            $strRegiTrab = $strNumeGuia.' | '.$strCodiEsta.' | '.$strCodiCkpt.' | '.$strFechCkpt.' | '.$strHoraCkpt.' | '.$strTextObse.' | '.$strCodiRuta.' | '.$strCodiUsua;

            $objGuiaCkpt = new GuiaCkpt();
            $objGuiaCkpt->NumeGuia = $strNumeGuia;
            $objGuiaCkpt->CodiEsta = $strCodiEsta;
            $objGuiaCkpt->CodiCkpt = $strCodiCkpt;
            $objGuiaCkpt->FechCkpt = new QDateTime($strFechCkpt);
            $objGuiaCkpt->HoraCkpt = $strHoraCkpt;
            $objGuiaCkpt->TextObse = $strTextObse;
            $objGuiaCkpt->CodiRuta = $strCodiRuta;
            $objGuiaCkpt->CodiUsua = $strCodiUsua;
            $objGuiaCkpt->Save();

            //----------------------------------------------------------------------------------------
            // En el Registro de Trabajo, debe quedar constancia de los cambios ocurridos a la Guia
            //----------------------------------------------------------------------------------------
            $objRegiTrab = new RegistroTrabajo();
            $objRegiTrab->Id           = proxNroRegiTrab();
            $objRegiTrab->GuiaId       = $strNumeGuia;
            $objRegiTrab->Comentario   = 'RESTAURO CHECKPOINT: '.strtoupper($strRegiTrab);
            $objRegiTrab->UsuarioId    = $this->objListGuia->UsuarioId;
            $objRegiTrab->Fecha        = new QDateTime(QDateTime::Now);
            $objRegiTrab->Hora         = date("H:i:s");
            $objRegiTrab->SucursalId   = $this->objListGuia->SucursalId;
            $objRegiTrab->CheckpointId = 'PC';
            $objRegiTrab->Save();

            $objDeltRegi = RegistroTrabajo::Load($intNumeRegi);
            $objDeltRegi ->Delete();

            $this->mensaje('Transaccion Exitosa','m','s','check');
        }
        $this->txtNumeGuia_Blur();
    }

    protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
    }


}

RestaurarCkptGuia::Run('RestaurarCkptGuia');
?>
