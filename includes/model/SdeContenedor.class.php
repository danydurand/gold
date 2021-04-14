<?php
	require(__MODEL_GEN__ . '/SdeContenedorGen.class.php');

	/**
	 * The SdeContenedor class defined here contains any
	 * customized code for the SdeContenedor class in the
	 * Object Relational Model.  It represents the "sde_contenedor" table
	 * in the database, and extends from the code generated abstract SdeContenedorGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class SdeContenedor extends SdeContenedorGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objSdeContenedor->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strNumeCont);
		}

		public function obtenerPiezasDeLaMaster($strNumeMast) {
            return $this->GetGuiaPiezasAsGuiaArray();
        }

        public function obtenerGuiasDeLaMaster() {
            $strCadeSqlx  = "select p.guia_id ";
            $strCadeSqlx .= "  from sde_contenedor_guia_assn c";
            $strCadeSqlx .= "       inner join guia_piezas p";
            $strCadeSqlx .= "    on c.guia_pieza_id = p.id ";
            $strCadeSqlx .= " where nume_cont = '".$this->strNumeCont."'";
            $objDatabase = SdeContenedor::GetDatabase();
            $objDbResult = $objDatabase->Query($strCadeSqlx);
            $arrGuiaMast = array();
            while ($mixRegistro = $objDbResult->FetchArray()) {
                $arrGuiaMast[] = $mixRegistro['guia_id'];
            }
            return $arrGuiaMast;
        }

        /**
         * Suma los pesos de las guias que contiene
         * @return double
         */
        public function SumaMontos() {
            if ((is_null($this->strNumeCont)))
                return 0;

            $decSumaMont = 0;
            $arrGuiaCont = Guia::LoadArrayBySdeContenedor($this->strNumeCont);
            foreach ($arrGuiaCont as $objGuia) {
                $decSumaMont += (double)$objGuia->MontoTotal;
            }
            return $decSumaMont;
        }

        /**
         * Suma los pesos de las guias que contiene
         * @return double
         */
        public function SumaPesos() {
            if ((is_null($this->strNumeCont)))
                return 0;

            $decSumaPeso = 0;
            $arrGuiaCont = Guia::LoadArrayBySdeContenedor($this->strNumeCont);
            foreach ($arrGuiaCont as $objGuia) {
                $decSumaPeso += (double)$objGuia->PesoGuia;
            }
            return $decSumaPeso;
        }

        public function GetGuiasConCheckpoint($strCodiCkpt) {
            //------------------------------------------------------------------------
            // Esta rutina devuelve un vector con los numeros de las Guias
            // incluidas o asociadas al contenedor cuyo nro entra como parametro.
            //------------------------------------------------------------------------
            $objDatabase = SdeContenedor::GetDatabase();
            $objUsuario = unserialize($_SESSION['User']);

            // Properly Escape All Input Parameters using Database->SqlVariable()
            $strCodiCkpt = $objDatabase->SqlVariable($strCodiCkpt);
            //----------------------------------------------------------------------------
            // Se llena un vector con todas las Guias asociadas al Contenedor/Precinto
            //----------------------------------------------------------------------------
            $arrGuiaCont = array();
            $arrValiCont = $this->GetParentSdeContenedorAsSdeContContArray();
            foreach ($arrValiCont as $objValija) {
                $arrGuiaVali = $objValija->GetGuiaArray();
                foreach ($arrGuiaVali as $objGuia) {
                    $arrGuiaCont[] = $objGuia->NumeGuia;
                }
            }
            $arrGuiaVali = $this->GetGuiaArray();
            foreach ($arrGuiaVali as $objGuia) {
                $arrGuiaCont[] = $objGuia->NumeGuia;
            }
            //------------------------------------------------------------------------------------
            // Se identifican cuales de las Guias del contenedor tiene el checkpoint indicado en
            // parametro de entrada
            //------------------------------------------------------------------------------------
            $strNumeGuia = implode(',',$arrGuiaCont);
            // Setup the SQL Query
            $strQuery  = "select nume_guia ";
            $strQuery .= "  from guia_ckpt ";
            $strQuery .= " where nume_guia in (".$strNumeGuia.")";
            $strQuery .= "   and codi_ckpt = ".$strCodiCkpt;
            $strQuery .= "   and codi_esta = '".$objUsuario->CodiEsta."'";
            //		echo $strQuery."<br>\n";
            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strQuery);
            $arrGuiaCont = array();
            while ($mixRegistro = $objDbResult->FetchArray()) {
                $arrGuiaCont[] = $mixRegistro['nume_guia'];
            }
            return $arrGuiaCont;
        }

        /**
         * Gets all many-to-many associated ParentSdeContenedorsAsSdeContCont as an array of SdeContenedor objects
         * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
         * @return SdeContenedor[]
         */
        public function GetParentSdeContenedorAsSdeContContArray($objOptionalClauses = null) {
            if ((is_null($this->strNumeCont)))
                return array();

            try {
                return SdeContenedor::LoadArrayBySdeContenedorAsSdeContCont($this->strNumeCont, $objOptionalClauses);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
        }

        public function GetDestinos() {
            //--------------------------------------------------------------------------------------------------------
            // Se crea un vector con los destinos de la Operacion lo cual servira para efectos de validacion durante
            // el proceso de Envalijado
            //--------------------------------------------------------------------------------------------------------
            $arrDestinos = array();
            $arrEstaDest = $this->CodiOperObject->GetSucursalesAsOperacionDestinoArray();
            foreach ($arrEstaDest as $objDestino) {
                $arrDestinos[] = $objDestino->Id;
            }
            return $arrDestinos;
        }

        public function tieneCheckpoint($strCodiCkpt) {
            // This will return a count of Guia objects
            return ContenedorCkpt::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::ContenedorCkpt()->Valija, $this->strNumeCont),
                    QQ::Equal(QQN::ContenedorCkpt()->Checkpoint, $strCodiCkpt)
                )
            );
        }

        /**
         * Associates a Guia
         * @param Guia $objGuia
         * @return void
         */
        public function AsociaLaGuia($strNumeGuia) {
            if ((is_null($this->strNumeCont)))
                throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuia on this unsaved SdeContenedor.');
            if ((is_null($strNumeGuia)))
                throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuia on this SdeContenedor with an unsaved Guia.');

            // Get the Database Object for this Class
            $objDatabase = SdeContenedor::GetDatabase();

            // Perform the SQL Query
            $objDatabase->NonQuery('
				INSERT INTO `sde_contenedor_guia_assn` (
					`nume_cont`,
					`nume_guia`
				) VALUES (
					' . $objDatabase->SqlVariable($this->strNumeCont) . ',
					' . $objDatabase->SqlVariable($strNumeGuia) . '
				)
			');
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of SdeContenedor objects
			return SdeContenedor::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SdeContenedor()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single SdeContenedor object
			return SdeContenedor::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SdeContenedor()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of SdeContenedor objects
			return SdeContenedor::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->Param1, $strParam1),
					QQ::Equal(QQN::SdeContenedor()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`sde_contenedor`.*
				FROM
					`sde_contenedor` AS `sde_contenedor`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return SdeContenedor::InstantiateDbResult($objDbResult);
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