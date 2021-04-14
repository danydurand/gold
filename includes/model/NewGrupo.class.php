<?php
	require(__MODEL_GEN__ . '/NewGrupoGen.class.php');

	/**
	 * The NewGrupo class defined here contains any
	 * customized code for the NewGrupo class in the
	 * Object Relational Model.  It represents the "new_grupo" table
	 * in the database, and extends from the code generated abstract NewGrupoGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class NewGrupo extends NewGrupoGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objNewGrupo->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->Nombre);
		}

//		public function __toStringConCantUsuarios() {
//		    $intCantUsua = $this->CountUsuariosAsGrupo();
//            return sprintf('%s (%s)',  $this->Nombre, $intCantUsua);
//        }

        public function __toStringConCantUsuarios() {
		    $objClauWher   = QQ::Clause();
		    $objClauWher[] = QQ::Equal(QQN::Usuario()->GrupoId,$this->Id);
		    $objClauWher[] = QQ::IsNull(QQN::Usuario()->DeleteAt);
		    $objClauWher[] = QQ::Equal(QQN::Usuario()->CodiStat,StatusType::ACTIVO);
            $intCantUsua   = Usuario::QueryCount(QQ::AndCondition($objClauWher));
            return sprintf('%s (%s)',  $this->Nombre, $intCantUsua);
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of NewGrupo objects
			return NewGrupo::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::NewGrupo()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NewGrupo()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single NewGrupo object
			return NewGrupo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NewGrupo()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NewGrupo()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of NewGrupo objects
			return NewGrupo::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::NewGrupo()->Param1, $strParam1),
					QQ::Equal(QQN::NewGrupo()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`new_grupo`.*
				FROM
					`new_grupo` AS `new_grupo`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return NewGrupo::InstantiateDbResult($objDbResult);
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