<?php
	/**
	 * The abstract EstadisticaDeGuiasGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the EstadisticaDeGuias subclass which
	 * extends this EstadisticaDeGuiasGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EstadisticaDeGuias class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $GuiaId the value for intGuiaId (PK)
	 * @property QDateTime $FechaGuia the value for dttFechaGuia (Not Null)
	 * @property QDateTime $FechaPickup the value for dttFechaPickup 
	 * @property integer $DiasPickup the value for intDiasPickup 
	 * @property QDateTime $FechaTraslado the value for dttFechaTraslado 
	 * @property integer $DiasTraslado the value for intDiasTraslado 
	 * @property integer $AcumuladoTraslado the value for intAcumuladoTraslado 
	 * @property QDateTime $FechaArribo the value for dttFechaArribo 
	 * @property integer $DiasArribo the value for intDiasArribo 
	 * @property integer $AcumuladoArribo the value for intAcumuladoArribo 
	 * @property QDateTime $FechaRuta the value for dttFechaRuta 
	 * @property integer $DiasRuta the value for intDiasRuta 
	 * @property integer $AcumuladoRuta the value for intAcumuladoRuta 
	 * @property QDateTime $FechaEntrega the value for dttFechaEntrega 
	 * @property integer $DiasEntrega the value for intDiasEntrega 
	 * @property integer $AcumuladoEntrega the value for intAcumuladoEntrega 
	 * @property integer $AcumuladoSinEntrega the value for intAcumuladoSinEntrega 
	 * @property integer $DiasSinActualizar the value for intDiasSinActualizar 
	 * @property Guias $Guia the value for the Guias object referenced by intGuiaId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EstadisticaDeGuiasGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column estadistica_de_guias.guia_id
		 * @var integer intGuiaId
		 */
		protected $intGuiaId;
		const GuiaIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intGuiaId;
		 */
		protected $__intGuiaId;

		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.fecha_guia
		 * @var QDateTime dttFechaGuia
		 */
		protected $dttFechaGuia;
		const FechaGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.fecha_pickup
		 * @var QDateTime dttFechaPickup
		 */
		protected $dttFechaPickup;
		const FechaPickupDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.dias_pickup
		 * @var integer intDiasPickup
		 */
		protected $intDiasPickup;
		const DiasPickupDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.fecha_traslado
		 * @var QDateTime dttFechaTraslado
		 */
		protected $dttFechaTraslado;
		const FechaTrasladoDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.dias_traslado
		 * @var integer intDiasTraslado
		 */
		protected $intDiasTraslado;
		const DiasTrasladoDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.acumulado_traslado
		 * @var integer intAcumuladoTraslado
		 */
		protected $intAcumuladoTraslado;
		const AcumuladoTrasladoDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.fecha_arribo
		 * @var QDateTime dttFechaArribo
		 */
		protected $dttFechaArribo;
		const FechaArriboDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.dias_arribo
		 * @var integer intDiasArribo
		 */
		protected $intDiasArribo;
		const DiasArriboDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.acumulado_arribo
		 * @var integer intAcumuladoArribo
		 */
		protected $intAcumuladoArribo;
		const AcumuladoArriboDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.fecha_ruta
		 * @var QDateTime dttFechaRuta
		 */
		protected $dttFechaRuta;
		const FechaRutaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.dias_ruta
		 * @var integer intDiasRuta
		 */
		protected $intDiasRuta;
		const DiasRutaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.acumulado_ruta
		 * @var integer intAcumuladoRuta
		 */
		protected $intAcumuladoRuta;
		const AcumuladoRutaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.fecha_entrega
		 * @var QDateTime dttFechaEntrega
		 */
		protected $dttFechaEntrega;
		const FechaEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.dias_entrega
		 * @var integer intDiasEntrega
		 */
		protected $intDiasEntrega;
		const DiasEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.acumulado_entrega
		 * @var integer intAcumuladoEntrega
		 */
		protected $intAcumuladoEntrega;
		const AcumuladoEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.acumulado_sin_entrega
		 * @var integer intAcumuladoSinEntrega
		 */
		protected $intAcumuladoSinEntrega;
		const AcumuladoSinEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_guias.dias_sin_actualizar
		 * @var integer intDiasSinActualizar
		 */
		protected $intDiasSinActualizar;
		const DiasSinActualizarDefault = null;


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
		 * in the database column estadistica_de_guias.guia_id.
		 *
		 * NOTE: Always use the Guia property getter to correctly retrieve this Guias object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Guias objGuia
		 */
		protected $objGuia;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intGuiaId = EstadisticaDeGuias::GuiaIdDefault;
			$this->dttFechaGuia = (EstadisticaDeGuias::FechaGuiaDefault === null)?null:new QDateTime(EstadisticaDeGuias::FechaGuiaDefault);
			$this->dttFechaPickup = (EstadisticaDeGuias::FechaPickupDefault === null)?null:new QDateTime(EstadisticaDeGuias::FechaPickupDefault);
			$this->intDiasPickup = EstadisticaDeGuias::DiasPickupDefault;
			$this->dttFechaTraslado = (EstadisticaDeGuias::FechaTrasladoDefault === null)?null:new QDateTime(EstadisticaDeGuias::FechaTrasladoDefault);
			$this->intDiasTraslado = EstadisticaDeGuias::DiasTrasladoDefault;
			$this->intAcumuladoTraslado = EstadisticaDeGuias::AcumuladoTrasladoDefault;
			$this->dttFechaArribo = (EstadisticaDeGuias::FechaArriboDefault === null)?null:new QDateTime(EstadisticaDeGuias::FechaArriboDefault);
			$this->intDiasArribo = EstadisticaDeGuias::DiasArriboDefault;
			$this->intAcumuladoArribo = EstadisticaDeGuias::AcumuladoArriboDefault;
			$this->dttFechaRuta = (EstadisticaDeGuias::FechaRutaDefault === null)?null:new QDateTime(EstadisticaDeGuias::FechaRutaDefault);
			$this->intDiasRuta = EstadisticaDeGuias::DiasRutaDefault;
			$this->intAcumuladoRuta = EstadisticaDeGuias::AcumuladoRutaDefault;
			$this->dttFechaEntrega = (EstadisticaDeGuias::FechaEntregaDefault === null)?null:new QDateTime(EstadisticaDeGuias::FechaEntregaDefault);
			$this->intDiasEntrega = EstadisticaDeGuias::DiasEntregaDefault;
			$this->intAcumuladoEntrega = EstadisticaDeGuias::AcumuladoEntregaDefault;
			$this->intAcumuladoSinEntrega = EstadisticaDeGuias::AcumuladoSinEntregaDefault;
			$this->intDiasSinActualizar = EstadisticaDeGuias::DiasSinActualizarDefault;
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
		 * Load a EstadisticaDeGuias from PK Info
		 * @param integer $intGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EstadisticaDeGuias
		 */
		public static function Load($intGuiaId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'EstadisticaDeGuias', $intGuiaId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = EstadisticaDeGuias::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EstadisticaDeGuias()->GuiaId, $intGuiaId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all EstadisticaDeGuiases
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EstadisticaDeGuias[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call EstadisticaDeGuias::QueryArray to perform the LoadAll query
			try {
				return EstadisticaDeGuias::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EstadisticaDeGuiases
		 * @return int
		 */
		public static function CountAll() {
			// Call EstadisticaDeGuias::QueryCount to perform the CountAll query
			return EstadisticaDeGuias::QueryCount(QQ::All());
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
			$objDatabase = EstadisticaDeGuias::GetDatabase();

			// Create/Build out the QueryBuilder object with EstadisticaDeGuias-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'estadistica_de_guias');

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
				EstadisticaDeGuias::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('estadistica_de_guias');

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
		 * Static Qcubed Query method to query for a single EstadisticaDeGuias object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EstadisticaDeGuias the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadisticaDeGuias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new EstadisticaDeGuias object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EstadisticaDeGuias::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intGuiaId][] = $objItem;
		
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
				return EstadisticaDeGuias::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of EstadisticaDeGuias objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EstadisticaDeGuias[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadisticaDeGuias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EstadisticaDeGuias::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = EstadisticaDeGuias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of EstadisticaDeGuias objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadisticaDeGuias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = EstadisticaDeGuias::GetDatabase();

			$strQuery = EstadisticaDeGuias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/estadisticadeguias', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = EstadisticaDeGuias::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EstadisticaDeGuias
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'estadistica_de_guias';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_guia', $strAliasPrefix . 'fecha_guia');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_pickup', $strAliasPrefix . 'fecha_pickup');
			    $objBuilder->AddSelectItem($strTableName, 'dias_pickup', $strAliasPrefix . 'dias_pickup');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_traslado', $strAliasPrefix . 'fecha_traslado');
			    $objBuilder->AddSelectItem($strTableName, 'dias_traslado', $strAliasPrefix . 'dias_traslado');
			    $objBuilder->AddSelectItem($strTableName, 'acumulado_traslado', $strAliasPrefix . 'acumulado_traslado');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_arribo', $strAliasPrefix . 'fecha_arribo');
			    $objBuilder->AddSelectItem($strTableName, 'dias_arribo', $strAliasPrefix . 'dias_arribo');
			    $objBuilder->AddSelectItem($strTableName, 'acumulado_arribo', $strAliasPrefix . 'acumulado_arribo');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_ruta', $strAliasPrefix . 'fecha_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'dias_ruta', $strAliasPrefix . 'dias_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'acumulado_ruta', $strAliasPrefix . 'acumulado_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_entrega', $strAliasPrefix . 'fecha_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'dias_entrega', $strAliasPrefix . 'dias_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'acumulado_entrega', $strAliasPrefix . 'acumulado_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'acumulado_sin_entrega', $strAliasPrefix . 'acumulado_sin_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'dias_sin_actualizar', $strAliasPrefix . 'dias_sin_actualizar');
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
			
			$strAlias = $strAliasPrefix . 'guia_id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intGuiaId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a EstadisticaDeGuias from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EstadisticaDeGuias::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a EstadisticaDeGuias, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['guia_id']) ? $strColumnAliasArray['guia_id'] : 'guia_id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (EstadisticaDeGuias::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the EstadisticaDeGuias object
			$objToReturn = new EstadisticaDeGuias();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intGuiaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intGuiaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaGuia = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_pickup';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaPickup = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'dias_pickup';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDiasPickup = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_traslado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaTraslado = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'dias_traslado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDiasTraslado = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'acumulado_traslado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAcumuladoTraslado = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_arribo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaArribo = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'dias_arribo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDiasArribo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'acumulado_arribo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAcumuladoArribo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRuta = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'dias_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDiasRuta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'acumulado_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAcumuladoRuta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaEntrega = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'dias_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDiasEntrega = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'acumulado_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAcumuladoEntrega = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'acumulado_sin_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAcumuladoSinEntrega = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dias_sin_actualizar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDiasSinActualizar = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->GuiaId != $objPreviousItem->GuiaId) {
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
				$strAliasPrefix = 'estadistica_de_guias__';

			// Check for Guia Early Binding
			$strAlias = $strAliasPrefix . 'guia_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['guia_id']) ? null : $objExpansionAliasArray['guia_id']);
				$objToReturn->objGuia = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of EstadisticaDeGuiases from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return EstadisticaDeGuias[]
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
					$objItem = EstadisticaDeGuias::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intGuiaId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EstadisticaDeGuias::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single EstadisticaDeGuias object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return EstadisticaDeGuias next row resulting from the query
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
			return EstadisticaDeGuias::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single EstadisticaDeGuias object,
		 * by GuiaId Index(es)
		 * @param integer $intGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EstadisticaDeGuias
		*/
		public static function LoadByGuiaId($intGuiaId, $objOptionalClauses = null) {
			return EstadisticaDeGuias::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EstadisticaDeGuias()->GuiaId, $intGuiaId)
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
		 * Save this EstadisticaDeGuias
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = EstadisticaDeGuias::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `estadistica_de_guias` (
							`guia_id`,
							`fecha_guia`,
							`fecha_pickup`,
							`dias_pickup`,
							`fecha_traslado`,
							`dias_traslado`,
							`acumulado_traslado`,
							`fecha_arribo`,
							`dias_arribo`,
							`acumulado_arribo`,
							`fecha_ruta`,
							`dias_ruta`,
							`acumulado_ruta`,
							`fecha_entrega`,
							`dias_entrega`,
							`acumulado_entrega`,
							`acumulado_sin_entrega`,
							`dias_sin_actualizar`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intGuiaId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaGuia) . ',
							' . $objDatabase->SqlVariable($this->dttFechaPickup) . ',
							' . $objDatabase->SqlVariable($this->intDiasPickup) . ',
							' . $objDatabase->SqlVariable($this->dttFechaTraslado) . ',
							' . $objDatabase->SqlVariable($this->intDiasTraslado) . ',
							' . $objDatabase->SqlVariable($this->intAcumuladoTraslado) . ',
							' . $objDatabase->SqlVariable($this->dttFechaArribo) . ',
							' . $objDatabase->SqlVariable($this->intDiasArribo) . ',
							' . $objDatabase->SqlVariable($this->intAcumuladoArribo) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRuta) . ',
							' . $objDatabase->SqlVariable($this->intDiasRuta) . ',
							' . $objDatabase->SqlVariable($this->intAcumuladoRuta) . ',
							' . $objDatabase->SqlVariable($this->dttFechaEntrega) . ',
							' . $objDatabase->SqlVariable($this->intDiasEntrega) . ',
							' . $objDatabase->SqlVariable($this->intAcumuladoEntrega) . ',
							' . $objDatabase->SqlVariable($this->intAcumuladoSinEntrega) . ',
							' . $objDatabase->SqlVariable($this->intDiasSinActualizar) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`estadistica_de_guias`
						SET
							`guia_id` = ' . $objDatabase->SqlVariable($this->intGuiaId) . ',
							`fecha_guia` = ' . $objDatabase->SqlVariable($this->dttFechaGuia) . ',
							`fecha_pickup` = ' . $objDatabase->SqlVariable($this->dttFechaPickup) . ',
							`dias_pickup` = ' . $objDatabase->SqlVariable($this->intDiasPickup) . ',
							`fecha_traslado` = ' . $objDatabase->SqlVariable($this->dttFechaTraslado) . ',
							`dias_traslado` = ' . $objDatabase->SqlVariable($this->intDiasTraslado) . ',
							`acumulado_traslado` = ' . $objDatabase->SqlVariable($this->intAcumuladoTraslado) . ',
							`fecha_arribo` = ' . $objDatabase->SqlVariable($this->dttFechaArribo) . ',
							`dias_arribo` = ' . $objDatabase->SqlVariable($this->intDiasArribo) . ',
							`acumulado_arribo` = ' . $objDatabase->SqlVariable($this->intAcumuladoArribo) . ',
							`fecha_ruta` = ' . $objDatabase->SqlVariable($this->dttFechaRuta) . ',
							`dias_ruta` = ' . $objDatabase->SqlVariable($this->intDiasRuta) . ',
							`acumulado_ruta` = ' . $objDatabase->SqlVariable($this->intAcumuladoRuta) . ',
							`fecha_entrega` = ' . $objDatabase->SqlVariable($this->dttFechaEntrega) . ',
							`dias_entrega` = ' . $objDatabase->SqlVariable($this->intDiasEntrega) . ',
							`acumulado_entrega` = ' . $objDatabase->SqlVariable($this->intAcumuladoEntrega) . ',
							`acumulado_sin_entrega` = ' . $objDatabase->SqlVariable($this->intAcumuladoSinEntrega) . ',
							`dias_sin_actualizar` = ' . $objDatabase->SqlVariable($this->intDiasSinActualizar) . '
						WHERE
							`guia_id` = ' . $objDatabase->SqlVariable($this->__intGuiaId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intGuiaId = $this->intGuiaId;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this EstadisticaDeGuias
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intGuiaId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EstadisticaDeGuias with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EstadisticaDeGuias::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estadistica_de_guias`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intGuiaId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this EstadisticaDeGuias ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'EstadisticaDeGuias', $this->intGuiaId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all EstadisticaDeGuiases
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EstadisticaDeGuias::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estadistica_de_guias`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate estadistica_de_guias table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = EstadisticaDeGuias::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `estadistica_de_guias`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this EstadisticaDeGuias from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EstadisticaDeGuias object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = EstadisticaDeGuias::Load($this->intGuiaId);

			// Update $this's local variables to match
			$this->GuiaId = $objReloaded->GuiaId;
			$this->__intGuiaId = $this->intGuiaId;
			$this->dttFechaGuia = $objReloaded->dttFechaGuia;
			$this->dttFechaPickup = $objReloaded->dttFechaPickup;
			$this->intDiasPickup = $objReloaded->intDiasPickup;
			$this->dttFechaTraslado = $objReloaded->dttFechaTraslado;
			$this->intDiasTraslado = $objReloaded->intDiasTraslado;
			$this->intAcumuladoTraslado = $objReloaded->intAcumuladoTraslado;
			$this->dttFechaArribo = $objReloaded->dttFechaArribo;
			$this->intDiasArribo = $objReloaded->intDiasArribo;
			$this->intAcumuladoArribo = $objReloaded->intAcumuladoArribo;
			$this->dttFechaRuta = $objReloaded->dttFechaRuta;
			$this->intDiasRuta = $objReloaded->intDiasRuta;
			$this->intAcumuladoRuta = $objReloaded->intAcumuladoRuta;
			$this->dttFechaEntrega = $objReloaded->dttFechaEntrega;
			$this->intDiasEntrega = $objReloaded->intDiasEntrega;
			$this->intAcumuladoEntrega = $objReloaded->intAcumuladoEntrega;
			$this->intAcumuladoSinEntrega = $objReloaded->intAcumuladoSinEntrega;
			$this->intDiasSinActualizar = $objReloaded->intDiasSinActualizar;
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
				case 'GuiaId':
					/**
					 * Gets the value for intGuiaId (PK)
					 * @return integer
					 */
					return $this->intGuiaId;

				case 'FechaGuia':
					/**
					 * Gets the value for dttFechaGuia (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaGuia;

				case 'FechaPickup':
					/**
					 * Gets the value for dttFechaPickup 
					 * @return QDateTime
					 */
					return $this->dttFechaPickup;

				case 'DiasPickup':
					/**
					 * Gets the value for intDiasPickup 
					 * @return integer
					 */
					return $this->intDiasPickup;

				case 'FechaTraslado':
					/**
					 * Gets the value for dttFechaTraslado 
					 * @return QDateTime
					 */
					return $this->dttFechaTraslado;

				case 'DiasTraslado':
					/**
					 * Gets the value for intDiasTraslado 
					 * @return integer
					 */
					return $this->intDiasTraslado;

				case 'AcumuladoTraslado':
					/**
					 * Gets the value for intAcumuladoTraslado 
					 * @return integer
					 */
					return $this->intAcumuladoTraslado;

				case 'FechaArribo':
					/**
					 * Gets the value for dttFechaArribo 
					 * @return QDateTime
					 */
					return $this->dttFechaArribo;

				case 'DiasArribo':
					/**
					 * Gets the value for intDiasArribo 
					 * @return integer
					 */
					return $this->intDiasArribo;

				case 'AcumuladoArribo':
					/**
					 * Gets the value for intAcumuladoArribo 
					 * @return integer
					 */
					return $this->intAcumuladoArribo;

				case 'FechaRuta':
					/**
					 * Gets the value for dttFechaRuta 
					 * @return QDateTime
					 */
					return $this->dttFechaRuta;

				case 'DiasRuta':
					/**
					 * Gets the value for intDiasRuta 
					 * @return integer
					 */
					return $this->intDiasRuta;

				case 'AcumuladoRuta':
					/**
					 * Gets the value for intAcumuladoRuta 
					 * @return integer
					 */
					return $this->intAcumuladoRuta;

				case 'FechaEntrega':
					/**
					 * Gets the value for dttFechaEntrega 
					 * @return QDateTime
					 */
					return $this->dttFechaEntrega;

				case 'DiasEntrega':
					/**
					 * Gets the value for intDiasEntrega 
					 * @return integer
					 */
					return $this->intDiasEntrega;

				case 'AcumuladoEntrega':
					/**
					 * Gets the value for intAcumuladoEntrega 
					 * @return integer
					 */
					return $this->intAcumuladoEntrega;

				case 'AcumuladoSinEntrega':
					/**
					 * Gets the value for intAcumuladoSinEntrega 
					 * @return integer
					 */
					return $this->intAcumuladoSinEntrega;

				case 'DiasSinActualizar':
					/**
					 * Gets the value for intDiasSinActualizar 
					 * @return integer
					 */
					return $this->intDiasSinActualizar;


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Gets the value for the Guias object referenced by intGuiaId (PK)
					 * @return Guias
					 */
					try {
						if ((!$this->objGuia) && (!is_null($this->intGuiaId)))
							$this->objGuia = Guias::Load($this->intGuiaId);
						return $this->objGuia;
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
				case 'GuiaId':
					/**
					 * Sets the value for intGuiaId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objGuia = null;
						return ($this->intGuiaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaGuia':
					/**
					 * Sets the value for dttFechaGuia (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaGuia = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPickup':
					/**
					 * Sets the value for dttFechaPickup 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaPickup = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DiasPickup':
					/**
					 * Sets the value for intDiasPickup 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDiasPickup = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaTraslado':
					/**
					 * Sets the value for dttFechaTraslado 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaTraslado = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DiasTraslado':
					/**
					 * Sets the value for intDiasTraslado 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDiasTraslado = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AcumuladoTraslado':
					/**
					 * Sets the value for intAcumuladoTraslado 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAcumuladoTraslado = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaArribo':
					/**
					 * Sets the value for dttFechaArribo 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaArribo = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DiasArribo':
					/**
					 * Sets the value for intDiasArribo 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDiasArribo = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AcumuladoArribo':
					/**
					 * Sets the value for intAcumuladoArribo 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAcumuladoArribo = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRuta':
					/**
					 * Sets the value for dttFechaRuta 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaRuta = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DiasRuta':
					/**
					 * Sets the value for intDiasRuta 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDiasRuta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AcumuladoRuta':
					/**
					 * Sets the value for intAcumuladoRuta 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAcumuladoRuta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEntrega':
					/**
					 * Sets the value for dttFechaEntrega 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaEntrega = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DiasEntrega':
					/**
					 * Sets the value for intDiasEntrega 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDiasEntrega = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AcumuladoEntrega':
					/**
					 * Sets the value for intAcumuladoEntrega 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAcumuladoEntrega = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AcumuladoSinEntrega':
					/**
					 * Sets the value for intAcumuladoSinEntrega 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAcumuladoSinEntrega = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DiasSinActualizar':
					/**
					 * Sets the value for intDiasSinActualizar 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDiasSinActualizar = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Sets the value for the Guias object referenced by intGuiaId (PK)
					 * @param Guias $mixValue
					 * @return Guias
					 */
					if (is_null($mixValue)) {
						$this->intGuiaId = null;
						$this->objGuia = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Guias object
						try {
							$mixValue = QType::Cast($mixValue, 'Guias');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Guias object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Guia for this EstadisticaDeGuias');

						// Update Local Member Variables
						$this->objGuia = $mixValue;
						$this->intGuiaId = $mixValue->Id;

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
			return "estadistica_de_guias";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[EstadisticaDeGuias::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="EstadisticaDeGuias"><sequence>';
			$strToReturn .= '<element name="Guia" type="xsd1:Guias"/>';
			$strToReturn .= '<element name="FechaGuia" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaPickup" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DiasPickup" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaTraslado" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DiasTraslado" type="xsd:int"/>';
			$strToReturn .= '<element name="AcumuladoTraslado" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaArribo" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DiasArribo" type="xsd:int"/>';
			$strToReturn .= '<element name="AcumuladoArribo" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaRuta" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DiasRuta" type="xsd:int"/>';
			$strToReturn .= '<element name="AcumuladoRuta" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaEntrega" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DiasEntrega" type="xsd:int"/>';
			$strToReturn .= '<element name="AcumuladoEntrega" type="xsd:int"/>';
			$strToReturn .= '<element name="AcumuladoSinEntrega" type="xsd:int"/>';
			$strToReturn .= '<element name="DiasSinActualizar" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EstadisticaDeGuias', $strComplexTypeArray)) {
				$strComplexTypeArray['EstadisticaDeGuias'] = EstadisticaDeGuias::GetSoapComplexTypeXml();
				Guias::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EstadisticaDeGuias::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EstadisticaDeGuias();
			if ((property_exists($objSoapObject, 'Guia')) &&
				($objSoapObject->Guia))
				$objToReturn->Guia = Guias::GetObjectFromSoapObject($objSoapObject->Guia);
			if (property_exists($objSoapObject, 'FechaGuia'))
				$objToReturn->dttFechaGuia = new QDateTime($objSoapObject->FechaGuia);
			if (property_exists($objSoapObject, 'FechaPickup'))
				$objToReturn->dttFechaPickup = new QDateTime($objSoapObject->FechaPickup);
			if (property_exists($objSoapObject, 'DiasPickup'))
				$objToReturn->intDiasPickup = $objSoapObject->DiasPickup;
			if (property_exists($objSoapObject, 'FechaTraslado'))
				$objToReturn->dttFechaTraslado = new QDateTime($objSoapObject->FechaTraslado);
			if (property_exists($objSoapObject, 'DiasTraslado'))
				$objToReturn->intDiasTraslado = $objSoapObject->DiasTraslado;
			if (property_exists($objSoapObject, 'AcumuladoTraslado'))
				$objToReturn->intAcumuladoTraslado = $objSoapObject->AcumuladoTraslado;
			if (property_exists($objSoapObject, 'FechaArribo'))
				$objToReturn->dttFechaArribo = new QDateTime($objSoapObject->FechaArribo);
			if (property_exists($objSoapObject, 'DiasArribo'))
				$objToReturn->intDiasArribo = $objSoapObject->DiasArribo;
			if (property_exists($objSoapObject, 'AcumuladoArribo'))
				$objToReturn->intAcumuladoArribo = $objSoapObject->AcumuladoArribo;
			if (property_exists($objSoapObject, 'FechaRuta'))
				$objToReturn->dttFechaRuta = new QDateTime($objSoapObject->FechaRuta);
			if (property_exists($objSoapObject, 'DiasRuta'))
				$objToReturn->intDiasRuta = $objSoapObject->DiasRuta;
			if (property_exists($objSoapObject, 'AcumuladoRuta'))
				$objToReturn->intAcumuladoRuta = $objSoapObject->AcumuladoRuta;
			if (property_exists($objSoapObject, 'FechaEntrega'))
				$objToReturn->dttFechaEntrega = new QDateTime($objSoapObject->FechaEntrega);
			if (property_exists($objSoapObject, 'DiasEntrega'))
				$objToReturn->intDiasEntrega = $objSoapObject->DiasEntrega;
			if (property_exists($objSoapObject, 'AcumuladoEntrega'))
				$objToReturn->intAcumuladoEntrega = $objSoapObject->AcumuladoEntrega;
			if (property_exists($objSoapObject, 'AcumuladoSinEntrega'))
				$objToReturn->intAcumuladoSinEntrega = $objSoapObject->AcumuladoSinEntrega;
			if (property_exists($objSoapObject, 'DiasSinActualizar'))
				$objToReturn->intDiasSinActualizar = $objSoapObject->DiasSinActualizar;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, EstadisticaDeGuias::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGuia)
				$objObject->objGuia = Guias::GetSoapObjectFromObject($objObject->objGuia, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGuiaId = null;
			if ($objObject->dttFechaGuia)
				$objObject->dttFechaGuia = $objObject->dttFechaGuia->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaPickup)
				$objObject->dttFechaPickup = $objObject->dttFechaPickup->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaTraslado)
				$objObject->dttFechaTraslado = $objObject->dttFechaTraslado->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaArribo)
				$objObject->dttFechaArribo = $objObject->dttFechaArribo->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaRuta)
				$objObject->dttFechaRuta = $objObject->dttFechaRuta->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaEntrega)
				$objObject->dttFechaEntrega = $objObject->dttFechaEntrega->qFormat(QDateTime::FormatSoap);
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
			$iArray['GuiaId'] = $this->intGuiaId;
			$iArray['FechaGuia'] = $this->dttFechaGuia;
			$iArray['FechaPickup'] = $this->dttFechaPickup;
			$iArray['DiasPickup'] = $this->intDiasPickup;
			$iArray['FechaTraslado'] = $this->dttFechaTraslado;
			$iArray['DiasTraslado'] = $this->intDiasTraslado;
			$iArray['AcumuladoTraslado'] = $this->intAcumuladoTraslado;
			$iArray['FechaArribo'] = $this->dttFechaArribo;
			$iArray['DiasArribo'] = $this->intDiasArribo;
			$iArray['AcumuladoArribo'] = $this->intAcumuladoArribo;
			$iArray['FechaRuta'] = $this->dttFechaRuta;
			$iArray['DiasRuta'] = $this->intDiasRuta;
			$iArray['AcumuladoRuta'] = $this->intAcumuladoRuta;
			$iArray['FechaEntrega'] = $this->dttFechaEntrega;
			$iArray['DiasEntrega'] = $this->intDiasEntrega;
			$iArray['AcumuladoEntrega'] = $this->intAcumuladoEntrega;
			$iArray['AcumuladoSinEntrega'] = $this->intAcumuladoSinEntrega;
			$iArray['DiasSinActualizar'] = $this->intDiasSinActualizar;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intGuiaId ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuias $Guia
     * @property-read QQNode $FechaGuia
     * @property-read QQNode $FechaPickup
     * @property-read QQNode $DiasPickup
     * @property-read QQNode $FechaTraslado
     * @property-read QQNode $DiasTraslado
     * @property-read QQNode $AcumuladoTraslado
     * @property-read QQNode $FechaArribo
     * @property-read QQNode $DiasArribo
     * @property-read QQNode $AcumuladoArribo
     * @property-read QQNode $FechaRuta
     * @property-read QQNode $DiasRuta
     * @property-read QQNode $AcumuladoRuta
     * @property-read QQNode $FechaEntrega
     * @property-read QQNode $DiasEntrega
     * @property-read QQNode $AcumuladoEntrega
     * @property-read QQNode $AcumuladoSinEntrega
     * @property-read QQNode $DiasSinActualizar
     *
     *

     * @property-read QQNodeGuias $_PrimaryKeyNode
     **/
	class QQNodeEstadisticaDeGuias extends QQNode {
		protected $strTableName = 'estadistica_de_guias';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'EstadisticaDeGuias';
		public function __get($strName) {
			switch ($strName) {
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'Integer', $this);
				case 'Guia':
					return new QQNodeGuias('guia_id', 'Guia', 'Integer', $this);
				case 'FechaGuia':
					return new QQNode('fecha_guia', 'FechaGuia', 'Date', $this);
				case 'FechaPickup':
					return new QQNode('fecha_pickup', 'FechaPickup', 'Date', $this);
				case 'DiasPickup':
					return new QQNode('dias_pickup', 'DiasPickup', 'Integer', $this);
				case 'FechaTraslado':
					return new QQNode('fecha_traslado', 'FechaTraslado', 'Date', $this);
				case 'DiasTraslado':
					return new QQNode('dias_traslado', 'DiasTraslado', 'Integer', $this);
				case 'AcumuladoTraslado':
					return new QQNode('acumulado_traslado', 'AcumuladoTraslado', 'Integer', $this);
				case 'FechaArribo':
					return new QQNode('fecha_arribo', 'FechaArribo', 'Date', $this);
				case 'DiasArribo':
					return new QQNode('dias_arribo', 'DiasArribo', 'Integer', $this);
				case 'AcumuladoArribo':
					return new QQNode('acumulado_arribo', 'AcumuladoArribo', 'Integer', $this);
				case 'FechaRuta':
					return new QQNode('fecha_ruta', 'FechaRuta', 'Date', $this);
				case 'DiasRuta':
					return new QQNode('dias_ruta', 'DiasRuta', 'Integer', $this);
				case 'AcumuladoRuta':
					return new QQNode('acumulado_ruta', 'AcumuladoRuta', 'Integer', $this);
				case 'FechaEntrega':
					return new QQNode('fecha_entrega', 'FechaEntrega', 'Date', $this);
				case 'DiasEntrega':
					return new QQNode('dias_entrega', 'DiasEntrega', 'Integer', $this);
				case 'AcumuladoEntrega':
					return new QQNode('acumulado_entrega', 'AcumuladoEntrega', 'Integer', $this);
				case 'AcumuladoSinEntrega':
					return new QQNode('acumulado_sin_entrega', 'AcumuladoSinEntrega', 'Integer', $this);
				case 'DiasSinActualizar':
					return new QQNode('dias_sin_actualizar', 'DiasSinActualizar', 'Integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuias('guia_id', 'GuiaId', 'Integer', $this);
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
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuias $Guia
     * @property-read QQNode $FechaGuia
     * @property-read QQNode $FechaPickup
     * @property-read QQNode $DiasPickup
     * @property-read QQNode $FechaTraslado
     * @property-read QQNode $DiasTraslado
     * @property-read QQNode $AcumuladoTraslado
     * @property-read QQNode $FechaArribo
     * @property-read QQNode $DiasArribo
     * @property-read QQNode $AcumuladoArribo
     * @property-read QQNode $FechaRuta
     * @property-read QQNode $DiasRuta
     * @property-read QQNode $AcumuladoRuta
     * @property-read QQNode $FechaEntrega
     * @property-read QQNode $DiasEntrega
     * @property-read QQNode $AcumuladoEntrega
     * @property-read QQNode $AcumuladoSinEntrega
     * @property-read QQNode $DiasSinActualizar
     *
     *

     * @property-read QQNodeGuias $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeEstadisticaDeGuias extends QQReverseReferenceNode {
		protected $strTableName = 'estadistica_de_guias';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'EstadisticaDeGuias';
		public function __get($strName) {
			switch ($strName) {
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'integer', $this);
				case 'Guia':
					return new QQNodeGuias('guia_id', 'Guia', 'integer', $this);
				case 'FechaGuia':
					return new QQNode('fecha_guia', 'FechaGuia', 'QDateTime', $this);
				case 'FechaPickup':
					return new QQNode('fecha_pickup', 'FechaPickup', 'QDateTime', $this);
				case 'DiasPickup':
					return new QQNode('dias_pickup', 'DiasPickup', 'integer', $this);
				case 'FechaTraslado':
					return new QQNode('fecha_traslado', 'FechaTraslado', 'QDateTime', $this);
				case 'DiasTraslado':
					return new QQNode('dias_traslado', 'DiasTraslado', 'integer', $this);
				case 'AcumuladoTraslado':
					return new QQNode('acumulado_traslado', 'AcumuladoTraslado', 'integer', $this);
				case 'FechaArribo':
					return new QQNode('fecha_arribo', 'FechaArribo', 'QDateTime', $this);
				case 'DiasArribo':
					return new QQNode('dias_arribo', 'DiasArribo', 'integer', $this);
				case 'AcumuladoArribo':
					return new QQNode('acumulado_arribo', 'AcumuladoArribo', 'integer', $this);
				case 'FechaRuta':
					return new QQNode('fecha_ruta', 'FechaRuta', 'QDateTime', $this);
				case 'DiasRuta':
					return new QQNode('dias_ruta', 'DiasRuta', 'integer', $this);
				case 'AcumuladoRuta':
					return new QQNode('acumulado_ruta', 'AcumuladoRuta', 'integer', $this);
				case 'FechaEntrega':
					return new QQNode('fecha_entrega', 'FechaEntrega', 'QDateTime', $this);
				case 'DiasEntrega':
					return new QQNode('dias_entrega', 'DiasEntrega', 'integer', $this);
				case 'AcumuladoEntrega':
					return new QQNode('acumulado_entrega', 'AcumuladoEntrega', 'integer', $this);
				case 'AcumuladoSinEntrega':
					return new QQNode('acumulado_sin_entrega', 'AcumuladoSinEntrega', 'integer', $this);
				case 'DiasSinActualizar':
					return new QQNode('dias_sin_actualizar', 'DiasSinActualizar', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuias('guia_id', 'GuiaId', 'integer', $this);
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
