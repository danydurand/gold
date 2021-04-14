<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class GuiaSearchForm extends FormularioBaseKaizen {
    // Parámetros Regulares //
    protected $arrRegiSucu;
    protected $intCantSucu;

    // Zona 1
    protected $txtNumeGuia;
    protected $txtGuiaExte;
    protected $txtNumeMast;
    protected $txtCodiInte;
    protected $txtNombBusc;
    protected $lstCodiClie;
    protected $calFechInic;
    protected $calFechFina;
    protected $chkInclSubc;

    // Zona 2
    protected $txtNumePrec;
    protected $lstTipoPago;
    protected $lstCodiOrig;
    protected $lstCodiDest;
    protected $lstCodiRece;
    protected $txtNombRemi;
    protected $txtNombDest;
    protected $lstCodiVend;
    protected $calEntrInic;
    protected $calEntrFina;
    protected $rdbTienPodx;
    protected $chkPesoVolu;
    protected $txtUsuaCrea;
    protected $txtUbicFisi;
    protected $btnExpoExce;
    protected $btnExpoEsta;
    protected $lstReceOrig;

    // Zona 3
    protected $lstTariIdxx;
    protected $calFechTrx1;
    protected $calFechTrx2;
    protected $txtUsuaPodx;
    protected $lstCodiCkpt;
    protected $txtSepaColu;
    protected $chkConxDesc;
    protected $chkMostQuer;

    protected function Form_Create() {
        parent::Form_Create();

        $this->arrRegiSucu = Estacion::LoadSucursalesActivasToClients();
        $this->intCantSucu = count($this->arrRegiSucu);

        $this->lblTituForm->Text = QApplication::Translate('Buscar Guía');
        
        $this->txtNumeGuia_Create();
        $this->txtGuiaExte_Create();
        $this->txtNumeMast_Create();
        $this->txtCodiInte_Create();
        $this->txtNombBusc_Create();
        $this->lstCodiClie_Create();
        $this->chkInclSubc_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->txtNumePrec_Create();
        $this->lstTipoPago_Create();
        $this->lstCodiOrig_Create();
        $this->lstReceOrig_Create();
        $this->lstCodiDest_Create();
        $this->lstCodiRece_Create();
        $this->txtNombRemi_Create();
        $this->txtNombDest_Create();
        $this->lstCodiVend_Create();
        $this->rdbTienPodx_Create();
        $this->chkPesoVolu_Create();
        $this->calEntrInic_Create();
        $this->calEntrFina_Create();
        $this->lstTariIdxx_Create();
        //$this->calFechTrx1_Create();
        //$this->calFechTrx2_Create();
        $this->txtUsuaPodx_Create();
        $this->txtUsuaCrea_Create();
        $this->txtUbicFisi_Create();
        $this->lstCodiCkpt_Create();
        $this->chkMostQuer_Create();
        $this->chkConxDesc_Create();

        // Botónes del Formulario //
        
        $this->btnSave->Text = TextoIcono('search fa-lg','Buscar');
        $this->btnSave->ActionParameter = "B";
        $this->btnExpoExce_Create();
        $this->btnExpoEsta_Create();
        $this->txtSepaColu_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------


    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate('Guía Gold');
        $this->txtNumeGuia->Width = 100;
    }

    protected function txtGuiaExte_Create() {
        $this->txtGuiaExte = new QTextBox($this);
        $this->txtGuiaExte->Name = QApplication::Translate('Guía Externa');
        $this->txtGuiaExte->Width = 181;
    }

    protected function txtNumeMast_Create() {
        $this->txtNumeMast = new QTextBox($this);
        $this->txtNumeMast->Name = QApplication::Translate('Nro de Manifiesto');
        $this->txtNumeMast->Width = 181;
    }

    protected function txtCodiInte_Create() {
        $this->txtCodiInte = new QTextBox($this);
        $this->txtCodiInte->Name = 'Cliente por Código';
        $this->txtCodiInte->Width = 100;
        $this->txtCodiInte->Placeholder = 'Buscar Código';
        $this->txtCodiInte->AddAction(new QBlurEvent(), new QAjaxAction('txtCodiInte_Blur'));
    }

    protected function txtNombBusc_Create() {
        $this->txtNombBusc = new QTextBox($this);
        $this->txtNombBusc->Name = 'Cliente por Nombre';
        $this->txtNombBusc->Width = 180;
        $this->txtNombBusc->Placeholder = 'Buscar Nombre';
        $this->txtNombBusc->AddAction(new QBlurEvent(), new QAjaxAction('txtNombBusc_Blur'));
    }

    protected function lstCodiClie_Create() {
        $this->lstCodiClie = new QListBox($this);
        $this->lstCodiClie->Name = QApplication::Translate('Cliente');
        $this->lstCodiClie->Width = 180;
        $this->lstCodiClie->AddItem(QApplication::Translate('- Seleccione Uno - (0)'),null);
    }

    protected function chkInclSubc_Create() {
        $this->chkInclSubc = new QCheckBox($this);
        $this->chkInclSubc->Name = 'Incluir Sub-Cuentas ?';
        $this->chkInclSubc->Checked = false;
    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Name = 'F. Creación Guía Inicial';
        $this->calFechInic->Width = 100;
    }

    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Name = 'F. Creación Guía Final';
        $this->calFechFina->Width = 100;
    }

    protected function calEntrInic_Create() {
        $this->calEntrInic = new QCalendar($this);
        $this->calEntrInic->Name = QApplication::Translate('F. Entrega Inicial');
        $this->calEntrInic->Width = 100;
    }

    protected function calEntrFina_Create() {
        $this->calEntrFina = new QCalendar($this);
        $this->calEntrFina->Name = QApplication::Translate('F. Entrega Final');
        $this->calEntrFina->Width = 100;
    }

    protected function lstTariIdxx_Create() {
        $this->lstTariIdxx = new QListBox($this);
        $this->lstTariIdxx->Name = 'Tarifa';
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::FacTarifa()->Id,false);
        $arrTariIdxx   = FacTarifa::LoadAll($objClauOrde);
        $intCantTari   = count($arrTariIdxx);
        $this->lstTariIdxx->AddItem('- Seleccione - ('.$intCantTari.')');
        foreach ($arrTariIdxx as $objTariIdxx) {
            $this->lstTariIdxx->AddItem($objTariIdxx->__toString(),$objTariIdxx->Id);
        }
        $this->lstTariIdxx->Width = 180;
    }

    //protected function calFechTrx1_Create() {
    //    $this->calFechTrx1 = new QCalendar($this);
    //    $this->calFechTrx1->Name = QApplication::Translate('Fecha TR Inicial');
    //    $this->calFechTrx1->Width = 100;
    //}
    //
    //protected function calFechTrx2_Create() {
    //    $this->calFechTrx2 = new QCalendar($this);
    //    $this->calFechTrx2->Name = QApplication::Translate('Fecha TR Final');
    //    $this->calFechTrx2->Width = 100;
    //}

    protected function txtNumePrec_Create() {
        $this->txtNumePrec = new QTextBox($this);
        $this->txtNumePrec->Name = QApplication::Translate('Número de Precinto');
        $this->txtNumePrec->Width = 150;
    }

    protected function lstTipoPago_Create() {
        $this->lstTipoPago = new QListBox($this);
        $this->lstTipoPago->Name = QApplication::Translate('Forma de Pago');
        $this->lstTipoPago->Width = 140;
        $this->lstTipoPago->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstTipoPago->AddItem(QApplication::Translate('PPD'), 1);
        $this->lstTipoPago->AddItem(QApplication::Translate('CRD'), 2);
        $this->lstTipoPago->AddItem(QApplication::Translate('COD'), 3);
    }

    protected function lstCodiOrig_Create() {
        $this->lstCodiOrig = new QListBox($this);
        $this->lstCodiOrig->Name = QApplication::Translate('Origen');
        $this->lstCodiOrig->Width = 180;
        $this->lstCodiOrig->AddItem(QApplication::Translate('- Seleccione Uno - ('.$this->intCantSucu.')'),null);
        foreach ($this->arrRegiSucu as $objSucursal) {
            $this->lstCodiOrig->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
        }
        $this->lstCodiOrig->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiOrig_Change'));
    }

    protected function lstReceOrig_Create() {
        $this->lstReceOrig = new QListBox($this);
        $this->lstReceOrig->Name = QApplication::Translate('Recept. Orig.');
        $this->lstReceOrig->Width = 180;
        $this->lstReceOrig->AddItem(QApplication::Translate('- Seleccione Uno - '),null);
        $this->lstReceOrig->Visible = false;
    }

    protected function lstCodiDest_Create() {
        $this->lstCodiDest = new QListBox($this);
        $this->lstCodiDest->Name = QApplication::Translate('Destino');
        $this->lstCodiDest->Width = 180;
        $this->lstCodiDest->AddItem(QApplication::Translate('- Seleccione Uno - ('.$this->intCantSucu.')'),null);
        foreach ($this->arrRegiSucu as $objSucursal) {
            $this->lstCodiDest->AddItem($objSucursal->__toString(),$objSucursal->CodiEsta);
        }
        $this->lstCodiDest->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiDest_Change'));
    }

    protected function lstCodiRece_Create() {
        $this->lstCodiRece = new QListBox($this);
        $this->lstCodiRece->Name = QApplication::Translate('Recept. Dest.');
        $this->lstCodiRece->Width = 180;
        $this->lstCodiRece->Visible = false;
    }

    protected function txtNombRemi_Create() {
        $this->txtNombRemi = new QTextBox($this);
        $this->txtNombRemi->Name = QApplication::Translate('Nombre del Remitente');
        $this->txtNombRemi->Width = 181;
    }

    protected function txtNombDest_Create() {
        $this->txtNombDest = new QTextBox($this);
        $this->txtNombDest->Name = QApplication::Translate('Nombre del Destinatario');
        $this->txtNombDest->Width = 181;
    }

    protected function lstCodiVend_Create() {
        $this->lstCodiVend = new QListBox($this);
        $this->lstCodiVend->Name = QApplication::Translate('Vendedor');
        $this->lstCodiVend->Width = 180;
        $arrVendActi = FacVendedor::LoadVendedoresActivos();
        $intCantVend = count($arrVendActi);
        $this->lstCodiVend->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantVend.')'),null);
        //--------------------------------------------------------
        // Se obtiene solamente los vendedores que están activos.
        //--------------------------------------------------------
        foreach ($arrVendActi as $objVendedor) {
            $this->lstCodiVend->AddItem($objVendedor->__toString(),$objVendedor->Id);
        }
    }

    protected function rdbTienPodx_Create() {
        $this->rdbTienPodx = new QRadioButtonList($this);
        $this->rdbTienPodx->Name = QApplication::Translate('Tiene POD ?');
        $this->rdbTienPodx->AddItem('&nbsp;SI&nbsp;&nbsp;','SI');
        $this->rdbTienPodx->AddItem('&nbsp;NO&nbsp;&nbsp;','NO');
        $this->rdbTienPodx->RepeatColumns = 2;
        $this->rdbTienPodx->HtmlEntities = false;
    }

    protected function chkPesoVolu_Create() {
        $this->chkPesoVolu = new QCheckBox($this);
        $this->chkPesoVolu->Name = 'Peso Volumétrico ?';
        $this->chkPesoVolu->Checked = false;
    }

    protected function txtUsuaPodx_Create() {
        $this->txtUsuaPodx = new QTextBox($this);
        $this->txtUsuaPodx->Name = 'POD Registrado por';
        $this->txtUsuaPodx->Width = 100;
        $this->txtUsuaPodx->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
    }

    protected function txtUsuaCrea_Create() {
        $this->txtUsuaCrea = new QTextBox($this);
        $this->txtUsuaCrea->Name = QApplication::Translate('Usuario Creacion');
        $this->txtUsuaCrea->Width = 80;
        $this->txtUsuaCrea->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
    }

    protected function txtUbicFisi_Create() {
        $this->txtUbicFisi = new QTextBox($this);
        $this->txtUbicFisi->Name = 'Ubicación Física';
        $this->txtUbicFisi->Placeholder = 'Ubicación en Almacén';
        $this->txtUbicFisi->Width = 150;
    }

    protected function lstCodiCkpt_Create() {
        $this->lstCodiCkpt = new QListBox($this);
        $this->lstCodiCkpt->Name = QApplication::Translate('Estatus');
        $this->lstCodiCkpt->Width = 180;
        $arrCodiCkpt = SdeCheckpoint::LoadCheckpointsActivos();
        $intCantRegi = count($arrCodiCkpt);
        $this->lstCodiCkpt->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantRegi.')'),null);
        foreach ($arrCodiCkpt as $objStatus) {
            $this->lstCodiCkpt->AddItem($objStatus->__toString(),$objStatus->CodiCkpt);
        }
    }

    protected function chkMostQuer_Create() {
        $this->chkMostQuer = new QCheckBox($this);
        $this->chkMostQuer->Name = QApplication::Translate('Mostrar Query ?');
        $this->chkMostQuer->Checked = false;
        if (in_array($this->objUsuario->LogiUsua,array("ddurand"))) {
            $this->chkMostQuer->Visible = true;
        } else {
            $this->chkMostQuer->Visible = false;
        }
    }

    protected function chkConxDesc_Create() {
        $this->chkConxDesc = new QCheckBox($this);
        $this->chkConxDesc->Name = QApplication::Translate('Con Descuento ?');
        $this->chkConxDesc->Checked = false;
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QButton($this);
        $this->btnExpoExce->Text = '<i class="fa fa-file-excel-o fa-lg"></i> Reporte XLS';
        $this->btnExpoExce->ActionParameter = "K";
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-info btn-sm';
        $this->btnExpoExce->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
    }

    protected function btnExpoEsta_Create() {
        $this->btnExpoEsta = new QButtonP($this);
        $this->btnExpoEsta->Text = '<i class="fa fa-file-excel-o fa-lg"></i> Estadis. Guias';
        $this->btnExpoEsta->ActionParameter = "E";
        $this->btnExpoEsta->HtmlEntities = false;
        $this->btnExpoEsta->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
    }

    protected function txtSepaColu_Create() {
        $this->txtSepaColu = new QTextBox($this);    
        $this->txtSepaColu->Text = ';';    
        $this->txtSepaColu->Name = 'Separador de Columnas';
        $this->txtSepaColu->Width = 30;
        $this->txtSepaColu->HtmlAfter = ' (solo p/Excel)';
        $this->txtSepaColu->ToolTip = 'Separador de Columnas para el archivo Excel';
    }
    
    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function lstCodiOrig_Change() {
        if (!is_null($this->lstCodiOrig->SelectedValue)) {
            $this->lstReceOrig->RemoveAllItems();
            $arrReceOrig = Counter::LoadArrayBySucursalId($this->lstCodiOrig->SelectedValue);
            if (count($arrReceOrig) > 0) {
                $this->lstReceOrig->AddItem('- Seleccione Uno - ('.count($arrReceOrig).')');
                foreach ($arrReceOrig as $objReceOrig) {
                    $this->lstReceOrig->AddItem($objReceOrig->__toString(), $objReceOrig->Siglas);
                }
                $this->lstReceOrig->Visible = true;
            } else {
                $this->lstReceOrig->Visible = false;
            }
        } else {
            $this->lstReceOrig->Visible = false;
        }
    }

    protected function obtenerGuiasDeLaMaster($strNumeMast) {
        $strCadeSqlx  = "select nume_guia ";
        $strCadeSqlx .= "  from sde_contenedor_guia_assn ";
        $strCadeSqlx .= " where nume_cont = '".$strNumeMast."'";
        $objDatabase = SdeContenedor::GetDatabase();
        $objDbResult = $objDatabase->Query($strCadeSqlx);
        $arrGuiaMast = array();
        while ($mixRegistro = $objDbResult->FetchArray()) {
            $arrGuiaMast[] = $mixRegistro['nume_guia'];
        }
        return $arrGuiaMast;
    }

    protected function lstCodiDest_Change() {
        $this->lstCodiRece->Visible = true;
        $this->lstCodiRece->RemoveAllItems();
        $this->lstCodiRece->AddItem("- Seleccione Uno -", null);
        $arrReceSucu = Counter::LoadArrayBySucursalId($this->lstCodiDest->SelectedValue);
        $this->lstCodiRece->AddItem('DOMICILIO', 'DOM');
        foreach ($arrReceSucu as $objReceptoria) {
            if ($objReceptoria->StatusId == StatusType::ACTIVO) {
                $this->lstCodiRece->AddItem($objReceptoria->__toString(), $objReceptoria);
            }
        }
    }

    protected function txtCodiInte_Blur() {
        if (strlen($this->txtCodiInte->Text)) {
            $this->txtNombBusc->Text = '';
            $this->txtCodiInte->Text = strtoupper($this->txtCodiInte->Text);
            $this->lstCodiClie->RemoveAllItems();
            //-------------------------------------------------------------------------------------
            // Se busca el Cliente cuyo Codigo Interno coincida con el valor dado por el Usuario
            //-------------------------------------------------------------------------------------
            $objCliente = MasterCliente::LoadByCodigoInterno($this->txtCodiInte->Text);
            if ($objCliente) {
                $this->lstCodiClie->AddItem($objCliente->__toStringConCodigoInterno(), $objCliente->CodiClie,true);
            } else {
                $this->mensaje('No Existe Cliente con este Codigo','','w','i','exclamation-triangle');
            }
        }
    }

    protected function txtNombBusc_Blur() {
        if (strlen($this->txtNombBusc->Text)) {
            $this->txtCodiInte->Text = '';
            $this->txtNombBusc->Text = strtoupper($this->txtNombBusc->Text);
            $this->lstCodiClie->RemoveAllItems();
            $objCondicion= QQ::Clause();
            $objCondicion[] = QQ::Like(QQN::MasterCliente()->NombClie,'%'.trim($this->txtNombBusc->Text).'%');
            //------------------------------------------------------------------------------
            // Se buscan Clientes cuyo nombre coincida con el criterio dado por el Usuario
            //------------------------------------------------------------------------------
            $arrClieMost = MasterCliente::QueryArray(QQ::AndCondition($objCondicion),QQ::Clause(QQ::OrderBy(QQN::MasterCliente()->NombClie)));
            if (count($arrClieMost)) {
                if (count($arrClieMost) > 1) {
                    //-----------------------------------------------
                    // Si hay mas de uno, se lo advierto al Usuario
                    //-----------------------------------------------
                    $this->lstCodiClie->AddItem(QApplication::Translate('- Seleccione Uno - ')."(".count($arrClieMost).")",null);
                }
                foreach ($arrClieMost as $objCliente) {
                    $this->lstCodiClie->AddItem($objCliente->__toStringConCodigoInterno(), $objCliente->CodiClie);
                }
                if ($this->lstCodiClie->ItemCount == 1) {
                    //---------------------------------------------------------------------
                    // Si solo existe un Cliente, se carga la informacion automaticamente
                    //---------------------------------------------------------------------
                    $this->lstCodiClie->SelectedIndex = 0;
                } else {
                    if ($this->lstCodiClie->ItemCount == 0) {
                        $this->mensaje('No existen Clientes que satisfagan la condicion','','w','i','exclamation-triangle');
                    }
                }
            } else {
                $this->mensaje('No existen Clientes que satisfagan la condicion','','w','i','exclamation-triangle');
            }
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        $objUsuaPodx = null;
        $objUsuaCrea = null;
        $strMensMost = '';
        $strCadeSqlx = "
            select g.nume_guia,
                   g.guia_externa,
                   g.cliente_id,
                   m.codigo_interno,
                   date_format(g.fech_guia, '%Y-%m-%d') fech_guia,
                   g.esta_orig,
                   g.receptoria_origen,
                   g.esta_dest,
                   g.receptoria_destino,
                   substring(t.descripcion,1,3) modalidad_pago,
                   if (g.sistema_id = 'int', g.dire_remi, g.nomb_remi) remitente,
                   g.nomb_dest,
                   g.peso_guia,
                   g.cant_ayudantes peso_volum,
                   g.cant_piez,
                   g.valor_declarado,
                   g.entregado_a,
                   date_format(g.fecha_entrega, '%Y-%m-%d') fecha_entrega,
                   g.hora_entrega,
                   date_format(g.fecha_pod, '%Y-%m-%d') fecha_pod,
                   g.codi_ckpt,
                   g.esta_ckpt,
                   date_format(g.fech_ckpt, '%Y-%m-%d') fech_ckpt,
                   g.hora_ckpt,
                   u.logi_usua usua_ckpt,
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
                   g.sistema_id,
                   c.email,
                   g.desc_cont,
                   g.observacion
              from guia g left join cliente_i c
                on g.cliente_id = c.id
                   left join master_cliente m
                on m.codi_clie = g.codi_clie
                   inner join tipo_guia_type t
                on g.tipo_guia = t.id
                   left join usuario u
                on g.usua_ckpt = u.codi_usua
                   left join fac_tarifa ta
                on g.tarifa_id = ta.id
             where 1 = 1
        ";
        $objClausula = QQ::Clause();
        //------------------------------------------------------------------------------
        // Antes de armar el SQL, se verifica si se ha seteado un usuario en particular
        //------------------------------------------------------------------------------
        if (strlen($this->txtUsuaPodx->Text)) {
            //---------------------------------------------------------------------
            // Se trata de un usuario quien ha registrado el POD de la(s) guía(s).
            //---------------------------------------------------------------------
            $objUsuaPodx = Usuario::LoadByLogiUsua($this->txtUsuaPodx->Text);
            if (!$objUsuaPodx) {
                $this->mensaje('El Usuario <b>'.$this->txtUsuaPodx->Text.'</b> no existe!','','d','i','hand-stop-o');
                $blnTodoOkey = false;
            }
        }
        if (strlen($this->txtUsuaCrea->Text)) {
            //--------------------------------------------------
            // Se trata de un usuario creador de la(s) guía(s).
            //--------------------------------------------------
            $objUsuaCrea = Usuario::LoadByLogiUsua($this->txtUsuaCrea->Text);
            if (!$objUsuaCrea) {
                $this->mensaje('El Usuario <b>'.$this->txtUsuaCrea->Text.'</b> no existe!','','d','i','hand-stop-o');
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //--------------------------------------------------------------------------------------------------
            // Se Arma el SQL para la busqueda de registros, comenzando con la determinación del tipo de envío.
            //--------------------------------------------------------------------------------------------------
            if (strlen($this->txtNumeGuia->Text)) {
                $objClausula[] = QQ::Equal(QQN::Guia()->NumeGuia,DejarSoloLosNumeros($this->txtNumeGuia->Text));
                $strCadeSqlx  .= " and g.nume_guia = '".$this->txtNumeGuia->Text."'";
            }
            if (strlen($this->txtGuiaExte->Text)) {
                $objClausula[] = QQ::Like(QQN::Guia()->GuiaExterna,"%".$this->txtGuiaExte->Text."%");
                $strCadeSqlx  .= " and g.guia_externa = '".$this->txtGuiaExte->Text."'";
            }
            if (strlen($this->txtNumeMast->Text) > 0) {
                $objGuiaMast = SdeContenedor::Load($this->txtNumeMast->Text);
                if ($objGuiaMast) {
                    $arrNumeGuia = $this->obtenerGuiasDeLaMaster($this->txtNumeMast->Text);
                    if (count($arrNumeGuia) > 0) {
                        $objClausula[] = QQ::In(QQN::Guia()->NumeGuia,$arrNumeGuia);
                        $strCadeGuia = implode("','",$arrNumeGuia);
                        $strCadeSqlx .= " and g.nume_guia in ('$strCadeGuia')";
                    }
                }
            }
            if (!is_null($this->lstCodiClie->SelectedValue) && (!$this->chkInclSubc->Checked)) {
                $objClausula[] = QQ::Equal(QQN::Guia()->CodiClie,$this->lstCodiClie->SelectedValue);
                $strCadeSqlx  .= " and g.codi_clie = ".$this->lstCodiClie->SelectedValue;
            }
            if ($this->chkInclSubc->Checked) {
                if (!is_null($this->lstCodiClie->SelectedValue)) {
                    $objClieSele   = MasterCliente::Load($this->lstCodiClie->SelectedValue);
                    if ($objClieSele->tieneSubCuentas()) {
                        $arrSubcClie   = $objClieSele->subCuentas();
                        array_push($arrSubcClie,$objClieSele->CodiClie);
                        $strSubcClie   = implode(',',$arrSubcClie);
                        $objClausula[] = QQ::In(QQN::Guia()->CodiClie,$arrSubcClie);
                        $strCadeSqlx  .= " or g.codi_clie in ($strSubcClie)";
                    }
                }
            }
            if (strlen($this->txtNumeMast->Text) > 0) {
                $objGuiaMast = SdeContenedor::Load($this->txtNumeMast->Text);
                if ($objGuiaMast) {
                    $arrNumeGuia = $this->obtenerGuiasDeLaMaster($this->txtNumeMast->Text);
                    if (count($arrNumeGuia) > 0) {
                        $objClausula[] = QQ::In(QQN::Guia()->NumeGuia,$arrNumeGuia);
                        $strCadeGuia = implode("','",$arrNumeGuia);
                        $strCadeSqlx .= " and g.nume_guia in ('$strCadeGuia')";
                    }
                }
            }
            if (!is_null($this->calFechInic->DateTime)) {
                $objClausula[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$this->calFechInic->DateTime);
                $strCadeSqlx  .= " and g.fech_guia >= '".$this->calFechInic->DateTime->__toString("YYYY-MM-DD")."'";
            }
            if (!is_null($this->calFechFina->DateTime)) {
                $objClausula[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$this->calFechFina->DateTime);
                $strCadeSqlx  .= " and g.fech_guia <= '".$this->calFechFina->DateTime->__toString("YYYY-MM-DD")."'";
            }
            if (strlen($this->txtNumePrec->Text) > 0) {
                //-----------------------------------------------------------------
                // Se busca el contenedor de la(s) guía(s) con el precinto seteado.
                //-----------------------------------------------------------------
                $objManiSelec = SdeContenedor::Load($this->txtNumePrec->Text);
                if ($objManiSelec) {
                    //------------------------------------------
                    // Se obtienen la(s) guía(s) del contenedor
                    //------------------------------------------
                    $arrGuiaPrec = $objManiSelec->GetGuiaArray();
                    if ($arrGuiaPrec) {
                        //----------------------------------------------------------------------
                        // Si el contenedor realmente tiene guía(s), se obtiene(n) una por una.
                        //----------------------------------------------------------------------
                        $arrNumeGuia = array();
                        foreach ($arrGuiaPrec as $objManiSelec) {
                            $arrNumeGuia[] = $objManiSelec->NumeGuia;
                        }
                        $strCadeGuia = implode("','",$arrNumeGuia);
                        $strCadeSqlx .= " and g.nume_guia in ('$strCadeGuia')";
                        $objClausula[] = QQ::In(QQN::Guia()->NumeGuia,$arrNumeGuia);
                    } else {
                        $objClausula[] = QQ::Equal(QQN::Guia()->NumeGuia,0);
                    }
                } else {
                    $objClausula[] = QQ::Equal(QQN::Guia()->NumeGuia,0);
                }
            }
            if (!is_null($this->lstTipoPago->SelectedValue)) {
                $objClausula[] = QQ::Equal(QQN::Guia()->TipoGuia, $this->lstTipoPago->SelectedValue);
                $strCadeSqlx  .= " and g.tipo_guia = ".$this->lstTipoPago->SelectedValue;
            }
            if (strlen($this->txtUbicFisi->Text)) {
                $objClausula[] = QQ::Like(QQN::Guia()->Ubicacion,"%".trim($this->txtUbicFisi->Text)."%");
                $strCadeSqlx  .= " and g.ubicacion like '%".$this->txtUbicFisi->Text."%'";
            }
            if (!is_null($this->lstCodiOrig->SelectedValue)) {
                $objClausula[]= QQ::Equal(QQN::Guia()->EstaOrig,$this->lstCodiOrig->SelectedValue);
                $strCadeSqlx  .= " and g.esta_orig = '".$this->lstCodiOrig->SelectedValue."'";
            }
            if (!is_null($this->lstReceOrig->SelectedValue)) {
                $objClausula[]= QQ::Equal(QQN::Guia()->ReceptoriaOrigen,$this->lstReceOrig->SelectedValue);
                $strCadeSqlx  .= " and g.receptoria_origen = '".$this->lstReceOrig->SelectedValue."'";
            }
            if (!is_null($this->lstCodiDest->SelectedValue)) {
                $objClausula[]= QQ::Equal(QQN::Guia()->EstaDest,$this->lstCodiDest->SelectedValue);
                $strCadeSqlx  .= " and g.esta_dest = '".$this->lstCodiDest->SelectedValue."'";
            }
            if (!is_null($this->lstCodiRece->SelectedValue)) {
                if ($this->lstCodiRece->SelectedValue instanceof Counter) {
                    $strReceDest = $this->lstCodiRece->SelectedValue->Siglas;
                } else {
                    $strReceDest = $this->lstCodiRece->SelectedValue;
                    if ($strReceDest == 'DOM') {
                        $strReceDest = '';
                    }
                }
                $objClausula[]= QQ::Equal(QQN::Guia()->ReceptoriaDestino,$strReceDest);
                $strCadeSqlx  .= " and g.receptoria_destino = '".$strReceDest."'";
            }
            if (strlen($this->txtNombRemi->Text)) {
                $objClausula[] = QQ::Like(QQN::Guia()->NombRemi,trim($this->txtNombRemi->Text).'%');
                $strCadeSqlx  .= " and g.nomb_remi like '".$this->txtNombRemi->Text."%'";
            }
            if (strlen($this->txtNombDest->Text)) {
                $objClausula[] = QQ::Like(QQN::Guia()->NombDest,trim($this->txtNombDest->Text).'%');
                $strCadeSqlx  .= " and g.nomb_dest like '".$this->txtNombDest->Text."%'";
            }
            if (!is_null($this->lstCodiVend->SelectedValue)) {
                $objClausula[] = QQ::Equal(QQN::Guia()->CodiClieObject->VendedorId,$this->lstCodiVend->SelectedValue);
                $strCadeSqlx  .= " and m.vendedor_id = ".$this->lstCodiVend->SelectedValue;
            }
            if ($this->chkPesoVolu->Checked) {
                $intPesoVolu = (int)$this->chkPesoVolu->Checked;
                $objClausula[] = QQ::Equal(QQN::Guia()->CantAyudantes,$intPesoVolu);
                $strCadeSqlx  .= " and g.cant_ayudantes = $intPesoVolu";
            }
            if (!is_null($this->calEntrInic->DateTime)) {
                $objClausula[] = QQ::GreaterOrEqual(QQN::Guia()->FechaEntrega,$this->calEntrInic->DateTime);
                $strCadeSqlx  .= " and g.fecha_entrega >= '".$this->calEntrInic->DateTime->__toString("YYYY-MM-DD")."'";
            }
            if (!is_null($this->calEntrFina->DateTime)) {
                $objClausula[] = QQ::LessOrEqual(QQN::Guia()->FechaEntrega,$this->calEntrFina->DateTime);
                $strCadeSqlx  .= " and g.fecha_entrega <= '".$this->calEntrFina->DateTime->__toString("YYYY-MM-DD")."'";
            }
            if (!is_null($this->rdbTienPodx->SelectedValue)) {
                if ($this->rdbTienPodx->SelectedValue == 'SI') {
                    $objClausula[] = QQ::Equal(QQN::Guia()->CodiCkpt,'OK');
                    $strCadeSqlx  .= " and g.codi_ckpt = 'OK'";
                    if (!is_null($this->lstCodiRece->SelectedValue)) {
                        $objReceptoria = $this->lstCodiRece->SelectedValue;
                        $strComeRece = "ENTREGADO POR TAQUILLA (".$objReceptoria->Siglas.")";
                        $strCadeSqlx .= " and exists (select null 
                                                        from guia_ckpt k
                                                       where k.nume_guia = g.nume_guia 
                                                         and k.codi_ckpt = 'OK'
                                                         and k.text_obse = '$strComeRece') ";
                    }
                } else {
                    $objClausula[] = QQ::NotEqual(QQN::Guia()->CodiCkpt,'OK');
                    $strCadeSqlx  .= " and g.codi_ckpt != 'OK'";
                }
            }
            //if ((!is_null($this->calFechTrx1->DateTime)) && (!is_null($this->calFechTrx2->DateTime))) {
            //    $dttFechInic   = $this->calFechTrx1->DateTime->__toString("YYYY-MM-DD");
            //    $dttFechFina   = $this->calFechTrx2->DateTime->__toString("YYYY-MM-DD");
            //    $objClausula[] = QQ::Equal(QQN::Guia()->GuiaCkptAsNume->CodiCkpt,'TR');
            //    $objClausula[] = QQ::Between(QQN::Guia()->GuiaCkptAsNume->FechCkpt,$dttFechInic,$dttFechFina);
            //    $strCadeSqlx  .= " and exists (select null
            //                                     from guia_ckpt k
            //                                    where k.nume_guia = g.nume_guia
            //                                      and k.codi_ckpt = 'TR'
            //                                      and k.fech_ckpt between '$dttFechInic' and '$dttFechFina') ";
            //}
            if (strlen($this->txtUsuaPodx->Text)) {
                $objClausula[] = QQ::Like(QQN::Guia()->UsuarioPod,$objUsuaPodx->CodiUsua);
                $strCadeSqlx  .= " and g.usuario_pod = ".$objUsuaPodx->CodiUsua;
            }
            if (strlen($this->txtUsuaCrea->Text)) {
                $objClausula[] = QQ::Like(QQN::Guia()->UsuarioCreacion,trim($objUsuaCrea->CodiUsua).'%');
                $strCadeSqlx  .= " and g.usuario_creacion like '".$objUsuaCrea->CodiUsua."%'";
            }
            if (!is_null($this->lstCodiCkpt->SelectedValue)) {
                $objClausula[] = QQ::Equal(QQN::Guia()->CodiCkpt,$this->lstCodiCkpt->SelectedValue);
                $strCadeSqlx  .= " and g.codi_ckpt = '".$this->lstCodiCkpt->SelectedValue."'";
            }
            if (!is_null($this->lstTariIdxx->SelectedValue)) {
                $objClausula[] = QQ::Equal(QQN::Guia()->TarifaId,$this->lstTariIdxx->SelectedValue);
                $strCadeSqlx  .= " and g.tarifa_id = ".$this->lstTariIdxx->SelectedValue;
            }
            if ($this->chkConxDesc->Checked) {
                $objClausula[] = QQ::GreaterThan(QQN::Guia()->MontoDscto,0);
                $strCadeSqlx  .= " and g.monto_dscto >= 0";
            }
            $objClausula[] = QQ::Equal(QQN::Guia()->Anulada,0);
            $strCadeSqlx  .= " and g.anulada = 0 ";
            if ($this->chkMostQuer->Checked) {
                echo $strCadeSqlx;
                return;
            }
            if (count($objClausula) > 1){
                $intHayxRegi = Guia::QueryCount(QQ::AndCondition($objClausula));
                if ($intHayxRegi > 0) {
                    if ($intHayxRegi > 3500 && $strParameter != 'K') {
                        unset($_SESSION['Criterio']);
                        $strMensMost = 'Existen +3500 registros que satisfacen la consulta. Por favor sea más específico.
                        ';
                    } else {
                        switch ($strParameter) {
                            case 'B':
                                $_SESSION['CritCons'] = serialize($objClausula);
                                $_SESSION['TablCrit'] = 'Guia';
                                $_SESSION['ProgEspe'] = basename($_SERVER['SCRIPT_FILENAME']);
                                QApplication::Redirect('guia_list.php');
                                break;
                            case 'K':
                                //-------------------
                                // Reporte en Excel
                                //-------------------
                                $_SESSION['SepaColu'] = ';';
                                $strSepaColu = $this->txtSepaColu->Text;
                                if (strlen($strSepaColu) > 0) {
                                    if (in_array($strSepaColu,array(',',';','|','*'))) {
                                        $_SESSION['SepaColu'] = $strSepaColu;
                                    }
                                }
                                $_SESSION['CondWher'] = serialize($objClausula);
                                $_SESSION['CritSqlx'] = serialize($strCadeSqlx);
                                QApplication::Redirect('repo_guias_xls_sql.php');
                                break;
                            default:
                                $strMensMost = 'No se ha definido el Formato del Reporte!';
                                break;
                        }
                    }
                } else {
                    unset($_SESSION['Criterio']);
                    $strMensMost = 'No existen registros que satisfagan las condiciones!';
                }
            } else {
                unset($_SESSION['Criterio']);
                $strMensMost = 'Debe proporcionar al menos un Criterio de Búsqueda!';
            }
        }
        $this->mensaje($strMensMost,'','d','i',__iHAND__);
    }
}

GuiaSearchForm::Run('GuiaSearchForm');
?>