<?php
	require(__MODEL_GEN__ . '/FacturaGuiasGen.class.php');

	/**
	 * The FacturaGuias class defined here contains any
	 * customized code for the FacturaGuias class in the
	 * Object Relational Model.  It represents the "factura_guias" table
	 * in the database, and extends from the code generated abstract FacturaGuiasGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class FacturaGuias extends FacturaGuiasGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objFacturaGuias->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('FacturaGuias Object %s',  $this->intId);
		}


		public function Save($blnForceInsert = false, $blnForceUpdate = false)
        {
            $intIdxxRegi = parent::Save($blnForceInsert, $blnForceUpdate);

            //-------------------------------------------------------------------------------
            // Se calcular los conceptos de la Guia y se almacen en los Items de la Factura
            //-------------------------------------------------------------------------------
            t('=========================');
            t('En FacturaGuias.class.php');
            /**
             * @var $objItemFact FacturaItems
             * @var $objConcGuia GuiaConceptos
             */
            t('Procesando la Guia: '.$this->Guia->Numero);
            $arrConcGuia = $this->Guia->GetGuiaConceptosAsGuiaArray();
            t('La guia tiene: '.count($arrConcGuia).' conceptos');
            foreach($arrConcGuia as $objConcGuia) {
                t('Procesando el concepto: ' . $objConcGuia->Concepto->Nombre);
                //------------------------------------------------------------------
                // Si el concepto existe, se actualiza, en caso contrario, se crea
                //------------------------------------------------------------------
                $objItemFact = FacturaItems::LoadByFacturaIdConceptoId($this->FacturaId,$objConcGuia->ConceptoId);
                if ($objItemFact) {
                    t('Ya existia, voy a sumar el monto');
                    $objItemFact->Monto += $objConcGuia->Monto;
                    $objItemFact->Save();
                } else {
                    t('No existia, voy a crearlo');
                    try {
                        $objItemFact = new FacturaItems();
                        $objItemFact->FacturaId   = $this->FacturaId;
                        $objItemFact->ConceptoId  = $objConcGuia->ConceptoId;
                        $objItemFact->MostrarComo = $objConcGuia->Concepto->MostrarComo;
                        $objItemFact->Monto       = $objConcGuia->Monto;
                        $objItemFact->Save();
                    } catch (Exception $e) {
                        t('Error creando item de la factura: '.$e->getMessage());
                    }
                }
            }
            t("Se procesaron los conceptos de la guia");
        }


        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of FacturaGuias objects
			return FacturaGuias::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaGuias()->Param1, $strParam1),
					QQ::GreaterThan(QQN::FacturaGuias()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single FacturaGuias object
			return FacturaGuias::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaGuias()->Param1, $strParam1),
					QQ::GreaterThan(QQN::FacturaGuias()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of FacturaGuias objects
			return FacturaGuias::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaGuias()->Param1, $strParam1),
					QQ::Equal(QQN::FacturaGuias()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = FacturaGuias::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`factura_guias`.*
				FROM
					`factura_guias` AS `factura_guias`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return FacturaGuias::InstantiateDbResult($objDbResult);
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