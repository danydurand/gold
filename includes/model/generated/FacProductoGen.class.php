<?php
	/**
	 * The abstract FacProductoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacProducto subclass which
	 * extends this FacProductoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacProducto class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiProd the value for intCodiProd (Read-Only PK)
	 * @property string $SiglProd the value for strSiglProd (Unique)
	 * @property string $DescProd the value for strDescProd (Not Null)
	 * @property string $TipoProd the value for strTipoProd (Not Null)
	 * @property integer $CodiCate the value for intCodiCate (Not Null)
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property string $TextObse the value for strTextObse 
	 * @property FacTipoProd $TipoProdObject the value for the FacTipoProd object referenced by strTipoProd (Not Null)
	 * @property FacCategoriaProd $CodiCateObject the value for the FacCategoriaProd object referenced by intCodiCate (Not Null)
	 * @property-read FacTarifaPeso $_FacTarifaPesoAsCodiProd the value for the private _objFacTarifaPesoAsCodiProd (Read-Only) if set due to an expansion on the fac_tarifa_peso.codi_prod reverse relationship
	 * @property-read FacTarifaPeso[] $_FacTarifaPesoAsCodiProdArray the value for the private _objFacTarifaPesoAsCodiProdArray (Read-Only) if set due to an ExpandAsArray on the fac_tarifa_peso.codi_prod reverse relationship
	 * @property-read FacTarifaProd $_FacTarifaProdAsCodiProd the value for the private _objFacTarifaProdAsCodiProd (Read-Only) if set due to an expansion on the fac_tarifa_prod.codi_prod reverse relationship
	 * @property-read FacTarifaProd[] $_FacTarifaProdAsCodiProdArray the value for the private _objFacTarifaProdAsCodiProdArray (Read-Only) if set due to an ExpandAsArray on the fac_tarifa_prod.codi_prod reverse relationship
	 * @property-read Guia $_GuiaAsProducto the value for the private _objGuiaAsProducto (Read-Only) if set due to an expansion on the guia.producto_id reverse relationship
	 * @property-read Guia[] $_GuiaAsProductoArray the value for the private _objGuiaAsProductoArray (Read-Only) if set due to an ExpandAsArray on the guia.producto_id reverse relationship
	 * @property-read Manifiesto $_ManifiestoAsProducto the value for the private _objManifiestoAsProducto (Read-Only) if set due to an expansion on the manifiesto.producto_id reverse relationship
	 * @property-read Manifiesto[] $_ManifiestoAsProductoArray the value for the private _objManifiestoAsProductoArray (Read-Only) if set due to an ExpandAsArray on the manifiesto.producto_id reverse relationship
	 * @property-read SreGuia $_SreGuiaAsCodiProd the value for the private _objSreGuiaAsCodiProd (Read-Only) if set due to an expansion on the sre_guia.codi_prod reverse relationship
	 * @property-read SreGuia[] $_SreGuiaAsCodiProdArray the value for the private _objSreGuiaAsCodiProdArray (Read-Only) if set due to an ExpandAsArray on the sre_guia.codi_prod reverse relationship
	 * @property-read TarifaI $_TarifaIAsProducto the value for the private _objTarifaIAsProducto (Read-Only) if set due to an expansion on the tarifa_i.producto_id reverse relationship
	 * @property-read TarifaI[] $_TarifaIAsProductoArray the value for the private _objTarifaIAsProductoArray (Read-Only) if set due to an ExpandAsArray on the tarifa_i.producto_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacProductoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column fac_producto.codi_prod
		 * @var integer intCodiProd
		 */
		protected $intCodiProd;
		const CodiProdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_producto.sigl_prod
		 * @var string strSiglProd
		 */
		protected $strSiglProd;
		const SiglProdMaxLength = 10;
		const SiglProdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_producto.desc_prod
		 * @var string strDescProd
		 */
		protected $strDescProd;
		const DescProdMaxLength = 50;
		const DescProdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_producto.tipo_prod
		 * @var string strTipoProd
		 */
		protected $strTipoProd;
		const TipoProdMaxLength = 3;
		const TipoProdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_producto.codi_cate
		 * @var integer intCodiCate
		 */
		protected $intCodiCate;
		const CodiCateDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_producto.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_producto.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Private member variable that stores a reference to a single FacTarifaPesoAsCodiProd object
		 * (of type FacTarifaPeso), if this FacProducto object was restored with
		 * an expansion on the fac_tarifa_peso association table.
		 * @var FacTarifaPeso _objFacTarifaPesoAsCodiProd;
		 */
		private $_objFacTarifaPesoAsCodiProd;

		/**
		 * Private member variable that stores a reference to an array of FacTarifaPesoAsCodiProd objects
		 * (of type FacTarifaPeso[]), if this FacProducto object was restored with
		 * an ExpandAsArray on the fac_tarifa_peso association table.
		 * @var FacTarifaPeso[] _objFacTarifaPesoAsCodiProdArray;
		 */
		private $_objFacTarifaPesoAsCodiProdArray = null;

		/**
		 * Private member variable that stores a reference to a single FacTarifaProdAsCodiProd object
		 * (of type FacTarifaProd), if this FacProducto object was restored with
		 * an expansion on the fac_tarifa_prod association table.
		 * @var FacTarifaProd _objFacTarifaProdAsCodiProd;
		 */
		private $_objFacTarifaProdAsCodiProd;

		/**
		 * Private member variable that stores a reference to an array of FacTarifaProdAsCodiProd objects
		 * (of type FacTarifaProd[]), if this FacProducto object was restored with
		 * an ExpandAsArray on the fac_tarifa_prod association table.
		 * @var FacTarifaProd[] _objFacTarifaProdAsCodiProdArray;
		 */
		private $_objFacTarifaProdAsCodiProdArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaAsProducto object
		 * (of type Guia), if this FacProducto object was restored with
		 * an expansion on the guia association table.
		 * @var Guia _objGuiaAsProducto;
		 */
		private $_objGuiaAsProducto;

		/**
		 * Private member variable that stores a reference to an array of GuiaAsProducto objects
		 * (of type Guia[]), if this FacProducto object was restored with
		 * an ExpandAsArray on the guia association table.
		 * @var Guia[] _objGuiaAsProductoArray;
		 */
		private $_objGuiaAsProductoArray = null;

		/**
		 * Private member variable that stores a reference to a single ManifiestoAsProducto object
		 * (of type Manifiesto), if this FacProducto object was restored with
		 * an expansion on the manifiesto association table.
		 * @var Manifiesto _objManifiestoAsProducto;
		 */
		private $_objManifiestoAsProducto;

		/**
		 * Private member variable that stores a reference to an array of ManifiestoAsProducto objects
		 * (of type Manifiesto[]), if this FacProducto object was restored with
		 * an ExpandAsArray on the manifiesto association table.
		 * @var Manifiesto[] _objManifiestoAsProductoArray;
		 */
		private $_objManifiestoAsProductoArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaAsCodiProd object
		 * (of type SreGuia), if this FacProducto object was restored with
		 * an expansion on the sre_guia association table.
		 * @var SreGuia _objSreGuiaAsCodiProd;
		 */
		private $_objSreGuiaAsCodiProd;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaAsCodiProd objects
		 * (of type SreGuia[]), if this FacProducto object was restored with
		 * an ExpandAsArray on the sre_guia association table.
		 * @var SreGuia[] _objSreGuiaAsCodiProdArray;
		 */
		private $_objSreGuiaAsCodiProdArray = null;

		/**
		 * Private member variable that stores a reference to a single TarifaIAsProducto object
		 * (of type TarifaI), if this FacProducto object was restored with
		 * an expansion on the tarifa_i association table.
		 * @var TarifaI _objTarifaIAsProducto;
		 */
		private $_objTarifaIAsProducto;

		/**
		 * Private member variable that stores a reference to an array of TarifaIAsProducto objects
		 * (of type TarifaI[]), if this FacProducto object was restored with
		 * an ExpandAsArray on the tarifa_i association table.
		 * @var TarifaI[] _objTarifaIAsProductoArray;
		 */
		private $_objTarifaIAsProductoArray = null;

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
		 * in the database column fac_producto.tipo_prod.
		 *
		 * NOTE: Always use the TipoProdObject property getter to correctly retrieve this FacTipoProd object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacTipoProd objTipoProdObject
		 */
		protected $objTipoProdObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column fac_producto.codi_cate.
		 *
		 * NOTE: Always use the CodiCateObject property getter to correctly retrieve this FacCategoriaProd object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacCategoriaProd objCodiCateObject
		 */
		protected $objCodiCateObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiProd = FacProducto::CodiProdDefault;
			$this->strSiglProd = FacProducto::SiglProdDefault;
			$this->strDescProd = FacProducto::DescProdDefault;
			$this->strTipoProd = FacProducto::TipoProdDefault;
			$this->intCodiCate = FacProducto::CodiCateDefault;
			$this->intCodiStat = FacProducto::CodiStatDefault;
			$this->strTextObse = FacProducto::TextObseDefault;
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
		 * Load a FacProducto from PK Info
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto
		 */
		public static function Load($intCodiProd, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacProducto', $intCodiProd);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacProducto::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacProducto()->CodiProd, $intCodiProd)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacProductos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacProducto::QueryArray to perform the LoadAll query
			try {
				return FacProducto::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacProductos
		 * @return int
		 */
		public static function CountAll() {
			// Call FacProducto::QueryCount to perform the CountAll query
			return FacProducto::QueryCount(QQ::All());
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
			$objDatabase = FacProducto::GetDatabase();

			// Create/Build out the QueryBuilder object with FacProducto-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_producto');

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
				FacProducto::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_producto');

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
		 * Static Qcubed Query method to query for a single FacProducto object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacProducto the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacProducto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacProducto object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacProducto::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiProd][] = $objItem;
		
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
				return FacProducto::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacProducto objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacProducto[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacProducto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacProducto::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacProducto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacProducto objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacProducto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacProducto::GetDatabase();

			$strQuery = FacProducto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facproducto', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacProducto::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacProducto
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_producto';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_prod', $strAliasPrefix . 'codi_prod');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_prod', $strAliasPrefix . 'codi_prod');
			    $objBuilder->AddSelectItem($strTableName, 'sigl_prod', $strAliasPrefix . 'sigl_prod');
			    $objBuilder->AddSelectItem($strTableName, 'desc_prod', $strAliasPrefix . 'desc_prod');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_prod', $strAliasPrefix . 'tipo_prod');
			    $objBuilder->AddSelectItem($strTableName, 'codi_cate', $strAliasPrefix . 'codi_cate');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
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
			
			$strAlias = $strAliasPrefix . 'codi_prod';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiProd != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a FacProducto from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacProducto::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacProducto, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_prod']) ? $strColumnAliasArray['codi_prod'] : 'codi_prod';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (FacProducto::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacProducto object
			$objToReturn = new FacProducto();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiProd = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sigl_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSiglProd = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescProd = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoProd = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_cate';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiCate = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiProd != $objPreviousItem->CodiProd) {
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
				$strAliasPrefix = 'fac_producto__';

			// Check for TipoProdObject Early Binding
			$strAlias = $strAliasPrefix . 'tipo_prod__tipo_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tipo_prod']) ? null : $objExpansionAliasArray['tipo_prod']);
				$objToReturn->objTipoProdObject = FacTipoProd::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tipo_prod__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiCateObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_cate__codi_cate';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_cate']) ? null : $objExpansionAliasArray['codi_cate']);
				$objToReturn->objCodiCateObject = FacCategoriaProd::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_cate__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for FacTarifaPesoAsCodiProd Virtual Binding
			$strAlias = $strAliasPrefix . 'factarifapesoascodiprod__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factarifapesoascodiprod']) ? null : $objExpansionAliasArray['factarifapesoascodiprod']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacTarifaPesoAsCodiProdArray)
				$objToReturn->_objFacTarifaPesoAsCodiProdArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacTarifaPesoAsCodiProdArray[] = FacTarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifapesoascodiprod__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacTarifaPesoAsCodiProd)) {
					$objToReturn->_objFacTarifaPesoAsCodiProd = FacTarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifapesoascodiprod__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacTarifaProdAsCodiProd Virtual Binding
			$strAlias = $strAliasPrefix . 'factarifaprodascodiprod__codi_tari';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factarifaprodascodiprod']) ? null : $objExpansionAliasArray['factarifaprodascodiprod']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacTarifaProdAsCodiProdArray)
				$objToReturn->_objFacTarifaProdAsCodiProdArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacTarifaProdAsCodiProdArray[] = FacTarifaProd::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifaprodascodiprod__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacTarifaProdAsCodiProd)) {
					$objToReturn->_objFacTarifaProdAsCodiProd = FacTarifaProd::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifaprodascodiprod__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaAsProducto Virtual Binding
			$strAlias = $strAliasPrefix . 'guiaasproducto__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiaasproducto']) ? null : $objExpansionAliasArray['guiaasproducto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaAsProductoArray)
				$objToReturn->_objGuiaAsProductoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaAsProductoArray[] = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaasproducto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaAsProducto)) {
					$objToReturn->_objGuiaAsProducto = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaasproducto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ManifiestoAsProducto Virtual Binding
			$strAlias = $strAliasPrefix . 'manifiestoasproducto__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['manifiestoasproducto']) ? null : $objExpansionAliasArray['manifiestoasproducto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objManifiestoAsProductoArray)
				$objToReturn->_objManifiestoAsProductoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objManifiestoAsProductoArray[] = Manifiesto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoasproducto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objManifiestoAsProducto)) {
					$objToReturn->_objManifiestoAsProducto = Manifiesto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoasproducto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SreGuiaAsCodiProd Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiaascodiprod__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiaascodiprod']) ? null : $objExpansionAliasArray['sreguiaascodiprod']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaAsCodiProdArray)
				$objToReturn->_objSreGuiaAsCodiProdArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaAsCodiProdArray[] = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaascodiprod__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaAsCodiProd)) {
					$objToReturn->_objSreGuiaAsCodiProd = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaascodiprod__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for TarifaIAsProducto Virtual Binding
			$strAlias = $strAliasPrefix . 'tarifaiasproducto__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['tarifaiasproducto']) ? null : $objExpansionAliasArray['tarifaiasproducto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objTarifaIAsProductoArray)
				$objToReturn->_objTarifaIAsProductoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objTarifaIAsProductoArray[] = TarifaI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifaiasproducto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objTarifaIAsProducto)) {
					$objToReturn->_objTarifaIAsProducto = TarifaI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifaiasproducto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacProductos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacProducto[]
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
					$objItem = FacProducto::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiProd][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacProducto::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacProducto object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacProducto next row resulting from the query
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
			return FacProducto::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacProducto object,
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto
		*/
		public static function LoadByCodiProd($intCodiProd, $objOptionalClauses = null) {
			return FacProducto::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacProducto()->CodiProd, $intCodiProd)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single FacProducto object,
		 * by SiglProd Index(es)
		 * @param string $strSiglProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto
		*/
		public static function LoadBySiglProd($strSiglProd, $objOptionalClauses = null) {
			return FacProducto::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacProducto()->SiglProd, $strSiglProd)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FacProducto objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call FacProducto::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return FacProducto::QueryArray(
					QQ::Equal(QQN::FacProducto()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacProductos
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call FacProducto::QueryCount to perform the CountByCodiStat query
			return FacProducto::QueryCount(
				QQ::Equal(QQN::FacProducto()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of FacProducto objects,
		 * by TipoProd Index(es)
		 * @param string $strTipoProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto[]
		*/
		public static function LoadArrayByTipoProd($strTipoProd, $objOptionalClauses = null) {
			// Call FacProducto::QueryArray to perform the LoadArrayByTipoProd query
			try {
				return FacProducto::QueryArray(
					QQ::Equal(QQN::FacProducto()->TipoProd, $strTipoProd),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacProductos
		 * by TipoProd Index(es)
		 * @param string $strTipoProd
		 * @return int
		*/
		public static function CountByTipoProd($strTipoProd) {
			// Call FacProducto::QueryCount to perform the CountByTipoProd query
			return FacProducto::QueryCount(
				QQ::Equal(QQN::FacProducto()->TipoProd, $strTipoProd)
			);
		}

		/**
		 * Load an array of FacProducto objects,
		 * by CodiCate Index(es)
		 * @param integer $intCodiCate
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto[]
		*/
		public static function LoadArrayByCodiCate($intCodiCate, $objOptionalClauses = null) {
			// Call FacProducto::QueryArray to perform the LoadArrayByCodiCate query
			try {
				return FacProducto::QueryArray(
					QQ::Equal(QQN::FacProducto()->CodiCate, $intCodiCate),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacProductos
		 * by CodiCate Index(es)
		 * @param integer $intCodiCate
		 * @return int
		*/
		public static function CountByCodiCate($intCodiCate) {
			// Call FacProducto::QueryCount to perform the CountByCodiCate query
			return FacProducto::QueryCount(
				QQ::Equal(QQN::FacProducto()->CodiCate, $intCodiCate)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacProducto
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_producto` (
							`sigl_prod`,
							`desc_prod`,
							`tipo_prod`,
							`codi_cate`,
							`codi_stat`,
							`text_obse`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strSiglProd) . ',
							' . $objDatabase->SqlVariable($this->strDescProd) . ',
							' . $objDatabase->SqlVariable($this->strTipoProd) . ',
							' . $objDatabase->SqlVariable($this->intCodiCate) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiProd = $objDatabase->InsertId('fac_producto', 'codi_prod');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_producto`
						SET
							`sigl_prod` = ' . $objDatabase->SqlVariable($this->strSiglProd) . ',
							`desc_prod` = ' . $objDatabase->SqlVariable($this->strDescProd) . ',
							`tipo_prod` = ' . $objDatabase->SqlVariable($this->strTipoProd) . ',
							`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . '
						WHERE
							`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
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
		 * Delete this FacProducto
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacProducto with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_producto`
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacProducto ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacProducto', $this->intCodiProd);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacProductos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_producto`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_producto table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_producto`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacProducto from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacProducto object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacProducto::Load($this->intCodiProd);

			// Update $this's local variables to match
			$this->strSiglProd = $objReloaded->strSiglProd;
			$this->strDescProd = $objReloaded->strDescProd;
			$this->TipoProd = $objReloaded->TipoProd;
			$this->CodiCate = $objReloaded->CodiCate;
			$this->CodiStat = $objReloaded->CodiStat;
			$this->strTextObse = $objReloaded->strTextObse;
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
				case 'CodiProd':
					/**
					 * Gets the value for intCodiProd (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiProd;

				case 'SiglProd':
					/**
					 * Gets the value for strSiglProd (Unique)
					 * @return string
					 */
					return $this->strSiglProd;

				case 'DescProd':
					/**
					 * Gets the value for strDescProd (Not Null)
					 * @return string
					 */
					return $this->strDescProd;

				case 'TipoProd':
					/**
					 * Gets the value for strTipoProd (Not Null)
					 * @return string
					 */
					return $this->strTipoProd;

				case 'CodiCate':
					/**
					 * Gets the value for intCodiCate (Not Null)
					 * @return integer
					 */
					return $this->intCodiCate;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;


				///////////////////
				// Member Objects
				///////////////////
				case 'TipoProdObject':
					/**
					 * Gets the value for the FacTipoProd object referenced by strTipoProd (Not Null)
					 * @return FacTipoProd
					 */
					try {
						if ((!$this->objTipoProdObject) && (!is_null($this->strTipoProd)))
							$this->objTipoProdObject = FacTipoProd::Load($this->strTipoProd);
						return $this->objTipoProdObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCateObject':
					/**
					 * Gets the value for the FacCategoriaProd object referenced by intCodiCate (Not Null)
					 * @return FacCategoriaProd
					 */
					try {
						if ((!$this->objCodiCateObject) && (!is_null($this->intCodiCate)))
							$this->objCodiCateObject = FacCategoriaProd::Load($this->intCodiCate);
						return $this->objCodiCateObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FacTarifaPesoAsCodiProd':
					/**
					 * Gets the value for the private _objFacTarifaPesoAsCodiProd (Read-Only)
					 * if set due to an expansion on the fac_tarifa_peso.codi_prod reverse relationship
					 * @return FacTarifaPeso
					 */
					return $this->_objFacTarifaPesoAsCodiProd;

				case '_FacTarifaPesoAsCodiProdArray':
					/**
					 * Gets the value for the private _objFacTarifaPesoAsCodiProdArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_tarifa_peso.codi_prod reverse relationship
					 * @return FacTarifaPeso[]
					 */
					return $this->_objFacTarifaPesoAsCodiProdArray;

				case '_FacTarifaProdAsCodiProd':
					/**
					 * Gets the value for the private _objFacTarifaProdAsCodiProd (Read-Only)
					 * if set due to an expansion on the fac_tarifa_prod.codi_prod reverse relationship
					 * @return FacTarifaProd
					 */
					return $this->_objFacTarifaProdAsCodiProd;

				case '_FacTarifaProdAsCodiProdArray':
					/**
					 * Gets the value for the private _objFacTarifaProdAsCodiProdArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_tarifa_prod.codi_prod reverse relationship
					 * @return FacTarifaProd[]
					 */
					return $this->_objFacTarifaProdAsCodiProdArray;

				case '_GuiaAsProducto':
					/**
					 * Gets the value for the private _objGuiaAsProducto (Read-Only)
					 * if set due to an expansion on the guia.producto_id reverse relationship
					 * @return Guia
					 */
					return $this->_objGuiaAsProducto;

				case '_GuiaAsProductoArray':
					/**
					 * Gets the value for the private _objGuiaAsProductoArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia.producto_id reverse relationship
					 * @return Guia[]
					 */
					return $this->_objGuiaAsProductoArray;

				case '_ManifiestoAsProducto':
					/**
					 * Gets the value for the private _objManifiestoAsProducto (Read-Only)
					 * if set due to an expansion on the manifiesto.producto_id reverse relationship
					 * @return Manifiesto
					 */
					return $this->_objManifiestoAsProducto;

				case '_ManifiestoAsProductoArray':
					/**
					 * Gets the value for the private _objManifiestoAsProductoArray (Read-Only)
					 * if set due to an ExpandAsArray on the manifiesto.producto_id reverse relationship
					 * @return Manifiesto[]
					 */
					return $this->_objManifiestoAsProductoArray;

				case '_SreGuiaAsCodiProd':
					/**
					 * Gets the value for the private _objSreGuiaAsCodiProd (Read-Only)
					 * if set due to an expansion on the sre_guia.codi_prod reverse relationship
					 * @return SreGuia
					 */
					return $this->_objSreGuiaAsCodiProd;

				case '_SreGuiaAsCodiProdArray':
					/**
					 * Gets the value for the private _objSreGuiaAsCodiProdArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia.codi_prod reverse relationship
					 * @return SreGuia[]
					 */
					return $this->_objSreGuiaAsCodiProdArray;

				case '_TarifaIAsProducto':
					/**
					 * Gets the value for the private _objTarifaIAsProducto (Read-Only)
					 * if set due to an expansion on the tarifa_i.producto_id reverse relationship
					 * @return TarifaI
					 */
					return $this->_objTarifaIAsProducto;

				case '_TarifaIAsProductoArray':
					/**
					 * Gets the value for the private _objTarifaIAsProductoArray (Read-Only)
					 * if set due to an ExpandAsArray on the tarifa_i.producto_id reverse relationship
					 * @return TarifaI[]
					 */
					return $this->_objTarifaIAsProductoArray;


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
				case 'SiglProd':
					/**
					 * Sets the value for strSiglProd (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSiglProd = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescProd':
					/**
					 * Sets the value for strDescProd (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescProd = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoProd':
					/**
					 * Sets the value for strTipoProd (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objTipoProdObject = null;
						return ($this->strTipoProd = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCate':
					/**
					 * Sets the value for intCodiCate (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiCateObject = null;
						return ($this->intCodiCate = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiStat':
					/**
					 * Sets the value for intCodiStat (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiStat = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextObse':
					/**
					 * Sets the value for strTextObse 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTextObse = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'TipoProdObject':
					/**
					 * Sets the value for the FacTipoProd object referenced by strTipoProd (Not Null)
					 * @param FacTipoProd $mixValue
					 * @return FacTipoProd
					 */
					if (is_null($mixValue)) {
						$this->strTipoProd = null;
						$this->objTipoProdObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacTipoProd object
						try {
							$mixValue = QType::Cast($mixValue, 'FacTipoProd');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacTipoProd object
						if (is_null($mixValue->TipoProd))
							throw new QCallerException('Unable to set an unsaved TipoProdObject for this FacProducto');

						// Update Local Member Variables
						$this->objTipoProdObject = $mixValue;
						$this->strTipoProd = $mixValue->TipoProd;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiCateObject':
					/**
					 * Sets the value for the FacCategoriaProd object referenced by intCodiCate (Not Null)
					 * @param FacCategoriaProd $mixValue
					 * @return FacCategoriaProd
					 */
					if (is_null($mixValue)) {
						$this->intCodiCate = null;
						$this->objCodiCateObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacCategoriaProd object
						try {
							$mixValue = QType::Cast($mixValue, 'FacCategoriaProd');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacCategoriaProd object
						if (is_null($mixValue->CodiCate))
							throw new QCallerException('Unable to set an unsaved CodiCateObject for this FacProducto');

						// Update Local Member Variables
						$this->objCodiCateObject = $mixValue;
						$this->intCodiCate = $mixValue->CodiCate;

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
			if ($this->CountFacTarifaPesosAsCodiProd()) {
				$arrTablRela[] = 'fac_tarifa_peso';
			}
			if ($this->CountFacTarifaProdsAsCodiProd()) {
				$arrTablRela[] = 'fac_tarifa_prod';
			}
			if ($this->CountGuiasAsProducto()) {
				$arrTablRela[] = 'guia';
			}
			if ($this->CountManifiestosAsProducto()) {
				$arrTablRela[] = 'manifiesto';
			}
			if ($this->CountSreGuiasAsCodiProd()) {
				$arrTablRela[] = 'sre_guia';
			}
			if ($this->CountTarifaIsAsProducto()) {
				$arrTablRela[] = 'tarifa_i';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for FacTarifaPesoAsCodiProd
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacTarifaPesosAsCodiProd as an array of FacTarifaPeso objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public function GetFacTarifaPesoAsCodiProdArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiProd)))
				return array();

			try {
				return FacTarifaPeso::LoadArrayByCodiProd($this->intCodiProd, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacTarifaPesosAsCodiProd
		 * @return int
		*/
		public function CountFacTarifaPesosAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				return 0;

			return FacTarifaPeso::CountByCodiProd($this->intCodiProd);
		}

		/**
		 * Associates a FacTarifaPesoAsCodiProd
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function AssociateFacTarifaPesoAsCodiProd(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaPesoAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaPesoAsCodiProd on this FacProducto with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . '
			');
		}

		/**
		 * Unassociates a FacTarifaPesoAsCodiProd
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function UnassociateFacTarifaPesoAsCodiProd(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsCodiProd on this FacProducto with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`codi_prod` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Unassociates all FacTarifaPesosAsCodiProd
		 * @return void
		*/
		public function UnassociateAllFacTarifaPesosAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsCodiProd on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`codi_prod` = null
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes an associated FacTarifaPesoAsCodiProd
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function DeleteAssociatedFacTarifaPesoAsCodiProd(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsCodiProd on this FacProducto with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes all associated FacTarifaPesosAsCodiProd
		 * @return void
		*/
		public function DeleteAllFacTarifaPesosAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsCodiProd on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}


		// Related Objects' Methods for FacTarifaProdAsCodiProd
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacTarifaProdsAsCodiProd as an array of FacTarifaProd objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd[]
		*/
		public function GetFacTarifaProdAsCodiProdArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiProd)))
				return array();

			try {
				return FacTarifaProd::LoadArrayByCodiProd($this->intCodiProd, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacTarifaProdsAsCodiProd
		 * @return int
		*/
		public function CountFacTarifaProdsAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				return 0;

			return FacTarifaProd::CountByCodiProd($this->intCodiProd);
		}

		/**
		 * Associates a FacTarifaProdAsCodiProd
		 * @param FacTarifaProd $objFacTarifaProd
		 * @return void
		*/
		public function AssociateFacTarifaProdAsCodiProd(FacTarifaProd $objFacTarifaProd) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaProdAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objFacTarifaProd->CodiTari)) || (is_null($objFacTarifaProd->CodiClie)) || (is_null($objFacTarifaProd->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaProdAsCodiProd on this FacProducto with an unsaved FacTarifaProd.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_prod`
				SET
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
				WHERE
					`codi_tari` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiTari) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiClie) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiProd) . '
			');
		}

		/**
		 * Unassociates a FacTarifaProdAsCodiProd
		 * @param FacTarifaProd $objFacTarifaProd
		 * @return void
		*/
		public function UnassociateFacTarifaProdAsCodiProd(FacTarifaProd $objFacTarifaProd) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objFacTarifaProd->CodiTari)) || (is_null($objFacTarifaProd->CodiClie)) || (is_null($objFacTarifaProd->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiProd on this FacProducto with an unsaved FacTarifaProd.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_prod`
				SET
					`codi_prod` = null
				WHERE
					`codi_tari` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiTari) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiClie) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiProd) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Unassociates all FacTarifaProdsAsCodiProd
		 * @return void
		*/
		public function UnassociateAllFacTarifaProdsAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiProd on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_prod`
				SET
					`codi_prod` = null
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes an associated FacTarifaProdAsCodiProd
		 * @param FacTarifaProd $objFacTarifaProd
		 * @return void
		*/
		public function DeleteAssociatedFacTarifaProdAsCodiProd(FacTarifaProd $objFacTarifaProd) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objFacTarifaProd->CodiTari)) || (is_null($objFacTarifaProd->CodiClie)) || (is_null($objFacTarifaProd->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiProd on this FacProducto with an unsaved FacTarifaProd.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_prod`
				WHERE
					`codi_tari` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiTari) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiClie) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiProd) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes all associated FacTarifaProdsAsCodiProd
		 * @return void
		*/
		public function DeleteAllFacTarifaProdsAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiProd on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_prod`
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}


		// Related Objects' Methods for GuiaAsProducto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasAsProducto as an array of Guia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public function GetGuiaAsProductoArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiProd)))
				return array();

			try {
				return Guia::LoadArrayByProductoId($this->intCodiProd, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasAsProducto
		 * @return int
		*/
		public function CountGuiasAsProducto() {
			if ((is_null($this->intCodiProd)))
				return 0;

			return Guia::CountByProductoId($this->intCodiProd);
		}

		/**
		 * Associates a GuiaAsProducto
		 * @param Guia $objGuia
		 * @return void
		*/
		public function AssociateGuiaAsProducto(Guia $objGuia) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsProducto on this unsaved FacProducto.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsProducto on this FacProducto with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a GuiaAsProducto
		 * @param Guia $objGuia
		 * @return void
		*/
		public function UnassociateGuiaAsProducto(Guia $objGuia) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsProducto on this unsaved FacProducto.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsProducto on this FacProducto with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`producto_id` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Unassociates all GuiasAsProducto
		 * @return void
		*/
		public function UnassociateAllGuiasAsProducto() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsProducto on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`producto_id` = null
				WHERE
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes an associated GuiaAsProducto
		 * @param Guia $objGuia
		 * @return void
		*/
		public function DeleteAssociatedGuiaAsProducto(Guia $objGuia) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsProducto on this unsaved FacProducto.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsProducto on this FacProducto with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes all associated GuiasAsProducto
		 * @return void
		*/
		public function DeleteAllGuiasAsProducto() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsProducto on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}


		// Related Objects' Methods for ManifiestoAsProducto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ManifiestosAsProducto as an array of Manifiesto objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Manifiesto[]
		*/
		public function GetManifiestoAsProductoArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiProd)))
				return array();

			try {
				return Manifiesto::LoadArrayByProductoId($this->intCodiProd, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ManifiestosAsProducto
		 * @return int
		*/
		public function CountManifiestosAsProducto() {
			if ((is_null($this->intCodiProd)))
				return 0;

			return Manifiesto::CountByProductoId($this->intCodiProd);
		}

		/**
		 * Associates a ManifiestoAsProducto
		 * @param Manifiesto $objManifiesto
		 * @return void
		*/
		public function AssociateManifiestoAsProducto(Manifiesto $objManifiesto) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoAsProducto on this unsaved FacProducto.');
			if ((is_null($objManifiesto->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoAsProducto on this FacProducto with an unsaved Manifiesto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto`
				SET
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiesto->Id) . '
			');
		}

		/**
		 * Unassociates a ManifiestoAsProducto
		 * @param Manifiesto $objManifiesto
		 * @return void
		*/
		public function UnassociateManifiestoAsProducto(Manifiesto $objManifiesto) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoAsProducto on this unsaved FacProducto.');
			if ((is_null($objManifiesto->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoAsProducto on this FacProducto with an unsaved Manifiesto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto`
				SET
					`producto_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiesto->Id) . ' AND
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Unassociates all ManifiestosAsProducto
		 * @return void
		*/
		public function UnassociateAllManifiestosAsProducto() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoAsProducto on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto`
				SET
					`producto_id` = null
				WHERE
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes an associated ManifiestoAsProducto
		 * @param Manifiesto $objManifiesto
		 * @return void
		*/
		public function DeleteAssociatedManifiestoAsProducto(Manifiesto $objManifiesto) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoAsProducto on this unsaved FacProducto.');
			if ((is_null($objManifiesto->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoAsProducto on this FacProducto with an unsaved Manifiesto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiesto->Id) . ' AND
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes all associated ManifiestosAsProducto
		 * @return void
		*/
		public function DeleteAllManifiestosAsProducto() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoAsProducto on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto`
				WHERE
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}


		// Related Objects' Methods for SreGuiaAsCodiProd
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiasAsCodiProd as an array of SreGuia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public function GetSreGuiaAsCodiProdArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiProd)))
				return array();

			try {
				return SreGuia::LoadArrayByCodiProd($this->intCodiProd, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiasAsCodiProd
		 * @return int
		*/
		public function CountSreGuiasAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				return 0;

			return SreGuia::CountByCodiProd($this->intCodiProd);
		}

		/**
		 * Associates a SreGuiaAsCodiProd
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function AssociateSreGuiaAsCodiProd(SreGuia $objSreGuia) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsCodiProd on this FacProducto with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a SreGuiaAsCodiProd
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function UnassociateSreGuiaAsCodiProd(SreGuia $objSreGuia) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCodiProd on this FacProducto with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`codi_prod` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Unassociates all SreGuiasAsCodiProd
		 * @return void
		*/
		public function UnassociateAllSreGuiasAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCodiProd on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`codi_prod` = null
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaAsCodiProd
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaAsCodiProd(SreGuia $objSreGuia) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCodiProd on this unsaved FacProducto.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCodiProd on this FacProducto with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes all associated SreGuiasAsCodiProd
		 * @return void
		*/
		public function DeleteAllSreGuiasAsCodiProd() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCodiProd on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}


		// Related Objects' Methods for TarifaIAsProducto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TarifaIsAsProducto as an array of TarifaI objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaI[]
		*/
		public function GetTarifaIAsProductoArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiProd)))
				return array();

			try {
				return TarifaI::LoadArrayByProductoId($this->intCodiProd, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TarifaIsAsProducto
		 * @return int
		*/
		public function CountTarifaIsAsProducto() {
			if ((is_null($this->intCodiProd)))
				return 0;

			return TarifaI::CountByProductoId($this->intCodiProd);
		}

		/**
		 * Associates a TarifaIAsProducto
		 * @param TarifaI $objTarifaI
		 * @return void
		*/
		public function AssociateTarifaIAsProducto(TarifaI $objTarifaI) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTarifaIAsProducto on this unsaved FacProducto.');
			if ((is_null($objTarifaI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTarifaIAsProducto on this FacProducto with an unsaved TarifaI.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_i`
				SET
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaI->Id) . '
			');
		}

		/**
		 * Unassociates a TarifaIAsProducto
		 * @param TarifaI $objTarifaI
		 * @return void
		*/
		public function UnassociateTarifaIAsProducto(TarifaI $objTarifaI) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaIAsProducto on this unsaved FacProducto.');
			if ((is_null($objTarifaI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaIAsProducto on this FacProducto with an unsaved TarifaI.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_i`
				SET
					`producto_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaI->Id) . ' AND
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Unassociates all TarifaIsAsProducto
		 * @return void
		*/
		public function UnassociateAllTarifaIsAsProducto() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaIAsProducto on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_i`
				SET
					`producto_id` = null
				WHERE
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes an associated TarifaIAsProducto
		 * @param TarifaI $objTarifaI
		 * @return void
		*/
		public function DeleteAssociatedTarifaIAsProducto(TarifaI $objTarifaI) {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaIAsProducto on this unsaved FacProducto.');
			if ((is_null($objTarifaI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaIAsProducto on this FacProducto with an unsaved TarifaI.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_i`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaI->Id) . ' AND
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
			');
		}

		/**
		 * Deletes all associated TarifaIsAsProducto
		 * @return void
		*/
		public function DeleteAllTarifaIsAsProducto() {
			if ((is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaIAsProducto on this unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacProducto::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_i`
				WHERE
					`producto_id` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
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
			return "fac_producto";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacProducto::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacProducto"><sequence>';
			$strToReturn .= '<element name="CodiProd" type="xsd:int"/>';
			$strToReturn .= '<element name="SiglProd" type="xsd:string"/>';
			$strToReturn .= '<element name="DescProd" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoProdObject" type="xsd1:FacTipoProd"/>';
			$strToReturn .= '<element name="CodiCateObject" type="xsd1:FacCategoriaProd"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacProducto', $strComplexTypeArray)) {
				$strComplexTypeArray['FacProducto'] = FacProducto::GetSoapComplexTypeXml();
				FacTipoProd::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacCategoriaProd::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacProducto::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacProducto();
			if (property_exists($objSoapObject, 'CodiProd'))
				$objToReturn->intCodiProd = $objSoapObject->CodiProd;
			if (property_exists($objSoapObject, 'SiglProd'))
				$objToReturn->strSiglProd = $objSoapObject->SiglProd;
			if (property_exists($objSoapObject, 'DescProd'))
				$objToReturn->strDescProd = $objSoapObject->DescProd;
			if ((property_exists($objSoapObject, 'TipoProdObject')) &&
				($objSoapObject->TipoProdObject))
				$objToReturn->TipoProdObject = FacTipoProd::GetObjectFromSoapObject($objSoapObject->TipoProdObject);
			if ((property_exists($objSoapObject, 'CodiCateObject')) &&
				($objSoapObject->CodiCateObject))
				$objToReturn->CodiCateObject = FacCategoriaProd::GetObjectFromSoapObject($objSoapObject->CodiCateObject);
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacProducto::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objTipoProdObject)
				$objObject->objTipoProdObject = FacTipoProd::GetSoapObjectFromObject($objObject->objTipoProdObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strTipoProd = null;
			if ($objObject->objCodiCateObject)
				$objObject->objCodiCateObject = FacCategoriaProd::GetSoapObjectFromObject($objObject->objCodiCateObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiCate = null;
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
			$iArray['CodiProd'] = $this->intCodiProd;
			$iArray['SiglProd'] = $this->strSiglProd;
			$iArray['DescProd'] = $this->strDescProd;
			$iArray['TipoProd'] = $this->strTipoProd;
			$iArray['CodiCate'] = $this->intCodiCate;
			$iArray['CodiStat'] = $this->intCodiStat;
			$iArray['TextObse'] = $this->strTextObse;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiProd ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiProd
     * @property-read QQNode $SiglProd
     * @property-read QQNode $DescProd
     * @property-read QQNode $TipoProd
     * @property-read QQNodeFacTipoProd $TipoProdObject
     * @property-read QQNode $CodiCate
     * @property-read QQNodeFacCategoriaProd $CodiCateObject
     * @property-read QQNode $CodiStat
     * @property-read QQNode $TextObse
     *
     *
     * @property-read QQReverseReferenceNodeFacTarifaPeso $FacTarifaPesoAsCodiProd
     * @property-read QQReverseReferenceNodeFacTarifaProd $FacTarifaProdAsCodiProd
     * @property-read QQReverseReferenceNodeGuia $GuiaAsProducto
     * @property-read QQReverseReferenceNodeManifiesto $ManifiestoAsProducto
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsCodiProd
     * @property-read QQReverseReferenceNodeTarifaI $TarifaIAsProducto

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacProducto extends QQNode {
		protected $strTableName = 'fac_producto';
		protected $strPrimaryKey = 'codi_prod';
		protected $strClassName = 'FacProducto';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'Integer', $this);
				case 'SiglProd':
					return new QQNode('sigl_prod', 'SiglProd', 'VarChar', $this);
				case 'DescProd':
					return new QQNode('desc_prod', 'DescProd', 'VarChar', $this);
				case 'TipoProd':
					return new QQNode('tipo_prod', 'TipoProd', 'VarChar', $this);
				case 'TipoProdObject':
					return new QQNodeFacTipoProd('tipo_prod', 'TipoProdObject', 'VarChar', $this);
				case 'CodiCate':
					return new QQNode('codi_cate', 'CodiCate', 'Integer', $this);
				case 'CodiCateObject':
					return new QQNodeFacCategoriaProd('codi_cate', 'CodiCateObject', 'Integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'FacTarifaPesoAsCodiProd':
					return new QQReverseReferenceNodeFacTarifaPeso($this, 'factarifapesoascodiprod', 'reverse_reference', 'codi_prod', 'FacTarifaPesoAsCodiProd');
				case 'FacTarifaProdAsCodiProd':
					return new QQReverseReferenceNodeFacTarifaProd($this, 'factarifaprodascodiprod', 'reverse_reference', 'codi_prod', 'FacTarifaProdAsCodiProd');
				case 'GuiaAsProducto':
					return new QQReverseReferenceNodeGuia($this, 'guiaasproducto', 'reverse_reference', 'producto_id', 'GuiaAsProducto');
				case 'ManifiestoAsProducto':
					return new QQReverseReferenceNodeManifiesto($this, 'manifiestoasproducto', 'reverse_reference', 'producto_id', 'ManifiestoAsProducto');
				case 'SreGuiaAsCodiProd':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaascodiprod', 'reverse_reference', 'codi_prod', 'SreGuiaAsCodiProd');
				case 'TarifaIAsProducto':
					return new QQReverseReferenceNodeTarifaI($this, 'tarifaiasproducto', 'reverse_reference', 'producto_id', 'TarifaIAsProducto');

				case '_PrimaryKeyNode':
					return new QQNode('codi_prod', 'CodiProd', 'Integer', $this);
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
     * @property-read QQNode $CodiProd
     * @property-read QQNode $SiglProd
     * @property-read QQNode $DescProd
     * @property-read QQNode $TipoProd
     * @property-read QQNodeFacTipoProd $TipoProdObject
     * @property-read QQNode $CodiCate
     * @property-read QQNodeFacCategoriaProd $CodiCateObject
     * @property-read QQNode $CodiStat
     * @property-read QQNode $TextObse
     *
     *
     * @property-read QQReverseReferenceNodeFacTarifaPeso $FacTarifaPesoAsCodiProd
     * @property-read QQReverseReferenceNodeFacTarifaProd $FacTarifaProdAsCodiProd
     * @property-read QQReverseReferenceNodeGuia $GuiaAsProducto
     * @property-read QQReverseReferenceNodeManifiesto $ManifiestoAsProducto
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsCodiProd
     * @property-read QQReverseReferenceNodeTarifaI $TarifaIAsProducto

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacProducto extends QQReverseReferenceNode {
		protected $strTableName = 'fac_producto';
		protected $strPrimaryKey = 'codi_prod';
		protected $strClassName = 'FacProducto';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'integer', $this);
				case 'SiglProd':
					return new QQNode('sigl_prod', 'SiglProd', 'string', $this);
				case 'DescProd':
					return new QQNode('desc_prod', 'DescProd', 'string', $this);
				case 'TipoProd':
					return new QQNode('tipo_prod', 'TipoProd', 'string', $this);
				case 'TipoProdObject':
					return new QQNodeFacTipoProd('tipo_prod', 'TipoProdObject', 'string', $this);
				case 'CodiCate':
					return new QQNode('codi_cate', 'CodiCate', 'integer', $this);
				case 'CodiCateObject':
					return new QQNodeFacCategoriaProd('codi_cate', 'CodiCateObject', 'integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'FacTarifaPesoAsCodiProd':
					return new QQReverseReferenceNodeFacTarifaPeso($this, 'factarifapesoascodiprod', 'reverse_reference', 'codi_prod', 'FacTarifaPesoAsCodiProd');
				case 'FacTarifaProdAsCodiProd':
					return new QQReverseReferenceNodeFacTarifaProd($this, 'factarifaprodascodiprod', 'reverse_reference', 'codi_prod', 'FacTarifaProdAsCodiProd');
				case 'GuiaAsProducto':
					return new QQReverseReferenceNodeGuia($this, 'guiaasproducto', 'reverse_reference', 'producto_id', 'GuiaAsProducto');
				case 'ManifiestoAsProducto':
					return new QQReverseReferenceNodeManifiesto($this, 'manifiestoasproducto', 'reverse_reference', 'producto_id', 'ManifiestoAsProducto');
				case 'SreGuiaAsCodiProd':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaascodiprod', 'reverse_reference', 'codi_prod', 'SreGuiaAsCodiProd');
				case 'TarifaIAsProducto':
					return new QQReverseReferenceNodeTarifaI($this, 'tarifaiasproducto', 'reverse_reference', 'producto_id', 'TarifaIAsProducto');

				case '_PrimaryKeyNode':
					return new QQNode('codi_prod', 'CodiProd', 'integer', $this);
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
