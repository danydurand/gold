<?php
	require(__MODEL_GEN__ . '/ContainerMobileGen.class.php');

	/**
	 * The ContainerMobile class defined here contains any
	 * customized code for the ContainerMobile class in the
	 * Object Relational Model.  It represents the "container_mobile" table
	 * in the database, and extends from the code generated abstract ContainerMobileGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class ContainerMobile extends ContainerMobileGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objContainerMobile->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ContainerMobile Object %s',  $this->intId);
		}

        public function _Pzas_x_Sync() {
            return ContainerPiezaMobile::CountByContainerMobileIdIsSync($this->Id,false);;
		}

        public function _Pzas_x_Sync_toString() {
		    $intPorxSync = $this->_Pzas_x_Sync();
		    if ($intPorxSync) {
                return '<span style="color: blue; font-weight: bold">'.$intPorxSync.'</span>';
            } else {
                return $intPorxSync;
            }
		}


        public function ResumeDeEntrega() {
		    tc('===========================');
		    tc('Llegando al ResumeDeEntrega');

            $strCadeSqlx  = "select * ";
            $strCadeSqlx .= "  from v_resumen_del_manifiesto_mobile ";
            $strCadeSqlx .= " where container_id = ".$this->ContainerId;
            $objDatabase  = ContainerMobile::GetDatabase();
            $objDbResult  = $objDatabase->Query($strCadeSqlx);
            $mixRegistro  = $objDbResult->FetchArray();

            try {
                $this->Entregadas   = $mixRegistro['entregadas'];
                $this->Pendientes   = $mixRegistro['pendientes'];
                $this->Devueltas    = $mixRegistro['devueltas'];
                $this->SinGestionar = $mixRegistro['sin_gestionar'];
                $this->UpdatedAt    = new QDateTime(QDateTime::Now);
                if ($this->Entregadas > 0) {
                    if ( ($this->Entregadas + $this->Devueltas) == $this->CantPiezas) {
                        $this->Abierto = false;
                    } else {
                        $this->Abierto = true;
                    }
                } else {
                    $this->Abierto = true;
                }

                $this->Save();
            } catch (Exception $e) {
                tc('Error actualizando el Manifiesto Mobile: '.$e->getMessage());
            }

        }


        public function GetGuiaPiezasDelContainerPorTipo($strTipoGuia,$intCantRegi=10,$intOffxSetx=0) {
            if (is_null($this->Id)) {
                return array();
            }
            try {
                $strNombVist = 'v_sin_gestionar_del_manifiesto_mobile';
                switch ($strTipoGuia) {
                    case 'PE':
                        $strNombVist = 'v_pendientes_del_manifiesto_mobile';
                        break;
                    case 'OK':
                        $strNombVist = 'v_entregadas_del_manifiesto_mobile';
                        break;
                    case 'DV':
                        $strNombVist = 'v_devueltas_del_manifiesto_mobile';
                        break;
                    case 'SG':
                        $strNombVist = 'v_sin_gestionar_del_manifiesto_mobile';
                        break;
                }
                $arrPiezTipo  = [];
                $strCadeSqlx  = "select * ";
                $strCadeSqlx .= "  from $strNombVist";
                $strCadeSqlx .= " where container_id = ".$this->ContainerId;
                $strCadeSqlx .= " limit $intOffxSetx, $intCantRegi";
                tc($strCadeSqlx);
                $objDatabase  = Containers::GetDatabase();
                $objDbResult  = $objDatabase->Query($strCadeSqlx);
                while ($mixRegistro = $objDbResult->FetchArray()) {
                    $arrPiezTipo[] = $mixRegistro;
                }
                //$objClauWher = QQ::In(QQN::GuiaPiezas()->Id,$arrIdxxPiez);
                //$arrPiezTipo = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
                return $arrPiezTipo;
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
        }


        /**
        * Esta runtina deja registro de la operacion indicada en
        * el log de transacciones
        */
        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'ContainerMobile';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Container->Numero;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/container_mobile_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ContainerMobile objects
			return ContainerMobile::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerMobile()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ContainerMobile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ContainerMobile object
			return ContainerMobile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerMobile()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ContainerMobile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ContainerMobile objects
			return ContainerMobile::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerMobile()->Param1, $strParam1),
					QQ::Equal(QQN::ContainerMobile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`container_mobile`.*
				FROM
					`container_mobile` AS `container_mobile`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ContainerMobile::InstantiateDbResult($objDbResult);
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