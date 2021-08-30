<?php
	require(__MODEL_GEN__ . '/ManifiestoExpGen.class.php');

	/**
	 * The ManifiestoExp class defined here contains any
	 * customized code for the ManifiestoExp class in the
	 * Object Relational Model.  It represents the "manifiesto_exp" table
	 * in the database, and extends from the code generated abstract ManifiestoExpGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class ManifiestoExp extends ManifiestoExpGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objManifiestoExp->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->Numero);
		}

		public function __creator() {
		    return !is_null($this->CreatedBy) ? Usuario::Load($this->CreatedBy)->LogiUsua : null;
        }

		public function __updater() {
		    return !is_null($this->UpdatedBy) ? Usuario::Load($this->UpdatedBy)->LogiUsua : null;
        }

        public function actualizarTotales() {
            $strCadeSqlx  = "SELECT sum(gp.valor_declarado) as suma_valo, ";
            $strCadeSqlx .= "       sum(gp.libras) as suma_libr, ";
            $strCadeSqlx .= "       sum(gp.volumen) as suma_volu, ";
            $strCadeSqlx .= "       sum(gp.kilos) as suma_kilo, ";
            $strCadeSqlx .= "       sum(gp.pies_cub) as suma_pies, ";
            $strCadeSqlx .= "       count(*) as cant_piez ";
            $strCadeSqlx .= "  FROM guia_piezas gp ";
            $strCadeSqlx .= "       INNER JOIN manifiesto_exp_pieza_assn m ";
            $strCadeSqlx .= "    ON gp.id = m.guia_pieza_id ";
            $strCadeSqlx .= " WHERE m.manifiesto_exp_id = ".$this->Id;
            t('SQL: '.$strCadeSqlx);
            $objDatabase  = self::GetDatabase();
            $objDbResult  = $objDatabase->Query($strCadeSqlx);
            $mixRegistro  = $objDbResult->FetchArray();
            try {
                $this->Valor   = $mixRegistro['suma_valo'];
                $this->Libras  = $mixRegistro['suma_libr'];
                $this->Volumen = $mixRegistro['suma_volu'];
                $this->Kilos   = $mixRegistro['suma_kilo'];
                $this->PiesCub = $mixRegistro['suma_pies'];
                $this->Piezas  = $mixRegistro['cant_piez'];
                $this->Save();
            } catch (Exception $e) {
                t('Error: '.$e->getMessage());
            }
        }

        public function GetPiezasConCheckpoint($strCodiCkpt, $strTipoDato='IdPieza') {
            t('Obteniedo piezas del manifiesto que tengan: '.$strCodiCkpt);
            //-----------------------------------------------------------------------------
            // Devuelve un vector con los numeros de las piezas del contenedor que tengan
            // el checkpoint indicado
            //-----------------------------------------------------------------------------
            $arrPiezCont = array();
            //$arrValiCont = $this->GetContainersAsContainerContainerArray();
            //foreach ($arrValiCont as $objValija) {
            //    t('Procesando la Valija: '.$objValija->Numero);
            //    $arrPiezVali = $objValija->GetGuiaPiezasAsContainerPiezaArray();
            //    foreach ($arrPiezVali as $objGuiaPiez) {
            //        if ($objGuiaPiez->tieneCheckpoint($strCodiCkpt)) {
            //            $arrPiezCont[] = $objGuiaPiez->$strTipoDato;
            //        }
            //    }
            //}
            $arrPiezVali = $this->GetGuiaPiezasAsPiezaArray();
            foreach ($arrPiezVali as $objGuiaPiez) {
                t('Procesando la pieza: '.$objGuiaPiez->IdPieza);
                if ($objGuiaPiez->tieneCheckpoint($strCodiCkpt)) {
                    t('La pieza si tiene el checkpoint');
                    $arrPiezCont[] = $objGuiaPiez->$strTipoDato;
                } else {
                    t('La pieza no tiene el checkpoint: '.$strCodiCkpt);
                }
            }
            return $arrPiezCont;
        }

        public static function proxReferencia() {
            //------------------------------------------------------------------------------------
            // Para la 1era vez que se emita una factura, la referencia será tomada de la tabla
            // "parametros" bajo la combinacion RefeFact-ProxRefe
            //------------------------------------------------------------------------------------
            if (ManifiestoExp::CountAll() == 0) {
                $intRefeFact = 0;
            } else {
                $objAdicClau   = QQ::Clause();
                $objAdicClau[] = QQ::OrderBy(QQN::ManifiestoExp()->Id,false);
                $objAdicClau[] = QQ::LimitInfo(1);
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::IsNotNull(QQN::ManifiestoExp()->Id);
                $arrUltiFact   = ManifiestoExp::QueryArray(QQ::AndCondition($objClauWher),$objAdicClau);
                $objUltiFact   = $arrUltiFact[0];
                $intRefeFact   = (int)explode('-',$objUltiFact->Referencia)[0];
            }
            $strYearDhoy = date('Y');
            $strNumeRefe = str_pad($intRefeFact+1,5,'0',STR_PAD_LEFT).'-'.$strYearDhoy;
            return $strNumeRefe;
        }

        /**
        * Esta runtina deja registro de la operacion indicada en
        * el log de transacciones
        */
        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'ManifiestoExp';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Booking;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/manifiesto_exp_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ManifiestoExp objects
			return ManifiestoExp::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ManifiestoExp()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ManifiestoExp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ManifiestoExp object
			return ManifiestoExp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ManifiestoExp()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ManifiestoExp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ManifiestoExp objects
			return ManifiestoExp::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ManifiestoExp()->Param1, $strParam1),
					QQ::Equal(QQN::ManifiestoExp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`manifiesto_exp`.*
				FROM
					`manifiesto_exp` AS `manifiesto_exp`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ManifiestoExp::InstantiateDbResult($objDbResult);
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