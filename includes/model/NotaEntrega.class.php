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

        public function TransferirHistorico(ProcesoError $objProcEjec) {
		    //t('Transfiriendo Manif Referencia: '.$this->Referencia);
		    $strTextMens = '';
		    $strTranInte = '';
            $intCantGuia = 0;
            //------------------------------
            // Se transfiere el Manifiesto
            //------------------------------
            try {
                $objManiHist = new NotaEntregaH();
                $objManiHist->ClienteCorpId       = $this->ClienteCorpId;
                $objManiHist->Referencia          = $this->Referencia;
                $objManiHist->NombreArchivo       = $this->NombreArchivo;
                $objManiHist->Estatus             = $this->Estatus;
                $objManiHist->ServicioImportacion = $this->ServicioImportacion;
                $objManiHist->Facturable          = $this->Facturable;
                $objManiHist->EnKilos             = $this->EnKilos;
                $objManiHist->CargaRecibida       = $this->CargaRecibida;
                $objManiHist->Cargadas            = $this->Cargadas;
                $objManiHist->PorProcesar         = $this->PorProcesar;
                $objManiHist->PorCorregir         = $this->PorCorregir;
                $objManiHist->Procesadas          = $this->Procesadas;
                $objManiHist->Recibidas           = $this->Recibidas;
                $objManiHist->Sobrantes           = $this->Sobrantes;
                $objManiHist->Libras              = $this->Libras;
                $objManiHist->Kilos               = $this->Kilos;
                $objManiHist->PiesCub             = $this->PiesCub;
                $objManiHist->Volumen             = $this->Volumen;
                $objManiHist->Piezas              = $this->Piezas;
                $objManiHist->Fecha               = $this->Fecha;
                $objManiHist->Hora                = $this->Hora;
                $objManiHist->UsuarioId           = $this->UsuarioId;
                $objManiHist->TarifaId            = $this->TarifaId;
                $objManiHist->FacturaId           = $this->FacturaId;
                $objManiHist->Total               = $this->Total;
                $objManiHist->ValorDeclarado      = $this->ValorDeclarado;
                $objManiHist->Observacion         = $this->Observacion;
                $objManiHist->RelacionSobrantes   = $this->RelacionSobrantes;
                $objManiHist->CreatedBy           = $this->CreatedBy;
                $objManiHist->UpdatedBy           = $this->UpdatedBy;
                $objManiHist->DeletedBy           = $this->DeletedBy;
                $objManiHist->Save();
                //t('Manifiesto Transferido');
                //------------------------------------------
                // Se transfieren las guias del Manifiesto
                //------------------------------------------
                $arrGuiaMani = $this->GetGuiasArray();
                //t('Voy a transferir las guias');
                foreach ($arrGuiaMani as $objGuiaMani) {
                    $strTranInte = $objGuiaMani->TransferirHistorico($objManiHist->Id, $objProcEjec);
                    $intCantGuia++;
                }
                $strTextMens  = 'Manifiesto Transferido | Guias transferidas: '.$intCantGuia;
                //$strTextMens .= $strTranInte;
            } catch (Exception $e) {
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = 'Referencia: '.$this->Referencia;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Transfiriendo Manifiesto al Historico';
                GrabarError($arrParaErro);
            }
            return $strTextMens;
        }


        public function GrabarCheckpoint(Checkpoints $objCkptMani, ProcesoError $objProcEjec, $strComeAdic=null) {
		    $arrResuGrab['TodoOkey'] = true;
		    $arrResuGrab['MotiNook'] = '';
		    $arrResuGrab['CkptMani'] = null;
            try {
                $strComeAdic = strlen($strComeAdic) > 0 ? ' ('.$strComeAdic.')' : '';
                $strDescCkpt = $objCkptMani->Descripcion.$strComeAdic;
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumeCont'] = $this->Id;
                $arrDatoCkpt['CodiCkpt'] = $objCkptMani->Id;
                $arrDatoCkpt['TextObse'] = $strDescCkpt;
                $arrResuGrab = GrabarCheckpointManifiesto($arrDatoCkpt);
                if ($arrResuGrab['TodoOkey']) {
                    $this->RedactarEmailCkptMani($objCkptMani,$arrResuGrab['CkptMani']);
                } else {
                    throw new Exception($arrResuGrab['MotiNook']);
                }
            } catch (Exception $e) {
                $strComeErro = 'Grabando Ckpt '.$objCkptMani->Codigo.' al Manifiesto';
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = 'Referencia: '.$this->Referencia;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = $strComeErro;
                GrabarError($arrParaErro);
                $arrResuGrab['TodoOkey'] = false;
                $arrResuGrab['MotiNook'] = $strComeErro;
            }
		    return $arrResuGrab;
        }

        protected function RedactarEmailCkptMani(Checkpoints $objCkptGrab, NotaEntregaCkpt $objCkptMani) {
            $blnNotiCkpt = false;
            $strDireMail = '';
            if (in_array($objCkptGrab->Codigo,['TI','CR'])) {
                $blnNotiCkpt = true;
                $strDireMail = Parametros::BuscarParametro('ESTAMANI',$objCkptGrab->Codigo,'Txt1','soporte@lufemansoftwware.com');
            }
            if ($blnNotiCkpt) {
                $strRefeMani = $objCkptMani->Container->Referencia;
                $objMessage = new QEmailMessage();
                $objMessage->From = 'GoldCoast - SisCO <noti@goldsist.com>';
                $objMessage->To = $strDireMail;
                $objMessage->Bcc = 'danydurand@gmail.com';
                $objMessage->Subject = 'Manif.: ' . $strRefeMani.' | Estatus: '.trim($objCkptGrab->Descripcion);

                // Also setup HTML message (optional)
                $strBody  = 'Estimado Usuario,<p><br>';
                $strBody .= 'Se ha registrado un cambio en el Estatus del Manifiesto Ref.: '.$strRefeMani.'<br><br>';
                $strBody .= 'Descripcion: <b>'.$objCkptMani->Observacion.'</b><br><br>';
                $strBody .= 'Fecha: <b>'.$objCkptMani->Fecha->__toString("DD/MM/YYYY").'</b><br>';
                $strBody .= 'Hora: <b>'.$objCkptMani->Hora.'</b><br>';
                $strBody .= 'Usuario: <b>'.$objCkptMani->Usuario->LogiUsua.'</b><br>';
                $objMessage->HtmlBody = $strBody;

                // Add random/custom email headers
                $objMessage->SetHeader('x-application', 'Sistema SisCO');

                // Send the Message (Commented out for obvious reasons)
                QEmailServer::Send($objMessage);
            }
        }

        public function ultimoCheckpoint() {
		    $objClauAdic   = QQ::Clause();
		    $objClauAdic[] = QQ::OrderBy(QQN::NotaEntregaCkpt()->Id,false);
		    $objClauAdic[] = QQ::LimitInfo(1);
            $arrCkptMani   = $this->GetNotaEntregaCkptAsContainerArray($objClauAdic);
            return count($arrCkptMani) > 0 ? $arrCkptMani[0] : null;
        }

		public function ContarActualizarRecibidas() {
            //-----------------------------------------------------------------------------------
            // Se identifican las piezas y se verifica cuantas han sido Recibidas en el Almacen
            //-----------------------------------------------------------------------------------
            $arrPiezMani = $this->piezasDeLaNota();
            $intCantReci = 0;
            foreach ($arrPiezMani as $objPiezMani) {
                if ($objPiezMani->tieneCheckpoint('RA')) {
                    $intCantReci++;
                }
            }
            $this->Recibidas = $intCantReci;
            if ($this->Recibidas > 0) {
                if ($this->Estatus == 'CREAD@') {
                    $this->Estatus = 'RECIBID@';
                    $strMensTran = 'Manifiesto RECIBID@';
                    $this->logDeCambios($strMensTran);
                }
            }
            $this->Save();
        }

		public static function AptasParaFacturarPorClienteYServicio($intClieIdxx,$strServImpo,$arrManiIdxx,$strFormResp='count') {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->ClienteCorpId,$intClieIdxx);
            $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->Estatus,'RECIBID@');
            $objClauWher[] = QQ::IsNull(QQN::NotaEntrega()->FacturaId);
            $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->ServicioImportacion,$strServImpo);
            $objClauWher[] = QQ::In(QQN::NotaEntrega()->Id,$arrManiIdxx);
            if ($strFormResp == 'count') {
                return NotaEntrega::QueryCount(QQ::AndCondition($objClauWher));
            } else {
                return NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
            }
        }

		public static function AptasParaFacturar($objClauWher,$strFormResp='count') {
            $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->Estatus,'RECIBID@');
            $objClauWher[] = QQ::IsNull(QQN::NotaEntrega()->FacturaId);
            $objClauWher[] = QQ::Equal(QQN::NotaEntrega()->Facturable,SinoType::SI);
            if ($strFormResp == 'count') {
                return NotaEntrega::QueryCount(QQ::AndCondition($objClauWher));
            } else {
                return NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));
            }
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

        public function cantidadDePiezas() {
            return count($this->piezasDeLaNota());
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

        public function borrarZonaAcumulada(ProcesoError $objProcEjec) {
            $objDatabase = self::GetDatabase();
            $strCadeSqlx  = "delete ";
            $strCadeSqlx .= "  from nota_entrega_zona ";
            $strCadeSqlx .= " where nota_entrega_id = ".$this->Id;
            try {
                $objDatabase->NonQuery($strCadeSqlx);
            } catch (Exception $e) {
                t('SQL Delete: '.$strCadeSqlx);
                t('Error: '.$e->getMessage());
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $this->Referencia;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Borrando el acumulado por zona';
                GrabarError($arrParaErro);
            }
        }

        public function acumularEnLaZona(Guias $objGuiaProc, ProcesoError $objProcEjec) {
            $intManiIdxx = $this->Id;
            $intZonaIdxx = $objGuiaProc->Destino->Zona;
            $intCantPiez = $objGuiaProc->Piezas;
            $decCantKilo = $objGuiaProc->Kilos;
            $decCantPies = $objGuiaProc->PiesCub;
            $intTariIdxx = $objGuiaProc->TarifaAgenteId;

            $strServComp   = $objGuiaProc->ServicioImportacion == 'AER' ? 'AEREO' : 'MARITIMO';
            $decPesoPiez   = $strServComp == 'AEREO' ? $decCantKilo : $decCantPies;
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->TarifaId,$intTariIdxx);
            $objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->Zona,$intZonaIdxx);
            $objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->Servicio,$strServComp);
            $arrTariServ   = TarifaAgentesZonas::QueryArray(QQ::AndCondition($objClauWher));
            $objTariServ   = $arrTariServ[0];
            $decPrecZona   = $objTariServ->Precio;
            $decTotaZona   = $decPrecZona * $decPesoPiez;
            //-----------------------------------------------------------------------------------
            // La tabla nota_entrega_zona se usa para acumular el importe, las piezas y el peso
            // de la guia en la zona.  Esto sera utilizado en el desglose de la factura
            //-----------------------------------------------------------------------------------
            $strCadeSqlx  = "insert ";
            $strCadeSqlx .= "  into nota_entrega_zona ";
            $strCadeSqlx .= "values ($intManiIdxx,$intZonaIdxx,$intCantPiez,$decCantKilo,$decCantPies,";
            $strCadeSqlx .= "$decPrecZona,$decTotaZona) ";
            $strCadeSqlx .= "on duplicate key update piezas = piezas + $intCantPiez,";
            $strCadeSqlx .= "                        kilos = kilos + $decCantKilo,";
            $strCadeSqlx .= "                        pies_cub = pies_cub + $decCantPies,";
            $strCadeSqlx .= "                        total = total + $decTotaZona;";
            $objDatabase  = self::GetDatabase();
            try {
                $objDatabase->NonQuery($strCadeSqlx);
            } catch (Exception $e) {
                t('SQL Upsert: '.$strCadeSqlx);
                t('Error: '.$e->getMessage());
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = $objGuiaProc->Tracking;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'upsert en la tabla nota_entrega_zona';
                GrabarError($arrParaErro);
            }
        }


        public function calcularTodoLosConceptos($arrConcCalc) {
            t('===============================');
            t('Calculando conceptos de la NDE: '.$this->Id);
            $strNombProc = 'Calculando conceptos de la NDE: '.$this->Id;
            $objProcEjec = CrearProceso($strNombProc,true);
            t('1ero se eliminan los conceptos existentes asociados a la NDE');
            $this->borrarConceptos();
            $this->borrarZonaAcumulada($objProcEjec);
            //----------------------------------------------------------------------
            $arrGuiaNota = $this->GetGuiasArray();
            t('Cant de guias a procesar de esa nde: '.count($arrGuiaNota));
            $decTotaNdex = 0;
            foreach ($arrGuiaNota as $objGuiaNota) {
                t('Procesando la guia: '.$objGuiaNota->Tracking);
                $objGuiaNota->calcularTodoLosConceptos($arrConcCalc);
                $decTotaNdex += $objGuiaNota->Total;
                //-------------------------------------------
                // Acmulado de la Nota de Entrega por Zona
                //-------------------------------------------
                $this->acumularEnLaZona($objGuiaNota,$objProcEjec);
                //--------------------------------------------------------------------
                // La nde se actualiza con los conceptos recien caculados de la guia
                //--------------------------------------------------------------------
                $arrConcGuia = $objGuiaNota->GetGuiaConceptosAsGuiaArray();
                foreach ($arrConcGuia as $objConcGuia) {
                    $objConcNota = NotaConceptos::LoadByNotaEntregaIdConceptoId($this->Id,$objConcGuia->ConceptoId);
                    //t('Concepto de la Nota: '.$objConcNota->Id);
                    try {
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
                            $objConcNota->Monto += $objConcGuia->Monto;
                        }
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
            t('El total de la nde fue actualizado con: '.$decTotaNdex);
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