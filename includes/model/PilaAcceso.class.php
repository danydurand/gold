<?php
	require(__MODEL_GEN__ . '/PilaAccesoGen.class.php');

	/**
	 * The PilaAcceso class defined here contains any
	 * customized code for the PilaAcceso class in the
	 * Object Relational Model.  It represents the "pila_acceso" table
	 * in the database, and extends from the code generated abstract PilaAccesoGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class PilaAcceso extends PilaAccesoGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPilaAcceso->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */

        public function __toString() {
            if (strlen(trim($this->Parametros))) {
                $strProgPara = $this->strPrograma."/".$this->Parametros;
            } else {
                $strPrefProg = '';
                if ($this->strPrograma == 'mg.php') {
                    $strPrefProg = '../';
                }
                $strProgPara = $strPrefProg.$this->strPrograma;
            }
            return sprintf('%s',  $strProgPara);
        }

        public static function LoginUsuario() {
            $objUsuario  = unserialize($_SESSION['User']);
            if ($objUsuario instanceof Usuario) {
                $strLogiUsua = $objUsuario->LogiUsua;
            } elseif ($objUsuario instanceof UsuarioConnect) {
                $strLogiUsua = $objUsuario->LogiUsua;
            } else {
                $strLogiUsua = 'cte'.$objUsuario->CodiUsua;
            }
            return $strLogiUsua;
        }

        public static function Clean() {
            $strLogiUsua = PilaAcceso::LoginUsuario();
            $strCadeSqlx = "delete
                              from pila_acceso
                             where login = '$strLogiUsua'";
            $objDataBase = Usuario::GetDatabase();
            $objDataBase->NonQuery($strCadeSqlx);
        }

        public static function Push() {
            $strNombProg = trim(basename($_SERVER['SCRIPT_FILENAME']));
            $strParaProg = trim(basename($_SERVER['REQUEST_URI']));
            if ($strNombProg == $strParaProg) {
                $strParaProg = '';
            }
            $objUltiAcce = PilaAcceso::Pop();
            if (!$objUltiAcce || $objUltiAcce->Programa != $strNombProg) {
                $strLogiUsua = PilaAcceso::LoginUsuario();
                $objPilaAcce = new PilaAcceso();
                $objPilaAcce->Login      = $strLogiUsua;
                $objPilaAcce->Fecha      = new QDateTime(QDateTime::Now);
                $objPilaAcce->Hora       = new QDateTime(QDateTime::Now);
                $objPilaAcce->Programa   = $strNombProg;
                $objPilaAcce->Parametros = $strParaProg;
                $objPilaAcce->Save();
            }
        }

        public static function Pop($strTipoLect='R') {
            $strLogiUsua   = PilaAcceso::LoginUsuario();
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::PilaAcceso()->Id,false);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PilaAcceso()->Login,$strLogiUsua);
            $objClauWher[] = QQ::Equal(QQN::PilaAcceso()->Fecha,date('Y-m-d'));
            $objPilaAcce   = PilaAcceso::QuerySingle(QQ::AndCondition($objClauWher),$objClauOrde);
            if ($strTipoLect == 'D') {
                $objPilaAcce->Delete();
                return PilaAcceso::Pop();
            } else {
                return $objPilaAcce;
            }
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of PilaAcceso objects
			return PilaAcceso::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PilaAcceso()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PilaAcceso()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PilaAcceso object
			return PilaAcceso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PilaAcceso()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PilaAcceso()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PilaAcceso objects
			return PilaAcceso::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PilaAcceso()->Param1, $strParam1),
					QQ::Equal(QQN::PilaAcceso()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = PilaAcceso::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`pila_acceso`.*
				FROM
					`pila_acceso` AS `pila_acceso`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PilaAcceso::InstantiateDbResult($objDbResult);
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