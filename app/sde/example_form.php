<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');


class ExampleForm extends FormularioBaseKaizen {
    protected $dtgDataEntr;
    protected $lstSeleChof;
    protected $calFechInic;
    protected $calFechFina;
    

    protected function Form_Create() {

        parent::Form_Create();

        $this->lblTituForm->Text = 'Entregas x Chofer';

        $this->lstSeleChof_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->dtgDataEntr_Create();

    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Required = true;
    }
    
    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Required = true;
    }
    
    
    protected function lstSeleChof_Create() {
        $this->lstSeleChof = new QListBox($this);
        $this->lstSeleChof->Name = 'Chofer';
        $arrDataChof = Chofer::LoadAll();
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
        // $colFechRuta->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgDataEntr->AddColumn($colFechRuta);

        $colCantPiez = new QDataGridColumn('Piezas', '<?= $_ITEM->CantPiez ?>');
        $colCantPiez->Width = 50;
        $colCantPiez->HtmlEntities = false;
        // $colCantPiez->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgDataEntr->AddColumn($colCantPiez);

        $colCantOkey = new QDataGridColumn('Entregadas', '<?= $_ITEM->CantOkey ?>');
        $colCantOkey->Width = 50;
        $colCantOkey->HtmlEntities = false;
        // $colCantOkey->HorizontalAlign = QHorizontalAlign::Center;
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
        $dttFechInic = $this->calFechInic->DateTime->__toString('YYYY-MM-DD');
        $dttFechFina = $this->calFechFina->DateTime->__toString('YYYY-MM-DD');
        $intChofIdxx = $this->lstSeleChof->SelectedValue;

        $strCadeSqlx = "call entregadas_x_chofer_x_rango('$dttFechInic','$dttFechFina',$intChofIdxx)";
        t($strCadeSqlx);
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

    protected function btnSave_Click() {
        $this->dtgDataEntr->Refresh();
    }
}


ExampleForm::Run('ExampleForm');
?>
