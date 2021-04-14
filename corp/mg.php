<?php
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class MenuGrafico extends FormularioBaseKaizen {

    protected $objMenuOpci;

    protected $dtrOpciUsua;

    protected $lstReceOrig;
    protected $lstCajaRece;

    protected $blnSistPmnx;
    protected $blnSaveSubm;

    protected $btnPlacEdit;

    protected function SetupValores() {
        $this->blnSistPmnx = false;

        $objClauWher       = QQ::Clause();
        $objClauWher[]     = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
        $objClauWher[]     = QQ::Equal(QQN::NewOpcion()->Programa,'principal');
        $objClauWher[]     = QQ::Equal(QQN::NewOpcion()->EsMenu,true);
        $this->objMenuOpci = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
        if (!$this->objMenuOpci) {
            echo "No se ha definido el Menu Principal de la Aplicacion";
            exit(0);
        }
    }

    protected function Form_Create() {

        $this->SetupValores();
        parent::Form_Create();

        $this->lblTituForm->Text = trim($this->objMenuOpci->Nombre);
    }

}

MenuGrafico::Run('MenuGrafico','mg.tpl.php');
?>