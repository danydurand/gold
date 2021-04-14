<?php
/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the SreGuia class.  It uses the code-generated
 * SreGuiaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a SreGuia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both sre_guia_edit.php AND
 * sre_guia_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage FormBaseObjects
 */
abstract class SreGuiaEditFormBase extends QForm {
	// Local instance of the SreGuiaMetaControl
	/**
	 * @var SreGuiaMetaControlGen mctSreGuia
	 */
	protected $mctSreGuia;
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

	// Controls for SreGuia's Data Fields
	protected $txtNumeGuia;
	protected $txtCodiClie;
	protected $txtClienteId;
	protected $calFechGuia;
	protected $lstEstaOrigObject;
	protected $lstEstaDestObject;
	protected $txtPesoGuia;
	protected $txtNombRemi;
	protected $txtDireRemi;
	protected $txtTeleRemi;
	protected $txtNombDest;
	protected $txtDireDest;
	protected $txtTeleDest;
	protected $txtCantPiez;
	protected $txtDescCont;
	protected $lstCodiProdObject;
	protected $lstTipoGuiaObject;
	protected $txtValorDeclarado;
	protected $txtPorcentajeIva;
	protected $txtMontoIva;
	protected $txtPorcentajeGas;
	protected $txtMontoGas;
	protected $chkAsegurado;
	protected $txtPorcentajeSeguro;
	protected $txtMontoSeguro;
	protected $txtMontoBase;
	protected $txtMontoFranqueo;
	protected $txtMontoOtros;
	protected $txtMontoTotal;
	protected $txtEntregadoA;
	protected $calFechaEntrega;
	protected $txtHoraEntrega;
	protected $txtCodiCkpt;
	protected $txtEstaCkpt;
	protected $calFechCkpt;
	protected $txtHoraCkpt;
	protected $txtObseCkpt;
	protected $txtUsuaCkpt;
	protected $calFechaPod;
	protected $txtHoraPod;
	protected $txtUsuarioPod;
	protected $txtCantAyudantes;
	protected $txtParadasAdicionales;
	protected $lstCourier;
	protected $txtGuiaExterna;
	protected $chkFleteDirecto;
	protected $chkTieneGuiaRetorno;
	protected $txtGuiaRetorno;
	protected $txtObservacion;
	protected $txtAlto;
	protected $txtAncho;
	protected $txtLargo;
	protected $lstOperacion;
	protected $txtMontoBaseInt;
	protected $txtPorcentajeSgroInt;
	protected $txtMontoSgroInt;
	protected $txtMontoTotalInt;
	protected $txtTotalIntLocal;
	protected $txtPesoVolumetrico;
	protected $txtPesoLibras;
	protected $lstTransFacObject;
	protected $txtHojaEntrega;
	protected $txtUsuarioCreacion;
	protected $calFechaCreacion;
	protected $txtHoraCreacion;
	protected $txtSistemaId;
	protected $txtRecolectaId;
	protected $txtTipoDocumentoId;
	protected $txtCedulaRif;
	protected $txtCierreCaja;
	protected $txtCajaId;
	protected $txtAnulada;
	protected $txtProductoId;
	protected $txtTasaDolar;
	protected $txtVolMaritimoPies;
	protected $txtVolMaritimoMts;
	protected $txtDescripcionGral;
	protected $txtUbicacion;
	protected $txtPromocionId;

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

        // Use the CreateFromPathInfo shortcut (this can also be done manually using the SreGuiaMetaControl constructor)
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctSreGuia = SreGuiaMetaControl::CreateFromPathInfo($this);

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

