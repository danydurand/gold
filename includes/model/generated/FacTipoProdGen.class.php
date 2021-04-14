<?php
	/**
	 * The abstract FacTipoProdGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacTipoProd subclass which
	 * extends this FacTipoProdGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacTipoProd class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $TipoProd the value for strTipoProd (PK)
	 * @property string $DescTpro the value for strDescTpro (Not Null)
	 * @property string $NombMeto the value for strNombMeto (Not Null)
	 * @property-read FacProducto $_FacProductoAsTipoProd the value for the private _objFacProductoAsTipoProd (Read-Only) if set due to an expansion on the fac_producto.tipo_prod reverse relationship
	 * @property-read FacProducto[] $_FacProductoAsTipoProdArray the value for the private _objFacProductoAsTipoProdArray (Read-Only) if set due to an ExpandAsArray on the fac_producto.tipo_prod reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacTipoProdGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column fac_tipo_prod.tipo_prod
		 * @var string strTipoProd
		 */
		protected $strTipoProd;
		const TipoProdMaxLength = 3;
		const TipoProdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strTipoProd;
		 */
		protected $__strTipoProd;

		/**
		 * Protected member variable that maps to the database column fac_tipo_prod.desc_tpro
		 * @var string strDescTpro
		 */
		protected $strDescTpro;
		const DescTproMaxLength = 50;
		const DescTproDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tipo_prod.nomb_meto
		 * @var string strNombMeto
		 */
		protected $strNombMeto;
		const NombMetoMaxLength = 50;
		const NombMetoDefault = null;


		/**
		 * Private member variable that stores a reference to a single FacProductoAsTipoProd object
		 * (of type FacProducto), if this FacTipoProd object was restored with
		 * an expansion on the fac_producto association table.
		 * @var FacProducto _objFacProductoAsTipoProd;
		 */
		private $_objFacProductoAsTipoProd;

		/**
		 * Private member variable that stores a reference to an array of FacProductoAsTipoProd objects
		 * (of type FacProducto[]), if this FacTipoProd object was restored with
		 * an ExpandAsArray on the fac_producto association table.
		 * @var FacProducto[] _objFacProductoAsTipoProdArray;
		 */
		private $_objFacProductoAsTipoProdArray = null;

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
			$this->strTipoProd = FacTipoProd::TipoProdDefault;
			$this->strDescTpro = FacTipoProd::DescTproDefault;
			$this->strNombMeto = FacTipoProd::NombMetoDefault;
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
		 * Load a FacTipoProd from PK Info
		 * @param string $strTipoProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTipoProd
		 */
		public static function Load($strTipoProd, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacTipoProd', $strTipoProd);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacTipoProd::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTipoProd()->TipoProd, $strTipoProd)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacTipoProds
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTipoProd[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacTipoProd::QueryArray to perform the LoadAll query
			try {
				return FacTipoProd::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacTipoProds
		 * @return int
		 */
		public static function CountAll() {
			// Call FacTipoProd::QueryCount to perform the CountAll query
			return FacTipoProd::QueryCount(QQ::All());
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
			$objDatabase = FacTipoProd::GetDatabase();

			// Create/Build out the QueryBuilder object with FacTipoProd-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_tipo_prod');

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
				FacTipoProd::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_tipo_prod');

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
		 * Static Qcubed Query method to query for a single FacTipoProd object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacTipoProd the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTipoProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacTipoProd object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacTipoProd::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strTipoProd][] = $objItem;
		
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
				return FacTipoProd::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacTipoProd objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacTipoProd[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTipoProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacTipoProd::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacTipoProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacTipoProd objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTipoProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacTipoProd::GetDatabase();

			$strQuery = FacTipoProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/factipoprod', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacTipoProd::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacTipoProd
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_tipo_prod';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'tipo_prod', $strAliasPrefix . 'tipo_prod');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'tipo_prod', $strAliasPrefix . 'tipo_prod');
			    $objBuilder->AddSelectItem($strTableName, 'desc_tpro', $strAliasPrefix . 'desc_tpro');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_meto', $strAliasPrefix . 'nomb_meto');
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
			
			$strAlias = $strAliasPrefix . 'tipo_prod';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strTipoProd != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a FacTipoProd from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacTipoProd::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacTipoProd, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['tipo_prod']) ? $strColumnAliasArray['tipo_prod'] : 'tipo_prod';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (FacTipoProd::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacTipoProd object
			$objToReturn = new FacTipoProd();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'tipo_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoProd = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strTipoProd = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_tpro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescTpro = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nomb_meto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombMeto = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->TipoProd != $objPreviousItem->TipoProd) {
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
				$strAliasPrefix = 'fac_tipo_prod__';


				

			// Check for FacProductoAsTipoProd Virtual Binding
			$strAlias = $strAliasPrefix . 'facproductoastipoprod__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facproductoastipoprod']) ? null : $objExpansionAliasArray['facproductoastipoprod']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacProductoAsTipoProdArray)
				$objToReturn->_objFacProductoAsTipoProdArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacProductoAsTipoProdArray[] = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facproductoastipoprod__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacProductoAsTipoProd)) {
					$objToReturn->_objFacProductoAsTipoProd = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facproductoastipoprod__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacTipoProds from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacTipoProd[]
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
					$objItem = FacTipoProd::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strTipoProd][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacTipoProd::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacTipoProd object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacTipoProd next row resulting from the query
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
			return FacTipoProd::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacTipoProd object,
		 * by TipoProd Index(es)
		 * @param string $strTipoProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTipoProd
		*/
		public static function LoadByTipoProd($strTipoProd, $objOptionalClauses = null) {
			return FacTipoProd::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTipoProd()->TipoProd, $strTipoProd)
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
		 * Save this FacTipoProd
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_tipo_prod` (
							`tipo_prod`,
							`desc_tpro`,
							`nomb_meto`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strTipoProd) . ',
							' . $objDatabase->SqlVariable($this->strDescTpro) . ',
							' . $objDatabase->SqlVariable($this->strNombMeto) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_tipo_prod`
						SET
							`tipo_prod` = ' . $objDatabase->SqlVariable($this->strTipoProd) . ',
							`desc_tpro` = ' . $objDatabase->SqlVariable($this->strDescTpro) . ',
							`nomb_meto` = ' . $objDatabase->SqlVariable($this->strNombMeto) . '
						WHERE
							`tipo_prod` = ' . $objDatabase->SqlVariable($this->__strTipoProd) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strTipoProd = $this->strTipoProd;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this FacTipoProd
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strTipoProd)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacTipoProd with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tipo_prod`
				WHERE
					`tipo_prod` = ' . $objDatabase->SqlVariable($this->strTipoProd) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacTipoProd ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacTipoProd', $this->strTipoProd);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacTipoProds
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tipo_prod`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_tipo_prod table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_tipo_prod`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacTipoProd from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacTipoProd object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacTipoProd::Load($this->strTipoProd);

			// Update $this's local variables to match
			$this->strTipoProd = $objReloaded->strTipoProd;
			$this->__strTipoProd = $this->strTipoProd;
			$this->strDescTpro = $objReloaded->strDescTpro;
			$this->strNombMeto = $objReloaded->strNombMeto;
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
				case 'TipoProd':
					/**
					 * Gets the value for strTipoProd (PK)
					 * @return string
					 */
					return $this->strTipoProd;

				case 'DescTpro':
					/**
					 * Gets the value for strDescTpro (Not Null)
					 * @return string
					 */
					return $this->strDescTpro;

				case 'NombMeto':
					/**
					 * Gets the value for strNombMeto (Not Null)
					 * @return string
					 */
					return $this->strNombMeto;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FacProductoAsTipoProd':
					/**
					 * Gets the value for the private _objFacProductoAsTipoProd (Read-Only)
					 * if set due to an expansion on the fac_producto.tipo_prod reverse relationship
					 * @return FacProducto
					 */
					return $this->_objFacProductoAsTipoProd;

				case '_FacProductoAsTipoProdArray':
					/**
					 * Gets the value for the private _objFacProductoAsTipoProdArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_producto.tipo_prod reverse relationship
					 * @return FacProducto[]
					 */
					return $this->_objFacProductoAsTipoProdArray;


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
				case 'TipoProd':
					/**
					 * Sets the value for strTipoProd (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipoProd = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescTpro':
					/**
					 * Sets the value for strDescTpro (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescTpro = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombMeto':
					/**
					 * Sets the value for strNombMeto (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombMeto = QType::Cast($mixValue, QType::String));
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
			if ($this->CountFacProductosAsTipoProd()) {
				$arrTablRela[] = 'fac_producto';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for FacProductoAsTipoProd
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacProductosAsTipoProd as an array of FacProducto objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProducto[]
		*/
		public function GetFacProductoAsTipoProdArray($objOptionalClauses = null) {
			if ((is_null($this->strTipoProd)))
				return array();

			try {
				return FacProducto::LoadArrayByTipoProd($this->strTipoProd, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacProductosAsTipoProd
		 * @return int
		*/
		public function CountFacProductosAsTipoProd() {
			if ((is_null($this->strTipoProd)))
				return 0;

			return FacProducto::CountByTipoProd($this->strTipoProd);
		}

		/**
		 * Associates a FacProductoAsTipoProd
		 * @param FacProducto $objFacProducto
		 * @return void
		*/
		public function AssociateFacProductoAsTipoProd(FacProducto $objFacProducto) {
			if ((is_null($this->strTipoProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacProductoAsTipoProd on this unsaved FacTipoProd.');
			if ((is_null($objFacProducto->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacProductoAsTipoProd on this FacTipoProd with an unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_producto`
				SET
					`tipo_prod` = ' . $objDatabase->SqlVariable($this->strTipoProd) . '
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacProducto->CodiProd) . '
			');
		}

		/**
		 * Unassociates a FacProductoAsTipoProd
		 * @param FacProducto $objFacProducto
		 * @return void
		*/
		public function UnassociateFacProductoAsTipoProd(FacProducto $objFacProducto) {
			if ((is_null($this->strTipoProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsTipoProd on this unsaved FacTipoProd.');
			if ((is_null($objFacProducto->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsTipoProd on this FacTipoProd with an unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_producto`
				SET
					`tipo_prod` = null
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacProducto->CodiProd) . ' AND
					`tipo_prod` = ' . $objDatabase->SqlVariable($this->strTipoProd) . '
			');
		}

		/**
		 * Unassociates all FacProductosAsTipoProd
		 * @return void
		*/
		public function UnassociateAllFacProductosAsTipoProd() {
			if ((is_null($this->strTipoProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsTipoProd on this unsaved FacTipoProd.');

			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_producto`
				SET
					`tipo_prod` = null
				WHERE
					`tipo_prod` = ' . $objDatabase->SqlVariable($this->strTipoProd) . '
			');
		}

		/**
		 * Deletes an associated FacProductoAsTipoProd
		 * @param FacProducto $objFacProducto
		 * @return void
		*/
		public function DeleteAssociatedFacProductoAsTipoProd(FacProducto $objFacProducto) {
			if ((is_null($this->strTipoProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsTipoProd on this unsaved FacTipoProd.');
			if ((is_null($objFacProducto->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsTipoProd on this FacTipoProd with an unsaved FacProducto.');

			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_producto`
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacProducto->CodiProd) . ' AND
					`tipo_prod` = ' . $objDatabase->SqlVariable($this->strTipoProd) . '
			');
		}

		/**
		 * Deletes all associated FacProductosAsTipoProd
		 * @return void
		*/
		public function DeleteAllFacProductosAsTipoProd() {
			if ((is_null($this->strTipoProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacProductoAsTipoProd on this unsaved FacTipoProd.');

			// Get the Database Object for this Class
			$objDatabase = FacTipoProd::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_producto`
				WHERE
					`tipo_prod` = ' . $objDatabase->SqlVariable($this->strTipoProd) . '
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
			return "fac_tipo_prod";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacTipoProd::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacTipoProd"><sequence>';
			$strToReturn .= '<element name="TipoProd" type="xsd:string"/>';
			$strToReturn .= '<element name="DescTpro" type="xsd:string"/>';
			$strToReturn .= '<element name="NombMeto" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacTipoProd', $strComplexTypeArray)) {
				$strComplexTypeArray['FacTipoProd'] = FacTipoProd::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacTipoProd::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacTipoProd();
			if (property_exists($objSoapObject, 'TipoProd'))
				$objToReturn->strTipoProd = $objSoapObject->TipoProd;
			if (property_exists($objSoapObject, 'DescTpro'))
				$objToReturn->strDescTpro = $objSoapObject->DescTpro;
			if (property_exists($objSoapObject, 'NombMeto'))
				$objToReturn->strNombMeto = $objSoapObject->NombMeto;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacTipoProd::GetSoapObjectFromObject($objObject, true));

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
			$iArray['TipoProd'] = $this->strTipoProd;
			$iArray['DescTpro'] = $this->strDescTpro;
			$iArray['NombMeto'] = $this->strNombMeto;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strTipoProd ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $TipoProd
     * @property-read QQNode $DescTpro
     * @property-read QQNode $NombMeto
     *
     *
     * @property-read QQReverseReferenceNodeFacProducto $FacProductoAsTipoProd

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacTipoProd extends QQNode {
		protected $strTableName = 'fac_tipo_prod';
		protected $strPrimaryKey = 'tipo_prod';
		protected $strClassName = 'FacTipoProd';
		public function __get($strName) {
			switch ($strName) {
				case 'TipoProd':
					return new QQNode('tipo_prod', 'TipoProd', 'VarChar', $this);
				case 'DescTpro':
					return new QQNode('desc_tpro', 'DescTpro', 'VarChar', $this);
				case 'NombMeto':
					return new QQNode('nomb_meto', 'NombMeto', 'VarChar', $this);
				case 'FacProductoAsTipoProd':
					return new QQReverseReferenceNodeFacProducto($this, 'facproductoastipoprod', 'reverse_reference', 'tipo_prod', 'FacProductoAsTipoProd');

				case '_PrimaryKeyNode':
					return new QQNode('tipo_prod', 'TipoProd', 'VarChar', $this);
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
     * @property-read QQNode $TipoProd
     * @property-read QQNode $DescTpro
     * @property-read QQNode $NombMeto
     *
     *
     * @property-read QQReverseReferenceNodeFacProducto $FacProductoAsTipoProd

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacTipoProd extends QQReverseReferenceNode {
		protected $strTableName = 'fac_tipo_prod';
		protected $strPrimaryKey = 'tipo_prod';
		protected $strClassName = 'FacTipoProd';
		public function __get($strName) {
			switch ($strName) {
				case 'TipoProd':
					return new QQNode('tipo_prod', 'TipoProd', 'string', $this);
				case 'DescTpro':
					return new QQNode('desc_tpro', 'DescTpro', 'string', $this);
				case 'NombMeto':
					return new QQNode('nomb_meto', 'NombMeto', 'string', $this);
				case 'FacProductoAsTipoProd':
					return new QQReverseReferenceNodeFacProducto($this, 'facproductoastipoprod', 'reverse_reference', 'tipo_prod', 'FacProductoAsTipoProd');

				case '_PrimaryKeyNode':
					return new QQNode('tipo_prod', 'TipoProd', 'string', $this);
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
