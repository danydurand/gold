<?php
//-----------------------------------------------------------------------------
// Programa      : resetear_clave.php
// Elaborado por : Juan Duran
// Fecha Elab.   : 15/02/2017
// Descripcion   : Este programa, permite "re-setear" la clave de acceso al
//                 Sistema para cada uno de los Usuarios, cuyos logines sean
//                 proporcionados.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ResetearClave extends FormularioBaseKaizen {

	protected $txtLogiUsua;
	protected $txtNuevClav;
	protected $strDireMail;

	protected function Form_Create() {
        parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Resetear Clave de Acceso');

		$this->txtLogiUsua_Create();
		$this->txtNuevClav_Create();

        $this->btnSave->Text = '<i class="fa fa-exchange fa-lg"></i> Resetear';
        $this->btnSave->Visible = BuscarParametro('ReseUsua',$this->objUsuario->LogiUsua,"Val1",0);
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function txtLogiUsua_Create() {
		$this->txtLogiUsua = new QTextBox($this);
		$this->txtLogiUsua->Name = QApplication::Translate('Login(es)');
		$this->txtLogiUsua->TextMode = QTextMode::MultiLine;
		$this->txtLogiUsua->Rows = 10;
		$this->txtLogiUsua->Width = 150;
		$this->txtLogiUsua->Required = true;
	}

	protected function txtNuevClav_Create() {
		$this->txtNuevClav = new QTextBox($this);
		$this->txtNuevClav->Name = QApplication::Translate('Nueva Clave de Acceso');
		//$this->txtNuevClav->Required = true;
		$this->txtNuevClav->Visible = false;
		$this->txtNuevClav->Width = 150;
		$this->txtNuevClav->TextMode = QTextMode::Password;
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$arrListLogi = explode(',',nl2br2($this->txtLogiUsua->Text));
		//-----------------------------------------------------------------------------
		// Con array_unique se eliminan los logines repetidos en caso de que los haya
		//-----------------------------------------------------------------------------
		$arrListLogi = array_unique($arrListLogi,SORT_STRING);
		$this->txtLogiUsua->Text = '';
		//-------------------------------------------------
		// Se procesan uno a uno los login proporcionados
		//-------------------------------------------------
		$intCantErro = 0;
		$intUsuaProc = 0;
		foreach ($arrListLogi as $strLogiUsua) {
            if (strlen($strLogiUsua) > 0) {
                if (!in_array($strLogiUsua,array('cliente','liberty'))) {
                    $objUsuario = Usuario::LoadByLogiUsua($strLogiUsua);
                    if (!is_null($objUsuario->DeleteAt)) {
                        $objUsuario = null;
                    }
                    if ($objUsuario) {
                        //------------------------------------------------------------------------------
                        // Solo Usuarios habilitados podrán resetear las claves de los demás Usuarios
                        // de su Sucursal. Otros permisos permitirán resetear claves a nivel nacional.
                        //------------------------------------------------------------------------------
                        if ($objUsuario->CodiEsta != $this->objUsuario->CodiEsta) {
                            $blnOtraSucu = buscarParametro("ReseClav",$this->objUsuario->LogiUsua,"Val1",0);
                            if ($blnOtraSucu) {
                            	if (is_null($objUsuario->MailUsua) || strlen($objUsuario->MailUsua) == 0) {
                            		$this->txtLogiUsua->Text .= $strLogiUsua." | NO TIENE CORREO".chr(13);
                            		$intCantErro++;
                            	} else {
                            		$this->strDireMail = $objUsuario->MailUsua;
	                                $this->resetearUsuario($objUsuario);
	                                $intUsuaProc++;
                            	}
                            } else {
                                $this->txtLogiUsua->Text .= $strLogiUsua." (PERTENECE A OTRA SUCURSAL)".chr(13);
                            }
                        } else {
                        	if (is_null($objUsuario->MailUsua) || strlen($objUsuario->MailUsua) == 0) {
                        		$this->txtLogiUsua->Text .= $strLogiUsua." | NO TIENE CORREO".chr(13);
                        		$intCantErro++;
                        	} else {
                        		$this->strDireMail = $objUsuario->MailUsua;
                                $this->resetearUsuario($objUsuario);
                                $intUsuaProc++;
                        	}
                        }
                    } else {
                        $this->txtLogiUsua->Text .= $strLogiUsua." (NO EXISTE)".chr(13);
                        $intCantErro++;
                    }
                } else {
                    $this->txtLogiUsua->Text .= $strLogiUsua." (NO ADMITE RESETEO DE CLAVE)".chr(13);
                    $intCantErro++;
                }
            }
		}

		if ($intUsuaProc > 0 && $objUsuario) {
            //--------------------------------------------------------
            // Se deja constancia de la Notificación en el Histórico
            //--------------------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Cliente';
            $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
            $arrLogxCamb['strNombRegi'] = $objUsuario->NombUsua;
            $arrLogxCamb['strDescCamb'] = 'Solicitud de Cambio de Contraseña del Cliente '
                .$objUsuario->NombUsua.'('
                .$objUsuario->CodiGrup.')';
            $arrLogxCamb['strEnlaEnti'] = __OKI__.'/notificacion_edit.php/'.$objUsuario->CodiUsua;
            LogDeCambios($arrLogxCamb);

            // Se Genera el Mensaje de Resultados del Proceso //
	        $strTextMens = 'Usuarios Procesados: '.$intUsuaProc;
	        $strTipoMens = 's';
	        $strNombImag = 'check';
	        if ($intCantErro > 0) {
	            $strTextMens .= ' | Usuarios Errados: '.$intCantErro;
	        }
	    } else {
	        $strTextMens = 'Usuarios Procesados: '.$intUsuaProc;
	        if ($intCantErro > 0) {
	            $strTextMens .= ' | Usuarios Errados: '.$intCantErro;
	            $strTipoMens = 'w';
	            $strNombImag = 'exclamation-triangle';
	        }
	    }
        $strTextMens .= '.';
		$this->mensaje($strTextMens,'m',$strTipoMens,'',$strNombImag);
        $this->txtNuevClav->Text = '';
	}

	protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
	}

	protected function resetearUsuario(Usuario $objUsuario) {
        $strPassUsua = generarCodigo();
        $objUsuario->resetearClave($strPassUsua);

        // $objUsuario->PassUsua = md5($strPassUsua);
        // $objUsuario->FechClav = new QDateTime("2010-01-01");
        // $objUsuario->CantInte = 0;
        // $objUsuario->CodiStat = 1;
        // $objUsuario->MotiBloq = '';
        // $objUsuario->Save();
        // //-------------------------------------
        // // Se deja constancia en el Histórico
        // //-------------------------------------
        // $arrLogxCamb['strNombTabl'] = 'Usuario';
        // $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
        // $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
        // $arrLogxCamb['strDescCamb'] = "Clave Reseteada";
        // LogDeCambios($arrLogxCamb);
        // $this->RedactarEmail($objUsuario,$strPassUsua);
    }

	protected function RedactarEmail(Usuario $objUsuario,$strPassUsua) {
        //---------------------------------
        // Se Envía el Mensaje por E-mail
        //---------------------------------
        $to = $this->strDireMail;
        $strLogiUsua = $objUsuario->LogiUsua;
        $objMessage = new QEmailMessage();
        $objMessage->From = 'LibertyExpress - Yokohama <notificaciones@libertyexpress.com>';
        $objMessage->To = $to;
        $objMessage->Subject = 'Cambio de Clave ' . QDateTime::NowToString(QDateTime::FormatDisplayDate);

        // Also setup HTML message (optional)
        $strBody  = 'Estimado Usuario,<p><br>';
        $strBody .= 'Desde el Sistema Yokohama, el personal autorizado ha registrado ';
        $strBody .= 'un cambio de Clave de Acceso, para su Usuario "<b style="color:blue">'.$strLogiUsua.'</b>".<br><br>';
        $strBody .= 'Su Nueva Clave de Acceso al acceder al sistema es: <b style="color:blue">'.$strPassUsua.'</b>.<br>';
        $strBody .= 'Recuerde cambiarla tan pronto como entre al sistema nuevamente. Gracias!<br><br>';
        $strBody .= 'Si Usted desconoce esta transacción, por favor comuníquese a la brevedad<br>';
        $strBody .= 'posible con el Administrador del Sistema a través de la cuenta de correo:<br><br>';
        $strBody .= 'soportelufeman@gmail.com<br>';
        $objMessage->HtmlBody = $strBody;

        // Add random/custom email headers
        $objMessage->SetHeader('x-application', 'Sistema Yokohama');

        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        try {
            // Send the Message (Commented out for obvious reasons)
            QEmailServer::Send($objMessage);
        } catch (Exception $e) {
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $objUsuario->LogiUsua;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = "Fallo el envio de correo al Usuario";
            GrabarError($arrParaErro);
        }
	}
}
ResetearClave::Run('ResetearClave');
?>