		// Call MetaControl's methods to create qcontrols based on SreGuia's data fields
		$this->txtNumeGuia = $this->mctSreGuia->txtNumeGuia_Create();
		$this->txtCodiClie = $this->mctSreGuia->txtCodiClie_Create();
		$this->txtClienteId = $this->mctSreGuia->txtClienteId_Create();
		$this->calFechGuia = $this->mctSreGuia->calFechGuia_Create();
		$this->lstEstaOrigObject = $this->mctSreGuia->lstEstaOrigObject_Create();
		$this->lstEstaDestObject = $this->mctSreGuia->lstEstaDestObject_Create();
		$this->txtPesoGuia = $this->mctSreGuia->txtPesoGuia_Create();
		$this->txtNombRemi = $this->mctSreGuia->txtNombRemi_Create();
		$this->txtDireRemi = $this->mctSreGuia->txtDireRemi_Create();
		$this->txtTeleRemi = $this->mctSreGuia->txtTeleRemi_Create();
		$this->txtNombDest = $this->mctSreGuia->txtNombDest_Create();
		$this->txtDireDest = $this->mctSreGuia->txtDireDest_Create();
		$this->txtTeleDest = $this->mctSreGuia->txtTeleDest_Create();
		$this->txtCantPiez = $this->mctSreGuia->txtCantPiez_Create();
		$this->txtDescCont = $this->mctSreGuia->txtDescCont_Create();
		$this->lstCodiProdObject = $this->mctSreGuia->lstCodiProdObject_Create();
		$this->lstTipoGuiaObject = $this->mctSreGuia->lstTipoGuiaObject_Create();
		$this->txtValorDeclarado = $this->mctSreGuia->txtValorDeclarado_Create();
		$this->txtPorcentajeIva = $this->mctSreGuia->txtPorcentajeIva_Create();
		$this->txtMontoIva = $this->mctSreGuia->txtMontoIva_Create();
		$this->txtPorcentajeGas = $this->mctSreGuia->txtPorcentajeGas_Create();
		$this->txtMontoGas = $this->mctSreGuia->txtMontoGas_Create();
		$this->chkAsegurado = $this->mctSreGuia->chkAsegurado_Create();
		$this->txtPorcentajeSeguro = $this->mctSreGuia->txtPorcentajeSeguro_Create();
		$this->txtMontoSeguro = $this->mctSreGuia->txtMontoSeguro_Create();
		$this->txtMontoBase = $this->mctSreGuia->txtMontoBase_Create();
		$this->txtMontoFranqueo = $this->mctSreGuia->txtMontoFranqueo_Create();
		$this->txtMontoOtros = $this->mctSreGuia->txtMontoOtros_Create();
		$this->txtMontoTotal = $this->mctSreGuia->txtMontoTotal_Create();
		$this->txtEntregadoA = $this->mctSreGuia->txtEntregadoA_Create();
		$this->calFechaEntrega = $this->mctSreGuia->calFechaEntrega_Create();
		$this->txtHoraEntrega = $this->mctSreGuia->txtHoraEntrega_Create();
		$this->txtCodiCkpt = $this->mctSreGuia->txtCodiCkpt_Create();
		$this->txtEstaCkpt = $this->mctSreGuia->txtEstaCkpt_Create();
		$this->calFechCkpt = $this->mctSreGuia->calFechCkpt_Create();
		$this->txtHoraCkpt = $this->mctSreGuia->txtHoraCkpt_Create();
		$this->txtObseCkpt = $this->mctSreGuia->txtObseCkpt_Create();
		$this->txtUsuaCkpt = $this->mctSreGuia->txtUsuaCkpt_Create();
		$this->calFechaPod = $this->mctSreGuia->calFechaPod_Create();
		$this->txtHoraPod = $this->mctSreGuia->txtHoraPod_Create();
		$this->txtUsuarioPod = $this->mctSreGuia->txtUsuarioPod_Create();
		$this->txtCantAyudantes = $this->mctSreGuia->txtCantAyudantes_Create();
		$this->txtParadasAdicionales = $this->mctSreGuia->txtParadasAdicionales_Create();
		$this->lstCourier = $this->mctSreGuia->lstCourier_Create();
		$this->txtGuiaExterna = $this->mctSreGuia->txtGuiaExterna_Create();
		$this->chkFleteDirecto = $this->mctSreGuia->chkFleteDirecto_Create();
		$this->chkTieneGuiaRetorno = $this->mctSreGuia->chkTieneGuiaRetorno_Create();
		$this->txtGuiaRetorno = $this->mctSreGuia->txtGuiaRetorno_Create();
		$this->txtObservacion = $this->mctSreGuia->txtObservacion_Create();
		$this->txtAlto = $this->mctSreGuia->txtAlto_Create();
		$this->txtAncho = $this->mctSreGuia->txtAncho_Create();
		$this->txtLargo = $this->mctSreGuia->txtLargo_Create();
		$this->lstOperacion = $this->mctSreGuia->lstOperacion_Create();
		$this->txtMontoBaseInt = $this->mctSreGuia->txtMontoBaseInt_Create();
		$this->txtPorcentajeSgroInt = $this->mctSreGuia->txtPorcentajeSgroInt_Create();
		$this->txtMontoSgroInt = $this->mctSreGuia->txtMontoSgroInt_Create();
		$this->txtMontoTotalInt = $this->mctSreGuia->txtMontoTotalInt_Create();
		$this->txtTotalIntLocal = $this->mctSreGuia->txtTotalIntLocal_Create();
		$this->txtPesoVolumetrico = $this->mctSreGuia->txtPesoVolumetrico_Create();
		$this->txtPesoLibras = $this->mctSreGuia->txtPesoLibras_Create();
		$this->lstTransFacObject = $this->mctSreGuia->lstTransFacObject_Create();
		$this->txtHojaEntrega = $this->mctSreGuia->txtHojaEntrega_Create();
		$this->txtUsuarioCreacion = $this->mctSreGuia->txtUsuarioCreacion_Create();
		$this->calFechaCreacion = $this->mctSreGuia->calFechaCreacion_Create();
		$this->txtHoraCreacion = $this->mctSreGuia->txtHoraCreacion_Create();
		$this->txtSistemaId = $this->mctSreGuia->txtSistemaId_Create();
		$this->txtRecolectaId = $this->mctSreGuia->txtRecolectaId_Create();
		$this->txtTipoDocumentoId = $this->mctSreGuia->txtTipoDocumentoId_Create();
		$this->txtCedulaRif = $this->mctSreGuia->txtCedulaRif_Create();
		$this->txtCierreCaja = $this->mctSreGuia->txtCierreCaja_Create();
		$this->txtCajaId = $this->mctSreGuia->txtCajaId_Create();
		$this->txtAnulada = $this->mctSreGuia->txtAnulada_Create();
		$this->txtProductoId = $this->mctSreGuia->txtProductoId_Create();
		$this->txtTasaDolar = $this->mctSreGuia->txtTasaDolar_Create();
		$this->txtVolMaritimoPies = $this->mctSreGuia->txtVolMaritimoPies_Create();
		$this->txtVolMaritimoMts = $this->mctSreGuia->txtVolMaritimoMts_Create();
		$this->txtDescripcionGral = $this->mctSreGuia->txtDescripcionGral_Create();
		$this->txtUbicacion = $this->mctSreGuia->txtUbicacion_Create();
		$this->txtPromocionId = $this->mctSreGuia->txtPromocionId_Create();

