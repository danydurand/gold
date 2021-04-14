<?php
require_once('qcubed.inc.php');

class Registro extends QForm {

    protected $txtNombClie;
    protected $txtNumeCedu;
    protected $txtDireMail;
    protected $txtFechNaci;
    protected $txtClavAcce;
    protected $txtClavAcc2;
    protected $rdbSexoClie;
    protected $txtTeleFijo;
    protected $txtTeleMovi;
    protected $lstEstaClie;
    protected $lstCiudClie;
    protected $lstSucuClie;
    protected $txtDireEntr;
    protected $lstMediPubl;
    protected $txtRecoPorx;
    protected $txtNombAmig;
    protected $lblRecoPorx;

    protected $btnSave;
    protected $btnCancel;

    protected function Form_Create() {

        $this->txtNombClie_Create();
        $this->txtNumeCedu_Create();
        $this->txtDireMail_Create();
        $this->txtFechNaci_Create();
        $this->txtClavAcce_Create();
        $this->txtClavAcc2_Create();
        $this->rdbSexoClie_Create();
        $this->txtTeleMovi_Create();
        $this->txtTeleFijo_Create();
        $this->lstEstaClie_Create();
        $this->lstCiudClie_Create();
        $this->lstSucuClie_Create();
        $this->txtDireEntr_Create();
        $this->lstMediPubl_Create();
        $this->txtRecoPorx_Create();
        $this->txtNombAmig_Create();
        $this->lblRecoPorx_Create();

        $this->btnSave_Create();
        // $this->btnCancel_Create();
    }

    //------------------------------
    // Aqui se crean los objetos
    //------------------------------

    protected function txtNombClie_Create() {
        $this->txtNombClie = new QTextBox($this);
        $this->txtNombClie->CssClass = 'form-control';
        $this->txtNombClie->Placeholder = 'Nombre';
        $this->txtNombClie->Required = true;
    }

    protected function txtNumeCedu_Create() {
        $this->txtNumeCedu = new QTextBox($this);
        $this->txtNumeCedu->CssClass = 'form-control';
        $this->txtNumeCedu->Placeholder = 'Cédula';
        $this->txtNumeCedu->Required = true;
    }
    
    protected function txtDireMail_Create() {
        $this->txtDireMail = new QEmailTextBox($this);
        $this->txtDireMail->CssClass = 'form-control';
        $this->txtDireMail->Placeholder = 'Correo Electrónico';
        $this->txtDireMail->Required = true;
    }
    
    protected function txtFechNaci_Create() {
        $this->txtFechNaci = new QTextBox($this);
        $this->txtFechNaci->CssClass = 'form-control';
        $this->txtFechNaci->Placeholder = 'Fecha de Nacimiento (AAAA-MM-DD)';
        $this->txtFechNaci->Required = true;
    }
    
    protected function txtClavAcce_Create() {
        $this->txtClavAcce = new QTextBox($this);
        $this->txtClavAcce->CssClass = 'form-control';
        $this->txtClavAcce->Placeholder = 'Contraseña';
        $this->txtClavAcce->TextMode = QTextMode::Password;
        $this->txtClavAcce->Required = true;
    }
    
    protected function txtClavAcc2_Create() {
        $this->txtClavAcc2 = new QTextBox($this);
        $this->txtClavAcc2->CssClass = 'form-control';
        $this->txtClavAcc2->Placeholder = 'Confirmar Contraseña';
        $this->txtClavAcc2->TextMode = QTextMode::Password;
        $this->txtClavAcc2->Required = true;
    }
    
    protected function rdbSexoClie_Create() {
        $this->rdbSexoClie = new QRadioButtonList($this);
        $this->rdbSexoClie->Name = 'Sexo';
        $this->rdbSexoClie->AddItem('&nbsp;M&nbsp;&nbsp;&nbsp;','M');
        $this->rdbSexoClie->AddItem('&nbsp;F','F');
        $this->rdbSexoClie->HtmlEntities = false;
        $this->rdbSexoClie->RepeatColumns = 2;
        // $this->rdbSexoClie->CssClass = 'radio-inline';
        $this->rdbSexoClie->Required = true;
    }
    
    protected function txtTeleMovi_Create() {
        $this->txtTeleMovi = new QTextBox($this);
        $this->txtTeleMovi->CssClass = 'form-control';
        $this->txtTeleMovi->Placeholder = 'Teléfono Móvil';
        $this->txtTeleMovi->Required = true;
    }
    
    protected function txtTeleFijo_Create() {
        $this->txtTeleFijo = new QTextBox($this);
        $this->txtTeleFijo->CssClass = 'form-control';
        $this->txtTeleFijo->Placeholder = 'Teléfono Fijo';
        $this->txtTeleFijo->Required = true;
    }
    
