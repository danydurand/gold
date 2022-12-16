<?php
	require(__MODEL_GEN__ . '/GuiaPiezasGen.class.php');

	/**
	 * The GuiaPiezas class defined here contains any
	 * customized code for the GuiaPiezas class in the
	 * Object Relational Model.  It represents the "guia_piezas" table
	 * in the database, and extends from the code generated abstract GuiaPiezasGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class GuiaPiezas extends GuiaPiezasGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objGuiaPiezas->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strIdPieza);
		}
        
        /**
         * The business rule is this:
         * If the Piece's Customer is GoldCoast (id = 4) and
         * the piece has the RG checkpoint, then is Ready to Go
         */
        public function IsReadyToGo() {
            $blnClieGold = $this->NotaEntrega->ClienteCorpId == 4;
            if (!$blnClieGold) {
                //-------------------------------------------------------------------
                // If the piece's Customer is not GoldCoast, we don't need
                // to validate if it has the RG checkpoint.  The piece is Ready to Go
                //-------------------------------------------------------------------
                return true;
            } 
            //----------------------------------------------------------------------------
            // If we are at this point in the routine, it means that the Customer is
            // Gold Coast, and therefore we need to check if the piece has RG checkpoint
            //----------------------------------------------------------------------------
            return $this->tieneCheckpoint('RG');
        }
        
        
        public function __AltoPl() {
            return nfp($this->Alto / 2.54);
		}

        public function __AnchoPl() {
            return nfp($this->Ancho / 2.54);
		}

        public function __LargoPl() {
            return nfp($this->Largo / 2.54);
		}

        public function __medidasPl() {
            return nfp($this->__AltoPl()).' x '.nf($this->__AnchoPl()).' x '.nf($this->__LargoPl());
        }

        public function pesoTarifa() {
            if ($this->Guia->ServicioImportacion == 'AER') {
                $decPesoComp = $this->Kilos;
            } else {
                $decPesoComp = $this->PiesCub;
            }
            return $decPesoComp;
        }

        public function __medidas() {
            return nf($this->Alto).' x '.nf($this->Ancho).' x '.nf($this->Largo);
        }

        public function __ordinal() {
		    return (int)explode('-',$this->IdPieza)[1];
        }

		public function  __printName() {
		    return '/var/www/html/gold/retail/tmp/GuiaExp'.$this->IdPieza.'.pdf';
        }

        public static function LoadArrayByManifiestoExp($strParam1, $objOptionalClauses) {
            // Performing the load manually (instead of using QCubed Query)

            // Get the Database Object for this Class
            $objDatabase = GuiaPiezas::GetDatabase();

            // Properly Escape All Input Parameters using Database->SqlVariable()
            $strParam1 = $objDatabase->SqlVariable($strParam1);

            $strCadeSqlx  = "SELECT gp.* ";
            $strCadeSqlx .= "  FROM guia_piezas gp ";
            $strCadeSqlx .= "    ON g.id = gp.guia_id ";
            $strCadeSqlx .= "       INNER JOIN manifiesto_exp_pieza_assn m ";
            $strCadeSqlx .= "    ON gp.id = m.guia_pieza_id ";
            $strCadeSqlx .= " WHERE m.manifiesto_exp_id = %s ";


            // Setup the SQL Query
            $strQuery = sprintf($strCadeSqlx, $strParam1);

            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strQuery);
            return Guias::InstantiateDbResult($objDbResult);
        }

        public static function LoadArrayByManifiestoImp($strParam1,  $objOptionalClauses=null) {

            // Performing the load manually (instead of using QCubed Query)

            // Get the Database Object for this Class
            $objDatabase = GuiaPiezas::GetDatabase();

            // Properly Escape All Input Parameters using Database->SqlVariable()
            $strParam1 = $objDatabase->SqlVariable($strParam1);

            $strCadeSqlx  = "SELECT gp.* ";
            $strCadeSqlx .= "  FROM nota_entrega ne ";
            $strCadeSqlx .= "       INNER JOIN guias g ";
            $strCadeSqlx .= "    ON ne.id = g.nota_entrega_id ";
            $strCadeSqlx .= "       INNER JOIN guia_piezas gp ";
            $strCadeSqlx .= "    ON g.id = gp.guia_id ";
            $strCadeSqlx .= " WHERE ne.id = %s ";

            //t('Query: '.$strCadeSqlx);

            // Setup the SQL Query
            $strQuery = sprintf($strCadeSqlx, $strParam1);

            //t('Query: '.$strQuery);

            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strQuery);

            $arrIdxxPiez = [];
            while ($mixRegistro = $objDbResult->FetchArray()) {
                $arrIdxxPiez[] = $mixRegistro['id'];
            }

            return GuiaPiezas::QueryArray(
                QQ::AndCondition(
                    QQ::In(QQN::GuiaPiezas()->Id, $arrIdxxPiez)
                ),
                $objOptionalClauses
            );

            //return GuiaPiezas::InstantiateDbResult($objDbResult);
        }


        public function TransferirHistorico($intGuiaIdxx, ProcesoError $objProcEjec) {
		    //t('Transfiriendo pieza: '.$this->IdPieza);
		    $strTranInte = '';
		    $strTextMens = '';
            $intCantCkpt = 0;
            //-------------------------
            // Se transfiere la pieza
            //-------------------------
            try {
                $objPiezHist = new GuiaPiezasH();
                $objPiezHist->GuiaId      = $intGuiaIdxx; //$this->GuiaId;
                $objPiezHist->IdPieza     = $this->IdPieza;
                $objPiezHist->Kilos       = $this->Kilos;
                $objPiezHist->Libras      = $this->Libras;
                $objPiezHist->Largo       = $this->Largo;
                $objPiezHist->Alto        = $this->Alto;
                $objPiezHist->Ancho       = $this->Ancho;
                $objPiezHist->Volumen     = $this->Volumen;
                $objPiezHist->Descripcion = $this->Descripcion;
                $objPiezHist->PiesCub     = $this->PiesCub;
                $objPiezHist->MetrosCub   = $this->MetrosCub;
                $objPiezHist->HojaEntrega = $this->HojaEntrega;
                $objPiezHist->Ubicacion   = $this->Ubicacion;
                $objPiezHist->Save();
                //t('Pieza transferida');
                //---------------------------------------------
                // Se transfieren los checkpoints de la pieza
                //---------------------------------------------
                $arrCkptPiez = $this->GetPiezaCheckpointsAsPiezaArray();
                //t('Voy a transferir los checkpoints');
                foreach ($arrCkptPiez as $objCkptPiez) {
                    $strTranInte = $objCkptPiez->TransferirHistorico($objPiezHist->Id, $objProcEjec);
                    $intCantCkpt++;
                }
                $strTextMens  = ' | Checkpoints: '.$intCantCkpt;
                $strTextMens .= $strTranInte;
            } catch (Exception $e) {
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = 'Referencia: '.$this->IdPieza;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Transfiriendo Pieza al Historico';
                GrabarError($arrParaErro);
            }
            return $strTextMens;

        }


        public function logDeCambios($strMensTran) {
            $arrLogxCamb['strNombTabl'] = 'GuiaPiezas';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->IdPieza;
            $arrLogxCamb['strDescCamb'] = $strMensTran;
            $arrLogxCamb['strEnlaEnti'] = '';
            LogDeCambios($arrLogxCamb);
        }

        public function GuiaTransportista() {
            $strGuiaTran = $this->IdPieza;
            $objGuiaTran = GuiaTransportista::LoadByGuiaPiezaId($this->Id);
            if ($objGuiaTran) {
                $strGuiaTran = $objGuiaTran->Guia;  // Secuencia Propia del Transportista
            }
            return $strGuiaTran;
        }

		public function POD() {
            $objPodxPiez = null;

		    if ($this->tieneCheckpoint('OK')) {

                $objPodxPiez = new stdClass();
                $objPodxPiez->EntregadoA = '';
                $objPodxPiez->Cedula     = '';
                $objPodxPiez->Fecha      = '';
                $objPodxPiez->Hora       = '';

		        $objCkptPodx = $this->ElCheckpoint('OK');
		        $arrDatoCome = explode('|',$objCkptPodx->Comentario);
		        if (isset($arrDatoCome[0])) {
                    $objPodxPiez->EntregadoA = $arrDatoCome[0];
                }
                if (isset($arrDatoCome[1])) {
                    $objPodxPiez->Cedula = $arrDatoCome[1];
                }
                if (isset($arrDatoCome[2])) {
                    $objPodxPiez->Fecha = $arrDatoCome[2];
                }
                if (isset($arrDatoCome[3])) {
                    $objPodxPiez->Hora = $arrDatoCome[3];
                }
            }

		    return $objPodxPiez;
        }

		public function OtrasPiezasDeLaMismaGuia() {
		    $arrOtraPiez = [];
		    $arrPiezGuia = $this->Guia->GetGuiaPiezasAsGuiaArray();
            foreach ($arrPiezGuia as $objPiezGuia) {
                if ($objPiezGuia->Id != $this->Id) {
                    $arrOtraPiez[] = $objPiezGuia;
                }
		    }
		    return $arrOtraPiez;
        }

        public static function EnEstaUbicacion($strEstaUbic) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaPiezas()->Ubicacion,trim($strEstaUbic));
            $arrPiezUbic   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
            $arrGuiaIdxx   = [];
            foreach ($arrPiezUbic as $objPiezUbic) {
                $arrGuiaIdxx[] = $objPiezUbic->GuiaId;
            }
            return $arrGuiaIdxx;
        }

        public static function EnAlmacen() {
            // $objClauWher   = QQ::Clause();
            // $objClauWher[] = QQ::Like(QQN::GuiaPiezas()->LastCkptCode,'IA');
            // $arrPiezUbic   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher));
            // $arrGuiaIdxx   = [];
            // foreach ($arrPiezUbic as $objPiezUbic) {
            //     $arrGuiaIdxx[] = $objPiezUbic->GuiaId;
            // }
            return GuiaPiezas::WhichLastCheckpointIs('IA');
        }

        public static function WhichLastCheckpointIs($strCodiCkpt) {
            $objClauSele = QQ::Select(QQN::GuiaPiezas()->GuiaId);
            $arrPiezCkpt = GuiaPiezas::LoadArrayByLastCkptCode($strCodiCkpt, $objClauSele);
            $arrGuiaIdxx = [];
            foreach ($arrPiezCkpt as $objPiezCkpt) {
                $arrGuiaIdxx[] = $objPiezCkpt->GuiaId;
            }
            return $arrGuiaIdxx;
        }

        // public static function WhichLastCheckpointIs($strCodiCkpt) {
        //     $objClauSele   = QQ::Select(QQN::GuiaPiezas()->GuiaId);
        //     $objClauWher   = QQ::Clause();
        //     $objClauWher[] = QQ::Equal(QQN::GuiaPiezas()->LastCkptCode,$strCodiCkpt);
        //     $arrPiezCkpt   = GuiaPiezas::QueryArray(
        //         QQ::AndCondition($objClauWher),
        //         QQ::Clause(
        //             $objClauSele,
        //             QQ::Distinct()
        //         )
        //     );
        //     $arrGuiaIdxx = [];
        //     foreach ($arrPiezCkpt as $objPiezCkpt) {
        //         $arrGuiaIdxx[] = $objPiezCkpt->GuiaId;
        //     }
        //     return $arrGuiaIdxx;
        // }

        public static function LoadArrayPorRecibirEnAlmacen($intManiIdxx, $objOptionalClauses=null) {
            // Performing the load manually (instead of using QCubed Query)

            // Get the Database Object for this Class
            $objDatabase = GuiaPiezas::GetDatabase();

            // Properly Escape All Input Parameters using Database->SqlVariable()
            $strParam1 = $objDatabase->SqlVariable($intManiIdxx);

            // Setup the SQL Query
            $strQuery = sprintf('
				SELECT 
					*
				FROM
					v_por_recibir_en_almacen AS `por_recibir_en_almacen`
				WHERE
					nota_entrega_id = %s',
                $strParam1);

            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strQuery);
            return GuiaPiezas::InstantiateDbResult($objDbResult);
        }

        public static function LoadArrayAptasParaTrasladar($intCodiClie, $objOptionalClauses=null) {
            // Performing the load manually (instead of using QCubed Query)

            // Get the Database Object for this Class
            $objDatabase = GuiaPiezas::GetDatabase();

            // Properly Escape All Input Parameters using Database->SqlVariable()
            $strParam1 = $objDatabase->SqlVariable($intCodiClie);

            // Setup the SQL Query
            $strQuery = sprintf('
				SELECT 
					*
				FROM
					v_aptas_para_trasladar AS `aptas_para_trasladar`
				WHERE
					cliente_corp_id = %s ',
                $strParam1);

            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strQuery);
            return GuiaPiezas::InstantiateDbResult($objDbResult);
        }

        public function ultimoCheckpointTodo() {
            $mixRegistro  = [];
            $strCadeSqlx  = 'select pc.* ';
            $strCadeSqlx .= '  from v_last_pieza_checkpoint lpc inner join pieza_checkpoints pc';
            $strCadeSqlx .= '    on lpc.id = pc.id';
            $strCadeSqlx .= ' where pc.pieza_id = '.$this->Id;
            $objDatabase  = GuiaPiezas::GetDatabase();
            $objDbResult  = $objDatabase->Query($strCadeSqlx);
            while ($mixRegistro = $objDbResult->FetchArray()) {
                return $mixRegistro;
                break;
            }
            return $mixRegistro;
        }

        public function ultimoCheckpoint() {
            $strUltiCkpt  = null;
            $strCadeSqlx  = 'select codigo_ckpt ';
            $strCadeSqlx .= '  from v_last_checkpoint_guia ';
            $strCadeSqlx .= ' where pieza_id = '.$this->Id;
            $objDatabase  = GuiaPiezas::GetDatabase();
            $objDbResult  = $objDatabase->Query($strCadeSqlx);
            while ($mixRegistro = $objDbResult->FetchArray()) {
                $strUltiCkpt = $mixRegistro['codigo_ckpt'];
                break;
            }
            return $strUltiCkpt;
        }

        public function ultimoCheckpointEnSucursal($intCodiSucu) {
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::Equal(QQN::PiezaCheckpoints()->Id, $this->intId);
            $objClausula[] = QQ::Equal(QQN::PiezaCheckpoints()->SucursalId, $intCodiSucu);
            $objOtraClau[] = QQ::OrderBy(QQN::PiezaCheckpoints()->Id,false);
            $objOtraClau[] = QQ::LimitInfo(1);
            $arrGuiaCkpt   = PiezaCheckpoints::QueryArray(QQ::AndCondition($objClausula),$objOtraClau);
            return (count($arrGuiaCkpt)) ? $arrGuiaCkpt[0]->Checkpoint->Codigo : null;
        }

        /**
         * Esta rutina devuelve la cantidad de veces que la pieza ha salido a ruta
         *
         * @return integer
         */
        public function cantidadDeDespachos()
        {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->PiezaId,$this->Id);
            $objClauWher[] = QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo,'ER');
            $intCantDesp   = PiezaCheckpoints::QueryCount(QQ::AndCondition($objClauWher));
            return $intCantDesp;
        }

        public function tieneCheckpointEnSucursal($intCodiCkpt,$intCodiSucu) {
            // This will return a count of Guia objects
            return PiezaCheckpoints::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::PiezaCheckpoints()->PiezaId, $this->Id),
                    QQ::Equal(QQN::PiezaCheckpoints()->CheckpointId, $intCodiCkpt),
                    QQ::Equal(QQN::PiezaCheckpoints()->SucursalId, $intCodiSucu)
                )
            );
        }

        public function tieneCheckpointDeCierre() {
            // This will return a count of Guia objects
            return PiezaCheckpoints::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::PiezaCheckpoints()->PiezaId, $this->Id),
                    QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Terminal,1)
                )
            );
        }

        public function checkpointsDeCierre() {
            return PiezaCheckpoints::QueryArray(
                QQ::AndCondition(
                    QQ::Equal(QQN::PiezaCheckpoints()->PiezaId, $this->Id),
                    QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Terminal,1)
                )
            );
        }

        public function tieneCheckpoint($strCodiCkpt) {
            return PiezaCheckpoints::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::PiezaCheckpoints()->PiezaId, $this->Id),
                    QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo, $strCodiCkpt)
                )
            );
        }

        public function ElCheckpoint($strCodiCkpt) {
            $arrCkptPiez = PiezaCheckpoints::QueryArray(
                QQ::AndCondition(
                    QQ::Equal(QQN::PiezaCheckpoints()->PiezaId, $this->Id),
                    QQ::Equal(QQN::PiezaCheckpoints()->Checkpoint->Codigo, $strCodiCkpt)
                ),
                QQ::OrderBy(QQN::PiezaCheckpoints()->Id,false)
            );
            if (count($arrCkptPiez) > 0) {
                return $arrCkptPiez[0];
            } else {
                return null;
            }
        }


        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of GuiaPiezas objects
			return GuiaPiezas::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GuiaPiezas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single GuiaPiezas object
			return GuiaPiezas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GuiaPiezas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of GuiaPiezas objects
			return GuiaPiezas::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Param1, $strParam1),
					QQ::Equal(QQN::GuiaPiezas()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`guia_piezas`.*
				FROM
					`guia_piezas` AS `guia_piezas`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return GuiaPiezas::InstantiateDbResult($objDbResult);
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