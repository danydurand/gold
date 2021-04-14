<?php
//-----------------------------------------------------------------------------------------------
// Programa      : reporte_sub_cuentas.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 09/12/2016
// Descripcion   : Este programa permite al Usuario especificar criterios para el
//                 reporte de las sub-cuentas y posteriormente genera el listado correspondiente
//-----------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class ReporteSubCuentas extends FormularioBaseKaizen {
    /* @var $objUsuario UsuarioConnect */
    protected $objUsuario;
    /* @var $chkSubcPart QCheckBox */
    protected $chkSubcPart;
    /* @var $lstSubxCuen QListBox */
    protected $lstSubxCuen;
    /* @var $calFechInic QCalendar */
    protected $calFechInic;
    /* @var $calFechFina QCalendar */
    protected $calFechFina;
    /* @var $lstStatGuia QRadioButtonList */
    protected $rdbStatGuia;
    protected $blnSubcPart;
    protected $blnMostChec;
    protected $blnTienSubc;
    /* @var $arrSubxCuen array[] | MasterCliente */
    protected $arrSubxCuen;

    protected function SetupValores() {
        $this->blnSubcPart = false;
        $this->blnMostChec = false;
        $this->blnTienSubc = false;
        $this->objUsuario = unserialize($_SESSION['User']);
        $intSubxCuen = MasterCliente::CountByCodiDepe($this->objUsuario->Cliente->CodiClie);
        if ($intSubxCuen > 0) {
            $this->blnTienSubc = true;
            $this->arrSubxCuen = MasterCliente::LoadArrayByCodiDepe($this->objUsuario->Cliente->CodiClie);
            if ($intSubxCuen > 1) {
                $this->blnMostChec = true;
            }
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->lblTituForm->Text = 'Reporte de SubCuentas';
        $this->btnSave->Text = TextoIcono('cogs','Generar','','lg');

        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->chkSubcPart_Create();
        $this->lstSubxCuen_Create();
        $this->rdbStatGuia_Create();
        $this->chkSubcPart_Change();
    }

    //-------------------------
    // Creando los objetos ...
    //-------------------------

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Name = QApplication::Translate('Fecha Guía Inicial');
        $this->calFechInic->Width = 100;
    }

    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Name = QApplication::Translate('Fecha Guía Final');
        $this->calFechFina->Width = 100;
    }

    protected function chkSubcPart_Create() {
        $this->chkSubcPart = new QCheckBox($this);
        $this->chkSubcPart->Name = 'Desea especificar Sub-Cuentas?';
        $this->chkSubcPart->HtmlAfter = ' (Por defecto, TODAS)';
        $this->chkSubcPart->Visible = $this->blnMostChec;
        $this->chkSubcPart->AddAction(new QChangeEvent(), new QAjaxAction('chkSubcPart_Change'));
    }

    protected function lstSubxCuen_Create() {
        $this->lstSubxCuen = new QListBox($this);
        $this->lstSubxCuen->Name = QApplication::Translate('Sub-Cuentas');
        $this->lstSubxCuen->Width = 420;
        $this->lstSubxCuen->SelectionMode = QSelectionMode::Multiple;
        $this->lstSubxCuen->Rows = 5;
        $this->lstSubxCuen->Visible = $this->blnSubcPart;
        $this->cargarSubCuentas();
        $this->lstSubxCuen->AddAction(new QClickEvent(), new QAjaxAction('lstSubxCuen_Click'));
    }

    protected function rdbStatGuia_Create() {
        $this->rdbStatGuia = new QRadioButtonList($this);
        $this->rdbStatGuia->Name = 'Estatus';
        $this->rdbStatGuia->HtmlEntities = false;
        $this->cargarEstatus();
    }

    //-------------------------------------
    // Acciones relacionadas a los objetos
    //-------------------------------------

    protected function chkSubcPart_Change() {
        $this->lstSubxCuen->Visible = $this->chkSubcPart->Checked;
        $this->blnSubcPart = $this->chkSubcPart->Checked;
        $this->cargarSubCuentas();
        if ($this->chkSubcPart->Checked) {
            $strTextMens = 'Para seleccionar varias SubCuentas, mantenga la tecla <strong>CTRL</strong> presionada y haga <strong>Click</strong> sobre las cuentas deseadas';
            $this->mensaje($strTextMens,'n','i','',__iINFO__);
        } else {
            $this->mensaje();
        }
    }

    protected function cargarSubCuentas() {
        $this->lstSubxCuen->RemoveAllItems();
        if ($this->blnTienSubc) {
            foreach ($this->arrSubxCuen as $objSubxCuen) {
                $this->lstSubxCuen->AddItem($objSubxCuen->__toStringConCodigoInterno(),$objSubxCuen->CodiClie,!$this->blnSubcPart);
            }
        }
    }

    protected function cargarEstatus() {
        $this->rdbStatGuia->AddItem('&nbsp;Guías Por Recolectar&nbsp;','gpr');
        $this->rdbStatGuia->AddItem('&nbsp;Guías En Tránsito&nbsp;','get');
        $this->rdbStatGuia->AddItem('&nbsp;Guías Entregadas','ge');
    }

    protected function btnSave_Click() {
        $strMensUsua = 'Su reporte ha sido generado con éxito!';
        $strTipoMens = '';
        $strIconMens = __iCHEC__;
        //---------------------------
        // Sub-Cuentas seleccionadas
        //---------------------------
        $arrCodiClie = $this->lstSubxCuen->SelectedValues;
        if (is_null($this->calFechInic->DateTime)) {
            //--------------------------------------------------------------------------------------------------
            // Si el campo Fecha Guía Inicial es null, se advierte al usuario que no puede realizar el reporte.
            //--------------------------------------------------------------------------------------------------
            $strMensUsua = 'Debe especificar al menos la Fecha Inicial para poder generar el reporte!';
            $strTipoMens = 'd';
            $strIconMens = __iHAND__;
        } else {
            //-----------------------------------------------------------------
            // Se arman las cláusulas necesarias para poder generar el reporte
            //-----------------------------------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::Guia()->CodiClie,$arrCodiClie);
            $objClauWher[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$this->calFechInic->DateTime);
            if (!is_null($this->calFechFina->DateTime)) {
                // En caso de que se haya seteado la fecha final
                $objClauWher[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$this->calFechFina->DateTime);
            }
            if (!is_null($this->rdbStatGuia->SelectedValue)) {
                // En caso de haberse seleccionado un estatus
                $strStatGuia = $this->rdbStatGuia->SelectedValue;
                switch ($strStatGuia) {
                    case 'gpr':
                        $arrCodiCkpt = array('NR','RP');
                        $objClauWher[] = QQ::In(QQN::Guia()->CodiCkpt,$arrCodiCkpt);
                        break;
                    case 'get':
                        $arrCodiCkpt = array('NR','RP','OK');
                        $objClauWher[] = QQ::NotIn(QQN::Guia()->CodiCkpt,$arrCodiCkpt);
                        break;
                    case 'ge':
                        $objClauWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,'OK');
                        break;
                    default:
                }
            }
            //--------------------------------------------------------------------------
            // Se guardan las cláusulas en una variable de sesión para crear el reporte
            //--------------------------------------------------------------------------
            $_SESSION['CritXlsx'] = serialize($objClauWher);
            QApplication::Redirect(__SIST__."/exportar_guias.php");
        }
        $this->mensaje($strMensUsua,'',$strTipoMens,$strIconMens);
    }
}

ReporteSubCuentas::Run('ReporteSubCuentas');