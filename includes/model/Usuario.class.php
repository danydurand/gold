<?php
	require(__MODEL_GEN__ . '/UsuarioGen.class.php');
    use PHPMailer\PHPMailer\PHPMailer;

	/**
	 * The Usuario class defined here contains any
	 * customized code for the Usuario class in the
	 * Object Relational Model.  It represents the "usuario" table
	 * in the database, and extends from the code generated abstract UsuarioGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Usuario extends UsuarioGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objUsuario->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strLogiUsua);
		}

		public function __nombreApellido() {
			return sprintf('%s %s',  $this->strNombUsua, $this->strApelUsua);
		}

		public function __nombreYCorreo() {
			return sprintf('%s <%s>',  $this->__nombreApellido(), $this->strMailUsua);
		}

        public static function CodigoDeUsuarioDeLaSuc($strIataSucu) {
            $objSucuMiax = Sucursales::LoadByIata($strIataSucu);
            $arrUsuaSucu = Usuario::LoadArrayBySucursalId($objSucuMiax->Id);
            $arrCodiUsua = [];
            foreach ($arrUsuaSucu as $objUsuaSucu) {
                $arrCodiUsua[] = $objUsuaSucu->CodiUsua;
            }
            return $arrCodiUsua;
        }

		public function resetearClave($strPassUsua,$blnReseClav=true,$strUrlxSist='http://goldsist.com',$strNombSist='SisCO') {
		    $arrResuCamb = ['success','Clave Reseteada'];
		    try {
		        t('Llegando a resetearClave');
		        $strPassUsua    = strtolower($strPassUsua);
                $this->PassUsua = md5($strPassUsua);
                if ($blnReseClav) {
                    $this->FechClav = new QDateTime("2010-01-01");
                }
                $this->CantInte = 0;
                $this->CodiStat = 1;
                $this->MotiBloq = '';
                $this->Save();
                t('Reseteo grabado en la base de datos');
                //-------------------------------------
                // Se deja constancia en el Hist??rico
                //-------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Usuario';
                $arrLogxCamb['intRefeRegi'] = $this->CodiUsua;
                $arrLogxCamb['strNombRegi'] = $this->LogiUsua;
                $arrLogxCamb['strDescCamb'] = "Clave Reseteada";
                LogDeCambios($arrLogxCamb);
                //------------------------------------------------
                // Send the Message only in the production sever
                //------------------------------------------------
                if ($_SERVER['SERVER_NAME'] != 'gold.dev.com') {
                    $arrResuCamb = $this->RedactarEmailPassword($strPassUsua, $strUrlxSist, $strNombSist);
                }
            } catch (Exception $e) {
		        $arrResuCamb = ['danger',$e->getMessage()];
            }
            return $arrResuCamb;
        }

        protected function RedactarEmailPassword($strPassUsua,$strUrlxSist='http://goldsist.com',$strNombSist='SisCO') {
            //---------------------------------
            // Se Env??a el Mensaje por E-mail
            //---------------------------------
            $strLogiUsua = $this->LogiUsua;
            $strBody  = 'Estimado Usuario,<p><br>';
            $strBody .= 'El '.$strNombSist.' ha registrado ';
            $strBody .= 'un cambio de Clave de Acceso, para su Usuario "<b style="color:blue">'.$strLogiUsua.'</b>".<br>';
            $strBody .= 'Su Nueva Clave de Acceso al acceder al sistema es: <b style="color:blue">'.$strPassUsua.'</b><br>';
            if (strlen($strUrlxSist)) {
                $strBody .= 'Para acceder al Sistema, dir??jase a: <b style="color:blue">'.$strUrlxSist.'<br>';
            }
            $strBody .= '<br>';
            $strBody .= 'Recuerde cambiarla tan pronto como entre al sistema nuevamente. Gracias!<br>';
            $strBody .= 'Si Usted desconoce esta transacci??n, por favor comun??quese a la brevedad<br>';
            $strBody .= 'posible con el Administrador del Sistema a trav??s de la cuenta de correo:<br>';
            $strBody .= 'soporte@lufemansoftware.com<br>';

            //-------------------------------------
            // Se suprimen los errores en pantalla
            //-------------------------------------
            $mixErroOrig = error_reporting();
            error_reporting(0);
            $mail = new PHPMailer();
            try {
                $mail->setFrom('noti@goldsist.com', 'GoldCoast - SisCO');
                $mail->addAddress($this->MailUsua);
                $mail->Subject  = 'Cambio de Clave ' . QDateTime::NowToString(QDateTime::FormatDisplayDate);
                $mail->msgHTML($strBody);
                if(!$mail->send()) {
                    throw new Exception($mail->ErrorInfo);
                } else {
                    $arrParaErro = ['success','Clave Reseteada'];
                }
            } catch (Exception $e) {
                $objProcEjec = CrearProceso('Correo Reseteo de Clave',true);
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $this->LogiUsua;
                $arrParaErro['MensErro'] = $mail->ErrorInfo;
                $arrParaErro['ComeErro'] = "Fallo el envio de correo al Usuario";
                GrabarError($arrParaErro);
                $arrParaErro = ['danger',$mail->ErrorInfo];
            }
            //------------------------------------------------
            // Se levantan nuevamente los errores en pantalla
            //------------------------------------------------
            error_reporting($mixErroOrig);
            return $arrParaErro;
        }

        protected function RedactarEmailPasswordOld($strPassUsua,$strUrlxSist='http://goldsist.com',$strNombSist='SisCO') {
            //---------------------------------
            // Se Env??a el Mensaje por E-mail
            //---------------------------------
            $strLogiUsua = $this->LogiUsua;
            $objMessage = new QEmailMessage();
            $objMessage->From = 'GoldCoast - SisCO <noti@goldsist.com>';
            $objMessage->To = $this->MailUsua;
            $objMessage->Subject = 'Cambio de Clave ' . QDateTime::NowToString(QDateTime::FormatDisplayDate);

            // Also setup HTML message (optional)
            $strBody  = 'Estimado Usuario,<p><br>';
            $strBody .= 'El '.$strNombSist.' ha registrado ';
            $strBody .= 'un cambio de Clave de Acceso, para su Usuario "<b style="color:blue">'.$strLogiUsua.'</b>".<br>';
            $strBody .= 'Su Nueva Clave de Acceso al acceder al sistema es: <b style="color:blue">'.$strPassUsua.'</b><br>';
            if (strlen($strUrlxSist)) {
                $strBody .= 'Para acceder al Sistema, dir??jase a: <b style="color:blue">'.$strUrlxSist.'<br>';
            }
            $strBody .= '<br>';
            $strBody .= 'Recuerde cambiarla tan pronto como entre al sistema nuevamente. Gracias!<br>';
            $strBody .= 'Si Usted desconoce esta transacci??n, por favor comun??quese a la brevedad<br>';
            $strBody .= 'posible con el Administrador del Sistema a trav??s de la cuenta de correo:<br>';
            $strBody .= 'soporte@lufemansoftware.com<br>';
            $objMessage->HtmlBody = $strBody;

            // Add random/custom email headers
            $objMessage->SetHeader('x-application', 'Sistema SisCO');

            //-------------------------------------
            // Se suprimen los errores en pantalla
            //-------------------------------------
            $mixErroOrig = error_reporting();
            error_reporting(0);
            try {
                QEmailServer::Send($objMessage);
            } catch (Exception $e) {
                $objProcEjec = CrearProceso('Correo Reseteo de Clave',true);
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $this->LogiUsua;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = "Fallo el envio de correo al Usuario";
                GrabarError($arrParaErro);
            }
            //------------------------------------------------
            // Se levantan nuevamente los errores en pantalla
            //------------------------------------------------
            error_reporting($mixErroOrig);
        }


        /**
         * Count Usuarios
         * by GrupoId Index(es)
         * @param integer $intGrupoId
         * @return int
         */
        public static function CountByGrupoId($intGrupoId) {
            // Call Usuario::QueryCount to perform the CountByGrupoId query
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Usuario()->GrupoId, $intGrupoId);
            $objClauWher[] = QQ::IsNull(QQN::Usuario()->DeleteAt);
            return Usuario::QueryCount(QQ::AndCondition($objClauWher));
        }

        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Usuario objects
			return Usuario::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Usuario()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Usuario object
			return Usuario::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Usuario()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Usuario objects
			return Usuario::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->Param1, $strParam1),
					QQ::Equal(QQN::Usuario()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`usuario`.*
				FROM
					`usuario` AS `usuario`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Usuario::InstantiateDbResult($objDbResult);
		}
*/



		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/


		// Initialize each property with default values from database definition
/*
		public function __construct()
		{
			$this->Initialize();
		}
*/
	}
?>