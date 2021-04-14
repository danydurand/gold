<?php
	require(__MODEL_GEN__ . '/SdeOperacionGen.class.php');

	/**
	 * The SdeOperacion class defined here contains any
	 * customized code for the SdeOperacion class in the
	 * Object Relational Model.  It represents the "sde_operacion" table
	 * in the database, and extends from the code generated abstract SdeOperacionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class SdeOperacion extends SdeOperacionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objSdeOperacion->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			if ($this->intCodiTipo == 0) {
				// Urbanas
				return sprintf('%s-%s',$this->Ruta->Codigo, substr($this->Ruta->Descripcion,0,25).'...');
			} else {
				// Extra-Urbanas
				return $this->__toStringConDestinos();
			}
		}

		public function __toStringConDestinos() {
			$arrSucuDest = $this->GetSucursalesAsOperacionDestinoArray();
			$strSucuDest = implode($arrSucuDest,', ');
			return sprintf('%s-(%s)',$this->Ruta->Codigo,substr($strSucuDest,0,30).'...');
		}

		public function LiberarRecursos() {
			$this->objCodiChofObject->Liberar();
			$this->objCodiVehiObject->Liberar();
		}

		public function BloquearRecursos() {
			$this->objCodiChofObject->Bloquear();
			$this->objCodiVehiObject->Bloquear();
		}

		public function ContarRecolectasOkDeHoy() {
			$intContOkey = 0;
			$objDatabase = QApplication::$Database[1];
			$strFechReco = substr($objDatabase->SqlVariable(new QDateTime(QDateTime::Now)),1,10);
			//$strFechReco = '2011-05-01';
			foreach (DspDespacho::LoadArrayByCodiOperByFechReco($this->intCodiOper,$strFechReco) as $objDespacho) {
				if ($objDespacho->RecolectaCerrada()) {
					$intContOkey ++;
				}
			}
			return $intContOkey;
		}

		/**
		 * Count DspDespachos de Hoy
		 */
		public function CountDspDespachosAsCodiOperDeHoy() {
			if ((is_null($this->intCodiOper)))
				return 0;
			$objDatabase = QApplication::$Database[1];
			$strFechReco = substr($objDatabase->SqlVariable(new QDateTime(QDateTime::Now)),1,10);
			//$strFechReco = '2011-05-01';
			return DspDespacho::CountByCodiOperByFechReco($this->intCodiOper,$strFechReco);
			//      return DspDespacho::CountByCodiOper($this->intCodiOper);
		}

		public function CountDspDespachosAsCodiOperPorFecha($calFechReco) {
			if ((is_null($this->intCodiOper)))
				return 0;
			$objDatabase = QApplication::$Database[1];
			$strFechReco = substr($objDatabase->SqlVariable($calFechReco),1,10);
			return DspDespacho::CountByCodiOperByFechReco($this->intCodiOper,$strFechReco);
			//      return DspDespacho::CountByCodiOper($this->intCodiOper);
		}

		public static function OperaciónFictAsociadaASucursalUsuario($intIdxxOper) {
            $objOperacion = SdeOperacion::Load($intIdxxOper);
            if (!$objOperacion) {
                $arrOperacion = SdeOperacion::LoadArrayByCodiRuta('R9999', QQ::Clause(QQ::LimitInfo(1)));
                $objOperacion = $arrOperacion[0];
            }
            if ($objOperacion) {
                return $objOperacion;
            } else {
                return null;
            }
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of SdeOperacion objects
			return SdeOperacion::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeOperacion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SdeOperacion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single SdeOperacion object
			return SdeOperacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeOperacion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SdeOperacion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of SdeOperacion objects
			return SdeOperacion::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeOperacion()->Param1, $strParam1),
					QQ::Equal(QQN::SdeOperacion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`sde_operacion`.*
				FROM
					`sde_operacion` AS `sde_operacion`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return SdeOperacion::InstantiateDbResult($objDbResult);
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