<?php
	require(__MODEL_GEN__ . '/GuiasGen.class.php');

	/**
	 * The Guias class defined here contains any
	 * customized code for the Guias class in the
	 * Object Relational Model.  It represents the "guias" table
	 * in the database, and extends from the code generated abstract GuiasGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Guias extends GuiasGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objGuias->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strNumero);
		}

        public static function PiezasDeLasGuias($arrIdxxProc) {

		    $objClauWher   = QQ::Clause();
		    $objClauWher[] = QQ::In(QQN::GuiaPiezas()->GuiaId, $arrIdxxProc);
		    $objClauOrde   = QQ::Clause();
		    $objClauOrde[] = QQ::OrderBy(QQN::GuiaPiezas()->GuiaId);
		    $arrPiezGuia   = GuiaPiezas::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
            return $arrPiezGuia;
		}

        public static function AptasParaFacturarPorAliadoYServicio($intAliaIdxx,$strServImpo,$arrGuiaIdxx,$strFormResp='count') {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Guias()->ClienteCorpId,$intAliaIdxx);
            $objClauWher[] = QQ::IsNull(QQN::Guias()->FacturaId);
            $objClauWher[] = QQ::Equal(QQN::Guias()->Producto->Codigo,$strServImpo);
            $objClauWher[] = QQ::In(QQN::Guias()->Id,$arrGuiaIdxx);
            if ($strFormResp == 'count') {
                return Guias::QueryCount(QQ::AndCondition($objClauWher));
            } else {
                return Guias::QueryArray(QQ::AndCondition($objClauWher));
            }
        }

        public static function AptasParaFacturar($objClauWher,$strFormResp='count') {
            $objClauWher[] = QQ::IsNull(QQN::Guias()->FacturaId);
            if ($strFormResp == 'count') {
                return Guias::QueryCount(QQ::AndCondition($objClauWher));
            } else {
                $objClauOrde = QQ::OrderBy(QQN::Guias()->Id,false);
                return Guias::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
            }
        }


        public function __printName() {
		    return '/var/www/html/gold/retail/tmp/Guia'.$this->Numero.'.pdf';
        }

        public function __AltoPl() {
            return ($this->Alto / 2.54);
        }

        public function __AnchoPl() {
            return ($this->Ancho / 2.54);
        }

        public function __LargoPl() {
            return ($this->Largo / 2.54);
        }

        public function __medidasPl() {
            return nf($this->__AltoPl()).' x '.nf($this->__AnchoPl()).' x '.nf($this->__LargoPl());
        }



        public function __medidas() {
		    return $this->Alto.' x '.$this->Ancho.' x '.$this->Largo;
        }


        public function borrarConceptosOpcionales() {
            $this->DeleteAllGuiaConceptosOpcionalesesAsGuia();
        }


        public function AsociarConceptoOpcional($intConcOpci, $intUsuaIdxx){
		    try {
                $objConcOpci = new GuiaConceptosOpcionales();
                $objConcOpci->GuiaId     = $this->Id;
                $objConcOpci->ConceptoId = $intConcOpci;
                $objConcOpci->CreatedBy  = $intUsuaIdxx;
                $objConcOpci->UpdatedBy  = $intUsuaIdxx;
                $objConcOpci->CreatedAt  = new QDateTime(QDateTime::Now);
                $objConcOpci->UpdatedAt  = new QDateTime(QDateTime::Now);
                $objConcOpci->Save();
                $objConcOpci->logDeCambios('Creado');
                $strTextMens = 'OK';
		    } catch (Exception $e) {
		        t('Error: '.$e->getMessage());
		        $strTextMens = $e->getMessage();
		    }
		    return $strTextMens;
        }


		public function ResumenDeEntrega() {
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
            $arrPiezMani = $this->GetGuiaPiezasAsGuiaArray();
            foreach ($arrPiezMani as $objPiezMani) {
                if ($objPiezMani->tieneCheckpoint($strCodiCkpt)) {
                    $intCantPiez++;
                }
            }
            return $intCantPiez;
        }

        public function TransferirHistorico($intManiIdxx, ProcesoError $objProcEjec) {
		    //t('Transfiriendo Guia Nro: '.$this->Tracking);
		    $strTranInte = '';
		    $strTextMens = '';
            $intCantPiez = 0;
            //-------------------------
            // Se transfiere la Guia
            //-------------------------
            try {
                $objGuiaHist = new GuiasH();
                $objGuiaHist->Numero                = $this->Numero;
                $objGuiaHist->Tracking              = $this->Tracking;
                $objGuiaHist->Fecha                 = $this->Fecha;
                $objGuiaHist->ClienteRetailId       = $this->ClienteRetailId;
                $objGuiaHist->ClienteCorpId         = $this->ClienteCorpId;
                $objGuiaHist->ClienteIntId          = $this->ClienteIntId;
                $objGuiaHist->OrigenId              = $this->OrigenId;
                $objGuiaHist->DestinoId             = $this->DestinoId;
                $objGuiaHist->ServicioEntrega       = $this->ServicioEntrega;
                $objGuiaHist->ServicioImportacion   = $this->ServicioImportacion;
                $objGuiaHist->ProductoId            = $this->ProductoId;
                $objGuiaHist->FormaPago             = $this->FormaPago;
                $objGuiaHist->NombreRemitente       = $this->NombreRemitente;
                $objGuiaHist->TelefonoRemitente     = $this->TelefonoRemitente;
                $objGuiaHist->DireccionRemitente    = $this->DireccionRemitente;
                $objGuiaHist->TelefonoRemitente     = $this->TelefonoRemitente;
                $objGuiaHist->NombreDestinatario    = $this->NombreDestinatario;
                $objGuiaHist->TelefonoDestinatario  = $this->TelefonoDestinatario;
                $objGuiaHist->DireccionDestinatario = $this->DireccionDestinatario;
                $objGuiaHist->TelefonoDestinatario  = $this->TelefonoDestinatario;
                $objGuiaHist->Contenido             = $this->Contenido;
                $objGuiaHist->Piezas                = $this->Piezas;
                $objGuiaHist->ValorDeclarado        = $this->ValorDeclarado;
                $objGuiaHist->TipoExport            = $this->TipoExport;
                $objGuiaHist->Asegurado             = $this->Asegurado;
                $objGuiaHist->Total                 = $this->Total;
                $objGuiaHist->Estado                = $this->Estado;
                $objGuiaHist->Ciudad                = $this->Ciudad;
                $objGuiaHist->CodigoPostal          = $this->CodigoPostal;
                $objGuiaHist->Tasa                  = $this->Tasa;
                $objGuiaHist->Ubicacion             = $this->Ubicacion;
                $objGuiaHist->VendedorId            = $this->VendedorId;
                $objGuiaHist->TarifaId              = $this->TarifaId;
                $objGuiaHist->TarifaId              = $this->TarifaId;
                $objGuiaHist->TarifaAgenteId        = $this->TarifaAgenteId;
                $objGuiaHist->ReceptoriaOrigenId    = $this->ReceptoriaOrigenId;
                $objGuiaHist->ReceptoriaDestinoId   = $this->ReceptoriaDestinoId;
                $objGuiaHist->Kilos                 = $this->Kilos;
                $objGuiaHist->Libras                = $this->Libras;
                $objGuiaHist->Largo                 = $this->Largo;
                $objGuiaHist->Ancho                 = $this->Ancho;
                $objGuiaHist->Alto                  = $this->Alto;
                $objGuiaHist->Volumen               = $this->Volumen;
                $objGuiaHist->PiesCub               = $this->PiesCub;
                $objGuiaHist->MetrosCub             = $this->MetrosCub;
                $objGuiaHist->CedulaDestinatario    = $this->CedulaDestinatario;
                $objGuiaHist->FacturaId             = $this->FacturaId;
                $objGuiaHist->GuiaPodId             = $this->GuiaPodId;
                $objGuiaHist->NotaEntregaId         = $intManiIdxx; //$this->NotaEntregaId;
                $objGuiaHist->Observacion           = $this->Observacion;
                $objGuiaHist->CreatedBy             = $this->CreatedBy;
                $objGuiaHist->UpdatedBy             = $this->UpdatedBy;
                $objGuiaHist->DeletedBy             = $this->DeletedBy;
                $objGuiaHist->Save();
                //t('Guia transferida');
                //---------------------------------------------
                // Se transfieren las piezas de la guia
                //---------------------------------------------
                $arrPiezGuia = $this->GetGuiaPiezasAsGuiaArray();
                //t('Voy a transferir las piezas');
                foreach ($arrPiezGuia as $objPiezGuia) {
                    $strTranInte = $objPiezGuia->TransferirHistorico($objGuiaHist->Id, $objProcEjec);
                    $intCantPiez++;
                }
                $strTextMens  = ' | Piezas: '.$intCantPiez;
                $strTextMens .= $strTranInte;
            } catch (Exception $e) {
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = 'Referencia: '.$this->Tracking;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Transfiriendo Guia al Historico';
                GrabarError($arrParaErro);
            }
            return $strTextMens;

        }

        public function __zona() {
            return Parametros::BuscarParametro('ZONA',$this->Destino->Zona,'Desc',$this->Destino->Zona);
        }

        public static function RomperRelacionConFactura($intIdxxFact) {
            $arrGuiaFact = Guias::LoadArrayByFacturaId($intIdxxFact);
            if (count($arrGuiaFact) > 0) {
                t('Rompiendo relacion con las guias de la factura con el Id: '.$intIdxxFact);
                foreach ($arrGuiaFact as $objGuiaFact) {
                    $objGuiaFact->FacturaId = null;
                    $objGuiaFact->Save();
                }
            }
        }

        public static function ConCheckpointRegistradoPor($strCodiCkpt,$intCodiUsua) {
		    /* @var $objPiezSele PiezaCheckpoints */
            $arrGuiaSele = [];
            $arrPiezSele = PiezaCheckpoints::ConCheckpointRegistradoPor($strCodiCkpt,$intCodiUsua);
            foreach ($arrPiezSele as $objPiezSele) {
                $arrGuiaSele[] = $objPiezSele->Pieza->GuiaId;
            }
            return $arrGuiaSele;
        }

        public static function ConCheckpointEnFechaInicial($strCodiCkpt,$dttFechInic) {
		    /* @var $objPiezSele PiezaCheckpoints */
            $arrGuiaSele = [];
            $arrPiezSele = PiezaCheckpoints::ConCheckpointEnFechaInicial($strCodiCkpt,$dttFechInic);
            foreach ($arrPiezSele as $objPiezSele) {
                $arrGuiaSele[] = $objPiezSele->Pieza->GuiaId;
            }
            return $arrGuiaSele;
        }

        public static function ConCheckpointEnFechaFinal($strCodiCkpt,$dttFechFina) {
            /* @var $objPiezSele PiezaCheckpoints */
            $arrGuiaSele = [];
            $arrPiezSele = PiezaCheckpoints::ConCheckpointEnFechaFinal($strCodiCkpt,$dttFechFina);
            foreach ($arrPiezSele as $objPiezSele) {
                $arrGuiaSele[] = $objPiezSele->Pieza->GuiaId;
            }
            return $arrGuiaSele;
        }

        public function __servImportacion() {
		    switch ($this->ServicioImportacion) {
                case 'AER':
                    return 'AEREO';
                case 'MAR':
                    return 'MARITIMO';
                default:
                    return 'AEREO';
            }
        }

        public function __servExportacion() {
		    switch ($this->Producto->Codigo) {
                case 'EXA':
                    return 'AEREO';
                case 'EXM':
                    return 'MARITIMO';
                default:
                    return 'AEREO';
            }
        }

        public function NroFactura() {
		    $strFactGuia = 'N/A';
            if (!is_null($this->FacturaId)) {
                $objFactGuia = Facturas::Load($this->FacturaId);
                if ($objFactGuia) {
                    if (!is_null($this->ClienteRetailId)) {
                        if (strlen($objFactGuia->Numero) > 0) {
                            $strFactGuia = $objFactGuia->Numero;
                        } else {
                            $strFactGuia = $objFactGuia->Referencia;
                        }
                    } else {
                        $strFactGuia = $objFactGuia->Referencia;
                    }
                }
            }
            return $strFactGuia;
        }

        public function estaAsegurado() {
            return $this->Asegurado;
		}

        public function pesoTarifa() {
            if ($this->ServicioImportacion == 'AER') {
                $decPesoComp = $this->Kilos;
            } else {
                $decPesoComp = $this->PiesCub;
            }
            return $decPesoComp;
        }

        public function flete_imp(Conceptos $concepto)
        {
            t('Rutina: flete_imp');
            $monto = 0;
            $texto = '';
            /* @var $objTariClie TarifaAgentes */
            $objTariClie = $this->ClienteCorp->TarifaAgente;
            $decPesoTari = $this->pesoTarifa();
            t('Peso usado p/calcular la Tarifa: '.$decPesoTari);
            if (is_null($this->TarifaAgenteId)) {
                $this->TarifaAgenteId = $objTariClie->Id;
                $this->Save();
                t('La guia no tenia tarifa, le acabo de asignar: '.$this->TarifaAgente->Nombre);
            }
            $intTariIdxx = $this->TarifaAgenteId;
            $strNombTari = $this->TarifaAgente->Nombre;
            $intZonaIdxx = $this->Destino->Zona;
            $strServImpo = $this->__servImportacion();
            t("Zona: $intZonaIdxx, Servicio: $strServImpo, Tarifa: $strNombTari ($intTariIdxx)");
            $objPrecTari = TarifaAgentesZonas::LoadByTarifaIdZonaServicio($intTariIdxx,$intZonaIdxx,$strServImpo);
            if ($objPrecTari) {
                if ($decPesoTari > 0) {
                    $precio = $objPrecTari->Precio;
                    $minimo = $objPrecTari->MinimoFacturable;
                    t('El minimo es: '.$minimo);
                    if ( ($minimo > 0) && ($decPesoTari < $minimo) ) {
                        t('Guia: '.$this->Tracking.' con peso menor al minimo: '.$decPesoTari);
                        $decPesoTari = $minimo;
                        t('El peso quedo en: '.$decPesoTari);
                    } else {
                        if ($minimo == 0) {
                            $decPesoTari = 0;
                            t('Minimo en cero, no se debe facturar');
                        }
                    }
                    $monto  = $precio * $decPesoTari;
                    $texto  = "Zona:$intZonaIdxx, Servicio:$strServImpo, Tarifa: $precio, Min Facturable: $minimo, ";
                    $texto .= "con peso: $decPesoTari, totaliza: $monto";
                    //t($texto);
                } else {
                    //t('Peso en Cero. No se factura');
                    $monto = 0;
                    $texto  = "Peso en Cero.  No se factura. Zona: $intZonaIdxx, Servicio: $strServImpo, Precio de Tarifa $strNombTari";
                }
            } else {
                $monto = 0;
                $texto  = "No hay Tarifa para Zona: $intZonaIdxx, Servicio: $strServImpo, Precio de Tarifa $strNombTari";
            }
            t($texto);

            return array($monto, $texto);
        }

        public function serv_recolecta(Conceptos $concepto) {
            t('Rutina: serv_recolecta');
            $monto = 0;
            $texto = '';
            /* @var $objTariClie TarifaAgentes */
            //------------------------------
            // Se asigna la tarifa publica
            //------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::TarifaAgentes()->EsPublica,true);
            $objTariPubl   = TarifaAgentes::QuerySingle(QQ::AndCondition($objClauWher));
            if (is_null($objTariPubl)) {
                $texto = 'No se ha definido la Tarifa Publica';
                return array($monto, $texto);
            }
            $decPesoTari = $this->pesoTarifa();
            t('El peso usado para calcular la Tarifa sera: '.$decPesoTari);
            if (is_null($this->TarifaAgenteId)) {
                $this->TarifaAgenteId = $objTariPubl->Id;
                $this->Save();
                t('La guia no tenia tarifa, le acabo de asignar: '.$this->TarifaAgente->Nombre);
            }
            $intTariIdxx = $this->TarifaAgenteId;
            $strNombTari = $this->TarifaAgente->Nombre;
            $intZonaIdxx = $this->Origen->Zona;
            $strOrigGuia = $this->Origen->Iata;
            $strServImpo = $this->__servExportacion();
            t("Origen: $strOrigGuia, Zona: $intZonaIdxx, Servicio: $strServImpo, Tarifa: $strNombTari ($intTariIdxx)");
            $objPrecTari = TarifaAgentesZonas::LoadByTarifaIdZonaServicio($intTariIdxx,$intZonaIdxx,$strServImpo);
            if ($objPrecTari) {
                if ($decPesoTari > 0) {
                    $precio = $objPrecTari->Precio;
                    $minimo = $objPrecTari->MinimoFacturable;
                    t('El minimo es: '.$minimo);
                    if ( ($minimo > 0) && ($decPesoTari < $minimo) ) {
                        t('Guia: '.$this->Tracking.' con peso menor al minimo: '.$decPesoTari);
                        $decPesoTari = $minimo;
                        t('El peso quedo en: '.$decPesoTari);
                    } else {
                        if ($minimo == 0) {
                            $decPesoTari = 0;
                            t('Minimo en cero, no se debe facturar');
                        }
                    }
                    $monto  = $precio * $decPesoTari;
                    $texto  = "Zona: $intZonaIdxx, Servicio: $strServImpo, Precio de Tarifa $strNombTari: $precio, Min Facturable: $minimo";
                    $texto .= "para un peso de: $decPesoTari, totaliza: $monto";
                } else {
                    t('Peso en Cero. No se factura');
                    $monto = 0;
                    $texto  = "Peso en Cero.  No se factura. Zona: $intZonaIdxx, Servicio: $strServImpo, Precio de Tarifa $strNombTari";
                }
            } else {
                $monto = 0;
                $texto  = "No hay Tarifa para Zona: $intZonaIdxx, Servicio: $strServImpo, Precio de Tarifa $strNombTari";
            }

            return array($monto, $texto);
        }


        public function flete_nac(Conceptos $concepto)
        {
            t('Rutina: flete_nac');
            $monto = 0;
            $texto = '';
            $objTariClie = $this->ClienteCorp->Tarifa;
            $decPesoTari = $this->Kilos;
            t('El peso usado para calcular la Tarifa sera: '.$decPesoTari);
            if (is_null($this->TarifaId)) {
                t('La guia no tenia tarifa, se la acabo de asignar');
                $this->TarifaId = $objTariClie->Id;
                $this->Save();
            }
            //-------------------------------------------------------------------------
            // Si el peso de la nde excede el valor final de definicion de la Tarifa
            //-------------------------------------------------------------------------
            $peso_excedente = round($decPesoTari - $objTariClie->PesoInicial,0);
            if ($peso_excedente > 0) {
                t('Las libras de la guia exceden el limite de la tarifa en: '.$peso_excedente.' lbs');
                //---------------------------------------------------------------------------
                // La cantidad excedente de kilos, se multiplica por el valor de incremento
                //---------------------------------------------------------------------------
                $monto  = $peso_excedente * $objTariClie->ValorIncremento;
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TarifaId,$this->TarifaId);
                $objClauOrde   = QQ::Clause();
                $objClauOrde[] = QQ::OrderBy(QQN::TarifaPeso()->PesoFinal,false);
                $arrTariPeso   = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                $intCantRegi   = count($arrTariPeso);
                $ultimo        = $arrTariPeso[$intCantRegi-1]->MontoTarifa;
                t('El ultimo monto de la tarifa por rangos es de: '.$ultimo);
                //----------------------------------------------------------
                // Al monto se le suma la tarifa del ultimo rango de kilos
                //----------------------------------------------------------
                $monto += $ultimo;
                t('Se suman los valores y se obtiene: '.$monto);
                $texto = "Libras excendentes: $peso_excedente * incremento: $objTariClie->ValorIncremento + tarifa del ultimo rango: $ultimo totaliza: $monto";
            } else {
                t('El peso esta en el rango de kilos');
                //---------------------------------------------------
                // El monto de la tarifa esta definido en la banda
                //---------------------------------------------------
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TarifaId,$this->TarifaId);
                $objClauWher[] = QQ::LessOrEqual(QQN::TarifaPeso()->PesoInicial,$this->Kilos);
                $objClauWher[] = QQ::GreaterOrEqual(QQN::TarifaPeso()->PesoFinal,$this->Kilos);
                $arrTariPeso   = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher));
                if (count($arrTariPeso) > 0) {
                    $monto = $arrTariPeso[0]->MontoTarifa;
                    t('El monto es: '.$monto);
                    $texto = "El monto de la tarifa esta en el rango de peso de la tarifa y arroja: $monto";
                } else {
                    $texto = "No se encontro el rango para la TarifaId: ".$this->TarifaId." y el peso: ".$this->Kilos;
                    t($texto);
                }
            }
            return array($monto, $texto);
        }

        public function flete_exp(Conceptos $concepto)
        {
            t('Rutina: flete_exp');
            $monto = 0;
            $texto = '';
            /* @var $objClieNaci MasterCliente */
            $objClieNaci = unserialize($_SESSION['ClieNaci']);
            if ($this->ClienteCorpId == $objClieNaci->CodiClie) {
                t('La guia no pertenece a un Aliado');
                //--------------------------------------------------------
                // No es una Aliado, se utiliza la Tarifa Publica de EXP
                //--------------------------------------------------------
                $arrTariProd = TarifaExp::TarifaVigente(
                    $this->ProductoId,
                    $this->Fecha->__toString('YYYY-MM-DD'),
                    $this->DestinoId
                );
            } else {
                t('La guia pertenece a un Aliado');
                //---------------------------------------------------------------------------------
                // Se trata de un Aliado, se utiliza la Tarifa de EXP vigente, asociada al Aliado
                //---------------------------------------------------------------------------------
                t('Aliado Id: '.$this->ClienteCorpId.' Producto Id: '.$this->ProductoId);
                $objClauWher[] = QQ::Equal(QQN::TarifaCliente()->ClienteId, $this->ClienteCorpId);
                $objClauWher[] = QQ::Equal(QQN::TarifaCliente()->ProductoId, $this->ProductoId);
                $arrTariClie   = TarifaCliente::QueryArray(QQ::AndCondition($objClauWher));
                if (isset($arrTariClie)) {
                    t('El vector de TarifaCliente tiene: '.count($arrTariClie).' elementos');
                    $objTariProd = $arrTariClie[0];
                    $arrTariProd = TarifaExp::TarifaVigenteAliado($this->ProductoId,$this->ClienteCorpId,$this->Fecha->__toString('YYYY-MM-DD'),$this->DestinoId);
                } else {
                    t('No se encontro la tarifa del Cliente-Aliado, se aplica tarifa publica');
                    $arrTariProd = TarifaExp::TarifaVigente($this->ProductoId,$this->Fecha->__toString('YYYY-MM-DD'), $this->DestinoId);
                }
            }
            $decMontTari = (float)$arrTariProd['monto'];
            $decPesoMini = (float)$arrTariProd['minimo'];
            t("Monto de la Tarifa: $decMontTari, Peso Minimo: $decPesoMini");
            switch ($concepto->ActuaSobre) {
                case 'kilos':
                    $decPesoTari = $this->Kilos;
                    break;
                case 'pies_cub':
                    $decPesoTari = $this->PiesCub;
                    break;
                case 'volumen':
                    $decPesoTari = $this->Volumen;
                    break;
                case 'mayor_kg_vol':
                    $decPesoTari = $this->Kilos >= $this->Volumen ? $this->Kilos : $this->Volumen;
                    break;
                case 'mayor_p3_vol';
                    $decPesoTari = $this->PiesCub >= $this->Volumen ? $this->PiesCub : $this->Volumen;
                    break;
                default:
                    $decPesoTari = $this->Kilos;
            }
            $decPesoTari = $decPesoTari >= $decPesoMini ? $decPesoTari : $decPesoMini;
            t('El peso usado para calcular la Tarifa sera: '.$decPesoTari);
            $monto = $decPesoTari * $decMontTari;
            t('Monto de la Tarifa: '.$monto);
            return array($monto, $texto);
        }


        public function seguro_exp(Conceptos $concepto)
        {
            t('Rutina: seguro_exp');
            $monto = 0;
            $texto = '';
            $decTariSgro = 5;
            $decValoDecl = $this->ValorDeclarado;
            t('El monto usado para calcular el seguro sera: '.$decValoDecl);
            $monto = $decValoDecl * $decTariSgro / 100 * $this->Tasa;
            t('Monto del Seguro: '.$monto);
            return array($monto, $texto);
        }

        public function calcularTodoLosConceptos($arrConcCalc) {
            t('');
            t('================================');
            t('Rutina: calcularTodoLosConceptos');
            t('1ero se eliminan los conceptos existentes asociados a la guia');
            $this->borrarConceptos();
            t('Ahora se calculan los conceptos de la guia: '.$this->Id);
            $total = 0;
            foreach ($arrConcCalc as $objConcFact) {
                /* @var $objConcFact Conceptos */
                list($monto,$explicacion) = $this->calcularConcepto($objConcFact);
                //-------------------------------------------------------------------------
                // Una vez calculado, se registra el concepto en la tabla correspondiente
                //-------------------------------------------------------------------------
                try {
                    $guia_concepto = new GuiaConceptos();
                    $guia_concepto->GuiaId      = $this->Id;
                    $guia_concepto->ConceptoId  = $objConcFact->Id;
                    $guia_concepto->Tipo        = $objConcFact->AplicaComo;
                    $guia_concepto->Valor       = is_numeric($objConcFact->Valor) ? $objConcFact->Valor : null;
                    $guia_concepto->Monto       = $monto;
                    $guia_concepto->MostrarComo = $objConcFact->MostrarComo;
                    $guia_concepto->Explicacion = $explicacion;
                    $guia_concepto->Save();
                    t('Concepto grabado en la DB');
                } catch (Exception $e) {
                    t('Error: '.$e->getMessage());
                }
                //--------------------------------------------------------------
                // Se aplica el monto del concepto al importe total de la guia
                //--------------------------------------------------------------
                if ($objConcFact->Operacion == 'SUMA') {
                    $total += $monto;
                } else {
                    $total -= $monto;
                }
            }
            //----------------------------------------------------
            // Se actualiza la guia con el total de sus conceptos
            //----------------------------------------------------
            $this->Total = (float)$total;
            $this->Save();
            t('El total de la guia quedo con: '.$this->Total);
        }

        /**
         * Esta rutina elimina los conceptos asociados a la Guia
         */
        public function borrarConceptos() {
            $this->DeleteAllGuiaConceptosesAsGuia();
            $this->Total = 0;
            $this->Save();
            t('Los conceptos de la guia han sido borrados');
        }

        public function borrarPiezas() {
            $this->DeleteAllGuiaPiezasesAsGuia();
            $this->Kilos   = 0;
            $this->Piezas  = 0;
            $this->Alto    = 0;
            $this->Ancho   = 0;
            $this->Largo   = 0;
            $this->Volumen = 0;
            $this->PiesCub = 0;
            $this->Save();
            t('Las piezas de la guia han sido borradas');
        }

        protected function conceptosBaseImp(Conceptos $concepto)
        {
            t('========================');
            t('Rutina: conceptosBaseImp');
            $nombre_conc = $concepto->Nombre;
            $actua_sobre = $concepto->ActuaSobre;
            t("El $nombre_conc aplica sobre otros conceptos cuya campo 'base_imponible' sea: $actua_sobre, los voy a buscar y sumar");
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaConceptos()->GuiaId,$this->Id);
            $objClauWher[] = QQ::Equal(QQN::GuiaConceptos()->Concepto->BaseImponible,$actua_sobre);
            $concBaseImp   = GuiaConceptos::QueryArray(QQ::AndCondition($objClauWher));
            $suma = 0;
            t('Existen: '.count($concBaseImp).' conceptos que forman la base imponible del '.$nombre_conc);
            foreach($concBaseImp as $concBi) {
                $suma += $concBi->__montoEnUSD();
            }
            t('La base imponible es: '.$suma);
            return $suma;
        }

        protected function otroConcepto(Conceptos $concepto)
        {
            t('====================');
            t('Rutina: otroConcepto');
            $actua_sobre = $concepto->ActuaSobre;
            t("El concepto aplica sobre otro concepto llamado: $actua_sobre, voy a buscar ese valor");
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaConceptos()->GuiaId,$this->Id);
            $objClauWher[] = QQ::Equal(QQN::GuiaConceptos()->Concepto->Nombre,$actua_sobre);
            $otro_concepto = GuiaConceptos::QuerySingle(QQ::AndCondition($objClauWher));
            return $otro_concepto;
        }

        protected function buscarMontoDelCampoConcepto(Conceptos $concepto)
        {
            $monto = 0;
            $arrPalaProc = explode('_',$concepto->ActuaSobre);
            $actua_sobre = '';
            foreach ($arrPalaProc as $strPalaProc) {
                $actua_sobre .= ucfirst($strPalaProc);
            }
            t('Actua sobre: '.$actua_sobre);
            if ($actua_sobre == 'Kilos') {
                $actua_sobre = 'Libras';
            }
            if ($concepto->Tipo == 'CAMPO') {
                t('Tipo CAMPO');
                //if (!isset($this->$actua_sobre)) {
                //    t('No existe el campo '.$actua_sobre);
                //}
                $monto = $this->$actua_sobre;
                t('El monto es: '.$monto);
            }
            if ($concepto->Tipo == 'CONCEPTO') {
                t('Tipo CONCEPTO');
                $otro_concepto = $this->otroConcepto($concepto);
                if ($otro_concepto) {
                    $monto = $otro_concepto->__montoEnUSD();
                    t("El monto del otro concepto $actua_sobre es: $monto");
                } else {
                    t('No se encontro el otro concepto...');
                }
            }
            if ($concepto->Tipo == 'BASEIMP') {
                t('Tipo BASEIMP');
                $monto = $this->conceptosBaseImp($concepto);
            }
            return $monto;
        }

        protected function aplicaComoCantidadPorcentaje(Conceptos $concepto, $valor_base, $porc=0)
        {
            $total = 0;
            $texto = '';
            $valor = $porc != 0 ? $porc : $concepto->Valor ;
            t('AplicaComo: '.$concepto->AplicaComo);
            if ($concepto->AplicaComo == 'CANT') {
                //------------------------------------
                // El concepto aplica como cantidad
                //------------------------------------
                t('Aplica como cantidad');
                $total = $concepto->Valor;
                $texto = "Se aplico directamente el monto del concepto: $concepto->Valor";
            } else {
                t('Aplica como porcentaje');
                $total = $valor * $valor_base / 100;
                $texto = "Se aplico: $valor% sobre el concepto $valor_base obteniendo: $total";
            }
            t($texto);
            return array($total,$texto);
        }

        public function calcularConcepto(Conceptos $concepto)
        {
            $monto = 0;
            $explicacion = '';

            t('Dentro de la Guia, calculando el Concepto: '.$concepto->Nombre);
            t('Rutina: calcularConcepto');
            $actua_sobre = $concepto->ActuaSobre;
            $concepto_id = $concepto->Id;
            t('El Id del Concepto es: ' . $concepto_id);
            //------------------------------------------------------------------------------------------
            // Si el concepto tiene una condicion que prela su calculo, aqui se evalua dicha condicion
            //------------------------------------------------------------------------------------------
            $strMetoCond = trim($concepto->Condicion);
            if (strlen($strMetoCond) > 0) {
                t('Para calcular el concepto, se debe cumplir la condicion: '.$strMetoCond);
                if (!$this->$strMetoCond()) {
                    t('La condicion no se satisface');
                    $explicacion = 'El Concepto, no satisface la condicion: '.$strMetoCond;
                    return array($monto, $explicacion);
                } else {
                    t('La condicion si se satisface');
                }
            }
            //------------------------------------------------------------------------
            // El "valor" del Concepto determina la forma en que se calcula el monto
            //------------------------------------------------------------------------
            if (is_numeric($concepto->Valor)) {
                t('Se trata de un valor numerico');
                $valor_base = $this->buscarMontoDelCampoConcepto($concepto);
                t('El valor del ' . $concepto->Tipo . ' es: ' . $valor_base);
                list($monto, $explicacion) = $this->aplicaComoCantidadPorcentaje($concepto,$valor_base);
            }
            if ($concepto->Valor == 'rango') {
                t('Se trata de un rango');
                $valor_base = $this->buscarMontoDelCampoConcepto($concepto);
                t('El valor del ' . $concepto->Tipo.' es: '.$valor_base);
                //----------------------------------------------------------------------------
                // El monto del concepto se ubica en la tabla concepto_rangos y la búsqueda
                // debe hacerse usando el campo actua_sobre
                //----------------------------------------------------------------------------
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::ConceptoRangos()->ConceptoId,$concepto_id);
                $objClauWher[] = QQ::LessOrEqual(QQN::ConceptoRangos()->RangoInicial,$valor_base);
                $objClauWher[] = QQ::GreaterOrEqual(QQN::ConceptoRangos()->RangoFinal,$valor_base);
                $arrRangConc   = ConceptoRangos::QueryArray(QQ::AndCondition($objClauWher));
                if (count($arrRangConc) > 0) {
                    $rango = $arrRangConc[0];
                    if ($rango) {
                        $porc = $rango->Valor;
                        list($monto, $explicacion) = $this->aplicaComoCantidadPorcentaje($concepto, $valor_base, $porc);
                    } else {
                        $monto = 0;
                        $explicacion = "No hay rangos definidos para: " . $concepto->Nombre;
                    }
                } else {
                    $monto = 0;
                    $explicacion = "No hay rangos definidos para: " . $concepto->Nombre;
                }
                t($explicacion);
            }
            if ($concepto->Valor == 'metodo') {
                t('Se trata de un metodo');
                $metodo = trim($concepto->Metodo);
                if (!empty($metodo)) {
                    try {
                        t("Calculando metodo $metodo...");
                        list($monto, $explicacion) = $this->$metodo($concepto);
                    } catch (Exception $e) {
                        t("Exception:". $e->getMessage());
                        t("El metodo $metodo no existe en la Guia");
                        $explicacion = "Metodo $metodo... Indefinido";
                    }
                } else {
                    t("El metodo $metodo no ha sido declarado en el concepto");
                    $monto = 0;
                    $explicacion = "Metodo $metodo... no declarado en el concepto";
                }
            }
            if ($concepto->AplicarTasa) {
                t('Se debe aplicar la tasa: '.$this->Tasa.' de cambio para llevar a Bs');
                $monto *= $this->Tasa;
            }
            t('Saliendo de la Guia, despues de haber calculado el concepto...');
            return array($monto, $explicacion);
        }

        public function grabarCheckpointPieza(GuiaPiezas $objGuiaPiez, Checkpoints $objCkptProc, $strTextObse)
        {
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumePiez'] = $objGuiaPiez->IdPieza;
            $arrDatoCkpt['GuiaAnul'] = $this->Anulada();
            $arrDatoCkpt['CodiCkpt'] = $objCkptProc->Id;
            $arrDatoCkpt['TextCkpt'] = $strTextObse;
            $arrDatoCkpt['NotiCkpt'] = $objCkptProc->Notificar;
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            return $arrResuGrab;
        }

        /**
         * Esta rutina crea las piezas correspondientes a la Guia
         */
		public function crearPieza($objParaPiez) {
            $objProcEjec = $objParaPiez->ProcEjec;
            $objCkptProc = $objParaPiez->CkptProc;
            $decKiloProm = $objParaPiez->KiloProm;
            $decPiesProm = $objParaPiez->PiesProm;
            $intIdxxPiez = $objParaPiez->IdxxPiez;

            //t('Rutina: crearPieza');
            //t('==================');
            $strNumePiez = completar($intIdxxPiez);
            //t('Procesando IdPieza: '.$strNumePiez);
            try {
                $objNuevPiez = new GuiaPiezas();
                $objNuevPiez->GuiaId      = $this->Id;
                $objNuevPiez->IdPieza     = $this->Tracking.'-'.$strNumePiez;
                $objNuevPiez->PiesCub     = $decPiesProm;
                $objNuevPiez->Kilos       = $decKiloProm;
                $objNuevPiez->Descripcion = 'N/A';
                $objNuevPiez->Save();
                $strTextObse = trim($objCkptProc->Descripcion).' (Manif.: '.$objNuevPiez->Guia->NotaEntrega->Referencia.')';
                $arrResuGrab = $this->grabarCheckpointPieza($objNuevPiez, $objCkptProc, $strTextObse);
                if (!$arrResuGrab['TodoOkey']) {
                    throw new Exception($arrResuGrab['MotiNook']);
                }
            } catch (Exception $e) {
                t('Error: '.$e->getMessage());
                $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
                $arrParaErro['NumeRefe'] = 'Pieza: '.$strNumePiez;
                $arrParaErro['MensErro'] = $e->getMessage();
                $arrParaErro['ComeErro'] = 'Fallo la creacion de la Pieza de la Guia';
                GrabarError($arrParaErro);
            }
        }

        /**
         */
		public function ultimoCheckpoint($campo='CodigoCkpt',$publico=false) {
		    t('Buscando ultimo checkpoint de la guia: '.$this->strNumero.' (id: '.$this->Id.')');
		    $objDatabase  = Guias::GetDatabase();
		    $strTipoCkpt  = $publico ? '_publico' : '';
            $strCadeSqlx  = 'select * ';
            $strCadeSqlx .= '  from v_last_checkpoint_guia'.$strTipoCkpt;
            $strCadeSqlx .= ' where guia_id = '.$this->Id;
            //t('SQL: '.$strCadeSqlx);
            $objResulSet  = $objDatabase->Query($strCadeSqlx);
            $arrUltiCkpt  = [];
            while ($mixRegistro  = $objResulSet->FetchArray()) {
                //--------------------------------------------------------------------
                // Los elementos devueltos por la vista, se transforman en objetos
                //--------------------------------------------------------------------
                $objUltiCkpt = new stdClass();
                $objUltiCkpt->GuiaId       = $mixRegistro[0];
                $objUltiCkpt->PiezaId      = $mixRegistro[1];
                $objUltiCkpt->IdPieza      = $mixRegistro[2];
                $objUltiCkpt->Descripcion  = $mixRegistro[3];
                $objUltiCkpt->Ubicacion    = $mixRegistro[4];
                $objUltiCkpt->CheckpointId = $mixRegistro[5];
                $objUltiCkpt->CodigoCkpt   = $mixRegistro[6];
                $objUltiCkpt->SucursalId   = $mixRegistro[7];
                $objUltiCkpt->Iata         = $mixRegistro[8];
                $objUltiCkpt->Fecha        = $mixRegistro[9];
                $objUltiCkpt->Hora         = $mixRegistro[10];
                $objUltiCkpt->Comentario   = $mixRegistro[11];
                $objUltiCkpt->RutaId       = $mixRegistro[12];
                $objUltiCkpt->CodigoRuta   = $mixRegistro[13];
                $objUltiCkpt->CreatedBy    = $mixRegistro[14];
                $objUltiCkpt->LogiUsua     = isset($mixRegistro[15]) ? $mixRegistro[15] : null;
                $arrUltiCkpt[]             = $objUltiCkpt;
            }
            $intCantCkpt = count($arrUltiCkpt);
            //t('La cantidad de checkpoint es: '.$intCantCkpt);
            if ($intCantCkpt == 0) {
                t('No tiene checkpoints, se retorna 00');
                //--------------------------------------------------------
                // No hay checkpoint asociados a las piezas de las guias
                //--------------------------------------------------------
                if ($campo == 'CodigoCkpt') {
                    return "00";
                } else {
                    return null;
                }
            }
            //-------------------------------------------------------------------
            // Una sola pieza: el estatus de la pieza, es el status de la Guia
            //-------------------------------------------------------------------
            if ($intCantCkpt == 1) {
                if ($campo == 'Objeto') {
                    return $arrUltiCkpt[0];
                }
                t('Tiene una sola pieza, se retorna: '.$arrUltiCkpt[0]->$campo);
                return $arrUltiCkpt[0]->$campo;
            }
            //t('Tiene varias piezas.  En la guia dice: '.$this->Piezas);
            //----------------------------------------------------------------------------
            // Varias piezas: si tienen el mismo checkpoint, ese es el status de la Guia
            //----------------------------------------------------------------------------
            $arrCodiCkpt = [];
            foreach ($arrUltiCkpt as $objUltiCkpt) {
                $strCodiCkpt = $objUltiCkpt->CodigoCkpt;
                if (isset($arrCodiCkpt[$strCodiCkpt])) {
                    $arrCodiCkpt[$strCodiCkpt] += 1;
                } else {
                    $arrCodiCkpt[$strCodiCkpt] = 1;
                }
            }
            if (count($arrCodiCkpt) == 1) {
                if ($campo == 'Objeto') {
                    t('Mismo checkpoint para todas las piezas, retornando el 1er elemento del vector');
                    return $arrUltiCkpt[0];
                }
                t('Mismo checkpoint para todas las piezas');
                return $arrUltiCkpt[0]->$campo;
            }
            //------------------------------------------------------------------
            // Son varias piezas y tienen diferentes checkpoints. Status mixto
            //------------------------------------------------------------------
            if ($campo == 'Objeto') {
                return $arrUltiCkpt;
            }
            if ($campo == 'CodigoCkpt') {
                t('Las piezas tienen checkpoints diferentes, estatus Mixto');
                return "MX";
            } else {
                return 'MX';
            }
        }

		public static function proxNroDeGuia() {
		    $intGuiaIdxx = proxNroDeGuia();
            return str_pad($intGuiaIdxx, 8, '0', STR_PAD_LEFT);
        }

        public function proximoIdPieza(){
            $cant_piezas = $this->CountGuiaPiezasesAsGuia() + 1;
            return $this->Numero.'-'.str_pad($cant_piezas, 3, '0', STR_PAD_LEFT);
        }

        public function Anulada() {
		    return is_null($this->DeletedBy) ? false : true;
        }

        public function NombreCliente($formato='normal')
        {
            $strNombClie = '';
            if (!is_null($this->ClienteRetailId)) {
                $strNombClie = $this->ClienteRetail->Nombre;
            }
            if (!is_null($this->ClienteCorpId)) {
                $strNombClie = $this->ClienteCorp->NombClie;
            }
            if (!is_null($this->ClienteIntId)) {
                $strNombClie = $this->ClienteInt->Nombre;
            }
            if ($formato == 'reporte') {
                $strNombClie = QuitarCaracteresEspeciales2(utf8_decode($strNombClie));
            }
            return $strNombClie;
		}

        public function NombreTarifa($formato='normal')
        {
            $strDescTari = '';
            if (!is_null($this->TarifaId)) {
                $strDescTari = $this->Tarifa->Descripcion;
                if ($formato == 'reporte') {
                    $strDescTari = QuitarCaracteresEspeciales2(utf8_decode($strDescTari));
                }
            }
            return $strDescTari;
        }

        public function EntregadoA($formato='normal')
        {
            $strEntrAqui = '';
            if ($this->GuiaPodId) {
                $strEntrAqui = $this->GuiaPod->EntregadoA;
                if ($formato == 'reporte') {
                    $strEntrAqui = QuitarCaracteresEspeciales2(utf8_decode($strEntrAqui));
                }
            }
            return $strEntrAqui;
		}

        public function FechaEntrega($formato='normal')
        {
            if ($this->GuiaPodId) {
                return $this->GuiaPod->FechaEntrega->__toString('YYYY-MM-DD');
            } else {
                return '';
            }
		}

        public function HoraEntrega($formato='normal')
        {
            if ($this->GuiaPodId) {
                return $this->GuiaPod->HoraEntrega;
            } else {
                return '';
            }
		}

        public function FechaRegistroPod($formato='normal')
        {
            if ($this->GuiaPodId) {
                return $this->GuiaPod->CreatedAt;
            } else {
                return '';
            }
		}

        public function UsuarioRegistroPod($formato='normal')
        {
            /**
             * @var $objUsuaPodx Usuario
             */
            if ($this->GuiaPodId) {
                $objUsuaPodx = Usuario::Load($this->GuiaPod->CreatedBy);
                return $objUsuaPodx->LogiUsua;
            } else {
                return '';
            }
		}

        /**
         * Esta rutina valida que la Guia pueda ser procesada en
         * forma "Operatativa" a atraves de las opciones del SDE
         *
         * @return $arrSepuProc arreglo de dos posiciones: una valor logico que determina
         * si la pieza se puede procesar o no y un mensaje al Usuario explicando la razon
         * por la cual no se puede procesar la guia si el caso lo amerita
         */
        public function SePuedeProcesar() {
            $strMensUsua = '';
            $intCodiErro = 0;
            $blnTodoOkey = true;
            if (!is_null($this->DeletedBy)) {
                $strMensUsua = 'Guia Eliminada';
                $intCodiErro = 2;
                $blnTodoOkey = false;
            }
            if ($blnTodoOkey) {
                if (!is_null($this->GuiaPodId)) {
                    $strMensUsua = 'Guia Entregada';
                    $intCodiErro = 3;
                    $blnTodoOkey = false;
                }
            }
            //if ($blnTodoOkey) {
            //    if ($this->fltTotal == 0) {
            //        $strMensUsua = QApplication::Translate('Monto Cero');
            //        $intCodiErro = 4;
            //        $blnTodoOkey = false;
            //    }
            //}
            $arrSepuProc['TodoOkey'] = $blnTodoOkey;
            $arrSepuProc['MensUsua'] = $strMensUsua;
            $arrSepuProc['CodiErro'] = $intCodiErro;
            return $arrSepuProc;
        }

        public function sePuedeBorrar() {
            $arrSepuBorr['TodoOkey'] = true;
            $arrSepuBorr['TextMens'] = '';
            if ($arrSepuBorr['TodoOkey']) {
                if (!is_null($this->GuiaPodId)) {
                    $arrSepuBorr['TodoOkey'] = false;
                    $arrSepuBorr['TextMens'] = 'Guia Entregada. No se puede Borrar';
                }
            }
            if ($arrSepuBorr['TodoOkey']) {
                if ($this->sistema() == 'INT') {
                    $arrSepuBorr['TodoOkey'] = false;
                    $arrSepuBorr['TextMens'] = 'Guia Internacional. No se puede Borrar';
                }
            }
            if ($arrSepuBorr['TodoOkey']) {
                if (!is_null($this->intFacturaId)) {
                    $arrSepuBorr['TodoOkey'] = false;
                    $arrSepuBorr['TextMens'] = 'Guia Facturada. No se puede Borrar';
                }
            }
            return $arrSepuBorr;
        }

        public function softDelete() {
            /**
             * @var $objUsuaTran Usuario
             */
            $objUsuaTran = unserialize($_SESSION['User']);
            //t('SD1. El Usuario es: '.$objUsuaTran->LogiUsua);
            //---------------------------------------------------------------------------
            // El softdelete de la Guia implica simplemente marcarla la fecha de borrado
            //---------------------------------------------------------------------------
            //$this->DeletedAt = new DateTime(QDateTime::now(QDateTime::FormatIso));
            $this->DeletedBy = $objUsuaTran->CodiUsua;
            $this->save();
            //t('SD2');
            //----------------------------------------------------------------------
            // Se deja rastro de la operacion en el Registro de Trabajo de la Guia
            //----------------------------------------------------------------------
            $objCkptDele = Checkpoints::LoadByCodigo('GE');
            //t('SD3: '.$objCkptDele->Codigo);
            if ($objCkptDele) {
                //t('SD4');
                $strTextMens = "Guia Eliminada...";
                $arrParaRegi['CodiCkpt'] = $objCkptDele->Id;
                $arrParaRegi['TextMens'] = $strTextMens;
                $arrParaRegi['NumeGuia'] = $this->Id;
                $arrParaRegi['CodiUsua'] = $objUsuaTran->CodiUsua;
                $arrParaRegi['CodiEsta'] = $objUsuaTran->SucursalId;
                CrearRegistroDeTrabajo($arrParaRegi);
                //t('SD5');
            }
            //------------------------------------------------------------
            // Se deja rastro de la operacion en el log de transacciones
            //------------------------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Guia';
            $arrLogxCamb['intRefeRegi'] = $this->Numero;
            $arrLogxCamb['strNombRegi'] = $this->NombreRemitente;
            $arrLogxCamb['strDescCamb'] = "SoftDelete";
            LogDeCambios($arrLogxCamb);
            //t('SD6');
        }

        public function Recuperar() {
            /**
             * @var $objUsuaTran Usuario
             */
            //-----------------------------------------------------------------------
            // Recuperar la Guia implica simplemente des-marcarla como "Borrada"
            //-----------------------------------------------------------------------
            $this->DeletedBy = null;
            $this->save();
            //----------------------------------------------------------------------
            // Se deja rastro de la operacion en el Registro de Trabajo de la Guia
            //----------------------------------------------------------------------
            $objUsuaTran = unserialize($_SESSION['User']);
            $objCkptRecu = Checkpoints::LoadByCodigo('GR');
            if ($objCkptRecu) {
                $strTextMens = "Guia Recuperada...";
                $arrParaRegi['CodiCkpt'] = $objCkptRecu->Id;
                $arrParaRegi['TextMens'] = $strTextMens;
                $arrParaRegi['NumeGuia'] = $this->Id;
                $arrParaRegi['CodiUsua'] = $objUsuaTran->CodiUsua;
                $arrParaRegi['CodiEsta'] = $objUsuaTran->SucursalId;
                CrearRegistroDeTrabajo($arrParaRegi);
            }
            //------------------------------------------------------------
            // Se deja rastro de la operacion en el log de transacciones
            //------------------------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Guias';
            $arrLogxCamb['intRefeRegi'] = $this->Id;
            $arrLogxCamb['strNombRegi'] = $this->NombreRemitente;
            $arrLogxCamb['strDescCamb'] = "Recuperada";
            LogDeCambios($arrLogxCamb);
        }

        public function Borrar($blnSoftDele=true) {
            t('BG1');
            if ($blnSoftDele) {
                $this->softDelete();
            } else {
                t('BG2');

                $arrRegiProc = GuiaConceptos::LoadArrayByGuiaId($this->Id);
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }
                t('BG3');

                $arrRegiProc = GuiaPiezas::LoadArrayByGuiaId($this->Id);
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }
                t('BG4');

                $arrRegiProc = RegistroTrabajo::LoadArrayByGuiaId($this->Id);
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }
                t('BG5');

                $arrRegiProc = Notificacion::LoadArrayByGuiaId($this->Id);
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }
                t('BG6');

                $strCadeSqlx  = 'delete ';
                $strCadeSqlx .= '  from sde_contenedor_guia_assn ';
                $strCadeSqlx .= ' where guia_id = "'.$this->Id.'"';
                $objDatabase  = Guia::GetDatabase();
                $objDatabase->NonQuery($strCadeSqlx);
                t('BG7');

                $strCadeSqlx  = 'delete ';
                $strCadeSqlx .= '  from guias ';
                $strCadeSqlx .= ' where id = "'.$this->Id.'"';
                $objDatabase  = Guia::GetDatabase();
                $objDatabase->NonQuery($strCadeSqlx);
                t('BG8');
                //------------------------------------------------------------
                // Se deja rastro de la operacion en el log de transacciones
                //------------------------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Guia';
                $arrLogxCamb['intRefeRegi'] = $this->Numero;
                $arrLogxCamb['strNombRegi'] = $this->NombreRemitente;
                $arrLogxCamb['strDescCamb'] = "Borrada";
                LogDeCambios($arrLogxCamb);
                t('BG9');
            }

        }

        public function CreadaEl() {
		    return date($this->CreatedAt);
        }

        public function sistema() {
            if (!is_null($this->ClienteRetailId)) {
                return 'RET';
            }
            if (!is_null($this->ClienteCorpId)) {
                return 'CORP';
            }
            if (!is_null($this->ClienteIntId)) {
                return 'INT';
            }
        }

        public function cliente() {
            if (!is_null($this->ClienteRetailId)) {
                return $this->ClienteRetail;
            }
            if (!is_null($this->ClienteCorpId)) {
                return $this->ClienteCorp;
            }
            if (!is_null($this->ClienteIntId)) {
                return $this->ClienteInt;
            }
        }


        public static function LoadArrayByManifiestoExp($strParam1) {
            // Performing the load manually (instead of using QCubed Query)

            // Get the Database Object for this Class
            $objDatabase = Guias::GetDatabase();

            // Properly Escape All Input Parameters using Database->SqlVariable()
            $strParam1 = $objDatabase->SqlVariable($strParam1);

            $strCadeSqlx  = "SELECT g.* ";
            $strCadeSqlx .= "  FROM guias g ";
            $strCadeSqlx .= "       INNER JOIN guia_piezas gp ";
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

        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Guias objects
			return Guias::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Guias()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Guias()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Guias object
			return Guias::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Guias()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Guias()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Guias objects
			return Guias::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Guias()->Param1, $strParam1),
					QQ::Equal(QQN::Guias()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`guias`.*
				FROM
					`guias` AS `guias`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Guias::InstantiateDbResult($objDbResult);
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