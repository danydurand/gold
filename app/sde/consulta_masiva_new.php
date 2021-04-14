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

class ConsultaMasivaNew extends FormularioBaseKaizen {

    protected $rdbTipoEnvi;
    protected $txtListNume;  // Lista de Seriales
    protected $chkMostQuer;

    protected $strTipoEnvi;
    protected $strCadeSqlx;

    protected $lstOperAbie;  // Combo de Operaciones Abiertas
    protected $txtNumeCont;  // Numero de Contenedor
    protected $arrListNume;  // Arreglo que contiene los numeros de la lista
    protected $btnExpoExce;

    protected function Form_Create() {
        parent::Form_Create();
        t('C1');
        $this->lblTituForm->Text = QApplication::Translate('Consulta Masiva de Guías');

        $this->rdbTipoEnvi_Create();
        $this->txtListNume_Create();
        $this->chkMostQuer_Create();
        t('C2');

         $this->btnExpoExce_Create();
        t('C3');
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


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->arrListNume = array();
        //-----------------------------------------------
        // Se arma el SQL para la busqueda de registros.
        //-----------------------------------------------
        $strCadeSqlx = "
            select g.numero,
                   g.tracking,
                   g.cliente_retail_id,
                   m.codigo_interno,
                   date_format(g.created_at, '%Y-%m-%d') fech_guia,
                   g.origen_id,
                   g.receptoria_origen_id,
                   g.destino_id,
                   g.receptoria_destino_id,
                   g.tipo modalidad_pago,
                   g.nombre_remitente remitente,
                   g.nombre_destinatario,
                   g.kilos,
                   g.volumen,
                   g.piezas,
                   g.valor_declarado,
                   gp.entregado_a,
                   date_format(gp.fecha_entrega, '%Y-%m-%d') fecha_entrega,
                   gp.hora_entrega,
                   date_format(gp.created_at, '%Y-%m-%d') fecha_pod,
                   g.contenido,
                   ta.descripcion
              from guias g left join clientes_retail c
                on g.cliente_retail_id = c.id
                   left join master_cliente m
                on m.codi_clie = g.cliente_corp_id
                   left join guia_pod gp
                ON g.id = gp.guia_id
                   left join usuario u
                on g.created_by = u.codi_usua
                   left join fac_tarifa ta
                on g.tarifa_id = ta.id  ";
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
            $objClausula[] = QQ::IsNull(QQN::Guias()->DeletedAt);
            $strCadeSqlx  .= " and g.deleted_at IS NULL ";
            if ($this->rdbTipoEnvi->SelectedValue == 'N') {
                $objClausula[] = QQ::In(QQN::Guias()->Numero,$this->arrListNume);
                $strCadeSqlx .= " and g.numero in ('$strCadeGuia')";
            } else {
                foreach ($arrListTemp as $strNumeGuia) {
                    if (strlen($strNumeGuia) > 0) {
                        $objClausula[] = QQ::Like(QQN::Guias()->Tracking,"%".$strNumeGuia."%");
                        $strCadeSqlx .= " and g.tracking in ('".$strCadeGuia."')";
                    }
                }
            }
            if ($this->chkMostQuer->Checked) {
                echo $strCadeSqlx;
                return;
            }
            $_SESSION['CritCons'] = serialize($objClausula);
            $_SESSION['CritSqlx'] = serialize($strCadeSqlx);
            $_SESSION['TablCrit'] = 'Guias';
            $_SESSION['ProgEspe'] = basename($_SERVER['SCRIPT_FILENAME']);
            $_SESSION['TipoEnvi'] = $this->rdbTipoEnvi->SelectedValue;
            switch ($strParameter) {
                case 'K':
                    QApplication::Redirect('repo_guias_xls_xsql.php');
                    break;
                default:
                    QApplication::Redirect('guias_list.php');
                    break;
            }
        }
    }
}
ConsultaMasivaNew::Run('ConsultaMasivaNew','consulta_masiva.tpl.php');
?>