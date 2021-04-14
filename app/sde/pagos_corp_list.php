<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/PagosCorpListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the PagosCorp class.  It uses the code-generated
 * PagosCorpDataGrid control which has meta-methods to help with
 * easily creating/defining PagosCorp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both pagos_corp_list.php AND
 * pagos_corp_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class PagosCorpListForm extends PagosCorpListFormBase {
	protected $colPagoSele;
	protected $btnConcPago;
	protected $btnIncoPago;
	protected $btnPagoPend;

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

		$this->lblTituForm->Text = 'Pagos Corp';

		// Instantiate the Meta DataGrid
		$this->dtgPagosCorps = new PagosCorpDataGrid($this);
		$this->dtgPagosCorps->FontSize = 13;
		$this->dtgPagosCorps->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgPagosCorps->CssClass = 'datagrid';
		$this->dtgPagosCorps->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgPagosCorps->Paginator = new QPaginator($this->dtgPagosCorps);
		$this->dtgPagosCorps->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgPagosCorps->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgPagosCorps->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgPagosCorps->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgPagosCorps->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgPagosCorpsRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for pagos_corp's properties, or you
		// can traverse down QQN::pagos_corp() to display fields that are down the hierarchy)

        $this->colPagoSele = new QCheckBoxColumn('', $this->dtgPagosCorps);
        $this->colPagoSele->PrimaryKey = 'Id';
        //$this->colPagoSele->SetCheckboxCallback($this, 'dtgPagosCorps_Selected');
        $this->dtgPagosCorps->AddColumn($this->colPagoSele);

        $this->dtgPagosCorps->MetaAddColumn('Id');
		$this->dtgPagosCorps->MetaAddColumn(QQN::PagosCorp()->ClienteCorp);
        $this->dtgPagosCorps->MetaAddColumn('Referencia');
        $this->dtgPagosCorps->MetaAddColumn(QQN::PagosCorp()->FormaPago);
        $colFechPago = new QDataGridColumn('FECHA','<?= $_FORM->FechPago_Render($_ITEM) ?>');
        $this->dtgPagosCorps->AddColumn($colFechPago);
		$this->dtgPagosCorps->MetaAddColumn('Monto');
		$this->dtgPagosCorps->MetaAddColumn('Estatus');
		$this->dtgPagosCorps->MetaAddColumn('Observacion');

        $this->btnExpoExce_Create();
        $this->btnConcPago_Create();
        $this->btnIncoPago_Create();
        $this->btnPagoPend_Create();
        $this->btnNuevRegi->Visible = false;

        $this->mensaje('Utlice Doble-Click para acceder al detalle del Pago','m','i',__iINFO__);
    }

    protected function btnConcPago_Create() {
        $this->btnConcPago = new QButton($this);
        $this->btnConcPago->Text = '<i class="fa fa-file-text-o fa-lg"></i> Conciliar';
        $this->btnConcPago->CssClass = 'btn btn-primary btn-sm';
        $this->btnConcPago->HtmlEntities = false;
        $this->btnConcPago->AddAction(new QClickEvent(), new QAjaxAction('btnConcPago_Click'));
    }

    protected function btnIncoPago_Create() {
        $this->btnIncoPago = new QButton($this);
        $this->btnIncoPago->Text = '<i class="fa fa-file-text-o fa-lg"></i> In-Conciliar';
        $this->btnIncoPago->CssClass = 'btn btn-warning btn-sm';
        $this->btnIncoPago->HtmlEntities = false;
        $this->btnIncoPago->AddAction(new QClickEvent(), new QAjaxAction('btnIncoPago_Click'));
    }

    protected function btnPagoPend_Create() {
        $this->btnPagoPend = new QButton($this);
        $this->btnPagoPend->Text = '<i class="fa fa-file-text-o fa-lg"></i> Pendiente';
        $this->btnPagoPend->CssClass = 'btn btn-default btn-sm';
        $this->btnPagoPend->HtmlEntities = false;
        $this->btnPagoPend->AddAction(new QClickEvent(), new QAjaxAction('btnPagoPend_Click'));
    }


    protected function btnConcPago_Click() {
		$this->mensaje();
        $arrIdxxSele = $this->colPagoSele->GetChangedIds();
        if (count($arrIdxxSele)) {
            $arrPasoSele = PagosCorp::QueryArray(QQ::In(QQN::PagosCorp()->Id, array_keys($arrIdxxSele)));
            $intConcPago = 0;
            foreach ($arrPasoSele as $objPagoSele) {
                if (in_array($objPagoSele->Estatus,['INCONCILIABLE','PENDIENTE'])) {
					$objPagoSele->Estatus = 'CONCILIADO';
					$objPagoSele->Save();

					$arrLogxCamb['strNombTabl'] = 'PagosCorp';
					$arrLogxCamb['intRefeRegi'] = $objPagoSele->Id;
					$arrLogxCamb['strNombRegi'] = $objPagoSele->Referencia;
					$arrLogxCamb['strDescCamb'] = 'Pago CONCILIADO';
					$arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$objPagoSele->Id;
					LogDeCambios($arrLogxCamb);

					$objPagoSele->replicarEstatusPago($objPagoSele->Estatus);

					$this->colPagoSele->SetCheckbox($objPagoSele->Id,false);
					$intConcPago ++;
				}
            }
            if ($intConcPago > 0) {
                $this->dtgPagosCorps->Refresh();
                $strTextMens = "Transaccion Exitosa | <b>$intConcPago Pago(s) Conciliado(s)</b> !!!";
                $this->mensaje($strTextMens, 'm', 's', __iCHEC__);
            } else {
                $strTextMens = "Ningún Pago fue procesado !!!";
                $this->mensaje($strTextMens, 'm', 'i', __iINFO__);
            }
        } else {
        	$strTextMens = 'Debe seleccionar al menos un Pago en estatus PENDIENTE ó INCONCILIABLE';
            $this->mensaje($strTextMens,'m','w',__iEXCL__);
        }
    }

    protected function btnIncoPago_Click() {
		$this->mensaje();
        $arrIdxxSele = $this->colPagoSele->GetChangedIds();
        if (count($arrIdxxSele)) {
            $arrPasoSele = PagosCorp::QueryArray(QQ::In(QQN::PagosCorp()->Id, array_keys($arrIdxxSele)));
            $intIncoPago = 0;
            foreach ($arrPasoSele as $objPagoSele) {
            	if (in_array($objPagoSele->Estatus,['CONCILIADO','PENDIENTE'])) {
                    $objPagoSele->Estatus = 'INCONCILIABLE';
                    $objPagoSele->Save();

                    $arrLogxCamb['strNombTabl'] = 'PagosCorp';
                    $arrLogxCamb['intRefeRegi'] = $objPagoSele->Id;
                    $arrLogxCamb['strNombRegi'] = $objPagoSele->Referencia;
                    $arrLogxCamb['strDescCamb'] = 'Pago INCONCILIABLE';
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$objPagoSele->Id;
                    LogDeCambios($arrLogxCamb);

                    $objPagoSele->replicarEstatusPago($objPagoSele->Estatus);

                    $this->colPagoSele->SetCheckbox($objPagoSele->Id,false);
                    $intIncoPago ++;
                }
            }
            if ($intIncoPago > 0) {
                $this->dtgPagosCorps->Refresh();
                $strTextMens = "Transaccion Exitosa | <b>$intIncoPago Pago(s) marcado(s) como Inconciliable(s)</b>";
                $this->mensaje($strTextMens,'m','w',__iEXCL__);
            } else {
                $strTextMens = "Ningún Pago fue procesado !!!";
                $this->mensaje($strTextMens, 'm', 'i', __iINFO__);
            }
        } else {
        	$strTextMens = 'Debe seleccionar al menos un Pago en estatus PENDIENTE ó CONCILIADO';
            $this->mensaje($strTextMens,'m','w',__iEXCL__);
        }
    }

    protected function btnPagoPend_Click() {
		$this->mensaje();
        $arrIdxxSele = $this->colPagoSele->GetChangedIds();
        if (count($arrIdxxSele)) {
            $arrPasoSele = PagosCorp::QueryArray(QQ::In(QQN::PagosCorp()->Id, array_keys($arrIdxxSele)));
            $intPagoPend = 0;
            foreach ($arrPasoSele as $objPagoSele) {
            	if (in_array($objPagoSele->Estatus,['CONCILIADO','INCONCILIABLE'])) {
                    $objPagoSele->Estatus = 'PENDIENTE';
                    $objPagoSele->Save();

                    $arrLogxCamb['strNombTabl'] = 'PagosCorp';
                    $arrLogxCamb['intRefeRegi'] = $objPagoSele->Id;
                    $arrLogxCamb['strNombRegi'] = $objPagoSele->Referencia;
                    $arrLogxCamb['strDescCamb'] = 'Pago PENDIENTE';
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$objPagoSele->Id;
                    LogDeCambios($arrLogxCamb);

                    $objPagoSele->replicarEstatusPago($objPagoSele->Estatus);

                    $this->colPagoSele->SetCheckbox($objPagoSele->Id,false);
                    $intPagoPend ++;
                }
            }
            if ($intPagoPend > 0) {
                $this->dtgPagosCorps->Refresh();
                $strTextMens = "Transaccion Exitosa | <b>$intPagoPend Pago(s) marcado(s) como Pendiente(s)</b>";
                $this->mensaje($strTextMens,'m','s',__iCHEC__);
            } else {
                $strTextMens = "Ningún Pago fue procesado !!!";
                $this->mensaje($strTextMens, 'm', 'i', __iINFO__);
            }
        } else {
        	$strTextMens = 'Debe seleccionar al menos un Pago en estatus INCONCILIABLE ó CONCILIADO';
            $this->mensaje($strTextMens,'m','w',__iEXCL__);
        }
    }


    public function FechPago_Render(PagosCorp $objPagoCorp) {
        if (!is_null($objPagoCorp->Fecha)) {
            return $objPagoCorp->Fecha->__toString("DD/MM/YYYY");
        } else {
            return null;
        }
    }

    public function dtgPagosCorpsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("pagos_corp_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// pagos_corp_list.tpl.php as the included HTML template file
PagosCorpListForm::Run('PagosCorpListForm');
?>
