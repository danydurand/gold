<?php
//-----------------------------------------------------------------------------
// Programa      : buscar_pieza_mia.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 05/01/2022
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class BuscarPiezaMia extends FormularioBaseKaizen {

    protected $txtListPiez;  
    protected $chkMostQuer;
    protected $strCadeSqlx;
    protected $dtgPiezEnco;
    protected $txtPiezFalt;
    protected $objClauWher;
    protected $arrPiezScan = array();


    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Buscar Pieza en Scanneos');
    
        $this->txtListPiez_Create();
        $this->dtgPiezEnco_Create();
        $this->txtPiezFalt_Create();

        $this->txtListPiez->SetFocus();
    }

    //----------------------------
    // Aquí se crean los Objetos
    //----------------------------


    protected function txtListPiez_Create() {
        $this->txtListPiez = new QTextBox($this);
        $this->txtListPiez->TextMode = QTextMode::MultiLine;
        $this->txtListPiez->Width = 255;
        $this->txtListPiez->Rows = 10;
        $this->txtListPiez->Required = true;
    }

    protected function dtgPiezEnco_Create() {
        $this->dtgPiezEnco = new ScanneoPiezasDataGrid($this);
        $this->dtgPiezEnco->FontSize = 12;
        $this->dtgPiezEnco->ShowFilter = false;

        $this->dtgPiezEnco->CssClass = 'datagrid';
        $this->dtgPiezEnco->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezEnco->Paginator = new QPaginator($this->dtgPiezEnco);
        $this->dtgPiezEnco->ItemsPerPage = 20;

        $this->dtgPiezEnco->UseAjax = true;

        // Higlight the datagrid rows when mousing over them
        $this->dtgPiezEnco->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgPiezEnco->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgPiezEnco->RowActionParameterHtml = '<?= $_ITEM->Scanneo->Id ?>';
        $this->dtgPiezEnco->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPiezEncoRow_Click'));

        $this->dtgPiezEnco->MetaAddColumn('Id');
        $this->dtgPiezEnco->MetaAddColumn('IdPieza');
        $this->dtgPiezEnco->MetaAddColumn(QQN::ScanneoPiezas()->Scanneo->Descripcion,'Name=Contenedor');
        $this->dtgPiezEnco->MetaAddColumn('CreatedAt', 'Name=F.Scan');
        $this->dtgPiezEnco->MetaAddColumn(QQN::ScanneoPiezas()->CreatedByObject, 'Name=Scan Por');

        $this->dtgPiezEnco->SetDataBinder('dtgPiezEnco_Bind');
    }

    public function dtgPiezEncoRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("scanneo_mia_edit.php/$intId");
    }

    protected function dtgPiezEnco_Bind() {
        if (count($this->objClauWher) > 0) {
            $this->dtgPiezEnco->TotalItemCount = ScanneoPiezas::QueryCount(QQ::AndCondition($this->objClauWher));

            $this->arrPiezScan = ScanneoPiezas::QueryArray(
                QQ::AndCondition($this->objClauWher),
                QQ::Clause(
                    $this->dtgPiezEnco->OrderByClause,
                    $this->dtgPiezEnco->LimitClause
                )
            );

            $this->dtgPiezEnco->DataSource = $this->arrPiezScan;

            $arrNumePiez = explode(',', nl2br2($this->txtListPiez->Text));
            $arrNumePiez = LimpiarArreglo($arrNumePiez, false);

            $arrPiezScan = array();
            if (count($this->arrPiezScan)) {
                t('arrPiezScan...');
                foreach ($this->arrPiezScan as $objPiezScan) {
                    $arrPiezScan[] = $objPiezScan->IdPieza;
                }

                $intCantFoun = count($arrPiezScan);
                $intCantFind = count($arrNumePiez);
                if ($intCantFind != $intCantFoun) {
                    t('Hay diferencia');
                    $this->danger('Se encontraron: ' . $intCantFoun . ' de ' . $intCantFind);
                    if (count($this->arrPiezScan)) {
                        foreach ($arrNumePiez as $strNumePiez) {
                            if (!(in_array($strNumePiez, $arrPiezScan))) {
                                $this->txtPiezFalt->Text .= $strNumePiez . chr(13);
                            }
                        }
                    }
                } else {
                    t('Se encontraron todas las piezas');
                    $this->success('Se encontraron: ' . $intCantFoun . ' piezas');
                }
            }

        } else {
            t('No hay criterios de busqueda');
        }
    }

    protected function txtPiezFalt_Create() {
        $this->txtPiezFalt = new QTextBox($this);
        $this->txtPiezFalt->TextMode = QTextMode::MultiLine;
        $this->txtPiezFalt->Width = 255;
        $this->txtPiezFalt->Rows = 10;
        $this->txtPiezFalt->Required = true;
        $this->txtPiezFalt->Enabled = false;
        $this->txtPiezFalt->ForeColor = 'blue';
        $this->txtPiezFalt->BackColor = 'white';
    }
    
    protected function btnSave_Create() {
        $this->btnSave = new QButtonP($this);
        $this->btnSave->Text = TextoIcono('search','Buscar','F','fa-lg');
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
    }


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->txtPiezFalt->Text = '';
        $arrNumePiez = explode(',', nl2br2($this->txtListPiez->Text));
        $arrNumePiez = LimpiarArreglo($arrNumePiez, false);
    
        $this->objClauWher   = QQ::Clause();
        $this->objClauWher[] = QQ::In(QQN::ScanneoPiezas()->IdPieza,$arrNumePiez);
    
        $this->dtgPiezEnco->Refresh();

        $arrPiezScan = array();
        if (count($this->arrPiezScan)) {
            foreach ($this->arrPiezScan as $objPiezScan) {
                $arrPiezScan[] = $objPiezScan->IdPieza;
            }

            $intCantFoun = count($arrPiezScan);
            $intCantFind = count($arrNumePiez);
            if ($intCantFind != $intCantFoun) {
                t('Hay diferencia');
                $this->danger('Se encontraron: ' . $intCantFoun . ' de ' . $intCantFind);
                if (count($this->arrPiezScan)) {
                    foreach ($arrNumePiez as $strNumePiez) {
                        if (!(in_array($strNumePiez, $arrPiezScan))) {
                            $this->txtPiezFalt->Text .= $strNumePiez . chr(13);
                        }
                    }
                }
            } else {
                t('Se encontraron todas las piezas');
                $this->success('Se encontraron: ' . $intCantFoun . ' piezas');
            }
        }
    }

}
BuscarPiezaMia::Run('BuscarPiezaMia','buscar_pieza_mia.tpl.php');
?>