    protected function lstEstaClie_Create() {
        $this->lstEstaClie = new QListBox($this);
        $this->lstEstaClie->CssClass = 'ui-btn ui-btn-a ui-corner-all ui-shadow';
        $this->lstEstaClie->Required = true;
        $this->lstEstaClie->AddItem('- Seleccione Estado -', null);
        $arrEstaSist = Estado::LoadAll();
        foreach ($arrEstaSist as $objEstaSist) {
            $this->lstEstaClie->AddItem($objEstaSist->__toString(), $objEstaSist->Id);
        }
        $this->lstEstaClie->AddAction(new QChangeEvent(), new QAjaxAction('lstEstaClie_Change'));
    }
    
    protected function lstCiudClie_Create() {
        $this->lstCiudClie = new QListBox($this);
        $this->lstCiudClie->CssClass = 'ui-btn ui-btn-a ui-corner-all ui-shadow';
        $this->lstCiudClie->Required = true;
        $this->lstCiudClie->AddItem('- Seleccione Ciudad -', null);
    }
    
    protected function lstSucuClie_Create() {
        $this->lstSucuClie = new QListBox($this);
        $this->lstSucuClie->CssClass = 'ui-btn ui-btn-a ui-corner-all ui-shadow';
        $this->lstSucuClie->Required = true;
        $this->lstSucuClie->AddItem('- Seleccione Sucursal -', null);
        $arrSucuSist = Sucursal::LoadAll();
        foreach ($arrSucuSist as $objSucuSist) {
            $this->lstSucuClie->AddItem($objSucuSist->__toString(), $objSucuSist->Id);
        }
    }
    
    protected function txtDireEntr_Create() {
        $this->txtDireEntr = new QTextBox($this);
        $this->txtDireEntr->CssClass = 'form-control';
        $this->txtDireEntr->Placeholder = 'Dirección';
        $this->txtDireEntr->TextMode = QTextMode::MultiLine;
        $this->txtDireEntr->Required = true;
    }
    
    protected function lstMediPubl_Create() {
        $this->lstMediPubl = new QListBox($this);
        $this->lstMediPubl->CssClass = 'form-control';
        $this->lstMediPubl->Required = true;
        $this->lstMediPubl->AddItem('- Medio Publicitario -', null);
        $arrMediPubl = MedioPub::LoadAll();
        foreach ($arrMediPubl as $objMediPubl) {
            $this->lstMediPubl->AddItem($objMediPubl->__toString(), $objMediPubl->Id);
        }
        $this->lstMediPubl->AddAction(new QChangeEvent(), new QAjaxAction('lstMediPubl_Change'));
    }
    
    protected function txtRecoPorx_Create() {
        $this->txtRecoPorx = new QIntegerTextBox($this);
        $this->txtRecoPorx->CssClass = 'form-control';
        $this->txtRecoPorx->Placeholder = 'Código';
        $this->txtRecoPorx->Visible = false;
        $this->txtRecoPorx->AddAction(new QKeyPressEvent(600), new QAjaxAction('txtRecoPorx_Change'));
    }
    
    protected function txtNombAmig_Create() {
        $this->txtNombAmig = new QTextBox($this);
        $this->txtNombAmig->CssClass = 'form-control';
        $this->txtNombAmig->Placeholder = 'Nombre del Amigo';
        $this->txtNombAmig->Width = 430;
        $this->txtNombAmig->Enabled = false;
        $this->txtNombAmig->ForeColor = 'blue';
        $this->txtNombAmig->Visible = false;
    }
    
