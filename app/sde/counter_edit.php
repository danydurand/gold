<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
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
    protected $intCantCaja;
    protected $btnNuevCaja;
    protected $dtgCajaRece;
    protected $lstStatCoun;

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

        $this->lblTituForm->Text = 'Receptoria';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the CounterMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctCounter = CounterMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Counter's data fields
		$this->lblId = $this->mctCounter->lblId_Create();
		$this->txtDescripcion = $this->mctCounter->txtDescripcion_Create();
        $this->lstSucursal = $this->mctCounter->lstSucursal_Create();
        //if (isset($_SESSION['CodiSucu'])) {
        //    $this->lstSucursal->RemoveAllItems();
        //    $objSucuSele = Estacion::Load($_SESSION['CodiSucu']);
        //    if ($objSucuSele) {
        //        $this->lstSucursal->AddItem($objSucuSele->__toString(),$objSucuSele->CodiEsta,true);
        //    }
        //    $this->lstSucursal->Enabled = false;
        //    $this->lstSucursal->ForeColor = 'blue';
        //    unset($_SESSION['CodiSucu']);
        //}
		$this->lstRuta = $this->mctCounter->lstRuta_Create();
		$this->lstRuta->Width = 350;
		$this->lstEntregaInmediataObject = $this->mctCounter->lstEntregaInmediataObject_Create();
		$this->txtSiglas = $this->mctCounter->txtSiglas_Create();
		$this->txtLimiteDePaquetes = $this->mctCounter->txtLimiteDePaquetes_Create();
		$this->txtCantidadDePaquetes = $this->mctCounter->txtCantidadDePaquetes_Create();
		$this->txtCkptRecepcion = $this->mctCounter->txtCkptRecepcion_Create();
		$this->txtCkptConfirmacion = $this->mctCounter->txtCkptConfirmacion_Create();
		$this->txtCkptAlmacen = $this->mctCounter->txtCkptAlmacen_Create();
		$this->txtPaisId = $this->mctCounter->txtPaisId_Create();
		$this->txtStatusId = $this->mctCounter->txtStatusId_Create();
		$this->txtStatusId->Name = 'Estatus';
		$this->txtStatusId->Width = 30;
		$this->lstStatCoun_Create();
		$this->txtDireccion = $this->mctCounter->txtDireccion_Create();
		$this->lstElegirServicioObject = $this->mctCounter->lstElegirServicioObject_Create();
		$this->lstEsRutaObject = $this->mctCounter->lstEsRutaObject_Create();
		$this->lstEsRutaObject->Name = 'Es Ruta ?';
		$this->lstSeFacturaObject = $this->mctCounter->lstSeFacturaObject_Create();
		$this->lstSeFacturaObject->Name = 'Se Factua ?';
		$this->lstPermitePagoObject = $this->mctCounter->lstPermitePagoObject_Create();
		$this->txtEmailJefeAlmacen = $this->mctCounter->txtEmailJefeAlmacen_Create();
		$this->txtEmailJefeAlmacen->Width = 300;
		$this->txtCkptAntiguedad1 = $this->mctCounter->txtCkptAntiguedad1_Create();
		$this->txtCkptAntiguedad2 = $this->mctCounter->txtCkptAntiguedad2_Create();
		$this->txtCkptAntiguedad0 = $this->mctCounter->txtCkptAntiguedad0_Create();
		$this->lstAliadoComercial = $this->mctCounter->lstAliadoComercial_Create();
		$this->txtLimiteKilos = $this->mctCounter->txtLimiteKilos_Create();
		$this->txtDependeDe = $this->mctCounter->txtDependeDe_Create();
		$this->chkDomOrigen = $this->mctCounter->chkDomOrigen_Create();
		$this->chkDomOrigen->Name = 'Serv. Domic. Origen ?';
		$this->chkDomDestino = $this->mctCounter->chkDomDestino_Create();
		$this->chkDomDestino->Name = 'Serv. Domic. Destino ?';

        $this->intCantCaja = Caja::CountByCounterId($this->mctCounter->Counter->Id);
        $this->btnNuevCaja_Create();
        $this->dtgCajaRece_Create();

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lstStatCoun_Create(){
        $this->lstStatCoun = new QListBox($this);
        $this->lstStatCoun->Name = 'Estatus';
        $this->lstStatCoun->AddItem('- Seleccione Uno -', null);
        foreach (StatusType::$NameArray as $intId => $strValue)
            $this->lstStatCoun->AddItem(new QListItem($strValue, $intId, $this->mctCounter->Counter->StatusId == $intId));
    }

    protected function dtgCajaRece_Create() {
        // Instantiate the Meta DataGrid
        $this->dtgCajaRece = new CajaDataGrid($this);
        $this->dtgCajaRece->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgCajaRece->CssClass = 'datagrid';
        $this->dtgCajaRece->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgCajaRece->FontSize = 13;

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Caja()->CounterId,$this->mctCounter->Counter->Id);
        $this->dtgCajaRece->AdditionalConditions = QQ::AndCondition($objClauWher);

        // Add Pagination (if desired)
