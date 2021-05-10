<?php
	require(__MODEL_GEN__ . '/PiezaCheckpointsGen.class.php');

	/**
	 * The PiezaCheckpoints class defined here contains any
	 * customized code for the PiezaCheckpoints class in the
	 * Object Relational Model.  It represents the "pieza_checkpoints" table
	 * in the database, and extends from the code generated abstract PiezaCheckpointsGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class PiezaCheckpoints extends PiezaCheckpointsGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPiezaCheckpoints->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->Pieza->IdPieza);
		}

        public static function ConCheckpointRegistradoPor($strCodiCkpt, $intCodiUsua) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo,$strCodiCkpt);
            $objClauWher[] = QQ::GreaterOrEqual(QQN::PiezaCheckpoints()->CreatedBy,$intCodiUsua);
            $arrPiezCkpt   = PiezaCheckpoints::QueryArray(QQ::AndCondition($objClauWher));
            return $arrPiezCkpt;
        }

        public function tieneCheckpoint($strCodiCkpt) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo,$strCodiCkpt);
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->PiezaId,$this->PiezaId);
            return PiezaCheckpoints::QueryCount(QQ::AndCondition($objClauWher));
        }

        public static function ConCheckpointEnFechaInicial($strCodiCkpt, $dttFechInic) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo,$strCodiCkpt);
            $objClauWher[] = QQ::GreaterOrEqual(QQN::PiezaCheckpoints()->Fecha,$dttFechInic);
            $arrPiezCkpt   = PiezaCheckpoints::QueryArray(QQ::AndCondition($objClauWher));
            return $arrPiezCkpt;
        }

        public static function ConCheckpointEnFechaFinal($strCodiCkpt, $dttFechFina) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo,$strCodiCkpt);
            $objClauWher[] = QQ::GreaterOrEqual(QQN::PiezaCheckpoints()->Fecha,$dttFechFina);
            $arrPiezCkpt   = PiezaCheckpoints::QueryArray(QQ::AndCondition($objClauWher));
            return $arrPiezCkpt;
        }

        public static function CheckpointEnFecha($strCodiCkpt, $dttFechRefe) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo,$strCodiCkpt);
            $objClauWher[] = QQ::LessOrEqual(QQN::PiezaCheckpoints()->Fecha,$dttFechRefe);
            $arrPiezCkpt   = PiezaCheckpoints::QueryArray(QQ::AndCondition($objClauWher));
            return $arrPiezCkpt;
        }

        public static function CheckpointEnRangoDeFechas($strCodiCkpt, $dttFechInic, $dttFechFina) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo,$strCodiCkpt);
            $objClauWher[] = QQ::GreaterOrEqual(QQN::PiezaCheckpoints()->Fecha,$dttFechInic);
            $objClauWher[] = QQ::LessOrEqual(QQN::PiezaCheckpoints()->Fecha,$dttFechFina);
            $arrPiezCkpt   = PiezaCheckpoints::QueryArray(QQ::AndCondition($objClauWher));
            return $arrPiezCkpt;
        }



        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of PiezaCheckpoints objects
			return PiezaCheckpoints::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PiezaCheckpoints()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PiezaCheckpoints()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PiezaCheckpoints object
			return PiezaCheckpoints::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PiezaCheckpoints()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PiezaCheckpoints()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PiezaCheckpoints objects
			return PiezaCheckpoints::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PiezaCheckpoints()->Param1, $strParam1),
					QQ::Equal(QQN::PiezaCheckpoints()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = PiezaCheckpoints::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`pieza_checkpoints`.*
				FROM
					`pieza_checkpoints` AS `pieza_checkpoints`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PiezaCheckpoints::InstantiateDbResult($objDbResult);
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