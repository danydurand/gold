<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
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

        if ($_SESSION['Sistema'] == 'pmn') {
            $this->blnSistPmnx = true;
            $this->blnSaveSubm = false;

            if (!isset($_SESSION['SucuOrig']) || !isset($_SESSION['ReceOrig']) || !isset($_SESSION['ReceObje']) ||
                !isset($_SESSION['LimiKilo']) || !isset($_SESSION['CodiRece']) || !isset($_SESSION['CajaRece']) ||
                !isset($_SESSION['DescCaja'])) {
                $this->blnSaveSubm = true;
            }
        }
    }

    protected function Form_Create() {
        $this->SetupValores();
        parent::Form_Create();

        $this->lblTituForm->Text = trim($this->objMenuOpci->Nombre);

        $this->btnSave->Text = '<i class="fa fa-save fa-lg"></i> Establecer';
        $this->btnSave->Visible = $this->blnSistPmnx ? $this->blnSaveSubm : false;

        $this->lstCajaRece_Create();
        $this->lstReceOrig_Create();
        $this->btnPlacEdit_Create();

        if ($this->blnSaveSubm) {
            $this->mensaje('Por favor establezca una ubicacion','n','d','',__iEXCL__);
        } else {
            $this->mensaje();
        }
    }

    protected function lstCajaRece_Create() {
        $this->lstCajaRece = new QListBox($this);
        $this->lstCajaRece->Name = 'Caja';
        $this->lstCajaRece->Required = true;
        $this->lstCajaRece->AddItem('- Seleccione Uno - (0)',null);
        $this->lstCajaRece->Visible = $this->blnSistPmnx;
        if ($this->blnSaveSubm) {
            $this->lstCajaRece->Enabled = true;
            $this->lstCajaRece->ForeColor = 'black';
        } else {
            $this->lstCajaRece->Enabled = false;
            $this->lstCajaRece->ForeColor = 'blue';
        }
    }

    protected function lstReceOrig_Create() {
        $this->lstReceOrig = new QListBox($this);
        $this->lstReceOrig->Name = 'Receptoria';
        $this->lstReceOrig->Required = true;
        $this->cargarReceptorias();
        $this->lstReceOrig->Visible = $this->blnSistPmnx;
        if ($this->blnSaveSubm) {
            $this->lstReceOrig->Enabled = true;
            $this->lstReceOrig->ForeColor = 'black';
        } else {
            $this->lstReceOrig->Enabled = false;
            $this->lstReceOrig->ForeColor = 'blue';
        }
        $this->lstReceOrig->AddAction(new QChangeEvent(), new QServerAction('lstReceOrig_Change'));
    }

    protected function btnPlacEdit_Create() {
        $this->btnPlacEdit = new QButtonI($this);
        $this->btnPlacEdit->Text = '<i class="fa fa-mail-reply fa-lg"></i> Cambiar';
        $this->btnPlacEdit->AddAction(new QClickEvent(), new QServerAction('btnPlacEdit_Click'));
        $this->btnPlacEdit->CausesValidation = false;
        $this->btnPlacEdit->Visible = $this->blnSistPmnx ? !$this->blnSaveSubm : false;
    }

    //---------------------------------------
    // Acciones relacionadas con los objetos
    //---------------------------------------
    protected function cargarReceptorias() {
        $this->lstReceOrig->RemoveAllItems();
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Counter()->Descripcion);
        $arrTodaRece   = Counter::LoadArrayBySucursalId($this->objUsuario->SucursalId,$objClauOrde);
        $arrReceOrig   = array();
        //--------------------------------------------------------------------------------------------
        // Se crea un arreglo con las receptorias activas que no sean del tipo "entrega a domicilio"
        //--------------------------------------------------------------------------------------------
        foreach ($arrTodaRece as $objReceOrig) {
            if ($objReceOrig->StatusId == StatusType::ACTIVO && $objReceOrig->EsRuta == SinoType::NO) {
                if ($objReceOrig->CountCajas() > 0) {
                    $arrReceOrig[] = $objReceOrig;
                }
            }
        }
        //------------------------------------------------------------------------------
        // Se cargan las receptorias activas y que tengan al menos una "caja" definida
        //------------------------------------------------------------------------------
        $intCantOrig = count($arrReceOrig);
        $this->lstReceOrig->AddItem('- Seleccione Uno - ('.$intCantOrig.')', null);
        foreach ($arrReceOrig as $objReceOrig) {
            $blnSeleRegi = false;
            if ($intCantOrig == 1) {
                $blnSeleRegi = true;
            }
            $this->lstReceOrig->AddItem($objReceOrig->__toString(), $objReceOrig, $blnSeleRegi);
        }
        if (isset($_SESSION['ReceObje'])) {
            $this->lstReceOrig->SelectedValue = unserialize($_SESSION['ReceObje']);
        }
        if ($intCantOrig == 1 || !$this->blnSaveSubm) {
            //------------------------------------------------------------------------------
            // Si solo existe una y puesto que la misma esta seleccionada por defecto, se
            // dispara el evento change de ese listbox
            //------------------------------------------------------------------------------
            $this->lstReceOrig_Change();
        } else {
            //-----------------------------------------------------------------------------
            // Si existe mas de una receptoria, se eliminan las cajas del listbox.
            // Ellas seran cargadas, una vez que se seleccione alguna de las receptorias.
            //-----------------------------------------------------------------------------
            $this->lstCajaRece->RemoveAllItems();
            $this->lstCajaRece->AddItem('- Seleccione Uno - (0)',null);

        }
    }

    protected function lstReceOrig_Change() {
        //------------------------------------------------------------------------------
        // Se cargan las "Cajas" asociadas a la Receptoria seleccionada por el Usuario
        //------------------------------------------------------------------------------
        if (!is_null($this->lstReceOrig->SelectedValue)) {
            $this->lstCajaRece->RemoveAllItems();
            $objReceSele = $this->lstReceOrig->SelectedValue;
            $arrCajaRece = Caja::LoadArrayByCounterId($objReceSele->Id);
            $intCantCaja = count($arrCajaRece);
            if ($intCantCaja > 1) {
                $this->lstCajaRece->AddItem('- Seleccione Uno - ('.$intCantCaja.')',null);
            }
            foreach ($arrCajaRece as $objCaja) {
                if ($intCantCaja == 1) {
                    $blnSeleRegi = true;
                } else {
                    $blnSeleRegi = false;
                }
                $this->lstCajaRece->AddItem($objCaja->__toString(), $objCaja->Id, $blnSeleRegi);
            }
            if (isset($_SESSION['CajaRece'])) {
                $this->lstCajaRece->SelectedValue = unserialize($_SESSION['CajaRece']);
            }
        }
    }

    protected function btnSave_Click() {
        // Sucursal Origen
        $_SESSION['SucuOrig'] = serialize($this->objUsuario->SucursalId);

        // Receptoria Origen
        $_SESSION['ReceOrig'] = serialize($this->lstReceOrig->SelectedValue->Siglas);
        $_SESSION['ReceObje'] = serialize($this->lstReceOrig->SelectedValue);

        // Limite de Kilos de la Receptoria Origen
        $_SESSION['LimiKilo'] = serialize($this->lstReceOrig->SelectedValue->LimiteKilos);

        // Codigo de la Receptoria Origen
        $_SESSION['CodiRece'] = serialize($this->lstReceOrig->SelectedValue->Id);

        // Id de la Caja del Usuario
        $_SESSION['CajaRece'] = serialize($this->lstCajaRece->SelectedValue);

        // Descripcion de la Caja
        $_SESSION['DescCaja'] = serialize($this->lstCajaRece->SelectedName);

        //-------------------------------------------------------------------------------------------
        // Se invoca nuevamente al menú con los valores montados en la sesión y se bloquear el botón
        //-------------------------------------------------------------------------------------------
        QApplication::Redirect('mg.php');
    }

    protected function btnPlacEdit_Click() {
        $this->lstReceOrig->Enabled = true;
        $this->lstReceOrig->ForeColor = 'black';
        $this->lstCajaRece->Enabled = true;
        $this->lstCajaRece->ForeColor = 'black';

        $this->btnSave->Visible = true;
        $this->btnPlacEdit->Visible = false;
    }

}

MenuGrafico::Run('MenuGrafico','mg.tpl.php');
?>