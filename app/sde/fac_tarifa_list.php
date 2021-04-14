<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacTarifaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the FacTarifa class.  It uses the code-generated
 * FacTarifaDataGrid control which has meta-methods to help with
 * easily creating/defining FacTarifa columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both fac_tarifa_list.php AND
 * fac_tarifa_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacTarifaListForm extends FacTarifaListFormBase {
    protected $btnMasxAcci;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

	//	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();
        $this->lblTituForm->Text = 'Tarifas';

		// Instantiate the Meta DataGrid
		$this->dtgFacTarifas = new FacTarifaDataGrid($this);
		$this->dtgFacTarifas->FontSize = 13;
		$this->dtgFacTarifas->ShowFilter = false;
		$this->dtgFacTarifas->SortColumnIndex = 0;
		$this->dtgFacTarifas->SortDirection = 1;

		// Style the DataGrid (if desired)
		$this->dtgFacTarifas->CssClass = 'datagrid';
		$this->dtgFacTarifas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgFacTarifas->Paginator = new QPaginator($this->dtgFacTarifas);
		$this->dtgFacTarifas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgFacTarifas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgFacTarifas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgFacTarifas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgFacTarifas->AddRowAction(new QClickEvent(), new QAjaxAction('dtgFacTarifasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for fac_tarifa's properties, or you
		// can traverse down QQN::fac_tarifa() to display fields that are down the hierarchy)
		$colIdxxTari = $this->dtgFacTarifas->MetaAddColumn('Id');
		$colIdxxTari->Width = 50;
		$colDescTari = $this->dtgFacTarifas->MetaAddColumn('Descripcion');
		$colDescTari->Width = 300;

        $colCantClie = new QDataGridColumn('CNT CLTES','<?= $_FORM->dtgFT_CantClie_Render($_ITEM); ?>');
        $colCantClie->Width = 75;
        $this->dtgFacTarifas->AddColumn($colCantClie);

        //$this->dtgFacTarifas->MetaAddTypeColumn('TipoTarifa', 'FacTipoTarifaType');
		//$this->dtgFacTarifas->MetaAddColumn('PesoInicial');
		// $this->dtgFacTarifas->MetaAddColumn('ValorIncremento');

        $colValoIncr = new QDataGridColumn('INCR. NAC.','<?= $_FORM->dtgFT_ValorIncr_Render($_ITEM); ?>');
        $colValoIncr->Width = 75;
        $this->dtgFacTarifas->AddColumn($colValoIncr);

		// $this->dtgFacTarifas->MetaAddTypeColumn('MedidaIncremento', 'FacMedidaType');

		// $this->dtgFacTarifas->MetaAddColumn('IncrementoUrbano');
        /*$colIncrUrba = new QDataGridColumn('INCR. URB.','<?= $_FORM->dtgFT_IncrUrba_Render($_ITEM); ?>');*/
        //$colIncrUrba->Width = 75;
        //$this->dtgFacTarifas->AddColumn($colIncrUrba);

        //$this->dtgFacTarifas->MetaAddColumn('PesoInicialUrbano');

        $this->btnExpoExce_Create();
        $this->btnMasxAcci_Create();

        unset($_SESSION['TariAnte']);
        unset($_SESSION['TipoAnte']);
    }

    //----------------------------
    // Aqui se crean los objetos
    //----------------------------

    public function dtgFT_CantClie_Render(FacTarifa $objTariPeso) {
	    if ($objTariPeso) {
	        return $objTariPeso->__cantClientes();
        } else {
            return null;
        }
    }

    public function dtgFT_ValorIncr_Render(FacTarifa $objTariPeso) {
	    if ($objTariPeso->ValorIncremento) {
	        return nf($objTariPeso->ValorIncremento);
        } else {
            return null;
        }
    }

    public function dtgFT_IncrUrba_Render(FacTarifa $objTariPeso) {
	    if ($objTariPeso->IncrementoUrbano) {
	        return nf($objTariPeso->IncrementoUrbano);
        } else {
            return null;
        }
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';
        //---------------------------------------
        // Para opción "Programar Cambio Tarifa"
        //---------------------------------------
        $strNombIcon   = 'refresh';
        $strTextIcon   = 'Programar Cambio de Tarifa';
        //-----------------------------
        // Para opción "Copiar Tarifa"
        //-----------------------------
        $strCopyIcon   = 'files-o';
        $strCopyText   = 'Copiar Tarifa';
        //-----------------------------------------------------
        // Vector para guardar las opciones del botón dropdown
        //-----------------------------------------------------
        $arrOpciDrop   = array();
        $arrOpciDrop[] = OpcionDropDown('cambio_tarifa_edit.php',TextoIcono($strNombIcon,$strTextIcon));
        // $arrOpciDrop[] = OpcionDropDown('copiar_tarifa_peso.php',TextoIcono($strCopyIcon,$strCopyText));
        $strTextBoto   = TextoIcono('cog fa-fw','Mas');
        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);
    }

    public function dtgFacTarifasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("fac_tarifa_edit.php/$intId");
	}		
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// fac_tarifa_list.tpl.php as the included HTML template file
FacTarifaListForm::Run('FacTarifaListForm');
?>