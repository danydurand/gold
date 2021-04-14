<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Guia class.  It uses the code-generated
 * GuiaDataGrid control which has meta-methods to help with
 * easily creating/defining Guia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_list.php AND
 * guia_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiaListForm extends GuiaListFormBase {
	/* @var $objUsuario Usuario */
	protected $objUsuario;
	protected $objClauWher;
	protected $blnHayxCond;
	protected $arrGuiaLote;

	//-------------------------------------------------------------
	// Parámetros de Información (Criterios de Búsqueda de Guías)
	//-------------------------------------------------------------

	// Lado Izquierdo //
	protected $txtNumeGuia;
	protected $txtBuscCodi;
	protected $txtBuscNomb;
	protected $lstClieGuia;
	protected $calFechInic;
	protected $calFechFina;
	protected $txtNumePrec;
	// Lado Derecho //
	protected $lstTipoPago;
	protected $lstCodiOrig;
	protected $lstCodiDest;
	protected $lstTienPodx;
	protected $lstCodiCkpt;
	protected $chkGuiaAnul;

	// Botónes del Filtro de Búsqueda //
	protected $btnBuscRegi;

	// Botónes del Formulario //
	protected $btnImprLote;
	protected $btnCancel;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

	//	protected function Form_Load() {}
	protected function Form_Create() {
	    // echo 0;
		parent::Form_Create();

		// echo 1;
        $this->objUsuario = unserialize($_SESSION['User']);

		//---- Lado Izquierdo ----
		$this->txtNumeGuia_Create();
		$this->txtBuscCodi_Create();
		$this->txtBuscNomb_Create();
		$this->lstClieGuia_Create();
		$this->calFechInic_Create();
		$this->calFechFina_Create();
		$this->txtNumePrec_Create();

		// echo 2;
		//---- Lado Derecho ----
		$this->lstTipoPago_Create();
		$this->lstCodiOrig_Create();
		$this->lstCodiDest_Create();
		$this->lstTienPodx_Create();
		$this->lstCodiCkpt_Create();
		$this->chkGuiaAnul_Create();

		//---------------------
		// Botónes del Filtro
		//---------------------
		$this->btnBuscRegi_Create();

		//------------------
		// Botónes Propios
		//------------------
		$this->btnCancel_Create();
		$this->btnImprLote_Create();

		// Instantiate the Meta DataGrid
		$this->dtgGuias = new GuiaDataGrid($this);
		$this->dtgGuias->FontSize = 13;
		$this->dtgGuias->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgGuias->CssClass = 'datagrid';
		$this->dtgGuias->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgGuias->Paginator = new QPaginator($this->dtgGuias);
		$this->dtgGuias->ItemsPerPage = 20;

		// Higlight the datagrid rows when mousing over them
		$this->dtgGuias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGuias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgGuias->RowActionParameterHtml = '<?= $_ITEM->NumeGuia ?>';
		$this->dtgGuias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guia's properties, or you
		// can traverse down QQN::guia() to display fields that are down the hierarchy)
		$colNumeGuia = $this->dtgGuias->MetaAddColumn('NumeGuia');
		$colNumeGuia->Name = 'GUIA #';

		$colGuiaExte = $this->dtgGuias->MetaAddColumn('GuiaExterna');
		$colGuiaExte->Name = 'TRACKING';

		$colGuiaReto = $this->dtgGuias->MetaAddColumn('GuiaRetorno');
		$colGuiaReto->Name = 'RETORNO';

		$colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->FechGuia->__toString("DD/MM/YYYY") ?>');
		$colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia, false);
		$colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia);
		$this->dtgGuias->AddColumn($colFechGuia);

		$colOriDest = new QDataGridColumn('ORI - DEST','<?= $_FORM->dtgGuia_OrigDest_Render($_ITEM); ?>');
		$colOriDest->Width = 75;
		$this->dtgGuias->AddColumn($colOriDest);

		$this->dtgGuias->MetaAddColumn('NombRemi');
		$this->dtgGuias->MetaAddColumn('NombDest');

		$colCodiCkpt = $this->dtgGuias->MetaAddColumn('CodiCkpt');
		$colCodiCkpt->Name = 'CKPT';

		$colFechCkpt = new QDataGridColumn('F.CKPT','<?= $_FORM->dtgGuia_FechCkpt_Render($_ITEM); ?>');
		$colFechCkpt->OrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt, false);
		$colFechCkpt->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt);
		$this->dtgGuias->AddColumn($colFechCkpt);

		$colUsuaCkpt = new QDataGridColumn('Usuario','<?= $_FORM->dtgGuia_UsuaCkpt_Render($_ITEM); ?>');
		$colUsuaCkpt->OrderByClause = QQ::OrderBy(QQN::Guia()->UsuaCkpt,false);
		$colUsuaCkpt->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->UsuaCkpt);
		$this->dtgGuias->AddColumn($colUsuaCkpt);

		$this->dtgGuias->SetDataBinder('dtgGuias_Bind');

        $this->btnExpoExce_Create();
        $this->btnExpoExce->Visible = true;
    }

    //----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	// --- Lado Izquierdo del Formulario --- //
	protected function txtNumeGuia_Create() {
		$this->txtNumeGuia = new QTextBox($this);
		$this->txtNumeGuia->Name = 'Nro. Guía';
		$this->txtNumeGuia->Width = 100;
		$this->txtNumeGuia->Visible = false;
	}

	protected function txtBuscCodi_Create() {
		$this->txtBuscCodi = new QTextBox($this);
		$this->txtBuscCodi->Name = 'Buscar Cliente por Código';
		$this->txtBuscCodi->Width = 100;
		$this->txtBuscCodi->Visible = false;
		$this->txtBuscCodi->ActionParameter = 'Code';
		$this->txtBuscCodi->Placeholder = 'Código del Cliente';
		$this->txtBuscCodi->AddAction(new QBlurEvent(), new QAjaxAction('BuscarCliente'));
	}

	protected function txtBuscNomb_Create() {
		$this->txtBuscNomb = new QTextBox($this);
		$this->txtBuscNomb->Name = 'Buscar Cliente por Nombre';
		$this->txtBuscNomb->Width = 200;
		$this->txtBuscNomb->Visible = false;
		$this->txtBuscNomb->ActionParameter = 'Name';
		$this->txtBuscNomb->Placeholder = 'Nombre del Cliente';
		$this->txtBuscNomb->AddAction(new QBlurEvent(), new QAjaxAction('BuscarCliente'));
	}

	protected function lstClieGuia_Create() {
		$this->lstClieGuia = new QListBox($this);
		$this->lstClieGuia->Name = QApplication::Translate('Cliente(s) Encontrado(s)');
		$this->lstClieGuia->RemoveAllItems();
		$this->lstClieGuia->AddItem('- Seleccione Uno -',null);
		$this->lstClieGuia->Width = 200;
		$this->lstClieGuia->Visible = false;
	}

	protected function calFechInic_Create() {
		$this->calFechInic = new QCalendar($this);
		$this->calFechInic->Name = QApplication::Translate('Fecha Inicial');
		$this->calFechInic->Width = 100;
		$this->calFechInic->Visible = false;
	}

	protected function calFechFina_Create() {
		$this->calFechFina = new QCalendar($this);
		$this->calFechFina->Name = QApplication::Translate('Fecha Final');
		$this->calFechFina->Width = 100;
		$this->calFechFina->Visible = false;
	}

	protected function txtNumePrec_Create() {
		$this->txtNumePrec = new QTextBox($this);
		$this->txtNumePrec->Name = QApplication::Translate('Numero Precinto');
		$this->txtNumePrec->Visible = false;
	}

	// ---- Lado Derecho del Formulario ---- //
	protected function lstTipoPago_Create() {
		$this->lstTipoPago = new QListBox($this);
		$this->lstTipoPago->Name = QApplication::Translate('Tipo de Pago');
		$this->lstTipoPago->Width = 200;
		$this->lstTipoPago->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$this->lstTipoPago->AddItem(QApplication::Translate('PPD'), 1);
		$this->lstTipoPago->AddItem(QApplication::Translate('COD'), 3);
		$this->lstTipoPago->Visible = false;
	}

	protected function lstCodiOrig_Create() {
		$this->lstCodiOrig = new QListBox($this);
		$this->lstCodiOrig->Name = QApplication::Translate('Origen');
		$this->lstCodiOrig->Width = 200;
		$this->lstCodiOrig->Visible = false;
		/*$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
		$objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
		$arrCodiOrig   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
		$intCantOrig   = count($arrCodiOrig);*/
		$intCantOrig = 0;
		$this->lstCodiOrig->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantOrig.')'),null);
		/*foreach ($arrCodiOrig as $objSucursal) {
			$this->lstCodiOrig->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
		}*/
	}

	protected function lstCodiDest_Create() {
		$this->lstCodiDest = new QListBox($this);
		$this->lstCodiDest->Name = QApplication::Translate('Destino');
		$this->lstCodiDest->Width = 200;
		$this->lstCodiDest->Visible = false;
		/*$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
		$objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
		$arrCodiDest   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
		$intCantDest   = count($arrCodiDest);*/
		$intCantDest = 0;
		$this->lstCodiDest->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantDest.')'),null);
		/*foreach ($arrCodiDest as $objSucursal) {
			$this->lstCodiDest->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
		}*/
	}

	protected function lstTienPodx_Create() {
		$this->lstTienPodx = new QListBox($this);
		$this->lstTienPodx->Name = QApplication::Translate('Tiene POD ?');
		$this->lstTienPodx->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$this->lstTienPodx->AddItem(QApplication::Translate('SI'),'SI');
		$this->lstTienPodx->AddItem(QApplication::Translate('NO'),'NO');
		$this->lstTienPodx->Visible = false;
	}

	protected function lstCodiCkpt_Create() {
		$this->lstCodiCkpt = new QListBox($this);
		$this->lstCodiCkpt->Name = QApplication::Translate('Status');
		$this->lstCodiCkpt->Width = 200;
		$this->lstCodiCkpt->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		/*foreach (SdeCheckpoint::LoadAll() as $objStatus) {
			if (in_array(trim($objStatus->TextObse),array('SDE'))) {
				if ($objStatus->CodiInad == SinoType::SI || in_array($objStatus->CodiCkpt,array('AR','AV','TR'))) {
					$this->lstCodiCkpt->AddItem($objStatus->__toString(),$objStatus->CodiCkpt);
				}
			}
		}*/
		$this->lstCodiCkpt->Visible = false;
	}

	protected function chkGuiaAnul_Create() {
		$this->chkGuiaAnul = new QCheckBox($this);
		$this->chkGuiaAnul->Name = QApplication::Translate('Excluir Guias Anuladas?');
		$this->chkGuiaAnul->Checked = true;
		$this->chkGuiaAnul->Visible = false;
	}

	// Botónes Asociados al Filtro de Búsqueda //
	protected function btnBuscRegi_Create() {
		$this->btnBuscRegi = new QButton($this);
		$this->btnBuscRegi->Text = TextoIcono('cogs','Buscar','F','lg');
		$this->btnBuscRegi->CssClass = 'btn btn-primary btn-sm';
		$this->btnBuscRegi->HtmlEntities = false;
		$this->btnBuscRegi->Visible = false;
		$this->btnBuscRegi->PrimaryButton = true;
		$this->btnBuscRegi->AddAction(new QClickEvent(), new QAjaxAction('btnBuscRegi_Click'));
	}

	// Botónes del Formulario //
	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = TextoIcono('mail-reply fa-lg','Volver');
		$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
		$this->btnCancel->CssClass = 'btn btn-warning btn-sm';
		$this->btnCancel->HtmlEntities = 'false';
		$this->btnCancel->CausesValidation = false;
	}

	protected function btnImprLote_Create() {
		$this->btnImprLote = new QButtonI($this);
		$this->btnImprLote->Text = TextoIcono('print fa-lg','Imprimir Guías');
		$this->btnImprLote->AddAction(new QClickEvent(), new QAjaxAction('btnImprLote_Click'));
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function btnNuevRegi_Click() {
        QApplication::Redirect(__SIST__.'/cargar_guia.php');
    }

    protected function btnFiltAvan_Click() {
		$this->txtNumeGuia->Visible = !$this->txtNumeGuia->Visible;
		$this->txtBuscCodi->Visible = !$this->txtBuscCodi->Visible;
		$this->txtBuscNomb->Visible = !$this->txtBuscNomb->Visible;
		$this->lstClieGuia->Visible = !$this->lstClieGuia->Visible;
		$this->calFechInic->Visible = !$this->calFechInic->Visible;
		$this->calFechFina->Visible = !$this->calFechFina->Visible;
		$this->txtNumePrec->Visible = !$this->txtNumePrec->Visible;

		$this->lstTipoPago->Visible = !$this->lstTipoPago->Visible;
		$this->lstCodiOrig->Visible = !$this->lstCodiOrig->Visible;
		$this->lstCodiDest->Visible = !$this->lstCodiDest->Visible;
		$this->lstTienPodx->Visible = !$this->lstTienPodx->Visible;
		$this->lstCodiCkpt->Visible = !$this->lstCodiCkpt->Visible;
		$this->chkGuiaAnul->Visible = !$this->chkGuiaAnul->Visible;

		$this->btnBuscRegi->Visible = !$this->btnBuscRegi->Visible;
	}

	public function dtgGuia_OrigDest_Render(Guia $objGuia) {
		if (!is_null($objGuia->EstaOrigObject))
			return $objGuia->EstaOrig."-".$objGuia->EstaDest;
		else
			return null;
	}

	public function dtgGuia_FechCkpt_Render(Guia $objGuia) {
		if (!is_null($objGuia->FechCkpt))
			return $objGuia->FechCkpt->__toString("DD/MM/YYYY");
		else
			return null;
	}

	public function dtgGuia_UsuaCkpt_Render(Guia $objGuia) {
		if (!is_null($objGuia->UsuaCkpt)) {
			$objUsuaCkpt = Usuario::Load($objGuia->UsuaCkpt);
			if ($objUsuaCkpt) {
				return $objUsuaCkpt->LogiUsua;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function BuscarCliente() {
		$strParaBusc = '';
		$strCodiClie = '';
		$strNombClie = '';
		//--------------------------------
		// Validando criterios a usar ...
		//--------------------------------
		if (strlen(trim($this->txtBuscCodi->Text)) > 0) {
			//------------------------------------
			// Se busca por el código del cliente
			//------------------------------------
			$this->txtBuscNomb->Text = '';
			$this->txtBuscCodi->Text = strtoupper($this->txtBuscCodi->Text);
			$strCodiClie = $this->txtBuscCodi->Text;
			$strParaBusc = 'Code';
		} else {
			//------------------------------------------
			// Se limpia y bloquea la lista de clientes
			//------------------------------------------
			$this->lstClieGuia->RemoveAllItems();
			$this->lstClieGuia->Enabled = false;
			$this->lstClieGuia->ForeColor = 'blue';
			$this->lstClieGuia->AddItem('- Seleccione Uno -',null);
			if (strlen(trim($this->txtBuscNomb->Text)) > 0) {
				//------------------------------------
				// Se busca por el nombre del cliente
				//------------------------------------
				$this->txtBuscCodi->Text = '';
				$this->txtBuscNomb->Text = strtoupper($this->txtBuscNomb->Text);
				$strNombClie = $this->txtBuscNomb->Text;
				$strParaBusc = 'Name';
			} else {
				//------------------------------------------
				// Se limpia y bloquea la lista de clientes
				//------------------------------------------
				$this->lstClieGuia->RemoveAllItems();
				$this->lstClieGuia->Enabled = false;
				$this->lstClieGuia->ForeColor = 'blue';
				$this->lstClieGuia->AddItem('- Seleccione Uno -',null);
			}
		}
		//------------------------------------------------------------------
		// Se verifica si se usará un criterio para la búsqueda de clientes
		//------------------------------------------------------------------
		if (strlen($strParaBusc) > 0) {
			//-----------------------------------------------------
			// Se inicializa un vector para almacenar los clientes
			//-----------------------------------------------------
			$arrClieGuia = array();
			//-----------------------------------------------------------------------------
			// Se comienza a buscar al cliente o a los clientes según el criterio definido
			//-----------------------------------------------------------------------------
			switch ($strParaBusc) {
				case 'Code':
					//----------------------------
					// Se busca por el código ...
					//----------------------------
					$objClauOrde   = QQ::Clause();
					$objClauOrde[] = QQ::OrderBy(QQN::MasterCliente()->NombClie);
					$arrClieGuia[] = MasterCliente::LoadByCodigoInterno($strCodiClie);
					break;
				case 'Name':
					//----------------------------
					// Se busca por el nombre ...
					//----------------------------
					$objClauOrde   = QQ::Clause();
					$objClauOrde[] = QQ::OrderBy(QQN::MasterCliente()->NombClie);
					$objClauWher   = QQ::Clause();
					$objClauWher[] = QQ::Like(QQN::MasterCliente()->NombClie,"%".$strNombClie."%");
					$arrClieGuia   = MasterCliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
					break;
			}
			//----------------------------------------------------------------------
			// Se valida si se ha(n) optenido resultado(s) de la búsqueda realizada
			//----------------------------------------------------------------------
			if (count($arrClieGuia) > 0) {
				//--------------------------------------------------------------
				// Se logró obtener resultados. Se limpia la lista de clientes.
				//--------------------------------------------------------------
				$this->lstClieGuia->RemoveAllItems();
				$intCantClie = count($arrClieGuia);
				//------------------------------------------------------------------------------------
				// Se busca el Cliente cuyo Código o Nombre coincida con el valor dado por el Usuario
				//------------------------------------------------------------------------------------
				if ($intCantClie == 1) {
					//-----------------------------------------
					// Solamente se consiguió un solo cliente.
					//-----------------------------------------
					$objClieGuia = $arrClieGuia[0];
					$this->lstClieGuia->AddItem($objClieGuia->__toString(), $objClieGuia->CodiClie,true);
				} else {
					//---------------------------------------------------------------------------------------------
					// Se consiguió a más de un cliente. Se procede a habilitar y a preparar la lista de clientes.
					//---------------------------------------------------------------------------------------------
					$this->lstClieGuia->Enabled = true;
					$this->lstClieGuia->ForeColor = '';
					$this->lstClieGuia->AddItem('- Selecione Uno - ('.$intCantClie.')', null);
					//---------------------------------------------------------------------------------
					// Se comienza a recorrer el vector de clientes y se agrega a la lista uno por uno
					//---------------------------------------------------------------------------------
					foreach ($arrClieGuia as $objClieGuia) {
						$this->lstClieGuia->AddItem($objClieGuia->__toString(), $objClieGuia->CodiClie);
					}
				}
			} else {
				//----------------------------------------------------------------
				// No se logró obtener resultados, por lo que se muestra al
				// usuario el mensaje que corresponde según el criterio definido.
				//----------------------------------------------------------------
				switch ($strParaBusc) {
					case 'Code':
						$this->mensaje('No existe Cliente con ese Código','','d','hand-stop-o');
						break;
					case 'Name':
						$this->mensaje('No existe Cliente con ese Nombre','','d','hand-stop-o');
						break;
				}
			}
		}
		//--------------------------------------------------
		// Se reestablece el tamaño de la lista de clientes
		//--------------------------------------------------
		$this->lstClieGuia->Width = 200;
	}

	protected function btnBuscRegi_Click() {
		$this->objClauWher = QQ::Clause();
		$this->blnHayxCond = false;

		if (strlen($this->txtNumeGuia->Text) > 0) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,DejarSoloLosNumeros($this->txtNumeGuia->Text));
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstClieGuia->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie, $this->lstClieGuia->SelectedValue);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->calFechInic->DateTime)) {
			$this->objClauWher[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$this->calFechInic->DateTime);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->calFechFina->DateTime)) {
			$this->objClauWher[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$this->calFechFina->DateTime);
			$this->blnHayxCond = true;
		}

		if (strlen($this->txtNumePrec->Text) > 0) {
			$objManiSelec = SdeContenedor::Load($this->txtNumePrec->Text);
			if ($objManiSelec) {
				$arrGuiaPrec = $objManiSelec->GetGuiaArray();
				if ($arrGuiaPrec) {
					$arrNumeGuia = array();
					foreach ($arrGuiaPrec as $objManiSelec) {
						$arrNumeGuia[] = $objManiSelec->NumeGuia;
					}
					$this->objClauWher[] = QQ::In(QQN::Guia()->NumeGuia,$arrNumeGuia);
				} else {
					$this->objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,0);
				}
			} else {
				$this->objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,0);
			}
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstTipoPago->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->TipoGuia, $this->lstTipoPago->SelectedValue);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstCodiOrig->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->EstaOrig,$this->lstCodiOrig->SelectedValue);
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstCodiDest->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->EstaDest,$this->lstCodiDest->SelectedValue);
			$this->blnHayxCond = true;
		}

		if ($this->lstTienPodx->SelectedValue) {
			if ($this->lstTienPodx->SelectedValue == 'SI') {
				$this->objClauWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,'OK');
			} else {
				$this->objClauWher[] = QQ::NotEqual(QQN::Guia()->CodiCkpt,'OK');
			}
			$this->blnHayxCond = true;
		}

		if (!is_null($this->lstCodiCkpt->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,$this->lstCodiCkpt->SelectedValue);
			$this->blnHayxCond = true;
		}

		if ($this->chkGuiaAnul->Checked) {
			$this->objClauWher[] = QQ::Equal(QQN::Guia()->Anulada,0);
			$this->blnHayxCond = true;
		}

		$this->dtgGuias->Refresh();

		if ($this->blnHayxCond) {
			$intCantRegi = Guia::QueryCount(QQ::AndCondition($this->objClauWher));

			if (!$intCantRegi > 0) {
				$this->mensaje('No se han encontrado registros','','d','exclamation-triangle');
			}
		} else {
			$this->mensaje('Mostrando las últimas 20 guías','','i','eye');
		}

		$this->btnFiltAvan_Click();
	}

	protected function dtgGuias_Bind() {
		if (isset($_SESSION['CritCons'])) {
			$this->objClauWher = unserialize($_SESSION['CritCons']);
		} else {
			if (!$this->blnHayxCond) {
				$this->objClauWher[] = QQ::All();
			}
		}

		$this->dtgGuias->TotalItemCount = Guia::QueryCount(QQ::AndCondition($this->objClauWher));

		$arrGuiaNaci = Guia::QueryArray(
			QQ::AndCondition($this->objClauWher),
			QQ::Clause($this->dtgGuias->OrderByClause, $this->dtgGuias->LimitClause)
		);

		$this->dtgGuias->DataSource = $arrGuiaNaci;
        $_SESSION['DataGuia'] = serialize($arrGuiaNaci);

		//------------------------------------------------------------------------
		// Query que obtiene todas las guías de la lista sin límite de paginación
		//------------------------------------------------------------------------

		$arrGuiaLote = Guia::QueryArray(
			QQ::AndCondition($this->objClauWher),
			QQ::Clause($this->dtgGuias->OrderByClause)
		);

		$this->arrGuiaLote = array();

		foreach($arrGuiaLote as $objGuiaLote) {
			$this->arrGuiaLote[] = $objGuiaLote->NumeGuia;
		}
	}

	public function dtgGuiasRow_Click($strFormId, $strControlId, $strParameter) {
        $strNumeGuia = strval($strParameter);
		QApplication::Redirect(__SIST__."/consulta_guia.php/$strNumeGuia");
	}

	protected function btnImprLote_Click() {
		//---------------------------------------------
		// Datos Necesarios para Imprimir Reporte PDF
		//---------------------------------------------
		$_SESSION['Dato'] = serialize($this->arrGuiaLote);
		QApplication::Redirect(__SIST__.'/guia_pdf_lote.php');
	}

	protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$objUltiAcce = PilaAcceso::Pop('D');
		QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_list.tpl.php as the included HTML template file
GuiaListForm::Run('GuiaListForm');
?>