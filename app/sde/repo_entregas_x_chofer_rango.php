<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');


class EntregasPorChoferRango extends FormularioBaseKaizen {
    protected $dtgDataEntr;
    protected $lstSeleChof;
    protected $calFechInic;
    protected $calFechFina;
    protected $btnExpoExce;
    

    protected function Form_Create() {

        parent::Form_Create();

        $this->lblTituForm->Text = 'Entregas x Chofer';

        $this->lstSeleChof_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->dtgDataEntr_Create();
        $this->btnExpoExce_Create();


    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgDataEntr);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
    }
    
    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
    }
    
    
    protected function lstSeleChof_Create() {
        $this->lstSeleChof = new QListBox($this);
        $this->lstSeleChof->Name = 'Chofer';
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Chofer()->Nombre);
        $arrDataChof   = Chofer::LoadAll($objClauOrde);
        $this->lstSeleChof->AddItem('- TODOS -',-1);
        foreach ($arrDataChof as $objDataChof) {
            $this->lstSeleChof->AddItem($objDataChof->__toString(), $objDataChof->CodiChof);
        }
    }
    
    
    protected function dtgDataEntr_Create() {
        // Define the DataGrid
        $this->dtgDataEntr = new QDataGrid($this);
        $this->dtgDataEntr->CellPadding = 5;
        $this->dtgDataEntr->CellSpacing = 0;
        $this->dtgDataEntr->FontSize = 12;

        $colNombChof = new QDataGridColumn('Chofer', '<?= $_ITEM->NombChof ?>');
        $colNombChof->Width = 80;
        $colNombChof->HtmlEntities = false;
        $this->dtgDataEntr->AddColumn($colNombChof);

        $colFechRuta = new QDataGridColumn('Fecha', '<?= $_ITEM->FechRuta ?>');
        $colFechRuta->Width = 80;
        $colFechRuta->HtmlEntities = false;
        $this->dtgDataEntr->AddColumn($colFechRuta);

        $colCantPiez = new QDataGridColumn('Piezas', '<?= $_ITEM->CantPiez ?>');
        $colCantPiez->Width = 50;
        $colCantPiez->HtmlEntities = false;
        $this->dtgDataEntr->AddColumn($colCantPiez);

        $colCantOkey = new QDataGridColumn('Entregadas', '<?= $_ITEM->CantOkey ?>');
        $colCantOkey->Width = 50;
        $colCantOkey->HtmlEntities = false;
        $this->dtgDataEntr->AddColumn($colCantOkey);

        $colEficEntr = new QDataGridColumn('Eficiencia', '<?= $_ITEM->EficEntr ?>');
        $colEficEntr->Width = 50;
        $colEficEntr->HtmlEntities = false;
        $this->dtgDataEntr->AddColumn($colEficEntr);

        $this->dtgDataEntr->SetDataBinder('dtgDataEntr_Bind');
    }
    
    protected function dtgDataEntr_Bind() {
        // We load the data source, and set it to the datagrid's DataSource parameter

        if (is_null($this->calFechInic->DateTime) || is_null($this->calFechInic->DateTime)) {
            return;
        }
        $this->mensaje();

        $dttFechInic = $this->calFechInic->DateTime->__toString('YYYY-MM-DD');
        $dttFechFina = $this->calFechFina->DateTime->__toString('YYYY-MM-DD');
        $intChofIdxx = $this->lstSeleChof->SelectedValue;

        $strCadeSqlx = "call entregadas_x_chofer_x_rango('$dttFechInic','$dttFechFina',$intChofIdxx)";
        $objDatabase = Guias::GetDatabase();
        $objDbResult = $objDatabase->Query($strCadeSqlx);
        
        $arrDataRepo = [];
        while($mixRegistro = $objDbResult->FetchArray()) {
            $blnTotaGene = is_null($mixRegistro['chofer']);
            $blnTotaChof = is_null($mixRegistro['fecha']);
            $objDataChof = new StdClass();
            $objDataChof->NombChof = !$blnTotaChof 
                ? $mixRegistro['chofer'] 
                : bold($mixRegistro['chofer']);
            $objDataChof->FechRuta = !$blnTotaChof 
                ? $mixRegistro['fecha'] 
                : ($blnTotaGene ? bold('TOTAL GRAL') : bold('TOTAL'));
            $objDataChof->CantPiez = !$blnTotaChof 
                ? $mixRegistro['piezas'] 
                : bold($mixRegistro['piezas']);
            $objDataChof->CantOkey = !$blnTotaChof 
                ? $mixRegistro['entregadas']
                : bold($mixRegistro['entregadas']);
            $objDataChof->EficEntr = $blnTotaChof 
                ? bold(round($mixRegistro['entregadas']*100/$mixRegistro['piezas'],2)).'%'
                : '';

            $arrDataRepo[] = $objDataChof;
        }
        $this->dtgDataEntr->DataSource = $arrDataRepo;
    }

    protected function Form_Validate() {
        if (is_null($this->calFechInic->DateTime)) {
            $this->danger('La Fecha Inicial del Rango es requerida');
            return false;
        }
        if (is_null($this->calFechFina->DateTime)) {
            $this->danger('La Fecha Final del Rango es requerida');
            return false;
        }
        return true;
    }
    
    protected function btnSave_Click() {
        $this->dtgDataEntr->Refresh();
    }
}

EntregasPorChoferRango::Run('EntregasPorChoferRango');
?>
