<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FacTarifaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the FacTarifa class.  It uses the code-generated
 * FacTarifaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a FacTarifa columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both fac_tarifa_edit.php AND
 * fac_tarifa_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FacTarifaEditForm extends FacTarifaEditFormBase {
    protected $dtgTariPeso;
    protected $dtgTariNaci;
    protected $btnMasxAcci;
    protected $btnMasxSmal;

    protected $arrTariUrba;
    protected $arrTariNaci;
    protected $txtCantClie;

    protected $btnNuevUrba;
    protected $btnNuevNaci;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

    // protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

        // Use the CreateFromPathInfo shortcut (this can also be done manually using the FacTarifaMetaControl constructor)
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctFacTarifa = FacTarifaMetaControl::CreateFromPathInfo($this);

        $this->lblTituForm->Text = 'Tarifa';

        $this->btnMasxAcci_Create();
        $this->btnMasxSmal_Create();
        $this->txtCantClie_Create();

        $this->btnNuevUrba_Create();
        $this->btnNuevNaci_Create();

		// Call MetaControl's methods to create qcontrols based on FacTarifa's data fields
		$this->lblId = $this->mctFacTarifa->lblId_Create();
        $this->txtDescripcion = $this->mctFacTarifa->txtDescripcion_Create();
        $this->txtDescripcion->Width = 200;

        $this->txtPesoInicial = $this->mctFacTarifa->txtPesoInicial_Create();
        $this->txtPesoInicial->Name = 'Peso Limite';
        $this->txtPesoInicial->HtmlAfter = ' Kgs';
        $this->txtPesoInicial->Width = 60;
        $this->txtPesoInicial->Enabled = false;
        $this->txtPesoInicial->ForeColor = 'blue';

        $this->txtValorIncremento = $this->mctFacTarifa->txtValorIncremento_Create();
        $this->txtValorIncremento->Name = 'Valor Kg adicional';
        $this->txtValorIncremento->HtmlAfter = ' Bs';
        $this->txtValorIncremento->Width = 60;

        $this->txtMedidaIncremento = $this->mctFacTarifa->txtMedidaIncremento_Create();
        $this->txtMedidaIncremento->Name = 'Medida de Incremento';
        $this->txtMedidaIncremento->Enabled = false;
        $this->txtMedidaIncremento->ForeColor = 'blue';

        //$this->txtPorcentajeSobreValor = $this->mctFacTarifa->txtPorcentajeSobreValor_Create();
        //$this->txtPorcentajeSobreValor->Name = '% Sobre el Valor';
        //$this->txtPorcentajeSobreValor->HtmlAfter = ' %';
        //$this->txtPorcentajeSobreValor->Width = 60;
        
        $this->txtVolumenParaDscto = $this->mctFacTarifa->txtVolumenParaDscto_Create();
        $this->txtDsctoPorVolumen = $this->mctFacTarifa->txtDsctoPorVolumen_Create();
        $this->txtPesoParaDscto = $this->mctFacTarifa->txtPesoParaDscto_Create();
        $this->txtDsctoPorPeso = $this->mctFacTarifa->txtDsctoPorPeso_Create();

        //$this->txtMontoMinimo = $this->mctFacTarifa->txtMontoMinimo_Create();
        //$this->txtMontoMinimo->HtmlAfter = ' Bs';
        //$this->txtMontoMinimo->Width = 60;

        //$this->txtCostoParadaAdicional = $this->mctFacTarifa->txtCostoParadaAdicional_Create();
        //$this->txtCostoParadaAdicional->HtmlAfter = ' Bs';
        //$this->txtCostoParadaAdicional->Width = 60;

        //$this->txtCostoAyudante = $this->mctFacTarifa->txtCostoAyudante_Create();
        //$this->txtCostoAyudante->HtmlAfter = ' Bs';
        //$this->txtCostoAyudante->Width = 60;
        
        //$this->txtIncrementoUrbano = $this->mctFacTarifa->txtIncrementoUrbano_Create();
        //$this->txtIncrementoUrbano->Name = 'Valor Kg adicional URB.';
        //$this->txtIncrementoUrbano->HtmlAfter = ' Bs';
        //$this->txtIncrementoUrbano->Width = 60;

        //$this->txtPesoInicialUrbano = $this->mctFacTarifa->txtPesoInicialUrbano_Create();
        //$this->txtPesoInicialUrbano->Name = 'Peso Limite URB.';
        //$this->txtPesoInicialUrbano->HtmlAfter = ' Kgs';
        //$this->txtPesoInicialUrbano->Width = 60;
        //$this->txtPesoInicialUrbano->Enabled = false;
        //$this->txtPesoInicialUrbano->ForeColor = 'blue';

        //$this->txtTasaIva = $this->mctFacTarifa->txtTasaIva_Create();
        //$this->txtTasaIva->Width = 60;
        //$this->txtTasaIva->ToolTip = '% de IVA asociado a la Tarifa';

        if (!$this->mctFacTarifa->EditMode) {
            $this->txtPesoInicial->Text = 0;
            //$this->txtPesoInicialUrbano->Text = 0;
            $this->txtVolumenParaDscto->Text = 0;
            $this->txtDsctoPorVolumen->Text = 0;
            $this->txtPesoParaDscto->Text = 0;
            $this->txtDsctoPorPeso->Text = 0;
            //$this->txtTasaIva->Text = FacImpuesto::LoadImpuestoVigente('IVA',FechaDeHoy());
        }

        //----------------------------------
        // Meta Datagrid de Tarifa Nacional
        //----------------------------------
        $this->dtgTariNaci = new TarifaPesoDataGrid($this);
        $this->dtgTariNaci->FontSize = 12;
        $this->dtgTariNaci->ShowFilter = false;

        $this->dtgTariNaci->CssClass = 'datagrid';
        $this->dtgTariNaci->AlternateRowStyle->CssClass = 'alternate';

        // Higlight the datagrid rows when mousing over them
        $this->dtgTariNaci->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgTariNaci->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Click event on datagrid's row to execute an action
        $this->dtgTariNaci->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgTariNaci->AddRowAction(new QClickEvent(), new QAjaxAction('dtgTariNaciRow_Click'));

        $colPesoInci = new QDataGridColumn('P.Inic.','<?= $_FORM->dtgTN_PesoInic_Render($_ITEM); ?>');
        $colPesoInci->Width = 75;
        $this->dtgTariNaci->AddColumn($colPesoInci);

        $colPesoFina = $this->dtgTariNaci->MetaAddColumn('PesoFinal');
        $colPesoFina->Name = 'P.Final';
        $colPesoFina->Width = 75;

        $colMontTari = new QDataGridColumn('Mto Tarifa','<?= $_FORM->dtgTN_MontTari_Render($_ITEM); ?>');
        $colMontTari->Width = 80;
        $this->dtgTariNaci->AddColumn($colMontTari);

        $this->dtgTariNaci->SetDataBinder('dtgTariNaci_Bind');


        //$this->lstTipoTari_Change();
        $this->activarTarifaPeso();

        $_SESSION['IdxxTari'] = $this->lblId->Text;
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

    protected function btnDelete_Create() {
        $this->btnDelete = new QButton($this);
        $this->btnDelete->Text = '<i class="fa fa-trash-o fa-lg"></i> Borrar';
        $this->btnDelete->CssClass = 'btn btn-danger btn-sm';
        $this->btnDelete->HtmlEntities = false;
        $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Tarifa'))));
        $this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnDelete->Visible = $this->mctFacTarifa->EditMode;
    }

    protected function btnNuevUrba_Create() {
	    $this->btnNuevUrba = new QButton($this);
        $this->btnNuevUrba->CssClass = 'btn btn-xs btn-primary';
        $this->btnNuevUrba->Text = TextoIcono(__iPLUS__,'');
        $this->btnNuevUrba->ToolTip = 'Agregar nuevo registro de Tarifa Urbana';
        $this->btnNuevUrba->ActionParameter = TipoTarifaType::URB;
        $this->btnNuevUrba->AddAction(new QClickEvent(), new QServerAction('nuevaTarifaPeso'));
    }

    protected function btnNuevNaci_Create() {
        $this->btnNuevNaci = new QButton($this);
        $this->btnNuevNaci->CssClass = 'btn btn-xs btn-primary';
        $this->btnNuevNaci->Text = TextoIcono(__iPLUS__,'');
        $this->btnNuevNaci->ToolTip = 'Agregar nuevo registro de Tarifa Nacional';
        $this->btnNuevNaci->ActionParameter = TipoTarifaType::NAC;
        $this->btnNuevNaci->AddAction(new QClickEvent(), new QServerAction('nuevaTarifaPeso'));
    }

    protected function txtCantClie_Create() {
	    $this->txtCantClie = new QTextBox($this);
	    $this->txtCantClie->Name = 'Cantidad de Clientes';
        $this->txtCantClie->Text = $this->mctFacTarifa->FacTarifa->__cantClientes();
        $this->txtCantClie->HtmlAfter = ' (Con esta Tarifa)';
        $this->txtCantClie->Enabled = false;
	    $this->txtCantClie->ForeColor = 'blue';
	    $this->txtCantClie->Width = 60;
    }

    public function dtgTN_PesoInic_Render(TarifaPeso $objTariPeso) {
        if ($objTariPeso->PesoInicial) {
            return nf3($objTariPeso->PesoInicial);
        } else {
            return null;
        }
    }

    public function dtgTU_PesoInic_Render(TarifaPeso $objTariPeso) {
        if ($objTariPeso->PesoInicial) {
            return nf3($objTariPeso->PesoInicial);
        } else {
            return null;
        }
    }

    public function dtgTN_MontTari_Render(TarifaPeso $objTariPeso) {
        if ($objTariPeso->MontoTarifa) {
            return nf($objTariPeso->MontoTarifa);
        } else {
            return null;
        }
    }

    protected function determinarPosicion() {
        if ($this->mctFacTarifa->FacTarifa && !isset($_SESSION['DataFacTarifa'])) {
            $_SESSION['DataFacTarifa'] = serialize(array($this->mctFacTarifa->FacTarifa));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataFacTarifa']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctFacTarifa->FacTarifa->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('FacTarifa',$this->mctFacTarifa->FacTarifa->Id);
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->Text = $this->contenidoMasAcciones();
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';
    }

    protected function btnMasxSmal_Create() {
        $this->btnMasxSmal = new QLabel($this);
        $this->btnMasxSmal->Text = $this->contenidoMasAccionesSmal();
        $this->btnMasxSmal->HtmlEntities = false;
        $this->btnMasxSmal->CssClass = '';
    }

    protected function contenidoMasAcciones() {
        //--------------------------
        // Enlaces de las Acciones
        //--------------------------
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->TarifaId,$this->mctFacTarifa->FacTarifa->Id);
        $_SESSION['CritConsClie'] = serialize($objClauWher);
        $strLinkHist = __SIST__.'/log_edit.php';
        $strLinkClie = __SIST__.'/master_cliente_list.php';
        $strLinkCopy = __SIST__.'/copiar_tarifa.php/'.$this->mctFacTarifa->FacTarifa->Id;
        //---------------------------------------------
        // Boton Dropdown con sus respectivos enlaces
        //---------------------------------------------
        $strTextBoto = '
            <div class="btn-group dropdown">
                <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-plus-circle fa-lg"></i> Acciones
                    <span class="fa fa-caret-down fa-lg"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="'.$strLinkHist.'">&nbsp;<i class="fa fa-file-text-o fa-lg"></i> Histórico</a></li>
                    <li><a href="'.$strLinkClie.'">&nbsp;<i class="fa fa-vcard-o fa-lg"></i> Clientes con esta Tarifa</a></li>
                    <li><a href="'.$strLinkCopy.'">&nbsp;<i class="fa fa-clone fa-lg"></i> Crear una Tarifa a partir de esta</a></li>
                </ul>
            </div>
        ';
        return $strTextBoto;
    }

    protected function contenidoMasAccionesSmal() {
        //--------------------------
        // Enlaces de las Acciones
        //--------------------------
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->TarifaId,$this->mctFacTarifa->FacTarifa->Id);
        $_SESSION['CritConsClie'] = serialize($objClauWher);
        $strLinkHist = __SIST__.'/log_edit.php';
        $strLinkClie = __SIST__.'/master_cliente_list.php';
        //---------------------------------------------
        // Boton Dropdown con sus respectivos enlaces
        //---------------------------------------------
        $strTextBoto = '
            <div class="btn-group dropdown">
                <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-plus-circle fa-lg"></i>
                    <span class="fa fa-caret-down fa-lg"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="'.$strLinkHist.'">&nbsp;<i class="fa fa-file-text-o fa-lg"></i> Histórico</a></li>
                    <li><a href="'.$strLinkClie.'">&nbsp;<i class="fa fa-vcard-o fa-lg"></i> Clientes con esta Tarifa</a></li>
                </ul>
            </div>
        ';
        return $strTextBoto;
    }

    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function nuevaTarifaPeso($strFormId, $strControlId, $strParameter) {
        $_SESSION['TariAnte'] = $this->mctFacTarifa->FacTarifa->Id;
        $_SESSION['TipoAnte'] = $strParameter;
	    QApplication::Redirect(__SIST__.'/tarifa_peso_edit.php');
    }

    //protected function lstTipoTari_Change() {
    //    switch ($this->lstTipoTarifaObject->SelectedValue) {
    //        case FacTipoTarifaType::PORPESO:
    //            $this->activarTarifaPeso();
    //            break;
    //        default:
    //            $this->activarTarifaPeso();
    //            break;
    //    }
    //}

    protected function activarTarifaPeso() {
        //---------------------------------------------------------
        // Se ocultan los campos de la Tarifa por Valor Declarado
        //---------------------------------------------------------
        //$this->txtPorcentajeSobreValor->Text = 0;
        //$this->txtPorcentajeSobreValor->Visible = false;
        //$this->txtMontoMinimo->Text = 0;
        //$this->txtMontoMinimo->Visible = false;
        //-------------------------------------------------------
        // Se ocultan los campos de la Tarifa de Flete Directo
        //-------------------------------------------------------
        //$this->txtCostoAyudante->Visible = false;
        //$this->txtCostoAyudante->Text = 0;
        //$this->txtCostoParadaAdicional->Visible = false;
        //$this->txtCostoParadaAdicional->Text = 0;
        //---------------------------------------------------
        // Se muestran los campos de la Tarifa por Peso
        //---------------------------------------------------
        $this->txtValorIncremento->Visible = true;
        //$this->lstMedidaIncrementoObject->Visible = true;
    }

    //protected function activarTarifaValor() {
    //    //---------------------------------------------------
    //    // Se muestran los campos de la Tarifa por Valor
    //    //---------------------------------------------------
    //    $this->txtPorcentajeSobreValor->Visible = true;
    //    $this->txtMontoMinimo->Visible = true;
    //    $this->txtPesoInicial->Name = QApplication::Translate('Aplica a partir de');
    //    $this->txtPesoInicial->HtmlAfter = ' Bs';
    //    //-------------------------------------------------------
    //    // Se ocultan los campos de la Tarifa de Flete Directo
    //    //-------------------------------------------------------
    //    $this->txtCostoAyudante->Visible = false;
    //    $this->txtCostoAyudante->Text = 0;
    //    $this->txtCostoParadaAdicional->Visible = false;
    //    $this->txtCostoParadaAdicional->Text = 0;
    //    //---------------------------------------------------------
    //    // Se ocultan los campos de la Tarifa por Peso
    //    //---------------------------------------------------------
    //    $this->txtValorIncremento->Visible = false;
    //    $this->txtValorIncremento->Text = 0;
    //    //$this->lstMedidaIncrementoObject->Visible = false;
    //    //$this->lstMedidaIncrementoObject->SelectedIndex = 0;
    //}

    //protected function activarTarifaFleteDirecto() {
    //    //---------------------------------------------------
    //    // Se ocultan los campos de la Tarifa por Valor
    //    //---------------------------------------------------
    //    $this->txtPorcentajeSobreValor->Visible = false;
    //    $this->txtPorcentajeSobreValor->Text = 0;
    //    $this->txtMontoMinimo->Visible = false;
    //    $this->txtMontoMinimo->Text = 0;
    //    //-------------------------------------------------------
    //    // Se muestran los campos de la Tarifa de Flete Directo
    //    //-------------------------------------------------------
    //    $this->txtCostoAyudante->Visible = true;
    //    $this->txtCostoParadaAdicional->Visible = true;
    //    $this->txtPesoInicial->Name = QApplication::Translate('Peso Inicial');
    //    $this->txtPesoInicial->HtmlAfter = ' Kgs';
    //    //---------------------------------------------------------
    //    // Se ocultan los campos de la Tarifa por Peso
    //    //---------------------------------------------------------
    //    $this->txtValorIncremento->Visible = false;
    //    $this->txtValorIncremento->Text = 0;
    //    //$this->lstMedidaIncrementoObject->Visible = false;
    //    //$this->lstMedidaIncrementoObject->SelectedIndex = 0;
    //}

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/fac_tarifa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/fac_tarifa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/fac_tarifa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/fac_tarifa_edit.php/'.$objRegiTabl->Id);
    }

    //protected function dtgTariPeso_Bind() {
    //    $objClauWher = QQ::Clause();
    //    $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->Tarifa->Id, $this->lblId->Text);
    //    //$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TipoId, TipoTarifaType::URB);
    //
    //    $this->arrTariUrba = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher));
    //    $this->dtgTariPeso->DataSource = $this->arrTariUrba;
    //}

    protected function dtgTariNaci_Bind() {
        $objClauWher = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->Tarifa->Id, $this->lblId->Text);
        //$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TipoId, TipoTarifaType::NAC);

        $this->arrTariNaci = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher));
        $this->dtgTariNaci->DataSource = $this->arrTariNaci;
    }

    public function dtgTariNaciRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        $_SESSION['DataTarifaPeso'] = serialize($this->arrTariNaci);
        QApplication::Redirect(__SIST__."/tarifa_peso_edit.php/$intId");
    }

    //public function dtgTariUrbaRow_Click($strFormId, $strControlId, $strParameter) {
    //    $intId = intval($strParameter);
    //    $_SESSION['DataTarifaPeso'] = serialize($this->arrTariUrba);
    //    QApplication::Redirect(__SIST__."/tarifa_peso_edit.php/$intId");
    //}

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctFacTarifa->FacTarifa;
		$this->mctFacTarifa->SaveFacTarifa();
		if ($this->mctFacTarifa->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctFacTarifa->FacTarifa;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'FacTarifa';
				$arrLogxCamb['intRefeRegi'] = $this->mctFacTarifa->FacTarifa->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctFacTarifa->FacTarifa->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/fac_tarifa_edit.php/'.$this->mctFacTarifa->FacTarifa->Id;
				LogDeCambios($arrLogxCamb);
				QApplication::Redirect($arrLogxCamb['strEnlaEnti']);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'FacTarifa';
			$arrLogxCamb['intRefeRegi'] = $this->mctFacTarifa->FacTarifa->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctFacTarifa->FacTarifa->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/fac_tarifa_edit.php/'.$this->mctFacTarifa->FacTarifa->Id;
			LogDeCambios($arrLogxCamb);
            QApplication::Redirect($arrLogxCamb['strEnlaEnti']);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctFacTarifa->TablasRelacionadasFacTarifa();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            if (trim($strTablRela) == 'tarifa_peso') {
                $this->mctFacTarifa->FacTarifa->DeleteAllTarifaPesosAsTarifa();
                // $this->mctFacTarifa->FacTarifa->DeleteAllFacTarifaPesosAsTarifa();
            } else {
                $this->mensaje("Existen registros relacionados en $strTablRela",'','d','hand-stop-o');
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctFacTarifa->DeleteFacTarifa();
            $arrLogxCamb['strNombTabl'] = 'FacTarifa';
            $arrLogxCamb['intRefeRegi'] = $this->mctFacTarifa->FacTarifa->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctFacTarifa->FacTarifa->Descripcion;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }

    protected function RedirectToListPage() {
        // $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/fac_tarifa_list.php");
    }

}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// fac_tarifa_edit.tpl.php as the included HTML template file
FacTarifaEditForm::Run('FacTarifaEditForm');
?>