<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');


class PrefacturasSinDf extends FormularioBaseKaizen {
	protected $dtgPrefSind;


	protected function Form_Create() {
	    parent::Form_Create();

		$this->lblTituForm->Text = 'PreFacturas sin Datos Fiscales';

        // Instantiate the Meta DataGrid
		$this->dtgPrefSind = new QDataGrid($this);
		$this->dtgPrefSind->FontSize = 13;
		$this->dtgPrefSind->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgPrefSind->CssClass = 'datagrid';
		$this->dtgPrefSind->AlternateRowStyle->CssClass = 'alternate';


		// Higlight the datagrid rows when mousing over them
		$this->dtgPrefSind->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgPrefSind->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		$this->dtgPrefSind->RowActionParameterHtml = '<?= $_ITEM["id"] ?>';
		$this->dtgPrefSind->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPrefSindRow_Click'));

        $colFactIdxx = new QDataGridColumn('Pre-Fact','<?= $_ITEM["id"] ?>');
        $this->dtgPrefSind->AddColumn($colFactIdxx);

        $colNumeGuia = new QDataGridColumn('Guia','<?= $_ITEM["guia_id"] ?>');
        $this->dtgPrefSind->AddColumn($colNumeGuia);

        $colFechCrea = new QDataGridColumn('F.Creacion','<?= $_ITEM["creada_el"] ?>');
        $this->dtgPrefSind->AddColumn($colFechCrea);

        $colCeduRifx = new QDataGridColumn('Cedula/RIF','<?= $_ITEM["cedula_rif"] ?>');
        $this->dtgPrefSind->AddColumn($colCeduRifx);

        $colRazoSoci = new QDataGridColumn('Razon Social','<?= $_ITEM["razon_social"] ?>');
        $this->dtgPrefSind->AddColumn($colRazoSoci);

        $colMontFact = new QDataGridColumn('Mto Facturado','<?= $_ITEM["monto_total"] ?>');
        $this->dtgPrefSind->AddColumn($colMontFact);

        /*$colMontPago = new QDataGridColumn('Mto Pagado','<?= $_ITEM["monto_pago"] ?>');*/
        //$this->dtgPrefSind->AddColumn($colMontPago);

		$this->dtgPrefSind->SetDataBinder('dtgPrefSind_Bind');

    }

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------


    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------


	public function dtgPrefSindRow_Click($strFormId, $strControlId, $strParameter) {
        $intPrefIdxx = intval($strParameter);
        QApplication::Redirect("simular_impresion.php/F/$intPrefIdxx");
	}

	protected function dtgPrefSind_Bind() {
	    if (isset($_SESSION['fech_falt'])) {
	        $dttFechFalt = $_SESSION['fech_falt'];
            $strCadeSqlx  = 'select * ';
            $strCadeSqlx .= '  from v_sin_datos_fiscales ';
            $strCadeSqlx .= ' where creada_por = '.$this->objUsuario->CodiUsua;
            $strCadeSqlx .= '   and creada_el = "'.$dttFechFalt.'"';

            $objDataBase  = FacturaPmn::GetDatabase();
            $objDbResult  = $objDataBase->Query($strCadeSqlx);

            $arrPrefSind  = array();
            while ($mixRegistro  = $objDbResult->FetchArray()) {
                $arrPrefSind[] = $mixRegistro;
            }

            $this->dtgPrefSind->DataSource = $arrPrefSind;
        }
	}



}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// master_cliente_list.tpl.php as the included HTML template file
PrefacturasSinDf::Run('PrefacturasSinDf');
?>