<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/OpcionListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Opcion class.  It uses the code-generated
 * OpcionDataGrid control which has meta-methods to help with
 * easily creating/defining Opcion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both opcion_list.php AND
 * opcion_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class OpcionListForm extends OpcionListFormBase {
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

        $this->lblMensUsua_Create();
        $this->lblTituForm_Create();

        // Instantiate the Meta DataGrid
        $this->dtgOpcions = new OpcionDataGrid($this);
        $this->dtgOpcions->FontSize = 13;

        // Style the DataGrid (if desired)
        $this->dtgOpcions->CssClass = 'datagrid';
        $this->dtgOpcions->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgOpcions->Paginator = new QPaginator($this->dtgOpcions);
        $this->dtgOpcions->ItemsPerPage = 16; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgOpcions->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgOpcions->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgOpcions->RowActionParameterHtml = '<?= $_ITEM->CodiOpci ?>';
        $this->dtgOpcions->AddRowAction(new QClickEvent(), new QAjaxAction('dtgOpcionsRow_Click'));

        $this->dtgOpcions->AdditionalConditions = QQ::Equal(QQN::Opcion()->CodiSist,$_SESSION['Sistema']);

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for opcion's properties, or you
        // can traverse down QQN::opcion() to display fields that are down the hierarchy)
        $colIdxxOpci = $this->dtgOpcions->MetaAddColumn('CodiOpci');
        $colIdxxOpci->FilterType = null;

        $colDescOpci = $this->dtgOpcions->MetaAddColumn('DescOpci');
        $colDescOpci->FilterBoxSize = 12;

//        $colSistOpci = $this->dtgOpcions->MetaAddColumn(QQN::Opcion()->CodiSist);
//        $colSistOpci->Name = 'Sistema';
//        $colSistOpci->FilterType = null;

        $colTipoOpci = $this->dtgOpcions->MetaAddTypeColumn('CodiTipo', 'TipoOpciType');
        $colTipoOpci->FilterType = QFilterType::ListFilter;
        foreach (TipoOpciType::$NameArray as $value => $name)
            $colTipoOpci->FilterAddListItem($name, QQ::Equal(QQN::Opcion()->CodiTipo, $value));

        $colCodiStat = $this->dtgOpcions->MetaAddColumn('CodiStat');

        $colNombProg = $this->dtgOpcions->MetaAddColumn('NombProg');
        $colNombProg->FilterBoxSize = 20;

        $colDireOpci = $this->dtgOpcions->MetaAddColumn('PathOpci');
        $colDireOpci->FilterBoxSize = 6;

        $colOpciDepe = $this->dtgOpcions->MetaAddColumn('NumeDepe');
		$colOpciDepe->Name = 'Depende De';

//		$colOpciDepe = $this->dtgOpcions->MetaAddColumn(QQN::Opcion()->NumeDepeObject);
//		$colOpciDepe->Filter = QQ::Like(QQN::Opcion()->NumeDepeObject->DescOpci,null);
//		$colOpciDepe->FilterPostfix = "%";

        $colPosiOpci = $this->dtgOpcions->MetaAddColumn('PosiOpci');
        $colPosiOpci->FilterType = null;

        $this->dtgOpcions->MetaAddColumn('ImagOpci');

        $colNiveOpci = $this->dtgOpcions->MetaAddColumn('Nivel');
        $colNiveOpci->FilterBoxSize = 2;
    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Opciones';
    }

    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
        $this->lblMensUsua->Text = '';
    }

    public function dtgOpcionsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("opcion_edit.php/$intId");
    }

}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// opcion_list.tpl.php as the included HTML template file
OpcionListForm::Run('OpcionListForm');
?>
