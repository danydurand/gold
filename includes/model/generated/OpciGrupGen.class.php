<?php
	/**
	 * The abstract OpciGrupGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the OpciGrup subclass which
	 * extends this OpciGrupGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the OpciGrup class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiRegi the value for intCodiRegi (Read-Only PK)
	 * @property integer $CodiGrup the value for intCodiGrup (Not Null)
	 * @property integer $CodiOpci the value for intCodiOpci (Not Null)
	 * @property integer $NiveAcce the value for intNiveAcce (Not Null)
	 * @property QDateTime $FechCamb the value for dttFechCamb 
	 * @property string $UsuaCamb the value for strUsuaCamb 
	 * @property Grupo $CodiGrupObject the value for the Grupo object referenced by intCodiGrup (Not Null)
	 * @property Opcion $CodiOpciObject the value for the Opcion object referenced by intCodiOpci (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class OpciGrupGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column opci_grup.codi_regi
		 * @var integer intCodiRegi
		 */
		protected $intCodiRegi;
		const CodiRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column opci_grup.codi_grup
		 * @var integer intCodiGrup
		 */
		protected $intCodiGrup;
		const CodiGrupDefault = null;


		/**
		 * Protected member variable that maps to the database column opci_grup.codi_opci
		 * @var integer intCodiOpci
		 */
		protected $intCodiOpci;
		const CodiOpciDefault = null;


		/**
		 * Protected member variable that maps to the database column opci_grup.nive_acce
		 * @var integer intNiveAcce
		 */
		protected $intNiveAcce;
		const NiveAcceDefault = null;


		/**
		 * Protected member variable that maps to the database column opci_grup.fech_camb
		 * @var QDateTime dttFechCamb
		 */
		protected $dttFechCamb;
		const FechCambDefault = null;


		/**
		 * Protected member variable that maps to the database column opci_grup.usua_camb
		 * @var string strUsuaCamb
		 */
		protected $strUsuaCamb;
		const UsuaCambMaxLength = 8;
		const UsuaCambDefault = null;


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
		 * in the database column opci_grup.codi_grup.
		 *
		 * NOTE: Always use the CodiGrupObject property getter to correctly retrieve this Grupo object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Grupo objCodiGrupObject
		 */
		protected $objCodiGrupObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column opci_grup.codi_opci.
		 *
		 * NOTE: Always use the CodiOpciObject property getter to correctly retrieve this Opcion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Opcion objCodiOpciObject
		 */
		protected $objCodiOpciObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiRegi = OpciGrup::CodiRegiDefault;
			$this->intCodiGrup = OpciGrup::CodiGrupDefault;
			$this->intCodiOpci = OpciGrup::CodiOpciDefault;
			$this->intNiveAcce = OpciGrup::NiveAcceDefault;
			$this->dttFechCamb = (OpciGrup::FechCambDefault === null)?null:new QDateTime(OpciGrup::FechCambDefault);
			$this->strUsuaCamb = OpciGrup::UsuaCambDefault;
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
		 * Load a OpciGrup from PK Info
		 * @param integer $intCodiRegi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup
		 */
		public static function Load($intCodiRegi, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'OpciGrup', $intCodiRegi);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = OpciGrup::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpciGrup()->CodiRegi, $intCodiRegi)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all OpciGrups
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call OpciGrup::QueryArray to perform the LoadAll query
			try {
				return OpciGrup::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all OpciGrups
		 * @return int
		 */
		public static function CountAll() {
			// Call OpciGrup::QueryCount to perform the CountAll query
			return OpciGrup::QueryCount(QQ::All());
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
			$objDatabase = OpciGrup::GetDatabase();

			// Create/Build out the QueryBuilder object with OpciGrup-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'opci_grup');

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
				OpciGrup::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('opci_grup');

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
		 * Static Qcubed Query method to query for a single OpciGrup object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpciGrup the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpciGrup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new OpciGrup object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = OpciGrup::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiRegi][] = $objItem;
		
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
				return OpciGrup::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of OpciGrup objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpciGrup[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpciGrup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return OpciGrup::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = OpciGrup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of OpciGrup objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpciGrup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = OpciGrup::GetDatabase();

			$strQuery = OpciGrup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/opcigrup', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = OpciGrup::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this OpciGrup
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'opci_grup';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_regi', $strAliasPrefix . 'codi_regi');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_regi', $strAliasPrefix . 'codi_regi');
			    $objBuilder->AddSelectItem($strTableName, 'codi_grup', $strAliasPrefix . 'codi_grup');
			    $objBuilder->AddSelectItem($strTableName, 'codi_opci', $strAliasPrefix . 'codi_opci');
			    $objBuilder->AddSelectItem($strTableName, 'nive_acce', $strAliasPrefix . 'nive_acce');
			    $objBuilder->AddSelectItem($strTableName, 'fech_camb', $strAliasPrefix . 'fech_camb');
			    $objBuilder->AddSelectItem($strTableName, 'usua_camb', $strAliasPrefix . 'usua_camb');
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
			
			$strAlias = $strAliasPrefix . 'codi_regi';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiRegi != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a OpciGrup from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this OpciGrup::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a OpciGrup, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_regi']) ? $strColumnAliasArray['codi_regi'] : 'codi_regi';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (OpciGrup::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the OpciGrup object
			$objToReturn = new OpciGrup();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiRegi = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_grup';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiGrup = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_opci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiOpci = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nive_acce';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNiveAcce = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_camb';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCamb = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'usua_camb';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUsuaCamb = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiRegi != $objPreviousItem->CodiRegi) {
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
				$strAliasPrefix = 'opci_grup__';

			// Check for CodiGrupObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_grup__codi_grup';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_grup']) ? null : $objExpansionAliasArray['codi_grup']);
				$objToReturn->objCodiGrupObject = Grupo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_grup__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiOpciObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_opci__codi_opci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_opci']) ? null : $objExpansionAliasArray['codi_opci']);
				$objToReturn->objCodiOpciObject = Opcion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_opci__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of OpciGrups from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return OpciGrup[]
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
					$objItem = OpciGrup::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiRegi][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = OpciGrup::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single OpciGrup object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return OpciGrup next row resulting from the query
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
			return OpciGrup::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single OpciGrup object,
		 * by CodiRegi Index(es)
		 * @param integer $intCodiRegi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup
		*/
		public static function LoadByCodiRegi($intCodiRegi, $objOptionalClauses = null) {
			return OpciGrup::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpciGrup()->CodiRegi, $intCodiRegi)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single OpciGrup object,
		 * by CodiGrup, CodiOpci Index(es)
		 * @param integer $intCodiGrup
		 * @param integer $intCodiOpci
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup
		*/
		public static function LoadByCodiGrupCodiOpci($intCodiGrup, $intCodiOpci, $objOptionalClauses = null) {
			return OpciGrup::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpciGrup()->CodiGrup, $intCodiGrup),
					QQ::Equal(QQN::OpciGrup()->CodiOpci, $intCodiOpci)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of OpciGrup objects,
		 * by NiveAcce Index(es)
		 * @param integer $intNiveAcce
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup[]
		*/
		public static function LoadArrayByNiveAcce($intNiveAcce, $objOptionalClauses = null) {
			// Call OpciGrup::QueryArray to perform the LoadArrayByNiveAcce query
			try {
				return OpciGrup::QueryArray(
					QQ::Equal(QQN::OpciGrup()->NiveAcce, $intNiveAcce),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count OpciGrups
		 * by NiveAcce Index(es)
		 * @param integer $intNiveAcce
		 * @return int
		*/
		public static function CountByNiveAcce($intNiveAcce) {
			// Call OpciGrup::QueryCount to perform the CountByNiveAcce query
			return OpciGrup::QueryCount(
				QQ::Equal(QQN::OpciGrup()->NiveAcce, $intNiveAcce)
			);
		}

		/**
		 * Load an array of OpciGrup objects,
		 * by CodiOpci Index(es)
		 * @param integer $intCodiOpci
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup[]
		*/
		public static function LoadArrayByCodiOpci($intCodiOpci, $objOptionalClauses = null) {
			// Call OpciGrup::QueryArray to perform the LoadArrayByCodiOpci query
			try {
				return OpciGrup::QueryArray(
					QQ::Equal(QQN::OpciGrup()->CodiOpci, $intCodiOpci),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count OpciGrups
		 * by CodiOpci Index(es)
		 * @param integer $intCodiOpci
		 * @return int
		*/
		public static function CountByCodiOpci($intCodiOpci) {
			// Call OpciGrup::QueryCount to perform the CountByCodiOpci query
			return OpciGrup::QueryCount(
				QQ::Equal(QQN::OpciGrup()->CodiOpci, $intCodiOpci)
			);
		}

		/**
		 * Load an array of OpciGrup objects,
		 * by CodiGrup Index(es)
		 * @param integer $intCodiGrup
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup[]
		*/
		public static function LoadArrayByCodiGrup($intCodiGrup, $objOptionalClauses = null) {
			// Call OpciGrup::QueryArray to perform the LoadArrayByCodiGrup query
			try {
				return OpciGrup::QueryArray(
					QQ::Equal(QQN::OpciGrup()->CodiGrup, $intCodiGrup),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count OpciGrups
		 * by CodiGrup Index(es)
		 * @param integer $intCodiGrup
		 * @return int
		*/
		public static function CountByCodiGrup($intCodiGrup) {
			// Call OpciGrup::QueryCount to perform the CountByCodiGrup query
			return OpciGrup::QueryCount(
				QQ::Equal(QQN::OpciGrup()->CodiGrup, $intCodiGrup)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this OpciGrup
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = OpciGrup::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `opci_grup` (
							`codi_grup`,
							`codi_opci`,
							`nive_acce`,
							`fech_camb`,
							`usua_camb`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiGrup) . ',
							' . $objDatabase->SqlVariable($this->intCodiOpci) . ',
							' . $objDatabase->SqlVariable($this->intNiveAcce) . ',
							' . $objDatabase->SqlVariable($this->dttFechCamb) . ',
							' . $objDatabase->SqlVariable($this->strUsuaCamb) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiRegi = $objDatabase->InsertId('opci_grup', 'codi_regi');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`opci_grup`
						SET
							`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . ',
							`codi_opci` = ' . $objDatabase->SqlVariable($this->intCodiOpci) . ',
							`nive_acce` = ' . $objDatabase->SqlVariable($this->intNiveAcce) . ',
							`fech_camb` = ' . $objDatabase->SqlVariable($this->dttFechCamb) . ',
							`usua_camb` = ' . $objDatabase->SqlVariable($this->strUsuaCamb) . '
						WHERE
							`codi_regi` = ' . $objDatabase->SqlVariable($this->intCodiRegi) . '
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
		 * Delete this OpciGrup
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiRegi)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this OpciGrup with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = OpciGrup::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opci_grup`
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($this->intCodiRegi) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this OpciGrup ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'OpciGrup', $this->intCodiRegi);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all OpciGrups
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = OpciGrup::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opci_grup`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate opci_grup table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = OpciGrup::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `opci_grup`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this OpciGrup from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved OpciGrup object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = OpciGrup::Load($this->intCodiRegi);

			// Update $this's local variables to match
			$this->CodiGrup = $objReloaded->CodiGrup;
			$this->CodiOpci = $objReloaded->CodiOpci;
			$this->NiveAcce = $objReloaded->NiveAcce;
			$this->dttFechCamb = $objReloaded->dttFechCamb;
			$this->strUsuaCamb = $objReloaded->strUsuaCamb;
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
				case 'CodiRegi':
					/**
					 * Gets the value for intCodiRegi (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiRegi;

				case 'CodiGrup':
					/**
					 * Gets the value for intCodiGrup (Not Null)
					 * @return integer
					 */
					return $this->intCodiGrup;

				case 'CodiOpci':
					/**
					 * Gets the value for intCodiOpci (Not Null)
					 * @return integer
					 */
					return $this->intCodiOpci;

				case 'NiveAcce':
					/**
					 * Gets the value for intNiveAcce (Not Null)
					 * @return integer
					 */
					return $this->intNiveAcce;

				case 'FechCamb':
					/**
					 * Gets the value for dttFechCamb 
					 * @return QDateTime
					 */
					return $this->dttFechCamb;

				case 'UsuaCamb':
					/**
					 * Gets the value for strUsuaCamb 
					 * @return string
					 */
					return $this->strUsuaCamb;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiGrupObject':
					/**
					 * Gets the value for the Grupo object referenced by intCodiGrup (Not Null)
					 * @return Grupo
					 */
					try {
						if ((!$this->objCodiGrupObject) && (!is_null($this->intCodiGrup)))
							$this->objCodiGrupObject = Grupo::Load($this->intCodiGrup);
						return $this->objCodiGrupObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiOpciObject':
					/**
					 * Gets the value for the Opcion object referenced by intCodiOpci (Not Null)
					 * @return Opcion
					 */
					try {
						if ((!$this->objCodiOpciObject) && (!is_null($this->intCodiOpci)))
							$this->objCodiOpciObject = Opcion::Load($this->intCodiOpci);
						return $this->objCodiOpciObject;
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
				case 'CodiGrup':
					/**
					 * Sets the value for intCodiGrup (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiGrupObject = null;
						return ($this->intCodiGrup = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiOpci':
					/**
					 * Sets the value for intCodiOpci (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiOpciObject = null;
						return ($this->intCodiOpci = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NiveAcce':
					/**
					 * Sets the value for intNiveAcce (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNiveAcce = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechCamb':
					/**
					 * Sets the value for dttFechCamb 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechCamb = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaCamb':
					/**
					 * Sets the value for strUsuaCamb 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUsuaCamb = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiGrupObject':
					/**
					 * Sets the value for the Grupo object referenced by intCodiGrup (Not Null)
					 * @param Grupo $mixValue
					 * @return Grupo
					 */
					if (is_null($mixValue)) {
						$this->intCodiGrup = null;
						$this->objCodiGrupObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Grupo object
						try {
							$mixValue = QType::Cast($mixValue, 'Grupo');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Grupo object
						if (is_null($mixValue->CodiGrup))
							throw new QCallerException('Unable to set an unsaved CodiGrupObject for this OpciGrup');

						// Update Local Member Variables
						$this->objCodiGrupObject = $mixValue;
						$this->intCodiGrup = $mixValue->CodiGrup;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiOpciObject':
					/**
					 * Sets the value for the Opcion object referenced by intCodiOpci (Not Null)
					 * @param Opcion $mixValue
					 * @return Opcion
					 */
					if (is_null($mixValue)) {
						$this->intCodiOpci = null;
						$this->objCodiOpciObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Opcion object
						try {
							$mixValue = QType::Cast($mixValue, 'Opcion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Opcion object
						if (is_null($mixValue->CodiOpci))
							throw new QCallerException('Unable to set an unsaved CodiOpciObject for this OpciGrup');

						// Update Local Member Variables
						$this->objCodiOpciObject = $mixValue;
						$this->intCodiOpci = $mixValue->CodiOpci;

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
			return "opci_grup";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[OpciGrup::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="OpciGrup"><sequence>';
			$strToReturn .= '<element name="CodiRegi" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiGrupObject" type="xsd1:Grupo"/>';
			$strToReturn .= '<element name="CodiOpciObject" type="xsd1:Opcion"/>';
			$strToReturn .= '<element name="NiveAcce" type="xsd:int"/>';
			$strToReturn .= '<element name="FechCamb" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UsuaCamb" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('OpciGrup', $strComplexTypeArray)) {
				$strComplexTypeArray['OpciGrup'] = OpciGrup::GetSoapComplexTypeXml();
				Grupo::AlterSoapComplexTypeArray($strComplexTypeArray);
				Opcion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, OpciGrup::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new OpciGrup();
			if (property_exists($objSoapObject, 'CodiRegi'))
				$objToReturn->intCodiRegi = $objSoapObject->CodiRegi;
			if ((property_exists($objSoapObject, 'CodiGrupObject')) &&
				($objSoapObject->CodiGrupObject))
				$objToReturn->CodiGrupObject = Grupo::GetObjectFromSoapObject($objSoapObject->CodiGrupObject);
			if ((property_exists($objSoapObject, 'CodiOpciObject')) &&
				($objSoapObject->CodiOpciObject))
				$objToReturn->CodiOpciObject = Opcion::GetObjectFromSoapObject($objSoapObject->CodiOpciObject);
			if (property_exists($objSoapObject, 'NiveAcce'))
				$objToReturn->intNiveAcce = $objSoapObject->NiveAcce;
			if (property_exists($objSoapObject, 'FechCamb'))
				$objToReturn->dttFechCamb = new QDateTime($objSoapObject->FechCamb);
			if (property_exists($objSoapObject, 'UsuaCamb'))
				$objToReturn->strUsuaCamb = $objSoapObject->UsuaCamb;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, OpciGrup::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiGrupObject)
				$objObject->objCodiGrupObject = Grupo::GetSoapObjectFromObject($objObject->objCodiGrupObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiGrup = null;
			if ($objObject->objCodiOpciObject)
				$objObject->objCodiOpciObject = Opcion::GetSoapObjectFromObject($objObject->objCodiOpciObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiOpci = null;
			if ($objObject->dttFechCamb)
				$objObject->dttFechCamb = $objObject->dttFechCamb->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodiRegi'] = $this->intCodiRegi;
			$iArray['CodiGrup'] = $this->intCodiGrup;
			$iArray['CodiOpci'] = $this->intCodiOpci;
			$iArray['NiveAcce'] = $this->intNiveAcce;
			$iArray['FechCamb'] = $this->dttFechCamb;
			$iArray['UsuaCamb'] = $this->strUsuaCamb;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiRegi ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiRegi
     * @property-read QQNode $CodiGrup
     * @property-read QQNodeGrupo $CodiGrupObject
     * @property-read QQNode $CodiOpci
     * @property-read QQNodeOpcion $CodiOpciObject
     * @property-read QQNode $NiveAcce
     * @property-read QQNode $FechCamb
     * @property-read QQNode $UsuaCamb
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeOpciGrup extends QQNode {
		protected $strTableName = 'opci_grup';
		protected $strPrimaryKey = 'codi_regi';
		protected $strClassName = 'OpciGrup';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiRegi':
					return new QQNode('codi_regi', 'CodiRegi', 'Integer', $this);
				case 'CodiGrup':
					return new QQNode('codi_grup', 'CodiGrup', 'Integer', $this);
				case 'CodiGrupObject':
					return new QQNodeGrupo('codi_grup', 'CodiGrupObject', 'Integer', $this);
				case 'CodiOpci':
					return new QQNode('codi_opci', 'CodiOpci', 'Integer', $this);
				case 'CodiOpciObject':
					return new QQNodeOpcion('codi_opci', 'CodiOpciObject', 'Integer', $this);
				case 'NiveAcce':
					return new QQNode('nive_acce', 'NiveAcce', 'Integer', $this);
				case 'FechCamb':
					return new QQNode('fech_camb', 'FechCamb', 'DateTime', $this);
				case 'UsuaCamb':
					return new QQNode('usua_camb', 'UsuaCamb', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNode('codi_regi', 'CodiRegi', 'Integer', $this);
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
     * @property-read QQNode $CodiRegi
     * @property-read QQNode $CodiGrup
     * @property-read QQNodeGrupo $CodiGrupObject
     * @property-read QQNode $CodiOpci
     * @property-read QQNodeOpcion $CodiOpciObject
     * @property-read QQNode $NiveAcce
     * @property-read QQNode $FechCamb
     * @property-read QQNode $UsuaCamb
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeOpciGrup extends QQReverseReferenceNode {
		protected $strTableName = 'opci_grup';
		protected $strPrimaryKey = 'codi_regi';
		protected $strClassName = 'OpciGrup';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiRegi':
					return new QQNode('codi_regi', 'CodiRegi', 'integer', $this);
				case 'CodiGrup':
					return new QQNode('codi_grup', 'CodiGrup', 'integer', $this);
				case 'CodiGrupObject':
					return new QQNodeGrupo('codi_grup', 'CodiGrupObject', 'integer', $this);
				case 'CodiOpci':
					return new QQNode('codi_opci', 'CodiOpci', 'integer', $this);
				case 'CodiOpciObject':
					return new QQNodeOpcion('codi_opci', 'CodiOpciObject', 'integer', $this);
				case 'NiveAcce':
					return new QQNode('nive_acce', 'NiveAcce', 'integer', $this);
				case 'FechCamb':
					return new QQNode('fech_camb', 'FechCamb', 'QDateTime', $this);
				case 'UsuaCamb':
					return new QQNode('usua_camb', 'UsuaCamb', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('codi_regi', 'CodiRegi', 'integer', $this);
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
