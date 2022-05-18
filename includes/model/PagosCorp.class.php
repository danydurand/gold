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

		public function __toStringCorto($intCantCara=30) {
			return sprintf('%s',  substr($this->Referencia,3,$intCantCara));
		}

        public function ActualizarMontosDeLasFacturas() {
            //--------------------------------------------
            // Se obtiene las Facturas asociadas al Pago
            //--------------------------------------------
            $arrFactAsoc = $this->GetFacturasAsFacturaPagoCorpArray();
            //---------------------------------------------------------------------
            // Se actualiza el monto cobrado de la facturas asociadas
            //---------------------------------------------------------------------
            foreach ($arrFactAsoc as $objFactAsoc) {
                $objFactAsoc->ActualizarMontos();
            }

        }

        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'PagosCorp';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Referencia;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/pagos_corp_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }


        public function conciliarPago() {
            t('=====================');
            t('Rutina: conciliarPago');
            $objDatabase = PagosCorp::GetDatabase();
            $objDatabase->TransactionBegin();
            $objUsuario  = unserialize($_SESSION['User']);
            t('El Saldo del Cliente en el arranque es: '.$this->ClienteCorp->SaldoExcedente);
            $blnSaldDisp = ($this->ClienteCorp->SaldoExcedente > 0);
            t('El cliente tiene saldo excedente ? '.$blnSaldDisp);
            //------------------------------------------------
            // Se obtienen las facturas relacionadas al Pago
            //------------------------------------------------
            $intCantFact = 0;
            $arrFactPago = $this->GetFacturasAsFacturaPagoCorpArray();
            t('El pago de referencia: '.$this->Referencia.' tiene: '.count($arrFactPago).' facturas relacionadas');
            $decMontPago = $this->Monto;
            foreach ($arrFactPago as $objFactPago) {
                t('Procesando Factura: '.$objFactPago->Referencia.
                    ' con Mto Pendiente: '.nf($objFactPago->MontoPendiente).
                    ' con Abono de: '.nf($objFactPago->MontoAbono));
                $decMontAbon = $objFactPago->MontoAbono;
                if ($decMontAbon > 0) {
                    t('Saldo positivo voy a descontar la factura cuyo monto pendiente es: '.nf($objFactPago->MontoPendiente));
                    if ($decMontAbon >= $objFactPago->MontoPendiente) {
                        t('Se cubre el monto completo de la factura, se marca como CONCILIADO');
                        $strEstaPago = 'CONCILIADO';
                        $objFactPago->EstatusPago     = $strEstaPago;
                        $objFactPago->MontoCobrado   += $objFactPago->MontoAbono;
                        $decMontPago = $decMontPago - $objFactPago->MontoPendiente;
                        $objFactPago->MontoPendiente  = 0;
                    } else {
                        t('No cubre el monto de la factura, se marca como PAGOPARCIAL');
                        $strEstaPago = 'PAGOPARCIAL';
                        $objFactPago->EstatusPago     = $strEstaPago;
                        $objFactPago->MontoCobrado   += $decMontAbon;
                        $objFactPago->MontoPendiente -= $decMontAbon;
                        $decMontPago = $decMontPago - $decMontAbon;
                    }
                    t('Desconte: '.$decMontAbon.' y quedo en: '.$decMontPago);
                } else {
                    $strEstaPago = 'PENDIENTE';
                    $objFactPago->EstatusPago  = $strEstaPago;
                    $objFactPago->MontoCobrado = 0;
                }
                $objFactPago->Save();
                t('El saldo de los pagos esta en: '.nf($decMontPago));
                //----------------------------------------------
                // Se deja registro en el Log de transacciones
                //----------------------------------------------
                $objFactPago->logDeCambios('Pago: '.$objFactPago->Referencia.' ('.$strEstaPago.')');
                $intCantFact++;
            }
            $this->ClienteCorp->calcularSaldoExcedente();
            t('Termine de procesar los pagos');
            $objDatabase->TransactionCommit();
            t('El proceso de conciliacion ha terminado. La funcion retorna con Monto del Pago: '.$decMontPago);
            t('*******************************************************************************');
            return [$intCantFact,$decMontPago];
        }

        public function conciliarPagoOld() {
            t('=====================');
            t('Rutina: conciliarPago');
            $objDatabase = PagosCorp::GetDatabase();
            $objDatabase->TransactionBegin();
            $objUsuario  = unserialize($_SESSION['User']);
            t('El Saldo del cliente en el arranque es: '.$this->ClienteCorp->SaldoExcedente);
            $blnSaldDisp = ($this->ClienteCorp->SaldoExcedente > 0);
            t('El cliente tiene saldo excedente ? '.$blnSaldDisp);
            //------------------------------------------------
            // Se obtienen las facturas relacionadas al Pago
            //------------------------------------------------
            $intCantFact = 0;
            $arrFactPago = $this->GetFacturasAsFacturaPagoCorpArray();
            t('El pago de referencia: '.$this->Referencia.' tiene: '.count($arrFactPago).' facturas relacionadas');
            $decMontPago = $this->Monto;
            foreach ($arrFactPago as $objFactPago) {
                t('Procesando Factura: '.$objFactPago->Referencia.' con Mto Pendiente: '.nf($objFactPago->MontoPendiente));
                t('El saldo actual del pago es: '.nf($decMontPago));
                if ( ($decMontPago < 0) && ($blnSaldDisp) ) {
                    t('El saldo del pago es negativo, voy a sumar el saldo excedente del Cliente');
                    $decMontPago += $this->ClienteCorp->SaldoExcedente;
                    $blnSaldDisp = false;
                }
                if ($decMontPago > 0) {
                    t('Saldo positivo voy a descontar la factura cuyo monto pendiente es: '.nf($objFactPago->MontoPendiente));
                    if ($decMontPago >= $objFactPago->MontoPendiente) {
                        t('Se cubre el monto completo de la factura, se marca como CONCILIADO');
                        $strEstaPago = 'CONCILIADO';
                        $objFactPago->EstatusPago     = $strEstaPago;
                        $objFactPago->MontoCobrado   += $objFactPago->MontoAbono;
                        t('En este punto el saldo de los pagos es de: '.$decMontPago);
                        $decMontPago = $decMontPago - $objFactPago->MontoAbono;
                        t('Desconte: '.$objFactPago->MontoAbono.' y quedo en: '.$decMontPago);
                        $objFactPago->MontoPendiente  = 0;
                    } else {
                        t('No cubre el monto de la factura, se marca como PAGOPARCIAL');
                        $strEstaPago = 'PAGOPARCIAL';
                        $objFactPago->EstatusPago     = $strEstaPago;
                        $objFactPago->MontoCobrado   += $decMontPago;
                        $objFactPago->MontoPendiente -= $decMontPago;
                        $decMontPago = 0;
                    }
                } else {
                    $strEstaPago = 'PENDIENTE';
                    $objFactPago->EstatusPago  = $strEstaPago;
                    $objFactPago->MontoCobrado = 0;
                }
                $objFactPago->Save();
                //$decMontPago -= $objFactPago->MontoCobrado;
                t('El saldo de los pagos esta en: '.nf($decMontPago));
                //----------------------------------------------
                // Se deja registro en el Log de transacciones
                //----------------------------------------------
                $objFactPago->logDeCambios('Pago: '.$objFactPago->Referencia.' ('.$strEstaPago.')');
                //------------------------------------------------
                // El monto cobrado se suma al Saldo del Cliente
                //------------------------------------------------
                $objFactPago->ClienteCorp->SaldoExcedente += $decMontPago;
                $objFactPago->ClienteCorp->Save();
                t('El Saldo del Cliente va por: '.nf($decMontPago));
                //----------------------------------------------
                // Se deja registro en el Log de transacciones
                //----------------------------------------------
                $strMensTran = 'Pago Procesando: '.$this->Referencia.' (Saldo: '.$decMontPago.')';
                $objFactPago->ClienteCorp->logDeCambios($strMensTran);

                $intCantFact++;
                $blnSaldDisp = $objFactPago->ClienteCorp->SaldoExcedente > 0 ? true : false;
            }
            t('Termine de procesar los pagos');
            $objDatabase->TransactionCommit();
            t('El proceso de conciliacion ha terminado');
            t('***************************************');
            return [$intCantFact,$decMontPago];
        }

		public function replicarEstatusPago($strEstaPago) {
            t('===========================');
            t('Rutina: replicarEstatusPago');
            $objDatabase = PagosCorp::GetDatabase();
            $objDatabase->TransactionBegin();
		    $arrFactPago = $this->GetFacturasAsFacturaPagoCorpArray();
            t('El Saldo del cliente en el arranque es: '.$this->ClienteCorp->SaldoExcedente);
            $intCantFact = 0;
            foreach ($arrFactPago as $objFactPago) {
                $decMontCobr = $objFactPago->MontoCobrado;
                t('Procesando el pago: '.$objFactPago->Referencia.' por un monto de: '.$decMontCobr);
                $objFactPago->EstatusPago    = $strEstaPago;
                $objFactPago->MontoCobrado   = 0;
                $objFactPago->MontoPendiente = $objFactPago->Total;
                $objFactPago->Save();
                //----------------------------------------------
                // Se debe registro en el Log de transacciones
                //----------------------------------------------
                $objFactPago->logDeCambios('Pago: '.$objFactPago->Referencia.' ('.$strEstaPago.')');
                //----------------------------------------------------------
                // El monto de la Factura, se suma a la deuda del Cliente
                //----------------------------------------------------------
                $objFactPago->ClienteCorp->SaldoExcedente -= $decMontCobr;
                $objFactPago->ClienteCorp->Save();
                t('El Saldo del Cliente quedo en: '.$this->ClienteCorp->SaldoExcedente);
                //----------------------------------------------
                // Se deja registro en el Log de transacciones
                //----------------------------------------------
                $strMensTran = 'Pago '.$strEstaPago.', Referencia: '.$this->Referencia.' (Saldo: '.$this->ClienteCorp->SaldoExcedente.')';
                $objFactPago->ClienteCorp->logDeCambios($strMensTran);
                $intCantFact++;
            }
            $objDatabase->TransactionCommit();
            t('El proceso de replicacion ha terminado');
            t('**************************************');
            return $intCantFact;
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