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
class GuiaListForm extends GuiaListFormBase {
    /**
     * @var $objUsuario UsuarioConnect
     */
    protected $objUsuario;
    /**
     * @var $objSubxClie stdClass
     */
    protected $objSubxClie;
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
        $this->objSubxClie->strTituForm = ''; //QApplication::Translate('Lista de Guías');
        //------------------------------------------------------------------------------------
        // Por defecto, las guías listadas son del Cliente, el cual el Usuario está asociado
        //------------------------------------------------------------------------------------
        $this->objSubxClie->intCodiClie = $this->objUsuario->Cliente->CodiClie;
        $this->objSubxClie->strCritSubx = null;
        //----------------------------------------------------------------------------
        // Por defecto, el botón de Imprimir Manifiesto Diario se muestra a la vista
        //----------------------------------------------------------------------------
        $this->blnImprMani = true;
        //--------------------------------------------------
        // Se verifica desde dónde se invoca este programa
        //--------------------------------------------------
        if (isset($_GET['c'])) {
            //----------------------------------------------------------------------------------------------------
            // Éste programa se está invocando desde cualquier punto del Sistema, distinto al del menú principal.
            //----------------------------------------------------------------------------------------------------
            $strCritList = $_GET['c'];
            switch ($strCritList) {
                case 'sc':
                    //------------------------------------------------------------
                    // Éste programa es invocado desde el programa de SubClientes
                    //------------------------------------------------------------
                    if (isset($_SESSION['SubxClie'])) {
                        //-----------------------------------------------
                        // Las guías listadas pertenecen a un SubCliente
                        //-----------------------------------------------
                        $this->objSubxClie->intCodiClie = $_SESSION['SubxClie'];
                        $this->objSubxClie->strCritSubx = '&c='.$strCritList;
                        //-------------------------------------------------------------------------------------
                        // Al Título del Formulario, se le concatena el nombre del SubCliente para informar al
                        // Usuario a quiénes en este momento pertenecen las Guías listadas.
                        //-------------------------------------------------------------------------------------
                        $objSubxClie = MasterCliente::Load($this->objSubxClie->intCodiClie);
                        $this->objSubxClie->strTituForm .= substr($objSubxClie->NombClie,0,40);
                        //--------------------------------------------------------------
                        // El botón de Imprimir Manifiesto Diario se oculta a la vista.
                        //--------------------------------------------------------------
                        $this->blnImprMani = false;
                    }
                    break;
                default:
            }
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->objUsuario = unserialize($_SESSION['User']);
        $this->SetupValores();

        $this->lblTituForm->Text = $this->objSubxClie->strTituForm;

        $this->txtNumeGuia_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->txtNombRemi_Create();
        $this->txtNombDest_Create();

        $this->txtPesoGuia_Create();
        $this->txtCantPiez_Create();
		$this->lstTipoPago_Create();
		$this->lstCodiOrig_Create();
		$this->lstCodiDest_Create();

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
        $objClauOrde[] = QQ::OrderBy(QQN::Guia()->FechGuia, false, QQN::Guia()->NumeGuia, false);
        //-----------------------
        // Evaluando filtros ...
        //-----------------------
        $dttFechLimi   = SumaRestaDiasAFecha(FechaDeHoy(),180,'-');
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie, $this->objSubxClie->intCodiClie);
        $objClauWher[] = QQ::Equal(QQN::Guia()->Anulada, 0);
        $objClauWher[] = QQ::GreaterThan(QQN::Guia()->FechGuia,$dttFechLimi);

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
//        $this->listaDeGuiasParaExportar($objClauWher);

        $colStatGuia = new QDataGridColumn('ST', '<?= $_FORM->StatusColumnRender($_ITEM) ?>');
        $colStatGuia->HtmlEntities = false;
        $colStatGuia->Width        = 10;
        $this->dtgGuias->AddColumn($colStatGuia);

