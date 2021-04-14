<?php
	/**
	 * The abstract SdeTipoOperGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SdeTipoOper subclass which
	 * extends this SdeTipoOperGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SdeTipoOper class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $CodiTipo the value for intCodiTipo (PK)
	 * @property string $DescTipo the value for strDescTipo (Unique)
	 * @property integer $StanHora the value for intStanHora (Not Null)
	 * @property-read SdeOperacion $_SdeOperacionAsCodiTipo the value for the private _objSdeOperacionAsCodiTipo (Read-Only) if set due to an expansion on the sde_operacion.codi_tipo reverse relationship
	 * @property-read SdeOperacion[] $_SdeOperacionAsCodiTipoArray the value for the private _objSdeOperacionAsCodiTipoArray (Read-Only) if set due to an ExpandAsArray on the sde_operacion.codi_tipo reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SdeTipoOperGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column sde_tipo_oper.codi_tipo
		 * @var integer intCodiTipo
		 */
		protected $intCodiTipo;
		const CodiTipoDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intCodiTipo;
		 */
		protected $__intCodiTipo;

		/**
		 * Protected member variable that maps to the database column sde_tipo_oper.desc_tipo
		 * @var string strDescTipo
		 */
		protected $strDescTipo;
		const DescTipoMaxLength = 50;
		const DescTipoDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_tipo_oper.stan_hora
		 * @var integer intStanHora
		 */
		protected $intStanHora;
		const StanHoraDefault = null;


		/**
		 * Private member variable that stores a reference to a single SdeOperacionAsCodiTipo object
		 * (of type SdeOperacion), if this SdeTipoOper object was restored with
		 * an expansion on the sde_operacion association table.
		 * @var SdeOperacion _objSdeOperacionAsCodiTipo;
		 */
		private $_objSdeOperacionAsCodiTipo;

		/**
		 * Private member variable that stores a reference to an array of SdeOperacionAsCodiTipo objects
		 * (of type SdeOperacion[]), if this SdeTipoOper object was restored with
		 * an ExpandAsArray on the sde_operacion association table.
		 * @var SdeOperacion[] _objSdeOperacionAsCodiTipoArray;
		 */
		private $_objSdeOperacionAsCodiTipoArray = null;

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
			$this->intCodiTipo = SdeTipoOper::CodiTipoDefault;
			$this->strDescTipo = SdeTipoOper::DescTipoDefault;
			$this->intStanHora = SdeTipoOper::StanHoraDefault;
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
		 * Load a SdeTipoOper from PK Info
		 * @param integer $intCodiTipo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeTipoOper
		 */
		public static function Load($intCodiTipo, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SdeTipoOper', $intCodiTipo);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = SdeTipoOper::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeTipoOper()->CodiTipo, $intCodiTipo)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all SdeTipoOpers
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeTipoOper[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SdeTipoOper::QueryArray to perform the LoadAll query
			try {
				return SdeTipoOper::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SdeTipoOpers
		 * @return int
		 */
		public static function CountAll() {
			// Call SdeTipoOper::QueryCount to perform the CountAll query
			return SdeTipoOper::QueryCount(QQ::All());
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
			$objDatabase = SdeTipoOper::GetDatabase();

			// Create/Build out the QueryBuilder object with SdeTipoOper-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sde_tipo_oper');

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
				SdeTipoOper::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('sde_tipo_oper');

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
		 * Static Qcubed Query method to query for a single SdeTipoOper object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SdeTipoOper the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeTipoOper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new SdeTipoOper object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SdeTipoOper::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiTipo][] = $objItem;
		
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
				return SdeTipoOper::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of SdeTipoOper objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SdeTipoOper[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeTipoOper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SdeTipoOper::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SdeTipoOper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of SdeTipoOper objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeTipoOper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SdeTipoOper::GetDatabase();

			$strQuery = SdeTipoOper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/sdetipooper', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SdeTipoOper::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SdeTipoOper
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sde_tipo_oper';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_tipo', $strAliasPrefix . 'codi_tipo');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_tipo', $strAliasPrefix . 'codi_tipo');
			    $objBuilder->AddSelectItem($strTableName, 'desc_tipo', $strAliasPrefix . 'desc_tipo');
			    $objBuilder->AddSelectItem($strTableName, 'stan_hora', $strAliasPrefix . 'stan_hora');
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
			
			$strAlias = $strAliasPrefix . 'codi_tipo';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiTipo != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a SdeTipoOper from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SdeTipoOper::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a SdeTipoOper, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_tipo']) ? $strColumnAliasArray['codi_tipo'] : 'codi_tipo';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (SdeTipoOper::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the SdeTipoOper object
			$objToReturn = new SdeTipoOper();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiTipo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intCodiTipo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'desc_tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescTipo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'stan_hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStanHora = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiTipo != $objPreviousItem->CodiTipo) {
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
				$strAliasPrefix = 'sde_tipo_oper__';


				

			// Check for SdeOperacionAsCodiTipo Virtual Binding
			$strAlias = $strAliasPrefix . 'sdeoperacionascoditipo__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdeoperacionascoditipo']) ? null : $objExpansionAliasArray['sdeoperacionascoditipo']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeOperacionAsCodiTipoArray)
				$objToReturn->_objSdeOperacionAsCodiTipoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeOperacionAsCodiTipoArray[] = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionascoditipo__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeOperacionAsCodiTipo)) {
					$objToReturn->_objSdeOperacionAsCodiTipo = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionascoditipo__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of SdeTipoOpers from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return SdeTipoOper[]
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
					$objItem = SdeTipoOper::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiTipo][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SdeTipoOper::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single SdeTipoOper object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SdeTipoOper next row resulting from the query
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
			return SdeTipoOper::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single SdeTipoOper object,
		 * by CodiTipo Index(es)
		 * @param integer $intCodiTipo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeTipoOper
		*/
		public static function LoadByCodiTipo($intCodiTipo, $objOptionalClauses = null) {
			return SdeTipoOper::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeTipoOper()->CodiTipo, $intCodiTipo)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single SdeTipoOper object,
		 * by DescTipo Index(es)
		 * @param string $strDescTipo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeTipoOper
		*/
		public static function LoadByDescTipo($strDescTipo, $objOptionalClauses = null) {
			return SdeTipoOper::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeTipoOper()->DescTipo, $strDescTipo)
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
		 * Save this SdeTipoOper
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sde_tipo_oper` (
							`codi_tipo`,
							`desc_tipo`,
							`stan_hora`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiTipo) . ',
							' . $objDatabase->SqlVariable($this->strDescTipo) . ',
							' . $objDatabase->SqlVariable($this->intStanHora) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sde_tipo_oper`
						SET
							`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . ',
							`desc_tipo` = ' . $objDatabase->SqlVariable($this->strDescTipo) . ',
							`stan_hora` = ' . $objDatabase->SqlVariable($this->intStanHora) . '
						WHERE
							`codi_tipo` = ' . $objDatabase->SqlVariable($this->__intCodiTipo) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intCodiTipo = $this->intCodiTipo;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this SdeTipoOper
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiTipo)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SdeTipoOper with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_tipo_oper`
				WHERE
					`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this SdeTipoOper ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SdeTipoOper', $this->intCodiTipo);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all SdeTipoOpers
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_tipo_oper`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate sde_tipo_oper table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sde_tipo_oper`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this SdeTipoOper from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SdeTipoOper object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = SdeTipoOper::Load($this->intCodiTipo);

			// Update $this's local variables to match
			$this->intCodiTipo = $objReloaded->intCodiTipo;
			$this->__intCodiTipo = $this->intCodiTipo;
			$this->strDescTipo = $objReloaded->strDescTipo;
			$this->intStanHora = $objReloaded->intStanHora;
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
				case 'CodiTipo':
					/**
					 * Gets the value for intCodiTipo (PK)
					 * @return integer
					 */
					return $this->intCodiTipo;

				case 'DescTipo':
					/**
					 * Gets the value for strDescTipo (Unique)
					 * @return string
					 */
					return $this->strDescTipo;

				case 'StanHora':
					/**
					 * Gets the value for intStanHora (Not Null)
					 * @return integer
					 */
					return $this->intStanHora;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_SdeOperacionAsCodiTipo':
					/**
					 * Gets the value for the private _objSdeOperacionAsCodiTipo (Read-Only)
					 * if set due to an expansion on the sde_operacion.codi_tipo reverse relationship
					 * @return SdeOperacion
					 */
					return $this->_objSdeOperacionAsCodiTipo;

				case '_SdeOperacionAsCodiTipoArray':
					/**
					 * Gets the value for the private _objSdeOperacionAsCodiTipoArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_operacion.codi_tipo reverse relationship
					 * @return SdeOperacion[]
					 */
					return $this->_objSdeOperacionAsCodiTipoArray;


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
				case 'CodiTipo':
					/**
					 * Sets the value for intCodiTipo (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiTipo = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescTipo':
					/**
					 * Sets the value for strDescTipo (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescTipo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StanHora':
					/**
					 * Sets the value for intStanHora (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStanHora = QType::Cast($mixValue, QType::Integer));
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
			if ($this->CountSdeOperacionsAsCodiTipo()) {
				$arrTablRela[] = 'sde_operacion';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for SdeOperacionAsCodiTipo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SdeOperacionsAsCodiTipo as an array of SdeOperacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public function GetSdeOperacionAsCodiTipoArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiTipo)))
				return array();

			try {
				return SdeOperacion::LoadArrayByCodiTipo($this->intCodiTipo, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SdeOperacionsAsCodiTipo
		 * @return int
		*/
		public function CountSdeOperacionsAsCodiTipo() {
			if ((is_null($this->intCodiTipo)))
				return 0;

			return SdeOperacion::CountByCodiTipo($this->intCodiTipo);
		}

		/**
		 * Associates a SdeOperacionAsCodiTipo
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function AssociateSdeOperacionAsCodiTipo(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiTipo)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsCodiTipo on this unsaved SdeTipoOper.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsCodiTipo on this SdeTipoOper with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . '
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . '
			');
		}

		/**
		 * Unassociates a SdeOperacionAsCodiTipo
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function UnassociateSdeOperacionAsCodiTipo(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiTipo)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiTipo on this unsaved SdeTipoOper.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiTipo on this SdeTipoOper with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_tipo` = null
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . '
			');
		}

		/**
		 * Unassociates all SdeOperacionsAsCodiTipo
		 * @return void
		*/
		public function UnassociateAllSdeOperacionsAsCodiTipo() {
			if ((is_null($this->intCodiTipo)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiTipo on this unsaved SdeTipoOper.');

			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_tipo` = null
				WHERE
					`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . '
			');
		}

		/**
		 * Deletes an associated SdeOperacionAsCodiTipo
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function DeleteAssociatedSdeOperacionAsCodiTipo(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiTipo)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiTipo on this unsaved SdeTipoOper.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiTipo on this SdeTipoOper with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . '
			');
		}

		/**
		 * Deletes all associated SdeOperacionsAsCodiTipo
		 * @return void
		*/
		public function DeleteAllSdeOperacionsAsCodiTipo() {
			if ((is_null($this->intCodiTipo)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiTipo on this unsaved SdeTipoOper.');

			// Get the Database Object for this Class
			$objDatabase = SdeTipoOper::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . '
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
			return "sde_tipo_oper";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[SdeTipoOper::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="SdeTipoOper"><sequence>';
			$strToReturn .= '<element name="CodiTipo" type="xsd:int"/>';
			$strToReturn .= '<element name="DescTipo" type="xsd:string"/>';
			$strToReturn .= '<element name="StanHora" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SdeTipoOper', $strComplexTypeArray)) {
				$strComplexTypeArray['SdeTipoOper'] = SdeTipoOper::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SdeTipoOper::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SdeTipoOper();
			if (property_exists($objSoapObject, 'CodiTipo'))
				$objToReturn->intCodiTipo = $objSoapObject->CodiTipo;
			if (property_exists($objSoapObject, 'DescTipo'))
				$objToReturn->strDescTipo = $objSoapObject->DescTipo;
			if (property_exists($objSoapObject, 'StanHora'))
				$objToReturn->intStanHora = $objSoapObject->StanHora;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SdeTipoOper::GetSoapObjectFromObject($objObject, true));

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
			$iArray['CodiTipo'] = $this->intCodiTipo;
			$iArray['DescTipo'] = $this->strDescTipo;
			$iArray['StanHora'] = $this->intStanHora;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiTipo ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiTipo
     * @property-read QQNode $DescTipo
     * @property-read QQNode $StanHora
     *
     *
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsCodiTipo

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSdeTipoOper extends QQNode {
		protected $strTableName = 'sde_tipo_oper';
		protected $strPrimaryKey = 'codi_tipo';
		protected $strClassName = 'SdeTipoOper';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiTipo':
					return new QQNode('codi_tipo', 'CodiTipo', 'Integer', $this);
				case 'DescTipo':
					return new QQNode('desc_tipo', 'DescTipo', 'VarChar', $this);
				case 'StanHora':
					return new QQNode('stan_hora', 'StanHora', 'Integer', $this);
				case 'SdeOperacionAsCodiTipo':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionascoditipo', 'reverse_reference', 'codi_tipo', 'SdeOperacionAsCodiTipo');

				case '_PrimaryKeyNode':
					return new QQNode('codi_tipo', 'CodiTipo', 'Integer', $this);
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
     * @property-read QQNode $CodiTipo
     * @property-read QQNode $DescTipo
     * @property-read QQNode $StanHora
     *
     *
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsCodiTipo

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSdeTipoOper extends QQReverseReferenceNode {
		protected $strTableName = 'sde_tipo_oper';
		protected $strPrimaryKey = 'codi_tipo';
		protected $strClassName = 'SdeTipoOper';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiTipo':
					return new QQNode('codi_tipo', 'CodiTipo', 'integer', $this);
				case 'DescTipo':
					return new QQNode('desc_tipo', 'DescTipo', 'string', $this);
				case 'StanHora':
					return new QQNode('stan_hora', 'StanHora', 'integer', $this);
				case 'SdeOperacionAsCodiTipo':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionascoditipo', 'reverse_reference', 'codi_tipo', 'SdeOperacionAsCodiTipo');

				case '_PrimaryKeyNode':
					return new QQNode('codi_tipo', 'CodiTipo', 'integer', $this);
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
