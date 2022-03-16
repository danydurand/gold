<?php
	require(__MODEL_GEN__ . '/ContainerPiezaMobileGen.class.php');

	/**
	 * The ContainerPiezaMobile class defined here contains any
	 * customized code for the ContainerPiezaMobile class in the
	 * Object Relational Model.  It represents the "container_pieza_mobile" table
	 * in the database, and extends from the code generated abstract ContainerPiezaMobileGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class ContainerPiezaMobile extends ContainerPiezaMobileGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objContainerPiezaMobile->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ContainerPiezaMobile Object %s',  $this->intId);
		}

        public function afterSave(ContainerPiezaMobile $objRegiAnte) {
		    t('===============');
		    t('En el afterSave');
            $intCantPend = $this->objContainerMobile->Pendientes;
            $intCantEntr = $this->objContainerMobile->Entregadas;
            $intCantDevu = $this->objContainerMobile->Devueltas;
            $intCantSing = $this->objContainerMobile->SinGestionar;
            switch ($this->Checkpoint->Codigo) {
                case 'OK':
                    t('Pieza entregada');
                    $intCantPend -= 1;
                    $intCantEntr += 1;
                    $intCantSing -= 1;
                    break;
                case 'DV':
                    t('Pieza Devuelta');
                    $intCantPend -= 1;
                    $intCantSing -= 1;
                    $intCantDevu += 1;
                    break;
                default:
                    t('La pieza esta pendiente');
                    $intCantPend += 1;
                    if (!is_null($this->CheckpointId)) {
                        $intCantSing -= 1;
                    } else {
                        $intCantSing += 1;
                    }
            }
            if (!is_null($objRegiAnte->CheckpointId)) {
                switch ($objRegiAnte->CheckpointId) {
                    case 'OK':
                        t('Pieza estaba Entregada');
                        $intCantEntr -= 1;
                        break;
                    case 'DV':
                        t('Pieza estaba Devuelta');
                        $intCantDevu -= 1;
                        break;
                }
            }
            $this->objContainerMobile->Pendientes   = $intCantPend;
            $this->objContainerMobile->Entregadas   = $intCantEntr;
            $this->objContainerMobile->Devueltas    = $intCantDevu;
            $this->objContainerMobile->SinGestionar = $intCantSing;
            $this->objContainerMobile->UpdatedAt    = new QDateTime(QDateTime::Now);
            $this->objContainerMobile->Save();
		}


        /**
        * Esta runtina deja registro de la operacion indicada en
        * el log de transacciones
        */
        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'ContainerPiezaMobile';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Nombre;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/container_pieza_mobile_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ContainerPiezaMobile objects
			return ContainerPiezaMobile::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerPiezaMobile()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ContainerPiezaMobile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ContainerPiezaMobile object
			return ContainerPiezaMobile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerPiezaMobile()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ContainerPiezaMobile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ContainerPiezaMobile objects
			return ContainerPiezaMobile::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerPiezaMobile()->Param1, $strParam1),
					QQ::Equal(QQN::ContainerPiezaMobile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = ContainerPiezaMobile::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`container_pieza_mobile`.*
				FROM
					`container_pieza_mobile` AS `container_pieza_mobile`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ContainerPiezaMobile::InstantiateDbResult($objDbResult);
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