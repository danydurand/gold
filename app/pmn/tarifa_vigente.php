<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TarifaPesoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the TarifaPeso class.  It uses the code-generated
 * TarifaPesoDataGrid control which has meta-methods to help with
 * easily creating/defining TarifaPeso columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_vigente.php AND
 * tarifa_vigente.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaVigente extends TarifaPesoListFormBase {
	//------------------------
	// Propiedades de Objetos
	//------------------------
	protected $objUsuario;
	//----------------------------
	// Propiedades de Información
	//----------------------------
	// ---- DataGrid Tarifa Nacional ----
	protected $dtgTariNaci;
	// ---- Meta Control FacTarifa ----
	protected $mctTariDefi;
	// ---- Cabecera ----
	protected $lblDescTari;
	protected $lblTipoTari;
	protected $lblPesoInic;
	protected $lblValoIncr;
	protected $lblMediIncr;
	protected $lblPorcValo;
	protected $lblVoluDesc;
	protected $lblMontMini;
	protected $lblCostAdic;
	protected $lblCostAyud;
	protected $objTariPmnx;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

		$this->objUsuario = unserialize($_SESSION['User']);

		$this->lblTituForm->Text = 'Tarifa Vigente';

        $this->objTariPmnx = unserialize($_SESSION['TariPmnx']);

        //---------------------------
		// Meta Control de FacTarifa
		//---------------------------
		$this->mctTariDefi = FacTarifaMetaControl::Create($this,$this->objTariPmnx->Id);

		//----------
		// Cabecera
		//----------
		$this->lblDescTari = $this->mctTariDefi->lblDescripcionConTipo_Create();

		//--------------------------------
		// Meta Datagrid de Tarifa Urbana
		//--------------------------------
		$this->dtgTarifaPesos = new TarifaPesoDataGrid($this);
		$this->dtgTarifaPesos->FontSize = 12;
		$this->dtgTarifaPesos->ShowFilter = false;

		$this->dtgTarifaPesos->CssClass = 'datagrid';
		$this->dtgTarifaPesos->AlternateRowStyle->CssClass = 'alternate';

		$colPesoInic = $this->dtgTarifaPesos->MetaAddColumn('PesoInicial');
		$colPesoInic->Name = 'P.Inicial';
		$colPesoFina = $this->dtgTarifaPesos->MetaAddColumn('PesoFinal');
		$colPesoFina->Name = 'P.Final';
		$colMontBase = $this->dtgTarifaPesos->MetaAddColumn('MontoBase');
		$colMontBase->Name = 'Mto Base';
		$colFranPost = $this->dtgTarifaPesos->MetaAddColumn('FranqueoPostal');
		$colFranPost->Name = 'F.Postal';
		$colMontTari = $this->dtgTarifaPesos->MetaAddColumn('MontoTarifa');
		$colMontTari->Name = 'Mto Tarifa';

		$this->dtgTarifaPesos->SetDataBinder('dtgTarifaPesos_Bind');

		//----------------------------------
		// Meta Datagrid de Tarifa Nacional
		//----------------------------------
		$this->dtgTariNaci = new TarifaPesoDataGrid($this);
		$this->dtgTariNaci->FontSize = 12;
		$this->dtgTariNaci->ShowFilter = false;

		$this->dtgTariNaci->CssClass = 'datagrid';
		$this->dtgTariNaci->AlternateRowStyle->CssClass = 'alternate';

		$colPesoInic = $this->dtgTariNaci->MetaAddColumn('PesoInicial');
		$colPesoInic->Name = 'P.Inic';
		$colPesoFina = $this->dtgTariNaci->MetaAddColumn('PesoFinal');
		$colPesoFina->Name = 'P.Final';
		$colMontBase = $this->dtgTariNaci->MetaAddColumn('MontoBase');
		$colMontBase->Name = 'Mto Base';
		$colFranPost = $this->dtgTariNaci->MetaAddColumn('FranqueoPostal');
		$colFranPost->Name = 'F.Postal';
		$colMontTari = $this->dtgTariNaci->MetaAddColumn('MontoTarifa');
		$colMontTari->Name = 'Mto Tarifa';

		$this->dtgTariNaci->SetDataBinder('dtgTariNaci_Bind');

        $this->btnExpoExce_Create();

		$this->btnNuevRegi->Visible = false;
		$this->btnFiltAvan->Visible = false;
    }

    //---------------------------------
	// Eventos asociados a los objetos
	//---------------------------------

	//---------------------------------

	// ---- DataGrid: Tarifa Peso. ----

	protected function dtgTarifaPesos_Bind() {
		$objClauWher = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->Tarifa->Id, $this->objTariPmnx->Id);
		$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TipoId, TipoTarifaType::URB);

		$arrTariUrba = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher),QQ::LimitInfo(30));

		$this->dtgTarifaPesos->DataSource = $arrTariUrba;
	}

	protected function dtgTariNaci_Bind() {
		$objClauWher = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->Tarifa->Id, $this->objTariPmnx->Id);
		$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TipoId, TipoTarifaType::NAC);

		$arrTariNaci = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher));

		$this->dtgTariNaci->DataSource = $arrTariNaci;
	}
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// tarifa_vigente.tpl.php as the included HTML template file
TarifaVigente::Run('TarifaVigente');
?>
