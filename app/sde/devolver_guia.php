<?php
//--------------------------------------------------------------------------------------------------------
// Programa      : devolver_guia.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 23/03/2018
// Descripcion   : Este programa, realizar los cambios necesarios en las guías, para que sean devueltas
//                 al remitente.
//--------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class DevolverGuia extends FormularioBaseKaizen {
    protected $txtNumeGuia;
    protected $txtTextObse;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Devolver Guia(s)';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->txtNumeGuia_Create();
        $this->txtTextObse_Create();

    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate("Nro de Guias");
        $this->txtNumeGuia->Placeholder = 'Nros de Guias';
        $this->txtNumeGuia->Required = true;
        $this->txtNumeGuia->TextMode = QTextMode::MultiLine;
        $this->txtNumeGuia->Rows = 8;
    }

    protected function txtTextObse_Create() {
        $this->txtTextObse = new QTextBox($this);
        $this->txtTextObse->Name = QApplication::Translate('Observacion');
        $this->txtTextObse->Placeholder = '(Opcional)';
        $this->txtTextObse->Width = 250;
        $this->txtTextObse->MaxLength = 100;
        $this->txtTextObse->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtTextObse->Required = true;
    }


    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    protected function btnSave_Click() {
        $objDataBase = Guia::GetDatabase();
        $objCkptDevo = SdeCheckpoint::Load('DR');
        if (!$objCkptDevo) {
            $strMensUsua = 'El Checkpoint <br>Devuelta al Remitente</b> no esta disponible';
            $this->mensaje($strMensUsua,'','d','',__iHAND__);
            return;
        }
        $arrGuiaProc = explode(',',nl2br2($this->txtNumeGuia->Text));
        $arrGuiaProc = LimpiarArreglo($arrGuiaProc);
        $this->txtNumeGuia->Text = '';

        $mixErroOrig = error_reporting();
        error_reporting(0);
        $this->mensaje();

        $intCantProc = 0;
        $intCantErro = 0;
        foreach ($arrGuiaProc as $strNumeGuia) {
            $blnTodoOkey = true;
            $objGuiaProc = Guia::Load($strNumeGuia);
            //-------------------------
            // La Guia, debe existir
            //-------------------------
            if (!$objGuiaProc) {
                $intCantErro++;
                $this->txtNumeGuia->Text .= $strNumeGuia . ' (1)' . chr(13);
                $blnTodoOkey = false;
            }
            if ($blnTodoOkey) {
                //--------------------------------------------------------------------------------------
                // La Guia no debe estar devuelta, ni anulada, ni entregada y ademas, el Usuario debe
                // estar en la Sucursal Destino del envío
                //--------------------------------------------------------------------------------------
                $arrResuVali = $objGuiaProc->validarDevolucion($this->objUsuario);
                if (!$arrResuVali['TodoOkey']) {
                    $intCantErro++;
                    $this->txtNumeGuia->Text .= $strNumeGuia . ' (' . $arrResuVali['CodiErro'] . ')' . chr(13);
                    $blnTodoOkey = false;
                }
            }
            if ($blnTodoOkey) {
                try {
                    $objDataBase->TransactionBegin();
                    $arrResuGrab = $objGuiaProc->Devolver($objCkptDevo);
                    if ($arrResuGrab['TodoOkey']) {
                        $intCantProc ++;
                        $objDataBase->TransactionCommit();
                    } else {
                        throw new Exception($arrResuGrab['MotiNook']);
                    }
                } catch (Exception $e) {
                    $intCantErro ++;
                    $objDataBase->TransactionRollBack();
                }
            }
        }
        error_reporting($mixErroOrig);
        $strClasMens = 's';
        $strImagMens = __iCHEC__;
        $strMensUsua = 'Guias Procesadas: '.$intCantProc;
        if ($intCantErro > 0) {
            $strClasMens  = 'w';
            $strImagMens  = __iEXCL__;
            $strMensUsua .= ' | Guías Erradas: '.$intCantErro;
        }
        $this->mensaje($strMensUsua,'',$strClasMens,'',$strImagMens);
    }

}

DevolverGuia::Run('DevolverGuia');
?>
