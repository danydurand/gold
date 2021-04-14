<?php
	/**
	 * The abstract MasCartaDevoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the MasCartaDevo subclass which
	 * extends this MasCartaDevoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MasCartaDevo class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $NumeCart the value for intNumeCart (Read-Only PK)
	 * @property integer $CodiClie the value for intCodiClie (Not Null)
	 * @property integer $CodiCate the value for intCodiCate (Not Null)
	 * @property QDateTime $FechCart the value for dttFechCart (Not Null)
	 * @property integer $CantEntr the value for intCantEntr (Not Null)
	 * @property integer $CantInci the value for intCantInci (Not Null)
	 * @property string $NumePrec the value for strNumePrec 
	 * @property integer $StatCart the value for intStatCart (Not Null)
	 * @property MasterCliente $CodiClieObject the value for the MasterCliente object referenced by intCodiClie (Not Null)
	 * @property FacCategoriaProd $CodiCateObject the value for the FacCategoriaProd object referenced by intCodiCate (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MasCartaDevoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column mas_carta_devo.nume_cart
		 * @var integer intNumeCart
		 */
		protected $intNumeCart;
		const NumeCartDefault = null;


		/**
		 * Protected member variable that maps to the database column mas_carta_devo.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column mas_carta_devo.codi_cate
		 * @var integer intCodiCate
		 */
		protected $intCodiCate;
		const CodiCateDefault = null;


		/**
		 * Protected member variable that maps to the database column mas_carta_devo.fech_cart
		 * @var QDateTime dttFechCart
		 */
		protected $dttFechCart;
		const FechCartDefault = null;


		/**
		 * Protected member variable that maps to the database column mas_carta_devo.cant_entr
		 * @var integer intCantEntr
		 */
		protected $intCantEntr;
		const CantEntrDefault = null;


		/**
		 * Protected member variable that maps to the database column mas_carta_devo.cant_inci
		 * @var integer intCantInci
		 */
		protected $intCantInci;
		const CantInciDefault = null;


		/**
		 * Protected member variable that maps to the database column mas_carta_devo.nume_prec
		 * @var string strNumePrec
		 */
		protected $strNumePrec;
		const NumePrecDefault = null;


		/**
		 * Protected member variable that maps to the database column mas_carta_devo.stat_cart
		 * @var integer intStatCart
		 */
		protected $intStatCart;
		const StatCartDefault = null;


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
		 * in the database column mas_carta_devo.codi_clie.
		 *
		 * NOTE: Always use the CodiClieObject property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCodiClieObject
		 */
		protected $objCodiClieObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column mas_carta_devo.codi_cate.
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
			$this->intNumeCart = MasCartaDevo::NumeCartDefault;
			$this->intCodiClie = MasCartaDevo::CodiClieDefault;
			$this->intCodiCate = MasCartaDevo::CodiCateDefault;
			$this->dttFechCart = (MasCartaDevo::FechCartDefault === null)?null:new QDateTime(MasCartaDevo::FechCartDefault);
			$this->intCantEntr = MasCartaDevo::CantEntrDefault;
			$this->intCantInci = MasCartaDevo::CantInciDefault;
			$this->strNumePrec = MasCartaDevo::NumePrecDefault;
			$this->intStatCart = MasCartaDevo::StatCartDefault;
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
		 * Load a MasCartaDevo from PK Info
		 * @param integer $intNumeCart
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo
		 */
		public static function Load($intNumeCart, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'MasCartaDevo', $intNumeCart);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = MasCartaDevo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasCartaDevo()->NumeCart, $intNumeCart)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all MasCartaDevos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call MasCartaDevo::QueryArray to perform the LoadAll query
			try {
				return MasCartaDevo::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all MasCartaDevos
		 * @return int
		 */
		public static function CountAll() {
			// Call MasCartaDevo::QueryCount to perform the CountAll query
			return MasCartaDevo::QueryCount(QQ::All());
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
			$objDatabase = MasCartaDevo::GetDatabase();

			// Create/Build out the QueryBuilder object with MasCartaDevo-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'mas_carta_devo');

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
				MasCartaDevo::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('mas_carta_devo');

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
		 * Static Qcubed Query method to query for a single MasCartaDevo object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MasCartaDevo the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasCartaDevo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new MasCartaDevo object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = MasCartaDevo::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intNumeCart][] = $objItem;
		
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
				return MasCartaDevo::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of MasCartaDevo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MasCartaDevo[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasCartaDevo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return MasCartaDevo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = MasCartaDevo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of MasCartaDevo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasCartaDevo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = MasCartaDevo::GetDatabase();

			$strQuery = MasCartaDevo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/mascartadevo', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = MasCartaDevo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this MasCartaDevo
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'mas_carta_devo';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'nume_cart', $strAliasPrefix . 'nume_cart');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'nume_cart', $strAliasPrefix . 'nume_cart');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'codi_cate', $strAliasPrefix . 'codi_cate');
			    $objBuilder->AddSelectItem($strTableName, 'fech_cart', $strAliasPrefix . 'fech_cart');
			    $objBuilder->AddSelectItem($strTableName, 'cant_entr', $strAliasPrefix . 'cant_entr');
			    $objBuilder->AddSelectItem($strTableName, 'cant_inci', $strAliasPrefix . 'cant_inci');
			    $objBuilder->AddSelectItem($strTableName, 'nume_prec', $strAliasPrefix . 'nume_prec');
			    $objBuilder->AddSelectItem($strTableName, 'stat_cart', $strAliasPrefix . 'stat_cart');
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
			
			$strAlias = $strAliasPrefix . 'nume_cart';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intNumeCart != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a MasCartaDevo from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this MasCartaDevo::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a MasCartaDevo, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['nume_cart']) ? $strColumnAliasArray['nume_cart'] : 'nume_cart';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (MasCartaDevo::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the MasCartaDevo object
			$objToReturn = new MasCartaDevo();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'nume_cart';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeCart = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_cate';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiCate = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_cart';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCart = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'cant_entr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantEntr = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cant_inci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantInci = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_prec';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumePrec = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'stat_cart';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatCart = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->NumeCart != $objPreviousItem->NumeCart) {
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
				$strAliasPrefix = 'mas_carta_devo__';

			// Check for CodiClieObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_clie__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_clie']) ? null : $objExpansionAliasArray['codi_clie']);
				$objToReturn->objCodiClieObject = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_clie__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiCateObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_cate__codi_cate';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_cate']) ? null : $objExpansionAliasArray['codi_cate']);
				$objToReturn->objCodiCateObject = FacCategoriaProd::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_cate__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of MasCartaDevos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return MasCartaDevo[]
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
					$objItem = MasCartaDevo::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intNumeCart][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = MasCartaDevo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single MasCartaDevo object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return MasCartaDevo next row resulting from the query
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
			return MasCartaDevo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single MasCartaDevo object,
		 * by NumeCart Index(es)
		 * @param integer $intNumeCart
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo
		*/
		public static function LoadByNumeCart($intNumeCart, $objOptionalClauses = null) {
			return MasCartaDevo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasCartaDevo()->NumeCart, $intNumeCart)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of MasCartaDevo objects,
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo[]
		*/
		public static function LoadArrayByCodiClie($intCodiClie, $objOptionalClauses = null) {
			// Call MasCartaDevo::QueryArray to perform the LoadArrayByCodiClie query
			try {
				return MasCartaDevo::QueryArray(
					QQ::Equal(QQN::MasCartaDevo()->CodiClie, $intCodiClie),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasCartaDevos
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @return int
		*/
		public static function CountByCodiClie($intCodiClie) {
			// Call MasCartaDevo::QueryCount to perform the CountByCodiClie query
			return MasCartaDevo::QueryCount(
				QQ::Equal(QQN::MasCartaDevo()->CodiClie, $intCodiClie)
			);
		}

		/**
		 * Load an array of MasCartaDevo objects,
		 * by StatCart Index(es)
		 * @param integer $intStatCart
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo[]
		*/
		public static function LoadArrayByStatCart($intStatCart, $objOptionalClauses = null) {
			// Call MasCartaDevo::QueryArray to perform the LoadArrayByStatCart query
			try {
				return MasCartaDevo::QueryArray(
					QQ::Equal(QQN::MasCartaDevo()->StatCart, $intStatCart),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasCartaDevos
		 * by StatCart Index(es)
		 * @param integer $intStatCart
		 * @return int
		*/
		public static function CountByStatCart($intStatCart) {
			// Call MasCartaDevo::QueryCount to perform the CountByStatCart query
			return MasCartaDevo::QueryCount(
				QQ::Equal(QQN::MasCartaDevo()->StatCart, $intStatCart)
			);
		}

		/**
		 * Load an array of MasCartaDevo objects,
		 * by CodiCate Index(es)
		 * @param integer $intCodiCate
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo[]
		*/
		public static function LoadArrayByCodiCate($intCodiCate, $objOptionalClauses = null) {
			// Call MasCartaDevo::QueryArray to perform the LoadArrayByCodiCate query
			try {
				return MasCartaDevo::QueryArray(
					QQ::Equal(QQN::MasCartaDevo()->CodiCate, $intCodiCate),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasCartaDevos
		 * by CodiCate Index(es)
		 * @param integer $intCodiCate
		 * @return int
		*/
		public static function CountByCodiCate($intCodiCate) {
			// Call MasCartaDevo::QueryCount to perform the CountByCodiCate query
			return MasCartaDevo::QueryCount(
				QQ::Equal(QQN::MasCartaDevo()->CodiCate, $intCodiCate)
			);
		}

		/**
		 * Load an array of MasCartaDevo objects,
		 * by CodiClie, CodiCate, FechCart Index(es)
		 * @param integer $intCodiClie
		 * @param integer $intCodiCate
		 * @param QDateTime $dttFechCart
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo[]
		*/
		public static function LoadArrayByCodiClieCodiCateFechCart($intCodiClie, $intCodiCate, $dttFechCart, $objOptionalClauses = null) {
			// Call MasCartaDevo::QueryArray to perform the LoadArrayByCodiClieCodiCateFechCart query
			try {
				return MasCartaDevo::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::MasCartaDevo()->CodiClie, $intCodiClie),
					QQ::Equal(QQN::MasCartaDevo()->CodiCate, $intCodiCate),
					QQ::Equal(QQN::MasCartaDevo()->FechCart, $dttFechCart)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasCartaDevos
		 * by CodiClie, CodiCate, FechCart Index(es)
		 * @param integer $intCodiClie
		 * @param integer $intCodiCate
		 * @param QDateTime $dttFechCart
		 * @return int
		*/
		public static function CountByCodiClieCodiCateFechCart($intCodiClie, $intCodiCate, $dttFechCart) {
			// Call MasCartaDevo::QueryCount to perform the CountByCodiClieCodiCateFechCart query
			return MasCartaDevo::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::MasCartaDevo()->CodiClie, $intCodiClie),
				QQ::Equal(QQN::MasCartaDevo()->CodiCate, $intCodiCate),
				QQ::Equal(QQN::MasCartaDevo()->FechCart, $dttFechCart)				)

			);
		}

		/**
		 * Load an array of MasCartaDevo objects,
		 * by FechCart Index(es)
		 * @param QDateTime $dttFechCart
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo[]
		*/
		public static function LoadArrayByFechCart($dttFechCart, $objOptionalClauses = null) {
			// Call MasCartaDevo::QueryArray to perform the LoadArrayByFechCart query
			try {
				return MasCartaDevo::QueryArray(
					QQ::Equal(QQN::MasCartaDevo()->FechCart, $dttFechCart),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasCartaDevos
		 * by FechCart Index(es)
		 * @param QDateTime $dttFechCart
		 * @return int
		*/
		public static function CountByFechCart($dttFechCart) {
			// Call MasCartaDevo::QueryCount to perform the CountByFechCart query
			return MasCartaDevo::QueryCount(
				QQ::Equal(QQN::MasCartaDevo()->FechCart, $dttFechCart)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this MasCartaDevo
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = MasCartaDevo::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `mas_carta_devo` (
							`codi_clie`,
							`codi_cate`,
							`fech_cart`,
							`cant_entr`,
							`cant_inci`,
							`nume_prec`,
							`stat_cart`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->intCodiCate) . ',
							' . $objDatabase->SqlVariable($this->dttFechCart) . ',
							' . $objDatabase->SqlVariable($this->intCantEntr) . ',
							' . $objDatabase->SqlVariable($this->intCantInci) . ',
							' . $objDatabase->SqlVariable($this->strNumePrec) . ',
							' . $objDatabase->SqlVariable($this->intStatCart) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intNumeCart = $objDatabase->InsertId('mas_carta_devo', 'nume_cart');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`mas_carta_devo`
						SET
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`codi_cate` = ' . $objDatabase->SqlVariable($this->intCodiCate) . ',
							`fech_cart` = ' . $objDatabase->SqlVariable($this->dttFechCart) . ',
							`cant_entr` = ' . $objDatabase->SqlVariable($this->intCantEntr) . ',
							`cant_inci` = ' . $objDatabase->SqlVariable($this->intCantInci) . ',
							`nume_prec` = ' . $objDatabase->SqlVariable($this->strNumePrec) . ',
							`stat_cart` = ' . $objDatabase->SqlVariable($this->intStatCart) . '
						WHERE
							`nume_cart` = ' . $objDatabase->SqlVariable($this->intNumeCart) . '
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
		 * Delete this MasCartaDevo
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intNumeCart)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this MasCartaDevo with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = MasCartaDevo::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mas_carta_devo`
				WHERE
					`nume_cart` = ' . $objDatabase->SqlVariable($this->intNumeCart) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this MasCartaDevo ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'MasCartaDevo', $this->intNumeCart);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all MasCartaDevos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = MasCartaDevo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mas_carta_devo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate mas_carta_devo table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = MasCartaDevo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `mas_carta_devo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this MasCartaDevo from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved MasCartaDevo object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = MasCartaDevo::Load($this->intNumeCart);

			// Update $this's local variables to match
			$this->CodiClie = $objReloaded->CodiClie;
			$this->CodiCate = $objReloaded->CodiCate;
			$this->dttFechCart = $objReloaded->dttFechCart;
			$this->intCantEntr = $objReloaded->intCantEntr;
			$this->intCantInci = $objReloaded->intCantInci;
			$this->strNumePrec = $objReloaded->strNumePrec;
			$this->StatCart = $objReloaded->StatCart;
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
				case 'NumeCart':
					/**
					 * Gets the value for intNumeCart (Read-Only PK)
					 * @return integer
					 */
					return $this->intNumeCart;

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie (Not Null)
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'CodiCate':
					/**
					 * Gets the value for intCodiCate (Not Null)
					 * @return integer
					 */
					return $this->intCodiCate;

				case 'FechCart':
					/**
					 * Gets the value for dttFechCart (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechCart;

				case 'CantEntr':
					/**
					 * Gets the value for intCantEntr (Not Null)
					 * @return integer
					 */
					return $this->intCantEntr;

				case 'CantInci':
					/**
					 * Gets the value for intCantInci (Not Null)
					 * @return integer
					 */
					return $this->intCantInci;

				case 'NumePrec':
					/**
					 * Gets the value for strNumePrec 
					 * @return string
					 */
					return $this->strNumePrec;

				case 'StatCart':
					/**
					 * Gets the value for intStatCart (Not Null)
					 * @return integer
					 */
					return $this->intStatCart;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Gets the value for the MasterCliente object referenced by intCodiClie (Not Null)
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCodiClieObject) && (!is_null($this->intCodiClie)))
							$this->objCodiClieObject = MasterCliente::Load($this->intCodiClie);
						return $this->objCodiClieObject;
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
				case 'CodiClie':
					/**
					 * Sets the value for intCodiClie (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiClieObject = null;
						return ($this->intCodiClie = QType::Cast($mixValue, QType::Integer));
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

				case 'FechCart':
					/**
					 * Sets the value for dttFechCart (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechCart = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantEntr':
					/**
					 * Sets the value for intCantEntr (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantEntr = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantInci':
					/**
					 * Sets the value for intCantInci (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantInci = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumePrec':
					/**
					 * Sets the value for strNumePrec 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumePrec = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatCart':
					/**
					 * Sets the value for intStatCart (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatCart = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Sets the value for the MasterCliente object referenced by intCodiClie (Not Null)
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intCodiClie = null;
						$this->objCodiClieObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiClieObject for this MasCartaDevo');

						// Update Local Member Variables
						$this->objCodiClieObject = $mixValue;
						$this->intCodiClie = $mixValue->CodiClie;

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
							throw new QCallerException('Unable to set an unsaved CodiCateObject for this MasCartaDevo');

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
			return "mas_carta_devo";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[MasCartaDevo::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="MasCartaDevo"><sequence>';
			$strToReturn .= '<element name="NumeCart" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiClieObject" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="CodiCateObject" type="xsd1:FacCategoriaProd"/>';
			$strToReturn .= '<element name="FechCart" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CantEntr" type="xsd:int"/>';
			$strToReturn .= '<element name="CantInci" type="xsd:int"/>';
			$strToReturn .= '<element name="NumePrec" type="xsd:string"/>';
			$strToReturn .= '<element name="StatCart" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('MasCartaDevo', $strComplexTypeArray)) {
				$strComplexTypeArray['MasCartaDevo'] = MasCartaDevo::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacCategoriaProd::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, MasCartaDevo::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new MasCartaDevo();
			if (property_exists($objSoapObject, 'NumeCart'))
				$objToReturn->intNumeCart = $objSoapObject->NumeCart;
			if ((property_exists($objSoapObject, 'CodiClieObject')) &&
				($objSoapObject->CodiClieObject))
				$objToReturn->CodiClieObject = MasterCliente::GetObjectFromSoapObject($objSoapObject->CodiClieObject);
			if ((property_exists($objSoapObject, 'CodiCateObject')) &&
				($objSoapObject->CodiCateObject))
				$objToReturn->CodiCateObject = FacCategoriaProd::GetObjectFromSoapObject($objSoapObject->CodiCateObject);
			if (property_exists($objSoapObject, 'FechCart'))
				$objToReturn->dttFechCart = new QDateTime($objSoapObject->FechCart);
			if (property_exists($objSoapObject, 'CantEntr'))
				$objToReturn->intCantEntr = $objSoapObject->CantEntr;
			if (property_exists($objSoapObject, 'CantInci'))
				$objToReturn->intCantInci = $objSoapObject->CantInci;
			if (property_exists($objSoapObject, 'NumePrec'))
				$objToReturn->strNumePrec = $objSoapObject->NumePrec;
			if (property_exists($objSoapObject, 'StatCart'))
				$objToReturn->intStatCart = $objSoapObject->StatCart;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, MasCartaDevo::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiClieObject)
				$objObject->objCodiClieObject = MasterCliente::GetSoapObjectFromObject($objObject->objCodiClieObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiClie = null;
			if ($objObject->objCodiCateObject)
				$objObject->objCodiCateObject = FacCategoriaProd::GetSoapObjectFromObject($objObject->objCodiCateObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiCate = null;
			if ($objObject->dttFechCart)
				$objObject->dttFechCart = $objObject->dttFechCart->qFormat(QDateTime::FormatSoap);
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
			$iArray['NumeCart'] = $this->intNumeCart;
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['CodiCate'] = $this->intCodiCate;
			$iArray['FechCart'] = $this->dttFechCart;
			$iArray['CantEntr'] = $this->intCantEntr;
			$iArray['CantInci'] = $this->intCantInci;
			$iArray['NumePrec'] = $this->strNumePrec;
			$iArray['StatCart'] = $this->intStatCart;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intNumeCart ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $NumeCart
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $CodiCate
     * @property-read QQNodeFacCategoriaProd $CodiCateObject
     * @property-read QQNode $FechCart
     * @property-read QQNode $CantEntr
     * @property-read QQNode $CantInci
     * @property-read QQNode $NumePrec
     * @property-read QQNode $StatCart
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeMasCartaDevo extends QQNode {
		protected $strTableName = 'mas_carta_devo';
		protected $strPrimaryKey = 'nume_cart';
		protected $strClassName = 'MasCartaDevo';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeCart':
					return new QQNode('nume_cart', 'NumeCart', 'Integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'Integer', $this);
				case 'CodiCate':
					return new QQNode('codi_cate', 'CodiCate', 'Integer', $this);
				case 'CodiCateObject':
					return new QQNodeFacCategoriaProd('codi_cate', 'CodiCateObject', 'Integer', $this);
				case 'FechCart':
					return new QQNode('fech_cart', 'FechCart', 'Date', $this);
				case 'CantEntr':
					return new QQNode('cant_entr', 'CantEntr', 'Integer', $this);
				case 'CantInci':
					return new QQNode('cant_inci', 'CantInci', 'Integer', $this);
				case 'NumePrec':
					return new QQNode('nume_prec', 'NumePrec', 'VarChar', $this);
				case 'StatCart':
					return new QQNode('stat_cart', 'StatCart', 'Integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('nume_cart', 'NumeCart', 'Integer', $this);
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
     * @property-read QQNode $NumeCart
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $CodiCate
     * @property-read QQNodeFacCategoriaProd $CodiCateObject
     * @property-read QQNode $FechCart
     * @property-read QQNode $CantEntr
     * @property-read QQNode $CantInci
     * @property-read QQNode $NumePrec
     * @property-read QQNode $StatCart
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeMasCartaDevo extends QQReverseReferenceNode {
		protected $strTableName = 'mas_carta_devo';
		protected $strPrimaryKey = 'nume_cart';
		protected $strClassName = 'MasCartaDevo';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeCart':
					return new QQNode('nume_cart', 'NumeCart', 'integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'integer', $this);
				case 'CodiCate':
					return new QQNode('codi_cate', 'CodiCate', 'integer', $this);
				case 'CodiCateObject':
					return new QQNodeFacCategoriaProd('codi_cate', 'CodiCateObject', 'integer', $this);
				case 'FechCart':
					return new QQNode('fech_cart', 'FechCart', 'QDateTime', $this);
				case 'CantEntr':
					return new QQNode('cant_entr', 'CantEntr', 'integer', $this);
				case 'CantInci':
					return new QQNode('cant_inci', 'CantInci', 'integer', $this);
				case 'NumePrec':
					return new QQNode('nume_prec', 'NumePrec', 'string', $this);
				case 'StatCart':
					return new QQNode('stat_cart', 'StatCart', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('nume_cart', 'NumeCart', 'integer', $this);
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
