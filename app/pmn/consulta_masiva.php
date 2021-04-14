<?php
//-----------------------------------------------------------------------------
// Programa      : consulta_masivaa.php
// Realizado por : Juan Duran
// Fecha Elab.   : 20/02/2017
// Descripcion   : Este programa muestra un formulario con un radio button 
//                 para escoger entre Tracking o Número de Guía y colocar
//                 una lista de todas las Guías que se quieren encontrar.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ConsultaMasiva extends FormularioBaseKaizen {

    protected $rdbTipoEnvi;
    protected $chkMostQuer;
    protected $txtListNume;  // Lista de Seriales

    protected $strTipoEnvi;
    protected $strCadeSqlx;

    protected $lstOperAbie;  // Combo de Operaciones Abiertas
    protected $txtNumeCont;  // Numero de Contenedor
    protected $arrListNume;  // Arreglo que contiene los numeros de la lista

    protected $btnProcNume;
    protected $btnExpoExce;
    protected $btnExpoExc2;
    protected $btnInfoAdua;
    protected $btnFactCome;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Consulta Masiva de Guías');

        $this->rdbTipoEnvi_Create();
        $this->chkMostQuer_Create();
        $this->txtListNume_Create();

        //$this->btnProcNume_Create();

         $this->btnExpoExce_Create();
        // $this->btnExpoExc2_Create();
        // $this->btnInfoAdua_Create();
        // $this->btnFactCome_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function rdbTipoEnvi_Create() {
        $this->rdbTipoEnvi = new QRadioButtonList($this);
        $this->rdbTipoEnvi->Name = QApplication::Translate('Buscar Por:');
        $this->rdbTipoEnvi->RepeatColumns = 2;
        $this->rdbTipoEnvi->AddItem('&nbsp;Guía&nbsp;&nbsp;&nbsp;&nbsp;','N',true);
        $this->rdbTipoEnvi->AddItem('&nbsp;Tracking','I');
        $this->rdbTipoEnvi->HtmlEntities = false;
        $this->rdbTipoEnvi->Required = true;
        $this->rdbTipoEnvi->RepeatColumns = 2;
    }

    protected function chkMostQuer_Create() {
        $this->chkMostQuer = new QCheckBox($this);
        $this->chkMostQuer->Name = QApplication::Translate('Mostrar Query?');
        $this->chkMostQuer->Checked = false;
        if (in_array($this->objUsuario->LogiUsua,array("ddurand"))) {
            $this->chkMostQuer->Visible = true;
        } else {
            $this->chkMostQuer->Visible = false;
        }
    }

    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->Name = 'Guías/Trackings';
        $this->txtListNume->TextMode = QTextMode::MultiLine;
        $this->txtListNume->Width = 200;
        $this->txtListNume->Height = 260;
        $this->txtListNume->Required = true;
    }

    protected function btnSave_Create() {
        $this->btnSave = new QButtonP($this);
        $this->btnSave->Text = TextoIcono('search','Buscar','F','fa-lg');
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QButtonS($this);
        $this->btnExpoExce->Text = TextoIcono('file-excel-o','Exportar XLS','F','fa-lg');
        $this->btnExpoExce->ActionParameter = "K";
        $this->btnExpoExce->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
    }

    /*
    protected function btnExpoExc2_Create() {
        $this->btnExpoExc2 = new QButton($this);
        $this->btnExpoExc2->Text = QApplication::Translate('XLS Form2');
        $this->btnExpoExc2->ActionParameter = "F";
        $this->btnExpoExc2->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        //-----------------------------------------------------------
        // Este boton estara visible solo para Usuarios autorizados
        //-----------------------------------------------------------
        $blnBotoVisi = BuscarParametro("ExceFor2",$this->objUsuario->LogiUsua,"Val1",0);
        $this->btnExpoExc2->Visible = $blnBotoVisi;
    }

    protected function btnInfoAdua_Create() {
        $this->btnInfoAdua = new QButton($this);
        $this->btnInfoAdua->Text = QApplication::Translate('Info Aduana');
        $this->btnInfoAdua->ActionParameter = "A";
        $this->btnInfoAdua->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        //-----------------------------------------------------------
        // Este boton estara visible solo para Usuarios autorizados
        //-----------------------------------------------------------
        $blnBotoVisi = BuscarParametro("CargAdua",$this->objUsuario->LogiUsua,"Val1",0);
        $this->btnInfoAdua->Visible = $blnBotoVisi;
    }

    protected function btnFactCome_Create() {
        $this->btnFactCome = new QButton($this);
        $this->btnFactCome->Text = QApplication::Translate('Fact Com.');
        $this->btnFactCome->ActionParameter = "I";
        $this->btnFactCome->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
    }*/

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    /*protected function btnFactCome_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        $strCadeSqlx = "
            select g.nume_guia, g.guia_externa, m.codigo_interno, date_format(g.fech_guia, '%d/%m/%Y') fech_guia, g.esta_orig, g.esta_dest, substring(t.descripcion,1,3) modalidad_pago, if (g.sistema_id = 'int', g.dire_remi, g.nomb_remi) remitente, g.nomb_dest, g.peso_guia, g.vol_maritimo_pies, if (g.valor_declarado > 100, 'HGV', 'LWV') altibajo, g.peso_libras, g.cant_piez, g.valor_declarado, g.entregado_a, date_format(g.fecha_entrega, '%d/%m/%Y') fecha_entrega, g.hora_entrega, g.codi_ckpt, g.esta_ckpt, date_format(g.fech_ckpt, '%d/%m/%Y') fech_ckpt, g.hora_ckpt, u.logi_usua usua_ckpt, (select codi_ruta from guia_ckpt where guia_ckpt.nume_guia = g.nume_guia and length(codi_ruta) > 0 order by fech_ckpt desc, hora_ckpt desc limit 1) as codi_ruta, if (g.flete_directo, 'X', '') flete_directo, g.guia_retorno, g.porcentaje_iva, g.monto_iva, g.porcentaje_seguro, g.monto_seguro, g.monto_base, g.total_int_local, g.monto_franqueo, g.monto_total, e.monto_cancelado, e.recibio_el_pago, date_format(e.fecha_pago, '%d/%m/%Y') fecha_pago, e.numero_documento, g.sistema_id, g.cliente_id, (select descripcion from tipo_documento_type z where z.id = e.tipo_documento) tipo_documento,c.email,g.desc_cont
            from guia g left join cliente_i c 
              on g.cliente_id = c.id left join cobro_cod e
              on g.nume_guia = e.nume_guia left join master_cliente m 
              on m.codi_clie = g.codi_clie inner join tipo_guia_type t 
              on g.tipo_guia = t.id left join usuario u 
              on g.usua_ckpt = u.codi_usua 
            where 1 = 1
        ";
        //-----------------------------------------------
        // Armo el SQL para la busqueda de registros
        //-----------------------------------------------
        $arrListTemp = explode(',',nl2br2($this->txtListNume->Text));
        //-----------------------------------------------------------------------------
        // Este vector puede traer espacios en blanco correspondiente a los "Enter" 
        // que el Usuario haya dado en la pantalla, por lo tanto, aqui nos aseguramos
        // de que el vector solo contenga numeros reales de guias o Trackings
        //-----------------------------------------------------------------------------
        $arrDocuCons = array();
        foreach ($arrListTemp as $strNumeDocu) {
            if (strlen($strNumeDocu) > 0) {
                $arrDocuCons[] = $strNumeDocu;
            }
        }
        $strCadeGuia = implode("','",$arrDocuCons);
        if ($this->rdbTipoEnvi->SelectedValue == 'N') {
            $strCadeSqlx .= " and g.nume_guia in ('$strCadeGuia')";
        } else {
            $strCadeSqlx .= " and g.guia_externa in ('".$strCadeGuia."')";
        }

        if ($this->chkMostQuer->Checked) {
            echo $strCadeSqlx;
            return;
        }
        $_SESSION['CritSqlx'] = serialize($strCadeSqlx);
        switch ($strParameter) {
            case 'K':
                QApplication::Redirect('repo_guias_xls_xsql.php');
            break;
            case 'F':
                QApplication::Redirect('repo_guias_xlsf2_sql.php');
            break;
            case 'A':
                if (count($arrDocuCons) > 0) {
                    DescargarInfoAduana($arrDocuCons,$this->objUsuario->LogiUsua);
                }
            break;
            case 'I':
                if (count($arrDocuCons) > 0) {
                    $_SESSION['Guias_FC'] = serialize($arrDocuCons);
                    QApplication::Redirect('../sde/fc_pdf_lote.php');
                }
            break;
        }
    }*/

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->arrListNume = array();
        //-----------------------------------------------
        // Se arma el SQL para la busqueda de registros.
        //-----------------------------------------------
        $strCadeSqlx = " select g.nume_guia, 
                              g.guia_externa, 
                              m.codigo_interno, 
                              date_format(g.fech_guia, '%d/%m/%Y') fech_guia, 
                              g.esta_orig, g.esta_dest, 
                              substring(t.descripcion,1,3) modalidad_pago, 
                              if (g.sistema_id = 'int', g.dire_remi, g.nomb_remi) remitente, 
                              g.nomb_dest, 
                              g.peso_guia, 
                              g.vol_maritimo_pies, 
                              if (g.valor_declarado > 100, 'HGV', 'LWV') altibajo, 
                              g.peso_libras, 
                              g.cant_piez, 
                              g.valor_declarado, 
                              g.entregado_a, 
                              date_format(g.fecha_entrega, '%d/%m/%Y') fecha_entrega, 
                              g.hora_entrega, 
                              g.codi_ckpt, 
                              g.esta_ckpt, 
                              date_format(g.fech_ckpt, '%d/%m/%Y') fech_ckpt, 
                              g.hora_ckpt, u.logi_usua usua_ckpt,
                               (select codi_ruta
                                from guia_ckpt
                               where guia_ckpt.nume_guia = g.nume_guia
                                 and length(codi_ruta) > 0
                               order by fech_ckpt desc,
                                        hora_ckpt desc
                               limit 1) as codi_ruta,
                              if (g.flete_directo, 'X', '') flete_directo, 
                              g.guia_retorno,
                              g.porcentaje_iva, 
                              g.monto_iva, 
                              g.porcentaje_seguro, 
                              g.monto_seguro, 
                              g.monto_base, 
                              g.total_int_local, 
                              g.monto_franqueo, 
                              g.monto_total, 
                              e.monto_cancelado,
                              e.recibio_el_pago,
                              date_format(e.fecha_pago, '%d/%m/%Y') fecha_pago,
                              e.numero_documento,
                              g.sistema_id,
                              g.cliente_id,
                              (select descripcion
                                 from tipo_documento_type z 
                                where z.id = e.tipo_documento) tipo_documento,
                              c.email,
                              g.desc_cont,
                              f.descripcion
                         from guia g 
                              left join cliente_i c 
                           on g.cliente_id = c.id 
                              left join cobro_cod e
                           on g.nume_guia = e.nume_guia
                              left join master_cliente m 
                           on m.codi_clie = g.codi_clie 
                              inner join tipo_guia_type t 
                           on g.tipo_guia = t.id 
                              left join usuario u 
                           on g.usua_ckpt = u.codi_usua
                              left join fac_tarifa f
                           on m.tarifa_id = f.id
                        where 1 = 1  ";
        //------------------------------------------------------------------------------------------------
        // Se arma el vector del listado de número(s) de Guía(s) o Tracking(s) pasados por el formulario.
        //------------------------------------------------------------------------------------------------
        $arrListTemp = explode(',',nl2br2($this->txtListNume->Text));
        //-----------------------------------------------------------------------------
        // Este vector puede traer espacios en blanco correspondiente a los "Enter"
        // que el Usuario haya dado en la pantalla, por lo tanto, aqui nos aseguramos
        // de que el vector solo contenga numeros reales de guias o Trackings
        //-----------------------------------------------------------------------------
        foreach ($arrListTemp as $strNumeGuia) {
            if (strlen($strNumeGuia) > 0) {
                $this->arrListNume[] = $strNumeGuia;
            }
        }
        $strCadeGuia = implode("','",$this->arrListNume);
        if ($this->arrListNume) {
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::Equal(QQN::Guia()->Anulada,0);
            $strCadeSqlx .= " and g.anulada = 0";
            if ($this->rdbTipoEnvi->SelectedValue == 'N') {
                $objClausula[] = QQ::In(QQN::Guia()->NumeGuia,$this->arrListNume);
                $strCadeSqlx .= " and g.nume_guia in ('$strCadeGuia')";
            } else {
                foreach ($arrListTemp as $strNumeGuia) {
                    if (strlen($strNumeGuia) > 0) {
                        $objClausula[] = QQ::Like(QQN::Guia()->GuiaExterna,"%".$strNumeGuia."%");
                        $strCadeSqlx .= " and g.guia_externa in ('".$strCadeGuia."')";
                    }
                }
            }
            $_SESSION['CritCons'] = serialize($objClausula);
            $_SESSION['CritSqlx'] = serialize($strCadeSqlx);
            $_SESSION['TablCrit'] = 'Guia';
            $_SESSION['ProgEspe'] = basename($_SERVER['SCRIPT_FILENAME']);
            $_SESSION['TipoEnvi'] = $this->rdbTipoEnvi->SelectedValue;
            switch ($strParameter) {
                case 'K':
                    QApplication::Redirect(__SIST__.'/../sde/repo_guias_xls_xsql.php');
                    break;
                default:
                    QApplication::Redirect('guia_list.php');
                    break;
            }
        }
    }
}
ConsultaMasiva::Run('ConsultaMasiva');
?>