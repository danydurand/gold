<?php
	require(__MODEL_GEN__ . '/FacturaPagosGen.class.php');

	/**
	 * The FacturaPagos class defined here contains any
	 * customized code for the FacturaPagos class in the
	 * Object Relational Model.  It represents the "factura_pagos" table
	 * in the database, and extends from the code generated abstract FacturaPagosGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class FacturaPagos extends FacturaPagosGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objFacturaPagos->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('FacturaPagos Object %s',  $this->intId);
		}

        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'FacturaPagos';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = 'Factura: '.$this->Factura->Id.' | Pago: '.$this->Referencia;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/factura_pagos_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }


        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of FacturaPagos objects
			return FacturaPagos::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPagos()->Param1, $strParam1),
					QQ::GreaterThan(QQN::FacturaPagos()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single FacturaPagos object
			return FacturaPagos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPagos()->Param1, $strParam1),
					QQ::GreaterThan(QQN::FacturaPagos()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of FacturaPagos objects
			return FacturaPagos::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPagos()->Param1, $strParam1),
					QQ::Equal(QQN::FacturaPagos()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = FacturaPagos::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`factura_pagos`.*
				FROM
					`factura_pagos` AS `factura_pagos`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return FacturaPagos::InstantiateDbResult($objDbResult);
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