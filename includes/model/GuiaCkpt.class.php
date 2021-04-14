<?php
	require(__MODEL_GEN__ . '/GuiaCkptGen.class.php');

	/**
	 * The GuiaCkpt class defined here contains any
	 * customized code for the GuiaCkpt class in the
	 * Object Relational Model.  It represents the "guia_ckpt" table
	 * in the database, and extends from the code generated abstract GuiaCkptGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class GuiaCkpt extends GuiaCkptGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objGuiaCkpt->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('GuiaCkpt Object %s - %s - %s - %s - %s',  $this->strNumeGuia,  $this->strCodiEsta,  $this->strCodiCkpt,  $this->dttFechCkpt,  $this->strHoraCkpt);
		}

		/**
		 * Load a single GuiaCkpt object,
		 * by NumeGuia, CodiEsta, CodiCkpt Index(es)
		 * @param string $strNumeGuia
		 * @param string $strCodiEsta
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt
		 */
		public static function LoadByNumeGuiaCodiEstaCodiCkpt($strNumeGuia, $strCodiEsta, $strCodiCkpt, $objOptionalClauses = null) {
			return GuiaCkpt::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $strNumeGuia),
					QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $strCodiEsta),
					QQ::Equal(QQN::GuiaCkpt()->CodiCkpt, $strCodiCkpt)
				),
				$objOptionalClauses
			);
		}


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of GuiaCkpt objects
			return GuiaCkpt::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCkpt()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GuiaCkpt()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single GuiaCkpt object
			return GuiaCkpt::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCkpt()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GuiaCkpt()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of GuiaCkpt objects
			return GuiaCkpt::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCkpt()->Param1, $strParam1),
					QQ::Equal(QQN::GuiaCkpt()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = GuiaCkpt::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`guia_ckpt`.*
				FROM
					`guia_ckpt` AS `guia_ckpt`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return GuiaCkpt::InstantiateDbResult($objDbResult);
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