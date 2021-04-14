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

class RepoFacturas extends FormularioBaseKaizen {
    protected $strSucuOrig;
    protected $strLogoComp;
    protected $strNombEmpr;
    protected $strDireEmpr;

    protected $lstCodiSucu;
    protected $lstCodiRece;
    protected $lstSucuDest;
    protected $calFechInic;
    protected $calFechFina;
    protected $rdbFormPago;
    protected $chkPendPago;
    protected $chkTienRete;
    protected $chkMostQuer;

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

        $this->SetupValores();

        $this->lblTituForm->Text = 'Facturas';

        $this->lstCodiSucu_Create();
        $this->lstCodiRece_Create();
        $this->lstSucuDest_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->rdbFormPago_Create();
        $this->chkPendPago_Create();
        $this->chkTienRete_Create();
        $this->chkMostQuer_Create();

        $this->cargarSucursales();
    }

    //------------------------------
    // Aqui se crean los objetos
    //------------------------------

    protected function lstCodiSucu_Create(){
        $this->lstCodiSucu = new QListBox($this);
        $this->lstCodiSucu->Name = QApplication::Translate('Sucursal Origen');
        $this->lstCodiSucu->Required = true;
        $this->lstCodiSucu->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiSucu_Change'));
    }

    protected function lstCodiRece_Create(){
        $this->lstCodiRece = new QListBox($this);
        $this->lstCodiRece->Name = QApplication::Translate('Receptoria Origen');
        $this->lstCodiRece->AddItem('- Seleccione Uno -',null);
    }

    protected function lstSucuDest_Create(){
        $this->lstSucuDest = new QListBox($this);
        $this->lstSucuDest->Name = QApplication::Translate('Sucursal Destino');
    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Name = QApplication::Translate('Fecha Inicial');
        $this->calFechInic->Required = true;
        $this->calFechInic->Width = 100;
        // $this->calFechInic->DateTime = new QDateTime(QDateTime::Now);
    }

    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Name = QApplication::Translate('Fecha Final');
        $this->calFechFina->Required = true;
        $this->calFechFina->Width = 100;
        // $this->calFechFina->DateTime = new QDateTime(QDateTime::Now);
    }

    protected function rdbFormPago_Create() {
        $this->rdbFormPago = new QRadioButtonList($this);
        $this->rdbFormPago->Name = QApplication::Translate('Forma Pago');
        $this->rdbFormPago->AddItem('TODAS',null,true);
        $this->rdbFormPago->AddItem('PPD',TipoGuiaType::PPDPREPAGADA);
        $this->rdbFormPago->AddItem('COD',TipoGuiaType::CODCOBROENDESTINO);
        $this->rdbFormPago->RepeatColumns = 3;
    }

    protected function chkPendPago_Create() {
        $this->chkPendPago = new QCheckBox($this);
        $this->chkPendPago->Name = 'Pendiente de Pago ?';
    }

    protected function chkTienRete_Create() {
        $this->chkTienRete = new QCheckBox($this);
        $this->chkTienRete->Name = 'Tiene Retenciones ?';
    }

    protected function chkMostQuer_Create() {
        $this->chkMostQuer = new QCheckBox($this);
        $this->chkMostQuer->Name = 'Mostrar Query ?';
        $this->chkMostQuer->Visible = false;
        if ($this->objUsuario->LogiUsua == 'ddurand') {
            $this->chkMostQuer->Visible = true;
        }
    }

    //-------------------------------------
    // Acciones relativas a los objetos
    //-------------------------------------

    protected function cargarSucursales() {
        $this->lstCodiSucu->RemoveAllItems();
        $this->lstSucuDest->RemoveAllItems();
        $objClauOrde   = QQ::Clause();
        $objClauOrde   = QQ::OrderBy(QQN::Estacion()->DescEsta);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
        $arrCodiSucu   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $arrCodiSucu[] = Estacion::LoadByCodiEsta('CGA');
        $intCantSucu   = count($arrCodiSucu);
        $this->lstCodiSucu->AddItem('- Seleccione Uno - ('.$intCantSucu.')',null);
        $this->lstSucuDest->AddItem('- Seleccione Uno - ('.$intCantSucu.')',null);
        foreach ($arrCodiSucu as $objSucursal) {
            $this->lstCodiSucu->AddItem($objSucursal->DescEsta,$objSucursal->CodiEsta);
            $this->lstSucuDest->AddItem($objSucursal->DescEsta,$objSucursal->CodiEsta);
        }
    }

    protected function lstCodiSucu_Change() {
        if (!is_null($this->lstCodiSucu->SelectedValue)) {
            $this->lstCodiRece->RemoveAllItems();
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Counter()->Descripcion);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Counter()->SucursalId,$this->lstCodiSucu->SelectedValue);
            $objClauWher[] = QQ::Equal(QQN::Counter()->StatusId,StatusType::ACTIVO);
            $arrCodiRece   = Counter::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            $intCantRece   = count($arrCodiRece);
            $this->lstCodiRece->AddItem('- Seleccione Uno - ('.$intCantRece.')');
            foreach ($arrCodiRece as $objReceptoria) {
                $this->lstCodiRece->AddItem($objReceptoria->__toString(),$objReceptoria->Id);
            }
            if ($intCantRece > 1) {
                $this->lstCodiRece->Enabled = true;
                $this->lstCodiRece->ForeColor = null;
            } else {
                $this->lstCodiRece->Enabled = false;
                $this->lstCodiRece->ForeColor = 'blue';
                if ($intCantRece == 1) {
                    $this->lstCodiRece->SelectedIndex = 1;
                }
            }
        }
    }


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        //----------------------------------------------------------------------
        // Se determina el nombre del archivo que sera generado
        //----------------------------------------------------------------------
        $strNombArch = __TEMP__.'/facturas_'.$this->objUsuario->LogiUsua.'.csv';
        $mixManeArch = fopen($strNombArch,'w');
        //---------------------------------------------------------
        // Armo los otros vectores que requiere la rutina PDF
        //---------------------------------------------------------
        $arrEnca2XLS = array('Id',
            'Fecha',
            'Factura',
            'Cedula/RIF',
            'Razon Social',
            'Guia',
            'F.Pago',
            'Origen',
            'Destino',
            'Mto Base',
            'Mto Franqueo',
            'Mto IVA',
            'Mto Seguro',
            'Mto Otros',
            'Monto Total',
            'TR',
            'Comp.Ret. IVA',
            'F.Comp.Ret. IVA',
            '%Ret. IVA',
            'Mto Ret. IVA',
            'Comp.Ret. ISLR',
            'F.Comp.Ret. ISLR',
            '%Ret. ISLR',
            'Mto Ret. ISLR',
            'F. Pago',
            'Documento',
            'Banco',
            'Mto. Pagado',
            'Creada Por');
        //----------------------------------------------------------------------
        // El vector de encabezados, se lleva al archivo plano
        //----------------------------------------------------------------------
        $strCadeAudi = implode(';',$arrEnca2XLS);
        fputs($mixManeArch,$strCadeAudi.";\n");
        //--------------------------------------------------
        // Aqui se define el Query sobre la base de datos
        //--------------------------------------------------
        $strCadeSqlx = "select f.id, 
		                       f.fecha_impresion, 
		                       f.numero, 
		                       f.cedula_rif,
		                       f.razon_social,
		                       g.nume_guia, 
		                       g.tipo_guia, 
                               f.sucursal_id,
		                       g.esta_dest, 
		                       f.monto_base,
		                       f.monto_franqueo,
		                       f.monto_iva,
		                       f.monto_seguro,
		                       f.monto_otros,
		                       f.monto_total,
		                       f.tiene_retencion,
		                       f.comprobante_retencion,
		                       f.fecha_comprobante,
		                       f.porcentaje_rete_iva,
		                       f.monto_rete_iva,
		                       f.comprobante_retencion_islr,
		                       f.fecha_comprobante_islr,
		                       f.porcentaje_rete_islr,
  		                       f.monto_rete_islr,
                               fp.abreviado forma_pago, 
                               p.numero_documento, 
                               b.abreviado banco, 
                               p.monto_pago,
                               u.logi_usua creada_por
		                  from factura_pmn f left join pago_factura_pmn p 
		                    on f.id = p.factura_id 
		                       left join forma_pago fp 
		                    on fp.id = p.forma_pago_id
		                       left join banco b 
		                    on b.id = p.banco_id
		                       inner join usuario u 
		                    on u.codi_usua = f.creada_por
		                       inner join guia g 
		                    on g.factura_id = f.id
		                 where 1 = 1 ";
        if (!is_null($this->lstCodiSucu->SelectedValue)) {
            $strCadeSqlx .= " and f.sucursal_id = '".$this->lstCodiSucu->SelectedValue."'";
        }
        if (!is_null($this->lstCodiRece->SelectedValue)) {
            $strCadeSqlx .= " and f.receptoria_id = ".$this->lstCodiRece->SelectedValue;
        }
        if (!is_null($this->calFechInic->DateTime)) {
            $strCadeSqlx .= " and f.creada_el >= '".$this->calFechInic->DateTime->__toString("YYYY-MM-DD")."'";
        }
        if (!is_null($this->calFechFina->DateTime)) {
            $strCadeSqlx .= " and f.creada_el <= '".$this->calFechFina->DateTime->__toString("YYYY-MM-DD")."'";
        }
        if (!is_null($this->rdbFormPago->SelectedValue)) {
            $strCadeSqlx .= " and g.tipo_guia = ".$this->rdbFormPago->SelectedValue;
        }
        if (!is_null($this->lstSucuDest->SelectedValue)) {
            $strCadeSqlx .= " and g.esta_dest = '".$this->lstSucuDest->SelectedValue."'";
        }
        if ($this->chkPendPago->Checked) {
            $strCadeSqlx .= " and p.monto_pago is null";
        }
        if ($this->chkTienRete->Checked) {
            $strCadeSqlx .= " and f.tiene_retencion = ".SinoType::SI;
        }
        $strCadeSqlx .= " order by f.numero";
        if ($this->chkMostQuer->Checked) {
            echo $strCadeSqlx;
            exit(0);
        }
        $objDatabase = FacturaPmn::GetDatabase();
        $objDbResult = $objDatabase->Query($strCadeSqlx);
        $intCantRegi = 0;
        while ($mixRegi = $objDbResult->FetchArray()) {
            //-----------------------------
            // Datos que van al reporte
            //-----------------------------
            $arrLineArch = array(
                $mixRegi['id'],
                $mixRegi['fecha_impresion'],
                $mixRegi['numero']." ",
                $mixRegi['cedula_rif'],
                $mixRegi['razon_social'],
                $mixRegi['nume_guia'],
                TipoGuiaType::ToStringCorto($mixRegi['tipo_guia']),
                $mixRegi['sucursal_id'],
                $mixRegi['esta_dest'],
                nf($mixRegi['monto_base']),
                nf($mixRegi['monto_franqueo']),
                nf($mixRegi['monto_iva']),
                nf($mixRegi['monto_seguro']),
                nf($mixRegi['monto_otros']),
                nf($mixRegi['monto_total']),
                SinoType::ToString($mixRegi['tiene_retencion']),
                $mixRegi['comprobante_retencion'],
                $mixRegi['fecha_comprobante'],
                $mixRegi['porcentaje_rete_iva'],
                $mixRegi['monto_rete_iva'],
                $mixRegi['comprobante_retencion_islr'],
                $mixRegi['fecha_comprobante_islr'],
                $mixRegi['porcentaje_rete_islr'],
                $mixRegi['monto_rete_islr'],
                $mixRegi['forma_pago'],
                $mixRegi['numero_documento'],
                $mixRegi['banco'],
                nf($mixRegi['monto_pago']),
                $mixRegi['creada_por']
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
RepoFacturas::Run('RepoFacturas');
?>