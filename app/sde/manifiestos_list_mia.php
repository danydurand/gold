<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/NotaEntregaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the NotaEntrega class.  It uses the code-generated
 * NotaEntregaDataGrid control which has meta-methods to help with
 * easily creating/defining NotaEntrega columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both nota_entrega_list.php AND
 * nota_entrega_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ManifiestosListMia extends NotaEntregaListFormBase {
    protected $btnCambFact;
    protected $colManiSele;
    protected $btnTranHist;
    protected $objProcEjec;
    protected $btnErroProc;


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

		$this->lblTituForm->Text = 'Manifiestos';

		// Instantiate the Meta DataGrid
		$this->dtgNotaEntregas = new NotaEntregaDataGrid($this);
		$this->dtgNotaEntregas->FontSize = 13;
		$this->dtgNotaEntregas->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgNotaEntregas->CssClass = 'datagrid';
		$this->dtgNotaEntregas->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgNotaEntregas->Paginator = new QPaginator($this->dtgNotaEntregas);
		$this->dtgNotaEntregas->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::NotaEntrega()->Id,false);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::NotEqual(QQN::NotaEntrega()->Estatus,'FACTURAD@');
        $this->dtgNotaEntregas->AdditionalClauses = $objClauOrde;
        $this->dtgNotaEntregas->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Higlight the datagrid rows when mousing over them
		$this->dtgNotaEntregas->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgNotaEntregas->AddRowAction(new QMouseOutEvent(), new QCssClassAction());


		$arrUsuaMiam = Usuario::CodigoDeUsuarioDeLaSuc('MIA');
        $objClauWher = QQ::In(QQN::NotaEntrega()->CreatedBy,$arrUsuaMiam);
        $this->dtgNotaEntregas->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgNotaEntregas->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgNotaEntregas->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgNotaEntregasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for nota_entrega's properties, or you
		// can traverse down QQN::nota_entrega() to display fields that are down the hierarchy)

        $this->colManiSele = new QCheckBoxColumn('', $this->dtgNotaEntregas);
        $this->colManiSele->PrimaryKey = 'Id';
        //$this->colManiSele->SetCheckboxCallback($this,'colMarcarSeleccion');
        $this->dtgNotaEntregas->AddColumn($this->colManiSele);
        $this->dtgNotaEntregas->AddAction(new QClickEvent(), new QAjaxAction('colManiSele_Click'));

		$colIdxxMani = $this->dtgNotaEntregas->MetaAddColumn('Id','FilterBoxSize=1');
		$colIdxxMani->FilterType = null;

		$colNombClie = $this->dtgNotaEntregas->MetaAddColumn(QQN::NotaEntrega()->ClienteCorp->NombClie,'Name=Cliente');
        $colNombClie->OrderByClause = QQ::OrderBy(QQN::NotaEntrega()->ClienteCorp->NombClie,false);
        $colNombClie->ReverseOrderByClause = QQ::OrderBy(QQN::NotaEntrega()->ClienteCorp->NombClie);
        $colNombClie->Filter = QQ::Like(QQN::NotaEntrega()->ClienteCorp->NombClie,null);
        $colNombClie->FilterType = QFilterType::TextFilter;
        $colNombClie->FilterBoxSize = 12;
        //$this->dtgNotaEntregas->AddColumn($colNombClie);

        //$this->dtgNotaEntregas->MetaAddColumn(QQN::NotaEntrega()->ClienteCorp,'Name=Cliente');

        $this->dtgNotaEntregas->MetaAddColumn('Referencia','FilterBoxSize=12');
        $colFechMani = new QDataGridColumn('FECHA','<?= $_FORM->FechMani($_ITEM) ?>');
        $this->dtgNotaEntregas->AddColumn($colFechMani);
        $this->dtgNotaEntregas->MetaAddColumn('Estatus','FilterBoxSize=6');
        $this->dtgNotaEntregas->MetaAddColumn('ServicioImportacion', 'Name=S.Impor', 'FilterBoxSize=3');
        $this->dtgNotaEntregas->MetaAddColumn('Facturable','Name=Fctble');
        $colUltiCkpt = new QDataGridColumn('U.Ckpt','<?= $_FORM->colUltiCkpt_Render($_ITEM) ?>');
        $this->dtgNotaEntregas->AddColumn($colUltiCkpt);
        $colUltiFech = new QDataGridColumn('U.Fech','<?= $_FORM->colUltiFech_Render($_ITEM) ?>');
        $this->dtgNotaEntregas->AddColumn($colUltiFech);
        $colUltiSucu = new QDataGridColumn('U.Sucu','<?= $_FORM->colUltiSucu_Render($_ITEM) ?>');
        $this->dtgNotaEntregas->AddColumn($colUltiSucu);
        $colResuPiez = new QDataGridColumn('C | xC | xP | P','<?= $_FORM->colResuPiez_Render($_ITEM) ?>');
        $this->dtgNotaEntregas->AddColumn($colResuPiez);
        $this->dtgNotaEntregas->MetaAddColumn('Kilos', 'FilterBoxSize=2');
        $this->dtgNotaEntregas->MetaAddColumn('PiesCub','Name=Pies3', 'FilterBoxSize=2');
        $this->dtgNotaEntregas->MetaAddColumn('Total', 'FilterBoxSize=1');
        $this->dtgNotaEntregas->MetaAddColumn('FacturaId','Name=Fact','FilterBoxSize=1');

        $this->btnExpoExce_Create();
        $this->btnCambFact_Create();
        $this->btnTranHist_Create();
        $this->btnErroProc_Create();



    }

    //public function colMarcarSeleccion(NotaEntrega $objNotaEntr, QCheckBox $ctl) {
    //    if ($objNotaEntr->Id == 643) {
    //        $ctl->Checked = true;
    //    }
    //}

    public function colUltiCkpt_Render(NotaEntrega $objManiCarg) {
	    $objUltiCkpt = $objManiCarg->ultimoCheckpoint();
	    return $objUltiCkpt instanceof NotaEntregaCkpt ? $objUltiCkpt->Checkpoint->Codigo : null;
    }

    public function colUltiFech_Render(NotaEntrega $objManiCarg) {
	    $objUltiCkpt = $objManiCarg->ultimoCheckpoint();
	    return $objUltiCkpt instanceof NotaEntregaCkpt ? $objUltiCkpt->Fecha->__toString("DD/MM/YYYY") : null;
    }

    public function colUltiSucu_Render(NotaEntrega $objManiCarg) {
	    $objUltiCkpt = $objManiCarg->ultimoCheckpoint();
	    return $objUltiCkpt instanceof NotaEntregaCkpt ? $objUltiCkpt->Sucursal->Iata : null;
    }

    public function colResuPiez_Render(NotaEntrega $objManiCarg) {
	    $strColuResu  = $objManiCarg->Cargadas.' | ';
	    $strColuResu .= $objManiCarg->PorCorregir.' | ';
	    $strColuResu .= $objManiCarg->PorProcesar.' | ';
	    $strColuResu .= $objManiCarg->Procesadas;
	    return $strColuResu;
    }

    protected function btnCambFact_Create() {
        $this->btnCambFact = new QButtonOP($this);
        $this->btnCambFact->Text = TextoIcono('exchange','Camb.Fact', 'F','lg');
        $this->btnCambFact->Visible = false;
        $this->btnCambFact->ToolTip = 'Cambia el estatus del Manifiesto FACTURABLE/NOFACTURABLE';
        $this->btnCambFact->AddAction(new QClickEvent(), new QAjaxAction('btnCambFact_Click'));
    }

    protected function btnTranHist_Create() {
        $this->btnTranHist = new QButtonOD($this);
        $this->btnTranHist->Text = TextoIcono('folder-o','Trans.Hist');
        $this->btnTranHist->Visible = false;
        $this->btnTranHist->ToolTip = 'Transf Manifiestos al Histórico';
        $this->btnTranHist->AddAction(new QClickEvent(), new QAjaxAction('btnTranHist_Click'));
    }

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = TextoIcono('eye','Error(es)','F','lg');
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
    }


    protected function btnCambFact_Click() {
        $arrIdxxSele = $this->colManiSele->GetChangedIds();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::NotaEntrega()->Id, array_keys($arrIdxxSele));
        $arrManiCamb   = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
        $intCantRegi   = 0;
        foreach ($arrManiCamb as $objManiCamb) {
            if ($objManiCamb->Estatus != 'FACTURAD@') {
                $objManiCamb->Facturable = !$objManiCamb->Facturable;
                $objManiCamb->Save();
                //----------------------------------------------
                // Se deja registro de la transacción realizada
                //----------------------------------------------
                $strTextCamb = $objManiCamb->Facturable ? 'Facturable' : 'No-Facturable';
                $objManiCamb->logDeCambios("Se cambio a $strTextCamb");
                $intCantRegi++;
            }
        }
        $this->dtgNotaEntregas->Refresh();
        $this->btnCambFact->Visible = false;
        if ($intCantRegi == count($arrManiCamb)) {
            $this->success("Transaccion Exitosa !!!");
        } else {
            $strTextMens = "Procesados: $intCantRegi | Solo los Manifiestos no FACTURAD@ se pueden cambiar";
            $this->warning($strTextMens);
        }
    }


    protected function colManiSele_Click() {
	    $this->mensaje();
        $arrIdxxSele = $this->colManiSele->GetChangedIds();
        if (count($arrIdxxSele) > 0) {
            $this->btnCambFact->Visible = true;

            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::NotaEntrega()->Id, array_keys($arrIdxxSele));
            $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->Facturable, SinoType::NO);
            $intCantMani   = NotaEntrega::QueryCount(QQ::AndCondition($objClauWher));
            $blnMostTran   = ($intCantMani == count($arrIdxxSele));
            $this->btnTranHist->Visible = $blnMostTran;
            if (!$blnMostTran) {
                $this->warning('Para Transf al Historico, debe seleccionar únicamente Manif NO Facturables');
            } else {
                $this->mensaje();
            }
        } else {
            $this->btnCambFact->Visible = false;
            $this->btnTranHist->Visible = false;
        }
    }


    public function btnNuevRegi_Click() {
        QApplication::Redirect("carga_masiva_guias_mia.php");
    }

    public function FechMani(NotaEntrega $objManiClie) {
        return $objManiClie->Fecha->__toString("DD/MM/YYYY");
    }

    public function dtgNotaEntregasRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("carga_masiva_guias_mia.php/$intId");
	}

    protected function btnErroProc_Click() {
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function btnTranHist_Click() {
        $strNombProc = 'Transferir Manifiestos Masivamente';
        $this->objProcEjec = CrearProceso($strNombProc);
        $blnHuboErro = false;
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        $this->mensaje();

        $arrIdxxSele = $this->colManiSele->GetChangedIds();
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::In(QQN::NotaEntrega()->Id, array_keys($arrIdxxSele));
        $arrManiTran   = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
        $intCantTran   = 0;
        foreach ($arrManiTran as $objManiTran) {
            t('Transfiriendo Manifiesto: '.$objManiTran->Referencia);
            $strTextMens = $objManiTran->TransferirHistorico($this->objProcEjec);
            $blnHuboErro = DetalleError::CountByProcesoId($this->objProcEjec->Id);
            if (!$blnHuboErro) {
                $objManiTran->Delete();
                $arrLogxCamb['strNombTabl'] = 'NotaEntrega';
                $arrLogxCamb['intRefeRegi'] = $objManiTran->Id;
                $arrLogxCamb['strNombRegi'] = $objManiTran->Referencia;
                $arrLogxCamb['strDescCamb'] = "Transferido a Historico y Borrado posteriormente";
                LogDeCambios($arrLogxCamb);
                $intCantTran++;
            }
        }
        $strTextMens = 'Manifiestos Transferidos: '.$intCantTran;
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal      = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario     = $strTextMens;
        $this->objProcEjec->NotificarAdmin = true;
        $this->objProcEjec->Save();
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        if ($blnHuboErro) {
            $strMensErro  = 'El proceso culmino con error(es).';
            $strMensErro .= ' Presione el boton de errores para mas detalles.';
            $this->btnErroProc->Visible = true;
            $this->warning($strMensErro);
        } else {
            $this->success($strTextMens);
        }
        $this->dtgNotaEntregas->Refresh();
    }
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// nota_entrega_list.tpl.php as the included HTML template file
ManifiestosListMia::Run('ManifiestosListMia');
?>
