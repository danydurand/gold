<?php
//-----------------------------------------------------------------------------
// Programa      : sde_checkpoint_master.php
// Realizado por : Juan Duran
// Fecha Elab.   : 01/03/2017
// Descripcion   : Este programa muestra un formulario con los campos 
//                 requeridos para buscar las guias segun el checkpoint.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class SdeCheckpointMaster extends FormularioBaseKaizen {
    // --- Parámetros de Objetos --- //
    /* @var $objSdeContenedor SdeContenedor */
    protected $objSdeContenedor;
    // Parámetros Regulares //
    protected $strTitleVerb;
    protected $blnEditMode;
    // Campos del formulario //
    protected $txtNumeCont;
    protected $txtMaster;
    protected $txtNumeroValijas;
    protected $txtValijas;
    protected $lstCodiOperObject;
    protected $lstSdeContenedorsAsSdeContCont;
    protected $lstParentSdeContenedorsAsSdeContCont;

    /*protected function SetupSdeContenedor() {
        $strNumeCont = QApplication::QueryString('strNumeCont');
        if (($strNumeCont)) {
            $this->objSdeContenedor = SdeContenedor::Load(($strNumeCont));

            if (!$this->objSdeContenedor)
                throw new Exception('Could not find a SdeContenedor object with PK arguments: ' . $strNumeCont);

            $this->strTitleVerb = QApplication::Translate('Edit');
            $this->blnEditMode = true;
        } else {
            $this->objSdeContenedor = new SdeContenedor();
            $this->strTitleVerb = QApplication::Translate('Create');
            $this->blnEditMode = false;
        }
    }*/

    protected function Form_Create() {
        parent::Form_Create();
        //$this->SetupSdeContenedor();
        $this->lblTituForm->Text = 'Buscar Manifiestos';

        $this->btnSave->Text = TextoIcono('cogs fa-lg','Buscar');

        $this->txtNumeCont_Create();
        //$this->txtMaster_Create();
        //$this->txtNumeroValijas_Create();
        //$this->txtValijas_Create();
        //$this->lstCodiOperObject_Create();
        //$this->lstParentSdeContenedorsAsSdeContCont_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtNumeCont_Create() {
        $this->txtNumeCont = new QTextBox($this);
        $this->txtNumeCont->Name = QApplication::Translate('Número de Manifiesto');
        $this->txtNumeCont->Text = ''; //$this->objSdeContenedor->NumeCont;
        $this->txtNumeCont->MaxLength = SdeContenedor::NumeContMaxLength;
        $this->txtNumeCont->Width = 200;
        $this->txtNumeCont->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }
    
    /*protected function lstCodiOperObject_Create() {
        $this->lstCodiOperObject = new QListBox($this);
        $this->lstCodiOperObject->Name = QApplication::Translate('Codi Oper Object');
        $this->lstCodiOperObject->AddItem(QApplication::Translate('- Select One -'), null,true);
        $this->lstCodiOperObject->Width = 200;
        $objCodiOperObjectArray = SdeOperacion::LoadAll();
        if ($objCodiOperObjectArray) foreach ($objCodiOperObjectArray as $objCodiOperObject) {
            $objListItem = new QListItem($objCodiOperObject->__toString(), $objCodiOperObject->CodiOper);
            $this->lstCodiOperObject->AddItem($objListItem);
        }
    }

    protected function txtMaster_Create() {
      $this->txtMaster = new QIntegerTextBox($this);
      $this->txtMaster->Name = QApplication::Translate('Master');
      $this->txtMaster->Text = ''; //$this->objSdeContenedor->Master;
      $this->txtMaster->Width = 200;
    }

    protected function txtNumeroValijas_Create() {
        $this->txtNumeroValijas = new QIntegerTextBox($this);
        $this->txtNumeroValijas->Name = QApplication::Translate('Numero Valijas');
        $this->txtNumeroValijas->Text = ''; //$this->objSdeContenedor->NumeroValijas;
        $this->txtNumeroValijas->Width = 200;
    }

    protected function txtValijas_Create() {
        $this->txtValijas = new QTextBox($this);
        $this->txtValijas->Name = QApplication::Translate('Valijas');
        $this->txtValijas->Text = $this->objSdeContenedor->Valijas;
        $this->txtValijas->MaxLength = SdeContenedor::ValijasMaxLength;
        $this->txtValijas->TextMode = QTextMode::MultiLine;
        $this->txtValijas->Height = 50;
        $this->txtValijas->Width = 200;
        $this->txtValijas->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function lstParentSdeContenedorsAsSdeContCont_Create() {
        $this->lstParentSdeContenedorsAsSdeContCont = new QListBox($this);
        $this->lstParentSdeContenedorsAsSdeContCont->Name = QApplication::Translate('Parent Sde Contenedors As Sde Cont Cont');
        $this->lstParentSdeContenedorsAsSdeContCont->SelectionMode = QSelectionMode::Multiple;
        $objAssociatedArray = $this->objSdeContenedor->GetParentSdeContenedorAsSdeContContArray();
        $objSdeContenedorArray = SdeContenedor::LoadAll();
        if ($objSdeContenedorArray) foreach ($objSdeContenedorArray as $objSdeContenedor) {
            $objListItem = new QListItem($objSdeContenedor->__toString(), $objSdeContenedor->NumeCont);
            foreach ($objAssociatedArray as $objAssociated) {
                if ($objAssociated->NumeCont == $objSdeContenedor->NumeCont) {
                    $objListItem->Selected = true;
                }
            }
            $this->lstParentSdeContenedorsAsSdeContCont->AddItem($objListItem);
        }
    }

    protected function lstSdeContenedorsAsSdeContCont_Create() {
        $this->lstSdeContenedorsAsSdeContCont = new QListBox($this);
        $this->lstSdeContenedorsAsSdeContCont->Name = QApplication::Translate('Sde Contenedors As Sde Cont Cont');
        $this->lstSdeContenedorsAsSdeContCont->SelectionMode = QSelectionMode::Multiple;
        $objAssociatedArray = $this->objSdeContenedor->GetSdeContenedorAsSdeContContArray();
        $objSdeContenedorArray = SdeContenedor::LoadAll();
        if ($objSdeContenedorArray) foreach ($objSdeContenedorArray as $objSdeContenedor) {
            $objListItem = new QListItem($objSdeContenedor->__toString(), $objSdeContenedor->NumeCont);
            foreach ($objAssociatedArray as $objAssociated) {
                if ($objAssociated->NumeCont == $objSdeContenedor->NumeCont)
                    $objListItem->Selected = true;
                }
            $this->lstSdeContenedorsAsSdeContCont->AddItem($objListItem);
        }
    }

    protected function UpdateSdeContenedorFields() {
        $this->objSdeContenedor->NumeCont = $this->txtNumeCont->Text;
        $this->objSdeContenedor->CodiOper = $this->lstCodiOperObject->SelectedValue;
        $this->objSdeContenedor->Master = $this->txtMaster->Text;
        $this->objSdeContenedor->NumeroValijas = $this->txtNumeroValijas->Text;
        $this->objSdeContenedor->Valijas = $this->txtValijas->Text;
    }

    protected function lstParentSdeContenedorsAsSdeContCont_Update() {
        $this->objSdeContenedor->UnassociateAllParentSdeContenedorsAsSdeContCont();
        $objSelectedListItems = $this->lstParentSdeContenedorsAsSdeContCont->SelectedItems;
        if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
            $this->objSdeContenedor->AssociateParentSdeContenedorAsSdeContCont(SdeContenedor::Load($objListItem->Value));
        }
    }

    protected function lstSdeContenedorsAsSdeContCont_Update() {
        $this->objSdeContenedor->UnassociateAllSdeContenedorsAsSdeContCont();
        $objSelectedListItems = $this->lstSdeContenedorsAsSdeContCont->SelectedItems;
        if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
            $this->objSdeContenedor->AssociateSdeContenedorAsSdeContCont(SdeContenedor::Load($objListItem->Value));
        }
    }

    protected function lstGuias_Update() {
        $this->objSdeContenedor->UnassociateAllGuias();
        $objSelectedListItems = $this->lstGuias->SelectedItems;
        if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
            $this->objSdeContenedor->AssociateGuia(Guia::Load($objListItem->Value));
        }
    }

    // Control ServerActions
    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //-----------------------------------------------
        // Armo el SQL para la busqueda de registros
        //-----------------------------------------------
        $objClausula = QQ::Clause();
        if (strlen($this->txtNumeCont->Text)) {
            $objClausula[] = QQ::Like(QQN::SdeContenedor()->NumeCont,trim($this->txtNumeCont->Text).'%');
        }
        // if (!is_null($this->lstCodiOperObject->SelectedValue)) {
        //     $objClausula[]= QQ::Equal(QQN::SdeContenedor()->CodiOper,$this->lstCodiOperObject->SelectedValue);
        // }
        if (strlen($this->txtMaster->Text)) {
            $objClausula[] = QQ::Like(QQN::SdeContenedor()->Master,trim($this->txtMaster->Text).'%');
        }
        if (strlen($this->txtNumeroValijas->Text)) {
            $objClausula[] = QQ::Like(QQN::SdeContenedor()->NumeroValijas,trim($this->txtNumeroValijas->Text).'%');
        }
        if (strlen($this->txtValijas->Text)) {
            $objClausula[] = QQ::Like(QQN::SdeContenedor()->Valijas,trim($this->txtValijas->Text).'%');
        }

        if (count($objClausula)){
            $_SESSION['Criterio'] = serialize($objClausula);
            $_SESSION['TablCrit'] = 'SdeContenedor';
        }
        else {
            unset($_SESSION['Criterio']);
        }
        QApplication::Redirect('sde_checkpoint_master_list.php');
    }*/
}

SdeCheckpointMaster::Run('SdeCheckpointMaster');
?>