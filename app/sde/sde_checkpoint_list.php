<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SdeCheckpointListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the SdeCheckpoint class.  It uses the code-generated
 * SdeCheckpointDataGrid control which has meta-methods to help with
 * easily creating/defining SdeCheckpoint columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sde_checkpoint_list.php AND
 * sde_checkpoint_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class SdeCheckpointListForm extends SdeCheckpointListFormBase {
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

        $this->lblTituForm->Text = 'Checkpoints';
        $this->lblMensUsua->Text = '';

        // Instantiate the Meta DataGrid
        $this->dtgSdeCheckpoints = new SdeCheckpointDataGrid($this);
        $this->dtgSdeCheckpoints->FontSize = 13;
        $this->dtgSdeCheckpoints->ShowFilter = false;

        // Los registros "Borrados" no deben mostrarse
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNull(QQN::SdeCheckpoint()->DeleteAt);
        $objClauWher[] = QQ::Equal(QQN::SdeCheckpoint()->TextObse,'SDE');
        $this->dtgSdeCheckpoints->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Style the DataGrid (if desired)
        $this->dtgSdeCheckpoints->CssClass = 'datagrid';
        $this->dtgSdeCheckpoints->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgSdeCheckpoints->Paginator = new QPaginator($this->dtgSdeCheckpoints);
        $this->dtgSdeCheckpoints->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgSdeCheckpoints->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgSdeCheckpoints->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgSdeCheckpoints->RowActionParameterHtml = '<?= $_ITEM->CodiCkpt ?>';
        $this->dtgSdeCheckpoints->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSdeCheckpointsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for sde_checkpoint's properties, or you
        // can traverse down QQN::sde_checkpoint() to display fields that are down the hierarchy)
        $colCodiCkpt = $this->dtgSdeCheckpoints->MetaAddColumn('CodiCkpt');
        $colCodiCkpt->FilterBoxSize = 2;

        $colStatGuia = new QDataGridColumn('IMAGEN', '<?= $_FORM->IconoColumnRender($_ITEM) ?>');
        $colStatGuia->HtmlEntities = false;
        $colStatGuia->Width        = 10;
        $this->dtgSdeCheckpoints->AddColumn($colStatGuia);

        $colDescCkpt = $this->dtgSdeCheckpoints->MetaAddColumn('DescCkpt');
        $colDescCkpt->Name = 'Descripción';
        $colDescCkpt->FilterBoxSize = 20;

        $colDescDevo = $this->dtgSdeCheckpoints->MetaAddColumn('DescDevo');
        $colDescDevo->Name = 'Descripción para la Extranet';
        $colDescDevo->FilterBoxSize = 20;

        $colCierCilo = $this->dtgSdeCheckpoints->MetaAddTypeColumn('TipoTerm','SinoType');
        $colCierCilo->Name = 'Cier. Ciclo?';

        $colTipoCkpt = $this->dtgSdeCheckpoints->MetaAddTypeColumn('TipoCkpt', 'SdeTipoCkptType');
        $colTipoCkpt->Name = 'Tipo';

        $this->dtgSdeCheckpoints->MetaAddTypeColumn('Notificar', 'SinoType');

        $this->dtgSdeCheckpoints->MetaAddTypeColumn('CodiStat', 'StatusType');

        $this->btnExpoExce_Create();
    }

    public function IconoColumnRender(SdeCheckpoint $objCkpt) {
        if (!$objCkpt) {
            return null;
        }
        if (is_null($objCkpt->Imagen)) {
            return null;
        }
        if (strlen($objCkpt->Imagen) == 0) {
            return null;
        }
        return TextoIconoColor($objCkpt->Imagen,'','','lg',$objCkpt->Color);
    }


    public function dtgSdeCheckpointsRow_Click($strFormId, $strControlId, $strParameter) {
        $strCodiCkpt = trim($strParameter);
        QApplication::Redirect("sde_checkpoint_edit.php/$strCodiCkpt");
    }
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// sde_checkpoint_list.tpl.php as the included HTML template file
SdeCheckpointListForm::Run('SdeCheckpointListForm');
?>