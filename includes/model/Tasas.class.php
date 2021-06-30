<?php
	require(__MODEL_GEN__ . '/TasasGen.class.php');

	/**
	 * The Tasas class defined here contains any
	 * customized code for the Tasas class in the
	 * Object Relational Model.  It represents the "tasas" table
	 * in the database, and extends from the code generated abstract TasasGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Tasas extends TasasGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objTasas->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s: %s',  $this->Tasa);
		}

        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'Tasas';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Divisa->Codigo;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tases_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }

        public static function UltimaTasa($strCodiDivi='USD', $dttFechTasa=null) {
		    $objTasaCamb = new stdClass();
		    $objTasaCamb->Tasa       = 1;
		    $objTasaCamb->Fecha      = null;
		    $objTasaCamb->TodoOkey   = false;
		    $objTasaCamb->Comentario = '';

		    $objMoneSoli = Divisas::LoadByCodigo($strCodiDivi);
		    if ($objMoneSoli instanceof Divisas) {
		        $objClauWher   = QQ::Clause();
		        $objClauWher[] = QQ::Equal(QQN::Tasas()->DivisaId,$objMoneSoli->Id);
		        if (!is_null($dttFechTasa)) {
                    $objClauWher[] = QQ::Equal(QQN::Tasas()->CreatedAt,$dttFechTasa);
                }
                $objClauOrde   = QQ::Clause();
                $objClauOrde[] = QQ::OrderBy(QQN::Tasas()->CreatedAt,false);
                $objClauOrde[] = QQ::LimitInfo(1);
                $objUltiTasa   = Tasas::QuerySingle(QQ::AndCondition($objClauWher),$objClauOrde);
                if ($objUltiTasa instanceof Tasas) {
                    $objTasaCamb->Tasa     = $objUltiTasa->Tasa;
                    $objTasaCamb->Fecha    = $objUltiTasa->CreatedAt;
                    $objTasaCamb->TodoOkey = true;
                } else {
                    $objTasaCamb->TodoOkey   = false;
                    $objTasaCamb->Comentario = 'No se encontro la Tasa de Cambio de '.$strCodiDivi;
                }
            }
		    return $objTasaCamb;
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Tasas objects
			return Tasas::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Tasas()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Tasas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Tasas object
			return Tasas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Tasas()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Tasas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Tasas objects
			return Tasas::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Tasas()->Param1, $strParam1),
					QQ::Equal(QQN::Tasas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Tasas::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`tasas`.*
				FROM
					`tasas` AS `tasas`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Tasas::InstantiateDbResult($objDbResult);
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