<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class ArmarManifExpMar extends FormularioBaseKaizen {
    protected $lstOrigMani;
    protected $lstDestMani;
    protected $txtNumeMani;
    protected $txtNumeBlxx;
    protected $calFechDesp;
    protected $calFechCrea;
    protected $txtNumeBook;
    protected $txtCantVali;
    protected $txtCantPiez;
    protected $txtCantVolu;
    protected $txtCantPies;
    protected $txtCreaPorx;
    protected $txtModiPorx;

    protected $objProcEjec;

    protected $txtListNume;  // Lista de Seriales/Guias/Valijas
    protected $dtgPiezApta;  // Piezas aptas para el Manifiesto
    protected $dtgPiezMani;  // Piezas del Manifiesto

    protected $arrListNume;  // Arreglo que contiene los numeros de la lista
    protected $objDataBase;
    protected $arrImprReto;  // Arreglo de Guias de Retorno para Impresion
    protected $dlgMensUsua;
    protected $txtDireEntr;
    protected $txtDescCont;

    protected $btnRepoErro;
    protected $btnImprReto;
    protected $btnExpoExce;

    /* @var $objManifies ManifiestoExp */
    protected $objManifies;
    protected $blnEditMode;
    protected $btnRepoMani;
    protected $strDescCont;

    protected $btnBorrMani;
    protected $lblResuEntr;
    protected $btnSacaMani;
    protected $btnMasxAcci;



    protected function SetupValores() {
        $this->blnEditMode = false;
        $intIdxxCont = QApplication::PathInfo(0);
        if ($intIdxxCont) {
            $this->objManifies = ManifiestoExp::Load($intIdxxCont);
            if ($this->objManifies) {
                $this->blnEditMode = true;
            }
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->lblTituForm->Text = 'Manifiesto Exp MAR';

        $this->dlgMensUsua_Create();

        $this->lstOrigMani_Create();
        $this->lstDestMani_Create();
        $this->txtNumeMani_Create();
        $this->txtNumeBlxx_Create();
        $this->calFechCrea_Create();
        $this->calFechDesp_Create();
        $this->txtNumeBook_Create();
        $this->txtCantVali_Create();
        $this->txtCantPiez_Create();
        $this->txtCantPies_Create();
        $this->txtCantVolu_Create();
        $this->txtCreaPorx_Create();
        $this->txtModiPorx_Create();

        $this->txtListNume_Create();
        $this->dtgPiezApta_Create();
        $this->dtgPiezMani_Create();
        $this->btnRepoMani_Create();

        $this->btnRepoErro_Create();
        $this->btnExpoExce_Create();
        $this->btnBorrMani_Create();
        $this->btnSacaMani_Create();

        $this->lblResuEntr_Create();
        $this->btnMasxAcci_Create();

        $this->lstOrigMani = disableControl($this->lstOrigMani);
        $this->txtNumeMani = disableControl($this->txtNumeMani);
        $this->calFechCrea = disableControl($this->calFechCrea);
        $this->txtCantVali = disableControl($this->txtCantVali);
        $this->txtCantPiez = disableControl($this->txtCantPiez);
        $this->txtCantVolu = disableControl($this->txtCantVolu);
        $this->txtCantPies = disableControl($this->txtCantPies);
        $this->txtCreaPorx = disableControl($this->txtCreaPorx);
        $this->txtModiPorx = disableControl($this->txtModiPorx);

        $this->btnSave->Text = TextoIcono('plus-circle','Agregar','F','lg');
        $this->btnSave->ToolTip = 'Agregar pieza(s) al Manifiesto';

        if ($this->blnEditMode) {
            $objUltiCkpt = $this->objManifies->ultimoCheckpoint();
            if ($objUltiCkpt instanceof ManifiestoExpCkpt) {
                t('Ckpt: '.$objUltiCkpt->Checkpoint->Codigo);
                if ( ($objUltiCkpt->Checkpoint->Codigo == 'DF') && ($this->objUsuario->LogiUsua != 'ddurand') ) {
                    $this->btnSacaMani->Visible = false;
                    $this->btnSave->Visible     = false;
                    $this->btnBorrMani->Visible = false;
                    $strTextMens = 'Manifiesto Despachado.  No admite modificaciones';
                    $this->warning($strTextMens);
                }
            }
        } else {
            $this->btnSacaMani->Visible = false;
            $this->btnBorrMani->Visible = false;
            $this->btnMasxAcci->Visible = false;
            $this->btnExpoExce->Visible = false;
        }
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------


    protected function lblResuEntr_Create() {
        $this->lblResuEntr = new QLabel($this);
        $strResuEntr = 'Piezas Manifestadas';
        $this->lblResuEntr->Text = $strResuEntr;
        $this->lblResuEntr->HtmlEntities = false;
    }

    protected function btnCancel_Create() {
        $this->btnCancel = new QButtonW($this);
        $this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i>';
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->CausesValidation = false;
    }

    protected function btnBorrMani_Create() {
        $this->btnBorrMani = new QButtonD($this);
        $this->btnBorrMani->Text = TextoIcono('trash-o','','F','lg');
        $this->btnBorrMani->ToolTip = 'Borrar el Manifiesto';
        $this->btnBorrMani->AddAction(new QClickEvent(), new QConfirmAction('Esta segur@ que desea borrar este Manifiesto?'));
        $this->btnBorrMani->AddAction(new QClickEvent(), new QServerAction('btnBorrMani_Click'));
        if (!$this->blnEditMode) {
            $this->btnBorrMani->Visible = false;
        }
    }

    protected function btnSacaMani_Create() {
        $this->btnSacaMani = new QButtonS($this);
        $this->btnSacaMani->Text = TextoIcono('minus-circle','Sacar','F','lg');
        $this->btnSacaMani->ToolTip = 'Sacar la(s) piezas(s) del Manifiesto';
        $this->btnSacaMani->AddAction(new QClickEvent(), new QServerAction('btnSacaMani_Click'));
    }


    protected function btnBorrMani_Click() {
        //t('Borrando el Manifiesto');
        $objCkptExpo  = Checkpoints::LoadByCodigo('EX');
        if ($objCkptExpo instanceof Checkpoints) {
            $intCkptExpo = $objCkptExpo->Id;
            $arrPiezRuta = $this->objManifies->GetPiezasConCheckpoint($objCkptExpo->Codigo,'Id');
            if (count($arrPiezRuta)) {
                $strIdxxRuta  = implode(',',$arrPiezRuta);
                t('Las piezas exportadas son: '.$strIdxxRuta);
                $objDatabase  = Containers::GetDatabase();
                $strCadeSqlx  = 'delete ';
                $strCadeSqlx .= '  from pieza_checkpoints ';
                $strCadeSqlx .= ' where pieza_id in ('.$strIdxxRuta.')';
                $strCadeSqlx .= '   and checkpoint_id = '.$intCkptExpo;
                //t('SQL: '.$strCadeSqlx);
                try {

                    $objDatabase->NonQuery($strCadeSqlx);
                    //t('Checkpoints de exportacion eliminado');
                } catch (Exception $e) {
                    $this->danger($e->getMessage());
                }
            }
            $this->objManifies->Delete();
            $this->objManifies->logDeCambios('Borrado');
            QApplication::Redirect(__SIST__.'/manifiesto_exp_mar_list.php');
        } else {
            $this->danger('No existe el Checkpoint de Exportacion | Comuniquese con el Administrador del Sistema');
        }
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgPiezMani);
        $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
        $this->btnExpoExce->Text = TextoIcono('download','XLS','F','lg');
        $this->btnExpoExce->HtmlEntities = false;
        $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
        $this->btnExpoExce->ToolTip = 'Exportar a Excel las Piezas del Manifiesto';
    }


    protected function btnRepoMani_Create() {
        $this->btnRepoMani = new QLabel($this);
        $this->btnRepoMani->HtmlEntities = false;
        $this->btnRepoMani->CssClass = '';
        $this->btnRepoMani->Visible  = $this->blnEditMode;
        $this->opcionesDeImpresion();
    }

    protected function opcionesDeImpresion() {
        $arrOpciDrop   = array();
        if ($this->blnEditMode) {
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/manifiesto_exportacion_pdf.php/'.$this->objManifies->Id,
                TextoIcono('list','Manfiesto de Carga')
            );
        }
        $strTextBoto = TextoIcono('print','Impr','F','lg');
        $this->btnRepoMani->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop, 'f');
        return $arrOpciDrop;
    }


    protected function dlgMensUsua_Create() {
        $this->dlgMensUsua = new QDialogBox($this);
        $this->dlgMensUsua->Width = '500px';
        $this->dlgMensUsua->Height = '280px';
        $this->dlgMensUsua->Overflow = QOverflow::Auto;
        $this->dlgMensUsua->Padding = '10px';
        $this->dlgMensUsua->FontSize = '20px';
        $this->dlgMensUsua->FontNames = QFontFamily::Georgia;
        $this->dlgMensUsua->BackColor = '#eeffdd';
        $this->dlgMensUsua->Display = false;
        $this->dlgMensUsua->ForeColor = 'blue';
    }

    protected function lstOrigMani_Create() {
        $this->lstOrigMani = new QListBox($this);
        $this->lstOrigMani->Width = 160;
        if (!$this->blnEditMode) {
            $objOrigMani = Sucursales::Load($this->objUsuario->SucursalId);
        } else {
            $objOrigMani = Sucursales::Load($this->objManifies->OrigenId);
        }
        $this->lstOrigMani->AddItem($objOrigMani->__toString(),$objOrigMani->Id,true);
    }

    protected function lstDestMani_Create() {
        $this->lstDestMani = new QListBox($this);
        $this->lstDestMani->Name = 'Destino';
        $this->lstDestMani->Width = 160;
        $objClauWher = QQ::Equal(QQN::Sucursales()->EsExport,true);
        $objClauOrde = QQ::OrderBy(QQN::Sucursales()->Nombre);
        $arrSucuExpo = Sucursales::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantDest = count($arrSucuExpo);
        $this->lstDestMani->AddItem(QApplication::Translate("- Seleccione Uno - ($intCantDest)"),null);
        foreach ($arrSucuExpo as $objSucuExpo) {
            $blnSeleRegi = false;
            if ($this->blnEditMode) {
                $blnSeleRegi = $this->objManifies->DestinoId == $objSucuExpo->Id;
            } else {
                if ($intCantDest == 1) {
                    $blnSeleRegi = true;
                }
            }
            $this->lstDestMani->AddItem($objSucuExpo->__toString(),$objSucuExpo->Id, $blnSeleRegi);
        }
        $this->lstDestMani->AddAction(new QChangeEvent(), new QAjaxAction('lstDestMani_Change'));
    }


    protected function calFechCrea_Create() {
        $this->calFechCrea = new QCalendar($this);
        if (!$this->blnEditMode) {
            $this->calFechCrea->DateTime = new QDateTime(QDateTime::Now());
        } else {
            $this->calFechCrea->DateTime = $this->objManifies->FechaCreacion;
        }
    }

    protected function calFechDesp_Create() {
        $this->calFechDesp = new QCalendar($this);
        if (!$this->blnEditMode) {
            $dttFechDhoy = date('Y-m-d');
            $dttFechTomo = SumaRestaDiasAFecha($dttFechDhoy,1,'+');
            $this->calFechDesp->DateTime = new QDateTime($dttFechTomo);
        } else {
            $this->calFechDesp->DateTime = $this->objManifies->FechaDespacho;
        }
    }

    protected function txtNumeMani_Create() {
        $this->txtNumeMani = new QTextBox($this);
        $this->txtNumeMani->Width = 160;
        if ($this->blnEditMode) {
            $this->txtNumeMani->Text = $this->objManifies->Numero;
        }
        $this->txtNumeMani->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtNumeBlxx_Create() {
        $this->txtNumeBlxx = new QTextBox($this);
        $this->txtNumeBlxx->Width = 160;
        if ($this->blnEditMode) {
            $this->txtNumeBlxx->Text = $this->objManifies->NroBl;
        }
        $this->txtNumeBlxx->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtNumeBook_Create() {
        $this->txtNumeBook = new QTextBox($this);
        $this->txtNumeBook->Width = 160;
        if ($this->blnEditMode) {
            $this->txtNumeBook->Text  = $this->objManifies->Booking;
        }
    }

    protected function txtCantVali_Create() {
        $this->txtCantVali = new QTextBox($this);
        $this->txtCantVali->Width = 100;
        if ($this->blnEditMode) {
            $this->txtCantVali->Text  = $this->objManifies->Valijas;
        }
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QTextBox($this);
        $this->txtCantPiez->Width = 100;
        if ($this->blnEditMode) {
            $this->txtCantPiez->Text  = $this->objManifies->Piezas;
        }
    }

    protected function txtCantVolu_Create() {
        $this->txtCantVolu = new QTextBox($this);
        $this->txtCantVolu->Width = 100;
        if ($this->blnEditMode) {
            $this->txtCantVolu->Text  = $this->objManifies->Volumen;
        }
    }

    protected function txtCreaPorx_Create() {
        $this->txtCreaPorx = new QTextBox($this);
        $this->txtCreaPorx->Width = 100;
        if ($this->blnEditMode) {
            $this->txtCreaPorx->Text  = $this->objManifies->__creator();
        }
    }

    protected function txtModiPorx_Create() {
        $this->txtModiPorx = new QTextBox($this);
        $this->txtModiPorx->Width = 100;
        if ($this->blnEditMode) {
            $this->txtModiPorx->Text  = $this->objManifies->__updater();
        }
    }

    protected function txtCantPies_Create() {
        $this->txtCantPies = new QTextBox($this);
        $this->txtCantPies->Width = 100;
        if ($this->blnEditMode) {
            $this->txtCantPies->Text  = $this->objManifies->PiesCub;
        }
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $strTextBoto   = TextoIcono('plus','Acciones','F','lg');
        $arrOpciDrop   = array();
        if ($this->blnEditMode) {

            $arrOpciDrop[] = OpcionDropDown(
                '/common/manifiesto_exportacion_pdf.php/'.$this->objManifies->Id,
                TextoIcono('list','Impr. Manfiesto')
            );

            $_SESSION['PagiBack'] = '/common/armar_manif_exp_mar.php/'.$this->objManifies->Id;
            $blnCambStat = true;
            $strUltiCkpt = '';
            if ($this->objUsuario->Sucursal->Iata != 'MIA') {
                $objUltiCkpt = $this->objManifies->ultimoCheckpoint();
                if ($objUltiCkpt instanceof ManifiestoExpCkpt) {
                    $strUltiCkpt = $objUltiCkpt->Checkpoint->Codigo;
                }
                //if ( ($this->objNotaEntr->Recibidas == 0) && (in_array($strUltiCkpt,['TI','IC']) ) ) {
                //    $blnCambStat = true;
                //}
                //if ( ($this->objNotaEntr->Recibidas > 0) && (in_array($strUltiCkpt,['RA']) ) ) {
                //    $blnCambStat = true;
                //}
            }
            if ($blnCambStat) {
                $arrOpciDrop[] = OpcionDropDown(
                    '/common/cambiar_estatus_manifiesto_exp.php/'.$this->objManifies->Id,
                    TextoIcono(__iEDIT__,'Camb. Estatus')
                );
            } else {
                $arrOpciDrop[] = OpcionDropDown(
                    '/common/cambiar_estatus_manifiesto_exp.php/'.$this->objManifies->Id.'/sc',
                    TextoIcono('list','Hist. Estatus')
                );
            }
        }

        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);

    }

    protected function dtgPiezApta_Create() {
        $this->dtgPiezApta = new QDataGrid($this);
        $this->dtgPiezApta->FontSize = 12;
        $this->dtgPiezApta->ShowFilter = false;

        $this->dtgPiezApta->CssClass = 'datagrid';
        $this->dtgPiezApta->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezApta->Paginator = new QPaginator($this->dtgPiezApta);
        $this->dtgPiezApta->ItemsPerPage = 6;

        $this->dtgPiezApta->RowActionParameterHtml = '<?= $_ITEM->Id ?>|<?= $_ITEM->GuiaId ?>';
        $this->dtgPiezApta->AddRowAction(new QDoubleClickEvent(), new QAjaxAction('dtgPiezAptaRow_Click'));

        $this->dtgPiezApta->UseAjax = true;

        $this->dtgPiezApta->SetDataBinder('dtgPiezApta_Bind');

        $this->dtgPiezAptaColumns();

    }

    protected function dtgPiezAptaRow_Click($strFormId, $strControlId, $strParameter) {
        //t('strParameter:'.$strParameter);
        if ($this->objUsuario->LogiUsua == 'ddurand') {
            $intPiezIdxx = explode('|',$strParameter)[0];
            $objPiezGuia = GuiaPiezas::Load($intPiezIdxx);
            if ($objPiezGuia instanceof GuiaPiezas) {
                $this->txtListNume->Text .= $objPiezGuia->IdPieza.chr(13);
            }
        }
    }

    protected function dtgPiezApta_Bind() {
        $intDestIdxx = $this->lstDestMani->SelectedValue;
        t('Destino Id: '.$intDestIdxx);
        if (!is_null($intDestIdxx)) {
            $strCadeSqlx  = "select pieza_id ";
            $strCadeSqlx .= "  from v_aptas_para_exportar ";
            $strCadeSqlx .= " where destino_id = $intDestIdxx";
            $strCadeSqlx .= "   and codigo_prod = 'EXM' ";
            t('SQL: '.$strCadeSqlx);
            $objDatabase  = GuiaPiezas::GetDatabase();
            $objDbResult  = $objDatabase->Query($strCadeSqlx);
            $arrIdxxPiez  = [];
            while ($mixRegistro = $objDbResult->FetchArray()) {
                $arrIdxxPiez[] = $mixRegistro['pieza_id'];
            }
            $arrPiezApta = GuiaPiezas::QueryArray(QQ::AndCondition(QQ::In(QQN::GuiaPiezas()->Id,$arrIdxxPiez)));
            $this->dtgPiezApta->TotalItemCount = count($arrPiezApta);
            $this->dtgPiezApta->DataSource     = GuiaPiezas::QueryArray(
                QQ::AndCondition(QQ::In(QQN::GuiaPiezas()->Id,$arrIdxxPiez)),
                QQ::Clause($this->dtgPiezApta->OrderByClause, $this->dtgPiezApta->LimitClause)
            );
        }

    }

    protected function dtgPiezAptaColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('IdPieza');
        $colIdxxPiez->Html = '<?= $_ITEM->IdPieza ?>';
        $colIdxxPiez->Width = 80;
        $this->dtgPiezApta->AddColumn($colIdxxPiez);

        $colManiGuia = new QDataGridColumn($this);
        $colManiGuia->Name = QApplication::Translate('Ubicacion');
        $colManiGuia->Html = '<?= $_ITEM->Ubicacion ?>';
        $colManiGuia->Width = 70;
        $this->dtgPiezApta->AddColumn($colManiGuia);

        $colDestGuia = new QDataGridColumn($this);
        $colDestGuia->Name = QApplication::Translate('Dest');
        $colDestGuia->Html = '<?= $_ITEM->Guia->Destino->Iata ?>';
        $colDestGuia->Width = 50;
        $this->dtgPiezApta->AddColumn($colDestGuia);

        $colPiesCubi = new QDataGridColumn($this);
        $colPiesCubi->Name = QApplication::Translate('PiesCub');
        $colPiesCubi->Html = '<?= $_ITEM->PiesCub ?>';
        $colPiesCubi->Width = 50;
        $this->dtgPiezApta->AddColumn($colPiesCubi);

    }

    protected function dtgPiezMani_Create() {
        $this->dtgPiezMani = new QDataGrid($this);
        $this->dtgPiezMani->FontSize = 12;
        $this->dtgPiezMani->ShowFilter = false;

        $this->dtgPiezMani->CssClass = 'datagrid';
        $this->dtgPiezMani->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezMani->Paginator = new QPaginator($this->dtgPiezMani);
        $this->dtgPiezMani->ItemsPerPage = 5;

        $this->dtgPiezMani->UseAjax = true;

        $this->dtgPiezMani->SetDataBinder('dtgPiezMani_Bind');

        $this->dtgPiezManiColumns();

    }

    protected function dtgPiezMani_Bind() {
        if (!is_null($this->objManifies)) {
            $arrIdxxMani = [];
            $arrPiezMani = $this->objManifies->GetGuiaPiezasAsPiezaArray();
            foreach ($arrPiezMani as $objPiezMani) {
                $arrIdxxMani[] = $objPiezMani->Id;
            }
            $this->dtgPiezMani->TotalItemCount = count($arrPiezMani);
            $this->dtgPiezMani->DataSource     = GuiaPiezas::QueryArray(
                QQ::AndCondition(QQ::In(QQN::GuiaPiezas()->Id,$arrIdxxMani)),
                QQ::Clause($this->dtgPiezMani->OrderByClause, $this->dtgPiezMani->LimitClause)
            );
        }
    }

    protected function dtgPiezManiColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('IdPieza');
        $colIdxxPiez->Html = '<?= $_ITEM->IdPieza ?>';
        $colIdxxPiez->Width = 70;
        $this->dtgPiezMani->AddColumn($colIdxxPiez);

        $colDestGuia = new QDataGridColumn($this);
        $colDestGuia->Name = QApplication::Translate('Dest');
        $colDestGuia->Html = '<?= $_ITEM->Guia->Destino->Iata ?>';
        $colDestGuia->Width = 30;
        $this->dtgPiezMani->AddColumn($colDestGuia);

        $colKiloPiez = new QDataGridColumn($this);
        $colKiloPiez->Name = QApplication::Translate('Kilos');
        $colKiloPiez->Html = '<?= $_ITEM->Kilos ?>';
        $colKiloPiez->Width = 30;
        $this->dtgPiezMani->AddColumn($colKiloPiez);

        $colVoluPiez = new QDataGridColumn($this);
        $colVoluPiez->Name = QApplication::Translate('PiesCub');
        $colVoluPiez->Html = '<?= $_ITEM->PiesCub ?>';
        $colVoluPiez->Width = 30;
        $this->dtgPiezMani->AddColumn($colVoluPiez);

        /*
        $colUltiCkpt = new QDataGridColumn($this);
        $colUltiCkpt->Name = QApplication::Translate('U.Ckpt');
        $colUltiCkpt->Html = '<?= $_ITEM->ultimoCheckpoint() ?>';
        $colUltiCkpt->Width = 30;
        $this->dtgPiezMani->AddColumn($colUltiCkpt);
        */

    }

    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->TextMode = QTextMode::MultiLine;
        $this->txtListNume->Width = 185;
        $this->txtListNume->Rows = 11;
    }

    protected function btnRepoErro_Create() {
        $this->btnRepoErro = new QButtonD($this);
        $this->btnRepoErro->Text = TextoIcono('eye','Error(es)','F','fa-lg');
        $this->btnRepoErro->AddAction(new QClickEvent(), new QServerAction('btnRepoErro_Click'));
        $this->btnRepoErro->Visible = false;
    }

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    protected function btnCancel_Click() {
        QApplication::Redirect('/common/manifiesto_exp_mar_list.php');
    }

    protected function btnSacaMani_Click() {
        /* @var $objContenedor ManifiestoExp */
        //t('====================================');
        //t('Sacando pieza del Manifiesto Exp MAR');

        if (strlen($this->txtListNume->Text) == 0) {
            $this->danger('No se han especificado las piezas que serán excluidas del Manifiesto');
            return;
        }

        $strNombProc = 'Sacando piezas del Manifiesto: '.$this->txtNumeMani->Text;
        $this->objProcEjec = CrearProceso($strNombProc);

        $strCodiCkpt   = 'EX';
        $objContenedor = $this->objManifies;
        //$objCheckpoint = Checkpoints::LoadByCodigo($strCodiCkpt);
        //t('El ckpt es: '.$objCheckpoint->Codigo);
        $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
        $this->arrListNume = LimpiarArreglo($this->arrListNume,false);
        $this->txtListNume->Text = '';

        $intCantErro = 0;
        $intCantPiez = 0;
        $objDatabase = Containers::GetDatabase();
        $objDatabase->TransactionBegin();
        foreach ($this->arrListNume as $strNumeSeri) {
            t('Procesando: '.$strNumeSeri);
            $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strNumeSeri);
            if (!$objGuiaPiez) {
                $strTextMens = 'La pieza: '.$strNumeSeri.' no existe !!!';
                //t($strTextMens);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = 'La pieza no existe';
                $arrParaErro['ComeErro'] = $strTextMens;
                GrabarError($arrParaErro);
                $intCantErro++;
                continue;
            }
            //t('Encontre la pieza');
            if (!$objContenedor->IsGuiaPiezasAsPiezaAssociated($objGuiaPiez)) {
                $strTextMens = 'La pieza: '.$strNumeSeri.' no esta asociada al Manifiesto !!!';
                //t($strTextMens);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = 'La pieza no esta asociada al Manifiesto !!!';
                $arrParaErro['ComeErro'] = $strTextMens;
                GrabarError($arrParaErro);
                $intCantErro++;
                continue;
            }
            //t('La pieza esta asociada al Manifiesto');
            //---------------------------------------------
            // Se establece la relacion "contenedor-guia"
            //---------------------------------------------
            $objContenedor->UnassociateGuiaPiezasAsPieza($objGuiaPiez);
            //t('Ya saque la pieza');
            //-----------------------------------------
            // Se borra el checkpoint correspondiente
            //-----------------------------------------
            $objClauOrde = QQ::OrderBy(QQN::PiezaCheckpoints()->Id,false);
            $arrPiezCkpt = PiezaCheckpoints::LoadArrayByPiezaId($objGuiaPiez->Id, $objClauOrde);
            foreach ($arrPiezCkpt as $objPiezCkpt) {
                if ($objPiezCkpt->Checkpoint->Codigo == $strCodiCkpt) {
                    try {
                        $objPiezCkpt->Delete();
                        break;
                    } catch (Exception $e) {
                        //t('Error borrando la pieza: '.$e->getMessage());
                        $strTextMens = $e->getMessage();
                        t($strTextMens);
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = $strNumeSeri;
                        $arrParaErro['MensErro'] = 'Borrando el Checkpoint '.$strCodiCkpt;
                        $arrParaErro['ComeErro'] = $strTextMens;
                        $intCantErro++;
                        GrabarError($arrParaErro);
                    }
                }
            }
            $intCantPiez ++;
        }
        $this->dtgPiezMani->Refresh();
        $this->dtgPiezApta->Refresh();
        //t('Termine de procesar la piezas');
        $objContenedor->actualizarTotales();
        //t('Se actualizaron los totales en el Manifiesto Exp');
        $objDatabase->TransactionCommit();
        $strMensUsua = sprintf('Piezas sacadas del Manifiesto (%s) | Errores (%s)',
            $intCantPiez,$intCantErro);
        if ($intCantErro == 0) {
            $this->info($strMensUsua);
        } else {
            $this->warning($strMensUsua);
            $this->btnRepoErro->Visible = true;
        }
        $this->objManifies = $objContenedor;
    }


    protected function advertirExistencia() {
        $strMensUsua = '';
        $strCaraConc = '';
        $strNumeMani = trim($this->txtNumeBlxx->Text);
        if (strlen($strNumeMani) > 0) {
            $objExisMani = Containers::LoadByNumero($strNumeMani);
            if ($objExisMani) {
                $strMensUsua  = 'Ya existe el Manifiesto: <b>'.$strNumeMani.'</b>, creado el <b>';
                $strMensUsua .= $objExisMani->Fecha->__toString('DD/MM/YYYY').'</b>.  Las piezas serán agregadas';
            }
        }
        $strPrecLate = trim($this->txtPrecLate->Text);
        if (strlen($strPrecLate) > 0) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Containers()->PrecintoLateral,$strPrecLate);
            $objExisMani   = Containers::QueryCount(QQ::AndCondition($objClauWher));
            if ($objExisMani) {
                if (strlen($strMensUsua) > 0) {
                    $strCaraConc = ' | ';
                }
                $strMensUsua .= $strCaraConc.'Precinto Lateral: <b>'.$strPrecLate.'</b>, usando previamente <b>';
            }
        }
        if (strlen($strMensUsua) > 0) {
            $this->warning($strMensUsua);
        }
    }

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = "/common/armar_manif_exp_mar.php/";
        QApplication::Redirect('/common/detalle_error_list.php/'.$this->objProcEjec->Id);
    }


    protected function lstDestMani_Change() {
        if (!is_null($this->lstDestMani->SelectedValue)) {
            $this->dtgPiezApta->Refresh();
        }
    }


    protected function Form_Validate()
    {
        if (is_null($this->lstDestMani->SelectedValue)) {
            $this->danger('Debe seleccionar un Destino');
            return false;
        }
        if ( (strlen($this->txtNumeBlxx->Text) == 0) && (strlen($this->txtNumeBook->Text) == 0) ) {
            $this->danger('Debe especificar un Nro de BL o al menos un Nro de Booking');
            return false;
        }
        if (is_null($this->calFechDesp)) {
            $this->danger('Debe especificar la Fecha de Despacho');
            return false;
        }
        if (!$this->blnEditMode) {
            if (strlen($this->txtListNume->Text) == 0) {
                $this->danger('Debe especificar al menos una Pieza a Manifestar');
                return false;
            }
        }
        return true;
    }


    protected function btnSave_ClickNew() {
        t('===============================');
        t('Comenzando Exportacion Maritima');

        $mixInitTime = microtime(true);

        $strAcciProg = $this->blnEditMode ? 'Editando' : 'Creando';
        $strNombProc = $strAcciProg.' Manif Exp MAR: '.$this->txtNumeBook->Text;
        $this->objProcEjec = CrearProceso($strNombProc);

        $objCheckpoint = Checkpoints::LoadByCodigo('EX');
        if (!($objCheckpoint instanceof Checkpoints)) {
            $strTextMens = 'El checkpoint de exportacion <b>EX</b> No Existe !!!';
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'EX';
            $arrParaErro['MensErro'] = 'EL CKPT DF NO EXISTE';
            $arrParaErro['ComeErro'] = $strTextMens;
            GrabarError($arrParaErro);
            $this->danger($strTextMens);
            return;
        }
        t('El ckpt es: '.$objCheckpoint->Codigo);

        if (!$this->blnEditMode) {
            t('Creando el manifiesto');
            $strNumeBlxx = trim($this->txtNumeBlxx->Text);
            if (strlen($strNumeBlxx) > 0) {
                t('El Nro de BL existe');
                $objClauWher = QQ::Equal(QQN::ManifiestoExp()->NroBl,$strNumeBlxx);
            } else {
                t('El Booking existe');
                $strNumeBook = trim($this->txtNumeBook->Text);
                $objClauWher = QQ::Equal(QQN::ManifiestoExp()->Booking,$strNumeBook);
            }
            $objContenedor = ManifiestoExp::QuerySingle(QQ::AndCondition($objClauWher));
        } else {
            t('Actualizando el manifiesto');
            $objContenedor = $this->objManifies;
        }

        try {
            if (!$objContenedor) {
                t('Manifiesto nuevo');
                $objContenedor = new ManifiestoExp();
                $objContenedor->Numero        = ManifiestoExp::proxReferencia();
                $objContenedor->FechaCreacion = new QDateTime(QDateTime::Now());
                $objContenedor->OrigenId      = $this->lstOrigMani->SelectedValue;
                $objContenedor->CreatedBy     = $this->objUsuario->CodiUsua;
                $objContenedor->CreatedAt     = new QDateTime(QDateTime::Now());
                $objContenedor->Valijas       = 0;
                $objContenedor->Piezas        = 0;
                $objContenedor->Kilos         = 0;
                $objContenedor->Libras        = 0;
                $objContenedor->PiesCub       = 0;
                $objContenedor->Volumen       = 0;
                $objContenedor->Valor         = 0;
            }
            $objContenedor->DestinoId     = $this->lstDestMani->SelectedValue;
            $objContenedor->FechaDespacho = new QDateTime($this->calFechDesp->DateTime);
            $objContenedor->NroBl         = $this->txtNumeBlxx->Text;
            $objContenedor->Booking       = $this->txtNumeBook->Text;
            $objContenedor->UpdatedBy     = $this->objUsuario->CodiUsua;
            $objContenedor->UpdatedAt     = new QDateTime(QDateTime::Now());
            $objContenedor->Save();
            t('Manifiesto Exp MAR salvado en la BD');
        } catch (Exception $e) {
            t('Error creando Manifiesto Exp MAR: '.$e->getMessage());
            $this->danger($e->getMessage());
            return;
        }

        if (strlen($this->txtListNume->Text) == 0) {
            $this->info('Se actualizo el Manifiesto | No se proceso ninguna Pieza');
            return;
        }

        $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
        $this->arrListNume = LimpiarArreglo($this->arrListNume,false);
        $this->txtListNume->Text = '';

        $intContCkpt = 0;
        $objDatabase = ManifiestoExp::GetDatabase();
        $objDatabase->TransactionBegin();

        //--------------------------------------------------------------------------------------
        // Plan de accion:
        // 1.- Se borran la piezas anteriores del Usuario de la tabla process_pieces
        //     spu_delete_records_from_process_pieces($intCodiUsua)
        // 2.- Se graban en la tabla process_pieces las piezas actuales que se van a procesar
        //     ProcessPieces::GrabarPiezas($intProcIdxx, $arrPiecProc)
        // 3.- Se asocian las piezas al contenedor 
        //     spu_associate_pieces_to_container_exp($intProcIdxx)
        //     - Las piezas deben existir en la tabla guia_piezas
        //     - Las piezas no deben no deben estar entregadas
        //     - Las piezas no deben repetirse dentro del container
        // 4.- Se graba el checkpoint de Exportacion para cada pieza
        //     spu_insert_checkpoint($intCodiCkpt, $intCodiSucu, '$strTextCkpt', $intProcIdxx)
        // 5.- Grabar en detalle_error las piezas con errores durante el proceso.
        //--------------------------------------------------------------------------------------

        foreach ($this->arrListNume as $strNumeSeri) {
            t('Procesando: '.$strNumeSeri);
            $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strNumeSeri);
            if (!$objGuiaPiez) {
                t('La pieza no existe en la base de datos: '.$strNumeSeri);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = 'LA PIEZA NO EXISTE';
                $arrParaErro['ComeErro'] = 'CHEQUEANDO LA EXISTENCIA DE LA PIEZA';
                GrabarError($arrParaErro);
                continue;
            }
            t('La pieza existe');
            $arrSepuProc = $objGuiaPiez->Guia->SePuedeProcesar();
            if (!$arrSepuProc['TodoOkey']) {
                t('La guia no se puede procesar: '.$arrSepuProc['MensUsua']);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = $arrSepuProc['MensUsua'];
                $arrParaErro['ComeErro'] = 'VERIFICANDO QUE LA GUIA SE PUEDA PROCESAR';
                GrabarError($arrParaErro);
                continue;
            }
            //--------------------------------------------------------------------------------
            // Antes de asociar la Guia al Manifiesto, se debe verificar que el destino
            // de la Guia, coincida con algunos de los Destinos de la Operacion seleccionada
            //---------------------------------------------------------------------------------
            if ($objContenedor->IsGuiaPiezasAsPiezaAssociated($objGuiaPiez)) {
                t('La pieza ya estaba asociada al Manifiesto');
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = 'PREVIAMENTE ASOCIADA AL MANIFIESTO';
                $arrParaErro['ComeErro'] = 'ASOCIANDO LA PIEZA AL MANIFIESTO';
                GrabarError($arrParaErro);
                continue;
            }
            t('La pieza no estaba asociada');
            //---------------------------------------------
            // Se establece la relacion "contenedor-guia"
            //---------------------------------------------
            $objContenedor->AssociateGuiaPiezasAsPieza($objGuiaPiez);
            t('Ya asocie la pieza');
            //---------------------------------------------
            // Se registra el checkpoint correspondiente
            //---------------------------------------------
            $strDescCkpt  = $objCheckpoint->Descripcion.' | BOOKING: '.$objContenedor->Booking;
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
            $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
            $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
            $arrDatoCkpt['CodiRuta'] = null;
            $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            if ($arrResuGrab['TodoOkey']) {
                t('Se grabo el checkpoint a la pieza');
                $intContCkpt ++;
            } else {
                t('Hubo algun error: '.$arrResuGrab['MotiNook']);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                $arrParaErro['ComeErro'] = 'GRABANDO CHECKPOINT DE EXPORTACION';
                GrabarError($arrParaErro);
            }
        }
        $this->dtgPiezMani->Refresh();
        $this->dtgPiezApta->Refresh();
        t('Termine de procesar la piezas');
        $objContenedor->actualizarTotales();
        $this->txtNumeMani->Text = $objContenedor->Numero;
        $this->txtCantVali->Text = $objContenedor->Valijas;
        $this->txtCantPiez->Text = $objContenedor->Piezas;
        $this->txtCantVolu->Text = $objContenedor->Volumen;
        $this->txtCantPies->Text = $objContenedor->PiesCub;
        $this->txtCreaPorx->Text = $objContenedor->__creator();
        $this->txtModiPorx->Text = $objContenedor->__updater();
        t('Se actualizaron los totales en el manifiesto');
        $objDatabase->TransactionCommit();
        $intCantErro = DetalleError::CountByProcesoId($this->objProcEjec->Id);

        $mixFiniTime = microtime(true);
        $mixTotaTime = formatPeriod($mixFiniTime, $mixInitTime);

        $strMensUsua = sprintf('Checkpoints (%s) | Errores (%s) | Tiempo: ', 
            $intContCkpt, $intCantErro, $mixTotaTime);
        if ($intCantErro == 0) {
            // $this->success($strMensUsua);
            $_SESSION['FlashMessage'] = ['success', $strMensUsua];
        } else {
            // $this->warning($strMensUsua);
            $_SESSION['FlashMessage'] = ['warning', $strMensUsua];
            $this->btnRepoErro->Visible = true;
        }

        $this->objManifies = $objContenedor;
        $this->blnEditMode = true;
        $this->btnRepoMani->Visible = true;


        QApplication::Redirect('/common/armar_manif_exp_mar.php/'.$objContenedor->Id);
        $this->opcionesDeImpresion();
    }

    protected function btnSave_Click() {
        t('===============================');
        t('Comenzando Exportacion Maritima');

        $strAcciProg = $this->blnEditMode ? 'Editando' : 'Creando';
        $strNombProc = $strAcciProg.' Manif Exp MAR: '.$this->txtNumeBook->Text;
        $this->objProcEjec = CrearProceso($strNombProc);

        $objCheckpoint = Checkpoints::LoadByCodigo('EX');
        if (!($objCheckpoint instanceof Checkpoints)) {
            $strTextMens = 'El checkpoint de exportacion <b>EX</b> No Existe !!!';
            t($strTextMens);
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'EX';
            $arrParaErro['MensErro'] = 'EL CKPT DF NO EXISTE';
            $arrParaErro['ComeErro'] = $strTextMens;
            GrabarError($arrParaErro);
            $this->danger($strTextMens);
            return;
        }
        t('El ckpt es: '.$objCheckpoint->Codigo);

        if (!$this->blnEditMode) {
            t('Creando el manifiesto');
            $strNumeBlxx = trim($this->txtNumeBlxx->Text);
            if (strlen($strNumeBlxx) > 0) {
                t('El Nro de BL existe');
                $objClauWher = QQ::Equal(QQN::ManifiestoExp()->NroBl,$strNumeBlxx);
            } else {
                t('El Booking existe');
                $strNumeBook = trim($this->txtNumeBook->Text);
                $objClauWher = QQ::Equal(QQN::ManifiestoExp()->Booking,$strNumeBook);
            }
            $objContenedor = ManifiestoExp::QuerySingle(QQ::AndCondition($objClauWher));
        } else {
            t('Actualizando el manifiesto');
            $objContenedor = $this->objManifies;
        }

        try {
            if (!$objContenedor) {
                t('Manifiesto nuevo');
                $objContenedor = new ManifiestoExp();
                $objContenedor->Numero        = ManifiestoExp::proxReferencia();
                $objContenedor->FechaCreacion = new QDateTime(QDateTime::Now());
                $objContenedor->OrigenId      = $this->lstOrigMani->SelectedValue;
                $objContenedor->CreatedBy     = $this->objUsuario->CodiUsua;
                $objContenedor->CreatedAt     = new QDateTime(QDateTime::Now());
                $objContenedor->Valijas       = 0;
                $objContenedor->Piezas        = 0;
                $objContenedor->Kilos         = 0;
                $objContenedor->Libras        = 0;
                $objContenedor->PiesCub       = 0;
                $objContenedor->Volumen       = 0;
                $objContenedor->Valor         = 0;
            }
            $objContenedor->DestinoId     = $this->lstDestMani->SelectedValue;
            $objContenedor->FechaDespacho = new QDateTime($this->calFechDesp->DateTime);
            $objContenedor->NroBl         = $this->txtNumeBlxx->Text;
            $objContenedor->Booking       = $this->txtNumeBook->Text;
            $objContenedor->UpdatedBy     = $this->objUsuario->CodiUsua;
            $objContenedor->UpdatedAt     = new QDateTime(QDateTime::Now());
            $objContenedor->Save();
            t('Manifiesto Exp MAR salvado en la BD');
        } catch (Exception $e) {
            t('Error creando Manifiesto Exp MAR: '.$e->getMessage());
            $this->danger($e->getMessage());
            return;
        }

        if (strlen($this->txtListNume->Text) == 0) {
            $this->info('Se actualizo el Manifiesto | No se proceso ninguna Pieza');
            return;
        }

        $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
        //---------------------------------------------------------------------------
        // Con array_unique se eliminan las piezas repetidas en caso de que las haya
        //---------------------------------------------------------------------------
        $this->arrListNume = LimpiarArreglo($this->arrListNume,false);
        // $this->arrListNume = array_map('transformar',$this->arrListNume);
        $this->txtListNume->Text = '';

        $intContCkpt = 0;
        $objDatabase = ManifiestoExp::GetDatabase();
        $objDatabase->TransactionBegin();
        //--------------------------------------------
        // Se procesa una a una las Piezas o Valijas
        //--------------------------------------------
        foreach ($this->arrListNume as $strNumeSeri) {
            t('Procesando: '.$strNumeSeri);
            $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strNumeSeri);
            if (!$objGuiaPiez) {
                t('La pieza no existe en la base de datos: '.$strNumeSeri);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = 'LA PIEZA NO EXISTE';
                $arrParaErro['ComeErro'] = 'CHEQUEANDO LA EXISTENCIA DE LA PIEZA';
                GrabarError($arrParaErro);
                continue;
            }
            t('La pieza existe');
            $arrSepuProc = $objGuiaPiez->Guia->SePuedeProcesar();
            if (!$arrSepuProc['TodoOkey']) {
                t('La guia no se puede procesar: '.$arrSepuProc['MensUsua']);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = $arrSepuProc['MensUsua'];
                $arrParaErro['ComeErro'] = 'VERIFICANDO QUE LA GUIA SE PUEDA PROCESAR';
                GrabarError($arrParaErro);
                continue;
            }
            //--------------------------------------------------------------------------------
            // Antes de asociar la Guia al Manifiesto, se debe verificar que el destino
            // de la Guia, coincida con algunos de los Destinos de la Operacion seleccionada
            //---------------------------------------------------------------------------------
            if ($objContenedor->IsGuiaPiezasAsPiezaAssociated($objGuiaPiez)) {
                t('La pieza ya estaba asociada al Manifiesto');
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = 'PREVIAMENTE ASOCIADA AL MANIFIESTO';
                $arrParaErro['ComeErro'] = 'ASOCIANDO LA PIEZA AL MANIFIESTO';
                GrabarError($arrParaErro);
                continue;
            }
            t('La pieza no estaba asociada');
            //---------------------------------------------
            // Se establece la relacion "contenedor-guia"
            //---------------------------------------------
            $objContenedor->AssociateGuiaPiezasAsPieza($objGuiaPiez);
            t('Ya asocie la pieza');
            //---------------------------------------------
            // Se registra el checkpoint correspondiente
            //---------------------------------------------
            $strDescCkpt  = $objCheckpoint->Descripcion.' | BOOKING: '.$objContenedor->Booking;
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
            $arrDatoCkpt['GuiaAnul'] = $objGuiaPiez->Guia->Anulada();
            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
            $arrDatoCkpt['TextCkpt'] = $strDescCkpt;
            $arrDatoCkpt['CodiRuta'] = null;
            $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            if ($arrResuGrab['TodoOkey']) {
                t('Se grabo el checkpoint a la pieza');
                $intContCkpt ++;
            } else {
                t('Hubo algun error: '.$arrResuGrab['MotiNook']);
                $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $strNumeSeri;
                $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                $arrParaErro['ComeErro'] = 'GRABANDO CHECKPOINT DE EXPORTACION';
                GrabarError($arrParaErro);
            }
        }
        $this->dtgPiezMani->Refresh();
        $this->dtgPiezApta->Refresh();
        t('Termine de procesar la piezas');
        $objContenedor->actualizarTotales();
        $this->txtNumeMani->Text = $objContenedor->Numero;
        $this->txtCantVali->Text = $objContenedor->Valijas;
        $this->txtCantPiez->Text = $objContenedor->Piezas;
        $this->txtCantVolu->Text = $objContenedor->Volumen;
        $this->txtCantPies->Text = $objContenedor->PiesCub;
        $this->txtCreaPorx->Text = $objContenedor->__creator();
        $this->txtModiPorx->Text = $objContenedor->__updater();
        t('Se actualizaron los totales en el manifiesto');
        $objDatabase->TransactionCommit();
        $intCantErro = DetalleError::CountByProcesoId($this->objProcEjec->Id);
        $strMensUsua = sprintf('Piezas-Checkpoints (%s) | Errores (%s)',
            $intContCkpt,$intCantErro);
        if ($intCantErro == 0) {
            $this->success($strMensUsua);
        } else {
            $this->warning($strMensUsua);
            $this->btnRepoErro->Visible = true;
        }

        $this->objManifies = $objContenedor;
        $this->blnEditMode = true;
        $this->btnRepoMani->Visible = true;
        QApplication::Redirect('/common/armar_manif_exp_mar.php/'.$objContenedor->Id);
        $this->opcionesDeImpresion();
    }

}
ArmarManifExpMar::Run('ArmarManifExpMar');
?>