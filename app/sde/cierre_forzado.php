<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CierreForzado extends FormularioBaseKaizen {
    protected $txtListGuia;
    protected $lstCkptPoin;
    protected $txtMotiCkpt;
    protected $txtPersEntr;

    protected $blnTienPerm;
    
    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Cierre Forzado de Guías');

        $this->txtListGuia_Create();
        $this->lstCkptPoin_Create();
        $this->txtMotiCkpt_Create();
        $this->txtPersEntr_Create();

        $this->blnTienPerm = BuscarParametro("CierGuia", $this->objUsuario->LogiUsua, "Val1", 0);

        if ($this->blnTienPerm) {
            $this->btnSave->Visible = true;
        } else {
            $this->btnSave->Visible = false;
        }
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------
    
    protected function txtListGuia_Create() {
        $this->txtListGuia = new QTextBox($this);
        $this->txtListGuia->TextMode = QTextMode::MultiLine;
        $this->txtListGuia->Name = QApplication::Translate('Lista de Guías');
        $this->txtListGuia->Width = 295;
        $this->txtListGuia->Height = 150;
        $this->txtListGuia->Required = true;
    }

    protected function txtMotiCkpt_Create() {
        $this->txtMotiCkpt = new QTextBox($this);
        $this->txtMotiCkpt->Name = QApplication::Translate('Motivo');
        $this->txtMotiCkpt->Width = 295;
        $this->txtMotiCkpt->Text = strtoupper('Cierre Forzado');
        $this->txtMotiCkpt->Required = true;
        $this->txtMotiCkpt->AddAction(new QBlurEvent(), new QAjaxAction('txtMotiCkpt_Blur'));
    }

    protected function txtPersEntr_Create() {
        $this->txtPersEntr = new QTextBox($this);
        $this->txtPersEntr->Name = QApplication::Translate('Entregado a');
        $this->txtPersEntr->Width = 295;
        $this->txtPersEntr->Text = strtoupper('N/A');
        $this->txtPersEntr->Required = true;
        $this->txtPersEntr->AddAction(new QBlurEvent(), new QAjaxAction('txtPersEntr_Blur'));
    }

    protected function lstCkptPoin_Create() {
        $this->lstCkptPoin = new QListBox($this);
        $this->lstCkptPoin->Name = QApplication::Translate('Checkpoint a Asignar');
        $this->lstCkptPoin->Width = 300;
        $this->lstCkptPoin->AddItem(QApplication::Translate('OK'), 1);
        $this->lstCkptPoin->AddItem(QApplication::Translate('CF'), 2);
        $this->lstCkptPoin->Required = true;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------
    
    protected function txtMotiCkpt_Blur() {
        if (strlen($this->txtMotiCkpt->Text) > 0) {
            $this->txtMotiCkpt->Text = strtoupper($this->txtMotiCkpt->Text);
        } else {
            $this->txtMotiCkpt->SetFocus();
        }
    }

    protected function txtPersEntr_Blur() {
        if (strlen($this->txtPersEntr->Text) > 0) {
            $this->txtPersEntr->Text = strtoupper($this->txtPersEntr->Text);
        } else {
            $this->txtPersEntr->SetFocus();
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {

        $intCantGuia = 0;
        $intCantErro = 0;
        $arrListGuia = explode(',',nl2br2($this->txtListGuia->Text));
        $arrListGuia = array_unique($arrListGuia,SORT_STRING);
        $this->txtListGuia->Text = '';

        foreach ($arrListGuia as $strNumeGuia) {

            $objGuia = Guia::Load($strNumeGuia);

            if ($objGuia) {

                $strCkpt = '';

                if ($this->lstCkptPoin->SelectedValue == 1) {
                    $strCkpt = 'OK';
                }

                if ($this->lstCkptPoin->SelectedValue == 2) {
                    $strCkpt = 'CF';
                }

                $objGuia->FechCkpt     = new QDateTime(QDateTime::Now);
                $objGuia->CodiCkpt     = $strCkpt;
                $objGuia->ObseCkpt     = $this->txtMotiCkpt->Text;
                $objGuia->HoraCkpt     = date("H:i");
                $objGuia->FechaEntrega = new QDateTime(QDateTime::Now);
                $objGuia->HoraEntrega  = date("H:i");
                $objGuia->EntregadoA   = $this->txtPersEntr->Text;
                $objGuia->FechaPod     = new QDateTime(QDateTime::Now);
                $objGuia->HoraPod      = date("H:i");
                $objGuia->UsuaCkpt     = $this->objUsuario->CodiUsua;
                $objGuia->UsuarioPod   = $this->objUsuario->CodiUsua;
                $objGuia->Save();

                $objGuiaCkpt = new GuiaCkpt();
                $objGuiaCkpt->NumeGuia = $strNumeGuia;
                $objGuiaCkpt->CodiEsta = $this->objUsuario->CodiEsta;
                $objGuiaCkpt->CodiCkpt = $strCkpt;
                $objGuiaCkpt->FechCkpt = new QDateTime(QDateTime::Now);
                $objGuiaCkpt->HoraCkpt = date("H:i");
                $objGuiaCkpt->TextObse = $this->txtMotiCkpt->Text;
                $objGuiaCkpt->CodiRuta = '';
                $objGuiaCkpt->CodiUsua = $this->objUsuario->CodiUsua;
                $objGuiaCkpt->Save();

                $this->txtListGuia->Text .= $strNumeGuia.' (Guia Cerrada)'.chr(13);
                $intCantGuia ++;
            } else {
                $intCantErro ++;
                $this->txtListGuia->Text .= $strNumeGuia.' (Guia no Existe)'.chr(13);
            }
        }

        $strTextMens = 'El proceso ha culminado.  Guias Cerradas: '.$intCantGuia;
        if ($intCantErro > 0) {
            $strTextMens .= ', Guias con Error: '.$intCantErro;
            $this->mensaje($strTextMens,'m','w','exclamation-triangle');
        } else {
            $this->mensaje($strTextMens,'m','s','check');
        }
    }

    protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
    }
}

CierreForzado::Run('CierreForzado');
?>