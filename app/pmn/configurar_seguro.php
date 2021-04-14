<?php
//-----------------------------------------------------------------------------
// Programa      : conf_segu_pmn.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 18/04/2018
// Descripcion   : Este programa permite configurar los parametros de seguro
//                 del Expreso Nacional
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ConfigurarSeguro extends FormularioBaseKaizen {
    // Parametros del Seguro PMN
    protected $objSeguPmnx;
    protected $objSeguPmn1;
    protected $objSeguPmn2;
    protected $objSeguPmn3;
    protected $objSeguPmn4;
    protected $objSeguPmn5;
    protected $objSeguPmn6;
    protected $objSeguPmn7;
    protected $objSeguPmn8;
    protected $objSeguPmn9;
    protected $objSeguPmn10;
    protected $objSeguPmn11;

    protected $chkSeguSino;  // Se trabaja con Seguro?

    protected $txtMontMini;  // Monto Minimo del Valor Declarado (requerido para asegurar)
    protected $txtMontMini2;
    protected $txtMontMini3;
    protected $txtMontMini4;
    protected $txtMontMini5;
    protected $txtMontMini6;
    protected $txtMontMini7;
    protected $txtMontMini8;
    protected $txtMontMini9;
    protected $txtMontMini10;
    protected $txtMontMini11;

    protected $txtMontMaxi;  // Monto Maximo del Valor Declarado (requerido para asegurar)
    protected $txtMontMaxi2;
    protected $txtMontMaxi3;
    protected $txtMontMaxi4;
    protected $txtMontMaxi5;
    protected $txtMontMaxi6;
    protected $txtMontMaxi7;
    protected $txtMontMaxi8;
    protected $txtMontMaxi9;
    protected $txtMontMaxi10;
    protected $txtMontMaxi11;

    protected $txtPorcSegu;  // Porcentaje de seguro que se estara cobrando
    protected $txtPorcSegu2;
    protected $txtPorcSegu3;
    protected $txtPorcSegu4;
    protected $txtPorcSegu5;
    protected $txtPorcSegu6;
    protected $txtPorcSegu7;
    protected $txtPorcSegu8;
    protected $txtPorcSegu9;
    protected $txtPorcSegu10;
    protected $txtPorcSegu11;

    protected $txtRutaMaxi;  // Limite de costo que permite salir a ruta sin haber cobrado la factura

    protected $intSeguSino;  // Se trabaja con Seguro?

    protected $arrValoMini;
    protected $arrValoMaxi;
    protected $arrPorcSegu;

    protected $decMontMini;  // Monto Minimo del Valor Declarado (requerido para asegurar)
    protected $decMontMini2;
    protected $decMontMini3;
    protected $decMontMini4;
    protected $decMontMini5;
    protected $decMontMini6;
    protected $decMontMini7;
    protected $decMontMini8;
    protected $decMontMini9;
    protected $decMontMini10;
    protected $decMontMini11;

    protected $decMontMaxi;  // Monto Minimo del Valor Declarado (requerido para asegurar)
    protected $decMontMaxi2;
    protected $decMontMaxi3;
    protected $decMontMaxi4;
    protected $decMontMaxi5;
    protected $decMontMaxi6;
    protected $decMontMaxi7;
    protected $decMontMaxi8;
    protected $decMontMaxi9;
    protected $decMontMaxi10;
    protected $decMontMaxi11;

    protected $decPorcSegu;  // Porcentaje de seguro que se estara cobrando
    protected $decPorcSegu2;
    protected $decPorcSegu3;
    protected $decPorcSegu4;
    protected $decPorcSegu5;
    protected $decPorcSegu6;
    protected $decPorcSegu7;
    protected $decPorcSegu8;
    protected $decPorcSegu9;
    protected $decPorcSegu10;
    protected $decPorcSegu11;

    protected $decRutaMaxi;  // Limite de costo que permite salir a ruta sin haber cobrado la factura
    protected $decRutaMaxi2;
    protected $decRutaMaxi3;
    protected $decRutaMaxi4;
    protected $decRutaMaxi5;
    protected $decRutaMaxi6;
    protected $decRutaMaxi7;
    protected $decRutaMaxi8;
    protected $decRutaMaxi9;
    protected $decRutaMaxi10;
    protected $decRutaMaxi11;

    protected function SetupValores() {
        //------------------------------------------------------------------------
        // En la tabla parametro, se almacenan los valores relativos al seguro
        // de la Paquetería Masiva Nacional
        //------------------------------------------------------------------------
        $this->objSeguPmnx  = BuscarParametro('SeguPmnx','ValoSegu','TODO',null);
        $this->objSeguPmn1  = BuscarParametro('SeguPmns','ValoSegu1','TODO',null);
        $this->objSeguPmn2  = BuscarParametro('SeguPmns','ValoSegu2','TODO',null);
        $this->objSeguPmn3  = BuscarParametro('SeguPmns','ValoSegu3','TODO',null);
        $this->objSeguPmn4  = BuscarParametro('SeguPmns','ValoSegu4','TODO',null);
        $this->objSeguPmn5  = BuscarParametro('SeguPmns','ValoSegu5','TODO',null);
        $this->objSeguPmn6  = BuscarParametro('SeguPmns','ValoSegu6','TODO',null);
        $this->objSeguPmn7  = BuscarParametro('SeguPmns','ValoSegu7','TODO',null);
        $this->objSeguPmn8  = BuscarParametro('SeguPmns','ValoSegu8','TODO',null);
        $this->objSeguPmn9  = BuscarParametro('SeguPmns','ValoSegu9','TODO',null);
        $this->objSeguPmn10 = BuscarParametro('SeguPmns','ValoSegu10','TODO',null);
        $this->objSeguPmn11 = BuscarParametro('SeguPmns','ValoSegu11','TODO',null);

        if ($this->objSeguPmnx) {
            $this->intSeguSino = $this->objSeguPmnx->ParaVal1;
            $this->decRutaMaxi = $this->objSeguPmnx->ParaVal4;
        } else {
            $this->objSeguPmnx = new Parametro();
            $this->objSeguPmnx->IndiPara = 'SeguPmnx';
            $this->objSeguPmnx->CodiPara = 'ValoSegu';
            $this->objSeguPmnx->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmnx->ParaTxt1 = '.';
            $this->intSeguSino = SinoType::SI;
            $this->decRutaMaxi = 2000;
        }

        if ($this->objSeguPmn1) {
            $this->decMontMini = $this->objSeguPmn1->ParaVal1;
            $this->decMontMaxi = $this->objSeguPmn1->ParaVal2;
            $this->decPorcSegu = $this->objSeguPmn1->ParaVal3;
        } else {
            $this->objSeguPmn1 = new Parametro();
            $this->objSeguPmn1->IndiPara = 'SeguPmns';
            $this->objSeguPmn1->CodiPara = 'ValoSegu1';
            $this->objSeguPmn1->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn1->ParaTxt1 = '.';
            $this->decMontMini = 10000;
            $this->decMontMaxi = 50000;
            $this->decPorcSegu = 2;
        }

        if ($this->objSeguPmn2) {
            $this->decMontMini2 = $this->objSeguPmn2->ParaVal1;
            $this->decMontMaxi2 = $this->objSeguPmn2->ParaVal2;
            $this->decPorcSegu2 = $this->objSeguPmn2->ParaVal3;
        } else {
            $this->objSeguPmn2 = new Parametro();
            $this->objSeguPmn2->IndiPara = 'SeguPmns';
            $this->objSeguPmn2->CodiPara = 'ValoSegu2';
            $this->objSeguPmn2->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn2->ParaTxt1 = '.';
            $this->decMontMini2 = 50001;
            $this->decMontMaxi2 = 100000;
            $this->decPorcSegu2 = 2;
        }

        if ($this->objSeguPmn3) {
            $this->decMontMini3 = $this->objSeguPmn3->ParaVal1;
            $this->decMontMaxi3 = $this->objSeguPmn3->ParaVal2;
            $this->decPorcSegu3 = $this->objSeguPmn3->ParaVal3;
        } else {
            $this->objSeguPmn3 = new Parametro();
            $this->objSeguPmn3->IndiPara = 'SeguPmns';
            $this->objSeguPmn3->CodiPara = 'ValoSegu3';
            $this->objSeguPmn3->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn3->ParaTxt1 = '.';
            $this->decMontMini3 = 100001;
            $this->decMontMaxi3 = 200000;
            $this->decPorcSegu3 = 2;
        }

        if ($this->objSeguPmn4) {
            $this->decMontMini4 = $this->objSeguPmn4->ParaVal1;
            $this->decMontMaxi4 = $this->objSeguPmn4->ParaVal2;
            $this->decPorcSegu4 = $this->objSeguPmn4->ParaVal3;
        } else {
            $this->objSeguPmn4 = new Parametro();
            $this->objSeguPmn4->IndiPara = 'SeguPmns';
            $this->objSeguPmn4->CodiPara = 'ValoSegu4';
            $this->objSeguPmn4->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn4->ParaTxt1 = '.';
            $this->decMontMini4 = 200001;
            $this->decMontMaxi4 = 300000;
            $this->decPorcSegu4 = 3;
        }

        if ($this->objSeguPmn5) {
            $this->decMontMini5 = $this->objSeguPmn5->ParaVal1;
            $this->decMontMaxi5 = $this->objSeguPmn5->ParaVal2;
            $this->decPorcSegu5 = $this->objSeguPmn5->ParaVal3;
        } else {
            $this->objSeguPmn5 = new Parametro();
            $this->objSeguPmn5->IndiPara = 'SeguPmns';
            $this->objSeguPmn5->CodiPara = 'ValoSegu5';
            $this->objSeguPmn5->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn5->ParaTxt1 = '.';
            $this->decMontMini5 = 300001;
            $this->decMontMaxi5 = 400000;
            $this->decPorcSegu5 = 3;
        }

        if ($this->objSeguPmn6) {
            $this->decMontMini6 = $this->objSeguPmn6->ParaVal1;
            $this->decMontMaxi6 = $this->objSeguPmn6->ParaVal2;
            $this->decPorcSegu6 = $this->objSeguPmn6->ParaVal3;
        } else {
            $this->objSeguPmn6 = new Parametro();
            $this->objSeguPmn6->IndiPara = 'SeguPmns';
            $this->objSeguPmn6->CodiPara = 'ValoSegu6';
            $this->objSeguPmn6->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn6->ParaTxt1 = '.';
            $this->decMontMini6 = 400001;
            $this->decMontMaxi6 = 500000;
            $this->decPorcSegu6 = 3;
        }

        if ($this->objSeguPmn7) {
            $this->decMontMini7 = $this->objSeguPmn7->ParaVal1;
            $this->decMontMaxi7 = $this->objSeguPmn7->ParaVal2;
            $this->decPorcSegu7 = $this->objSeguPmn7->ParaVal3;
        } else {
            $this->objSeguPmn7 = new Parametro();
            $this->objSeguPmn7->IndiPara = 'SeguPmns';
            $this->objSeguPmn7->CodiPara = 'ValoSegu7';
            $this->objSeguPmn7->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn7->ParaTxt1 = '.';
            $this->decMontMini7 = 500001;
            $this->decMontMaxi7 = 600000;
            $this->decPorcSegu7 = 4;
        }

        if ($this->objSeguPmn8) {
            $this->decMontMini8 = $this->objSeguPmn8->ParaVal1;
            $this->decMontMaxi8 = $this->objSeguPmn8->ParaVal2;
            $this->decPorcSegu8 = $this->objSeguPmn8->ParaVal3;
        } else {
            $this->objSeguPmn8 = new Parametro();
            $this->objSeguPmn8->IndiPara = 'SeguPmns';
            $this->objSeguPmn8->CodiPara = 'ValoSegu8';
            $this->objSeguPmn8->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn8->ParaTxt1 = '.';
            $this->decMontMini8 = 600001;
            $this->decMontMaxi8 = 700000;
            $this->decPorcSegu8 = 4;
        }

        if ($this->objSeguPmn9) {
            $this->decMontMini9 = $this->objSeguPmn9->ParaVal1;
            $this->decMontMaxi9 = $this->objSeguPmn9->ParaVal2;
            $this->decPorcSegu9 = $this->objSeguPmn9->ParaVal3;
        } else {
            $this->objSeguPmn9 = new Parametro();
            $this->objSeguPmn9->IndiPara = 'SeguPmns';
            $this->objSeguPmn9->CodiPara = 'ValoSegu9';
            $this->objSeguPmn9->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn9->ParaTxt1 = '.';
            $this->decMontMini9 = 700001;
            $this->decMontMaxi9 = 800000;
            $this->decPorcSegu9 = 4;
        }

        if ($this->objSeguPmn10) {
            $this->decMontMini10 = $this->objSeguPmn10->ParaVal1;
            $this->decMontMaxi10 = $this->objSeguPmn10->ParaVal2;
            $this->decPorcSegu10 = $this->objSeguPmn10->ParaVal3;
        } else {
            $this->objSeguPmn10 = new Parametro();
            $this->objSeguPmn10->IndiPara = 'SeguPmns';
            $this->objSeguPmn10->CodiPara = 'ValoSegu10';
            $this->objSeguPmn10->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn10->ParaTxt1 = '.';
            $this->decMontMini10 = 800001;
            $this->decMontMaxi10 = 900000;
            $this->decPorcSegu10 = 4;
        }

        if ($this->objSeguPmn11) {
            $this->decMontMini11 = $this->objSeguPmn11->ParaVal1;
            $this->decMontMaxi11 = $this->objSeguPmn11->ParaVal2;
            $this->decPorcSegu11 = $this->objSeguPmn11->ParaVal3;
        } else {
            $this->objSeguPmn11 = new Parametro();
            $this->objSeguPmn11->IndiPara = 'SeguPmns';
            $this->objSeguPmn11->CodiPara = 'ValoSegu11';
            $this->objSeguPmn11->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn11->ParaTxt1 = '.';
            $this->decMontMini11 = 900001;
            $this->decMontMaxi11 = 1000000;
            $this->decPorcSegu11 = 4;
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Configurar Seguro';

        $this->SetupValores();

        $this->chkSeguSino_Create();

        $this->txtMontMini_Create();
        $this->txtMontMini2_Create();
        $this->txtMontMini3_Create();
        $this->txtMontMini4_Create();
        $this->txtMontMini5_Create();
        $this->txtMontMini6_Create();
        $this->txtMontMini7_Create();
        $this->txtMontMini8_Create();
        $this->txtMontMini9_Create();
        $this->txtMontMini10_Create();
        $this->txtMontMini11_Create();

        $this->txtMontMaxi_Create();
        $this->txtMontMaxi2_Create();
        $this->txtMontMaxi3_Create();
        $this->txtMontMaxi4_Create();
        $this->txtMontMaxi5_Create();
        $this->txtMontMaxi6_Create();
        $this->txtMontMaxi7_Create();
        $this->txtMontMaxi8_Create();
        $this->txtMontMaxi9_Create();
        $this->txtMontMaxi10_Create();
        $this->txtMontMaxi11_Create();

        $this->txtPorcSegu_Create();
        $this->txtPorcSegu2_Create();
        $this->txtPorcSegu3_Create();
        $this->txtPorcSegu4_Create();
        $this->txtPorcSegu5_Create();
        $this->txtPorcSegu6_Create();
        $this->txtPorcSegu7_Create();
        $this->txtPorcSegu8_Create();
        $this->txtPorcSegu9_Create();
        $this->txtPorcSegu10_Create();
        $this->txtPorcSegu11_Create();

        $this->txtRutaMaxi_Create();

    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function chkSeguSino_Create() {
        $this->chkSeguSino = new QCheckBox($this);
        $this->chkSeguSino->Name = QApplication::Translate('Se Ofrece Seguro ?');
        $this->chkSeguSino->Checked = $this->intSeguSino;
        $this->chkSeguSino->AddAction(new QChangeEvent(), new QAjaxAction('chkSeguSino_Change'));
    }

    protected function txtMontMini_Create() {
        $this->txtMontMini = new QFloatTextBox($this);
        $this->txtMontMini->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini->Width = 80;
        $this->txtMontMini->Text = $this->decMontMini;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini->Enabled = false;
            $this->txtMontMini->ForeColor = "blue";
        }
    }

    protected function txtMontMini2_Create() {
        $this->txtMontMini2 = new QFloatTextBox($this);
        $this->txtMontMini2->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini2->Width = 80;
        $this->txtMontMini2->Text = $this->decMontMini2;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini2->Enabled = false;
            $this->txtMontMini2->ForeColor = "blue";
        }
    }

    protected function txtMontMini3_Create() {
        $this->txtMontMini3 = new QFloatTextBox($this);
        $this->txtMontMini3->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini3->Width = 80;
        $this->txtMontMini3->Text = $this->decMontMini3;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini3->Enabled = false;
            $this->txtMontMini3->ForeColor = "blue";
        }
    }

    protected function txtMontMini4_Create() {
        $this->txtMontMini4 = new QFloatTextBox($this);
        $this->txtMontMini4->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini4->Width = 80;
        $this->txtMontMini4->Text = $this->decMontMini4;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini4->Enabled = false;
            $this->txtMontMini4->ForeColor = "blue";
        }
    }

    protected function txtMontMini5_Create() {
        $this->txtMontMini5 = new QFloatTextBox($this);
        $this->txtMontMini5->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini5->Width = 80;
        $this->txtMontMini5->Text = $this->decMontMini5;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini5->Enabled = false;
            $this->txtMontMini5->ForeColor = "blue";
        }
    }

    protected function txtMontMini6_Create() {
        $this->txtMontMini6 = new QFloatTextBox($this);
        $this->txtMontMini6->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini6->Width = 80;
        $this->txtMontMini6->Text = $this->decMontMini6;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini6->Enabled = false;
            $this->txtMontMini6->ForeColor = "blue";
        }
    }

    protected function txtMontMini7_Create() {
        $this->txtMontMini7 = new QFloatTextBox($this);
        $this->txtMontMini7->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini7->Width = 80;
        $this->txtMontMini7->Text = $this->decMontMini7;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini7->Enabled = false;
            $this->txtMontMini7->ForeColor = "blue";
        }
    }

    protected function txtMontMini8_Create() {
        $this->txtMontMini8 = new QFloatTextBox($this);
        $this->txtMontMini8->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini8->Width = 80;
        $this->txtMontMini8->Text = $this->decMontMini8;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini8->Enabled = false;
            $this->txtMontMini8->ForeColor = "blue";
        }
    }

    protected function txtMontMini9_Create() {
        $this->txtMontMini9 = new QFloatTextBox($this);
        $this->txtMontMini9->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini9->Width = 80;
        $this->txtMontMini9->Text = $this->decMontMini9;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini9->Enabled = false;
            $this->txtMontMini9->ForeColor = "blue";
        }
    }

    protected function txtMontMini10_Create() {
        $this->txtMontMini10 = new QFloatTextBox($this);
        $this->txtMontMini10->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini10->Width = 80;
        $this->txtMontMini10->Text = $this->decMontMini10;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini10->Enabled = false;
            $this->txtMontMini10->ForeColor = "blue";
        }
    }

    protected function txtMontMini11_Create() {
        $this->txtMontMini11 = new QFloatTextBox($this);
        $this->txtMontMini11->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini11->Width = 80;
        $this->txtMontMini11->Text = $this->decMontMini11;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini11->Enabled = false;
            $this->txtMontMini11->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi_Create() {
        $this->txtMontMaxi = new QFloatTextBox($this);
        $this->txtMontMaxi->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi->Width = 80;
        $this->txtMontMaxi->Text = $this->decMontMaxi;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi->Enabled = false;
            $this->txtMontMaxi->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi2_Create() {
        $this->txtMontMaxi2 = new QFloatTextBox($this);
        $this->txtMontMaxi2->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi2->Width = 80;
        $this->txtMontMaxi2->Text = $this->decMontMaxi2;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi2->Enabled = false;
            $this->txtMontMaxi2->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi3_Create() {
        $this->txtMontMaxi3 = new QFloatTextBox($this);
        $this->txtMontMaxi3->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi3->Width = 80;
        $this->txtMontMaxi3->Text = $this->decMontMaxi3;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi3->Enabled = false;
            $this->txtMontMaxi3->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi4_Create() {
        $this->txtMontMaxi4 = new QFloatTextBox($this);
        $this->txtMontMaxi4->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi4->Width = 80;
        $this->txtMontMaxi4->Text = $this->decMontMaxi4;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi4->Enabled = false;
            $this->txtMontMaxi4->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi5_Create() {
        $this->txtMontMaxi5 = new QFloatTextBox($this);
        $this->txtMontMaxi5->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi5->Width = 80;
        $this->txtMontMaxi5->Text = $this->decMontMaxi5;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi5->Enabled = false;
            $this->txtMontMaxi5->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi6_Create() {
        $this->txtMontMaxi6 = new QFloatTextBox($this);
        $this->txtMontMaxi6->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi6->Width = 80;
        $this->txtMontMaxi6->Text = $this->decMontMaxi6;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi6->Enabled = false;
            $this->txtMontMaxi6->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi7_Create() {
        $this->txtMontMaxi7 = new QFloatTextBox($this);
        $this->txtMontMaxi7->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi7->Width = 80;
        $this->txtMontMaxi7->Text = $this->decMontMaxi7;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi7->Enabled = false;
            $this->txtMontMaxi7->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi8_Create() {
        $this->txtMontMaxi8 = new QFloatTextBox($this);
        $this->txtMontMaxi8->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi8->Width = 80;
        $this->txtMontMaxi8->Text = $this->decMontMaxi8;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi8->Enabled = false;
            $this->txtMontMaxi8->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi9_Create() {
        $this->txtMontMaxi9 = new QFloatTextBox($this);
        $this->txtMontMaxi9->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi9->Width = 80;
        $this->txtMontMaxi9->Text = $this->decMontMaxi9;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi9->Enabled = false;
            $this->txtMontMaxi9->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi10_Create() {
        $this->txtMontMaxi10 = new QFloatTextBox($this);
        $this->txtMontMaxi10->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi10->Width = 80;
        $this->txtMontMaxi10->Text = $this->decMontMaxi10;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi10->Enabled = false;
            $this->txtMontMaxi10->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi11_Create() {
        $this->txtMontMaxi11 = new QFloatTextBox($this);
        $this->txtMontMaxi11->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi11->Width = 80;
        $this->txtMontMaxi11->Text = $this->decMontMaxi11;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi11->Enabled = false;
            $this->txtMontMaxi11->ForeColor = "blue";

        }
    }

    protected function txtPorcSegu_Create() {
        $this->txtPorcSegu = new QFloatTextBox($this);
        $this->txtPorcSegu->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu->Width = 50;
        $this->txtPorcSegu->Text = $this->decPorcSegu;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu->Enabled = false;
            $this->txtPorcSegu->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu2_Create() {
        $this->txtPorcSegu2 = new QFloatTextBox($this);
        $this->txtPorcSegu2->Name = QApplication::Translate('% de Seguro');
        $this->txtPorcSegu2->Width = 50;
        $this->txtPorcSegu2->Text = $this->decPorcSegu2;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu2->Enabled = false;
            $this->txtPorcSegu2->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu3_Create() {
        $this->txtPorcSegu3 = new QFloatTextBox($this);
        $this->txtPorcSegu3->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu3->Width = 50;
        $this->txtPorcSegu3->Text = $this->decPorcSegu3;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu3->Enabled = false;
            $this->txtPorcSegu3->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu4_Create() {
        $this->txtPorcSegu4 = new QFloatTextBox($this);
        $this->txtPorcSegu4->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu4->Width = 50;
        $this->txtPorcSegu4->Text = $this->decPorcSegu4;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu4->Enabled = false;
            $this->txtPorcSegu4->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu5_Create() {
        $this->txtPorcSegu5 = new QFloatTextBox($this);
        $this->txtPorcSegu5->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu5->Width = 50;
        $this->txtPorcSegu5->Text = $this->decPorcSegu5;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu5->Enabled = false;
            $this->txtPorcSegu5->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu6_Create() {
        $this->txtPorcSegu6 = new QFloatTextBox($this);
        $this->txtPorcSegu6->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu6->Width = 50;
        $this->txtPorcSegu6->Text = $this->decPorcSegu6;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu6->Enabled = false;
            $this->txtPorcSegu6->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu7_Create() {
        $this->txtPorcSegu7 = new QFloatTextBox($this);
        $this->txtPorcSegu7->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu7->Width = 50;
        $this->txtPorcSegu7->Text = $this->decPorcSegu7;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu7->Enabled = false;
            $this->txtPorcSegu7->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu8_Create() {
        $this->txtPorcSegu8 = new QFloatTextBox($this);
        $this->txtPorcSegu8->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu8->Width = 50;
        $this->txtPorcSegu8->Text = $this->decPorcSegu8;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu8->Enabled = false;
            $this->txtPorcSegu8->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu9_Create() {
        $this->txtPorcSegu9 = new QFloatTextBox($this);
        $this->txtPorcSegu9->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu9->Width = 50;
        $this->txtPorcSegu9->Text = $this->decPorcSegu9;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu9->Enabled = false;
            $this->txtPorcSegu9->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu10_Create() {
        $this->txtPorcSegu10 = new QFloatTextBox($this);
        $this->txtPorcSegu10->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu10->Width = 50;
        $this->txtPorcSegu10->Text = $this->decPorcSegu10;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu10->Enabled = false;
            $this->txtPorcSegu10->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu11_Create() {
        $this->txtPorcSegu11 = new QFloatTextBox($this);
        $this->txtPorcSegu11->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu11->Width = 50;
        $this->txtPorcSegu11->Text = $this->decPorcSegu11;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu11->Enabled = false;
            $this->txtPorcSegu11->ForeColor = "blue";
        }
    }

    protected function txtRutaMaxi_Create() {
        $this->txtRutaMaxi = new QFloatTextBox($this);
        $this->txtRutaMaxi->Name = QApplication::Translate('Limite Maximo para Salir a Ruta');
        $this->txtRutaMaxi->Width = 80;
        $this->txtRutaMaxi->Text = $this->decRutaMaxi;
        $this->txtRutaMaxi->ToolTip  = 'Toda factura que sea menor a este monto, puede salir a ruta sin ';
        $this->txtRutaMaxi->ToolTip .= 'haber sido registrado el pago de la misma';
        if (!$this->chkSeguSino->Checked) {
            $this->txtRutaMaxi->Enabled = false;
            $this->txtRutaMaxi->ForeColor = "blue";
        }
    }


    protected function Form_Validate() {
        $blnTodoOkey = true;
        return $blnTodoOkey;
    }

    //----------------------------------------
    // Acciones relacionadas a los objetos
    //----------------------------------------

    protected function chkSeguSino_Change() {
        if ($this->chkSeguSino->Checked) {
            $this->txtMontMini->Enabled = true;
            $this->txtMontMini2->Enabled = true;
            $this->txtMontMini3->Enabled = true;
            $this->txtMontMini4->Enabled = true;
            $this->txtMontMini5->Enabled = true;
            $this->txtMontMini6->Enabled = true;
            $this->txtMontMini7->Enabled = true;
            $this->txtMontMini8->Enabled = true;
            $this->txtMontMini9->Enabled = true;
            $this->txtMontMini10->Enabled = true;
            $this->txtMontMini11->Enabled = true;

            $this->txtMontMaxi->Enabled = true;
            $this->txtMontMaxi2->Enabled = true;
            $this->txtMontMaxi3->Enabled = true;
            $this->txtMontMaxi4->Enabled = true;
            $this->txtMontMaxi5->Enabled = true;
            $this->txtMontMaxi6->Enabled = true;
            $this->txtMontMaxi7->Enabled = true;
            $this->txtMontMaxi8->Enabled = true;
            $this->txtMontMaxi9->Enabled = true;
            $this->txtMontMaxi10->Enabled = true;
            $this->txtMontMaxi11->Enabled = true;

            $this->txtPorcSegu->Enabled = true;
            $this->txtPorcSegu2->Enabled = true;
            $this->txtPorcSegu3->Enabled = true;
            $this->txtPorcSegu4->Enabled = true;
            $this->txtPorcSegu5->Enabled = true;
            $this->txtPorcSegu6->Enabled = true;
            $this->txtPorcSegu7->Enabled = true;
            $this->txtPorcSegu8->Enabled = true;
            $this->txtPorcSegu9->Enabled = true;
            $this->txtPorcSegu10->Enabled = true;
            $this->txtPorcSegu11->Enabled = true;

            $this->txtRutaMaxi->Enabled = true;
        } else {
            $this->txtMontMini->Enabled    = false;
            $this->txtMontMini2->Enabled   = false;
            $this->txtMontMini3->Enabled   = false;
            $this->txtMontMini4->Enabled   = false;
            $this->txtMontMini5->Enabled   = false;
            $this->txtMontMini6->Enabled   = false;
            $this->txtMontMini7->Enabled   = false;
            $this->txtMontMini8->Enabled   = false;
            $this->txtMontMini9->Enabled   = false;
            $this->txtMontMini10->Enabled   = false;
            $this->txtMontMini11->Enabled   = false;
            $this->txtMontMini->ForeColor  = "blue";
            $this->txtMontMini2->ForeColor = "blue";
            $this->txtMontMini3->ForeColor = "blue";
            $this->txtMontMini4->ForeColor = "blue";
            $this->txtMontMini5->ForeColor = "blue";
            $this->txtMontMini6->ForeColor = "blue";
            $this->txtMontMini7->ForeColor = "blue";
            $this->txtMontMini8->ForeColor = "blue";
            $this->txtMontMini9->ForeColor = "blue";
            $this->txtMontMini10->ForeColor = "blue";
            $this->txtMontMini11->ForeColor = "blue";

            $this->txtMontMaxi->Enabled    = false;
            $this->txtMontMaxi2->Enabled   = false;
            $this->txtMontMaxi3->Enabled   = false;
            $this->txtMontMaxi4->Enabled   = false;
            $this->txtMontMaxi5->Enabled   = false;
            $this->txtMontMaxi6->Enabled   = false;
            $this->txtMontMaxi7->Enabled   = false;
            $this->txtMontMaxi8->Enabled   = false;
            $this->txtMontMaxi9->Enabled   = false;
            $this->txtMontMaxi10->Enabled   = false;
            $this->txtMontMaxi11->Enabled   = false;
            $this->txtMontMaxi->ForeColor  = "blue";
            $this->txtMontMaxi2->ForeColor = "blue";
            $this->txtMontMaxi3->ForeColor = "blue";
            $this->txtMontMaxi4->ForeColor = "blue";
            $this->txtMontMaxi5->ForeColor = "blue";
            $this->txtMontMaxi6->ForeColor = "blue";
            $this->txtMontMaxi7->ForeColor = "blue";
            $this->txtMontMaxi8->ForeColor = "blue";
            $this->txtMontMaxi9->ForeColor = "blue";
            $this->txtMontMaxi10->ForeColor = "blue";
            $this->txtMontMaxi11->ForeColor = "blue";

            $this->txtPorcSegu->Enabled    = false;
            $this->txtPorcSegu2->Enabled   = false;
            $this->txtPorcSegu3->Enabled   = false;
            $this->txtPorcSegu4->Enabled   = false;
            $this->txtPorcSegu5->Enabled   = false;
            $this->txtPorcSegu6->Enabled   = false;
            $this->txtPorcSegu7->Enabled   = false;
            $this->txtPorcSegu8->Enabled   = false;
            $this->txtPorcSegu9->Enabled   = false;
            $this->txtPorcSegu10->Enabled   = false;
            $this->txtPorcSegu11->Enabled   = false;
            $this->txtPorcSegu->ForeColor  = "blue";
            $this->txtPorcSegu2->ForeColor = "blue";
            $this->txtPorcSegu3->ForeColor = "blue";
            $this->txtPorcSegu4->ForeColor = "blue";
            $this->txtPorcSegu5->ForeColor = "blue";
            $this->txtPorcSegu6->ForeColor = "blue";
            $this->txtPorcSegu7->ForeColor = "blue";
            $this->txtPorcSegu8->ForeColor = "blue";
            $this->txtPorcSegu9->ForeColor = "blue";
            $this->txtPorcSegu10->ForeColor = "blue";
            $this->txtPorcSegu11->ForeColor = "blue";

            $this->txtRutaMaxi->Enabled    = false;
            $this->txtRutaMaxi->ForeColor  = "blue";
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->objSeguPmnx->ParaVal1 = intval($this->chkSeguSino->Checked);
        $this->objSeguPmnx->ParaVal4 = $this->txtRutaMaxi->Text;
        $this->objSeguPmnx->Save();

        $this->objSeguPmn1->ParaVal1 = $this->txtMontMini->Text;
        $this->objSeguPmn1->ParaVal2 = $this->txtMontMaxi->Text;
        $this->objSeguPmn1->ParaVal3 = $this->txtPorcSegu->Text;
        $this->objSeguPmn1->Save();

        $this->objSeguPmn2->ParaVal1 = $this->txtMontMini2->Text;
        $this->objSeguPmn2->ParaVal2 = $this->txtMontMaxi2->Text;
        $this->objSeguPmn2->ParaVal3 = $this->txtPorcSegu2->Text;
        $this->objSeguPmn2->Save();

        $this->objSeguPmn3->ParaVal1 = $this->txtMontMini3->Text;
        $this->objSeguPmn3->ParaVal2 = $this->txtMontMaxi3->Text;
        $this->objSeguPmn3->ParaVal3 = $this->txtPorcSegu3->Text;
        $this->objSeguPmn3->Save();

        $this->objSeguPmn4->ParaVal1 = $this->txtMontMini4->Text;
        $this->objSeguPmn4->ParaVal2 = $this->txtMontMaxi4->Text;
        $this->objSeguPmn4->ParaVal3 = $this->txtPorcSegu4->Text;
        $this->objSeguPmn4->Save();

        $this->objSeguPmn5->ParaVal1 = $this->txtMontMini5->Text;
        $this->objSeguPmn5->ParaVal2 = $this->txtMontMaxi5->Text;
        $this->objSeguPmn5->ParaVal3 = $this->txtPorcSegu5->Text;
        $this->objSeguPmn5->Save();

        $this->objSeguPmn6->ParaVal1 = $this->txtMontMini6->Text;
        $this->objSeguPmn6->ParaVal2 = $this->txtMontMaxi6->Text;
        $this->objSeguPmn6->ParaVal3 = $this->txtPorcSegu6->Text;
        $this->objSeguPmn6->Save();

        $this->objSeguPmn7->ParaVal1 = $this->txtMontMini7->Text;
        $this->objSeguPmn7->ParaVal2 = $this->txtMontMaxi7->Text;
        $this->objSeguPmn7->ParaVal3 = $this->txtPorcSegu7->Text;
        $this->objSeguPmn7->Save();

        $this->objSeguPmn8->ParaVal1 = $this->txtMontMini8->Text;
        $this->objSeguPmn8->ParaVal2 = $this->txtMontMaxi8->Text;
        $this->objSeguPmn8->ParaVal3 = $this->txtPorcSegu8->Text;
        $this->objSeguPmn8->Save();

        $this->objSeguPmn9->ParaVal1 = $this->txtMontMini9->Text;
        $this->objSeguPmn9->ParaVal2 = $this->txtMontMaxi9->Text;
        $this->objSeguPmn9->ParaVal3 = $this->txtPorcSegu9->Text;
        $this->objSeguPmn9->Save();

        $this->objSeguPmn10->ParaVal1 = $this->txtMontMini10->Text;
        $this->objSeguPmn10->ParaVal2 = $this->txtMontMaxi10->Text;
        $this->objSeguPmn10->ParaVal3 = $this->txtPorcSegu10->Text;
        $this->objSeguPmn10->Save();

        $this->objSeguPmn11->ParaVal1 = $this->txtMontMini11->Text;
        $this->objSeguPmn11->ParaVal2 = $this->txtMontMaxi11->Text;
        $this->objSeguPmn11->ParaVal3 = $this->txtPorcSegu11->Text;
        $this->objSeguPmn11->Save();
        //-----------------------------------------------------------------------------
        // Se actualizan tambien las variables de sesion que contienen estos valores
        //-----------------------------------------------------------------------------
        $this->arrValoMini[0] = $this->txtMontMini->Text;
        $this->arrValoMini[1] = $this->txtMontMini2->Text;
        $this->arrValoMini[2] = $this->txtMontMini3->Text;
        $this->arrValoMini[3] = $this->txtMontMini4->Text;
        $this->arrValoMini[4] = $this->txtMontMini5->Text;
        $this->arrValoMini[5] = $this->txtMontMini6->Text;
        $this->arrValoMini[6] = $this->txtMontMini7->Text;
        $this->arrValoMini[7] = $this->txtMontMini8->Text;
        $this->arrValoMini[8] = $this->txtMontMini9->Text;
        $this->arrValoMini[9] = $this->txtMontMini10->Text;
        $this->arrValoMini[10] = $this->txtMontMini11->Text;

        $this->arrValoMaxi[0] = $this->txtMontMaxi->Text;
        $this->arrValoMaxi[1] = $this->txtMontMaxi2->Text;
        $this->arrValoMaxi[2] = $this->txtMontMaxi3->Text;
        $this->arrValoMaxi[3] = $this->txtMontMaxi4->Text;
        $this->arrValoMaxi[4] = $this->txtMontMaxi5->Text;
        $this->arrValoMaxi[5] = $this->txtMontMaxi6->Text;
        $this->arrValoMaxi[6] = $this->txtMontMaxi7->Text;
        $this->arrValoMaxi[7] = $this->txtMontMaxi8->Text;
        $this->arrValoMaxi[8] = $this->txtMontMaxi9->Text;
        $this->arrValoMaxi[9] = $this->txtMontMaxi10->Text;
        $this->arrValoMaxi[10] = $this->txtMontMaxi11->Text;

        $this->arrPorcSegu[0] = $this->txtPorcSegu->Text;
        $this->arrPorcSegu[1] = $this->txtPorcSegu2->Text;
        $this->arrPorcSegu[2] = $this->txtPorcSegu3->Text;
        $this->arrPorcSegu[3] = $this->txtPorcSegu4->Text;
        $this->arrPorcSegu[4] = $this->txtPorcSegu5->Text;
        $this->arrPorcSegu[5] = $this->txtPorcSegu6->Text;
        $this->arrPorcSegu[6] = $this->txtPorcSegu7->Text;
        $this->arrPorcSegu[7] = $this->txtPorcSegu8->Text;
        $this->arrPorcSegu[8] = $this->txtPorcSegu9->Text;
        $this->arrPorcSegu[9] = $this->txtPorcSegu10->Text;
        $this->arrPorcSegu[10] = $this->txtPorcSegu11->Text;

        $_SESSION['SeguSino'] = serialize($this->chkSeguSino->Checked);
        $_SESSION['RutaMaxi'] = serialize($this->txtRutaMaxi->Text);
        $_SESSION['ValoMin1'] = serialize($this->arrValoMini);
        $_SESSION['ValoMax1'] = serialize($this->arrValoMaxi);
        $_SESSION['PorcSeg1'] = serialize($this->arrPorcSegu);

        $this->mensaje('Transaccion Exitosa !','','','',__iCHEC__);
    }

}

ConfigurarSeguro::Run('ConfigurarSeguro');
?>
