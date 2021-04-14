<?php
//--------------------------------------------------------------------------------
// Programa      : eliminar_guias.php
// Realizad por  : Daniel Durand
// Fecha Elab.   : 19/08/2017
// Descripcion   : Este programa, permite eliminar en forma definitiva, una guía
//                 del Sistema.
//---------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class EliminarGuias extends FormularioBaseKaizen {
    protected $arrGuiaLote;
    protected $txtNumeGuia;

    protected function SetupValores() {
        $this->lblTituForm->Text = QApplication::Translate('Eliminar Guias (Hard-Delete)');
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();
    	$this->txtNumeGuia_Create();

        $this->btnSave->Visible = false;
        // $blnRecaTari = BuscarParametro("ElimGuia", $this->objUsuario->LogiUsua, "Val1", 0);
        // if ($blnRecaTari) {
            $this->btnSave->Visible = true;
        // }

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------
         
    protected function txtNumeGuia_Create() {
    	$this->txtNumeGuia = new QTextBox($this);
    	$this->txtNumeGuia->Name = "Nros de Guías";
    	$this->txtNumeGuia->Required = true;
    	$this->txtNumeGuia->TextMode = QTextMode::MultiLine;
    	$this->txtNumeGuia->Height = 250;
    	$this->txtNumeGuia->Width = 200;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnSave_Click() {
        $arrGuiaElim = explode(',',nl2br2($this->txtNumeGuia->Text));
        $this->txtNumeGuia->Text = '';
        //--------------------------------------------------------
        // Aquí se eliminan la líneas en blanco y los duplicados
        //--------------------------------------------------------
        $arrGuiaElim = BorrarLineasEnBlanco($arrGuiaElim); 
        $arrGuiaElim = array_unique($arrGuiaElim,SORT_STRING);
        $intCantGuia = count($arrGuiaElim);
        //---------------------------------------------------------------
        // Se procesa una a una las Guías proporcionadas por el Usuario
        //---------------------------------------------------------------
        $intContProc = 0;
        foreach ($arrGuiaElim as $strGuiaElim) {
            $blnTodoOkey = true;
            $objGuia = Guia::Load($strGuiaElim);
            if (!$objGuia) {
                $this->txtNumeGuia->Text .= $strGuiaElim." (No Existe)".chr(13);
                $blnTodoOkey = false;
            } 
            if ($blnTodoOkey) {
                if ($objGuia->Anulada) {
                   $this->txtNumeGuia->Text .= $strGuiaElim." (Previamente Eliminada)".chr(13);
                   $blnTodoOkey = false;
                }
            }
            if ($blnTodoOkey) {
                if (!in_array($objGuia->CodiCkpt,array('NR','RP','PU'))) {
                   $this->txtNumeGuia->Text .= $strGuiaElim." (En Transito. No se puede Eliminar)".chr(13);
                   $blnTodoOkey = false;
                }
            }
            if ($blnTodoOkey) {
                //----------------------------------------------
                // Aqui se borra guia en forma definitiva
                //----------------------------------------------
                $objGuia->Borrar(true);
                //---------------------------------------------------------------------
                // Se deja evidencia de la operacion realizada
                //---------------------------------------------------------------------
                $strTextMens = "Eliminada: ".$this->objUsuario->LogiUsua;
                $arrParaRegi['CodiCkpt'] = 'HD';
                $arrParaRegi['TextMens'] = $strTextMens;
                $arrParaRegi['NumeGuia'] = $objGuia->NumeGuia;
                $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
                CrearRegistroDeTrabajo($arrParaRegi);
                //-----------------------------------
                // Se cuenta la Guía como Procesada
                //-----------------------------------
                $intContProc++;
            }
        }
        $strMensUsua = sprintf('Guías a Eliminar (%s) / Eliminadas (%s)',$intCantGuia,$intContProc);
        if ($intCantGuia == $intContProc) {
            $this->mensaje($strMensUsua,'','','',__iCHEC__);
        } else {
            $this->mensaje($strMensUsua,'','W','',__iEXCL__);
        }
    }
}

EliminarGuias::Run('EliminarGuias');
?>