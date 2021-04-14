<?php
//---------------------------------------------------------------------------------------------------------
// Programa       : grafico_consumo_guias.php
// Realizado por  : Daniel Durand
// Fecha Elab.    : 2019-03-01
// Proyecto       : newliberty
// Descripcion    : Este programa muestra un grafico de consumo de toda la cartera de clientes
//---------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class GraficoConsumoGuias extends FormularioBaseKaizen {
    protected $arrDataCorp;
    protected $arrDataExpr;


    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Consumo de Guías';


        $this->arrDataCorp = $this->datosParaGrafico('corp');
        $this->arrDataExpr = $this->datosParaGrafico('expr');
    }

    protected function datosParaGrafico($strTipoClie) {
        /**
         * @var $objConsMesx ConsumoMes
         */

        $objDataBase = ConsumoMes::GetDatabase();
        $arrDataGraf = array();
        $intAnioActu = date('Y');
        $intMesxActu = date('m');
        for ($i = $intAnioActu-2; $i <= $intAnioActu; $i++) {
            t('Procesando el anio: '.$i);
            $arrDataMesx = array();
            for ($m = 1; $m <= 12; $m++) {
                t('Procesando el mes: '.$m);
                $strCadeSqlx  = "select * ";
                $strCadeSqlx .= "  from v_resumen_consumo_mes_".$strTipoClie;
                $strCadeSqlx .= " where anio = $i ";
                $strCadeSqlx .= "   and mes = $m ";
                $objDbResult = $objDataBase->Query($strCadeSqlx);
                while ($mixRegiProc = $objDbResult->FetchArray()) {
                    $intCantGuia = $mixRegiProc['cantidad_guias'];
                    t('CG: '.$intCantGuia);
                    $arrDataMesx[] = [
                        'value' => $intCantGuia,
                        'link'  => "grafico_consumo_agencias.php/$i/$m",
                    ];
                }
            }
            $arrDataGraf[] = [
                'seriesname' => quoted_printable_decode($i),
                'data'       => $arrDataMesx,
            ];
        }
        return $arrDataGraf;

    }

    //-----------------------------
    // Construcción de los objetos
    //-----------------------------


    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------


    protected function Form_Validate() {

        return true;
    }

    protected function btnSave_Click() {

    }


    //------------------------------
    // Otras funciones del programa
    //------------------------------

}

GraficoConsumoGuias::Run('GraficoConsumoGuias');
