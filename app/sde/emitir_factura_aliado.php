<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class EmitirFacturaAliado extends FormularioBaseKaizen {

    protected $chkSeleAlia;
    protected $lstCodiClie;
    protected $calFechInic;
    protected $calFechFina;
    protected $chkSeleConc;
    protected $lstConcFact;
    protected $dtgGuiaApta;
    protected $arrGuiaFact = [];
    protected $colGuiaSele;


    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Emitir Factura Aliado');

        t('1');
        $this->chkSeleAlia_Create();
        $this->lstCodiClie_Create();
        t('2');
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        t('3');
        $this->chkSeleConc_Create();
        $this->lstConcFact_Create();
        t('4');
        $this->dtgGuiaApta_Create();

        $this->lstCodiClie = disableControl($this->lstCodiClie);
        $this->lstConcFact = disableControl($this->lstConcFact);
        $this->btnSave->Text = TextoIcono('cogs','Emitir Facturas');

        t('5');
        $this->cargarAliados();
        $this->cargarConceptos();
        t('6');

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function dtgGuiaApta_Create() {
        $this->dtgGuiaApta = new QDataGrid($this);
        $this->dtgGuiaApta->FontSize = 12;
        $this->dtgGuiaApta->ShowFilter = false;

        $this->dtgGuiaApta->CssClass = 'datagrid';
        $this->dtgGuiaApta->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaApta->UseAjax = true;

        $this->dtgGuiaApta->SetDataBinder('dtgGuiaApta_Bind');

        $this->colGuiaSele = new QCheckBoxColumn('', $this->dtgGuiaApta);
        $this->colGuiaSele->PrimaryKey = 'Id';
        $this->colGuiaSele->Width = 40;
        $this->dtgGuiaApta->AddColumn($this->colGuiaSele);

        $this->dtgGuiaAptaColumns();
    }

    protected function dtgGuiaApta_Bind() {
        $this->dtgGuiaApta->DataSource = $this->arrGuiaFact;
    }

    protected function dtgGuiaAptaColumns() {
        $colNombAlia = new QDataGridColumn($this);
        $colNombAlia->Name = QApplication::Translate('Aliado');
        $colNombAlia->Html = '<?= $_ITEM->ClienteCorp->NombClie ?>';
        $colNombAlia->Width = 100;
        $this->dtgGuiaApta->AddColumn($colNombAlia);

        $colNumeGuia = new QDataGridColumn($this);
        $colNumeGuia->Name = QApplication::Translate('Nro-Guia');
        $colNumeGuia->Html = '<?= $_ITEM->Numero ?>';
        $colNumeGuia->Width = 80;
        $this->dtgGuiaApta->AddColumn($colNumeGuia);

        $colTotaGuia = new QDataGridColumn($this);
        $colTotaGuia->Name = QApplication::Translate('Total');
        $colTotaGuia->Html = '<?= $_ITEM->Total ?>';
        $colTotaGuia->Width = 80;
        $this->dtgGuiaApta->AddColumn($colTotaGuia);

        $colFechNota = new QDataGridColumn($this);
        $colFechNota->Name = QApplication::Translate('Fecha');
        $colFechNota->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>';
        $colFechNota->Width = 80;
        $this->dtgGuiaApta->AddColumn($colFechNota);

        $colServExpo = new QDataGridColumn($this);
        $colServExpo->Name = QApplication::Translate('Servicio');
        $colServExpo->Html = '<?= $_ITEM->Producto->Nombre ?>';
        $colServExpo->Width = 75;
        $this->dtgGuiaApta->AddColumn($colServExpo);

        //$colServImpo = new QDataGridColumn($this);
        //$colServImpo->Name = QApplication::Translate('S.Imp.');
        /*$colServImpo->Html = '<?= $_ITEM->ServicioImportacion ?>';*/
        //$colServImpo->Width = 55;
        //$this->dtgGuiaApta->AddColumn($colServImpo);

        //$colPiezCarg = new QDataGridColumn($this);
        //$colPiezCarg->Name = QApplication::Translate('Crgds');
        /*$colPiezCarg->Html = '<?= $_ITEM->Cargadas ?>';*/
        //$colPiezCarg->Width = 55;
        //$this->dtgGuiaApta->AddColumn($colPiezCarg);

        //$colPiezReci = new QDataGridColumn($this);
        //$colPiezReci->Name = QApplication::Translate('Recib.');
        /*$colPiezReci->Html = '<?= $_ITEM->Recibidas ?>';*/
        //$colPiezReci->Width = 55;
        //$this->dtgGuiaApta->AddColumn($colPiezReci);

    }

    protected function chkSeleAlia_Create() {
        $this->chkSeleAlia = new QCheckBox($this);
        $this->chkSeleAlia->Name = 'Selecc Aliado(s) ?';
        $this->chkSeleAlia->Checked = false;
        $this->chkSeleAlia->AddAction(new QChangeEvent(), new QAjaxAction('chkSeleAlia_Change'));
    }

    protected function lstCodiClie_Create() {
        $this->lstCodiClie = new QListBox($this);
        $this->lstCodiClie->Name = QApplication::Translate('Aliados(s) Facturable(s)');
        $this->lstCodiClie->Width = 200;
        $this->lstCodiClie->SelectionMode = QSelectionMode::Multiple;
        $this->lstCodiClie->Rows = 5;
    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Name = 'Fecha Manif. Inicial';
        $this->calFechInic->Width = 100;
        $this->calFechInic->AddAction(new QChangeEvent(), new QAjaxAction('cargarAliados'));
    }

    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Name = 'Fecha Manif. Final';
        $this->calFechFina->Width = 100;
        $this->calFechFina->AddAction(new QChangeEvent(), new QAjaxAction('cargarAliados'));
    }

    protected function chkSeleConc_Create() {
        $this->chkSeleConc = new QCheckBox($this);
        $this->chkSeleConc->Name = 'Selecc Concepto(s) ?';
        $this->chkSeleConc->Checked = false;
        $this->chkSeleConc->AddAction(new QChangeEvent(), new QAjaxAction('chkSeleConc_Change'));
    }

    protected function lstConcFact_Create() {
        $this->lstConcFact = new QListBox($this);
        $this->lstConcFact->Name = QApplication::Translate('Conceptos Facturables');
        $this->lstConcFact->Width = 200;
        $this->lstConcFact->SelectionMode = QSelectionMode::Multiple;
        $this->lstConcFact->Rows = 5;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function cargarConceptos() {
        $this->lstConcFact->RemoveAllItems();
        $arrConcActi = Conceptos::conceptosActivos('EXM');
        foreach ($arrConcActi as $objConcActi) {
            $this->lstConcFact->AddItem($objConcActi->__toString(),$objConcActi->Id,true);
        }
    }

    protected function cargarAliados() {
        $this->lstCodiClie->RemoveAllItems();
        $arrCodiAlia   = MasterCliente::LoadAliadosActivos('codigos');
        t('Codigos de Clientes-Aliados:');
        t($arrCodiAlia);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Guias()->ClienteCorpId,$arrCodiAlia);
        if (!is_null($this->calFechInic->DateTime)) {
            $objClauWher[] = QQ::GreaterOrEqual(QQN::Guias()->Fecha,$this->calFechInic->DateTime->__toString("YYYY-MM-DD"));
        }
        if (!is_null($this->calFechFina->DateTime)) {
            $objClauWher[] = QQ::LessOrEqual(QQN::Guias()->Fecha,$this->calFechFina->DateTime->__toString("YYYY-MM-DD"));
        }
        $arrAliaFact = [];
        $this->arrGuiaFact = Guias::AptasParaFacturar($objClauWher,'array');
        t('Guias aptas para facturar: '.count($this->arrGuiaFact));
        foreach ($this->arrGuiaFact as $objGuiaFact) {
            if (!in_array($objGuiaFact->ClienteCorpId,$arrAliaFact)) {
                $arrAliaFact[$objGuiaFact->ClienteCorpId] = $objGuiaFact->ClienteCorp->NombClie;
            }
        }
        foreach ($arrAliaFact as $key => $value) {
            $this->lstCodiClie->AddItem($value,$key,true);
        }
        $this->dtgGuiaApta->Refresh();
        $this->mensaje();
    }

    protected function chkSeleAlia_Change() {
        if ($this->chkSeleAlia->Checked) {
            $this->lstCodiClie = enableControl($this->lstCodiClie);
            $strTextMens = 'Presione <b>CTRL</b> mientras hace <b>CLICK</b> en los Aliados que desea facturar !!!';
            $this->info($strTextMens);
        } else {
            $this->lstCodiClie = disableControl($this->lstCodiClie);
            $this->mensaje();
        }
    }

    protected function chkSeleConc_Change() {
        if ($this->chkSeleConc->Checked) {
            $this->lstConcFact = enableControl($this->lstConcFact);
            $strTextMens = 'Presione <b>CTRL</b> mientras hace <b>CLICK</b> en los Conceptos que desea facturar !!!';
            $this->info($strTextMens);
        } else {
            $this->lstConcFact = disableControl($this->lstConcFact);
            $this->mensaje();
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        t('*****************************************');
        t('Comenzando la Emision de Facturas Aliados');
        //----------------------
        // Aliados a Facturar
        //----------------------
        $arrAliaIdxx   = $this->lstCodiClie->SelectedValues;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::MasterCliente()->CodiClie,$arrAliaIdxx);
        $arrAliaSele   = MasterCliente::QueryArray(QQ::AndCondition($objClauWher));
        t('Cantidad de Aliados a procesar: '.count($arrAliaSele));
        //------------------------------------------------
        // Conceptos que seran facturados a los Aliados
        //------------------------------------------------
        $arrConcIdxx   = $this->lstConcFact->SelectedValues;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::Conceptos()->Id,$arrConcIdxx);
        $arrConcFact   = Conceptos::QueryArray(QQ::AndCondition($objClauWher));
        t('Cantidad de Conceptos a facturar: '.count($arrConcIdxx));
        //----------------------------------------------------------------------------------------
        // El vector arrGuiaFact contiene las Guias de los Aliados, aptas para facturar
        // que adicionalmente coinciden con el rango de fechas especificado por el Usuario
        //----------------------------------------------------------------------------------------
        t('Cantidad de Guias aptas para facturar es: '.count($this->arrGuiaFact));
        $arrIdxxSele = $this->colGuiaSele->GetChangedIds();
        $arrGuiaIdxx = [];
        foreach ($this->arrGuiaFact as $objGuiaFact) {
            if (in_array($objGuiaFact->Id, array_keys($arrIdxxSele))) {
                //----------------------------------------------------------------------------------------
                // Estos Ids de Guias se utilizan luego para filtrar los registros de cada Aliado
                // El Aliado pudiera tener más guias facturables, pero solo deben facturase las
                // que aparezcan en este vector.
                //----------------------------------------------------------------------------------------
                $arrGuiaIdxx[] = $objGuiaFact->Id;
            }
        }

        $intCantGuia = 0;
        $intCantFact = 0;
        $arrServImpo = ['EXA','EXM'];

        t('Emitiendo Facturas...');
        foreach ($arrAliaSele as $objAliaSele) {
            t('Creando factura para el Aliado: '.$objAliaSele->NombClie);
            foreach ($arrServImpo as $strServImpo) {
                $arrGuiaServ = Guias::AptasParaFacturarPorAliadoYServicio($objAliaSele->CodiClie,$strServImpo,$arrGuiaIdxx,'array');
                t('Guias aptas para facturar del Servicio '.$strServImpo.': '.count($arrGuiaServ));
                if (count($arrGuiaServ) > 0) {
                    $blnTodoOkey = true;
                    $mixResuFact = Facturas::crearFacturaAliado($arrGuiaServ,$this->objUsuario->CodiUsua,$objAliaSele);
                    if ($mixResuFact instanceof Facturas) {
                        $intCantFact++;
                    } else {
                        $this->danger($mixResuFact);
                        return;
                    }
                }
            }
        }
        $this->cargarAliados();
        $strTextMens = 'Facturacion Exitosa. Guias procesadas: '.$intCantGuia.' | Facturas emitidas: '.$intCantFact;
        $this->success($strTextMens);
    }
}

EmitirFacturaAliado::Run('EmitirFacturaAliado');
?>