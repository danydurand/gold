<?php
	require(__MODEL_GEN__ . '/ConceptosGen.class.php');

	/**
	 * The Conceptos class defined here contains any
	 * customized code for the Conceptos class in the
	 * Object Relational Model.  It represents the "conceptos" table
	 * in the database, and extends from the code generated abstract ConceptosGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Conceptos extends ConceptosGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objConceptos->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strNombre);
		}

        public static function OpcionalesTomadosPorLaGuia($intGuiaIdxx) {
            $arrTomaGuia = [];
            //--------------------------------------------
            // Tomados o previamente asociados a la guia
            //--------------------------------------------
            $arrGuiaConc = GuiaConceptos::LoadArrayByGuiaId($intGuiaIdxx);
            foreach ($arrGuiaConc as $objGuiaConc) {
                if ((!$objGuiaConc->Concepto->EsFijo) && (!($objGuiaConc->Concepto->Valor == 'manual'))) {
                    $arrTomaGuia[] = $objGuiaConc->Concepto;
                }
            }
            return $arrTomaGuia;
		}

        public static function OpcionalesActivos() {
            //---------------------------------
            // Conceptos Opcionales, activos
            //---------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Conceptos()->EsFijo,false);
            $objClauWher[] = QQ::Equal(QQN::Conceptos()->Activo,true);
            $objClauWher[] = QQ::NotEqual(QQN::Conceptos()->Valor,"manual");
            $arrConcDisp   = Conceptos::QueryArray(QQ::AndCondition($objClauWher));
            return $arrConcDisp;
		}

		public static function conceptosActivos($strCodiProd='NAC') {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Conceptos()->Activo,1);
            $objClauWher[] = QQ::Equal(QQN::Conceptos()->EsFijo,1);
            $objClauWher[] = QQ::Like(QQN::Conceptos()->Productos,'%'.$strCodiProd.'%');
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Conceptos()->Orden);
            return Conceptos::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        }

        public static function CamposValues() {
		    return array('kilos','valor_declarado','volumen','pies_cub','mayor_kg_vol','mayor_p3_vol');
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Conceptos objects
			return Conceptos::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Conceptos()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Conceptos()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Conceptos object
			return Conceptos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Conceptos()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Conceptos()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Conceptos objects
			return Conceptos::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Conceptos()->Param1, $strParam1),
					QQ::Equal(QQN::Conceptos()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`conceptos`.*
				FROM
					`conceptos` AS `conceptos`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Conceptos::InstantiateDbResult($objDbResult);
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