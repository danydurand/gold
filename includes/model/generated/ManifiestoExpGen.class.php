<?php
	/**
	 * The abstract ManifiestoExpGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ManifiestoExp subclass which
	 * extends this ManifiestoExpGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ManifiestoExp class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Numero the value for strNumero (Not Null)
	 * @property integer $OrigenId the value for intOrigenId (Not Null)
	 * @property string $Transporte the value for strTransporte 
	 * @property string $Master the value for strMaster 
	 * @property integer $DestinoId the value for intDestinoId (Not Null)
	 * @property integer $LineaAereaId the value for intLineaAereaId 
	 * @property string $NroBl the value for strNroBl 
	 * @property QDateTime $FechaCreacion the value for dttFechaCreacion (Not Null)
	 * @property QDateTime $FechaDespacho the value for dttFechaDespacho (Not Null)
	 * @property string $Vuelo the value for strVuelo 
	 * @property string $Booking the value for strBooking 
	 * @property integer $Piezas the value for intPiezas (Not Null)
	 * @property integer $Valijas the value for intValijas (Not Null)
	 * @property double $Libras the value for fltLibras (Not Null)
	 * @property double $Volumen the value for fltVolumen (Not Null)
	 * @property double $Kilos the value for fltKilos 
	 * @property double $PiesCub the value for fltPiesCub 
	 * @property double $Valor the value for fltValor (Not Null)
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property Sucursales $Origen the value for the Sucursales object referenced by intOrigenId (Not Null)
	 * @property Sucursales $Destino the value for the Sucursales object referenced by intDestinoId (Not Null)
	 * @property LineaAerea $LineaAerea the value for the LineaAerea object referenced by intLineaAereaId 
	 * @property-read Bag $_Bag the value for the private _objBag (Read-Only) if set due to an expansion on the manifiesto_exp_bag_assn association table
	 * @property-read Bag[] $_BagArray the value for the private _objBagArray (Read-Only) if set due to an ExpandAsArray on the manifiesto_exp_bag_assn association table
	 * @property-read GuiaPiezas $_GuiaPiezasAsPieza the value for the private _objGuiaPiezasAsPieza (Read-Only) if set due to an expansion on the manifiesto_exp_pieza_assn association table
	 * @property-read GuiaPiezas[] $_GuiaPiezasAsPiezaArray the value for the private _objGuiaPiezasAsPiezaArray (Read-Only) if set due to an ExpandAsArray on the manifiesto_exp_pieza_assn association table
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ManifiestoExpGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column manifiesto_exp.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.numero
		 * @var string strNumero
		 */
		protected $strNumero;
		const NumeroMaxLength = 20;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.origen_id
		 * @var integer intOrigenId
		 */
		protected $intOrigenId;
		const OrigenIdDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.transporte
		 * @var string strTransporte
		 */
		protected $strTransporte;
		const TransporteMaxLength = 30;
		const TransporteDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.master
		 * @var string strMaster
		 */
		protected $strMaster;
		const MasterMaxLength = 30;
		const MasterDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.destino_id
		 * @var integer intDestinoId
		 */
		protected $intDestinoId;
		const DestinoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.linea_aerea_id
		 * @var integer intLineaAereaId
		 */
		protected $intLineaAereaId;
		const LineaAereaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.nro_bl
		 * @var string strNroBl
		 */
		protected $strNroBl;
		const NroBlMaxLength = 20;
		const NroBlDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.fecha_creacion
		 * @var QDateTime dttFechaCreacion
		 */
		protected $dttFechaCreacion;
		const FechaCreacionDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.fecha_despacho
		 * @var QDateTime dttFechaDespacho
		 */
		protected $dttFechaDespacho;
		const FechaDespachoDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.vuelo
		 * @var string strVuelo
		 */
		protected $strVuelo;
		const VueloMaxLength = 10;
		const VueloDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.booking
		 * @var string strBooking
		 */
		protected $strBooking;
		const BookingMaxLength = 20;
		const BookingDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.piezas
		 * @var integer intPiezas
		 */
		protected $intPiezas;
		const PiezasDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.valijas
		 * @var integer intValijas
		 */
		protected $intValijas;
		const ValijasDefault = 0;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.libras
		 * @var double fltLibras
		 */
		protected $fltLibras;
		const LibrasDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.volumen
		 * @var double fltVolumen
		 */
		protected $fltVolumen;
		const VolumenDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.kilos
		 * @var double fltKilos
		 */
		protected $fltKilos;
		const KilosDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.pies_cub
		 * @var double fltPiesCub
		 */
		protected $fltPiesCub;
		const PiesCubDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.valor
		 * @var double fltValor
		 */
		protected $fltValor;
		const ValorDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column manifiesto_exp.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single Bag object
		 * (of type Bag), if this ManifiestoExp object was restored with
		 * an expansion on the manifiesto_exp_bag_assn association table.
		 * @var Bag _objBag;
		 */
		private $_objBag;

		/**
		 * Private member variable that stores a reference to an array of Bag objects
		 * (of type Bag[]), if this ManifiestoExp object was restored with
		 * an ExpandAsArray on the manifiesto_exp_bag_assn association table.
		 * @var Bag[] _objBagArray;
		 */
		private $_objBagArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaPiezasAsPieza object
		 * (of type GuiaPiezas), if this ManifiestoExp object was restored with
		 * an expansion on the manifiesto_exp_pieza_assn association table.
		 * @var GuiaPiezas _objGuiaPiezasAsPieza;
		 */
		private $_objGuiaPiezasAsPieza;

		/**
		 * Private member variable that stores a reference to an array of GuiaPiezasAsPieza objects
		 * (of type GuiaPiezas[]), if this ManifiestoExp object was restored with
		 * an ExpandAsArray on the manifiesto_exp_pieza_assn association table.
		 * @var GuiaPiezas[] _objGuiaPiezasAsPiezaArray;
		 */
		private $_objGuiaPiezasAsPiezaArray = null;

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
		 * in the database column manifiesto_exp.origen_id.
		 *
		 * NOTE: Always use the Origen property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objOrigen
		 */
		protected $objOrigen;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column manifiesto_exp.destino_id.
		 *
		 * NOTE: Always use the Destino property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objDestino
		 */
		protected $objDestino;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column manifiesto_exp.linea_aerea_id.
		 *
		 * NOTE: Always use the LineaAerea property getter to correctly retrieve this LineaAerea object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var LineaAerea objLineaAerea
		 */
		protected $objLineaAerea;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = ManifiestoExp::IdDefault;
			$this->strNumero = ManifiestoExp::NumeroDefault;
			$this->intOrigenId = ManifiestoExp::OrigenIdDefault;
			$this->strTransporte = ManifiestoExp::TransporteDefault;
			$this->strMaster = ManifiestoExp::MasterDefault;
			$this->intDestinoId = ManifiestoExp::DestinoIdDefault;
			$this->intLineaAereaId = ManifiestoExp::LineaAereaIdDefault;
			$this->strNroBl = ManifiestoExp::NroBlDefault;
			$this->dttFechaCreacion = (ManifiestoExp::FechaCreacionDefault === null)?null:new QDateTime(ManifiestoExp::FechaCreacionDefault);
			$this->dttFechaDespacho = (ManifiestoExp::FechaDespachoDefault === null)?null:new QDateTime(ManifiestoExp::FechaDespachoDefault);
			$this->strVuelo = ManifiestoExp::VueloDefault;
			$this->strBooking = ManifiestoExp::BookingDefault;
			$this->intPiezas = ManifiestoExp::PiezasDefault;
			$this->intValijas = ManifiestoExp::ValijasDefault;
			$this->fltLibras = ManifiestoExp::LibrasDefault;
			$this->fltVolumen = ManifiestoExp::VolumenDefault;
			$this->fltKilos = ManifiestoExp::KilosDefault;
			$this->fltPiesCub = ManifiestoExp::PiesCubDefault;
			$this->fltValor = ManifiestoExp::ValorDefault;
			$this->dttCreatedAt = (ManifiestoExp::CreatedAtDefault === null)?null:new QDateTime(ManifiestoExp::CreatedAtDefault);
			$this->dttUpdatedAt = (ManifiestoExp::UpdatedAtDefault === null)?null:new QDateTime(ManifiestoExp::UpdatedAtDefault);
			$this->intCreatedBy = ManifiestoExp::CreatedByDefault;
			$this->intUpdatedBy = ManifiestoExp::UpdatedByDefault;
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
		 * Load a ManifiestoExp from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ManifiestoExp', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ManifiestoExp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ManifiestoExp()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ManifiestoExps
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ManifiestoExp::QueryArray to perform the LoadAll query
			try {
				return ManifiestoExp::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ManifiestoExps
		 * @return int
		 */
		public static function CountAll() {
			// Call ManifiestoExp::QueryCount to perform the CountAll query
			return ManifiestoExp::QueryCount(QQ::All());
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
			$objDatabase = ManifiestoExp::GetDatabase();

			// Create/Build out the QueryBuilder object with ManifiestoExp-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'manifiesto_exp');

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
				ManifiestoExp::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('manifiesto_exp');

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
		 * Static Qcubed Query method to query for a single ManifiestoExp object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ManifiestoExp the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ManifiestoExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ManifiestoExp object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ManifiestoExp::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ManifiestoExp::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ManifiestoExp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ManifiestoExp[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ManifiestoExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ManifiestoExp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ManifiestoExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ManifiestoExp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ManifiestoExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ManifiestoExp::GetDatabase();

			$strQuery = ManifiestoExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/manifiestoexp', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ManifiestoExp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ManifiestoExp
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'manifiesto_exp';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'origen_id', $strAliasPrefix . 'origen_id');
			    $objBuilder->AddSelectItem($strTableName, 'transporte', $strAliasPrefix . 'transporte');
			    $objBuilder->AddSelectItem($strTableName, 'master', $strAliasPrefix . 'master');
			    $objBuilder->AddSelectItem($strTableName, 'destino_id', $strAliasPrefix . 'destino_id');
			    $objBuilder->AddSelectItem($strTableName, 'linea_aerea_id', $strAliasPrefix . 'linea_aerea_id');
			    $objBuilder->AddSelectItem($strTableName, 'nro_bl', $strAliasPrefix . 'nro_bl');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_creacion', $strAliasPrefix . 'fecha_creacion');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_despacho', $strAliasPrefix . 'fecha_despacho');
			    $objBuilder->AddSelectItem($strTableName, 'vuelo', $strAliasPrefix . 'vuelo');
			    $objBuilder->AddSelectItem($strTableName, 'booking', $strAliasPrefix . 'booking');
			    $objBuilder->AddSelectItem($strTableName, 'piezas', $strAliasPrefix . 'piezas');
			    $objBuilder->AddSelectItem($strTableName, 'valijas', $strAliasPrefix . 'valijas');
			    $objBuilder->AddSelectItem($strTableName, 'libras', $strAliasPrefix . 'libras');
			    $objBuilder->AddSelectItem($strTableName, 'volumen', $strAliasPrefix . 'volumen');
			    $objBuilder->AddSelectItem($strTableName, 'kilos', $strAliasPrefix . 'kilos');
			    $objBuilder->AddSelectItem($strTableName, 'pies_cub', $strAliasPrefix . 'pies_cub');
			    $objBuilder->AddSelectItem($strTableName, 'valor', $strAliasPrefix . 'valor');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
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
		 * Instantiate a ManifiestoExp from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ManifiestoExp::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ManifiestoExp, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ManifiestoExp::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ManifiestoExp object
			$objToReturn = new ManifiestoExp();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumero = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'origen_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOrigenId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'transporte';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTransporte = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'master';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMaster = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'destino_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDestinoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'linea_aerea_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intLineaAereaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nro_bl';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNroBl = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_creacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaCreacion = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_despacho';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaDespacho = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'vuelo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strVuelo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'booking';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strBooking = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'valijas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intValijas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'libras';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLibras = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltKilos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'pies_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPiesCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValor = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'manifiesto_exp__';

			// Check for Origen Early Binding
			$strAlias = $strAliasPrefix . 'origen_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['origen_id']) ? null : $objExpansionAliasArray['origen_id']);
				$objToReturn->objOrigen = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origen_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Destino Early Binding
			$strAlias = $strAliasPrefix . 'destino_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['destino_id']) ? null : $objExpansionAliasArray['destino_id']);
				$objToReturn->objDestino = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destino_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for LineaAerea Early Binding
			$strAlias = $strAliasPrefix . 'linea_aerea_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['linea_aerea_id']) ? null : $objExpansionAliasArray['linea_aerea_id']);
				$objToReturn->objLineaAerea = LineaAerea::InstantiateDbRow($objDbRow, $strAliasPrefix . 'linea_aerea_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				
			// Check for Bag Virtual Binding
			$strAlias = $strAliasPrefix . 'bag__bag_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['bag']) ? null : $objExpansionAliasArray['bag']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objBagArray) {
				$objToReturn->_objBagArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objBagArray[] = Bag::InstantiateDbRow($objDbRow, $strAliasPrefix . 'bag__bag_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objBag)) {
					$objToReturn->_objBag = Bag::InstantiateDbRow($objDbRow, $strAliasPrefix . 'bag__bag_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaPiezasAsPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'guiapiezasaspieza__guia_pieza_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiapiezasaspieza']) ? null : $objExpansionAliasArray['guiapiezasaspieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaPiezasAsPiezaArray) {
				$objToReturn->_objGuiaPiezasAsPiezaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaPiezasAsPiezaArray[] = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasaspieza__guia_pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaPiezasAsPieza)) {
					$objToReturn->_objGuiaPiezasAsPieza = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasaspieza__guia_pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ManifiestoExps from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ManifiestoExp[]
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
					$objItem = ManifiestoExp::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ManifiestoExp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ManifiestoExp object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ManifiestoExp next row resulting from the query
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
			return ManifiestoExp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ManifiestoExp object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ManifiestoExp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ManifiestoExp()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ManifiestoExp objects,
		 * by DestinoId Index(es)
		 * @param integer $intDestinoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public static function LoadArrayByDestinoId($intDestinoId, $objOptionalClauses = null) {
			// Call ManifiestoExp::QueryArray to perform the LoadArrayByDestinoId query
			try {
				return ManifiestoExp::QueryArray(
					QQ::Equal(QQN::ManifiestoExp()->DestinoId, $intDestinoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ManifiestoExps
		 * by DestinoId Index(es)
		 * @param integer $intDestinoId
		 * @return int
		*/
		public static function CountByDestinoId($intDestinoId) {
			// Call ManifiestoExp::QueryCount to perform the CountByDestinoId query
			return ManifiestoExp::QueryCount(
				QQ::Equal(QQN::ManifiestoExp()->DestinoId, $intDestinoId)
			);
		}

		/**
		 * Load an array of ManifiestoExp objects,
		 * by LineaAereaId Index(es)
		 * @param integer $intLineaAereaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public static function LoadArrayByLineaAereaId($intLineaAereaId, $objOptionalClauses = null) {
			// Call ManifiestoExp::QueryArray to perform the LoadArrayByLineaAereaId query
			try {
				return ManifiestoExp::QueryArray(
					QQ::Equal(QQN::ManifiestoExp()->LineaAereaId, $intLineaAereaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ManifiestoExps
		 * by LineaAereaId Index(es)
		 * @param integer $intLineaAereaId
		 * @return int
		*/
		public static function CountByLineaAereaId($intLineaAereaId) {
			// Call ManifiestoExp::QueryCount to perform the CountByLineaAereaId query
			return ManifiestoExp::QueryCount(
				QQ::Equal(QQN::ManifiestoExp()->LineaAereaId, $intLineaAereaId)
			);
		}

		/**
		 * Load an array of ManifiestoExp objects,
		 * by OrigenId Index(es)
		 * @param integer $intOrigenId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public static function LoadArrayByOrigenId($intOrigenId, $objOptionalClauses = null) {
			// Call ManifiestoExp::QueryArray to perform the LoadArrayByOrigenId query
			try {
				return ManifiestoExp::QueryArray(
					QQ::Equal(QQN::ManifiestoExp()->OrigenId, $intOrigenId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ManifiestoExps
		 * by OrigenId Index(es)
		 * @param integer $intOrigenId
		 * @return int
		*/
		public static function CountByOrigenId($intOrigenId) {
			// Call ManifiestoExp::QueryCount to perform the CountByOrigenId query
			return ManifiestoExp::QueryCount(
				QQ::Equal(QQN::ManifiestoExp()->OrigenId, $intOrigenId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Bag objects for a given Bag
		 * via the manifiesto_exp_bag_assn table
		 * @param integer $intBagId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public static function LoadArrayByBag($intBagId, $objOptionalClauses = null, $objClauses = null) {
			// Call ManifiestoExp::QueryArray to perform the LoadArrayByBag query
			try {
				return ManifiestoExp::QueryArray(
					QQ::Equal(QQN::ManifiestoExp()->Bag->BagId, $intBagId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ManifiestoExps for a given Bag
		 * via the manifiesto_exp_bag_assn table
		 * @param integer $intBagId
		 * @return int
		*/
		public static function CountByBag($intBagId) {
			return ManifiestoExp::QueryCount(
				QQ::Equal(QQN::ManifiestoExp()->Bag->BagId, $intBagId)
			);
		}
			/**
		 * Load an array of GuiaPiezas objects for a given GuiaPiezasAsPieza
		 * via the manifiesto_exp_pieza_assn table
		 * @param integer $intGuiaPiezaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public static function LoadArrayByGuiaPiezasAsPieza($intGuiaPiezaId, $objOptionalClauses = null, $objClauses = null) {
			// Call ManifiestoExp::QueryArray to perform the LoadArrayByGuiaPiezasAsPieza query
			try {
				return ManifiestoExp::QueryArray(
					QQ::Equal(QQN::ManifiestoExp()->GuiaPiezasAsPieza->GuiaPiezaId, $intGuiaPiezaId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ManifiestoExps for a given GuiaPiezasAsPieza
		 * via the manifiesto_exp_pieza_assn table
		 * @param integer $intGuiaPiezaId
		 * @return int
		*/
		public static function CountByGuiaPiezasAsPieza($intGuiaPiezaId) {
			return ManifiestoExp::QueryCount(
				QQ::Equal(QQN::ManifiestoExp()->GuiaPiezasAsPieza->GuiaPiezaId, $intGuiaPiezaId)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ManifiestoExp
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `manifiesto_exp` (
							`numero`,
							`origen_id`,
							`transporte`,
							`master`,
							`destino_id`,
							`linea_aerea_id`,
							`nro_bl`,
							`fecha_creacion`,
							`fecha_despacho`,
							`vuelo`,
							`booking`,
							`piezas`,
							`valijas`,
							`libras`,
							`volumen`,
							`kilos`,
							`pies_cub`,
							`valor`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumero) . ',
							' . $objDatabase->SqlVariable($this->intOrigenId) . ',
							' . $objDatabase->SqlVariable($this->strTransporte) . ',
							' . $objDatabase->SqlVariable($this->strMaster) . ',
							' . $objDatabase->SqlVariable($this->intDestinoId) . ',
							' . $objDatabase->SqlVariable($this->intLineaAereaId) . ',
							' . $objDatabase->SqlVariable($this->strNroBl) . ',
							' . $objDatabase->SqlVariable($this->dttFechaCreacion) . ',
							' . $objDatabase->SqlVariable($this->dttFechaDespacho) . ',
							' . $objDatabase->SqlVariable($this->strVuelo) . ',
							' . $objDatabase->SqlVariable($this->strBooking) . ',
							' . $objDatabase->SqlVariable($this->intPiezas) . ',
							' . $objDatabase->SqlVariable($this->intValijas) . ',
							' . $objDatabase->SqlVariable($this->fltLibras) . ',
							' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltKilos) . ',
							' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							' . $objDatabase->SqlVariable($this->fltValor) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('manifiesto_exp', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`manifiesto_exp`
						SET
							`numero` = ' . $objDatabase->SqlVariable($this->strNumero) . ',
							`origen_id` = ' . $objDatabase->SqlVariable($this->intOrigenId) . ',
							`transporte` = ' . $objDatabase->SqlVariable($this->strTransporte) . ',
							`master` = ' . $objDatabase->SqlVariable($this->strMaster) . ',
							`destino_id` = ' . $objDatabase->SqlVariable($this->intDestinoId) . ',
							`linea_aerea_id` = ' . $objDatabase->SqlVariable($this->intLineaAereaId) . ',
							`nro_bl` = ' . $objDatabase->SqlVariable($this->strNroBl) . ',
							`fecha_creacion` = ' . $objDatabase->SqlVariable($this->dttFechaCreacion) . ',
							`fecha_despacho` = ' . $objDatabase->SqlVariable($this->dttFechaDespacho) . ',
							`vuelo` = ' . $objDatabase->SqlVariable($this->strVuelo) . ',
							`booking` = ' . $objDatabase->SqlVariable($this->strBooking) . ',
							`piezas` = ' . $objDatabase->SqlVariable($this->intPiezas) . ',
							`valijas` = ' . $objDatabase->SqlVariable($this->intValijas) . ',
							`libras` = ' . $objDatabase->SqlVariable($this->fltLibras) . ',
							`volumen` = ' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							`kilos` = ' . $objDatabase->SqlVariable($this->fltKilos) . ',
							`pies_cub` = ' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							`valor` = ' . $objDatabase->SqlVariable($this->fltValor) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
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
		 * Delete this ManifiestoExp
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ManifiestoExp with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ManifiestoExp ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ManifiestoExp', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ManifiestoExps
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate manifiesto_exp table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `manifiesto_exp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ManifiestoExp from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ManifiestoExp object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ManifiestoExp::Load($this->intId);

			// Update $this's local variables to match
			$this->strNumero = $objReloaded->strNumero;
			$this->OrigenId = $objReloaded->OrigenId;
			$this->strTransporte = $objReloaded->strTransporte;
			$this->strMaster = $objReloaded->strMaster;
			$this->DestinoId = $objReloaded->DestinoId;
			$this->LineaAereaId = $objReloaded->LineaAereaId;
			$this->strNroBl = $objReloaded->strNroBl;
			$this->dttFechaCreacion = $objReloaded->dttFechaCreacion;
			$this->dttFechaDespacho = $objReloaded->dttFechaDespacho;
			$this->strVuelo = $objReloaded->strVuelo;
			$this->strBooking = $objReloaded->strBooking;
			$this->intPiezas = $objReloaded->intPiezas;
			$this->intValijas = $objReloaded->intValijas;
			$this->fltLibras = $objReloaded->fltLibras;
			$this->fltVolumen = $objReloaded->fltVolumen;
			$this->fltKilos = $objReloaded->fltKilos;
			$this->fltPiesCub = $objReloaded->fltPiesCub;
			$this->fltValor = $objReloaded->fltValor;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
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

				case 'Numero':
					/**
					 * Gets the value for strNumero (Not Null)
					 * @return string
					 */
					return $this->strNumero;

				case 'OrigenId':
					/**
					 * Gets the value for intOrigenId (Not Null)
					 * @return integer
					 */
					return $this->intOrigenId;

				case 'Transporte':
					/**
					 * Gets the value for strTransporte 
					 * @return string
					 */
					return $this->strTransporte;

				case 'Master':
					/**
					 * Gets the value for strMaster 
					 * @return string
					 */
					return $this->strMaster;

				case 'DestinoId':
					/**
					 * Gets the value for intDestinoId (Not Null)
					 * @return integer
					 */
					return $this->intDestinoId;

				case 'LineaAereaId':
					/**
					 * Gets the value for intLineaAereaId 
					 * @return integer
					 */
					return $this->intLineaAereaId;

				case 'NroBl':
					/**
					 * Gets the value for strNroBl 
					 * @return string
					 */
					return $this->strNroBl;

				case 'FechaCreacion':
					/**
					 * Gets the value for dttFechaCreacion (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaCreacion;

				case 'FechaDespacho':
					/**
					 * Gets the value for dttFechaDespacho (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaDespacho;

				case 'Vuelo':
					/**
					 * Gets the value for strVuelo 
					 * @return string
					 */
					return $this->strVuelo;

				case 'Booking':
					/**
					 * Gets the value for strBooking 
					 * @return string
					 */
					return $this->strBooking;

				case 'Piezas':
					/**
					 * Gets the value for intPiezas (Not Null)
					 * @return integer
					 */
					return $this->intPiezas;

				case 'Valijas':
					/**
					 * Gets the value for intValijas (Not Null)
					 * @return integer
					 */
					return $this->intValijas;

				case 'Libras':
					/**
					 * Gets the value for fltLibras (Not Null)
					 * @return double
					 */
					return $this->fltLibras;

				case 'Volumen':
					/**
					 * Gets the value for fltVolumen (Not Null)
					 * @return double
					 */
					return $this->fltVolumen;

				case 'Kilos':
					/**
					 * Gets the value for fltKilos 
					 * @return double
					 */
					return $this->fltKilos;

				case 'PiesCub':
					/**
					 * Gets the value for fltPiesCub 
					 * @return double
					 */
					return $this->fltPiesCub;

				case 'Valor':
					/**
					 * Gets the value for fltValor (Not Null)
					 * @return double
					 */
					return $this->fltValor;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt 
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt 
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy 
					 * @return integer
					 */
					return $this->intCreatedBy;

				case 'UpdatedBy':
					/**
					 * Gets the value for intUpdatedBy 
					 * @return integer
					 */
					return $this->intUpdatedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'Origen':
					/**
					 * Gets the value for the Sucursales object referenced by intOrigenId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objOrigen) && (!is_null($this->intOrigenId)))
							$this->objOrigen = Sucursales::Load($this->intOrigenId);
						return $this->objOrigen;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Destino':
					/**
					 * Gets the value for the Sucursales object referenced by intDestinoId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objDestino) && (!is_null($this->intDestinoId)))
							$this->objDestino = Sucursales::Load($this->intDestinoId);
						return $this->objDestino;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LineaAerea':
					/**
					 * Gets the value for the LineaAerea object referenced by intLineaAereaId 
					 * @return LineaAerea
					 */
					try {
						if ((!$this->objLineaAerea) && (!is_null($this->intLineaAereaId)))
							$this->objLineaAerea = LineaAerea::Load($this->intLineaAereaId);
						return $this->objLineaAerea;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Bag':
					/**
					 * Gets the value for the private _objBag (Read-Only)
					 * if set due to an expansion on the manifiesto_exp_bag_assn association table
					 * @return Bag
					 */
					return $this->_objBag;

				case '_BagArray':
					/**
					 * Gets the value for the private _objBagArray (Read-Only)
					 * if set due to an ExpandAsArray on the manifiesto_exp_bag_assn association table
					 * @return Bag[]
					 */
					return $this->_objBagArray;

				case '_GuiaPiezasAsPieza':
					/**
					 * Gets the value for the private _objGuiaPiezasAsPieza (Read-Only)
					 * if set due to an expansion on the manifiesto_exp_pieza_assn association table
					 * @return GuiaPiezas
					 */
					return $this->_objGuiaPiezasAsPieza;

				case '_GuiaPiezasAsPiezaArray':
					/**
					 * Gets the value for the private _objGuiaPiezasAsPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the manifiesto_exp_pieza_assn association table
					 * @return GuiaPiezas[]
					 */
					return $this->_objGuiaPiezasAsPiezaArray;


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
				case 'Numero':
					/**
					 * Sets the value for strNumero (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumero = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrigenId':
					/**
					 * Sets the value for intOrigenId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objOrigen = null;
						return ($this->intOrigenId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Transporte':
					/**
					 * Sets the value for strTransporte 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTransporte = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Master':
					/**
					 * Sets the value for strMaster 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMaster = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinoId':
					/**
					 * Sets the value for intDestinoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objDestino = null;
						return ($this->intDestinoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LineaAereaId':
					/**
					 * Sets the value for intLineaAereaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objLineaAerea = null;
						return ($this->intLineaAereaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NroBl':
					/**
					 * Sets the value for strNroBl 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNroBl = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaCreacion':
					/**
					 * Sets the value for dttFechaCreacion (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaCreacion = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDespacho':
					/**
					 * Sets the value for dttFechaDespacho (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaDespacho = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Vuelo':
					/**
					 * Sets the value for strVuelo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strVuelo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Booking':
					/**
					 * Sets the value for strBooking 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strBooking = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Piezas':
					/**
					 * Sets the value for intPiezas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPiezas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valijas':
					/**
					 * Sets the value for intValijas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intValijas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Libras':
					/**
					 * Sets the value for fltLibras (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLibras = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Volumen':
					/**
					 * Sets the value for fltVolumen (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Kilos':
					/**
					 * Sets the value for fltKilos 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltKilos = QType::Cast($mixValue, QType::Float));
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

				case 'Valor':
					/**
					 * Sets the value for fltValor (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValor = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedAt':
					/**
					 * Sets the value for dttCreatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedAt':
					/**
					 * Sets the value for dttUpdatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttUpdatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					/**
					 * Sets the value for intCreatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedBy':
					/**
					 * Sets the value for intUpdatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intUpdatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Origen':
					/**
					 * Sets the value for the Sucursales object referenced by intOrigenId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intOrigenId = null;
						$this->objOrigen = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Sucursales object
						try {
							$mixValue = QType::Cast($mixValue, 'Sucursales');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Sucursales object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Origen for this ManifiestoExp');

						// Update Local Member Variables
						$this->objOrigen = $mixValue;
						$this->intOrigenId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Destino':
					/**
					 * Sets the value for the Sucursales object referenced by intDestinoId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intDestinoId = null;
						$this->objDestino = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Sucursales object
						try {
							$mixValue = QType::Cast($mixValue, 'Sucursales');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Sucursales object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Destino for this ManifiestoExp');

						// Update Local Member Variables
						$this->objDestino = $mixValue;
						$this->intDestinoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'LineaAerea':
					/**
					 * Sets the value for the LineaAerea object referenced by intLineaAereaId 
					 * @param LineaAerea $mixValue
					 * @return LineaAerea
					 */
					if (is_null($mixValue)) {
						$this->intLineaAereaId = null;
						$this->objLineaAerea = null;
						return null;
					} else {
						// Make sure $mixValue actually is a LineaAerea object
						try {
							$mixValue = QType::Cast($mixValue, 'LineaAerea');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED LineaAerea object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved LineaAerea for this ManifiestoExp');

						// Update Local Member Variables
						$this->objLineaAerea = $mixValue;
						$this->intLineaAereaId = $mixValue->Id;

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



		// Related Many-to-Many Objects' Methods for Bag
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Bags as an array of Bag objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag[]
		*/
		public function GetBagArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Bag::LoadArrayByManifiestoExp($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Bags
		 * @return int
		*/
		public function CountBags() {
			if ((is_null($this->intId)))
				return 0;

			return Bag::CountByManifiestoExp($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Bag
		 * @param Bag $objBag
		 * @return bool
		*/
		public function IsBagAssociated(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsBagAssociated on this unsaved ManifiestoExp.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsBagAssociated on this ManifiestoExp with an unsaved Bag.');

			$intRowCount = ManifiestoExp::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ManifiestoExp()->Id, $this->intId),
					QQ::Equal(QQN::ManifiestoExp()->Bag->BagId, $objBag->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a Bag
		 * @param Bag $objBag
		 * @return void
		*/
		public function AssociateBag(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBag on this unsaved ManifiestoExp.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBag on this ManifiestoExp with an unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `manifiesto_exp_bag_assn` (
					`manifiesto_exp_id`,
					`bag_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objBag->Id) . '
				)
			');
		}

		/**
		 * Unassociates a Bag
		 * @param Bag $objBag
		 * @return void
		*/
		public function UnassociateBag(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBag on this unsaved ManifiestoExp.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBag on this ManifiestoExp with an unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_bag_assn`
				WHERE
					`manifiesto_exp_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`bag_id` = ' . $objDatabase->SqlVariable($objBag->Id) . '
			');
		}

		/**
		 * Unassociates all Bags
		 * @return void
		*/
		public function UnassociateAllBags() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllBagArray on this unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_bag_assn`
				WHERE
					`manifiesto_exp_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		// Related Many-to-Many Objects' Methods for GuiaPiezasAsPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GuiaPiezasesAsPieza as an array of GuiaPiezas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public function GetGuiaPiezasAsPiezaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaPiezas::LoadArrayByManifiestoExpAsPieza($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GuiaPiezasesAsPieza
		 * @return int
		*/
		public function CountGuiaPiezasesAsPieza() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaPiezas::CountByManifiestoExpAsPieza($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific GuiaPiezasAsPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return bool
		*/
		public function IsGuiaPiezasAsPiezaAssociated(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGuiaPiezasAsPiezaAssociated on this unsaved ManifiestoExp.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGuiaPiezasAsPiezaAssociated on this ManifiestoExp with an unsaved GuiaPiezas.');

			$intRowCount = ManifiestoExp::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ManifiestoExp()->Id, $this->intId),
					QQ::Equal(QQN::ManifiestoExp()->GuiaPiezasAsPieza->GuiaPiezaId, $objGuiaPiezas->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a GuiaPiezasAsPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function AssociateGuiaPiezasAsPieza(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsPieza on this unsaved ManifiestoExp.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsPieza on this ManifiestoExp with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `manifiesto_exp_pieza_assn` (
					`manifiesto_exp_id`,
					`guia_pieza_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
				)
			');
		}

		/**
		 * Unassociates a GuiaPiezasAsPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function UnassociateGuiaPiezasAsPieza(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsPieza on this unsaved ManifiestoExp.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsPieza on this ManifiestoExp with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_pieza_assn`
				WHERE
					`manifiesto_exp_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
			');
		}

		/**
		 * Unassociates all GuiaPiezasesAsPieza
		 * @return void
		*/
		public function UnassociateAllGuiaPiezasesAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGuiaPiezasAsPiezaArray on this unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = ManifiestoExp::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_pieza_assn`
				WHERE
					`manifiesto_exp_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "manifiesto_exp";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ManifiestoExp::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ManifiestoExp"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Numero" type="xsd:string"/>';
			$strToReturn .= '<element name="Origen" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="Transporte" type="xsd:string"/>';
			$strToReturn .= '<element name="Master" type="xsd:string"/>';
			$strToReturn .= '<element name="Destino" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="LineaAerea" type="xsd1:LineaAerea"/>';
			$strToReturn .= '<element name="NroBl" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaCreacion" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaDespacho" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Vuelo" type="xsd:string"/>';
			$strToReturn .= '<element name="Booking" type="xsd:string"/>';
			$strToReturn .= '<element name="Piezas" type="xsd:int"/>';
			$strToReturn .= '<element name="Valijas" type="xsd:int"/>';
			$strToReturn .= '<element name="Libras" type="xsd:float"/>';
			$strToReturn .= '<element name="Volumen" type="xsd:float"/>';
			$strToReturn .= '<element name="Kilos" type="xsd:float"/>';
			$strToReturn .= '<element name="PiesCub" type="xsd:float"/>';
			$strToReturn .= '<element name="Valor" type="xsd:float"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ManifiestoExp', $strComplexTypeArray)) {
				$strComplexTypeArray['ManifiestoExp'] = ManifiestoExp::GetSoapComplexTypeXml();
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				LineaAerea::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ManifiestoExp::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ManifiestoExp();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->strNumero = $objSoapObject->Numero;
			if ((property_exists($objSoapObject, 'Origen')) &&
				($objSoapObject->Origen))
				$objToReturn->Origen = Sucursales::GetObjectFromSoapObject($objSoapObject->Origen);
			if (property_exists($objSoapObject, 'Transporte'))
				$objToReturn->strTransporte = $objSoapObject->Transporte;
			if (property_exists($objSoapObject, 'Master'))
				$objToReturn->strMaster = $objSoapObject->Master;
			if ((property_exists($objSoapObject, 'Destino')) &&
				($objSoapObject->Destino))
				$objToReturn->Destino = Sucursales::GetObjectFromSoapObject($objSoapObject->Destino);
			if ((property_exists($objSoapObject, 'LineaAerea')) &&
				($objSoapObject->LineaAerea))
				$objToReturn->LineaAerea = LineaAerea::GetObjectFromSoapObject($objSoapObject->LineaAerea);
			if (property_exists($objSoapObject, 'NroBl'))
				$objToReturn->strNroBl = $objSoapObject->NroBl;
			if (property_exists($objSoapObject, 'FechaCreacion'))
				$objToReturn->dttFechaCreacion = new QDateTime($objSoapObject->FechaCreacion);
			if (property_exists($objSoapObject, 'FechaDespacho'))
				$objToReturn->dttFechaDespacho = new QDateTime($objSoapObject->FechaDespacho);
			if (property_exists($objSoapObject, 'Vuelo'))
				$objToReturn->strVuelo = $objSoapObject->Vuelo;
			if (property_exists($objSoapObject, 'Booking'))
				$objToReturn->strBooking = $objSoapObject->Booking;
			if (property_exists($objSoapObject, 'Piezas'))
				$objToReturn->intPiezas = $objSoapObject->Piezas;
			if (property_exists($objSoapObject, 'Valijas'))
				$objToReturn->intValijas = $objSoapObject->Valijas;
			if (property_exists($objSoapObject, 'Libras'))
				$objToReturn->fltLibras = $objSoapObject->Libras;
			if (property_exists($objSoapObject, 'Volumen'))
				$objToReturn->fltVolumen = $objSoapObject->Volumen;
			if (property_exists($objSoapObject, 'Kilos'))
				$objToReturn->fltKilos = $objSoapObject->Kilos;
			if (property_exists($objSoapObject, 'PiesCub'))
				$objToReturn->fltPiesCub = $objSoapObject->PiesCub;
			if (property_exists($objSoapObject, 'Valor'))
				$objToReturn->fltValor = $objSoapObject->Valor;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ManifiestoExp::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objOrigen)
				$objObject->objOrigen = Sucursales::GetSoapObjectFromObject($objObject->objOrigen, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intOrigenId = null;
			if ($objObject->objDestino)
				$objObject->objDestino = Sucursales::GetSoapObjectFromObject($objObject->objDestino, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDestinoId = null;
			if ($objObject->objLineaAerea)
				$objObject->objLineaAerea = LineaAerea::GetSoapObjectFromObject($objObject->objLineaAerea, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLineaAereaId = null;
			if ($objObject->dttFechaCreacion)
				$objObject->dttFechaCreacion = $objObject->dttFechaCreacion->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaDespacho)
				$objObject->dttFechaDespacho = $objObject->dttFechaDespacho->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['Numero'] = $this->strNumero;
			$iArray['OrigenId'] = $this->intOrigenId;
			$iArray['Transporte'] = $this->strTransporte;
			$iArray['Master'] = $this->strMaster;
			$iArray['DestinoId'] = $this->intDestinoId;
			$iArray['LineaAereaId'] = $this->intLineaAereaId;
			$iArray['NroBl'] = $this->strNroBl;
			$iArray['FechaCreacion'] = $this->dttFechaCreacion;
			$iArray['FechaDespacho'] = $this->dttFechaDespacho;
			$iArray['Vuelo'] = $this->strVuelo;
			$iArray['Booking'] = $this->strBooking;
			$iArray['Piezas'] = $this->intPiezas;
			$iArray['Valijas'] = $this->intValijas;
			$iArray['Libras'] = $this->fltLibras;
			$iArray['Volumen'] = $this->fltVolumen;
			$iArray['Kilos'] = $this->fltKilos;
			$iArray['PiesCub'] = $this->fltPiesCub;
			$iArray['Valor'] = $this->fltValor;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $BagId
     * @property-read QQNodeBag $Bag
     * @property-read QQNodeBag $_ChildTableNode
     **/
	class QQNodeManifiestoExpBag extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'bag';

		protected $strTableName = 'manifiesto_exp_bag_assn';
		protected $strPrimaryKey = 'manifiesto_exp_id';
		protected $strClassName = 'Bag';
		protected $strPropertyName = 'Bag';
		protected $strAlias = 'bag';

		public function __get($strName) {
			switch ($strName) {
				case 'BagId':
					return new QQNode('bag_id', 'BagId', 'integer', $this);
				case 'Bag':
					return new QQNodeBag('bag_id', 'BagId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeBag('bag_id', 'BagId', 'integer', $this);
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $GuiaPiezaId
     * @property-read QQNodeGuiaPiezas $GuiaPiezas
     * @property-read QQNodeGuiaPiezas $_ChildTableNode
     **/
	class QQNodeManifiestoExpGuiaPiezasAsPieza extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'guiapiezasaspieza';

		protected $strTableName = 'manifiesto_exp_pieza_assn';
		protected $strPrimaryKey = 'manifiesto_exp_id';
		protected $strClassName = 'GuiaPiezas';
		protected $strPropertyName = 'GuiaPiezasAsPieza';
		protected $strAlias = 'guiapiezasaspieza';

		public function __get($strName) {
			switch ($strName) {
				case 'GuiaPiezaId':
					return new QQNode('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
				case 'GuiaPiezas':
					return new QQNodeGuiaPiezas('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGuiaPiezas('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
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
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $Numero
     * @property-read QQNode $OrigenId
     * @property-read QQNodeSucursales $Origen
     * @property-read QQNode $Transporte
     * @property-read QQNode $Master
     * @property-read QQNode $DestinoId
     * @property-read QQNodeSucursales $Destino
     * @property-read QQNode $LineaAereaId
     * @property-read QQNodeLineaAerea $LineaAerea
     * @property-read QQNode $NroBl
     * @property-read QQNode $FechaCreacion
     * @property-read QQNode $FechaDespacho
     * @property-read QQNode $Vuelo
     * @property-read QQNode $Booking
     * @property-read QQNode $Piezas
     * @property-read QQNode $Valijas
     * @property-read QQNode $Libras
     * @property-read QQNode $Volumen
     * @property-read QQNode $Kilos
     * @property-read QQNode $PiesCub
     * @property-read QQNode $Valor
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     * @property-read QQNodeManifiestoExpBag $Bag
     * @property-read QQNodeManifiestoExpGuiaPiezasAsPieza $GuiaPiezasAsPieza
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeManifiestoExp extends QQNode {
		protected $strTableName = 'manifiesto_exp';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ManifiestoExp';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'VarChar', $this);
				case 'OrigenId':
					return new QQNode('origen_id', 'OrigenId', 'Integer', $this);
				case 'Origen':
					return new QQNodeSucursales('origen_id', 'Origen', 'Integer', $this);
				case 'Transporte':
					return new QQNode('transporte', 'Transporte', 'VarChar', $this);
				case 'Master':
					return new QQNode('master', 'Master', 'VarChar', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'Integer', $this);
				case 'Destino':
					return new QQNodeSucursales('destino_id', 'Destino', 'Integer', $this);
				case 'LineaAereaId':
					return new QQNode('linea_aerea_id', 'LineaAereaId', 'Integer', $this);
				case 'LineaAerea':
					return new QQNodeLineaAerea('linea_aerea_id', 'LineaAerea', 'Integer', $this);
				case 'NroBl':
					return new QQNode('nro_bl', 'NroBl', 'VarChar', $this);
				case 'FechaCreacion':
					return new QQNode('fecha_creacion', 'FechaCreacion', 'Date', $this);
				case 'FechaDespacho':
					return new QQNode('fecha_despacho', 'FechaDespacho', 'Date', $this);
				case 'Vuelo':
					return new QQNode('vuelo', 'Vuelo', 'VarChar', $this);
				case 'Booking':
					return new QQNode('booking', 'Booking', 'VarChar', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'Integer', $this);
				case 'Valijas':
					return new QQNode('valijas', 'Valijas', 'Integer', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'Float', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'Float', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'Float', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'Float', $this);
				case 'Valor':
					return new QQNode('valor', 'Valor', 'Float', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'Bag':
					return new QQNodeManifiestoExpBag($this);
				case 'GuiaPiezasAsPieza':
					return new QQNodeManifiestoExpGuiaPiezasAsPieza($this);

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
     * @property-read QQNode $Numero
     * @property-read QQNode $OrigenId
     * @property-read QQNodeSucursales $Origen
     * @property-read QQNode $Transporte
     * @property-read QQNode $Master
     * @property-read QQNode $DestinoId
     * @property-read QQNodeSucursales $Destino
     * @property-read QQNode $LineaAereaId
     * @property-read QQNodeLineaAerea $LineaAerea
     * @property-read QQNode $NroBl
     * @property-read QQNode $FechaCreacion
     * @property-read QQNode $FechaDespacho
     * @property-read QQNode $Vuelo
     * @property-read QQNode $Booking
     * @property-read QQNode $Piezas
     * @property-read QQNode $Valijas
     * @property-read QQNode $Libras
     * @property-read QQNode $Volumen
     * @property-read QQNode $Kilos
     * @property-read QQNode $PiesCub
     * @property-read QQNode $Valor
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     * @property-read QQNodeManifiestoExpBag $Bag
     * @property-read QQNodeManifiestoExpGuiaPiezasAsPieza $GuiaPiezasAsPieza
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeManifiestoExp extends QQReverseReferenceNode {
		protected $strTableName = 'manifiesto_exp';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ManifiestoExp';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'string', $this);
				case 'OrigenId':
					return new QQNode('origen_id', 'OrigenId', 'integer', $this);
				case 'Origen':
					return new QQNodeSucursales('origen_id', 'Origen', 'integer', $this);
				case 'Transporte':
					return new QQNode('transporte', 'Transporte', 'string', $this);
				case 'Master':
					return new QQNode('master', 'Master', 'string', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'integer', $this);
				case 'Destino':
					return new QQNodeSucursales('destino_id', 'Destino', 'integer', $this);
				case 'LineaAereaId':
					return new QQNode('linea_aerea_id', 'LineaAereaId', 'integer', $this);
				case 'LineaAerea':
					return new QQNodeLineaAerea('linea_aerea_id', 'LineaAerea', 'integer', $this);
				case 'NroBl':
					return new QQNode('nro_bl', 'NroBl', 'string', $this);
				case 'FechaCreacion':
					return new QQNode('fecha_creacion', 'FechaCreacion', 'QDateTime', $this);
				case 'FechaDespacho':
					return new QQNode('fecha_despacho', 'FechaDespacho', 'QDateTime', $this);
				case 'Vuelo':
					return new QQNode('vuelo', 'Vuelo', 'string', $this);
				case 'Booking':
					return new QQNode('booking', 'Booking', 'string', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'integer', $this);
				case 'Valijas':
					return new QQNode('valijas', 'Valijas', 'integer', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'double', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'double', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'double', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'double', $this);
				case 'Valor':
					return new QQNode('valor', 'Valor', 'double', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'Bag':
					return new QQNodeManifiestoExpBag($this);
				case 'GuiaPiezasAsPieza':
					return new QQNodeManifiestoExpGuiaPiezasAsPieza($this);

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
