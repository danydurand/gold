<?php
	/**
	 * The abstract ProcessPiecesGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ProcessPieces subclass which
	 * extends this ProcessPiecesGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ProcessPieces class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ProcesoErrorId the value for intProcesoErrorId (Not Null)
	 * @property string $IdPieza the value for strIdPieza (Not Null)
	 * @property integer $PiezaId the value for intPiezaId 
	 * @property boolean $IsProcessed the value for blnIsProcessed 
	 * @property string $ErrorMessage the value for strErrorMessage 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt (Not Null)
	 * @property integer $CreatedBy the value for intCreatedBy (Not Null)
	 * @property ProcesoError $ProcesoError the value for the ProcesoError object referenced by intProcesoErrorId (Not Null)
	 * @property GuiaPiezas $Pieza the value for the GuiaPiezas object referenced by intPiezaId 
	 * @property Usuario $CreatedByObject the value for the Usuario object referenced by intCreatedBy (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ProcessPiecesGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column process_pieces.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column process_pieces.proceso_error_id
		 * @var integer intProcesoErrorId
		 */
		protected $intProcesoErrorId;
		const ProcesoErrorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column process_pieces.id_pieza
		 * @var string strIdPieza
		 */
		protected $strIdPieza;
		const IdPiezaMaxLength = 30;
		const IdPiezaDefault = null;


		/**
		 * Protected member variable that maps to the database column process_pieces.pieza_id
		 * @var integer intPiezaId
		 */
		protected $intPiezaId;
		const PiezaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column process_pieces.is_processed
		 * @var boolean blnIsProcessed
		 */
		protected $blnIsProcessed;
		const IsProcessedDefault = null;


		/**
		 * Protected member variable that maps to the database column process_pieces.error_message
		 * @var string strErrorMessage
		 */
		protected $strErrorMessage;
		const ErrorMessageMaxLength = 200;
		const ErrorMessageDefault = null;


		/**
		 * Protected member variable that maps to the database column process_pieces.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column process_pieces.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


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
		 * in the database column process_pieces.proceso_error_id.
		 *
		 * NOTE: Always use the ProcesoError property getter to correctly retrieve this ProcesoError object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ProcesoError objProcesoError
		 */
		protected $objProcesoError;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column process_pieces.pieza_id.
		 *
		 * NOTE: Always use the Pieza property getter to correctly retrieve this GuiaPiezas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaPiezas objPieza
		 */
		protected $objPieza;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column process_pieces.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCreatedByObject
		 */
		protected $objCreatedByObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = ProcessPieces::IdDefault;
			$this->intProcesoErrorId = ProcessPieces::ProcesoErrorIdDefault;
			$this->strIdPieza = ProcessPieces::IdPiezaDefault;
			$this->intPiezaId = ProcessPieces::PiezaIdDefault;
			$this->blnIsProcessed = ProcessPieces::IsProcessedDefault;
			$this->strErrorMessage = ProcessPieces::ErrorMessageDefault;
			$this->dttCreatedAt = (ProcessPieces::CreatedAtDefault === null)?null:new QDateTime(ProcessPieces::CreatedAtDefault);
			$this->intCreatedBy = ProcessPieces::CreatedByDefault;
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
		 * Load a ProcessPieces from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ProcessPieces', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ProcessPieces::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ProcessPieces()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ProcessPieceses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ProcessPieces::QueryArray to perform the LoadAll query
			try {
				return ProcessPieces::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ProcessPieceses
		 * @return int
		 */
		public static function CountAll() {
			// Call ProcessPieces::QueryCount to perform the CountAll query
			return ProcessPieces::QueryCount(QQ::All());
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
			$objDatabase = ProcessPieces::GetDatabase();

			// Create/Build out the QueryBuilder object with ProcessPieces-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'process_pieces');

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
				ProcessPieces::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('process_pieces');

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
		 * Static Qcubed Query method to query for a single ProcessPieces object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ProcessPieces the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProcessPieces::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ProcessPieces object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ProcessPieces::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ProcessPieces::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ProcessPieces objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ProcessPieces[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProcessPieces::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ProcessPieces::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ProcessPieces::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ProcessPieces objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProcessPieces::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ProcessPieces::GetDatabase();

			$strQuery = ProcessPieces::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/processpieces', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ProcessPieces::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ProcessPieces
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'process_pieces';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'proceso_error_id', $strAliasPrefix . 'proceso_error_id');
			    $objBuilder->AddSelectItem($strTableName, 'id_pieza', $strAliasPrefix . 'id_pieza');
			    $objBuilder->AddSelectItem($strTableName, 'pieza_id', $strAliasPrefix . 'pieza_id');
			    $objBuilder->AddSelectItem($strTableName, 'is_processed', $strAliasPrefix . 'is_processed');
			    $objBuilder->AddSelectItem($strTableName, 'error_message', $strAliasPrefix . 'error_message');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
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
		 * Instantiate a ProcessPieces from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ProcessPieces::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ProcessPieces, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ProcessPieces::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ProcessPieces object
			$objToReturn = new ProcessPieces();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'proceso_error_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProcesoErrorId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'id_pieza';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIdPieza = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pieza_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'is_processed';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnIsProcessed = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'error_message';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strErrorMessage = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'process_pieces__';

			// Check for ProcesoError Early Binding
			$strAlias = $strAliasPrefix . 'proceso_error_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['proceso_error_id']) ? null : $objExpansionAliasArray['proceso_error_id']);
				$objToReturn->objProcesoError = ProcesoError::InstantiateDbRow($objDbRow, $strAliasPrefix . 'proceso_error_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Pieza Early Binding
			$strAlias = $strAliasPrefix . 'pieza_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pieza_id']) ? null : $objExpansionAliasArray['pieza_id']);
				$objToReturn->objPieza = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CreatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'created_by__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['created_by']) ? null : $objExpansionAliasArray['created_by']);
				$objToReturn->objCreatedByObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ProcessPieceses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ProcessPieces[]
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
					$objItem = ProcessPieces::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ProcessPieces::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ProcessPieces object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ProcessPieces next row resulting from the query
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
			return ProcessPieces::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ProcessPieces object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ProcessPieces::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ProcessPieces()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ProcessPieces objects,
		 * by PiezaId Index(es)
		 * @param integer $intPiezaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces[]
		*/
		public static function LoadArrayByPiezaId($intPiezaId, $objOptionalClauses = null) {
			// Call ProcessPieces::QueryArray to perform the LoadArrayByPiezaId query
			try {
				return ProcessPieces::QueryArray(
					QQ::Equal(QQN::ProcessPieces()->PiezaId, $intPiezaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ProcessPieceses
		 * by PiezaId Index(es)
		 * @param integer $intPiezaId
		 * @return int
		*/
		public static function CountByPiezaId($intPiezaId) {
			// Call ProcessPieces::QueryCount to perform the CountByPiezaId query
			return ProcessPieces::QueryCount(
				QQ::Equal(QQN::ProcessPieces()->PiezaId, $intPiezaId)
			);
		}

		/**
		 * Load an array of ProcessPieces objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call ProcessPieces::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return ProcessPieces::QueryArray(
					QQ::Equal(QQN::ProcessPieces()->CreatedBy, $intCreatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ProcessPieceses
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy) {
			// Call ProcessPieces::QueryCount to perform the CountByCreatedBy query
			return ProcessPieces::QueryCount(
				QQ::Equal(QQN::ProcessPieces()->CreatedBy, $intCreatedBy)
			);
		}

		/**
		 * Load an array of ProcessPieces objects,
		 * by ProcesoErrorId, PiezaId Index(es)
		 * @param integer $intProcesoErrorId
		 * @param integer $intPiezaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces[]
		*/
		public static function LoadArrayByProcesoErrorIdPiezaId($intProcesoErrorId, $intPiezaId, $objOptionalClauses = null) {
			// Call ProcessPieces::QueryArray to perform the LoadArrayByProcesoErrorIdPiezaId query
			try {
				return ProcessPieces::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::ProcessPieces()->ProcesoErrorId, $intProcesoErrorId),
					QQ::Equal(QQN::ProcessPieces()->PiezaId, $intPiezaId)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ProcessPieceses
		 * by ProcesoErrorId, PiezaId Index(es)
		 * @param integer $intProcesoErrorId
		 * @param integer $intPiezaId
		 * @return int
		*/
		public static function CountByProcesoErrorIdPiezaId($intProcesoErrorId, $intPiezaId) {
			// Call ProcessPieces::QueryCount to perform the CountByProcesoErrorIdPiezaId query
			return ProcessPieces::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::ProcessPieces()->ProcesoErrorId, $intProcesoErrorId),
				QQ::Equal(QQN::ProcessPieces()->PiezaId, $intPiezaId)				)

			);
		}

		/**
		 * Load an array of ProcessPieces objects,
		 * by ProcesoErrorId, CreatedBy Index(es)
		 * @param integer $intProcesoErrorId
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces[]
		*/
		public static function LoadArrayByProcesoErrorIdCreatedBy($intProcesoErrorId, $intCreatedBy, $objOptionalClauses = null) {
			// Call ProcessPieces::QueryArray to perform the LoadArrayByProcesoErrorIdCreatedBy query
			try {
				return ProcessPieces::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::ProcessPieces()->ProcesoErrorId, $intProcesoErrorId),
					QQ::Equal(QQN::ProcessPieces()->CreatedBy, $intCreatedBy)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ProcessPieceses
		 * by ProcesoErrorId, CreatedBy Index(es)
		 * @param integer $intProcesoErrorId
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByProcesoErrorIdCreatedBy($intProcesoErrorId, $intCreatedBy) {
			// Call ProcessPieces::QueryCount to perform the CountByProcesoErrorIdCreatedBy query
			return ProcessPieces::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::ProcessPieces()->ProcesoErrorId, $intProcesoErrorId),
				QQ::Equal(QQN::ProcessPieces()->CreatedBy, $intCreatedBy)				)

			);
		}

		/**
		 * Load an array of ProcessPieces objects,
		 * by ProcesoErrorId Index(es)
		 * @param integer $intProcesoErrorId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces[]
		*/
		public static function LoadArrayByProcesoErrorId($intProcesoErrorId, $objOptionalClauses = null) {
			// Call ProcessPieces::QueryArray to perform the LoadArrayByProcesoErrorId query
			try {
				return ProcessPieces::QueryArray(
					QQ::Equal(QQN::ProcessPieces()->ProcesoErrorId, $intProcesoErrorId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ProcessPieceses
		 * by ProcesoErrorId Index(es)
		 * @param integer $intProcesoErrorId
		 * @return int
		*/
		public static function CountByProcesoErrorId($intProcesoErrorId) {
			// Call ProcessPieces::QueryCount to perform the CountByProcesoErrorId query
			return ProcessPieces::QueryCount(
				QQ::Equal(QQN::ProcessPieces()->ProcesoErrorId, $intProcesoErrorId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ProcessPieces
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ProcessPieces::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `process_pieces` (
							`proceso_error_id`,
							`id_pieza`,
							`pieza_id`,
							`is_processed`,
							`error_message`,
							`created_at`,
							`created_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intProcesoErrorId) . ',
							' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							' . $objDatabase->SqlVariable($this->intPiezaId) . ',
							' . $objDatabase->SqlVariable($this->blnIsProcessed) . ',
							' . $objDatabase->SqlVariable($this->strErrorMessage) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('process_pieces', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`process_pieces`
						SET
							`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intProcesoErrorId) . ',
							`id_pieza` = ' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							`pieza_id` = ' . $objDatabase->SqlVariable($this->intPiezaId) . ',
							`is_processed` = ' . $objDatabase->SqlVariable($this->blnIsProcessed) . ',
							`error_message` = ' . $objDatabase->SqlVariable($this->strErrorMessage) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . '
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
		 * Delete this ProcessPieces
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ProcessPieces with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ProcessPieces::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`process_pieces`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ProcessPieces ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ProcessPieces', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ProcessPieceses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ProcessPieces::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`process_pieces`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate process_pieces table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ProcessPieces::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `process_pieces`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ProcessPieces from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ProcessPieces object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ProcessPieces::Load($this->intId);

			// Update $this's local variables to match
			$this->ProcesoErrorId = $objReloaded->ProcesoErrorId;
			$this->strIdPieza = $objReloaded->strIdPieza;
			$this->PiezaId = $objReloaded->PiezaId;
			$this->blnIsProcessed = $objReloaded->blnIsProcessed;
			$this->strErrorMessage = $objReloaded->strErrorMessage;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->CreatedBy = $objReloaded->CreatedBy;
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

				case 'ProcesoErrorId':
					/**
					 * Gets the value for intProcesoErrorId (Not Null)
					 * @return integer
					 */
					return $this->intProcesoErrorId;

				case 'IdPieza':
					/**
					 * Gets the value for strIdPieza (Not Null)
					 * @return string
					 */
					return $this->strIdPieza;

				case 'PiezaId':
					/**
					 * Gets the value for intPiezaId 
					 * @return integer
					 */
					return $this->intPiezaId;

				case 'IsProcessed':
					/**
					 * Gets the value for blnIsProcessed 
					 * @return boolean
					 */
					return $this->blnIsProcessed;

				case 'ErrorMessage':
					/**
					 * Gets the value for strErrorMessage 
					 * @return string
					 */
					return $this->strErrorMessage;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt (Not Null)
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy (Not Null)
					 * @return integer
					 */
					return $this->intCreatedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'ProcesoError':
					/**
					 * Gets the value for the ProcesoError object referenced by intProcesoErrorId (Not Null)
					 * @return ProcesoError
					 */
					try {
						if ((!$this->objProcesoError) && (!is_null($this->intProcesoErrorId)))
							$this->objProcesoError = ProcesoError::Load($this->intProcesoErrorId);
						return $this->objProcesoError;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Pieza':
					/**
					 * Gets the value for the GuiaPiezas object referenced by intPiezaId 
					 * @return GuiaPiezas
					 */
					try {
						if ((!$this->objPieza) && (!is_null($this->intPiezaId)))
							$this->objPieza = GuiaPiezas::Load($this->intPiezaId);
						return $this->objPieza;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByObject':
					/**
					 * Gets the value for the Usuario object referenced by intCreatedBy (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = Usuario::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
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
				case 'ProcesoErrorId':
					/**
					 * Sets the value for intProcesoErrorId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objProcesoError = null;
						return ($this->intProcesoErrorId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdPieza':
					/**
					 * Sets the value for strIdPieza (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIdPieza = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PiezaId':
					/**
					 * Sets the value for intPiezaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPieza = null;
						return ($this->intPiezaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsProcessed':
					/**
					 * Sets the value for blnIsProcessed 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnIsProcessed = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ErrorMessage':
					/**
					 * Sets the value for strErrorMessage 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strErrorMessage = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedAt':
					/**
					 * Sets the value for dttCreatedAt (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					/**
					 * Sets the value for intCreatedBy (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCreatedByObject = null;
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ProcesoError':
					/**
					 * Sets the value for the ProcesoError object referenced by intProcesoErrorId (Not Null)
					 * @param ProcesoError $mixValue
					 * @return ProcesoError
					 */
					if (is_null($mixValue)) {
						$this->intProcesoErrorId = null;
						$this->objProcesoError = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ProcesoError object
						try {
							$mixValue = QType::Cast($mixValue, 'ProcesoError');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ProcesoError object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ProcesoError for this ProcessPieces');

						// Update Local Member Variables
						$this->objProcesoError = $mixValue;
						$this->intProcesoErrorId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Pieza':
					/**
					 * Sets the value for the GuiaPiezas object referenced by intPiezaId 
					 * @param GuiaPiezas $mixValue
					 * @return GuiaPiezas
					 */
					if (is_null($mixValue)) {
						$this->intPiezaId = null;
						$this->objPieza = null;
						return null;
					} else {
						// Make sure $mixValue actually is a GuiaPiezas object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaPiezas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED GuiaPiezas object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Pieza for this ProcessPieces');

						// Update Local Member Variables
						$this->objPieza = $mixValue;
						$this->intPiezaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByObject':
					/**
					 * Sets the value for the Usuario object referenced by intCreatedBy (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intCreatedBy = null;
						$this->objCreatedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Usuario object
						try {
							$mixValue = QType::Cast($mixValue, 'Usuario');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Usuario object
						if (is_null($mixValue->CodiUsua))
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this ProcessPieces');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->CodiUsua;

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
			return "process_pieces";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ProcessPieces::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ProcessPieces"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ProcesoError" type="xsd1:ProcesoError"/>';
			$strToReturn .= '<element name="IdPieza" type="xsd:string"/>';
			$strToReturn .= '<element name="Pieza" type="xsd1:GuiaPiezas"/>';
			$strToReturn .= '<element name="IsProcessed" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ErrorMessage" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ProcessPieces', $strComplexTypeArray)) {
				$strComplexTypeArray['ProcessPieces'] = ProcessPieces::GetSoapComplexTypeXml();
				ProcesoError::AlterSoapComplexTypeArray($strComplexTypeArray);
				GuiaPiezas::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ProcessPieces::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ProcessPieces();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ProcesoError')) &&
				($objSoapObject->ProcesoError))
				$objToReturn->ProcesoError = ProcesoError::GetObjectFromSoapObject($objSoapObject->ProcesoError);
			if (property_exists($objSoapObject, 'IdPieza'))
				$objToReturn->strIdPieza = $objSoapObject->IdPieza;
			if ((property_exists($objSoapObject, 'Pieza')) &&
				($objSoapObject->Pieza))
				$objToReturn->Pieza = GuiaPiezas::GetObjectFromSoapObject($objSoapObject->Pieza);
			if (property_exists($objSoapObject, 'IsProcessed'))
				$objToReturn->blnIsProcessed = $objSoapObject->IsProcessed;
			if (property_exists($objSoapObject, 'ErrorMessage'))
				$objToReturn->strErrorMessage = $objSoapObject->ErrorMessage;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = Usuario::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ProcessPieces::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objProcesoError)
				$objObject->objProcesoError = ProcesoError::GetSoapObjectFromObject($objObject->objProcesoError, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProcesoErrorId = null;
			if ($objObject->objPieza)
				$objObject->objPieza = GuiaPiezas::GetSoapObjectFromObject($objObject->objPieza, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPiezaId = null;
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = Usuario::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
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
			$iArray['ProcesoErrorId'] = $this->intProcesoErrorId;
			$iArray['IdPieza'] = $this->strIdPieza;
			$iArray['PiezaId'] = $this->intPiezaId;
			$iArray['IsProcessed'] = $this->blnIsProcessed;
			$iArray['ErrorMessage'] = $this->strErrorMessage;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
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
     * @property-read QQNode $ProcesoErrorId
     * @property-read QQNodeProcesoError $ProcesoError
     * @property-read QQNode $IdPieza
     * @property-read QQNode $PiezaId
     * @property-read QQNodeGuiaPiezas $Pieza
     * @property-read QQNode $IsProcessed
     * @property-read QQNode $ErrorMessage
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeProcessPieces extends QQNode {
		protected $strTableName = 'process_pieces';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ProcessPieces';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ProcesoErrorId':
					return new QQNode('proceso_error_id', 'ProcesoErrorId', 'Integer', $this);
				case 'ProcesoError':
					return new QQNodeProcesoError('proceso_error_id', 'ProcesoError', 'Integer', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'VarChar', $this);
				case 'PiezaId':
					return new QQNode('pieza_id', 'PiezaId', 'Integer', $this);
				case 'Pieza':
					return new QQNodeGuiaPiezas('pieza_id', 'Pieza', 'Integer', $this);
				case 'IsProcessed':
					return new QQNode('is_processed', 'IsProcessed', 'Bit', $this);
				case 'ErrorMessage':
					return new QQNode('error_message', 'ErrorMessage', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'CreatedByObject':
					return new QQNodeUsuario('created_by', 'CreatedByObject', 'Integer', $this);

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
     * @property-read QQNode $ProcesoErrorId
     * @property-read QQNodeProcesoError $ProcesoError
     * @property-read QQNode $IdPieza
     * @property-read QQNode $PiezaId
     * @property-read QQNodeGuiaPiezas $Pieza
     * @property-read QQNode $IsProcessed
     * @property-read QQNode $ErrorMessage
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeProcessPieces extends QQReverseReferenceNode {
		protected $strTableName = 'process_pieces';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ProcessPieces';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ProcesoErrorId':
					return new QQNode('proceso_error_id', 'ProcesoErrorId', 'integer', $this);
				case 'ProcesoError':
					return new QQNodeProcesoError('proceso_error_id', 'ProcesoError', 'integer', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'string', $this);
				case 'PiezaId':
					return new QQNode('pieza_id', 'PiezaId', 'integer', $this);
				case 'Pieza':
					return new QQNodeGuiaPiezas('pieza_id', 'Pieza', 'integer', $this);
				case 'IsProcessed':
					return new QQNode('is_processed', 'IsProcessed', 'boolean', $this);
				case 'ErrorMessage':
					return new QQNode('error_message', 'ErrorMessage', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUsuario('created_by', 'CreatedByObject', 'integer', $this);

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
