<?php
//-----------------------------------------------------------------------------
// Programa      : transferir_historico.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 17/06/2021
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class TransferirHistorico extends FormularioBaseKaizen {
    protected $txtNumeCont;
    protected $objProcEjec;
    protected $btnErroProc;
    /* @var $objManiProc NotaEntrega */
    protected $objManiProc;
    protected $blnTodoOkey = true;
    protected $blnManiTran = false;


    protected function SetupValores() {
        $intIdxxMani = QApplication::PathInfo(0);
        $this->objManiProc = NotaEntrega::Load($intIdxxMani);
        if (!$this->objManiProc) {
            $this->danger('No Existe el Manifiesto');
            $this->blnTodoOkey = false;
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Transf. Manifiesto a Histórico';

        $this->SetupValores();

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->txtNumeCont_Create();
        $this->btnErroProc_Create();

        $this->txtNumeCont = disableControl($this->txtNumeCont);

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtNumeCont_Create() {
        $this->txtNumeCont = new QTextBox($this);
        $this->txtNumeCont->Name = QApplication::Translate('Manifiesto');
        $this->txtNumeCont->Width = 200;
        $this->txtNumeCont->Required = true;
        if ($this->blnTodoOkey) {
            $this->txtNumeCont->Text = $this->objManiProc->Referencia;
        }
    }

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = TextoIcono('eye','Error(es)','F','lg');
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnErroProc_Click() {
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function btnCancel_Click() {
        if ($this->blnManiTran) {
            QApplication::Redirect(__SIST__.'/manifiestos_list.php');
        } else {
            if ($_SESSION['PagiBack']) {
                $strPagiReto = $_SESSION['PagiBack'];
            } else {
                $objUltiAcce = PilaAcceso::Pop('D');
                $strPagiReto = $objUltiAcce->__toString();
            }
            QApplication::Redirect(__SIST__."/".$strPagiReto);
        }
    }


    protected function btnSave_Click() {
        $strNombProc = 'Transferir Manifiesto: '.$this->objManiProc->Referencia;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        $this->mensaje();

        //t('========================');
        //t('Transfiriendo Manifiesto');
        $strTextMens = $this->objManiProc->TransferirHistorico($this->objProcEjec);
        $arrErroProc = DetalleError::LoadArrayByProcesoId($this->objProcEjec->Id);
        $intCantErro = count($arrErroProc);
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        $strMensErro = '';
        if ($intCantErro > 0) {
            $strMensErro  = 'El proceso culmino con '.$intCantErro.' error(es).';
            $strMensErro .= ' Presione el boton de errores para mas detalles.';
            $this->btnErroProc->Visible = true;
            $this->blnManiTran = false;
        } else {
            $this->objManiProc->Delete();
            $arrLogxCamb['strNombTabl'] = 'NotaEntrega';
            $arrLogxCamb['intRefeRegi'] = $this->objManiProc->Id;
            $arrLogxCamb['strNombRegi'] = $this->objManiProc->Referencia;
            $arrLogxCamb['strDescCamb'] = "Transferido a Historico y Borrado posteriormente";
            LogDeCambios($arrLogxCamb);
            $this->blnManiTran = true;
        }
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal      = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario     = $strTextMens;
        $this->objProcEjec->NotificarAdmin = true;
        $this->objProcEjec->Save();

        if ($intCantErro == 0) {
            $this->success($strTextMens);
        } else {
            $this->danger($strMensErro);
        }
    }
}

TransferirHistorico::Run('TransferirHistorico');
?>