<?php
	require(__MODEL_GEN__ . '/PagosCorpGen.class.php');

	/**
	 * The PagosCorp class defined here contains any
	 * customized code for the PagosCorp class in the
	 * Object Relational Model.  It represents the "pagos_corp" table
	 * in the database, and extends from the code generated abstract PagosCorpGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class PagosCorp extends PagosCorpGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPagosCorp->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->Referencia);
		}

		public function conciliarPago() {
		    t('=====================');
		    t('Rutina: conciliarPago');
		    $objDatabase = PagosCorp::GetDatabase();
            $objDatabase->TransactionBegin();
            //------------------------------------------------
            // Se obtienen las facturas relacionadas al Pago
            //------------------------------------------------
            $blnSaldDisp = true;
            $arrFactPago = $this->GetFacturasAsFacturaPagoCorpArray();
            t('El pago de referencia: '.$this->Referencia.' tiene: '.count($arrFactPago).' facturas relacionadas');
            $decMontPago = $this->Monto;
            t('El monto del pago es: '.$decMontPago);
            foreach ($arrFactPago as $objFactPago) {
                t('Procesando la factura: '.$objFactPago->Referencia.' por un total de: '.$objFactPago->Total);
                t('El saldo actual es: '.$decMontPago);
                if ( ($decMontPago < 0) &&  ($this->ClienteCorp->SaldoExcedente > 0) && ($blnSaldDisp)) {
                    t('El saldo es negativo, voy a sumar el saldo excedente del Cliente');
                    $decMontPago += $this->ClienteCorp->SaldoExcedente;
                    $blnSaldDisp = false;
                }
                if ($decMontPago > 0) {
                    t('Saldo positivo voy a descontar la factura: '.$decMontPago);
                    if ($decMontPago >= $objFactPago->Total) {
                        t('Se cubre el monto completo de la factura, se marca como CONCILIADO');
                        $strEstaPago = 'CONCILIADO';
                        $objFactPago->EstatusPago  = $strEstaPago;
                        $objFactPago->MontoCobrado = $objFactPago->Total;
                    } else {
                        t('No cubre el monto de la factura, se marca como PAGOPARCIAL');
                        $strEstaPago = 'PAGOPARCIAL';
                        $objFactPago->EstatusPago  = $strEstaPago;
                        $objFactPago->MontoCobrado = $objFactPago->Total - $decMontPago;
                    }
                } else {
                    $strEstaPago = 'PENDIENTE';
                    $objFactPago->EstatusPago  = $strEstaPago;
                    $objFactPago->MontoCobrado = 0;
                }
                $objFactPago->Save();
                $decMontPago -= $objFactPago->Total;
                t('El saldo de los pagos esta en: '.$decMontPago);
                //----------------------------------------------
                // Se debe registro en el Log de transacciones
                //----------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Facturas';
                $arrLogxCamb['intRefeRegi'] = $objFactPago->Id;
                $arrLogxCamb['strNombRegi'] = $objFactPago->Referencia;
                $arrLogxCamb['strDescCamb'] = 'Pago: '.$objFactPago->Referencia.' ('.$strEstaPago.')';
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$objFactPago->Id;
                LogDeCambios($arrLogxCamb);
            }
            t('Termine de procesar los pagos');
            //----------------------------------------------------------------
            // Si el saldo de los pagos se actualiza en la ficha del Cliente
            //----------------------------------------------------------------
            $this->ClienteCorp->SaldoExcedente = $decMontPago;
            $this->ClienteCorp->Save();
            t('El Saldo Excente del Cliente quedo en: '.$decMontPago);
            //----------------------------------------------
            // Se debe registro en el Log de transacciones
            //----------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'MasterClient';
            $arrLogxCamb['intRefeRegi'] = $this->ClienteCorpId;
            $arrLogxCamb['strNombRegi'] = $$this>$this->ClienteCorp->NombClie;
            $arrLogxCamb['strDescCamb'] = 'Pago Procesando: '.$this->Referencia.' (Saldo: '.$decMontPago.')';
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/master_cliente_edit.php/'.$this->ClienteCorpId;
            LogDeCambios($arrLogxCamb);
            //-----------------------------------------------------------------------
            // Si el saldo es positivo, se crea automaticamente una nota de credito
            //-----------------------------------------------------------------------
            if ($decMontPago > 0) {
                t('Se debe crear una nota de credito');
            }
            $objDatabase->TransactionCommit();
            t('El proceso de conciliacion ha terminado');
            t('***************************************');
        }

		public function replicarEstatusPago($strEstaPago) {
		    $arrFactPago = $this->GetFacturasAsFacturaPagoCorpArray();
            foreach ($arrFactPago as $objFactPago) {
                $objFactPago->EstatusPago  = $strEstaPago;
                $objFactPago->MontoCobrado = 0;
                $objFactPago->Save();
                //----------------------------------------------
                // Se debe registro en el Log de transacciones
                //----------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Facturas';
                $arrLogxCamb['intRefeRegi'] = $objFactPago->Id;
                $arrLogxCamb['strNombRegi'] = $objFactPago->Referencia;
                $arrLogxCamb['strDescCamb'] = 'Pago: '.$objFactPago->Referencia.' ('.$strEstaPago.')';
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/facturas_edit.php/'.$objFactPago->Id;
                LogDeCambios($arrLogxCamb);
            }
        }

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of PagosCorp objects
			return PagosCorp::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorp()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PagosCorp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PagosCorp object
			return PagosCorp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorp()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PagosCorp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PagosCorp objects
			return PagosCorp::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorp()->Param1, $strParam1),
					QQ::Equal(QQN::PagosCorp()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = PagosCorp::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`pagos_corp`.*
				FROM
					`pagos_corp` AS `pagos_corp`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PagosCorp::InstantiateDbResult($objDbResult);
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