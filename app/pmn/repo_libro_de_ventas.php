<?php
//------------------------------------------------------------------------
// Programa      : repo_libro_de_ventas.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 01/04/2018
// Descripcion   : Reporte de Libro de Ventas (Facturas)
//------------------------------------------------------------------------
require_once('../../qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/validar_ubicacion.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
require_once('/appl/lib/repo_factura_pdf.php');

class RepoLibroDeVentas extends FormularioBaseKaizen {
	protected $strSucuOrig;
	protected $strLogoComp;
	protected $strNombEmpr;
	protected $strDireEmpr;
	protected $chkMostQuer;

	protected $calFechInic;
	protected $calFechFina;

	protected function SetupValores() {
		$this->objUsuario  = unserialize($_SESSION['User']);
		$this->strSucuOrig = unserialize($_SESSION['SucuOrig']);
		//-------------------------------------------------------
		// Identifico los logos y el nombre de la Empresa
		//-------------------------------------------------------
		$this->strLogoComp = '../../assets/images/LogoEmpresa.jpg';
		$objParametro = Parametro::Load('88888','datfisc');
		$this->strNombEmpr = $objParametro->ParaTxt1;
		$this->strDireEmpr = $objParametro->ParaTxt5;
	}
	
	protected function Form_Create() {

	    parent::Form_Create();

        $this->lblTituForm->Text = 'Libro de Ventas';

        $this->SetupValores();

		$this->calFechInic_Create();
		$this->calFechFina_Create();
		$this->chkMostQuer_Create();

	}

	//------------------------------
	// Aqui se crean los objetos 
	//------------------------------

	protected function calFechInic_Create() {
		$this->calFechInic = new QCalendar($this);
		$this->calFechInic->Name = QApplication::Translate('Fecha Inicial');
		$this->calFechInic->Required = true;
		$this->calFechInic->Width = 100;
		$this->calFechInic->DateTime = new QDateTime(QDateTime::Now);
	}

	protected function calFechFina_Create() {
		$this->calFechFina = new QCalendar($this);
		$this->calFechFina->Name = QApplication::Translate('Fecha Final');
		$this->calFechFina->Required = true;
		$this->calFechFina->Width = 100;
		$this->calFechFina->DateTime = new QDateTime(QDateTime::Now);
	}

	protected function chkMostQuer_Create() {
		$this->chkMostQuer = new QCheckBox($this);
		$this->chkMostQuer->Name = 'Mostrar Query ?';
		$this->chkMostQuer->Visible = false;
		if (in_array($this->objUsuario->LogiUsua, array('ddurand'))) {
			$this->chkMostQuer->Visible = true;
		}
	}

	//-------------------------------------
	// Acciones relativas a los objetos 
	//-------------------------------------

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$this->mensaje();
		//----------------------------------------------------------------------
		// Se determina el nombre del archivo que sera generado
		//----------------------------------------------------------------------
		$strNombArch = __TEMP__.'/ldv_'.$this->objUsuario->LogiUsua.'.csv';
		$mixManeArch = fopen($strNombArch,'w');
		//---------------------------------------------------------
		// Armo los otros vectores que requiere la rutina PDF
		//---------------------------------------------------------
		$arrEnca2XLS = array(
		    'Id',
			'Fecha',
			'Factura',
			'Cedula/RIF',
			'Razon Social',
			'Maq. Fiscal',
			'Mto Base',
			'Mto Franqueo',
			'Mto IVA',
			'Mto Seguro',
			'Mto Otros',
			'Monto Total',
			'Comp. Ret. IVA',
			'F. Comp. Ret. IVA',
			'% Ret. IVA',
			'Mto Ret. IVA',
			'Creada Por',
			'Sucursal'
        );
		//----------------------------------------------------------------------
		// El vector de encabezados, se lleva al archivo plano
		//----------------------------------------------------------------------
		$strCadeAudi = implode(';',$arrEnca2XLS);
		fputs($mixManeArch,$strCadeAudi.";\n");
		//--------------------------------------------------
		// Aqui se define el Query sobre la base de datos 
		//--------------------------------------------------
		$strCadeSqlx  = "select f.id,";
		$strCadeSqlx .= "       f.creada_el,";
		$strCadeSqlx .= "       f.numero,";
		$strCadeSqlx .= "       f.cedula_rif,";
		$strCadeSqlx .= "       f.razon_social,";
		$strCadeSqlx .= "       f.maquina_fiscal,";
		$strCadeSqlx .= "       f.monto_base,";
		$strCadeSqlx .= "       f.monto_franqueo,";
		$strCadeSqlx .= "       f.monto_iva,";
		$strCadeSqlx .= "       f.monto_seguro,";
		$strCadeSqlx .= "       f.monto_otros,";
		$strCadeSqlx .= "       f.monto_total,";
		$strCadeSqlx .= "       f.comprobante_retencion,";
		$strCadeSqlx .= "       f.fecha_comprobante,";
		$strCadeSqlx .= "       f.porcentaje_rete_iva,";
		$strCadeSqlx .= "       f.monto_rete_iva,";
        $strCadeSqlx .= "       u.logi_usua creada_por,";
        $strCadeSqlx .= "       f.sucursal_id, ";
        $strCadeSqlx .= "       g.tarifa_id ";
		$strCadeSqlx .= "  from factura_pmn f ";
		$strCadeSqlx .= "       inner join guia g";
		$strCadeSqlx .= "    on f.id = g.factura_id";
		$strCadeSqlx .= "       inner join usuario u";
		$strCadeSqlx .= "    on u.codi_usua = f.creada_por";
		$strCadeSqlx .= " where f.estatus != 'A'";
		//$strCadeSqlx .= "   and exists (select null from pago_factura_pmn p where p.factura_id = f.id) ";
		$strCadeSqlx .= "   and f.creada_el >= '".$this->calFechInic->DateTime->__toString("YYYY-MM-DD")."'";
		$strCadeSqlx .= "   and f.creada_el <= '".$this->calFechFina->DateTime->__toString("YYYY-MM-DD")."'";
		$strCadeSqlx .= " order by f.numero";
		if ($this->chkMostQuer->Checked) {
			echo $strCadeSqlx;		                   
			exit(0);
		}

        $blnApliReco = false;
        $decFactReco = 1;
        $intTariRefe = 65;
        //-------------------------------------------------------------------
        // Aqui se identifica si la Reconversion Monetaria esta activa o no
        //-------------------------------------------------------------------
        $objConfReco = BuscarParametro('ConfReco','RecoMone','TODO',null);
        if ($objConfReco) {
            $blnApliReco = (boolean)$objConfReco->ParaVal1;
            $decFactReco = (float)$objConfReco->ParaVal2;
            $intTariRefe = (int)$objConfReco->ParaVal3;
        }

        $objDatabase = FacturaPmn::GetDatabase();
		$objDbResult = $objDatabase->Query($strCadeSqlx);
		$intCantRegi = 0;
		while ($mixRegi = $objDbResult->FetchArray()) {
            //-------------------------
            // Montos
            //-------------------------
            $decMontBase = $mixRegi['monto_base'];
            $decMontFran = $mixRegi['monto_franqueo'];
            $decMontIvax = $mixRegi['monto_iva'];
            $decMontSgro = $mixRegi['monto_seguro'];
            $decMontOtro = $mixRegi['monto_otros'];
            $decMontRete = $mixRegi['monto_rete_iva'];
            $decMontTota = $mixRegi['monto_total'];
            //----------------------------------------
            // Se aplica la reconversión montetaria
            //----------------------------------------
            if ($blnApliReco) {
                if ($mixRegi['tarifa_id'] < $intTariRefe) {
                    $decMontBase /= $decFactReco;
                    $decMontFran /= $decFactReco;
                    $decMontIvax /= $decFactReco;
                    $decMontSgro /= $decFactReco;
                    $decMontOtro /= $decFactReco;
                    $decMontRete /= $decFactReco;
                    $decMontTota /= $decFactReco;
                }
            }
            //-----------------------------
			// Datos que van al reporte
			//-----------------------------
			$arrLineArch = array(
				$mixRegi['id'],
				$mixRegi['creada_el'],
				$mixRegi['numero']." ",
				$mixRegi['cedula_rif'],
				$mixRegi['razon_social'],
				$mixRegi['maquina_fiscal'],
				nf($decMontBase),
				nf($decMontFran),
				nf($decMontIvax),
				nf($decMontSgro),
				nf($decMontOtro),
				nf($decMontTota),
				$mixRegi['comprobante_retencion'],
				$mixRegi['fecha_comprobante'],
				$mixRegi['porcentaje_rete_iva'],
				nf($decMontRete),
				$mixRegi['creada_por'],
				$mixRegi['sucursal_id']
			);
		   //----------------------------------------------------------------------
		   // El vector generado, se lleva al archivo plano
		   //----------------------------------------------------------------------
		   $strCadeAudi = implode(';',$arrLineArch);
		   fputs($mixManeArch,$strCadeAudi.";\n");
		   $intCantRegi++;
		}
		if ($intCantRegi > 0) {
		   QApplication::Redirect('../../includes/app_includes/descargar_archivo.php?f='.$strNombArch);
		} else {
		   $this->mensaje('No hay registros que satisfagan las condiciones','','d','',__iHAND__);
		}
	}
}
RepoLibroDeVentas::Run('RepoLibroDeVentas');
?>