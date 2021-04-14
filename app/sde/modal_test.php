<?php
/**
 * Created by PhpStorm.
 * User: ianzola
 * Date: 03/05/17
 * Time: 12:13 PM
 */
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ModalTest extends FormularioBaseKaizen {
    protected $lblPopuModa;
    /* @var $dlgPopuModa QDialog */
    protected $dlgPopuModa;
    /* @var $btnSave QButton */
    protected $btnSave;
    protected $btnPopuModa;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Modal Test';

        $this->lblPopuModa_Create();
        $this->dlgPopuModa_Create();

        //$objActiPara = new QJsClosure('$(\'#myModal\').modal(\'show\').call()');
        //$this->btnSave->ActionParameter = $objActiPara;
        $this->btnSave->AddAction(new QClickEvent(), new QShowDialog($this->dlgPopuModa));
    }

    //------------------
    // Creando objetos
    //------------------

    protected function dlgPopuModa_Create() {
        $this->dlgPopuModa = new QDialog($this);
        $this->dlgPopuModa->Title = '
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal Test</h4>
              </div>';
        $this->dlgPopuModa->HtmlEntities = false;
        $this->dlgPopuModa->CssClass = 'modal fade';
        $this->dlgPopuModa->AutoOpen = false;
        $this->dlgPopuModa->Modal = true;
        $this->dlgPopuModa->Resizable = false;
        $this->dlgPopuModa->HasCloseButton = false;
        $this->dlgPopuModa->Display = true;
        $this->dlgPopuModa->AddButton('S','s');
        $this->dlgPopuModa->AddButton('N','n');
        $this->dlgPopuModa->AddAction(new QDialog_ButtonEvent(),new QHideDialog($this->dlgPopuModa));
        $this->dlgPopuModa->AddAction(new QDialog_ButtonEvent(),new QAjaxAction('dlgValidate_Click'));
    }

    protected function lblPopuModa_Create() {
        $this->lblPopuModa = new QLabel($this);
        $this->lblPopuModa->HtmlEntities = false;
        $this->lblPopuModa->CssClass = '';
        $this->lblPopuModa->Text = $this->recrearModal();
    }

    //-----------------------------------
    // Acciones asociadas a los objetos
    //-----------------------------------

    protected function recrearModal($strTextMens = 'hola que tal!') {
        $strTextModa = '
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal Test</h4>
              </div>
              <div class="modal-body">';
        $strTextModa .= $strTextMens;
        $strTextModa .= '</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>';
        return $strTextModa;
    }

    protected function btnSave_Click() {
        /*$strTextMens = 'Verdugeichion!!!!!';
        $this->lblPopuModa->Text = $this->recrearModal($strTextMens);
        $objActiPara = new QJsClosure('$(\'#myModal\').modal(\'show\').call()');
        $this->btnSave->ActionParameter = $objActiPara;*/
        $this->dlgPopuModa->Option('Show');
    }

    public function dlgValidate_Click($strFormId, $strControlId, $strParameter) {
        if ($strParameter == 'S') {
        } else {
            $this->dlgPopuModa->Close();
        }
    }
}

ModalTest::Run('ModalTest');