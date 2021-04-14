<?php
/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the ReposicionIncidencia class.  It uses the code-generated
 * ReposicionIncidenciaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a ReposicionIncidencia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both reposicion_incidencia_edit.php AND
 * reposicion_incidencia_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class ReposicionIncidenciaEditFormBase extends QForm {
	// Local instance of the ReposicionIncidenciaMetaControl
	/**
	 * @var ReposicionIncidenciaMetaControlGen mctReposicionIncidencia
	 */
	protected $mctReposicionIncidencia;
	protected $lblMensUsua;
	protected $lblNotiUsua;
	protected $lblTituForm;

    protected $objUsuario;

    protected $btnLogxCamb;

    protected $btnVolvList;
    protected $btnNuevRegi;
    protected $btnProxRegi;
    protected $btnRegiAnte;
    protected $btnPrimRegi;
    protected $btnUltiRegi;
    protected $intPosiRegi;
    protected $arrDataTabl;
    protected $intCantRegi;

    protected $btnVolvSmal;
    protected $btnNuevSmal;
    protected $btnGuarSmal;
    protected $btnBorrSmal;
    protected $btnHistSmal;

    protected $btnPrimSmal;
    protected $btnAnteSmal;
    protected $btnProxSmal;
    protected $btnUltiSmal;

	// Controls for ReposicionIncidencia's Data Fields
	protected $lblId;
	protected $lstIncidencia;
	protected $lstProducto;
	protected $calFecha;
	protected $calHora;
	protected $txtCantidad;
	protected $txtPrecioUsd;
	protected $txtPrecioVeb;
	protected $txtTotalUsd;
	protected $txtTotalVeb;

	// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

	// Other Controls
	/**
	 * @var QButton Save
	 */
	protected $btnSave;
	/**
	 * @var QButton Delete
	 */
	protected $btnDelete;
	/**
	 * @var QButton Cancel
	 */
	protected $btnCancel;

	// Create QForm Event Handlers as Needed

    //	protected function Form_Exit() {}
    //	protected function Form_Load() {}
    //	protected function Form_PreRender() {}

	protected function Form_Run() {
		parent::Form_Run();
	}

	protected function Form_Create() {
		parent::Form_Create();

        $this->objUsuario = unserialize($_SESSION['User']);

        // Use the CreateFromPathInfo shortcut (this can also be done manually using the ReposicionIncidenciaMetaControl constructor)
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctReposicionIncidencia = ReposicionIncidenciaMetaControl::CreateFromPathInfo($this);

        $this->determinarPosicion();

		$this->lblMensUsua_Create();
		$this->lblNotiUsua_Create();
		$this->lblTituForm_Create();

        $this->btnNuevRegi_Create();
        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();
        $this->btnVolvList_Create();

        $this->btnLogxCamb_Create();

        $this->btnVolvSmal_Create();
        $this->btnNuevSmal_Create();
        $this->btnGuarSmal_Create();
        $this->btnBorrSmal_Create();
        $this->btnHistSmal_Create();

        $this->btnPrimSmal_Create();
        $this->btnAnteSmal_Create();
        $this->btnProxSmal_Create();
        $this->btnUltiSmal_Create();

        $this->verificarNavegacion();

		// Call MetaControl's methods to create qcontrols based on ReposicionIncidencia's data fields
		$this->lblId = $this->mctReposicionIncidencia->lblId_Create();
		$this->lstIncidencia = $this->mctReposicionIncidencia->lstIncidencia_Create();
		$this->lstProducto = $this->mctReposicionIncidencia->lstProducto_Create();
		$this->calFecha = $this->mctReposicionIncidencia->calFecha_Create();
		$this->calHora = $this->mctReposicionIncidencia->calHora_Create();
		$this->txtCantidad = $this->mctReposicionIncidencia->txtCantidad_Create();
		$this->txtPrecioUsd = $this->mctReposicionIncidencia->txtPrecioUsd_Create();
		$this->txtPrecioVeb = $this->mctReposicionIncidencia->txtPrecioVeb_Create();
		$this->txtTotalUsd = $this->mctReposicionIncidencia->txtTotalUsd_Create();
		$this->txtTotalVeb = $this->mctReposicionIncidencia->txtTotalVeb_Create();

		$this->btnSave_Create();
		$this->btnCancel_Create();
		$this->btnDelete_Create();

	}

	//-----------------------------
	// Aqui se crean los Objetos 
	//-----------------------------

    protected function determinarPosicion() {
        if ($this->mctReposicionIncidencia->ReposicionIncidencia && !isset($_SESSION['DataReposicionIncidencia'])) {
            $_SESSION['DataReposicionIncidencia'] = serialize(array($this->mctReposicionIncidencia->ReposicionIncidencia));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataReposicionIncidencia']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctReposicionIncidencia->ReposicionIncidencia->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

	protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'ReposicionIncidencia';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';
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

    //-------------------------
    // Botónes del Formulario 
    //-------------------------

    protected function btnNuevRegi_Create() {
        $this->btnNuevRegi = new QButton($this);
        $this->btnNuevRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
        $this->btnNuevRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnNuevRegi->HtmlEntities = false;
        $this->btnNuevRegi->AddAction(new QClickEvent(), new QServerAction('btnNuevRegi_Click'));
        $this->btnNuevRegi->Visible = $this->mctReposicionIncidencia->EditMode;
    }

    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
        $this->btnProxRegi->Text = 'Proximo <i class="fa fa-angle-right fa-lg"></i>';
        $this->btnProxRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        $this->btnRegiAnte->Text = '<i class="fa fa-angle-left fa-lg"></i> Anterior';
        $this->btnRegiAnte->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        $this->btnPrimRegi->Text = '<i class="fa fa-angle-double-left fa-lg"></i> Primero';
        $this->btnPrimRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        $this->btnUltiRegi->Text = 'Ultimo <i class="fa fa-angle-double-right fa-lg"></i>';
        $this->btnUltiRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    protected function btnVolvList_Create() {
        $this->btnVolvList = new QButton($this);
        $this->btnVolvList->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
        $this->btnVolvList->CssClass = 'btn btn-warning btn-sm';
        $this->btnVolvList->HtmlEntities = false;
        $this->btnVolvList->AddAction(new QClickEvent(), new QServerAction('btnVolvList_Click'));
    }

	protected function btnSave_Create() {
		// Create Buttons and Actions on this Form
		$this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-floppy-o fa-lg"></i> Guardar';
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->HtmlEntities = false;
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		$this->btnSave->CausesValidation = true;
		$this->btnSave->PrimaryButton = true;
	}

	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = false;
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
	}

	protected function btnDelete_Create() {
		$this->btnDelete = new QButton($this);
        $this->btnDelete->Text = '<i class="fa fa-trash-o fa-lg"></i> Borrar';
        $this->btnDelete->CssClass = 'btn btn-danger btn-sm';
        $this->btnDelete->HtmlEntities = false;
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('ReposicionIncidencia'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctReposicionIncidencia->EditMode;
	}

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('ReposicionIncidencia',$this->mctReposicionIncidencia->ReposicionIncidencia->Id);
    }

    //-------------------------
    // Botones CRUD sin Texto
    //-------------------------

    protected function btnVolvSmal_Create() {
        $this->btnVolvSmal = new QButton($this);
        $this->btnVolvSmal->Text = '<i class="fa fa-mail-reply fa-lg"></i>';
        $this->btnVolvSmal->CssClass = 'btn btn-warning btn-sm';
        $this->btnVolvSmal->HtmlEntities = false;
        $this->btnVolvSmal->AddAction(new QClickEvent(), new QServerAction('btnVolvList_Click'));
    }

    protected function btnNuevSmal_Create() {
        $this->btnNuevSmal = new QButton($this);
        $this->btnNuevSmal->Text = '<i class="fa fa-plus-circle fa-lg"></i>';
        $this->btnNuevSmal->CssClass = 'btn btn-primary btn-sm';
        $this->btnNuevSmal->HtmlEntities = false;
        $this->btnNuevSmal->AddAction(new QClickEvent(), new QServerAction('btnNuevRegi_Click'));
        $this->btnNuevSmal->Visible = $this->mctReposicionIncidencia->EditMode;
    }

    protected function btnGuarSmal_Create() {
        $this->btnGuarSmal = new QButton($this);
        $this->btnGuarSmal->Text = '<i class="fa fa-floppy-o fa-lg"></i>';
        $this->btnGuarSmal->CssClass = 'btn btn-success btn-sm';
        $this->btnGuarSmal->HtmlEntities = false;
        $this->btnGuarSmal->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
        $this->btnGuarSmal->CausesValidation = true;
        $this->btnGuarSmal->PrimaryButton = true;
    }

    protected function btnBorrSmal_Create() {
        $this->btnBorrSmal = new QButton($this);
        $this->btnBorrSmal->Text = '<i class="fa fa-trash-o fa-lg"></i>';
        $this->btnBorrSmal->CssClass = 'btn btn-danger btn-sm';
        $this->btnBorrSmal->HtmlEntities = false;
        $this->btnBorrSmal->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('GuiaRoxanne'))));
        $this->btnBorrSmal->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnBorrSmal->Visible = $this->mctReposicionIncidencia->EditMode;
    }

    protected function btnHistSmal_Create() {
        $this->btnHistSmal = new QButton($this);
        $this->btnHistSmal->Text = '<i class="fa fa-file-text-o fa-lg"></i>';
        $this->btnHistSmal->CssClass = 'btn btn-default btn-sm';
        $this->btnHistSmal->HtmlEntities = false;
        $this->btnHistSmal->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnHistSmal->Visible = $this->btnLogxCamb->Visible;
    }

    //----------------------------------
    // Botones de Navegacion sin Texto
    //----------------------------------

    protected function btnPrimSmal_Create() {
        $this->btnPrimSmal = new QButton($this);
        $this->btnPrimSmal->Text = '<i class="fa fa-angle-double-left fa-lg"></i>';
        $this->btnPrimSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimSmal->HtmlEntities = false;
        $this->btnPrimSmal->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnAnteSmal_Create() {
        $this->btnAnteSmal = new QButton($this);
        $this->btnAnteSmal->Text = '<i class="fa fa-angle-left fa-lg"></i>';
        $this->btnAnteSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnAnteSmal->HtmlEntities = false;
        $this->btnAnteSmal->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnProxSmal_Create() {
        $this->btnProxSmal = new QButton($this);
        $this->btnProxSmal->Text = '<i class="fa fa-angle-right fa-lg"></i>';
        $this->btnProxSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxSmal->HtmlEntities = false;
        $this->btnProxSmal->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnUltiSmal_Create() {
        $this->btnUltiSmal = new QButton($this);
        $this->btnUltiSmal->Text = '<i class="fa fa-angle-double-right fa-lg"></i>';
        $this->btnUltiSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiSmal->HtmlEntities = false;
        $this->btnUltiSmal->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }


/**
	 * This Form_Validate event handler allows you to specify any custom Form Validation rules.
	 * It will also Blink() on all invalid controls, as well as Focus() on the top-most invalid control.
	 */
	protected function Form_Validate() {
		// By default, we report the result of validation from the parent
		$blnToReturn = parent::Form_Validate();

		// Custom Validation Rules
		// TODO: Be sure to set $blnToReturn to false if any custom validation fails!
		
		$blnFocused = false;
		foreach ($this->GetErrorControls() as $objControl) {
			// Set Focus to the top-most invalid control
			if (!$blnFocused) {
				$objControl->Focus();
				$blnFocused = true;
			}

			// Blink on ALL invalid controls
			$objControl->Blink();
		}

		return $blnToReturn;
	}

    //-----------------------------------
    // Acciones relativas a los objetos 
    //-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/reposicion_incidencia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/reposicion_incidencia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/reposicion_incidencia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/reposicion_incidencia_edit.php/'.$objRegiTabl->Id);
    }

    protected function verificarNavegacion() {
        if ($this->mctReposicionIncidencia->EditMode) {
            $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
            $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
            $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
            $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);

            $this->btnAnteSmal->Enabled = !($this->intPosiRegi == 0);
            $this->btnPrimSmal->Enabled = !($this->intPosiRegi == 0);
            $this->btnProxSmal->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
            $this->btnUltiSmal->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        } else {
            $this->btnRegiAnte->Enabled = false;
            $this->btnPrimRegi->Enabled = false;
            $this->btnProxRegi->Enabled = false;
            $this->btnUltiRegi->Enabled = false;

            $this->btnAnteSmal->Enabled = false;
            $this->btnPrimSmal->Enabled = false;
            $this->btnProxSmal->Enabled = false;
            $this->btnUltiSmal->Enabled = false;
        }
    }

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		// Delegate "Save" processing to the ReposicionIncidenciaMetaControl
		$this->mctReposicionIncidencia->SaveReposicionIncidencia();
		$this->RedirectToListPage();
	}

	protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
		//----------------------------------------
		// Se verifica la integridad referencial
		//----------------------------------------
		$blnTodoOkey = true;
		$arrTablRela = $this->mctReposicionIncidencia->TablasRelacionadasReposicionIncidencia();
		if (count($arrTablRela)) {
			$strTablRela = implode(',',$arrTablRela);
				
			//$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->mensaje(sprintf('Existen registros relacionados en %s',$strTablRela),'m','d','hand-stop-o');
			$blnTodoOkey = false;
		}
		if ($blnTodoOkey) {
			// Delegate "Delete" processing to the ReposicionIncidenciaMetaControl
			$this->mctReposicionIncidencia->DeleteReposicionIncidencia();
			$this->RedirectToListPage();
		}
	}

    protected function btnLogxCamb_Click() {
        $_SESSION['RegiRefe'] = $this->mctReposicionIncidencia->ReposicionIncidencia->Id;
        $_SESSION['TablRefe'] = 'ReposicionIncidencia';
        $_SESSION['RegiReto'] = 'reposicion_incidencia_edit.php/'.$this->mctReposicionIncidencia->ReposicionIncidencia->Id;
        QApplication::Redirect(__SIST__.'/log_list.php');
    }

    protected function btnVolvList_Click() {
        QApplication::Redirect(__SIST__.'/reposicion_incidencia_list.php');
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/reposicion_incidencia_edit.php');
    }


    protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->RedirectToListPage();
	}

	// Other Methods
	protected function RedirectToListPage() {
		$objUltiAcce = PilaAcceso::Pop('D');
		QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
	}

    protected function ninfo($strTextMens) {
        $this->mensaje($strTextMens,'n','i',null,__iINFO__);
    }

    protected function ndanger($strTextMens) {
        $this->mensaje($strTextMens,'n','d',null,__iHAND__);
    }

    protected function nwarning($strTextMens) {
        $this->mensaje($strTextMens,'n','w',null,__iEXCL__);
    }

    protected function nsuccess($strTextMens) {
        $this->mensaje($strTextMens,'n','s',null,__iCHEC__);
    }


    protected function info($strTextMens) {
        $this->mensaje($strTextMens,'m','i',null,__iINFO__);
    }

    protected function danger($strTextMens) {
        $this->mensaje($strTextMens,'m','d',null,__iHAND__);
    }

    protected function warning($strTextMens) {
        $this->mensaje($strTextMens,'m','w',null,__iEXCL__);
    }

    protected function success($strTextMens) {
        $this->mensaje($strTextMens,'m','s',null,__iCHEC__);
    }


    protected function mensaje($strTextNoti='', $strTipoMens='m', $strClasMens='s', $strPosiIcon='l', $strNombIcon='') {
        if (strlen($strTextNoti) == 0) {
            $this->lblMensUsua->Text = '';
            $this->lblMensUsua->HtmlEntities = false;
            $this->lblMensUsua->CssClass = '';
            $this->lblNotiUsua->Text = '';
            $this->lblNotiUsua->HtmlEntities = false;
            $this->lblNotiUsua->CssClass = '';
        } else {
			//------------------------------------------
			// Aqui se determina el estilo del mensaje
			//------------------------------------------
			$strClasAsig = 'alert alert-';
			switch (strtolower($strClasMens)) {
				case 'i':
					$strClasAsig .= 'info';
					break;
				case 's':
					$strClasAsig .= 'success';
					break;
				case 'w':
					$strClasAsig .= 'warning';
					break;
				case 'd':
					$strClasAsig .= 'danger';
					break;
				default:
					$strClasAsig .= 'success';
			}
			if (strlen($strNombIcon) > 0) {
				$strNombIcon = '<i class="fa fa-'.$strNombIcon.' fa-lg"></i> ';
			}
            if ($strPosiIcon == 'i') {
                //---------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //---------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            } elseif ($strPosiIcon == 'r') {
                //---------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //---------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
    		} else {
                //-----------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //-----------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            }
		}
	}
}

?>