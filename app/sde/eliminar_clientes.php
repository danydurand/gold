<?php
//---------------------------------------------------------------
// Programa       : desactivar_cliente.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 23/09/16 08:43 AM
// Proyecto       : newliberty
// Descripcion    : Este programa desactiva masivamente clientes
//---------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class EliminarClientes extends FormularioBaseKaizen {
    protected $txtCodiClie;
    protected $lstMotiElim;

    protected function Form_PreRender()
    {
        parent::Form_PreRender();
        $strCodiClie = QApplication::PathInfo(0);
        $this->txtCodiClie->Text = $strCodiClie;
    }

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Eliminar Cliente(s)';

        $this->txtCodiClie_Create();
        $this->lstMotiElim_Create();
    }

    //------------------------------
    // Aquí se crean los objetos
    //------------------------------

    protected function txtCodiClie_Create() {
        $this->txtCodiClie = new QTextBox($this);
        $this->txtCodiClie->Name = QApplication::Translate('Clientes a Eliminar');
        $this->txtCodiClie->Height = 100;
        $this->txtCodiClie->Width = 300;
        $this->txtCodiClie->Placeholder = 'Un código CR en cada línea';
        $this->txtCodiClie->TextMode = QTextMode::MultiLine;
        $this->txtCodiClie->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");

    }

    protected function lstMotiElim_Create() {
        $this->lstMotiElim = new QListBox($this);
        $this->lstMotiElim->Name = 'Motivo de Eliminación';
        $this->lstMotiElim->Required = true;
        $this->lstMotiElim->Width = 300;
        $arrMotiEli = MotivoEliminacion::LoadAll();
        $intCantRregi = count($arrMotiEli);
        $this->lstMotiElim->AddItem('- Seleccione Uno - ('.$intCantRregi.')', null);
        foreach ($arrMotiEli as $objMotiEli) {
            $this->lstMotiElim->AddItem($objMotiEli->Description,$objMotiEli->Id);
        }
    }

    //-----------------------------------
    // Acciones Relativas a los Objetos
    //-----------------------------------

    protected function Form_Validate() {
        if (strlen($this->txtCodiClie->Text) == 0) {
            $this->mensaje('Debe proporcionar los Clientes que desea Eliminar','m','d',null,__iHAND__);
            return false;
        }
        if (is_null($this->lstMotiElim->SelectedValue)) {
            $this->mensaje('Debe seleccionar un Motivo de Eliminacion de Clientes','m','d',null,__iHAND__);
            return false;
        }
        return true;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje('');
        $arrCodiClie = explode(',',nl2br2($this->txtCodiClie->Text));
        $this->txtCodiClie->Text = '';
        $intCantRegi = 0;

        foreach ($arrCodiClie as $strCodiClie) {
            if (strlen($strCodiClie) > 0) {
                $objMastClie = MasterCliente::LoadByCodigoInterno($strCodiClie);
                if ($objMastClie) {
                    if (is_null($objMastClie->DeletedAt)) {
                        $objMastClie->DeletedAt = new QDateTime(QDateTime::Now());
                        $objMastClie->MotivoEliminacionId = $this->lstMotiElim->SelectedValue;
                        $objMastClie->CodiStat = StatusType::INACTIVO;
                        $objMastClie->Save();
                        $intCantRegi++;
                        //--------------------------------------
                        // Se deja constancia en el Historico
                        //--------------------------------------
                        $arrLogxCamb['strNombTabl'] = 'MasterCliente';
                        $arrLogxCamb['intRefeRegi'] = $objMastClie->CodiClie;
                        $arrLogxCamb['strNombRegi'] = '('.$objMastClie->CodigoInterno.') '.$objMastClie->NombClie;
                        $arrLogxCamb['strDescCamb'] = 'Eliminado (SoftDelete)';
                        LogDeCambios($arrLogxCamb);
                    } else {
                        $strTextMens = $strCodiClie." (Previamente Eliminado)";
                        $this->txtCodiClie->Text .= $strTextMens.chr(13);
                    }
                } else {
                    $strTextMens = $strCodiClie." (No Existe)";
                    $this->txtCodiClie->Text .= $strTextMens.chr(13);
                }
            }
        }

        $strTextMens = 'Registros procesados: '.$intCantRegi;
        $this->mensaje($strTextMens,'m','s',null,__iCHEC__);
    }

    protected function btnCancel_Click() {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
    }
}

EliminarClientes::Run('EliminarClientes');