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

class ConsultaGuia extends FormularioBaseKaizen {
    /**
     * @var $objGuia Guia
     */
    protected $objGuia;
    protected $objProducto;
    protected $objRegiTrab;
    protected $dtgGuiaCkpt;
    protected $dtgRegiTrab;
    protected $blnSubxClie;
    protected $decMontCanc;
    protected $strPersReci;
    protected $strFechPago;
    protected $strTipoDocu;
    protected $strNumeDocu;
    protected $lblSistGuia;

    // ---- Remitente ---- //
    protected $lblSucuOrig;
    protected $lblNombRemi;
    protected $lblDireRemi;
    protected $lblTeleRemi;
    // ---- Destinatario ---- //
    protected $lblSucuDest;
    protected $lblNombDest;
    protected $lblDireDest;
    protected $lblTeleDest;
    // ----- Costos ----- //
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
    // ------ Envío ------ //
    protected $lblNumeGuia;
    protected $lblFechGuia;
    protected $lblPesoGuia;
    protected $lblPiezPeso;
    protected $lblDescCont;
    protected $lblValoDecl;
    protected $lblGuiaReto;
    protected $lblFletDire;
    protected $lblPersEntr;
    protected $lblFechEntr;
    protected $lblTextObse;
    protected $lblPersReci;
    protected $lblFechPago;
    protected $lblCreaPorx;
    protected $lblFechHora;
    protected $lblTipoDocu;
    protected $lblMontCanc;
    protected $txtTextCome;
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
        if ($strNumeGuia) {
            $this->objGuia = Guia::Load($strNumeGuia);
            if (!$this->objGuia) {
                if (isset($_SESSION['StatGuia'])) {
                    unset($_SESSION['StatGuia']);
                }
                $_SESSION['StatGuia'] = 'La Guía <b>#'.$strNumeGuia.'</b> no existe! ';
                QApplication::Redirect(__SIST__.'/guia_invalida.php');
            } else {
                if ($this->objGuia->Anulada > 0) {
                    if (isset($_SESSION['StatGuia'])) {
                        unset($_SESSION['StatGuia']);
                    }
                    $_SESSION['StatGuia'] = 'La Guía <b>#'.$strNumeGuia.'</b> ha sido eliminada! ';
                    QApplication::Redirect(__SIST__.'/guia_invalida.php');
                } else {
//                    $this->objGuia->verificarTarifa();
                }
            }
        } else {
            $strMensMost = 'Debe especificar un Número de Guía para Consultar.';
            $this->mensaje($strMensMost,'m','d',__iHAND__);
        }
        $this->objRegiTrab = $this->CrearRegistroDeTrabajo();
        $this->CancelacionCOD();
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
        $this->lblMontBase_Create();
        $this->lblPorcDcto_Create();
        $this->lblConsDcto_Create();
        $this->lblSeguGuia_Create();
        $this->lblPorcSegu_Create();
        $this->lblMontDcto_Create();
        $this->lblMontSegu_Create();
        $this->lblMontFran_Create();
        $this->lblTariVolu_Create();
        $this->lblPorcIvax_Create();
        $this->lblMontIvax_Create();
        $this->lblMontTota_Create();
        $this->lblTipoDocu_Create();
        $this->lblMontCanc_Create();

        // -- Información del Envío -- //
        $this->lblNumeGuia_Create();
        $this->lblFechGuia_Create();
        $this->lblDescCont_Create();
        $this->lblPiezPeso_Create();
        $this->lblValoDecl_Create();
        $this->lblFletDire_Create();
        $this->lblPersEntr_Create();
        $this->lblFechEntr_Create();
        $this->lblGuiaReto_Create();
        $this->lblTextObse_Create();
        $this->lblPersReci_Create();
        $this->lblFechPago_Create();
        $this->lblCreaPorx_Create();
        $this->lblFechHora_Create();
        $this->txtTextCome_Create();

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

        //-------------------------------------------------------
        // Si se trata de una Guia Retorno, se muestra un boton
        // que permite consultar la Guia Original relacionada
        //-------------------------------------------------------
        $this->btnGuiaOrig_Create();
        $intPosiCade = strpos($this->objGuia->Observacion,'RETORNO DE LA GUIA: ');
        if ($intPosiCade !== false) {
            $strGuiaOrig = substr($this->objGuia->Observacion,20);
            $this->btnGuiaOrig->ActionParameter = $strGuiaOrig;
            $this->btnGuiaOrig->Visible = true;
        }

