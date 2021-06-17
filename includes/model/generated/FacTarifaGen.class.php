<?php
	/**
	 * The abstract FacTarifaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacTarifa subclass which
	 * extends this FacTarifaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacTarifa class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Descripcion the value for strDescripcion (Unique)
	 * @property double $PesoInicial the value for fltPesoInicial (Not Null)
	 * @property double $ValorIncremento the value for fltValorIncremento (Not Null)
	 * @property string $MedidaIncremento the value for strMedidaIncremento (Not Null)
	 * @property double $PorcentajeSobreValor the value for fltPorcentajeSobreValor (Not Null)
	 * @property integer $VolumenParaDscto the value for intVolumenParaDscto (Not Null)
	 * @property double $DsctoPorVolumen the value for fltDsctoPorVolumen (Not Null)
	 * @property double $PesoParaDscto the value for fltPesoParaDscto (Not Null)
	 * @property double $DsctoPorPeso the value for fltDsctoPorPeso (Not Null)
	 * @property double $MontoMinimo the value for fltMontoMinimo (Not Null)
	 * @property double $CostoParadaAdicional the value for fltCostoParadaAdicional (Not Null)
	 * @property double $CostoAyudante the value for fltCostoAyudante (Not Null)
	 * @property double $IncrementoUrbano the value for fltIncrementoUrbano (Not Null)
	 * @property double $PesoInicialUrbano the value for fltPesoInicialUrbano (Not Null)
	 * @property double $TasaIva the value for fltTasaIva 
	 * @property-read CambioTarifa $_CambioTarifaAsTarifaDestino the value for the private _objCambioTarifaAsTarifaDestino (Read-Only) if set due to an expansion on the cambio_tarifa.tarifa_destino_id reverse relationship
	 * @property-read CambioTarifa[] $_CambioTarifaAsTarifaDestinoArray the value for the private _objCambioTarifaAsTarifaDestinoArray (Read-Only) if set due to an ExpandAsArray on the cambio_tarifa.tarifa_destino_id reverse relationship
	 * @property-read CambioTarifa $_CambioTarifaAsTarifaOrigen the value for the private _objCambioTarifaAsTarifaOrigen (Read-Only) if set due to an expansion on the cambio_tarifa.tarifa_origen_id reverse relationship
	 * @property-read CambioTarifa[] $_CambioTarifaAsTarifaOrigenArray the value for the private _objCambioTarifaAsTarifaOrigenArray (Read-Only) if set due to an ExpandAsArray on the cambio_tarifa.tarifa_origen_id reverse relationship
	 * @property-read FacTarifaPeso $_FacTarifaPesoAsTarifa the value for the private _objFacTarifaPesoAsTarifa (Read-Only) if set due to an expansion on the fac_tarifa_peso.tarifa_id reverse relationship
	 * @property-read FacTarifaPeso[] $_FacTarifaPesoAsTarifaArray the value for the private _objFacTarifaPesoAsTarifaArray (Read-Only) if set due to an ExpandAsArray on the fac_tarifa_peso.tarifa_id reverse relationship
	 * @property-read Guias $_GuiasAsTarifa the value for the private _objGuiasAsTarifa (Read-Only) if set due to an expansion on the guias.tarifa_id reverse relationship
	 * @property-read Guias[] $_GuiasAsTarifaArray the value for the private _objGuiasAsTarifaArray (Read-Only) if set due to an ExpandAsArray on the guias.tarifa_id reverse relationship
	 * @property-read GuiasH $_GuiasHAsTarifa the value for the private _objGuiasHAsTarifa (Read-Only) if set due to an expansion on the guias_h.tarifa_id reverse relationship
	 * @property-read GuiasH[] $_GuiasHAsTarifaArray the value for the private _objGuiasHAsTarifaArray (Read-Only) if set due to an ExpandAsArray on the guias_h.tarifa_id reverse relationship
	 * @property-read MasterCliente $_MasterClienteAsTarifa the value for the private _objMasterClienteAsTarifa (Read-Only) if set due to an expansion on the master_cliente.tarifa_id reverse relationship
	 * @property-read MasterCliente[] $_MasterClienteAsTarifaArray the value for the private _objMasterClienteAsTarifaArray (Read-Only) if set due to an ExpandAsArray on the master_cliente.tarifa_id reverse relationship
	 * @property-read NotaEntrega $_NotaEntregaAsTarifa the value for the private _objNotaEntregaAsTarifa (Read-Only) if set due to an expansion on the nota_entrega.tarifa_id reverse relationship
	 * @property-read NotaEntrega[] $_NotaEntregaAsTarifaArray the value for the private _objNotaEntregaAsTarifaArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega.tarifa_id reverse relationship
	 * @property-read NotaEntregaH $_NotaEntregaHAsTarifa the value for the private _objNotaEntregaHAsTarifa (Read-Only) if set due to an expansion on the nota_entrega_h.tarifa_id reverse relationship
	 * @property-read NotaEntregaH[] $_NotaEntregaHAsTarifaArray the value for the private _objNotaEntregaHAsTarifaArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_h.tarifa_id reverse relationship
	 * @property-read TarifaPeso $_TarifaPesoAsTarifa the value for the private _objTarifaPesoAsTarifa (Read-Only) if set due to an expansion on the tarifa_peso.tarifa_id reverse relationship
	 * @property-read TarifaPeso[] $_TarifaPesoAsTarifaArray the value for the private _objTarifaPesoAsTarifaArray (Read-Only) if set due to an ExpandAsArray on the tarifa_peso.tarifa_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacTarifaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column fac_tarifa.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 50;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.peso_inicial
		 * @var double fltPesoInicial
		 */
		protected $fltPesoInicial;
		const PesoInicialDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.valor_incremento
		 * @var double fltValorIncremento
		 */
		protected $fltValorIncremento;
		const ValorIncrementoDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.medida_incremento
		 * @var string strMedidaIncremento
		 */
		protected $strMedidaIncremento;
		const MedidaIncrementoDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.porcentaje_sobre_valor
		 * @var double fltPorcentajeSobreValor
		 */
		protected $fltPorcentajeSobreValor;
		const PorcentajeSobreValorDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.volumen_para_dscto
		 * @var integer intVolumenParaDscto
		 */
		protected $intVolumenParaDscto;
		const VolumenParaDsctoDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.dscto_por_volumen
		 * @var double fltDsctoPorVolumen
		 */
		protected $fltDsctoPorVolumen;
		const DsctoPorVolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.peso_para_dscto
		 * @var double fltPesoParaDscto
		 */
		protected $fltPesoParaDscto;
		const PesoParaDsctoDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.dscto_por_peso
		 * @var double fltDsctoPorPeso
		 */
		protected $fltDsctoPorPeso;
		const DsctoPorPesoDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.monto_minimo
		 * @var double fltMontoMinimo
		 */
		protected $fltMontoMinimo;
		const MontoMinimoDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.costo_parada_adicional
		 * @var double fltCostoParadaAdicional
		 */
		protected $fltCostoParadaAdicional;
		const CostoParadaAdicionalDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.costo_ayudante
		 * @var double fltCostoAyudante
		 */
		protected $fltCostoAyudante;
		const CostoAyudanteDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.incremento_urbano
		 * @var double fltIncrementoUrbano
		 */
		protected $fltIncrementoUrbano;
		const IncrementoUrbanoDefault = 0;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.peso_inicial_urbano
		 * @var double fltPesoInicialUrbano
		 */
		protected $fltPesoInicialUrbano;
		const PesoInicialUrbanoDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa.tasa_iva
		 * @var double fltTasaIva
		 */
		protected $fltTasaIva;
		const TasaIvaDefault = null;


		/**
		 * Private member variable that stores a reference to a single CambioTarifaAsTarifaDestino object
		 * (of type CambioTarifa), if this FacTarifa object was restored with
		 * an expansion on the cambio_tarifa association table.
		 * @var CambioTarifa _objCambioTarifaAsTarifaDestino;
		 */
		private $_objCambioTarifaAsTarifaDestino;

		/**
		 * Private member variable that stores a reference to an array of CambioTarifaAsTarifaDestino objects
		 * (of type CambioTarifa[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the cambio_tarifa association table.
		 * @var CambioTarifa[] _objCambioTarifaAsTarifaDestinoArray;
		 */
		private $_objCambioTarifaAsTarifaDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single CambioTarifaAsTarifaOrigen object
		 * (of type CambioTarifa), if this FacTarifa object was restored with
		 * an expansion on the cambio_tarifa association table.
		 * @var CambioTarifa _objCambioTarifaAsTarifaOrigen;
		 */
		private $_objCambioTarifaAsTarifaOrigen;

		/**
		 * Private member variable that stores a reference to an array of CambioTarifaAsTarifaOrigen objects
		 * (of type CambioTarifa[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the cambio_tarifa association table.
		 * @var CambioTarifa[] _objCambioTarifaAsTarifaOrigenArray;
		 */
		private $_objCambioTarifaAsTarifaOrigenArray = null;

		/**
		 * Private member variable that stores a reference to a single FacTarifaPesoAsTarifa object
		 * (of type FacTarifaPeso), if this FacTarifa object was restored with
		 * an expansion on the fac_tarifa_peso association table.
		 * @var FacTarifaPeso _objFacTarifaPesoAsTarifa;
		 */
		private $_objFacTarifaPesoAsTarifa;

		/**
		 * Private member variable that stores a reference to an array of FacTarifaPesoAsTarifa objects
		 * (of type FacTarifaPeso[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the fac_tarifa_peso association table.
		 * @var FacTarifaPeso[] _objFacTarifaPesoAsTarifaArray;
		 */
		private $_objFacTarifaPesoAsTarifaArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsTarifa object
		 * (of type Guias), if this FacTarifa object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsTarifa;
		 */
		private $_objGuiasAsTarifa;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsTarifa objects
		 * (of type Guias[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsTarifaArray;
		 */
		private $_objGuiasAsTarifaArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasHAsTarifa object
		 * (of type GuiasH), if this FacTarifa object was restored with
		 * an expansion on the guias_h association table.
		 * @var GuiasH _objGuiasHAsTarifa;
		 */
		private $_objGuiasHAsTarifa;

		/**
		 * Private member variable that stores a reference to an array of GuiasHAsTarifa objects
		 * (of type GuiasH[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the guias_h association table.
		 * @var GuiasH[] _objGuiasHAsTarifaArray;
		 */
		private $_objGuiasHAsTarifaArray = null;

		/**
		 * Private member variable that stores a reference to a single MasterClienteAsTarifa object
		 * (of type MasterCliente), if this FacTarifa object was restored with
		 * an expansion on the master_cliente association table.
		 * @var MasterCliente _objMasterClienteAsTarifa;
		 */
		private $_objMasterClienteAsTarifa;

		/**
		 * Private member variable that stores a reference to an array of MasterClienteAsTarifa objects
		 * (of type MasterCliente[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the master_cliente association table.
		 * @var MasterCliente[] _objMasterClienteAsTarifaArray;
		 */
		private $_objMasterClienteAsTarifaArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaAsTarifa object
		 * (of type NotaEntrega), if this FacTarifa object was restored with
		 * an expansion on the nota_entrega association table.
		 * @var NotaEntrega _objNotaEntregaAsTarifa;
		 */
		private $_objNotaEntregaAsTarifa;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaAsTarifa objects
		 * (of type NotaEntrega[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the nota_entrega association table.
		 * @var NotaEntrega[] _objNotaEntregaAsTarifaArray;
		 */
		private $_objNotaEntregaAsTarifaArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaHAsTarifa object
		 * (of type NotaEntregaH), if this FacTarifa object was restored with
		 * an expansion on the nota_entrega_h association table.
		 * @var NotaEntregaH _objNotaEntregaHAsTarifa;
		 */
		private $_objNotaEntregaHAsTarifa;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaHAsTarifa objects
		 * (of type NotaEntregaH[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the nota_entrega_h association table.
		 * @var NotaEntregaH[] _objNotaEntregaHAsTarifaArray;
		 */
		private $_objNotaEntregaHAsTarifaArray = null;

		/**
		 * Private member variable that stores a reference to a single TarifaPesoAsTarifa object
		 * (of type TarifaPeso), if this FacTarifa object was restored with
		 * an expansion on the tarifa_peso association table.
		 * @var TarifaPeso _objTarifaPesoAsTarifa;
		 */
		private $_objTarifaPesoAsTarifa;

		/**
		 * Private member variable that stores a reference to an array of TarifaPesoAsTarifa objects
		 * (of type TarifaPeso[]), if this FacTarifa object was restored with
		 * an ExpandAsArray on the tarifa_peso association table.
		 * @var TarifaPeso[] _objTarifaPesoAsTarifaArray;
		 */
		private $_objTarifaPesoAsTarifaArray = null;

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
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = FacTarifa::IdDefault;
			$this->strDescripcion = FacTarifa::DescripcionDefault;
			$this->fltPesoInicial = FacTarifa::PesoInicialDefault;
			$this->fltValorIncremento = FacTarifa::ValorIncrementoDefault;
			$this->strMedidaIncremento = FacTarifa::MedidaIncrementoDefault;
			$this->fltPorcentajeSobreValor = FacTarifa::PorcentajeSobreValorDefault;
			$this->intVolumenParaDscto = FacTarifa::VolumenParaDsctoDefault;
			$this->fltDsctoPorVolumen = FacTarifa::DsctoPorVolumenDefault;
			$this->fltPesoParaDscto = FacTarifa::PesoParaDsctoDefault;
			$this->fltDsctoPorPeso = FacTarifa::DsctoPorPesoDefault;
			$this->fltMontoMinimo = FacTarifa::MontoMinimoDefault;
			$this->fltCostoParadaAdicional = FacTarifa::CostoParadaAdicionalDefault;
			$this->fltCostoAyudante = FacTarifa::CostoAyudanteDefault;
			$this->fltIncrementoUrbano = FacTarifa::IncrementoUrbanoDefault;
			$this->fltPesoInicialUrbano = FacTarifa::PesoInicialUrbanoDefault;
			$this->fltTasaIva = FacTarifa::TasaIvaDefault;
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
		 * Load a FacTarifa from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifa
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacTarifa', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacTarifa::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTarifa()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacTarifas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifa[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacTarifa::QueryArray to perform the LoadAll query
			try {
				return FacTarifa::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacTarifas
		 * @return int
		 */
		public static function CountAll() {
			// Call FacTarifa::QueryCount to perform the CountAll query
			return FacTarifa::QueryCount(QQ::All());
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
			$objDatabase = FacTarifa::GetDatabase();

			// Create/Build out the QueryBuilder object with FacTarifa-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_tarifa');

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
				FacTarifa::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_tarifa');

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
		 * Static Qcubed Query method to query for a single FacTarifa object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacTarifa the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacTarifa object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacTarifa::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return FacTarifa::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacTarifa objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacTarifa[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacTarifa::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacTarifa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacTarifa objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacTarifa::GetDatabase();

			$strQuery = FacTarifa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/factarifa', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacTarifa::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacTarifa
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_tarifa';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'peso_inicial', $strAliasPrefix . 'peso_inicial');
			    $objBuilder->AddSelectItem($strTableName, 'valor_incremento', $strAliasPrefix . 'valor_incremento');
			    $objBuilder->AddSelectItem($strTableName, 'medida_incremento', $strAliasPrefix . 'medida_incremento');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_sobre_valor', $strAliasPrefix . 'porcentaje_sobre_valor');
			    $objBuilder->AddSelectItem($strTableName, 'volumen_para_dscto', $strAliasPrefix . 'volumen_para_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'dscto_por_volumen', $strAliasPrefix . 'dscto_por_volumen');
			    $objBuilder->AddSelectItem($strTableName, 'peso_para_dscto', $strAliasPrefix . 'peso_para_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'dscto_por_peso', $strAliasPrefix . 'dscto_por_peso');
			    $objBuilder->AddSelectItem($strTableName, 'monto_minimo', $strAliasPrefix . 'monto_minimo');
			    $objBuilder->AddSelectItem($strTableName, 'costo_parada_adicional', $strAliasPrefix . 'costo_parada_adicional');
			    $objBuilder->AddSelectItem($strTableName, 'costo_ayudante', $strAliasPrefix . 'costo_ayudante');
			    $objBuilder->AddSelectItem($strTableName, 'incremento_urbano', $strAliasPrefix . 'incremento_urbano');
			    $objBuilder->AddSelectItem($strTableName, 'peso_inicial_urbano', $strAliasPrefix . 'peso_inicial_urbano');
			    $objBuilder->AddSelectItem($strTableName, 'tasa_iva', $strAliasPrefix . 'tasa_iva');
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
		 * Instantiate a FacTarifa from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacTarifa::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacTarifa, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (FacTarifa::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacTarifa object
			$objToReturn = new FacTarifa();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'peso_inicial';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoInicial = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor_incremento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorIncremento = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'medida_incremento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMedidaIncremento = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'porcentaje_sobre_valor';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeSobreValor = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'volumen_para_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intVolumenParaDscto = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dscto_por_volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltDsctoPorVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'peso_para_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoParaDscto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'dscto_por_peso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltDsctoPorPeso = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_minimo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoMinimo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'costo_parada_adicional';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltCostoParadaAdicional = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'costo_ayudante';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltCostoAyudante = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'incremento_urbano';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltIncrementoUrbano = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'peso_inicial_urbano';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoInicialUrbano = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'tasa_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTasaIva = $objDbRow->GetColumn($strAliasName, 'Float');

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
				$strAliasPrefix = 'fac_tarifa__';


				

			// Check for CambioTarifaAsTarifaDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'cambiotarifaastarifadestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cambiotarifaastarifadestino']) ? null : $objExpansionAliasArray['cambiotarifaastarifadestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCambioTarifaAsTarifaDestinoArray)
				$objToReturn->_objCambioTarifaAsTarifaDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCambioTarifaAsTarifaDestinoArray[] = CambioTarifa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cambiotarifaastarifadestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCambioTarifaAsTarifaDestino)) {
					$objToReturn->_objCambioTarifaAsTarifaDestino = CambioTarifa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cambiotarifaastarifadestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for CambioTarifaAsTarifaOrigen Virtual Binding
			$strAlias = $strAliasPrefix . 'cambiotarifaastarifaorigen__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cambiotarifaastarifaorigen']) ? null : $objExpansionAliasArray['cambiotarifaastarifaorigen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCambioTarifaAsTarifaOrigenArray)
				$objToReturn->_objCambioTarifaAsTarifaOrigenArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCambioTarifaAsTarifaOrigenArray[] = CambioTarifa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cambiotarifaastarifaorigen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCambioTarifaAsTarifaOrigen)) {
					$objToReturn->_objCambioTarifaAsTarifaOrigen = CambioTarifa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cambiotarifaastarifaorigen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacTarifaPesoAsTarifa Virtual Binding
			$strAlias = $strAliasPrefix . 'factarifapesoastarifa__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factarifapesoastarifa']) ? null : $objExpansionAliasArray['factarifapesoastarifa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacTarifaPesoAsTarifaArray)
				$objToReturn->_objFacTarifaPesoAsTarifaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacTarifaPesoAsTarifaArray[] = FacTarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifapesoastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacTarifaPesoAsTarifa)) {
					$objToReturn->_objFacTarifaPesoAsTarifa = FacTarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifapesoastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsTarifa Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasastarifa__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasastarifa']) ? null : $objExpansionAliasArray['guiasastarifa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsTarifaArray)
				$objToReturn->_objGuiasAsTarifaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsTarifaArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsTarifa)) {
					$objToReturn->_objGuiasAsTarifa = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasHAsTarifa Virtual Binding
			$strAlias = $strAliasPrefix . 'guiashastarifa__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiashastarifa']) ? null : $objExpansionAliasArray['guiashastarifa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasHAsTarifaArray)
				$objToReturn->_objGuiasHAsTarifaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasHAsTarifaArray[] = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasHAsTarifa)) {
					$objToReturn->_objGuiasHAsTarifa = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MasterClienteAsTarifa Virtual Binding
			$strAlias = $strAliasPrefix . 'masterclienteastarifa__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['masterclienteastarifa']) ? null : $objExpansionAliasArray['masterclienteastarifa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMasterClienteAsTarifaArray)
				$objToReturn->_objMasterClienteAsTarifaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMasterClienteAsTarifaArray[] = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMasterClienteAsTarifa)) {
					$objToReturn->_objMasterClienteAsTarifa = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaAsTarifa Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregaastarifa__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregaastarifa']) ? null : $objExpansionAliasArray['notaentregaastarifa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaAsTarifaArray)
				$objToReturn->_objNotaEntregaAsTarifaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaAsTarifaArray[] = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregaastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaAsTarifa)) {
					$objToReturn->_objNotaEntregaAsTarifa = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregaastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaHAsTarifa Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregahastarifa__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregahastarifa']) ? null : $objExpansionAliasArray['notaentregahastarifa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaHAsTarifaArray)
				$objToReturn->_objNotaEntregaHAsTarifaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaHAsTarifaArray[] = NotaEntregaH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregahastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaHAsTarifa)) {
					$objToReturn->_objNotaEntregaHAsTarifa = NotaEntregaH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregahastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for TarifaPesoAsTarifa Virtual Binding
			$strAlias = $strAliasPrefix . 'tarifapesoastarifa__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['tarifapesoastarifa']) ? null : $objExpansionAliasArray['tarifapesoastarifa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objTarifaPesoAsTarifaArray)
				$objToReturn->_objTarifaPesoAsTarifaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objTarifaPesoAsTarifaArray[] = TarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifapesoastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objTarifaPesoAsTarifa)) {
					$objToReturn->_objTarifaPesoAsTarifa = TarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifapesoastarifa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacTarifas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacTarifa[]
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
					$objItem = FacTarifa::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacTarifa::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacTarifa object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacTarifa next row resulting from the query
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
			return FacTarifa::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacTarifa object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifa
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FacTarifa::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTarifa()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single FacTarifa object,
		 * by Descripcion Index(es)
		 * @param string $strDescripcion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifa
		*/
		public static function LoadByDescripcion($strDescripcion, $objOptionalClauses = null) {
			return FacTarifa::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTarifa()->Descripcion, $strDescripcion)
				),
				$objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacTarifa
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_tarifa` (
							`descripcion`,
							`peso_inicial`,
							`valor_incremento`,
							`medida_incremento`,
							`porcentaje_sobre_valor`,
							`volumen_para_dscto`,
							`dscto_por_volumen`,
							`peso_para_dscto`,
							`dscto_por_peso`,
							`monto_minimo`,
							`costo_parada_adicional`,
							`costo_ayudante`,
							`incremento_urbano`,
							`peso_inicial_urbano`,
							`tasa_iva`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->fltPesoInicial) . ',
							' . $objDatabase->SqlVariable($this->fltValorIncremento) . ',
							' . $objDatabase->SqlVariable($this->strMedidaIncremento) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeSobreValor) . ',
							' . $objDatabase->SqlVariable($this->intVolumenParaDscto) . ',
							' . $objDatabase->SqlVariable($this->fltDsctoPorVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltPesoParaDscto) . ',
							' . $objDatabase->SqlVariable($this->fltDsctoPorPeso) . ',
							' . $objDatabase->SqlVariable($this->fltMontoMinimo) . ',
							' . $objDatabase->SqlVariable($this->fltCostoParadaAdicional) . ',
							' . $objDatabase->SqlVariable($this->fltCostoAyudante) . ',
							' . $objDatabase->SqlVariable($this->fltIncrementoUrbano) . ',
							' . $objDatabase->SqlVariable($this->fltPesoInicialUrbano) . ',
							' . $objDatabase->SqlVariable($this->fltTasaIva) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('fac_tarifa', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_tarifa`
						SET
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`peso_inicial` = ' . $objDatabase->SqlVariable($this->fltPesoInicial) . ',
							`valor_incremento` = ' . $objDatabase->SqlVariable($this->fltValorIncremento) . ',
							`medida_incremento` = ' . $objDatabase->SqlVariable($this->strMedidaIncremento) . ',
							`porcentaje_sobre_valor` = ' . $objDatabase->SqlVariable($this->fltPorcentajeSobreValor) . ',
							`volumen_para_dscto` = ' . $objDatabase->SqlVariable($this->intVolumenParaDscto) . ',
							`dscto_por_volumen` = ' . $objDatabase->SqlVariable($this->fltDsctoPorVolumen) . ',
							`peso_para_dscto` = ' . $objDatabase->SqlVariable($this->fltPesoParaDscto) . ',
							`dscto_por_peso` = ' . $objDatabase->SqlVariable($this->fltDsctoPorPeso) . ',
							`monto_minimo` = ' . $objDatabase->SqlVariable($this->fltMontoMinimo) . ',
							`costo_parada_adicional` = ' . $objDatabase->SqlVariable($this->fltCostoParadaAdicional) . ',
							`costo_ayudante` = ' . $objDatabase->SqlVariable($this->fltCostoAyudante) . ',
							`incremento_urbano` = ' . $objDatabase->SqlVariable($this->fltIncrementoUrbano) . ',
							`peso_inicial_urbano` = ' . $objDatabase->SqlVariable($this->fltPesoInicialUrbano) . ',
							`tasa_iva` = ' . $objDatabase->SqlVariable($this->fltTasaIva) . '
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
		 * Delete this FacTarifa
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacTarifa with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacTarifa ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacTarifa', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacTarifas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_tarifa table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_tarifa`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacTarifa from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacTarifa object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacTarifa::Load($this->intId);

			// Update $this's local variables to match
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->fltPesoInicial = $objReloaded->fltPesoInicial;
			$this->fltValorIncremento = $objReloaded->fltValorIncremento;
			$this->strMedidaIncremento = $objReloaded->strMedidaIncremento;
			$this->fltPorcentajeSobreValor = $objReloaded->fltPorcentajeSobreValor;
			$this->intVolumenParaDscto = $objReloaded->intVolumenParaDscto;
			$this->fltDsctoPorVolumen = $objReloaded->fltDsctoPorVolumen;
			$this->fltPesoParaDscto = $objReloaded->fltPesoParaDscto;
			$this->fltDsctoPorPeso = $objReloaded->fltDsctoPorPeso;
			$this->fltMontoMinimo = $objReloaded->fltMontoMinimo;
			$this->fltCostoParadaAdicional = $objReloaded->fltCostoParadaAdicional;
			$this->fltCostoAyudante = $objReloaded->fltCostoAyudante;
			$this->fltIncrementoUrbano = $objReloaded->fltIncrementoUrbano;
			$this->fltPesoInicialUrbano = $objReloaded->fltPesoInicialUrbano;
			$this->fltTasaIva = $objReloaded->fltTasaIva;
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

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Unique)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'PesoInicial':
					/**
					 * Gets the value for fltPesoInicial (Not Null)
					 * @return double
					 */
					return $this->fltPesoInicial;

				case 'ValorIncremento':
					/**
					 * Gets the value for fltValorIncremento (Not Null)
					 * @return double
					 */
					return $this->fltValorIncremento;

				case 'MedidaIncremento':
					/**
					 * Gets the value for strMedidaIncremento (Not Null)
					 * @return string
					 */
					return $this->strMedidaIncremento;

				case 'PorcentajeSobreValor':
					/**
					 * Gets the value for fltPorcentajeSobreValor (Not Null)
					 * @return double
					 */
					return $this->fltPorcentajeSobreValor;

				case 'VolumenParaDscto':
					/**
					 * Gets the value for intVolumenParaDscto (Not Null)
					 * @return integer
					 */
					return $this->intVolumenParaDscto;

				case 'DsctoPorVolumen':
					/**
					 * Gets the value for fltDsctoPorVolumen (Not Null)
					 * @return double
					 */
					return $this->fltDsctoPorVolumen;

				case 'PesoParaDscto':
					/**
					 * Gets the value for fltPesoParaDscto (Not Null)
					 * @return double
					 */
					return $this->fltPesoParaDscto;

				case 'DsctoPorPeso':
					/**
					 * Gets the value for fltDsctoPorPeso (Not Null)
					 * @return double
					 */
					return $this->fltDsctoPorPeso;

				case 'MontoMinimo':
					/**
					 * Gets the value for fltMontoMinimo (Not Null)
					 * @return double
					 */
					return $this->fltMontoMinimo;

				case 'CostoParadaAdicional':
					/**
					 * Gets the value for fltCostoParadaAdicional (Not Null)
					 * @return double
					 */
					return $this->fltCostoParadaAdicional;

				case 'CostoAyudante':
					/**
					 * Gets the value for fltCostoAyudante (Not Null)
					 * @return double
					 */
					return $this->fltCostoAyudante;

				case 'IncrementoUrbano':
					/**
					 * Gets the value for fltIncrementoUrbano (Not Null)
					 * @return double
					 */
					return $this->fltIncrementoUrbano;

				case 'PesoInicialUrbano':
					/**
					 * Gets the value for fltPesoInicialUrbano (Not Null)
					 * @return double
					 */
					return $this->fltPesoInicialUrbano;

				case 'TasaIva':
					/**
					 * Gets the value for fltTasaIva 
					 * @return double
					 */
					return $this->fltTasaIva;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_CambioTarifaAsTarifaDestino':
					/**
					 * Gets the value for the private _objCambioTarifaAsTarifaDestino (Read-Only)
					 * if set due to an expansion on the cambio_tarifa.tarifa_destino_id reverse relationship
					 * @return CambioTarifa
					 */
					return $this->_objCambioTarifaAsTarifaDestino;

				case '_CambioTarifaAsTarifaDestinoArray':
					/**
					 * Gets the value for the private _objCambioTarifaAsTarifaDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the cambio_tarifa.tarifa_destino_id reverse relationship
					 * @return CambioTarifa[]
					 */
					return $this->_objCambioTarifaAsTarifaDestinoArray;

				case '_CambioTarifaAsTarifaOrigen':
					/**
					 * Gets the value for the private _objCambioTarifaAsTarifaOrigen (Read-Only)
					 * if set due to an expansion on the cambio_tarifa.tarifa_origen_id reverse relationship
					 * @return CambioTarifa
					 */
					return $this->_objCambioTarifaAsTarifaOrigen;

				case '_CambioTarifaAsTarifaOrigenArray':
					/**
					 * Gets the value for the private _objCambioTarifaAsTarifaOrigenArray (Read-Only)
					 * if set due to an ExpandAsArray on the cambio_tarifa.tarifa_origen_id reverse relationship
					 * @return CambioTarifa[]
					 */
					return $this->_objCambioTarifaAsTarifaOrigenArray;

				case '_FacTarifaPesoAsTarifa':
					/**
					 * Gets the value for the private _objFacTarifaPesoAsTarifa (Read-Only)
					 * if set due to an expansion on the fac_tarifa_peso.tarifa_id reverse relationship
					 * @return FacTarifaPeso
					 */
					return $this->_objFacTarifaPesoAsTarifa;

				case '_FacTarifaPesoAsTarifaArray':
					/**
					 * Gets the value for the private _objFacTarifaPesoAsTarifaArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_tarifa_peso.tarifa_id reverse relationship
					 * @return FacTarifaPeso[]
					 */
					return $this->_objFacTarifaPesoAsTarifaArray;

				case '_GuiasAsTarifa':
					/**
					 * Gets the value for the private _objGuiasAsTarifa (Read-Only)
					 * if set due to an expansion on the guias.tarifa_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsTarifa;

				case '_GuiasAsTarifaArray':
					/**
					 * Gets the value for the private _objGuiasAsTarifaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.tarifa_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsTarifaArray;

				case '_GuiasHAsTarifa':
					/**
					 * Gets the value for the private _objGuiasHAsTarifa (Read-Only)
					 * if set due to an expansion on the guias_h.tarifa_id reverse relationship
					 * @return GuiasH
					 */
					return $this->_objGuiasHAsTarifa;

				case '_GuiasHAsTarifaArray':
					/**
					 * Gets the value for the private _objGuiasHAsTarifaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_h.tarifa_id reverse relationship
					 * @return GuiasH[]
					 */
					return $this->_objGuiasHAsTarifaArray;

				case '_MasterClienteAsTarifa':
					/**
					 * Gets the value for the private _objMasterClienteAsTarifa (Read-Only)
					 * if set due to an expansion on the master_cliente.tarifa_id reverse relationship
					 * @return MasterCliente
					 */
					return $this->_objMasterClienteAsTarifa;

				case '_MasterClienteAsTarifaArray':
					/**
					 * Gets the value for the private _objMasterClienteAsTarifaArray (Read-Only)
					 * if set due to an ExpandAsArray on the master_cliente.tarifa_id reverse relationship
					 * @return MasterCliente[]
					 */
					return $this->_objMasterClienteAsTarifaArray;

				case '_NotaEntregaAsTarifa':
					/**
					 * Gets the value for the private _objNotaEntregaAsTarifa (Read-Only)
					 * if set due to an expansion on the nota_entrega.tarifa_id reverse relationship
					 * @return NotaEntrega
					 */
					return $this->_objNotaEntregaAsTarifa;

				case '_NotaEntregaAsTarifaArray':
					/**
					 * Gets the value for the private _objNotaEntregaAsTarifaArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega.tarifa_id reverse relationship
					 * @return NotaEntrega[]
					 */
					return $this->_objNotaEntregaAsTarifaArray;

				case '_NotaEntregaHAsTarifa':
					/**
					 * Gets the value for the private _objNotaEntregaHAsTarifa (Read-Only)
					 * if set due to an expansion on the nota_entrega_h.tarifa_id reverse relationship
					 * @return NotaEntregaH
					 */
					return $this->_objNotaEntregaHAsTarifa;

				case '_NotaEntregaHAsTarifaArray':
					/**
					 * Gets the value for the private _objNotaEntregaHAsTarifaArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_h.tarifa_id reverse relationship
					 * @return NotaEntregaH[]
					 */
					return $this->_objNotaEntregaHAsTarifaArray;

				case '_TarifaPesoAsTarifa':
					/**
					 * Gets the value for the private _objTarifaPesoAsTarifa (Read-Only)
					 * if set due to an expansion on the tarifa_peso.tarifa_id reverse relationship
					 * @return TarifaPeso
					 */
					return $this->_objTarifaPesoAsTarifa;

				case '_TarifaPesoAsTarifaArray':
					/**
					 * Gets the value for the private _objTarifaPesoAsTarifaArray (Read-Only)
					 * if set due to an ExpandAsArray on the tarifa_peso.tarifa_id reverse relationship
					 * @return TarifaPeso[]
					 */
					return $this->_objTarifaPesoAsTarifaArray;


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
				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoInicial':
					/**
					 * Sets the value for fltPesoInicial (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoInicial = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ValorIncremento':
					/**
					 * Sets the value for fltValorIncremento (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValorIncremento = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MedidaIncremento':
					/**
					 * Sets the value for strMedidaIncremento (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMedidaIncremento = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeSobreValor':
					/**
					 * Sets the value for fltPorcentajeSobreValor (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeSobreValor = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VolumenParaDscto':
					/**
					 * Sets the value for intVolumenParaDscto (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intVolumenParaDscto = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DsctoPorVolumen':
					/**
					 * Sets the value for fltDsctoPorVolumen (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltDsctoPorVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoParaDscto':
					/**
					 * Sets the value for fltPesoParaDscto (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoParaDscto = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DsctoPorPeso':
					/**
					 * Sets the value for fltDsctoPorPeso (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltDsctoPorPeso = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoMinimo':
					/**
					 * Sets the value for fltMontoMinimo (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoMinimo = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CostoParadaAdicional':
					/**
					 * Sets the value for fltCostoParadaAdicional (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltCostoParadaAdicional = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CostoAyudante':
					/**
					 * Sets the value for fltCostoAyudante (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltCostoAyudante = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IncrementoUrbano':
					/**
					 * Sets the value for fltIncrementoUrbano (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltIncrementoUrbano = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoInicialUrbano':
					/**
					 * Sets the value for fltPesoInicialUrbano (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoInicialUrbano = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TasaIva':
					/**
					 * Sets the value for fltTasaIva 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTasaIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
			if ($this->CountCambioTarifasAsTarifaDestino()) {
				$arrTablRela[] = 'cambio_tarifa';
			}
			if ($this->CountCambioTarifasAsTarifaOrigen()) {
				$arrTablRela[] = 'cambio_tarifa';
			}
			if ($this->CountFacTarifaPesosAsTarifa()) {
				$arrTablRela[] = 'fac_tarifa_peso';
			}
			if ($this->CountGuiasesAsTarifa()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountGuiasHsAsTarifa()) {
				$arrTablRela[] = 'guias_h';
			}
			if ($this->CountMasterClientesAsTarifa()) {
				$arrTablRela[] = 'master_cliente';
			}
			if ($this->CountNotaEntregasAsTarifa()) {
				$arrTablRela[] = 'nota_entrega';
			}
			if ($this->CountNotaEntregaHsAsTarifa()) {
				$arrTablRela[] = 'nota_entrega_h';
			}
			if ($this->CountTarifaPesosAsTarifa()) {
				$arrTablRela[] = 'tarifa_peso';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for CambioTarifaAsTarifaDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CambioTarifasAsTarifaDestino as an array of CambioTarifa objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CambioTarifa[]
		*/
		public function GetCambioTarifaAsTarifaDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CambioTarifa::LoadArrayByTarifaDestinoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CambioTarifasAsTarifaDestino
		 * @return int
		*/
		public function CountCambioTarifasAsTarifaDestino() {
			if ((is_null($this->intId)))
				return 0;

			return CambioTarifa::CountByTarifaDestinoId($this->intId);
		}

		/**
		 * Associates a CambioTarifaAsTarifaDestino
		 * @param CambioTarifa $objCambioTarifa
		 * @return void
		*/
		public function AssociateCambioTarifaAsTarifaDestino(CambioTarifa $objCambioTarifa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCambioTarifaAsTarifaDestino on this unsaved FacTarifa.');
			if ((is_null($objCambioTarifa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCambioTarifaAsTarifaDestino on this FacTarifa with an unsaved CambioTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cambio_tarifa`
				SET
					`tarifa_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCambioTarifa->Id) . '
			');
		}

		/**
		 * Unassociates a CambioTarifaAsTarifaDestino
		 * @param CambioTarifa $objCambioTarifa
		 * @return void
		*/
		public function UnassociateCambioTarifaAsTarifaDestino(CambioTarifa $objCambioTarifa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaDestino on this unsaved FacTarifa.');
			if ((is_null($objCambioTarifa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaDestino on this FacTarifa with an unsaved CambioTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cambio_tarifa`
				SET
					`tarifa_destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCambioTarifa->Id) . ' AND
					`tarifa_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all CambioTarifasAsTarifaDestino
		 * @return void
		*/
		public function UnassociateAllCambioTarifasAsTarifaDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaDestino on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cambio_tarifa`
				SET
					`tarifa_destino_id` = null
				WHERE
					`tarifa_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CambioTarifaAsTarifaDestino
		 * @param CambioTarifa $objCambioTarifa
		 * @return void
		*/
		public function DeleteAssociatedCambioTarifaAsTarifaDestino(CambioTarifa $objCambioTarifa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaDestino on this unsaved FacTarifa.');
			if ((is_null($objCambioTarifa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaDestino on this FacTarifa with an unsaved CambioTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cambio_tarifa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCambioTarifa->Id) . ' AND
					`tarifa_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated CambioTarifasAsTarifaDestino
		 * @return void
		*/
		public function DeleteAllCambioTarifasAsTarifaDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaDestino on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cambio_tarifa`
				WHERE
					`tarifa_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for CambioTarifaAsTarifaOrigen
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CambioTarifasAsTarifaOrigen as an array of CambioTarifa objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CambioTarifa[]
		*/
		public function GetCambioTarifaAsTarifaOrigenArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CambioTarifa::LoadArrayByTarifaOrigenId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CambioTarifasAsTarifaOrigen
		 * @return int
		*/
		public function CountCambioTarifasAsTarifaOrigen() {
			if ((is_null($this->intId)))
				return 0;

			return CambioTarifa::CountByTarifaOrigenId($this->intId);
		}

		/**
		 * Associates a CambioTarifaAsTarifaOrigen
		 * @param CambioTarifa $objCambioTarifa
		 * @return void
		*/
		public function AssociateCambioTarifaAsTarifaOrigen(CambioTarifa $objCambioTarifa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCambioTarifaAsTarifaOrigen on this unsaved FacTarifa.');
			if ((is_null($objCambioTarifa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCambioTarifaAsTarifaOrigen on this FacTarifa with an unsaved CambioTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cambio_tarifa`
				SET
					`tarifa_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCambioTarifa->Id) . '
			');
		}

		/**
		 * Unassociates a CambioTarifaAsTarifaOrigen
		 * @param CambioTarifa $objCambioTarifa
		 * @return void
		*/
		public function UnassociateCambioTarifaAsTarifaOrigen(CambioTarifa $objCambioTarifa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaOrigen on this unsaved FacTarifa.');
			if ((is_null($objCambioTarifa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaOrigen on this FacTarifa with an unsaved CambioTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cambio_tarifa`
				SET
					`tarifa_origen_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCambioTarifa->Id) . ' AND
					`tarifa_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all CambioTarifasAsTarifaOrigen
		 * @return void
		*/
		public function UnassociateAllCambioTarifasAsTarifaOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaOrigen on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cambio_tarifa`
				SET
					`tarifa_origen_id` = null
				WHERE
					`tarifa_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CambioTarifaAsTarifaOrigen
		 * @param CambioTarifa $objCambioTarifa
		 * @return void
		*/
		public function DeleteAssociatedCambioTarifaAsTarifaOrigen(CambioTarifa $objCambioTarifa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaOrigen on this unsaved FacTarifa.');
			if ((is_null($objCambioTarifa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaOrigen on this FacTarifa with an unsaved CambioTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cambio_tarifa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCambioTarifa->Id) . ' AND
					`tarifa_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated CambioTarifasAsTarifaOrigen
		 * @return void
		*/
		public function DeleteAllCambioTarifasAsTarifaOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCambioTarifaAsTarifaOrigen on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cambio_tarifa`
				WHERE
					`tarifa_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacTarifaPesoAsTarifa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacTarifaPesosAsTarifa as an array of FacTarifaPeso objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public function GetFacTarifaPesoAsTarifaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacTarifaPeso::LoadArrayByTarifaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacTarifaPesosAsTarifa
		 * @return int
		*/
		public function CountFacTarifaPesosAsTarifa() {
			if ((is_null($this->intId)))
				return 0;

			return FacTarifaPeso::CountByTarifaId($this->intId);
		}

		/**
		 * Associates a FacTarifaPesoAsTarifa
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function AssociateFacTarifaPesoAsTarifa(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaPesoAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaPesoAsTarifa on this FacTarifa with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . '
			');
		}

		/**
		 * Unassociates a FacTarifaPesoAsTarifa
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function UnassociateFacTarifaPesoAsTarifa(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsTarifa on this FacTarifa with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`tarifa_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacTarifaPesosAsTarifa
		 * @return void
		*/
		public function UnassociateAllFacTarifaPesosAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`tarifa_id` = null
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacTarifaPesoAsTarifa
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function DeleteAssociatedFacTarifaPesoAsTarifa(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsTarifa on this FacTarifa with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacTarifaPesosAsTarifa
		 * @return void
		*/
		public function DeleteAllFacTarifaPesosAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasAsTarifa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsTarifa as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsTarifaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByTarifaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsTarifa
		 * @return int
		*/
		public function CountGuiasesAsTarifa() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByTarifaId($this->intId);
		}

		/**
		 * Associates a GuiasAsTarifa
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsTarifa(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsTarifa on this FacTarifa with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsTarifa
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsTarifa(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsTarifa on this FacTarifa with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`tarifa_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsTarifa
		 * @return void
		*/
		public function UnassociateAllGuiasesAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`tarifa_id` = null
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsTarifa
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsTarifa(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsTarifa on this FacTarifa with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsTarifa
		 * @return void
		*/
		public function DeleteAllGuiasesAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasHAsTarifa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasHsAsTarifa as an array of GuiasH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasH[]
		*/
		public function GetGuiasHAsTarifaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiasH::LoadArrayByTarifaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasHsAsTarifa
		 * @return int
		*/
		public function CountGuiasHsAsTarifa() {
			if ((is_null($this->intId)))
				return 0;

			return GuiasH::CountByTarifaId($this->intId);
		}

		/**
		 * Associates a GuiasHAsTarifa
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function AssociateGuiasHAsTarifa(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsTarifa on this FacTarifa with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasHAsTarifa
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function UnassociateGuiasHAsTarifa(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsTarifa on this FacTarifa with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`tarifa_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasHsAsTarifa
		 * @return void
		*/
		public function UnassociateAllGuiasHsAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`tarifa_id` = null
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasHAsTarifa
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function DeleteAssociatedGuiasHAsTarifa(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsTarifa on this FacTarifa with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasHsAsTarifa
		 * @return void
		*/
		public function DeleteAllGuiasHsAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for MasterClienteAsTarifa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MasterClientesAsTarifa as an array of MasterCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public function GetMasterClienteAsTarifaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return MasterCliente::LoadArrayByTarifaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MasterClientesAsTarifa
		 * @return int
		*/
		public function CountMasterClientesAsTarifa() {
			if ((is_null($this->intId)))
				return 0;

			return MasterCliente::CountByTarifaId($this->intId);
		}

		/**
		 * Associates a MasterClienteAsTarifa
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function AssociateMasterClienteAsTarifa(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsTarifa on this FacTarifa with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . '
			');
		}

		/**
		 * Unassociates a MasterClienteAsTarifa
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function UnassociateMasterClienteAsTarifa(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsTarifa on this FacTarifa with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`tarifa_id` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all MasterClientesAsTarifa
		 * @return void
		*/
		public function UnassociateAllMasterClientesAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`tarifa_id` = null
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated MasterClienteAsTarifa
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function DeleteAssociatedMasterClienteAsTarifa(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsTarifa on this FacTarifa with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated MasterClientesAsTarifa
		 * @return void
		*/
		public function DeleteAllMasterClientesAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaAsTarifa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregasAsTarifa as an array of NotaEntrega objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega[]
		*/
		public function GetNotaEntregaAsTarifaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntrega::LoadArrayByTarifaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregasAsTarifa
		 * @return int
		*/
		public function CountNotaEntregasAsTarifa() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntrega::CountByTarifaId($this->intId);
		}

		/**
		 * Associates a NotaEntregaAsTarifa
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function AssociateNotaEntregaAsTarifa(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaAsTarifa on this FacTarifa with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaAsTarifa
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function UnassociateNotaEntregaAsTarifa(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsTarifa on this FacTarifa with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`tarifa_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregasAsTarifa
		 * @return void
		*/
		public function UnassociateAllNotaEntregasAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`tarifa_id` = null
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaAsTarifa
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaAsTarifa(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsTarifa on this FacTarifa with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregasAsTarifa
		 * @return void
		*/
		public function DeleteAllNotaEntregasAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega`
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaHAsTarifa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaHsAsTarifa as an array of NotaEntregaH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaH[]
		*/
		public function GetNotaEntregaHAsTarifaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntregaH::LoadArrayByTarifaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaHsAsTarifa
		 * @return int
		*/
		public function CountNotaEntregaHsAsTarifa() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntregaH::CountByTarifaId($this->intId);
		}

		/**
		 * Associates a NotaEntregaHAsTarifa
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function AssociateNotaEntregaHAsTarifa(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaHAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaHAsTarifa on this FacTarifa with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaHAsTarifa
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function UnassociateNotaEntregaHAsTarifa(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsTarifa on this FacTarifa with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`tarifa_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaHsAsTarifa
		 * @return void
		*/
		public function UnassociateAllNotaEntregaHsAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`tarifa_id` = null
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaHAsTarifa
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaHAsTarifa(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsTarifa on this FacTarifa with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaHsAsTarifa
		 * @return void
		*/
		public function DeleteAllNotaEntregaHsAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_h`
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for TarifaPesoAsTarifa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TarifaPesosAsTarifa as an array of TarifaPeso objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaPeso[]
		*/
		public function GetTarifaPesoAsTarifaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TarifaPeso::LoadArrayByTarifaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TarifaPesosAsTarifa
		 * @return int
		*/
		public function CountTarifaPesosAsTarifa() {
			if ((is_null($this->intId)))
				return 0;

			return TarifaPeso::CountByTarifaId($this->intId);
		}

		/**
		 * Associates a TarifaPesoAsTarifa
		 * @param TarifaPeso $objTarifaPeso
		 * @return void
		*/
		public function AssociateTarifaPesoAsTarifa(TarifaPeso $objTarifaPeso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTarifaPesoAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTarifaPesoAsTarifa on this FacTarifa with an unsaved TarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_peso`
				SET
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaPeso->Id) . '
			');
		}

		/**
		 * Unassociates a TarifaPesoAsTarifa
		 * @param TarifaPeso $objTarifaPeso
		 * @return void
		*/
		public function UnassociateTarifaPesoAsTarifa(TarifaPeso $objTarifaPeso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaPesoAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaPesoAsTarifa on this FacTarifa with an unsaved TarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_peso`
				SET
					`tarifa_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaPeso->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all TarifaPesosAsTarifa
		 * @return void
		*/
		public function UnassociateAllTarifaPesosAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaPesoAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_peso`
				SET
					`tarifa_id` = null
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TarifaPesoAsTarifa
		 * @param TarifaPeso $objTarifaPeso
		 * @return void
		*/
		public function DeleteAssociatedTarifaPesoAsTarifa(TarifaPeso $objTarifaPeso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaPesoAsTarifa on this unsaved FacTarifa.');
			if ((is_null($objTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaPesoAsTarifa on this FacTarifa with an unsaved TarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_peso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaPeso->Id) . ' AND
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated TarifaPesosAsTarifa
		 * @return void
		*/
		public function DeleteAllTarifaPesosAsTarifa() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaPesoAsTarifa on this unsaved FacTarifa.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_peso`
				WHERE
					`tarifa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		
		///////////////////////////////
		// METHODS TO EXTRACT INFO ABOUT THE CLASS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetTableName() {
			return "fac_tarifa";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacTarifa::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacTarifa"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="PesoInicial" type="xsd:float"/>';
			$strToReturn .= '<element name="ValorIncremento" type="xsd:float"/>';
			$strToReturn .= '<element name="MedidaIncremento" type="xsd:string"/>';
			$strToReturn .= '<element name="PorcentajeSobreValor" type="xsd:float"/>';
			$strToReturn .= '<element name="VolumenParaDscto" type="xsd:int"/>';
			$strToReturn .= '<element name="DsctoPorVolumen" type="xsd:float"/>';
			$strToReturn .= '<element name="PesoParaDscto" type="xsd:float"/>';
			$strToReturn .= '<element name="DsctoPorPeso" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoMinimo" type="xsd:float"/>';
			$strToReturn .= '<element name="CostoParadaAdicional" type="xsd:float"/>';
			$strToReturn .= '<element name="CostoAyudante" type="xsd:float"/>';
			$strToReturn .= '<element name="IncrementoUrbano" type="xsd:float"/>';
			$strToReturn .= '<element name="PesoInicialUrbano" type="xsd:float"/>';
			$strToReturn .= '<element name="TasaIva" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacTarifa', $strComplexTypeArray)) {
				$strComplexTypeArray['FacTarifa'] = FacTarifa::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacTarifa::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacTarifa();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'PesoInicial'))
				$objToReturn->fltPesoInicial = $objSoapObject->PesoInicial;
			if (property_exists($objSoapObject, 'ValorIncremento'))
				$objToReturn->fltValorIncremento = $objSoapObject->ValorIncremento;
			if (property_exists($objSoapObject, 'MedidaIncremento'))
				$objToReturn->strMedidaIncremento = $objSoapObject->MedidaIncremento;
			if (property_exists($objSoapObject, 'PorcentajeSobreValor'))
				$objToReturn->fltPorcentajeSobreValor = $objSoapObject->PorcentajeSobreValor;
			if (property_exists($objSoapObject, 'VolumenParaDscto'))
				$objToReturn->intVolumenParaDscto = $objSoapObject->VolumenParaDscto;
			if (property_exists($objSoapObject, 'DsctoPorVolumen'))
				$objToReturn->fltDsctoPorVolumen = $objSoapObject->DsctoPorVolumen;
			if (property_exists($objSoapObject, 'PesoParaDscto'))
				$objToReturn->fltPesoParaDscto = $objSoapObject->PesoParaDscto;
			if (property_exists($objSoapObject, 'DsctoPorPeso'))
				$objToReturn->fltDsctoPorPeso = $objSoapObject->DsctoPorPeso;
			if (property_exists($objSoapObject, 'MontoMinimo'))
				$objToReturn->fltMontoMinimo = $objSoapObject->MontoMinimo;
			if (property_exists($objSoapObject, 'CostoParadaAdicional'))
				$objToReturn->fltCostoParadaAdicional = $objSoapObject->CostoParadaAdicional;
			if (property_exists($objSoapObject, 'CostoAyudante'))
				$objToReturn->fltCostoAyudante = $objSoapObject->CostoAyudante;
			if (property_exists($objSoapObject, 'IncrementoUrbano'))
				$objToReturn->fltIncrementoUrbano = $objSoapObject->IncrementoUrbano;
			if (property_exists($objSoapObject, 'PesoInicialUrbano'))
				$objToReturn->fltPesoInicialUrbano = $objSoapObject->PesoInicialUrbano;
			if (property_exists($objSoapObject, 'TasaIva'))
				$objToReturn->fltTasaIva = $objSoapObject->TasaIva;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacTarifa::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['PesoInicial'] = $this->fltPesoInicial;
			$iArray['ValorIncremento'] = $this->fltValorIncremento;
			$iArray['MedidaIncremento'] = $this->strMedidaIncremento;
			$iArray['PorcentajeSobreValor'] = $this->fltPorcentajeSobreValor;
			$iArray['VolumenParaDscto'] = $this->intVolumenParaDscto;
			$iArray['DsctoPorVolumen'] = $this->fltDsctoPorVolumen;
			$iArray['PesoParaDscto'] = $this->fltPesoParaDscto;
			$iArray['DsctoPorPeso'] = $this->fltDsctoPorPeso;
			$iArray['MontoMinimo'] = $this->fltMontoMinimo;
			$iArray['CostoParadaAdicional'] = $this->fltCostoParadaAdicional;
			$iArray['CostoAyudante'] = $this->fltCostoAyudante;
			$iArray['IncrementoUrbano'] = $this->fltIncrementoUrbano;
			$iArray['PesoInicialUrbano'] = $this->fltPesoInicialUrbano;
			$iArray['TasaIva'] = $this->fltTasaIva;
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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $PesoInicial
     * @property-read QQNode $ValorIncremento
     * @property-read QQNode $MedidaIncremento
     * @property-read QQNode $PorcentajeSobreValor
     * @property-read QQNode $VolumenParaDscto
     * @property-read QQNode $DsctoPorVolumen
     * @property-read QQNode $PesoParaDscto
     * @property-read QQNode $DsctoPorPeso
     * @property-read QQNode $MontoMinimo
     * @property-read QQNode $CostoParadaAdicional
     * @property-read QQNode $CostoAyudante
     * @property-read QQNode $IncrementoUrbano
     * @property-read QQNode $PesoInicialUrbano
     * @property-read QQNode $TasaIva
     *
     *
     * @property-read QQReverseReferenceNodeCambioTarifa $CambioTarifaAsTarifaDestino
     * @property-read QQReverseReferenceNodeCambioTarifa $CambioTarifaAsTarifaOrigen
     * @property-read QQReverseReferenceNodeFacTarifaPeso $FacTarifaPesoAsTarifa
     * @property-read QQReverseReferenceNodeGuias $GuiasAsTarifa
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsTarifa
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsTarifa
     * @property-read QQReverseReferenceNodeNotaEntrega $NotaEntregaAsTarifa
     * @property-read QQReverseReferenceNodeNotaEntregaH $NotaEntregaHAsTarifa
     * @property-read QQReverseReferenceNodeTarifaPeso $TarifaPesoAsTarifa

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacTarifa extends QQNode {
		protected $strTableName = 'fac_tarifa';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacTarifa';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'PesoInicial':
					return new QQNode('peso_inicial', 'PesoInicial', 'Float', $this);
				case 'ValorIncremento':
					return new QQNode('valor_incremento', 'ValorIncremento', 'Float', $this);
				case 'MedidaIncremento':
					return new QQNode('medida_incremento', 'MedidaIncremento', 'VarChar', $this);
				case 'PorcentajeSobreValor':
					return new QQNode('porcentaje_sobre_valor', 'PorcentajeSobreValor', 'Float', $this);
				case 'VolumenParaDscto':
					return new QQNode('volumen_para_dscto', 'VolumenParaDscto', 'Integer', $this);
				case 'DsctoPorVolumen':
					return new QQNode('dscto_por_volumen', 'DsctoPorVolumen', 'Float', $this);
				case 'PesoParaDscto':
					return new QQNode('peso_para_dscto', 'PesoParaDscto', 'Float', $this);
				case 'DsctoPorPeso':
					return new QQNode('dscto_por_peso', 'DsctoPorPeso', 'Float', $this);
				case 'MontoMinimo':
					return new QQNode('monto_minimo', 'MontoMinimo', 'Float', $this);
				case 'CostoParadaAdicional':
					return new QQNode('costo_parada_adicional', 'CostoParadaAdicional', 'Float', $this);
				case 'CostoAyudante':
					return new QQNode('costo_ayudante', 'CostoAyudante', 'Float', $this);
				case 'IncrementoUrbano':
					return new QQNode('incremento_urbano', 'IncrementoUrbano', 'Float', $this);
				case 'PesoInicialUrbano':
					return new QQNode('peso_inicial_urbano', 'PesoInicialUrbano', 'Float', $this);
				case 'TasaIva':
					return new QQNode('tasa_iva', 'TasaIva', 'Float', $this);
				case 'CambioTarifaAsTarifaDestino':
					return new QQReverseReferenceNodeCambioTarifa($this, 'cambiotarifaastarifadestino', 'reverse_reference', 'tarifa_destino_id', 'CambioTarifaAsTarifaDestino');
				case 'CambioTarifaAsTarifaOrigen':
					return new QQReverseReferenceNodeCambioTarifa($this, 'cambiotarifaastarifaorigen', 'reverse_reference', 'tarifa_origen_id', 'CambioTarifaAsTarifaOrigen');
				case 'FacTarifaPesoAsTarifa':
					return new QQReverseReferenceNodeFacTarifaPeso($this, 'factarifapesoastarifa', 'reverse_reference', 'tarifa_id', 'FacTarifaPesoAsTarifa');
				case 'GuiasAsTarifa':
					return new QQReverseReferenceNodeGuias($this, 'guiasastarifa', 'reverse_reference', 'tarifa_id', 'GuiasAsTarifa');
				case 'GuiasHAsTarifa':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashastarifa', 'reverse_reference', 'tarifa_id', 'GuiasHAsTarifa');
				case 'MasterClienteAsTarifa':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteastarifa', 'reverse_reference', 'tarifa_id', 'MasterClienteAsTarifa');
				case 'NotaEntregaAsTarifa':
					return new QQReverseReferenceNodeNotaEntrega($this, 'notaentregaastarifa', 'reverse_reference', 'tarifa_id', 'NotaEntregaAsTarifa');
				case 'NotaEntregaHAsTarifa':
					return new QQReverseReferenceNodeNotaEntregaH($this, 'notaentregahastarifa', 'reverse_reference', 'tarifa_id', 'NotaEntregaHAsTarifa');
				case 'TarifaPesoAsTarifa':
					return new QQReverseReferenceNodeTarifaPeso($this, 'tarifapesoastarifa', 'reverse_reference', 'tarifa_id', 'TarifaPesoAsTarifa');

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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $PesoInicial
     * @property-read QQNode $ValorIncremento
     * @property-read QQNode $MedidaIncremento
     * @property-read QQNode $PorcentajeSobreValor
     * @property-read QQNode $VolumenParaDscto
     * @property-read QQNode $DsctoPorVolumen
     * @property-read QQNode $PesoParaDscto
     * @property-read QQNode $DsctoPorPeso
     * @property-read QQNode $MontoMinimo
     * @property-read QQNode $CostoParadaAdicional
     * @property-read QQNode $CostoAyudante
     * @property-read QQNode $IncrementoUrbano
     * @property-read QQNode $PesoInicialUrbano
     * @property-read QQNode $TasaIva
     *
     *
     * @property-read QQReverseReferenceNodeCambioTarifa $CambioTarifaAsTarifaDestino
     * @property-read QQReverseReferenceNodeCambioTarifa $CambioTarifaAsTarifaOrigen
     * @property-read QQReverseReferenceNodeFacTarifaPeso $FacTarifaPesoAsTarifa
     * @property-read QQReverseReferenceNodeGuias $GuiasAsTarifa
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsTarifa
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsTarifa
     * @property-read QQReverseReferenceNodeNotaEntrega $NotaEntregaAsTarifa
     * @property-read QQReverseReferenceNodeNotaEntregaH $NotaEntregaHAsTarifa
     * @property-read QQReverseReferenceNodeTarifaPeso $TarifaPesoAsTarifa

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacTarifa extends QQReverseReferenceNode {
		protected $strTableName = 'fac_tarifa';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacTarifa';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'PesoInicial':
					return new QQNode('peso_inicial', 'PesoInicial', 'double', $this);
				case 'ValorIncremento':
					return new QQNode('valor_incremento', 'ValorIncremento', 'double', $this);
				case 'MedidaIncremento':
					return new QQNode('medida_incremento', 'MedidaIncremento', 'string', $this);
				case 'PorcentajeSobreValor':
					return new QQNode('porcentaje_sobre_valor', 'PorcentajeSobreValor', 'double', $this);
				case 'VolumenParaDscto':
					return new QQNode('volumen_para_dscto', 'VolumenParaDscto', 'integer', $this);
				case 'DsctoPorVolumen':
					return new QQNode('dscto_por_volumen', 'DsctoPorVolumen', 'double', $this);
				case 'PesoParaDscto':
					return new QQNode('peso_para_dscto', 'PesoParaDscto', 'double', $this);
				case 'DsctoPorPeso':
					return new QQNode('dscto_por_peso', 'DsctoPorPeso', 'double', $this);
				case 'MontoMinimo':
					return new QQNode('monto_minimo', 'MontoMinimo', 'double', $this);
				case 'CostoParadaAdicional':
					return new QQNode('costo_parada_adicional', 'CostoParadaAdicional', 'double', $this);
				case 'CostoAyudante':
					return new QQNode('costo_ayudante', 'CostoAyudante', 'double', $this);
				case 'IncrementoUrbano':
					return new QQNode('incremento_urbano', 'IncrementoUrbano', 'double', $this);
				case 'PesoInicialUrbano':
					return new QQNode('peso_inicial_urbano', 'PesoInicialUrbano', 'double', $this);
				case 'TasaIva':
					return new QQNode('tasa_iva', 'TasaIva', 'double', $this);
				case 'CambioTarifaAsTarifaDestino':
					return new QQReverseReferenceNodeCambioTarifa($this, 'cambiotarifaastarifadestino', 'reverse_reference', 'tarifa_destino_id', 'CambioTarifaAsTarifaDestino');
				case 'CambioTarifaAsTarifaOrigen':
					return new QQReverseReferenceNodeCambioTarifa($this, 'cambiotarifaastarifaorigen', 'reverse_reference', 'tarifa_origen_id', 'CambioTarifaAsTarifaOrigen');
				case 'FacTarifaPesoAsTarifa':
					return new QQReverseReferenceNodeFacTarifaPeso($this, 'factarifapesoastarifa', 'reverse_reference', 'tarifa_id', 'FacTarifaPesoAsTarifa');
				case 'GuiasAsTarifa':
					return new QQReverseReferenceNodeGuias($this, 'guiasastarifa', 'reverse_reference', 'tarifa_id', 'GuiasAsTarifa');
				case 'GuiasHAsTarifa':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashastarifa', 'reverse_reference', 'tarifa_id', 'GuiasHAsTarifa');
				case 'MasterClienteAsTarifa':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteastarifa', 'reverse_reference', 'tarifa_id', 'MasterClienteAsTarifa');
				case 'NotaEntregaAsTarifa':
					return new QQReverseReferenceNodeNotaEntrega($this, 'notaentregaastarifa', 'reverse_reference', 'tarifa_id', 'NotaEntregaAsTarifa');
				case 'NotaEntregaHAsTarifa':
					return new QQReverseReferenceNodeNotaEntregaH($this, 'notaentregahastarifa', 'reverse_reference', 'tarifa_id', 'NotaEntregaHAsTarifa');
				case 'TarifaPesoAsTarifa':
					return new QQReverseReferenceNodeTarifaPeso($this, 'tarifapesoastarifa', 'reverse_reference', 'tarifa_id', 'TarifaPesoAsTarifa');

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