//        $this->dtgCajaRece->Paginator = new QPaginator($this->dtgCajaRece);
//        $this->dtgCajaRece->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgCajaRece->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgCajaRece->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgCajaRece->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgCajaRece->AddRowAction(new QClickEvent(), new QAjaxAction('dtgCajaReceRow_Click'));

        //-------------------------------------------------
        // Defino las columnas que aparecerán en mi lista
        //-------------------------------------------------
        $colCajaIdxx = $this->dtgCajaRece->MetaAddColumn('Id');
        $colCajaIdxx->FilterType = null;

        $this->dtgCajaRece->MetaAddColumn('Descripcion');

        /*
        $colReceCaja = $this->dtgCajaRece->MetaAddColumn(QQN::Caja()->Counter->Descripcion);
        $colReceCaja->Name = 'Receptoria';
        $colReceCaja->Filter = QQ::Like(QQN::Caja()->Counter->Descripcion,null);
        $colReceCaja->FilterType = QFilterType::TextFilter;
        */

        //$this->dtgCajaRece->MetaAddColumn('ControlSeniat');
        //$this->dtgCajaRece->MetaAddTypeColumn('TipoId', 'TipoCajaType');
        $this->dtgCajaRece->MetaAddColumn('ImpresoraId');

        $colCajaSeri = $this->dtgCajaRece->MetaAddColumn('Serie');
        $colCajaSeri->FilterType = null;
        //$this->dtgCajaRece->MetaAddColumn('ConseFactura');

    }

    public function dtgCajaReceRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect(__SIST__."/caja_edit.php/$intId");
    }

    protected function btnNuevCaja_Create() {
	    $this->btnNuevCaja = new QButtonS($this);
	    $this->btnNuevCaja->Text = TextoIcono('plus','Crear Nueva Caja');
	    $this->btnNuevCaja->AddAction(new QClickEvent(), new QAjaxAction('btnNuevCaja_Click'));
    }

    protected function determinarPosicion() {
        if ($this->mctCounter->Counter && !isset($_SESSION['DataCounter'])) {
            $_SESSION['DataCounter'] = serialize(array($this->mctCounter->Counter));
        }
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
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Counter',$this->mctCounter->Counter->Id);
    }

    protected function btnVolvList_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }


    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnNuevCaja_Click() {
        if (strlen($this->lblId->Text) > 0) {
            $_SESSION['CodiRece'] = $this->lblId->Text;
            QApplication::Redirect(__SIST__.'/caja_edit.php');
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/counter_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/counter_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/counter_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/counter_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctCounter->Counter;
		$this->txtStatusId->Text = $this->lstStatCoun->SelectedValue;
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
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/counter_edit.php/'.$this->mctCounter->Counter->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Counter';
			$arrLogxCamb['intRefeRegi'] = $this->mctCounter->Counter->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctCounter->Counter->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/counter_edit.php/'.$this->mctCounter->Counter->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctCounter->TablasRelacionadasCounter();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctCounter->DeleteCounter();
            $arrLogxCamb['strNombTabl'] = 'Counter';
            $arrLogxCamb['intRefeRegi'] = $this->mctCounter->Counter->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctCounter->Counter->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// counter_edit.tpl.php as the included HTML template file
CounterEditForm::Run('CounterEditForm');
?>