<?php
//-----------------------------------------------------------------------------
// Programa      : recepcion_nde.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 02/04/2021
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RecepcionNde extends FormularioBaseKaizen {
    protected $objDataBase;

    protected $lstClieCorp;  // Clientes Corporativos
    protected $lstNotaEntr;  // Notas de Entrega
    protected $txtNumePiez;  // Piezas Recibidas
    protected $dtgPiezNota;  // Piezas asociadas a la Nota de Entrega
    protected $chkInclReci;  // Permite incluir Manif Recibidos con Faltantes

    protected $intCantNore;
    protected $strCadeSqlx;
    protected $blnExisCont;
    protected $btnRepoDisc;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Recibir Manifiesto';

        $this->lstClieCorp_Create();

        $this->lstNotaEntr_Create();
        $this->chkInclReci_Create();
        $this->txtNumePiez_Create();
        $this->dtgPiezNota_Create();
        //$this->btnRepoDisc_Create();

        $this->cargarClientesCorp();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function lstClieCorp_Create() {
        $this->lstClieCorp = new QListBox($this);
        $this->lstClieCorp->Name = QApplication::Translate('Cliente CORP');
        $this->lstClieCorp->Width = 280;
        $this->lstClieCorp->AddItem('- Seleccione Uno -',null);
        $this->lstClieCorp->AddAction(new QChangeEvent(), new QAjaxAction('lstClieCorp_Change'));
    }

    protected function chkInclReci_Create() {
        $this->chkInclReci = new QCheckBox($this);
        $this->chkInclReci->Name = 'Incluir Recibidos con Faltantes ?';
        $this->chkInclReci->AddAction(new QChangeEvent(), new QAjaxAction('chkInclReci_Change'));
    }

    protected function lstNotaEntr_Create() {
        $this->lstNotaEntr = new QListBox($this);
        $this->lstNotaEntr->Name = QApplication::Translate('Manfiesto');
        $this->lstNotaEntr->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstNotaEntr->Width = 280;
        $this->lstNotaEntr->AddAction(new QChangeEvent(), new QAjaxAction('lstNotaEntr_Change'));
    }

    protected function txtNumePiez_Create() {
        $this->txtNumePiez = new QTextBox($this);
        $this->txtNumePiez->Name = QApplication::Translate('Piezas');
        $this->txtNumePiez->TextMode = QTextMode::MultiLine;
        $this->txtNumePiez->Rows = 20;
        $this->txtNumePiez->Width = 280;
        $this->txtNumePiez->Height = 240;
    }

    protected function dtgPiezNota_Create() {
        $this->dtgPiezNota = new QDataGrid($this);
        $this->dtgPiezNota->FontSize = 12;
        $this->dtgPiezNota->ShowFilter = false;

        $this->dtgPiezNota->CssClass = 'datagrid';
        $this->dtgPiezNota->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezNota->UseAjax = true;

        $this->dtgPiezNota->SetDataBinder('dtgPiezNota_Bind');

        $this->dtgPiezNotaColumns();
    }

    protected function dtgPiezNota_Bind() {
        $arrPiezNore = [];
        $this->intCantNore = 0;
        if (!is_null($this->lstNotaEntr->SelectedValue)) {
            $intNotaEntr   = $this->lstNotaEntr->SelectedValue;
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaPiezas()->Guia->NotaEntregaId,$intNotaEntr);
            $arrPiezNota   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
            $arrPiezNore   = [];
            foreach ($arrPiezNota as $objPiezNota) {
                if (!$objPiezNota->tieneCheckpoint('RA')) {
                    $arrPiezNore[] = $objPiezNota;
                    $this->intCantNore ++;
                }
            }
        }
        $this->dtgPiezNota->DataSource = $arrPiezNore;
    }

    protected function dtgPiezNotaColumns() {
        $colPiezIdxx = new QDataGridColumn($this);
        $colPiezIdxx->Name = QApplication::Translate('IdPieza');
        $colPiezIdxx->Html = '<?= $_ITEM->IdPieza ?>';
        $colPiezIdxx->Width = 160;
        $this->dtgPiezNota->AddColumn($colPiezIdxx);

        $colPiezGuia = new QDataGridColumn($this);
        $colPiezGuia->Name = QApplication::Translate('Guia');
        $colPiezGuia->Html = '<?= $_ITEM->Guia->Tracking ?>';
        $colPiezGuia->Width = 150;
        $this->dtgPiezNota->AddColumn($colPiezGuia);

        $colLibrPiez = new QDataGridColumn($this);
        $colLibrPiez->Name = QApplication::Translate('Kilos');
        $colLibrPiez->Html = '<?= $_ITEM->Kilos ?>';
        $colLibrPiez->Width = 80;
        $this->dtgPiezNota->AddColumn($colLibrPiez);

        $colPiesPiez = new QDataGridColumn($this);
        $colPiesPiez->Name = QApplication::Translate('PiesCub');
        $colPiesPiez->Html = '<?= $_ITEM->PiesCub ?>';
        $colPiesPiez->Width = 80;
        $this->dtgPiezNota->AddColumn($colPiesPiez);


    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    public function chkInclReci_Change() {
        $this->lstClieCorp_Change(null,null,$this->chkInclReci->Checked);
    }

    public function lstNotaEntr_Change() {
        $this->dtgPiezNota->Refresh();
    }

    protected function cargarClientesCorp() {
        $this->lstClieCorp->RemoveAllItems();
        //-------------------------------------------------------------------
        // Se seleccionan los Clientes que tenga Notas de Entrega "CREAD@"
        //-------------------------------------------------------------------
        $objSeleColu   = QQ::Select(QQN::NotaEntrega()->ClienteCorpId);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::NotaEntrega()->Estatus,['CREAD@','RECIBID@']);
        $arrClieInic   = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher),QQ::Clause($objSeleColu,QQ::Distinct()));

        $arrClieCorp   = [];
        foreach ($arrClieInic as $objClieInic) {
            $arrClieCorp[] = $objClieInic->ClienteCorpId;
        }

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::MasterCliente()->CodiClie,$arrClieCorp);
        $arrClieNota   = MasterCliente::QueryArray(QQ::AndCondition($objClauWher));
        $intCantClie   = count($arrClieNota);
        $this->lstClieCorp->AddItem('- Seleccione Uno - ('.$intCantClie.')');
        foreach ($arrClieNota as $objClieNota) {
            $this->lstClieCorp->AddItem($objClieNota->__toString(),$objClieNota->CodiClie);
        }
        $this->lstClieCorp->Width = 280;
    }

    protected function lstClieCorp_Change($strFormId, $strControlId, $strParameter=false) {
        //----------------------------------------------------------
        // Se cargan las notas de entrega del Cliente seleccionado
        //----------------------------------------------------------
        $this->lstNotaEntr->RemoveAllItems();
        $intClieSele   = $this->lstClieCorp->SelectedValue;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->ClienteCorpId,$intClieSele);
        $objClauWher[] = QQ::In(QQN::NotaEntrega()->Estatus,['CREAD@','RECIBID@']);
        $arrNotaClie   = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
        if ($strParameter) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->ClienteCorpId,$intClieSele);
            $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->Estatus,'RECIBID@');
            $objClauWher[] = QQ::NotEqual(QQN::NotaEntrega()->Cargadas,QQN::NotaEntrega()->Recibidas);
            $arrNotaReci   = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
            foreach ($arrNotaReci as $objNotaReci) {
                $arrNotaClie[] = $objNotaReci;
            }
        }
        $intNotaClie   = count($arrNotaClie);
        $this->lstNotaEntr->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intNotaClie.')'),null);
        foreach ($arrNotaClie as $objNotaClie) {
            $this->lstNotaEntr->AddItem($objNotaClie->Referencia,$objNotaClie->Id);
        }
        $this->lstNotaEntr->Width = 280;
    }


    protected function Form_Validate() {
        $this->mensaje();
        if (is_null($this->lstClieCorp->SelectedValue)){
            $this->danger('Debe seleccionar un Cliente');
            return false;
        }
        if (is_null($this->lstNotaEntr->SelectedValue)) {
            $this->danger('Debe seleccionar un Manifiesto');
            return false;
        }
        if (strlen($this->txtNumePiez->Text) == 0) {
            $this->danger('Debe especificar las Guias/Piezas que esta recibiendo');
            return false;
        }
        return true;
    }


    protected function btnSave_Click() {
        $objNotaEntr = NotaEntrega::Load($this->lstNotaEntr->SelectedValue);
        $arrPiezNota = $objNotaEntr->piezasDeLaNota();
        t('El Manif tiene: '.count($arrPiezNota).' piezas');
        $arrIdxxPiez = [];
        foreach ($arrPiezNota as $objPiezNota) {
            $arrIdxxPiez[] = $objPiezNota->Id;
        }
        $arrNumePiez = explode(',',nl2br2($this->txtNumePiez->Text));
        //-------------------------------------------------------------------------------------
        // Con "array_unique" se eliminan las guías/piezas repetidas en caso de que las haya
        //-------------------------------------------------------------------------------------
        $arrNumePiez = array_unique($arrNumePiez);
        $arrNumePiez = array_map('transformar',$arrNumePiez);

        $this->txtNumePiez->Text = '';
        $objCkptRece = Checkpoints::LoadByCodigo('RA');
        $intContCkpt = 0;
        $arrRelaSobr = [];
        if (strlen($objNotaEntr->RelacionSobrantes) > 0) {
            $arrRelaSobr = explode(',',$objNotaEntr->RelacionSobrantes);
        }
        $intCantSobr = count($arrRelaSobr);
        t('Iniciando el proceso, hay: '.$intCantSobr.' sobrantes');
        foreach ($arrNumePiez as $strPiezArri) {
            t("Procesando: ".$strPiezArri);
            if (strlen($strPiezArri) > 0) {
                $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strPiezArri);
                if ($objGuiaPiez) {
                    t('La pieza existe en la BD');
                    //------------------------------------------------
                    // Se verifica que la pieza corresponda a la nde
                    //------------------------------------------------
                    t('Voy a buscar '.$objGuiaPiez->Id.' en el vector');
                    if (!in_array($objGuiaPiez->Id,$arrIdxxPiez)) {
                        $intCantSobr++;
                        $arrRelaSobr[] = $objGuiaPiez->IdPieza;
                        $this->txtNumePiez->Text = $objGuiaPiez->IdPieza.' (SOB)'. chr(13);
                        t('La pieza existe, pero no pertenece al manifiesto, es un sobrante');
                        continue;
                    }
                    t('La pieza si pertenece a la nde');
                    //----------------------------------------------------------
                    // Se registra el checkpoint correspondiente para la pieza
                    //----------------------------------------------------------
                    $arrDatoCkpt = array();
                    $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
                    $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
                    $arrDatoCkpt['CodiCkpt'] = $objCkptRece->Id;
                    $arrDatoCkpt['TextCkpt'] = $objCkptRece->Descripcion;
                    $arrDatoCkpt['CodiRuta'] = '';
                    $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                    if ($arrResuGrab['TodoOkey']) {
                        $intContCkpt++;
                        t("Ya grabe el checkpoint para la pieza. Van: " . $intContCkpt . " checkpoints grabados");
                    } else {
                        $strMensUsua = QApplication::Translate("Error al registrar checkpoint a la pieza: " . $objGuiaPiez->IdPieza);
                        $strMensUsua .= " - " . $arrResuGrab['MotiNook'];
                        t($strMensUsua);
                        $this->danger($strMensUsua);
                    }
                } else {
                    $intCantSobr ++;
                    $arrRelaSobr[] = $strPiezArri;
                    $this->txtNumePiez->Text = $strPiezArri.' (SOB)'. chr(13);
                    t('La pieza no existe, es un sobrante');
                }
            }
        }
        $intCantPick  = $objNotaEntr->contarCheckpoint($objCkptRece->Codigo);
        $strRelaSobr  = '';
        if (count($arrRelaSobr) > 0) {
            $strRelaSobr = implode(',',$arrRelaSobr);
            t('Hay sobrandes: '.$strRelaSobr);
        }
        //------------------------------------------------------------------------
        // Se actualiza el estatus y los contadores del Manifiesto
        //------------------------------------------------------------------------
        $objNotaEntr->Estatus           = 'RECIBID@';
        $objNotaEntr->Recibidas         = $intCantPick;
        $objNotaEntr->Sobrantes         = $intCantSobr;
        $objNotaEntr->RelacionSobrantes = $strRelaSobr;
        $objNotaEntr->Save();
        //-----------------
        // Log de cambios
        //-----------------
        $strTextMens = "Total Recibidas: $intCantPick | Recibidas en este momento: $intContCkpt | Total Sobrantes: $intCantSobr";
        $arrLogxCamb['strNombTabl'] = 'Guia';
        $arrLogxCamb['intRefeRegi'] = $objNotaEntr->Id;
        $arrLogxCamb['strNombRegi'] = $objNotaEntr->Referencia;
        $arrLogxCamb['strDescCamb'] = $strTextMens;
        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/nota_entrega.php/'.$objNotaEntr->Id;
        LogDeCambios($arrLogxCamb);

        $this->success($strTextMens);
        $this->dtgPiezNota->Refresh();
    }
}

RecepcionNde::Run('RecepcionNde');
?>