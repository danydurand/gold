<?php
    require(__MODEL_GEN__ . '/GuiaGen.class.php');

    /**
     * The Guia class defined here contains any
     * customized code for the Guia class in the
     * Object Relational Model.  It represents the "guia" table
     * in the database, and extends from the code generated abstract GuiaGen
     * class, which contains all the basic CRUD-type functionality as well as
     * basic methods to handle relationships and index-based loading.
     *
     * @package My QCubed Application
     * @subpackage DataObjects
     *
     */
    class Guia extends GuiaGen {
        /**
         * Default "to string" handler
         * Allows pages to _p()/echo()/print() this object, and to define the default
         * way this object would be outputted.
         *
         * Can also be called directly via $objGuia->__toString().
         *
         * @return string a nicely formatted string representation of this object
         */
        public function __toString() {
            return sprintf('%s',  $this->strNumeGuia);
        }

        /**
         * Esta rutina devuelve el ultimo checkpoint publico asociado a la guía
         *
         * @return GuiaCkpt|null
         */
        public function ultimoCheckpointPublico()
        {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia,$this->strNumeGuia);
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->CodiCkptObject->TipoCkpt,SdeTipoCkptType::PUBLICO);
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt,false,QQN::GuiaCkpt()->HoraCkpt,false);
            $objClausula[] = QQ::LimitInfo(1);
            $arrGuiaCkpt   = GuiaCkpt::QueryArray(QQ::AndCondition($objClauWher),$objClausula);
            return (count($arrGuiaCkpt)) ? $arrGuiaCkpt[0] : null;
        }

        /**
         * Esta rutina devuelve la cantidad de veces que la guia ha salido a ruta
         *
         * @return integer
         */
        public function cantidadDeDespachos()
        {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia,$this->NumeGuia);
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->CodiCkpt,'ER');
            $intCantDesp   = GuiaCkpt::QueryCount(QQ::AndCondition($objClauWher));
            return $intCantDesp;
        }

        public function UltiCkptObj() {
           $objClausula   = QQ::Clause();
           $objClausula[] = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt,false,QQN::GuiaCkpt()->HoraCkpt,false);
           $objClausula[] = QQ::LimitInfo(1);
           $arrGuiaCkpt   = GuiaCkpt::LoadArrayByNumeGuia($this->strNumeGuia,$objClausula);
           return (count($arrGuiaCkpt)) ? $arrGuiaCkpt[0] : null;
       }


        public function sistema() {
            switch ($this->SistemaId) {
                case 'api':
                    return 'Api';
                    break;
                case 'sde':
                    return 'SisCO';
                    break;
                case 'cnt':
                    return 'ExpNac';
                    break;
                case 'con':
                    return 'CORP';
                    break;
                default:
                    return 'N/A';
            }
        }

        public function receptoria($strOrigDest) {
            $strSiglRece = $strOrigDest == 'D' ? $this->ReceptoriaDestino : $this->ReceptoriaOrigen;
            $objReceBusc = Counter::LoadBySiglas($strSiglRece);
            if ($objReceBusc) {
                if ($objReceBusc->EsRuta == SinoType::SI) {
                    $strReceBusc = 'DOM';
                } else {
                    $strReceBusc = $strSiglRece;
                }
            } else {
                $strReceBusc = 'DOM';
            }
            return $strReceBusc;
        }

        public function tieneCheckpointDeCierre() {
            //-------------------------------------------------------------------
            // Esta rutina verifica la existencia de algún checkpoint de cierre
            // relacionado con la guia
            //-------------------------------------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia,$this->NumeGuia);
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->CodiCkptObject->TipoTerm,SinoType::SI);
            return GuiaCkpt::QueryCount(QQ::AndCondition($objClauWher));
        }

        public function verificarTarifa() {
            //-------------------------------------------------------------
            // Se asigna codigo de la Tarifa, en caso de que no lo tenga
            //-------------------------------------------------------------
            if (empty($this->TarifaId) && ($this->CodiCkpt != 'OK')) {
                $this->TarifaId = $this->CodiClieObject->TarifaId;
                $this->Save();
                //------------------------------------------------------------
                // Se deja rastro de la operacion en el log de transacciones
                //------------------------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Guia';
                $arrLogxCamb['intRefeRegi'] = $this->NumeGuia;
                $arrLogxCamb['strNombRegi'] = $this->NombRemi;
                $arrLogxCamb['strDescCamb'] = "Se asignó tarifa (porque no tenía): ".$this->CodiClieObject->Tarifa->Descripcion;
                LogDeCambios($arrLogxCamb);
            }
        }

        public function validarDevolucion(Usuario $objUsuario) {
            $blnTodoOkey = true;
            $strMensUsua = '';
            $intCodiErro = 0;
            //---------------------------------------------
            // La Guia no debe esta anulada, ni entregada
            //---------------------------------------------
            if ($blnTodoOkey) {
                $arrSepuProc = $this->SePuedeProcesar();
                if (!$arrSepuProc['TodoOkey']) {
                    $strMensUsua = $arrSepuProc['MensUsua'];
                    $intCodiErro = $arrSepuProc['CodiErro'];
                    $blnTodoOkey = false;
                }
            }
            //-----------------------------------------------------
            // La guia no debe estar ya "Devuelta al Remitente"
            //-----------------------------------------------------
            if ($blnTodoOkey) {
                if ($this->tieneCheckpoint('DR')) {
                    $strMensUsua = 'Ya fue Devuelta';
                    $intCodiErro = 5;
                    $blnTodoOkey = false;
                }
            }
            //------------------------------------------------------------
            // El Usuario, debe estar en la Sucursal destino de la Guia
            //------------------------------------------------------------
            if ($blnTodoOkey) {
                $strSucuFact = $this->EstaDestObject->SeFacturaEnObject->Sucursal->CodiEsta;
                $arrSucuVali = array($strSucuFact,$this->EstaDest);
                if (!in_array($objUsuario->CodiEsta,$arrSucuVali)) {
                    $strMensUsua = 'Suc. Dest. Diferente';
                    $intCodiErro = 6;
                    $blnTodoOkey = false;
                }
            }
            $arrResuVali['TodoOkey'] = $blnTodoOkey;
            $arrResuVali['MensUsua'] = $strMensUsua;
            $arrResuVali['CodiErro'] = $intCodiErro;
            return $arrResuVali;
        }

        public function Devolver(SdeCheckpoint $objCkptDevo) {
            //--------------------------------------------
            // Remitente y Destinatario, se intercambian
            //--------------------------------------------
            $strSucuDest = $this->EstaDest;
            $strReceDest = $this->ReceptoriaDestino;
            $strNombDest = $this->NombDest;
            $strDireDest = $this->DireDest;
            $strTeleDest = $this->TeleDest;

            $this->EstaDest          = $this->EstaOrig;
            $this->ReceptoriaDestino = $this->ReceptoriaOrigen;
            $this->NombDest          = $this->NombRemi;
            $this->DireDest          = $this->DireRemi;
            $this->TeleDest          = $this->TeleRemi;

            $this->EstaOrig         = $strSucuDest;
            $this->ReceptoriaOrigen = $strReceDest;
            $this->NombRemi         = $strNombDest;
            $this->DireRemi         = $strDireDest;
            $this->TeleRemi         = $strTeleDest;
            //-------------------------
            // Los montos se duplican
            //-------------------------
            $this->MontoBase     += $this->MontoBase;
            $this->MontoFranqueo += $this->MontoFranqueo;
            $this->MontoSeguro   += $this->MontoSeguro;
            $this->MontoIva      += $this->MontoIva;
            $this->MontoTotal    += $this->MontoTotal;
            $this->Save();
            //-----------------------------------------------
            // Se deja registro de la transaccion realizada
            //-----------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Guia';
            $arrLogxCamb['intRefeRegi'] = $this->NumeGuia;
            $arrLogxCamb['strNombRegi'] = $this->NombRemi;
            $arrLogxCamb['strDescCamb'] = "Se devolvio al Remitente";
            LogDeCambios($arrLogxCamb);
            //-----------------------------------------
            // Se graba el checkpoint correspondiente
            //-----------------------------------------
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumeGuia'] = $this->NumeGuia;
            $arrDatoCkpt['UltiCkpt'] = $this->CodiCkpt;
            $arrDatoCkpt['GuiaAnul'] = $this->Anulada;
            $arrDatoCkpt['CodiCkpt'] = $objCkptDevo->CodiCkpt;
            $arrDatoCkpt['TextCkpt'] = $objCkptDevo->DescCkpt;
            $arrDatoCkpt['CodiRuta'] = '';
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);

            return $arrResuGrab;
        }


        public static function RecolectasPendientes($strCodiOrig, $objOptionalClauses = null) {
            $strCadeSqlx  = "select distinct g.*,(fn_diastrans( now(), fech_guia ) - (fn_cantsados(fech_guia, now()) + fn_cantferiados(fech_guia, now()))) as dias_tran ";
            $strCadeSqlx .= "  from guia g ";
            $strCadeSqlx .= " where (fn_diastrans( now(), fech_guia ) - (fn_cantsados(fech_guia, now()) + fn_cantferiados(fech_guia, now()))) > 1  ";
            $strCadeSqlx .= "   and g.esta_orig  = '$strCodiOrig'";
            $strCadeSqlx .= "   and g.esta_ckpt  = g.esta_orig";
            $strCadeSqlx .= "   and g.codi_ckpt  = 'RP'";
            $strCadeSqlx .= " order by fech_ckpt desc, ";
            $strCadeSqlx .= "          hora_ckpt desc ";
//            echo "\n".$strCadeSqlx,"\n";
            $objDatabase  = Guia::GetDatabase();
            $objDbResult = $objDatabase->Query($strCadeSqlx);
            return Guia::InstantiateDbResult($objDbResult);
        }

        public function GetEstadisticaDeGuias($objOptionalClauses = null) {
            if ((is_null($this->strNumeGuia)))
                return null;

            try {
                return EstadisticaDeGuias::LoadByGuiaId($this->strNumeGuia, $objOptionalClauses);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
        }

        public function UltimaRuta() {
            $strCadeSqlx  = "select codi_ruta as CodiRuta ";
            $strCadeSqlx .= "  from guia_ckpt ";
            $strCadeSqlx .= " where guia_ckpt.nume_guia = '".$this->NumeGuia."'";
            $strCadeSqlx .= "   and length(codi_ruta) > 0 ";
            $strCadeSqlx .= " order by fech_ckpt desc, ";
            $strCadeSqlx .= "          hora_ckpt desc ";
            $strCadeSqlx .= " limit 1 ";
            $objDatabase  = Guia::GetDatabase();
            $objResulSet  = $objDatabase->Query($strCadeSqlx);
            $mixRegistro  = $objResulSet->FetchArray();
            return $mixRegistro['CodiRuta'];
        }

        public static function FechaUltimaGuiaDeCliente($intCodiClie) {
            $strCadeSqlx  = 'select fecha_ultima_guia as fech_guia ';
            $strCadeSqlx .= '  from fecha_ultima_guia ';
            $strCadeSqlx .= ' where cliente_id = '.$intCodiClie;
            $objDatabase  = Guia::GetDatabase();
            $objResulSet  = $objDatabase->Query($strCadeSqlx);
            $mixRegistro  = $objResulSet->FetchArray();
            return $mixRegistro['fech_guia'];
        }

        public function sePuedeBorrar() {
            $arrSepuBorr['TodoOkey'] = true;
            $arrSepuBorr['TextMens'] = '';
            if ($arrSepuBorr['TodoOkey']) {
                if ($this->strCodiCkpt == 'OK') {
                    $arrSepuBorr['TodoOkey'] = false;
                    $arrSepuBorr['TextMens'] = 'Guia Entregada. No se puede Borrar';
                }
            }
            if ($arrSepuBorr['TodoOkey']) {
                if ($this->strSistemaId == 'int') {
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

        /**
         * Esta rutina valida que la Guia pueda ser procesada en
         * forma "Operatativa" a atraves de las opciones del SDE
         *
         * @return $arrSepuProc arreglo de dos posiciones: una valor logico que determina
         * si la pieza se puede procesar o no y un mensaje al Usuario explicando la razon
         * por la cual no se puede procesar la guia
         */
        public function SePuedeProcesar() {
            $strMensUsua = '';
            $intCodiErro = 0;
            $blnTodoOkey = true;
            if ($this->intAnulada) {
                $strMensUsua = QApplication::Translate('Guia Eliminada');
                $intCodiErro = 2;
                $blnTodoOkey = false;
            }
            if ($blnTodoOkey) {
                if ($this->strCodiCkpt == 'OK') {
                    $strMensUsua = QApplication::Translate('Guia Entregada');
                    $intCodiErro = 3;
                    $blnTodoOkey = false;
                }
            }
            if ($blnTodoOkey) {
                if ($this->fltMontoTotal == 0) {
                    $strMensUsua = QApplication::Translate('Monto Cero');
                    $intCodiErro = 4;
                    $blnTodoOkey = false;
                }
            }
            $arrSepuProc['TodoOkey'] = $blnTodoOkey;
            $arrSepuProc['MensUsua'] = $strMensUsua;
            $arrSepuProc['CodiErro'] = $intCodiErro;
            return $arrSepuProc;
        }

        public function softDelete() {
            //-----------------------------------------------------------------------        
            // El softdelete de la Guia implica simplemente marcarla como "Anulada"
            //-----------------------------------------------------------------------
            $this->Anulada = 1;
            $this->save();
            //----------------------------------------------------------------------
            // Se deja rastro de la operacion en el Registro de Trabajo de la Guia
            //----------------------------------------------------------------------
            $objUsuaTran = unserialize($_SESSION['User']);
            $strTextMens = "Guia Eliminada...";
            $arrParaRegi['CodiCkpt'] = 'GE';
            $arrParaRegi['TextMens'] = $strTextMens;
            $arrParaRegi['NumeGuia'] = $this->NumeGuia;
            $arrParaRegi['CodiUsua'] = $objUsuaTran->CodiUsua;
            $arrParaRegi['CodiEsta'] = $objUsuaTran->CodiEsta;
            CrearRegistroDeTrabajo($arrParaRegi);
            //------------------------------------------------------------
            // Se deja rastro de la operacion en el log de transacciones
            //------------------------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Guia';
            $arrLogxCamb['intRefeRegi'] = $this->NumeGuia;
            $arrLogxCamb['strNombRegi'] = $this->NombRemi;
            $arrLogxCamb['strDescCamb'] = "SoftDelete";
            LogDeCambios($arrLogxCamb);
        }

        public function Recuperar() {
            //-----------------------------------------------------------------------
            // Recuperar la Guia implica simplemente des-marcarla como "Anulada"
            //-----------------------------------------------------------------------
            $this->Anulada = 0;
            $this->save();
            //----------------------------------------------------------------------
            // Se deja rastro de la operacion en el Registro de Trabajo de la Guia
            //----------------------------------------------------------------------
            $objUsuaTran = unserialize($_SESSION['User']);
            $strTextMens = "Guia Recuperada...";
            $arrParaRegi['CodiCkpt'] = 'GR';
            $arrParaRegi['TextMens'] = $strTextMens;
            $arrParaRegi['NumeGuia'] = $this->NumeGuia;
            $arrParaRegi['CodiUsua'] = $objUsuaTran->CodiUsua;
            $arrParaRegi['CodiEsta'] = $objUsuaTran->CodiEsta;
            CrearRegistroDeTrabajo($arrParaRegi);
            //------------------------------------------------------------
            // Se deja rastro de la operacion en el log de transacciones
            //------------------------------------------------------------
            $arrLogxCamb['strNombTabl'] = 'Guia';
            $arrLogxCamb['intRefeRegi'] = $this->NumeGuia;
            $arrLogxCamb['strNombRegi'] = $this->NombRemi;
            $arrLogxCamb['strDescCamb'] = "Recuperada";
            LogDeCambios($arrLogxCamb);
        }

        public function Borrar($blnSoftDele=true) {
            if ($blnSoftDele) {
                $this->softDelete();
            } else {
                $arrRegiProc = SreGuiaCkpt::LoadArrayByNumeGuia($this->strNumeGuia);
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }

                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::SreGuia()->NumeGuia,$this->strNumeGuia);
                $arrRegiProc = SreGuia::QueryArray(QQ::AndCondition($objClauWher));
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }

                $arrRegiProc = GuiaCkpt::LoadArrayByNumeGuia($this->strNumeGuia);
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }

                $arrRegiProc = RegistroTrabajo::LoadArrayByGuiaId($this->strNumeGuia);
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }

                $arrRegiProc = Notificacion::LoadArrayByGuiaId($this->strNumeGuia);
                foreach ($arrRegiProc as $objRegiProc) {
                    $objRegiProc->Delete();
                }

                $strCadeSqlx  = 'delete ';
                $strCadeSqlx .= '  from sde_contenedor_guia_assn ';
                $strCadeSqlx .= ' where nume_guia = "'.$this->strNumeGuia.'"';
                $objDatabase  = Guia::GetDatabase();
                $objDatabase->NonQuery($strCadeSqlx);

                $strCadeSqlx  = 'delete ';
                $strCadeSqlx .= '  from guia ';
                $strCadeSqlx .= ' where nume_guia = "'.$this->strNumeGuia.'"';
                $objDatabase  = Guia::GetDatabase();
                $objDatabase->NonQuery($strCadeSqlx);
                //------------------------------------------------------------
                // Se deja rastro de la operacion en el log de transacciones
                //------------------------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Guia';
                $arrLogxCamb['intRefeRegi'] = $this->NumeGuia;
                $arrLogxCamb['strNombRegi'] = $this->NombRemi;
                $arrLogxCamb['strDescCamb'] = "Borrada";
                LogDeCambios($arrLogxCamb);
            }

        }

        public function EsRetornoDeOtraGuia() {
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::Equal(QQN::Guia()->GuiaRetorno,$this->strNumeGuia);
            return Guia::QueryCount(QQ::AndCondition($objClausula));
        }

        public function EstaFacturada() {
            if (!is_null($this->intFacturaId)) {
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::FacturaPmn()->Id,$this->intFacturaId);
                $objClauWher[] = QQ::Equal(QQN::FacturaPmn()->ImpresaId,SinoType::SI);
                // $objClauWher[] = QQ::Equal(QQN::FacturaPmn()->Estatus,'C');
                return FacturaPmn::QueryCount(QQ::AndCondition($objClauWher));
            } else {
                return false;
            }
        }

        public function EstaPreFacturada() {
            // if (!is_null($this->intFacturaId)) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::ItemFacturaPmn()->GuiaId,$this->strNumeGuia);
            // $objClauWher[] = QQ::NotEqual(QQN::FacturaPmn()->Estatus,'A');
            return ItemFacturaPmn::QueryCount(QQ::AndCondition($objClauWher));
            // return $this->FacturaId ? true : false;
            // } else {
            // return false;
            // }
        }

        public function EliminarPOD() {
            $this->strEntregadoA   = null;
            $this->dttFechaEntrega = null;
            $this->strHoraEntrega  = null;
            $this->dttFechaPod     = null;
            $this->strHoraPod      = null;
            $this->intUsuarioPod   = null;
            $this->Save();
            //------------------------------------------------------
            // Se elimina el checkpoint "OK" relacionado a la Guia
            //------------------------------------------------------
            $objDataBase = $this->GetDatabase();
            $strCadeSqlx  = " delete ";
            $strCadeSqlx .= "   from guia_ckpt ";
            $strCadeSqlx .= "  where nume_guia = '".$this->strNumeGuia."'";
            $strCadeSqlx .= "    and codi_ckpt = 'OK'";
            $objDataBase->NonQuery($strCadeSqlx);
        }

        public function ultimoCheckpointEnSucursal($strCodiSucu) {
            // This will return a count of Guia objects
            $objClausula = QQ::Clause();
            $objClausula[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $this->strNumeGuia);
            $objClausula[] = QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $strCodiSucu);
            $objOtraClau[] = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt,false,QQN::GuiaCkpt()->HoraCkpt,false);
            $objOtraClau[] = QQ::LimitInfo(1);
            $arrGuiaCkpt = GuiaCkpt::QueryArray(QQ::AndCondition($objClausula),$objOtraClau);
            return (count($arrGuiaCkpt)) ? $arrGuiaCkpt[0]->CodiCkpt : null;
        }

        // ------------------------------------------------
        // Funciones para validación con notificaciones SMS
        // ------------------------------------------------
        public function NotificableSMS() {
            $arrNotiSmsx = array();
            $arrNotiSmsx['NotiSmsx'] = false;
            $arrCkptSmsx = unserialize($_SESSION['CkptSmsy']);
            foreach ($arrCkptSmsx as $strCkptSmsx) {
                if ($this->tieneCheckpointEnSucursal($strCkptSmsx, $this->strEstaDest)) {
                    $objGuiaCkpt = GuiaCkpt::LoadByNumeGuiaCodiEstaCodiCkpt($this->strNumeGuia, $this->strEstaDest, $strCkptSmsx);
                    $strTipoMens = $this->TipoSms($objGuiaCkpt);
                    if (!$this->tieneNotificacionSms($strTipoMens)) {
                        $arrNotiSmsx['NotiSmsx'] = true;
                        $arrNotiSmsx['TipoSmsx'] = $strTipoMens;
                        $arrNotiSmsx['CodiCkpt'] = $strCkptSmsx;
                    }
                    break;
                }
            }
            return $arrNotiSmsx;
        }

        public function TipoSms(GuiaCkpt $objGuiaCkpt) {
            $dttFechHoyx = date("Y-m-d");
            $intDiasCkpt = (strtotime($objGuiaCkpt->FechCkpt)-strtotime($dttFechHoyx))/86400;
            $intDiasCkpt = abs($intDiasCkpt);
            $strTipoNoti = '';

            if ($intDiasCkpt == 0) {
                if (!substr_count($this->strDireDest, 'OFICINA LIBERTY')) {
                    /* Se asume que se trata de servicio a domicilio */
                    //$strTipoNoti = "CDDO";
                    $strTipoNoti = "ConfDomi";
                } else {
                    //$strTipoNoti = "CDRC";
                    $strTipoNoti = "ConfDest";
                }
                //$strTipoNoti = $strNoti;
            } elseif ($intDiasCkpt >= 5 && $intDiasCkpt < 10) {
                //$strTipoNoti = 'CD5D';
                $strTipoNoti = 'Dest5dia';
            } elseif ($intDiasCkpt >= 10) {
                //$strTipoNoti = 'CD10';
                $strTipoNoti = 'Dest10di';
            }
            return $strTipoNoti;
        }

        public function tieneNotificacionSms($strTipoMens) {
            $objClauWher = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Notificacion()->GuiaId, $this->strNumeGuia);
            $objClauWher[] = QQ::Equal(QQN::Notificacion()->TipoSms, $strTipoMens);
            return Notificacion::QueryCount(QQ::AndCondition($objClauWher));
        }

        public function tieneCheckpointEnSucursal($strCodiCkpt,$strCodiSucu) {
            // This will return a count of Guia objects
            return GuiaCkpt::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $this->strNumeGuia),
                    QQ::Equal(QQN::GuiaCkpt()->CodiCkpt, $strCodiCkpt),
                    QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $strCodiSucu)
                )
            );
        }

        public function checkpoint($strCodiCkpt) {
            return GuiaCkpt::QuerySingle(
                QQ::AndCondition(
                    QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $this->strNumeGuia),
                    QQ::Equal(QQN::GuiaCkpt()->CodiCkpt, $strCodiCkpt)
                )
            );
        }

        public function tieneCheckpoint($strCodiCkpt) {
            // This will return a count of Guia objects
            return GuiaCkpt::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $this->strNumeGuia),
                    QQ::Equal(QQN::GuiaCkpt()->CodiCkpt, $strCodiCkpt)
                )
            );
        }

        public static function EntregasPorCodiOper($intCodiOper) {
            // Performing the load manually (instead of using QCubed Query)
            $dttFechDhoy = date('Y-m-d');

            // Get the Database Object for this Class
            $objDatabase = Guia::GetDatabase();

            // Setup the SQL Query
            $strCadeSqlx = sprintf("
                SELECT
                    *
                FROM
                    `v_entrega_pendiente`
                WHERE
                    operacion_id = %s
                LIMIT 25",
                $intCodiOper);

            //DATE(fech_guia) = '%s'
            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strCadeSqlx);
            return Guia::InstantiateDbResult($objDbResult);
        }

        public static function CantidadEntregasPorCodiOper($intCodiOper) {
            return count(Guia::EntregasPorCodiOper($intCodiOper));
        }

        public static function EntregasRealizadasHoy($intCodiOper) {
            // Performing the load manually (instead of using QCubed Query)
            $dttFechDhoy = date('Y-m-d');

            // Get the Database Object for this Class
            $objDatabase = Guia::GetDatabase();

            // Setup the SQL Query
            $strCadeSqlx = sprintf("
                SELECT
                    *
                FROM
                    `v_entrega_realizada`
                WHERE
                    operacion_id = %s
                LIMIT 25",
                $intCodiOper);

            //DATE(fech_guia) = '%s'
            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strCadeSqlx);
            return Guia::InstantiateDbResult($objDbResult);
        }

        public static function CantidadEntregasRealizadasHoy($intCodiOper) {
            return count(Guia::EntregasRealizadasHoy($intCodiOper));
        }

        /**
         * Función para cargar guías del día de hoy por el id del Cliente.
         *
         * @param $intCodiClie
         * @return Guia[]
         */
        public static function CargarGuiasDeHoyPorClienteId($intCodiClie) {
            $dteFechDhoy = FechaDeHoy();
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::Equal(QQN::Guia()->FechGuia,$dteFechDhoy);
            $objClausula[] = QQ::Equal(QQN::Guia()->CodiClie,$intCodiClie);
            return Guia::QueryArray(QQ::AndCondition($objClausula));
        }

        /**
         * Función para obtener la cantidad de guías del día de hoy por el id del Cliente.
         *
         * @param $intCodiClie
         * @return int
         */
        public static function CantidadCargaDeGuiasDeHoyPorClienteId($intCodiClie) {
            return count(Guia::CargarGuiasDeHoyPorClienteId($intCodiClie));
        }

        /**
         * Función que devuelve un vector de datos de guías del día de hoy por el id del Cliente.
         *
         * @param $intCodiClie
         * @return array
         */
        public static function ManifiestoDiarioPorClienteId($intCodiClie) {
            $arrGuiaDhoy = Guia::CargarGuiasDeHoyPorClienteId($intCodiClie);
            $arrManiDiar = array();

            foreach ($arrGuiaDhoy as $objGuiaDhoy) {
                $arrManiDiar[] = array(
                    $objGuiaDhoy->NumeGuia,
                    $objGuiaDhoy->FechGuia->__toString("DD/MM/YYYY"),
                    substr($objGuiaDhoy->NombRemi,0,30),
                    substr($objGuiaDhoy->NombDest,0,30),
                    $objGuiaDhoy->PesoGuia,
                    $objGuiaDhoy->CantPiez,
                    TipoGuiaType::ToStringCorto($objGuiaDhoy->TipoGuia),
                    $objGuiaDhoy->EstaOrig."-".$objGuiaDhoy->EstaDest
                );
            }

            return $arrManiDiar;
        }

        public function ultimoCheckpointDeConfirmacion_o_Almacen($arrCkptConf) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::GuiaCkpt()->CodiCkpt,$arrCkptConf);
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia,$this->strNumeGuia);
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt,false,QQN::GuiaCkpt()->HoraCkpt,false);
            $arrCkptGuia   = GuiaCkpt::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            if ($arrCkptGuia) {
                $strCodiCkpt = $arrCkptGuia[0]->CodiCkpt;
            } else {
                $strCodiCkpt = null;
            }
            return $strCodiCkpt;
        }

        // Override or Create New Load/Count methods
        // (For obvious reasons, these methods are commented out...
        // but feel free to use these as a starting point)
        /*
        public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
            // This will return an array of Guia objects
            return Guia::QueryArray(
                QQ::AndCondition(
                    QQ::Equal(QQN::Guia()->Param1, $strParam1),
                    QQ::GreaterThan(QQN::Guia()->Param2, $intParam2)
                ),
                $objOptionalClauses
            );
        }

        public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
            // This will return a single Guia object
            return Guia::QuerySingle(
                QQ::AndCondition(
                    QQ::Equal(QQN::Guia()->Param1, $strParam1),
                    QQ::GreaterThan(QQN::Guia()->Param2, $intParam2)
                ),
                $objOptionalClauses
            );
        }

        public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
            // This will return a count of Guia objects
            return Guia::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::Guia()->Param1, $strParam1),
                    QQ::Equal(QQN::Guia()->Param2, $intParam2)
                ),
                $objOptionalClauses
            );
        }

        public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
            // Performing the load manually (instead of using QCubed Query)

            // Get the Database Object for this Class
            $objDatabase = Guia::GetDatabase();

            // Properly Escape All Input Parameters using Database->SqlVariable()
            $strParam1 = $objDatabase->SqlVariable($strParam1);
            $intParam2 = $objDatabase->SqlVariable($intParam2);

            // Setup the SQL Query
            $strQuery = sprintf('
                SELECT
                    `guia`.*
                FROM
                    `guia` AS `guia`
                WHERE
                    param_1 = %s AND
                    param_2 < %s',
                $strParam1, $intParam2);

            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strQuery);
            return Guia::InstantiateDbResult($objDbResult);
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
