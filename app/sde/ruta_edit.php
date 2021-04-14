<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/RutaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Ruta class.  It uses the code-generated
 * RutaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Ruta columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both ruta_edit.php AND
 * ruta_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class RutaEditForm extends RutaEditFormBase {
    protected $btnConfBorr;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the RutaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctRuta = RutaMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Ruta's data fields
		$this->txtCodiRuta = $this->mctRuta->txtCodiRuta_Create();

		$this->txtDescRuta = $this->mctRuta->txtDescRuta_Create();
		$this->txtDescRuta->TextMode = QTextMode::MultiLine;
		$this->txtDescRuta->Width = 200;

		$this->txtTextObse = $this->mctRuta->txtTextObse_Create();
		$this->lstSucursal = $this->mctRuta->lstSucursal_Create();
		$this->lstTipoRutaObject = $this->mctRuta->lstTipoRutaObject_Create();
		$this->lstCodiStatObject = $this->mctRuta->lstCodiStatObject_Create();
		$this->txtPorcMedi = $this->mctRuta->txtPorcMedi_Create();

		$this->btnConfBorr_Create();
	}

	//----------------------------
	// Aquí se crean los objetos 
	//----------------------------

    protected function btnConfBorr_Create() {
        $this->btnConfBorr = new QButtonS($this);
        $this->btnConfBorr->Text = '<i class="fa fa-check fa-lg"></i> Confirmar';
        $this->btnConfBorr->HtmlEntities = false;
        $this->btnConfBorr->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnConfBorr->Visible = false;
    }


    protected function determinarPosicion() {
        if ($this->mctRuta->Ruta && !isset($_SESSION['DataRuta'])) {
            $_SESSION['DataRuta'] = serialize(array($this->mctRuta->Ruta));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataRuta']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posición del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiRuta == $this->mctRuta->Ruta->CodiRuta) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Ruta',$this->mctRuta->Ruta->CodiRuta);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------
    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/ruta_edit.php/'.$objRegiTabl->CodiRuta);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/ruta_edit.php/'.$objRegiTabl->CodiRuta);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/ruta_edit.php/'.$objRegiTabl->CodiRuta);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/ruta_edit.php/'.$objRegiTabl->CodiRuta);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctRuta->Ruta;
		//--------------------------------------------------------------------------------------------------------------
        // Se asegura que en la cadena del código de la ruta, no exista al menos una primera ocurrencia de un slash (/)
        //--------------------------------------------------------------------------------------------------------------
        $blnTienSlas = strpos($this->txtCodiRuta->Text,'/');
		if (!$blnTienSlas) {
		    //--------------------------------
            // Se actualiza y/o salva la ruta
            //--------------------------------
            $this->mctRuta->SaveRuta();
            if ($this->mctRuta->EditMode) {
                //---------------------------------------------------------------------
                // Si estamos en modo Edicion, entonces se verifican la existencia
                // de algun cambio en algun dato
                //---------------------------------------------------------------------
                $objRegiNuev = $this->mctRuta->Ruta;
                $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                    //------------------------------------------
                    // En caso de que el objeto haya cambiado
                    //------------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'Ruta';
                    $arrLogxCamb['intRefeRegi'] = $this->mctRuta->Ruta->CodiRuta;
                    $arrLogxCamb['strNombRegi'] = $this->mctRuta->Ruta->DescRuta;
                    $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/ruta_edit.php/'.$this->mctRuta->Ruta->CodiRuta;
                    LogDeCambios($arrLogxCamb);
                    $this->mensaje('Transacción Exitosa','','','check');
                }
            } else {
                $arrLogxCamb['strNombTabl'] = 'Ruta';
                $arrLogxCamb['intRefeRegi'] = $this->mctRuta->Ruta->CodiRuta;
                $arrLogxCamb['strNombRegi'] = $this->mctRuta->Ruta->DescRuta;
                $arrLogxCamb['strDescCamb'] = "Creado";
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/ruta_edit.php/'.$this->mctRuta->Ruta->CodiRuta;
                LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
            }
        } else {
		    $strMensUsua = 'El Código de la Ruta no puede contener slash (/)';
		    $this->mensaje($strMensUsua,'','d','hand-stop-o');
        }
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctRuta->TablasRelacionadasRuta();
        if (count($arrTablRela) && (!$this->btnConfBorr->Visible)) {
            $strTablRela = implode(',',$arrTablRela);
            $strTextMens = 'Existen registros relacionados en: '.$strTablRela.'. Presione el botón <b>Confirmar</b> para eliminar el registro';
            $this->mensaje($strTextMens,'m','w',__iEXCL__);
            $blnTodoOkey = false;
            $this->confirmarEliminacion(true);
        }
        if ($blnTodoOkey) {
            //$this->mctRuta->DeleteRuta();
            //--------------------------------------------------------------------------
            // Las Operaciones relacionadas a esta ruta, seran eliminadas (soft-delete)
            //--------------------------------------------------------------------------
            $this->mctRuta->Ruta->eliminarOperacionesRelacionadas();
            $this->mctRuta->Ruta->DeletedAt = new QDateTime(QDateTime::Now);
            $this->mctRuta->Ruta->Save();
            $arrLogxCamb['strNombTabl'] = 'Ruta';
            $arrLogxCamb['intRefeRegi'] = $this->mctRuta->Ruta->CodiRuta;
            $arrLogxCamb['strNombRegi'] = $this->mctRuta->Ruta->DescRuta;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }

    protected function confirmarEliminacion($blnVisuBoto) {
	    $this->btnNuevRegi->Visible = !$blnVisuBoto;
	    $this->btnSave->Visible     = !$blnVisuBoto;
	    $this->btnDelete->Visible   = !$blnVisuBoto;
	    $this->btnLogxCamb->Visible = !$blnVisuBoto;
        $this->btnConfBorr->Visible = $blnVisuBoto;
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// ruta_edit.tpl.php as the included HTML template file
RutaEditForm::Run('RutaEditForm');
?>