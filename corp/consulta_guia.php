<?php
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ConsultaGuia extends FormularioBaseKaizen {

    /* @var $objGuia Guias */
    protected $objGuia;
    /* @var $objCliente MasterCliente */
    protected $objCliente;
    protected $objProducto;
    protected $dtgGuiaCkpt;
    protected $dtgPiezGuia;
    protected $dtgConcGuia;

    protected $blnSubxClie;

    protected $lblNumeGuia;
    protected $lblFechGuia;
    protected $lblSucuOrig;
    protected $lblNombRemi;
    protected $lblDireRemi;
    protected $lblTeleRemi;
    protected $lblDescCont;
    protected $lblSeguGuia;
    protected $lblPorcSegu;
    protected $lblMontSegu;
    protected $lblMontFran;
    protected $lblFletDire;
    protected $lblPersEntr;
    protected $lblFechEntr;

    protected $lblServImpo;
    protected $lblPesoGuia;
    protected $lblCantPiez;
    protected $lblValoDecl;

    // ---- Destinatario ----
    protected $lblSucuDest;
    protected $lblNombDest;
    protected $lblDireDest;
    protected $lblTeleDest;
    // ---- Montos y otros ----
    protected $lblRefeMani;
    protected $lblTipoTari;
    protected $lblMontBase;
    protected $lblPorcIvax;
    protected $lblMontIvax;
    protected $lblMontTota;
    protected $lblGuiaReto;

    protected $lblTextObse;
    //------------------------
    // Parámetros de posición
    //------------------------
    protected $arrDataTabl;
    protected $intCantRegi;
    protected $intPosiRegi;

    //---------------------
    // Botones de posición
    //---------------------
    protected $btnPrimRegi;
    protected $btnRegiAnte;
    protected $btnProxRegi;
    protected $btnUltiRegi;

    protected $btnPrimSmal;
    protected $btnAnteSmal;
    protected $btnProxSmal;
    protected $btnUltiSmal;

    //--------------------
    // Botones corrientes
    //--------------------
    protected $btnEditGuia;
    protected $btnImprGuia;

    protected function SetupValores() {
        //------------------------------------------
        // Obteniendo el Nro de la guía a consultar
        //------------------------------------------
        $strNumeGuia = QApplication::PathInfo(0);
        if ($strNumeGuia) {
            $this->objGuia = Guias::Load($strNumeGuia);
            if (!$this->objGuia) {
                throw new Exception('Could not find a Guia object with PK arguments: ' . $strNumeGuia);
            } else {
                //---------------------------------------------------------------------------------------------
                // Se determina si el Cliente, el cual el Usuario (quien opera actualmente en el Sistema) está
                // asociado, es quien se encuentra vinculado con la Guía a consultar.
                //---------------------------------------------------------------------------------------------
                $intClieGuia = $this->objGuia->ClienteCorpId;
                $intClieUsua = $this->objUsuario->Cliente->CodiClie;
                if ($intClieGuia != $intClieUsua) {
                    //-------------------------------------------------------------------
                    // En este caso, se trata de la consulta de la Guía de un SobCliente
                    //-------------------------------------------------------------------
                    $this->blnSubxClie = true;
                } else {
                    $this->blnSubxClie = false;
                }
            }
        } else {
            $this->danger('Debe especificar un Número de Guía para Consultar');
        }
        //------------------------------------------
        // Cliente al cual el usuario está asociado
        //------------------------------------------
        $this->objCliente = unserialize($_SESSION['ClieMast']);
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();
        $this->determinarPosicion();

        $this->lblTituForm->Text = 'Consulta de la Guía';

        $this->lblNumeGuia_Create();
        $this->lblFechGuia_Create();
        $this->lblSucuOrig_Create();
        $this->lblNombRemi_Create();
        $this->lblDireRemi_Create();
        $this->lblTeleRemi_Create();

        $this->lblSucuDest_Create();
        $this->lblNombDest_Create();
        $this->lblDireDest_Create();
        $this->lblTeleDest_Create();

        $this->lblRefeMani_Create();
        $this->lblTipoTari_Create();
        $this->lblSeguGuia_Create();
        $this->lblMontTota_Create();
        $this->lblTextObse_Create();

        $this->lblServImpo_Create();
        $this->lblDescCont_Create();
        $this->lblPersEntr_Create();
        $this->lblFechEntr_Create();

        $this->lblCantPiez_Create();
        $this->lblValoDecl_Create();

        $this->dtgGuiaCkpt_Create();
        $this->dtgPiezGuia_Create();
        $this->dtgConcGuia_Create();

        //-------------------
        // Botones regulares
        //-------------------
        $this->btnSave->Visible = false;
        $this->btnEditGuia_Create();
        $this->btnImprGuia_Create();

        //------------------------
        // Botones de navegacion
        //------------------------

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();
        //
        $this->btnPrimSmal_Create();
        $this->btnAnteSmal_Create();
        $this->btnProxSmal_Create();
        $this->btnUltiSmal_Create();

        //-----------------
        // Otras funciones
        //-----------------
        $this->verificarNavegacion();
        //---------------------------------------------------------------------
        // Se valida si al usuario se le permite realizar gestiones en la guía
        //---------------------------------------------------------------------
        $this->permitirCambios();
    }

    //---------------------
    // Creando objetos ...
    //---------------------

    protected function dtgConcGuia_Create() {
        $this->dtgConcGuia = new QDataGrid($this);
        $this->dtgConcGuia->FontSize = 12;
        $this->dtgConcGuia->ShowFilter = false;

        $this->dtgConcGuia->CssClass = 'datagrid';

        $this->dtgConcGuia->SetDataBinder('dtgConcGuia_Bind');

        $this->createDtgConcGuiaColumns();
    }

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

        $colDescPiez = new QDataGridColumn($this);
        $colDescPiez->Name = QApplication::Translate('Comentario');
        $colDescPiez->Html = '<?= $_ITEM->Descripcion; ?>';
        $colDescPiez->Width = 200;
        $this->dtgPiezGuia->AddColumn($colDescPiez);

        //$colKiloPiez = new QDataGridColumn($this);
        //$colKiloPiez->Name = QApplication::Translate('Kilos');
        /*$colKiloPiez->Html = '<?= $_ITEM->Kilos; ?>';*/
        //$this->dtgPiezGuia->AddColumn($colKiloPiez);

        if ($this->objGuia->ServicioImportacion == 'AER') {
            $colLibrPiez = new QDataGridColumn($this);
            $colLibrPiez->Name = QApplication::Translate('Libras');
            $colLibrPiez->Html = '<?= $_ITEM->Libras; ?>';
            $this->dtgPiezGuia->AddColumn($colLibrPiez);
        }

        if ($this->objGuia->ServicioImportacion == 'MAR') {
            $colPiesPiez = new QDataGridColumn($this);
            $colPiesPiez->Name = QApplication::Translate('PiesCub');
            $colPiesPiez->Html = '<?= $_ITEM->PiesCub; ?>';
            $this->dtgPiezGuia->AddColumn($colPiesPiez);
        }

        $colAltoPiez = new QDataGridColumn($this);
        $colAltoPiez->Name = QApplication::Translate('Alto');
        $colAltoPiez->Html = '<?= $_ITEM->Alto; ?>';
        $this->dtgPiezGuia->AddColumn($colAltoPiez);

        $colAnchPiez = new QDataGridColumn($this);
        $colAnchPiez->Name = QApplication::Translate('Ancho');
        $colAnchPiez->Html = '<?= $_ITEM->Ancho; ?>';
        $this->dtgPiezGuia->AddColumn($colAnchPiez);

        $colLargPiez = new QDataGridColumn($this);
        $colLargPiez->Name = QApplication::Translate('Largo');
        $colLargPiez->Html = '<?= $_ITEM->Largo; ?>';
        $this->dtgPiezGuia->AddColumn($colLargPiez);

        $colVoluPiez = new QDataGridColumn($this);
        $colVoluPiez->Name = QApplication::Translate('Volumen');
        $colVoluPiez->Html = '<?= $_ITEM->Volumen; ?>';
        $this->dtgPiezGuia->AddColumn($colVoluPiez);

    }

    public function dtgPiezGuia_IdxxPiez_Render(GuiaPiezas $objGuiaPiez) {
        $strIdxxPiez = explode('-',$objGuiaPiez->IdPieza)[1];
        return utf8_encode($strIdxxPiez);
    }

    //-------- Información del Remitente --------

    protected function lblNumeGuia_Create() {
        $this->lblNumeGuia = new QLabel($this);
        $this->lblNumeGuia->Name = 'Guia Nro';
        $this->lblNumeGuia->Text = $this->objGuia->Tracking;
        $this->lblNumeGuia->ForeColor = 'blue';
        $this->lblNumeGuia->FontBold = true;
    }

    protected function lblFechGuia_Create() {
        $this->lblFechGuia = new QLabel($this);
        $this->lblFechGuia->Name = 'Fecha';
        $this->lblFechGuia->Text = $this->objGuia->Fecha->__toString("DD/MM/YYYY");
    }

    protected function lblSucuOrig_Create() {
        $this->lblSucuOrig = new QLabel($this);
        $this->lblSucuOrig->Name = 'Origen';
        $this->lblSucuOrig->Text = $this->objGuia->Origen->Nombre;
    }

    protected function lblNombRemi_Create() {
        $this->lblNombRemi = new QLabel($this);
        $this->lblNombRemi->Name = 'Remitente';
        $this->lblNombRemi->Text = substr($this->objGuia->NombreRemitente,0,35);
        $this->lblNombRemi->ToolTip = $this->objGuia->NombreRemitente;
    }

    protected function lblDireRemi_Create() {
        $this->lblDireRemi = new QLabel($this);
        $this->lblDireRemi->Name = 'Dir. Remitente';
        $this->lblDireRemi->Text = substr($this->objGuia->DireccionRemitente,0,118);
        $this->lblDireRemi->ToolTip = $this->objGuia->DireccionRemitente;
    }

    protected function lblTeleRemi_Create() {
        $this->lblTeleRemi = new QLabel($this);
        $this->lblTeleRemi->Name = 'Tlf. Remitente';
        $this->lblTeleRemi->Text = $this->objGuia->TelefonoRemitente;
    }

    // ---- Envío ----

    protected function lblServImpo_Create() {
        $this->lblServImpo = new QLabel($this);
        $this->lblServImpo->Name = 'S. Importacion';
        $this->lblServImpo->Text = $this->objGuia->ServicioImportacion;
        $this->lblServImpo->ToolTip = $this->objGuia->ServicioImportacion;
    }

    protected function lblDescCont_Create() {
        $this->lblDescCont = new QLabel($this);
        $this->lblDescCont->Name = 'Contenido';
        $this->lblDescCont->Text = substr($this->objGuia->Contenido,0,25);
        $this->lblDescCont->ToolTip = $this->objGuia->Contenido;
    }

    protected function lblCantPiez_Create() {
        $this->lblCantPiez = new QLabel($this);
        $this->lblCantPiez->Name = 'Piezas/Peso';
        $this->lblCantPiez->Text = $this->objGuia->Piezas.'/'.$this->objGuia->Libras.' (Lbs)';
    }

    protected function lblSucuDest_Create() {
        $this->lblSucuDest = new QLabel($this);
        $this->lblSucuDest->Name = 'Destino';
        $this->lblSucuDest->Text = $this->objGuia->Destino->Nombre;
    }

    protected function lblValoDecl_Create() {
        $this->lblValoDecl = new QLabel($this);
        $this->lblValoDecl->Name = 'V. Declarado';
        $this->lblValoDecl->Text = $this->objGuia->ValorDeclarado;
    }

    protected function lblPersEntr_Create() {
        $this->lblPersEntr = new QLabel($this);
        $this->lblPersEntr->Text = $this->objGuia->GuiaPodId ? substr($this->objGuia->GuiaPod->EntregadoA,0,14) : 'N/A';
        $this->lblPersEntr->ToolTip = $this->objGuia->GuiaPodId ? $this->objGuia->GuiaPod->EntregadoA : 'N/A';
    }

    protected function lblFechEntr_Create() {
        $this->lblFechEntr = new QLabel($this);
        $this->lblFechEntr->Text = $this->objGuia->GuiaPodId
            ? $this->objGuia->GuiaPod->FechaEntrega->__toString("DD/MM/YYYY") . " " . $this->objGuia->GuiaPod->HoraEntrega
            : 'N/A';
    }

    // ---- Destinatario ----

    protected function lblNombDest_Create() {
        $this->lblNombDest = new QLabel($this);
        $this->lblNombDest->Name = 'Destinatario';
        $this->lblNombDest->Text = substr($this->objGuia->NombreDestinatario,0,35);
        $this->lblNombDest->ToolTip = $this->objGuia->NombreDestinatario;
    }

    protected function lblDireDest_Create() {
        $this->lblDireDest = new QLabel($this);
        $this->lblDireDest->Name = 'Dir. Destinatario';
        $this->lblDireDest->Text = substr($this->objGuia->DireccionDestinatario,0,118);
        $this->lblDireDest->ToolTip = $this->objGuia->DireccionDestinatario;
    }

    protected function lblTeleDest_Create() {
        $this->lblTeleDest = new QLabel($this);
        $this->lblTeleDest->Name = 'Tlf. Destinatario';
        $this->lblTeleDest->Text = $this->objGuia->TelefonoDestinatario;
    }

    // ---- Montos y otros ----

    protected function lblRefeMani_Create() {
        $this->lblRefeMani = new QLabel($this);
        $this->lblRefeMani->Text = $this->objGuia->NotaEntrega->Referencia;
        $this->lblRefeMani->ForeColor = 'blue';
    }

    protected function lblTipoTari_Create() {
        $this->lblTipoTari = new QLabel($this);
        $this->lblTipoTari->Text = $this->objGuia->ClienteCorp->Tarifa->Descripcion;
    }

    protected function lblSeguGuia_Create() {
        $this->lblSeguGuia = new QLabel($this);
        $this->lblSeguGuia->Text = $this->objGuia->Asegurado ? 'SI' : 'NO';
    }


    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Text = $this->objGuia->Total;
    }

    protected function lblTextObse_Create() {
        $this->lblTextObse = new QLabel($this);
        $this->lblTextObse->Text = $this->objGuia->Observacion;
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

    //-------- Botones medianos --------

    protected function btnEditGuia_Create() {
        $this->btnEditGuia = new QButtonP($this);
        $this->btnEditGuia->Text = TextoIcono('pencil-square-o','Editar');
        $this->btnEditGuia->AddAction(new QClickEvent(), new QAjaxAction('btnEditGuia_Click'));
    }

    protected function btnImprGuia_Create() {
        $this->btnImprGuia = new QButtonI($this);
        $this->btnImprGuia->Text = TextoIcono('print fa-lg','Imprimir');
        $this->btnImprGuia->AddAction(new QClickEvent(), new QAjaxAction('btnImprGuia_Click'));
    }

    //-------- Botones de posición medianos --------

    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
        $this->btnProxRegi->Text = TextoIcono('angle-right fa-lg','Proximo','P');
        $this->btnProxRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        $this->btnRegiAnte->Text = TextoIcono('angle-left fa-lg','Anterior');
        $this->btnRegiAnte->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        $this->btnPrimRegi->Text = TextoIcono('angle-double-left fa-lg','Primero');
        $this->btnPrimRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        $this->btnUltiRegi->Text = TextoIcono('angle-double-right fa-lg','Ultimo','P');
        $this->btnUltiRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    //-------- Botones de posición pequeños --------

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
    // Funciones asociadas a los objetos
    //-----------------------------------

    protected function btnCancel_Click() {
        //$objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/guia_list_new.php');
    }

    // ---- DataGrid de Checkpoints de la Guía ----

    protected function dtgGuiaCkpt_Bind() {
        $objCondicion = QQ::Clause();
        $objCondicion[] = QQ::Equal(QQN::PiezaCheckpoints()->Pieza->GuiaId,$this->objGuia->Id);
        $objCondicion[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Visibilidad,'PUBLICO');
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
        $colFechCkpt->Html = '<?= $_FORM->dtgGuiaCkpt_FechaHora_Render($_ITEM); ?>';
        $colFechCkpt->Width = 140;
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

    public function dtgGuiaCkpt_FechaHora_Render(PiezaCheckpoints $objPiezCkpt) {
        $strFechHora = !is_null($objPiezCkpt->Fecha) ? $objPiezCkpt->Fecha->__toString("DD/MM/YYYY").' '.$objPiezCkpt->Hora : null;
        return utf8_encode($strFechHora);
    }

    public function dtgGuiaCkpt_TextObse_Render(PiezaCheckpoints $objPiezCkpt) {
        $strCodiCkpt = $objPiezCkpt->Checkpoint->Codigo;
        $strTextObse = $objPiezCkpt->Comentario;
        if (strlen($strTextObse) > 0) {
            $strTextObse = '('.$strCodiCkpt.') '.substr(limpiarCadena($strTextObse),0,40);
        }
        return utf8_encode($strTextObse);
    }

    public function dtgGuiaCkpt_CodiUsua_Render(PiezaCheckpoints $objPiezCkpt) {
        if (!is_null($objPiezCkpt->CreatedBy)) {
            $objUsuaCkpt = Usuario::Load($objPiezCkpt->CreatedBy);
            return $objUsuaCkpt->__toString();
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

    // ---- Botones ----

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->Id);
    }

    protected function btnEditGuia_Click() {
        QApplication::Redirect(__SIST__.'/guias_edit.php/'.$this->objGuia->Id);
    }

    protected function btnImprGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_pdf.php?strNumeGuia=' . $this->objGuia->Id);
    }

    //protected function btnCancel_Click() {
    //    $objUltiAcce = PilaAcceso::Pop('D');
    //    QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    //}

    //------------------------------
    // Otras funciones del programa
    //------------------------------

    protected function verificarNavegacion() {
        $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
        $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
        $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
    }

    protected function determinarPosicion() {
        if (isset($_SESSION['DataTabl'])) {
            $this->arrDataTabl = unserialize($_SESSION['DataTabl']);
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

    protected function permitirCambios() {
        $blnGestGuia = false;
        $blnGuarGuia = true;
        $strMensUsua = '';
        //---------------------------------------------------------------------------------------
        // Si la guía consultada pertenece a un SubCliente, entonces la misma no puede editarse.
        //---------------------------------------------------------------------------------------
        if ($this->blnSubxClie) {
            $blnGuarGuia = false;
        }
        //-----------------------------------------------------------------------------
        // Si el Cliente, el cual el Usuario se encuentra relacionado se encuentra
        // inactivo, al mismo no se le permite crear guías ni borrar Guías existentes.
        //-----------------------------------------------------------------------------
        if ($this->objCliente->CodiStat == StatusType::INACTIVO) {
            $blnGestGuia = false;
            $blnGuarGuia = false;
            $strMensUsua = 'Su Cuenta ha sido inactivada! No puede crear, ni editar, ni borrar Guías existentes!';
        }
        //-----------------------------------------------------------------
        // Si el envío ya fue recibido y procesado por la Empresa Courier
        // no se permitirá al Usuario del Sistema CORP la realización de
        // ningún cambio.
        //-----------------------------------------------------------------
        $strUltickpt = $this->objGuia->ultimoCheckpoint('CodigoCkpt');
        if (($strUltickpt == 'OK') && (strlen($strUltickpt) > 0)) {
            $blnGestGuia = false;
            $blnGuarGuia = false;
            $strMensUsua = 'Esta Guía ya fué Entregada. No se admiten cambios!';
        }

        $this->btnEditGuia->Visible = $blnGuarGuia;

        if (!$blnGestGuia) {
            $this->warning($strMensUsua);
            //$this->mensaje($strMensUsua,'','w','','exclamation-triangle');
        }
    }
}
ConsultaGuia::Run('ConsultaGuia');