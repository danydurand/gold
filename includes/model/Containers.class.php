<?php
	require(__MODEL_GEN__ . '/ContainersGen.class.php');

	/**
	 * The Containers class defined here contains any
	 * customized code for the Containers class in the
	 * Object Relational Model.  It represents the "containers" table
	 * in the database, and extends from the code generated abstract ContainersGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Containers extends ContainersGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objContainers->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->Numero);
		}

        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'Containers';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->Numero;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/containers_edit.php/'.$this->Id;
            LogDeCambios($arrLogxCamb);
        }

        public function ActualizarEstadisticasDeEntrega() {
		    $objResuEntr = $this->ResumeDeEntrega();
		    $this->CantidadOk = $objResuEntr->CantOkey;
		    if ($this->CantidadOk == $this->Piezas) {
		        $this->Estatus = 'CERRAD@';
            } else {
                $this->Estatus = 'ABIERT@';
            }
            $this->Save();
        }

		public function ContarPiezasEnRuta() {
            $intCantRuta = 0;
            $arrPiezMani = $this->GetGuiaPiezasAsContainerPiezaArray();
            foreach ($arrPiezMani as $objPiezMani) {
                if ($objPiezMani->ultimoCheckpoint() == 'TR') {
                    $intCantRuta++;
                }
            }
            return $intCantRuta;
        }

        public function ResumeDeEntrega() {
		    $intTotaPiez = $this->Piezas != 0 ? $this->Piezas : 1;
		    $intCantOkey = $this->ContarPiezasConCheckpoint('OK');
		    $intCantPend = $intTotaPiez - $intCantOkey;
		    $decPorcPend = nf0($intCantPend * 100 / $intTotaPiez);
		    $decPorcOkey = nf0($intCantOkey * 100 / $intTotaPiez);

		    $objResuEntr = new stdClass();
		    $objResuEntr->TotaPiez = $intTotaPiez;
		    $objResuEntr->CantOkey = $intCantOkey;
		    $objResuEntr->CantPend = $intCantPend;
		    $objResuEntr->PorcOkey = $decPorcOkey;
		    $objResuEntr->PorcPend = $decPorcPend;
		    return $objResuEntr;
        }

		public function ContarPiezasConCheckpoint($strCodiCkpt) {
		    $intCantPiez = 0;
		    $arrPiezMani = $this->GetGuiaPiezasAsContainerPiezaArray();
            foreach ($arrPiezMani as $objPiezMani) {
                if ($objPiezMani->tieneCheckpoint($strCodiCkpt)) {
                    $intCantPiez++;
                }
		    }
		    return $intCantPiez;
        }

		public function destinosCorto() {
		    return substr($this->Direccion,0,50).'...';
        }

		public function actualizarTotales() {
            $decSumaKilo = 0;
            $decSumaPies = 0;
            $intCantPiez = 0;
            $arrPiezCont = GuiaPiezas::LoadArrayByContainersAsContainerPieza($this->Id);
            foreach ($arrPiezCont as $objPiezCont) {
                $decSumaKilo += (double)$objPiezCont->Kilos;
                $decSumaPies += (double)$objPiezCont->PiesCub;
                $intCantPiez ++;
            }
            $this->Kilos   = $decSumaKilo;
            $this->PiesCub = $decSumaPies;
            $this->Piezas  = $intCantPiez;
            $this->Save();
        }

        public function GetPiezasConCheckpoint($strCodiCkpt, $strTipoDato='IdPieza') {
		    t('Obteniedo piezas del contenedor que tengan: '.$strCodiCkpt);
            //-----------------------------------------------------------------------------
            // Devuelve un vector con los numeros de las piezas del contenedor que tengan
            // el checkpoint indicado
            //-----------------------------------------------------------------------------
            $arrPiezCont = array();
            $arrValiCont = $this->GetContainersAsContainerContainerArray();
            foreach ($arrValiCont as $objValija) {
                t('Procesando la Valija: '.$objValija->Numero);
                $arrPiezVali = $objValija->GetGuiaPiezasAsContainerPiezaArray();
                foreach ($arrPiezVali as $objGuiaPiez) {
                    if ($objGuiaPiez->tieneCheckpoint($strCodiCkpt)) {
                        $arrPiezCont[] = $objGuiaPiez->$strTipoDato;
                    }
                }
            }
            $arrPiezVali = $this->GetGuiaPiezasAsContainerPiezaArray();
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

        public function obtenerPiezasDeLaMaster() {
            return $this->GetGuiaPiezasAsContainerPiezaArray();
        }

        public function obtenerGuiasDeLaMaster() {
            $strCadeSqlx  = "select g.id ";
            $strCadeSqlx .= "  from containers c";
            $strCadeSqlx .= "       inner join container_pieza_assn cpa";
            $strCadeSqlx .= "    on c.id = cpa.container_id";
            $strCadeSqlx .= "       inner join guia_piezas gp";
            $strCadeSqlx .= "    on gp.id = cpa.guia_pieza_id";
            $strCadeSqlx .= "       inner join guias g";
            $strCadeSqlx .= "    on g.id = gp.guia_id";
            $strCadeSqlx .= " where c.numero = '".$this->Numero."'";
            $objDatabase = Containers::GetDatabase();
            $objDbResult = $objDatabase->Query($strCadeSqlx);
            $arrGuiaMast = array();
            while ($mixRegistro = $objDbResult->FetchArray()) {
                $arrGuiaMast[] = $mixRegistro['id'];
            }
            return $arrGuiaMast;
        }

        /**
         * Suma los pesos de las piezas que contiene
         * @return double
         */
        public function SumaMontos() {
            if ((is_null($this->strNumero)))
                return 0;

            $decSumaMont = 0;
            $arrPiezCont = GuiaPiezas::LoadArrayByContainersAsContainerPieza($this->intId);
            foreach ($arrPiezCont as $objPiezCont) {
                $decSumaMont += (double)$objPiezCont->Guia->Total;
            }
            return $decSumaMont;
        }

        /**
         * Suma los pesos de las guias que contiene
         * @return double
         */
        public function SumaPesos() {
            if ((is_null($this->strNumero)))
                return 0;

            $decSumaPeso = 0;
            $arrPiezCont = GuiaPiezas::LoadArrayByContainersAsContainerPieza($this->intId);
            foreach ($arrPiezCont as $objPiezCont) {
                $decSumaPeso += (double)$objPiezCont->Kilos;
            }
            return $decSumaPeso;
        }

        public function GetDestinos($campo='Id') {
            //--------------------------------------------------------------------------------------------------------
            // Se crea un vector con los destinos de la Operacion lo cual servira para efectos de validacion durante
            // el proceso de Envalijado
            //--------------------------------------------------------------------------------------------------------
            $arrDestinos = array();
            $arrEstaDest = $this->Operacion->GetSucursalesAsOperacionDestinoArray();
            foreach ($arrEstaDest as $objDestino) {
                $arrDestinos[] = $objDestino->$campo;
            }
            return $arrDestinos;
        }

        public function tieneCheckpoint($strCodiCkpt) {
            return ContainerCkpt::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::ContainerCkpt()->ContainerId, $this->intId),
                    QQ::Equal(QQN::ContainerCkpt()->Checkpoint->Codigo, $strCodiCkpt)
                )
            );
        }


        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Containers objects
			return Containers::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Containers()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Containers object
			return Containers::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Containers()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Containers objects
			return Containers::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Param1, $strParam1),
					QQ::Equal(QQN::Containers()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`containers`.*
				FROM
					`containers` AS `containers`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Containers::InstantiateDbResult($objDbResult);
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