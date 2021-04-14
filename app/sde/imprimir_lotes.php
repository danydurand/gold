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

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Impresión en Lote');
        $this->txtListGuia_Create();
        //$this->btnBotoImpr_Create();
        $this->btnImprGuia_Create();
        $this->btnImprEtiq_Create();
        $this->btnImprEti2_Create();
        $this->btnImprNuev_Create();
        $this->btnSave->Visible = false;
        $this->btnCancel->Visible = false;
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------
         
    protected function txtListGuia_Create(){
        $this->txtListGuia = new QTextBox($this);
        $this->txtListGuia->Name = QApplication::Translate('Lista de Guías');
        $this->txtListGuia->TextMode = QTextMode::MultiLine;
        $this->txtListGuia->Height = 250;
        $this->txtListGuia->Width = 200;
    }

    /*protected function btnBotoImpr_Create() {
        $this->btnBotoImpr = new QLabel($this);
        $this->btnBotoImpr->HtmlEntities = false;
        $this->btnBotoImpr->CssClass = '';

        $strTextBoto   = TextoIcono('wpforms fa-lg','Imprimir');
        $arrOpciDrop   = array();

        $arrOpciDrop[] = OpcionDropDown('etiqueta_pdf.php',TextoIcono('file-text','Imprimir Guías'));
        $arrOpciDrop[] = OpcionDropDown('etiqueta_pdf_b.php',TextoIcono('file-text-o','Imprimir Etiquetas T1'));
        $arrOpciDrop[] = OpcionDropDown('etiqueta_pdf_new.php',TextoIcono('file','Imprimir Etiquetas T2'));
        $arrOpciDrop[] = OpcionDropDown('etiqueta_pdf_lote.php',TextoIcono('file-o','Imprimir Etiquetas en Lote'));

        $this->btnBotoImpr->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop, 'p');
        //$this->btnBotoImpr->Visible  = $this->mctMasterCliente->EditMode;
    }*/

    protected function btnImprGuia_Create() {
        $this->btnImprGuia = new QButtonS($this);
        $this->btnImprGuia->Text = TextoIcono('file-text','Guías','F','fa-lg');
        $this->btnImprGuia->ActionParameter = 'G';
        $this->btnImprGuia->AddAction(new QClickEvent(), new QServerAction('procesarGuias'));
        $this->btnImprGuia->CausesValidation = true;
    }

    protected function btnImprEtiq_Create() {
        $this->btnImprEtiq = new QButtonW($this);
        $this->btnImprEtiq->Text = TextoIcono('file-text-o','Etiquetas','F','fa-lg');
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
        $strMensAdve = 'Debe indicar algun(os) <b>Número(s) de Guía(s)</b>.';
        $blnTodoOkey = true;
        if (strlen($this->txtListGuia->Text) == 0) {
            $blnTodoOkey = false;
            $this->mensaje($strMensAdve,'m','d','','hand-stop-o');
        }
        return $blnTodoOkey;
    }

    protected function procesarGuias($strFormId, $strControlId, $strParameter) {
        $this->lblMensUsua->Text = '';
        $arrListGuia = explode(',',nl2br2($this->txtListGuia->Text));
        $this->txtListGuia->Text = '';
        //---------------------------------------
        // Aquí se eliminan la líneas en blanco
        //---------------------------------------
        $arrListGuia = BorrarLineasEnBlanco($arrListGuia); 
        //---------------------------------------------------------------------------
        // Con array_unique se eliminan las guías repetidas en caso de que las haya
        //---------------------------------------------------------------------------
        $arrGuiaDefi = array();
        $arrListGuia = array_unique($arrListGuia,SORT_STRING);
        foreach ($arrListGuia as $strNumeGuia) {
            $objGuia = Guia::Load($strNumeGuia);
            if ($objGuia) {
                $arrGuiaDefi[] = $objGuia->NumeGuia;
            } else {
                $this->txtListGuia->Text .= $strNumeGuia." (No Existe)".chr(13);
            } 
        }
        switch ($strParameter) {
            case 'E':
                $_SESSION['arrGuiaLote'] = serialize($arrGuiaDefi);
                QApplication::Redirect('etiqueta_pdf.php');
                break;
            case 'E2':
                $_SESSION['arrGuiaLote'] = serialize($arrGuiaDefi);
                QApplication::Redirect('etiqueta_pdf_b.php');
                break;
            case 'EN':
                $_SESSION['arrGuiaLote'] = serialize($arrGuiaDefi);
                QApplication::Redirect('etiqueta_pdf_new.php');
                break;
            default:
                $_SESSION['Dato'] = serialize($arrGuiaDefi);
                QApplication::Redirect('guia_pdf_lote.php');
        }
    }
}

ImprimirLotesForm::Run('ImprimirLotesForm','imprimir_lotes.tpl.php');
?>