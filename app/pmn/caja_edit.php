<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CajaEditFormBase.class.php');

//error_reporting(E_ALL);

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Caja class.  It uses the code-generated
 * CajaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Caja columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both new_opcion_edit.php AND
 * new_opcion_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CajaEditForm extends CajaEditFormBase {
	protected $btnLogxCamb;

	protected $btnProxRegi;
	protected $btnRegiAnte;
	protected $btnPrimRegi;
	protected $btnUltiRegi;
	protected $intPosiRegi;
	protected $arrDataTabl;
	protected $intCantRegi;

	protected $lblCajaIdxx;
	protected $txtCajaDesc;
	protected $lstCajaRece;
	protected $txtContSeni;
	protected $lstTipoCaja;
	protected $txtImprIdxx;
	protected $txtImprSeri;

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

        $this->arrDataTabl = unserialize($_SESSION['DataCaja']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctCaja->Caja->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the CajaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctCaja = CajaMetaControl::CreateFromPathInfo($this);
		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->verificarNavegacion();

		// Call MetaControl's methods to create qcontrols based on Caja's data fields
		$this->lblCajaIdxx = $this->mctCaja->lblId_Create();
		$this->lblCajaIdxx->CssClass = 'form-label';

		$this->txtCajaDesc = $this->mctCaja->txtDescripcion_Create();
		$this->txtCajaDesc->CssClass = 'form-label';

		$this->lstCajaRece = $this->mctCaja->lstCounter_Create();
		$this->lstCajaRece->CssClass = 'form-label';

		$this->txtContSeni = $this->mctCaja->txtControlSeniat_Create();
		$this->txtContSeni->CssClass = 'form-label';

		$this->lstTipoCaja = $this->mctCaja->lstTipo_Create();
		$this->lstTipoCaja->CssClass = 'form-label';

		$this->txtImprIdxx = $this->mctCaja->txtImpresoraId_Create();
		$this->txtImprIdxx->CssClass = 'form-label';

		$this->txtImprSeri = $this->mctCaja->txtSerie_Create();
		$this->txtImprSeri->CssClass = 'form-label';

		// Create Buttons and Actions on this Form
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = '<i class="fa fa-floppy-o fa-lg"></i> Guardar';
		$this->btnSave->CssClass = 'btn btn-success';
		$this->btnSave->HtmlEntities = false;
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		$this->btnSave->CausesValidation = true;

		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
		$this->btnCancel->CssClass = 'btn btn-warning';
		$this->btnCancel->HtmlEntities = false;
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

		$this->btnDelete = new QButton($this);
		$this->btnDelete->Text = '<i class="fa fa-trash-o fa-lg"></i> Borrar';
		$this->btnDelete->CssClass = 'btn btn-danger';
		$this->btnDelete->HtmlEntities = false;
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Caja'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctCaja->EditMode;

		$this->btnLogxCamb_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Crear/Editar Cajas';
        if ($this->mctCaja->EditMode) {
            $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
        }
    }

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
		$this->lblMensUsua->HtmlEntities = false;
	}

	protected function lblNotiUsua_Create() {
		$this->lblNotiUsua = new QLabel($this);
		$this->lblNotiUsua->Text = '';
		$this->lblNotiUsua->HtmlEntities = false;
	}

    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
        $this->btnProxRegi->Text = '<i class="fa fa-angle-right"></i>';
        $this->btnProxRegi->CssClass = 'btn btn-primary';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        $this->btnRegiAnte->Text = '<i class="fa fa-angle-left"></i>';
        $this->btnRegiAnte->CssClass = 'btn btn-primary';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        $this->btnPrimRegi->Text = '<i class="fa fa-angle-double-left"></i>';
        $this->btnPrimRegi->CssClass = 'btn btn-primary';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        $this->btnUltiRegi->Text = '<i class="fa fa-angle-double-right"></i>';
        $this->btnUltiRegi->CssClass = 'btn btn-primary';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

	protected function btnLogxCamb_Create() {
		$this->btnLogxCamb = new QButton($this);
		$this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Log Cambios';
		$this->btnLogxCamb->CssClass = 'btn btn-default';
		$this->btnLogxCamb->HtmlEntities = false;
		$this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
		$this->btnLogxCamb->Visible = Log::CountByTablaRef('Caja',$this->mctCaja->Caja->Id);
	}

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

	protected function btnLogxCamb_Click() {
		$_SESSION['RegiRefe'] = $this->mctCaja->Caja->Id;
		$_SESSION['TablRefe'] = 'Caja';
		$_SESSION['RegiReto'] = 'new_opcion_edit.php/'.$this->mctCaja->Caja->Id;
		QApplication::Redirect(__APP__.'/okinawa/log_list.php');
	}

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__PMN__.'/new_opcion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__PMN__.'/new_opcion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__PMN__.'/new_opcion_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__PMN__.'/new_opcion_edit.php/'.$objRegiTabl->Id);
    }

    protected function verificarNavegacion() {
        if ($this->mctCaja->EditMode) {
            $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
            $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
            $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
            $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        } else {
            $this->btnRegiAnte->Enabled = false;
            $this->btnPrimRegi->Enabled = false;
            $this->btnProxRegi->Enabled = false;
            $this->btnUltiRegi->Enabled = false;
        }
    }

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctCaja->Caja;
		$this->mctCaja->SaveCaja();
		if ($this->mctCaja->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctCaja->Caja;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Caja';
				$arrLogxCamb['intRefeRegi'] = $this->mctCaja->Caja->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctCaja->Caja->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
			}
            $this->mensaje('Transacción Exitosa','','','check');
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'Caja';
			$arrLogxCamb['intRefeRegi'] = $this->mctCaja->Caja->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctCaja->Caja->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();			
		}
	}

    protected function RedirectToListPage() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__PMN__."/".$objUltiAcce->__toString());
    }


}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// new_opcion_edit.tpl.php as the included HTML template file
CajaEditForm::Run('CajaEditForm');
?>
