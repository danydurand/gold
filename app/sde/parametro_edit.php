<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ParametroEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Parametro class.  It uses the code-generated
 * ParametroMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Parametro columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both parametro_edit.php AND
 * parametro_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ParametroEditForm extends ParametroEditFormBase {
    protected $strCodiRegi;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

    //	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

        $this->lblTituForm->Text = 'Parámetro';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ParametroMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctParametro = ParametroMetaControl::CreateFromPathInfo($this);

        $this->strCodiRegi = $this->mctParametro->Parametro->__codigoRegistro();

		// Call MetaControl's methods to create qcontrols based on Parametro's data fields
		$this->txtIndiPara = $this->mctParametro->txtIndiPara_Create();
		$this->txtIndiPara->Width = 80;
		$this->txtCodiPara = $this->mctParametro->txtCodiPara_Create();
		$this->txtCodiPara->Width = 80;
		$this->txtDescPara = $this->mctParametro->txtDescPara_Create();
		$this->txtDescPara->Width = 200;
		$this->txtParaTxt1 = $this->mctParametro->txtParaTxt1_Create();
		$this->txtParaTxt1->Width = 200;
		$this->txtParaTxt1->Rows = 2;
		$this->txtParaTxt2 = $this->mctParametro->txtParaTxt2_Create();
		$this->txtParaTxt2->TextMode = QTextMode::MultiLine;
		$this->txtParaTxt2->Width = 200;
		$this->txtParaTxt2->Rows = 2;
		$this->txtParaTxt3 = $this->mctParametro->txtParaTxt3_Create();
		$this->txtParaTxt3->TextMode = QTextMode::MultiLine;
		$this->txtParaTxt3->Width = 200;
		$this->txtParaTxt3->Rows = 2;
		$this->txtParaTxt4 = $this->mctParametro->txtParaTxt4_Create();
        $this->txtParaTxt4->TextMode = QTextMode::MultiLine;
        $this->txtParaTxt4->Width = 200;
        $this->txtParaTxt4->Rows = 2;
		$this->txtParaTxt5 = $this->mctParametro->txtParaTxt5_Create();
        $this->txtParaTxt5->TextMode = QTextMode::MultiLine;
        $this->txtParaTxt5->Width = 200;
        $this->txtParaTxt5->Rows = 2;
		$this->txtParaVal1 = $this->mctParametro->txtParaVal1_Create();
		$this->txtParaVal2 = $this->mctParametro->txtParaVal2_Create();
		$this->txtParaVal3 = $this->mctParametro->txtParaVal3_Create();
		$this->txtParaVal4 = $this->mctParametro->txtParaVal4_Create();
		$this->txtParaVal5 = $this->mctParametro->txtParaVal5_Create();
	}

	//----------------------------
	// AquÍ se Crean los Objetos
	//----------------------------

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Parametro',$this->strCodiRegi);
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/parametro_edit.php/'.$objRegiTabl->__codigoRegistro());
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/parametro_edit.php/'.$objRegiTabl->__codigoRegistro());
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/parametro_edit.php/'.$objRegiTabl->__codigoRegistro());
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/parametro_edit.php/'.$objRegiTabl->__codigoRegistro());
    }

    protected function determinarPosicion() {
        if ($this->mctParametro->Parametro && !isset($_SESSION['DataParametro'])) {
            $_SESSION['DataParametro'] = serialize(array($this->mctParametro->Parametro));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataParametro']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiPara == $this->mctParametro->Parametro->CodiPara
                && $objTable->IndiPara == $this->mctParametro->Parametro->IndiPara) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnHistSmal_Create() {
        $this->btnHistSmal = new QButton($this);
        $this->btnHistSmal->Text = '<i class="fa fa-file-text-o fa-lg"></i>';
        $this->btnHistSmal->CssClass = 'btn btn-default btn-sm';
        $this->btnHistSmal->HtmlEntities = false;
        $this->btnHistSmal->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnHistSmal->Visible = Log::CountByTablaRef('Parametro',$this->strCodiRegi);
    }

    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctParametro->Parametro;
		$this->mctParametro->SaveParametro();
		if ($this->mctParametro->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctParametro->Parametro;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Parametro';
				$arrLogxCamb['intRefeRegi'] = $this->strCodiRegi;
				$arrLogxCamb['strNombRegi'] = $this->mctParametro->Parametro->DescPara;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/parametro_edit.php/'.$this->strCodiRegi;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa');
			}
		} else {
            $this->strCodiRegi = $this->mctParametro->Parametro->__codigoRegistro();
			$arrLogxCamb['strNombTabl'] = 'Parametro';
			$arrLogxCamb['intRefeRegi'] = $this->strCodiRegi;
			$arrLogxCamb['strNombRegi'] = $this->mctParametro->Parametro->DescPara;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/parametro_edit.php/'.$this->strCodiRegi;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctParametro->TablasRelacionadasParametro();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            $this->danger(sprintf('Existen registros relacionados en %s',$strTablRela));
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctParametro->DeleteParametro();
            $arrLogxCamb['strNombTabl'] = 'Parametro';
            $arrLogxCamb['intRefeRegi'] = $this->strCodiRegi;
            $arrLogxCamb['strNombRegi'] = $this->mctParametro->Parametro->DescPara;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// parametro_edit.tpl.php as the included HTML template file
ParametroEditForm::Run('ParametroEditForm');
?>