        /*
        if ($this->objUsuario->LogiUsua == 'ddurand') {
            $this->btnTrazTari->Visible = true;
        } else {
            $this->btnTrazTari->Visible = false;
        }
        */
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $_SESSION['GuiaCamb'] = $this->objGuia->NumeGuia;
        $_SESSION['GuiaCalc'] = $this->objGuia->NumeGuia;

        $strTextBoto   = TextoIcono('plus','Acciones');
        $arrOpciDrop   = array();
        //$arrOpciDrop[] = OpcionDropDown(__SIST__.'/ver_calculos.php',TextoIcono(__iOJOS__,'Ver Calculos'));
        if ($this->objGuia->sistema() == 'ExpNac') {
            $arrOpciDrop[] = OpcionDropDown(__SIST__.'/cambio_sucu_rece_guia.php',TextoIcono(__iEDIT__,'Cambiar Receptoria'));
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
        $this->txtQuieReci->Text = $this->objGuia->EntregadoA;
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
        if (!is_null($this->objGuia->FechaEntrega)) {
            $this->dttFechEntr->DateTime = new QDateTime($this->objGuia->FechaEntrega);
        }
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
        $this->txtHoraEntr->Text = $this->objGuia->HoraEntrega;
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
        //$this->lblSucuOrig->Text = $this->objGuia->EstaOrigObject->DescEsta;
        $strSucuOrig = $this->objGuia->EstaOrig;
        if ($this->objGuia->sistema() == 'ExpNac') {
            $strSucuOrig .= ' ('.$this->objGuia->receptoria('O').')';
        }
        $this->lblSucuOrig->Text = $strSucuOrig;
    }

    protected function lblNombRemi_Create() {
        $this->lblNombRemi = new QLabel($this);
        $this->lblNombRemi->Name = 'Remitente';
        $_SESSION['DataClie'] = serialize(array($this->objGuia->CodiClieObject));
        $this->lblNombRemi->Text = '<a><span class="enlace">'.$this->objGuia->CodiClieObject->CodigoInterno.'</span></a> '.$this->objGuia->NombRemi;
        $this->lblNombRemi->AddAction(new QClickEvent(), new QServerAction('lblNombRemi_Click'));
        $this->lblNombRemi->HtmlEntities = false;
    }

    protected function lblDireRemi_Create() {
        $this->lblDireRemi = new QLabel($this);
        $this->lblDireRemi->Name = 'Dir. Remitente';
        $this->lblDireRemi->Text = QuitarCaracteresEspeciales2(substr(utf8_decode($this->objGuia->DireRemi),0,115));
        $this->lblDireRemi->ToolTip = QuitarCaracteresEspeciales2(utf8_decode($this->objGuia->DireRemi));
    }

    protected function lblTeleRemi_Create() {
        $this->lblTeleRemi = new QLabel($this);
        $this->lblTeleRemi->Name = 'Tlf. Remitente';
        $this->lblTeleRemi->Text = substr($this->objGuia->TeleRemi,0,15);
        $this->lblTeleRemi->ToolTip = $this->objGuia->TeleRemi;
    }

    // ---- Información del Destinatario ---- //
    protected function lblSucuDest_Create() {
        $this->lblSucuDest = new QLabel($this);
        $this->lblSucuDest->Name = 'Destino';
        //$this->lblSucuDest->Text = $this->objGuia->EstaDestObject->DescEsta;
        $strSucuDest = $this->objGuia->EstaDest;
        if ($this->objGuia->sistema() == 'ExpNac') {
            $strSucuDest .= ' ('.$this->objGuia->receptoria('D').')';
        }
        $this->lblSucuDest->Text = $strSucuDest;
    }

    protected function lblNombDest_Create() {
        $this->lblNombDest = new QLabel($this);
        $this->lblNombDest->Name = 'Destinatario';
        $this->lblNombDest->Text = $this->objGuia->NombDest;
    }

