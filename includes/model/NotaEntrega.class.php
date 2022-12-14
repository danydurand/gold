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

		public function __adelantado() {
            $strUltiCkpt = $this->ultimoCheckpoint()->Checkpoint->Codigo;
            $strEstaAdel = ( ($this->Recibidas > 0) && ($strUltiCkpt != 'CR')) ? boldRed('SI') : '';
			return $strEstaAdel;
		}

        public function __link() {
            $strTextLink = $this->Referencia.' ('.$this->Id.')';
            $strLinkMani = '<a href=' . __SIST__ . '/nota_entrega_edit.php/' . $this->Id . ' 
                    style="color: #0d6aad; text-decoration: none" >'.$strTextLink.'</a>';
            return $strLinkMani;
        }

		public static function RecibirPiezas($intIdxxProc) {
            $strNombProc = 'Recibiendo Piezas del Proceso: '.$intIdxxProc;
            t($strNombProc);
            $objProcEjec = ProcesoError::Load($intIdxxProc);
            $objCkptMani = Checkpoints::LoadByCodigo('RA');
            $intContCkpt = 0;
            $intCantSobr = 0;
            $blnHayxErro = false;
            $arrNumePiez = PiezaRecibida::LoadArrayByProcesoErrorId($intIdxxProc);
            t('Hay: '.count($arrNumePiez).' piezas asociadas el proceso');
            foreach ($arrNumePiez as $objPiezReci) {
                $strPiezReci = $objPiezReci->IdPieza;
                t("Procesando: ".$strPiezReci);
                $objGuiaPiez = GuiaPiezas::LoadByIdPieza($strPiezReci);
                if (!$objGuiaPiez) {
                    $blnHayxErro = true;
                    $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $strPiezReci;
                    $arrParaErro['MensErro'] = 'Sobrante';
                    $arrParaErro['ComeErro'] = 'Chequeando la existencia de la Pieza';
                    GrabarError($arrParaErro);

                    $intCantSobr ++;
                    t('La pieza no existe, es un sobrante');
                    continue;
                }
                //t('La pieza existe en la BD');
                //----------------------------------------------------------
                // Se registra el checkpoint correspondiente para la pieza
                //----------------------------------------------------------
                $arrDatoCkpt = array();
                $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
                $arrDatoCkpt['GuiaAnul'] = false;
                $arrDatoCkpt['CodiCkpt'] = $objCkptMani->Id;
                $arrDatoCkpt['TextCkpt'] = $objCkptMani->Descripcion;
                $arrDatoCkpt['CodiRuta'] = '';
                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);

                if ($arrResuGrab['TodoOkey']) {
                    $intContCkpt++;
                    //-------------------------------------------------
                    // La pieza se marca como efectivamente recibida
                    //-------------------------------------------------
                    $objPiezReci->IsRecibida = true;
                    $objPiezReci->Save();
                } else {
                    $strMensUsua = "Error grabando ckpt RA a la pieza: " . $objGuiaPiez->IdPieza;
                    $strMensUsua .= " - " . $arrResuGrab['MotiNook'];

                    $blnHayxErro = true;
                    $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $objGuiaPiez->IdPieza;
                    $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                    $arrParaErro['ComeErro'] = 'Grabando Ckpt RA a la Pieza';
                    GrabarError($arrParaErro);

                    t($strMensUsua);
                }
            }
            $strTextMens = "Total Recibidas: $intContCkpt | Cantidad de Sobrantes: $intCantSobr";
            //-------------------------------------------------------------------
            // Ahora, se actualiza la cantidad de Recibidas de cada manifiesto
            //-------------------------------------------------------------------
            $blnSecuEstr = Parametros::BuscarParametro('SECUESTR','MATCSCAN','Val1',false);
            $arrIdxxMani = [];
            if ($blnSecuEstr) {
                //----------------------------------------------------------------------------------------
                // Los Manifestos a procesar, ser??n estrictamente aquellos que hayan sido Nacionalizados
                //----------------------------------------------------------------------------------------
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::NotaEntregaCkpt()->Checkpoint->Codigo,'CR');
                $objClauSele   = QQ::Select(QQN::NotaEntregaCkpt()->ContainerId);
                $arrManiNaci   = NotaEntregaCkpt::QueryArray(
                    QQ::AndCondition($objClauWher),
                    QQ::Clause(
                        $objClauSele,
                        QQ::Distinct()
                    ));
                $arrIdxxMani   = [];
                foreach ($arrManiNaci as $objManiNaci) {
                    $arrIdxxMani[] = $objManiNaci->ContainerId;
                }
            }
            $objClauWher = QQ::Clause();
            if ($blnSecuEstr) {
                $objClauWher[] = QQ::In(QQN::NotaEntrega()->Id,$arrIdxxMani);
            }
            $objClauWher[] = QQ::NotEqual(QQN::NotaEntrega()->Piezas,QQN::NotaEntrega()->Recibidas);
            $objClauWher[] = QQ::GreaterThan(QQN::NotaEntrega()->Procesadas,0);
            $arrManiPend   = NotaEntrega::QueryArray(QQ::AndCondition($objClauWher));

            foreach ($arrManiPend as $objManiPend) {
                t('Voy a contar y actualizar las piezas del Manifiesto: '.$objManiPend->Referencia);
                $objManiPend->ContarActualizarRecibidas();
                //---------------------------------------
                // Se graba el checkpoint al Manifiesto
                //---------------------------------------
                if ($objManiPend->Recibidas > 0) {
                    t('Se recibieron: '.$objManiPend->Recibidas.' voy a grabar el checkpoint al Manif');
                    $arrResuGrab = $objManiPend->GrabarCheckpoint($objCkptMani, $objProcEjec);
                    if (!$arrResuGrab['TodoOkey']) {
                        $blnHayxErro = true;
                        $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = $objManiPend->Referencia;
                        $arrParaErro['MensErro'] = $arrResuGrab['MotiNook'];
                        $arrParaErro['ComeErro'] = 'Grabando Ckpt al Manifiesto';
                        GrabarError($arrParaErro);

                        t('Error: '.$arrResuGrab['MotiNook']);
                    }
                }
            }
            return [$strTextMens,$blnHayxErro];
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
//                    $this->RedactarEmailCkptMani($objCkptMani,$arrResuGrab['CkptMani']);
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
            $objDatabase  = NotaEntrega::GetDatabase();
            try {
                $strCadeSqlx  = "call spu_qty_received_from_manifest($this->Id, @cant_reci)";
                $objDbResult  = $objDatabase->NonQuery($strCadeSqlx);
                $strCadeSqlx  = "SELECT @cant_reci";
                $objDbResult  = $objDatabase->Query($strCadeSqlx);
                $mixRegistro  = $objDbResult->FetchArray();
                $this->Recibidas = $mixRegistro['@cant_reci'];
                if ($this->Recibidas > 0) {
                    if ($this->Estatus == 'CREAD@') {
                        $this->Estatus = 'RECIBID@';
                        $strMensTran = 'Manifiesto RECIBID@';
                        $this->logDeCambios($strMensTran);
                    }
                }
                $this->Save();
            } catch (Exception $e) {
                t('Error en ContarActualizarRecibidas: ' . $e->getMessage());
            }
        }

        /*
		public function ContarActualizarRecibidas() {
            //-----------------------------------------------------------------------------------
            // Se identifican las piezas y se verifica cuantas han sido Recibidas en el Almacen
            //-----------------------------------------------------------------------------------
            $strCadeSqlx  = "select count(*) as cant_reci  ";
            $strCadeSqlx .= "  from guia_piezas gp inner join pieza_checkpoints pc ";
            $strCadeSqlx .= "    on gp.id = pc.pieza_id ";
            $strCadeSqlx .= " where gp.nota_entrega_id = ".$this->Id;
            $strCadeSqlx .= "   and pc.checkpoint_id = 1 ";
            
            $objDatabase  = NotaEntrega::GetDatabase();
            $objDbResult  = $objDatabase->Query($strCadeSqlx);
            $mixRegistro  = $objDbResult->FetchArray();
            $intCantReci  = $mixRegistro['cant_reci'];

            $this->Recibidas = $intCantReci;
            if ($this->Recibidas > 0) {
                if ($this->Estatus == 'CREAD@') {
                    $this->Estatus = 'RECIBID@';
                    $strMensTran = 'Manifiesto RECIBID@';
                    $this->logDeCambios($strMensTran);
                }
            }
            try {
                $this->Save();
            } catch (Exception $e) {
                t('Error en ContarActualizarRecibidas: '.$e->getMessage());
            }
        }
        */

		public function ContarActualizarRecibidasOld() {
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
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaPiezas()->Guia->NotaEntregaId,$this->Id);
            return GuiaPiezas::QueryCount(QQ::AndCondition($objClauWher));
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
            /*
            $arrGuiaNota = $this->GetGuiasArray();
            foreach ($arrGuiaNota as $objGuiaNota) {
                $objGuiaNota->FacturaId = $intFactIdxx;
                $objGuiaNota->Save();
            }
            */

            try {
                $objDatabase = self::GetDatabase();
                $strCadeSqlx = "call spu_asociate_awbs_to_bill($this->Id, $intFactIdxx)";
                $objDatabase->NonQuery($strCadeSqlx);
            } catch (Exception $e) {
                t('Error: '.$e->getMessage());
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

		public function desAsociandoNotaConFactura() {
		    t('Des-Asociando guias de la nde de la factura');
            //------------------------------------------------------------------------------------
            // Las guias de la Nota de Entrega, deben quedar desasociadas a la Factura indicada
            //------------------------------------------------------------------------------------
            /*
            $arrGuiaNota = $this->GetGuiasArray();
            if (isset($arrGuiaNota)) {
                t('Hay '.count($arrGuiaNota).' guias para procesar');
                foreach ($arrGuiaNota as $objGuiaNota) {
                    try {
                        $objGuiaNota->FacturaId = null;
                        $objGuiaNota->Save();
                    } catch (Exception $e) {
                        t('Error: '.$e->getMessage());
                    }
                }
            }
            */

            $objDatabase = self::GetDatabase();
            $strCadeSqlx = "call spu_asociate_awbs_to_bill($this->Id, null)";
            $objDatabase->NonQuery($strCadeSqlx);

            //-------------------------------------------------------------------
            // La Nota de Entrega como tal, tambien queda enlazada a la Factura
            //-------------------------------------------------------------------
            t('Des-Asociando la nde de la factura');
            try {
                $this->FacturaId = null;
                $this->Estatus = 'RECIBID@';
                $this->Save();
            } catch (Exception $e) {
                t('Error: '.$e->getMessage());
            }
            t('Terminando la des-asociacion');
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

        public function acumularEnNotaConceptos(Guias $objGuiaNota, ProcesoError $objProcEjec) {
            $arrConcGuia = $objGuiaNota->GetGuiaConceptosAsGuiaArray();
            $intManiIdxx = $this->Id;
            foreach ($arrConcGuia as $objConcGuia) {
                $intConcIdxx = $objConcGuia->ConceptoId;
                $strTipoConc = $objConcGuia->Tipo;
                $mixValoConc = is_numeric($objConcGuia->Valor) ? $objConcGuia->Valor : 0;
                $decMontConc = $objConcGuia->Monto;
                $strMostComo = $objConcGuia->MostrarComo;
                $strExplCalc = 'Acumulando las guias asociadas';
                //-----------------------------------------------------------------------------------
                // La tabla nota_conceptos se usa para acumular el importe, de cada concepto
                // asociado a una nota de entrega
                //-----------------------------------------------------------------------------------
                $strCadeSqlx  = "insert ";
                $strCadeSqlx .= "  into nota_conceptos ";
                $strCadeSqlx .= "       (nota_entrega_id, concepto_id, tipo, valor, monto,";
                $strCadeSqlx .= "       mostrar_como, explicacion) ";
                $strCadeSqlx .= "values ($intManiIdxx,$intConcIdxx,'$strTipoConc',$mixValoConc,$decMontConc,";
                $strCadeSqlx .= "'$strMostComo','$strExplCalc') ";
                $strCadeSqlx .= "on duplicate key update monto = monto + $decMontConc";
                $objDatabase  = self::GetDatabase();
                try {
                    $objDatabase->NonQuery($strCadeSqlx);
                } catch (Exception $e) {
                    t('SQL Upsert: '.$strCadeSqlx);
                    t('Error: '.$e->getMessage());
                    $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = $objGuiaNota->Tracking;
                    $arrParaErro['MensErro'] = $e->getMessage();
                    $arrParaErro['ComeErro'] = 'upsert en la tabla nota_concepto';
                    GrabarError($arrParaErro);
                }
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
                // t('Procesando la guia: '.$objGuiaNota->Tracking);
                $objGuiaNota->calcularTodoLosConceptos($arrConcCalc);
                //-------------------------------------------
                // Acmulado de la Nota de Entrega por Zona
                //-------------------------------------------
                $this->acumularEnLaZona($objGuiaNota, $objProcEjec);
                //--------------------------------------------------------------------
                // La nde se actualiza con los conceptos recien caculados de la guia
                //--------------------------------------------------------------------
                $this->acumularEnNotaConceptos($objGuiaNota, $objProcEjec);
            }
            //-----------------------------------
            // Se actualiza el total de la NDE
            //-----------------------------------
            $this->Total = NotaEntregaZona::TotalDeLaNota($this->Id);
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