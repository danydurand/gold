<?php
//-------------------------------------------------------------------------------------
// Programa       : consulta_guia.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 27/10/16 10:47 AM
// Proyecto       : newliberty
// Descripcion    : Este programa muestra información detallada de una guía al Usuario
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ConsultaGuiaNew extends FormularioBaseKaizen {
    /**
     * @var $objGuia Guias
     */
    protected $objGuia;
    protected $objProducto;
    protected $objRegiTrab;
    protected $dtgGuiaCkpt;
    protected $dtgRegiTrab;
    protected $dtgConcGuia;
    protected $dtgPiezGuia;
    protected $blnSubxClie;
    protected $decMontCanc;
    protected $strPersReci;
    protected $strFechPago;
    protected $strTipoDocu;
    protected $strNumeDocu;
    protected $lblSistGuia;

    protected $lblSucuOrig;
    protected $lblNombRemi;
    protected $lblDireRemi;
    protected $lblTeleRemi;
    protected $lblSucuDest;
    protected $lblNombDest;
    protected $lblDireDest;
    protected $lblTeleDest;
    protected $lblTipoTari;
    protected $lblSeguGuia;
    protected $lblPorcDcto;
    protected $lblPorcSegu;
    protected $lblMontSegu;
    protected $lblMontDcto;
    protected $lblMontFran;
    protected $lblMontBase;
    protected $lblTariVolu;
    protected $lblPorcIvax;
    protected $lblMontIvax;
    protected $lblMontTota;
    protected $lblConsDcto;
    protected $lblNumeGuia;
    protected $lblFechGuia;
    protected $lblPesoGuia;
    protected $lblPiezPeso;
    protected $lblDescCont;
    protected $lblFormPago;
    protected $lblValoDecl;
    protected $lblGuiaReto;
    protected $lblCodiProd;
    protected $lblPersEntr;
    protected $lblFechEntr;
    protected $lblTextObse;
    protected $lblPersReci;
    protected $lblFechPago;
    protected $lblCreaPorx;
    protected $lblGuiaTran;
    protected $lblTipoDocu;
    protected $lblMontCanc;
    protected $txtTextCome;
    protected $lblNotaEntr;
    protected $lblServImpo;
    protected $lblNumeFact;

    // Parámetros de Posición //
    protected $arrDataTabl;
    protected $intCantRegi;
    protected $intPosiRegi;
    // ---- Medianos ----- //
    protected $btnPrimRegi;
    protected $btnRegiAnte;
    protected $btnProxRegi;
    protected $btnUltiRegi;
    // ---- Pequeños ----- //
    protected $btnPrimSmal;
    protected $btnAnteSmal;
    protected $btnProxSmal;
    protected $btnUltiSmal;
    // Botones Corrientes //
    protected $btnEditGuia;
    protected $btnImprGuia;
    protected $btnSaveCome;
    protected $btnInfoPodx;
    protected $btnGuiaOrig;
    protected $btnTrazTari;
    protected $lblComePodx;

    // Para cargar el POD
    protected $lblQuieReci;
    protected $txtQuieReci;
    protected $lblFechEnt1;
    protected $dttFechEntr;
    protected $lblHoraEntr;
    protected $txtHoraEntr;
    protected $lblVariGuia;
    protected $chkVariGuia;
    protected $lblOtraGuia;
    protected $txtOtraGuia;
    protected $btnGrabPodx;
    protected $lblBotoPopu;
    protected $lblPopuModa;
    protected $strErroProc;
    protected $btnMasxAcci;


    protected function SetupValores() {
        //-----------------------------------------
        // Obteniendo el # de la Guía a Consultar
        //-----------------------------------------
        $strNumeGuia = QApplication::PathInfo(0);
        $strAcciPlus = QApplication::PathInfo(1);
        if ($strNumeGuia) {
            $this->objGuia = Guias::Load($strNumeGuia);
            if (!$this->objGuia) {
                if (isset($_SESSION['StatGuia'])) {
                    unset($_SESSION['StatGuia']);
                }
                $_SESSION['StatGuia'] = 'La Guía <b>#'.$strNumeGuia.'</b> no existe! ';
                QApplication::Redirect(__SIST__.'/guia_invalida.php');
            } else {
                if (!is_null($this->objGuia->DeletedAt)) {
                    if (isset($_SESSION['StatGuia'])) {
                        unset($_SESSION['StatGuia']);
                    }
                    $_SESSION['StatGuia'] = 'La Guía <b>#'.$strNumeGuia.'</b> ha sido eliminada! ';
                    QApplication::Redirect(__SIST__.'/guia_invalida.php');
                }
            }
        } else {
            $strMensMost = 'Debe especificar un Número de Guía para Consultar.';
            $this->mensaje($strMensMost,'m','d',__iHAND__);
        }

        $this->objRegiTrab = $this->CrearRegistroDeTrabajo();

        if ($strAcciPlus == 'cc') {
            //t('Excelente, voy a calcular los conceptos');
            if ($this->objGuia) {
                //t('La guia si existe');
                if (is_null($this->objGuia->FacturaId)) {
                    //t('La guia no esta facturada');
                    $arrConcActi = Conceptos::conceptosActivos($this->objGuia->Producto->Codigo);
                    $this->objGuia->calcularTodoLosConceptos($arrConcActi);
                    QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$this->objGuia->Id);
                } else {
                    //t('La guia esta facturada, no se puede re-calcular los conceptos');
                    $this->warning('La Guia ya fue Facturada.  No admite re-calculo de Conceptos');
                }
            }
        }
        if ($strAcciPlus == 'ne') {
            // Imprimir Nota de Entrega
            if ($this->objGuia) {
                QApplication::Redirect(__SIST__.'/nota_de_entrega_pdf.php/'.$this->objGuia->Id);
            }
        }
        if ($strAcciPlus == 'ie') {
            // Imprimir Etiqueta (con Logo)
            if ($this->objGuia) {
                $_SESSION['MostLogo'] = true;
                $_SESSION['GuiaEtiq'] = [$this->objGuia->Id];
                QApplication::Redirect(__SIST__.'/etiqueta_pdf.php');
            }
        }
        if ($strAcciPlus == 'es') {
            // Imprimir Etiqueta (sin Logo)
            if ($this->objGuia) {
                $_SESSION['MostLogo'] = false;
                $_SESSION['GuiaEtiq'] = [$this->objGuia->Id];
                QApplication::Redirect(__SIST__.'/etiqueta_pdf.php');
            }
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();

        $this->determinarPosicion();

        $this->lblTituForm->Text = 'Consulta de la Guía';

        $this->lblSistGuia_Create();

        //---- Remitente ---- //
        $this->lblSucuOrig_Create();
        $this->lblNombRemi_Create();
        $this->lblDireRemi_Create();
        $this->lblTeleRemi_Create();

        // ---- Destinatario ---- //
        $this->lblSucuDest_Create();
        $this->lblNombDest_Create();
        $this->lblDireDest_Create();
        $this->lblTeleDest_Create();

        // - Costos del Servicio - //
        $this->lblTipoTari_Create();
        $this->lblSeguGuia_Create();
        $this->lblMontTota_Create();

        // -- Información del Envío -- //
        $this->lblNumeGuia_Create();
        $this->lblFechGuia_Create();
        $this->lblDescCont_Create();
        $this->lblFormPago_Create();
        $this->lblCodiProd_Create();
        $this->lblPiezPeso_Create();
        $this->lblValoDecl_Create();
        $this->lblPersEntr_Create();
        $this->lblFechEntr_Create();
        $this->lblTextObse_Create();
        $this->lblCreaPorx_Create();
        $this->lblGuiaTran_Create();
        $this->txtTextCome_Create();
        $this->lblNotaEntr_Create();
        $this->lblservImpo_Create();
        $this->lblNumeFact_Create();

        // Para cargar el POD
        $this->lblQuieReci_Create();
        $this->txtQuieReci_Create();
        $this->lblFechEnt1_Create();
        $this->dttFechEntr_Create();
        $this->lblHoraEntr_Create();
        $this->txtHoraEntr_Create();
        $this->lblVariGuia_Create();
        $this->chkVariGuia_Create();
        $this->lblOtraGuia_Create();
        $this->txtOtraGuia_Create();
        $this->btnGrabPodx_Create();
        $this->lblBotoPopu_Create();
        $this->lblPopuModa_Create();

        $this->dtgGuiaCkpt_Create();

        $this->dtgRegiTrab_Create();
        $this->dtgConcGuia_Create();
        $this->dtgPiezGuia_Create();

        //--------------------
        // Botónes Regulares
        //--------------------
        $this->btnSave->Visible = false;
        $this->btnEditGuia_Create();
        $this->btnImprGuia_Create();
        $this->btnSaveCome_Create();
        $this->btnInfoPodx_Create();
        $this->btnTrazTari_Create();

        //------------------------
        // Botónes de Navegacion
        //------------------------
        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->btnPrimSmal_Create();
        $this->btnAnteSmal_Create();
        $this->btnProxSmal_Create();
        $this->btnUltiSmal_Create();

        $this->btnMasxAcci_Create();

        $this->verificarNavegacion();

        if (isset($_SESSION['MostPodx'])) {
            if ($_SESSION['MostPodx'] == true) {
                $this->btnInfoPodx_Click('','','POD');
            }
        }

        //-------------------------------------------------------------------------
        // Si el usuario no tiene permiso para editar la guia, se oculta el botón
        //-------------------------------------------------------------------------
        $this->btnEditGuia->Visible = false;
        $objEditGuia = Parametro::LoadByIndiParaCodiPara('EditGuia',$this->objUsuario->LogiUsua);
        if ($objEditGuia) {
            $this->btnEditGuia->Visible = $objEditGuia->ParaVal1;
        }

    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function dtgPiezGuia_Create() {
        $this->dtgPiezGuia = new QDataGrid($this);
        $this->dtgPiezGuia->FontSize = 12;
        $this->dtgPiezGuia->ShowFilter = false;

        $this->dtgPiezGuia->CssClass = 'datagrid';
        $this->dtgPiezGuia->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgPiezGuia->UseAjax = true;

        $this->dtgPiezGuia->SetDataBinder('dtgPiezGuia_Bind');

        $this->createDtgPiezGuiaColumns();
    }

    protected function dtgPiezGuia_Bind() {
        $this->dtgPiezGuia->DataSource = $this->objGuia->GetGuiaPiezasAsGuiaArray();
    }

    protected function createDtgPiezGuiaColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('Pieza');
        $colIdxxPiez->Html = '<?= $_FORM->dtgPiezGuia_IdxxPiez_Render($_ITEM); ?>';
        $this->dtgPiezGuia->AddColumn($colIdxxPiez);

        $colGuiaTran = new QDataGridColumn($this);
        $colGuiaTran->Name = QApplication::Translate('G.Tran');
        $colGuiaTran->Html = '<?= $_FORM->dtgPiezGuia_GuiaTran_Render($_ITEM); ?>';
        $this->dtgPiezGuia->AddColumn($colGuiaTran);

        $colUbicFisi = new QDataGridColumn($this);
        $colUbicFisi->Name = QApplication::Translate('Ubicacion');
        $colUbicFisi->Html = '<?= $_ITEM->Ubicacion; ?>';
        $this->dtgPiezGuia->AddColumn($colUbicFisi);

        $colDescPiez = new QDataGridColumn($this);
        $colDescPiez->Name = QApplication::Translate('Contenido');
        $colDescPiez->Html = '<?= $_ITEM->Descripcion; ?>';
        $colDescPiez->Width = 200;
        $this->dtgPiezGuia->AddColumn($colDescPiez);

        $colKiloPiez = new QDataGridColumn($this);
        $colKiloPiez->Name = QApplication::Translate('Kilos');
        $colKiloPiez->Html = '<?= $_ITEM->Kilos; ?>';
        $this->dtgPiezGuia->AddColumn($colKiloPiez);

        $colPiesPiez = new QDataGridColumn($this);
        $colPiesPiez->Name = QApplication::Translate('PiesCub');
        $colPiesPiez->Html = '<?= $_ITEM->PiesCub; ?>';
        $this->dtgPiezGuia->AddColumn($colPiesPiez);

        $colVoluPiez = new QDataGridColumn($this);
        $colVoluPiez->Name = QApplication::Translate('Volumen');
        $colVoluPiez->Html = '<?= $_ITEM->Volumen; ?>';
        $this->dtgPiezGuia->AddColumn($colVoluPiez);

    }

    public function dtgPiezGuia_IdxxPiez_Render(GuiaPiezas $objGuiaPiez) {
        $strIdxxPiez = explode('-',$objGuiaPiez->IdPieza)[1];
        return utf8_encode($strIdxxPiez);
    }

    public function dtgPiezGuia_GuiaTran_Render(GuiaPiezas $objGuiaPiez) {
        $objGuiaTran = GuiaTransportista::LoadByGuiaPiezaId($objGuiaPiez->Id);
        return ($objGuiaTran) ? $objGuiaTran->Guia : '';
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $_SESSION['GuiaCamb'] = $this->objGuia->Id;
        $_SESSION['GuiaCalc'] = $this->objGuia->Id;

        $strTextBoto   = TextoIcono('plus','Acciones');
        $arrOpciDrop   = array();
        //$arrOpciDrop[] = OpcionDropDown(__SIST__.'/ver_calculos.php',TextoIcono(__iOJOS__,'Ver Calculos'));
        if ($this->objGuia->sistema() != 'RET') {
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/consulta_guia_new.php/'.$this->objGuia->Id.'/cc',
                TextoIcono(__iEDIT__,'Calcular Conceptos')
            );
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/consulta_guia_new.php/'.$this->objGuia->Id.'/ne',
                TextoIcono('print fa-lg','Imprimir Nota de Entrega')
            );
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/consulta_guia_new.php/'.$this->objGuia->Id.'/ie',
                TextoIcono('clone fa-lg','Imprimir Etiqueta (con Logo)')
            );
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/consulta_guia_new.php/'.$this->objGuia->Id.'/es',
                TextoIcono('clone fa-lg','Imprimir Etiqueta (sin Logo)')
            );
        }

        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop);

    }

    protected function lblSistGuia_Create() {
        $this->lblSistGuia = new QLabel($this);
        $this->lblSistGuia->Text = $this->objGuia->sistema();
    }

    protected function btnGuiaOrig_Create() {
        $this->btnGuiaOrig = new QButtonI($this);
        $this->btnGuiaOrig->Text = TextoIcono(__iINFO__,'G.Orig');
        $this->btnGuiaOrig->ToolTip = 'Permite consultar la Guia Original';
        $this->btnGuiaOrig->AddAction(new QClickEvent(), new QAjaxAction('btnGuiaOrig_Click'));
        $this->btnGuiaOrig->Visible = false;
    }

    protected function lblBotoPopu_Create() {
        $this->lblBotoPopu = new QLabel($this);
        $this->lblBotoPopu->Text = $this->recrearBotonPopup();
        $this->lblBotoPopu->HtmlEntities = false;
        $this->lblBotoPopu->CssClass = '';
        $this->lblBotoPopu->Visible = false;
    }

    protected function lblPopuModa_Create() {
        $this->lblPopuModa = new QLabel($this);
        $this->lblPopuModa->Text = $this->recrearPopupModal();
        $this->lblPopuModa->HtmlEntities = false;
        $this->lblPopuModa->CssClass = '';
    }

    protected function recrearBotonPopup() {
        $strTextModa =
            "<button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\">
                <i class=\"fa fa-".__iINFO__." fa-lg\"></i> Errores 
            </button>";
        return $strTextModa;
    }

    protected function recrearPopupModal() {
        $strTextModa = '
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Errores grabando PODs</h4>
              </div>
              <div class="modal-body">';
        $strTextModa .= $this->strErroProc;
        $strTextModa .= '</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>';
        return $strTextModa;
    }

    protected function lblQuieReci_Create() {
        $this->lblQuieReci = new QLabel($this);
        $this->lblQuieReci->Text = 'Quien Recibio ?';
        $this->lblQuieReci->Visible = false;
    }

    protected function txtQuieReci_Create() {
        $this->txtQuieReci = new QTextBox($this);
        $this->txtQuieReci->Width = 250;
        $this->txtQuieReci->Visible = false;
        $this->txtQuieReci->Required = true;
        $strQuieReci = 'N/A';
        if (!is_null($this->objGuia->GuiaPodId)) {
            $strQuieReci = $this->objGuia->GuiaPod->EntregadoA;
        }
        $this->txtQuieReci->Text = $strQuieReci;
        $this->txtQuieReci->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function lblFechEnt1_Create() {
        $this->lblFechEnt1 = new QLabel($this);
        $this->lblFechEnt1->Text = 'Fecha Entrega';
        $this->lblFechEnt1->Visible = false;
    }

    protected function dttFechEntr_Create() {
        $this->dttFechEntr = new QCalendar($this);
        $this->dttFechEntr->Width = 100;
        $this->dttFechEntr->Required = true;
        $dttFechEntr = null;
        if (!is_null($this->objGuia->GuiaPodId)) {
            $dttFechEntr = $this->objGuia->GuiaPod->FechaEntrega;
        }
        $this->dttFechEntr->DateTime = new QDateTime($dttFechEntr);
        $this->dttFechEntr->Visible = false;
    }

    protected function lblHoraEntr_Create() {
        $this->lblHoraEntr = new QLabel($this);
        $this->lblHoraEntr->Text = 'Hora Entrega';
        $this->lblHoraEntr->Visible = false;
    }

    protected function txtHoraEntr_Create() {
        $this->txtHoraEntr = new QTextBox($this);
        $this->txtHoraEntr->Required = true;
        $this->txtHoraEntr->Width = 60;
        $strHoraEntr = 'N/A';
        if (!is_null($this->objGuia->GuiaPodId)) {
            $strHoraEntr = $this->objGuia->GuiaPod->HoraEntrega;
        }
        $this->txtHoraEntr->Text = $strHoraEntr;
        $this->txtHoraEntr->Visible = false;
    }

    protected function lblVariGuia_Create() {
        $this->lblVariGuia = new QLabel($this);
        $this->lblVariGuia->Text = 'Misma Info p/varias Guías ?';
        $this->lblVariGuia->Visible = false;
    }

    protected function chkVariGuia_Create() {
        $this->chkVariGuia = new QCheckBox($this);
        $this->chkVariGuia->Visible = false;
        $this->chkVariGuia->AddAction(new QChangeEvent(), new QAjaxAction('chkVariGuia_Change'));
    }

    protected function lblOtraGuia_Create() {
        $this->lblOtraGuia = new QLabel($this);
        $this->lblOtraGuia->Text = 'Otras Guias';
        $this->lblOtraGuia->Visible = false;
    }

    protected function txtOtraGuia_Create() {
        $this->txtOtraGuia = new QTextBox($this);
        $this->txtOtraGuia->TextMode = QTextMode::MultiLine;
        $this->txtOtraGuia->Width = 200;
        $this->txtOtraGuia->Rows = 3;
        $this->txtOtraGuia->Visible = false;
    }

    protected function btnGrabPodx_Create() {
        $this->btnGrabPodx = new QButtonS($this);
        $this->btnGrabPodx->Text = TextoIcono(__iFLOP__,'Guardar');
        $this->btnGrabPodx->Visible = false;
        $this->btnGrabPodx->AddAction(new QClickEvent(), new QAjaxAction('btnGrabPodx_Click'));
    }

    protected function btnInfoPodx_Create() {
        $this->btnInfoPodx = new QButtonS($this);
        $this->btnInfoPodx->Text = TextoIcono(__iCHEC__,'Liq. POD');
        $this->btnInfoPodx->AddAction(new QClickEvent(), new QAjaxAction('btnInfoPodx_Click'));
        $this->btnInfoPodx->ActionParameter = 'POD';
    }

    protected function btnTrazTari_Create() {
        $this->btnTrazTari = new QButtonS($this);
        $this->btnTrazTari->Text = TextoIcono(__iOJOS__,'TT');
        $this->btnTrazTari->AddAction(new QClickEvent(), new QAjaxAction('btnTrazTari_Click'));
    }

    protected function lblSucuOrig_Create() {
        $this->lblSucuOrig = new QLabel($this);
        $this->lblSucuOrig->Name = 'Origen';
        $strSucuOrig = $this->objGuia->Origen->Iata;
        if ($this->objGuia->sistema() == 'RET') {
            if ($this->objGuia->ReceptoriaOrigenId) {
                $strSucuOrig .= ' ('.$this->objGuia->ReceptoriaOrigen->Siglas.')';
            }
        }
        $this->lblSucuOrig->Text = $strSucuOrig;
    }

    protected function lblNombRemi_Create() {
        $this->lblNombRemi = new QLabel($this);
        $this->lblNombRemi->Name = 'Remitente';
        $_SESSION['DataClie'] = serialize(array($this->objGuia->cliente()));
        $this->lblNombRemi->Text = $this->objGuia->NombreRemitente;
        $this->lblNombRemi->HtmlEntities = false;
    }

    protected function lblDireRemi_Create() {
        $this->lblDireRemi = new QLabel($this);
        $this->lblDireRemi->Name = 'Dir. Remitente';
        $this->lblDireRemi->Text = QuitarCaracteresEspeciales2(substr(utf8_decode($this->objGuia->DireccionRemitente),0,115));
        $this->lblDireRemi->ToolTip = QuitarCaracteresEspeciales2(utf8_decode($this->objGuia->DireccionRemitente));
    }

    protected function lblTeleRemi_Create() {
        $this->lblTeleRemi = new QLabel($this);
        $this->lblTeleRemi->Name = 'Tlf. Remitente';
        $this->lblTeleRemi->Text = substr($this->objGuia->TelefonoRemitente,0,15);
        $this->lblTeleRemi->ToolTip = $this->objGuia->TelefonoRemitente;
    }

    // ---- Información del Destinatario ---- //
    protected function lblSucuDest_Create() {
        $this->lblSucuDest = new QLabel($this);
        $this->lblSucuDest->Name = 'Destino';
        $strSucuDest = $this->objGuia->Destino->Iata;
        if ($this->objGuia->sistema() == 'RET') {
            if ($this->objGuia->ReceptoriaDestinoId) {
                $strSucuDest .= ' ('.$this->objGuia->ReceptoriaDestino->Siglas.')';
            }
        }
        if (in_array($this->objGuia->Producto->Codigo,['IMP'])) {
            $strSucuDest .= ' (Zona: '.$this->objGuia->Destino->Zona.')';
        }
        $this->lblSucuDest->Text = $strSucuDest;
    }

    protected function lblNombDest_Create() {
        $this->lblNombDest = new QLabel($this);
        $this->lblNombDest->Name = 'Destinatario';
        $this->lblNombDest->Text = $this->objGuia->NombreDestinatario;
    }

    protected function lblDireDest_Create() {
        $this->lblDireDest = new QLabel($this);
        $this->lblDireDest->Name = 'Dir. Destinatario';
        $this->lblDireDest->Text = QuitarCaracteresEspeciales2(substr(utf8_decode($this->objGuia->DireccionDestinatario),0,115));
        $this->lblDireDest->ToolTip = QuitarCaracteresEspeciales2(utf8_decode($this->objGuia->DireccionDestinatario));
    }

    protected function lblTeleDest_Create() {
        $this->lblTeleDest = new QLabel($this);
        $this->lblTeleDest->Name = 'Tlf. Destinatario';
        $this->lblTeleDest->Text = $this->objGuia->TelefonoDestinatario;
    }

    // -------- Costos del Servicio -------- //
    protected function lblTipoTari_Create() {
        $this->lblTipoTari = new QLabel($this);
        switch ($this->objGuia->Producto->Codigo) {
            case 'IMP':
                $objTariGuia = TarifaAgentes::Load($this->objGuia->TarifaAgenteId);
                if ($objTariGuia) {
                    $this->lblTipoTari->Text = $objTariGuia->Nombre;
                } else {
                    $this->lblTipoTari->Text = 'N/A';
                }
                break;
            case 'NAC':
                $objTariGuia = FacTarifa::Load($this->objGuia->TarifaId);
                if ($objTariGuia) {
                    $this->lblTipoTari->Text = $objTariGuia->Descripcion;
                } else {
                    $this->lblTipoTari->Text = 'N/A';
                }
                break;
            case 'EXP':
                $this->lblTipoTari->Text = 'N/A';
                break;
            default:
                $this->lblTipoTari->Text = 'N/A';
        }
    }

    protected function lblSeguGuia_Create() {
        $this->lblSeguGuia = new QLabel($this);
        $this->lblSeguGuia->Text = $this->objGuia->Asegurado ? 'SI' : 'NO';
    }

    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Text = nf($this->objGuia->Total);
    }

    // * * Lado Inferior del Formulario * * //
    // ------ Información del Envío ------- //

    protected function lblNumeGuia_Create() {
        $this->lblNumeGuia = new QLabel($this);
        $this->lblNumeGuia->Name = 'Guía #';
        $this->lblNumeGuia->Text = $this->objGuia->Tracking;
        $this->lblNumeGuia->HtmlEntities = false;
    }

    protected function lblFechGuia_Create() {
        $this->lblFechGuia = new QLabel($this);
        $this->lblFechGuia->Name = 'Fecha';
        $this->lblFechGuia->Text = substr($this->objGuia->CreatedAt,0,10); //->__toString("DD/MM/YYYY");
    }

    protected function lblDescCont_Create() {
        $this->lblDescCont = new QLabel($this);
        $this->lblDescCont->Name = 'Contenido';
        $this->lblDescCont->Text = substr($this->objGuia->Contenido, 0,10);
        $this->lblDescCont->ToolTip = $this->objGuia->Contenido;
    }

    protected function lblFormPago_Create() {
        $this->lblFormPago = new QLabel($this);
        $this->lblFormPago->Name = 'M. Pago';
        $this->lblFormPago->Text = $this->objGuia->FormaPago;
    }

    protected function lblCodiProd_Create() {
        $this->lblCodiProd = new QLabel($this);
        $this->lblCodiProd->Name = 'Producto';
        $this->lblCodiProd->Text = $this->objGuia->Producto->Codigo;
    }

    protected function lblPiezPeso_Create() {
        $this->lblPiezPeso = new QLabel($this);
        $this->lblPiezPeso->Name = 'Piezas/Peso';
        $strPiezGuia = $this->objGuia->Piezas;
        $strPesoGuia = $this->objGuia->ServicioImportacion == 'AER' ? $this->objGuia->Kilos : $this->objGuia->PiesCub;
        $strUnidPeso = $this->objGuia->ServicioImportacion == 'AER' ? 'Kg' : 'P3';
        $this->lblPiezPeso->Text = $strPiezGuia.' / '.$strPesoGuia.' ('.$strUnidPeso.')';
    }

    protected function lblValoDecl_Create() {
        $this->lblValoDecl = new QLabel($this);
        $this->lblValoDecl->Name = 'V. Declarado';
        $this->lblValoDecl->Text = $this->objGuia->ValorDeclarado." Bs";
    }

    protected function lblPersEntr_Create() {
        $this->lblPersEntr = new QLabel($this);
        $strEntrAqui = 'N/A';
        if (!is_null($this->objGuia->GuiaPod)) {
            $strEntrAqui = $this->objGuia->GuiaPod->EntregadoA;
        }
        $this->lblPersEntr->Text = substr($strEntrAqui, 0, 10);
        $this->lblPersEntr->ToolTip = $strEntrAqui;
    }

    protected function lblFechEntr_Create() {
        $this->lblFechEntr = new QLabel($this);
        $strFechEntr = 'N/A';
        if (!is_null($this->objGuia->GuiaPod)) {
            $strFechEntr = $this->objGuia->GuiaPod->FechaEntrega->__toString("DD/MM/YY");
        }
        $this->lblFechEntr->ToolTip = $strFechEntr;
    }

    protected function lblTextObse_Create() {
        $this->lblTextObse = new QLabel($this);
        $this->lblTextObse->Text = substr($this->objGuia->Observacion, 0,10);
        $this->lblTextObse->ToolTip = $this->objGuia->Observacion;
    }

    protected function lblCreaPorx_Create() {
        $this->lblCreaPorx = new QLabel($this);
        $strUsuaCrea = 'N/A';
        if (!is_null($this->objGuia->CreatedBy)) {
            $objUsuaCrea = Usuario::Load($this->objGuia->CreatedBy);
            $strUsuaCrea = $objUsuaCrea->LogiUsua;
        }
        $this->lblCreaPorx->Text = $strUsuaCrea;
    }

    protected function lblGuiaTran_Create() {
        $this->lblGuiaTran = new QLabel($this);
        $arrPiezGuia = $this->objGuia->GetGuiaPiezasAsGuiaArray();
        $strGuiaTran = '';
        foreach ($arrPiezGuia as $objPiezGuia) {
            $objGuiaTran = GuiaTransportista::LoadByGuiaPiezaId($objPiezGuia->Id);
            if ($objGuiaTran) {
                $strGuiaTran .= $objGuiaTran->Guia.' | ';
            }
        }
        $this->lblGuiaTran->Text = substr($strGuiaTran,0,10);
    }

    protected function txtTextCome_Create() {
        $this->txtTextCome = new QTextBox($this);
        $this->txtTextCome->Text = $this->objRegiTrab->Comentario;
        $this->txtTextCome->Width = '100%';
        $this->txtTextCome->AddAction(new QFocusEvent(), new QAjaxAction('txtTextCome_Focus'));
        $this->txtTextCome->AddAction(new QBlurEvent(), new QAjaxAction('txtTextCome_Blur'));
    }

    protected function lblNotaEntr_Create() {
        $this->lblNotaEntr = new QLabel($this);
        $this->lblNotaEntr->Text = $this->objGuia->NotaEntregaId ? $this->objGuia->NotaEntrega->Referencia : null;
    }

    protected function lblServImpo_Create() {
        $this->lblServImpo = new QLabel($this);
        $this->lblServImpo->Text = strlen($this->objGuia->ServicioImportacion) ? $this->objGuia->ServicioImportacion : null;
    }

    protected function lblNumeFact_Create() {
        $this->lblNumeFact = new QLabel($this);
        $this->lblNumeFact->Text = $this->objGuia->NroFactura();
    }


    protected function dtgGuiaCkpt_Create() {
        $this->dtgGuiaCkpt = new QDataGrid($this);
        $this->dtgGuiaCkpt->FontSize = 12;
        $this->dtgGuiaCkpt->ShowFilter = false;

        $this->dtgGuiaCkpt->CssClass = 'datagrid';
        $this->dtgGuiaCkpt->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaCkpt->UseAjax = true;

        $this->dtgGuiaCkpt->SetDataBinder('dtgGuiaCkpt_Bind');

        $this->createDtgGuiaCkptColumns();
    }


    protected function dtgRegiTrab_Create() {
        $this->dtgRegiTrab = new QDataGrid($this);
        $this->dtgRegiTrab->FontSize = 12;
        $this->dtgRegiTrab->ShowFilter = false;

        $this->dtgRegiTrab->CssClass = 'datagrid';
        $this->dtgRegiTrab->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgRegiTrab->UseAjax = true;

        $this->dtgRegiTrab->SetDataBinder('dtgRegiTrab_Bind');

        $this->createDtgRegiTrabColumns();
    }

    protected function dtgConcGuia_Create() {
        $this->dtgConcGuia = new QDataGrid($this);
        $this->dtgConcGuia->FontSize = 12;
        $this->dtgConcGuia->ShowFilter = false;

        $this->dtgConcGuia->CssClass = 'datagrid';
        //$this->dtgConcGuia->AlternateRowStyle->CssClass = 'alternate';

        //$this->dtgConcGuia->UseAjax = true;

        $this->dtgConcGuia->SetDataBinder('dtgConcGuia_Bind');

        $this->createDtgConcGuiaColumns();
    }

    // * * * * Botónes del Formulario * * * * //

    protected function btnEditGuia_Create() {
        $this->btnEditGuia = new QButtonP($this);
        $this->btnEditGuia->Text = TextoIcono(__iEDIT__,'Edtr');
        $this->btnEditGuia->AddAction(new QClickEvent(), new QAjaxAction('btnEditGuia_Click'));
    }

    protected function btnImprGuia_Create() {
        $this->btnImprGuia = new QButtonI($this);
        $this->btnImprGuia->Text = TextoIcono('print fa-lg','Imp');
        $this->btnImprGuia->AddAction(new QClickEvent(), new QAjaxAction('btnImprGuia_Click'));
    }

    protected function btnSaveCome_Create() {
        $this->btnSaveCome = new QButtonS($this);
        $this->btnSaveCome->Text = TextoIcono('check fa-lg','');
        $this->btnSaveCome->AddAction(new QClickEvent(), new QAjaxAction('btnSaveCome_Click'));
    }

    // ---- Botónes de Navegación Medianos ---- //

    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
        $this->btnProxRegi->Text = TextoIcono('angle-right fa-lg','','P');
        $this->btnProxRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        $this->btnRegiAnte->Text = TextoIcono('angle-left fa-lg','');
        $this->btnRegiAnte->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        $this->btnPrimRegi->Text = TextoIcono('angle-double-left fa-lg','');
        $this->btnPrimRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        $this->btnUltiRegi->Text = TextoIcono('angle-double-right fa-lg','','P');
        $this->btnUltiRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    // ---- Botónes de Navegación Pequeños ---- //

    protected function btnPrimSmal_Create() {
        $this->btnPrimSmal = new QButton($this);
        $this->btnPrimSmal->Text = TextoIcono('angle-double-left fa-lg','');
        $this->btnPrimSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimSmal->HtmlEntities = false;
        $this->btnPrimSmal->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnAnteSmal_Create() {
        $this->btnAnteSmal = new QButton($this);
        $this->btnAnteSmal->Text = TextoIcono('angle-left fa-lg','');
        $this->btnAnteSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnAnteSmal->HtmlEntities = false;
        $this->btnAnteSmal->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnProxSmal_Create() {
        $this->btnProxSmal = new QButton($this);
        $this->btnProxSmal->Text = TextoIcono('angle-right fa-lg','');
        $this->btnProxSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxSmal->HtmlEntities = false;
        $this->btnProxSmal->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnUltiSmal_Create() {
        $this->btnUltiSmal = new QButton($this);
        $this->btnUltiSmal->Text = TextoIcono('angle-double-right fa-lg','');
        $this->btnUltiSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiSmal->HtmlEntities = false;
        $this->btnUltiSmal->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnInfoPodx_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        $this->chkVariGuia->Checked = false;
        $this->txtOtraGuia->Text = '';
        $this->txtOtraGuia->Visible = false;
        $this->lblBotoPopu->Visible = false;
        $blnMostPodx = $strParameter == 'POD';
        if ($blnMostPodx) {
            $this->btnInfoPodx->ActionParameter = 'GUIA';
            $this->btnInfoPodx->Text = TextoIcono(__iOJOS__,'Deta. Guia');
        } else {
            $this->btnInfoPodx->ActionParameter = 'POD';
            $this->btnInfoPodx->Text = TextoIcono(__iCHEC__,'Liq. POD');
        }
        $_SESSION['MostPodx'] = $blnMostPodx;
        //----------------------------------
        // Se oculta el detalle de la Guia
        //----------------------------------
        $this->txtTextCome->Visible = !$blnMostPodx;
        $this->btnSaveCome->Visible = !$blnMostPodx;
        //$this->dtgGuiaCkpt->Visible = !$blnMostPodx;
        $this->dtgRegiTrab->Visible = !$blnMostPodx;
        //------------------------------------------------------------
        // Se ocultan tambien los botones de la consulta de la guia
        //------------------------------------------------------------
        $this->btnEditGuia->Visible = !$blnMostPodx;
        $this->btnImprGuia->Visible = !$blnMostPodx;
        //------------------------------------------------------
        // Se muestran los campos para capturar la info del POD
        //------------------------------------------------------
        $this->lblQuieReci->Visible = $blnMostPodx;
        $this->txtQuieReci->Visible = $blnMostPodx;
        $this->lblFechEnt1->Visible = $blnMostPodx;
        $this->dttFechEntr->Visible = $blnMostPodx;
        $this->lblHoraEntr->Visible = $blnMostPodx;
        $this->txtHoraEntr->Visible = $blnMostPodx;
        $this->lblVariGuia->Visible = $blnMostPodx;
        $this->chkVariGuia->Visible = $blnMostPodx;
        $this->btnGrabPodx->Visible = $blnMostPodx;
    }

    protected function chkVariGuia_Change() {
        if ($this->chkVariGuia->Checked) {
            $this->lblOtraGuia->Visible = true;
            $this->txtOtraGuia->Visible = true;
        } else {
            $this->lblOtraGuia->Visible = false;
            $this->txtOtraGuia->Visible = false;
            $this->txtOtraGuia->Text = '';
        }
    }


    protected function btnGrabPodx_Click() {
        $objCkptOkey = Checkpoints::LoadByCodigo('OK');
        $dttFechPodx = new QDateTime(QDateTime::Now);
        $txtHoraPodx = date("H:i");
        $strUsuaPodx = $this->objUsuario->CodiUsua;
        $intCantGuia = 1;
        $intCantProc = 0;
        $intCantErro = 0;
        $this->strErroProc = '';
        //------------------------------------------------------
        // Vector de parametros para Grabar el POD en la Guia
        //------------------------------------------------------
        $arrDatoPodx['objGuiaPodx'] = $this->objGuia;
        $arrDatoPodx['objChecPodx'] = $objCkptOkey;
        $arrDatoPodx['calFechPodx'] = $dttFechPodx;
        $arrDatoPodx['txtHoraPodx'] = $txtHoraPodx;
        $arrDatoPodx['txtUsuaPodx'] = $strUsuaPodx;
        $arrDatoPodx['objUsuaPodx'] = $this->objUsuario;
        $arrDatoPodx['txtEntrAqui'] = $this->txtQuieReci->Text;
        $arrDatoPodx['calFechEntr'] = $this->dttFechEntr->DateTime;
        $arrDatoPodx['txtFechEntr'] = $this->dttFechEntr->DateTime->__toString("YYYY-MM-DD");
        $arrDatoPodx['txtHoraEntr'] = $this->txtHoraEntr->Text;
        $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
        if ($arrResuPodx['blnTodoOkey'] == false) {
            $intCantErro++;
            $this->strErroProc .= $this->objGuia->Numero." ".$arrResuPodx['strMensUsua']."<br>";
        } else {
            $intCantProc++;
            $this->lblPersEntr->Text = substr($this->txtQuieReci->Text, 0, 10);
            $this->lblPersEntr->ToolTip = $this->txtQuieReci->Text;
            $this->lblFechEntr->Text = $this->dttFechEntr->DateTime->__toString("DD/MM/YYYY");
            $this->lblFechEntr->ToolTip = $this->dttFechEntr->DateTime->__toString("DD/MM/YYYY") . " " . $this->txtHoraEntr->Text;
        }
        //----------------------------------------------------------------
        // Si se especificaron Guias adicionales, aqui se procesan todas
        //----------------------------------------------------------------
        if (strlen($this->txtOtraGuia->Text) > 0) {
            $arrVariGuia = explode(',',nl2br2($this->txtOtraGuia->Text));
            $this->txtOtraGuia->Text = '';
            $arrVariGuia = array_unique($arrVariGuia,SORT_STRING);
            //---------------------------------------------------------------------
            // Una vez que hemos "limipiado" la lista, se procesa guia por guia
            //---------------------------------------------------------------------
            $intCantGuia = count($arrVariGuia);
            foreach ($arrVariGuia as $strNumeGuia) {
                if (strlen($strNumeGuia) > 0) {
                    $objGuia = Guias::LoadByNumero($strNumeGuia);
                    if ($objGuia) {
                        $arrDatoPodx['objGuiaPodx'] = $objGuia;
                        $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
                        $this->txtOtraGuia->Text .= $strNumeGuia." ".$arrResuPodx['strMensUsua'].chr(13);
                        if ($arrResuPodx['blnTodoOkey'] == false) {
                            $this->strErroProc .= $this->objGuia->Numero." ".$arrResuPodx['strMensUsua'];
                            $intCantErro++;
                        } else {
                            $intCantProc++;
                        }
                    } else {
                        $this->txtOtraGuia->Text .= $strNumeGuia." (NO EXISTE)".chr(13);
                        $this->strErroProc .= $strNumeGuia." (NO EXISTE)<br>";
                        $intCantErro++;
                    }
                }
            }
        }
        $strTextAdic = '';
        $strClasMens = 's';
        $strIconMens = __iCHEC__;
        if ($intCantErro > 0) {
            $strClasMens = 'w';
            $strIconMens = __iEXCL__;
            $this->lblPopuModa->Text = $this->recrearPopupModal();
            $this->lblBotoPopu->Visible = true;
            $strTextAdic = 'Presione <strong>Errores</strong>, para mayor información';
        } else {
            $this->lblBotoPopu->Visible = false;
        }
        $strTextMens = 'Guia(s) p/grabar POD: '.$intCantGuia.'.  Con Éxito: '.$intCantProc.'.  Con Error: '.$intCantErro.'. '.$strTextAdic;
        $this->mensaje($strTextMens,'m',$strClasMens,'',$strIconMens);
    }

    protected function txtTextCome_Focus() {
        $strTextMens = 'Recuerde que no se permiten acentos ni caracteres especiales en el Comentario';
        $this->mensaje($strTextMens,'m','i','',__iINFO__);
    }

    protected function txtTextCome_Blur() {
        $this->txtTextCome->Text = strtoupper($this->txtTextCome->Text);
        $this->mensaje();
    }

    protected function btnSaveCome_Click() {
        $strTextCome = $this->txtTextCome->Text;
        if (strlen($strTextCome) > 10) {
            $this->objRegiTrab->Comentario = strtoupper(QuitarCaracteresEspeciales2($strTextCome));
            $this->objRegiTrab->Save();
            $this->mensaje();
        } else {
            $this->danger('El Comentario debe tener al menos 10 caracteres');
            $this->txtTextCome->SetFocus();
        }
        $this->dtgRegiTrab->Refresh();
    }

    protected function CrearRegistroDeTrabajo() {
        $objCodiCkpt = Checkpoints::LoadByCodigo('CG');
        if ($objCodiCkpt) {
            $objRegiTrab = new RegistroTrabajo();
            $objRegiTrab->GuiaId       = $this->objGuia->Id;
            $objRegiTrab->Comentario   = QApplication::Translate('CONSULTO LA GUIA');
            $objRegiTrab->UsuarioId    = $this->objUsuario->CodiUsua;
            $objRegiTrab->Fecha        = new QDateTime(QDateTime::Now);
            $objRegiTrab->Hora         = date("H:i:s");
            $objRegiTrab->SucursalId   = $this->objUsuario->SucursalId;
            $objRegiTrab->CheckpointId = $objCodiCkpt->Id;
            $objRegiTrab->Save();
            return $objRegiTrab;
        } else {
            t('No existe el checkpoint CG...');
            return null;
        }
    }

    protected function dtgGuiaCkpt_Bind() {
        $objCondicion = QQ::Clause();
        $objCondicion[] = QQ::Equal(QQN::PiezaCheckpoints()->Pieza->GuiaId,$this->objGuia->Id);
        $objClauses = array();
        if ($objClause = $this->dtgGuiaCkpt->OrderByClause)
            array_push($objClauses, $objClause);
        if ($objClause = $this->dtgGuiaCkpt->LimitClause)
            array_push($objClauses, $objClause);
        $this->dtgGuiaCkpt->DataSource = PiezaCheckpoints::QueryArray(
            QQ::AndCondition($objCondicion),
            QQ::Clause(
                QQ::OrderBy(
                    QQN::PiezaCheckpoints()->Id,false
                )
            )
        );
    }

    protected function createDtgGuiaCkptColumns() {
        $colIdxxPiez = new QDataGridColumn($this);
        $colIdxxPiez->Name = QApplication::Translate('Pza');
        $colIdxxPiez->Html = '<?= $_FORM->dtgGuiaCkpt_IdxxPiez_Render($_ITEM) ?>';
        $this->dtgGuiaCkpt->AddColumn($colIdxxPiez);

        $colCodiSucu = new QDataGridColumn($this);
        $colCodiSucu->Name = QApplication::Translate('SUC');
        $colCodiSucu->Html = '<?= $_ITEM->Sucursal->Iata; ?>';
        $this->dtgGuiaCkpt->AddColumn($colCodiSucu);

        $colTextObse = new QDataGridColumn($this);
        $colTextObse->Name = QApplication::Translate('Comentario');
        $colTextObse->Html = '<?= $_FORM->dtgGuiaCkpt_TextObse_Render($_ITEM); ?>';
        $colTextObse->Width = 350;
        $this->dtgGuiaCkpt->AddColumn($colTextObse);

        $colFechCkpt = new QDataGridColumn($this);
        $colFechCkpt->Name = QApplication::Translate('Fecha/Hora');
        $colFechCkpt->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY"); ?>';
        $this->dtgGuiaCkpt->AddColumn($colFechCkpt);

        $colUsuaCkpt = new QDataGridColumn($this);
        $colUsuaCkpt->Name = QApplication::Translate('Usuario');
        $colUsuaCkpt->Html = '<?= $_FORM->dtgGuiaCkpt_CodiUsua_Render($_ITEM); ?>';
        $colUsuaCkpt->Width = 15;
        $this->dtgGuiaCkpt->AddColumn($colUsuaCkpt);

        $colCodiRuta = new QDataGridColumn($this);
        $colCodiRuta->Name = QApplication::Translate('Ruta');
        $colCodiRuta->Html = '<?= $_FORM->dtgGuiaCkpt_CodiRuta_Render($_ITEM); ?>';
        $colCodiRuta->Width = 15;
        $this->dtgGuiaCkpt->AddColumn($colCodiRuta);
    }

    public function dtgGuiaCkpt_IdxxPiez_Render(PiezaCheckpoints $objPiezCkpt) {
        $strIdxxPiez = explode('-',$objPiezCkpt->Pieza->IdPieza)[1];
        return utf8_encode($strIdxxPiez);
    }

    public function dtgGuiaCkpt_TextObse_Render(PiezaCheckpoints $objPiezCkpt) {
        $strCodiCkpt = $objPiezCkpt->Checkpoint->Codigo;
        $strTextObse = $objPiezCkpt->Comentario;
        if (strlen($strTextObse) > 0) {
            //$strTextObse = '('.$strCodiCkpt.') '.limpiarCadena($strTextObse);
            $strTextObse = '('.$strCodiCkpt.') '.trim($strTextObse);
        }
        return utf8_encode($strTextObse);
    }

    public function dtgGuiaCkpt_CodiUsua_Render(PiezaCheckpoints $objPiezCkpt) {
        if (!is_null($objPiezCkpt->CreatedBy)) {
            $objUsuaCkpt = Usuario::Load($objPiezCkpt->CreatedBy);
            if ($objUsuaCkpt) {
                return $objUsuaCkpt->__toString();
            } else {
                //------------------------
                // Se trata de un Chofer
                //------------------------
                $objUsuaCkpt = Chofer::Load($objPiezCkpt->CreatedBy);
                return $objUsuaCkpt->Login;
            }
        } else {
            return null;
        }
    }

    public function dtgGuiaCkpt_CodiRuta_Render(PiezaCheckpoints $objPiezCkpt) {
        if (!is_null($objPiezCkpt->RutaId)) {
            return $objPiezCkpt->Ruta->Codigo;
        } else {
            return null;
        }
    }

    // ---- DataGrid de Actividad(es) de la Guía ---- //

    public function dtgRegiTrab_CodiUsuaObject_Render(RegistroTrabajo $objRegiTrab) {
        if (!is_null($objRegiTrab->Usuario))
            return $objRegiTrab->Usuario->__toString();
        else
            return null;
    }

    protected function dtgRegiTrab_Bind() {
        $objCondicion = QQ::Clause();
        $objCondicion[] = QQ::Equal(QQN::RegistroTrabajo()->GuiaId, $this->objGuia->Id);
        $this->dtgRegiTrab->DataSource = RegistroTrabajo::QueryArray(
            QQ::AndCondition($objCondicion),
            QQ::Clause(QQ::OrderBy(
                QQN::RegistroTrabajo()->Fecha,
                false,
                QQN::RegistroTrabajo()->Hora,
                false)
            )
        );
    }

    protected function createDtgRegiTrabColumns() {
        $colCodiSucu = new QDataGridColumn($this);
        $colCodiSucu->Name = QApplication::Translate('SUC');
        $colCodiSucu->Html = '<?= $_ITEM->Sucursal->Iata; ?>';
        $colCodiSucu->HorizontalAlign = QHorizontalAlign::Center;
        $this->dtgRegiTrab->AddColumn($colCodiSucu);

        $colTextCome = new QDataGridColumn($this);
        $colTextCome->Name = QApplication::Translate('COMENTARIO');
        $colTextCome->Html = '<?= $_ITEM->Comentario; ?>';
        $colTextCome->Width = 750;
        $this->dtgRegiTrab->AddColumn($colTextCome);

        $colFechCome = new QDataGridColumn($this);
        $colFechCome->Name = QApplication::Translate('FECHA');
        $colFechCome->Html = '<?= $_ITEM->Fecha->__toString("DD/MM/YYYY"); ?>';
        $this->dtgRegiTrab->AddColumn($colFechCome);

        $colHoraCome = new QDataGridColumn($this);
        $colHoraCome->Name = QApplication::Translate('HORA');
        $colHoraCome->Html = '<?= $_ITEM->Hora; ?>';
        $colHoraCome->Width = 20;
        $this->dtgRegiTrab->AddColumn($colHoraCome);

        $colUsuaRegi = new QDataGridColumn($this);
        $colUsuaRegi->Name = QApplication::Translate('USUARIO');
        $colUsuaRegi->Html = '<?= $_FORM->dtgRegiTrab_CodiUsuaObject_Render($_ITEM); ?>';
        $this->dtgRegiTrab->AddColumn($colUsuaRegi);
    }

    //-----------------------
    // Conceptos de la Guia
    //-----------------------

    protected function dtgConcGuia_Bind() {
        $objCondicion   = QQ::Clause();
        $objCondicion[] = QQ::Equal(QQN::GuiaConceptos()->GuiaId, $this->objGuia->Id);
        $this->dtgConcGuia->DataSource = GuiaConceptos::QueryArray(
            QQ::AndCondition($objCondicion),
            QQ::Clause(QQ::OrderBy(
                QQN::GuiaConceptos()->Concepto->Orden)
            )
        );
    }


    protected function createDtgConcGuiaColumns() {
        $colMostComo = new QDataGridColumn($this);
        $colMostComo->Name = QApplication::Translate('CONCEPTO');
        $colMostComo->Html = '<?= $_ITEM->MostrarComo; ?>';
        $colMostComo->Width = 1800;
        $colMostComo->HorizontalAlign = QHorizontalAlign::Left;
        $this->dtgConcGuia->AddColumn($colMostComo);

        $colMontConc = new QDataGridColumn($this);
        $colMontConc->Name = QApplication::Translate('MONTO');
        $colMontConc->Html = '<?= nf($_ITEM->Monto); ?>';
        $colMontConc->Width = 200;
        $colMontConc->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgConcGuia->AddColumn($colMontConc);

    }

    // ---- Botónes ---- //
    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia_new.php/'.$objRegiTabl->Id);
    }

    protected function btnEditGuia_Click() {
        QApplication::Redirect(__SIST__.'/guias_edit.php/'.$this->objGuia->Id);
    }

    protected function btnImprGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_pdf.php?strNumeGuia=' . $this->objGuia->Id);
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    //-------------------------------
    // Otras Funciones del Programa
    //-------------------------------

    protected function verificarNavegacion() {
        $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
        $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
        $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
    }

    protected function determinarPosicion() {
        if (isset($_SESSION['DataGuia'])) {
            $this->arrDataTabl = unserialize($_SESSION['DataGuia']);
            $this->intCantRegi = count($this->arrDataTabl);
            //-------------------------------------------------------------------------------
            // Se determina la posicion del registro actual, dentro del vector de registros
            //-------------------------------------------------------------------------------
            $intContRegi = 0;
            foreach ($this->arrDataTabl as $objTable) {
                if ($objTable->Id == $this->objGuia->Id) {
                    $this->intPosiRegi = $intContRegi;
                    break;
                } else {
                    $intContRegi++;
                }
            }
        }
    }

    //protected function lblNombRemi_Click() {
    //    QApplication::Redirect(__SIST__."/master_cliente_edit.php/".$this->objGuia->CodiClie);
    //}
}

ConsultaGuiaNew::Run('ConsultaGuiaNew');
?>