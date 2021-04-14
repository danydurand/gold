<?php
	require(__MODEL_GEN__ . '/MensajeYamaguchiGen.class.php');

	/**
	 * The MensajeYamaguchi class defined here contains any
	 * customized code for the MensajeYamaguchi class in the
	 * Object Relational Model.  It represents the "mensaje_yamaguchi" table
	 * in the database, and extends from the code generated abstract MensajeYamaguchiGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class MensajeYamaguchi extends MensajeYamaguchiGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objMensajeYamaguchi->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s - %s',$this->strTipo,$this->strTexto);
		}

		public function __toCliente() {
            $strTextMens  = '<div class="well">';
            $strTextMens .= '    <span class="text-%s">';
            $strTextMens .= '        <i class="fa fa-%s fa-lg"></i> %s';
            $strTextMens .= '    </span>';
            $strTextMens .= '</div>';
            return sprintf($strTextMens,$this->Tipo,$this->Icono,$this->Texto);
        }

        public function __vigente() {
		    $dttFechDhoy = new QDateTime(QDateTime::Now);
		    $dttFechFinx = $this->FechFin->__toString('YYYY-MM-DD');
		    $dttFechDhoy = $dttFechDhoy->__toString('YYYY-MM-DD');
		    if ($dttFechFinx >= $dttFechDhoy || $this->TiempoIndefinido) {
		        return true;
            } else {
                return false;
            }
        }

        /**
         * Load a single MensajeYamaguchi object,
         * by Tipo Index(es)
         * @param string $strTipo
         * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
         * @return MensajeYamaguchi
         */
        public static function LoadByTipo($strTipo, $objOptionalClauses = null) {
            return MensajeYamaguchi::QuerySingle(
                QQ::AndCondition(
                    QQ::Equal(QQN::MensajeYamaguchi()->Tipo, $strTipo)
                ),
                $objOptionalClauses
            );
        }

        /**
         * Obtiene la última posición u orden entre los registros.
         *
         * @return int : Última posición u orden entre registros.
         */
		public static function UltimaPosicion() {
		    $objClauOrde = QQ::Clause();
		    $objClauOrde[] = QQ::OrderBy(QQN::MensajeYamaguchi()->Orden,false);
		    $objClauOrde[] = QQ::LimitInfo(1);
		    $arrMensYama = MensajeYamaguchi::LoadAll($objClauOrde);
            if (isset($arrMensYama[0])) {
                $objMensYama = $arrMensYama[0];
                return $objMensYama->Orden;
            } else {
                return 0;
            }
        }

        /**
         * Retorna todos los Mensajes Generales y Exclusivos para el Cliente cuyo codigo entra como parametro.
         *
         * @param $strCodigo : Código interno del Cliente
         * @param null $objOptionalClauses : Clausulas adicionales.
         * @return array : Mensajes CORP generales y exclusivos para el Cliente.
         */
        public static function LoadMensajesVigentesParaElCliente($strCodigo, $objOptionalClauses = null) {
            $dttFechDhoy   = new QDateTime(QDateTime::Now);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::LessOrEqual(QQN::MensajeYamaguchi()->FechInic,$dttFechDhoy);
            $objClauWher[] = QQ::GreaterOrEqual(QQN::MensajeYamaguchi()->FechFin,$dttFechDhoy);
            $objClauWher[] = QQ::Equal(QQN::MensajeYamaguchi()->TiempoIndefinido,SinoType::NO);
            $arrMensOkey   = array();
            $arrMensCorp   = MensajeYamaguchi::QueryArray(QQ::AndCondition($objClauWher),$objOptionalClauses);
            foreach ($arrMensCorp as $objMensCorp) {
                $arrCodiClie = explode(',',nl2br2($objMensCorp->Codigos));
                if (in_array($strCodigo, $arrCodiClie) || in_array('TODOS', $arrCodiClie)) {
                    $arrMensOkey[] = $objMensCorp;
                }
            }
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::LessOrEqual(QQN::MensajeYamaguchi()->FechInic,$dttFechDhoy->__toString('YYYY-MM-DD'));
            $objClauWher[] = QQ::Equal(QQN::MensajeYamaguchi()->TiempoIndefinido,SinoType::SI);
            $arrMensCorp   = MensajeYamaguchi::QueryArray(QQ::AndCondition($objClauWher),$objOptionalClauses);
            foreach ($arrMensCorp as $objMensCorp) {
                $arrCodiClie = explode(',',nl2br2($objMensCorp->Codigos));
                if (in_array($strCodigo, $arrCodiClie) || in_array('TODOS', $arrCodiClie)) {
                    $arrMensOkey[] = $objMensCorp;
                }
            }
            return $arrMensOkey;
        }

        /**
         * Retorna todos los Mensajes Generales y Exclusivos para el Cliente operativo en el Sistema Yamaguchi.
         *
         * @param $strCodigo : Código interno del Cliente
         * @param null $objOptionalClauses : Clausulas adicionales.
         * @return array : Mensajes CORP generales y exclusivos para el Cliente.
         */
        public static function LoadArrayByCodigoTODOS($strCodigo, $objOptionalClauses = null) {
            $dttFechDhoy   = new QDateTime(QDateTime::Now);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::GreaterOrEqual(QQN::MensajeYamaguchi()->FechInic,$dttFechDhoy->__toString('YYYY-MM-DD'));
            $objClauWher[] = QQ::LessOrEqual(QQN::MensajeYamaguchi()->FechFin,$dttFechDhoy->__toString('YYYY-MM-DD'));
            $objClauWher[] = QQ::Equal(QQN::MensajeYamaguchi()->TiempoIndefinido,true);
            $arrMensOkey   = array();
            $arrMensCorp = MensajeYamaguchi::QueryArray(QQ::OrCondition($objClauWher),$objOptionalClauses);
            // t('Encontre '.count($arrMensCorp).' mensajes para evaluar');
            foreach ($arrMensCorp as $objMensCorp) {
                $arrCodiClie = explode(',',nl2br2($objMensCorp->Codigos));
                // t('Mensaje: '.$objMensCorp->Id.' en el campo Codigos tiene: '.$objMensCorp->Codigos);
                if (in_array($strCodigo, $arrCodiClie) || in_array('TODOS', $arrCodiClie)) {
                    // t('Encontré el codigo: '.$strCodigo.' dentro de los Codigos');
                    $arrMensOkey[] = $objMensCorp;
                }
            }
            return $arrMensOkey;
        }

        public static function LoadMsjAlertByCodigoInterno($strCodiInte) {
            $objMensYama = MensajeYamaguchi::LoadByTipo('danger');
            if ($objMensYama) {
                $arrCodiInte = explode(',',nl2br2($objMensYama->Codigos));
                if (!in_array($strCodiInte, $arrCodiInte)) {
                    $objMensYama = null;
                }
            } else {
                $objMensYama = null;
            }
            return $objMensYama;
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
		/*
			public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
				// This will return an array of MensajeYamaguchi objects
				return MensajeYamaguchi::QueryArray(
					QQ::AndCondition(
						QQ::Equal(QQN::MensajeYamaguchi()->Param1, $strParam1),
						QQ::GreaterThan(QQN::MensajeYamaguchi()->Param2, $intParam2)
					),
					$objOptionalClauses
				);
			}

			public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
				// This will return a single MensajeYamaguchi object
				return MensajeYamaguchi::QuerySingle(
					QQ::AndCondition(
						QQ::Equal(QQN::MensajeYamaguchi()->Param1, $strParam1),
						QQ::GreaterThan(QQN::MensajeYamaguchi()->Param2, $intParam2)
					),
					$objOptionalClauses
				);
			}

			public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
				// This will return a count of MensajeYamaguchi objects
				return MensajeYamaguchi::QueryCount(
					QQ::AndCondition(
						QQ::Equal(QQN::MensajeYamaguchi()->Param1, $strParam1),
						QQ::Equal(QQN::MensajeYamaguchi()->Param2, $intParam2)
					),
					$objOptionalClauses
				);
			}

			public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
				// Performing the load manually (instead of using QCubed Query)

				// Get the Database Object for this Class
				$objDatabase = MensajeYamaguchi::GetDatabase();

				// Properly Escape All Input Parameters using Database->SqlVariable()
				$strParam1 = $objDatabase->SqlVariable($strParam1);
				$intParam2 = $objDatabase->SqlVariable($intParam2);

				// Setup the SQL Query
				$strQuery = sprintf('
					SELECT
						`mensaje_yamaguchi`.*
					FROM
						`mensaje_yamaguchi` AS `mensaje_yamaguchi`
					WHERE
						param_1 = %s AND
						param_2 < %s',
					$strParam1, $intParam2);

				// Perform the Query and Instantiate the Result
				$objDbResult = $objDatabase->Query($strQuery);
				return MensajeYamaguchi::InstantiateDbResult($objDbResult);
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