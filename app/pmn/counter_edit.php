    <?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CounterEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Counter class.  It uses the code-generated
 * CounterMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Counter columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both counter_edit.php AND
 * counter_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CounterEditForm extends CounterEditFormBase {
	protected $btnLogxCamb;

    protected $chkStatRece;
    protected $chkDomiOrig;
    protected $chkDomiDest;

	protected $btnProxRegi;
	protected $btnRegiAnte;
	protected $btnPrimRegi;
	protected $btnUltiRegi;
	protected $intPosiRegi;
	protected $arrDataTabl;
	protected $intCantRegi;

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

        $this->arrDataTabl = unserialize($_SESSION['DataCounter']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctCounter->Counter->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the CounterMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctCounter = CounterMetaControl::CreateFromPathInfo($this);
		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->verificarNavegacion();

		// Call MetaControl's methods to create qcontrols based on Counter's data fields
		$this->lblId = $this->mctCounter->lblId_Create();
		$this->lblId->CssClass = 'form-label';

		$this->txtDescripcion = $this->mctCounter->txtDescripcion_Create();

		$this->lstSucursal = $this->mctCounter->lstSucursal_Create();
		$this->lstSucursal->Width = 220;

		$this->lstRuta = $this->mctCounter->lstRuta_Create();
		$this->lstRuta->Width = 220;

        $this->lstEntregaInmediataObject = $this->mctCounter->lstEntregaInmediataObject_Create();
		$this->lstEntregaInmediataObject->Name = 'Entrega Inmediata?';

		$this->txtSiglas = $this->mctCounter->txtSiglas_Create();
		$this->txtSiglas->Width = 45;

		$this->txtLimiteDePaquetes = $this->mctCounter->txtLimiteDePaquetes_Create();
		$this->txtCantidadDePaquetes = $this->mctCounter->txtCantidadDePaquetes_Create();

		$this->txtCkptRecepcion = $this->mctCounter->txtCkptRecepcion_Create();
		$this->txtCkptRecepcion->Width = 45;

		$this->txtCkptConfirmacion = $this->mctCounter->txtCkptConfirmacion_Create();
		$this->txtCkptConfirmacion->Width = 45;

		$this->txtCkptAlmacen = $this->mctCounter->txtCkptAlmacen_Create();
		$this->txtCkptAlmacen->Width = 45;

		$this->txtPaisId = $this->mctCounter->txtPaisId_Create();

		$this->txtStatusId = $this->mctCounter->txtStatusId_Create();
        $this->chkStatRece_Create();

		$this->txtDireccion = $this->mctCounter->txtDireccion_Create();

		$this->lstElegirServicioObject = $this->mctCounter->lstElegirServicioObject_Create();

        $this->lstEsRutaObject = $this->mctCounter->lstEsRutaObject_Create();
		$this->lstEsRutaObject->Name = 'Es una Receptoria-Ruta ?';

		$this->lstSeFacturaObject = $this->mctCounter->lstSeFacturaObject_Create();
		$this->lstSeFacturaObject->Name = 'Se Factura ?';

		$this->lstPermitePagoObject = $this->mctCounter->lstPermitePagoObject_Create();
		$this->lstPermitePagoObject->Name = 'Permite Pago?';

		$this->txtEmailJefeAlmacen = $this->mctCounter->txtEmailJefeAlmacen_Create();
		$this->txtCkptAntiguedad1 = $this->mctCounter->txtCkptAntiguedad1_Create();
		$this->txtCkptAntiguedad2 = $this->mctCounter->txtCkptAntiguedad2_Create();
		$this->txtCkptAntiguedad0 = $this->mctCounter->txtCkptAntiguedad0_Create();
		$this->lstAliadoComercial = $this->mctCounter->lstAliadoComercial_Create();
		$this->txtLimiteKilos = $this->mctCounter->txtLimiteKilos_Create();
		$this->txtDependeDe = $this->mctCounter->txtDependeDe_Create();

		// $this->txtDomOrigen = $this->mctCounter->txtDomOrigen_Create();
        // $this->chkDomiOrig_Create();

		// $this->txtDomDestino = $this->mctCounter->txtDomDestino_Create();
        // $this->chkDomiDest_Create();

		// Create Buttons and Actions on this Form
		$this->btnSave = new QButtonS($this);
		$this->btnSave->Text = TextoIcono('floppy-o','Guardar');//'<i class="fa fa-floppy-o fa-lg"></i> Guardar';
		// $this->btnSave->CssClass = 'btn btn-success btn-sm';
		$this->btnSave->HtmlEntities = false;
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		$this->btnSave->CausesValidation = true;

		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
		$this->btnCancel->CssClass = 'btn btn-warning btn-sm';
		$this->btnCancel->HtmlEntities = false;
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

		$this->btnDelete = new QButton($this);
		$this->btnDelete->Text = '<i class="fa fa-trash-o fa-lg"></i> Borrar';
		$this->btnDelete->CssClass = 'btn btn-danger btn-sm';
		$this->btnDelete->HtmlEntities = false;
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Counter'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctCounter->EditMode;

		$this->btnLogxCamb_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Crear/Editar Receptoría';
        if ($this->mctCounter->EditMode) {
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
		$this->btnLogxCamb = new QButtonL($this);
		$this->btnLogxCamb->Text = TextoIcono('file-text-o','Hist'); //'<i class="fa fa-file-text-o fa-lg"></i> Log Cambios';
		// $this->btnLogxCamb->CssClass = 'btn btn-default';
		$this->btnLogxCamb->HtmlEntities = false;
		$this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
		$this->btnLogxCamb->Visible = Log::CountByTablaRef('Counter',$this->mctCounter->Counter->Id);
	}

    protected function chkStatRece_Create() {
        $this->chkStatRece = new QCheckBox($this);
        $this->chkStatRece->Name = 'Status';
        $this->chkStatRece->Checked = $this->mctCounter->Counter->StatusId;
    }

    protected function chkDomiOrig_Create() {
        $this->chkDomiOrig = new QCheckBox($this);
        $this->chkDomiOrig->Name = 'Domicilio Origen ?';
        $this->chkDomiOrig->Checked = $this->mctCounter->Counter->DomOrigen;
    }

    protected function chkDomiDest_Create() {
        $this->chkDomiDest = new QCheckBox($this);
        $this->chkDomiDest->Name = 'Domicilio Destino ?';
        $this->chkDomiDest->Checked = $this->mctCounter->Counter->DomDestino;
    }

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

	protected function btnLogxCamb_Click() {
		$_SESSION['RegiRefe'] = $this->mctCounter->Counter->Id;
		$_SESSION['TablRefe'] = 'Counter';
		$_SESSION['RegiReto'] = 'counter_edit.php/'.$this->mctCounter->Counter->Id;
		QApplication::Redirect(__APP__.'/sde/log_list.php');
	}

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__PMN__.'/counter_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__PMN__.'/counter_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__PMN__.'/counter_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__PMN__.'/counter_edit.php/'.$objRegiTabl->Id);
    }

    protected function verificarNavegacion() {
        if ($this->mctCounter->EditMode) {
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
		$objRegiViej = clone $this->mctCounter->Counter;
        $this->txtStatusId->Text = $this->chkStatRece->Checked;
        // $this->txtDomOrigen->Text = $this->chkDomiOrig->Checked;
        // $this->txtDomDestino->Text = $this->chkDomiDest->Checked;
		$this->mctCounter->SaveCounter();
		if ($this->mctCounter->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctCounter->Counter;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Counter';
				$arrLogxCamb['intRefeRegi'] = $this->mctCounter->Counter->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctCounter->Counter->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
			}
            $this->mensaje('Transaccion Exitosa','','','check');
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'Counter';
			$arrLogxCamb['intRefeRegi'] = $this->mctCounter->Counter->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctCounter->Counter->Descripcion;
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
// counter_edit.tpl.php as the included HTML template file
CounterEditForm::Run('CounterEditForm');
?>
