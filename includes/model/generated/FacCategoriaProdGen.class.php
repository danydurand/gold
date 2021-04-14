<?php
	/**
	 * The abstract FacCategoriaProdGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacCategoriaProd subclass which
	 * extends this FacCategoriaProdGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacCategoriaProd class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiCate the value for intCodiCate (Read-Only PK)
	 * @property string $DescCate the value for strDescCate (Not Null)
	 * @property double $FranPost the value for fltFranPost (Not Null)
	 * @property-read FacProducto $_FacProductoAsCodiCate the value for the private _objFacProductoAsCodiCate (Read-Only) if set due to an expansion on the fac_producto.codi_cate reverse relationship
	 * @property-read FacProducto[] $_FacProductoAsCodiCateArray the value for the private _objFacProductoAsCodiCateArray (Read-Only) if set due to an ExpandAsArray on the fac_producto.codi_cate reverse relationship
	 * @property-read MasCartaDevo $_MasCartaDevoAsCodiCate the value for the private _objMasCartaDevoAsCodiCate (Read-Only) if set due to an expansion on the mas_carta_devo.codi_cate reverse relationship
	 * @property-read MasCartaDevo[] $_MasCartaDevoAsCodiCateArray the value for the private _objMasCartaDevoAsCodiCateArray (Read-Only) if set due to an ExpandAsArray on the mas_carta_devo.codi_cate reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacCategoriaProdGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column fac_categoria_prod.codi_cate
		 * @var integer intCodiCate
		 */
		protected $intCodiCate;
		const CodiCateDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_categoria_prod.desc_cate
		 * @var string strDescCate
		 */
		protected $strDescCate;
		const DescCateMaxLength = 200;
		const DescCateDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_categoria_prod.fran_post
		 * @var double fltFranPost
		 */
		protected $fltFranPost;
		const FranPostDefault = null;


		/**
		 * Private member variable that stores a reference to a single FacProductoAsCodiCate object
		 * (of type FacProducto), if this FacCategoriaProd object was restored with
		 * an expansion on the fac_producto association table.
		 * @var FacProducto _objFacProductoAsCodiCate;
		 */
		private $_objFacProductoAsCodiCate;

		/**
		 * Private member variable that stores a reference to an array of FacProductoAsCodiCate objects
		 * (of type FacProducto[]), if this FacCategoriaProd object was restored with
		 * an ExpandAsArray on the fac_producto association table.
		 * @var FacProducto[] _objFacProductoAsCodiCateArray;
		 */
		private $_objFacProductoAsCodiCateArray = null;

		/**
		 * Private member variable that stores a reference to a single MasCartaDevoAsCodiCate object
		 * (of type MasCartaDevo), if this FacCategoriaProd object was restored with
		 * an expansion on the mas_carta_devo association table.
		 * @var MasCartaDevo _objMasCartaDevoAsCodiCate;
		 */
		private $_objMasCartaDevoAsCodiCate;

		/**
		 * Private member variable that stores a reference to an array of MasCartaDevoAsCodiCate objects
		 * (of type MasCartaDevo[]), if this FacCategoriaProd object was restored with
		 * an ExpandAsArray on the mas_carta_devo association table.
		 * @var MasCartaDevo[] _objMasCartaDevoAsCodiCateArray;
		 */
		private $_objMasCartaDevoAsCodiCateArray = null;

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
			$this->intCodiCate = FacCategoriaProd::CodiCateDefault;
			$this->strDescCate = FacCategoriaProd::DescCateDefault;
			$this->fltFranPost = FacCategoriaProd::FranPostDefault;
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
		 * Load a FacCategoriaProd from PK Info
		 * @param integer $intCodiCate
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacCategoriaProd
		 */
		public static function Load($intCodiCate, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacCategoriaProd', $intCodiCate);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacCategoriaProd::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacCategoriaProd()->CodiCate, $intCodiCate)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacCategoriaProds
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacCategoriaProd[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacCategoriaProd::QueryArray to perform the LoadAll query
			try {
				return FacCategoriaProd::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacCategoriaProds
		 * @return int
		 */
		public static function CountAll() {
			// Call FacCategoriaProd::QueryCount to perform the CountAll query
			return FacCategoriaProd::QueryCount(QQ::All());
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
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Create/Build out the QueryBuilder object with FacCategoriaProd-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_categoria_prod');

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
				FacCategoriaProd::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_categoria_prod');

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
		 * Static Qcubed Query method to query for a single FacCategoriaProd object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacCategoriaProd the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacCategoriaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacCategoriaProd object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacCategoriaProd::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiCate][] = $objItem;
		
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
				return FacCategoriaProd::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacCategoriaProd objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacCategoriaProd[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacCategoriaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacCategoriaProd::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacCategoriaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacCategoriaProd objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacCategoriaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacCategoriaProd::GetDatabase();

			$strQuery = FacCategoriaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/faccategoriaprod', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacCategoriaProd::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacCategoriaProd
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_categoria_prod';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_cate', $strAliasPrefix . 'codi_cate');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_cate', $strAliasPrefix . 'codi_cate');
			    $objBuilder->AddSelectItem($strTableName, 'desc_cate', $strAliasPrefix . 'desc_cate');
			    $objBuilder->AddSelectItem($strTableName, 'fran_post', $strAliasPrefix . 'fran_post');
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
			
			$strAlias = $strAliasPrefix . 'codi_cate';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiCate != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a FacCategoriaProd from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacCategoriaProd::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacCategoriaProd, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_cate']) ? $strColumnAliasArray['codi_cate'] : 'codi_cate';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (FacCategoriaProd::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacCategoriaProd object
			$objToReturn = new FacCategoriaProd();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_cate';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiCate = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'desc_cate';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescCate = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fran_post';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltFranPost = $objDbRow->GetColumn($strAliasName, 'Float');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiCate != $objPreviousItem->CodiCate) {
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
				$strAliasPrefix = 'fac_categoria_prod__';


				

			// Check for FacProductoAsCodiCate Virtual Binding
			$strAlias = $strAliasPrefix . 'facproductoascodicate__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facproductoascodicate']) ? null : $objExpansionAliasArray['facproductoascodicate']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacProductoAsCodiCateArray)
				$objToReturn->_objFacProductoAsCodiCateArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacProductoAsCodiCateArray[] = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facproductoascodicate__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacProductoAsCodiCate)) {
					$objToReturn->_objFacProductoAsCodiCate = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facproductoascodicate__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MasCartaDevoAsCodiCate Virtual Binding
			$strAlias = $strAliasPrefix . 'mascartadevoascodicate__nume_cart';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['mascartadevoascodicate']) ? null : $objExpansionAliasArray['mascartadevoascodicate']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMasCartaDevoAsCodiCateArray)
				$objToReturn->_objMasCartaDevoAsCodiCateArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMasCartaDevoAsCodiCateArray[] = MasCartaDevo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'mascartadevoascodicate__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMasCartaDevoAsCodiCate)) {
					$objToReturn->_objMasCartaDevoAsCodiCate = MasCartaDevo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'mascartadevoascodicate__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacCategoriaProds from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacCategoriaProd[]
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
					$objItem = FacCategoriaProd::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiCate][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacCategoriaProd::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacCategoriaProd object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacCategoriaProd next row resulting from the query
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
			return FacCategoriaProd::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacCategoriaProd object,
		 * by CodiCate Index(es)
		 * @param integer $intCodiCate
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacCategoriaProd
		*/
		public static function LoadByCodiCate($intCodiCate, $objOptionalClauses = null) {
			return FacCategoriaProd::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacCategoriaProd()->CodiCate, $intCodiCate)
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
		 * Save this FacCategoriaProd
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_categoria_prod` (
							`desc_cate`,
							`fran_post`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescCate) . ',
							' . $objDatabase->SqlVariable($this->fltFranPost) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiCate = $objDatabase->InsertId('fac_categoria_prod', 'codi_cate');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_categoria_prod`
						SET
							`desc_cate` = ' . $objDatabase->SqlVariable($this->strDescCate) . ',
							`fran_post` = ' . $objDatabase->SqlVariable($this->fltFranPost) . '
						WHERE
							`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
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
		 * Delete this FacCategoriaProd
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacCategoriaProd with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_categoria_prod`
				WHERE
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacCategoriaProd ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacCategoriaProd', $this->intCodiCate);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacCategoriaProds
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_categoria_prod`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_categoria_prod table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_categoria_prod`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacCategoriaProd from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacCategoriaProd object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacCategoriaProd::Load($this->intCodiCate);

			// Update $this's local variables to match
			$this->strDescCate = $objReloaded->strDescCate;
			$this->fltFranPost = $objReloaded->fltFranPost;
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
				case 'CodiCate':
					/**
					 * Gets the value for intCodiCate (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiCate;

				case 'DescCate':
					/**
					 * Gets the value for strDescCate (Not Null)
					 * @return string
					 */
					return $this->strDescCate;

				case 'FranPost':
					/**
					 * Gets the value for fltFranPost (Not Null)
					 * @return double
					 */
					return $this->fltFranPost;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FacProductoAsCodiCate':
					/**
					 * Gets the value for the private _objFacProductoAsCodiCate (Read-Only)
					 * if set due to an expansion on the fac_producto.codi_cate reverse relationship
					 * @return FacProducto
					 */
					return $this->_objFacProductoAsCodiCate;

				case '_FacProductoAsCodiCateArray':
					/**
					 * Gets the value for the private _objFacProductoAsCodiCateArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_producto.codi_cate reverse relationship
					 * @return FacProducto[]
					 */
					return $this->_objFacProductoAsCodiCateArray;

				case '_MasCartaDevoAsCodiCate':
					/**
					 * Gets the value for the private _objMasCartaDevoAsCodiCate (Read-Only)
					 * if set due to an expansion on the mas_carta_devo.codi_cate reverse relationship
					 * @return MasCartaDevo
					 */
					return $this->_objMasCartaDevoAsCodiCate;

				case '_MasCartaDevoAsCodiCateArray':
					/**
					 * Gets the value for the private _objMasCartaDevoAsCodiCateArray (Read-Only)
					 * if set due to an ExpandAsArray on the mas_carta_devo.codi_cate reverse relationship
					 * @return MasCartaDevo[]
					 */
					return $this->_objMasCartaDevoAsCodiCateArray;


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
				case 'DescCate':
					/**
					 * Sets the value for strDescCate (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescCate = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FranPost':
					/**
					 * Sets the value for fltFranPost (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltFranPost = QType::Cast($mixValue, QType::Float));
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
			if ($this->CountFacProductosAsCodiCate()) {
				$arrTablRela[] = 'fac_producto';
			}
			if ($this->CountMasCartaDevosAsCodiCate()) {
				$arrTablRela[] = 'mas_carta_devo';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for FacProductoAsCodiCate
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacProductosAsCodiCate as an array of FacProducto objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto[]
		*/
		public function GetFacProductoAsCodiCateArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiCate)))
				return array();

			try {
				return FacProducto::LoadArrayByCodiCate($this->intCodiCate, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacProductosAsCodiCate
		 * @return int
		*/
		public function CountFacProductosAsCodiCate() {
			if ((is_null($this->intCodiCate)))
				return 0;

			return FacProducto::CountByCodiCate($this->intCodiCate);
		}

		/**
		 * Associates a FacProductoAsCodiCate
		 * @param FacProducto $objFacProducto
		 * @return void
		*/
		public function AssociateFacProductoAsCodiCate(FacProducto $objFacProducto) {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacProductoAsCodiCate on this unsaved FacCategoriaProd.');
			if ((is_null($objFacProducto->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacProductoAsCodiCate on this FacCategoriaProd with an unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_producto`
				SET
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacProducto->CodiProd) . '
			');
		}

		/**
		 * Unassociates a FacProductoAsCodiCate
		 * @param FacProducto $objFacProducto
		 * @return void
		*/
		public function UnassociateFacProductoAsCodiCate(FacProducto $objFacProducto) {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsCodiCate on this unsaved FacCategoriaProd.');
			if ((is_null($objFacProducto->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsCodiCate on this FacCategoriaProd with an unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_producto`
				SET
					`codi_cate` = null
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacProducto->CodiProd) . ' AND
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
			');
		}

		/**
		 * Unassociates all FacProductosAsCodiCate
		 * @return void
		*/
		public function UnassociateAllFacProductosAsCodiCate() {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsCodiCate on this unsaved FacCategoriaProd.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_producto`
				SET
					`codi_cate` = null
				WHERE
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
			');
		}

		/**
		 * Deletes an associated FacProductoAsCodiCate
		 * @param FacProducto $objFacProducto
		 * @return void
		*/
		public function DeleteAssociatedFacProductoAsCodiCate(FacProducto $objFacProducto) {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsCodiCate on this unsaved FacCategoriaProd.');
			if ((is_null($objFacProducto->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsCodiCate on this FacCategoriaProd with an unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_producto`
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacProducto->CodiProd) . ' AND
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
			');
		}

		/**
		 * Deletes all associated FacProductosAsCodiCate
		 * @return void
		*/
		public function DeleteAllFacProductosAsCodiCate() {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsCodiCate on this unsaved FacCategoriaProd.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_producto`
				WHERE
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
			');
		}


		// Related Objects' Methods for MasCartaDevoAsCodiCate
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MasCartaDevosAsCodiCate as an array of MasCartaDevo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo[]
		*/
		public function GetMasCartaDevoAsCodiCateArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiCate)))
				return array();

			try {
				return MasCartaDevo::LoadArrayByCodiCate($this->intCodiCate, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MasCartaDevosAsCodiCate
		 * @return int
		*/
		public function CountMasCartaDevosAsCodiCate() {
			if ((is_null($this->intCodiCate)))
				return 0;

			return MasCartaDevo::CountByCodiCate($this->intCodiCate);
		}

		/**
		 * Associates a MasCartaDevoAsCodiCate
		 * @param MasCartaDevo $objMasCartaDevo
		 * @return void
		*/
		public function AssociateMasCartaDevoAsCodiCate(MasCartaDevo $objMasCartaDevo) {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasCartaDevoAsCodiCate on this unsaved FacCategoriaProd.');
			if ((is_null($objMasCartaDevo->NumeCart)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasCartaDevoAsCodiCate on this FacCategoriaProd with an unsaved MasCartaDevo.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`mas_carta_devo`
				SET
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
				WHERE
					`nume_cart` = ' . $objDatabase->SqlVariable($objMasCartaDevo->NumeCart) . '
			');
		}

		/**
		 * Unassociates a MasCartaDevoAsCodiCate
		 * @param MasCartaDevo $objMasCartaDevo
		 * @return void
		*/
		public function UnassociateMasCartaDevoAsCodiCate(MasCartaDevo $objMasCartaDevo) {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiCate on this unsaved FacCategoriaProd.');
			if ((is_null($objMasCartaDevo->NumeCart)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiCate on this FacCategoriaProd with an unsaved MasCartaDevo.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`mas_carta_devo`
				SET
					`codi_cate` = null
				WHERE
					`nume_cart` = ' . $objDatabase->SqlVariable($objMasCartaDevo->NumeCart) . ' AND
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
			');
		}

		/**
		 * Unassociates all MasCartaDevosAsCodiCate
		 * @return void
		*/
		public function UnassociateAllMasCartaDevosAsCodiCate() {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiCate on this unsaved FacCategoriaProd.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`mas_carta_devo`
				SET
					`codi_cate` = null
				WHERE
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
			');
		}

		/**
		 * Deletes an associated MasCartaDevoAsCodiCate
		 * @param MasCartaDevo $objMasCartaDevo
		 * @return void
		*/
		public function DeleteAssociatedMasCartaDevoAsCodiCate(MasCartaDevo $objMasCartaDevo) {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiCate on this unsaved FacCategoriaProd.');
			if ((is_null($objMasCartaDevo->NumeCart)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiCate on this FacCategoriaProd with an unsaved MasCartaDevo.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mas_carta_devo`
				WHERE
					`nume_cart` = ' . $objDatabase->SqlVariable($objMasCartaDevo->NumeCart) . ' AND
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
			');
		}

		/**
		 * Deletes all associated MasCartaDevosAsCodiCate
		 * @return void
		*/
		public function DeleteAllMasCartaDevosAsCodiCate() {
			if ((is_null($this->intCodiCate)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiCate on this unsaved FacCategoriaProd.');

			// Get the Database Object for this Class
			$objDatabase = FacCategoriaProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mas_carta_devo`
				WHERE
					`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . '
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
			return "fac_categoria_prod";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacCategoriaProd::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacCategoriaProd"><sequence>';
			$strToReturn .= '<element name="CodiCate" type="xsd:int"/>';
			$strToReturn .= '<element name="DescCate" type="xsd:string"/>';
			$strToReturn .= '<element name="FranPost" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacCategoriaProd', $strComplexTypeArray)) {
				$strComplexTypeArray['FacCategoriaProd'] = FacCategoriaProd::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacCategoriaProd::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacCategoriaProd();
			if (property_exists($objSoapObject, 'CodiCate'))
				$objToReturn->intCodiCate = $objSoapObject->CodiCate;
			if (property_exists($objSoapObject, 'DescCate'))
				$objToReturn->strDescCate = $objSoapObject->DescCate;
			if (property_exists($objSoapObject, 'FranPost'))
				$objToReturn->fltFranPost = $objSoapObject->FranPost;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacCategoriaProd::GetSoapObjectFromObject($objObject, true));

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
			$iArray['CodiCate'] = $this->intCodiCate;
			$iArray['DescCate'] = $this->strDescCate;
			$iArray['FranPost'] = $this->fltFranPost;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiCate ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiCate
     * @property-read QQNode $DescCate
     * @property-read QQNode $FranPost
     *
     *
     * @property-read QQReverseReferenceNodeFacProducto $FacProductoAsCodiCate
     * @property-read QQReverseReferenceNodeMasCartaDevo $MasCartaDevoAsCodiCate

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacCategoriaProd extends QQNode {
		protected $strTableName = 'fac_categoria_prod';
		protected $strPrimaryKey = 'codi_cate';
		protected $strClassName = 'FacCategoriaProd';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiCate':
					return new QQNode('codi_cate', 'CodiCate', 'Integer', $this);
				case 'DescCate':
					return new QQNode('desc_cate', 'DescCate', 'VarChar', $this);
				case 'FranPost':
					return new QQNode('fran_post', 'FranPost', 'Float', $this);
				case 'FacProductoAsCodiCate':
					return new QQReverseReferenceNodeFacProducto($this, 'facproductoascodicate', 'reverse_reference', 'codi_cate', 'FacProductoAsCodiCate');
				case 'MasCartaDevoAsCodiCate':
					return new QQReverseReferenceNodeMasCartaDevo($this, 'mascartadevoascodicate', 'reverse_reference', 'codi_cate', 'MasCartaDevoAsCodiCate');

				case '_PrimaryKeyNode':
					return new QQNode('codi_cate', 'CodiCate', 'Integer', $this);
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
     * @property-read QQNode $CodiCate
     * @property-read QQNode $DescCate
     * @property-read QQNode $FranPost
     *
     *
     * @property-read QQReverseReferenceNodeFacProducto $FacProductoAsCodiCate
     * @property-read QQReverseReferenceNodeMasCartaDevo $MasCartaDevoAsCodiCate

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacCategoriaProd extends QQReverseReferenceNode {
		protected $strTableName = 'fac_categoria_prod';
		protected $strPrimaryKey = 'codi_cate';
		protected $strClassName = 'FacCategoriaProd';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiCate':
					return new QQNode('codi_cate', 'CodiCate', 'integer', $this);
				case 'DescCate':
					return new QQNode('desc_cate', 'DescCate', 'string', $this);
				case 'FranPost':
					return new QQNode('fran_post', 'FranPost', 'double', $this);
				case 'FacProductoAsCodiCate':
					return new QQReverseReferenceNodeFacProducto($this, 'facproductoascodicate', 'reverse_reference', 'codi_cate', 'FacProductoAsCodiCate');
				case 'MasCartaDevoAsCodiCate':
					return new QQReverseReferenceNodeMasCartaDevo($this, 'mascartadevoascodicate', 'reverse_reference', 'codi_cate', 'MasCartaDevoAsCodiCate');

				case '_PrimaryKeyNode':
					return new QQNode('codi_cate', 'CodiCate', 'integer', $this);
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
