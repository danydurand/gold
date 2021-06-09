<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaTransportistaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the GuiaTransportista class.  It uses the code-generated
 * GuiaTransportistaDataGrid control which has meta-methods to help with
 * easily creating/defining GuiaTransportista columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_transportista_list.php AND
 * guia_transportista_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiaTransportistaListForm extends GuiaTransportistaListFormBase {
	protected $colRegiSele;
	protected $btnBorrProc;


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

		$this->lblTituForm->Text = 'Guia-Transportista';

		// Instantiate the Meta DataGrid
		$this->dtgGuiaTransportistas = new GuiaTransportistaDataGrid($this);
		$this->dtgGuiaTransportistas->FontSize = 13;
		$this->dtgGuiaTransportistas->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgGuiaTransportistas->CssClass = 'datagrid';
		$this->dtgGuiaTransportistas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgGuiaTransportistas->Paginator = new QPaginator($this->dtgGuiaTransportistas);
		$this->dtgGuiaTransportistas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgGuiaTransportistas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGuiaTransportistas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		/*$this->dtgGuiaTransportistas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';*/
		//$this->dtgGuiaTransportistas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiaTransportistasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guia_transportista's properties, or you
		// can traverse down QQN::guia_transportista() to display fields that are down the hierarchy)

        $this->colRegiSele = new QCheckBoxColumn('', $this->dtgGuiaTransportistas);
        $this->colRegiSele->PrimaryKey = 'Id';
        $this->dtgGuiaTransportistas->AddColumn($this->colRegiSele);
        $this->dtgGuiaTransportistas->AddAction(new QClickEvent(), new QAjaxAction('colRegiSele_Click'));

        //$this->dtgGuiaTransportistas->MetaAddColumn('Id');
		$this->dtgGuiaTransportistas->MetaAddColumn(QQN::GuiaTransportista()->Transportista);
		$this->dtgGuiaTransportistas->MetaAddColumn(QQN::GuiaTransportista()->GuiaPieza);
		$this->dtgGuiaTransportistas->MetaAddColumn('Guia','Name=Guia Transportista');
		$this->dtgGuiaTransportistas->MetaAddColumn('ProcesoId');
		//$this->dtgGuiaTransportistas->MetaAddColumn('CreatedAt');
		//$this->dtgGuiaTransportistas->MetaAddColumn('UpdatedAt');
		//$this->dtgGuiaTransportistas->MetaAddColumn('CreatedBy');
		//$this->dtgGuiaTransportistas->MetaAddColumn('UpdatedBy');

        $this->btnExpoExce_Create();
        $this->btnBorrProc_Create();

    }

    protected function btnBorrProc_Create() {
        $this->btnBorrProc = new QButtonD($this);
        $this->btnBorrProc->Text = '<i class="fa fa-trash fa-lg"></i> Borrar';
        $this->btnBorrProc->Visible = false;
        $this->btnBorrProc->AddAction(new QClickEvent(), new QAjaxAction('btnBorrProc_Click'));
    }

    protected function colRegiSele_Click() {
		$this->mensaje();
        $arrIdxxSele = $this->colRegiSele->GetChangedIds();
        if (count($arrIdxxSele) > 0) {
            $this->btnBorrProc->Visible = true;
        } else {
            $this->btnBorrProc->Visible = false;
        }
    }

    protected function btnBorrProc_Click() {
        $arrIdxxSele = $this->colRegiSele->GetChangedIds();
        $strIdxxSele = implode(',',array_keys($arrIdxxSele));
        $strCadeSqlx = "delete from guia_transportista where id in ($strIdxxSele)";
        $objDatabase = GuiaTransportista::GetDatabase();
        $objDatabase->NonQuery($strCadeSqlx);
        $this->dtgGuiaTransportistas->Refresh();
        $this->btnBorrProc->Visible = false;
        $this->success("Transacción Exitosa !!!");
    }

    public function btnNuevRegi_Click()
    {
        QApplication::Redirect(__SIST__.'/carga_guias_transportista.php');
    }

    public function dtgGuiaTransportistasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("guia_transportista_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_transportista_list.tpl.php as the included HTML template file
GuiaTransportistaListForm::Run('GuiaTransportistaListForm');
?>
