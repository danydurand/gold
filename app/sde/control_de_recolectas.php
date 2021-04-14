<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ControlDeRecolectas extends FormularioBaseKaizen {
    protected $objSucuUsua;

    protected $rdbCortReco;
    protected $txtRangFech;
    protected $txtRangInic;
    protected $txtRangFina;
    protected $rdbSeleSucu;
    protected $lstRegiSucu;
    protected $lstSucuSele;
    protected $txtDireMail;

    protected $blnGranCCSx;
    protected $blnSucuSele;
    protected $strSucuTipo;
    protected $arrCritMail;
    protected $chkMostQuer;

    protected $btnSend;

	protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Control de Recolectas');

        $this->mensaje('Si son varios correos, separelos con coma (,)','','i','','info-circle');

        $this->rdbCortReco_Create();
        $this->txtRangFech_Create();
        $this->txtRangInic_Create();
        $this->txtRangFina_Create();
        $this->rdbSeleSucu_Create();
        $this->lstRegiSucu_Create();
        $this->lstSucuSele_Create();
        $this->txtDireMail_Create();
        $this->chkMostQuer_Create();

        $this->btnSend_Create();

        if (isset($_REQUEST['strSendMess'])) {
            //------------------------------------------------------------------------
            // Se ha invocado al programa con un aviso para el usuario como parámetro,
            // y se hace mostrar dicho aviso a través del label del formulario.
            //------------------------------------------------------------------------
            $strMensUsua = $_REQUEST['strSendMess'];
            $strTipoMens = 's';
            $strIconMens = 'check';

            if (isset($_SESSION['MensErro'])) {
                $blnMensErro = unserialize($_SESSION['MensErro']);
                //----------------------------------------------------------------------
                // Se valida si el aviso para el usuario se trata de una alerta o error,
                // de ser así, se hace resaltar el label con color amarillo.
                //----------------------------------------------------------------------
                if ($blnMensErro) {
                    $this->lblMensUsua->ForeColor = 'yellow';
                    $strTipoMens = 'd';
                    $strIconMens = 'hand-stop-o';
                }
            }
            $this->mensaje($strMensUsua,'',$strTipoMens,'i',$strIconMens);
        }
    }

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function rdbCortReco_Create() {
		$this->rdbCortReco = new QRadioButtonList($this);
        $this->rdbCortReco->Name = 'Corte';
        $this->rdbCortReco->AddItem('&nbsp;Corte 1&nbsp;&nbsp;',1,true);
        $this->rdbCortReco->AddItem('&nbsp;Corte 2&nbsp;&nbsp;',2);
        $this->rdbCortReco->AddItem('&nbsp;Otro Corte&nbsp;&nbsp;',3);
        $this->rdbCortReco->HtmlEntities = false;
        $this->rdbCortReco->RepeatColumns = 3;
		$this->rdbCortReco->Required = true;
		$this->rdbCortReco->AddAction(new QChangeEvent(), new QAjaxAction('rdbCortReco_Change'));
	}

    protected function txtRangFech_Create() {
        $this->txtRangFech = new QIntegerTextBox($this);
        $this->txtRangFech->Name = 'Días hacia atras que desea consultar';
        $this->txtRangFech->Text = 0;
        $this->txtRangFech->Width = 50;
        $this->txtRangFech->Required = true;
    }

    protected function txtRangInic_Create() {
        $this->txtRangInic = new QTextBox($this);
        $this->txtRangInic->Name = 'Hora Inicial';
        $this->txtRangInic->Text = '00:01';
        $this->txtRangInic->Width = 50;
        $this->txtRangInic->Enabled = false;
        $this->txtRangInic->ForeColor = 'blue';
        $this->txtRangInic->Required = true;
    }

    protected function txtRangFina_Create() {
        $this->txtRangFina = new QTextBox($this);
        $this->txtRangFina->Name = 'Hora Final';
        $this->txtRangFina->Text = '10:00';
        $this->txtRangFina->Width = 50;
        $this->txtRangFina->Enabled = false;
        $this->txtRangFina->ForeColor = 'blue';
        $this->txtRangFina->Required = true;
    }

    protected function rdbSeleSucu_Create() {
        $this->rdbSeleSucu = new QRadioButtonList($this);
        $this->rdbSeleSucu->Name = 'Selección de Sucursales';
        //------------------------------------------------------------------------------
        // Se mostrará como opción radiobutton la sucursal correspondiente al usuario.
        // Si la sucursal corresponde al Área Metropolitana, se mostrará "Gran CCS".
        //------------------------------------------------------------------------------
        $strSucuUsua = $this->objUsuario->CodiEsta;
        $objSucuSele = Estacion::Load($strSucuUsua);
        if ($objSucuSele) {
            if ($objSucuSele->AreaMetropolitana == SinoType::SI) {
                $this->rdbSeleSucu->AddItem('&nbsp;Gran CCS&nbsp;&nbsp;',1);
                $this->blnGranCCSx = true;
            } else {
                $this->rdbSeleSucu->AddItem('&nbsp;'.$objSucuSele->DescEsta.'&nbsp;&nbsp;',1);
                $this->objSucuUsua = $objSucuSele;
                $this->blnGranCCSx = false;
            }
        }
        //----------------------------------------------------------------------------
        // A continuación se mostrarán las siguientes opciones radiobuttons generales
        //----------------------------------------------------------------------------
        $this->rdbSeleSucu->AddItem('&nbsp;Por Región&nbsp;&nbsp;',2);
        $this->rdbSeleSucu->AddItem('&nbsp;Otra Selección&nbsp;&nbsp;',3);
        $this->rdbSeleSucu->HtmlEntities = false;
        $this->rdbSeleSucu->RepeatColumns = 3;
        $this->rdbSeleSucu->Required = true;
        $this->rdbSeleSucu->AddAction(new QChangeEvent(), new QAjaxAction('rdbSeleSucu_Change'));
    }

    protected function lstRegiSucu_Create() {
        $this->lstRegiSucu = new QListBox($this);
        $this->lstRegiSucu->Name = 'Region';
        $this->lstRegiSucu->Enabled = false;
        $this->lstRegiSucu->ForeColor = 'blue';
        $this->lstRegiSucu->AddItem('- Seleccione Uno -', null);
        $arrRegiSucu = Region::LoadAll();
        foreach ($arrRegiSucu as $objRegiSucu) {
            if ($objRegiSucu->__toString() != 'EXTRANJERO') {
                $this->lstRegiSucu->AddItem($objRegiSucu->__toString(), $objRegiSucu->Id);
            }
        }
        $this->lstRegiSucu->AddAction(new QChangeEvent(), new QAjaxAction('lstRegiSucu_Change'));
    }

    protected function lstSucuSele_Create() {
        $this->lstSucuSele = new QListBox($this);
        $this->lstSucuSele->Name = 'Sucursales';
        $this->lstSucuSele->Rows = 10;
        $this->lstSucuSele->Width = 200;
        $this->lstSucuSele->Required = true;
        $this->lstSucuSele->SelectionMode = QSelectionMode::Multiple;
    }

    protected function txtDireMail_Create() {
        $this->txtDireMail = new QTextBox($this);
        $this->txtDireMail->Name = 'Enviar por Correo a';
        $this->txtDireMail->Width = 200;
        $this->txtDireMail->TextMode = QTextMode::MultiLine;
    }

    protected function chkMostQuer_Create() {
        $this->chkMostQuer = new QCheckBox($this);
        $this->chkMostQuer->Name = QApplication::Translate('Mostrar Query?');
        $this->chkMostQuer->Checked = false;
        if (in_array($this->objUsuario->LogiUsua,array("ddurand","ianzola"))) {
            $this->chkMostQuer->Visible = true;
        } else {
            $this->chkMostQuer->Visible = false;
        }
    }

    protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
        $this->btnSave->Text = TextoIcono('cogs','Generar','','fa-lg');
        $this->btnSave->ActionParameter = 'SG';
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CausesValidation = true;
	}

    protected function btnSend_Create() {
		$this->btnSend = new QButton($this);
		$this->btnSend->Text = TextoIcono('send','Enviar','','fa-lg');
        $this->btnSend->ActionParameter = 'GE';
		$this->btnSend->CssClass = 'btn btn-primary btn-sm';
		$this->btnSend->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
		$this->btnSend->PrimaryButton = true;
		$this->btnSend->CausesValidation = true;
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function rdbCortReco_Change() {
        $intCortReco = $this->rdbCortReco->SelectedValue;
        switch ($intCortReco) {
            case 1:
                $this->txtRangFech->Text = 0;
                // $this->txtRangFech->Enabled = true;
                // $this->txtRangFech->ForeColor = 'black';
                $this->txtRangInic->Text = '00:01';
                $this->txtRangFina->Text = '10:00';
                $this->txtRangInic->Enabled = false;
                $this->txtRangInic->ForeColor = 'blue';
                $this->txtRangFina->Enabled = false;
                $this->txtRangFina->ForeColor = 'blue';
                break;
            case 2:
                $this->txtRangFech->Text = 0;
                // $this->txtRangFech->Enabled = false;
                $this->txtRangInic->Text = '10:01';
                $this->txtRangFina->Text = '14:00';
                $this->txtRangInic->Enabled = false;
                $this->txtRangInic->ForeColor = 'blue';
                $this->txtRangFina->Enabled = false;
                $this->txtRangFina->ForeColor = 'blue';
                break;
            case 3:
                $this->txtRangFech->Text = 0;
                // $this->txtRangFech->Enabled = false;
                $this->txtRangInic->Text = '';
                $this->txtRangFina->Text = '';
                $this->txtRangInic->Enabled = true;
                $this->txtRangInic->ForeColor = null;
                $this->txtRangFina->Enabled = true;
                $this->txtRangFina->ForeColor = null;
                break;
        }
    }

    protected function lstRegiSucu_Change() {
        if (!is_null($this->lstRegiSucu->SelectedValue)) {
            $this->CargarSucursales('REGION');
            $this->mensaje();
            $this->txtDireMail->Text = '';
            $this->strSucuTipo = 'La Región del '.$this->lstRegiSucu->SelectedName.' del País';
            // ----------------------------------------------------------------------------------------
            // Si la región seleccionada posee uno o más correos asociados, entonces debe(n) mostrarse
            // ----------------------------------------------------------------------------------------
            $arrMailRegi = explode(',',nl2br2(BuscarParametro('MailReco',$this->lstRegiSucu->SelectedName,'Txt1',0)));
            foreach ($arrMailRegi as $strMailRegi) {
                if (strlen($strMailRegi) > 0) {
                    $this->txtDireMail->Text .= $strMailRegi.chr(13);
                }
            }
        } else {
            $this->mensaje('Debe seleccionar alguna Region','m','i','',__iINFO__);
        }
    }

    protected function rdbSeleSucu_Change() {
        $this->txtDireMail->Text = '';
        $intSeleSucu = $this->rdbSeleSucu->SelectedValue;
        $this->blnSucuSele = false;
        switch ($intSeleSucu) {
            case 1:
                if ($this->blnGranCCSx) { // Gran CCS
                    $this->CargarSucursales('G-CCS');
                    $this->strSucuTipo = 'La Gran Caracas';
                    // ---------------------------------------------------------------------------
                    // Si existe uno o mas correos guardados asociados a la Gran CCS, los muestro.
                    // ---------------------------------------------------------------------------
                    $arrMailGCCS = explode(',',nl2br2(BuscarParametro('MailReco','GCCS','Txt1',0)));
                    foreach ($arrMailGCCS as $strMailGCCS) {
                        if (strlen($strMailGCCS) > 0) {
                            $this->txtDireMail->Text .= $strMailGCCS.chr(13);
                        }
                    }
                } else { // Otra Sucursal
                    if ($this->objSucuUsua) {
                        $this->CargarSucursales($this->objSucuUsua->CodiEsta);
                        $this->strSucuTipo = $this->objSucuUsua->DescEsta;
                        // ---------------------------------------------------------------------------
                        // Si existe uno o mas correos guardados asociados a la Sucursal, los muestro.
                        // ---------------------------------------------------------------------------
                        $arrMailSucu = explode(',',nl2br2($this->objSucuUsua->DireMail));
                        foreach ($arrMailSucu as $strMailSucu) {
                            if (strlen($strMailSucu) > 0) {
                                $this->txtDireMail->Text .= $strMailSucu.chr(13);
                            }
                        }
                    }
                }
                $this->lstRegiSucu->Enabled = false;
                $this->lstRegiSucu->ForeColor = 'blue';
                $this->lstRegiSucu->SelectedIndex = 0;
                break;
            case 2:   // Por Region
                $this->lstSucuSele->RemoveAllItems();
                $this->lstRegiSucu->Enabled = true;
                $this->lstRegiSucu->ForeColor = null;
                $this->lstRegiSucu->Required = true;
                break;
            case 3:   // Otra Seleccion
                $this->CargarSucursales('TODAS');
                $this->lstRegiSucu->Enabled = false;
                $this->lstRegiSucu->ForeColor = 'blue';
                $this->lstRegiSucu->SelectedIndex = 0;
                $this->blnSucuSele = true;
                // ------------------------------------------------------------------------------
                // Si existe uno o mas correos guardados asociados a Otra Seleccion, los muestro.
                // ------------------------------------------------------------------------------
                $arrMailOtras = explode(',',nl2br2(BuscarParametro('MailReco','OTRAS','Txt1',0)));
                foreach ($arrMailOtras as $strMailOtras) {
                    if (strlen($strMailOtras) > 0) {
                        $this->txtDireMail->Text .= $strMailOtras.chr(13);
                    }
                }
                break;
        }
    }

    protected function CargarSucursales($strTipoSucu) {
	    $objClauOrde   = QQ::Clause();
	    $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Estacion()->PaisId,1);
        switch ($strTipoSucu) {
            case 'G-CCS':
                //------------------------------------------------------------------
                // Sucursales identificadas como Gran Caracas o Area Metropolitana
                //------------------------------------------------------------------
                $objClauWher[] = QQ::Equal(QQN::Estacion()->AreaMetropolitana,SinoType::SI);
                $arrGranCcsx   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                $this->lstSucuSele->RemoveAllItems();
                foreach ($arrGranCcsx as $objSucuGran) {
                    if ($objSucuGran->EsUnAlmacen == SinoType::NO) {
                        $this->lstSucuSele->AddItem($objSucuGran->__toString(), $objSucuGran->CodiEsta, true);
                    }
                }
                break;
            case 'REGION':
                //-----------------------------------------
                // Sucursales de una Region determinada
                //-----------------------------------------
                $objClauWher[] = QQ::Equal(QQN::Estacion()->RegionId,$this->lstRegiSucu->SelectedValue);
                $arrPorxRegi   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                $this->lstSucuSele->RemoveAllItems();
                foreach ($arrPorxRegi as $objPorxRegi) {
                    if ($objPorxRegi->EsUnAlmacen == SinoType::NO) {
                        $this->lstSucuSele->AddItem($objPorxRegi->__toString(), $objPorxRegi->CodiEsta, true);
                    }
                }
                break;
            case 'TODAS':
                //--------------------------------
                // Todas las Sucursales activas
                //--------------------------------
                $arrTodaSucu = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                $this->lstSucuSele->RemoveAllItems();
                foreach ($arrTodaSucu as $objTodaSucu) {
                    if ($objTodaSucu->EsUnAlmacen == SinoType::NO) {
                        $this->lstSucuSele->AddItem($objTodaSucu->__toString(), $objTodaSucu->CodiEsta);
                    }
                }
                break;
            default:
                $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiEsta,$strTipoSucu);
                $objPorxSucu   = Estacion::QuerySingle(QQ::AndCondition($objClauWher));
                $this->lstSucuSele->RemoveAllItems();
                if ($objPorxSucu->EsUnAlmacen == SinoType::NO) {
                    //-----------------------------------------------------------------------
                    // Obtengo las zonas foráneas e inlcuyo a todas a la lista de sucursales
                    //-----------------------------------------------------------------------
                    $objClauWher   = QQ::Clause();
                    $objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
                    $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
                    $objClauWher[] = QQ::Equal(QQN::Estacion()->PaisId,1);
                    $objClauWher[] = QQ::Equal(QQN::Estacion()->SeFacturaEn,$objPorxSucu->SeFacturaEn);
                    $arrZonaSucu = Estacion::QueryArray(QQ::AndCondition($objClauWher));
                    foreach ($arrZonaSucu as $objZonaSucu) {
                        if ($objZonaSucu->EsUnAlmacen == SinoType::NO) {
                            $this->lstSucuSele->AddItem($objZonaSucu->__toString(), $objZonaSucu->CodiEsta, true);
                        }
                    }
                }
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //-------------------------------------------------------------------------------------
        // En esta seccion agregamos "inteligencia de parametros" para evitar que el Usuario
        // tenga que configurar el Sistema previamente en lo referente a los destinatarios
        // de los correos
        //-------------------------------------------------------------------------------------
        $strCadeSqlx = "select g.nume_guia,
                               g.guia_externa,
                               m.codigo_interno,
                               date_format(g.fech_guia, '%d/%m/%Y') fech_guia,
                               g.esta_orig, 
                               g.esta_dest,
                               substring(t.descripcion,1,3) modalidad_pago,
                               if (g.sistema_id = 'int', g.dire_remi, g.nomb_remi) remitente,
                               g.nomb_dest,
                               g.peso_guia,
                               g.cant_piez,
                               g.valor_declarado,
                               g.entregado_a,
                               date_format(g.fecha_entrega, '%d/%m/%Y') fecha_entrega,
                               g.hora_entrega,
                               g.codi_ckpt,
                               g.esta_ckpt,
                               date_format(g.fech_ckpt, '%d/%m/%Y') fech_ckpt,
                               g.hora_ckpt, u.logi_usua usua_ckpt,
                               if (g.flete_directo, 'X', '') flete_directo,
                               g.guia_retorno,
                               g.desc_cont
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
                         where g.codi_ckpt in ('NR','RP')
                           and g.anulada = 0";
        //-----------------------------------------------------------------------------------------------------
        // Paso toda la lista de sucursales a un vector, para luego el contenido del mismo unirlo en un string.
        //-----------------------------------------------------------------------------------------------------
        $arrSucuCons = array();
        foreach ($this->lstSucuSele->SelectedValues as $strSucuSele) {
            if (strlen($strSucuSele) > 0) {
                $arrSucuCons[] = $strSucuSele;
            }
        }

        $strCadeSucu = implode("','",$arrSucuCons);
        $strCadeSqlx .= " and g.esta_orig in ('$strCadeSucu')";

        $txtRangInic = $this->txtRangInic->Text;
        $txtRangFina = $this->txtRangFina->Text;

        $intCantDias = $this->txtRangFech->Text;
        $dttFechInic = SumaRestaDiasAFecha(Date('Y-m-d'),$intCantDias,'-');
        $dttFechFina = SumaRestaDiasAFecha(Date('Y-m-d'),0,'-');
        $strCadeSqlx .= " and g.fech_ckpt between '$dttFechInic' and '$dttFechFina'";
        $strCadeSqlx .= " and g.hora_ckpt >= '$txtRangInic' and g.hora_ckpt <= '$txtRangFina'";

        $strCadeSqlx .= "  order by g.nume_guia desc";

        if ($this->chkMostQuer->Checked) {
            echo $strCadeSqlx;
            return;
        }

        $_SESSION['CritSqlx'] = serialize($strCadeSqlx);

        //------------------------------------------------------------------------------
        // Si se tiene uno ó más correos, los guardo en sus parámetros correspondientes
        //------------------------------------------------------------------------------
        $strSucuCons = $this->rdbSeleSucu->SelectedValue;
        $strRegiSucu = $this->lstRegiSucu->SelectedName;

        $arrMailTemp = explode(',',nl2br2($this->txtDireMail->Text));

        $arrMailCons = array();
        foreach ($arrMailTemp as $strMailTemp) {
            if (strlen($strMailTemp) > 0) {
                $arrMailCons[] = $strMailTemp;
            }
        }

        $blnParaUsua = true;
        $strTipoSele = '';

        //------------------------------------------------------------------------------------------
        // Se guarda el o los correos agregados desde el formulario en donde les toque corresponder
        //------------------------------------------------------------------------------------------
        switch ($strSucuCons) {
            case 1:
                if ($this->blnGranCCSx) {
                    $strTipoSele = 'GCCS';
                } else {
                    if ($this->objSucuUsua) {
                        $this->objSucuUsua->DireMail = implode(",", $arrMailCons);
                        $this->objSucuUsua->Save();

                        $this->arrCritMail = $this->objSucuUsua->DireMail;

                        $blnParaUsua = false;
                    }
                }
                break;
            case 2:
                $strTipoSele = $strRegiSucu;
                break;
            case 3:
                $strTipoSele = 'OTRAS';
                break;
        }

        if ($blnParaUsua) {
            $objSucuOpci = Parametro::LoadByIndiParaCodiPara('MailReco',$strTipoSele);
            $objSucuOpci->ParaTxt1 = implode(",", $arrMailCons);
            $objSucuOpci->Save();

            $this->arrCritMail = $objSucuOpci->ParaTxt1;
        }

        //----------------------------------------------
        // Empiezo a delegar los eventos por cada botón
        //----------------------------------------------
        $_SESSION['CritMail'] = '';
        $_SESSION['CortInic'] = '';
        $_SESSION['CortFina'] = '';
        if ($this->blnSucuSele) {
            //-----------------------------------------------------------------------------------------------------
            // Paso toda la lista de sucursales a un vector, para luego el contenido del mismo unirlo en un string.
            //-----------------------------------------------------------------------------------------------------
            $arrSucuName = array();
            foreach ($this->lstSucuSele->SelectedNames as $strSucuSele) {
                if (strlen($strSucuSele) > 0) {
                    $arrSucuName[] = $strSucuSele;
                }
            }

            $_SESSION['SucuTipo'] = serialize(implode(", ",$arrSucuName));
        } else {
            $_SESSION['SucuTipo'] = serialize($this->strSucuTipo);
        }

        switch ($strParameter) {
            case 'GE':
                //---------------------------------------------------------------------------------------
                // Genero el reporte y el mismo lo envío por correo a los destinatarios correspondientes
                //---------------------------------------------------------------------------------------
                $_SESSION['CritMail'] = serialize($this->arrCritMail);
                $_SESSION['CortInic'] = serialize($this->txtRangInic->Text);
                $_SESSION['CortFina'] = serialize($this->txtRangFina->Text);
                break;
        }

        QApplication::Redirect('../sde/repo_guias_nrrp_sql.php');
	}
}

ControlDeRecolectas::Run('ControlDeRecolectas');
?>