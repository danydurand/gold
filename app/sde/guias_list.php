<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiasListFormBase.class.php');

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Guias class.  It uses the code-generated
 * GuiasDataGrid control which has meta-methods to help with
 * easily creating/defining Guias columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guias_list.php AND
 * guias_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiasListForm extends GuiasListFormBase {
    /* @var $objUsuario Usuario */
    protected $objUsuario;
    protected $objClauWher;
    protected $blnHayxCond;
    protected $arrGuiaLote;

    protected $txtNumeGuia;
    protected $txtBuscCodi;
    protected $txtBuscNomb;
    protected $lstClieGuia;
    protected $calFechInic;
    protected $calFechFina;
    protected $txtNumePrec;

    protected $lstTipoPago;
    protected $lstCodiOrig;
    protected $lstCodiDest;
    protected $lstTienPodx;
    protected $lstCodiCkpt;
    protected $chkGuiaAnul;

    protected $btnBuscRegi;

    protected $btnImprLote;
    protected $btnCancel;

	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

//		protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

        // QApplication::$Database[1]->EnableProfiling();

        $this->lblTituForm->Text = 'Guias';
        $this->objUsuario = unserialize($_SESSION['User']);

		// Instantiate the Meta DataGrid
		$this->dtgGuiases = new GuiasDataGrid($this);
		$this->dtgGuiases->FontSize = 12.5;
		$this->dtgGuiases->ShowFilter =false;

		// Style the DataGrid (if desired)
		$this->dtgGuiases->CssClass = 'datagrid';
		$this->dtgGuiases->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgGuiases->Paginator = new QPaginator($this->dtgGuiases);
		$this->dtgGuiases->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $this->dtgGuiases->SortColumnIndex = 0;
        $this->dtgGuiases->SortDirection = 1;

        // Higlight the datagrid rows when mousing over them
		$this->dtgGuiases->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGuiases->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgGuiases->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgGuiases->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guias's properties, or you
		// can traverse down QQN::guias() to display fields that are down the hierarchy)
		$this->dtgGuiases->MetaAddColumn('Id');

		$this->dtgGuiases->MetaAddColumn('Tracking','Name=Guia-Cliente');

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->Fecha->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guias()->Fecha, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guias()->Fecha);
        $this->dtgGuiases->AddColumn($colFechGuia);

        $colOrigGuia = $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Origen->Iata,'Name=Orig');
        $colOrigGuia->FilterType = QFilterType::TextFilter;
        $colOrigGuia->Filter = QQ::Like(QQN::Guias()->Origen->Iata,null);

        $colDestGuia = $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Destino->Iata, 'Name=Dest');
        $colDestGuia->FilterType = QFilterType::TextFilter;
        $colDestGuia->Filter = QQ::Like(QQN::Guias()->Destino->Iata,null);

        $this->dtgGuiases->MetaAddColumn('ServicioImportacion','Name=Serv');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Piezas, 'Name=Pzas');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->Kilos, 'Name=Kg');
        $this->dtgGuiases->MetaAddColumn(QQN::Guias()->PiesCub, 'Name=P3');
        /*
        $colUltiCkpt = new QDataGridColumn('U.Ckpt','<?= $_ITEM->ultimoCheckpoint(); ?>');
        */
        $colUltiCkpt = new QDataGridColumn('U.Ckpt','<?= $_ITEM->LastCkptCode(); ?>');
        $this->dtgGuiases->AddColumn($colUltiCkpt);

        $this->dtgGuiases->MetaAddColumn('NombreRemitente', 'Name=Remitente');
        $this->dtgGuiases->MetaAddColumn('NombreDestinatario','Name=Destinatario');
        $this->dtgGuiases->MetaAddColumn('Total');

        $this->dtgGuiases->SetDataBinder('dtgGuias_Bind');

        $this->btnExpoExce_Create();
        // $this->btnImprLote_Create();
        $this->btnExpoExce->Visible = true;

        // QApplication::$Database[1]->OutputProfiling();

    }

    protected function btnImprLote_Create() {
        $this->btnImprLote = new QButtonOP($this);
        $this->btnImprLote->Text = TextoIcono('print fa-lg', 'NDE');
        $this->btnImprLote->AddAction(new QClickEvent(), new QAjaxAction('btnImprLote_Click'));
    }

    protected function btnImprLote_Click() {
        $html2pdf = new Html2Pdf('L', 'LETTER', 'es', true, 'UTF-8', array("10", "10", "10", "10"));
        try {
            $strNombArch = 'NDE_' . $this->objUsuario->LogiUsua . '.pdf';

            $intPiezPorl = 10;
            $arrLoteGuia = unserialize($_SESSION['DataGuia']);
            t('Cantidad de guías: '.count($arrLoteGuia));
            $arrLotePiez = [];
            foreach($arrLoteGuia as $objGuiaLote) {
                t('Procesando la guia: '.$objGuiaLote->Tracking);
                $arrPiezGuia = $objGuiaLote->GetGuiaPiezasArray();
                t('La guia tiene: '.$objGuiaLote->CountGuiaPiezas());
                // foreach($arrPiezGuia as $objPiezGuia) {
                //     t('Pieza: '.$objPiezGuia->IdPieza);
                //     $arrLotePiez[] = $objPiezGuia;
                // }
            }
            $intCantPiez = count($arrLotePiez);
            t('Cantidad de piezas: '.$intCantPiez);
            $intCantLote = $intCantPiez / $intPiezPorl;

            $intNumeLote = 1;
            while ($intNumeLote <= $intCantLote) {
                t('Procesando el lote: '.$intNumeLote);
                $k = ($intNumeLote - 1) * $intPiezPorl;
                t('El valor de k es: '.$k);
                $arrLoteActu = [];
                for ($i=0; $i < $intPiezPorl; $i++) {
                    t('Posicion del vector que voy a chequear: '.($k+$i));
                    if ($intCantPiez < ($k + $i)) {
                        t('Esa posicion si existe, asi que la voy a asignar');
                        $arrLoteActu[] = $arrLotePiez[$k + $i];
                    } else {
                        break;
                    }
                }

                // ob_start();
                // foreach ($arrLoteActu as $objPiezGuia) {
                //     $_SESSION['LoteActu'] = serialize($arrLoteActu);
                //     include dirname(__FILE__) . '/rhtml/hoja_entrega_lote_html.php';
                // }
                // $content = ob_get_clean();
                $intNumeLote++;
            }
            return;
            // $html2pdf->setModeDebug();
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content);
            $html2pdf->output($strNombArch);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        } catch (Exception $e) {
            $html2pdf->clean();
            echo $e->getMessage();
        } catch (Error $e) {
            $html2pdf->clean();
            echo $e->getMessage();
        }

    }
    
    protected function dtgGuias_Bind() {
        if (isset($_SESSION['CritCons'])) {
            $this->objClauWher = unserialize($_SESSION['CritCons']);
        } else {
            if (!$this->blnHayxCond) {
                $this->objClauWher[] = QQ::All();
            }
        }

        $this->dtgGuiases->TotalItemCount = Guias::QueryCount(QQ::AndCondition($this->objClauWher));

        $arrGuiaNaci = Guias::QueryArray(
            QQ::AndCondition($this->objClauWher),
            QQ::Clause(
                $this->dtgGuiases->OrderByClause,
                $this->dtgGuiases->LimitClause
            )
        );

        $this->dtgGuiases->DataSource = $arrGuiaNaci;
        $_SESSION['DataGuia'] = serialize($arrGuiaNaci);

        //------------------------------------------------------------------------
        // Query que obtiene todas las guías de la lista sin límite de paginación
        //------------------------------------------------------------------------

        $arrGuiaLote = Guias::QueryArray(
            QQ::AndCondition($this->objClauWher),
            QQ::Clause($this->dtgGuiases->OrderByClause)
        );

        $this->arrGuiaLote = array();

        foreach($arrGuiaLote as $objGuiaLote) {
            $this->arrGuiaLote[] = $objGuiaLote->Id;
        }
    }


    public function dtgGuiasesRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        //QApplication::Redirect("guias_edit.php/$intId");
        QApplication::Redirect(__SIST__."/consulta_guia_new.php/$intId");
	}

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guias_list.tpl.php as the included HTML template file
GuiasListForm::Run('GuiasListForm');
