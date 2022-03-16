<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ContainersListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Containers class.  It uses the code-generated
 * ContainersDataGrid control which has meta-methods to help with
 * easily creating/defining Containers columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both containers_list.php AND
 * containers_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ContainersListForm extends ContainersListFormBase {
	protected $strFiltEsta;
	protected $btnFiltEsta;
	protected $btnTranMobi;
	protected $colManiSele;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

	protected function SetupParametro() {
		$strAcciAdic = strtoupper(QApplication::PathInfo(0));
		$this->strFiltEsta = 'ABIERT@';
		if (strlen($strAcciAdic)) {
		    switch ($strAcciAdic) {
                case 'C':
                    $this->strFiltEsta = 'CERRAD@';
                    break;
                case 'T2M':
                    $this->TransferirHaciaMobile();
                    break;
                case 'TFM':
                    $this->TransferirDesdeMobile();
                    break;
            }
		}
	}

	protected function Form_Create() {
		parent::Form_Create();

        $this->SetupParametro();
        $this->lblTituForm->Text = 'Masters ('.$this->strFiltEsta.')';

		// Instantiate the Meta DataGrid
		$this->dtgContainerses = new ContainersDataGrid($this);
		$this->dtgContainerses->FontSize = 12;
		$this->dtgContainerses->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgContainerses->CssClass = 'datagrid';
		$this->dtgContainerses->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgContainerses->Paginator = new QPaginator($this->dtgContainerses);
		$this->dtgContainerses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Containers()->Tipo,'MASTER');
		$objClauWher[] = QQ::Equal(QQN::Containers()->Estatus,$this->strFiltEsta);
		$this->dtgContainerses->AdditionalConditions = QQ::AndCondition($objClauWher);

		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Containers()->Id,false);
		$this->dtgContainerses->AdditionalClauses = $objClauOrde;

		// Higlight the datagrid rows when mousing over them
		$this->dtgContainerses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgContainerses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgContainerses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgContainerses->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgContainersesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        $this->colManiSele = new QCheckBoxColumn('', $this->dtgContainerses);
        $this->colManiSele->PrimaryKey = 'Id';
        $this->dtgContainerses->AddColumn($this->colManiSele);
        $this->dtgContainerses->AddAction(new QClickEvent(), new QAjaxAction('colManiSele_Click'));

		// Create the Other Columns (note that you can use strings for containers's properties, or you
		// can traverse down QQN::containers() to display fields that are down the hierarchy)
		//$this->dtgContainerses->MetaAddColumn('Id');
		$this->dtgContainerses->MetaAddColumn('Numero','Name=Precinto');

        $colNombTran = $this->dtgContainerses->MetaAddColumn(QQN::Containers()->Transportista->Nombre,'Name=Transportista');
        $colNombTran->FilterType = QFilterType::TextFilter;
        $colNombTran->Filter = QQ::Like(QQN::Containers()->Transportista->Nombre,null);

        $colNombChof = $this->dtgContainerses->MetaAddColumn(QQN::Containers()->Chofer->Nombre,'Name=Chofer');
        $colNombChof->FilterType = QFilterType::TextFilter;
        $colNombChof->Filter = QQ::Like(QQN::Containers()->Chofer->Nombre,null);

        $colEnxxMobi = new QDataGridColumn('MOBILE','<?= $_FORM->colEnMobile_Render($_ITEM) ?>');
        $colEnxxMobi->HtmlEntities = false;
        $colEnxxMobi->FontBold = true;
        $colEnxxMobi->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgContainerses->AddColumn($colEnxxMobi);

        $colPorxSync = new QDataGridColumn('xSINC','<?= $_FORM->colPorxSync_Render($_ITEM) ?>');
        $colPorxSync->HtmlEntities = false;
        $colPorxSync->FontBold = true;
        $colPorxSync->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgContainerses->AddColumn($colPorxSync);

        $this->dtgContainerses->MetaAddColumn('Piezas','Name=Pzas');
        $this->dtgContainerses->MetaAddColumn('CantidadOk','Name=OK');
        $this->dtgContainerses->MetaAddColumn('Devueltas','Name=Dev');
        $this->dtgContainerses->MetaAddColumn('SinGestionar','Name=Sin-G');
        $this->dtgContainerses->MetaAddColumn('Kilos');
        $this->dtgContainerses->MetaAddColumn('PiesCub','Name=P-Cub');
        $this->dtgContainerses->MetaAddColumn(QQN::Containers()->Operacion);
        $this->dtgContainerses->MetaAddColumn('Fecha');
		$this->dtgContainerses->MetaAddColumn('Hora');
		$this->dtgContainerses->MetaAddColumn('Estatus');

        $this->btnExpoExce_Create();
        $this->btnFiltEsta_Create();
        $this->btnTranMobi_Create();

    }


    protected function TransferirHaciaMobile() {
	    t('=====================');
	    t('TransferirHaciaMobile');
	    if (isset($_SESSION['IdxxSele'])) {
            $arrIdxxSele = $_SESSION['IdxxSele'];
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::Containers()->Id, array_keys($arrIdxxSele));
            $arrManiSele   = Containers::QueryArray(QQ::AndCondition($objClauWher));
            if (count($arrManiSele)) {
                t('Hay '.count($arrManiSele).' Manifiestos para T2M');
                $intCantTran = 0;
                foreach ($arrManiSele as $objManiSele) {
                    t('Procesando: '.$objManiSele->Numero.' EnMobile: '.$objManiSele->__enMobile());
                    if ($objManiSele->__enMobile() == 'NO') {
                        t('Transfiriendo...');
                        $objManiSele->TransferirToMobile();
                        $intCantTran++;
                    }
                }
                $this->success("Manifiesto Transferidos: $intCantTran");
            }
        }
    }


    protected function TransferirDesdeMobile() {
        t('=====================');
        t('TransferirDesdeMobile');
        if (isset($_SESSION['IdxxSele'])) {
            $arrIdxxSele = $_SESSION['IdxxSele'];
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::Containers()->Id, array_keys($arrIdxxSele));
            $arrManiSele   = Containers::QueryArray(QQ::AndCondition($objClauWher));
            if (count($arrManiSele)) {
                t('Hay '.count($arrManiSele).' Manifiestos para T2M');
                $intCantTran = 0;
                foreach ($arrManiSele as $objManiSele) {
                    t('Procesando: '.$objManiSele->Numero.' EnMobile: '.$objManiSele->__enMobile());
                    if ($objManiSele->__enMobile() == 'SI') {
                        $intCantSync = $objManiSele->_Pzas_x_Sync();
                        if ($intCantSync) {
                            t('Transfiriendo...');
                            $objManiSele->TransferirFromMobile();
                            $intCantTran++;
                        }
                    }
                }
                $this->success("Manifiesto Sincronizados: $intCantTran");
            }
        }
    }


    protected function colManiSele_Click() {
	    $this->mensaje();
        $_SESSION['IdxxSele'] = $this->colManiSele->GetChangedIds();
    }


    public function colEnMobile_Render(Containers $objContRuta){
        $strTranMobi = $objContRuta->__enMobile();
        $strColoLetr = $strTranMobi == 'SI' ? 'green' : 'red';
        return "<span style='color: $strColoLetr'>$strTranMobi</span>";
    }

    public function colPorxSync_Render(Containers $objContRuta){
        $intPorxSync = $objContRuta->_Pzas_x_Sync();
        $strColoLetr = $intPorxSync > 0 ? 'red' : 'black';
        return "<span style='color: $strColoLetr'>$intPorxSync</span>";
    }


    protected function btnFiltEsta_Create() {
        $this->btnFiltEsta = new QLabel($this);
        $this->btnFiltEsta->HtmlEntities = false;
        $this->btnFiltEsta->CssClass = '';

        $strTextBoto   = TextoIcono('filter','Estatus','F','lg');
        $arrOpciDrop   = array();
        $arrOpciDrop[] = OpcionDropDown(
            __SIST__.'/containers_list.php/c',
            TextoIcono('lock','CERRAD@')
        );
        $arrOpciDrop[] = OpcionDropDown(
            __SIST__.'/containers_list.php',
            TextoIcono(__iOJOS__,'ABIERT@')
        );
        $this->btnFiltEsta->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);
    }


    protected function btnTranMobi_Create() {
        $this->btnTranMobi = new QLabel($this);
        $this->btnTranMobi->HtmlEntities = false;
        $this->btnTranMobi->CssClass = '';

        $strTextBoto   = TextoIcono('cogs','Mobile','F','lg');
        $arrOpciDrop   = array();
        $arrOpciDrop[] = OpcionDropDown(
            __SIST__.'/containers_list.php/t2m',
            TextoIcono('share','Transf a Mobile')
        );
        $arrOpciDrop[] = OpcionDropDown(
            __SIST__.'/containers_list.php/tfm',
            TextoIcono('reply','Sincro desde Mobile')
        );

        $this->btnTranMobi->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);

    }

    public function btnNuevRegi_Click() {
        QApplication::Redirect("sacar_a_ruta.php");
    }

    public function CantPiez_ColumnRender(Containers $objManifiesto) {
        return $objManifiesto->CountGuiaPiezasesAsContainerPieza();
    }

    public function CantEntr_Render(Containers $objManifiesto) {
        return $objManifiesto->ResumeDeEntrega()->CantOkey;
    }

    public function dtgContainersesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        $objContSele = Containers::Load($intId);
        if ($objContSele->__enMobile() == 'SI') {
            QApplication::Redirect("containers_edit.php/$intId");
        } else {
            QApplication::Redirect("sacar_a_ruta.php/$intId");
        }
	}

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// containers_list.tpl.php as the included HTML template file
ContainersListForm::Run('ContainersListForm');
?>
