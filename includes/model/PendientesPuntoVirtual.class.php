<?php
	require(__MODEL_GEN__ . '/PendientesPuntoVirtualGen.class.php');

	/**
	 * The PendientesPuntoVirtual class defined here contains any
	 * customized code for the PendientesPuntoVirtual class in the
	 * Object Relational Model.  It represents the "pendientes_punto_virtual" table
	 * in the database, and extends from the code generated abstract PendientesPuntoVirtualGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class PendientesPuntoVirtual extends PendientesPuntoVirtualGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPendientesPuntoVirtual->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('PendientesPuntoVirtual Object %s',  $this->intId);
		}


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of PendientesPuntoVirtual objects
			return PendientesPuntoVirtual::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PendientesPuntoVirtual()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PendientesPuntoVirtual()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PendientesPuntoVirtual object
			return PendientesPuntoVirtual::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PendientesPuntoVirtual()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PendientesPuntoVirtual()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PendientesPuntoVirtual objects
			return PendientesPuntoVirtual::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PendientesPuntoVirtual()->Param1, $strParam1),
					QQ::Equal(QQN::PendientesPuntoVirtual()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = PendientesPuntoVirtual::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`pendientes_punto_virtual`.*
				FROM
					`pendientes_punto_virtual` AS `pendientes_punto_virtual`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PendientesPuntoVirtual::InstantiateDbResult($objDbResult);
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