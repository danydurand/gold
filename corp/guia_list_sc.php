<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Guia class.  It uses the code-generated
 * GuiaDataGrid control which has meta-methods to help with
 * easily creating/defining Guia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_list.php AND
 * guia_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiaListScForm extends GuiaListFormBase {
    /**
     * @var $objUsuario UsuarioConnect
     */
    protected $objUsuario;
    /**
     * @var $objSubxClie stdClass
     */
    protected $objSubxClie;

    protected $arrDataTabl;
    protected $intPosiRegi;
    protected $intCantRegi;

    //-----------------------
    // Parametros Regulares
    //-----------------------
    protected $blnImprMani;
    protected $objClauWher;
    protected $objClauOrde;
    protected $blnHayxCond;
    protected $btnCancel;

    //-----------------------------------------------------------------------
    // Parámetros de Información (Criterios para Filtrar Búsqueda de Guías)
    //-----------------------------------------------------------------------

    // ---- Lado Izquierdo ----
    protected $txtNumeGuia;
	protected $calFechInic;
	protected $calFechFina;
    protected $txtNombRemi;
    protected $txtNombDest;

    // ---- Lado Derecho ----
    protected $txtPesoGuia;
    protected $txtCantPiez;
	protected $lstTipoPago;
	protected $lstCodiOrig;
	protected $lstCodiDest;

    //---------------------
    // Botones de posición
    //---------------------
    protected $btnPrimRegi;
    protected $btnRegiAnte;
    protected $btnProxRegi;
    protected $btnUltiRegi;

    protected $btnPrimSmal;
    protected $btnAnteSmal;
    protected $btnProxSmal;
    protected $btnUltiSmal;

    //---------------------------------------------------------
    // Botónes vinculados al formulario de Filtro de Búsqueda
    //---------------------------------------------------------
    protected $btnBuscRegi;
    protected $btnImprMani;

    //------------------
    // Botónes Propios
    //------------------
    protected $btnFiltComu;
    protected $btnManiDrop;

    // Override Form Event Handlers as Needed
    protected function Form_Run() {
        parent::Form_Run();

        // Security check for ALLOW_REMOTE_ADMIN
        // To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
        QApplication::CheckRemoteAdmin();
    }

    protected function SetupValores() {
        $this->objSubxClie = new stdClass();
        $intSubxClie = QApplication::PathInfo(0);
        // $this->arrDataTabl = $_SESSION['DataTabl'];
        //------------------------------------------------------------------------------------
        // Por defecto, las guías listadas son del Cliente, el cual el Usuario está asociado
        //------------------------------------------------------------------------------------
        $this->objSubxClie->intCodiClie = $intSubxClie;
        //-------------------------------------------------------------------------------------
        // Al Título del Formulario, se le concatena el nombre del SubCliente para informar al
        // Usuario a quiénes en este momento pertenecen las Guías listadas.
        //-------------------------------------------------------------------------------------
        $objSubxClie = MasterCliente::Load($this->objSubxClie->intCodiClie);
        $this->objSubxClie->strTituForm = substr($objSubxClie->NombClie,0,40);
        $this->blnImprMani = false;
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->objUsuario = unserialize($_SESSION['User']);
        $this->SetupValores();

        $this->lblTituForm->Text = $this->objSubxClie->strTituForm;

        //------------------------
        // Criterios de Búsqueda
        //------------------------

        //---- Lado Izquierdo ----
        $this->txtNumeGuia_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->txtNombRemi_Create();
        $this->txtNombDest_Create();

        //---- Lado Derecho ----
        $this->txtPesoGuia_Create();
        $this->txtCantPiez_Create();
		$this->lstTipoPago_Create();
		$this->lstCodiOrig_Create();
		$this->lstCodiDest_Create();

        //------------------------
        // Botones de navegacion
        //------------------------

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->btnPrimSmal_Create();
        $this->btnAnteSmal_Create();
        $this->btnProxSmal_Create();
        $this->btnUltiSmal_Create();

        $this->determinarPosicion();
        $this->verificarNavegacion();

        //---------------------
        // Botónes del Filtro
        //---------------------
        $this->btnBuscRegi_Create();
        $this->btnImprMani_Create();


        // Instantiate the Meta DataGrid
        $this->dtgGuias = new GuiaDataGrid($this);
        $this->dtgGuias->FontSize = 12;
        $this->dtgGuias->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgGuias->CssClass = 'datagrid';
        $this->dtgGuias->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgGuias->Paginator = new QPaginator($this->dtgGuias);
        $this->dtgGuias->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;
        //$this->dtgGuias->ItemsPerPage = 45;

        // Higlight the datagrid rows when mousing over them
        $this->dtgGuias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgGuias->RowActionParameterHtml = '<?= $_ITEM->NumeGuia ?>';
        $this->dtgGuias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasRow_Click'));

        //-------------------------------------------------------------
        // Cláusula adicional para ordenar por Fecha y Número de Guía.
        //-------------------------------------------------------------
        // $objClauOrde[] = QQ::OrderBy(QQN::Guia()->FechGuia, false, QQN::Guia()->NumeGuia, false);
        $objClauOrde[] = QQ::OrderBy(QQN::Guia()->NumeGuia, false);
        //-----------------------
        // Evaluando filtros ...
        //-----------------------
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie, $this->objSubxClie->intCodiClie);
        if (isset($_GET['f'])) {
            $strFiltComu = $_GET['f'];
            switch ($strFiltComu) {
                case 'hoy':
                    $objClauWher[] = QQ::Equal(QQN::Guia()->FechGuia,date("Y-m-d"));
                    break;
                case 'gnr':
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
                    //$this->dtgGuias->ShowFilter = true;
                    $this->btnFiltAvan_Click();
                    break;
            }
        } elseif (isset($_GET['i'])) {
            $strImprMani = $_GET['i'];
            switch ($strImprMani) {
                case 'dia':
                    $this->btnManiDiar_Click();
                    break;
                default:
                    //$this->dtgGuias->ShowFilter = true;
                    $this->btnFiltAvan_Click();
                    break;
            }
        }

        $this->dtgGuias->AdditionalConditions = QQ::AndCondition($objClauWher);
        $this->dtgGuias->AdditionalClauses = $objClauOrde;
        //----------------------------------------------------------------------
        // Guardo las cláusulas en una variable de sesión para futuros reportes
        //----------------------------------------------------------------------
        $_SESSION['CritXlsx'] = serialize($objClauWher);

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for guia's properties, or you
        // can traverse down QQN::guia() to display fields that are down the hierarchy)
        $colStatGuia = new QDataGridColumn('ST', '<?= $_FORM->StatusColumnRender($_ITEM) ?>');
        $colStatGuia->HtmlEntities         = false;
        $colStatGuia->Width                = 10;
        $this->dtgGuias->AddColumn($colStatGuia);

        $colNumeGuia = $this->dtgGuias->MetaAddColumn('NumeGuia');
        $colNumeGuia->FilterBoxSize = 6;
        $colNumeGuia->Name = 'Guía';

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->FechGuia->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia);
        $colFechGuia->Filter = QQ::Equal(QQN::Guia()->FechGuia,null);
        $colFechGuia->FilterBoxSize = 9;
        $this->dtgGuias->AddColumn($colFechGuia);

        $colOrigGuia = $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaOrig);
        $colOrigGuia->FilterBoxSize = 2;
        $colOrigGuia->Name = 'Orig';

        $colDestGuia = $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaDest);
        $colDestGuia->FilterBoxSize = 2;
        $colDestGuia->Name = 'Dest';

        $colNombDest = new QDataGridColumn('DESTINATARIO','<?= $_FORM->dtgNombDest_Render($_ITEM) ?>');
        $colNombDest->Filter = QQ::Equal(QQN::Guia()->NombDest, null);
        $colNombDest->FilterType = QFilterType::TextFilter;
        $colNombDest->FilterBoxSize = 16;
        $this->dtgGuias->AddColumn($colNombDest);

        $colStatGuia = new QDataGridColumn('ESTATUS','<?= $_FORM->dtgDescStat_Render($_ITEM) ?>');
        $colStatGuia->Filter = QQ::Equal(QQN::Guia()->ObseCkpt, null);
        $colStatGuia->FilterType = QFilterType::TextFilter;
        $colStatGuia->FilterBoxSize = 46;
        $this->dtgGuias->AddColumn($colStatGuia);

        $colSucCkpt = $this->dtgGuias->MetaAddColumn('EstaCkpt');
        $colSucCkpt->FilterBoxSize = 2;
        $colSucCkpt->Name = 'SUC';

        $colFechGuia = new QDataGridColumn('FECHA ESTATUS','<?= $_ITEM->FechCkpt ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt);
        $this->dtgGuias->AddColumn($colFechGuia);

        $colHoraCkpt = $this->dtgGuias->MetaAddColumn('HoraCkpt');
        $colHoraCkpt->FilterType = null;
        $colHoraCkpt->Name = 'HORA ESTATUS';

        $colUsuaCrea = $this->dtgGuias->MetaAddColumn('UsuarioCreacion');
        $colUsuaCrea->FilterBoxSize = 5;
        $colUsuaCrea->Name = 'USUARIO';

        //------------------
        // Botónes Propios
        //------------------
        $this->btnCancel_Create();
        $this->btnExpoExce_Create();
        $this->btnFiltComu_Create();
        $this->btnManiDrop_Create();

        $this->btnFiltAvan->Visible = false;
        $this->btnNuevRegi->Visible = $this->objUsuario->Cliente->CodiStat;

        $this->btnNuevRegi->Visible = false;
        $this->btnManiDrop->Visible = false;
        $this->btnImprMani->Visible = false;
    }

    //----------------------------
    // Aquí se crean los Objetos
    //----------------------------

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->CausesValidation = false;
    }

    //-------- Botones de navegación medianos --------

    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
        $this->btnProxRegi->Text = TextoIcono('angle-right fa-lg','Proximo','P');
        $this->btnProxRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        $this->btnRegiAnte->Text = TextoIcono('angle-left fa-lg','Anterior');
        $this->btnRegiAnte->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        $this->btnPrimRegi->Text = TextoIcono('angle-double-left fa-lg','Primero');
        $this->btnPrimRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        $this->btnUltiRegi->Text = TextoIcono('angle-double-right fa-lg','Ultimo','P');
        $this->btnUltiRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    //-------- Botones de navegación pequeños --------

    protected function btnPrimSmal_Create() {
        $this->btnPrimSmal = new QButton($this);
        $this->btnPrimSmal->Text = TextoIcono('angle-double-left fa-lg','');
        $this->btnPrimSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimSmal->HtmlEntities = false;
        $this->btnPrimSmal->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnAnteSmal_Create() {
        $this->btnAnteSmal = new QButton($this);
        $this->btnAnteSmal->Text = TextoIcono('angle-left fa-lg','');
        $this->btnAnteSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnAnteSmal->HtmlEntities = false;
        $this->btnAnteSmal->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnProxSmal_Create() {
        $this->btnProxSmal = new QButton($this);
        $this->btnProxSmal->Text = TextoIcono('angle-right fa-lg','');
        $this->btnProxSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxSmal->HtmlEntities = false;
        $this->btnProxSmal->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnUltiSmal_Create() {
        $this->btnUltiSmal = new QButton($this);
        $this->btnUltiSmal->Text = TextoIcono('angle-double-right fa-lg','');
        $this->btnUltiSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiSmal->HtmlEntities = false;
        $this->btnUltiSmal->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    /////////// Criterios de Búsqueda ///////////
    // ---- Lado Izquierdo del Formulario ---- //
    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = 'Número de Guía';
        $this->txtNumeGuia->Width = 120;
        $this->txtNumeGuia->Visible = false;
        $this->txtNumeGuia->Placeholder = 'Ej.: 1112233...';
    }

	protected function calFechInic_Create() {
		$this->calFechInic = new QCalendar($this);
		$this->calFechInic->Name = QApplication::Translate('Fecha Inicial');
		$this->calFechInic->Width = 120;
		$this->calFechInic->Visible = false;
	}

	protected function calFechFina_Create() {
		$this->calFechFina = new QCalendar($this);
		$this->calFechFina->Name = QApplication::Translate('Fecha Final');
		$this->calFechFina->Width = 120;
		$this->calFechFina->Visible = false;
	}

    protected function txtNombRemi_Create() {
        $this->txtNombRemi = new QTextBox($this);
        $this->txtNombRemi->Name = 'Nombre del Remitente';
        $this->txtNombRemi->Width = 180;
        $this->txtNombRemi->Visible = false;
        $this->txtNombRemi->ActionParameter = 'Name';
        $this->txtNombRemi->Placeholder = 'Nombre del Remitente';
    }

    protected function txtNombDest_Create() {
        $this->txtNombDest = new QTextBox($this);
        $this->txtNombDest->Name = 'Nombre del Destinatario';
        $this->txtNombDest->Width = 180;
        $this->txtNombDest->Visible = false;
        $this->txtNombDest->ActionParameter = 'Name';
        $this->txtNombDest->Placeholder = 'Nombre del Destinatario';
    }

    // ---- Lado Derecho del Formulario ---- //
    protected function txtPesoGuia_Create() {
        $this->txtPesoGuia = new QTextBox($this);
        $this->txtPesoGuia->Name = QApplication::Translate('Peso de la Guía');
        $this->txtPesoGuia->Width = 60;
        $this->txtPesoGuia->HtmlAfter = ' Kg';
        $this->txtPesoGuia->Visible = false;
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QTextBox($this);
        $this->txtCantPiez->Name = QApplication::Translate('Cantidad de Piezas');
        $this->txtCantPiez->Width = 60;
        $this->txtCantPiez->Visible = false;
    }

	protected function lstTipoPago_Create() {
		$this->lstTipoPago = new QListBox($this);
		$this->lstTipoPago->Name = QApplication::Translate('Tipo de Pago');
		$this->lstTipoPago->Width = 160;
		$this->lstTipoPago->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$this->lstTipoPago->AddItem(QApplication::Translate('PPD'), 1);
		$this->lstTipoPago->AddItem(QApplication::Translate('COD'), 3);
		$this->lstTipoPago->Visible = false;
	}

	protected function lstCodiOrig_Create() {
		$this->lstCodiOrig = new QListBox($this);
		$this->lstCodiOrig->Name = QApplication::Translate('Origen');
		$this->lstCodiOrig->Width = 180;
		$this->lstCodiOrig->Visible = false;
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
		$objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
		$arrCodiOrig   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
		$intCantOrig   = count($arrCodiOrig);
		$this->lstCodiOrig->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantOrig.')'),null);
		foreach ($arrCodiOrig as $objSucursal) {
			$this->lstCodiOrig->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
		}
	}

	protected function lstCodiDest_Create() {
		$this->lstCodiDest = new QListBox($this);
		$this->lstCodiDest->Name = QApplication::Translate('Destino');
		$this->lstCodiDest->Width = 180;
		$this->lstCodiDest->Visible = false;
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
		$objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
		$arrCodiDest   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
		$intCantDest   = count($arrCodiDest);
		$this->lstCodiDest->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantDest.')'),null);
		foreach ($arrCodiDest as $objSucursal) {
			$this->lstCodiDest->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
		}
	}

    //------------------------------------------
    // Botónes Asociados al Filtro de Búsqueda
    //------------------------------------------

    protected function btnBuscRegi_Create() {
        $this->btnBuscRegi = new QButton($this);
        $this->btnBuscRegi->Text = TextoIcono('search','Buscar','F','lg');
        $this->btnBuscRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnBuscRegi->HtmlEntities = false;
        $this->btnBuscRegi->Visible = false;
        $this->btnBuscRegi->PrimaryButton = true;
        $this->btnBuscRegi->AddAction(new QClickEvent(), new QAjaxAction('btnBuscRegi_Click'));
    }

    protected function btnImprMani_Create() {
        $this->btnImprMani = new QButtonI($this);
        $this->btnImprMani->Text = TextoIcono('print fa-lg','Imprimir Manifiesto');
        $this->btnImprMani->AddAction(new QClickEvent(), new QServerAction('btnImprMani_Click'));
        $this->btnImprMani->Visible = !$this->blnImprMani;
    }

    public function StatusColumnRender(Guia $objGuia) {
        if (!is_null($objGuia->CodiCkpt)) {
            $objCkptGuia = SdeCheckpoint::Load($objGuia->CodiCkpt);
            if (strlen($objCkptGuia->Imagen) > 0) {
                return TextoIconoColor($objCkptGuia->Imagen,'','','lg',$objCkptGuia->Color);
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    protected function btnFiltComu_Create() {
        $this->btnFiltComu = new QLabel($this);
        $this->btnFiltComu->HtmlEntities = false;
        $this->btnFiltComu->CssClass = '';

        $strTextBoto   = TextoIcono('filter fa-lg','Filtros','F','sm');

        $strUrlxHoyx = __SIST__.'/guia_list_sc.php/'.$this->objSubxClie->intCodiClie.'?f=hoy';
        $strUrlxGnrx = __SIST__.'/guia_list_sc.php/'.$this->objSubxClie->intCodiClie.'?f=gnr';
        $strUrlxGetx = __SIST__.'/guia_list_sc.php/'.$this->objSubxClie->intCodiClie.'?f=get';
        $strUrlxGexx = __SIST__.'/guia_list_sc.php/'.$this->objSubxClie->intCodiClie.'?f=ge';
        $strUrlxAvax = __SIST__.'/guia_list_sc.php/'.$this->objSubxClie->intCodiClie.'?f=ava';

        $arrOpciDrop[] = OpcionDropDown($strUrlxHoyx,TextoIcono('sun-o','Guías de Hoy'));
        $arrOpciDrop[] = OpcionDropDown($strUrlxGnrx,TextoIcono('dot-circle-o','Guías Por Recolectar'));
        $arrOpciDrop[] = OpcionDropDown($strUrlxGetx,TextoIcono('truck','Guías En Tránsito'));
        $arrOpciDrop[] = OpcionDropDown($strUrlxGexx,TextoIcono('check','Guías Entregadas'));
        $arrOpciDrop[] = OpcionDropDown($strUrlxAvax,TextoIcono('edit','Filtro Avanzado'));

        $this->btnFiltComu->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop, 's');
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QButton($this);
        $this->btnExpoExce->Text = TextoIcono('download fa-lg','XLS','F','lg');
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = true;
        $this->btnExpoExce->AddAction(new QClickEvent(), new QServerAction('btnExpExce_Click'));
    }

    protected function btnManiDrop_Create() {
        $this->btnManiDrop = new QLabel($this);
        $this->btnManiDrop->HtmlEntities = false;
        $this->btnManiDrop->CssClass = '';

        $strTextBoto   = TextoIcono('print fa-lg','Manifiesto','F','sm');

        $strUrlxDiax = __SIST__.'/guia_list_sc.php/'.$this->objSubxClie->intCodiClie.'?i=dia';
        $strUrlxOtro = __SIST__.'/guia_list_sc.php/'.$this->objSubxClie->intCodiClie.'?i=otr';

        $arrOpciDrop[] = OpcionDropDown($strUrlxDiax,TextoIcono('calendar','Diario')); //sun-o
        $arrOpciDrop[] = OpcionDropDown($strUrlxOtro,TextoIcono('random','Otro'));

        $this->btnManiDrop->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop, 'i');
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function verificarNavegacion() {
        $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
        $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
        $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);

        $this->btnAnteSmal->Enabled = !($this->intPosiRegi == 0);
        $this->btnPrimSmal->Enabled = !($this->intPosiRegi == 0);
        $this->btnProxSmal->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        $this->btnUltiSmal->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
    }

    protected function determinarPosicion() {
        $this->arrDataTabl = unserialize($_SESSION['DataTabl']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiClie == $this->objSubxClie->intCodiClie) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/guia_list_sc.php/'.$objRegiTabl->CodiClie);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/guia_list_sc.php/'.$objRegiTabl->CodiClie);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/guia_list_sc.php/'.$objRegiTabl->CodiClie);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/guia_list_sc.php/'.$objRegiTabl->CodiClie);
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function btnFiltAvan_Click() {
        $this->txtNumeGuia->Visible = !$this->txtNumeGuia->Visible;
        $this->calFechInic->Visible = !$this->calFechInic->Visible;
        $this->calFechFina->Visible = !$this->calFechFina->Visible;
        $this->txtNombRemi->Visible = !$this->txtNombRemi->Visible;
        $this->txtNombDest->Visible = !$this->txtNombDest->Visible;

        $this->txtPesoGuia->Visible = !$this->txtPesoGuia->Visible;
        $this->txtCantPiez->Visible = !$this->txtCantPiez->Visible;
		$this->lstTipoPago->Visible = !$this->lstTipoPago->Visible;
		$this->lstCodiOrig->Visible = !$this->lstCodiOrig->Visible;
		$this->lstCodiDest->Visible = !$this->lstCodiDest->Visible;

        $this->btnBuscRegi->Visible = !$this->btnBuscRegi->Visible;
        $this->btnImprMani->Visible = !$this->btnImprMani->Visible;
    }

    protected function btnBuscRegi_Click() {
        $this->objClauWher = QQ::Clause();
        $this->objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie, $this->objSubxClie->intCodiClie);
        $this->blnHayxCond = false;

        if (strlen($this->txtNumeGuia->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,DejarSoloLosNumeros($this->txtNumeGuia->Text));
            $this->blnHayxCond = true;
        }

		if (!is_null($this->calFechInic->DateTime)) {
			$this->objClauWher[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$this->calFechInic->DateTime);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->calFechFina->DateTime)) {
			$this->objClauWher[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$this->calFechFina->DateTime);
			$this->blnHayxCond = true;
		}

        if (strlen($this->txtNombRemi->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->NombRemi,$this->txtNombRemi->Text);
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtNombDest->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->NombDest,$this->txtNombDest->Text);
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtPesoGuia->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->PesoGuia,$this->txtPesoGuia->Text);
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtCantPiez->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->CantPiez,$this->txtCantPiez->Text);
            $this->blnHayxCond = true;
        }

		if (!is_null($this->lstTipoPago->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->TipoGuia, $this->lstTipoPago->SelectedValue);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstCodiOrig->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->EstaOrig,$this->lstCodiOrig->SelectedValue);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstCodiDest->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->EstaDest,$this->lstCodiDest->SelectedValue);
			$this->blnHayxCond = true;
		}

        $this->dtgGuias->SetDataBinder('dtgGuias_Bind');
        $this->dtgGuias->Refresh();

        if ($this->blnHayxCond) {
            $intCantRegi = Guia::QueryCount(QQ::AndCondition($this->objClauWher));

            if (!$intCantRegi > 0) {
                $this->mensaje('No se han encontrado registros','','d','exclamation-triangle');
            }
        } else {
            $this->mensaje('Mostrando las últimas 20 guías','','i','eye');
        }

        $this->btnFiltAvan_Click();
    }

    public function dtgNombDest_Render(Guia $objGuiaList) {
        if ($objGuiaList) {
            return substr($objGuiaList->NombDest,0,40).'...';
        } else {
            return null;
        }
    }

    public function dtgDescStat_Render(Guia $objGuiaList) {
        if ($objGuiaList) {
            return substr($objGuiaList->ObseCkpt,0,40).'...';
        } else {
            return null;
        }
    }

    protected function dtgGuias_Bind() {
        if (isset($_SESSION['CritCons'])) {
            $this->objClauWher = unserialize($_SESSION['CritCons']);
        } else {
            if (!$this->blnHayxCond) {
                $this->objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie, $this->objSubxClie->intCodiClie);
                $this->objClauWher[] = QQ::Equal(QQN::Guia()->GuiaCkptAsNume->CodiCkptObject->TipoCkpt, SdeTipoCkptType::PUBLICO);
            }
        }

        //----------------------------------------------------------------------
        // Guardo las cláusulas en una variable de sesión para futuros reportes
        //----------------------------------------------------------------------
        $_SESSION['CritXlsx'] = serialize($this->objClauWher);

        $this->dtgGuias->TotalItemCount = Guia::QueryCount(QQ::AndCondition($this->objClauWher));

        $arrGuiaNaci = Guia::QueryArray(
            QQ::AndCondition($this->objClauWher),
            QQ::Clause($this->dtgGuias->OrderByClause, $this->dtgGuias->LimitClause)
        );

        $this->dtgGuias->DataSource = $arrGuiaNaci;
    }

    public function dtgGuiasRow_Click($strFormId, $strControlId, $strParameter) {
        $strNumeGuia = strval($strParameter);
        QApplication::Redirect(__SIST__."/consulta_guia.php/$strNumeGuia");
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/cargar_guia.php');
    }

    protected function btnExpExce_Click() {
        QApplication::Redirect(__SIST__."/exportar_guias.php");
    }

    protected function btnManiDiar_Click() {
        //------------------------------------------------------
        // Datos necesarios para imprimir el Manifiesto Diario
        //------------------------------------------------------
        $arrManiDiar = Guia::ManifiestoDiarioPorClienteId($this->objUsuario->ClienteId);
        if (count($arrManiDiar)) {
            $arrEnca2PDF = array('Guia Nro.','Fecha','Remitente','Destinatario','Peso','Cant Piez','Tipo','ORI-DES');
            $arrAnch2PDF = array(20,20,60,60,20,16,16,20);
            $arrJust2PDF = array('C','C','L','L','R','R','C','C');

            $_SESSION['Dato'] = serialize($arrManiDiar);
            $_SESSION['Enca'] = serialize($arrEnca2PDF);
            $_SESSION['Anch'] = serialize($arrAnch2PDF);
            $_SESSION['Just'] = serialize($arrJust2PDF);
            QApplication::Redirect(__UTIL__.'/tabla_pdf.php?nomb_repo=Manifiesto_Diario&nomb_empr='.$this->objUsuario->Cliente->NombClie);
        }
    }

    protected function btnImprMani_Click() {
        //------------------------------------------------------
        // Datos necesarios para imprimir el Manifiesto Diario
        //------------------------------------------------------
        $this->objClauWher = QQ::Clause();
        $this->objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie, $this->objSubxClie->intCodiClie);
        $this->blnHayxCond = false;

        if (strlen($this->txtNumeGuia->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,DejarSoloLosNumeros($this->txtNumeGuia->Text));
            $this->blnHayxCond = true;
        }

		if (!is_null($this->calFechInic->DateTime)) {
			$this->objClauWher[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$this->calFechInic->DateTime);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->calFechFina->DateTime)) {
			$this->objClauWher[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$this->calFechFina->DateTime);
			$this->blnHayxCond = true;
		}

        if (strlen($this->txtNombRemi->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->NombRemi,$this->txtNombRemi->Text);
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtNombDest->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->NombDest,$this->txtNombDest->Text);
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtPesoGuia->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->PesoGuia,$this->txtPesoGuia->Text);
            $this->blnHayxCond = true;
        }

        if (strlen($this->txtCantPiez->Text) > 0) {
            $this->objClauWher[] = QQ::Equal(QQN::Guia()->CantPiez,$this->txtCantPiez->Text);
            $this->blnHayxCond = true;
        }

		if (!is_null($this->lstTipoPago->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->TipoGuia, $this->lstTipoPago->SelectedValue);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstCodiOrig->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->EstaOrig,$this->lstCodiOrig->SelectedValue);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstCodiDest->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->EstaDest,$this->lstCodiDest->SelectedValue);
			$this->blnHayxCond = true;
		}

		if ($this->blnHayxCond) {
			$intCantRegi = Guia::QueryCount(QQ::AndCondition($this->objClauWher));

			if (!$intCantRegi > 0) {
				$this->mensaje('No se han encontrado registros','','d','exclamation-triangle');
			}
		} else {
			$this->mensaje('Mostrando las últimas 20 guías','','i','eye');
		}

        $arrDatoMani = Guia::QueryArray(QQ::AndCondition($this->objClauWher));
        $arrImprMani = array();

        foreach ($arrDatoMani as $objDatoMani) {
            $arrImprMani[] = array(
                $objDatoMani->NumeGuia,
                $objDatoMani->FechGuia->__toString("DD/MM/YYYY"),
                substr($objDatoMani->NombRemi,0,30),
                substr($objDatoMani->NombDest,0,30),
                $objDatoMani->PesoGuia,
                $objDatoMani->CantPiez,
                TipoGuiaType::ToStringCorto($objDatoMani->TipoGuia),
                $objDatoMani->EstaOrig."-".$objDatoMani->EstaDest
            );
        }

        if (count($arrImprMani)) {
            $arrEnca2PDF = array('Guia Nro.','Fecha','Remitente','Destinatario','Peso','Cant Piez','Tipo','ORI-DES');
            $arrAnch2PDF = array(20,20,60,60,20,16,16,20);
            $arrJust2PDF = array('C','C','L','L','R','R','C','C');

            $_SESSION['Dato'] = serialize($arrImprMani);
            $_SESSION['Enca'] = serialize($arrEnca2PDF);
            $_SESSION['Anch'] = serialize($arrAnch2PDF);
            $_SESSION['Just'] = serialize($arrJust2PDF);
            QApplication::Redirect(__UTIL__.'/tabla_pdf.php?nomb_repo=Manifiesto_Diario&nomb_empr='.$this->objUsuario->Cliente->NombClie);
        }
    }
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_list.tpl.php as the included HTML template file
GuiaListScForm::Run('GuiaListScForm');
?>