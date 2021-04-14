<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class MiHistorico extends FormularioBaseKaizen {
    protected $btnFiltDhoy;
    protected $btnFiltAyer;
    protected $btnFiltUl7d;
    protected $btnFiltFech;
    protected $btnFiltAvan;

    protected $colEnlaEnti;
    protected $dtpRangFech;

	protected $dtgLogs;
    protected $btnApliFilt;
    //protected $blnVolvList;

	protected function Form_Create() {
        parent::Form_Create();

        $this->btnFiltDhoy_Create();
        $this->btnFiltAyer_Create();
        $this->btnFiltUl7d_Create();
        $this->btnFiltFech_Create();
        $this->btnFiltAvan_Create();
        $this->btnApliFilt_Create();

		$this->dtgLogs = new LogDataGrid($this);
		$this->dtgLogs->FontSize = 13;
        $this->dtgLogs->ShowFilter = false;

		$this->dtgLogs->CssClass = 'datagrid';
		$this->dtgLogs->AlternateRowStyle->CssClass = 'alternate';

		$this->dtgLogs->Paginator = new QPaginator($this->dtgLogs);
		$this->dtgLogs->ItemsPerPage = 14; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Log()->Id,false);
		$this->dtgLogs->AdditionalClauses = $objClauOrde;

        //------------------------
        // Manejo de Condiciones
        //------------------------
        if (isset($_SESSION['FechBusc'])) {
            unset($_SESSION['FiltHist']);
            unset($_SESSION['FechInic']);
            unset($_SESSION['FechFina']);
        }
        if (isset($_SESSION['FechInic']) && isset($_SESSION['FechFina'])) {
            unset($_SESSION['FiltHist']);
            unset($_SESSION['FechBusc']);
        }
        if (isset($_SESSION['FiltHist'])) {
            unset($_SESSION['FechBusc']);
            unset($_SESSION['FechInic']);
            unset($_SESSION['FechFina']);
            $intCantDias = $_SESSION['FiltHist'];
        } else {
            $intCantDias = 0;
        }
        switch ($intCantDias) {
            case 0:
                $strTextTitu = 'Hoy';
                break;
            case 1:
                $strTextTitu = 'Ult. 2 Días';
                break;
            case 7:
                $strTextTitu = 'Ult. Semana';
                break;
            default:
                $strTextTitu = 'My History';
        }
        $this->lblTituForm->Text = $strTextTitu;
        //------------------------------------------------------------------
        // En funcion de las variables de session, se establece el filtro
        // de los registros
        //------------------------------------------------------------------
        $dttFechFilt   = SumaRestaDiasAFecha(date("Y-m-d"),$intCantDias,'-');
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Log()->Usuario,trim($this->objUsuario->LogiUsua));
        $objClauWher[] = QQ::GreaterOrEqual(QQN::Log()->Fecha,$dttFechFilt);

        $this->dtgLogs->AdditionalConditions = QQ::AndCondition($objClauWher);

        $colFechCamb = $this->dtgLogs->MetaAddColumn('Fecha');
        $colFechCamb->FilterBoxSize = 8;
        $colFechCamb->Width = 85;

		$colHoraCamb = $this->dtgLogs->MetaAddColumn('Hora');
		$colHoraCamb->FilterBoxSize = 3;
		$colHoraCamb->Width = 85;

		$colTablCamb = $this->dtgLogs->MetaAddColumn('Tabla');
		$colTablCamb->FilterBoxSize = 3;
		$colTablCamb->Width = 100;
		
		$colRefeCamb = $this->dtgLogs->MetaAddColumn('Ref');
		$colRefeCamb->FilterBoxSize = 2;
		$colRefeCamb->Width = 50;
		
		$colNombCamb = $this->dtgLogs->MetaAddColumn('Nombre');
		$colNombCamb->Width = 220;

        $this->dtgLogs->MetaAddColumn('Delicado');

        $this->dtgLogs->MetaAddColumn('Ip');

        $colDescCamb = $this->dtgLogs->MetaAddColumn('Descripcion');
        $colDescCamb->HtmlEntities = false;

		/*
        $this->colEnlaEnti = new QDataGridColumn('Link','<?= $_FORM->dtgLogs_Enlace_Render($_ITEM); ?>');
        $this->colEnlaEnti->HtmlEntities = false;
        $this->dtgLogs->AddColumn($this->colEnlaEnti);
		*/

	}

    //----------------------------
    // Aqui se crean los objetos
    //----------------------------

    protected function btnFiltDhoy_Create() {
        $this->btnFiltDhoy = new QButton($this);
        $this->btnFiltDhoy->Text = 'Hoy';
        $this->btnFiltDhoy->CssClass = 'btn btn-outline-success btn-sm';
        $this->btnFiltDhoy->HtmlEntities = false;
        $this->btnFiltDhoy->ActionParameter = 0;
        $this->btnFiltDhoy->AddAction(new QClickEvent(), new QAjaxAction('btnFiltHist_Click'));
    }

    protected function btnFiltAyer_Create() {
        $this->btnFiltAyer = new QButton($this);
        $this->btnFiltAyer->Text = 'Ult. 2 Días';
        $this->btnFiltAyer->CssClass = 'btn btn-outline-warning btn-sm';
        $this->btnFiltAyer->HtmlEntities = false;
        $this->btnFiltAyer->ActionParameter = 1;
        $this->btnFiltAyer->AddAction(new QClickEvent(), new QServerAction('btnFiltHist_Click'));
    }

    protected function btnFiltUl7d_Create() {
        $this->btnFiltUl7d = new QButton($this);
        $this->btnFiltUl7d->Text = 'Ult. Semana';
        $this->btnFiltUl7d->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnFiltUl7d->HtmlEntities = false;
        $this->btnFiltUl7d->ActionParameter = 7;
        $this->btnFiltUl7d->AddAction(new QClickEvent(), new QServerAction('btnFiltHist_Click'));
    }

    protected function btnFiltFech_Create() {
        $this->btnFiltFech = new QButton($this);
        $this->btnFiltFech->Text = 'Filt. x Fecha';
        $this->btnFiltFech->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnFiltFech->HtmlEntities = false;
        $this->btnFiltFech->AddAction(new QClickEvent(), new QServerAction('btnFiltFech_Click'));
    }

    protected function btnFiltAvan_Create() {
        $this->btnFiltAvan = new QButton($this);
        $this->btnFiltAvan->Text = 'Filt. Avanzado';
        $this->btnFiltAvan->CssClass = 'btn btn-outline-success btn-sm';
        $this->btnFiltAvan->HtmlEntities = false;
        $this->btnFiltAvan->AddAction(new QClickEvent(), new QServerAction('btnFiltAvan_Click'));
    }

    protected function dtpRangFech_Create() {
        $this->dtpRangFech = new QDateRangePicker($this);
        $this->dtpRangFech->Name = 'Fecha/Rango';
        //$this->dtpRangFech->AutoRenderChildren = true;
        //$this->dtpRangFech->Input = new QTextBox($this->dtpRangFech);
        $this->dtpRangFech->Visible = false;
    }

    protected function btnApliFilt_Create() {
        $this->btnApliFilt = new QButton($this);
        $this->btnApliFilt->Text = 'Filtro';
        $this->btnApliFilt->CssClass = 'btn btn-primary btn-sm';
        $this->btnApliFilt->HtmlEntities = false;
        $this->btnApliFilt->AddAction(new QClickEvent(), new QServerAction('btnApliFilt_Click'));
        $this->btnApliFilt->Visible = false;
    }

    // public function dtgLogs_Enlace_Render(Log $objLog) {
    //     if (strlen($objLog->Link) > 0) {
    //         return $objLog->__toStringEnlace();
    //     } else {
    //         return null;
    //     }
    // }

    //------------------------------------
    // Acciones relativas a los objetos
    //------------------------------------

    protected function btnFiltHist_Click($strFormId, $strControlId, $strParameter) {
        $_SESSION['FiltHist'] = (int) $strParameter;
        QApplication::Redirect(__SIST__.'/my_history.php');
    }

    protected function btnFiltFech_Click() {
        $this->dtpRangFech->Visible = !$this->dtpRangFech->Visible;
        $this->btnApliFilt->Visible = !$this->btnApliFilt->Visible;
    }

    protected function btnFiltAvan_Click() {
        $this->dtgLogs->ShowFilter  = !$this->dtgLogs->ShowFilter;
        if ($this->dtgLogs->ShowFilter) {
            $this->lblTituForm->Text = 'Filt. Avanzado';
        }
    }

    protected function btnApliFilt_Click() {
        $strTextFech = $this->dtpRangFech->Input->Text;
        if (strlen($strTextFech) > 0) {
            if (strpos($strTextFech,'-')) {
                $arrRangFech = explode('-',$strTextFech);
                $arrFechInic = explode('/',$arrRangFech[0]);
                $arrFechFina = explode('/',$arrRangFech[1]);
                $strFechInic = $arrFechInic[2].'-'.$arrFechInic[0].'-'.$arrFechInic[1];
                $strFechFina = $arrFechFina[2].'-'.$arrFechFina[0].'-'.$arrFechFina[1];
                $this->mensaje($strFechInic,'n');
                $this->mensaje($strFechFina,'m');
                $_SESSION['FechInic'] = $strFechInic;
                $_SESSION['FechFina'] = $strFechFina;
            } else {
                $arrFechBusc = explode('/',$strTextFech);
                $strFechBusc = $arrFechBusc[2].'-'.$arrFechBusc[0].'-'.$arrFechBusc[1];
                $this->mensaje($strFechBusc,'n');
                $_SESSION['FechBusc'] = $strFechBusc;
            }
            QApplication::Redirect(__SIST__.'/my_history.php');
        }

    }
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// log_list.tpl.php as the included HTML template file
MiHistorico::Run('MiHistorico');
?>
