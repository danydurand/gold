<?php
//---------------------------------------------------------------------------------------------------------
// Programa       : simular_impresion.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 04/08/16 11:33 AM
// Proyecto       : newliberty
// Descripcion    : Este programa simula la emisión de una factura o nota de crédito, asignando a la misma
//                  una data fiscal ficticia
//---------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class SimularImpresion extends FormularioBaseKaizen {
    protected $rdbTipoDocu;
    protected $txtNumeDocu;
    protected $txtDocuFisc;
    protected $txtMaquFisc;
    protected $txtFechImpr;
    protected $txtHoraImpr;

    protected $strTipoDocu = null;
    protected $strNumeDocu = null;

    protected function SetupValores() {
        $this->strTipoDocu = QApplication::PathInfo(0);
        $this->strNumeDocu = QApplication::PathInfo(1);
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->lblTituForm->Text = 'Capturar Datos Fiscales';

        $this->rdbTipoDocu_Create();
        $this->txtNumeDocu_Create();
        $this->txtDocuFisc_Create();
        $this->txtMaquFisc_Create();
        $this->txtFechImpr_Create();
        $this->txtHoraImpr_Create();

        $this->btnSave->Text = TextoIcono('cogs','Guardar','F','lg');
    }

    //-----------------------------
    // Construcción de los objetos
    //-----------------------------

    protected function rdbTipoDocu_Create() {
        $this->rdbTipoDocu = new QRadioButtonList($this);
        $this->rdbTipoDocu->Name = QApplication::Translate('Tipo Documento');
        $this->rdbTipoDocu->AddItem('&nbsp;Factura&nbsp;','F');
        $this->rdbTipoDocu->AddItem('&nbsp;Nota de Crédito','N');
        $this->rdbTipoDocu->HtmlEntities = false;
        $this->rdbTipoDocu->Required = true;
        $this->rdbTipoDocu->RepeatColumns = 2;
        $this->rdbTipoDocu->AddAction(new QChangeEvent(), new QAjaxAction('rdbTipoDocu_Change'));
        if (strlen($this->strTipoDocu)) {
            if ($this->strTipoDocu == 'F') {
                $this->rdbTipoDocu->SelectedIndex = 0;
            } else {
                $this->rdbTipoDocu->SelectedIndex = 1;
            }
            $this->rdbTipoDocu->Enabled = false;
            $this->rdbTipoDocu->ForeColor = 'blue';
        }
    }

    protected function txtNumeDocu_Create() {
        $this->txtNumeDocu = new QIntegerTextBox($this);
        $this->txtNumeDocu->Name = 'Id Documento';
        $this->txtNumeDocu->Width = 60;
        $this->txtNumeDocu->Required = true;
        if (strlen($this->strNumeDocu)) {
            $this->txtNumeDocu->Text = $this->strNumeDocu;
            $this->txtNumeDocu->Enabled = false;
            $this->txtNumeDocu->ForeColor = 'blue';
        }
    }

    protected function txtDocuFisc_Create() {
        $this->txtDocuFisc = new QIntegerTextBox($this);
        $this->txtDocuFisc->Name = 'Doc. Fiscal';
        $this->txtDocuFisc->Width = 100;
        $this->txtDocuFisc->Required = true;
    }

    protected function txtMaquFisc_Create() {
        $this->txtMaquFisc = new QTextBox($this);
        $this->txtMaquFisc->Name = 'Maquina Fiscal';
        $this->txtMaquFisc->Width = 100;
        $this->txtMaquFisc->Required = true;
    }

    protected function txtFechImpr_Create() {
        $this->txtFechImpr = new QTextBox($this);
        $this->txtFechImpr->Name = 'Fecha Impresion';
        $this->txtFechImpr->Text = date('ymd');
        $this->txtFechImpr->Width = 100;
        $this->txtFechImpr->Required = true;
        $this->txtFechImpr->ToolTip = 'Fecha en que se imprimió la Factura (p/ el Cuadre de Caja)';
        $this->txtFechImpr->HtmlAfter = '(YYMMDD) Ej: '.date('ymd');
        if (strlen($this->strNumeDocu)) {
            if (strlen($this->strNumeDocu)) {
                if ($this->strTipoDocu == 'F') {
                    $objFactPmnx = FacturaPmn::Load($this->strNumeDocu);
                    if ($objFactPmnx) {
                        $this->txtFechImpr->Text = $objFactPmnx->CreadaEl->__toString('YYMMDD');
                        $this->txtFechImpr->Enabled = false;
                        $this->txtFechImpr->ForeColor = 'blue';
                    }
                } else {
                    $objNotaCred = NotaCredito::Load($this->strNumeDocu);
                    if ($objNotaCred) {
                        $this->txtFechImpr->Text = $objNotaCred->CreadaEl->__toString('YYMMDD');
                        $this->txtFechImpr->Enabled = false;
                        $this->txtFechImpr->ForeColor = 'blue';
                    }
                }
            }
        }
    }

    protected function txtHoraImpr_Create() {
        $this->txtHoraImpr = new QTextBox($this);
        $this->txtHoraImpr->Name = 'Hora Impresion';
        $this->txtHoraImpr->Text = date('His');
        $this->txtHoraImpr->Width = 100;
        $this->txtHoraImpr->Required = true;
        $this->txtHoraImpr->ToolTip = 'Hora en que se imprimió la Factura';
        $this->txtHoraImpr->HtmlAfter = ' (HHMMSS) Ej: '.date('His');
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function rdbTipoDocu_Change() {
        $this->mensaje();
        /*
        $strCadeSqlx  = 'select numero + 1 as nume_fisc, ';
   		$strCadeSqlx .= '       maquina_fiscal as maqu_fisc ';
        $strCadeSqlx .= '  from nota_credito ';
        $strCadeSqlx .= ' where numero = (select max(numero) ';
        $strCadeSqlx .= '                   from nota_credito ';
        $strCadeSqlx .= '                  where length(numero) > 1)';
        $objDataBase  = NotaCredito::GetDatabase();
        $objDbResult  = $objDataBase->Query($strCadeSqlx);
        $mixRegistro  = $objDbResult->FetchArray();
        if ($mixRegistro) {
            $this->txtDocuFisc->Text = '00'.$mixRegistro['nume_fisc'];
            $this->txtMaquFisc->Text = $mixRegistro['maqu_fisc'] ? $mixRegistro['maqu_fisc'] : 'EOB0019164';
        } else {
            $this->txtDocuFisc->Text = '0010000';
            $this->txtMaquFisc->Text = 'EOB0019164';
        }
        */
        $this->txtNumeDocu->Text = '';
        $this->txtFechImpr->Text = date('ymd');
        $this->txtHoraImpr->Text = date('His');
    }

    protected function Form_Validate() {
        if (is_null($this->rdbTipoDocu->SelectedValue)) {
            $this->mensaje('Seleccione el Tipo de Documento','','d','',__iHAND__);
            return false;
        }
        if (strlen(trim($this->txtNumeDocu->Text)) == 0) {
            $this->mensaje('El Id del Documento es requerido','','d','',__iHAND__);
            return false;
        }
        if (strlen(trim($this->txtDocuFisc->Text)) == 0) {
            $this->mensaje('El Nro Documento Fiscal es requerido','','d','',__iHAND__);
            return false;
        }
        if (strlen(trim($this->txtMaquFisc->Text)) == 0) {
            $this->mensaje('El Id de la Máquina Fiscal es requerido','','d','',__iHAND__);
            return false;
        }
        if (strlen(trim($this->txtFechImpr->Text)) == 0) {
            $this->mensaje('La Fecha de Impresion es requerida','','d','',__iHAND__);
            return false;
        }
        if (strlen(trim($this->txtHoraImpr->Text)) == 0) {
            $this->mensaje('La Hora de Impresion es requerida','','d','',__iHAND__);
            return false;
        }
        if ($this->rdbTipoDocu->SelectedValue == 'F') {
            $objFactPmnx = FacturaPmn::Load($this->txtNumeDocu->Text);
            if (!$objFactPmnx) {
                $this->mensaje('El Documento Fiscal, no Existe','','d','',__iHAND__);
                return false;
            }
            if ($objFactPmnx->ImpresaId == SinoType::SI) {
                $this->mensaje('La Factura ya posee datos Fiscales','','d','',__iHAND__);
                return false;
            }
            if ($objFactPmnx->MontoCobrado == 0 && !$objFactPmnx->GuiaCODdelSDE()) {
                if ($objFactPmnx->TieneRetencion == SinoType::NO) {
                    $this->mensaje('Factura Sin Retencion, Pendiente de Pago','','d','',__iHAND__);
                    return false;
                }
            }
            if ($objFactPmnx->MontoCobrado != $objFactPmnx->MontoTotal) {
                if ($objFactPmnx->MontoCobrado == null && $objFactPmnx->GuiaCODdelSDE()){
                    return true;
                } else {
                    if (strlen($this->strTipoDocu)) {
                        if (!$objFactPmnx->TieneRetencion) {
                            $this->mensaje('Factura Pendiente de Pago','','d','',__iHAND__);
                            return false;
                        }
                    } else {
                        $this->mensaje('Factura Pendiente de Pago','','d','',__iHAND__);
                        return false;
                    }
                }
            }
        }
        if ($this->rdbTipoDocu->SelectedValue == 'N') {
            $objNotaCred = NotaCredito::Load($this->txtNumeDocu->Text);
            if ($objNotaCred) {
                $this->mensaje('El Documento Fiscal, no Existe','','d','',__iHAND__);
                return false;
            }
            if ($objNotaCred->ImpresaId == SinoType::SI) {
                $this->mensaje('La NDC ya tiene Datos Fiscales','','d','',__iHAND__);
                return false;
            }
        }
        $intAnioFech = substr($this->txtFechImpr->Text,0,2);
        $intAnioActu = date('y');
        $intAnioPasa = $intAnioActu - 1;
        if (($intAnioFech != $intAnioActu) && ($intAnioFech != $intAnioPasa)) {
            $this->mensaje('El Año de la Fecha de Impresión es incorrecto','','d','',__iHAND__);
            return false;
        }
        $intMesxFech = substr($this->txtFechImpr->Text,2,2);
        $intMesxActu = date('m');
        $intMesxPasa = $intMesxActu - 1;
        if (($intMesxFech != $intMesxActu) && ($intMesxFech != $intMesxPasa)) {
            $this->mensaje('El Mes de la Fecha de Impresión es incorrecto','','d','',__iHAND__);
            return false;
        }
        $intDiaxFech = substr($this->txtFechImpr->Text,4,2);
        $intDiaxActu = date('d');
        $intDiaxPasa = $intDiaxActu - 1;
        if (($intDiaxFech != $intDiaxActu) && ($intDiaxFech != $intDiaxPasa)) {
            $this->mensaje('El Dia de la Fecha de Impresión es incorrecto','','d','',__iHAND__);
            return false;
        }

        return true;
    }

    protected function btnSave_Click() {
        if ($this->rdbTipoDocu->SelectedValue == 'F') {

            $blnValiDocu = BuscarParametro('ValiDocu','DocuRepe','Val1',1);
            if ($blnValiDocu) {
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::FacturaPmn()->Numero,$this->txtDocuFisc->Text);
                $objClauWher[] = QQ::Equal(QQN::FacturaPmn()->MaquinaFiscal,$this->txtMaquFisc->Text);
                $objClauWher[] = QQ::NotEqual(QQN::FacturaPmn()->Id,$this->txtNumeDocu->Text);
                $intDocuExis   = FacturaPmn::QueryCount(QQ::AndCondition($objClauWher));
                if ($intDocuExis > 0) {
                    $strTextMens = 'Documento Fiscal repetido.  Por favor revise los datos';
                    $this->mensaje($strTextMens,'','d','',__iHAND__);
                    return;
                }
            }
            $objFactPmnx = FacturaPmn::Load($this->txtNumeDocu->Text);
            $objFactPmnx->Numero         = $this->txtDocuFisc->Text;
            $objFactPmnx->MaquinaFiscal  = $this->txtMaquFisc->Text;
            $objFactPmnx->FechaImpresion = $this->txtFechImpr->Text;
            $objFactPmnx->HoraImpresion  = $this->txtHoraImpr->Text;
            $objFactPmnx->ImpresaId      = SinoType::SI;
            $objFactPmnx->Save();
            //-----------------------------------------------------
            // Se deja registro en el historico de transacciones
            //-----------------------------------------------------
            $strTextExtr = '';
            if (strlen($this->strTipoDocu) > 0) {
                $strTextExtr = ' (SDF)';
            }
            $strTextMens = $this->objUsuario->LogiUsua.' completo los datos fiscales'.$strTextExtr.'. FAC: '.
                $this->txtDocuFisc->Text.' Maq Fiscal: '.$this->txtMaquFisc->Text.' F.Impr: '.
                $this->txtFechImpr->Text.' H.Impr: '.$this->txtHoraImpr->Text;
            $arrLogxCamb['strNombTabl'] = 'FacturaPmn';
            $arrLogxCamb['intRefeRegi'] = $objFactPmnx->Id;
            $arrLogxCamb['strNombRegi'] = $objFactPmnx->Numero;
            $arrLogxCamb['strDescCamb'] = $strTextMens;
            LogDeCambios($arrLogxCamb);

            $this->mensaje('Transacción Exitosa !','','s','',__iCHEC__);
            $this->blanquearCampos();
        }
        if ($this->rdbTipoDocu->SelectedValue == 'N') {

            $blnValiDocu = BuscarParametro('ValiDocu','DocuRepe','Val1',1);
            if ($blnValiDocu) {
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::NotaCredito()->Numero,$this->txtDocuFisc->Text);
                $objClauWher[] = QQ::Equal(QQN::NotaCredito()->MaquinaFiscal,$this->txtMaquFisc->Text);
                $objClauWher[] = QQ::NotEqual(QQN::NotaCredito()->Id,$this->txtNumeDocu->Text);
                $intDocuExis   = NotaCredito::QueryCount(QQ::AndCondition($objClauWher));
                if ($intDocuExis > 0) {
                    $strTextMens = 'Documento Fiscal repetido.  Por favor revise los datos';
                    $this->mensaje($strTextMens,'','d','',__iHAND__);
                    return;
                }
            }
            $objNotaCred = NotaCredito::Load($this->txtNumeDocu->Text);
            $objNotaCred->Numero         = $this->txtDocuFisc->Text;
            $objNotaCred->MaquinaFiscal  = $this->txtMaquFisc->Text;
            $objNotaCred->FechaImpresion = $this->txtFechImpr->Text;
            $objNotaCred->HoraImpresion  = $this->txtHoraImpr->Text;
            $objNotaCred->ImpresaId      = SinoType::SI;
            $objNotaCred->Save();
            //-----------------------------------------------------
            // Se deja registro en el historico de transacciones
            //-----------------------------------------------------
            $strTextExtr = '';
            if (strlen($this->strTipoDocu) > 0) {
                $strTextExtr = ' (SDF)';
            }
            $strTextMens = $this->objUsuario->LogiUsua.' completo los datos fiscales'.$strTextExtr.'. NDC: '.
                $this->txtDocuFisc->Text.' Maq Fiscal: '.$this->txtMaquFisc->Text.' F.Impr: '.
                $this->txtFechImpr->Text.' H.Impr: '.$this->txtHoraImpr->Text;
            $arrLogxCamb['strNombTabl'] = 'NotaCredito';
            $arrLogxCamb['intRefeRegi'] = $objNotaCred->Id;
            $arrLogxCamb['strNombRegi'] = $objNotaCred->Numero;
            $arrLogxCamb['strDescCamb'] = $strTextMens;
            LogDeCambios($arrLogxCamb);

            $objFactPmnx = FacturaPmn::Load($objNotaCred->FacturaId);
            //-----------------------
            // Se Anula la Factura
            //-----------------------
            $arrParaAnul['MotiAnul'] = $objNotaCred->Concepto;
            $arrParaAnul['UsuaAnul'] = $this->objUsuario->CodiUsua;
            $objFactPmnx->AnularFactura($arrParaAnul);

            //-----------------------------------------------------
            // Se deja registro en el historico de transacciones
            //-----------------------------------------------------
            $strTextMens = 'El Usuario: '.$this->objUsuario->LogiUsua.' Anuló la Factura: '.
                $objNotaCred->Factura->Numero;
            $arrLogxCamb['strNombTabl'] = 'FacturaPmn';
            $arrLogxCamb['intRefeRegi'] = $objNotaCred->Factura->Id;
            $arrLogxCamb['strNombRegi'] = $objNotaCred->Factura->Numero;
            $arrLogxCamb['strDescCamb'] = $strTextMens;
            LogDeCambios($arrLogxCamb);

            $this->mensaje('Transacción Exitosa !','','s','',__iCHEC__);
            $this->blanquearCampos();
        }
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltiAcce->__toString());
        //QApplication::Redirect(__SIST__.'/'.$objUltiAcce->__toString());
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------

    protected function blanquearCampos() {
        $this->rdbTipoDocu->SelectedValue = null;
        $this->txtNumeDocu->Text = '';
        $this->txtDocuFisc->Text = '';
        $this->txtMaquFisc->Text = '';
    }
}

SimularImpresion::Run('SimularImpresion');
