<?php
	require(__MODEL_GEN__ . '/ParametroGen.class.php');

	/**
	 * The Parametro class defined here contains any
	 * customized code for the Parametro class in the
	 * Object Relational Model.  It represents the "parametro" table
	 * in the database, and extends from the code generated abstract ParametroGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Parametro extends ParametroGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objParametro->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s - %s',  $this->strIndiPara,  $this->strCodiPara);
		}

		public function __codigoRegistro() {
		    return sprintf('%s/%s',$this->strIndiPara,$this->strCodiPara);
        }

        /**
         * Esta función devuelve un objeto Parámetro que representa un Mensaje
         * para los usuarios clientes del Sistema Yamaguchi, usando como parámetro
         * de búsqueda el tipo nativo de mensaje.
         *
         * @param $strTipo : tipo del mensaje (String)
         * @return Parametro : Mensaje Yamaguchi.
         */
		public static function LoadMensajeYamaguchiByTipo($strTipo) {
            return Parametro::QuerySingle(
                QQ::AndCondition(
                    QQ::Equal(QQN::Parametro()->IndiPara, 'MensYama'),
                    QQ::Equal(QQN::Parametro()->ParaTxt2, $strTipo)
                )
            );
        }

        /**
         * Esta función devuelve un vector de parámetros a través de su índice.
         *
         * @param $strIndiPara : índice del parámetro.
         * @param null $objOptionalClauses : cláusulas opcionales.
         * @return Parametro[]
         */
        public static function LoadArrayByIndiPara($strIndiPara, $objOptionalClauses = null) {
			return Parametro::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametro()->IndiPara, $strIndiPara)
				),
				$objOptionalClauses
			);
		}

        /**
         * Esta función devuelve una cantidad de parámetros encontrados a través de su Índice.
         *
         * @param $strIndiPara : índice del parámetro.
         * @return int : cantidad de Parámetros encontrados.
         */
        public static function CountByIndiPara($strIndiPara) {
            return count(Parametro::LoadArrayByIndiPara($strIndiPara));
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
		
		/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Parametro objects
			return Parametro::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametro()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Parametro()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Parametro object
			return Parametro::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametro()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Parametro()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Parametro objects
			return Parametro::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametro()->Param1, $strParam1),
					QQ::Equal(QQN::Parametro()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Parametro::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`parametro`.*
				FROM
					`parametro` AS `parametro`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Parametro::InstantiateDbResult($objDbResult);
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