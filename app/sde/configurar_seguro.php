<?php
//-----------------------------------------------------------------------------
// Programa      : configurar_seguro.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 24/04/2018
// Descripcion   : Este programa permite configurar los parametros de seguro
//                 del SisCO
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ConfigurarSeguro extends FormularioBaseKaizen {
    protected $intAnchCamp;
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
    protected $objSeguPmn12;
    protected $objSeguPmn13;
    protected $objSeguPmn14;
    protected $objSeguPmn15;
    protected $objSeguPmn16;

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
    protected $txtMontMini12;
    protected $txtMontMini13;
    protected $txtMontMini14;
    protected $txtMontMini15;
    protected $txtMontMini16;

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
    protected $txtMontMaxi12;
    protected $txtMontMaxi13;
    protected $txtMontMaxi14;
    protected $txtMontMaxi15;
    protected $txtMontMaxi16;

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
    protected $txtPorcSegu12;
    protected $txtPorcSegu13;
    protected $txtPorcSegu14;
    protected $txtPorcSegu15;
    protected $txtPorcSegu16;

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
    protected $decMontMini12;
    protected $decMontMini13;
    protected $decMontMini14;
    protected $decMontMini15;
    protected $decMontMini16;

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
    protected $decMontMaxi12;
    protected $decMontMaxi13;
    protected $decMontMaxi14;
    protected $decMontMaxi15;
    protected $decMontMaxi16;

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
    protected $decPorcSegu12;
    protected $decPorcSegu13;
    protected $decPorcSegu14;
    protected $decPorcSegu15;
    protected $decPorcSegu16;

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
    protected $decRutaMaxi12;
    protected $decRutaMaxi13;
    protected $decRutaMaxi14;
    protected $decRutaMaxi15;
    protected $decRutaMaxi16;

    protected function SetupValores() {
        //------------------------------------------------------------------------
        // En la tabla parametro, se almacenan los valores relativos al seguro
        // de la Paquetería Masiva Nacional
        //------------------------------------------------------------------------
        $this->objSeguPmnx  = BuscarParametro('SeguYama','ValoSegu','TODO',null);
        $this->objSeguPmn1  = BuscarParametro('SeguYama','ValoSegu1','TODO',null);
        $this->objSeguPmn2  = BuscarParametro('SeguYama','ValoSegu2','TODO',null);
        $this->objSeguPmn3  = BuscarParametro('SeguYama','ValoSegu3','TODO',null);
        $this->objSeguPmn4  = BuscarParametro('SeguYama','ValoSegu4','TODO',null);
        $this->objSeguPmn5  = BuscarParametro('SeguYama','ValoSegu5','TODO',null);
        $this->objSeguPmn6  = BuscarParametro('SeguYama','ValoSegu6','TODO',null);
        $this->objSeguPmn7  = BuscarParametro('SeguYama','ValoSegu7','TODO',null);
        $this->objSeguPmn8  = BuscarParametro('SeguYama','ValoSegu8','TODO',null);
        $this->objSeguPmn9  = BuscarParametro('SeguYama','ValoSegu9','TODO',null);
        $this->objSeguPmn10 = BuscarParametro('SeguYama','ValoSegu10','TODO',null);
        $this->objSeguPmn11 = BuscarParametro('SeguYama','ValoSegu11','TODO',null);
        $this->objSeguPmn12 = BuscarParametro('SeguYama','ValoSegu12','TODO',null);
        $this->objSeguPmn13 = BuscarParametro('SeguYama','ValoSegu13','TODO',null);
        $this->objSeguPmn14 = BuscarParametro('SeguYama','ValoSegu14','TODO',null);
        $this->objSeguPmn15 = BuscarParametro('SeguYama','ValoSegu15','TODO',null);
        $this->objSeguPmn16 = BuscarParametro('SeguYama','ValoSegu16','TODO',null);

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
            $this->objSeguPmn1->IndiPara = 'SeguYama';
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
            $this->objSeguPmn2->IndiPara = 'SeguYama';
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
            $this->objSeguPmn3->IndiPara = 'SeguYama';
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
            $this->objSeguPmn4->IndiPara = 'SeguYama';
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
            $this->objSeguPmn5->IndiPara = 'SeguYama';
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
            $this->objSeguPmn6->IndiPara = 'SeguYama';
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
            $this->objSeguPmn7->IndiPara = 'SeguYama';
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
            $this->objSeguPmn8->IndiPara = 'SeguYama';
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
            $this->objSeguPmn9->IndiPara = 'SeguYama';
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
            $this->objSeguPmn10->IndiPara = 'SeguYama';
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
            $this->objSeguPmn11->IndiPara = 'SeguYama';
            $this->objSeguPmn11->CodiPara = 'ValoSegu11';
            $this->objSeguPmn11->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn11->ParaTxt1 = '.';
            $this->decMontMini11 = 900001;
            $this->decMontMaxi11 = 1000000;
            $this->decPorcSegu11 = 4;
        }

        if ($this->objSeguPmn12) {
            $this->decMontMini12 = $this->objSeguPmn12->ParaVal1;
            $this->decMontMaxi12 = $this->objSeguPmn12->ParaVal2;
            $this->decPorcSegu12 = $this->objSeguPmn12->ParaVal3;
        } else {
            $this->objSeguPmn12 = new Parametro();
            $this->objSeguPmn12->IndiPara = 'SeguYama';
            $this->objSeguPmn12->CodiPara = 'ValoSegu12';
            $this->objSeguPmn12->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn12->ParaTxt1 = '.';
            $this->decMontMini12 = 900001;
            $this->decMontMaxi12 = 1000000;
            $this->decPorcSegu12 = 4;
        }

        if ($this->objSeguPmn13) {
            $this->decMontMini13 = $this->objSeguPmn13->ParaVal1;
            $this->decMontMaxi13 = $this->objSeguPmn13->ParaVal2;
            $this->decPorcSegu13 = $this->objSeguPmn13->ParaVal3;
        } else {
            $this->objSeguPmn13 = new Parametro();
            $this->objSeguPmn13->IndiPara = 'SeguYama';
            $this->objSeguPmn13->CodiPara = 'ValoSegu13';
            $this->objSeguPmn13->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn13->ParaTxt1 = '.';
            $this->decMontMini13 = 900001;
            $this->decMontMaxi13 = 1000000;
            $this->decPorcSegu13 = 4;
        }

        if ($this->objSeguPmn14) {
            $this->decMontMini14 = $this->objSeguPmn14->ParaVal1;
            $this->decMontMaxi14 = $this->objSeguPmn14->ParaVal2;
            $this->decPorcSegu14 = $this->objSeguPmn14->ParaVal3;
        } else {
            $this->objSeguPmn14 = new Parametro();
            $this->objSeguPmn14->IndiPara = 'SeguYama';
            $this->objSeguPmn14->CodiPara = 'ValoSegu14';
            $this->objSeguPmn14->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn14->ParaTxt1 = '.';
            $this->decMontMini14 = 900001;
            $this->decMontMaxi14 = 1000000;
            $this->decPorcSegu14 = 4;
        }

        if ($this->objSeguPmn15) {
            $this->decMontMini15 = $this->objSeguPmn15->ParaVal1;
            $this->decMontMaxi15 = $this->objSeguPmn15->ParaVal2;
            $this->decPorcSegu15 = $this->objSeguPmn15->ParaVal3;
        } else {
            $this->objSeguPmn15 = new Parametro();
            $this->objSeguPmn15->IndiPara = 'SeguYama';
            $this->objSeguPmn15->CodiPara = 'ValoSegu15';
            $this->objSeguPmn15->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn15->ParaTxt1 = '.';
            $this->decMontMini15 = 900001;
            $this->decMontMaxi15 = 1000000;
            $this->decPorcSegu15 = 4;
        }

        if ($this->objSeguPmn16) {
            $this->decMontMini16 = $this->objSeguPmn16->ParaVal1;
            $this->decMontMaxi16 = $this->objSeguPmn16->ParaVal2;
            $this->decPorcSegu16 = $this->objSeguPmn16->ParaVal3;
        } else {
            $this->objSeguPmn16 = new Parametro();
            $this->objSeguPmn16->IndiPara = 'SeguYama';
            $this->objSeguPmn16->CodiPara = 'ValoSegu16';
            $this->objSeguPmn16->DescPara = 'Parametros del seguro en la Paq. Mas. Nac.';
            $this->objSeguPmn16->ParaTxt1 = '.';
            $this->decMontMini16 = 900001;
            $this->decMontMaxi16 = 1000000;
            $this->decPorcSegu16 = 4;
        }
        
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Configurar Seguro';

        $this->intAnchCamp = 100;

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
        $this->txtMontMini12_Create();
        $this->txtMontMini13_Create();
        $this->txtMontMini14_Create();
        $this->txtMontMini15_Create();
        $this->txtMontMini16_Create();

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
        $this->txtMontMaxi12_Create();
        $this->txtMontMaxi13_Create();
        $this->txtMontMaxi14_Create();
        $this->txtMontMaxi15_Create();
        $this->txtMontMaxi16_Create();

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
        $this->txtPorcSegu12_Create();
        $this->txtPorcSegu13_Create();
        $this->txtPorcSegu14_Create();
        $this->txtPorcSegu15_Create();
        $this->txtPorcSegu16_Create();

    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function chkSeguSino_Create() {
        $this->chkSeguSino = new QCheckBox($this);
        $this->chkSeguSino->Name = QApplication::Translate('Se Ofrece Seguro ?');
        $this->chkSeguSino->Checked = true;
        $this->chkSeguSino->AddAction(new QChangeEvent(), new QAjaxAction('chkSeguSino_Change'));
    }

    protected function txtMontMini_Create() {
        $this->txtMontMini = new QFloatTextBox($this);
        $this->txtMontMini->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini->Width = $this->intAnchCamp;
        $this->txtMontMini->Text = $this->decMontMini;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini->Enabled = false;
            $this->txtMontMini->ForeColor = "blue";
        }
    }

    protected function txtMontMini2_Create() {
        $this->txtMontMini2 = new QFloatTextBox($this);
        $this->txtMontMini2->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini2->Width = $this->intAnchCamp;
        $this->txtMontMini2->Text = $this->decMontMini2;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini2->Enabled = false;
            $this->txtMontMini2->ForeColor = "blue";
        }
    }

    protected function txtMontMini3_Create() {
        $this->txtMontMini3 = new QFloatTextBox($this);
        $this->txtMontMini3->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini3->Width = $this->intAnchCamp;
        $this->txtMontMini3->Text = $this->decMontMini3;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini3->Enabled = false;
            $this->txtMontMini3->ForeColor = "blue";
        }
    }

    protected function txtMontMini4_Create() {
        $this->txtMontMini4 = new QFloatTextBox($this);
        $this->txtMontMini4->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini4->Width = $this->intAnchCamp;
        $this->txtMontMini4->Text = $this->decMontMini4;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini4->Enabled = false;
            $this->txtMontMini4->ForeColor = "blue";
        }
    }

    protected function txtMontMini5_Create() {
        $this->txtMontMini5 = new QFloatTextBox($this);
        $this->txtMontMini5->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini5->Width = $this->intAnchCamp;
        $this->txtMontMini5->Text = $this->decMontMini5;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini5->Enabled = false;
            $this->txtMontMini5->ForeColor = "blue";
        }
    }

    protected function txtMontMini6_Create() {
        $this->txtMontMini6 = new QFloatTextBox($this);
        $this->txtMontMini6->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini6->Width = $this->intAnchCamp;
        $this->txtMontMini6->Text = $this->decMontMini6;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini6->Enabled = false;
            $this->txtMontMini6->ForeColor = "blue";
        }
    }

    protected function txtMontMini7_Create() {
        $this->txtMontMini7 = new QFloatTextBox($this);
        $this->txtMontMini7->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini7->Width = $this->intAnchCamp;
        $this->txtMontMini7->Text = $this->decMontMini7;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini7->Enabled = false;
            $this->txtMontMini7->ForeColor = "blue";
        }
    }

    protected function txtMontMini8_Create() {
        $this->txtMontMini8 = new QFloatTextBox($this);
        $this->txtMontMini8->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini8->Width = $this->intAnchCamp;
        $this->txtMontMini8->Text = $this->decMontMini8;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini8->Enabled = false;
            $this->txtMontMini8->ForeColor = "blue";
        }
    }

    protected function txtMontMini9_Create() {
        $this->txtMontMini9 = new QFloatTextBox($this);
        $this->txtMontMini9->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini9->Width = $this->intAnchCamp;
        $this->txtMontMini9->Text = $this->decMontMini9;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini9->Enabled = false;
            $this->txtMontMini9->ForeColor = "blue";
        }
    }

    protected function txtMontMini10_Create() {
        $this->txtMontMini10 = new QFloatTextBox($this);
        $this->txtMontMini10->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini10->Width = $this->intAnchCamp;
        $this->txtMontMini10->Text = $this->decMontMini10;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini10->Enabled = false;
            $this->txtMontMini10->ForeColor = "blue";
        }
    }

    protected function txtMontMini11_Create() {
        $this->txtMontMini11 = new QFloatTextBox($this);
        $this->txtMontMini11->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini11->Width = $this->intAnchCamp;
        $this->txtMontMini11->Text = $this->decMontMini11;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini11->Enabled = false;
            $this->txtMontMini11->ForeColor = "blue";
        }
    }

    protected function txtMontMini12_Create() {
        $this->txtMontMini12 = new QFloatTextBox($this);
        $this->txtMontMini12->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini12->Width = $this->intAnchCamp;
        $this->txtMontMini12->Text = $this->decMontMini12;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini12->Enabled = false;
            $this->txtMontMini12->ForeColor = "blue";
        }
    }

    protected function txtMontMini13_Create() {
        $this->txtMontMini13 = new QFloatTextBox($this);
        $this->txtMontMini13->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini13->Width = $this->intAnchCamp;
        $this->txtMontMini13->Text = $this->decMontMini13;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini13->Enabled = false;
            $this->txtMontMini13->ForeColor = "blue";
        }
    }

    protected function txtMontMini14_Create() {
        $this->txtMontMini14 = new QFloatTextBox($this);
        $this->txtMontMini14->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini14->Width = $this->intAnchCamp;
        $this->txtMontMini14->Text = $this->decMontMini14;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini14->Enabled = false;
            $this->txtMontMini14->ForeColor = "blue";
        }
    }

    protected function txtMontMini15_Create() {
        $this->txtMontMini15 = new QFloatTextBox($this);
        $this->txtMontMini15->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini15->Width = $this->intAnchCamp;
        $this->txtMontMini15->Text = $this->decMontMini15;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini15->Enabled = false;
            $this->txtMontMini15->ForeColor = "blue";
        }
    }

    protected function txtMontMini16_Create() {
        $this->txtMontMini16 = new QFloatTextBox($this);
        $this->txtMontMini16->Name = QApplication::Translate('Monto Minimo');
        $this->txtMontMini16->Width = $this->intAnchCamp;
        $this->txtMontMini16->Text = $this->decMontMini16;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMini16->Enabled = false;
            $this->txtMontMini16->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi_Create() {
        $this->txtMontMaxi = new QFloatTextBox($this);
        $this->txtMontMaxi->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi->Width = $this->intAnchCamp;
        $this->txtMontMaxi->Text = $this->decMontMaxi;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi->Enabled = false;
            $this->txtMontMaxi->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi2_Create() {
        $this->txtMontMaxi2 = new QFloatTextBox($this);
        $this->txtMontMaxi2->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi2->Width = $this->intAnchCamp;
        $this->txtMontMaxi2->Text = $this->decMontMaxi2;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi2->Enabled = false;
            $this->txtMontMaxi2->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi3_Create() {
        $this->txtMontMaxi3 = new QFloatTextBox($this);
        $this->txtMontMaxi3->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi3->Width = $this->intAnchCamp;
        $this->txtMontMaxi3->Text = $this->decMontMaxi3;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi3->Enabled = false;
            $this->txtMontMaxi3->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi4_Create() {
        $this->txtMontMaxi4 = new QFloatTextBox($this);
        $this->txtMontMaxi4->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi4->Width = $this->intAnchCamp;
        $this->txtMontMaxi4->Text = $this->decMontMaxi4;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi4->Enabled = false;
            $this->txtMontMaxi4->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi5_Create() {
        $this->txtMontMaxi5 = new QFloatTextBox($this);
        $this->txtMontMaxi5->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi5->Width = $this->intAnchCamp;
        $this->txtMontMaxi5->Text = $this->decMontMaxi5;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi5->Enabled = false;
            $this->txtMontMaxi5->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi6_Create() {
        $this->txtMontMaxi6 = new QFloatTextBox($this);
        $this->txtMontMaxi6->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi6->Width = $this->intAnchCamp;
        $this->txtMontMaxi6->Text = $this->decMontMaxi6;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi6->Enabled = false;
            $this->txtMontMaxi6->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi7_Create() {
        $this->txtMontMaxi7 = new QFloatTextBox($this);
        $this->txtMontMaxi7->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi7->Width = $this->intAnchCamp;
        $this->txtMontMaxi7->Text = $this->decMontMaxi7;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi7->Enabled = false;
            $this->txtMontMaxi7->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi8_Create() {
        $this->txtMontMaxi8 = new QFloatTextBox($this);
        $this->txtMontMaxi8->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi8->Width = $this->intAnchCamp;
        $this->txtMontMaxi8->Text = $this->decMontMaxi8;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi8->Enabled = false;
            $this->txtMontMaxi8->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi9_Create() {
        $this->txtMontMaxi9 = new QFloatTextBox($this);
        $this->txtMontMaxi9->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi9->Width = $this->intAnchCamp;
        $this->txtMontMaxi9->Text = $this->decMontMaxi9;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi9->Enabled = false;
            $this->txtMontMaxi9->ForeColor = "blue";

        }
    }

    protected function txtMontMaxi10_Create() {
        $this->txtMontMaxi10 = new QFloatTextBox($this);
        $this->txtMontMaxi10->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi10->Width = $this->intAnchCamp;
        $this->txtMontMaxi10->Text = $this->decMontMaxi10;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi10->Enabled = false;
            $this->txtMontMaxi10->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi11_Create() {
        $this->txtMontMaxi11 = new QFloatTextBox($this);
        $this->txtMontMaxi11->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi11->Width = $this->intAnchCamp;
        $this->txtMontMaxi11->Text = $this->decMontMaxi11;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi11->Enabled = false;
            $this->txtMontMaxi11->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi12_Create() {
        $this->txtMontMaxi12 = new QFloatTextBox($this);
        $this->txtMontMaxi12->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi12->Width = $this->intAnchCamp;
        $this->txtMontMaxi12->Text = $this->decMontMaxi12;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi12->Enabled = false;
            $this->txtMontMaxi12->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi13_Create() {
        $this->txtMontMaxi13 = new QFloatTextBox($this);
        $this->txtMontMaxi13->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi13->Width = $this->intAnchCamp;
        $this->txtMontMaxi13->Text = $this->decMontMaxi13;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi13->Enabled = false;
            $this->txtMontMaxi13->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi14_Create() {
        $this->txtMontMaxi14 = new QFloatTextBox($this);
        $this->txtMontMaxi14->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi14->Width = $this->intAnchCamp;
        $this->txtMontMaxi14->Text = $this->decMontMaxi14;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi14->Enabled = false;
            $this->txtMontMaxi14->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi15_Create() {
        $this->txtMontMaxi15 = new QFloatTextBox($this);
        $this->txtMontMaxi15->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi15->Width = $this->intAnchCamp;
        $this->txtMontMaxi15->Text = $this->decMontMaxi15;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi15->Enabled = false;
            $this->txtMontMaxi15->ForeColor = "blue";
        }
    }

    protected function txtMontMaxi16_Create() {
        $this->txtMontMaxi16 = new QFloatTextBox($this);
        $this->txtMontMaxi16->Name = QApplication::Translate('Monto Maximo');
        $this->txtMontMaxi16->Width = $this->intAnchCamp;
        $this->txtMontMaxi16->Text = $this->decMontMaxi16;
        if (!$this->chkSeguSino->Checked) {
            $this->txtMontMaxi16->Enabled = false;
            $this->txtMontMaxi16->ForeColor = "blue";
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

    protected function txtPorcSegu12_Create() {
        $this->txtPorcSegu12 = new QFloatTextBox($this);
        $this->txtPorcSegu12->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu12->Width = 50;
        $this->txtPorcSegu12->Text = $this->decPorcSegu12;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu12->Enabled = false;
            $this->txtPorcSegu12->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu13_Create() {
        $this->txtPorcSegu13 = new QFloatTextBox($this);
        $this->txtPorcSegu13->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu13->Width = 50;
        $this->txtPorcSegu13->Text = $this->decPorcSegu13;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu13->Enabled = false;
            $this->txtPorcSegu13->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu14_Create() {
        $this->txtPorcSegu14 = new QFloatTextBox($this);
        $this->txtPorcSegu14->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu14->Width = 50;
        $this->txtPorcSegu14->Text = $this->decPorcSegu14;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu14->Enabled = false;
            $this->txtPorcSegu14->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu15_Create() {
        $this->txtPorcSegu15 = new QFloatTextBox($this);
        $this->txtPorcSegu15->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu15->Width = 50;
        $this->txtPorcSegu15->Text = $this->decPorcSegu15;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu15->Enabled = false;
            $this->txtPorcSegu15->ForeColor = "blue";
        }
    }

    protected function txtPorcSegu16_Create() {
        $this->txtPorcSegu16 = new QFloatTextBox($this);
        $this->txtPorcSegu16->Name = QApplication::Translate('Porcentaje de Seguro');
        $this->txtPorcSegu16->Width = 50;
        $this->txtPorcSegu16->Text = $this->decPorcSegu16;
        if (!$this->chkSeguSino->Checked) {
            $this->txtPorcSegu16->Enabled = false;
            $this->txtPorcSegu16->ForeColor = "blue";
        }
    }

    protected function txtRutaMaxi_Create() {
        $this->txtRutaMaxi = new QFloatTextBox($this);
        $this->txtRutaMaxi->Name = QApplication::Translate('Limite Maximo para Salir a Ruta');
        $this->txtRutaMaxi->Width = $this->intAnchCamp;
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
            $this->txtMontMini12->Enabled = true;
            $this->txtMontMini13->Enabled = true;
            $this->txtMontMini14->Enabled = true;
            $this->txtMontMini15->Enabled = true;
            $this->txtMontMini16->Enabled = true;

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
            $this->txtMontMaxi12->Enabled = true;
            $this->txtMontMaxi13->Enabled = true;
            $this->txtMontMaxi14->Enabled = true;
            $this->txtMontMaxi15->Enabled = true;
            $this->txtMontMaxi16->Enabled = true;

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
            $this->txtPorcSegu12->Enabled = true;
            $this->txtPorcSegu13->Enabled = true;
            $this->txtPorcSegu14->Enabled = true;
            $this->txtPorcSegu15->Enabled = true;
            $this->txtPorcSegu16->Enabled = true;

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
            $this->txtMontMini12->Enabled   = false;
            $this->txtMontMini13->Enabled   = false;
            $this->txtMontMini14->Enabled   = false;
            $this->txtMontMini15->Enabled   = false;
            $this->txtMontMini16->Enabled   = false;
            
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
            $this->txtMontMini12->ForeColor = "blue";
            $this->txtMontMini13->ForeColor = "blue";
            $this->txtMontMini14->ForeColor = "blue";
            $this->txtMontMini15->ForeColor = "blue";
            $this->txtMontMini16->ForeColor = "blue";

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
            $this->txtMontMaxi12->Enabled   = false;
            $this->txtMontMaxi13->Enabled   = false;
            $this->txtMontMaxi14->Enabled   = false;
            $this->txtMontMaxi15->Enabled   = false;
            $this->txtMontMaxi16->Enabled   = false;
            
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
            $this->txtMontMaxi12->ForeColor = "blue";
            $this->txtMontMaxi13->ForeColor = "blue";
            $this->txtMontMaxi14->ForeColor = "blue";
            $this->txtMontMaxi15->ForeColor = "blue";
            $this->txtMontMaxi16->ForeColor = "blue";

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
            $this->txtPorcSegu12->Enabled   = false;
            $this->txtPorcSegu13->Enabled   = false;
            $this->txtPorcSegu14->Enabled   = false;
            $this->txtPorcSegu15->Enabled   = false;
            $this->txtPorcSegu16->Enabled   = false;
            
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
            $this->txtPorcSegu12->ForeColor = "blue";
            $this->txtPorcSegu13->ForeColor = "blue";
            $this->txtPorcSegu14->ForeColor = "blue";
            $this->txtPorcSegu15->ForeColor = "blue";
            $this->txtPorcSegu16->ForeColor = "blue";

            $this->txtRutaMaxi->Enabled    = false;
            $this->txtRutaMaxi->ForeColor  = "blue";
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
//        $this->objSeguPmnx->ParaVal1 = intval($this->chkSeguSino->Checked);
//        $this->objSeguPmnx->ParaVal4 = $this->txtRutaMaxi->Text;
//        $this->objSeguPmnx->Save();

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

        $this->objSeguPmn12->ParaVal1 = $this->txtMontMini12->Text;
        $this->objSeguPmn12->ParaVal2 = $this->txtMontMaxi12->Text;
        $this->objSeguPmn12->ParaVal3 = $this->txtPorcSegu12->Text;
        $this->objSeguPmn12->Save();

        $this->objSeguPmn13->ParaVal1 = $this->txtMontMini13->Text;
        $this->objSeguPmn13->ParaVal2 = $this->txtMontMaxi13->Text;
        $this->objSeguPmn13->ParaVal3 = $this->txtPorcSegu13->Text;
        $this->objSeguPmn13->Save();

        $this->objSeguPmn14->ParaVal1 = $this->txtMontMini14->Text;
        $this->objSeguPmn14->ParaVal2 = $this->txtMontMaxi14->Text;
        $this->objSeguPmn14->ParaVal3 = $this->txtPorcSegu14->Text;
        $this->objSeguPmn14->Save();

        $this->objSeguPmn15->ParaVal1 = $this->txtMontMini15->Text;
        $this->objSeguPmn15->ParaVal2 = $this->txtMontMaxi15->Text;
        $this->objSeguPmn15->ParaVal3 = $this->txtPorcSegu15->Text;
        $this->objSeguPmn15->Save();

        $this->objSeguPmn16->ParaVal1 = $this->txtMontMini16->Text;
        $this->objSeguPmn16->ParaVal2 = $this->txtMontMaxi16->Text;
        $this->objSeguPmn16->ParaVal3 = $this->txtPorcSegu16->Text;
        $this->objSeguPmn16->Save();

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
        $this->arrValoMini[11] = $this->txtMontMini12->Text;
        $this->arrValoMini[12] = $this->txtMontMini13->Text;
        $this->arrValoMini[13] = $this->txtMontMini14->Text;
        $this->arrValoMini[14] = $this->txtMontMini15->Text;
        $this->arrValoMini[15] = $this->txtMontMini16->Text;

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
        $this->arrValoMaxi[11] = $this->txtMontMaxi12->Text;
        $this->arrValoMaxi[12] = $this->txtMontMaxi13->Text;
        $this->arrValoMaxi[13] = $this->txtMontMaxi14->Text;
        $this->arrValoMaxi[14] = $this->txtMontMaxi15->Text;
        $this->arrValoMaxi[15] = $this->txtMontMaxi16->Text;

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
        $this->arrPorcSegu[11] = $this->txtPorcSegu12->Text;
        $this->arrPorcSegu[12] = $this->txtPorcSegu13->Text;
        $this->arrPorcSegu[13] = $this->txtPorcSegu14->Text;
        $this->arrPorcSegu[14] = $this->txtPorcSegu15->Text;
        $this->arrPorcSegu[15] = $this->txtPorcSegu16->Text;

//        $_SESSION['SeguSino'] = serialize($this->chkSeguSino->Checked);
//        $_SESSION['RutaMaxi'] = serialize($this->txtRutaMaxi->Text);
        $_SESSION['ValoMin1'] = serialize($this->arrValoMini);
        $_SESSION['ValoMax1'] = serialize($this->arrValoMaxi);
        $_SESSION['PorcSeg1'] = serialize($this->arrPorcSegu);

        $this->mensaje('Transaccion Exitosa !','','','',__iCHEC__);
    }

}

ConfigurarSeguro::Run('ConfigurarSeguro');
?>
