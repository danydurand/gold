<?php
	/**
	 * The abstract GrupoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Grupo subclass which
	 * extends this GrupoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Grupo class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $CodiGrup the value for intCodiGrup (PK)
	 * @property string $DescGrup the value for strDescGrup (Not Null)
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property string $TextObse the value for strTextObse 
	 * @property-read OpciGrup $_OpciGrupAsCodiGrup the value for the private _objOpciGrupAsCodiGrup (Read-Only) if set due to an expansion on the opci_grup.codi_grup reverse relationship
	 * @property-read OpciGrup[] $_OpciGrupAsCodiGrupArray the value for the private _objOpciGrupAsCodiGrupArray (Read-Only) if set due to an ExpandAsArray on the opci_grup.codi_grup reverse relationship
	 * @property-read Usuario $_UsuarioAsCodiGrup the value for the private _objUsuarioAsCodiGrup (Read-Only) if set due to an expansion on the usuario.codi_grup reverse relationship
	 * @property-read Usuario[] $_UsuarioAsCodiGrupArray the value for the private _objUsuarioAsCodiGrupArray (Read-Only) if set due to an ExpandAsArray on the usuario.codi_grup reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GrupoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column grupo.codi_grup
		 * @var integer intCodiGrup
		 */
		protected $intCodiGrup;
		const CodiGrupDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intCodiGrup;
		 */
		protected $__intCodiGrup;

		/**
		 * Protected member variable that maps to the database column grupo.desc_grup
		 * @var string strDescGrup
		 */
		protected $strDescGrup;
		const DescGrupMaxLength = 50;
		const DescGrupDefault = null;


		/**
		 * Protected member variable that maps to the database column grupo.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column grupo.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Private member variable that stores a reference to a single OpciGrupAsCodiGrup object
		 * (of type OpciGrup), if this Grupo object was restored with
		 * an expansion on the opci_grup association table.
		 * @var OpciGrup _objOpciGrupAsCodiGrup;
		 */
		private $_objOpciGrupAsCodiGrup;

		/**
		 * Private member variable that stores a reference to an array of OpciGrupAsCodiGrup objects
		 * (of type OpciGrup[]), if this Grupo object was restored with
		 * an ExpandAsArray on the opci_grup association table.
		 * @var OpciGrup[] _objOpciGrupAsCodiGrupArray;
		 */
		private $_objOpciGrupAsCodiGrupArray = null;

		/**
		 * Private member variable that stores a reference to a single UsuarioAsCodiGrup object
		 * (of type Usuario), if this Grupo object was restored with
		 * an expansion on the usuario association table.
		 * @var Usuario _objUsuarioAsCodiGrup;
		 */
		private $_objUsuarioAsCodiGrup;

		/**
		 * Private member variable that stores a reference to an array of UsuarioAsCodiGrup objects
		 * (of type Usuario[]), if this Grupo object was restored with
		 * an ExpandAsArray on the usuario association table.
		 * @var Usuario[] _objUsuarioAsCodiGrupArray;
		 */
		private $_objUsuarioAsCodiGrupArray = null;

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
			$this->intCodiGrup = Grupo::CodiGrupDefault;
			$this->strDescGrup = Grupo::DescGrupDefault;
			$this->intCodiStat = Grupo::CodiStatDefault;
			$this->strTextObse = Grupo::TextObseDefault;
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
		 * Load a Grupo from PK Info
		 * @param integer $intCodiGrup
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Grupo
		 */
		public static function Load($intCodiGrup, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Grupo', $intCodiGrup);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Grupo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Grupo()->CodiGrup, $intCodiGrup)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Grupos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Grupo[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Grupo::QueryArray to perform the LoadAll query
			try {
				return Grupo::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Grupos
		 * @return int
		 */
		public static function CountAll() {
			// Call Grupo::QueryCount to perform the CountAll query
			return Grupo::QueryCount(QQ::All());
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
			$objDatabase = Grupo::GetDatabase();

			// Create/Build out the QueryBuilder object with Grupo-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'grupo');

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
				Grupo::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('grupo');

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
		 * Static Qcubed Query method to query for a single Grupo object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Grupo the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Grupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Grupo object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Grupo::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiGrup][] = $objItem;
		
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
				return Grupo::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Grupo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Grupo[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Grupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Grupo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Grupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Grupo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Grupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Grupo::GetDatabase();

			$strQuery = Grupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/grupo', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Grupo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Grupo
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'grupo';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_grup', $strAliasPrefix . 'codi_grup');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_grup', $strAliasPrefix . 'codi_grup');
			    $objBuilder->AddSelectItem($strTableName, 'desc_grup', $strAliasPrefix . 'desc_grup');
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
			
			$strAlias = $strAliasPrefix . 'codi_grup';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiGrup != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a Grupo from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Grupo::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Grupo, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_grup']) ? $strColumnAliasArray['codi_grup'] : 'codi_grup';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Grupo::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Grupo object
			$objToReturn = new Grupo();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_grup';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiGrup = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intCodiGrup = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'desc_grup';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescGrup = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiGrup != $objPreviousItem->CodiGrup) {
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
				$strAliasPrefix = 'grupo__';


				

			// Check for OpciGrupAsCodiGrup Virtual Binding
			$strAlias = $strAliasPrefix . 'opcigrupascodigrup__codi_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['opcigrupascodigrup']) ? null : $objExpansionAliasArray['opcigrupascodigrup']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objOpciGrupAsCodiGrupArray)
				$objToReturn->_objOpciGrupAsCodiGrupArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objOpciGrupAsCodiGrupArray[] = OpciGrup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'opcigrupascodigrup__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objOpciGrupAsCodiGrup)) {
					$objToReturn->_objOpciGrupAsCodiGrup = OpciGrup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'opcigrupascodigrup__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for UsuarioAsCodiGrup Virtual Binding
			$strAlias = $strAliasPrefix . 'usuarioascodigrup__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['usuarioascodigrup']) ? null : $objExpansionAliasArray['usuarioascodigrup']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objUsuarioAsCodiGrupArray)
				$objToReturn->_objUsuarioAsCodiGrupArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objUsuarioAsCodiGrupArray[] = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioascodigrup__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objUsuarioAsCodiGrup)) {
					$objToReturn->_objUsuarioAsCodiGrup = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioascodigrup__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Grupos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Grupo[]
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
					$objItem = Grupo::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiGrup][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Grupo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Grupo object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Grupo next row resulting from the query
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
			return Grupo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Grupo object,
		 * by CodiGrup Index(es)
		 * @param integer $intCodiGrup
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Grupo
		*/
		public static function LoadByCodiGrup($intCodiGrup, $objOptionalClauses = null) {
			return Grupo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Grupo()->CodiGrup, $intCodiGrup)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Grupo objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Grupo[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Grupo::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Grupo::QueryArray(
					QQ::Equal(QQN::Grupo()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Grupos
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Grupo::QueryCount to perform the CountByCodiStat query
			return Grupo::QueryCount(
				QQ::Equal(QQN::Grupo()->CodiStat, $intCodiStat)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Grupo
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `grupo` (
							`codi_grup`,
							`desc_grup`,
							`codi_stat`,
							`text_obse`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiGrup) . ',
							' . $objDatabase->SqlVariable($this->strDescGrup) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`grupo`
						SET
							`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . ',
							`desc_grup` = ' . $objDatabase->SqlVariable($this->strDescGrup) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . '
						WHERE
							`codi_grup` = ' . $objDatabase->SqlVariable($this->__intCodiGrup) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intCodiGrup = $this->intCodiGrup;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Grupo
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Grupo with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`grupo`
				WHERE
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Grupo ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Grupo', $this->intCodiGrup);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Grupos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`grupo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate grupo table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `grupo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Grupo from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Grupo object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Grupo::Load($this->intCodiGrup);

			// Update $this's local variables to match
			$this->intCodiGrup = $objReloaded->intCodiGrup;
			$this->__intCodiGrup = $this->intCodiGrup;
			$this->strDescGrup = $objReloaded->strDescGrup;
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
				case 'CodiGrup':
					/**
					 * Gets the value for intCodiGrup (PK)
					 * @return integer
					 */
					return $this->intCodiGrup;

				case 'DescGrup':
					/**
					 * Gets the value for strDescGrup (Not Null)
					 * @return string
					 */
					return $this->strDescGrup;

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

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_OpciGrupAsCodiGrup':
					/**
					 * Gets the value for the private _objOpciGrupAsCodiGrup (Read-Only)
					 * if set due to an expansion on the opci_grup.codi_grup reverse relationship
					 * @return OpciGrup
					 */
					return $this->_objOpciGrupAsCodiGrup;

				case '_OpciGrupAsCodiGrupArray':
					/**
					 * Gets the value for the private _objOpciGrupAsCodiGrupArray (Read-Only)
					 * if set due to an ExpandAsArray on the opci_grup.codi_grup reverse relationship
					 * @return OpciGrup[]
					 */
					return $this->_objOpciGrupAsCodiGrupArray;

				case '_UsuarioAsCodiGrup':
					/**
					 * Gets the value for the private _objUsuarioAsCodiGrup (Read-Only)
					 * if set due to an expansion on the usuario.codi_grup reverse relationship
					 * @return Usuario
					 */
					return $this->_objUsuarioAsCodiGrup;

				case '_UsuarioAsCodiGrupArray':
					/**
					 * Gets the value for the private _objUsuarioAsCodiGrupArray (Read-Only)
					 * if set due to an ExpandAsArray on the usuario.codi_grup reverse relationship
					 * @return Usuario[]
					 */
					return $this->_objUsuarioAsCodiGrupArray;


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
					 * Sets the value for intCodiGrup (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiGrup = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescGrup':
					/**
					 * Sets the value for strDescGrup (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescGrup = QType::Cast($mixValue, QType::String));
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
			if ($this->CountOpciGrupsAsCodiGrup()) {
				$arrTablRela[] = 'opci_grup';
			}
			if ($this->CountUsuariosAsCodiGrup()) {
				$arrTablRela[] = 'usuario';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for OpciGrupAsCodiGrup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OpciGrupsAsCodiGrup as an array of OpciGrup objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup[]
		*/
		public function GetOpciGrupAsCodiGrupArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiGrup)))
				return array();

			try {
				return OpciGrup::LoadArrayByCodiGrup($this->intCodiGrup, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OpciGrupsAsCodiGrup
		 * @return int
		*/
		public function CountOpciGrupsAsCodiGrup() {
			if ((is_null($this->intCodiGrup)))
				return 0;

			return OpciGrup::CountByCodiGrup($this->intCodiGrup);
		}

		/**
		 * Associates a OpciGrupAsCodiGrup
		 * @param OpciGrup $objOpciGrup
		 * @return void
		*/
		public function AssociateOpciGrupAsCodiGrup(OpciGrup $objOpciGrup) {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOpciGrupAsCodiGrup on this unsaved Grupo.');
			if ((is_null($objOpciGrup->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOpciGrupAsCodiGrup on this Grupo with an unsaved OpciGrup.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opci_grup`
				SET
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objOpciGrup->CodiRegi) . '
			');
		}

		/**
		 * Unassociates a OpciGrupAsCodiGrup
		 * @param OpciGrup $objOpciGrup
		 * @return void
		*/
		public function UnassociateOpciGrupAsCodiGrup(OpciGrup $objOpciGrup) {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiGrup on this unsaved Grupo.');
			if ((is_null($objOpciGrup->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiGrup on this Grupo with an unsaved OpciGrup.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opci_grup`
				SET
					`codi_grup` = null
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objOpciGrup->CodiRegi) . ' AND
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
			');
		}

		/**
		 * Unassociates all OpciGrupsAsCodiGrup
		 * @return void
		*/
		public function UnassociateAllOpciGrupsAsCodiGrup() {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiGrup on this unsaved Grupo.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opci_grup`
				SET
					`codi_grup` = null
				WHERE
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
			');
		}

		/**
		 * Deletes an associated OpciGrupAsCodiGrup
		 * @param OpciGrup $objOpciGrup
		 * @return void
		*/
		public function DeleteAssociatedOpciGrupAsCodiGrup(OpciGrup $objOpciGrup) {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiGrup on this unsaved Grupo.');
			if ((is_null($objOpciGrup->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiGrup on this Grupo with an unsaved OpciGrup.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opci_grup`
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objOpciGrup->CodiRegi) . ' AND
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
			');
		}

		/**
		 * Deletes all associated OpciGrupsAsCodiGrup
		 * @return void
		*/
		public function DeleteAllOpciGrupsAsCodiGrup() {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiGrup on this unsaved Grupo.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opci_grup`
				WHERE
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
			');
		}


		// Related Objects' Methods for UsuarioAsCodiGrup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UsuariosAsCodiGrup as an array of Usuario objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public function GetUsuarioAsCodiGrupArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiGrup)))
				return array();

			try {
				return Usuario::LoadArrayByCodiGrup($this->intCodiGrup, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UsuariosAsCodiGrup
		 * @return int
		*/
		public function CountUsuariosAsCodiGrup() {
			if ((is_null($this->intCodiGrup)))
				return 0;

			return Usuario::CountByCodiGrup($this->intCodiGrup);
		}

		/**
		 * Associates a UsuarioAsCodiGrup
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function AssociateUsuarioAsCodiGrup(Usuario $objUsuario) {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioAsCodiGrup on this unsaved Grupo.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioAsCodiGrup on this Grupo with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . '
			');
		}

		/**
		 * Unassociates a UsuarioAsCodiGrup
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function UnassociateUsuarioAsCodiGrup(Usuario $objUsuario) {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsCodiGrup on this unsaved Grupo.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsCodiGrup on this Grupo with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`codi_grup` = null
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . ' AND
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
			');
		}

		/**
		 * Unassociates all UsuariosAsCodiGrup
		 * @return void
		*/
		public function UnassociateAllUsuariosAsCodiGrup() {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsCodiGrup on this unsaved Grupo.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`codi_grup` = null
				WHERE
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
			');
		}

		/**
		 * Deletes an associated UsuarioAsCodiGrup
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function DeleteAssociatedUsuarioAsCodiGrup(Usuario $objUsuario) {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsCodiGrup on this unsaved Grupo.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsCodiGrup on this Grupo with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario`
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . ' AND
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
			');
		}

		/**
		 * Deletes all associated UsuariosAsCodiGrup
		 * @return void
		*/
		public function DeleteAllUsuariosAsCodiGrup() {
			if ((is_null($this->intCodiGrup)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsCodiGrup on this unsaved Grupo.');

			// Get the Database Object for this Class
			$objDatabase = Grupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario`
				WHERE
					`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . '
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
			return "grupo";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Grupo::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Grupo"><sequence>';
			$strToReturn .= '<element name="CodiGrup" type="xsd:int"/>';
			$strToReturn .= '<element name="DescGrup" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Grupo', $strComplexTypeArray)) {
				$strComplexTypeArray['Grupo'] = Grupo::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Grupo::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Grupo();
			if (property_exists($objSoapObject, 'CodiGrup'))
				$objToReturn->intCodiGrup = $objSoapObject->CodiGrup;
			if (property_exists($objSoapObject, 'DescGrup'))
				$objToReturn->strDescGrup = $objSoapObject->DescGrup;
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
				array_push($objArrayToReturn, Grupo::GetSoapObjectFromObject($objObject, true));

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
			$iArray['CodiGrup'] = $this->intCodiGrup;
			$iArray['DescGrup'] = $this->strDescGrup;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiGrup ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiGrup
     * @property-read QQNode $DescGrup
     * @property-read QQNode $CodiStat
     * @property-read QQNode $TextObse
     *
     *
     * @property-read QQReverseReferenceNodeOpciGrup $OpciGrupAsCodiGrup
     * @property-read QQReverseReferenceNodeUsuario $UsuarioAsCodiGrup

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeGrupo extends QQNode {
		protected $strTableName = 'grupo';
		protected $strPrimaryKey = 'codi_grup';
		protected $strClassName = 'Grupo';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiGrup':
					return new QQNode('codi_grup', 'CodiGrup', 'Integer', $this);
				case 'DescGrup':
					return new QQNode('desc_grup', 'DescGrup', 'VarChar', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'OpciGrupAsCodiGrup':
					return new QQReverseReferenceNodeOpciGrup($this, 'opcigrupascodigrup', 'reverse_reference', 'codi_grup', 'OpciGrupAsCodiGrup');
				case 'UsuarioAsCodiGrup':
					return new QQReverseReferenceNodeUsuario($this, 'usuarioascodigrup', 'reverse_reference', 'codi_grup', 'UsuarioAsCodiGrup');

				case '_PrimaryKeyNode':
					return new QQNode('codi_grup', 'CodiGrup', 'Integer', $this);
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
     * @property-read QQNode $CodiGrup
     * @property-read QQNode $DescGrup
     * @property-read QQNode $CodiStat
     * @property-read QQNode $TextObse
     *
     *
     * @property-read QQReverseReferenceNodeOpciGrup $OpciGrupAsCodiGrup
     * @property-read QQReverseReferenceNodeUsuario $UsuarioAsCodiGrup

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGrupo extends QQReverseReferenceNode {
		protected $strTableName = 'grupo';
		protected $strPrimaryKey = 'codi_grup';
		protected $strClassName = 'Grupo';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiGrup':
					return new QQNode('codi_grup', 'CodiGrup', 'integer', $this);
				case 'DescGrup':
					return new QQNode('desc_grup', 'DescGrup', 'string', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'OpciGrupAsCodiGrup':
					return new QQReverseReferenceNodeOpciGrup($this, 'opcigrupascodigrup', 'reverse_reference', 'codi_grup', 'OpciGrupAsCodiGrup');
				case 'UsuarioAsCodiGrup':
					return new QQReverseReferenceNodeUsuario($this, 'usuarioascodigrup', 'reverse_reference', 'codi_grup', 'UsuarioAsCodiGrup');

				case '_PrimaryKeyNode':
					return new QQNode('codi_grup', 'CodiGrup', 'integer', $this);
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
