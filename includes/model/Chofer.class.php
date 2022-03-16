<?php
	require(__MODEL_GEN__ . '/ChoferGen.class.php');

	/**
	 * The Chofer class defined here contains any
	 * customized code for the Chofer class in the
	 * Object Relational Model.  It represents the "chofer" table
	 * in the database, and extends from the code generated abstract ChoferGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Chofer extends ChoferGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objChofer->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',$this->Nombre);
		}

        public function activoMobileHoy() {
		    $strLogiChof  = $this->Login;
		    $strFechDhoy  = FechaDeHoy();
		    $strCadeSqlx  = "select count(*) as cant_regi ";
		    $strCadeSqlx .= "  from log_mobile ";
		    $strCadeSqlx .= " where chofer = '$strLogiChof' ";
		    $strCadeSqlx .= "   and date(fecha) = '$strFechDhoy' ";
		    $objDatabase  = Chofer::GetDatabase();
		    $objDbResult  = $objDatabase->Query($strCadeSqlx);
		    $mixRegistro  = $objDbResult->FetchArray();
            $intLogxMobi  = $mixRegistro['cant_regi'];
            //$intLogxMobi  = LogMobile::CountByChoferFecha($this->Login, FechaDeHoy());
            return $intLogxMobi ? 'SI' : 'NO';
		}


        /*
         * Esta funcion registra la actividad de los Choferes
         * en el uso Ruta Mobile
         */
        public function grabarLogMobile($strLogxDesc) {
            try {
                $objLogxMobi = new LogMobile();
                $objLogxMobi->Fecha       = new QDateTime(QDateTime::Now);
                $objLogxMobi->Chofer      = $this->Login;
                $objLogxMobi->Descripcion = trim($strLogxDesc);
                $objLogxMobi->Save();
            } catch (Exception $e) {
                tc('Error LogMobile: '.$e->getMessage());
            }
        }

        public function ActualizarManifiestosDelChofer(){
            $objClauOrde = QQ::OrderBy(QQN::Containers()->Id,false);
            $arrManiChof = Containers::LoadArrayByChoferIdEstatus($this->CodiChof,'ABIERT@',$objClauOrde);
            foreach ($arrManiChof as $objManiChof) {
                //t('Voy a actualizar la estadisticas de entrega de: '.$objManiChof->Numero.' ('.$objManiChof->Id.')');
                $objManiChof->ActualizarEstadisticasDeEntrega();
            }
		}

        public static function LoginPropuesto($strCadeNomb, $strCadeApel) {
            $strLogiProp = '';
            if (strlen($strCadeNomb) && strlen($strCadeApel)) {
                $blnLogiVali = false;
                $intCantInte = strlen($strCadeNomb);
                $i = 0;
                while ((!$blnLogiVali) && ($i < $intCantInte)) {
                    $strLogiProp  = $strCadeNomb[$i];
                    $strLogiProp .= substr($strCadeApel,0,7);
                    $strLogiProp  = strtolower($strLogiProp);
                    t('Login Propuesto: '.$strLogiProp);
                    //-------------------------------------------------------------------------------------------
                    // Se verifica la existencia previa de algun chofer con ese login ya que no puede repetirse
                    //-------------------------------------------------------------------------------------------
                    $objClauWher   = QQ::Clause();
                    $objClauWher[] = QQ::Equal(QQN::Chofer()->Login,$strLogiProp);
                    $intCantLogi   = Chofer::QueryCount(QQ::AndCondition($objClauWher));
                    if ($intCantLogi == 0) {
                        $blnLogiVali = true;
                    } else {
                        $i++;
                    }
                }
            }
            return $strLogiProp;
        }

        public static function ChoferesActivosDeLaSucursal($strCodiSucu) {
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Chofer()->Nombre);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Chofer()->CodiStat,StatusType::ACTIVO);
            $objClauWher[] = QQ::Equal(QQN::Chofer()->CodiDisp,SinoType::SI);
            $objClauWher[] = QQ::Equal(QQN::Chofer()->CodiEsta,$strCodiSucu);
            return Chofer::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        }

        /**
		 * Esta rutina retorna la Cantidad de Manifiestos abiertos
		 * asociados al Cartero
		 *
		 * @return Integer (Cantidad de Manifiestos Abiertos)
		 */
		public function CantidadDeManifiestos() {
			$intManiAbie = 0;
			foreach ($this->GetMasManifiestoAsCodiChofArray() as $objManifiesto) {
				if ($objManifiesto->StatMani == 1 && $objManifiesto->TipoMani == 0) {
					$intManiAbie++;
				}
			}
			return $intManiAbie;
		}

		public function __toStringInvertido() {
			return sprintf('%s, %s (%s)',$this->strApelChof,$this->strNombChof,substr(MasTipoMensType::ToString($this->TipoMens),0,1));
		}

		public function __NombApelTipo() {
			return sprintf('%s, %s (%s)',$this->strNombChof,$this->strApelChof,substr(MasTipoMensType::ToString($this->TipoMens),0,1));
		}

		public function Liberar() {
			//---------------------------------------------------
			// Esta rutina cambia la disponibilidad del Chofer
			//---------------------------------------------------
			$this->__set('CodiDisp',1);
			$this->Save();
		}

		public function Bloquear() {
			//---------------------------------------------------
			// Esta rutina cambia la disponibilidad del Chofer
			//---------------------------------------------------
			$this->__set('CodiDisp',0);
			$this->Save();
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Chofer objects
			return Chofer::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Chofer()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Chofer()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Chofer object
			return Chofer::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Chofer()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Chofer()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Chofer objects
			return Chofer::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Chofer()->Param1, $strParam1),
					QQ::Equal(QQN::Chofer()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`chofer`.*
				FROM
					`chofer` AS `chofer`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Chofer::InstantiateDbResult($objDbResult);
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