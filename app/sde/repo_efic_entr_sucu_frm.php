<?php
//------------------------------------------------------------------------------------------------------------------
// Programa       : repo_efic_sucu_frm.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 08/05/17 10:35 AM
// Proyecto       : newliberty
// Descripcion    : Este programa muestra al Usuario una pantalla para capturar los parametros necesarios para la
//                  emisión del reporte de piezas Entregadas y una vision aproximada sobre la medicion del tiempo
//                  entre el proceso PU y el proceso OK.
//------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RepoEficSucuFrm extends FormularioBaseKaizen {
    protected $dttFechInic;
    protected $dttFechFina;
    protected $lstCodiEsta;
    protected $btnExpoPdfx;

    protected function SetupValues() {
        $objDataBase = QApplication::$Database[1];
        $intNumeDmes = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),6,2);
        $intNumeDmes = QType::Cast($intNumeDmes,QType::Integer);
        $intNumeAnio = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),1,4);
        if (strlen($intNumeDmes) == 1) {
            $intNumeDmes = '0'.$intNumeDmes;
        }
        $arrRangFech = RangoDeFechas($intNumeAnio,$intNumeDmes);
        //-------------------------------------------
        // Asigno valores por defecto a las Fechas
        //-------------------------------------------
        $this->dttFechInic->DateTime = new QDateTime($arrRangFech[0]);
        $this->dttFechFina->DateTime = new QDateTime($arrRangFech[1]);
    }

    protected function Form_Create() {
        parent::Form_Create();
        //------------------------
        // Título del Formulario
        //------------------------
        $this->lblTituForm->Text = 'Eficiencia en Entrega por Sucursal';
        //------------------------
        // Campos del Formulario
        //------------------------
        $this->dttFechInic_Create();
        $this->dttFechFina_Create();
        $this->lstCodiEsta_Create();
        //------------------------------------
        // Botón para generar reporte en XLS
        //------------------------------------
        $this->btnSave->Text = TextoIcono('table fa-lg','Exportar XLS');
        $this->btnSave->ActionParameter = 'XLS';
        //------------------------------------
        // Botón para generar reporte en PDF
        //------------------------------------
        $this->btnExpoPdfx_Create();
        //----------------------------------
        // Se cargan los datos por defecto
        //----------------------------------
        $this->SetupValues();
    }

    //-------------------------
    // Objetos del Formulario
    //-------------------------

    protected function dttFechInic_Create() {
        $this->dttFechInic = new QCalendar($this);
        $this->dttFechInic->Name = QApplication::Translate('Fecha Inicial');
        $this->dttFechInic->Width = 100;
        $this->dttFechInic->Required = true;
    }

    protected function dttFechFina_Create() {
        $this->dttFechFina = new QCalendar($this);
        $this->dttFechFina->Name = QApplication::Translate('Fecha Final');
        $this->dttFechFina->Width = 100;
        $this->dttFechFina->Required = true;
    }

    protected function lstCodiEsta_Create(){
        $this->lstCodiEsta = new QListBox($this);
        $this->lstCodiEsta->Name = QApplication::Translate('Sucursal');
        $this->lstCodiEsta->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        foreach (Estacion::LoadArrayByCodiStat(1) as $objEstacion) {
            $this->lstCodiEsta->AddItem($objEstacion->DescEsta,$objEstacion->CodiEsta);
        }
        $this->lstCodiEsta->Required = true;
    }

    protected function btnExpoPdfx_Create() {
        $this->btnExpoPdfx = new QButtonP($this);
        $this->btnExpoPdfx->Text = TextoIcono('file-pdf-o fa-lg','Exportar PDF');
        $this->btnExpoPdfx->ActionParameter = 'PDF';
        $this->btnExpoPdfx->AddAction(new QClickEvent(), new QServerAction('btnExpoPdfx_Click'));
        $this->btnExpoPdfx->PrimaryButton = true;
        $this->btnExpoPdfx->CausesValidation = true;
    }

    //-----------------------------------
    // Acciones Asociadas a los objetos
    //-----------------------------------

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        $blnTodoOkey = true;
        $blnHayxCrit = false;
        //-----------------------
        // Validacion de Fechas
        //-----------------------
        if ($this->dttFechInic->DateTime && $this->dttFechFina->DateTime) {
            if ($this->dttFechFina->DateTime < $this->dttFechInic->DateTime) {
                $this->mensaje('La Fecha Final no puede ser Menor a la Fecha Inicial','','d','i','hand-stop-o');
                $blnTodoOkey = false;
            } else {
                $blnHayxCrit = true;
            }
        }
        if ($blnTodoOkey && $blnHayxCrit) {
            //-----------------------------------------------
            // Se valida si se ha seleccionado una Sucursal
            //-----------------------------------------------
            if (!is_null($this->lstCodiEsta->SelectedValue)) {
                $strEstaSele = $this->lstCodiEsta->SelectedValue;
                $_SESSION['SucuSele'] = serialize($strEstaSele);
            } else {
                unset($_SESSION['SucuSele']);
            }
            //--------------------------------------------------------------------------------------------------
            // Se Verifica la existencia de registros que satisfagan las condiciones propuestas por el Usuario
            //--------------------------------------------------------------------------------------------------
            $_SESSION['FechInic'] = serialize($this->dttFechInic->DateTime->__toString('YYYY-MM-DD'));
            $_SESSION['FechFina'] = serialize($this->dttFechFina->DateTime->__toString('YYYY-MM-DD'));
            QApplication::Redirect('repo_efic_entr_sucu_xls.php');
        } else {
            $this->mensaje('Debe especificar algún Criterio de selección de registros','','w','i','exclamation-triangle');
        }
    }

    protected function btnExpoPdfx_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        $blnTodoOkey = true;
        $blnHayxCrit = false;
        //-----------------------
        // Validacion de Fechas
        //-----------------------
        if ($this->dttFechInic->DateTime && $this->dttFechFina->DateTime) {
            if ($this->dttFechFina->DateTime < $this->dttFechInic->DateTime) {
                $this->mensaje('La Fecha Final no puede ser Menor a la Fecha Inicial','','d','i','hand-stop-o');
                $blnTodoOkey = false;
            } else {
                $blnHayxCrit = true;
            }
        }
        if ($blnTodoOkey && $blnHayxCrit) {
            //-----------------------------------------------
            // Se valida si se ha seleccionado una Sucursal
            //-----------------------------------------------
            if (!is_null($this->lstCodiEsta->SelectedValue)) {
                $strEstaSele = $this->lstCodiEsta->SelectedValue;
                $_SESSION['SucuSele'] = serialize($strEstaSele);
            } else {
                unset($_SESSION['SucuSele']);
            }
            //--------------------------------------------------------------------------------------------------
            // Se Verifica la existencia de registros que satisfagan las condiciones propuestas por el Usuario
            //--------------------------------------------------------------------------------------------------
            $_SESSION['FechInic'] = serialize($this->dttFechInic->DateTime->__toString('YYYY-MM-DD'));
            $_SESSION['FechFina'] = serialize($this->dttFechFina->DateTime->__toString('YYYY-MM-DD'));
            QApplication::Redirect('repo_efic_entr_sucu_rpt.php');
        } else {
            $this->mensaje('Debe especificar algún Criterio de selección de registros','','w','i','exclamation-triangle');
        }
    }
}

RepoEficSucuFrm::Run('RepoEficSucuFrm');