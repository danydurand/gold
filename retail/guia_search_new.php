<?php
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class GuiaSearchNewForm extends FormularioBaseKaizen {
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
    protected $lstFormPago;
    protected $lstCodiOrig;
    protected $lstCodiDest;
    protected $lstReceDest;
    protected $txtNombRemi;
    protected $txtNombDest;
    protected $lstCodiVend;
    protected $lstCodiProd;
    protected $txtNotaEntr;
    protected $calEntrInic;
    protected $calEntrFina;
    protected $rdbTienPodx;
    protected $chkPesoVolu;
    protected $txtUsuaCrea;
    protected $txtUbicFisi;
    protected $btnExceFact;
    protected $btnExceReta;
    protected $lstReceOrig;

    // Zona 3
    protected $lstTariIdxx;
    protected $calFechTrx1;
    protected $calFechTrx2;
    protected $txtUsuaPodx;
    protected $txtRefeFact;
    protected $lstCodiCkpt;
    protected $txtSepaColu;
    protected $chkConxDesc;
    protected $chkMostQuer;


    protected function Form_Create() {
        parent::Form_Create();

        //$this->SetupValores();

        $this->arrRegiSucu = Sucursales::LoadAll();
        $this->intCantSucu = count($this->arrRegiSucu);

        $this->lblTituForm->Text = QApplication::Translate('Buscar Guía');
        
        $this->txtNumeGuia_Create();
        $this->txtGuiaExte_Create();
        $this->txtCodiInte_Create();
        $this->txtNombBusc_Create();
        $this->lstCodiClie_Create();
        $this->lstCodiProd_Create();
        $this->txtNotaEntr_Create();

        $this->txtNumeMast_Create();
        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->lstFormPago_Create();
        $this->lstCodiOrig_Create();
        $this->lstReceOrig_Create();
        $this->lstCodiDest_Create();
        $this->lstReceDest_Create();
        $this->lstCodiVend_Create();
        $this->rdbTienPodx_Create();
        $this->calEntrInic_Create();
        $this->calEntrFina_Create();
        $this->lstTariIdxx_Create();
        $this->txtUsuaPodx_Create();
        $this->txtRefeFact_Create();
        //$this->txtUsuaCrea_Create();
        $this->txtUbicFisi_Create();
        //$this->lstCodiCkpt_Create();
        $this->chkMostQuer_Create();
        //$this->chkConxDesc_Create();
        $this->chkInclSubc_Create();

        // Botónes del Formulario //
        
        $this->btnSave->Text = TextoIcono('search fa-lg','Buscar');
        $this->btnSave->ActionParameter = "B";
        $this->btnExceFact_Create();
        $this->btnExceReta_Create();
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
        $this->txtGuiaExte->Name = QApplication::Translate('Guía Cliente');
        $this->txtGuiaExte->Width = 181;
        $this->txtGuiaExte->AddAction(new QFocusOutEvent(), new QAjaxAction('txtGuiaExte_FocusOut'));
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

    protected function txtNumeMast_Create() {
        $this->txtNumeMast = new QTextBox($this);
        $this->txtNumeMast->Name = 'Manifiesto de Ruta';
        $this->txtNumeMast->Width = 181;
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

    protected function lstFormPago_Create() {
        $this->lstFormPago = new QListBox($this);
        $this->lstFormPago->Name = QApplication::Translate('Forma de Pago');
        $this->lstFormPago->Width = 140;
        $this->lstFormPago->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstFormPago->AddItem(QApplication::Translate('PPD'), 'PPD');
        $this->lstFormPago->AddItem(QApplication::Translate('CRD'), 'CRD');
        $this->lstFormPago->AddItem(QApplication::Translate('COD'), 'COD');
    }

    protected function lstCodiOrig_Create() {
        $this->lstCodiOrig = new QListBox($this);
        $this->lstCodiOrig->Name = QApplication::Translate('Origen');
        $this->lstCodiOrig->Width = 180;
        $this->lstCodiOrig->AddItem(QApplication::Translate('- Seleccione Uno - ('.$this->intCantSucu.')'),null);
        foreach ($this->arrRegiSucu as $objSucursal) {
            $this->lstCodiOrig->AddItem($objSucursal->__toString(),$objSucursal->Id);
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
            $this->lstCodiDest->AddItem($objSucursal->__toString(),$objSucursal->Id);
        }
        $this->lstCodiDest->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiDest_Change'));
    }

    protected function lstReceDest_Create() {
        $this->lstReceDest = new QListBox($this);
        $this->lstReceDest->Name = QApplication::Translate('Recept. Dest.');
        $this->lstReceDest->Width = 180;
        $this->lstReceDest->Visible = false;
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

    protected function lstCodiProd_Create() {
        $this->lstCodiProd = new QListBox($this);
        $this->lstCodiProd->Name = QApplication::Translate('Producto');
        $this->lstCodiProd->Width = 180;
        $arrProdActi = Productos::LoadAll();
        $intCantProd = count($arrProdActi);
        $this->lstCodiProd->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intCantProd.')'),null);
        //--------------------------------------------------------
        // Se obtiene solamente los productos que están activos.
        //--------------------------------------------------------
        foreach ($arrProdActi as $objProducto) {
            $this->lstCodiProd->AddItem($objProducto->__toString(),$objProducto->Id);
        }
    }

    protected function txtNotaEntr_Create() {
        $this->txtNotaEntr = new QTextBox($this);
        $this->txtNotaEntr->Name = 'Manif. Recepción';
        $this->txtNotaEntr->Width = 180;
    }



    protected function rdbTienPodx_Create() {
        $this->rdbTienPodx = new QRadioButtonList($this);
        $this->rdbTienPodx->Name = QApplication::Translate('Tiene POD ?');
        $this->rdbTienPodx->AddItem('&nbsp;SI&nbsp;&nbsp;','SI');
        $this->rdbTienPodx->AddItem('&nbsp;NO&nbsp;&nbsp;','NO');
        $this->rdbTienPodx->RepeatColumns = 2;
        $this->rdbTienPodx->HtmlEntities = false;
    }

    protected function txtUsuaPodx_Create() {
        $this->txtUsuaPodx = new QTextBox($this);
        $this->txtUsuaPodx->Name = 'POD Registrado por';
        $this->txtUsuaPodx->Width = 100;
        $this->txtUsuaPodx->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
    }

    protected function txtRefeFact_Create() {
        $this->txtRefeFact = new QTextBox($this);
        $this->txtRefeFact->Name = 'Factura';
        $this->txtRefeFact->Width = 100;
    }

    protected function txtUbicFisi_Create() {
        $this->txtUbicFisi = new QTextBox($this);
        $this->txtUbicFisi->Name = 'Ubicación Física';
        $this->txtUbicFisi->Placeholder = 'Ubicación en Almacén';
        $this->txtUbicFisi->Width = 150;
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

    protected function btnExceFact_Create() {
        $this->btnExceFact = new QButton($this);
        $this->btnExceFact->Text = '<i class="fa fa-download fa-lg"></i> XLS-Fact';
        $this->btnExceFact->ActionParameter = "F";
        $this->btnExceFact->HtmlEntities = false;
        $this->btnExceFact->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnExceFact->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
    }

    protected function btnExceReta_Create() {
        $this->btnExceReta = new QButtonP($this);
        $this->btnExceReta->Text = '<i class="fa fa-download fa-lg"></i> XLS-Retail';
        $this->btnExceReta->ActionParameter = "R";
        $this->btnExceReta->HtmlEntities = false;
        $this->btnExceReta->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExceReta->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
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

    protected function txtGuiaExte_FocusOut() {
        if (strlen($this->txtGuiaExte->Text) > 0) {
            $this->txtGuiaExte->Text = transformar($this->txtGuiaExte->Text);
        }
    }

    protected function lstCodiOrig_Change() {
        /**
         * @var $objReceOrig Counter
         */
        if (!is_null($this->lstCodiOrig->SelectedValue)) {
            $this->lstReceOrig->RemoveAllItems();
            $arrReceOrig = Counter::LoadArrayBySucursalId($this->lstCodiOrig->SelectedValue);
            if (count($arrReceOrig) > 0) {
                $this->lstReceOrig->AddItem('- Seleccione Uno - ('.count($arrReceOrig).')');
                foreach ($arrReceOrig as $objReceOrig) {
                    $this->lstReceOrig->AddItem($objReceOrig->__toString(), $objReceOrig->Id);
                }
                $this->lstReceOrig->Visible = true;
            } else {
                $this->lstReceOrig->Visible = false;
            }
        } else {
            $this->lstReceOrig->Visible = false;
        }
    }

    protected function lstCodiDest_Change() {
        /**
         * @var $objReceptoria Counter
         */
        $this->lstReceDest->Visible = true;
        $this->lstReceDest->RemoveAllItems();
        $this->lstReceDest->AddItem("- Seleccione Uno -", null);
        $arrReceSucu = Counter::LoadArrayBySucursalId($this->lstCodiDest->SelectedValue);
        foreach ($arrReceSucu as $objReceptoria) {
            if ($objReceptoria->StatusId == StatusType::ACTIVO) {
                $this->lstReceDest->AddItem($objReceptoria->__toString(), $objReceptoria->Id);
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
        $this->mensaje();
        $objUsuaPodx = null;
        $objUsuaCrea = null;
        $strMensMost = '';
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
                   g.forma_pago,
                   g.nombre_remitente remitente,
                   g.nombre_destinatario,
                   g.kilos,
                   g.volumen,
                   g.piezas,
                   g.valor_declarado,
                   ne.referencia,
                   g.contenido,
                   ta.descripcion
              from guias g left join clientes_retail c
                on g.cliente_retail_id = c.id
                   left join master_cliente m
                on m.codi_clie = g.cliente_corp_id
                   left join usuario u
                on g.created_by = u.codi_usua
                   left join fac_tarifa ta
                on g.tarifa_id = ta.id
                   left join nota_entrega ne 
                on g.nota_entrega_id = ne.id
             where 1 = 1
        ";
        $objClausula = QQ::Clause();
        //------------------------------------------------------------------------------
        // Antes de armar el SQL, se verifica si se ha seteado un usuario en particular
        //------------------------------------------------------------------------------
        $blnTodoOkey = true;
        $intUsuaPodx = null;
        if (strlen($this->txtUsuaPodx->Text)) {
            $strLogiUsua = trim($this->txtUsuaPodx->Text);
            //---------------------------------------------------------------------------
            // Se determina la existencia de un Usuario o un Chofer cuyo login coincida
            //---------------------------------------------------------------------------
            $objUsuaPodx = Usuario::LoadByLogiUsua($strLogiUsua);
            if (!$objUsuaPodx) {
                $objUsuaPodx = Chofer::LoadByLogin($strLogiUsua);
                if (!$objUsuaPodx) {
                    $strMensMost = 'No existe Usuario o Chofer con el login: <b>'.$strLogiUsua.'</b> !';
                    $blnTodoOkey = false;
                } else {
                    $intUsuaPodx = $objUsuaPodx->CodiChof;
                }
            } else {
                $intUsuaPodx = $objUsuaPodx->CodiUsua;
            }
        }
        $intRefeFact   = null;
        if (strlen($this->txtRefeFact->Text)) {
            $strRefeFact = trim($this->txtRefeFact->Text);
            //---------------------------------------------------------------------------
            // Se determina la existencia de la Factura indicada por el Usuario
            //---------------------------------------------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Facturas()->Referencia,$strRefeFact);
            $objAdicClau   = QQ::Clause();
            $objAdicClau[] = QQ::LimitInfo(1);
            $arrRefeFact   = Facturas::QueryArray(QQ::AndCondition($objClauWher),$objAdicClau);
            if (count($arrRefeFact) == 0) {
                $strMensMost = 'No existe Factura con la Referencia: <b>'.$strRefeFact.'</b> !';
                $blnTodoOkey = false;
            } else {
                $intRefeFact = $arrRefeFact[0]->Id;
            }
        }
        if ($blnTodoOkey) {
            //--------------------------------------------------------------------------------------------------
            // Se Arma el SQL para la busqueda de registros, comenzando con la determinación del tipo de envío.
            //--------------------------------------------------------------------------------------------------
            if (strlen($this->txtNumeGuia->Text)) {
                $objClausula[] = QQ::Equal(QQN::Guias()->Numero,DejarSoloLosNumeros($this->txtNumeGuia->Text));
                $strCadeSqlx  .= " and g.numero = '".$this->txtNumeGuia->Text."'";
            }
            if (strlen($this->txtGuiaExte->Text)) {
                $objClausula[] = QQ::Like(QQN::Guias()->Tracking,"%".$this->txtGuiaExte->Text."%");
                $strCadeSqlx  .= " and g.tracking = '".$this->txtGuiaExte->Text."'";
            }
            if (!is_null($this->lstCodiClie->SelectedValue) && (!$this->chkInclSubc->Checked)) {
                $objClausula[] = QQ::Equal(QQN::Guias()->ClienteCorpId,$this->lstCodiClie->SelectedValue);
                $strCadeSqlx  .= " and g.cliente_corp_id = ".$this->lstCodiClie->SelectedValue;
            }
            if (!is_null($this->lstCodiProd->SelectedValue) && (!$this->chkInclSubc->Checked)) {
                $objClausula[] = QQ::Equal(QQN::Guias()->ProductoId,$this->lstCodiProd->SelectedValue);
                $strCadeSqlx  .= " and g.producto_id = ".$this->lstCodiProd->SelectedValue;
            }
            if (strlen($this->txtNotaEntr->Text) > 0) {
                //--------------------------
                // Manifiesto de Recepcion
                //--------------------------
                $objClausula[] = QQ::Equal(QQN::Guias()->NotaEntrega->Referencia,$this->txtNotaEntr->Text);
                $strCadeSqlx  .= " and ne.referencia = ".$this->txtNotaEntr->Text;
            }
            if (strlen($this->txtNumeMast->Text) > 0) {
                //-------------------------------
                // Manifiesto de Salida a Ruta
                //-------------------------------
                $arrGuiaMast = [];
                $objManiRuta = Containers::LoadByNumero($this->txtNumeMast->Text);
                if ($objManiRuta) {
                    $arrGuiaMast = $objManiRuta->obtenerGuiasDeLaMaster();
                }
                $objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaMast);
                $strCadeSqlx  .= " and g.id in (".implode(',',$arrGuiaMast).')';
            }
            if ($this->chkInclSubc->Checked) {
                if (!is_null($this->lstCodiClie->SelectedValue)) {
                    $objClieSele   = MasterCliente::Load($this->lstCodiClie->SelectedValue);
                    if ($objClieSele->tieneSubCuentas()) {
                        $arrSubcClie   = $objClieSele->subCuentas();
                        array_push($arrSubcClie,$objClieSele->CodiClie);
                        $strSubcClie   = implode(',',$arrSubcClie);
                        $objClausula[] = QQ::In(QQN::Guias()->ClienteCorpId,$arrSubcClie);
                        $strCadeSqlx  .= " or g.cliente_corp_id in ($strSubcClie)";
                    }
                }
            }
            if (!is_null($this->calFechInic->DateTime)) {
                $objClausula[] = QQ::GreaterOrEqual(QQN::Guias()->Fecha,$this->calFechInic->DateTime->__toString("YYYY-MM-DD 00:00:00"));
                $strCadeSqlx  .= " and date(g.fecha) >= '".$this->calFechInic->DateTime->__toString("YYYY-MM-DD")."'";
            }
            if (!is_null($this->calFechFina->DateTime)) {
                $objClausula[] = QQ::LessOrEqual(QQN::Guias()->Fecha,$this->calFechFina->DateTime->__toString("YYYY-MM-DD 23:59:59"));
                $strCadeSqlx  .= " and (g.fecha) <= '".$this->calFechFina->DateTime->__toString("YYYY-MM-DD")."'";
            }
            if (!is_null($this->lstFormPago->SelectedValue)) {
                $objClausula[] = QQ::Equal(QQN::Guias()->FormaPago, $this->lstFormPago->SelectedValue);
                $strCadeSqlx  .= " and g.forma_pago = ".$this->lstFormPago->SelectedValue;
            }
            if (strlen($this->txtUbicFisi->Text)) {
                //----------------------------------------------------------------------------
                // Se identifican las piezas localizadas en la ubicacion dada por el Usuario
                //----------------------------------------------------------------------------
                $arrGuiaIdxx   = GuiaPiezas::EnEstaUbicacion($this->txtUbicFisi->Text);
                $objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaIdxx);
                $strCadeSqlx  .= " and g.id in (".implode(',',$arrGuiaIdxx).")";
            }
            if (!is_null($this->lstCodiOrig->SelectedValue)) {
                $objClausula[]= QQ::Equal(QQN::Guias()->OrigenId,$this->lstCodiOrig->SelectedValue);
                $strCadeSqlx  .= " and g.origen_id = '".$this->lstCodiOrig->SelectedValue."'";
            }
            if (!is_null($this->lstReceOrig->SelectedValue)) {
                $objClausula[]= QQ::Equal(QQN::Guias()->ReceptoriaOrigenId,$this->lstReceOrig->SelectedValue);
                $strCadeSqlx  .= " and g.receptoria_origen_id = '".$this->lstReceOrig->SelectedValue."'";
            }
            if (!is_null($this->lstCodiDest->SelectedValue)) {
                $objClausula[]= QQ::Equal(QQN::Guias()->DestinoId,$this->lstCodiDest->SelectedValue);
                $strCadeSqlx  .= " and g.destino_id = '".$this->lstCodiDest->SelectedValue."'";
            }
            if (!is_null($this->lstReceDest->SelectedValue)) {
                $objClausula[]= QQ::Equal(QQN::Guias()->ReceptoriaDestinoId,$this->lstReceDest->SelectedValue);
                $strCadeSqlx  .= " and g.receptoria_destino_id = '".$this->lstReceDest->SelectedValue."'";
            }
            if (!is_null($this->lstCodiVend->SelectedValue)) {
                $objClausula[] = QQ::Equal(QQN::Guias()->VendedorId,$this->lstCodiVend->SelectedValue);
                $strCadeSqlx  .= " and g.vendedor_id = ".$this->lstCodiVend->SelectedValue;
            }
            if (!is_null($this->calEntrInic->DateTime)) {
                $arrGuiaSele   = Guias::ConCheckpointEnFechaInicial('OK',$this->calEntrInic->DateTime->__toString("YYYY-MM-DD"));
                $objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaSele);
                $strCadeSqlx  .= " and g.id in (".implode(',',$arrGuiaSele).")";
            }
            if (!is_null($this->calEntrFina->DateTime)) {
                $arrGuiaSele   = Guias::ConCheckpointEnFechaFinal('OK',$this->calEntrInic->DateTime->__toString("YYYY-MM-DD"));
                $objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaSele);
                $strCadeSqlx  .= " and g.id in (".implode(',',$arrGuiaSele).")";
            }
            if (strlen($this->txtUsuaPodx->Text)) {
                $arrGuiaSele   = Guias::ConCheckpointRegistradoPor('OK',$intUsuaPodx);
                $objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaSele);
                $strCadeSqlx  .= " and g.id in (".implode(',',$arrGuiaSele).")";
            }
            if (!is_null($intRefeFact)) {
                $objClausula[] = QQ::Equal(QQN::Guias()->FacturaId,$intRefeFact);
                $strCadeSqlx  .= " and g.factura_id = $intRefeFact";
            }
            $objClausula[] = QQ::IsNull(QQN::Guias()->DeletedBy);
            $strCadeSqlx  .= " and g.deleted_by IS NULL ";
            if ($this->chkMostQuer->Checked) {
                echo $strCadeSqlx;
                return;
            }
            if (count($objClausula) > 1){
                $intHayxRegi = Guias::QueryCount(QQ::AndCondition($objClausula));
                if ($intHayxRegi > 0) {
                    if ($intHayxRegi > 3500 && $strParameter != 'K') {
                        unset($_SESSION['Criterio']);
                        $strMensMost = 'Existen +3500 registros que satisfacen la consulta. Por favor sea más específico.
                        ';
                    } else {
                        switch ($strParameter) {
                            case 'B':
                                $_SESSION['CritCons'] = serialize($objClausula);
                                $_SESSION['TablCrit'] = 'Guias';
                                $_SESSION['ProgEspe'] = basename($_SERVER['SCRIPT_FILENAME']);
                                QApplication::Redirect('guias_list.php');
                                break;
                            case 'F':
                                //----------------------
                                // Formato Facturacion
                                //----------------------
                                $_SESSION['SepaColu'] = ';';
                                $strSepaColu = $this->txtSepaColu->Text;
                                if (strlen($strSepaColu) > 0) {
                                    if (in_array($strSepaColu,array(',',';','|','*'))) {
                                        $_SESSION['SepaColu'] = $strSepaColu;
                                    }
                                }
                                $_SESSION['CondWher'] = serialize($objClausula);
                                $_SESSION['CritSqlx'] = serialize($strCadeSqlx);
                                QApplication::Redirect('repo_guias_facturacion.php');
                                break;
                            case 'R':
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
        $this->danger($strMensMost);
    }
}

GuiaSearchNewForm::Run('GuiaSearchNewForm');
?>