<?php
	require(__MODEL_GEN__ . '/TarifaExpGen.class.php');

	/**
	 * The TarifaExp class defined here contains any
	 * customized code for the TarifaExp class in the
	 * Object Relational Model.  It represents the "tarifa_exp" table
	 * in the database, and extends from the code generated abstract TarifaExpGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class TarifaExp extends TarifaExpGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objTarifaExp->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strNombre);
		}

		/**
		 * Esta rutina devuelve la tarifa vigente segun un producto
		 * y una fecha
		 */
		public static function TarifaVigente($intCodiProd, $dttFechGuia, $intIdxxDest) {
            $strCadeSqlx  = "select id";
            $strCadeSqlx .= "  from tarifa_exp ";
            $strCadeSqlx .= " where producto_id = ".$intCodiProd;
            $strCadeSqlx .= "   and fecha <= '".$dttFechGuia."'";
            $strCadeSqlx .= "   and is_publica = 1";
            $strCadeSqlx .= " order by fecha desc ";
            $strCadeSqlx .= " limit 1";
            $objDatabase  = TarifaExp::GetDatabase();
            $objDbResult = $objDatabase->Query($strCadeSqlx);
            $mixRegistro = $objDbResult->FetchArray();
            if (isset($mixRegistro)) {
                $intIdxxTari = $mixRegistro['id'];
                $strCadeSqlx  = "select monto, minimo";
                $strCadeSqlx .= "  from tarifa_exp_destino ";
                $strCadeSqlx .= " where tarifa_id = $intIdxxTari";
                $strCadeSqlx .= "   and destino_id = $intIdxxDest";
                $strCadeSqlx .= "   and fecha_vigencia <= '".$dttFechGuia."'";
                $strCadeSqlx .= " order by fecha_vigencia desc ";
                $strCadeSqlx .= " limit 1";
                $objDatabase  = TarifaExp::GetDatabase();
                $objDbResult = $objDatabase->Query($strCadeSqlx);
                $mixRegistro = $objDbResult->FetchArray();
                return [
                    'monto' => $mixRegistro['monto'],
                    'minimo' => $mixRegistro['minimo']
                ];
            } else {
                return [0,0];
            }
        }

		/**
		 * Esta rutina devuelve la tarifa vigente segun un producto
		 * y una fecha
		 */
		public static function TarifaVigenteAliado($intCodiProd, $intCodiClie, $dttFechGuia, $intIdxxDest) {
            $strCadeSqlx  = "select tarifa_exp_id";
            $strCadeSqlx .= "  from tarifa_cliente ";
            $strCadeSqlx .= " where producto_id = $intCodiProd";
            $strCadeSqlx .= "   and cliente_id = $intCodiClie";
            $strCadeSqlx .= " limit 1";
            $objDatabase  = TarifaCliente::GetDatabase();
            $objDbResult = $objDatabase->Query($strCadeSqlx);
            $mixRegistro = $objDbResult->FetchArray();
            if (isset($mixRegistro)) {
                $intIdxxTari = $mixRegistro['tarifa_exp_id'];
                $strCadeSqlx  = "select monto, minimo";
                $strCadeSqlx .= "  from tarifa_exp_destino ";
                $strCadeSqlx .= " where tarifa_id = $intIdxxTari";
                $strCadeSqlx .= "   and destino_id = $intIdxxDest";
                $strCadeSqlx .= "   and fecha_vigencia <= '".$dttFechGuia."'";
                $strCadeSqlx .= " order by fecha_vigencia desc ";
                $strCadeSqlx .= " limit 1";
                $objDatabase  = TarifaExpDestino::GetDatabase();
                $objDbResult = $objDatabase->Query($strCadeSqlx);
                $mixRegistro = $objDbResult->FetchArray();
                return [
                    'monto' => $mixRegistro['monto'],
                    'minimo' => $mixRegistro['minimo']
                ];
            } else {
                return [0,0];
            }
        }

//        public static function TarifaVigente($intCodiProd, $dttFechGuia) {
//            $strCadeSqlx  = "select monto, minimo";
//            $strCadeSqlx .= "  from tarifa_exp ";
//            $strCadeSqlx .= " where producto_id = ".$intCodiProd;
//            $strCadeSqlx .= "   and fecha <= '".$dttFechGuia."'";
//            $strCadeSqlx .= "   and is_publica = 1";
//            $strCadeSqlx .= " order by fecha desc ";
//            $strCadeSqlx .= " limit 1";
//            $objDatabase  = TarifaExp::GetDatabase();
//            $objDbResult = $objDatabase->Query($strCadeSqlx);
//            $mixRegistro = $objDbResult->FetchArray();
//            if (isset($mixRegistro)) {
//                return [
//                    'monto' => $mixRegistro['monto'],
//                    'minimo' => $mixRegistro['minimo']
//                ];
//            } else {
//                return [0,0];
//            }
//        }

        /**
        * Esta runtina deja registro de la operacion indicada en
        * el log de transacciones
        */
        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'TarifaExp';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Nombre;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_exp_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of TarifaExp objects
			return TarifaExp::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaExp()->Param1, $strParam1),
					QQ::GreaterThan(QQN::TarifaExp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single TarifaExp object
			return TarifaExp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaExp()->Param1, $strParam1),
					QQ::GreaterThan(QQN::TarifaExp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of TarifaExp objects
			return TarifaExp::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaExp()->Param1, $strParam1),
					QQ::Equal(QQN::TarifaExp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = TarifaExp::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`tarifa_exp`.*
				FROM
					`tarifa_exp` AS `tarifa_exp`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return TarifaExp::InstantiateDbResult($objDbResult);
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