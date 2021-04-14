<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/EstacionEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Estacion class.  It uses the code-generated
 * EstacionMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Estacion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both estacion_edit.php AND
 * estacion_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class EstacionEditForm extends EstacionEditFormBase {
    protected $intCuenCont;
    protected $intCuenCods;
    protected $intCuenComa;
    protected $dtgReceSucu;
    protected $intCantRece;
    protected $chkVisiClie;

    protected $btnNuevRece;

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

        $this->lblTituForm->Text = 'Sucursal';
        $intAnchCamp = 280;

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the EstacionMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctEstacion = EstacionMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Estacion's data fields
		$this->txtCodiEsta = $this->mctEstacion->txtCodiEsta_Create();
		$this->txtCodiEsta->Name = 'Código IATA';
		$this->txtCodiEsta->Width = 45;
		$this->txtCodiEsta->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");

		$this->lstCodiStatObject = $this->mctEstacion->lstCodiStatObject_Create();

        $this->txtDescEsta = $this->mctEstacion->txtDescEsta_Create();
        $this->txtDescEsta->Name = 'Descripción';
        $this->txtDescEsta->Width = $intAnchCamp;
        $this->txtDescEsta->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");

        $this->txtTextObse = $this->mctEstacion->txtTextObse_Create();
        $this->txtTextObse->Name = 'Dirección';
        $this->txtTextObse->TextMode = QTextMode::MultiLine;
        $this->txtTextObse->Width = $intAnchCamp;
        $this->txtTextObse->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");

        $this->txtNombCont = $this->mctEstacion->txtNombCont_Create();
        $this->txtNombCont->Name = 'Persona Contacto';
        $this->txtNombCont->Width = $intAnchCamp;

        $this->txtNumeTele = $this->mctEstacion->txtNumeTele_Create();
        $this->txtNumeTele->Name = 'Teléfono del Contacto';
        $this->txtNumeTele->Width = $intAnchCamp;

        $this->txtNumeDias = $this->mctEstacion->txtNumeDias_Create();
        $this->txtNumeDias->Name = 'Se cubre en';
        $this->txtNumeDias->Width = 80;

        $this->txtDireMail = $this->mctEstacion->txtDireMail_Create();
        $this->txtDireMail->Name = 'Correo Electrónico';
        $this->txtDireMail->Width = $intAnchCamp;
        $this->txtDireMail->Rows = 2;
        $this->txtDireMail->TextMode = QTextMode::MultiLine;
        $this->txtDireMail->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");

        $this->txtDireMailPrincipal = $this->mctEstacion->txtDireMailPrincipal_Create();
        $this->txtDireMailPrincipal->Name = 'E-mail Principal';
        $this->txtDireMailPrincipal->Width = $intAnchCamp;
        $this->txtDireMailPrincipal->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");

        $this->lstRegion = $this->mctEstacion->lstRegion_Create();
        $this->lstPais = $this->mctEstacion->lstPais_Create();

        $this->txtCuentaCnt = $this->mctEstacion->txtCuentaCnt_Create();
        $this->txtCuentaCnt->Name = 'Cuenta Contado';
        $this->txtCuentaCnt->ActionParameter = 'cnt';
        $this->txtCuentaCnt->AddAction(new QBlurEvent(), new QAjaxAction('validarCuenta'));

        $this->txtCuentaCod = $this->mctEstacion->txtCuentaCod_Create();
        $this->txtCuentaCod->Name = 'Cuenta COD';
        $this->txtCuentaCod->ActionParameter = 'cod';
        $this->txtCuentaCod->AddAction(new QBlurEvent(), new QAjaxAction('validarCuenta'));

        $this->txtCuentaCom = $this->mctEstacion->txtCuentaCom_Create();
        $this->txtCuentaCom->Name = 'Cuenta COMAIL';
        $this->txtCuentaCom->ActionParameter = 'com';
        $this->txtCuentaCom->AddAction(new QBlurEvent(), new QAjaxAction('validarCuenta'));

		$this->txtPorcentajeVenta = $this->mctEstacion->txtPorcentajeVenta_Create();
		$this->txtPorcentajeVenta->Width = 50;

		$this->txtPorcentajeEntrega = $this->mctEstacion->txtPorcentajeEntrega_Create();
		$this->txtPorcentajeEntrega->Width = 50;

		$this->lstOperacion = $this->mctEstacion->lstOperacion_Create();
		$this->lstOperacion->Width = $intAnchCamp;

        $this->lstEsUnAlmacenObject = $this->mctEstacion->lstEsUnAlmacenObject_Create();
        $this->lstEsUnAlmacenObject->Name = 'Es un Almacen ?';
        $this->lstEsUnAlmacenObject->Width = 60;

		$this->lstZonaCodObject = $this->mctEstacion->lstZonaCodObject_Create();
		$this->lstZonaCodObject->Name = 'Zona COD';

		$this->lstNotificarRecolectaObject = $this->mctEstacion->lstNotificarRecolectaObject_Create();
		$this->lstNotificarRecolectaObject->Name = 'Notificar recolectas por E-mail ?';

		$this->lstAreaMetropolitanaObject = $this->mctEstacion->lstAreaMetropolitanaObject_Create();
		$this->lstAreaMetropolitanaObject->Name = 'Pertenece al Área Metropolitana ?';

		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Estado()->Nombre);
		$this->lstEstado = $this->mctEstacion->lstEstado_Create(null,null,$objClauOrde);
        $this->lstEstado->Name = 'Esta Ubicada en el Estado ?';
        $this->lstEstado->Width = $intAnchCamp-40;

        $this->txtZonasNc->Name = 'Zonas No Cubiertas';
		$this->txtZonasNc->Width = 950;
		$this->txtZonasNc->Rows = 3;

		$this->lstVisibleEnRegistro = $this->mctEstacion->lstVisibleEnRegistro_Create();
		$this->lstVisibleEnRegistro->Name = 'Visible en el CORP ?';
		$this->lstVisibleEnRegistro->Width = 50;

		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Counter()->StatusId,StatusType::ACTIVO);
		$this->lstSeFacturaEnObject = $this->mctEstacion->lstSeFacturaEnObject_Create(null,QQ::AndCondition($objClauWher));
		$this->lstSeFacturaEnObject->Width = $intAnchCamp-40;

		$this->lstExentaDeIva = $this->mctEstacion->lstExentaDeIva_Create();
		$this->lstExentaDeIva->Name = 'Exenta de IVA ?';
		$this->lstExentaDeIva->Width = 50;

		$this->dtgReceSucu_Create();
		$this->intCantRece = Counter::CountBySucursalId($this->mctEstacion->Estacion->CodiEsta);
        //--------------------------
        // Permiso para modificar
        //--------------------------
        $blnTienPerm = BuscarParametro("ModiEsta", $this->objUsuario->LogiUsua, "Val1", 0);
        if ($blnTienPerm) {
            $this->btnSave->Visible = true;
            $this->btnDelete->Visible = true;
        } else {
            $this->btnSave->Visible = false;
            $this->btnDelete->Visible = false;
        }

        $this->btnNuevRece_Create();
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function btnNuevRece_Create() {
	    $this->btnNuevRece = new QButtonS($this);
	    $this->btnNuevRece->Text = TextoIcono('plus','Crear Receptoria');
	    $this->btnNuevRece->AddAction(new QClickEvent(), new QAjaxAction('btnNuevRece_Click'));
    }

    protected function dtgReceSucu_Create() {
        $this->dtgReceSucu = new CounterDataGrid($this);
        $this->dtgReceSucu->FontSize = 13;
        $this->dtgReceSucu->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgReceSucu->CssClass = 'datagrid';
        $this->dtgReceSucu->AlternateRowStyle->CssClass = 'alternate';

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Counter()->SucursalId,$this->mctEstacion->Estacion->CodiEsta);
        $this->dtgReceSucu->AdditionalConditions = QQ::AndCondition($objClauWher);

        $this->dtgReceSucu->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgReceSucu->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgReceSucu->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgReceSucu->AddRowAction(new QClickEvent(), new QAjaxAction('dtgReceSucuRow_Click'));

        $this->dtgReceSucu->MetaAddColumn('Siglas');
        $this->dtgReceSucu->MetaAddColumn('Descripcion');

        /*
        $colNombSuce = $this->dtgReceSucu->MetaAddColumn(QQN::Counter()->Sucursal->DescEsta);
        $colNombSuce->Name = 'Sucursal';
        */

        $colReceStat = $this->dtgReceSucu->MetaAddTypeColumn('StatusId', 'StatusType');
        $colReceStat->Name = 'Estatus';

        $colReceRuta = $this->dtgReceSucu->MetaAddTypeColumn('EsRuta', 'SinoType');
        $colReceRuta->Name = 'DOM?';

    }

    public function dtgReceSucuRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect(__SIST__."/counter_edit.php/$intId");
    }

    protected function determinarPosicion() {
        if ($this->mctEstacion->Estacion && !isset($_SESSION['DataEstacion'])) {
            $_SESSION['DataEstacion'] = serialize(array($this->mctEstacion->Estacion));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataEstacion']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiEsta == $this->mctEstacion->Estacion->CodiEsta) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Estacion',$this->mctEstacion->Estacion->CodiEsta);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnNuevRece_Click() {
	    if (strlen($this->txtCodiEsta->Text) > 0) {
            $_SESSION['CodiSucu'] = $this->txtCodiEsta->Text;
            QApplication::Redirect(__SIST__.'/counter_edit.php');
        }
    }

    protected function btnLogxCamb_Click() {
        $_SESSION['RegiRefe'] = $this->mctEstacion->Estacion->CodiEsta;
        $_SESSION['TablRefe'] = 'Estacion';
        $_SESSION['RegiReto'] = 'estacion_edit.php/'.$this->mctEstacion->Estacion->CodiEsta;
        QApplication::Redirect(__SIST__.'/log_list.php');
    }

    protected function validarCuenta($strFormId, $strControlId, $strParameter) {
        $strMensUsua = "<font color='red'> NO EXISTE CLIENTE CON ESTE CODIGO</font>";
        switch ($strParameter) {
            case 'cnt':
                if (strlen($this->txtCuentaCnt->Text) > 0 ) {
                    $this->txtCuentaCnt->Text = strtoupper($this->txtCuentaCnt->Text);
                    $objCliente = MasterCliente::LoadByCodigoInterno($this->txtCuentaCnt->Text);
                    if ($objCliente) {
                        $this->txtCuentaCnt->HtmlAfter = '';
                        $this->hdSalvar(true);
                        $this->intCuenCont = $objCliente->CodiClie;
                    } else {
                        $this->txtCuentaCnt->HtmlAfter = $strMensUsua;
                        $this->hdSalvar(false);
                    }
                }
                break;
            case 'cod':
                if (strlen($this->txtCuentaCod->Text) > 0 ) {
                    $this->txtCuentaCod->Text = strtoupper($this->txtCuentaCod->Text);
                    $objCliente = MasterCliente::LoadByCodigoInterno($this->txtCuentaCod->Text);
                    if ($objCliente) {
                        $this->txtCuentaCod->HtmlAfter = '';
                        $this->hdSalvar(true);
                        $this->intCuenCods = $objCliente->CodiClie;
                    } else {
                        $this->txtCuentaCod->HtmlAfter = $strMensUsua;
                        $this->hdSalvar(false);
                    }
                }
                break;
            case 'com':
                if (strlen($this->txtCuentaCom->Text) > 0 ) {
                    $this->txtCuentaCom->Text = strtoupper($this->txtCuentaCom->Text);
                    $objCliente = MasterCliente::LoadByCodigoInterno($this->txtCuentaCom->Text);
                    if ($objCliente) {
                        $this->txtCuentaCom->HtmlAfter = '';
                        $this->hdSalvar(true);
                        $this->intCuenComa = $objCliente->CodiClie;
                    } else {
                        $this->txtCuentaCom->HtmlAfter = $strMensUsua;
                        $this->hdSalvar(false);
                    }
                }
                break;
            default:
                break;
        }
    }

    protected function hdSalvar($blnTrueFals) {
        if ($blnTrueFals) {
            $this->btnSave->Visible = true;
        } else {
            $this->btnSave->Visible = false;
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/estacion_edit.php/'.$objRegiTabl->CodiEsta);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/estacion_edit.php/'.$objRegiTabl->CodiEsta);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/estacion_edit.php/'.$objRegiTabl->CodiEsta);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/estacion_edit.php/'.$objRegiTabl->CodiEsta);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctEstacion->Estacion;
		$this->mctEstacion->SaveEstacion();
		if ($this->mctEstacion->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctEstacion->Estacion;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Sucursal';
				$arrLogxCamb['intRefeRegi'] = $this->mctEstacion->Estacion->CodiEsta;
				$arrLogxCamb['strNombRegi'] = $this->mctEstacion->Estacion->DescEsta;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa !','','',__iCHEC__);
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Sucursal';
			$arrLogxCamb['intRefeRegi'] = $this->mctEstacion->Estacion->CodiEsta;
			$arrLogxCamb['strNombRegi'] = $this->mctEstacion->Estacion->DescEsta;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/estacion_edit.php/'.$this->mctEstacion->Estacion->CodiEsta;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa !','','',__iCHEC__);
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctEstacion->TablasRelacionadasEstacion();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctEstacion->DeleteEstacion();
            $arrLogxCamb['strNombTabl'] = 'Estacion';
            $arrLogxCamb['intRefeRegi'] = $this->mctEstacion->Estacion->CodiEsta;
            $arrLogxCamb['strNombRegi'] = $this->mctEstacion->Estacion->DescEsta;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// estacion_edit.tpl.php as the included HTML template file
EstacionEditForm::Run('EstacionEditForm');
?>