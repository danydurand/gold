<?php
//-------------------------------------------------------------------
// Programa      : generar_sodexo_output.php
// Realizado por : Juan Duran
// Fecha Elab.   : 09/03/2017
// Descripcion   : Este programa genera el archivo plano de salida,
//                 según las especificaciones de Sodexo
//-------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class GenerarSodexoOutput extends FormularioBaseKaizen {

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Generar Archivo Sodexo');
    }

    //----------------------------
    // Aquí se crean los Objetos
    //----------------------------

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = QApplication::Translate('Generar');
        $this->btnSave->Text = '<i class="fa fa-cogs fa-lg"></i> Generar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
    }

    //-----------------------------------
    // Acciones asociadas a los Objetos
    //-----------------------------------

    protected function btnSave_Click() {
        //--------------------
        // Archivo de Salida 
        //--------------------
        $strNombArch = __SDE_DIRECTORY__."/ENTREGADOS_T_LIBERTY_".date("dmY")."_".date("His").".TXT";
        // $strNombArch = "ENTREGADOS_T_LIBERTY_".date("dmY")."_".date("His").".TXT";
        $mixManeArch = fopen($strNombArch,'w');
        //------------------------------------
        // Selección de registros a Procesar
        //------------------------------------
        $arrSodePend = SodexoInput::LoadArrayPendientesPorCerrar();
        $intCantRegi = 0;
        //--------------------------------------
        // Se procesar uno a uno los Registros 
        //--------------------------------------
        foreach ($arrSodePend as $objSodePend) {
            //------------------------------------------
            // Información que va al Archivo de Salida
            //------------------------------------------
            $strGuiaSode = $objSodePend->GuiaSodexo;
            $strFechRegi = $objSodePend->FechaRegistro->__toString('DD/MM/YYYY');
            $strFechEntr = $objSodePend->GetVirtualAttribute('fecha_entrega');
            $strNumeGuia = $objSodePend->GuiaId;
            $intStatSode = $objSodePend->GetVirtualAttribute('status_sodexo');
            $intCantEnva = $objSodePend->CantidadEnvases;
            $decPesoGuia = $objSodePend->GetVirtualAttribute('peso_guia');
            $strHoraEntr = $objSodePend->GetVirtualAttribute('hora_entrega');
            $strCiudOrig = 'CARACAS';
            $strCiudDest = $objSodePend->Ciudad;
            $strReciPorx = $objSodePend->GetVirtualAttribute('entregado_a');
            $intCierCicl = $objSodePend->GetVirtualAttribute('cierra_ciclo');
            if ($intCierCicl == SinoTypeCT::SI && $intStatSode != 5) {
                $strMotiDevo = $objSodePend->GetVirtualAttribute('motivo_devolucion');
            } else {
                $strMotiDevo = '';
        }
        //----------------------------------------------------
        // Linea de salida al archivo plano de formato fijo
        //----------------------------------------------------
        $strLineText = sprintf("%-15s%-11s%-11s%-31s%-9s%-6s%-7s%-15s%-15s%-16s%-50s",
        $strGuiaSode,$strFechRegi,$strFechEntr,$intStatSode,
        $intCantEnva,$decPesoGuia,$strHoraEntr,$strCiudOrig,
        $strCiudDest,$strReciPorx,$strMotiDevo);
        fputs($mixManeArch,$strLineText."\n");
        //-------------------------------------------------------------------------
        // Se actualiza la tabla Sodex Input, con el ultimo checkpoint de la guia 
        //-------------------------------------------------------------------------
        $objSodePend->CodiEsta = $objSodePend->GetVirtualAttribute('codi_esta');
        $objSodePend->CodiCkpt = $objSodePend->GetVirtualAttribute('codi_ckpt');
        $objSodePend->FechCkpt = new QDateTime($objSodePend->GetVirtualAttribute('fech_ckpt'));
        $objSodePend->HoraCkpt = $objSodePend->GetVirtualAttribute('hora_ckpt');
        $objSodePend->CierreCiclo = $objSodePend->GetVirtualAttribute('cierra_ciclo');
        $objSodePend->Save();
        $intCantRegi ++;
        }
        fclose($mixManeArch);
        if ($intCantRegi > 0) {
            QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
        } else {
            $this->lblMensUsua->Text = 'No hay registros para procesar';
        }
    }
}

GenerarSodexoOutput::Run('GenerarSodexoOutput');
?>