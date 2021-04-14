<?php
	require(__MODEL_GEN__ . '/NotaCreditoGen.class.php');

	/**
	 * The NotaCredito class defined here contains any
	 * customized code for the NotaCredito class in the
	 * Object Relational Model.  It represents the "nota_credito" table
	 * in the database, and extends from the code generated abstract NotaCreditoGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class NotaCredito extends NotaCreditoGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objNotaCredito->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('NotaCredito Object %s',  $this->intId);
		}

		/**
		 * Load a single NotaCredito object,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito
		*/
		public static function LoadByFacturaId($intFacturaId, $objOptionalClauses = null) {
			return NotaCredito::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCredito()->FacturaId, $intFacturaId)
				),
				$objOptionalClauses
			);
		}

		public function ActualizarMontos() {
			$strCadeSqlx = 'select sum(monto_base) as monto_base,
			                       sum(monto_dscto) as monto_dscto,
			                       sum(monto_franqueo) as monto_franqueo,
			                       sum(monto_seguro) as monto_seguro,
			                       sum(monto_iva) as monto_iva,
			                       sum(monto_total) as monto_total
			                  from item_nota_credito 
			                 where nota_credito_id = '.$this->intId;
			$objDatabase = $this->GetDatabase();
			$objDbResult = $objDatabase->Query($strCadeSqlx);
			$mixRegistro = $objDbResult->FetchArray();
			//-----------------------------------------
			// Se actualizan los montos de la Factura
			//-----------------------------------------
			$this->fltMontoBase = $mixRegistro['monto_base'];
			$this->fltMontoDscto = $mixRegistro['monto_dscto'];
			$this->fltMontoFranqueo = $mixRegistro['monto_franqueo'];
			$this->fltMontoSeguro = $mixRegistro['monto_seguro'];
			$this->fltMontoIva = $mixRegistro['monto_iva'];
			$this->fltMontoTotal = $mixRegistro['monto_total'];
			$this->Save();
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of NotaCredito objects
			return NotaCredito::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCredito()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NotaCredito()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single NotaCredito object
			return NotaCredito::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCredito()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NotaCredito()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of NotaCredito objects
			return NotaCredito::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCredito()->Param1, $strParam1),
					QQ::Equal(QQN::NotaCredito()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`nota_credito`.*
				FROM
					`nota_credito` AS `nota_credito`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return NotaCredito::InstantiateDbResult($objDbResult);
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