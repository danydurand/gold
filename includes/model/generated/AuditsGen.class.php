<?php
	/**
	 * The abstract AuditsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Audits subclass which
	 * extends this AuditsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Audits class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $UserType the value for strUserType 
	 * @property integer $UserId the value for intUserId 
	 * @property string $Event the value for strEvent (Not Null)
	 * @property string $AuditableType the value for strAuditableType (Not Null)
	 * @property integer $AuditableId the value for intAuditableId (Not Null)
	 * @property string $OldValues the value for strOldValues 
	 * @property string $NewValues the value for strNewValues 
	 * @property string $Url the value for strUrl 
	 * @property string $IpAddress the value for strIpAddress 
	 * @property string $UserAgent the value for strUserAgent 
	 * @property string $Tags the value for strTags 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AuditsGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column audits.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.user_type
		 * @var string strUserType
		 */
		protected $strUserType;
		const UserTypeMaxLength = 191;
		const UserTypeDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.user_id
		 * @var integer intUserId
		 */
		protected $intUserId;
		const UserIdDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.event
		 * @var string strEvent
		 */
		protected $strEvent;
		const EventMaxLength = 191;
		const EventDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.auditable_type
		 * @var string strAuditableType
		 */
		protected $strAuditableType;
		const AuditableTypeMaxLength = 191;
		const AuditableTypeDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.auditable_id
		 * @var integer intAuditableId
		 */
		protected $intAuditableId;
		const AuditableIdDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.old_values
		 * @var string strOldValues
		 */
		protected $strOldValues;
		const OldValuesDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.new_values
		 * @var string strNewValues
		 */
		protected $strNewValues;
		const NewValuesDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.url
		 * @var string strUrl
		 */
		protected $strUrl;
		const UrlDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.ip_address
		 * @var string strIpAddress
		 */
		protected $strIpAddress;
		const IpAddressMaxLength = 45;
		const IpAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.user_agent
		 * @var string strUserAgent
		 */
		protected $strUserAgent;
		const UserAgentMaxLength = 1023;
		const UserAgentDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.tags
		 * @var string strTags
		 */
		protected $strTags;
		const TagsMaxLength = 191;
		const TagsDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column audits.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


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
			$this->intId = Audits::IdDefault;
			$this->strUserType = Audits::UserTypeDefault;
			$this->intUserId = Audits::UserIdDefault;
			$this->strEvent = Audits::EventDefault;
			$this->strAuditableType = Audits::AuditableTypeDefault;
			$this->intAuditableId = Audits::AuditableIdDefault;
			$this->strOldValues = Audits::OldValuesDefault;
			$this->strNewValues = Audits::NewValuesDefault;
			$this->strUrl = Audits::UrlDefault;
			$this->strIpAddress = Audits::IpAddressDefault;
			$this->strUserAgent = Audits::UserAgentDefault;
			$this->strTags = Audits::TagsDefault;
			$this->strCreatedAt = Audits::CreatedAtDefault;
			$this->strUpdatedAt = Audits::UpdatedAtDefault;
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
		 * Load a Audits from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Audits
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Audits', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Audits::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Audits()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Auditses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Audits[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Audits::QueryArray to perform the LoadAll query
			try {
				return Audits::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Auditses
		 * @return int
		 */
		public static function CountAll() {
			// Call Audits::QueryCount to perform the CountAll query
			return Audits::QueryCount(QQ::All());
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
			$objDatabase = Audits::GetDatabase();

			// Create/Build out the QueryBuilder object with Audits-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'audits');

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
				Audits::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('audits');

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
		 * Static Qcubed Query method to query for a single Audits object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Audits the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Audits::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Audits object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Audits::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Audits::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Audits objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Audits[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Audits::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Audits::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Audits::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Audits objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Audits::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Audits::GetDatabase();

			$strQuery = Audits::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/audits', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Audits::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Audits
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'audits';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'user_type', $strAliasPrefix . 'user_type');
			    $objBuilder->AddSelectItem($strTableName, 'user_id', $strAliasPrefix . 'user_id');
			    $objBuilder->AddSelectItem($strTableName, 'event', $strAliasPrefix . 'event');
			    $objBuilder->AddSelectItem($strTableName, 'auditable_type', $strAliasPrefix . 'auditable_type');
			    $objBuilder->AddSelectItem($strTableName, 'auditable_id', $strAliasPrefix . 'auditable_id');
			    $objBuilder->AddSelectItem($strTableName, 'old_values', $strAliasPrefix . 'old_values');
			    $objBuilder->AddSelectItem($strTableName, 'new_values', $strAliasPrefix . 'new_values');
			    $objBuilder->AddSelectItem($strTableName, 'url', $strAliasPrefix . 'url');
			    $objBuilder->AddSelectItem($strTableName, 'ip_address', $strAliasPrefix . 'ip_address');
			    $objBuilder->AddSelectItem($strTableName, 'user_agent', $strAliasPrefix . 'user_agent');
			    $objBuilder->AddSelectItem($strTableName, 'tags', $strAliasPrefix . 'tags');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
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
		 * Instantiate a Audits from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Audits::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Audits, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			

			// Create a new instance of the Audits object
			$objToReturn = new Audits();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'user_type';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUserType = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'user_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUserId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'event';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEvent = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'auditable_type';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strAuditableType = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'auditable_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAuditableId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'old_values';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strOldValues = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'new_values';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNewValues = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'url';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUrl = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'ip_address';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIpAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'user_agent';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUserAgent = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tags';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTags = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'audits__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Auditses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Audits[]
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
					$objItem = Audits::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Audits::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Audits object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Audits next row resulting from the query
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
			return Audits::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Audits object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Audits
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Audits::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Audits()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Audits objects,
		 * by AuditableType, AuditableId Index(es)
		 * @param string $strAuditableType
		 * @param integer $intAuditableId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Audits[]
		*/
		public static function LoadArrayByAuditableTypeAuditableId($strAuditableType, $intAuditableId, $objOptionalClauses = null) {
			// Call Audits::QueryArray to perform the LoadArrayByAuditableTypeAuditableId query
			try {
				return Audits::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Audits()->AuditableType, $strAuditableType),
					QQ::Equal(QQN::Audits()->AuditableId, $intAuditableId)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Auditses
		 * by AuditableType, AuditableId Index(es)
		 * @param string $strAuditableType
		 * @param integer $intAuditableId
		 * @return int
		*/
		public static function CountByAuditableTypeAuditableId($strAuditableType, $intAuditableId) {
			// Call Audits::QueryCount to perform the CountByAuditableTypeAuditableId query
			return Audits::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Audits()->AuditableType, $strAuditableType),
				QQ::Equal(QQN::Audits()->AuditableId, $intAuditableId)				)

			);
		}

		/**
		 * Load an array of Audits objects,
		 * by UserId, UserType Index(es)
		 * @param integer $intUserId
		 * @param string $strUserType
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Audits[]
		*/
		public static function LoadArrayByUserIdUserType($intUserId, $strUserType, $objOptionalClauses = null) {
			// Call Audits::QueryArray to perform the LoadArrayByUserIdUserType query
			try {
				return Audits::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Audits()->UserId, $intUserId),
					QQ::Equal(QQN::Audits()->UserType, $strUserType)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Auditses
		 * by UserId, UserType Index(es)
		 * @param integer $intUserId
		 * @param string $strUserType
		 * @return int
		*/
		public static function CountByUserIdUserType($intUserId, $strUserType) {
			// Call Audits::QueryCount to perform the CountByUserIdUserType query
			return Audits::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Audits()->UserId, $intUserId),
				QQ::Equal(QQN::Audits()->UserType, $strUserType)				)

			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Audits
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Audits::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `audits` (
							`user_type`,
							`user_id`,
							`event`,
							`auditable_type`,
							`auditable_id`,
							`old_values`,
							`new_values`,
							`url`,
							`ip_address`,
							`user_agent`,
							`tags`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strUserType) . ',
							' . $objDatabase->SqlVariable($this->intUserId) . ',
							' . $objDatabase->SqlVariable($this->strEvent) . ',
							' . $objDatabase->SqlVariable($this->strAuditableType) . ',
							' . $objDatabase->SqlVariable($this->intAuditableId) . ',
							' . $objDatabase->SqlVariable($this->strOldValues) . ',
							' . $objDatabase->SqlVariable($this->strNewValues) . ',
							' . $objDatabase->SqlVariable($this->strUrl) . ',
							' . $objDatabase->SqlVariable($this->strIpAddress) . ',
							' . $objDatabase->SqlVariable($this->strUserAgent) . ',
							' . $objDatabase->SqlVariable($this->strTags) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('audits', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`audits`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Audits');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`audits`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Audits');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`audits`
						SET
							`user_type` = ' . $objDatabase->SqlVariable($this->strUserType) . ',
							`user_id` = ' . $objDatabase->SqlVariable($this->intUserId) . ',
							`event` = ' . $objDatabase->SqlVariable($this->strEvent) . ',
							`auditable_type` = ' . $objDatabase->SqlVariable($this->strAuditableType) . ',
							`auditable_id` = ' . $objDatabase->SqlVariable($this->intAuditableId) . ',
							`old_values` = ' . $objDatabase->SqlVariable($this->strOldValues) . ',
							`new_values` = ' . $objDatabase->SqlVariable($this->strNewValues) . ',
							`url` = ' . $objDatabase->SqlVariable($this->strUrl) . ',
							`ip_address` = ' . $objDatabase->SqlVariable($this->strIpAddress) . ',
							`user_agent` = ' . $objDatabase->SqlVariable($this->strUserAgent) . ',
							`tags` = ' . $objDatabase->SqlVariable($this->strTags) . '
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
					`audits`
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
					`audits`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Audits
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Audits with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Audits::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`audits`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Audits ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Audits', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Auditses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Audits::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`audits`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate audits table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Audits::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `audits`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Audits from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Audits object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Audits::Load($this->intId);

			// Update $this's local variables to match
			$this->strUserType = $objReloaded->strUserType;
			$this->intUserId = $objReloaded->intUserId;
			$this->strEvent = $objReloaded->strEvent;
			$this->strAuditableType = $objReloaded->strAuditableType;
			$this->intAuditableId = $objReloaded->intAuditableId;
			$this->strOldValues = $objReloaded->strOldValues;
			$this->strNewValues = $objReloaded->strNewValues;
			$this->strUrl = $objReloaded->strUrl;
			$this->strIpAddress = $objReloaded->strIpAddress;
			$this->strUserAgent = $objReloaded->strUserAgent;
			$this->strTags = $objReloaded->strTags;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
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

				case 'UserType':
					/**
					 * Gets the value for strUserType 
					 * @return string
					 */
					return $this->strUserType;

				case 'UserId':
					/**
					 * Gets the value for intUserId 
					 * @return integer
					 */
					return $this->intUserId;

				case 'Event':
					/**
					 * Gets the value for strEvent (Not Null)
					 * @return string
					 */
					return $this->strEvent;

				case 'AuditableType':
					/**
					 * Gets the value for strAuditableType (Not Null)
					 * @return string
					 */
					return $this->strAuditableType;

				case 'AuditableId':
					/**
					 * Gets the value for intAuditableId (Not Null)
					 * @return integer
					 */
					return $this->intAuditableId;

				case 'OldValues':
					/**
					 * Gets the value for strOldValues 
					 * @return string
					 */
					return $this->strOldValues;

				case 'NewValues':
					/**
					 * Gets the value for strNewValues 
					 * @return string
					 */
					return $this->strNewValues;

				case 'Url':
					/**
					 * Gets the value for strUrl 
					 * @return string
					 */
					return $this->strUrl;

				case 'IpAddress':
					/**
					 * Gets the value for strIpAddress 
					 * @return string
					 */
					return $this->strIpAddress;

				case 'UserAgent':
					/**
					 * Gets the value for strUserAgent 
					 * @return string
					 */
					return $this->strUserAgent;

				case 'Tags':
					/**
					 * Gets the value for strTags 
					 * @return string
					 */
					return $this->strTags;

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


				///////////////////
				// Member Objects
				///////////////////

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
				case 'UserType':
					/**
					 * Sets the value for strUserType 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUserType = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UserId':
					/**
					 * Sets the value for intUserId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intUserId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Event':
					/**
					 * Sets the value for strEvent (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEvent = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuditableType':
					/**
					 * Sets the value for strAuditableType (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAuditableType = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuditableId':
					/**
					 * Sets the value for intAuditableId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAuditableId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OldValues':
					/**
					 * Sets the value for strOldValues 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOldValues = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NewValues':
					/**
					 * Sets the value for strNewValues 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNewValues = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Url':
					/**
					 * Sets the value for strUrl 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUrl = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IpAddress':
					/**
					 * Sets the value for strIpAddress 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIpAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UserAgent':
					/**
					 * Sets the value for strUserAgent 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUserAgent = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tags':
					/**
					 * Sets the value for strTags 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTags = QType::Cast($mixValue, QType::String));
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
			return "audits";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Audits::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Audits"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="UserType" type="xsd:string"/>';
			$strToReturn .= '<element name="UserId" type="xsd:int"/>';
			$strToReturn .= '<element name="Event" type="xsd:string"/>';
			$strToReturn .= '<element name="AuditableType" type="xsd:string"/>';
			$strToReturn .= '<element name="AuditableId" type="xsd:int"/>';
			$strToReturn .= '<element name="OldValues" type="xsd:string"/>';
			$strToReturn .= '<element name="NewValues" type="xsd:string"/>';
			$strToReturn .= '<element name="Url" type="xsd:string"/>';
			$strToReturn .= '<element name="IpAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="UserAgent" type="xsd:string"/>';
			$strToReturn .= '<element name="Tags" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Audits', $strComplexTypeArray)) {
				$strComplexTypeArray['Audits'] = Audits::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Audits::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Audits();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'UserType'))
				$objToReturn->strUserType = $objSoapObject->UserType;
			if (property_exists($objSoapObject, 'UserId'))
				$objToReturn->intUserId = $objSoapObject->UserId;
			if (property_exists($objSoapObject, 'Event'))
				$objToReturn->strEvent = $objSoapObject->Event;
			if (property_exists($objSoapObject, 'AuditableType'))
				$objToReturn->strAuditableType = $objSoapObject->AuditableType;
			if (property_exists($objSoapObject, 'AuditableId'))
				$objToReturn->intAuditableId = $objSoapObject->AuditableId;
			if (property_exists($objSoapObject, 'OldValues'))
				$objToReturn->strOldValues = $objSoapObject->OldValues;
			if (property_exists($objSoapObject, 'NewValues'))
				$objToReturn->strNewValues = $objSoapObject->NewValues;
			if (property_exists($objSoapObject, 'Url'))
				$objToReturn->strUrl = $objSoapObject->Url;
			if (property_exists($objSoapObject, 'IpAddress'))
				$objToReturn->strIpAddress = $objSoapObject->IpAddress;
			if (property_exists($objSoapObject, 'UserAgent'))
				$objToReturn->strUserAgent = $objSoapObject->UserAgent;
			if (property_exists($objSoapObject, 'Tags'))
				$objToReturn->strTags = $objSoapObject->Tags;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Audits::GetSoapObjectFromObject($objObject, true));

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
			$iArray['UserType'] = $this->strUserType;
			$iArray['UserId'] = $this->intUserId;
			$iArray['Event'] = $this->strEvent;
			$iArray['AuditableType'] = $this->strAuditableType;
			$iArray['AuditableId'] = $this->intAuditableId;
			$iArray['OldValues'] = $this->strOldValues;
			$iArray['NewValues'] = $this->strNewValues;
			$iArray['Url'] = $this->strUrl;
			$iArray['IpAddress'] = $this->strIpAddress;
			$iArray['UserAgent'] = $this->strUserAgent;
			$iArray['Tags'] = $this->strTags;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
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
     * @property-read QQNode $UserType
     * @property-read QQNode $UserId
     * @property-read QQNode $Event
     * @property-read QQNode $AuditableType
     * @property-read QQNode $AuditableId
     * @property-read QQNode $OldValues
     * @property-read QQNode $NewValues
     * @property-read QQNode $Url
     * @property-read QQNode $IpAddress
     * @property-read QQNode $UserAgent
     * @property-read QQNode $Tags
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeAudits extends QQNode {
		protected $strTableName = 'audits';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Audits';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'UserType':
					return new QQNode('user_type', 'UserType', 'VarChar', $this);
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'Integer', $this);
				case 'Event':
					return new QQNode('event', 'Event', 'VarChar', $this);
				case 'AuditableType':
					return new QQNode('auditable_type', 'AuditableType', 'VarChar', $this);
				case 'AuditableId':
					return new QQNode('auditable_id', 'AuditableId', 'Integer', $this);
				case 'OldValues':
					return new QQNode('old_values', 'OldValues', 'Blob', $this);
				case 'NewValues':
					return new QQNode('new_values', 'NewValues', 'Blob', $this);
				case 'Url':
					return new QQNode('url', 'Url', 'Blob', $this);
				case 'IpAddress':
					return new QQNode('ip_address', 'IpAddress', 'VarChar', $this);
				case 'UserAgent':
					return new QQNode('user_agent', 'UserAgent', 'VarChar', $this);
				case 'Tags':
					return new QQNode('tags', 'Tags', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);

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
     * @property-read QQNode $UserType
     * @property-read QQNode $UserId
     * @property-read QQNode $Event
     * @property-read QQNode $AuditableType
     * @property-read QQNode $AuditableId
     * @property-read QQNode $OldValues
     * @property-read QQNode $NewValues
     * @property-read QQNode $Url
     * @property-read QQNode $IpAddress
     * @property-read QQNode $UserAgent
     * @property-read QQNode $Tags
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeAudits extends QQReverseReferenceNode {
		protected $strTableName = 'audits';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Audits';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'UserType':
					return new QQNode('user_type', 'UserType', 'string', $this);
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'integer', $this);
				case 'Event':
					return new QQNode('event', 'Event', 'string', $this);
				case 'AuditableType':
					return new QQNode('auditable_type', 'AuditableType', 'string', $this);
				case 'AuditableId':
					return new QQNode('auditable_id', 'AuditableId', 'integer', $this);
				case 'OldValues':
					return new QQNode('old_values', 'OldValues', 'string', $this);
				case 'NewValues':
					return new QQNode('new_values', 'NewValues', 'string', $this);
				case 'Url':
					return new QQNode('url', 'Url', 'string', $this);
				case 'IpAddress':
					return new QQNode('ip_address', 'IpAddress', 'string', $this);
				case 'UserAgent':
					return new QQNode('user_agent', 'UserAgent', 'string', $this);
				case 'Tags':
					return new QQNode('tags', 'Tags', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);

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