    protected function lblDireDest_Create() {
        $this->lblDireDest = new QLabel($this);
        $this->lblDireDest->Name = 'Dir. Destinatario';
        $this->lblDireDest->Text = QuitarCaracteresEspeciales2(substr(utf8_decode($this->objGuia->DireDest),0,115));
        $this->lblDireDest->ToolTip = QuitarCaracteresEspeciales2(utf8_decode($this->objGuia->DireDest));
    }

    protected function lblTeleDest_Create() {
        $this->lblTeleDest = new QLabel($this);
        $this->lblTeleDest->Name = 'Tlf. Destinatario';
        $this->lblTeleDest->Text = $this->objGuia->TeleDest;
    }

    // -------- Costos del Servicio -------- //
    protected function lblTipoTari_Create() {
        $this->lblTipoTari = new QLabel($this);
        $objTariGuia = FacTarifa::Load($this->objGuia->TarifaId);
        if ($objTariGuia) {
            $this->lblTipoTari->Text = $objTariGuia->Descripcion;
        } else {
            $this->lblTipoTari->Text = 'N/A';
        }
    }

    protected function lblPorcDcto_Create() {
        $this->lblPorcDcto = new QLabel($this);
        $this->lblPorcDcto->Text = $this->objGuia->PorcentajeDscto;
    }

    protected function lblConsDcto_Create() {
        $this->lblConsDcto = new QLabel($this);
        $this->lblConsDcto->Text = $this->objGuia->ConsiderarDscto ? 'SI' : 'NO';
    }

    protected function lblSeguGuia_Create() {
        $this->lblSeguGuia = new QLabel($this);
        $this->lblSeguGuia->Text = $this->objGuia->Asegurado ? 'SI' : 'NO';
    }

    protected function lblPorcSegu_Create() {
        $this->lblPorcSegu = new QLabel($this);
        $this->lblPorcSegu->Text = $this->objGuia->PorcentajeSeguro;
    }

    protected function lblMontSegu_Create() {
        $this->lblMontSegu = new QLabel($this);
        $this->lblMontSegu->Text  = $this->objGuia->MontoSeguro;
    }

    protected function lblMontDcto_Create() {
        $this->lblMontDcto = new QLabel($this);
        $this->lblMontDcto->Text = $this->objGuia->MontoDscto;
    }

    protected function lblMontFran_Create() {
        $this->lblMontFran = new QLabel($this);
        $this->lblMontFran->Text = $this->objGuia->MontoFranqueo;
    }

    protected function lblMontBase_Create() {
        $this->lblMontBase = new QLabel($this);
        $this->lblMontBase->Text = $this->objGuia->MontoBase;
    }

    protected function lblTariVolu_Create() {
        $this->lblTariVolu = new QLabel($this);
        $this->lblTariVolu->Text = SinoType::ToString($this->objGuia->CantAyudantes);
    }

    protected function lblPorcIvax_Create() {
        $this->lblPorcIvax = new QLabel($this);
        $this->lblPorcIvax->Text = $this->objGuia->PorcentajeIva;
    }

