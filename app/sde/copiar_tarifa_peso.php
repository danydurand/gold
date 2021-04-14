<?php
//----------------------------------------------------------------------------------
// Programa      : copiar_tarifa_peso.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 25/02/2017
// Descripcion   : Este programa copia la estructura de una Tarifa en otra.
//                 Fue diseñado para ahorrar tiempo digitando los rangos de peso
//                 que usualmente constituyen una Tarifa por Peso.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CopiarTarifaPeso extends FormularioBaseKaizen {
    protected $lstTariOrig;
    protected $lstTariDest;

    protected function Form_Create() {
        parent::Form_Create();
        //-------------------------------------------------
        // Etiqueta del Título del Formulario del Programa
        //-------------------------------------------------
        $this->lblTituForm->Text = 'Copiar Tarifa por Peso';
        //-----------------------
        // Campos de información
        //-----------------------
        $this->lstTariOrig_Create();
        $this->lstTariDest_Create();
        //------------------------
        // Botones del Formulario
        //------------------------
        $this->btnSave->Text = TextoIcono('file','Copiar');
    }

    //------------------------------------
    // Creando los objetos del Formulario
    //------------------------------------

    protected function lstTariOrig_Create() {
        $this->lstTariOrig = new QListBox($this);
        $this->lstTariOrig->Name = "Tarifa Origen";
        $this->lstTariOrig->Required = true;
        $this->lstTariOrig->Width = 250;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::FacTarifa()->Id,false);
        $arrTariDest   = FacTarifa::LoadArrayByTipoTarifa(FacTipoTarifaType::PORPESO,$objClauOrde);
        $intCantTari   = count($arrTariDest);
        $this->lstTariOrig->AddItem('- Seleccione Uno - ('.$intCantTari.')', null);
        foreach ($arrTariDest as $objTarifa) {
            $intCantDeta = $objTarifa->CountTarifaPesosAsTarifa();
            if ($intCantDeta > 0) {
                $this->lstTariOrig->AddItem($objTarifa->__toString(), $objTarifa->Id);
            }
        }
        $this->lstTariOrig->AddAction(new QChangeEvent(), new QAjaxAction("lstTariOrig_Change"));
    }

    protected function lstTariDest_Create() {
        $this->lstTariDest = new QListBox($this);
        $this->lstTariDest->Name = "Tarifa Destino";
        $this->lstTariDest->Required = true;
        $this->lstTariDest->Width = 250;
    }

    //-------------------------------------
    // Acciones relacionadas a los objetos
    //-------------------------------------

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function lstTariOrig_Change() {
        if (!is_null($this->lstTariOrig->SelectedValue)) {
            $this->lstTariDest->RemoveAllItems();
            $this->lstTariDest->AddItem("- Seleccione Uno -", null);
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::FacTarifa()->Id,false);
            $arrTariDest   = FacTarifa::LoadArrayByTipoTarifa(FacTipoTarifaType::PORPESO, $objClauOrde);
            foreach ($arrTariDest as $objTarifa) {
                if ($objTarifa->Id != $this->lstTariOrig->SelectedValue) {
                    $this->lstTariDest->AddItem($objTarifa->__toString(), $objTarifa->Id);
                }
            }
            $this->lstTariDest->Width = 250;
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------------------------------
        // Se arma un vector con todos los registros de la Tarifa Origen
        //----------------------------------------------------------------
        $arrTariOrig = TarifaPeso::LoadArrayByTarifaId($this->lstTariOrig->SelectedValue);
        //-----------------------------------------------------
        // Se borran todos los registros de la Tarifa Destino
        //-----------------------------------------------------
        TarifaPeso::BorrarContenidoTarifaPeso($this->lstTariDest->SelectedValue);
        //------------------------------------------------------------------
        // Se copian los registro de la Tarifa Origen en la Tarifa Destino
        //------------------------------------------------------------------
        $intCantRegi = 0;
        foreach ($arrTariOrig as $objTariOrig) {
            $objTariDest = new TarifaPeso();
            $objTariDest->TarifaId = $this->lstTariDest->SelectedValue;
            $objTariDest->TipoId = $objTariOrig->TipoId;
            $objTariDest->PesoInicial = $objTariOrig->PesoInicial;
            $objTariDest->PesoFinal = $objTariOrig->PesoFinal;
            $objTariDest->MontoTarifa = $objTariOrig->MontoTarifa;
            $objTariDest->FranqueoPostal = $objTariOrig->FranqueoPostal;
            $objTariDest->MontoBase = $objTariOrig->MontoBase;
            $objTariDest->PorcentajeFp = $objTariOrig->PorcentajeFp;
            $objTariDest->Save();
            $intCantRegi++;
        }
        //------------------------------------------------------
        // Nombre de la Tarifa Origen y el de la Tarifa Destino
        //------------------------------------------------------
        $strTariOrig = $this->lstTariOrig->SelectedName;
        $strTariDest = $this->lstTariDest->SelectedName;
        //----------------------------------------------------
        // Se guarda la acción ejecutada en el log de cambios
        //----------------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'FacTarifa';
        $arrLogxCamb['intRefeRegi'] = $this->lstTariOrig->SelectedValue;
        $arrLogxCamb['strNombRegi'] = "Tarifa Peso de $strTariOrig a $strTariDest";
        $arrLogxCamb['strDescCamb'] = "Copiada";
        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/copiar_tarifa_peso.php';
        LogDeCambios($arrLogxCamb);
        $this->mensaje("Transacción Exitosa. Se copiaron $intCantRegi registro(s)",'','','',__iCHEC__);
    }
}

CopiarTarifaPeso::Run('CopiarTarifaPeso');