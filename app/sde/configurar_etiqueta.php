<?php
//-----------------------------------------------------------------------------
// Programa      : configurar_etiqueta.php
// Realizado por : Juan Duran
// Fecha Elab.   : 17/02/2017
// Descripcion   : Este programa muestra un formulario con las medidas 
//                 de la etiqueta que generar el Sistema.  Los valores
//                 son almacenados en la tabla "parametro".
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ConfigurarEtiqueta extends FormularioBaseKaizen {

    protected $objMediEtiq;
    protected $objTamaEtiq;

    protected $txtAltoEtiq;
    protected $txtAnchEtiq;
    protected $txtMargIzqu;
    protected $txtAnchPagi;
    protected $txtMargSupe;
    protected $txtSangDate;
    protected $txtSangGuia;
    protected $txtSangIdxx;
    protected $txtSangCodx;
    protected $txtSangCody;

    protected $txtTamaGuia;
    protected $txtCodiBarx;
    protected $txtCodiBary;
    protected $txtTamaRemi;
    protected $txtTamaDest;
    protected $txtTamaGui2;
    protected $txtTamaIdxx;
    protected $txtTamaFoot;

    protected $intAltoEtiq;  // Alto de la etiqueta
    protected $intAnchEtiq;  // Ancho de la etiqueta
    protected $intMargIzqu;  // Margen izquierdo de la etiqueta
    protected $intAnchPagi;  // Ancho del contenido interno de la etiqueta
    protected $intMargSupe;  // MArgen superior de la etiqueta
    protected $intSangDate;  // Sangría de la fecha
    protected $intSangGuia;  // Sangría del numero de la guia
    protected $intSangIdxx;  // Sangría del ID de la etiqueta
    protected $intSangCodx;  // Sangría ó margen horizontal del Código de Barra
    protected $intSangCody;  // Sangría ó margen vertical del Código de Barra

    protected $intTamaGuia;  // Tamaño del Nro de la Guia
    protected $intCodiBarx;  // Largo del código de barra
    protected $intCodiBary;  // Ancho del código de barra
    protected $intTamaRemi;  // Tamaño de caracteres del remitente
    protected $intTamaDest;  // Tamaño de caracteres del destinatario
    protected $intTamaGui2;  // Tamaño de caracteres de datos de la guia
    protected $intTamaIdxx;  // Tamaño de Id de la etiqueta
    protected $intTamaFoot;  // Tamaño de datos del footer

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Configurar Etiqueta');

        $this->objMediEtiq = BuscarParametro('AjusEtiq','MediEtiq','TODO',null);
        //------------------------------------------------
        // Margenes y principales medidas de la Etiqueta
        //------------------------------------------------
        if ($this->objMediEtiq) {
            $this->intSangDate = trim($this->objMediEtiq->ParaTxt1);
            $this->intSangGuia = trim($this->objMediEtiq->ParaTxt2);
            $this->intSangIdxx = trim($this->objMediEtiq->ParaTxt3);
            $this->intSangCodx = trim($this->objMediEtiq->ParaTxt4);
            $this->intSangCody = trim($this->objMediEtiq->ParaTxt5);
            $this->intAnchEtiq = $this->objMediEtiq->ParaVal1;
            $this->intAltoEtiq = $this->objMediEtiq->ParaVal2;
            $this->intMargIzqu = $this->objMediEtiq->ParaVal3;
            $this->intAnchPagi = $this->objMediEtiq->ParaVal4;
            $this->intMargSupe = $this->objMediEtiq->ParaVal5;
        } else {
            $this->objMediEtiq = new Parametro();
            $this->objMediEtiq->IndiPara = 'AjusEtiq';
            $this->objMediEtiq->CodiPara = 'MediEtiq';
            $this->objMediEtiq->DescPara = 'Medidas de la Etiqueta impresa en el Sistema Nacional';
            $this->intSangDate = 120;
            $this->intSangGuia = 25;
            $this->intSangIdxx = 30;
            $this->intSangCodx = 20;
            $this->intSangCody = 14;
            $this->intAnchEtiq = 148;
            $this->intAltoEtiq = 210;
            $this->intMargIzqu = 5;
            $this->intAnchPagi = 140;
            $this->intMargSupe = 10;
        }

        //-------------------------------
        // Tamaños de algunos caracteres
        //-------------------------------
        $this->objTamaEtiq = BuscarParametro('AjusEtiq','TamaEtiq','TODO',null);
        if ($this->objTamaEtiq) {
            $this->intTamaGuia = trim($this->objTamaEtiq->ParaTxt1);
            $this->intCodiBarx = trim($this->objTamaEtiq->ParaTxt2);
            $this->intCodiBary = trim($this->objTamaEtiq->ParaTxt3);
            $this->intTamaRemi = $this->objTamaEtiq->ParaVal1;
            $this->intTamaDest = $this->objTamaEtiq->ParaVal2;
            $this->intTamaGui2 = $this->objTamaEtiq->ParaVal3;
            $this->intTamaIdxx = $this->objTamaEtiq->ParaVal4;
            $this->intTamaFoot = $this->objTamaEtiq->ParaVal5;
        } else {
            $this->objTamaEtiq = new Parametro();
            $this->objTamaEtiq->IndiPara = 'AjusEtiq';
            $this->objTamaEtiq->CodiPara = 'TamaEtiq';
            $this->objTamaEtiq->DescPara = 'Tamaño de los caracteres en la Etiqueta';
            $this->intTamaGuia = 62;
            $this->intTamaRemi = 8;
            $this->intTamaDest = 10;
            $this->intTamaGui2 = 12;
            $this->intTamaIdxx = 58;
            $this->intTamaFoot = 7;
        }

        $this->txtAnchEtiq_Create();
        $this->txtAltoEtiq_Create();
        $this->txtMargIzqu_Create();
        $this->txtAnchPagi_Create();
        $this->txtMargSupe_Create();
        $this->txtSangDate_Create();
        $this->txtSangGuia_Create();
        $this->txtSangIdxx_Create();
        $this->txtSangCodx_Create();
        $this->txtSangCody_Create();

        $this->txtTamaGuia_Create();
        $this->txtCodiBarx_Create();
        $this->txtCodiBary_Create();
        $this->txtTamaRemi_Create();
        $this->txtTamaDest_Create();
        $this->txtTamaGui2_Create();
        $this->txtTamaIdxx_Create();
        $this->txtTamaFoot_Create();

        $this->btnSave_Create();
        $this->btnCancel_Create();
    }

    //---------------------------
    // Aqui se crean los objetos
    //---------------------------

    protected function txtAnchEtiq_Create() {
        $this->txtAnchEtiq = new QFloatTextBox($this);
        $this->txtAnchEtiq->Name = QApplication::Translate('Ancho de la Etiqueta');
        $this->txtAnchEtiq->Width = 80;
        $this->txtAnchEtiq->Text = $this->intAnchEtiq;
    }

    protected function txtAltoEtiq_Create() {
        $this->txtAltoEtiq = new QFloatTextBox($this);
        $this->txtAltoEtiq->Name = QApplication::Translate('Alto de la Etiqueta');
        $this->txtAltoEtiq->Width = 80;
        $this->txtAltoEtiq->Text = $this->intAltoEtiq;
    }

    protected function txtMargIzqu_Create() {
        $this->txtMargIzqu = new QFloatTextBox($this);
        $this->txtMargIzqu->Name = QApplication::Translate('Margen Izquierdo');
        $this->txtMargIzqu->Width = 80;
        $this->txtMargIzqu->Text = $this->intMargIzqu;
    }

    protected function txtAnchPagi_Create() {
        $this->txtAnchPagi = new QFloatTextBox($this);
        $this->txtAnchPagi->Name = QApplication::Translate('Ancho del Contenido');
        $this->txtAnchPagi->Width = 80;
        $this->txtAnchPagi->Text = $this->intAnchPagi;
    }

    protected function txtMargSupe_Create() {
        $this->txtMargSupe = new QFloatTextBox($this);
        $this->txtMargSupe->Name = QApplication::Translate('Margen Superior');
        $this->txtMargSupe->Width = 80;
        $this->txtMargSupe->Text = $this->intMargSupe;
    }

    protected function txtSangDate_Create() {
        $this->txtSangDate = new QFloatTextBox($this);
        $this->txtSangDate->Name = QApplication::Translate('Sangría de la Fecha');
        $this->txtSangDate->Width = 80;
        $this->txtSangDate->Text = $this->intSangDate;
    }

    protected function txtSangGuia_Create() {
        $this->txtSangGuia = new QFloatTextBox($this);
        $this->txtSangGuia->Name = QApplication::Translate('Sangría del # de la Guía');
        $this->txtSangGuia->Width = 80;
        $this->txtSangGuia->Text = $this->intSangGuia;
    }

    protected function txtSangIdxx_Create() {
        $this->txtSangIdxx = new QFloatTextBox($this);
        $this->txtSangIdxx->Name = QApplication::Translate('Sangría del ID de la Etiqueta');
        $this->txtSangIdxx->Width = 80;
        $this->txtSangIdxx->Text = $this->intSangIdxx;
    }

    protected function txtSangCodx_Create() {
        $this->txtSangCodx = new QFloatTextBox($this);
        $this->txtSangCodx->Name = QApplication::Translate('Margen Izquierdo del Código de Barra');
        $this->txtSangCodx->Width = 80;
        $this->txtSangCodx->Text = $this->intSangCodx;
    }

    protected function txtSangCody_Create() {
        $this->txtSangCody = new QFloatTextBox($this);
        $this->txtSangCody->Name = QApplication::Translate('Margen Superior del Código de Barra');
        $this->txtSangCody->Width = 80;
        $this->txtSangCody->Text = $this->intSangCody;
    }

    protected function txtTamaGuia_Create() {
        $this->txtTamaGuia = new QFloatTextBox($this);
        $this->txtTamaGuia->Name = QApplication::Translate('Tamaño del # de la Guía');
        $this->txtTamaGuia->Width = 80;
        $this->txtTamaGuia->Text = $this->intTamaGuia;
    }

    protected function txtCodiBarx_Create() {
        $this->txtCodiBarx = new QFloatTextBox($this);
        $this->txtCodiBarx->Name = QApplication::Translate('Ancho del Código de Barra');
        $this->txtCodiBarx->Width = 80;
        $this->txtCodiBarx->Text = $this->intCodiBarx;
    }

    protected function txtCodiBary_Create() {
        $this->txtCodiBary = new QFloatTextBox($this);
        $this->txtCodiBary->Name = QApplication::Translate('Alto del Código de Barra');
        $this->txtCodiBary->Width = 80;
        $this->txtCodiBary->Text = $this->intCodiBary;
    }

    protected function txtTamaRemi_Create() {
        $this->txtTamaRemi = new QFloatTextBox($this);
        $this->txtTamaRemi->Name = QApplication::Translate('Tamaño de los Datos del Remitente');
        $this->txtTamaRemi->Width = 80;
        $this->txtTamaRemi->Text = $this->intTamaRemi;
    }

    protected function txtTamaDest_Create() {
        $this->txtTamaDest = new QFloatTextBox($this);
        $this->txtTamaDest->Name = QApplication::Translate('Tamaño de los Datos del Destinatario');
        $this->txtTamaDest->Width = 80;
        $this->txtTamaDest->Text = $this->intTamaDest;
    }

    protected function txtTamaGui2_Create() {
        $this->txtTamaGui2 = new QFloatTextBox($this);
        $this->txtTamaGui2->Name = QApplication::Translate('Tamaño de los Datos de la Guía');
        $this->txtTamaGui2->Width = 80;
        $this->txtTamaGui2->Text = $this->intTamaGui2;
    }

    protected function txtTamaIdxx_Create() {
        $this->txtTamaIdxx = new QFloatTextBox($this);
        $this->txtTamaIdxx->Name = QApplication::Translate('Tamaño del ID de la Etiqueta');
        $this->txtTamaIdxx->Width = 80;
        $this->txtTamaIdxx->Text = $this->intTamaIdxx;
    }

    protected function txtTamaFoot_Create() {
        $this->txtTamaFoot = new QFloatTextBox($this);
        $this->txtTamaFoot->Name = QApplication::Translate('Tamaño de los Datos del Pie de la Etiqueta');
        $this->txtTamaFoot->Width = 80;
        $this->txtTamaFoot->Text = $this->intTamaFoot;
    }

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-floppy-o fa-lg"></i> Guardar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->CausesValidation = true;
    }

    //-------------------------------------
    // Acciones relacionadas a los objetos
    //-------------------------------------

    protected function Form_Validate() {
        $blnTodoOkey = true;
        if ($this->txtCantCupo->Text <= 0) {
           $this->txtCantCupo->Warning = QApplication::Translate("La cantidad de cupones debe ser un numero positivo");
           $blnTodoOkey = false;
        }
        if ($this->txtPorcValo->Text <= 0) {
           $this->txtPorcValo->Warning = QApplication::Translate("El Porcentaje o Valor, debe ser un numero positivo");
           $blnTodoOkey = false;
        }
        if ($this->calVigeHast->DateTime->__toString("YYYY-MM-DD") < date("Y-m-d")) {
           $this->calVigeHast->Warning = QApplication::Translate("La fecha no puede ser menor a la fecha de hoy");
           $blnTodoOkey = false;
        }
        return $blnTodoOkey;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->objMediEtiq->ParaTxt1 = $this->txtSangDate->Text;
        $this->objMediEtiq->ParaTxt2 = $this->txtSangGuia->Text;
        $this->objMediEtiq->ParaTxt3 = $this->txtSangIdxx->Text;
        $this->objMediEtiq->ParaTxt4 = $this->txtSangCodx->Text;
        $this->objMediEtiq->ParaTxt5 = $this->txtSangCody->Text;
        $this->objMediEtiq->ParaVal1 = $this->txtAnchEtiq->Text;
        $this->objMediEtiq->ParaVal2 = $this->txtAltoEtiq->Text;
        $this->objMediEtiq->ParaVal3 = $this->txtMargIzqu->Text;
        $this->objMediEtiq->ParaVal4 = $this->txtAnchPagi->Text;
        $this->objMediEtiq->ParaVal5 = $this->txtMargSupe->Text;
        $this->objMediEtiq->Save();

        $this->objTamaEtiq->ParaTxt1 = $this->txtTamaGuia->Text;
        $this->objTamaEtiq->ParaTxt2 = $this->txtCodiBarx->Text;
        $this->objTamaEtiq->ParaTxt3 = $this->txtCodiBary->Text;
        $this->objTamaEtiq->ParaVal1 = $this->txtTamaRemi->Text;
        $this->objTamaEtiq->ParaVal2 = $this->txtTamaDest->Text;
        $this->objTamaEtiq->ParaVal3 = $this->txtTamaGui2->Text;
        $this->objTamaEtiq->ParaVal4 = $this->txtTamaIdxx->Text;
        $this->objTamaEtiq->ParaVal5 = $this->txtTamaFoot->Text;
        $this->objTamaEtiq->Save();

        $this->Mensaje('Transacción Exitosa');
    }
}

ConfigurarEtiqueta::Run('ConfigurarEtiqueta', 'configurar_etiqueta.tpl.php');
?>