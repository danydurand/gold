<?php
	/**
	 * The abstract GuiaCacesaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GuiaCacesa subclass which
	 * extends this GuiaCacesaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GuiaCacesa class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property QDateTime $FechCarg the value for dttFechCarg (Not Null)
	 * @property QDateTime $HoraCarg the value for dttHoraCarg (Not Null)
	 * @property boolean $Procesada the value for blnProcesada 
	 * @property string $NumeGuia the value for strNumeGuia 
	 * @property string $GuiaExte the value for strGuiaExte 
	 * @property string $IdPieza the value for strIdPieza 
	 * @property string $OrigGuia the value for strOrigGuia (Not Null)
	 * @property string $DestGuia the value for strDestGuia 
	 * @property string $NombRemi the value for strNombRemi (Not Null)
	 * @property string $DireRemi the value for strDireRemi (Not Null)
	 * @property string $TeleRemi the value for strTeleRemi (Not Null)
	 * @property string $NombDest the value for strNombDest (Not Null)
	 * @property string $DireDest the value for strDireDest (Not Null)
	 * @property string $TeleDest the value for strTeleDest (Not Null)
	 * @property string $CeluDest the value for strCeluDest (Not Null)
	 * @property string $DescCont the value for strDescCont (Not Null)
	 * @property integer $CantPiez the value for intCantPiez (Not Null)
	 * @property string $PesoGuia the value for strPesoGuia (Not Null)
	 * @property double $ValorDeclarado the value for fltValorDeclarado 
	 * @property string $CedulaRif the value for strCedulaRif 
	 * @property string $RegistradoPor the value for strRegistradoPor (Not Null)
	 * @property string $ProcesadoPor the value for strProcesadoPor 
	 * @property QDateTime $FechProc the value for dttFechProc 
	 * @property QDateTime $HoraProc the value for dttHoraProc 
	 * @property boolean $Ajustar the value for blnAjustar 
	 * @property string $OtroDestino the value for strOtroDestino 
	 * @property string $Observacion the value for strObservacion 
	 * @property integer $TarifaId the value for intTarifaId (Not Null)
	 * @property integer $ClienteId the value for intClienteId (Not Null)
	 * @property integer $ProcesoId the value for intProcesoId (Not Null)
	 * @property string $CodigoContrato the value for strCodigoContrato 
	 * @property string $ModaPago the value for strModaPago 
	 * @property integer $ReceptoriaDestino the value for intReceptoriaDestino 
	 * @property double $Largo the value for fltLargo 
	 * @property double $Ancho the value for fltAncho 
	 * @property double $Alto the value for fltAlto 
	 * @property string $ServicioEntrega the value for strServicioEntrega 
	 * @property string $ServicioImportacion the value for strServicioImportacion 
	 * @property double $Libras the value for fltLibras 
	 * @property double $Kilos the value for fltKilos (Not Null)
	 * @property double $Volumen the value for fltVolumen 
	 * @property double $PiesCub the value for fltPiesCub 
	 * @property integer $NotaEntregaId the value for intNotaEntregaId 
	 * @property MasterCliente $Cliente the value for the MasterCliente object referenced by intClienteId (Not Null)
	 * @property NotaEntrega $NotaEntrega the value for the NotaEntrega object referenced by intNotaEntregaId 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiaCacesaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column guia_cacesa.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.fech_carg
		 * @var QDateTime dttFechCarg
		 */
		protected $dttFechCarg;
		const FechCargDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.hora_carg
		 * @var QDateTime dttHoraCarg
		 */
		protected $dttHoraCarg;
		const HoraCargDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.procesada
		 * @var boolean blnProcesada
		 */
		protected $blnProcesada;
		const ProcesadaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.nume_guia
		 * @var string strNumeGuia
		 */
		protected $strNumeGuia;
		const NumeGuiaMaxLength = 20;
		const NumeGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.guia_exte
		 * @var string strGuiaExte
		 */
		protected $strGuiaExte;
		const GuiaExteMaxLength = 50;
		const GuiaExteDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.id_pieza
		 * @var string strIdPieza
		 */
		protected $strIdPieza;
		const IdPiezaMaxLength = 3;
		const IdPiezaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.orig_guia
		 * @var string strOrigGuia
		 */
		protected $strOrigGuia;
		const OrigGuiaMaxLength = 3;
		const OrigGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.dest_guia
		 * @var string strDestGuia
		 */
		protected $strDestGuia;
		const DestGuiaMaxLength = 3;
		const DestGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.nomb_remi
		 * @var string strNombRemi
		 */
		protected $strNombRemi;
		const NombRemiMaxLength = 100;
		const NombRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.dire_remi
		 * @var string strDireRemi
		 */
		protected $strDireRemi;
		const DireRemiMaxLength = 300;
		const DireRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.tele_remi
		 * @var string strTeleRemi
		 */
		protected $strTeleRemi;
		const TeleRemiMaxLength = 50;
		const TeleRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.nomb_dest
		 * @var string strNombDest
		 */
		protected $strNombDest;
		const NombDestMaxLength = 200;
		const NombDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.dire_dest
		 * @var string strDireDest
		 */
		protected $strDireDest;
		const DireDestMaxLength = 300;
		const DireDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.tele_dest
		 * @var string strTeleDest
		 */
		protected $strTeleDest;
		const TeleDestMaxLength = 50;
		const TeleDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.celu_dest
		 * @var string strCeluDest
		 */
		protected $strCeluDest;
		const CeluDestMaxLength = 20;
		const CeluDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.desc_cont
		 * @var string strDescCont
		 */
		protected $strDescCont;
		const DescContMaxLength = 400;
		const DescContDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.cant_piez
		 * @var integer intCantPiez
		 */
		protected $intCantPiez;
		const CantPiezDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.peso_guia
		 * @var string strPesoGuia
		 */
		protected $strPesoGuia;
		const PesoGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.valor_declarado
		 * @var double fltValorDeclarado
		 */
		protected $fltValorDeclarado;
		const ValorDeclaradoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.registrado_por
		 * @var string strRegistradoPor
		 */
		protected $strRegistradoPor;
		const RegistradoPorMaxLength = 8;
		const RegistradoPorDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.procesado_por
		 * @var string strProcesadoPor
		 */
		protected $strProcesadoPor;
		const ProcesadoPorMaxLength = 8;
		const ProcesadoPorDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.fech_proc
		 * @var QDateTime dttFechProc
		 */
		protected $dttFechProc;
		const FechProcDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.hora_proc
		 * @var QDateTime dttHoraProc
		 */
		protected $dttHoraProc;
		const HoraProcDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.ajustar
		 * @var boolean blnAjustar
		 */
		protected $blnAjustar;
		const AjustarDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.otro_destino
		 * @var string strOtroDestino
		 */
		protected $strOtroDestino;
		const OtroDestinoMaxLength = 50;
		const OtroDestinoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.tarifa_id
		 * @var integer intTarifaId
		 */
		protected $intTarifaId;
		const TarifaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.proceso_id
		 * @var integer intProcesoId
		 */
		protected $intProcesoId;
		const ProcesoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.codigo_contrato
		 * @var string strCodigoContrato
		 */
		protected $strCodigoContrato;
		const CodigoContratoMaxLength = 50;
		const CodigoContratoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.moda_pago
		 * @var string strModaPago
		 */
		protected $strModaPago;
		const ModaPagoMaxLength = 3;
		const ModaPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.receptoria_destino
		 * @var integer intReceptoriaDestino
		 */
		protected $intReceptoriaDestino;
		const ReceptoriaDestinoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.largo
		 * @var double fltLargo
		 */
		protected $fltLargo;
		const LargoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.ancho
		 * @var double fltAncho
		 */
		protected $fltAncho;
		const AnchoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.alto
		 * @var double fltAlto
		 */
		protected $fltAlto;
		const AltoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.servicio_entrega
		 * @var string strServicioEntrega
		 */
		protected $strServicioEntrega;
		const ServicioEntregaMaxLength = 3;
		const ServicioEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.servicio_importacion
		 * @var string strServicioImportacion
		 */
		protected $strServicioImportacion;
		const ServicioImportacionMaxLength = 3;
		const ServicioImportacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.libras
		 * @var double fltLibras
		 */
		protected $fltLibras;
		const LibrasDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.kilos
		 * @var double fltKilos
		 */
		protected $fltKilos;
		const KilosDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.volumen
		 * @var double fltVolumen
		 */
		protected $fltVolumen;
		const VolumenDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.pies_cub
		 * @var double fltPiesCub
		 */
		protected $fltPiesCub;
		const PiesCubDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_cacesa.nota_entrega_id
		 * @var integer intNotaEntregaId
		 */
		protected $intNotaEntregaId;
		const NotaEntregaIdDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_cacesa.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCliente
		 */
		protected $objCliente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_cacesa.nota_entrega_id.
		 *
		 * NOTE: Always use the NotaEntrega property getter to correctly retrieve this NotaEntrega object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var NotaEntrega objNotaEntrega
		 */
		protected $objNotaEntrega;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = GuiaCacesa::IdDefault;
			$this->dttFechCarg = (GuiaCacesa::FechCargDefault === null)?null:new QDateTime(GuiaCacesa::FechCargDefault);
			$this->dttHoraCarg = (GuiaCacesa::HoraCargDefault === null)?null:new QDateTime(GuiaCacesa::HoraCargDefault);
			$this->blnProcesada = GuiaCacesa::ProcesadaDefault;
			$this->strNumeGuia = GuiaCacesa::NumeGuiaDefault;
			$this->strGuiaExte = GuiaCacesa::GuiaExteDefault;
			$this->strIdPieza = GuiaCacesa::IdPiezaDefault;
			$this->strOrigGuia = GuiaCacesa::OrigGuiaDefault;
			$this->strDestGuia = GuiaCacesa::DestGuiaDefault;
			$this->strNombRemi = GuiaCacesa::NombRemiDefault;
			$this->strDireRemi = GuiaCacesa::DireRemiDefault;
			$this->strTeleRemi = GuiaCacesa::TeleRemiDefault;
			$this->strNombDest = GuiaCacesa::NombDestDefault;
			$this->strDireDest = GuiaCacesa::DireDestDefault;
			$this->strTeleDest = GuiaCacesa::TeleDestDefault;
			$this->strCeluDest = GuiaCacesa::CeluDestDefault;
			$this->strDescCont = GuiaCacesa::DescContDefault;
			$this->intCantPiez = GuiaCacesa::CantPiezDefault;
			$this->strPesoGuia = GuiaCacesa::PesoGuiaDefault;
			$this->fltValorDeclarado = GuiaCacesa::ValorDeclaradoDefault;
			$this->strCedulaRif = GuiaCacesa::CedulaRifDefault;
			$this->strRegistradoPor = GuiaCacesa::RegistradoPorDefault;
			$this->strProcesadoPor = GuiaCacesa::ProcesadoPorDefault;
			$this->dttFechProc = (GuiaCacesa::FechProcDefault === null)?null:new QDateTime(GuiaCacesa::FechProcDefault);
			$this->dttHoraProc = (GuiaCacesa::HoraProcDefault === null)?null:new QDateTime(GuiaCacesa::HoraProcDefault);
			$this->blnAjustar = GuiaCacesa::AjustarDefault;
			$this->strOtroDestino = GuiaCacesa::OtroDestinoDefault;
			$this->strObservacion = GuiaCacesa::ObservacionDefault;
			$this->intTarifaId = GuiaCacesa::TarifaIdDefault;
			$this->intClienteId = GuiaCacesa::ClienteIdDefault;
			$this->intProcesoId = GuiaCacesa::ProcesoIdDefault;
			$this->strCodigoContrato = GuiaCacesa::CodigoContratoDefault;
			$this->strModaPago = GuiaCacesa::ModaPagoDefault;
			$this->intReceptoriaDestino = GuiaCacesa::ReceptoriaDestinoDefault;
			$this->fltLargo = GuiaCacesa::LargoDefault;
			$this->fltAncho = GuiaCacesa::AnchoDefault;
			$this->fltAlto = GuiaCacesa::AltoDefault;
			$this->strServicioEntrega = GuiaCacesa::ServicioEntregaDefault;
			$this->strServicioImportacion = GuiaCacesa::ServicioImportacionDefault;
			$this->fltLibras = GuiaCacesa::LibrasDefault;
			$this->fltKilos = GuiaCacesa::KilosDefault;
			$this->fltVolumen = GuiaCacesa::VolumenDefault;
			$this->fltPiesCub = GuiaCacesa::PiesCubDefault;
			$this->intNotaEntregaId = GuiaCacesa::NotaEntregaIdDefault;
		}


		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a GuiaCacesa from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCacesa
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaCacesa', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = GuiaCacesa::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCacesa()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all GuiaCacesas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCacesa[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GuiaCacesa::QueryArray to perform the LoadAll query
			try {
				return GuiaCacesa::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GuiaCacesas
		 * @return int
		 */
		public static function CountAll() {
			// Call GuiaCacesa::QueryCount to perform the CountAll query
			return GuiaCacesa::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCUBED QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcubed Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = GuiaCacesa::GetDatabase();

			// Create/Build out the QueryBuilder object with GuiaCacesa-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guia_cacesa');

			$blnAddAllFieldsToSelect = true;
			if ($objDatabase->OnlyFullGroupBy) {
				// see if we have any group by or aggregation clauses, if yes, don't add the fields to select clause
				if ($objOptionalClauses instanceof QQClause) {
					if ($objOptionalClauses instanceof QQAggregationClause || $objOptionalClauses instanceof QQGroupBy) {
						$blnAddAllFieldsToSelect = false;
					}
				} else if (is_array($objOptionalClauses)) {
					foreach ($objOptionalClauses as $objClause) {
						if ($objClause instanceof QQAggregationClause || $objClause instanceof QQGroupBy) {
							$blnAddAllFieldsToSelect = false;
							break;
						}
					}
				}
			}
			if ($blnAddAllFieldsToSelect) {
				GuiaCacesa::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guia_cacesa');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcubed Query method to query for a single GuiaCacesa object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaCacesa the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCacesa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GuiaCacesa object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiaCacesa::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if(null === $objDbRow)
					return null;
				return GuiaCacesa::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of GuiaCacesa objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaCacesa[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCacesa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GuiaCacesa::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = GuiaCacesa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcubed Query method to query for a count of GuiaCacesa objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCacesa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause) {
					if ($objOptionalClauses instanceof QQGroupBy) {
						$blnGrouped = true;
					}
				} else if (is_array($objOptionalClauses)) {
					foreach ($objOptionalClauses as $objClause) {
						if ($objClause instanceof QQGroupBy) {
							$blnGrouped = true;
							break;
						}
					}
				} else {
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

		public static function QueryArrayCached(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiaCacesa::GetDatabase();

			$strQuery = GuiaCacesa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guiacacesa', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GuiaCacesa::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GuiaCacesa
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guia_cacesa';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'fech_carg', $strAliasPrefix . 'fech_carg');
			    $objBuilder->AddSelectItem($strTableName, 'hora_carg', $strAliasPrefix . 'hora_carg');
			    $objBuilder->AddSelectItem($strTableName, 'procesada', $strAliasPrefix . 'procesada');
			    $objBuilder->AddSelectItem($strTableName, 'nume_guia', $strAliasPrefix . 'nume_guia');
			    $objBuilder->AddSelectItem($strTableName, 'guia_exte', $strAliasPrefix . 'guia_exte');
			    $objBuilder->AddSelectItem($strTableName, 'id_pieza', $strAliasPrefix . 'id_pieza');
			    $objBuilder->AddSelectItem($strTableName, 'orig_guia', $strAliasPrefix . 'orig_guia');
			    $objBuilder->AddSelectItem($strTableName, 'dest_guia', $strAliasPrefix . 'dest_guia');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_remi', $strAliasPrefix . 'nomb_remi');
			    $objBuilder->AddSelectItem($strTableName, 'dire_remi', $strAliasPrefix . 'dire_remi');
			    $objBuilder->AddSelectItem($strTableName, 'tele_remi', $strAliasPrefix . 'tele_remi');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_dest', $strAliasPrefix . 'nomb_dest');
			    $objBuilder->AddSelectItem($strTableName, 'dire_dest', $strAliasPrefix . 'dire_dest');
			    $objBuilder->AddSelectItem($strTableName, 'tele_dest', $strAliasPrefix . 'tele_dest');
			    $objBuilder->AddSelectItem($strTableName, 'celu_dest', $strAliasPrefix . 'celu_dest');
			    $objBuilder->AddSelectItem($strTableName, 'desc_cont', $strAliasPrefix . 'desc_cont');
			    $objBuilder->AddSelectItem($strTableName, 'cant_piez', $strAliasPrefix . 'cant_piez');
			    $objBuilder->AddSelectItem($strTableName, 'peso_guia', $strAliasPrefix . 'peso_guia');
			    $objBuilder->AddSelectItem($strTableName, 'valor_declarado', $strAliasPrefix . 'valor_declarado');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'registrado_por', $strAliasPrefix . 'registrado_por');
			    $objBuilder->AddSelectItem($strTableName, 'procesado_por', $strAliasPrefix . 'procesado_por');
			    $objBuilder->AddSelectItem($strTableName, 'fech_proc', $strAliasPrefix . 'fech_proc');
			    $objBuilder->AddSelectItem($strTableName, 'hora_proc', $strAliasPrefix . 'hora_proc');
			    $objBuilder->AddSelectItem($strTableName, 'ajustar', $strAliasPrefix . 'ajustar');
			    $objBuilder->AddSelectItem($strTableName, 'otro_destino', $strAliasPrefix . 'otro_destino');
			    $objBuilder->AddSelectItem($strTableName, 'observacion', $strAliasPrefix . 'observacion');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_id', $strAliasPrefix . 'tarifa_id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'proceso_id', $strAliasPrefix . 'proceso_id');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_contrato', $strAliasPrefix . 'codigo_contrato');
			    $objBuilder->AddSelectItem($strTableName, 'moda_pago', $strAliasPrefix . 'moda_pago');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_destino', $strAliasPrefix . 'receptoria_destino');
			    $objBuilder->AddSelectItem($strTableName, 'largo', $strAliasPrefix . 'largo');
			    $objBuilder->AddSelectItem($strTableName, 'ancho', $strAliasPrefix . 'ancho');
			    $objBuilder->AddSelectItem($strTableName, 'alto', $strAliasPrefix . 'alto');
			    $objBuilder->AddSelectItem($strTableName, 'servicio_entrega', $strAliasPrefix . 'servicio_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'servicio_importacion', $strAliasPrefix . 'servicio_importacion');
			    $objBuilder->AddSelectItem($strTableName, 'libras', $strAliasPrefix . 'libras');
			    $objBuilder->AddSelectItem($strTableName, 'kilos', $strAliasPrefix . 'kilos');
			    $objBuilder->AddSelectItem($strTableName, 'volumen', $strAliasPrefix . 'volumen');
			    $objBuilder->AddSelectItem($strTableName, 'pies_cub', $strAliasPrefix . 'pies_cub');
			    $objBuilder->AddSelectItem($strTableName, 'nota_entrega_id', $strAliasPrefix . 'nota_entrega_id');
            }
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Do a possible array expansion on the given node. If the node is an ExpandAsArray node,
		 * it will add to the corresponding array in the object. Otherwise, it will follow the node
		 * so that any leaf expansions can be handled.
		 *  
		 * @param DatabaseRowBase $objDbRow
		 * @param QQBaseNode $objChildNode
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 */
		
		public static function ExpandArray ($objDbRow, $strAliasPrefix, $objNode, $objPreviousItemArray, $strColumnAliasArray) {
			if (!$objNode->ChildNodeArray) {
				return false;
			}
			
			$strAlias = $strAliasPrefix . 'id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
					continue;
				}
				
				foreach ($objNode->ChildNodeArray as $objChildNode) {	
					$strPropName = $objChildNode->_PropertyName;
					$strClassName = $objChildNode->_ClassName;
					$blnExpanded = false;
					$strLongAlias = $objChildNode->ExtendedAlias();
				
					if ($objChildNode->ExpandAsArray) {
						$strVarName = '_obj' . $strPropName . 'Array';
						if (null === $objPreviousItem->$strVarName) {
							$objPreviousItem->$strVarName = array();
						}
						if ($intPreviousChildItemCount = count($objPreviousItem->$strVarName)) {
							$objPreviousChildItems = $objPreviousItem->$strVarName;
							if ($objChildNode->_Type == "association") {
								$objChildNode = $objChildNode->FirstChild();
							}
							$nextAlias = $objChildNode->ExtendedAlias() . '__';
							
							$objChildItem = call_user_func(array ($strClassName, 'InstantiateDbRow'), $objDbRow, $nextAlias, $objChildNode, $objPreviousChildItems, $strColumnAliasArray);
							if ($objChildItem) {
								$objPreviousItem->{$strVarName}[] = $objChildItem;
								$blnExpanded = true;
							} elseif ($objChildItem === false) {
								$blnExpanded = true;
							}
						}
					} else {
	
						// Follow single node if keys match
						$nodeType = $objChildNode->_Type;
						if ($nodeType == 'reverse_reference' || $nodeType == 'association') {
							$strVarName = '_obj' . $strPropName;
						} else {	
							$strVarName = 'obj' . $strPropName;
						}
						
						if (null === $objPreviousItem->$strVarName) {
							return false;
						}
											
						$objPreviousChildItems = array($objPreviousItem->$strVarName);
						$blnResult = call_user_func(array ($strClassName, 'ExpandArray'), $objDbRow, $strLongAlias . '__', $objChildNode, $objPreviousChildItems, $strColumnAliasArray);
		
						if ($blnResult) {
							$blnExpanded = true;
						}		
					}
				}	
			}
			return $blnExpanded;
		}
		
		/**
		 * Instantiate a GuiaCacesa from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GuiaCacesa::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a GuiaCacesa, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['id']) ? $strColumnAliasArray['id'] : 'id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (GuiaCacesa::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the GuiaCacesa object
			$objToReturn = new GuiaCacesa();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_carg';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCarg = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_carg';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttHoraCarg = $objDbRow->GetColumn($strAliasName, 'Time');
			$strAlias = $strAliasPrefix . 'procesada';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnProcesada = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'guia_exte';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaExte = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'id_pieza';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIdPieza = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'orig_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strOrigGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dest_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDestGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nomb_remi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombRemi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_remi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireRemi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_remi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleRemi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nomb_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'celu_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCeluDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescCont = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cant_piez';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantPiez = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'peso_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPesoGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'valor_declarado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorDeclarado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'registrado_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRegistradoPor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'procesado_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strProcesadoPor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_proc';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechProc = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_proc';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttHoraProc = $objDbRow->GetColumn($strAliasName, 'Time');
			$strAlias = $strAliasPrefix . 'ajustar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnAjustar = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'otro_destino';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strOtroDestino = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'observacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObservacion = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'tarifa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'proceso_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProcesoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codigo_contrato';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoContrato = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'moda_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strModaPago = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'receptoria_destino';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intReceptoriaDestino = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'largo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLargo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'ancho';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAncho = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'alto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAlto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'servicio_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strServicioEntrega = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'servicio_importacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strServicioImportacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'libras';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLibras = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltKilos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'pies_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPiesCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'nota_entrega_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNotaEntregaId = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					// this is a duplicate leaf in a complex join
					return null; // indicates no object created and the db row has not been used
				}
			}
			
			// Instantiate Virtual Attributes
			$strVirtualPrefix = $strAliasPrefix . '__';
			$strVirtualPrefixLength = strlen($strVirtualPrefix);
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				if (strncmp($strColumnName, $strVirtualPrefix, $strVirtualPrefixLength) == 0)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}


			// Prepare to Check for Early/Virtual Binding

			$objExpansionAliasArray = array();
			if ($objExpandAsArrayNode) {
				$objExpansionAliasArray = $objExpandAsArrayNode->ChildNodeArray;
			}

			if (!$strAliasPrefix)
				$strAliasPrefix = 'guia_cacesa__';

			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for NotaEntrega Early Binding
			$strAlias = $strAliasPrefix . 'nota_entrega_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['nota_entrega_id']) ? null : $objExpansionAliasArray['nota_entrega_id']);
				$objToReturn->objNotaEntrega = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nota_entrega_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of GuiaCacesas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return GuiaCacesa[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $objExpandAsArrayNode = null, $strColumnAliasArray = null) {
			$objToReturn = array();

			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($objExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiaCacesa::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GuiaCacesa::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single GuiaCacesa object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GuiaCacesa next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions
			$objExpandAsArrayNode = $objDbResult->QueryBuilder->ExpandAsArrayNode;
			if (!empty ($objExpandAsArrayNode)) {
				throw new QCallerException ("Cannot use InstantiateCursor with ExpandAsArray");
			}

			// Load up the return result with a row and return it
			return GuiaCacesa::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single GuiaCacesa object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCacesa
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return GuiaCacesa::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCacesa()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of GuiaCacesa objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCacesa[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call GuiaCacesa::QueryArray to perform the LoadArrayByClienteId query
			try {
				return GuiaCacesa::QueryArray(
					QQ::Equal(QQN::GuiaCacesa()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCacesas
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call GuiaCacesa::QueryCount to perform the CountByClienteId query
			return GuiaCacesa::QueryCount(
				QQ::Equal(QQN::GuiaCacesa()->ClienteId, $intClienteId)
			);
		}

		/**
		 * Load an array of GuiaCacesa objects,
		 * by ProcesoId Index(es)
		 * @param integer $intProcesoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCacesa[]
		*/
		public static function LoadArrayByProcesoId($intProcesoId, $objOptionalClauses = null) {
			// Call GuiaCacesa::QueryArray to perform the LoadArrayByProcesoId query
			try {
				return GuiaCacesa::QueryArray(
					QQ::Equal(QQN::GuiaCacesa()->ProcesoId, $intProcesoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCacesas
		 * by ProcesoId Index(es)
		 * @param integer $intProcesoId
		 * @return int
		*/
		public static function CountByProcesoId($intProcesoId) {
			// Call GuiaCacesa::QueryCount to perform the CountByProcesoId query
			return GuiaCacesa::QueryCount(
				QQ::Equal(QQN::GuiaCacesa()->ProcesoId, $intProcesoId)
			);
		}

		/**
		 * Load an array of GuiaCacesa objects,
		 * by NotaEntregaId Index(es)
		 * @param integer $intNotaEntregaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCacesa[]
		*/
		public static function LoadArrayByNotaEntregaId($intNotaEntregaId, $objOptionalClauses = null) {
			// Call GuiaCacesa::QueryArray to perform the LoadArrayByNotaEntregaId query
			try {
				return GuiaCacesa::QueryArray(
					QQ::Equal(QQN::GuiaCacesa()->NotaEntregaId, $intNotaEntregaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCacesas
		 * by NotaEntregaId Index(es)
		 * @param integer $intNotaEntregaId
		 * @return int
		*/
		public static function CountByNotaEntregaId($intNotaEntregaId) {
			// Call GuiaCacesa::QueryCount to perform the CountByNotaEntregaId query
			return GuiaCacesa::QueryCount(
				QQ::Equal(QQN::GuiaCacesa()->NotaEntregaId, $intNotaEntregaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this GuiaCacesa
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiaCacesa::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guia_cacesa` (
							`fech_carg`,
							`hora_carg`,
							`procesada`,
							`nume_guia`,
							`guia_exte`,
							`id_pieza`,
							`orig_guia`,
							`dest_guia`,
							`nomb_remi`,
							`dire_remi`,
							`tele_remi`,
							`nomb_dest`,
							`dire_dest`,
							`tele_dest`,
							`celu_dest`,
							`desc_cont`,
							`cant_piez`,
							`peso_guia`,
							`valor_declarado`,
							`cedula_rif`,
							`registrado_por`,
							`procesado_por`,
							`fech_proc`,
							`hora_proc`,
							`ajustar`,
							`otro_destino`,
							`observacion`,
							`tarifa_id`,
							`cliente_id`,
							`proceso_id`,
							`codigo_contrato`,
							`moda_pago`,
							`receptoria_destino`,
							`largo`,
							`ancho`,
							`alto`,
							`servicio_entrega`,
							`servicio_importacion`,
							`libras`,
							`kilos`,
							`volumen`,
							`pies_cub`,
							`nota_entrega_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->dttFechCarg) . ',
							' . $objDatabase->SqlVariable($this->dttHoraCarg) . ',
							' . $objDatabase->SqlVariable($this->blnProcesada) . ',
							' . $objDatabase->SqlVariable($this->strNumeGuia) . ',
							' . $objDatabase->SqlVariable($this->strGuiaExte) . ',
							' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							' . $objDatabase->SqlVariable($this->strOrigGuia) . ',
							' . $objDatabase->SqlVariable($this->strDestGuia) . ',
							' . $objDatabase->SqlVariable($this->strNombRemi) . ',
							' . $objDatabase->SqlVariable($this->strDireRemi) . ',
							' . $objDatabase->SqlVariable($this->strTeleRemi) . ',
							' . $objDatabase->SqlVariable($this->strNombDest) . ',
							' . $objDatabase->SqlVariable($this->strDireDest) . ',
							' . $objDatabase->SqlVariable($this->strTeleDest) . ',
							' . $objDatabase->SqlVariable($this->strCeluDest) . ',
							' . $objDatabase->SqlVariable($this->strDescCont) . ',
							' . $objDatabase->SqlVariable($this->intCantPiez) . ',
							' . $objDatabase->SqlVariable($this->strPesoGuia) . ',
							' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->strRegistradoPor) . ',
							' . $objDatabase->SqlVariable($this->strProcesadoPor) . ',
							' . $objDatabase->SqlVariable($this->dttFechProc) . ',
							' . $objDatabase->SqlVariable($this->dttHoraProc) . ',
							' . $objDatabase->SqlVariable($this->blnAjustar) . ',
							' . $objDatabase->SqlVariable($this->strOtroDestino) . ',
							' . $objDatabase->SqlVariable($this->strObservacion) . ',
							' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->intProcesoId) . ',
							' . $objDatabase->SqlVariable($this->strCodigoContrato) . ',
							' . $objDatabase->SqlVariable($this->strModaPago) . ',
							' . $objDatabase->SqlVariable($this->intReceptoriaDestino) . ',
							' . $objDatabase->SqlVariable($this->fltLargo) . ',
							' . $objDatabase->SqlVariable($this->fltAncho) . ',
							' . $objDatabase->SqlVariable($this->fltAlto) . ',
							' . $objDatabase->SqlVariable($this->strServicioEntrega) . ',
							' . $objDatabase->SqlVariable($this->strServicioImportacion) . ',
							' . $objDatabase->SqlVariable($this->fltLibras) . ',
							' . $objDatabase->SqlVariable($this->fltKilos) . ',
							' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							' . $objDatabase->SqlVariable($this->intNotaEntregaId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('guia_cacesa', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guia_cacesa`
						SET
							`fech_carg` = ' . $objDatabase->SqlVariable($this->dttFechCarg) . ',
							`hora_carg` = ' . $objDatabase->SqlVariable($this->dttHoraCarg) . ',
							`procesada` = ' . $objDatabase->SqlVariable($this->blnProcesada) . ',
							`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . ',
							`guia_exte` = ' . $objDatabase->SqlVariable($this->strGuiaExte) . ',
							`id_pieza` = ' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							`orig_guia` = ' . $objDatabase->SqlVariable($this->strOrigGuia) . ',
							`dest_guia` = ' . $objDatabase->SqlVariable($this->strDestGuia) . ',
							`nomb_remi` = ' . $objDatabase->SqlVariable($this->strNombRemi) . ',
							`dire_remi` = ' . $objDatabase->SqlVariable($this->strDireRemi) . ',
							`tele_remi` = ' . $objDatabase->SqlVariable($this->strTeleRemi) . ',
							`nomb_dest` = ' . $objDatabase->SqlVariable($this->strNombDest) . ',
							`dire_dest` = ' . $objDatabase->SqlVariable($this->strDireDest) . ',
							`tele_dest` = ' . $objDatabase->SqlVariable($this->strTeleDest) . ',
							`celu_dest` = ' . $objDatabase->SqlVariable($this->strCeluDest) . ',
							`desc_cont` = ' . $objDatabase->SqlVariable($this->strDescCont) . ',
							`cant_piez` = ' . $objDatabase->SqlVariable($this->intCantPiez) . ',
							`peso_guia` = ' . $objDatabase->SqlVariable($this->strPesoGuia) . ',
							`valor_declarado` = ' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`registrado_por` = ' . $objDatabase->SqlVariable($this->strRegistradoPor) . ',
							`procesado_por` = ' . $objDatabase->SqlVariable($this->strProcesadoPor) . ',
							`fech_proc` = ' . $objDatabase->SqlVariable($this->dttFechProc) . ',
							`hora_proc` = ' . $objDatabase->SqlVariable($this->dttHoraProc) . ',
							`ajustar` = ' . $objDatabase->SqlVariable($this->blnAjustar) . ',
							`otro_destino` = ' . $objDatabase->SqlVariable($this->strOtroDestino) . ',
							`observacion` = ' . $objDatabase->SqlVariable($this->strObservacion) . ',
							`tarifa_id` = ' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`proceso_id` = ' . $objDatabase->SqlVariable($this->intProcesoId) . ',
							`codigo_contrato` = ' . $objDatabase->SqlVariable($this->strCodigoContrato) . ',
							`moda_pago` = ' . $objDatabase->SqlVariable($this->strModaPago) . ',
							`receptoria_destino` = ' . $objDatabase->SqlVariable($this->intReceptoriaDestino) . ',
							`largo` = ' . $objDatabase->SqlVariable($this->fltLargo) . ',
							`ancho` = ' . $objDatabase->SqlVariable($this->fltAncho) . ',
							`alto` = ' . $objDatabase->SqlVariable($this->fltAlto) . ',
							`servicio_entrega` = ' . $objDatabase->SqlVariable($this->strServicioEntrega) . ',
							`servicio_importacion` = ' . $objDatabase->SqlVariable($this->strServicioImportacion) . ',
							`libras` = ' . $objDatabase->SqlVariable($this->fltLibras) . ',
							`kilos` = ' . $objDatabase->SqlVariable($this->fltKilos) . ',
							`volumen` = ' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							`pies_cub` = ' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intNotaEntregaId) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this GuiaCacesa
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GuiaCacesa with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GuiaCacesa::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_cacesa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this GuiaCacesa ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaCacesa', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all GuiaCacesas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GuiaCacesa::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_cacesa`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guia_cacesa table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GuiaCacesa::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guia_cacesa`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this GuiaCacesa from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GuiaCacesa object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = GuiaCacesa::Load($this->intId);

			// Update $this's local variables to match
			$this->dttFechCarg = $objReloaded->dttFechCarg;
			$this->dttHoraCarg = $objReloaded->dttHoraCarg;
			$this->blnProcesada = $objReloaded->blnProcesada;
			$this->strNumeGuia = $objReloaded->strNumeGuia;
			$this->strGuiaExte = $objReloaded->strGuiaExte;
			$this->strIdPieza = $objReloaded->strIdPieza;
			$this->strOrigGuia = $objReloaded->strOrigGuia;
			$this->strDestGuia = $objReloaded->strDestGuia;
			$this->strNombRemi = $objReloaded->strNombRemi;
			$this->strDireRemi = $objReloaded->strDireRemi;
			$this->strTeleRemi = $objReloaded->strTeleRemi;
			$this->strNombDest = $objReloaded->strNombDest;
			$this->strDireDest = $objReloaded->strDireDest;
			$this->strTeleDest = $objReloaded->strTeleDest;
			$this->strCeluDest = $objReloaded->strCeluDest;
			$this->strDescCont = $objReloaded->strDescCont;
			$this->intCantPiez = $objReloaded->intCantPiez;
			$this->strPesoGuia = $objReloaded->strPesoGuia;
			$this->fltValorDeclarado = $objReloaded->fltValorDeclarado;
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->strRegistradoPor = $objReloaded->strRegistradoPor;
			$this->strProcesadoPor = $objReloaded->strProcesadoPor;
			$this->dttFechProc = $objReloaded->dttFechProc;
			$this->dttHoraProc = $objReloaded->dttHoraProc;
			$this->blnAjustar = $objReloaded->blnAjustar;
			$this->strOtroDestino = $objReloaded->strOtroDestino;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->intTarifaId = $objReloaded->intTarifaId;
			$this->ClienteId = $objReloaded->ClienteId;
			$this->intProcesoId = $objReloaded->intProcesoId;
			$this->strCodigoContrato = $objReloaded->strCodigoContrato;
			$this->strModaPago = $objReloaded->strModaPago;
			$this->intReceptoriaDestino = $objReloaded->intReceptoriaDestino;
			$this->fltLargo = $objReloaded->fltLargo;
			$this->fltAncho = $objReloaded->fltAncho;
			$this->fltAlto = $objReloaded->fltAlto;
			$this->strServicioEntrega = $objReloaded->strServicioEntrega;
			$this->strServicioImportacion = $objReloaded->strServicioImportacion;
			$this->fltLibras = $objReloaded->fltLibras;
			$this->fltKilos = $objReloaded->fltKilos;
			$this->fltVolumen = $objReloaded->fltVolumen;
			$this->fltPiesCub = $objReloaded->fltPiesCub;
			$this->NotaEntregaId = $objReloaded->NotaEntregaId;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					/**
					 * Gets the value for intId (Read-Only PK)
					 * @return integer
					 */
					return $this->intId;

				case 'FechCarg':
					/**
					 * Gets the value for dttFechCarg (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechCarg;

				case 'HoraCarg':
					/**
					 * Gets the value for dttHoraCarg (Not Null)
					 * @return QDateTime
					 */
					return $this->dttHoraCarg;

				case 'Procesada':
					/**
					 * Gets the value for blnProcesada 
					 * @return boolean
					 */
					return $this->blnProcesada;

				case 'NumeGuia':
					/**
					 * Gets the value for strNumeGuia 
					 * @return string
					 */
					return $this->strNumeGuia;

				case 'GuiaExte':
					/**
					 * Gets the value for strGuiaExte 
					 * @return string
					 */
					return $this->strGuiaExte;

				case 'IdPieza':
					/**
					 * Gets the value for strIdPieza 
					 * @return string
					 */
					return $this->strIdPieza;

				case 'OrigGuia':
					/**
					 * Gets the value for strOrigGuia (Not Null)
					 * @return string
					 */
					return $this->strOrigGuia;

				case 'DestGuia':
					/**
					 * Gets the value for strDestGuia 
					 * @return string
					 */
					return $this->strDestGuia;

				case 'NombRemi':
					/**
					 * Gets the value for strNombRemi (Not Null)
					 * @return string
					 */
					return $this->strNombRemi;

				case 'DireRemi':
					/**
					 * Gets the value for strDireRemi (Not Null)
					 * @return string
					 */
					return $this->strDireRemi;

				case 'TeleRemi':
					/**
					 * Gets the value for strTeleRemi (Not Null)
					 * @return string
					 */
					return $this->strTeleRemi;

				case 'NombDest':
					/**
					 * Gets the value for strNombDest (Not Null)
					 * @return string
					 */
					return $this->strNombDest;

				case 'DireDest':
					/**
					 * Gets the value for strDireDest (Not Null)
					 * @return string
					 */
					return $this->strDireDest;

				case 'TeleDest':
					/**
					 * Gets the value for strTeleDest (Not Null)
					 * @return string
					 */
					return $this->strTeleDest;

				case 'CeluDest':
					/**
					 * Gets the value for strCeluDest (Not Null)
					 * @return string
					 */
					return $this->strCeluDest;

				case 'DescCont':
					/**
					 * Gets the value for strDescCont (Not Null)
					 * @return string
					 */
					return $this->strDescCont;

				case 'CantPiez':
					/**
					 * Gets the value for intCantPiez (Not Null)
					 * @return integer
					 */
					return $this->intCantPiez;

				case 'PesoGuia':
					/**
					 * Gets the value for strPesoGuia (Not Null)
					 * @return string
					 */
					return $this->strPesoGuia;

				case 'ValorDeclarado':
					/**
					 * Gets the value for fltValorDeclarado 
					 * @return double
					 */
					return $this->fltValorDeclarado;

				case 'CedulaRif':
					/**
					 * Gets the value for strCedulaRif 
					 * @return string
					 */
					return $this->strCedulaRif;

				case 'RegistradoPor':
					/**
					 * Gets the value for strRegistradoPor (Not Null)
					 * @return string
					 */
					return $this->strRegistradoPor;

				case 'ProcesadoPor':
					/**
					 * Gets the value for strProcesadoPor 
					 * @return string
					 */
					return $this->strProcesadoPor;

				case 'FechProc':
					/**
					 * Gets the value for dttFechProc 
					 * @return QDateTime
					 */
					return $this->dttFechProc;

				case 'HoraProc':
					/**
					 * Gets the value for dttHoraProc 
					 * @return QDateTime
					 */
					return $this->dttHoraProc;

				case 'Ajustar':
					/**
					 * Gets the value for blnAjustar 
					 * @return boolean
					 */
					return $this->blnAjustar;

				case 'OtroDestino':
					/**
					 * Gets the value for strOtroDestino 
					 * @return string
					 */
					return $this->strOtroDestino;

				case 'Observacion':
					/**
					 * Gets the value for strObservacion 
					 * @return string
					 */
					return $this->strObservacion;

				case 'TarifaId':
					/**
					 * Gets the value for intTarifaId (Not Null)
					 * @return integer
					 */
					return $this->intTarifaId;

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId (Not Null)
					 * @return integer
					 */
					return $this->intClienteId;

				case 'ProcesoId':
					/**
					 * Gets the value for intProcesoId (Not Null)
					 * @return integer
					 */
					return $this->intProcesoId;

				case 'CodigoContrato':
					/**
					 * Gets the value for strCodigoContrato 
					 * @return string
					 */
					return $this->strCodigoContrato;

				case 'ModaPago':
					/**
					 * Gets the value for strModaPago 
					 * @return string
					 */
					return $this->strModaPago;

				case 'ReceptoriaDestino':
					/**
					 * Gets the value for intReceptoriaDestino 
					 * @return integer
					 */
					return $this->intReceptoriaDestino;

				case 'Largo':
					/**
					 * Gets the value for fltLargo 
					 * @return double
					 */
					return $this->fltLargo;

				case 'Ancho':
					/**
					 * Gets the value for fltAncho 
					 * @return double
					 */
					return $this->fltAncho;

				case 'Alto':
					/**
					 * Gets the value for fltAlto 
					 * @return double
					 */
					return $this->fltAlto;

				case 'ServicioEntrega':
					/**
					 * Gets the value for strServicioEntrega 
					 * @return string
					 */
					return $this->strServicioEntrega;

				case 'ServicioImportacion':
					/**
					 * Gets the value for strServicioImportacion 
					 * @return string
					 */
					return $this->strServicioImportacion;

				case 'Libras':
					/**
					 * Gets the value for fltLibras 
					 * @return double
					 */
					return $this->fltLibras;

				case 'Kilos':
					/**
					 * Gets the value for fltKilos (Not Null)
					 * @return double
					 */
					return $this->fltKilos;

				case 'Volumen':
					/**
					 * Gets the value for fltVolumen 
					 * @return double
					 */
					return $this->fltVolumen;

				case 'PiesCub':
					/**
					 * Gets the value for fltPiesCub 
					 * @return double
					 */
					return $this->fltPiesCub;

				case 'NotaEntregaId':
					/**
					 * Gets the value for intNotaEntregaId 
					 * @return integer
					 */
					return $this->intNotaEntregaId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Gets the value for the MasterCliente object referenced by intClienteId (Not Null)
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = MasterCliente::Load($this->intClienteId);
						return $this->objCliente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotaEntrega':
					/**
					 * Gets the value for the NotaEntrega object referenced by intNotaEntregaId 
					 * @return NotaEntrega
					 */
					try {
						if ((!$this->objNotaEntrega) && (!is_null($this->intNotaEntregaId)))
							$this->objNotaEntrega = NotaEntrega::Load($this->intNotaEntregaId);
						return $this->objNotaEntrega;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'FechCarg':
					/**
					 * Sets the value for dttFechCarg (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechCarg = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraCarg':
					/**
					 * Sets the value for dttHoraCarg (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttHoraCarg = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Procesada':
					/**
					 * Sets the value for blnProcesada 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnProcesada = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeGuia':
					/**
					 * Sets the value for strNumeGuia 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaExte':
					/**
					 * Sets the value for strGuiaExte 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaExte = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdPieza':
					/**
					 * Sets the value for strIdPieza 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIdPieza = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrigGuia':
					/**
					 * Sets the value for strOrigGuia (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOrigGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestGuia':
					/**
					 * Sets the value for strDestGuia 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDestGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombRemi':
					/**
					 * Sets the value for strNombRemi (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombRemi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireRemi':
					/**
					 * Sets the value for strDireRemi (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireRemi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleRemi':
					/**
					 * Sets the value for strTeleRemi (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleRemi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombDest':
					/**
					 * Sets the value for strNombDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireDest':
					/**
					 * Sets the value for strDireDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleDest':
					/**
					 * Sets the value for strTeleDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CeluDest':
					/**
					 * Sets the value for strCeluDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCeluDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescCont':
					/**
					 * Sets the value for strDescCont (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescCont = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantPiez':
					/**
					 * Sets the value for intCantPiez (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantPiez = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoGuia':
					/**
					 * Sets the value for strPesoGuia (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPesoGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ValorDeclarado':
					/**
					 * Sets the value for fltValorDeclarado 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValorDeclarado = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CedulaRif':
					/**
					 * Sets the value for strCedulaRif 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedulaRif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegistradoPor':
					/**
					 * Sets the value for strRegistradoPor (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRegistradoPor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProcesadoPor':
					/**
					 * Sets the value for strProcesadoPor 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strProcesadoPor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechProc':
					/**
					 * Sets the value for dttFechProc 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechProc = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraProc':
					/**
					 * Sets the value for dttHoraProc 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttHoraProc = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ajustar':
					/**
					 * Sets the value for blnAjustar 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnAjustar = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OtroDestino':
					/**
					 * Sets the value for strOtroDestino 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOtroDestino = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Observacion':
					/**
					 * Sets the value for strObservacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strObservacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaId':
					/**
					 * Sets the value for intTarifaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTarifaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteId':
					/**
					 * Sets the value for intClienteId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCliente = null;
						return ($this->intClienteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProcesoId':
					/**
					 * Sets the value for intProcesoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intProcesoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoContrato':
					/**
					 * Sets the value for strCodigoContrato 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoContrato = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModaPago':
					/**
					 * Sets the value for strModaPago 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strModaPago = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaDestino':
					/**
					 * Sets the value for intReceptoriaDestino 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intReceptoriaDestino = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Largo':
					/**
					 * Sets the value for fltLargo 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLargo = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ancho':
					/**
					 * Sets the value for fltAncho 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltAncho = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Alto':
					/**
					 * Sets the value for fltAlto 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltAlto = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ServicioEntrega':
					/**
					 * Sets the value for strServicioEntrega 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strServicioEntrega = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ServicioImportacion':
					/**
					 * Sets the value for strServicioImportacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strServicioImportacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Libras':
					/**
					 * Sets the value for fltLibras 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLibras = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Kilos':
					/**
					 * Sets the value for fltKilos (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltKilos = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Volumen':
					/**
					 * Sets the value for fltVolumen 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PiesCub':
					/**
					 * Sets the value for fltPiesCub 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPiesCub = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotaEntregaId':
					/**
					 * Sets the value for intNotaEntregaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objNotaEntrega = null;
						return ($this->intNotaEntregaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Sets the value for the MasterCliente object referenced by intClienteId (Not Null)
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MasterCliente object
						try {
							$mixValue = QType::Cast($mixValue, 'MasterCliente');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MasterCliente object
						if (is_null($mixValue->CodiClie))
							throw new QCallerException('Unable to set an unsaved Cliente for this GuiaCacesa');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'NotaEntrega':
					/**
					 * Sets the value for the NotaEntrega object referenced by intNotaEntregaId 
					 * @param NotaEntrega $mixValue
					 * @return NotaEntrega
					 */
					if (is_null($mixValue)) {
						$this->intNotaEntregaId = null;
						$this->objNotaEntrega = null;
						return null;
					} else {
						// Make sure $mixValue actually is a NotaEntrega object
						try {
							$mixValue = QType::Cast($mixValue, 'NotaEntrega');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED NotaEntrega object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved NotaEntrega for this GuiaCacesa');

						// Update Local Member Variables
						$this->objNotaEntrega = $mixValue;
						$this->intNotaEntregaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}

			/**
		 * Esta runtina devuelve el nombre de las tablas relacionadas a esta Clase
		 * con el proposito de poder advertir la existencia integridad que no 
		 * puede ser violada con un "delete"
		 *
		 * @return array con los nombres de las tablas
		 */
		public function TablasRelacionadas() {
			$arrTablRela = array();
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		
		///////////////////////////////
		// METHODS TO EXTRACT INFO ABOUT THE CLASS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetTableName() {
			return "guia_cacesa";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[GuiaCacesa::GetDatabaseIndex()]->Database;
		}

		/**
		 * Static method to retrieve the Database index in the configuration.inc.php file.
		 * This can be useful when there are two databases of the same name which create
		 * confusion for the developer. There are no internal uses of this function but are
		 * here to help retrieve info if need be!
		 * @return int position or index of the database in the config file.
		 */
		public static function GetDatabaseIndex() {
			return 1;
		}

		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="GuiaCacesa"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="FechCarg" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraCarg" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Procesada" type="xsd:boolean"/>';
			$strToReturn .= '<element name="NumeGuia" type="xsd:string"/>';
			$strToReturn .= '<element name="GuiaExte" type="xsd:string"/>';
			$strToReturn .= '<element name="IdPieza" type="xsd:string"/>';
			$strToReturn .= '<element name="OrigGuia" type="xsd:string"/>';
			$strToReturn .= '<element name="DestGuia" type="xsd:string"/>';
			$strToReturn .= '<element name="NombRemi" type="xsd:string"/>';
			$strToReturn .= '<element name="DireRemi" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleRemi" type="xsd:string"/>';
			$strToReturn .= '<element name="NombDest" type="xsd:string"/>';
			$strToReturn .= '<element name="DireDest" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleDest" type="xsd:string"/>';
			$strToReturn .= '<element name="CeluDest" type="xsd:string"/>';
			$strToReturn .= '<element name="DescCont" type="xsd:string"/>';
			$strToReturn .= '<element name="CantPiez" type="xsd:int"/>';
			$strToReturn .= '<element name="PesoGuia" type="xsd:string"/>';
			$strToReturn .= '<element name="ValorDeclarado" type="xsd:float"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistradoPor" type="xsd:string"/>';
			$strToReturn .= '<element name="ProcesadoPor" type="xsd:string"/>';
			$strToReturn .= '<element name="FechProc" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraProc" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Ajustar" type="xsd:boolean"/>';
			$strToReturn .= '<element name="OtroDestino" type="xsd:string"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="TarifaId" type="xsd:int"/>';
			$strToReturn .= '<element name="Cliente" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="ProcesoId" type="xsd:int"/>';
			$strToReturn .= '<element name="CodigoContrato" type="xsd:string"/>';
			$strToReturn .= '<element name="ModaPago" type="xsd:string"/>';
			$strToReturn .= '<element name="ReceptoriaDestino" type="xsd:int"/>';
			$strToReturn .= '<element name="Largo" type="xsd:float"/>';
			$strToReturn .= '<element name="Ancho" type="xsd:float"/>';
			$strToReturn .= '<element name="Alto" type="xsd:float"/>';
			$strToReturn .= '<element name="ServicioEntrega" type="xsd:string"/>';
			$strToReturn .= '<element name="ServicioImportacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Libras" type="xsd:float"/>';
			$strToReturn .= '<element name="Kilos" type="xsd:float"/>';
			$strToReturn .= '<element name="Volumen" type="xsd:float"/>';
			$strToReturn .= '<element name="PiesCub" type="xsd:float"/>';
			$strToReturn .= '<element name="NotaEntrega" type="xsd1:NotaEntrega"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GuiaCacesa', $strComplexTypeArray)) {
				$strComplexTypeArray['GuiaCacesa'] = GuiaCacesa::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				NotaEntrega::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GuiaCacesa::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GuiaCacesa();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'FechCarg'))
				$objToReturn->dttFechCarg = new QDateTime($objSoapObject->FechCarg);
			if (property_exists($objSoapObject, 'HoraCarg'))
				$objToReturn->dttHoraCarg = new QDateTime($objSoapObject->HoraCarg);
			if (property_exists($objSoapObject, 'Procesada'))
				$objToReturn->blnProcesada = $objSoapObject->Procesada;
			if (property_exists($objSoapObject, 'NumeGuia'))
				$objToReturn->strNumeGuia = $objSoapObject->NumeGuia;
			if (property_exists($objSoapObject, 'GuiaExte'))
				$objToReturn->strGuiaExte = $objSoapObject->GuiaExte;
			if (property_exists($objSoapObject, 'IdPieza'))
				$objToReturn->strIdPieza = $objSoapObject->IdPieza;
			if (property_exists($objSoapObject, 'OrigGuia'))
				$objToReturn->strOrigGuia = $objSoapObject->OrigGuia;
			if (property_exists($objSoapObject, 'DestGuia'))
				$objToReturn->strDestGuia = $objSoapObject->DestGuia;
			if (property_exists($objSoapObject, 'NombRemi'))
				$objToReturn->strNombRemi = $objSoapObject->NombRemi;
			if (property_exists($objSoapObject, 'DireRemi'))
				$objToReturn->strDireRemi = $objSoapObject->DireRemi;
			if (property_exists($objSoapObject, 'TeleRemi'))
				$objToReturn->strTeleRemi = $objSoapObject->TeleRemi;
			if (property_exists($objSoapObject, 'NombDest'))
				$objToReturn->strNombDest = $objSoapObject->NombDest;
			if (property_exists($objSoapObject, 'DireDest'))
				$objToReturn->strDireDest = $objSoapObject->DireDest;
			if (property_exists($objSoapObject, 'TeleDest'))
				$objToReturn->strTeleDest = $objSoapObject->TeleDest;
			if (property_exists($objSoapObject, 'CeluDest'))
				$objToReturn->strCeluDest = $objSoapObject->CeluDest;
			if (property_exists($objSoapObject, 'DescCont'))
				$objToReturn->strDescCont = $objSoapObject->DescCont;
			if (property_exists($objSoapObject, 'CantPiez'))
				$objToReturn->intCantPiez = $objSoapObject->CantPiez;
			if (property_exists($objSoapObject, 'PesoGuia'))
				$objToReturn->strPesoGuia = $objSoapObject->PesoGuia;
			if (property_exists($objSoapObject, 'ValorDeclarado'))
				$objToReturn->fltValorDeclarado = $objSoapObject->ValorDeclarado;
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'RegistradoPor'))
				$objToReturn->strRegistradoPor = $objSoapObject->RegistradoPor;
			if (property_exists($objSoapObject, 'ProcesadoPor'))
				$objToReturn->strProcesadoPor = $objSoapObject->ProcesadoPor;
			if (property_exists($objSoapObject, 'FechProc'))
				$objToReturn->dttFechProc = new QDateTime($objSoapObject->FechProc);
			if (property_exists($objSoapObject, 'HoraProc'))
				$objToReturn->dttHoraProc = new QDateTime($objSoapObject->HoraProc);
			if (property_exists($objSoapObject, 'Ajustar'))
				$objToReturn->blnAjustar = $objSoapObject->Ajustar;
			if (property_exists($objSoapObject, 'OtroDestino'))
				$objToReturn->strOtroDestino = $objSoapObject->OtroDestino;
			if (property_exists($objSoapObject, 'Observacion'))
				$objToReturn->strObservacion = $objSoapObject->Observacion;
			if (property_exists($objSoapObject, 'TarifaId'))
				$objToReturn->intTarifaId = $objSoapObject->TarifaId;
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = MasterCliente::GetObjectFromSoapObject($objSoapObject->Cliente);
			if (property_exists($objSoapObject, 'ProcesoId'))
				$objToReturn->intProcesoId = $objSoapObject->ProcesoId;
			if (property_exists($objSoapObject, 'CodigoContrato'))
				$objToReturn->strCodigoContrato = $objSoapObject->CodigoContrato;
			if (property_exists($objSoapObject, 'ModaPago'))
				$objToReturn->strModaPago = $objSoapObject->ModaPago;
			if (property_exists($objSoapObject, 'ReceptoriaDestino'))
				$objToReturn->intReceptoriaDestino = $objSoapObject->ReceptoriaDestino;
			if (property_exists($objSoapObject, 'Largo'))
				$objToReturn->fltLargo = $objSoapObject->Largo;
			if (property_exists($objSoapObject, 'Ancho'))
				$objToReturn->fltAncho = $objSoapObject->Ancho;
			if (property_exists($objSoapObject, 'Alto'))
				$objToReturn->fltAlto = $objSoapObject->Alto;
			if (property_exists($objSoapObject, 'ServicioEntrega'))
				$objToReturn->strServicioEntrega = $objSoapObject->ServicioEntrega;
			if (property_exists($objSoapObject, 'ServicioImportacion'))
				$objToReturn->strServicioImportacion = $objSoapObject->ServicioImportacion;
			if (property_exists($objSoapObject, 'Libras'))
				$objToReturn->fltLibras = $objSoapObject->Libras;
			if (property_exists($objSoapObject, 'Kilos'))
				$objToReturn->fltKilos = $objSoapObject->Kilos;
			if (property_exists($objSoapObject, 'Volumen'))
				$objToReturn->fltVolumen = $objSoapObject->Volumen;
			if (property_exists($objSoapObject, 'PiesCub'))
				$objToReturn->fltPiesCub = $objSoapObject->PiesCub;
			if ((property_exists($objSoapObject, 'NotaEntrega')) &&
				($objSoapObject->NotaEntrega))
				$objToReturn->NotaEntrega = NotaEntrega::GetObjectFromSoapObject($objSoapObject->NotaEntrega);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GuiaCacesa::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechCarg)
				$objObject->dttFechCarg = $objObject->dttFechCarg->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttHoraCarg)
				$objObject->dttHoraCarg = $objObject->dttHoraCarg->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechProc)
				$objObject->dttFechProc = $objObject->dttFechProc->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttHoraProc)
				$objObject->dttHoraProc = $objObject->dttHoraProc->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCliente)
				$objObject->objCliente = MasterCliente::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
			if ($objObject->objNotaEntrega)
				$objObject->objNotaEntrega = NotaEntrega::GetSoapObjectFromObject($objObject->objNotaEntrega, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intNotaEntregaId = null;
			return $objObject;
		}


		////////////////////////////////////////
		// METHODS for JSON Object Translation
		////////////////////////////////////////

		// this function is required for objects that implement the
		// IteratorAggregate interface
		public function getIterator() {
			///////////////////
			// Member Variables
			///////////////////
			$iArray['Id'] = $this->intId;
			$iArray['FechCarg'] = $this->dttFechCarg;
			$iArray['HoraCarg'] = $this->dttHoraCarg;
			$iArray['Procesada'] = $this->blnProcesada;
			$iArray['NumeGuia'] = $this->strNumeGuia;
			$iArray['GuiaExte'] = $this->strGuiaExte;
			$iArray['IdPieza'] = $this->strIdPieza;
			$iArray['OrigGuia'] = $this->strOrigGuia;
			$iArray['DestGuia'] = $this->strDestGuia;
			$iArray['NombRemi'] = $this->strNombRemi;
			$iArray['DireRemi'] = $this->strDireRemi;
			$iArray['TeleRemi'] = $this->strTeleRemi;
			$iArray['NombDest'] = $this->strNombDest;
			$iArray['DireDest'] = $this->strDireDest;
			$iArray['TeleDest'] = $this->strTeleDest;
			$iArray['CeluDest'] = $this->strCeluDest;
			$iArray['DescCont'] = $this->strDescCont;
			$iArray['CantPiez'] = $this->intCantPiez;
			$iArray['PesoGuia'] = $this->strPesoGuia;
			$iArray['ValorDeclarado'] = $this->fltValorDeclarado;
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['RegistradoPor'] = $this->strRegistradoPor;
			$iArray['ProcesadoPor'] = $this->strProcesadoPor;
			$iArray['FechProc'] = $this->dttFechProc;
			$iArray['HoraProc'] = $this->dttHoraProc;
			$iArray['Ajustar'] = $this->blnAjustar;
			$iArray['OtroDestino'] = $this->strOtroDestino;
			$iArray['Observacion'] = $this->strObservacion;
			$iArray['TarifaId'] = $this->intTarifaId;
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['ProcesoId'] = $this->intProcesoId;
			$iArray['CodigoContrato'] = $this->strCodigoContrato;
			$iArray['ModaPago'] = $this->strModaPago;
			$iArray['ReceptoriaDestino'] = $this->intReceptoriaDestino;
			$iArray['Largo'] = $this->fltLargo;
			$iArray['Ancho'] = $this->fltAncho;
			$iArray['Alto'] = $this->fltAlto;
			$iArray['ServicioEntrega'] = $this->strServicioEntrega;
			$iArray['ServicioImportacion'] = $this->strServicioImportacion;
			$iArray['Libras'] = $this->fltLibras;
			$iArray['Kilos'] = $this->fltKilos;
			$iArray['Volumen'] = $this->fltVolumen;
			$iArray['PiesCub'] = $this->fltPiesCub;
			$iArray['NotaEntregaId'] = $this->intNotaEntregaId;
			return new ArrayIterator($iArray);
		}

		// this function returns a Json formatted string using the
		// IteratorAggregate interface
		public function getJson() {
			return json_encode($this->getIterator());
		}

		/**
		 * Default "toJsObject" handler
		 * Specifies how the object should be displayed in JQuery UI lists and menus. Note that these lists use
		 * value and label differently.
		 *
		 * value 	= The short form of what to display in the list and selection.
		 * label 	= [optional] If defined, is what is displayed in the menu
		 * id 		= Primary key of object.
		 *
		 * @return an array that specifies how to display the object
		 */
		public function toJsObject () {
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intId ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $FechCarg
     * @property-read QQNode $HoraCarg
     * @property-read QQNode $Procesada
     * @property-read QQNode $NumeGuia
     * @property-read QQNode $GuiaExte
     * @property-read QQNode $IdPieza
     * @property-read QQNode $OrigGuia
     * @property-read QQNode $DestGuia
     * @property-read QQNode $NombRemi
     * @property-read QQNode $DireRemi
     * @property-read QQNode $TeleRemi
     * @property-read QQNode $NombDest
     * @property-read QQNode $DireDest
     * @property-read QQNode $TeleDest
     * @property-read QQNode $CeluDest
     * @property-read QQNode $DescCont
     * @property-read QQNode $CantPiez
     * @property-read QQNode $PesoGuia
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $RegistradoPor
     * @property-read QQNode $ProcesadoPor
     * @property-read QQNode $FechProc
     * @property-read QQNode $HoraProc
     * @property-read QQNode $Ajustar
     * @property-read QQNode $OtroDestino
     * @property-read QQNode $Observacion
     * @property-read QQNode $TarifaId
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $ProcesoId
     * @property-read QQNode $CodigoContrato
     * @property-read QQNode $ModaPago
     * @property-read QQNode $ReceptoriaDestino
     * @property-read QQNode $Largo
     * @property-read QQNode $Ancho
     * @property-read QQNode $Alto
     * @property-read QQNode $ServicioEntrega
     * @property-read QQNode $ServicioImportacion
     * @property-read QQNode $Libras
     * @property-read QQNode $Kilos
     * @property-read QQNode $Volumen
     * @property-read QQNode $PiesCub
     * @property-read QQNode $NotaEntregaId
     * @property-read QQNodeNotaEntrega $NotaEntrega
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeGuiaCacesa extends QQNode {
		protected $strTableName = 'guia_cacesa';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GuiaCacesa';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'FechCarg':
					return new QQNode('fech_carg', 'FechCarg', 'Date', $this);
				case 'HoraCarg':
					return new QQNode('hora_carg', 'HoraCarg', 'Time', $this);
				case 'Procesada':
					return new QQNode('procesada', 'Procesada', 'Bit', $this);
				case 'NumeGuia':
					return new QQNode('nume_guia', 'NumeGuia', 'VarChar', $this);
				case 'GuiaExte':
					return new QQNode('guia_exte', 'GuiaExte', 'VarChar', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'VarChar', $this);
				case 'OrigGuia':
					return new QQNode('orig_guia', 'OrigGuia', 'VarChar', $this);
				case 'DestGuia':
					return new QQNode('dest_guia', 'DestGuia', 'VarChar', $this);
				case 'NombRemi':
					return new QQNode('nomb_remi', 'NombRemi', 'VarChar', $this);
				case 'DireRemi':
					return new QQNode('dire_remi', 'DireRemi', 'VarChar', $this);
				case 'TeleRemi':
					return new QQNode('tele_remi', 'TeleRemi', 'VarChar', $this);
				case 'NombDest':
					return new QQNode('nomb_dest', 'NombDest', 'VarChar', $this);
				case 'DireDest':
					return new QQNode('dire_dest', 'DireDest', 'VarChar', $this);
				case 'TeleDest':
					return new QQNode('tele_dest', 'TeleDest', 'VarChar', $this);
				case 'CeluDest':
					return new QQNode('celu_dest', 'CeluDest', 'VarChar', $this);
				case 'DescCont':
					return new QQNode('desc_cont', 'DescCont', 'VarChar', $this);
				case 'CantPiez':
					return new QQNode('cant_piez', 'CantPiez', 'Integer', $this);
				case 'PesoGuia':
					return new QQNode('peso_guia', 'PesoGuia', 'VarChar', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'Float', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'RegistradoPor':
					return new QQNode('registrado_por', 'RegistradoPor', 'VarChar', $this);
				case 'ProcesadoPor':
					return new QQNode('procesado_por', 'ProcesadoPor', 'VarChar', $this);
				case 'FechProc':
					return new QQNode('fech_proc', 'FechProc', 'Date', $this);
				case 'HoraProc':
					return new QQNode('hora_proc', 'HoraProc', 'Time', $this);
				case 'Ajustar':
					return new QQNode('ajustar', 'Ajustar', 'Bit', $this);
				case 'OtroDestino':
					return new QQNode('otro_destino', 'OtroDestino', 'VarChar', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'Blob', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'Integer', $this);
				case 'ProcesoId':
					return new QQNode('proceso_id', 'ProcesoId', 'Integer', $this);
				case 'CodigoContrato':
					return new QQNode('codigo_contrato', 'CodigoContrato', 'VarChar', $this);
				case 'ModaPago':
					return new QQNode('moda_pago', 'ModaPago', 'VarChar', $this);
				case 'ReceptoriaDestino':
					return new QQNode('receptoria_destino', 'ReceptoriaDestino', 'Integer', $this);
				case 'Largo':
					return new QQNode('largo', 'Largo', 'Float', $this);
				case 'Ancho':
					return new QQNode('ancho', 'Ancho', 'Float', $this);
				case 'Alto':
					return new QQNode('alto', 'Alto', 'Float', $this);
				case 'ServicioEntrega':
					return new QQNode('servicio_entrega', 'ServicioEntrega', 'VarChar', $this);
				case 'ServicioImportacion':
					return new QQNode('servicio_importacion', 'ServicioImportacion', 'VarChar', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'Float', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'Float', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'Float', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'Float', $this);
				case 'NotaEntregaId':
					return new QQNode('nota_entrega_id', 'NotaEntregaId', 'Integer', $this);
				case 'NotaEntrega':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntrega', 'Integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'Integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

    /**
     * @property-read QQNode $Id
     * @property-read QQNode $FechCarg
     * @property-read QQNode $HoraCarg
     * @property-read QQNode $Procesada
     * @property-read QQNode $NumeGuia
     * @property-read QQNode $GuiaExte
     * @property-read QQNode $IdPieza
     * @property-read QQNode $OrigGuia
     * @property-read QQNode $DestGuia
     * @property-read QQNode $NombRemi
     * @property-read QQNode $DireRemi
     * @property-read QQNode $TeleRemi
     * @property-read QQNode $NombDest
     * @property-read QQNode $DireDest
     * @property-read QQNode $TeleDest
     * @property-read QQNode $CeluDest
     * @property-read QQNode $DescCont
     * @property-read QQNode $CantPiez
     * @property-read QQNode $PesoGuia
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $RegistradoPor
     * @property-read QQNode $ProcesadoPor
     * @property-read QQNode $FechProc
     * @property-read QQNode $HoraProc
     * @property-read QQNode $Ajustar
     * @property-read QQNode $OtroDestino
     * @property-read QQNode $Observacion
     * @property-read QQNode $TarifaId
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $ProcesoId
     * @property-read QQNode $CodigoContrato
     * @property-read QQNode $ModaPago
     * @property-read QQNode $ReceptoriaDestino
     * @property-read QQNode $Largo
     * @property-read QQNode $Ancho
     * @property-read QQNode $Alto
     * @property-read QQNode $ServicioEntrega
     * @property-read QQNode $ServicioImportacion
     * @property-read QQNode $Libras
     * @property-read QQNode $Kilos
     * @property-read QQNode $Volumen
     * @property-read QQNode $PiesCub
     * @property-read QQNode $NotaEntregaId
     * @property-read QQNodeNotaEntrega $NotaEntrega
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuiaCacesa extends QQReverseReferenceNode {
		protected $strTableName = 'guia_cacesa';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GuiaCacesa';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'FechCarg':
					return new QQNode('fech_carg', 'FechCarg', 'QDateTime', $this);
				case 'HoraCarg':
					return new QQNode('hora_carg', 'HoraCarg', 'QDateTime', $this);
				case 'Procesada':
					return new QQNode('procesada', 'Procesada', 'boolean', $this);
				case 'NumeGuia':
					return new QQNode('nume_guia', 'NumeGuia', 'string', $this);
				case 'GuiaExte':
					return new QQNode('guia_exte', 'GuiaExte', 'string', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'string', $this);
				case 'OrigGuia':
					return new QQNode('orig_guia', 'OrigGuia', 'string', $this);
				case 'DestGuia':
					return new QQNode('dest_guia', 'DestGuia', 'string', $this);
				case 'NombRemi':
					return new QQNode('nomb_remi', 'NombRemi', 'string', $this);
				case 'DireRemi':
					return new QQNode('dire_remi', 'DireRemi', 'string', $this);
				case 'TeleRemi':
					return new QQNode('tele_remi', 'TeleRemi', 'string', $this);
				case 'NombDest':
					return new QQNode('nomb_dest', 'NombDest', 'string', $this);
				case 'DireDest':
					return new QQNode('dire_dest', 'DireDest', 'string', $this);
				case 'TeleDest':
					return new QQNode('tele_dest', 'TeleDest', 'string', $this);
				case 'CeluDest':
					return new QQNode('celu_dest', 'CeluDest', 'string', $this);
				case 'DescCont':
					return new QQNode('desc_cont', 'DescCont', 'string', $this);
				case 'CantPiez':
					return new QQNode('cant_piez', 'CantPiez', 'integer', $this);
				case 'PesoGuia':
					return new QQNode('peso_guia', 'PesoGuia', 'string', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'double', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'RegistradoPor':
					return new QQNode('registrado_por', 'RegistradoPor', 'string', $this);
				case 'ProcesadoPor':
					return new QQNode('procesado_por', 'ProcesadoPor', 'string', $this);
				case 'FechProc':
					return new QQNode('fech_proc', 'FechProc', 'QDateTime', $this);
				case 'HoraProc':
					return new QQNode('hora_proc', 'HoraProc', 'QDateTime', $this);
				case 'Ajustar':
					return new QQNode('ajustar', 'Ajustar', 'boolean', $this);
				case 'OtroDestino':
					return new QQNode('otro_destino', 'OtroDestino', 'string', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'string', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'integer', $this);
				case 'ProcesoId':
					return new QQNode('proceso_id', 'ProcesoId', 'integer', $this);
				case 'CodigoContrato':
					return new QQNode('codigo_contrato', 'CodigoContrato', 'string', $this);
				case 'ModaPago':
					return new QQNode('moda_pago', 'ModaPago', 'string', $this);
				case 'ReceptoriaDestino':
					return new QQNode('receptoria_destino', 'ReceptoriaDestino', 'integer', $this);
				case 'Largo':
					return new QQNode('largo', 'Largo', 'double', $this);
				case 'Ancho':
					return new QQNode('ancho', 'Ancho', 'double', $this);
				case 'Alto':
					return new QQNode('alto', 'Alto', 'double', $this);
				case 'ServicioEntrega':
					return new QQNode('servicio_entrega', 'ServicioEntrega', 'string', $this);
				case 'ServicioImportacion':
					return new QQNode('servicio_importacion', 'ServicioImportacion', 'string', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'double', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'double', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'double', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'double', $this);
				case 'NotaEntregaId':
					return new QQNode('nota_entrega_id', 'NotaEntregaId', 'integer', $this);
				case 'NotaEntrega':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntrega', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>
