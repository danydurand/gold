<?php
	require(__MODEL_GEN__ . '/DspDespachoGen.class.php');

	/**
	 * The DspDespacho class defined here contains any
	 * customized code for the DspDespacho class in the
	 * Object Relational Model.  It represents the "dsp_despacho" table
	 * in the database, and extends from the code generated abstract DspDespachoGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class DspDespacho extends DspDespachoGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objDspDespacho->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('DspDespacho Object %s',  $this->intCodiDesp);
		}

		public function RealizadaATiempo() {
			//--------------------------------------------------------------------------
			// Esta rutina devuelve al punto de su invocacion, un valor verdadero
			// o falso en funcion de si la Recolecta se realizo en el tiempo acordado
			// con el Cliente
			//--------------------------------------------------------------------------
			if ($this->HoraEfec <= $this->HoraList) {
				return true;
			} else {
				return false;
			}
		}

		public function Cancelar() {
			$objUsario = unserialize($_SESSION['User']);
			$objDataBase = QApplication::$Database[1];
			$dttFechDhoy = new QDateTime(QDateTime::Now);
			$dttFechCanc = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),1,10);
			$dttHoraCanc = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),12,5);
			$this->TextObse = $this->TextObse.' [Recolecta cancelada por '.$objUsario->LogiUsua.' el '.$dttFechCanc.' a las '.$dttHoraCanc.']';
			$this->CodiCkpt = 'RC';
			$this->FechModi = $dttFechDhoy;
			$this->UsuaModi = $objUsario->CodiUsua;
			$this->Save();
		}

		public function RecolectaCerrada() {
			return $this->CodiCkptObject->TipoTerm;
		}

		public function EstatusGrafico() {
			switch ($this->strCodiCkpt) {
				case 'RC': // Recolecta Cancelada
					//return '<img src="../util/imagenes/inactivo.png">';
					return '<img src="../../assets/images/inactivo.png">';
					break;
				case 'PA': // Recolecta por Asignar
					return '<img src="../../assets/images/cuadrado_azul.png">';
					break;
				case 'RR': // Recolecta Realizada
					return '<img src="../../assets/images/icon_mini_register.gif">';
					break;
				case 'RA': // Recolecta Asignada
					$objDataBase = QApplication::$Database[1];
					$strHoraActu = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),12,5);
					list($hora_dife,$minu_dife,$segu_dife) = explode(':',difeHoras2($this->strHoraList,$strHoraActu));
					$minu_dife = ($hora_dife * 60) + $minu_dife;
					if ( $minu_dife > 0 ) {
						if ( $minu_dife <= 45 ) {
							$strNombImag = 'amarillo';
						}
						else {
							$strNombImag = 'verde';
						}
					}
					else
					{
						//-------------------------------------------------------
						// En caso de que ya se haya pasado la hora del Pick-Up
						// se calcula entonces la diferencia de horas con res-
						// pecto a la hora de cierre
						//-------------------------------------------------------
						list($hora_dife,$minu_dife,$segu_dife) = explode(':',difeHoras2($this->strHoraCier,$strHoraActu));
						$minu_dife = ($hora_dife * 60) + $minu_dife;
						if ( $minu_dife <= 45 ) {
							$strNombImag = 'rojo';
						}
						else {
							$strNombImag = 'amarillo';
						}
					}
					return '<img src="../util/imagenes/cuadrado_'.$strNombImag.'.png">';
					break;
				default:
					return '<img src="../../assets/images/cuadrado_verde.png">';
					break;
			}
		}

		public function ColorDelEstatus() {
			if ($this->CodiCkpt == 'RA') {
				$objDataBase = QApplication::$Database[1];
				$strHoraActu = substr($objDataBase->SqlVariable(new QDateTime(QDateTime::Now)),12,5);
				list($hora_dife,$minu_dife,$segu_dife) = explode(':',difeHoras2($this->strHoraList,$strHoraActu));
				$minu_dife = ($hora_dife * 60) + $minu_dife;
				if ( $minu_dife > 0 ) {
					if ( $minu_dife <= 45 ) {
						$strNombImag = 'amarillo';
					}
					else {
						$strNombImag = 'verde';
					}
				}
				else {
					//-------------------------------------------------------
					// En caso de que ya se haya pasado la hora del Pick-Up
					// se calcula entonces la diferencia de horas con res-
					// pecto a la hora de cierre
					//-------------------------------------------------------
					list($hora_dife,$minu_dife,$segu_dife) = explode(':',difeHoras2($this->strHoraCier,$strHoraActu));
					$minu_dife = ($hora_dife * 60) + $minu_dife;
					if ( $minu_dife <= 45 ) {
						$strNombImag = 'rojo';
					}
					else {
						$strNombImag = 'amarillo';
					}
				}
			}
			else {
				$strNombImag = 'verde';
			}
			return $strNombImag;
		}

		public static function LoadArrayByCodiUsuaByFechReco($intCodiUsua,$strFechReco) {
			return DspDespacho::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiUsua,$intCodiUsua),
					QQ::Equal(QQN::DspDespacho()->FechReco,$strFechReco)
				),
				QQ::Clause(
					QQ::OrderBy(
						QQN::DspDespacho()->FechRegi,false
					)
				)
			);
		}

		public static function CountByCodiUsuaByFechReco($intCodiUsua,$strFechReco) {
			return DspDespacho::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiUsua,$intCodiUsua),
					QQ::Equal(QQN::DspDespacho()->FechReco,$strFechReco)
				)
			);
		}

		public static function LoadArrayByCodiOperByFechReco($intCodiOper,$strFechReco) {

			$strFechReco = '2011-05-01';

			return DspDespacho::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiOper,$intCodiOper),
					QQ::GreaterOrEqual(QQN::DspDespacho()->FechReco,$strFechReco),
					QQ::NotEqual(QQN::DspDespacho()->CodiCkpt, 'RR')
				),
				QQ::Clause(
					QQ::OrderBy(
						QQN::DspDespacho()->FechRegi,false
					)
				)
			);
		}

		public static function CountByCodiOperByFechReco($intCodiOper,$strFechReco) {
			$strFechReco = '2011-05-01';

			return DspDespacho::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiOper,$intCodiOper),
					QQ::GreaterorEqual(QQN::DspDespacho()->FechReco,$strFechReco),
					QQ::NotEqual(QQN::DspDespacho()->CodiCkpt, 'RR')
				)
			);
		}

		public static function LoadArrayByCodiEstaByFechReco($strCodiEsta,$strFechReco) {
			$strFechReco = '2011-05-01';
			return DspDespacho::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiOperObject->CodiEsta,$strCodiEsta),
					QQ::GreaterOrEqual(QQN::DspDespacho()->FechReco,$strFechReco),
					QQ::NotEqual(QQN::DspDespacho()->CodiCkpt, 'RR')
				),
				QQ::Clause(
					QQ::OrderBy(
						QQN::DspDespacho()->FechRegi,false
					)
				)
			);
		}

		public static function CountByCodiEstaByFechReco($strCodiEsta,$strFechReco) {
			return DspDespacho::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiOperObject->CodiEsta,$strCodiEsta),
					QQ::GreaterorEqual(QQN::DspDespacho()->FechReco,$strFechReco)
				)
			);
		}

		public static function CountByRutaGenericaDeHoy($intCodiOper) {
			$objDatabase = QApplication::$Database[1];

			//$strFechReco = substr($objDatabase->SqlVariable(new QDateTime(QDateTime::Now)),1,10);
			//return DspDespacho::QueryCount(QQ::AndCondition(QQ::Equal(QQN::DspDespacho()->CodiOper,$intCodiOper),QQ::Equal(QQN::DspDespacho()->FechReco,$strFechReco)));
			$strFechReco = '2011-05-01';

			//return DspDespacho::QueryCount(QQ::AndCondition(QQ::Equal(QQN::DspDespacho()->CodiOper,$intCodiOper)));


			return DspDespacho::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiOperObject->CodiRuta,'R9999'),
					QQ::GreaterorEqual(QQN::DspDespacho()->FechReco,$strFechReco)
				)
			);
		}

        public static function RecolectasPorCodiOper($intCodiOper) {
            // Performing the load manually (instead of using QCubed Query)
            $dttFechDhoy = date('Y-m-d');
            $dttHoraReco = '14:00:00';

            // Get the Database Object for this Class
            $objDatabase = DspDespacho::GetDatabase();

            // Setup the SQL Query
            $strCadeSqlx = sprintf("
				SELECT
					*
				FROM
					`dsp_despacho`
				WHERE
					codi_oper = %s AND
					DATE(fech_regi) = '%s' AND
					TIME(fech_regi) <= '%s'",
                $intCodiOper,$dttFechDhoy,$dttHoraReco);

            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strCadeSqlx);
            return DspDespacho::InstantiateDbResult($objDbResult);
        }

        public static function CantidadRecolectasPorCodiOper($intCodiOper) {
            return count(DspDespacho::RecolectasPorCodiOper($intCodiOper));
        }

        public static function LoadByCodiOper($intCodiOper, $objOptionalClauses = null) {
            return DspDespacho::QuerySingle(
                QQ::AndCondition(
                    QQ::Equal(QQN::DspDespacho()->CodiOper, $intCodiOper)
                ),
                $objOptionalClauses
            );
        }

		public static function RecolectasRealizadasHoy($intCodiOper) {
			// Performing the load manually (instead of using QCubed Query)
			$dttFechDhoy = date('Y-m-d');
			$dttHoraReco = '14:00:00';

			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Setup the SQL Query
			$strCadeSqlx = sprintf("
				SELECT
					*
				FROM
					`dsp_despacho`
				WHERE
					codi_oper = %s AND
					DATE(fech_regi) = '%s' AND
					TIME(fech_regi) <= '%s' AND
					codi_ckpt = 'RR'",
				$intCodiOper,$dttFechDhoy,$dttHoraReco);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strCadeSqlx);
			return DspDespacho::InstantiateDbResult($objDbResult);
		}

		public static function CantidadRecolectasRealizadasHoy($intCodiOper) {
			return count(DspDespacho::RecolectasRealizadasHoy($intCodiOper));
		}

		public static function LoadFechaRecolecta($strHoraTope) {
            $strHoraActu = date('H:i');
            if ($strHoraTope < $strHoraActu) {
                //------------------------------------------------------------------------------
                // Si la hora actual ya supero la hora tope de recolectas, entonces la fecha
                // que se debe usar para buscar alguna recolecta ya registada es la fecha
                // del proximo dia laboral
                //------------------------------------------------------------------------------
                if (date("l") == 'Friday') {
                    $intValoIncr = 3;
                } else {
                    $intValoIncr = 1;
                }
                $dteFechReco = SumaRestaDiasAFecha(FechaDeHoy(), $intValoIncr, '+');
            } else {
                $dteFechReco = FechaDeHoy();
            }
            return $dteFechReco;
        }

        public static function LoadFechaRecolecta2($strHoraTope,$dteFechReco) {
            $strHoraActu = date('H:i');
            $intValoIncr = diasHabilesTranscurridos(FechaDeHoy(),$dteFechReco);
            $dteFechReco = SumaRestaDiasAFecha(FechaDeHoy(), $intValoIncr, '+');
            if ($dteFechReco == FechaDeHoy() && $strHoraTope < $strHoraActu) {
                //------------------------------------------------------------------------------
                // Si la hora actual ya supero la hora tope de recolectas, entonces la fecha
                // que se debe usar para buscar alguna recolecta ya registada es la fecha
                // del proximo dia laboral
                //------------------------------------------------------------------------------
                if (date("l") == 'Friday') {
                    $intValoIncr = 3;
                } else {
                    $intValoIncr = 1;
                }
                $dteFechReco = SumaRestaDiasAFecha(FechaDeHoy(), $intValoIncr, '+');
            }
            return $dteFechReco;
        }

		public static function BuscarRecolectaPorCodiClieYFechReco($intCodiClie,$dteFechReco) {
            $objClausua = QQ::Clause();
            $objClausua[] = QQ::Equal(QQN::DspDespacho()->CodiClie, $intCodiClie);
            $objClausua[] = QQ::Equal(QQN::DspDespacho()->FechReco, $dteFechReco);
            $arrRecoAnte = DspDespacho::QueryArray(QQ::AndCondition($objClausua));
            if ($arrRecoAnte) {
                return $arrRecoAnte[0];
            } else {
                return null;
            }
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
		/*
		 public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of DspDespacho objects
			return DspDespacho::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DspDespacho()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		 }

		 public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single DspDespacho object
			return DspDespacho::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DspDespacho()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		 }

		 public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of DspDespacho objects
			return DspDespacho::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->Param1, $strParam1),
					QQ::Equal(QQN::DspDespacho()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		 }

		 public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`dsp_despacho`.*
				FROM
					`dsp_despacho` AS `dsp_despacho`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return DspDespacho::InstantiateDbResult($objDbResult);
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