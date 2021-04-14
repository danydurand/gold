<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CounterListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Counter class.  It uses the code-generated
 * CounterDataGrid control which has meta-methods to help with
 * easily creating/defining Counter columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both counter_list.php AND
 * counter_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CounterListForm extends CounterListFormBase {
    protected $btnCreaRegi;

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

        $this->lblMensUsua_Create();
        $this->lblTituForm_Create();

        $this->btnCreaRegi_Create();

        // Instantiate the Meta DataGrid
        $this->dtgCounters = new CounterDataGrid($this);
        $this->dtgCounters->FontSize = 13;
        $this->dtgCounters->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgCounters->CssClass = 'datagrid';
        $this->dtgCounters->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgCounters->Paginator = new QPaginator($this->dtgCounters);
        $this->dtgCounters->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgCounters->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgCounters->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgCounters->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgCounters->AddRowAction(new QClickEvent(), new QAjaxAction('dtgCountersRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for counter's properties, or you
        // can traverse down QQN::counter() to display fields that are down the hierarchy)
        $colReceIdxx = $this->dtgCounters->MetaAddColumn('Id');
        $colReceIdxx->FilterType = null;

        //Filter = QQ::Like(QQN::Cliente()->Estado->Nombre,null);
        //FilterPrefix = $colNombVend->FilterPostfix = '%';
        $this->dtgCounters->MetaAddColumn('Siglas');
        $this->dtgCounters->MetaAddColumn('Descripcion');

        $colNombSuce = $this->dtgCounters->MetaAddColumn(QQN::Counter()->Sucursal->DescEsta);
        $colNombSuce->Name = 'Sucursal';
        $colNombSuce->FilterType = QFilterType::TextFilter;
        $colNombSuce->FilterPrefix = '%';
        $colNombSuce->FilterPostfix = '%';

        $colReceStat = $this->dtgCounters->MetaAddTypeColumn('StatusId', 'StatusType');
        $colReceStat->Name = 'Estatus';
        $colReceStat->FilterType = QFilterType::ListFilter;
        $colReceStat->FilterAddListItem('ACTIVO',QQ::Equal(QQN::Counter()->StatusId,StatusType::ACTIVO));
        $colReceStat->FilterAddListItem('INACTIVO',QQ::Equal(QQN::Counter()->StatusId,StatusType::INACTIVO));

        $colReceRuta = $this->dtgCounters->MetaAddTypeColumn('EsRuta', 'SinoType');
        $colReceRuta->Name = 'DOM?';
        $colReceRuta->FilterType = QFilterType::ListFilter;
        $colReceRuta->FilterAddListItem('SI',QQ::Equal(QQN::Counter()->EsRuta,SinoType::SI));
        $colReceRuta->FilterAddListItem('NO',QQ::Equal(QQN::Counter()->EsRuta,SinoType::NO));
    }

    //----------------------------
    // Aqui se crean los objetos
    //----------------------------
    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Receptorías';
    }

    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
        $this->lblMensUsua->Text = '';
    }

    protected function btnCreaRegi_Create() {
        $this->btnCreaRegi = new QButton($this);
        $this->btnCreaRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
        $this->btnCreaRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnCreaRegi->HtmlEntities = false;
        $this->btnCreaRegi->AddAction(new QClickEvent(), new QServerAction('btnCreaRegi_Click'));
    }

    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------
    public function btnCreaRegi_Click() {
        QApplication::Redirect('counter_edit.php');
    }

    public function dtgCountersRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("counter_edit.php/$intId");
    }
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// counter_list.tpl.php as the included HTML template file
CounterListForm::Run('CounterListForm');
?>