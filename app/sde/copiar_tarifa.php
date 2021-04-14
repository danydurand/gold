<?php
//----------------------------------------------------------------------------------
// Programa      : copiar_tarifa.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 29/01/2018
// Descripcion   : Este programa copia la estructura de una Tarifa en otra.
//                 Fue diseñado para ahorrar tiempo digitando los rangos de peso
//                 que usualmente constituyen una Tarifa.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CopiarTarifa extends FormularioBaseKaizen {
    /**
     * @var $objTariOrig FacTarifa
     */
    protected $objTariOrig;
    protected $txtNombOrig;
    protected $txtNombNuev;
    protected $txtTasaIvax;
    protected $txtPorcAume;

    protected function SetupValores() {
        $intTariOrig = QApplication::PathInfo(0);
        $this->objTariOrig = FacTarifa::Load($intTariOrig);
        if (!$this->objTariOrig) {
            $this->mensaje('La tarifa original no existe','m','d','',__iHAND__);
            $this->btnSave->Visible = false;
        } else {
            $this->mensaje();
            $this->btnSave->Visible = true;
        }
    }

    protected function Form_Create() {

        parent::Form_Create();

        $this->lblTituForm->Text = 'Copiar Tarifa';

        $this->SetupValores();

        $this->txtNombOrig_Create();
        $this->txtNombNuev_Create();
        $this->txtTasaIvax_Create();
        $this->txtPorcAume_Create();

        $this->btnSave->Text = TextoIcono('clone','Copiar');
    }

    //------------------------------------
    // Creando los objetos del Formulario
    //------------------------------------

    protected function txtNombOrig_Create() {
        $this->txtNombOrig = new QTextBox($this);
        $this->txtNombOrig->Name = 'Tarifa Original';
        $this->txtNombOrig->Text = $this->objTariOrig ? $this->objTariOrig->Descripcion : 'N/A';
        $this->txtNombOrig->Required = true;
        $this->txtNombOrig->Enabled = false;
        $this->txtNombOrig->ForeColor = 'blue';
    }

    protected function txtNombNuev_Create() {
        $this->txtNombNuev = new QTextBox($this);
        $this->txtNombNuev->Name = 'Nombre de la nueva Tarifa';
        $this->txtNombNuev->Required = true;
        $this->txtNombNuev->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtTasaIvax_Create() {
        $this->txtTasaIvax = new QFloatTextBox($this);
        $this->txtTasaIvax->Name = 'Tasa IVA';
        $this->txtTasaIvax->Text = $this->objTariOrig->TasaIva;
        $this->txtTasaIvax->Width = 60;
        $this->txtTasaIvax->ToolTip = '% de IVA para la nueva Tarifa';
        $this->txtTasaIvax->HtmlAfter = ' (% de IVA para la nueva Tarifa)';
    }

    protected function txtPorcAume_Create() {
        $this->txtPorcAume = new QFloatTextBox($this);
        $this->txtPorcAume->Name = '% de Aumento';
        $this->txtPorcAume->Width = 60;
        $this->txtPorcAume->ToolTip = '% de Aumento para la nueva Tarifa';
        $this->txtPorcAume->HtmlAfter = ' (% de Aumento para la nueva Tarifa)';
    }

    //-------------------------------------
    // Acciones relacionadas a los objetos
    //-------------------------------------

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------------------------------
        // El nombre de la tarifa que se pretende crear, no debe existir
        //----------------------------------------------------------------
        $this->mensaje();
        $blnTodoOkey   = true;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::FacTarifa()->Descripcion,$this->txtNombNuev->Text);
        $blnTariExis   = FacTarifa::QueryCount(QQ::AndCondition($objClauWher));
        if ($blnTariExis) {
            $blnTodoOkey = false;
            $this->mensaje('Ya existe una Tarifa con ese Nombre, elija otro !!!','m','d','',__iHAND__);
        }
        if ($blnTodoOkey) {
            $decTasaIvax = strlen($this->txtTasaIvax->Text) > 0 ? $this->txtTasaIvax->Text : $this->objTariOrig->TasaIva;
            $decPorcAume = strlen($this->txtPorcAume->Text) > 0 ? $this->txtPorcAume->Text : 0;
            $decFactIvax = 1 + ($decTasaIvax / 100);
            //----------------------
            // Montos de la Tarifa
            //----------------------
            $decIncrNaci = $this->objTariOrig->ValorIncremento;
            $decIncrUrba = $this->objTariOrig->IncrementoUrbano;
            if ($decPorcAume > 0) {
                //-----------------------------------------------------------
                // Aqui se implementa el aumento, en caso que sea necesario
                //-----------------------------------------------------------
                $decIncrNaci += round($this->objTariOrig->ValorIncremento * ($decPorcAume/100),2);
                $decIncrUrba += round($this->objTariOrig->IncrementoUrbano * ($decPorcAume/100),2);
            }
            //------------------------------------------------
            // Se copian los datos de cabezera de la tarifa
            //------------------------------------------------
            $objNuevTari = new FacTarifa();
            $objNuevTari->Descripcion          = $this->txtNombNuev->Text;
            $objNuevTari->TipoTarifa           = $this->objTariOrig->TipoTarifa;
            $objNuevTari->PesoInicial          = $this->objTariOrig->PesoInicial;
            $objNuevTari->ValorIncremento      = $decIncrNaci; //$this->objTariOrig->ValorIncremento;
            $objNuevTari->MedidaIncremento     = $this->objTariOrig->MedidaIncremento;
            $objNuevTari->PorcentajeSobreValor = $this->objTariOrig->PorcentajeSobreValor;
            $objNuevTari->VolumenParaDscto     = $this->objTariOrig->VolumenParaDscto;
            $objNuevTari->DsctoPorVolumen      = $this->objTariOrig->DsctoPorVolumen;
            $objNuevTari->PesoParaDscto        = $this->objTariOrig->PesoParaDscto;
            $objNuevTari->DsctoPorPeso         = $this->objTariOrig->DsctoPorPeso;
            $objNuevTari->MontoMinimo          = $this->objTariOrig->MontoMinimo;
            $objNuevTari->CostoParadaAdicional = $this->objTariOrig->CostoParadaAdicional;
            $objNuevTari->CostoAyudante        = $this->objTariOrig->CostoAyudante;
            $objNuevTari->IncrementoUrbano     = $decIncrUrba; //$this->objTariOrig->IncrementoUrbano;
            $objNuevTari->PesoInicialUrbano    = $this->objTariOrig->PesoInicialUrbano;
            $objNuevTari->TasaIva              = $decTasaIvax;
            $objNuevTari->Save();
            //----------------------------------------------------------------
            // Se arma un vector con todos los registros de la Tarifa Origen
            //----------------------------------------------------------------
            $arrTariOrig = TarifaPeso::LoadArrayByTarifaId($this->objTariOrig->Id);
            //------------------------------------------------------------------
            // Se copian los registro de la Tarifa Origen en la Tarifa Destino
            //------------------------------------------------------------------
            $intCantRegi = 0;
            foreach ($arrTariOrig as $objTariOrig) {
                $decMontTari = $objTariOrig->MontoTarifa;
                $decMontBase = $objTariOrig->MontoBase;
                $decFranPost = $objTariOrig->FranqueoPostal;
                if ($decPorcAume > 0) {
                    //-------------------------------------------------------
                    // Se implementa el aumento, en caso que sea necesario
                    //-------------------------------------------------------
                    $decMontTari += $decMontTari * ($decPorcAume/100);
                    $decFranPost += $decFranPost * ($decPorcAume/100);
                    //-------------------------------------------------------
                    // Se calcula el monto base en funcion del aumento
                    //-------------------------------------------------------
                    $decBaseImpo = $decMontTari - $decFranPost; //$objTariOrig->FranqueoPostal;
                    $decMontIvax = $decBaseImpo - ($decBaseImpo / $decFactIvax);
                    $decMontBase = round($decBaseImpo - $decMontIvax,2);
                }
                if ($decTasaIvax != $this->objTariOrig->TasaIva) {
                    $decMontIvax = round(($decMontBase * $decTasaIvax / 100),2);
                    //$decMontTari = $decMontBase + $objTariOrig->FranqueoPostal + $decMontIvax;
                    $decMontTari = $decMontBase + $decFranPost + $decMontIvax;
                }

                $objTariDest = new TarifaPeso();
                $objTariDest->TarifaId       = $objNuevTari->Id;
                $objTariDest->TipoId         = $objTariOrig->TipoId;
                $objTariDest->PesoInicial    = $objTariOrig->PesoInicial;
                $objTariDest->PesoFinal      = $objTariOrig->PesoFinal;
                $objTariDest->MontoTarifa    = $decMontTari; //$objTariOrig->MontoTarifa;
                $objTariDest->FranqueoPostal = $decFranPost; //$objTariOrig->FranqueoPostal;
                $objTariDest->MontoBase      = $decMontBase; //$objTariOrig->MontoBase;
                $objTariDest->PorcentajeFp   = $objTariOrig->PorcentajeFp;
                $objTariDest->Save();
                $intCantRegi++;
            }
            //------------------------------------------------------
            // Nombre de la Tarifa Origen y el de la Tarifa Destino
            //------------------------------------------------------
            $strTariOrig = $this->txtNombOrig->Text;
            $strTariDest = $this->txtNombNuev->Text;
            //----------------------------------------------------
            // Se guarda la acción ejecutada en el log de cambios
            //----------------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'FacTarifa';
            $arrLogxCamb['intRefeRegi'] = $this->objTariOrig->Id;
            $arrLogxCamb['strNombRegi'] = "Tarifa Peso de $strTariOrig a $strTariDest";
            $arrLogxCamb['strDescCamb'] = "Copiada";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/copiar_tarifa.php';
            LogDeCambios($arrLogxCamb);
            $strEditNuev = __SIST__.'/fac_tarifa_edit.php/'.$objNuevTari->Id;
            QApplication::Redirect($strEditNuev);
        }
    }
}

CopiarTarifa::Run('CopiarTarifa');