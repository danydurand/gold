<?php
	require(__MODEL_GEN__ . '/FacturaPmnGen.class.php');

	/**
	 * The FacturaPmn class defined here contains any
	 * customized code for the FacturaPmn class in the
	 * Object Relational Model.  It represents the "factura_pmn" table
	 * in the database, and extends from the code generated abstract FacturaPmnGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class FacturaPmn extends FacturaPmnGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objFacturaPmn->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Fact: %s',  $this->intId);
		}

        public function guiaAsociada() {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Guia()->FacturaId,$this->intId);
            return Guia::QuerySingle(QQ::AndCondition($objClauWher));
        }

        public function GuiaCODdelSDE() {
			//---------------------------------------------------------------------
			// Esta rutina determina si la Factura corresponde a una guía del SDE
			// o una guia hecha a traves del Expreso Nacional.
			//---------------------------------------------------------------------
			$blnCODxSDEx = true;
			$arrItemFact = $this->GetItemFacturaPmnAsFacturaArray();
			$objItemFact = $arrItemFact[0];
			if ($objItemFact->Guia->TipoGuia != TipoGuiaType::CODCOBROENDESTINO) {
				$blnCODxSDEx = false;
			}
			if ($blnCODxSDEx) {
				if (!in_array($objItemFact->Guia->SistemaId, array('sde','con'))) {
					$blnCODxSDEx = false;
				}
			}
			return $blnCODxSDEx;
		}

		public function BorrarFactura() {
			//----------------------------------------------------
			// Se rompe la relacion entre las guias y la Factura
			//----------------------------------------------------
			$arrItemFact = $this->GetItemFacturaPmnAsFacturaArray();
			foreach ($arrItemFact as $objItemFact) {
				$objItemFact->Guia->FacturaId = null;
				$objItemFact->Guia->Save();
				$objItemFact->Guia->EliminarPOD();
				//------------------------------------
				// Se elimina el item de la Factura
				//------------------------------------
				$objItemFact->Delete();
			}
			//------------------------------------------------
			// Se eliminan los pagos asociados a la Factura
			//------------------------------------------------
			$this->DeleteAllPagoFacturaPmnsAsFactura();
			//----------------------------------
			// Se elimina la Factura como tal
			//----------------------------------
			$this->Delete();
		}

		public function AnularFactura($arrParaAnul) {
			$strMotiAnul = $arrParaAnul['MotiAnul'];
			$intUsuaAnul = $arrParaAnul['UsuaAnul'];
			//----------------------------------------------------
			// Se rompe la relacion entre las guias y la Factura
			//----------------------------------------------------
			$arrItemFact = $this->GetItemFacturaPmnAsFacturaArray();
			foreach ($arrItemFact as $objItemFact) {
				$objItemFact->Guia->FacturaId = null;
				$objItemFact->Guia->Save();
			}
			//------------------------------------------------
			// Se eliminan los pagos asociados a la Factura
			//------------------------------------------------
			$this->DeleteAllPagoFacturaPmnsAsFactura();
			//--------------------------------------------
			// Se alimentan los campos de Anulacion
			//--------------------------------------------
			$this->strMotivoAnulacion = $strMotiAnul;
			$this->intAnuladaPor = $intUsuaAnul;
			$this->dttAnuladaEl = new QDateTime(QDateTime::Now);
			$this->Estatus = 'A';
			$this->Save();
		}

		public function ActualizaCobro() {
			$strCadeSqlx = 'select sum(monto_pago) as monto_pago
			                  from pago_factura_pmn
			                 where factura_id = '.$this->intId;
			$objDatabase = $this->GetDatabase();
			$objDbResult = $objDatabase->Query($strCadeSqlx);
			$mixRegistro = $objDbResult->FetchArray();
			//-----------------------------------------
			// Se actualizan los montos de la Factura
			//-----------------------------------------
			$this->fltMontoCobrado = $mixRegistro['monto_pago'];
			$this->Save();
		}

		public function ActualizarMontos() {
			$strCadeSqlx = 'select sum(monto_base) as monto_base,
			                       sum(monto_dscto) as monto_dscto,
			                       sum(monto_franqueo) as monto_franqueo,
			                       sum(monto_seguro) as monto_seguro,
			                       sum(monto_iva) as monto_iva,
			                       sum(monto_total) as monto_total
			                  from item_factura_pmn
			                 where factura_id = '.$this->intId;
			$objDatabase = $this->GetDatabase();
			$objDbResult = $objDatabase->Query($strCadeSqlx);
			$mixRegistro = $objDbResult->FetchArray();
			//-----------------------------------------
			// Se actualizan los montos de la Factura
			//-----------------------------------------
			$this->fltMontoBase     = $mixRegistro['monto_base'];
			$this->fltMontoDscto    = $mixRegistro['monto_dscto'];
			$this->fltMontoFranqueo = $mixRegistro['monto_franqueo'];
			$this->fltMontoSeguro   = $mixRegistro['monto_seguro'];
			$this->fltMontoIva      = $mixRegistro['monto_iva'];

			if ($this->fltPorcentajeReteIva > 0) {
				$decMontRete = $this->fltPorcentajeReteIva * $this->fltMontoIva / 100;
				$this->fltMontoIva -= round($decMontRete,2);
			} else {
				$decMontRete = 0;
			}
			$this->fltMontoTotal = round($mixRegistro['monto_total'] - $decMontRete,2);

			if ($this->fltPorcentajeReteIslr > 0) {
				$decMontRete = $this->fltPorcentajeReteIslr * $this->fltMontoBase / 100;
				$this->fltMontoBase -= round($decMontRete,2);
			} else {
				$decMontRete = 0;
			}

			$this->fltMontoTotal = round($this->fltMontoTotal - $decMontRete,2);
			$this->Save();
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of FacturaPmn objects
			return FacturaPmn::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPmn()->Param1, $strParam1),
					QQ::GreaterThan(QQN::FacturaPmn()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single FacturaPmn object
			return FacturaPmn::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPmn()->Param1, $strParam1),
					QQ::GreaterThan(QQN::FacturaPmn()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of FacturaPmn objects
			return FacturaPmn::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPmn()->Param1, $strParam1),
					QQ::Equal(QQN::FacturaPmn()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`factura_pmn`.*
				FROM
					`factura_pmn` AS `factura_pmn`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return FacturaPmn::InstantiateDbResult($objDbResult);
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