        $colNumeGuia = $this->dtgGuias->MetaAddColumn('NumeGuia');
        $colNumeGuia->Name = 'Guía';

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->FechGuia->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia);
        $this->dtgGuias->AddColumn($colFechGuia);

        $colOrigGuia = $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaOrig);
        $colOrigGuia->Name = 'Orig';

        $colDestGuia = $this->dtgGuias->MetaAddColumn(QQN::Guia()->EstaDest);
        $colDestGuia->Name = 'Dest';

        $colNombDest = new QDataGridColumn('DESTINATARIO','<?= $_FORM->dtgNombDest_Render($_ITEM) ?>');
        $this->dtgGuias->AddColumn($colNombDest);

        $colStatGuia = new QDataGridColumn('ULTIMO ESTATUS','<?= $_FORM->dtgDescStat_Render($_ITEM) ?>');
        $this->dtgGuias->AddColumn($colStatGuia);

        $colSucuCkpt = new QDataGridColumn('SUC','<?= $_FORM->dtgEstaCkpt_Render($_ITEM); ?>');
        $colSucuCkpt->Name = 'SUC';
        $this->dtgGuias->AddColumn($colSucuCkpt);

        $colFechGuia = new QDataGridColumn('F. ESTATUS','<?= $_FORM->dtgFechCkpt_Render($_ITEM); ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt);
        $this->dtgGuias->AddColumn($colFechGuia);

        $colHoraCkpt = new QDataGridColumn('H. ESTATUS','<?= $_FORM->dtgHoraCkpt_Render($_ITEM); ?>');
        $this->dtgGuias->AddColumn($colHoraCkpt);

        $colUsuaCrea = $this->dtgGuias->MetaAddColumn('UsuarioCreacion');
        $colUsuaCrea->Name = 'CRDA POR';

        //------------------
        // Botónes Propios
        //------------------
        $this->btnCancel_Create();
        $this->btnExpoExce_Create();
        $this->btnFiltComu_Create();
        $this->btnManiDrop_Create();

        $this->btnFiltAvan->Visible = false;
        $this->btnNuevRegi->Visible = $this->objUsuario->Cliente->CodiStat;

        if (!isset($_GET['c'])) {
            $this->btnCancel->Visible = false;
        } else {
            $this->btnNuevRegi->Visible = false;
            $this->btnManiDrop->Visible = false;
            $this->btnImprMani->Visible = false;
        }

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    public function StatusColumnRender(Guia $objGuia) {
        if (!$objGuia) {
            return null;
        }
        if (is_null($objGuia->CodiCkpt)) {
            return null;
        }
        $objCkptGuia = SdeCheckpoint::Load($objGuia->CodiCkpt);
        if (!$objCkptGuia) {
            return null;
        }
        if (strlen($objCkptGuia->Imagen) == 0) {
            return null;
        }
        return TextoIconoColor($objCkptGuia->Imagen,'','','lg',$objCkptGuia->Color);
    }

    public function dtgEstaCkpt_Render(Guia $objGuia) {
        if (!$objGuia) {
            return null;
        }
        if (is_null($objGuia->EstaCkpt)) {
            return null;
        }
        return $objGuia->EstaCkpt;
    }

    public function dtgFechCkpt_Render(Guia $objGuia) {
        if (!$objGuia) {
            return null;
        }
        if (is_null($objGuia->FechCkpt)) {
            return null;
        }
        return $objGuia->FechCkpt->__toString('DD/MM/YYYY');
    }

    public function dtgHoraCkpt_Render(Guia $objGuia) {
        if (!$objGuia) {
            return null;
        }
        if (is_null($objGuia->HoraCkpt)) {
            return null;
        }
        return substr($objGuia->HoraCkpt,0,5);
    }


    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->CausesValidation = false;
    }


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
		$objClauWher   = Estacion::CriteriosDeSucusalesActivas();
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
		$objClauWher   = Estacion::CriteriosDeSucusalesActivas();
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

    protected function btnFiltComu_Create() {
        $this->btnFiltComu = new QLabel($this);
        $this->btnFiltComu->HtmlEntities = false;
        $this->btnFiltComu->CssClass = '';

        $strTextBoto   = TextoIcono('filter fa-lg','Filtros','F','sm');

        $strUrlxHoyx = !is_null($this->objSubxClie->strCritSubx)
            ? __SIST__.'/guia_list.php?f=hoy'.$this->objSubxClie->strCritSubx
            : __SIST__.'/guia_list.php?f=hoy';
        $strUrlxGnrx = !is_null($this->objSubxClie->strCritSubx)
            ? __SIST__.'/guia_list.php?f=gnr'.$this->objSubxClie->strCritSubx
            : __SIST__.'/guia_list.php?f=gnr';
        $strUrlxGetx = !is_null($this->objSubxClie->strCritSubx)
            ? __SIST__.'/guia_list.php?f=get'.$this->objSubxClie->strCritSubx
            : __SIST__.'/guia_list.php?f=get';
        $strUrlxGexx = !is_null($this->objSubxClie->strCritSubx)
            ? __SIST__.'/guia_list.php?f=ge'.$this->objSubxClie->strCritSubx
            : __SIST__.'/guia_list.php?f=ge';
        $strUrlxAvax = !is_null($this->objSubxClie->strCritSubx)
            ? __SIST__.'/guia_list.php?f=ava'.$this->objSubxClie->strCritSubx
            : __SIST__.'/guia_list.php?f=ava';

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

        $arrGuiaDefi = array();
        if (isset($_SESSION['CritXlsx'])) {
            $objClauWher = unserialize($_SESSION['CritXlsx']);
            $arrGuiaSele = Guia::QueryArray(QQ::AndCondition($objClauWher));
            foreach ($arrGuiaSele as $objGuia) {
                $arrGuiaDefi[] = $objGuia->NumeGuia;
            }
        }
        $_SESSION['Dato'] = serialize($arrGuiaDefi);

        $strTextBoto   = TextoIcono('print fa-lg','Imprimir','F','sm');

        $strUrlxDiax = !is_null($this->objSubxClie->strCritSubx)
            ? __SIST__.'/guia_list.php?i=dia'.$this->objSubxClie->strCritSubx
            : __SIST__.'/guia_list.php?i=dia';
        $strUrlxOtro = !is_null($this->objSubxClie->strCritSubx)
            ? __SIST__.'/guia_list.php?i=otr'.$this->objSubxClie->strCritSubx
            : __SIST__.'/guia_list.php?i=otr';
        $strUrlxLote = __SIST__.'/guia_pdf_lote.php';

        $arrOpciDrop[] = OpcionDropDown($strUrlxDiax,TextoIcono('calendar','Manif. Diario'));
        $arrOpciDrop[] = OpcionDropDown($strUrlxOtro,TextoIcono('random','Otro Manif.'));
        $arrOpciDrop[] = OpcionDropDown($strUrlxLote,TextoIcono('book','Guias en Lote'));

        $this->btnManiDrop->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop, 'i');
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

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
//        $this->listaDeGuiasParaExportar($this->objClauWher);

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
            return substr(limpiarCadena($objGuiaList->NombDest),0,40).'...';
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
        //--------------------------------------------------------------------------
        // Se guardan las cláusulas en una variable de sesión para futuros reportes
        //--------------------------------------------------------------------------
        $_SESSION['CritXlsx'] = serialize($this->objClauWher);
