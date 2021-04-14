<?php
	require(__MODEL_GEN__ . '/PagosCorpGen.class.php');

	/**
	 * The PagosCorp class defined here contains any
	 * customized code for the PagosCorp class in the
	 * Object Relational Model.  It represents the "pagos_corp" table
	 * in the database, and extends from the code generated abstract PagosCorpGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class PagosCorp extends PagosCorpGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPagosCorp->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->Referencia);
		}

		public function replicarEstatusPago($strEstaPago) {
		    $arrFactPago = $this->GetFacturasAsFacturaPagoCorpArray();
            foreach ($arrFactPago as $objFactPago) {
                $objFactPago->EstatusPago = $strEstaPago;
                $objFactPago->Save();
                //----------------------------------------------
                // Se debe registro en el Log de transacciones
                //----------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Facturas';
                $arrLogxCamb['intRefeRegi'] = $objFactPago->Id;
                $arrLogxCamb['strNombRegi'] = $objFactPago->Referencia;
                $arrLogxCamb['strDescCamb'] = 'Pago: '.$objFactPago->Referencia.' ('.$strEstaPago.')';
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$objFactPago->Id;
                LogDeCambios($arrLogxCamb);
            }
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of PagosCorp objects
			return PagosCorp::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorp()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PagosCorp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PagosCorp object
			return PagosCorp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorp()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PagosCorp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PagosCorp objects
			return PagosCorp::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorp()->Param1, $strParam1),
					QQ::Equal(QQN::PagosCorp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = PagosCorp::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`pagos_corp`.*
				FROM
					`pagos_corp` AS `pagos_corp`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PagosCorp::InstantiateDbResult($objDbResult);
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