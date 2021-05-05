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

        public function NroFactura() {
		    $strFactGuia = 'N/A';
            if (!is_null($this->FacturaId)) {
                $objFactGuia = Facturas::Load($this->FacturaId);
                if ($objFactGuia) {
                    if (!is_null($this->ClienteCorpId)) {
                        $strFactGuia = $objFactGuia->Referencia;
                    } else {
                        $strFactGuia = $objFactGuia->Id;
                    }
                }
            }
            return $strFactGuia;
        }

        public function estaAsegurado()
        {
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
            t('El peso usado para calcular la Tarifa sera: '.$decPesoTari);
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
            //$objClauWher   = QQ::Clause();
            //$objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->TarifaId,$this->TarifaAgenteId);
            //$objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->Zona,$intZonaIdxx);
            //$objClauWher[] = QQ::Equal(QQN::TarifaAgentesZonas()->Servicio,trim($strServImpo));
            $objPrecTari   = TarifaAgentesZonas::LoadByTarifaIdZonaServicio($intTariIdxx,$intZonaIdxx,$strServImpo);
            if ($objPrecTari) {
                $precio = $objPrecTari->Precio;
                $monto  = $precio * $decPesoTari;
                $texto  = "Zona: $intZonaIdxx, Servicio: $strServImpo, Precio de Tarifa $strNombTari: $precio, ";
                $texto .= "para un peso de: $decPesoTari, totaliza: $monto";
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
            $decPesoTari = $this->pesoTarifa();
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
                t('El monto de la tarifa esta en el rango de kilos');
                //---------------------------------------------------
                // El monto de la tarifa esta definido en la banda
                //---------------------------------------------------
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::TarifaPeso()->TarifaId,$this->TarifaId);
                $objClauWher[] = QQ::LessOrEqual(QQN::TarifaPeso()->PesoInicial,$this->Libras);
                $objClauWher[] = QQ::GreaterOrEqual(QQN::TarifaPeso()->PesoFinal,$this->Libras);
                $arrTariPeso   = TarifaPeso::QueryArray(QQ::AndCondition($objClauWher));
                if (count($arrTariPeso) > 0) {
                    $monto = $arrTariPeso[0]->MontoTarifa;
                    t('El monto es: '.$monto);
                    $texto = "El monto de la tarifa esta en el rango de peso de la tarifa y arroja: $monto";
                } else {
                    $texto = "No se encontro el rango para la TarifaId: ".$this->TarifaId." y el peso: ".$this->Libras;
                    t($texto);
                }
            }
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
            $this->Total = $total;
            $this->Save();
            t('Se actualizo el total de la guia con: '.$total);
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
                $suma += $concBi->Monto;
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
            $otro_concepto = NotaConceptos::QuerySingle(QQ::AndCondition($objClauWher));
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
                if (!isset($this->$actua_sobre)) {
                    t('No existe el campo '.$actua_sobre);
                }
                $monto = $this->$actua_sobre;
                t('El monto es: '.$monto);
            }
            if ($concepto->Tipo == 'CONCEPTO') {
                t('Tipo CONCEPTO');
                $otro_concepto = $this->otroConcepto($concepto);
                if ($otro_concepto) {
                    $monto = $otro_concepto->Monto;
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
            if ($concepto->ActuaSobre == 'CANT') {
                //------------------------------------
                // El concepto aplica como cantidad
                //------------------------------------
                t('Aplica como cantidad');
                $total = $valor_base;
                $texto = "Se aplico directamente el monto del concepto: $valor_base";
            } else {
                t('Aplica como porcentaje');
                $total = $valor * $valor_base / 100;
                $texto = "Se aplico: $valor% sobre el concepto $valor_base obteniendo: $total";
            }
            return array($total,$texto);
        }

        public function calcularConcepto(Conceptos $concepto)
        {
            $monto = 0;
            $explicacion = '';

            t('Dentro de la Guia, calculando el Concepto: '.$concepto->Nombre);
            t('Rutina: calcularConcepto');
            $actua_sobre = $concepto->ActuaSobre;
            t('El concepto actua sobre: '.$actua_sobre);
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
                t('Se trata de un valor numerico, por lo tanto aplica directamente');
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
                $metodo = $concepto->Metodo;
                if (!empty($metodo)) {
                    try {
                        t("Calculando metodo $metodo...");
                        list($monto, $explicacion) = $this->$metodo($concepto);
                    } catch (Exception $e) {
                        t("El metodo $metodo no existe en la Guia");
                        $explicacion = "Metodo $metodo... Indefinido";
                    }
                } else {
                    t("El metodo $metodo no ha sido declarado en el concepto");
                    $monto = 0;
                    $explicacion = "Metodo $metodo... no declarado en el concepto";
                }
            }
            t('Saliendo de la Guia, despues de hacer calculado el concepto...');
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
		//public function crearPieza(GuiaCacesa $objGuiaMasi, $objProcEjec, $objCkptProc, $intIdxxPiez) {
		public function crearPieza($objParaPiez) {
            $objProcEjec = $objParaPiez->ProcEjec;
            $objCkptProc = $objParaPiez->CkptProc;
            $decKiloProm = $objParaPiez->KiloProm;
            $decPiesProm = $objParaPiez->PiesProm;
            $intIdxxPiez = $objParaPiez->IdxxPiez;

            t('Rutina: crearPieza');
            t('==================');
            $strNumePiez = completar($intIdxxPiez);
            t('Procesando IdPieza: '.$strNumePiez);
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
            t('SQL: '.$strCadeSqlx);
            $objResulSet  = $objDatabase->Query($strCadeSqlx);
            $arrUltiCkpt  = [];
            while ($mixRegistro  = $objResulSet->FetchArray()) {
                //--------------------------------------------------------------------
                // Los elementos devueltos por la vista, se transforman en objetos
                //--------------------------------------------------------------------
                $objUltiCkpt = new stdClass();
                $objUltiCkpt->GuiaId       = $mixRegistro[0];
                $objUltiCkpt->IdPieza      = $mixRegistro[1];
                $objUltiCkpt->Descripcion  = $mixRegistro[2];
                $objUltiCkpt->Ubicacion    = $mixRegistro[3];
                $objUltiCkpt->CheckpointId = $mixRegistro[4];
                $objUltiCkpt->CodigoCkpt   = $mixRegistro[5];
                $objUltiCkpt->SucursalId   = $mixRegistro[6];
                $objUltiCkpt->Iata         = $mixRegistro[7];
                $objUltiCkpt->Fecha        = $mixRegistro[8];
                $objUltiCkpt->Hora         = $mixRegistro[9];
                $objUltiCkpt->Comentario   = $mixRegistro[10];
                $objUltiCkpt->RutaId       = $mixRegistro[11];
                $objUltiCkpt->CodigoRuta   = $mixRegistro[12];
                $objUltiCkpt->CreatedBy    = $mixRegistro[13];
                $objUltiCkpt->LogiUsua     = $mixRegistro[14];
                $arrUltiCkpt[]             = $objUltiCkpt;
            }
            $intCantCkpt = count($arrUltiCkpt);
            t('La cantidad de checkpoint es: '.$intCantCkpt);
            if ($intCantCkpt == 0) {
                t('No tiene checkpoints, se retorna 88');
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
                $strMensUsua = QApplication::Translate('Guia Eliminada');
                $intCodiErro = 2;
                $blnTodoOkey = false;
            }
            if ($blnTodoOkey) {
                if (!is_null($this->GuiaPodId)) {
                    $strMensUsua = QApplication::Translate('Guia Entregada');
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