//        $this->listaDeGuiasParaExportar($this->objClauWher);

        $this->dtgGuias->TotalItemCount = Guia::QueryCount(QQ::AndCondition($this->objClauWher));

        $arrGuiaNaci = Guia::QueryArray(
            QQ::AndCondition($this->objClauWher),
            QQ::Clause($this->dtgGuias->OrderByClause, $this->dtgGuias->LimitClause)
        );

        $this->dtgGuias->DataSource = $arrGuiaNaci;
    }

    /*
    protected function listaDeGuiasParaExportar($objClauWher) {
        if ($this->objUsuario->LogiUsua == 'ddurand') {
            if (!in_array($this->objUsuario->ClienteId, array(1018, 1616))) {
                t('Creado vector vacio para guardar las guias');
                $arrGuiaDefi = array();
                $arrGuiaSele = Guia::QueryArray(QQ::AndCondition($objClauWher));
                t('El vector de guia contiene: ' . count($arrGuiaSele) . ' elementos');
                foreach ($arrGuiaSele as $objGuia) {
                    t('Guardando guia nro: ' . $objGuia->NumeGuia);
                    $arrGuiaDefi[] = $objGuia->NumeGuia;
                }
                t('Listo, voy a guadar en la variable de session');
                $_SESSION['Dato'] = serialize($arrGuiaDefi);
            }
            $_SESSION['CritXlsx'] = serialize($objClauWher);
        } else {
            if (!in_array($this->objUsuario->ClienteId,array(1836,1018,1616))) {
                $arrGuiaDefi = array();
                $arrGuiaSele = Guia::QueryArray(QQ::AndCondition($objClauWher));
                foreach ($arrGuiaSele as $objGuia) {
                    $arrGuiaDefi[] = $objGuia->NumeGuia;
                }
                $_SESSION['Dato'] = serialize($arrGuiaDefi);
            }
            $_SESSION['CritXlsx'] = serialize($objClauWher);
        }
    }
    */

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
GuiaListForm::Run('GuiaListForm');
?>