    protected function lblRecoPorx_Create() {
        $this->lblRecoPorx = new QLabel($this);
        $this->lblRecoPorx->Text = 'Recomendado Por:';
        $this->lblRecoPorx->Visible = false;
    }
    

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-floppy-o fa-lg"></i> Guardar';
        $this->btnSave->HtmlEntities = 'false';
        $this->btnSave->CausesValidation = true;
        // $this->btnSave->CssClass = 'btn btn-warning';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
    }

    //-----------------------------------
    // Acciones relativas a los objetos 
    //-----------------------------------

    protected function txtRecoPorx_Change() {
        if (!is_empty($this->txtRecoPorx->Text)) {
            $intCodiAmig = intval($this->txtRecoPorx->Text) ;
            $objClieAmig = Cliente::Load($intCodiAmig);
            if ($objClieAmig) {
                $this->txtNombAmig->Text = $objClieAmig->__toString();
            } else {
                $this->txtRecoPorx->Warning = 'Cliente Desconocido';
            }
        }
    }
    

    protected function lstMediPubl_Change() {
        $blnCampVisi = $this->lstMediPubl->SelectedName == 'UN(A) AMIGO(A)';
        $this->txtRecoPorx->Visible = $blnCampVisi;
        $this->txtNombAmig->Visible = $blnCampVisi;
        $this->lblRecoPorx->Visible = $blnCampVisi;
    }
    

    protected function lstEstaClie_Change() {
        if (!is_null($this->lstEstaClie->SelectedValue)) {
            $this->lstCiudClie->RemoveAllItems();
            $arrCiudEsta = Ciudad::LoadArrayByEstadoId($this->lstEstaClie->SelectedValue);
            $intCiudEsta = count($arrCiudEsta);
            $this->lstCiudClie->AddItem('- Seleccione Ciudad - ('.$intCiudEsta.')', null);
            foreach ($arrCiudEsta as $objCiudEsta) {
                $this->lstCiudClie->AddItem($objCiudEsta->__toString(), $objCiudEsta->Id);
            }
            $this->lstCiudClie->CssClass = 'ui-btn ui-btn-a ui-corner-all ui-shadow';
            $this->lstCiudClie->Width = "100%";
        }
    }
    
    protected function Form_Validate() {
        $blnTodoOkey = true;
        //---------------------------------------------------------
        // Se valida que las claves proporcionadas, sean iguales 
        //---------------------------------------------------------
        if ($this->txtClavAcce->Text != $this->txtClavAcc2->Text) {
            $this->txtClavAcce->Warning = 'Las Claves No Coinciden';
            $this->txtClavAcc2->Warning = 'Las Claves No Coinciden';
            $blnTodoOkey = false;
        }
        //------------------------------------------------------------------
        // Se valida la existencia previa del Cliente (email) en la BD 
        //------------------------------------------------------------------
        $objClieExis = Cliente::LoadByEmail($this->txtDireMail->Text);
        if ($objClieExis) {
            $this->txtDireMail->Warning = 'Este email ya esta registrado en nuestra base de datos';
            $blnTodoOkey = false;
        }
        //------------------------------------------------------------------
        // Se verifica que el nro de cedula no este vacio
        //------------------------------------------------------------------
        $this->txtNumeCedu->Text = DejarSoloLosNumeros($this->txtNumeCedu->Text);
        if (strlen($this->txtNumeCedu->Text) == 0) {
            $this->txtNumeCedu->Warning = 'Obligatorio';
            $blnTodoOkey = false;
        }
        //------------------------------------------------------------------
        // Se valida la existencia previa del Cliente (cedula) en la BD 
        //------------------------------------------------------------------
        $objClieExis = Cliente::LoadByCedulaRif($this->txtNumeCedu->Text);
        if ($objClieExis) {
            $this->txtNumeCedu->Warning = 'Esta Cédula ya esta registrada en nuestra base de datos';
            $blnTodoOkey = false;
        }
        return $blnTodoOkey;
    }
    

    protected function btnSave_Click() {
        $objCliente = new Cliente();
        $objCliente->Nombre             = strtoupper($this->txtNombClie->Text);
        $objCliente->CedulaRif          = $this->txtNumeCedu->Text;
        $objCliente->Email              = $this->txtDireMail->Text;
        $objCliente->ClaveAcceso        = $this->txtClavAcce->Text;
        $objCliente->TelefonoMovil      = $this->txtTeleMovi->Text;
        $objCliente->TelefonoFijo       = $this->txtTeleFijo->Text;
        $objCliente->FechaNacimiento    = $this->txtFechNaci->DateTime;
        $objCliente->Direccion          = $this->txtDireEntr->Text;
        $objCliente->Sexo               = $this->rdbSexoClie->SelectedValue;
        $objCliente->VendedorId         = 1;
        $objCliente->EstadoId           = $this->lstEstaClie->SelectedValue;
        $objCliente->CiudadId           = $this->lstCiudClie->SelectedValue;
        $objCliente->SucursalId         = 1;
        $objCliente->MedioId            = $this->lstMediPubl->SelectedValue;
        $objCliente->CodigoConfirmacion = generarCodigo();
        $objCliente->RegistradoEl       = new QDateTime(QDateTime::Now);
        $objCliente->RegistradoPor      = 'pweb';
        $objCliente->Save();
        //--------------------------------
        // Enviar Email de Confirmacion 
        //--------------------------------
        $this->EnviarEmailDeConfirmacion($objCliente);

        QApplication::Redirect('send-registro.php');
    }

    protected function EnviarEmailDeConfirmacion(Cliente $objCliente) {

        $objMessage = new QEmailMessage();
        $objMessage->From = 'ServiExpress <locahost@serviexpress.com>';
        $objMessage->To = $objCliente->__nombreYCorreo();
        // $objMessage->Bcc = '';
        $objMessage->Subject = 'ServiExpress Confirmacion de Registro ';

        $objMessage->HtmlBody = redactarEmailConfirmacionE2($objCliente);

        // Add random/custom email headers
        $objMessage->SetHeader('x-application', 'Sistema Okinawa');

        // Send the Message (Commented out for obvious reasons)
        QEmailServer::Send($objMessage);
        
    }

    
    
}

Registro::Run('Registro','registro.tpl.php');
?>
