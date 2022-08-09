<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/UsuarioEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Usuario class.  It uses the code-generated
 * UsuarioMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Usuario columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both usuario_edit.php AND
 * usuario_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class UsuarioEditForm extends UsuarioEditFormBase {
    protected $btnReseClav;
    protected $btnMasxOpci;
    protected $strPassUsua;
    protected $lblPermUsua;
    protected $dtgPermUsua;

    // Override Form Event Handlers as Needed
    protected function Form_Run() {
        parent::Form_Run();

        // Security check for ALLOW_REMOTE_ADMIN
        // To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
        QApplication::CheckRemoteAdmin();
    }

    //	protected function Form_Load() {}
    protected function Form_Create() {
        parent::Form_Create();

        // Use the CreateFromPathInfo shortcut (this can also be done manually using the UsuarioMetaControl constructor)
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctUsuario = UsuarioMetaControl::CreateFromPathInfo($this);

        // Call MetaControl's methods to create qcontrols based on Usuario's data fields
        $this->lblCodiUsua = $this->mctUsuario->lblCodiUsua_Create();

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::NewGrupo()->Activo,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::NewGrupo()->SistemaId,$_SESSION['Sistema']);
        $objClauWher[] = QQ::IsNull(QQN::NewGrupo()->DeletedAt);
        $this->lstGrupo = $this->mctUsuario->lstGrupo_Create(null, QQ::AndCondition($objClauWher));

        $this->txtNombUsua = $this->mctUsuario->txtNombUsua_Create();
        $this->txtNombUsua->AddAction(new QChangeEvent(), new QAjaxAction('crearLogin'));
        $this->txtNombUsua->Width = 180;

        $this->txtApelUsua = $this->mctUsuario->txtApelUsua_Create();
        $this->txtApelUsua->AddAction(new QChangeEvent(), new QAjaxAction('crearLogin'));
        $this->txtApelUsua->Width = 180;

        $this->txtLogiUsua = $this->mctUsuario->txtLogiUsua_Create();
        $this->txtLogiUsua->Width = 80;

        $this->txtPassUsua = $this->mctUsuario->txtPassUsua_Create();

        $this->lstCodiStatObject = $this->mctUsuario->lstCodiStatObject_Create();

        // Query para obtener las Sucursales Nacionales Activas y que no son Almacén.
        $objClauEsta   = QQ::Clause();
        $objClauEsta[] = QQ::IsNull(QQN::Sucursales()->DeletedAt);
        $objClauEsta[] = QQ::Equal(QQN::Sucursales()->EsAlmacen,0);
        // Lista de Sucursales según el query anterior.
        $this->lstSucursal = $this->mctUsuario->lstSucursal_Create(null, QQ::AndCondition($objClauEsta));
        $this->lstSucursal->Width = 200;
        if ($this->mctUsuario->EditMode) {
            $this->lstSucursal->SelectedValue = $this->mctUsuario->Usuario->SucursalId;
        }

        $this->lstTipoUsuaObject = $this->mctUsuario->lstTipoUsuaObject_Create();

        $this->txtCantInte = $this->mctUsuario->txtCantInte_Create();
        $this->txtCantInte->Width = 30;
        $this->txtCantInte->Enabled   = false;
        $this->txtCantInte->ForeColor = 'blue';

        $this->txtMailUsua = $this->mctUsuario->txtMailUsua_Create();
        $this->txtMailUsua->Width = 250;
        $this->txtMailUsua->Required = true;

        $this->calFechAcce = $this->mctUsuario->calFechAcce_Create();
        $this->calFechAcce->Width = 100;
        $this->calFechAcce->Enabled = false;
        $this->calFechAcce->ForeColor = 'blue';

        $this->txtMotiBloq = $this->mctUsuario->txtMotiBloq_Create();
        $this->txtMotiBloq->Name = 'Motivo Bloq.';
        $this->txtMotiBloq->TextMode = QTextMode::MultiLine;
        $this->txtMotiBloq->Rows = 3;

        $this->calFechClav = $this->mctUsuario->calFechClav_Create();
        $this->calFechClav->Width = 100;
        $this->calFechClav->Enabled = false;
        $this->calFechClav->ForeColor = 'blue';

        $this->txtCargUsua = $this->mctUsuario->txtCargUsua_Create();
        $this->chkSupervisor = $this->mctUsuario->chkSupervisor_Create();
        $this->lstCajero = $this->mctUsuario->lstCajero_Create();
        $this->btnReseClav_Create();
        $this->btnMasxOpci_Create();

        $this->btnLogxCamb->Visible = false;

        if (!$this->mctUsuario->EditMode) {
            $this->strPassUsua = generarCodigo();
            $this->txtPassUsua->Text = md5($this->strPassUsua);

            $this->lstCodiStatObject->SelectedValue = SinoType::SI;
            $this->lstCodiStatObject->Enabled = false;
            $this->lstCodiStatObject->ForeColor = 'blue';

            $this->calFechClav->Visible = false;

            $this->txtCantInte->Text = 0;

            $this->calFechClav->DateTime = new QDateTime(QDateTime::Now);
            $this->calFechClav->DateTime = $this->calFechClav->DateTime->AddMonths(-4);
            $this->calFechAcce->DateTime = new QDateTime(QDateTime::Now);

            $this->txtMailUsua->Text = Parametros::BuscarParametro('DOMICORR','CORREMPR','Txt1','@dominio.com');

        }

        $this->lblPermUsua_Create();
        $this->dtgPermUsua_Create();

        $this->txtMotiBloq   = disableControl($this->txtMotiBloq);
        $this->chkSupervisor = disableControl($this->chkSupervisor);
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function lblPermUsua_Create() {
        $this->lblPermUsua = new QLabel($this);
        $this->lblPermUsua->Text = 'Permisos Granulares del Usuario';
    }

    protected function dtgPermUsua_Create() {
        $this->dtgPermUsua = new ParametroDataGrid($this);
        $this->dtgPermUsua->FontSize = 13;
        $this->dtgPermUsua->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgPermUsua->CssClass = 'datagrid';
        $this->dtgPermUsua->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgPermUsua->Paginator = new QPaginator($this->dtgPermUsua);
        $this->dtgPermUsua->ItemsPerPage = 8; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgPermUsua->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgPermUsua->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $colCodiPerm = $this->dtgPermUsua->MetaAddColumn('IndiPara');
        $colCodiPerm->Name = 'Codigo';
        $colCodiPerm->Width = 5;

        $colDescPerm = new QDataGridColumn('DESCRIPCION','<?= $_FORM->dtgDescPerm_Render($_ITEM); ?>');
        $colDescPerm->Width = 15;
        $this->dtgPermUsua->AddColumn($colDescPerm);

        /*
        $colNombUsua = $this->dtgPermUsua->MetaAddColumn('DescPara');
        $colNombUsua->Name = 'Descripcion';
        */

        $this->dtgPermUsua->SetDataBinder('dtgPermUsua_Bind');
    }

    protected function dtgPermUsua_Bind() {
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Parametro()->IndiPara);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Parametro()->CodiPara,$this->mctUsuario->Usuario->LogiUsua);
        $objClauWher[] = QQ::Equal(QQN::Parametro()->ParaVal1,SinoType::SI);
        $arrPermUsua   = Parametro::QueryArray(QQ::AndCondition($objClauWher));

        $this->dtgPermUsua->TotalItemCount = count($arrPermUsua);
        // Bind the datasource to the datagrid
        $this->dtgPermUsua->DataSource = Parametro::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause(QQ::OrderBy(QQN::Parametro()->IndiPara), $this->dtgPermUsua->LimitClause)
