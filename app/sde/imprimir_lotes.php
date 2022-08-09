<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ImprimirLotesForm extends FormularioBaseKaizen {
    
    protected $txtListGuia;
    protected $btnBotoImpr;
    protected $btnImprGuia;
    protected $btnImprEtiq;
    protected $btnImprEti2;
    protected $btnImprNuev;
    protected $rdbMostLogo;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Impresiónes en Lote');

        $this->txtListGuia_Create();
        $this->btnImprEtiq_Create();
        $this->rdbMostLogo_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function rdbMostLogo_Create() {
        $this->rdbMostLogo = new QRadioButtonList($this);
        $this->rdbMostLogo->Name = 'Incluir Logo ?';
        $this->rdbMostLogo->Required = true;
        $this->rdbMostLogo->HtmlEntities = false;
        $this->rdbMostLogo->RepeatColumns = 2;
        $this->rdbMostLogo->AddItem('&nbsp;SI&nbsp;', true, true);
        $this->rdbMostLogo->AddItem('&nbsp;NO&nbsp;', false);
    }


    protected function txtListGuia_Create(){
        $this->txtListGuia = new QTextBox($this);
        $this->txtListGuia->Name = QApplication::Translate('Lista de Guías');
        $this->txtListGuia->TextMode = QTextMode::MultiLine;
        $this->txtListGuia->Height = 250;
        $this->txtListGuia->Width = 200;
    }

    protected function btnImprGuia_Create() {
        $this->btnImprGuia = new QButtonS($this);
        $this->btnImprGuia->Text = TextoIcono('file-text','Guías','F','fa-lg');
        $this->btnImprGuia->ActionParameter = 'G';
        $this->btnImprGuia->AddAction(new QClickEvent(), new QServerAction('procesarGuias'));
        $this->btnImprGuia->CausesValidation = true;
    }

    protected function btnImprEtiq_Create() {
        $this->btnImprEtiq = new QButtonP($this);
        $this->btnImprEtiq->Text = TextoIcono('clone','Etiquetas','F','fa-lg');
        $this->btnImprEtiq->ActionParameter = 'E';
        $this->btnImprEtiq->AddAction(new QClickEvent(), new QServerAction('procesarGuias'));
        $this->btnImprEtiq->CausesValidation = true;
    }

    protected function btnImprEti2_Create() {
        $this->btnImprEti2 = new QButtonI($this);
        $this->btnImprEti2->Text = TextoIcono('file-text-o','Etiquetas 2','F','fa-lg');
        $this->btnImprEti2->ActionParameter = 'E2';
        $this->btnImprEti2->AddAction(new QClickEvent(), new QServerAction('procesarGuias'));
        $this->btnImprEti2->CausesValidation = true;
    }

    protected function btnImprNuev_Create() {
        $this->btnImprNuev = new QButtonP($this);
        $this->btnImprNuev->Text = TextoIcono('file','Etiquetas New','F','fa-lg');
        $this->btnImprNuev->ActionParameter = 'EN';
        $this->btnImprNuev->AddAction(new QClickEvent(), new QServerAction('procesarGuias'));
        $this->btnImprNuev->CausesValidation = true;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function Form_Validate() {
        $blnTodoOkey = true;
        if (strlen($this->txtListGuia->Text) == 0) {
            $blnTodoOkey = false;
            $this->danger('Debe indicar las guias cuyas impresiones desea procesar');
        }
        return $blnTodoOkey;
    }

    protected function procesarGuias($strFormId, $strControlId, $strParameter) {
        $this->lblMensUsua->Text = '';
        $_SESSION['MostLogo'] = $this->rdbMostLogo->SelectedValue;
        $arrListGuia = explode(',',nl2br2($this->txtListGuia->Text));
        $this->txtListGuia->Text = '';
        //---------------------------------------
        // Aquí se eliminan la líneas en blanco
        //---------------------------------------
        $arrListGuia = BorrarLineasEnBlanco($arrListGuia); 
        //---------------------------------------------------------------------------
        // Con array_unique se eliminan las guías repetidas en caso de que las haya
        //---------------------------------------------------------------------------
        $arrGuiaDefi = [];
        $arrListGuia = array_unique($arrListGuia,SORT_STRING);
        foreach ($arrListGuia as $strNumeGuia) {
            $objGuia = Guias::LoadByTracking($strNumeGuia);
            if ($objGuia) {
                $arrGuiaDefi[] = $objGuia->Id;
                t('Guia: '.$objGuia->Tracking.' con el Id: '.$objGuia->Id.'... en el Vector');
            } else {
                $this->txtListGuia->Text .= $strNumeGuia." (No Existe)".chr(13);
            } 
        }
        switch ($strParameter) {
            case 'E':
                $_SESSION['GuiaEtiq'] = $arrGuiaDefi;
                QApplication::Redirect('etiqueta_pdf.php');
                break;
//            case 'E2':
//                $_SESSION['arrGuiaLote'] = serialize($arrGuiaDefi);
//                QApplication::Redirect('etiqueta_pdf_b.php');
//                break;
//            case 'EN':
//                $_SESSION['arrGuiaLote'] = serialize($arrGuiaDefi);
//                QApplication::Redirect('etiqueta_pdf_new.php');
//                break;
            default:
                $this->danger('Opción de Impresión no considerada');
        }
    }
}

ImprimirLotesForm::Run('ImprimirLotesForm','imprimir_lotes.tpl.php');
?>