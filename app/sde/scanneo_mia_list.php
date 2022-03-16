<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ScanneoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Scanneo class.  It uses the code-generated
 * ScanneoDataGrid control which has meta-methods to help with
 * easily creating/defining Scanneo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both scanneo_list.php AND
 * scanneo_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ScanneoMiaListForm extends ScanneoListFormBase {
	protected $objUsuario;
	protected $btnBuscPiez;
	protected $btnClosCont;
	protected $colContSele;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

		$this->objUsuario = unserialize($_SESSION['User']);
		$this->lblTituForm->Text = 'Scanneos Miami';

		// Instantiate the Meta DataGrid
		$this->dtgScanneos = new ScanneoDataGrid($this);
		$this->dtgScanneos->FontSize = 13;
		$this->dtgScanneos->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgScanneos->CssClass = 'datagrid';
		$this->dtgScanneos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgScanneos->Paginator = new QPaginator($this->dtgScanneos);
		$this->dtgScanneos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgScanneos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgScanneos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Scanneo()->CreatedByObject->Sucursal->Iata, 'MIA');

		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Scanneo()->Id, false);

		$this->dtgScanneos->AdditionalConditions = QQ::AndCondition($objClauWher);
		$this->dtgScanneos->AdditionalClauses = $objClauOrde;

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgScanneos->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgScanneos->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgScanneosRow_Click'));

		$this->colContSele = new QCheckBoxColumn('', $this->dtgScanneos);
		$this->colContSele->PrimaryKey = 'Id';
		$this->dtgScanneos->AddColumn($this->colContSele);
		$this->dtgScanneos->AddAction(new QClickEvent(), new QAjaxAction('colContSele_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for scanneo's properties, or you
		// can traverse down QQN::scanneo() to display fields that are down the hierarchy)
		$this->dtgScanneos->MetaAddColumn('Id');
		$this->dtgScanneos->MetaAddColumn('Descripcion');
		$colCantPiez = new QDataGridColumn('PIEZAS','<?= $_FORM->Piezas($_ITEM) ?>');
		$this->dtgScanneos->AddColumn($colCantPiez);
		$this->dtgScanneos->MetaAddColumn('EstaCerrado','Name=Cerrado ?');
		$this->dtgScanneos->MetaAddColumn('EstaRecibido','Name=Recibido ?');
		$this->dtgScanneos->MetaAddColumn('CreatedAt','Name=F.Creacion');
		$this->dtgScanneos->MetaAddColumn(QQN::Scanneo()->CreatedByObject,'Name=Creado Por');
		$this->dtgScanneos->MetaAddColumn('UpdatedAt','Name=F.Edicion');
		$this->dtgScanneos->MetaAddColumn(QQN::Scanneo()->UpdatedByObject,'Name=Editado Por');

        $this->btnExpoExce_Create();
        $this->btnBuscPiez_Create();
        $this->btnClosCont_Create();

    }


	protected function colContSele_Click() {
		$this->mensaje();
    }

	protected function btnClosCont_Create() {
		$this->btnClosCont = new QButtonP($this);
		$this->btnClosCont->Text = TextoIcono('lock','Cerrar','F','lg');
		$this->btnClosCont->AddAction(new QClickEvent(), new QServerAction('btnClosCont_Click'));
	}


	protected function btnClosCont_Click() {
		$arrIdxxSele = $this->colContSele->GetChangedIds();
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::In(QQN::Scanneo()->Id, array_keys($arrIdxxSele));
		$arrScanSele   = Scanneo::QueryArray(QQ::AndCondition($objClauWher));
		$intCantScan   = 0;
		foreach ($arrScanSele as $objScanSele) {
			if (!$objScanSele->EstaCerrado) {
				$objScanSele->Cerrar();
				$intCantScan++;
			}
		}
		$this->dtgScanneos->Refresh();
		$this->success("Scanneos Cerrados: $intCantScan");
	}


	protected function btnBuscPiez_Create() {
		$this->btnBuscPiez = new QButtonI($this);
		$this->btnBuscPiez->Text = TextoIcono('search','Buscar','F','lg');
		$this->btnBuscPiez->AddAction(new QClickEvent(), new QServerAction('btnBuscPiez_Click'));
	}

	protected function btnBuscPiez_Click() {
		QApplication::Redirect(__SIST__.'/buscar_pieza_mia.php');
	}
	
	protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/scanneo_mia_edit.php');
    }

    public function Piezas(Scanneo $objScaneo) {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::ScanneoPiezas()->ScanneoId,$objScaneo->Id);
        //$objClauWher[] = QQ::IsNull(QQN::ScanneoPiezas()->GuiaPiezaId);

        return ScanneoPiezas::QueryCount(QQ::AndCondition($objClauWher));

    }

	public function dtgScanneosRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("scanneo_mia_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// scanneo_list.tpl.php as the included HTML template file
ScanneoMiaListForm::Run('ScanneoMiaListForm');
?>
