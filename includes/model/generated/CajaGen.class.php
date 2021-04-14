<?php
	/**
	 * The abstract CajaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Caja subclass which
	 * extends this CajaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Caja class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property integer $CounterId the value for intCounterId (Not Null)
	 * @property string $ImpresoraId the value for strImpresoraId 
	 * @property string $Serie the value for strSerie (Not Null)
	 * @property integer $ConseFactura the value for intConseFactura 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property Counter $Counter the value for the Counter object referenced by intCounterId (Not Null)
	 * @property-read Cobranza $_Cobranza the value for the private _objCobranza (Read-Only) if set due to an expansion on the cobranza.caja_id reverse relationship
	 * @property-read Cobranza[] $_CobranzaArray the value for the private _objCobranzaArray (Read-Only) if set due to an ExpandAsArray on the cobranza.caja_id reverse relationship
	 * @property-read Factura $_Factura the value for the private _objFactura (Read-Only) if set due to an expansion on the factura.caja_id reverse relationship
	 * @property-read Factura[] $_FacturaArray the value for the private _objFacturaArray (Read-Only) if set due to an ExpandAsArray on the factura.caja_id reverse relationship
	 * @property-read FacturaPagos $_FacturaPagos the value for the private _objFacturaPagos (Read-Only) if set due to an expansion on the factura_pagos.caja_id reverse relationship
	 * @property-read FacturaPagos[] $_FacturaPagosArray the value for the private _objFacturaPagosArray (Read-Only) if set due to an ExpandAsArray on the factura_pagos.caja_id reverse relationship
	 * @property-read FacturaPmn $_FacturaPmn the value for the private _objFacturaPmn (Read-Only) if set due to an expansion on the factura_pmn.caja_id reverse relationship
	 * @property-read FacturaPmn[] $_FacturaPmnArray the value for the private _objFacturaPmnArray (Read-Only) if set due to an ExpandAsArray on the factura_pmn.caja_id reverse relationship
	 * @property-read Facturas $_Facturas the value for the private _objFacturas (Read-Only) if set due to an expansion on the facturas.caja_id reverse relationship
	 * @property-read Facturas[] $_FacturasArray the value for the private _objFacturasArray (Read-Only) if set due to an ExpandAsArray on the facturas.caja_id reverse relationship
	 * @property-read NotaCredito $_NotaCredito the value for the private _objNotaCredito (Read-Only) if set due to an expansion on the nota_credito.caja_id reverse relationship
	 * @property-read NotaCredito[] $_NotaCreditoArray the value for the private _objNotaCreditoArray (Read-Only) if set due to an ExpandAsArray on the nota_credito.caja_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CajaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column caja.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 50;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.counter_id
		 * @var integer intCounterId
		 */
		protected $intCounterId;
		const CounterIdDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.impresora_id
		 * @var string strImpresoraId
		 */
		protected $strImpresoraId;
		const ImpresoraIdMaxLength = 45;
		const ImpresoraIdDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.serie
		 * @var string strSerie
		 */
		protected $strSerie;
		const SerieMaxLength = 2;
		const SerieDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.conse_factura
		 * @var integer intConseFactura
		 */
		protected $intConseFactura;
		const ConseFacturaDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column caja.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single Cobranza object
		 * (of type Cobranza), if this Caja object was restored with
		 * an expansion on the cobranza association table.
		 * @var Cobranza _objCobranza;
		 */
		private $_objCobranza;

		/**
		 * Private member variable that stores a reference to an array of Cobranza objects
		 * (of type Cobranza[]), if this Caja object was restored with
		 * an ExpandAsArray on the cobranza association table.
		 * @var Cobranza[] _objCobranzaArray;
		 */
		private $_objCobranzaArray = null;

		/**
		 * Private member variable that stores a reference to a single Factura object
		 * (of type Factura), if this Caja object was restored with
		 * an expansion on the factura association table.
		 * @var Factura _objFactura;
		 */
		private $_objFactura;

		/**
		 * Private member variable that stores a reference to an array of Factura objects
		 * (of type Factura[]), if this Caja object was restored with
		 * an ExpandAsArray on the factura association table.
		 * @var Factura[] _objFacturaArray;
		 */
		private $_objFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaPagos object
		 * (of type FacturaPagos), if this Caja object was restored with
		 * an expansion on the factura_pagos association table.
		 * @var FacturaPagos _objFacturaPagos;
		 */
		private $_objFacturaPagos;

		/**
		 * Private member variable that stores a reference to an array of FacturaPagos objects
		 * (of type FacturaPagos[]), if this Caja object was restored with
		 * an ExpandAsArray on the factura_pagos association table.
		 * @var FacturaPagos[] _objFacturaPagosArray;
		 */
		private $_objFacturaPagosArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaPmn object
		 * (of type FacturaPmn), if this Caja object was restored with
		 * an expansion on the factura_pmn association table.
		 * @var FacturaPmn _objFacturaPmn;
		 */
		private $_objFacturaPmn;

		/**
		 * Private member variable that stores a reference to an array of FacturaPmn objects
		 * (of type FacturaPmn[]), if this Caja object was restored with
		 * an ExpandAsArray on the factura_pmn association table.
		 * @var FacturaPmn[] _objFacturaPmnArray;
		 */
		private $_objFacturaPmnArray = null;

		/**
		 * Private member variable that stores a reference to a single Facturas object
		 * (of type Facturas), if this Caja object was restored with
		 * an expansion on the facturas association table.
		 * @var Facturas _objFacturas;
		 */
		private $_objFacturas;

		/**
		 * Private member variable that stores a reference to an array of Facturas objects
		 * (of type Facturas[]), if this Caja object was restored with
		 * an ExpandAsArray on the facturas association table.
		 * @var Facturas[] _objFacturasArray;
		 */
		private $_objFacturasArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCredito object
		 * (of type NotaCredito), if this Caja object was restored with
		 * an expansion on the nota_credito association table.
		 * @var NotaCredito _objNotaCredito;
		 */
		private $_objNotaCredito;

		/**
		 * Private member variable that stores a reference to an array of NotaCredito objects
		 * (of type NotaCredito[]), if this Caja object was restored with
		 * an ExpandAsArray on the nota_credito association table.
		 * @var NotaCredito[] _objNotaCreditoArray;
		 */
		private $_objNotaCreditoArray = null;

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
		 * in the database column caja.counter_id.
		 *
		 * NOTE: Always use the Counter property getter to correctly retrieve this Counter object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Counter objCounter
		 */
		protected $objCounter;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Caja::IdDefault;
			$this->strDescripcion = Caja::DescripcionDefault;
			$this->intCounterId = Caja::CounterIdDefault;
			$this->strImpresoraId = Caja::ImpresoraIdDefault;
			$this->strSerie = Caja::SerieDefault;
			$this->intConseFactura = Caja::ConseFacturaDefault;
			$this->strCreatedAt = Caja::CreatedAtDefault;
			$this->strUpdatedAt = Caja::UpdatedAtDefault;
			$this->strDeletedAt = Caja::DeletedAtDefault;
			$this->intCreatedBy = Caja::CreatedByDefault;
			$this->intUpdatedBy = Caja::UpdatedByDefault;
			$this->intDeletedBy = Caja::DeletedByDefault;
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
		 * Load a Caja from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Caja
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Caja', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Caja::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Caja()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Cajas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Caja[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Caja::QueryArray to perform the LoadAll query
			try {
				return Caja::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Cajas
		 * @return int
		 */
		public static function CountAll() {
			// Call Caja::QueryCount to perform the CountAll query
			return Caja::QueryCount(QQ::All());
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
			$objDatabase = Caja::GetDatabase();

			// Create/Build out the QueryBuilder object with Caja-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'caja');

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
				Caja::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('caja');

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
		 * Static Qcubed Query method to query for a single Caja object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Caja the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Caja::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Caja object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Caja::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Caja::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Caja objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Caja[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Caja::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Caja::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Caja::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Caja objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Caja::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Caja::GetDatabase();

			$strQuery = Caja::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/caja', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Caja::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Caja
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'caja';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'counter_id', $strAliasPrefix . 'counter_id');
			    $objBuilder->AddSelectItem($strTableName, 'impresora_id', $strAliasPrefix . 'impresora_id');
			    $objBuilder->AddSelectItem($strTableName, 'serie', $strAliasPrefix . 'serie');
			    $objBuilder->AddSelectItem($strTableName, 'conse_factura', $strAliasPrefix . 'conse_factura');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_by', $strAliasPrefix . 'deleted_by');
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
		 * Instantiate a Caja from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Caja::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Caja, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Caja::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Caja object
			$objToReturn = new Caja();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'counter_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCounterId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'impresora_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strImpresoraId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'serie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSerie = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'conse_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intConseFactura = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDeletedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'deleted_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDeletedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'caja__';

			// Check for Counter Early Binding
			$strAlias = $strAliasPrefix . 'counter_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['counter_id']) ? null : $objExpansionAliasArray['counter_id']);
				$objToReturn->objCounter = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'counter_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for Cobranza Virtual Binding
			$strAlias = $strAliasPrefix . 'cobranza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cobranza']) ? null : $objExpansionAliasArray['cobranza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCobranzaArray)
				$objToReturn->_objCobranzaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCobranzaArray[] = Cobranza::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cobranza__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCobranza)) {
					$objToReturn->_objCobranza = Cobranza::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cobranza__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Factura Virtual Binding
			$strAlias = $strAliasPrefix . 'factura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factura']) ? null : $objExpansionAliasArray['factura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaArray)
				$objToReturn->_objFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaArray[] = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFactura)) {
					$objToReturn->_objFactura = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaPagos Virtual Binding
			$strAlias = $strAliasPrefix . 'facturapagos__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturapagos']) ? null : $objExpansionAliasArray['facturapagos']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaPagosArray)
				$objToReturn->_objFacturaPagosArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaPagosArray[] = FacturaPagos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapagos__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaPagos)) {
					$objToReturn->_objFacturaPagos = FacturaPagos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapagos__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaPmn Virtual Binding
			$strAlias = $strAliasPrefix . 'facturapmn__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturapmn']) ? null : $objExpansionAliasArray['facturapmn']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaPmnArray)
				$objToReturn->_objFacturaPmnArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaPmnArray[] = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapmn__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaPmn)) {
					$objToReturn->_objFacturaPmn = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapmn__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Facturas Virtual Binding
			$strAlias = $strAliasPrefix . 'facturas__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturas']) ? null : $objExpansionAliasArray['facturas']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturasArray)
				$objToReturn->_objFacturasArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturasArray[] = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturas__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturas)) {
					$objToReturn->_objFacturas = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturas__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCredito Virtual Binding
			$strAlias = $strAliasPrefix . 'notacredito__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacredito']) ? null : $objExpansionAliasArray['notacredito']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoArray)
				$objToReturn->_objNotaCreditoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoArray[] = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacredito__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCredito)) {
					$objToReturn->_objNotaCredito = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacredito__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Cajas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Caja[]
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
					$objItem = Caja::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Caja::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Caja object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Caja next row resulting from the query
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
			return Caja::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Caja object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Caja
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Caja::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Caja()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Caja objects,
		 * by CounterId Index(es)
		 * @param integer $intCounterId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Caja[]
		*/
		public static function LoadArrayByCounterId($intCounterId, $objOptionalClauses = null) {
			// Call Caja::QueryArray to perform the LoadArrayByCounterId query
			try {
				return Caja::QueryArray(
					QQ::Equal(QQN::Caja()->CounterId, $intCounterId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Cajas
		 * by CounterId Index(es)
		 * @param integer $intCounterId
		 * @return int
		*/
		public static function CountByCounterId($intCounterId) {
			// Call Caja::QueryCount to perform the CountByCounterId query
			return Caja::QueryCount(
				QQ::Equal(QQN::Caja()->CounterId, $intCounterId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Caja
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `caja` (
							`descripcion`,
							`counter_id`,
							`impresora_id`,
							`serie`,
							`conse_factura`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->intCounterId) . ',
							' . $objDatabase->SqlVariable($this->strImpresoraId) . ',
							' . $objDatabase->SqlVariable($this->strSerie) . ',
							' . $objDatabase->SqlVariable($this->intConseFactura) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('caja', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`caja`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Caja');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`caja`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Caja');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`caja`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Caja');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`caja`
						SET
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`counter_id` = ' . $objDatabase->SqlVariable($this->intCounterId) . ',
							`impresora_id` = ' . $objDatabase->SqlVariable($this->strImpresoraId) . ',
							`serie` = ' . $objDatabase->SqlVariable($this->strSerie) . ',
							`conse_factura` = ' . $objDatabase->SqlVariable($this->intConseFactura) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							`deleted_by` = ' . $objDatabase->SqlVariable($this->intDeletedBy) . '
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

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`created_at`
				FROM
					`caja`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strCreatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`updated_at`
				FROM
					`caja`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`deleted_at`
				FROM
					`caja`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strDeletedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Caja
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Caja with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`caja`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Caja ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Caja', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Cajas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`caja`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate caja table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `caja`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Caja from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Caja object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Caja::Load($this->intId);

			// Update $this's local variables to match
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->CounterId = $objReloaded->CounterId;
			$this->strImpresoraId = $objReloaded->strImpresoraId;
			$this->strSerie = $objReloaded->strSerie;
			$this->intConseFactura = $objReloaded->intConseFactura;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
			$this->strDeletedAt = $objReloaded->strDeletedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
			$this->intDeletedBy = $objReloaded->intDeletedBy;
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
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'CounterId':
					/**
					 * Gets the value for intCounterId (Not Null)
					 * @return integer
					 */
					return $this->intCounterId;

				case 'ImpresoraId':
					/**
					 * Gets the value for strImpresoraId 
					 * @return string
					 */
					return $this->strImpresoraId;

				case 'Serie':
					/**
					 * Gets the value for strSerie (Not Null)
					 * @return string
					 */
					return $this->strSerie;

				case 'ConseFactura':
					/**
					 * Gets the value for intConseFactura 
					 * @return integer
					 */
					return $this->intConseFactura;

				case 'CreatedAt':
					/**
					 * Gets the value for strCreatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for strUpdatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strUpdatedAt;

				case 'DeletedAt':
					/**
					 * Gets the value for strDeletedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strDeletedAt;

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

				case 'DeletedBy':
					/**
					 * Gets the value for intDeletedBy 
					 * @return integer
					 */
					return $this->intDeletedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'Counter':
					/**
					 * Gets the value for the Counter object referenced by intCounterId (Not Null)
					 * @return Counter
					 */
					try {
						if ((!$this->objCounter) && (!is_null($this->intCounterId)))
							$this->objCounter = Counter::Load($this->intCounterId);
						return $this->objCounter;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Cobranza':
					/**
					 * Gets the value for the private _objCobranza (Read-Only)
					 * if set due to an expansion on the cobranza.caja_id reverse relationship
					 * @return Cobranza
					 */
					return $this->_objCobranza;

				case '_CobranzaArray':
					/**
					 * Gets the value for the private _objCobranzaArray (Read-Only)
					 * if set due to an ExpandAsArray on the cobranza.caja_id reverse relationship
					 * @return Cobranza[]
					 */
					return $this->_objCobranzaArray;

				case '_Factura':
					/**
					 * Gets the value for the private _objFactura (Read-Only)
					 * if set due to an expansion on the factura.caja_id reverse relationship
					 * @return Factura
					 */
					return $this->_objFactura;

				case '_FacturaArray':
					/**
					 * Gets the value for the private _objFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura.caja_id reverse relationship
					 * @return Factura[]
					 */
					return $this->_objFacturaArray;

				case '_FacturaPagos':
					/**
					 * Gets the value for the private _objFacturaPagos (Read-Only)
					 * if set due to an expansion on the factura_pagos.caja_id reverse relationship
					 * @return FacturaPagos
					 */
					return $this->_objFacturaPagos;

				case '_FacturaPagosArray':
					/**
					 * Gets the value for the private _objFacturaPagosArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pagos.caja_id reverse relationship
					 * @return FacturaPagos[]
					 */
					return $this->_objFacturaPagosArray;

				case '_FacturaPmn':
					/**
					 * Gets the value for the private _objFacturaPmn (Read-Only)
					 * if set due to an expansion on the factura_pmn.caja_id reverse relationship
					 * @return FacturaPmn
					 */
					return $this->_objFacturaPmn;

				case '_FacturaPmnArray':
					/**
					 * Gets the value for the private _objFacturaPmnArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pmn.caja_id reverse relationship
					 * @return FacturaPmn[]
					 */
					return $this->_objFacturaPmnArray;

				case '_Facturas':
					/**
					 * Gets the value for the private _objFacturas (Read-Only)
					 * if set due to an expansion on the facturas.caja_id reverse relationship
					 * @return Facturas
					 */
					return $this->_objFacturas;

				case '_FacturasArray':
					/**
					 * Gets the value for the private _objFacturasArray (Read-Only)
					 * if set due to an ExpandAsArray on the facturas.caja_id reverse relationship
					 * @return Facturas[]
					 */
					return $this->_objFacturasArray;

				case '_NotaCredito':
					/**
					 * Gets the value for the private _objNotaCredito (Read-Only)
					 * if set due to an expansion on the nota_credito.caja_id reverse relationship
					 * @return NotaCredito
					 */
					return $this->_objNotaCredito;

				case '_NotaCreditoArray':
					/**
					 * Gets the value for the private _objNotaCreditoArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito.caja_id reverse relationship
					 * @return NotaCredito[]
					 */
					return $this->_objNotaCreditoArray;


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
					 * Sets the value for strDescripcion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CounterId':
					/**
					 * Sets the value for intCounterId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCounter = null;
						return ($this->intCounterId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ImpresoraId':
					/**
					 * Sets the value for strImpresoraId 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strImpresoraId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Serie':
					/**
					 * Sets the value for strSerie (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSerie = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ConseFactura':
					/**
					 * Sets the value for intConseFactura 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intConseFactura = QType::Cast($mixValue, QType::Integer));
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

				case 'DeletedBy':
					/**
					 * Sets the value for intDeletedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDeletedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Counter':
					/**
					 * Sets the value for the Counter object referenced by intCounterId (Not Null)
					 * @param Counter $mixValue
					 * @return Counter
					 */
					if (is_null($mixValue)) {
						$this->intCounterId = null;
						$this->objCounter = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Counter object
						try {
							$mixValue = QType::Cast($mixValue, 'Counter');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Counter object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Counter for this Caja');

						// Update Local Member Variables
						$this->objCounter = $mixValue;
						$this->intCounterId = $mixValue->Id;

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
			if ($this->CountCobranzas()) {
				$arrTablRela[] = 'cobranza';
			}
			if ($this->CountFacturas()) {
				$arrTablRela[] = 'factura';
			}
			if ($this->CountFacturaPagoses()) {
				$arrTablRela[] = 'factura_pagos';
			}
			if ($this->CountFacturaPmns()) {
				$arrTablRela[] = 'factura_pmn';
			}
			if ($this->CountFacturases()) {
				$arrTablRela[] = 'facturas';
			}
			if ($this->CountNotaCreditos()) {
				$arrTablRela[] = 'nota_credito';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Cobranza
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Cobranzas as an array of Cobranza objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public function GetCobranzaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Cobranza::LoadArrayByCajaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Cobranzas
		 * @return int
		*/
		public function CountCobranzas() {
			if ((is_null($this->intId)))
				return 0;

			return Cobranza::CountByCajaId($this->intId);
		}

		/**
		 * Associates a Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function AssociateCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCobranza on this unsaved Caja.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCobranza on this Caja with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . '
			');
		}

		/**
		 * Unassociates a Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function UnassociateCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Caja.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this Caja with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`caja_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Cobranzas
		 * @return void
		*/
		public function UnassociateAllCobranzas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`caja_id` = null
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function DeleteAssociatedCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Caja.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this Caja with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Cobranzas
		 * @return void
		*/
		public function DeleteAllCobranzas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for Factura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Facturas as an array of Factura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public function GetFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Factura::LoadArrayByCajaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Facturas
		 * @return int
		*/
		public function CountFacturas() {
			if ((is_null($this->intId)))
				return 0;

			return Factura::CountByCajaId($this->intId);
		}

		/**
		 * Associates a Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function AssociateFactura(Factura $objFactura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFactura on this unsaved Caja.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFactura on this Caja with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . '
			');
		}

		/**
		 * Unassociates a Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function UnassociateFactura(Factura $objFactura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved Caja.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this Caja with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`caja_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Facturas
		 * @return void
		*/
		public function UnassociateAllFacturas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`caja_id` = null
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function DeleteAssociatedFactura(Factura $objFactura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved Caja.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this Caja with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Facturas
		 * @return void
		*/
		public function DeleteAllFacturas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaPagos
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaPagoses as an array of FacturaPagos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public function GetFacturaPagosArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaPagos::LoadArrayByCajaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaPagoses
		 * @return int
		*/
		public function CountFacturaPagoses() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaPagos::CountByCajaId($this->intId);
		}

		/**
		 * Associates a FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function AssociateFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPagos on this unsaved Caja.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPagos on this Caja with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function UnassociateFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved Caja.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this Caja with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`caja_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaPagoses
		 * @return void
		*/
		public function UnassociateAllFacturaPagoses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`caja_id` = null
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function DeleteAssociatedFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved Caja.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this Caja with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaPagoses
		 * @return void
		*/
		public function DeleteAllFacturaPagoses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaPmn
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaPmns as an array of FacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public function GetFacturaPmnArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaPmn::LoadArrayByCajaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaPmns
		 * @return int
		*/
		public function CountFacturaPmns() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaPmn::CountByCajaId($this->intId);
		}

		/**
		 * Associates a FacturaPmn
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function AssociateFacturaPmn(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPmn on this unsaved Caja.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPmn on this Caja with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaPmn
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function UnassociateFacturaPmn(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmn on this unsaved Caja.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmn on this Caja with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`caja_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaPmns
		 * @return void
		*/
		public function UnassociateAllFacturaPmns() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmn on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`caja_id` = null
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaPmn
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedFacturaPmn(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmn on this unsaved Caja.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmn on this Caja with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaPmns
		 * @return void
		*/
		public function DeleteAllFacturaPmns() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmn on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for Facturas
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Facturases as an array of Facturas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public function GetFacturasArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Facturas::LoadArrayByCajaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Facturases
		 * @return int
		*/
		public function CountFacturases() {
			if ((is_null($this->intId)))
				return 0;

			return Facturas::CountByCajaId($this->intId);
		}

		/**
		 * Associates a Facturas
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function AssociateFacturas(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturas on this unsaved Caja.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturas on this Caja with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . '
			');
		}

		/**
		 * Unassociates a Facturas
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function UnassociateFacturas(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturas on this unsaved Caja.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturas on this Caja with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`caja_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Facturases
		 * @return void
		*/
		public function UnassociateAllFacturases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturas on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`caja_id` = null
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Facturas
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function DeleteAssociatedFacturas(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturas on this unsaved Caja.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturas on this Caja with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Facturases
		 * @return void
		*/
		public function DeleteAllFacturases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturas on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaCredito
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditos as an array of NotaCredito objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public function GetNotaCreditoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaCredito::LoadArrayByCajaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditos
		 * @return int
		*/
		public function CountNotaCreditos() {
			if ((is_null($this->intId)))
				return 0;

			return NotaCredito::CountByCajaId($this->intId);
		}

		/**
		 * Associates a NotaCredito
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function AssociateNotaCredito(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCredito on this unsaved Caja.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCredito on this Caja with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCredito
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function UnassociateNotaCredito(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCredito on this unsaved Caja.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCredito on this Caja with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`caja_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaCreditos
		 * @return void
		*/
		public function UnassociateAllNotaCreditos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCredito on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`caja_id` = null
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaCredito
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function DeleteAssociatedNotaCredito(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCredito on this unsaved Caja.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCredito on this Caja with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditos
		 * @return void
		*/
		public function DeleteAllNotaCreditos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCredito on this unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Caja::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`caja_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "caja";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Caja::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Caja"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="Counter" type="xsd1:Counter"/>';
			$strToReturn .= '<element name="ImpresoraId" type="xsd:string"/>';
			$strToReturn .= '<element name="Serie" type="xsd:string"/>';
			$strToReturn .= '<element name="ConseFactura" type="xsd:int"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Caja', $strComplexTypeArray)) {
				$strComplexTypeArray['Caja'] = Caja::GetSoapComplexTypeXml();
				Counter::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Caja::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Caja();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if ((property_exists($objSoapObject, 'Counter')) &&
				($objSoapObject->Counter))
				$objToReturn->Counter = Counter::GetObjectFromSoapObject($objSoapObject->Counter);
			if (property_exists($objSoapObject, 'ImpresoraId'))
				$objToReturn->strImpresoraId = $objSoapObject->ImpresoraId;
			if (property_exists($objSoapObject, 'Serie'))
				$objToReturn->strSerie = $objSoapObject->Serie;
			if (property_exists($objSoapObject, 'ConseFactura'))
				$objToReturn->intConseFactura = $objSoapObject->ConseFactura;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->strDeletedAt = $objSoapObject->DeletedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, 'DeletedBy'))
				$objToReturn->intDeletedBy = $objSoapObject->DeletedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Caja::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCounter)
				$objObject->objCounter = Counter::GetSoapObjectFromObject($objObject->objCounter, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCounterId = null;
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
			$iArray['CounterId'] = $this->intCounterId;
			$iArray['ImpresoraId'] = $this->strImpresoraId;
			$iArray['Serie'] = $this->strSerie;
			$iArray['ConseFactura'] = $this->intConseFactura;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
			$iArray['DeletedAt'] = $this->strDeletedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
			$iArray['DeletedBy'] = $this->intDeletedBy;
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
     * @property-read QQNode $CounterId
     * @property-read QQNodeCounter $Counter
     * @property-read QQNode $ImpresoraId
     * @property-read QQNode $Serie
     * @property-read QQNode $ConseFactura
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeCobranza $Cobranza
     * @property-read QQReverseReferenceNodeFactura $Factura
     * @property-read QQReverseReferenceNodeFacturaPagos $FacturaPagos
     * @property-read QQReverseReferenceNodeFacturaPmn $FacturaPmn
     * @property-read QQReverseReferenceNodeFacturas $Facturas
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCredito

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeCaja extends QQNode {
		protected $strTableName = 'caja';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Caja';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'CounterId':
					return new QQNode('counter_id', 'CounterId', 'Integer', $this);
				case 'Counter':
					return new QQNodeCounter('counter_id', 'Counter', 'Integer', $this);
				case 'ImpresoraId':
					return new QQNode('impresora_id', 'ImpresoraId', 'VarChar', $this);
				case 'Serie':
					return new QQNode('serie', 'Serie', 'VarChar', $this);
				case 'ConseFactura':
					return new QQNode('conse_factura', 'ConseFactura', 'Integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'Cobranza':
					return new QQReverseReferenceNodeCobranza($this, 'cobranza', 'reverse_reference', 'caja_id', 'Cobranza');
				case 'Factura':
					return new QQReverseReferenceNodeFactura($this, 'factura', 'reverse_reference', 'caja_id', 'Factura');
				case 'FacturaPagos':
					return new QQReverseReferenceNodeFacturaPagos($this, 'facturapagos', 'reverse_reference', 'caja_id', 'FacturaPagos');
				case 'FacturaPmn':
					return new QQReverseReferenceNodeFacturaPmn($this, 'facturapmn', 'reverse_reference', 'caja_id', 'FacturaPmn');
				case 'Facturas':
					return new QQReverseReferenceNodeFacturas($this, 'facturas', 'reverse_reference', 'caja_id', 'Facturas');
				case 'NotaCredito':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacredito', 'reverse_reference', 'caja_id', 'NotaCredito');

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
     * @property-read QQNode $CounterId
     * @property-read QQNodeCounter $Counter
     * @property-read QQNode $ImpresoraId
     * @property-read QQNode $Serie
     * @property-read QQNode $ConseFactura
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeCobranza $Cobranza
     * @property-read QQReverseReferenceNodeFactura $Factura
     * @property-read QQReverseReferenceNodeFacturaPagos $FacturaPagos
     * @property-read QQReverseReferenceNodeFacturaPmn $FacturaPmn
     * @property-read QQReverseReferenceNodeFacturas $Facturas
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCredito

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeCaja extends QQReverseReferenceNode {
		protected $strTableName = 'caja';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Caja';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'CounterId':
					return new QQNode('counter_id', 'CounterId', 'integer', $this);
				case 'Counter':
					return new QQNodeCounter('counter_id', 'Counter', 'integer', $this);
				case 'ImpresoraId':
					return new QQNode('impresora_id', 'ImpresoraId', 'string', $this);
				case 'Serie':
					return new QQNode('serie', 'Serie', 'string', $this);
				case 'ConseFactura':
					return new QQNode('conse_factura', 'ConseFactura', 'integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'Cobranza':
					return new QQReverseReferenceNodeCobranza($this, 'cobranza', 'reverse_reference', 'caja_id', 'Cobranza');
				case 'Factura':
					return new QQReverseReferenceNodeFactura($this, 'factura', 'reverse_reference', 'caja_id', 'Factura');
				case 'FacturaPagos':
					return new QQReverseReferenceNodeFacturaPagos($this, 'facturapagos', 'reverse_reference', 'caja_id', 'FacturaPagos');
				case 'FacturaPmn':
					return new QQReverseReferenceNodeFacturaPmn($this, 'facturapmn', 'reverse_reference', 'caja_id', 'FacturaPmn');
				case 'Facturas':
					return new QQReverseReferenceNodeFacturas($this, 'facturas', 'reverse_reference', 'caja_id', 'Facturas');
				case 'NotaCredito':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacredito', 'reverse_reference', 'caja_id', 'NotaCredito');

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
