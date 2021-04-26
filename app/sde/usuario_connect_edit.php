<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/UsuarioConnectEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the UsuarioConnect class.  It uses the code-generated
 * UsuarioConnectMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a UsuarioConnect columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both usuario_connect_edit.php AND
 * usuario_connect_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class UsuarioConnectEditForm extends UsuarioConnectEditFormBase {
    //---------------------
    //Parametros de campos
    //---------------------
    protected $txtBuscCodi;
    protected $txtBuscNomb;
    protected $lstClieEnco;

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
        
        $this->lblTituForm->Text = 'Usuario CORP';
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

        //------------------------------------
        //Campos para la búsqueda del cliente
        //------------------------------------
        $this->txtBuscCodi_Create();
        $this->txtBuscNomb_Create();

        // Use the CreateFromPathInfo shortcut (this can also be done manually using the UsuarioConnectMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctUsuarioConnect = UsuarioConnectMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on UsuarioConnect's data fields
		$this->lblId = $this->mctUsuarioConnect->lblId_Create();

        $this->lstCliente = $this->mctUsuarioConnect->lstCliente_Create();
        $this->lstCliente->Name = 'Cliente(s) Encontrado(s)';
        $this->lstCliente->RemoveAllItems();
        if ($this->mctUsuarioConnect->EditMode) {
            $objCliente = $this->mctUsuarioConnect->UsuarioConnect->Cliente;
            $this->lstCliente->AddItem($objCliente->__toStringConCodigoInterno(), $objCliente->CodiClie,true);
        } else {
            $this->lstCliente->AddItem('- Seleccione Uno -',null);
        }
		$this->lstCliente->Width = 300;
		$this->lstCliente->AddAction(new QChangeEvent(), new QAjaxAction('lstCliente_Change'));

		$this->txtNombre = $this->mctUsuarioConnect->txtNombre_Create();
		$this->txtNombre->Width = 200;

        $this->txtDireccion = $this->mctUsuarioConnect->txtDireccion_Create();
		$this->txtDireccion->Name = 'Dirección';
		$this->txtDireccion->TextMode = QTextMode::MultiLine;
		$this->txtDireccion->Width = 250;

		$this->txtEmail = $this->mctUsuarioConnect->txtEmail_Create();
		$this->txtEmail->Width = 200;

        $this->txtTelefono = $this->mctUsuarioConnect->txtTelefono_Create();
		$this->txtTelefono->Name = 'Teléfono';

		$this->txtLogiUsua = $this->mctUsuarioConnect->txtLogiUsua_Create();
        $this->txtLogiUsua->Required = true;
        $this->txtLogiUsua->Width = 100;

		$this->txtClaveAcceso = $this->mctUsuarioConnect->txtClaveAcceso_Create();
        $this->txtClaveAcceso->TextMode = QTextMode::Password;
        $this->txtClaveAcceso->Width = UsuarioConnect::ClaveAccesoMaxLength;
		
        $this->lstSucursal = $this->mctUsuarioConnect->lstSucursal_Create();
        $this->lstSucursal->Width = 200;

		$this->lstStatus = $this->mctUsuarioConnect->lstStatus_Create();
		$this->lstStatus->AddAction(new QChangeEvent(), new QAjaxAction('lstStatus_Change'));

		$this->calFechaRegistro = $this->mctUsuarioConnect->calFechaRegistro_Create();
        $this->calFechaRegistro->Required = true;
        $this->calFechaRegistro->Enabled = false;
        $this->calFechaRegistro->ForeColor = 'blue';
        $this->calFechaRegistro->Width = 100;

        $this->txtCodigoPostal = $this->mctUsuarioConnect->txtCodigoPostal_Create();
		$this->txtCodigoPostal->Name = 'Código Postal';
		$this->txtCodigoPostal->Width = 100;

		$this->calFechaAcceso = $this->mctUsuarioConnect->calFechaAcceso_Create();
        $this->calFechaAcceso->Enabled = false;
        $this->calFechaAcceso->ForeColor = 'blue';
        $this->calFechaAcceso->Width = 100;

		$this->txtCantidadIntentos = $this->mctUsuarioConnect->txtCantidadIntentos_Create();
		$this->txtCantidadIntentos->Name = 'Intentos Fallidos';
		$this->txtCantidadIntentos->Width = 30;
		$this->txtCantidadIntentos->Enabled = false;
		$this->txtCantidadIntentos->ForeColor = 'blue';

		$this->txtMotivoBloqueo = $this->mctUsuarioConnect->txtMotivoBloqueo_Create();
		$this->txtMotivoBloqueo->TextMode = QTextMode::MultiLine;
		$this->txtMotivoBloqueo->Width = 250;
		$this->txtMotivoBloqueo->Visible = !$this->mctUsuarioConnect->UsuarioConnect->StatusId;

        if (!$this->mctUsuarioConnect->EditMode) {
            $this->calFechaRegistro->DateTime = new QDateTime(QDateTime::Now);
            $this->txtCantidadIntentos->Text = 0;
            $this->txtCantidadIntentos->Enabled = false;
            $this->txtCantidadIntentos->ForeColor = 'blue';
        }
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function btnDelete_Create() {
        $this->btnDelete = new QButton($this);
        $this->btnDelete->Text = '<i class="fa fa-trash-o fa-lg"></i> Borrar';
        $this->btnDelete->CssClass = 'btn btn-danger btn-sm';
        $this->btnDelete->HtmlEntities = false;
        $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Usuario CORP'))));
        $this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnDelete->Visible = $this->mctUsuarioConnect->EditMode;
    }

    protected function btnBorrSmal_Create() {
        $this->btnBorrSmal = new QButton($this);
        $this->btnBorrSmal->Text = '<i class="fa fa-trash-o fa-lg"></i>';
        $this->btnBorrSmal->CssClass = 'btn btn-danger btn-sm';
        $this->btnBorrSmal->HtmlEntities = false;
        $this->btnBorrSmal->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Usuario CORP'))));
        $this->btnBorrSmal->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnBorrSmal->Visible = $this->mctUsuarioConnect->EditMode;
    }


    protected function determinarPosicion() {
        if ($this->mctUsuarioConnect->UsuarioConnect && !isset($_SESSION['DataUsuarioConnect'])) {
            $_SESSION['DataUsuarioConnect'] = serialize(array($this->mctUsuarioConnect->UsuarioConnect));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataUsuarioConnect']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctUsuarioConnect->UsuarioConnect->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('UsuarioConnect',$this->mctUsuarioConnect->UsuarioConnect->Id);
    }

    protected function txtBuscCodi_Create() {
        $this->txtBuscCodi = new QTextBox($this);
        $this->txtBuscCodi->Name = 'Buscar Cliente por Código';
        $this->txtBuscCodi->Width = 100;
        $this->txtBuscCodi->ActionParameter = 'Code';
        $this->txtBuscCodi->Placeholder = 'Código del Cliente';
        $this->txtBuscCodi->AddAction(new QBlurEvent(), new QAjaxAction('BuscarCliente'));
    }

    protected function txtBuscNomb_Create() {
        $this->txtBuscNomb = new QTextBox($this);
        $this->txtBuscNomb->Name = 'Buscar Cliente por Nombre';
        $this->txtBuscNomb->Width = 200;
        $this->txtBuscNomb->ActionParameter = 'Name';
        $this->txtBuscNomb->Placeholder = 'Nombre del Cliente';
        $this->txtBuscNomb->AddAction(new QBlurEvent(), new QAjaxAction('BuscarCliente'));
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function lstStatus_Change() {
	    if ($this->lstStatus->SelectedValue == StatusType::ACTIVO) {
	        $this->txtCantidadIntentos->Text = 0;
	        $this->txtMotivoBloqueo->Text = '';
        } else {
            $this->txtMotivoBloqueo->Required = true;
        }
        $this->txtMotivoBloqueo->Visible = !$this->lstStatus->SelectedValue;
    }

    protected function BuscarCliente() {
        $strParaBusc = '';
        $strCodiClie = '';
        $strNombClie = '';
        //--------------------------------
        // Validando criterios a usar ...
        //--------------------------------
        if (strlen(trim($this->txtBuscCodi->Text)) > 0) {
            //------------------------------------
            // Se busca por el código del cliente
            //------------------------------------
            $this->txtBuscNomb->Text = '';
            $this->txtBuscCodi->Text = strtoupper($this->txtBuscCodi->Text);
            $strCodiClie = $this->txtBuscCodi->Text;
            $strParaBusc = 'Code';
        } else {
            //------------------------------------------
            // Se limpia y bloquea la lista de clientes
            //------------------------------------------
            $this->lstCliente->RemoveAllItems();
            $this->lstCliente->Enabled = false;
            $this->lstCliente->ForeColor = 'blue';
            $this->lstCliente->AddItem('- Seleccione Uno -',null);
            if (strlen(trim($this->txtBuscNomb->Text)) > 0) {
                //------------------------------------
                // Se busca por el nombre del cliente
                //------------------------------------
                $this->txtBuscCodi->Text = '';
                $this->txtBuscNomb->Text = strtoupper($this->txtBuscNomb->Text);
                $strNombClie = $this->txtBuscNomb->Text;
                $strParaBusc = 'Name';
            } else {
                //------------------------------------------
                // Se limpia y bloquea la lista de clientes
                //------------------------------------------
                $this->lstCliente->RemoveAllItems();
                $this->lstCliente->Enabled = false;
                $this->lstCliente->ForeColor = 'blue';
                $this->lstCliente->AddItem('- Seleccione Uno -',null);
            }
        }
        //------------------------------------------------------------------
        // Se verifica si se usará un criterio para la búsqueda de clientes
        //------------------------------------------------------------------
        if (strlen($strParaBusc) > 0) {
            //-----------------------------------------------------
            // Se inicializa un vector para almacenar los clientes
            //-----------------------------------------------------
            $arrClieGuia = array();
            //-----------------------------------------------------------------------------
            // Se comienza a buscar al cliente o a los clientes según el criterio definido
            //-----------------------------------------------------------------------------
            switch ($strParaBusc) {
                case 'Code':
                    //----------------------------
                    // Se busca por el código ...
                    //----------------------------
                    $objClauOrde   = QQ::Clause();
                    $objClauOrde[] = QQ::OrderBy(QQN::MasterCliente()->NombClie);
                    $arrClieGuia[] = MasterCliente::LoadByCodigoInterno($strCodiClie);
                    break;
                case 'Name':
                    //----------------------------
                    // Se busca por el nombre ...
                    //----------------------------
                    $objClauOrde   = QQ::Clause();
                    $objClauOrde[] = QQ::OrderBy(QQN::MasterCliente()->NombClie);
                    $objClauWher   = QQ::Clause();
                    $objClauWher[] = QQ::Like(QQN::MasterCliente()->NombClie,"%".$strNombClie."%");
                    $arrClieGuia   = MasterCliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                    break;
            }
            //----------------------------------------------------------------------
            // Se valida si se ha(n) optenido resultado(s) de la búsqueda realizada
            //----------------------------------------------------------------------
            if (count($arrClieGuia) > 0) {
                //--------------------------------------------------------------
                // Se logró obtener resultados. Se limpia la lista de clientes.
                //--------------------------------------------------------------
                $this->lstCliente->RemoveAllItems();
                $intCantClie = count($arrClieGuia);
                //------------------------------------------------------------------------------------
                // Se busca el Cliente cuyo Código o Nombre coincida con el valor dado por el Usuario
                //------------------------------------------------------------------------------------
                if ($intCantClie == 1) {
                    //-----------------------------------------
                    // Solamente se consiguió un solo cliente.
                    //-----------------------------------------
                    $objClieGuia = $arrClieGuia[0];
                    $this->lstCliente->AddItem($objClieGuia->__toStringConCodigoInterno(), $objClieGuia->CodiClie,true);
                    $this->lstCliente_Change();
                } else {
                    //---------------------------------------------------------------------------------------------
                    // Se consiguió a más de un cliente. Se procede a habilitar y a preparar la lista de clientes.
                    //---------------------------------------------------------------------------------------------
                    $this->lstCliente->Enabled = true;
                    $this->lstCliente->ForeColor = '';
                    $this->lstCliente->AddItem('- Selecione Uno - ('.$intCantClie.')', null);
                    //---------------------------------------------------------------------------------
                    // Se comienza a recorrer el vector de clientes y se agrega a la lista uno por uno
                    //---------------------------------------------------------------------------------
                    foreach ($arrClieGuia as $objClieGuia) {
                        $this->lstCliente->AddItem($objClieGuia->__toStringConCodigoInterno(), $objClieGuia->CodiClie);
                    }
                }
            } else {
                //----------------------------------------------------------------
                // No se logró obtener resultados, por lo que se muestra al
                // usuario el mensaje que corresponde según el criterio definido.
                //----------------------------------------------------------------
                switch ($strParaBusc) {
                    case 'Code':
                        $this->mensaje('No existe Cliente con ese Código','','d','i','hand-stop-o');
                        break;
                    case 'Name':
                        $this->mensaje('No existe Cliente con ese Nombre','','d','i','hand-stop-o');
                        break;
                }
            }
        }
        //--------------------------------------------------
        // Se reestablece el tamaño de la lista de clientes
        //--------------------------------------------------
        $this->lstCliente->Width = 300;
    }

    protected function lstCliente_Change() {
        if ($this->lstCliente->SelectedValue) {
            if ($objCliente = MasterCliente::Load($this->lstCliente->SelectedValue)) {
                $this->txtDireccion->Text = $objCliente->DireReco;
                $this->txtTelefono->Text = $objCliente->TeleCona;
                $this->txtEmail->Text = $objCliente->DireMail;
            }
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/usuario_connect_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/usuario_connect_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/usuario_connect_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/usuario_connect_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctUsuarioConnect->UsuarioConnect;
		$this->mctUsuarioConnect->SaveUsuarioConnect();
		if ($this->mctUsuarioConnect->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctUsuarioConnect->UsuarioConnect;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'UsuarioCORP';
				$arrLogxCamb['intRefeRegi'] = $this->mctUsuarioConnect->UsuarioConnect->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctUsuarioConnect->UsuarioConnect->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/usuario_connect_edit.php/'.$this->mctUsuarioConnect->UsuarioConnect->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'UsuarioCORP';
			$arrLogxCamb['intRefeRegi'] = $this->mctUsuarioConnect->UsuarioConnect->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctUsuarioConnect->UsuarioConnect->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/usuario_connect_edit.php/'.$this->mctUsuarioConnect->UsuarioConnect->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // SoftDelete del Registro
        //----------------------------------------
        $this->mctUsuarioConnect->UsuarioConnect->DeletedAt        = new QDateTime(QDateTime::Now);
        $this->mctUsuarioConnect->UsuarioConnect->StatusId         = StatusType::INACTIVO;
        $this->mctUsuarioConnect->UsuarioConnect->CantidadIntentos = 50;
        $this->mctUsuarioConnect->UsuarioConnect->MotivoBloqueo    = 'Usuario Borrado del Sistema';
        $this->mctUsuarioConnect->UsuarioConnect->Save();
        //------------------------
        // Log de Transacciones
        //------------------------
        $arrLogxCamb['strNombTabl'] = 'UsuarioCORP';
        $arrLogxCamb['intRefeRegi'] = $this->mctUsuarioConnect->UsuarioConnect->LogiUsua;
        $arrLogxCamb['strNombRegi'] = $this->mctUsuarioConnect->UsuarioConnect->Nombre;
        $arrLogxCamb['strDescCamb'] = 'Borrado (Soft)';
        LogDeCambios($arrLogxCamb);
        $this->RedirectToListPage();

        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        // $blnTodoOkey = true;
        // $arrTablRela = $this->mctUsuarioConnect->TablasRelacionadasUsuarioConnect();
        // if (count($arrTablRela)) {
        //     $strTablRela = implode(',',$arrTablRela);
        //     $strTextMens = sprintf('Existen registros relacionados en %s',$strTablRela);
        //     $this->mensaje($strTextMens,'m','d',__iHAND__);
        //     $blnTodoOkey = false;
        // }
        // if ($blnTodoOkey) {
        //     // Delegate "Delete" processing to the ArancelMetaControl
        //     $this->mctUsuarioConnect->DeleteUsuarioConnect();
        //     $arrLogxCamb['strNombTabl'] = 'UsuarioCORP';
        //     $arrLogxCamb['intRefeRegi'] = $this->mctUsuarioConnect->UsuarioConnect->Id;
        //     $arrLogxCamb['strNombRegi'] = $this->mctUsuarioConnect->UsuarioConnect->Nombre;
        //     $arrLogxCamb['strDescCamb'] = "Borrado";
        //     LogDeCambios($arrLogxCamb);
        //     $this->RedirectToListPage();
        // }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// usuario_connect_edit.tpl.php as the included HTML template file
UsuarioConnectEditForm::Run('UsuarioConnectEditForm');
?>