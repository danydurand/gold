<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : exportar_archivo.php
// Realizado por  : Daniel Durand
// Fecha Elab.    : 31/08/2021
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ExportarArchivo extends FormularioBaseKaizen {
    protected $objNotaEntr;
    protected $btnExpoData;

    protected function Form_Create() {
        parent::Form_Create();

        $this->objDefaultWaitIcon = new QWaitIcon($this);
        $this->objNotaEntr = NotaEntrega::Load(QApplication::PathInfo(0));

        $this->btnExpoData_Create();

    }

    protected function btnExpoData_Create() {
        $this->btnExpoData = new QButtonOD($this);
        $this->btnExpoData->Text = TextoIcono('download','XLS','F','lg');
        $this->btnExpoData->HtmlEntities = false;
        $this->btnExpoData->AddAction(new QClickEvent(), new QServerAction('btnExpoPiez_Click'));
    }

    protected function btnExpoPiez_Click() {
        $strTituRepo = 'PiezasDelManifiesto-'.$this->objNotaEntr->Referencia;
        //-------------------------
        // Encabezado del Reporte
        //-------------------------
        if ($this->objNotaEntr->ServicioImportacion == 'MAR') {
            $strTituPeso = 'PiesCub';
            $strNombColu = 'pieza_pies_cub';
        } else {
            $strTituPeso = 'Kilos';
            $strNombColu = 'pieza_kilos';
        }
        $arrEncaDato = [
            'Pieza',
            'Destino',
            'Ult Ckpt',
            $strTituPeso
        ];
        //---------
        // Query
        //---------
        $strCadeSqlx  = "select id_pieza, destino, codigo_ckpt, $strNombColu ";
        $strCadeSqlx .= "  from v_info_guia_y_piezas ";
        $strCadeSqlx .= " where nota_entrega_id = ".$this->objNotaEntr->Id;
        $objDatabase  = Guias::GetDatabase();
        $objResulSet  = $objDatabase->Query($strCadeSqlx);
        $intCantRegi  = 0;
        //---------------------
        // Se llena el vector
        //---------------------
        $arrDatoRepo = [];
        while ($mixRegistro = $objResulSet->FetchArray()) {
            $strIdxxPiez = $mixRegistro['id_pieza'];
            $strIataDest = $mixRegistro['destino'];
            $strUltiCkpt = $mixRegistro['codigo_ckpt'];
            $decPesoPiez = $mixRegistro[$strNombColu];

            $arrDatoRepo[] = array(
                $strIdxxPiez,
                $strIataDest,
                $strUltiCkpt,
                $decPesoPiez
            );
            $intCantRegi ++;
        }
        //---------------------------
        // Se emite el archivo XLS
        //---------------------------
        if ($intCantRegi > 0) {
            $objValoRepo = new stdClass();
            $objValoRepo->arrEncaDato = $arrEncaDato;
            $objValoRepo->arrDatoExpo = $arrDatoRepo;
            $objValoRepo->strTituRepo = $strTituRepo;
            //$objValoRepo->strFormExpo = 'HTML';
            $objValoRepo->blnConxBord = true;
            $objValoRepo->blnConxBord = 0;
            $objExpoDato = new ExportarDatos($objValoRepo);
            echo $objExpoDato->Exportar();
        } else {
            $this->danger('No hay piezas !!!');
        }
    }

}

ExportarArchivo::Run('ExportarArchivo');
