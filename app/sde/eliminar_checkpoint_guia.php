<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class EliminarCkptGuia extends FormularioBaseKaizen {
    protected $txtNumeGuia;
    protected $lstChecBoxs;
    protected $blnTienPerm;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Eliminar Checkpoint(s)');

        $this->blnTienPerm = BuscarParametro("ElimCkpt", $this->objUsuario->LogiUsua, "Val1", 0);
        if ($this->objUsuario->LogiUsua == 'ddurand') {
            $this->mensaje('Parametro: ElimCkpt','n','i','',__iINFO__);
        }

        $this->txtNumeGuia_Create();
        $this->lstChecBoxs_Create();

        if ($this->blnTienPerm == 1) {
            $this->btnSave->Visible = true;
        } else {
            $this->btnSave->Visible = false;
        }
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate('Guía/Pieza');
        $this->txtNumeGuia->Required = true;
        $this->txtNumeGuia->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeGuia_Blur'));
    }

    protected function lstChecBoxs_Create(){
        $this->lstChecBoxs = new QListBox($this);
        $this->lstChecBoxs->Name = QApplication::Translate('Lista de Checkpoints');
        $this->lstChecBoxs->SelectionMode = QSelectionMode::Multiple;
        $this->lstChecBoxs->Rows = 10;
        $this->lstChecBoxs->Required = true;
        $this->lstChecBoxs->Width = 500;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function txtNumeGuia_Blur() {
        if (strlen($this->txtNumeGuia->Text)) {
            $this->txtNumeGuia->Text = transformar($this->txtNumeGuia->Text);
            $this->lstChecBoxs->RemoveAllItems();
            $this->lstChecBoxs->Width = 550;
            $blnTodoPais   = BuscarParametro("TodoPais", $this->objUsuario->LogiUsua, "Val1", 0);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $this->txtNumeGuia->Text);
            if (!$blnTodoPais) {
                $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $this->objUsuario->CodiEsta);
            }
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt,false);
            $objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->HoraCkpt,false);
            $arrCkptGuia   = GuiaCkpt::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
            foreach ($arrCkptGuia as $objGuiaCkpt) {
                $strPartVisi = $objGuiaCkpt->CodiCkpt.' - '.$objGuiaCkpt->CodiEsta.' - '.$objGuiaCkpt->FechCkpt->__toString('YYYY-MM-DD').' - '.$objGuiaCkpt->HoraCkpt.' - '.substr($objGuiaCkpt->TextObse,0,36);
                $strPartInvi = $objGuiaCkpt->NumeGuia.','.$objGuiaCkpt->CodiEsta.','.$objGuiaCkpt->CodiCkpt.','.$objGuiaCkpt->FechCkpt->__toString('YYYY-MM-DD').','.$objGuiaCkpt->HoraCkpt.','.$objGuiaCkpt->TextObse.','.$objGuiaCkpt->CodiRuta.','.$objGuiaCkpt->CodiUsua;
                $this->lstChecBoxs->AddItem($strPartVisi, $strPartInvi);
            }
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $arrClavRegi = $this->lstChecBoxs->SelectedValues;
        $objDatabase = Guia::GetDatabase();
        $strNombProc = 'Eliminando Checkpoints de Guias';
        $objProcEjec = CrearProceso($strNombProc);
        $intCantErro = 0;
        $blnTodoOkey = true;
        $mixErroOrig = error_reporting();
        error_reporting(0);
        foreach ($arrClavRegi as $strCkptDelt) {
            $arrCkptDelt = explode(',',$strCkptDelt);
            $strNumeGuia = $arrCkptDelt[0];
            $strCodiEsta = $arrCkptDelt[1];
            $strCodiCkpt = $arrCkptDelt[2];
            $strFechCkpt = $arrCkptDelt[3];
            $strHoraCkpt = $arrCkptDelt[4];
            $strTextObse = $arrCkptDelt[5];
            $strCodiRuta = $arrCkptDelt[6];
            $strCodiUsua = $arrCkptDelt[7];

            $strRegiTrab = $strNumeGuia.' | '.$strCodiEsta.' | '.$strCodiCkpt.' | '.$strFechCkpt.' | '.$strHoraCkpt.' | '.$strTextObse.' | '.$strCodiRuta.' | '.$strCodiUsua;

            $strCadeSqlx  = "delete ";
            $strCadeSqlx .= "  from guia_ckpt ";
            $strCadeSqlx .= " where nume_guia = '$strNumeGuia'";
            $strCadeSqlx .= "   and codi_esta = '$strCodiEsta'";
            $strCadeSqlx .= "   and codi_ckpt = '$strCodiCkpt'";
            $strCadeSqlx .= "   and fech_ckpt = '$strFechCkpt'";
            $strCadeSqlx .= "   and hora_ckpt = '$strHoraCkpt'";

            try {
                $objDatabase->NonQuery($strCadeSqlx);
            } catch (Exception $e) {
                $this->mensaje($e->getMessage(),'m','d','',__iHAND__);
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = 'Guia: '.$strNumeGuia;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Falló la eliminación del Checkpoint ('.$strCodiCkpt.')';
                GrabarError($arrParaErro);
                $intCantErro ++;
                $blnTodoOkey = false;
            }
            if ($blnTodoOkey) {
                if ($strCodiCkpt == 'OK'){
                    $strCadeSqlx  = "update guia ";
                    $strCadeSqlx .= "   set entregado_a = null, ";
                    $strCadeSqlx .= "       fecha_entrega = null, ";
                    $strCadeSqlx .= "       hora_entrega = null ";
                    $strCadeSqlx .= " where nume_guia = '$strNumeGuia'";

                    try {
                        $objDatabase->NonQuery($strCadeSqlx);
                    } catch (Exception $e) {
                        $this->mensaje($e->getMessage(),'m','d','',__iHAND__);
                        $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = 'Guia: '.$strNumeGuia;
                        $arrParaErro['MensErro'] = $e->getMessage();
                        $arrParaErro['ComeErro'] = 'Falló la eliminación de la información del POD';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $blnTodoOkey = false;
                    }
                }
                if ($blnTodoOkey) {
                    //----------------------------------------------------------------------------------------
                    // En el Registro de Trabajo, debe quedar constancia de los cambios ocurridos a la Guia
                    //----------------------------------------------------------------------------------------
                    $arrParaRegi['CodiCkpt'] = 'EC';
                    $arrParaRegi['TextMens'] = 'ELIMINO CHECKPOINT: '.$strRegiTrab;
                    $arrParaRegi['NumeGuia'] = $strNumeGuia;
                    $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                    $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
                    CrearRegistroDeTrabajo($arrParaRegi);
                    $this->mensaje('Transacción Exitosa !','m','s','',__iCHEC__);
                }
            }
        }
        $this->txtNumeGuia_Blur();
        error_reporting($mixErroOrig);
    }
}
EliminarCkptGuia::Run('EliminarCkptGuia');
?>