//            QQ::Clause($this->dtgPermUsua->OrderByClause, $this->dtgPermUsua->LimitClause)
        );
    }

    public function dtgDescPerm_Render(Parametro $objParaPerm) {
        $strDescPerm = '';
        if ($objParaPerm) {
            $objDescPerm = Parametro::LoadByIndiParaCodiPara('VariPerm',$objParaPerm->IndiPara);
            if ($objDescPerm) {
                $strDescPerm = $objDescPerm->DescPara;
            }
        }
        return $strDescPerm;
    }

    protected function btnReseClav_Create() {
        $this->btnReseClav = new QButtonD($this);
        $this->btnReseClav->Text = TextoIcono(__iRESE__,'Resetear Clave');
        $this->btnReseClav->AddAction(new QClickEvent(), new QServerAction('btnReseClav_Click'));
        $this->btnReseClav->Visible = false;
    }

    protected function determinarPosicion() {
        if ($this->mctUsuario->Usuario && !isset($_SESSION['DataUsuario'])) {
            $_SESSION['DataUsuario'] = serialize(array($this->mctUsuario->Usuario));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataUsuario']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posición del Registro Actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->CodiUsua == $this->mctUsuario->Usuario->CodiUsua) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        // $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->Text = TextoIcono(__iHIST__,'Hist','F','lg');
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Usuario',$this->mctUsuario->Usuario->CodiUsua);
    }

    protected function btnMasxOpci_Create() {
        $this->btnMasxOpci = new QButtonL($this);
        $this->btnMasxOpci->Text = TextoIcono('plus fa-fw','Mas');
        $this->btnMasxOpci->AddAction(new QClickEvent(), new QAjaxAction('btnMasxOpci_Click'));
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    public function crearLogin() {
        $strNombUsua = $this->txtNombUsua->Text;
        $strApelUsua = $this->txtApelUsua->Text;
        $this->txtLogiUsua->Text = LoginPropuesto($strNombUsua,$strApelUsua);
    }

    protected function btnLogxCamb_Click() {
        $_SESSION['RegiRefe'] = $this->mctUsuario->Usuario->CodiUsua;
        $_SESSION['TablRefe'] = 'Usuario';
        $_SESSION['RegiReto'] = 'usuario_edit.php/'.$this->mctUsuario->Usuario->CodiUsua;
        QApplication::Redirect(__SIST__.'/log_list.php');
    }

    protected function btnMasxOpci_Click() {
        $this->btnNuevRegi->Visible = !$this->btnNuevRegi->Visible;
        $this->btnSave->Visible     = !$this->btnSave->Visible;
        $this->btnDelete->Visible   = !$this->btnDelete->Visible;
        $this->btnLogxCamb->Visible = !$this->btnLogxCamb->Visible;
        $this->btnReseClav->Visible = !$this->btnReseClav->Visible;
    }

    protected function Form_Validate() {
        $blnTodoOkey = true;
        $strMensOrig = 'Los siguientes datos son requeridos: ';
        $strMensUsua = '';
        if (is_null($this->lstCodiGrupObject->SelectedValue)) {
            $strMensUsua .= 'Grupo';
        }
        if (!strlen($this->txtNombUsua->Text)) {
            if (strlen($strMensUsua)) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Nombre';
        }
        if (!strlen($this->txtApelUsua->Text)) {
            if (strlen($strMensUsua)) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Apellido';
        }
        if (!strlen($this->txtLogiUsua->Text)) {
            if (strlen($strMensUsua)) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Login';
        } else {
            if (!$this->mctUsuario->EditMode) {
                $objLogiExis = Usuario::LoadByLogiUsua($this->txtLogiUsua->Text);
                if ($objLogiExis) {
                    if (strlen($strMensUsua)) {
                        $strMensUsua .= ', ';
                    }
                    $strMensUsua .= ' El Login ya está Registrado';
                }
            }
        }
        if (is_null($this->lstCodiStatObject->SelectedValue)) {
            if (strlen($strMensUsua)) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Estatus';
        } else {
            $intStatUsua = $this->lstCodiStatObject->SelectedValue;
            if (!strlen($this->txtMotiBloq->Text) && !$intStatUsua) {
                if (strlen($strMensUsua)) {
                    $strMensUsua .= ', ';
                }
                $strMensUsua .= 'Motivo Bloqueo';
            }
        }
        if (is_null($this->lstSucursal->SelectedValue)) {
            if (strlen($strMensUsua)) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Sucursal';
        }
        if (is_null($this->lstTipoUsuaObject->SelectedValue)) {
            if (strlen($strMensUsua)) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Tipo';
        }
        if (!strlen($this->txtMailUsua->Text)) {
            if (strlen($strMensUsua)) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'E-Mail';
        } else {
            if (!comprobar_email($this->txtMailUsua->Text)) {
                $strMensUsua = 'E-Mail en formato no válido';
            }
        }
        $strMensOrig .= $strMensUsua;
        $this->danger($strMensOrig);
        return $blnTodoOkey;
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/usuario_edit.php/'.$objRegiTabl->CodiUsua);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/usuario_edit.php/'.$objRegiTabl->CodiUsua);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/usuario_edit.php/'.$objRegiTabl->CodiUsua);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/usuario_edit.php/'.$objRegiTabl->CodiUsua);
    }

    protected function btnVolvList_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function btnReseClav_Click() {
        $this->mensaje();
        if (!strlen($this->txtMailUsua->Text)) {
            $strMensUsua = 'El Usuario debe tener un email, para proceder con el reseteo de la Clave!';
            $this->danger($strMensUsua);
            return;
        }
        if (!comprobar_email($this->txtMailUsua->Text)) {
            $strMensUsua = 'Formato de correo inválido!';
            $this->danger($strMensUsua);
            return;
        }
        $strPassUsua = generarCodigo();
        $strUrlxSist = 'http://goldsist.com/retail';
        $strNombSist = 'Retail';
        $this->mctUsuario->Usuario->resetearClave($strPassUsua,true,$strUrlxSist,$strNombSist);
        $this->txtCantInte->Text = $this->mctUsuario->Usuario->CantInte;
        $this->calFechClav->DateTime = new QDateTime($this->mctUsuario->Usuario->FechClav);
        $this->txtMotiBloq->Text = $this->mctUsuario->Usuario->MotiBloq;
        $this->lstCodiStatObject->SelectedIndex = $this->mctUsuario->Usuario->CodiStat;
        $this->success('Clave Re-seteada! | El Usuario recibirá un correo con las nuevas credenciales');
    }


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        t('====================');
        t('Guardando el Usuario');
        //--------------------------------------------
        // Se clona el objeto para verificar cambios
        //--------------------------------------------
        $objRegiViej = clone $this->mctUsuario->Usuario;
        t('Grupo seleccionado: '.$this->lstGrupo->SelectedValue);
        $this->lstCodiGrupObject->SelectedIndex = 1; //$this->lstGrupo->SelectedIndex;
        try {
            $this->mctUsuario->SaveUsuario();
        } catch (Exception $e) {
            t('Error guardando al Usuario: '.$e->getMessage());
        }
        t('Grupo asignado: '.$this->mctUsuario->Usuario->GrupoId);
        if ($this->mctUsuario->EditMode) {
            t('Estamos en modo Edicion');
            //------------------------------------------------------------------
            // Si se está en Modo Edición se verificará la existencia de algún
            // cambio en algún dato, para registralo entonces en el Log.
            //------------------------------------------------------------------
            $objRegiNuev = $this->mctUsuario->Usuario;
            $objRegiNuev = $this->verificarActivacion($objRegiViej, $objRegiNuev);
            $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
            if ($objResuComp->FriendlyComparisonStatus == 'different') {
                t('Hubo cambios');
                //------------------------------------------
                // En caso de que el objeto haya cambiado
                //------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Usuario';
                $arrLogxCamb['intRefeRegi'] = $this->mctUsuario->Usuario->CodiUsua;
                $arrLogxCamb['strNombRegi'] = $this->mctUsuario->Usuario->LogiUsua;
                $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/usuario_edit.php/'.$this->mctUsuario->Usuario->CodiUsua;
                LogDeCambios($arrLogxCamb);
                //---------------------------------------------------------------------------------------------
                // Si el Usuario modificado, es el mismo que esta conectado, entonces la variable de session
                // se establece nuevamente, para tomar los cambios de manera inmediada
                //---------------------------------------------------------------------------------------------
                if ($this->objUsuario->CodiUsua == $this->mctUsuario->Usuario->CodiUsua) {
                    $_SESSION['User'] = serialize($this->mctUsuario->Usuario);
                }
            }
        } else {
            t('Estamos en modo Insercion');
            $arrLogxCamb['strNombTabl'] = 'Usuario';
            $arrLogxCamb['intRefeRegi'] = $this->mctUsuario->Usuario->CodiUsua;
            $arrLogxCamb['strNombRegi'] = $this->mctUsuario->Usuario->LogiUsua;
            $arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/usuario_edit.php/'.$this->mctUsuario->Usuario->CodiUsua;
            LogDeCambios($arrLogxCamb);
            t('Log actualizado');
            $this->strPassUsua = generarCodigo();
            t('Codigo Generado');
            $this->txtPassUsua->Text = md5($this->strPassUsua);
            $this->mctUsuario->SaveUsuario();
            t('Se actualizo el password del Usuario');
            $this->RedactarEmailCreacion($this->mctUsuario->Usuario,$this->strPassUsua);
            t('Se envio el correo al Usuario');
        }
        t('Terminando la gestion del usuario');
        $this->success('Transacción Exitosa!');
    }

    protected function verificarActivacion(Usuario $objUsuaAnte, Usuario $objUsuaActu) {
        if ($objUsuaAnte->CodiStat == StatusType::INACTIVO && $objUsuaActu->CodiStat == StatusType::ACTIVO) {
            $objUsuaActu->CantInte = 0;
            $objUsuaActu->MotiBloq = '';
        }
        return $objUsuaActu;
    }

    protected function RedactarEmailCreacion($objUsuario,$strPassUsua) {
        $strMailPara = $objUsuario->MailUsua;
        $strLogiUsua = $objUsuario->LogiUsua;
        $objMessage = new QEmailMessage();
        $objMessage->From = 'GoldCoast - SisCO <noti@goldsist.com>';
        $objMessage->To = $strMailPara;
        $objMessage->Bcc = 'soporte@lufemansoftware.com';
        $objMessage->Subject = 'SISPAQ - Acceso al Sistema ' . QDateTime::NowToString(QDateTime::FormatDisplayDate);

        // Also setup HTML message (optional)
        $strBody  = 'Estimado Usuario,<p><br>';
        $strBody .= 'Bienvenido a la Plataforma SISPAQ de Gold Coast (http://goldsist.com/retail).<br><br>';
        $strBody .= 'El personal autorizado ha aperturado una cuenta para Usted con el siguiente ';
        $strBody .= 'Login de Usuario: "<b style="color:blue">'.$strLogiUsua.'</b>".<br>';
        $strBody .= 'Su Clave para acceder al sistema es: <b style="color:blue">'.$strPassUsua.'</b>.<br><br>';
        $strBody .= 'NOTA: Se trata de una clave temporal así que recuerde cambiarla tan pronto como acceda a la plataforma. Gracias!<br><br>';
        $strBody .= 'Si Usted desconoce esta operación, haga caso omiso de este mensaje.';
        $objMessage->HtmlBody = $strBody;

        // Add random/custom email headers
        $objMessage->SetHeader('x-application', 'Sistema SisCO');

        // Send the Message (Commented out for obvious reasons)
        QEmailServer::Send($objMessage);
    }

    protected function RedactarEmailEdicion($objUsuario,$strPassUsua) {
        $strMailPara = $objUsuario->MailUsua;
        $strLogiUsua = $objUsuario->LogiUsua;
        $strUrlxSist = 'http://goldsist.com/retail';
        /* @var $objMessage QEmailMessage */
        $objMessage = new QEmailMessage();
        $objMessage->From = 'GoldCoast - SisCO <noti@goldsist.com>';
        $objMessage->To = $strMailPara;
        $objMessage->Bcc = 'soporte@lufemansoftware.com';
        //$objMessage->Bcc = 'danydurand@gmail.com';
        $objMessage->Subject = 'Reseteo de Clave ' . QDateTime::NowToString(QDateTime::FormatDisplayDate);

        // Also setup HTML message (optional) //
        $strBody  = 'Estimado Usuario,<p><br>';
        $strBody .= 'Desde el Sistema Retail, el personal autorizado ha registrado ';
        $strBody .= 'un reseteo de Clave de Acceso, para su Usuario "<b style="color:blue">'.$strLogiUsua.'</b>".<br>';
        $strBody .= 'Su Nueva Clave de Acceso al acceder al sistema es: <b style="color:blue">'.$strPassUsua.'</b>.<br>';
        $strBody .= 'Para acceder al Sistema, diríjase a : <b style="color:blue">'.$strUrlxSist.'</b><br>';
        $strBody .= 'Recuerde cambiarla tan pronto como entre al sistema nuevamente. Gracias!<br><br>';
        $strBody .= 'Si Usted desconoce esta transacción, por favor comuníquese a la brevedad<br>';
        $strBody .= 'posible con el Administrador del Sistema a través de la cuenta de correo:<br><br>';
        $strBody .= 'soporte@lufemansoftware.com<br>';
        $objMessage->HtmlBody = $strBody;

        // Add random/custom email headers
        $objMessage->SetHeader('x-application', 'Sistema SisCO');

        // Send the Message (Commented out for obvious reasons)
        QEmailServer::Send($objMessage);
    }

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        $arrTablRela = $this->mctUsuario->TablasRelacionadasUsuario();
        if (count($arrTablRela)) {
            //----------------------------------------
            // SoftDelete del Registro
            //----------------------------------------
            $this->mctUsuario->Usuario->DeleteAt = new QDateTime(QDateTime::Now);
            $this->mctUsuario->Usuario->PassUsua = md5(generarCodigo());
            $this->mctUsuario->Usuario->CodiStat = StatusType::INACTIVO;
            $this->mctUsuario->Usuario->CantInte = 50;
            $this->mctUsuario->Usuario->MotiBloq = 'Usuario Borrado del Sistema';
            $this->mctUsuario->Usuario->Save();
            //------------------------
            // Log de Transacciones
            //------------------------
            $arrLogxCamb['strNombTabl'] = 'Usuario';
            $arrLogxCamb['intRefeRegi'] = $this->mctUsuario->Usuario->CodiUsua;
            $arrLogxCamb['strNombRegi'] = $this->mctUsuario->Usuario->LogiUsua;
            $arrLogxCamb['strDescCamb'] = 'Borrado (Soft)';
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        } else {
            $this->mctUsuario->DeleteUsuario();
            $arrLogxCamb['strNombTabl'] = 'Usuario';
            $arrLogxCamb['intRefeRegi'] = $this->mctUsuario->Usuario->CodiUsua;
            $arrLogxCamb['strNombRegi'] = $this->mctUsuario->Usuario->LogiUsua;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// usuario_edit.tpl.php as the included HTML template file
UsuarioEditForm::Run('UsuarioEditForm');
?>