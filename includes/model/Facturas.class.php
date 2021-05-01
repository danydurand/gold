<?php
	require(__MODEL_GEN__ . '/FacturasGen.class.php');

	/**
	 * The Facturas class defined here contains any
	 * customized code for the Facturas class in the
	 * Object Relational Model.  It represents the "facturas" table
	 * in the database, and extends from the code generated abstract FacturasGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Facturas extends FacturasGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objFacturas->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->intId);
		}

        public function __total() {
            return nf($this->Total);
		}

        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'Facturas';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Referencia;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }

        public function __montoPendiente() {
            return nf($this->Total - $this->MontoCobrado);
		}

        public static function proxReferencia() {
		    $objClauWher   = QQ::Clause();
		    $objClauWher[] = QQ::IsNotNull(QQN::Facturas()->ClienteCorpId);
		    $intCantFact   = Facturas::QueryCount(QQ::AndCondition($objClauWher));
		    $strYearDhoy   = date('Y');
		    $strNumeRefe   = str_pad($intCantFact+1,5,'0',STR_PAD_LEFT).'-'.$strYearDhoy;
		    return $strNumeRefe;
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Facturas objects
			return Facturas::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Facturas()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Facturas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Facturas object
			return Facturas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Facturas()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Facturas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Facturas objects
			return Facturas::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Facturas()->Param1, $strParam1),
					QQ::Equal(QQN::Facturas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`facturas`.*
				FROM
					`facturas` AS `facturas`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Facturas::InstantiateDbResult($objDbResult);
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