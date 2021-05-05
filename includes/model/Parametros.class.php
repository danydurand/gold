<?php
	require(__MODEL_GEN__ . '/ParametrosGen.class.php');

	/**
	 * The Parametros class defined here contains any
	 * customized code for the Parametros class in the
	 * Object Relational Model.  It represents the "parametros" table
	 * in the database, and extends from the code generated abstract ParametrosGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Parametros extends ParametrosGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objParametros->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->Descripcion);
		}

		public function _creator() {
		    if (strlen($this->CreatedBy) > 0) {
		        $objUsuaCrea = Usuario::Load($this->CreatedBy);
		        if ($objUsuaCrea) {
		            return $objUsuaCrea->LogiUsua;
                } else {
                    return 'N/A';
                }
            } else {
		        return 'N/A';
            }
        }

		public function _updater() {
		    if (strlen($this->UpdatedBy) > 0) {
		        $objUsuaModi = Usuario::Load($this->UpdatedBy);
		        if ($objUsuaModi) {
		            return $objUsuaModi->LogiUsua;
                } else {
                    return 'N/A';
                }
            } else {
		        return 'N/A';
            }
        }

        /**
        * Esta runtina deja registro de la operacion indicada en
        * el log de transacciones
        */
        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'Parametros';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Descripcion;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/parametros_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Parametros objects
			return Parametros::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametros()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Parametros()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Parametros object
			return Parametros::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametros()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Parametros()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Parametros objects
			return Parametros::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametros()->Param1, $strParam1),
					QQ::Equal(QQN::Parametros()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Parametros::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`parametros`.*
				FROM
					`parametros` AS `parametros`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Parametros::InstantiateDbResult($objDbResult);
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