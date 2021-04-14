<?php
//---------------------------------------------------------------------------------------------------
// Programa      : ajusta_consecutivo.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 15/11/2017
// Descripcion   : El uso (manual) indiscriminado de números de guias trajo como consecuencia el
//                 uso de mecanismos de validacion que resultaron muy costos en terminos de tiempo.
//                 Para solventar ese problema, se eliminó el mecanismo de validación pero quedamos
//                 expuestos a "choques" entre los datos existentes y los asignados por el Sistema.
//                 Este programa ajusta el consecutivo del nro de guía asignado por el Sistema,
//                 colocando en la tabla generadora un número de guía más alto de la secuencia.
//---------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class AjustarConsecutivo extends FormularioBaseKaizen {
    protected $txtSecuActu;
    protected $txtSecuProp;
    protected $btnPropSecu;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Ajustar Consecutivo';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->txtSecuActu_Create();
        $this->txtSecuProp_Create();
        $this->btnPropSecu_Create();

        $this->buscarSecuenciaActual();

        $this->btnSave->Text = TextoIcono(__iCHEC__,'Establecer Nueva Secuencia');
        $this->btnSave->Visible = false;


    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------

    protected function txtSecuActu_Create() {
        $this->txtSecuActu = new QTextBox($this);
        $this->txtSecuActu->Name = QApplication::Translate("Secuencia Actual de Guías");
        $this->txtSecuActu->Enabled = false;
        $this->txtSecuActu->ForeColor = 'blue';
        $this->txtSecuActu->Width = 100;
    }

    protected function txtSecuProp_Create() {
        $this->txtSecuProp = new QTextBox($this);
        $this->txtSecuProp->Name = QApplication::Translate("Secuencia Propuesta");
        $this->txtSecuProp->Required = true;
        $this->txtSecuProp->Enabled = false;
        $this->txtSecuProp->ForeColor = 'blue';
        $this->txtSecuProp->Width = 100;
    }

    protected function btnPropSecu_Create() {
        $this->btnPropSecu = new QButtonP($this);
        $this->btnPropSecu->Text = TextoIcono(__iINFO__,'Proponer');
        $this->btnPropSecu->AddAction(new QClickEvent(), new QServerAction('btnPropSecu_Click'));
    }

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    protected function buscarSecuenciaActual() {
        $strCadeSqlx  = 'select max(id) as SecuActu ';
        $strCadeSqlx .= '  from guia_consecutivo ';
        $objDataBase  = GuiaConsecutivo::GetDatabase();
        $objDbResult  = $objDataBase->Query($strCadeSqlx);
        $mixRegistro  = $objDbResult->FetchArray();
        $this->txtSecuActu->Text  = $mixRegistro['SecuActu'];
        $this->txtSecuProp->Text  = $this->txtSecuActu->Text;
    }

    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------

    protected function btnPropSecu_Click() {
        if ($this->existeLaGuia() || $this->existeElConsecutivo()) {
            $this->btnSave->Visible = false;
            $this->mensaje('La Secuencia Propuesta ya existe. Intente nuevamente','m','w','',__iEXCL__);
        } else {
            $this->btnSave->Visible = true;
            $this->mensaje('La Secuencia Propuesta no existe y <strong>se puede establecer</strong>.','m','i','',__iINFO__);
        }
    }

    protected function existeLaGuia() {
        $intSecuProp = $this->txtSecuProp->Text + 1000;
        $strCadeSqlx  = "select nume_guia ";
        $strCadeSqlx .= "  from guia ";
        $strCadeSqlx .= " where nume_guia = $intSecuProp";
        $objDataBase  = Guia::GetDatabase();
        $objDbResult  = $objDataBase->Query($strCadeSqlx);
        $mixRegistro  = $objDbResult->FetchArray();
        $this->txtSecuProp->Text = $intSecuProp;
        if (is_null($mixRegistro['nume_guia'])) {
            return false;
        } else {
            return true;
        }
    }

    protected function existeElConsecutivo() {
        $intSecuProp = $this->txtSecuProp->Text;
        $strCadeSqlx  = "select id ";
        $strCadeSqlx .= "  from guia_consecutivo ";
        $strCadeSqlx .= " where id = $intSecuProp";
        $objDataBase  = Guia::GetDatabase();
        $objDbResult  = $objDataBase->Query($strCadeSqlx);
        $mixRegistro  = $objDbResult->FetchArray();
        if (is_null($mixRegistro['id'])) {
            return false;
        } else {
            return true;
        }
    }

    protected function btnSave_Click() {
        if (in_array($this->objUsuario->LogiUsua,array('ddurand','al'))) {
            $strSecuProp = $this->txtSecuProp->Text;
            $strCadeSqlx = "INSERT INTO liberty.guia_consecutivo VALUES ($strSecuProp,'X')";
            $objDataBase = GuiaConsecutivo::GetDatabase();
            $objDataBase->NonQuery($strCadeSqlx);

            //------------------------
            // Log de Transacciones
            //------------------------
            $strCambSecu = $this->txtSecuActu->Text . ' ---> ' . $strSecuProp;
            $arrLogxCamb['strNombTabl'] = 'GuiaConsecutivo';
            $arrLogxCamb['intRefeRegi'] = $strSecuProp;
            $arrLogxCamb['strNombRegi'] = 'Consecutivo de la Guia';
            $arrLogxCamb['strDescCamb'] = 'Nueva Secuencia Establecida: ' . $strCambSecu;
            LogDeCambios($arrLogxCamb);

            $this->mensaje('Nueva Secuencia Establecida', 'm', 's', '', __iCHEC__);
        } else {
            $this->mensaje('Usted <strong>No Esta Autorizado</strong> para ejecutar este Ajuste.', 'm', 'd', '', __iHAND__);
        }
    }

}

AjustarConsecutivo::Run('AjustarConsecutivo');
?>
