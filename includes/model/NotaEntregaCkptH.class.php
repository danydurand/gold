<?php
	require(__MODEL_GEN__ . '/NotaEntregaCkptHGen.class.php');

	/**
	 * The NotaEntregaCkptH class defined here contains any
	 * customized code for the NotaEntregaCkptH class in the
	 * Object Relational Model.  It represents the "nota_entrega_ckpt_h" table
	 * in the database, and extends from the code generated abstract NotaEntregaCkptHGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class NotaEntregaCkptH extends NotaEntregaCkptHGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objNotaEntregaCkptH->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('NotaEntregaCkptH Object %s',  $this->intId);
		}

                /**
        * Esta runtina deja registro de la operacion indicada en
        * el log de transacciones
        */
        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'NotaEntregaCkptH';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Nombre;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/nota_entrega_ckpt_h_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of NotaEntregaCkptH objects
			return NotaEntregaCkptH::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntregaCkptH()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NotaEntregaCkptH()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single NotaEntregaCkptH object
			return NotaEntregaCkptH::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntregaCkptH()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NotaEntregaCkptH()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of NotaEntregaCkptH objects
			return NotaEntregaCkptH::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntregaCkptH()->Param1, $strParam1),
					QQ::Equal(QQN::NotaEntregaCkptH()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = NotaEntregaCkptH::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`nota_entrega_ckpt_h`.*
				FROM
					`nota_entrega_ckpt_h` AS `nota_entrega_ckpt_h`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return NotaEntregaCkptH::InstantiateDbResult($objDbResult);
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