<?php 
require_once('qcubed.inc.php');

class CalculadoraNew extends QForm {
    protected $txtValoMerc;
    protected $txtPesoLibr;
    protected $txtAltoEnvi;
    protected $txtAnchEnvi;
    protected $txtLargEnvi;
    protected $txtPorcAran;

    protected $btnSave;
    protected $btnLimpCamp;

    protected function Form_Create() {

        $this->txtValoMerc_Create();
        $this->txtPesoLibr_Create();
        $this->txtAltoEnvi_Create();
        $this->txtAnchEnvi_Create();
        $this->txtLargEnvi_Create();
        $this->txtPorcAran_Create();

        $this->btnSave_Create();
        $this->btnLimpCamp_Create();

    }

    //----------------------------
    // Aqui se crean los objetos 
    //----------------------------

    protected function txtValoMerc_Create() {
        $this->txtValoMerc = new QFloatTextBox($this,'fobx');
        $this->txtValoMerc->Name = 'Valor de la Mercancía';
        $this->txtValoMerc->CssClass = 'form-control';
        $this->txtValoMerc->Placeholder = 'Valor de la Mercancía (USD)';
        $this->txtValoMerc->Required = true;
    }
    
    protected function txtPesoLibr_Create() {
        $this->txtPesoLibr = new QFloatTextBox($this,'peso');
        $this->txtPesoLibr->Name = 'Peso en Libras';
        $this->txtPesoLibr->CssClass = 'form-control';
        $this->txtPesoLibr->Placeholder = '(en Libras)';
        $this->txtPesoLibr->Required = true;
    }
    
    protected function txtAltoEnvi_Create() {
        $this->txtAltoEnvi = new QFloatTextBox($this,'alto');
        $this->txtAltoEnvi->Name = 'Alto';
        $this->txtAltoEnvi->CssClass = 'form-control';
        $this->txtAltoEnvi->Placeholder = '(Pulgadas)';
        $this->txtAltoEnvi->Required = true;
    }
    
    protected function txtAnchEnvi_Create() {
        $this->txtAnchEnvi = new QFloatTextBox($this,'anch');
        $this->txtAnchEnvi->Name = 'Ancho';
        $this->txtAnchEnvi->CssClass = 'form-control';
        $this->txtAnchEnvi->Placeholder = '(Pulgadas)';
        $this->txtAnchEnvi->Required = true;
    }
    
    protected function txtLargEnvi_Create() {
        $this->txtLargEnvi = new QFloatTextBox($this,'larg');
        $this->txtLargEnvi->Name = 'Largo';
        $this->txtLargEnvi->CssClass = 'form-control';
        $this->txtLargEnvi->Placeholder = '(Pulgadas)';
        $this->txtLargEnvi->Required = true;
    }
    
    protected function txtPorcAran_Create() {
        $this->txtPorcAran = new QFloatTextBox($this,'aran');
        $this->txtPorcAran->Name = '% Arancel';
        $this->txtPorcAran->CssClass = 'form-control';
        $this->txtPorcAran->Placeholder = '(por defecto 20%, aplica p/mayores a USD 100)';
    }
    
    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-calculator fa-lg"></i> Calcular';
        $this->btnSave->CssClass = 'btn btn-success';
        $this->btnSave->CausesValidation = true;
        $this->btnSave->HtmlEntities = false;
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
    }
    
    protected function btnLimpCamp_Create() {
        $this->btnLimpCamp = new QButton($this);
        $this->btnLimpCamp->Text = '<i class="fa fa-refresh fa-lg"></i> Limpiar';
        $this->btnLimpCamp->CssClass = 'btn btn-default';
        $this->btnLimpCamp->HtmlEntities = false;
        $this->btnLimpCamp->AddAction(new QClickEvent(), new QServerAction('btnLimpCamp_Click'));
    }
    
    //------------------------------------
    // Acciones relativas a los objetos 
    //------------------------------------
    
    protected function btnSave_Click() {
        $_SESSION['fobx'] = $this->txtValoMerc->Text;
        $_SESSION['peso'] = $this->txtPesoLibr->Text;
        $_SESSION['alto'] = $this->txtAltoEnvi->Text;
        $_SESSION['anch'] = $this->txtAnchEnvi->Text;
        $_SESSION['larg'] = $this->txtLargEnvi->Text;
        $_SESSION['aran'] = $this->txtPorcAran->Text;
        QApplication::Redirect('resultado_new.php');
    }

    protected function btnLimpCamp_Click() {
        QApplication::Redirect($_SERVER['PHP_SELF']);
    }    
    
}

CalculadoraNew::Run('CalculadoraNew','calculadora_new.tpl.php');
?>