<?php
/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the GuiaCheckpoints class.  It uses the code-generated
 * GuiaCheckpointsDataGrid control which has meta-methods to help with
 * easily creating/defining GuiaCheckpoints columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_checkpoints_list.php AND
 * guia_checkpoints_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class GuiaCheckpointsListFormBase extends QForm {
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $lblTituForm;
    protected $btnNuevRegi;
    protected $btnFiltAvan;
    protected $btnExpoExce;

    // Local instance of the Meta DataGrid to list GuiaCheckpointses
    /**
     * @var GuiaCheckpointsDataGrid dtgGuiaCheckpointses
     */
    protected $dtgGuiaCheckpointses;

    // Create QForm Event Handlers as Needed

    //		protected function Form_Exit() {}
    //		protected function Form_Load() {}
    //		protected function Form_PreRender() {}
    //		protected function Form_Validate() {}

    protected function Form_Run() {
        parent::Form_Run();
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblMensUsua_Create();
        $this->lblNotiUsua_Create();
        $this->lblTituForm_Create();
        $this->btnNuevRegi_Create();
        $this->btnFiltAvan_Create();

        // Instantiate the Meta DataGrid
        $this->dtgGuiaCheckpointses = new GuiaCheckpointsDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgGuiaCheckpointses->CssClass = 'datagrid';
        $this->dtgGuiaCheckpointses->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgGuiaCheckpointses->FontSize = 13;
        $this->dtgGuiaCheckpointses->ShowFilter = false;

        // Add Pagination (if desired)
        $this->dtgGuiaCheckpointses->Paginator = new QPaginator($this->dtgGuiaCheckpointses);
        $this->dtgGuiaCheckpointses->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgGuiaCheckpointses->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuiaCheckpointses->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgGuiaCheckpointses->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgGuiaCheckpointses->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiaCheckpointsesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for guia_checkpoints's properties, or you
        // can traverse down QQN::guia_checkpoints() to display fields that are down the hierarchy)
        $this->dtgGuiaCheckpointses->MetaAddColumn(QQN::GuiaCheckpoints()->Guia);
        $this->dtgGuiaCheckpointses->MetaAddColumn('CodiClie');
        $this->dtgGuiaCheckpointses->MetaAddColumn('ClienteId');
        $this->dtgGuiaCheckpointses->MetaAddColumn('NombRemi');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechGuia');
        $this->dtgGuiaCheckpointses->MetaAddColumn('EstaOrig');
        $this->dtgGuiaCheckpointses->MetaAddColumn('EstaDest');
        $this->dtgGuiaCheckpointses->MetaAddColumn('SistemaId');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaAR');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaAV');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaBC');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaBG');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaCG');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaCS');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDA');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDD');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDE');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDF');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDI');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDM');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDP');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDR');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaDV');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaEA');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaEC');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaEE');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaEI');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaEM');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaER');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaEU');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaEX');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaFA');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaFB');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaFC');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaFE');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaFK');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaFR');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaIC');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaKM');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaKT');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaKU');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaKX');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaMA');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaMD');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaMG');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaNA');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaNC');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaNR');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaNT');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaOE');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaOK');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaOT');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaPA');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaPC');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaPP');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaPS');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaPU');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRA');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRC');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRD');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRE');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRK');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRM');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRN');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRR');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaRZ');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaSE');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaSF');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaSM');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaSR');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaSS');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaTR');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaTU');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaTV');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaVD');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaWM');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaWT');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaWU');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaWX');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaZN');
        $this->dtgGuiaCheckpointses->MetaAddColumn('FechaZR');

        $this->btnExpoExce_Create();

    }

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'GuiaCheckpointses';
    }

    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
        $this->lblMensUsua->Text = '';
        $this->lblMensUsua->HtmlEntities = false;
    }

    protected function lblNotiUsua_Create() {
        $this->lblNotiUsua = new QLabel($this);
        $this->lblNotiUsua->Text = '';
        $this->lblNotiUsua->HtmlEntities = false;
    }

    protected function btnNuevRegi_Create() {
        $this->btnNuevRegi = new QButton($this);
        $this->btnNuevRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
        $this->btnNuevRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnNuevRegi->HtmlEntities = false;
        $this->btnNuevRegi->AddAction(new QClickEvent(), new QServerAction('btnNuevRegi_Click'));
    }

    protected function btnFiltAvan_Create() {
        $this->btnFiltAvan = new QButton($this);
        $this->btnFiltAvan->Text = '<i class="fa fa-filter fa-lg"></i> Filtro';
        $this->btnFiltAvan->CssClass = 'btn btn-success btn-sm';
        $this->btnFiltAvan->HtmlEntities = false;
        $this->btnFiltAvan->AddAction(new QClickEvent(), new QServerAction('btnFiltAvan_Click'));
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgGuiaCheckpointses);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/guia_checkpoints_edit.php');
    }

    protected function btnFiltAvan_Click() {
        $this->dtgGuiaCheckpointses->ShowFilter = !$this->dtgGuiaCheckpointses->ShowFilter;
    }

    public function dtgGuiaCheckpointsesRow_Click($strFormId, $strControlId, $strParameter) {
      $intId = intval($strParameter);
      QApplication::Redirect("guia_checkpoints_edit.php/$intId");
    }


    protected function ninfo($strTextMens) {
        $this->mensaje($strTextMens,'n','i',null,__iINFO__);
    }

    protected function ndanger($strTextMens) {
        $this->mensaje($strTextMens,'n','d',null,__iHAND__);
    }

    protected function nwarning($strTextMens) {
        $this->mensaje($strTextMens,'n','w',null,__iEXCL__);
    }

    protected function nsuccess($strTextMens) {
        $this->mensaje($strTextMens,'n','s',null,__iCHEC__);
    }


    protected function info($strTextMens) {
        $this->mensaje($strTextMens,'m','i',null,__iINFO__);
    }

    protected function danger($strTextMens) {
        $this->mensaje($strTextMens,'m','d',null,__iHAND__);
    }

    protected function warning($strTextMens) {
        $this->mensaje($strTextMens,'m','w',null,__iEXCL__);
    }

    protected function success($strTextMens) {
        $this->mensaje($strTextMens,'m','s',null,__iCHEC__);
    }


    protected function mensaje($strTextNoti='', $strTipoMens='m', $strClasMens='s', $strPosiIcon='l', $strNombIcon='') {
        if (strlen($strTextNoti) == 0) {
            $this->lblMensUsua->Text = '';
            $this->lblMensUsua->HtmlEntities = false;
            $this->lblMensUsua->CssClass = '';
            $this->lblNotiUsua->Text = '';
            $this->lblNotiUsua->HtmlEntities = false;
            $this->lblNotiUsua->CssClass = '';
        } else {
            //------------------------------------------
            // Aqui se determina el estilo del mensaje
            //------------------------------------------
            $strClasAsig = 'alert alert-';
            switch (strtolower($strClasMens)) {
                case 'i':
                    $strClasAsig .= 'info';
                    break;
                case 's':
                    $strClasAsig .= 'success';
                    break;
                case 'w':
                    $strClasAsig .= 'warning';
                    break;
                case 'd':
                    $strClasAsig .= 'danger';
                    break;
                default:
                    $strClasAsig .= 'success';
            }
            if (strlen($strNombIcon) > 0) {
                $strNombIcon = '<i class="fa fa-'.$strNombIcon.' fa-lg"></i> ';
            }
            if ($strPosiIcon == 'i') {
                //---------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //---------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            } elseif ($strPosiIcon == 'r') {
                //---------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //---------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            } else {
                //-----------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //-----------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            }
        }
    }
}
?>
