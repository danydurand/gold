<?php
	require(__MODEL_GEN__ . '/SucursalesGen.class.php');

	/**
	 * The Sucursales class defined here contains any
	 * customized code for the Sucursales class in the
	 * Object Relational Model.  It represents the "sucursales" table
	 * in the database, and extends from the code generated abstract SucursalesGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Sucursales extends SucursalesGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objSucursales->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			//return sprintf('Sucursales Object %s',  $this->intId);
			return sprintf('%s (%s)',  $this->strNombre, $this->strIata);
		}

		public static function LoadSucursalesActivas($strOrdePorx='Iata',$strTipoSucu='nac') {
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Sucursales()->$strOrdePorx);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::IsNull(QQN::Sucursales()->DeletedAt);
            if ($strTipoSucu == 'nac') {
                $objClauWher[] = QQ::Equal(QQN::Sucursales()->EsExport,SinoType::NO);
            } else {
                $objClauWher[] = QQ::Equal(QQN::Sucursales()->EsExport,SinoType::SI);
            }
            return Sucursales::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        }

		public static function CountSucursalesActivas() {
            $arrSucuActi = Sucursales::LoadSucursalesActivas();
            return count($arrSucuActi);
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
                $this->Iata,
                $this->Nombre,
                !is_null($this->EstadoId) ? str_replace('ESTADO','',$this->Estado->Nombre) : 'N/A',
                substr($this->Nombre,0,50),
                strtolower(substr($this->EmailPrincipal,0,50)),
                $this->Telefono);
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Sucursales objects
			return Sucursales::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Sucursales()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Sucursales()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Sucursales object
			return Sucursales::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Sucursales()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Sucursales()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Sucursales objects
			return Sucursales::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Sucursales()->Param1, $strParam1),
					QQ::Equal(QQN::Sucursales()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`sucursales`.*
				FROM
					`sucursales` AS `sucursales`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Sucursales::InstantiateDbResult($objDbResult);
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