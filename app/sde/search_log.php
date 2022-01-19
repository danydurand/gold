<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');


class SearchLog extends FormularioBaseKaizen {

	protected $dtgLogs;

	protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Histórico de Transacciones';

		// Instantiate the Meta DataGrid
		$this->dtgLogs = new LogDataGrid($this);
		$this->dtgLogs->FontSize = 13;
		//$this->dtgLogs->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgLogs->CssClass = 'datagrid';
		$this->dtgLogs->AlternateRowStyle->CssClass = 'alternate';

		$this->dtgLogs->SortColumnIndex = 0;
		$this->dtgLogs->SortDirection = 1;

		// Add Pagination (if desired)
		$this->dtgLogs->Paginator = new QPaginator($this->dtgLogs);
		$this->dtgLogs->ItemsPerPage = 14; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		$colFechCamb = $this->dtgLogs->MetaAddColumn('Fecha');
		$colFechCamb->FilterBoxSize = 8;
		$colFechCamb->Width = 90;

		$colHoraCamb = $this->dtgLogs->MetaAddColumn('Hora');
		$colHoraCamb->FilterBoxSize = 8;
		$colHoraCamb->Width = 90;

		$colUsuaCamb = $this->dtgLogs->MetaAddColumn('Usuario');
		$colUsuaCamb->FilterBoxSize = 5;
		$colUsuaCamb->Width = 75;
		
		$colTablCamb = $this->dtgLogs->MetaAddColumn('Tabla');
		$colTablCamb->FilterBoxSize = 8;
		$colTablCamb->Width = 100;
		
		$colRefeCamb = $this->dtgLogs->MetaAddColumn('Ref');
		$colRefeCamb->FilterBoxSize = 8;
		$colRefeCamb->Width = 40;
		
		$colNombCamb = $this->dtgLogs->MetaAddColumn('Nombre');
		$colNombCamb->FilterBoxSize = 25;
		$colNombCamb->Width = 250;

		// $this->dtgLogs->MetaAddColumn('Delicado');

		// $this->dtgLogs->MetaAddColumn('Ip');

		$colDescCamb = $this->dtgLogs->MetaAddColumn('Descripcion');
		$colDescCamb->FilterBoxSize = 25;

		$colFechCamb->SetActiveFilterState(date('Y-m-d'));

        $_SESSION['BotoNuevRegi'] = false;
        $_SESSION['BotoFiltAvan'] = false;
        $_SESSION['BotoExpoExce'] = false;
        $_SESSION['BotoPopuModa'] = false;

    }

}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// log_list.tpl.php as the included HTML template file
SearchLog::Run('SearchLog');
?>