    protected function lblMontIvax_Create() {
        $this->lblMontIvax = new QLabel($this);
        $this->lblMontIvax->Text = nfp($this->objGuia->MontoIva);
    }

    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Text = nfp($this->objGuia->MontoTotal);
    }

    protected function lblTipoDocu_Create() {
        $this->lblTipoDocu = new QLabel($this);
        $this->lblTipoDocu->Text = $this->strTipoDocu . " (" . $this->strNumeDocu . ")";
    }

    protected function lblMontCanc_Create() {
        $this->lblMontCanc = new QLabel($this);
        $this->lblMontCanc->Text = $this->decMontCanc;
    }

    // * * Lado Inferior del Formulario * * //
    // ------ Información del Envío ------- //
    protected function lblNumeGuia_Create() {
        $this->lblNumeGuia = new QLabel($this);
        $this->lblNumeGuia->Name = 'Guía #';
        $this->lblNumeGuia->Text = '<span class="nro_guia">'.$this->objGuia->NumeGuia.'</span> ('.TipoGuiaType::ToStringCorto($this->objGuia->TipoGuia).')';
        $this->lblNumeGuia->HtmlEntities = false;
    }

    protected function lblFechGuia_Create() {
        $this->lblFechGuia = new QLabel($this);
        $this->lblFechGuia->Name = 'Fecha';
        $this->lblFechGuia->Text = $this->objGuia->FechGuia->__toString("DD/MM/YYYY");
    }

    protected function lblDescCont_Create() {
        $this->lblDescCont = new QLabel($this);
        $this->lblDescCont->Name = 'Contenido';
        $this->lblDescCont->Text = substr($this->objGuia->DescCont, 0,10);
        $this->lblDescCont->ToolTip = $this->objGuia->DescCont;
    }

    protected function lblPiezPeso_Create() {
        $this->lblPiezPeso = new QLabel($this);
        $this->lblPiezPeso->Name = 'Piezas/Peso';
        $this->lblPiezPeso->Text = $this->objGuia->CantPiez.'/'.$this->objGuia->PesoGuia.' (Kg)';
    }

    protected function lblValoDecl_Create() {
        $this->lblValoDecl = new QLabel($this);
        $this->lblValoDecl->Name = 'V. Declarado';
        $this->lblValoDecl->Text = $this->objGuia->ValorDeclarado." Bs";
    }

    protected function lblFletDire_Create() {
        $this->lblFletDire = new QLabel($this);
        $this->lblFletDire->Text = $this->objGuia->FleteDirecto ? 'SI' : 'NO';
    }

    protected function lblPersEntr_Create() {
        $this->lblPersEntr = new QLabel($this);
        $this->lblPersEntr->Text = substr($this->objGuia->EntregadoA ? $this->objGuia->EntregadoA : 'N/A', 0, 10);
        $this->lblPersEntr->ToolTip = $this->objGuia->EntregadoA ? $this->objGuia->EntregadoA : 'N/A';
    }

    protected function lblFechEntr_Create() {
        $this->lblFechEntr = new QLabel($this);
        $this->lblFechEntr->Text = $this->objGuia->FechaEntrega
            ? $this->objGuia->FechaEntrega->__toString("DD/MM/YY")
            : 'N/A';
        $this->lblFechEntr->ToolTip = $this->objGuia->FechaEntrega
            ? $this->objGuia->FechaEntrega->__toString("DD/MM/YYYY") . " " . $this->objGuia->HoraEntrega
            : 'N/A';
    }

    protected function lblGuiaReto_Create() {
        $this->lblGuiaReto = new QLabel($this);
        $this->lblGuiaReto->Text = $this->objGuia->GuiaRetorno ? $this->objGuia->GuiaRetorno : 'N/A';
    }

    protected function lblTextObse_Create() {
        $this->lblTextObse = new QLabel($this);
        $this->lblTextObse->Text = substr($this->objGuia->Observacion, 0,10);
        $this->lblTextObse->ToolTip = $this->objGuia->Observacion;
    }

    protected function lblPersReci_Create() {
        $this->lblPersReci = new QLabel($this);
        $this->lblPersReci->Text = substr($this->strPersReci, 0,10);
        $this->lblPersReci->ToolTip = $this->strPersReci;
    }

    protected function lblFechPago_Create() {
        $this->lblFechPago = new QLabel($this);
        $this->lblFechPago->Text = $this->strFechPago;
    }

    protected function lblCreaPorx_Create() {
        $this->lblCreaPorx = new QLabel($this);
        $this->lblCreaPorx->Text = $this->objGuia->UsuarioCreacion;
    }

    protected function lblFechHora_Create() {
        $this->lblFechHora = new QLabel($this);
        $this->lblFechHora->Text = $this->objGuia->FechaCreacion->__toString("DD/MM/YYYY");
        $this->lblFechHora->ToolTip = $this->objGuia->FechaCreacion->__toString("DD/MM/YYYY").' '.$this->objGuia->HoraCreacion;
    }

    protected function txtTextCome_Create() {
        $this->txtTextCome = new QTextBox($this);
        $this->txtTextCome->Text = $this->objRegiTrab->Comentario;
        $this->txtTextCome->Width = '100%';
        //$this->txtTextCome->TextMode = QTextMode::MultiLine;
        $this->txtTextCome->AddAction(new QFocusEvent(), new QAjaxAction('txtTextCome_Focus'));
        $this->txtTextCome->AddAction(new QBlurEvent(), new QAjaxAction('txtTextCome_Blur'));
    }

    // ------- Información de Estatus ------- //
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

    // ---- Información de Actividad(es) ---- //
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
        //$this->btnProxRegi->Text = TextoIcono('angle-right fa-lg','Proximo','P');
        $this->btnProxRegi->Text = TextoIcono('angle-right fa-lg','','P');
        $this->btnProxRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        //$this->btnRegiAnte->Text = TextoIcono('angle-left fa-lg','Anterior');
        $this->btnRegiAnte->Text = TextoIcono('angle-left fa-lg','');
        $this->btnRegiAnte->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        //$this->btnPrimRegi->Text = TextoIcono('angle-double-left fa-lg','Primero');
        $this->btnPrimRegi->Text = TextoIcono('angle-double-left fa-lg','');
        $this->btnPrimRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        //$this->btnUltiRegi->Text = TextoIcono('angle-double-right fa-lg','Ultimo','P');
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

    protected function btnTrazTari_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__SIST__.'/traza_tarifa.php');
    }

    protected function btnGuiaOrig_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$strParameter);
    }

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
        $this->dtgGuiaCkpt->Visible = !$blnMostPodx;
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
        $objCkptOkey = SdeCheckpoint::Load('OK');
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
        $arrDatoPodx['txtFechEntr'] = $this->dttFechEntr->DateTime->__toString("DD/MM/YYYY");
        $arrDatoPodx['txtHoraEntr'] = $this->txtHoraEntr->Text;
        $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
        if ($arrResuPodx['blnTodoOkey'] == false) {
            $intCantErro++;
            $this->strErroProc .= $this->objGuia->NumeGuia." ".$arrResuPodx['strMensUsua']."<br>";
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
            //-------------------------------------------------------------------------------------
            // Con la funcion DejarSoloLosNumeros1 se eliminan los caracteres especiales y letras
            //-------------------------------------------------------------------------------------
            array_walk($arrVariGuia,'DejarSoloLosNumeros1');
            //---------------------------------------------------------------------------
            // Con array_unique se eliminan las guias repetidas en caso de que las haya
            //---------------------------------------------------------------------------
            $arrVariGuia = array_unique($arrVariGuia,SORT_STRING);
            //---------------------------------------------------------------------
            // Una vez que hemos "limipiado" la lista, se procesa guia por guia
            //---------------------------------------------------------------------
            $intCantGuia = count($arrVariGuia);
            foreach ($arrVariGuia as $strNumeGuia) {
                if (strlen($strNumeGuia) > 0) {
                    $objGuia = Guia::Load($strNumeGuia);
                    if ($objGuia) {
                        $arrDatoPodx['objGuiaPodx'] = $objGuia;
                        $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
                        $this->txtOtraGuia->Text .= $strNumeGuia." ".$arrResuPodx['strMensUsua'].chr(13);
                        if ($arrResuPodx['blnTodoOkey'] == false) {
                            $this->strErroProc .= $this->objGuia->NumeGuia." ".$arrResuPodx['strMensUsua'];
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
            $this->mensaje('El Comentario debe tener al menos 10 caracteres','','d','',__iHAND__);
            $this->txtTextCome->SetFocus();
        }
        $this->dtgRegiTrab->Refresh();
    }

    protected function CrearRegistroDeTrabajo() {
        $objRegiTrab = new RegistroTrabajo();
        $objRegiTrab->GuiaId = $this->objGuia->NumeGuia;
        $objRegiTrab->Comentario = QApplication::Translate('CONSULTO LA GUIA');
        $objRegiTrab->UsuarioId = $this->objUsuario->CodiUsua;
        $objRegiTrab->Fecha = new QDateTime(QDateTime::Now);
        $objRegiTrab->Hora = date("H:i:s");
        $objRegiTrab->SucursalId = $this->objUsuario->SucursalId;
        $objRegiTrab->CheckpointId = "CG";  // Consultó la Guía
        $objRegiTrab->Save();
        return $objRegiTrab;
    }

    protected function CancelacionCOD() {
        $objCobrCodx = CobroCod::Load($this->objGuia->NumeGuia);
        //--------------------------------------------------
        // Se verifica si la Guía tiene registrado un Pago
        //--------------------------------------------------
        if ($objCobrCodx) {
            //-----------------------------------------
            // Se verifica si se ha cancelado el Pago
            //-----------------------------------------
            if ($objCobrCodx->MontoCancelado > 0) {
                //-------------------------------------------
                // Se obtienen los datos del Pago Cancelado.
                //-------------------------------------------
                $this->decMontCanc = (double)$objCobrCodx->MontoCancelado;
                $this->strPersReci = $objCobrCodx->RecibioElPago;

                // Nombre de la Persona quien Recibió el pago //
                $this->strFechPago = $objCobrCodx->FechaPago->__toString("DD/MM/YYYY");
                
                // Fecha del Pago //
                $this->strTipoDocu = TipoDocumentoType::ToString($objCobrCodx->TipoDocumento);
                $this->strNumeDocu = $objCobrCodx->NumeroDocumento;
            } else {
                //------------------------------------------
                // El Pago de la Guía no ha sido cancelado.
                //------------------------------------------
                $this->decMontCanc = "N/A";
                $this->strPersReci = "N/A";
                $this->strFechPago = "N/A";
                $this->strTipoDocu = "N/A";
                $this->strNumeDocu = "N/A";
            }
        } else {
            //--------------------------------------
            // La Guía no tiene un Pago Registrado
            //--------------------------------------
            $this->decMontCanc = "N/A";
            $this->strPersReci = "N/A";
            $this->strFechPago = "N/A";
            $this->strTipoDocu = "N/A";
            $this->strNumeDocu = "N/A";
        }
    }

    // ---- DataGrid de Checkpoints de la Guía ---- //
    public function dtgGuiaCkpt_CodiEstaObject_Render(GuiaCkpt $objGuiaCkpt) {
        if (!is_null($objGuiaCkpt->CodiEstaObject))
            return $objGuiaCkpt->CodiEsta;
        else
            return null;
    }

    public function dtgGuiaCkpt_FechCkpt_Render(GuiaCkpt $objGuiaCkpt) {
        if (!is_null($objGuiaCkpt->FechCkpt))
            return $objGuiaCkpt->FechCkpt->__toString("DD/MM/YYYY");
        else
            return null;
    }

    protected function dtgGuiaCkpt_Bind() {
        $objCondicion = QQ::Clause();
        $objCondicion[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia,$this->objGuia->NumeGuia);
        $objClauses = array();
        if ($objClause = $this->dtgGuiaCkpt->OrderByClause)
            array_push($objClauses, $objClause);
        if ($objClause = $this->dtgGuiaCkpt->LimitClause)
            array_push($objClauses, $objClause);
        $this->dtgGuiaCkpt->DataSource = GuiaCkpt::QueryArray(
            QQ::AndCondition($objCondicion),
            QQ::Clause(
                QQ::OrderBy(
                    QQN::GuiaCkpt()->FechCkpt,false,QQN::GuiaCkpt()->HoraCkpt,false
                )
            )
        );
    }

    protected function createDtgGuiaCkptColumns() {
        $colCodiEsta = new QDataGridColumn($this);
        $colCodiEsta->Name = QApplication::Translate('SUC');
        $colCodiEsta->Html = '<?= $_FORM->dtgGuiaCkpt_CodiEstaObject_Render($_ITEM); ?>';
        $this->dtgGuiaCkpt->AddColumn($colCodiEsta);

        $colTextObse = new QDataGridColumn($this);
        $colTextObse->Name = QApplication::Translate('Text Obse');
        $colTextObse->Html = '<?= $_FORM->dtgGuiaCkpt_TextObse_Render($_ITEM); ?>';
        $colTextObse->OrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->TextObse);
        $colTextObse->ReverseOrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->TextObse, false);
        $colTextObse->Width = 350;
        $this->dtgGuiaCkpt->AddColumn($colTextObse);

        $colFechCkpt = new QDataGridColumn($this);
        $colFechCkpt->Name = QApplication::Translate('Fecha');
        $colFechCkpt->Html = '<?= $_FORM->dtgGuiaCkpt_FechCkpt_Render($_ITEM); ?>';
        $colFechCkpt->OrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt);
        $colFechCkpt->ReverseOrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt, false);
        $this->dtgGuiaCkpt->AddColumn($colFechCkpt);

        $colHoraCkpt = new QDataGridColumn($this);
        $colHoraCkpt->Name = QApplication::Translate('Hora');
        $colHoraCkpt->Html = '<?= QString::Truncate($_ITEM->HoraCkpt, 200); ?>';
        $colHoraCkpt->OrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->HoraCkpt);
        $colHoraCkpt->ReverseOrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->HoraCkpt, false);
        $colHoraCkpt->Width = 15;
        $this->dtgGuiaCkpt->AddColumn($colHoraCkpt);

        $colUsuaCkpt = new QDataGridColumn($this);
        $colUsuaCkpt->Name = QApplication::Translate('Usuario');
        $colUsuaCkpt->Html = '<?= $_FORM->dtgGuiaCkpt_CodiUsua_Render($_ITEM); ?>';
        $colUsuaCkpt->OrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->CodiUsua);
        $colUsuaCkpt->ReverseOrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->CodiUsua, false);
        $colUsuaCkpt->Width = 15;
        $this->dtgGuiaCkpt->AddColumn($colUsuaCkpt);

        $colCodiRuta = new QDataGridColumn($this);
        $colCodiRuta->Name = QApplication::Translate('Ruta');
        $colCodiRuta->Html = '<?= $_FORM->dtgGuiaCkpt_CodiRuta_Render($_ITEM); ?>';
        $colCodiRuta->OrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->CodiRuta);
        $colCodiRuta->ReverseOrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->CodiRuta, false);
        $colCodiRuta->Width = 15;
        $this->dtgGuiaCkpt->AddColumn($colCodiRuta);
    }

    public function dtgGuiaCkpt_TextObse_Render(GuiaCkpt $objGuiaCkpt) {
        $strCodiCkpt = $objGuiaCkpt->CodiCkpt;
        $strTextObse = $objGuiaCkpt->TextObse;
        if (strlen($strTextObse) > 0) {
            $strTextObse = '('.$strCodiCkpt.') '.limpiarCadena($strTextObse);
        }
        return utf8_encode($strTextObse);
    }

    public function dtgGuiaCkpt_CodiUsua_Render(GuiaCkpt $objGuiaCkpt) {
        if (!is_null($objGuiaCkpt->CodiUsua)) {
            $objUsuaCkpt = Usuario::Load($objGuiaCkpt->CodiUsua);
            return $objUsuaCkpt->__toString();
        } else {
            return null;
        }
    }

    public function dtgGuiaCkpt_CodiRuta_Render(GuiaCkpt $objGuiaCkpt) {
        if (!is_null($objGuiaCkpt->CodiRuta)) {
            // $objUsuaCkpt = Usuario::Load($objGuiaCkpt->CodiUsua);
            // return $objUsuaCkpt->__toString();
            return $objGuiaCkpt->CodiRuta;
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
        $objCondicion[] = QQ::Equal(QQN::RegistroTrabajo()->GuiaId, $this->objGuia->NumeGuia);
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
        /*
        $colGuiaRegi = new QDataGridColumn($this);
        $colGuiaRegi->Name = QApplication::Translate('GUÍA');
        $colGuiaRegi->Html = '<?= $_ITEM->GuiaId; ?>';
        $this->dtgRegiTrab->AddColumn($colGuiaRegi);
        */

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

    // ---- Botónes ---- //
    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnEditGuia_Click() {
        QApplication::Redirect(__SIST__.'/cargar_guia.php/'.$this->objGuia->NumeGuia);
    }

    protected function btnImprGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_pdf.php?strNumeGuia=' . $this->objGuia->NumeGuia);
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
                if ($objTable->NumeGuia == $this->objGuia->NumeGuia) {
                    $this->intPosiRegi = $intContRegi;
                    break;
                } else {
                    $intContRegi++;
                }
            }
        }
    }

    protected function lblNombRemi_Click() {
        QApplication::Redirect(__SIST__."/master_cliente_edit.php/".$this->objGuia->CodiClie);
    }
}

ConsultaGuia::Run('ConsultaGuia');
?>