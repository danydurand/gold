<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/MasterClienteListFormBase.class.php');
/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the MasterCliente class.  It uses the code-generated
 * MasterClienteDataGrid control which has meta-methods to help with
 * easily creating/defining MasterCliente columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both master_cliente_list.php AND
 * master_cliente_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class AliadosListForm extends MasterClienteListFormBase {
	protected $objUsuario;
	protected $objClauWher;
	protected $blnHayxCond;

	protected $txtCodiInte;
	protected $txtNombClie;
	protected $lstSucuClie;
	protected $txtNumeRifx;
	protected $lstCodiVend;
	protected $lstCodiTari;
	protected $lstCodiStat;
	protected $lstTipoClie;
	protected $btnBuscRegi;
	protected $btnDesaClie;
	protected $strCadeSqlx;
	protected $strSqlxComp;
	protected $chkClieElim;
	protected $lstMotiElim;

	protected $btnElimMasi;

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

		$this->objUsuario = unserialize($_SESSION['User']);

		$this->lblTituForm->Text = 'Aliados';

		//-----------------------
		// Criterios de búsqueda
		//-----------------------

		$this->txtCodiInte_Create();
		$this->txtNombClie_Create();
		$this->lstSucuClie_Create();
		$this->txtNumeRifx_Create();

		$this->lstCodiVend_Create();
		$this->lstCodiTari_Create();
		$this->lstCodiStat_Create();
		$this->lstTipoClie_Create();

		$this->chkClieElim_Create();
		$this->lstMotiElim_Create();

        //--------------------
		// Botones del filtro
		//--------------------
		$this->btnBuscRegi_Create();

		$this->btnDesaClie_Create();
		$this->btnElimMasi_Create();

        // Instantiate the Meta DataGrid
		$this->dtgMasterClientes = new MasterClienteDataGrid($this);
		$this->dtgMasterClientes->FontSize = 13;
		$this->dtgMasterClientes->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgMasterClientes->CssClass = 'datagrid';
		$this->dtgMasterClientes->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgMasterClientes->Paginator = new QPaginator($this->dtgMasterClientes);
		$this->dtgMasterClientes->ItemsPerPage = 30; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgMasterClientes->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgMasterClientes->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		$objClauWher[] = QQ::Equal(QQN::MasterCliente()->EsAliado,true);
		$this->dtgMasterClientes->AdditionalConditions = QQ::AndCondition($objClauWher);

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgMasterClientes->RowActionParameterHtml = '<?= $_ITEM->CodiClie ?>';
		$this->dtgMasterClientes->AddRowAction(new QClickEvent(), new QAjaxAction('dtgMasterClientesRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for master_cliente's properties, or you
		// can traverse down QQN::master_cliente() to display fields that are down the hierarchy)

		$this->dtgMasterClientes->MetaAddColumn('CodiClie','Name=Id');

		$colCodiClie = $this->dtgMasterClientes->MetaAddColumn('CodigoInterno');
		$colCodiClie->Name = 'Codigo';
		$colCodiClie->Width = 85;

		$colNombClie = $this->dtgMasterClientes->MetaAddColumn('NombClie');
		$colNombClie->Name = 'Nombre del Cliente';
		$colNombClie->Width = 400;

		$colSaldExce = new QDataGridColumn('SALDO','<?= $_ITEM->__saldoExcedente(); ?>');
		$colSaldExce->Width = 200;
		$this->dtgMasterClientes->AddColumn($colSaldExce);

		$colSucuClie = $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->Sucursal->Iata);
		$colSucuClie->Name = 'Suc';
		$colSucuClie->Width = 100;

		$colSucuClie = $this->dtgMasterClientes->MetaAddColumn(QQN::MasterCliente()->DireMail);
		$colSucuClie->Name = 'E-mail';
		$colSucuClie->Width = 100;

		$colPersCona = $this->dtgMasterClientes->MetaAddColumn('PersCona');
		$colPersCona->Name = 'Contacto';
		$colPersCona->Width = 200;

		$colTeleCona = $this->dtgMasterClientes->MetaAddColumn('TeleCona');
		$colTeleCona->Name = 'Teléfono';
		$colTeleCona->Width = 250;

		$this->dtgMasterClientes->MetaAddTypeColumn('CodiStat', 'StatusType');

		$this->dtgMasterClientes->SetDataBinder('dtgMasterClientes_Bind');

        $this->btnExpoExce_Create();
		$this->btnExpoExce->Visible = true;

        $blnUsuaAuto = BuscarParametro("ElimClie", $this->objUsuario->LogiUsua, "Val1", 0);
        if (!$blnUsuaAuto) {
            $this->btnElimMasi->Visible = false;
        }
    }

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

    public function dtgRankGuia_Render(MasterCliente $objCliente) {
        if ($objCliente) {
            return $objCliente->_ranking();
        } else {
            return null;
        }
    }

    public function dtgRankKilo_Render(MasterCliente $objCliente) {
        if ($objCliente) {
            return $objCliente->_ranking('kilos');
        } else {
            return null;
        }
    }

    public function dtgRankFact_Render(MasterCliente $objCliente) {
        if ($objCliente) {
            return $objCliente->_ranking('facturado');
        } else {
            return null;
        }
    }

	protected function txtCodiInte_Create() {
		$this->txtCodiInte = new QTextBox($this);
		$this->txtCodiInte->Name = 'Código Interno';
		$this->txtCodiInte->Width = 100;
		$this->txtCodiInte->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
		$this->txtCodiInte->Visible = false;
	}

	protected function txtNombClie_Create() {
		$this->txtNombClie = new QTextBox($this);
		$this->txtNombClie->Name = 'Razón Social';
		$this->txtNombClie->Width = 200;
		$this->txtNombClie->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
		$this->txtNombClie->Visible = false;
	}

	protected function lstSucuClie_Create() {
		$this->lstSucuClie = new QListBox($this);
		$this->lstSucuClie->Name = QApplication::Translate('Sucursal');
		$this->lstSucuClie->Width = 200;
		$this->lstSucuClie->Visible = false;
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::Sucursales()->Iata);
		$arrSucuClie   = Sucursales::LoadAll($objClauOrde);
		$intCantOrig   = count($arrSucuClie);
		$this->lstSucuClie->AddItem(QApplication::Translate('- Seleccione Una - ('.$intCantOrig.')'),null);
		if ($arrSucuClie) {
			foreach ($arrSucuClie as $objSucuClie) {
				$this->lstSucuClie->AddItem($objSucuClie->__toString(),$objSucuClie->Id);
			}
		}
	}

	protected function txtNumeRifx_Create() {
		$this->txtNumeRifx = new QTextBox($this);
		$this->txtNumeRifx->Name = 'Nro. RIF';
		$this->txtNumeRifx->Width = 100;
		$this->txtNumeRifx->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
		$this->txtNumeRifx->Visible = false;
	}

	// ---- Lado Derecho del Formulario ---- //
	protected function lstCodiVend_Create() {
		$this->lstCodiVend = new QListBox($this);
		$this->lstCodiVend->Name = 'Vendedor';
		$this->lstCodiVend->Visible = false;
		$this->lstCodiVend->Width = 200;
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::FacVendedor()->Nombre);
		$arrVendClie   = FacVendedor::LoadArrayByStatusId(StatusType::ACTIVO, $objClauOrde);
		$intCantVend   = count($arrVendClie);
		$this->lstCodiVend->AddItem('- Seleccione Uno - ('.$intCantVend.')', null);
		if ($arrVendClie) {
			foreach ($arrVendClie as $objVendClie) {
				$this->lstCodiVend->AddItem($objVendClie->__toString(), $objVendClie->Id);
			}
		}
	}

	protected function lstCodiTari_Create() {
		$this->lstCodiTari = new QListBox($this);
		$this->lstCodiTari->Name = 'Tarifa';
		$this->lstCodiTari->Visible = false;
		$this->lstCodiTari->Width = 200;
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::FacTarifa()->Id,false);
		$arrTariClie   = FacTarifa::LoadAll($objClauOrde);
		$intCantTari   = count($arrTariClie);
		$this->lstCodiTari->AddItem('- Seleccione Una - ('.$intCantTari.')', null);
		if ($arrTariClie) {
			foreach ($arrTariClie as $objTariClie) {
				$this->lstCodiTari->AddItem($objTariClie->__toString(), $objTariClie->Id);
			}
		}
	}

	protected function lstCodiStat_Create() {
		$this->lstCodiStat = new QListBox($this);
		$this->lstCodiStat->Name = QApplication::Translate('Estatus');
		$this->lstCodiStat->Visible = false;
		$this->lstCodiStat->Width = 160;
		$this->lstCodiStat->AddItem('- Seleccione Uno -', null);
		foreach (StatusType::$NameArray as $intId => $strValue) {
			$this->lstCodiStat->AddItem(new QListItem($strValue, $intId));
		}
	}

	protected function lstTipoClie_Create() {
		$this->lstTipoClie = new QListBox($this);
		$this->lstTipoClie->Name = QApplication::Translate('Mod. Pago');
		$this->lstTipoClie->Visible = false;
		$this->lstTipoClie->Width = 160;
		$this->lstTipoClie->AddItem('- Seleccione Uno -', null);
		foreach (TipoClienteType::$NameArray as $intId => $strValue) {
			$this->lstTipoClie->AddItem(new QListItem($strValue, $intId));
		}
	}

    protected function chkClieElim_Create() {
        $this->chkClieElim = new QCheckBox($this);
        $this->chkClieElim->Name = 'Eliminado ?';
        $this->chkClieElim->Checked = false;
        $this->chkClieElim->Visible = false;
    }

    protected function lstMotiElim_Create() {
		$this->lstMotiElim = new QListBox($this);
		$this->lstMotiElim->Name = QApplication::Translate('Motivo Elim.');
		$this->lstMotiElim->Visible = false;
		$this->lstMotiElim->Width = 250;
		$arrMotiElim = MotivoEliminacion::LoadAll();
		$intCantRegi = count($arrMotiElim);
		$this->lstMotiElim->AddItem('- Seleccione Uno - ('.$intCantRegi.')', null);
        foreach ($arrMotiElim as $objMotiEli) {
            $this->lstMotiElim->AddItem($objMotiEli->__toString(), $objMotiEli->Id);
		}
	}

	// Botónes del Formulario de Búsqueda //

	protected function btnBuscRegi_Create() {
		$this->btnBuscRegi = new QButton($this);
		$this->btnBuscRegi->Text = TextoIcono('cogs','Buscar','F','lg');
		$this->btnBuscRegi->CssClass = 'btn btn-primary btn-sm';
		$this->btnBuscRegi->HtmlEntities = false;
		$this->btnBuscRegi->Visible = false;
		$this->btnBuscRegi->PrimaryButton = true;
		$this->btnBuscRegi->AddAction(new QClickEvent(), new QAjaxAction('btnBuscRegi_Click'));
	}

	// Otros Botónes del Formulario //
	protected function btnDesaClie_Create() {
		$this->btnDesaClie = new QButton($this);
		$this->btnDesaClie->Text = TextoIcono('ban','Desactivar','F','lg');
		$this->btnDesaClie->CssClass = 'btn btn-danger btn-sm';
		$this->btnDesaClie->HtmlEntities = false;
		$this->btnDesaClie->AddAction(new QClickEvent(), new QAjaxAction('btnDesaClie_Click'));
	}

	protected function btnElimMasi_Create() {
		$this->btnElimMasi = new QButtonW($this);
		$this->btnElimMasi->Text = TextoIcono('trash','Eliminar','F','lg');
		//$this->btnElimMasi->CssClass = 'btn btn-danger btn-sm';
		$this->btnElimMasi->HtmlEntities = false;
		$this->btnElimMasi->ToolTip = 'Eliminación Masiva de Clientes';
		$this->btnElimMasi->AddAction(new QClickEvent(), new QAjaxAction('btnElimMasi_Click'));
	}

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QButton($this);
        $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->Visible = false;
        $this->btnExpoExce->AddAction(new QClickEvent(), new QServerAction('btnExpoExce_Click'));
    }

    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    public function btnExpoExce_Click($strFormId, $strControlId, $strParameter) {
        $this->strCadeSqlx  = 'select master_cliente.*, fac_tarifa.descripcion, e.*, v.nombre as vendedor,';
        $this->strCadeSqlx .= '       round(datediff(e.fecha_ultima_guia,e.fecha_primera_guia)/365,2) as anios, ';
        $this->strCadeSqlx .= '       round(datediff(e.fecha_ultima_guia,e.fecha_primera_guia)/30,2) as meses ';
        $this->strCadeSqlx .= '  from master_cliente inner join fac_tarifa ';
        $this->strCadeSqlx .= '    on master_cliente.tarifa_id = fac_tarifa.id ';
        $this->strCadeSqlx .= '       inner join estadistica_de_clientes e ';
        $this->strCadeSqlx .= '    on master_cliente.codi_clie = e.cliente_id ';
        $this->strCadeSqlx .= '       inner join fac_vendedor v ';
        $this->strCadeSqlx .= '    on master_cliente.vendedor_id = v.id ';
        $this->strCadeSqlx .= ' where deleted_at is null ';
        if (strlen($this->strSqlxComp) > 0) {
            $this->strCadeSqlx .= $this->strSqlxComp;
        }
        $_SESSION['CritSqlx'] = serialize($this->strCadeSqlx);
        //echo $this->strCadeSqlx;
        QApplication::Redirect('repo_clientes_xls.php');
    }

	public function dtgMasterClientesRow_Click($strFormId, $strControlId, $strParameter) {
        $intCodiClie = intval($strParameter);
        QApplication::Redirect("aliado_edit.php/$intCodiClie");
	}

	protected function dtgMasterClientes_Bind() {
		if (isset($_SESSION['CritConsClie'])) {
			$this->objClauWher = unserialize($_SESSION['CritConsClie']);
			unset($_SESSION['CritConsClie']);
		} else {
			if (!$this->blnHayxCond) {
				$this->objClauWher[] = QQ::IsNull(QQN::MasterCliente()->DeletedAt);
			}
		}
        $this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->EsAliado,true);
		$this->dtgMasterClientes->TotalItemCount = MasterCliente::QueryCount(QQ::AndCondition($this->objClauWher));
		$this->dtgMasterClientes->DataSource = MasterCliente::QueryArray(
			QQ::AndCondition($this->objClauWher),
			QQ::Clause($this->dtgMasterClientes->OrderByClause, $this->dtgMasterClientes->LimitClause)
		);
		$_SESSION['DataClie'] = serialize($this->dtgMasterClientes->DataSource);
	}

	protected function btnFiltAvan_Click() {
		$this->txtCodiInte->Visible = !$this->txtCodiInte->Visible;
		$this->txtNombClie->Visible = !$this->txtNombClie->Visible;
		$this->lstSucuClie->Visible = !$this->lstSucuClie->Visible;
		$this->txtNumeRifx->Visible = !$this->txtNumeRifx->Visible;
		$this->chkClieElim->Visible = !$this->chkClieElim->Visible;

		$this->lstCodiVend->Visible = !$this->lstCodiVend->Visible;
		$this->lstCodiTari->Visible = !$this->lstCodiTari->Visible;
		$this->lstCodiStat->Visible = !$this->lstCodiStat->Visible;
		$this->lstTipoClie->Visible = !$this->lstTipoClie->Visible;
		$this->lstMotiElim->Visible = !$this->lstMotiElim->Visible;

		$this->btnBuscRegi->Visible = !$this->btnBuscRegi->Visible;
	}

	protected function btnBuscRegi_Click() {
		$this->objClauWher = QQ::Clause();
        $this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->EsAliado,true);

        $this->blnHayxCond = false;
		$this->strSqlxComp = '';

		$this->dtgMasterClientes->Refresh();

		if (strlen($this->txtCodiInte->Text) > 0) {
			$this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->CodigoInterno,$this->txtCodiInte->Text);
			$this->blnHayxCond = true;
			$this->strSqlxComp .= " and codigo_interno = '".$this->txtCodiInte->Text."'";
		}
		if (strlen($this->txtNombClie->Text)) {
			$this->objClauWher[] = QQ::Like(QQN::MasterCliente()->NombClie,trim($this->txtNombClie->Text).'%');
			$this->blnHayxCond = true;
            $this->strSqlxComp .= " and nomb_clie like '%".$this->txtNombClie->Text."%'";
		}
		if (!is_null($this->lstSucuClie->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->SucursalId,$this->lstSucuClie->SelectedValue);
			$this->blnHayxCond = true;
            $this->strSqlxComp .= " and codi_esta like '".$this->lstSucuClie->SelectedValue."'";
		}
		if (strlen($this->txtNumeRifx->Text) > 0) {
			$this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->NumeDrif,$this->txtNumeRifx->Text);
			$this->blnHayxCond = true;
            $this->strSqlxComp .= " and nume_drif like '%".$this->txtNumeRifx->Text."%'";
		}
		if (!is_null($this->lstCodiVend->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->VendedorId,$this->lstCodiVend->SelectedValue);
			$this->blnHayxCond = true;
            $this->strSqlxComp .= " and vendedor_id = ".$this->lstCodiVend->SelectedValue;
		}
		if (!is_null($this->lstCodiTari->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->TarifaId,$this->lstCodiTari->SelectedValue);
			$this->blnHayxCond = true;
            $this->strSqlxComp .= " and tarifa_id = ".$this->lstCodiTari->SelectedValue;
		}
		if (!is_null($this->lstCodiStat->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->CodiStat,$this->lstCodiStat->SelectedValue);
			$this->blnHayxCond = true;
            $this->strSqlxComp .= " and codi_stat = ".$this->lstCodiStat->SelectedValue;
		}
		if (!is_null($this->lstTipoClie->SelectedValue)) {
			$this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->TipoCliente,$this->lstTipoClie->SelectedValue);
			$this->blnHayxCond = true;
            $this->strSqlxComp .= " and tipo_cliente = ".$this->lstTipoClie->SelectedValue;
		}
		if ($this->chkClieElim->Checked) {
			$this->objClauWher[] = QQ::IsNotNull(QQN::MasterCliente()->DeletedAt);
			$this->blnHayxCond = true;
            $this->strSqlxComp .= " and deleted_at is not null ";
		}
        if (!is_null($this->lstMotiElim->SelectedValue)) {
            $this->objClauWher[] = QQ::Equal(QQN::MasterCliente()->MotivoEliminacionId,$this->lstMotiElim->SelectedValue);
            $this->blnHayxCond = true;
            $this->strSqlxComp .= " and motivo_eliminacion_id = ".$this->lstMotiElim->SelectedValue;
        }
		if ($this->blnHayxCond) {
			$intCantRegi = MasterCliente::QueryCount(QQ::AndCondition($this->objClauWher));

			if ($intCantRegi == 0) {
				$this->mensaje('No se han encontrado registros','m','w',__iEXCL__);
			} else {
                $this->mensaje();
			}
		} else {
            $this->mensaje();
		}
		$this->btnFiltAvan_Click();
	}

	protected function btnDesaClie_Click(){
		QApplication::Redirect(__SIST__.'/desactivar_cliente.php');
	}

	protected function btnElimMasi_Click(){
		QApplication::Redirect(__SIST__.'/eliminar_clientes.php');
	}


}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// master_cliente_list.tpl.php as the included HTML template file
AliadosListForm::Run('AliadosListForm');
?>