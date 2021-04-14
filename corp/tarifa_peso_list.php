<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
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
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_peso_list.php AND
 * tarifa_peso_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaPesoListForm extends TarifaPesoListFormBase {
    /**
     * @var $objUsuario UsuarioConnect
     */
	protected $objUsuario;
	protected $dtgTariNaci;
	protected $mctTariDefi;

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

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}


	protected function Form_Create() {
		parent::Form_Create();

		$this->objUsuario = unserialize($_SESSION['User']);

		$this->lblTituForm->Text = 'Mi Tarifa';

		//---------------------------
		// Meta Control de FacTarifa
		//---------------------------
		$this->mctTariDefi = FacTarifaMetaControl::Create($this,$this->objUsuario->Cliente->TarifaId);

		//----------
		// Cabecera
		//----------
		$strTextMens  = '<b>Tarifa:</b> '.$this->mctTariDefi->FacTarifa->Descripcion;
		$strTextMens .= ' | <b>Incremento x Kilo Urbano:</b> '.nf($this->mctTariDefi->FacTarifa->IncrementoUrbano);
		$strTextMens .= ' | <b>Incremento x Kilo Nacional:</b> '.nf($this->mctTariDefi->FacTarifa->ValorIncremento);
        if ($this->objUsuario->Cliente->DsctoPorPeso > 0) {
            $strTextMens .= ' | <b>% Dscto x Peso:</b> '.nf($this->objUsuario->Cliente->DsctoPorPeso);
        }
        if ($this->objUsuario->Cliente->DsctoPorVolumen > 0) {
            $strTextMens .= ' | <b>% Dscto x Volumen:</b> '.nf($this->objUsuario->Cliente->DsctoPorVolumen);
        }
		$this->lblDescTari = $this->mctTariDefi->lblDescripcionConTipo_Create();
		$this->lblDescTari->Text = $strTextMens;

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


	protected function dtgTarifaPesos_Bind() {
		$objClauWher = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->Tarifa->Id, $this->objUsuario->Cliente->TarifaId);
		//$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TipoId, TipoTarifaType::URB);

		//$this->dtgTarifaPesos->TotalItemCount = TarifaPeso::QueryCount(QQ::AndCondition($objClauWher));

		//$clauses[] = $this->dtgTarifaPesos->LimitClause;

		//$arrTariUrba = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher),QQ::LimitInfo(30));
		$arrTariUrba = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher));

		$this->dtgTarifaPesos->DataSource = $arrTariUrba;
	}

	protected function dtgTariNaci_Bind() {
		$objClauWher = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->Tarifa->Id, $this->objUsuario->Cliente->TarifaId);
		//$objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TipoId, TipoTarifaType::NAC);

		//$this->dtgTariNaci->TotalItemCount = TarifaPeso::QueryCount(QQ::AndCondition($objClauWher));

		//$clauses[] = $this->dtgTariNaci->LimitClause;

		//$arrTariNaci = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher),$clauses);
		$arrTariNaci = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher));

		$this->dtgTariNaci->DataSource = $arrTariNaci;
	}
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// tarifa_peso_list.tpl.php as the included HTML template file
TarifaPesoListForm::Run('TarifaPesoListForm');
?>
