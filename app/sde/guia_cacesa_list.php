<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaCacesaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the GuiaCacesa class.  It uses the code-generated
 * GuiaCacesaDataGrid control which has meta-methods to help with
 * easily creating/defining GuiaCacesa columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_cacesa_list.php AND
 * guia_cacesa_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiaCacesaListForm extends GuiaCacesaListFormBase {
	protected $btnCancel;
	protected $colGuiaSele;
	protected $btnDeleSele;
	/* @var $objManiAjus NotaEntrega */
	protected $objManiAjus;
	protected $lblRefeMani;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

    protected function SetupValores() {
        $intManiIdxx = $_SESSION['ManiAjus'];
        if ($intManiIdxx) {
            $this->objManiAjus = NotaEntrega::Load($intManiIdxx);
            if (!$this->objManiAjus) {
                $this->danger('Manifiesto sin Referencia');
            }
        } else {
            $this->danger('Manifiesto sin Referencia');
        }
    }

	//	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

		$this->SetupValores();

		$this->lblTituForm->Text = 'Guías por corregir';
		$this->btnNuevRegi->Visible = false;

		$this->lblRefeMani_Create();

		$this->btnCancel_Create();

		// Instantiate the Meta DataGrid
		$this->dtgGuiaCacesas = new GuiaCacesaDataGrid($this);
		$this->dtgGuiaCacesas->FontSize = 13;
		$this->dtgGuiaCacesas->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgGuiaCacesas->CssClass = 'datagrid';
		$this->dtgGuiaCacesas->AlternateRowStyle->CssClass = 'alternate';

		//t('Manif: '.$this->objManiAjus->Id);
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Ajustar,SinoType::SI);
		$objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->NotaEntregaId,$this->objManiAjus->Id);
		$this->dtgGuiaCacesas->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Add Pagination (if desired)
		$this->dtgGuiaCacesas->Paginator = new QPaginator($this->dtgGuiaCacesas);
		$this->dtgGuiaCacesas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgGuiaCacesas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGuiaCacesas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgGuiaCacesas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgGuiaCacesas->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgGuiaCacesasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guia_cacesa's properties, or you
		// can traverse down QQN::guia_cacesa() to display fields that are down the hierarchy)

        $this->colGuiaSele = new QCheckBoxColumn('', $this->dtgGuiaCacesas);
        $this->colGuiaSele->PrimaryKey = 'Id';
        $this->dtgGuiaCacesas->AddColumn($this->colGuiaSele);
        $this->dtgGuiaCacesas->AddAction(new QClickEvent(), new QAjaxAction('colGuiaSele_Click'));

        //$this->dtgGuiaCacesas->MetaAddColumn('Id');
        $this->dtgGuiaCacesas->MetaAddColumn('GuiaExte','Name="Guía Cliente"');

        $colFechCarg = new QDataGridColumn('FECHA CARG','<?= $_ITEM->FechCarg->__toString("DD/MM/YYYY") ?>');
        $this->dtgGuiaCacesas->AddColumn($colFechCarg);

        $this->dtgGuiaCacesas->MetaAddColumn('OrigGuia','Name=Orig');

		$this->dtgGuiaCacesas->MetaAddColumn('DestGuia','Name=Dest');

		$this->dtgGuiaCacesas->MetaAddColumn('ServicioImportacion','Name=S.Impor');

		$this->dtgGuiaCacesas->MetaAddColumn('NombRemi','Name=Cliente');

		$this->dtgGuiaCacesas->MetaAddColumn('Observacion');

		$this->dtgGuiaCacesas->MetaAddColumn('RegistradoPor','Name=Regis. Por');

		//$this->dtgGuiaCacesas->MetaAddColumn(QQN::GuiaCacesa()->NotaEntrega->Referencia,'Name=Manif.');

        $this->btnExpoExce_Create();
        $this->btnDeleSele_Create();
    }

    protected function lblRefeMani_Create() {
	    $this->lblRefeMani = new QLabel($this);
	    $this->lblRefeMani->Name = 'Manifiesto';
	    $this->lblRefeMani->Text = $this->objManiAjus->Referencia;
    }

	protected function btnExpoExce_Create() {
		$this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgGuiaCacesas);
		$this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
		$this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
		$this->btnExpoExce->HtmlEntities = false;
		$this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
		$this->btnExpoExce->Visible = true;
	}

	protected function btnDeleSele_Create() {
		$this->btnDeleSele = new QButtonD($this);
        $this->btnDeleSele->Text = '<i class="fa fa-trash fa-lg"></i> Borrar';
		$this->btnDeleSele->Visible = false;
		$this->btnDeleSele->AddAction(new QClickEvent(), new QAjaxAction('btnDeleSele_Click'));
	}

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = TextoIcono('mail-reply','Volver','','lg');
		$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
		$this->btnCancel->CssClass = 'btn btn-warning btn-sm';
		$this->btnCancel->HtmlEntities = 'false';
		$this->btnCancel->CausesValidation = false;
	}

    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function colGuiaSele_Click() {
        $arrIdxxSele = $this->colGuiaSele->GetChangedIds();
        if (count($arrIdxxSele) > 0) {
            $this->btnDeleSele->Visible = true;
        } else {
            $this->btnDeleSele->Visible = false;
        }
    }

    protected function btnDeleSele_Click() {
        $arrIdxxSele = $this->colGuiaSele->GetChangedIds();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::GuiaCacesa()->Id, array_keys($arrIdxxSele));
        $arrDeleGuia   = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));
        $intCantGuia   = 0;
        foreach ($arrDeleGuia as $objDeleGuia) {
            $objDeleGuia->Delete();
            $intCantGuia++;
        }
        $this->dtgGuiaCacesas->Refresh();
        $this->success('Transaccion Exitosa !!! | Guias Borradas: '.$intCantGuia);
    }

	public function dtgGuiaCacesasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("guia_cacesa_edit.php/$intId");
	}

	protected function btnCancel_Click() {
	    $intManuAjus = $_SESSION['ManiAjus'];
		QApplication::Redirect(__SIST__."/carga_masiva_guias.php/".$intManuAjus);
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_cacesa_list.tpl.php as the included HTML template file
GuiaCacesaListForm::Run('GuiaCacesaListForm');
?>