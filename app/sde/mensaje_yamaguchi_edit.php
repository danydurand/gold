<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/MensajeYamaguchiEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the MensajeYamaguchi class.  It uses the code-generated
 * MensajeYamaguchiMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a MensajeYamaguchi columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both mensaje_yamaguchi_edit.php AND
 * mensaje_yamaguchi_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class MensajeYamaguchiEditForm extends MensajeYamaguchiEditFormBase {
    /* @var $objUsuario Usuario */
    protected $objUsuario;
    /* @var $mctMensajeYamaguchi MensajeYamaguchiMetaControl */
    protected $mctMensajeYamaguchi;
    /* @var $lstTipoMens QListBox */
    protected $lstTipoMens;
    //protected $chkDeteClie;
    /* @var $lstDeteClie QListBox */
    protected $lstDeteClie;
    /* @var $objParaErro Parametro */
    protected $objParaErro;
    /* @var $objParaInfo Parametro */
    protected $objParaInfo;
    /* @var $objParaInha Parametro */
    protected $objParaInha;
    /* @var $objParaPrim Parametro */
    protected $objParaPrim;
    /* @var $objParaExit Parametro */
    protected $objParaExit;
    /* @var $objParaAler Parametro */
    protected $objParaAler;
    protected $intUltiOrde;
    
    protected $lblEjemMens;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

	protected function SetupValores() {
	    $this->objUsuario = unserialize($_SESSION['User']);
	    $this->objParaErro = BuscarMensajeYamaguchi('MensDang');
	    $this->objParaInfo = BuscarMensajeYamaguchi('MensInfo');
	    $this->objParaInha = BuscarMensajeYamaguchi('MensMute');
	    $this->objParaPrim = BuscarMensajeYamaguchi('MensPrim');
	    $this->objParaExit = BuscarMensajeYamaguchi('MensSucc');
	    $this->objParaAler = BuscarMensajeYamaguchi('MensWarn');
        $this->intUltiOrde = MensajeYamaguchi::UltimaPosicion();
    }

    //	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

        $this->SetupValores();

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the MensajeYamaguchiMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctMensajeYamaguchi = MensajeYamaguchiMetaControl::CreateFromPathInfo($this);

        $this->lblTituForm->Text = $this->mctMensajeYamaguchi->TitleVerb.' Mensaje CORP';

        $this->lblEjemMens_Create();

		// Call MetaControl's methods to create qcontrols based on MensajeYamaguchi's data fields
		$this->lblId = $this->mctMensajeYamaguchi->lblId_Create();
		$this->lblId->Visible = $this->mctMensajeYamaguchi->EditMode ? true : false;

        $this->lstTipoMens_Create();
		$this->txtTipo = $this->mctMensajeYamaguchi->txtTipo_Create();
		$this->txtTipo->Required = false;

		$this->txtTexto = $this->mctMensajeYamaguchi->txtTexto_Create();
		$this->txtTexto->TextMode = QTextMode::MultiLine;
		$this->txtTexto->Width = 230;
		$this->txtTexto->Height = 100;
		$this->txtTexto->Required = false;

		$this->txtOrden = $this->mctMensajeYamaguchi->txtOrden_Create();
		$this->txtOrden->Width = 35;
		$this->txtOrden->Required = false;

        $this->chkTiempoIndefinido = $this->mctMensajeYamaguchi->chkTiempoIndefinido_Create();
        $this->chkTiempoIndefinido->Name = 'Por Tiempo Indefinido ?';
        $this->chkTiempoIndefinido->AddAction(new QChangeEvent(), new QAjaxAction('chkTiempoIndefinido_Change'));

		$this->calFechInic = $this->mctMensajeYamaguchi->calFechInic_Create();
		$this->calFechInic->Name = 'Fecha Inicio';
		$this->calFechInic->Width = 100;
		$this->calFechInic->Required = false;

		$this->calFechFin = $this->mctMensajeYamaguchi->calFechFin_Create();
		$this->calFechFin->Name = 'Fecha Fin';
		$this->calFechFin->Width = 100;

        $this->lstDeteClie_Create();

		$this->txtCodigos = $this->mctMensajeYamaguchi->txtCodigos_Create();
		$this->txtCodigos->TextMode = QTextMode::MultiLine;
		$this->txtCodigos->Width = 180;
		$this->txtCodigos->Height = 100;
		$this->txtCodigos->Required = false;
		$this->txtCodigos->Visible = false;

		$this->txtLogin = $this->mctMensajeYamaguchi->txtLogin_Create();
		$this->txtLogin->Name = 'Usuario';
		$this->txtLogin->Width = 80;
		$this->txtLogin->Enabled = false;
		$this->txtLogin->ForeColor = 'blue';
		if (!$this->mctMensajeYamaguchi->EditMode) {
            $this->txtLogin->Text = $this->objUsuario->LogiUsua;
        } else {
		    if (strlen($this->mctMensajeYamaguchi->MensajeYamaguchi->Login) == 0) {
                $this->txtLogin->Text = $this->objUsuario->LogiUsua;
            }
        }

		$this->txtIcono = $this->mctMensajeYamaguchi->txtIcono_Create();

        $this->ControlValoresCampos();
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

    protected function btnDelete_Create() {
        $this->btnDelete = new QButton($this);
        $this->btnDelete->Text = '<i class="fa fa-trash-o fa-lg"></i> Borrar';
        $this->btnDelete->CssClass = 'btn btn-danger btn-sm';
        $this->btnDelete->HtmlEntities = false;
        $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Mensaje CORP'))));
        $this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnDelete->Visible = $this->mctMensajeYamaguchi->EditMode;
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('MensajeCORP',$this->mctMensajeYamaguchi->MensajeYamaguchi->Id);
    }

    protected function lblEjemMens_Create() {
        $this->lblEjemMens = new QLabel($this);
        $this->lblEjemMens->Text = '';
        $this->lblEjemMens->HtmlEntities = false;
    }

    protected function lstTipoMens_Create() {
        $this->lstTipoMens = new QListBox($this);
        $this->lstTipoMens->Name = 'Tipo de Mensaje';
        $this->CargarTipoMensaje();
        $this->lstTipoMens->AddAction(new QChangeEvent(), new QAjaxAction('lstTipoMens_Change'));
    }

    protected function lstDeteClie_Create() {
        $this->lstDeteClie = new QListBox($this);
        $this->lstDeteClie->Name = 'Mensaje para:';
        $this->lstDeteClie->Required = true;
        $this->lstDeteClie->AddItem('TODOS LOS CLIENTES','T', true);
        $this->lstDeteClie->AddItem('ALGUNOS CLIENTES','C');
        $this->lstDeteClie->AddItem('CLIENTE(S) DE ALGUNA(S) GUIA(S)','G');
        $this->lstDeteClie->AddAction(new QChangeEvent(), new QAjaxAction('lstDeteClie_Change'));
    }

    protected function determinarPosicion() {
        if ($this->mctMensajeYamaguchi->MensajeYamaguchi && !isset($_SESSION['DataMensajeYamaguchi'])) {
            $_SESSION['DataMensajeYamaguchi'] = serialize(array($this->mctMensajeYamaguchi->MensajeYamaguchi));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataMensajeYamaguchi']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctMensajeYamaguchi->MensajeYamaguchi->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

    protected function btnLogxCamb_Click() {
        $_SESSION['RegiRefe'] = $this->mctMensajeYamaguchi->MensajeYamaguchi->Id;
        $_SESSION['TablRefe'] = 'MensajeCORP';
        $_SESSION['RegiReto'] = 'mensaje_yamaguchi_edit.php/'.$this->mctMensajeYamaguchi->MensajeYamaguchi->Id;
        QApplication::Redirect(__SIST__.'/log_list.php');
    }


    protected function Form_Validate() {
        $blnTodoOkey = true;
        $strMensUsua = '';

        if (is_null($this->lstTipoMens->SelectedValue)) {
            $blnTodoOkey = false;
            $strMensUsua = 'Tipo de Mensaje';
        }

        if (strlen($this->txtTexto->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensUsua) > 0) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Texto';
        }

        if (strlen($this->txtOrden->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensUsua) > 0) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Orden';
        }

        if (is_null($this->calFechInic->DateTime)) {
            $blnTodoOkey = false;
            if (strlen($strMensUsua) > 0) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Fecha Inicio';
        }

        if (!$this->chkTiempoIndefinido->Checked && is_null($this->calFechFin->DateTime)) {
            $blnTodoOkey = false;
            if (strlen($strMensUsua) > 0) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Fecha fin';
        }

        if (strlen($this->txtCodigos->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensUsua) > 0) {
                $strMensUsua .= ', ';
            }
            $strMensUsua .= 'Códigos';
        }

        if (!$blnTodoOkey) {
            $this->mensaje('Los siguientes campos son requeridos: <strong>'.$strMensUsua.'<strong>','','d','hand-stop-o');
        }
        return $blnTodoOkey;
    }

    protected function ejemplo_mensaje($strTextNoti='', $strClasMens='', $strNombIcon='') {
        if (strlen($strTextNoti) == 0) {
            $this->lblEjemMens->Text = '';
            $this->lblEjemMens->CssClass = '';
        } else {
            //----------------------------
            // Aquí se dibuja el Mensaje
            //----------------------------
            $this->lblEjemMens->Text = '<div class="well">
                     <span class="text-'.$strClasMens.'">
                        <i class="fa fa-'.$strNombIcon.' fa-lg"></i> '.$strTextNoti.'
                     </span>
                  </div>';
        }
    }

    protected function ControlValoresCampos() {
        if ($this->mctMensajeYamaguchi->EditMode) {
            $objParaMens = Parametro::LoadMensajeYamaguchiByTipo($this->mctMensajeYamaguchi->MensajeYamaguchi->Tipo);
            $this->lstTipoMens->SelectedValue = $objParaMens;
            $this->chkTiempoIndefinido_Change();
            $this->lstDeteClie_Change();
            //-------------------------------------------------------------
            // A continuación, se valida si el mensaje puede o no editarse
            //-------------------------------------------------------------
            $intOrdeMens = (int)$this->mctMensajeYamaguchi->MensajeYamaguchi->Orden;
            $strLogiMens = trim($this->mctMensajeYamaguchi->MensajeYamaguchi->Login);
            $blnUsuaDife = ($strLogiMens != trim($this->objUsuario->LogiUsua));
            if ($intOrdeMens == 0) {
                if ($blnUsuaDife) {
                    //------------------------------------------------------------------------------------------
                    // Si el mensaje tiene un orden cero(0), el mismo no puede editarse, a menos que el usuario
                    // operador sea quien creó el mismo.
                    //------------------------------------------------------------------------------------------
                    $this->bloquearCambios('No fue creado por Usted !!!');
                }
            } elseif ($this->mctMensajeYamaguchi->MensajeYamaguchi->FechFin) {
                //------------------------------------------------------------------------
                // Se comienza a validar si el mensaje se encuentra vigente. En este caso
                // se considera que el mensaje es de Tiempo definido.
                //------------------------------------------------------------------------
                $dttFechDhoy = new QDateTime(QDateTime::Now());
                if ($this->mctMensajeYamaguchi->MensajeYamaguchi->__vigente()) {
                    //-----------------------------------------------------------------------
                    // Si la fecha actual (Hoy) está dentro del rango de fechas del mensaje,
                    // se considera entonces que el mismo está vigente, por lo que se puede
                    // modificar.
                    //-----------------------------------------------------------------------
                    $this->habilitarCambios();
                } else {
                    //---------------------------------------------------------------------------
                    // En este caso, la fecha actual está fuera del rango de fechas del mensaje,
                    // por lo que éste se considera como no vigente, lo que quiere decir que
                    // éste no puede modificarse.
                    //---------------------------------------------------------------------------
                    $this->bloquearCambios('El Mensaje no esta Vigente !!!');
                }
            } else {
                //-------------------------------------------------------------------
                // En este caso se considera que el mensaje posee tiempo indefinido,
                // lo que significa que el mismo se encuentra vigente o activo.
                //-------------------------------------------------------------------
                $this->habilitarCambios();
            }
            //--------------------------------------------
            // Se muestra la vista previa del mensaje ...
            //--------------------------------------------
            $this->ejemplo_mensaje(
                $this->mctMensajeYamaguchi->MensajeYamaguchi->Texto,
                $this->mctMensajeYamaguchi->MensajeYamaguchi->Tipo,
                $this->mctMensajeYamaguchi->MensajeYamaguchi->Icono
            );
        } else {
            $this->txtCodigos->Text = 'TODOS';
            $this->ejemplo_mensaje();
        }
    }

    protected function bloquearCambios($strTextMens) {
	    $strTextMens = 'El Mensaje no admite cambios. '.$strTextMens;
	    $this->mensaje($strTextMens,'m','d',__iHAND__);
        $this->lstTipoMens->Enabled = false;
        $this->lstTipoMens->ForeColor = 'blue';
        $this->txtTexto->Enabled = false;
        $this->txtTexto->ForeColor = 'blue';
        $this->txtOrden->Enabled = false;
        $this->txtOrden->ForeColor = 'blue';
        $this->chkTiempoIndefinido->Enabled = false;
        $this->calFechInic->Enabled = false;
        $this->calFechInic->ForeColor = 'blue';
        $this->calFechFin->Enabled = false;
        $this->calFechFin->ForeColor = 'blue';
        $this->lstDeteClie->ForeColor = 'blue';
        $this->txtCodigos->Enabled = false;
        $this->txtCodigos->ForeColor = 'blue';
        $this->btnSave->Visible = false;
        // $this->btnDelete->Visible = f;
    }

    protected function habilitarCambios() {
	    $this->mensaje();
        $this->lstTipoMens->Enabled = true;
        $this->txtTexto->Enabled = true;
        $this->txtOrden->Enabled = true;
        $this->chkTiempoIndefinido->Enabled = true;
        $this->calFechInic->Enabled = true;
        $this->calFechFin->Enabled = true;
        $this->txtCodigos->Enabled = true;
        $this->btnSave->Visible = true;
        $this->btnDelete->Visible = true;
    }

    protected function CargarTipoMensaje() {
        $this->lstTipoMens->AddItem(QApplication::Translate('- Select One -'), null);
        $this->lstTipoMens->AddItem($this->objParaErro->ParaTxt1, $this->objParaErro);
        $this->lstTipoMens->AddItem($this->objParaInfo->ParaTxt1, $this->objParaInfo);
        $this->lstTipoMens->AddItem($this->objParaInha->ParaTxt1, $this->objParaInha);
        $this->lstTipoMens->AddItem($this->objParaPrim->ParaTxt1, $this->objParaPrim);
        $this->lstTipoMens->AddItem($this->objParaExit->ParaTxt1, $this->objParaExit);
        $this->lstTipoMens->AddItem($this->objParaAler->ParaTxt1, $this->objParaAler);
    }

    protected function lstTipoMens_Change() {
        if (!is_null($this->lstTipoMens->SelectedValue)) {
            $objParaMens = $this->lstTipoMens->SelectedValue;
            $this->txtTipo->Text = $objParaMens->ParaTxt2;
            $this->txtIcono->Text = $objParaMens->ParaTxt3;
            if (!$this->mctMensajeYamaguchi->EditMode) {
                // Se asigna de una vez el orden que le corresponde al mensaje
                if ($objParaMens->ParaTxt2 == 'danger') {
                    // El valor de orden que corresponde es cero(0)
                    $this->txtOrden->Text = 0;
                } else {
                    // Se asigna como orden o posición, el último encontrado entre los existentes más uno(1).
                    $this->txtOrden->Text = $this->intUltiOrde + 1;
                }
            }
        }
    }

    protected function chkTiempoIndefinido_Change() {
        if ($this->chkTiempoIndefinido->Checked) {
            $this->calFechFin->Visible = false;
        } else {
            $this->calFechFin->Visible = true;
        }
    }

    protected function lstDeteClie_Change() {
        switch ($this->lstDeteClie->SelectedValue) {
            case 'C':
                $this->txtCodigos->Name = 'Código(s) de Cliente(s)';
                $this->txtCodigos->Visible = true;
                $this->txtCodigos->Text = '';
                break;
            case 'G':
                $this->txtCodigos->Name = 'Número(s) de Guía(s)';
                $this->txtCodigos->Visible = true;
                $this->txtCodigos->Text = '';
                break;
            default:
                $this->txtCodigos->Visible = false;
                $this->txtCodigos->Text = 'TODOS';
                break;
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/mensaje_yamaguchi_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/mensaje_yamaguchi_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/mensaje_yamaguchi_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/mensaje_yamaguchi_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------------------------------------------------------
        // Se crean los array que le darán sentido a la lectura y guardado de Códigos de Cliente
        // para los Mensajes Yamaguchi, según los Números de Guía provistos por el Usuario.
        //----------------------------------------------------------------------------------------
        // $arrNumeGuia = array();
        $arrCodiClie = array();
        $arrGuiaErro = array();
        $arrClieErro = array();
        //----------------------------------------------------------------
        // Se agregan los contadores que permitirán informar al Usuario
        // de los resultados del proceso al crear los Mensajes CORP
        //----------------------------------------------------------------
        $intCantProc = 0;
        $intCantMens = 0;
        $intCantErro = 0;
        $blnTodoOkey = true;
        //--------------------------------------------
        // Se clona el objeto para verificar cambios
        //--------------------------------------------
        $objRegiViej = clone $this->mctMensajeYamaguchi->MensajeYamaguchi;
        //--------------------------------------------------------------------------
        // Se determina que opción se tomo de las opciónes para crear los Mensajes
        //--------------------------------------------------------------------------
        if ($this->lstDeteClie->SelectedValue == 'G') {
            //----------------------------------------------------------------------------
            // Si se ha escogido la opción de generar Mensajes según el Número de Guía,
            // se procesan uno a uno las Guías para buscar a los clientes de las mismas
            // ya que es a los mismos a los cuales va destinado el Mensaje aquí generado
            //----------------------------------------------------------------------------
            $arrNumeGuia = explode(',',nl2br2($this->txtCodigos->Text));
            //-----------------------------------------------------------------------------
            // Se eliminan Guías repetidas en el array mediante la función "array_unique"
            //-----------------------------------------------------------------------------
            $arrNumeGuia = array_unique($arrNumeGuia);
            //------------------------------------
            // Se recorren las Guías una por una
            //------------------------------------
            $this->txtCodigos->Text = '';
            foreach ($arrNumeGuia as $intNumeGuia) {
                //-----------------------------------------------
                // Se asegura su existencia en la Base de Datos
                //-----------------------------------------------
                $objGuia = Guia::Load($intNumeGuia);
                if ($objGuia) {
                    //------------------------------------------------------------------
                    // Si la Guía existe, se obtiene de la misma el Código del Cliente
                    //------------------------------------------------------------------
                    $objCliente  = MasterCliente::Load($objGuia->CodiClie);
                    if ($objCliente) {
                        //-----------------------------------------------
                        // Si existe el Cliente, se le asigna el Código
                        // de dicho Cliente al array correspondiente.
                        //-----------------------------------------------
                        $arrCodiClie[] = $objCliente->CodigoInterno;
                        //------------------------------------------------------
                        // Se incrementan los contadores para llevar la cuenta
                        //------------------------------------------------------
                        $intCantMens++;
                    }
                } else {
                    $arrGuiaErro[] = $intNumeGuia;
                    $intCantErro++;
                }
                $intCantProc++;
            }
        } elseif ($this->lstDeteClie->SelectedValue == 'C') {
            // t('Mensaje por para algunos Clientes en particular...');
            //------------------------------------------------------------------------------
            // En este caso el mensaje se hará visible para algunos Clientes en particular
            //------------------------------------------------------------------------------
            $arrCodiClie = explode(',',nl2br2($this->txtCodigos->Text));
            $this->txtCodigos->Text = '';
            foreach ($arrCodiClie as $strCodiClie) {
                $objCliente  = MasterCliente::LoadByCodigoInterno($strCodiClie);
                if ($objCliente) {
                    //-----------------------------------------------
                    // Si existe el Cliente, se le asigna el Código
                    // de dicho Cliente al array correspondiente.
                    //-----------------------------------------------
                    $arrCodiClie[] = $objCliente->CodigoInterno;
                    //------------------------------------------------------
                    // Se incrementan los contadores para llevar la cuenta
                    //------------------------------------------------------
                    $intCantProc++;
                    $intCantMens++;
                } else {
                    $arrClieErro[] = $strCodiClie;
                }
            }
        } else {
            // t('Mensaje para todos los Clientes...');
            $intCantProc = MasterCliente::CountByCodiStat(StatusType::ACTIVO);
        }
        if (count($arrCodiClie)) {
            // t('Existe el vector de Codigos de Clientes');
            //--------------------------------------
            // Se eliminan Clientes repetidos.
            //--------------------------------------
            $arrCodiClie = array_unique($arrCodiClie);
            //-------------------------------------------------------------
            // Se agregan los Códigos de Cliente al campo correspondiente
            //-------------------------------------------------------------
            $this->txtCodigos->Text = implode(',',nl2br2($arrCodiClie));
        }
        //-------------------------------------------------------------
        // Se verifica que exista algún Cliente para ejecutar el Save
        //-------------------------------------------------------------
        if ($intCantProc > 0) {
            // t('Existes registros para procesar');
            if ($this->lstDeteClie->SelectedValue == 'T') {
                // t('Todos los Clientes...');
                $strMensUsua  = 'Mensaje Creado para Todos los Clientes.';
            } else {
                // t('Conteo de Clientes');
                $strMensUsua  = 'Mensajes a Crear: <strong>'.$intCantProc.'</strong>';
                $strMensUsua .= ' | Mensajes Creados: <strong>'.$intCantMens.'</strong>';
                if ($intCantErro > 0) {
                    $strMensUsua .= ' | Errores: <strong>'.$intCantErro.'</strong>';
                }
            }
            //-----------------------------
            // Se graba el Mensaje CORP
            //-----------------------------
            // t('Antes de guardar los datos en la BD: '.$this->txtLogin->Text);
            $this->mctMensajeYamaguchi->SaveMensajeYamaguchi();
            // t('Acabo de grabar el mensaje en la base de datos');
            //----------------------------------------------------------------------------------
            // Si la posición u orden asignada a este Mensaje ya está siendo ocupada por otro,
            // se le incrementará el número de esa posición al Mensaje previo para permitirle
            // al nuevo Mensaje retener su posición u orden y desplazar al resto hacia abajo.
            //----------------------------------------------------------------------------------
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::MensajeYamaguchi()->Orden);
            $arrMensYama = MensajeYamaguchi::LoadAll($objClauOrde);
            $intOrdeRefe = $this->txtOrden->Text;
            $intCantMens = count($arrMensYama);
            $intIndiVect = 0;
            while ($intIndiVect < $intCantMens) {
                $objMensYama = $arrMensYama[$intIndiVect];
                if (($objMensYama->Orden == $intOrdeRefe) && 
                    ($objMensYama->Id != $this->mctMensajeYamaguchi->MensajeYamaguchi->Id)) {
                    $objMensYama->Orden += 1;
                    $objMensYama->Save();
                    $intOrdeRefe += 1;
                }
                $intIndiVect ++;
            }
            if ($this->mctMensajeYamaguchi->EditMode) {
                $strMensUsua  = 'Transaccion Exitosa.';
                //----------------------------------------------------
                // Si estamos en modo Edicion, entonces se verifican
                // la existencia de algun cambio en algun dato.
                //----------------------------------------------------
                $objRegiNuev = $this->mctMensajeYamaguchi->MensajeYamaguchi;
                $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                // t('Estatus de la compración: '.$objResuComp->FriendlyComparisonStatus);
                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                    // t('Hubo cambios');
                    //------------------------------------------
                    // En caso de que el objeto haya cambiado 
                    //------------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'MensajeCORP';
                    $arrLogxCamb['intRefeRegi'] = $this->mctMensajeYamaguchi->MensajeYamaguchi->Id;
                    $arrLogxCamb['strNombRegi'] = $this->mctMensajeYamaguchi->MensajeYamaguchi->Tipo.' | '.$this->mctMensajeYamaguchi->MensajeYamaguchi->Texto;
                    $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/mensaje_yamaguchi_edit.php/'.$this->mctMensajeYamaguchi->MensajeYamaguchi->Id;
                    LogDeCambios($arrLogxCamb);
                    $this->ejemplo_mensaje(
                        $this->mctMensajeYamaguchi->MensajeYamaguchi->Texto,
                        $this->mctMensajeYamaguchi->MensajeYamaguchi->Tipo,
                        $this->mctMensajeYamaguchi->MensajeYamaguchi->Icono
                    );
                }
            } else {
                // t('Estoy en modo insercion');
                $arrLogxCamb['strNombTabl'] = 'MensajeCORP';
                $arrLogxCamb['intRefeRegi'] = $this->mctMensajeYamaguchi->MensajeYamaguchi->Id;
                $arrLogxCamb['strNombRegi'] = $this->mctMensajeYamaguchi->MensajeYamaguchi->Tipo.' | '.$this->mctMensajeYamaguchi->MensajeYamaguchi->Texto;
                $arrLogxCamb['strDescCamb'] = "Creado";
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/mensaje_yamaguchi_edit.php/'.$this->mctMensajeYamaguchi->MensajeYamaguchi->Id;
                LogDeCambios($arrLogxCamb);
                $this->ejemplo_mensaje(
                    $this->mctMensajeYamaguchi->MensajeYamaguchi->Texto,
                    $this->mctMensajeYamaguchi->MensajeYamaguchi->Tipo,
                    $this->mctMensajeYamaguchi->MensajeYamaguchi->Icono
                    );
            }
        } else {
            // t('No había registros para procesar');
            $strMensUsua = 'No se creó el mensaje! Verifique 
                            la información e intente nuevamente.';
            $blnTodoOkey = false;
        }
        if (count($arrGuiaErro)) {
            // t('Habían Guías con error');
            $this->txtCodigos->Text = '';
            foreach ($arrGuiaErro as $strGuiaErro) {
                if (strlen($this->txtCodigos->Text)) {
                    $this->txtCodigos->Text .= ',';
                    $this->txtCodigos->Text .= "$strGuiaErro (No Existe)";
                } else {
                    $this->txtCodigos->Text = "$strGuiaErro (No Existe)";
                }
            }
        }
        if (count($arrClieErro)) {
            // t('Habían Clientes con error');
            $this->txtCodigos->Text = '';
            foreach ($arrClieErro as $strClieErro) {
                if (strlen($this->txtCodigos->Text)) {
                    $this->txtCodigos->Text .= ',';
                    $this->txtCodigos->Text .= "$strClieErro (No Existe)";
                } else {
                    $this->txtCodigos->Text = "$strClieErro (No Existe)";
                }
            }
        }
        //--------------------------------------------------------------------------------
        // Se actualiza el Mensaje de Respuesta al Usuario para indicarle los resultados
        //--------------------------------------------------------------------------------
        // t('Terminando el proceso $blnTodoOkey: '.$blnTodoOkey);
        if ($blnTodoOkey) {
            $this->mensaje($strMensUsua,'','s',__iCHEC__);
        } else {
            $this->mensaje($strMensUsua,'','d',__iHAND__);
        }
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctMensajeYamaguchi->TablasRelacionadasMensajeYamaguchi();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            $this->mensaje(sprintf('Existen registros relacionados en %s',$strTablRela),'','d','hand-stop-o');
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctMensajeYamaguchi->DeleteMensajeYamaguchi();
            $arrLogxCamb['strNombTabl'] = 'MensajeCORP';
            $arrLogxCamb['intRefeRegi'] = $this->mctMensajeYamaguchi->MensajeYamaguchi->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctMensajeYamaguchi->MensajeYamaguchi->Tipo.' | '.$this->mctMensajeYamaguchi->MensajeYamaguchi->Texto;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// mensaje_yamaguchi_edit.tpl.php as the included HTML template file
MensajeYamaguchiEditForm::Run('MensajeYamaguchiEditForm');
?>