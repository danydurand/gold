<?php
	require(__MODEL_GEN__ . '/EstacionGen.class.php');

	/**
	 * The Estacion class defined here contains any
	 * customized code for the Estacion class in the
	 * Object Relational Model.  It represents the "estacion" table
	 * in the database, and extends from the code generated abstract EstacionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Estacion extends EstacionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objEstacion->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strDescEsta);
		}

        public function __toHtml()
        {
            $strTextMens  = '<div class="panel panel-primary">';
            $strTextMens .= '    <div class="panel-heading">(%s) %s<span class="pull-right">%s</span></div>';
            $strTextMens .= '    <div class="panel-body">';
            $strTextMens .= '       <table>';
            $strTextMens .= '          <tr>';
            $strTextMens .= '              <td class="title"><i class="fa fa-user-circle fa-lg"></td>';
            $strTextMens .= '              <td class="content">&nbsp;%s</td>';
            $strTextMens .= '          </tr>';
            $strTextMens .= '          <tr>';
            $strTextMens .= '              <td class="title"><i class="fa fa-envelope fa-lg"></td>';
            $strTextMens .= '              <td class="content">&nbsp;%s</td>';
            $strTextMens .= '          </tr>';
            $strTextMens .= '          <tr>';
            $strTextMens .= '              <td class="title"><i class="fa fa-phone-square fa-lg"></td>';
            $strTextMens .= '              <td class="content">&nbsp;%s</td>';
            $strTextMens .= '          </tr>';
            $strTextMens .= '       </table>';
            $strTextMens .= '    </div>';
            $strTextMens .= '</div>';
            return sprintf($strTextMens,
                $this->CodiEsta,
                $this->DescEsta,
                !is_null($this->EstadoId) ? str_replace('ESTADO','',$this->Estado->Nombre) : 'N/A',
                substr($this->NombCont,0,50),
                strtolower(substr($this->DireMailPrincipal,0,50)),
                $this->NumeTele);
        }

		public function __toStringConTiempoDeEntrega() {
			return sprintf('%s (%s) (%s)',  $this->strDescEsta, $this->NumeDias, $this->strFrecuenciaDeCobertura);
		}

        public static function LoadArrayConCantidadDeReceptorias() {
			$objDatabase = Estacion::GetDatabase();
			$strCadeSqlx  = 'select *,(select count(*) ';
			$strCadeSqlx .= '       	 from counter ';
			$strCadeSqlx .= '       	where counter.sucursal_id = estacion.codi_esta) as __cant_rece ';
			$strCadeSqlx .= '  from estacion ';
			$strCadeSqlx .= ' where codi_stat = 1 ';
			$strCadeSqlx .= '   and es_un_almacen = 0 ';
			$strCadeSqlx .= '   and pais_id = 1 ';
			$strCadeSqlx .= '   and visible_en_registro_id = 1 ';
			$strCadeSqlx .= ' order by desc_esta';
			$objDbResult = $objDatabase->Query($strCadeSqlx);
			return Estacion::InstantiateDbResult($objDbResult);
		}

		public static function LoadSucursalesActivasSinAlmacenes() {
		    //-------------------------------------------------------------------------------------------------
            // Esta función retorna una matriz de Objetos Estacion (Sucursales) activas, que no son almacén, y
            // cuyo país es Venezuela (1); todos ordenados por nombre o descripción de la Estación o Sucursal.
            //-------------------------------------------------------------------------------------------------
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
            $objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
            $objClauWher[] = QQ::Equal(QQN::Estacion()->PaisId,1);
            $objClauWher[] = QQ::NotIn(QQN::Estacion()->CodiEsta,array('SMG'));
            return Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        }

        public static function CriteriosDeSucusalesActivas() {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
            $objClauWher[] = QQ::Equal(QQN::Estacion()->VisibleEnRegistroId,SinoType::SI);
            $objClauWher[] = QQ::Equal(QQN::Estacion()->PaisId,1);
            return $objClauWher;
        }

		public static function LoadSucursalesActivasToClients() {
		    //-------------------------------------------------------------------------------------------------
            // Esta función retorna una matriz de Objetos Estacion (Sucursales) activas, que no son almacén, y
            // cuyo país es Venezuela (1); todos ordenados por nombre o descripción de la Estación o Sucursal.
            //-------------------------------------------------------------------------------------------------
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
            $objClauWher   = Estacion::CriteriosDeSucusalesActivas();
            return Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        }

        public static function CriteriosDeSucusalesCodActivas() {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
            $objClauWher[] = QQ::Equal(QQN::Estacion()->VisibleEnRegistroId,SinoType::SI);
            $objClauWher[] = QQ::Equal(QQN::Estacion()->PaisId,1);
            $objClauWher[] = QQ::Equal(QQN::Estacion()->ZonaCod,1);
            return $objClauWher;
        }

		public static function LoadSucursalesActivasCodToClients() {
		    //-------------------------------------------------------------------------------------------------
            // Esta función retorna una matriz de Objetos Estacion (Sucursales) activas, que no son almacén, y
            // cuyo país es Venezuela (1); todos ordenados por nombre o descripción de la Estación o Sucursal.
            //-------------------------------------------------------------------------------------------------
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
            $objClauWher   = Estacion::CriteriosDeSucusalesCodActivas();
            return Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        }

        public static function CantidadSucursalesActivasToClients() {
            //------------------------------------------------------------------------------------------------------
            // Esta función retorna la cantidad de Sucursales activas, que no son almacén y cuyo país es Venezuela.
            //------------------------------------------------------------------------------------------------------
            return count(Estacion::LoadSucursalesActivasToClients());
        }

        public static function StringDeSucursalesActivasToClients() {
		    $arrSucuActi = Estacion::LoadSucursalesActivasToClients();
		    $strSucuActi = "'";
            foreach ($arrSucuActi as $objSucuActi) {
                $strSucuActi .= $objSucuActi->CodiEsta."','";
		    }
		    return substr($strSucuActi,0,strlen($strSucuActi)-2);
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Estacion objects
			return Estacion::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Estacion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Estacion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

				public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
					// This will return a single Estacion object
					return Estacion::QuerySingle(
						QQ::AndCondition(
							QQ::Equal(QQN::Estacion()->Param1, $strParam1),
							QQ::GreaterThan(QQN::Estacion()->Param2, $intParam2)
						),
						$objOptionalClauses
					);
				}

				public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
					// This will return a count of Estacion objects
					return Estacion::QueryCount(
						QQ::AndCondition(
							QQ::Equal(QQN::Estacion()->Param1, $strParam1),
							QQ::Equal(QQN::Estacion()->Param2, $intParam2)
						),
						$objOptionalClauses
					);
				}

				public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
					// Performing the load manually (instead of using QCubed Query)

					// Get the Database Object for this Class
					$objDatabase = Estacion::GetDatabase();

					// Properly Escape All Input Parameters using Database->SqlVariable()
					$strParam1 = $objDatabase->SqlVariable($strParam1);
					$intParam2 = $objDatabase->SqlVariable($intParam2);

					// Setup the SQL Query
					$strQuery = sprintf('
						SELECT
							`estacion`.*
						FROM
							`estacion` AS `estacion`
						WHERE
							param_1 = %s AND
							param_2 < %s',
						$strParam1, $intParam2);

					// Perform the Query and Instantiate the Result
					$objDbResult = $objDatabase->Query($strQuery);
					return Estacion::InstantiateDbResult($objDbResult);
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