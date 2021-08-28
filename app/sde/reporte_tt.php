<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ReporteTt extends FormularioBaseKaizen {
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
    protected $btnExceNorm;
    protected $btnExceReta;
    protected $btnExceFact;
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
    protected $txtGuiaTran;
    protected $chkMostQuer;


    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Reporte TT';

        $this->arrRegiSucu = Sucursales::LoadAll();
        $this->intCantSucu = count($this->arrRegiSucu);

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
        $this->lstCodiOrig_Create();
        $this->lstCodiDest_Create();

        $this->calEntrInic_Create();
        $this->calEntrFina_Create();
        $this->txtUsuaPodx_Create();
        $this->txtGuiaTran_Create();
        $this->chkMostQuer_Create();

        // Botónes del Formulario //
        
        $this->btnSave->Text = TextoIcono('download','XLS','F','lg');
        $this->btnSave->ActionParameter = "B";

        //$this->btnExceFact_Create();
        //$this->btnExceNorm_Create();
        //$this->btnExceReta_Create();
        //$this->txtSepaColu_Create();

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

    protected function calEntrFina_Create() {
        $this->calEntrFina = new QCalendar($this);
        $this->calEntrFina->Name = QApplication::Translate('F. Entrega Final');
        $this->calEntrFina->Width = 100;
    }

    protected function calEntrInic_Create() {
        $this->calEntrInic = new QCalendar($this);
        $this->calEntrInic->Name = QApplication::Translate('F. Entrega Inicial');
        $this->calEntrInic->Width = 100;
    }


    protected function txtUsuaPodx_Create() {
        $this->txtUsuaPodx = new QTextBox($this);
        $this->txtUsuaPodx->Name = 'POD Registrado por';
        $this->txtUsuaPodx->Width = 100;
        $this->txtUsuaPodx->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
    }

    protected function txtGuiaTran_Create() {
        $this->txtGuiaTran = new QTextBox($this);
        $this->txtGuiaTran->Name = 'Guia-Transportista';
        $this->txtGuiaTran->Width = 100;
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
        //if (!is_null($this->lstCodiOrig->SelectedValue)) {
        //    $this->lstReceOrig->RemoveAllItems();
        //    $arrReceOrig = Counter::LoadArrayBySucursalId($this->lstCodiOrig->SelectedValue);
        //    if (count($arrReceOrig) > 0) {
        //        $this->lstReceOrig->AddItem('- Seleccione Uno - ('.count($arrReceOrig).')');
        //        foreach ($arrReceOrig as $objReceOrig) {
        //            $this->lstReceOrig->AddItem($objReceOrig->__toString(), $objReceOrig->Id);
        //        }
        //        $this->lstReceOrig->Visible = true;
        //    } else {
        //        $this->lstReceOrig->Visible = false;
        //    }
        //} else {
        //    $this->lstReceOrig->Visible = false;
        //}
    }

    protected function lstCodiDest_Change() {
        /**
         * @var $objReceptoria Counter
         */
        //$this->lstReceDest->Visible = true;
        //$this->lstReceDest->RemoveAllItems();
        //$this->lstReceDest->AddItem("- Seleccione Uno -", null);
        //$arrReceSucu = Counter::LoadArrayBySucursalId($this->lstCodiDest->SelectedValue);
        //foreach ($arrReceSucu as $objReceptoria) {
        //    if ($objReceptoria->StatusId == StatusType::ACTIVO) {
        //        $this->lstReceDest->AddItem($objReceptoria->__toString(), $objReceptoria->Id);
        //    }
        //}
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
        $objUsuaPodx  = null;
        $objUsuaCrea  = null;
        $strMensMost  = '';
        //-----------------------------------------------------------------------
        // En esta vista residen las guias y sus piezas con informacion general
        //-----------------------------------------------------------------------
        $strQuerInic  = "select *, datediff(fecha_ok,fecha_guia) tt ";
        $strQuerInic .= "  from v_fechas_piezas ";
        $strQuerInic .= " where 1 = 1 ";
        $blnHayxCond  = false;
        $strCadeSqlx  = '';
        //------------------------------------------------------------------------------
        // Antes de armar el SQL, se verifica si se ha seteado un usuario en particular
        //------------------------------------------------------------------------------
        //$intUsuaPodx = null;
        //if (strlen($this->txtUsuaPodx->Text)) {
        //    $strLogiUsua = trim($this->txtUsuaPodx->Text);
        //    //---------------------------------------------------------------------------
        //    // Se determina la existencia de un Usuario o un Chofer cuyo login coincida
        //    //---------------------------------------------------------------------------
        //    $objUsuaPodx = Usuario::LoadByLogiUsua($strLogiUsua);
        //    if (!$objUsuaPodx) {
        //        $objUsuaPodx = Chofer::LoadByLogin($strLogiUsua);
        //        if (!$objUsuaPodx) {
        //            $strMensMost = 'No existe Usuario o Chofer con el login: <b>'.$strLogiUsua.'</b> !';
        //            $this->danger($strMensMost);
        //            return;
        //        } else {
        //            $intUsuaPodx = $objUsuaPodx->CodiChof;
        //        }
        //    } else {
        //        $intUsuaPodx = $objUsuaPodx->CodiUsua;
        //    }
        //    $blnHayxCond = true;
        //}
        //$intGuiaTran = null;
        //if (strlen($this->txtGuiaTran->Text)) {
        //    $strGuiaTran = trim($this->txtGuiaTran->Text);
        //    $objClauWher   = QQ::Clause();
        //    $objClauWher[] = QQ::Equal(QQN::GuiaTransportista()->Guia,$strGuiaTran);
        //    $objAdicClau   = QQ::Clause();
        //    $objAdicClau[] = QQ::LimitInfo(1);
        //    $arrGuiaTran   = GuiaTransportista::QueryArray(QQ::AndCondition($objClauWher),$objAdicClau);
        //    if (count($arrGuiaTran) == 0) {
        //        $strMensMost = 'No existe la Guia-Transportista: <b>'.$strGuiaTran.'</b> !';
        //        $blnTodoOkey = false;
        //    } else {
        //        $intGuiaTran = $arrGuiaTran[0]->GuiaPieza->Guia->Id;
        //    }
        //}
        //-----------------------------------------------
        // Se Arma el SQL para la busqueda de registros
        //-----------------------------------------------
        if (strlen($this->txtNumeGuia->Text)) {
            //$objClausula[] = QQ::Equal(QQN::Guias()->Numero,DejarSoloLosNumeros($this->txtNumeGuia->Text));
            $strCadeSqlx  .= " and numero = '".$this->txtNumeGuia->Text."'";
            $blnHayxCond = true;
        }
        if (strlen($this->txtGuiaExte->Text)) {
            //$objClausula[] = QQ::Like(QQN::Guias()->Tracking,"%".$this->txtGuiaExte->Text."%");
            $strCadeSqlx  .= " and tracking = '".$this->txtGuiaExte->Text."'";
            $blnHayxCond = true;
        }
        if (!is_null($this->lstCodiClie->SelectedValue)) {
            //$objClausula[] = QQ::Equal(QQN::Guias()->ClienteCorpId,$this->lstCodiClie->SelectedValue);
            $strCadeSqlx  .= " and cliente_corp_id = ".$this->lstCodiClie->SelectedValue;
            $blnHayxCond = true;
        }
        if (!is_null($this->lstCodiProd->SelectedValue)) {
            //$objClausula[] = QQ::Equal(QQN::Guias()->ProductoId,$this->lstCodiProd->SelectedValue);
            $strCadeSqlx  .= " and producto_id = ".$this->lstCodiProd->SelectedValue;
            $blnHayxCond = true;
        }
        if (strlen($this->txtNotaEntr->Text) > 0) {
            //--------------------------
            // Manifiesto de Recepcion
            //--------------------------
            //$objClausula[] = QQ::Equal(QQN::Guias()->NotaEntrega->Referencia,$this->txtNotaEntr->Text);
            $strCadeSqlx  .= " and referencia = ".$this->txtNotaEntr->Text;
            $blnHayxCond = true;
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
            //$objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaMast);
            $strCadeSqlx  .= " and guia_id in (".implode(',',$arrGuiaMast).')';
            $blnHayxCond = true;
        }
        if (!is_null($this->calFechInic->DateTime)) {
            //$objClausula[] = QQ::GreaterOrEqual(QQN::Guias()->Fecha,$this->calFechInic->DateTime->__toString("YYYY-MM-DD 00:00:00"));
            $strCadeSqlx  .= " and date(fecha_guia) >= '".$this->calFechInic->DateTime->__toString("YYYY-MM-DD")."'";
            $blnHayxCond = true;
        }
        if (!is_null($this->calFechFina->DateTime)) {
            //$objClausula[] = QQ::LessOrEqual(QQN::Guias()->Fecha,$this->calFechFina->DateTime->__toString("YYYY-MM-DD 23:59:59"));
            $strCadeSqlx  .= " and date(fecha_guia) <= '".$this->calFechFina->DateTime->__toString("YYYY-MM-DD")."'";
            $blnHayxCond = true;
        }
        if (!is_null($this->lstCodiOrig->SelectedValue)) {
            //$objClausula[]= QQ::Equal(QQN::Guias()->OrigenId,$this->lstCodiOrig->SelectedValue);
            $strCadeSqlx  .= " and origen_id = ".$this->lstCodiOrig->SelectedValue;
            $blnHayxCond = true;
        }
        if (!is_null($this->lstCodiDest->SelectedValue)) {
            //$objClausula[]= QQ::Equal(QQN::Guias()->DestinoId,$this->lstCodiDest->SelectedValue);
            $strCadeSqlx  .= " and destino_id = ".$this->lstCodiDest->SelectedValue;
            $blnHayxCond = true;
        }
        if (!is_null($this->calEntrInic->DateTime)) {
            $arrGuiaSele   = Guias::ConCheckpointEnFechaInicial('OK',$this->calEntrInic->DateTime->__toString("YYYY-MM-DD"));
            //$objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaSele);
            $strCadeSqlx  .= " and guia_id in (".implode(',',$arrGuiaSele).")";
            $blnHayxCond = true;
        }
        if (!is_null($this->calEntrFina->DateTime)) {
            $arrGuiaSele   = Guias::ConCheckpointEnFechaFinal('OK',$this->calEntrInic->DateTime->__toString("YYYY-MM-DD"));
            //$objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaSele);
            $strCadeSqlx  .= " and guia_id in (".implode(',',$arrGuiaSele).")";
            $blnHayxCond = true;
        }
        //if (strlen($this->txtUsuaPodx->Text)) {
        //    $arrGuiaSele   = Guias::ConCheckpointRegistradoPor('OK',$intUsuaPodx);
        //    //$objClausula[] = QQ::In(QQN::Guias()->Id,$arrGuiaSele);
        //    $strCadeSqlx  .= " and guia_id in (".implode(',',$arrGuiaSele).")";
        //    $blnHayxCond = true;
        //}
        //if (!is_null($intGuiaTran)) {
        //    $objClausula[] = QQ::Equal(QQN::Guias()->Id,$intGuiaTran);
        //    $strCadeSqlx  .= " and guia_id = $intGuiaTran";
        //}
        //$objClausula[] = QQ::IsNull(QQN::Guias()->DeletedBy);
        $strCadeSqlx  .= " and deleted_by IS NULL ";
        if ($this->chkMostQuer->Checked) {
            echo $strQuerInic.$strCadeSqlx;
            return;
        }
        if (!$blnHayxCond) {
            $strTextMens = 'Debe especificar al menos un critrio de busqueda';
            $this->danger($strTextMens);
            return;
        }
        //---------------------------------------------------------------------------
        // Se verifica la existencia de registros que satisfagan la(s) condicion(es)
        //---------------------------------------------------------------------------
        $strSqlxCoun  = "select count(*) as cant ";
        $strSqlxCoun .= "  from v_fechas_piezas ";
        $strSqlxCoun .= " where 1 = 1 ".$strCadeSqlx;
        t('Query Count: '.$strSqlxCoun);
        $objDatabase  = Guias::GetDatabase();
        $objDbResult  = $objDatabase->Query($strSqlxCoun);
        $mixRegistro  = $objDbResult->FetchArray();
        $intHayxRegi  = $mixRegistro['cant'];
        t('Voy por aqui');
        if ($intHayxRegi == 0) {
            $strTextMens = 'No hay registro que satisfagan la(s) condicion(es)';
            $this->danger($strTextMens);
            return;
        }
        t('Sigo aqui');
        //-------------------------------------------------------------
        // Habiendo registros, se invoca al reporte propiamente dicho
        //-------------------------------------------------------------
        $strQuerFina = $strQuerInic.$strCadeSqlx;
        t('Query Final: '.$strQuerFina);
        $_SESSION['SepaColu'] = '|';
        $_SESSION['CritSqlx'] = serialize($strQuerFina);
        QApplication::Redirect('reporte_tt_xls.php');
    }
}

ReporteTt::Run('ReporteTt');
?>