		$this->btnSave_Create();
		$this->btnCancel_Create();
		$this->btnDelete_Create();

	}

	//-----------------------------
	// Aqui se crean los Objetos 
	//-----------------------------

    protected function determinarPosicion() {
        if ($this->mctSreGuia->SreGuia && !isset($_SESSION['DataSreGuia'])) {
            $_SESSION['DataSreGuia'] = serialize(array($this->mctSreGuia->SreGuia));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataSreGuia']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctSreGuia->SreGuia->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

	protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'SreGuia';
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
        $this->btnNuevRegi->Visible = $this->mctSreGuia->EditMode;
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
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('SreGuia'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctSreGuia->EditMode;
	}

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('SreGuia',$this->mctSreGuia->SreGuia->Id);
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
        $this->btnNuevSmal->Visible = $this->mctSreGuia->EditMode;
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
        $this->btnBorrSmal->Visible = $this->mctSreGuia->EditMode;
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
        QApplication::Redirect(__SIST__.'/sre_guia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/sre_guia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/sre_guia_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/sre_guia_edit.php/'.$objRegiTabl->Id);
    }

    protected function verificarNavegacion() {
        if ($this->mctSreGuia->EditMode) {
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
		// Delegate "Save" processing to the SreGuiaMetaControl
		$this->mctSreGuia->SaveSreGuia();
		$this->RedirectToListPage();
	}

	protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
		//----------------------------------------
		// Se verifica la integridad referencial
		//----------------------------------------
		$blnTodoOkey = true;
		$arrTablRela = $this->mctSreGuia->TablasRelacionadasSreGuia();
		if (count($arrTablRela)) {
			$strTablRela = implode(',',$arrTablRela);
				
			//$this->txtNumeGuia->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->mensaje(sprintf('Existen registros relacionados en %s',$strTablRela),'m','d','hand-stop-o');
			$blnTodoOkey = false;
		}
		if ($blnTodoOkey) {
			// Delegate "Delete" processing to the SreGuiaMetaControl
			$this->mctSreGuia->DeleteSreGuia();
			$this->RedirectToListPage();
		}
	}

    protected function btnLogxCamb_Click() {
        $_SESSION['RegiRefe'] = $this->mctSreGuia->SreGuia->Id;
        $_SESSION['TablRefe'] = 'SreGuia';
        $_SESSION['RegiReto'] = 'sre_guia_edit.php/'.$this->mctSreGuia->SreGuia->Id;
        QApplication::Redirect(__SIST__.'/log_list.php');
    }

    protected function btnVolvList_Click() {
        QApplication::Redirect(__SIST__.'/sre_guia_list.php');
    }

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/sre_guia_edit.php');
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