<?php
	require(__MODEL_GEN__ . '/NotaEntregaGen.class.php');

	/**
	 * The NotaEntrega class defined here contains any
	 * customized code for the NotaEntrega class in the
	 * Object Relational Model.  It represents the "nota_entrega" table
	 * in the database, and extends from the code generated abstract NotaEntregaGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class NotaEntrega extends NotaEntregaGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objNotaEntrega->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s-%s',  substr($this->ClienteCorp->NombClie,0,20),$this->Referencia);
		}

        public function IdsDeLasGuias() {
		    $arrIdxxGuia = [];
            foreach ($this->GetGuiasArray() as $objGuiaNota) {
                $arrIdxxGuia[] = $objGuiaNota->Id;
		    }
		    return $arrIdxxGuia;
        }

        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'NotaEntrega';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Referencia;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/nota_entrega_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }

        public function piezasDeLaNota() {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaPiezas()->Guia->NotaEntregaId,$this->Id);
            return GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
        }

		public function contarCheckpoint($strCodiCkpt) {
		    $objClauWher   = QQ::Clause();
		    $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Pieza->Guia->NotaEntregaId,$this->Id);
		    $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo,$strCodiCkpt);
		    return PiezaCheckpoints::QueryCount(QQ::AndCondition($objClauWher));
        }

		public function asociandoNotaConFactura($intFactIdxx) {
		    t('Asociando guias de la nde con la factura');
            //-----------------------------------------------------------------------------------------
            // Las guias asociadas a la Nota de Entrega, deben quedar asociadas a la Factura indicada
            //-----------------------------------------------------------------------------------------
            $arrGuiaNota = $this->GetGuiasArray();
            foreach ($arrGuiaNota as $objGuiaNota) {
                $objGuiaNota->FacturaId = $intFactIdxx;
                $objGuiaNota->Save();
            }
            //-------------------------------------------------------------------
            // La Nota de Entrega como tal, tambien queda enlazada a la Factura
            //-------------------------------------------------------------------
            t('Asociando la nde con la factura');
            $this->FacturaId = $intFactIdxx;
            if (is_null($intFactIdxx)) {
                $this->Estatus = 'RECIBID@';
            } else {
                $this->Estatus = 'FACTURAD@';
            }
            $this->Save();
        }

        public function calcularTodoLosConceptos($arrConcCalc) {
            t('===============================');
            t('Calculando conceptos de la NDE: '.$this->Id);
            t('1ero se eliminan los conceptos existentes asociados a la NDE');
            $this->borrarConceptos();
            //----------------------------------------------------------------------
            $arrGuiaNota = $this->GetGuiasArray();
            t('Cant de guias a procesar de esa nde: '.count($arrGuiaNota));
            $decTotaNdex = 0;
            foreach ($arrGuiaNota as $objGuiaNota) {
                t('Procesando la guia: '.$objGuiaNota->Tracking);
                $objGuiaNota->calcularTodoLosConceptos($arrConcCalc);
                $decTotaNdex += $objGuiaNota->Total;
                //--------------------------------------------------------------------
                // La nde se actualiza con los conceptos recien caculados de la guia
                //--------------------------------------------------------------------
                $arrConcGuia = $objGuiaNota->GetGuiaConceptosAsGuiaArray();
                foreach ($arrConcGuia as $objConcGuia) {
                    $objConcNota = NotaConceptos::LoadByNotaEntregaIdConceptoId($this->Id,$objConcGuia->ConceptoId);
                    //t('Concepto de la Nota: '.$objConcNota->Id);
                    if (!$objConcNota) {
                        $objConcNota = new NotaConceptos();
                        $objConcNota->NotaEntregaId = $this->Id;
                        $objConcNota->ConceptoId    = $objConcGuia->ConceptoId;
                        $objConcNota->Tipo          = $objConcGuia->Tipo;
                        $objConcNota->Valor         = is_numeric($objConcGuia->Valor) ? $objConcGuia->Valor : null;
                        $objConcNota->Monto         = $objConcGuia->Monto;
                        $objConcNota->MostrarComo   = $objConcGuia->MostrarComo;
                        $objConcNota->Explicacion   = 'Acumulando las guias asociadas';
                        t('El concepto: '.$objConcGuia->Concepto->Nombre.' no existia, se acaba de asociar a la nde');
                    } else {
                        t('El concepto: '.$objConcNota->Concepto->Nombre.' existia, sumando el monto: '.$objConcGuia->Monto);
                        $objConcNota->Monto        += $objConcGuia->Monto;
                    }
                    try {
                        $objConcNota->Save();
                    } catch (Exception $e) {
                        t('Error: '.$e->getMessage());
                    }
                }
            }
            //-----------------------------------
            // Se actualiza el total de la NDE
            //-----------------------------------
            $this->Total = $decTotaNdex;
            $this->Save();
            t('El total de la nde fue actualizada con: '.$decTotaNdex);
        }

        /**
         * Esta rutina elimina los conceptos asociados a la NDE
         */
		public function borrarConceptos() {
		    $this->DeleteAllNotaConceptoses();
		    $this->Total = 0;
		    $this->Save();
		    t('Los conceptos de la nde han sido borrados');
        }


        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of NotaEntrega objects
			return NotaEntrega::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntrega()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NotaEntrega()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single NotaEntrega object
			return NotaEntrega::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntrega()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NotaEntrega()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of NotaEntrega objects
			return NotaEntrega::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntrega()->Param1, $strParam1),
					QQ::Equal(QQN::NotaEntrega()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`nota_entrega`.*
				FROM
					`nota_entrega` AS `nota_entrega`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return NotaEntrega::InstantiateDbResult($objDbResult);
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